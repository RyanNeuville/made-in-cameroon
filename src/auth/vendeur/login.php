<?php
session_start();
$page_title = "Connexion - Vendeur";
require_once "../../../config/db_connect.php";

if ($_SERVER["REQUEST_METHOD"] == 'POST') {
    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $password = mysqli_real_escape_string($conn, $_POST['password']);

    // Recuperation de l'utilisateur (Requete Preparee pour empêcher l'injection SQL)
    $stmt = mysqli_prepare($conn, "SELECT user_id, password_hash, role_id, first_name FROM users WHERE email = ?");
    mysqli_stmt_bind_param($stmt, 's', $email);
    mysqli_stmt_execute($stmt);
    $result = mysqli_stmt_get_result($stmt);
    $user = mysqli_fetch_assoc($result);
    mysqli_stmt_close($stmt);

    if ($user) {
        if (password_verify($password, $user['password_hash'])) {

            session_regenerate_id(true);


            // initialisation de la session
            $_SESSION['loggedin'] = true;
            $_SESSION['user_id'] = $user['user_id'];
            $_SESSION['role_id'] = $user['role_id'];
            $_SESSION['first_name'] = $user['first_name'];

            // Redirection basee sur le role 
            $redirect_page = '../../vendeur/index.php';

            if ($user['role_id'] == ROLE_ADMIN) {
                $redirect_page = '../../admin/index.php';
            } elseif ($user['role_id'] == ROLE_VENDEUR) {
                $stmt_check_approved = mysqli_prepare($conn, "SELECT is_approved FROM vendeurs_details WHERE user_id = ?");
                mysqli_stmt_bind_param($stmt_check_approved, "i", $user['user_id']);
                mysqli_stmt_execute($stmt_check_approved);
                $result_approved = mysqli_stmt_get_result($stmt_check_approved);
                $vendeur_details = mysqli_fetch_assoc($result_approved);
                mysqli_stmt_close($stmt_check_approved);

                if ($vendeur_details['is_approved'] == 0) {
                    $_SESSION['message'] = "Votre compte Vendeur est en attente de validation par l'administrateur.";
                    $_SESSION['message_type'] = "warning";
                    header("location: login.php");
                    exit;
                }
                $redirect_page = '../../vendeur/index.php';
            }

            $_SESSION['message'] = "Bienvenue, " . $user['first_name'] . " !";
            $_SESSION['message_type'] = "success";
            header("location: $redirect_page");
            exit;
        } else {
            $_SESSION['message'] = "Identifiants invalides ou mot de passe incorrect.";
            $_SESSION['message_type'] = "error";
        }
    } else {
        // Utilisateur non trouve
        $_SESSION['message'] = "Identifiants invalides ou mot de passe incorrect.";
        $_SESSION['message_type'] = "error";
    }



    header("location: login.php");
    exit;

}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="../../../public/logo/logo.png">
    <link rel="stylesheet" href="../../../public/output.css">
    <title>Connexion - Vendeur</title>
</head>

<body>
    <div class="flex items-center justify-center h-screen">
        <form action="" method="POST">
            <center class="mb-10">
                <a href="../../../index.php">
                    <img src="../../../public/logo/text-logo.png" class="w-32" alt="">
                </a>
            </center>
            <fieldset class="fieldset bg-base-200 border-base-300 rounded-box w-xs border p-4">
                <legend class="fieldset-legend"><img src="../../../public/logo/logo.png" class="w-8 h-8"
                        alt=""><?php echo $page_title; ?></legend>

                <?php if (isset($_SESSION['message'])): ?>
                    <div class="alert alert-<?php echo $_SESSION['message_type'] ?>">
                        <?php echo $_SESSION['message']; ?>
                    </div>
                <?php endif; ?>

                <label class="label">Email</label>
                <input type="email" name="email" class="input" placeholder="Email" required />

                <label class="label">Password</label>
                <input type="password" name="password" class="input" placeholder="Password" required />

                <button type="submit" class="btn btn-success mt-4">Se Connecter</button>
                <span>Vous n'avez pas de compte ? <a href="../vendeur/sign-up.php"
                        class="text-success">Inscrivez-vous</a></span>
            </fieldset>
        </form>
    </div>
    <?php include_once '../../views/footer.php'; ?>
</body>

</html>