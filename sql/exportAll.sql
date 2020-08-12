-- phpMyAdmin SQL Dump
-- version 4.9.5
-- https://www.phpmyadmin.net/
--
-- Host: db5000269963.hosting-data.io
-- Generation Time: Aug 04, 2020 at 12:23 PM
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
-- Table structure for table `episodes`
--

CREATE TABLE `episodes` (
  `episodeId` int(11) NOT NULL,
  `title` varchar(150) NOT NULL COMMENT 'Titre de la news',
  `content` text NOT NULL COMMENT 'Contenu de la news',
  `dateNews` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP COMMENT 'Date de dernière modification',
  `previous` int(11) DEFAULT NULL COMMENT 'Episode précédent',
  `next` int(11) DEFAULT NULL COMMENT 'Episode Suivant'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `episodes`
--

INSERT INTO `episodes` (`episodeId`, `title`, `content`, `dateNews`, `previous`, `next`) VALUES
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
(13, 'essai', '<p>test</p>', '2020-07-21 17:26:08', NULL, 14),
(14, 'jh xcuvhj', '<p>udvhisduvhesihvos</p>', '2020-07-21 17:26:08', NULL, NULL);

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

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `userId` int(11) NOT NULL,
  `username` varchar(50) NOT NULL COMMENT 'Identifiant de l''utilisateur',
  `mail` varchar(50) NOT NULL COMMENT 'Mail de l''utilisateur',
  `password` varchar(256) NOT NULL COMMENT 'mot de passe de l''utilisateur',
  `registrationDate` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP COMMENT 'Date d''inscription'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`userId`, `username`, `mail`, `password`, `registrationDate`) VALUES
(1, 'admin', 'admin@admin.fr', 'admin', '0000-00-00 00:00:00'),
(2, 'toto', 'toto@toto.fr', 'toto', '0000-00-00 00:00:00'),
(3, 'tata', 'tata@tata.fr', 'tata', '0000-00-00 00:00:00'),
(4, 'toutou', 'toutou@toutou.fr', 'toutou', '0000-00-00 00:00:00'),
(5, 'titi', 'titi@titi.fr', 'titi', '0000-00-00 00:00:00');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `episodes`
--
ALTER TABLE `episodes`
  ADD PRIMARY KEY (`episodeId`);

--
-- Indexes for table `messages`
--
ALTER TABLE `messages`
  ADD PRIMARY KEY (`messageId`),
  ADD KEY `id_user` (`idUser`,`idNews`),
  ADD KEY `id_message_2` (`idMessage`),
  ADD KEY `id_news` (`idNews`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`userId`),
  ADD UNIQUE KEY `login` (`username`),
  ADD UNIQUE KEY `mail_2` (`mail`),
  ADD KEY `mail` (`mail`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `episodes`
--
ALTER TABLE `episodes`
  MODIFY `episodeId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `messages`
--
ALTER TABLE `messages`
  MODIFY `messageId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `userId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

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
