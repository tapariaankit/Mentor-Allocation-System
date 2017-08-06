-- phpMyAdmin SQL Dump
-- version 3.5.2
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Mar 31, 2014 at 03:31 PM
-- Server version: 5.5.25a
-- PHP Version: 5.4.4

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `guide`
--

-- --------------------------------------------------------

--
-- Table structure for table `auth_hod`
--

CREATE TABLE IF NOT EXISTS `auth_hod` (
  `id` varchar(20) NOT NULL,
  `password` varchar(30) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `auth_hod`
--

INSERT INTO `auth_hod` (`id`, `password`) VALUES
('hod', 'hod');

-- --------------------------------------------------------

--
-- Table structure for table `auth_prof`
--

CREATE TABLE IF NOT EXISTS `auth_prof` (
  `auth` int(1) DEFAULT '0',
  `id` varchar(10) NOT NULL DEFAULT '',
  `password` varchar(30) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `auth_prof`
--

INSERT INTO `auth_prof` (`auth`, `id`, `password`) VALUES
(1, 'cs128', 'sumit'),
(1, 'cs68', 'sumit'),
(1, 'poiuy', 'qwe'),
(1, 'qwerty', 'asd');

-- --------------------------------------------------------

--
-- Table structure for table `auth_stud`
--

CREATE TABLE IF NOT EXISTS `auth_stud` (
  `auth` int(1) DEFAULT '0',
  `id` varchar(10) NOT NULL DEFAULT '',
  `password` varchar(30) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `auth_stud`
--

INSERT INTO `auth_stud` (`auth`, `id`, `password`) VALUES
(1, '111cs0068', 'sumit'),
(1, '111cs0128', 'nandita'),
(1, '111cs0136', 'sumit'),
(1, '111cs111', '123'),
(1, '111mn111', 'sonu'),
(1, '150', 'mader'),
(1, '711cs2165', 'sumit');

-- --------------------------------------------------------

--
-- Stand-in structure for view `cgpa`
--
CREATE TABLE IF NOT EXISTS `cgpa` (
`rollno` varchar(10)
,`cgpa` double
);
-- --------------------------------------------------------

--
-- Table structure for table `credit`
--

CREATE TABLE IF NOT EXISTS `credit` (
  `sem` int(2) NOT NULL,
  `credit` int(2) DEFAULT NULL,
  PRIMARY KEY (`sem`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `credit`
--

INSERT INTO `credit` (`sem`, `credit`) VALUES
(1, 30),
(2, 30),
(3, 25),
(4, 25),
(5, 25),
(6, 25),
(7, 25),
(8, 27);

-- --------------------------------------------------------

--
-- Table structure for table `profaoi`
--

CREATE TABLE IF NOT EXISTS `profaoi` (
  `pid` varchar(10) NOT NULL DEFAULT '',
  `area` varchar(30) NOT NULL,
  `nos` int(2) DEFAULT NULL,
  PRIMARY KEY (`pid`,`area`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `profaoi`
--

INSERT INTO `profaoi` (`pid`, `area`, `nos`) VALUES
('cs128', 'c', 1),
('cs128', 'php', 0),
('cs68', 'c++', 3),
('cs68', 'dbms', 1);

-- --------------------------------------------------------

--
-- Table structure for table `professor`
--

CREATE TABLE IF NOT EXISTS `professor` (
  `pid` varchar(10) NOT NULL,
  `firstname` varchar(20) NOT NULL,
  `midname` varchar(20) DEFAULT NULL,
  `lastname` varchar(20) NOT NULL,
  `email` varchar(50) NOT NULL,
  PRIMARY KEY (`pid`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `professor`
--

INSERT INTO `professor` (`pid`, `firstname`, `midname`, `lastname`, `email`) VALUES
('cs128', 'hari', 'prasad', 'sahu', 'hps@gmail.com'),
('cs68', 'rama', 'kumar', 'panda', 'rkp@gmail.com'),
('poiuy', 'lkj', 'lkj', 'lkjh', 'poi@asd.com'),
('qwerty', 'qwert', 'werty', 'werty', 'wer@gmail.com');

-- --------------------------------------------------------

--
-- Table structure for table `sgpa`
--

CREATE TABLE IF NOT EXISTS `sgpa` (
  `rollno` varchar(10) NOT NULL DEFAULT '',
  `sem` int(2) NOT NULL DEFAULT '0',
  `sgpa` float NOT NULL,
  `auth` int(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`rollno`,`sem`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `sgpa`
--

INSERT INTO `sgpa` (`rollno`, `sem`, `sgpa`, `auth`) VALUES
('111cs0066', 1, 9.4, 0),
('111cs0066', 2, 9.3, 0),
('111cs0066', 3, 9.1, 0),
('111cs0068', 1, 8.2, 0),
('111cs0068', 2, 7.8, 0),
('111cs0068', 3, 7.48, 0),
('111cs0069', 1, 7.6, 0),
('111cs0069', 2, 7.9, 0),
('111cs0069', 3, 7.8, 0),
('111cs0127', 1, 7.9, 0),
('111cs0127', 2, 8.3, 0),
('111cs0127', 3, 7.8, 0),
('111cs0128', 1, 9, 0),
('111cs0128', 2, 9.07, 0),
('111cs0128', 3, 8.44, 0),
('111cs0129', 1, 8.6, 0),
('111cs0129', 2, 8.2, 0),
('111cs0129', 3, 8.4, 0),
('111cs0136', 1, 6.8, 0),
('111cs0136', 2, 7, 0),
('111cs0136', 3, 6.9, 0),
('111cs0137', 1, 7.2, 0),
('111cs0137', 2, 7.8, 0),
('111cs0137', 3, 7.4, 0),
('111cs0138', 1, 7.8, 0),
('111cs0138', 2, 8.8, 0),
('111cs0138', 3, 8.2, 0),
('111cs0150', 1, 8.4, 0),
('111cs0150', 2, 8.1, 0),
('111cs0150', 3, 8.2, 0),
('111cs0152', 1, 8.5, 0),
('111cs0152', 2, 8.1, 0),
('111cs0152', 3, 8.3, 0),
('111cs0160', 1, 9.2, 0),
('111cs0160', 2, 9.1, 0),
('111cs0160', 3, 9, 0);

-- --------------------------------------------------------

--
-- Table structure for table `studchoice`
--

CREATE TABLE IF NOT EXISTS `studchoice` (
  `sid` varchar(30) NOT NULL,
  `pid` varchar(30) NOT NULL,
  `area` varchar(30) NOT NULL,
  `cno` int(3) NOT NULL,
  PRIMARY KEY (`sid`,`pid`,`area`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `studchoice`
--

INSERT INTO `studchoice` (`sid`, `pid`, `area`, `cno`) VALUES
('111cs0068', 'cs128', 'c', 3),
('111cs0068', 'cs128', 'php', 1),
('111cs0068', 'cs68', 'dbms', 2),
('111cs0128', 'cs128', 'c', 2),
('111cs0128', 'cs68', 'coa', 1),
('111cs0128', 'cs68', 'dbms', 3),
('111cs111', 'cs128', 'c', 2),
('111cs111', 'cs128', 'php', 1),
('111cs111', 'cs68', 'dbms', 3),
('150', 'cs68', 'dbms', 2),
('150', 'poiuy', 'qaz', 1);

-- --------------------------------------------------------

--
-- Table structure for table `studconfirm`
--

CREATE TABLE IF NOT EXISTS `studconfirm` (
  `sid` varchar(30) NOT NULL,
  `area` varchar(30) DEFAULT NULL,
  `pid` varchar(30) NOT NULL,
  PRIMARY KEY (`sid`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `studconfirm`
--

INSERT INTO `studconfirm` (`sid`, `area`, `pid`) VALUES
('111cs0068', 'dbms', 'cs68'),
('111cs0128', 'c', 'cs128');

-- --------------------------------------------------------

--
-- Table structure for table `student`
--

CREATE TABLE IF NOT EXISTS `student` (
  `rollno` varchar(10) NOT NULL,
  `firstname` varchar(20) NOT NULL,
  `midname` varchar(20) DEFAULT NULL,
  `lastname` varchar(20) NOT NULL,
  `email` varchar(50) NOT NULL,
  PRIMARY KEY (`rollno`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `student`
--

INSERT INTO `student` (`rollno`, `firstname`, `midname`, `lastname`, `email`) VALUES
('111cs0068', 'sumit', 'kumar', 'garg', 'garg.sumit72@gmail.com'),
('111cs0128', 'swaraj', '', 'khadanga', 'swarajk7@gmail.com'),
('111cs0136', 'himanshu', 'kumar', 'meher', 'hkm@gmail.com'),
('111cs111', 'Rohit', '', 'Raj', 'r@r.r'),
('111mn111', 'Swaraj', '', 'Khadanga', 'swarajk7@gmail.com'),
('150', 'mani', 'mystic', 'kant', 'mani@gmail.com'),
('711cs2165', 'rohit', '', 'raj', 'disdfgh@dkj.com');

-- --------------------------------------------------------

--
-- Structure for view `cgpa`
--
DROP TABLE IF EXISTS `cgpa`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `cgpa` AS select `sgpa`.`rollno` AS `rollno`,(sum((`credit`.`credit` * `sgpa`.`sgpa`)) / sum(`credit`.`credit`)) AS `cgpa` from (`sgpa` join `credit` on((`sgpa`.`sem` = `credit`.`sem`))) group by `sgpa`.`rollno`;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `studconfirm`
--
ALTER TABLE `studconfirm`
  ADD CONSTRAINT `studconfirm_ibfk_1` FOREIGN KEY (`sid`) REFERENCES `student` (`rollno`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
