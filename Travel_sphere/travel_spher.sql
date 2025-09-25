-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 25, 2025 at 08:49 PM
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
-- Database: `travel_spher`
--

-- --------------------------------------------------------

--
-- Table structure for table `bookings`
--

CREATE TABLE `bookings` (
  `id` int(11) NOT NULL,
  `destination` varchar(100) NOT NULL,
  `fullname` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `contact` varchar(20) DEFAULT NULL,
  `people` int(11) DEFAULT NULL,
  `arrival` date DEFAULT NULL,
  `leaving` date DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `bookings`
--

INSERT INTO `bookings` (`id`, `destination`, `fullname`, `email`, `contact`, `people`, `arrival`, `leaving`, `created_at`) VALUES
(1, 'Skardu', 'Qasim NIzam', 'qasim7@gmail.com', '03081464131', 5, '2025-09-27', '2025-10-08', '2025-09-25 08:16:47'),
(2, 'Skardu', 'user', 'user@gmail.com', '0273843698201', 10, '2025-09-28', '2025-10-11', '2025-09-25 10:17:16');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(255) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `password`, `created_at`) VALUES
(1, 'qasim nizam', 'qasim8@gmail.com', '$2y$10$cAm5i6U3T/hnrcTh/cKTVu70GfWh1x.qdmQHVXmqg.92o6ERQPama', '2025-09-25 08:15:28'),
(2, 'asad', 'asad@gmail.com', '$2y$10$V/wxArTLtovtGeGQsAbvy.bm9axsrdXFXVS1450xiBJJefgPyqlhS', '2025-09-25 09:54:53'),
(3, 'asher', 'asher@gmail.com', '$2y$10$drxP9bOP1xo7kGaybxNhleHSZWDb93ajArlfwidxoBfvGDyeFo5uy', '2025-09-25 10:03:44'),
(4, 'user', 'user@gmail.com', '$2y$10$shVYlLL4xBXqFtJL0kVk..wtLfukvrju1SDZ8sF7QEkUYALli0WPm', '2025-09-25 10:16:12');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `bookings`
--
ALTER TABLE `bookings`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `bookings`
--
ALTER TABLE `bookings`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
