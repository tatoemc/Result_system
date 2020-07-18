-- phpMyAdmin SQL Dump
-- version 4.9.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 01, 2020 at 11:39 AM
-- Server version: 10.4.8-MariaDB
-- PHP Version: 7.2.23

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `result-system`
--

-- --------------------------------------------------------

--
-- Table structure for table `semesters`
--

CREATE TABLE `semesters` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8_unicode_ci NOT NULL,
  `code` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `grade_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `semesters`
--

INSERT INTO `semesters` (`id`, `name`, `code`, `grade_id`, `created_at`, `updated_at`) VALUES
(1, 'الفصل الاول', '1', 1, '2020-06-29 19:41:19', '2020-06-29 19:41:19'),
(2, 'الفصل الثاني', '2', 1, '2020-06-29 19:41:19', '2020-06-29 19:41:19'),
(3, 'الفصل الثالث', '3', 2, '2020-06-29 19:41:19', '2020-06-29 19:41:19'),
(4, 'الفصل الرابع', '4', 2, '2020-06-29 19:41:19', '2020-06-29 19:41:19'),
(5, 'الفصل الخامس', '5', 3, '2020-06-29 19:41:19', '2020-06-29 19:41:19'),
(6, 'الفصل السادس', '6', 3, '2020-06-29 19:41:19', '2020-06-29 19:41:19'),
(7, 'الفصل السايع', '7', 4, '2020-06-29 19:41:19', '2020-06-29 19:41:19'),
(8, 'الفصل الثامن', '8', 4, '2020-06-29 19:41:19', '2020-06-29 19:41:19'),
(9, 'الفصل التاسع', '9', 5, '2020-06-29 19:41:19', '2020-06-29 19:41:19'),
(10, 'الفصل العاشر', '10', 5, NULL, NULL),
(11, 'الحادي عشر', '11', 6, NULL, NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `semesters`
--
ALTER TABLE `semesters`
  ADD PRIMARY KEY (`id`),
  ADD KEY `semesters_grade_id_foreign` (`grade_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `semesters`
--
ALTER TABLE `semesters`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `semesters`
--
ALTER TABLE `semesters`
  ADD CONSTRAINT `semesters_grade_id_foreign` FOREIGN KEY (`grade_id`) REFERENCES `grades` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
