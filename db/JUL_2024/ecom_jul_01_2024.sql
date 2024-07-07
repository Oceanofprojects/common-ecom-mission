-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Jul 01, 2024 at 08:11 PM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ecom`
--

-- --------------------------------------------------------

--
-- Table structure for table `cc_request`
--

CREATE TABLE `cc_request` (
  `cc_req_id` int(11) NOT NULL,
  `cid` varchar(15) DEFAULT NULL,
  `cc_price` varchar(100) DEFAULT NULL,
  `total_product` longtext DEFAULT NULL,
  `req_status` int(11) DEFAULT NULL,
  `req_date` date DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `cc_request`
--

INSERT INTO `cc_request` (`cc_req_id`, `cid`, `cc_price`, `total_product`, `req_status`, `req_date`, `created_at`) VALUES
(3, '88477429', '500', 'a:2:{i:0;a:3:{s:4:\"p_id\";s:6:\"06416N\";s:6:\"p_name\";s:14:\"Gymno Calcium \";s:4:\"qnty\";i:2;}i:1;a:3:{s:4:\"p_id\";s:6:\"1V9ZJG\";s:6:\"p_name\";s:9:\"Euphorbia\";s:4:\"qnty\";i:2;}}', 0, '2024-06-19', '2024-06-28 12:41:51'),
(4, '88477429', '500', 'a:8:{i:0;a:3:{s:4:\"p_id\";s:6:\"06416N\";s:6:\"p_name\";s:14:\"Gymno Calcium \";s:4:\"qnty\";i:3;}i:1;a:3:{s:4:\"p_id\";s:6:\"1V9ZJG\";s:6:\"p_name\";s:9:\"Euphorbia\";s:4:\"qnty\";i:4;}i:2;a:3:{s:4:\"p_id\";s:6:\"6GCHRX\";s:6:\"p_name\";s:12:\"mexican mint\";s:4:\"qnty\";i:2;}i:3;a:3:{s:4:\"p_id\";s:6:\"OQ3486\";s:6:\"p_name\";s:39:\"nurserylive-tulsi-plants-category-image\";s:4:\"qnty\";i:3;}i:4;a:3:{s:4:\"p_id\";s:6:\"7L38G0\";s:6:\"p_name\";s:23:\"betel leaf (magai paan)\";s:4:\"qnty\";i:2;}i:5;a:3:{s:4:\"p_id\";s:6:\"0961XK\";s:6:\"p_name\";s:14:\"naatu pirandai\";s:4:\"qnty\";i:3;}i:6;a:3:{s:4:\"p_id\";s:6:\"WW1877\";s:6:\"p_name\";s:12:\"enjoy pothos\";s:4:\"qnty\";i:2;}i:7;a:3:{s:4:\"p_id\";s:6:\"Y4157U\";s:6:\"p_name\";s:17:\"Callisia fragrans\";s:4:\"qnty\";i:2;}}', 0, '2024-06-28', '2024-06-28 12:45:09');

-- --------------------------------------------------------

--
-- Table structure for table `customers`
--

CREATE TABLE `customers` (
  `s_no` int(11) NOT NULL,
  `cid` varchar(15) DEFAULT NULL,
  `role` varchar(10) DEFAULT NULL,
  `c_name` varchar(20) DEFAULT NULL,
  `c_gender` varchar(10) DEFAULT NULL,
  `email` varchar(50) DEFAULT NULL,
  `address_1` varchar(250) DEFAULT NULL,
  `address_2` varchar(250) DEFAULT NULL,
  `ph_num` bigint(20) DEFAULT NULL,
  `whatsapp_num` bigint(20) DEFAULT NULL,
  `pwd` text DEFAULT NULL,
  `profile` varchar(15) DEFAULT NULL,
  `country` varchar(20) DEFAULT NULL,
  `state` varchar(30) DEFAULT NULL,
  `city` varchar(30) DEFAULT NULL,
  `pin_code` varchar(15) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `customers`
--

INSERT INTO `customers` (`s_no`, `cid`, `role`, `c_name`, `c_gender`, `email`, `address_1`, `address_2`, `ph_num`, `whatsapp_num`, `pwd`, `profile`, `country`, `state`, `city`, `pin_code`, `created_at`, `updated_at`) VALUES
(1, '12738075', 'customer', 'maran', 'male', 'maran@gmail.com', 'test address1', 'test address2', 6789054321, 6789054321, '$2y$10$i933OGJ/ORts2m3o.B1BO.ao.0dEUVpLu05gngOyhUUrMEZqDuakS', 'default', 'india', 'tamilnadu', 'chennai', '600044', '2024-06-18 16:23:10', NULL),
(7, '88477429', 'admin', 'mani', 'male', 'mani@gmail.com', 'test 1', 'test 2', 1234567890, 1234567890, '$2y$10$g7r.1QZOEISBPnPHMtFFeeCic5aof6/kB4M/OoqLnkQbJVaOt9aE6', 'default', 'india', 'tamilnadu', 'chennai', '600044', '2024-06-18 16:42:22', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `cus_log`
--

CREATE TABLE `cus_log` (
  `sno` int(11) NOT NULL,
  `uid` varchar(25) DEFAULT NULL,
  `cid` varchar(25) DEFAULT NULL,
  `ip_ad` varchar(25) DEFAULT NULL,
  `_date` date DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `cus_log`
--

INSERT INTO `cus_log` (`sno`, `uid`, `cid`, `ip_ad`, `_date`, `created_at`) VALUES
(1, 'NF5JRSO41KC98B1JF28K', '32477253', '0000:00:00:00', '2023-12-01', '2023-12-01 14:03:50'),
(2, '6N2SJP1A8WR1F6CI7842', '32477253', '0000:00:00:00', '2023-12-01', '2023-12-01 14:06:56'),
(3, 'OH441178RT027059D4SD', '89025565', '0000:00:00:00', '2023-12-19', '2023-12-19 16:17:34'),
(4, '2285FGEUNEEQIE0SNKC0', '32477253', '0000:00:00:00', '2023-12-19', '2023-12-19 16:18:13'),
(5, 'L4YEMX3E95668G355Z37', '89025565', '0000:00:00:00', '2023-12-19', '2023-12-19 16:19:24'),
(6, 'I2GA568D971HERYE4YA5', '32477253', '0000:00:00:00', '2023-12-19', '2023-12-19 16:20:17'),
(7, '794FBV70W48256BP5OD6', '89025565', '0000:00:00:00', '2023-12-19', '2023-12-19 16:24:40'),
(8, '10FTC3HSMU31RA26WMEE', '89025565', '0000:00:00:00', '2023-12-21', '2023-12-21 08:01:55'),
(9, 'MBQU6GZ2462VE9JROOP9', '89025565', '0000:00:00:00', '2023-12-21', '2023-12-21 08:03:36'),
(10, 'CX5C1EB9747N4O46P2KG', '89025565', '0000:00:00:00', '2023-12-23', '2023-12-23 09:03:17'),
(11, 'J5G1453QIQQY79WULNBM', '89025565', '0000:00:00:00', '2023-12-23', '2023-12-23 11:05:47'),
(12, 'ET513N232LR1B4PM0536', '32477253', '0000:00:00:00', '2023-12-30', '2023-12-30 13:41:49'),
(13, '93923Z172882NJ8SHSW7', '32477253', '0000:00:00:00', '2023-12-31', '2023-12-31 16:56:50'),
(14, '695OEX0396L60U2O56E9', '32477253', '0000:00:00:00', '2024-01-02', '2024-01-02 06:38:06'),
(15, 'H2T3D0021321C0Z84RY3', '89025565', '0000:00:00:00', '2024-01-11', '2024-01-11 10:50:41'),
(16, 'UM1375R529T2RUMFB7D6', '32477253', '0000:00:00:00', '2024-03-10', '2024-03-10 08:03:04'),
(17, '8X86G9588W2KP034X583', '32477253', '0000:00:00:00', '2024-03-10', '2024-03-10 13:09:07'),
(18, 'PD6XR3SAE3E7MAM3CBW6', '32477253', '0000:00:00:00', '2024-03-10', '2024-03-11 02:44:54'),
(19, '046F2N87H3Z8RN8L353U', '32477253', '0000:00:00:00', '2024-03-11', '2024-03-11 07:32:41'),
(20, 'S7V5Q19H2W3KMDB419H9', '32477253', '0000:00:00:00', '2024-03-13', '2024-03-13 14:31:12'),
(21, '2N0LA796349004BLYJ52', '32477253', '0000:00:00:00', '2024-04-02', '2024-04-02 06:00:23'),
(22, '35PJ49RF90S3A2576Z7Y', '32477253', '0000:00:00:00', '2024-04-07', '2024-04-07 09:10:20'),
(23, 'DKS28147I3PD402X02I6', '32477253', '0000:00:00:00', '2024-05-15', '2024-05-15 06:57:05'),
(24, 'L9192QZO838OFFJU76M4', '32477253', '0000:00:00:00', '2024-06-13', '2024-06-13 17:20:17'),
(25, 'K5DCI3FT5KVI9V2BN6YF', '89025565', '0000:00:00:00', NULL, '2024-06-18 15:48:59'),
(26, '553BFT94Q87KE3RN8R4O', '32477253', '0000:00:00:00', NULL, '2024-06-18 15:49:12'),
(27, '3CC2899CW4S89G6J02P9', '32477253', '0000:00:00:00', NULL, '2024-06-18 15:49:13'),
(28, 'M32ICFMWFQPZMB3HVF8Y', '89025565', '0000:00:00:00', NULL, '2024-06-18 16:11:57'),
(29, 'VMY2Z9YH6HG7K4L3UK96', '89025565', '0000:00:00:00', NULL, '2024-06-18 16:11:58'),
(30, 'C011ZT37N2B7N344M19A', '89025565', '0000:00:00:00', NULL, '2024-06-18 16:11:58'),
(31, 'XIG72Y1H0EA2CF66M2AM', '89025565', '0000:00:00:00', NULL, '2024-06-18 16:11:58'),
(32, '36IMZA499R00T8GY8V05', '89025565', '0000:00:00:00', NULL, '2024-06-18 16:12:41'),
(33, '128427L14SM53A98W015', '58619715', '0000:00:00:00', NULL, '2024-06-18 16:15:40'),
(34, '4UH62BOFD0J4JO55J9CB', '89856304', '0000:00:00:00', NULL, '2024-06-18 16:15:56'),
(35, '6V5L7K521RM10676FH2D', '82527666', '0000:00:00:00', NULL, '2024-06-18 16:16:51'),
(36, '977UK8LF8E1TJHSDH9Q4', '89191240', '0000:00:00:00', '2024-06-18', '2024-06-18 16:18:31'),
(37, '193BYOSQ328LAU808ZZ3', '79828532', '0000:00:00:00', NULL, '2024-06-18 16:18:20'),
(38, 'X79M45MWVEYOI2TV6CW5', '78178396', '0000:00:00:00', NULL, '2024-06-18 16:19:02'),
(39, 'T1QL908459NT1316W3R0', '44594429', '0000:00:00:00', NULL, '2024-06-18 16:19:08'),
(40, '5SOP0QF7Z6CTV8PIBO40', '15985076', '0000:00:00:00', '2024-06-18', '2024-06-18 16:21:57'),
(41, '4BI733L4Q9998O2EB559', '71640932', '0000:00:00:00', '2024-06-18', '2024-06-18 16:22:40'),
(42, 'O454TD0D4H4L9YOR9JV6', '12738075', '0000:00:00:00', '2024-06-18', '2024-06-18 16:23:10'),
(43, 'K2Q96FRK6R106NRZWG38', '86133872', '0000:00:00:00', '2024-06-18', '2024-06-18 16:23:47'),
(44, 'B76F06BOR41946222865', '71206267', '0000:00:00:00', '2024-06-18', '2024-06-18 16:23:58'),
(45, 'C7HU8L0TP37WX02I2484', '47060798', '0000:00:00:00', '2024-06-18', '2024-06-18 16:24:14'),
(46, 'C3PRO1VY5NT3Q064DOM2', '86561088', '0000:00:00:00', '2024-06-18', '2024-06-18 16:26:57'),
(47, 'ZRLLF7875206440PJ1Y8', '39545634', '0000:00:00:00', '2024-06-18', '2024-06-18 16:29:34'),
(48, '00O84Y4JWI120RPYBK6W', '88477429', '0000:00:00:00', '2024-06-18', '2024-06-18 16:41:08'),
(49, '374E2640L2U44RJP59WB', '12738075', '0000:00:00:00', '2024-06-19', '2024-06-19 16:06:54'),
(50, 'O6G0TJ97923QQ51W60RS', '88477429', '0000:00:00:00', '2024-06-19', '2024-06-19 16:07:13'),
(51, 'Y1F6E93517YG5TW3KULV', '88477429', '0000:00:00:00', '2024-06-19', '2024-06-19 16:17:44'),
(52, '9PK8CO6O89IROQX8AOR2', '88477429', '0000:00:00:00', '2024-06-22', '2024-06-22 12:31:50'),
(53, '08E6YPGBEE6U5EBQBQ35', '88477429', '0000:00:00:00', '2024-06-23', '2024-06-23 07:27:25'),
(54, '7426X7XOJ2Y57GZ8QH2G', '88477429', '0000:00:00:00', '2024-06-28', '2024-06-28 12:40:20'),
(55, 'LX0WS2B075HRF8Q8S40Y', '88477429', '0000:00:00:00', '2024-06-28', '2024-06-28 12:43:32'),
(56, '9IN618Z49NKLZTI4138Y', '88477429', '0000:00:00:00', '2024-06-30', '2024-06-30 08:47:51'),
(57, '92VD9O55OI5V537J40ZP', '88477429', '0000:00:00:00', '2024-07-01', '2024-07-01 16:09:17');

-- --------------------------------------------------------

--
-- Table structure for table `mycart`
--

CREATE TABLE `mycart` (
  `s_no` int(11) NOT NULL,
  `cart_id` int(11) DEFAULT NULL,
  `cid` varchar(25) DEFAULT NULL,
  `p_id` varchar(25) DEFAULT NULL,
  `quantity` int(11) DEFAULT NULL,
  `cart_edit_flag` tinyint(1) DEFAULT NULL,
  `_date` date DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `mycart`
--

INSERT INTO `mycart` (`s_no`, `cart_id`, `cid`, `p_id`, `quantity`, `cart_edit_flag`, `_date`, `created_at`, `updated_at`) VALUES
(5, 93769, '88477429', '06416N', 3, 0, '2024-06-19', '2024-06-28 12:45:09', '2024-06-22 16:05:41'),
(6, 11244, '88477429', '1V9ZJG', 4, 0, '2024-06-19', '2024-06-28 12:45:09', '2024-06-19 19:38:29'),
(7, 84614, '88477429', '6GCHRX', 1, 0, '2024-06-19', '2024-06-30 08:50:32', '2024-06-30 10:50:32'),
(8, 31245, '88477429', 'OQ3486', 3, 0, '2024-06-22', '2024-06-28 12:45:09', '2024-06-22 16:40:18'),
(9, 53128, '88477429', '7L38G0', 2, 0, '2024-06-22', '2024-06-28 12:45:09', '2024-06-22 16:40:22'),
(10, 14045, '88477429', '0961XK', 3, 0, '2024-06-22', '2024-06-28 12:45:09', '2024-06-22 16:40:26'),
(11, 12584, '8847742', '9SC342', 2, 1, '2024-06-22', '2024-06-22 15:59:15', '2024-06-22 16:40:51'),
(12, 22953, '88477429', 'WW1877', 2, 0, '2024-06-22', '2024-06-28 12:45:09', '2024-06-22 16:41:02'),
(13, 85753, '88477429', 'HXO1R7', 10, 0, '2024-06-22', '2024-06-23 07:35:10', '2024-06-23 09:34:52'),
(14, 33440, '88477429', 'Y4157U', 2, 0, '2024-06-22', '2024-06-28 12:45:09', '2024-06-22 16:41:04'),
(16, 42029, '88477429', '6GCHRX', 1, 0, '2024-06-30', '2024-06-30 10:53:00', '2024-06-30 10:50:32'),
(17, 42643, '88477429', 'VW5251', 1, 0, '2024-06-30', '2024-06-30 10:53:00', '2024-06-30 10:50:41'),
(18, 44811, '88477429', '98V3F3', 3, 0, '2024-07-01', '2024-07-01 18:06:54', '2024-07-01 20:05:06');

-- --------------------------------------------------------

--
-- Table structure for table `myfav`
--

CREATE TABLE `myfav` (
  `sno` int(11) NOT NULL,
  `p_id` varchar(25) DEFAULT NULL,
  `cid` varchar(25) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `myfav`
--

INSERT INTO `myfav` (`sno`, `p_id`, `cid`, `created_at`, `updated_at`) VALUES
(6, '06416N', '88477429', '2024-06-19 17:03:16', '2024-06-19 19:03:16');

-- --------------------------------------------------------

--
-- Table structure for table `myorder`
--

CREATE TABLE `myorder` (
  `s_no` int(11) NOT NULL,
  `order_id` varchar(15) DEFAULT NULL,
  `cid` varchar(25) DEFAULT NULL,
  `product_list` text DEFAULT NULL,
  `payment_proof` text DEFAULT NULL,
  `cart_date` date DEFAULT NULL,
  `cart_status` varchar(50) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `myorder`
--

INSERT INTO `myorder` (`s_no`, `order_id`, `cid`, `product_list`, `payment_proof`, `cart_date`, `cart_status`, `created_at`) VALUES
(1, '3JE08PORSY', '88477429', '[{\"p_id\":\"06416N\",\"p_name\":\"Gymno Calcium \",\"qnty\":3},{\"p_id\":\"1V9ZJG\",\"p_name\":\"Euphorbia\",\"qnty\":4},{\"p_id\":\"6GCHRX\",\"p_name\":\"mexican mint\",\"qnty\":2},{\"p_id\":\"OQ3486\",\"p_name\":\"nurserylive-tulsi-plants-category-image\",\"qnty\":3},{\"p_id\":\"7L38G0\",\"p_name\":\"betel leaf (magai paan)\",\"qnty\":2},{\"p_id\":\"0961XK\",\"p_name\":\"naatu pirandai\",\"qnty\":3},{\"p_id\":\"WW1877\",\"p_name\":\"enjoy pothos\",\"qnty\":2},{\"p_id\":\"Y4157U\",\"p_name\":\"Callisia fragrans\",\"qnty\":2}]', 'V28FW4N31R.csv', '2024-06-28', 'Pending', '2024-06-28 12:45:09'),
(2, 'RZH052OR56', '88477429', '[{\"p_id\":\"VW5251\",\"p_name\":\"wandering jew\",\"qnty\":1,\"weight\":400},{\"p_id\":\"6GCHRX\",\"p_name\":\"mexican mint\",\"qnty\":1,\"weight\":400}]', 'tmp_name', '2024-06-30', 'Pending', '2024-06-30 10:52:38'),
(3, 'YP783G93YX', '88477429', '[{\"p_id\":\"VW5251\",\"p_name\":\"wandering jew\",\"qnty\":1,\"weight\":400},{\"p_id\":\"6GCHRX\",\"p_name\":\"mexican mint\",\"qnty\":1,\"weight\":400}]', 'tmp_name', '2024-06-30', 'Confirmed', '2024-06-30 11:01:43'),
(4, '4CJ3Q99A4D', '88477429', '[{\"p_id\":\"98V3F3\",\"p_name\":\"mexican mint Varigated\",\"qnty\":3,\"weight\":200,\"price\":50,\"offer\":0}]', 'tmp_name', '2024-07-01', 'Pending', '2024-07-01 18:06:54');

-- --------------------------------------------------------

--
-- Table structure for table `payment_info`
--

CREATE TABLE `payment_info` (
  `sno` bigint(20) NOT NULL,
  `cid` varchar(25) DEFAULT NULL,
  `order_id` varchar(15) DEFAULT NULL,
  `courier_id` varchar(5) DEFAULT NULL,
  `courier` varchar(30) DEFAULT NULL,
  `product_price` bigint(20) DEFAULT NULL,
  `saving_price` int(11) DEFAULT NULL,
  `online_payment_price` int(11) DEFAULT NULL,
  `payment` int(11) DEFAULT NULL,
  `payment_id` varchar(40) DEFAULT NULL,
  `payment_signature` varchar(100) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `payment_info`
--

INSERT INTO `payment_info` (`sno`, `cid`, `order_id`, `courier_id`, `courier`, `product_price`, `saving_price`, `online_payment_price`, `payment`, `payment_id`, `payment_signature`, `created_at`) VALUES
(1, '88477429', '667eadafb9b0b', 'pf', 'Professional Couriers', 150, 0, 100, 10, 'pay_OSBN9fO62yZcC1', '2f8e9b2cc545ae6c2a872604be8dc2f3dd48d488840823696939e0afe2188d78', '2024-07-01 17:18:12');

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `s_no` int(11) NOT NULL,
  `cate_id` varchar(15) DEFAULT NULL,
  `p_id` varchar(25) DEFAULT NULL,
  `is_subitem` tinyint(4) DEFAULT 0,
  `subset_id` varchar(25) NOT NULL,
  `p_img` text DEFAULT NULL,
  `p_name` varchar(50) DEFAULT NULL,
  `p_desc` text DEFAULT NULL,
  `price` int(11) DEFAULT NULL,
  `offer` int(11) DEFAULT NULL,
  `unit` varchar(25) DEFAULT NULL,
  `net_weight` int(11) DEFAULT 0,
  `stock` int(11) DEFAULT NULL,
  `tags` text DEFAULT NULL,
  `p_status` tinyint(1) DEFAULT 1,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `update_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`s_no`, `cate_id`, `p_id`, `is_subitem`, `subset_id`, `p_img`, `p_name`, `p_desc`, `price`, `offer`, `unit`, `net_weight`, `stock`, `tags`, `p_status`, `created_at`, `update_at`) VALUES
(8, '7423P5MX', 'O0LCB6', 0, '', 'JB5ZOZ6JEM.jpeg', 'Cotton Candy Cactus', 'Its a good air purifire', 150, 0, 'Piece', 400, 20, 'Good', 1, '2024-06-30 09:05:04', NULL),
(9, '7423P5MX', 'M357VP', 0, '', '2Q82E820GP.jpeg', 'Brain cactus', '.', 250, 0, 'Piece', 500, 20, 'Good', 1, '2024-06-30 09:05:04', NULL),
(10, '7423P5MX', 'S18H48', 0, '', '768638D199.jpeg', 'Monkey Tail', '.', 350, 0, 'Piece', 300, 10, 'Good ', 1, '2024-06-30 09:05:04', NULL),
(11, '7423P5MX', 'MU632J', 0, '', '2J2G03JXDW.jpeg', 'Stenno Cactus', '.', 150, 0, 'Piece', 500, 20, 'Good', 1, '2024-06-30 09:05:04', NULL),
(12, '7423P5MX', '2FF710', 0, '', 'KQ8N19U515.jpeg', 'Rebutia Red Flower', ',', 150, 0, 'Piece', 400, 20, 'Good', 1, '2024-06-30 09:05:04', NULL),
(13, '7423P5MX', '1V9ZJG', 0, '', '00FXV06RQG.jpeg', 'Euphorbia', '.', 150, 0, 'Piece', 200, 8, 'Good', 1, '2024-06-30 09:05:04', NULL),
(14, '7423P5MX', '81ZYF7', 0, '', '50JC0Y748B.jpeg', 'Huernia Green Flowers', '.', 150, 0, 'Piece', 500, 20, 'Good', 1, '2024-06-30 09:05:04', NULL),
(15, '7423P5MX', 'X434E6', 0, '', '1671SKIBOX.jpeg', 'Bunny ear White', '.', 150, 0, 'Piece', 200, 20, 'Good', 1, '2024-06-30 09:05:04', NULL),
(16, '7423P5MX', 'N2LCND', 0, '', 'X75PLMH19E.jpeg', 'Huernia Red ', '.', 150, 0, 'Piece', 200, 20, 'Good', 1, '2024-06-30 09:05:04', NULL),
(17, '7423P5MX', '85EC0O', 0, '', '7F8B19961J.jpeg', 'Bunny Ear Yellow', '.', 150, 0, 'Per Piece', 200, 20, 'Good', 1, '2024-06-30 09:05:04', NULL),
(18, '7423P5MX', '6SH18L', 0, '', '5SZI92Y038.jpeg', 'Cactus', '.', 150, 0, 'Per Piece', 500, 20, 'Good', 1, '2024-06-30 09:05:04', NULL),
(19, '7423P5MX', '5ER8R9', 0, '', '87ZMOAT7P3.jpeg', 'Varigated lactae ', '.', 150, 0, 'Piece', 100, 20, 'Good', 1, '2024-06-30 09:05:04', NULL),
(20, '7423P5MX', '4KK8G7', 0, '', 'P6279PSTC2.jpeg', 'Gymnocalcium Pink', '.', 150, 0, 'Piece', 500, 20, 'Good', 1, '2024-06-30 09:05:04', NULL),
(21, '7423P5MX', 'W85601', 0, '', 'D3383MU59U.jpeg', 'Copper King', '.', 150, 0, 'Per Piece', 300, 20, 'Good', 1, '2024-06-30 09:05:04', NULL),
(22, '7423P5MX', 'YYN90I', 0, '', 'YPMM9VT9OQ.jpeg', 'Drumstick Cactus', '.', 150, 0, 'Per Piece', 400, 20, 'Good', 1, '2024-06-30 09:05:26', NULL),
(23, '7423P5MX', '466MIJ', 0, '', 'Y3S57L9I9Y.jpeg', 'Stapelia Giganta (Ballon Flower)', '.', 150, 0, 'Per Piece', 500, 20, 'Good', 1, '2024-06-30 09:05:26', NULL),
(24, '7423P5MX', '555A0M', 0, '', '8GRL5B596L.jpeg', 'Bunny Ear Red', '.', 150, 0, 'Per Piece', 300, 20, 'Good', 1, '2024-06-30 09:05:04', NULL),
(25, '7423P5MX', '7KAN26', 0, '', 'A054U45J29.jpeg', 'Huernia Brown Flower', '.', 150, 0, 'Per Piece', 100, 20, 'Good', 1, '2024-06-30 09:05:04', NULL),
(26, '7423P5MX', 'AM84S6', 0, '', 'Q5L45Z9YIR.jpeg', 'Stapelia Giganta White flower', '.', 150, 0, 'Per Piece', 100, 20, 'Good', 1, '2024-06-30 09:05:26', NULL),
(27, '7423P5MX', 'R0SP68', 0, '', 'CFF30R2MNP.jpeg', 'Peanut Cactus', '.', 150, 0, 'Per Piece', 400, 20, 'Good', 1, '2024-06-30 09:05:04', NULL),
(28, '7423P5MX', '06416N', 0, '', 'LR8KLSS917.jpeg', 'Gymno Calcium ', '.', 150, 0, 'Per Piece', 200, 11, 'Good', 1, '2024-06-30 09:05:04', NULL),
(29, 'V8NACB03', 'PX6QNH', 0, '', 'C1R0G772B6.jpg', 'Aloe-green-Blush', 'good', 150, 0, 'piece', 100, 10, 'Aloe-green-Blush', 1, '2024-06-30 09:05:04', NULL),
(30, 'V8NACB03', 'T2R522', 0, '', 'G72WHBD6D0.jpg', 'Aloe-Pink-Blush', 'good', 150, 0, 'piece', 400, 10, 'Aloe-Pink-Blush', 1, '2024-06-30 09:05:04', NULL),
(31, 'V8NACB03', 'H667FH', 0, '', '1A21828615.jpg', 'dark green Haworthia', 'good', 50, 0, 'piece', 200, 10, ' Haworthia', 1, '2024-06-30 09:05:26', NULL),
(32, 'V8NACB03', '6D3NAI', 0, '', 'K59OG20580.jpg', 'Gasteria Maculata', 'good', 150, 0, 'piece', 100, 10, 'Gasteria Maculata', 1, '2024-06-30 09:05:26', NULL),
(33, 'V8NACB03', 'PK7P47', 0, '', '5IG37LR60N.jpg', 'Gasteria maculata123', 'good', 150, 0, 'piece', 300, 10, 'Gasteria maculata123', 1, '2024-06-30 09:05:04', NULL),
(34, 'V8NACB03', '70H6EI', 0, '', 'NT5N4LGH65.jpg', 'Haworthia Facsciata', 'good', 60, 0, 'piece', 100, 10, 'Haworthia Facsciata', 1, '2024-06-30 09:05:26', NULL),
(35, 'V8NACB03', 'NV50OV', 0, '', '1V88G75NP3.jpg', 'Haworthia Reinwardtii (tower)', 'good', 120, 0, 'piece', 500, 10, 'Haworthia Reinwardtii (tower)', 1, '2024-06-30 09:05:04', NULL),
(36, 'V8NACB03', 'NXPM14', 0, '', 'F374982OX7.jpg', 'Haworthia- star fish  dark green', 'good', 170, 0, 'piece', 100, 10, 'Haworthia- star fish  dark green', 1, '2024-06-30 09:05:04', NULL),
(37, 'V8NACB03', 'NIXRLL', 0, '', 'YK08X17R58.jpg', 'Haworthia- star fish', 'good', 150, 0, 'piece', 100, 10, 'Haworthia- star fish', 1, '2024-06-30 09:05:04', NULL),
(38, 'V8NACB03', 'C1AY46', 0, '', '5WGGGB8NGO.jpeg', 'haworthia', 'good', 200, 0, 'piece', 200, 10, 'haworthia', 1, '2024-06-30 09:05:04', NULL),
(39, 'V8NACB03', 'UZ014F', 0, '', 'EV75766203.jpg', 'haworthialimifoliaspiralis_6', 'good', 80, 0, 'piece', 400, 10, 'haworthialimifoliaspiralis_6', 1, '2024-06-30 09:05:04', NULL),
(40, 'V8NACB03', 'V2GQC5', 0, '', '87A3574U95.jpg', 'Haworthia-snow drops', 'good', 120, 0, 'piece', 400, 10, 'Haworthia-snow drops', 1, '2024-06-30 09:05:04', NULL),
(41, 'V8NACB03', 'ZN9K24', 0, '', '6E089T2E25.jpg', 'haworthia', 'good', 50, 0, 'piece', 500, 10, 'Haworthia-', 1, '2024-06-30 09:05:04', NULL),
(42, 'V8NACB03', '43E8RW', 0, '', 'KTHPTOZS7Q.jpg', 'king Haworthia-', 'good', 130, 0, 'piece', 100, 10, 'king Haworthia-', 1, '2024-06-30 09:05:04', NULL),
(43, 'V8NACB03', 'QM850T', 0, '', 'VW5AWT0CTW.jpeg', 'pencil aloe Haworthia-', 'good', 100, 0, 'piece', 500, 10, 'pencil alo Haworthia-', 1, '2024-06-30 09:05:04', NULL),
(44, 'V8NACB03', '0Y6LHE', 0, '', '2TS3F24PCL.jpeg', 'alovera dwarf (orange flowers) Haworthia-', 'good', 50, 0, 'piece', 500, 10, 'alovera dwarf (orange flowers) Haworthia-', 1, '2024-06-30 09:05:04', NULL),
(45, 'V8NACB03', '3WQHM6', 0, '', '431GC65D08.jpeg', 'dark green alo Haworthia-', 'good', 50, 0, 'piece', 300, 10, 'dark green alo Haworthia-', 1, '2024-06-30 09:05:26', NULL),
(46, 'V8NACB03', 'PK3JA5', 0, '', '5DM1192KLD.jpeg', 'alovera country side', 'good', 30, 0, 'piece', 200, 10, 'alovera country side', 1, '2024-06-30 09:05:26', NULL),
(47, 'G47T0H02', '7L38G0', 0, '', 'U49746Q8H6.jpg', 'betel leaf (magai paan)', 'GOOD', 30, 0, 'piece', 400, 4, 'betel leaf (magai paan)', 1, '2024-06-30 09:05:26', NULL),
(48, 'G47T0H02', 'O5X968', 0, '', 'M8TA0G0K3W.jpg', 'insulin-plant-costus-igneus-plant', 'good', 50, 0, 'piece', 300, 10, 'insulin-plant-costus-igneus-plant', 1, '2024-06-30 09:05:04', NULL),
(49, 'G47T0H02', 'JR2T6M', 0, '', '6LVHQQW7N9.jpg', 'insulin-plant-costus-igneus-plant', 'good', 30, 0, 'piece', 300, 10, 'insulin-plant-costus-igneus-plant', 1, '2024-06-30 09:05:04', NULL),
(50, 'G47T0H02', '0961XK', 0, '', 'UWBQ4CFW95.jpg', 'naatu pirandai', 'good', 30, 0, 'piece', 300, 1, 'naatu pirandai', 1, '2024-06-30 09:05:26', NULL),
(51, 'G47T0H02', 'OQ3486', 0, '', '542QH7PGOM.jpg', 'nurserylive-tulsi-plants-category-image', 'good', 30, 0, 'piece', 200, 1, 'nurserylive-tulsi-plants-category-image', 1, '2024-06-30 09:05:04', NULL),
(52, 'G47T0H02', '1NF9L3', 0, '', '79V5R332XQ.jpg', 'pennywort', 'good', 50, 0, 'piece', 400, 10, 'pennywort', 1, '2024-06-30 09:05:04', NULL),
(53, 'G47T0H02', '8F6HN3', 0, '', 'M0XKDY0EHH.jpg', 'Rosemary-New-', 'good', 50, 0, 'piece', 400, 10, 'Rosemary-New-', 1, '2024-06-30 09:05:04', NULL),
(54, 'G47T0H02', 'J8LZ02', 0, '', 'W77ZY0S834.jpg', 'tulsikrishna', 'good', 30, 0, 'piece', 300, 10, 'tulsikrishna', 1, '2024-06-30 09:05:04', NULL),
(55, 'G47T0H02', 'Y4DLD9', 0, '', '2U7DKB5X56.jpeg', 'muppirandai', 'good', 50, 0, 'piece', 300, 10, 'muppirandai', 1, '2024-06-30 09:05:04', NULL),
(56, 'G47T0H02', '8J5UBB', 0, '', '2S0O7W0Q5T.jpeg', 'muppirandai', 'good', 50, 0, 'piece', 500, 10, 'muppirandai', 1, '2024-06-30 09:05:04', NULL),
(57, 'G47T0H02', '4HF030', 0, '', 'W32L0RAA72.jpg', 'ilai pirandai123', 'good', 50, 0, 'piece', 100, 10, 'ilai pirandai123', 1, '2024-06-30 09:05:04', NULL),
(58, 'JLABA128', 'Y4157U', 0, '', 'KL5C8472IM.jpg', 'Callisia fragrans', 'good', 50, 0, 'piece', 300, 4, 'Callisia fragrans', 1, '2024-06-30 09:05:26', NULL),
(59, 'JLABA128', 'HXO1R7', 0, '', '9FXJU019VI.jpeg', 'Callisia Repens(green)', 'good', 40, 0, 'piece', 300, 5, 'Callisia Repens(green)', 1, '2024-06-30 09:05:04', NULL),
(60, 'JLABA128', 'MC5KBQ', 0, '', '2JA82PSZ6B.jpg', 'Callisia Repens(purple)', 'good', 40, 0, 'piece', 100, 10, 'Callisia Repens(purple)', 1, '2024-06-30 09:05:04', NULL),
(61, 'JLABA128', 'WW1877', 0, '', 'AAU50DSW1A.jpg', 'enjoy pothos', 'good', 80, 0, 'piece', 500, 4, 'enjoy pothos', 1, '2024-06-30 09:05:04', NULL),
(62, 'JLABA128', '9SC342', 0, '', 'YWE84CE6ME.jpg', 'Golden Pothos Epipremnum', 'good', 80, 0, 'piece', 100, 10, 'Golden Pothos Epipremnum', 1, '2024-06-30 09:05:04', NULL),
(63, 'JLABA128', 'K52C6R', 0, '', '231R16SK1Z.jpg', 'Large-Nanouk-683x1024', 'good', 120, 0, 'piece', 300, 10, 'Large-Nanouk-683x1024', 1, '2024-06-30 09:05:04', NULL),
(64, 'JLABA128', '4565RH', 0, '', 'GY1F48ZNC5.jpg', 'manjula pothos', 'good', 80, 0, 'piece', 400, 10, 'manjula pothos', 1, '2024-06-30 09:05:04', NULL),
(65, 'JLABA128', '1PK31O', 0, '', '5408ST09O6.jpg', 'normal pothos', 'good', 40, 0, 'piece', 100, 10, 'normal pothos', 1, '2024-06-30 09:05:04', NULL),
(66, 'JLABA128', '0N7R95', 0, '', '81976WLEQ0.jpeg', 'purple-heart-plants-', 'good', 40, 0, 'piece', 500, 10, 'purple-heart-plants-', 1, '2024-06-30 09:05:04', NULL),
(67, 'JLABA128', 'FZ7WVX', 0, '', 'L53R0M8UK1.jpg', 'red-alternanthera-basket', 'good', 40, 0, 'piece', 450, 10, 'red-alternanthera-basket', 1, '2024-06-30 09:05:55', NULL),
(68, 'JLABA128', 'CL930Y', 0, '', '8M34951N7Z.jpeg', 'Rheo', 'good', 60, 0, 'piece', 400, 10, 'Rheo', 1, '2024-06-30 09:05:04', NULL),
(69, 'JLABA128', '91VC0J', 0, '', '8L52T44B42.jpeg', 'Rheo12', 'good', 40, 0, 'piece', 300, 10, 'Rheo12', 1, '2024-06-30 09:05:04', NULL),
(70, 'JLABA128', '52Z83R', 0, '', 'ET5KXWXL59.jpeg', 'String of hearts', 'good', 120, 0, 'piece', 400, 10, 'String of hearts', 1, '2024-06-30 09:05:04', NULL),
(71, 'JLABA128', '2C56PR', 0, '', 'XRTU90K46F.jpeg', 'String of hearts', 'good', 120, 0, 'piece', 400, 10, 'String of hearts', 1, '2024-06-30 09:05:04', NULL),
(72, 'JLABA128', 'T4727U', 0, '', '2Y01E40749.jpeg', 'String of hearts', 'good', 120, 0, 'piece', 200, 10, 'String of hearts', 1, '2024-06-30 09:05:04', NULL),
(73, 'JLABA128', 'QE9NKS', 0, '', '88V9P7AVJ0.jpeg', 'String of hearts', 'good', 120, 0, 'piece', 500, 10, 'String of hearts', 1, '2024-06-30 09:05:04', NULL),
(74, 'JLABA128', '18ILSB', 0, '', 'X4JB5WG300.jpeg', 'String of hearts', 'good', 120, 0, 'piece', 300, 10, 'String of hearts', 1, '2024-06-30 09:05:04', NULL),
(75, 'JLABA128', 'H4HXJ8', 0, '', '2D0R623PS4.jpeg', 'tangled heart', 'good', 50, 0, 'piece', 400, 10, 'tangled heart', 1, '2024-06-30 09:05:26', NULL),
(76, 'JLABA128', '9W8W0B', 0, '', 'LF5U9B175Z.jpeg', 'Variegated String of Pearls', 'good', 130, 0, 'piece', 300, 10, 'Variegated String of Pearls', 1, '2024-06-30 09:05:04', NULL),
(77, 'JLABA128', 'W884ZP', 0, '', 'W60PST0D1U.jpeg', 'Variegated String of Pearls', 'good', 130, 0, 'piece', 200, 10, 'Variegated String of Pearls', 1, '2024-06-30 09:05:04', NULL),
(78, 'JLABA128', 'TNOCUC', 0, '', 'GZ9F1775D3.jpeg', 'Varigated Rheo', 'good', 50, 0, 'piece', 500, 10, 'Varigated Rheo', 1, '2024-06-30 09:05:26', NULL),
(79, 'JLABA128', '9NH289', 0, '', 'H4621VT74A.jpeg', 'Varigated String of hearts', 'good', 130, 0, 'piece', 400, 10, 'Varigated String of hearts', 1, '2024-06-30 09:05:04', NULL),
(80, 'JLABA128', '2I246F', 0, '', '838K617J5P.jpg', 'wandering jew white', 'good', 100, 0, 'piece', 300, 10, 'wandering jew white', 1, '2024-06-30 09:05:04', NULL),
(81, 'JLABA128', 'VW5251', 0, '', 'FII68Y86FD.jpg', 'wandering jew', 'good', 40, 0, 'piece', 400, 6, 'wandering jew', 1, '2024-06-30 10:53:00', NULL),
(82, 'G47T0H02', '6GCHRX', 0, '', '4556X99RAU.jpeg', 'mexican mint', 'good', 30, 0, 'piece', 400, 0, 'mexican mint', 1, '2024-06-30 10:53:00', NULL),
(83, 'JLABA128', '98V3F3', 0, '', 'UH3L3D7U1P.jpeg', 'mexican mint Varigated', 'good', 50, 0, 'piece', 200, 7, 'mexican mintVarigated ', 1, '2024-07-01 18:06:54', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `product_category`
--

CREATE TABLE `product_category` (
  `cate_sno` int(11) NOT NULL,
  `cate_id` varchar(10) DEFAULT NULL,
  `cate_name` text DEFAULT NULL,
  `cate_img` varchar(15) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `product_category`
--

INSERT INTO `product_category` (`cate_sno`, `cate_id`, `cate_name`, `cate_img`, `created_at`) VALUES
(1, '7423P5MX', 'Cactus', 'EF5X73NX1P.jpg', '2023-12-19 16:38:50'),
(3, 'V8NACB03', 'Haworthia & Aloevera', 'K36S08P6V1.jpg', '2024-04-07 09:35:09'),
(4, 'G47T0H02', 'Herbal Plant', 'HJRM16Y5HO.jpg', '2024-04-07 10:19:30'),
(5, 'JLABA128', 'Hanging plants', '56GB1F52SC.jpg', '2024-04-07 11:02:31');

-- --------------------------------------------------------

--
-- Table structure for table `review`
--

CREATE TABLE `review` (
  `sno` int(11) NOT NULL,
  `cid` varchar(25) DEFAULT NULL,
  `p_id` varchar(25) DEFAULT NULL,
  `rating` int(11) DEFAULT NULL,
  `review` text DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `review`
--

INSERT INTO `review` (`sno`, `cid`, `p_id`, `rating`, `review`, `created_at`) VALUES
(1, '88477429', 'H667FH', 3, 'mani', '2024-06-19 17:51:37'),
(2, '88477429', 'H667FH', 3, 'Lorem ipsum dolor, sit amet consectetur adipisicing elit. Non quam laborum magnam neque tempora magni totam, molestiae possimus excepturi optio unde, a minus dicta. Quibusdam reprehenderit voluptas voluptatum eveniet beatae.', '2024-06-19 17:57:29');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `cc_request`
--
ALTER TABLE `cc_request`
  ADD PRIMARY KEY (`cc_req_id`);

--
-- Indexes for table `customers`
--
ALTER TABLE `customers`
  ADD PRIMARY KEY (`s_no`);

--
-- Indexes for table `cus_log`
--
ALTER TABLE `cus_log`
  ADD PRIMARY KEY (`sno`);

--
-- Indexes for table `mycart`
--
ALTER TABLE `mycart`
  ADD PRIMARY KEY (`s_no`);

--
-- Indexes for table `myfav`
--
ALTER TABLE `myfav`
  ADD PRIMARY KEY (`sno`);

--
-- Indexes for table `myorder`
--
ALTER TABLE `myorder`
  ADD PRIMARY KEY (`s_no`);

--
-- Indexes for table `payment_info`
--
ALTER TABLE `payment_info`
  ADD PRIMARY KEY (`sno`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`s_no`);

--
-- Indexes for table `product_category`
--
ALTER TABLE `product_category`
  ADD PRIMARY KEY (`cate_sno`);

--
-- Indexes for table `review`
--
ALTER TABLE `review`
  ADD PRIMARY KEY (`sno`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `cc_request`
--
ALTER TABLE `cc_request`
  MODIFY `cc_req_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `customers`
--
ALTER TABLE `customers`
  MODIFY `s_no` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `cus_log`
--
ALTER TABLE `cus_log`
  MODIFY `sno` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=58;

--
-- AUTO_INCREMENT for table `mycart`
--
ALTER TABLE `mycart`
  MODIFY `s_no` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `myfav`
--
ALTER TABLE `myfav`
  MODIFY `sno` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `myorder`
--
ALTER TABLE `myorder`
  MODIFY `s_no` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `payment_info`
--
ALTER TABLE `payment_info`
  MODIFY `sno` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `s_no` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=85;

--
-- AUTO_INCREMENT for table `product_category`
--
ALTER TABLE `product_category`
  MODIFY `cate_sno` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `review`
--
ALTER TABLE `review`
  MODIFY `sno` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
