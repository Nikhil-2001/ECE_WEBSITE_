-- phpMyAdmin SQL Dump
-- version 5.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 24, 2020 at 11:41 AM
-- Server version: 10.4.11-MariaDB
-- PHP Version: 7.4.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `stores`
--

-- --------------------------------------------------------

--
-- Table structure for table `data`
--

CREATE TABLE `data` (
  `sno` int(20) NOT NULL,
  `roll_no` varchar(25) DEFAULT NULL,
  `comp_name` varchar(30) DEFAULT NULL,
  `no` int(25) NOT NULL DEFAULT 1,
  `phno` varchar(15) DEFAULT NULL,
  `return_date` datetime NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COMMENT='details of studenst who borrowed components';

--
-- Dumping data for table `data`
--

INSERT INTO `data` (`sno`, `roll_no`, `comp_name`, `no`, `phno`, `return_date`) VALUES
(1, '160218735060', 'raspberry pi', 2, '78158 63132', '2020-04-01 12:41:23'),
(2, '160218735031', 'relay', 1, '6309382289', '2020-04-01 12:42:16'),
(3, '160218735059', 'servo', 6, '77806 04927', '2020-04-02 12:43:09'),
(4, '160218735025', 'nodemcu', 1, '77028 19977', '2020-04-02 12:44:02'),
(5, '160218735031', 'nodemcu', 1, '6309382289', '2020-04-04 13:20:11'),
(7, '160218735060', 'relay', 1, '78158 63132', '2020-03-24 00:00:00'),
(9, '160218735060', 'nodemcu', 1, '78158 63132', '2020-03-24 00:00:00'),
(10, '160218735031', 'raspberry pi', 2, '6309382289', '2020-03-04 00:00:00');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `data`
--
ALTER TABLE `data`
  ADD PRIMARY KEY (`sno`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `data`
--
ALTER TABLE `data`
  MODIFY `sno` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
