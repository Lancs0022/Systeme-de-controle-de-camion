-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le : dim. 26 nov. 2023 à 16:10
-- Version du serveur : 8.0.27
-- Version de PHP : 7.4.26

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `space_odyssey`
--

-- --------------------------------------------------------

--
-- Structure de la table `astronaute`
--

DROP TABLE IF EXISTS `astronaute`;
CREATE TABLE IF NOT EXISTS `astronaute` (
  `ATR_ID` int NOT NULL,
  `VSX_ID` int NOT NULL,
  `ATR_NOM` varchar(128) DEFAULT NULL,
  `ATR_RANG` varchar(128) DEFAULT NULL,
  `ATR_FIRSTSERVICE` date DEFAULT NULL,
  PRIMARY KEY (`ATR_ID`),
  KEY `FK_ASTRONAUTE_VAISSEAU` (`VSX_ID`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Structure de la table `envoyer_en_mission`
--

DROP TABLE IF EXISTS `envoyer_en_mission`;
CREATE TABLE IF NOT EXISTS `envoyer_en_mission` (
  `VSX_ID` int NOT NULL,
  `PLNT_ID` int NOT NULL,
  `MISS_NOM` char(32) DEFAULT NULL,
  `MIS_DUREE` varchar(128) DEFAULT NULL,
  `MISS_VSXUTILISE` int DEFAULT NULL COMMENT 'Nombre de vaisseau utilisé',
  PRIMARY KEY (`VSX_ID`,`PLNT_ID`),
  KEY `FK_ENVOYER_EN_MISSION_PLANETE` (`PLNT_ID`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Structure de la table `planete`
--

DROP TABLE IF EXISTS `planete`;
CREATE TABLE IF NOT EXISTS `planete` (
  `PLNT_ID` int NOT NULL,
  `PLNT_NOM` char(32) DEFAULT NULL,
  `PLNT_DISTANCETERRE` bigint DEFAULT NULL,
  `PLNT_CIVILISATION` char(32) DEFAULT NULL,
  `PLNT_ESTVIVABLE` tinyint(1) DEFAULT NULL,
  PRIMARY KEY (`PLNT_ID`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Structure de la table `vaisseau`
--

DROP TABLE IF EXISTS `vaisseau`;
CREATE TABLE IF NOT EXISTS `vaisseau` (
  `VSX_ID` int NOT NULL,
  `VSX_NOM` char(32) DEFAULT NULL,
  `VSX_NOMBREPLACE` int DEFAULT NULL,
  `VSX_POIDSMAX` varchar(128) DEFAULT NULL,
  PRIMARY KEY (`VSX_ID`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
