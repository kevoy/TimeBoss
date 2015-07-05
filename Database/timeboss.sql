-- phpMyAdmin SQL Dump
-- version 4.0.4.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Jul 03, 2015 at 09:09 PM
-- Server version: 5.5.32
-- PHP Version: 5.4.19

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `timeboss`
--


-- --------------------------------------------------------

--
-- Table structure for table `activity`
--

CREATE TABLE IF NOT EXISTS `activity` (
  `task_id` varchar(100) NOT NULL,
  `type` varchar(100) NOT NULL,
  PRIMARY KEY (`task_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `adds`
--

CREATE TABLE IF NOT EXISTS `adds` (
  `user_id` varchar(100) NOT NULL,
  `task_id` varchar(100) NOT NULL,
  PRIMARY KEY (`task_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `adds`
--

INSERT INTO `adds` (`user_id`, `task_id`) VALUES
('123', '1296'),
('123', '1458'),
('123', '1764'),
('123', '2657'),
('123', '4069'),
('123', '4081'),
('123', '4235'),
('9442', '4432'),
('9442', '4905'),
('123', '626'),
('1', '6961'),
('123', '7147'),
('123', '7594'),
('123', '7634'),
('123', '7901'),
('123', '8375');

-- --------------------------------------------------------

--
-- Table structure for table `contains`
--

CREATE TABLE IF NOT EXISTS `contains` (
  `schedule_id` varchar(100) NOT NULL,
  `task_id` varchar(100) NOT NULL,
  PRIMARY KEY (`task_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `contains`
--

INSERT INTO `contains` (`schedule_id`, `task_id`) VALUES
('1', '1296'),
('1', '1458'),
('1', '1764'),
('1', '2657'),
('1', '4069'),
('1', '4081'),
('1', '4235'),
('5205', '4432'),
('5205', '4905'),
('1', '626'),
('', '6961'),
('1', '7147'),
('1', '7594'),
('1', '7634'),
('1', '7901'),
('1', '8375');

-- --------------------------------------------------------

--
-- Table structure for table `creates`
--

CREATE TABLE IF NOT EXISTS `creates` (
  `user_id` varchar(100) NOT NULL,
  `schedule_id` varchar(100) NOT NULL,
  PRIMARY KEY (`schedule_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `creates`
--

INSERT INTO `creates` (`user_id`, `schedule_id`) VALUES
('123', '1'),
('9442', '5205');

-- --------------------------------------------------------

--
-- Table structure for table `generated_schedule`
--

CREATE TABLE IF NOT EXISTS `generated_schedule` (
  `generated_schedule_id` varchar(100) NOT NULL,
  `task_id` varchar(100) NOT NULL,
  `task_date_start` datetime NOT NULL,
  `task_date_end` datetime NOT NULL,
  `task_completed` varchar(5) NOT NULL,
  PRIMARY KEY (`generated_schedule_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `groups`
--

CREATE TABLE IF NOT EXISTS `groups` (
  `user_id` varchar(100) NOT NULL,
  `meeting_id` varchar(100) NOT NULL,
  `task_id` varchar(100) NOT NULL,
  `request_status` varchar(100) NOT NULL,
  PRIMARY KEY (`user_id`,`meeting_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `groups`
--

INSERT INTO `groups` (`user_id`, `meeting_id`, `task_id`, `request_status`) VALUES
('1', '4905', '6961', 'accepted'),
('1', '626', '', 'unanswered'),
('1', '7594', '', 'unanswered'),
('123', '4905', '', 'unanswered'),
('123', '626', '626', 'accepted'),
('123', '7594', '', 'accepted'),
('14', '4905', '', 'unanswered'),
('9442', '4905', '4905', 'accepted');

-- --------------------------------------------------------

--
-- Table structure for table `group_meeting`
--

CREATE TABLE IF NOT EXISTS `group_meeting` (
  `meeting_id` varchar(100) NOT NULL,
  `task_id` varchar(100) NOT NULL,
  `num_users` int(11) NOT NULL,
  `requests_accepted` int(11) NOT NULL,
  `meeting_leader` varchar(100) NOT NULL,
  PRIMARY KEY (`meeting_id`),
  KEY `meeting_id` (`meeting_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `group_meeting`
--

INSERT INTO `group_meeting` (`meeting_id`, `task_id`, `num_users`, `requests_accepted`, `meeting_leader`) VALUES
('127', '127', 5, 4, '123'),
('128', '128', 3, 3, '124'),
('1764', '1764', 2, 1, '123'),
('4081', '4081', 2, 1, '123'),
('4235', '4235', 2, 1, '123'),
('4905', '4905', 3, 2, '9442'),
('626', '626', 3, 1, '123'),
('7147', '7147', 2, 1, '123'),
('7594', '7594', 3, 1, '123'),
('7901', '7901', 2, 1, '123');

-- --------------------------------------------------------

--
-- Table structure for table `schedule`
--

CREATE TABLE IF NOT EXISTS `schedule` (
  `schedule_id` varchar(100) NOT NULL,
  `schedule_type` varchar(100) NOT NULL,
  `last_modified` datetime NOT NULL,
  `num_tasks` int(11) NOT NULL,
  `num_activities` int(11) NOT NULL,
  `num_group_meetings` int(11) NOT NULL,
  `access` varchar(100) NOT NULL,
  PRIMARY KEY (`schedule_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `schedule`
--

INSERT INTO `schedule` (`schedule_id`, `schedule_type`, `last_modified`, `num_tasks`, `num_activities`, `num_group_meetings`, `access`) VALUES
('1', 'schedule', '2015-05-08 00:00:00', 2, 1, 1, 'private'),
('5205', 'schedule', '2015-05-08 00:00:00', 0, 0, 0, 'private');

-- --------------------------------------------------------

--
-- Table structure for table `task`
--

CREATE TABLE IF NOT EXISTS `task` (
  `task_id` varchar(100) NOT NULL,
  `task_app_id` varchar(100) NOT NULL,
  `name` varchar(100) NOT NULL,
  `location` text NOT NULL,
  `startDate` date NOT NULL,
  `endDate` date NOT NULL,
  `repetitive` varchar(5) NOT NULL,
  `mandatory` varchar(5) NOT NULL,
  `startTime` time NOT NULL,
  `endTime` time NOT NULL,
  `priority` varchar(1) NOT NULL,
  `description` text NOT NULL,
  `access` varchar(100) NOT NULL,
  PRIMARY KEY (`task_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `task`
--

INSERT INTO `task` (`task_id`, `task_app_id`, `name`, `location`, `startDate`, `endDate`, `repetitive`, `mandatory`, `startTime`, `endTime`, `priority`, `description`, `access`) VALUES
('123', 'abc', 'Test App', 'Down Town, Kingston, Jamaica', '2015-05-09', '2015-05-30', 'false', 'true', '00:00:00', '00:00:00', '0', 'test description', 'private'),
('1296', '6816', 'ytfds', 'sdfs', '2015-05-16', '0000-00-00', 'false', 'false', '07:11:00', '21:09:00', 'H', 'test desd', 'false'),
('1458', '261', 'Startup Robot Meeting', 'Scotia, Downtown, Kingston', '2015-06-09', '2015-06-09', 'true', 'true', '09:00:00', '18:00:00', 'H', 'Meetup every tuesday to discuss business', 'false'),
('1764', '7910', 'dfdfg', 'fgbfgb', '2015-07-03', '2015-07-03', 'true', 'true', '09:00:00', '11:00:00', 'H', 'dfeseeefwefewf', 'false'),
('1948', '245', 'Task1', 'kign', '2015-05-15', '2015-05-18', 'false', 'false', '09:00:00', '12:33:00', 'H', 'tesk', 'true'),
('2106', '7912', 'Tasksdf', 'sdfsf', '2015-05-09', '2015-05-09', 'false', 'false', '09:09:00', '12:12:00', 'M', 'fsjdfbsdf', 'false'),
('2657', '3299', 'Computing and society', 'Computing block', '2015-05-15', '2015-05-23', 'true', 'true', '08:00:00', '12:00:00', 'L', 'An easy course', 'true'),
('3367', '861', 'Task1', 'kign', '2015-05-15', '2015-05-18', 'false', 'false', '09:00:00', '12:33:00', '0', 'tesk', 'true'),
('4069', '9121', 'Task2', 'Uwi', '2015-06-25', '2015-06-30', 'false', 'false', '09:00:00', '19:00:00', 'M', 'agdg', 'false'),
('4081', '8074', 'dfdfg', 'fgbfgb', '2015-07-03', '2015-07-03', 'true', 'true', '09:00:00', '11:00:00', 'H', 'dfeseeefwefewf', 'false'),
('4235', '8343', 'dfdfg', 'fgbfgb', '2015-07-03', '2015-07-03', 'true', 'true', '09:00:00', '11:00:00', 'H', 'dfeseeefwefewf', 'false'),
('4356', '8514', 'Tasksdf', 'sdfsf', '2015-05-09', '2015-05-09', 'false', 'false', '09:09:00', '22:00:00', 'M', 'fsjdfbsdf', 'false'),
('4432', '268', 'Startup Jamaica Meeting', 'JN, Downtown Kingston', '2015-07-06', '2015-07-31', 'true', 'true', '09:00:00', '17:30:00', 'M', 'Complete gitlab tickets, meet for user experience', 'true'),
('4905', '7139', 'TimeBoss Group Meeting', 'U.W.I Mona, Kingston', '2015-07-16', '2015-07-16', 'false', 'true', '14:00:00', '16:30:00', 'H', '', 'false'),
('5362', '7026', 'Tasksdf', 'sdfsf', '2015-05-09', '2015-05-09', 'false', 'false', '09:09:00', '22:00:00', 'M', 'fsjdfbsdf', 'false'),
('626', '1893', 'fssdf', 'sffgff', '2015-07-03', '2015-07-03', 'false', 'true', '00:00:00', '14:00:00', 'H', 'dfsdfdd', 'false'),
('6961', '2580', 'TimeBoss Group Meeting', 'U.W.I Mona, Kingston', '2015-07-16', '2015-07-16', '', 'true', '14:00:00', '16:30:00', 'H', '', 'false'),
('7147', '58', 'dfdfg', 'fgbfgb', '2015-07-03', '2015-07-03', 'true', 'true', '09:00:00', '11:00:00', 'H', 'dfeseeefwefewf', 'false'),
('7594', '6134', 'fssdf', 'sffgff', '2015-07-03', '2015-07-03', 'false', 'true', '00:00:00', '14:00:00', 'H', 'dfsdfdd', 'false'),
('7634', '8773', 'Tasksdf', 'sdfsf', '2015-05-09', '2015-05-09', 'false', 'false', '09:09:00', '22:00:00', 'M', 'fsjdfbsdf', 'false'),
('7901', '3783', 'dfdfg', 'fgbfgb', '2015-07-03', '2015-07-03', 'true', 'true', '09:00:00', '11:00:00', 'H', 'dfeseeefwefewf', 'false'),
('8375', '1290', 'oehjfn', 'sdfsds', '2015-05-16', '2015-05-09', 'false', 'false', '07:11:00', '21:09:00', 'H', 'test desd', 'false'),
('9082', '1455', 'Tasksdf', 'sdfsf', '2015-05-09', '2015-05-09', 'false', 'false', '09:09:00', '22:00:00', 'M', 'fsjdfbsdf', 'false');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE IF NOT EXISTS `user` (
  `user_id` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `app_connected` varchar(5) NOT NULL,
  PRIMARY KEY (`user_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`user_id`, `email`, `password`, `app_connected`) VALUES
('1', 'at@yahoo.com', '1234321', 'true'),
('123', 'kev@yahoo.com', '100games', 'true'),
('14', 'money', '1bil', 'true'),
('9442', 'kevoy', 'geta', 'true');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
