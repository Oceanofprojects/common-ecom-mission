-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 28, 2023 at 04:03 PM
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
(1, '42905756', 'admin', 'mani', 'male', 'mani@gmail.com', 'kkanskjaskma skma skma skma ', 'alsnmoakmsokamskaksmaks', 1234567890, 1234567885, '$2y$10$Bc6Skox64v8ylJUkNJ8WKOd6CfiJY4GsGXUDig.IV4VEsUELRuCTO', 'pro4', '', 'tamilnadu', 'Chennai', '123456', '2023-11-24 14:02:05', NULL),
(2, '29152533', 'customer', 'madhu', 'female', 'demo@gmail.com', 'asnaksnkan', 'kjlklk', 987654321, 987654321, '$2y$10$N1hE0xe939FvipeQvIGQUedKnL6rfKtt/K5eTUqMDi2MeGttBkNve', 'pro3', '', '', 'Chennai', '', '2023-11-27 16:48:58', NULL),
(3, '39423184', 'customer', 'kumar', 'male', 'kumar@gmail.com', 'sasas', 'kjhkj', 7890654234, 7890654234, '$2y$10$R4pJNgy7rppbpUYCj5KtFuRToHnFmfcADSCzlDZGTNHtlGozE77I2', 'pro2', '', '', 'Chennai', '', '2023-11-24 13:36:58', NULL),
(4, '37679146', 'customer', 'magi', 'male', 'mdsharooka@gmail.com', 'asas', 'lknlkn', 7689765434, 7689765434, '$2y$10$4v8CtQbIWbZX6ZbzB7NF1epc6rK1wqId4qym46/JmW0Aq1r659jxm', 'default', '', '', 'Chennai', '', '2023-11-24 13:52:15', NULL),
(5, '41799539', 'customer', 'ram', 'male', 'ram@gmail.com', 'as,nan', 'llknlk', 8738972874, 8738972874, '$2y$10$TRg1NNifEAG1LS1W7wA3c.t/kWNUY8srQP9orj2F0ASJmtVRsBCr.', 'pro5', 'nlkn', '', 'Chennai', '', '2023-11-24 13:54:58', NULL);

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
(1, '2O73HBO6B051J2RW68LJ', '42905756', '0000:00:00:00', '2023-11-24', '2023-11-24 13:27:40'),
(2, '64XS6D2SN86B43P57XC6', '29152533', '0000:00:00:00', '2023-11-24', '2023-11-24 13:34:01'),
(3, 'UBOAKD7AE56H919T8S36', '39423184', '0000:00:00:00', '2023-11-24', '2023-11-24 13:36:59'),
(4, 'L697A153364JMU3V2J9W', '37679146', '0000:00:00:00', '2023-11-24', '2023-11-24 13:52:15'),
(5, '56MN188PB121O199W6ZA', '41799539', '0000:00:00:00', '2023-11-24', '2023-11-24 13:54:58'),
(6, '81JJ5E65EMINB1WXF0LM', '42905756', '0000:00:00:00', '2023-11-24', '2023-11-24 13:58:53'),
(7, 'QKND83Z3AGL2G370OSE8', '42905756', '0000:00:00:00', '2023-11-24', '2023-11-24 14:02:22'),
(8, 'J390EQ9V05BW6H2HCF8G', '42905756', '0000:00:00:00', '2023-11-26', '2023-11-26 10:25:45'),
(9, 'LXH336XJ9DQ9GTG8G6BL', '42905756', '0000:00:00:00', '2023-11-27', '2023-11-27 03:46:29'),
(10, 'J4K8Y494656048H24A6A', '29152533', '0000:00:00:00', '2023-11-27', '2023-11-27 15:17:59'),
(11, '8PJ05V5H5HG3O5M20Q07', '42905756', '0000:00:00:00', '2023-11-27', '2023-11-27 15:22:27'),
(12, '5G6EGTL413QFI04DL201', '29152533', '0000:00:00:00', '2023-11-27', '2023-11-27 16:51:16'),
(13, 'Q70I1YW89BPK23B3WZ91', '42905756', '0000:00:00:00', '2023-11-28', '2023-11-28 11:46:00');

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
(1, 31745, '42905756', '6CC9SI', 5, 0, '2023-11-24', '2023-11-26 11:00:03', '2023-11-26 16:30:03'),
(2, 72710, '42905756', '6CC9SI', 5, 0, '2023-11-24', '2023-11-26 11:00:03', '2023-11-26 16:30:03'),
(12, 18667, '29152533', '6CC9SI', 2, 0, '2023-11-27', '2023-11-27 15:22:00', '2023-11-27 20:51:33');

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
(1, '6CC9SI', '42905756', '2023-11-24 14:07:44', '2023-11-24 19:37:44');

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
(1, 'NUD55GW32O', '42905756', '[{\"p_id\":\"6CC9SI\",\"p_name\":\"Money\",\"qnty\":\"2\"}]', 'TY4L83WT40.sql', '2023-11-24', 'Pending', '2023-11-24 14:08:45'),
(2, '8Y6B9TW46B', '42905756', '[{\"p_id\":\"6CC9SI\",\"p_name\":\"Money\",\"qnty\":\"3\"}]', 'LE02UG457Z.jpg', '2023-11-24', 'Pending', '2023-11-24 14:11:22'),
(3, '387WZ0B145', '29152533', '[{\"p_id\":\"6CC9SI\",\"p_name\":\"Moneys\",\"qnty\":\"2\"}]', 'N83T58EQBI.jpg', '2023-11-27', 'Pending', '2023-11-27 15:22:00');

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
(1, '6CC9SI', '4OPB1Q62', 'E23469WN17.jpg', 'Moneys', 'money m  m  kma kma ksm akms akms akms kma smka skma skma skma skma sma skma skma skma skma skma skma skma skma skma skma skm akm skma skma skma skma skma skma skma skma  ka ms ak sma s mk aksm ', 50, 0, 'Nos', 9993, 'plant, money plants', '2023-11-27 15:22:00', NULL);

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
(1, '4OPB1Q62', 'Plants', 'OWUD9X1535.jpg', '2023-11-24 14:05:48'),
(2, '41ES4E13', 'T-Shirt', 'WG1794GL82.jpg', '2023-11-28 11:46:54'),
(3, 'QV3P6JC5', 'Offer plants', '6Y91GAC584.jpg', '2023-11-28 11:48:09');

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
  MODIFY `s_no` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `cus_log`
--
ALTER TABLE `cus_log`
  MODIFY `sno` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `mycart`
--
ALTER TABLE `mycart`
  MODIFY `s_no` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `myfav`
--
ALTER TABLE `myfav`
  MODIFY `sno` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `myorder`
--
ALTER TABLE `myorder`
  MODIFY `s_no` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `s_no` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `product_category`
--
ALTER TABLE `product_category`
  MODIFY `cate_sno` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `review`
--
ALTER TABLE `review`
  MODIFY `sno` int(11) NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
