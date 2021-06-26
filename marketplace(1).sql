-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 26, 2021 at 08:25 AM
-- Server version: 10.4.14-MariaDB
-- PHP Version: 7.2.33

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `marketplace`
--

-- --------------------------------------------------------

--
-- Table structure for table `carts`
--

CREATE TABLE `carts` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `products_id` int(11) NOT NULL,
  `users_id` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `carts`
--

INSERT INTO `carts` (`id`, `products_id`, `users_id`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 1, 2, '2021-06-20 18:21:29', '2021-06-20 18:21:38', '2021-06-20 18:21:38'),
(2, 1, 2, '2021-06-20 18:23:28', '2021-06-20 18:23:37', '2021-06-20 18:23:37'),
(3, 1, 3, '2021-06-20 18:25:51', '2021-06-20 18:26:02', '2021-06-20 18:26:02'),
(4, 2, 4, '2021-06-20 20:51:14', '2021-06-20 20:52:26', '2021-06-20 20:52:26'),
(5, 2, 4, '2021-06-20 20:52:17', '2021-06-20 20:52:40', '2021-06-20 20:52:40'),
(6, 2, 3, '2021-06-21 05:10:26', '2021-06-21 05:11:17', '2021-06-21 05:11:17'),
(7, 1, 2, '2021-06-21 05:46:05', '2021-06-21 05:53:27', '2021-06-21 05:53:27'),
(8, 1, 2, '2021-06-21 05:53:40', '2021-06-21 06:12:45', '2021-06-21 06:12:45'),
(9, 2, 2, '2021-06-21 06:13:36', '2021-06-21 06:13:39', '2021-06-21 06:13:39'),
(10, 2, 4, '2021-06-21 07:27:22', '2021-06-21 07:27:44', '2021-06-21 07:27:44'),
(11, 2, 3, '2021-06-21 20:18:55', '2021-06-21 20:21:17', '2021-06-21 20:21:17'),
(12, 2, 3, '2021-06-21 20:27:37', '2021-06-21 20:28:00', '2021-06-21 20:28:00'),
(13, 1, 4, '2021-06-21 20:44:17', '2021-06-21 20:44:39', '2021-06-21 20:44:39'),
(14, 1, 3, '2021-06-25 00:03:58', '2021-06-25 00:07:07', '2021-06-25 00:07:07');

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `photo` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `name`, `photo`, `slug`, `deleted_at`, `created_at`, `updated_at`) VALUES
(1, 'Kaos', 'POLA-KAOS-300.jpg', '', NULL, NULL, NULL);

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
-- Table structure for table `indoregion_districts`
--

CREATE TABLE `indoregion_districts` (
  `id` char(7) COLLATE utf8mb4_unicode_ci NOT NULL,
  `regency_id` char(4) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `indoregion_districts`
--

INSERT INTO `indoregion_districts` (`id`, `regency_id`, `name`) VALUES
('1', '1', 'Surabaya'),
('2', '2', 'Sidoarjo');

-- --------------------------------------------------------

--
-- Table structure for table `indoregion_provinces`
--

CREATE TABLE `indoregion_provinces` (
  `id` char(2) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `indoregion_provinces`
--

INSERT INTO `indoregion_provinces` (`id`, `name`) VALUES
('1', 'Jawa Timur'),
('2', 'Jawa Barat');

-- --------------------------------------------------------

--
-- Table structure for table `indoregion_regencies`
--

CREATE TABLE `indoregion_regencies` (
  `id` char(4) COLLATE utf8mb4_unicode_ci NOT NULL,
  `province_id` char(2) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `indoregion_regencies`
--

INSERT INTO `indoregion_regencies` (`id`, `province_id`, `name`) VALUES
('1', '1', 'Surabaya'),
('2', '2', 'Bandung');

-- --------------------------------------------------------

--
-- Table structure for table `indoregion_villages`
--

CREATE TABLE `indoregion_villages` (
  `id` char(10) COLLATE utf8mb4_unicode_ci NOT NULL,
  `district_id` char(7) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL
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
(3, '2017_05_02_140432_create_provinces_tables', 1),
(4, '2017_05_02_140444_create_regencies_tables', 1),
(5, '2017_05_02_140454_create_villages_tables', 1),
(6, '2017_05_02_142019_create_districts_tables', 1),
(7, '2019_08_19_000000_create_failed_jobs_table', 1),
(8, '2020_08_10_095552_create_categories_table', 1),
(9, '2020_08_10_100437_create_products_table', 1),
(10, '2020_08_10_101414_create_product_galleries_table', 1),
(11, '2020_08_10_102203_create_carts_table', 1),
(12, '2020_08_10_105129_create_transactions_table', 1),
(13, '2020_08_10_105152_create_transaction_details_table', 1),
(14, '2020_08_10_112007_delete_resi_field_at_transactions_table', 1),
(15, '2020_08_10_112833_add_resi_and_shipping_status_to_transaction_details_table', 1),
(16, '2020_08_10_121417_add_code_to_transactions_table', 1),
(17, '2020_08_10_121534_add_code_to_transaction_details_table', 1),
(18, '2020_08_10_122812_add_sug_to_products_table', 1),
(19, '2020_08_10_141334_add_roles_field_to_users_table', 1),
(20, '2020_08_12_053648_change_nullable_field_at_users_table', 1),
(21, '2020_08_27_131025_add_soft_delete_field_to_carts_table', 1);

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
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `users_id` int(11) NOT NULL,
  `categories_id` int(11) NOT NULL,
  `price` int(11) NOT NULL,
  `description` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `name`, `users_id`, `categories_id`, `price`, `description`, `deleted_at`, `created_at`, `updated_at`, `slug`) VALUES
(1, 'Kaos Oblong Hijau', 2, 1, 50000, '<p>Bahan :</p>\r\n\r\n<p>-Lembut</p>', NULL, '2021-06-20 18:20:56', '2021-06-20 18:20:56', 'kaos-oblong-hijau'),
(2, 'Kaos Oblong merah', 2, 1, 50000, '<p>Bahan :</p>\r\n\r\n<p>-Lembut</p>', NULL, '2021-06-20 19:30:52', '2021-06-20 19:30:52', 'kaos-oblong-merah'),
(3, 'Kaos Oblong Stripe', 2, 1, 65000, '<p>Bahan :</p>\r\n\r\n<p>-Lembut</p>\r\n\r\n<p>-Hangat</p>', NULL, '2021-06-23 05:16:03', '2021-06-23 05:16:36', 'kaos-oblong-stripe');

-- --------------------------------------------------------

--
-- Table structure for table `product_galleries`
--

CREATE TABLE `product_galleries` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `photos` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `products_id` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `product_galleries`
--

INSERT INTO `product_galleries` (`id`, `photos`, `products_id`, `created_at`, `updated_at`) VALUES
(1, 'assets/product/MPZ5sIINAQ60rlXAHxw4RwfdXtudeM8uO5pqeCzh.jpg', 1, '2021-06-20 18:20:57', '2021-06-20 18:20:57'),
(2, 'assets/product/Kk7WYyi189B5450ELOw4EZMYJgc3COLjwO2UKF7u.png', 2, '2021-06-20 19:30:52', '2021-06-20 19:30:52'),
(3, 'assets/product/x62a9Fw1fpPvfF5koLBedkwcSB9xiV3j02a7ne2C.jpg', 3, '2021-06-23 05:16:04', '2021-06-23 05:16:04');

-- --------------------------------------------------------

--
-- Table structure for table `transactions`
--

CREATE TABLE `transactions` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `users_id` int(11) NOT NULL,
  `insurance_price` int(11) NOT NULL,
  `shipping_price` int(11) NOT NULL,
  `total_price` int(11) NOT NULL,
  `transaction_status` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `code` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `transactions`
--

INSERT INTO `transactions` (`id`, `users_id`, `insurance_price`, `shipping_price`, `total_price`, `transaction_status`, `deleted_at`, `created_at`, `updated_at`, `code`) VALUES
(1, 2, 0, 0, 50000, 'PENDING', NULL, '2021-06-20 18:21:38', '2021-06-20 18:21:38', 'STORE-432287'),
(2, 2, 0, 0, 50000, 'PENDING', NULL, '2021-06-20 18:23:36', '2021-06-20 18:23:36', 'STORE-786429'),
(3, 3, 0, 0, 50000, 'PENDING', NULL, '2021-06-20 18:26:01', '2021-06-20 18:26:01', 'STORE-139801'),
(4, 4, 0, 0, 50000, 'PENDING', NULL, '2021-06-20 20:52:40', '2021-06-20 20:52:40', 'STORE-370429'),
(5, 2, 0, 0, 50000, 'PENDING', NULL, '2021-06-21 06:12:45', '2021-06-21 06:12:45', 'STORE-147572'),
(6, 4, 0, 0, 50000, 'PENDING', NULL, '2021-06-21 07:27:44', '2021-06-21 07:27:44', 'STORE-986748'),
(7, 3, 0, 0, 50000, 'PENDING', NULL, '2021-06-21 20:28:00', '2021-06-21 20:28:00', 'STORE-807703'),
(8, 4, 0, 0, 50000, 'PENDING', NULL, '2021-06-21 20:44:39', '2021-06-21 20:44:39', 'STORE-865743'),
(9, 3, 0, 0, 50000, 'PENDING', NULL, '2021-06-25 00:07:07', '2021-06-25 00:07:07', 'STORE-811368');

-- --------------------------------------------------------

--
-- Table structure for table `transaction_details`
--

CREATE TABLE `transaction_details` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `transactions_id` int(11) NOT NULL,
  `products_id` int(11) NOT NULL,
  `price` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `shipping_status` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `resi` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `code` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `transaction_details`
--

INSERT INTO `transaction_details` (`id`, `transactions_id`, `products_id`, `price`, `created_at`, `updated_at`, `shipping_status`, `resi`, `code`) VALUES
(1, 1, 1, 50000, '2021-06-20 18:21:38', '2021-06-21 07:25:27', 'SUCCESS', '', 'TRX-761244'),
(2, 2, 1, 50000, '2021-06-20 18:23:37', '2021-06-21 19:48:44', 'SUCCESS', '', 'TRX-792538'),
(3, 3, 1, 50000, '2021-06-20 18:26:01', '2021-06-20 18:26:01', 'PENDING', '', 'TRX-721583'),
(4, 4, 2, 50000, '2021-06-20 20:52:40', '2021-06-20 20:52:40', 'PENDING', '', 'TRX-307054'),
(5, 5, 1, 50000, '2021-06-21 06:12:45', '2021-06-21 19:49:14', 'SHIPPING', '10000212', 'TRX-809181'),
(6, 6, 2, 50000, '2021-06-21 07:27:44', '2021-06-21 19:50:49', 'SUCCESS', '', 'TRX-95874'),
(7, 7, 2, 50000, '2021-06-21 20:28:00', '2021-06-21 20:39:00', 'SHIPPING', '123123', 'TRX-514063'),
(8, 8, 1, 50000, '2021-06-21 20:44:39', '2021-06-21 20:46:22', 'SHIPPING', '1241431', 'TRX-389401'),
(9, 9, 1, 50000, '2021-06-25 00:07:07', '2021-06-25 00:32:16', 'SHIPPING', '12415315', 'TRX-957380');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `address_one` longtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `address_two` longtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `provinces_id` int(11) DEFAULT NULL,
  `regencies_id` int(11) DEFAULT NULL,
  `zip_code` int(11) DEFAULT NULL,
  `country` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `phone_number` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `store_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `categories_id` int(11) DEFAULT NULL,
  `store_status` int(11) DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `roles` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'USER'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `address_one`, `address_two`, `provinces_id`, `regencies_id`, `zip_code`, `country`, `phone_number`, `store_name`, `categories_id`, `store_status`, `deleted_at`, `remember_token`, `created_at`, `updated_at`, `roles`) VALUES
(2, 'Muhammad Arif', 'arif@gmail.com', NULL, '$2y$10$0.RdzVkCMbBPWCIsOYQC9Olhqor5xcFQeYOo6.hFtC8UZRxZ0N22a', 'Sanimbar', 'Bohar', NULL, NULL, 61257, 'Indonesia', '98401840918', 'Oblong\'s', NULL, 1, NULL, NULL, '2021-06-20 18:18:13', '2021-06-21 20:00:24', 'USER'),
(3, 'Lintang', 'lintang@gmail.com', NULL, '$2y$10$G1ExlT8jnjlPvwUO84P5M.h.fOKrZN89AumRbrm2dZhsvjKKr4BNC', NULL, NULL, 1, 1, NULL, 'Indonesia', NULL, '', NULL, 1, NULL, NULL, '2021-06-20 18:25:35', '2021-06-25 00:07:07', 'USER'),
(4, 'aida', 'aida@gmail.com', NULL, '$2y$10$RAXz6EQBL0OzQl79J1W/h.2ZK9Bw52bnVqeekkB9xtAV0CXdzbDw2', 'Jonggol', 'Rambutan', NULL, NULL, 63563, 'Indonesia', '14921912', '', NULL, 1, NULL, NULL, '2021-06-20 20:51:05', '2021-06-21 20:44:39', 'USER'),
(5, 'donald trump', 'eliteglobal@gmail.com', NULL, '$2y$10$hcuqQrRAnkRPqFEXYDqsoO3dH8cdW4.bdnmcbUcOhbTEZ40jqZg06', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', NULL, 1, NULL, NULL, '2021-06-24 22:57:22', '2021-06-24 22:57:22', 'USER');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `carts`
--
ALTER TABLE `carts`
  ADD PRIMARY KEY (`id`);

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
-- Indexes for table `indoregion_districts`
--
ALTER TABLE `indoregion_districts`
  ADD KEY `indoregion_districts_id_index` (`id`);

--
-- Indexes for table `indoregion_provinces`
--
ALTER TABLE `indoregion_provinces`
  ADD KEY `indoregion_provinces_id_index` (`id`);

--
-- Indexes for table `indoregion_regencies`
--
ALTER TABLE `indoregion_regencies`
  ADD KEY `indoregion_regencies_id_index` (`id`);

--
-- Indexes for table `indoregion_villages`
--
ALTER TABLE `indoregion_villages`
  ADD KEY `indoregion_villages_id_index` (`id`);

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
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `product_galleries`
--
ALTER TABLE `product_galleries`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `transactions`
--
ALTER TABLE `transactions`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `transaction_details`
--
ALTER TABLE `transaction_details`
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
-- AUTO_INCREMENT for table `carts`
--
ALTER TABLE `carts`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `product_galleries`
--
ALTER TABLE `product_galleries`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `transactions`
--
ALTER TABLE `transactions`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `transaction_details`
--
ALTER TABLE `transaction_details`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
