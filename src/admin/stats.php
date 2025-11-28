<!DOCTYPE html>
<html lang="fr" class="scroll-smooth">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Statistiques - Admin Made in Cameroon</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="../../public/output.css">
</head>
<body class="font-['Poppins'] bg-gray-50 text-gray-900">

<div class="flex min-h-screen">
    <!-- SIDEBAR - Statistiques actif -->
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
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path d="M17 21v-2a4 4 0 0 0-4-4H5a4 4 0 0 0-4 4v2"></path><circle cx="9" cy="7" r="4"></circle><path d="M23 21v-2a4 4 0 0 0 0-3-3.87"></path><path d="M16 3.13a4 4 0 0 1 0 7.75"></path></svg>
                <span>Utilisateurs</span>
                <svg class="w-5 h-5 ml-auto opacity-0 group-hover:opacity-100 transition-opacity" fill="none" stroke="currentColor" viewBox="0 0 24 24"><polyline points="9 18 15 12 9 6"></polyline></svg>
            </a>

            <a href="products.php" class="flex items-center gap-3 px-4 py-3 rounded-lg text-gray-600 hover:bg-gray-100 hover:text-[#2E7D32] transition-colors group">
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path d="M21 16V8a2 2 0 0 0-1-1.73l-7-4a2 2 0 0 0-2 0l-7 4A2 2 0 0 0 0 3 8v8a2 2 0 0 0 1 1.73l7 4a2 2 0 0 0 2 0l7-4A2 2 0 0 0 21 16z"></path></svg>
                <span>Produits</span>
                <svg class="w-5 h-5 ml-auto opacity-0 group-hover:opacity-100 transition-opacity" fill="none" stroke="currentColor" viewBox="0 0 24 24"><polyline points="9 18 15 12 9 6"></polyline></svg>
            </a>

            <a href="orders.php" class="flex items-center gap-3 px-4 py-3 rounded-lg text-gray-600 hover:bg-gray-100 hover:text-[#2E7D32] transition-colors group">
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><circle cx="9" cy="21" r="1"></circle><circle cx="20" cy="21" r="1"></circle><path d="M1 1h4l2.68 13.39a2 2 0 0 0 2 1.61h9.72a2 2 0 0 0 2-1.61L23 6H6"></path></svg>
                <span>Commandes</span>
                <svg class="w-5 h-5 ml-auto opacity-0 group-hover:opacity-100 transition-opacity" fill="none" stroke="currentColor" viewBox="0 0 24 24"><polyline points="9 18 15 12 9 6"></polyline></svg>
            </a>

            <!-- STATISTIQUES = ACTIF -->
            <a href="stats.php" class="flex items-center gap-3 px-4 py-3 rounded-lg text-[#2E7D32] bg-[#e8f5e8] font-medium border-l-4 border-[#2E7D32] group">
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><line x1="12" y1="20" x2="12" y2="10"></line><line x1="18" y1="20" x2="18" y2="4"></line><line x1="6" y1="20" x2="6" y2="16"></line></svg>
                <span>Statistiques</span>
                <svg class="w-5 h-5 ml-auto opacity-100" fill="none" stroke="currentColor" viewBox="0 0 24 24"><polyline points="9 18 15 12 9 6"></polyline></svg>
            </a>

            <a href="blog.php" class="flex items-center gap-3 px-4 py-3 rounded-lg text-gray-600 hover:bg-gray-100 hover:text-[#2E7D32] transition-colors group">
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path d="M14 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V8z"></path><polyline points="14 2 14 8 20 8"></polyline></svg>
                <span>Blog</span>
                <svg class="w-5 h-5 ml-auto opacity-0 group-hover:opacity-100 transition-opacity" fill="none" stroke="currentColor" viewBox="0 0 24 24"><polyline points="9 18 15 12 9 6"></polyline></svg>
            </a>

            <a href="settings.php" class="flex items-center gap-3 px-4 py-3 rounded-lg text-gray-600 hover:bg-gray-100 hover:text-[#2E7D32] transition-colors group">
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><circle cx="12" cy="12" r="3"></circle><path d="M19.4 15a1.65 1.65 0 0 0 .33 1.82l.06.06a2 2 0 0 1 0 2.83 2 2 0 0 1-2.83 0l-.06-.06a1.65 1.65 0 0 0-1.82-.33 1.65 1.65 0 0 0-1 1.51V21a2 2 0 0 1-2 2 2 2 0 0 1-2-2v-.09A1.65 1.65 0 0 0 9 19.4a1.65 1.65 0 0 0-1.82.33l-.06.06a2 2 0 0 1-2.83 0 2 2 0 0 1 0-2.83l.06-.06a1.65 1.65 0 0 0 .33-1.82 1.65 1.65 0 0 0-1.51-1H3a2 2 0 0 1-2-2 2 2 0 0 1 2-2h.09A1.65 1.65 0 0 0 4.6 9a1.65 1.65 0 0 0-.33-1.82l-.06-.06a2 2 0 0 1 0-2.83 2 2 0 0 1 2.83 0l.06.06a1.65 1.65 0 0 0 1.82.33H9a1.65 1.65 0 0 0 1-1.51V3a2 2 0 0 1 2-2 2 2 0 0 1 2 2v.09a1.65 1.65 0 0 0 1 1.51 1.65 1.65 0 0 0 1.82-.33l.06-.06a2 2.83 0 2 2 0 0 2.83l-.06.06a1.65 1.65 0 0 0-.33 1.82V9a1.65 1.65 0 0 0 1.51 1H21a2 2 0 0 1 2 2 2 2 0 0 1-2 2h-.09a1.65 1.65 0 0 0-1.51 1z"></path></svg>
                <span>Paramètres</span>
                <svg class="w-5 h-5 ml-auto opacity-0 group-hover:opacity-100 transition-opacity" fill="none" stroke="currentColor" viewBox="0 0 24 24"><polyline points="9 18 15 12 9 6"></polyline></svg>
            </a>
        </nav>
    </aside>

    <!-- CONTENU PRINCIPAL - Statistiques -->
    <main class="flex-1 p-8">
        <div class="mb-8">
            <h1 class="text-3xl font-bold text-gray-900">Statistiques & Rapports</h1>
            <p class="text-gray-600 mt-2">Suivi en temps réel de l'activité de votre plateforme Made in Cameroon</p>
        </div>

        <!-- Cartes principales -->
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6 mb-8">
            <div class="bg-white rounded-2xl p-6 shadow-sm border border-gray-100">
                <div class="flex items-center justify-between">
                    <div>
                        <p class="text-sm text-gray-500">Chiffre d'affaires</p>
                        <p class="text-3xl font-bold mt-2 text-green-600">8,542,300 F</p>
                        <p class="text-sm text-green-600 mt-2">+23% vs mois dernier</p>
                    </div>
                    <svg class="w-12 h-12 text-green-100" fill="currentColor" viewBox="0 0 24 24"><path d="M12 2a10 10 0 100 20 10 10 0 000-20zm1 17h-2 0v-2h2v2zm2.4-5.8l-.9.9A3.06 3.06 0 0113 15.5a3.06 3.06 0 01-2.5-1.4l-.9-.9a5.05 5.05 0 010-7.2 5.05 5.05 0 017.2 0 5.05 5.05 0 010 7.2z"/></svg>
                </div>
            </div>

            <div class="bg-white rounded-2xl p-6 shadow-sm border border-gray-100">
                <div class="flex items-center justify-between">
                    <div>
                        <p class="text-sm text-gray-500">Commandes totales</p>
                        <p class="text-3xl font-bold mt-2">856</p>
                        <p class="text-sm text-green-600 mt-2">+18% vs mois dernier</p>
                    </div>
                    <svg class="w-12 h-12 text-blue-100" fill="currentColor" viewBox="0 0 24 24"><path d="M3 3h18v18H3V3zm16 16V5H5v14h14zM7 7h10v2H7V7zm0 4h10v2H7v-2zm0 4h7v2H7v-2z"/></svg>
                </div>
            </div>

            <div class="bg-white rounded-2xl p-6 shadow-sm border border-gray-100">
                <div class="flex items-center justify-between">
                    <div>
                        <p class="text-sm text-gray-500">Nouveaux clients</p>
                        <p class="text-3xl font-bold mt-2">342</p>
                        <p class="text-sm text-green-600 mt-2">+31% vs mois dernier</p>
                    </div>
                    <svg class="w-12 h-12 text-purple-100" fill="currentColor" viewBox="0 0 24 24"><path d="M12 12c2.21 0 4-1.79 4-4s-1.79-4-4-4-4 1.79-4 4 1.79 4 4 4zm0 2c-2.67 0-8 1.34-8 4v2h16v-2c0-2.66-5.33-4-8-4z"/></svg>
                </div>
            </div>

            <div class="bg-white rounded-2xl p-6 shadow-sm border border-gray-100">
                <div class="flex items-center justify-between">
                    <div>
                        <p class="text-sm text-gray-500">Taux de conversion</p>
                        <p class="text-3xl font-bold mt-2">4.8%</p>
                        <p class="text-sm text-red-600 mt-2">-5% vs mois dernier</p>
                    </div>
                    <svg class="w-12 h-12 text-orange-100" fill="currentColor" viewBox="0 0 24 24"><path d="M12 2a10 10 0 100 20 10 10 0 000-20zm1 17h-2v-2h2v2zm2.07-7.75l-.9.92C13.45 12.9 13 13.5 13 15h-2v-.5c0-1.1.45-2.1 1.17-2.83l1.24-1.26c.37-.36.59-.59.59-.59V8h2v1.17z"/></svg>
                </div>
            </div>
        </div>

        <!-- Graphiques -->
        <div class="grid grid-cols-1 lg:grid-cols-2 gap-8 mb-8">
            <!-- Ventes par mois -->
            <div class="bg-white rounded-2xl p-6 shadow-sm border border-gray-100">
                <h3 class="text-lg font-semibold mb-4">Évolution des ventes (2025)</h3>
                <div class="h-80 bg-gray-50 rounded-xl flex items-end justify-center">
                    <div class="text-gray-400 text-center pt-32">
                        <svg class="w-20 h-20 mx-auto mb-4 opacity-30" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 19v-6a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2a2 2 0 002-2zm0 0V9a2 2 0 012-2h2a2 2 0 012 2v10m-6 0a2 2 0 002 2h2a2 2 0 002-2m0 0V5a2 2 0 012-2h2a2 2 0 012 2v14a2 2 0 01-2 2h-2a2 2 0 01-2-2z"></path></svg>
                        <p>Graphique des ventes mensuelles</p>
                    </div>
                </div>
            </div>

            <!-- Répartition par catégorie -->
            <div class="bg-white rounded-2xl p-6 shadow-sm border border-gray-100">
                <h3 class="text-lg font-semibold mb-4">Ventes par catégorie</h3>
                <div class="space-y-4">
                    <div>
                        <div class="flex justify-between text-sm mb-1">
                            <span>Artisanat</span>
                            <span class="font-medium">38%</span>
                        </div>
                        <div class="w-full bg-gray-200 rounded-full h-3">
                            <div class="bg-green-600 h-3 rounded-full" style="width: 38%"></div>
                        </div>
                    </div>
                    <div>
                        <div class="flex justify-between text-sm mb-1">
                            <span>Agroalimentaire</span>
                            <span class="font-medium">28%</span>
                        </div>
                        <div class="w-full bg-gray-200 rounded-full h-3">
                            <div class="bg-blue-600 h-3 rounded-full" style="width: 28%"></div>
                        </div>
                    </div>
                    <div>
                        <div class="flex justify-between text-sm mb-1">
                            <span>Mode & Textile</span>
                            <span class="font-medium">22%</span>
                        </div>
                        <div class="w-full bg-gray-200 rounded-full h-3">
                            <div class="bg-purple-600 h-3 rounded-full" style="width: 22%"></div>
                        </div>
                    </div>
                    <div>
                        <div class="flex justify-between text-sm mb-1">
                            <span>Cosmétique</span>
                            <span class="font-medium">12%</span>
                        </div>
                        <div class="w-full bg-gray-200 rounded-full h-3">
                            <div class="bg-orange-600 h-3 rounded-full" style="width: 12%"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Meilleurs vendeurs -->
        <div class="bg-white rounded-2xl shadow-sm border border-gray-100 overflow-hidden">
            <div class="px-6 py-4 border-b border-gray-100">
                <h3 class="text-lg font-semibold">Top 5 des vendeurs ce mois-ci</h3>
            </div>
            <table class="w-full">
                <thead class="bg-gray-50 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                    <tr>
                        <th class="px-6 py-3">Rang</th>
                        <th class="px-6 py-3">Vendeur</th>
                        <th class="px-6 py-3">Produits vendus</th>
                        <th class="px-6 py-3">Chiffre d'affaires</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-gray-100">
                    <tr class="hover:bg-gray-50">
                        <td class="px-6 py-4"><span class="text-2xl">1</span></td>
                        <td class="px-6 py-4 font-medium">Atelier Bamoun</td>
                        <td class="px-6 py-4">89 produits</td>
                        <td class="px-6 py-4 font-bold text-green-600">1,245,000 F</td>
                    </tr>
                    <tr class="hover:bg-gray-50">
                        <td class="px-6 py-4"><span class="text-2xl text-gray-400">2</span></td>
                        <td class="px-6 py-4 font-medium">Coopérative Ouest</td>
                        <td class="px-6 py-4">76 produits</td>
                        <td class="px-6 py-4 font-bold text-green-600">980,500 F</td>
                    </tr>
                    <tr class="hover:bg-gray-50">
                        <td class="px-6 py-4"><span class="text-2xl text-gray-400">3</span></td>
                        <td class="px-6 py-4 font-medium">Maison du Pagne</td>
                        <td class="px-6 py-4">64 produits</td>
                        <td class="px-6 py-4 font-bold text-green-600">845,000 F</td>
                    </tr>
                </tbody>
            </table>
        </div>
    </main>
</div>
</body>
</html>