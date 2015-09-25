-- phpMyAdmin SQL Dump
-- version 3.5.2.2
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Jul 12, 2013 at 01:26 PM
-- Server version: 5.5.27
-- PHP Version: 5.4.7

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `mgtsys`
--

-- --------------------------------------------------------

--
-- Table structure for table `chat`
--

CREATE TABLE IF NOT EXISTS `chat` (
  `id` int(255) NOT NULL AUTO_INCREMENT,
  `message` varchar(255) NOT NULL,
  `sender` int(255) NOT NULL,
  `date` int(50) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `conversation`
--

CREATE TABLE IF NOT EXISTS `conversation` (
  `id` int(255) NOT NULL AUTO_INCREMENT,
  `sender` varchar(50) NOT NULL,
  `reciever` varchar(50) NOT NULL,
  `messag` varchar(50) NOT NULL,
  `date` varchar(50) NOT NULL,
  `file` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=16 ;

--
-- Dumping data for table `conversation`
--

INSERT INTO `conversation` (`id`, `sender`, `reciever`, `messag`, `date`, `file`) VALUES
(1, 'd@d.in', 'c@c.in', 'hello', '2013/07/11 08:16:40', ''),
(2, 'd@d.in', 'f@f.in', 'hiiii', '2013/07/11 08:59:29', ''),
(3, 'b@b.in', 'c@c.in', 'sadsadsa', '2013/07/11 09:03:29', ''),
(4, 'f@f.in', 'admin@admin.in', 'dsadsadsad', '2013/07/11 10:03:31', ''),
(5, 'd@d.in', 'c@c.in', 'sdadsa', '2013/07/11 10:41:50', ''),
(6, 'c@c.in', 'd@d.in', 'asdadad', '2013/07/11 11:19:55', ''),
(7, 'c@c.in', 'd@d.in', 'gfhfgh', '2013/07/11 11:22:55', ''),
(8, 'c@c.in', 'f@f.in', 'fdsafda', '2013/07/11 11:24:45', ''),
(9, 'c@c.in', 'admin@admin.in', 'ssacs', '2013/07/11 11:28:42', ''),
(10, 'f@f.in', 'c@c.in', 'sdsad', '2013/07/11 11:42:40', ''),
(11, 'f@f.in', 'admin@admin.in', 'sdadsad', '2013/07/11 11:43:37', ''),
(12, 'f@f.in', 'c@c.in', 'sdasd', '2013/07/11 11:59:32', '2013 SBM DATABASE.xlsx'),
(13, 'c@c.in', 'f@f.in', 'sdsad', '2013/07/11 12:16:17', 'image.jpg'),
(14, 'b@b.in', 'c@c.in', 'sda', '2013/07/11 12:48:46', ''),
(15, 'b@b.in', 'f@f.in', 'sda', '2013/07/11 12:51:51', '5.docx');

-- --------------------------------------------------------

--
-- Table structure for table `data`
--

CREATE TABLE IF NOT EXISTS `data` (
  `Id` int(255) NOT NULL AUTO_INCREMENT,
  `Fname` varchar(50) NOT NULL,
  `Lname` varchar(50) NOT NULL,
  `City` varchar(50) NOT NULL,
  `Email` varchar(50) NOT NULL,
  `Password` varchar(11) NOT NULL,
  `Usertype` varchar(50) NOT NULL,
  `Under` varchar(50) NOT NULL,
  `Department` varchar(250) NOT NULL,
  `date` varchar(50) NOT NULL,
  PRIMARY KEY (`Id`),
  UNIQUE KEY `Email` (`Email`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=41 ;

--
-- Dumping data for table `data`
--

INSERT INTO `data` (`Id`, `Fname`, `Lname`, `City`, `Email`, `Password`, `Usertype`, `Under`, `Department`, `date`) VALUES
(19, 'a', 'a', 'a', 'a@a.in', '123456', 'DepartH', 'admin@admin.in', 'Development', '2013/07/04'),
(20, 'gfdgfg', 'fgdf', 'gffdg', 'b@b.in', '1234567', 'Pmanager', 'a@a.in', 'Development', '2013/07/04'),
(22, 'cdd', 'c', 'c', 'c@c.in', '12345', 'Teaml', 'b@b.in', 'Development', '2013/07/04'),
(23, 'd', 'd', 'd', 'd@d.in', '123456', 'TeamM', 'c@c.in', 'Development', '2013/07/04'),
(24, 'sad', 'e', 'e', 'e@e.in', '12345678', 'Teaml', 'b@b.in', 'Development', '2013/07/04'),
(25, 'f', 'f', 'f', 'f@f.in', '123456', 'Teaml', 'b@b.in', 'Development', '2013/07/04'),
(26, 'g', 'g', 'g', 'g@g.in', '123456', 'TeamM', 'f@f.in', 'SEO', '2013/07/04'),
(29, 'h', 'h', 'h', 'h@h.in', '123456', 'TeamM', 'f@f.in', 'SEO', '2013/07/04'),
(30, 'k', 'k', 'k', 'k@k.in', '123456', 'TeamM', 'e@e.in', 'SEO', '2013/07/04'),
(31, 'l', 'l', 'l', 'l@l.in', '123456', 'TeamM', 'e@e.in', 'SEO', '2013/07/04'),
(32, 'm', 'm', 'm', 'm@m.in', '123456', 'TeamM', 'c@c.in', 'SEO', '2013/07/04'),
(33, 'ADMIN', 'admin', 'admi', 'admin@admin.in', 'qwerty', 'admin', '', '', ''),
(36, 'z', 'z', 'z', 'z@z.in', '123456', 'DepartH', '', 'Development', '2013/07/04'),
(38, 'v', 'v', 'v', 'v@v.in', '123456', 'TeamM', 'e@e.in', 'Development', '2013/07/04'),
(39, 'p', 'p', 'p', 'p@p.in', '123456', 'Pmanager', 'a@a.in', 'Development', '2013/07/04'),
(40, 'Subhasish', 'Rath', 'Indore', 'subh_hawk@rediffmail.com', '123456789', 'Teaml', 'b@b.in', 'business development', '2013/07/04');

-- --------------------------------------------------------

--
-- Table structure for table `department`
--

CREATE TABLE IF NOT EXISTS `department` (
  `id` int(255) NOT NULL AUTO_INCREMENT,
  `DepartmentName` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=11 ;

--
-- Dumping data for table `department`
--

INSERT INTO `department` (`id`, `DepartmentName`) VALUES
(1, 'SEO'),
(7, 'Design'),
(9, 'business development'),
(10, 'Development');

-- --------------------------------------------------------

--
-- Table structure for table `notice`
--

CREATE TABLE IF NOT EXISTS `notice` (
  `id` int(255) NOT NULL AUTO_INCREMENT,
  `date` varchar(50) NOT NULL,
  `notice` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=14 ;

--
-- Dumping data for table `notice`
--

INSERT INTO `notice` (`id`, `date`, `notice`) VALUES
(8, '2013/07/04 13:14:21', 'sadadsa'),
(10, '2013/07/04 13:33:38', 'ion and Usage . The rows attribute specifies the visible height of a text area, in lines. Note: The size of a textarea can also be specified by the CSS height ...'),
(11, '2013/07/04 13:47:30', 'dsfdsfdsfds'),
(12, '2013/07/11 07:26:38', 'i am am am a php trainee'),
(13, '2013/07/11 07:37:12', 'aslkkka');

-- --------------------------------------------------------

--
-- Table structure for table `project`
--

CREATE TABLE IF NOT EXISTS `project` (
  `id` int(255) NOT NULL AUTO_INCREMENT,
  `projectname` varchar(255) NOT NULL,
  `projectmanager` varchar(255) NOT NULL,
  `description` mediumtext NOT NULL,
  `date` varchar(25) NOT NULL,
  `duration` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=7 ;

--
-- Dumping data for table `project`
--

INSERT INTO `project` (`id`, `projectname`, `projectmanager`, `description`, `date`, `duration`) VALUES
(1, 'apple', 'b@b.in', '', '', '4 months'),
(2, 'sumsung', 'p@p.in', '', '', '4 months'),
(3, 'nokia', 'b@b.in', '', '', '4 months'),
(4, 'micromax', 'p@p.in', '', '', '4 months'),
(5, 'htc', 'p@p.in', 'sadsadjsajkdjksadkjsabdkjsabdjk', '2013/07/12 09:16:20', '4 months'),
(6, 'virgin', 'b@b.in', 'The Sunbeam Tiger is a high-performance V8 version of the British Rootes Group''s Sunbeam Alpine roadster, designed in part by American car designer and racing driver Carroll Shelby. Shelby had carried out a similar V8 conversion on the AC Cobra, and hoped to win the contract to produce the Tiger at his facility in America. Rootes decided instead to contract the assembly work to Jensen at West Bromwich in England, and pay Shelby a royalty on every car produced. Two major versions were built: the Series I (1964–67) was fitted with the 260 cu in (4.3 L) Ford V8; the Series II, of which only 633 were built, was fitted with the larger Ford 289 cu in (4.7 L) engine. Two prototype and extensively modified versions of the Series I competed in the 1964 24 Hours of Le Mans, fitted with the larger engine, but neither completed the race. For two years the Tiger was the American Hot Rod Association''s national record holder over a quarter-mile drag strip. Production ended in 1967 soon after the Rootes Group was taken over by Chrysler, who did not have a suitable engine to replace the Ford V8. Owing to the ease and affordability of modifying the Tiger, there are few surviving cars in standard form. ', '2013/07/12 09:25:40', '3 months');

-- --------------------------------------------------------

--
-- Table structure for table `projectinfo`
--

CREATE TABLE IF NOT EXISTS `projectinfo` (
  `id` int(255) NOT NULL AUTO_INCREMENT,
  `projectid` varchar(255) NOT NULL,
  `projectmanager` varchar(255) NOT NULL,
  `TeamLeader` varchar(255) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `projectid` (`projectid`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=15 ;

--
-- Dumping data for table `projectinfo`
--

INSERT INTO `projectinfo` (`id`, `projectid`, `projectmanager`, `TeamLeader`) VALUES
(13, '6', 'b@b.in', 'c@c.in');

-- --------------------------------------------------------

--
-- Table structure for table `projectinfom`
--

CREATE TABLE IF NOT EXISTS `projectinfom` (
  `id` int(255) NOT NULL AUTO_INCREMENT,
  `projectid` varchar(255) NOT NULL,
  `teamM` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=18 ;

--
-- Dumping data for table `projectinfom`
--

INSERT INTO `projectinfom` (`id`, `projectid`, `teamM`) VALUES
(13, '6', 'g@g.in'),
(14, '6', 'h@h.in'),
(15, '6', 'k@k.in'),
(16, '6', 'm@m.in'),
(17, '6', 'v@v.in');

-- --------------------------------------------------------

--
-- Table structure for table `status`
--

CREATE TABLE IF NOT EXISTS `status` (
  `id` int(255) NOT NULL AUTO_INCREMENT,
  `sender` varchar(50) NOT NULL,
  `status` varchar(255) NOT NULL,
  `date` varchar(50) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=8 ;

--
-- Dumping data for table `status`
--

INSERT INTO `status` (`id`, `sender`, `status`, `date`) VALUES
(1, 'f@f.in', 'lkjhgffd', ''),
(2, 'b@b.in', 'sdsadsad', '2013/07/11 14:55:44'),
(3, 'd@d.in', ' sadsadsa', '2013/07/11 15:02:06'),
(4, 'd@d.in', 'hello watss aup\r\nshdahdhbas\r\nsad hs avdu sav dusa vdus avdu sav dusav dusav\r\nhello watss aup\r\nshdahdhbas\r\nsad hs avdu sav dusa vdus avdu sav dusav dusav\r\nhello watss aup\r\nshdahdhbas\r\nsad hs avdu sav dusa vdus avdu sav dusav dusav', '2013/07/11 15:02:52'),
(5, 'd@d.in', 'sadjaoijaoi\r\nshauhduisahd\r\nsdadsa', '2013/07/11 15:03:32'),
(6, 'd@d.in', 'erfdsfdsfsf', '2013/07/11 15:03:46'),
(7, 'admin@admin.in', 'hello gm', '2013/07/12 06:52:54');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
