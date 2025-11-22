<?php
$products = [
    "produit-1" => [
        "image" => "public/images/produits/produit-1.avif",
        "label" => "Confirture",
        "description" => "Description du produit 1",
        "categories" => "Agroalimentaire",
        "star" => 4.1,
        "like" => 100,
        "prix" => 10000
    ],
    "produit-2" => [
        "image" => "public/images/produits/produit-2.jpg",
        "label" => "Panier",
        "description" => "Description du produit 2",
        "categories" => "Artisanat",
        "star" => 4.5,
        "like" => 86,
        "prix" => 20000
    ],
    "produit-3" => [
        "image" => "public/images/produits/produit-3.jpeg",
        "label" => "Pagne broder",
        "description" => "Description du produit 3",
        "categories" => "Mode",
        "star" => 4.8,
        "like" => 120,
        "prix" => 30000
    ],
    "produit-4" => [
        "image" => "public/images/produits/produit-4.jpg",
        "label" => "parfum",
        "description" => "Description du produit 4",
        "categories" => "Cosmatique",
        "star" => 4.2,
        "like" => 76,
        "prix" => 40000
    ],
    "produit-5" => [
        "image" => "public/images/produits/produit-5.jpg",
        "label" => "Huile d'olive",
        "description" => "Description du produit 5",
        "categories" => "Agroalimentaire",
        "star" => 3.9,
        "like" => 66,
        "prix" => 50000
    ],
    "produit-6" => [
        "image" => "public/images/produits/produit-6.avif",
        "label" => "Vase portable",
        "description" => "Description du produit 6",
        "categories" => "Artisanat",
        "star" => 4.5,
        "like" => 66,
        "prix" => 60000
    ]
];

?>

<section class="mt-20 flex flex-col">
    <h2 class="text-xl mt-4 mb-4 md:text-xl text-center lg:text-1xl font-bold text-success">Nos Produits en vente</h2>
    <p class="text-center p- mb-4">Decouvrer les meilleures game de produits et articles camerounais</p>
    <div class="flex flex-col md:flex-row gap-5 flex-wrap items-center justify-center">
        <?php foreach ($products as $product): ?>
            <div class="card bg-base-100 w-96 shadow-sm">
                <span class="absolute top-2 right-2 flex gap-2"> 
                    <span class="bg-white px-2 py-1 rounded-full flex items-center justify-center">
                        <i class="fa-solid fa-star text-warning"></i>
                        <?= $product['star'] ?>
                    </span>
                    <span class="bg-white px-2 py-1 rounded-full"><i class="fa-solid fa-heart text-error"></i>
                        <?= $product['like'] ?>
                    </span>
                </span>
                <figure class="w-full h-60">
                    <img src="<?= $product['image'] ?>" alt="Shoes" class="w-full h-full object-cover" />
                </figure>
                <div class="card-body">
                    <h2 class="card-title">
                        <?= $product['label'] ?>
                        <div class="badge badge-warning text-white"><?= $product['prix'] ?> FCFA</div>
                    </h2>
                    <p><?= $product['description'] ?></p>
                    <div class="card-actions justify-end">
                        <div class="badge badge-outline"><?= $product['categories'] ?></div>
                    </div>
                </div>
            </div>
        <?php endforeach; ?>
    </div>
   <center class="mt-10 mb-10">
     <button class="btn btn-warning hover:bg-warning hover:text-white w-52 items-center justify-center">Explorer les produits <i class="fa-solid fa-arrow-right"></i></button>
   </center>
</section>