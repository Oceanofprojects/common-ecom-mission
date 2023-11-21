-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 21, 2023 at 05:23 PM
-- Server version: 10.4.19-MariaDB
-- PHP Version: 8.0.7

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
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `customers`
--

INSERT INTO `customers` (`s_no`, `cid`, `role`, `c_name`, `c_gender`, `email`, `address_1`, `address_2`, `ph_num`, `whatsapp_num`, `pwd`, `profile`, `country`, `state`, `city`, `pin_code`, `created_at`, `updated_at`) VALUES
(1, '44738740', 'admin', 'mani', 'male', 'demo@gmail.com', 'test address1', 'test address2', 1234567890, 1234567890, '$2y$10$nGitjoVwFS2dci/CmvyMXuiyrTj5yhHn/rffUdXCABi9.pkogkZ5K', 'default', 'india', 'tamilnadu', 'Chennai', '600044', '2023-11-19 14:26:31', '0000-00-00 00:00:00'),
(2, '54606642', 'customer', 'maran', 'male', 'maran@gmail.com', 'ijbijnijb', 'ijjkn', 987654321, 987654321, '$2y$10$VymubHjlaChyIT0Rj6MFQuxQ6uGy/s6jeWM5GfhX43dnurzQ4qeEm', 'default', 'kjnj', 'ikjas', 'monokno', '123456', '2023-11-15 17:24:34', NULL),
(3, '19000720', 'customer', 'kumar', 'male', 'kumar@gmail.com', 'jnbi', 'njokmo', 6789054321, 6789054321, '$2y$10$6rzai6/./k6jm1DiQu/Zr.v.UNVbM3HSZ1DyR4wnlq0FAdzwPJWcK', 'pro5', 'ijoi', 'joi', 'joi', '234567', '2023-11-15 17:25:39', NULL);

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
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `cus_log`
--

INSERT INTO `cus_log` (`sno`, `uid`, `cid`, `ip_ad`, `_date`, `created_at`) VALUES
(1, '9K42EF581547UY2D01MH', '44738740', '0000:00:00:00', '2023-11-15', '2023-11-15 17:21:18'),
(2, '1235484NN44807TGOZ58', '54606642', '0000:00:00:00', '2023-11-15', '2023-11-15 17:24:34'),
(3, 'Y30Z1227Z3K29413WW1L', '19000720', '0000:00:00:00', '2023-11-15', '2023-11-15 17:25:39'),
(4, 'SOW4K8A81V0OW5982679', '44738740', '0000:00:00:00', '2023-11-15', '2023-11-15 17:27:13'),
(5, 'KHH0Z9PV5N83V2G9CXSC', '44738740', '0000:00:00:00', '2023-11-17', '2023-11-17 13:33:27'),
(6, '3LR2FF7933XE273FVCHZ', '44738740', '0000:00:00:00', '2023-11-18', '2023-11-18 14:09:20'),
(7, 'CTA0N3T401HB9P6455PM', '44738740', '0000:00:00:00', '2023-11-19', '2023-11-19 12:55:51'),
(8, 'M3L6RT87T6V419K49IX0', '19000720', '0000:00:00:00', '2023-11-19', '2023-11-19 16:27:30'),
(9, 'U51FDK1M6TX2514Y3Y76', '44738740', '0000:00:00:00', '2023-11-19', '2023-11-19 16:54:00'),
(10, '6537S65A41ORVB156PS1', '44738740', '0000:00:00:00', '2023-11-20', '2023-11-20 17:15:19'),
(11, 'CB9750U1A5WU5862BXDN', '44738740', '0000:00:00:00', '2023-11-21', '2023-11-21 13:50:43');

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
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `mycart`
--

INSERT INTO `mycart` (`s_no`, `cart_id`, `cid`, `p_id`, `quantity`, `cart_edit_flag`, `_date`, `created_at`, `updated_at`) VALUES
(1, 85280, '44738740', 'IL4007', 2, 0, '2023-11-17', '2023-11-17 14:53:09', '2023-11-17 20:22:37'),
(2, 34702, '44738740', '40N449', 2, 0, '2023-11-18', '2023-11-18 14:28:48', '2023-11-18 19:56:06'),
(3, 69469, '44738740', '34R83K', 2, 0, '2023-11-18', '2023-11-18 14:28:48', '2023-11-18 19:56:08'),
(4, 67618, '44738740', 'IL4007', 2, 1, '2023-11-18', '2023-11-19 15:04:40', '2023-11-18 19:56:14'),
(5, 13081, '44738740', '5YZW66', 3, 1, '2023-11-19', '2023-11-19 15:02:52', '2023-11-19 20:32:52');

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
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `myfav`
--

INSERT INTO `myfav` (`sno`, `p_id`, `cid`, `created_at`, `updated_at`) VALUES
(3, 'IL4007', '44738740', '2023-11-20 17:28:55', '2023-11-20 22:58:55'),
(5, 'V33L6B', '44738740', '2023-11-21 13:54:45', '2023-11-21 19:24:45');

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
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `myorder`
--

INSERT INTO `myorder` (`s_no`, `order_id`, `cid`, `product_list`, `payment_proof`, `cart_date`, `cart_status`, `created_at`) VALUES
(1, '5D00H2D260', '44738740', '[{\"p_id\":\"IL4007\",\"p_name\":\"Monstera Big Leaf\",\"qnty\":\"1\"}]', 'CPVVM97SRC.jpeg', '2023-11-17', 'Arriving,May 18', '2023-11-17 14:10:26'),
(2, '607MTNN455', '44738740', '[{\"p_id\":\"IL4007\",\"p_name\":\"Monstera Big Leaf\",\"qnty\":\"2\"}]', 'XWI4KP072Q.jpeg', '2023-11-17', 'Pending', '2023-11-17 14:53:09'),
(3, '3A9LW0LFPF', '44738740', '[{\"p_id\":\"40N449\",\"p_name\":\"Money Plant\",\"qnty\":\"2\"},{\"p_id\":\"34R83K\",\"p_name\":\"Snake plant\",\"qnty\":\"2\"},{\"p_id\":\"IL4007\",\"p_name\":\"Monstera Big Leaf\",\"qnty\":\"2\"}]', 'BE13DD3112.jpeg', '2023-11-18', 'Arriving,null', '2023-11-18 14:29:24');

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
  `update_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`s_no`, `p_id`, `cate_id`, `p_img`, `p_name`, `p_desc`, `price`, `offer`, `unit`, `stock`, `tags`, `created_at`, `update_at`) VALUES
(14, 'IL4007', 'LV1U0P6L', '95582AX03Z.jpg', 'Monstera Big Leaf', 'Monstera Big Leaf', 250, 0, 'Piece', 9995, 'Monstera Big Leaf, Indoor plants, Plants', '2023-11-19 14:32:11', NULL),
(15, '34R83K', 'LV1U0P6L', 'G713J0V2DP.jpg', 'Snake plant', 'Snake plant, also called mother-in-law s tongue, is a popular and hardy houseplant with stiff, sword-like leaves', 100, 20, 'Piece', 9998, 'Snake plant, Indoor plants, plants', '2023-11-18 15:15:27', NULL),
(16, '40N449', 'LV1U0P6L', '5B86OO5AOI.jpg', 'Money Plant', 'Money plant. P,', 50, 25, 'Piece', 9998, 'Money plant, indoor plant', '2023-11-18 15:15:31', NULL),
(17, '5YZW66', 'NXMV56FR', 'ORXL0FE7S4.jpg', 'Indoor Combo', 'Indoor combo offer, Contain 8 products a nka sna ska ska ska skma sma skma skma ska skma ska skma skma skma skma skma skma ssma skma skma s', 1000, 25, 'set', 15000, 'combo offer, Plants, indoor plants', '2023-11-19 15:03:23', NULL),
(18, 'V33L6B', 'NXMV56FR', '0WM941N1Q0.jpg', 'Pothos combo', 'indoor plant, money plant', 250, 10, 'set', 10000, 'plant, money plant, indoor', '2023-11-19 16:56:20', NULL);

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
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `product_category`
--

INSERT INTO `product_category` (`cate_sno`, `cate_id`, `cate_name`, `cate_img`, `created_at`) VALUES
(10, 'LV1U0P6L', 'Indoor Plants', '3Q9EI8VT8I.jpg', '2023-11-15 17:10:01'),
(11, 'NXMV56FR', 'Combo Offer', '9U5127605R.jpg', '2023-11-19 14:54:33');

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
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `review`
--

INSERT INTO `review` (`sno`, `cid`, `p_id`, `rating`, `review`, `created_at`) VALUES
(1, '44738740', 'IL4007', 4, 'Good product', '2023-11-17 15:11:33'),
(2, '44738740', 'IL4007', 3, 'Very good in quality, Amzing', '2023-11-17 15:13:01'),
(3, '44738740', 'IL4007', 1, 'But late deli', '2023-11-17 15:13:46'),
(4, '44738740', 'IL4007', 4, 'Sprr ????????', '2023-11-17 15:14:54'),
(5, '44738740', 'IL4007', 0, 'hello', '2023-11-17 15:17:55'),
(6, '44738740', 'IL4007', 0, 'ahr efasa ss asa  sa', '2023-11-17 16:27:03');

--
-- Indexes for dumped tables
--

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
-- AUTO_INCREMENT for table `customers`
--
ALTER TABLE `customers`
  MODIFY `s_no` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `cus_log`
--
ALTER TABLE `cus_log`
  MODIFY `sno` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `mycart`
--
ALTER TABLE `mycart`
  MODIFY `s_no` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `myfav`
--
ALTER TABLE `myfav`
  MODIFY `sno` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `myorder`
--
ALTER TABLE `myorder`
  MODIFY `s_no` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `s_no` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `product_category`
--
ALTER TABLE `product_category`
  MODIFY `cate_sno` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `review`
--
ALTER TABLE `review`
  MODIFY `sno` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
