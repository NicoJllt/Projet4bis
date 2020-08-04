-- phpMyAdmin SQL Dump
-- version 4.9.5
-- https://www.phpmyadmin.net/
--
-- Host: db5000269963.hosting-data.io
-- Generation Time: Jul 31, 2020 at 02:10 PM
-- Server version: 5.7.30-log
-- PHP Version: 7.0.33-0+deb9u8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `dbs263509`
--

-- --------------------------------------------------------

--
-- Table structure for table `messages`
--

CREATE TABLE `messages` (
  `messageId` int(11) NOT NULL,
  `dateMessage` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP COMMENT 'Date de dernière modification du message',
  `idUser` int(11) NOT NULL COMMENT 'Identifiant de l''utilisateur auteur du message',
  `idNews` int(11) NOT NULL COMMENT 'identifiant de la news commentée',
  `idMessage` int(11) DEFAULT NULL COMMENT 'identifiant du message auquel ce message répond. NULL pour un message ''racine''',
  `content` text NOT NULL COMMENT 'Contenu du message',
  `markedMessage` tinyint(1) NOT NULL DEFAULT '0' COMMENT 'signaler un commentaire'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `messages`
--

INSERT INTO `messages` (`messageId`, `dateMessage`, `idUser`, `idNews`, `idMessage`, `content`, `markedMessage`) VALUES
(6, '2020-01-22 14:49:53', 1, 1, NULL, 'comment 1', 0),
(7, '2020-01-22 14:50:11', 2, 1, 6, 'comment reponse', 0),
(8, '2020-01-22 14:50:22', 2, 2, NULL, 'comment source\r\n', 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `messages`
--
ALTER TABLE `messages`
  ADD PRIMARY KEY (`messageId`),
  ADD KEY `id_user` (`idUser`,`idNews`),
  ADD KEY `id_message_2` (`idMessage`),
  ADD KEY `id_news` (`idNews`);

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
  ADD CONSTRAINT `messages_ibfk_3` FOREIGN KEY (`idNews`) REFERENCES `episodes` (`episodeId`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
