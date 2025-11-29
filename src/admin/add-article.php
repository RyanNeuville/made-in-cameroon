<?php
session_start();

// Créer le dossier uploads s'il n'existe pas
if (!is_dir('uploads')) {
    mkdir('uploads', 0777, true);
}

$uploadError = '';
$uploadedImage = '';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $title    = trim($_POST['title'] ?? '');
    $excerpt  = trim($_POST['excerpt'] ?? '');
    $author   = trim($_POST['author'] ?? 'Admin');
    $category = $_POST['category'] ?? 'Général';

    // Gestion de l'upload d'image
    if (isset($_FILES['image']) && $_FILES['image']['error'] === 0) {
        $file = $_FILES['image'];
        $ext = pathinfo($file['name'], PATHINFO_EXTENSION);
        $allowed = ['jpg', 'jpeg', 'png', 'gif', 'webp'];

        if (in_array(strtolower($ext), $allowed) && $file['size'] <= 5*1024*1024) { // 5 Mo max
            $newName = "article_" . time() . "_" . rand(1000,9999) . "." . $ext;
            $destination = "uploads/" . $newName;

            if (move_uploaded_file($file['tmp_name'], $destination)) {
                $uploadedImage = $destination;
            } else {
                $uploadError = "Erreur lors de l'enregistrement de l'image.";
            }
        } else {
            $uploadError = "Format non autorisé ou image trop lourde (max 5 Mo).";
        }
    }

    // Si pas d'image uploadée → image par défaut
    if (empty($uploadedImage)) {
        $uploadedImage = "https://images.unsplash.com/photo-1581291518633-83b4ebd1d83e?w=800&q=80";
    }

    if ($title && $excerpt && empty($uploadError)) {
        $_SESSION['articles'][] = [
            'title'     => htmlspecialchars($title),
            'excerpt'   => htmlspecialchars($excerpt),
            'author'    => htmlspecialchars($author),
            'category'  => $category,
            'image'     => $uploadedImage,
            'views'     => 0,
            'comments'  => 0,
            'date'      => "À l'instant"
        ];
        header("Location: blog.php?success=1");
        exit;
    }
}
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Nouvel Article - Admin Made in Cameroon</title>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="../../public/output.css">
</head>
<body class="font-['Poppins'] bg-gray-50 text-gray-900">

<div class="flex min-h-screen">
    <!-- SIDEBAR IDENTIQUE (Blog actif) -->
    <aside class="w-64 bg-white border-r border-gray-200 sticky top-0 h-screen flex flex-col">
        <div class="p-6 border-b border-gray-100">
            <div class="flex items-center gap-3">
                <div class="flex">
                    <div class="w-2 h-8 bg-[#2E7D32] rounded-l"></div>
                    <div class="w-2 h-8 bg-[#D32F2F]"></div>
                    <div class="w-2 h-8 bg-[#FBC02D] rounded-r"></div>
                </div>
                <span class="text-xl font-bold text-[#2E7D32]">Admin</span>
            </div>
        </div>
        <nav class="flex-1 px-4 py-6 space-y-1">
            <a href="dashboard.php" class="flex items-center gap-3 px-4 py-3 text-gray-600 hover:bg-gray-50 rounded-lg transition group"><span>Tableau de bord</span></a>
            <a href="users.php" class="flex items-center gap-3 px-4 py-3 text-gray-600 hover:bg-gray-50 rounded-lg transition group"><span>Utilisateurs</span></a>
            <a href="products.php" class="flex items-center gap-3 px-4 py-3 text-gray-600 hover:bg-gray-50 rounded-lg transition group"><span>Produits</span></a>
            <a href="orders.php" class="flex items-center gap-3 px-4 py-3 text-gray-600 hover:bg-gray-50 rounded-lg transition group"><span>Commandes</span></a>
            <a href="stats.php" class="flex items-center gap-3 px-4 py-3 text-gray-600 hover:bg-gray-50 rounded-lg transition group"><span>Statistiques</span></a>
            <a href="blog.php" class="flex items-center gap-3 px-4 py-3 bg-green-50 text-green-700 font-medium rounded-lg border-l-4 border-green-600">
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path d="M14 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V8z"></path><polyline points="14 2 14 8 20 8"></polyline></svg>
                <span>Blog</span>
                <svg class="w-5 h-5 ml-auto" fill="none" stroke="currentColor" viewBox="0 0 24 24"><polyline points="9 18 15 12 9 6"></polyline></svg>
            </a>
            <a href="settings.php" class="flex items-center gap-3 px-4 py-3 text-gray-600 hover:bg-gray-50 rounded-lg transition group"><span>Paramètres</span></a>
        </nav>
    </aside>

    <main class="flex-1 p-8">
        <div class="mb-8">
            <h1 class="text-3xl font-bold text-gray-900">Rédiger un nouvel article</h1>
            <p class="text-gray-600 mt-2">Partagez une histoire inspirante avec la communauté Made in Cameroon</p>
        </div>

        <?php if ($uploadError): ?>
            <div class="mb-6 p-4 bg-red-100 border border-red-400 text-red-700 rounded-lg"><?= $uploadError ?></div>
        <?php endif; ?>

        <form method="POST" enctype="multipart/form-data" class="bg-white rounded-2xl shadow-sm border border-gray-100 p-8 space-y-8 max-w-5xl">
            <!-- Upload d'image -->
            <div>
                <label class="block text-sm font-medium text-gray-700 mb-3">Image de couverture *</label>
                <div class="border-2 border-dashed border-gray-300 rounded-xl p-8 text-center hover:border-green-500 transition">
                    <input type="file" name="image" id="image" accept="image/*" required class="hidden" onchange="previewFile(this)">
                    <label for="image" class="cursor-pointer">
                        <svg class="w-16 h-16 mx-auto text-gray-400 mb-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"></path>
                        </svg>
                        <p class="text-gray-600">Cliquez pour uploader une image depuis votre appareil</p>
                        <p class="text-xs text-gray-500 mt-2">JPG, PNG, GIF, WebP • Max 5 Mo</p>
                    </label>
                </div>
                <div class="mt-6">
                    <img id="preview" src="" alt="Aperçu" class="w-full h-80 object-cover rounded-xl shadow-lg hidden">
                </div>
            </div>

            <div>
                <label class="block text-sm font-medium text-gray-700 mb-2">Titre de l'article *</label>
                <input type="text" name="title" required class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-green-500" placeholder="Ex: Le secret des paniers Bamoun">
            </div>

            <div>
                <label class="block text-sm font-medium text-gray-700 mb-2">Extrait (résumé) *</label>
                <textarea name="excerpt" rows="4" required class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-green-500" placeholder="Un résumé court et captivant..."></textarea>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-2">Auteur</label>
                    <input type="text" name="author" value="Admin" class="w-full px-4 py-3 border border-gray-300 rounded-lg">
                </div>
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-2">Catégorie</label>
                    <select name="category" class="w-full px-4 py-3 border border-gray-300 rounded-lg">
                        <option>Artisanat</option>
                        <option>Agroalimentaire</option>
                        <option>Mode & Textile</option>
                        <option>Cosmétique naturelle</option>
                        <option>Culture</option>
                        <option>Success Story</option>
                    </select>
                </div>
            </div>

            <div class="flex justify-end gap-4 pt-8 border-t">
                <a href="blog.php" class="px-8 py-3 border border-gray-300 rounded-lg hover:bg-gray-50 transition">Annuler</a>
                <button type="submit" class="px-8 py-3 bg-green-600 hover:bg-green-700 text-white font-medium rounded-lg transition flex items-center gap-2">
                    Publier l'article
                </button>
            </div>
        </form>
    </main>
</div>

<script>
function previewFile(input) {
    const preview = document.getElementById('preview');
    if (input.files && input.files[0]) {
        const reader = new FileReader();
        reader.onload = function(e) {
            preview.src = e.target.result;
            preview.classList.remove('hidden');
        }
        reader.readAsDataURL(input.files[0]);
    }
}
</script>
</body>
</html>