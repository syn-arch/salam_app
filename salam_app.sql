-- phpMyAdmin SQL Dump
-- version 4.9.5deb2
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Dec 10, 2021 at 12:50 PM
-- Server version: 8.0.27-0ubuntu0.20.04.1
-- PHP Version: 7.4.26

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `salam_app`
--

-- --------------------------------------------------------

--
-- Table structure for table `img_transactions`
--

CREATE TABLE `img_transactions` (
  `id` bigint NOT NULL,
  `idtransaction` int DEFAULT NULL,
  `imgname` varchar(191) DEFAULT NULL,
  `imgpath` varchar(191) DEFAULT NULL,
  `bank` text CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Table structure for table `member_transactions`
--

CREATE TABLE `member_transactions` (
  `mtxn_id` bigint NOT NULL,
  `mtxn_member_id` int NOT NULL,
  `mtxn_credit` decimal(15,2) NOT NULL,
  `mtxn_debit` decimal(15,2) NOT NULL,
  `mtxn_comments` text NOT NULL,
  `mtxn_status` tinyint(1) NOT NULL,
  `mtxn_order_id` varchar(15) NOT NULL,
  `mtxn_withdrawal_id` int NOT NULL,
  `mtxn_type` int NOT NULL COMMENT 'defined in transactions model',
  `mtxn_log_id` varchar(50) DEFAULT NULL,
  `mtxn_wallet_only` tinyint(1) DEFAULT '0',
  `created_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `theme_settings`
--

CREATE TABLE `theme_settings` (
  `id` bigint UNSIGNED NOT NULL,
  `key` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `value` mediumtext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `website_id` bigint UNSIGNED NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `theme_settings`
--

INSERT INTO `theme_settings` (`id`, `key`, `value`, `website_id`, `created_at`, `updated_at`) VALUES
(1, 'banks', '[{\"b_id\":\"4-427-Bank Nasional Indonesia Syariah\",\"bank_id\":\"4\",\"bank_code\":\"427\",\"bank_name\":\"Bank Nasional Indonesia Syariah\",\"account_name\":\"PT. Salam Gold Indonesia\",\"account_number\":\"10239482382\"},{\"b_id\":\"2-008-Bank Mandiri\",\"bank_id\":\"2\",\"bank_code\":\"008\",\"bank_name\":\"Bank Mandiri\",\"account_name\":\"PT Salam Gold\",\"account_number\":\"12323213312\"}]', 1, '2021-07-25 22:43:50', '2021-11-22 13:15:42');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `img_transactions`
--
ALTER TABLE `img_transactions`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `member_transactions`
--
ALTER TABLE `member_transactions`
  ADD PRIMARY KEY (`mtxn_id`);

--
-- Indexes for table `theme_settings`
--
ALTER TABLE `theme_settings`
  ADD PRIMARY KEY (`id`),
  ADD KEY `theme_settings_website_id_index` (`website_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `img_transactions`
--
ALTER TABLE `img_transactions`
  MODIFY `id` bigint NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `member_transactions`
--
ALTER TABLE `member_transactions`
  MODIFY `mtxn_id` bigint NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;

--
-- AUTO_INCREMENT for table `theme_settings`
--
ALTER TABLE `theme_settings`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `theme_settings`
--
ALTER TABLE `theme_settings`
  ADD CONSTRAINT `theme_settings_website_id_foreign` FOREIGN KEY (`website_id`) REFERENCES `websites` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
