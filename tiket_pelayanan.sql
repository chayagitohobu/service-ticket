-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 21, 2020 at 10:29 AM
-- Server version: 10.4.6-MariaDB
-- PHP Version: 7.4.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `tiket_pelayanan`
--

-- --------------------------------------------------------

--
-- Table structure for table `balasans`
--

CREATE TABLE `balasans` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tiket_id` int(11) DEFAULT NULL,
  `user_id` int(11) DEFAULT NULL,
  `client_id` int(11) DEFAULT NULL,
  `divisi_id` int(11) DEFAULT NULL,
  `balasan` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `file` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `balasans`
--

INSERT INTO `balasans` (`id`, `tiket_id`, `user_id`, `client_id`, `divisi_id`, `balasan`, `file`, `created_at`, `updated_at`) VALUES
(5, 11, 11, NULL, 2, '<p>asdaad</p>', '[\"1605930785-Sequence diagram.png\"]', '2020-11-20 20:53:05', '2020-11-20 20:53:05'),
(10, 13, NULL, 11, NULL, '<p>dfdsasdsdgf</p>', '[\"1605932802-1605932061-Bab II.pdf\",\"1605932802-solution.pdf\"]', '2020-11-20 21:26:42', '2020-11-20 21:26:42'),
(11, 14, 12, NULL, 3, '<p>sadfda</p>', '[\"1605933776-Panduan KP.pdf\"]', '2020-11-20 21:42:56', '2020-11-20 21:42:56');

-- --------------------------------------------------------

--
-- Table structure for table `clients`
--

CREATE TABLE `clients` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name_perusahaan` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `role` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `telp` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `clients`
--

INSERT INTO `clients` (`id`, `email`, `password`, `name`, `name_perusahaan`, `role`, `telp`, `email_verified_at`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'gschuppe@example.com', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'Amya Stroman', NULL, NULL, NULL, '2020-11-20 06:51:38', 'ZJOdSC7vY3', '2020-11-20 06:51:38', '2020-11-20 06:51:38'),
(2, 'rosario48@example.net', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'Sallie Ondricka', NULL, NULL, NULL, '2020-11-20 06:51:38', 'RoA6UvjtSq', '2020-11-20 06:51:38', '2020-11-20 06:51:38'),
(3, 'trinity.cremin@example.com', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'Scottie O\'Kon', NULL, NULL, NULL, '2020-11-20 06:51:38', 'u6PugsjyKr', '2020-11-20 06:51:38', '2020-11-20 06:51:38'),
(4, 'iboyer@example.org', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'Dax Jerde', NULL, NULL, NULL, '2020-11-20 06:51:38', 'RKgWt2GVKN', '2020-11-20 06:51:38', '2020-11-20 06:51:38'),
(5, 'tromp.mac@example.org', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'Dale Ernser', NULL, NULL, NULL, '2020-11-20 06:51:38', 'x0jbntV5eV', '2020-11-20 06:51:38', '2020-11-20 06:51:38'),
(6, 'crooks.rickie@example.org', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'Brenden Purdy', NULL, NULL, NULL, '2020-11-20 06:51:38', '7NrzOiMDBD', '2020-11-20 06:51:38', '2020-11-20 06:51:38'),
(7, 'danielle93@example.com', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'Tianna Hills', NULL, NULL, NULL, '2020-11-20 06:51:38', 'aIGlnBAuh2', '2020-11-20 06:51:38', '2020-11-20 06:51:38'),
(8, 'rosemary.altenwerth@example.com', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'Royal Rodriguez', NULL, NULL, NULL, '2020-11-20 06:51:38', 'GbKHWDHB3t', '2020-11-20 06:51:38', '2020-11-20 06:51:38'),
(9, 'branson44@example.org', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'Joyce Mitchell', NULL, NULL, NULL, '2020-11-20 06:51:38', 'dxhGM5XA2S', '2020-11-20 06:51:38', '2020-11-20 06:51:38'),
(10, 'vladimir.mckenzie@example.com', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'Shakira Sauer', NULL, NULL, NULL, '2020-11-20 06:51:38', 'zeI5kIKg6d', '2020-11-20 06:51:38', '2020-11-20 06:51:38'),
(11, 'wahyu@gmail.com', '$2y$10$1Wz2T34zTs8xTmb3Hv5jvuu4in/kMaXNmd9dI/332EhJxOhuNkBcy', 'wahyuu', 'wahyu inc', 'Manager', '12345432', NULL, NULL, '2020-11-20 20:57:46', '2020-11-21 01:37:47');

-- --------------------------------------------------------

--
-- Table structure for table `divisis`
--

CREATE TABLE `divisis` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `divisi` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `divisis`
--

INSERT INTO `divisis` (`id`, `divisi`, `created_at`, `updated_at`) VALUES
(1, 'Technology', NULL, NULL),
(2, 'Marketing', NULL, NULL),
(3, 'Human Resource', NULL, NULL),
(4, 'Finance', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
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
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2020_11_03_141407_create_divisis_table', 1),
(5, '2020_11_03_152127_create_tikets_table', 1),
(6, '2020_11_04_152456_create_balasans_table', 1),
(7, '2020_11_05_180815_create_roles_table', 1),
(8, '2020_11_06_133543_create_clients_table', 1);

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
-- Table structure for table `roles`
--

CREATE TABLE `roles` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `role` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `roles`
--

INSERT INTO `roles` (`id`, `role`, `created_at`, `updated_at`) VALUES
(1, 'admin', NULL, NULL),
(2, 'operator', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `tikets`
--

CREATE TABLE `tikets` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `client_id` int(11) DEFAULT NULL,
  `divisi_id` int(11) DEFAULT NULL,
  `judul` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `ket` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `file` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `balasan_terbaru` timestamp NULL DEFAULT NULL,
  `prioritas` enum('Rendah','Sedang','Tinggi') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'Rendah',
  `status` enum('Buka','Balasan operator','Balasan client','Tutup') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'Buka',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `tikets`
--

INSERT INTO `tikets` (`id`, `user_id`, `client_id`, `divisi_id`, `judul`, `ket`, `file`, `balasan_terbaru`, `prioritas`, `status`, `created_at`, `updated_at`) VALUES
(11, 11, NULL, 2, 'test', '<p>asdsadas</p>', '[\"1605930748-Harizaldy Cahya Pratama_G1A018057_Laporan3_Anaprancis.docx\",\"1605930748-Pendahuluan.docx\"]', '2020-11-20 20:53:50', 'Sedang', 'Buka', '2020-11-20 20:52:28', '2020-11-20 20:53:50'),
(13, NULL, 11, 3, 'sdfgsfcvb', 'sdfghjfds', '[\"1605932061-Bab II.pdf\"]', '2020-11-20 21:26:42', 'Tinggi', 'Buka', '2020-11-20 21:14:21', '2020-11-20 21:26:42'),
(14, 12, NULL, 3, 'adsfdg', '<p>asdfdsd</p>', '[\"1605933293-Cormen_Lin_Lee-Introduction_to_Algorithms_(Solutions)-EN.pdf\",\"1605933293-laporan_buku_2020-10-12_19-27-51.pdf\"]', '2020-11-20 21:42:56', 'Sedang', 'Buka', '2020-11-20 21:34:53', '2020-11-20 21:42:56');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `role_id` int(11) NOT NULL DEFAULT 2,
  `divisi_id` int(11) NOT NULL DEFAULT 1,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `telp` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
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

INSERT INTO `users` (`id`, `role_id`, `divisi_id`, `name`, `telp`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 1, 1, 'Chyna Stiedemann MD', NULL, 'devonte.thompson@example.net', '2020-11-20 06:51:30', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'qcs3cwpCva', '2020-11-20 06:51:30', '2020-11-20 06:51:30'),
(2, 2, 1, 'Daren Beatty DDS', NULL, 'christine.runolfsdottir@example.com', '2020-11-20 06:51:30', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'AJ60uOy8L4', '2020-11-20 06:51:30', '2020-11-20 06:51:30'),
(3, 2, 1, 'Magdalena Dibbert', NULL, 'kub.jared@example.com', '2020-11-20 06:51:30', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'T1zELdWyRK', '2020-11-20 06:51:30', '2020-11-20 06:51:30'),
(4, 2, 1, 'Dr. Adriel Bahringer', NULL, 'rcrooks@example.net', '2020-11-20 06:51:30', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'xjCzblk8iG', '2020-11-20 06:51:30', '2020-11-20 06:51:30'),
(5, 2, 1, 'Shakira Fisher', NULL, 'welch.arvilla@example.net', '2020-11-20 06:51:30', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', '13Q2ugLPdm', '2020-11-20 06:51:30', '2020-11-20 06:51:30'),
(6, 2, 1, 'Richmond Connelly', NULL, 'twolff@example.com', '2020-11-20 06:51:30', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'vBHa9o8vOt', '2020-11-20 06:51:30', '2020-11-20 06:51:30'),
(7, 2, 1, 'Maia Vandervort', NULL, 'mclaughlin.demetrius@example.org', '2020-11-20 06:51:30', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', '1j4MT0MHEn', '2020-11-20 06:51:30', '2020-11-20 06:51:30'),
(8, 2, 1, 'Waldo Beahan', NULL, 'patrick51@example.com', '2020-11-20 06:51:30', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', '2dDiX2D4pb', '2020-11-20 06:51:30', '2020-11-20 06:51:30'),
(9, 2, 1, 'Judah Padberg III', NULL, 'enrico.stroman@example.net', '2020-11-20 06:51:30', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'tuCauwsfYz', '2020-11-20 06:51:30', '2020-11-20 06:51:30'),
(10, 2, 1, 'Ebony Bashirian', NULL, 'rowe.hollie@example.net', '2020-11-20 06:51:30', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'hSOU3vf7id', '2020-11-20 06:51:30', '2020-11-20 06:51:30'),
(11, 1, 1, 'harizaldy', '12345632', 'harizaldy@gmail.com', NULL, '$2y$10$QXrRjFffavsYGS7DxSVnW.0bnqVA36F7R14zL57eLK7EdgnoCEVSC', NULL, '2020-11-20 06:54:39', '2020-11-21 00:02:28'),
(12, 2, 3, 'wasep', '323435465', 'wasep@gmail.com', NULL, '$2y$10$mC5WdSNASsR7n5KhR.6ma.WR..eGN7itIDVIoXypoxZgJmwxF7h1G', NULL, '2020-11-20 21:30:17', '2020-11-21 01:01:13');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `balasans`
--
ALTER TABLE `balasans`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `clients`
--
ALTER TABLE `clients`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `clients_email_unique` (`email`);

--
-- Indexes for table `divisis`
--
ALTER TABLE `divisis`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

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
-- Indexes for table `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tikets`
--
ALTER TABLE `tikets`
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
-- AUTO_INCREMENT for table `balasans`
--
ALTER TABLE `balasans`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `clients`
--
ALTER TABLE `clients`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `divisis`
--
ALTER TABLE `divisis`
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
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `roles`
--
ALTER TABLE `roles`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `tikets`
--
ALTER TABLE `tikets`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
