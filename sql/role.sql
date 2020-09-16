CREATE TABLE `role` (
  `roleId` int(11) NOT NULL,
  `name` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

INSERT INTO `role` (`roleId`, `name`) VALUES
(1, 'admin'),
(2, 'user');

ALTER TABLE `role`
  ADD PRIMARY KEY (`roleId`);

ALTER TABLE `role`
  MODIFY `roleId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;