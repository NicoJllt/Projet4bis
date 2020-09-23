-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 23, 2020 at 02:23 PM
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
  `next` int(11) DEFAULT NULL COMMENT 'Episode Suivant',
  `user_id` int(11) NOT NULL COMMENT 'id auteur'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `episodes`
--

INSERT INTO `episodes` (`episodeId`, `title`, `content`, `dateEpisode`, `previous`, `next`, `user_id`) VALUES
(1, 'Épisode 1', 'Contenu épisode 1', '2020-06-09 13:24:42', NULL, 2, 1),
(2, 'Épisode 2', 'Contenu épisode 2', '2020-05-18 16:43:56', 1, 3, 1),
(3, 'Épisode 3', 'Contenu épisode 3', '2020-05-18 16:44:08', 2, 4, 1),
(4, 'Épisode 4', 'Contenu épisode 4', '2020-05-18 16:44:24', 3, 5, 1),
(5, 'Épisode 5', 'Contenu épisode 5', '2020-05-18 16:45:05', 4, 6, 1),
(6, 'Épisode 6', 'Contenu épisode 6', '2020-05-18 16:45:19', 5, 7, 1),
(7, 'Épisode 7', 'Contenu épisode 7', '2020-05-18 16:45:31', 6, 8, 1),
(8, 'Épisode 8', 'Contenu épisode 8', '2020-06-09 13:37:53', 7, 9, 1),
(9, 'Épisode 9', 'Contenu épisode 9', '2020-06-09 13:38:00', 8, 10, 1),
(10, 'Épisode 10', 'Contenu épisode 10', '2020-06-09 13:38:10', 9, 11, 1),
(11, 'Épisode 11', 'Contenu épisode 11', '2020-06-09 13:38:40', 10, 12, 1),
(12, 'Épisode 12', 'Contenu épisode 12', '2020-06-09 13:38:50', 11, NULL, 1),
(13, 'essai', '<p>test</p>', '2020-07-21 17:26:08', NULL, 14, 1);

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
  `flag` tinyint(1) NOT NULL DEFAULT 0 COMMENT 'signaler un commentaire'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `messages`
--

INSERT INTO `messages` (`messageId`, `dateMessage`, `idUser`, `idEpisode`, `idMessage`, `content`, `flag`) VALUES
(9, '2020-09-16 12:39:54', 1, 1, NULL, 'Salut', 0);

-- --------------------------------------------------------

--
-- Table structure for table `role`
--

CREATE TABLE `role` (
  `roleId` int(11) NOT NULL COMMENT 'id role',
  `name` varchar(15) NOT NULL COMMENT 'nom role'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `role`
--

INSERT INTO `role` (`roleId`, `name`) VALUES
(1, 'admin'),
(2, 'user');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `userId` int(11) NOT NULL,
  `username` varchar(50) NOT NULL COMMENT 'Identifiant de l''utilisateur',
  `mail` varchar(50) NOT NULL COMMENT 'Mail de l''utilisateur',
  `password` varchar(256) NOT NULL COMMENT 'mot de passe de l''utilisateur',
  `registrationDate` datetime NOT NULL DEFAULT current_timestamp() COMMENT 'Date d''inscription',
  `idRole` int(11) NOT NULL COMMENT 'role id'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`userId`, `username`, `mail`, `password`, `registrationDate`, `idRole`) VALUES
(1, 'Nico', 'juillet.n@hotmail.fr', '$2y$10$.YRxZWbKONRE89Iz4eQouOIjlBUiz74XiYpEwJHB8H5eNO7qf7PsG', '2020-09-16 11:05:27', 1),
(6, 'NicoJ', '', '$2y$10$.YRxZWbKONRE89Iz4eQouOIjlBUiz74XiYpEwJHB8H5eNO7qf7PsG', '2020-09-16 14:37:41', 2);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `episodes`
--
ALTER TABLE `episodes`
  ADD PRIMARY KEY (`episodeId`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `messages`
--
ALTER TABLE `messages`
  ADD PRIMARY KEY (`messageId`),
  ADD KEY `id_user` (`idUser`,`idEpisode`),
  ADD KEY `id_message_2` (`idMessage`),
  ADD KEY `id_news` (`idEpisode`);

--
-- Indexes for table `role`
--
ALTER TABLE `role`
  ADD PRIMARY KEY (`roleId`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`userId`),
  ADD UNIQUE KEY `login` (`username`),
  ADD UNIQUE KEY `mail_2` (`mail`),
  ADD KEY `mail` (`mail`),
  ADD KEY `fk_role_id` (`idRole`);

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
  MODIFY `messageId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `role`
--
ALTER TABLE `role`
  MODIFY `roleId` int(11) NOT NULL AUTO_INCREMENT COMMENT 'id role', AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `userId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `episodes`
--
ALTER TABLE `episodes`
  ADD CONSTRAINT `episodes_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`userId`) ON DELETE NO ACTION ON UPDATE CASCADE;

--
-- Constraints for table `messages`
--
ALTER TABLE `messages`
  ADD CONSTRAINT `messages_ibfk_1` FOREIGN KEY (`idUser`) REFERENCES `users` (`userId`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `messages_ibfk_2` FOREIGN KEY (`idMessage`) REFERENCES `messages` (`messageId`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `messages_ibfk_3` FOREIGN KEY (`idEpisode`) REFERENCES `episodes` (`episodeId`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `fk_role_id` FOREIGN KEY (`idRole`) REFERENCES `role` (`roleId`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
