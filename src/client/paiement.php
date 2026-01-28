<?php
session_start();
require_once '../../config/db_connect.php';

if (!isset($_SESSION['loggedin']) || $_SESSION['role_id'] != ROLE_CLIENT) {
    header("location: ../src/auth/client/login.php");
    exit;
}

// Vérification de l'authentification et d'un panier non vide
if (!isset($_SESSION['loggedin']) || $_SESSION['role_id'] != ROLE_CLIENT || !isset($_SESSION['cart']) || empty($_SESSION['cart'])) {
    header("Location: client_panier.php");
    exit;
}

$page_title = "Paiement de la Commande";
$client_id = $_SESSION['user_id'];

// --- 1. Récupération des données du Panier (du code précédent) ---
$product_ids = array_keys($_SESSION['cart']);
$placeholders = implode(',', array_fill(0, count($product_ids), '?'));

$sql_cart = "SELECT 
    p.product_id, p.name, p.price, p.image_url, p.stock,
    vd.shop_name 
    FROM products p
    JOIN vendeurs_details vd ON p.vendeur_id = vd.vendeur_id
    WHERE p.product_id IN ({$placeholders})";

$stmt_cart = mysqli_prepare($conn, $sql_cart);
$types = str_repeat('i', count($product_ids));
mysqli_stmt_bind_param($stmt_cart, $types, ...$product_ids);
mysqli_stmt_execute($stmt_cart);
$cart_res = mysqli_stmt_get_result($stmt_cart);

$cart_items = [];
$subtotal = 0;
while ($product = mysqli_fetch_assoc($cart_res)) {
    $quantity = $_SESSION['cart'][$product['product_id']];
    $total_item = $product['price'] * $quantity;
    $subtotal += $total_item;
    $cart_items[] = [
        'product' => $product,
        'quantity' => $quantity,
        'total_item' => $total_item
    ];
}

$delivery_fee = !empty($cart_items) ? 4000 : 0;
$total_amount = $subtotal + $delivery_fee;


// --- 2. Récupération des informations de l'utilisateur (pour pré-remplir l'adresse) ---
$stmt_user = mysqli_prepare($conn, "SELECT first_name, address FROM users WHERE user_id = ?");
mysqli_stmt_bind_param($stmt_user, "i", $client_id);
mysqli_stmt_execute($stmt_user);
$user_res = mysqli_stmt_get_result($stmt_user);
$user_data = mysqli_fetch_assoc($user_res);


require_once '../includes/head.php';
require_once '../includes/navbar_client.php';
?>

<main class="container mx-auto px-4 py-8">
    <h1 class="text-4xl font-extrabold mb-8 text-gray-900 flex items-center gap-3">
        <i class="fa fa-credit-card"></i> Finaliser le Paiement
    </h1>

    <div class="lg:flex lg:space-x-8">

        <section class="lg:w-2/3 space-y-8">

            <div class="bg-white p-6 rounded-xl shadow-xl border border-gray-100">
                <h2 class="text-2xl font-bold mb-4 text-gray-800 border-b pb-2">
                    1. Adresse de Livraison
                </h2>
                <form id="payment-form" action="traiter_paiement.php" method="POST" class="space-y-4">
                    <div class="form-control">
                        <label class="label"><span class="label-text font-medium">Nom</span></label>
                        <input type="text" name="full_name"
                            value="<?= htmlspecialchars($user_data['first_name'] ?? '') ?>"
                            class="input input-bordered w-full" required>
                    </div>
                    <div class="form-control">
                        <label class="label"><span class="label-text font-medium">Adresse (Rue, Quartier,
                                Ville)</span></label>
                        <textarea name="address" class="textarea textarea-bordered h-24 w-full"
                            required><?= htmlspecialchars($user_data['address'] ?? '') ?></textarea>
                    </div>
            </div>

            <div class="bg-white p-6 rounded-xl shadow-xl border border-gray-100">
                <h2 class="text-2xl font-bold mb-4 text-gray-800 border-b pb-2">
                    2. Choix du Paiement
                </h2>
                <div class="space-y-3">
                    <label
                        class="flex items-center space-x-3 p-4 bg-gray-50 rounded-lg cursor-pointer hover:bg-gray-100 transition-colors">
                        <input type="radio" name="payment_method" value="mobile_money" class="radio radio-success"
                            checked required>
                        <span class="text-lg font-semibold flex items-center gap-2">
                            Mobile Money (Orange Money / MTN MoMo)
                            <img src="../../public/logo/momo.jpeg" alt="Mobile Money" class="h-6">
                        </span>
                    </label>

                    <label class="flex items-center space-x-3 p-4 bg-gray-50 rounded-lg cursor-not-allowed opacity-70">
                        <input type="radio" name="payment_method" value="card" class="radio radio-success" disabled>
                        <span class="text-lg font-semibold flex items-center gap-2">
                            Carte Bancaire (Visa/Mastercard) <span class="badge badge-info">Bientôt</span>
                            <i class="fa fa-credit-card text-xl"></i>
                        </span>
                    </label>
                </div>
            </div>

        </section>

        <aside class="lg:w-1/3 mt-6 lg:mt-0">
            <div id="summary-section" class="bg-white p-6 rounded-lg shadow-xl sticky top-20">
                <h2 class="text-2xl font-semibold mb-4 text-gray-800">Résumé de la Commande</h2>

                <div class="space-y-2 max-h-40 overflow-y-auto pr-2 mb-4 border-b pb-4">
                    <?php foreach ($cart_items as $item): ?>
                        <div class="flex justify-between text-sm text-gray-600">
                            <span class="truncate"><?= htmlspecialchars($item['product']['name']) ?>
                                (x<?= $item['quantity'] ?>)</span>
                            <span><?= number_format($item['total_item'], 0, ',', ' ') ?> FCFA</span>
                        </div>
                    <?php endforeach; ?>
                </div>

                <div class="space-y-2 text-gray-600">
                    <div class="flex justify-between">
                        <span>Sous-total :</span>
                        <span><?= number_format($subtotal, 0, ',', ' ') ?> FCFA</span>
                    </div>
                    <div class="flex justify-between">
                        <span>Frais de Livraison :</span>
                        <span class="font-semibold"><?= number_format($delivery_fee, 0, ',', ' ') ?> FCFA</span>
                    </div>
                    <div class="divider"></div>
                    <div class="flex justify-between text-xl font-bold text-green-700">
                        <span>Total à Payer :</span>
                        <span id="total-amount-display"><?= number_format($total_amount, 0, ',', ' ') ?> FCFA</span>
                    </div>
                </div>

                <button type="submit" id="process-payment-btn" class="btn btn-success btn-lg btn-block mt-6 text-white">
                    Payer <?= number_format($total_amount, 0, ',', ' ') ?> FCFA
                </button>
                </form>
            </div>

            <div id="loading-screen"
                class="hidden fixed inset-0 bg-white/95 z-50 flex items-center justify-center flex-col p-8">
                <span class="loading loading-spinner loading-lg text-success mb-6"></span>
                <h2 class="text-3xl font-bold text-gray-800 mb-4">Traitement de votre paiement...</h2>
                <p class="text-lg text-gray-600 text-center">
                    Nous vérifions la disponibilité des articles et sécurisons votre transaction.
                    <br>Veuillez patienter quelques instants.
                </p>
            </div>

        </aside>
    </div>
</main>

<script>
    document.getElementById('payment-form').addEventListener('submit', function (e) {
        e.preventDefault(); // Empêche l'envoi standard du formulaire

        const form = e.target;
        const submitBtn = document.getElementById('process-payment-btn');
        const loadingScreen = document.getElementById('loading-screen');

        // 1. Désactiver le bouton et afficher l'écran de chargement
        submitBtn.disabled = true;
        submitBtn.classList.add('loading', 'btn-disabled');
        submitBtn.textContent = 'En cours...';
        loadingScreen.classList.remove('hidden');

        // 2. Simulation d'un délai (style "normale" de transaction)
        setTimeout(function () {
            // 3. Envoyer le formulaire au backend après le délai
            form.submit();
        }, 3000); // Délai de 3 secondes pour l'effet "loader"
    });
</script>

<?php require_once '../views/footer.php'; ?>