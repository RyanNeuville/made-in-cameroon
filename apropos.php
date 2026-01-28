<?php

session_start();
// Assurez-vous d'avoir ce fichier de connexion
require_once 'config/db_connect.php';

$title = 'Made in Cameroon | Accueil';
// Inclure les entêtes (HTML, Tailwind/DaisyUI, FontAwesome)
include_once 'src/includes/head.php';
?>
<?php include_once 'src/views/header.php'; ?>
<main class="container mx-auto px-4 pt-24 pb-16">

    <section
        class="h-80 bg-green-700/90 text-white flex flex-col justify-center items-center rounded-2xl shadow-xl bg-cameroon-culture bg-cover bg-center">
        <h1 class="text-5xl font-extrabold mb-4">Notre Histoire</h1>
        <p class="text-xl font-light text-center max-w-2xl">
            Valoriser l'artisanat et les produits authentiques du Cameroun.
        </p>
        <div class="flex mt-8 space-x-4 p-1 bg-white/20 backdrop-blur-sm rounded-full">
            <a href="#mission"
                class="text-white font-semibold text-sm px-6 py-2 rounded-full hover:bg-white/30 transition">Notre
                Mission</a>
            <a href="contact.php"
                class="bg-white text-green-700 font-bold text-sm px-6 py-2 rounded-full hover:bg-gray-100 transition shadow-lg">Contact</a>
        </div>
    </section>

    <section id="mission" class="py-16">
        <h2 class="text-4xl font-bold text-center text-gray-900 mb-12">Notre Engagement</h2>

        <div class="grid grid-cols-1 md:grid-cols-3 gap-8 px-4">

            <div
                class="bg-white p-6 rounded-xl shadow-xl border-t-4 border-green-600 transition duration-300 hover:shadow-2xl">
                <div class="flex items-center space-x-4 mb-4">
                    <i class="fas fa-bullseye text-3xl text-green-600"></i>
                    <h3 class="text-xl font-bold text-gray-800">Notre Mission</h3>
                </div>
                <p class="text-gray-600">
                    Made in Cameroon est dédiée à la promotion et à la vente de produits locaux. Nous valorisons le
                    savoir-faire de nos artisans et encourageons la consommation locale pour un impact durable.
                </p>
            </div>

            <div
                class="bg-white p-6 rounded-xl shadow-xl border-t-4 border-yellow-400 transition duration-300 hover:shadow-2xl">
                <div class="flex items-center space-x-4 mb-4">
                    <i class="fas fa-eye text-3xl text-yellow-500"></i>
                    <h3 class="text-xl font-bold text-gray-800">Notre Vision</h3>
                </div>
                <p class="text-gray-600">
                    Devenir la plateforme de référence pour l'e-commerce de produits camerounais de qualité, en
                    soutenant activement l'économie locale et en rayonnant à l'international.
                </p>
            </div>

            <div
                class="bg-white p-6 rounded-xl shadow-xl border-t-4 border-red-700 transition duration-300 hover:shadow-2xl">
                <div class="flex items-center space-x-4 mb-4">
                    <i class="fas fa-handshake text-3xl text-red-700"></i>
                    <h3 class="text-xl font-bold text-gray-800">Nos Valeurs</h3>
                </div>
                <p class="text-gray-600">
                    Authenticité, Qualité, Transparence, et Soutien Inconditionnel aux Artisans. Nous garantissons
                    des produits locaux vérifiés et un commerce équitable.
                </p>
            </div>
        </div>
    </section>

    <section class="py-16 bg-white rounded-2xl shadow-2xl border border-gray-100 px-8 lg:px-20">
        <h2 class="text-4xl font-bold text-green-600 text-center mb-10">L'Aventure Made in Cameroon</h2>

        <div class="max-w-4xl mx-auto text-lg text-gray-700 space-y-6">
            <p>
                Fondée en 2025, Made in Cameroon est née d'une passion profonde pour les produits locaux et d'une
                volonté de valoriser l'extraordinaire patrimoine artisanal camerounais. Face à la domination des
                produits importés, nous avons décidé de créer une plateforme numérique qui met en lumière le talent
                exceptionnel de nos artisans, agriculteurs et créateurs.
            </p>
            <p>
                Aujourd'hui, nous sommes fiers de rassembler <span class="font-bold text-green-700">plus de 200
                    producteurs locaux</span> et de proposer une large gamme de produits authentiques : de
                l'artisanat traditionnel aux cosmétiques naturels, en passant par les produits agroalimentaires et
                la mode africaine.
            </p>
            <p>
                Notre engagement ne s'arrête pas à la simple vente. Nous accompagnons les artisans dans leur
                développement, leur offrons une visibilité sur le marché national et international, et les aidons à
                pérenniser leur activité. Ensemble, nous construisons un Cameroun qui consomme ce qu'il produit !
            </p>
        </div>
    </section>

    <section class="py-16">
        <h2 class="text-4xl font-bold text-center text-gray-900 mb-12">Nos Chiffres Clés</h2>

        <div class="bg-green-600 rounded-2xl p-10 text-white shadow-2xl">
            <div class="grid grid-cols-2 md:grid-cols-4 gap-8 text-center">
                <div class="space-y-2">
                    <h5 class="text-5xl font-extrabold text-yellow-400">500+</h5>
                    <p class="text-lg font-semibold">Produits Uniques</p>
                </div>
                <div class="space-y-2">
                    <h5 class="text-5xl font-extrabold text-yellow-400">200+</h5>
                    <p class="text-lg font-semibold">Artisans Partenaires</p>
                </div>
                <div class="space-y-2">
                    <h5 class="text-5xl font-extrabold text-yellow-400">10 000+</h5>
                    <p class="text-lg font-semibold">Clients Satisfaits</p>
                </div>
                <div class="space-y-2">
                    <h5 class="text-5xl font-extrabold text-yellow-400">10</h5>
                    <p class="text-lg font-semibold">Régions Couvertes</p>
                </div>
            </div>
        </div>
    </section>

</main>
<?php include_once 'src/views/footer.php' ?>
</body>

</html>