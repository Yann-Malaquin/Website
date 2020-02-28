-- phpMyAdmin SQL Dump
-- version 4.9.2
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3308
-- Généré le :  ven. 28 fév. 2020 à 16:27
-- Version du serveur :  8.0.18
-- Version de PHP :  7.3.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `eventsportif`
--

-- --------------------------------------------------------

--
-- Structure de la table `infrastructure`
--

DROP TABLE IF EXISTS `infrastructure`;
CREATE TABLE IF NOT EXISTS `infrastructure` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `address` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `latitude` double DEFAULT NULL,
  `longitude` double DEFAULT NULL,
  `city` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `infrastructure`
--

INSERT INTO `infrastructure` (`id`, `name`, `address`, `latitude`, `longitude`, `city`) VALUES
(1, 'Arena Sport Center', '31 Rue Ernest Macarez', 50.37251281738281, 3.5362491607666016, 'Valenciennes'),
(2, 'Gymnase Eisen', 'Rue des Cent-Têtes', 50.3648441, 3.530172, 'Valenciennes'),
(3, 'Stade du Hainaut', 'Avenue des Sports', 50.3475034, 3.529274, 'Valenciennes'),
(4, 'Stade des Présidents Cachera', '24 Rue Jean Jaurès', 50.3755, 3.393, 'Wallers'),
(5, 'Salle de Sports Pont de Pierre', 'Rue Henri Durre', 50.374813079833984, 3.398942470550537, 'Wallers');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
