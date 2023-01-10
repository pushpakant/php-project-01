-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Oct 15, 2021 at 08:03 PM
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
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `user_id`, `password`) VALUES
(1, 'admin', 'admin@1234'),
(2, 'kishan', 'kdc@1234');

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
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `studentdetails`
--

INSERT INTO `studentdetails` (`std_id`, `std_name`, `course`, `email`, `psw`, `contact`, `gender`) VALUES
(1, 'Pritam', 'MCA', 'pritam@gmail.com', '123456789', '9988774455', 'Male'),
(2, 'Saurabh', 'Msc(IT)', 'saurabh@gmail.com', '123456789', '8877665544', 'Male'),
(3, 'Abhishek', 'MCA', 'abhishek@gmail.com', '123456789', '8899774455', 'Male'),
(4, 'Faizan', 'MCA', 'faizan@gmail.com', '12345678', '8877441122', 'Male');

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
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `studentresult`
--

INSERT INTO `studentresult` (`sr_no`, `std_id`, `course`, `ostp`, `java`, `ds`, `se`, `adbms`, `total`, `percentage`, `class`, `result`) VALUES
(1, 1, 'MCA', 100, 100, 100, 100, 100, 500, 100, 'Distiction', 'Pass');

--
-- Constraints for dumped tables
--

--
-- Constraints for table `studentresult`
--
ALTER TABLE `studentresult`
  ADD CONSTRAINT `studentresult_ibfk_1` FOREIGN KEY (`std_id`) REFERENCES `studentdetails` (`std_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
