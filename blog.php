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

        <section class="text-center py-10 bg-white rounded-xl shadow-lg mb-10">
            <h1 class="text-4xl font-extrabold mb-2 text-green-700">Blog & Actualités</h1>
            <p class="text-lg text-gray-600 max-w-2xl mx-auto">
                Découvrez les histoires, tendances et innovations de l'économie locale camerounaise.
            </p>
        </section>

        <section class="mb-16">
            <div
                class="flex flex-col lg:flex-row bg-white rounded-xl shadow-2xl overflow-hidden border border-gray-100 transition-shadow duration-500">

                <div class="lg:w-1/2 h-80 bg-artisan bg-cover bg-center relative">
                    <span
                        class="absolute top-4 left-4 bg-red-700 text-white text-sm font-bold px-4 py-1.5 rounded-full shadow-lg">
                        ARTICLE VEDETTE
                    </span>
                </div>

                <div class="lg:w-1/2 p-8 flex flex-col justify-center">
                    <span class="bg-green-600 text-white text-xs font-semibold px-3 py-1 rounded-full w-fit mb-3">
                        Artisanat
                    </span>
                    <h2
                        class="text-3xl font-bold text-gray-900 mb-4 hover:text-green-700 transition duration-300 cursor-pointer">
                        L'artisanat camerounais : un patrimoine à préserver
                    </h2>
                    <p class="text-gray-600 mb-6 line-clamp-3">
                        Découvrez l'histoire fascinante de l'artisanat traditionnel camerounais et son importance vitale
                        dans notre économie locale. Plongez dans les techniques ancestrales...
                    </p>

                    <div class="flex flex-wrap text-sm text-gray-500 space-x-4 mb-6">
                        <div class="flex items-center">
                            <i class="fa-regular fa-user mr-1"></i> Marie Kamga
                        </div>
                        <div class="flex items-center">
                            <i class="fa-regular fa-calendar-alt mr-1"></i> 18 Oct 2025
                        </div>
                        <div class="flex items-center">
                            <i class="fa-regular fa-clock mr-1"></i> 5 min de lecture
                        </div>
                    </div>

                    <a href="#"
                        class="bg-green-600 text-white font-semibold rounded-lg py-3 px-6 w-fit hover:bg-green-700 transition duration-300 flex items-center shadow-lg">
                        Lire l'article
                        <i class="fa-solid fa-arrow-right ml-3"></i>
                    </a>
                </div>
            </div>
        </section>

        <section class="mb-16">
            <h2 class="text-3xl font-bold text-gray-900 mb-6 border-b pb-2">Nos Dernières Publications</h2>

            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">

                <div
                    class="bg-white rounded-xl shadow-lg overflow-hidden transition-all duration-300 hover:shadow-2xl hover:scale-[1.02]">
                    <div class="h-52 bg-sculpture bg-cover bg-center"></div>
                    <div class="p-5 space-y-3">
                        <span class="bg-yellow-400 text-gray-800 text-xs font-semibold px-3 py-1 rounded-full w-fit">
                            Culture
                        </span>
                        <h3 class="text-xl font-bold text-gray-900 hover:text-green-700 cursor-pointer">
                            Les secrets des sculpteurs de l'Ouest
                        </h3>
                        <p class="text-gray-600 text-sm line-clamp-2">
                            Un voyage au cœur de Bafoussam pour comprendre l'art de la sculpture sur bois
                            traditionnelle...
                        </p>
                        <div class="flex justify-between items-center pt-2 border-t mt-4">
                            <span class="text-sm text-gray-500"><i class="fa-regular fa-calendar-alt mr-1"></i> 10 Nov
                                2025</span>
                            <a href="#"
                                class="text-green-600 font-semibold hover:text-green-700 text-sm  hover:bg-success hover:text-white btn btn-ghost border-success">Lire
                                <i class="fa-solid fa-arrow-right ml-1"></i></a>
                        </div>
                    </div>
                </div>

                <div
                    class="bg-white rounded-xl shadow-lg overflow-hidden transition-all duration-300 hover:shadow-2xl hover:scale-[1.02]">
                    <div class="h-52 bg-cafe bg-cover bg-center"></div>
                    <div class="p-5 space-y-3">
                        <span class="bg-red-700 text-white text-xs font-semibold px-3 py-1 rounded-full w-fit">
                            Agro
                        </span>
                        <h3 class="text-xl font-bold text-gray-900 hover:text-green-700 cursor-pointer">
                            Le réveil de l'Arabica de Bamenda
                        </h3>
                        <p class="text-gray-600 text-sm line-clamp-2">
                            Comment les producteurs locaux relancent la production du café de qualité sur les hauts
                            plateaux...
                        </p>
                        <div class="flex justify-between items-center pt-2 border-t mt-4">
                            <span class="text-sm text-gray-500"><i class="fa-regular fa-calendar-alt mr-1"></i> 01 Nov
                                2025</span>
                            <a href="#"
                                class="text-green-600 font-semibold hover:text-green-700 text-sm hover:bg-success hover:text-white btn btn-ghost border-success">Lire
                                <i class="fa-solid fa-arrow-right ml-1"></i></a>
                        </div>
                    </div>
                </div>

                <div
                    class="bg-white rounded-xl shadow-lg overflow-hidden transition-all duration-300 hover:shadow-2xl hover:scale-[1.02]">
                    <div class="h-52 bg-savon bg-cover bg-center"></div>
                    <div class="p-5 space-y-3">
                        <span class="bg-green-600 text-white text-xs font-semibold px-3 py-1 rounded-full w-fit">
                            Cosmétique
                        </span>
                        <h3 class="text-xl font-bold text-gray-900 hover:text-green-700 cursor-pointer">
                            Le Secret des Ingrédients naturels de Yaoundé
                        </h3>
                        <p class="text-gray-600 text-sm line-clamp-2">
                            L'utilisation du beurre de karité et du cacao dans la fabrication des savons artisanaux...
                        </p>
                        <div class="flex justify-between items-center pt-2 border-t mt-4">
                            <span class="text-sm text-gray-500"><i class="fa-regular fa-calendar-alt mr-1"></i> 25 Oct
                                2025</span>
                            <a href="#"
                                class="text-green-600 font-semibold hover:text-green-700 text-sm  hover:bg-success hover:text-white btn btn-ghost border-success">Lire
                                <i class="fa-solid fa-arrow-right ml-1"></i></a>
                        </div>
                    </div>
                </div>

            </div>

            <div class="text-center mt-10">
                <button
                    class="btn bg-red-700 text-white px-8 py-3 rounded-lg text-lg font-semibold hover:bg-red-800 transition duration-300 shadow-xl">
                    Voir plus d'articles
                </button>
            </div>
        </section>

    </main>

    <?php include_once 'src/views/footer.php' ?>
</body>

</html>