-- phpMyAdmin SQL Dump
-- version 4.7.7
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 02, 2020 at 04:26 PM
-- Server version: 10.1.30-MariaDB
-- PHP Version: 7.2.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `performap360`
--

-- --------------------------------------------------------

--
-- Table structure for table `detail_nilai`
--

CREATE TABLE `detail_nilai` (
  `kdnilai` varchar(20) NOT NULL,
  `kdkri` varchar(20) NOT NULL,
  `kdsub` varchar(20) NOT NULL,
  `kdpenilai` varchar(20) NOT NULL,
  `nilai` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `detail_nilai`
--

INSERT INTO `detail_nilai` (`kdnilai`, `kdkri`, `kdsub`, `kdpenilai`, `nilai`) VALUES
('1', '01', 'A', '01', 5),
('1', '01', 'B', '01', 5),
('1', '02', 'A2', '01', 4),
('1', '02', 'B2', '01', 4),
('1', '03', 'A3', '01', 4),
('1', '03', 'B3', '01', 4),
('1', '03', 'C3', '01', 3),
('1', '04', 'A4', '01', 5),
('1', '04', 'B4', '01', 4),
('1', '04', 'C4', '01', 4),
('1', '05', 'A5', '01', 5),
('1', '05', 'B5', '01', 3),
('1', '05', 'C5', '01', 5),
('1', '06', 'A6', '01', 5),
('1', '06', 'B6', '01', 5),
('1', '06', 'C6', '01', 5),
('1', '06', 'D6', '01', 4),
('1', '07', 'A7', '01', 5),
('1', '07', 'B7', '01', 5),
('1', '07', 'C7', '01', 4),
('2', '01', 'A', '02', 5),
('2', '01', 'B', '02', 4),
('2', '02', 'A2', '02', 4),
('2', '02', 'B2', '02', 5),
('2', '03', 'A3', '02', 3),
('2', '03', 'B3', '02', 4),
('2', '03', 'C3', '02', 3),
('2', '04', 'A4', '02', 2),
('2', '04', 'B4', '02', 5),
('2', '04', 'C4', '02', 4),
('2', '05', 'A5', '02', 4),
('2', '05', 'B5', '02', 5),
('2', '05', 'C5', '02', 5),
('2', '06', 'A6', '02', 5),
('2', '06', 'B6', '02', 5),
('2', '06', 'C6', '02', 5),
('2', '06', 'D6', '02', 4),
('3', '04', 'A4', '04', 5),
('3', '04', 'B4', '04', 5),
('3', '04', 'C4', '04', 2),
('3', '06', 'A6', '04', 5),
('3', '06', 'B6', '04', 5),
('3', '06', 'C6', '04', 4),
('3', '06', 'D6', '04', 5),
('3', '07', 'A7', '04', 5),
('3', '07', 'B7', '04', 4),
('3', '07', 'C7', '04', 5);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
