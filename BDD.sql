-- phpMyAdmin SQL Dump
-- version 4.9.2
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3308
-- Généré le :  ven. 05 juin 2020 à 12:59
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
-- Structure de la table `favorites`
--

DROP TABLE IF EXISTS `favorites`;
CREATE TABLE IF NOT EXISTS `favorites` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `team_id` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `IDX_E46960F5A76ED395` (`user_id`),
  KEY `IDX_E46960F5296CD8AE` (`team_id`)
) ENGINE=InnoDB AUTO_INCREMENT=211 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `favorites`
--

INSERT INTO `favorites` (`id`, `user_id`, `team_id`) VALUES
(202, 1, 3),
(205, 1, 6),
(207, 1, 5),
(210, 1, 10);

-- --------------------------------------------------------

--
-- Structure de la table `infrastructure`
--

DROP TABLE IF EXISTS `infrastructure`;
CREATE TABLE IF NOT EXISTS `infrastructure` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `address` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `latitude` double NOT NULL,
  `longitude` double NOT NULL,
  `city` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=19 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `infrastructure`
--

INSERT INTO `infrastructure` (`id`, `name`, `address`, `latitude`, `longitude`, `city`) VALUES
(1, 'Arena Sport Center', '31 Rue Ernest Macarez', 50.37251281738281, 3.5362491607666016, 'Wallers'),
(2, 'Gymnase Eisen', 'Rue des Cent-Têtes', 50.3648441, 3.530172, 'Wallers'),
(3, 'Stade du Hainaut', 'Avenue des Sports', 50.3475034, 3.529274, 'Wallers'),
(4, 'Stade des Présidents Cachera', '24 Rue Jean Jaurès', 50.3755, 3.393, 'Wallers'),
(5, 'Salle de Sports Pont de Pierre', 'Rue Henri Durre', 50.374813079833984, 3.398942470550537, 'Wallers'),
(6, 'Stade Pierre-Mauroy', '261 boulevard de Tournai', 50.6136516, 3.1316559, 'Wallers'),
(7, 'Parc des Princes', '24, rue du Commandant-Guilbaut', 48.8413889, 2.2530555555555556, 'Paris'),
(9, 'Orange Vélodrome', '3 boulevard Michelet', 43.2697222, 5.395833333333334, 'Marseille'),
(10, 'Roazhon PArk', '111, rue de Lorient', 48.1075, -1.7127777777777777, 'Rennes'),
(11, 'Stade Chaban-Delmas', 'Place Johnston', 44.8291667, -0.5983333333333334, 'Bordeaux'),
(12, 'Matmut Stadium Gerland', '393, avenue Jean-Jaurès', 45.7238889, 4.8325, 'Lyon'),
(13, 'Paris La Défense Arena', '99 Jardins de l\'Arche', 48.8955556, 2.229444444444445, 'Nanterre'),
(14, 'Stade Mayol', 'Quai Lafontan', 43.1188889, 5.9366666666666665, 'Toulon'),
(15, 'Salle Pierre-de-Coubertin', '82, avenue Georges-Lafont', 48.8352778, 2.256111111111111, 'Paris'),
(16, 'Palais des sports de Beaulieu', '5, rue André-Tardieu', 47.2094444, -1.5366666666666666, 'Nantes'),
(17, 'Le Parnasse', '160 Avenue du Languedoc', 43.8169444, 4.363333333333333, 'Nîmes'),
(18, 'Palais des sports René-Bougnol', '1000 avenue du Val-de-Montferrand', 43.6383333, 3.8738888888888887, 'Montpellier');

-- --------------------------------------------------------

--
-- Structure de la table `migration_versions`
--

DROP TABLE IF EXISTS `migration_versions`;
CREATE TABLE IF NOT EXISTS `migration_versions` (
  `version` varchar(14) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
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
('20200316102411', '2020-03-16 10:25:13'),
('20200414123104', '2020-04-14 12:31:19'),
('20200414125502', '2020-04-14 12:55:14'),
('20200415123204', '2020-04-15 12:32:16'),
('20200415123259', '2020-04-15 12:33:06'),
('20200416123559', '2020-04-16 12:36:18'),
('20200417131236', '2020-04-17 13:12:46'),
('20200420135233', '2020-04-20 13:52:47'),
('20200421134957', '2020-04-21 13:50:04'),
('20200421135736', '2020-04-21 13:57:43'),
('20200422181956', '2020-04-22 18:20:04'),
('20200518115812', '2020-05-18 11:58:23'),
('20200518120157', '2020-05-18 12:02:10'),
('20200603160015', '2020-06-03 16:00:24');

-- --------------------------------------------------------

--
-- Structure de la table `player`
--

DROP TABLE IF EXISTS `player`;
CREATE TABLE IF NOT EXISTS `player` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `team_id` int(11) DEFAULT NULL,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `firstname` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `age` int(11) NOT NULL,
  `nationality` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `position` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `number` int(11) NOT NULL,
  `order_display` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `IDX_98197A65296CD8AE` (`team_id`)
) ENGINE=InnoDB AUTO_INCREMENT=392 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `player`
--

INSERT INTO `player` (`id`, `team_id`, `name`, `firstname`, `age`, `nationality`, `image`, `position`, `number`, `order_display`) VALUES
(1, 3, 'Konaté', 'Hillel', 25, 'Côte d\'Ivoire', NULL, 'Gardien', 1, 0),
(2, 3, 'Kocik', 'Nicolas', 21, 'France', NULL, 'Gardien', 30, 0),
(3, 3, 'Abeid', 'Aly', 22, 'Mauritanie', NULL, 'Défenseur', 2, 1),
(4, 3, 'Brassier', 'Lilian', 20, 'France', NULL, 'Défenseur', 3, 1),
(5, 3, 'Spano-Rahou', 'Maxime', 25, 'Algérie', NULL, 'Défenseur', 5, 1),
(6, 3, 'd\'Almeida', 'Sessi', 24, 'Bénin', NULL, 'Milieu', 4, 2),
(7, 3, 'Arib', 'Gaëtan', 20, 'France', NULL, 'Milieu', 6, 2),
(8, 3, 'Fedele', 'Matteo', 27, 'Suisse', NULL, 'Milieu', 8, 2),
(9, 3, 'Hein', 'Gauthier', 23, 'France', NULL, 'Milieu', 10, 2),
(10, 3, 'Ambri', 'Steve', 22, 'France', NULL, 'Attaquant', 7, 3),
(11, 3, 'Chevalier', 'Teddy', 32, 'France', NULL, 'Attaquant', 9, 3),
(12, 3, 'Prior', 'Jérôme', 24, 'France', NULL, 'Gardien', 40, 0),
(13, 3, 'Cuffaut', 'Joffrey', 32, 'France', NULL, 'Défenseur', 14, 1),
(14, 3, 'Quénum', 'Chérif', 26, 'France', NULL, 'Défenseur', 15, 1),
(15, 3, 'Dabo', 'Elhadj', 24, 'Sénégal', NULL, 'Défenseur', 19, 1),
(16, 3, 'Linguet', 'Allan', 20, 'France', NULL, 'Défenseur', 24, 1),
(17, 3, 'Ntim', 'Emmanuel', 24, 'Ghana', NULL, 'Défenseur', 25, 1),
(18, 3, 'Bong', 'Frédéric', 32, 'Cameroun', NULL, 'Défenseur', 27, 1),
(19, 3, 'Dos Santos', 'Laurent', 27, 'France', NULL, 'Défenseur', 28, 1),
(20, 3, 'Ousame', 'Abdoulaye', 20, 'France', NULL, 'Défenseur', 33, 1),
(21, 3, 'Chergui', 'Malek', 31, 'France', NULL, 'Milieu', 11, 2),
(22, 3, 'Masson', 'Julien', 21, 'France', NULL, 'Milieu', 13, 2),
(23, 3, 'Boutouatou', 'Aymen', 19, 'France', NULL, 'Milieu', 17, 2),
(24, 3, 'Siby', 'Mahamé', 23, 'France', NULL, 'Milieu', 20, 2),
(25, 3, 'Diliberto', 'Noah', 18, 'France', NULL, 'Milieu', 21, 2),
(26, 3, 'Moukandjo', 'Benjamin', 31, 'Cameroun', NULL, 'Attaquant', 12, 3),
(27, 3, 'Guillaume', 'Baptiste', 24, 'Belgique', NULL, 'Attaquant', 18, 3),
(28, 3, 'Cabral', 'Kévin', 20, 'France', NULL, 'Attaquant', 26, 3),
(29, 2, 'Jardim', 'Léo', 25, 'Brésil', NULL, 'Gardien', 1, 0),
(31, 2, 'Chevalier', 'Lucas', 18, 'France', NULL, 'Gardien', 30, 0),
(32, 2, 'Djaló', 'Tiago', 20, 'Portugal', NULL, 'Défenseur', 2, 1),
(33, 2, 'Agouzoul', 'Saad', 22, 'Maroc', NULL, 'Défenseur', 3, 1),
(34, 2, '-', 'Gabriel', 22, 'Brésil', NULL, 'Défenseur', 4, 1),
(35, 2, 'Fonte', 'José', 36, 'Portugal', NULL, 'Défenseur', 6, 1),
(36, 2, 'Çelik', 'Zeki', 23, 'Turquie', NULL, 'Défenseur', 17, 1),
(37, 2, 'Pied', 'Jérémy', 31, 'France', NULL, 'Défenseur', 26, 1),
(38, 2, 'Mandava', 'Reinildo', 26, 'Mozambique', NULL, 'Défenseur', 28, 1),
(39, 2, 'Bradaric', 'Domagoj', 20, 'Croatie', NULL, 'Défenseur', 29, 1),
(40, 2, '-', 'Xeka', 25, 'Portugal', NULL, 'Milieu', 8, 2),
(41, 2, 'Ikoné', 'Jonathan', 21, 'France', NULL, 'Milieu', 10, 2),
(42, 2, 'Yazici', 'Yusuf', 23, 'Turquie', NULL, 'Milieu', 12, 2),
(43, 2, 'Sanches', 'Renato', 22, 'Portugal', NULL, 'Milieu', 18, 2),
(44, 2, 'Gaitán', 'Nicolás', 32, 'Argentine', NULL, 'Milieu', 20, 2),
(45, 2, 'André', 'Benjamin', 29, 'France', NULL, 'Milieu', 21, 2),
(46, 2, 'Soumaré', 'Boubakary', 21, 'France', NULL, 'Milieu', 24, 2),
(47, 2, 'Osimhen', 'Victor', 21, 'Nigéria', NULL, 'Attaquant', 7, 3),
(48, 2, 'Rémy', 'Loïc', 33, 'France', NULL, 'Attaquant', 9, 3),
(49, 2, 'Araújo', 'Luiz', 23, 'Brésil', NULL, 'Attaquant', 11, 3),
(50, 2, 'Bamba', 'Jonathan', 24, 'France', NULL, 'Attaquant', 14, 3),
(51, 2, 'Weah', 'Tomthy', 20, 'États Unis', NULL, 'Attaquant', 22, 3),
(52, 2, 'Maignan', 'Mike', 24, 'France', NULL, 'Gardien', 16, 0),
(53, 5, 'Navas', 'Keylor', 33, 'Costa Rica', NULL, 'Gardien', 1, 0),
(54, 5, 'Rico', 'Sergio', 26, 'Espagne', NULL, 'Gardien', 16, 0),
(55, 5, 'Bulka', 'Marcin', 20, 'Pologne', NULL, 'Gardien', 30, 0),
(56, 5, 'Innocent', 'Garissone', 20, 'France', NULL, 'Gardien', 40, 0),
(57, 5, 'Silva', 'Thiago', 35, 'Brésil', NULL, 'Défenseur', 2, 1),
(58, 5, 'Kimpembe', 'Presnel', 24, 'France', NULL, 'Défenseur', 3, 1),
(59, 5, 'Kehrer', 'Thilo', 23, 'Allemagne', NULL, 'Défenseur', 4, 1),
(60, 5, '-', 'Marquinhos', 26, 'Brésil', NULL, 'Défenseur', 5, 1),
(61, 5, 'Meunier', 'Thomas', 28, 'Belgique', NULL, 'Défenseur', 12, 1),
(62, 5, 'Bernat', 'Juan', 27, 'Espagne', NULL, 'Défenseur', 14, 1),
(63, 5, 'Kurzawa', 'Layvin', 27, 'France', NULL, 'Défenseur', 20, 1),
(64, 5, 'Diallo', 'Abdou', 24, 'France', NULL, 'Défenseur', 22, 1),
(65, 5, 'Bakker', 'Mitchei', 19, 'Pays-Bas', NULL, 'Défenseur', 25, 1),
(66, 5, 'Dagba', 'Colin', 21, 'France', NULL, 'Défenseur', 31, 1),
(67, 5, 'Kouassi', 'Tanguy', 17, 'France', NULL, 'Défenseur', 33, 1),
(68, 5, 'Mbe So', 'Loïc ', 18, 'France', NULL, 'Défenseur', 36, 1),
(69, 5, 'Verratti', 'Marco', 27, 'Italie', NULL, 'Milieu', 6, 2),
(70, 5, 'Paredes', 'Leandro', 25, 'Argentine', NULL, 'Milieu', 8, 2),
(71, 5, 'Di Maria', 'Angel', 32, 'Argentine', NULL, 'Milieu', 11, 2),
(72, 5, 'Sarabia', 'Pablo', 28, 'Espagne', NULL, 'Milieu', 19, 2),
(73, 5, 'Herrera', 'Ander', 30, 'Espagne', NULL, 'Milieu', 21, 2),
(74, 5, 'Draxler', 'Julian', 26, 'Allemagne', NULL, 'Milieu', 23, 2),
(75, 5, 'Gueye', 'Idrissa', 30, 'Sénégal', NULL, 'Milieu', 27, 2),
(76, 5, 'Aouchiche', 'Adil', 17, 'France', NULL, 'Milieu', 38, 2),
(77, 5, 'Mbappé', 'Kylian', 21, 'France', NULL, 'Attaquant', 7, 3),
(78, 5, 'Cavani', 'Edinson', 33, 'Uruguay', NULL, 'Attaquant', 9, 3),
(79, 5, '-', 'Neymar', 28, 'Brésil', NULL, 'Attaquant', 19, 3),
(80, 5, 'Choup-Moting', 'Eric Maxim', 31, 'Cameroun', NULL, 'Attaquant', 17, 3),
(81, 5, 'Icardi', 'Mauro', 27, 'Argentine', NULL, 'Attaquant', 18, 3),
(82, 6, 'Ngapandouetnbu', 'Simon', 17, 'Cameroun', NULL, 'Gardien', 1, 0),
(83, 6, 'Pelé', 'Yohann', 37, 'France', NULL, 'Gardien', 16, 0),
(84, 6, 'Mandanda', 'Steve', 35, 'France', NULL, 'Gardien', 30, 0),
(85, 6, 'Dia', 'Ahmadou', 20, 'France', NULL, 'Gardien', 40, 0),
(86, 6, 'Sakai', 'Hiroki', 30, 'Japon', NULL, 'Défenseur', 2, 1),
(87, 6, '-', 'Alvaro', 30, 'Espagne', NULL, 'Défenseur', 3, 1),
(88, 6, 'Caleta-Car', 'Duje', 23, 'Croatie', NULL, 'Défenseur', 15, 1),
(89, 6, 'Sarr', 'Bouna', 28, 'France', NULL, 'Défenseur', 17, 1),
(90, 6, 'Amavi', 'Jordan', 26, 'France', NULL, 'Défenseur', 18, 1),
(91, 6, 'Mohamed', 'Abdallah Ali', 21, 'Comores', NULL, 'Défenseur', 31, 1),
(92, 6, 'Perrin', 'Lucas', 21, 'France', NULL, 'Défenseur', 32, 1),
(93, 6, 'Kamara', 'Boubacar', 20, 'France', NULL, 'Milieu', 4, 2),
(94, 6, 'Radonjic', 'Nemanja', 24, 'Serbie', NULL, 'Milieu', 7, 2),
(95, 6, 'Sanson', 'Morgan', 25, 'France', NULL, 'Milieu', 8, 2),
(96, 6, 'Payet', 'Dimitri', 33, 'France', NULL, 'Milieu', 10, 2),
(97, 6, 'Strootman', 'Kevin', 30, 'Pays-Bas', NULL, 'Milieu', 12, 2),
(98, 6, 'Rongier', 'Valentin', 25, 'France', NULL, 'Milieu', 21, 2),
(99, 6, 'Sertic', 'Grégory', 30, 'France', NULL, 'Milieu', 22, 2),
(100, 6, 'Khaoui', 'Saîf-Eddine', 25, 'Tunisie', NULL, 'Milieu', 24, 2),
(101, 6, 'Thauvin', 'Florian', 27, 'France', NULL, 'Milieu', 26, 2),
(102, 6, 'Lopez', 'Maxime', 22, 'France', NULL, 'Milieu', 27, 2),
(103, 6, 'Philponeau', 'Alexandre', 20, 'France', NULL, 'Milieu', 34, 2),
(104, 6, 'Aké', 'Marley', 19, 'France', NULL, 'Milieu', 36, 2),
(105, 6, 'Benedetto', 'Dario', 30, 'Argentine', NULL, 'Attaquant', 9, 3),
(106, 6, 'Germain', 'Valère', 30, 'France', NULL, 'Attaquant', 28, 3),
(107, 6, 'Chabrolle', 'Florian', 22, 'France', NULL, 'Attaquant', 29, 3),
(108, 7, 'Salin', 'Romain', 35, 'France', NULL, 'Gardien', 1, 0),
(109, 7, 'Mendy', 'Édouard', 28, 'Sénégal', NULL, 'Gardien', 16, 0),
(110, 7, 'Bonet', 'Pépé', 17, 'France', NULL, 'Gardien', 30, 0),
(111, 7, 'Mandanda', 'Riffi', 27, 'Congo', NULL, 'Gardien', 40, 0),
(112, 7, 'Da Silva', 'Damien', 32, 'France', NULL, 'Défenseur', 3, 1),
(113, 7, 'Nyamsi', 'Gerzino', 23, 'France', NULL, 'Défenseur', 4, 1),
(114, 7, 'Morel', 'Jérémy', 36, 'Madagascar', NULL, 'Défenseur', 15, 1),
(115, 7, 'Faitout', 'Maouassa', 21, 'France', NULL, 'Défenseur', 17, 1),
(116, 7, 'Gnagnon', 'Joris', 23, 'France', NULL, 'Défenseur', 21, 1),
(117, 7, 'Gélin', 'Jérémy', 23, 'France', NULL, 'Défenseur', 26, 1),
(118, 7, 'Traoré', 'Hamari', 28, 'Mali', NULL, 'Défenseur', 27, 1),
(119, 7, 'Boey', 'Sacha', 19, 'France', NULL, 'Défenseur', 31, 1),
(120, 7, 'Soppy', 'Brandon', 18, 'France', NULL, 'Défenseur', 38, 1),
(121, 7, 'Grenier', 'Clément', 29, 'France', NULL, 'Milieu', 8, 2),
(122, 7, 'Guitane', 'Rafik', 21, 'France', NULL, 'Milieu', 10, 2),
(123, 7, 'Siliki', 'James Léa', 23, 'France', NULL, 'Milieu', 12, 2),
(124, 7, 'Bourigeaud', 'Benjamin', 26, 'France', NULL, 'Milieu', 14, 2),
(125, 7, 'Camavinga', 'Eduardo', 17, 'France', NULL, 'Milieu', 18, 2),
(126, 7, 'Tait', 'Flavien', 27, 'France', NULL, 'Milieu', 20, 2),
(127, 7, 'Nzonzi', 'Steven', 31, 'France', NULL, 'Milieu', 25, 2),
(128, 7, 'Martin', 'Jonas', 30, 'France', NULL, 'Milieu', 28, 2),
(129, 7, 'Gboho', 'Yann', 19, 'France', NULL, 'Milieu', 34, 2),
(130, 7, '-', 'Raphinha', 23, 'Brésil', NULL, 'Attaquant', 7, 3),
(131, 7, 'Siebatcheu', 'Jordan', 24, 'France', NULL, 'Attaquant', 9, 3),
(132, 7, 'Niang', 'M\'Baye', 25, 'Sénégal', NULL, 'Attaquant', 11, 3),
(133, 7, 'Güçlü', 'Metehan', 21, 'Turquie', NULL, 'Attaquant', 19, 3),
(134, 7, 'Del Castillo', 'Romain', 24, 'France', NULL, 'Attaquant', 22, 3),
(135, 7, 'Hunou', 'Adrien', 26, 'France', NULL, 'Attaquant', 23, 3),
(136, 7, 'Da Cunha', 'Lucas', 18, 'France', NULL, 'Attaquant', 32, 3),
(137, 7, 'Rutter', 'Georginio', 18, 'France', NULL, 'Attaquant', 35, 3),
(138, 8, 'Poirot', 'Jefferson', 27, 'France', NULL, 'Pilier', 0, 0),
(139, 8, 'Tabidze', 'Lasha', 22, 'Géorgie', NULL, 'Pilier', 0, 0),
(140, 8, 'Delboulbès', 'Laurent', 33, 'France', NULL, 'Pilier', 0, 0),
(141, 8, 'Kaulashvili', 'Lekso', 27, 'Géorgie', NULL, 'Pilier', 0, 0),
(142, 8, 'Ravai', 'Peni', 29, 'Fidji', NULL, 'Pilier', 0, 0),
(143, 8, 'Païva', 'Thierry', 24, 'France', NULL, 'Pilier', 0, 0),
(144, 8, 'Cobilas', 'Vadim', 36, 'Moldavie', NULL, 'Pilier', 0, 0),
(145, 8, 'El Fakir', 'Zakaria', 23, 'France', NULL, 'Pilier', 0, 0),
(146, 8, 'Pélissié', 'Adrien', 29, 'France', NULL, 'Talonneur', 0, 1),
(147, 8, 'Maynadier', 'Clément', 31, 'France', NULL, 'Talonneur', 0, 1),
(148, 8, 'Dufour', 'Florian', 22, 'France', NULL, 'Talonneur', 0, 1),
(149, 8, 'Ghiraldini', 'Leonardo', 35, 'Italie', NULL, 'Talonneur', 0, 1),
(150, 8, 'Flanquart', 'Alexandre', 30, 'France', NULL, '2ème ligne', 0, 2),
(151, 8, 'Cazeaux', 'Cyril', 25, 'France', NULL, '2ème ligne', 0, 2),
(152, 8, 'Marais', 'Jandré', 30, 'Afrique du Sud', NULL, '2ème ligne', 0, 2),
(153, 8, 'Douglas', 'Kane', 31, 'Australie', NULL, '2ème ligne', 0, 2),
(154, 8, 'Tutaia', 'Masalosalo', 36, 'Australie', NULL, '2ème ligne', 0, 2),
(155, 8, 'Amosa', 'Afa', 29, 'Australie', NULL, '3ème ligne', 0, 3),
(156, 8, 'Roumat', 'Alexandre', 22, 'France', NULL, '3ème ligne', 0, 3),
(157, 8, 'Gorgadze', 'Béka', 24, 'Géorgie', NULL, '3ème ligne', 0, 3),
(158, 8, 'Woki', 'Cameron', 21, 'France', NULL, '3ème ligne', 0, 3),
(159, 8, 'Diaby', 'Mahamadou', 29, 'France', NULL, '3ème ligne', 0, 3),
(160, 8, 'Tauleigne', 'Marco', 26, 'France', NULL, '3ème ligne', 0, 3),
(161, 8, 'Higginbotham', 'Scott', 33, 'Australie', NULL, '3ème ligne', 0, 3),
(162, 8, 'Gimber', 'Jules', 22, 'France', NULL, 'Mêlée', 0, 4),
(163, 8, 'Lucu', 'Maxime', 27, 'France', NULL, 'Mêlée', 0, 4),
(164, 8, 'Lescourgues', 'Yann', 29, 'France', NULL, 'Mêlée', 0, 4),
(165, 8, 'Botica', 'Ben', 30, 'Australie', NULL, 'Ouverture', 0, 5),
(166, 8, 'Méret', 'Lucas', 25, 'France', NULL, 'Ouverture', 0, 5),
(167, 8, 'Jalibert', 'Matthieu', 21, 'France', NULL, 'Ouverture', 0, 5),
(168, 8, 'Dubié', 'Jean-Baptiste', 30, 'France', NULL, 'Centre', 0, 6),
(169, 8, 'Lamerat', 'Rémi', 30, 'France', NULL, 'Centre', 0, 6),
(170, 8, 'Radradra', 'Semi', 27, 'Fidji', NULL, 'Centre', 0, 6),
(171, 8, 'Tamanivalu', 'Set', 27, 'Fidji', NULL, 'Centre', 0, 6),
(172, 8, 'Seuteni', 'Ulupano', 26, 'Australie', NULL, 'Centre', 0, 6),
(173, 8, 'Connor', 'Blair', 31, 'Australie', NULL, 'Ailier', 0, 7),
(174, 8, 'Plazy', 'Nicolas', 26, 'France', NULL, 'Ailier', 0, 7),
(175, 8, 'Cordero', 'Santiago', 26, 'Argentine', NULL, 'Ailier', 0, 7),
(176, 8, 'Cros', 'Geoffrey', 23, 'France', NULL, 'Arrière', 0, 8),
(177, 8, 'Ducuing', 'Nans', 28, 'France', NULL, 'Arrière', 0, 8),
(178, 8, 'Buros', 'Romain', 22, 'France', NULL, 'Arrière', 0, 8),
(179, 9, 'Ric', 'Clément', 31, 'France', NULL, 'Pilier', 0, 0),
(180, 9, 'Bamba', 'Demba', 22, 'France', NULL, 'Pilier', 0, 0),
(181, 9, 'Gomez Kodela', 'Francisco', 34, 'Argentine', NULL, 'Pilier', 0, 0),
(183, 9, 'Kaabèche', 'Hamza', 23, 'France', NULL, 'Pilier', 0, 0),
(184, 9, 'Yameogo', 'Kévin', 23, 'France', NULL, 'Pilier', 0, 0),
(185, 9, 'Chaume', 'Raphaël', 31, 'France', NULL, 'Pilier', 0, 0),
(186, 9, 'Devisme', 'Vivien', 28, 'France', NULL, 'Pilier', 0, 0),
(187, 9, 'Chiocci', 'Xavier', 30, 'France', NULL, 'Pilier', 0, 0),
(188, 9, 'Alkhazashvili', 'Badri', 24, 'Géorgie', NULL, 'Talonneur', 0, 1),
(189, 9, 'Maurouard', 'Jérémie', 27, 'France', NULL, 'Talonneur', 0, 1),
(190, 9, 'Ivaldi', 'Mickaël', 30, 'France', NULL, 'Talonneur', 0, 1),
(191, 9, 'Oosthuizen', 'Etienne', 27, 'Afrique du Sud', NULL, '2ème ligne', 0, 2),
(192, 9, 'Lambey', 'Félix', 26, 'France', NULL, '2ème ligne', 0, 2),
(193, 9, 'Roodt', 'Hendrik', 27, 'Afrrique du Sud', NULL, '2ème ligne', 0, 2),
(194, 9, 'Géraci', 'Kilian', 21, 'France', NULL, '2ème ligne', 0, 2),
(195, 9, 'Rolland', 'Martial', 21, 'France', NULL, '2ème ligne', 0, 2),
(196, 9, 'Bruni', 'Virgile', 31, 'France', NULL, '2ème ligne', 0, 2),
(197, 9, 'Fearns', 'Carl', 31, 'Angleterre', NULL, '3ème ligne', 0, 3),
(198, 9, 'Cretin', 'Dylan', 23, 'France', NULL, '3ème ligne', 0, 3),
(199, 9, 'Puricelli', 'Julien', 38, 'France', NULL, '3ème ligne', 0, 3),
(200, 9, 'Gill', 'Liam', 28, 'Australie', NULL, '3ème ligne', 0, 3),
(201, 9, 'Goujon', 'Loann', 31, 'France', NULL, '3ème ligne', 0, 3),
(202, 9, 'Sobéla', 'Patrick', 27, 'France', NULL, '3ème ligne', 0, 3),
(203, 9, 'Halaifonua', 'Tanginoa', 23, 'Tonga', NULL, '3ème ligne', 0, 3),
(204, 9, 'Couilloud', 'Baptiste', 22, 'France', NULL, 'Mêlée', 0, 4),
(205, 9, 'Pélissié', 'Jonathan', 32, 'France', NULL, 'Mêlée', 0, 4),
(206, 9, 'Hidalgo-Clyne', 'Sam', 38, 'Écosse', NULL, 'Mêlée', 0, 4),
(207, 9, 'Doussain', 'Jean-Marc', 29, 'France', NULL, 'Ouverture', 0, 5),
(208, 9, 'Wisniewski', 'Jonathan', 34, 'France', NULL, 'Ouverture', 0, 5),
(209, 9, 'Fernandez', 'Patricio', 25, 'Argentine', NULL, 'Ouverture', 0, 5),
(210, 9, 'Ngatai', 'Charlie', 29, 'Australie', NULL, 'Centre', 0, 6),
(211, 9, 'Barassi', 'Pierre-Louis', 34, 'France', NULL, 'Centre', 0, 6),
(212, 9, 'Wulf', 'Rudi', 36, 'Samoa', NULL, 'Centre', 0, 6),
(213, 9, 'Regard', 'Thibaut', 26, 'France', NULL, 'Centre', 0, 6),
(214, 9, 'Tuisova', 'Josua', 26, 'Fidji', NULL, 'Ailier', 0, 7),
(215, 9, 'Nakaitaci', 'Noa', 29, 'Fidji', NULL, 'Ailier', 0, 7),
(216, 9, 'Mignot', 'Xavier', 26, 'France', NULL, 'Ailier', 0, 7),
(217, 9, 'Laporte', 'Clément', 22, 'France', NULL, 'Arrière', 0, 8),
(218, 9, 'Button', 'Jean-Marcellin', 26, 'France', NULL, 'Arrière', 0, 8),
(219, 9, 'Arnold', 'Toby', 26, 'Australie', NULL, 'Arrière', 0, 8),
(220, 10, 'Oz', 'Ali', 22, 'France', NULL, 'Pilier', 0, 0),
(221, 10, 'Tameifuna', 'Ben', 28, 'France', NULL, 'Pilier', 0, 0),
(222, 10, 'Gomes Sa', 'Cedate', 26, 'Portugal', NULL, 'Pilier', 0, 0),
(223, 10, 'Ben Arous', 'Eddy', 29, 'France', NULL, 'Pilier', 0, 0),
(224, 10, 'Colombe', 'Georges-Henri', 22, 'France', NULL, 'Pilier', 0, 0),
(225, 10, 'Gogichashvili', 'Guram', 21, 'Géorgie', NULL, 'Pilier', 0, 0),
(226, 10, 'Oz', 'Ali', 22, 'France', NULL, 'Pilier', 0, 0),
(227, 10, 'Tameifuna', 'Ben', 28, 'France', NULL, 'Pilier', 0, 0),
(228, 10, 'Gomes Sa', 'Cedate', 26, 'Portugal', NULL, 'Pilier', 0, 0),
(229, 10, 'Ben Arous', 'Eddy', 29, 'France', NULL, 'Pilier', 0, 0),
(230, 10, 'Colombe', 'Georges-Henri', 22, 'France', NULL, 'Pilier', 0, 0),
(231, 10, 'Gogichashvili', 'Guram', 21, 'Géorgie', NULL, 'Pilier', 0, 0),
(232, 10, 'Kolingar', 'Hassane', 22, 'France', NULL, 'Pilier', 0, 0),
(233, 10, 'Oz', 'Ali', 22, 'France', NULL, 'Pilier', 0, 0),
(234, 10, 'Tameifuna', 'Ben', 28, 'France', NULL, 'Pilier', 0, 0),
(235, 10, 'Gomes Sa', 'Cedate', 26, 'Portugal', NULL, 'Pilier', 0, 0),
(236, 10, 'Ben Arous', 'Eddy', 29, 'France', NULL, 'Pilier', 0, 0),
(237, 10, 'Colombe', 'Georges-Henri', 22, 'France', NULL, 'Pilier', 0, 0),
(238, 10, 'Gogichashvili', 'Guram', 21, 'Géorgie', NULL, 'Pilier', 0, 0),
(239, 10, 'Kolingar', 'Hassane', 22, 'France', NULL, 'Pilier', 0, 0),
(240, 10, 'Kakovin', 'Vasil', 30, 'Géorgie', NULL, 'Pilier', 0, 0),
(241, 10, 'Chat', 'Camille', 24, 'France', NULL, 'Talonneur', 0, 1),
(242, 10, 'Hamel', 'Issam', 22, 'France', NULL, 'Talonneur', 0, 1),
(243, 10, 'Le Guen', 'Kévin', 29, 'France', NULL, 'Talonneur', 0, 1),
(244, 10, 'Baubigny', 'Teddy', 21, 'France', NULL, 'Talonneur', 0, 1),
(245, 10, 'Le Roux', 'Bernard', 31, 'Afrique du Sud', NULL, '2ème ligne', 0, 2),
(246, 10, 'Palu', 'Boris', 24, 'France', NULL, '2ème ligne', 0, 2),
(247, 10, 'Bird', 'Dominic', 29, 'Australie', NULL, '2ème ligne', 0, 2),
(248, 10, 'Ryan', 'Donnacha', 36, 'Irlande', NULL, '2ème ligne', 0, 2),
(249, 10, 'Johnson', 'Ewan', 20, 'Écosse', NULL, '2ème ligne', 0, 2),
(250, 10, 'Claasen', 'Antonie', 35, 'Afrique du Sud', NULL, '3ème ligne', 0, 3),
(251, 10, 'Chouzenoux', 'Baptiste', 26, 'France', NULL, '3ème ligne', 0, 3),
(252, 10, 'Sanconnie', 'Fabien', 25, 'France', NULL, '3ème ligne', 0, 3),
(253, 10, 'Diallo', 'Ibrahim', 22, 'France', NULL, '3ème ligne', 0, 3),
(254, 10, 'Dyer', 'Johnny', 28, 'Fidji', NULL, '3ème ligne', 0, 3),
(255, 10, 'Joseph', 'Jordan', 19, 'France', NULL, '3ème ligne', 0, 3),
(256, 10, 'Lauret', 'Wenceslas', 31, 'France', NULL, '3ème ligne', 0, 3),
(257, 10, 'Tanga-Mangene', 'Yoan', 23, 'France', NULL, '3ème ligne', 0, 3),
(258, 10, 'Gibert', 'Antoine', 22, 'France', NULL, 'Mêlée', 0, 4),
(259, 10, 'Machenaud', 'MAxime', 31, 'France', NULL, 'Mêlée', 0, 4),
(260, 10, 'Iribaren', 'Teddy', 29, 'France', NULL, 'Mêlée', 0, 4),
(261, 10, 'Volavola', 'Ben', 29, 'Fidji', NULL, 'Ouverture', 0, 5),
(262, 10, 'Russell', 'Finn', 27, 'Écosse', NULL, 'Ouverture', 0, 5),
(263, 10, 'Trinh-Duc', 'François', 33, 'France', NULL, 'Ouverture', 0, 5),
(264, 10, 'Diaz Bonilla', 'Joaquin', 31, 'Argentine', NULL, 'Ouverture', 0, 5),
(265, 10, 'Chavancy', 'Henry', 32, 'France', NULL, 'Centre', 0, 6),
(266, 10, 'Klemenczak', 'Olivier', 24, 'France', NULL, 'Centre', 0, 6),
(267, 10, 'Vakatawa', 'Virimi', 28, 'Fidji', NULL, 'Centre', 0, 6),
(268, 10, 'Laborde', 'Dorian', 23, 'France', NULL, 'Ailier', 0, 7),
(269, 10, 'Imhoff', 'Juan', 32, 'Argentine', NULL, 'Ailier', 0, 7),
(270, 10, 'Zebo', 'Simon', 30, 'Irlande', NULL, 'Ailier', 0, 7),
(271, 10, 'Thomas', 'Teddy', 26, 'France', NULL, 'Ailier', 0, 7),
(272, 10, 'Dulin', 'Brice', 30, 'France', NULL, 'Arrière', 0, 8),
(273, 10, 'Dupichot', 'Louis', 24, 'France', NULL, 'Arrière', 0, 8),
(274, 11, 'Gigashvili', 'Beka', 28, 'Géorgie', NULL, 'Pilier', 0, 0),
(275, 11, 'Devaux', 'Bruce', 23, 'France', NULL, 'Pilier', 0, 0),
(276, 11, 'Setiano', 'Emerick', 23, 'France', NULL, 'Pilier', 0, 0),
(277, 11, 'Fresia', 'Florian', 28, 'France', NULL, 'Pilier', 0, 0),
(278, 11, 'Gros', 'Jean-Baptiste', 21, 'France', NULL, 'Pilier', 0, 0),
(279, 11, 'Chelidze', 'Luka', 29, 'Géorgie', NULL, 'Pilier', 0, 0),
(280, 11, 'Van Der Merwe', 'Marcel', 29, 'France', NULL, 'Pilier', 0, 0),
(281, 11, 'Taofifenua', 'Sébastien', 28, 'France', NULL, 'Pilier', 0, 0),
(282, 11, 'Étrillard', 'Anthony', 27, 'France', NULL, 'Talonneur', 0, 1),
(283, 11, 'Soury', 'Bastien', 25, 'France', NULL, 'Talonneur', 0, 1),
(284, 11, 'Tolofua', 'Christopher', 267, 'France', NULL, 'Talonneur', 0, 1),
(285, 11, 'Alainu\'uese', 'Brian', 26, 'Samoa', NULL, '2ème ligne', 0, 2),
(286, 11, 'Vernet', 'Corentin', 23, 'France', NULL, '2ème ligne', 0, 2),
(287, 11, 'Etzebeth', 'Eben', 28, 'Afrique du Sud', NULL, '2ème ligne', 0, 2),
(288, 11, 'Gorgodze', 'Mamuka', 35, 'Géorgie', NULL, '2ème ligne', 0, 2),
(289, 11, 'Taofifenua', 'Romain', 29, 'France', NULL, '2ème ligne', 0, 2),
(290, 11, 'Rebbadj', 'Swan', 25, 'France', NULL, '2ème ligne', 0, 2),
(291, 11, 'Ollivon', 'Charles', 27, 'France', NULL, '3ème ligne', 0, 3),
(292, 11, 'Isa', 'Facundo', 26, 'Argentine', NULL, '3ème ligne', 0, 3),
(293, 11, 'Ory', 'Julien', 24, 'France', NULL, '3ème ligne', 0, 3),
(294, 11, 'Messam', 'Liam', 36, 'Australie', NULL, '3ème ligne', 0, 3),
(295, 11, 'Le Corvec', 'Mattéo', 19, 'France', NULL, '3ème ligne', 0, 3),
(296, 11, 'Lakafia', 'Raphaël', 31, 'France', NULL, '3ème ligne', 0, 3),
(297, 11, 'Parisse', 'Sergio', 36, 'France', NULL, '3ème ligne', 0, 3),
(298, 11, 'Onambélé', 'Stéphane', 27, 'France', NULL, '3ème ligne', 0, 3),
(299, 11, 'Hoarau', 'Thomas', 25, 'France', NULL, '3ème ligne', 0, 3),
(300, 11, 'Méric', 'Anthony', 25, 'France', NULL, 'Mêlée', 0, 4),
(301, 11, 'Serin', 'Baptiste', 25, 'France', NULL, 'Mêlée', 0, 4),
(302, 11, 'Takulua', 'Tane', 29, 'Tonga', NULL, 'Mêlée', 0, 4),
(303, 11, 'Beaudon', 'William', 21, 'France', NULL, 'Mêlée', 0, 4),
(304, 11, 'Cottin', 'Yoan', 22, 'France', NULL, 'Mêlée', 0, 4),
(305, 11, 'Belleau', 'Anthony', 24, 'France', NULL, 'Ouverture', 0, 5),
(306, 11, 'Carbonel', 'Louis', 21, 'France', NULL, 'Ouverture', 0, 5),
(307, 11, 'Smaïli', 'Mathieu', 20, 'France', NULL, 'Ouverture', 0, 5),
(308, 11, 'Paia\'aua', 'Duncan', 25, 'Australie', NULL, 'Centre', 0, 6),
(309, 11, 'Savea', 'Julian', 29, 'Australie', NULL, 'Centre', 0, 6),
(310, 11, 'Hériteau', 'Julien', 25, 'France', NULL, 'Centre', 0, 6),
(311, 11, 'Dachary', 'Théo', 23, 'France', NULL, 'Centre', 0, 6),
(312, 11, 'Heem', 'Bryce', 31, 'Australie', NULL, 'Ailier', 0, 7),
(313, 11, 'Ikpefan', 'Daniel', 26, 'France', NULL, 'Ailier', 0, 7),
(314, 11, 'Dridi', 'Erwan', 19, 'France', NULL, 'Ailier', 0, 7),
(315, 11, 'Villière', 'Gabin', 24, 'France', NULL, 'Ailier', 0, 7),
(316, 11, 'Dakuwaqa', 'Masivesi', 26, 'Fidji', NULL, 'Ailier', 0, 7),
(317, 11, 'Cordin', 'Gervais', 21, 'France', NULL, 'Arrière', 0, 8),
(318, 11, 'Bonneval', 'Hugo', 29, 'France', NULL, 'Arrière', 0, 8),
(319, 11, 'Moyano', 'Ramiro', 30, 'Argentine', NULL, 'Arrière', 0, 8),
(320, 15, 'Sego', 'Marin', 34, 'Croatie', NULL, 'Gardien', 1, 0),
(321, 15, 'Bonnefoi', 'Kévin', 28, 'France', NULL, 'Gardien', 12, 0),
(322, 15, 'Pellas', 'Lucas', 24, 'Suède', NULL, 'Ailier', 0, 1),
(323, 15, 'Descat', 'Hugo', 27, 'France', NULL, 'Ailier', 9, 1),
(324, 15, 'Bos', 'Julien', 21, 'France', NULL, 'Ailier', 13, 1),
(330, 15, 'Lenne', 'Yanis', 23, 'France', NULL, 'Ailier', 32, 1),
(331, 15, 'Bataille', 'Benjamin', 27, 'France', NULL, 'Arrières', 0, 2),
(332, 15, 'Truchanovicius', 'Jonas', 26, 'Lithuanie', NULL, 'Arrières', 7, 2),
(333, 15, 'Tskhovrebadze', 'Giorgi', 19, 'Géorgie', NULL, 'Arrières', 11, 2),
(334, 15, 'Richardson', 'Melvyn', 23, 'France', NULL, 'Arrières', 22, 2),
(335, 15, 'Porte', 'Valentin', 29, 'France', NULL, 'Arrières', 28, 2),
(336, 15, 'Duarte', 'Gilberto', 29, 'Portugal', NULL, 'Arrières', 90, 2),
(337, 15, 'Simonet', 'Diego', 30, 'Argentine', NULL, 'Demi-centre', 4, 3),
(338, 15, 'Villeminot', 'Kyllian', 22, 'France', NULL, 'Demi-centre', 5, 3),
(339, 15, 'Borges', 'Alexis', 28, 'Portugal', NULL, 'Pivot', 0, 4),
(340, 15, 'Pettersson', 'Frederic', 31, 'Suède', NULL, 'Pivot', 18, 4),
(341, 12, 'Gérard', 'Vincent', 33, 'France', NULL, 'Gardien', 1, 0),
(342, 12, 'Genty', 'Yann', 38, 'France', NULL, 'Gardien', 12, 0),
(343, 12, 'Keïta', 'Adama', 22, 'France', NULL, 'Ailier', 9, 1),
(344, 12, 'Kounkoud', 'Benoît', 23, 'France', NULL, 'Ailier', 11, 1),
(345, 12, 'Solé', 'Ferran', 27, 'Espagne', NULL, 'Ailier', 14, 1),
(346, 12, 'Nahi', 'Dylan', 20, 'France', NULL, 'Ailier', 99, 1),
(347, 12, 'Grébille', 'Mathieu', 28, 'France', NULL, 'Ailier', 0, 1),
(348, 12, 'Kristopans', 'Dainis', 29, 'Lettonie', NULL, 'Arrière', 10, 2),
(349, 12, 'Remili', 'Nedim', 24, 'France', NULL, 'Arrière', 18, 2),
(350, 12, 'Hansen', 'Mikkel', 32, 'Danemark', NULL, 'Arrière', 24, 2),
(351, 12, 'Prandi', 'Elohim', 21, 'France', NULL, 'Arrière', 71, 2),
(352, 12, 'Karabatic', 'Nikola', 36, 'France', NULL, 'Demi-centre', 44, 3),
(353, 12, 'Toft Hansen', 'Henrik', 33, 'Danemark', NULL, 'Pivot', 15, 4),
(354, 12, 'Syrpzak', 'Kamil', 28, 'Pologne', NULL, 'Pivot', 21, 4),
(355, 12, 'Karabatic', 'Luka', 32, 'France', NULL, 'Pivot', 32, 4),
(356, 12, 'Morros', 'Viran', 36, 'Espagne', NULL, 'Défenseur', 23, 5),
(357, 13, 'Dumoulin', 'Cyril', 36, 'France', NULL, 'Gardien', 1, 0),
(358, 13, 'Nielsen', 'Emil', 23, 'Danemark', NULL, 'Gardien', 16, 0),
(359, 13, 'Rivera', 'Valero', 35, 'Espagne', NULL, 'Ailier', 7, 1),
(360, 13, 'Augustinussen', 'Sebastian', 24, 'Danemark', NULL, 'Ailier', 9, 1),
(361, 13, 'Damatrin', 'Baptiste', 20, 'France', NULL, 'Ailier', 14, 1),
(362, 13, 'Balaguer', 'David', 28, 'Espagne', NULL, 'Ailier', 19, 1),
(363, 13, 'Milic', 'Milan', 22, 'Serbie', NULL, 'Arrière', 2, 2),
(364, 13, 'Nyokas', 'Olivier', 33, 'France', NULL, 'Arrière', 6, 2),
(365, 13, 'Cavalcanti', 'Alexandre', 23, 'Portugal', NULL, 'Arrière', 8, 2),
(366, 13, 'Lazarov', 'Kiril', 40, 'Macédoine', NULL, 'Arrière', 17, 2),
(367, 13, 'Gurbindo', 'Eduardo', 32, 'Espagne', NULL, 'Arrière', 18, 2),
(368, 13, 'Briet', 'Thibault', 20, 'France', NULL, 'Arrière', 23, 2),
(369, 13, 'Ovnicek', 'Rok', 25, 'Serbie', NULL, 'Demi-centre', 4, 2),
(370, 13, 'Minne', 'Aymeric', 23, 'France', NULL, 'Demi-centre', 15, 2),
(371, 13, 'Bataille', 'Matthieu', 32, 'France', NULL, 'Pivot', 7, 3),
(372, 13, 'Pechmalbec', 'Dragan', 24, 'France', NULL, 'Pivot', 10, 3),
(373, 13, 'Figueras', 'Adria', 31, 'Espagne', NULL, 'Pivot', 11, 3),
(374, 13, 'Feliho', 'Rock', 37, 'France', NULL, 'Défenseur', 13, 4),
(375, 14, 'Paul', 'Téodor', 33, 'Slovaquie', NULL, 'Gardien', 55, 0),
(376, 14, 'Desbonnet', 'Rémi', 28, 'France', NULL, 'Gardien', 92, 0),
(377, 14, 'Rebichon', 'Julien', 31, 'France', NULL, 'Ailier', 6, 1),
(378, 14, 'Guigou', 'Michaël', 38, 'France', NULL, 'Ailier', 14, 1),
(379, 14, 'Tesio', 'Romain', 23, 'France', NULL, 'Ailier', 15, 1),
(380, 14, 'Sanad', 'Mohammad', 29, 'Égypte', NULL, 'Ailier', 91, 1),
(381, 14, 'Dupuy', 'Quentin', 25, 'France', NULL, 'Arrière', 11, 2),
(382, 14, 'Minel', 'Quentin', 27, 'France', NULL, 'Arrière', 22, 2),
(383, 14, 'Tobie', 'Luc', 31, 'France', NULL, 'Arrière', 24, 2),
(384, 14, 'Acquevillo', 'Jean-Jacques', 31, 'France', NULL, 'Arrière', 27, 2),
(385, 14, 'Hesham', 'Ahmed', 20, 'Égypte', NULL, 'Arrière', 44, 2),
(386, 14, 'Kavticnik', 'Vid', 36, 'Slovénie', NULL, 'Arrière', 71, 2),
(387, 14, 'Nyateu', 'O\'Brian', 27, 'France', NULL, 'Demi-centre', 8, 3),
(388, 14, 'Gallego', 'Benjamin', 31, 'France', NULL, 'Pivot', 4, 4),
(389, 14, 'Salou', 'Rémi', 31, 'France', NULL, 'Pivot', 7, 4),
(390, 14, 'Poyet', 'Tom', 20, 'France', NULL, 'Pivot', 18, 4),
(391, 14, 'Nieto', 'Nicolas', 26, 'France', NULL, 'Pivot', 28, 4);

-- --------------------------------------------------------

--
-- Structure de la table `profil`
--

DROP TABLE IF EXISTS `profil`;
CREATE TABLE IF NOT EXISTS `profil` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `email` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `firstname` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `phone` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `notificationmail` tinyint(1) DEFAULT '0',
  `notificationsms` tinyint(1) DEFAULT '0',
  `image` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `UNIQ_E6D6B297A76ED395` (`user_id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `profil`
--

INSERT INTO `profil` (`id`, `user_id`, `email`, `name`, `firstname`, `phone`, `notificationmail`, `notificationsms`, `image`) VALUES
(1, 1, 'yann.malaquin@gmail.com', 'Malaquin', 'Yann', NULL, 0, 0, 'Yann.jpeg');

-- --------------------------------------------------------

--
-- Structure de la table `sportmeeting`
--

DROP TABLE IF EXISTS `sportmeeting`;
CREATE TABLE IF NOT EXISTS `sportmeeting` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `infrastructure_id` int(11) NOT NULL,
  `team_home_id` int(11) NOT NULL,
  `team_outside_id` int(11) NOT NULL,
  `sport` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `competition` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `city` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `meeting` datetime NOT NULL,
  `isfinish` tinyint(1) NOT NULL,
  `duration_meeting` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `IDX_68F9D21B243E7A84` (`infrastructure_id`),
  KEY `IDX_68F9D21BD7B4B9AB` (`team_home_id`),
  KEY `IDX_68F9D21B64A00204` (`team_outside_id`)
) ENGINE=InnoDB AUTO_INCREMENT=15 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `sportmeeting`
--

INSERT INTO `sportmeeting` (`id`, `infrastructure_id`, `team_home_id`, `team_outside_id`, `sport`, `competition`, `city`, `meeting`, `isfinish`, `duration_meeting`) VALUES
(1, 3, 3, 6, 'Football', 'Ligue 1', 'Valenciennes', '2020-06-03 21:00:00', 0, 90),
(2, 6, 2, 5, 'Football', 'Ligue 1', 'Lille', '2020-06-03 21:00:00', 0, 90),
(3, 6, 2, 6, 'Football', 'Ligue 1', 'Lille', '2020-06-04 16:00:00', 0, 90),
(4, 9, 6, 5, 'Football', 'Ligue 1', 'Marseille', '2020-06-10 20:00:00', 0, 90),
(5, 7, 5, 7, 'Football', 'Ligue 1', 'Paris', '2020-06-05 18:00:00', 0, 90),
(6, 10, 7, 3, 'Football', 'Ligue 1', 'Rennes', '2020-06-07 21:00:00', 0, 90),
(7, 11, 8, 9, 'Rugby', 'Top 14', 'Bordeaux', '2020-06-03 15:00:00', 0, 80),
(8, 14, 11, 10, 'Rugby', 'Top 14', 'Toulon', '2020-06-03 15:00:00', 0, 80),
(9, 13, 10, 8, 'Rugby', 'Top 14', 'Paris', '2020-06-12 16:00:00', 0, 80),
(10, 12, 9, 11, 'Rugby', 'Top 14', 'Lyon', '2020-06-12 16:00:00', 0, 80),
(11, 15, 12, 13, 'Handball', 'D1', 'Paris', '2020-06-03 16:00:00', 0, 60),
(12, 17, 14, 15, 'Handball', 'D1', 'Nîmes', '2020-06-03 18:00:00', 0, 60),
(13, 16, 13, 14, 'Handball', 'D1', 'Nantes', '2020-06-13 15:00:00', 0, 60),
(14, 18, 15, 12, 'Handball', 'D1', 'Montpellier', '2020-06-13 18:00:00', 0, 60);

-- --------------------------------------------------------

--
-- Structure de la table `team`
--

DROP TABLE IF EXISTS `team`;
CREATE TABLE IF NOT EXISTS `team` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `infrastructure_id` int(11) DEFAULT NULL,
  `abbreviation` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `sport` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `logo` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `president_name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `trainer` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `UNIQ_C4E0A61F243E7A84` (`infrastructure_id`)
) ENGINE=InnoDB AUTO_INCREMENT=16 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `team`
--

INSERT INTO `team` (`id`, `name`, `infrastructure_id`, `abbreviation`, `sport`, `logo`, `president_name`, `trainer`) VALUES
(2, 'LOSC Lille', 6, 'LOSC', 'football', 'LOSC', 'Gérard Lopez', 'Christophe Galtier'),
(3, 'Valenciennes FC', 3, 'VAFC', 'football', 'VAFC', 'Eddy Zdziech', 'Olivier Guégan'),
(5, 'Paris Saint Germain', 7, 'PSG', 'football', 'PSG', 'Nasser al-Khelaïfi', 'Thomas Tuchel'),
(6, 'Olympique de Marseille', 9, 'OM', 'football', 'OM', 'Frank McCourt', 'André Villas-Boas'),
(7, 'Stade Rennais FC', 10, 'SRFC', 'football', 'SRFC', 'Nicolas Holveck', 'Julien Stéphan'),
(8, 'Union Bordeaux-Bègles', 11, 'UBB', 'rugby', 'UBB', 'Laurent Marti', 'Christophe Urios'),
(9, 'Lyon OU', 12, 'LOU', 'rugby', 'LOU', 'Yann Roubert', 'Pierre Mignoni'),
(10, 'Racing 92', 13, 'Racing', 'rugby', 'Racing', 'Jacky Lorenzetti', 'Laurent Travers'),
(11, 'Rugby Club Toulonnais', 14, 'RCT', 'rugby', 'RCT', 'Bernard Lemaître', 'Patrice Collazo'),
(12, 'Paris Saint-Germain Handball', 15, 'PSGH', 'handball', 'PSG', 'Nasser al-Khelaïfi', 'Raul Gonzalez Gutiérrez'),
(13, 'Handball Club de Nantes', 16, 'Le H', 'handball', 'Le H', 'Gaël Pelletier', 'Alberto Entrerrios'),
(14, 'USAM Nîmes Gard', 17, 'USAM', 'handball', 'USAM', 'David Tebib', 'Frank Maurice'),
(15, 'Montpellier Handball', 18, 'MHB', 'handball', 'MHB', 'Julien Deljarry', 'Patrice Canayer');

-- --------------------------------------------------------

--
-- Structure de la table `user`
--

DROP TABLE IF EXISTS `user`;
CREATE TABLE IF NOT EXISTS `user` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `email` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `username` varchar(32) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `cle` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `activate` tinyint(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `user`
--

INSERT INTO `user` (`id`, `email`, `username`, `password`, `cle`, `activate`) VALUES
(1, 'yann.malaquin@gmail.com', 'Yann', '$2y$13$KD/1bMNoBr9.h/ugGWRBiOD5vlRnAH8vYsgJX5tMD3W6tb6uvp4dy', '728f1a7886856fd2f1c31697cdcd8e24', 1);

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `favorites`
--
ALTER TABLE `favorites`
  ADD CONSTRAINT `FK_E46960F5296CD8AE` FOREIGN KEY (`team_id`) REFERENCES `team` (`id`),
  ADD CONSTRAINT `FK_E46960F5A76ED395` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`);

--
-- Contraintes pour la table `player`
--
ALTER TABLE `player`
  ADD CONSTRAINT `FK_98197A65296CD8AE` FOREIGN KEY (`team_id`) REFERENCES `team` (`id`);

--
-- Contraintes pour la table `profil`
--
ALTER TABLE `profil`
  ADD CONSTRAINT `FK_E6D6B297A76ED395` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`);

--
-- Contraintes pour la table `sportmeeting`
--
ALTER TABLE `sportmeeting`
  ADD CONSTRAINT `FK_68F9D21B243E7A84` FOREIGN KEY (`infrastructure_id`) REFERENCES `infrastructure` (`id`),
  ADD CONSTRAINT `FK_68F9D21B64A00204` FOREIGN KEY (`team_outside_id`) REFERENCES `team` (`id`),
  ADD CONSTRAINT `FK_68F9D21BD7B4B9AB` FOREIGN KEY (`team_home_id`) REFERENCES `team` (`id`);

--
-- Contraintes pour la table `team`
--
ALTER TABLE `team`
  ADD CONSTRAINT `FK_C4E0A61F243E7A84` FOREIGN KEY (`infrastructure_id`) REFERENCES `infrastructure` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
