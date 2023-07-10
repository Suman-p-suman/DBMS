-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 25, 2023 at 05:15 PM
-- Server version: 10.4.27-MariaDB
-- PHP Version: 8.2.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `dbms`
--

-- --------------------------------------------------------

--
-- Table structure for table `asignemp`
--

CREATE TABLE `asignemp` (
  `eid` int(20) NOT NULL,
  `vid` int(20) NOT NULL,
  `ddate` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `asignemp`
--

INSERT INTO `asignemp` (`eid`, `vid`, `ddate`) VALUES
(1001, 2006, '2023-01-24'),
(1004, 2001, '2023-01-23');

-- --------------------------------------------------------

--
-- Table structure for table `asignevehicle`
--

CREATE TABLE `asignevehicle` (
  `vid` int(20) NOT NULL,
  `tid` int(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `asignevehicle`
--

INSERT INTO `asignevehicle` (`vid`, `tid`) VALUES
(2001, 103);

-- --------------------------------------------------------

--
-- Table structure for table `bookedfor`
--

CREATE TABLE `bookedfor` (
  `cid` int(20) NOT NULL,
  `tid` int(20) NOT NULL,
  `vid` int(20) NOT NULL,
  `bdate` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `customer`
--

CREATE TABLE `customer` (
  `CID` int(20) NOT NULL,
  `CNAME` varchar(30) NOT NULL,
  `CADDRESS` varchar(40) NOT NULL,
  `CPHONE` varchar(10) NOT NULL,
  `PASSWORD` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `customer`
--

INSERT INTO `customer` (`CID`, `CNAME`, `CADDRESS`, `CPHONE`, `PASSWORD`) VALUES
(5000, 'Rohith K V', 'Bangalore', '9611141662', 'Raman'),
(5003, 'Suman P', 'Bangalore', '8963214752', 'Rajan'),
(5004, 'Ranjith', 'Bangalore', '2345678901', '111'),
(5006, 'sagar', 'bngalore', '523679841', 'Raja'),
(5015, 'Raja', 'bangalore', '6789054321', '333'),
(5038, 'Ranjith K V', 'bangalore', '6789054321', '45'),
(5040, 'sum', 'bangalore', '6789054321', '6'),
(5041, 'Rohith', 'Bangalore', '908765456', 'Ram'),
(5042, 'sathvik', 'sathvik@gmail.com', '7855489596', 'qwerty'),
(5043, 'samartha', 'Bangalore', '7204109073', 'shetty@1428'),
(5044, 'laksh', 'laksh.r.a.2002@gmail.com', '4652325878', '1234'),
(5045, 'sathv', 'Bangalore', '6789054321', '12345');

-- --------------------------------------------------------

--
-- Table structure for table `emp`
--

CREATE TABLE `emp` (
  `eid` int(20) NOT NULL,
  `ename` varchar(30) NOT NULL,
  `eaddress` varchar(30) NOT NULL,
  `ephone` int(20) NOT NULL,
  `ejdate` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `emp`
--

INSERT INTO `emp` (`eid`, `ename`, `eaddress`, `ephone`, `ejdate`) VALUES
(1001, 'deva', 'Bengaluru', 9888, '2023-01-13'),
(1002, 'pranav', 'tsd', 56111, '2023-01-12'),
(1004, 'Abhi', 'Bangalore', 2147483647, '2023-01-25');

-- --------------------------------------------------------

--
-- Table structure for table `login`
--

CREATE TABLE `login` (
  `adminid` int(20) NOT NULL,
  `name` varchar(30) NOT NULL,
  `password` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `login`
--

INSERT INTO `login` (`adminid`, `name`, `password`) VALUES
(2002, 'Rohith', 'rohith@123'),
(2003, 'Suman p', 'suman@123');

-- --------------------------------------------------------

--
-- Table structure for table `payment`
--

CREATE TABLE `payment` (
  `CID` int(20) NOT NULL,
  `TID` int(20) NOT NULL,
  `AMOUNT` int(11) NOT NULL,
  `DATE` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `payment`
--

INSERT INTO `payment` (`CID`, `TID`, `AMOUNT`, `DATE`) VALUES
(5000, 103, 500, '0000-00-00 00:00:00'),
(5043, 101, 1000, '0000-00-00 00:00:00'),
(5043, 114, 7000, '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `trip`
--

CREATE TABLE `trip` (
  `tid` int(20) NOT NULL,
  `source` varchar(30) NOT NULL,
  `destination` varchar(30) NOT NULL,
  `amount` int(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `trip`
--

INSERT INTO `trip` (`tid`, `source`, `destination`, `amount`) VALUES
(101, 'bengaluru', 'tarikere', 1000),
(103, 'Bangalore', 'Kolar', 500),
(104, 'Bangalore', 'chik', 4000),
(105, 'Bangalore', 'Mangalore', 5000),
(110, 'Bangalore', 'Mandya', 90),
(114, 'Bangalore', 'udupi', 7000),
(200, 'Bangalore', 'Mangalore', 5000);

-- --------------------------------------------------------

--
-- Table structure for table `tripbook`
--

CREATE TABLE `tripbook` (
  `TID` int(20) NOT NULL,
  `CID` int(11) NOT NULL,
  `SDATE` date NOT NULL,
  `EDATE` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tripbook`
--

INSERT INTO `tripbook` (`TID`, `CID`, `SDATE`, `EDATE`) VALUES
(101, 5000, '2023-01-24', '2023-01-24'),
(101, 5043, '2023-01-27', '2023-02-02'),
(103, 5000, '2023-01-23', '2023-01-24'),
(110, 5043, '2023-02-02', '2023-02-10'),
(114, 5000, '2023-01-25', '2023-01-26'),
(114, 5043, '2023-01-26', '2023-01-27'),
(200, 5000, '2023-01-26', '2023-01-27');

-- --------------------------------------------------------

--
-- Table structure for table `vehicle`
--

CREATE TABLE `vehicle` (
  `vid` int(20) NOT NULL,
  `vname` varchar(30) NOT NULL,
  `capacity` int(10) NOT NULL,
  `type` varchar(30) NOT NULL,
  `regno` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `vehicle`
--

INSERT INTO `vehicle` (`vid`, `vname`, `capacity`, `type`, `regno`) VALUES
(141, 'MAHINDRA', 4, '4 Wheeler', 'KA 08 TY 2589'),
(2001, 'bajaj', 5, 'four', 'KA 18 7686'),
(2006, 'ALTO', 4, 'small', 'KA 20 1456'),
(2010, 'jmm', 2, '4wheeler', 'KA 20 1456'),
(2020, 'ALTO', 4, 'small', 'KA 20 1456');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `asignemp`
--
ALTER TABLE `asignemp`
  ADD PRIMARY KEY (`eid`,`vid`),
  ADD KEY `vid` (`vid`);

--
-- Indexes for table `asignevehicle`
--
ALTER TABLE `asignevehicle`
  ADD PRIMARY KEY (`vid`),
  ADD KEY `foregin_key1` (`vid`),
  ADD KEY `foregin_key2` (`tid`);

--
-- Indexes for table `bookedfor`
--
ALTER TABLE `bookedfor`
  ADD PRIMARY KEY (`vid`),
  ADD KEY `fk` (`cid`),
  ADD KEY `fk1` (`tid`);

--
-- Indexes for table `customer`
--
ALTER TABLE `customer`
  ADD PRIMARY KEY (`CID`),
  ADD UNIQUE KEY `CNAME_2` (`CNAME`),
  ADD KEY `CNAME` (`CNAME`);

--
-- Indexes for table `emp`
--
ALTER TABLE `emp`
  ADD PRIMARY KEY (`eid`);

--
-- Indexes for table `login`
--
ALTER TABLE `login`
  ADD PRIMARY KEY (`adminid`),
  ADD UNIQUE KEY `uk` (`password`);

--
-- Indexes for table `payment`
--
ALTER TABLE `payment`
  ADD PRIMARY KEY (`CID`,`TID`),
  ADD KEY `fub` (`TID`);

--
-- Indexes for table `trip`
--
ALTER TABLE `trip`
  ADD PRIMARY KEY (`tid`);

--
-- Indexes for table `tripbook`
--
ALTER TABLE `tripbook`
  ADD PRIMARY KEY (`TID`,`CID`),
  ADD KEY `CID` (`CID`);

--
-- Indexes for table `vehicle`
--
ALTER TABLE `vehicle`
  ADD PRIMARY KEY (`vid`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `customer`
--
ALTER TABLE `customer`
  MODIFY `CID` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5046;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `asignemp`
--
ALTER TABLE `asignemp`
  ADD CONSTRAINT `asignemp_ibfk_1` FOREIGN KEY (`eid`) REFERENCES `emp` (`eid`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `asignemp_ibfk_2` FOREIGN KEY (`vid`) REFERENCES `vehicle` (`vid`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `asignevehicle`
--
ALTER TABLE `asignevehicle`
  ADD CONSTRAINT `asignevehicle_ibfk_1` FOREIGN KEY (`tid`) REFERENCES `trip` (`tid`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `asignevehicle_ibfk_2` FOREIGN KEY (`vid`) REFERENCES `vehicle` (`vid`) ON DELETE CASCADE;

--
-- Constraints for table `bookedfor`
--
ALTER TABLE `bookedfor`
  ADD CONSTRAINT `bookedfor_ibfk_1` FOREIGN KEY (`cid`) REFERENCES `customer` (`CID`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `bookedfor_ibfk_2` FOREIGN KEY (`tid`) REFERENCES `payment` (`TID`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk` FOREIGN KEY (`vid`) REFERENCES `vehicle` (`vid`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `payment`
--
ALTER TABLE `payment`
  ADD CONSTRAINT `fub` FOREIGN KEY (`TID`) REFERENCES `trip` (`tid`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `payment_ibfk_1` FOREIGN KEY (`CID`) REFERENCES `customer` (`CID`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `tripbook`
--
ALTER TABLE `tripbook`
  ADD CONSTRAINT `tripbook_ibfk_1` FOREIGN KEY (`TID`) REFERENCES `trip` (`tid`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `tripbook_ibfk_2` FOREIGN KEY (`CID`) REFERENCES `customer` (`CID`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
