-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le : ven. 02 fév. 2024 à 09:19
-- Version du serveur : 10.4.24-MariaDB
-- Version de PHP : 8.1.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `pizzadb`
--

-- --------------------------------------------------------

--
-- Structure de la table `pizza`
--

CREATE TABLE `pizza` (
  `NROPIZZ` int(11) NOT NULL,
  `DESIGNPIZZ` char(20) DEFAULT NULL,
  `TARIFPIZZ` decimal(5,2) DEFAULT NULL,
  `IMAGEPIZZ` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 ROW_FORMAT=DYNAMIC;

--
-- Déchargement des données de la table `pizza`
--

INSERT INTO `pizza` (`NROPIZZ`, `DESIGNPIZZ`, `TARIFPIZZ`, `IMAGEPIZZ`) VALUES
(1, 'Pizza Caviar', '200.00', 'uploads/le-origini-della-pizza-napoletana-e1601990439881-1024x604.jpg'),
(2, 'La Seguin', '13.50', 'uploads/pizza-thon.jpg'),
(3, 'La From', '14.50', 'uploads/pizza-saumon.jpg'),
(4, 'La Fermière', '12.50', 'uploads/Pizza-maison.jpg'),
(5, 'La chausson', '13.00', 'uploads/107901_w1024h1024c1cx4330cy2886cxt0cyt0cxb8660cyb5773.jpg'),
(6, 'La Provençale', '12.50', 'uploads/i87536-pizza-au-fromage-tomates-cerise-et-origan.jpg'),
(7, 'La Caramba', '14.50', 'uploads/téléchargement (1).jpeg'),
(8, 'Orient Express', '14.50', 'uploads/pizza-saumon.jpg'),
(9, 'La Gourmande', '14.50', 'uploads/pizza-saumon.jpg'),
(10, 'La primeure', '12.50', 'uploads/téléchargement.jpeg'),
(11, 'La Péloponèse', '14.50', 'uploads/i87536-pizza-au-fromage-tomates-cerise-et-origan.jpg'),
(12, 'La Savoyarde', '14.50', 'uploads/107901_w1024h1024c1cx4330cy2886cxt0cyt0cxb8660cyb5773.jpg'),
(13, 'la Pêcheur', '13.50', 'uploads/le-origini-della-pizza-napoletana-e1601990439881-1024x604.jpg'),
(458, 'Flammande', '1.00', 'uploads/pizza-saumon.jpg'),
(460, 'La Puree', '0.20', 'uploads/téléchargement (1).jpeg');

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `pizza`
--
ALTER TABLE `pizza`
  ADD PRIMARY KEY (`NROPIZZ`) USING BTREE;

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `pizza`
--
ALTER TABLE `pizza`
  MODIFY `NROPIZZ` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=461;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
