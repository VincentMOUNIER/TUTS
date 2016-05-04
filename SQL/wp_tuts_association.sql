-- phpMyAdmin SQL Dump
-- version 4.2.7.1
-- http://www.phpmyadmin.net
--
-- Client :  localhost
-- Généré le :  Jeu 21 Avril 2016 à 09:58
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
  `num_id` varchar(255) DEFAULT NULL,
  `ass_referente` varchar(255) DEFAULT NULL,
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
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=35 ;

--
-- Contenu de la table `wp_tuts_association`
--

INSERT INTO `wp_tuts_association` (`id_association`, `login`, `mdp`, `num_id`, `ass_referente`, `nom`, `adresse`, `site_web`, `nom_ref`, `prenom_ref`, `fonction_ref`, `tel_ref`, `email_ref`, `mission`, `activite`, `valeur`, `projet`, `act_id`, `validation`) VALUES
(8, 'TUTS5716312849be4', '4PV3yVS0A', '159784532', NULL, 'Association des Supers Dev ', '1 rue de la baleine, Ocean Pacifique', 'www.superbaleine.org', 'Phommavanh', 'Kevin', 'Jeune Dev', '0602338968', 'phommavanh.kevin@gmail.com', 'SuperMission1', 'SuperActivity1', 'SuperValeurs1', 'SuperProjet1', 0, 0),
(6, 'TUTS5715e85b27556', 'BmhqW45fK37', 'azazheyheyea1ze896azaz', NULL, 'Association des Supers Dev ou pas ', '1 rue de la baleine, Ocean Pacifique', 'www.superbaleine.org', 'Phommavanh', 'Kevin', 'Jeune Dev', '0602338968', 'phommavanh.kevin@gmail.com', 'SuperMission', 'SuperActivity', 'SuperValeurs', 'SuperProjet', 0, 1),
(9, 'TUTS57163494a933f', 'BFpzevJzqk', '1597845324545', NULL, 'Association des Supers Dev 2', '1 rue de la baleine, Ocean Pacifique', 'www.superbaleine.org', 'Phommavanh', 'Kevin', 'Jeune Dev', '0602338968', 'phommavanh.kevin@gmail.com', 'SuperMission12', 'SuperActivity12', 'SuperValeurs12', 'SuperProjet12', 0, 0),
(10, 'TUTS571634a163b98', 'o5%XY7JaENG+', '159784532454522', NULL, 'Association des Supers Dev 3', '1 rue de la baleine, Ocean Pacifique', 'www.superbaleine.org', 'Phommavanh', 'Kevin', 'Jeune Dev', '0602338968', 'phommavanh.kevin@gmail.com', 'SuperMission123', 'SuperActivity123', 'SuperValeurs123', 'SuperProjet123', 0, 0),
(34, 'TUTS571790fcb6f7f', 'jdefWuZMa', NULL, 'juihijojoo', 'zadazd', 'azdazd', 'azeazeaeaze', 'azeazezaeaze', 'azeazeazea', 'zeazeazeaze', '0602338968', 'azeazeaze@com.com', 'azeazeaze', 'azeazeazeazeaz', 'eazeazezaeaz', 'eazezaezae', 0, 0),
(29, 'TUTS57176c860d3ec', '5yno9V7pujm', '1za5ea1ze896', NULL, 'Prout Association', '4 Rue Zadar Quartier des Ors', 'www.prout.com', 'Thu-Sang', 'NGUYEN', 'Proutation ultime', '0648836039', 'tumyuk@gmail.com', 'sdfggergreger', 'gegrzefegreg', 'azefregregrega', 'zerzeregregregzgrg', 0, 0),
(32, 'TUTS5717859e3c585', '@?AboopS$f', '', NULL, '', '', '', '', '', '', '', '', '', '', '', '', 0, 0),
(33, 'TUTS57178cd10acbc', 'C&kLths?&', 'azeazeaze', NULL, 'azeazezae', 'qsdqdscdcs', 'azeazeaze', 'azeazeaz', 'eazeazea', 'zeazeazea', 'zeazeazea', 'zeazeazeaze@azeazeae.com', 'azeaze', 'azeazeaze', 'azezeazeaz', 'eazeazeazeazeaze', 0, 0),
(24, 'TUTS57176847e44eb', '3RYK?4dOzGwx', NULL, 'super dev1', 'Prout Association', '4 Rue Zadar Quartier des Ors', 'www.prout.com', 'Thu-Sang', 'NGUYEN', 'Proutation ultime', '0648836039', 'tumyuk@gmail.com', 'sdfggergreger', 'gegrzefegreg', 'azefregregrega', 'zerzeregregregzgrg', 0, 0);

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
MODIFY `id_association` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=35;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
