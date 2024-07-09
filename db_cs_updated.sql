-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Oct 13, 2019 at 12:46 PM
-- Server version: 5.7.26
-- PHP Version: 7.0.33

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_cs`
--

-- --------------------------------------------------------

--
-- Table structure for table `image_tbl`
--

DROP TABLE IF EXISTS `image_tbl`;
CREATE TABLE IF NOT EXISTS `image_tbl` (
  `ID` int(11) NOT NULL,
  `Name` varchar(50) NOT NULL,
  `img_location` text NOT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `image_tbl`
--

INSERT INTO `image_tbl` (`ID`, `Name`, `img_location`) VALUES
(101, 'George', 'upload/BME-WALLAPAPER_1565934507.JPG'),
(203, 'Marc', 'upload/hqdefault_1565934383.jpg'),
(205, 'Josh', 'upload/eminem-marshal-mathers-with-beard-uhd-4k-wallpaper_1565934554.jpg'),
(206, 'gracian', 'upload/Student004_1570961153.png'),
(207, 'Mukul', 'upload/resident-evil-2-remake-leon-and-claire-uhd-4k-wallpaper_1565934613.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_admin`
--

DROP TABLE IF EXISTS `tbl_admin`;
CREATE TABLE IF NOT EXISTS `tbl_admin` (
  `U_ID` int(11) NOT NULL AUTO_INCREMENT,
  `ID` int(11) NOT NULL,
  `First_Name` varchar(50) NOT NULL,
  `Last_Name` varchar(50) NOT NULL,
  `Email_ID` text NOT NULL,
  `Password` text NOT NULL,
  `Profile_Picture` text NOT NULL,
  PRIMARY KEY (`ID`),
  UNIQUE KEY `U_ID` (`U_ID`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_admin`
--

INSERT INTO `tbl_admin` (`U_ID`, `ID`, `First_Name`, `Last_Name`, `Email_ID`, `Password`, `Profile_Picture`) VALUES
(1, 203, 'Marc', 'Crasto', 'marcalex458@gmail.com', 'qwerty', '');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_registration`
--

DROP TABLE IF EXISTS `tbl_registration`;
CREATE TABLE IF NOT EXISTS `tbl_registration` (
  `ID` int(11) NOT NULL,
  `Name` varchar(30) NOT NULL,
  `Mail_ID` text NOT NULL,
  `Gender` varchar(30) NOT NULL,
  `Mobile` bigint(10) NOT NULL,
  `City` varchar(50) NOT NULL,
  `State` varchar(50) NOT NULL,
  `Country` varchar(50) NOT NULL,
  `Department` varchar(30) NOT NULL,
  `Course` varchar(30) NOT NULL,
  `Year` int(1) NOT NULL,
  `Password` text NOT NULL,
  `img_location` text NOT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_registration`
--

INSERT INTO `tbl_registration` (`ID`, `Name`, `Mail_ID`, `Gender`, `Mobile`, `City`, `State`, `Country`, `Department`, `Course`, `Year`, `Password`, `img_location`) VALUES
(101, 'George', 'email@gmail.com', 'Male', 9526027770, 'Kochi', 'Kerela', 'India', 'IB', 'Engineering', 2, 'b', 'upload/Student002.jpg'),
(203, 'Marc', 'awe50me@rocketmail.com', 'Male', 7760077702, 'Mangalore', 'Karnataka', 'India', 'IB', 'Engineering', 2, 'qwerty', 'upload/Student002.jpg'),
(205, 'Josh', 'edw@yahoo.com', 'Male', 9223372036854775807, 'Mangalore', 'Karnataka', 'India', 'IB', 'Engineering', 2, 'qwerty', 'upload/Student003.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_staff`
--

DROP TABLE IF EXISTS `tbl_staff`;
CREATE TABLE IF NOT EXISTS `tbl_staff` (
  `U_ID` int(11) NOT NULL AUTO_INCREMENT,
  `ID` int(50) NOT NULL,
  `Name` varchar(50) NOT NULL,
  `Email_ID` text NOT NULL,
  `Gender` varchar(50) NOT NULL,
  `Mobile` bigint(50) NOT NULL,
  `City` varchar(50) NOT NULL,
  `State` varchar(50) NOT NULL,
  `Country` varchar(50) NOT NULL,
  `Department` varchar(50) NOT NULL,
  `Password` text NOT NULL,
  `Image_Location` text NOT NULL,
  PRIMARY KEY (`U_ID`),
  UNIQUE KEY `U_ID` (`U_ID`),
  UNIQUE KEY `ID` (`ID`),
  UNIQUE KEY `U_ID_2` (`U_ID`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_staff`
--

INSERT INTO `tbl_staff` (`U_ID`, `ID`, `Name`, `Email_ID`, `Gender`, `Mobile`, `City`, `State`, `Country`, `Department`, `Password`, `Image_Location`) VALUES
(1, 203, 'Marc', 'awe50me@rocketmail.com', 'Male', 7760077702, 'Mangalore', 'Karnataka', 'India', 'IB', 'qwerty', 'upload/Faculty002.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_state`
--

DROP TABLE IF EXISTS `tbl_state`;
CREATE TABLE IF NOT EXISTS `tbl_state` (
  `ID` int(11) NOT NULL,
  `State` varchar(60) NOT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_state`
--

INSERT INTO `tbl_state` (`ID`, `State`) VALUES
(1, 'Karnataka'),
(2, 'Maharashtra'),
(3, 'West Bengal'),
(4, 'Kerela');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_take_attendance`
--

DROP TABLE IF EXISTS `tbl_take_attendance`;
CREATE TABLE IF NOT EXISTS `tbl_take_attendance` (
  `ID` int(11) NOT NULL,
  `Name` varchar(50) NOT NULL,
  `Days Present` int(3) NOT NULL,
  `Days Absent` int(3) NOT NULL,
  `Total Number of Days` int(3) NOT NULL,
  `Present Percentage` text NOT NULL,
  `Absent Percentage` text NOT NULL,
  `Status` varchar(50) NOT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_take_attendance`
--

INSERT INTO `tbl_take_attendance` (`ID`, `Name`, `Days Present`, `Days Absent`, `Total Number of Days`, `Present Percentage`, `Absent Percentage`, `Status`) VALUES
(101, 'George', 0, 0, 0, '', '', ''),
(203, 'Marc', 0, 0, 0, '', '', ''),
(205, 'Josh', 0, 0, 0, '', '', ''),
(207, 'Mukul', 0, 0, 0, '', '', '');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
