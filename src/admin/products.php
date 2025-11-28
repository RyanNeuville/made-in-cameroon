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
    <!-- SIDEBAR - 100% identique à ton ancien style (bordure verte + chevron uniquement sur actif) -->
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
            <a href="dashboard.php" class="flex items-center gap-3 px-4 py-3 rounded-lg text-gray-600 hover:bg-gray-100 hover:text-[#2E7D32] transition-colors group">
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><rect x="3" y="3" width="7" height="7"></rect><rect x="14" y="3" width="7" height="7"></rect><rect x="14" y="14" width="7" height="7"></rect><rect x="3" y="14" width="7" height="7"></rect></svg>
                <span>Tableau de bord</span>
                <svg class="w-5 h-5 ml-auto opacity-0 group-hover:opacity-100 transition-opacity" fill="none" stroke="currentColor" viewBox="0 0 24 24"><polyline points="9 18 15 12 9 6"></polyline></svg>
            </a>

            <a href="users.php" class="flex items-center gap-3 px-4 py-3 rounded-lg text-gray-600 hover:bg-gray-100 hover:text-[#2E7D32] transition-colors group">
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path d="M17 21v-2a4 4 0 0 0-4-4H5a4 4 0 0-4 4v2"></path><circle cx="9" cy="7" r="4"></circle><path d="M23 21v-2a4 4 0 0-3-3.87"></path><path d="M16 3.13a4 4 0 0 1 0 7.75"></path></svg>
                <span>Utilisateurs</span>
                <svg class="w-5 h-5 ml-auto opacity-0 group-hover:opacity-100 transition-opacity" fill="none" stroke="currentColor" viewBox="0 0 24 24"><polyline points="9 18 15 12 9 6"></polyline></svg>
            </a>

            <!-- PRODUITS = ACTIF -->
            <a href="products.php" class="flex items-center gap-3 px-4 py-3 rounded-lg text-[#2E7D32] bg-[#e8f5e8] font-medium border-l-4 border-[#2E7D32] group">
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path d="M21 16V8a2 2 0 0-1-1.73l-7-4a2 2 0 0-2 0l-7 4A2 2 0 0 3 8v8a2 2 0 0 1 1.73l7 4a2 2 0 0 2 0l7-4A2 2 0 0 21 16z"></path><polyline points="3.27 6.96 12 12.01 20.73 6.96"></polyline><line x1="12" y1="22.08" x2="12" y2="12"></line></svg>
                <span>Produits</span>
                <svg class="w-5 h-5 ml-auto opacity-100" fill="none" stroke="currentColor" viewBox="0 0 24 24"><polyline points="9 18 15 12 9 6"></polyline></svg>
            </a>

            <a href="orders.php" class="flex items-center gap-3 px-4 py-3 rounded-lg text-gray-600 hover:bg-gray-100 hover:text-[#2E7D32] transition-colors group">
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><circle cx="9" cy="21" r="1"></circle><circle cx="20" cy="21" r="1"></circle><path d="M1 1h4l2.68 13.39a2 2 0 0 2 1.61h9.72a2 2 0 0 2-1.61L23 6H6"></path></svg>
                <span>Commandes</span>
                <svg class="w-5 h-5 ml-auto opacity-0 group-hover:opacity-100 transition-opacity" fill="none" stroke="currentColor" viewBox="0 0 24 24"><polyline points="9 18 15 12 9 6"></polyline></svg>
            </a>

            <a href="stats.php" class="flex items-center gap-3 px-4 py-3 rounded-lg text-gray-600 hover:bg-gray-100 hover:text-[#2E7D32] transition-colors group">
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><line x1="12" y1="20" x2="12" y2="10"></line><line x1="18" y1="20" x2="18" y2="4"></line><line x1="6" y1="20" x2="6" y2="16"></line></svg>
                <span>Statistiques</span>
                <svg class="w-5 h-5 ml-auto opacity-0 group-hover:opacity-100 transition-opacity" fill="none" stroke="currentColor" viewBox="0 0 24 24"><polyline points="9 18 15 12 9 6"></polyline></svg>
            </a>

            <a href="blog.php" class="flex items-center gap-3 px-4 py-3 rounded-lg text-gray-600 hover:bg-gray-100 hover:text-[#2E7D32] transition-colors group">
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path d="M14 2H6a2 2 0 0-2 2v16a2 2 0 0 2 2h12a2 2 0 0 2-2V8z"></path><polyline points="14 2 14 8 20 8"></polyline><line x1="16" y1="13" x2="8" y2="13"></line><line x1="16" y1="17" x2="8" y2="17"></line><polyline points="10 9 9 9 8 9"></polyline></svg>
                <span>Blog</span>
                <svg class="w-5 h-5 ml-auto opacity-0 group-hover:opacity-100 transition-opacity" fill="none" stroke="currentColor" viewBox="0 0 24 24"><polyline points="9 18 15 12 9 6"></polyline></svg>
            </a>

            <a href="settings.php" class="flex items-center gap-3 px-4 py-3 rounded-lg text-gray-600 hover:bg-gray-100 hover:text-[#2E7D32] transition-colors group">
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><circle cx="12" cy="12" r="3"></circle><path d="M19.4 15a1.65 1.65 0 0.33 1.82l.06.06a2 2 0 0 0 2.83 2 2 0 0-2.83 0l-.06-.06a1.65 1.65 0 0-1.82-.33 1.65 1.65 0 0-1 1.51V21a2 2 0 0-2 2 2 2 0 0-2-2v-.09A1.65 1.65 0 0 9 19.4a1.65 1.65 0 0-1.82.33l-.06.06a2 2 0 0-2.83 0 2 2 0 0 0-2.83l.06-.06a1.65 1.65 0 0.33-1.82 1.65 1.65 0 0-1.51-1H3a2 2 0 0-2-2 2 2 0 0 2-2h.09A1.65 1.65 0 0 4.6 9a1.65 1.65 0 0-.33-1.82l-.06-.06a2 2 0 0 0 2.83 2 2 0 0 2.83 0l.06.06a1.65 1.65 0 0 1.82.33H9a1.65 1.65 0 0 1-1.51V3a2 2 0 0 2-2 2 2 0 0 2 2v.09a1.65 1.65 0 0 1 1.51 1.65 1.65 0 0 1.82-.33l.06-.06a2 2 0 0 2.83 0 2 2 0 0 0 2.83l-.06.06a1.65 1.65 0 0-.33 1.82V9a1.65 1.65 0 0 1.51 1H21a2 2 0 0 2 2 2 2 0 0-2 2h-.09a1.65 1.65 0 0-1.51 1z"></path></svg>
                <span>Paramètres</span>
                <svg class="w-5 h-5 ml-auto opacity-0 group-hover:opacity-100 transition-opacity" fill="none" stroke="currentColor" viewBox="0 0 24 24"><polyline points="9 18 15 12 9 6"></polyline></svg>
            </a>
        </nav>
    </aside>

    <!-- CONTENU PRINCIPAL -->
    <main class="flex-1 p-8">
        <!-- Header -->
        <div class="flex justify-between items-center mb-8">
            <h1 class="text-3xl font-bold text-gray-900">Gestion des Produits</h1>
            <button onclick="openAddProductModal()" class="bg-green-600 hover:bg-green-700 text-white font-medium px-6 py-3 rounded-lg flex items-center gap-2 transition">
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><line x1="12" y1="5" x2="12" y2="19"></line><line x1="5" y1="12" x2="19" y2="12"></line></svg>
                Ajouter un produit
            </button>
        </div>

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
                <p class="text-sm text-gray-500">Rupture de stock</p>
                <p class="text-3xl font-bold mt-2 text-red-600">19</p>
            </div>
        </div>

        <!-- Grille de produits -->
        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 gap-6">
            <!-- Produit 1 -->
            <div class="bg-white rounded-2xl shadow-sm border border-gray-100 overflow-hidden hover:shadow-lg transition-shadow">
                <img src="https://images.unsplash.com/photo-1584997512552-8c8b0a79d0c5?w=600" alt="Panier Artisanal" class="w-full h-48 object-cover">
                <div class="p-5">
                    <p class="text-xs text-gray-500 uppercase tracking-wider">Artisanat</p>
                    <h3 class="font-semibold text-lg mt-1">Panier Artisanal Bamoun</h3>
                    <p class="text-2xl font-bold text-green-600 mt-2">15,000 F</p>
                    <p class="text-sm text-green-600 mt-2">12 en stock</p>
                    <p class="text-sm text-gray-500 mt-2">Vendus : 24</p>
                    <div class="flex gap-3 mt-4">
                        <button class="flex-1 bg-green-600 hover:bg-green-700 text-white text-sm font-medium py-2.5 rounded-lg transition">Modifier</button>
                        <button class="p-2.5 border border-red-600 text-red-600 rounded-lg hover:bg-red-50 transition">
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><polyline points="3 6 5 6 21 6"></polyline><path d="M19 6v14a2 2 0 0-2 2H7a2 2 0 0-2-2V6m3 0V4a2 2 0 0 2-2h4a2 2 0 0 2 2v2"></path></svg>
                        </button>
                    </div>
                </div>
            </div>

            <!-- Les 7 autres produits (même structure) -->
            <div class="bg-white rounded-2xl shadow-sm border border-gray-100 overflow-hidden hover:shadow-lg transition-shadow">
                <img src="https://images.unsplash.com/photo-1474979266404-7eaacbcd87c5?w=600" alt="Huile de Palme" class="w-full h-48 object-cover">
                <div class="p-5">
                    <p class="text-xs text-gray-500 uppercase tracking-wider">Agroalimentaire</p>
                    <h3 class="font-semibold text-lg mt-1">Huile de Palme Rouge Bio</h3>
                    <p class="text-2xl font-bold text-green-600 mt-2">8,500 F</p>
                    <p class="text-sm text-green-600 mt-2">30 en stock</p>
                    <p class="text-sm text-gray-500 mt-2">Vendus : 45</p>
                    <div class="flex gap-3 mt-4">
                        <button class="flex-1 bg-green-600 hover:bg-green-700 text-white text-sm font-medium py-2.5 rounded-lg transition">Modifier</button>
                        <button class="p-2.5 border border-red-600 text-red-600 rounded-lg hover:bg-red-50 transition">
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><polyline points="3 6 5 6 21 6"></polyline><path d="M19 6v14a2 2 0 0-2 2H7a2 2 0 0-2-2V6m3 0V4a2 2 0 0 2-2h4a2 2 0 0 2 2v2"></path></svg>
                        </button>
                    </div>
                </div>
            </div>

            <!-- Tu peux copier-coller les 6 autres cartes, elles sont identiques dans la structure -->
            <!-- Exemple du produit avec stock bas -->
            <div class="bg-white rounded-2xl shadow-sm border border-gray-100 overflow-hidden hover:shadow-lg transition-shadow">
                <img src="https://images.unsplash.com/photo-1580656449403-2682b27d1b5f?w=600" alt="Masque Bamiléké" class="w-full h-48 object-cover">
                <div class="p-5">
                    <p class="text-xs text-gray-500 uppercase tracking-wider">Artisanat</p>
                    <h3 class="font-semibold text-lg mt-1">Masque Bamiléké</h3>
                    <p class="text-2xl font-bold text-green-600 mt-2">45,000 F</p>
                    <p class="text-sm text-orange-600 font-medium mt-2">5 en stock</p>
                    <p class="text-sm text-gray-500 mt-2">Vendus : 8</p>
                    <div class="flex gap-3 mt-4">
                        <button class="flex-1 bg-green-600 hover:bg-green-700 text-white text-sm font-medium py-2.5 rounded-lg transition">Modifier</button>
                        <button class="p-2.5 border border-red-600 text-red-600 rounded-lg hover:bg-red-50 transition">
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><polyline points="3 6 5 6 21 6"></polyline><path d="M19 6v14a2 2 0 0-2 2H7a2 2 0 0-2-2V6m3 0V4a2 2 0 0 2-2h4a2 2 0 0 2 2v2"></path></svg>
                        </button>
                    </div>
                </div>
            </div>
            <!-- ... répète pour les autres produits -->
        </div>

        <!-- Pagination -->
        <div class="flex justify-center mt-12 gap-3">
            <button class="px-5 py-2.5 border border-gray-300 rounded-lg hover:bg-gray-50 disabled:opacity-50 disabled:cursor-not-allowed" disabled>Précédent</button>
            <button class="px-5 py-2.5 bg-green-600 text-white rounded-lg">1</button>
            <button class="px-5 py-2.5 border border-gray-300 rounded-lg hover:bg-gray-50">2</button>
            <button class="px-5 py-2.5 border border-gray-300 rounded-lg hover:bg-gray-50">3</button>
            <button class="px-5 py-2.5 border border-gray-300 rounded-lg hover:bg-gray-50">Suivant</button>
        </div>
    </main>
</div>

<script>
    function openAddProductModal() {
        alert("Fonctionnalité d'ajout de produit - À implémenter");
    }
</script>
</body>
</html>