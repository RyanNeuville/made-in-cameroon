<!DOCTYPE html>
<html lang="fr" class="scroll-smooth">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Paramètres - Admin Made in Cameroon</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="../../public/output.css">
</head>
<body class="font-['Poppins'] bg-gray-50 text-gray-900">

<div class="flex min-h-screen">
    <!-- SIDEBAR COMPLÈTE - Paramètres actif -->
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
            <!-- Tous les menus sont là, comme dans les autres pages -->
            <a href="dashboard.php" class="flex items-center gap-3 px-4 py-3 rounded-lg text-gray-600 hover:bg-gray-100 hover:text-[#2E7D32] transition-colors group">Tableau de bord<svg class="w-5 h-5 ml-auto opacity-0 group-hover:opacity-100 transition-opacity" fill="none" stroke="currentColor" viewBox="0 0 24 24"><polyline points="9 18 15 12 9 6"></polyline></svg></a>
            <a href="users.php" class="flex items-center gap-3 px-4 py-3 rounded-lg text-gray-600 hover:bg-gray-100 hover:text-[#2E7D32] transition-colors group">Utilisateurs<svg class="w-5 h-5 ml-auto opacity-0 group-hover:opacity-100 transition-opacity" fill="none" stroke="currentColor" viewBox="0 0 24 24"><polyline points="9 18 15 12 9 6"></polyline></svg></a>
            <a href="products.php" class="flex items-center gap-3 px-4 py-3 rounded-lg text-gray-600 hover:bg-gray-100 hover:text-[#2E7D32] transition-colors group">Produits<svg class="w-5 h-5 ml-auto opacity-0 group-hover:opacity-100 transition-opacity" fill="none" stroke="currentColor" viewBox="0 0 24 24"><polyline points="9 18 15 12 9 6"></polyline></svg></a>
            <a href="orders.php" class="flex items-center gap- gap-3 px-4 py-3 rounded-lg text-gray-600 hover:bg-gray-100 hover:text-[#2E7D32] transition-colors group">Commandes<svg class="w-5 h-5 ml-auto opacity-0 group-hover:opacity-100 transition-opacity" fill="none" stroke="currentColor" viewBox="0 0 24 24"><polyline points="9 18 15 12 9 6"></polyline></svg></a>
            <a href="stats.php" class="flex items-center gap-3 px-4 py-3 rounded-lg text-gray-600 hover:bg-gray-100 hover:text-[#2E7D32] transition-colors group">Statistiques<svg class="w-5 h-5 ml-auto opacity-0 group-hover:opacity-100 transition-opacity" fill="none" stroke="currentColor" viewBox="0 0 24 24"><polyline points="9 18 15 12 9 6"></polyline></svg></a>
            <a href="blog.php" class="flex items-center gap-3 px-4 py-3 rounded-lg text-gray-600 hover:bg-gray-100 hover:text-[#2E7D32] transition-colors group">Blog<svg class="w-5 h-5 ml-auto opacity-0 group-hover:opacity-100 transition-opacity" fill="none" stroke="currentColor" viewBox="0 0 24 24"><polyline points="9 18 15 12 9 9 6"></polyline></svg></a>

            <!-- PARAMÈTRES ACTIF -->
            <a href="settings.php" class="flex items-center gap-3 px-4 py-3 rounded-lg text-[#2E7D32] bg-[#e8f5e8] font-medium border-l-4 border-[#2E7D32] group">
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><circle cx="12" cy="12" r="3"></circle><path d="M19.4 15a1.65 1.65 0 0 0 .33 1.82l.06.06a2 2 0 0 1 0 2.83 2 2 0 0 1-2.83 0l-.06-.06a1.65 1.65 0 0 0-1.82-.33 1.65 1.65 0 0 0-1 1.51V21a2 2 0 0 1-2 2 2 2 0 0 1-2-2v-.09A1.65 1.65 0 0 0 9 19.4a1.65 1.65 0 0 0-1.82.33l-.06.06a2 2 0 0 1-2.83 0 2 2 0 0 1 0-2.83l.06-.06a1.65 1.65 0 0 0 .33-1.82 1.65 1.65 0 0 0-1.51-1H3a2 2 0 0 1-2-2 2 2 0 0 1 2-2h.09A1.65 1.65 0 0 0 4.6 9a1.65 1.65 0 0 0-.33-1.82l-.06-.06a2 2 0 0 1 0-2.83 2 2 0 0 1 2.83 0l.06.06a1.65 1.65 0 0 0 1.82.33H9a1.65 1.65 0 0 0 1-1.51V3a2 2 0 0 1 2-2 2 2 0 0 1 2 2v.09a1.65 1.65 0 0 0 1 1.51 1.65 1.65 0 0 0 1.82-.33l.06-.06a2 2 0 0 1 2.83 0 2 2 0 0 1 0 2.83l-.06.06a1.65 1.65 0 0 0-.33 1.82V9a1.65 1.65 0 0 0 1.51 1H21a2 2 0 0 1 2 2 2 2 0 0 1-2 2h-.09a1.65 1.65 0 0 0-1.51 1z"></path></svg>
                <span>Paramètres</span>
                <svg class="w-5 h-5 ml-auto opacity-100" fill="none" stroke="currentColor" viewBox="0 0 24 24"><polyline points="9 18 15 12 9 6"></polyline></svg>
            </a>
        </nav>
    </aside>

    <main class="flex-1 p-8">
        <h1 class="text-3xl font-bold text-gray-900 mb-2">Paramètres</h1>
        <p class="text-gray-600 mb-8">Gérez votre compte et les préférences de la plateforme</p>

        <div class="grid grid-cols-1 lg:grid-cols-3 gap-8">
            <div class="lg:col-span-2 space-y-8">
                <!-- Profil -->
                <section class="bg-white rounded-2xl shadow-sm border border-gray-100 p-8">
                    <h2 class="text-xl font-semibold mb-6">Profil administrateur</h2>
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-2">Nom complet</label>
                            <input type="text" value="Jean-Paul Admin" class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-green-500 focus:border-transparent">
                        </div>
                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-2">Email professionnel</label>
                            <input type="email" value="admin@madeincameroon.cm" class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-green-500">
                        </div>
                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-2">Téléphone</label>
                            <input type="tel" value="+237 699 88 77 66" class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-green-500">
                        </div>
                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-2">Rôle</label>
                            <input type="text" value="Super Administrateur" disabled class="w-full px-4 py-3 bg-gray-100 text-gray-600 rounded-lg">
                        </div>
                    </div>
                    <div class="mt-6">
                        <button class="bg-green-600 hover:bg-green-700 text-white font-medium px-8 py-3 rounded-lg transition">Mettre à jour le profil</button>
                    </div>
                </section>

                <!-- Sécurité -->
                <section class="bg-white rounded-2xl shadow-sm border border-gray-100 p-8">
                    <h2 class="text-xl font-semibold mb-6">Sécurité</h2>
                    <button class="bg-gray-100 hover:bg-gray-200 text-gray-800 font-medium px-6 py-3 rounded-lg transition">Changer le mot de passe</button>
                    <div class="mt-6 flex items-center gap-4">
                        <span class="text-sm text-gray-600">Authentification à deux facteurs</span>
                        <button class="px-4 py-2 bg-green-600 text-white text-sm rounded-lg">Activé</button>
                    </div>
                </section>

                <!-- Notifications -->
                <section class="bg-white rounded-2xl shadow-sm border border-gray-100 p-8">
                    <h2 class="text-xl font-semibold mb-6">Notifications par email</h2>
                    <div class="space-y-4">
                        <label class="flex items-center justify-between cursor-pointer">
                            <span>Nouvelles commandes</span>
                            <input type="checkbox" checked class="w-5 h-5 text-green-600 rounded focus:ring-green-500">
                        </label>
                        <label class="flex items-center justify-between cursor-pointer">
                            <span>Nouveaux utilisateurs</span>
                            <input type="checkbox" checked class="w-5 h-5 text-green-600 rounded focus:ring-green-500">
                        </label>
                        <label class="flex items-center justify-between cursor-pointer">
                            <span>Alertes de stock</span>
                            <input type="checkbox" class="w-5 h-5 text-green-600 rounded focus:ring-green-500">
                        </label>
                        <label class="flex items-center justify-between cursor-pointer">
                            <span>Rapports hebdomadaires</span>
                            <input type="checkbox" class="w-5 h-5 text-green-600 rounded focus:ring-green-500">
                        </label>
                    </div>
                </section>
            </div>

            <!-- Colonne droite -->
            <div class="space-y-6">
                <div class="bg-white rounded-2xl p-6 shadow-sm border border-gray-100 text-center">
                    <div class="w-32 h-32 mx-auto bg-gray-200 rounded-full border-4 border-dashed border-gray-300"></div>
                    <h3 class="mt-4 font-semibold text-lg">Photo de profil</h3>
                    <p class="text-sm text-gray-500 mt-1">PNG, JPG jusqu’à 2 Mo</p>
                    <button class="mt-4 px-6 py-2 bg-green-600 hover:bg-green-700 text-white rounded-lg text-sm">Changer</button>
                </div>

                <div class="bg-red-50 border border-red-200 rounded-2xl p-6">
                    <h3 class="font-semibold text-red-800 mb-3">Zone de danger</h3>
                    <p class="text-sm text-red-700 mb-4">Supprimer définitivement votre compte et toutes les données associées.</p>
                    <button class="text-sm bg-red-600 hover:bg-red-700 text-white px-6 py-2.5 rounded-lg">Supprimer mon compte</button>
                </div>
            </div>
        </div>
    </main>
</div>
</body>
</html>