-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 07, 2020 at 02:04 PM
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
-- Table structure for table `episode`
--

CREATE TABLE `episode` (
  `episodeId` int(11) NOT NULL,
  `title` varchar(150) NOT NULL COMMENT 'Titre de la news',
  `content` text NOT NULL COMMENT 'Contenu de la news',
  `dateEpisode` timestamp NOT NULL DEFAULT current_timestamp() COMMENT 'Date de dernière modification',
  `idAuthor` int(11) NOT NULL COMMENT 'id auteur'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `episode`
--

INSERT INTO `episode` (`episodeId`, `title`, `content`, `dateEpisode`, `idAuthor`) VALUES
(1, 'Épisode 1', 'Contenu épisode 1', '2020-06-09 13:24:42', 1),
(2, 'Épisode 2', 'Contenu épisode 2', '2020-05-18 16:43:56', 1),
(3, 'Épisode 3', 'Contenu épisode 3', '2020-05-18 16:44:08', 1),
(4, 'Épisode 4', 'Contenu épisode 4', '2020-05-18 16:44:24', 1),
(5, 'Épisode 5', 'Contenu épisode 5', '2020-05-18 16:45:05', 1),
(6, 'Épisode 6', 'Contenu épisode 6', '2020-05-18 16:45:19', 1),
(7, 'Épisode 7', 'Contenu épisode 7', '2020-05-18 16:45:31', 1),
(8, 'Épisode 8', 'Contenu épisode 8', '2020-06-09 13:37:53', 1),
(9, 'Épisode 9', 'Contenu épisode 9', '2020-06-09 13:38:00', 1),
(10, 'Épisode 10', 'Contenu épisode 10', '2020-06-09 13:38:10', 1),
(11, 'Épisode 11', 'Contenu épisode 11', '2020-06-09 13:38:40', 1),
(12, 'Épisode 12', 'Contenu épisode 12', '2020-06-09 13:38:50', 1);

-- --------------------------------------------------------

--
-- Table structure for table `message`
--

CREATE TABLE `message` (
  `messageId` int(11) NOT NULL,
  `content` text NOT NULL COMMENT 'Contenu du message',
  `dateMessage` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp() COMMENT 'Date de dernière modification du message',
  `flag` tinyint(1) NOT NULL DEFAULT 0 COMMENT 'signaler un commentaire',
  `idEpisode` int(11) NOT NULL COMMENT 'id de l''épisode concerné',
  `idAuthor` int(11) NOT NULL COMMENT 'Identifiant de l''utilisateur auteur du message'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `message`
--

INSERT INTO `message` (`messageId`, `content`, `dateMessage`, `flag`, `idEpisode`, `idAuthor`) VALUES
(9, 'Salut', '2020-09-28 09:38:53', 0, 1, 1),
(25, 'test', '2020-10-04 13:46:15', 0, 12, 1),
(26, 'TEST 2', '2020-10-04 13:48:31', 0, 12, 14),
(27, 'Slt', '2020-10-04 17:56:30', 0, 12, 1),
(28, 'Bjr', '2020-10-04 17:57:07', 0, 12, 1);

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
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `userId` int(11) NOT NULL,
  `username` varchar(50) NOT NULL COMMENT 'Identifiant de l''utilisateur',
  `mail` varchar(50) NOT NULL COMMENT 'Mail de l''utilisateur',
  `password` varchar(256) NOT NULL COMMENT 'mot de passe de l''utilisateur',
  `registrationDate` datetime NOT NULL DEFAULT current_timestamp() COMMENT 'Date d''inscription',
  `idRole` int(11) NOT NULL COMMENT 'role id'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`userId`, `username`, `mail`, `password`, `registrationDate`, `idRole`) VALUES
(1, 'Nico', 'juillet.n@hotmail.fr', '$2y$10$ug5WRSnB4X9jideQIdyIA.yUsT6ccbTJi8azb0xjucn20ZlKaG31W', '2020-09-16 11:05:27', 1),
(10, 'NicoJ', 'test@hotmail.fr', '$2y$10$7LuixTonxhIIR5GLVCEdRO7CZ515dmWIe.Hi0EltjBpVGWrEYJsmO', '2020-09-26 00:45:44', 2),
(14, 'NicoJu2', 'test2@hotmail.fr', '$2y$10$p4JZpV5Orzv2BrnBOXo2xOpD4vcpU.CnnaYmMifj2wgvLzkcxqhCy', '2020-09-28 22:24:59', 2),
(15, 'NicoJuillet', 'nico@hotmail.fr', '$2y$10$XYwqhcpBUROkz0Y0pbGiWeLhKlFDO2czL7S68kr4GiSAZQ6lMsitC', '2020-09-29 16:15:45', 2);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `episode`
--
ALTER TABLE `episode`
  ADD PRIMARY KEY (`episodeId`),
  ADD KEY `idAuthor` (`idAuthor`) USING BTREE;

--
-- Indexes for table `message`
--
ALTER TABLE `message`
  ADD PRIMARY KEY (`messageId`),
  ADD KEY `idEpisode` (`idEpisode`),
  ADD KEY `idAuthor` (`idAuthor`) USING BTREE;

--
-- Indexes for table `role`
--
ALTER TABLE `role`
  ADD PRIMARY KEY (`roleId`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`userId`),
  ADD UNIQUE KEY `login` (`username`),
  ADD UNIQUE KEY `mail_2` (`mail`) USING BTREE,
  ADD KEY `fk_role_id` (`idRole`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `episode`
--
ALTER TABLE `episode`
  MODIFY `episodeId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `message`
--
ALTER TABLE `message`
  MODIFY `messageId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT for table `role`
--
ALTER TABLE `role`
  MODIFY `roleId` int(11) NOT NULL AUTO_INCREMENT COMMENT 'id role', AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `userId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `episode`
--
ALTER TABLE `episode`
  ADD CONSTRAINT `episode_ibfk_1` FOREIGN KEY (`idAuthor`) REFERENCES `user` (`userId`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `message`
--
ALTER TABLE `message`
  ADD CONSTRAINT `message_ibfk_10` FOREIGN KEY (`idAuthor`) REFERENCES `user` (`userId`) ON DELETE NO ACTION ON UPDATE CASCADE,
  ADD CONSTRAINT `message_ibfk_9` FOREIGN KEY (`idEpisode`) REFERENCES `episode` (`episodeId`) ON DELETE CASCADE ON UPDATE NO ACTION;

--
-- Constraints for table `user`
--
ALTER TABLE `user`
  ADD CONSTRAINT `fk_role_id` FOREIGN KEY (`idRole`) REFERENCES `role` (`roleId`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
