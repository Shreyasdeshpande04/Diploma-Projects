-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 04, 2022 at 07:18 AM
-- Server version: 10.4.22-MariaDB
-- PHP Version: 7.4.27

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `soes`
--

-- --------------------------------------------------------

--
-- Table structure for table `class_soes`
--

CREATE TABLE `class_soes` (
  `class_id` int(11) NOT NULL,
  `class_name` varchar(250) COLLATE utf8_unicode_ci NOT NULL,
  `class_code` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `class_status` enum('Enable','Disable') COLLATE utf8_unicode_ci NOT NULL,
  `class_created_on` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `class_soes`
--

INSERT INTO `class_soes` (`class_id`, `class_name`, `class_code`, `class_status`, `class_created_on`) VALUES
(1, 'CM6I', 'e98886d65108358c66110e44fc7632cb', 'Enable', '2022-05-01 10:56:33'),
(2, 'CM5I', '00162103ec0c47fc6e0f3e3937258b44', 'Enable', '2022-05-02 22:29:01'),
(3, 'CM2I', 'cb69e61d71da2503732ad79605d9b849', 'Enable', '2022-05-03 11:52:41');

-- --------------------------------------------------------

--
-- Table structure for table `exam_soes`
--

CREATE TABLE `exam_soes` (
  `exam_id` int(11) NOT NULL,
  `exam_title` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `exam_class_id` int(11) NOT NULL,
  `exam_duration` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  `exam_status` enum('Pending','Created','Started','Completed') COLLATE utf8_unicode_ci NOT NULL,
  `exam_created_on` datetime NOT NULL,
  `exam_code` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `exam_result_datetime` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `exam_soes`
--

INSERT INTO `exam_soes` (`exam_id`, `exam_title`, `exam_class_id`, `exam_duration`, `exam_status`, `exam_created_on`, `exam_code`, `exam_result_datetime`) VALUES
(1, 'asd', 1, '5', 'Completed', '2022-05-01 10:59:10', '87b4fcb4d20256aef0a40b2b586903cc', '2022-05-03 12:00:00'),
(2, 'UT1', 1, '5', 'Completed', '2022-05-03 11:56:32', 'b537a4dea0e422198de5d28378c1a6c4', '2022-05-03 12:00:00'),
(3, 'UT2', 1, '5', 'Pending', '2022-05-03 14:44:32', '3c3677c54abfe15f327a36d74f9892b4', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `exam_subject_question_answer`
--

CREATE TABLE `exam_subject_question_answer` (
  `answer_id` int(11) NOT NULL,
  `student_id` int(11) NOT NULL,
  `exam_subject_question_id` int(11) NOT NULL,
  `student_answer_option` enum('0','1','2','3','4') COLLATE utf8_unicode_ci NOT NULL,
  `marks` varchar(20) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `exam_subject_question_answer`
--

INSERT INTO `exam_subject_question_answer` (`answer_id`, `student_id`, `exam_subject_question_id`, `student_answer_option`, `marks`) VALUES
(1, 2, 1, '1', '+2'),
(2, 2, 2, '1', '+2'),
(3, 3, 3, '3', '+1'),
(4, 3, 4, '1', '-1');

-- --------------------------------------------------------

--
-- Table structure for table `exam_subject_question_soes`
--

CREATE TABLE `exam_subject_question_soes` (
  `exam_subject_question_id` int(11) NOT NULL,
  `exam_id` int(11) NOT NULL,
  `exam_subject_id` int(11) NOT NULL,
  `exam_subject_question_title` text COLLATE utf8_unicode_ci NOT NULL,
  `exam_subject_question_answer` enum('1','2','3','4') COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `exam_subject_question_soes`
--

INSERT INTO `exam_subject_question_soes` (`exam_subject_question_id`, `exam_id`, `exam_subject_id`, `exam_subject_question_title`, `exam_subject_question_answer`) VALUES
(1, 1, 10, 'asdasd', '1'),
(2, 1, 10, 'asd', '1'),
(3, 2, 11, 'what is PHP', '3'),
(4, 2, 11, 'asdasd', '3');

-- --------------------------------------------------------

--
-- Table structure for table `question_option_soes`
--

CREATE TABLE `question_option_soes` (
  `question_option_id` int(11) NOT NULL,
  `exam_subject_question_id` int(11) NOT NULL,
  `question_option_number` int(1) NOT NULL,
  `question_option_title` text COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `question_option_soes`
--

INSERT INTO `question_option_soes` (`question_option_id`, `exam_subject_question_id`, `question_option_number`, `question_option_title`) VALUES
(1, 1, 1, 'a'),
(2, 1, 2, 'b'),
(3, 1, 3, 'c'),
(4, 1, 4, 'd'),
(5, 2, 1, 'asd'),
(6, 2, 2, 'daa'),
(7, 2, 3, 'dasd'),
(8, 2, 4, 'asd'),
(9, 3, 1, 'aasd'),
(10, 3, 2, 'dsa'),
(11, 3, 3, 'php'),
(12, 3, 4, 'asd'),
(13, 4, 1, 'd'),
(14, 4, 2, 's'),
(15, 4, 3, 'a'),
(16, 4, 4, 's');

-- --------------------------------------------------------

--
-- Table structure for table `student_soes`
--

CREATE TABLE `student_soes` (
  `student_id` int(11) NOT NULL,
  `student_name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `student_address` tinytext COLLATE utf8_unicode_ci NOT NULL,
  `student_email_id` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `student_password` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `student_gender` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  `student_dob` date NOT NULL,
  `student_image` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `student_status` enum('Enable','Disable') COLLATE utf8_unicode_ci NOT NULL,
  `student_email_verification_code` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `student_email_verified` enum('No','Yes') COLLATE utf8_unicode_ci NOT NULL,
  `student_added_by` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `student_added_on` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `student_soes`
--

INSERT INTO `student_soes` (`student_id`, `student_name`, `student_address`, `student_email_id`, `student_password`, `student_gender`, `student_dob`, `student_image`, `student_status`, `student_email_verification_code`, `student_email_verified`, `student_added_by`, `student_added_on`) VALUES
(1, 'adsads', 'asdasd', 'asdasd@gmail.com', 'asdasd', 'Male', '2022-06-21', '../images/1715768172.PNG', 'Enable', '42cbec3625fbbd918e99ff9e3058ec64', 'Yes', 'Master', '2022-05-01 11:06:02'),
(2, 'Ramakant', 'asdsad', 'ramakanttati29@gmail.com', 'asdasd', 'Male', '2022-05-08', '../images/672141071.PNG', 'Enable', 'e1cb807a45d292b9ee67dd5d2975f47a', 'Yes', 'Master', '2022-05-01 12:19:43'),
(3, 'Rahul Durgam', 'c1190 m group sagar chowk', 'rahul@gmail.com', 'asddsa', 'Male', '2003-04-30', '../images/1958707.png', 'Enable', '', 'Yes', 'Master', '2022-05-02 23:46:01');

-- --------------------------------------------------------

--
-- Table structure for table `student_to_class_soes`
--

CREATE TABLE `student_to_class_soes` (
  `student_to_class_id` int(11) NOT NULL,
  `class_id` int(11) NOT NULL,
  `student_id` int(11) NOT NULL,
  `student_roll_no` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  `added_on` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `student_to_class_soes`
--

INSERT INTO `student_to_class_soes` (`student_to_class_id`, `class_id`, `student_id`, `student_roll_no`, `added_on`) VALUES
(2, 1, 1, '2', '2022-05-01 12:03:57'),
(3, 1, 2, '1', '2022-05-01 12:24:06'),
(4, 1, 3, '18', '2022-05-03 11:55:23');

-- --------------------------------------------------------

--
-- Table structure for table `subject_soes`
--

CREATE TABLE `subject_soes` (
  `subject_id` int(11) NOT NULL,
  `subject_name` varchar(250) COLLATE utf8_unicode_ci NOT NULL,
  `subject_status` enum('Enable','Disable') COLLATE utf8_unicode_ci NOT NULL,
  `subject_created_on` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `subject_soes`
--

INSERT INTO `subject_soes` (`subject_id`, `subject_name`, `subject_status`, `subject_created_on`) VALUES
(1, 'MAD', 'Enable', '2022-05-01 10:56:40'),
(2, 'Python', 'Enable', '2022-05-02 23:18:02'),
(3, 'PHP', 'Enable', '2022-05-03 11:53:15');

-- --------------------------------------------------------

--
-- Table structure for table `subject_to_class_soes`
--

CREATE TABLE `subject_to_class_soes` (
  `subject_to_class_id` int(11) NOT NULL,
  `class_id` int(11) NOT NULL,
  `subject_id` int(11) NOT NULL,
  `added_on` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `subject_to_class_soes`
--

INSERT INTO `subject_to_class_soes` (`subject_to_class_id`, `class_id`, `subject_id`, `added_on`) VALUES
(1, 1, 1, '2022-05-01 10:56:49'),
(2, 1, 2, '2022-05-02 23:20:21'),
(3, 1, 3, '2022-05-03 11:54:41');

-- --------------------------------------------------------

--
-- Table structure for table `subject_wise_exam_detail`
--

CREATE TABLE `subject_wise_exam_detail` (
  `exam_subject_id` int(11) NOT NULL,
  `exam_id` int(11) NOT NULL,
  `subject_id` int(11) NOT NULL,
  `subject_total_question` int(5) NOT NULL,
  `marks_per_right_answer` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  `marks_per_wrong_answer` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  `subject_exam_datetime` datetime NOT NULL,
  `subject_exam_status` enum('Pending','Started','Completed') COLLATE utf8_unicode_ci NOT NULL,
  `subject_exam_code` varchar(100) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `user_soes`
--

CREATE TABLE `user_soes` (
  `user_id` int(11) NOT NULL,
  `user_name` varchar(250) COLLATE utf8_unicode_ci NOT NULL,
  `user_contact_no` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  `user_email` varchar(250) COLLATE utf8_unicode_ci NOT NULL,
  `user_password` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `user_profile` varchar(150) COLLATE utf8_unicode_ci NOT NULL,
  `user_type` enum('Master','User') COLLATE utf8_unicode_ci NOT NULL,
  `user_status` enum('Enable','Disable') COLLATE utf8_unicode_ci NOT NULL,
  `user_created_on` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `user_soes`
--

INSERT INTO `user_soes` (`user_id`, `user_name`, `user_contact_no`, `user_email`, `user_password`, `user_profile`, `user_type`, `user_status`, `user_created_on`) VALUES
(0, 'Ram', '9123129', 'ramakanttati29@gmail.com', 'asddsa', '', 'Master', 'Enable', '2022-05-01 07:32:17'),
(1, 'ram', '2123212322', 'ramakantatati29@gmail.com', 'asdasd', '', 'Master', 'Enable', '2022-05-01 07:33:30'),
(0, 'Ramakant', '8298322123', 'ramaknattati29@gmail.com', 'asdasd', '../images/1933647549.png', 'User', 'Enable', '2022-05-03 14:50:32');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `class_soes`
--
ALTER TABLE `class_soes`
  ADD PRIMARY KEY (`class_id`);

--
-- Indexes for table `exam_soes`
--
ALTER TABLE `exam_soes`
  ADD PRIMARY KEY (`exam_id`);

--
-- Indexes for table `exam_subject_question_answer`
--
ALTER TABLE `exam_subject_question_answer`
  ADD PRIMARY KEY (`answer_id`);

--
-- Indexes for table `exam_subject_question_soes`
--
ALTER TABLE `exam_subject_question_soes`
  ADD PRIMARY KEY (`exam_subject_question_id`);

--
-- Indexes for table `question_option_soes`
--
ALTER TABLE `question_option_soes`
  ADD PRIMARY KEY (`question_option_id`);

--
-- Indexes for table `student_soes`
--
ALTER TABLE `student_soes`
  ADD PRIMARY KEY (`student_id`);

--
-- Indexes for table `student_to_class_soes`
--
ALTER TABLE `student_to_class_soes`
  ADD PRIMARY KEY (`student_to_class_id`);

--
-- Indexes for table `subject_soes`
--
ALTER TABLE `subject_soes`
  ADD PRIMARY KEY (`subject_id`);

--
-- Indexes for table `subject_to_class_soes`
--
ALTER TABLE `subject_to_class_soes`
  ADD PRIMARY KEY (`subject_to_class_id`);

--
-- Indexes for table `subject_wise_exam_detail`
--
ALTER TABLE `subject_wise_exam_detail`
  ADD PRIMARY KEY (`exam_subject_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `class_soes`
--
ALTER TABLE `class_soes`
  MODIFY `class_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `exam_soes`
--
ALTER TABLE `exam_soes`
  MODIFY `exam_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `exam_subject_question_answer`
--
ALTER TABLE `exam_subject_question_answer`
  MODIFY `answer_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `exam_subject_question_soes`
--
ALTER TABLE `exam_subject_question_soes`
  MODIFY `exam_subject_question_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `question_option_soes`
--
ALTER TABLE `question_option_soes`
  MODIFY `question_option_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `student_soes`
--
ALTER TABLE `student_soes`
  MODIFY `student_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `student_to_class_soes`
--
ALTER TABLE `student_to_class_soes`
  MODIFY `student_to_class_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `subject_soes`
--
ALTER TABLE `subject_soes`
  MODIFY `subject_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `subject_to_class_soes`
--
ALTER TABLE `subject_to_class_soes`
  MODIFY `subject_to_class_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `subject_wise_exam_detail`
--
ALTER TABLE `subject_wise_exam_detail`
  MODIFY `exam_subject_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
