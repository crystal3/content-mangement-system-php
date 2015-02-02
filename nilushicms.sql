-- phpMyAdmin SQL Dump
-- version 4.1.14
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Oct 13, 2014 at 01:35 PM
-- Server version: 5.6.17
-- PHP Version: 5.5.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `nilushicms`
--

-- --------------------------------------------------------

--
-- Table structure for table `contactform`
--

CREATE TABLE IF NOT EXISTS `contactform` (
  `contactFormId` int(11) NOT NULL AUTO_INCREMENT,
  `senderTitle` varchar(20) NOT NULL,
  `senderFName` varchar(100) NOT NULL,
  `senderLName` varchar(100) NOT NULL,
  `senderPhone` smallint(6) NOT NULL,
  `senderEmail` varchar(200) NOT NULL,
  `message` text NOT NULL,
  PRIMARY KEY (`contactFormId`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=9 ;

--
-- Dumping data for table `contactform`
--

INSERT INTO `contactform` (`contactFormId`, `senderTitle`, `senderFName`, `senderLName`, `senderPhone`, `senderEmail`, `message`) VALUES
(1, '0', '0', '0', 32767, 'hull@gamil.com', 'fdd'),
(2, '0', '0', '0', 32767, 'hull@gamil.com', 'trdgh'),
(3, '0', '0', '0', 32767, 'hull@gamil.com', 'trdgh'),
(4, '0', '0', '0', 32767, 'hull@gamil.com', 'trdgh'),
(5, '0', '0', '0', 32767, 'hull@gamil.com', 'trdgh'),
(6, '0', '0', '0', 32767, 'hull@gamil.com', 'trdgh'),
(7, '0', '0', '0', 32767, 'ghjj@gmail.com', 'trrf'),
(8, 'g', 'f', 'ffff', 32767, 'FFD@WRWRW.CO', 'testing');

-- --------------------------------------------------------

--
-- Table structure for table `course`
--

CREATE TABLE IF NOT EXISTS `course` (
  `courseId` int(11) NOT NULL AUTO_INCREMENT,
  `courseCode` varchar(50) NOT NULL,
  `courseName` varchar(30) NOT NULL,
  `description` varchar(300) NOT NULL,
  `headTeacher` varchar(50) NOT NULL,
  PRIMARY KEY (`courseId`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=6 ;

--
-- Dumping data for table `course`
--

INSERT INTO `course` (`courseId`, `courseCode`, `courseName`, `description`, `headTeacher`) VALUES
(1, 'WEB7658', 'Diploma wesite', 'website development', 'Peter Jill'),
(3, 'DBA3432', 'Data Base Design', 'Design the database', 'Jane Kale'),
(4, 'SQL2345', 'SQL', 'Learn basic SQL', 'Kate Dael'),
(5, 'XML2454', 'XML', 'Learn basic XML', 'Lamb Gaste');

-- --------------------------------------------------------

--
-- Table structure for table `enrollment`
--

CREATE TABLE IF NOT EXISTS `enrollment` (
  `enrollmentId` int(11) NOT NULL AUTO_INCREMENT,
  `studentId` int(11) NOT NULL,
  `courseId` int(11) NOT NULL,
  PRIMARY KEY (`enrollmentId`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=7 ;

--
-- Dumping data for table `enrollment`
--

INSERT INTO `enrollment` (`enrollmentId`, `studentId`, `courseId`) VALUES
(2, 1, 3),
(3, 11, 1),
(4, 12, 5),
(5, 13, 4),
(6, 14, 4);

-- --------------------------------------------------------

--
-- Table structure for table `student`
--

CREATE TABLE IF NOT EXISTS `student` (
  `studentId` int(11) NOT NULL AUTO_INCREMENT,
  `firstName` varchar(30) NOT NULL,
  `lastName` varchar(30) NOT NULL,
  `street` varchar(30) NOT NULL,
  `suburb` varchar(30) NOT NULL,
  `postcode` char(4) NOT NULL,
  `email` varchar(50) NOT NULL,
  `phone` smallint(6) NOT NULL,
  `dob` date NOT NULL,
  PRIMARY KEY (`studentId`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=15 ;

--
-- Dumping data for table `student`
--

INSERT INTO `student` (`studentId`, `firstName`, `lastName`, `street`, `suburb`, `postcode`, `email`, `phone`, `dob`) VALUES
(1, 'Jane', 'Hull', 'Elm Street', 'Foster', '2345', 'jane.hull@gmail.com', 0, '2000-09-08'),
(6, 'Peter', 'Gill', 'Rover Street', 'Bider', '3421', 'nk@n.om', 0, '1970-01-01'),
(9, 'Peter', 'Gill', 'Rover Street', 'Bider', '3421', 'peter.gill@gmail.com', 1212, '1970-01-01'),
(10, 'Peter', 'Gill', 'Rover Street', 'Bider', '3421', 'peter.gill@gmail.com', 23455, '1970-01-01'),
(12, 'Nilushi', 'K', 'Old Prospect', 'Greystanes', '2145', 'nk@n.om', 32767, '1970-01-01'),
(13, 'hes', 'erewrewewr', 'wqeqwqwqe', 'eweqwe', '3222', 'ni@n.com', 32767, '1970-01-01'),
(14, 'Hela', 'Geal', 'Rose Street', 'Rosebay', '2345', 'hela@gamil.com', 32767, '1970-01-01');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE IF NOT EXISTS `user` (
  `userId` int(11) NOT NULL AUTO_INCREMENT,
  `userName` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  PRIMARY KEY (`userId`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`userId`, `userName`, `password`) VALUES
(1, 'tt', '7b52009b64fd0a2a49e6d8a939753077792b0554'),
(2, 'Crystal1', '93e5a0c0db45c44ef7da0764dcb33f59e885320b'),
(3, 'admin', 'e727d1464ae12436e899a726da5b2f11d8381b26');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
