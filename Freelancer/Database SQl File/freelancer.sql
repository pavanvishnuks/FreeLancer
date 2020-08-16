-- phpMyAdmin SQL Dump
-- version 4.1.14
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Dec 08, 2018 at 03:07 AM
-- Server version: 5.6.17
-- PHP Version: 5.5.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `freelancer`
--

-- --------------------------------------------------------

--
-- Table structure for table `bidding`
--

CREATE TABLE IF NOT EXISTS `bidding` (
  `hire_name` varchar(20) NOT NULL,
  `work_name` varchar(20) NOT NULL,
  `bid_amount` int(5) NOT NULL,
  `project_name` varchar(15) NOT NULL,
  PRIMARY KEY (`hire_name`,`work_name`,`project_name`),
  KEY `hire_id` (`hire_name`),
  KEY `work_id` (`work_name`),
  KEY `hire_name` (`hire_name`),
  KEY `work_name` (`work_name`),
  KEY `project_name` (`project_name`),
  KEY `bid_amount` (`bid_amount`),
  KEY `bid_amount_2` (`bid_amount`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `hire`
--

CREATE TABLE IF NOT EXISTS `hire` (
  `email_id` varchar(30) NOT NULL,
  `password` varchar(20) NOT NULL,
  `name` varchar(20) NOT NULL,
  `phone_number` int(10) NOT NULL,
  `photo` longblob NOT NULL,
  PRIMARY KEY (`name`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `hire`
--

INSERT INTO `hire` (`email_id`, `password`, `name`, `phone_number`, `photo`) VALUES
('hire@gmail.com', 'hire', 'hire', 0, '');

-- --------------------------------------------------------

--
-- Table structure for table `job`
--

CREATE TABLE IF NOT EXISTS `job` (
  `project_name` varchar(15) NOT NULL,
  `hire_name` varchar(20) NOT NULL,
  `work_name` varchar(20) NOT NULL,
  `progress` varchar(15) NOT NULL,
  `amount` int(5) NOT NULL,
  `bid_amount` int(5) NOT NULL,
  `hire_feedback` varchar(300) NOT NULL,
  `work_feedback` varchar(300) NOT NULL,
  PRIMARY KEY (`project_name`),
  KEY `hire_id` (`hire_name`),
  KEY `work_id` (`work_name`),
  KEY `project_id` (`project_name`),
  KEY `project_name` (`project_name`),
  KEY `hire_name` (`hire_name`),
  KEY `work_name` (`work_name`),
  KEY `amount` (`amount`),
  KEY `bid_amount` (`bid_amount`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Triggers `job`
--
DROP TRIGGER IF EXISTS `Ftrigger`;
DELIMITER //
CREATE TRIGGER `Ftrigger` BEFORE INSERT ON `job`
 FOR EACH ROW BEGIN
delete from bidding where project_name= new.project_name;
delete from project where project_name= new.project_name;
END
//
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `project`
--

CREATE TABLE IF NOT EXISTS `project` (
  `project_name` varchar(15) NOT NULL,
  `category` varchar(24) NOT NULL,
  `technologies` varchar(60) NOT NULL,
  `amount` varchar(25) NOT NULL,
  `hire_name` varchar(20) NOT NULL,
  `details` varchar(100) NOT NULL,
  PRIMARY KEY (`project_name`),
  KEY `hire_name` (`hire_name`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `work`
--

CREATE TABLE IF NOT EXISTS `work` (
  `email_id` varchar(30) NOT NULL,
  `password` varchar(20) NOT NULL,
  `name` varchar(20) NOT NULL,
  `skills` varchar(50) NOT NULL,
  `phone_number` int(10) NOT NULL,
  `photo` longblob NOT NULL,
  PRIMARY KEY (`name`),
  UNIQUE KEY `email_id` (`email_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `work`
--

INSERT INTO `work` (`email_id`, `password`, `name`, `skills`, `phone_number`, `photo`) VALUES
('sandy@gmail.com', 'sandy', 'sandy', 'c++', 1234567890, '');

--
-- Constraints for dumped tables
--

--
-- Constraints for table `bidding`
--
ALTER TABLE `bidding`
  ADD CONSTRAINT `bidding_ibfk_1` FOREIGN KEY (`hire_name`) REFERENCES `hire` (`name`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `bidding_ibfk_2` FOREIGN KEY (`work_name`) REFERENCES `work` (`name`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `bidding_ibfk_3` FOREIGN KEY (`project_name`) REFERENCES `project` (`project_name`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `job`
--
ALTER TABLE `job`
  ADD CONSTRAINT `job_ibfk_2` FOREIGN KEY (`hire_name`) REFERENCES `hire` (`name`),
  ADD CONSTRAINT `job_ibfk_3` FOREIGN KEY (`work_name`) REFERENCES `work` (`name`);

--
-- Constraints for table `project`
--
ALTER TABLE `project`
  ADD CONSTRAINT `project_ibfk_1` FOREIGN KEY (`hire_name`) REFERENCES `hire` (`name`) ON DELETE NO ACTION ON UPDATE NO ACTION;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
