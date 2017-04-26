-- phpMyAdmin SQL Dump
-- version 4.6.5.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 20, 2017 at 11:53 AM
-- Server version: 10.1.21-MariaDB
-- PHP Version: 5.6.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `play_it_by_peer_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `banned_users`
--

CREATE TABLE `banned_users` (
  `banned_id` int(10) NOT NULL,
  `user_id` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `banned_users`
--

INSERT INTO `banned_users` (`banned_id`, `user_id`) VALUES
(2, 1),
(3, 1),
(5, 1),
(6, 1),
(7, 1),
(8, 1),
(9, 1),
(22, 40),
(41, 45),
(10, 46),
(11, 46),
(14, 46),
(15, 46),
(16, 46),
(17, 46),
(18, 46),
(19, 46),
(20, 46),
(40, 46),
(12, 47),
(13, 47);

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `category_id` int(10) UNSIGNED NOT NULL,
  `category` varchar(32) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`category_id`, `category`) VALUES
(1, 'Finance'),
(2, 'Programing');

-- --------------------------------------------------------

--
-- Table structure for table `claimed_tasks`
--

CREATE TABLE `claimed_tasks` (
  `claimed_id` int(10) UNSIGNED NOT NULL,
  `task_id` int(10) UNSIGNED NOT NULL,
  `student_id` int(10) UNSIGNED NOT NULL,
  `claimed_date` date NOT NULL,
  `claimed_expiration` date NOT NULL,
  `full_file_request` text NOT NULL,
  `completion_review` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `claimed_tasks`
--

INSERT INTO `claimed_tasks` (`claimed_id`, `task_id`, `student_id`, `claimed_date`, `claimed_expiration`, `full_file_request`, `completion_review`) VALUES
(49, 186, 1, '2017-04-19', '2017-04-22', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `document`
--

CREATE TABLE `document` (
  `document_id` int(10) UNSIGNED NOT NULL,
  `document_loc` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `document`
--

INSERT INTO `document` (`document_id`, `document_loc`) VALUES
(105, 'Tutorial wk2.pdf'),
(106, 'layout1.pdf'),
(107, '20170130-0340_CS4416_-_Tutorial_1.pdf'),
(108, 'Tutorial wk3.pdf'),
(109, 'layout1.pdf'),
(110, '20170227-1806_CS4416_-_Midterm_Exam_Paper_1516_-_A (1).pdf'),
(111, '20141023-1309_CS4416_HD_-_Midterm_Exam_Paper_1415_-_A_with_answers.pdf'),
(112, '20141023-1309_CS4416_HD_-_Midterm_Exam_Paper_1415_-_B_with_answers.pdf'),
(113, '20150319-1421_CS4416_-_Midterm_Exam_Paper_1415_-_A_-_with_answers.pdf'),
(114, '20170130-0340_CS4416_-_Tutorial_1.pdf'),
(115, 'ProjectDescription2017.pdf'),
(151, 'layout1.pdf');

-- --------------------------------------------------------

--
-- Table structure for table `flagged_task`
--

CREATE TABLE `flagged_task` (
  `flag_id` int(10) UNSIGNED NOT NULL,
  `task_id` int(10) UNSIGNED NOT NULL,
  `user_id` int(10) UNSIGNED NOT NULL,
  `flag_comment` text NOT NULL,
  `flag_date` datetime NOT NULL,
  `flag_status` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `personalised_stream`
--

CREATE TABLE `personalised_stream` (
  `category_id` int(10) UNSIGNED NOT NULL,
  `user_id` int(10) UNSIGNED NOT NULL,
  `total` int(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `personalised_stream`
--

INSERT INTO `personalised_stream` (`category_id`, `user_id`, `total`) VALUES
(1, 51, 50),
(2, 51, 15);

-- --------------------------------------------------------

--
-- Table structure for table `tags`
--

CREATE TABLE `tags` (
  `tag_id` int(10) UNSIGNED NOT NULL,
  `tag` varchar(32) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tags`
--

INSERT INTO `tags` (`tag_id`, `tag`) VALUES
(1, 'geortgy'),
(2, 'Computers'),
(3, 'Art'),
(4, 'English'),
(5, 'scinece'),
(7, 'ddd');

-- --------------------------------------------------------

--
-- Table structure for table `tasks`
--

CREATE TABLE `tasks` (
  `task_id` int(10) UNSIGNED NOT NULL,
  `creator_id` int(10) UNSIGNED NOT NULL,
  `task_title` varchar(128) NOT NULL,
  `category_id` int(10) UNSIGNED NOT NULL,
  `file_id` int(10) UNSIGNED NOT NULL,
  `task_description` text,
  `word_count` int(11) NOT NULL,
  `page_count` int(11) NOT NULL,
  `file_format` varchar(32) NOT NULL,
  `created_date` date NOT NULL,
  `expiration_date` date NOT NULL,
  `status_id` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tasks`
--

INSERT INTO `tasks` (`task_id`, `creator_id`, `task_title`, `category_id`, `file_id`, `task_description`, `word_count`, `page_count`, `file_format`, `created_date`, `expiration_date`, `status_id`) VALUES
(180, 1, 'Test 10', 1, 151, 'ccccccccccccc', 900, 600, 'pdf', '2017-04-15', '2017-04-21', 2),
(184, 51, 'Test 10', 1, 151, 'ccccccccccccc', 900, 600, 'pdf', '2017-04-15', '2017-04-24', 5),
(185, 51, 'Test 10', 1, 151, 'ccccccccccccc', 900, 600, 'pdf', '2017-04-19', '2017-04-26', 5),
(186, 51, 'Test 10', 2, 151, 'ccccccccccccc', 900, 600, 'pdf', '2017-04-15', '2017-04-29', 1),
(187, 32, 'Test 10', 1, 151, 'ccccccccccccc', 900, 600, 'pdf', '2017-04-15', '2017-04-22', 1),
(188, 46, 'Test 10', 1, 151, 'ccccccccccccc', 900, 600, 'pdf', '2017-04-15', '2017-04-22', 5),
(189, 46, 'Test 10', 1, 151, 'ccccccccccccc', 900, 600, 'pdf', '2017-04-15', '2017-04-22', 5);

-- --------------------------------------------------------

--
-- Table structure for table `task_intermediate_tag`
--

CREATE TABLE `task_intermediate_tag` (
  `tag_id` int(10) UNSIGNED NOT NULL,
  `task_id` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `task_intermediate_tag`
--

INSERT INTO `task_intermediate_tag` (`tag_id`, `task_id`) VALUES
(1, 180),
(2, 180),
(5, 184),
(7, 187);

-- --------------------------------------------------------

--
-- Table structure for table `task_status`
--

CREATE TABLE `task_status` (
  `status_id` int(10) UNSIGNED NOT NULL,
  `status` varchar(32) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `task_status`
--

INSERT INTO `task_status` (`status_id`, `status`) VALUES
(1, 'open'),
(2, 'claimed'),
(3, 'approved'),
(4, 'unclaimed'),
(5, 'finished');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `user_id` int(10) UNSIGNED NOT NULL,
  `user_name` varchar(32) NOT NULL,
  `first_name` varchar(32) NOT NULL,
  `last_name` varchar(32) NOT NULL,
  `student_id` int(10) NOT NULL,
  `email` varchar(32) NOT NULL,
  `reputation` int(10) DEFAULT NULL,
  `password` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `user_name`, `first_name`, `last_name`, `student_id`, `email`, `reputation`, `password`) VALUES
(1, 'ceire', 'Neil', 'Kelly', 0, 'Gmails', 151, 'lambo1'),
(2, 'Paul', 'we', 'fwe', 0, 'fwef', 125, 'ewfew'),
(5, 'ew', 'dfeq', 'dfeqw', 0, 'ddqd', 0, 'qwdwq'),
(6, 'dwqdwq', 'dq', 'dqw', 0, 'qd', 0, 'wqd'),
(7, 'dwqdwq', 'dq', 'dqw', 0, 'qd', 0, 'wqd'),
(8, 'nfrtnhn', 'nrtn', 'rtn', 0, 'rtn', 0, 'nrtntr'),
(9, 'ewd', 'qd', 'qwd', 0, 'dqw', 0, 'dqwd'),
(10, 'dqw', 'dq', 'dqw', 0, 'qwd', 0, 'qdqw'),
(11, 'ed', 'e', 'ded', 0, 'ed', 0, 'aed'),
(31, 'Neil', 'Timothy', 'Wozere', 3, 'test@ul.ie', 0, 'lambo1'),
(32, 'james', 'Timothy', 'Wozere', 3, 'test123@ul.ie', 0, 'a'),
(33, 'David', 'hhh', 'Dd', 344, 'neiltimothy@ul.ie', 0, 'lambo1'),
(34, 'v', 'v', 'v', 0, 'vv@ul.ie', 0, 'a'),
(35, 'Neil12', 'neil', 'timoyhyu', 6, '98888@ul.ie', 0, 'd'),
(36, 'Neil13', 'neil', 'timoyhyu', 6, '9888@ul.ie', 0, 'a'),
(37, 'Neilq', 'neil', 'timoyhyu', 6, '9888d8@ul.ie', 0, 'd'),
(38, 'ceire123', 'jame', 'kelly', 12, 'neiltimoy@ul.ie', 10, 'd'),
(39, 'Neil123', 'Timopthy', 'lambo1', 2, 'neily@ul.ie', 0, '$2y$10$iusesomecrazystrings2ui1qr860E30b0c9ijNqwCSwHnHdgz.1K'),
(40, 'test1', 'neil', 'timothy', 1, 'neil@ul.ie', 0, '$2y$10$iusesomecrazystrings2u8/NUv8Ybw/EEDiqxXAUuCNHFhCwd6cC'),
(41, 'test5', 'dss', 'Dd', 0, 'neiddl@ul.ie', 0, '$2y$12$WVrvu3LDW4k8l/aYBrEra.miICTr8avnZGDG5a8dP31z6uLt7wGLO'),
(42, 'test10', 'dss', 'Derick', 0, 'neiltimoy1111@ul.ie', 0, '$2y$12$k9nhrWOnuUk87tnStV3gTeIh0E4WJGaNP.CupWHskV4.D/XFN0XRW'),
(43, 'test11', 'neil', 'timothy', 123, 'neiltim@ul.ie', 0, '$2y$12$PRzzpC0X5vp2Rxu1mmYl/uwMgPUFlI3UtXg7v0p8NuIBkduH0AI6C'),
(44, 'test13', 'neil1', 'timothy', 122, 'neilhy123@ul.ie', 0, '$2y$12$hTv3hX8I2QvqHlSjHaX47uJDeC5SqFKqehLY101pHHvSFJLSe32iO'),
(45, 'test15', 'neil', 'timothy', 122, 'neilti123@ul.ie', 138, '$2y$12$qScmmf0DSO3BipB5GCpHs.ItqYFfRjTmiOPUpNH8fwa5NIrsxgFu6'),
(46, 'test16', 'James', 'timothy', 122, 'neil timothy@ul', 370, ''),
(47, 'test18', 'neil', 'timothy', 122, 'neiothy123@ul.ie', 0, '$2y$12$ulq5pZO0vo.JjnuIDmQCU.2f7j4tL.5Ipv0XAQvLzCs2E7lztSGaK'),
(48, 'Neil5', 'jame', 'pp', 90, 'neill@ul.ie', 0, '$2y$12$XIfC0Ie7Gprl78jIlYPN.eS3FwcOSWvdIHdamTUNztuqG2RNFoXui'),
(49, 'test17', 'f', 'f', 777, 'neilsl@ul.ie', 0, '$2y$12$Old6s2WyeJ2XciZj.5NG5OQdc7gXT9SenZ26jOyjxAkzG4aYylfi.'),
(50, 'Neil1x', 'dss', 'e', 0, 'neillas@ul.ie', 0, '$2y$12$bQbzaKF2S/WrvagbaUS85OA7aAIpXB7DPcRxkUNGGS5SAYQpGsETq'),
(51, 'test00', 'test00', 'test00', 1223, 'test00@ul.ie', 45, '$2y$12$ZwCzk7z30MTltRCbtLTR.O8lhSzTmw7H76rMhs5B42Q5JeddkkS7a');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `banned_users`
--
ALTER TABLE `banned_users`
  ADD PRIMARY KEY (`banned_id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`category_id`),
  ADD KEY `category` (`category`);

--
-- Indexes for table `claimed_tasks`
--
ALTER TABLE `claimed_tasks`
  ADD PRIMARY KEY (`claimed_id`),
  ADD KEY `task_id` (`task_id`),
  ADD KEY `user_id` (`student_id`);

--
-- Indexes for table `document`
--
ALTER TABLE `document`
  ADD PRIMARY KEY (`document_id`);

--
-- Indexes for table `flagged_task`
--
ALTER TABLE `flagged_task`
  ADD PRIMARY KEY (`flag_id`),
  ADD KEY `task_id` (`task_id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `personalised_stream`
--
ALTER TABLE `personalised_stream`
  ADD PRIMARY KEY (`category_id`,`user_id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `tags`
--
ALTER TABLE `tags`
  ADD PRIMARY KEY (`tag_id`);

--
-- Indexes for table `tasks`
--
ALTER TABLE `tasks`
  ADD PRIMARY KEY (`task_id`),
  ADD KEY `file_id` (`file_id`),
  ADD KEY `category_id` (`category_id`),
  ADD KEY `task_id` (`task_id`),
  ADD KEY `creator_id` (`creator_id`),
  ADD KEY `status_id` (`status_id`);

--
-- Indexes for table `task_intermediate_tag`
--
ALTER TABLE `task_intermediate_tag`
  ADD PRIMARY KEY (`tag_id`,`task_id`),
  ADD KEY `task_id` (`task_id`);

--
-- Indexes for table `task_status`
--
ALTER TABLE `task_status`
  ADD PRIMARY KEY (`status_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `banned_users`
--
ALTER TABLE `banned_users`
  MODIFY `banned_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=42;
--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `category_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `claimed_tasks`
--
ALTER TABLE `claimed_tasks`
  MODIFY `claimed_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=50;
--
-- AUTO_INCREMENT for table `document`
--
ALTER TABLE `document`
  MODIFY `document_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=152;
--
-- AUTO_INCREMENT for table `flagged_task`
--
ALTER TABLE `flagged_task`
  MODIFY `flag_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `personalised_stream`
--
ALTER TABLE `personalised_stream`
  MODIFY `category_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `tags`
--
ALTER TABLE `tags`
  MODIFY `tag_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT for table `tasks`
--
ALTER TABLE `tasks`
  MODIFY `task_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=190;
--
-- AUTO_INCREMENT for table `task_status`
--
ALTER TABLE `task_status`
  MODIFY `status_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=52;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `banned_users`
--
ALTER TABLE `banned_users`
  ADD CONSTRAINT `banned_users_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`user_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `claimed_tasks`
--
ALTER TABLE `claimed_tasks`
  ADD CONSTRAINT `claimed_tasks_ibfk_2` FOREIGN KEY (`student_id`) REFERENCES `users` (`user_id`) ON UPDATE CASCADE,
  ADD CONSTRAINT `claimed_tasks_ibfk_3` FOREIGN KEY (`task_id`) REFERENCES `tasks` (`task_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `flagged_task`
--
ALTER TABLE `flagged_task`
  ADD CONSTRAINT `flagged_task_ibfk_3` FOREIGN KEY (`task_id`) REFERENCES `tasks` (`task_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `flagged_task_ibfk_4` FOREIGN KEY (`user_id`) REFERENCES `users` (`user_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `personalised_stream`
--
ALTER TABLE `personalised_stream`
  ADD CONSTRAINT `personalised_stream_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`user_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `personalised_stream_ibfk_2` FOREIGN KEY (`category_id`) REFERENCES `categories` (`category_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `tasks`
--
ALTER TABLE `tasks`
  ADD CONSTRAINT `tasks_ibfk_5` FOREIGN KEY (`status_id`) REFERENCES `task_status` (`status_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `tasks_ibfk_7` FOREIGN KEY (`creator_id`) REFERENCES `users` (`user_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `tasks_ibfk_8` FOREIGN KEY (`category_id`) REFERENCES `categories` (`category_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `tasks_ibfk_9` FOREIGN KEY (`file_id`) REFERENCES `document` (`document_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `task_intermediate_tag`
--
ALTER TABLE `task_intermediate_tag`
  ADD CONSTRAINT `task_intermediate_tag_ibfk_4` FOREIGN KEY (`task_id`) REFERENCES `tasks` (`task_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `task_intermediate_tag_ibfk_5` FOREIGN KEY (`tag_id`) REFERENCES `tags` (`tag_id`) ON DELETE CASCADE ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
