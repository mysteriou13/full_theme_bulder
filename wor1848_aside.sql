-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Hôte : localhost
-- Généré le : sam. 14 jan. 2023 à 08:11
-- Version du serveur : 10.4.24-MariaDB
-- Version de PHP : 7.4.29

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `hikikomokfbd1`
--

-- --------------------------------------------------------

--
-- Structure de la table `wor1848_aside`
--

CREATE TABLE `wor1848_aside` (
  `id` int(11) NOT NULL,
  `name_link` text NOT NULL,
  `link_page` text NOT NULL,
  `section` int(11) NOT NULL,
  `type_link` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `wor1848_aside`
--

INSERT INTO `wor1848_aside` (`id`, `name_link`, `link_page`, `section`, `type_link`) VALUES
(65, 'Hikipos.info (Média Japonais)', 'https://www.hikipos.info/', 3, '2'),
(66, 'Forumactif hikikomori', 'https://hikikomori.forumactif.org/forum', 3, '2'),
(67, 'Site Rin (écrivaine)', 'http://bubble-writter.fr/', 4, '2'),
(83, 'Site de Sylvain (blog psychologie)', 'https://www.promethee-devperso.com/', 4, '2'),
(84, ' Site Catherine (artiste)', 'http://catherinelapeyre.free.fr/', 4, '2'),
(85, ' Site Catherine (artiste)', 'http://catherinelapeyre.free.fr/', 0, '2'),
(86, ' Site de Vincent (Artiste Photographe, Compositeur, Infographiste)', 'https://vincentlepeigneul.fr/', 5, '2'),
(89, 'Instagram de Sayttara (Artiste manga)', 'https://www.instagram.com/sayeuttara/', 5, '2'),
(90, 'Site de poèmes anglais d\\\'une hiki chez nous.', 'https://www.poemsfromthedesert.com/', 5, '2'),
(91, 'Site de Tabris, cosplay.', 'https://www.facebook.com/TabrisPropsAndCosplay/', 5, '2');

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `wor1848_aside`
--
ALTER TABLE `wor1848_aside`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `wor1848_aside`
--
ALTER TABLE `wor1848_aside`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=92;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
