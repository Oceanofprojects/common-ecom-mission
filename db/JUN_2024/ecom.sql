-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Jun 04, 2024 at 07:07 PM
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
(10, '60694295', 'TBD', '1', 0, '2023-12-12', '2023-12-12 17:14:12'),
(11, '60694295', '150', '2', 0, '2023-12-12', '2023-12-12 17:14:12'),
(16, '60694295', '100', '1', 0, '2023-12-13', '2023-12-15 13:29:25'),
(17, '60694295', '10', '2', 0, '2023-12-15', '2023-12-19 09:08:11'),
(18, '60694295', '100', '1', 0, '2023-12-19', '2023-12-26 15:02:58'),
(19, '60694295', 'TBD', '1', 0, '2023-12-30', '2024-01-02 14:14:50'),
(20, '60694295', '10', '[{\"p_id\":\"11V686\",\"p_name\":\"water test jasja sja sja sja skja ska ka skma \",\"qnty\":\"2\"},{\"p_id\":\"86Q79Z\",\"p_name\":\"plant\",\"qnty\":\"2\"}]', 0, '2024-01-02', '2024-01-16 14:16:31'),
(21, '60694295', '10', '[{\"p_id\":\"11V686\",\"p_name\":\"water test jasja sja sja sja skja ska ka skma \",\"qnty\":\"2\"},{\"p_id\":\"86Q79Z\",\"p_name\":\"plant\",\"qnty\":\"2\"}]', 0, '2024-01-02', '2024-01-16 14:16:31'),
(22, '60694295', '10', '[{\"p_id\":\"11V686\",\"p_name\":\"water test jasja sja sja sja skja ska ka skma \",\"qnty\":\"2\"},{\"p_id\":\"86Q79Z\",\"p_name\":\"plant\",\"qnty\":\"2\"}]', 0, '2024-01-02', '2024-01-16 14:16:31'),
(23, '60694295', '10', '[{\"p_id\":\"11V686\",\"p_name\":\"water test jasja sja sja sja skja ska ka skma \",\"qnty\":\"2\"},{\"p_id\":\"86Q79Z\",\"p_name\":\"plant\",\"qnty\":\"2\"}]', 0, '2024-01-11', '2024-01-16 14:16:31'),
(24, '60694295', '10', '[{\"p_id\":\"11V686\",\"p_name\":\"water test jasja sja sja sja skja ska ka skma \",\"qnty\":\"5\"}]', 0, '2024-01-11', '2024-01-16 14:16:31'),
(25, '60694295', '10', '[{\"p_id\":\"11V686\",\"p_name\":\"water test jasja sja sja sja skja ska ka skma \",\"qnty\":\"5\"},{\"p_id\":\"86Q79Z\",\"p_name\":\"plant\",\"qnty\":\"1\"}]', 0, '2024-01-11', '2024-01-16 14:16:31'),
(26, '60694295', '10', '[{\"p_id\":\"11V686\",\"p_name\":\"water test jasja sja sja sja skja ska ka skma \",\"qnty\":\"5\"}]', 0, '2024-01-11', '2024-01-16 14:16:31'),
(27, '60694295', '150', '[{\"p_id\":\"11V686\",\"p_name\":\"water test jasja sja sja sja skja ska ka skma \",\"qnty\":\"3\"}]', 0, '2024-01-16', '2024-01-16 14:17:46'),
(28, '60694295', '1500', '[{\"p_id\":\"11V686\",\"p_name\":\"water test jasja sja sja sja skja ska ka skma \",\"qnty\":\"6\"}]', 0, '2024-03-11', '2024-03-11 16:34:34'),
(29, '60694295', '1500', '[{\"p_id\":\"11V686\",\"p_name\":\"water test jasja sja sja sja skja ska ka skma \",\"qnty\":\"3\"}]', 0, '2024-03-11', '2024-03-11 16:40:09'),
(30, '60694295', '2000', '[{\"p_id\":\"11V686\",\"p_name\":\"water test jasja sja sja sja skja ska ka skma \",\"qnty\":\"4\"}]', 0, '2024-03-11', '2024-03-11 16:41:24'),
(31, '60694295', '100', '[{\"p_id\":\"86Q79Z\",\"p_name\":\"plant\",\"qnty\":\"2\"}]', 0, '2024-03-11', '2024-03-11 16:57:38'),
(32, '60694295', '1200', '[{\"p_id\":\"86Q79Z\",\"p_name\":\"plant\",\"qnty\":\"2\"},{\"p_id\":\"11V686\",\"p_name\":\"water test jasja sja sja sja skja ska ka skma \",\"qnty\":\"2\"}]', 0, '2024-03-11', '2024-03-11 17:24:51'),
(33, '60694295', '10000', '[{\"p_id\":\"86Q79Z\",\"p_name\":\"plant\",\"qnty\":\"5\"},{\"p_id\":\"11V686\",\"p_name\":\"water test jasja sja sja sja skja ska ka skma \",\"qnty\":\"2\"}]', 0, '2024-03-11', '2024-03-13 13:52:08'),
(34, '60694295', '200', '[{\"p_id\":\"11V686\",\"p_name\":\"water test jasja sja sja sja skja ska ka skma \",\"qnty\":\"2\"}]', 0, '2024-03-13', '2024-03-13 14:01:47'),
(35, '60694295', '200', '[{\"p_id\":\"11V686\",\"p_name\":\"water test jasja sja sja sja skja ska ka skma \",\"qnty\":\"4\"}]', 0, '2024-03-13', '2024-03-13 14:13:27'),
(36, '60694295', '900', '[{\"p_id\":\"11V686\",\"p_name\":\"water test jasja sja sja sja skja ska ka skma \",\"qnty\":\"6\"}]', 0, '2024-03-13', '2024-03-13 14:14:14'),
(37, '60694295', '900', '[{\"p_id\":\"11V686\",\"p_name\":\"water test jasja sja sja sja skja ska ka skma \",\"qnty\":\"8\"}]', 0, '2024-03-13', '2024-03-13 14:15:09'),
(38, '60694295', '123', '[{\"p_id\":\"11V686\",\"p_name\":\"water test jasja sja sja sja skja ska ka skma \",\"qnty\":\"11\"}]', 0, '2024-03-13', '2024-03-13 14:16:32'),
(39, '60694295', 'TBD', '[{\"p_id\":\"11V686\",\"p_name\":\"water test jasja sja sja sja skja ska ka skma \",\"qnty\":\"13\"}]', 0, '2024-03-13', '2024-03-13 14:17:05'),
(40, '60694295', 'TBD', '[{\"p_id\":\"11V686\",\"p_name\":\"water test jasja sja sja sja skja ska ka skma \",\"qnty\":\"15\"}]', 0, '2024-03-13', '2024-04-20 11:12:38'),
(41, '60694295', '1000', '[{\"p_id\":\"11V686\",\"p_name\":\"water test jasja sja sja sja skja ska ka skma \",\"qnty\":\"15\"},{\"p_id\":\"V0J04U\",\"p_name\":\"Money plant without pot\",\"qnty\":\"2\"}]', 0, '2024-04-20', '2024-04-20 11:26:12'),
(42, '60694295', 'TBD', '[{\"p_id\":\"11V686\",\"p_name\":\"water test jasja sja sja sja skja ska ka skma \",\"qnty\":\"17\"},{\"p_id\":\"V0J04U\",\"p_name\":\"Money plant without pot\",\"qnty\":\"7\"}]', 1, '2024-04-20', '2024-04-20 11:26:12');

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
(1, '19927354', 'customer', 'mani', 'male', 'mani@gmail.com', 'test1', 'twst2', 1234567890, 1234567890, '$2y$10$MiMYkyZc/kl40Q1QGlQ3TOfMPdDSvCF.uSxfP9s/4.QX66RU44l2q', 'pro2', 'jj', 'ioo', 'oij', '123456', '2024-06-04 16:52:35', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `cus_log`
--

CREATE TABLE `cus_log` (
  `sno` int(11) NOT NULL,
  `uid` varchar(25) DEFAULT NULL,
  `cid` varchar(25) DEFAULT NULL,
  `ip_ad` varchar(25) DEFAULT NULL,
  `_date` date DEFAULT current_timestamp(),
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `cus_log`
--

INSERT INTO `cus_log` (`sno`, `uid`, `cid`, `ip_ad`, `_date`, `created_at`) VALUES
(1, 'GKBVV67OZ2PAL00UCJIM', '62073797', '0000:00:00:00', '2024-06-04', '2024-06-04 16:31:23'),
(2, 'JRQ1343CCS475GR2R384', '58794173', '0000:00:00:00', '2024-06-04', '2024-06-04 16:33:35'),
(3, 'ZEW737436ZMYOAA2499V', '13650847', '0000:00:00:00', '2024-06-04', '2024-06-04 16:35:54'),
(4, '5HL55FA40LM39N4P6804', '96576342', '0000:00:00:00', '2024-06-04', '2024-06-04 16:37:53'),
(5, '7399F832XDI2YG432OBK', '19927354', '0000:00:00:00', '2024-06-04', '2024-06-04 16:52:35'),
(6, 'D3G56YF2A6BGV40U0952', '19927354', '0000:00:00:00', '2024-06-04', '2024-06-04 17:03:09');

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
(2, 60935, '60694295', 'HE6125', 2, 0, '2023-11-29', '2023-11-29 10:32:11', '2023-11-29 16:00:39'),
(3, 11116, '60694295', '86Q79Z', 7, 0, '2023-11-30', '2024-03-13 13:51:31', '2024-03-13 19:21:31'),
(4, 89135, '60694295', '11V686', 17, 0, '2023-12-12', '2024-04-20 11:26:00', '2024-04-20 16:56:00'),
(6, 23862, '60694295', '11V686', 17, 0, '2023-12-12', '2024-04-20 11:26:00', '2024-04-20 16:56:00'),
(7, 27111, '60694295', '86Q79Z', 7, 0, '2023-12-12', '2024-03-13 13:51:31', '2024-03-13 19:21:31'),
(9, 78822, '60694295', '86Q79Z', 7, 0, '2023-12-13', '2024-03-13 13:51:31', '2024-03-13 19:21:31'),
(10, 78433, '60694295', '11V686', 17, 0, '2023-12-30', '2024-04-20 11:26:00', '2024-04-20 16:56:00'),
(13, 45377, '60694295', '11V686', 17, 0, '2024-03-11', '2024-04-20 11:26:00', '2024-04-20 16:56:00'),
(14, 83456, '60694295', '86Q79Z', 7, 0, '2024-03-11', '2024-03-13 13:52:08', '2024-03-13 19:21:31'),
(15, 71293, '60694295', '11V686', 17, 0, '2024-03-11', '2024-04-20 11:26:00', '2024-04-20 16:56:00'),
(16, 67250, '60694295', '11V686', 17, 1, '2024-03-13', '2024-04-20 11:26:00', '2024-04-20 16:56:00'),
(18, 82160, '60694295', 'V0J04U', 7, 1, '2024-04-20', '2024-04-20 11:25:33', '2024-04-20 16:55:33');

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
(4, 'P38P4J', '60694295', '2024-04-20 08:00:44', '2024-04-20 13:30:44'),
(6, '\'F0F67W\'', '\'96576342\'', '2024-06-04 16:42:42', '2024-06-04 18:42:42'),
(8, 'F0F67W', '96576342', '2024-06-04 16:47:26', '2024-06-04 18:47:26');

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
(1, 'X136I92W1C', '60694295', '[{\"p_id\":\"HE6125\",\"p_name\":\"Cactus 11\",\"qnty\":\"2\"}]', '3740CUR339.jpg', '2023-11-29', 'Completed', '2023-12-13 13:52:15'),
(2, '5O1BF0AJHY', '60694295', '[{\"p_id\":\"86Q79Z\",\"p_name\":\"7878`787\",\"qnty\":\"1\"}]', '27R2R41UPX.jpg', '2023-11-30', 'Completed', '2023-12-12 14:07:14'),
(3, 'O79SN48ABO', '60694295', '[{\"p_id\":\"11V686\",\"p_name\":\"water test jasja sja sja sja skja ska ka skma \",\"qnty\":\"1\"}]', 'WY7719L7X3.jpeg', '2023-12-12', 'Completed', '2024-03-11 16:44:49'),
(4, 'EL9Y2F7698', '60694295', '[{\"p_id\":\"11V686\",\"p_name\":\"water test jasja sja sja sja skja ska ka skma \",\"qnty\":\"1\"},{\"p_id\":\"86Q79Z\",\"p_name\":\"plant\",\"qnty\":\"1\"}]', 'V5HMZ97PVB.jpeg', '2023-12-12', 'Completed', '2024-03-11 16:44:51'),
(5, '95SVMXR5QW', '60694295', '[{\"p_id\":\"86Q79Z\",\"p_name\":\"plant\",\"qnty\":\"4\"}]', 'E21BL53Z0G.png', '2023-12-26', 'Completed', '2024-03-11 16:44:46'),
(6, 'HWEZIS4L5Q', '60694295', '[{\"p_id\":\"11V686\",\"p_name\":\"water test jasja sja sja sja skja ska ka skma \",\"qnty\":\"3\"}]', '6V4P28QR8U.jpg', '2024-01-16', 'Confirmed', '2024-01-16 14:45:30'),
(7, '423L7H9061', '60694295', '[{\"p_id\":\"11V686\",\"p_name\":\"water test jasja sja sja sja skja ska ka skma \",\"qnty\":\"6\"}]', '58674FXF5W.jpg', '2024-03-11', 'Completed', '2024-03-11 16:44:41'),
(8, 'AH4W9DIU4M', '60694295', '[{\"p_id\":\"86Q79Z\",\"p_name\":\"plant\",\"qnty\":\"7\"},{\"p_id\":\"11V686\",\"p_name\":\"water test jasja sja sja sja skja ska ka skma \",\"qnty\":\"9\"}]', '0EQ8Y4670U.jpg', '2024-03-13', 'Pending', '2024-03-13 13:52:08');

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `s_no` int(11) NOT NULL,
  `p_id` varchar(25) DEFAULT NULL,
  `subset_id` varchar(25) DEFAULT '',
  `cate_id` varchar(15) DEFAULT NULL,
  `is_subitem` tinyint(1) DEFAULT 0,
  `p_img` text DEFAULT NULL,
  `p_name` varchar(50) DEFAULT NULL,
  `p_desc` text DEFAULT NULL,
  `price` int(11) DEFAULT NULL,
  `offer` int(11) DEFAULT NULL,
  `unit` varchar(25) DEFAULT NULL,
  `stock` int(11) DEFAULT NULL,
  `tags` text DEFAULT NULL,
  `p_status` tinyint(1) DEFAULT 1,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `update_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`s_no`, `p_id`, `subset_id`, `cate_id`, `is_subitem`, `p_img`, `p_name`, `p_desc`, `price`, `offer`, `unit`, `stock`, `tags`, `p_status`, `created_at`, `update_at`) VALUES
(2, '86Q79Z', '', '8M3GKFG6', 1, '6G23J8054E.jpg', 'plant', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et  d&amp;amp;amp;lt;br&amp;amp;amp;gt;&amp;amp;amp;lt;br&amp;amp;amp;gt;olore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip NEWLINEex ea commodo consequat. Duis aute irure doNEWPOINTlorNEWLINEin reprehenderit in voluptate velit esse\r\ncillum dolore eu fugiat nulla pariatur.NEWLINEExcepteur sint occaecat cupidatat non\r\nproident, sunt in culpa quiNEWLINEofficia deserunt mollit anim id est laborum.', 67, 5, '67', 88, '67, mani', 1, '2024-04-19 11:17:56', NULL),
(3, '11V686', '', '8M3GKFG6', 0, '3C8JH6N4GZ.jpg', 'water test jasja sja sja sja skja ska ka skma ', 'test water plant pointsNEWLINEnone lineNEWLINEtwo lines', 100, 0, 'cutting', 9980, 'water plant', 1, '2024-04-19 11:52:38', NULL),
(5, 'P1CN02', '', NULL, 1, '2Y8F0S4149.jpg', 'plant 1', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et  d&amp;amp;amp;amp;lt;br&amp;amp;amp;amp;gt;&amp;amp;amp;amp;lt;br&amp;amp;amp;amp;gt;olore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip NEWLINEex ea commodo consequat. Duis aute irure doNEWPOINTlorNEWLINEin reprehenderit in voluptate velit esse\r\ncillum dolore eu fugiat nulla pariatur.NEWLINEExcepteur sint occaecat cupidatat non\r\nproident, sunt in culpa quiNEWLINEofficia deserunt mollit anim id est laborum.', 67, 0, '67', 88, '67, mani', 1, '2024-04-19 12:20:31', NULL),
(6, 'F57F28', '86Q79Z', '8M3GKFG6', 1, 'L9X88CG00F.jpg', 'plant 2', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et  d&amp;amp;amp;amp;lt;br&amp;amp;amp;amp;gt;&amp;amp;amp;amp;lt;br&amp;amp;amp;amp;gt;olore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip NEWLINEex ea commodo consequat. Duis aute irure doNEWPOINTlorNEWLINEin reprehenderit in voluptate velit esse\r\ncillum dolore eu fugiat nulla pariatur.NEWLINEExcepteur sint occaecat cupidatat non\r\nproident, sunt in culpa quiNEWLINEofficia deserunt mollit anim id est laborum.', 67, 0, '67', 88, '67, mani', 1, '2024-04-19 12:24:30', NULL),
(7, 'F0F67W', '', '8M3GKFG6', 0, 'Y5R28LG0K3.jpg', 'Cac1', 'test cac', 10, 4, 'g', 100, 'as', 1, '2024-04-19 13:11:37', NULL),
(8, 'P38P4J', 'F0F67W', '8M3GKFG6', 1, '0DZ7NCUJKE.jpg', 'Cac 2', 'test cac', 10, 3, 'g', 100, 'as', 1, '2024-04-19 13:11:40', NULL),
(9, '5DJCJ0', 'F0F67W', '8M3GKFG6', 1, 'Y5R28LG0K3.jpg', 'Cac5', 'test cac', 10, 1, 'g', 100, 'as', 1, '2024-04-19 13:11:45', NULL),
(10, '5FO44I', 'F0F67W', '8M3GKFG6', 1, 'Y5R28LG0K3.jpg', 'Cac1010', 'test        cac', 100, 0, 'g', 100, 'cac', 1, '2024-04-20 10:14:36', NULL),
(11, '5S6FEL', '5DJCJ0', '68N5QKT6', 0, '7R364NO70N.jpg', 'Money plant with pot', 'Money plant with pot', 1500, 20, 'Piece', 2000, 'Money plant with pot', 1, '2024-04-21 08:14:28', NULL),
(12, 'V0J04U', '5S6FEL', '68N5QKT6', 1, '5UB9F6P5N5.jpg', 'Money plant without pot', 'Money plant without pot', 500, 10, 'Cutting', 2000, 'Money plant without pot', 1, '2024-04-20 08:14:29', NULL),
(13, 'F4B0O7', 'V0J04U', '68N5QKT6', 1, 'MR1891WYM8.jpg', 'Mini money plant', 'Mini money plant', 150, 0, 'Cutting', 2000, 'Mini money plant', 1, '2024-04-20 10:17:39', NULL),
(14, '180187', 'F4B0O7', '68N5QKT6', 1, 'MR1891WYM8.jpg', 'Mini money plant 2', 'Mini money plant2', 50, 0, 'Cutting', 2000, 'Mini money plant', 1, '2024-04-20 10:58:20', NULL);

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
(2, '8M3GKFG6', 'water', '0X7MFQC57U.jpg', '2023-11-30 04:40:36'),
(5, '68N5QKT6', 'Indoor', 'GICUDEE5QO.jpg', '2024-04-20 08:06:36');

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
  MODIFY `cc_req_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=43;

--
-- AUTO_INCREMENT for table `customers`
--
ALTER TABLE `customers`
  MODIFY `s_no` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `cus_log`
--
ALTER TABLE `cus_log`
  MODIFY `sno` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `mycart`
--
ALTER TABLE `mycart`
  MODIFY `s_no` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `myfav`
--
ALTER TABLE `myfav`
  MODIFY `sno` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `myorder`
--
ALTER TABLE `myorder`
  MODIFY `s_no` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `s_no` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `product_category`
--
ALTER TABLE `product_category`
  MODIFY `cate_sno` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `review`
--
ALTER TABLE `review`
  MODIFY `sno` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
