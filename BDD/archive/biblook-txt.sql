-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le : mar. 14 mars 2023 à 17:03
-- Version du serveur : 8.0.31
-- Version de PHP : 8.0.26

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `biblook`
--

-- --------------------------------------------------------

--
-- Structure de la table `author`
--

DROP TABLE IF EXISTS `author`;
CREATE TABLE IF NOT EXISTS `author` (
  `id_author` int NOT NULL AUTO_INCREMENT,
  `lastname` varchar(100) CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci DEFAULT NULL,
  `firstname` varchar(100) CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci DEFAULT NULL,
  PRIMARY KEY (`id_author`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

-- --------------------------------------------------------

--
-- Structure de la table `category`
--

DROP TABLE IF EXISTS `category`;
CREATE TABLE IF NOT EXISTS `category` (
  `id_category` int NOT NULL AUTO_INCREMENT,
  `category` varchar(50) CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci DEFAULT NULL,
  PRIMARY KEY (`id_category`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

-- --------------------------------------------------------

--
-- Structure de la table `copy`
--

DROP TABLE IF EXISTS `copy`;
CREATE TABLE IF NOT EXISTS `copy` (
  `id_copy` int NOT NULL AUTO_INCREMENT,
  `editor_id` int DEFAULT NULL,
  `location` varchar(100) CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci DEFAULT NULL,
  `work_id` int NOT NULL,
  `stock` tinyint(1) DEFAULT NULL,
  PRIMARY KEY (`id_copy`) USING BTREE,
  KEY `WORK` (`work_id`),
  KEY `EDITOR` (`editor_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

-- --------------------------------------------------------

--
-- Structure de la table `editor`
--

DROP TABLE IF EXISTS `editor`;
CREATE TABLE IF NOT EXISTS `editor` (
  `id_editor` int NOT NULL AUTO_INCREMENT,
  `editor_name` varchar(150) CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci DEFAULT NULL,
  `number` int DEFAULT NULL,
  `date` date DEFAULT NULL,
  PRIMARY KEY (`id_editor`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

-- --------------------------------------------------------

--
-- Structure de la table `genre`
--

DROP TABLE IF EXISTS `genre`;
CREATE TABLE IF NOT EXISTS `genre` (
  `id_genre` int NOT NULL AUTO_INCREMENT,
  `name` varchar(100) CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci DEFAULT NULL,
  PRIMARY KEY (`id_genre`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

-- --------------------------------------------------------

--
-- Structure de la table `loan`
--

DROP TABLE IF EXISTS `loan`;
CREATE TABLE IF NOT EXISTS `loan` (
  `id_loan` int NOT NULL AUTO_INCREMENT,
  `id_copy` int DEFAULT NULL,
  `release_date` date DEFAULT NULL,
  `theoretical_date` date DEFAULT NULL,
  `date_return_loan` date DEFAULT NULL,
  `status` tinyint(1) DEFAULT NULL,
  `id_user` int DEFAULT NULL,
  PRIMARY KEY (`id_loan`),
  KEY `COPY` (`id_copy`),
  KEY `USER` (`id_user`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

-- --------------------------------------------------------

--
-- Structure de la table `user`
--

DROP TABLE IF EXISTS `user`;
CREATE TABLE IF NOT EXISTS `user` (
  `id_user` int NOT NULL AUTO_INCREMENT,
  `firstname` varchar(150) CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci DEFAULT NULL,
  `lastname` varchar(150) CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci DEFAULT NULL,
  `mail` varchar(150) CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci DEFAULT NULL,
  `password` varchar(150) CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci DEFAULT NULL,
  `adress` varchar(250) CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci DEFAULT NULL,
  `avatar` varchar(1) CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci DEFAULT NULL,
  `role` tinyint(1) DEFAULT NULL,
  PRIMARY KEY (`id_user`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

-- --------------------------------------------------------

--
-- Structure de la table `work`
--

DROP TABLE IF EXISTS `work`;
CREATE TABLE IF NOT EXISTS `work` (
  `id_work` int NOT NULL AUTO_INCREMENT,
  `title` varchar(200) CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci DEFAULT NULL,
  `pict` varchar(100) CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci DEFAULT NULL,
  `extract` text CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci,
  `new` tinyint(1) DEFAULT NULL,
  `published_at` date DEFAULT NULL,
  `ISBN` varchar(50) CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci DEFAULT NULL,
  PRIMARY KEY (`id_work`) USING BTREE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

-- --------------------------------------------------------

--
-- Structure de la table `work_author`
--

DROP TABLE IF EXISTS `work_author`;
CREATE TABLE IF NOT EXISTS `work_author` (
  `author_id` int DEFAULT NULL,
  `work_id` int DEFAULT NULL,
  KEY `id_author` (`author_id`),
  KEY `id_work` (`work_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

-- --------------------------------------------------------

--
-- Structure de la table `work_category`
--

DROP TABLE IF EXISTS `work_category`;
CREATE TABLE IF NOT EXISTS `work_category` (
  `category_id` int DEFAULT NULL,
  `work_id` int DEFAULT NULL,
  KEY `id_category` (`category_id`),
  KEY `id_work` (`work_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

-- --------------------------------------------------------

--
-- Structure de la table `work_genre`
--

DROP TABLE IF EXISTS `work_genre`;
CREATE TABLE IF NOT EXISTS `work_genre` (
  `genre_id` int DEFAULT NULL,
  `work_id` int DEFAULT NULL,
  KEY `id_genre` (`genre_id`),
  KEY `id_work` (`work_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `copy`
--
ALTER TABLE `copy`
  ADD CONSTRAINT `copy_ibfk_2` FOREIGN KEY (`editor_id`) REFERENCES `editor` (`id_editor`) ON DELETE RESTRICT ON UPDATE RESTRICT,
  ADD CONSTRAINT `copy_ibfk_3` FOREIGN KEY (`work_id`) REFERENCES `work` (`id_work`) ON DELETE RESTRICT ON UPDATE RESTRICT;

--
-- Contraintes pour la table `loan`
--
ALTER TABLE `loan`
  ADD CONSTRAINT `loan_ibfk_2` FOREIGN KEY (`id_user`) REFERENCES `user` (`id_user`) ON DELETE RESTRICT ON UPDATE RESTRICT,
  ADD CONSTRAINT `loan_ibfk_3` FOREIGN KEY (`id_copy`) REFERENCES `copy` (`id_copy`) ON DELETE RESTRICT ON UPDATE RESTRICT;

--
-- Contraintes pour la table `work_author`
--
ALTER TABLE `work_author`
  ADD CONSTRAINT `work_author_ibfk_2` FOREIGN KEY (`author_id`) REFERENCES `author` (`id_author`) ON DELETE RESTRICT ON UPDATE RESTRICT,
  ADD CONSTRAINT `work_author_ibfk_3` FOREIGN KEY (`work_id`) REFERENCES `work` (`id_work`) ON DELETE RESTRICT ON UPDATE RESTRICT;

--
-- Contraintes pour la table `work_category`
--
ALTER TABLE `work_category`
  ADD CONSTRAINT `work_category_ibfk_3` FOREIGN KEY (`category_id`) REFERENCES `category` (`id_category`) ON DELETE RESTRICT ON UPDATE RESTRICT,
  ADD CONSTRAINT `work_category_ibfk_4` FOREIGN KEY (`work_id`) REFERENCES `work` (`id_work`) ON DELETE RESTRICT ON UPDATE RESTRICT;

--
-- Contraintes pour la table `work_genre`
--
ALTER TABLE `work_genre`
  ADD CONSTRAINT `work_genre_ibfk_3` FOREIGN KEY (`genre_id`) REFERENCES `genre` (`id_genre`) ON DELETE RESTRICT ON UPDATE RESTRICT,
  ADD CONSTRAINT `work_genre_ibfk_4` FOREIGN KEY (`work_id`) REFERENCES `work` (`id_work`) ON DELETE RESTRICT ON UPDATE RESTRICT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
