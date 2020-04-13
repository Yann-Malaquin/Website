-- phpMyAdmin SQL Dump
-- version 4.9.2
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3308
-- Généré le :  lun. 13 avr. 2020 à 12:31
-- Version du serveur :  8.0.18
-- Version de PHP :  7.4.0

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
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `address` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `latitude` double NOT NULL,
  `longitude` double NOT NULL,
  `city` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `infrastructure`
--

INSERT INTO `infrastructure` (`id`, `name`, `address`, `latitude`, `longitude`, `city`) VALUES
(1, 'Arena Sport Center', '31 Rue Ernest Macarez', 50.37251281738281, 3.5362491607666016, 'Wallers'),
(2, 'Gymnase Eisen', 'Rue des Cent-Têtes', 50.3648441, 3.530172, 'Wallers'),
(3, 'Stade du Hainaut', 'Avenue des Sports', 50.3475034, 3.529274, 'Wallers'),
(4, 'Stade des Présidents Cachera', '24 Rue Jean Jaurès', 50.3755, 3.393, 'Wallers'),
(5, 'Salle de Sports Pont de Pierre', 'Rue Henri Durre', 50.374813079833984, 3.398942470550537, 'Wallers');

-- --------------------------------------------------------

--
-- Structure de la table `migration_versions`
--

DROP TABLE IF EXISTS `migration_versions`;
CREATE TABLE IF NOT EXISTS `migration_versions` (
  `version` varchar(14) COLLATE utf8mb4_unicode_ci NOT NULL,
  `executed_at` datetime NOT NULL COMMENT '(DC2Type:datetime_immutable)',
  PRIMARY KEY (`version`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `migration_versions`
--

INSERT INTO `migration_versions` (`version`, `executed_at`) VALUES
('20200301163150', '2020-03-01 16:31:59'),
('20200301164117', '2020-03-01 16:41:23'),
('20200303193552', '2020-03-03 19:36:01'),
('20200306134849', '2020-03-06 13:48:59'),
('20200306180842', '2020-03-06 18:08:52'),
('20200306181243', '2020-03-06 18:12:54'),
('20200306181911', '2020-03-06 18:19:16'),
('20200316102411', '2020-03-16 10:25:13');

-- --------------------------------------------------------

--
-- Structure de la table `profil`
--

DROP TABLE IF EXISTS `profil`;
CREATE TABLE IF NOT EXISTS `profil` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `firstname` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `phone` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `notificationmail` tinyint(1) DEFAULT '0',
  `notificationsms` tinyint(1) DEFAULT '0',
  `image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `UNIQ_E6D6B297A76ED395` (`user_id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `profil`
--

INSERT INTO `profil` (`id`, `user_id`, `email`, `name`, `firstname`, `phone`, `notificationmail`, `notificationsms`, `image`) VALUES
(4, 9, 'yann.malaquin@gmail.com', NULL, NULL, NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Structure de la table `sport_meeting`
--

DROP TABLE IF EXISTS `sport_meeting`;
CREATE TABLE IF NOT EXISTS `sport_meeting` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `infrastructure_id` int(11) NOT NULL,
  `sport` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `team_home` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `team_outside` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `city` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `meeting` datetime NOT NULL,
  `finish` tinyint(1) NOT NULL DEFAULT '0',
  `duration_meeting` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`),
  KEY `IDX_54A0AD93243E7A84` (`infrastructure_id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `sport_meeting`
--

INSERT INTO `sport_meeting` (`id`, `infrastructure_id`, `sport`, `type`, `team_home`, `team_outside`, `city`, `meeting`, `finish`, `duration_meeting`) VALUES
(1, 3, 'football', 'Ligue 1', 'JOWA', 'SAFC', 'Wallers', '2020-03-08 20:00:00', 0, 0),
(2, 1, 'tennis de table', 'Ligue B', 'Hérin USTT', 'Lille', 'Wallers', '2020-03-08 16:00:00', 0, 0),
(4, 5, 'basket', 'Ligue B', 'Lille', 'Denain', 'Wallers', '2020-03-08 21:00:00', 0, 0);

-- --------------------------------------------------------

--
-- Structure de la table `user`
--

DROP TABLE IF EXISTS `user`;
CREATE TABLE IF NOT EXISTS `user` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `username` varchar(32) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `cle` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `activate` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `user`
--

INSERT INTO `user` (`id`, `email`, `username`, `password`, `cle`, `activate`) VALUES
(9, 'yann.malaquin@gmail.com', 'Tchesarus', '$2y$13$cA46PbaEbuU5fPJgj9V8g.Mkz7ycHzSycr/m3rEK53SptUHEDUtrK', 'cb7634bffe1047f92fc4c665cd6f4751', 1);

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `profil`
--
ALTER TABLE `profil`
  ADD CONSTRAINT `FK_E6D6B297A76ED395` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`);

--
-- Contraintes pour la table `sport_meeting`
--
ALTER TABLE `sport_meeting`
  ADD CONSTRAINT `FK_54A0AD93243E7A84` FOREIGN KEY (`infrastructure_id`) REFERENCES `infrastructure` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
