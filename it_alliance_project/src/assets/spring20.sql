-- phpMyAdmin SQL Dump
-- version 4.9.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3308
-- Generation Time: Apr 17, 2020 at 06:34 AM
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
-- Table structure for table `spring20`
--

DROP TABLE IF EXISTS `spring20`;
CREATE TABLE IF NOT EXISTS `spring20` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `priority` text NOT NULL,
  `status` text NOT NULL,
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
) ENGINE=MyISAM AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `spring20`
--

INSERT INTO `spring20` (`id`, `priority`, `status`, `name`, `start_date`, `projected_date`, `completed_date`, `description`, `client`, `client_email`, `team_member_names`, `tshirt_s`, `tshirt_m`, `tshirt_l`, `tshirt_xl`) VALUES
(1, '3 - Normal', 'In Progress', 'ITA Portal', '2020-01-20', '2020-04-28', NULL, 'The purpose of this project is to create a website to access information about the ITA project class.', 'Wendy Wooldridge', 'wwooldridg@usi.edu', 'Darrin Knorr, Joe Massaro, Bassim Alamer, Josh Martin', 0, 1, 0, 0),
(4, '4 - High', 'Proposed', 'd', '2020-04-07', '2020-04-03', '2020-04-08', 'dasdfsd', 'f', 'f', 'f', 0, 3, 0, 2),
(5, '4 - High', 'Proposed', '1', '2020-04-01', '2020-04-10', '2020-04-20', 'dfdfasdf', '2', '3', '4', 1, 2, 3, 4);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
