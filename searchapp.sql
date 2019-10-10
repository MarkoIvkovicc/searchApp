-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Oct 10, 2019 at 08:53 PM
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
) ENGINE=MyISAM AUTO_INCREMENT=23 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `developertype`
--

INSERT INTO `developertype` (`id`, `name`) VALUES
(1, 'FrontEnd'),
(2, 'FrontEnd'),
(3, 'FrontEnd'),
(4, 'FrontEnd'),
(5, 'FrontEnd'),
(6, 'FrontEnd'),
(7, 'FrontEnd'),
(8, 'FrontEnd'),
(9, 'FrontEnd'),
(10, 'BackEnd'),
(11, 'BackEnd'),
(12, 'BackEnd'),
(13, 'BackEnd'),
(14, 'BackEnd'),
(15, 'BackEnd'),
(16, 'BackEnd'),
(17, 'BackEnd'),
(18, 'BackEnd'),
(19, 'BackEnd'),
(20, 'BackEnd'),
(21, 'BackEnd'),
(22, 'FrontEnd');

-- --------------------------------------------------------

--
-- Table structure for table `framework`
--

DROP TABLE IF EXISTS `framework`;
CREATE TABLE IF NOT EXISTS `framework` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` text COLLATE utf8mb4_unicode_ci,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=23 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `framework`
--

INSERT INTO `framework` (`id`, `name`) VALUES
(1, ''),
(2, 'AngularJs'),
(3, 'Angular2'),
(4, ''),
(5, 'ReactNative'),
(6, ''),
(7, 'AngularJs'),
(8, 'Angular2'),
(9, 'ReactNative'),
(10, ''),
(11, 'Symfony'),
(12, 'Symfony'),
(13, 'Laravel'),
(14, 'Laravel'),
(15, ''),
(16, 'Express'),
(17, 'NestJs'),
(18, 'Symfony'),
(19, 'Laravel'),
(20, 'NestJs'),
(21, 'Laravel'),
(22, 'ReactNative');

-- --------------------------------------------------------

--
-- Table structure for table `programminglanguage`
--

DROP TABLE IF EXISTS `programminglanguage`;
CREATE TABLE IF NOT EXISTS `programminglanguage` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` text COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=23 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `programminglanguage`
--

INSERT INTO `programminglanguage` (`id`, `name`) VALUES
(1, 'Angular'),
(2, 'Angular'),
(3, 'Angular'),
(4, 'React'),
(5, 'React'),
(6, 'Vue'),
(7, 'Angular'),
(8, 'Angular'),
(9, 'React'),
(10, 'Php'),
(11, 'Php'),
(12, 'Php'),
(13, 'Php'),
(14, 'Php'),
(15, 'NodeJs'),
(16, 'NodeJs'),
(17, 'NodeJs'),
(18, 'Php'),
(19, 'Php'),
(20, 'NodeJs'),
(21, 'Php'),
(22, 'React');

-- --------------------------------------------------------

--
-- Table structure for table `subframework`
--

DROP TABLE IF EXISTS `subframework`;
CREATE TABLE IF NOT EXISTS `subframework` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` text COLLATE utf8mb4_unicode_ci,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=23 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `subframework`
--

INSERT INTO `subframework` (`id`, `name`) VALUES
(1, ''),
(2, ''),
(3, ''),
(4, ''),
(5, ''),
(6, ''),
(7, ''),
(8, ''),
(9, ''),
(10, ''),
(11, ''),
(12, 'Silex'),
(13, ''),
(14, 'Lumen'),
(15, ''),
(16, ''),
(17, ''),
(18, 'Silex'),
(19, 'Lumen'),
(20, ''),
(21, NULL),
(22, NULL);

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
  UNIQUE KEY `email` (`email`(50)),
  KEY `developerId` (`developerId`,`progLangId`,`frameworkId`,`subFrameworkId`)
) ENGINE=MyISAM AUTO_INCREMENT=23 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `email`, `name`, `password`, `developerId`, `progLangId`, `frameworkId`, `subFrameworkId`) VALUES
(1, 'markomikic@mail.com', 'Marko Mikic', '12345678', 1, 1, 1, 1),
(2, 'vukvukic@mail.com', 'Vuk Vulic', '23456789', 2, 2, 2, 2),
(3, 'nikolaperic@mail.com', 'Nikola Peric', '34567890', 3, 3, 3, 3),
(4, 'acatopic@mail.com', 'Aca Topic', '45678901', 4, 4, 4, 4),
(5, 'anavesic@mail.com', 'Ana Vesic', '56789012', 5, 5, 5, 5),
(6, 'markorodic@mail.com', 'Marko Rodic', '67890123', 6, 6, 6, 6),
(7, 'vukmikic@gmail.com', 'Vuk Mikic', '78901234', 7, 7, 7, 7),
(8, 'nikolavulic@gmail.com', 'Nikola Vulic', '89012345', 8, 8, 8, 8),
(9, 'acaperic@gmail.com', 'Aca Peric', '90123456', 9, 9, 9, 9),
(10, 'anatopic@gmail.com', 'Ana Topic', '0123456789', 10, 10, 10, 10),
(11, 'markovesic@gmail.com', 'Marko Vesic', '012345678', 11, 11, 11, 11),
(12, 'vukrodic@gmail.com', 'Vuk Rodic', '023456789', 12, 12, 12, 12),
(13, 'nikolamikic@example.com', 'Nikola Mikic', '034567890', 13, 13, 13, 13),
(14, 'acavulic@example.com', 'Aca Vulic', '045678901', 14, 14, 14, 14),
(15, 'anaperic@example.com', 'Ana Peric', '056789012', 15, 15, 15, 15),
(16, 'markotopic@example.com', 'Marko Topic', '0067890123', 16, 16, 16, 16),
(17, 'vukvesic@example.com', 'Vuk Vesic', '078901234', 17, 17, 17, 17),
(18, 'nikolarodic@example.com', 'Nikola Rodic', '089012345', 18, 18, 18, 18),
(19, 'acamikic@hotmail.com', 'Aca Mikic', '090123456', 19, 19, 19, 19),
(20, 'anavulic@hotmail.com', 'Ana Vulic', '00123456789', 20, 20, 20, 20),
(21, 'vujaperic12@yahoo.com', 'Vuja Peric', 'sifrazatest', 21, 21, 21, 21),
(22, 'milan1990@example.com', 'Milan Rakic', 'mrakic', 22, 22, 22, 22);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
