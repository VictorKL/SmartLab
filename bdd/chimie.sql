-- phpMyAdmin SQL Dump
-- version 4.8.4
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le :  mer. 24 avr. 2019 à 09:02
-- Version du serveur :  5.7.24
-- Version de PHP :  7.2.14

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `chimie`
--

-- --------------------------------------------------------

--
-- Structure de la table `pictogramme_precaution`
--

DROP TABLE IF EXISTS `pictogramme_precaution`;
CREATE TABLE IF NOT EXISTS `pictogramme_precaution` (
  `code` int(11) NOT NULL AUTO_INCREMENT,
  `nom` varchar(256) NOT NULL,
  `picto` varchar(1000) NOT NULL,
  PRIMARY KEY (`code`),
  UNIQUE KEY `code` (`code`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `pictogramme_precaution`
--

INSERT INTO `pictogramme_precaution` (`code`, `nom`, `picto`) VALUES
(1, 'Masque', 'C:/wamp64/www/Chimie/pictogramme_precaution/masque.png'),
(2, 'Gants de protection', 'C:/wamp64/www/Chimie/pictogramme_precaution/gants_de_protection.png'),
(3, 'Lunettes de protection', 'C:/wamp64/www/Chimie/pictogramme_precaution/lunettes_de_protection.png');

-- --------------------------------------------------------

--
-- Structure de la table `pictogramme_securite`
--

DROP TABLE IF EXISTS `pictogramme_securite`;
CREATE TABLE IF NOT EXISTS `pictogramme_securite` (
  `code` varchar(50) NOT NULL,
  `nom` varchar(256) NOT NULL,
  `picto` varchar(1000) NOT NULL,
  `remarque` varchar(1024) DEFAULT NULL,
  PRIMARY KEY (`code`),
  UNIQUE KEY `code` (`code`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `pictogramme_securite`
--

INSERT INTO `pictogramme_securite` (`code`, `nom`, `picto`, `remarque`) VALUES
('SGH01', 'Explosif', 'C:/wamp64/www/Chimie/pictogramme_securité/100px-GHS-pictogram-explos.png', 'Rend SGH02 et SGH03 facultatifs'),
('SGH02', 'Inflammable', 'C:/wamp64/www/Chimie/pictogramme_securité/100px-GHS-pictogram-flamme.png', ''),
('SGH03', 'Comburant', 'C:/wamp64/www/Chimie/pictogramme_securité/100px-GHS-pictogram-rondflam.png', ''),
('SGH04', 'Gaz sous pression', 'C:/wamp64/www/Chimie/pictogramme_securité/100px-GHS-pictogram-bottle.png', ''),
('SGH05', 'Corrosif', 'C:/wamp64/www/Chimie/pictogramme_securité/100px-GHS-pictogram-acid.png', 'Rend SGH07 (pour signaler les dangers d\'irritation cutanée ou oculaire) facultatif'),
('SGH06', 'Toxique', 'C:/wamp64/www/Chimie/pictogramme_securité/100px-GHS-pictogram-skull.png', 'Rend SGH07 facultatif'),
('SGH07', 'Toxique, irritant, sensibilisant, narcotique', 'C:/wamp64/www/Chimie/pictogramme_securité/100px-GHS-pictogram-exclam.png', ''),
('SGH08', 'Sensibilisant, mutagène, cancérogène, reprotoxique', 'C:/wamp64/www/Chimie/pictogramme_securité/100px-GHS-pictogram-silhouette.png', 'Si présent pour signaler un danger de sensibilisation respiratoire rend SGH07 (pour signaler un danger de sensibilisation cutanée, d’irritation cutanée ou oculaire) facultatif'),
('SGH09', 'Danger pour l\'environnement', 'C:/wamp64/www/Chimie/pictogramme_securité/100px-GHS-pictogram-pollu.png', '');

-- --------------------------------------------------------

--
-- Structure de la table `produit`
--

DROP TABLE IF EXISTS `produit`;
CREATE TABLE IF NOT EXISTS `produit` (
  `code_produit` int(255) NOT NULL AUTO_INCREMENT,
  `designation_francaise` varchar(255) NOT NULL,
  `designation_anglaise` varchar(255) NOT NULL,
  `designation_scientifique` varchar(255) NOT NULL,
  `QR_code` varchar(1000) DEFAULT NULL,
  `formule_brute` varchar(255) NOT NULL,
  `quantite` decimal(10,0) NOT NULL,
  `commentaire_libre` varchar(255) DEFAULT NULL,
  `fournisseur` varchar(255) DEFAULT NULL,
  `masse_molaire` decimal(10,0) NOT NULL,
  `densite` decimal(10,0) NOT NULL,
  `temp_fusion_celsius` int(255) NOT NULL,
  `temp_ebullition_celsius` int(255) NOT NULL,
  `temp_autoflamme_celsius` int(255) NOT NULL,
  `indice_optique` decimal(10,0) NOT NULL,
  `num_cas` varchar(255) NOT NULL,
  `formule_developpee` longblob,
  `pictogramme_securite` longblob,
  `pictogramme_precaution` longblob,
  `melange_dangereux` varchar(255) DEFAULT NULL,
  `date_de_creation` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `auteur` varchar(255) NOT NULL,
  `fiche_securite_legale` longblob,
  PRIMARY KEY (`code_produit`,`num_cas`),
  UNIQUE KEY `num_cas` (`num_cas`),
  KEY `code_produit` (`code_produit`)
) ENGINE=MyISAM AUTO_INCREMENT=14 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `produit`
--

INSERT INTO `produit` (`code_produit`, `designation_francaise`, `designation_anglaise`, `designation_scientifique`, `QR_code`, `formule_brute`, `quantite`, `commentaire_libre`, `fournisseur`, `masse_molaire`, `densite`, `temp_fusion_celsius`, `temp_ebullition_celsius`, `temp_autoflamme_celsius`, `indice_optique`, `num_cas`, `formule_developpee`, `pictogramme_securite`, `pictogramme_precaution`, `melange_dangereux`, `date_de_creation`, `auteur`, `fiche_securite_legale`) VALUES
(13, 'TrichlorÃ©thylÃ¨ne', 'TrichlorÃ©thylÃ¨ne', 'TrichlorÃ©thylÃ¨ne', 'qr_codes/qrcode_TrichlorÃ©thylÃ¨ne.png', 'CO3', '100', 'pas trÃ¨s dangereux', 'Activision', '8', '8', 2, 5, 7, '6', '8200201', NULL, 0x47617a20736f7573207072657373696f6e4578706c6f736966, NULL, '', '2019-04-24 08:50:35', 'jojo', NULL),
(12, 'Acetonitrile', 'Acetonitrile', 'Acetonitrile', 'qr_codes/qrcode_Acetonitrile.png', 'CO2', '100', 'trÃ¨s dangereux', 'Microsoft', '8', '8', 2, 5, 7, '6', '8200200', NULL, 0x47617a20736f7573207072657373696f6e, NULL, 'Avec de l\'eau', '2019-04-24 08:46:32', 'jojo', NULL),
(11, 'Chloroforme', 'test', 'test', 'qr_codes/qrcode_test.png', 'test', '0', 'zdqzd', 'test', '0', '0', 0, 0, 7, '0', 'C12345', NULL, 0x436f6d627572616e74496e666c616d6d61626c654578706c6f736966, NULL, 'test', '2019-04-24 08:05:41', 'jojo', NULL),
(9, 'test', 'test', 'test', 'qr_codes/qrcode_test.png', 'test', '0', 'test', 'test', '0', '0', 0, 0, 0, '0', 'testqr_code5', NULL, NULL, NULL, 'test', '2019-04-24 03:22:28', 'jojo', NULL),
(10, 'zeze', 'ezee', 'eeezzzzzzzzzzzzzzzz', 'qr_codes/qrcode_eeezzzzzzzzzzzzzzzz.png', 'eze', '88', 'ze  zeez      ', 'zeeeeeeeee', '1', '2', 3, 4, 5, '6', 'zzzeee', NULL, '', NULL, 'eeeeeeeeeez', '2019-04-24 04:15:09', 'jojo', NULL);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
