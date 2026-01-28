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
            <h1 class="text-4xl font-extrabold mb-2 text-green-700">Restons en Contact</h1>
            <p class="text-lg text-gray-600 max-w-2xl mx-auto">
                Notre équipe est là pour répondre à toutes vos questions sur nos produits, les artisans ou les
                commandes.
            </p>
        </section>

        <section class="flex flex-col lg:flex-row gap-10">

            <div class="lg:w-2/3 bg-white p-8 rounded-xl shadow-xl border border-gray-100">
                <h2 class="text-2xl font-bold text-gray-800 mb-6">Envoyez-nous un Message</h2>
                <form action="#" method="POST" class="space-y-6">

                    <div class="flex flex-col md:flex-row gap-6">
                        <div class="flex-1">
                            <label for="name" class="block text-sm font-medium text-gray-700">Nom Complet</label>
                            <input type="text" id="name" name="name" required
                                class="mt-1 block w-full px-4 py-3 border border-gray-300 rounded-lg shadow-sm focus:ring-green-500 focus:border-green-500 transition">
                        </div>
                        <div class="flex-1">
                            <label for="email" class="block text-sm font-medium text-gray-700">Adresse Email</label>
                            <input type="email" id="email" name="email" required
                                class="mt-1 block w-full px-4 py-3 border border-gray-300 rounded-lg shadow-sm focus:ring-green-500 focus:border-green-500 transition">
                        </div>
                    </div>

                    <div>
                        <label for="subject" class="block text-sm font-medium text-gray-700">Sujet</label>
                        <select id="subject" name="subject" required
                            class="mt-1 block w-full px-4 py-3 border border-gray-300 rounded-lg shadow-sm focus:ring-green-500 focus:border-green-500 transition">
                            <option value="">Sélectionnez un sujet</option>
                            <option value="commande">Suivi de commande</option>
                            <option value="produit">Question sur un produit</option>
                            <option value="partenariat">Devenir Vendeur/Artisan</option>
                            <option value="autre">Autre demande</option>
                        </select>
                    </div>

                    <div>
                        <label for="message" class="block text-sm font-medium text-gray-700">Votre Message</label>
                        <textarea id="message" name="message" rows="5" required
                            class="mt-1 block w-full px-4 py-3 border border-gray-300 rounded-lg shadow-sm focus:ring-green-500 focus:border-green-500 transition"></textarea>
                    </div>

                    <div>
                        <button type="submit"
                            class="w-full bg-red-700 text-white font-bold py-3 px-4 rounded-lg hover:bg-red-800 transition duration-300 shadow-lg">
                            Envoyer le Message
                            <i class="fas fa-paper-plane ml-2"></i>
                        </button>
                    </div>
                </form>
            </div>

            <div class="lg:w-1/3 p-8 rounded-xl shadow-xl flex flex-col space-y-8">
                <h2 class="text-2xl font-bold mb-4 border-b border-green-400 pb-3">Nos Coordonnées</h2>

                <div class="flex items-start space-x-4">
                    <i class="fas fa-phone-alt text-3xl mt-1 text-yellow-400"></i>
                    <div>
                        <h3 class="font-semibold text-lg">Appelez-nous</h3>
                        <p class="text-green-600">+237 651603999</p>
                    </div>
                </div>

                <div class="flex items-start space-x-4">
                    <i class="fas fa-envelope text-3xl mt-1 text-yellow-400"></i>
                    <div>
                        <h3 class="font-semibold text-lg">Email Support</h3>
                        <p class="text-green-600">iuc@madeincameroon.cm</p>
                    </div>
                </div>

                <div class="flex items-start space-x-4">
                    <i class="fas fa-map-marker-alt text-3xl mt-1 text-yellow-400"></i>
                    <div>
                        <h3 class="font-semibold text-lg">Siège Social</h3>
                        <p class="text-green-600">Douala, Cameroun</p>
                        <p class="text-sm mt-1 underline hover:text-white cursor-pointer">Voir sur la carte</p>
                    </div>
                </div>

                <div class="pt-4 border-t border-green-400">
                    <h3 class="font-semibold text-lg mb-3">Suivez-nous</h3>
                    <div class="flex space-x-4 text-3xl">
                        <i class="fab fa-facebook hover:text-yellow-400 cursor-pointer transition"></i>
                        <i class="fab fa-twitter hover:text-yellow-400 cursor-pointer transition"></i>
                        <i class="fab fa-instagram hover:text-yellow-400 cursor-pointer transition"></i>
                    </div>
                </div>
            </div>
        </section>

        <section class="mt-10">
            <h2 class="text-2xl font-bold text-gray-800 mb-4">Où nous trouver</h2>
            <div class="bg-white rounded-xl shadow-xl overflow-hidden h-96">
                <iframe
                    src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d10660.080867835752!2d9.761589717302313!3d4.0235430563938355!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x10610d676dcbe2b7%3A0xd8c2bfe4426632dc!2sKozao%20Africa!5e0!3m2!1sfr!2scm!4v1764399667753!5m2!1sfr!2scm"
                    width="100%" height="100%" style="border:0;" allowfullscreen="" loading="lazy"
                    referrerpolicy="no-referrer-when-downgrade" class="w-full h-full">
                </iframe>
        </section>

    </main>
    <?php include_once 'src/views/footer.php' ?>
</body>

</html>