
---
--- To use this script:
---   Go to phpmyadmin and select the database jossip
---   Select SQL from the top nav bar
---   Paste this text into the large text area and run the query
---   Check your tables and make sure they added
---   *** all fake users passwords are "password" ****


-- phpMyAdmin SQL Dump
-- version 4.4.14
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Oct 27, 2015 at 06:24 PM
-- Server version: 5.6.26
-- PHP Version: 5.6.12

--
-- Database: `jobgossip`
--

--
-- Dumping data for table `company`
--

INSERT INTO `company` (`company_id`, `company_name`, `company_description`) VALUES
(1, 'Bank of America', 'Large bank founded on the east coast. Headquarters in Charlotte, North Carolina.'),
(2, 'Red Ventures', 'Marketing and sales services'),
(3, 'IBM', 'One of the original Silicon Valley software giants. Still going strong today with a different approach to the computing industry.'),
(4, 'Coke-a-Cola', 'Polar bears in Atlanta');

--
-- Dumping data for table `company_post`
--

INSERT INTO `company_post` (`post_id`, `fk_user_id`, `fk_company_id`, `post_title`, `post_content`, `company_rating`, `post_time`) VALUES
(1, 1, 1, 'Big Money with Big Red', 'Loved my time with BofA. Competitive work environment with a good salary!', 4, '2015-10-27 13:02:48');

--
-- Dumping data for table `position`
--

INSERT INTO `position` (`position_id`, `fk_company_id`, `position_title`, `position_description`) VALUES
(1, 1, 'Bank Teller', 'Normal day in/day out banking activities. The "face" of BofA'),
(2, 3, 'Software Engineer', 'Creating software for the software giant'),
(3, 4, 'Refreshments Tester', 'Quality control for the Coke taste. Envied by all'),
(4, 4, 'Marketing', 'We make the polar bears you see during the Superbowl.');

--
-- Dumping data for table `position_post`
--

INSERT INTO `position_post` (`post_id`, `fk_user_id`, `fk_position_id`, `post_title`, `post_content`, `position_rating`, `post_time`) VALUES
(1, 4, 3, 'Coke-a-Cola is Good!', 'I may have drank too much during my tenure but it was a good run. Management is friendly and the atmosphere is pleasant', 4, '2015-10-27 13:19:27'),
(2, 6, 2, 'Rapid Changes!', 'Get ready for the Agile Scrum process! Either learn fast and contribute or get out of the way! The methods are efficient and the teams well organized. This company knows how to utilize their talents and they pay dividends with benefits. 10/10 best job I''ve ever had.', 5, '2015-10-27 13:21:53');

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`user_id`, `username`, `first_name`, `last_name`, `email`, `salt`, `password`, `registration_time`) VALUES
(2, 'timoty', 'Tim', 'Burton', 'tim@burton.com', '1675870066562fafdd510302.39645971', '16X9hePcNOujk', '2015-10-27 13:09:49'),
(3, 'rmanning', 'Richard', 'Manning', 'r_manning@bofa.com', '50696186562fb00423add8.14525341', '50q.zrL5e0Sak', '2015-10-27 13:10:28'),
(4, 'bb5840', 'Beth', 'Bets', 'bb@gmail.com', '260875412562fb03b00dd27.62827446', '26ebxVBqeGFnQ', '2015-10-27 13:11:23'),
(5, 'heyyyburt', 'Burt', 'Wilkinson', 'heyyy@yahoo.com', '572322840562fb061982cc1.34052342', '57pK2EK2Kjgos', '2015-10-27 13:12:01'),
(6, 'linkedin', 'Alexandra', 'Smith', 'alexsmith@uncc.edu', '1030370781562fb094398e57.08280381', '10xCP/g3c1sQc', '2015-10-27 13:12:52');
