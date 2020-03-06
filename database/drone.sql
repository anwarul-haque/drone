-- phpMyAdmin SQL Dump
-- version 4.9.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 23, 2020 at 05:52 PM
-- Server version: 10.4.11-MariaDB
-- PHP Version: 7.2.26

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `drone`
--

-- --------------------------------------------------------

--
-- Table structure for table `drones`
--

CREATE TABLE `drones` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `model_no` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `size` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `is_npnt` int(11) NOT NULL DEFAULT 0,
  `user_id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `drones`
--

INSERT INTO `drones` (`id`, `name`, `model_no`, `size`, `type`, `is_npnt`, `user_id`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, '1st Drone', '123456', '2', '2', 0, 1, '2020-02-23 11:12:24', '2020-02-23 11:12:24', NULL),
(2, '2nd Drone', '12345r', '1', '1', 0, 1, '2020-02-23 11:16:34', '2020-02-23 11:16:34', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `flight_plans`
--

CREATE TABLE `flight_plans` (
  `id` int(10) UNSIGNED NOT NULL,
  `address` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `zip_code` mediumint(8) UNSIGNED NOT NULL,
  `start_time` date NOT NULL,
  `end_time` date NOT NULL,
  `height` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `purpose` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` int(10) UNSIGNED NOT NULL,
  `pilot_id` int(10) UNSIGNED NOT NULL,
  `drone_id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `flight_plans`
--

INSERT INTO `flight_plans` (`id`, `address`, `zip_code`, `start_time`, `end_time`, `height`, `purpose`, `user_id`, `pilot_id`, `drone_id`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'Piplani', 462022, '2020-02-05', '2020-02-19', '500', '1', 1, 2, 1, '2020-02-23 11:16:00', '2020-02-23 11:16:00', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `images`
--

CREATE TABLE `images` (
  `id` int(10) UNSIGNED NOT NULL,
  `url` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `type` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `imageable_id` bigint(20) UNSIGNED NOT NULL,
  `imageable_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `images`
--

INSERT INTO `images` (`id`, `url`, `type`, `imageable_id`, `imageable_type`, `created_at`, `updated_at`) VALUES
(1, 'image/8L3tuXkz8uc67wMMG1LeaIPlkUeUCETSTmE4SfjA.jpeg', 'image', 5, 'App\\User', '2020-02-23 11:21:54', '2020-02-23 11:21:54');

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2020_02_16_060725_create_drones_table', 1),
(4, '2020_02_17_072629_create_images_table', 1),
(5, '2020_02_17_185457_create_flight_plans_table', 1),
(6, '2020_02_18_150946_create_pilots_table', 1);

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `pilots`
--

CREATE TABLE `pilots` (
  `id` int(10) UNSIGNED NOT NULL,
  `pilot_id` int(10) UNSIGNED NOT NULL,
  `operator_id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `pilots`
--

INSERT INTO `pilots` (`id`, `pilot_id`, `operator_id`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 2, 1, '2020-02-23 11:14:01', '2020-02-23 11:14:01', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `dob` date DEFAULT NULL,
  `gender` int(10) UNSIGNED DEFAULT NULL,
  `state` int(11) DEFAULT NULL,
  `type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `role` int(11) NOT NULL DEFAULT 2,
  `city` int(11) DEFAULT NULL,
  `address` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `phone` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `dob`, `gender`, `state`, `type`, `role`, `city`, `address`, `phone`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'Anwarul Haque', 'anwarulhaque321@gmail.com', NULL, NULL, NULL, 'operator', 1, NULL, NULL, NULL, NULL, '$2y$10$UMm/JEOrj74PsdxyQHaJX.3GdoGTaorJ9gdCGkCbac50zoGFhByqm', '0aOOxOpfec02tUUJGovcV4ZFCBhiwfEcy8BA9JqcjYpbf23Amjj3b92Qy9qA', '2020-02-23 11:11:55', '2020-02-23 11:11:55', NULL),
(2, 'Nikhil', 'nikhil@gmail.com', NULL, NULL, NULL, 'pilot', 2, NULL, NULL, NULL, NULL, '$2y$10$K3Hn4bX0KnISDZkvitrlXOh7mlY1m/WfKe0rk/mihhS3jkmYi6dwW', '8ZqJdGU91Y6jXzCkg7cVjbZlPEVG13aXujTHap2exGE0jgqrZLJneTSZJIKD', '2020-02-23 11:13:21', '2020-02-23 11:13:21', NULL),
(3, 'Ankit', 'ankit@gmail.com', NULL, NULL, NULL, 'pilot', 2, NULL, NULL, NULL, NULL, '$2y$10$0rh14TgZ5OXZUYnX7Gsy9uqUiayhfwIaEsYDzhZpzm7FER63ylGRq', 'LaZ9juAxT9H0wB5wmwXKYDlayZT3H39cvkLVaCDimealT1BkbtTQgXSj7QJU', '2020-02-23 11:17:57', '2020-02-23 11:17:57', NULL),
(4, 'Raju', 'raju@gmail.com', NULL, NULL, NULL, 'pilot', 2, NULL, NULL, NULL, NULL, '$2y$10$gHk.DXBEvPuWXXTpyy6/YOjYq8tKR3E6DXBUki4eSLKPa.9dqjamG', 'EjMIBpF8XCJFZx0LOZ6OS7Mh9KIvfRAyPYqQ9UsU61Gi3miSffrhCuBPh6v1', '2020-02-23 11:18:31', '2020-02-23 11:18:31', NULL),
(5, 'Anwar', 'anwar@gmail.com', '2020-02-06', 0, 1, 'admin', 3, 1, 'mp nagar', '1236547890', NULL, '$2y$10$gEDyPW5DeygSvYidxcEs9.GmWuqt2RN.YAZsDrxS77oW9SV0nqmr2', 'nQTWxrwrwMMvaeDL0RvE7bedNeXVNf6pf8ZyUskFlyZXuUX3sexcJyK4irBY', '2020-02-23 11:19:08', '2020-02-23 11:21:41', NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `drones`
--
ALTER TABLE `drones`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `drones_model_no_unique` (`model_no`),
  ADD KEY `drones_user_id_foreign` (`user_id`);

--
-- Indexes for table `flight_plans`
--
ALTER TABLE `flight_plans`
  ADD PRIMARY KEY (`id`),
  ADD KEY `flight_plans_user_id_foreign` (`user_id`),
  ADD KEY `flight_plans_pilot_id_foreign` (`pilot_id`),
  ADD KEY `flight_plans_drone_id_foreign` (`drone_id`);

--
-- Indexes for table `images`
--
ALTER TABLE `images`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `pilots`
--
ALTER TABLE `pilots`
  ADD PRIMARY KEY (`id`),
  ADD KEY `pilots_pilot_id_foreign` (`pilot_id`),
  ADD KEY `pilots_operator_id_foreign` (`operator_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `drones`
--
ALTER TABLE `drones`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `flight_plans`
--
ALTER TABLE `flight_plans`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `images`
--
ALTER TABLE `images`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `pilots`
--
ALTER TABLE `pilots`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `drones`
--
ALTER TABLE `drones`
  ADD CONSTRAINT `drones_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

--
-- Constraints for table `flight_plans`
--
ALTER TABLE `flight_plans`
  ADD CONSTRAINT `flight_plans_drone_id_foreign` FOREIGN KEY (`drone_id`) REFERENCES `drones` (`id`),
  ADD CONSTRAINT `flight_plans_pilot_id_foreign` FOREIGN KEY (`pilot_id`) REFERENCES `users` (`id`),
  ADD CONSTRAINT `flight_plans_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

--
-- Constraints for table `pilots`
--
ALTER TABLE `pilots`
  ADD CONSTRAINT `pilots_operator_id_foreign` FOREIGN KEY (`operator_id`) REFERENCES `users` (`id`),
  ADD CONSTRAINT `pilots_pilot_id_foreign` FOREIGN KEY (`pilot_id`) REFERENCES `users` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
