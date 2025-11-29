<?php
session_start();
require_once '../../config/db_connect.php';

// Vérification de l'authentification (rôle client par défaut après connexion)
if (!isset($_SESSION['loggedin']) || $_SESSION['role_id'] != ROLE_CLIENT) {
    header("location: ../src/auth/client/login.php");
    exit;
}

$page_title = "Mes Commandes";
$client_id = $_SESSION['user_id'];

// Récupération des commandes du client
$sql_orders = "SELECT 
    o.order_id, o.order_date, o.total_amount, o.status,
    GROUP_CONCAT(CONCAT(oi.product_name_snapshot, ' (x', oi.quantity, ')') SEPARATOR ' | ') AS items_summary
    FROM orders o
    JOIN order_items oi ON o.order_id = oi.order_id
    WHERE o.client_id = ?
    GROUP BY o.order_id
    ORDER BY o.order_date DESC";

$stmt_orders = mysqli_prepare($conn, $sql_orders);
mysqli_stmt_bind_param($stmt_orders, "i", $client_id);
mysqli_stmt_execute($stmt_orders);
$orders_res = mysqli_stmt_get_result($stmt_orders);

require_once '../includes/head.php';
require_once '../includes/navbar_client.php';
?>

<main class="container mx-auto px-4 py-8">
    <h1 class="text-3xl font-bold mb-6 text-gray-800">
        <i class="fa fa-cube" aria-hidden="true"></i> Historique de Mes Commandes
    </h1>

    <div class="space-y-6">
        <?php if (isset($_SESSION['message'])): ?>
            <div role="alert" class="alert alert-success">
                <svg xmlns="http://www.w3.org/2000/svg" class="stroke-current shrink-0 h-6 w-6" fill="none"
                    viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
                </svg>
                <span><?= htmlspecialchars($_SESSION['message']) ?></span>
            </div>
            <?php unset($_SESSION['message']); ?>
        <?php endif; ?>

        <?php if (mysqli_num_rows($orders_res) > 0): ?>
            <?php while ($order = mysqli_fetch_assoc($orders_res)): ?>
                <?php
                $status_info = match ($order['status']) {
                    'delivered' => ['badge' => 'badge-success', 'text' => 'LIVRÉE', 'action' => 'Détails et Avis'],
                    'shipped' => ['badge' => 'badge-info', 'text' => 'EXPÉDIÉE', 'action' => 'Suivi Colis'],
                    'paid' => ['badge' => 'badge-primary', 'text' => 'PAYÉE', 'action' => 'En Préparation'],
                    'pending' => ['badge' => 'badge-warning', 'text' => 'EN ATTENTE', 'action' => 'Finaliser Paiement'],
                    'cancelled' => ['badge' => 'badge-error', 'text' => 'ANNULÉE', 'action' => 'Voir Détails'],
                    default => ['badge' => 'badge-ghost', 'text' => 'INCONNU', 'action' => 'Détails'],
                };
                $item_count = substr_count($order['items_summary'], '|') + 1;
                ?>
                <div class="card bg-white shadow-xl">
                    <div class="card-body p-6">
                        <div class="flex justify-between items-start mb-4">
                            <div>
                                <h2 class="text-xl font-bold">Commande #CM<?= $order['order_id'] ?></h2>
                                <p class="text-sm text-gray-500">Passée le :
                                    <?= date('d M Y', strtotime($order['order_date'])) ?></p>
                            </div>
                            <div class="badge <?= $status_info['badge'] ?> text-white p-3 font-semibold uppercase">
                                <?= $status_info['text'] ?></div>
                        </div>
                        <div class="border-t pt-4">
                            <p class="text-gray-600 truncate" title="<?= htmlspecialchars($order['items_summary']) ?>">
                                Articles : <?= htmlspecialchars($order['items_summary']) ?> (<?= $item_count ?>
                                article<?= $item_count > 1 ? 's' : '' ?>)
                            </p>
                            <p class="text-lg font-semibold mt-2">Total Payé :
                                <?= number_format($order['total_amount'], 0, ',', ' ') ?> FCFA</p>
                        </div>
                        <div class="card-actions justify-end mt-4">
                            <a href="detail_commande.php?id=<?= $order['order_id'] ?>"
                                class="btn btn-outline btn-sm"><?= $status_info['action'] ?></a>
                        </div>
                    </div>
                </div>
            <?php endwhile; ?>
        <?php else: ?>
            <div class="text-center py-10 bg-white rounded-xl shadow-md">
                <p class="text-xl text-gray-500">Vous n'avez pas encore passé de commande. <i
                        class="fa fa-shopping-cart"></i></p>
                <a href="index.php" class="btn btn-success mt-4 text-white">Commencer mes achats</a>
            </div>
        <?php endif; ?>

    </div>
</main>
<?php require_once '../views/footer.php'; ?>