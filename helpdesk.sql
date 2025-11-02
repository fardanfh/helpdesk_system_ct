-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Nov 02, 2025 at 06:02 PM
-- Server version: 8.0.30
-- PHP Version: 7.4.33

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `helpdesk`
--

-- --------------------------------------------------------

--
-- Table structure for table `admins`
--

CREATE TABLE `admins` (
  `id` bigint UNSIGNED NOT NULL,
  `username` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `admins`
--

INSERT INTO `admins` (`id`, `username`, `password`, `created_at`, `updated_at`) VALUES
(1, 'admin', '$2y$10$ucWlncvUD5VIr8ZLLzvQ.uplSRd1twJ9RGBRgjU4CzOefISkGPeTW', '2025-10-29 23:56:15', '2025-10-29 23:56:15');

-- --------------------------------------------------------

--
-- Table structure for table `areas`
--

CREATE TABLE `areas` (
  `id_area` bigint UNSIGNED NOT NULL,
  `nama_area` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `areas`
--

INSERT INTO `areas` (`id_area`, `nama_area`, `created_at`, `updated_at`) VALUES
(1, 'Gudang', '2025-10-31 01:22:21', '2025-10-31 01:22:21'),
(2, 'Jalur Keberangkatan', '2025-10-31 01:22:29', '2025-10-31 01:22:29'),
(3, 'Kantin', '2025-10-31 01:22:36', '2025-10-31 01:22:36'),
(4, 'Mess Driver', '2025-10-31 01:22:43', '2025-10-31 01:22:43'),
(5, 'Office', '2025-10-31 01:22:49', '2025-10-31 01:22:49'),
(6, 'Pantry', '2025-10-31 01:22:56', '2025-10-31 01:22:56'),
(7, 'Parkiran Depan', '2025-10-31 01:23:03', '2025-10-31 01:23:03');

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint UNSIGNED NOT NULL,
  `uuid` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `jabatans`
--

CREATE TABLE `jabatans` (
  `id_jabatan` bigint UNSIGNED NOT NULL,
  `nama_jabatan` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `jabatans`
--

INSERT INTO `jabatans` (`id_jabatan`, `nama_jabatan`, `created_at`, `updated_at`) VALUES
(1, 'Staff IT', '2025-10-31 01:00:32', '2025-10-31 01:05:49'),
(2, 'Staff GA', '2025-10-31 01:05:16', '2025-10-31 01:05:16'),
(4, 'Kadiv Support', '2025-10-31 01:06:11', '2025-10-31 01:06:11'),
(5, 'Ast Manager', '2025-10-31 01:06:24', '2025-10-31 01:06:24');

-- --------------------------------------------------------

--
-- Table structure for table `laporans`
--

CREATE TABLE `laporans` (
  `id_laporan` bigint UNSIGNED NOT NULL,
  `no_laporan` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `periode` date NOT NULL,
  `id_pic` bigint UNSIGNED DEFAULT NULL,
  `id_lokasi` bigint UNSIGNED NOT NULL,
  `nama_pelapor` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `id_area` bigint UNSIGNED NOT NULL,
  `id_permasalahan` bigint UNSIGNED NOT NULL,
  `deskripsi_laporan` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `foto_permasalahan` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `tgl_dikerjakan` date DEFAULT NULL,
  `tgl_selesai` date DEFAULT NULL,
  `tindakan_perbaikan` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `total_nilai_perbaikan` int DEFAULT NULL,
  `foto_perbaikan` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `keterangan` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `status_id` bigint UNSIGNED DEFAULT NULL,
  `priority_id` bigint UNSIGNED DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `laporans`
--

INSERT INTO `laporans` (`id_laporan`, `no_laporan`, `periode`, `id_pic`, `id_lokasi`, `nama_pelapor`, `id_area`, `id_permasalahan`, `deskripsi_laporan`, `foto_permasalahan`, `tgl_dikerjakan`, `tgl_selesai`, `tindakan_perbaikan`, `total_nilai_perbaikan`, `foto_perbaikan`, `keterangan`, `created_at`, `updated_at`, `status_id`, `priority_id`) VALUES
(1, 'LP202510311OTB', '2025-10-31', 1, 1, 'Fardan', 5, 12, 'Cek cctv', 'uploads/laporans/1761906538_bird-building-architecture-208684-1920x1080.jpg', NULL, NULL, NULL, NULL, NULL, NULL, '2025-10-31 03:28:58', '2025-11-02 06:21:33', 2, 2),
(3, 'LP202510318MWN', '2025-10-31', NULL, 1, 'Test', 1, 4, 'www', 'uploads/laporans/1761907788_bird-building-architecture-208684-1920x1080.jpg', NULL, NULL, NULL, NULL, NULL, NULL, '2025-10-31 03:49:48', '2025-10-31 03:49:48', NULL, NULL),
(4, 'LP20251102LX2C', '2025-11-02', NULL, 1, 'Ali', 5, 4, 'Koneksi bermasalah', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2025-11-02 02:53:31', '2025-11-02 02:53:31', NULL, NULL),
(5, 'LP20251102WHTB', '2025-11-02', 3, 4, 'Lia', 3, 9, 'Rusak', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2025-11-02 02:56:58', '2025-11-02 09:04:17', 1, 2),
(6, 'LP20251102FLDZ', '2025-11-02', NULL, 1, 'Test', 3, 12, 'rusak', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2025-11-02 03:04:11', '2025-11-02 03:04:11', NULL, NULL),
(7, 'LP20251102KXIU', '2025-11-02', NULL, 2, 'Test2', 2, 5, 'www', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2025-11-02 03:07:04', '2025-11-02 03:07:04', NULL, NULL),
(8, 'LP20251102KBYD', '2025-11-02', NULL, 2, 'Test lagi', 1, 1, 'test', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2025-11-02 03:11:47', '2025-11-02 03:11:47', NULL, NULL),
(9, 'LP20251102LKAB', '2025-11-02', NULL, 1, 'Ali', 3, 12, 'odwodw', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2025-11-02 03:19:34', '2025-11-02 03:19:34', NULL, NULL),
(10, 'LP20251102MASL', '2025-11-02', NULL, 1, 'Test', 2, 5, 'wdwd', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2025-11-02 03:33:47', '2025-11-02 03:33:47', NULL, NULL),
(11, 'LP20251102XU9Z', '2025-11-02', NULL, 2, 'Test', 2, 6, 'ppp', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2025-11-02 03:41:11', '2025-11-02 03:41:11', NULL, NULL),
(12, 'LP20251102AMHS', '2025-11-02', 2, 1, 'Test', 6, 3, 'wd', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2025-11-02 03:44:25', '2025-11-02 06:14:01', 3, 1),
(13, 'LP202511028FVZ', '2025-11-02', 1, 3, 'Ali', 3, 5, 'wdwd', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2025-11-02 03:46:14', '2025-11-02 09:08:13', 3, 4),
(14, 'LP20251102U7GD', '2025-11-02', 3, 2, 'Ali', 4, 7, 'ppp', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2025-11-02 03:52:56', '2025-11-02 08:37:50', 2, 1),
(15, 'LP20251102JIDE', '2025-11-02', 2, 3, 'Test', 2, 6, 'ppp', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2025-11-02 05:49:01', '2025-11-02 05:58:12', 3, 1),
(16, 'LP20251102THSU', '2025-11-02', 1, 2, 'Ilham', 5, 4, 'Rusak', 'uploads/laporans/1762101094_whatsapp-image-2024-09-05-at-212851-9b4de690.jpg', '2025-11-04', NULL, 'Perbaikan internet', NULL, NULL, NULL, '2025-11-02 09:31:34', '2025-11-02 10:47:22', 2, 2);

-- --------------------------------------------------------

--
-- Table structure for table `lokasis`
--

CREATE TABLE `lokasis` (
  `id_lokasi` bigint UNSIGNED NOT NULL,
  `nama_lokasi` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `lokasis`
--

INSERT INTO `lokasis` (`id_lokasi`, `nama_lokasi`, `created_at`, `updated_at`) VALUES
(1, 'Dipatiukur', '2025-10-31 01:17:00', '2025-10-31 01:17:36'),
(2, 'Pasteur', '2025-10-31 01:17:09', '2025-10-31 01:17:09'),
(3, 'Pengendapan Dago', '2025-10-31 01:17:21', '2025-10-31 01:17:21'),
(4, 'Suci', '2025-10-31 01:17:27', '2025-10-31 01:17:27');

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int UNSIGNED NOT NULL,
  `migration` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2025_10_30_045827_create_jabatans_table', 2),
(5, '2025_10_30_045836_create_lokasis_table', 2),
(6, '2025_10_30_045845_create_areas_table', 2),
(7, '2025_10_30_045853_create_permasalahans_table', 2),
(8, '2025_10_30_045901_create_admins_table', 2),
(9, '2025_10_30_045910_create_pics_table', 2),
(10, '2025_10_30_045918_create_laporans_table', 2),
(11, '2025_10_31_065949_create_statuses_table', 3),
(12, '2025_10_31_070212_create_priorities_table', 3),
(13, '2025_10_31_070450_update_laporans_add_relations_and_remove_old_fields', 3);

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `permasalahans`
--

CREATE TABLE `permasalahans` (
  `id_permasalahan` bigint UNSIGNED NOT NULL,
  `nama_permasalahan` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `permasalahans`
--

INSERT INTO `permasalahans` (`id_permasalahan`, `nama_permasalahan`, `created_at`, `updated_at`) VALUES
(1, 'PC', '2025-10-31 01:29:31', '2025-10-31 01:29:31'),
(2, 'Laptop', '2025-10-31 01:29:37', '2025-10-31 01:29:37'),
(3, 'Printer', '2025-10-31 01:30:14', '2025-10-31 01:30:14'),
(4, 'Internet', '2025-10-31 01:30:20', '2025-10-31 01:30:20'),
(5, 'System', '2025-10-31 01:30:26', '2025-10-31 01:30:26'),
(6, 'Telepon', '2025-10-31 01:30:33', '2025-10-31 01:30:33'),
(7, 'Struktur Bangunan', '2025-10-31 01:30:43', '2025-10-31 01:30:43'),
(8, 'Furniture dan Fasilitas Bangunan', '2025-10-31 01:30:56', '2025-10-31 01:30:56'),
(9, 'Kelistrikan dan Penerangan', '2025-10-31 01:31:07', '2025-10-31 01:31:07'),
(10, 'Kebersihan dan Kerapian Area', '2025-10-31 01:31:23', '2025-10-31 01:31:23'),
(11, 'Jaringan TV', '2025-10-31 01:31:31', '2025-10-31 01:31:31'),
(12, 'CCTV', '2025-10-31 01:31:36', '2025-10-31 01:31:36'),
(13, 'Email', '2025-10-31 01:31:41', '2025-10-31 01:31:41');

-- --------------------------------------------------------

--
-- Table structure for table `pics`
--

CREATE TABLE `pics` (
  `id_pic` bigint UNSIGNED NOT NULL,
  `username` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `nama` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `id_jabatan` bigint UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `pics`
--

INSERT INTO `pics` (`id_pic`, `username`, `password`, `nama`, `id_jabatan`, `created_at`, `updated_at`) VALUES
(1, 'it02', '$2y$10$QnOorT2sRsPaLU6ricpRo.dD4/xw/BN/6cVPjYyFQJYiEVzpPTe/e', 'Fardan', 1, '2025-10-31 02:15:18', '2025-10-31 02:15:18'),
(2, 'it01', '$2y$10$JnLOCEMxIEaqVWxs.ECL3uIZTmazyQNidVZ/MgMW8t6QqTAWp4BBm', 'Pa ILO', 1, '2025-10-31 02:15:48', '2025-10-31 02:15:48'),
(3, 'ga01', '$2y$10$8jlUJEX/mguT/CGMjqqZNO/GR/yznaCqi6TRekkmIn1sllsCUWfcO', 'Ali Jamali', 2, '2025-11-02 04:17:23', '2025-11-02 04:17:23');

-- --------------------------------------------------------

--
-- Table structure for table `priorities`
--

CREATE TABLE `priorities` (
  `id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `color` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '#6c757d',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `priorities`
--

INSERT INTO `priorities` (`id`, `name`, `color`, `created_at`, `updated_at`) VALUES
(1, 'Rendah', '#6c757d', '2025-10-31 01:49:47', '2025-10-31 01:49:47'),
(2, 'Menengah', '#5cd6ad', '2025-10-31 01:50:17', '2025-10-31 01:50:17'),
(3, 'Tinggi', '#df6868', '2025-10-31 01:50:33', '2025-10-31 01:50:33'),
(4, 'Urgent', '#990000', '2025-10-31 01:50:45', '2025-10-31 01:50:45');

-- --------------------------------------------------------

--
-- Table structure for table `statuses`
--

CREATE TABLE `statuses` (
  `id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `color` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '#6c757d',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `statuses`
--

INSERT INTO `statuses` (`id`, `name`, `color`, `created_at`, `updated_at`) VALUES
(1, 'Pending', '#a3a3a3', '2025-10-31 01:44:35', '2025-10-31 01:44:35'),
(2, 'Done', '#34d582', '2025-10-31 01:45:06', '2025-10-31 01:46:11'),
(3, 'Process', '#43bccb', '2025-10-31 01:45:35', '2025-10-31 01:46:34'),
(4, 'Cancel', '#f06060', '2025-10-31 01:45:47', '2025-10-31 01:46:41');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admins`
--
ALTER TABLE `admins`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `admins_username_unique` (`username`);

--
-- Indexes for table `areas`
--
ALTER TABLE `areas`
  ADD PRIMARY KEY (`id_area`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `jabatans`
--
ALTER TABLE `jabatans`
  ADD PRIMARY KEY (`id_jabatan`);

--
-- Indexes for table `laporans`
--
ALTER TABLE `laporans`
  ADD PRIMARY KEY (`id_laporan`),
  ADD UNIQUE KEY `laporans_no_laporan_unique` (`no_laporan`),
  ADD KEY `laporans_id_pic_foreign` (`id_pic`),
  ADD KEY `laporans_id_lokasi_foreign` (`id_lokasi`),
  ADD KEY `laporans_id_area_foreign` (`id_area`),
  ADD KEY `laporans_id_permasalahan_foreign` (`id_permasalahan`),
  ADD KEY `laporans_status_id_foreign` (`status_id`),
  ADD KEY `laporans_priority_id_foreign` (`priority_id`);

--
-- Indexes for table `lokasis`
--
ALTER TABLE `lokasis`
  ADD PRIMARY KEY (`id_lokasi`);

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
-- Indexes for table `permasalahans`
--
ALTER TABLE `permasalahans`
  ADD PRIMARY KEY (`id_permasalahan`);

--
-- Indexes for table `pics`
--
ALTER TABLE `pics`
  ADD PRIMARY KEY (`id_pic`),
  ADD UNIQUE KEY `pics_username_unique` (`username`),
  ADD KEY `pics_id_jabatan_foreign` (`id_jabatan`);

--
-- Indexes for table `priorities`
--
ALTER TABLE `priorities`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `statuses`
--
ALTER TABLE `statuses`
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
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `areas`
--
ALTER TABLE `areas`
  MODIFY `id_area` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `jabatans`
--
ALTER TABLE `jabatans`
  MODIFY `id_jabatan` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `laporans`
--
ALTER TABLE `laporans`
  MODIFY `id_laporan` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `lokasis`
--
ALTER TABLE `lokasis`
  MODIFY `id_lokasi` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `permasalahans`
--
ALTER TABLE `permasalahans`
  MODIFY `id_permasalahan` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `pics`
--
ALTER TABLE `pics`
  MODIFY `id_pic` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `priorities`
--
ALTER TABLE `priorities`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `statuses`
--
ALTER TABLE `statuses`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `laporans`
--
ALTER TABLE `laporans`
  ADD CONSTRAINT `laporans_id_area_foreign` FOREIGN KEY (`id_area`) REFERENCES `areas` (`id_area`) ON DELETE CASCADE,
  ADD CONSTRAINT `laporans_id_lokasi_foreign` FOREIGN KEY (`id_lokasi`) REFERENCES `lokasis` (`id_lokasi`) ON DELETE CASCADE,
  ADD CONSTRAINT `laporans_id_permasalahan_foreign` FOREIGN KEY (`id_permasalahan`) REFERENCES `permasalahans` (`id_permasalahan`) ON DELETE CASCADE,
  ADD CONSTRAINT `laporans_id_pic_foreign` FOREIGN KEY (`id_pic`) REFERENCES `pics` (`id_pic`) ON DELETE CASCADE,
  ADD CONSTRAINT `laporans_priority_id_foreign` FOREIGN KEY (`priority_id`) REFERENCES `priorities` (`id`) ON DELETE SET NULL,
  ADD CONSTRAINT `laporans_status_id_foreign` FOREIGN KEY (`status_id`) REFERENCES `statuses` (`id`) ON DELETE SET NULL;

--
-- Constraints for table `pics`
--
ALTER TABLE `pics`
  ADD CONSTRAINT `pics_id_jabatan_foreign` FOREIGN KEY (`id_jabatan`) REFERENCES `jabatans` (`id_jabatan`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
