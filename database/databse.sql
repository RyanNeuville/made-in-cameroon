-- ####################################################################
-- SCRIPT DE CREATION DE LA BASE DE DONNEES : MADE IN CAMEROUN (GL2B)
-- ####################################################################

-- 1. Creation de la base de donnees
CREATE DATABASE IF NOT EXISTS `made-in-cameroon` CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci;
USE `made-in-cameroon`;

-- 2. Table des Roles (pour la gestion des acces)
CREATE TABLE `roles` (
    `role_id` INT PRIMARY KEY AUTO_INCREMENT,
    `role_name` VARCHAR(50) NOT NULL UNIQUE
) ENGINE=InnoDB;

-- 3. Table des Regions (pour la tracabilite des produits/vendeurs)
CREATE TABLE `regions` (
    `region_id` INT PRIMARY KEY AUTO_INCREMENT,
    `region_name` VARCHAR(100) NOT NULL UNIQUE
) ENGINE=InnoDB;

-- 4. Table des Utilisateurs (Clients, Vendeurs, Administrateurs)
CREATE TABLE `users` (
    `user_id` INT PRIMARY KEY AUTO_INCREMENT,
    `role_id` INT NOT NULL,
    `first_name` VARCHAR(100) NOT NULL,
    `last_name` VARCHAR(100) NOT NULL,
    `email` VARCHAR(255) NOT NULL UNIQUE,
    `password_hash` VARCHAR(255) NOT NULL COMMENT 'Stockage du mot de passe hache (password_hash())',
    `phone_number` VARCHAR(20) DEFAULT NULL,
    `registration_date` DATETIME DEFAULT CURRENT_TIMESTAMP,
    
    FOREIGN KEY (`role_id`) REFERENCES `roles`(`role_id`) ON DELETE RESTRICT ON UPDATE CASCADE
) ENGINE=InnoDB;

-- 5. Table des Details Specifiques aux Vendeurs (lie a la table users)
CREATE TABLE `vendeurs_details` (
    `vendeur_id` INT PRIMARY KEY AUTO_INCREMENT,
    `user_id` INT NOT NULL UNIQUE, -- Cle unique vers users
    `shop_name` VARCHAR(150) NOT NULL UNIQUE,
    `activity_description` TEXT,
    `region_id` INT,
    `niu_number` VARCHAR(50) UNIQUE COMMENT 'Numero d''Identification Unique',
    `mobile_money_account` VARCHAR(50) NOT NULL,
    `cni_document_url` VARCHAR(255) COMMENT 'Chemin vers le fichier de CNI/Kbis',
    `vendeur_picture_url` VARCHAR(255) COMMENT 'Photo du vendeur pour son identification',
    `is_approved` BOOLEAN DEFAULT FALSE COMMENT 'Validation par l''administrateur (0=en attente, 1=approuvé)',
    
    FOREIGN KEY (`user_id`) REFERENCES `users`(`user_id`) ON DELETE CASCADE ON UPDATE CASCADE,
    FOREIGN KEY (`region_id`) REFERENCES `regions`(`region_id`) ON DELETE SET NULL ON UPDATE CASCADE
) ENGINE=InnoDB;

-- 6. Table des Categories de Produits
CREATE TABLE `categories` (
    `category_id` INT PRIMARY KEY AUTO_INCREMENT,
    `category_name` VARCHAR(100) NOT NULL UNIQUE
) ENGINE=InnoDB;

-- 7. Table des Produits
CREATE TABLE `products` (
    `product_id` INT PRIMARY KEY AUTO_INCREMENT,
    `vendeur_id` INT NOT NULL,
    `category_id` INT NOT NULL,
    `name` VARCHAR(255) NOT NULL,
    `description` TEXT,
    `price` DECIMAL(10, 2) NOT NULL,
    `stock` INT NOT NULL DEFAULT 0,
    `image_url` VARCHAR(255) NOT NULL,
    `creation_date` DATETIME DEFAULT CURRENT_TIMESTAMP,
    `is_active` BOOLEAN DEFAULT TRUE COMMENT 'Si le vendeur souhaite rendre le produit visible (hors stock ou desactive)',
    
    FOREIGN KEY (`vendeur_id`) REFERENCES `vendeurs_details`(`vendeur_id`) ON DELETE CASCADE ON UPDATE CASCADE,
    FOREIGN KEY (`category_id`) REFERENCES `categories`(`category_id`) ON DELETE RESTRICT ON UPDATE CASCADE
) ENGINE=InnoDB;

-- 8. Table des Commandes
CREATE TABLE `orders` (
    `order_id` INT PRIMARY KEY AUTO_INCREMENT,
    `client_id` INT NOT NULL,
    `order_date` DATETIME DEFAULT CURRENT_TIMESTAMP,
    `total_amount` DECIMAL(10, 2) NOT NULL,
    `shipping_address` VARCHAR(255) NOT NULL,
    `status` ENUM('pending', 'paid', 'shipped', 'delivered', 'cancelled') NOT NULL DEFAULT 'pending',
    `payment_token` VARCHAR(255) COMMENT 'Token de transaction du prestataire de paiement',
    
    FOREIGN KEY (`client_id`) REFERENCES `users`(`user_id`) ON DELETE RESTRICT ON UPDATE CASCADE
) ENGINE=InnoDB;

-- 9. Table des Articles de Commande (Details)
CREATE TABLE `order_items` (
    `item_id` INT PRIMARY KEY AUTO_INCREMENT,
    `order_id` INT NOT NULL,
    `product_id` INT, -- Le produit peut exister ou non (si supprimer, on garde l'historique)
    `quantity` INT NOT NULL,
    `price_at_time` DECIMAL(10, 2) NOT NULL COMMENT 'Prix enregistre au moment de l''achat',
    `product_name_snapshot` VARCHAR(255) COMMENT 'Nom du produit au moment de l''achat',
    
    UNIQUE KEY `order_product_unique` (`order_id`, `product_id`), -- Un produit unique par commande
    FOREIGN KEY (`order_id`) REFERENCES `orders`(`order_id`) ON DELETE CASCADE ON UPDATE CASCADE,
    FOREIGN KEY (`product_id`) REFERENCES `products`(`product_id`) ON DELETE SET NULL ON UPDATE CASCADE
) ENGINE=InnoDB;

-- 10. Table des Avis et Notes
CREATE TABLE `reviews` (
    `review_id` INT PRIMARY KEY AUTO_INCREMENT,
    `product_id` INT NOT NULL,
    `client_id` INT NOT NULL,
    `rating` TINYINT NOT NULL CHECK (`rating` BETWEEN 1 AND 5),
    `comment` TEXT,
    `review_date` DATETIME DEFAULT CURRENT_TIMESTAMP,
    
    UNIQUE KEY `client_product_unique` (`client_id`, `product_id`), -- Un seul avis par client et par produit
    FOREIGN KEY (`product_id`) REFERENCES `products`(`product_id`) ON DELETE CASCADE ON UPDATE CASCADE,
    FOREIGN KEY (`client_id`) REFERENCES `users`(`user_id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB;

-- 11. Table des Logs d'Audit (Securite et Tracabilite)
CREATE TABLE `audit_logs` (
    `log_id` INT PRIMARY KEY AUTO_INCREMENT,
    `user_id` INT,
    `action_type` VARCHAR(100) NOT NULL COMMENT 'Ex: LOGIN_SUCCESS, PRODUCT_DELETE, USER_UPDATE',
    `target_table` VARCHAR(100) COMMENT 'Table concernée par l''action (ex: products)',
    `target_id` INT COMMENT 'ID de l''enregistrement concerné (ex: product_id)',
    `timestamp` DATETIME DEFAULT CURRENT_TIMESTAMP,
    
    FOREIGN KEY (`user_id`) REFERENCES `users`(`user_id`) ON DELETE SET NULL ON UPDATE CASCADE
) ENGINE=InnoDB;

-- ####################################################################
-- JEU DE DONNÉES INITIALES (INDISPENSABLE)
-- ####################################################################

-- Insertion des Rôles
INSERT INTO `roles` (`role_name`) VALUES 
('admin'), 
('vendeur'), 
('client');

-- Insertion de quelques Regions
INSERT INTO `regions` (`region_name`) VALUES 
('LITTORAL - Douala'),
('CENTRE - Yaounde'),
('OUEST - Bafoussam'),
('ADAMAOUA - Ngaoundere');

-- Insertion de Catégories (Exemple basé sur les maquettes)
INSERT INTO `categories` (`category_name`) VALUES
('Agroalimentaire'),
('Artisanat'),
('Textile'),
('Cosmétique');