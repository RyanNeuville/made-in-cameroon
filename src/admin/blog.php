<!DOCTYPE html>
<html lang="fr" class="scroll-smooth">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gestion du Blog - Admin Made in Cameroon</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="../../public/output.css">
</head>
<body class="font-['Poppins'] bg-gray-50 text-gray-900">

<div class="flex min-h-screen">
    <!-- SIDEBAR COMPLÈTE - Blog actif -->
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
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path d="M17 21v-2a4 4 0 0 0-4-4H5a4 4 0 0 0-4 4v2"></path><circle cx="9" cy="7" r="4"></circle><path d="M23 21v-2a4 4 0 0 0-3-3.87"></path><path d="M16 3.13a4 4 0 0 1 0 7.75"></path></svg>
                <span>Utilisateurs</span>
                <svg class="w-5 h-5 ml-auto opacity-0 group-hover:opacity-100 transition-opacity" fill="none" stroke="currentColor" viewBox="0 0 24 24"><polyline points="9 18 15 12 9 6"></polyline></svg>
            </a>

            <a href="products.php" class="flex items-center gap-3 px-4 py-3 rounded-lg text-gray-600 hover:bg-gray-100 hover:text-[#2E7D32] transition-colors group">
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path d="M21 16V8a2 2 0 0 0-1-1.73l-7-4a2 2 0 0 0-2 0l-7 4A2 2 0 0 0 3 8v8a2 2 0 0 0 1 1.73l7 4a2 2 0 0 0 2 0l7-4A2 2 0 0 0 21 16z"></path><polyline points="3.27 6.96 12 12.01 20.73 6.96"></polyline><line x1="12" y1="22.08" x2="12" y2="12"></line></svg>
                <span>Produits</span>
                <svg class="w-5 h-5 ml-auto opacity-0 group-hover:opacity-100 transition-opacity" fill="none" stroke="currentColor" viewBox="0 0 24 24"><polyline points="9 18 15 12 9 6"></polyline></svg>
            </a>

            <a href="orders.php" class="flex items-center gap-3 px-4 py-3 rounded-lg text-gray-600 hover:bg-gray-100 hover:text-[#2E7D32] transition-colors group">
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><circle cx="9" cy="21" r="1"></circle><circle cx="20" cy="21" r="1"></circle><path d="M1 1h4l2.68 13.39a2 2 0 0 0 2 1.61h9.72a2 2 0 0 0 2-1.61L23 6H6"></path></svg>
                <span>Commandes</span>
                <svg class="w-5 h-5 ml-auto opacity-0 group-hover:opacity-100 transition-opacity" fill="none" stroke="currentColor" viewBox="0 0 24 24"><polyline points="9 18 15 12 9 6"></polyline></svg>
            </a>

            <a href="stats.php" class="flex items-center gap-3 px-4 py-3 rounded-lg text-gray-600 hover:bg-gray-100 hover:text-[#2E7D32] transition-colors group">
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><line x1="12" y1="20" x2="12" y2="10"></line><line x1="18" y1="20" x2="18" y2="4"></line><line x1="6" y1="20" x2="6" y2="16"></line></svg>
                <span>Statistiques</span>
                <svg class="w-5 h-5 ml-auto opacity-0 group-hover:opacity-100 transition-opacity" fill="none" stroke="currentColor" viewBox="0 0 24 24"><polyline points="9 18 15 12 9 6"></polyline></svg>
            </a>

            <!-- BLOG ACTIF -->
            <a href="blog.php" class="flex items-center gap-3 px-4 py-3 rounded-lg text-[#2E7D32] bg-[#e8f5e8] font-medium border-l-4 border-[#2E7D32] group">
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path d="M14 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V8z"></path><polyline points="14 2 14 8 20 8"></polyline><line x1="16" y1="13" x2="8" y2="13"></line><line x1="16" y1="17" x2="8" y2="17"></line><polyline points="10 9 9 9 8 9"></polyline></svg>
                <span>Blog</span>
                <svg class="w-5 h-5 ml-auto opacity-100" fill="none" stroke="currentColor" viewBox="0 0 24 24"><polyline points="9 18 15 12 9 6"></polyline></svg>
            </a>

            <a href="settings.php" class="flex items-center gap-3 px-4 py-3 rounded-lg text-gray-600 hover:bg-gray-100 hover:text-[#2E7D32] transition-colors group">
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><circle cx="12" cy="12" r="3"></circle><path d="M19.4 15a1.65 1.65 0 0 0 .33 1.82l.06.06a2 2 0 0 1 0 2.83 2 2 0 0 1-2.83 0l-.06-.06a1.65 1.65 0 0 0-1.82-.33 1.65 1.65 0 0 0-1 1.51V21a2 2 0 0 1-2 2 2 2 0 0 1-2-2v-.09A1.65 1.65 0 0 0 9 19.4a1.65 1.65 0 0 0-1.82.33l-.06.06a2 2 0 0 1-2.83 0 2 2 0 0 1 0-2.83l.06-.06a1.65 1.65 0 0 0 .33-1.82 1.65 1.65 0 0 0-1.51-1H3a2 2 0 0 1-2-2 2 2 0 0 1 2-2h.09A1.65 1.65 0 0 0 4.6 9a1.65 1.65 0 0 0-.33-1.82l-.06-.06a2 2 0 0 1 0-2.83 2 2 0 0 1 2.83 0l.06.06a1.65 1.65 0 0 0 1.82.33H9a1.65 1.65 0 0 0 1-1.51V3a2 2 0 0 1 2-2 2 2 0 0 1 2 2v.09a1.65 1.65 0 0 0 1 1.51 1.65 1.65 0 0 0 1.82-.33l.06-.06a2 2 0 0 1 2.83 0 2 2 0 0 1 0 2.83l-.06.06a1.65 1.65 0 0 0-.33 1.82V9a1.65 1.65 0 0 0 1.51 1H21a2 2 0 0 1 2 2 2 2 0 0 1-2 2h-.09a1.65 1.65 0 0 0-1.51 1z"></path></svg>
                <span>Paramètres</span>
                <svg class="w-5 h-5 ml-auto opacity-0 group-hover:opacity-100 transition-opacity" fill="none" stroke="currentColor" viewBox="0 0 24 24"><polyline points="9 18 15 12 9 6"></polyline></svg>
            </a>
        </nav>
    </aside>

    <!-- CONTENU PRINCIPAL -->
    <main class="flex-1 p-8">
        <div class="flex justify-between items-center mb-8">
            <div>
                <h1 class="text-3xl font-bold text-gray-900">Gestion du Blog</h1>
                <p class="text-gray-600 mt-1">Rédigez et gérez les articles de la plateforme Made in Cameroon</p>
            </div>
            <button class="bg-green-600 hover:bg-green-700 text-white font-medium px-6 py-3 rounded-lg flex items-center gap-2 transition shadow-md">
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><line x1="12" y1="5" x2="12" y2="19"></line><line x1="5" y1="12" x2="19" y2="12"></line></svg>
                Nouvel article
            </button>
        </div>

        <div class="grid grid-cols-1 lg:grid-cols-3 gap-8">
            <!-- Liste des articles -->
            <div class="lg:col-span-2 space-y-6">
                <!-- Article 1 -->
                <article class="bg-white rounded-2xl shadow-sm border border-gray-100 overflow-hidden hover:shadow-xl transition-all duration-300">
                    <img src="https://images.unsplash.com/photo-1506784249884-5c7d4c7c8fe3?w=800" alt="Artisanat camerounais" class="w-full h-56 object-cover">
                    <div class="p-6">
                        <div class="flex flex-wrap gap-2 mb-4">
                            <span class="px-3 py-1 bg-green-100 text-green-700  font-medium rounded-full text-xs">Artisanat</span>
                            <span class="px-3 py-1 bg-blue-100 text-blue-700 text-xs font-medium rounded-full">Culture</span>
                            <span class="text-sm text-gray-500">Il y a 2 heures</span>
                        </div>
                        <h2 class="text-xl font-bold text-gray-900 mb-3">L’artisanat camerounais conquiert le monde</h2>
                        <p class="text-gray-600 line-clamp-2">Grâce à la plateforme Made in Cameroon, les artisans locaux exposent désormais leurs créations aux quatre coins du globe. Une success story made in 237 !</p>
                        <div class="flex items-center justify-between mt-5">
                            <div class="flex items-center gap-4 text-sm text-gray-500">
                                <span>Par Jean Admin</span>
                                <span>892 vues</span>
                                <span>12 commentaires</span>
                            </div>
                            <div class="flex gap-3">
                                <button class="text-green-600 font-medium hover:underline">Modifier</button>
                                <button class="text-red-600 hover:underline">Supprimer</button>
                            </div>
                        </div>
                    </div>
                </article>

                
                <!-- Article 2 -->
                <article class="bg-white rounded-2xl shadow-sm border border-gray-100 overflow-hidden hover:shadow-xl transition-all duration-300">
                    <img src="https://images.unsplash.com/photo-1581291518633-83b4ebd1d83e?w=800" alt="Huile de palme" class="w-full h-56 object-cover">
                    <div class="p-6">
                        <div class="flex flex-wrap gap-2 mb-4">
                            <span class="px-3 py-1 bg-orange-100 text-orange-700 text-xs font-medium rounded-full">Agroalimentaire</span>
                            <span class="text-sm text-gray-500">Il y a 1 jour</span>
                        </div>
                        <h2 class="text-xl font-bold text-gray-900 mb-3">L’huile de palme rouge : un trésor nutritionnel à redécouvrir</h2>
                        <p class="text-gray-600 line-clamp-2">Riche en vitamines A et E, l’huile de palme rouge camerounaise gagne en popularité auprès des consommateurs soucieux de leur santé...</p>
                        <div class="flex items-center justify-between mt-5">
                            <div class="flex items-center gap-4 text-sm text-gray-500">
                                <span>Par Marie Ngo</span>
                                <span>1,245 vues</span>
                            </div>
                            <div class="flex gap-3">
                                <button class="text-green-600 font-medium hover:underline">Modifier</button>
                                <button class="text-red-600 hover:underline">Supprimer</button>
                            </div>
                        </div>
                    </div>
                </article>

                <!-- + 2 autres articles si tu veux -->
            </div>

            <!-- Sidebar droite -->
            <div class="space-y-6">
                <!-- Stats blog -->
                <div class="bg-white rounded-2xl p-6 shadow-sm border border-gray-100">
                    <h3 class="font-semibold text-lg mb-5 text-gray-900">Statistiques du blog</h3>
                    <div class="space-y-5">
                        <div class="flex justify-between">
                            <span class="text-gray-600">Articles publiés</span>
                            <span class="text-2xl font-bold text-green-600">48</span>
                        </div>
                        <div class="flex justify-between">
                            <span class="text-gray-600">Vues totales</span>
                            <span class="text-2xl font-bold text-blue-600">127,430</span>
                        </div>
                        <div class="flex justify-between">
                            <span class="text-gray-600">Commentaires</span>
                            <span class="text-2xl font-bold text-purple-600">342</span>
                        </div>
                        <div class="flex justify-between">
                            <span class="text-gray-600">Temps moyen de lecture</span>
                            <span class="text-xl font-bold">4 min 32 s</span>
                        </div>
                    </div>
                </div>

                <!-- Catégories populaires -->
                <div class="bg-white rounded-2xl p-6 shadow-sm border border-gray-100">
                    <h3 class="font-semibold text-lg mb-5">Catégories populaires</h3>
                    <div class="space-y-3">
                        <div class="flex justify-between"><span>Artisanat</span><span class="text-green-600 font-medium">18 articles</span></div>
                        <div class="flex justify-between"><span>Agroalimentaire</span><span class="text-green-600 font-medium">12 articles</span></div>
                        <div class="flex justify-between"><span>Mode & Textile</span><span class="text-green-600 font-medium">10 articles</span></div>
                        <div class="flex justify-between"><span>Cosmétique naturelle</span><span class="text-green-600 font-medium">8 articles</span></div>
                    </div>
                </div>
            </div>
        </div>
    </main>
</div>
</body>
</html>