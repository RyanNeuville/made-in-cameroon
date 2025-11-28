<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/7.0.1/css/all.min.css"
        integrity="sha512-2SwdPD6INVrV/lHTZbO2nodKhrnDdJK9/kg2XD1r9uGqPo1cUbujc+IYdlYdEErWNu69gVcYgdxlmVmzTWnetw=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="icon" href="../../public/logo/logo.png">
    <title><?php echo $title; ?></title>
    <link rel="stylesheet" href="../../public/output.css" />
</head>
<body class="font-['Poppins'] bg-gray-50 text-gray-900">

<div class="flex min-h-screen">
    <!-- SIDEBAR (à copier-coller sur toutes les pages) -->
    <aside class="w-64 bg-white border-r border-gray-200 sticky top-0 h-screen flex flex-col">
        <div class="p-6 border-b border-gray-100">
            <div class="flex items-center gap-3">
                <img src="../../public/logo/logo.png" alt="" class="w-6 h-6">
                <span class="text-xl font-bold text-[#2E7D32]">Admin</span>
            </div>
        </div>

        <nav class="flex-1 px-4 py-6 space-y-1">
            <a href="dashboard.php" class="flex items-center gap-3 px-4 py-3 bg-green-50 text-green-700 font-medium rounded-lg border-l-4 border-green-600">
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><rect x="3" y="3" width="7" height="7"></rect><rect x="14" y="3" width="7" height="7"></rect><rect x="14" y="14" width="7" height="7"></rect><rect x="3" y="14" width="7" height="7"></rect></svg>
                <span>Tableau de bord</span>
                <svg class="w-5 h-5 ml-auto opacity-100" fill="none" stroke="currentColor" viewBox="0 0 24 24"><polyline points="9 18 15 12 9 6"></polyline></svg>
            </a>
            <a href="users.php" class="flex items-center gap-3 px-4 py-3 text-gray-600 hover:bg-gray-50 rounded-lg transition">
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path d="M17 21v-2a4 4 0 0 0-4-4H5a4 4 0 0 0-4 4v2"></path><circle cx="9" cy="7" r="4"></circle><path d="M23 21v-2a4 4 0 0 0-3-3.87"></path><path d="M16 3.13a4 4 0 0 1 0 7.75"></path></svg>
                <span>Utilisateurs</span>
            </a>
            <a href="products.php" class="flex items-center gap-3 px-4 py-3 text-gray-600 hover:bg-gray-50 rounded-lg transition">
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path d="M21 16V8a2 2 0 0 0-1-1.73l-7-4a2 2 0 0 0-2 0l-7 4A2 2 0 0 0 3 8v8a2 2 0 0 0 1 1.73l7 4a2 2 0 0 0 2 0l7-4A2 2 0 0 0 21 16z"></path><polyline points="3.27 6.96 12 12.01 20.73 6.96"></polyline><line x1="12" y1="22.08" x2="12" y2="12"></line></svg>
                <span>Produits</span>
            </a>
            <a href="orders.php" class="flex items-center gap-3 px-4 py-3 text-gray-600 hover:bg-gray-50 rounded-lg transition">
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><circle cx="9" cy="21" r="1"></circle><circle cx="20" cy="21" r="1"></circle><path d="M1 1h4l2.68 13.39a2 2 0 0 0 2 1.61h9.72a2 2 0 0 0 2-1.61L23 6H6"></path></svg>
                <span>Commandes</span>
            </a>
            <a href="stats.php" class="flex items-center gap-3 px-4 py-3 text-gray-600 hover:bg-gray-50 rounded-lg transition">
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><line x1="12" y1="20" x2="12" y2="10"></line><line x1="18" y1="20" x2="18" y2="4"></line><line x1="6" y1="20" x2="6" y2="16"></line></svg>
                <span>Statistiques</span>
            </a>
            <a href="blog.php" class="flex items-center gap-3 px-4 py-3 text-gray-600 hover:bg-gray-50 rounded-lg transition">
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path d="M14 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V8z"></path><polyline points="14 2 14 8 20 8"></polyline><line x1="16" y1="13" x2="8" y2="13"></line><line x1="16" y1="17" x2="8" y2="17"></line><polyline points="10 9 9 9 8 9"></polyline></svg>
                <span>Blog</span>
            </a>
            <a href="settings.php" class="flex items-center gap-3 px-4 py-3 text-gray-600 hover:bg-gray-50 rounded-lg transition">
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><circle cx="12" cy="12" r="3"></circle><path d="M19.4 15a1.65 1.65 0 0 0 .33 1.82l.06.06a2 2 0 0 1 0 2.83 2 2 0 0 1-2.83 0l-.06-.06a1.65 1.65 0 0 0-1.82-.33 1.65 1.65 0 0 0-1 1.51V21a2 2 0 0 1-2 2 2 2 0 0 1-2-2v-.09A1.65 1.65 0 0 0 9 19.4a1.65 1.65 0 0 0-1.82.33l-.06.06a2 2 0 0 1-2.83 0 2 2 0 0 1 0-2.83l.06-.06a1.65 1.65 0 0 0 .33-1.82 1.65 1.65 0 0 0-1.51-1H3a2 2 0 0 1-2-2 2 2 0 0 1 2-2h.09A1.65 1.65 0 0 0 4.6 9a1.65 1.65 0 0 0-.33-1.82l-.06-.06a2 2 0 0 1 0-2.83 2 2 0 0 1 2.83 0l.06.06a1.65 1.65 0 0 0 1.82.33H9a1.65 1.65 0 0 0 1-1.51V3a2 2 0 0 1 2-2 2 2 0 0 1 2 2v.09a1.65 1.65 0 0 0 1 1.51 1.65 1.65 0 0 0 1.82-.33l.06-.06a2 2 0 0 1 2.83 0 2 2 0 0 1 0 2.83l-.06.06a1.65 1.65 0 0 0-.33 1.82V9a1.65 1.65 0 0 0 1.51 1H21a2 2 0 0 1 2 2 2 2 0 0 1-2 2h-.09a1.65 1.65 0 0 0-1.51 1z"></path></svg>
                <span>Paramètres</span>
            </a>
        </nav>
    </aside>

    <!-- CONTENU PRINCIPAL (exactement comme avant) -->
    <main class="flex-1 p-8 overflow-x-hidden">
        <!-- Header -->
        <div class="flex justify-between items-center mb-10">
            <h1 class="text-3xl font-bold text-gray-900">Tableau de Bord Administrateur</h1>
            <div class="flex items-center gap-4">
                <button class="p-2.5 hover:bg-gray-100 rounded-lg transition" title="Notifications">
                    <svg class="w-6 h-6 text-gray-600" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path d="M18 8A6 6 0 0 0 6 8c0 7-3 9-3 9h18s-3-2-3-9"></path><path d="M13.73 21a2 2 0 0 1-3.46 0"></path></svg>
                </button>
                <button onclick="handleLogout()" class="bg-red-600 hover:bg-red-700 text-white font-medium px-6 py-2.5 rounded-lg transition">Déconnexion</button>
            </div>
        </div>

        <!-- Cartes de statistiques -->
        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-6 mb-10">
            <!-- Revenu total -->
            <div class="bg-white rounded-2xl p-6 shadow-sm border border-gray-100">
                <div class="flex justify-between items-start mb-4">
                    <div>
                        <p class="text-sm text-gray-500">Revenu total</p>
                        <p class="text-3xl font-bold text-gray-900 mt-1">12,450,000 F</p>
                    </div>
                    <div class="p-3 bg-green-50 rounded-xl">
                        <svg class="w-7 h-7 text-green-600" fill="none" stroke="currentColor" viewBox="0 0 24 24"><line x1="12" y1="1" x2="12" y2="23"></line><path d="M17 5H9.5a3.5 3.5 0 0 0 0 7h5a3.5 3.5 0 0 1 0 7H6"></path></svg>
                    </div>
                </div>
                <p class="text-green-600 text-sm font-medium">+23% ce mois</p>
            </div>

            <!-- Utilisateurs -->
            <div class="bg-white rounded-2xl p-6 shadow-sm border border-gray-100">
                <div class="flex justify-between items-start mb-4">
                    <div>
                        <p class="text-sm text-gray-500">Utilisateurs</p>
                        <p class="text-3xl font-bold text-gray-900 mt-1">1,248</p>
                    </div>
                    <div class="p-3 bg-blue-50 rounded-xl">
                        <svg class="w-7 h-7 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path d="M17 21v-2a4 4 0 0 0-4-4H5a4 4 0 0 0-4 4v2"></path><circle cx="9" cy="7" r="4"></circle></svg>
                    </div>
                </div>
            </div>

            <!-- Produits -->
            <div class="bg-white rounded-2xl p-6 shadow-sm border border-gray-100">
                <div class="flex justify-between items-start mb-4">
                    <div>
                        <p class="text-sm text-gray-500">Produits</p>
                        <p class="text-3xl font-bold text-gray-900 mt-1">487</p>
                    </div>
                    <div class="p-3 bg-purple-50 rounded-xl">
                        <svg class="w-7 h-7 text-purple-600" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path d="M21 16V8a2 2 0 0 0-1-1.73l-7-4a2 2 0 0 0-2 0l-7 4A2 2 0 0 0 3 8v8a2 2 0 0 0 1 1.73l7 4a2 2 0 0 0 2 0l7-4A2 2 0 0 0 21 16z"></path></svg>
                    </div>
                </div>
            </div>

            <!-- Commandes -->
            <div class="bg-white rounded-2xl p-6 shadow-sm border border-gray-100">
                <div class="flex justify-between items-start mb-4">
                    <div>
                        <p class="text-sm text-gray-500">Commandes</p>
                        <p class="text-3xl font-bold text-gray-900 mt-1">856</p>
                    </div>
                    <div class="p-3 bg-orange-50 rounded-xl">
                        <svg class="w-7 h-7 text-orange-600" fill="none" stroke="currentColor" viewBox="0 0 24 24"><circle cx="9" cy="21" r="1"></circle><circle cx="20" cy="21" r="1"></circle><path d="M1 1h4l2.68 13.39a2 2 0 0 0 2 1.61h9.72a2 2 0 0 0 2-1.61L23 6H6"></path></svg>
                    </div>
                </div>
            </div>
        </div>

        <!-- Graphiques -->
        <div class="grid lg:grid-cols-2 gap-6 mb-10">
            <!-- Ventes mensuelles -->
            <div class="bg-white rounded-2xl shadow-sm border border-gray-100 overflow-hidden">
                <div class="bg-green-50 px-6 py-4 border-b border-gray-100">
                    <h2 class="text-xl font-semibold">Ventes mensuelles</h2>
                </div>
                <div class="p-6">
                    <div class="flex items-end justify-between h-64 gap-4">
                        <div class="w-full bg-green-100 rounded" style="height:48%"></div>
                        <div class="w-full bg-green-200 rounded" style="height:57%"></div>
                        <div class="w-full bg-green-300 rounded" style="height:73%"></div>
                        <div class="w-full bg-green-400 rounded" style="height:67%"></div>
                        <div class="w-full bg-green-500 rounded" style="height:85%"></div>
                        <div class="w-full bg-green-600 rounded" style="height:100%"></div>
                    </div>
                    <div class="flex justify-between mt-6 text-sm text-gray-600">
                        <span>Jan</span><span>Fév</span><span>Mar</span><span>Avr</span><span>Mai</span><span>Juin</span>
                    </div>
                </div>
            </div>

            <!-- Ventes par catégorie -->
            <div class="bg-white rounded-2xl shadow-sm border border-gray-100 overflow-hidden">
                <div class="bg-green-50 px-6 py-4 border-b border-gray-100">
                    <h2 class="text-xl font-semibold">Ventes par catégorie</h2>
                </div>
                <div class="p-6 space-y-6">
                    <div>
                        <div class="flex justify-between text-sm mb-1"><span>Artisanat</span><span class="font-medium">35%</span></div>
                        <div class="w-full bg-gray-200 rounded-full h-3"><div class="bg-green-600 h-3 rounded-full" style="width:35%"></div></div>
                        <p class="text-sm text-gray-500 mt-1">4,357,500 FCFA</p>
                    </div>
                    <div>
                        <div class="flex justify-between text-sm mb-1"><span>Agroalimentaire</span><span class="font-medium">28%</span></div>
                        <div class="w-full bg-gray-200 rounded-full h-3"><div class="bg-green-500 h-3 rounded-full" style="width:28%"></div></div>
                        <p class="text-sm text-gray-500 mt-1">3,486,000 FCFA</p>
                    </div>
                    <div>
                        <div class="flex justify-between text-sm mb-1"><span>Mode</span><span class="font-medium">22%</span></div>
                        <div class="w-full bg-gray-200 rounded-full h-3"><div class="bg-green-400 h-3 rounded-full" style="width:22%"></div></div>
                        <p class="text-sm text-gray-500 mt-1">2,739,000 FCFA</p>
                    </div>
                    <div>
                        <div class="flex justify-between text-sm mb-1"><span>Cosmétique</span><span class="font-medium">15%</span></div>
                        <div class="w-full bg-gray-200 rounded-full h-3"><div class="bg-green-300 h-3 rounded-full" style="width:15%"></div></div>
                        <p class="text-sm text-gray-500 mt-1">1,867,500 FCFA</p>
                    </div>
                </div>
            </div>
        </div>

        <!-- Tableaux -->
        <div class="grid lg:grid-cols-2 gap-6">
            <!-- Nouveaux utilisateurs -->
            <div class="bg-white rounded-2xl shadow-sm border border-gray-100 overflow-hidden">
                <div class="bg-green-50 px-6 py-4 border-b border-gray-100 flex justify-between items-center">
                    <h2 class="text-xl font-semibold">Nouveaux utilisateurs</h2>
                    <a href="users.php" class="text-green-600 hover:underline text-sm">Voir tout</a>
                </div>
                <div class="overflow-x-auto">
                    <table class="w-full">
                        <thead class="bg-gray-50 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                            <tr>
                                <th class="px-6 py-4">Nom</th>
                                <th class="px-6 py-4">Rôle</th>
                                <th class="px-6 py-4">Date</th>
                            </tr>
                        </thead>
                        <tbody class="divide-y divide-gray-100">
                            <tr>
                                <td class="px-6 py-4">
                                    <div>
                                        <p class="font-medium text-gray-900">Marie Kamga</p>
                                        <p class="text-sm text-gray-500">marie.k@email.cm</p>
                                    </div>
                                </td>
                                <td class="px-6 py-4"><span class="px-3 py-1 text-xs rounded-full bg-blue-100 text-blue-700">Client</span></td>
                                <td class="px-6 py-4 text-sm text-gray-500">18 Oct 2025</td>
                            </tr>
                            <tr>
                                <td class="px-6 py-4">
                                    <div>
                                        <p class="font-medium text-gray-900">Paul Ndongo</p>
                                        <p class="text-sm text-gray-500">paul.n@email.cm</p>
                                    </div>
                                </td>
                                <td class="px-6 py-4"><span class="px-3 py-1 text-xs rounded-full bg-purple-100 text-purple-700">Vendeur</span></td>
                                <td class="px-6 py-4 text-sm text-gray-500">17 Oct 2025</td>
                            </tr>
                            <tr>
                                <td class="px-6 py-4">
                                    <div>
                                        <p class="font-medium text-gray-900">Sophie Mbarga</p>
                                        <p class="text-sm text-gray-500">sophie.m@email.cm</p>
                                    </div>
                                </td>
                                <td class="px-6 py-4"><span class="px-3 py-1 text-xs rounded-full bg-blue-100 text-blue-700">Client</span></td>
                                <td class="px-6 py-4 text-sm text-gray-500">16 Oct 2025</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>

            <!-- Commandes récentes -->
            <div class="bg-white rounded-2xl shadow-sm border border-gray-100 overflow-hidden">
                <div class="bg-green-50 px-6 py-4 border-b border-gray-100 flex justify-between items-center">
                    <h2 class="text-xl font-semibold">Commandes récentes</h2>
                    <a href="orders.php" class="text-green-600 hover:underline text-sm">Voir tout</a>
                </div>
                <div class="overflow-x-auto">
                    <table class="w-full">
                        <thead class="bg-gray-50 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                            <tr>
                                <th class="px-6 py-4">ID</th>
                                <th class="px-6 py-4">Client</th>
                                <th class="px-6 py-4">Montant</th>
                                <th class="px-6 py-4">Statut</th>
                            </tr>
                        </thead>
                        <tbody class="divide-y divide-gray-100">
                            <tr>
                                <td class="px-6 py-4 font-medium">CMD-856</td>
                                <td class="px-6 py-4">Jean Tchounke</td>
                                <td class="px-6 py-4 text-green-600 font-medium">45,000 F</td>
                                <td class="px-6 py-4"><span class="px-3 py-1 text-xs rounded-full bg-green-100 text-green-700">Terminée</span></td>
                            </tr>
                            <tr>
                                <td class="px-6 py-4 font-medium">CMD-855</td>
                                <td class="px-6 py-4">Alice Fotso</td>
                                <td class="px-6 py-4 text-green-600 font-medium">28,000 F</td>
                                <td class="px-6 py-4"><span class="px-3 py-1 text-xs rounded-full bg-yellow-100 text-yellow-800">En attente</span></td>
                            </tr>
                            <tr>
                                <td class="px-6 py-4 font-medium">CMD-854</td>
                                <td class="px-6 py-4">David Njoya</td>
                                <td class="px-6 py-4 text-green-600 font-medium">67,000 F</td>
                                <td class="px-6 py-4"><span class="px-3 py-1 text-xs rounded-full bg-blue-100 text-blue-700">Expédiée</span></td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </main>
</div>

<script>
    function handleLogout() {
        if (confirm('Êtes-vous sûr de vouloir vous déconnecter ?')) {
            window.location.href = '../index.php';
        }
    }
</script>
</body>
</html> 
/*<?php
session_start();
require_once '../../config/db_connect.php';

// === PROTECTION ADMIN ===
if (!isset($_SESSION['user_id']) || $_SESSION['role_id'] != 1) {
    header("Location: ../auth/admin/login.php");
    exit();
}

$title = "Tableau de Bord - Admin Made in Cameroon";

// === RÉCUPÉRATION DES STATISTIQUES RÉELLES ===
$stmt = $conn->query("SELECT COUNT(*) FROM users WHERE role_id = 3");
$total_clients = $stmt->fetch_row()[0];

$stmt = $conn->query("SELECT COUNT(*) FROM vendeurs_details");
$total_vendeurs = $stmt->fetch_row()[0];

$stmt = $conn->query("SELECT COUNT(*) FROM products WHERE is_active = 1");
$total_produits = $stmt->fetch_row()[0];

$stmt = $conn->query("SELECT COUNT(*) FROM orders");
$total_commandes = $stmt->fetch_row()[0];

$stmt = $conn->query("SELECT SUM(total_amount) FROM orders WHERE status IN ('paid', 'shipped', 'delivered')");
$revenu_total = $stmt->fetch_row()[0] ?? 0;
$revenu_formate = number_format($revenu_total, 0, ',', ' ');

// === DERNIERS UTILISATEURS
$recent_users = $conn->query("
    SELECT u.user_id, u.first_name, u.last_name, u.email, r.role_name, u.registration_date 
    FROM users u 
    JOIN roles r ON u.role_id = r.role_id 
    ORDER BY u.registration_date DESC 
    LIMIT 5
");

// === DERNIÈRES COMMANDES
$recent_orders = $conn->query("
    SELECT o.order_id, o.total_amount, o.status, o.order_date,
           CONCAT(u.first_name, ' ', u.last_name) as client_name
    FROM orders o
    JOIN users u ON o.client_id = u.user_id
    ORDER BY o.order_date DESC
    LIMIT 5
");
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/7.0.1/css/all.min.css"
        integrity="sha512-2SwdPD6INVrV/lHTZbO2nodKhrnDdJK9/kg2XD1r9uGqPo1cUbujc+IYdlYdEErWNu69gVcYgdxlmVmzTWnetw=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="icon" href="../../public/logo/logo.png">
    <title><?= htmlspecialchars($title) ?></title>
    <link rel="stylesheet" href="../../public/output.css" />
</head>
<body class="font-['Poppins'] bg-gray-50 text-gray-900">

<div class="flex min-h-screen">
    <!-- SIDEBAR IDENTIQUE À TOUTES LES PAGES -->
    <aside class="w-64 bg-white border-r border-gray-200 sticky top-0 h-screen flex flex-col">
        <div class="p-6 border-b border-gray-100">
            <div class="flex items-center gap-3">
                <img src="../../public/logo/logo.png" alt="Logo" class="w-8 h-8">
                <span class="text-xl font-bold text-[#2E7D32]">Admin</span>
            </div>
        </div>

        <nav class="flex-1 px-4 py-6 space-y-1">
            <a href="dashboard.php" class="flex items-center gap-3 px-4 py-3 bg-green-50 text-green-700 font-medium rounded-lg border-l-4 border-green-600">
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><rect x="3" y="3" width="7" height="7"></rect><rect x="14" y="3" width="7" height="7"></rect><rect x="14" y="14" width="7" height="7"></rect><rect x="3" y="14" width="7" height="7"></rect></svg>
                <span>Tableau de bord</span>
                <svg class="w-5 h-5 ml-auto opacity-100" fill="none" stroke="currentColor" viewBox="0 0 24 24"><polyline points="9 18 15 12 9 6"></polyline></svg>
            </a>
            <a href="users.php" class="flex items-center gap-3 px-4 py-3 text-gray-600 hover:bg-gray-50 rounded-lg transition group">
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path d="M17 21v-2a4 4 0 0 0-4-4H5a4 4 0 0 0-4 4v2"></path><circle cx="9" cy="7" r="4"></circle><path d="M23 21v-2a4 4 0 0 0-3-3.87"></path><path d="M16 3.13a4 4 0 0 1 0 7.75"></path></svg>
                <span>Utilisateurs</span>
                <svg class="w-5 h-5 ml-auto opacity-0 group-hover:opacity-100" fill="none" stroke="currentColor" viewBox="0 0 24 24"><polyline points="9 18 15 12 9 6"></polyline></svg>
            </a>
            <a href="products.php" class="flex items-center gap-3 px-4 py-3 text-gray-600 hover:bg-gray-50 rounded-lg transition group">
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path d="M21 16V8a2 2 0 0 0-1-1.73l-7-4a2 2 0 0 0-2 0l-7 4A2 2 0 0 0 3 8v8a2 2 0 0 0 1 1.73l7 4a2 2 0 0 0 2 0l7-4A2 2 0 0 0 21 16z"></path></svg>
                <span>Produits</span>
            </a>
            <a href="orders.php" class="flex items-center gap-3 px-4 py-3 text-gray-600 hover:bg-gray-50 rounded-lg transition group">
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><circle cx="9" cy="21" r="1"></circle><circle cx="20" cy="21" r="1"></circle><path d="M1 1h4l2.68 13.39a2 2 0 0 0 2 1.61h9.72a2 2 0 0 0 2-1.61L23 6H6"></path></svg>
                <span>Commandes</span>
            </a>
            <a href="stats.php" class="flex items-center gap-3 px-4 py-3 text-gray-600 hover:bg-gray-50 rounded-lg transition group">
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><line x1="12" y1="20" x2="12" y2="10"></line><line x1="18" y1="20" x2="18" y2="4"></line><line x1="6" y1="20" x2="6" y2="16"></line></svg>
                <span>Statistiques</span>
            </a>
            <a href="blog.php" class="flex items-center gap-3 px-4 py-3 text-gray-600 hover:bg-gray-50 rounded-lg transition group">
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path d="M14 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V8z"></path><polyline points="14 2 14 8 20 8"></polyline></svg>
                <span>Blog</span>
            </a>
            <a href="settings.php" class="flex items-center gap-3 px-4 py-3 text-gray-600 hover:bg-gray-50 rounded-lg transition group">
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><circle cx="12" cy="12" r="3"></circle><path d="M19.4 15a1.65 1.65 0 0 0 .33 1.82l.06.06a2 2 0 0 1 0 2.83 2 2 0 0 1-2.83 0l-.06-.06a1.65 1.65 0 0 0-1.82-.33 1.65 1.65 0 0 0-1 1.51V21a2 2 0 0 1-2 2 2 2 0 0 1-2-2v-.09A1.65 1.65 0 0 0 9 19.4a1.65 1.65 0 0 0-1.82.33l-.06.06a2 2 0 0 1-2.83 0 2 2 0 0 1 0-2.83l.06-.06a1.65 1.65 0 0 0 .33-1.82 1.65 1.65 0 0 0-1.51-1H3a2 2 0 0 1-2-2 2 2 0 0 1 2-2h.09A1.65 1.65 0 0 0 4.6 9a1.65 1.65 0 0 0-.33-1.82l-.06-.06a2 2 0 0 1 0-2.83 2 2 0 0 1 2.83 0l.06.06a1.65 1.65 0 0 0 1.82.33H9a1.65 1.65 0 0 0 1-1.51V3a2 2 0 0 1 2-2 2 2 0 0 1 2 2v.09a1.65 1.65 0 0 0 1 1.51 1.65 1.65 0 0 0 1.82-.33l.06-.06a2 2 0 0 1 2.83 0 2 2 0 0 1 0 2.83l-.06.06a1.65 1.65 0 0 0-.33 1.82V9a1.65 1.65 0 0 0 1.51 1H21a2 2 0 0 1 2 2 2 2 0 0 1-2 2h-.09a1.65 1.65 0 0 0-1.51 1z"></path></svg>
                <span>Paramètres</span>
            </a>
        </nav>

        <div class="p-6 border-t border-gray-100">
            <a href="../auth/admin/logout.php" class="flex items-center gap-3 text-red-600 hover:text-red-700 font-medium">
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path d="M9 21H5a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h4"></path><polyline points="16 17 21 12 16 7"></polyline><line x1="21" y1="12" x2="9" y2="12"></line></svg>
                Déconnexion
            </a>
        </div>
    </aside>

    <!-- CONTENU PRINCIPAL -->
    <main class="flex-1 p-8 overflow-x-hidden">
        <div class="flex justify-between items-center mb-10">
            <h1 class="text-3xl font-bold text-gray-900">Tableau de Bord Administrateur</h1>
            <div class="text-sm text-gray-500">
                Bienvenue, <strong><?= htmlspecialchars($_SESSION['first_name'] ?? 'Admin') ?></strong>
            </div>
        </div>

        <!-- CARTES STATISTIQUES (données réelles) -->
        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-6 mb-10">
            <div class="bg-white rounded-2xl p-6 shadow-sm border border-gray-100">
                <div class="flex justify-between items-start mb-4">
                    <div>
                        <p class="text-sm text-gray-500">Revenu total</p>
                        <p class="text-3xl font-bold text-gray-900 mt-1"><?= $revenu_formate ?> F</p>
                    </div>
                    <div class="p-3 bg-green-50 rounded-xl">
                        <svg class="w-7 h-7 text-green-600" fill="none" stroke="currentColor" viewBox="0 0 24 24"><line x1="12" y1="1" x2="12" y2="23"></line><path d="M17 5H9.5a3.5 3.5 0 0 0 0 7h5a3.5 3.5 0 0 1 0 7H6"></path></svg>
                    </div>
                </div>
                <p class="text-green-600 text-sm font-medium">Toutes les ventes</p>
            </div>

            <div class="bg-white rounded-2xl p-6 shadow-sm border border-gray-100">
                <div class="flex justify-between items-start mb-4">
                    <div>
                        <p class="text-sm text-gray-500">Clients</p>
                        <p class="text-3xl font-bold text-gray-900 mt-1"><?= $total_clients ?></p>
                    </div>
                    <div class="p-3 bg-blue-50 rounded-xl">
                        <svg class="w-7 h-7 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path d="M17 21v-2a4 4 0 0 0-4-4H5a4 4 0 0 0-4 4v2"></path><circle cx="9" cy="7" r="4"></circle></svg>
                    </div>
                </div>
            </div>

            <div class="bg-white rounded-2xl p-6 shadow-sm border border-gray-100">
                <div class="flex justify-between items-start mb-4">
                    <div>
                        <p class="text-sm text-gray-500">Produits actifs</p>
                        <p class="text-3xl font-bold text-gray-900 mt-1"><?= $total_produits ?></p>
                    </div>
                    <div class="p-3 bg-purple-50 rounded-xl">
                        <svg class="w-7 h-7 text-purple-600" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path d="M21 16V8a2 2 0 0 0-1-1.73l-7-4a2 2 0 0 0-2 0l-7 4A2 2 0 0 0 3 8v8a2 2 0 0 0 1 1.73l7 4a2 2 0 0 0 2 0l7-4A2 2 0 0 0 21 16z"></path></svg>
                    </div>
                </div>
            </div>

            <div class="bg-white rounded-2xl p-6 shadow-sm border border-gray-100">
                <div class="flex justify-between items-start mb-4">
                    <div>
                        <p class="text-sm text-gray-500">Total commandes</p>
                        <p class="text-3xl font-bold text-gray-900 mt-1"><?= $total_commandes ?></p>
                    </div>
                    <div class="p-3 bg-orange-50 rounded-xl">
                        <svg class="w-7 h-7 text-orange-600" fill="none" stroke="currentColor" viewBox="0 0 24 24"><circle cx="9" cy="21" r="1"></circle><circle cx="20" cy="21" r="1"></circle><path d="M1 1h4l2.68 13.39a2 2 0 0 0 2 1.61h9.72a2 2 0 0 0 2-1.61L23 6H6"></path></svg>
                    </div>
                </div>
            </div>
        </div>

        <!-- DERNIERS UTILISATEURS & COMMANDES -->
        <div class="grid lg:grid-cols-2 gap-6">
            <div class="bg-white rounded-2xl shadow-sm border border-gray-100 overflow-hidden">
                <div class="bg-green-50 px-6 py-4 border-b border-gray-100 flex justify-between items-center">
                    <h2 class="text-xl font-semibold">Nouveaux utilisateurs</h2>
                    <a href="users.php" class="text-green-600 hover:underline text-sm">Voir tout</a>
                </div>
                <table class="w-full">
                    <thead class="bg-gray-50 text-left text-xs font-medium text-gray-500 uppercase">
                        <tr>
                            <th class="px-6 py-3">Nom</th>
                            <th class="px-6 py-3">Rôle</th>
                            <th class="px-6 py-3">Inscrit le</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-gray-100">
                        <?php while ($user = $recent_users->fetch_assoc()): ?>
                        <tr class="hover:bg-gray-50">
                            <td class="px-6 py-4">
                                <p class="font-medium"><?= htmlspecialchars($user['first_name'] . ' ' . $user['last_name']) ?></p>
                                <p class="text-sm text-gray-500"><?= htmlspecialchars($user['email']) ?></p>
                            </td>
                            <td class="px-6 py-4">
                                <span class="px-3 py-1 text-xs rounded-full <?= $user['role_name']=='admin' ? 'bg-red-100 text-red-700' : ($user['role_name']=='vendeur' ? 'bg-purple-100 text-purple-700' : 'bg-blue-100 text-blue-700') ?>">
                                    <?= ucfirst($user['role_name']) ?>
                                </span>
                            </td>
                            <td class="px-6 py-4 text-sm text-gray-500">
                                <?= date('d/m/Y', strtotime($user['registration_date'])) ?>
                            </td>
                        </tr>
                        <?php endwhile; ?>
                    </tbody>
                </table>
            </div>

            <div class="bg-white rounded-2xl shadow-sm border border-gray-100 overflow-hidden">
                <div class="bg-green-50 px-6 py-4 border-b border-gray-100 flex justify-between items-center">
                    <h2 class="text-xl font-semibold">Commandes récentes</h2>
                    <a href="orders.php" class="text-green-600 hover:underline text-sm">Voir tout</a>
                </div>
                <table class="w-full">
                    <thead class="bg-gray-50 text-left text-xs font-medium text-gray-500 uppercase">
                        <tr>
                            <th class="px-6 py-3">Commande</th>
                            <th class="px-6 py-3">Client</th>
                            <th class="px-6 py-3">Montant</th>
                            <th class="px-6 py-3">Statut</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-gray-100">
                        <?php while ($order = $recent_orders->fetch_assoc()): ?>
                        <tr class="hover:bg-gray-50">
                            <td class="px-6 py-4 font-medium">#CMD-<?= str_pad($order['order_id'], 4, '0', STR_PAD_LEFT) ?></td>
                            <td class="px-6 py-4"><?= htmlspecialchars($order['client_name']) ?></td>
                            <td class="px-6 py-4 text-green-600 font-medium">
                                <?= number_format($order['total_amount'], 0, ',', ' ') ?> F
                            </td>
                            <td class="px-6 py-4">
                                <?php
                                $status_class = match($order['status']) {
                                    'delivered' => 'bg-green-100 text-green-700',
                                    'shipped' => 'bg-blue-100 text-blue-700',
                                    'paid' => 'bg-yellow-100 text-yellow-800',
                                    default => 'bg-gray-100 text-gray-700'
                                };
                                $status_text = match($order['status']) {
                                    'pending' => 'En attente',
                                    'paid' => 'Payée',
                                    'shipped' => 'Expédiée',
                                    'delivered' => 'Livrée',
                                    'cancelled' => 'Annulée'
                                };
                                ?>
                                <span class="px-3 py-1 text-xs rounded-full <?= $status_class ?>">
                                    <?= $status_text ?>
                                </span>
                            </td>
                        </tr>
                        <?php endwhile; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </main>
<div>
</body>
</html>