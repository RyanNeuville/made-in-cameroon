<?php
session_start();
$page_title = "Connexion - Client";
include_once "../../../config/db_connect.php"
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
    <div class="flex items-center justify-center h-screen">
        <form action="login.php" method="POST">
            <center class="mb-10">
                <a href="../../../index.php">
                    <img src="../../../public/logo/text-logo.png" class="w-32" alt="">
                </a>
            </center>
            <fieldset class="fieldset bg-base-200 border-base-300 rounded-box w-xs border p-4">
                <legend class="fieldset-legend"><img src="../../../public/logo/logo.png" class="w-8 h-8"
                        alt=""><?php echo $page_title; ?></legend>

                <?php if (isset($_SESSION['message'])): ?>
                    <div role="alert" class="alert alert-<?php echo $_SESSION['message_type']; ?> mb-4">
                        <?php echo $_SESSION['message']; ?>
                    </div>
                <?php endif; ?>

                <label class="label">Email</label>
                <input type="email" name="email" class="input" placeholder="Email" required />

                <label class="label">Password</label>
                <input type="password" name="password" class="input" placeholder="Password" required />

                <button type="submit" class="btn btn-success mt-4">Se Connecter</button>
                <span>Vous n'avez pas de compte ? <a href="../client/sign-up.php"
                        class="text-success">Inscrivez-vous</a></span>
            </fieldset>
        </form>
    </div>


</body>
<?php include_once '../../../src/views/footer.php'; ?>

</html>