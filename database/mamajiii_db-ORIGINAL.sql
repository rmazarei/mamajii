-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Aug 19, 2024 at 12:28 AM
-- Server version: 10.3.39-MariaDB-cll-lve
-- PHP Version: 8.1.29

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `mamajiii_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `categories_tbls`
--

CREATE TABLE `categories_tbls` (
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
-- Dumping data for table `categories_tbls`
--

INSERT INTO `categories_tbls` (`id`, `title`, `root_cat_id`, `icon_address`, `datetime`, `castom_link`, `visible`, `delete_flag`, `price`, `user_id`, `video`, `bio`) VALUES
(1, 'تست', 0, 'google.com', '2023-05-09 06:24:16am', 'https://google.com', '1', '1', '500', 1, '', ''),
(2, 'qqq', 0, 'ccc', '2023-05-09 06:24:51am', '', '1', '1', '800', 1, '', ''),
(3, 'ccsss', 0, 'sss', '2023-05-09 06:39:37am', '', '1', '1', '5500', 1, '', ''),
(4, 'رایگان', 0, '-', '2023-05-13 07:34:49pm', '', '1', '0', '0', 1, '', ''),
(5, 'پکیج رضا سگ پز', 0, 'https://mamajii.ir/FileManager//file.mp4', '2023-05-15 06:44:14pm', '', '1', '1', '1000', 1, '', ''),
(6, 'پکیج های رضا سگ پز', 0, 'https://www.simplilearn.com/ice9/free_resources_article_thumb/what_is_image_Processing.jpg', '2023-05-15 07:14:13pm', '', '1', '0', '1000', 1, 'https://mamajii.ir/FileManager/file.mp4', 'یه سری توضیحات');

-- --------------------------------------------------------

--
-- Table structure for table `chat_tbls`
--

CREATE TABLE `chat_tbls` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `content` varchar(255) NOT NULL,
  `date` varchar(255) NOT NULL,
  `user_id` int(11) NOT NULL,
  `doctor_id` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `chat_tbls`
--

INSERT INTO `chat_tbls` (`id`, `content`, `date`, `user_id`, `doctor_id`) VALUES
(2, 'salam', '2023-05-26 09:12:07am', 4, 1),
(3, 'سلام', '2023-05-26 12:30:59pm', 4, 1),
(4, 'آقای دکتر من حامله ام', '2023-05-26 12:32:12pm', 4, 1),
(5, 'خب منم حامله ام', '2023-05-26 12:32:26pm', 4, 1),
(6, 'اااا', '2023-05-26 12:48:21pm', 4, 1),
(7, 'تا حالا حامله ندیدی؟', '2023-05-26 06:22:24pm', 4, 1),
(8, 'تیت', '2023-05-26 07:49:16pm', 4, 1),
(9, 'چه طوری حامله', '2023-05-26 07:54:46pm', 4, 1),
(10, 'تو بهتری', '2023-05-26 07:54:58pm', 4, 1),
(11, 'test', '2023-05-26 07:59:57pm', 4, 1),
(12, 'نبنب', '2023-05-26 08:00:06pm', 4, 1),
(13, 'گم شو', '2023-06-12 01:26:16pm', 4, 1),
(14, 'چشم', '2023-06-12 01:28:27pm', 4, 1);

-- --------------------------------------------------------

--
-- Table structure for table `city_tbls`
--

CREATE TABLE `city_tbls` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `area` int(11) NOT NULL,
  `status` varchar(255) NOT NULL,
  `datetime` varchar(255) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `city_tbls`
--

INSERT INTO `city_tbls` (`id`, `name`, `area`, `status`, `datetime`) VALUES
(1, 'تهران', 0, '1', '2023-05-09 06:12:16am'),
(2, 'تهران', 1, '1', '2023-05-09 06:12:22am');

-- --------------------------------------------------------

--
-- Table structure for table `discount_code_tbls`
--

CREATE TABLE `discount_code_tbls` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `code` varchar(255) NOT NULL,
  `count` int(11) NOT NULL,
  `delete_flag` varchar(255) NOT NULL,
  `date` varchar(255) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `file_tbls`
--

CREATE TABLE `file_tbls` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `file_name` longtext NOT NULL,
  `file_address` longtext NOT NULL,
  `file_address_server` longtext NOT NULL,
  `file_type` longtext NOT NULL,
  `file_extention` longtext NOT NULL,
  `file_size` longtext NOT NULL,
  `file_hash` longtext NOT NULL,
  `file_date_time` longtext NOT NULL,
  `user_id` int(10) UNSIGNED NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `file_tbls`
--

INSERT INTO `file_tbls` (`id`, `file_name`, `file_address`, `file_address_server`, `file_type`, `file_extention`, `file_size`, `file_hash`, `file_date_time`, `user_id`) VALUES
(1, '62a28541a024e58de835d95dca9315f4bed141c64609cbf10517868894991cdd.jpg', 'FileManager/Temp/62a28541a024e58de835d95dca9315f4bed141c64609cbf10517868894991cdd.jpg', 'C:\\Users\\Rezafta\\Desktop\\mamajipanel\\public/FileManager/Temp/62a28541a024e58de835d95dca9315f4bed141c64609cbf10517868894991cdd.jpg', 'Sound', 'jpg', '28739', '62a28541a024e58de835d95dca9315f4bed141c64609cbf10517868894991cdd', '2023-05-09 11:41:27am', 1),
(2, 'bba8c8cc41dd64f99419f804a80cd625c7b203e71fa5567a23f5f6c9c18383b3.png', 'FileManager/Temp/bba8c8cc41dd64f99419f804a80cd625c7b203e71fa5567a23f5f6c9c18383b3.png', 'C:\\Users\\Rezafta\\Desktop\\mamajipanel\\public/FileManager/Temp/bba8c8cc41dd64f99419f804a80cd625c7b203e71fa5567a23f5f6c9c18383b3.png', 'Sound', 'png', '155591', 'bba8c8cc41dd64f99419f804a80cd625c7b203e71fa5567a23f5f6c9c18383b3', '2023-05-09 11:55:21am', 1),
(3, '62a28541a024e58de835d95dca9315f4bed141c64609cbf10517868894991cdd.jpg', 'FileManager/Temp/62a28541a024e58de835d95dca9315f4bed141c64609cbf10517868894991cdd.jpg', 'C:\\Users\\Rezafta\\Desktop\\mamajipanel\\public/FileManager/Temp/62a28541a024e58de835d95dca9315f4bed141c64609cbf10517868894991cdd.jpg', 'Image', 'jpg', '28739', '62a28541a024e58de835d95dca9315f4bed141c64609cbf10517868894991cdd', '2023-05-09 11:59:13am', 1),
(4, '62a28541a024e58de835d95dca9315f4bed141c64609cbf10517868894991cdd.jpg', 'FileManager/Temp/62a28541a024e58de835d95dca9315f4bed141c64609cbf10517868894991cdd.jpg', '/home/mamajiii/public_html/FileManager/Temp/62a28541a024e58de835d95dca9315f4bed141c64609cbf10517868894991cdd.jpg', 'Image', 'jpg', '28739', '62a28541a024e58de835d95dca9315f4bed141c64609cbf10517868894991cdd', '2023-05-09 04:17:19pm', 1),
(5, '95e059b48b9314adf92ae351b7309905e613773379d3057ed335571e585b94e5.jpg', 'FileManager/Temp/95e059b48b9314adf92ae351b7309905e613773379d3057ed335571e585b94e5.jpg', '/home/mamajiii/public_html/FileManager/Temp/95e059b48b9314adf92ae351b7309905e613773379d3057ed335571e585b94e5.jpg', 'Image', 'jpg', '35869', '95e059b48b9314adf92ae351b7309905e613773379d3057ed335571e585b94e5', '2023-05-11 06:03:25pm', 1),
(6, '7fa99a8487bd13147aa77d54cd77c6e672fa8fbc7ae8c2bd7806c7d161ff5864.bin', 'FileManager/Temp/7fa99a8487bd13147aa77d54cd77c6e672fa8fbc7ae8c2bd7806c7d161ff5864.bin', '/home/mamajiii/public_html/FileManager/Temp/7fa99a8487bd13147aa77d54cd77c6e672fa8fbc7ae8c2bd7806c7d161ff5864.bin', 'Sound', 'bin', '5361294', '7fa99a8487bd13147aa77d54cd77c6e672fa8fbc7ae8c2bd7806c7d161ff5864', '2023-05-14 01:15:58pm', 1),
(7, '810a10d5c160d6aca19a50f83ae331d7b56bbbc2b07160bda49a415cb86f9a66.bin', 'FileManager/Temp/810a10d5c160d6aca19a50f83ae331d7b56bbbc2b07160bda49a415cb86f9a66.bin', '/home/mamajiii/public_html/FileManager/Temp/810a10d5c160d6aca19a50f83ae331d7b56bbbc2b07160bda49a415cb86f9a66.bin', 'Sound', 'bin', '6306100', '810a10d5c160d6aca19a50f83ae331d7b56bbbc2b07160bda49a415cb86f9a66', '2023-05-14 01:19:54pm', 1),
(8, '3a86d2733242fb1072ce55da21a38487a80f26cc260e96620a3f2d3397c0dfa5.mp3', 'FileManager/Temp/3a86d2733242fb1072ce55da21a38487a80f26cc260e96620a3f2d3397c0dfa5.mp3', '/home/mamajiii/public_html/FileManager/Temp/3a86d2733242fb1072ce55da21a38487a80f26cc260e96620a3f2d3397c0dfa5.mp3', 'Sound', 'mp3', '3289088', '3a86d2733242fb1072ce55da21a38487a80f26cc260e96620a3f2d3397c0dfa5', '2023-05-14 01:25:44pm', 1),
(9, '9f03754b7a82b8129feb0171e4fef1e4e919998e6186c93a5d1c57a73ffc37ae.mp3', 'FileManager/Temp/9f03754b7a82b8129feb0171e4fef1e4e919998e6186c93a5d1c57a73ffc37ae.mp3', '/home/mamajiii/public_html/FileManager/Temp/9f03754b7a82b8129feb0171e4fef1e4e919998e6186c93a5d1c57a73ffc37ae.mp3', 'Sound', 'mp3', '6224184', '9f03754b7a82b8129feb0171e4fef1e4e919998e6186c93a5d1c57a73ffc37ae', '2023-05-14 01:33:54pm', 1),
(10, '62a28541a024e58de835d95dca9315f4bed141c64609cbf10517868894991cdd.jpg', 'FileManager/Temp/62a28541a024e58de835d95dca9315f4bed141c64609cbf10517868894991cdd.jpg', '/home/mamajiii/public_html/FileManager/Temp/62a28541a024e58de835d95dca9315f4bed141c64609cbf10517868894991cdd.jpg', 'Sound', 'jpg', '28739', '62a28541a024e58de835d95dca9315f4bed141c64609cbf10517868894991cdd', '2023-05-14 01:35:35pm', 1),
(11, 'efe2d1339862215050df66eb473b7a75ee0c403b5264c5f07ee687a5462e5db9.mp3', 'FileManager/Temp/efe2d1339862215050df66eb473b7a75ee0c403b5264c5f07ee687a5462e5db9.mp3', '/home/mamajiii/public_html/FileManager/Temp/efe2d1339862215050df66eb473b7a75ee0c403b5264c5f07ee687a5462e5db9.mp3', 'Sound', 'mp3', '3239952', 'efe2d1339862215050df66eb473b7a75ee0c403b5264c5f07ee687a5462e5db9', '2023-05-14 01:42:50pm', 1),
(12, 'efe2d1339862215050df66eb473b7a75ee0c403b5264c5f07ee687a5462e5db9.mp3', 'FileManager/Temp/efe2d1339862215050df66eb473b7a75ee0c403b5264c5f07ee687a5462e5db9.mp3', '/home/mamajiii/public_html/FileManager/Temp/efe2d1339862215050df66eb473b7a75ee0c403b5264c5f07ee687a5462e5db9.mp3', 'Sound', 'mp3', '3239952', 'efe2d1339862215050df66eb473b7a75ee0c403b5264c5f07ee687a5462e5db9', '2023-05-14 01:45:14pm', 1),
(13, 'efe2d1339862215050df66eb473b7a75ee0c403b5264c5f07ee687a5462e5db9.mp3', 'FileManager/Temp/efe2d1339862215050df66eb473b7a75ee0c403b5264c5f07ee687a5462e5db9.mp3', '/home/mamajiii/public_html/FileManager/Temp/efe2d1339862215050df66eb473b7a75ee0c403b5264c5f07ee687a5462e5db9.mp3', 'Sound', 'mp3', '3239952', 'efe2d1339862215050df66eb473b7a75ee0c403b5264c5f07ee687a5462e5db9', '2023-05-14 01:46:24pm', 1),
(14, 'efe2d1339862215050df66eb473b7a75ee0c403b5264c5f07ee687a5462e5db9.mp3', 'FileManager/Temp/efe2d1339862215050df66eb473b7a75ee0c403b5264c5f07ee687a5462e5db9.mp3', '/home/mamajiii/public_html/FileManager/Temp/efe2d1339862215050df66eb473b7a75ee0c403b5264c5f07ee687a5462e5db9.mp3', 'Sound', 'mp3', '3239952', 'efe2d1339862215050df66eb473b7a75ee0c403b5264c5f07ee687a5462e5db9', '2023-05-14 01:48:17pm', 1),
(15, 'efe2d1339862215050df66eb473b7a75ee0c403b5264c5f07ee687a5462e5db9.mp3', 'FileManager/Temp/efe2d1339862215050df66eb473b7a75ee0c403b5264c5f07ee687a5462e5db9.mp3', '/home/mamajiii/public_html/FileManager/Temp/efe2d1339862215050df66eb473b7a75ee0c403b5264c5f07ee687a5462e5db9.mp3', 'Sound', 'mp3', '3239952', 'efe2d1339862215050df66eb473b7a75ee0c403b5264c5f07ee687a5462e5db9', '2023-05-14 01:49:46pm', 1),
(16, 'efe2d1339862215050df66eb473b7a75ee0c403b5264c5f07ee687a5462e5db9.mp3', 'FileManager/Temp/efe2d1339862215050df66eb473b7a75ee0c403b5264c5f07ee687a5462e5db9.mp3', '/home/mamajiii/public_html/FileManager/Temp/efe2d1339862215050df66eb473b7a75ee0c403b5264c5f07ee687a5462e5db9.mp3', 'Sound', 'mp3', '3239952', 'efe2d1339862215050df66eb473b7a75ee0c403b5264c5f07ee687a5462e5db9', '2023-05-14 01:51:08pm', 1),
(17, 'efe2d1339862215050df66eb473b7a75ee0c403b5264c5f07ee687a5462e5db9.mp3', 'FileManager/Temp/efe2d1339862215050df66eb473b7a75ee0c403b5264c5f07ee687a5462e5db9.mp3', '/home/mamajiii/public_html/FileManager/Temp/efe2d1339862215050df66eb473b7a75ee0c403b5264c5f07ee687a5462e5db9.mp3', 'Sound', 'mp3', '3239952', 'efe2d1339862215050df66eb473b7a75ee0c403b5264c5f07ee687a5462e5db9', '2023-05-14 01:52:00pm', 1),
(18, 'efe2d1339862215050df66eb473b7a75ee0c403b5264c5f07ee687a5462e5db9.mp3', 'FileManager/Temp/efe2d1339862215050df66eb473b7a75ee0c403b5264c5f07ee687a5462e5db9.mp3', '/home/mamajiii/public_html/FileManager/Temp/efe2d1339862215050df66eb473b7a75ee0c403b5264c5f07ee687a5462e5db9.mp3', 'Sound', 'mp3', '3239952', 'efe2d1339862215050df66eb473b7a75ee0c403b5264c5f07ee687a5462e5db9', '2023-05-14 04:20:49pm', 1),
(19, 'efe2d1339862215050df66eb473b7a75ee0c403b5264c5f07ee687a5462e5db9.mp3', 'FileManager/Temp/efe2d1339862215050df66eb473b7a75ee0c403b5264c5f07ee687a5462e5db9.mp3', '/home/mamajiii/public_html/FileManager/Temp/efe2d1339862215050df66eb473b7a75ee0c403b5264c5f07ee687a5462e5db9.mp3', 'Sound', 'mp3', '3239952', 'efe2d1339862215050df66eb473b7a75ee0c403b5264c5f07ee687a5462e5db9', '2023-05-14 04:23:37pm', 1),
(20, 'efe2d1339862215050df66eb473b7a75ee0c403b5264c5f07ee687a5462e5db9.mp3', 'FileManager/Temp/efe2d1339862215050df66eb473b7a75ee0c403b5264c5f07ee687a5462e5db9.mp3', '/home/mamajiii/public_html/FileManager/Temp/efe2d1339862215050df66eb473b7a75ee0c403b5264c5f07ee687a5462e5db9.mp3', 'Sound', 'mp3', '3239952', 'efe2d1339862215050df66eb473b7a75ee0c403b5264c5f07ee687a5462e5db9', '2023-05-14 04:28:15pm', 1),
(21, '9602012031b8fe2bc890618d8efc5f733ae70ef54de5d559e6c6b445546bc694.mp3', 'FileManager/Temp/9602012031b8fe2bc890618d8efc5f733ae70ef54de5d559e6c6b445546bc694.mp3', '/home/mamajiii/public_html/FileManager/Temp/9602012031b8fe2bc890618d8efc5f733ae70ef54de5d559e6c6b445546bc694.mp3', 'Sound', 'mp3', '3262911', '9602012031b8fe2bc890618d8efc5f733ae70ef54de5d559e6c6b445546bc694', '2023-05-14 04:35:04pm', 1),
(22, '9602012031b8fe2bc890618d8efc5f733ae70ef54de5d559e6c6b445546bc694.mp3', 'FileManager/Temp/9602012031b8fe2bc890618d8efc5f733ae70ef54de5d559e6c6b445546bc694.mp3', '/home/mamajiii/public_html/FileManager/Temp/9602012031b8fe2bc890618d8efc5f733ae70ef54de5d559e6c6b445546bc694.mp3', 'Sound', 'mp3', '3262911', '9602012031b8fe2bc890618d8efc5f733ae70ef54de5d559e6c6b445546bc694', '2023-05-14 06:12:12pm', 1),
(23, '9602012031b8fe2bc890618d8efc5f733ae70ef54de5d559e6c6b445546bc694.mp3', 'FileManager/Temp/9602012031b8fe2bc890618d8efc5f733ae70ef54de5d559e6c6b445546bc694.mp3', '/home/mamajiii/public_html/FileManager/Temp/9602012031b8fe2bc890618d8efc5f733ae70ef54de5d559e6c6b445546bc694.mp3', 'Sound', 'mp3', '3262911', '9602012031b8fe2bc890618d8efc5f733ae70ef54de5d559e6c6b445546bc694', '2023-05-14 06:19:47pm', 1),
(24, '9602012031b8fe2bc890618d8efc5f733ae70ef54de5d559e6c6b445546bc694.mp3', 'FileManager/Temp/9602012031b8fe2bc890618d8efc5f733ae70ef54de5d559e6c6b445546bc694.mp3', '/home/mamajiii/public_html/FileManager/Temp/9602012031b8fe2bc890618d8efc5f733ae70ef54de5d559e6c6b445546bc694.mp3', 'Sound', 'mp3', '3262911', '9602012031b8fe2bc890618d8efc5f733ae70ef54de5d559e6c6b445546bc694', '2023-05-14 06:20:55pm', 1),
(25, '9602012031b8fe2bc890618d8efc5f733ae70ef54de5d559e6c6b445546bc694.mp3', 'FileManager/Temp/9602012031b8fe2bc890618d8efc5f733ae70ef54de5d559e6c6b445546bc694.mp3', '/home/mamajiii/public_html/FileManager/Temp/9602012031b8fe2bc890618d8efc5f733ae70ef54de5d559e6c6b445546bc694.mp3', 'Sound', 'mp3', '3262911', '9602012031b8fe2bc890618d8efc5f733ae70ef54de5d559e6c6b445546bc694', '2023-05-14 06:22:12pm', 1),
(26, '9602012031b8fe2bc890618d8efc5f733ae70ef54de5d559e6c6b445546bc694.mp3', 'FileManager/Temp/9602012031b8fe2bc890618d8efc5f733ae70ef54de5d559e6c6b445546bc694.mp3', '/home/mamajiii/public_html/FileManager/Temp/9602012031b8fe2bc890618d8efc5f733ae70ef54de5d559e6c6b445546bc694.mp3', 'Sound', 'mp3', '3262911', '9602012031b8fe2bc890618d8efc5f733ae70ef54de5d559e6c6b445546bc694', '2023-05-14 06:25:19pm', 1),
(27, '9602012031b8fe2bc890618d8efc5f733ae70ef54de5d559e6c6b445546bc694.mp3', 'FileManager/Temp/9602012031b8fe2bc890618d8efc5f733ae70ef54de5d559e6c6b445546bc694.mp3', '/home/mamajiii/public_html/FileManager/Temp/9602012031b8fe2bc890618d8efc5f733ae70ef54de5d559e6c6b445546bc694.mp3', 'Sound', 'mp3', '3262911', '9602012031b8fe2bc890618d8efc5f733ae70ef54de5d559e6c6b445546bc694', '2023-05-14 06:27:29pm', 1),
(28, '810a10d5c160d6aca19a50f83ae331d7b56bbbc2b07160bda49a415cb86f9a66.bin', 'FileManager/Temp/810a10d5c160d6aca19a50f83ae331d7b56bbbc2b07160bda49a415cb86f9a66.bin', '/home/mamajiii/public_html/FileManager/Temp/810a10d5c160d6aca19a50f83ae331d7b56bbbc2b07160bda49a415cb86f9a66.bin', 'Sound', 'bin', '6306100', '810a10d5c160d6aca19a50f83ae331d7b56bbbc2b07160bda49a415cb86f9a66', '2023-05-14 06:30:09pm', 1),
(29, '62a28541a024e58de835d95dca9315f4bed141c64609cbf10517868894991cdd.jpg', 'FileManager/Temp/62a28541a024e58de835d95dca9315f4bed141c64609cbf10517868894991cdd.jpg', '/home/mamajiii/public_html/FileManager/Temp/62a28541a024e58de835d95dca9315f4bed141c64609cbf10517868894991cdd.jpg', 'Image', 'jpg', '28739', '62a28541a024e58de835d95dca9315f4bed141c64609cbf10517868894991cdd', '2023-05-14 07:41:37pm', 1),
(30, '62a28541a024e58de835d95dca9315f4bed141c64609cbf10517868894991cdd.jpg', 'FileManager/Temp/62a28541a024e58de835d95dca9315f4bed141c64609cbf10517868894991cdd.jpg', '/home/mamajiii/public_html/FileManager/Temp/62a28541a024e58de835d95dca9315f4bed141c64609cbf10517868894991cdd.jpg', 'Image', 'jpg', '28739', '62a28541a024e58de835d95dca9315f4bed141c64609cbf10517868894991cdd', '2023-05-14 07:42:17pm', 1),
(31, '9dd4acc796cd72630a1dd1f6c6ddc7fb0ef9c3af66ff84250cfcf9fbe5490659.mp3', 'FileManager/Temp/9dd4acc796cd72630a1dd1f6c6ddc7fb0ef9c3af66ff84250cfcf9fbe5490659.mp3', '/home/mamajiii/public_html/FileManager/Temp/9dd4acc796cd72630a1dd1f6c6ddc7fb0ef9c3af66ff84250cfcf9fbe5490659.mp3', 'Sound', 'mp3', '5069406', '9dd4acc796cd72630a1dd1f6c6ddc7fb0ef9c3af66ff84250cfcf9fbe5490659', '2023-05-15 06:46:27pm', 1),
(32, '9dd4acc796cd72630a1dd1f6c6ddc7fb0ef9c3af66ff84250cfcf9fbe5490659.mp3', 'FileManager/Temp/9dd4acc796cd72630a1dd1f6c6ddc7fb0ef9c3af66ff84250cfcf9fbe5490659.mp3', '/home/mamajiii/public_html/FileManager/Temp/9dd4acc796cd72630a1dd1f6c6ddc7fb0ef9c3af66ff84250cfcf9fbe5490659.mp3', 'Sound', 'mp3', '5069406', '9dd4acc796cd72630a1dd1f6c6ddc7fb0ef9c3af66ff84250cfcf9fbe5490659', '2023-05-16 08:05:16am', 1),
(33, '4e4e04e2b75391801d0704d27eb1431f7d0f3ab24acdd8de80ca132eb6aabe68.png', 'FileManager/Temp/4e4e04e2b75391801d0704d27eb1431f7d0f3ab24acdd8de80ca132eb6aabe68.png', '/home/mamajiii/public_html/public/FileManager/Temp/4e4e04e2b75391801d0704d27eb1431f7d0f3ab24acdd8de80ca132eb6aabe68.png', 'Image', 'png', '231375', '4e4e04e2b75391801d0704d27eb1431f7d0f3ab24acdd8de80ca132eb6aabe68', '2023-05-21 05:10:31pm', 1),
(34, '7e514893153f6ab9a4c40f52fc1f5399bd7cdfa97746498e20748e8068c045c3.jpg', 'FileManager/Temp/7e514893153f6ab9a4c40f52fc1f5399bd7cdfa97746498e20748e8068c045c3.jpg', '/home/mamajiii/public_html/public/FileManager/Temp/7e514893153f6ab9a4c40f52fc1f5399bd7cdfa97746498e20748e8068c045c3.jpg', 'Image', 'jpg', '371162', '7e514893153f6ab9a4c40f52fc1f5399bd7cdfa97746498e20748e8068c045c3', '2023-05-21 06:41:24pm', 1),
(35, 'b8e60d0db946c7c73d690c21817f0a75017cf73d4a28d2268ee2c3b25ff027fd.png', 'FileManager/Temp/b8e60d0db946c7c73d690c21817f0a75017cf73d4a28d2268ee2c3b25ff027fd.png', '/home/mamajiii/public_html/public/FileManager/Temp/b8e60d0db946c7c73d690c21817f0a75017cf73d4a28d2268ee2c3b25ff027fd.png', 'Image', 'png', '78675', 'b8e60d0db946c7c73d690c21817f0a75017cf73d4a28d2268ee2c3b25ff027fd', '2023-05-22 08:25:59am', 1),
(36, 'b8e60d0db946c7c73d690c21817f0a75017cf73d4a28d2268ee2c3b25ff027fd.png', 'FileManager/Temp/b8e60d0db946c7c73d690c21817f0a75017cf73d4a28d2268ee2c3b25ff027fd.png', '/home/mamajiii/public_html/public/FileManager/Temp/b8e60d0db946c7c73d690c21817f0a75017cf73d4a28d2268ee2c3b25ff027fd.png', 'Image', 'png', '78675', 'b8e60d0db946c7c73d690c21817f0a75017cf73d4a28d2268ee2c3b25ff027fd', '2023-05-22 08:27:38am', 1),
(37, 'b8e60d0db946c7c73d690c21817f0a75017cf73d4a28d2268ee2c3b25ff027fd.png', 'FileManager/Temp/b8e60d0db946c7c73d690c21817f0a75017cf73d4a28d2268ee2c3b25ff027fd.png', '/home/mamajiii/public_html/FileManager/Temp/b8e60d0db946c7c73d690c21817f0a75017cf73d4a28d2268ee2c3b25ff027fd.png', 'Image', 'png', '78675', 'b8e60d0db946c7c73d690c21817f0a75017cf73d4a28d2268ee2c3b25ff027fd', '2023-05-22 09:22:31am', 1),
(38, '7e514893153f6ab9a4c40f52fc1f5399bd7cdfa97746498e20748e8068c045c3.jpg', 'FileManager/Temp/7e514893153f6ab9a4c40f52fc1f5399bd7cdfa97746498e20748e8068c045c3.jpg', '/home/mamajiii/public_html/FileManager/Temp/7e514893153f6ab9a4c40f52fc1f5399bd7cdfa97746498e20748e8068c045c3.jpg', 'Image', 'jpg', '371162', '7e514893153f6ab9a4c40f52fc1f5399bd7cdfa97746498e20748e8068c045c3', '2023-05-24 06:33:02pm', 1),
(39, 'f38788a902671bbb2ffb828e619a01c507f8b284adbc754c65e861209140dac3.png', 'FileManager/Temp/f38788a902671bbb2ffb828e619a01c507f8b284adbc754c65e861209140dac3.png', '/home/mamajiii/public_html/FileManager/Temp/f38788a902671bbb2ffb828e619a01c507f8b284adbc754c65e861209140dac3.png', 'Image', 'png', '20667', 'f38788a902671bbb2ffb828e619a01c507f8b284adbc754c65e861209140dac3', '2024-01-29 06:32:21pm', 1),
(40, 'fcdf8e65873aebcddede4606c66189abaeb41b0b87816afbec1e9e67434be92e.png', 'FileManager/Temp/fcdf8e65873aebcddede4606c66189abaeb41b0b87816afbec1e9e67434be92e.png', '/home/mamajiii/public_html/FileManager/Temp/fcdf8e65873aebcddede4606c66189abaeb41b0b87816afbec1e9e67434be92e.png', 'Image', 'png', '19486', 'fcdf8e65873aebcddede4606c66189abaeb41b0b87816afbec1e9e67434be92e', '2024-01-29 06:45:17pm', 1);

-- --------------------------------------------------------

--
-- Table structure for table `hospital_img_tbls`
--

CREATE TABLE `hospital_img_tbls` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `hospital_id` int(10) UNSIGNED NOT NULL,
  `file_id` int(10) UNSIGNED NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `hospital_img_tbls`
--

INSERT INTO `hospital_img_tbls` (`id`, `hospital_id`, `file_id`) VALUES
(1, 1, 5),
(2, 2, 38);

-- --------------------------------------------------------

--
-- Table structure for table `hospital_tbls`
--

CREATE TABLE `hospital_tbls` (
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
-- Dumping data for table `hospital_tbls`
--

INSERT INTO `hospital_tbls` (`id`, `name`, `bio`, `lat`, `lng`, `address`, `start_time`, `end_time`, `tel`, `status`, `city_id`) VALUES
(1, 'درمانگاه رضا', 'یه بیمارستان سوت و کور\r\nیه بیمارستان سوت و کور\r\nیه بیمارستان سوت و کور\r\nیه بیمارستان سوت و کور\r\nیه بیمارستان سوت و کور\r\nیه بیمارستان سوت و کور\r\nیه بیمارستان سوت و کور\r\nیه بیمارستان سوت و کور', '35.71325742509095', '51.420760452747345', 'خود تهران', '07:00', '21:00', '021335185165', '1', 2),
(2, 'تست دوم', 'توضیحات', '35.7313247120674', '51.37232780456543', 'ترهات', '22:35', '22:38', '08123456789', '1', 2);

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(43, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(44, '2021_11_21_161718_create_users_tbls_table', 1),
(45, '2021_11_21_162021_create_notifications_tbls_table', 1),
(46, '2021_11_21_163847_create_report_tbls_table', 1),
(47, '2021_11_21_163905_create_reports_tbls_table', 1),
(48, '2021_11_21_163940_create_userstype_tbls_table', 1),
(49, '2021_11_25_161033_create_user_verify_tbls_table', 1),
(50, '2022_01_04_072748_create_file_tbls_table', 1),
(51, '2022_09_04_095553_create_categories_tbls_table', 1),
(52, '2022_09_04_115725_create_posts_tbls_table', 1),
(53, '2023_02_05_121847_create_settings_tbls_table', 1),
(54, '2023_02_10_112729_create_city_tbls_table', 1),
(55, '2023_02_12_103504_create_hospital_tbls_table', 1),
(56, '2023_02_12_174338_create_hospital_img_tbls_table', 1),
(57, '2023_02_18_095640_create_store_categories_tbls_table', 1),
(58, '2023_02_18_101220_create_store_tbls_table', 1),
(59, '2023_02_21_121843_create_discount_code_tbls_table', 1),
(60, '2023_02_21_132924_create_store_images_tbls_table', 1),
(61, '2023_02_22_154125_create_orders_tbls_table', 1),
(62, '2023_02_22_162157_create_transcation_tbls_table', 1),
(63, '2023_02_22_185840_create_visite_tbls_table', 1);

-- --------------------------------------------------------

--
-- Table structure for table `notifications_tbls`
--

CREATE TABLE `notifications_tbls` (
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
-- Dumping data for table `notifications_tbls`
--

INSERT INTO `notifications_tbls` (`id`, `title`, `content`, `link`, `from`, `seen`, `user_id`, `date`) VALUES
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
-- Table structure for table `orders_tbls`
--

CREATE TABLE `orders_tbls` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `type` varchar(255) NOT NULL,
  `date` varchar(255) NOT NULL,
  `time` varchar(255) NOT NULL,
  `order_status` varchar(255) NOT NULL,
  `price` varchar(255) NOT NULL,
  `store_id` int(10) UNSIGNED NOT NULL,
  `user_id` int(10) UNSIGNED NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `orders_tbls`
--

INSERT INTO `orders_tbls` (`id`, `type`, `date`, `time`, `order_status`, `price`, `store_id`, `user_id`) VALUES
(1, 'PRODUCT', '2023-05-22', '01:19:17pm', '1', '1000', 1, 4),
(2, 'PRODUCT', '2023-05-22', '01:22:07pm', '1', '1000', 1, 4),
(3, 'PRODUCT', '2023-05-22', '04:20:34pm', '1', '50000', 5, 7),
(4, 'PRODUCT', '2023-05-22', '04:34:29pm', '3', '900000', 4, 8),
(5, 'PRODUCT', '2023-06-12', '01:14:43pm', '1', '1000', 1, 4);

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
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `posts_tbls`
--

CREATE TABLE `posts_tbls` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(255) NOT NULL,
  `content` varchar(255) NOT NULL,
  `image` varchar(255) NOT NULL,
  `date` varchar(255) NOT NULL,
  `delete_flag` varchar(255) NOT NULL,
  `visible` varchar(255) NOT NULL,
  `user_id` int(10) UNSIGNED NOT NULL,
  `category_id` int(10) UNSIGNED NOT NULL,
  `file_id` int(11) NOT NULL,
  `type` varchar(50) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `posts_tbls`
--

INSERT INTO `posts_tbls` (`id`, `title`, `content`, `image`, `date`, `delete_flag`, `visible`, `user_id`, `category_id`, `file_id`, `type`) VALUES
(1, 'cc', '<p>cdscdscdscdscs</p>', 'https://izino.ir/Uploads/images/20190814_163256.jpg', '2023-05-09 08:40:09am', '1', '1', 1, 1, 0, 'TEXT'),
(2, 'cdscds', '<p>cdscdsc</p>', '-', '2023-05-09 10:02:57am', '1', '1', 1, 1, 0, 'TEXT'),
(3, 'cdsc', '', '-', '2023-05-09 11:32:19am', '1', '1', 1, 1, 0, 'SOUND'),
(4, 'ccc', '', '-', '2023-05-09 11:33:22am', '1', '1', 1, 1, 0, 'SOUND'),
(5, 'dddd', '', '-', '2023-05-09 11:33:31am', '1', '1', 1, 1, 0, 'SOUND'),
(6, 'xxx', '', '-', '2023-05-09 11:34:59am', '1', '1', 1, 1, 0, 'SOUND'),
(7, 'aaa', '', '-', '2023-05-09 11:36:58am', '1', '1', 1, 1, 0, 'SOUND'),
(8, 'xxx', '', '-', '2023-05-09 11:54:51am', '1', '1', 1, 1, 0, 'SOUND'),
(9, 'رضا فرازی کیست', '<p>رضا فرازی یک برنامه نویس هست</p><p>اینا هم چند تا خط متن اضافه</p><p>چیز دیگه یادم نمیاد بنویسم</p><p>البته اینا هم از خودم نوشتم</p><p>امیدوارم درست کار کنه حالا</p>', '-', '2023-05-14 10:54:42am', '0', '1', 1, 4, 0, 'TEXT'),
(10, 'تست', '-', '-', '2023-05-14 01:46:24pm', '0', '1', 1, 4, 0, 'SOUND'),
(11, 'تست', '-', '-', '2023-05-14 01:52:00pm', '1', '1', 1, 4, 17, 'SOUND'),
(12, 'ddd', '197.51183673469', '-', '2023-05-14 06:27:29pm', '0', '1', 1, 4, 27, 'SOUND'),
(13, 'تست دوم صدا', '262.63510204082', '-', '2023-05-14 06:30:09pm', '0', '1', 1, 4, 28, 'SOUND'),
(14, 'درس اول', '208.56163265306', '-', '2023-05-16 08:05:16am', '0', '1', 1, 6, 32, 'SOUND'),
(15, 'تست', '<p>سلام</p>', '-', '2023-05-23 08:06:37pm', '0', '1', 1, 4, 0, 'TEXT');

-- --------------------------------------------------------

--
-- Table structure for table `price_package_tbls`
--

CREATE TABLE `price_package_tbls` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `date` varchar(255) NOT NULL,
  `user_id` int(10) UNSIGNED NOT NULL,
  `category_id` int(10) UNSIGNED NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `price_package_tbls`
--

INSERT INTO `price_package_tbls` (`id`, `date`, `user_id`, `category_id`) VALUES
(1, '1400', 4, 6);

-- --------------------------------------------------------

--
-- Table structure for table `reports_tbls`
--

CREATE TABLE `reports_tbls` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `content` varchar(255) NOT NULL,
  `date_time` varchar(255) NOT NULL,
  `condition` tinyint(1) NOT NULL,
  `report_id` int(10) UNSIGNED NOT NULL,
  `user_id` int(11) NOT NULL,
  `post_id` int(10) UNSIGNED NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `report_tbls`
--

CREATE TABLE `report_tbls` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(255) NOT NULL,
  `delete_flag` tinyint(1) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `settings_tbls`
--

CREATE TABLE `settings_tbls` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `parametrs` varchar(4096) NOT NULL,
  `discountall` varchar(255) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `settings_tbls`
--

INSERT INTO `settings_tbls` (`id`, `parametrs`, `discountall`) VALUES
(1, '{\n  \"logo\":\"\",\n  \"banners\":[],\n  \"law\":\"\",\n  \"sliders\":[]\n}', '0'),
(2, '{\"logo\":\"https:\\/\\/mamajii.ir\\/Admin\\/images\\/logo.png\",\"law\":\"xxx\",\"sliders\":[{\"title\":\"\\u0639\\u0646\\u0648\\u0627\\u0646 \\u062f\\u06a9\\u0645\\u0647\",\"text\":\"\\u0645\\u062a\\u0646 \\u062f\\u06a9\\u0645\\u0647\",\"address\":\"https:\\/\\/upload.wikimedia.org\\/wikipedia\\/commons\\/4\\/47\\/PNG_transparency_demonstration_1.png\",\"link\":\"google.com\",\"backimg\":\"data:image\\/jpeg;base64,\\/9j\\/4AAQSkZJRgABAQAAAQABAAD\\/2wCEAAkGBw0NDQ0NDQ8NDQ0NDQ0NDQ0NDQ8NDQ0NFREWFhURFRUYHSggGBolGxUVITEhJSkrLi46Fx89ODMsQygtLjcBCgoKDg0OFQ8PFS0ZFR0rKy0rLS0rKy0tLS0tKysvLS0tLSstNy0tKy0rMCs3LS0rNys3Kys3LTcrODctLSsrK\\/\\/AABEIAKMBNQMBIgACEQEDEQH\\/xAAaAAADAQEBAQAAAAAAAAAAAAABAgMABAUG\\/8QAKRABAQEBAAIBAgQGAwAAAAAAAAECEQMSISIxE1FhcQQyQYHR8FKhwf\\/EABsBAAIDAQEBAAAAAAAAAAAAAAIDAAEEBQYH\\/8QAJBEAAwACAgIBBQEBAAAAAAAAAAECAxEEEhMhYQUUMUFRMiL\\/2gAMAwEAAhEDEQA\\/APq5o0qMp5Qd2jr5eHFrTQ9haMraaMWffpnA5n0x4\\/8AqfaJ0tNS1rVHKeESk0ep6MVFrCJqp2m1U9UxMbOA1rTRLS9NmgMnF2i12S6JdEtHsXj4en+B7ovS9YDo62Hir+DyjKSDC3R0J4q0VlUzUZVM0PYG+Ii0ppU4eK7GSuJ8DymlJBiu4H2fwOJOj0Pcv7P4GDodLaGsmg8X0\\/vWkg2hwB6x3lqvweg430\\/HiW2tsaDKn7N7l9DcWFGbNNKeMrY9gWN0eh6E2JcluFegrqEqI3xgtxk6hdhpTSpyj1WhLRSU0qUppVaE1KY2k6e0lbMd7R5vk8ZRkaX4EqelNJ6aExCxEtJ1TSVNTNMYhaSnpLDExrwgpTcDg+xU4PYDSDnKkyW6N+LEkJMj6qTI+pbo1zBOHyFy0D2CeMpmnicPKHYp4R4aEg9C6IsA\\/W6XrdD2L8AbQ6W0t0TT2bcOFQvke0t2jvycQ35hxj2O0dN8hb5XFryUl20zhAZ6H4x8+V5f4ps+Yb44DPWnkPNvN8fnWnlJrBoDZ2zZppxzyGnkLeEnY6\\/ZnPPIwfEF2LdbpJR6zaLY\\/TdS6aVWhbKylrZrU3G\\/Rx+VG7YlJo9T0fLM6xktp1TReHJmnHAnA4pxvUfYesZL1aZW9Rx47b8L7hLGTzlfPidHj\\/h+Kfhk1lNUY9HL6BcOq4LcF9xqRyXJLHVrCOsiVBKScPC8ZGwug8pidboGw1A7dL0LQtlqDaqO9m1pHS5QzQm6nT6TrVCAqhKSm0StUIz1QtpejaS1omRTspNrY8rj6M0J4kwO56E8p55HBNnnkJeEnY755GcU8gg8JXc9mVulbri6NjHlNKmaVTQqi2GoZ+wVJOdlW6BSaNU9HSKUiUZBznqufGbs1RHonMmmHRnxujxeD8wu9D1By+L+Gt\\/Z148Mn2WmR4TWRsYpSJerXKnAsBsJErklytYWxNho594Q3h2WJ6glQSOHWScdmvGjrxD7BoiJ\\/wANvRGxiE6WqeparZZLSeldJ6hkgVWiVT0rommuEZLyEtJ6V1EtNcIzVkJ6TtPolapQp5BbQ6FpbTlIPceaN7o9bq+hO5f3ZD2ZXjK8h9NKaElF5XR1mOaEhpVNCaKytanKPsiRkqHsNLM9vD58dv6Ojx+KQa9Fxhe9sTHjWx4z5yrnKnRqSN4\\/GrwZ8AS2WYGDodkDS1rQqE2alohUCVCWEsPS1YaZPUJYpS1ew0yVhLFaSrC2TqelanYNIp2kTsTsWsJYfCMeXMR1E9RfUT1GuDBeYhqJai+olqNcGespz6S0vuJajXAHlI0lp9J1plE8hut0OgPqV5A9YrJ1K8h9TDSFypHkEj0jDIeYCKRGgeps4iucwMqZCVobMPmBDyBbKGzFcxOH6W2UN0LS2ltLZBrW9\\/iz4+\\/f1\\/3\\/ACS0OoAyt817L8fbhZ5LOfpez9\\/j\\/CfW6tCKein4l+fifVOUPxL9N\\/4859ydbo9AeRI01y9\\/L82vk\\/m+J9X3ClqaGLKjXyX4vx8Tnz8z7c+xLv4s\\/O9\\/qNLV6D8yBfLfj7fTOT9ucJfJ\\/N8T6v3+Piz\\/ANprCWCUlPOjXy36fifTZZ\\/b+iXkvb39v+oewthikRfIRKwti1hbDpRiy8ghYTUXsT1GmEYrznPqJajp1EtRqgS8xy7iOo6t5Q3GuCvMc24jqOncR3GuAllIgewOGkeUAGZCvKfTw8TlUw8c\\/SPaFIpAzDEuyaGyplA03Q9itHTlSVz48kVmlbAaKyj1P2a6A2UNaFpLQ6Ag1odL0vUBaH63sTrdWIuCk0aVGU8pkswZk59oahR6BqRjfI0ClpyjUgPliWBYewODUCq5nyTsLxSwLDFJnrmfJPhbFeFsMUma+VslYnqL2E1DpQh8g59RLUdGoluNEg+Y5txDcdW4juNMBLKcu4juOrcR1lqhjFlOawvFtZLw9MvyicY\\/qyA+U9+LYSkUzXjaPo5eUU5TdJaIFg6HVaKGPndifRC0QvPKPu5+j0DRWi\\/u3sl1uqK0U63SdbqitD9Dpet0SQmx5TQnTQxI52ZlJRJKaU+Dhcn09oLMx8o5WTM0DgGDhqkx3yWLwLDhwakz1yvkThbFOBYNSL+5JWE1FrCag0iechqJajo1EtQ2Q1mObUR3HTqI7jRI6cpzaiOo6dRLUPkashzaheLayXh6YfkJ8ZT1ZeyvIevmnlSzVM15SpPqUsrKaVOH6U5D2HVL0N0vQ9RbfsrKPU5TdLaCQ\\/RJKPQNBDD0vW6HRB+t0vWTRTG63S9aUSRmyFJTSpymlMSObmKQ0qcp5TpRxOQP0SSj06Th50MwdE+Tk5dmAWNSMF20DgWGYWhPkYlhLFKWwSQxZCOolqL6iWoND5yHPqI7jp1EdQ6R82c2olqOnUS1D5ZomznsLxawnDExncTjKSMvZXc68qZSypK89SPrUspDdTlT8nl78T+5XTbCdpIe77TSoSnzUqdC5rZaU0qcppWekOkpK3SwZS2gxpRLKPQl6C3Q6HU0RobrdL1uiQi5KSmlS6Mo0YM2JlpTSoyjKamcjPgbLSj1L2H2NlnJzcVv9FpR6jNGmjVRyM3Dr+Fet1OaGaOVI5WXiWv0UYvsPRpmC8NL9GpaYtEhemhNJ6itT0Yhk0Q1EtRfUS1DEPmiGolqL6ieocmaJohcl4tch6D2M7k\\/VlphldivIDJ4zOLR9hQnn1fj9UozDj\\/Im\\/8AQ0VyzFWMgpDRmZaNEjQ0ZiWMQRZgMNAZmQhmZhAMwwWEjPZhBhoxZEMLMNGHIkHoxmGjBkSD0eixiOfllfw3TdBjEcvNK\\/g0rdZj5ONnS\\/gKWsxqMTJ6S0zGoKSek7BY1D5F4aRmRlsrnMZmKbEtn\\/\\/Z\"}],\"banners\":[{\"address\":\"https:\\/\\/encrypted-tbn0.gstatic.com\\/images?q=tbn:ANd9GcRKUmQCK2Y0UXT09HJfGslH43Fj4C6MITrt-CMPcIP0yM9Get-w2x-s1wTKlmEVQB02Eeg&usqp=CAU\",\"link\":\"yahoo.com\"}]}', ''),
(3, '{\"logo\":\"https:\\/\\/mamajii.ir\\/Admin\\/images\\/logo.png\",\"law\":\"xxx\",\"sliders\":[null,{\"title\":\"\\u062f\\u06a9\\u0645\\u0647\",\"text\":\"\\u0639\\u0646\\u0648\\u0627\\u0646 \\u062f\\u06a9\\u0645\\u0647\",\"address\":\"https:\\/\\/upload.wikimedia.org\\/wikipedia\\/commons\\/4\\/47\\/PNG_transparency_demonstration_1.png\",\"link\":\"google.com\",\"backimg\":\"https:\\/\\/encrypted-tbn0.gstatic.com\\/images?q=tbn:ANd9GcRKUmQCK2Y0UXT09HJfGslH43Fj4C6MITrt-CMPcIP0yM9Get-w2x-s1wTKlmEVQB02Eeg&usqp=CAU\"}],\"banners\":[{\"address\":\"https:\\/\\/encrypted-tbn0.gstatic.com\\/images?q=tbn:ANd9GcRKUmQCK2Y0UXT09HJfGslH43Fj4C6MITrt-CMPcIP0yM9Get-w2x-s1wTKlmEVQB02Eeg&usqp=CAU\",\"link\":\"yahoo.com\"}]}', ''),
(4, '{\"logo\":\"https:\\/\\/mamajii.ir\\/Admin\\/images\\/logo.png\",\"law\":\"xxx\",\"sliders\":null,\"banners\":[{\"address\":\"https:\\/\\/encrypted-tbn0.gstatic.com\\/images?q=tbn:ANd9GcRKUmQCK2Y0UXT09HJfGslH43Fj4C6MITrt-CMPcIP0yM9Get-w2x-s1wTKlmEVQB02Eeg&usqp=CAU\",\"link\":\"yahoo.com\"}]}', ''),
(5, '{\"logo\":\"https:\\/\\/mamajii.ir\\/Admin\\/images\\/logo.png\",\"law\":\"xxx\",\"sliders\":[],\"banners\":[{\"address\":\"https:\\/\\/encrypted-tbn0.gstatic.com\\/images?q=tbn:ANd9GcRKUmQCK2Y0UXT09HJfGslH43Fj4C6MITrt-CMPcIP0yM9Get-w2x-s1wTKlmEVQB02Eeg&usqp=CAU\",\"link\":\"yahoo.com\"}]}', ''),
(6, '{\"logo\":\"https:\\/\\/mamajii.ir\\/Admin\\/images\\/logo.png\",\"law\":\"xxx\",\"sliders\":[{\"title\":\"\\u0639\\u0646\\u0648\\u0627\\u0646 \\u062f\\u06a9\\u0645\\u0647\",\"text\":\"\\u0645\\u062a\\u0646 \\u062f\\u06a9\\u0645\\u0647\",\"address\":\"https:\\/\\/upload.wikimedia.org\\/wikipedia\\/commons\\/4\\/47\\/PNG_transparency_demonstration_1.png\",\"link\":\"google.com\",\"backimg\":\"https:\\/\\/encrypted-tbn0.gstatic.com\\/images?q=tbn:ANd9GcRKUmQCK2Y0UXT09HJfGslH43Fj4C6MITrt-CMPcIP0yM9Get-w2x-s1wTKlmEVQB02Eeg&usqp=CAU\"}],\"banners\":[{\"address\":\"https:\\/\\/encrypted-tbn0.gstatic.com\\/images?q=tbn:ANd9GcRKUmQCK2Y0UXT09HJfGslH43Fj4C6MITrt-CMPcIP0yM9Get-w2x-s1wTKlmEVQB02Eeg&usqp=CAU\",\"link\":\"yahoo.com\"}]}', ''),
(7, '{\"logo\":\"https:\\/\\/mamajii.ir\\/Admin\\/images\\/logo.png\",\"law\":\"\\u0642\\u0648\\u0627\\u0646\\u06cc\\u0646 \\u0631\\u0648 \\u0645\\u06cc\\u0634\\u0647 \\u0627\\u0632 \\u062f\\u0627\\u062e\\u0644 \\u0627\\u06cc\\u0646\\u062c\\u0627 \\u062a\\u063a\\u06cc\\u06cc\\u0631 \\u062f\\u0627\\u062f\",\"sliders\":[{\"title\":\"\\u0639\\u0646\\u0648\\u0627\\u0646 \\u062f\\u06a9\\u0645\\u0647\",\"text\":\"\\u0645\\u062a\\u0646 \\u062f\\u06a9\\u0645\\u0647\",\"address\":\"https:\\/\\/upload.wikimedia.org\\/wikipedia\\/commons\\/4\\/47\\/PNG_transparency_demonstration_1.png\",\"link\":\"google.com\",\"backimg\":\"https:\\/\\/encrypted-tbn0.gstatic.com\\/images?q=tbn:ANd9GcRKUmQCK2Y0UXT09HJfGslH43Fj4C6MITrt-CMPcIP0yM9Get-w2x-s1wTKlmEVQB02Eeg&usqp=CAU\"}],\"banners\":[{\"address\":\"https:\\/\\/encrypted-tbn0.gstatic.com\\/images?q=tbn:ANd9GcRKUmQCK2Y0UXT09HJfGslH43Fj4C6MITrt-CMPcIP0yM9Get-w2x-s1wTKlmEVQB02Eeg&usqp=CAU\",\"link\":\"yahoo.com\"}]}', '');

-- --------------------------------------------------------

--
-- Table structure for table `store_categories_tbls`
--

CREATE TABLE `store_categories_tbls` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(255) NOT NULL,
  `root_cat_id` int(11) NOT NULL,
  `icon_address` varchar(255) NOT NULL,
  `datetime` varchar(255) NOT NULL,
  `castom_link` varchar(255) NOT NULL,
  `visible` varchar(255) NOT NULL,
  `delete_flag` varchar(255) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `store_categories_tbls`
--

INSERT INTO `store_categories_tbls` (`id`, `title`, `root_cat_id`, `icon_address`, `datetime`, `castom_link`, `visible`, `delete_flag`) VALUES
(1, 'فروش کتاب', 0, 'https://mamajii.ir/FileManager/Store/notebook.png', '2023-05-21 06:40:13am', '', '1', '0'),
(2, 'فروش ملزومات بارداری', 0, 'https://mamajii.ir/FileManager/Store/donation.png', '2023-05-21 06:40:54am', '', '1', '0');

-- --------------------------------------------------------

--
-- Table structure for table `store_images_tbls`
--

CREATE TABLE `store_images_tbls` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `date` varchar(255) NOT NULL,
  `store_id` int(10) UNSIGNED NOT NULL,
  `file_id` int(10) UNSIGNED NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `store_images_tbls`
--

INSERT INTO `store_images_tbls` (`id`, `date`, `store_id`, `file_id`) VALUES
(1, '2023-05-21 05:10:53pm', 1, 33),
(2, '2023-05-21 06:41:37pm', 2, 34),
(3, '2023-05-22 08:26:16am', 3, 35),
(4, '2023-05-22 08:27:47am', 4, 36),
(5, '2023-05-22 09:22:42am', 5, 37);

-- --------------------------------------------------------

--
-- Table structure for table `store_tbls`
--

CREATE TABLE `store_tbls` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(255) NOT NULL,
  `content` varchar(255) NOT NULL,
  `type` varchar(255) NOT NULL,
  `date` varchar(255) NOT NULL,
  `delete_flag` varchar(255) NOT NULL,
  `visible` varchar(255) NOT NULL,
  `json` varchar(255) NOT NULL,
  `price` varchar(255) NOT NULL,
  `discount` varchar(255) NOT NULL,
  `adiscount` varchar(255) NOT NULL,
  `user_id` int(10) UNSIGNED NOT NULL,
  `category_id` int(10) UNSIGNED NOT NULL,
  `file_id` int(10) UNSIGNED NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `store_tbls`
--

INSERT INTO `store_tbls` (`id`, `title`, `content`, `type`, `date`, `delete_flag`, `visible`, `json`, `price`, `discount`, `adiscount`, `user_id`, `category_id`, `file_id`) VALUES
(1, 'کتاب زایمان در 10 روز', 'یه سری اطلاعات رو اینجا مینویسیم', 'PRODUCT', '2023-05-21 05:10:53pm', '0', '1', '[{\"key\":\"کاغذ\",\"value\":\"کاهی\"}]', '1000', '', '', 1, 1, 0),
(2, 'تست دوم', 'متن تستی', 'PRODUCT', '2023-05-21 06:41:37pm', '0', '1', '[{\"key\":\"تست\",\"value\":\"تست\"}]', '1000', '', '', 1, 1, 0),
(3, 'پست تستی دوباره واسه تست جدیدا', 'تست', 'PRODUCT', '2023-05-22 08:26:16am', '0', '1', '[]', '5000', '', '', 1, 1, 0),
(4, 'تست سه باره', 'ررر', 'PRODUCT', '2023-05-22 08:27:47am', '0', '1', '[]', '900000', '', '', 1, 1, 0),
(5, 'عنوان پنجم', 'سسس', 'PRODUCT', '2023-05-22 04:53:31pm', '0', '0', '[]', '50000', '0', '50000', 1, 1, 0);

-- --------------------------------------------------------

--
-- Table structure for table `transcation_tbls`
--

CREATE TABLE `transcation_tbls` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `value` varchar(255) NOT NULL,
  `date` varchar(255) NOT NULL,
  `order_id` int(10) UNSIGNED NOT NULL,
  `user_id` int(10) UNSIGNED NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `transcation_tbls`
--

INSERT INTO `transcation_tbls` (`id`, `value`, `date`, `order_id`, `user_id`) VALUES
(1, '1000', '2023-05-22 01:19:17pm', 1, 4),
(2, '1000', '2023-05-22 01:22:07pm', 2, 4),
(3, '50000', '2023-05-22 04:20:34pm', 3, 7),
(4, '900000', '2023-05-22 04:34:29pm', 4, 8),
(5, '1000', '2023-06-12 01:14:43pm', 5, 4);

-- --------------------------------------------------------

--
-- Table structure for table `userstype_tbls`
--

CREATE TABLE `userstype_tbls` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(255) NOT NULL,
  `en_title` varchar(255) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `userstype_tbls`
--

INSERT INTO `userstype_tbls` (`id`, `title`, `en_title`) VALUES
(1, 'دکتر', 'Doctor');

-- --------------------------------------------------------

--
-- Table structure for table `users_tbls`
--

CREATE TABLE `users_tbls` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `family` varchar(255) NOT NULL,
  `phone` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `bio` varchar(255) NOT NULL,
  `login_token` varchar(255) NOT NULL,
  `date_time` varchar(255) NOT NULL,
  `user_type` varchar(255) NOT NULL,
  `status` varchar(255) NOT NULL,
  `website` varchar(255) NOT NULL,
  `address` varchar(255) NOT NULL,
  `times` varchar(1024) NOT NULL,
  `lat` varchar(255) NOT NULL,
  `lng` varchar(255) NOT NULL,
  `google_auth` varchar(255) NOT NULL,
  `profile_image_file_id` int(10) UNSIGNED NOT NULL,
  `city_id` int(10) UNSIGNED NOT NULL,
  `sex` varchar(255) NOT NULL,
  `b_date` varchar(255) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users_tbls`
--

INSERT INTO `users_tbls` (`id`, `username`, `password`, `name`, `family`, `phone`, `email`, `bio`, `login_token`, `date_time`, `user_type`, `status`, `website`, `address`, `times`, `lat`, `lng`, `google_auth`, `profile_image_file_id`, `city_id`, `sex`, `b_date`) VALUES
(1, 'rezafta', 'd0f1fa128cee4a68c57bec9305fa28da48e6fec3846e2a0c68d980ca059b13e2', 'رضا', 'فرازی', '09386949300', 'rezafta@outlook.com', 'ccc', '8884f56606b8e6d175df22989bbc094dd55b15de83d27b84afb8d0ab35848ddc', '', 'ADMIN', '1', '', 'تهارن', '', '0.0', '0.0', '', 39, 1, '', ''),
(2, 'test', '15e2b0d3c33891ebb0f1ef609ec419420c20e320ce94c65fbc8c3312448eb225', 'رضا', 'فرازی', '09386949300', 'rezafarazi1378@gmail.com', 'توضیحات', 'aced6d90ee6e46631cc15dd30ec0888e2b40509cc5074bbd4a7f58825099ac9c', '2023-05-09 11:59:13am', 'ADMIN', '1', '', 'تهران', '{\"start_0\":\"00:00\",\"end_0\":\"00:00\",\"sat\":\"on\",\"start_1\":\"00:00\",\"end_1\":\"00:00\",\"sun\":null,\"start_2\":\"00:00\",\"end_2\":\"00:00\",\"mon\":null,\"start_3\":\"00:00\",\"end_3\":\"00:00\",\"tue\":null,\"start_4\":\"00:00\",\"end_4\":\"00:00\",\"wed\":null,\"start_5\":\"00:00\",\"end_5\":\"00:00\",\"thu\":null,\"start_6\":\"00:00\",\"end_6\":\"00:00\",\"fri\":null}', '0', '0', '', 3, 2, '', ''),
(3, 'rezafta2', 'd0f1fa128cee4a68c57bec9305fa28da48e6fec3846e2a0c68d980ca059b13e2', 'رضا', 'فرازی', '09386949300', 'rezafta@outlook.com', 'خود دکتر رضا فرازی', '5f1e6e36240ed4da1d809ba10498463755d23b851a4ba4f3af3ba07c4c710e9e', '2023-05-09 04:17:19pm', 'Doctor', '1', '', 'خود تهران', '{\"start_0\":\"06:00\",\"end_0\":\"12:02\",\"sat\":\"on\",\"start_1\":\"00:00\",\"end_1\":\"21:00\",\"sun\":\"on\",\"start_2\":\"07:00\",\"end_2\":\"21:00\",\"mon\":null,\"start_3\":\"00:00\",\"end_3\":\"00:00\",\"tue\":null,\"start_4\":\"00:00\",\"end_4\":\"00:00\",\"wed\":null,\"start_5\":\"07:00\",\"end_5\":\"13:00\",\"thu\":\"on\",\"start_6\":\"00:00\",\"end_6\":\"00:00\",\"fri\":null}', '35.700696973302016', '51.36013984680176', '', 4, 2, '', ''),
(4, 'USR2023-05-09 04:18:59pm', 'd0f1fa128cee4a68c57bec9305fa28da48e6fec3846e2a0c68d980ca059b13e2', 'رضا', 'فرازی', '09932017038', 'rezafta@gmail.com', '', '473e7388b10f7e230cfcc5b54f6f3ad522d4f19416471206523e44f35db43ff7', '1378/06/12', 'ADMIN', '0', '', '', '', '0', '0', '', 1, 2, 'woman', '1378/07/12'),
(5, 'USR2023-05-12 04:26:32pm', 'd0f1fa128cee4a68c57bec9305fa28da48e6fec3846e2a0c68d980ca059b13e2', '', 'فرازی', '09386949300', '', '', '971e88d63013b9e7f66454747f6ac4b1fe2d3bea0bef734cdd53bf8e3b844c69', '2023-05-12 04:26:32pm', 'ADMIN', '0', '', '', '', '0', '0', '', 1, 2, '', ''),
(6, 'rezaf', 'd0f1fa128cee4a68c57bec9305fa28da48e6fec3846e2a0c68d980ca059b13e2', 'رضا', 'فرازی', '09365164685', 'rezafta@outlook.com', 'تهران', '5e4cc3a841eb0235722995005e352bcab0690643c11bfea9e1fb3cd42e715956', '2023-05-20 10:10:51am', 'Doctor', '0', '', 'تهران', '', '0', '0', '', 1, 2, 'man', ''),
(7, 'USR2023-05-22 04:18:41pm', 'Password', '', '', '09365164685', '', '', '854302aef961d557b3bbfd93f778485b961575bf2f182415b591b2afda28cec1', '2023-05-22 04:18:41pm', 'USER', '1', '', 'آدرس رضا', '', '', '', '', 1, 2, 'man', ''),
(8, 'USR2023-05-22 04:31:10pm', 'Password', '', '', '09364344398', '', '', 'f082afbee9f68104ff05fdd3eb41932158bbe2aa5b9b32fb7ca4cbce498412aa', '2023-05-22 04:31:10pm', 'USER', '1', '', '', '', '', '', '', 1, 2, 'man', ''),
(9, 'USR2023-09-08 07:51:17pm', 'Password', '', '', '09386949300', '', '', 'adc81af80fdf782639654d2eb3c305b6be5dd4041c0f7b8d2e0fe3b81d3e07b8', '2023-09-08 07:51:17pm', 'USER', '1', '', '', '', '', '', '', 1, 2, 'man', ''),
(10, 'USR2023-12-17 06:15:10pm', 'Password', '', '', '09396570423', '', '', 'c8d71d3f08d98a27e42792565f4fd107e78310c748fd6717893f28e163e5b270', '2023-12-17 06:15:10pm', 'USER', '1', '', '', '', '', '', '', 1, 2, 'man', ''),
(11, 'owner', 'd4884dcb70d4454c0057f3d6dd6df1dc3ee9af306d4f54d510758b4e9029a55a', 'sharare', 'jafari', '09214864436', 'jafarisharareh24@gmail.com', '----', '39a5a2ae35bcac162fc2bfed8d7ea032bf91d7658ba679f6b6821d062ce33657', '2024-01-29 06:45:17pm', 'ADMIN', '1', '', '--', '', '0', '0', '', 40, 2, 'man', '');

-- --------------------------------------------------------

--
-- Table structure for table `user_verify_tbls`
--

CREATE TABLE `user_verify_tbls` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `hash_code` varchar(255) NOT NULL,
  `user_id` int(10) UNSIGNED NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `visite_tbls`
--

CREATE TABLE `visite_tbls` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `status` varchar(255) NOT NULL,
  `date` varchar(255) NOT NULL,
  `time` varchar(255) NOT NULL,
  `type` varchar(255) NOT NULL,
  `doctor_id` int(11) NOT NULL,
  `user_id` int(10) UNSIGNED NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `visite_tbls`
--

INSERT INTO `visite_tbls` (`id`, `status`, `date`, `time`, `type`, `doctor_id`, `user_id`) VALUES
(1, '1', '7 اردیبهشت 1402', '6 الی 7', 'DOCTOR', 1, 4),
(2, '2', '7 اردیبهشت 1402', '7 الی 8', 'DOCTOR', 1, 4),
(3, '0', '7 اردیبهشت 1402', '10 الی 11', 'DOCTOR', 1, 4),
(4, '0', '21 اردیبهشت 1402', '6 الی 7', 'DOCTOR', 1, 4),
(5, '0', '21 اردیبهشت 1402', '7 الی 8', 'DOCTOR', 1, 4),
(6, '0', '23 اردیبهشت 1402', '7 الی 8', 'DOCTOR', 1, 4),
(7, '0', '30 اردیبهشت 1402', '11 الی 12', 'DOCTOR', 1, 4),
(8, '0', '30 اردیبهشت 1402', '7 الی 8', 'DOCTOR', 1, 4),
(9, '0', '30 اردیبهشت 1402', '10 الی 11', 'DOCTOR', 1, 4),
(10, '0', '30 اردیبهشت 1402', '8 الی 9', 'DOCTOR', 1, 4),
(11, '0', '30 اردیبهشت 1402', '9 الی 10', 'DOCTOR', 1, 4),
(12, '0', '30 اردیبهشت 1402', '15 الی 16', 'DOCTOR', 1, 4),
(13, '0', '30 اردیبهشت 1402', '16 الی 17', 'DOCTOR', 1, 4),
(14, '0', '30 اردیبهشت 1402', '17 الی 18', 'DOCTOR', 1, 4),
(15, '0', '30 اردیبهشت 1402', '20 الی 21', 'DOCTOR', 1, 4),
(16, '0', '30 اردیبهشت 1402', '12 الی 13', 'DOCTOR', 1, 4),
(17, '0', '2 خرداد 1402', '8 الی 9', 'DOCTOR', 1, 8),
(18, '0', '2 خرداد 1402', '7 الی 8', 'DOCTOR', 1, 4),
(19, '0', '8 خرداد 1402', '0 الی 1', 'DOCTOR', 1, 8),
(20, '0', '7 خرداد 1402', '6 الی 7', 'DOCTOR', 1, 4),
(21, '0', '14 خرداد 1402', '10 الی 11', 'DOCTOR', 1, 4);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `categories_tbls`
--
ALTER TABLE `categories_tbls`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `chat_tbls`
--
ALTER TABLE `chat_tbls`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `city_tbls`
--
ALTER TABLE `city_tbls`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `discount_code_tbls`
--
ALTER TABLE `discount_code_tbls`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `file_tbls`
--
ALTER TABLE `file_tbls`
  ADD PRIMARY KEY (`id`),
  ADD KEY `file_tbls_user_id_foreign` (`user_id`);

--
-- Indexes for table `hospital_img_tbls`
--
ALTER TABLE `hospital_img_tbls`
  ADD PRIMARY KEY (`id`),
  ADD KEY `hospital_img_tbls_hospital_id_foreign` (`hospital_id`),
  ADD KEY `hospital_img_tbls_file_id_foreign` (`file_id`);

--
-- Indexes for table `hospital_tbls`
--
ALTER TABLE `hospital_tbls`
  ADD PRIMARY KEY (`id`),
  ADD KEY `hospital_tbls_city_id_foreign` (`city_id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `notifications_tbls`
--
ALTER TABLE `notifications_tbls`
  ADD PRIMARY KEY (`id`),
  ADD KEY `notifications_tbls_user_id_foreign` (`user_id`);

--
-- Indexes for table `orders_tbls`
--
ALTER TABLE `orders_tbls`
  ADD PRIMARY KEY (`id`),
  ADD KEY `orders_tbls_store_id_foreign` (`store_id`),
  ADD KEY `orders_tbls_user_id_foreign` (`user_id`);

--
-- Indexes for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`);

--
-- Indexes for table `posts_tbls`
--
ALTER TABLE `posts_tbls`
  ADD PRIMARY KEY (`id`),
  ADD KEY `posts_tbls_user_id_foreign` (`user_id`),
  ADD KEY `posts_tbls_category_id_foreign` (`category_id`);

--
-- Indexes for table `price_package_tbls`
--
ALTER TABLE `price_package_tbls`
  ADD PRIMARY KEY (`id`),
  ADD KEY `price_package_tbls_user_id_foreign` (`user_id`),
  ADD KEY `price_package_tbls_category_id_foreign` (`category_id`);

--
-- Indexes for table `reports_tbls`
--
ALTER TABLE `reports_tbls`
  ADD PRIMARY KEY (`id`),
  ADD KEY `reports_tbls_report_id_foreign` (`report_id`),
  ADD KEY `reports_tbls_post_id_foreign` (`post_id`);

--
-- Indexes for table `report_tbls`
--
ALTER TABLE `report_tbls`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `settings_tbls`
--
ALTER TABLE `settings_tbls`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `store_categories_tbls`
--
ALTER TABLE `store_categories_tbls`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `store_images_tbls`
--
ALTER TABLE `store_images_tbls`
  ADD PRIMARY KEY (`id`),
  ADD KEY `store_images_tbls_store_id_foreign` (`store_id`),
  ADD KEY `store_images_tbls_file_id_foreign` (`file_id`);

--
-- Indexes for table `store_tbls`
--
ALTER TABLE `store_tbls`
  ADD PRIMARY KEY (`id`),
  ADD KEY `store_tbls_user_id_foreign` (`user_id`),
  ADD KEY `store_tbls_category_id_foreign` (`category_id`),
  ADD KEY `store_tbls_file_id_foreign` (`file_id`);

--
-- Indexes for table `transcation_tbls`
--
ALTER TABLE `transcation_tbls`
  ADD PRIMARY KEY (`id`),
  ADD KEY `transcation_tbls_order_id_foreign` (`order_id`),
  ADD KEY `transcation_tbls_user_id_foreign` (`user_id`);

--
-- Indexes for table `userstype_tbls`
--
ALTER TABLE `userstype_tbls`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users_tbls`
--
ALTER TABLE `users_tbls`
  ADD PRIMARY KEY (`id`),
  ADD KEY `users_tbls_profile_image_file_id_foreign` (`profile_image_file_id`),
  ADD KEY `users_tbls_city_id_foreign` (`city_id`);

--
-- Indexes for table `user_verify_tbls`
--
ALTER TABLE `user_verify_tbls`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_verify_tbls_user_id_foreign` (`user_id`);

--
-- Indexes for table `visite_tbls`
--
ALTER TABLE `visite_tbls`
  ADD PRIMARY KEY (`id`),
  ADD KEY `visite_tbls_user_id_foreign` (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `categories_tbls`
--
ALTER TABLE `categories_tbls`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `chat_tbls`
--
ALTER TABLE `chat_tbls`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `city_tbls`
--
ALTER TABLE `city_tbls`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `discount_code_tbls`
--
ALTER TABLE `discount_code_tbls`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `file_tbls`
--
ALTER TABLE `file_tbls`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=41;

--
-- AUTO_INCREMENT for table `hospital_img_tbls`
--
ALTER TABLE `hospital_img_tbls`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `hospital_tbls`
--
ALTER TABLE `hospital_tbls`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=64;

--
-- AUTO_INCREMENT for table `notifications_tbls`
--
ALTER TABLE `notifications_tbls`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT for table `orders_tbls`
--
ALTER TABLE `orders_tbls`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `posts_tbls`
--
ALTER TABLE `posts_tbls`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `price_package_tbls`
--
ALTER TABLE `price_package_tbls`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `reports_tbls`
--
ALTER TABLE `reports_tbls`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `report_tbls`
--
ALTER TABLE `report_tbls`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `settings_tbls`
--
ALTER TABLE `settings_tbls`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `store_categories_tbls`
--
ALTER TABLE `store_categories_tbls`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `store_images_tbls`
--
ALTER TABLE `store_images_tbls`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `store_tbls`
--
ALTER TABLE `store_tbls`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `transcation_tbls`
--
ALTER TABLE `transcation_tbls`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `userstype_tbls`
--
ALTER TABLE `userstype_tbls`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `users_tbls`
--
ALTER TABLE `users_tbls`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `user_verify_tbls`
--
ALTER TABLE `user_verify_tbls`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `visite_tbls`
--
ALTER TABLE `visite_tbls`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
