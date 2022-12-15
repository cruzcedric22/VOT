-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 15, 2022 at 11:15 AM
-- Server version: 10.4.20-MariaDB
-- PHP Version: 7.4.22

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `voting`
--

-- --------------------------------------------------------

--
-- Table structure for table `vot_candidates`
--

CREATE TABLE `vot_candidates` (
  `id` int(11) NOT NULL,
  `partylist_id` int(11) NOT NULL,
  `position_id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `m_initial` varchar(255) NOT NULL,
  `lname` varchar(255) NOT NULL,
  `course_id` int(11) NOT NULL,
  `photo` varchar(255) NOT NULL,
  `cand_votes` int(11) NOT NULL,
  `year_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `vot_candidates`
--

INSERT INTO `vot_candidates` (`id`, `partylist_id`, `position_id`, `name`, `m_initial`, `lname`, `course_id`, `photo`, `cand_votes`, `year_id`) VALUES
(74, 2, 3, 'daneris', '', '', 1, '636c89b28c818.jpg', 12, 12),
(75, 3, 4, 'angel', '', '', 1, '636c8a33ecc17.png', 21, 12),
(76, 1, 1, 'Vincent', '', '', 1, '638d3c5220b25.jpg', 24, 12),
(77, 1, 2, 'King', '', '', 1, '636e3b68caed8.jpg', 19, 12),
(78, 2, 2, 'Anne', '', '', 1, '636e4786708ab.png', 8, 12),
(79, 2, 3, 'Midas', '', '', 1, '636e51630087b.jpeg', 10, 12),
(80, 1, 4, 'Jordan', '', '', 1, '636e52b85f0bf.jpg', 11, 12),
(81, 1, 5, 'Kris', '', '', 1, '636e5d266b811.jpg', 19, 12),
(82, 2, 5, 'Alde', '', '', 1, '636e5d9069cd4.jpg', 9, 12),
(83, 1, 6, 'Daniel', '', '', 1, '636e5e505d92e.jpg', 17, 12),
(84, 2, 6, 'Enrique', '', '', 1, '636e5fa97221b.jpg', 11, 12),
(85, 1, 1, 'Cedri', 'D', 'Cruz', 2, '639297bf07c0f.jpg', 6, 12);

-- --------------------------------------------------------

--
-- Table structure for table `vot_cat_user`
--

CREATE TABLE `vot_cat_user` (
  `id` int(11) NOT NULL,
  `category_id` int(11) NOT NULL,
  `cat_name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `vot_cat_user`
--

INSERT INTO `vot_cat_user` (`id`, `category_id`, `cat_name`) VALUES
(1, 1, 'Voter'),
(2, 2, 'Staff'),
(3, 3, 'Admin');

-- --------------------------------------------------------

--
-- Table structure for table `vot_course`
--

CREATE TABLE `vot_course` (
  `id` int(11) NOT NULL,
  `course_id` int(11) NOT NULL,
  `course_name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `vot_course`
--

INSERT INTO `vot_course` (`id`, `course_id`, `course_name`) VALUES
(1, 1, 'BSCS'),
(2, 2, 'BSIT'),
(3, 3, 'BSEMC'),
(4, 4, 'BSIS');

-- --------------------------------------------------------

--
-- Table structure for table `vot_logs`
--

CREATE TABLE `vot_logs` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `action` varchar(255) NOT NULL,
  `added_by` varchar(255) NOT NULL,
  `time` datetime NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `vot_logs`
--

INSERT INTO `vot_logs` (`id`, `user_id`, `action`, `added_by`, `time`) VALUES
(4, 62, 'Candidate Max is edited by', 'vins123', '2022-11-25 16:29:51'),
(5, 62, 'Candidate Vincent is edited by', 'vins123', '2022-11-26 10:54:50'),
(6, 31, 'cruzcedric22 has voted', '', '2022-11-27 07:27:19'),
(7, 31, 'cruzcedric22 has voted', '', '2022-11-27 07:29:49'),
(8, 62, 'vins123 has voted', '', '2022-11-27 07:57:54'),
(9, 37, 'Candidate  is deleted by', 'cedric123', '2022-11-27 18:10:36'),
(10, 62, 'Candidate  is deleted by', 'vins123', '2022-11-27 18:35:59'),
(11, 62, 'vins123 has voted', '', '2022-12-03 23:07:56'),
(43, 64, 'maxine has voted', '', '2022-12-05 06:44:33'),
(44, 70, 'Candidate  is deleted by', 'chahca', '2022-12-05 08:17:22'),
(45, 70, 'Candidate  is deleted by', 'chahca', '2022-12-05 08:24:28'),
(46, 70, 'Candidate Vincent is edited by', 'chahca', '2022-12-05 08:28:34'),
(47, 70, 'Candidate Vincent is edited by', 'chahca', '2022-12-05 08:33:10'),
(48, 70, 'Candidate Vincent is edited by', 'chahca', '2022-12-05 08:33:22'),
(49, 70, 'Candidate Cedric is edited by', 'chahca', '2022-12-05 15:30:49'),
(50, 70, 'Candidate Cedric is edited by', 'chahca', '2022-12-05 15:33:24'),
(52, 62, 'Staff vins123 inserted a voter', '', '2022-12-05 16:49:23'),
(53, 62, 'vins123 has voted', '', '2022-12-05 22:34:43'),
(54, 62, 'Staff vins123 inserted a voter', '', '2022-12-06 21:03:21'),
(55, 62, 'Staff vins123 inserted a voter', '', '2022-12-06 21:05:49'),
(56, 62, 'Staff vins123 inserted a voter', '', '2022-12-06 21:08:50'),
(57, 62, 'Candidate Cedric is edited by', 'vins123', '2022-12-09 09:59:23'),
(58, 62, 'Candidate Cedri is edited by', 'vins123', '2022-12-09 10:04:29'),
(59, 62, 'Candidate Cedric is edited by', 'vins123', '2022-12-09 10:04:47'),
(60, 86, 'Staff admin inserted a voter', '', '2022-12-12 08:15:36'),
(61, 86, 'Staff admin inserted a voter', '', '2022-12-12 08:17:32'),
(62, 62, 'vins123 has voted', '', '2022-12-12 09:50:53'),
(63, 92, 'Staff admin inserted a voter', '', '2022-12-15 03:17:42'),
(64, 92, 'Candidate Alden is edited by', 'admin', '2022-12-15 03:44:38');

-- --------------------------------------------------------

--
-- Table structure for table `vot_party_list`
--

CREATE TABLE `vot_party_list` (
  `id` int(11) NOT NULL,
  `partylist_id` int(11) NOT NULL,
  `party_name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `vot_party_list`
--

INSERT INTO `vot_party_list` (`id`, `partylist_id`, `party_name`) VALUES
(4, 1, 'kabataan'),
(5, 2, 'gabriela'),
(7, 3, 'independent'),
(11, 4, 'ACT-CIS');

-- --------------------------------------------------------

--
-- Table structure for table `vot_position`
--

CREATE TABLE `vot_position` (
  `id` int(11) NOT NULL,
  `position_id` int(11) NOT NULL,
  `pos_name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `vot_position`
--

INSERT INTO `vot_position` (`id`, `position_id`, `pos_name`) VALUES
(7, 1, 'President'),
(8, 2, 'Vice-president'),
(9, 3, 'Secretary'),
(10, 4, 'Treasurer'),
(11, 5, 'Auditor'),
(12, 6, 'PIO');

-- --------------------------------------------------------

--
-- Table structure for table `vot_session`
--

CREATE TABLE `vot_session` (
  `id` int(11) NOT NULL,
  `is_filing` int(11) NOT NULL DEFAULT 0,
  `is_election` int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `vot_session`
--

INSERT INTO `vot_session` (`id`, `is_filing`, `is_election`) VALUES
(1, 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `vot_users`
--

CREATE TABLE `vot_users` (
  `id` int(11) NOT NULL,
  `category_id` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `is_voted` int(11) NOT NULL DEFAULT 0,
  `student_no` varchar(255) DEFAULT NULL,
  `otp` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `vot_users`
--

INSERT INTO `vot_users` (`id`, `category_id`, `username`, `password`, `is_voted`, `student_no`, `otp`) VALUES
(37, 2, 'cedric123', '40bd001563085fc35165329ea1ff5c5ecbdbbeef', 0, '20200080-M', '6399aef6d1f29'),
(79, 2, 'joms123', '40bd001563085fc35165329ea1ff5c5ecbdbbeef', 0, '202000800-M', NULL),
(92, 3, 'admin', 'd033e22ae348aeb5660fc2140aec35850c4da997', 0, '1', NULL),
(94, 2, 'vin123', '40bd001563085fc35165329ea1ff5c5ecbdbbeef', 0, '20200040-M', NULL),
(95, 1, 'jiro123', '40bd001563085fc35165329ea1ff5c5ecbdbbeef', 0, '202000760-M', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `vot_user_profile`
--

CREATE TABLE `vot_user_profile` (
  `id` int(11) NOT NULL,
  `fname` varchar(255) NOT NULL,
  `m_initial` varchar(255) NOT NULL,
  `lname` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `course_id` int(11) NOT NULL,
  `student_no` varchar(255) NOT NULL,
  `year_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `vot_user_profile`
--

INSERT INTO `vot_user_profile` (`id`, `fname`, `m_initial`, `lname`, `email`, `course_id`, `student_no`, `year_id`) VALUES
(14, 'cedric', 'F', 'Dela Cruz', 'cruzcedric66@gmail.com', 1, '20200080-M', 12),
(33, 'Joms', 'J', 'Lucerio', 'joms@gmail.com', 3, '202000800-M', 12),
(44, 'admin', 'admin', 'admin', 'admin', 1, '1', 0),
(46, 'vin', 'A', 'Cruz', 'cruzcedric22@gmail.com', 1, '20200040-M', 12),
(47, 'Jiro Allen', 'V.', 'Ibia', 'minato@gmail.com', 1, '202000760-M', 12);

-- --------------------------------------------------------

--
-- Table structure for table `vot_user_votes`
--

CREATE TABLE `vot_user_votes` (
  `user_id` int(11) NOT NULL,
  `user_vot` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `vot_user_votes`
--

INSERT INTO `vot_user_votes` (`user_id`, `user_vot`) VALUES
(64, 0),
(64, 0),
(64, 0),
(64, 0),
(64, 0),
(64, 0),
(64, 0),
(64, 0),
(64, 0),
(64, 0),
(64, 0),
(64, 0),
(64, 0),
(64, 0),
(64, 0),
(64, 0),
(64, 0),
(64, 0),
(64, 0),
(64, 0),
(64, 0),
(64, 76),
(64, 77),
(64, 74),
(64, 75),
(64, 81),
(64, 83),
(64, 0),
(62, 85),
(62, 78),
(62, 79),
(62, 80),
(62, 82),
(62, 84),
(62, 0),
(62, 85),
(62, 77),
(62, 79),
(62, 80),
(62, 82),
(62, 84),
(62, 0);

-- --------------------------------------------------------

--
-- Table structure for table `vot_year`
--

CREATE TABLE `vot_year` (
  `id` int(11) NOT NULL,
  `year` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `vot_year`
--

INSERT INTO `vot_year` (`id`, `year`) VALUES
(12, '2022');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `vot_candidates`
--
ALTER TABLE `vot_candidates`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `vot_cat_user`
--
ALTER TABLE `vot_cat_user`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `vot_course`
--
ALTER TABLE `vot_course`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `vot_logs`
--
ALTER TABLE `vot_logs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `vot_party_list`
--
ALTER TABLE `vot_party_list`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `vot_position`
--
ALTER TABLE `vot_position`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `vot_session`
--
ALTER TABLE `vot_session`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `vot_users`
--
ALTER TABLE `vot_users`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `vot_user_profile`
--
ALTER TABLE `vot_user_profile`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `vot_year`
--
ALTER TABLE `vot_year`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `vot_candidates`
--
ALTER TABLE `vot_candidates`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=92;

--
-- AUTO_INCREMENT for table `vot_cat_user`
--
ALTER TABLE `vot_cat_user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `vot_course`
--
ALTER TABLE `vot_course`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `vot_logs`
--
ALTER TABLE `vot_logs`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=65;

--
-- AUTO_INCREMENT for table `vot_party_list`
--
ALTER TABLE `vot_party_list`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `vot_position`
--
ALTER TABLE `vot_position`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `vot_session`
--
ALTER TABLE `vot_session`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `vot_users`
--
ALTER TABLE `vot_users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=96;

--
-- AUTO_INCREMENT for table `vot_user_profile`
--
ALTER TABLE `vot_user_profile`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=48;

--
-- AUTO_INCREMENT for table `vot_year`
--
ALTER TABLE `vot_year`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
