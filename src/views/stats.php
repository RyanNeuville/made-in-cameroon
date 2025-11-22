<?php
$stats = [
    [
        'title' => 'Catégories',
        'value' => '25',
        'desc' => 'Actuellement disponibles',
        'color' => 'text-primary',
        'path' => 'M4 6h16M4 12h16M4 18h7',
    ],
    [
        'title' => 'Produits',
        'value' => '4,200',
        'desc' => 'Nouveaux arrivages ce mois-ci',
        'color' => 'text-error',
        'path' => 'M16 11V7a4 4 0 00-8 0v4M5 9h14l1 12H4L5 9z',
        'extra_title_class' => 'text-error',
    ],
    [
        'title' => 'Étoiles',
        'value' => '4.7',
        'desc' => 'Moyenne des avis',
        'color' => 'text-accent',
        'path' => 'M11.049 2.927c.3-.921 1.603-.921 1.902 0l1.519 4.674a1 1 0 00.95.69h4.915c.969 0 1.371 1.24.588 1.81l-3.976 2.888a1 1 0 00-.329 1.176l1.519 4.674c.3.921-.755 1.688-1.539 1.175l-3.976-2.888a1 1 0 00-1.176 0l-3.976 2.888c-.784.513-1.839-.254-1.539-1.175l1.519-4.674a1 1 0 00-.329-1.176l-3.976-2.888c-.784-.57-.382-1.81.588-1.81h4.915a1 1 0 00.95-.69l1.519-4.674z',
    ],
    [
        'title' => 'Likes',
        'value' => '25.6K',
        'desc' => 'De vos utilisateurs',
        'color' => 'text-info',
        'path' => 'M4.318 6.318a4.5 4.5 0 000 6.364L12 20.364l7.682-7.682a4.5 4.5 0 00-6.364-6.364L12 7.636l-1.318-1.318a4.5 4.5 0 00-6.364 0z',
    ],
];
?>

<section class="p-10">
    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6">
        <?php foreach ($stats as $stat): ?>
            <div class="p-6 flex flex-col items-center text-center">
                <div class="<?= $stat['color'] ?> mb-4">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                        class="inline-block w-10 h-10 stroke-current">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="<?= $stat['path'] ?>">
                        </path>
                    </svg>
                </div>
                <div class="text-lg font-semibold text-base-content <?= $stat['extra_title_class'] ?? '' ?> mb-1">
                    <?= $stat['title'] ?>
                </div>
                <div class="text-4xl font-bold <?= $stat['color'] ?> mb-2"><?= $stat['value'] ?></div>
                <div class="text-sm text-base-content opacity-70"><?= $stat['desc'] ?></div>
            </div>
        <?php endforeach; ?>
    </div>
</section>