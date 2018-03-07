-- phpMyAdmin SQL Dump
-- version 4.7.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 07, 2018 at 07:31 AM
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
-- Table structure for table `avgscore`
--

CREATE TABLE `avgscore` (
  `web_id` int(10) NOT NULL,
  `avg_score` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `feedback`
--

CREATE TABLE `feedback` (
  `fid` int(10) NOT NULL,
  `uid` varchar(50) NOT NULL,
  `feedback` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `feedback`
--

INSERT INTO `feedback` (`fid`, `uid`, `feedback`) VALUES
(1, 'u101', 'good'),
(2, 'u101', 'good'),
(3, 'u101', 'good'),
(4, 'u101', 'good'),
(5, 'u101', 'good'),
(6, 'u101', 'good'),
(7, 'u101', 'good'),
(8, 'u101', 'good'),
(9, 'u101', 'good'),
(10, 'u101', 'good'),
(11, 'u101', 'good'),
(12, 'u101', 'good'),
(13, 'u101', 'good'),
(14, 'u101', 'good'),
(15, 'u101', 'good'),
(16, 'u101', 'good'),
(17, 'u101', 'good');

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
-- Table structure for table `tags`
--

CREATE TABLE `tags` (
  `tag_name` varchar(50) NOT NULL,
  `tag_id` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

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

-- --------------------------------------------------------

--
-- Table structure for table `webcomment`
--

CREATE TABLE `webcomment` (
  `comment_id` int(10) NOT NULL,
  `web_id` int(10) NOT NULL,
  `user_id` varchar(50) NOT NULL,
  `comment` varchar(800) NOT NULL,
  `score` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `webcomment`
--

INSERT INTO `webcomment` (`comment_id`, `web_id`, `user_id`, `comment`, `score`) VALUES
(1, 1, 'u101', 'asdasdasdadadadadasdasd', 8);

-- --------------------------------------------------------

--
-- Table structure for table `websites`
--

CREATE TABLE `websites` (
  `website_name` varchar(200) NOT NULL,
  `web_id` int(10) NOT NULL,
  `add_by_user` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `websites`
--

INSERT INTO `websites` (`website_name`, `web_id`, `add_by_user`) VALUES
('google.com', 1, 'u101'),
('hsd', 2, 'u101'),
('hasd', 3, 'u101'),
('hsdsd', 4, 'u111'),
('hdfdfsd', 5, 'u101'),
('hfgfgsd', 6, 'u101'),
('hsfvfvvd', 7, 'u101'),
('hrfrfsd', 8, 'u111'),
('hsffgd', 9, 'u111'),
('hefefsd', 10, 'u111'),
('hsefefd', 11, 'u101'),
('hefefsd', 12, 'u101');

-- --------------------------------------------------------

--
-- Table structure for table `webtags`
--

CREATE TABLE `webtags` (
  `web_id` int(10) NOT NULL,
  `tag_id` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `avgscore`
--
ALTER TABLE `avgscore`
  ADD PRIMARY KEY (`web_id`);

--
-- Indexes for table `feedback`
--
ALTER TABLE `feedback`
  ADD PRIMARY KEY (`fid`);

--
-- Indexes for table `members`
--
ALTER TABLE `members`
  ADD PRIMARY KEY (`mId`);

--
-- Indexes for table `tags`
--
ALTER TABLE `tags`
  ADD PRIMARY KEY (`tag_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`username`);

--
-- Indexes for table `webcomment`
--
ALTER TABLE `webcomment`
  ADD PRIMARY KEY (`comment_id`);

--
-- Indexes for table `websites`
--
ALTER TABLE `websites`
  ADD PRIMARY KEY (`web_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `feedback`
--
ALTER TABLE `feedback`
  MODIFY `fid` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;
--
-- AUTO_INCREMENT for table `tags`
--
ALTER TABLE `tags`
  MODIFY `tag_id` int(10) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `webcomment`
--
ALTER TABLE `webcomment`
  MODIFY `comment_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `websites`
--
ALTER TABLE `websites`
  MODIFY `web_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
