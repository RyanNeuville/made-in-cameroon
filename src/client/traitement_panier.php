<?php
session_start();
require_once '../../config/db_connect.php';
if (!isset($_SESSION['loggedin']) || $_SESSION['role_id'] != ROLE_CLIENT) {
    header("location: ../src/auth/client/login.php");
    exit;
}

// Redirection si l'utilisateur n'est pas connecté ou si la méthode POST n'est pas utilisée
if (!isset($_SESSION['loggedin']) || $_SESSION['role_id'] != ROLE_CLIENT || $_SERVER['REQUEST_METHOD'] !== 'POST') {
    header("Location: catalogue.php");
    exit;
}

// Vérification des données POST minimales
if (!isset($_POST['product_id']) || !isset($_POST['action'])) {
    header("Location: client_panier.php");
    exit;
}

$product_id = (int) $_POST['product_id'];
$action = $_POST['action'];

// Initialisation du panier si nécessaire
if (!isset($_SESSION['cart'])) {
    $_SESSION['cart'] = [];
}

// 1. Vérification du stock (nécessaire pour l'augmentation)
$stock = 0;
if ($action == 'increase' || $action == 'add') {
    $stmt_stock = mysqli_prepare($conn, "SELECT stock FROM products WHERE product_id = ?");
    mysqli_stmt_bind_param($stmt_stock, "i", $product_id);
    mysqli_stmt_execute($stmt_stock);
    mysqli_stmt_bind_result($stmt_stock, $stock);
    mysqli_stmt_fetch($stmt_stock);
    mysqli_stmt_close($stmt_stock);

    if ($stock === 0) {
        $_SESSION['message'] = "Ce produit est malheureusement en rupture de stock et n'a pas pu être ajouté.";
        $_SESSION['message_type'] = "error";
        header("Location: client_panier.php");
        exit;
    }
}


// --- 2. Logique de l'action ---

if ($action === 'add') {
    $quantity_to_add = (isset($_POST['quantity']) && (int) $_POST['quantity'] > 0) ? (int) $_POST['quantity'] : 1;

    // Si le produit est déjà dans le panier, on augmente sa quantité
    if (isset($_SESSION['cart'][$product_id])) {
        $new_quantity = $_SESSION['cart'][$product_id] + $quantity_to_add;
    } else {
        $new_quantity = $quantity_to_add;
    }

    if ($new_quantity <= $stock) {
        $_SESSION['cart'][$product_id] = $new_quantity;
        $_SESSION['message'] = "Produit ajouté au panier avec succès !";
        $_SESSION['message_type'] = "success";
    } else {
        $_SESSION['cart'][$product_id] = $stock;
        $_SESSION['message'] = "Attention : Seules " . $stock . " unités sont disponibles. Votre panier a été ajusté.";
        $_SESSION['message_type'] = "warning";
    }

    // Redirection vers le catalogue ou la page d'où vient l'ajout (si l'ajout vient d'une fiche produit)
    header("Location: client_panier.php");
    exit;

} elseif (isset($_SESSION['cart'][$product_id])) {

    switch ($action) {
        case 'increase':
            $current_quantity = $_SESSION['cart'][$product_id];
            if ($current_quantity < $stock) {
                $_SESSION['cart'][$product_id]++;
                $_SESSION['message'] = "Quantité augmentée.";
                $_SESSION['message_type'] = "info";
            } else {
                $_SESSION['message'] = "Quantité maximale atteinte (stock : " . $stock . ").";
                $_SESSION['message_type'] = "warning";
            }
            break;

        case 'decrease':
            $_SESSION['cart'][$product_id]--;
            // Si la quantité passe à zéro, la supprimer complètement
            if ($_SESSION['cart'][$product_id] <= 0) {
                unset($_SESSION['cart'][$product_id]);
                $_SESSION['message'] = "Produit retiré du panier.";
                $_SESSION['message_type'] = "success";
            } else {
                $_SESSION['message'] = "Quantité diminuée.";
                $_SESSION['message_type'] = "info";
            }
            break;

        case 'remove':
            unset($_SESSION['cart'][$product_id]);
            $_SESSION['message'] = "Produit supprimé du panier.";
            $_SESSION['message_type'] = "success";
            break;

        default:
            // Ne rien faire ou ajouter un message d'erreur
            break;
    }
}


// --- 3. Redirection finale ---
$redirect_url = 'client_panier.php';

// Si le panier est vide après les opérations, on peut rediriger vers le catalogue
if (empty($_SESSION['cart'])) {
    $redirect_url = 'catalogue.php';
    if (!isset($_SESSION['message'])) { // Si aucun message n'a été défini plus haut (ex: suppression)
        $_SESSION['message'] = "Votre panier est maintenant vide. Commencez vos achats !";
        $_SESSION['message_type'] = "info";
    }
}

header("Location: " . $redirect_url);
exit;
?>