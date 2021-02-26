-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 26, 2021 at 12:56 PM
-- Server version: 10.4.17-MariaDB
-- PHP Version: 8.0.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `laravel_fundamental`
--

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `name`, `slug`, `created_at`, `updated_at`) VALUES
(1, 'Framework', 'framework', '2020-09-08 07:26:15', '2020-09-08 07:26:15'),
(2, 'Code', 'code', '2020-09-08 07:26:15', '2020-09-08 07:26:15'),
(3, 'Android', 'android', '2020-09-08 07:26:15', '2020-09-08 07:26:15'),
(4, 'Web', 'web', '2020-09-08 07:26:16', '2020-09-08 07:26:16');

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
(137, '2014_10_12_000000_create_users_table', 1),
(138, '2014_10_12_100000_create_password_resets_table', 1),
(139, '2019_08_19_000000_create_failed_jobs_table', 1),
(140, '2020_09_05_145815_create_posts_table', 1),
(141, '2020_09_07_004042_create_categories_table', 1),
(142, '2020_09_07_005259_add_category_id_to_posts_table', 1),
(143, '2020_09_07_033124_create_tags_table', 1),
(144, '2020_09_07_033328_create_post_tag_tables', 1);

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
-- Table structure for table `posts`
--

CREATE TABLE `posts` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `category_id` bigint(20) UNSIGNED DEFAULT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `tumbnail` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `body` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `posts`
--

INSERT INTO `posts` (`id`, `category_id`, `user_id`, `tumbnail`, `title`, `slug`, `body`, `created_at`, `updated_at`) VALUES
(1, 1, 2, 'images/posts/post-pertama-dina.jpeg', 'post pertama dina', 'post-pertama-dina', 'Jakarta: Di kondisi pandemi saat ini pilihan untuk membeli laptop untuk mendukung kegiatan belajar online atau pembelajara jarak jauh pasti terlintas, terutama bagi pada mahasiswa baru. Meksipun begitu kondisi tersebut membuat kita memiliki keterbatasan dana.\r\n \r\nBeruntung, banyak produsen laptop yang menyadari kebutuhan ini sehingga mereka merilis laptop di harga terjangkau. Misalnya laptop yang baru saja Medcom.id jajal adalah HP 14S yang hadir di kisaran harga Rp5,2 juta. Kami menjajal varian dengan nomor seri HP 14S-DK1004AU.', '2020-09-08 07:27:08', '2020-09-09 18:00:14'),
(4, 2, 1, 'images/posts/post-kedua-gian.jpeg', 'post kedua gian', 'post-kedua-gian', 'ini deskripsi kedua gian', '2020-09-08 22:39:48', '2020-09-09 07:27:14'),
(10, 1, 2, 'images/posts/post-kedua-dina.jpeg', 'post kedua dina', 'post-kedua-dina', 'ini deskripsi post kedua dina dengan gambar', '2020-09-09 06:40:14', '2020-09-09 06:40:14'),
(11, 1, 3, 'images/posts/post-pertama-lukman.jpeg', 'post pertama lukman', 'post-pertama-lukman', 'ini deskripsi post pertama lukman dengan gambar', '2020-09-09 07:13:17', '2020-09-09 07:13:17'),
(12, 1, 3, 'images/posts/post-kedua-lukman.jpeg', 'post kedua lukman', 'post-kedua-lukman', 'ini deskripsi post kedua lukman', '2020-09-09 07:21:46', '2020-09-09 07:23:23'),
(13, 2, 1, NULL, 'ini post pertama gian', 'ini-post-pertama-gian', 'ini deskripsi post pertama gian', '2020-09-09 07:31:43', '2020-09-09 07:31:43'),
(14, 1, 1, NULL, 'post ketiga gian', 'post-ketiga-gian', 'ini deskripsi post ketiga gian', '2020-09-09 20:54:32', '2020-09-09 20:54:32'),
(15, 3, 1, 'images/posts/post-keempat-gian.jpeg', 'post keempat gian', 'post-keempat-gian', 'ini deskripsi post keempat gian', '2020-09-09 20:55:09', '2020-09-09 20:55:09');

-- --------------------------------------------------------

--
-- Table structure for table `post_tag`
--

CREATE TABLE `post_tag` (
  `post_id` bigint(20) UNSIGNED NOT NULL,
  `tag_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `post_tag`
--

INSERT INTO `post_tag` (`post_id`, `tag_id`) VALUES
(1, 1),
(1, 2),
(4, 3),
(4, 4),
(7, 2),
(10, 2),
(11, 1),
(12, 2),
(13, 4),
(14, 1),
(15, 6);

-- --------------------------------------------------------

--
-- Table structure for table `tags`
--

CREATE TABLE `tags` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `tags`
--

INSERT INTO `tags` (`id`, `name`, `slug`, `created_at`, `updated_at`) VALUES
(1, 'Laravel', 'laravel', '2020-09-08 07:26:16', '2020-09-08 07:26:16'),
(2, 'ReactJS', 'reactjs', '2020-09-08 07:26:16', '2020-09-08 07:26:16'),
(3, 'PHP', 'php', '2020-09-08 07:26:16', '2020-09-08 07:26:16'),
(4, 'Javascript', 'javascript', '2020-09-08 07:26:16', '2020-09-08 07:26:16'),
(5, 'HTML', 'html', '2020-09-08 07:26:16', '2020-09-08 07:26:16'),
(6, 'React Native', 'react-native', '2020-09-08 07:26:16', '2020-09-08 07:26:16'),
(7, 'Swift', 'swift', '2020-09-08 07:26:16', '2020-09-08 07:26:16');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `username` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `username`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Gian nurwana', 'giannurwana', 'gian@gmail.com', NULL, '$2y$10$Wrs.xW3aEb172N.ISwFOauymEevV8LT2Rm8ARU8Jiq/n3yrcYRIZG', NULL, '2020-09-08 07:26:15', '2020-09-08 07:26:15'),
(2, 'Dina Alenda', 'dina', 'dina@gmail.com', NULL, '$2y$10$JI/QdklmbxYZiuaO1rxW2.znr2vewGBSMNUJsgZMdJEDVOhoLX4jO', NULL, '2020-09-08 07:26:15', '2020-09-08 07:26:15'),
(3, 'lukman Hudzaifah', 'lukman', 'lukman@gmail.com', NULL, '$2y$10$pfQ6SAqahblAfs6hoVXreuW1amhbmJHMnbwgh.UH82wHqXOuNI2a.', NULL, '2020-09-09 00:27:04', '2020-09-09 00:27:04');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
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
-- Indexes for table `posts`
--
ALTER TABLE `posts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `post_tag`
--
ALTER TABLE `post_tag`
  ADD PRIMARY KEY (`post_id`,`tag_id`);

--
-- Indexes for table `tags`
--
ALTER TABLE `tags`
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
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=145;

--
-- AUTO_INCREMENT for table `posts`
--
ALTER TABLE `posts`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `tags`
--
ALTER TABLE `tags`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
