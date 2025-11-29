<?php
/**
 * Script de Déconnexion Universel (Client, Vendeur, Admin)
 * * Ce script est appelé pour mettre fin à la session de l'utilisateur
 * et le rediriger vers la page de connexion ou la page d'accueil.
 */

// 1. Démarrer la session pour accéder aux données
session_start();

// Si l'utilisateur était connecté, on peut optionnellement enregistrer
// un message flash pour la page de connexion.
if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] === true) {
    // SUCCESS
    $_SESSION['message'] = "Vous avez été déconnecté avec succès. À bientôt !";
    $_SESSION['message_type'] = "success";
}

// 2. Détruire toutes les variables de session enregistrées
// (Ex: user_id, role_id, first_name, loggedin, etc.)
$_SESSION = array();

// 3. Si la session utilise des cookies, il est nécessaire de les détruire
// Note: Ceci détruit le cookie de session et non un cookie d'utilisateur
if (ini_get("session.use_cookies")) {
    $params = session_get_cookie_params();
    setcookie(session_name(), '', time() - 42000,
        $params["path"], $params["domain"],
        $params["secure"], $params["httponly"]
    );
}

// 4. Détruire définitivement la session côté serveur
session_destroy();

// 5. Rediriger l'utilisateur vers la page de connexion
header("location: /src/auth/client/login.php");
exit;
?>