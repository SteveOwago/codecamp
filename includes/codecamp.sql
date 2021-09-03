-- phpMyAdmin SQL Dump
-- version 4.8.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 03, 2021 at 06:20 AM
-- Server version: 10.1.37-MariaDB
-- PHP Version: 7.3.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
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
  `description` text,
  `price` double NOT NULL DEFAULT '15000',
  `date` varchar(25) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `courses`
--

INSERT INTO `courses` (`id`, `name`, `description`, `price`, `date`) VALUES
(13, 'Game Dev in Roblox', 'For more information about this course please contact our support', 2, '2021-09-15T08:55'),
(14, 'Block-Based Coding With Scratch\r\n', NULL, 15000, '0000-00-00'),
(15, 'Web Development with JavaScript\r\n', NULL, 15000, '0000-00-00'),
(16, '3D Design and Modeling with Blender\r\n', NULL, 15000, '0000-00-00'),
(17, 'Game Development with MineCraft\r\n', NULL, 15000, '0000-00-00'),
(18, 'Coding in Python\r\n', NULL, 15000, '0000-00-00'),
(19, 'Build Simple Applications With Java\r\n', NULL, 15000, '0000-00-00'),
(20, 'Video Manipulation in Adobe Premiere\r\n', NULL, 15000, '0000-00-00'),
(21, '3D Design in Maya\r\n', NULL, 15000, '0000-00-00'),
(22, '3D Printing using Blender\r\n', NULL, 15000, '0000-00-00'),
(23, 'Game Development with Unity\r\n', NULL, 15000, '0000-00-00'),
(24, 'Basic Coding in C++', NULL, 15000, '0000-00-00');

-- --------------------------------------------------------

--
-- Table structure for table `course_enroll`
--

CREATE TABLE `course_enroll` (
  `course_id` int(10) NOT NULL,
  `user_id` int(10) NOT NULL,
  `datetime` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `course_enroll`
--

INSERT INTO `course_enroll` (`course_id`, `user_id`, `datetime`) VALUES
(19, 2, '2021-08-04 13:57:33'),
(16, 2, '2021-08-04 13:59:13'),
(13, 2, '2021-08-04 14:11:34'),
(13, 2, '2021-08-04 14:11:42'),
(15, 3, '2021-08-06 08:13:19'),
(13, 3, '2021-08-17 09:46:58');

-- --------------------------------------------------------

--
-- Table structure for table `course_payments`
--

CREATE TABLE `course_payments` (
  `id` int(10) NOT NULL,
  `course_id` int(10) NOT NULL,
  `email` varchar(255) NOT NULL,
  `amount` double(8,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `mpesa_payments`
--

CREATE TABLE `mpesa_payments` (
  `id` int(10) NOT NULL,
  `result_code` varchar(10) NOT NULL,
  `result_desc` varchar(255) NOT NULL,
  `merchant_request_id` varchar(50) NOT NULL,
  `checkout_request_id` varchar(50) NOT NULL,
  `amount` double(8,2) NOT NULL,
  `mpesa_receipt_number` varchar(30) NOT NULL,
  `transaction_date` datetime NOT NULL,
  `phone_number` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `mpesa_payments`
--

INSERT INTO `mpesa_payments` (`id`, `result_code`, `result_desc`, `merchant_request_id`, `checkout_request_id`, `amount`, `mpesa_receipt_number`, `transaction_date`, `phone_number`) VALUES
(1, '', '', '', '', 0.00, '', '0000-00-00 00:00:00', ''),
(2, '', '', '', '', 0.00, '', '0000-00-00 00:00:00', ''),
(3, '', '', '', '', 0.00, '', '0000-00-00 00:00:00', '');

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
-- Table structure for table `sessions`
--

CREATE TABLE `sessions` (
  `id` int(10) NOT NULL,
  `name` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `startdatetime` varchar(25) NOT NULL,
  `link` text NOT NULL,
  `course_id` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `sessions`
--

INSERT INTO `sessions` (`id`, `name`, `description`, `startdatetime`, `link`, `course_id`) VALUES
(4, 'Session 1: Introduction to JavaScript', 'A programming language commonly used all over the web, JavaScript allows the creation of interactive websites. The language also has uses in robotics, game design, and many other fields, so no matter where your interests lie, JavaScript can help you build something incredible. Like with all programming languages, JavaScript has certain advantages and disadvantages to consider. Many of these are related to the way JavaScript is often executed directly in a client\'s browser. But there are other ways to use JavaScript now that allow it to have the same benefits as server-side languages.', '2021-09-13T08:00', 'https://meet.google.com/eex-dwho-hby', 15);

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
  `role_id` int(10) NOT NULL DEFAULT '2',
  `trn_date` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `password`, `phone`, `role_id`, `trn_date`) VALUES
(2, 'Stephen Owago', 'stevenowago@gmail.com', '$2y$10$X4LBT4hq.KYIOyfFIh192uICXhanC3qjfE61oCMn0FCkQ3ujc5dOy', '+254713218312', 2, '2021-08-03'),
(3, 'Stephen Owago', 'steveowago@gmail.com', '$2y$10$eGNswCIiIT9t.nGZuANr9eIqjK8hmyWqSRJoS51w2T4UhpYcHZir2', '+254713218312', 1, '2021-08-04'),
(4, 'Stephen Owago', 'steveowago@iearnkenya.org', '$2y$10$994cBHx/0QoLqgSESaLjcOEuuzFrFLQoKspkualBs079lSgwNLdcC', '+254713218312', 2, NULL);

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
-- Indexes for table `course_payments`
--
ALTER TABLE `course_payments`
  ADD PRIMARY KEY (`id`),
  ADD KEY `course` (`course_id`);

--
-- Indexes for table `mpesa_payments`
--
ALTER TABLE `mpesa_payments`
  ADD PRIMARY KEY (`id`);

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
-- Indexes for table `sessions`
--
ALTER TABLE `sessions`
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
-- AUTO_INCREMENT for table `course_payments`
--
ALTER TABLE `course_payments`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `mpesa_payments`
--
ALTER TABLE `mpesa_payments`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

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
-- AUTO_INCREMENT for table `sessions`
--
ALTER TABLE `sessions`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

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
-- Constraints for table `course_payments`
--
ALTER TABLE `course_payments`
  ADD CONSTRAINT `course` FOREIGN KEY (`course_id`) REFERENCES `courses` (`id`) ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
