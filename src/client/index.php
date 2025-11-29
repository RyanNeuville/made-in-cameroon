<?php
session_start();
require_once '../../config/db_connect.php';

// --- Configuration des paramètres de la page ---
$page_title = "Catalogue des Produits Locaux";
$limit = 9; // Nombre de produits par page
$page = isset($_GET['p']) ? (int) $_GET['p'] : 1;
$start = ($page - 1) * $limit;

// --- 1. Construction de la Requête Dynamique ---
$where_clauses = ["p.is_active = 1"];
$params = [];
$types = "";

// FILTRES
if (!empty($_GET['category'])) {
    $where_clauses[] = "p.category_id = ?";
    $params[] = $_GET['category'];
    $types .= "i";
}

if (!empty($_GET['region'])) {
    $where_clauses[] = "vd.region_id = ?"; // Assurez-vous que vd.region_id est le champ correct
    $params[] = $_GET['region'];
    $types .= "i";
}

// RECHERCHE
if (!empty($_GET['search'])) {
    $search_term = '%' . $_GET['search'] . '%';
    $where_clauses[] = "(p.name LIKE ? OR vd.shop_name LIKE ?)";
    $params[] = $search_term;
    $params[] = $search_term;
    $types .= "ss";
}

// TRI
$order_by = "p.creation_date DESC";
if (!empty($_GET['sort'])) {
    switch ($_GET['sort']) {
        case 'note_desc':
            $order_by = "p.star_rating DESC"; // Simulé ou à calculer
            break;
        case 'price_asc':
            $order_by = "p.price ASC";
            break;
        case 'price_desc':
            $order_by = "p.price DESC";
            break;
        case 'newest':
        default:
            $order_by = "p.creation_date DESC";
            break;
    }
}

$where_sql = count($where_clauses) > 0 ? "WHERE " . implode(" AND ", $where_clauses) : "";

// Requête principale
$sql_products = "SELECT 
    p.product_id, p.name, p.price, p.image_url, p.stock, p.description,
    c.category_name, c.category_color,
    vd.shop_name
    FROM products p
    JOIN categories c ON p.category_id = c.category_id
    JOIN vendeurs_details vd ON p.vendeur_id = vd.vendeur_id
    {$where_sql}
    ORDER BY {$order_by}
    LIMIT {$start}, {$limit}";

// Récupération des produits
$stmt_products = mysqli_prepare($conn, $sql_products);
if (!empty($types)) {
    mysqli_stmt_bind_param($stmt_products, $types, ...$params);
}
mysqli_stmt_execute($stmt_products);
$products_res = mysqli_stmt_get_result($stmt_products);

// Récupération des données pour les filtres (Catégories et Régions)
$categories_res = mysqli_query($conn, "SELECT category_id, category_name FROM categories ORDER BY category_name ASC");
$regions_res = mysqli_query($conn, "SELECT region_id, region_name FROM regions ORDER BY region_name ASC");

// Total pour la pagination
$sql_count = "SELECT COUNT(p.product_id) AS total
              FROM products p
              JOIN vendeurs_details vd ON p.vendeur_id = vd.vendeur_id
              {$where_sql}";
$stmt_count = mysqli_prepare($conn, $sql_count);
if (!empty($types)) {
    mysqli_stmt_bind_param($stmt_count, $types, ...$params);
}
mysqli_stmt_execute($stmt_count);
$total_rows = mysqli_fetch_assoc(mysqli_stmt_get_result($stmt_count))['total'];
$total_pages = ceil($total_rows / $limit);

require_once '../includes/head.php';
require_once '../includes/navbar_client.php';
?>

<main class="container mx-auto px-4 py-10">
    <h1 class="text-4xl font-extrabold mb-8 text-gray-900 border-b pb-2">
        Découvrez l'Authenticité Camerounaise
    </h1>

    <div class="lg:flex lg:space-x-8">

        <aside
            class="lg:w-1/4 mb-8 lg:mb-0 bg-white p-6 rounded-xl shadow-lg border border-gray-100 sticky top-20 h-fit">
            <h2 class="text-2xl font-semibold mb-4 text-gray-800 flex items-center gap-2">
                <i class="fa fa-filter" aria-hidden="true"></i> Filtres Avancés
            </h2>

            <form action="index.php" method="GET" class="space-y-6">

                <div class="form-control">
                    <label class="label"><span class="label-text font-medium">Catégories</span></label>
                    <select name="category" class="select select-bordered w-full">
                        <option value="">Toutes les catégories</option>
                        <?php while ($cat = mysqli_fetch_assoc($categories_res)): ?>
                            <option value="<?= $cat['category_id'] ?>" <?= (isset($_GET['category']) && $_GET['category'] == $cat['category_id']) ? 'selected' : '' ?>>
                                <?= htmlspecialchars($cat['category_name']) ?>
                            </option>
                        <?php endwhile; ?>
                    </select>
                </div>

                <div class="form-control">
                    <label class="label"><span class="label-text font-medium">Région de Production</span></label>
                    <select name="region" class="select select-bordered w-full">
                        <option value="">Toutes les régions</option>
                        <?php while ($reg = mysqli_fetch_assoc($regions_res)): ?>
                            <option value="<?= $reg['region_id'] ?>" <?= (isset($_GET['region']) && $_GET['region'] == $reg['region_id']) ? 'selected' : '' ?>>
                                <?= htmlspecialchars($reg['region_name']) ?>
                            </option>
                        <?php endwhile; ?>
                    </select>
                </div>

                <input type="hidden" name="sort" value="<?= htmlspecialchars($_GET['sort'] ?? '') ?>">
                <input type="hidden" name="search" value="<?= htmlspecialchars($_GET['search'] ?? '') ?>">

                <button type="submit" class="btn btn-success w-full mt-4 text-white">Appliquer les Filtres</button>
                <a href="index.php" class="btn btn-error w-full">Réinitialiser</a>

            </form>
        </aside>

        <section class="lg:w-3/4">

            <form action="index.php" method="GET"
                class="flex flex-col md:flex-row justify-between items-center mb-6 p-4 bg-white rounded-xl shadow-md">
                <input type="text" name="search" placeholder="Rechercher un produit ou un vendeur..."
                    class="input input-bordered w-full md:w-1/2 mb-4 md:mb-0"
                    value="<?= htmlspecialchars($_GET['search'] ?? '') ?>" />

                <input type="hidden" name="category" value="<?= htmlspecialchars($_GET['category'] ?? '') ?>">
                <input type="hidden" name="region" value="<?= htmlspecialchars($_GET['region'] ?? '') ?>">

                <div class="flex items-center space-x-2">
                    <span class="text-sm font-medium text-gray-600">Trier par :</span>
                    <select name="sort" class="select select-bordered select-sm" onchange="this.form.submit()">
                        <option value="newest" <?= (($_GET['sort'] ?? 'newest') == 'newest') ? 'selected' : '' ?>>Nouveauté
                        </option>
                        <option value="note_desc" <?= (($_GET['sort'] ?? '') == 'note_desc') ? 'selected' : '' ?>>
                            Meilleures Notes</option>
                        <option value="price_asc" <?= (($_GET['sort'] ?? '') == 'price_asc') ? 'selected' : '' ?>>Prix
                            croissant</option>
                        <option value="price_desc" <?= (($_GET['sort'] ?? '') == 'price_desc') ? 'selected' : '' ?>>Prix
                            décroissant</option>
                    </select>
                </div>
            </form>

            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-8">

                <?php if (mysqli_num_rows($products_res) > 0): ?>
                    <?php while ($product = mysqli_fetch_assoc($products_res)): ?>
                        <?php
                        $image_path = "/" . htmlspecialchars($product['image_url'] ?? 'uploads/default.jpg');
                        $stock_low = $product['stock'] < 5 && $product['stock'] > 0;
                        $stock_out = $product['stock'] <= 0;
                        $product_status = $stock_low ? 'warning' : 'success';
                        ?>
                        <div
                            class="card bg-white shadow-xl hover:shadow-2xl transition-all duration-300 transform hover:-translate-y-1 <?= $stock_out ? 'opacity-60' : '' ?>">
                            <figure class="h-48 overflow-hidden">
                                <img src="<?= $image_path ?>" alt="<?= htmlspecialchars($product['name']) ?>"
                                    class="w-full h-full object-cover" />
                            </figure>
                            <div class="card-body p-5">
                                <div class="flex justify-between items-center mb-2">
                                    <div class="badge badge-lg bg-green-500 text-white font-bold text-sm"
                                        style="background-color: <?= htmlspecialchars($product['category_color'] ?? '#10b981') ?>;">
                                        <?= htmlspecialchars($product['category_name']) ?>
                                    </div>
                                    <?php if ($stock_low && !$stock_out): ?>
                                        <span class="badge badge-warning text-white font-semibold">Stock Faible</span>
                                    <?php elseif ($stock_out): ?>
                                        <span class="badge badge-error text-white font-semibold">Rupture</span>
                                    <?php endif; ?>
                                </div>

                                <h2 class="card-title text-xl mb-1 text-gray-800 line-clamp-2"
                                    title="<?= htmlspecialchars($product['name']) ?>">
                                    <?= htmlspecialchars($product['name']) ?>
                                </h2>
                                <p class="text-gray-500 text-sm mb-3">Par <?= htmlspecialchars($product['shop_name']) ?></p>

                                <div class="text-2xl font-extrabold flex items-center text-<?= $product_status ?>">
                                    <?= number_format($product['price'], 0, ',', ' ') ?> FCFA
                                </div>

                                <div class="card-actions justify-end mt-4">
                                    <a href="produit_detail.php?id=<?= $product['product_id'] ?>"
                                        class="btn btn-sm btn-outline btn-info">Voir Détails</a>
                                    <button class="btn btn-sm btn-success text-white" <?= $stock_out ? 'disabled' : '' ?>
                                        onclick="addToCart(<?= $product['product_id'] ?>)">
                                        <i class="fa fa-shopping-cart"></i> Ajouter
                                    </button>
                                </div>
                            </div>
                        </div>
                    <?php endwhile; ?>
                <?php else: ?>
                    <div class="col-span-1 sm:col-span-2 lg:col-span-3 text-center py-10 bg-white rounded-xl shadow-md">
                        <p class="text-xl text-gray-500">😔 Aucun produit ne correspond à vos critères de recherche.</p>
                        <a href="index.php" class="btn btn-ghost mt-4">Réinitialiser les filtres</a>
                    </div>
                <?php endif; ?>
            </div>

            <div class="flex justify-center mt-12">
                <div class="join">
                    <?php for ($i = 1; $i <= $total_pages; $i++): ?>
                        <?php
                        // Reconstruire les paramètres GET actuels sans 'p'
                        $query_params = $_GET;
                        $query_params['p'] = $i;
                        $query_string = http_build_query($query_params);
                        ?>
                        <a href="?<?= $query_string ?>"
                            class="join-item btn <?= $i == $page ? 'btn-active btn-success text-white' : '' ?>">
                            <?= $i ?>
                        </a>
                    <?php endfor; ?>
                </div>
            </div>

        </section>
    </div>
</main>

<script>
    // Fonction à implémenter pour ajouter au panier via AJAX
    function addToCart(productId) {
        // Logique pour envoyer productId à traitement_panier.php
        alert('Produit ID ' + productId + ' ajouté au panier ! (Implémentation AJAX requise)');
    }
</script>

<?php require_once '../views/footer.php'; ?>