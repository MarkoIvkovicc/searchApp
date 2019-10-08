-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Oct 08, 2019 at 03:41 PM
-- Server version: 5.7.26
-- PHP Version: 7.2.18

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `searchapp`
--

-- --------------------------------------------------------

--
-- Table structure for table `developertype`
--

DROP TABLE IF EXISTS `developertype`;
CREATE TABLE IF NOT EXISTS `developertype` (
  `id` mediumint(9) NOT NULL AUTO_INCREMENT,
  `name` text COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=14 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `developertype`
--

INSERT INTO `developertype` (`id`, `name`) VALUES
(1, 'backEnd'),
(2, 'frontEnd');

-- --------------------------------------------------------

--
-- Table structure for table `framework`
--

DROP TABLE IF EXISTS `framework`;
CREATE TABLE IF NOT EXISTS `framework` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` text COLLATE utf8mb4_unicode_ci,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `framework`
--

INSERT INTO `framework` (`id`, `name`) VALUES
(1, 'laravel'),
(2, 'react native');

-- --------------------------------------------------------

--
-- Table structure for table `programminglanguage`
--

DROP TABLE IF EXISTS `programminglanguage`;
CREATE TABLE IF NOT EXISTS `programminglanguage` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` text COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `programminglanguage`
--

INSERT INTO `programminglanguage` (`id`, `name`) VALUES
(1, 'php'),
(2, 'react');

-- --------------------------------------------------------

--
-- Table structure for table `subframework`
--

DROP TABLE IF EXISTS `subframework`;
CREATE TABLE IF NOT EXISTS `subframework` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` text COLLATE utf8mb4_unicode_ci,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `subframework`
--

INSERT INTO `subframework` (`id`, `name`) VALUES
(1, 'lumen');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `id` mediumint(6) NOT NULL AUTO_INCREMENT,
  `email` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `developerId` int(11) DEFAULT NULL,
  `progLangId` int(11) DEFAULT NULL,
  `frameworkId` int(11) DEFAULT NULL,
  `subFrameworkId` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `id` (`id`),
  KEY `developerId` (`developerId`,`progLangId`,`frameworkId`,`subFrameworkId`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `email`, `name`, `password`, `developerId`, `progLangId`, `frameworkId`, `subFrameworkId`) VALUES
(1, 'marko@mail.com', 'Marko', '12345678', 1, 1, 1, 1),
(2, 'vuk@mail.com', 'Vuk', '87654321', 2, 2, 2, 2),
(3, 'nikola@mail.com', 'Nikola', '132424534', 3, 3, 3, 3);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
