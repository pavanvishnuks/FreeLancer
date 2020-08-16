-- phpMyAdmin SQL Dump
-- version 4.9.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 02, 2019 at 07:42 PM
-- Server version: 10.4.8-MariaDB
-- PHP Version: 7.3.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `freelancer`
--
CREATE DATABASE IF NOT EXISTS `freelancer` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;
USE `freelancer`;

-- --------------------------------------------------------

--
-- Table structure for table `bidding`
--

CREATE TABLE `bidding` (
  `hire_name` varchar(20) NOT NULL,
  `work_name` varchar(20) NOT NULL,
  `bid_amount` int(5) NOT NULL,
  `project_name` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `bidding`
--

INSERT INTO `bidding` (`hire_name`, `work_name`, `bid_amount`, `project_name`) VALUES
('yogitha sindhe', 'nish', 10000, 'website designe'),
('nisha', '123', 12000, 'app developem'),
('nisha', 'kulli', 20000, 'app developem'),
('nisha', 'kulli', 20000, 'bike world'),
('nisha', 'kulli', 8888888, 'website buildin');

-- --------------------------------------------------------

--
-- Table structure for table `hire`
--

CREATE TABLE `hire` (
  `email_id` varchar(30) NOT NULL,
  `password` varchar(20) NOT NULL,
  `name` varchar(20) NOT NULL,
  `phone_number` int(10) NOT NULL,
  `photo` longblob NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `hire`
--

INSERT INTO `hire` (`email_id`, `password`, `name`, `phone_number`, `photo`) VALUES
('1234@gmail.com', '1234', '1234', 1234567890, ''),
('mohit@gmail.com', 'abc123', 'MOHITH R', 2147483647, ''),
('nisha@gmail.com', '4567', 'nisha', 998885566, ''),
('yogitha@gmail.com', '9876', 'sindhe', 2147483647, ''),
('tset@gmail.com', '1234', 'test', 897654321, ''),
('sindhe@gmail.com', '4567', 'yogitha sindhe', 2147483647, '');

-- --------------------------------------------------------

--
-- Table structure for table `job`
--

CREATE TABLE `job` (
  `project_name` varchar(15) NOT NULL,
  `hire_name` varchar(20) NOT NULL,
  `work_name` varchar(20) NOT NULL,
  `progress` varchar(15) NOT NULL,
  `amount` int(5) NOT NULL,
  `bid_amount` int(5) NOT NULL,
  `hire_feedback` varchar(300) NOT NULL,
  `work_feedback` varchar(300) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Triggers `job`
--
DELIMITER $$
CREATE TRIGGER `Ftrigger` BEFORE INSERT ON `job` FOR EACH ROW BEGIN
delete from bidding where project_name= new.project_name;
delete from project where project_name= new.project_name;
END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `project`
--

CREATE TABLE `project` (
  `project_name` varchar(15) NOT NULL,
  `category` varchar(24) NOT NULL,
  `technologies` varchar(60) NOT NULL,
  `amount` varchar(25) NOT NULL,
  `hire_name` varchar(20) NOT NULL,
  `details` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `project`
--

INSERT INTO `project` (`project_name`, `category`, `technologies`, `amount`, `hire_name`, `details`) VALUES
('app developem', 'Article Writing', 'java', '16000', 'nisha', 'please help in vehicle management system'),
('bike world', 'Software Development', 'php,html,css', '13000', 'nisha', 'bike management system'),
('sfsdaasjfdsjfhs', 'Data Entry', 'ergr', '2000', '1234', 'dvfd'),
('website buildin', 'App Development', 'php,html,css', '12000', 'nisha', 'reqiure dlandory database management system'),
('website designe', 'Database', 'html', '900', 'yogitha sindhe', 'database regarding vitage car management');

-- --------------------------------------------------------

--
-- Table structure for table `work`
--

CREATE TABLE `work` (
  `email_id` varchar(30) NOT NULL,
  `password` varchar(20) NOT NULL,
  `name` varchar(20) NOT NULL,
  `skills` varchar(50) NOT NULL,
  `phone_number` int(10) NOT NULL,
  `photo` longblob NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `work`
--

INSERT INTO `work` (`email_id`, `password`, `name`, `skills`, `phone_number`, `photo`) VALUES
('123@gmail.com', '123', '123', 'java', 1234567890, ''),
('kulli@gmail.com', '8765', 'kulli', 'html', 988765443, ''),
('raj@gmail.com', '4567', 'nish', 'java', 2147483647, ''),
('yogitha@gmail.com', '9876', 'sindhe', 'java', 2147483647, '');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `bidding`
--
ALTER TABLE `bidding`
  ADD PRIMARY KEY (`hire_name`,`work_name`,`project_name`),
  ADD KEY `hire_id` (`hire_name`),
  ADD KEY `work_id` (`work_name`),
  ADD KEY `hire_name` (`hire_name`),
  ADD KEY `work_name` (`work_name`),
  ADD KEY `project_name` (`project_name`),
  ADD KEY `bid_amount` (`bid_amount`),
  ADD KEY `bid_amount_2` (`bid_amount`);

--
-- Indexes for table `hire`
--
ALTER TABLE `hire`
  ADD PRIMARY KEY (`name`);

--
-- Indexes for table `job`
--
ALTER TABLE `job`
  ADD PRIMARY KEY (`project_name`),
  ADD KEY `hire_id` (`hire_name`),
  ADD KEY `work_id` (`work_name`),
  ADD KEY `project_id` (`project_name`),
  ADD KEY `project_name` (`project_name`),
  ADD KEY `hire_name` (`hire_name`),
  ADD KEY `work_name` (`work_name`),
  ADD KEY `amount` (`amount`),
  ADD KEY `bid_amount` (`bid_amount`);

--
-- Indexes for table `project`
--
ALTER TABLE `project`
  ADD PRIMARY KEY (`project_name`),
  ADD KEY `hire_name` (`hire_name`);

--
-- Indexes for table `work`
--
ALTER TABLE `work`
  ADD PRIMARY KEY (`name`),
  ADD UNIQUE KEY `email_id` (`email_id`);

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
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
