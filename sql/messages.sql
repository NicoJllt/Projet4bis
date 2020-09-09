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
-- Table structure for table `messages`
--

CREATE TABLE `messages` (
  `messageId` int(11) NOT NULL,
  `dateMessage` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp() COMMENT 'Date de dernière modification du message',
  `idUser` int(11) NOT NULL COMMENT 'Identifiant de l''utilisateur auteur du message',
  `idEpisode` int(11) NOT NULL COMMENT 'identifiant de la news commentée',
  `idMessage` int(11) DEFAULT NULL COMMENT 'identifiant du message auquel ce message répond. NULL pour un message ''racine''',
  `content` text NOT NULL COMMENT 'Contenu du message',
  `markedMessage` tinyint(1) NOT NULL DEFAULT 0 COMMENT 'signaler un commentaire'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `messages`
--

INSERT INTO `messages` (`messageId`, `dateMessage`, `idUser`, `idEpisode`, `idMessage`, `content`, `markedMessage`) VALUES
(6, '2020-09-01 10:24:29', 1, 1, NULL, 'comment 1', 0),
(7, '2020-09-01 10:24:41', 2, 1, 6, 'comment reponse', 0),
(8, '2020-09-01 10:24:51', 2, 2, NULL, 'comment source\r\n', 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `messages`
--
ALTER TABLE `messages`
  ADD PRIMARY KEY (`messageId`),
  ADD KEY `id_user` (`idUser`,`idEpisode`),
  ADD KEY `id_message_2` (`idMessage`),
  ADD KEY `id_news` (`idEpisode`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `messages`
--
ALTER TABLE `messages`
  MODIFY `messageId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `messages`
--
ALTER TABLE `messages`
  ADD CONSTRAINT `messages_ibfk_1` FOREIGN KEY (`idUser`) REFERENCES `users` (`userId`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `messages_ibfk_2` FOREIGN KEY (`idMessage`) REFERENCES `messages` (`messageId`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `messages_ibfk_3` FOREIGN KEY (`idEpisode`) REFERENCES `episodes` (`episodeId`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
