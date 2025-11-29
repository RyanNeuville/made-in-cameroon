<?php
session_start();
$page_title = "Mon Profil";

require_once '../../config/db_connect.php';
require_once '../includes/head.php';


require_once '../includes/navbar_client.php';
if (!isset($_SESSION['loggedin']) || $_SESSION['role_id'] != ROLE_CLIENT) {
    header("location: ../src/auth/client/login.php");
    exit;
}

?>

<main class="container mx-auto px-4 py-8 max-w-2xl">
    <h1 class="text-3xl font-bold mb-6 text-gray-800"><i class="fa fa-cog" aria-hidden="true"></i> Mon Profil et
        Paramètres</h1>

    <?php
    // Simulation d'un message PHP après une action
    $status = 'success'; // ou 'error', 'warning'
    $message = 'Vos informations ont été mises à jour avec succès.';

    if (isset($status)): ?>
        <div role="alert" class="alert alert-<?php echo $status; ?> mb-6">
            <svg xmlns="http://www.w3.org/2000/svg" class="stroke-current shrink-0 h-6 w-6" fill="none" viewBox="0 0 24 24">
                <?php if ($status == 'success'): ?>
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
                <?php elseif ($status == 'error'): ?>
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M10 14l2-2m0 0l2-2m-2 2l-2-2m2 2l2 2m7-2a9 9 0 11-18 0 9 9 0 0118 0z" />
                <?php else: ?>
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-3L13.732 4c-.77-1.333-2.694-1.333-3.464 0L3.34 16c-.77 1.333.192 3 1.732 3z" />
                <?php endif; ?>
            </svg>
            <span><?php echo $message; ?></span>
        </div>
    <?php endif; ?>

    <div class="card bg-white shadow-xl p-6">
        <form action="traitement_profil.php" method="POST">
            <div class="grid grid-cols-1 md:grid-cols-2 gap-4 mb-4">
                <div>
                    <label class="label"><span class="label-text">Prénom</span></label>
                    <input type="text" name="prenom" value="Ryan" class="input input-bordered w-full" required />
                </div>
                <div>
                    <label class="label"><span class="label-text">Nom</span></label>
                    <input type="text" name="nom" value="Feussi" class="input input-bordered w-full" required />
                </div>
            </div>

            <div class="mb-4">
                <label class="label"><span class="label-text">Email (Identifiant)</span></label>
                <input type="email" value="ryan.feussi@example.com" class="input input-bordered w-full bg-gray-100"
                    readonly />
            </div>

            <div class="mb-4">
                <label class="label"><span class="label-text">Téléphone</span></label>
                <input type="tel" name="telephone" value="+237 665 123 456" class="input input-bordered w-full" />
            </div>

            <div class="mb-6">
                <label class="label"><span class="label-text">Adresse de Livraison par Défaut</span></label>
                <textarea name="adresse"
                    class="textarea textarea-bordered w-full">Rue de la Paix, Douala, Littoral</textarea>
            </div>

            <button type="submit" class="btn btn-success text-white w-full">Enregistrer les Modifications</button>
        </form>

        <div class="divider">Changer de Mot de Passe</div>

        <form action="traitement_password.php" method="POST">
            <button type="submit" class="btn btn-warning text-white w-full mt-4">Modifier le Mot de Passe</button>
        </form>
    </div>
</main>
<?php require_once '../views/footer.php'; ?>