<?php 
session_start();
// Assurez-vous d'avoir ce fichier de connexion
require_once 'config/db_connect.php'; 

$title = 'Made in Cameroon | Accueil';
// Inclure les entêtes (HTML, Tailwind/DaisyUI, FontAwesome)
include_once 'src/includes/head.php'; 

// --- Fonctions de Récupération des Données ---

// 1. Récupérer les Catégories (pour la section 2)
$categories_res = mysqli_query($conn, "SELECT category_id, category_name, category_description, icon_class FROM categories ORDER BY category_name ASC LIMIT 4");

// 2. Récupérer les Produits (pour la section 3 - Ex: Top 6 les plus récents/populaires)
// NOTE: Nous simulons 'star' et 'like' ici, car la table 'products' ne les a pas encore.
$products_query = "SELECT p.product_id, p.name, p.price, p.description, p.image_url, c.category_name, 
                   -- Champs simulés pour le frontend (à remplacer par des agrégations réelles plus tard)
                   (FLOOR(RAND() * 20 + 30) / 10) as star, 
                   (FLOOR(RAND() * 200 + 50)) as likes
                   FROM products p
                   JOIN categories c ON p.category_id = c.category_id
                   WHERE p.is_active = 1
                   ORDER BY p.creation_date DESC
                   LIMIT 6";
$products_res = mysqli_query($conn, $products_query);

// 3. Récupérer les Statistiques (pour la section 4)
$stats = [];

// Stat 1: Nombre de Catégories
$res_cat_count = mysqli_query($conn, "SELECT COUNT(category_id) AS count FROM categories");
$stats_count_cat = mysqli_fetch_assoc($res_cat_count)['count'];

// Stat 2: Nombre de Produits en Vente
$res_prod_count = mysqli_query($conn, "SELECT COUNT(product_id) AS count FROM products WHERE is_active = 1");
$stats_count_prod = mysqli_fetch_assoc($res_prod_count)['count'];

// Stat 3: Nombre de Vendeurs (Approuvés)
$res_vendeur_count = mysqli_query($conn, "SELECT COUNT(vendeur_id) AS count FROM vendeurs_details WHERE is_approved = 1");
$stats_count_vendeur = mysqli_fetch_assoc($res_vendeur_count)['count'];

// Stat 4: Évaluation Moyenne (Simulation)
// En réalité, vous feriez AVG(reviews.rating)
$stats_avg_rating = number_format(4.5 + (rand(0, 5) / 10), 1); 

// Définition finale des cartes de statistiques
$stats_cards = [
    [
      'title' => 'Catégories',
      'value' => $stats_count_cat,
      'desc' => 'Actuellement disponibles',
      'color' => 'text-primary',
      'icon_path' => 'M4 6h16M4 12h16M4 18h7',
    ],
    [
      'title' => 'Produits en Vente',
      'value' => number_format($stats_count_prod, 0, ',', ' '),
      'desc' => 'Articles de producteurs locaux',
      'color' => 'text-success',
      'icon_path' => 'M16 11V7a4 4 0 00-8 0v4M5 9h14l1 12H4L5 9z',
    ],
    [
      'title' => 'Producteurs',
      'value' => $stats_count_vendeur,
      'desc' => 'Vendeurs locaux approuvés',
      'color' => 'text-warning',
      'icon_path' => 'M17 20h-4a2 2 0 01-2-2V5a2 2 0 012-2h4a2 2 0 012 2v13a2 2 0 01-2 2zM7 8h4m-4 4h4m-4 4h4', // Icône de boutique
    ],
    [
      'title' => 'Note Moyenne',
      'value' => $stats_avg_rating,
      'desc' => 'Basée sur les avis clients',
      'color' => 'text-error',
      'icon_path' => 'M11.049 2.927c.3-.921 1.603-.921 1.902 0l1.519 4.674a1 1 0 00.95.69h4.915c.969 0 1.371 1.24.588 1.81l-3.976 2.888a1 1 0 00-.329 1.176l1.519 4.674c.3.921-.755 1.688-1.539 1.175l-3.976-2.888a1 1 0 00-1.176 0l-3.976 2.888c-.784.513-1.839-.254-1.539-1.175l1.519-4.674a1 1 0 00-.329-1.176l-3.976-2.888c-.784-.57-.382-1.81.588-1.81h4.915a1 1 0 00.95-.69l1.519-4.674z',
    ],
];
?>

<body>
  <?php include_once 'src/views/header.php'; ?>

  <section class="mt-16 p-6 lg:p-16 flex flex-col md:flex-row items-center gap-10 bg-success/90">
    <div class="flex flex-col gap-5 md:w-1/2">
      <div class="flex items-center gap-5">
        <span class="flex items-center gap-2 px-4 py-2 bg-black/10 rounded-full w-auto">
          <img src="public/logo/logo.png" alt="Logo" class="w-8 h-8">
          <span class="text-white font-semibold tracking-wider">FIERTÉ NATIONALE</span>
        </span>
      </div>
      <h1 class="text-5xl md:text-6xl lg:text-7xl font-extrabold text-white leading-tight">
        Consommons <br> Camerounais
      </h1>
      <p class="text-lg text-white opacity-90 max-w-lg">
        Découvrez et soutenez les produits locaux de qualité fabriqués par nos artisans et producteurs Camerounais.
      </p>
      <div class="flex gap-4 flex-col sm:flex-row mt-3">
        <a href="catalogue.php" class="btn btn-warning text-white hover:bg-yellow-600 font-bold">
          Explorer les produits <i class="fa-solid fa-arrow-right ml-2"></i>
        </a>
        <a href="contact.php" class="btn btn-outline btn-warning bg-white hover:bg-warning hover:text-white border-0 text-success font-bold">
          Contactez-nous <i class="fa-solid fa-arrow-right ml-2"></i>
        </a>
      </div>
    </div>
    <div class="md:w-1/2 w-full flex items-center justify-center">
      <img src="public/images/portrait-d-un-travailleur-de-campagne-posant.jpg" 
           class="w-full object-cover rounded-xl shadow-2xl h-96 lg:h-[500px]"
           alt="Femme africaine vêtue de vêtements nationaux">
    </div>
  </section>

  <section class="py-16 px-4 lg:px-16 bg-gray-50">
    <h2 class="text-3xl font-bold text-center text-success mb-2">Nos Catégories</h2>
    <p class="text-center text-gray-600 mb-10 max-w-2xl mx-auto">
      Nous proposons des super catégories de produits adaptées à notre contexte local pour faciliter la consommation.
    </p>
    
    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-6 justify-items-center">
      <?php if (mysqli_num_rows($categories_res) > 0): ?>
        <?php while ($category = mysqli_fetch_assoc($categories_res)): ?>
          <!-- <?php
            // Remplacez 'uploads/default.jpg' par votre chemin par défaut
            //$image_path = "/". htmlspecialchars($category['image_url'] ?? 'public/images/categories/category.jpg'); 
          ?> -->
          <div class="card bg-white w-full max-w-xs shadow-xl transition-transform transform hover:scale-[1.02]">
            <!-- <figure class="h-48 overflow-hidden">
              <img src="<?= $image_path ?>"
                   alt="<?= htmlspecialchars($category['category_name']) ?>" 
                   class="w-full h-full object-cover" />
            </figure> -->
            <div class="card-body p-5">
              <h2 class="card-title text-gray-800">
                <?= htmlspecialchars($category['category_name']) ?>
              </h2>
              <p class="text-sm text-gray-500"><?= $category['category_description'] ?></p>
              <div class="card-actions justify-end mt-2">
                <span class="badge badge-lg bg-success text-white">
                    <i class="fa <?= htmlspecialchars($category['icon_class'] ?? 'fa-tag') ?>"></i>
                </span>
              </div>
            </div>
          </div>
        <?php endwhile; ?>
      <?php else: ?>
        <p class="col-span-4 text-center text-gray-500">Aucune catégorie n'est encore enregistrée.</p>
      <?php endif; ?>
    </div>
  </section>

  <hr class="border-t border-gray-200 mx-16">

  <section class="py-16 px-4 lg:px-16">
    <h2 class="text-3xl font-bold text-center text-success mb-2">Nos Produits Populaires</h2>
    <p class="text-center text-gray-600 mb-10 max-w-2xl mx-auto">
      Découvrez les meilleures gammes de produits et articles camerounais, fraîchement ajoutés ou les mieux notés.
    </p>

    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 xl:grid-cols-3 gap-8 justify-items-center">
      <?php if (mysqli_num_rows($products_res) > 0): ?>
        <?php while ($product = mysqli_fetch_assoc($products_res)): ?>
          <?php
            // Remplacez 'uploads/default.jpg' par votre chemin par défaut
            $image_path = "/". htmlspecialchars($product['image_url'] ?? 'uploads/default.jpg'); 
          ?>
          <div class="card card-compact bg-white w-full max-w-sm shadow-xl hover:shadow-2xl transition">
            <span class="absolute top-3 right-3 flex gap-2 z-10">
                <span class="badge badge-warning text-white font-bold gap-1">
                    <i class="fa-solid fa-star"></i> <?= number_format($product['star'], 1) ?>
                </span>
                <span class="badge badge-error text-white font-bold gap-1">
                    <i class="fa-solid fa-heart"></i> <?= number_format($product['likes'], 0, ',', ' ') ?>
                </span>
            </span>

            <figure class="h-60 overflow-hidden">
                <img src="<?= $image_path ?>" 
                     alt="<?= htmlspecialchars($product['name']) ?>" 
                     class="w-full h-full object-cover hover:scale-105 transition-transform duration-500" />
            </figure>

            <div class="card-body p-6">
                <h2 class="card-title text-xl text-gray-800">
                    <?= htmlspecialchars($product['name']) ?>
                </h2>
                <div class="flex justify-between items-center text-lg font-bold text-success">
                    <?= number_format($product['price'], 0, ',', ' ') ?> FCFA
                </div>
                <p class="text-sm text-gray-500 line-clamp-2"><?= htmlspecialchars($product['description']) ?></p>
                
                <div class="card-actions justify-between mt-3">
                    <div class="badge badge-outline badge-success text-success font-medium">
                        <?= htmlspecialchars($product['category_name']) ?>
                    </div>
                    <button class="btn btn-sm btn-warning text-white hover:bg-yellow-600">
                        Ajouter au Panier
                    </button>
                </div>
            </div>
          </div>
        <?php endwhile; ?>
      <?php else: ?>
        <p class="col-span-3 text-center text-lg text-gray-500">Désolé, aucun produit n'est disponible pour le moment.</p>
      <?php endif; ?>
    </div>
    
    <center class="mt-12">
      <a href="catalogue.php" class="btn btn-lg btn-success text-white hover:bg-green-700 p-2 w-52 font-bold">
        Voir tous les produits <i class="fa-solid fa-arrow-right ml-2"></i>
      </a>
    </center>
  </section>

  <section class="py-16 px-4 lg:px-16 bg-gray-100">
    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-8">
      <?php foreach ($stats_cards as $stat): ?>
        <div class="p-8 bg-white rounded-xl shadow-lg flex flex-col items-center text-center transition-shadow hover:shadow-2xl">
          <div class="<?= $stat['color'] ?> mb-4">
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
              class="inline-block w-12 h-12 stroke-current">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="<?= $stat['icon_path'] ?>">
              </path>
            </svg>
          </div>
          <div class="text-xl font-semibold text-gray-500 mb-1">
            <?= $stat['title'] ?>
          </div>
          <div class="text-5xl font-extrabold <?= $stat['color'] ?> mb-2"><?= $stat['value'] ?></div>
          <div class="text-base text-gray-600 opacity-80"><?= $stat['desc'] ?></div>
        </div>
      <?php endforeach; ?>
    </div>
  </section>

  <?php include_once 'src/views/footer.php'; ?>
</body>
</html>