-- phpMyAdmin SQL Dump
-- version 3.2.0.1
-- http://www.phpmyadmin.net
--
-- Serveur: localhost
-- Généré le : Lun 22 Janvier 2024 à 12:52
-- Version du serveur: 5.1.36
-- Version de PHP: 5.3.0

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de données: `gestion_scolaire_universite`
--

-- --------------------------------------------------------

--
-- Structure de la table `cours`
--

CREATE TABLE IF NOT EXISTS `cours` (
  `Num_Cours` int(10) NOT NULL AUTO_INCREMENT,
  `Nom` text NOT NULL,
  `Num_Enseignant` int(10) NOT NULL,
  `Num_Etu` varchar(10) NOT NULL,
  PRIMARY KEY (`Num_Cours`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=5 ;

--
-- Contenu de la table `cours`
--

INSERT INTO `cours` (`Num_Cours`, `Nom`, `Num_Enseignant`, `Num_Etu`) VALUES
(2, 'Français', 2, 'P322660'),
(3, 'Anglais', 3, 'P311010'),
(4, 'Philo', 4, 'P321212');

-- --------------------------------------------------------

--
-- Structure de la table `etudiant`
--

CREATE TABLE IF NOT EXISTS `etudiant` (
  `NumEtu` varchar(10) NOT NULL,
  `Prenom` text NOT NULL,
  `Nom` text NOT NULL,
  `Date_naissance` date NOT NULL,
  `Adresse` varchar(20) NOT NULL,
  `Numero_de_telephone` int(20) NOT NULL,
  `Email` varchar(30) NOT NULL,
  `NOTE` int(6) NOT NULL,
  `Niveau` varchar(4) NOT NULL,
  `Formation` varchar(10) NOT NULL,
  PRIMARY KEY (`NumEtu`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Contenu de la table `etudiant`
--

INSERT INTO `etudiant` (`NumEtu`, `Prenom`, `Nom`, `Date_naissance`, `Adresse`, `Numero_de_telephone`, `Email`, `NOTE`, `Niveau`, `Formation`) VALUES
('P311010', 'Barra', 'Sall', '2000-02-10', 'Dakar', 785002525, 'sall.barra@ugb.edu.sn', 16, 'Lice', 'SEG'),
('P312260', 'Babacar', 'Ba', '2005-01-06', 'Matam', 778551000, 'ba.babacar@ugb.edu.sn', 18, 'Lice', 'SJP'),
('P312660', 'Amadou', 'Cisse', '1999-01-01', 'Saint_louis', 778925563, 'cisse.amadou@ugb.edu.sn', 11, 'Lice', 'SAT'),
('P321212', 'Mbaye', 'Fall', '2008-01-04', 'Kolda', 772002321, 'fall.Mbaye@ugb.edu.sn', 12, 'Mast', 'LSH'),
('P332620', 'Ousseynou', 'Sy', '2001-04-07', 'Kaolack', 768554100, 'sy.ousseynou@ugb.edu.sn', 16, 'Mast', 'LEA'),
('P341010', 'Modou', 'Sarr', '2005-02-10', 'Fatick', 775581012, 'sarr.modou@ugb.edu.sn', 10, 'Doct', 'SES');

-- --------------------------------------------------------

--
-- Structure de la table `professeur`
--

CREATE TABLE IF NOT EXISTS `professeur` (
  `NumProf` int(10) NOT NULL AUTO_INCREMENT,
  `Prenom` varchar(20) NOT NULL,
  `Nom` varchar(15) NOT NULL,
  `Date_naissance` date NOT NULL,
  `Adresse` varchar(20) NOT NULL,
  `Numero_de_telephone` int(20) NOT NULL,
  `Email` varchar(30) NOT NULL,
  PRIMARY KEY (`NumProf`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=34 ;

--
-- Contenu de la table `professeur`
--

INSERT INTO `professeur` (`NumProf`, `Prenom`, `Nom`, `Date_naissance`, `Adresse`, `Numero_de_telephone`, `Email`) VALUES
(1, 'Fara', 'Sene', '1999-01-01', 'Saint_louis', 758451012, 'sene.fara@ugb.edu.sn'),
(2, 'Baba', 'Faye', '1990-01-07', 'Kolda', 702001414, 'faye.baba@ugb.edu.sn'),
(3, 'Babacar', 'Diop', '1991-01-09', 'Kaolack', 750201012, 'diop.babacar@ugb.edu.sn'),
(4, 'Dame', 'Sy', '1994-01-03', 'Kolda', 701234554, 'sy.dame@ugb.edu.sn'),
(33, 'cheih', 'diame', '1996-02-02', 'kolda', 778925563, 'diame.cheih@ugb.edu.sn');
