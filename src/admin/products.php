<!DOCTYPE html>
<html lang="fr" class="scroll-smooth">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gestion des Produits - Admin Made in Cameroon</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="../../public/output.css">
</head>
<body class="font-['Poppins'] bg-gray-50 text-gray-900">

<div class="flex min-h-screen">
    <!-- SIDEBAR – IDENTIQUE À 100% AUX AUTRES PAGES -->
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
            <a href="dashboard.php" class="flex items-center gap-3 px-4 py-3 text-gray-600 hover:bg-gray-50 rounded-lg transition group">
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><rect x="3" y="3" width="7" height="7"></rect><rect x="14" y="3" width="7" height="7"></rect><rect x="14" y="14" width="7" height="7"></rect><rect x="3" y="14" width="7" height="7"></rect></svg>
                <span>Tableau de bord</span>
                <svg class="w-5 h-5 ml-auto opacity-0 group-hover:opacity-100 transition" fill="none" stroke="currentColor" viewBox="0 0 24 24"><polyline points="9 18 15 12 9 6"></polyline></svg>
            </a>

            <a href="users.php" class="flex items-center gap-3 px-4 py-3 text-gray-600 hover:bg-gray-50 rounded-lg transition group">
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path d="M17 21v-2a4 4 0 0 0-4-4H5a4 4 0 0 0-4 4v2"></path><circle cx="9" cy="7" r="4"></circle><path d="M23 21v-2a4 4 0 0 0-3-3.87"></path><path d="M16 3.13a4 4 0 0 1 0 7.75"></path></svg>
                <span>Utilisateurs</span>
                <svg class="w-5 h-5 ml-auto opacity-0 group-hover:opacity-100 transition" fill="none" stroke="currentColor" viewBox="0 0 24 24"><polyline points="9 18 15 12 9 6"></polyline></svg>
            </a>

            <!-- PRODUITS = ACTIF (chevron visible uniquement ici) -->
            <a href="products.php" class="flex items-center gap-3 px-4 py-3 bg-green-50 text-green-700 font-medium rounded-lg border-l-4 border-green-600">
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path d="M21 16V8a2 2 0 0 0-1-1.73l-7-4a2 2 0 0 0-2 0l-7 4A2 2 0 0 0 3 8v8a2 2 0 0 0 1 1.73l7 4a2 2 0 0 0 2 0l7-4A2 2 0 0 0 21 16z"></path><polyline points="3.27 6.96 12 12.01 20.73 6.96"></polyline><line x1="12" y1="22.08" x2="12" y2="12"></line></svg>
                <span>Produits</span>
                <svg class="w-5 h-5 ml-auto" fill="none" stroke="currentColor" viewBox="0 0 24 24"><polyline points="9 18 15 12 9 6"></polyline></svg>
            </a>

            <a href="orders.php" class="flex items-center gap-3 px-4 py-3 text-gray-600 hover:bg-gray-50 rounded-lg transition group">
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><circle cx="9" cy="21" r="1"></circle><circle cx="20" cy="21" r="1"></circle><path d="M1 1h4l2.68 13.39a2 2 0 0 0 2 1.61h9.72a2 2 0 0 0 2-1.61L23 6H6"></path></svg>
                <span>Commandes</span>
                <svg class="w-5 h-5 ml-auto opacity-0 group-hover:opacity-100 transition" fill="none" stroke="currentColor" viewBox="0 0 24 24"><polyline points="9 18 15 12 9 6"></polyline></svg>
            </a>

            <a href="stats.php" class="flex items-center gap-3 px-4 py-3 text-gray-600 hover:bg-gray-50 rounded-lg transition group">
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><line x1="12" y1="20" x2="12" y2="10"></line><line x1="18" y1="20" x2="18" y2="4"></line><line x1="6" y1="20" x2="6" y2="16"></line></svg>
                <span>Statistiques</span>
                <svg class="w-5 h-5 ml-auto opacity-0 group-hover:opacity-100 transition" fill="none" stroke="currentColor" viewBox="0 0 24 24"><polyline points="9 18 15 12 9 6"></polyline></svg>
            </a>

            <a href="blog.php" class="flex items-center gap-3 px-4 py-3 text-gray-600 hover:bg-gray-50 rounded-lg transition group">
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path d="M14 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V8z"></path><polyline points="14 2 14 8 20 8"></polyline></svg>
                <span>Blog</span>
                <svg class="w-5 h-5 ml-auto opacity-0 group-hover:opacity-100 transition" fill="none" stroke="currentColor" viewBox="0 0 24 24"><polyline points="9 18 15 12 9 6"></polyline></svg>
            </a>

            <a href="settings.php" class="flex items-center gap-3 px-4 py-3 text-gray-600 hover:bg-gray-50 rounded-lg transition group">
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><circle cx="12" cy="12" r="3"></circle><path d="M19.4 15a1.65 1.65 0 0 0 .33 1.82l.06.06a2 2 0 0 1 0 2.83 2 2 0 0 1-2.83 0l-.06-.06a1.65 1.65 0 0 0-1.82-.33 1.65 1.65 0 0 0-1 1.51V21a2 2 0 0 1-2 2 2 2 0 0 1-2-2v-.09A1.65 1.65 0 0 0 9 19.4a1.65 1.65 0 0 0-1.82.33l-.06.06a2 2 0 0 1-2.83 0 2 2 0 0 1 0-2.83l.06-.06a1.65 1.65 0 0 0 .33-1.82 1.65 1.65 0 0 0-1.51-1H3a2 2 0 0 1-2-2 2 2 0 0 1 2-2h.09A1.65 1.65 0 0 0 4.6 9a1.65 1.65 0 0 0-.33-1.82l-.06-.06a2 2 0 0 1 0-2.83 2 2 0 0 1 2.83 0l.06.06a1.65 1.65 0 0 0 1.82.33H9a1.65 1.65 0 0 0 1-1.51V3a2 2 0 0 1 2-2 2 2 0 0 1 2 2v.09a1.65 1.65 0 0 0 1 1.51 1.65 1.65 0 0 0 1.82-.33l.06-.06a2 2 0 0 1 2.83 0 2 2 0 0 1 0 2.83l-.06.06a1.65 1.65 0 0 0-.33 1.82V9a1.65 1.65 0 0 0 1.51 1H21a2 2 0 0 1 2 2 2 2 0 0 1-2 2h-.09a1.65 1.65 0 0 0-1.51 1z"></path></svg>
                <span>Paramètres</span>
                <svg class="w-5 h-5 ml-auto opacity-0 group-hover:opacity-100 transition" fill="none" stroke="currentColor" viewBox="0 0 24 24"><polyline points="9 18 15 12 9 6"></polyline></svg>
            </a>
        </nav>
    </aside>

    <!-- CONTENU PRINCIPAL -->
    <main class="flex-1 p-8">
        <h1 class="text-3xl font-bold text-gray-900 mb-8">Gestion des Produits</h1>

        <!-- Stats rapides -->
        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-6 mb-10">
            <div class="bg-white rounded-2xl p-6 shadow-sm border border-gray-100">
                <p class="text-sm text-gray-500">Total produits</p>
                <p class="text-3xl font-bold mt-2 text-green-600">487</p>
            </div>
            <div class="bg-white rounded-2xl p-6 shadow-sm border border-gray-100">
                <p class="text-sm text-gray-500">En stock</p>
                <p class="text-3xl font-bold mt-2 text-green-600">423</p>
            </div>
            <div class="bg-white rounded-2xl p-6 shadow-sm border border-gray-100">
                <p class="text-sm text-gray-500">Stock bas</p>
                <p class="text-3xl font-bold mt-2 text-orange-600">45</p>
            </div>
            <div class="bg-white rounded-2xl p-6 shadow-sm border border-gray-100">
                <p class="text-sm text-gray-500">Rupture</p>
                <p class="text-3xl font-bold mt-2 text-red-600">19</p>
            </div>
        </div>

        <!-- Grille de produits – IMAGES ULTRA-RAPIDES + LAZY LOADING -->
        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 gap-6">
            <?php
            $products = [
                ['name' => 'Panier Artisanal Bamoun', 'cat' => 'Artisanat', 'price' => '15,000 F', 'stock' => 12, 'sold' => 24, 'img' => 'https://images.unsplash.com/photo-1584997512552-8c8b0a79d0c5?w=600&q=80'],
                ['name' => 'Huile de Palme Rouge Bio', 'cat' => 'Agroalimentaire', 'price' => '8,500 F', 'stock' => 30, 'sold' => 45, 'img' => 'https://images.unsplash.com/photo-1474979266404-7eaacbcd87c5?w=600&q=80'],
                ['name' => 'Masque Bamiléké Authentique', 'cat' => 'Artisanat', 'price' => '45,000 F', 'stock' => 5, 'sold' => 8, 'img' => 'https://images.unsplash.com/photo-1580656449403-2682b27d1b5f?w=600&q=80'],
                ['name' => 'Tissu Ndop Traditionnel', 'cat' => 'Textile', 'price' => '25,000 F', 'stock' => 18, 'sold' => 67, 'img' => 'https://images.unsplash.com/photo-1604176354204-9268737828e4?w=600&q=80'],
                ['name' => 'Savon Noir Africain', 'cat' => 'Cosmétique', 'price' => '3,500 F', 'stock' => 89, 'sold' => 156, 'img' => 'https://images.unsplash.com/photo-1559598467-f8b76c5b6d3e?w=600&q=80'],
                ['name' => 'Statue Baoulé', 'cat' => 'Artisanat', 'price' => '85,000 F', 'stock' => 3, 'sold' => 12, 'img' => 'https://images.unsplash.com/photo-1578926288220-9f6d68e8c7f6?w=600&q=80'],
                ['name' => 'Miel de Forêt Bio', 'cat' => 'Agroalimentaire', 'price' => '12,000 F', 'stock' => 42, 'sold' => 89, 'img' => 'https://images.unsplash.com/photo-1558642084-f3080647761f?w=600&q=80'],
                ['name' => 'Collier Perles Massaï', 'cat' => 'Bijoux', 'price' => '18,000 F', 'stock' => 0, 'sold' => 34, 'img' => 'https://images.unsplash.com/photo-1600563449125-3d14364c0f3e?w=600&q=80'],
            ];

            foreach ($products as $p):
            ?>
            <div class="bg-white rounded-2xl shadow-sm border border-gray-100 overflow-hidden hover:shadow-lg transition-shadow">
                <img 
                    src="<?= $p['img'] ?>" 
                    alt="<?= $p['name'] ?>"
                    loading="lazy"
                    class="w-full h-48 object-cover bg-gray-100"
                    style="image-rendering: -webkit-optimize-contrast;">
                <div class="p-5">
                    <p class="text-xs text-gray-500 uppercase tracking-wider"><?= $p['cat'] ?></p>
                    <h3 class="font-semibold text-lg mt-1 line-clamp-2"><?= $p['name'] ?></h3>
                    <p class="text-2xl font-bold text-green-600 mt-2"><?= $p['price'] ?></p>
                    <p class="text-sm mt-2 <?= $p['stock'] <= 5 ? 'text-orange-600 font-medium' : ($p['stock'] == 0 ? 'text-red-600' : 'text-green-600') ?>">
                        <?= $p['stock'] == 0 ? 'Rupture de stock' : $p['stock'].' en stock' ?>
                    </p>
                    <p class="text-sm text-gray-500 mt-1">Vendus : <?= $p['sold'] ?></p>
                    <div class="flex gap-3 mt-4">
                        <a href="edit-product.php?id=<?= rand(100,999) ?>" class="flex-1 bg-green-600 hover:bg-green-700 text-white text-sm font-medium py-2.5 rounded-lg text-center transition">Modifier</a>
                        <button class="p-2.5 border border-red-600 text-red-600 rounded-lg hover:bg-red-50 transition">
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><polyline points="3 6 5 6 21 6"></polyline><path d="M19 6v14a2 2 0 0 1-2 2H7a2 2 0 0 1-2-2V6m3 0V4a2 2 0 0 1 2-2h4a2 2 0 0 1 2 2v2"></path></svg>
                        </button>
                    </div>
                </div>
            </div>
            <?php endforeach; ?>
        </div>

        <!-- Pagination -->
        <div class="flex justify-center mt-12 gap-3">
            <button class="px-5 py-2.5 border border-gray-300 rounded-lg hover:bg-gray-50 disabled:opacity-50" disabled>Précédent</button>
            <button class="px-5 py-2.5 bg-green-600 text-white rounded-lg">1</button>
            <button class="px-5 py-2.5 border border-gray-300 rounded-lg hover:bg-gray-50">2</button>
            <button class="px-5 py-2.5 border border-gray-300 rounded-lg hover:bg-gray-50">3</button>
            <button class="px-5 py-2.5 border border-gray-300 rounded-lg hover:bg-gray-50">Suivant</button>
        </div>
    </main>
</div>
</body>
</html>