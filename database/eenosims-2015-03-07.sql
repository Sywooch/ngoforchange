-- phpMyAdmin SQL Dump
-- version 4.1.14
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Mar 07, 2015 at 02:37 PM
-- Server version: 5.6.17
-- PHP Version: 5.5.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `eenosims`
--
CREATE DATABASE IF NOT EXISTS `eenosims` DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci;
USE `eenosims`;

-- --------------------------------------------------------

--
-- Table structure for table `communications`
--

CREATE TABLE IF NOT EXISTS `communications` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `title` varchar(255) NOT NULL,
  `is_outgoing` tinyint(1) NOT NULL,
  `is_important` tinyint(1) NOT NULL,
  `content_text` mediumtext NOT NULL,
  `content_binary` mediumblob NOT NULL,
  `create_time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `contacts`
--

CREATE TABLE IF NOT EXISTS `contacts` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `person_id` int(10) unsigned NOT NULL,
  `person_type` varchar(255) NOT NULL,
  `contact_type` varchar(255) NOT NULL,
  `contact` text NOT NULL,
  `create_time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `elections`
--

CREATE TABLE IF NOT EXISTS `elections` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `election_date` date NOT NULL,
  `create_time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `elections_votes`
--

CREATE TABLE IF NOT EXISTS `elections_votes` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `election_id` int(10) unsigned NOT NULL,
  `patient_id` int(10) unsigned NOT NULL,
  `vote_type` varchar(255) NOT NULL,
  `voted` tinyint(1) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `election_id` (`election_id`,`patient_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `events`
--

CREATE TABLE IF NOT EXISTS `events` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `event_type` varchar(255) NOT NULL,
  `event_date` date NOT NULL,
  `create_time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `events_activity`
--

CREATE TABLE IF NOT EXISTS `events_activity` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `event_id` int(10) unsigned NOT NULL,
  `person_id` int(10) unsigned NOT NULL,
  `person_type` varchar(255) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `event_id` (`event_id`,`person_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `friends`
--

CREATE TABLE IF NOT EXISTS `friends` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `surname` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `father_name` varchar(255) NOT NULL,
  `mother_name` varchar(255) NOT NULL,
  `address` text NOT NULL,
  `post_code` varchar(255) NOT NULL,
  `city` varchar(255) NOT NULL,
  `friend_with` text NOT NULL,
  `amf` varchar(255) NOT NULL,
  `comments` text NOT NULL,
  `registered_since` date NOT NULL,
  `create_time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `invoices_payments`
--

CREATE TABLE IF NOT EXISTS `invoices_payments` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `receiver_id` int(10) unsigned NOT NULL,
  `receiver_type` varchar(255) NOT NULL,
  `payment_time` datetime NOT NULL,
  `payment_reason` text NOT NULL,
  `is_donation` tinyint(1) NOT NULL,
  `is_service_fee` tinyint(1) NOT NULL,
  `amount` decimal(10,2) unsigned NOT NULL,
  `create_time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `invoices_receipts`
--

CREATE TABLE IF NOT EXISTS `invoices_receipts` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `donator_id` int(10) unsigned NOT NULL,
  `donator_type` varchar(255) NOT NULL,
  `receipt_time` datetime NOT NULL,
  `receipt_reason` text NOT NULL,
  `is_membership_fee` tinyint(1) NOT NULL,
  `is_donation` tinyint(1) NOT NULL,
  `is_service_fee` tinyint(1) NOT NULL,
  `amount` decimal(10,2) unsigned NOT NULL,
  `create_time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `medicines`
--

CREATE TABLE IF NOT EXISTS `medicines` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `unit_type` varchar(255) NOT NULL,
  `details` varchar(255) NOT NULL,
  `create_time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `medicines`
--

INSERT INTO `medicines` (`id`, `name`, `unit_type`, `details`, `create_time`) VALUES
(1, 'Avonex', 'Capsules', '350mg/1100mg', '2015-03-06 17:45:41'),
(2, 'Notaris', 'Pills', '30mg/1300mg', '2015-03-06 17:45:41'),
(3, 'Avocadis', 'Injections', '45mg/1200mg', '2015-03-06 17:45:41');

-- --------------------------------------------------------

--
-- Table structure for table `medicines_movement`
--

CREATE TABLE IF NOT EXISTS `medicines_movement` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `action` varchar(255) NOT NULL,
  `action_date` date NOT NULL,
  `medicine_id` int(10) unsigned NOT NULL,
  `count` int(10) NOT NULL,
  `expiration_date` date NOT NULL,
  `donator_id` int(10) unsigned NOT NULL,
  `donator_type` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=6 ;

--
-- Dumping data for table `medicines_movement`
--

INSERT INTO `medicines_movement` (`id`, `action`, `action_date`, `medicine_id`, `count`, `expiration_date`, `donator_id`, `donator_type`) VALUES
(1, 'In', '2015-03-05', 1, 10, '2015-03-31', 1, 'patients'),
(2, 'In', '2015-03-04', 2, 15, '2015-03-30', 1, 'patients'),
(3, 'Out', '2015-03-07', 1, -5, '2015-03-31', 3, 'patients'),
(4, 'In', '2015-02-01', 1, 30, '2015-03-01', 1, 'patients'),
(5, 'In', '2015-02-01', 1, 45, '2015-05-31', 1, 'patients');

-- --------------------------------------------------------

--
-- Table structure for table `officials`
--

CREATE TABLE IF NOT EXISTS `officials` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `surname` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `capacity` text NOT NULL,
  `address` text NOT NULL,
  `post_code` varchar(255) NOT NULL,
  `city` varchar(255) NOT NULL,
  `create_time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `patients`
--

CREATE TABLE IF NOT EXISTS `patients` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `surname` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `father_name` varchar(255) NOT NULL,
  `mother_name` varchar(255) NOT NULL,
  `address` text NOT NULL,
  `post_code` varchar(255) NOT NULL,
  `city` varchar(255) NOT NULL,
  `relative` varchar(255) NOT NULL,
  `relative_type` varchar(255) NOT NULL,
  `relative_phone` varchar(255) NOT NULL,
  `photo` mediumblob NOT NULL,
  `personal_number` varchar(255) NOT NULL,
  `graduation` varchar(255) NOT NULL,
  `occupation` varchar(255) NOT NULL,
  `sex` varchar(255) NOT NULL,
  `marital_status` varchar(255) NOT NULL,
  `children` int(10) unsigned NOT NULL,
  `disability` text NOT NULL,
  `disabilty_benefit` text NOT NULL,
  `disability_proof` mediumblob NOT NULL,
  `arapod14` int(11) NOT NULL,
  `apodeis14` int(11) NOT NULL,
  `posoeisp14` int(11) NOT NULL,
  `amka` varchar(255) NOT NULL COMMENT '???',
  `tameio` int(11) NOT NULL COMMENT '???',
  `private_correspondence` tinyint(1) NOT NULL,
  `medication` text NOT NULL,
  `application_form` mediumblob NOT NULL,
  `certificate` int(11) NOT NULL,
  `membership` text NOT NULL,
  `lista_email` tinyint(1) NOT NULL,
  `edose_photo` tinyint(1) NOT NULL,
  `title_address` varchar(255) NOT NULL,
  `address_uu` text NOT NULL,
  `comments` int(11) NOT NULL,
  `last_contact` date NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `volunteers`
--

CREATE TABLE IF NOT EXISTS `volunteers` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT COMMENT 'Αριθμοσ / Number',
  `surname` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `address` text NOT NULL,
  `postcode` varchar(255) NOT NULL,
  `city` varchar(255) NOT NULL,
  `personal_number` varchar(255) NOT NULL,
  `birthday` date NOT NULL,
  `marital_status` varchar(255) NOT NULL,
  `occupation` varchar(255) NOT NULL,
  `knowledge_degree` varchar(255) NOT NULL,
  `may_provide` text NOT NULL,
  `member_since` date NOT NULL COMMENT 'Μελοσ απο / Member Since',
  `create_time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
