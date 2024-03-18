-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 10, 2024 at 08:25 PM
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
-- Database: `blooger`
--

-- --------------------------------------------------------

--
-- Table structure for table `comments`
--

CREATE TABLE `comments` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `post_id` bigint(20) UNSIGNED NOT NULL,
  `content` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `comments`
--

INSERT INTO `comments` (`id`, `user_id`, `post_id`, `content`, `created_at`, `updated_at`) VALUES
(1, 2, 2, 'Leon, shoot those barrels on that wagon!', '2024-03-08 20:15:59', '2024-03-08 20:15:59'),
(2, 3, 3, 'Sorry about that. When I saw the uniform, I thought you were another zombie.', '2024-03-08 20:20:49', '2024-03-08 20:20:49'),
(3, 3, 1, 'You\'ll be in danger if you decide to stay with me. I know I\'ve only known you for a short time, but I really do enjoy being with you.', '2024-03-08 20:21:33', '2024-03-08 20:21:33'),
(4, 3, 5, 'Good.', '2024-03-08 20:23:32', '2024-03-08 20:23:32'),
(5, 1, 9, 'At your service ma\'am.', '2024-03-08 20:46:04', '2024-03-08 20:46:04'),
(6, 1, 6, 'Right? lol', '2024-03-08 20:46:26', '2024-03-08 20:46:26'),
(7, 1, 10, 'hello', '2024-03-08 21:39:38', '2024-03-08 21:39:38'),
(8, 3, 11, '??????', '2024-03-08 22:48:31', '2024-03-08 22:48:31'),
(9, 4, 12, 'Hi leon!', '2024-03-09 17:12:13', '2024-03-09 17:12:13'),
(10, 5, 12, 'hi leon!', '2024-03-09 18:21:36', '2024-03-09 18:21:36'),
(11, 5, 8, 'wtf?', '2024-03-09 18:22:25', '2024-03-09 18:22:25'),
(15, 1, 15, 'Don\'t delete this comment', '2024-03-10 14:52:16', '2024-03-10 14:52:16');

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(255) NOT NULL,
  `connection` text NOT NULL,
  `queue` text NOT NULL,
  `payload` longtext NOT NULL,
  `exception` longtext NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `like_post`
--

CREATE TABLE `like_post` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `post_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `like_post`
--

INSERT INTO `like_post` (`id`, `user_id`, `post_id`, `created_at`, `updated_at`) VALUES
(1, 2, 4, '2024-03-08 20:15:09', '2024-03-08 20:15:09'),
(2, 2, 3, '2024-03-08 20:15:11', '2024-03-08 20:15:11'),
(3, 2, 2, '2024-03-08 20:15:13', '2024-03-08 20:15:13'),
(4, 2, 1, '2024-03-08 20:15:17', '2024-03-08 20:15:17'),
(5, 3, 3, '2024-03-08 20:20:53', '2024-03-08 20:20:53'),
(6, 3, 1, '2024-03-08 20:21:35', '2024-03-08 20:21:35'),
(7, 3, 4, '2024-03-08 20:22:16', '2024-03-08 20:22:16'),
(8, 3, 8, '2024-03-08 20:23:14', '2024-03-08 20:23:14'),
(9, 1, 10, '2024-03-08 20:45:38', '2024-03-08 20:45:38'),
(10, 1, 9, '2024-03-08 20:45:41', '2024-03-08 20:45:41'),
(11, 1, 6, '2024-03-08 20:46:15', '2024-03-08 20:46:15'),
(12, 1, 8, '2024-03-08 20:59:52', '2024-03-08 20:59:52'),
(13, 1, 7, '2024-03-08 20:59:57', '2024-03-08 20:59:57'),
(15, 3, 11, '2024-03-08 22:19:53', '2024-03-08 22:19:53'),
(16, 3, 7, '2024-03-08 23:08:42', '2024-03-08 23:08:42'),
(17, 1, 11, '2024-03-09 01:38:09', '2024-03-09 01:38:09'),
(18, 4, 12, '2024-03-09 17:12:09', '2024-03-09 17:12:09'),
(19, 3, 14, '2024-03-09 17:53:30', '2024-03-09 17:53:30'),
(20, 5, 11, '2024-03-09 18:18:27', '2024-03-09 18:18:27'),
(21, 5, 13, '2024-03-09 18:18:30', '2024-03-09 18:18:30'),
(22, 5, 4, '2024-03-09 18:18:35', '2024-03-09 18:18:35'),
(23, 5, 5, '2024-03-09 18:18:40', '2024-03-09 18:18:40'),
(24, 5, 15, '2024-03-09 18:20:13', '2024-03-09 18:20:13'),
(25, 5, 10, '2024-03-09 18:20:17', '2024-03-09 18:20:17'),
(26, 5, 7, '2024-03-09 18:20:19', '2024-03-09 18:20:19'),
(27, 5, 14, '2024-03-09 18:39:49', '2024-03-09 18:39:49'),
(29, 1, 14, '2024-03-09 20:11:39', '2024-03-09 20:11:39');

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_reset_tokens_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(5, '2024_02_29_182034_create_posts_table', 1),
(6, '2024_03_03_152914_create_comments_table', 1),
(7, '2024_03_05_183628_add_bio_and_image_to_users', 1),
(8, '2024_03_06_151442_create_user_follower_table', 1),
(9, '2024_03_06_184818_drop_likes_from_posts', 1),
(10, '2024_03_06_185105_create_like_post_table', 1),
(11, '2024_03_08_214745_add_is_admin_to_users', 2);

-- --------------------------------------------------------

--
-- Table structure for table `password_reset_tokens`
--

CREATE TABLE `password_reset_tokens` (
  `email` varchar(255) NOT NULL,
  `token` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) NOT NULL,
  `tokenable_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `token` varchar(64) NOT NULL,
  `abilities` text DEFAULT NULL,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `expires_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `posts`
--

CREATE TABLE `posts` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `content` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `posts`
--

INSERT INTO `posts` (`id`, `user_id`, `content`, `created_at`, `updated_at`) VALUES
(1, 1, 'If I could just forget what happened that night, the pain—even for a second. This time, it can be different. It has to', '2024-03-08 20:09:46', '2024-03-08 20:09:46'),
(2, 1, 'I\'m Sure You Boys Didn\'t Just Tag Along So We Can Sing Kumbaya...', '2024-03-08 20:10:27', '2024-03-08 20:10:27'),
(3, 1, 'Is It Just Me, Or Does Everybody Always Ignore What I Say?', '2024-03-08 20:10:35', '2024-03-08 20:10:35'),
(4, 1, 'I... I Just Shot The President.', '2024-03-08 20:10:42', '2024-03-08 20:10:42'),
(5, 2, 'Leon, I think they shot something in my neck.', '2024-03-08 20:16:56', '2024-03-08 20:16:56'),
(6, 2, 'Talk about near-death experience.', '2024-03-08 20:17:07', '2024-03-08 20:17:07'),
(7, 3, 'Heard of the Umbrella corporation? They\'re a pharmaceutical company secretly making bioweapons. They have a virus - it turns people into indestructible monsters.', '2024-03-08 20:22:07', '2024-03-08 20:22:07'),
(8, 3, 'Umbrella\'s lab, right beneath us. Annette let it slip, that\'s where the virus samples are. You up for this?', '2024-03-08 20:23:11', '2024-03-08 20:23:11'),
(9, 3, 'Where\'s Leon when I need him?', '2024-03-08 20:23:45', '2024-03-08 20:23:45'),
(10, 3, 'Find a way out, Leon, Before it\'s too late...Then we\'ll talk.', '2024-03-08 20:24:44', '2024-03-08 20:24:44'),
(11, 1, 'LEON KENNEDY!!!!!', '2024-03-08 21:29:23', '2024-03-08 21:29:23'),
(12, 1, 'Hi guys!', '2024-03-09 01:45:08', '2024-03-09 01:45:08'),
(13, 4, 'I miss my wife.', '2024-03-09 17:12:28', '2024-03-09 17:12:28'),
(14, 4, 'I love ChatGPT!!!', '2024-03-09 17:50:59', '2024-03-09 17:50:59'),
(15, 5, 'Hello guys!', '2024-03-09 18:18:20', '2024-03-09 18:18:20'),
(34, 110, 'Hi, this is a test for the logging functionality!', '2024-03-10 16:20:44', '2024-03-10 16:50:51');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `image` varchar(255) DEFAULT NULL,
  `bio` varchar(255) DEFAULT NULL,
  `is_admin` tinyint(1) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`, `image`, `bio`, `is_admin`) VALUES
(1, 'Leon S. Kennedy', 'leon@gmail.com', NULL, '$2y$12$9VbbeTF1lYLezyluyEK4Pu2zpiAQKkoVYdgKNJdYrI4.8GfJ.9QIi', NULL, '2024-03-08 20:07:25', '2024-03-08 21:03:10', 'profile/I1sonKABMUgHtiPbFiyVL1SqbV9HWH3VdP042PRn.jpg', 'Leon Scott Kennedy is an American of Italian descent[9] currently employed as a federal agent by the Division of Security Operations (D.S.O.), a counter-terrorism agency under direct Presidential command.', 1),
(2, 'Ashley Graham', 'ashley@gmail.com', NULL, '$2y$12$D6mZzLAJ4Ledx8bifRF4XOGyirvXZm23yCIq1AwOX6zpMibidd2RC', NULL, '2024-03-08 20:13:39', '2024-03-08 20:15:00', 'profile/7vDc8vx4XS2PihL0dsMvp7lmhzB0elXEfnfwLX1V.jpg', 'Ashley Graham (アシュリー・グラハム Ashurī Gurahamu?) (born c.1984) was the daughter of former President Graham. In 2004, Graham was victim to an international conspiracy to turn influential American citizens into hosts for a mind-control parasite', 0),
(3, 'Ada Wong', 'ada@gmail.com', NULL, '$2y$12$ZoqD3LTluhRdWnLgn7cXxeclnrunJaxpuuocRQ3SRNGhhd2eooP1O', NULL, '2024-03-08 20:19:20', '2024-03-08 20:20:13', 'profile/z9smxL9XXyVaX5vYkdz8VFSykKwkXhUGfhehMdw4.png', 'Ada Wong (エイダ・ウォン Eida Won?) is the pseudonym of an enigmatic unnamed spy of Asian-American descent. She has gained notoriety in the corporate world for being able to handle serious situations and the most difficult requests without guilt.', 0),
(4, 'James Sunderland', 'james@gmail.com', NULL, '$2y$12$tciojz3F2pQfXYKz2KkZ4OOUqK2QWZhbFJ8F5Lsf5YvtyASZEIQ0O', NULL, '2024-03-09 16:59:47', '2024-03-09 17:02:28', 'profile/cXix1BLrm9uvZSxwuE7si60vqG4a2QbHS5UjZTZK.jpg', 'James Sunderland is the protagonist of Silent Hill 2.  He has received a mysterious letter in Mary\'s handwriting, claiming that she is waiting for him in their \"special place\", somewhere in Silent Hill.', 0),
(5, 'Maka Vukovic', 'maka@gmail.com', NULL, '$2y$12$pIKavpNcqW4uhkhN3ik./OvDWJn3GJB3BYeowhT6IN9hB79fTDDaS', NULL, '2024-03-09 18:17:58', '2024-03-09 18:17:58', NULL, NULL, 0),
(110, 'Admin Adminovic', 'admin@gmail.com', NULL, '$2y$12$CTNLaNFei5u/DfAE2WHDIup.nLrW0acyAl1kBq5F32I9x9GMJNIZq', NULL, '2024-03-10 16:12:26', '2024-03-10 16:15:28', NULL, 'Ja sam admin :D', 1),
(111, 'Korisnik Korisnikovic', 'korisnik@gmail.com', NULL, '$2y$12$H2MFcvcJ9Hcmb1h8cDJ9N.xvI6NEOPoHjQdnjy/Fra4d9BtFLx7CC', NULL, '2024-03-10 16:27:38', '2024-03-10 16:27:38', NULL, NULL, 0);

-- --------------------------------------------------------

--
-- Table structure for table `user_follower`
--

CREATE TABLE `user_follower` (
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `follower_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `user_follower`
--

INSERT INTO `user_follower` (`user_id`, `follower_id`, `created_at`, `updated_at`) VALUES
(1, 2, '2024-03-08 20:17:37', '2024-03-08 20:17:37'),
(2, 3, '2024-03-08 20:20:18', '2024-03-08 20:20:18'),
(1, 3, '2024-03-08 20:20:22', '2024-03-08 20:20:22'),
(3, 1, '2024-03-08 20:45:31', '2024-03-08 20:45:31'),
(2, 1, '2024-03-08 20:46:11', '2024-03-08 20:46:11'),
(2, 4, '2024-03-09 17:49:23', '2024-03-09 17:49:23');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `comments`
--
ALTER TABLE `comments`
  ADD PRIMARY KEY (`id`),
  ADD KEY `comments_user_id_foreign` (`user_id`),
  ADD KEY `comments_post_id_foreign` (`post_id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `like_post`
--
ALTER TABLE `like_post`
  ADD PRIMARY KEY (`id`),
  ADD KEY `like_post_user_id_foreign` (`user_id`),
  ADD KEY `like_post_post_id_foreign` (`post_id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_reset_tokens`
--
ALTER TABLE `password_reset_tokens`
  ADD PRIMARY KEY (`email`);

--
-- Indexes for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indexes for table `posts`
--
ALTER TABLE `posts`
  ADD PRIMARY KEY (`id`),
  ADD KEY `posts_user_id_foreign` (`user_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- Indexes for table `user_follower`
--
ALTER TABLE `user_follower`
  ADD KEY `user_follower_user_id_foreign` (`user_id`),
  ADD KEY `user_follower_follower_id_foreign` (`follower_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `comments`
--
ALTER TABLE `comments`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `like_post`
--
ALTER TABLE `like_post`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

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
-- AUTO_INCREMENT for table `posts`
--
ALTER TABLE `posts`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=38;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=112;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `comments`
--
ALTER TABLE `comments`
  ADD CONSTRAINT `comments_post_id_foreign` FOREIGN KEY (`post_id`) REFERENCES `posts` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `comments_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `like_post`
--
ALTER TABLE `like_post`
  ADD CONSTRAINT `like_post_post_id_foreign` FOREIGN KEY (`post_id`) REFERENCES `posts` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `like_post_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `posts`
--
ALTER TABLE `posts`
  ADD CONSTRAINT `posts_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `user_follower`
--
ALTER TABLE `user_follower`
  ADD CONSTRAINT `user_follower_follower_id_foreign` FOREIGN KEY (`follower_id`) REFERENCES `users` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `user_follower_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
