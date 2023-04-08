-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost:8889
-- Generation Time: Jan 30, 2023 at 01:13 PM
-- Server version: 5.7.34
-- PHP Version: 7.4.21

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `Project_Reports`
--

-- --------------------------------------------------------

--
-- Table structure for table `project_names`
--

CREATE TABLE `project_names` (
  `ProjectID` int(11) NOT NULL,
  `ProjectName` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `project_names`
--

INSERT INTO `project_names` (`ProjectID`, `ProjectName`) VALUES
(1, 'TEST'),
(2, 'MARVEL'),
(3, 'UNITY'),
(4, 'DC'),
(5, 'APPLE');

-- --------------------------------------------------------

--
-- Table structure for table `report_dates`
--

CREATE TABLE `report_dates` (
  `reportDate` date NOT NULL,
  `DayOfWeek` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `report_dates`
--

INSERT INTO `report_dates` (`reportDate`, `DayOfWeek`) VALUES
('2021-10-11', 'Monday'),
('2021-10-12', 'Tuesday'),
('2021-10-13', 'Wednesday'),
('2021-10-14', 'Thursday'),
('2021-10-15', 'Friday');

-- --------------------------------------------------------

--
-- Table structure for table `status_report`
--

CREATE TABLE `status_report` (
  `id` int(10) NOT NULL,
  `submit_date` date NOT NULL,
  `submit_time` varchar(25) DEFAULT NULL,
  `ProjectID` int(11) NOT NULL,
  `ProjectManager` varchar(50) NOT NULL,
  `overallStatus` varchar(10) NOT NULL,
  `schedule` varchar(10) NOT NULL,
  `quality` varchar(10) NOT NULL,
  `Comments` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `status_report`
--

INSERT INTO `status_report` (`id`, `submit_date`, `submit_time`, `ProjectID`, `ProjectManager`, `overallStatus`, `schedule`, `quality`, `Comments`) VALUES
(1, '2021-10-14', '8 AM', 3, 'Chloe J', 'Yellow', 'Green', 'Red', 'Prev 2021-10-13\r\nProj - Test'),
(2, '2021-10-12', '12:58 PM', 2, 'Stacey Smith', 'Red', 'Red', 'Red', 'This is a great project, but it is late'),
(3, '2021-10-14', '01:02', 1, 'Tommy', 'Yellow', 'Yellow', 'Red', 'the machine is broken'),
(4, '2021-10-12', '18:00', 4, 'John', 'Green', 'Yellow', 'Red', 'wrong test'),
(5, '2021-10-11', '06:58', 5, 'test', 'Yellow', 'Red', 'Yellow', 'new manager');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `ID` int(11) NOT NULL,
  `UserName` varchar(100) DEFAULT NULL,
  `UserPassword` varchar(50) DEFAULT NULL,
  `FirstName` varchar(100) DEFAULT NULL,
  `LastName` varchar(150) DEFAULT NULL,
  `UserLevel` int(11) NOT NULL,
  `Active` tinyint(1) NOT NULL DEFAULT '1' COMMENT 'Active Indicator for Users',
  `DateInactive` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`ID`, `UserName`, `UserPassword`, `FirstName`, `LastName`, `UserLevel`, `Active`, `DateInactive`) VALUES
(1, 'bm', 'kratos', 'Barry', 'Moorer', 1, 1, NULL),
(2, 'riley', 'try', 'Riley', 'M', 2, 1, NULL),
(3, 'bart', 'apple', 'Bart', 'Simp', 1, 1, NULL),
(4, 'peter', 'rick', 'Peter', 'Griff', 0, 1, NULL),
(5, 'deku', 'simpson', 'Deku', 'Ult', 1, 1, NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `project_names`
--
ALTER TABLE `project_names`
  ADD PRIMARY KEY (`ProjectID`);

--
-- Indexes for table `report_dates`
--
ALTER TABLE `report_dates`
  ADD PRIMARY KEY (`reportDate`);

--
-- Indexes for table `status_report`
--
ALTER TABLE `status_report`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`ID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `project_names`
--
ALTER TABLE `project_names`
  MODIFY `ProjectID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `status_report`
--
ALTER TABLE `status_report`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
