-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Jun 22, 2024 at 06:36 PM
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
(3, '88477429', '500', 'a:2:{i:0;a:3:{s:4:\"p_id\";s:6:\"06416N\";s:6:\"p_name\";s:14:\"Gymno Calcium \";s:4:\"qnty\";i:2;}i:1;a:3:{s:4:\"p_id\";s:6:\"1V9ZJG\";s:6:\"p_name\";s:9:\"Euphorbia\";s:4:\"qnty\";i:2;}}', 1, '2024-06-19', '2024-06-19 17:37:57');

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
(52, '9PK8CO6O89IROQX8AOR2', '88477429', '0000:00:00:00', '2024-06-22', '2024-06-22 12:31:50');

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
(5, 93769, '88477429', '06416N', 3, 1, '2024-06-19', '2024-06-22 14:05:41', '2024-06-22 16:05:41'),
(6, 11244, '88477429', '1V9ZJG', 4, 1, '2024-06-19', '2024-06-19 17:38:29', '2024-06-19 19:38:29'),
(7, 84614, '88477429', '6GCHRX', 2, 1, '2024-06-19', '2024-06-22 12:32:02', '2024-06-22 14:32:02'),
(8, 31245, '88477429', 'OQ3486', 3, 1, '2024-06-22', '2024-06-22 14:40:18', '2024-06-22 16:40:18'),
(9, 53128, '88477429', '7L38G0', 2, 1, '2024-06-22', '2024-06-22 14:40:22', '2024-06-22 16:40:22'),
(10, 14045, '88477429', '0961XK', 3, 1, '2024-06-22', '2024-06-22 14:40:26', '2024-06-22 16:40:26'),
(11, 12584, '8847742', '9SC342', 2, 1, '2024-06-22', '2024-06-22 15:59:15', '2024-06-22 16:40:51'),
(12, 22953, '88477429', 'WW1877', 2, 1, '2024-06-22', '2024-06-22 14:41:02', '2024-06-22 16:41:02'),
(13, 85753, '88477429', 'HXO1R7', 2, 0, '2024-06-22', '2024-06-22 15:17:41', '2024-06-22 16:41:03'),
(14, 33440, '88477429', 'Y4157U', 2, 1, '2024-06-22', '2024-06-22 14:41:04', '2024-06-22 16:41:04'),
(15, 55515, '88477429', 'HXO1R7', 9, 1, '2024-06-22', '2024-06-22 15:18:28', '2024-06-22 17:18:28');

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

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `s_no` int(11) NOT NULL,
  `p_id` varchar(25) DEFAULT NULL,
  `cate_id` varchar(15) DEFAULT NULL,
  `p_img` text DEFAULT NULL,
  `p_name` varchar(50) DEFAULT NULL,
  `p_desc` text DEFAULT NULL,
  `price` int(11) DEFAULT NULL,
  `offer` int(11) DEFAULT NULL,
  `unit` varchar(25) DEFAULT NULL,
  `stock` int(11) DEFAULT NULL,
  `tags` text DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `update_at` datetime DEFAULT NULL,
  `is_subitem` tinyint(4) DEFAULT 0,
  `subset_id` varchar(25) NOT NULL,
  `p_status` tinyint(1) DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`s_no`, `p_id`, `cate_id`, `p_img`, `p_name`, `p_desc`, `price`, `offer`, `unit`, `stock`, `tags`, `created_at`, `update_at`, `is_subitem`, `subset_id`, `p_status`) VALUES
(8, 'O0LCB6', '7423P5MX', 'JB5ZOZ6JEM.jpeg', 'Cotton Candy Cactus', 'Its a good air purifire', 150, 0, 'Piece', 20, 'Good', '2024-03-10 09:21:49', NULL, 0, '', 1),
(9, 'M357VP', '7423P5MX', '2Q82E820GP.jpeg', 'Brain cactus', '.', 250, 0, 'Piece', 20, 'Good', '2024-03-10 13:11:25', NULL, 0, '', 1),
(10, 'S18H48', '7423P5MX', '768638D199.jpeg', 'Monkey Tail', '.', 350, 0, 'Piece', 10, 'Good ', '2024-03-10 13:12:39', NULL, 0, '', 1),
(11, 'MU632J', '7423P5MX', '2J2G03JXDW.jpeg', 'Stenno Cactus', '.', 150, 0, 'Piece', 20, 'Good', '2024-03-10 13:14:30', NULL, 0, '', 1),
(12, '2FF710', '7423P5MX', 'KQ8N19U515.jpeg', 'Rebutia Red Flower', ',', 150, 0, 'Piece', 20, 'Good', '2024-03-10 13:15:30', NULL, 0, '', 1),
(13, '1V9ZJG', '7423P5MX', '00FXV06RQG.jpeg', 'Euphorbia', '.', 150, 0, 'Piece', 20, 'Good', '2024-03-10 13:16:13', NULL, 0, '', 1),
(14, '81ZYF7', '7423P5MX', '50JC0Y748B.jpeg', 'Huernia Green Flowers', '.', 150, 0, 'Piece', 20, 'Good', '2024-03-10 13:19:28', NULL, 0, '', 1),
(15, 'X434E6', '7423P5MX', '1671SKIBOX.jpeg', 'Bunny ear White', '.', 150, 0, 'Piece', 20, 'Good', '2024-03-10 13:24:07', NULL, 0, '', 1),
(16, 'N2LCND', '7423P5MX', 'X75PLMH19E.jpeg', 'Huernia Red ', '.', 150, 0, 'Piece', 20, 'Good', '2024-03-10 13:25:44', NULL, 0, '', 1),
(17, '85EC0O', '7423P5MX', '7F8B19961J.jpeg', 'Bunny Ear Yellow', '.', 150, 0, 'Per Piece', 20, 'Good', '2024-03-10 13:27:14', NULL, 0, '', 1),
(18, '6SH18L', '7423P5MX', '5SZI92Y038.jpeg', 'Cactus', '.', 150, 0, 'Per Piece', 20, 'Good', '2024-03-10 13:29:57', NULL, 0, '', 1),
(19, '5ER8R9', '7423P5MX', '87ZMOAT7P3.jpeg', 'Varigated lactae ', '.', 150, 0, 'Piece', 20, 'Good', '2024-03-10 13:36:36', NULL, 0, '', 1),
(20, '4KK8G7', '7423P5MX', 'P6279PSTC2.jpeg', 'Gymnocalcium Pink', '.', 150, 0, 'Piece', 20, 'Good', '2024-03-10 13:38:27', NULL, 0, '', 1),
(21, 'W85601', '7423P5MX', 'D3383MU59U.jpeg', 'Copper King', '.', 150, 0, 'Per Piece', 20, 'Good', '2024-03-10 13:39:20', NULL, 0, '', 1),
(22, 'YYN90I', '7423P5MX', 'YPMM9VT9OQ.jpeg', 'Drumstick Cactus', '.', 150, 0, 'Per Piece', 20, 'Good', '2024-03-10 13:40:26', NULL, 0, '', 1),
(23, '466MIJ', '7423P5MX', 'Y3S57L9I9Y.jpeg', 'Stapelia Giganta (Ballon Flower)', '.', 150, 0, 'Per Piece', 20, 'Good', '2024-03-10 13:49:03', NULL, 0, '', 1),
(24, '555A0M', '7423P5MX', '8GRL5B596L.jpeg', 'Bunny Ear Red', '.', 150, 0, 'Per Piece', 20, 'Good', '2024-03-10 13:50:22', NULL, 0, '', 1),
(25, '7KAN26', '7423P5MX', 'A054U45J29.jpeg', 'Huernia Brown Flower', '.', 150, 0, 'Per Piece', 20, 'Good', '2024-03-10 13:51:56', NULL, 0, '', 1),
(26, 'AM84S6', '7423P5MX', 'Q5L45Z9YIR.jpeg', 'Stapelia Giganta White flower', '.', 150, 0, 'Per Piece', 20, 'Good', '2024-03-10 13:53:09', NULL, 0, '', 1),
(27, 'R0SP68', '7423P5MX', 'CFF30R2MNP.jpeg', 'Peanut Cactus', '.', 150, 0, 'Per Piece', 20, 'Good', '2024-03-10 13:55:02', NULL, 0, '', 1),
(28, '06416N', '7423P5MX', 'LR8KLSS917.jpeg', 'Gymno Calcium ', '.', 150, 0, 'Per Piece', 20, 'Good', '2024-03-10 13:55:45', NULL, 0, '', 1),
(29, 'PX6QNH', 'V8NACB03', 'C1R0G772B6.jpg', 'Aloe-green-Blush', 'good', 150, 0, 'piece', 10, 'Aloe-green-Blush', '2024-04-07 09:39:12', NULL, 0, '', 1),
(30, 'T2R522', 'V8NACB03', 'G72WHBD6D0.jpg', 'Aloe-Pink-Blush', 'good', 150, 0, 'piece', 10, 'Aloe-Pink-Blush', '2024-04-07 09:40:06', NULL, 0, '', 1),
(31, 'H667FH', 'V8NACB03', '1A21828615.jpg', 'dark green Haworthia', 'good', 50, 0, 'piece', 10, ' Haworthia', '2024-04-07 09:41:15', NULL, 0, '', 1),
(32, '6D3NAI', 'V8NACB03', 'K59OG20580.jpg', 'Gasteria Maculata', 'good', 150, 0, 'piece', 10, 'Gasteria Maculata', '2024-04-07 09:41:42', NULL, 0, '', 1),
(33, 'PK7P47', 'V8NACB03', '5IG37LR60N.jpg', 'Gasteria maculata123', 'good', 150, 0, 'piece', 10, 'Gasteria maculata123', '2024-04-07 09:42:13', NULL, 0, '', 1),
(34, '70H6EI', 'V8NACB03', 'NT5N4LGH65.jpg', 'Haworthia Facsciata', 'good', 60, 0, 'piece', 10, 'Haworthia Facsciata', '2024-04-07 09:42:50', NULL, 0, '', 1),
(35, 'NV50OV', 'V8NACB03', '1V88G75NP3.jpg', 'Haworthia Reinwardtii (tower)', 'good', 120, 0, 'piece', 10, 'Haworthia Reinwardtii (tower)', '2024-04-07 09:43:15', NULL, 0, '', 1),
(36, 'NXPM14', 'V8NACB03', 'F374982OX7.jpg', 'Haworthia- star fish  dark green', 'good', 170, 0, 'piece', 10, 'Haworthia- star fish  dark green', '2024-04-07 09:43:51', NULL, 0, '', 1),
(37, 'NIXRLL', 'V8NACB03', 'YK08X17R58.jpg', 'Haworthia- star fish', 'good', 150, 0, 'piece', 10, 'Haworthia- star fish', '2024-04-07 09:44:22', NULL, 0, '', 1),
(38, 'C1AY46', 'V8NACB03', '5WGGGB8NGO.jpeg', 'haworthia', 'good', 200, 0, 'piece', 10, 'haworthia', '2024-04-07 09:45:11', NULL, 0, '', 1),
(39, 'UZ014F', 'V8NACB03', 'EV75766203.jpg', 'haworthialimifoliaspiralis_6', 'good', 80, 0, 'piece', 10, 'haworthialimifoliaspiralis_6', '2024-04-07 09:45:37', NULL, 0, '', 1),
(40, 'V2GQC5', 'V8NACB03', '87A3574U95.jpg', 'Haworthia-snow drops', 'good', 120, 0, 'piece', 10, 'Haworthia-snow drops', '2024-04-07 09:46:12', NULL, 0, '', 1),
(41, 'ZN9K24', 'V8NACB03', '6E089T2E25.jpg', 'haworthia', 'good', 50, 0, 'piece', 10, 'Haworthia-', '2024-04-07 09:47:21', NULL, 0, '', 1),
(42, '43E8RW', 'V8NACB03', 'KTHPTOZS7Q.jpg', 'king Haworthia-', 'good', 130, 0, 'piece', 10, 'king Haworthia-', '2024-04-07 09:48:12', NULL, 0, '', 1),
(43, 'QM850T', 'V8NACB03', 'VW5AWT0CTW.jpeg', 'pencil aloe Haworthia-', 'good', 100, 0, 'piece', 10, 'pencil alo Haworthia-', '2024-04-07 09:54:11', NULL, 0, '', 1),
(44, '0Y6LHE', 'V8NACB03', '2TS3F24PCL.jpeg', 'alovera dwarf (orange flowers) Haworthia-', 'good', 50, 0, 'piece', 10, 'alovera dwarf (orange flowers) Haworthia-', '2024-04-07 09:54:55', NULL, 0, '', 1),
(45, '3WQHM6', 'V8NACB03', '431GC65D08.jpeg', 'dark green alo Haworthia-', 'good', 50, 0, 'piece', 10, 'dark green alo Haworthia-', '2024-04-07 09:55:31', NULL, 0, '', 1),
(46, 'PK3JA5', 'V8NACB03', '5DM1192KLD.jpeg', 'alovera country side', 'good', 30, 0, 'piece', 10, 'alovera country side', '2024-04-07 09:55:59', NULL, 0, '', 1),
(47, '7L38G0', 'G47T0H02', 'U49746Q8H6.jpg', 'betel leaf (magai paan)', 'GOOD', 30, 0, 'piece', 10, 'betel leaf (magai paan)', '2024-04-07 10:20:24', NULL, 0, '', 1),
(48, 'O5X968', 'G47T0H02', 'M8TA0G0K3W.jpg', 'insulin-plant-costus-igneus-plant', 'good', 50, 0, 'piece', 10, 'insulin-plant-costus-igneus-plant', '2024-04-07 10:20:53', NULL, 0, '', 1),
(49, 'JR2T6M', 'G47T0H02', '6LVHQQW7N9.jpg', 'insulin-plant-costus-igneus-plant', 'good', 30, 0, 'piece', 10, 'insulin-plant-costus-igneus-plant', '2024-04-07 10:21:12', NULL, 0, '', 1),
(50, '0961XK', 'G47T0H02', 'UWBQ4CFW95.jpg', 'naatu pirandai', 'good', 30, 0, 'piece', 10, 'naatu pirandai', '2024-04-07 10:21:54', NULL, 0, '', 1),
(51, 'OQ3486', 'G47T0H02', '542QH7PGOM.jpg', 'nurserylive-tulsi-plants-category-image', 'good', 30, 0, 'piece', 10, 'nurserylive-tulsi-plants-category-image', '2024-04-07 10:22:26', NULL, 0, '', 1),
(52, '1NF9L3', 'G47T0H02', '79V5R332XQ.jpg', 'pennywort', 'good', 50, 0, 'piece', 10, 'pennywort', '2024-04-07 10:22:55', NULL, 0, '', 1),
(53, '8F6HN3', 'G47T0H02', 'M0XKDY0EHH.jpg', 'Rosemary-New-', 'good', 50, 0, 'piece', 10, 'Rosemary-New-', '2024-04-07 10:23:14', NULL, 0, '', 1),
(54, 'J8LZ02', 'G47T0H02', 'W77ZY0S834.jpg', 'tulsikrishna', 'good', 30, 0, 'piece', 10, 'tulsikrishna', '2024-04-07 10:23:46', NULL, 0, '', 1),
(55, 'Y4DLD9', 'G47T0H02', '2U7DKB5X56.jpeg', 'muppirandai', 'good', 50, 0, 'piece', 10, 'muppirandai', '2024-04-07 10:26:38', NULL, 0, '', 1),
(56, '8J5UBB', 'G47T0H02', '2S0O7W0Q5T.jpeg', 'muppirandai', 'good', 50, 0, 'piece', 10, 'muppirandai', '2024-04-07 10:26:39', NULL, 0, '', 1),
(57, '4HF030', 'G47T0H02', 'W32L0RAA72.jpg', 'ilai pirandai123', 'good', 50, 0, 'piece', 10, 'ilai pirandai123', '2024-04-07 10:30:58', NULL, 0, '', 1),
(58, 'Y4157U', 'JLABA128', 'KL5C8472IM.jpg', 'Callisia fragrans', 'good', 50, 0, 'piece', 10, 'Callisia fragrans', '2024-04-07 11:03:35', NULL, 0, '', 1),
(59, 'HXO1R7', 'JLABA128', '9FXJU019VI.jpeg', 'Callisia Repens(green)', 'good', 40, 0, 'piece', 10, 'Callisia Repens(green)', '2024-04-07 11:03:59', NULL, 0, '', 1),
(60, 'MC5KBQ', 'JLABA128', '2JA82PSZ6B.jpg', 'Callisia Repens(purple)', 'good', 40, 0, 'piece', 10, 'Callisia Repens(purple)', '2024-04-07 11:04:23', NULL, 0, '', 1),
(61, 'WW1877', 'JLABA128', 'AAU50DSW1A.jpg', 'enjoy pothos', 'good', 80, 0, 'piece', 10, 'enjoy pothos', '2024-04-07 11:04:46', NULL, 0, '', 1),
(62, '9SC342', 'JLABA128', 'YWE84CE6ME.jpg', 'Golden Pothos Epipremnum', 'good', 80, 0, 'piece', 10, 'Golden Pothos Epipremnum', '2024-04-07 11:05:11', NULL, 0, '', 1),
(63, 'K52C6R', 'JLABA128', '231R16SK1Z.jpg', 'Large-Nanouk-683x1024', 'good', 120, 0, 'piece', 10, 'Large-Nanouk-683x1024', '2024-04-07 11:05:39', NULL, 0, '', 1),
(64, '4565RH', 'JLABA128', 'GY1F48ZNC5.jpg', 'manjula pothos', 'good', 80, 0, 'piece', 10, 'manjula pothos', '2024-04-07 11:06:04', NULL, 0, '', 1),
(65, '1PK31O', 'JLABA128', '5408ST09O6.jpg', 'normal pothos', 'good', 40, 0, 'piece', 10, 'normal pothos', '2024-04-07 11:06:26', NULL, 0, '', 1),
(66, '0N7R95', 'JLABA128', '81976WLEQ0.jpeg', 'purple-heart-plants-', 'good', 40, 0, 'piece', 10, 'purple-heart-plants-', '2024-04-07 11:06:50', NULL, 0, '', 1),
(67, 'FZ7WVX', 'JLABA128', 'L53R0M8UK1.jpg', 'red-alternanthera-basket', 'good', 40, 0, 'piece', 10, 'red-alternanthera-basket', '2024-04-07 11:07:19', NULL, 0, '', 1),
(68, 'CL930Y', 'JLABA128', '8M34951N7Z.jpeg', 'Rheo', 'good', 60, 0, 'piece', 10, 'Rheo', '2024-04-07 11:07:51', NULL, 0, '', 1),
(69, '91VC0J', 'JLABA128', '8L52T44B42.jpeg', 'Rheo12', 'good', 40, 0, 'piece', 10, 'Rheo12', '2024-04-07 11:08:29', NULL, 0, '', 1),
(70, '52Z83R', 'JLABA128', 'ET5KXWXL59.jpeg', 'String of hearts', 'good', 120, 0, 'piece', 10, 'String of hearts', '2024-04-07 11:10:28', NULL, 0, '', 1),
(71, '2C56PR', 'JLABA128', 'XRTU90K46F.jpeg', 'String of hearts', 'good', 120, 0, 'piece', 10, 'String of hearts', '2024-04-07 11:10:36', NULL, 0, '', 1),
(72, 'T4727U', 'JLABA128', '2Y01E40749.jpeg', 'String of hearts', 'good', 120, 0, 'piece', 10, 'String of hearts', '2024-04-07 11:10:36', NULL, 0, '', 1),
(73, 'QE9NKS', 'JLABA128', '88V9P7AVJ0.jpeg', 'String of hearts', 'good', 120, 0, 'piece', 10, 'String of hearts', '2024-04-07 11:10:37', NULL, 0, '', 1),
(74, '18ILSB', 'JLABA128', 'X4JB5WG300.jpeg', 'String of hearts', 'good', 120, 0, 'piece', 10, 'String of hearts', '2024-04-07 11:10:51', NULL, 0, '', 1),
(75, 'H4HXJ8', 'JLABA128', '2D0R623PS4.jpeg', 'tangled heart', 'good', 50, 0, 'piece', 10, 'tangled heart', '2024-04-07 11:11:34', NULL, 0, '', 1),
(76, '9W8W0B', 'JLABA128', 'LF5U9B175Z.jpeg', 'Variegated String of Pearls', 'good', 130, 0, 'piece', 10, 'Variegated String of Pearls', '2024-04-07 11:12:05', NULL, 0, '', 1),
(77, 'W884ZP', 'JLABA128', 'W60PST0D1U.jpeg', 'Variegated String of Pearls', 'good', 130, 0, 'piece', 10, 'Variegated String of Pearls', '2024-04-07 11:12:08', NULL, 0, '', 1),
(78, 'TNOCUC', 'JLABA128', 'GZ9F1775D3.jpeg', 'Varigated Rheo', 'good', 50, 0, 'piece', 10, 'Varigated Rheo', '2024-04-07 11:12:31', NULL, 0, '', 1),
(79, '9NH289', 'JLABA128', 'H4621VT74A.jpeg', 'Varigated String of hearts', 'good', 130, 0, 'piece', 10, 'Varigated String of hearts', '2024-04-07 11:13:03', NULL, 0, '', 1),
(80, '2I246F', 'JLABA128', '838K617J5P.jpg', 'wandering jew white', 'good', 100, 0, 'piece', 10, 'wandering jew white', '2024-04-07 11:13:32', NULL, 0, '', 1),
(81, 'VW5251', 'JLABA128', 'FII68Y86FD.jpg', 'wandering jew', 'good', 40, 0, 'piece', 10, 'wandering jew', '2024-04-07 11:13:56', NULL, 0, '', 1),
(82, '6GCHRX', 'G47T0H02', '4556X99RAU.jpeg', 'mexican mint', 'good', 30, 0, 'piece', 10, 'mexican mint', '2024-04-07 11:15:59', NULL, 0, '', 1),
(83, '98V3F3', 'JLABA128', 'UH3L3D7U1P.jpeg', 'mexican mint Varigated', 'good', 50, 0, 'piece', 10, 'mexican mintVarigated ', '2024-04-07 11:18:20', NULL, 0, '', 1);

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
  MODIFY `cc_req_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `customers`
--
ALTER TABLE `customers`
  MODIFY `s_no` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `cus_log`
--
ALTER TABLE `cus_log`
  MODIFY `sno` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=53;

--
-- AUTO_INCREMENT for table `mycart`
--
ALTER TABLE `mycart`
  MODIFY `s_no` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `myfav`
--
ALTER TABLE `myfav`
  MODIFY `sno` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `myorder`
--
ALTER TABLE `myorder`
  MODIFY `s_no` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `s_no` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=84;

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
