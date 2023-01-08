-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Jan 08, 2023 at 01:23 PM
-- Server version: 5.7.36
-- PHP Version: 7.4.26

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `store`
--
CREATE DATABASE IF NOT EXISTS `store` DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci;
USE `store`;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(20) NOT NULL,
  `firstname` varchar(30) NOT NULL,
  `lastname` varchar(50) NOT NULL,
  `password` varchar(100) NOT NULL,
  `province` varchar(20) NOT NULL,
  `email` varchar(100) NOT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=MyISAM AUTO_INCREMENT=74 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`ID`, `username`, `firstname`, `lastname`, `password`, `province`, `email`) VALUES
(72, 'kirina', 'sherol', 'salarzon', '$2y$10$/u1.OKIkMpvGqxOjvRM/UOdmrmY0j/gfpkOEXNeyqGSbBolOKSY9G', 'Saskatchewan', 'SomerandomEmail@gmail.com'),
(70, 'sherol', 'FirstName', 'LastName', '$2y$10$8k2L8PyVET09qocXym3yc.49IpAGpRcPC..Q1mtBm1DFHyNQ7XZ9i', 'Manitoba', 'sherolsalarzon@gmail.com'),
(71, 'sherol13', 'sherol12', 'salarzon12', '$2y$10$cv/KXN/UCkL99qXL3TjNquPJRcttm32BsxEqVdAQ1FVnGmKJwdpdS', 'Ontario', 'LMAO15123@gmail.com'),
(73, 'Hello Sherol', '///Sherol```', 'LastName', '$2y$10$zYArbJvOpYwDk2z/Z.2Sqe3HaFDhT6zwdf94zGI/MJftszd9fXl52', 'Yukon', 'some@gmail.com');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
