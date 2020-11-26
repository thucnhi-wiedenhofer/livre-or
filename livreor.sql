-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le : jeu. 26 nov. 2020 à 15:02
-- Version du serveur :  5.7.31
-- Version de PHP : 7.3.21

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `livreor`
--

-- --------------------------------------------------------

--
-- Structure de la table `commentaires`
--

DROP TABLE IF EXISTS `commentaires`;
CREATE TABLE IF NOT EXISTS `commentaires` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `commentaire` text NOT NULL,
  `id_utilisateur` int(11) NOT NULL,
  `date` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=14 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `commentaires`
--

INSERT INTO `commentaires` (`id`, `commentaire`, `id_utilisateur`, `date`) VALUES
(1, '\r\nMille mercis pour ce petit séjour autour de Noël;\r\nNous avons encore apprécié le confort de votre maison et ses petits-déjeuners si raffinés;\r\nNous vous souhaitons une très bonne année 2009 professionnelle et privée! Vous le méritez;\r\nA très bientôt de vous revoir !\r\nBien amicalement.', 2, '2019-12-21 13:51:08'),
(2, 'Remerciements les plus vifs pour votre accueil, emprunt de gentillesse et de discrétion, avec la plus totale convivialité. Vos petits déjeuners complets illuminés de ses confitures maisons révèlent votre volonté de satisfaire vos hôtes, ce que nous avons apprécié. La propreté de vos chambres et le décor raffiné que vous y avez apporté, n\'appellent qu\'une question : \"Quand pourrons nous revenir ?\".\r\nNe changez pas de métier, vous êtes parfait!!!', 5, '2020-11-04 13:51:08'),
(3, 'Merci pour votre accueil exceptionnel et la qualité de vos prestations. Très jolie maison, très jolie décoration, excellent confort . Enfin, tout est parfait et nous espérons avoir d\'autres occasions pour séjourner chez vous ! ', 4, '2020-03-11 08:56:26'),
(4, 'Nous garderons très longtemps en mémoire notre séjour en particulier pour l’accueil de nos hôtes. Merci encore à vous deux et nous gardons votre adresse pour en faire profiter des amis.', 6, '2020-02-03 21:56:26'),
(5, 'Nous tenons absolument à vous remercier pour votre accueil si charmant. Mille remerciements également pour la gentille attention pour l\'anniversaire de Cyrielle. Nous recommanderons votre adresse à nos amis car la qualité de votre hébergement était de tout premier ordre.\r\n\r\nMeilleures salutations,', 3, '2019-11-06 11:59:33'),
(6, 'Merci encore pour votre accueil chaleureux et félicitations pour le charme de votre maison.\r\nBien à vous et à bientôt sûrement', 3, '2020-11-02 13:59:33'),
(12, 'Merci pour votre accueil exceptionnel', 2, '2020-11-26 15:25:43'),
(10, 'Super sÃ©jour', 3, '2020-11-26 15:17:28'),
(11, 'Merci Ã  vous', 5, '2020-11-26 15:20:46'),
(13, 'Bonjour', 5, '2020-11-26 15:54:03');

-- --------------------------------------------------------

--
-- Structure de la table `utilisateurs`
--

DROP TABLE IF EXISTS `utilisateurs`;
CREATE TABLE IF NOT EXISTS `utilisateurs` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `login` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=7 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `utilisateurs`
--

INSERT INTO `utilisateurs` (`id`, `login`, `password`) VALUES
(2, 'tt', '$2y$10$1UtZE1nkFEFkK4b2VDMSkeunikgC2QR8ZT2TN5G84dBbmwDkxgu7u'),
(3, 'noÃ©mie', '$2y$10$Ae/WVtVOKdu8waDCPVjYPOYrcP.u.v2DWYT25DoqWc4CSnKQU.Fda'),
(4, 'noemi', '$2y$10$oLtW.KKYDb1enG5Xy.nV.eX4bQEGMtELfWVI/n4zcEZZHQ1uS6hsS'),
(5, 'toto', '$2y$10$0Xa0ETl1pY0XDnAsFmNatOcAonunMLSSCVTnuVfb5iswmYybIw5mm'),
(6, 'isa', '$2y$10$pOvGJ9tKbvxdG0xGND6INOLax1GKam6yGySDiD2m7XcsOfw5fRRqC');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
