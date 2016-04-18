-- phpMyAdmin SQL Dump
-- version 4.2.7.1
-- http://www.phpmyadmin.net
--
-- Client :  localhost
-- Généré le :  Lun 18 Avril 2016 à 13:57
-- Version du serveur :  5.6.20-log
-- Version de PHP :  5.4.31

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
-- Structure de la table `wp_tuts_offre`
--

CREATE TABLE IF NOT EXISTS `wp_tuts_offre` (
`id_offre` int(11) NOT NULL,
  `titre` varchar(255) NOT NULL,
  `definition` text NOT NULL,
  `type` varchar(255) NOT NULL,
  `acces` varchar(255) NOT NULL,
  `adresse` varchar(255) NOT NULL,
  `moyen_acces` varchar(255) NOT NULL,
  `nom_ref` varchar(255) NOT NULL,
  `prenom_ref` varchar(255) NOT NULL,
  `fonction_ref` varchar(255) NOT NULL,
  `tel_ref` varchar(10) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

--
-- Index pour les tables exportées
--

--
-- Index pour la table `wp_tuts_offre`
--
ALTER TABLE `wp_tuts_offre`
 ADD PRIMARY KEY (`id_offre`);

--
-- AUTO_INCREMENT pour les tables exportées
--

--
-- AUTO_INCREMENT pour la table `wp_tuts_offre`
--
ALTER TABLE `wp_tuts_offre`
MODIFY `id_offre` int(11) NOT NULL AUTO_INCREMENT;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
