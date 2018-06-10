-- phpMyAdmin SQL Dump
-- version 4.1.14
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Jul 01, 2017 at 03:41 AM
-- Server version: 5.6.17
-- PHP Version: 5.5.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `mini-project`
--

-- --------------------------------------------------------

--
-- Table structure for table `cs1`
--

CREATE TABLE IF NOT EXISTS `cs1` (
  `clsname` varchar(10) NOT NULL,
  `1s` int(2) NOT NULL DEFAULT '0',
  `1e` int(2) NOT NULL DEFAULT '0',
  `2s` int(2) NOT NULL DEFAULT '0',
  `2e` int(2) NOT NULL DEFAULT '0',
  `3s` int(2) NOT NULL DEFAULT '0',
  `3e` int(2) NOT NULL DEFAULT '0',
  `4s` int(2) NOT NULL DEFAULT '0',
  `4e` int(2) NOT NULL DEFAULT '0',
  `t1` varchar(20) DEFAULT NULL,
  `t2` varchar(20) DEFAULT NULL,
  PRIMARY KEY (`clsname`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `cs1`
--

INSERT INTO `cs1` (`clsname`, `1s`, `1e`, `2s`, `2e`, `3s`, `3e`, `4s`, `4e`, `t1`, `t2`) VALUES
('CS101', 0, 0, 1, 24, 0, 0, 1, 24, 'Jincy:cs100003', NULL),
('CS102', 1, 24, 0, 0, 1, 24, 0, 0, 'Anu :cs1006', NULL),
('CS103', 25, 31, 25, 44, 25, 35, 25, 43, 'Anisha:cs1008', 'Raji:cs1003'),
('CS104', 0, 0, 45, 68, 0, 0, 44, 67, 'Reena Murali:CS01', NULL),
('CS105', 32, 55, 0, 0, 36, 59, 0, 0, 'SHIBU KUMAR:CS002', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `cssz`
--

CREATE TABLE IF NOT EXISTS `cssz` (
  `1` int(2) NOT NULL,
  `2` int(2) NOT NULL,
  `3` int(2) NOT NULL,
  `4` int(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `cssz`
--

INSERT INTO `cssz` (`1`, `2`, `3`, `4`) VALUES
(55, 68, 59, 67),
(60, 60, 60, 60),
(50, 55, 60, 63),
(56, 60, 62, 64);

-- --------------------------------------------------------

--
-- Table structure for table `cstt`
--

CREATE TABLE IF NOT EXISTS `cstt` (
  `date` date NOT NULL,
  `1` char(1) NOT NULL,
  `2` char(1) NOT NULL,
  `3` char(1) NOT NULL,
  `4` char(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `cstt`
--

INSERT INTO `cstt` (`date`, `1`, `2`, `3`, `4`) VALUES
('2017-06-21', 'a', 'a', 'a', 'a');

-- --------------------------------------------------------

--
-- Table structure for table `default`
--

CREATE TABLE IF NOT EXISTS `default` (
  `1` int(3) NOT NULL DEFAULT '0',
  `2` int(3) NOT NULL DEFAULT '0',
  `3` int(3) NOT NULL DEFAULT '0',
  `4` int(3) NOT NULL DEFAULT '0',
  `5` int(3) NOT NULL DEFAULT '0',
  `6` int(3) NOT NULL DEFAULT '0',
  `7` int(3) NOT NULL DEFAULT '0',
  `8` int(3) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `default`
--

INSERT INTO `default` (`1`, `2`, `3`, `4`, `5`, `6`, `7`, `8`) VALUES
(69, 10, 66, 9, 59, 12, 62, 3);

-- --------------------------------------------------------

--
-- Table structure for table `ehall`
--

CREATE TABLE IF NOT EXISTS `ehall` (
  `rno` char(5) NOT NULL,
  `row` int(2) NOT NULL DEFAULT '7',
  `col` int(2) NOT NULL DEFAULT '3',
  `avail` tinyint(1) NOT NULL DEFAULT '1',
  `draw` tinyint(1) NOT NULL DEFAULT '0',
  `distance` int(2) NOT NULL DEFAULT '1',
  PRIMARY KEY (`rno`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `ehall`
--

INSERT INTO `ehall` (`rno`, `row`, `col`, `avail`, `draw`, `distance`) VALUES
('CE100', 7, 3, 1, 0, 1),
('ME001', 7, 3, 1, 0, 3),
('CS101', 7, 3, 1, 0, 3),
('CS102', 7, 3, 1, 0, 3),
('CS103', 10, 3, 0, 1, 3),
('CS104', 7, 3, 1, 0, 3),
('CS105', 7, 3, 1, 0, 3),
('EC100', 7, 3, 1, 0, 2),
('EC101', 7, 3, 1, 0, 2),
('EC102', 7, 3, 1, 0, 2),
('EC103', 10, 3, 1, 1, 2),
('EE101', 7, 3, 1, 0, 2),
('EE103', 10, 3, 1, 1, 2);

-- --------------------------------------------------------

--
-- Table structure for table `login`
--

CREATE TABLE IF NOT EXISTS `login` (
  `name` varchar(20) NOT NULL,
  `dept` varchar(2) NOT NULL,
  `cat` varchar(5) DEFAULT NULL,
  `user` varchar(15) NOT NULL,
  `pass` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `login`
--

INSERT INTO `login` (`name`, `dept`, `cat`, `user`, `pass`) VALUES
('Pradeep', 'ME', 'admin', 'admin', 'root'),
('', '', NULL, '', ''),
('Raji', 'CS', NULL, 'se', 'sudo');

-- --------------------------------------------------------

--
-- Table structure for table `practise`
--

CREATE TABLE IF NOT EXISTS `practise` (
  `a` int(5) NOT NULL,
  `b` int(5) NOT NULL,
  `c` int(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `practise`
--

INSERT INTO `practise` (`a`, `b`, `c`) VALUES
(48, 2, 50),
(21, 9, 30);

-- --------------------------------------------------------

--
-- Table structure for table `subject`
--

CREATE TABLE IF NOT EXISTS `subject` (
  `subid` varchar(15) NOT NULL DEFAULT '',
  `dept` varchar(2) NOT NULL,
  `sem` int(1) NOT NULL,
  `slot` char(1) DEFAULT NULL,
  `drawhall` tinyint(1) NOT NULL,
  `sname` varchar(20) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `subject`
--

INSERT INTO `subject` (`subid`, `dept`, `sem`, `slot`, `drawhall`, `sname`) VALUES
('EC201', 'EC', 3, 'A', 0, 'NETWORK THEORY'),
('EC203', 'EC', 3, 'B', 0, 'SOLID STATE DEVICES'),
('EC205', 'EC', 3, 'C', 0, 'ELECTRONICS CIRCUITS'),
('EC207', 'EC', 3, 'D', 0, 'LOGIC CIRCUIT DESIGN'),
('HS210', 'EC', 3, 'E', 0, 'LIFE SKILLS'),
('HS200', 'EC', 3, 'F', 0, 'BUSINESS ECONOMICS'),
('MA201', 'EC', 3, 'G', 0, 'LINEAR ALGEBRA'),
('EE201', 'EE', 3, 'A', 0, 'CIRCUITS AND NETWORK'),
('BE101-04', 'EC', 1, 'A', 0, 'I'),
('CS203', 'CS', 3, 'B', 0, 'SWITCHING THEORY'),
('CS205', 'CS', 3, 'C', 0, 'DATA STRUCTURES'),
('CS207', 'CS', 3, 'D', 0, 'ELECTRONICS CIRCUITS'),
('HC210', 'CS', 3, 'E', 0, 'LIFE SKILLS'),
('HS200', 'CS', 3, 'F', 0, 'BUSINESS ECONOMICS'),
('MA201', 'CS', 3, 'G', 0, 'LINEAR ALGEBRA'),
('EE203', 'EE', 3, 'B', 0, 'AN. ELECTRONIC CIRCU'),
('EE205', 'EE', 3, 'C', 0, 'DC MACHINES'),
('EE207', 'EE', 3, 'D', 0, 'COMPUTER PROGRAMMING'),
('HS201', 'EE', 3, 'E', 0, 'LIFE SKILLS'),
('HS200', 'EE', 3, 'F', 0, 'BUSINESS ECONOMICS'),
('MA201', 'EE', 3, 'G', 0, 'LINEAR ALGEBRA'),
('ME201', 'ME', 3, 'A', 0, 'MECHANICS SOLIDS'),
('ME203', 'ME', 3, 'B', 0, 'MECHANICS FLUIDS'),
('ME205', 'ME', 3, 'C', 0, 'THERMODYNAMICS'),
('ME210', 'ME', 3, 'D', 0, 'METTALURGY MAT.ENGG'),
('CE201', 'CE', 3, 'A', 0, 'MECHANICAL ENG.'),
('BE101-05', 'CS', 1, 'A', 0, 'IN'),
('BE101-01', 'CE', 1, 'A', 0, 'INTRO'),
('BE101-02', 'ME', 1, 'A', 0, 'INTRO'),
('BE101-03', 'EE', 1, 'A', 0, 'INT');

-- --------------------------------------------------------

--
-- Table structure for table `teacher`
--

CREATE TABLE IF NOT EXISTS `teacher` (
  `id` varchar(15) NOT NULL,
  `name` varchar(40) NOT NULL,
  `dept` char(2) NOT NULL DEFAULT 'CS',
  `desig` varchar(20) NOT NULL,
  `phno` int(12) NOT NULL,
  `email` varchar(40) NOT NULL,
  `pp` int(2) NOT NULL DEFAULT '0',
  `pu` int(2) NOT NULL,
  `available` int(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `teacher`
--

INSERT INTO `teacher` (`id`, `name`, `dept`, `desig`, `phno`, `email`, `pp`, `pu`, `available`) VALUES
('CS002', 'SHIBU KUMAR', 'CS', 'PROFESSOR', 123, 'QWEWERERFZ', 20, 1, 1),
('CS01', 'Reena Murali', 'CS', 'HOD', 12333444, 'qwerty@gmail.com', 50, 1, 1),
('ce001', 'BINU KOSHI', 'CE', 'PROFESSER', 972829007, 'qweqrwer@gmail.com', 20, 0, 1),
('ME1001', 'BIJU', 'ME', 'PROFESSOR', 1234665, 'qweqrwer@gmail.com', 20, 0, 1),
('EC1001', 'JOY', 'EC', 'PROFESSOR', 12345, 'qweqrwer@gmail.com', 20, 0, 1),
('ce002', 'praveen', 'CE', 'HOD', 12345678, 'qweqrwer@gmail.com', 50, 0, 1),
('ec0002', 'anu george', 'EC', 'PROFESSOR', 124797543, 'qweqrwer@gmail.com', 20, 0, 1),
('ME10004', 'Pradeep', 'ME', 'PROFESSOR', 12347899, 'qweqrwer@gmail.com', 20, 0, 1),
('EE1001', 'Sreelekha', 'EE', 'PROFESSOR', 123456443, 'qweqrwer@gmail.com', 20, 0, 1),
('EE2001', 'Vyshak', 'EE', 'guest', 12345678, 'qweqrwer@gmail.com', 10, 0, 1),
('cs1003', 'Raji', 'CS', 'PROFESSOR', 123, 'qweqrwer@gmail.com', 20, 1, 1),
('cs1008', 'Anisha', 'CS', 'guest', 1223333, 'qweqrwer@gmail.com', 10, 1, 1),
('cs100003', 'Jincy', 'CS', 'guest', 1111, 'qweqrwer@gmail.com', 10, 1, 1),
('cs1006', 'Anu ', 'CS', 'PROFESSOR', 123456789, 'qweqrwer@gmail.com', 20, 1, 1),
('ME0008', 'Ramesh k', 'ME', 'PRO', 123456789, 'qwerty@gmail.com', 20, 0, 1);

-- --------------------------------------------------------

--
-- Table structure for table `timetable`
--

CREATE TABLE IF NOT EXISTS `timetable` (
  `date` date NOT NULL,
  `fa` int(1) NOT NULL,
  `1` char(1) DEFAULT NULL,
  `2` char(1) DEFAULT NULL,
  `3` char(1) DEFAULT NULL,
  `4` char(1) DEFAULT NULL,
  `5` char(1) DEFAULT NULL,
  `6` char(1) DEFAULT NULL,
  `7` char(1) DEFAULT NULL,
  `8` char(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
