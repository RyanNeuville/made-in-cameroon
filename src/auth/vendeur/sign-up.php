<?php
session_start();
$page_title = "Inscription - Vendeur";
require_once '../../../config/db_connect.php';

$upload_dir = '../../../uploads/vendeur_docs/';

if ($_SERVER['REQUEST_METHOD'] == "POST") {
    $errors = [];

    // --- 1. Nettoyage et Validation des données ---
    $first_name = trim(mysqli_real_escape_string($conn, $_POST["first_name"]));
    $last_name = trim(mysqli_real_escape_string($conn, $_POST["last_name"]));
    $email = trim(mysqli_real_escape_string($conn, $_POST["email"]));
    $password = trim(mysqli_real_escape_string($conn, $_POST["password"]));
    $password_confirmation = trim(mysqli_real_escape_string($conn, $_POST["password_confirmation"]));
    $mobile_money_account = trim(mysqli_real_escape_string($conn, $_POST["mobile_money_account"]));
    $shop_name = trim(mysqli_real_escape_string($conn, $_POST["shop_name"]));
    $region_id = (int) trim(mysqli_real_escape_string($conn, $_POST["region_id"]));
    $activity_description = trim(mysqli_real_escape_string($conn, $_POST["activity_description"]));
    $niu_number = trim(mysqli_real_escape_string($conn, $_POST["niu_number"]));

    if ($password !== $password_confirmation || strlen($password) < 8) {
        $errors[] = "Le mot de passe doit correspondre et faire au moins 8 caractères.";
    }

    // --- 2. Vérification de l'existence (Email et NIU/Shop Name) ---
    $existing_user = mysqli_query($conn, "SELECT * FROM users u JOIN vendeurs_details v ON u.user_id = v.user_id WHERE u.email = '$email' OR v.niu_number = '$niu_number' OR v.shop_name = '$shop_name'");
    if (mysqli_num_rows($existing_user) > 0) {
        $errors[] = "L'email ou le NIU/Shop Name existe déjà.";
    }

    // --- 3. Gestion de l'Upload Sécurisé du Document CNI ---
    $cni_document_url = NULL;
    if (isset($_FILES['cni_document']) && $_FILES['cni_document']['error'] === UPLOAD_ERR_OK) {
        $file = $_FILES['cni_document'];

        // Validation Type (Image/PDF) et Taille (2MB = 2097152 bytes)
        $allowed_types = ['image/jpeg', 'image/png', 'application/pdf'];
        if ($file['size'] > 2097152 || !in_array($file['type'], $allowed_types)) {
            $errors[] = "Le fichier CNI est trop volumineux (max 2MB) ou le format n'est pas supporté (JPG, PNG, PDF).";
        } else {
            // Création d'un nom de fichier unique et sécurisé (NE PAS UTILISER LE NOM D'ORIGINE)
            $extension = pathinfo($file['name'], PATHINFO_EXTENSION);
            $safe_filename = 'cni_' . uniqid('', true) . '.' . $extension;
            $destination = $upload_dir . $safe_filename;

            if (move_uploaded_file($file['tmp_name'], $destination)) {
                $cni_document_url = $destination; 
            } else {
                $errors[] = "Erreur lors du déplacement du fichier CNI. Vérifiez les permissions du dossier 'uploads/vendeur_docs/'.";
            }
        }
    } else {
        $errors[] = "Veuillez fournir votre document CNI/Kbis.";
    }

    // -- Gestion de l'Upload securise de la photo du vendeur ---
    $photo_url = NULL;
    if (isset($_FILES['photo']) && $_FILES['photo']['error'] === UPLOAD_ERR_OK) {
        $file = $_FILES['photo'];

        // Validation Type (Image) et Taille (2MB = 2097152 bytes)
        $allowed_types = ['image/jpeg', 'image/png'];
        if ($file['size'] > 2097152 || !in_array($file['type'], $allowed_types)) {
            $errors[] = "Le fichier photo est trop volumineux (max 2MB) ou le format n'est pas supporté (JPG, PNG).";
        } else {
            // Création d'un nom de fichier unique et sécurisé (NE PAS UTILISER LE NOM D'ORIGINE)
            $extension = pathinfo($file['name'], PATHINFO_EXTENSION);
            $safe_filename = 'photo_' . uniqid('', true) . '.' . $extension;
            $destination = $upload_dir . $safe_filename;

            if (move_uploaded_file($file['tmp_name'], $destination)) {
                $photo_url = $destination; // Chemin à stocker en DB
            } else {
                $errors[] = "Erreur lors du déplacement du fichier photo. Vérifiez les permissions du dossier 'uploads/vendeur_docs/'.";
            }
        }
    } else {
        $errors[] = "Veuillez fournir votre photo.";
    }

    // verificatoin du pattern niu
    $pattern_niu = '/^P[A-Z0-9]{12}W$/';
    if (!preg_match($pattern_niu, $niu_number)) {
        $errors[] = "Le NIU doit suivre le format PXXXXXXXXXXXXX.";
    }


    // --- 4. Exécution de l'Insertion (DANS UNE TRANSACTION) ---
    if (empty($errors)) {
        mysqli_begin_transaction($conn);
        $success = true;

        try {
            $password_hash = password_hash($password, PASSWORD_DEFAULT);
            $role_id = ROLE_VENDEUR;

            // Requête 1 : Insertion dans la table `users`
            $stmt_user = mysqli_prepare(
                $conn,
                "INSERT INTO users (role_id, first_name, last_name, email, password_hash, phone_number) 
                 VALUES (?, ?, ?, ?, ?, ?)"
            );
            mysqli_stmt_bind_param($stmt_user, "isssss", $role_id, $first_name, $last_name, $email, $password_hash, $phone_number);
            mysqli_stmt_execute($stmt_user);

            $new_user_id = mysqli_insert_id($conn);
            mysqli_stmt_close($stmt_user);

            // Requête 2 : Insertion dans la table `vendeurs_details`
            $stmt_vendeur = mysqli_prepare(
                $conn,
                "INSERT INTO vendeurs_details (user_id, shop_name, activity_description, region_id, niu_number, mobile_money_account, cni_document_url, vendeur_picture_url, is_approved) 
                 VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?)"
            );
            $is_approved_initial = 0;
            mysqli_stmt_bind_param(
                $stmt_vendeur,
                "issississ",
                $new_user_id,
                $shop_name,
                $activity_description,
                $region_id,
                $niu_number,
                $mobile_money_account,
                $cni_document_url,
                $photo_url,
                $is_approved_initial
            ); // Le compte est en attente de validation

            mysqli_stmt_execute($stmt_vendeur);
            mysqli_stmt_close($stmt_vendeur);

            // Si tout s'est bien passé, valider la transaction
            mysqli_commit($conn);

            // SUCCESS
            $_SESSION['message'] = "Inscription Vendeur réussie ! Votre compte est en cours de validation. Vous serez notifié par email lorsque vous pourrez vous connecter.";
            $_SESSION['message_type'] = "success";
            header("location: login.php"); // Redirection vers la page de connexion
            exit;
        } catch (mysqli_sql_exception $e) {
            // ERROR : Annuler toutes les opérations si une erreur survient
            mysqli_rollback($conn);
            $errors[] = "Erreur SQL critique lors de l'insertion : " . $e->getMessage();
            $success = false;
        }

        // Si la transaction a échoué pour une raison inconnue ou une erreur dans le try
        if (!$success) {
            // IMPORTANT : Supprimer le fichier uploadé si l'insertion DB a échoué
            if ($cni_document_url && file_exists($cni_document_url) && $photo_url && file_exists($photo_url)) {
                unlink($cni_document_url);
                unlink($photo_url);
            }
            $_SESSION['message'] = "Erreur : " . implode("<br>", $errors);
            $_SESSION['message_type'] = "error";
            header("location: sign-up.php");
            exit;
        }
    } else {
        // WARNING / Erreurs de validation (formulaire)
        $_SESSION['message'] = implode("<br>", $errors);
        $_SESSION['message_type'] = "warning";
        header("location: sign-up.php");
        exit;
    }
    mysqli_close($conn);
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="../../../public/logo/logo.png">
    <link rel="stylesheet" href="../../../public/output.css">
    <title><?php echo $page_title; ?></title>
</head>

<body>
    <div class="flex items-center justify-center h-screen p-4">
        <form action="" method="POST" enctype="multipart/form-data">
            <center>
                <a href="../../../index.php">
                    <img src="../../../public/logo/text-logo.png" class="w-32" alt="">
                </a>
            </center>
            <fieldset class="fieldset bg-base-200 border-base-300 rounded-box border p-4 mt-20">

                <legend class="fieldset-legend"><img src="../../../public/logo/logo.png" class="w-8 h-8"
                        alt=""><?php echo $page_title; ?></legend>

                <?php if (isset($_SESSION['message'])): ?>
                    <div role="alert" class="alert alert-<?php echo $_SESSION['message_type']; ?> mb-4">
                        <?php echo $_SESSION['message']; ?>
                    </div>
                    <?php echo $_SESSION['message'];
                    unset($_SESSION['message_type']); ?>
                <?php endif; ?>

                <div class="flex gap-2 w-full">
                    <div>
                        <label class="label">Votre nom ?</label>
                        <input type="text" name="first_name" class="input" placeholder="louis albert" required />
                    </div>

                    <div>
                        <label class="label">Votre prenom ?</label>
                        <input type="text" name="last_name" class="input" placeholder="ryan feussi" required />
                    </div>
                </div>

                <label class="label">Email</label>
                <input type="email" name="email" class="input w-full" placeholder="example@gmail.com" required />

                <div class="flex gap-2">
                    <div>
                        <label class="label">Password</label>
                        <input type="password" name="password" class="input" placeholder="Password" required />
                    </div>

                    <div>
                        <label class="label">Reppeat Password</label>
                        <input type="password" name="password_confirmation" class="input" placeholder="Password"
                            required />
                    </div>
                </div>

                <label class="label">N° de Compte Mobile Money (Paiement)</label>
                <input type="tel" name="mobile_money_account" class="input w-full" placeholder="+237 665 12 34 56"
                    required />

                <div class="flex gap-2">
                    <div>
                        <label class="label">Nom boutique</label>
                        <input type="text" name="shop_name" class="input" placeholder="Salim fashon" required />
                    </div>

                    <div>
                        <label class="label">Region de residence</label>
                        <select name="region_id" class="select" id="" required>
                            <!-- affichier la listes des regions depuis la base de donnees -->
                            <?php
                            $result_regions = mysqli_query($conn, 'SELECT * FROM regions');
                            while ($region = mysqli_fetch_assoc($result_regions)) {
                                ?>
                                <option value="<?php echo $region['region_id']; ?>"><?php echo $region['region_name']; ?>
                                </option>
                            <?php } ?>
                        </select>
                    </div>
                </div>

                <label class="label">Description de l'activite</label>
                <textarea name="activity_description" class="textarea w-full min-h-10 max-h-10"
                    placeholder="ex: Je suis agriculteur et je propose des cacao de tres bonne qualite "></textarea>

                <label class="label">Numéro d'Identifiant fiscal Unique (NIU)</label>
                <input type="text" name="niu_number" class="input w-full" placeholder="ex: 12GSRGDLF8892JD" required>

                <div class="flex gap-2 flex-col md:flex-row">
                    <div class="flex flex-col w-full">
                        <label class="label">Votre Carte d'identite CNI</label>
                        <input type="file" accept=".pdf, image/*" name="cni_document"
                            class="file-input w-full text-[11px]" required />
                    </div>
                    <div class="flex flex-col w-full">
                        <label class="label">Votre Photo personnel</label>
                        <input type="file" accept="image/*" name="photo" class="file-input w-full text-[11px]"
                            required />
                    </div>
                </div>



                <button type="submit" class="btn btn-success mt-4">Inscription</button>
                <div class="flex justify-between items-center">
                    <span>Avez vous deja un compte ? <a href="../vendeur/login.php"
                            class="text-success">Connectez-vous</a></span>

                    <!-- You can open the modal using ID.showModal() method -->
                    <button class="underline" onclick="my_modal_3.showModal()">Politique de confidentialite</button>
                    <dialog id="my_modal_3" class="modal">
                        <div class="modal-box">
                            <form method="dialog">
                                <button class="btn btn-sm btn-circle btn-ghost absolute right-2 top-2">✕</button>
                            </form>
                            <h3 class="text-lg font-bold gap-2 flex items-center text-xl"><img
                                    src="../../../public/logo/logo.png" class="w-6"> made-in-cameroon</h3>
                            <p class="py-4">Press ESC key or click on ✕ button to close</p>
                        </div>
                    </dialog>
                </div>
            </fieldset>
        </form>
    </div>
</body>
<?php include_once '../../views/footer.php' ?>

</html>