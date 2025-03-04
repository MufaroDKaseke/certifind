-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 04, 2025 at 12:31 PM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `certifind`
--

-- --------------------------------------------------------

--
-- Table structure for table `providers`
--

CREATE TABLE `providers` (
  `provider_id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `category` varchar(255) NOT NULL,
  `location` varchar(255) NOT NULL,
  `phone` int(11) NOT NULL,
  `primary_email` varchar(255) NOT NULL,
  `website` varchar(255) NOT NULL,
  `verified` tinyint(1) NOT NULL,
  `about` varchar(255) NOT NULL,
  `street` varchar(255) NOT NULL,
  `city` varchar(255) NOT NULL,
  `state` varchar(255) NOT NULL,
  `weekday_hours` varchar(255) NOT NULL,
  `saturday_hours` varchar(255) NOT NULL,
  `sunday_hours` varchar(255) NOT NULL,
  `verified_on` datetime DEFAULT NULL,
  `updated_on` datetime NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `created_on` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `providers`
--

INSERT INTO `providers` (`provider_id`, `name`, `email`, `username`, `password`, `category`, `location`, `phone`, `primary_email`, `website`, `verified`, `about`, `street`, `city`, `state`, `weekday_hours`, `saturday_hours`, `sunday_hours`, `verified_on`, `updated_on`, `created_on`) VALUES
(1, 'Momoservice', 'momo@momo.co.zw', 'momo', 'momo', 'momo', '-20.167634, 28.649736\n\n', 4920348, 'momo@momo.co.zw', 'https://momo.co.zw', 0, '13 Momo Street,\r\nSkjsdkj\r\ndslk', '13 Momo Street', 'Bulawayo', '', '', '', '', NULL, '2025-03-04 13:30:45', '2025-02-23 07:46:20'),
(2, 'National University Of Science And Technology', 'info@nust.ac.zw', 'nust', 'nustpassword', 'education', '-20.1629396, 28.6381467', 780948498, 'info@nust.ac.zw', 'https://nust.ac.zw', 0, 'RJPR+75X, Cnr Cecil Avenue & Gwanda Road, Bulawayo', '', '', '', '', '', '', NULL, '2025-03-01 21:45:35', '2025-02-23 09:12:08'),
(3, 'Christian Brothers College', 'info@cbc.co.zw', 'cbc', 'cbcpassword', 'education', '-20.1803634, 28.6323397', 780948498, 'cbc@cbc.co.zw', 'https://cbc.co.zw', 0, 'Chelmsford Road, Bulawayo', '', '', '', '', '', '', NULL, '2025-02-23 09:23:26', '2025-02-23 09:23:26');

-- --------------------------------------------------------

--
-- Table structure for table `reviews`
--

CREATE TABLE `reviews` (
  `review_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `provider_id` int(11) NOT NULL,
  `rating` int(11) NOT NULL,
  `comment` varchar(255) NOT NULL,
  `rated_on` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `reviews`
--

INSERT INTO `reviews` (`review_id`, `user_id`, `provider_id`, `rating`, `comment`, `rated_on`) VALUES
(1, 1, 2, 2, 'Something', '2025-02-26 20:47:15'),
(2, 1, 2, 1, 'Something bad', '2025-02-26 20:47:15'),
(3, 1, 2, 5, 'Something nice', '2025-02-26 20:47:15');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `user_id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `phone` varchar(255) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `registered_on` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `name`, `email`, `phone`, `username`, `password`, `registered_on`) VALUES
(1, 'Momo', 'momo@momo.dsj', '38238178', 'momo', 'momopassword', '2025-02-23 08:09:03');

-- --------------------------------------------------------

--
-- Table structure for table `verifications`
--

CREATE TABLE `verifications` (
  `verification_id` int(11) NOT NULL,
  `provider_id` int(11) NOT NULL,
  `doc_1` varchar(255) DEFAULT NULL,
  `doc_2` varchar(255) DEFAULT NULL,
  `doc_3` varchar(255) DEFAULT NULL,
  `status` tinyint(1) NOT NULL,
  `requested_on` datetime NOT NULL,
  `verified_on` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `verifications`
--

INSERT INTO `verifications` (`verification_id`, `provider_id`, `doc_1`, `doc_2`, `doc_3`, `status`, `requested_on`, `verified_on`) VALUES
(1, 2, 'id.pdf', 'someting.pdf', NULL, 0, '2025-03-01 19:38:47', '2025-03-01 19:38:47'),
(2, 2, '1740856764_2_1_Individual Assignment N0230382D.pdf', '1740856764_2_2_Verified_Services_Locator Final.docx', '1740856764_2_3_Individual Assignment N0230382D.pdf', 0, '2025-03-01 21:19:24', '0000-00-00 00:00:00');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `providers`
--
ALTER TABLE `providers`
  ADD PRIMARY KEY (`provider_id`);

--
-- Indexes for table `reviews`
--
ALTER TABLE `reviews`
  ADD PRIMARY KEY (`review_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`);

--
-- Indexes for table `verifications`
--
ALTER TABLE `verifications`
  ADD PRIMARY KEY (`verification_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `providers`
--
ALTER TABLE `providers`
  MODIFY `provider_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `reviews`
--
ALTER TABLE `reviews`
  MODIFY `review_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `verifications`
--
ALTER TABLE `verifications`
  MODIFY `verification_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
