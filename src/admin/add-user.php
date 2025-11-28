<!DOCTYPE html>
<html lang="fr" class="scroll-smooth">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ajouter un utilisateur - Admin Made in Cameroon</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="../../../public/output.css">
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
            <a href="dashboard.html" class="flex items-center gap-3 px-4 py-3 rounded-lg text-gray-600 hover:bg-gray-100 hover:text-[#2E7D32] transition-colors group">
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><rect x="3" y="3" width="7" height="7"></rect><rect x="14" y="3" width="7" height="7"></rect><rect x="14" y="14" width="7" height="7"></rect><rect x="3" y="14" width="7" height="7"></rect></svg>
                <span>Tableau de bord</span>
                <svg class="w-5 h-5 ml-auto opacity-0 group-hover:opacity-100 transition-opacity" fill="none" stroke="currentColor" viewBox="0 0 24 24"><polyline points="9 18 15 12 9 6"></polyline></svg>
            </a>

            <!-- UTILISATEURS ACTIF -->
            <a href="users.html" class="flex items-center gap-3 px-4 py-3 rounded-lg text-[#2E7D32] bg-[#e8f5e8] font-medium border-l-4 border-[#2E7D32] group">
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path d="M17 21v-2a4 4 0 0 0-4-4H5a4 4 0 0 0-4 4v2"></path>
                    <circle cx="9" cy="7" r="4"></circle>
                    <path d="M23 21v-2a4 4 0 0 0-3-3.87"></path>
                    <path d="M16 3.13a4 4 0 0 1 0 7.75"></path>
                </svg>
                <span>Utilisateurs</span>
                <svg class="w-5 h-5 ml-auto opacity-100" fill="none" stroke="currentColor" viewBox="0 0 24 24"><polyline points="9 18 15 12 9 6"></polyline></svg>
            </a>

            <a href="products.html" class="flex items-center gap-3 px-4 py-3 rounded-lg text-gray-600 hover:bg-gray-100 hover:text-[#2E7D32] transition-colors group">
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path d="M21 16V8a2 2 0 0 0-1-1.73l-7-4a2 2 0 0 0-2 0l-7 4A2 2 0 0 0 3 8v8a2 2 0 0 0 1 1.73l7 4a2 2 0 0 0 2 0l7-4A2 2 0 0 0 21 16z"></path></svg>
                <span>Produits</span>
                <svg class="w-5 h-5 ml-auto opacity-0 group-hover:opacity-100" fill="none" stroke="currentColor" viewBox="0 0 24 24"><polyline points="9 18 15 12 9 6"></polyline></svg>
            </a>

            <a href="orders.html" class="flex items-center gap-3 px-4 py-3 rounded-lg text-gray-600 hover:bg-gray-100 hover:text-[#2E7D32] transition-colors group">
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><circle cx="9" cy="21" r="1"></circle><circle cx="20" cy="21" r="1"></circle><path d="M1 1h4l2.68 13.39a2 2 0 0 0 2 1.61h9.72a2 2 0 0 0 2-1.61L23 6H6"></path></svg>
                <span>Commandes</span>
                <svg class="w-5 h-5 ml-auto opacity-0 group-hover:opacity-100" fill="none" stroke="currentColor" viewBox="0 0 24 24"><polyline points="9 18 15 12 9 6"></polyline></svg>
            </a>

            <a href="stats.html" class="flex items-center gap-3 px-4 py-3 rounded-lg text-gray-600 hover:bg-gray-100 hover:text-[#2E7D32] transition-colors group">
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><line x1="12" y1="20" x2="12" y2="10"></line><line x1="18" y1="20" x2="18" y2="4"></line><line x1="6" y1="20" x2="6" y2="16"></line></svg>
                <span>Statistiques</span>
                <svg class="w-5 h-5 ml-auto opacity-0 group-hover:opacity-100" fill="none" stroke="currentColor" viewBox="0 0 24 24"><polyline points="9 18 15 12 9 6"></polyline></svg>
            </a>

            <a href="blog.html" class="flex items-center gap-3 px-4 py-3 rounded-lg text-gray-600 hover:bg-gray-100 hover:text-[#2E7D32] transition-colors group">
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path d="M14 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V8z"></path><polyline points="14 2 14 8 20 8"></polyline></svg>
                <span>Blog</span>
                <svg class="w-5 h-5 ml-auto opacity-0 group-hover:opacity-100" fill="none" stroke="currentColor" viewBox="0 0 24 24"><polyline points="9 18 15 12 9 6"></polyline></svg>
            </a>

            <a href="settings.html" class="flex items-center gap-3 px-4 py-3 rounded-lg text-gray-600 hover:bg-gray-100 hover:text-[#2E7D32] transition-colors group">
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><circle cx="12" cy="12" r="3"></circle><path d="M19.4 15a1.65 1.65 0 0 0 .33 1.82l.06.06a2 2 0 0 1 0 2.83 2 2 0 0 1-2.83 0l-.06-.06a1.65 1.65 0 0 0-1.82-.33 1.65 1.65 0 0 0-1 1.51V21a2 2 0 0 1-2 2 2 2 0 0 1-2-2v-.09A1.65 1.65 0 0 0 9 19.4a1.65 1.65 0 0 0-1.82.33l-.06.06a2 2 0 0 1-2.83 0 2 2 0 0 1 0-2.83l.06-.06a1.65 1.65 0 0 0 .33-1.82 1.65 1.65 0 0 0-1.51-1H3a2 2 0 0 1-2-2 2 2 0 0 1 2-2h.09A1.65 1.65 0 0 0 4.6 9a1.65 1.65 0 0 0-.33-1.82l-.06-.06a2 2 0 0 1 0-2.83 2 2 0 0 1 2.83 0l.06.06a1.65 1.65 0 0 0 1.82.33H9a1.65 1.65 0 0 0 1-1.51V3a2 2 0 0 1 2-2 2 2 0 0 1 2 2v.09a1.65 1.65 0 0 0 1 1.51 1.65 1.65 0 0 0 1.82-.33l.06-.06a2 2 0 0 1 2.83 0 2 2 0 0 1 0 2.83l-.06.06a1.65 1.65 0 0 0-.33 1.82V9a1.65 1.65 0 0 0 1.51 1H21a2 2 0 0 1 2 2 2 2 0 0 1-2 2h-.09a1.65 1.65 0 0 0-1.51 1z"></path></svg>
                <span>Paramètres</span>
                <svg class="w-5 h-5 ml-auto opacity-0 group-hover:opacity-100" fill="none" stroke="currentColor" viewBox="0 0 24 24"><polyline points="9 18 15 12 9 6"></polyline></svg>
            </a>
        </nav>
    </aside>

    <!-- CONTENU PRINCIPAL -->
    <main class="flex-1 p-8">
        <div class="mb-8">
            <h1 class="text-3xl font-bold text-gray-900">Ajouter un nouvel utilisateur</h1>
            <p class="text-gray-600 mt-2">Créez un compte client, vendeur ou administrateur</p>
        </div>

        <form class="bg-white rounded-2xl shadow-sm border border-gray-100 p-8 space-y-8 max-w-4xl">
            <!-- Informations personnelles -->
            <div>
                <h2 class="text-xl font-semibold mb-6 text-gray-800">Informations personnelles</h2>
                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-2">Nom complet</label>
                        <input type="text" placeholder="Ex: Marie Claire Fotso" class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-green-500">
                    </div>
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-2">Numéro de téléphone</label>
                        <input type="tel" placeholder="+237 690 123 456" class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-green-500">
                    </div>
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-2">Email</label>
                        <input type="email" placeholder="marie@example.com" class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-green-500">
                    </div>
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-2">Ville</label>
                        <select class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-green-500">
                            <option>Yaoundé</option>
                            <option>Douala</option>
                            <option>Bamenda</option>
                            <option>Buéa</option>
                            <option>Garoua</option>
                            <option>Autres</option>
                        </select>
                    </div>
                </div>
            </div>

            <!-- Rôle & permissions -->
            <div class="border-t pt-8">
                <h2 class="text-xl font-semibold mb-6 text-gray-800">Rôle dans la plateforme</h2>
                <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
                    <label class="flex items-center p-6 border-2 border-gray-200 rounded-xl hover:border-green-500 cursor-pointer transition">
                        <input type="radio" name="role" value="client" checked class="text-green-600">
                        <div class="ml-4">
                            <div class="font-semibold text-lg">Client</div>
                            <p class="text-sm text-gray-600">Peut commander et suivre ses achats</p>
                        </div>
                    </label>
                    <label class="flex items-center p-6 border-2 border-gray-200 rounded-xl hover:border-green-500 cursor-pointer transition">
                        <input type="radio" name="role" value="vendeur" class="text-green-600">
                        <div class="ml-4">
                            <div class="font-semibold text-lg">Vendeur / Artisan</div>
                            <p class="text-sm text-gray-600">Peut ajouter et gérer ses produits</p>
                        </div>
                    </label>
                    <label class="flex items-center p-6 border-2 border-gray-200 rounded-xl hover:border-green-500 cursor-pointer transition">
                        <input type="radio" name="role" value="admin" class="text-green-600">
                        <div class="ml-4">
                            <div class="font-semibold text-lg">Font">Administrateur</div>
                            <p class="text-sm text-gray-600">Accès complet au tableau de bord</p>
                        </div>
                    </label>
                </div>
            </div>

            <!-- Mot de passe -->
            <div class="border-t pt-8">
                <h2 class="text-xl font-semibold mb-6 text-gray-800">Mot de passe</h2>
                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-2">Mot de passe</label>
                        <input type="password" class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-green-500">
                    </div>
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-2">Confirmer le mot de passe</label>
                        <input type="password" class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-green-500">
                    </div>
                </div>
                <p class="text-sm text-gray-500 mt-3">Ou laisser vide pour envoyer un lien de création de mot de passe par email</p>
            </div>

            <!-- Boutons -->
            <div class="flex justify-end gap-4 pt-8 border-t">
                <a href="users.html" class="px-8 py-3 border border-gray-300 rounded-lg hover:bg-gray-50 transition">
                    Annuler
                </a>
                <button type="submit" class="px-8 py-3 bg-green-600 hover:bg-green-700 text-white font-medium rounded-lg transition flex items-center gap-2">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path d="M19 21H5a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h11l5 5v11a2 2 0 0 1-2 2z"></path><polyline points="17 21 17 13 7 13 7 21"></polyline><polyline points="7 3 12 3 12 8 17 8"></polyline></svg>
                    Créer l'utilisateur
                </button>
            </div>
        </form>
    </main>
</div>
</body>
</html>