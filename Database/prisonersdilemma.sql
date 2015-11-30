-- phpMyAdmin SQL Dump
-- version 4.4.14
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Dec 01, 2015 at 12:44 AM
-- Server version: 5.6.26
-- PHP Version: 5.6.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `prisonersdilemma`
--

-- --------------------------------------------------------

--
-- Table structure for table `class`
--

CREATE TABLE IF NOT EXISTS `class` (
  `ClassID` int(11) NOT NULL,
  `ClassName` varchar(50) NOT NULL,
  `Section` varchar(50) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `class`
--

INSERT INTO `class` (`ClassID`, `ClassName`, `Section`) VALUES
(1, 'ITEC4150', '11'),
(2, 'ECON2101', '10');

-- --------------------------------------------------------

--
-- Table structure for table `game`
--

CREATE TABLE IF NOT EXISTS `game` (
  `GameID` int(11) NOT NULL,
  `Player1ID` int(11) NOT NULL,
  `Player1CompleteDate` datetime NOT NULL,
  `Player1Score` int(11) NOT NULL,
  `Player1Action` varchar(50) NOT NULL,
  `Player2ID` int(11) NOT NULL,
  `Player2CompleteDate` datetime NOT NULL,
  `Player2Score` int(11) NOT NULL,
  `Player2Action` varchar(50) NOT NULL,
  `MODE` varchar(50) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `game`
--

INSERT INTO `game` (`GameID`, `Player1ID`, `Player1CompleteDate`, `Player1Score`, `Player1Action`, `Player2ID`, `Player2CompleteDate`, `Player2Score`, `Player2Action`, `MODE`) VALUES
(1, 1, '2015-11-29 02:13:11', 3, 'COOPERATE', 8, '2015-11-30 04:10:11', 3, 'COOPERATE', 'RANDOM'),
(2, 1, '2015-11-24 00:00:00', 1, 'DEFECT', 11, '2015-11-20 00:00:00', 1, 'DEFECT', 'RANDOM');

-- --------------------------------------------------------

--
-- Table structure for table `groupplayers`
--

CREATE TABLE IF NOT EXISTS `groupplayers` (
  `GroupPlayersID` int(11) NOT NULL,
  `GroupID` int(11) NOT NULL,
  `UserGUID` int(11) NOT NULL,
  `ClassID` int(11) NOT NULL,
  `PlayerName` varchar(50) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `groupplayers`
--

INSERT INTO `groupplayers` (`GroupPlayersID`, `GroupID`, `UserGUID`, `ClassID`, `PlayerName`) VALUES
(1, 1, 1, 1, 'RED1'),
(2, 2, 8, 1, 'GREEN1'),
(3, 3, 11, 1, 'BLUE1'),
(4, 1, 12, 1, 'RED2'),
(5, 2, 13, 1, 'GREEN2'),
(6, 3, 14, 1, 'BLUE2');

-- --------------------------------------------------------

--
-- Table structure for table `groups`
--

CREATE TABLE IF NOT EXISTS `groups` (
  `GroupID` int(11) NOT NULL,
  `GroupName` text NOT NULL,
  `tstamp` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `groups`
--

INSERT INTO `groups` (`GroupID`, `GroupName`, `tstamp`) VALUES
(1, 'Red', '2015-11-30 00:32:15'),
(2, 'Green', '2015-11-30 00:32:15'),
(3, 'Blue', '2015-11-30 00:32:15');

-- --------------------------------------------------------

--
-- Table structure for table `logins`
--

CREATE TABLE IF NOT EXISTS `logins` (
  `UserGUID` bigint(20) NOT NULL,
  `UserName` text NOT NULL,
  `SessionStart` datetime NOT NULL,
  `SessionEnd` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `logins`
--

INSERT INTO `logins` (`UserGUID`, `UserName`, `SessionStart`, `SessionEnd`) VALUES
(1, '', '2015-11-17 08:13:12', '2015-11-17 11:12:12'),
(1, '', '2015-11-30 19:17:25', '0000-00-00 00:00:00'),
(8, '', '2015-11-30 09:13:22', '0000-00-00 00:00:00'),
(13, '', '2015-11-30 10:24:27', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `GUID` bigint(20) NOT NULL,
  `first_name` varchar(75) NOT NULL,
  `last_name` varchar(75) NOT NULL,
  `username` varchar(25) NOT NULL,
  `isAdmin` tinyint(1) NOT NULL DEFAULT '0',
  `email` varchar(75) NOT NULL,
  `password` varchar(25) NOT NULL,
  `gender` varchar(25) NOT NULL,
  `ProfileCompleted` tinyint(1) NOT NULL DEFAULT '0',
  `ActivePlayer` tinyint(1) NOT NULL DEFAULT '0',
  `tstamp` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB AUTO_INCREMENT=15 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`GUID`, `first_name`, `last_name`, `username`, `isAdmin`, `email`, `password`, `gender`, `ProfileCompleted`, `ActivePlayer`, `tstamp`) VALUES
(14, 'Erin', 'Smoltz', '', 0, 'erins@ggc.edu', 'eringgc', '', 0, 1, '2015-11-30 06:08:54'),
(13, 'Marco', 'Polo', '', 0, 'marcop@ggc.edu', 'marcoggc', 'male', 0, 1, '2015-11-30 06:08:54'),
(11, 'Maria', 'Clarkston', '', 0, 'mariaC@ggc.edu', 'mariaggc', 'female', 0, 1, '2015-11-30 06:01:52'),
(12, 'Nick', 'Owens', '', 0, 'nickO@ggc.edu', 'nickggc', 'male', 0, 1, '2015-11-30 06:01:45'),
(8, 'Mike', 'Jordan', '', 0, 'sample@test.com', 'sample', 'male', 0, 1, '2015-11-30 06:01:38'),
(2, 'John', 'Smith', 'madJohn', 1, 'jsmith@ggc.edu', 'sample', 'male', 1, 0, '2015-10-30 06:11:08'),
(1, 'David', 'Guevara', 'starfox806', 0, 'dguevara1@ggc.edu', 'password123', 'male', 0, 1, '2015-11-30 06:01:31');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `class`
--
ALTER TABLE `class`
  ADD PRIMARY KEY (`ClassID`);

--
-- Indexes for table `game`
--
ALTER TABLE `game`
  ADD PRIMARY KEY (`GameID`);

--
-- Indexes for table `groupplayers`
--
ALTER TABLE `groupplayers`
  ADD PRIMARY KEY (`GroupPlayersID`);

--
-- Indexes for table `groups`
--
ALTER TABLE `groups`
  ADD PRIMARY KEY (`GroupID`);

--
-- Indexes for table `logins`
--
ALTER TABLE `logins`
  ADD KEY `GUID` (`UserGUID`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`username`,`email`,`GUID`),
  ADD UNIQUE KEY `GUID` (`GUID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `class`
--
ALTER TABLE `class`
  MODIFY `ClassID` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `game`
--
ALTER TABLE `game`
  MODIFY `GameID` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `groupplayers`
--
ALTER TABLE `groupplayers`
  MODIFY `GroupPlayersID` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `groups`
--
ALTER TABLE `groups`
  MODIFY `GroupID` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `GUID` bigint(20) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=15;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `logins`
--
ALTER TABLE `logins`
  ADD CONSTRAINT `logins_ibfk_1` FOREIGN KEY (`UserGUID`) REFERENCES `users` (`GUID`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
