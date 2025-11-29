<?php
include_once 'head.php';
$current = basename($_SERVER['REQUEST_URI']);
$title = "Dashboard - Vendeur";

$menu = [
    "index.php" => "Accueil",
    "mes_produits.php" => "Mes Produits",
    "commandes.php.php" => "Commandes",
    "mon_profil.php" => "Mon Profil Vendeur",
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
        <a href="/config/logout.php" class="btn btn-error rounded-full hover:text-white">Déconnexion</a>
    </div>
</header>

<script>
    const btn = document.getElementById('hamburger');
    const menu = document.getElementById('mobileMenu');

    btn.addEventListener('click', () => {
        menu.classList.toggle('hidden');
    })
</script>