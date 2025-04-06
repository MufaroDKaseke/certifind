-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 12, 2025 at 02:40 PM
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
(1, 'Mater Dei Hospital', 'info@materdei.co.zw', 'materdei', 'mater123', 'healthcare', '-20.1545, 28.5858', 292123456, 'info@materdei.co.zw', 'https://materdei.co.zw', 1, 'Private healthcare facility providing comprehensive medical services', 'Hillside Road', 'Bulawayo', 'Bulawayo', '00:00-23:59', '00:00-23:59', '00:00-23:59', '2025-01-15 14:30:00', '2025-03-04 13:30:45', '2024-12-01 07:46:20'),
(2, 'National University Of Science And Technology', 'info@nust.ac.zw', 'nust', 'nust2024', 'education', '-20.1629396, 28.6381467', 292282842, 'admissions@nust.ac.zw', 'https://nust.ac.zw', 1, 'Leading technological university in Zimbabwe', 'Gwanda Road', 'Bulawayo', 'Bulawayo', '08:00-16:30', '08:00-12:00', 'CLOSED', '2025-01-20 09:15:00', '2025-03-01 21:45:35', '2024-12-05 09:12:08'),
(3, 'Bulawayo Central Police Station', 'bulawayocentral@zrp.gov.zw', 'zrpcentral', 'police2024', 'emergency', '-20.1544, 28.5858', 292272626, 'bulawayocentral@zrp.gov.zw', '', 1, 'Main police station serving Bulawayo Central Business District', '8th Avenue', 'Bulawayo', 'Bulawayo', '00:00-23:59', '00:00-23:59', '00:00-23:59', '2025-01-10 11:20:00', '2025-02-23 09:23:26', '2024-12-10 09:23:26'),
(4, 'United Bulawayo Hospitals', 'info@ubh.gov.zw', 'ubh', 'ubh2024', 'healthcare', '-20.1483, 28.5726', 292240481, 'admin@ubh.gov.zw', 'https://ubh.gov.zw', 1, 'Major public healthcare facility in Bulawayo', 'Masiyephambili Drive', 'Bulawayo', 'Bulawayo', '00:00-23:59', '00:00-23:59', '00:00-23:59', '2025-01-05 10:45:00', '2025-03-01 21:45:35', '2024-12-15 09:12:08'),
(5, 'Girls College Bulawayo', 'admin@girlscollege.co.zw', 'girlscollege', 'gc2024', 'education', '-20.1597, 28.5931', 292251863, 'info@girlscollege.co.zw', 'https://girlscollege.co.zw', 1, 'Private girls high school established in 1983', 'Pauling Road', 'Bulawayo', 'Bulawayo', '07:30-16:00', 'CLOSED', 'CLOSED', '2025-01-25 13:40:00', '2025-02-23 09:23:26', '2024-12-20 09:23:26'),
(6, 'Bulawayo Legal Aid Clinic', 'info@blac.org.zw', 'blac', 'blac2024', 'legal', '-20.1561, 28.5850', 292882999, 'legal@blac.org.zw', 'https://blac.org.zw', 1, 'Non-profit legal aid organization providing legal services to the community', '9th Avenue', 'Bulawayo', 'Bulawayo', '08:00-16:00', '09:00-12:00', 'CLOSED', '2025-01-12 10:30:00', '2025-03-04 11:44:22', '2024-12-05 08:00:00'),
(7, 'Trade Kings Zimbabwe', 'info@tradekings.co.zw', 'tradekings', 'tk2024', 'trade', '-20.1375, 28.5894', 292881234, 'info@tradekings.co.zw', 'https://tradekings.co.zw', 1, 'Manufacturing and trading company specializing in household products', 'Belmont Industrial Area', 'Bulawayo', 'Bulawayo', '08:00-17:00', '08:00-13:00', 'CLOSED', '2025-01-18 11:20:00', '2025-03-04 11:44:22', '2024-12-10 09:00:00'),
(8, 'Bulawayo Fire Brigade', 'fire@bcc.co.zw', 'byo_fire', 'fire2024', 'emergency', '-20.1498, 28.5847', 292881122, 'emergency@bcc.co.zw', 'https://bcc.co.zw', 1, '24/7 emergency fire and rescue services', 'R Mugabe Way', 'Bulawayo', 'Bulawayo', '00:00-23:59', '00:00-23:59', '00:00-23:59', '2025-01-08 09:15:00', '2025-03-04 11:44:22', '2024-12-15 10:00:00'),
(9, 'Mpilo Central Hospital', 'info@mpilo.gov.zw', 'mpilo', 'mpilo2024', 'healthcare', '-20.1447, 28.5705', 292883333, 'admin@mpilo.gov.zw', 'https://mpilo.gov.zw', 1, 'Major referral hospital serving Bulawayo and surrounding regions', 'Vera Road', 'Bulawayo', 'Bulawayo', '00:00-23:59', '00:00-23:59', '00:00-23:59', '2025-01-14 13:45:00', '2025-03-04 11:44:22', '2024-12-20 11:00:00'),
(10, 'Standard Chartered Bank', 'stanchart@sc.com', 'stanchart', 'scb2024', 'business', '-20.1539, 28.5856', 292880123, 'business@sc.com', 'https://sc.com/zw', 1, 'International banking institution providing comprehensive financial services', '9th Avenue', 'Bulawayo', 'Bulawayo', '08:00-15:00', '08:00-12:00', 'CLOSED', '2025-01-22 14:30:00', '2025-03-04 11:44:22', '2024-12-25 12:00:00'),
(13, 'Omorfo Tech Labs', 'omorfotechlabs@gmail.com', 'omorfotechlabs@gmail.com', 'omorfo', 'business', '-20.151254329138304,28.616921721938716', 716896977, 'omorfotechlabs@gmail.com', 'https://omorfotech.co.zw', 0, 'Some tech business ', '5 Khumalo', 'Bulawayo', 'Bulawayo', '08:00-17:00', '08:00-13:00', '08:00-13:00', NULL, '2025-03-11 12:40:40', '2025-03-11 12:40:40');

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
(1, 1, 1, 5, 'Excellent emergency care, very professional staff', '2025-02-15 20:47:15'),
(2, 2, 1, 4, 'Good service but waiting times could be improved', '2025-02-16 14:22:30'),
(3, 3, 2, 5, 'Top-notch engineering programs, great facilities', '2025-02-17 09:15:40'),
(4, 4, 3, 5, 'Quick response to emergency, very helpful officers', '2025-02-18 16:30:25'),
(5, 5, 4, 4, 'Good medical care, friendly staff', '2025-02-19 11:45:50'),
(6, 1, 5, 5, 'Excellent academic standards and facilities', '2025-02-20 13:20:15'),
(7, 2, 2, 4, 'Great university, knowledgeable lecturers', '2025-02-21 15:10:30'),
(8, 3, 3, 5, 'Efficient service, professional handling of case', '2025-02-22 10:25:45'),
(9, 4, 4, 3, 'Long waiting times but good medical care', '2025-02-23 12:40:20'),
(10, 5, 5, 5, 'Outstanding school with great extra-curricular activities', '2025-02-24 14:55:35'),
(11, 1, 6, 5, 'Very helpful legal team, provided excellent guidance for my case', '2025-02-25 09:20:15'),
(12, 2, 6, 4, 'Professional service, though wait times can be long', '2025-02-25 14:35:20'),
(13, 3, 7, 5, 'Great quality products and excellent customer service', '2025-02-26 11:40:25'),
(14, 4, 7, 4, 'Reliable supplier, good business ethics', '2025-02-26 15:50:30'),
(15, 5, 8, 5, 'Responded within minutes to emergency, very professional team', '2025-02-27 08:15:35'),
(16, 1, 8, 5, 'Excellent emergency response time and handling', '2025-02-27 13:25:40'),
(17, 2, 9, 4, 'Good medical care, dedicated staff', '2025-02-28 10:30:45'),
(18, 3, 9, 3, 'Decent service but facilities need upgrading', '2025-02-28 16:45:50'),
(19, 4, 10, 5, 'Excellent banking services, professional staff', '2025-03-01 09:55:55'),
(20, 5, 10, 4, 'Good international banking facilities, helpful team', '2025-03-01 14:20:00');

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
(1, 'John Moyo', 'john.moyo@email.com', '772123456', 'johnm', 'pass123', '2024-12-01 08:09:03'),
(2, 'Sarah Ndlovu', 'sarah.n@email.com', '772234567', 'sarahn', 'sarah2024', '2024-12-15 10:15:22'),
(3, 'David Dube', 'david.d@email.com', '772345678', 'davidd', 'dube2024', '2025-01-05 14:30:45'),
(4, 'Maria Ncube', 'maria.ncube@email.com', '772456789', 'marian', 'maria2024', '2025-01-20 09:45:12'),
(5, 'Peter Sibanda', 'peter.s@email.com', '772567890', 'peters', 'peter2024', '2025-02-01 11:20:30');

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
(2, 13, '1741689715_13_1_Test N02303282D.pdf', '1741689715_13_2_Individual Assignment N0230382D.pdf', '1741689715_13_3_Analysis Of Algo - Individual Questions.pdf', 0, '2025-03-11 12:41:55', '0000-00-00 00:00:00');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `providers`
--
ALTER TABLE `providers`
  ADD PRIMARY KEY (`provider_id`);

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
  MODIFY `provider_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `verifications`
--
ALTER TABLE `verifications`
  MODIFY `verification_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
