<?php
session_start();
require_once '../../config/db_connect.php'; 

// Vérification de l'authentification et du rôle
if (!isset($_SESSION['loggedin']) || $_SESSION['role_id'] != ROLE_VENDEUR) {
    header("location: ../auth/vendeur/login.php");
    exit;
}

$title = "Mes Commandes - Espace Vendeur";
$user_id = $_SESSION['user_id'];

// 1. Récupérer le vendeur_id
$stmt_v_id = mysqli_prepare($conn, "SELECT vendeur_id FROM vendeurs_details WHERE user_id = ?");
mysqli_stmt_bind_param($stmt_v_id, "i", $user_id);
mysqli_stmt_execute($stmt_v_id);
$vendeur_id = mysqli_fetch_assoc(mysqli_stmt_get_result($stmt_v_id))['vendeur_id'];
mysqli_stmt_close($stmt_v_id);


// 2. Logique de Filtrage par Statut
$allowed_statuses = ['all', 'pending', 'paid', 'shipped', 'delivered', 'cancelled'];
$status_filter = isset($_GET['status']) && in_array($_GET['status'], $allowed_statuses) ? $_GET['status'] : 'all';

$where_status = ($status_filter != 'all') ? "AND o.status = '{$status_filter}'" : "";


// 3. Requête Principale des Commandes
// Jointure pour s'assurer que seules les commandes contenant les produits de CE vendeur sont affichées
$sql_orders = "SELECT 
    o.order_id, o.order_date, o.total_amount, o.status,
    CONCAT(u.first_name, ' ', u.last_name) AS customer_name,
    GROUP_CONCAT(CONCAT(oi.product_name_snapshot, ' (x', oi.quantity, ')') SEPARATOR ' | ') AS items_summary
    FROM orders o
    JOIN users u ON o.client_id = u.user_id
    JOIN order_items oi ON o.order_id = oi.order_id
    JOIN products p ON oi.product_id = p.product_id
    WHERE p.vendeur_id = $vendeur_id {$where_status}
    GROUP BY o.order_id
    ORDER BY o.order_date DESC
    LIMIT 20"; // Limite pour la vue
    
$orders_res = mysqli_query($conn, $sql_orders);

require_once '../includes/head.php'; 
require_once '../includes/navbar_vendeur.php'; 
?>

<main class="container mx-auto px-4 py-8">
    <h1 class="text-3xl font-extrabold text-gray-900 border-b pb-2 mb-6">Gestion des Commandes</h1>

    <div class="flex justify-start space-x-2 bg-white p-4 rounded-xl shadow mb-6">
        <?php foreach ($allowed_statuses as $s): ?>
            <a href="?status=<?= $s ?>" class="btn btn-sm <?= $s == $status_filter ? 'btn-success text-white' : 'btn-ghost' ?>">
                <?= ucfirst($s) ?>
            </a>
        <?php endforeach; ?>
    </div>

    <div class="overflow-x-auto bg-white rounded-xl shadow">
        <table class="table table-zebra w-full">
            <thead>
                <tr>
                    <th>ID Commande</th>
                    <th>Client</th>
                    <th>Articles</th>
                    <th>Date</th>
                    <th>Montant Total</th>
                    <th>Statut</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                <?php if (mysqli_num_rows($orders_res) > 0): ?>
                    <?php while ($order = mysqli_fetch_assoc($orders_res)): ?>
                        <?php
                            $status_class = match ($order['status']) {
                                'pending' => 'badge-error',
                                'paid' => 'badge-info',
                                'shipped' => 'badge-primary',
                                'delivered' => 'badge-success',
                                default => 'badge-ghost',
                            };
                        ?>
                        <tr>
                            <td class="font-bold">#<?= $order['order_id'] ?></td>
                            <td><?= htmlspecialchars($order['customer_name']) ?></td>
                            <td class="text-sm text-gray-600 max-w-xs truncate" title="<?= htmlspecialchars($order['items_summary']) ?>"><?= htmlspecialchars($order['items_summary']) ?></td>
                            <td><?= date('d/m/Y', strtotime($order['order_date'])) ?></td>
                            <td><?= number_format($order['total_amount'], 0, ',', ' ') ?> FCFA</td>
                            <td><span class="badge <?= $status_class ?> text-white font-medium"><?= ucfirst($order['status']) ?></span></td>
                            <td>
                                <form action="traitement_commande_action.php" method="POST">
                                    <input type="hidden" name="order_id" value="<?= $order['order_id'] ?>">
                                    <?php if ($order['status'] == 'paid' || $order['status'] == 'pending'): ?>
                                        <button type="submit" name="new_status" value="shipped" class="btn btn-sm btn-info text-white tooltip" data-tip="Marquer comme Expédiée">Expédier</button>
                                    <?php elseif ($order['status'] == 'shipped'): ?>
                                        <button type="submit" name="new_status" value="delivered" class="btn btn-sm btn-success text-white tooltip" data-tip="Marquer comme Livrée">Livré</button>
                                    <?php else: ?>
                                        <span class="text-xs text-gray-500">Terminé</span>
                                    <?php endif; ?>
                                </form>
                            </td>
                        </tr>
                    <?php endwhile; ?>
                <?php else: ?>
                    <tr><td colspan="7" class="text-center py-6 text-gray-500">Aucune commande trouvée pour l'instant.</td></tr>
                <?php endif; ?>
            </tbody>
        </table>
    </div>
</main>
<?php require_once '../views/footer.php'; ?>