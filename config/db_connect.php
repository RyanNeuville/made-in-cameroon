<?php
/**
 * Fichier de Configuration et de Connexion à la Base de Données (mysqli procédural)
 */

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);


// Informations de connexion MySQL
define('DB_SERVER', '127.0.0.1');
define('DB_USERNAME', 'codedrill');
define('DB_PASSWORD', 'Codedrill@237');
define('DB_NAME', 'made-in-cameroon');

// Rôles IDs (pour la lisibilité du code PHP)
define('ROLE_ADMIN', 1);
define('ROLE_VENDEUR', 2);
define('ROLE_CLIENT', 3);


// Tente d'établir la connexion en utilisant l'approche procédurale
$conn = mysqli_connect(DB_SERVER, DB_USERNAME, DB_PASSWORD, DB_NAME);

// Vérification de la connexion
if ($conn === false) {
    die("ERREUR : Impossible de se connecter à la base de données. " . mysqli_connect_error());
}

if (!mysqli_set_charset($conn, "utf8mb4")) {
    error_log("Erreur lors du chargement du jeu de caractères utf8mb4: " . mysqli_error($conn));
}

?>