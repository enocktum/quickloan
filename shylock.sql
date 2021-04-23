-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 23, 2021 at 12:00 PM
-- Server version: 10.4.17-MariaDB
-- PHP Version: 8.0.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `shylock`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `incre` int(11) NOT NULL,
  `username` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `phonenumber` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`incre`, `username`, `password`, `phonenumber`) VALUES
(1, 'admin', 'admin123', '0722123456');

-- --------------------------------------------------------

--
-- Table structure for table `loan`
--

CREATE TABLE `loan` (
  `incre` int(11) NOT NULL,
  `interest` int(11) NOT NULL,
  `defaultinterest` int(11) NOT NULL,
  `companyname` varchar(150) NOT NULL,
  `paymentperiod` int(11) NOT NULL,
  `graceperiod` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `loan`
--

INSERT INTO `loan` (`incre`, `interest`, `defaultinterest`, `companyname`, `paymentperiod`, `graceperiod`) VALUES
(1, 10, 15, '', 10, 7);

-- --------------------------------------------------------

--
-- Table structure for table `memberloan`
--

CREATE TABLE `memberloan` (
  `incre` int(11) NOT NULL,
  `membersid` int(11) NOT NULL,
  `borrowedamount` int(11) NOT NULL,
  `returnamount` int(11) NOT NULL,
  `paymentstatus` int(11) NOT NULL,
  `securityitem` text NOT NULL,
  `deadline` date NOT NULL,
  `fineafterdeadline` int(11) NOT NULL,
  `saledate` date NOT NULL,
  `approvalstatus` int(11) NOT NULL,
  `soldstatus` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `memberloan`
--

INSERT INTO `memberloan` (`incre`, `membersid`, `borrowedamount`, `returnamount`, `paymentstatus`, `securityitem`, `deadline`, `fineafterdeadline`, `saledate`, `approvalstatus`, `soldstatus`) VALUES
(4, 7, 10000, 11000, 2, 'tablet', '2021-05-01', 0, '0000-00-00', 2, 2);

-- --------------------------------------------------------

--
-- Table structure for table `members`
--

CREATE TABLE `members` (
  `incre` int(11) NOT NULL,
  `firstname` varchar(100) NOT NULL,
  `lastname` varchar(100) NOT NULL,
  `idnumber` varchar(100) NOT NULL,
  `phonenumber` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `members`
--

INSERT INTO `members` (`incre`, `firstname`, `lastname`, `idnumber`, `phonenumber`, `password`) VALUES
(7, 'enock', 'tum', '30043271', '0702000775', 'green');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`incre`);

--
-- Indexes for table `loan`
--
ALTER TABLE `loan`
  ADD PRIMARY KEY (`incre`);

--
-- Indexes for table `memberloan`
--
ALTER TABLE `memberloan`
  ADD PRIMARY KEY (`incre`);

--
-- Indexes for table `members`
--
ALTER TABLE `members`
  ADD PRIMARY KEY (`incre`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `incre` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `loan`
--
ALTER TABLE `loan`
  MODIFY `incre` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `memberloan`
--
ALTER TABLE `memberloan`
  MODIFY `incre` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `members`
--
ALTER TABLE `members`
  MODIFY `incre` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
