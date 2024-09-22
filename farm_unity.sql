-- phpMyAdmin SQL Dump
-- version 5.1.2
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Sep 22, 2024 at 12:54 PM
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
(5, 'jasirlimani12', 'cow', 'male', 15, 'mooo\\', '826953463270', 1, 'dccd', 'Vaccinated', '123.00', 'asdccd', 'lactating', 'sadccd'),
(6, 'jasirlimani12', 'cow', 'male', 15, 'mooo\\', '345549326583', 1, 'dccd', 'Vaccinated', '125.00', 'asdccd', 'lactating', 'sadccd');

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
-- Table structure for table `equipment`
--

CREATE TABLE `equipment` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `type` varchar(255) NOT NULL,
  `brand_model` varchar(255) NOT NULL,
  `model_year` int(11) NOT NULL,
  `plate_number` varchar(255) NOT NULL,
  `serial_number` varchar(255) NOT NULL,
  `distance` int(11) NOT NULL,
  `registration_date` date NOT NULL,
  `registration_expiration` date NOT NULL,
  `description` longtext
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
  `farm_coordinates` varchar(255) DEFAULT NULL,
  `fields` varchar(255) DEFAULT NULL,
  `currency` varchar(10) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `farm`
--

INSERT INTO `farm` (`id`, `farmManager`, `farmName`, `country`, `address`, `city`, `province`, `postalCode`, `timezone`, `farm_coordinates`, `fields`, `currency`, `created_at`) VALUES
(15, 'jasirlimani', 'farm', 'macedonia', '101', 'Tetovo', 'tetovo', '1226', 'UTC +01:00', '35.53937878575979, 24.053847296806023', '', 'all', '2024-08-25 21:11:41'),
(16, 'admin', 'farm', 'macedonia', '101', 'Tetovo', 'tetovo', '1226', 'UTC +01:00', '48.69096039092552, 72.93793674982305', NULL, 'all', '2024-08-26 13:16:40'),
(17, 'jasirlimani12', 'farm', 'albania', '101', 'Tetovo', 'tetovo', '1226', 'UTC +01:00', '41.60835775273592, 21.55198049111252', NULL, 'all', '2024-09-09 18:11:47'),
(18, 'cili123', 'cili', 'macedonia', '101', 'Tetovo', 'Tetovo', '1226', 'UTC +01:00', NULL, NULL, 'all', '2024-09-18 08:55:31'),
(19, 'frenki123', 'farm', 'macedonia', '101', 'Tetovo', 'tetovo', '1226', 'UTC +01:00', '3.6099171984197507, 26.51482328710737', NULL, 'all', '2024-09-22 12:24:07');

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
-- Table structure for table `fields`
--

CREATE TABLE `fields` (
  `id` int(11) NOT NULL,
  `fieldId` bigint(20) NOT NULL,
  `farm_manager` varchar(255) NOT NULL,
  `field_name` varchar(255) NOT NULL,
  `coordinates` json NOT NULL,
  `fieldSize` float DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `inventory`
--

CREATE TABLE `inventory` (
  `id` int(11) NOT NULL,
  `type_name` varchar(255) NOT NULL,
  `variety` varchar(255) NOT NULL,
  `inventory_capacity` varchar(255) NOT NULL,
  `inventory_unit` varchar(255) NOT NULL,
  `belonging_wharehouse` varchar(255) NOT NULL,
  `alert` int(11) NOT NULL,
  `description` longtext
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
(4, 'admin12', 'admin12@gmail.com', NULL, '$2y$10$o5c3aIiz5KDXe3MGH1IyTe/PX..IqTdziHlyE10856QrWF8UA.RZW', '2024-08-24 17:00:03', '2024-08-24 17:00:03', 0),
(5, 'jasirlimani', 'jasirlimani3@gmail.com', NULL, '$2y$10$hj.6vtW5p/qjQOApGVrYm.SkJO5KS8w.byJKOLuTTaPlOwiiYzptC', '2024-08-25 20:58:27', '2024-08-25 20:58:27', 0),
(6, 'jasirlimani12', 'jasirlimani14@gmail.com', NULL, '$2y$10$NoMXezi92goDko7T/1oZ6epxHhQuOy/4hJ/lE.2hucdlSpr9MbyUW', '2024-09-09 18:10:03', '2024-09-09 18:10:03', 0),
(7, 'cili123', 'cili@gmail.com', NULL, '$2y$10$2oOKshwInl21Zbj2rRg4KOqHBHJBR29n8yyf9nH5gjk.7psXNiz3S', '2024-09-18 08:55:17', '2024-09-18 08:55:17', 0),
(8, 'frenki123', 'frenki@gmail.com', NULL, '$2y$10$KpmxL76nsdo6nIrLnGr0D.qq1JXdGx/0MTCKgSRzB0NW61W.RsCKa', '2024-09-22 12:20:55', '2024-09-22 12:20:55', 0);

-- --------------------------------------------------------

--
-- Table structure for table `wharehouses`
--

CREATE TABLE `wharehouses` (
  `id` int(11) NOT NULL,
  `Name` varchar(255) NOT NULL,
  `max_capacity` decimal(10,0) NOT NULL,
  `description` longtext
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

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
-- Indexes for table `equipment`
--
ALTER TABLE `equipment`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `name` (`name`);

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
-- Indexes for table `fields`
--
ALTER TABLE `fields`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `inventory`
--
ALTER TABLE `inventory`
  ADD PRIMARY KEY (`id`);

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
-- Indexes for table `wharehouses`
--
ALTER TABLE `wharehouses`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `animals`
--
ALTER TABLE `animals`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `contact`
--
ALTER TABLE `contact`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `equipment`
--
ALTER TABLE `equipment`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `farm`
--
ALTER TABLE `farm`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `feed`
--
ALTER TABLE `feed`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `fields`
--
ALTER TABLE `fields`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `inventory`
--
ALTER TABLE `inventory`
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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `wharehouses`
--
ALTER TABLE `wharehouses`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

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
