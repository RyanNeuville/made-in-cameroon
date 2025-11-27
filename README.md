# 🇨🇲 Made In Cameroun : La Marketplace Locale

## 🌟 Introduction

**Made In Cameroun** est une plateforme e-commerce (marketplace) dédiée à la mise en relation des producteurs et artisans locaux camerounais avec les clients.

Ce projet a été conçu comme un **Produit Minimum Viable (MVP)** en utilisant une architecture LAMP/XAMPP standard, en mettant l'accent sur la sécurité des transactions et la gestion des rôles (Client, Vendeur, Admin).

-----

## 🚀 Démarrage du Projet

### Prérequis

Pour exécuter ce projet localement, vous devez avoir un environnement de serveur web avec PHP et MySQL.

  * **PHP** (version 7.4 ou supérieure recommandée)
  * **MySQL** ou **MariaDB**
  * **Serveur Web** (Apache via XAMPP, WAMP, MAMP, ou un conteneur Docker)

### 1\. Configuration de la Base de Données

1.  Créez une base de données nommée `made_in_cameroun`.

2.  Exécutez le script SQL fourni pour créer toutes les tables et insérer les données initiales (`roles`, `regions`, `categories`).

    ```sql
    -- Code SQL complet inclus dans la réponse précédente
    -- (tables: users, vendeurs_details, products, orders, etc.)
    ```

3.  Vérifiez que le fichier de connexion `config/db_connect.php` utilise les bons identifiants :

    ```php
    // Fichier: config/db_connect.php
    define('DB_SERVER', 'localhost');
    define('DB_USERNAME', 'root'); // Votre utilisateur DB
    define('DB_PASSWORD', '');     // Votre mot de passe DB
    define('DB_NAME', 'made_in_cameroun');
    ```
-----

## 🛠️ Architecture Technique

### 1\. Technologies Utilisées

  * **Backend :** PHP (procédural)
  * **Base de Données :** MySQL / MySQLi (avec **Requêtes Préparées** pour la sécurité)
  * **Frontend :** HTML5, Tailwind CSS
  * **UI/UX :** DaisyUI (utilisé pour les composants modernes et les classes de couleur `success`, `error`, `warning`).

### 2\. Gestion des Rôles (Accès et Sécurité)

La plateforme repose sur trois rôles principaux définis dans la table `roles` :

| Rôle | ID (Constante PHP) | Note d'Accès |
| :--- | :--- | :--- |
| **Administrateur** | `ROLE_ADMIN` (1) | Accès au Dashboard pour valider les vendeurs. |
| **Vendeur** | `ROLE_VENDEUR` (2) | Peut s'inscrire, mais l'accès est **bloqué** tant que `vendeurs_details.is_approved` est à `0`. |
| **Client** | `ROLE_CLIENT` (3) | Accès immédiat au catalogue et au panier après inscription. |

### 3\. Sécurité et Bonnes Pratiques

  * **Hachage des Mots de Passe :** Utilisation de `password_hash()` et `password_verify()`.
  * **Protection SQL Injection :** Toutes les requêtes sensibles (`INSERT`, `SELECT` de connexion) utilisent `mysqli_prepare()` et `mysqli_stmt_bind_param()`.
  * **Transaction Vendeur :** L'inscription Vendeur utilise des transactions (`mysqli_begin_transaction`) pour garantir que si l'insertion échoue dans une table, toutes les opérations sont annulées (rollback), y compris la suppression du fichier uploadé.
  * **Sécurité des Uploads :** Les fichiers CNI/Kbis sont renommés (`uniqid()`) et stockés dans un dossier dédié (`uploads/vendeur_docs/`).

-----

## Prochaines Étapes pour le MVP

Pour compléter la fonctionnalité de la marketplace, les développements suivants sont nécessaires :

1.  **Fonctionnalité Vendeur Approuvé :**
      * Création de l'interface **Dashboard Vendeur**.
      * Logique d'**Ajout de Produit** (avec upload d'image produit).
2.  **Fonctionnalité Client :**
      * Implémentation de la logique **Panier** (via Session PHP ou DB).
      * Implémentation du processus de **Checkout** et de la gestion des adresses.
3.  **Fonctionnalité Administrateur :**
      * Création du **Dashboard Admin** pour visualiser les vendeurs en attente (`is_approved = 0`) et les valider (`is_approved = 1`).
