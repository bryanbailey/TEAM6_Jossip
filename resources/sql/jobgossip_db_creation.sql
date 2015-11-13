-- phpMyAdmin SQL Dump
-- version 4.4.14
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Nov 13, 2015 at 05:22 PM
-- Server version: 5.6.26
-- PHP Version: 5.6.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `jobgossip`
--

-- --------------------------------------------------------

--
-- Table structure for table `company`
--

DROP TABLE IF EXISTS `company`;
CREATE TABLE IF NOT EXISTS `company` (
  `company_id` int(8) NOT NULL,
  `company_name` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `company_description` varchar(500) COLLATE utf8_unicode_ci DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=15 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `company`
--

INSERT INTO `company` (`company_id`, `company_name`, `company_description`) VALUES
(1, 'Bank of America', 'Large bank founded on the east coast. Headquarters in Charlotte, North Carolina.'),
(2, 'Red Ventures', 'Marketing and sales services'),
(3, 'IBM', 'One of the original Silicon Valley software giants. Still going strong today with a different approach to the computing industry.'),
(4, 'Coke-a-Cola', 'Polar bears in Atlanta'),
(5, 'Johnson & Johnson', NULL),
(6, 'BB&T', NULL),
(7, 'UNC Charlotte', NULL),
(8, 'Time Warner Entertainment', NULL),
(9, 'DirecTV', NULL),
(10, 'Pepsi Bottling Company', NULL),
(11, 'Metallic Bonds LLC', NULL),
(12, 'Microsoft', NULL),
(13, 'Google', NULL),
(14, 'Apple', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `company_post`
--

DROP TABLE IF EXISTS `company_post`;
CREATE TABLE IF NOT EXISTS `company_post` (
  `post_id` int(8) NOT NULL,
  `fk_user_id` int(8) NOT NULL,
  `fk_company_id` int(8) NOT NULL,
  `post_title` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `post_content` varchar(500) COLLATE utf8_unicode_ci DEFAULT NULL,
  `company_rating` tinyint(1) NOT NULL,
  `post_time` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `company_post`
--

INSERT INTO `company_post` (`post_id`, `fk_user_id`, `fk_company_id`, `post_title`, `post_content`, `company_rating`, `post_time`) VALUES
(1, 1, 1, 'Big Money with Big Red', 'Loved my time with BofA. Competitive work environment with a good salary!', 4, '2015-10-27 13:02:48'),
(2, 1, 3, 'My Post', 'sndfknsknsfd', 3, '2015-10-27 21:19:29'),
(3, 1, 3, 'Software Engingeer', 'blah', 3, '2015-10-28 12:05:20'),
(4, 1, 1, 'rrererer', 'ererererer', 5, '2015-11-03 11:29:21');

-- --------------------------------------------------------

--
-- Table structure for table `employment_history`
--

DROP TABLE IF EXISTS `employment_history`;
CREATE TABLE IF NOT EXISTS `employment_history` (
  `employment_record_id` int(11) NOT NULL,
  `fk_user_id` int(11) NOT NULL,
  `fk_company_id` int(11) NOT NULL,
  `start_date` date DEFAULT NULL,
  `end_date` date DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `employment_history`
--

INSERT INTO `employment_history` (`employment_record_id`, `fk_user_id`, `fk_company_id`, `start_date`, `end_date`) VALUES
(1, 1, 11, '2015-04-07', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `position_post`
--

DROP TABLE IF EXISTS `position_post`;
CREATE TABLE IF NOT EXISTS `position_post` (
  `post_id` int(8) NOT NULL,
  `fk_user_id` int(8) NOT NULL,
  `fk_company_id` int(8) NOT NULL,
  `position_title` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `post_content` varchar(500) COLLATE utf8_unicode_ci NOT NULL,
  `post_time` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `position_post`
--

INSERT INTO `position_post` (`post_id`, `fk_user_id`, `fk_company_id`, `position_title`, `post_content`, `post_time`) VALUES
(1, 4, 4, 'Taste Tester', 'I may have drank too much during my tenure but it was a good run. Management is friendly and the atmosphere is pleasant', '2015-10-27 13:19:27'),
(2, 6, 13, 'Software Engineer', 'Get ready for the Agile Scrum process! Either learn fast and contribute or get out of the way! The methods are efficient and the teams well organized. This company knows how to utilize their talents and they pay dividends with benefits. 10/10 best job I''ve ever had.', '2015-10-27 13:21:53');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

DROP TABLE IF EXISTS `user`;
CREATE TABLE IF NOT EXISTS `user` (
  `user_id` int(8) NOT NULL,
  `username` varchar(25) COLLATE utf8_unicode_ci NOT NULL,
  `first_name` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `last_name` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `salt` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `registration_time` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`user_id`, `username`, `first_name`, `last_name`, `email`, `salt`, `password`, `registration_time`) VALUES
(1, 'keljoundi', 'kasey', 'eljoundi', 'keljoundi@gmail.com', '2091365018562d0eb7811565.02780028', '20STUsLKVBN36', '2015-10-25 13:17:43'),
(2, 'timoty', 'Tim', 'Burton', 'tim@burton.com', '1675870066562fafdd510302.39645971', '16X9hePcNOujk', '2015-10-27 13:09:49'),
(3, 'rmanning', 'Richard', 'Manning', 'r_manning@bofa.com', '50696186562fb00423add8.14525341', '50q.zrL5e0Sak', '2015-10-27 13:10:28'),
(4, 'bb5840', 'Beth', 'Bets', 'bb@gmail.com', '260875412562fb03b00dd27.62827446', '26ebxVBqeGFnQ', '2015-10-27 13:11:23'),
(5, 'heyyyburt', 'Burt', 'Wilkinson', 'heyyy@yahoo.com', '572322840562fb061982cc1.34052342', '57pK2EK2Kjgos', '2015-10-27 13:12:01'),
(6, 'linkedin', 'Alexandra', 'Smith', 'alexsmith@uncc.edu', '1030370781562fb094398e57.08280381', '10xCP/g3c1sQc', '2015-10-27 13:12:52'),
(7, 'samtom', 'sam', 'thomas', 'sssttt@uncc.edu', '12082456945633957388c616.49635957', '12CsGd8FRcMSM', '2015-10-30 12:06:11'),
(8, 'rickyh', 'rick', 'hatton', 'rickky@aol.com', '398289611563396a2576b25.59875413', '39ujvZR3H44SQ', '2015-10-30 12:11:14');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `company`
--
ALTER TABLE `company`
  ADD PRIMARY KEY (`company_id`);

--
-- Indexes for table `company_post`
--
ALTER TABLE `company_post`
  ADD PRIMARY KEY (`post_id`),
  ADD KEY `fk_user_id` (`fk_user_id`),
  ADD KEY `fk_company_id` (`fk_company_id`);

--
-- Indexes for table `employment_history`
--
ALTER TABLE `employment_history`
  ADD PRIMARY KEY (`employment_record_id`),
  ADD KEY `fk_user_id` (`fk_user_id`),
  ADD KEY `fk_company_id` (`fk_company_id`);

--
-- Indexes for table `position_post`
--
ALTER TABLE `position_post`
  ADD PRIMARY KEY (`post_id`),
  ADD KEY `fk_user_id` (`fk_user_id`),
  ADD KEY `fk_position_id` (`position_title`),
  ADD KEY `fk_company_id` (`fk_company_id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`user_id`),
  ADD UNIQUE KEY `index_unique_username` (`username`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `company`
--
ALTER TABLE `company`
  MODIFY `company_id` int(8) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=15;
--
-- AUTO_INCREMENT for table `company_post`
--
ALTER TABLE `company_post`
  MODIFY `post_id` int(8) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `employment_history`
--
ALTER TABLE `employment_history`
  MODIFY `employment_record_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `position_post`
--
ALTER TABLE `position_post`
  MODIFY `post_id` int(8) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `user_id` int(8) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=9;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `company_post`
--
ALTER TABLE `company_post`
  ADD CONSTRAINT `company_post_ibfk_1` FOREIGN KEY (`fk_user_id`) REFERENCES `user` (`user_id`),
  ADD CONSTRAINT `company_post_ibfk_2` FOREIGN KEY (`fk_company_id`) REFERENCES `company` (`company_id`);

--
-- Constraints for table `employment_history`
--
ALTER TABLE `employment_history`
  ADD CONSTRAINT `employment_history_ibfk_1` FOREIGN KEY (`fk_user_id`) REFERENCES `user` (`user_id`),
  ADD CONSTRAINT `employment_history_ibfk_2` FOREIGN KEY (`fk_company_id`) REFERENCES `company` (`company_id`);

--
-- Constraints for table `position_post`
--
ALTER TABLE `position_post`
  ADD CONSTRAINT `position_post_ibfk_1` FOREIGN KEY (`fk_user_id`) REFERENCES `user` (`user_id`),
  ADD CONSTRAINT `position_post_ibfk_2` FOREIGN KEY (`fk_company_id`) REFERENCES `company` (`company_id`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
