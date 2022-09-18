-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 22, 2021 at 05:58 PM
-- Server version: 10.1.30-MariaDB
-- PHP Version: 5.6.33

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `surat`
--

-- --------------------------------------------------------

--
-- Table structure for table `dispositions`
--

CREATE TABLE `dispositions` (
  `id` int(10) UNSIGNED NOT NULL,
  `id_mail` int(10) UNSIGNED NOT NULL,
  `mail_from` int(10) UNSIGNED NOT NULL,
  `mail_to` int(10) UNSIGNED NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `mark` enum('read','unread') COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `dispositions`
--

INSERT INTO `dispositions` (`id`, `id_mail`, `mail_from`, `mail_to`, `description`, `mark`, `created_at`, `updated_at`) VALUES
(9, 55, 7, 2, 'disposisi', 'read', '2021-08-24 08:58:39', '2021-08-24 11:56:18'),
(14, 55, 7, 2, 'laporan lagi', 'read', '2021-08-24 11:15:15', '2021-08-24 11:15:22'),
(15, 56, 2, 7, 'Ini hasil Form Nilai yang sudah di tanda tangani', 'read', '2021-08-24 11:56:58', '2021-08-24 11:57:18'),
(16, 58, 7, 10, 'Disposisi ujian sudah di tata usaha', 'read', '2021-10-18 09:39:47', '2021-10-18 09:39:51'),
(17, 61, 10, 7, 'surat sudah diterima', 'read', '2021-10-18 09:43:14', '2021-10-18 09:43:41'),
(18, 60, 7, 11, 'diposisi', 'unread', '2021-10-18 09:58:42', '2021-10-18 09:58:42');

-- --------------------------------------------------------

--
-- Table structure for table `mails`
--

CREATE TABLE `mails` (
  `id` int(10) UNSIGNED NOT NULL,
  `mail_code` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `mail_from` int(10) UNSIGNED NOT NULL,
  `mail_to` int(10) UNSIGNED NOT NULL,
  `mail_subject` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `file_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `id_type` int(10) UNSIGNED NOT NULL,
  `mark` enum('read','unread') COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `mails`
--

INSERT INTO `mails` (`id`, `mail_code`, `mail_from`, `mail_to`, `mail_subject`, `description`, `file_name`, `id_type`, `mark`, `created_at`, `updated_at`) VALUES
(55, '0823184509/SIAS/2021', 2, 7, 'Laporan', 'Laporan Rekap Pesan Masuk pada awal Juni 2021', 'laporan (5).pdf', 4, 'read', '2021-08-23 11:45:09', '2021-08-23 11:46:18'),
(56, '0823191949/SIAS/2021', 7, 2, 'Upload File', 'Laporan hasil rekap bulan ini', 'Form nilai PI.pdf', 1, 'read', '2021-08-23 12:19:50', '2021-08-23 12:21:05'),
(58, '0825145708/SIAS/2021', 2, 7, 'Upload File', 'upload', 'UJIAN SBD 3IA15.pdf', 4, 'read', '2021-08-25 07:57:08', '2021-08-25 07:57:26'),
(59, '0830043259/SIAS/2021', 7, 2, 'upload file baru', 'upload file', 'FORM-SURAT-PERSETUJUAN (1) (1).pdf', 1, 'read', '2021-08-29 21:32:59', '2021-08-29 21:33:06'),
(60, '1011035515/SIAS/2021', 2, 7, 'gambar', 'ini gambar', 'myw3schoolsimage.jpg', 1, 'read', '2021-10-10 20:55:15', '2021-10-10 20:55:22'),
(61, '1018164214/SIAS/2021', 7, 10, 'Surat Keterangan', 'surat keterangan dari tatausaha', 'laporan (5) (1).pdf', 4, 'read', '2021-10-18 09:42:14', '2021-10-18 09:42:31');

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
(3, '2018_01_12_011235_create_types_table', 1),
(4, '2018_01_12_041116_create_mails_table', 1),
(5, '2018_01_12_041220_create_dispositions_table', 1),
(6, '2021_08_20_100731_create_uploads_table', 2);

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
-- Table structure for table `types`
--

CREATE TABLE `types` (
  `id` int(10) UNSIGNED NOT NULL,
  `type` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `types`
--

INSERT INTO `types` (`id`, `type`, `created_at`, `updated_at`) VALUES
(1, 'Undangan', '2018-02-19 05:40:40', '2018-02-19 05:40:40'),
(2, 'Pengumuman', '2018-02-19 05:40:54', '2018-02-19 05:40:54'),
(4, 'Pemberitahuan', '2018-02-20 04:49:06', '2018-02-20 04:49:06'),
(5, 'Informasi', '2021-07-11 06:49:08', '2021-07-11 07:03:30');

-- --------------------------------------------------------

--
-- Table structure for table `uploads`
--

CREATE TABLE `uploads` (
  `id_upload` int(10) UNSIGNED NOT NULL,
  `nama` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `filename` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `uploads`
--

INSERT INTO `uploads` (`id_upload`, `nama`, `filename`, `created_at`, `updated_at`) VALUES
(1, 'rr', 'FireShot Capture 001 - Ujian 2_ Attempt review - kursusvmlepkom.gunadarma.ac.id.pdf', '2021-08-22 11:59:11', '2021-08-22 11:59:11'),
(4, 'COBA', 'ACT1_MILLENIA ALFINA D_54418135.pdf', '2021-08-22 12:17:39', '2021-08-22 12:17:39'),
(7, 'ini ke 7', 'ACT2_MILLENIA ALFINA D_54418135.docx', '2021-08-22 12:34:37', '2021-08-22 12:34:37'),
(8, 'ke8', 'ACT2_MILLENIA ALFINA D_54418135.pdf', '2021-08-22 13:02:20', '2021-08-22 13:02:20'),
(9, 'dIA BISA', '#Persona Template.docx', '2021-08-23 09:25:25', '2021-08-23 09:25:25');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `username` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `level` enum('kepsek','kurikulum','tatausaha','kesiswaan','guru') COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `username`, `password`, `level`, `remember_token`, `created_at`, `updated_at`) VALUES
(2, 'Kepala Sekolah', 'kepsek', '$2y$10$I9DSs1NBddWnhuau2JKHzOeFThWOUFZdIaVTEzyJIf4JJm3mQJmB2', 'kepsek', 'NF1ugAs8oT0o5jmvn8jR6DvHtCxbpfDAPlu5poJlv7FCP4zh6WzYyeyM4Vtv', '2018-02-19 05:42:17', '2018-02-19 05:42:17'),
(7, 'TataUsaha', 'tatausaha', '$2y$10$qyjWVy79w3DFUQc9Fy.pmu1WoS7fT.BU1zMN8l9u9dhkXvB8ix8Be', 'tatausaha', 'Pt1YJPNbksRtlX3bLQZkYhWc5WInU9lkjXxoqrzZGulsISVLFA4idsBhqHbp', '2018-02-20 23:47:17', '2021-06-05 09:42:47'),
(10, 'Kurikulum', 'kurikulum', '$2y$10$wfhyM.K2CVJ0RDD/8bCTy.VpCZwm0G6wjHfzXqIh1YjB01DpObOKy', 'kurikulum', '4t88E6nRAxdI4NUfqM3EHwhZTxz5z3F8KoQLx1k56oNvNl0KLrjPxsIz6GIG', '2021-08-22 11:39:01', '2021-08-22 11:39:01'),
(11, 'Kesiswaan', 'kesiswaan', '$2y$10$bnVWLBN88RuQj1.E0PhC4.TcoINm05y.ObseuTGKOlF3QD43ei6mq', 'kesiswaan', NULL, '2021-08-22 11:45:21', '2021-08-22 11:45:21');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `dispositions`
--
ALTER TABLE `dispositions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `dispositions_id_mail_foreign` (`id_mail`),
  ADD KEY `dispositions_mail_from_foreign` (`mail_from`),
  ADD KEY `dispositions_mail_to_foreign` (`mail_to`);

--
-- Indexes for table `mails`
--
ALTER TABLE `mails`
  ADD PRIMARY KEY (`id`),
  ADD KEY `mails_id_type_foreign` (`id_type`),
  ADD KEY `mails_mail_from_foreign` (`mail_from`),
  ADD KEY `mails_mail_to_foreign` (`mail_to`);

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
-- Indexes for table `types`
--
ALTER TABLE `types`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `uploads`
--
ALTER TABLE `uploads`
  ADD PRIMARY KEY (`id_upload`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_username_unique` (`username`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `dispositions`
--
ALTER TABLE `dispositions`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `mails`
--
ALTER TABLE `mails`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=62;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `types`
--
ALTER TABLE `types`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `uploads`
--
ALTER TABLE `uploads`
  MODIFY `id_upload` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `dispositions`
--
ALTER TABLE `dispositions`
  ADD CONSTRAINT `dispositions_id_mail_foreign` FOREIGN KEY (`id_mail`) REFERENCES `mails` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `dispositions_mail_from_foreign` FOREIGN KEY (`mail_from`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `dispositions_mail_to_foreign` FOREIGN KEY (`mail_to`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `mails`
--
ALTER TABLE `mails`
  ADD CONSTRAINT `mails_id_type_foreign` FOREIGN KEY (`id_type`) REFERENCES `types` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `mails_mail_from_foreign` FOREIGN KEY (`mail_from`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `mails_mail_to_foreign` FOREIGN KEY (`mail_to`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
