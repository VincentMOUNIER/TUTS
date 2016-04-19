-- phpMyAdmin SQL Dump
-- version 4.2.7.1
-- http://www.phpmyadmin.net
--
-- Client :  localhost
-- Généré le :  Lun 18 Avril 2016 à 13:52
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
-- Structure de la table `wp_tuts_association`
--

CREATE TABLE IF NOT EXISTS `wp_tuts_association` (
`id_association` int(11) NOT NULL,
  `login` varchar(255) NOT NULL,
  `mdp` varchar(255) NOT NULL,
  `num_id` int(11) NOT NULL,
  `nom` varchar(255) NOT NULL,
  `adresse` varchar(255) NOT NULL,
  `site_web` varchar(255) NOT NULL,
  `nom_ref` varchar(255) NOT NULL,
  `prenom_ref` varchar(255) NOT NULL,
  `fonction_ref` varchar(255) NOT NULL,
  `tel_ref` varchar(10) NOT NULL,
  `email_ref` varchar(100) NOT NULL,
  `mission` text NOT NULL,
  `activite` text NOT NULL,
  `valeur` text NOT NULL,
  `projet` text NOT NULL,
  `act_id` int(11) NOT NULL,
  `validation` int(11) NOT NULL DEFAULT '0'
) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

--
-- Index pour les tables exportées
--

--
-- Index pour la table `wp_tuts_association`
--
ALTER TABLE `wp_tuts_association`
 ADD PRIMARY KEY (`id_association`);

--
-- AUTO_INCREMENT pour les tables exportées
--

--
-- AUTO_INCREMENT pour la table `wp_tuts_association`
--
ALTER TABLE `wp_tuts_association`
MODIFY `id_association` int(11) NOT NULL AUTO_INCREMENT;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
