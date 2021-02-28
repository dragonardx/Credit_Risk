-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 28, 2021 at 03:09 PM
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
-- Database: `credit_risk`
--

-- --------------------------------------------------------

--
-- Table structure for table `companies`
--

CREATE TABLE `companies` (
  `SessionID` varchar(100) NOT NULL,
  `ID` int(11) NOT NULL,
  `Field1` float DEFAULT NULL,
  `Field2` float DEFAULT NULL,
  `Field3` float DEFAULT NULL,
  `Field4` float DEFAULT NULL,
  `Field5` float DEFAULT NULL,
  `Field6` float DEFAULT NULL,
  `Field7` float DEFAULT NULL,
  `Field8` float DEFAULT NULL,
  `Field9` float DEFAULT NULL,
  `Field10` float DEFAULT NULL,
  `Date` date NOT NULL,
  `Model` char(10) NOT NULL,
  `Factor1` float DEFAULT NULL,
  `Factor2` float DEFAULT NULL,
  `Factor3` float DEFAULT NULL,
  `Factor4` float DEFAULT NULL,
  `Factor6` float DEFAULT NULL,
  `Factor7` float DEFAULT NULL,
  `LPT` float DEFAULT NULL,
  `BEH` float DEFAULT NULL,
  `FIN` float DEFAULT NULL,
  `TOTAL` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `companies`
--

INSERT INTO `companies` (`SessionID`, `ID`, `Field1`, `Field2`, `Field3`, `Field4`, `Field5`, `Field6`, `Field7`, `Field8`, `Field9`, `Field10`, `Date`, `Model`, `Factor1`, `Factor2`, `Factor3`, `Factor4`, `Factor6`, `Factor7`, `LPT`, `BEH`, `FIN`, `TOTAL`) VALUES
('2242423aata21', 11654, 5, 2, 7, 8, 2, 0.6, 3, 5, 3, 4, '2020-05-01', 'A', 5, 9, 7, 4, 60, 2, 21, 4, 62, 0.85867782242467),
('22q1a1a5ata21', 1165446154, NULL, 2, 7, 8, 2, 0.6, 3, 5, 3, 4, '2020-12-01', 'B', 2, 9, NULL, NULL, 60, 2, 11, NULL, 62, 0.83477611320689),
('22q1a1aata21', 1165446154, NULL, 2, 7, 8, 2, 0.6, 3, 5, 3, 4, '2020-12-01', 'A', 2, 9, 7, 4, 60, 2, 18, 4, 62, 0.75155756773054),
('22q1aaata21', 1165446154, 5, 2, 7, 8, 2, 0.6, 3, 5, 3, 4, '2020-12-07', 'B', 5, 9, NULL, NULL, 60, 2, 14, NULL, 62, 0.50367291672848),
('22qaaata21', 1165446154, 5, 2, 7, 8, 2, 0.6, 3, 5, 3, 4, '2020-12-07', 'B', 5, 9, NULL, NULL, 60, 2, 14, NULL, 62, 0.50367291672848);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `companies`
--
ALTER TABLE `companies`
  ADD UNIQUE KEY `SessionID` (`SessionID`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
