<?php
include_once 'head.php';
$current = basename($_SERVER['REQUEST_URI']);

$menu = [
    "index.php" => "Catalogue",
    "mes_commandes.php" => "Mes commandes",
    "mon_profil.php" => "Mon profil",
    "panier.php" => "Panier",
];

?>

<!-- responsive header logo accueil blog a propos contact -->
<header class="navbar bg-base-100 shadow-sm bg-green-500/5">
    <div class="flex-1">
        <a href="index.php"><img src="../../public/logo/text-logo.png" class="w-30" alt="logo"></a>
    </div>

    <!-- Hamburger -->
    <button class="md:hidden btn btn-ghost btn-circle text-gray-700 text-3xl focus:outline-none" id="hamburger">
        ☰
    </button>

    <!-- DESKTOP MENU -->
    <div class="flex-2 hidden md:flex gap-6">
        <ul class="menu menu-horizontal px-20 flex justify-center gap-1">
            <?php foreach ($menu as $link => $label): ?>
                <li><a href="<?= $link ?>" class="<?= $current === $link
                      ? 'btn btn-ghost btn-active btn-success text-white'
                      : 'btn btn-ghost' ?> hover:btn-success">
                        <?= $label ?></a></li>
            <?php endforeach; ?>
        </ul>
    </div>

    <!-- Menu mobile -->
    <nav id="mobileMenu" class="hidden flex flex-col bg-white px-4 pb-4 md:hidden absolute top-16">
        <ul class="menu menu-vertical">
            <?php foreach ($menu as $link => $label): ?>
                <li><a href="<?= $link ?>" class="<?= $current === $link
                      ? 'btn btn-ghost btn-active btn-success text-white'
                      : 'btn btn-ghost' ?> hover:btn-success">
                        <?= $label ?></a></li>
            <?php endforeach; ?>
        </ul>
    </nav>
    <div class="flex-none flex items-center justify-center gap-4">
        <div class="flex-none">
            <div class="dropdown dropdown-end">
                <div tabindex="0" role="button" class="btn btn-ghost btn-circle">
                    <div class="indicator">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24"
                            stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M3 3h2l.4 2M7 13h10l4-8H5.4M7 13L5.4 5M7 13l-2.293 2.293c-.63.63-.184 1.707.707 1.707H17m0 0a2 2 0 100 4 2 2 0 000-4zm-8 2a2 2 0 11-4 0 2 2 0 014 0z" />
                        </svg>
                        <span class="badge badge-sm indicator-item">8</span>
                    </div>
                </div>
                <div tabindex="0" class="mt-3 z-50 card card-compact dropdown-content w-52 bg-base-100 shadow">
                    <div class="card-body">
                        <span class="font-bold text-lg">8 Articles</span>
                        <span class="text-warning">Total : 19 800 FCFA</span>
                        <div class="card-actions">
                            <a href="../../src/client/panier.php" class="btn btn-success btn-block text-white">Voir le panier</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <a href="logout.php" class="btn btn-error rounded-full hover:text-white">Déconnexion</a>
    </div>
</header>

<script>
    const btn = document.getElementById('hamburger');
    const menu = document.getElementById('mobileMenu');

    btn.addEventListener('click', () => {
        menu.classList.toggle('hidden');
    })
</script>