<?php
session_start();
require_once '../../config/db_connect.php';

// Vérification de l'authentification et de la méthode POST
if (!isset($_SESSION['loggedin']) || $_SESSION['role_id'] != ROLE_CLIENT || $_SERVER['REQUEST_METHOD'] !== 'POST') {
    header("Location: catalogue.php");
    exit;
}

// Vérification du panier
if (!isset($_SESSION['cart']) || empty($_SESSION['cart'])) {
    $_SESSION['message'] = "Votre panier est vide. Impossible de procéder au paiement.";
    $_SESSION['message_type'] = "warning";
    header("Location: panier.php");
    exit;
}

$client_id = $_SESSION['user_id'];
$full_name = htmlspecialchars($_POST['full_name']);
$address = htmlspecialchars($_POST['address']);
$payment_method = htmlspecialchars($_POST['payment_method']);
$total_amount = 0; // Sera recalculé pour des raisons de sécurité

// Début de la transaction
mysqli_begin_transaction($conn);

try {
    // --- Étape 1 : Récupération et vérification finale des produits ---
    $product_ids = array_keys($_SESSION['cart']);
    $placeholders = implode(',', array_fill(0, count($product_ids), '?'));

    $sql_items = "SELECT product_id, name, price, stock, vendeur_id FROM products WHERE product_id IN ({$placeholders})";
    $stmt_items = mysqli_prepare($conn, $sql_items);
    $types = str_repeat('i', count($product_ids));
    mysqli_stmt_bind_param($stmt_items, $types, ...$product_ids);
    mysqli_stmt_execute($stmt_items);
    $items_res = mysqli_stmt_get_result($stmt_items);

    $order_items_data = [];
    $total_amount = 4000; // Frais de livraison initial
    $has_stock_issue = false;

    while ($product = mysqli_fetch_assoc($items_res)) {
        $product_id = $product['product_id'];
        $quantity = $_SESSION['cart'][$product_id];

        // Vérification de stock critique avant de créer la commande
        if ($quantity > $product['stock']) {
            $has_stock_issue = true;
            $product_name = $product['name'];
            $available_stock = $product['stock'];
            break;
        }

        $total_amount += $product['price'] * $quantity;

        $order_items_data[] = [
            'product_id' => $product_id,
            'vendeur_id' => $product['vendeur_id'],
            'product_name_snapshot' => $product['name'],
            'unit_price_snapshot' => $product['price'],
            'quantity' => $quantity
        ];
    }

    // Si un problème de stock est détecté, annuler et rediriger
    if ($has_stock_issue) {
        throw new Exception("Stock insuffisant pour {$product_name}. Seulement {$available_stock} disponibles. Veuillez ajuster votre panier.");
    }

    // --- Étape 2 : Création de la Commande Principale ---
    $status = 'paid'; // Statut initial si le paiement est réussi (simulé)

    $sql_order = "INSERT INTO orders (client_id, order_date, total_amount, status, shipping_address, payment_method)
                  VALUES (?, NOW(), ?, ?, ?, ?)";
    $stmt_order = mysqli_prepare($conn, $sql_order);
    mysqli_stmt_bind_param($stmt_order, "idsss", $client_id, $total_amount, $status, $address, $payment_method);
    mysqli_stmt_execute($stmt_order);
    $new_order_id = mysqli_insert_id($conn);

    if (!$new_order_id) {
        throw new Exception("Erreur lors de la création de la commande.");
    }

    // --- Étape 3 : Insertion des Articles de Commande et Mise à Jour du Stock ---
    $sql_item_insert = "INSERT INTO order_items (order_id, product_id, vendeur_id, product_name_snapshot, unit_price_snapshot, price_at_time, quantity)
                    VALUES (?, ?, ?, ?, ?, ?, ?)";
    $stmt_item_insert = mysqli_prepare($conn, $sql_item_insert);

    $sql_stock_update = "UPDATE products SET stock = stock - ? WHERE product_id = ?";
    $stmt_stock_update = mysqli_prepare($conn, $sql_stock_update);

    foreach ($order_items_data as $item) {
        // 3a. Insertion de l'article
        mysqli_stmt_bind_param(
            $stmt_item_insert,
            "iiisdii", // Un 'd' pour DECIMAL(10,2) ou 'i' pour INT, selon le type de prix, ou 's' pour la sûreté
            $new_order_id,
            $item['product_id'],
            $item['vendeur_id'],
            $item['product_name_snapshot'],
            $item['unit_price_snapshot'],
            $item['unit_price_snapshot'],
            $item['quantity']
        );
        mysqli_stmt_execute($stmt_item_insert);

        // 3b. Mise à jour du stock
        mysqli_stmt_bind_param($stmt_stock_update, "ii", $item['quantity'], $item['product_id']);
        mysqli_stmt_execute($stmt_stock_update);
    }

    // Validation et Fin
    mysqli_commit($conn);

    // Vider le panier
    unset($_SESSION['cart']);

    $_SESSION['message'] = "Félicitations ! Votre commande #CM" . $new_order_id . " d'un montant de " . number_format($total_amount, 0, ',', ' ') . " FCFA a été enregistrée avec succès. Merci de votre confiance !";
    $_SESSION['message_type'] = "success";
    header("Location: commandes.php");
    exit;

} catch (Exception $e) {
    // Annulation en cas d'erreur (stock, DB, etc.)
    mysqli_rollback($conn);
    $_SESSION['message'] = "Échec du paiement : " . $e;
    $_SESSION['message_type'] = "error";
    header("Location: panier.php");
    exit;
}

// Fermeture des connexions (bien que PHP le fasse automatiquement à la fin du script)
mysqli_close($conn);
?>