-- phpMyAdmin SQL Dump
-- version 4.2.7.1
-- http://www.phpmyadmin.net
--
-- Client :  localhost
-- Généré le :  Mer 29 Juin 2016 à 08:08
-- Version du serveur :  5.6.20-log
-- Version de PHP :  5.5.15

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de données :  `wordpress`
--

-- --------------------------------------------------------

--
-- Structure de la table `wp_tuts_inscription`
--

DROP TABLE IF EXISTS `wp_tuts_inscription`;
CREATE TABLE IF NOT EXISTS `wp_tuts_inscription` (
`id_inscription` int(11) NOT NULL,
  `id_offre` int(11) NOT NULL,
  `nom` varchar(255) NOT NULL,
  `prenom` varchar(255) NOT NULL,
  `commune` varchar(255) NOT NULL,
  `addr_mail` varchar(255) NOT NULL,
  `telephone` varchar(15) NOT NULL,
  `date` varchar(255) NOT NULL,
  `horaire` varchar(10) NOT NULL,
  `benevolat` varchar(3) NOT NULL,
  `connaissance` varchar(255) NOT NULL,
  `info` text NOT NULL
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=13 ;

--
-- Contenu de la table `wp_tuts_inscription`
--

INSERT INTO `wp_tuts_inscription` (`id_inscription`, `id_offre`, `nom`, `prenom`, `commune`, `addr_mail`, `telephone`, `date`, `horaire`, `benevolat`, `connaissance`, `info`) VALUES
(11, 233, 'Phommavanh', 'Kevin', 'Lyon', 'Reikonekoz@hotmail.com', '+33602338968', '18/06/2016', '8h à 12h', 'Non', 'Site internet,Publicité urbaine', '            LOL'),
(12, 233, 'Jean', 'De la vega', 'Champagne-au-Mont-d\\''Or', 'Reikonekoz@hotmail.com', '+33602338968', '17/06/2016', '14h à 18h', 'Non', 'Bouche-à-oreille, Facebook', '            Bwah Vala');

--
-- Index pour les tables exportées
--

--
-- Index pour la table `wp_tuts_inscription`
--
ALTER TABLE `wp_tuts_inscription`
 ADD PRIMARY KEY (`id_inscription`);

--
-- AUTO_INCREMENT pour les tables exportées
--

--
-- AUTO_INCREMENT pour la table `wp_tuts_inscription`
--
ALTER TABLE `wp_tuts_inscription`
MODIFY `id_inscription` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=13;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
