-- phpMyAdmin SQL Dump
-- version 4.7.9
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Creato il: Set 30, 2018 alle 14:42
-- Versione del server: 5.7.21
-- Versione PHP: 5.6.35

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ang_home_page`
--

-- --------------------------------------------------------

--
-- Struttura della tabella `navbar_pages`
--

DROP TABLE IF EXISTS `navbar_pages`;
CREATE TABLE IF NOT EXISTS `navbar_pages` (
  `path` varchar(50) NOT NULL,
  `name` varchar(50) NOT NULL,
  `seq_navbar_pages` int(11) NOT NULL AUTO_INCREMENT,
  PRIMARY KEY (`seq_navbar_pages`),
  UNIQUE KEY `seq_navbar_pages_3` (`seq_navbar_pages`),
  KEY `seq_navbar_pages` (`seq_navbar_pages`),
  KEY `seq_navbar_pages_2` (`seq_navbar_pages`)
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

--
-- Dump dei dati per la tabella `navbar_pages`
--

INSERT INTO `navbar_pages` (`path`, `name`, `seq_navbar_pages`) VALUES
('home', 'Home', 1),
('about_me', 'Chi sono', 2),
('about_my_work', 'Di cosa mi occupo', 3),
('contact', 'Contatti', 4);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
