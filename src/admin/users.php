<?php
session_start();
// Protection admin (à décommenter quand la BDD marchera)
// if (!isset($_SESSION['user_id']) || $_SESSION['role_id'] != 1) {
//     header("Location: ../auth/admin/login.php");
//     exit();
// }
?>

<!DOCTYPE html>
<html lang="fr" class="scroll-smooth">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gestion des Utilisateurs - Admin Made in Cameroon</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="../../public/output.css">
</head>
<body class="font-['Poppins'] bg-gray-50 text-gray-900">

<div class="flex min-h-screen">
    <!-- SIDEBAR - Utilisateurs actif -->
    <aside class="w-64 bg-white border-r border-gray-200 sticky top-0 h-screen flex flex-col">
        <div class="p-6 border-b border-gray-100">
            <div class="flex items-center gap-3">
                <div class="flex">
                    <div class="w-2 h-8 bg-[#2E7D32] rounded-l"></div>
                    <div class="w-2 h-8 bg-[#D32F2F]"></div>
                    <div class="w-2 h-8 bg-[#FBC02D] rounded-r"></div>
                </div>
                <span class="text-xl font-bold text-[#2E7D32]">Admin</span>
            </div>
        </div>

        <nav class="flex-1 px-4 py-6 space-y-1">
            <a href="dashboard.php" class="flex items-center gap-3 px-4 py-3 text-gray-600 hover:bg-gray-100 hover:text-[#2E7D32] transition-colors group">
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><rect x="3" y="3" width="7" height="7"></rect><rect x="14" y="3" width="7" height="7"></rect><rect x="14" y="14" width="7" height="7"></rect><rect x="3" y="14" width="7" height="7"></rect></svg>
                <span>Tableau de bord</span>
                <svg class="w-5 h-5 ml-auto opacity-0 group-hover:opacity-100" fill="none" stroke="currentColor" viewBox="0 0 24 24"><polyline points="9 18 15 12 9 6"></polyline></svg>
            </a>

            <!-- UTILISATEURS ACTIF -->
            <a href="users.php" class="flex items-center gap-3 px-4 py-3 rounded-lg text-[#2E7D32] bg-[#e8f5e8] font-medium border-l-4 border-[#2E7D32] group">
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path d="M17 21v-2a4 4 0 0 0-4-4H5a4 4 0 0 0-4 4v2"></path>
                    <circle cx="9" cy="7" r="4"></circle>
                    <path d="M23 21v-2a4 4 0 0 0-3-3.87"></path>
                    <path d="M16 3.13a4 4 0 0 1 0 7.75"></path>
                </svg>
                <span>Utilisateurs</span>
                <svg class="w-5 h-5 ml-auto opacity-100" fill="none" stroke="currentColor" viewBox="0 0 24 24"><polyline points="9 18 15 12 9 6"></polyline></svg>
            </a>

            <a href="products.php" class="flex items-center gap-3 px-4 py-3 text-gray-600 hover:bg-gray-100 hover:text-[#2E7D32] transition-colors group">
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path d="M21 16V8a2 2 0 0 0-1-1.73l-7-4a2 2 0 0 0-2 0l-7 4A2 2 0 0 0 3 8v8a2 2 0 0 0 1 1.73l7 4a2 2 0 0 0 2 0l7-4A2 2 0 0 0 21 16z"></path></svg>
                <span>Produits</span>
            </a>

            <a href="orders.php" class="flex items-center gap-3 px-4 py-3 text-gray-600 hover:bg-gray-100 hover:text-[#2E7D32] transition-colors group">
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><circle cx="9" cy="21" r="1"></circle><circle cx="20" cy="21" r="1"></circle><path d="M1 1h4l2.68 13.39a2 2 0 0 0 2 1.61h9.72a2 2 0 0 0 2-1.61L23 6H6"></path></svg>
                <span>Commandes</span>
            </a>

            <a href="stats.php" class="flex items-center gap-3 px-4 py-3 text-gray-600 hover:bg-gray-100 hover:text-[#2E7D32] transition-colors group">
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><line x1="12" y1="20" x2="12" y2="10"></line><line x1="18" y1="20" x2="18" y2="4"></line><line x1="6" y1="20" x2="6" y2="16"></line></svg>
                <span>Statistiques</span>
            </a>

            <a href="blog.php" class="flex items-center gap-3 px-4 py-3 text-gray-600 hover:bg-gray-100 hover:text-[#2E7D32] transition-colors group">
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path d="M14 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V8z"></path><polyline points="14 2 14 8 20 8"></polyline></svg>
                <span>Blog</span>
            </a>

            <a href="settings.php" class="flex items-center gap-3 px-4 py-3 text-gray-600 hover:bg-gray-100 hover:text-[#2E7D32] transition-colors group">
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><circle cx="12" cy="12" r="3"></circle><path d="M19.4 15a1.65 1.65 0 0 0 .33 1.82l.06.06a2 2 0 0 1 0 2.83 2 2 0 0 1-2.83 0l-.06-.06a1.65 1.65 0 0 0-1.82-.33 1.65 1.65 0 0 0-1 1.51V21a2 2 0 0 1-2 2 2 2 0 0 1-2-2v-.09A1.65 1.65 0 0 0 9 19.4a1.65 1.65 0 0 0-1.82.33l-.06.06a2 2 0 0 1-2.83 0 2 2 0 0 1 0-2.83l.06-.06a1.65 1.65 0 0 0 .33-1.82 1.65 1.65 0 0 0-1.51-1H3a2 2 0 0 1-2-2 2 2 0 0 1 2-2h.09A1.65 1.65 0 0 0 4.6 9a1.65 1.65 0 0 0-.33-1.82l-.06-.06a2 2 0 0 1 0-2.83 2 2 0 0 1 2.83 0l.06.06a1.65 1.65 0 0 0 1.82.33H9a1.65 1.65 0 0 0 1-1.51V3a2 2 0 0 1 2-2 2 2 0 0 1 2 2v.09a1.65 1.65 0 0 0 1 1.51 1.65 1.65 0 0 0 1.82-.33l.06-.06a2 2 0 0 1 2.83 0 2 2 0 0 1 0 2.83l-.06.06a1.65 1.65 0 0 0-.33 1.82V9a1.65 1.65 0 0 0 1.51 1H21a2 2 0 0 1 2 2 2 2 0 0 1-2 2h-.09a1.65 1.65 0 0 0-1.51 1z"></path></svg>
                <span>Paramètres</span>
            </a>
        </nav>
    </aside>

    <!-- CONTENU PRINCIPAL -->
    <main class="flex-1 p-8">
        <div class="flex justify-between items-center mb-8">
            <h1 class="text-3xl font-bold text-gray-900">Gestion des Utilisateurs</h1>
            <a href="add-user.php" class="bg-green-600 hover:bg-green-700 text-white font-medium px-5 py-3 rounded-lg flex items-center gap-2 transition">
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><line x1="12" y1="5" x2="12" y2="19"></line><line x1="5" y1="12" x2="19" y2="12"></line></svg>
                Ajouter un utilisateur
            </a>
        </div>

        <!-- Filtres + Stats + Tableau (inchangés) -->
        <div class="bg-white rounded-2xl shadow-sm border border-gray-100 p-6 mb-8">
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-4">
                <div class="relative">
                    <svg class="w-5 h-5 absolute left-3 top-1/2 -translate-y-1/2 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><circle cx="11" cy="11" r="8"></circle><path d="m21 21-4.35-4.35"></path></svg>
                    <input type="text" placeholder="Rechercher..." class="pl-10 pr-4 py-3 w-full border border-gray-300 rounded-lg focus:ring-2 focus:ring-green-500">
                </div>
                <select class="px-4 py-3 border border-gray-300 rounded-lg">
                    <option>Tous les rôles</option>
                    <option>Client</option>
                    <option>Vendeur</option>
                    <option>Admin</option>
                </select>
                <select class="px-4 py-3 border border-gray-300 rounded-lg">
                    <option>Tous les statuts</option>
                    <option>Actif</option>
                    <option>Inactif</option>
                </select>
                <button class="px-6 py-3 bg-gray-100 text-gray-700 rounded-lg hover:bg-gray-200">Réinitialiser</button>
            </div>
        </div>

        <!-- Stats rapides -->
        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-6 mb-8">
            <div class="bg-white rounded-2xl p-6 shadow-sm border border-gray-100">
                <p class="text-sm text-gray-500">Total utilisateurs</p>
                <p class="text-3xl font-bold mt-2">1,248</p>
            </div>
            <div class="bg-white rounded-2xl p-6 shadow-sm border border-gray-100">
                <p class="text-sm text-gray-500">Clients</p>
                <p class="text-3xl font-bold mt-2 text-blue-600">892</p>
            </div>
            <div class="bg-white rounded-2xl p-6 shadow-sm border border-gray-100">
                <p class="text-sm text-gray-500">Vendeurs</p>
                <p class="text-3xl font-bold mt-2 text-purple-600">345</p>
            </div>
            <div class="bg-white rounded-2xl p-6 shadow-sm border border-gray-100">
                <p class="text-sm text-gray-500">Admins</p>
                <p class="text-3xl font-bold mt-2 text-red-600">11</p>
            </div>
        </div>

        <!-- Tableau des utilisateurs -->
        <div class="bg-white rounded-2xl shadow-sm border border-gray-100 overflow-hidden">
            <div class="overflow-x-auto">
                <table class="w-full">
                    <thead class="bg-gray-50 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                        <tr>
                            <th class="px-6 py-4">ID</th>
                            <th class="px-6 py-4">Utilisateur</th>
                            <th class="px-6 py-4">Rôle</th>
                            <th class="px-6 py-4">Statut</th>
                            <th class="px-6 py-4">Inscription</th>
                            <th class="px-6 py-4">Commandes</th>
                            <th class="px-6 py-4">Actions</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-gray-100">
    <?php foreach ($_SESSION['users'] as $user): ?>
    <tr class="hover:bg-gray-50">
        <td class="px-6 py-4 font-semibold">#<?= $user['id'] ?></td>
        <td class="px-6 py-4">
            <div class="flex items-center gap-3">
                <div class="w-10 h-10 bg-gray-200 border-2 border-dashed rounded-full"></div>
                <div>
                    <p class="font-medium text-gray-900"><?= $user['name'] ?></p>
                    <p class="text-sm text-gray-500"><?= $user['email'] ?></p>
                </div>
            </div>
        </td>
        <td class="px-6 py-4">
            <span class="px-3 py-1 text-xs rounded-full 
                <?= $user['role']=='admin' ? 'bg-red-100 text-red-700' : 
                   ($user['role']=='vendeur' ? 'bg-purple-100 text-purple-700' : 'bg-blue-100 text-blue-700') ?>">
                <?= ucfirst($user['role']) ?>
            </span>
        </td>
        <td class="px-6 py-4"><span class="px-3 py-1 text-xs rounded-full bg-green-100 text-green-700">Actif</span></td>
        <td class="px-6 py-4 text-sm text-gray-500"><?= $user['date'] ?></td>
        <td class="px-6 py-4 font-semibold"><?= $user['orders'] ?></td>
        <td class="px-6 py-4">
            <div class="flex gap-2">
                <a href="view-user.php?id=<?= $user['id'] ?>" class="p-2 hover:bg-gray-100 rounded-lg" title="Voir">Voir</a>
                <button class="p-2 hover:bg-red-50 rounded-lg text-red-600" title="Supprimer">Supprimer</button>
            </div>
        </td>
    </tr>
    <?php endforeach; ?>

    <?php if (isset($_GET['success'])): ?>
    <tr class="bg-green-50">
        <td colspan="7" class="px-6 py-4 text-center text-green-700 font-medium">
            Nouvel utilisateur ajouté avec succès !
        </td>
    </tr>
    <?php endif; ?>
</tbody>
                </table>
            </div>
        </div>

        <!-- Pagination -->
        <div class="flex justify-center mt-8 gap-2">
            <button class="px-4 py-2 border border-gray-300 rounded-lg hover:bg-gray-50 disabled:opacity-50" disabled>Précédent</button>
            <button class="px-4 py-2 bg-green-600 text-white rounded-lg">1</button>
            <button class="px-4 py-2 border border-gray-300 rounded-lg hover:bg-gray-50">2</button>
            <button class="px-4 py-2 border border-gray-300 rounded-lg hover:bg-gray-50">3</button>
            <button class="px-4 py-2 border border-gray-300 rounded-lg hover:bg-gray-50">Suivant</button>
        </div>
    </main>
</div>
</body>
</html>