<?php
session_start();
require_once '../../config/db_connect.php';

// Vérification de l'authentification et du rôle
if (!isset($_SESSION['loggedin']) || $_SESSION['role_id'] != ROLE_VENDEUR) {
    header("location: /src/auth/vendeur/login.php");
    exit;
}

$title = "Mon Profil Vendeur";
$user_id = $_SESSION['user_id'];

// 1. Récupération des données du Vendeur (users + vendeurs_details)
$sql_profile = "SELECT 
    u.first_name, u.last_name, u.email, u.phone_number,
    vd.shop_name, vd.activity_description, vd.mobile_money_account, vd.niu_number,
    r.region_name
    FROM users u
    JOIN vendeurs_details vd ON u.user_id = vd.user_id
    JOIN regions r ON vd.region_id = r.region_id
    WHERE u.user_id = ?";

$stmt_profile = mysqli_prepare($conn, $sql_profile);
mysqli_stmt_bind_param($stmt_profile, "i", $user_id);
mysqli_stmt_execute($stmt_profile);
$profile = mysqli_fetch_assoc(mysqli_stmt_get_result($stmt_profile));
mysqli_stmt_close($stmt_profile);

// 2. Gestion du formulaire de mise à jour (Simplifié pour l'exemple)
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['update_profile'])) {
    // La logique de TRAITEMENT_MISE_A_JOUR_PROFIL.PHP devrait être ici
    // Utiliser des requêtes préparées pour UPDATE dans `users` et `vendeurs_details`
    // Afficher un message de succès ou d'erreur dans $_SESSION['message']
}

require_once '../includes/head.php';
require_once '../includes/navbar_vendeur.php';
?>

<main class="container mx-auto px-4 py-8">
    <h1 class="text-3xl font-extrabold text-gray-900 pb-2 mb-6">Mon Profil et Paramètres</h1>

    <?php if (isset($_SESSION['message'])): ?>
        <div role="alert" class="alert alert-<?php echo $_SESSION['message_type']; ?> mb-6">
            <?php echo $_SESSION['message']; ?>
        </div>
        <?php unset($_SESSION['message']);
        unset($_SESSION['message_type']); ?>
    <?php endif; ?>

    <form method="POST" class="bg-white p-8 rounded-xl shadow space-y-6">
        <input type="hidden" name="update_profile" value="1">

        <h2 class="text-xl font-semibold text-green-700 border-b pb-1">Informations Boutique</h2>
        <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
            <div class="form-control">
                <label class="label"><span class="label-text">Nom de la Boutique</span></label>
                <input type="text" name="shop_name" value="<?= htmlspecialchars($profile['shop_name']) ?>"
                    class="input input-bordered w-full" required />
            </div>
            <div class="form-control">
                <label class="label"><span class="label-text">Région de Résidence</span></label>
                <input type="text" value="<?= htmlspecialchars($profile['region_name']) ?>"
                    class="input input-bordered w-full bg-gray-100" readonly />
            </div>
        </div>
        <div class="form-control">
            <label class="label"><span class="label-text">Description de l'activité</span></label>
            <textarea name="activity_description" rows="3"
                class="textarea textarea-bordered w-full"><?= htmlspecialchars($profile['activity_description']) ?></textarea>
        </div>

        <h2 class="text-xl font-semibold text-green-700 border-b pb-1 pt-4">Coordonnées et Paiement</h2>
        <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
            <div class="form-control">
                <label class="label"><span class="label-text">Email (Non Modifiable ici)</span></label>
                <input type="email" value="<?= htmlspecialchars($profile['email']) ?>"
                    class="input input-bordered w-full bg-gray-100" readonly />
            </div>
            <div class="form-control">
                <label class="label"><span class="label-text">Numéro de Téléphone</span></label>
                <input type="tel" name="phone_number" value="<?= $profile['mobile_money_account'] ?>"
                    class="input input-bordered w-full" />
            </div>
        </div>
        <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
            <div class="form-control">
                <label class="label"><span class="label-text">N° Compte Mobile Money (Paiement)</span></label>
                <input type="tel" name="mobile_money_account"
                    value="<?= htmlspecialchars($profile['mobile_money_account']) ?>"
                    class="input input-bordered w-full" required />
            </div>
            <div class="form-control">
                <label class="label"><span class="label-text">Numéro Identifiant Fiscal Unique (NIU)</span></label>
                <input type="text" name="niu_number" value="<?= $profile['niu_number'] ?>"
                    class="input input-bordered w-full bg-gray-100" required readonly/>
            </div>
        </div>

        <div class="flex justify-end pt-4">
            <button type="submit" class="btn btn-lg btn-success text-white">
                Enregistrer les Modifications
            </button>
        </div>
    </form>
</main>
<?php require_once '../views/footer.php'; ?>