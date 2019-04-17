-- phpMyAdmin SQL Dump
-- version 4.8.0
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le :  mar. 16 avr. 2019 à 14:36
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
-- Base de données :  `site`
--

-- --------------------------------------------------------

--
-- Structure de la table `produit`
--

CREATE TABLE `produit` (
  `id_produit` int(3) NOT NULL,
  `reference` varchar(20) NOT NULL,
  `categorie` varchar(20) NOT NULL,
  `titre` varchar(100) NOT NULL,
  `description` text NOT NULL,
  `couleur` varchar(20) NOT NULL,
  `taille` varchar(5) NOT NULL,
  `public` enum('m','f','mixte') NOT NULL,
  `photo` varchar(250) NOT NULL,
  `prix` int(3) NOT NULL,
  `stock` int(3) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `produit`
--

INSERT INTO `produit` (`id_produit`, `reference`, `categorie`, `titre`, `description`, `couleur`, `taille`, `public`, `photo`, `prix`, `stock`) VALUES
(1, 'A502BR20', 'chemise', 'chemise blanche et noir', 'chemise blanche et noir', 'blanc et noir', 'l', 'f', 'http://localhost/Back/PHP/10_site/photo/A502BR20-2018-nouvelle-chemise-pour-homme-a-manches-longu.jpg', 25, 20),
(2, 'V2155GT', 'pull', 'pull gris', 'pull gris H', 'gris', 'xxl', 'm', 'http://localhost/Back/PHP/10_site/photo/V2155GT-4183176_09.jpg', 50, 100),
(4, 'GZ2235BV4', 'chemise', 'chemise blanche', 'chemise blanche', 'blanche', 'l', 'm', 'http://localhost/Back/PHP/10_site/photo/GZ2235BV4-chemise-blanche.jpg', 32, 160),
(5, 'YBD4456J2', 'chemise', 'chemise rouge', 'chemise rouge', 'rouge', 's', 'm', 'http://localhost/Back/PHP/10_site/photo/YBD4456J2-chemise-blanche-homme-slim-fit-marque-chemises.jpg', 30, 30),
(7, 'BSJ456P22', 'chemise', 'chemise blanche', 'chemise blanche', 'blanc', 'xl', 'mixte', 'http://localhost/Back/PHP/10_site/photo/BSJ456P22-chemise-homme-marque-luxe-chemise-en-lin-couleur-u.jpg', 25, 100),
(8, 'MQ213H25', 'chemise', 'chemise blanche et noir', 'chemise blanche et noir', 'blanc et noir', 'l', 'mixte', 'http://localhost/Back/PHP/10_site/photo/MQ213H25-chemise-homme-noir-manche-longue-pour-homme-casua.jpg', 30, 200),
(9, 'GH235D4', 'chemise', 'Chemise a carreaux rouge', 'Chemise a carreaux rouge', 'rouge', 'xl', 'm', 'http://localhost/Back/PHP/10_site/photo/GH235D4-colin-ml-blanc-navy-rouge-chemise-homme-saint-jame.jpg', 30, 60),
(10, 'SD234Vf4', 'chemise', 'chemise bleu', 'chemise bleu', 'bleu', 'xxl', 'f', 'http://localhost/Back/PHP/10_site/photo/SD234Vf4-dh026-chemise-col-mao-chanvre-blueberry.jpg', 30, 200),
(11, 'BZE2213G45', 'pull', 'pull marron', 'pull marron', 'marron', 'xl', 'f', 'http://localhost/Back/PHP/10_site/photo/BZE2213G45-Lenvers-fashion-pull-barbara-marron.jpg', 23, 200),
(12, 'BS223GR1', 'pull', 'pull gris', 'pull gris', 'gris', 'l', 'mixte', 'http://localhost/Back/PHP/10_site/photo/BS223GR1-majes142807-pck20180912-1.jpg', 13, 200);

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `produit`
--
ALTER TABLE `produit`
  ADD PRIMARY KEY (`id_produit`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `produit`
--
ALTER TABLE `produit`
  MODIFY `id_produit` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
