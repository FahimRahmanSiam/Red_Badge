-- phpMyAdmin SQL Dump
-- version 4.8.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 21, 2019 at 07:01 PM
-- Server version: 10.1.37-MariaDB
-- PHP Version: 7.3.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `redbatch`
--

-- --------------------------------------------------------

--
-- Table structure for table `user_account`
--

CREATE TABLE `user_account` (
  `UserID` int(11) NOT NULL,
  `Name` varchar(255) NOT NULL,
  `Email` varchar(255) NOT NULL,
  `Password` varchar(255) NOT NULL,
  `Phone` int(20) NOT NULL,
  `dob` date DEFAULT NULL,
  `Address` longtext NOT NULL,
  `company` varchar(255) DEFAULT NULL,
  `level` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user_account`
--

INSERT INTO `user_account` (`UserID`, `Name`, `Email`, `Password`, `Phone`, `dob`, `Address`, `company`, `level`) VALUES
(1, 'Fahim Rahman', 'darklycan1693@gmail.com', '123456', 1611, '1996-04-08', '75 Indera Road,\r\nTejgong , Dhaka', NULL, 'Admin'),
(2, 'Square Group', 'square@gmail.com', 'aspirine', 171111111, NULL, 'Kolabagan<br />\r\nDhaka', NULL, 'Company'),
(3, 'Bexi_Pharma', 'Beximco@yahoo.com', 'qwerty', 136111111, NULL, 'Uttara<br />\r\ndhaka', NULL, 'Company'),
(4, 'Asif Mehraz', 'mehraz1696@hotmail.com', '123qwe', 12659836, '2019-07-05', 'rampura<br />\r\ndhaka', 'Square Group', 'Patient'),
(5, 'Tawfiqul Alam', 'tawfiq44@gmail.com', 'asdfzxcv', 123659653, '2019-04-08', 'madaripur<br />\r\ndhaka', 'Bexi_Pharma', 'Patient'),
(6, 'LabAid Hospital', 'labaid@gmail.com', 'qwerty', 12233, NULL, 'Dhanmondi<br />\r\nDhaka', NULL, 'Company');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `user_account`
--
ALTER TABLE `user_account`
  ADD PRIMARY KEY (`UserID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `user_account`
--
ALTER TABLE `user_account`
  MODIFY `UserID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
