<?php

$current = basename($_SERVER['REQUEST_URI']);

$menu = [
    "index.php" => "Accueil",
    "produits.php" => "Produits",
    "blog.php" => "Blog",
    "apropos.php" => "A propos",
    "contact.php" => "Contact"
];

?>

<!-- responsive header logo accueil blog a propos contact -->
<header class="navbar bg-base-100 shadow-sm bg-green-500/5">
    <div class="flex-1">
        <a href="index.php"><img src="public/logo/text-logo.png" class="w-30" alt="logo"></a>
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
    <button class="btn btn-success rounded-full hover:text-white"
        onclick="window.location.href='src/auth/index.php'">Connexion</button>
    </div>
</header>

<script>
    const btn = document.getElementById('hamburger');
    const menu = document.getElementById('mobileMenu');

    btn.addEventListener('click', () => {
        menu.classList.toggle('hidden');
    })
</script>