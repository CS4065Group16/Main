-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Mar 03, 2017 at 11:11 PM
-- Server version: 10.1.19-MariaDB
-- PHP Version: 5.6.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `playitbypeer`
--

-- --------------------------------------------------------

--
-- Table structure for table `tags`
--

CREATE TABLE `tags` (
  `tag_id` int(11) NOT NULL,
  `tag` varchar(32) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tags`
--

INSERT INTO `tags` (`tag_id`, `tag`) VALUES
(1, 'Literature'),
(2, 'Theatre'),
(3, 'Poetry'),
(4, 'Linguistics'),
(5, 'Biology'),
(6, 'Chemisty'),
(7, 'Physics'),
(8, 'Astronomy'),
(9, 'Accounting'),
(10, 'Management'),
(11, 'Marketing'),
(12, 'Finance'),
(13, 'Software Testing'),
(14, 'Web Design'),
(15, 'Programming'),
(16, 'Databases'),
(17, 'Traditional'),
(18, 'History'),
(19, 'Classical'),
(20, 'Irish');

-- --------------------------------------------------------

--
-- Table structure for table `task`
--

CREATE TABLE `task` (
  `task_id` varchar(32) NOT NULL,
  `creator_id` int(11) DEFAULT NULL,
  `claim_id` int(11) DEFAULT NULL,
  `task_title` varchar(32) DEFAULT NULL,
  `task_type` varchar(32) DEFAULT NULL,
  `task_desc` varchar(32) DEFAULT NULL,
  `task_subject` varchar(32) DEFAULT NULL,
  `page_count` int(11) DEFAULT NULL,
  `word_count` int(11) DEFAULT NULL,
  `file_format` varchar(5) DEFAULT NULL,
  `claim_deadline` date DEFAULT NULL,
  `submission_deadline` date DEFAULT NULL,
  `flagged_status` varchar(32) DEFAULT NULL,
  `task_tags` varchar(32) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `task`
--

INSERT INTO `task` (`task_id`, `creator_id`, `claim_id`, `task_title`, `task_type`, `task_desc`, `task_subject`, `page_count`, `word_count`, `file_format`, `claim_deadline`, `submission_deadline`, `flagged_status`, `task_tags`) VALUES
('0164158758', NULL, NULL, 'Web Design in 21st Century', 'MSc Thesis', 'Revision', 'Computer Science', 6, 79658, '.tex', '2016-04-01', '2017-12-20', '0', 'Web Design'),
('0465045820', NULL, NULL, 'HTML Overview', 'Project Report', 'Syntax Check', 'Computer Science', 458, 74010, '.docx', '2016-04-06', '2017-08-07', '0', 'Web Design'),
('0611204487', NULL, NULL, 'Java Review', 'Conference Research Paper', 'Proofreading', 'Computer Science', 156, 4615, '.doc', '2017-04-14', '2016-09-16', '0', 'Programming'),
('0664128106', NULL, NULL, 'Othello', 'Conference Research Paper', 'Review', 'English', 199, 31818, '.doc', '2016-10-07', '2017-10-15', '0', 'Theatre'),
('0799614459', NULL, NULL, 'Donne', 'MSc Thesis', 'Proofreading', 'English', 146, 13097, '.sxw', '2016-04-05', '2017-06-27', '0', 'Poetry'),
('0941291553', NULL, NULL, 'Web Design Worldwide', 'BSc Dissertation Paper', 'Revision', 'Computer Science', 261, 4525, '.sxw', '2016-11-06', '2017-01-20', '0', 'Web Design'),
('10148024410', NULL, NULL, 'Wordsworth', 'MSc Thesis', 'Syntax Check', 'English', 239, 12963, '.tex', '2016-11-01', '2016-08-08', '0', 'Poetry'),
('1059875756', NULL, NULL, 'Decline of Irish Music', 'Project Report', 'Proofreading', 'Music', 500, 83420, '.doc', '2016-06-30', '2018-02-22', '0', 'Irish'),
('1077427425', NULL, NULL, 'Marketing Mistakes', 'BSc Dissertation Paper', 'Review', 'Business', 434, 19234, '.docx', '2017-04-20', '2017-06-22', '0', 'Marketing'),
('1128816075', NULL, NULL, 'Electricity and Physics', 'Project Report', 'Syntax Check', 'Science', 387, 22470, '.doc', '2016-09-30', '2017-08-07', '0', 'Physics'),
('1312108134', NULL, NULL, 'Bug Reports Overview', 'PhD Thesis', 'Proofreading', 'Computer Science', 117, 33696, '.doc', '2017-04-02', '2017-01-30', '0', 'Software Testing'),
('1481031058', NULL, NULL, 'Trad Music in Australia', 'Conference Research Paper', 'Proofreading', 'Music', 198, 29689, '.pdf', '2017-01-31', '2017-05-09', '0', 'Traditional'),
('1524980579', NULL, NULL, 'Inorganic Chemistry', 'Project Report', 'Proofreading', 'Science', 4, 42089, '.docx', '2017-03-19', '2018-01-04', '0', 'Chemistry'),
('17204614910', NULL, NULL, 'Intermediate Accounting', 'MSc Thesis', 'Review', 'Business', 225, 44329, '.docx', '2017-07-09', '2017-01-04', '0', 'Accounting'),
('1725276933', NULL, NULL, 'Chemisty in 21st Century', 'Project Report', 'Revision', 'Science', 1, 53964, '.tex', '2016-12-12', '2017-12-04', '0', 'Chemistry'),
('1780926480', NULL, NULL, 'Retail Management', 'Assignment', 'Review', 'Business', 46, 40923, '.sxw', '2016-05-11', '2017-04-06', '0', 'Management'),
('1939681626', NULL, NULL, 'Digital Marketing', 'PhD Thesis', 'Revision', 'Business', 471, 44308, '.pdf', '2016-08-13', '2017-08-05', '0', 'Marketing'),
('2035585236', NULL, NULL, 'Optics in Physics', 'BSc Dissertation Paper', 'Review', 'Science', 435, 8772, '.sxw', '2016-07-10', '2016-12-01', '0', 'Physics'),
('2097949967', NULL, NULL, 'IDE Then and Now', 'BSc Dissertation Paper', 'Revision', 'Computer Science', 209, 57418, '.tex', '2017-03-14', '2017-10-18', '0', 'Programming'),
('2559901021', NULL, NULL, 'Herpetology', 'Project Report', 'Syntax Check', 'Science', 153, 27158, '.sxw', '2016-11-24', '2017-06-05', '0', 'Biology'),
('2670020313', NULL, NULL, 'Blake', 'BSc Dissertation Paper', 'Syntax Check', 'English', 175, 65886, '.doc', '2017-03-05', '2018-01-05', '0', 'Poetry'),
('2857892470', NULL, NULL, 'Charles Dickens', 'MSc Thesis', 'Review', 'English', 228, 41147, '.pdf', '2017-01-13', '2018-03-18', '0', 'Literature'),
('30749087010', NULL, NULL, 'Profit Management', 'MSc Thesis', 'Proofreading', 'Business', 343, 91488, '.docx', '2017-05-31', '2017-06-11', '0', 'Management'),
('3305403586', NULL, NULL, 'Best Practices in Marketing', 'PhD Thesis', 'Revision', 'Business', 6, 67112, '.pdf', '2016-09-11', '2017-01-08', '0', 'Marketing'),
('3398849148', NULL, NULL, 'PHP and SQL Assignment', 'Assignment', 'Syntax Check', 'Computer Science', 143, 21748, '.pdf', '2016-10-04', '2017-10-17', '0', 'Databases'),
('3429043611', NULL, NULL, 'Keats', 'Assignment', 'Review', 'English', 438, 8392, '.doc', '2017-01-19', '2017-11-02', '0', 'Poetry'),
('3643641877', NULL, NULL, 'Irish Musicians Abroad', 'Conference Research Paper', 'Syntax Check', 'Music', 124, 51500, '.tex', '2016-11-17', '2016-11-21', '0', 'Irish'),
('37943789210', NULL, NULL, 'Mammalogy', 'BSc Dissertation Paper', 'Revision', 'Science', 158, 88960, '.sxw', '2017-06-05', '2018-05-07', '0', 'Biology'),
('3813665534', NULL, NULL, 'Zoology', 'Assignment', 'Revision', 'Science', 230, 57167, '.doc', '2016-08-11', '2017-09-25', '0', 'Biology'),
('3818272972', NULL, NULL, 'Chaucer', 'Project Report', 'Review', 'English', 413, 8785, '.doc', '2016-11-21', '2017-10-14', '0', 'Literature'),
('38475989710', NULL, NULL, 'Physics in Real Life', 'MSc Thesis', 'Proofreading', 'Science', 58, 13857, '.docx', '2016-06-11', '2016-10-23', '0', 'Physics'),
('3936410631', NULL, NULL, 'Testing Preparation', 'Project Report', 'Syntax Check', 'Computer Science', 288, 62975, '.doc', '2017-07-28', '2017-11-23', '0', 'Software Testing'),
('3945014832', NULL, NULL, 'Wagner', 'Project Report', 'Syntax Check', 'Music', 357, 17044, '.doc', '2016-08-26', '2017-06-09', '0', 'Classical'),
('3954555891', NULL, NULL, 'History of Music Therapy', 'MSc Thesis', 'Proofreading', 'Music', 495, 37230, '.tex', '2016-11-25', '2017-05-09', '0', 'History'),
('4088669452', NULL, NULL, 'The Future of Irish Music in Eur', 'BSc Dissertation Paper', 'Proofreading', 'Music', 191, 90679, '.tex', '2016-07-21', '2017-12-22', '0', 'Irish'),
('4201104109', NULL, NULL, 'Crucial Testing Practices', 'Conference Research Paper', 'Proofreading', 'Computer Science', 154, 21161, '.sxw', '2017-06-29', '2017-03-01', '0', 'Software Testing'),
('4380742253', NULL, NULL, 'Music Culture in 2000', 'Assignment', 'Revision', 'Music', 92, 84488, '.tex', '2016-08-26', '2016-08-08', '0', 'History'),
('4837299407', NULL, NULL, 'Classical Irish Music in Rural I', 'PhD Thesis', 'Proofreading', 'Music', 313, 9817, '.sxw', '2016-08-17', '2017-09-18', '0', 'Irish'),
('4992645968', NULL, NULL, 'Trad Music in New York', 'Conference Research Paper', 'Syntax Check', 'Music', 343, 18591, '.docx', '2017-04-08', '2017-12-04', '0', 'Traditional'),
('5065727570', NULL, NULL, 'Schumann', 'BSc Dissertation Paper', 'Revision', 'Music', 8, 756, '.tex', '2017-02-28', '2017-07-14', '0', 'Classical'),
('5208691175', NULL, NULL, 'Bad Management', 'Project Report', 'Review', 'Business', 105, 35244, '.docx', '2016-12-05', '2017-02-01', '0', 'Management'),
('5234011437', NULL, NULL, 'Management Practices', 'MSc Thesis', 'Review', 'Business', 258, 31820, '.tex', '2016-06-21', '2018-01-19', '0', 'Management'),
('5290317910', NULL, NULL, 'Hamlet', 'BSc Dissertation Paper', 'Syntax Check', 'English', 174, 10750, '.tex', '2016-11-17', '2017-03-02', '0', 'Theatre'),
('5365658906', NULL, NULL, 'Syntax in English Linguistcs', 'MSc Thesis', 'Syntax Check', 'English', 228, 15599, '.doc', '2017-05-16', '2017-02-23', '0', 'Linguistics'),
('5480635026', NULL, NULL, 'Mechanics', 'BSc Dissertation Paper', 'Revision', 'Science', 226, 16946, '.sxw', '2016-07-24', '2016-08-05', '0', 'Physics'),
('5576963393', NULL, NULL, 'Morphology', 'PhD Thesis', 'Syntax Check', 'English', 371, 46144, '.docx', '2016-05-18', '2018-01-16', '0', 'Linguistics'),
('5693700593', NULL, NULL, 'Finance and Business', 'Conference Research Paper', 'Proofreading', 'Business', 121, 18510, '.pdf', '2017-01-17', '2016-09-13', '0', 'Finance'),
('5917341672', NULL, NULL, 'American Finance in 2017', 'PhD Thesis', 'Proofreading', 'Business', 193, 70464, '.doc', '2017-02-03', '2018-03-04', '0', 'Finance'),
('5920769270', NULL, NULL, 'Business Marketing', 'Project Report', 'Syntax Check', 'Business', 476, 40776, '.docx', '2016-07-03', '2016-10-27', '0', 'Marketing'),
('5922583220', NULL, NULL, 'Bugzilla', 'Conference Research Paper', 'Syntax Check', 'Computer Science', 351, 67648, '.doc', '2016-11-24', '2016-09-06', '0', 'Software Testing'),
('6194339764', NULL, NULL, 'The Evolution of Programming', 'BSc Dissertation Paper', 'Syntax Check', 'Computer Science', 240, 48036, '.docx', '2017-01-25', '2018-01-20', '0', 'Programming'),
('6373341631', NULL, NULL, 'Death of a Salesman', 'Project Report', 'Syntax Check', 'English', 275, 35463, '.docx', '2017-02-02', '2017-05-29', '0', 'Theatre'),
('6666066820', NULL, NULL, 'Semantics', 'Project Report', 'Revision', 'English', 481, 26582, '.pdf', '2017-06-28', '2017-09-04', '0', 'Linguistics'),
('6669534280', NULL, NULL, 'Web Design for a new era', 'PhD Thesis', 'Syntax Check', 'Computer Science', 3, 64536, '.docx', '2017-07-28', '2016-08-30', '0', 'Web Design'),
('6849680269', NULL, NULL, 'The Downfall of the Celtic Tiger', 'MSc Thesis', 'Proofreading', 'Business', 89, 80179, '.doc', '2016-04-10', '2017-06-08', '0', 'Finance'),
('7140108676', NULL, NULL, 'Programming Problems', 'Conference Research Paper', 'Proofreading', 'Computer Science', 156, 46373, '.tex', '2016-03-22', '2017-11-22', '0', 'Programming'),
('7454298540', NULL, NULL, 'Trad Music in Canada', 'Conference Research Paper', 'Syntax Check', 'Music', 436, 81213, '.tex', '2016-12-28', '2017-03-14', '0', 'Traditional'),
('7655805407', NULL, NULL, 'Accounting Best Practice', 'Project Report', 'Revision', 'Business', 144, 41980, '.pdf', '2016-04-21', '2016-08-27', '0', 'Accounting'),
('7751466790', NULL, NULL, 'Database Management', 'Conference Research Paper', 'Review', 'Computer Science', 375, 48771, '.docx', '2016-08-05', '2016-11-08', '0', 'Databases'),
('7759607156', NULL, NULL, 'Biochemistry', 'PhD Thesis', 'Review', 'Science', 261, 67706, '.pdf', '2017-04-26', '2016-11-30', '0', 'Chemisty'),
('7854567603', NULL, NULL, 'Technology in Space', 'PhD Thesis', 'Review', 'Science', 122, 49066, '.doc', '2017-07-18', '2018-03-24', '0', 'Astronomy'),
('7872098873', NULL, NULL, 'Database Errors', 'Assignment', 'Syntax Check', 'Computer Science', 412, 58593, '.sxw', '2016-10-14', '2017-11-15', '0', 'Databases'),
('8094412518', NULL, NULL, 'Phonetics', 'BSc Dissertation Paper', 'Proofreading', 'English', 344, 66687, '.doc', '2017-04-23', '2017-07-25', '0', 'Linguistics'),
('8396495483', NULL, NULL, 'Shakespeare', 'MSc Thesis', 'Proofreading', 'English', 453, 35274, '.docx', '2017-03-13', '2016-10-02', '0', 'Literature'),
('8486908817', NULL, NULL, 'Bach', 'Project Report', 'Revision', 'Music', 10, 73471, '.docx', '2016-10-17', '2017-01-04', '0', 'Classical'),
('8492382058', NULL, NULL, 'MySQL Report', 'Project Report', 'Review', 'Computer Science', 324, 89304, '.sxw', '2017-02-23', '2016-08-23', '0', 'Databases'),
('8711309512', NULL, NULL, 'Trad Music in Boston', 'MSc Thesis', 'Syntax Check', 'Music', 441, 69834, '.docx', '2016-07-02', '2018-05-24', '0', 'Traditional'),
('8862514638', NULL, NULL, 'Music Culture in 1990', 'Assignment', 'Review', 'Music', 234, 88180, '.pdf', '2017-04-15', '2016-09-24', '0', 'History'),
('9066243155', NULL, NULL, 'Jane Austen', 'Conference Research Paper', 'Revision', 'English', 146, 88803, '.sxw', '2017-07-29', '2017-02-28', '0', 'Literature'),
('9070030667', NULL, NULL, 'King Lear', 'BSc Dissertation Paper', 'Review', 'English', 315, 82282, '.pdf', '2017-06-05', '2017-01-29', '0', 'Theatre'),
('9130657032', NULL, NULL, 'NASA in 2017', 'Assignment', 'Proofreading', 'Science', 282, 69529, '.pdf', '2017-02-17', '2018-03-21', '0', 'Astronomy'),
('9181916817', NULL, NULL, 'Mozart', 'MSc Thesis', 'Proofreading', 'Music', 176, 50463, '.tex', '2017-02-14', '2017-12-30', '0', 'Classical'),
('9280262165', NULL, NULL, 'Advanced Accounting', 'MSc Thesis', 'Proofreading', 'Business', 93, 45918, '.sxw', '2016-11-17', '2016-12-30', '0', 'Accounting'),
('9352279867', NULL, NULL, 'Organisms', 'Conference Research Paper', 'Revision', 'Science', 46, 73525, '.sxw', '2017-07-21', '2018-05-29', '0', 'Chemisty'),
('9501213323', NULL, NULL, 'Space Exploration', 'PhD Thesis', 'Review', 'Science', 181, 56148, '.tex', '2016-11-05', '2018-05-18', '0', 'Astronomy'),
('9546140856', NULL, NULL, 'Astronomy in Today’s World', 'MSc Thesis', 'Review', 'Science', 313, 63405, '.sxw', '2017-02-25', '2018-03-25', '0', 'Astronomy'),
('9547415557', NULL, NULL, 'Ethology', 'BSc Dissertation Paper', 'Proofreading', 'Science', 103, 81735, '.docx', '2016-06-01', '2018-03-28', '0', 'Biology'),
('9563854063', NULL, NULL, 'Basic Accounting', 'Assignment', 'Proofreading', 'Business', 332, 68261, '.tex', '2016-09-02', '2016-09-25', '0', 'Accounting'),
('9650404546', NULL, NULL, 'History of Music in Australia', 'MSc Thesis', 'Review', 'Music', 85, 84004, '.tex', '2017-04-15', '2017-05-28', '0', 'History'),
('9965729646', NULL, NULL, 'Stock Report', 'Assignment', 'Revision', 'Business', 64, 19019, '.doc', '2017-05-08', '2018-02-10', '0', 'Finance');

-- --------------------------------------------------------

--asf
-- Table structure for table `task_tags`
--

CREATE TABLE `task_tags` (
  `task_id_fk` varchar(32) NOT NULL,
  `tag_id_fk` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `user_id` int(11) NOT NULL,
  `first_name` varchar(32) DEFAULT NULL,
  `last_name` varchar(32) DEFAULT NULL,
  `user_email` varchar(32) DEFAULT NULL,
  `user_subject` varchar(32) DEFAULT NULL,
  `user_rep` int(11) DEFAULT NULL,
  `promote_to_mod` varchar(32) DEFAULT NULL,
  `user_tags` varchar(32) DEFAULT NULL,
  `password` varchar(32) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`user_id`, `first_name`, `last_name`, `user_email`, `user_subject`, `user_rep`, `promote_to_mod`, `user_tags`, `password`) VALUES
(1, 'Rachel', 'Sullivan', 'rsullivan0@about.com', 'English', 30, '0', 'Literature', 'w2cQMjUv'),
(2, 'Timothy', 'Green', 'tgreen1@illinois.edu', 'English', 17, '0', 'Theatre', 'ZFi3bX8J3aVb'),
(3, 'Diana', 'Walker', 'dwalker2@unc.edu', 'English', 28, '0', 'Poetry', '2MFu0FN'),
(4, 'Teresa', 'Richards', 'trichards3@cafepress.com', 'English', 29, '0', 'Linguistics', '5h4RslvOg'),
(5, 'Donald', 'White', 'dwhite4@bloomberg.com', 'Science', 12, '0', 'Biology', 'OcrQYU'),
(6, 'Daniel', 'Romero', 'dromero5@state.tx.us', 'Science', 14, '0', 'Chemistry', 'QLEGAgk7xBUB'),
(7, 'Pamela', 'Washington', 'pwashington6@washington.edu', 'Science', 19, '0', 'Physics', 'fEYVdoocLQJb'),
(8, 'Ernest', 'Martinez', 'emartinez7@ftc.gov', 'Science', 21, '0', 'Astronomy', 'csfvnoKUoX8e'),
(9, 'Mary', 'Howell', 'mhowell8@slideshare.net', 'Business', 19, '0', 'Accounting', 'xx6fKuDcDfka'),
(10, 'Wayne', 'Gibson', 'wgibson9@zimbio.com', 'Business', 15, '0', 'Management', 'Wunb7mQYoAm'),
(11, 'Timothy', 'Robertson', 'trobertsona@blogtalkradio.com', 'Business', 35, '0', 'Marketing', 'vgxRI8Uqh'),
(12, 'Jeremy', 'Moore', 'jmooreb@trellian.com', 'Business', 18, '0', 'Finance', '5YUCl4p59P2E'),
(13, 'Kathryn', 'Patterson', 'kpattersonc@hugedomains.com', 'Computer Science', 24, '0', 'Software Testing', '67AD04p89L8P'),
(14, 'Jessica', 'Chavez', 'jchavezd@examiner.com', 'Computer Science', 12, '0', 'Web Design', 'Gnxg4B4jY'),
(15, 'Gerald', 'Diaz', 'gdiaze@google.com', 'Computer Science', 14, '0', 'Programming', 'L2n4G7T'),
(16, 'Donna', 'Spencer', 'dspencerf@gizmodo.com', 'Computer Science', 18, '0', 'Databases', 'it1LE7EW6'),
(17, 'Ernest', 'Shaw', 'eshawg@wikipedia.org', 'Music', 33, '0', 'Traditional', 'XH1NlHomk64'),
(18, 'Katherine', 'Reed', 'kreedh@bigcartel.com', 'Music', 24, '0', 'History', 'PKWYozoITZfF'),
(19, 'Ernest', 'Lane', 'elanei@mit.edu', 'Music', 35, '0', 'Classical', 'qBxBlC4b'),
(20, 'Virginia', 'Miller', 'vmillerj@google.it', 'Music', 24, '0', 'Irish', 'Rix0mjt2w');

-- --------------------------------------------------------

--
-- Table structure for table `user_tags`
--

CREATE TABLE `user_tags` (
  `userid_fk` int(11) NOT NULL,
  `tagid_fk` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tags`
--
ALTER TABLE `tags`
  ADD PRIMARY KEY (`tag_id`),
  ADD KEY `tag_id` (`tag_id`);

--
-- Indexes for table `task`
--
ALTER TABLE `task`
  ADD PRIMARY KEY (`task_id`),
  ADD KEY `task_id` (`task_id`);

--
-- Indexes for table `task_tags`
--
ALTER TABLE `task_tags`
  ADD KEY `task_id_fk` (`task_id_fk`),
  ADD KEY `tag_id_fk` (`tag_id_fk`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`user_id`);

--
-- Indexes for table `user_tags`
--
ALTER TABLE `user_tags`
  ADD KEY `userid_fk` (`userid_fk`),
  ADD KEY `tagid_fk` (`tagid_fk`);

--
-- Constraints for dumped tables
--

--
-- Constraints for table `task_tags`
--
ALTER TABLE `task_tags`
  ADD CONSTRAINT `task_tags_ibfk_1` FOREIGN KEY (`task_id_fk`) REFERENCES `task` (`task_id`) ON UPDATE CASCADE,
  ADD CONSTRAINT `task_tags_ibfk_2` FOREIGN KEY (`tag_id_fk`) REFERENCES `tags` (`tag_id`) ON UPDATE CASCADE;

--
-- Constraints for table `user_tags`
--
ALTER TABLE `user_tags`
  ADD CONSTRAINT `user_tags_ibfk_1` FOREIGN KEY (`userid_fk`) REFERENCES `user` (`user_id`) ON UPDATE CASCADE,
  ADD CONSTRAINT `user_tags_ibfk_2` FOREIGN KEY (`tagid_fk`) REFERENCES `tags` (`tag_id`) ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
