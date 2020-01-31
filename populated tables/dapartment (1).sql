-- phpMyAdmin SQL Dump
-- version 4.9.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 31, 2020 at 11:26 AM
-- Server version: 10.4.11-MariaDB
-- PHP Version: 7.2.26

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `qblog`
--

-- --------------------------------------------------------

--
-- Table structure for table `dapartment`
--

CREATE TABLE `dapartment` (
  `sno` int(4) NOT NULL,
  `dept_id` varchar(4) NOT NULL,
  `dept_name` varchar(20) NOT NULL,
  `dept_code` varchar(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `dapartment`
--

INSERT INTO `dapartment` (`sno`, `dept_id`, `dept_name`, `dept_code`) VALUES
(1, '1101', 'computer science', 'csd'),
(2, '1102', 'electrical engineeri', 'eed'),
(3, '1103', 'mathematics', 'md'),
(4, '1104', 'physics', 'pd');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `dapartment`
--
ALTER TABLE `dapartment`
  ADD PRIMARY KEY (`dept_id`),
  ADD UNIQUE KEY `sno` (`sno`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `dapartment`
--
ALTER TABLE `dapartment`
  MODIFY `sno` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
