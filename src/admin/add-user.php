<?php
session_start();

// Simulation d'une liste d'utilisateurs en mémoire (à remplacer par la BDD plus tard)
if (!isset($_SESSION['users'])) {
    $_SESSION['users'] = [
        [
            'id' => 237,
            'name' => 'Aïcha Kamdem',
            'email' => 'aicha.kamdem@gmail.com',
            'role' => 'client',
            'status' => 'Actif',
            'date' => '22 Nov 2025',
            'orders' => 24
        ],
        [
            'id' => 238,
            'name' => 'Jean Paul Biya',
            'email' => 'jeanpaul@example.com',
            'role' => 'vendeur',
            'status' => 'Actif',
            'date' => '21 Nov 2025',
            'orders' => 89
        ]
    ];
}

// Traitement du formulaire
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $name = trim($_POST['name'] ?? '');
    $email = trim($_POST['email'] ?? '');
    $phone = trim($_POST['phone'] ?? '');
    $role = $_POST['role'] ?? 'client';

    if ($name && $email) {
        // Générer un ID unique
        $new_id = count($_SESSION['users']) + 237;

        // Ajouter l'utilisateur dans la session
        $_SESSION['users'][] = [
            'id' => $new_id,
            'name' => htmlspecialchars($name),
            'email' => htmlspecialchars($email),
            'role' => $role,
            'status' => 'Actif',
            'date' => date('d M Y'),
            'orders' => 0
        ];

        // Redirection vers la liste avec message de succès
        header("Location: users.php?success=1");
        exit();
    }
}
?>

<!DOCTYPE html>
<html lang="fr" class="scroll-smooth">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ajouter un utilisateur - Admin Made in Cameroon</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="../../public/output.css">
</head>
<body class="font-['Poppins'] bg-gray-50 text-gray-900">

<div class="flex min-h-screen">
    <!-- SIDEBAR IDENTIQUE -->
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
            <a href="dashboard.php" class="flex items-center gap-3 px-4 py-3 text-gray-600 hover:bg-gray-100 rounded-lg transition">
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><rect x="3" y="3" width="7" height="7"></rect><rect x="14" y="3" width="7" height="7"></rect><rect x="14" y="14" width="7" height="7"></rect><rect x="3" y="14" width="7" height="7"></rect></svg>
                <span>Tableau de bord</span>
            </a>
            <a href="users.php" class="flex items-center gap-3 px-4 py-3 bg-[#e8f5e8] text-[#2E7D32] font-medium rounded-lg border-l-4 border-[#2E7D32]">
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path d="M17 21v-2a4 4 0 0 0-4-4H5a4 4 0 0 0-4 4v2"></path>
                    <circle cx="9" cy="7" r="4"></circle>
                </svg>
                <span>Utilisateurs</span>
            </a>
            <!-- Autres liens identiques -->
            <a href="products.php" class="flex items-center gap-3 px-4 py-3 text-gray-600 hover:bg-gray-100 rounded-lg transition"><span>Produits</span></a>
            <a href="orders.php" class="flex items-center gap-3 px-4 py-3 text-gray-600 hover:bg-gray-100 rounded-lg transition"><span>Commandes</span></a>
            <a href="stats.php" class="flex items-center gap-3 px-4 py-3 text-gray-600 hover:bg-gray-100 rounded-lg transition"><span>Statistiques</span></a>
            <a href="blog.php" class="flex items-center gap-3 px-4 py-3 text-gray-600 hover:bg-gray-100 rounded-lg transition"><span>Blog</span></a>
            <a href="settings.php" class="flex items-center gap-3 px-4 py-3 text-gray-600 hover:bg-gray-100 rounded-lg transition"><span>Paramètres</span></a>
        </nav>
    </aside>

    <!-- CONTENU PRINCIPAL -->
    <main class="flex-1 p-8">
        <div class="mb-8">
            <h1 class="text-3xl font-bold text-gray-900">Ajouter un nouvel utilisateur</h1>
            <p class="text-gray-600 mt-2">Créez un compte client, vendeur ou administrateur</p>
        </div>

        <form method="POST" class="bg-white rounded-2xl shadow-sm border border-gray-100 p-8 space-y-8 max-w-4xl">
            <div>
                <h2 class="text-xl font-semibold mb-6 text-gray-800">Informations personnelles</h2>
                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-2">Nom complet *</label>
                        <input type="text" name="name" required placeholder="Ex: Marie Claire Fotso" class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-green-500">
                    </div>
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-2">Numéro de téléphone</label>
                        <input type="tel" name="phone" placeholder="+237 690 123 456" class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-green-500">
                    </div>
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-2">Email *</label>
                        <input type="email" name="email" required placeholder="marie@example.com" class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-green-500">
                    </div>
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-2">Rôle</label>
                        <select name="role" class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-green-500">
                            <option value="client">Client</option>
                            <option value="vendeur">Vendeur / Artisan</option>
                            <option value="admin">Administrateur</option>
                        </select>
                    </div>
                </div>
            </div>

            <div class="flex justify-end gap-4 pt-8 border-t">
                <a href="users.php" class="px-8 py-3 border border-gray-300 rounded-lg hover:bg-gray-50 transition">
                    Annuler
                </a>
                <button type="submit" class="px-8 py-3 bg-green-600 hover:bg-green-700 text-white font-medium rounded-lg transition flex items-center gap-2">
                    Créer l'utilisateur
                </button>
            </div>
        </form>
    </main>
</div>
</body>
</html>