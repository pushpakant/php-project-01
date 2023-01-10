-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Dec 07, 2021 at 04:56 PM
-- Server version: 5.7.31
-- PHP Version: 7.3.21

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `fileupload`
--
CREATE DATABASE IF NOT EXISTS `fileupload` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `fileupload`;

-- --------------------------------------------------------

--
-- Table structure for table `fileupload`
--

DROP TABLE IF EXISTS `fileupload`;
CREATE TABLE IF NOT EXISTS `fileupload` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `image` varchar(100) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=18 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `fileupload`
--

INSERT INTO `fileupload` (`id`, `image`) VALUES
(4, 'upload/New Doc 2017-06-12 (.jpg'),
(3, 'upload/K.PHOTO1.jpg'),
(5, 'upload/2017-12-19-15-18-27.jpg'),
(6, 'upload/'),
(7, 'upload/K.PHOTO.jpg'),
(8, 'upload/2017-12-19-12-13-15-293.jpg'),
(9, 'upload/2017-12-19-12-13-15-293.jpg'),
(10, 'upload/'),
(11, 'upload/'),
(12, 'upload/K.PHOTO.jpg'),
(13, 'upload/'),
(14, 'upload/'),
(15, 'upload/2017-12-19-15-20-42.jpg'),
(16, 'upload/2017-12-19-15-20-42.jpg'),
(17, 'upload/2017-12-19-12-13-15-293.jpg');
--
-- Database: `fupload`
--
CREATE DATABASE IF NOT EXISTS `fupload` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `fupload`;

-- --------------------------------------------------------

--
-- Table structure for table `upload`
--

DROP TABLE IF EXISTS `upload`;
CREATE TABLE IF NOT EXISTS `upload` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(50) NOT NULL,
  `city` varchar(50) NOT NULL,
  `image` varchar(500) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `upload`
--

INSERT INTO `upload` (`id`, `name`, `city`, `image`) VALUES
(2, 'preetam', 'patana', 'upload/Screenshot (62).png'),
(3, 'preetam``', 'patana', 'upload/9.2 Q-4.png'),
(4, 'preetam', 'Vadodara', 'upload/SpiceJet_BaggageLabel_R8G4UV_12_Nov_2020_Ahmedabad_Goa_for_MS_NEHA KISHAN__CHANDRAVADIA.pdf');
--
-- Database: `practice`
--
CREATE DATABASE IF NOT EXISTS `practice` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `practice`;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `userid` int(11) NOT NULL AUTO_INCREMENT,
  `email` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `firstname` varchar(50) NOT NULL,
  `lastname` varchar(50) NOT NULL,
  `createon` date NOT NULL,
  `updateon` date NOT NULL,
  `status` varchar(20) NOT NULL,
  `usertype` int(11) NOT NULL,
  PRIMARY KEY (`userid`),
  UNIQUE KEY `email` (`email`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`userid`, `email`, `password`, `firstname`, `lastname`, `createon`, `updateon`, `status`, `usertype`) VALUES
(1, 'kishan@gmail.com', '123456', 'kishan', 'ahir', '2021-10-17', '2021-10-21', 'Active', 2),
(2, 'admin@gmail.com', '123456', 'admin', 'super', '2021-10-17', '2021-10-17', 'Active', 1);
--
-- Database: `studentresult`
--
CREATE DATABASE IF NOT EXISTS `studentresult` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `studentresult`;

-- --------------------------------------------------------

--
-- Table structure for table `studentdetails`
--

DROP TABLE IF EXISTS `studentdetails`;
CREATE TABLE IF NOT EXISTS `studentdetails` (
  `std_id` int(11) NOT NULL AUTO_INCREMENT,
  `std_name` varchar(50) NOT NULL,
  `course` varchar(20) NOT NULL,
  `email` varchar(50) NOT NULL,
  `psw` varchar(50) NOT NULL,
  `contact` varchar(20) NOT NULL,
  `gender` varchar(10) NOT NULL,
  PRIMARY KEY (`std_id`)
) ENGINE=MyISAM AUTO_INCREMENT=10 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `studentdetails`
--

INSERT INTO `studentdetails` (`std_id`, `std_name`, `course`, `email`, `psw`, `contact`, `gender`) VALUES
(9, 'saurabh', 'Msc(IT)', 'xyz@gmail.com', '1234', '8866546132', 'male'),
(8, 'preetam', 'MCA', 'abc@gmail.com', '1234', '98989898', 'male');

-- --------------------------------------------------------

--
-- Table structure for table `studentresult`
--

DROP TABLE IF EXISTS `studentresult`;
CREATE TABLE IF NOT EXISTS `studentresult` (
  `sr_no` int(11) NOT NULL AUTO_INCREMENT,
  `std_id` int(11) NOT NULL,
  `course` varchar(50) NOT NULL,
  `ostp` int(11) NOT NULL,
  `java` int(11) NOT NULL,
  `ds` int(11) NOT NULL,
  `se` int(11) NOT NULL,
  `adbms` int(11) NOT NULL,
  `total` double NOT NULL,
  `percentage` double NOT NULL,
  `class` int(11) NOT NULL,
  `result` int(11) NOT NULL,
  PRIMARY KEY (`sr_no`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;
--
-- Database: `studentresult1`
--
CREATE DATABASE IF NOT EXISTS `studentresult1` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `studentresult1`;

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

DROP TABLE IF EXISTS `admin`;
CREATE TABLE IF NOT EXISTS `admin` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` varchar(50) NOT NULL,
  `password` varchar(100) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `user_id`, `password`) VALUES
(1, 'kishan', '1234');

-- --------------------------------------------------------

--
-- Table structure for table `studentdetails`
--

DROP TABLE IF EXISTS `studentdetails`;
CREATE TABLE IF NOT EXISTS `studentdetails` (
  `std_id` int(11) NOT NULL AUTO_INCREMENT,
  `std_name` varchar(50) NOT NULL,
  `father_name` varchar(50) NOT NULL,
  `surname` varchar(50) NOT NULL,
  `course` varchar(20) NOT NULL,
  `sem` int(11) NOT NULL,
  `email` varchar(50) NOT NULL,
  `psw` varchar(50) NOT NULL,
  `contact` varchar(20) NOT NULL,
  `gender` varchar(10) NOT NULL,
  `profilepic` varchar(100) NOT NULL,
  `std_status` varchar(10) NOT NULL,
  PRIMARY KEY (`std_id`)
) ENGINE=InnoDB AUTO_INCREMENT=15 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `studentdetails`
--

INSERT INTO `studentdetails` (`std_id`, `std_name`, `father_name`, `surname`, `course`, `sem`, `email`, `psw`, `contact`, `gender`, `profilepic`, `std_status`) VALUES
(1, 'Pritam', 'Menshibhai', 'Vala', 'MCA', 1, 'pritam@gmail.com', '123456789', '8866546137', 'Male', 'john-abrah.webp', 'Active'),
(2, 'Saurabh', '', '', 'Msc(IT)', 1, 'saurabh@gmail.com', '123456789', '8866552235', 'Male', 'images.jfif', 'Active'),
(3, 'Harsh', '', '', 'MCA', 1, 'harsh@gmail.com', '123456789', '8866989745', 'Male', '', 'Active'),
(4, 'Rohit', '', '', 'Msc(IT)', 1, 'rohit@gmail.com', '123456789', '9898654321', 'Male', '', 'Active'),
(5, 'Faizan', '', '', 'MCA', 1, 'faizan@gmail.com', '123456789', '9998633214', 'Male', '', 'Active'),
(6, 'Abhishek', '', '', 'MCA', 2, 'abhishek@gmail.com', '123456789', '7045123456', 'Male', '', 'Active'),
(7, 'Aftab', '', '', 'MCA', 2, 'aftab@gmail.com', '123456789', '7065896532', 'Male', '', 'Active'),
(8, 'Harsh', '', '', 'MCA', 2, 'harsh1@gmail.com', '123456789', '8866235698', 'Male', '', 'Active'),
(9, 'Jigar', '', '', 'Msc(IT)', 2, 'jigar@gmail.com', '123456789', '7063524198', 'Male', '', 'Active'),
(10, 'Ram', '', '', 'MCA', 3, 'ram@gmail.com', '123456789', '9988665521', 'Male', '', 'Active'),
(11, 'Jignesh', '', '', 'Msc(IT)', 3, 'jignesh@gmail.com', '123456789', '9966554422', 'Male', '', 'Active'),
(12, 'Preet', '', '', 'Msc(IT)', 4, 'preet@gmail.com', '123456789', '8866443322', 'Male', '', 'Active'),
(13, 'kishan', '', '', 'Msc(IT)', 1, 'kishan@gmail.com', '123456789', '3336655441', 'Male', 'K.PHOTO.jpg', 'Active'),
(14, 'Chingi', '', '', 'Msc(IT)', 1, 'neha@gmail.com', '123456789', '9966335511', 'Female', 'IMG_20170502_102213684.jpg', 'Active');

-- --------------------------------------------------------

--
-- Table structure for table `studentresult`
--

DROP TABLE IF EXISTS `studentresult`;
CREATE TABLE IF NOT EXISTS `studentresult` (
  `sr_no` int(11) NOT NULL AUTO_INCREMENT,
  `std_id` int(11) NOT NULL,
  `course` varchar(20) NOT NULL,
  `ostp` int(11) NOT NULL,
  `java` int(11) NOT NULL,
  `ds` int(11) NOT NULL,
  `se` int(11) NOT NULL,
  `adbms` int(11) NOT NULL,
  `total` double NOT NULL,
  `percentage` double NOT NULL,
  `class` varchar(50) NOT NULL,
  `result` varchar(50) NOT NULL,
  PRIMARY KEY (`sr_no`),
  KEY `std_id` (`std_id`)
) ENGINE=InnoDB AUTO_INCREMENT=16 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `studentresult`
--

INSERT INTO `studentresult` (`sr_no`, `std_id`, `course`, `ostp`, `java`, `ds`, `se`, `adbms`, `total`, `percentage`, `class`, `result`) VALUES
(1, 1, '', 100, 100, 100, 100, 100, 500, 100, 'Distiction', 'Pass'),
(2, 2, '', 100, 100, 100, 100, 100, 500, 100, 'Distiction', 'Pass'),
(3, 6, '', 100, 100, 100, 100, 100, 500, 100, 'Distiction', 'Pass'),
(4, 7, '', 100, 100, 100, 100, 100, 500, 100, 'Distiction', 'Pass'),
(5, 10, '', 100, 100, 100, 100, 100, 500, 100, 'Distiction', 'Pass'),
(6, 12, '', 100, 100, 100, 100, 100, 500, 100, 'Distiction', 'Pass'),
(9, 9, 'Msc(IT)', 100, 100, 100, 100, 100, 500, 100, 'Distiction', 'Pass'),
(10, 3, '', 100, 100, 100, 100, 100, 500, 100, 'Distiction', 'Pass'),
(11, 8, '', 100, 100, 100, 100, 100, 500, 100, 'Distiction', 'Pass'),
(14, 11, '', 90, 90, 90, 90, 90, 450, 90, 'Distiction', 'Pass'),
(15, 4, '', 100, 100, 100, 100, 100, 500, 100, 'Distiction', 'Pass');

--
-- Constraints for dumped tables
--

--
-- Constraints for table `studentresult`
--
ALTER TABLE `studentresult`
  ADD CONSTRAINT `studentresult_ibfk_1` FOREIGN KEY (`std_id`) REFERENCES `studentdetails` (`std_id`);
--
-- Database: `system`
--
CREATE DATABASE IF NOT EXISTS `system` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `system`;

-- --------------------------------------------------------

--
-- Table structure for table `marks`
--

DROP TABLE IF EXISTS `marks`;
CREATE TABLE IF NOT EXISTS `marks` (
  `ID` int(11) NOT NULL,
  `Semester` int(11) NOT NULL,
  `Sub1` int(11) NOT NULL,
  `Sub2` int(11) NOT NULL,
  `Sub3` int(11) NOT NULL,
  `Sub4` int(11) NOT NULL,
  `Sub5` int(11) NOT NULL,
  KEY `ID` (`ID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `marks`
--

INSERT INTO `marks` (`ID`, `Semester`, `Sub1`, `Sub2`, `Sub3`, `Sub4`, `Sub5`) VALUES
(1, 1, 100, 100, 100, 100, 100),
(1, 1, 100, 100, 100, 100, 100),
(1, 1, 100, 100, 100, 100, 100),
(2, 3, 9, 9, 9, 9, 9),
(2, 2, 8, 8, 8, 8, 8),
(1, 1, 100, 100, 100, 100, 100),
(1, 4, 50, 50, 50, 50, 50);

-- --------------------------------------------------------

--
-- Table structure for table `student_info`
--

DROP TABLE IF EXISTS `student_info`;
CREATE TABLE IF NOT EXISTS `student_info` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `Name` varchar(255) CHARACTER SET latin1 NOT NULL,
  `Course` varchar(255) CHARACTER SET latin1 NOT NULL,
  `Email` varchar(255) CHARACTER SET latin1 NOT NULL,
  `Password` varchar(255) CHARACTER SET latin1 NOT NULL,
  `Contact` int(10) NOT NULL,
  `Gender` varchar(30) CHARACTER SET latin1 NOT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1 COLLATE=latin1_danish_ci;

--
-- Dumping data for table `student_info`
--

INSERT INTO `student_info` (`ID`, `Name`, `Course`, `Email`, `Password`, `Contact`, `Gender`) VALUES
(1, 'Ram', 'MCA', 'abc@gmail.com', '123456789', 123456789, 'Male'),
(2, 'Aftaf', 'MCA', 'abc@gmail.com', '123456789', 123456789, 'Male');

--
-- Constraints for dumped tables
--

--
-- Constraints for table `marks`
--
ALTER TABLE `marks`
  ADD CONSTRAINT `marks_ibfk_1` FOREIGN KEY (`ID`) REFERENCES `student_info` (`ID`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
