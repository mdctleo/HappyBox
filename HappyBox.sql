-- phpMyAdmin SQL Dump
-- version 4.7.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Sep 17, 2017 at 08:02 PM
-- Server version: 10.1.25-MariaDB
-- PHP Version: 7.1.7

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `HappyBox`
--

-- --------------------------------------------------------

--
-- Table structure for table `Possession`
--

CREATE TABLE `Possession` (
  `PossessionID` int(8) UNSIGNED ZEROFILL NOT NULL,
  `UserID` int(8) UNSIGNED ZEROFILL NOT NULL,
  `ItemID` int(8) UNSIGNED ZEROFILL NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `UserItems`
--

CREATE TABLE `UserItems` (
  `ItemID` int(8) UNSIGNED ZEROFILL NOT NULL,
  `ItemContent` text NOT NULL,
  `ItemBy` int(8) UNSIGNED ZEROFILL NOT NULL,
  `ItemByName` varchar(30) NOT NULL,
  `status` int(1) NOT NULL,
  `CommBox` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `UserItems`
--

INSERT INTO `UserItems` (`ItemID`, `ItemContent`, `ItemBy`, `ItemByName`, `status`, `CommBox`) VALUES
(00000001, 'Do not kill yourself', 00000001, 'd', 0, 1),
(00000002, 'Be Happy', 00000001, 'd', 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `Users`
--

CREATE TABLE `Users` (
  `UserID` int(8) UNSIGNED ZEROFILL NOT NULL,
  `Email` varchar(30) NOT NULL,
  `UserName` varchar(30) NOT NULL,
  `Password` varchar(255) NOT NULL,
  `Privilege` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COMMENT='For storing users';

--
-- Dumping data for table `Users`
--

INSERT INTO `Users` (`UserID`, `Email`, `UserName`, `Password`, `Privilege`) VALUES
(00000001, 'd', 'd', 'd', 0),
(00000009, 'mdctleo@hotmail.com', 'mdctleo', 'password', 0),
(00000050, 'test', 'test', '$2y$10$0Mg.k0lOWvM/surJv9efNu5D8Crnv7XDT.YuWPEn1JSXDbhQdsCyy', 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `Possession`
--
ALTER TABLE `Possession`
  ADD PRIMARY KEY (`PossessionID`);

--
-- Indexes for table `UserItems`
--
ALTER TABLE `UserItems`
  ADD PRIMARY KEY (`ItemID`),
  ADD KEY `ItemID` (`ItemID`);

--
-- Indexes for table `Users`
--
ALTER TABLE `Users`
  ADD PRIMARY KEY (`UserID`),
  ADD UNIQUE KEY `UserName` (`UserName`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `Possession`
--
ALTER TABLE `Possession`
  MODIFY `PossessionID` int(8) UNSIGNED ZEROFILL NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
--
-- AUTO_INCREMENT for table `UserItems`
--
ALTER TABLE `UserItems`
  MODIFY `ItemID` int(8) UNSIGNED ZEROFILL NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;
--
-- AUTO_INCREMENT for table `Users`
--
ALTER TABLE `Users`
  MODIFY `UserID` int(8) UNSIGNED ZEROFILL NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=51;COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
