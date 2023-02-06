-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 06, 2023 at 12:57 PM
-- Server version: 10.4.25-MariaDB
-- PHP Version: 8.1.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `enrollment_system`
--

-- --------------------------------------------------------

--
-- Table structure for table `prospectrus_tbl`
--

CREATE TABLE `prospectrus_tbl` (
  `id` int(11) NOT NULL,
  `strand_id` int(11) NOT NULL,
  `year_level` varchar(50) NOT NULL,
  `semester` varchar(50) NOT NULL,
  `subject` varchar(50) NOT NULL,
  `subject_title` varchar(50) NOT NULL,
  `unit` int(11) NOT NULL,
  `pre_requisit` varchar(50) NOT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `prospectrus_tbl`
--

INSERT INTO `prospectrus_tbl` (`id`, `strand_id`, `year_level`, `semester`, `subject`, `subject_title`, `unit`, `pre_requisit`, `created_at`) VALUES
(1, 2, 'Grade 11', '1st Semester', 'hmss', 'humss sub', 0, '0', '2023-02-06 19:17:47'),
(2, 3, 'Grade 11', '1st Semester', 'abm', 'abm sub', 0, '0', '2023-02-06 19:18:05'),
(3, 1, 'Grade 11', '1st Semester', 'stem', 'stem sub', 0, '0', '2023-02-06 19:18:23');

-- --------------------------------------------------------

--
-- Table structure for table `schedule_tbl`
--

CREATE TABLE `schedule_tbl` (
  `id` int(11) NOT NULL,
  `subject_id` int(11) NOT NULL,
  `section_id` int(11) NOT NULL,
  `teacher_id` varchar(50) NOT NULL,
  `monday` varchar(20) NOT NULL,
  `mon_two` varchar(20) NOT NULL,
  `tuesday` varchar(20) NOT NULL,
  `tue_two` varchar(20) NOT NULL,
  `wednesday` varchar(20) NOT NULL,
  `wed_two` varchar(20) NOT NULL,
  `thursday` varchar(20) NOT NULL,
  `thu_two` varchar(20) NOT NULL,
  `friday` varchar(20) NOT NULL,
  `fri_two` varchar(20) NOT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `schedule_tbl`
--

INSERT INTO `schedule_tbl` (`id`, `subject_id`, `section_id`, `teacher_id`, `monday`, `mon_two`, `tuesday`, `tue_two`, `wednesday`, `wed_two`, `thursday`, `thu_two`, `friday`, `fri_two`, `created_at`) VALUES
(1, 1, 1, '3', '07:23', '07:23', '07:23', '07:23', '07:23', '07:23', '19:23', '19:23', '19:23', '19:23', '2023-02-06 19:23:43'),
(2, 3, 3, '4', '11:11', '11:11', '', '', '', '', '', '', '', '', '2023-02-06 19:31:58');

-- --------------------------------------------------------

--
-- Table structure for table `school_year`
--

CREATE TABLE `school_year` (
  `id` int(11) NOT NULL,
  `year` varchar(20) NOT NULL,
  `semester` varchar(20) NOT NULL,
  `status` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `school_year`
--

INSERT INTO `school_year` (`id`, `year`, `semester`, `status`) VALUES
(1, '2022', '1st semester', 'active'),
(2, '2022', '2nd semester', 'inactive');

-- --------------------------------------------------------

--
-- Table structure for table `section_tbl`
--

CREATE TABLE `section_tbl` (
  `id` int(11) NOT NULL,
  `section` varchar(50) NOT NULL,
  `strand_id` int(11) NOT NULL,
  `year_level` varchar(50) NOT NULL,
  `date` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `section_tbl`
--

INSERT INTO `section_tbl` (`id`, `section`, `strand_id`, `year_level`, `date`) VALUES
(1, 'humss sect', 2, 'Grade 11', '2023-02-06 19:16:59'),
(2, 'abm sect', 3, 'Grade 11', '2023-02-06 19:17:10'),
(3, 'stem sect', 1, 'Grade 11', '2023-02-06 19:17:20');

-- --------------------------------------------------------

--
-- Table structure for table `strand_tbl`
--

CREATE TABLE `strand_tbl` (
  `id` int(11) NOT NULL,
  `strand` varchar(50) NOT NULL,
  `title` varchar(50) NOT NULL,
  `type` varchar(50) NOT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `strand_tbl`
--

INSERT INTO `strand_tbl` (`id`, `strand`, `title`, `type`, `created_at`) VALUES
(1, 'STEM', 'Science Technology Engineering and Mathematics', 'SHS', '2023-01-26 23:05:34'),
(2, 'HUMSS', 'Humanities and Social Science', 'SHS', '2023-01-26 23:07:05'),
(3, 'ABM', 'Accounting and Business Management', 'SHS', '2023-01-26 23:07:42');

-- --------------------------------------------------------

--
-- Table structure for table `student_grading`
--

CREATE TABLE `student_grading` (
  `id` int(11) NOT NULL,
  `lrn` varchar(13) NOT NULL,
  `subject_id` int(11) NOT NULL,
  `midterm_grade` int(11) NOT NULL,
  `final_grade` int(11) NOT NULL,
  `remark` varchar(10) NOT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `student_grading`
--

INSERT INTO `student_grading` (`id`, `lrn`, `subject_id`, `midterm_grade`, `final_grade`, `remark`, `created_at`) VALUES
(1, '110342060007', 1, 90, 90, 'Passed', '2023-02-06 19:25:14'),
(2, '110342070006', 3, 75, 75, 'Passed', '2023-02-06 19:33:14');

-- --------------------------------------------------------

--
-- Table structure for table `student_registration`
--

CREATE TABLE `student_registration` (
  `id` int(11) NOT NULL,
  `user_section` varchar(15) NOT NULL,
  `lrn` varchar(15) NOT NULL,
  `strand` varchar(15) NOT NULL,
  `year_level` varchar(15) NOT NULL,
  `year` varchar(15) NOT NULL,
  `semester` varchar(15) NOT NULL,
  `state` varchar(15) NOT NULL,
  `student_created_at` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `student_registration`
--

INSERT INTO `student_registration` (`id`, `user_section`, `lrn`, `strand`, `year_level`, `year`, `semester`, `state`, `student_created_at`) VALUES
(1, '1', '110342060007', 'HUMSS', 'Grade 11', '2022', '1st semester', 'Enrolled', '2023-02-06 19:19:51'),
(2, '3', '110342070006', 'STEM', 'Grade 11', '2022', '1st semester', 'Enrolled', '2023-02-06 19:29:30');

-- --------------------------------------------------------

--
-- Table structure for table `user_profile`
--

CREATE TABLE `user_profile` (
  `id` int(11) NOT NULL,
  `email` varchar(250) NOT NULL,
  `gender` varchar(10) NOT NULL COMMENT 'gender',
  `religion` varchar(50) NOT NULL,
  `birthday` varchar(50) NOT NULL,
  `civil_status` varchar(50) NOT NULL,
  `nationality` varchar(50) NOT NULL,
  `birthplace` varchar(100) NOT NULL,
  `street` varchar(250) NOT NULL,
  `baranggay` varchar(250) NOT NULL,
  `prov_add` varchar(250) NOT NULL,
  `contact` varchar(15) NOT NULL,
  `guardian_name` varchar(250) NOT NULL,
  `guardian_contact` varchar(250) NOT NULL,
  `guardian_address` varchar(250) NOT NULL,
  `elem_school` varchar(250) NOT NULL,
  `elem_address` varchar(250) NOT NULL,
  `elem_year` varchar(10) NOT NULL,
  `high_school` varchar(250) NOT NULL,
  `high_address` varchar(250) NOT NULL,
  `high_year` varchar(10) NOT NULL,
  `date` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user_profile`
--

INSERT INTO `user_profile` (`id`, `email`, `gender`, `religion`, `birthday`, `civil_status`, `nationality`, `birthplace`, `street`, `baranggay`, `prov_add`, `contact`, `guardian_name`, `guardian_contact`, `guardian_address`, `elem_school`, `elem_address`, `elem_year`, `high_school`, `high_address`, `high_year`, `date`) VALUES
(1, 'joseph.salavaria.cusi06@gmail.com', 'Male', 'test', '2023-02-06', 'Single', 'test', 'test', 'test', 'test', 'test', 'test', 'test', 'test', 'test', 'test', 'test', 'test', 'test', 'test', 'test', '2023-02-06 19:15:52'),
(2, 'josephcusi06@gmail.com', 'Male', 'Roman Catholic', '2023-02-06', 'Single', 'Pilipino', 'Kabilang Ilog', 'test', 'test', 'test', 'test', 'test', 'test', 'test', 'test', 'test', 'test', 'test', 'test', 'test', '2023-02-06 19:29:20');

-- --------------------------------------------------------

--
-- Table structure for table `user_tbl`
--

CREATE TABLE `user_tbl` (
  `id` int(11) NOT NULL,
  `profile_picture` varchar(50) NOT NULL,
  `lrn` varchar(20) NOT NULL,
  `lastname` varchar(250) NOT NULL,
  `firstname` varchar(250) NOT NULL,
  `middlename` varchar(250) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(250) NOT NULL,
  `token` varchar(100) NOT NULL,
  `reset_token` varchar(100) NOT NULL,
  `reset_timestamp` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `status` varchar(20) NOT NULL,
  `usertype` varchar(20) NOT NULL,
  `date` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user_tbl`
--

INSERT INTO `user_tbl` (`id`, `profile_picture`, `lrn`, `lastname`, `firstname`, `middlename`, `email`, `password`, `token`, `reset_token`, `reset_timestamp`, `status`, `usertype`, `date`) VALUES
(1, '305486311_161762336526185_708827780528089577_n.jpg', 'ADMIN001', 'admin', 'admin', 'admin', 'admin@gmail.com', '$2y$10$QME/npOIONP.fzoNQbLNoedsLcF1oR9KiCwMzpdgEJuYXH9GvmWI2', '', '', '2023-02-05 16:35:40', '', 'admin', '2023-02-06 00:35:40'),
(2, '305486311_161762336526185_708827780528089577_n.jpg', 'ADMIN002', 'admin2', 'admin2', 'admin2', 'admin2@gmail.com', '$2y$10$3I6odnqTK37aGHvAF/gjOeOjNxMpfc1fAeqhhDIunuHDrV8x0EJ2O', '', '', '2023-02-05 17:04:18', '', 'admin', '2023-02-06 00:36:33'),
(3, '305486311_161762336526185_708827780528089577_n.jpg', 'TEACHER001', 'teacher', 'teacher', 'teacher', 'teacher@gmail.com', '$2y$10$K3Kk9wGWa5ABVe8d25R/guyyo8rOUQmZmG2NJUloG4e.SdyaVPJ9a', '', '', '2023-02-05 16:41:43', '', 'teacher', '2023-02-06 00:38:07'),
(4, '305486311_161762336526185_708827780528089577_n.jpg', 'TEACHER002', 'teacher 2', 'teacher 2', 'teacher 2', 'teacher2@gmail.com', '$2y$10$MnZkIVow1zBsEyuI4z3SB.tO2.HFzOx2UFH/oGecXccUVDN5paSLq', '', '', '2023-02-05 16:43:23', '', 'teacher', '2023-02-06 00:42:30'),
(9, '305486311_161762336526185_708827780528089577_n.jpg', '110342060007', 'Cusi', 'Joseph ', 'Salavaria', 'joseph.salavaria.cusi06@gmail.com', '$2y$10$PhxMTPqs7VGp77YbrPZLKONQBP2YwbeQCRQKcSKUrblMMlrMjRhBy', 'hoZtwWNMqyCcL9P3a6XviQk0KR7bVSd2uEnzs8ADxHgGlf4e0jmFYrpTBUIO15J', '', '2023-02-06 11:16:04', 'active', 'student', '2023-02-06 19:14:11'),
(10, '305486311_161762336526185_708827780528089577_n.jpg', 'ADMIN010', 'test', 'test', 'test', 'adminadmin@gmail.com', '$2y$10$2/RsoFSImkeDQgMN0G7a3.FmPqJIZIFLHOpbpUcnV5ettOdopAEaO', '', '', '2023-02-06 11:19:04', '', 'admin', '2023-02-06 19:19:04'),
(11, 'OIP (2).jpg', '110342070006', 'Reyonda', 'Randell', 'De Silva', 'josephcusi06@gmail.com', '$2y$10$e0yNMs0xUW42Fu.ociiAOO8gqWpbooKFh1wW6uko5DoH4iiw9xziK', 'bna8GwuiCgK5lxXHUE60SA20fP7sqkctFQLhdY4oypNDVmWB9ezITjRZOJ13rMv', '', '2023-02-06 11:28:36', 'active', 'student', '2023-02-06 19:27:57');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `prospectrus_tbl`
--
ALTER TABLE `prospectrus_tbl`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `subject` (`subject`);

--
-- Indexes for table `schedule_tbl`
--
ALTER TABLE `schedule_tbl`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `subject_id` (`subject_id`);

--
-- Indexes for table `school_year`
--
ALTER TABLE `school_year`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `section_tbl`
--
ALTER TABLE `section_tbl`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `strand_tbl`
--
ALTER TABLE `strand_tbl`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `strand` (`strand`);

--
-- Indexes for table `student_grading`
--
ALTER TABLE `student_grading`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `student_registration`
--
ALTER TABLE `student_registration`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `semester` (`lrn`,`strand`,`year_level`,`semester`);

--
-- Indexes for table `user_profile`
--
ALTER TABLE `user_profile`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- Indexes for table `user_tbl`
--
ALTER TABLE `user_tbl`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`),
  ADD UNIQUE KEY `lrn` (`lrn`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `prospectrus_tbl`
--
ALTER TABLE `prospectrus_tbl`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `schedule_tbl`
--
ALTER TABLE `schedule_tbl`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `section_tbl`
--
ALTER TABLE `section_tbl`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `strand_tbl`
--
ALTER TABLE `strand_tbl`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `student_grading`
--
ALTER TABLE `student_grading`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `student_registration`
--
ALTER TABLE `student_registration`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `user_profile`
--
ALTER TABLE `user_profile`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `user_tbl`
--
ALTER TABLE `user_tbl`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
