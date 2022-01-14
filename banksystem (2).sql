-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 14, 2022 at 11:42 AM
-- Server version: 10.4.22-MariaDB
-- PHP Version: 8.1.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `banksystem`
--

-- --------------------------------------------------------

--
-- Table structure for table `info`
--

CREATE TABLE `info` (
  `Id` int(11) NOT NULL,
  `Name` varchar(30) NOT NULL,
  `Email` varchar(40) NOT NULL,
  `Balance` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `info`
--

INSERT INTO `info` (`Id`, `Name`, `Email`, `Balance`) VALUES
(1, 'Suman Vij', 'sumanvij1@gmail.com', 50776),
(2, 'Renuka', 'renuka27@gmail.com', 34928),
(3, 'Subhana', 'subhana99@gmail.com', 23458),
(4, 'Anand', 'anand97@gmail.com', 59772),
(5, 'Saumya', 'saumya56@gmail.com', 34300),
(6, 'Manu', 'manu01@gmail.com', 79542),
(7, 'Lucky', 'lucky07@gmail.com', 89255),
(8, 'Palak', 'palak12@gmail.com', 63745),
(9, 'Shantanu', 'shan98@gmail.com', 35000),
(10, 'Rehmeena', 'rehmeena17@gmail.com', 34224);

-- --------------------------------------------------------

--
-- Table structure for table `transaction`
--

CREATE TABLE `transaction` (
  `sender` text NOT NULL,
  `receiver` text NOT NULL,
  `Balance` int(8) NOT NULL,
  `datetime` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `transaction`
--

INSERT INTO `transaction` (`sender`, `receiver`, `Balance`, `datetime`) VALUES
('Renuka', 'Anand', 450, '2022-01-12 22:10:02'),
('Lucky', 'Palak', 745, '2022-01-12 22:10:30'),
('Manu', 'Subhana', 458, '2022-01-12 23:00:51'),
('Rehmeena', 'Suman Vij', 776, '2022-01-12 23:01:12');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `info`
--
ALTER TABLE `info`
  ADD PRIMARY KEY (`Id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
