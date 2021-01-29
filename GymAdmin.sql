-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 29, 2021 at 02:52 PM
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

DELIMITER $$
--
-- Procedures
--
CREATE DEFINER=`abii`@`localhost` PROCEDURE `query_package` ()  BEGIN
	SELECT * FROM `Package`;
END$$

DELIMITER ;

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
('admin', 'admin'),
('IT', 'it123');

-- --------------------------------------------------------

--
-- Table structure for table `Members`
--

CREATE TABLE `Members` (
  `First_name` varchar(32) COLLATE latin1_general_cs NOT NULL,
  `Last_name` varchar(32) COLLATE latin1_general_cs NOT NULL,
  `Gender` varchar(12) CHARACTER SET latin1 COLLATE latin1_general_cs NOT NULL,
  `email` varchar(32) COLLATE latin1_general_cs NOT NULL,
  `contact` varchar(32) COLLATE latin1_general_cs NOT NULL,
  `Member_ID` varchar(32) COLLATE latin1_general_cs NOT NULL,
  `Trainer_ID` varchar(12) COLLATE latin1_general_cs NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_general_cs;

--
-- Dumping data for table `Members`
--

INSERT INTO `Members` (`First_name`, `Last_name`, `Gender`, `email`, `contact`, `Member_ID`, `Trainer_ID`) VALUES
('Abhishek', 'Patil', 'male', 'abhishekpatil@gmail.com', '9843238291', '174', '191'),
('Akash', 'S', 'male', 'akash@a.com', '6336565526', '1814', '3601'),
('Abhignya', 'P', 'female', 'abhigp@yahoo.co.in', '8391894821', '2277', '3601'),
('Akshay ', 'M', 'male', 'akshaymakshay@gmail.com', '2293919291', '303', '3907'),
('Neeta', 'Sharath', 'female', 'neetas_bajikar@yahoo.com', '9845489000', '3454', '3601');

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
('BOX', 'Boxing', '3000.00'),
('CAR+MUS', 'Cardio and Muscle', '14000.00'),
('CAR1', 'Cardio', '8000.00'),
('HRX', 'HRX', '8000.00'),
('ZUMBA', 'ZUMBA', '8000.00');

-- --------------------------------------------------------

--
-- Table structure for table `Payment`
--

CREATE TABLE `Payment` (
  `Payment_ID` varchar(32) COLLATE latin1_general_cs NOT NULL,
  `DateTime` datetime NOT NULL,
  `Package_ID` varchar(10) CHARACTER SET latin1 COLLATE latin1_general_cs NOT NULL,
  `Member_ID` varchar(32) COLLATE latin1_general_cs NOT NULL,
  `Payment_type` varchar(32) COLLATE latin1_general_cs NOT NULL,
  `Amount` int NOT NULL,
  `TAX` float(7,2) DEFAULT NULL,
  `Total` decimal(7,2) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_general_cs;

--
-- Dumping data for table `Payment`
--

INSERT INTO `Payment` (`Payment_ID`, `DateTime`, `Package_ID`, `Member_ID`, `Payment_type`, `Amount`, `TAX`, `Total`) VALUES
('1287', '2021-01-27 16:03:04', 'CAR+MUS', '3454', 'cash', 14000, 2520.00, '16520.00'),
('1483', '2021-01-20 23:13:41', 'CAR+MUS', '1134', 'cash', 14000, 2520.00, '16520.00'),
('1538', '2020-12-22 22:34:32', 'CAR1', '1134', 'cash', 8000, 1360.00, '9360.00'),
('1681', '2021-01-27 16:10:44', 'CAR+MUS', '3454', 'cash', 14000, 2520.00, '16520.00'),
('1749', '2021-01-27 16:18:44', 'CAR+MUS', '3454', 'cash', 14000, 2520.00, '16520.00'),
('1902', '2021-01-27 16:08:17', 'CAR+MUS', '3454', 'cash', 14000, 2520.00, '16520.00'),
('2120', '2021-01-27 16:17:59', 'CAR+MUS', '3454', 'cash', 14000, 2520.00, '16520.00'),
('2190', '2021-01-27 15:58:56', 'CAR+MUS', '3454', 'cash', 14000, 2520.00, '16520.00'),
('2226', '2021-01-29 20:07:50', 'CAR1', '1814', 'cash', 8000, 1440.00, '9440.00'),
('2533', '2021-01-27 16:17:22', 'CAR+MUS', '3454', 'cash', 14000, 2520.00, '16520.00'),
('2740', '2020-12-22 22:25:29', 'MUS1', '303', 'cash', 3000, 510.00, '3510.00'),
('2882', '2020-12-30 09:45:25', 'CAR1', '1814', 'card', 8000, 1440.00, '9440.00'),
('3240', '2021-01-27 15:57:17', 'CAR1', '3454', 'card', 8000, 1440.00, '9440.00'),
('330', '2020-12-22 22:24:13', 'MUS1', '292', 'cheque', 3000, 540.00, '3540.00'),
('3629', '2021-01-27 15:50:28', 'CAR+MUS', '3454', 'cheque', 14000, 2520.00, '16520.00'),
('3657', '2021-01-27 16:03:25', 'CAR+MUS', '174', 'cash', 14000, 2520.00, '16520.00'),
('3794', '2020-12-22 22:19:49', 'CAR1', '174', 'card', 8000, 1440.00, '9440.00'),
('3981', '2021-01-27 16:03:52', 'CAR+MUS', '174', 'cash', 14000, 2520.00, '16520.00'),
('4154', '2020-12-29 21:26:36', 'CAR+MUS', '3376', 'cash', 14000, 2520.00, '16520.00'),
('4500', '2021-01-27 16:11:56', 'CAR+MUS', '3454', 'cash', 14000, 2520.00, '16520.00'),
('4589', '2021-01-27 14:54:58', 'CAR+MUS', '292', 'card', 14000, 2520.00, '16520.00'),
('503', '2021-01-27 16:06:12', 'CAR+MUS', '174', 'cash', 14000, 2520.00, '16520.00');

--
-- Triggers `Payment`
--
DELIMITER $$
CREATE TRIGGER `insertDateTime` BEFORE INSERT ON `Payment` FOR EACH ROW set new.DateTime=CURRENT_TIMESTAMP
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `tax`
--

CREATE TABLE `tax` (
  `priority` int NOT NULL,
  `serviceTax` int NOT NULL,
  `GST` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_general_cs;

--
-- Dumping data for table `tax`
--

INSERT INTO `tax` (`priority`, `serviceTax`, `GST`) VALUES
(1, 6, 12);

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
('3601', 'Abhishek ', '8951891675'),
('3907', 'Abhishree ', '7855546885');

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
  ADD KEY `FK` (`Member_ID`,`Package_ID`),
  ADD KEY `MID` (`Package_ID`);

--
-- Indexes for table `tax`
--
ALTER TABLE `tax`
  ADD PRIMARY KEY (`priority`);

--
-- Indexes for table `Trainer`
--
ALTER TABLE `Trainer`
  ADD PRIMARY KEY (`Trainer_ID`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
