<?php 
session_start();
require_once '../../config/db_connect.php'; 

// Vérification de l'authentification
if (!isset($_SESSION['loggedin']) || $_SESSION['role_id'] != ROLE_CLIENT) {
    header("location: connexion_client.php");
    exit;
}

$page_title = "Votre Panier";
$client_id = $_SESSION['user_id'];

// --- Logique de gestion du panier (Simulation/Structure de session) ---
// Votre panier devrait ressembler à ceci : $_SESSION['cart'] = [ product_id => quantity, ... ]
// Si vous utilisez une table temporaire pour les paniers, l'approche serait différente.
// Nous allons charger les données du panier depuis $_SESSION

if (!isset($_SESSION['cart']) || empty($_SESSION['cart'])) {
    $cart_items = [];
    $subtotal = 0;
} else {
    // Récupérer les IDs des produits dans le panier
    $product_ids = array_keys($_SESSION['cart']);
    $placeholders = implode(',', array_fill(0, count($product_ids), '?'));

    // Requête pour récupérer les détails des produits du panier
    $sql_cart = "SELECT 
        p.product_id, p.name, p.price, p.image_url, p.stock,
        vd.shop_name 
        FROM products p
        JOIN vendeurs_details vd ON p.vendeur_id = vd.vendeur_id
        WHERE p.product_id IN ({$placeholders})";
    
    $stmt_cart = mysqli_prepare($conn, $sql_cart);
    // Bind des paramètres (tous sont des entiers 'i')
    $types = str_repeat('i', count($product_ids));
    mysqli_stmt_bind_param($stmt_cart, $types, ...$product_ids);
    mysqli_stmt_execute($stmt_cart);
    $cart_res = mysqli_stmt_get_result($stmt_cart);

    $cart_items = [];
    $subtotal = 0;
    while ($product = mysqli_fetch_assoc($cart_res)) {
        $product_id = $product['product_id'];
        $quantity = $_SESSION['cart'][$product_id];
        $total_item = $product['price'] * $quantity;
        $subtotal += $total_item;

        $cart_items[] = [
            'product' => $product,
            'quantity' => $quantity,
            'total_item' => $total_item
        ];

        // Mettre à jour la session si la quantité dépasse le stock
        if ($quantity > $product['stock'] && $product['stock'] > 0) {
             // Ajuster la quantité au stock maximal disponible
             $_SESSION['cart'][$product_id] = $product['stock'];
             $_SESSION['message'] = "Attention : La quantité de " . $product['name'] . " a été ajustée au stock disponible.";
             $_SESSION['message_type'] = "warning";
             // Redirection immédiate pour mettre à jour la vue et les totaux
             header("Location: panier.php");
             exit;
        }
    }
}

// Calcul des totaux
$delivery_fee = !empty($cart_items) ? 4000 : 0; // Exemple de frais de livraison
$total_amount = $subtotal + $delivery_fee;

require_once '../includes/head.php';
require_once '../includes/navbar_client.php';
?>

<main class="container mx-auto px-4 py-8">
    <h1 class="text-3xl font-bold mb-6 text-gray-800"> <i class="fa fa-shopping-cart"></i> Votre Panier</h1>

    <div class="lg:flex lg:space-x-8">
        <section class="lg:w-2/3 space-y-4">
            
            <?php if (isset($_SESSION['message'])): ?>
                <div role="alert" class="alert alert-<?= $_SESSION['message_type'] ?>">
                    <i class="fa fa-exclamation-triangle"></i>
                    <span><?= htmlspecialchars($_SESSION['message']) ?></span>
                </div>
                <?php unset($_SESSION['message']); unset($_SESSION['message_type']); ?>
            <?php endif; ?>

            <?php if (!empty($cart_items)): ?>
                <?php foreach ($cart_items as $item): ?>
                    <?php 
                        $product = $item['product'];
                        $quantity = $item['quantity'];
                        $image_path = "/" . htmlspecialchars($product['image_url'] ?? 'uploads/default.jpg'); 
                    ?>
                    <div class="card card-side bg-white shadow-xl p-4">
                        <figure>
                            <img src="<?= $image_path ?>"
                                alt="<?= htmlspecialchars($product['name']) ?>" class="w-24 h-24 object-cover rounded-lg" />
                        </figure>
                        <div class="card-body p-2 ml-4">
                            <h2 class="card-title text-lg"><?= htmlspecialchars($product['name']) ?></h2>
                            <p class="text-sm text-gray-500">Vendeur : <?= htmlspecialchars($product['shop_name']) ?></p>
                            
                            <div class="flex items-center justify-between mt-2">
                                <span class="text-lg font-bold text-green-700"><?= number_format($item['total_item'], 0, ',', ' ') ?> FCFA</span>
                                
                                <form method="POST" action="traitement_panier.php" class="flex items-center">
                                    <input type="hidden" name="product_id" value="<?= $product['product_id'] ?>">
                                    
                                    <div class="join">
                                        <button type="submit" name="action" value="decrease" class="btn btn-sm btn-outline join-item" title="Diminuer la quantité">-</button>
                                        <input type="text" value="<?= $quantity ?>"
                                            class="input input-bordered input-sm w-12 text-center join-item bg-white" readonly>
                                        <button type="submit" name="action" value="increase" class="btn btn-sm btn-outline join-item" title="Augmenter la quantité" <?= ($quantity >= $product['stock']) ? 'disabled' : '' ?>>+</button>
                                    </div>
                                    
                                    <button type="submit" name="action" value="remove" class="btn btn-sm btn-error btn-square text-white ml-4" title="Supprimer">
                                        <i class="fa fa-trash"></i>
                                    </button>
                                </form>
                            </div>
                            <?php if ($product['stock'] <= 5): ?>
                                <p class="text-xs text-warning mt-1">Stock restant : <?= $product['stock'] ?> unités</p>
                            <?php endif; ?>
                        </div>
                    </div>
                <?php endforeach; ?>
            <?php else: ?>
                <div class="text-center py-10 bg-white rounded-xl shadow-md">
                    <p class="text-xl text-gray-500">Votre panier est vide.</p>
                    <a href="index.php" class="btn btn-success mt-4 text-white">Ajouter des produits</a>
                </div>
            <?php endif; ?>

        </section>

        <aside class="lg:w-1/3 mt-6 lg:mt-0">
            <div class="bg-white p-6 rounded-lg shadow-xl sticky top-20">
                <h2 class="text-2xl font-semibold mb-4 text-gray-800">Résumé de Commande</h2>
                <div class="space-y-2 text-gray-600">
                    <div class="flex justify-between">
                        <span>Sous-total (<?= count($cart_items) ?> articles) :</span>
                        <span><?= number_format($subtotal, 0, ',', ' ') ?> FCFA</span>
                    </div>
                    <div class="flex justify-between">
                        <span>Frais de Livraison :</span>
                        <span class="text-warning font-semibold"><?= number_format($delivery_fee, 0, ',', ' ') ?> FCFA</span>
                    </div>
                    <div class="divider"></div>
                    <div class="flex justify-between text-xl font-bold text-green-700">
                        <span>Total :</span>
                        <span><?= number_format($total_amount, 0, ',', ' ') ?> FCFA</span>
                    </div>
                </div>
                
                <form action="paiement.php" method="POST">
                    <button class="btn btn-success btn-lg btn-block mt-6 text-white" <?= empty($cart_items) ? 'disabled' : '' ?>>
                        Procéder au Paiement
                    </button>
                </form>
            </div>
        </aside>
    </div>
</main>
<?php require_once '../views/footer.php'; ?>