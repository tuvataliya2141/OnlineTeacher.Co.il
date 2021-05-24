-- phpMyAdmin SQL Dump
-- version 4.8.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 24, 2020 at 05:28 PM
-- Server version: 10.1.32-MariaDB
-- PHP Version: 7.2.5

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `flowershop`
--

-- --------------------------------------------------------

--
-- Table structure for table `banner`
--

CREATE TABLE `banner` (
  `id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `subtitle` varchar(255) NOT NULL,
  `images` varchar(255) NOT NULL,
  `link` varchar(255) NOT NULL,
  `category_id` int(11) NOT NULL DEFAULT '0',
  `status` varchar(255) NOT NULL,
  `created_at` timestamp(6) NOT NULL DEFAULT CURRENT_TIMESTAMP(6) ON UPDATE CURRENT_TIMESTAMP(6),
  `updated_at` timestamp(6) NOT NULL DEFAULT CURRENT_TIMESTAMP(6),
  `soft_delete` int(11) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `banner`
--

INSERT INTO `banner` (`id`, `title`, `subtitle`, `images`, `link`, `category_id`, `status`, `created_at`, `updated_at`, `soft_delete`) VALUES
(1, 'Flower', 'Rose', 'banner_1996848020.jpg', 'sagar', 0, '1', '2020-07-22 13:04:15.417086', '2020-05-28 08:47:45.624280', 1),
(2, 'Yen Welch', 'In minus dolores ab34', 'banner_1499408281.jpg', 'Et aliqua Sit labo', 0, '1', '2020-06-04 08:09:10.241641', '2020-06-04 00:55:14.000000', 1),
(3, 'vc', 'bnn', 'banner_1949183258.jpg', 'www.google.com', 0, '1', '2020-06-10 12:17:37.191233', '2020-06-09 00:12:46.000000', 1),
(4, 'Banner Test', 'Banner Test1', 'banner_267946882.jpg', 'Banner Test2', 0, '1', '2020-07-22 13:04:11.868618', '2020-06-22 23:21:57.000000', 1),
(5, 'Rose', 'Evergreen Rose', 'banner_1535409357.jpg', 'gtrdsftg', 22, '1', '2020-07-22 13:03:05.329421', '2020-07-22 07:32:19.000000', 0),
(6, 'Rose1', 'Rose Forever', 'banner_1163368338.jpg', 'dcgfdfh', 20, '1', '2020-07-22 07:34:03.000000', '2020-07-22 07:34:03.000000', 0);

-- --------------------------------------------------------

--
-- Table structure for table `billing_address`
--

CREATE TABLE `billing_address` (
  `id` int(11) NOT NULL,
  `order_id` int(11) NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `address` varchar(255) NOT NULL,
  `city` varchar(255) NOT NULL,
  `state` varchar(255) NOT NULL,
  `country` varchar(255) NOT NULL,
  `postal_code` int(10) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `billing_address`
--

INSERT INTO `billing_address` (`id`, `order_id`, `user_id`, `address`, `city`, `state`, `country`, `postal_code`, `created_at`, `updated_at`) VALUES
(1, 2, 36, 'E-17, Narayan Nagar Society, Punagam', 'Surat', 'GUJARAT', 'India', 395006, '2020-06-26 14:10:52', '2020-06-26 14:10:52'),
(2, 3, 36, 'Surat', 'Surat', 'CHATTISGARH', 'INDIA', 395006, '2020-06-26 14:12:02', '2020-06-26 14:12:02'),
(3, 6, 36, 'E-17,Narayan Nagar Society,Punagam', 'Surat', 'GUJARAT', 'India', 395006, '2020-06-26 14:29:13', '2020-06-26 14:29:13'),
(4, 7, 36, 'E-17,Narayan Nagar Society,Punagam', 'Surat', 'GUJARAT', 'India', 395006, '2020-06-26 14:33:23', '2020-06-26 14:33:23'),
(5, 8, 37, 'Kadodara', 'Surat', 'GUJARAT', 'India', 395006, '2020-06-27 04:43:54', '2020-06-27 04:43:54'),
(6, 9, 37, 'Kadodara', 'Surat', 'GUJARAT', 'India', 395006, '2020-06-27 05:27:14', '2020-06-27 05:27:14'),
(7, 10, 37, 'Kadodara', 'Surat', 'GUJARAT', 'India', 395006, '2020-06-27 05:37:51', '2020-06-27 05:37:51'),
(8, 11, 36, '107,Megh Dhanush Complex', 'Surat', 'GUJARAT', 'INDIA', 395216, '2020-06-27 09:10:40', '2020-06-27 09:10:40'),
(9, 12, 36, 'E-17,Narayan Nagar Society,Punagam', 'Surat', 'GUJARAT', 'India', 395006, '2020-06-27 10:25:26', '2020-06-27 10:25:26'),
(10, 13, 36, 'E-17,Narayan Nagar Society,Punagam', 'Surat', 'GUJARAT', 'India', 395006, '2020-06-27 10:26:17', '2020-06-27 10:26:17'),
(11, 14, 36, 'E-17,Narayan Nagar Society,Punagam', 'Surat', 'GUJARAT', 'India', 395006, '2020-06-27 10:27:48', '2020-06-27 10:27:48'),
(12, 15, 36, 'E-17, Narayan Nagar Society, Punagam', 'Surat', 'GUJARAT', 'India', 395006, '2020-06-27 10:38:52', '2020-06-27 10:38:52'),
(13, 16, 36, 'E-17,Narayan Nagar Society,Punagam', 'Surat', 'GUJARAT', 'India', 395006, '2020-06-29 07:07:27', '2020-06-29 07:07:27'),
(14, 17, 36, 'E-17,Narayan Nagar Society,Punagam', 'Surat', 'GUJARAT', 'India', 395006, '2020-07-01 09:34:29', '2020-07-01 09:34:29'),
(15, 18, 36, 'E-17,Narayan Nagar Society,Punagam', 'Surat', 'GUJARAT', 'India', 395006, '2020-07-02 07:25:13', '2020-07-02 07:25:13'),
(16, 19, 36, 'E-17,Narayan Nagar Society,Punagam', 'Surat', 'GUJARAT', 'India', 395006, '2020-07-02 07:29:24', '2020-07-02 07:29:24'),
(17, 20, 36, 'E-17,Narayan Nagar Society,Punagam', 'Surat', 'GUJARAT', 'India', 395006, '2020-07-11 12:57:42', '2020-07-11 12:57:42'),
(18, 21, 36, 'Pandesara', 'Surat', 'GUJARAT', 'INDIA', 395006, '2020-07-11 13:10:16', '2020-07-11 13:10:16'),
(19, 22, 36, 'E-17,Narayan Nagar Society,Punagam', 'Surat', 'GUJARAT', 'India', 395006, '2020-07-23 04:45:59', '2020-07-23 04:45:59'),
(20, 35, 36, 'E-17,Narayan Nagar Society,Punagam', 'Surat', 'GUJARAT', 'India', 395006, '2020-07-23 05:52:40', '2020-07-23 05:52:40'),
(21, 36, 36, 'E-17,Narayan Nagar Society,Punagam', 'Surat', 'GUJARAT', 'India', 395006, '2020-07-23 05:54:48', '2020-07-23 05:54:48'),
(22, 37, 36, 'E-17,Narayan Nagar Society,Punagam', 'Surat', 'GUJARAT', 'India', 395006, '2020-07-23 05:59:11', '2020-07-23 05:59:11'),
(23, 38, 36, 'E-17,Narayan Nagar Society,Punagam', 'Surat', 'GUJARAT', 'India', 395006, '2020-07-23 06:00:45', '2020-07-23 06:00:45'),
(24, 47, 36, 'E-17,Narayan Nagar Society,Punagam', 'Surat', 'GUJARAT', 'India', 395006, '2020-07-23 07:38:31', '2020-07-23 07:38:31'),
(25, 48, 36, 'E-17,Narayan Nagar Society,Punagam', 'Surat', 'GUJARAT', 'India', 395006, '2020-07-23 07:40:37', '2020-07-23 07:40:37'),
(26, 49, 36, 'E-17,Narayan Nagar Society,Punagam', 'Surat', 'GUJARAT', 'India', 395006, '2020-07-23 07:43:34', '2020-07-23 07:43:34'),
(27, 50, 36, 'E-17,Narayan Nagar Society,Punagam', 'Surat', 'GUJARAT', 'India', 395006, '2020-07-23 07:48:00', '2020-07-23 07:48:00'),
(28, 51, 36, 'E-17,Narayan Nagar Society,Punagam', 'Surat', 'GUJARAT', 'India', 395006, '2020-07-23 07:53:48', '2020-07-23 07:53:48'),
(29, 52, 36, 'E-17,Narayan Nagar Society,Punagam', 'Surat', 'GUJARAT', 'India', 395006, '2020-07-24 03:48:56', '2020-07-24 03:48:56'),
(30, 53, 36, 'E-17,Narayan Nagar Society,Punagam', 'Surat', 'GUJARAT', 'India', 395006, '2020-07-24 04:00:02', '2020-07-24 04:00:02'),
(31, 56, 36, 'E-17,Narayan Nagar Society,Punagam', 'Surat', 'GUJARAT', 'India', 395006, '2020-07-24 18:06:46', '2020-07-24 18:06:46'),
(32, 57, 36, 'E-17,Narayan Nagar Society,Punagam', 'Surat', 'GUJARAT', 'India', 395006, '2020-07-24 18:11:38', '2020-07-24 18:11:38'),
(33, 58, 36, 'E-17,Narayan Nagar Society,Punagam', 'Surat', 'GUJARAT', 'India', 395006, '2020-07-24 18:14:53', '2020-07-24 18:14:53'),
(34, 59, 36, 'E-17,Narayan Nagar Society,Punagam', 'Surat', 'GUJARAT', 'India', 395006, '2020-07-24 18:17:05', '2020-07-24 18:17:05'),
(35, 60, 36, 'E-17,Narayan Nagar Society,Punagam', 'Surat', 'GUJARAT', 'India', 395006, '2020-07-25 04:03:47', '2020-07-25 04:03:47'),
(36, 61, 36, 'E-17,Narayan Nagar Society,Punagam', 'Surat', 'GUJARAT', 'India', 395006, '2020-07-25 04:47:46', '2020-07-25 04:47:46'),
(37, 62, 36, 'E-17,Narayan Nagar Society,Punagam', 'Surat', 'GUJARAT', 'India', 395006, '2020-07-25 04:49:28', '2020-07-25 04:49:28'),
(38, 63, 36, 'E-17,Narayan Nagar Society,Punagam', 'Surat', 'GUJARAT', 'India', 395006, '2020-07-25 06:12:06', '2020-07-25 06:12:06'),
(39, 64, 36, 'E-17,Narayan Nagar Society,Punagam', 'Surat', 'GUJARAT', 'India', 395006, '2020-07-25 06:21:14', '2020-07-25 06:21:14'),
(40, 66, 36, 'E-17,Narayan Nagar Society,Punagam', 'Surat', 'GUJARAT', 'India', 395006, '2020-07-25 06:47:15', '2020-07-25 06:47:15');

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE `category` (
  `id` int(11) NOT NULL,
  `parent_id` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `image` varchar(255) NOT NULL,
  `slug` varchar(255) NOT NULL,
  `status` tinyint(4) NOT NULL DEFAULT '1' COMMENT '1 = active\r\n2 = deactive',
  `created_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `soft_delete` int(11) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`id`, `parent_id`, `name`, `image`, `slug`, `status`, `created_at`, `updated_at`, `soft_delete`) VALUES
(20, '0', 'Bouket', '', 'bouket', 1, '2020-05-27 04:50:19', '0000-00-00 00:00:00', 0),
(21, '0', 'Loose Flowers', '', 'loose-flower', 1, '2020-05-27 04:50:19', '0000-00-00 00:00:00', 0),
(22, '0', 'Flower Strings', '', 'flower-string', 1, '2020-05-27 04:54:34', '2020-06-04 04:34:08', 0),
(23, '0', 'Traditional Garlands', '', 'traditional-garlands', 1, '2020-05-27 04:54:34', '2020-06-04 04:34:01', 0),
(24, '0', 'Bridal Flowers', '', 'brindal-flowers', 1, '2020-05-27 04:54:34', '0000-00-00 00:00:00', 0),
(25, '0', 'Jasmine Garlands', '', 'jasmine-garlands', 1, '2020-05-27 04:54:34', '0000-00-00 00:00:00', 0),
(26, '0', 'Decoration', '', 'decoration', 1, '2020-05-27 04:54:34', '0000-00-00 00:00:00', 0),
(27, '20', 'With Love', '', 'with-love', 1, '2020-05-27 11:07:36', '2020-05-27 11:07:36', 0),
(28, '20', 'Welcome Guest', '', 'welcome-guest', 1, '2020-05-27 11:08:09', '2020-05-27 11:08:09', 0),
(29, '20', 'Love Dipped Sugar', '', 'love-dipped-sugar', 1, '2020-05-27 11:08:32', '2020-05-27 11:08:32', 0),
(30, '20', 'Fill My Space', '', 'fill-my-space', 1, '2020-05-27 11:08:57', '2020-05-27 11:08:57', 0),
(31, '20', 'To My Love', '', 'to-my-love', 1, '2020-05-27 11:09:30', '2020-06-17 08:41:57', 0),
(36, '0', 'Rose Patal garlands', '', 'rose-patal-garlands', 1, '2020-06-17 08:43:59', '2020-06-17 09:06:40', 0),
(37, '0', 'Gift', '', 'gift', 1, '2020-06-17 08:47:30', '2020-06-17 09:06:27', 0),
(38, '0', 'Festival Packages', '', 'festival-packages', 1, '2020-06-17 08:49:07', '2020-06-17 09:06:13', 0),
(42, '20', 'Special Thanks Giving', '', 'special-thanks-giving', 1, '2020-06-17 08:57:08', '2020-06-17 09:07:26', 0),
(45, '22', 'Jasmine Flower String', '', 'jasmine-flower-string', 1, '2020-06-17 09:37:17', '2020-06-17 09:37:17', 0),
(46, '22', 'Rose Flower String', '', 'rose-flower-string', 1, '2020-06-17 09:48:28', '2020-06-17 09:48:28', 0),
(47, '22', 'Mogra string', '', 'mogra-string', 1, '2020-06-17 10:21:59', '2020-06-17 10:21:59', 0),
(48, '0', 'Flowershop special', '', 'flowershop-special', 1, '2020-06-18 03:46:55', '2020-06-18 03:46:55', 0),
(49, '21', 'Gulbahar', '', 'gulbahar', 1, '2020-06-18 08:45:50', '2020-06-18 08:45:50', 0);

-- --------------------------------------------------------

--
-- Table structure for table `contact_us`
--

CREATE TABLE `contact_us` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `contact_no` varchar(255) NOT NULL,
  `subject` varchar(255) NOT NULL,
  `message` varchar(255) NOT NULL,
  `soft_delete` int(11) NOT NULL DEFAULT '0',
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `contact_us`
--

INSERT INTO `contact_us` (`id`, `name`, `email`, `contact_no`, `subject`, `message`, `soft_delete`, `created_at`, `updated_at`) VALUES
(4, 'Donger', 'donger@gmail.com', '1234567890', 'Donger11', 'sdgdhytfg', 0, '2020-07-01 09:51:43', '2020-07-01 06:01:36'),
(5, 'Prashant', 'prashant.technobrigadeinfo@gmail.com', '1234567890', 'hellovcbhgfchbn', 'fcvhtfgjhu', 0, '2020-07-01 09:52:33', '2020-07-01 04:22:33');

-- --------------------------------------------------------

--
-- Table structure for table `delivery_address`
--

CREATE TABLE `delivery_address` (
  `id` int(11) NOT NULL,
  `order_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `address` varchar(255) NOT NULL,
  `city` varchar(255) NOT NULL,
  `state` varchar(255) NOT NULL,
  `country` varchar(255) NOT NULL,
  `postal_code` int(10) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `delivery_address`
--

INSERT INTO `delivery_address` (`id`, `order_id`, `user_id`, `address`, `city`, `state`, `country`, `postal_code`, `created_at`, `updated_at`) VALUES
(1, 2, 36, 'E-17,Narayan Nagar Society,Punagam', 'Surat', 'GUJARAT', 'India', 395006, '2020-06-26 14:10:52', '2020-06-26 14:10:52'),
(2, 3, 36, '123 Street', 'Phnom Penh', 'ARUNACHAL PRADESH', '99', 12252, '2020-06-26 14:12:02', '2020-06-26 14:12:02'),
(3, 6, 36, 'E-17,Narayan Nagar Society,Punagam', 'Surat', 'GUJARAT', 'India', 395006, '2020-06-26 14:29:13', '2020-06-26 14:29:13'),
(4, 7, 36, 'E-17,Narayan Nagar Society,Punagam', 'Surat', 'GUJARAT', 'India', 395006, '2020-06-26 14:33:23', '2020-06-26 14:33:23'),
(5, 8, 37, 'Kadodara', 'Surat', 'GUJARAT', 'India', 395006, '2020-06-27 04:43:54', '2020-06-27 04:43:54'),
(6, 9, 37, 'Kadodara', 'Surat', 'GUJARAT', 'India', 395006, '2020-06-27 05:27:14', '2020-06-27 05:27:14'),
(7, 10, 37, 'Kadodara', 'Surat', 'GUJARAT', 'India', 395006, '2020-06-27 05:37:51', '2020-06-27 05:37:51'),
(8, 11, 36, 'E-17,Narayan Nagar Society,Punagam', 'Surat', 'GUJARAT', 'India', 395006, '2020-06-27 09:10:40', '2020-06-27 09:10:40'),
(9, 12, 36, 'E-17,Narayan Nagar Society,Punagam', 'Surat', 'GUJARAT', 'India', 395006, '2020-06-27 10:25:26', '2020-06-27 10:25:26'),
(10, 13, 36, 'E-17,Narayan Nagar Society,Punagam', 'Surat', 'GUJARAT', 'India', 395006, '2020-06-27 10:26:17', '2020-06-27 10:26:17'),
(11, 14, 36, 'E-17,Narayan Nagar Society,Punagam', 'Surat', 'GUJARAT', 'India', 395006, '2020-06-27 10:27:48', '2020-06-27 10:27:48'),
(12, 15, 36, 'E-17,Narayan Nagar Society,Punagam', 'Surat', 'GUJARAT', 'India', 395006, '2020-06-27 10:38:52', '2020-06-27 10:38:52'),
(13, 16, 36, 'E-17,Narayan Nagar Society,Punagam', 'Surat', 'GUJARAT', 'India', 395006, '2020-06-29 07:07:27', '2020-06-29 07:07:27'),
(14, 17, 36, 'E-17,Narayan Nagar Society,Punagam', 'Surat', 'GUJARAT', 'India', 395006, '2020-07-01 09:34:29', '2020-07-01 09:34:29'),
(15, 18, 36, 'E-17,Narayan Nagar Society,Punagam', 'Surat', 'GUJARAT', 'India', 395006, '2020-07-02 07:25:13', '2020-07-02 07:25:13'),
(16, 19, 36, 'E-17,Narayan Nagar Society,Punagam', 'Surat', 'GUJARAT', 'India', 395006, '2020-07-02 07:29:24', '2020-07-02 07:29:24'),
(17, 20, 36, 'Pandesara', 'Surat', 'GUJARAT', '99', 395006, '2020-07-11 12:57:42', '2020-07-11 12:57:42'),
(18, 21, 36, 'Kadodara', 'Surat', 'GUJARAT', '99', 395006, '2020-07-11 13:10:16', '2020-07-11 13:10:16'),
(19, 22, 36, 'E-17,Narayan Nagar Society,Punagam', 'Surat', 'GUJARAT', 'India', 395006, '2020-07-23 04:45:59', '2020-07-23 04:45:59'),
(20, 35, 36, 'E-17,Narayan Nagar Society,Punagam', 'Surat', 'GUJARAT', 'India', 395006, '2020-07-23 05:52:40', '2020-07-23 05:52:40'),
(21, 36, 36, 'E-17,Narayan Nagar Society,Punagam', 'Surat', 'GUJARAT', 'India', 395006, '2020-07-23 05:54:48', '2020-07-23 05:54:48'),
(22, 37, 36, 'E-17,Narayan Nagar Society,Punagam', 'Surat', 'GUJARAT', 'India', 395006, '2020-07-23 05:59:11', '2020-07-23 05:59:11'),
(23, 38, 36, 'E-17,Narayan Nagar Society,Punagam', 'Surat', 'GUJARAT', 'India', 395006, '2020-07-23 06:00:45', '2020-07-23 06:00:45'),
(24, 47, 36, 'E-17,Narayan Nagar Society,Punagam', 'Surat', 'GUJARAT', 'India', 395006, '2020-07-23 07:38:31', '2020-07-23 07:38:31'),
(25, 48, 36, 'E-17,Narayan Nagar Society,Punagam', 'Surat', 'GUJARAT', 'India', 395006, '2020-07-23 07:40:37', '2020-07-23 07:40:37'),
(26, 49, 36, 'E-17,Narayan Nagar Society,Punagam', 'Surat', 'GUJARAT', 'India', 395006, '2020-07-23 07:43:34', '2020-07-23 07:43:34'),
(27, 50, 36, 'E-17,Narayan Nagar Society,Punagam', 'Surat', 'GUJARAT', 'India', 395006, '2020-07-23 07:48:00', '2020-07-23 07:48:00'),
(28, 51, 36, 'E-17,Narayan Nagar Society,Punagam', 'Surat', 'GUJARAT', 'India', 395006, '2020-07-23 07:53:48', '2020-07-23 07:53:48'),
(29, 52, 36, 'E-17,Narayan Nagar Society,Punagam', 'Surat', 'GUJARAT', 'India', 395006, '2020-07-24 03:48:56', '2020-07-24 03:48:56'),
(30, 53, 36, 'E-17,Narayan Nagar Society,Punagam', 'Surat', 'GUJARAT', 'India', 395006, '2020-07-24 04:00:02', '2020-07-24 04:00:02'),
(31, 56, 36, 'E-17,Narayan Nagar Society,Punagam', 'Surat', 'GUJARAT', 'India', 395006, '2020-07-24 18:06:46', '2020-07-24 18:06:46'),
(32, 57, 36, 'E-17,Narayan Nagar Society,Punagam', 'Surat', 'GUJARAT', 'India', 395006, '2020-07-24 18:11:38', '2020-07-24 18:11:38'),
(33, 58, 36, 'E-17,Narayan Nagar Society,Punagam', 'Surat', 'GUJARAT', 'India', 395006, '2020-07-24 18:14:53', '2020-07-24 18:14:53'),
(34, 59, 36, 'E-17,Narayan Nagar Society,Punagam', 'Surat', 'GUJARAT', 'India', 395006, '2020-07-24 18:17:05', '2020-07-24 18:17:05'),
(35, 60, 36, 'E-17,Narayan Nagar Society,Punagam', 'Surat', 'GUJARAT', 'India', 395006, '2020-07-25 04:03:47', '2020-07-25 04:03:47'),
(36, 61, 36, 'E-17,Narayan Nagar Society,Punagam', 'Surat', 'GUJARAT', 'India', 395006, '2020-07-25 04:47:46', '2020-07-25 04:47:46'),
(37, 62, 36, 'E-17,Narayan Nagar Society,Punagam', 'Surat', 'GUJARAT', 'India', 395006, '2020-07-25 04:49:28', '2020-07-25 04:49:28'),
(38, 63, 36, 'E-17,Narayan Nagar Society,Punagam', 'Surat', 'GUJARAT', 'India', 395006, '2020-07-25 06:12:06', '2020-07-25 06:12:06'),
(39, 64, 36, 'E-17,Narayan Nagar Society,Punagam', 'Surat', 'GUJARAT', 'India', 395006, '2020-07-25 06:21:14', '2020-07-25 06:21:14'),
(40, 66, 36, 'E-17,Narayan Nagar Society,Punagam', 'Surat', 'GUJARAT', 'India', 395006, '2020-07-25 06:47:15', '2020-07-25 06:47:15');

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `password_resets`
--

INSERT INTO `password_resets` (`email`, `token`, `created_at`) VALUES
('malisagar1995@gmail.com', '$2y$10$KwNDbi5YjhKo84TLY/XfquLBeE9yAyTz.NaR0M3.7BUq0NMOJ6UKe', '2020-04-01 08:29:42'),
('malisagar1995@gmail.com', '$2y$10$KwNDbi5YjhKo84TLY/XfquLBeE9yAyTz.NaR0M3.7BUq0NMOJ6UKe', '2020-04-01 08:29:42'),
('malisagar1995@gmail.com', 'ZPyzBb4GMLeCCJOCWGFEw8HA12bO1qJwsGgko5P2AOoMFBPhsLINI9gB4ivV', '2020-07-17 03:38:40'),
('prashant@gmail.com', 'nsBw8TIEObhNSRn0u5GQGk02d0eRhYTs3EWBrxU2DWuxzqBUfRhuGxqFGrif', '2020-07-17 06:23:01'),
('prashant.technobrigadeinfo@gmail.com', 'WNpR1vMPGoR3WQXFgtftz7aZ9vzottaXjuKMRPW6JmbWyrswcUMJjKJs80XA', '2020-07-17 07:50:40');

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

CREATE TABLE `product` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `price` int(20) NOT NULL,
  `quantity` int(15) DEFAULT NULL,
  `images` varchar(255) DEFAULT NULL,
  `description` longtext NOT NULL,
  `category_id` int(11) NOT NULL,
  `category_parent_id` int(11) NOT NULL,
  `slug` varchar(255) NOT NULL,
  `status` varchar(255) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `soft_delete` int(11) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`id`, `name`, `price`, `quantity`, `images`, `description`, `category_id`, `category_parent_id`, `slug`, `status`, `created_at`, `updated_at`, `soft_delete`) VALUES
(172, 'Rose String Special', 250, 140, NULL, 'Unde', 46, 22, 'rose-string-special', '1', '2020-06-17 00:43:36', '2020-07-25 00:42:06', 0),
(182, 'Jasmine Crossandra String', 30, 196, NULL, 'Jasmineand Crossandra infundibuliformis(Kanagambharam) flowers either together in a string or as separate strings have a special place for any occasions in the South Indian culture. During weddings and special celebrations women usually wear strings of Jasmine or Kanagambharam or both.', 28, 22, 'jasmine-crossandra-string', '1', '2020-06-17 04:09:28', '2020-07-25 01:17:15', 0),
(183, 'Merable Rose String', 60, 71, NULL, 'Merable Rose String', 27, 22, 'merable-rose-string', '1', '2020-06-17 04:19:21', '2020-07-24 22:33:47', 0),
(191, 'Special Rose', 280, 110, NULL, 'Jasmine Bud Gajra is known for its fragrance is worn by women of South India, as a symbol of tradition and culture. Besides the beauty and traditional appeal, these flowers are worn by women for all  auspicious functions. Women into special traditional dance form such as Bharatanatyam also use jasmine Gajra for hair decoration', 27, 20, 'special-rose', '1', '2020-06-17 05:03:13', '2020-07-24 12:47:05', 0),
(201, 'Rose', 250, 5, NULL, 'fdhtfgh', 27, 20, 'rose', '1', '2020-06-23 05:45:44', '2020-07-23 00:46:29', 0),
(202, 'Rose17', 250, 4, NULL, 'fdhtfgh', 27, 20, 'rose', '1', '2020-06-23 05:45:44', '2020-07-24 12:36:46', 0),
(203, 'nbm', 250, 119, NULL, 'gfhgfjgfj', 27, 20, 'nbm', '1', '2020-07-08 02:57:27', '2020-07-23 00:46:29', 0),
(205, 'esrfsf', 25, 192, NULL, 'cvgbdfxchg', 27, 20, 'esrfsf', '1', '2020-07-08 02:58:32', '2020-07-24 12:36:46', 0);

-- --------------------------------------------------------

--
-- Table structure for table `product_images`
--

CREATE TABLE `product_images` (
  `id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `product_image` varchar(255) NOT NULL,
  `sort_order` int(11) NOT NULL DEFAULT '0',
  `status` tinyint(4) NOT NULL DEFAULT '1',
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `product_images`
--

INSERT INTO `product_images` (`id`, `product_id`, `product_image`, `sort_order`, `status`, `created_at`, `updated_at`) VALUES
(18311, 182, 'product_15930638830.jpg', 2, 1, '2020-06-25 03:18:57', '2020-06-25 03:18:57'),
(18313, 183, 'product_15923873610.jpg', 1, 1, '2020-06-25 03:30:22', '2020-06-25 03:30:22'),
(18321, 191, 'product_15923899930.jpg', 1, 1, '2020-06-25 03:18:26', '2020-06-25 03:18:26'),
(18322, 191, 'product_15923948662.jpg', 4, 1, '2020-06-25 03:18:26', '2020-06-25 03:18:26'),
(18324, 191, 'product_15923963603.jpg', 3, 1, '2020-06-25 03:18:26', '2020-06-25 03:18:26'),
(18327, 191, 'product_15923963814.jpg', 2, 1, '2020-06-25 03:18:26', '2020-06-25 03:18:26'),
(18328, 1, 'product_15929889180.jpg', 3, 1, '2020-06-24 05:25:05', '2020-06-24 05:25:05'),
(18329, 182, 'product_15924543352.jpg', 1, 1, '2020-06-25 03:18:57', '2020-06-25 03:18:57'),
(18344, 172, 'product_15924701961.jpg', 1, 1, '2020-06-25 05:30:00', '2020-06-25 05:30:00'),
(18350, 195, 'product_15929017350.jpg', 1, 1, '2020-06-23 03:12:15', '2020-06-23 03:12:15'),
(18354, 199, 'product_15929065961.jpg', 1, 1, '2020-06-23 04:33:16', '2020-06-23 04:33:16'),
(18356, 201, 'product_15929110880.jpg', 1, 1, '2020-06-25 03:26:10', '2020-06-25 03:26:10'),
(18357, 1, 'product_15929961053.jpg', 1, 1, '2020-06-24 05:25:05', '2020-06-24 05:25:05'),
(18358, 201, 'product_15930606271.jpg', 2, 1, '2020-06-25 03:26:10', '2020-06-25 03:26:10'),
(18360, 172, 'product_15930637982.webp', 2, 1, '2020-06-25 05:30:00', '2020-06-25 05:30:00'),
(18362, 183, 'product_15930639782.jpg', 2, 1, '2020-06-25 03:30:22', '2020-06-25 03:30:22'),
(18364, 202, 'product_15930829681.jpg', 2, 1, '2020-07-02 01:56:33', '2020-07-02 01:56:33'),
(18365, 202, 'product_15930829682.jpg', 1, 1, '2020-07-02 01:56:33', '2020-07-02 01:56:33'),
(18366, 202, 'product_15936747933.jpg', 3, 1, '2020-07-02 01:56:33', '2020-07-02 01:56:33'),
(18367, 203, 'product_15941968470.jpg', 1, 1, '2020-07-11 02:54:45', '2020-07-11 02:54:45'),
(18368, 205, 'product_15941969120.jpg', 1, 1, '2020-07-23 22:30:53', '2020-07-23 22:30:53'),
(18369, 205, 'product_15944558632.jpg', 2, 1, '2020-07-23 22:30:53', '2020-07-23 22:30:53'),
(18371, 203, 'product_15944558852.jpg', 2, 1, '2020-07-11 02:54:45', '2020-07-11 02:54:45');

-- --------------------------------------------------------

--
-- Table structure for table `product_review`
--

CREATE TABLE `product_review` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `review` varchar(255) NOT NULL,
  `rating` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `product_review`
--

INSERT INTO `product_review` (`id`, `name`, `review`, `rating`, `product_id`, `user_id`, `created_at`, `updated_at`) VALUES
(8, 'prashant', 'aes', 5, 172, NULL, '2020-07-11 06:49:12', '2020-07-11 06:49:12'),
(9, 'rohitbhai', 'dtfgreyt', 3, 182, NULL, '2020-07-11 06:49:34', '2020-07-11 06:49:34'),
(10, 'ketan', 'stgreyt', 2, 183, NULL, '2020-07-11 06:56:24', '2020-07-11 06:56:24'),
(11, 'Ali Shepard', 'gfuygfuy', 1, 191, NULL, '2020-07-11 06:56:43', '2020-07-11 06:56:43'),
(12, 'prashant', 'fyhgfhyf', 5, 201, NULL, '2020-07-11 06:57:08', '2020-07-11 06:57:08'),
(13, 'rahul', 'chgfh', 4, 172, NULL, '2020-07-11 06:57:24', '2020-07-11 06:57:24'),
(14, 'Rahul Virani', 'vcb hfg', 2, 202, NULL, '2020-07-11 06:57:42', '2020-07-11 06:57:42'),
(15, 'Damian Gray', 'xcfhgtfh', 2, 191, NULL, '2020-07-11 06:58:03', '2020-07-11 06:58:03'),
(16, 'prashant', 'fyhgu', 2, 205, NULL, '2020-07-11 07:00:51', '2020-07-11 07:00:51'),
(17, 'tdy', 'ghytdgfy', 3, 203, NULL, '2020-07-11 07:01:15', '2020-07-11 07:01:15'),
(18, 'Prashant Bhayani', 'Nice', 5, 182, NULL, '2020-07-15 17:29:15', '2020-07-15 17:29:15'),
(19, 'Donger Singh', 'Glorious', 4, 182, NULL, '2020-07-15 17:29:36', '2020-07-15 17:29:36'),
(20, 'Sagar Mali', 'Superb', 4, 182, NULL, '2020-07-15 17:29:56', '2020-07-15 17:29:56'),
(21, 'Rohit JP Sigh', 'Awasome', 5, 182, NULL, '2020-07-15 17:30:20', '2020-07-15 17:30:20'),
(22, 'Yogesh Patel', 'Nice', 1, 182, NULL, '2020-07-15 18:05:40', '2020-07-15 18:05:40'),
(23, 'xyz', 'dfdfdfddesdtgdrytrfhy6fujt', 4, 201, NULL, '2020-07-16 07:57:09', '2020-07-16 07:57:09'),
(24, 'prashant', 'cvhtfhtf', 5, 201, NULL, '2020-07-16 08:01:14', '2020-07-16 08:01:14'),
(25, 'rahul', 'vjh', 4, 201, NULL, '2020-07-16 08:05:10', '2020-07-16 08:05:10'),
(26, 'uiyui', 'yujguiy', 4, 182, NULL, '2020-07-16 09:30:13', '2020-07-16 09:30:13');

-- --------------------------------------------------------

--
-- Table structure for table `related_products`
--

CREATE TABLE `related_products` (
  `id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `related_products_id` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `related_products`
--

INSERT INTO `related_products` (`id`, `product_id`, `related_products_id`) VALUES
(23, 191, '182'),
(25, 182, '191,201'),
(27, 201, '172'),
(29, 183, '182,191'),
(30, 172, '172,182,183,191,201'),
(34, 202, '183,191,201'),
(38, 203, '182'),
(39, 205, '172');

-- --------------------------------------------------------

--
-- Table structure for table `slider`
--

CREATE TABLE `slider` (
  `id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `subtitle` varchar(255) NOT NULL,
  `images` varchar(255) NOT NULL,
  `link` varchar(255) NOT NULL,
  `category_id` int(11) NOT NULL DEFAULT '0',
  `status` varchar(255) NOT NULL COMMENT '1 = active 2 = deactive',
  `created_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `soft_delete` int(11) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `slider`
--

INSERT INTO `slider` (`id`, `title`, `subtitle`, `images`, `link`, `category_id`, `status`, `created_at`, `updated_at`, `soft_delete`) VALUES
(2, 'Rahim Davenport5', 'Sequi culpa tempore6', 'slider_1380213080.jpg', 'Incididunt elit dol7', 22, '1', '2020-06-02 10:39:32', '2020-07-22 12:37:07', 0),
(3, 'Voluptatemreprehend', 'Banner Test1', 'slider_455590335.jpg', 'Banner Test2', 20, '1', '2020-06-23 11:02:48', '2020-07-22 12:36:59', 0),
(4, 'Boucket', 'Bouket banner', 'slider_719234247.jpg', 'dsfrg', 22, '1', '2020-07-22 09:55:04', '2020-07-22 12:36:51', 0),
(5, 'Bouket', 'Evergreen Flower Mania', 'slider_1909503678.jpg', 'jhjhj', 20, '1', '2020-07-22 11:39:11', '2020-07-22 11:39:11', 0),
(6, 'Rose', 'Rose Special', 'slider_1273040001.jpg', 'dfhdty', 24, '1', '2020-07-22 11:43:03', '2020-07-22 12:16:24', 1);

-- --------------------------------------------------------

--
-- Table structure for table `subscribers`
--

CREATE TABLE `subscribers` (
  `id` int(11) NOT NULL,
  `email` varchar(255) NOT NULL,
  `soft_delete` int(11) NOT NULL DEFAULT '0',
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `subscribers`
--

INSERT INTO `subscribers` (`id`, `email`, `soft_delete`, `created_at`, `updated_at`) VALUES
(1, 'admin@admin.com', 0, '2020-05-29 05:53:19', '2020-05-29 05:53:19'),
(5, 'user@gmail.com', 0, '2020-05-29 05:55:58', '2020-07-01 06:08:15'),
(6, 'dongarsing.technobrigadeinfo@gmail.com', 0, '2020-07-10 10:23:10', '2020-07-10 10:23:10'),
(8, 'prashant1@gmail.com', 0, '2020-07-10 13:17:34', '2020-07-10 13:17:34'),
(16, 'bhayaniprashant077@gmail.com', 0, '2020-07-11 13:28:31', '2020-07-11 13:28:31'),
(17, 'prashant@gmail.com', 0, '2020-07-13 08:59:15', '2020-07-13 08:59:15'),
(18, 'malisagar1995@gmail.com', 0, '2020-07-14 08:37:50', '2020-07-14 08:37:50'),
(19, 'viratbhayani@gmail.com', 0, '2020-07-15 14:19:55', '2020-07-15 14:19:55'),
(21, 'prashant.technobrigadeinfo@gmail.com', 0, '2020-07-17 08:42:44', '2020-07-17 08:42:44'),
(22, 'admin@admincom', 1, '2020-07-24 06:35:08', '2020-07-25 01:36:12');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_cart`
--

CREATE TABLE `tbl_cart` (
  `id` int(11) NOT NULL,
  `product_name` varchar(255) NOT NULL,
  `price` varchar(255) NOT NULL,
  `qty` int(15) NOT NULL,
  `total_amount` varchar(255) DEFAULT NULL,
  `product_image` varchar(255) DEFAULT NULL,
  `user_id` int(15) NOT NULL,
  `product_id` int(15) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_cms`
--

CREATE TABLE `tbl_cms` (
  `id` int(11) NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `tbl_cms`
--

INSERT INTO `tbl_cms` (`id`, `title`, `slug`, `description`, `created_at`) VALUES
(1, 'About Us', 'about_us', '<p>This is <b>about</b> page.</p><p>fbdfb</p><p>fdfmm743</p>', '2020-06-22 05:16:53'),
(2, 'Help', 'help', '<p>This is <b>help</b> page.</p><p>gvs23</p><p>123ghj456</p>', '2020-06-22 05:21:47'),
(3, 'Privacy Policies', 'privacy_policies', '<p> </p><section id=\"about\" style=\"font-family: &quot;Times New Roman&quot;; font-size: medium;\"><div class=\"container\"><div class=\"row\"><div class=\"col-lg-12 col-md-12 col-sm-12 col-xs-12\"><div class=\"text-heading large-head \"><h1>Privacy Policy</h1>Techno Brigade InfoTech Apps do collects user information from you so that we can provide a rich and better user experience. We are very concerned about your Privacy. And this Privacy policy explains how we use, protect user information.&nbsp;Information about how we use the user data:<p></p><h6>- Click photos and videos</h6>This specific permission allows TBI Apps to use your device’s camera to click photos or videos and turn ON/OFF camera Flash. TBI Apps may upload photos taken or photos chosen from the gallery with the user consent.<br><h6>- User Location (network-based / GPS)</h6>TBI Apps may take user location with the user consent for some apps to work properly and give the required services.<br><h6>- Read contacts.</h6>TBI Apps does not save or upload your contacts. Permission to access contacts / phone book is generally for search contacts purpose.<br><h6>-Photos/Media/Files</h6>TBI Apps may store promo images of the app in SD card or internal memory when user recommends it to friends via share options. We assure that other files will not be accessed on SD card or internal memory.<br><h6>ACCESS_FINE_LOCATION</h6>TBI Apps may require user location for deal.<br><h6>CALL_PHONE</h6>TBI Apps may require user for calling.<br><h6>-PERSONAL INFORMATION</h6>Personal information is data that can be used to uniquely identify or contact a single person. We DO NOT collect, store or use any personal information while you visit, download or upgrade our website or our products, excepting the personal information that you submit to us when you create a user account, send an error report or participate in online surveys and other activities.Only for the following purposes that we may use personal information submitted by you: help us develop, deliver, and improve our products and services and supply higher quality service; manage online surveys and other activities you’ve participated in. In the following circumstances, we may disclose your personal information according to your wish or regulations by law: (1) Your prior permission; (2) By the applicable law within or outside your country of residence, legal process, litigation requests; (3) By requests from public and governmental authorities; (4) To protect our legal rights and interests.<br><h6>-NON-PERSONAL INFORMATION</h6>Non-personal information is data in a form that does not permit direct association with any specific individual, such as your Android ID, CPN model, memory size, your phone IMEI number, phone model, rom, phone operator, location, install, uninstall, frequency of use, etc. We may collect and use non-personal information in the following circumstances. To have a better understanding in user’s behavior, solve problems in products and services, improve our products, services and advertising, we may collect non-personal information such as the data of install, frequency of use, country, equipment and channel. If non-personal information is combined with personal information, we treat the combined information as personal information for the purposes of this Privacy Policy.<br><h6>-PROTECTION OF PERSONAL INFORMATION</h6>We take precautions — including administrative, technical, and physical measures — to safeguard your personal information against loss, theft, and misuse, as well as against unauthorized access, disclosure, alteration, and destruction. When you use some products, services, or post your comments, the personal information you share is visible to other users and can be read, collected, or used by them. You are responsible for the personal information you choose to submit in these instances. Please take care when using these features. OUR COMPANYWIDE COMMITMENT TO YOUR PRIVACY To make sure your personal information is secure; we communicate our privacy and security guidelines to all employees and strictly enforce privacy safeguards within the company.<br><h6>-Third-party Advertisers</h6>Admob Ads Privacy Policy：click and jump to&nbsp;<a href=\"https://support.google.com/admob/answer/6128543?hl=en\" target=\"_blank\">https://support.google.com/admob/answer/6128543?hl=en</a><br><h6>-PRIVACY QUESTIONS<br></h6>If you have any questions or concerns about our Privacy Policy or data processing, please&nbsp;<a href=\"mailto:contact.technobrigadeinfo@gmail.com\">contact us</a>&nbsp;We may update Privacy Policy from time to time. When we change the policy in a material way, a notice will be posted on our website along with the updated Privacy Policy.<br><h6>-Access to Mobile Device Camera, Microphone and Photos<br></h6>If you use our Mobile Apps, we may request your permission to access the camera, microphone and photos on your Mobile Device. If you approve and/or enable it in your Mobile Device settings, our Mobile Apps may access and use the camera, microphone and photos on your Mobile Device to make and receive voice and video calls and messages and to send photos to others. You may at any time opt out from further allowing us to have this access via the Mobile App’s privacy settings on your Mobile Device. Under no circumstances does TBI apps collect, download or otherwise make copies of any recordings you make using the Application.<br><p></p></div></div><div class=\"clear\"></div><div class=\"in-divider line-shadow\"></div></div></div></section><div class=\"copyright\" style=\"font-family: &quot;Times New Roman&quot;; font-size: medium;\"><div class=\"container\"><div class=\"row\"><div class=\"col-lg-12 col-md-12 col-sm-12 \"><div class=\"socials circle-icon al-center large-icon\"><a href=\"http://apps.technobrigadeinfotech.in/mathbi/admin/privacy_policies#\" class=\"facebook\"><i class=\"fa fa-facebook\"></i>facebook</a></div></div><div class=\"col-lg-12 col-md-12 col-sm-12\"><center><p>Copyright @2015 - Techno Brigade InfoTech</p><p class=\"sign\">Made by&nbsp;<i class=\"fa fa-heart\"></i>from our team</p></center></div></div></div></div>', '2020-06-22 05:13:30');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_contact_reply`
--

CREATE TABLE `tbl_contact_reply` (
  `id` int(11) NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '',
  `message` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` datetime(6) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `tbl_contact_reply`
--

INSERT INTO `tbl_contact_reply` (`id`, `email`, `message`, `created_at`) VALUES
(19, 'prashant.technobrigadeinfo@gmail.com', 'xdvgdfxg', '2020-07-10 11:22:23.000000'),
(20, 'prashant.technobrigadeinfo@gmail.com', 'zxgfdgdfx', '2020-07-10 12:10:39.000000'),
(21, 'prashant.technobrigadeinfo@gmail.com', 'xzxcvgxvgfxd', '2020-07-10 12:12:05.000000'),
(22, 'prashant.technobrigadeinfo@gmail.com', 'dsfsdgfsa', '2020-07-10 12:13:26.000000'),
(23, '.$contact->email.', 'xcgbvh', '2020-07-10 12:27:52.000000'),
(24, '.$contact->email.', 'xcfdzxfv', '2020-07-10 12:28:12.000000'),
(25, 'prashant.technobrigadeinfo@gmail.com', '&nbsp;xcvbcv', '2020-07-10 12:29:13.000000'),
(26, 'prashant.technobrigadeinfo@gmail.com', 'dgfcg', '2020-07-10 13:04:35.000000'),
(27, 'prashant.technobrigadeinfo@gmail.com', 'rrrrrrrrrrrrrrrrr', '2020-07-10 13:04:56.000000');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_coupons`
--

CREATE TABLE `tbl_coupons` (
  `id` int(11) NOT NULL,
  `code` varchar(255) DEFAULT NULL,
  `type` varchar(255) DEFAULT NULL,
  `value` varchar(255) DEFAULT NULL,
  `min_amount` int(11) DEFAULT NULL,
  `use_count` int(11) DEFAULT '1',
  `status` tinyint(4) DEFAULT '1',
  `soft_delete` int(11) NOT NULL DEFAULT '0',
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_coupons`
--

INSERT INTO `tbl_coupons` (`id`, `code`, `type`, `value`, `min_amount`, `use_count`, `status`, `soft_delete`, `created_at`, `updated_at`) VALUES
(6, 'FLOWER50', '1', '50', NULL, 1, 1, 0, '2020-07-24 10:19:30', '2020-07-24 10:19:30'),
(7, 'FLOWER100', '2', '100', 500, 5, 1, 0, '2020-07-24 10:18:57', '2020-07-24 10:18:57');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_coupon_histories`
--

CREATE TABLE `tbl_coupon_histories` (
  `id` int(11) NOT NULL,
  `coupon_id` int(11) DEFAULT NULL,
  `code` varchar(255) DEFAULT NULL,
  `user_id` int(11) DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_coupon_histories`
--

INSERT INTO `tbl_coupon_histories` (`id`, `coupon_id`, `code`, `user_id`, `created_at`, `updated_at`) VALUES
(31, 7, 'FLOWER100', 36, '2020-07-24 18:06:46', '2020-07-24 18:06:46'),
(32, 7, 'FLOWER100', 36, '2020-07-24 18:11:38', '2020-07-24 18:11:38'),
(33, 7, 'FLOWER100', 36, '2020-07-24 18:14:53', '2020-07-24 18:14:53'),
(34, 7, 'FLOWER100', 36, '2020-07-24 18:17:05', '2020-07-24 18:17:05'),
(37, 6, 'FLOWER50', 36, '2020-07-25 06:21:14', '2020-07-25 06:21:14');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_enquiry`
--

CREATE TABLE `tbl_enquiry` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `email_id` varchar(255) NOT NULL,
  `service_type` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_orders`
--

CREATE TABLE `tbl_orders` (
  `id` int(11) NOT NULL,
  `order_number` varchar(255) NOT NULL,
  `user_id` int(11) NOT NULL,
  `sub_total` decimal(8,2) NOT NULL,
  `discount` decimal(8,2) DEFAULT '0.00',
  `cgst` decimal(8,2) NOT NULL,
  `sgst` decimal(8,2) NOT NULL,
  `shipping_cost` decimal(8,2) NOT NULL,
  `grand_total` decimal(8,2) NOT NULL,
  `order_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `status` int(4) DEFAULT '1' COMMENT '1=Pending,2=Confirmed,3=Cancelled,4=Dispatched,5=Delivered',
  `soft_delete` int(11) NOT NULL DEFAULT '0',
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_orders`
--

INSERT INTO `tbl_orders` (`id`, `order_number`, `user_id`, `sub_total`, `discount`, `cgst`, `sgst`, `shipping_cost`, `grand_total`, `order_date`, `status`, `soft_delete`, `created_at`, `updated_at`) VALUES
(66, '1423274', 36, '30.00', '0.00', '2.70', '2.70', '5.00', '40.40', '2020-07-25 06:47:15', 1, 0, '2020-07-25 06:47:15', '2020-07-25 06:47:15');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_order_items`
--

CREATE TABLE `tbl_order_items` (
  `id` int(11) NOT NULL,
  `order_id` int(11) NOT NULL,
  `product_name` varchar(255) NOT NULL,
  `price` varchar(255) NOT NULL,
  `qty` int(11) NOT NULL,
  `total_amount` varchar(255) NOT NULL,
  `product_id` varchar(255) NOT NULL,
  `soft_delete` int(11) NOT NULL DEFAULT '0',
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_order_items`
--

INSERT INTO `tbl_order_items` (`id`, `order_id`, `product_name`, `price`, `qty`, `total_amount`, `product_id`, `soft_delete`, `created_at`, `updated_at`) VALUES
(103, 66, 'Jasmine Crossandra String', '30', 1, '30', '182', 0, '2020-07-25 01:17:15', '2020-07-25 01:17:15');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_state`
--

CREATE TABLE `tbl_state` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_state`
--

INSERT INTO `tbl_state` (`id`, `name`) VALUES
(1, 'ANDAMAN AND NICOBAR ISLANDS'),
(2, 'ANDHRA PRADESH'),
(3, 'ARUNACHAL PRADESH'),
(4, 'ASSAM'),
(5, 'BIHAR'),
(6, 'CHATTISGARH'),
(7, 'CHANDIGARH'),
(8, 'DAMAN AND DIU'),
(9, 'DELHI'),
(10, 'DADRA AND NAGAR HAVELI'),
(11, 'GOA'),
(12, 'GUJARAT'),
(13, 'HIMACHAL PRADESH'),
(14, 'HARYANA'),
(15, 'JAMMU AND KASHMIR'),
(16, 'JHARKHAND'),
(17, 'KERALA'),
(18, 'KARNATAKA'),
(19, 'LAKSHADWEEP'),
(20, 'MEGHALAYA'),
(21, 'MAHARASHTRA'),
(22, 'MANIPUR'),
(23, 'MADHYA PRADESH'),
(24, 'MIZORAM'),
(25, 'NAGALAND'),
(26, 'ORISSA'),
(27, 'PUNJAB'),
(28, 'PONDICHERRY'),
(29, 'RAJASTHAN'),
(30, 'SIKKIM'),
(31, 'TAMIL NADU'),
(32, 'TRIPURA'),
(33, 'UTTARAKHAND'),
(34, 'UTTAR PRADESH'),
(35, 'WEST BENGAL'),
(36, 'TELANGANA');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_subscribe_reply`
--

CREATE TABLE `tbl_subscribe_reply` (
  `id` int(11) NOT NULL,
  `email_address` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '',
  `message` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` datetime(6) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `tbl_subscribe_reply`
--

INSERT INTO `tbl_subscribe_reply` (`id`, `email_address`, `message`, `created_at`) VALUES
(170, 'prashant.technobrigadeinfo@gmail.com', 'hello how are you', '2020-07-10 07:29:46.000000');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_wishlist`
--

CREATE TABLE `tbl_wishlist` (
  `id` int(11) NOT NULL,
  `product_name` varchar(255) NOT NULL,
  `price` varchar(255) NOT NULL,
  `qty` int(15) NOT NULL,
  `total_amount` varchar(255) DEFAULT NULL,
  `product_image` varchar(255) DEFAULT NULL,
  `user_id` int(15) NOT NULL,
  `product_id` int(15) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `user_type` int(11) NOT NULL DEFAULT '2' COMMENT '1=Admin,2=Employer,3=SeniorCitizen',
  `title` varchar(255) NOT NULL DEFAULT '',
  `name` varchar(255) NOT NULL,
  `lname` varchar(255) NOT NULL DEFAULT '',
  `email` varchar(255) NOT NULL,
  `national_id_number` varchar(255) DEFAULT '',
  `gender` varchar(255) NOT NULL DEFAULT '',
  `age` varchar(255) NOT NULL DEFAULT '',
  `work_contact` varchar(255) NOT NULL DEFAULT '',
  `contact_no` varchar(255) NOT NULL DEFAULT '',
  `address` varchar(255) NOT NULL,
  `city` varchar(255) NOT NULL,
  `state` varchar(255) NOT NULL,
  `country` varchar(255) NOT NULL DEFAULT 'India',
  `postal_code` varchar(255) NOT NULL,
  `emergency_contact` varchar(255) NOT NULL DEFAULT '',
  `relation_emergency_contact` varchar(255) NOT NULL DEFAULT '',
  `photo` text,
  `location` varchar(255) NOT NULL DEFAULT '',
  `password` varchar(255) NOT NULL,
  `m_password` varchar(225) DEFAULT NULL,
  `remember_token` varchar(255) DEFAULT NULL,
  `status` varchar(255) NOT NULL,
  `created_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `soft_delete` int(11) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `user_type`, `title`, `name`, `lname`, `email`, `national_id_number`, `gender`, `age`, `work_contact`, `contact_no`, `address`, `city`, `state`, `country`, `postal_code`, `emergency_contact`, `relation_emergency_contact`, `photo`, `location`, `password`, `m_password`, `remember_token`, `status`, `created_at`, `updated_at`, `soft_delete`) VALUES
(1, 1, 'admin', 'admin', 'admin', 'admin@admin.com', '', 'male', '', '5454545891', '9925645032', '', '', '', '', '', '', '', NULL, '78, new index, AUS', '$2y$10$fUTwdCoen9zmHgi/yfAAJ.8oGYnRIWd4tO2PJb02J13/RsuynTt8y', 'Admin123@', 'j9IeGi5nHV3XXaSPb9Q5FPOxDTj4g3ycvze5KWT6a7U2JKwi67a3aShiTU5q', '1', '2020-05-25 11:11:14', '2020-05-25 11:15:28', 0),
(36, 2, '', 'Prashant', 'Bhayani', 'prashant@gmail.com', '', 'Male', '', '', '1234567890', 'E-17,Narayan Nagar Society,Punagam', 'Surat', 'GUJARAT', 'India', '395006', '', '', 'user_387622862.jpg', '', '$2y$10$pyPnFxklpejCzCZVJ6Jmmue51HBH3OnInHcNfpM2upbww0sW649B6', '123456', 'eRGM6BWy95WnD2Y6OqyQJxtApS4G1KX9PelupuzaXoHeseqllEMaR5tgp2Si', '1', '2020-06-22 07:23:37', '2020-06-26 04:21:23', 0),
(37, 2, '', 'dongar', 'Rajput', 'donger@gmail.com', '', 'Male', '', '', '1234567890', 'Kadodara', 'Surat', 'GUJARAT', 'India', '395006', '', '', 'user_98824016.jpg', '', '$2y$10$HbSy1c/Ax3EbLnI1tHpSOeFp0ur1zmkswXg2zPU45ORyVj1fOnnrC', '123456', 'AnrXRQSN6ezNmFREy3EGnTC0xkdZYCmpJRPE0uO7E0U5rMC034L8YRw8t5QZ', '1', '2020-06-22 09:29:15', '2020-06-23 05:35:33', 0),
(38, 2, '', 'Prashant', 'Bhayani', 'prashant.technobrigadeinfo@gmail.com', '', 'Male', '', '', '1234567890', 'E-17,Narayan Nagar Society,Punagam', 'Surat', 'GUJARAT', 'India', '395006', '', '', 'user_387622862.jpg', '', '$2y$10$rITMmyguObzubRO49HBujOGqDRwcvEgv0rkn9HjwlvxcW.3CYKZ4W', '123456', 'F66xYlVP1BkF2TusiEvMGQXKgJ1Q1Z4EFybE6h4OqM09HqVjN2mAs6IREzeL', '1', '2020-06-22 07:23:37', '2020-07-17 13:17:27', 0),
(39, 2, '', 'dongar', 'Rajput', 'malisagar1995@gmail.com', '', 'Male', '', '', '1234567890', 'Kadodara', 'Surat', 'GUJARAT', 'India', '395006', '', '', 'user_98824016.jpg', '', '$2y$10$HbSy1c/Ax3EbLnI1tHpSOeFp0ur1zmkswXg2zPU45ORyVj1fOnnrC', '123456', 'AnrXRQSN6ezNmFREy3EGnTC0xkdZYCmpJRPE0uO7E0U5rMC034L8YRw8t5QZ', '1', '2020-06-22 09:29:15', '2020-06-23 05:35:33', 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `banner`
--
ALTER TABLE `banner`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `billing_address`
--
ALTER TABLE `billing_address`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `contact_us`
--
ALTER TABLE `contact_us`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `delivery_address`
--
ALTER TABLE `delivery_address`
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
  ADD KEY `password_resets_email_index` (`email`(191));

--
-- Indexes for table `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `product_images`
--
ALTER TABLE `product_images`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `product_review`
--
ALTER TABLE `product_review`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `related_products`
--
ALTER TABLE `related_products`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `slider`
--
ALTER TABLE `slider`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `subscribers`
--
ALTER TABLE `subscribers`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_cart`
--
ALTER TABLE `tbl_cart`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_cms`
--
ALTER TABLE `tbl_cms`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_contact_reply`
--
ALTER TABLE `tbl_contact_reply`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_coupons`
--
ALTER TABLE `tbl_coupons`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_coupon_histories`
--
ALTER TABLE `tbl_coupon_histories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_enquiry`
--
ALTER TABLE `tbl_enquiry`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_orders`
--
ALTER TABLE `tbl_orders`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_order_items`
--
ALTER TABLE `tbl_order_items`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_state`
--
ALTER TABLE `tbl_state`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_subscribe_reply`
--
ALTER TABLE `tbl_subscribe_reply`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_wishlist`
--
ALTER TABLE `tbl_wishlist`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `banner`
--
ALTER TABLE `banner`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `billing_address`
--
ALTER TABLE `billing_address`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=41;

--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=50;

--
-- AUTO_INCREMENT for table `contact_us`
--
ALTER TABLE `contact_us`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `delivery_address`
--
ALTER TABLE `delivery_address`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=41;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `product`
--
ALTER TABLE `product`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=206;

--
-- AUTO_INCREMENT for table `product_images`
--
ALTER TABLE `product_images`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18372;

--
-- AUTO_INCREMENT for table `product_review`
--
ALTER TABLE `product_review`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT for table `related_products`
--
ALTER TABLE `related_products`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=40;

--
-- AUTO_INCREMENT for table `slider`
--
ALTER TABLE `slider`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `subscribers`
--
ALTER TABLE `subscribers`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `tbl_cart`
--
ALTER TABLE `tbl_cart`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tbl_cms`
--
ALTER TABLE `tbl_cms`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `tbl_contact_reply`
--
ALTER TABLE `tbl_contact_reply`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT for table `tbl_coupons`
--
ALTER TABLE `tbl_coupons`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `tbl_coupon_histories`
--
ALTER TABLE `tbl_coupon_histories`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=38;

--
-- AUTO_INCREMENT for table `tbl_enquiry`
--
ALTER TABLE `tbl_enquiry`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tbl_orders`
--
ALTER TABLE `tbl_orders`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=67;

--
-- AUTO_INCREMENT for table `tbl_order_items`
--
ALTER TABLE `tbl_order_items`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=104;

--
-- AUTO_INCREMENT for table `tbl_state`
--
ALTER TABLE `tbl_state`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;

--
-- AUTO_INCREMENT for table `tbl_subscribe_reply`
--
ALTER TABLE `tbl_subscribe_reply`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=171;

--
-- AUTO_INCREMENT for table `tbl_wishlist`
--
ALTER TABLE `tbl_wishlist`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=40;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
