<?php
// =========================================================================
// SCRIPT : traitement_commande_action.php
// DESCRIPTION : Met à jour le statut d'une commande dans la base de données.
// =========================================================================

// 1. Démarrer la session et vérifier l'authentification du vendeur
session_start();

// Assurez-vous que l'utilisateur est connecté et est un Vendeur
if (!isset($_SESSION['vendeur_id'])) {
    // Rediriger vers la page de connexion si non connecté
    header('Location: connexion_vendeur.php');
    exit;
}

// 2. Inclure le fichier de connexion à la base de données
// Adaptez ce chemin à votre structure réelle
require_once 'connexion.php';

// 3. Vérifier la méthode de requête (doit être POST)
if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    // Rediriger ou afficher un message d'erreur si la méthode n'est pas POST
    header('Location: dashboard_vendeur.php?error=methode_non_autorisee');
    exit;
}

// 4. Récupérer et valider les données POST
// Nous attendons l'ID de la commande et le nouveau statut
$commande_id = filter_input(INPUT_POST, 'commande_id', FILTER_VALIDATE_INT);
$nouveau_statut = filter_input(INPUT_POST, 'nouveau_statut', FILTER_SANITIZE_STRING);
$vendeur_id = $_SESSION['vendeur_id'];

// Liste des statuts valides pour éviter les manipulations inattendues
$statuts_valides = ['Expédiée', 'En cours de livraison', 'Traitée', 'Annulée'];

if ($commande_id === false || $commande_id === null || empty($nouveau_statut) || !in_array($nouveau_statut, $statuts_valides)) {
    // Gérer les données manquantes ou invalides
    header('Location: dashboard_vendeur.php?error=donnees_invalides');
    exit;
}

// 5. Connexion à la base de données (assumant que $pdo est défini dans connexion.php)
try {
    $pdo = connect_to_database(); // Utilisez la fonction de connexion de votre fichier

    // Requête SQL de mise à jour
    // IMPORTANT : On vérifie que la commande appartient bien au Vendeur connecté !
    $sql = "UPDATE Commandes 
            SET statut = :statut, date_expedition = NOW() 
            WHERE commande_id = :commande_id 
            AND vendeur_id = :vendeur_id";
    // On ajoute date_expedition pour tracer l'action

    $stmt = $pdo->prepare($sql);

    // Liaison des paramètres pour la sécurité (prévention des injections SQL)
    $stmt->bindParam(':statut', $nouveau_statut);
    $stmt->bindParam(':commande_id', $commande_id, PDO::PARAM_INT);
    $stmt->bindParam(':vendeur_id', $vendeur_id, PDO::PARAM_INT);

    $stmt->execute();

    // 6. Vérifier si une ligne a été affectée (si la mise à jour a réussi)
    if ($stmt->rowCount() > 0) {
        // Succès : La commande a été mise à jour
        header('Location: dashboard_vendeur.php?success=commande_mise_a_jour');
    } else {
        // Échec : Soit l'ID n'existe pas, soit le statut était déjà le même, soit la commande n'appartient pas au vendeur
        header('Location: dashboard_vendeur.php?error=mise_a_jour_impossible');
    }

} catch (PDOException $e) {
    // Erreur de base de données
    error_log("Erreur de base de données lors de la mise à jour de la commande : " . $e->getMessage());
    header('Location: dashboard_vendeur.php?error=erreur_db');
}

exit;
?>