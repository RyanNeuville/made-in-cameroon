<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="../../public/logo/logo.png">
    <title>Creation de compte</title>
    <link rel="stylesheet" href="../../public/output.css">
</head>

<body class="h-screen flex flex-col justify-center items-center">
    <center>
        <div>
            <img src="../../public/logo/text-logo.png" class="md:w-96 w-52" alt="">
        </div>
    </center>
    <section class="flex justify-center items-center flex flex-col gap-5 md:flex-row p-4">
        <div class="flex gap-5 flex-col p-10 border-success border-2 border-dashed rounded-lg shadow-lg w-90">
            <div>
                <span class="font-bold">Je suis un client</span>
                <p class="text-[12px] text-gray-500/50">Je veux decouvrir les produits et valoriser le travail de mon
                    pays</p>
            </div>
            <div class="flex gap-2">
                <button class="btn btn-success"
                    onclick="window.location.href='../../src/auth/client/login.php'">Connexion</button>
                <button class="btn btn-warning"
                    onclick="window.location.href='../../src/auth/client/sign-up.php'">Inscription</button>
            </div>
        </div>

        <div class="flex gap-5 flex-col p-10 border-success border-2 border-dashed rounded-lg shadow-lg w-90">
            <div>
                <span class="font-bold">Je suis un vendeur</span>
                <p class="text-[12px] text-gray-500/50">Je veux valoriser mon travail et mon savoir faire avec mes
                    produits de qualites
                </p>
            </div>
            <div class="flex gap-2">
                <button class="btn btn-success"
                    onclick="window.location.href='../../src/auth/vendeur/login.php'">Connexion</button>
                <button class="btn btn-warning"
                    onclick="window.location.href='../../src/auth/vendeur/sign-up.php'">Inscription</button>
            </div>
        </div>
    </section>

</body>
</html>