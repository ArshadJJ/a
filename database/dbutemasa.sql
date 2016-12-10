-- phpMyAdmin SQL Dump
-- version 4.1.14
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Dec 10, 2016 at 08:23 PM
-- Server version: 5.6.17
-- PHP Version: 5.5.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `dbutemasa`
--
CREATE DATABASE IF NOT EXISTS `dbutemasa` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `dbutemasa`;

-- --------------------------------------------------------

--
-- Table structure for table `tblattendent`
--

DROP TABLE IF EXISTS `tblattendent`;
CREATE TABLE IF NOT EXISTS `tblattendent` (
  `attendentID` int(11) NOT NULL AUTO_INCREMENT,
  `meetingID` int(11) DEFAULT NULL,
  `userID` varchar(11) DEFAULT NULL,
  `statusName` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`attendentID`),
  KEY `meetingID` (`meetingID`),
  KEY `userID` (`userID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `tblcategories`
--

DROP TABLE IF EXISTS `tblcategories`;
CREATE TABLE IF NOT EXISTS `tblcategories` (
  `categoryID` int(11) NOT NULL AUTO_INCREMENT,
  `categoryName` varchar(255) NOT NULL,
  `categoryDescription` varchar(255) NOT NULL,
  PRIMARY KEY (`categoryID`),
  UNIQUE KEY `cat_name_unique` (`categoryName`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=6 ;

--
-- Dumping data for table `tblcategories`
--

INSERT INTO `tblcategories` (`categoryID`, `categoryName`, `categoryDescription`) VALUES
(3, 'Programming', 'For Student '),
(5, 'Database', 'DBA');

-- --------------------------------------------------------

--
-- Table structure for table `tblcomment`
--

DROP TABLE IF EXISTS `tblcomment`;
CREATE TABLE IF NOT EXISTS `tblcomment` (
  `commentID` int(11) NOT NULL AUTO_INCREMENT,
  `commentContent` longtext NOT NULL,
  `commentCreated` datetime NOT NULL,
  `userID` varchar(11) NOT NULL,
  `postID` int(11) NOT NULL,
  PRIMARY KEY (`commentID`),
  KEY `userID` (`userID`),
  KEY `postID` (`postID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `tblmeeting`
--

DROP TABLE IF EXISTS `tblmeeting`;
CREATE TABLE IF NOT EXISTS `tblmeeting` (
  `meetingID` int(11) NOT NULL AUTO_INCREMENT,
  `agendaName` varchar(255) DEFAULT NULL,
  `meetingVenue` varchar(255) DEFAULT NULL,
  `meetingDate` datetime DEFAULT NULL,
  `userID` varchar(11) DEFAULT NULL,
  `roleID` int(11) DEFAULT NULL,
  PRIMARY KEY (`meetingID`),
  KEY `userID` (`userID`),
  KEY `roleID` (`roleID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `tblpost`
--

DROP TABLE IF EXISTS `tblpost`;
CREATE TABLE IF NOT EXISTS `tblpost` (
  `postID` int(11) NOT NULL AUTO_INCREMENT,
  `postTitle` varchar(255) DEFAULT NULL,
  `postContent` varchar(255) DEFAULT NULL,
  `categoryID` int(11) NOT NULL,
  `userID` varchar(11) DEFAULT NULL,
  `typeofPost` varchar(255) DEFAULT NULL,
  `datetimeCreated` datetime NOT NULL,
  `statusPost` varchar(255) NOT NULL,
  `approvedBy` varchar(255) NOT NULL,
  `imagePost` longtext NOT NULL,
  `attachmentPost` longtext NOT NULL,
  PRIMARY KEY (`postID`),
  KEY `userID` (`userID`),
  KEY `userID_2` (`userID`),
  KEY `categoryID` (`categoryID`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `tblpost`
--

INSERT INTO `tblpost` (`postID`, `postTitle`, `postContent`, `categoryID`, `userID`, `typeofPost`, `datetimeCreated`, `statusPost`, `approvedBy`, `imagePost`, `attachmentPost`) VALUES
(2, 'Code Hunt University', 'Code Hunt for all faculty', 3, 'B031410409', 'Image', '2016-12-08 14:48:00', 'New', '', 'C:\\Users\\ARSHAD\\Desktop\\oracle.jpg', '');

-- --------------------------------------------------------

--
-- Table structure for table `tblrole`
--

DROP TABLE IF EXISTS `tblrole`;
CREATE TABLE IF NOT EXISTS `tblrole` (
  `roleID` int(11) NOT NULL AUTO_INCREMENT,
  `roleName` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`roleID`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Dumping data for table `tblrole`
--

INSERT INTO `tblrole` (`roleID`, `roleName`) VALUES
(1, 'Admin'),
(2, 'Finance'),
(3, 'High Community member'),
(4, 'Member');

-- --------------------------------------------------------

--
-- Table structure for table `tbluser`
--

DROP TABLE IF EXISTS `tbluser`;
CREATE TABLE IF NOT EXISTS `tbluser` (
  `userID` varchar(11) NOT NULL,
  `userName` varchar(255) DEFAULT NULL,
  `usericNo` varchar(12) DEFAULT NULL,
  `userstaffNo` varchar(10) DEFAULT NULL,
  `userGender` varchar(7) DEFAULT NULL,
  `userpositionorGrade` varchar(255) DEFAULT NULL,
  `userFaculty` varchar(255) DEFAULT NULL,
  `userAddress` varchar(255) DEFAULT NULL,
  `userEmail` varchar(255) DEFAULT NULL,
  `userhousetelNo` varchar(10) DEFAULT NULL,
  `userofficetelNo` varchar(10) DEFAULT NULL,
  `userhandphoneNo` varchar(14) DEFAULT NULL,
  `userPassword` varchar(255) DEFAULT NULL,
  `roleID` int(11) DEFAULT NULL,
  PRIMARY KEY (`userID`),
  KEY `roleID` (`roleID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbluser`
--

INSERT INTO `tbluser` (`userID`, `userName`, `usericNo`, `userstaffNo`, `userGender`, `userpositionorGrade`, `userFaculty`, `userAddress`, `userEmail`, `userhousetelNo`, `userofficetelNo`, `userhandphoneNo`, `userPassword`, `roleID`) VALUES
('1', '1', '1', '1', 'Male', '1', '1', '1', '1', '1', '1', '1', '1', 2),
('2', '2', '2', '2', 'Male', '2', '2', '2', '2', '2', '2', '2', '2', 3),
('B031410400', 'azri', '920503085405', 'B031410400', 'Male', '1', 'ftmk', 'no1', 'azri@gmail.com', '055284614', '055284614', '0165401122', '1234', 3),
('B031410409', 'arshad', '920607085605', 'B031410409', 'Male', '1', 'FTMK', 'No 72, Persiaran jelapang 5\r\nTaman Silibin,\r\n30100, Ipoh, Perak', 'muhamedarshad007@gmail.com', '055284614', '055272743', '0175756805', '7863', 1);

--
-- Constraints for dumped tables
--

--
-- Constraints for table `tblattendent`
--
ALTER TABLE `tblattendent`
  ADD CONSTRAINT `tblattendent_ibfk_1` FOREIGN KEY (`meetingID`) REFERENCES `tblmeeting` (`meetingID`),
  ADD CONSTRAINT `tblattendent_ibfk_2` FOREIGN KEY (`userID`) REFERENCES `tbluser` (`userID`);

--
-- Constraints for table `tblcomment`
--
ALTER TABLE `tblcomment`
  ADD CONSTRAINT `tblcomment_ibfk_2` FOREIGN KEY (`postID`) REFERENCES `tblpost` (`postID`),
  ADD CONSTRAINT `tblcomment_ibfk_3` FOREIGN KEY (`userID`) REFERENCES `tbluser` (`userID`);

--
-- Constraints for table `tblmeeting`
--
ALTER TABLE `tblmeeting`
  ADD CONSTRAINT `tblmeeting_ibfk_1` FOREIGN KEY (`roleID`) REFERENCES `tblrole` (`roleID`),
  ADD CONSTRAINT `tblmeeting_ibfk_2` FOREIGN KEY (`userID`) REFERENCES `tbluser` (`userID`);

--
-- Constraints for table `tblpost`
--
ALTER TABLE `tblpost`
  ADD CONSTRAINT `tblpost_ibfk_2` FOREIGN KEY (`categoryID`) REFERENCES `tblcategories` (`categoryID`),
  ADD CONSTRAINT `tblpost_ibfk_3` FOREIGN KEY (`userID`) REFERENCES `tbluser` (`userID`);

--
-- Constraints for table `tbluser`
--
ALTER TABLE `tbluser`
  ADD CONSTRAINT `tbluser_ibfk_1` FOREIGN KEY (`roleID`) REFERENCES `tblrole` (`roleID`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
