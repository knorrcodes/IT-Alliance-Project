-- phpMyAdmin SQL Dump
-- version 4.9.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3308
-- Generation Time: Apr 18, 2020 at 12:16 AM
-- Server version: 8.0.18
-- PHP Version: 7.3.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `itadb`
--

-- --------------------------------------------------------

--
-- Table structure for table `fall20`
--

DROP TABLE IF EXISTS `fall20`;
CREATE TABLE IF NOT EXISTS `fall20` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` text NOT NULL,
  `description` text NOT NULL,
  `client` text NOT NULL,
  `team_member_names` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `fall20`
--

INSERT INTO `fall20` (`id`, `name`, `description`, `client`, `team_member_names`) VALUES
(1, 'Works', 'But', 'No', 'Entries');

-- --------------------------------------------------------

--
-- Table structure for table `spring20`
--

DROP TABLE IF EXISTS `spring20`;
CREATE TABLE IF NOT EXISTS `spring20` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `priority` text NOT NULL,
  `status` text NOT NULL,
  `semester` text NOT NULL,
  `name` text NOT NULL,
  `start_date` date NOT NULL,
  `projected_date` date NOT NULL,
  `completed_date` date DEFAULT NULL,
  `description` text NOT NULL,
  `client` text NOT NULL,
  `client_email` text NOT NULL,
  `team_member_names` text NOT NULL,
  `tshirt_s` int(11) NOT NULL,
  `tshirt_m` int(11) NOT NULL,
  `tshirt_l` int(11) NOT NULL,
  `tshirt_xl` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `spring20`
--

INSERT INTO `spring20` (`id`, `priority`, `status`, `semester`, `name`, `start_date`, `projected_date`, `completed_date`, `description`, `client`, `client_email`, `team_member_names`, `tshirt_s`, `tshirt_m`, `tshirt_l`, `tshirt_xl`) VALUES
(1, '3 - Normal', 'In Progress', 'Spring 2020', 'ITA Portal', '2020-01-20', '2020-04-28', NULL, 'The purpose of this project is to create a website to access information about the ITA project class.', 'Wendy Wooldridge', 'wwooldridg@usi.edu', 'Darrin Knorr, Joe Massaro, Bassim Alamer, Josh Martin', 0, 1, 0, 0),
(2, '3 - Normal', 'Proposed', '', 'AI Chatbot', '2020-01-20', '2020-04-28', NULL, 'AI ChatBot for Customer Serice with SMS Text messenger Bot', 'Unknown', 'Unknown', 'Albert Huang, Austin Steele, Edward Yevincy, Quentin Peters, Elizabeth Fleming', 0, 0, 0, 0),
(3, '3 - Normal', 'Proposed', 'Spring 2020', 'Champion Labs', '2020-01-20', '2020-04-28', '0000-00-00', 'Champion Labs', 'Unknown', 'Unknown', 'Payton Sharpe, Joshua Joines, Hans Lagenour, Austin Garrison, Nicholas Scheller', 0, 0, 0, 0);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
