-- phpMyAdmin SQL Dump
-- version 4.7.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 08, 2018 at 08:58 AM
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
('1', '1', '1', '1', 1, '1');

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
-- Dumping data for table `webcomment`
--

INSERT INTO `webcomment` (`comment_id`, `web_id`, `user_id`, `comment`, `score`, `type`) VALUES
(1, 1, '1', 'good', 7, 'positive'),
(2, 1, '1', 'yes', 0, 'neutral'),
(3, 1, '1', 'not bad', 0, 'neutral'),
(6, 4, '1', 'a good website but better design', 7, 'positive'),
(7, 4, '1', 'a good website but better design', 7, 'positive'),
(8, 4, '1', 'a good website but better design', 7, 'positive'),
(9, 4, '1', 'a good website but better design', 7, 'positive'),
(10, 4, '1', 'bad', -7, 'negative'),
(11, 1, '1', 'bad', -7, 'negative'),
(12, 2, '1', 'bad', -7, 'negative'),
(13, 3, '1', 'bad', -7, 'negative'),
(14, 1, '1', 'excellent', 9, 'positive'),
(15, 1, '1', 'excellent', 9, 'positive'),
(16, 2, '1', 'excellent', 9, 'positive'),
(17, 3, '1', 'excellent', 9, 'positive'),
(18, 4, '1', 'excellent', 9, 'positive'),
(19, 4, '1', 'excellent', 9, 'positive'),
(20, 4, '1', 'excellent', 9, 'positive'),
(21, 3, '1', 'excellent', 9, 'positive'),
(22, 1, '1', 'excellent', 9, 'positive'),
(23, 2, '1', 'excellent', 9, 'positive'),
(24, 4, '1', 'excellent', 9, 'positive'),
(25, 4, '1', 'excellent', 9, 'positive'),
(26, 1, '1', 'good', 7, 'positive'),
(27, 1, '1', 'good', 7, 'positive'),
(28, 2, '1', 'good', 7, 'positive'),
(29, 1, '1', 'good', 7, 'positive'),
(30, 1, '1', 'good', 7, 'positive');

--
-- Triggers `webcomment`
--
DELIMITER $$
CREATE TRIGGER `calculate_avgScore` AFTER INSERT ON `webcomment` FOR EACH ROW UPDATE `websites` 
	SET `avg_score` = (SELECT AVG(score) FROM webcomment
                         WHERE webcomment.web_id=websites.web_id  )											
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
  `add_by_user` varchar(50) NOT NULL,
  `tags` varchar(500) NOT NULL,
  `avg_score` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `websites`
--

INSERT INTO `websites` (`website_name`, `web_id`, `add_by_user`, `tags`, `avg_score`) VALUES
('https://yahoo.com', 1, '1', 'search,bad,hard', 5),
('https://glyphicons.bootstrapcheatsheets.com/', 2, '1', 'bad,good,icons', 4.5),
('google.co.in', 3, '1', 'search,engi,easy', 3.66667),
('http://www.geeksengine.com', 4, '1', 'website,web', 6.6);

--
-- Indexes for dumped tables
--

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
ALTER TABLE `websites` ADD FULLTEXT KEY `tags` (`tags`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `feedback`
--
ALTER TABLE `feedback`
  MODIFY `fid` int(10) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `webcomment`
--
ALTER TABLE `webcomment`
  MODIFY `comment_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;
--
-- AUTO_INCREMENT for table `websites`
--
ALTER TABLE `websites`
  MODIFY `web_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
