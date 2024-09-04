-- phpMyAdmin SQL Dump
-- version 5.2.1-2.fc39
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Sep 04, 2024 at 06:26 AM
-- Server version: 10.5.25-MariaDB
-- PHP Version: 8.2.22

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `mamajii`
--

-- --------------------------------------------------------

--
-- Table structure for table `cache`
--

CREATE TABLE `cache` (
  `key` varchar(255) NOT NULL,
  `value` mediumtext NOT NULL,
  `expiration` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `cache`
--

INSERT INTO `cache` (`key`, `value`, `expiration`) VALUES
('d745d39b8e03c6dd17c37669d1072410', 'i:1;', 1725302537),
('d745d39b8e03c6dd17c37669d1072410:timer', 'i:1725302537;', 1725302537);

-- --------------------------------------------------------

--
-- Table structure for table `cache_locks`
--

CREATE TABLE `cache_locks` (
  `key` varchar(255) NOT NULL,
  `owner` varchar(255) NOT NULL,
  `expiration` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(255) NOT NULL,
  `root_cat_id` int(11) NOT NULL,
  `icon_address` varchar(4096) NOT NULL,
  `datetime` varchar(255) NOT NULL,
  `castom_link` varchar(255) NOT NULL,
  `visible` varchar(255) NOT NULL,
  `delete_flag` varchar(255) NOT NULL,
  `price` varchar(255) NOT NULL,
  `user_id` int(10) UNSIGNED NOT NULL,
  `video` varchar(4096) NOT NULL,
  `bio` varchar(4096) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `title`, `root_cat_id`, `icon_address`, `datetime`, `castom_link`, `visible`, `delete_flag`, `price`, `user_id`, `video`, `bio`) VALUES
(1, 'تست', 0, 'google.com', '2023-05-09 06:24:16am', 'https://google.com', '1', '1', '500', 1, '', ''),
(2, 'qqq', 0, 'ccc', '2023-05-09 06:24:51am', '', '1', '1', '800', 1, '', ''),
(3, 'ccsss', 0, 'sss', '2023-05-09 06:39:37am', '', '1', '1', '5500', 1, '', ''),
(4, 'رایگان', 0, '-', '2023-05-13 07:34:49pm', '', '1', '0', '0', 1, '', ''),
(5, 'پکیج رضا سگ پز', 0, 'https://mamajii.ir/FileManager//file.mp4', '2023-05-15 06:44:14pm', '', '1', '1', '1000', 1, '', ''),
(6, 'پکیج های رضا سگ پز', 0, 'https://www.simplilearn.com/ice9/free_resources_article_thumb/what_is_image_Processing.jpg', '2023-05-15 07:14:13pm', '', '1', '0', '1000', 1, 'https://mamajii.ir/FileManager/file.mp4', 'یه سری توضیحات');

-- --------------------------------------------------------

--
-- Table structure for table `cities`
--

CREATE TABLE `cities` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `area` int(11) NOT NULL,
  `status` varchar(255) NOT NULL,
  `datetime` varchar(255) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `cities`
--

INSERT INTO `cities` (`id`, `name`, `area`, `status`, `datetime`) VALUES
(1, 'تهران', 0, '1', '2023-05-09 06:12:16am'),
(2, 'تهران', 1, '1', '2023-05-09 06:12:22am');

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
-- Table structure for table `hospitals`
--

CREATE TABLE `hospitals` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `bio` varchar(255) NOT NULL,
  `lat` varchar(255) NOT NULL,
  `lng` varchar(255) NOT NULL,
  `address` varchar(255) NOT NULL,
  `start_time` varchar(255) NOT NULL,
  `end_time` varchar(255) NOT NULL,
  `tel` varchar(255) NOT NULL,
  `status` varchar(255) NOT NULL,
  `city_id` int(10) UNSIGNED NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `hospitals`
--

INSERT INTO `hospitals` (`id`, `name`, `bio`, `lat`, `lng`, `address`, `start_time`, `end_time`, `tel`, `status`, `city_id`) VALUES
(1, 'درمانگاه رضا', 'یه بیمارستان سوت و کور\r\nیه بیمارستان سوت و کور\r\nیه بیمارستان سوت و کور\r\nیه بیمارستان سوت و کور\r\nیه بیمارستان سوت و کور\r\nیه بیمارستان سوت و کور\r\nیه بیمارستان سوت و کور\r\nیه بیمارستان سوت و کور', '35.71325742509095', '51.420760452747345', 'خود تهران', '07:00', '21:00', '021335185165', '1', 2),
(2, 'تست دوم', 'توضیحات', '35.7313247120674', '51.37232780456543', 'ترهات', '22:35', '22:38', '08123456789', '1', 2),
(3, 'روح اله مزارعی', 'توضیحات بیمارستان', '35.74142684404291', '51.43275260925293', 'بهار شیراز پلا ۳۷ واحد ۳', '23:30', '12:30', '09228974200', '1', 2);

-- --------------------------------------------------------

--
-- Table structure for table `hospital_imgs`
--

CREATE TABLE `hospital_imgs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `hospital_id` int(10) UNSIGNED NOT NULL,
  `file_id` int(10) UNSIGNED NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `hospital_imgs`
--

INSERT INTO `hospital_imgs` (`id`, `hospital_id`, `file_id`) VALUES
(1, 1, 5),
(2, 2, 38);

-- --------------------------------------------------------

--
-- Table structure for table `jobs`
--

CREATE TABLE `jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `queue` varchar(255) NOT NULL,
  `payload` longtext NOT NULL,
  `attempts` tinyint(3) UNSIGNED NOT NULL,
  `reserved_at` int(10) UNSIGNED DEFAULT NULL,
  `available_at` int(10) UNSIGNED NOT NULL,
  `created_at` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `job_batches`
--

CREATE TABLE `job_batches` (
  `id` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `total_jobs` int(11) NOT NULL,
  `pending_jobs` int(11) NOT NULL,
  `failed_jobs` int(11) NOT NULL,
  `failed_job_ids` longtext NOT NULL,
  `options` mediumtext DEFAULT NULL,
  `cancelled_at` int(11) DEFAULT NULL,
  `created_at` int(11) NOT NULL,
  `finished_at` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

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
(1, '0001_01_01_000000_create_users_table', 1),
(2, '0001_01_01_000001_create_cache_table', 1),
(3, '0001_01_01_000002_create_jobs_table', 1),
(4, '2024_04_05_113123_add_two_factor_columns_to_users_table', 1),
(5, '2024_04_05_113142_create_personal_access_tokens_table', 1);

-- --------------------------------------------------------

--
-- Table structure for table `notifications`
--

CREATE TABLE `notifications` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(255) NOT NULL,
  `content` varchar(4096) NOT NULL,
  `link` varchar(255) NOT NULL,
  `from` varchar(255) NOT NULL,
  `seen` tinyint(1) NOT NULL,
  `user_id` int(10) UNSIGNED NOT NULL,
  `date` varchar(255) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `notifications`
--

INSERT INTO `notifications` (`id`, `title`, `content`, `link`, `from`, `seen`, `user_id`, `date`) VALUES
(1, 'سلام', 'سلام خوبی خوش اومدی توی ماماجی', 'https://google.com', 'ADMIN', 1, 4, ''),
(2, 'ثبت رزرو', 'OK', '-', 'ماماجی', 1, 4, ''),
(3, 'ثبت رزرو', 'دکتر رضا فرازی برای شما در تاریخ 30 اردیبهشت 1402 و ساعت 16 الی 17 رزرو شد.', '-', 'ماماجی', 1, 4, ''),
(4, 'ثبت رزرو', 'دکتر رضا فرازی برای شما در تاریخ 30 اردیبهشت 1402 و ساعت 17 الی 18 رزرو شد.\n\nشماره پیگیری : 14', '-', 'ماماجی', 1, 4, ''),
(5, 'ثبت رزرو', 'دکتر رضا فرازی برای شما در تاریخ 30 اردیبهشت 1402 و ساعت 20 الی 21 رزرو شد.\n\nشماره پیگیری : 15', '-', 'ماماجی', 1, 4, ''),
(6, 'ثبت رزرو', 'دکتر رضا فرازی برای شما در تاریخ 30 اردیبهشت 1402 و ساعت 12 الی 13 رزرو شد.\n\nشماره پیگیری : 16', '-', 'ماماجی', 1, 4, ''),
(7, 'ثبت سفارش', 'سفارش شما با موفقیت انجام شد\n\nشماره پیگیری : 1', '-', 'ماماجی', 1, 4, ''),
(8, 'ثبت سفارش', 'سفارش شما با موفقیت انجام شد\n\nشماره پیگیری : 2', '-', 'ماماجی', 1, 4, ''),
(9, 'تست تاریخ', 'تست تاریخ با گوگل', 'google.com', 'ADMIN', 1, 4, '2023-05-22 01:54:28pm'),
(10, 'ثبت سفارش', 'سفارش شما با موفقیت انجام شد\n\nشماره پیگیری : 3', '-', 'ماماجی', 0, 7, '2023-05-22 04:20:34pm'),
(11, 'ثبت سفارش', 'سفارش شما با موفقیت انجام شد\n\nشماره پیگیری : 4', '-', 'ماماجی', 1, 8, '2023-05-22 04:34:29pm'),
(12, 'ثبت رزرو', 'دکتر رضا فرازی برای شما در تاریخ 2 خرداد 1402 و ساعت 8 الی 9 رزرو شد.\n\nشماره پیگیری : 17', '-', 'ماماجی', 1, 8, '2023-05-22 04:58:27pm'),
(13, 'ثبت رزرو', 'دکتر رضا فرازی برای شما در تاریخ 2 خرداد 1402 و ساعت 7 الی 8 رزرو شد.\n\nشماره پیگیری : 18', '-', 'ماماجی', 1, 4, '2023-05-22 09:44:11pm'),
(14, 'ویزیت', 'کاربر گرامی ویزیت شما با موفقیت به پایان خود رسید', '-', 'ماماجی', 1, 4, '2023-05-23 07:14:11am'),
(15, 'کنسل شدن ویزیت', 'وقت ویزیت با شماره پیگیری 2 برای شما از طرف ماماجی لغو شد', '-', 'ماماجی', 1, 4, '2023-05-23 07:41:25am'),
(16, 'تست لينك', 'اين یک پیام تست لینک هست', 'https://google.com', 'ADMIN', 1, 8, '2023-05-23 01:22:26pm'),
(17, 'ثبت رزرو', 'دکتر رضا فرازی برای شما در تاریخ 8 خرداد 1402 و ساعت 0 الی 1 رزرو شد.\n\nشماره پیگیری : 19', '-', 'ماماجی', 1, 8, '2023-05-23 02:09:42pm'),
(18, 'پیام جدید', 'پیام جدید', 'https://yahoo.com', 'ADMIN', 1, 8, '2023-05-23 02:28:59pm'),
(19, 'ثبت رزرو', 'دکتر رضا فرازی برای شما در تاریخ 7 خرداد 1402 و ساعت 6 الی 7 رزرو شد.\n\nشماره پیگیری : 20', '-', 'ماماجی', 1, 4, '2023-05-23 04:31:51pm'),
(20, 'تست', 'تست', '-', 'ADMIN', 1, 4, '2023-05-23 07:40:10pm'),
(21, 'تست تماس', 'روی این متن کلیک کنید تا با ماماجی تماس بگیرید', 'tel:989386949300', 'ADMIN', 1, 8, '2023-05-23 07:41:46pm'),
(22, 'تست تماس', 'تست تماس', 'tel:989386949300', 'ADMIN', 1, 4, '2023-05-23 07:42:04pm'),
(23, 'ثبت رزرو', 'دکتر رضا فرازی برای شما در تاریخ 14 خرداد 1402 و ساعت 10 الی 11 رزرو شد.\n\nشماره پیگیری : 21', '-', 'ماماجی', 1, 4, '2023-05-31 06:43:45am'),
(24, 'ثبت سفارش', 'سفارش شما با موفقیت انجام شد\n\nشماره پیگیری : 5', '-', 'ماماجی', 1, 4, '2023-06-12 01:14:43pm'),
(25, 'تست پیام ها', 'تست پیام ها', 'تست', 'ADMIN', 0, 8, '2023-06-16 01:42:45pm'),
(26, 'تست پیام ها', 'تست پیام ها', 'تست پیام ها', 'ADMIN', 0, 7, '2023-06-16 01:42:55pm'),
(27, 'سلام', 'سلامه تستی', 'https://google.com', 'ADMIN', 0, 5, '2023-09-02 11:30:34am');

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
-- Table structure for table `sessions`
--

CREATE TABLE `sessions` (
  `id` varchar(255) NOT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `ip_address` varchar(45) DEFAULT NULL,
  `user_agent` text DEFAULT NULL,
  `payload` longtext NOT NULL,
  `last_activity` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `sessions`
--

INSERT INTO `sessions` (`id`, `user_id`, `ip_address`, `user_agent`, `payload`, `last_activity`) VALUES
('29iGFvBq7IfRx6xznI9uYAbfOm2a1PRjz9eISM4X', 1, '127.0.0.1', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/121.0.0.0 Safari/537.36', 'YTo2OntzOjY6Il90b2tlbiI7czo0MDoiMHhjOEplODA4cUI4MFZyaG5aZ1hKM1VzWlJ2OU0xVHR3c2VKS05aMyI7czozOiJ1cmwiO2E6MDp7fXM6OToiX3ByZXZpb3VzIjthOjE6e3M6MzoidXJsIjtzOjI3OiJodHRwOi8vbG9jYWxob3N0OjgwMDAvYWRtaW4iO31zOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX1zOjUwOiJsb2dpbl93ZWJfNTliYTM2YWRkYzJiMmY5NDAxNTgwZjAxNGM3ZjU4ZWE0ZTMwOTg5ZCI7aToxO3M6MjE6InBhc3N3b3JkX2hhc2hfc2FuY3R1bSI7czo2MDoiJDJ5JDEyJEM2cTQ2Wll2MzJTbTluRlJOTUkvU3VRZjNoSTBCLjBVWS5jbEFXWFNiZUVCenpzWkNoSzllIjt9', 1725305487),
('CNTakUO7VLQE91wyC4HNUD2ATxk7qOC4gJskSPPG', 1, '127.0.0.1', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/121.0.0.0 Safari/537.36', 'YTo2OntzOjY6Il90b2tlbiI7czo0MDoiSHJma3hTR2p5ZVRrc0ZMVTVwZmlnSjk0SDYwckxLMkpzQ2owcFZwQiI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6Mzc6Imh0dHA6Ly9sb2NhbGhvc3Q6ODAwMC9hZG1pbi9ob3NwaXRhbHMiO31zOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX1zOjM6InVybCI7YTowOnt9czo1MDoibG9naW5fd2ViXzU5YmEzNmFkZGMyYjJmOTQwMTU4MGYwMTRjN2Y1OGVhNGUzMDk4OWQiO2k6MTtzOjIxOiJwYXNzd29yZF9oYXNoX3NhbmN0dW0iO3M6NjA6IiQyeSQxMiRDNnE0NlpZdjMyU205bkZSTk1JL1N1UWYzaEkwQi4wVVkuY2xBV1hTYmVFQnp6c1pDaEs5ZSI7fQ==', 1724184715),
('lzEIUpvYlc5JveoLjCtk4OMoZ2AWIHLZZG06QvuL', NULL, '127.0.0.1', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/121.0.0.0 Safari/537.36', 'YTo0OntzOjY6Il90b2tlbiI7czo0MDoiOWE5YWV4dFZFNzNXQTRHTFZVME8ybkNTeWNvNVg2V2NwVWdXZEc2eSI7czozOiJ1cmwiO2E6MTp7czo4OiJpbnRlbmRlZCI7czozNzoiaHR0cDovL2xvY2FsaG9zdDo4MDAwL2FkbWluL2hvc3BpdGFscyI7fXM6OToiX3ByZXZpb3VzIjthOjE6e3M6MzoidXJsIjtzOjI3OiJodHRwOi8vbG9jYWxob3N0OjgwMDAvbG9naW4iO31zOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX19', 1725431168),
('oOi8ezD1RcpLF4lKEMvj2Pk7el7vaqQFGbhKTS0Z', 1, '127.0.0.1', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/121.0.0.0 Safari/537.36', 'YTo1OntzOjY6Il90b2tlbiI7czo0MDoiczc5clV4SHJzbDBsUEJvMk1ZaUZ5cWtZQ0FLY0NmcktyNEdOUXZpdyI7czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6Mzc6Imh0dHA6Ly9sb2NhbGhvc3Q6ODAwMC9hZG1pbi9ob3NwaXRhbHMiO31zOjUwOiJsb2dpbl93ZWJfNTliYTM2YWRkYzJiMmY5NDAxNTgwZjAxNGM3ZjU4ZWE0ZTMwOTg5ZCI7aToxO3M6MjE6InBhc3N3b3JkX2hhc2hfc2FuY3R1bSI7czo2MDoiJDJ5JDEyJEM2cTQ2Wll2MzJTbTluRlJOTUkvU3VRZjNoSTBCLjBVWS5jbEFXWFNiZUVCenpzWkNoSzllIjt9', 1724271256);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `username` varchar(200) DEFAULT NULL,
  `user_type` varchar(200) DEFAULT NULL,
  `email` varchar(255) NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `two_factor_secret` text DEFAULT NULL,
  `two_factor_recovery_codes` text DEFAULT NULL,
  `two_factor_confirmed_at` timestamp NULL DEFAULT NULL,
  `remember_token` varchar(100) DEFAULT NULL,
  `current_team_id` bigint(20) UNSIGNED DEFAULT NULL,
  `profile_photo_path` varchar(2048) DEFAULT NULL,
  `status` int(11) NOT NULL DEFAULT 0,
  `login_token` varchar(200) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `username`, `user_type`, `email`, `email_verified_at`, `password`, `two_factor_secret`, `two_factor_recovery_codes`, `two_factor_confirmed_at`, `remember_token`, `current_team_id`, `profile_photo_path`, `status`, `login_token`, `created_at`, `updated_at`) VALUES
(1, 'Rouhollah Mazarei', 'rouhollah@gmail.com', 'admin', 'rouhollah@gmail.com', NULL, '$2y$12$C6q46ZYv32Sm9nFRNMI/SuQf3hI0B.0UY.clAWXSbeEBzzsZChK9e', NULL, NULL, NULL, NULL, NULL, NULL, 1, NULL, NULL, '2024-08-20 19:04:06');

-- --------------------------------------------------------

--
-- Table structure for table `user_types`
--

CREATE TABLE `user_types` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(255) NOT NULL,
  `en_title` varchar(255) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `user_types`
--

INSERT INTO `user_types` (`id`, `title`, `en_title`) VALUES
(1, 'دکتر', 'Doctor');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `cache`
--
ALTER TABLE `cache`
  ADD PRIMARY KEY (`key`);

--
-- Indexes for table `cache_locks`
--
ALTER TABLE `cache_locks`
  ADD PRIMARY KEY (`key`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `cities`
--
ALTER TABLE `cities`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `hospitals`
--
ALTER TABLE `hospitals`
  ADD PRIMARY KEY (`id`),
  ADD KEY `hospital_tbls_city_id_foreign` (`city_id`);

--
-- Indexes for table `hospital_imgs`
--
ALTER TABLE `hospital_imgs`
  ADD PRIMARY KEY (`id`),
  ADD KEY `hospital_img_tbls_hospital_id_foreign` (`hospital_id`),
  ADD KEY `hospital_img_tbls_file_id_foreign` (`file_id`);

--
-- Indexes for table `jobs`
--
ALTER TABLE `jobs`
  ADD PRIMARY KEY (`id`),
  ADD KEY `jobs_queue_index` (`queue`);

--
-- Indexes for table `job_batches`
--
ALTER TABLE `job_batches`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `notifications`
--
ALTER TABLE `notifications`
  ADD PRIMARY KEY (`id`),
  ADD KEY `notifications_tbls_user_id_foreign` (`user_id`);

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
-- Indexes for table `sessions`
--
ALTER TABLE `sessions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `sessions_user_id_index` (`user_id`),
  ADD KEY `sessions_last_activity_index` (`last_activity`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- Indexes for table `user_types`
--
ALTER TABLE `user_types`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `cities`
--
ALTER TABLE `cities`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `hospitals`
--
ALTER TABLE `hospitals`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `hospital_imgs`
--
ALTER TABLE `hospital_imgs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `jobs`
--
ALTER TABLE `jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `notifications`
--
ALTER TABLE `notifications`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `user_types`
--
ALTER TABLE `user_types`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
