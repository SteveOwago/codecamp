-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 04, 2021 at 02:24 PM
-- Server version: 10.4.17-MariaDB
-- PHP Version: 7.3.27

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `codecamp`
--

-- --------------------------------------------------------

--
-- Table structure for table `courses`
--

CREATE TABLE `courses` (
  `id` int(10) NOT NULL,
  `name` varchar(255) NOT NULL,
  `price` double NOT NULL DEFAULT 15000,
  `date` date DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `courses`
--

INSERT INTO `courses` (`id`, `name`, `price`, `date`) VALUES
(13, 'Game Dev in Roblox', 15000, '0000-00-00'),
(14, 'Block-Based Coding With Scratch\r\n', 15000, '0000-00-00'),
(15, 'Web Development with JavaScript\r\n', 15000, '0000-00-00'),
(16, '3D Design and Modeling with Blender\r\n', 15000, '0000-00-00'),
(17, 'Game Development with MineCraft\r\n', 15000, '0000-00-00'),
(18, 'Coding in Python\r\n', 15000, '0000-00-00'),
(19, 'Build Simple Applications With Java\r\n', 15000, '0000-00-00'),
(20, 'Video Manipulation in Adobe Premiere\r\n', 15000, '0000-00-00'),
(21, '3D Design in Maya\r\n', 15000, '0000-00-00'),
(22, '3D Printing using Blender\r\n', 15000, '0000-00-00'),
(23, 'Game Development with Unity\r\n', 15000, '0000-00-00'),
(24, 'Basic Coding in C++', 15000, '0000-00-00');

-- --------------------------------------------------------

--
-- Table structure for table `course_enroll`
--

CREATE TABLE `course_enroll` (
  `course_id` int(10) NOT NULL,
  `user_id` int(10) NOT NULL,
  `datetime` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `course_enroll`
--

INSERT INTO `course_enroll` (`course_id`, `user_id`, `datetime`) VALUES
(19, 2, '2021-08-04 13:57:33'),
(16, 2, '2021-08-04 13:59:13'),
(13, 2, '2021-08-04 14:11:34'),
(13, 2, '2021-08-04 14:11:42');

-- --------------------------------------------------------

--
-- Table structure for table `password_reset_temp`
--

CREATE TABLE `password_reset_temp` (
  `email` varchar(250) NOT NULL,
  `key` varchar(250) NOT NULL,
  `expDate` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `registration`
--

CREATE TABLE `registration` (
  `id` int(11) NOT NULL,
  `fname` varchar(100) NOT NULL,
  `lname` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `course` int(10) NOT NULL,
  `age` int(2) NOT NULL,
  `phone` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `registration`
--

INSERT INTO `registration` (`id`, `fname`, `lname`, `email`, `course`, `age`, `phone`) VALUES
(1, '', '', '', 1, 23, '0713218312'),
(2, '', '', 'steveowago@gmail.com', 1, 23, '0713218312'),
(3, '', '', 'stevenowago@gmail.com', 2, 23, '0713218312'),
(4, '', '', 'stevenowago@gmail.com', 5, 45, '0713218312'),
(5, '', '', 'steveowago@gmail.com', 6, 23, '0713218312'),
(6, 'Stephen', 'Owago', 'stevenowago@gmail.com', 2, 23, '+254713218312');

-- --------------------------------------------------------

--
-- Table structure for table `roles`
--

CREATE TABLE `roles` (
  `id` int(10) NOT NULL,
  `name` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `roles`
--

INSERT INTO `roles` (`id`, `name`) VALUES
(1, 'Administrator'),
(2, 'Student');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(10) NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(255) NOT NULL,
  `phone` varchar(15) NOT NULL,
  `role_id` int(10) NOT NULL DEFAULT 2,
  `trn_date` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `password`, `phone`, `role_id`, `trn_date`) VALUES
(2, 'Stephen Owago', 'stevenowago@gmail.com', '$2y$10$X4LBT4hq.KYIOyfFIh192uICXhanC3qjfE61oCMn0FCkQ3ujc5dOy', '+254713218312', 2, '2021-08-03');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `courses`
--
ALTER TABLE `courses`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id` (`id`);

--
-- Indexes for table `course_enroll`
--
ALTER TABLE `course_enroll`
  ADD KEY `user` (`user_id`),
  ADD KEY `courses` (`course_id`);

--
-- Indexes for table `registration`
--
ALTER TABLE `registration`
  ADD PRIMARY KEY (`id`),
  ADD KEY `course` (`course`);

--
-- Indexes for table `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD KEY `role` (`role_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `courses`
--
ALTER TABLE `courses`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT for table `registration`
--
ALTER TABLE `registration`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `roles`
--
ALTER TABLE `roles`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `course_enroll`
--
ALTER TABLE `course_enroll`
  ADD CONSTRAINT `courses` FOREIGN KEY (`course_id`) REFERENCES `courses` (`id`) ON UPDATE CASCADE,
  ADD CONSTRAINT `user` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON UPDATE CASCADE;

--
-- Constraints for table `registration`
--
ALTER TABLE `registration`
  ADD CONSTRAINT `course` FOREIGN KEY (`course`) REFERENCES `courses` (`id`);

--
-- Constraints for table `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `role` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
