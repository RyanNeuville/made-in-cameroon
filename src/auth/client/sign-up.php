<?php
include_once "../../../config/db_connect.php";
session_start();
$page_title = "Inscription - Client";

if ($_SERVER["REQUEST_METHOD"] == 'POST') {
    $nom = mysqli_real_escape_string($conn, $_POST['nom']);
    $prenom = mysqli_real_escape_string($conn, $_POST['prenom']);
    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $password = mysqli_real_escape_string($conn, $_POST['password']);
    $confirm_password = mysqli_real_escape_string($conn, $_POST['confirm_password']);
    $numero = mysqli_real_escape_string($conn, $_POST['numero']);

    $role_id = ROLE_CLIENT;

    $errors = [];

    if ($password !== $confirm_password) {
        $errors[] = "Les mots de passe ne correspondent pas.";
    }

    if (strlen($password) < 8) {
        $errors[] = "Le mot de passe doit contenir au moins 8 caractères.";
    }

    // Vérification de l'existence de l'email
    if (empty($errors)) {
        $stmt_check = mysqli_prepare($conn, "SELECT user_id FROM users WHERE email = ?");
        mysqli_stmt_bind_param($stmt_check, "s", $email);
        mysqli_stmt_execute($stmt_check);

        if (mysqli_stmt_num_rows($stmt_check) > 0) {
            $errors[] = "Cet email est déjà utilisé. Veuillez vous connecter.";
            mysqli_stmt_close($stmt_check);
            mysqli_close($conn);
            header("location: sign-up.php");
            exit;
        }
        mysqli_stmt_close($stmt_check);
    }

    // Insertion SÉCURISÉE si aucune erreur

    try {
        if (empty($errors)) {
            // Hachage du mot de passe
            $password_hash = password_hash($password, PASSWORD_DEFAULT);

            $stmt_insert = mysqli_prepare(
                $conn,
                "INSERT INTO users (role_id, first_name, last_name, email, password_hash, phone_number) 
        VALUES (?, ?, ?, ?, ?, ?)"
            );

            // Liage des paramètres : i=integer, s=string
            mysqli_stmt_bind_param($stmt_insert, "isssss", $role_id, $prenom, $nom, $email, $password_hash, $numero);

            if (mysqli_stmt_execute($stmt_insert)) {
                // SUCCESS
                $_SESSION['message'] = "Inscription réussie ! Vous pouvez maintenant vous connecter.";
                $_SESSION['message_type'] = "success";
                header("location: login.php");
                exit;
            } else {
                // ERROR
                $_SESSION['message'] = "Erreur SQL lors de l'inscription : " . mysqli_error($conn);
                $_SESSION['message_type'] = "error";
                header("location: sign-up.php");
                exit;
            }
            mysqli_stmt_close($stmt_insert);

        } else {
            // WARNING / Erreurs de validation
            $_SESSION['message'] = implode("<br>", $errors);
            $_SESSION['message_type'] = "warning";
            header("location: sign-up.php");
            exit;
        }
    } catch (\Throwable $th) {
        $errors[] = "Cet email est déjà utilisé. Veuillez vous connecter.";
        mysqli_close($conn);
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
        <form method="POST">
            <center class="mb-10">
                <a href="../../../index.php">
                    <img src="../../../public/logo/text-logo.png" class="w-32" alt="">
                </a>
            </center>
            <fieldset class="fieldset bg-base-200 border-base-300 rounded-box border p-4">

                <legend class="fieldset-legend"><img src="../../../public/logo/logo.png" class="w-8 h-8"
                        alt="">Inscription client</legend>

                <?php if (isset($_SESSION["message"])): ?>
                    <div role="alert" class="alert alert-<?php echo $_SESSION['message_type']; ?> mb-4">
                        <?php echo $_SESSION['message']; ?>
                    </div>
                <?php endif; ?>


                <div class="flex gap-2 w-full">
                    <div>
                        <label class="label">Votre nom ?</label>
                        <input type="text" name="nom" class="input" placeholder="louis albert" required />
                    </div>

                    <div>
                        <label class="label">Votre prenom ?</label>
                        <input type="text" name="prenom" class="input" placeholder="ryan feussi" required />
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
                        <input type="password" name="confirm_password" class="input" placeholder="Password" required />
                    </div>
                </div>

                <label class="label">Numero de telephone</label>
                <input type="tel" name="numero" class="input w-full" placeholder="+237 665 12 34 56" required />

                <button type="submit"
                    class="btn btn-lg w-full bg-success hover:bg-success/80 text-white font-semibold border-none">Inscription</button>
                <span>Avez vous deja un compte ? <a href="../client/login.php"
                        class="text-success">Connectez-vous</a></span>
            </fieldset>
        </form>
    </div>
</body>
<?php include_once '../../views/footer.php' ?>

</html>