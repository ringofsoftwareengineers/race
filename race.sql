-- phpMyAdmin SQL Dump
-- version 4.1.14
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: May 17, 2018 at 09:34 PM
-- Server version: 5.6.17
-- PHP Version: 5.5.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `race`
--

-- --------------------------------------------------------

--
-- Table structure for table `race`
--

CREATE TABLE IF NOT EXISTS `race` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `race_title` varchar(512) NOT NULL,
  `race_date` varchar(50) NOT NULL,
  `time_at_save` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `race`
--

INSERT INTO `race` (`id`, `race_title`, `race_date`, `time_at_save`) VALUES
(1, 'My Test Race', '17-5-2018', '2018-05-17 18:49:00'),
(2, 'My Test Race2', '17-5-2018', '2018-05-17 19:17:59');

-- --------------------------------------------------------

--
-- Table structure for table `race_runner`
--

CREATE TABLE IF NOT EXISTS `race_runner` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `runner_name` varchar(100) NOT NULL,
  `time_at_save` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `race_runner`
--

INSERT INTO `race_runner` (`id`, `runner_name`, `time_at_save`) VALUES
(1, 'Tony John', '2018-05-17 18:28:48');

-- --------------------------------------------------------

--
-- Table structure for table `race_runner_time`
--

CREATE TABLE IF NOT EXISTS `race_runner_time` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `runner_id` int(11) NOT NULL,
  `race_id` int(11) NOT NULL,
  `race_time` varchar(50) NOT NULL,
  `time_at_save` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `race_runner_time`
--

INSERT INTO `race_runner_time` (`id`, `runner_id`, `race_id`, `race_time`, `time_at_save`) VALUES
(1, 1, 1, '1200', '2018-05-17 19:30:16');

-- --------------------------------------------------------

--
-- Table structure for table `race_user`
--

CREATE TABLE IF NOT EXISTS `race_user` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_login` varchar(50) NOT NULL,
  `password` varchar(100) NOT NULL,
  `time_at_save` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `user_type` varchar(20) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `user_login` (`user_login`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `race_user`
--

INSERT INTO `race_user` (`id`, `user_login`, `password`, `time_at_save`, `user_type`) VALUES
(1, 'admin', '202cb962ac59075b964b07152d234b70', '2018-05-17 16:56:03', 'admin');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
