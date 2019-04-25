-- phpMyAdmin SQL Dump
-- version 4.8.0
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le :  mar. 23 avr. 2019 à 15:47
-- Version du serveur :  10.1.31-MariaDB
-- Version de PHP :  7.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `immobilier`
--

-- --------------------------------------------------------

--
-- Structure de la table `logement`
--

CREATE TABLE `logement` (
  `id_logement` int(3) NOT NULL,
  `titre` varchar(30) NOT NULL,
  `adresse` varchar(30) NOT NULL,
  `cp` int(5) NOT NULL,
  `surface` int(5) NOT NULL,
  `prix` int(6) NOT NULL,
  `photo` varchar(60) NOT NULL,
  `type` enum('location','vente') NOT NULL,
  `description` text NOT NULL,
  `ville` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `logement`
--

INSERT INTO `logement` (`id_logement`, `titre`, `adresse`, `cp`, `surface`, `prix`, `photo`, `type`, `description`, `ville`) VALUES
(5, 'aa', 'aa', 12785, 231, 22, 'http://localhost/Back/EVALUATION_piot_Aure/photo/aa-lpa-cond', 'location', 'LOCATIIIIIIIIIIOOOOOOOOOOOOOOOOOOOOOOOOOONNNNNNNNNNNN', 'gr'),
(16, 'appart 10', '10dixdix', 10000, 1000, 100, 'http://localhost/Back/EVALUATION_Piot_Aure/photo/logement_', 'vente', '100000000diiiiiiiiiiiiiiiiiiiixxxxxxxxxxxxx', '10dix'),
(17, 'appart 10', '10dixdix', 10000, 1000, 100, 'http://localhost/Back/EVALUATION_Piot_Aure/photo/logement_', 'vente', '100000000diiiiiiiiiiiiiiiiiiiixxxxxxxxxxxxx', '10dix'),
(19, 'appart 11', '11 onze', 11111, 11111, 11, 'http://localhost/Back/EVALUATION_Piot_Aure/photo/logement_ap', 'vente', 'ONNNNNNNNNNNZZZZZZEeeeee', '11onze'),
(20, 'aa', 'aa12', 12000, 0, 112, 'http://localhost/Back/EVALUATION_Piot_Aure/photo/aa', 'vente', 'DDDDDOUZZZEEE', 'aa12'),
(23, '13treize', '13treze', 13003, 1300, 130, 'http://localhost/Back/EVALUATION_Piot_Aure/photo/13treize', 'location', '13trrrrrrreize', '13trezze'),
(24, 'test 14', '14', 14000, 1400, 140, 'http://localhost/Back/EVALUATION_Piot_Aure/photo/test 14', 'location', '1444', '14'),
(25, 'test 15', '15', 15500, 1500, 15, 'http://localhost/Back/EVALUATION_Piot_Aure/photo/test 15', 'location', '15', '15'),
(26, 'ff', 'ff', 12786, 13, 20, 'http://localhost/Back/EVALUATION_Piot_Aure/photo/ff', 'vente', 'ff', 'ff');

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `logement`
--
ALTER TABLE `logement`
  ADD PRIMARY KEY (`id_logement`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `logement`
--
ALTER TABLE `logement`
  MODIFY `id_logement` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
