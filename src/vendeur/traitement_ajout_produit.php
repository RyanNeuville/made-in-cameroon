<?php
session_start();
require_once '../../config/db_connect.php'; 

// Vérifiez l'authentification et le rôle Vendeur
if (!isset($_SESSION['loggedin']) || $_SESSION['role_id'] != ROLE_VENDEUR || $_SERVER["REQUEST_METHOD"] != "POST") {
    header("location: ../auth/vendeur/login.php");
    exit;
}

// 1. Récupération du Vendeur ID
$user_id = $_SESSION['user_id'];
$stmt_v_id = mysqli_prepare($conn, "SELECT vendeur_id FROM vendeurs_details WHERE user_id = ? AND is_approved = 1");
mysqli_stmt_bind_param($stmt_v_id, "i", $user_id);
mysqli_stmt_execute($stmt_v_id);
$result_v_id = mysqli_stmt_get_result($stmt_v_id);
$vendeur_data = mysqli_fetch_assoc($result_v_id);
mysqli_stmt_close($stmt_v_id);

if (!$vendeur_data) {
    $_SESSION['message'] = "Votre compte n'est pas encore validé ou n'existe pas.";
    $_SESSION['message_type'] = "error";
    header("location: ../vendeur/vendeur_dashboard.php");
    exit;
}
$vendeur_id = $vendeur_data['vendeur_id'];

// Définition du dossier d'upload pour les images produits (différent des docs CNI)
$upload_dir = '../../uploads/produits/'; // Assurez-vous que ce dossier existe

// --- 2. Récupération et Nettoyage des données du formulaire ---
$name = mysqli_real_escape_string($conn, $_POST['productName']);
$price = (float)$_POST['productPrice'];
$stock = (int)$_POST['productStock'];
$category_id = (int)$_POST['productCategory'];
$description = mysqli_real_escape_string($conn, $_POST['productDescription']);
$image_url = '../../uploads/produits/default.png'; // Valeur par défaut en cas d'échec

$errors = [];

// --- 3. Gestion de l'Upload de l'Image Produit ---
if (isset($_FILES['productImage']) && $_FILES['productImage']['error'] === UPLOAD_ERR_OK) {
    $file = $_FILES['productImage'];
    
    // Validation simple
    $allowed_types = ['image/jpeg', 'image/png'];
    if ($file['size'] > 5000000 || !in_array($file['type'], $allowed_types)) { // Max 5MB
        $errors[] = "Le fichier image est trop volumineux ou le format n'est pas supporté (JPG, PNG).";
    } else {
        $extension = pathinfo($file['name'], PATHINFO_EXTENSION);
        $safe_filename = 'prod_' . $vendeur_id . '_' . uniqid('', true) . '.' . $extension;
        $destination = $upload_dir . $safe_filename;

        if (move_uploaded_file($file['tmp_name'], $destination)) {
            $image_url = $destination;
        } else {
            $errors[] = "Erreur lors du déplacement du fichier image.";
        }
    }
} else {
     $errors[] = "Veuillez fournir une image pour votre produit.";
}

// --- 4. Insertion SÉCURISÉE ---
if (empty($errors)) {
    $is_active = 1; // Produit actif par défaut
    
    $stmt_insert = mysqli_prepare($conn, 
        "INSERT INTO products (vendeur_id, category_id, name, description, price, stock, image_url, is_active) 
         VALUES (?, ?, ?, ?, ?, ?, ?, ?)");
    
    mysqli_stmt_bind_param($stmt_insert, "iissdisi", 
        $vendeur_id, $category_id, $name, $description, $price, $stock, $image_url, $is_active);

    if (mysqli_stmt_execute($stmt_insert)) {
        // SUCCESS
        $_SESSION['message'] = " Le produit '{$name}' a été ajouté avec succès !";
        $_SESSION['message_type'] = "success";
    } else {
        // ERROR
        $_SESSION['message'] = "Erreur SQL lors de l'ajout du produit : " . mysqli_error($conn);
        $_SESSION['message_type'] = "error";
    }
    mysqli_stmt_close($stmt_insert);
} else {
    // WARNING / Erreurs d'Upload ou de validation
    $_SESSION['message'] = implode("<br>", $errors);
    $_SESSION['message_type'] = "warning";
}

mysqli_close($conn);
header("location: vendeur_dashboard.php");
exit;
?>