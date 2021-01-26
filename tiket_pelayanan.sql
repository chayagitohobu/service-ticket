-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 26, 2021 at 08:25 AM
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
(61, 49, 1, NULL, 1, '<p>Apakah anda dapat menambahkan detail error tersebut ?&nbsp; &nbsp;</p>', NULL, '2020-12-20 08:24:01', '2020-12-20 08:24:01'),
(62, 52, 1, NULL, 1, '<p>apakah anda dapat menambahkan lampiran contoh fitur tersebut ?</p>', NULL, '2020-12-20 08:25:15', '2020-12-20 08:25:15'),
(63, 49, NULL, 1, NULL, '<p>saya akan melampirkan screenshoot error yang saya alami&nbsp;</p>', '[\"1608478033-Screenshot_20201220_163618.jpg\"]', '2020-12-20 08:27:13', '2020-12-20 08:27:13'),
(64, 49, 1, NULL, 1, '<p>Terima kasih kami akan segera memperbaiki nya&nbsp;</p>', NULL, '2020-12-20 08:28:39', '2020-12-20 08:28:39'),
(65, 50, 13, NULL, 4, '<p>sekitar 1jt rupiah</p>', NULL, '2020-12-20 08:30:33', '2020-12-20 08:30:33'),
(66, 50, NULL, 1, NULL, '<p>ok</p>', NULL, '2020-12-20 08:31:16', '2020-12-20 08:31:16'),
(67, 50, NULL, 1, NULL, '<p>Berapa jika saya ingin menambahkan 2 fitur ?&nbsp;</p>', NULL, '2020-12-20 08:31:54', '2020-12-20 08:31:54'),
(68, 51, 12, NULL, 3, '<p>kami akan segera memperbaiki nya....&nbsp;</p>', NULL, '2021-01-10 02:30:54', '2021-01-10 02:30:54'),
(69, 54, 12, NULL, 3, '<p>kami akan segera kerjakan</p>', NULL, '2021-01-10 02:39:41', '2021-01-10 02:39:41'),
(70, 49, NULL, 1, NULL, '<p>test</p>', NULL, '2021-01-22 20:20:42', '2021-01-22 20:20:42'),
(71, 49, 1, NULL, 1, '<p>test</p>', '[\"1611372439- 4  G1A018057 Harizaldy Cahya Pratama.docx\"]', '2021-01-22 20:27:19', '2021-01-22 20:27:19');

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
  `telp` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `clients`
--

INSERT INTO `clients` (`id`, `email`, `password`, `name`, `name_perusahaan`, `telp`, `email_verified_at`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'meli@gmail.com', '$2y$10$Gd3z9uwqErVie2ozkKljL.AsRdqQ6MyBdQmrWYOQogOK2J9HFMcA2', 'meli2', 'meli', '08765436543', '2020-11-20 06:51:38', 'ZJOdSC7vY3', '2020-11-20 06:51:38', '2021-01-22 20:18:09'),
(2, 'rosario48@example.net', '$2y$10$Em/7qT5IgTjgaKTlZCsNKO/s.a6t9evlsdtnCkDhhR4E0fcUhllly', 'Sallie Ondricka', 'example', '084512345678', '2020-11-20 06:51:38', 'RoA6UvjtSq', '2020-11-20 06:51:38', '2020-12-19 22:32:24'),
(3, 'trinity.cremin@example.com', '$2y$10$7mgRYy/jIHZQUyiChSUJduNzTAwCXbgV1/OtvAmdOSZrQA.QbcE4S', 'Scottie O\'Kon', 'example', '085678906543', '2020-11-20 06:51:38', 'u6PugsjyKr', '2020-11-20 06:51:38', '2020-12-19 22:32:46'),
(4, 'iboyer@example.org', '$2y$10$dEwNlFv6TEbHsBwmDGS/1.0nCpZlfqI3eYXFLfmyT62wTRhH1aoka', 'Dax Jerde', 'example', '082345432145', '2020-11-20 06:51:38', 'RKgWt2GVKN', '2020-11-20 06:51:38', '2020-12-19 22:33:30'),
(5, 'tromp.mac@example.org', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'Dale Ernser', 'example', NULL, '2020-11-20 06:51:38', 'x0jbntV5eV', '2020-11-20 06:51:38', '2020-11-20 06:51:38'),
(6, 'crooks.rickie@example.org', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'Brenden Purdy', 'example', NULL, '2020-11-20 06:51:38', '7NrzOiMDBD', '2020-11-20 06:51:38', '2020-11-20 06:51:38'),
(7, 'danielle93@example.com', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'Tianna Hills', 'example', NULL, '2020-11-20 06:51:38', 'aIGlnBAuh2', '2020-11-20 06:51:38', '2020-11-20 06:51:38'),
(8, 'rosemary.altenwerth@example.com', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'Royal Rodriguez', 'example', NULL, '2020-11-20 06:51:38', 'GbKHWDHB3t', '2020-11-20 06:51:38', '2020-11-20 06:51:38'),
(9, 'branson44@example.org', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'Joyce Mitchell', 'example', NULL, '2020-11-20 06:51:38', 'dxhGM5XA2S', '2020-11-20 06:51:38', '2020-11-20 06:51:38'),
(10, 'vladimir.mckenzie@example.com', '$2y$10$8y4SbMGT.g7Is3CRfqquwO24ryJFiuqwPo1W1aAd8nZnK4BhvOLDm', 'test', 'example', '675645343', '2020-11-20 06:51:38', 'zeI5kIKg6d', '2020-11-20 06:51:38', '2020-12-12 13:01:08'),
(11, 'wahyu@gmail.com', '$2y$10$1Wz2T34zTs8xTmb3Hv5jvuu4in/kMaXNmd9dI/332EhJxOhuNkBcy', 'wahyu', 'wahyu test', '12345432', NULL, NULL, '2020-11-20 20:57:46', '2020-12-04 08:14:39'),
(12, 'test@gmail.com', '$2y$10$8z9jfsxfe3yRqJ/in1t7uesymiaQrTQR.Gi/dQJprrLlMBViMEq2K', 'test', 'test inc', '65445654', NULL, NULL, '2020-11-21 03:34:11', '2020-11-21 03:34:11'),
(13, 'danny@gmail.com', '$2y$10$lYA.rnuWFLGYAI6fjPL9TeSWC/SajsaYHYwCzsUScIxJL9tkS/sdG', 'dannyy', 'danny inc', '345673422345', NULL, NULL, '2020-11-27 11:16:26', '2020-11-27 11:16:41'),
(15, 'coba@gmail.com', '$2y$10$LArxgk7mv80er6T4PTrDMeCidiAe21GHBEqCgDvmEN07JfBAm0Opa', 'coba coba', 'coba inc', '76544534343', NULL, NULL, '2021-01-22 20:38:37', '2021-01-22 20:38:37');

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
(49, NULL, 1, 1, 'Saya mengalami bugs pada bagian checkout', 'Pada bagian checkout jumlah perhitungan harga barang yang telah di beli salah', '[\"1608476973-Screenshot_20201220_163434.jpg\"]', '2021-01-22 20:27:19', 'Tinggi', 'Tutup', '2020-12-20 08:09:33', '2021-01-22 20:48:20'),
(50, NULL, 1, 4, 'Berapa biaya penambahan fitur ?', 'Saya berencana untuk menambahkan fitur rekomendasi barang, berapakah biaya yang di perlukan ?', '[\"1608477233-Screenshot_20201220_163434.jpg\",\"1608477233-Screenshot_20201220_163530.jpg\"]', '2020-12-20 08:31:54', 'Rendah', 'Balasan client', '2020-12-20 08:13:53', '2020-12-20 08:31:54'),
(51, NULL, 11, 3, 'Lorem Ipsum is simply dummy text of the printing and typesetting industry.', '<span style=\"font-family: &quot;Open Sans&quot;, Arial, sans-serif; font-size: 14px; text-align: justify;\">orem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries,</span>', NULL, '2021-01-10 02:30:54', 'Rendah', 'Balasan operator', '2020-04-20 08:17:48', '2021-01-10 02:30:54'),
(52, NULL, 2, 1, 'Saya ingin penambahan fitur video', 'Saya ingin menambahkan fitur video pada website blog saya, sehingga saya dapat mengupload video', '[\"1608477735-Screenshot_20201220_163604.jpg\",\"1608477735-Screenshot_20201220_163618.jpg\"]', '2020-12-20 08:25:15', 'Rendah', 'Balasan operator', '2020-03-20 08:22:15', '2020-12-20 08:25:15'),
(53, NULL, 1, 2, 'Ke divisi apa saya harus bertanya, jika saya ingin menambahkan fitur baru ?', 'Ke divisi apa saya harus bertanya, jika saya ingin menambahkan fitur baru ?', NULL, '2020-12-20 08:33:06', 'Sedang', 'Buka', '2020-08-20 08:33:06', '2020-12-20 08:33:06'),
(54, NULL, 11, 3, 'Saya ingin menambah fitur', 'Saya ingin menambah fiturSaya ingin menambah fiturSaya ingin menambah fitur', NULL, '2021-01-10 02:39:41', 'Sedang', 'Balasan operator', '2021-08-10 02:38:08', '2021-01-10 02:39:41'),
(55, NULL, 1, 1, 'Saya ingin menambah fitur baru', 'DFSDFSDFDSD', NULL, '2020-01-22 20:21:43', 'Tinggi', 'Buka', '2020-02-22 20:21:43', '2021-01-22 20:21:43'),
(56, NULL, 11, 3, 'test', NULL, NULL, '2020-03-24 22:17:30', 'Sedang', 'Buka', '2020-03-24 22:17:30', '2021-01-24 22:17:30'),
(57, NULL, 11, 3, 'test', NULL, NULL, '2020-03-10 22:17:39', 'Rendah', 'Buka', '2020-03-10 22:17:39', '2021-01-24 22:17:39'),
(58, NULL, 11, 1, 'asd', NULL, NULL, '2020-04-15 22:17:49', 'Rendah', 'Buka', '2020-04-15 22:17:49', '2021-01-24 22:17:49'),
(59, NULL, 11, 1, 'gfdas', NULL, NULL, '2020-12-07 22:17:59', 'Sedang', 'Buka', '2020-12-07 22:17:59', '2021-01-24 22:17:59'),
(60, NULL, 11, 3, 'jkhd', NULL, NULL, '2020-12-06 22:18:14', 'Rendah', 'Buka', '2020-12-06 22:18:14', '2021-01-24 22:18:14'),
(62, 11, NULL, 1, 'dsa', NULL, NULL, '2021-01-24 22:26:58', 'Rendah', 'Buka', '2020-01-15 05:27:29', '2021-01-24 22:26:58'),
(63, 11, NULL, 1, 'dsa', NULL, NULL, '2021-01-24 22:26:58', 'Rendah', 'Buka', '2020-02-10 05:27:29', '2021-01-24 22:26:58'),
(64, 11, NULL, 1, 'dsa', NULL, NULL, '2021-01-24 22:26:58', 'Rendah', 'Buka', '2020-02-10 05:27:29', '2021-01-24 22:26:58'),
(65, 11, NULL, 1, 'dsa', NULL, NULL, '2021-01-24 22:26:58', 'Rendah', 'Buka', '2020-03-10 05:27:29', '2021-01-24 22:26:58'),
(66, 11, NULL, 1, 'dsa', NULL, NULL, '2021-01-24 22:26:58', 'Rendah', 'Buka', '2020-04-21 05:27:29', '2021-01-24 22:26:58'),
(67, 11, NULL, 1, 'dsa', NULL, NULL, '2021-01-24 22:26:58', 'Rendah', 'Buka', '2020-05-20 05:27:29', '2021-01-24 22:26:58'),
(68, 11, NULL, 1, 'dsa', NULL, NULL, '2021-01-24 22:26:58', 'Rendah', 'Buka', '2020-06-02 05:27:29', '2021-01-24 22:26:58'),
(69, 11, NULL, 1, 'dsa', NULL, NULL, '2021-01-24 22:26:58', 'Rendah', 'Buka', '2020-07-08 05:27:29', '2021-01-24 22:26:58'),
(70, 11, NULL, 1, 'dsa', NULL, NULL, '2021-01-24 22:26:58', 'Rendah', 'Buka', '2020-08-19 05:27:29', '2021-01-24 22:26:58'),
(71, 11, NULL, 1, 'dsa', NULL, NULL, '2021-01-24 22:26:58', 'Rendah', 'Buka', '2020-09-14 05:27:29', '2021-01-24 22:26:58'),
(74, 11, NULL, 1, 'dsa', NULL, NULL, '2021-01-24 22:26:58', 'Rendah', 'Buka', '2020-12-25 05:27:29', '2021-01-24 22:26:58'),
(75, 11, NULL, 1, 'dsa', NULL, NULL, '2021-01-24 22:26:58', 'Rendah', 'Buka', '2020-01-15 05:27:29', '2021-01-24 22:26:58'),
(76, 11, NULL, 1, 'dsa', NULL, NULL, '2021-01-24 22:26:58', 'Rendah', 'Buka', '2020-05-20 05:27:29', '2021-01-24 22:26:58'),
(77, 11, NULL, 1, 'dsa', NULL, NULL, '2021-01-24 22:26:58', 'Rendah', 'Buka', '2020-06-02 05:27:29', '2021-01-24 22:26:58'),
(78, 11, NULL, 1, 'dsa', NULL, NULL, '2021-01-24 22:26:58', 'Rendah', 'Buka', '2020-07-08 05:27:29', '2021-01-24 22:26:58'),
(79, 11, NULL, 1, 'dsa', NULL, NULL, '2021-01-24 22:26:58', 'Rendah', 'Buka', '2020-09-14 05:27:29', '2021-01-24 22:26:58'),
(80, 11, NULL, 1, 'dsa', NULL, NULL, '2021-01-24 22:26:58', 'Rendah', 'Buka', '2020-10-20 05:27:29', '2021-01-24 22:26:58'),
(81, 11, NULL, 1, 'dsa', NULL, NULL, '2021-01-24 22:26:58', 'Rendah', 'Buka', '2020-07-08 05:27:29', '2021-01-24 22:26:58'),
(82, 11, NULL, 1, 'dsa', NULL, NULL, '2021-01-24 22:26:58', 'Rendah', 'Buka', '2020-08-19 05:27:29', '2021-01-24 22:26:58');

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
(1, 2, 1, 'noval', '086453445342', 'noval@gmail.com', '2020-11-20 06:51:30', '$2y$10$UPAXxhWTMW/vkXa3jUgUKegkf8Zs6Ad/BBi9mIZyfN3s.ZEonZ8uK', 'qcs3cwpCva', '2020-11-20 06:51:30', '2021-01-22 19:32:31'),
(2, 1, 2, 'Daren Beatty DDS', '087642346532', 'christine.runolfsdottir@example.com', '2020-11-20 06:51:30', '$2y$10$CmLxi33CGFZ1S3X/onf0rO0t98HxhDa/FZcseolz56cBH7arShvpu', 'AJ60uOy8L4', '2020-11-20 06:51:30', '2020-12-19 22:28:37'),
(3, 2, 3, 'Magdalena Dibbert', '087634567890', 'kub.jared@example.com', '2020-11-20 06:51:30', '$2y$10$rJgTHsy94ziavw6RbdvDheeMokcsPQvM/9I.nnCPI2FGH66nH6/uW', 'T1zELdWyRK', '2020-11-20 06:51:30', '2020-12-19 22:30:14'),
(4, 2, 4, 'Dr. Adriel Bahringer', '083456788765', 'rcrooks@example.net', '2020-11-20 06:51:30', '$2y$10$qsazosudR/3baIMe7TZ9aepvvthj5ABaX3R2709vpf3TIcfJbigOa', 'xjCzblk8iG', '2020-11-20 06:51:30', '2020-12-19 22:30:49'),
(5, 2, 1, 'Shakira Fisher', NULL, 'welch.arvilla@example.net', '2020-11-20 06:51:30', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', '13Q2ugLPdm', '2020-11-20 06:51:30', '2020-11-20 06:51:30'),
(6, 2, 1, 'Richmond Connelly', NULL, 'twolff@example.com', '2020-11-20 06:51:30', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'vBHa9o8vOt', '2020-11-20 06:51:30', '2020-11-20 06:51:30'),
(7, 2, 1, 'Maia Vandervort', NULL, 'mclaughlin.demetrius@example.org', '2020-11-20 06:51:30', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', '1j4MT0MHEn', '2020-11-20 06:51:30', '2020-11-20 06:51:30'),
(8, 2, 1, 'Waldo Beahan', NULL, 'patrick51@example.com', '2020-11-20 06:51:30', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', '2dDiX2D4pb', '2020-11-20 06:51:30', '2020-11-20 06:51:30'),
(9, 2, 1, 'Judah Padberg III', NULL, 'enrico.stroman@example.net', '2020-11-20 06:51:30', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'tuCauwsfYz', '2020-11-20 06:51:30', '2020-11-20 06:51:30'),
(10, 1, 1, 'wasep', NULL, 'rowe.hollie@example.net', '2020-11-20 06:51:30', '$2y$10$wBmVAcgYecMfYMF/L5YmNOl.fn2vnBv.2Xec8GM9npL.KMu9dpyaC', 'hSOU3vf7id', '2020-11-20 06:51:30', '2020-12-12 12:46:04'),
(11, 1, 1, 'harizaldy', '12345632', 'harizaldy@gmail.com', NULL, '$2y$10$51Uc86tqb/CkN8Ti9QvCl.thmvQDkDi3jKBM6thhM7JTMI7FK/FfC', NULL, '2020-11-20 06:54:39', '2020-12-04 08:15:34'),
(12, 2, 3, 'wasep', '323435465', 'wasep@gmail.com', NULL, '$2y$10$mC5WdSNASsR7n5KhR.6ma.WR..eGN7itIDVIoXypoxZgJmwxF7h1G', NULL, '2020-11-20 21:30:17', '2020-12-04 08:14:23'),
(13, 2, 4, 'teddy', '34564345', 'teddy@gmail.com', NULL, '$2y$10$3gaV4K/hI4ctiE1S9LA/9up3qXiqtkAB.YDHz1lLg/l14ihLBGWhK', NULL, '2020-11-21 03:31:47', '2020-12-20 08:29:54'),
(15, 1, 2, 'test2', '56433445434', 'test2@gmail.com', NULL, '$2y$10$LgFoBB1hbO2QnXH0lWKgmeU5hZoVyuME7jFske/Y7kvDTqw59HN/.', NULL, '2021-01-10 02:26:47', '2021-01-10 02:26:47'),
(16, 2, 3, 'cobacoba', '5645342', 'coba@gmail,com', NULL, '$2y$10$8WcEI9HvEH6TKfgNLxS01ePx7aaypqnRc8dyovnaKdSnU98q.EA7W', NULL, '2021-01-22 20:41:30', '2021-01-22 20:41:30');

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
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=72;

--
-- AUTO_INCREMENT for table `clients`
--
ALTER TABLE `clients`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `divisis`
--
ALTER TABLE `divisis`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

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
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=83;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
