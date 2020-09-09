-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 09, 2020 at 05:38 PM
-- Server version: 10.4.13-MariaDB
-- PHP Version: 7.4.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `projet4`
--

-- --------------------------------------------------------

--
-- Table structure for table `episodes`
--

CREATE TABLE `episodes` (
  `episodeId` int(11) NOT NULL,
  `title` varchar(150) NOT NULL COMMENT 'Titre de la news',
  `content` text NOT NULL COMMENT 'Contenu de la news',
  `dateEpisode` timestamp NOT NULL DEFAULT current_timestamp() COMMENT 'Date de dernière modification',
  `previous` int(11) DEFAULT NULL COMMENT 'Episode précédent',
  `next` int(11) DEFAULT NULL COMMENT 'Episode Suivant'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `episodes`
--

INSERT INTO `episodes` (`episodeId`, `title`, `content`, `dateEpisode`, `previous`, `next`) VALUES
(1, 'Épisode 1', 'Contenu épisode 1', '2020-06-09 13:24:42', NULL, 2),
(2, 'Épisode 2', 'Contenu épisode 2', '2020-05-18 16:43:56', 1, 3),
(3, 'Épisode 3', 'Contenu épisode 3', '2020-05-18 16:44:08', 2, 4),
(4, 'Épisode 4', 'Contenu épisode 4', '2020-05-18 16:44:24', 3, 5),
(5, 'Épisode 5', 'Contenu épisode 5', '2020-05-18 16:45:05', 4, 6),
(6, 'Épisode 6', 'Contenu épisode 6', '2020-05-18 16:45:19', 5, 7),
(7, 'Épisode 7', 'Contenu épisode 7', '2020-05-18 16:45:31', 6, 8),
(8, 'Épisode 8', 'Contenu épisode 8', '2020-06-09 13:37:53', 7, 9),
(9, 'Épisode 9', 'Contenu épisode 9', '2020-06-09 13:38:00', 8, 10),
(10, 'Épisode 10', 'Contenu épisode 10', '2020-06-09 13:38:10', 9, 11),
(11, 'Épisode 11', 'Contenu épisode 11', '2020-06-09 13:38:40', 10, 12),
(12, 'Épisode 12', 'Contenu épisode 12', '2020-06-09 13:38:50', 11, NULL),
(13, 'essai', '<p>test</p>', '2020-07-21 17:26:08', NULL, 14);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `episodes`
--
ALTER TABLE `episodes`
  ADD PRIMARY KEY (`episodeId`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `episodes`
--
ALTER TABLE `episodes`
  MODIFY `episodeId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
