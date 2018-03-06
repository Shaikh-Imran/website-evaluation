-- phpMyAdmin SQL Dump
-- version 4.7.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 06, 2018 at 05:08 PM
-- Server version: 10.1.25-MariaDB
-- PHP Version: 5.6.31

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `websiteevaluation`
--

-- --------------------------------------------------------

--
-- Table structure for table `members`
--

CREATE TABLE `members` (
  `mId` varchar(15) NOT NULL,
  `mPwd` varchar(16) NOT NULL,
  `mName` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `members`
--

INSERT INTO `members` (`mId`, `mPwd`, `mName`) VALUES
('1', '1', '11');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `username` varchar(15) NOT NULL,
  `uFname` varchar(15) NOT NULL,
  `uLname` varchar(15) NOT NULL,
  `uEmail` varchar(20) NOT NULL,
  `uContact` int(13) NOT NULL,
  `uPwd` varchar(16) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`username`, `uFname`, `uLname`, `uEmail`, `uContact`, `uPwd`) VALUES
('u100', '1', '1', '1', 11, '1'),
('u101', 'user', 'name', 'user@n', 121212, '123'),
('u102', '1', '1', '1', 11, '1'),
('u103', '1', '1', '1', 11, '1'),
('u104', '1', '1', '1', 11, '1'),
('u105', '1', '1', '1', 11, '1'),
('u106', '1', '1', '1', 11, '1'),
('u107', '1', '1', '1', 11, '1'),
('u108', '1', '1', '1', 11, '1'),
('u109', '1', '1', '1', 11, '1'),
('u111', '1', '1', '1', 11, '1'),
('u112', '1', '1', '1', 11, '1'),
('u113', '1', '1', '1', 11, '1'),
('u114', '1', '1', '1', 11, '1'),
('u115', '1', '1', '1', 11, '1'),
('u116', '1', '1', '1', 11, '1'),
('u117', '1', '1', '1', 11, '1'),
('u118', '1', '1', '1', 11, '1'),
('u119', '1', '1', '1', 11, '1'),
('u120', '1', '1', '1', 11, '1'),
('u121', '1', '1', '1', 11, '1'),
('u122', '1', '1', '1', 11, '1'),
('u123', '1', '1', '1', 11, '1');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `members`
--
ALTER TABLE `members`
  ADD PRIMARY KEY (`mId`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`username`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
