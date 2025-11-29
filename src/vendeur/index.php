<?php
session_start();
require_once '../../config/db_connect.php';

// 1. Vérification de l'authentification et du rôle
if (!isset($_SESSION['loggedin']) || $_SESSION['role_id'] != ROLE_VENDEUR) {
    header("location: ../auth/vendeur/login.php");
    exit;
}

$title = "Tableau de Bord Vendeur";
$user_id = $_SESSION['user_id'];
$vendeur_id = null; // Sera récupéré ci-dessous

// 2. Récupérer le vendeur_id à partir du user_id
$stmt_v_id = mysqli_prepare($conn, "SELECT vendeur_id, shop_name FROM vendeurs_details WHERE user_id = ?");
mysqli_stmt_bind_param($stmt_v_id, "i", $user_id);
mysqli_stmt_execute($stmt_v_id);
$result_v_id = mysqli_stmt_get_result($stmt_v_id);
$vendeur_data = mysqli_fetch_assoc($result_v_id);
$vendeur_id = $vendeur_data['vendeur_id'];
$shop_name = $vendeur_data['shop_name'];
mysqli_stmt_close($stmt_v_id);


// 3. Récupération des Statistiques (Dashboard Stats)
$stats = [
    'revenue' => 0,
    'orders_count' => 0,
    'products_count' => 0,
];

// Total des produits
$res_products = mysqli_query($conn, "SELECT COUNT(product_id) AS count FROM products WHERE vendeur_id = $vendeur_id");
$stats['products_count'] = mysqli_fetch_assoc($res_products)['count'];

// Revenu total (simulation basée sur les articles vendus, état 'delivered')
$res_revenue = mysqli_query(
    $conn,
    "SELECT SUM(oi.quantity * oi.price_at_time) AS total_revenue, COUNT(DISTINCT o.order_id) AS total_orders
     FROM order_items oi
     JOIN orders o ON oi.order_id = o.order_id
     JOIN products p ON oi.product_id = p.product_id
     WHERE p.vendeur_id = $vendeur_id AND o.status = 'delivered'"
);

$revenue_data = mysqli_fetch_assoc($res_revenue);
$stats['revenue'] = number_format($revenue_data['total_revenue'] ?? 0, 0, ',', ' ');
$stats['orders_count'] = $revenue_data['total_orders'] ?? 0;


// 4. Récupération des Produits et Commandes Récentes (Limité à 5 pour la vue)
$products_list_query = "SELECT product_id, name, price, stock, (SELECT COUNT(oi.item_id) FROM order_items oi JOIN products p ON oi.product_id = p.product_id WHERE p.product_id = products.product_id) as sold, is_active 
                        FROM products 
                        WHERE vendeur_id = $vendeur_id 
                        ORDER BY creation_date DESC 
                        LIMIT 5";
$products_res = mysqli_query($conn, $products_list_query);

$orders_list_query = "SELECT 
    o.order_id, o.status, o.total_amount, 
    CONCAT(u.first_name, ' ', u.last_name) AS customer_name,
    GROUP_CONCAT(oi.product_name_snapshot SEPARATOR ', ') AS product_names
    FROM orders o
    JOIN users u ON o.client_id = u.user_id
    JOIN order_items oi ON o.order_id = oi.order_id
    JOIN products p ON oi.product_id = p.product_id
    WHERE p.vendeur_id = $vendeur_id
    GROUP BY o.order_id
    ORDER BY o.order_date DESC
    LIMIT 5";

$orders_res = mysqli_query($conn, $orders_list_query);

// Inclure les includes nécessaires
require_once '../includes/head.php';
require_once '../includes/navbar_vendeur.php';
?>

<main class="container mx-auto px-4 py-8">

    <?php if (isset($_SESSION['message'])): ?>
        <div role="alert" class="alert alert-<?php echo $_SESSION['message_type']; ?> mb-6">
            <?php echo $_SESSION['message']; ?>
        </div>
        <?php unset($_SESSION['message']);
        unset($_SESSION['message_type']); ?>
    <?php endif; ?>

    <section class="flex justify-between items-center mb-6 pb-4">
        <div>
            <h2 class="text-3xl font-extrabold text-gray-900">Dashboard de <?= htmlspecialchars($shop_name) ?></h2>
            <p class="text-gray-500">Gérez vos produits, commandes et performances.</p>
        </div>
        <button onclick="document.getElementById('productModal').showModal()"
            class="btn btn-success text-white font-semibold">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24"
                stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4" />
            </svg>
            Ajouter un produit
        </button>
    </section>

    <section class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6 mb-10">
        <div class="card bg-white shadow-lg border-l-4 border-success">
            <div class="card-body p-5">
                <div class="flex items-center justify-between">
                    <div>
                        <div class="text-sm font-medium text-gray-500">Revenu total (Livrées)</div>
                        <div class="text-3xl font-bold text-success mt-1"><?= $stats['revenue'] ?> FCFA</div>
                    </div>
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-10 w-10 text-success/50" fill="none"
                        viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V4m0 12v4m-6-2h12" />
                    </svg>
                </div>
            </div>
        </div>
        <div class="card bg-white shadow-lg border-l-4 border-warning">
            <div class="card-body p-5">
                <div class="flex items-center justify-between">
                    <div>
                        <div class="text-sm font-medium text-gray-500">Commandes Totales (Livrées)</div>
                        <div class="text-3xl font-bold text-warning mt-1"><?= $stats['orders_count'] ?></div>
                    </div>
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-10 w-10 text-warning/50" fill="none"
                        viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M20 7l-8-4-8 4m16 0l-8 4m8-4v10l-8 4m0-10L4 7m8 4v10M4 7v10l8 4" />
                    </svg>
                </div>
            </div>
        </div>
        <div class="card bg-white shadow-lg border-l-4 border-info">
            <div class="card-body p-5">
                <div class="flex items-center justify-between">
                    <div>
                        <div class="text-sm font-medium text-gray-500">Produits en ligne</div>
                        <div class="text-3xl font-bold text-info mt-1"><?= $stats['products_count'] ?></div>
                    </div>
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-10 w-10 text-info/50" fill="none"
                        viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2" />
                    </svg>
                </div>
            </div>
        </div>
        <div class="card bg-white shadow-lg border-l-4 border-primary">
            <div class="card-body p-5">
                <div class="flex items-center justify-between">
                    <div>
                        <div class="text-sm font-medium text-gray-500">Croissance (Mois)</div>
                        <div class="text-3xl font-bold text-primary mt-1">+15%</div>
                    </div>
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-10 w-10 text-primary/50" fill="none"
                        viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M13 7h8m0 0v8m0-8l-8 8-4-4-6 6" />
                    </svg>
                </div>
            </div>
        </div>
    </section>

    <div class="lg:flex lg:space-x-8">

        <section class="lg:w-1/2 section mb-8 lg:mb-0">
            <h3 class="text-2xl font-semibold mb-4 text-gray-800 pb-2">Mes Produits (Récents)</h3>
            <div class="space-y-4 bg-white p-4 rounded-xl shadow">

                <?php if (mysqli_num_rows($products_res) > 0): ?>
                    <?php while ($product = mysqli_fetch_assoc($products_res)): ?>
                        <div class="flex items-center p-3 border rounded-lg hover:bg-gray-50 transition">
                            <img src="/<?= $product['image_url'] ?? htmlspecialchars('uploads/produits/default.png') ?>"
                                alt="<?= htmlspecialchars($product['name']) ?>"
                                class="w-16 h-16 object-cover rounded-md mr-4" />
                            <div class="flex-grow">
                                <div class="font-medium text-gray-800"><?= htmlspecialchars($product['name']) ?></div>
                                <div class="text-sm text-gray-500">
                                    <?= number_format($product['price'], 0, ',', ' ') ?> FCFA • Stock: <?= $product['stock'] ?>
                                    • Vendus: <?= $product['sold'] ?>
                                </div>
                            </div>
                            <div class="flex items-center space-x-2">
                                <span
                                    class="badge badge-sm <?= $product['is_active'] ? 'badge-success' : 'badge-error' ?> text-white">
                                    <?= $product['is_active'] ? 'Actif' : 'Inactif' ?>
                                </span>
                                <a href="vendeur_edit_produit.php?id=<?= $product['product_id'] ?>"
                                    class="btn btn-ghost btn-xs text-info tooltip" data-tip="Modifier">
                                    <i class="fa-solid fa-pen-to-square"></i>
                                </a>
                            </div>
                        </div>
                    <?php endwhile; ?>
                <?php else: ?>
                    <p class="text-center py-6 text-gray-500">Vous n'avez pas encore de produits en ligne. Ajoutez-en un !
                    </p>
                <?php endif; ?>
            </div>
            <div class="text-right mt-4">
                <a href="produits.php" class="text-sm hover:text-white font-medium btn btn-success">Voir tous
                    les produits &rarr;</a>
            </div>
        </section>

        <section class="lg:w-1/2 section">
            <h3 class="text-2xl font-semibold mb-4 text-gray-800 pb-2">Commandes Récentes</h3>
            <div class="overflow-x-auto bg-white p-4 rounded-xl shadow">
                <table class="table table-zebra w-full">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Client</th>
                            <th>Produits</th>
                            <th>Statut</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php if (mysqli_num_rows($orders_res) > 0): ?>
                            <?php while ($order = mysqli_fetch_assoc($orders_res)): ?>
                                <?php
                                $status_class = match ($order['status']) {
                                    'pending' => 'badge-warning',
                                    'paid' => 'badge-info',
                                    'shipped' => 'badge-primary',
                                    'delivered' => 'badge-success',
                                    default => 'badge-ghost',
                                };
                                ?>
                                <tr>
                                    <td class="font-bold">#<?= $order['order_id'] ?></td>
                                    <td><?= htmlspecialchars($order['customer_name']) ?></td>
                                    <td class="text-sm text-gray-600"><?= htmlspecialchars($order['product_names']) ?></td>
                                    <td>
                                        <span class="badge <?= $status_class ?> text-white font-medium">
                                            <?= ucfirst($order['status']) ?>
                                        </span>
                                    </td>
                                </tr>
                            <?php endwhile; ?>
                        <?php else: ?>
                            <tr>
                                <td colspan="4" class="text-center py-4 text-gray-500">Aucune commande récente pour
                                    l'instant.</td>
                            </tr>
                        <?php endif; ?>
                    </tbody>
                </table>
            </div>
            <div class="text-right mt-4">
                <a href="commandes.php" class="text-sm btn btn-success hover:text-white font-medium">Voir
                    toutes les commandes &rarr;</a>
            </div>
        </section>

    </div>
</main>


<dialog id="productModal" class="modal">
    <div class="modal-box w-11/12 max-w-lg">
        <form method="dialog">
            <button class="btn btn-sm btn-circle btn-ghost absolute right-2 top-2">✕</button>
        </form>
        <h3 class="font-bold text-2xl text-green-700 mb-6">Ajouter un Nouveau Produit</h3>

        <form action="traitement_ajout_produit.php" method="POST" enctype="multipart/form-data" class="space-y-4">

            <div class="form-control">
                <label class="label"><span class="label-text">Nom du produit</span></label>
                <input type="text" name="productName" placeholder="Ex: Pagne brodé Ndop"
                    class="input input-bordered w-full" required />
            </div>

            <div class="grid grid-cols-2 gap-4">
                <div class="form-control">
                    <label class="label"><span class="label-text">Prix (FCFA)</span></label>
                    <input type="number" name="productPrice" placeholder="15000" min="0"
                        class="input input-bordered w-full" required />
                </div>
                <div class="form-control">
                    <label class="label"><span class="label-text">Stock</span></label>
                    <input type="number" name="productStock" placeholder="10" min="0"
                        class="input input-bordered w-full" required />
                </div>
            </div>

            <div class="form-control">
                <label class="label"><span class="label-text">Catégorie</span></label>
                <select name="productCategory" class="select select-bordered w-full" required>
                    <option value="" disabled selected>Sélectionnez une catégorie</option>
                    <?php
                    $res_cats = mysqli_query($conn, "SELECT category_id, category_name FROM categories ORDER BY category_name");
                    while ($cat = mysqli_fetch_assoc($res_cats)):
                        ?>
                        <option value="<?= $cat['category_id'] ?>"><?= htmlspecialchars($cat['category_name']) ?></option>
                    <?php endwhile; ?>
                </select>
            </div>

            <div class="form-control">
                <label class="label"><span class="label-text">Description</span></label>
                <textarea name="productDescription" rows="3" class="textarea textarea-bordered w-full"
                    required></textarea>
            </div>

            <div class="form-control">
                <label class="label"><span class="label-text">Image du produit (JPG, PNG)</span></label>
                <input type="file" name="productImage" class="file-input file-input-bordered file-input-success w-full"
                    accept="image/*" required />
            </div>

            <button type="submit" class="btn btn-success text-white w-full mt-6">
                Ajouter le produit
            </button>
        </form>
    </div>
</dialog>

<?php require_once '../views/footer.php'; ?>