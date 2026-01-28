<?php

session_start();
// Assurez-vous d'avoir ce fichier de connexion
require_once 'config/db_connect.php';

$title = 'Made in Cameroon | Accueil';
// Inclure les entêtes (HTML, Tailwind/DaisyUI, FontAwesome)
include_once 'src/includes/head.php';
?>

<body class="w-full bg-gray-50">
    <?php include_once 'src/views/header.php'; ?>

    <main class="container mx-auto px-4 pt-24 pb-16">

        <section class="mb-10 bg-white p-6 rounded-xl shadow-lg border border-gray-100">
            <h1 class="text-4xl font-extrabold mb-2 text-gray-900">Catalogue de Produits</h1>
            <p class="text-xl text-gray-600 mb-6">Découvrez notre sélection de produits camerounais authentiques et de
                qualité.</p>

            <div class="flex flex-col md:flex-row space-y-4 md:space-y-0 md:space-x-4">

                <div class="relative flex-grow">
                    <i class="fas fa-search absolute left-3 top-1/2 transform -translate-y-1/2 text-gray-400"></i>
                    <input type="search"
                        class="w-full pl-10 pr-4 py-2 border border-gray-300 rounded-lg focus:ring-green-500 focus:border-green-500 transition"
                        placeholder="Rechercher un produit ou un vendeur...">
                </div>

                <select name="category"
                    class="select select-bordered w-full md:w-56 py-2 border border-gray-300 rounded-lg focus:ring-green-500 focus:border-green-500 transition">
                    <option value="">Toutes les catégories</option>
                    <option value="Agroalimentaire">Agroalimentaire</option>
                    <option value="Artisanat">Artisanat</option>
                    <option value="Mode">Mode</option>
                    <option value="Cosmetique">Cosmétique</option>
                </select>

                <select name="price"
                    class="select select-bordered w-full md:w-56 py-2 border border-gray-300 rounded-lg focus:ring-green-500 focus:border-green-500 transition">
                    <option value="">Tous les prix</option>
                    <option value="0-10000">0 - 10 000 FCFA</option>
                    <option value="10000-30000">10 000 - 30 000 FCFA</option>
                    <option value="30000+">30 000+ FCFA</option>
                </select>

                <select name="sort"
                    class="select select-bordered w-full md:w-56 py-2 border border-gray-300 rounded-lg focus:ring-green-500 focus:border-green-500 transition">
                    <option value="featured">En vedette</option>
                    <option value="price_asc">Prix croissant</option>
                    <option value="price_desc">Prix décroissant</option>
                    <option value="rating">Meilleure note</option>
                </select>
            </div>

            <div class="mt-4 text-gray-600 text-sm">
                <span class="font-bold text-green-600">8</span> produits trouvés
            </div>
        </section>


        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-8">

            <?php $products = [
                ['name' => 'Panier Artisanal Traditionnel', 'price' => 15000, 'city' => 'Douala', 'image' => 'images/panArt.jpg', 'rating' => 4.5],
                ['name' => 'Tissu Wax Premium', 'price' => 25000, 'city' => 'Yaoundé', 'image' => 'images/wax.jpg', 'rating' => 4.2],
                ['name' => 'Épices du Terroir Bio', 'price' => 5000, 'city' => 'Bafoussam', 'image' => 'images/epcPur.jpg', 'rating' => 4.8],
                ['name' => 'Beurre de Karité Pur', 'price' => 8000, 'city' => 'Garoua', 'image' => 'images/Karite.jpg', 'rating' => 4.6],
                ['name' => 'Sculpture en Bois', 'price' => 35000, 'city' => 'Douala', 'image' => 'images/scuplture.jpg', 'rating' => 4.1],
                ['name' => 'Café Arabica Local', 'price' => 12000, 'city' => 'Bamenda', 'image' => 'images/cafe.jpg', 'rating' => 4.9],
                ['name' => 'Savon Artisanal', 'price' => 3500, 'city' => 'Yaoundé', 'image' => 'images/savon.jpg', 'rating' => 4.7],
                ['name' => 'Tunique Traditionnelle', 'price' => 45000, 'city' => 'Douala', 'image' => 'images/tunique.jpg', 'rating' => 4.3],
            ]; ?>

            <?php foreach ($products as $product): ?>
                <div
                    class="bg-white rounded-xl shadow-lg overflow-hidden transition-all duration-300 hover:shadow-2xl hover:scale-[1.02]">

                    <div class="relative h-60 bg-[url('/<?= $product['image'] ?>')] bg-cover bg-center">
                        <div
                            class="absolute top-3 right-3 bg-yellow-400 text-white text-sm font-bold px-3 py-1 rounded-full flex items-center shadow-md">
                            <i class="fas fa-star text-xs mr-1"></i> <?php echo $product['rating'] ?>
                        </div>
                    </div>

                    <div class="p-4 space-y-2">
                        <h6 class="text-sm text-gray-500 font-semibold"><?= htmlspecialchars($product['city']) ?></h6>
                        <h5 class="text-lg font-bold text-gray-900 truncate"><?= htmlspecialchars($product['name']) ?></h5>

                        <div class="pt-2 flex justify-between items-center">
                            <h5 class="text-2xl font-extrabold text-green-700">
                                <?= number_format($product['price'], 0, ',', ' ') ?> FCFA
                            </h5>

                            <a href="src/auth/client/login.php">
                                <button
                                    class="bg-red-700 text-white text-sm font-semibold rounded-lg py-2 px-4 hover:bg-red-800 transition duration-300 shadow-md flex items-center space-x-1">
                                    <i class="fas fa-shopping-cart"></i>
                                    <span>Acheter</span>
                                </button>
                            </a>
                        </div>
                    </div>
                </div>
            <?php endforeach; ?>

        </div>

    </main>

    <?php include_once 'src/views/footer.php' ?>

</body>

</html>