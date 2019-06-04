-- phpMyAdmin SQL Dump
-- version 4.8.4
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le :  mar. 04 juin 2019 à 20:56
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
-- Base de données :  `db_voyage`
--

-- --------------------------------------------------------

--
-- Structure de la table `avis`
--

DROP TABLE IF EXISTS `avis`;
CREATE TABLE IF NOT EXISTS `avis` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `un_membre_id` int(11) NOT NULL,
  `titre` varchar(30) COLLATE utf8mb4_unicode_ci NOT NULL,
  `note` int(11) NOT NULL,
  `date` date NOT NULL,
  `commentaire` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `un_etablissement_id` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `FK_8F91ABF0111B394` (`un_membre_id`)
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `avis`
--

INSERT INTO `avis` (`id`, `un_membre_id`, `titre`, `note`, `date`, `commentaire`, `un_etablissement_id`) VALUES
(9, 16, 'Avis de Dimitri', 4, '2019-03-25', 'Ensemble correct', 0),
(10, 16, 'Avis Camping', 4, '2014-01-01', 'J\'adore la piscine', 2);

-- --------------------------------------------------------

--
-- Structure de la table `equipement`
--

DROP TABLE IF EXISTS `equipement`;
CREATE TABLE IF NOT EXISTS `equipement` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `libelle` varchar(30) COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `equipement`
--

INSERT INTO `equipement` (`id`, `libelle`) VALUES
(1, 'wifi'),
(2, 'piscine'),
(3, 'trampoline');

-- --------------------------------------------------------

--
-- Structure de la table `etablissement`
--

DROP TABLE IF EXISTS `etablissement`;
CREATE TABLE IF NOT EXISTS `etablissement` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nom` varchar(40) COLLATE utf8mb4_unicode_ci NOT NULL,
  `adresse` varchar(40) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tel` varchar(10) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(30) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `etablissement`
--

INSERT INTO `etablissement` (`id`, `nom`, `adresse`, `tel`, `email`) VALUES
(1, 'La Joliverie', '141 route de Clisson', '0244598402', 'la-joliverie@mail.fr'),
(2, 'Camping ', 'La Rochelle', '0241565426', 'camping-larochelle@mail.fr');

-- --------------------------------------------------------

--
-- Structure de la table `etablissement_equipement`
--

DROP TABLE IF EXISTS `etablissement_equipement`;
CREATE TABLE IF NOT EXISTS `etablissement_equipement` (
  `etablissement_id` int(11) NOT NULL,
  `equipement_id` int(11) NOT NULL,
  PRIMARY KEY (`etablissement_id`,`equipement_id`),
  KEY `IDX_8CB7C082FF631228` (`etablissement_id`),
  KEY `IDX_8CB7C082806F0F5C` (`equipement_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `etablissement_equipement`
--

INSERT INTO `etablissement_equipement` (`etablissement_id`, `equipement_id`) VALUES
(1, 1),
(2, 2),
(2, 3);

-- --------------------------------------------------------

--
-- Structure de la table `membre`
--

DROP TABLE IF EXISTS `membre`;
CREATE TABLE IF NOT EXISTS `membre` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nom` varchar(30) COLLATE utf8mb4_unicode_ci NOT NULL,
  `prenom` varchar(30) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(30) COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=24 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `membre`
--

INSERT INTO `membre` (`id`, `nom`, `prenom`, `email`) VALUES
(16, 'Guery', 'Dimitri', 'dimitri@gmail.com');

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
('20190312102547', '2019-03-12 10:26:26'),
('20190312104030', '2019-03-12 10:42:04'),
('20190322111019', '2019-03-22 11:11:19'),
('20190324220400', '2019-03-24 22:04:17');

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `avis`
--
ALTER TABLE `avis`
  ADD CONSTRAINT `FK_8F91ABF0111B394` FOREIGN KEY (`un_membre_id`) REFERENCES `membre` (`id`);

--
-- Contraintes pour la table `etablissement_equipement`
--
ALTER TABLE `etablissement_equipement`
  ADD CONSTRAINT `FK_8CB7C082806F0F5C` FOREIGN KEY (`equipement_id`) REFERENCES `equipement` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `FK_8CB7C082FF631228` FOREIGN KEY (`etablissement_id`) REFERENCES `etablissement` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
