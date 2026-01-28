<?php
session_start();
require_once '../../config/db_connect.php';

// Vérification de l'authentification et du rôle
if (!isset($_SESSION['loggedin']) || $_SESSION['role_id'] != ROLE_VENDEUR) {
    header("location: /src/auth/vendeur/login.php");
    exit;
}

$title = "Mes Produits - Espace Vendeur";
$user_id = $_SESSION['user_id'];

// 1. Récupérer le vendeur_id
$stmt_v_id = mysqli_prepare($conn, "SELECT vendeur_id FROM vendeurs_details WHERE user_id = ?");
mysqli_stmt_bind_param($stmt_v_id, "i", $user_id);
mysqli_stmt_execute($stmt_v_id);
$result_v_id = mysqli_stmt_get_result($stmt_v_id);
$vendeur_id = mysqli_fetch_assoc($result_v_id)['vendeur_id'];
mysqli_stmt_close($stmt_v_id);


// 2. Logique de Filtrage et Pagination
$limit = 10;
$page = isset($_GET['p']) ? (int) $_GET['p'] : 1;
$start = ($page - 1) * $limit;

// Filtre d'état
$status_filter = isset($_GET['status']) && $_GET['status'] == 'inactive' ? 0 : 1;
$search_term = isset($_GET['search']) ? mysqli_real_escape_string($conn, $_GET['search']) : '';


// 3. Requête Principale
$where_clause = "vendeur_id = $vendeur_id AND is_active = $status_filter";
if (!empty($search_term)) {
    $where_clause .= " AND name LIKE '%{$search_term}%'";
}

$sql_products = "SELECT product_id, name, price, stock, image_url, is_active, 
                 (SELECT COUNT(oi.item_id) FROM order_items oi JOIN products p ON oi.product_id = p.product_id WHERE p.product_id = products.product_id) as sold 
                 FROM products 
                 WHERE {$where_clause}
                 ORDER BY creation_date DESC 
                 LIMIT {$start}, {$limit}";

$products_res = mysqli_query($conn, $sql_products);

// Pour la pagination (nombre total)
$sql_count = "SELECT COUNT(product_id) AS total FROM products WHERE {$where_clause}";
$total_rows = mysqli_fetch_assoc(mysqli_query($conn, $sql_count))['total'];
$total_pages = ceil($total_rows / $limit);

require_once '../includes/head.php';
require_once '../includes/navbar_vendeur.php';
?>

<main class="container mx-auto px-4 py-8">
    <h1 class="text-3xl font-extrabold text-gray-900 pb-2 mb-6">Gestion des Produits</h1>

    <div class="flex flex-col md:flex-row justify-between items-center bg-white p-4 rounded-xl shadow mb-6">
        <form action="vendeur_produits.php" method="GET"
            class="flex items-center space-x-4 w-full md:w-auto mb-4 md:mb-0">
            <select name="status" class="select select-bordered select-sm">
                <option value="active" <?= $status_filter == 1 ? 'selected' : '' ?>>Produits Actifs</option>
                <option value="inactive" <?= $status_filter == 0 ? 'selected' : '' ?>>Produits Inactifs</option>
            </select>
            <input type="text" name="search" placeholder="Rechercher par nom..."
                class="input input-bordered input-sm w-full" value="<?= htmlspecialchars($search_term) ?>" />
            <button type="submit" class="btn btn-sm btn-success text-white">Filtrer</button>
            <a href="vendeur_produits.php" class="btn btn-sm btn-ghost">Reset</a>
        </form>

        <button onclick="document.getElementById('productModal').showModal()"
            class="btn btn-success text-white font-semibold">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24"
                stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4" />
            </svg>
            Ajouter un produit
        </button>
    </div>

    <div class="overflow-x-auto bg-white rounded-xl shadow">
        <table class="table table-zebra w-full">
            <thead>
                <tr>
                    <th></th>
                    <th>Produit</th>
                    <th>Prix</th>
                    <th>Stock</th>
                    <th>Vendus</th>
                    <th>Statut</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                <?php if (mysqli_num_rows($products_res) > 0): ?>
                    <?php while ($product = mysqli_fetch_assoc($products_res)): ?>
                        <tr>
                            <td>
                                <img src="/<?= htmlspecialchars($product['image_url'] ?? 'uploads/default.jpg') ?>"
                                    alt="<?= htmlspecialchars($product['name']) ?>" class="w-12 h-12 object-cover rounded" />
                            </td>
                            <td class="font-bold"><?= htmlspecialchars($product['name']) ?></td>
                            <td><?= number_format($product['price'], 0, ',', ' ') ?> FCFA</td>
                            <td class="<?= $product['stock'] < 5 ? 'text-error font-bold' : '' ?>"><?= $product['stock'] ?></td>
                            <td><?= $product['sold'] ?></td>
                            <td>
                                <span
                                    class="badge <?= $product['is_active'] ? 'badge-success' : 'badge-error' ?> text-white font-medium">
                                    <?= $product['is_active'] ? 'Actif' : 'Inactif' ?>
                                </span>
                            </td>
                            <td>
                                <div class="flex space-x-2">
                                    <a href="vendeur_edit_produit.php?id=<?= $product['product_id'] ?>"
                                        class="btn btn-info btn-xs text-white tooltip" data-tip="Modifier">
                                        <i class="fa-solid fa-pen-to-square"></i>
                                    </a>
                                    <form action="traitement_produit_action.php" method="POST">
                                        <input type="hidden" name="product_id" value="<?= $product['product_id'] ?>">
                                        <button type="submit" name="action"
                                            value="<?= $product['is_active'] ? 'deactivate' : 'activate' ?>"
                                            class="btn btn-error btn-xs text-white tooltip"
                                            data-tip="<?= $product['is_active'] ? 'Désactiver' : 'Activer' ?>">
                                            <i class="fa-solid fa-trash"></i>
                                        </button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                    <?php endwhile; ?>
                <?php else: ?>
                    <tr>
                        <td colspan="7" class="text-center py-6 text-gray-500">Aucun produit trouvé avec ce filtre.</td>
                    </tr>
                <?php endif; ?>
            </tbody>
        </table>
    </div>

    <div class="flex justify-center mt-6">
        <div class="join">
            <?php for ($i = 1; $i <= $total_pages; $i++): ?>
                <a href="?p=<?= $i ?>&status=<?= isset($_GET['status']) ? $_GET['status'] : 'active' ?>&search=<?= htmlspecialchars($search_term) ?>"
                    class="join-item btn <?= $i == $page ? 'btn-active btn-success text-white' : '' ?>">
                    <?= $i ?>
                </a>
            <?php endfor; ?>
        </div>
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