<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="../../../public/logo/logo.png">
    <link rel="stylesheet" href="../../../public/output.css">
    <title>Inscription - Client</title>
</head>

<body>
    <div class="flex items-center justify-center h-screen p-4">
        <form action="">
            <fieldset class="fieldset bg-base-200 border-base-300 rounded-box border p-4">

                <legend class="fieldset-legend"><img src="../../../public/logo/logo.png" class="w-8 h-8"
                        alt="">Inscription client</legend>
                        

                <div class="flex gap-2 w-full">
                    <div>
                        <label class="label">Votre nom ?</label>
                        <input type="password" class="input" placeholder="louis albert" required />
                    </div>

                    <div>
                        <label class="label">Votre prenom ?</label>
                        <input type="password" class="input" placeholder="ryan feussi" required />
                    </div>
                </div>

                <label class="label">Email</label>
                <input type="email" class="input w-full" placeholder="example@gmail.com" required />

                <div class="flex gap-2">
                    <div>
                        <label class="label">Password</label>
                        <input type="password" class="input" placeholder="Password" required />
                    </div>

                    <div>
                        <label class="label">Reppeat Password</label>
                        <input type="password" class="input" placeholder="Password" required />
                    </div>
                </div>

                <label class="label">Numero de telephone</label>
                <input type="email" class="input w-full" placeholder="+237 665 12 34 56" required />

                <button type="submit" class="btn btn-success mt-4">Inscription</button>
                <span>Avez vous deja un compte ? <a href="../client/sign-up.php"
                        class="text-success">Connectez-vous</a></span>
            </fieldset>
        </form>
    </div>
</body>
<?php include_once '../../views/footer.php' ?>

</html>