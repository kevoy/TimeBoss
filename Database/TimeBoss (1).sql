-- phpMyAdmin SQL Dump
-- version 4.0.4.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: May 09, 2015 at 04:56 PM
-- Server version: 5.5.32
-- PHP Version: 5.4.19

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `TimeBoss`
--
CREATE DATABASE IF NOT EXISTS `TimeBoss` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `TimeBoss`;

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

-- --------------------------------------------------------

--
-- Table structure for table `contains`
--

CREATE TABLE IF NOT EXISTS `contains` (
  `schedule_id` varchar(100) NOT NULL,
  `task_id` varchar(100) NOT NULL,
  PRIMARY KEY (`task_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

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
('123', '1');

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
  `request_status` varchar(100) NOT NULL,
  PRIMARY KEY (`user_id`,`meeting_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `group_meeting`
--

CREATE TABLE IF NOT EXISTS `group_meeting` (
  `meeting_id` varchar(100) NOT NULL,
  `task_id` varchar(100) NOT NULL,
  `num_users` int(11) NOT NULL,
  `requests_accepted` int(11) NOT NULL,
  `suggested_time` datetime NOT NULL,
  PRIMARY KEY (`meeting_id`),
  KEY `meeting_id` (`meeting_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

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
('1', 'schedule', '2015-05-08 00:00:00', 2, 1, 1, 'private');

-- --------------------------------------------------------

--
-- Table structure for table `task`
--

CREATE TABLE IF NOT EXISTS `task` (
  `task_id` varchar(100) NOT NULL,
  `task_app_id` varchar(100) NOT NULL,
  `name` varchar(100) NOT NULL,
  `location` text NOT NULL,
  `start` datetime NOT NULL,
  `end` datetime NOT NULL,
  `repeat` varchar(5) NOT NULL,
  `mandatory` varchar(5) NOT NULL,
  `priority` int(11) NOT NULL,
  `description` text NOT NULL,
  `access` varchar(100) NOT NULL,
  PRIMARY KEY (`task_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `task`
--

INSERT INTO `task` (`task_id`, `task_app_id`, `name`, `location`, `start`, `end`, `repeat`, `mandatory`, `priority`, `description`, `access`) VALUES
('123', 'abc', 'Test App', 'Down Town, Kingston, Jamaica', '2015-05-09 00:00:00', '2015-05-30 00:00:00', 'false', 'true', 0, 'test description', 'private');

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
('1', 'at@yahoo.com', '1234321', 'true');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
