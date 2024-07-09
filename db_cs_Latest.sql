-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Oct 13, 2019 at 09:31 PM
-- Server version: 10.1.13-MariaDB
-- PHP Version: 5.6.20

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
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

CREATE TABLE `image_tbl` (
  `ID` int(11) NOT NULL,
  `Name` varchar(50) NOT NULL,
  `img_location` text NOT NULL
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

CREATE TABLE `tbl_admin` (
  `U_ID` int(11) NOT NULL,
  `ID` int(11) NOT NULL,
  `First_Name` varchar(50) NOT NULL,
  `Last_Name` varchar(50) NOT NULL,
  `Email_ID` text NOT NULL,
  `Password` text NOT NULL,
  `Profile_Picture` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_admin`
--

INSERT INTO `tbl_admin` (`U_ID`, `ID`, `First_Name`, `Last_Name`, `Email_ID`, `Password`, `Profile_Picture`) VALUES
(1, 203, 'Marc', 'Crasto', 'marcalex458@gmail.com', 'qwerty', '');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_registration`
--

CREATE TABLE `tbl_registration` (
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
  `img_location` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_registration`
--

INSERT INTO `tbl_registration` (`ID`, `Name`, `Mail_ID`, `Gender`, `Mobile`, `City`, `State`, `Country`, `Department`, `Course`, `Year`, `Password`, `img_location`) VALUES
(101, 'George', 'qwerty@gmail.com', 'Male', 9526027770, 'Kochi', 'Kerela', 'India', 'IB', 'Engineering', 2, 'b', 'upload/Student002.jpg'),
(203, 'Marc', 'awe50me@rocketmail.com', 'Male', 7760077702, 'Mangalore', 'Karnataka', 'India', 'IB', 'Commerce', 2, 'qwerty', 'upload/Student002.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_staff`
--

CREATE TABLE `tbl_staff` (
  `U_ID` int(11) NOT NULL,
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
  `Image_Location` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_staff`
--

INSERT INTO `tbl_staff` (`U_ID`, `ID`, `Name`, `Email_ID`, `Gender`, `Mobile`, `City`, `State`, `Country`, `Department`, `Password`, `Image_Location`) VALUES
(1, 203, 'Marc', 'awe50me@rocketmail.com', 'Male', 5634846182376, 'Mangalore', 'Karnataka', 'India', 'IB', 'qwerty', 'upload/Faculty002.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_state`
--

CREATE TABLE `tbl_state` (
  `ID` int(11) NOT NULL,
  `State` varchar(60) NOT NULL
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

CREATE TABLE `tbl_take_attendance` (
  `Student_ID` int(11) NOT NULL,
  `Name` varchar(50) NOT NULL,
  `Days_Present` int(3) NOT NULL,
  `Days_Absent` int(3) NOT NULL,
  `Total_Number_Days` int(3) NOT NULL,
  `Present_Percentage` text NOT NULL,
  `Absent_Percentage` text NOT NULL,
  `Status` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_take_attendance`
--

INSERT INTO `tbl_take_attendance` (`Student_ID`, `Name`, `Days_Present`, `Days_Absent`, `Total_Number_Days`, `Present_Percentage`, `Absent_Percentage`, `Status`) VALUES
(101, 'George', 6, 2, 8, '', '', ''),
(203, 'Marc', 4, 4, 8, '', '', '');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `image_tbl`
--
ALTER TABLE `image_tbl`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `tbl_admin`
--
ALTER TABLE `tbl_admin`
  ADD PRIMARY KEY (`ID`),
  ADD UNIQUE KEY `U_ID` (`U_ID`);

--
-- Indexes for table `tbl_registration`
--
ALTER TABLE `tbl_registration`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `tbl_staff`
--
ALTER TABLE `tbl_staff`
  ADD PRIMARY KEY (`U_ID`),
  ADD UNIQUE KEY `U_ID` (`U_ID`),
  ADD UNIQUE KEY `ID` (`ID`),
  ADD UNIQUE KEY `U_ID_2` (`U_ID`);

--
-- Indexes for table `tbl_state`
--
ALTER TABLE `tbl_state`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `tbl_take_attendance`
--
ALTER TABLE `tbl_take_attendance`
  ADD PRIMARY KEY (`Student_ID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tbl_admin`
--
ALTER TABLE `tbl_admin`
  MODIFY `U_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `tbl_staff`
--
ALTER TABLE `tbl_staff`
  MODIFY `U_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
