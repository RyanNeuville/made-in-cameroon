<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="../../../public/logo/logo.png">
    <link rel="stylesheet" href="../../../public/output.css">
    <title>Inscription - Vendeur</title>
</head>

<body>
    <div class="flex items-center justify-center h-screen p-4">
        <form action="">
            <center>
                <a href="../../../index.php">
                    <img src="../../../public/logo/text-logo.png" class="w-32" alt="">
                </a>
            </center>
            <fieldset class="fieldset bg-base-200 border-base-300 rounded-box border p-4 mt-20">

                <legend class="fieldset-legend"><img src="../../../public/logo/logo.png" class="w-8 h-8"
                        alt="">Inscription Vendeur</legend>


                <div class="flex gap-2 w-full">
                    <div>
                        <label class="label">Votre nom ?</label>
                        <input type="text" class="input" placeholder="louis albert" required />
                    </div>

                    <div>
                        <label class="label">Votre prenom ?</label>
                        <input type="text" class="input" placeholder="ryan feussi" required />
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

                <label class="label">N° de Compte Mobile Money (Paiement)</label>
                <input type="email" class="input w-full" placeholder="+237 665 12 34 56" required />

                <div class="flex gap-2">
                    <div>
                        <label class="label">Nom boutique</label>
                        <input type="text" class="input" placeholder="Salim fashon" required />
                    </div>

                    <div>
                        <label class="label">Region de residence</label>
                        <select name="" class="select" id="" required>
                            <option value="LITTORAL - Douala">LITTORAL - DOUALA</option>
                            <option value="CENTRE - Yaounde">CENTRE - YAOUNDE</option>
                            <option value="EST - Bertoua">EST - BERTOUA</option>
                            <option value="EXTREME-NORD - Maroua">EXTREME-NOR - MAROUA</option>
                            <option value="ADAMAOUA - Ngoundere">ADAMAOUA - NGAOUNDERE</option>
                            <option value="NORD - Garoua">NORD - GAROUA</option>
                            <option value="NORD-OUEST - Bambenda">NORD-OUEST - BAMENDA</option>
                            <option value="SUD - Ebolowa">SUD - EBOLOWA</option>
                            <option value="SUD-OUEST - Buea">SUD-OUEST BUEA</option>
                            <option value="OUEST - Bafoussam">OUEST - BAFOUSSAM</option>
                        </select>
                    </div>
                </div>

                <label class="label">Description de l'activite</label>
                <textarea class="textarea w-full min-h-10 max-h-10"
                    placeholder="ex: Je suis agriculteur et je propose des cacao de tres bonne qualite "></textarea>

                <label class="label">Numéro d'Identifiant fiscal Unique (NIU)</label>
                <input type="text" class="input w-full" placeholder="ex: 12GSRGDLF8892JD">

                <div class="flex gap-2 flex-col md:flex-row">
                    <div class="flex flex-col w-full">
                        <label class="label">Votre Carte d'identite CNI</label>
                        <input type="file" class="file-input w-full text-[11px]" />
                    </div>
                    <div class="flex flex-col w-full">
                        <label class="label">Votre Photo personnel</label>
                        <input type="file" class="file-input w-full text-[11px]" />
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