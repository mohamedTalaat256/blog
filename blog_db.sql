-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 03, 2023 at 09:00 PM
-- Server version: 10.4.25-MariaDB
-- PHP Version: 8.1.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `travels`
--

-- --------------------------------------------------------

--
-- Table structure for table `admins`
--

CREATE TABLE `admins` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `job` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `is_super` int(11) NOT NULL,
  `phone` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `admins`
--

INSERT INTO `admins` (`id`, `name`, `email`, `password`, `job`, `is_super`, `phone`, `image`, `created_at`, `updated_at`) VALUES
(1, 'mido', 'mido@gmail.com', '$2y$10$eC38biKTBRi26XPERjNYH.OW.PQE6yUDQgHeaeE/IftV8x6Ho2rea', 'admin', 0, '01068027989', '16515799276080DE51-9E54-4C4C-A7EF-ACD9ECE61015.JPG', NULL, '2023-05-02 15:11:46'),
(2, 'Ahmed Makram', 'admin@admin.com', '$2y$10$H4Cin.UKrzVptzdh9qLuV.ZCbjavcm8jK7COAE16S5gtGzVf5HY/y', 'Dev', 1, '', 'AM.jpg', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `comments`
--

CREATE TABLE `comments` (
  `id` int(11) NOT NULL,
  `post_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `comment` text NOT NULL,
  `date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `comments`
--

INSERT INTO `comments` (`id`, `post_id`, `user_id`, `comment`, `date`, `deleted_at`, `created_at`, `updated_at`) VALUES
(1, 8, 5, 'cool post', '2023-05-03 16:23:43', '0000-00-00 00:00:00', '2023-05-03 16:51:37', NULL),
(2, 8, 5, 'cool post', '2023-05-03 16:23:56', '0000-00-00 00:00:00', '2023-05-03 16:51:37', NULL),
(4, 9, 5, 'asdfasdasdfasdfsadf', '2023-05-03 17:24:36', '0000-00-00 00:00:00', '2023-05-03 14:24:36', '2023-05-03 14:24:36'),
(5, 8, 5, 'mohamed', '2023-05-03 17:25:48', '0000-00-00 00:00:00', '2023-05-03 14:25:48', '2023-05-03 14:25:48'),
(6, 9, 5, 'zxcvzxcvzxcv', '2023-05-03 17:39:29', NULL, '2023-05-03 14:39:29', '2023-05-03 14:39:29'),
(7, 9, 5, 'mohamed talaat commmet soft delete', '2023-05-03 17:40:03', '2023-05-03 14:40:03', '2023-05-03 14:39:47', '2023-05-03 14:40:03'),
(8, 9, 5, 'this is a comment', '2023-05-03 18:23:39', NULL, '2023-05-03 15:23:39', '2023-05-03 15:23:39');

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
(3, '2022_02_21_200557_create_posts_table', 1),
(4, '2022_02_21_214535_create_sources_table', 2),
(5, '2022_02_26_205349_create_relateds_table', 3),
(6, '2014_01_07_073615_create_tagged_table', 4),
(7, '2014_01_07_073615_create_tags_table', 4),
(8, '2016_06_29_073615_create_tag_groups_table', 4),
(9, '2016_06_29_073615_update_tags_table', 4),
(10, '2020_03_13_083515_add_description_to_tags_table', 4),
(11, '2019_12_14_000001_create_personal_access_tokens_table', 5);

-- --------------------------------------------------------

--
-- Table structure for table `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tokenable_type` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tokenable_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `abilities` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `related`
--

CREATE TABLE `related` (
  `id` int(11) NOT NULL,
  `name` text NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `related`
--

INSERT INTO `related` (`id`, `name`, `created_at`, `updated_at`) VALUES
(1, 'Maintenance', '2022-02-28 11:16:44', '2022-04-18 16:57:44'),
(2, 'Cabin Crew', '2022-02-28 11:16:53', '2022-02-28 11:16:53'),
(3, 'Tickets', '2022-02-28 11:17:04', '2022-02-28 11:17:04'),
(4, 'Baggage', '2022-02-28 11:18:53', '2022-02-28 11:18:53'),
(5, 'Catering Services', '2022-02-28 11:19:47', '2022-02-28 11:19:47'),
(6, 'Call Center', '2022-02-28 11:20:07', '2022-02-28 11:20:07'),
(7, 'Station', '2022-02-28 11:20:21', '2022-02-28 11:20:21'),
(8, 'WE Care', '2022-03-01 10:23:34', '2022-03-01 10:23:34'),
(9, 'Website', '2022-04-10 01:55:56', '2022-04-10 01:55:56'),
(10, 'Customer Service', '2022-04-10 01:56:29', '2022-04-10 01:56:29');

-- --------------------------------------------------------

--
-- Table structure for table `requests`
--

CREATE TABLE `requests` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `content` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `title` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `user` int(11) NOT NULL,
  `seen` tinyint(1) NOT NULL DEFAULT 0,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `requests`
--

INSERT INTO `requests` (`id`, `content`, `title`, `image`, `user`, `seen`, `deleted_at`, `created_at`, `updated_at`) VALUES
(9, 'sadfasdfaasdfasdfasdfasdf', 'mohamed', 'page3instructions.png', 5, 0, NULL, '2023-05-03 16:08:32', '2023-05-03 15:12:15'),
(10, 'dfgsdfgsdfgsdfgsdfgsdfgsdfgsdfgsdfg', 'wegwgs', 'video_bg.png', 5, 0, '2023-05-03 14:38:43', '2023-05-03 17:38:28', '2023-05-03 14:38:43');

-- --------------------------------------------------------

--
-- Table structure for table `sources`
--

CREATE TABLE `sources` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `desc` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `color` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `sources`
--

INSERT INTO `sources` (`id`, `name`, `desc`, `image`, `color`, `created_at`, `updated_at`) VALUES
(1, 'Facebook', 'Posts, Comments', '<i class=\" fab fa-facebook text-primary icon-2x mr-2\"></i>', '#3445E5', NULL, '2022-02-24 15:02:44'),
(2, 'Twitter', 'Posts, Comments', '<i class=\" fab fa-twitter text-info icon-2x mr-2\"></i>', '#8950FC', NULL, '2022-02-24 15:02:49'),
(3, 'Youtube', 'videos, comments', '<i class=\"  fab fa-youtube text-danger icon-2x mr-2\"></i>', '#F64E60', '2022-02-22 17:43:55', '2022-02-24 15:02:55'),
(4, 'Instagram', 'posts, comments', '<i class=\" fab fa-instagram text-danger icon-2x mr-2\"></i>', '#F64E60', '2022-02-22 17:51:23', '2022-02-24 15:03:02'),
(5, 'Google', 'posts, comments', '<i class=\"  fab fa-google text-primary icon-2x mr-2\"></i>', '#3445E5', '2022-02-22 21:48:15', '2022-02-24 15:03:06'),
(6, 'LinkedIn', 'calls, sms', '<i class=\"  fab fa-linkedin text-success icon-2x mr-5\"></i>', '#1BC5BD', '2022-02-22 21:53:34', '2022-02-24 15:03:12'),
(7, 'Tiktok', 'tiktok', '<i class=\"fab fa-tiktok  text-dark icon-2x mr-2\"></i>', '#000', NULL, NULL),
(8, 'Newspaper', 'Newspaper', ' <i class=\"far fa-newspaper text-dark icon-2x mr-2\"></i> ', '#666666', NULL, NULL),
(9, 'Others', 'Others', '<i class=\" fas fa-globe text-info icon-2x mr-2\"></i>', '#4200BF', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `types`
--

CREATE TABLE `types` (
  `id` int(11) NOT NULL,
  `name` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `types`
--

INSERT INTO `types` (`id`, `name`) VALUES
(1, 'Social Post'),
(2, 'Article'),
(3, 'Ads'),
(4, 'Opinion'),
(5, 'Blog'),
(6, 'Others');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nikname` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `letter` varchar(1) COLLATE utf8mb4_unicode_ci NOT NULL,
  `code` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `job` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `progress` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `nikname`, `letter`, `code`, `password`, `phone`, `image`, `job`, `progress`, `created_at`, `updated_at`) VALUES
(1, 'Ahmed Makram', 'admin@admin.com', '0', '', '', '$2y$10$dh0.P7336haPx.L5ig/sNeA9B8zrWAUpcLrGiUS7LYw.7Km/erVAu', 'Admin', 'AM.jpg', 'Admin', 1, NULL, '2022-04-04 18:02:25'),
(2, 'Ihab Mahmoud', 'ihab@socialmedia.com', '0', '', '', '$2y$10$GLyq7sw2h41I/Bz/Bpqoru7Sq7Es0BRIfYO5balpa7K/zkBunGJUK', 'Editor', 'Ihab.jpg', 'Editor', 0, NULL, '2022-04-03 13:00:31'),
(5, 'mona', 'ola@socialmedia.com', 'lola', 'A', 'Asd', '$2y$10$eC38biKTBRi26XPERjNYH.OW.PQE6yUDQgHeaeE/IftV8x6Ho2rea', 'Editor', '16515716146f6794e6b53042f2c9433fb9a30f3588.jpg', 'Editor', 0, NULL, '2023-05-01 06:34:03');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admins`
--
ALTER TABLE `admins`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `admins_email_unique` (`email`);

--
-- Indexes for table `comments`
--
ALTER TABLE `comments`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indexes for table `related`
--
ALTER TABLE `related`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `requests`
--
ALTER TABLE `requests`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sources`
--
ALTER TABLE `sources`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `types`
--
ALTER TABLE `types`
  ADD PRIMARY KEY (`id`);

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
-- AUTO_INCREMENT for table `admins`
--
ALTER TABLE `admins`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `comments`
--
ALTER TABLE `comments`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `related`
--
ALTER TABLE `related`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `requests`
--
ALTER TABLE `requests`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `sources`
--
ALTER TABLE `sources`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `types`
--
ALTER TABLE `types`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
