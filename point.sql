-- phpMyAdmin SQL Dump
-- version 4.1.14
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Mar 06, 2016 at 06:37 PM
-- Server version: 5.6.17
-- PHP Version: 5.5.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `point`
--

-- --------------------------------------------------------

--
-- Table structure for table `employee`
--

CREATE TABLE IF NOT EXISTS `employee` (
  `Employeeid` int(11) NOT NULL AUTO_INCREMENT,
  `Employeename` varchar(30) NOT NULL,
  `Leadname` varchar(30) NOT NULL,
  `LeadId` int(11) NOT NULL,
  `StartDate` date NOT NULL,
  `EndDate` date NOT NULL,
  PRIMARY KEY (`Employeeid`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `employee`
--

INSERT INTO `employee` (`Employeeid`, `Employeename`, `Leadname`, `LeadId`, `StartDate`, `EndDate`) VALUES
(1, 'employee1', 'Lead1', 1, '0000-00-00', '0000-00-00'),
(2, 'employee2', 'Lead1', 2, '0000-00-00', '0000-00-00');

-- --------------------------------------------------------

--
-- Table structure for table `login`
--

CREATE TABLE IF NOT EXISTS `login` (
  `Id` int(11) NOT NULL AUTO_INCREMENT,
  `Username` varchar(30) NOT NULL,
  `Email` varchar(30) NOT NULL,
  `Password` varchar(10) NOT NULL,
  `Name` varchar(30) NOT NULL,
  PRIMARY KEY (`Id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Dumping data for table `login`
--

INSERT INTO `login` (`Id`, `Username`, `Email`, `Password`, `Name`) VALUES
(1, 'sample', 'divakarvenu26@gmail.com', '5e8ff9bf55', 'Nithyanandam'),
(2, 'sample', 'sample', '5e8ff9bf55', 'sample'),
(3, 'a', 'a', '0cc175b9c0', 'a'),
(4, 'as', 'as', 'as', 'as');

-- --------------------------------------------------------

--
-- Table structure for table `point`
--

CREATE TABLE IF NOT EXISTS `point` (
  `Employeeid` int(11) NOT NULL,
  `Employeename` varchar(30) NOT NULL,
  `Date` int(11) NOT NULL,
  `A` int(11) NOT NULL,
  `B` int(11) NOT NULL,
  `C` int(11) NOT NULL,
  `D` int(11) NOT NULL,
  `E` int(11) NOT NULL,
  `Total` int(11) NOT NULL,
  `id` int(11) NOT NULL AUTO_INCREMENT,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=12 ;

--
-- Dumping data for table `point`
--

INSERT INTO `point` (`Employeeid`, `Employeename`, `Date`, `A`, `B`, `C`, `D`, `E`, `Total`, `id`) VALUES
(1, 'employee1', 0, 1, 2, 3, 1, 4, 0, 2),
(1, 'employee1', 2, 1, 1, 1, 1, 1, 0, 3),
(1, 'employee1', 3, 5, 1, 2, 3, 4, 0, 4),
(1, 'employee1', 1, 1, 1, 1, 1, 1, 0, 5),
(1, 'employee1', 0, 1, 2, 1, 5, 7, 0, 6),
(1, 'employee1', 1, 2, 3, 5, 6, 7, 0, 7),
(1, 'employee1', 2, 4, 5, 6, 7, 8, 0, 8),
(1, 'employee1', 1, 34, 5, 6, 7, 8, 0, 9),
(1, 'employee1', 1, 34, 5, 6, 7, 8, 0, 10),
(2, 'employee2', 1, 2, 4, 5, 6, 7, 0, 11);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
