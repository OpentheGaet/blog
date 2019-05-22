-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: May 22, 2019 at 01:21 PM
-- Server version: 5.7.26-0ubuntu0.18.04.1
-- PHP Version: 7.3.5-1+ubuntu18.04.1+deb.sury.org+1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `MusicStore`
--

-- --------------------------------------------------------

--
-- Table structure for table `T_ALBUM`
--

CREATE TABLE `T_ALBUM` (
  `ALB_ID` int(11) NOT NULL,
  `ALB_NOM` varchar(100) NOT NULL,
  `ALB_DATE` date NOT NULL,
  `ALB_IMAGE` varchar(50) DEFAULT NULL,
  `ALB_PRIX` decimal(3,2) NOT NULL,
  `GEN_ID` int(11) NOT NULL,
  `ART_ID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `T_ALBUM`
--

INSERT INTO `T_ALBUM` (`ALB_ID`, `ALB_NOM`, `ALB_DATE`, `ALB_IMAGE`, `ALB_PRIX`, `GEN_ID`, `ART_ID`) VALUES
(1, 'Get Behind Me Satan', '0000-00-00', 'getbehindmesatan.jpg', '9.90', 1, 1),
(2, 'Let It Bleed', '0000-00-00', 'letitbleed.jpg', '9.90', 1, 2),
(3, 'Mellon Collie And The Infinite Sadness', '0000-00-00', 'melloncollie.jpg', '9.90', 1, 6),
(4, 'Achtung Baby', '0000-00-00', 'achtungbaby.jpg', '9.90', 1, 3),
(5, 'London Calling', '0000-00-00', 'londoncalling.jpg', '9.90', 1, 7),
(6, 'Bossanova', '0000-00-00', 'bossanova.jpg', '9.90', 1, 8),
(7, 'Definitely Maybe', '0000-00-00', 'definitelymaybe.jpg', '9.90', 1, 4),
(8, 'Pacific Ocean Blue', '0000-00-00', 'pacificoceanblue.jpg', '9.90', 1, 5),
(9, 'The Beatles (White Album)', '0000-00-00', 'thebeatles.jpg', '9.90', 1, 9),
(10, 'Nebraska', '0000-00-00', 'nebraska.jpg', '9.90', 1, 10),
(11, 'Ziggy Stardust', '0000-00-00', 'ziggystardust.jpg', '9.90', 1, 11);

-- --------------------------------------------------------

--
-- Table structure for table `T_ARTISTE`
--

CREATE TABLE `T_ARTISTE` (
  `ART_ID` int(11) NOT NULL,
  `ART_NOM` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `T_ARTISTE`
--

INSERT INTO `T_ARTISTE` (`ART_ID`, `ART_NOM`) VALUES
(1, 'The White Stripes'),
(2, 'The Rolling Stones'),
(3, 'U2'),
(4, 'Oasis'),
(5, 'Dennis Wilson'),
(6, 'The Smashing Pumpkins'),
(7, 'The Clash'),
(8, 'Pixies'),
(9, 'The Beatles'),
(10, 'Bruce Springsteen'),
(11, 'David Bowie');

-- --------------------------------------------------------

--
-- Table structure for table `T_GENRE`
--

CREATE TABLE `T_GENRE` (
  `GEN_ID` int(11) NOT NULL,
  `GEN_NOM` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `T_GENRE`
--

INSERT INTO `T_GENRE` (`GEN_ID`, `GEN_NOM`) VALUES
(1, 'Pop/Rock'),
(2, 'Classique'),
(3, 'Blues'),
(4, 'R&B'),
(5, 'Rap'),
(6, 'Reggae'),
(7, 'Electro'),
(8, 'Country'),
(9, 'Folk');

-- --------------------------------------------------------

--
-- Table structure for table `T_USER`
--

CREATE TABLE `T_USER` (
  `USER_ID` int(11) NOT NULL,
  `LOGIN` varchar(100) NOT NULL,
  `PASS` varchar(255) NOT NULL,
  `DATE` varchar(100) NOT NULL,
  `LEVEL` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `T_ALBUM`
--
ALTER TABLE `T_ALBUM`
  ADD PRIMARY KEY (`ALB_ID`),
  ADD KEY `fk_alb_gen` (`GEN_ID`),
  ADD KEY `fk_alb_art` (`ART_ID`);

--
-- Indexes for table `T_ARTISTE`
--
ALTER TABLE `T_ARTISTE`
  ADD PRIMARY KEY (`ART_ID`);

--
-- Indexes for table `T_GENRE`
--
ALTER TABLE `T_GENRE`
  ADD PRIMARY KEY (`GEN_ID`);

--
-- Indexes for table `T_USER`
--
ALTER TABLE `T_USER`
  ADD PRIMARY KEY (`USER_ID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `T_ALBUM`
--
ALTER TABLE `T_ALBUM`
  MODIFY `ALB_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `T_ARTISTE`
--
ALTER TABLE `T_ARTISTE`
  MODIFY `ART_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `T_GENRE`
--
ALTER TABLE `T_GENRE`
  MODIFY `GEN_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `T_USER`
--
ALTER TABLE `T_USER`
  MODIFY `USER_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `T_ALBUM`
--
ALTER TABLE `T_ALBUM`
  ADD CONSTRAINT `fk_alb_art` FOREIGN KEY (`ART_ID`) REFERENCES `T_ARTISTE` (`ART_ID`),
  ADD CONSTRAINT `fk_alb_gen` FOREIGN KEY (`GEN_ID`) REFERENCES `T_GENRE` (`GEN_ID`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
