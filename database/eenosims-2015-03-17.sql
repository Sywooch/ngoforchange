-- phpMyAdmin SQL Dump
-- version 4.1.14
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Mar 17, 2015 at 12:34 PM
-- Server version: 5.6.17
-- PHP Version: 5.5.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `eenosims`
--

-- --------------------------------------------------------

--
-- Table structure for table `cash_receipt`
--

CREATE TABLE IF NOT EXISTS `cash_receipt` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `receipt_number` varchar(255) DEFAULT NULL,
  `place` varchar(255) NOT NULL,
  `date` date NOT NULL,
  `amount` decimal(10,2) NOT NULL,
  `description` text NOT NULL,
  `is_donation` tinyint(1) DEFAULT NULL,
  `is_service_fee` tinyint(1) DEFAULT NULL,
  `is_private` tinyint(1) DEFAULT NULL,
  `person_info` varchar(255) DEFAULT NULL,
  `person_id` int(10) unsigned DEFAULT NULL,
  `create_time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  KEY `fk_cash_receipt_person1_idx` (`person_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `communications`
--

CREATE TABLE IF NOT EXISTS `communications` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `to` text NOT NULL,
  `from` text NOT NULL,
  `cc` text,
  `bcc` text,
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
  `type` varchar(255) NOT NULL,
  `data` varchar(255) NOT NULL,
  `create_time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `elections`
--

CREATE TABLE IF NOT EXISTS `elections` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
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
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `vote_type` varchar(255) NOT NULL,
  `voted` tinyint(1) NOT NULL,
  `elections_id` int(11) unsigned NOT NULL,
  `person_id` int(11) unsigned NOT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_elections_votes_elections1_idx` (`elections_id`),
  KEY `fk_elections_votes_person1_idx` (`person_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `event`
--

CREATE TABLE IF NOT EXISTS `event` (
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
-- Table structure for table `event_person`
--

CREATE TABLE IF NOT EXISTS `event_person` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `events_id` int(10) unsigned NOT NULL,
  `person_id` int(11) unsigned NOT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_event_person_event1_idx` (`events_id`),
  KEY `fk_event_person_person1_idx` (`person_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `good_receipt`
--

CREATE TABLE IF NOT EXISTS `good_receipt` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `receipt_number` varchar(255) DEFAULT NULL,
  `place` varchar(255) NOT NULL,
  `date` date NOT NULL,
  `amount` decimal(10,2) NOT NULL,
  `description` text NOT NULL,
  `company_name` varchar(255) NOT NULL,
  `create_time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `medicines`
--

CREATE TABLE IF NOT EXISTS `medicines` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `unit_type` varchar(255) NOT NULL,
  `details` varchar(255) NOT NULL,
  `create_time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `medicines`
--

INSERT INTO `medicines` (`id`, `name`, `unit_type`, `details`, `create_time`) VALUES
(1, 'Αβονέξ', 'Capsules', 'No details', '2015-03-12 16:34:30'),
(2, 'Νοταρίσ', 'Injections', 'No details', '2015-03-12 16:38:25');

-- --------------------------------------------------------

--
-- Table structure for table `medicines_movement`
--

CREATE TABLE IF NOT EXISTS `medicines_movement` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `action` varchar(255) NOT NULL,
  `action_date` date NOT NULL,
  `count` int(11) NOT NULL,
  `expiration_date` date NOT NULL,
  `medicines_id` int(11) unsigned NOT NULL,
  `person_id` int(11) unsigned DEFAULT NULL,
  `movement_reason` text NOT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_medicines_movement_person1_idx` (`person_id`),
  KEY `fk_medicines_movement_medicines1_idx` (`medicines_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `medicines_movement`
--

INSERT INTO `medicines_movement` (`id`, `action`, `action_date`, `count`, `expiration_date`, `medicines_id`, `person_id`, `movement_reason`) VALUES
(1, 'In', '2015-03-12', 10, '2015-04-30', 1, 1, 'Donation'),
(2, 'In', '2015-03-31', 10, '2015-03-31', 1, 1, 'Donation'),
(3, 'In', '2015-03-13', 10, '2015-03-12', 1, 1, 'Donation');

-- --------------------------------------------------------

--
-- Table structure for table `pay_receipt`
--

CREATE TABLE IF NOT EXISTS `pay_receipt` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `receipt_number` varchar(255) DEFAULT NULL,
  `place` varchar(255) NOT NULL,
  `date` date NOT NULL,
  `amount` decimal(10,2) NOT NULL,
  `description` text NOT NULL,
  `is_donation` tinyint(1) DEFAULT NULL,
  `is_service_fee` tinyint(1) DEFAULT NULL,
  `person_info` varchar(255) DEFAULT NULL,
  `person_id` int(10) unsigned DEFAULT NULL,
  `person_ssrn` varchar(255) DEFAULT NULL,
  `create_time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  KEY `fk_pay_receipt_person1_idx` (`person_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `person`
--

CREATE TABLE IF NOT EXISTS `person` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `last_name` varchar(255) NOT NULL,
  `father_name` varchar(255) DEFAULT NULL,
  `first_name` varchar(255) NOT NULL,
  `is_deleted` tinyint(1) DEFAULT NULL,
  `deletion_reason` varchar(255) NOT NULL,
  `creation_time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `person`
--

INSERT INTO `person` (`id`, `last_name`, `father_name`, `first_name`, `is_deleted`, `deletion_reason`, `creation_time`) VALUES
(1, 'Μνατσακανίαν', 'Σάμωελ', 'Σέβακ', NULL, '', '2015-03-12 16:29:15'),
(2, 'Κλαδού', NULL, 'Αγγελικι', NULL, '', '2015-03-12 16:30:20'),
(3, 'Μάλλασ', NULL, 'Διμιτρίσ', NULL, '', '2015-03-12 16:33:02');

-- --------------------------------------------------------

--
-- Table structure for table `person_contact`
--

CREATE TABLE IF NOT EXISTS `person_contact` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `person_id` int(11) unsigned NOT NULL,
  `contacts_id` int(11) unsigned NOT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_person_contact_contacts1_idx` (`contacts_id`),
  KEY `fk_person_contact_person1_idx` (`person_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `person_data_official`
--

CREATE TABLE IF NOT EXISTS `person_data_official` (
  `person_id` int(11) unsigned NOT NULL,
  `institution` varchar(255) NOT NULL,
  `capacity` varchar(255) NOT NULL,
  `address` text,
  `post_code` varchar(255) DEFAULT NULL,
  `city` varchar(255) NOT NULL,
  `create_time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `update_time` datetime DEFAULT NULL,
  PRIMARY KEY (`person_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `person_data_patient`
--

CREATE TABLE IF NOT EXISTS `person_data_patient` (
  `person_id` int(11) unsigned NOT NULL,
  `ssrn` varchar(255) NOT NULL,
  `photo` mediumblob,
  `mother_name` varchar(255) NOT NULL,
  `address` text NOT NULL,
  `post_code` varchar(255) DEFAULT NULL,
  `city` varchar(255) NOT NULL,
  `sex` varchar(255) DEFAULT NULL,
  `marital_status` varchar(255) DEFAULT NULL,
  `children` int(11) DEFAULT NULL,
  `graduation` varchar(255) DEFAULT NULL,
  `occupation` varchar(255) DEFAULT NULL,
  `disability` text NOT NULL,
  `disability_proof` mediumblob,
  `application_form` mediumblob,
  `medication` text,
  `private_correspondence` tinyint(1) DEFAULT NULL,
  `last_contact` date DEFAULT NULL,
  `comments` text,
  `create_time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `update_time` datetime DEFAULT NULL,
  PRIMARY KEY (`person_id`),
  UNIQUE KEY `ssrn_UNIQUE` (`ssrn`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `person_data_relative`
--

CREATE TABLE IF NOT EXISTS `person_data_relative` (
  `person_id` int(11) unsigned NOT NULL,
  `type` varchar(255) NOT NULL,
  PRIMARY KEY (`person_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `person_data_volunteer`
--

CREATE TABLE IF NOT EXISTS `person_data_volunteer` (
  `person_id` int(11) unsigned NOT NULL,
  `ssrn` varchar(255) NOT NULL,
  `address` text,
  `post_code` varchar(255) DEFAULT NULL,
  `city` varchar(255) NOT NULL,
  `birthday` date NOT NULL,
  `marital_status` varchar(255) DEFAULT NULL,
  `graduation` varchar(255) DEFAULT NULL,
  `occupation` varchar(255) DEFAULT NULL,
  `resume` mediumblob,
  `may_provide` text NOT NULL,
  `registered_since` date NOT NULL,
  `create_time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `update_time` datetime DEFAULT NULL,
  PRIMARY KEY (`person_id`),
  UNIQUE KEY `person_data_volunteerscol_UNIQUE` (`ssrn`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `person_date_friend`
--

CREATE TABLE IF NOT EXISTS `person_date_friend` (
  `person_id` int(11) unsigned NOT NULL,
  `ssrn` varchar(255) NOT NULL,
  `address` text,
  `post_code` varchar(255) DEFAULT NULL,
  `city` varchar(255) NOT NULL,
  `registered_since` date NOT NULL,
  `comments` text,
  `create_time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `update_time` datetime DEFAULT NULL,
  PRIMARY KEY (`person_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `person_type`
--

CREATE TABLE IF NOT EXISTS `person_type` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `data_table` varchar(45) NOT NULL,
  `model_name` varchar(255) NOT NULL,
  `form_name` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=5 ;

--
-- Dumping data for table `person_type`
--

INSERT INTO `person_type` (`id`, `name`, `data_table`, `model_name`, `form_name`) VALUES
(1, 'Patient', 'person_data_patient', 'PersonDataPatient', 'FormPatient'),
(2, 'Volunteer', 'person_data_volunteer', 'PersonDataVolunteer', 'FormVolunteer'),
(3, 'Friend', 'person_data_friend', 'PersonDataFriend', 'FormFriend'),
(4, 'Official', 'person_data_official', 'PersonDataOfficial', 'FormOfficial');

-- --------------------------------------------------------

--
-- Table structure for table `person_type_asign`
--

CREATE TABLE IF NOT EXISTS `person_type_asign` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `person_id` int(11) unsigned NOT NULL,
  `person_type_id` int(11) unsigned NOT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_person_type_asign_person1_idx` (`person_id`),
  KEY `fk_person_type_asign_person_type1_idx` (`person_type_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=5 ;

--
-- Dumping data for table `person_type_asign`
--

INSERT INTO `person_type_asign` (`id`, `person_id`, `person_type_id`) VALUES
(1, 1, 2),
(2, 2, 4),
(3, 3, 1),
(4, 3, 3);

--
-- Constraints for dumped tables
--

--
-- Constraints for table `cash_receipt`
--
ALTER TABLE `cash_receipt`
  ADD CONSTRAINT `fk_cash_receipt_person1` FOREIGN KEY (`person_id`) REFERENCES `person` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `elections_votes`
--
ALTER TABLE `elections_votes`
  ADD CONSTRAINT `fk_elections_votes_elections1` FOREIGN KEY (`elections_id`) REFERENCES `elections` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_elections_votes_person1` FOREIGN KEY (`person_id`) REFERENCES `person` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `event_person`
--
ALTER TABLE `event_person`
  ADD CONSTRAINT `fk_event_person_event1` FOREIGN KEY (`events_id`) REFERENCES `event` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_event_person_person1` FOREIGN KEY (`person_id`) REFERENCES `person` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `medicines_movement`
--
ALTER TABLE `medicines_movement`
  ADD CONSTRAINT `fk_medicines_movement_medicines1` FOREIGN KEY (`medicines_id`) REFERENCES `medicines` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_medicines_movement_person1` FOREIGN KEY (`person_id`) REFERENCES `person` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `pay_receipt`
--
ALTER TABLE `pay_receipt`
  ADD CONSTRAINT `fk_pay_receipt_person1` FOREIGN KEY (`person_id`) REFERENCES `person` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `person_contact`
--
ALTER TABLE `person_contact`
  ADD CONSTRAINT `fk_person_contact_contacts1` FOREIGN KEY (`contacts_id`) REFERENCES `contacts` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_person_contact_person1` FOREIGN KEY (`person_id`) REFERENCES `person` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `person_data_official`
--
ALTER TABLE `person_data_official`
  ADD CONSTRAINT `fk_person_data_official_person1` FOREIGN KEY (`person_id`) REFERENCES `person` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `person_data_patient`
--
ALTER TABLE `person_data_patient`
  ADD CONSTRAINT `fk_person_data_patient_person1` FOREIGN KEY (`person_id`) REFERENCES `person` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `person_data_relative`
--
ALTER TABLE `person_data_relative`
  ADD CONSTRAINT `fk_person_data_relative_person1` FOREIGN KEY (`person_id`) REFERENCES `person` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `person_data_volunteer`
--
ALTER TABLE `person_data_volunteer`
  ADD CONSTRAINT `fk_person_data_volunteer_person1` FOREIGN KEY (`person_id`) REFERENCES `person` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `person_date_friend`
--
ALTER TABLE `person_date_friend`
  ADD CONSTRAINT `fk_person_date_friend_person1` FOREIGN KEY (`person_id`) REFERENCES `person` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `person_type_asign`
--
ALTER TABLE `person_type_asign`
  ADD CONSTRAINT `fk_person_type_asign_person1` FOREIGN KEY (`person_id`) REFERENCES `person` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_person_type_asign_person_type1` FOREIGN KEY (`person_type_id`) REFERENCES `person_type` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
