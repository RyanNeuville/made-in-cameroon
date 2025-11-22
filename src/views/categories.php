<?php
$categories = [
    "Agroalimentaire" => [
        "image" => "public/images/categories/agro.webp",
        "label" => "Agroalimentaire",
        "description" => "Produits frais et transformes du terroir",
        "icon" => "fa fa-cubes"
    ],
    "Artisanat" => [
        "image" => "public/images/categories/arti.jpg",
        "label" => "Artisanat",
        "description" => "Produits artisanaux de qualité",
        "icon" => "fa fa-star-o"
    ],
    "Mode" => [
        "image" => "public/images/categories/mode.webp",
        "label" => "Mode",
        "description" => "Vetements et accessoires",
        "icon" => "fa fa-shopping-bag"
    ],
    "Cosmatique" => [
        "image" => "public/images/categories/cosmetique.jpeg",
        "label" => "Cosmatique",
        "description" => "Produits de soins personnels",
        "icon" => "fa fa-heart-o"
    ]
];
?>

<section class="mt-20">
    <h2 class="text-xl mt-4 md:text-xl text-center lg:text-1xl font-bold text-success">Nos Categories</h2>
    <p class="text-center p-2 mb-4">Nous offrans des super categories de produits adapter a notre contexte locale pour facilite la consommation.</p>
    <div class="flex flex-col md:flex-row gap-5 flex-wrap items-center justify-center">
        <?php foreach ($categories as $category): ?>
            <div class="card bg-base-100 w-96 h-80 shadow-sm flex flex-col justify-center">
                <i class="fa-solid fa-heart text-error absolute"></i>
                <figure class="w-full h-60">
                    <img src="<?= $category['image'] ?>" class="w-full h-60 object-cover" alt="Shoes" />
                </figure>
                <div class="card-body">
                    <h2 class="card-title"><?= $category['label'] ?></h2>
                    <p><?= $category['description'] ?></p>
                </div>
            </div>
        <?php endforeach; ?>
    </div>
</section>