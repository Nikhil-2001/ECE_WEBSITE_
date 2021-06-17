-- phpMyAdmin SQL Dump
-- version 5.0.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 09, 2020 at 12:48 PM
-- Server version: 10.4.14-MariaDB
-- PHP Version: 7.2.34

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
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
-- Table structure for table `auth`
--

CREATE TABLE `auth` (
  `uname` varchar(100) NOT NULL,
  `passwd` varchar(255) NOT NULL,
  `mail_id` varchar(60) NOT NULL,
  `locked_out_timestamp` timestamp NULL DEFAULT NULL,
  `failed_login_count` int(50) NOT NULL DEFAULT 0,
  `blocked_ip` varchar(30) NOT NULL,
  `Psalt` varchar(60) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COMMENT='Table to store admin credentials';

--
-- Dumping data for table `auth`
--

INSERT INTO `auth` (`uname`, `passwd`, `mail_id`, `locked_out_timestamp`, `failed_login_count`, `blocked_ip`, `Psalt`) VALUES
('kali', '$2y$10$V7TprCeHXEGpEDb4yINBr.IaYoC0w6rCEQrFHJ9f7NK9LCMwxjnru', 'maheshstores.vr@gmail.com', '2020-11-02 13:19:35', 0, '', '');

-- --------------------------------------------------------

--
-- Table structure for table `comp`
--

CREATE TABLE `comp` (
  `comp_name` varchar(60) NOT NULL,
  `comp_count` int(11) NOT NULL DEFAULT 1,
  `comp_Id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COMMENT='database to store list of all componnets';

--
-- Dumping data for table `comp`
--

INSERT INTO `comp` (`comp_name`, `comp_count`, `comp_Id`) VALUES
('raspberry pi', 0, 0),
('relay', 3, NULL),
('servo', 10, NULL),
('nodemcu', 15, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `data`
--

CREATE TABLE `data` (
  `sno` int(20) NOT NULL,
  `roll_no` varchar(25) DEFAULT NULL,
  `sname` varchar(60) NOT NULL,
  `comp_name` varchar(30) DEFAULT NULL,
  `no` int(25) NOT NULL DEFAULT 1,
  `phno` varchar(15) DEFAULT NULL,
  `return_date` datetime NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COMMENT='details of studenst who borrowed components';

--
-- Dumping data for table `data`
--

INSERT INTO `data` (`sno`, `roll_no`, `sname`, `comp_name`, `no`, `phno`, `return_date`) VALUES
(1, '160218735060', 'Vishnu', 'raspberry pi', 2, '78158 63132', '2020-04-01 12:41:23'),
(2, '160218735031', 'Rohit', 'relay', 1, '6309382289', '2020-04-01 12:42:16'),
(3, '160218735059', 'Kaushik', 'servo', 6, '77806 04927', '2020-04-02 12:43:09'),
(4, '160218735025', 'Tejesh', 'nodemcu', 1, '77028 19977', '2020-04-02 12:44:02'),
(5, '160218735031', 'Rohit', 'nodemcu', 1, '6309382289', '2020-04-04 13:20:11'),
(7, '160218735060', 'Vishnu', 'relay', 1, '78158 63132', '2020-03-24 00:00:00'),
(9, '160218735060', 'Vishnu', 'nodemcu', 1, '78158 63132', '2020-03-24 00:00:00'),
(10, '160218735031', 'Rohit', 'raspberry pi', 2, '6309382289', '2020-03-04 00:00:00');

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
