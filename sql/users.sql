-- phpMyAdmin SQL Dump
-- version 4.9.5
-- https://www.phpmyadmin.net/
--
-- Host: db5000269963.hosting-data.io
-- Generation Time: Jul 31, 2020 at 02:11 PM
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
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `userId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
