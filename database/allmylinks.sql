-- phpMyAdmin SQL Dump
-- version 5.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 05, 2020 at 03:14 PM
-- Server version: 10.4.11-MariaDB
-- PHP Version: 7.4.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `allmylinks`
--

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `links`
--

CREATE TABLE `links` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` int(11) NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `user_links` varchar(1000) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `links`
--

INSERT INTO `links` (`id`, `user_id`, `title`, `user_links`, `created_at`, `updated_at`) VALUES
(1, 1, 'myFirstLink', 'http://localhost:8000/', '2020-08-05 01:26:37', '2020-08-05 03:28:00'),
(2, 1, 'Nursery', 'https://www.w3schools.com/bootstrap/tryit.asp?filename=trybs_table_basic&stacked=h', '2020-08-05 01:42:11', '2020-08-05 01:42:11'),
(3, 1, 'google', 'https://linkkle.com/users/links', '2020-08-05 01:47:13', '2020-08-05 01:47:13'),
(4, 2, 'Nursery', 'http://localhost:8000/profile', '2020-08-05 05:54:46', '2020-08-05 05:54:46'),
(5, 3, 'LKG', 'https://www.w3schools.com/bootstrap/tryit.asp?filename=trybs_table_basic&stacked=h', '2020-08-05 06:33:28', '2020-08-05 06:33:28'),
(6, 4, 'vivo', 'https://www.w3schools.com/bootstrap/tryit.asp?filename=trybs_table_basic&stacked=h', '2020-08-05 07:34:31', '2020-08-05 07:34:31');

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
(16, '2014_10_12_000000_create_users_table', 1),
(17, '2014_10_12_100000_create_password_resets_table', 1),
(18, '2019_08_19_000000_create_failed_jobs_table', 1),
(19, '2020_08_05_041534__create_profile_table_', 1),
(20, '2020_08_05_041742__create_link_table_', 1);

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
-- Table structure for table `profile`
--

CREATE TABLE `profile` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` int(11) NOT NULL,
  `user_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `location` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `profile_image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `gravatar_email` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `bio` varchar(1000) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `is_profile_public` tinyint(1) NOT NULL DEFAULT 1,
  `user_bio_color` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `profile`
--

INSERT INTO `profile` (`id`, `user_id`, `user_name`, `location`, `profile_image`, `gravatar_email`, `bio`, `is_profile_public`, `user_bio_color`, `created_at`, `updated_at`) VALUES
(10, 1, 'Rishabh', 'nandapur district', 'allMyLinksProfile_paney.annu19@gmail.com.jpg', 'annu@gmail.com', 'my bio', 1, '#000000', '2020-08-05 00:40:15', '2020-08-05 02:14:19'),
(11, 2, 'Amit ', 'Bihra', 'allMyLinksProfile_rishabh05071998@gmail.com.png', 'amit@gmail.com', 'I am amit', 1, '#000000', '2020-08-05 06:00:19', '2020-08-05 06:00:19'),
(12, 3, 'Ankita', 'akbarpur', 'allMyLinksProfile_pandey.rajat05@gmail.com.png', 'ankita@gmail.com', 'Hello My name is ankita', 1, '#000000', '2020-08-05 06:32:50', '2020-08-05 06:32:50'),
(13, 4, 'vivo', 'mumbai', 'allMyLinksProfile_test@gmail.com.png', 'vivo@gmail.com', 'hello vivo', 1, '#000000', '2020-08-05 07:34:09', '2020-08-05 07:34:09');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `is_email_verified` tinyint(1) DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `is_email_verified`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Harsh', 'paney.annu19@gmail.com', 1, '$2y$10$k1UKR47TyWtJOrJMnBS/F.PhyO1lfDYqtcufIckFW1/.ag/gjXFge', NULL, '2020-08-04 23:29:57', '2020-08-05 02:41:21'),
(2, 'Amit', 'rishabh05071998@gmail.com', 1, '$2y$10$XQA9RRMOpwLAlR2JfEYNkO8OaPHAKEWFneK0IgCgc9qL2LgDHgMsa', NULL, '2020-08-05 04:46:45', '2020-08-05 06:18:51'),
(3, 'Ankita', 'pandey.rajat05@gmail.com', 1, '$2y$10$0y0e4NWkDbF3jGxgjBvJw.fZnD6uKsbov/X.mtmykdITAUSPazvD6', NULL, '2020-08-05 06:28:02', '2020-08-05 06:33:02'),
(4, 'Vivo', 'test@gmail.com', 1, '$2y$10$.hrlJvMVVYHn4RLzBcnUSOShqUrOlLFLXXuZMzSJ7kMo8gsaSpMfa', NULL, '2020-08-05 07:32:16', '2020-08-05 07:32:16');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `links`
--
ALTER TABLE `links`
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
-- Indexes for table `profile`
--
ALTER TABLE `profile`
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
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `links`
--
ALTER TABLE `links`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `profile`
--
ALTER TABLE `profile`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
