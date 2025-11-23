<?php $title = 'made-in-cameroon | Accueil';
include_once 'src/includes/head.php'; ?>

<body>
  <?php include_once 'src/views/header.php'; ?>
  <section class="flex mt-20 p-6 gap-10 bg-success flex-col md:flex-row">
    <div class="flex flex-col gap-5">
      <div class="flex items-center gap-5">
        <span class="flex items-center gap-2 px-5 py-3 bg-gray-600/10 rounded-full w-auto">
          <img src="public/logo/logo.png" alt="" class="w-10 h-10">
          <span class="text-white font-bold">Fierte Nationale</span>
        </span>
      </div>
      <h1 class="text-5xl md:text-6xl lg:text-8xl font-bold text-white">Consommons Camerounais</h1>
      <p class="text-lg md:text-base text-white">Decouvrez et soutenez les produits locaux de qualité fabriques par nos
        artisans et producteurs Camerounais</p>
      <div class="flex gap-5 flex-col md:flex-row">
        <button class="btn btn-warning hover:bg-warning hover:text-white">Explorer les produits <i
            class="fa-solid fa-arrow-right"></i></button>
        <button class="btn btn-outline btn-warning bg-white hover:bg-warning hover:text-white">Contactez-nous <i
            class="fa-solid fa-arrow-right"></i></button>
      </div>
    </div>
    <div class="flex items-center justify-center w-full h-auto max-h-[500px]">
      <img src="public/images/femme-africaine-vetements-nationaux.avif" class="w-full h-full object-cover rounded-4xl"
        alt="">
    </div>
  </section>

  <!-- Sections presenter les cotegories (Agroalimentaire, artisanat, Mode, Cosmatique)  -->
  <?php include_once 'src/views/categories.php'; ?>

  <!-- Sections de presentation de produits -->
  <?php include_once 'src/views/products.php'; ?>

  <!-- Sections de presentation des statistiques -->
  <?php include_once 'src/views/stats.php'; ?>

  <!-- Footer -->
  <?php include_once 'src/views/footer.php'; ?>
</body>

</html>