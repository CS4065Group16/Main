-- phpMyAdmin SQL Dump
-- version 4.6.5.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 27, 2017 at 10:54 PM
-- Server version: 10.1.21-MariaDB
-- PHP Version: 5.6.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `group16`
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
(42, 68);

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
(1, 'Arts'),
(8, 'Business'),
(4, 'Education'),
(7, 'Engineering'),
(5, 'Health Sciences'),
(2, 'Humanities'),
(9, 'Other'),
(6, 'Science'),
(3, 'Social Sciences');

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

-- --------------------------------------------------------

--
-- Table structure for table `document`
--

CREATE TABLE `document` (
  `document_id` int(10) UNSIGNED NOT NULL,
  `document_loc` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

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
(1, 52, 1),
(1, 65, 1),
(2, 60, 1),
(2, 68, 1),
(2, 72, 1),
(3, 62, 1),
(3, 75, 1),
(4, 64, 1),
(4, 67, 1),
(4, 73, 1),
(4, 76, 1),
(5, 57, 1),
(5, 63, 1),
(5, 71, 1),
(6, 58, 1),
(6, 59, 1),
(6, 69, 1),
(7, 54, 1),
(7, 55, 1),
(7, 56, 1),
(7, 74, 1),
(8, 53, 1),
(8, 66, 1),
(9, 61, 1),
(9, 70, 1);

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
(1, 'Geography'),
(2, 'Computers'),
(3, 'Art'),
(4, 'English'),
(5, 'Scinece'),
(6, 'Maths'),
(7, 'Physics'),
(8, 'Chemistry'),
(9, 'Biology'),
(10, 'Medicine'),
(11, 'Astronomy'),
(12, 'Programming'),
(13, 'German'),
(14, 'French'),
(15, 'Technology'),
(16, 'Drama'),
(17, 'Languages'),
(18, 'Databases'),
(19, 'SQL'),
(20, 'PHP'),
(21, 'HTML'),
(22, 'CSS'),
(23, 'History'),
(25, 'Physical Eduatcion'),
(26, 'Physiotherapy'),
(27, 'Engineering'),
(28, 'Business'),
(29, 'General'),
(30, 'Other');

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

-- --------------------------------------------------------

--
-- Table structure for table `task_intermediate_tag`
--

CREATE TABLE `task_intermediate_tag` (
  `tag_id` int(10) UNSIGNED NOT NULL,
  `task_id` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

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
(52, 'Matt', 'Matthew', 'Riley', 16118928, 'matt@ul.ie', 80, '$2y$12$kbEdKeuTjnWJEeLsppHNZOZQ9hnU8KuvVFJ9fFuQXmAKJB1bY7kgO'),
(53, 'Neil', 'Neil', 'Timothy', 668818, 'Neil@ul.ie', 80, '$2y$12$DuwEIARH1K9yYJbZZYV3Eu8maQUSv95RkjLZBJ46FfclgiKnxnsiy'),
(54, 'Paul', 'Paul', 'McCarthy', 16137604, 'Paul@ul.ie', 80, '$2y$12$oixkXQcfSCgT1g.HTYHOd.PEa7.jKfdljcqVsaeUNjzKAP9iKjioC'),
(55, 'Rich', 'Richard', 'O\'Connell', 10004172, 'Rich@ul.ie', 80, '$2y$12$nlHkxDtLas.sZhXwT2euM.jZCt5a0rlM1pNFEaujLNRVxwfmBv7xe'),
(56, 'bart', 'Bart', 'Simpson', 123456, 'bart@ul.ie', 0, '$2y$12$TtDEOdlH5xaZ1ZGLC5GDs.z/0wXOZHkN5X7L.dTsel11W36Fg1mhq'),
(57, 'Lisa', 'Lisa', 'Simpson', 123432, 'lisa@ul.ie', 0, '$2y$12$d0/dEZy1lK7ecEcpuH.9Kel991L8JzIvb4JI7kEbZ/yIYJQh9OCPC'),
(58, 'Maggie', 'Maggie', 'Simpson', 234321, 'maggie@ul.ie', 0, '$2y$12$GoRiF2K8hNV0dSCLfIYNI.GRTW93AhWvCwhdp5AiCCjW22wyKi7Ku'),
(59, 'Homer', 'Homer', 'Simpson', 3456544, 'homer@ul.ie', 0, '$2y$12$ffqHNW.knDhAEgxeObmE9OV9oRW96ntotHjGI9ZvylUsTj3aNbRH2'),
(60, 'Marge', 'Marge', 'Simpson', 2343212, 'marge@ul.ie', 0, '$2y$12$SzI/x9BMRadaD3wGrhb4gerO9dNky8xePoSrc6HCscn1For3cGMJy'),
(61, 'Barny', 'Barny', 'Gumble', 3421232, 'barny@ul.ie', 0, '$2y$12$1hOQlM9mHHwj83xdqFXxF.RAJ1qfC8NpouJqHN/prHHrNmLjsrNQa'),
(62, 'Peter', 'Peter', 'Griffin', 453524, 'peter@ul.ie', 0, '$2y$12$L3QaU0nx6GdnH9iS/6Ky.eKGnvYDvwAakARJywMuBuubm6kWkPfsC'),
(63, 'Louis', 'Louis', 'Griffin', 654343, 'louis@ul.ie', 0, '$2y$12$VJlrDOosjx1rPJMOmsGZj.QIcdXe7qDeeISopqCBTEFo0xrQ47HTm'),
(64, 'Chris', 'Chris', 'Griffin', 423142, 'chris@ul.ie', 0, '$2y$12$W8I5t5Q2V6T3Juy0H0b9S.jIsCPXTkJeOip3iqOb2YQze4qb14qIq'),
(65, 'Meg', 'Meg', 'Griffin', 324123, 'meg@ul.ie', 0, '$2y$12$LAKSmJUL4V1bW9h9ntB0.ukIFmOY8/XEjjQfTEJhX7iwpnMDWfg.K'),
(66, 'Stewie', 'Stewie', 'Griffin', 334251, 'stewie@ul.ie', 0, '$2y$12$pZlKQkIwJZNvYEHjLu17VekqolYG4AGyiD3PB9ZdMxWEmK8OIEBrq'),
(67, 'Brian', 'Brian', 'Griffin', 554325, 'brian@ul.ie', 0, '$2y$12$zl.dOHR9yD/uN6O5KYFOUOPY2mJPuc.h1ggLtIK5mvp.MgbQEFrvm'),
(68, 'Banned', 'Banned', 'User', 123666, 'banned@ul.ie', 0, '$2y$12$HvnioPrFovxV2Z1RXoeZJeHTJMceWiaPqInonIK0IL7FsT8kPvADW'),
(69, 'Trumpy', 'Donald', 'Trump', 325342, 'donald@ul.ie', 0, '$2y$12$BLuoq56TxdZ6fcTsw9xws.eXAPSxsSnVsEsalvLHkSnL.PZsPUBru'),
(70, 'Queen', 'Elizabeth', 'Windsor', 5434522, 'elizabeth@ul.ie', 0, '$2y$12$JZW0O2vZUaeLsY3DFB4HBe5zHr0ot4qfTUQwB0DAqGRVHMMv7w42W'),
(71, 'Niamh', 'Niamh', 'Herlihy', 342541, 'Niamh@ul.ie', 0, '$2y$12$7t5N2VVsMH6MG1U.bY9bD.kMsF4df9W6eiCaxKfEMZK5tjGFQxrry'),
(72, 'Fionn', 'Fionn', 'Smith', 352425, 'fionn@ul.ie', 0, '$2y$12$/H3OuohNlM27nu0mOcDEae4ekarY1a7O52dFDVRUr.w7MEvaedoVy'),
(73, 'anne', 'anne', 'odonoghue', 3524352, 'anne.o.d@ul.ie', 0, '$2y$12$Jb8MlJ3PKWKNMyDVx9qOgONEtAfNSg4odrokk1z/Y/rO5Xz8j4nse'),
(74, 'Mick', 'Michael', 'O\'Flynn', 234342, 'mick.oflynn@ul.ie', 0, '$2y$12$9IMj5AlbYhcn6LD2WAZW8enCC9DkIcjSCA6tCupqoPVXFa9Pj6IFi'),
(75, 'Eefa', 'Aoife', 'Herlihy', 5341532, 'aoife.herlihy@ul.ie', 0, '$2y$12$wzTUVy9iEhgFhh47F6qn8OIcWccNwObCjQtva0Yqyj0sDccyj32sO'),
(76, 'clown', 'Krusty', 'Theclown', 321221, 'krusty.clown@ul.ie', 0, '$2y$12$vbpEWp/7dUojm/.vbWufdOHr9WxU3jdM2I/iLKy5OMgJqWSXRWqgy');

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
  MODIFY `banned_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=43;
--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `category_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
--
-- AUTO_INCREMENT for table `claimed_tasks`
--
ALTER TABLE `claimed_tasks`
  MODIFY `claimed_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=50;
--
-- AUTO_INCREMENT for table `document`
--
ALTER TABLE `document`
  MODIFY `document_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=156;
--
-- AUTO_INCREMENT for table `flagged_task`
--
ALTER TABLE `flagged_task`
  MODIFY `flag_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `personalised_stream`
--
ALTER TABLE `personalised_stream`
  MODIFY `category_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
--
-- AUTO_INCREMENT for table `tags`
--
ALTER TABLE `tags`
  MODIFY `tag_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;
--
-- AUTO_INCREMENT for table `tasks`
--
ALTER TABLE `tasks`
  MODIFY `task_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=194;
--
-- AUTO_INCREMENT for table `task_status`
--
ALTER TABLE `task_status`
  MODIFY `status_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=77;
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
