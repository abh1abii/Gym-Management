-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 21, 2020 at 05:09 PM
-- Server version: 8.0.22
-- PHP Version: 7.3.22-(to be removed in future macOS)

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `GymAdmin`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin_login`
--

CREATE TABLE `admin_login` (
  `admin_name` varchar(32) COLLATE latin1_general_cs NOT NULL,
  `admin_password` varchar(128) COLLATE latin1_general_cs NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_general_cs;

--
-- Dumping data for table `admin_login`
--

INSERT INTO `admin_login` (`admin_name`, `admin_password`) VALUES
('root', 'root'),
('admin', 'admin');

-- --------------------------------------------------------

--
-- Table structure for table `Members`
--

CREATE TABLE `Members` (
  `First_name` varchar(32) COLLATE latin1_general_cs NOT NULL,
  `Last_name` varchar(32) COLLATE latin1_general_cs NOT NULL,
  `Gender` varchar(5) COLLATE latin1_general_cs NOT NULL,
  `email` varchar(32) COLLATE latin1_general_cs NOT NULL,
  `contact` varchar(32) COLLATE latin1_general_cs NOT NULL,
  `Member_ID` varchar(32) COLLATE latin1_general_cs NOT NULL,
  `Trainer_ID` varchar(12) COLLATE latin1_general_cs NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_general_cs;

--
-- Dumping data for table `Members`
--

INSERT INTO `Members` (`First_name`, `Last_name`, `Gender`, `email`, `contact`, `Member_ID`, `Trainer_ID`) VALUES
('Abhishek', 'Sr', 'Male', 'abii@abiistudio.com', '8951891675', '10asdas', '191');

-- --------------------------------------------------------

--
-- Table structure for table `Package`
--

CREATE TABLE `Package` (
  `Package_ID` varchar(10) COLLATE latin1_general_cs NOT NULL,
  `Package_name` varchar(20) COLLATE latin1_general_cs DEFAULT NULL,
  `Amount` decimal(10,2) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_general_cs;

--
-- Dumping data for table `Package`
--

INSERT INTO `Package` (`Package_ID`, `Package_name`, `Amount`) VALUES
('CAR1', 'Cardio', '8000.00');

-- --------------------------------------------------------

--
-- Table structure for table `Payment`
--

CREATE TABLE `Payment` (
  `Payment_ID` varchar(32) COLLATE latin1_general_cs NOT NULL,
  `Package_ID` varchar(32) COLLATE latin1_general_cs NOT NULL,
  `Member_ID` varchar(32) COLLATE latin1_general_cs NOT NULL,
  `Payment_type` varchar(32) COLLATE latin1_general_cs NOT NULL,
  `Amount` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_general_cs;

-- --------------------------------------------------------

--
-- Table structure for table `Trainer`
--

CREATE TABLE `Trainer` (
  `Trainer_ID` varchar(5) COLLATE latin1_general_cs NOT NULL,
  `Name` varchar(20) COLLATE latin1_general_cs DEFAULT NULL,
  `Phone` varchar(20) COLLATE latin1_general_cs DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_general_cs;

--
-- Dumping data for table `Trainer`
--

INSERT INTO `Trainer` (`Trainer_ID`, `Name`, `Phone`) VALUES
('191', 'Akshay', '222'),
('rr', 'rrr', '555555555'),
('w', 'w', '33'),
('wad', 'wad', '1111111111'),
('ww', 'ww', '22222'),
('wwww', 'wwww', '3333333');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `Members`
--
ALTER TABLE `Members`
  ADD PRIMARY KEY (`Member_ID`),
  ADD KEY `Trainer_ID` (`Trainer_ID`);

--
-- Indexes for table `Package`
--
ALTER TABLE `Package`
  ADD PRIMARY KEY (`Package_ID`);

--
-- Indexes for table `Payment`
--
ALTER TABLE `Payment`
  ADD PRIMARY KEY (`Payment_ID`),
  ADD KEY `FK` (`Member_ID`,`Package_ID`);

--
-- Indexes for table `Trainer`
--
ALTER TABLE `Trainer`
  ADD PRIMARY KEY (`Trainer_ID`);

--
-- Constraints for dumped tables
--

--
-- Constraints for table `Members`
--
ALTER TABLE `Members`
  ADD CONSTRAINT `members_ibfk_1` FOREIGN KEY (`Trainer_ID`) REFERENCES `Trainer` (`Trainer_ID`);

--
-- Constraints for table `Payment`
--
ALTER TABLE `Payment`
  ADD CONSTRAINT `MID` FOREIGN KEY (`Member_ID`) REFERENCES `Package` (`Package_ID`) ON DELETE RESTRICT ON UPDATE RESTRICT,
  ADD CONSTRAINT `payment_ibfk_1` FOREIGN KEY (`Member_ID`) REFERENCES `Members` (`Member_ID`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
