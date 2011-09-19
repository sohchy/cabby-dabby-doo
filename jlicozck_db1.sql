-- phpMyAdmin SQL Dump
-- version 3.4.4
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Sep 19, 2011 at 11:25 AM
-- Server version: 5.1.56
-- PHP Version: 5.2.6

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `jlicozck_db1`
--

-- --------------------------------------------------------

--
-- Table structure for table `cabbie_session`
--

CREATE TABLE IF NOT EXISTS `cabbie_session` (
  `cabbie_id` int(6) NOT NULL,
  `cabbie_session_variable` varchar(15) NOT NULL,
  `cabbie_location_lat` varchar(15) NOT NULL,
  `cabbie_location_long` varchar(15) NOT NULL,
  `timestamp` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `status` varchar(15) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `cabbie_session`
--

INSERT INTO `cabbie_session` (`cabbie_id`, `cabbie_session_variable`, `cabbie_location_lat`, `cabbie_location_long`, `timestamp`, `status`) VALUES
(1, '', '41.2476431', '-96.02236920000', '2011-09-18 08:51:26', 'free'),
(2, '', '41.2485069', '-96.03026999999', '2011-09-18 08:51:26', 'free'),
(3, '', '41.239896', '-96.02543300000', '2011-09-18 08:51:26', 'free');

-- --------------------------------------------------------

--
-- Table structure for table `customer_spotlight`
--

CREATE TABLE IF NOT EXISTS `customer_spotlight` (
  `user_id_enduser` int(11) NOT NULL,
  `user_status_free_taken` varchar(10) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `customer_spotlight`
--

INSERT INTO `customer_spotlight` (`user_id_enduser`, `user_status_free_taken`) VALUES
(91, 'free');

-- --------------------------------------------------------

--
-- Table structure for table `user_cabbie_info`
--

CREATE TABLE IF NOT EXISTS `user_cabbie_info` (
  `user_id` int(11) NOT NULL AUTO_INCREMENT,
  `user_name` varchar(254) NOT NULL,
  `user_pwd` varchar(20) NOT NULL,
  `user_email` varchar(254) NOT NULL,
  `user_lat` varchar(15) NOT NULL,
  `user_long` varchar(15) NOT NULL,
  `user_type` varchar(10) NOT NULL,
  `user_status` varchar(10) NOT NULL,
  `user_session` text NOT NULL,
  `timestamp` varchar(254) NOT NULL,
  `trip_distance` float NOT NULL,
  `trip_duration` float NOT NULL,
  PRIMARY KEY (`user_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=107 ;

--
-- Dumping data for table `user_cabbie_info`
--

INSERT INTO `user_cabbie_info` (`user_id`, `user_name`, `user_pwd`, `user_email`, `user_lat`, `user_long`, `user_type`, `user_status`, `user_session`, `timestamp`, `trip_distance`, `trip_duration`) VALUES
(89, 'cab#7', 'lobby', '', '41.12341323', '-96.333330', 'cabbie', 'free', '', '', 0, 0),
(92, '', '', '', '41.254006', '-95.999258', 'enduser', '', '4e763ad60d1a4', '1316371158', 5.9, 1),
(93, '', '', '', '41.254006', '-95.999258', 'enduser', '', '4e765a4d37a4c', '1316379213', 3.8, 7),
(94, '', '', '', '41.254006', '-95.999258', 'enduser', '', '4e766c83d9bcd', '1316383875', 506, 480),
(88, 'cab#6', 'lobby', '', '41.111113231313', '-96.22222220', 'cabbie', 'free', '', '', 0, 0),
(87, 'cab#5', 'lobby', '', '41.1218531', '-96.21211220000', 'cabbie', 'free', '', '', 0, 0),
(86, 'cab#4', 'lobby', '', '41.2476431', '-96.02236920000', 'cabbie', 'free', '', '', 0, 0),
(85, 'cab#3', 'lobby', '', '41.2485069', '-95.93026999999', 'cabbie', 'free', '', '', 0, 0),
(84, 'cab#2', 'lobby', '', '41.239896', '-96.62543300000', 'cabbie', 'free', '', '', 0, 0),
(91, '', '', '', '41.254006', '-95.999258', 'enduser', '', '4e7635e005a37', '1316369888', 1.7, 6),
(83, 'cab#1', 'lobby', '', '41.539486', '-95.72523000', 'cabbie', 'free', '', '', 0, 0),
(95, '', '', '', '41.2442731', '-96.0151891', 'enduser', '', '4e7696a82ec18', '1316394664', 249, 1),
(96, '', '', '', '41.2440073', '-96.0150696', 'enduser', '', '4e7699aaebf61', '1316395434', 11.4, 1),
(97, '', '', '', '41.244223648333', '-96.01510667500', 'enduser', '', '4e76a78d0a8eb', '1316398989', 6, 1),
(98, '', '', '', '41.2439204', '-96.0145535', 'enduser', '', '4e76a79375c70', '1316398995', 7.2, 1),
(99, '', '', '', '41.2441512', '-96.0151387', 'enduser', '', '4e76a7a4815d9', '1316399012', 110, 120),
(100, '', '', '', '41.2440538', '-96.0151242', 'enduser', '', '4e76a7df4c4a1', '1316399071', 1.5, 5),
(101, '', '', '', '41.244470486', '-96.014646702', 'enduser', '', '4e76a7e3837e3', '1316399075', 11.5, 2),
(102, '', '', '', '41.24421356125', '-96.01480664', 'enduser', '', '4e76a7e4ac45d', '1316399076', 230, 1),
(103, '', '', '', '41.059813667126', '-96.52515462608', 'enduser', '', '4e76daff35999', '1316412159', 27.6, 3),
(104, '', '', '', '41.059332797342', '-96.65145817221', 'enduser', '', '4e76e18cb91b8', '1316413836', 1, 120),
(105, '', '', '', '41.05939114', '-96.65144997', 'enduser', '', '4e76ec0c6047d', '1316416524', 61.3, 60),
(106, '', '', '', '40.81129759', '-96.61310124', 'enduser', '', '4e7750d40875a', '1316442324', 14.8, 2);

-- --------------------------------------------------------

--
-- Table structure for table `user_cabbie_relation`
--

CREATE TABLE IF NOT EXISTS `user_cabbie_relation` (
  `user_id_enduser` int(11) NOT NULL,
  `user_id_cabbie` int(11) NOT NULL,
  `distance` float NOT NULL,
  `time` float NOT NULL,
  `timestamp` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user_cabbie_relation`
--

INSERT INTO `user_cabbie_relation` (`user_id_enduser`, `user_id_cabbie`, `distance`, `time`, `timestamp`) VALUES
(91, 83, 35.9, 5, '2011-09-18 18:18:08'),
(92, 83, 2.2, 7, '2011-09-18 18:39:18'),
(91, 84, 2.2, 7, '2011-09-18 18:21:10'),
(92, 83, 37.3, 5, '2011-09-18 18:39:18'),
(92, 83, 21.8, 3, '2011-09-18 18:39:18'),
(92, 83, 41.2, 5, '2011-09-18 18:39:18'),
(92, 83, 35.9, 5, '2011-09-18 18:39:18'),
(91, 85, 37.3, 5, '2011-09-18 18:21:10'),
(91, 86, 36, 4, '2011-09-18 18:21:10'),
(91, 87, 21.8, 3, '2011-09-18 18:21:10'),
(91, 88, 32.2, 4, '2011-09-18 18:21:10'),
(91, 89, 41.2, 5, '2011-09-18 18:21:10'),
(92, 83, 32.2, 4, '2011-09-18 18:39:18'),
(92, 83, 36, 4, '2011-09-18 18:39:18'),
(93, 83, 41.2, 5, '2011-09-18 20:53:33'),
(93, 83, 21.8, 3, '2011-09-18 20:53:33'),
(93, 83, 32.2, 4, '2011-09-18 20:53:33'),
(93, 83, 2.2, 7, '2011-09-18 20:53:33'),
(93, 83, 35.9, 5, '2011-09-18 20:53:33'),
(93, 83, 37.3, 5, '2011-09-18 20:53:33'),
(93, 83, 36, 4, '2011-09-18 20:53:33'),
(94, 83, 41.2, 5, '2011-09-18 22:11:16'),
(94, 83, 21.8, 3, '2011-09-18 22:11:16'),
(94, 83, 2.2, 7, '2011-09-18 22:11:16'),
(94, 83, 32.2, 4, '2011-09-18 22:11:16'),
(94, 83, 35.9, 5, '2011-09-18 22:11:16'),
(94, 83, 37.3, 5, '2011-09-18 22:11:16'),
(94, 83, 36, 4, '2011-09-18 22:11:16'),
(95, 83, 20.4, 2, '2011-09-19 01:11:04'),
(95, 83, 41, 5, '2011-09-19 01:11:04'),
(95, 83, 32, 4, '2011-09-19 01:11:04'),
(95, 83, 0.7, 2, '2011-09-19 01:11:04'),
(95, 83, 37.2, 5, '2011-09-19 01:11:04'),
(95, 83, 37.1, 5, '2011-09-19 01:11:04'),
(95, 83, 37.3, 5, '2011-09-19 01:11:04'),
(96, 83, 0.6, 2, '2011-09-19 01:23:55'),
(96, 83, 15.3, 1, '2011-09-19 01:23:55'),
(96, 83, 37, 5, '2011-09-19 01:23:55'),
(96, 83, 20.4, 2, '2011-09-19 01:23:55'),
(96, 83, 35.1, 5, '2011-09-19 01:23:55'),
(96, 83, 6.1, 1, '2011-09-19 01:23:55'),
(96, 83, 37.3, 5, '2011-09-19 01:23:55'),
(97, 83, 20.4, 2, '2011-09-19 02:23:09'),
(97, 83, 15.4, 1, '2011-09-19 02:23:09'),
(97, 83, 0.7, 2, '2011-09-19 02:23:10'),
(97, 83, 35.2, 5, '2011-09-19 02:23:10'),
(97, 83, 6.2, 1, '2011-09-19 02:23:10'),
(97, 83, 37.1, 5, '2011-09-19 02:23:10'),
(97, 83, 37.3, 5, '2011-09-19 02:23:10'),
(98, 83, 15.9, 2, '2011-09-19 02:23:15'),
(98, 83, 21, 2, '2011-09-19 02:23:15'),
(98, 83, 35.7, 5, '2011-09-19 02:23:15'),
(98, 83, 6.1, 1, '2011-09-19 02:23:15'),
(98, 83, 1.2, 4, '2011-09-19 02:23:15'),
(98, 83, 37.1, 4, '2011-09-19 02:23:15'),
(98, 83, 37.2, 4, '2011-09-19 02:23:15'),
(99, 83, 0.7, 2, '2011-09-19 02:23:32'),
(99, 83, 20.4, 2, '2011-09-19 02:23:32'),
(99, 83, 15.4, 1, '2011-09-19 02:23:33'),
(99, 83, 6.2, 1, '2011-09-19 02:23:33'),
(99, 83, 35.2, 5, '2011-09-19 02:23:33'),
(99, 83, 37.1, 5, '2011-09-19 02:23:33'),
(99, 83, 37.3, 5, '2011-09-19 02:23:33'),
(100, 83, 15.3, 1, '2011-09-19 02:24:31'),
(100, 83, 0.6, 2, '2011-09-19 02:24:31'),
(100, 83, 6.1, 1, '2011-09-19 02:24:31'),
(100, 83, 37, 4, '2011-09-19 02:24:31'),
(100, 83, 37.3, 5, '2011-09-19 02:24:31'),
(100, 83, 35.1, 5, '2011-09-19 02:24:31'),
(100, 83, 20.4, 2, '2011-09-19 02:24:31'),
(101, 83, 20.4, 2, '2011-09-19 02:24:35'),
(101, 83, 0.7, 2, '2011-09-19 02:24:35'),
(101, 83, 35.2, 5, '2011-09-19 02:24:36'),
(101, 83, 15.4, 1, '2011-09-19 02:24:36'),
(101, 83, 6.2, 1, '2011-09-19 02:24:36'),
(101, 83, 37.1, 5, '2011-09-19 02:24:36'),
(101, 83, 37.3, 5, '2011-09-19 02:24:36'),
(102, 83, 35.2, 5, '2011-09-19 02:24:37'),
(102, 83, 20.4, 2, '2011-09-19 02:24:37'),
(102, 83, 15.4, 1, '2011-09-19 02:24:37'),
(102, 83, 0.7, 2, '2011-09-19 02:24:37'),
(102, 83, 6.2, 1, '2011-09-19 02:24:37'),
(102, 83, 37.1, 5, '2011-09-19 02:24:38'),
(102, 83, 37.3, 5, '2011-09-19 02:24:38'),
(103, 83, 17.5, 3, '2011-09-19 06:02:39'),
(103, 83, 19.8, 3, '2011-09-19 06:02:40'),
(103, 83, 36, 5, '2011-09-19 06:02:40'),
(103, 83, 28.3, 4, '2011-09-19 06:02:40'),
(103, 83, 19.3, 3, '2011-09-19 06:02:41'),
(103, 83, 40.8, 5, '2011-09-19 06:02:41'),
(103, 83, 70.1, 60, '2011-09-19 06:02:41'),
(104, 83, 29.9, 4, '2011-09-19 06:30:37'),
(104, 83, 41.3, 4, '2011-09-19 06:30:38'),
(104, 83, 49.2, 5, '2011-09-19 06:30:38'),
(104, 83, 47.1, 60, '2011-09-19 06:30:38'),
(104, 83, 51.9, 60, '2011-09-19 06:30:39'),
(104, 83, 80.1, 60, '2011-09-19 06:30:39'),
(104, 83, 14.1, 2, '2011-09-19 06:30:40'),
(105, 83, 29.9, 4, '2011-09-19 07:15:24'),
(105, 83, 41.3, 4, '2011-09-19 07:15:25'),
(105, 83, 49.2, 5, '2011-09-19 07:15:25'),
(105, 83, 47.1, 60, '2011-09-19 07:15:25'),
(105, 83, 51.9, 60, '2011-09-19 07:15:25'),
(105, 83, 14.1, 2, '2011-09-19 07:15:26'),
(105, 83, 80.1, 60, '2011-09-19 07:15:26'),
(106, 83, 37, 5, '2011-09-19 14:25:25'),
(106, 83, 32.5, 3, '2011-09-19 14:25:26'),
(106, 83, 40.4, 4, '2011-09-19 14:25:26'),
(106, 83, 48.7, 5, '2011-09-19 14:25:27'),
(106, 83, 53.5, 60, '2011-09-19 14:25:27'),
(106, 83, 37.8, 5, '2011-09-19 14:25:27'),
(106, 83, 82.7, 60, '2011-09-19 14:25:28');

-- --------------------------------------------------------

--
-- Table structure for table `user_info`
--

CREATE TABLE IF NOT EXISTS `user_info` (
  `user_id` smallint(6) NOT NULL AUTO_INCREMENT,
  `user_email` varchar(254) NOT NULL,
  `user_name` varchar(254) NOT NULL,
  `user_pwd` varchar(254) NOT NULL,
  `user_type` varchar(15) NOT NULL,
  PRIMARY KEY (`user_id`),
  UNIQUE KEY `user_email` (`user_email`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Dumping data for table `user_info`
--

INSERT INTO `user_info` (`user_id`, `user_email`, `user_name`, `user_pwd`, `user_type`) VALUES
(4, 'sourabh@asdf.com', '', 'asdf', 'enduser');

-- --------------------------------------------------------

--
-- Table structure for table `user_session`
--

CREATE TABLE IF NOT EXISTS `user_session` (
  `user_id` int(6) NOT NULL,
  `user_session_variable` varchar(15) NOT NULL,
  `user_location_lat` varchar(15) NOT NULL,
  `user_location_long` varchar(15) NOT NULL,
  `timestamp` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user_session`
--

INSERT INTO `user_session` (`user_id`, `user_session_variable`, `user_location_lat`, `user_location_long`, `timestamp`) VALUES
(4, 'a', '41.254006', '-95.999258', '2011-09-18 08:06:22');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
