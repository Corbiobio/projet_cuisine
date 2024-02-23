-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le : ven. 23 fév. 2024 à 16:03
-- Version du serveur : 8.0.31
-- Version de PHP : 8.2.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `gestion_cuisine`
--

-- --------------------------------------------------------

--
-- Structure de la table `cart`
--

DROP TABLE IF EXISTS `cart`;
CREATE TABLE IF NOT EXISTS `cart` (
  `id_meal` varchar(255) NOT NULL,
  `id_client` varchar(255) NOT NULL,
  `amount_meal` int DEFAULT NULL,
  PRIMARY KEY (`id_meal`,`id_client`),
  KEY `id_client` (`id_client`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Structure de la table `category_meal`
--

DROP TABLE IF EXISTS `category_meal`;
CREATE TABLE IF NOT EXISTS `category_meal` (
  `id_category` varchar(255) NOT NULL,
  `label_category` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id_category`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Déchargement des données de la table `category_meal`
--

INSERT INTO `category_meal` (`id_category`, `label_category`) VALUES
('dc351xv32', 'entre'),
('dc35sdfdsf1cxv32', 'dessert'),
('dc35sdfdsf1xv32', 'plat');

-- --------------------------------------------------------

--
-- Structure de la table `client`
--

DROP TABLE IF EXISTS `client`;
CREATE TABLE IF NOT EXISTS `client` (
  `id_client` varchar(255) NOT NULL,
  `mail_client` varchar(255) DEFAULT NULL,
  `password_client` varchar(255) DEFAULT NULL,
  `is_admin` tinyint(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id_client`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Déchargement des données de la table `client`
--

INSERT INTO `client` (`id_client`, `mail_client`, `password_client`, `is_admin`) VALUES
('6df5f6b564df6g45sfd45', 'b', 'b', 0),
('6s5d564.sv1sd54v1', 'a', 'a', 1);

-- --------------------------------------------------------

--
-- Structure de la table `diet_meal`
--

DROP TABLE IF EXISTS `diet_meal`;
CREATE TABLE IF NOT EXISTS `diet_meal` (
  `id_diet` varchar(255) NOT NULL,
  `label_diet` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id_diet`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Déchargement des données de la table `diet_meal`
--

INSERT INTO `diet_meal` (`id_diet`, `label_diet`) VALUES
('65d8b4faad2bd', 'vegan'),
('65d8b502c4e5c', 'vegetarien'),
('65d8b50eb4778', 'viande');

-- --------------------------------------------------------

--
-- Structure de la table `ingredient`
--

DROP TABLE IF EXISTS `ingredient`;
CREATE TABLE IF NOT EXISTS `ingredient` (
  `id_ingredient` varchar(255) NOT NULL,
  `label_ingredient` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id_ingredient`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Déchargement des données de la table `ingredient`
--

INSERT INTO `ingredient` (`id_ingredient`, `label_ingredient`) VALUES
('65d8b4a41d6e1', 'patate'),
('65d8b4aab1b01', 'carote'),
('65d8b4c6e6cf0', 'noix'),
('65d8b55a957b4', 'boeuf');

-- --------------------------------------------------------

--
-- Structure de la table `ingredient_meal`
--

DROP TABLE IF EXISTS `ingredient_meal`;
CREATE TABLE IF NOT EXISTS `ingredient_meal` (
  `id_meal` varchar(255) NOT NULL,
  `id_ingredient` varchar(255) NOT NULL,
  PRIMARY KEY (`id_meal`,`id_ingredient`),
  KEY `FK_ingredient_meal` (`id_ingredient`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Déchargement des données de la table `ingredient_meal`
--

INSERT INTO `ingredient_meal` (`id_meal`, `id_ingredient`) VALUES
('65d8b54dbf89b', '65d8b4a41d6e1'),
('65d8b57eaa522', '65d8b4a41d6e1'),
('65d8b54dbf89b', '65d8b4aab1b01'),
('65d8b57eaa522', '65d8b4aab1b01'),
('65d8b57eaa522', '65d8b4c6e6cf0'),
('65d8b57eaa522', '65d8b55a957b4');

-- --------------------------------------------------------

--
-- Structure de la table `meal`
--

DROP TABLE IF EXISTS `meal`;
CREATE TABLE IF NOT EXISTS `meal` (
  `id_meal` varchar(255) NOT NULL,
  `id_origin` varchar(255) NOT NULL,
  `id_diet` varchar(255) NOT NULL,
  `id_category` varchar(255) NOT NULL,
  `title_meal` varchar(255) DEFAULT NULL,
  `price_meal` decimal(10,0) DEFAULT NULL,
  `weight_meal` decimal(10,0) DEFAULT NULL,
  PRIMARY KEY (`id_meal`),
  KEY `FK_association_1` (`id_origin`),
  KEY `FK_association_2` (`id_diet`),
  KEY `FK_association_3` (`id_category`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Déchargement des données de la table `meal`
--

INSERT INTO `meal` (`id_meal`, `id_origin`, `id_diet`, `id_category`, `title_meal`, `price_meal`, `weight_meal`) VALUES
('65d8b54dbf89b', '65d8b4e004e32', '65d8b502c4e5c', 'dc351xv32', 'soupe de patate', '13', '280'),
('65d8b57eaa522', '65d8b4e004e32', '65d8b50eb4778', 'dc35sdfdsf1xv32', 'boeuf au noix', '25', '450');

-- --------------------------------------------------------

--
-- Structure de la table `origin`
--

DROP TABLE IF EXISTS `origin`;
CREATE TABLE IF NOT EXISTS `origin` (
  `id_origin` varchar(255) NOT NULL,
  `label_origin` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id_origin`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Déchargement des données de la table `origin`
--

INSERT INTO `origin` (`id_origin`, `label_origin`) VALUES
('65d8b4d8d40ce', 'italie'),
('65d8b4e004e32', 'france'),
('65d8b4ec71312', 'espagne');

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `cart`
--
ALTER TABLE `cart`
  ADD CONSTRAINT `cart_ibfk_1` FOREIGN KEY (`id_meal`) REFERENCES `meal` (`id_meal`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `cart_ibfk_2` FOREIGN KEY (`id_client`) REFERENCES `client` (`id_client`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Contraintes pour la table `ingredient_meal`
--
ALTER TABLE `ingredient_meal`
  ADD CONSTRAINT `FK_association_5` FOREIGN KEY (`id_meal`) REFERENCES `meal` (`id_meal`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `FK_ingredient_meal` FOREIGN KEY (`id_ingredient`) REFERENCES `ingredient` (`id_ingredient`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Contraintes pour la table `meal`
--
ALTER TABLE `meal`
  ADD CONSTRAINT `FK_association_1` FOREIGN KEY (`id_origin`) REFERENCES `origin` (`id_origin`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `FK_association_2` FOREIGN KEY (`id_diet`) REFERENCES `diet_meal` (`id_diet`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `FK_association_3` FOREIGN KEY (`id_category`) REFERENCES `category_meal` (`id_category`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
