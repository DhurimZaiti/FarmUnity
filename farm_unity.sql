-- phpMyAdmin SQL Dump
-- version 5.1.2
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Aug 25, 2024 at 08:52 PM
-- Server version: 5.7.24
-- PHP Version: 8.0.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `farm_unity`
--

-- --------------------------------------------------------

--
-- Table structure for table `animals`
--

CREATE TABLE `animals` (
  `id` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `animal` varchar(255) NOT NULL,
  `gender` enum('male','female') NOT NULL,
  `age` int(11) NOT NULL,
  `animal_name` varchar(255) NOT NULL,
  `animal_id` varchar(255) NOT NULL,
  `illness` tinyint(1) DEFAULT '0',
  `illness_type` varchar(255) DEFAULT NULL,
  `vaccination_status` varchar(255) DEFAULT NULL,
  `weight` decimal(10,2) DEFAULT NULL,
  `illness_history` text,
  `reproducing_status` enum('pregnant','lactating','infertile','none') DEFAULT 'none',
  `notes` text
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `animals`
--

INSERT INTO `animals` (`id`, `username`, `animal`, `gender`, `age`, `animal_name`, `animal_id`, `illness`, `illness_type`, `vaccination_status`, `weight`, `illness_history`, `reproducing_status`, `notes`) VALUES
(3, 'admin', 'cow', 'male', 15, 'mooo\\', '258183075135', 1, 'asda', 'Vaccinated', '12.00', 'sxsx', 'lactating', 'asda');

-- --------------------------------------------------------

--
-- Table structure for table `contact`
--

CREATE TABLE `contact` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `message` text NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `farm`
--

CREATE TABLE `farm` (
  `id` int(11) NOT NULL,
  `farmManager` varchar(255) NOT NULL,
  `farmName` varchar(255) NOT NULL,
  `country` varchar(255) NOT NULL,
  `address` varchar(255) NOT NULL,
  `city` varchar(255) NOT NULL,
  `province` varchar(255) NOT NULL,
  `postalCode` varchar(20) NOT NULL,
  `timezone` varchar(10) NOT NULL DEFAULT 'UTC +01:00',
  `farm_coordinates` varchar(255) NOT NULL,
  `currency` varchar(10) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `farm`
--

INSERT INTO `farm` (`id`, `farmManager`, `farmName`, `country`, `address`, `city`, `province`, `postalCode`, `timezone`, `farm_coordinates`, `currency`, `created_at`) VALUES
(1, 'admin', 'farm', 'macedonia', '101', 'Tetovo', 'tetovo', '1226', 'UTC +01:00', '49.49667452747045, -343.11285994761687', 'all', '2024-08-21 12:54:50'),
(2, 'admin1', 'farm', 'albania', '101', 'Tetovo', 'tetovo', '1226', 'UTC +01:00', '41.98724403479031, 381.06115226769765', 'all', '2024-08-22 17:58:38'),
(3, 'admin2', 'farm', 'macedonia', '101', 'Tetovo', 'tetovo', '1226', 'UTC +01:00', '41.987247025294124, 21.06134266741909', 'all', '2024-08-22 21:23:18'),
(4, 'admin12', 'farm', 'macedonia', '101', 'Tetovo', 'tetovo', '1226', 'UTC +01:00', '42.0063843688798, 20.96082663107138', 'eur', '2024-08-24 17:00:22'),
(5, 'admin', 'farm', 'macedonia', '101', 'Tetovo', 'sddsaca', '1226', 'UTC +01:00', '1', 'all', '2024-08-25 20:42:29');

-- --------------------------------------------------------

--
-- Table structure for table `feed`
--

CREATE TABLE `feed` (
  `id` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `type_of_feed` varchar(255) NOT NULL,
  `supplier` varchar(255) DEFAULT NULL,
  `imported_from` varchar(255) DEFAULT NULL,
  `amount` decimal(10,2) NOT NULL,
  `expiry_date` date DEFAULT NULL,
  `notes` text
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `plants`
--

CREATE TABLE `plants` (
  `id` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `family` varchar(255) DEFAULT NULL,
  `origin` varchar(255) DEFAULT NULL,
  `age` int(11) DEFAULT NULL,
  `soil_type` varchar(255) DEFAULT NULL,
  `planted_at` date DEFAULT NULL,
  `watering_cycle` varchar(255) DEFAULT NULL,
  `watering_times` int(11) DEFAULT NULL,
  `growth_rate` enum('fast','medium','slow') DEFAULT NULL,
  `height` decimal(10,2) DEFAULT NULL,
  `spread` decimal(10,2) DEFAULT NULL,
  `sun_requirements` enum('full','partial','none') DEFAULT NULL,
  `notes` text
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `seasonal_plants`
--

CREATE TABLE `seasonal_plants` (
  `id` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `season` enum('winter','spring','summer','autumn') NOT NULL,
  `watering_cycle` varchar(255) DEFAULT NULL,
  `watering_times` int(11) DEFAULT NULL,
  `soil_type` varchar(255) DEFAULT NULL,
  `planted_at` date DEFAULT NULL,
  `growth_rate` enum('fast','medium','slow') DEFAULT NULL,
  `height` decimal(10,2) DEFAULT NULL,
  `spread` decimal(10,2) DEFAULT NULL,
  `sun_requirements` enum('full','partial','none') DEFAULT NULL,
  `notes` text
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `avatar` varchar(255) DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `is_admin` tinyint(1) DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `email`, `avatar`, `password`, `created_at`, `updated_at`, `is_admin`) VALUES
(1, 'admin', 'admin@gmail.com', NULL, '$2y$10$3TcGpZvuTmD/eek2.wKBOufZ/vzkIoSuOzYyJXg8Vf3Bua4V7aVdW', '2024-08-21 11:38:43', '2024-08-21 11:38:43', 0),
(2, 'admin1', 'jasirlimani12@gmail.com', NULL, '$2y$10$uUHXNnkHFeDV0fILYeCDEeOd8DVj9RTxMsqxJX5N19w0tR7fDG6GK', '2024-08-22 17:57:32', '2024-08-22 17:57:32', 0),
(3, 'admin2', 'jasirlimani@gmail.com', NULL, '$2y$10$rA6fMC2pQd..hCx89gc.gueOjVBn/DoHx7zrRo7yHFwjv9ACHili.', '2024-08-22 21:22:47', '2024-08-22 21:22:47', 0),
(4, 'admin12', 'admin12@gmail.com', NULL, '$2y$10$o5c3aIiz5KDXe3MGH1IyTe/PX..IqTdziHlyE10856QrWF8UA.RZW', '2024-08-24 17:00:03', '2024-08-24 17:00:03', 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `animals`
--
ALTER TABLE `animals`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `animal_id` (`animal_id`),
  ADD KEY `username` (`username`);

--
-- Indexes for table `contact`
--
ALTER TABLE `contact`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `farm`
--
ALTER TABLE `farm`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `feed`
--
ALTER TABLE `feed`
  ADD PRIMARY KEY (`id`),
  ADD KEY `username` (`username`);

--
-- Indexes for table `plants`
--
ALTER TABLE `plants`
  ADD PRIMARY KEY (`id`),
  ADD KEY `username` (`username`);

--
-- Indexes for table `seasonal_plants`
--
ALTER TABLE `seasonal_plants`
  ADD PRIMARY KEY (`id`),
  ADD KEY `username` (`username`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username` (`username`),
  ADD UNIQUE KEY `email` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `animals`
--
ALTER TABLE `animals`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `contact`
--
ALTER TABLE `contact`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `farm`
--
ALTER TABLE `farm`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `feed`
--
ALTER TABLE `feed`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `plants`
--
ALTER TABLE `plants`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `seasonal_plants`
--
ALTER TABLE `seasonal_plants`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `animals`
--
ALTER TABLE `animals`
  ADD CONSTRAINT `animals_ibfk_1` FOREIGN KEY (`username`) REFERENCES `users` (`username`);

--
-- Constraints for table `feed`
--
ALTER TABLE `feed`
  ADD CONSTRAINT `feed_ibfk_1` FOREIGN KEY (`username`) REFERENCES `users` (`username`);

--
-- Constraints for table `plants`
--
ALTER TABLE `plants`
  ADD CONSTRAINT `plants_ibfk_1` FOREIGN KEY (`username`) REFERENCES `users` (`username`);

--
-- Constraints for table `seasonal_plants`
--
ALTER TABLE `seasonal_plants`
  ADD CONSTRAINT `seasonal_plants_ibfk_1` FOREIGN KEY (`username`) REFERENCES `users` (`username`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
