-- phpMyAdmin SQL Dump
-- version 4.7.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 07, 2018 at 01:05 PM
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

-- --------------------------------------------------------

--
-- Table structure for table `members`
--

CREATE TABLE `members` (
  `mId` varchar(15) NOT NULL,
  `mPwd` varchar(16) NOT NULL,
  `mName` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

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

-- --------------------------------------------------------

--
-- Table structure for table `webcomment`
--

CREATE TABLE `webcomment` (
  `comment_id` int(10) NOT NULL,
  `web_id` int(10) NOT NULL,
  `user_id` varchar(50) NOT NULL,
  `comment` varchar(800) NOT NULL,
  `score` int(10) NOT NULL,
  `type` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Triggers `webcomment`
--
DELIMITER $$
CREATE TRIGGER `calculate_avgScore` AFTER INSERT ON `webcomment` FOR EACH ROW UPDATE `avgscore` 
	SET `avg_score` = (SELECT AVG(score) FROM webcomment
                         WHERE avgscore.web_id =  webcomment.web_id)											
     WHERE   web_id = NEW.web_id
$$
DELIMITER ;

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
-- Triggers `websites`
--
DELIMITER $$
CREATE TRIGGER `avgscore_webId` AFTER INSERT ON `websites` FOR EACH ROW INSERT INTO `avgscore`(`web_id`)
SELECT web_id from websites where web_id = NEW.web_id
$$
DELIMITER ;

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
  MODIFY `fid` int(10) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `tags`
--
ALTER TABLE `tags`
  MODIFY `tag_id` int(10) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `webcomment`
--
ALTER TABLE `webcomment`
  MODIFY `comment_id` int(10) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `websites`
--
ALTER TABLE `websites`
  MODIFY `web_id` int(10) NOT NULL AUTO_INCREMENT;COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
