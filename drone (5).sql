-- phpMyAdmin SQL Dump
-- version 4.9.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 06, 2020 at 09:15 PM
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
  `model_no` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `size` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `type` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `is_npnt` int(11) NOT NULL DEFAULT 0,
  `user_id` int(10) UNSIGNED NOT NULL,
  `status` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `drones`
--

INSERT INTO `drones` (`id`, `name`, `model_no`, `size`, `type`, `is_npnt`, `user_id`, `status`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'aass', '1231awq', '2', '2', 0, 4, NULL, '2020-03-06 13:52:09', '2020-03-06 14:31:45', NULL),
(2, 'qweqe', '1231as', '1', '2', 0, 4, NULL, '2020-03-06 13:56:47', '2020-03-06 13:56:47', NULL),
(3, 'fggdfg', '12312', '1', '1', 0, 4, NULL, '2020-03-06 13:59:48', '2020-03-06 13:59:48', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `flight_plans`
--

CREATE TABLE `flight_plans` (
  `id` int(10) UNSIGNED NOT NULL,
  `address` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `zip_code` mediumint(8) UNSIGNED NOT NULL,
  `start_time` time NOT NULL,
  `end_time` time NOT NULL,
  `height` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `purpose` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` int(10) UNSIGNED NOT NULL,
  `pilot_id` int(10) UNSIGNED NOT NULL,
  `drone_id` int(10) UNSIGNED NOT NULL,
  `lat` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `lng` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `date` date NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `flight_plans`
--

INSERT INTO `flight_plans` (`id`, `address`, `zip_code`, `start_time`, `end_time`, `height`, `purpose`, `user_id`, `pilot_id`, `drone_id`, `lat`, `lng`, `date`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'piplani', 123456, '00:21:00', '12:12:00', '1212', '1', 4, 5, 1, '23.254301203933032', '77.42598958740233', '2020-12-17', '2020-03-06 14:05:50', '2020-03-06 14:05:50', NULL),
(2, 'mp nagar', 234234, '02:32:00', '12:11:00', '1212', '2', 4, 5, 3, '23.250121667692696', '77.43491597900389', '2020-03-10', '2020-03-06 14:06:55', '2020-03-06 14:06:55', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `images`
--

CREATE TABLE `images` (
  `id` int(10) UNSIGNED NOT NULL,
  `url` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `type` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `imageable_id` bigint(20) UNSIGNED NOT NULL,
  `imageable_type` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `images`
--

INSERT INTO `images` (`id`, `url`, `type`, `imageable_id`, `imageable_type`, `created_at`, `updated_at`) VALUES
(1, 'image/JT1G0eNSgLhBjeFiPfPlovB8LxIxp4yobkVL2Muf.jpeg', 'image', 3, 'App\\Drone', '2020-03-06 13:59:49', '2020-03-06 13:59:49');

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2016_06_01_000001_create_oauth_auth_codes_table', 1),
(4, '2016_06_01_000002_create_oauth_access_tokens_table', 1),
(5, '2016_06_01_000003_create_oauth_refresh_tokens_table', 1),
(6, '2016_06_01_000004_create_oauth_clients_table', 1),
(7, '2016_06_01_000005_create_oauth_personal_access_clients_table', 1),
(8, '2020_02_16_060725_create_drones_table', 1),
(9, '2020_02_17_072629_create_images_table', 1),
(10, '2020_02_17_185457_create_flight_plans_table', 1),
(11, '2020_02_18_150946_create_pilots_table', 1);

-- --------------------------------------------------------

--
-- Table structure for table `oauth_access_tokens`
--

CREATE TABLE `oauth_access_tokens` (
  `id` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` bigint(20) DEFAULT NULL,
  `client_id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `scopes` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `revoked` tinyint(1) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `expires_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `oauth_access_tokens`
--

INSERT INTO `oauth_access_tokens` (`id`, `user_id`, `client_id`, `name`, `scopes`, `revoked`, `created_at`, `updated_at`, `expires_at`) VALUES
('20fdea963f14f9be279aa3061f934fc995cbd14afabe56832c2c644b092b6a9bb1b96cc52fd96fb4', 7, 1, 'DroneManagement', '[]', 0, '2020-03-06 14:39:06', '2020-03-06 14:39:06', '2021-03-06 20:09:06'),
('9b394c35d0f48f3bb4ec256196bf965ec309bf9ebd805b478e4eb63f2fece65f063715adc13cb8a6', 3, 1, 'DroneManagement', '[]', 0, '2020-03-02 02:39:28', '2020-03-02 02:39:28', '2021-03-02 08:09:28'),
('b4d48d169b3fe838073db94df8b48e9047bdad584a55d021d56b847fbb3fd5b8736d637ae33e05bb', 1, 1, 'DroneManagement', '[]', 0, '2020-03-02 02:16:17', '2020-03-02 02:16:17', '2021-03-02 07:46:17');

-- --------------------------------------------------------

--
-- Table structure for table `oauth_auth_codes`
--

CREATE TABLE `oauth_auth_codes` (
  `id` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` bigint(20) NOT NULL,
  `client_id` int(10) UNSIGNED NOT NULL,
  `scopes` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `revoked` tinyint(1) NOT NULL,
  `expires_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `oauth_clients`
--

CREATE TABLE `oauth_clients` (
  `id` int(10) UNSIGNED NOT NULL,
  `user_id` bigint(20) DEFAULT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `secret` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `redirect` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `personal_access_client` tinyint(1) NOT NULL,
  `password_client` tinyint(1) NOT NULL,
  `revoked` tinyint(1) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `oauth_clients`
--

INSERT INTO `oauth_clients` (`id`, `user_id`, `name`, `secret`, `redirect`, `personal_access_client`, `password_client`, `revoked`, `created_at`, `updated_at`) VALUES
(1, NULL, 'DroneManagement Personal Access Client', 'XxrfytAWAKjzj0zYXHp0ntHP8yWQPeXwB4QZjjqA', 'http://localhost', 1, 0, 0, '2020-03-02 02:13:25', '2020-03-02 02:13:25'),
(2, NULL, 'DroneManagement Password Grant Client', 'W7xvOj0AWPR82SdJG0Wcllv2SxACmyeZ3wtjXhDO', 'http://localhost', 0, 1, 0, '2020-03-02 02:13:25', '2020-03-02 02:13:25');

-- --------------------------------------------------------

--
-- Table structure for table `oauth_personal_access_clients`
--

CREATE TABLE `oauth_personal_access_clients` (
  `id` int(10) UNSIGNED NOT NULL,
  `client_id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `oauth_personal_access_clients`
--

INSERT INTO `oauth_personal_access_clients` (`id`, `client_id`, `created_at`, `updated_at`) VALUES
(1, 1, '2020-03-02 02:13:25', '2020-03-02 02:13:25');

-- --------------------------------------------------------

--
-- Table structure for table `oauth_refresh_tokens`
--

CREATE TABLE `oauth_refresh_tokens` (
  `id` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `access_token_id` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `revoked` tinyint(1) NOT NULL,
  `expires_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
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
(1, 5, 4, '2020-03-06 14:04:30', '2020-03-06 14:04:30', NULL),
(2, 6, 4, '2020-03-06 14:04:36', '2020-03-06 14:04:36', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `dob` date DEFAULT NULL,
  `gender` int(10) UNSIGNED DEFAULT NULL,
  `state` int(11) DEFAULT NULL,
  `type` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `role` int(11) NOT NULL DEFAULT 2,
  `city` int(11) DEFAULT NULL,
  `address` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `phone` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `dob`, `gender`, `state`, `type`, `role`, `city`, `address`, `phone`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'Ravi', 'ravi@gmai.com', NULL, NULL, NULL, 'operator', 1, NULL, NULL, NULL, NULL, '$2y$10$wUmKQqKitqCzoHW/wG6kE.fFl8oy9ys1viqwWIi0vQGUcDyCBPPLK', NULL, '2020-03-02 02:16:14', '2020-03-02 02:16:14', NULL),
(3, 'Ravis', 'ravis@gmai.com', NULL, NULL, NULL, 'operator', 1, NULL, NULL, NULL, NULL, '$2y$10$vMYWIXnOmnrsDbCNRZkZGe.f2OsaKnPkjjP7p8jYd5KkhAH4L8GZi', NULL, '2020-03-02 02:39:28', '2020-03-02 02:39:28', NULL),
(4, 'Anwarul Haque', 'anwarulhaque321@gmail.com', NULL, NULL, NULL, 'operator', 1, NULL, NULL, NULL, NULL, '$2y$10$QrGazDqtAJ4Ike7fVOLLI.X7ufgJREWjyZq0MBC.A.7oziKMtMMOi', 'hvG3JMEifQBOQ3IiJ7GCdNzyx7Hj96SKS8Q7KeSxAcgoaZSVwMBKGKWcV2z4', '2020-03-03 09:51:11', '2020-03-03 09:51:11', NULL),
(5, 'aaa', 'aaa@gmail.com', NULL, NULL, NULL, 'pilot', 2, NULL, NULL, NULL, NULL, '$2y$10$W7XWPNZu/obwVcQ1Q/lYzOV7fsO.JbYWVv9mYX3xxFGJPprljaoAG', 'I3spiSNOU5YoLnMUFgkiqRUCkhA3UFiGMbeO5GETr2BP7h2uTQ1b9y6rtRbo', '2020-03-06 14:02:46', '2020-03-06 14:02:46', NULL),
(6, 'bbb', 'bbb@gmail.com', NULL, NULL, NULL, 'pilot', 2, NULL, NULL, NULL, NULL, '$2y$10$3ib0AeusobTzgDUoWnaQSuRqmOr8Ly5GFjeIY1ovKbhsFSbGrKK3i', 'Wh0OLyuIPnHo6egH0uFB02U8JoZn8jNc15N3C79nSrrtzOfF6kxh2PUbjPjc', '2020-03-06 14:03:13', '2020-03-06 14:03:13', NULL),
(7, 'ccc', 'ccc@gmail.com', NULL, NULL, NULL, 'pilot', 2, NULL, NULL, NULL, NULL, '$2y$10$Ay9o6/EruvJdTTfrALMtt.Inbb8uVOtYLk/e4xM5tV7sy/foC9poC', 'Sl13yQox1o9pxTiMM681EJ83h12Rm95i9QQZFbJtX0mnpflJmLxCNxvgU7vl', '2020-03-06 14:03:40', '2020-03-06 14:03:40', NULL),
(8, 'admin', 'admin@gmail.com', NULL, NULL, NULL, 'admin', 3, NULL, NULL, NULL, NULL, '$2y$10$GFV97TFNJDpRNcfVHM5lzuzuZnvLFuXuWN7srhd.qdjslduo/Xr6i', 'LGjDUpR1kx47Pqx0QJptRAE5RHTmZQgusl8K4W5OmGVRKo8iaqGntU1PuEQA', '2020-03-06 14:07:50', '2020-03-06 14:07:50', NULL),
(9, 'Bnest', 'bnest@smartbhopal.city', NULL, NULL, NULL, 'admin', 3, NULL, NULL, NULL, NULL, '$2y$10$pHtL5Rygxq0.P08BvYwsoOXSdIEhBiaN7O.HhiCNqncpoLDRLSgHy', 'fhqTPcikPyiv8g4nKlghJx7DLMyhnzWHPF99V3zvvFaHJuo2vHmievXIdmlD', '2020-03-06 14:43:04', '2020-03-06 14:43:04', NULL),
(10, 'Admin', 'admin@jarvislabs.in', NULL, NULL, NULL, 'admin', 3, NULL, NULL, NULL, NULL, '$2y$10$vfXCMf3hs5JsuLSf1nvqeey8mnBibRM1scIlDiSRlWkU1ay/l0dEK', NULL, '2020-03-06 14:44:18', '2020-03-06 14:44:18', NULL);

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
-- Indexes for table `oauth_access_tokens`
--
ALTER TABLE `oauth_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD KEY `oauth_access_tokens_user_id_index` (`user_id`);

--
-- Indexes for table `oauth_auth_codes`
--
ALTER TABLE `oauth_auth_codes`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `oauth_clients`
--
ALTER TABLE `oauth_clients`
  ADD PRIMARY KEY (`id`),
  ADD KEY `oauth_clients_user_id_index` (`user_id`);

--
-- Indexes for table `oauth_personal_access_clients`
--
ALTER TABLE `oauth_personal_access_clients`
  ADD PRIMARY KEY (`id`),
  ADD KEY `oauth_personal_access_clients_client_id_index` (`client_id`);

--
-- Indexes for table `oauth_refresh_tokens`
--
ALTER TABLE `oauth_refresh_tokens`
  ADD PRIMARY KEY (`id`),
  ADD KEY `oauth_refresh_tokens_access_token_id_index` (`access_token_id`);

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
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `flight_plans`
--
ALTER TABLE `flight_plans`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `images`
--
ALTER TABLE `images`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `oauth_clients`
--
ALTER TABLE `oauth_clients`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `oauth_personal_access_clients`
--
ALTER TABLE `oauth_personal_access_clients`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `pilots`
--
ALTER TABLE `pilots`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

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
