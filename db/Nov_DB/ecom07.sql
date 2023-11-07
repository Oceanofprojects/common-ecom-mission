-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 07, 2023 at 06:50 PM
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
-- Table structure for table `business_details`
--

CREATE TABLE `business_details` (
  `sno` int(11) NOT NULL,
  `business_logo` varchar(15) DEFAULT NULL,
  `business_name` varchar(25) DEFAULT NULL,
  `business_slogan` text DEFAULT NULL,
  `business_ph_num_1` bigint(20) DEFAULT NULL,
  `business_whatsapp_num` bigint(20) DEFAULT NULL,
  `business_address` text DEFAULT NULL,
  `insta_link` text DEFAULT NULL,
  `fb_link` text DEFAULT NULL,
  `business_desc` text DEFAULT NULL,
  `main_slide_1` varchar(15) DEFAULT NULL,
  `main_slide_2` varchar(15) DEFAULT NULL,
  `main_slide_3` varchar(15) DEFAULT NULL,
  `main_slide_4` varchar(15) DEFAULT NULL,
  `main_slide_5` varchar(15) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `business_details`
--

INSERT INTO `business_details` (`sno`, `business_logo`, `business_name`, `business_slogan`, `business_ph_num_1`, `business_whatsapp_num`, `business_address`, `insta_link`, `fb_link`, `business_desc`, `main_slide_1`, `main_slide_2`, `main_slide_3`, `main_slide_4`, `main_slide_5`, `created_at`) VALUES
(1, 'logo.png', 'Green Forever', 'Make earth green', 8911106811, 8911106811, 'No 4 , Srinivasan street, Thiruneermalai, Chennai - 44.', 'https://www.instagram.com/madangowri/?hl=en', 'https://www.facebook.com/iammadangowri/', 'Fresh live plant, Quantity Product, Pots, AI plants', 'J3FJ3L52Q3.jpg', 'MJ090Z346B.jpg', '1724S526Y6.jpg', 'OTXHTH1XWW.jpg', '4853XQB7UU.jpg', '2023-10-30 16:17:46');

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
(1, '1234', 'admin', 'manik', NULL, 'mani@gmail.com', 'my address', NULL, 9090, NULL, '$2y$10$tWZUsQNecKa6rYDMSHPr3eoc1/EnYKCryORzvvXbxvO2IP2mGuwUG', 'default', 'india', 'tamilnadu', 'chennai', 'chennai', '2023-11-03 12:53:11', '2023-03-21 07:25:07'),
(2, '22', NULL, 'mani', 'on', 'as', 'jiijji', 'bjib', 1234512345, 23, 'manimaran@123M', 'default', 'ijb', 'jib', 'ijb', '', '2023-10-19 11:05:03', NULL),
(3, 'T1TOC361', NULL, 'mani', 'on', 'mani1@gmail.com', 'jiijji', 'bjib', 1234512349, 1234567889, 'manimaran@123M', 'default', 'ijb', 'jib', 'ijb', '', '2023-10-18 15:27:59', NULL),
(4, '3UP1E7RT', NULL, 'kumar', 'on', 'kumar@gmail.com', 'joh', 'io', 7849738746, 7849738746, 'manimaran@123A', 'default', 'ioh', 'ioh', 'iohioh', '11', '2023-10-18 16:03:45', NULL),
(5, 'Y320177R', NULL, 'kumar1', 'on', 'kumar1@gmail.com', 'joh', 'io', 7849738740, 7849738740, '$2y$10$ll7bamsJCd8P.75x3MzbUuhGsSy0WHi2.SIP1ScmAzaAQdAD6wddC', 'default', 'ioh', 'ioh', 'iohioh', '11', '2023-10-18 16:09:16', NULL),
(6, '30510964', NULL, 'kumar12', 'on', 'kumar12@gmail.com', 'joh', 'io', 7849738741, 7849738741, '$2y$10$QKEpv5rfcQoQAaAY7deVUOq3QvvmbS2X8AqKws2svbh4Ph3xA9LgS', 'default', 'ioh', 'ioh', 'iohioh', '11', '2023-10-18 16:10:33', NULL),
(7, '25611319', NULL, 'Maran', 'male', 'manimaran18051999@gmail.com', 'Test address 1', 'Test address 1', 8939068212, 8939068212, '$2y$10$aqkeG/TgHmJLvAF1KjdETu/vbaY0YyWCl5vlH85Ej4J5cdU8rWsEW', 'pro2', 'India', 'Tamilnadu', 'Chennai', '600044', '2023-10-19 11:31:26', NULL),
(8, '69898247', 'customer', 'test ', 'male', 'j@gmail.com', 'asas', 'asas', 1234567899, 1234567899, '$2y$10$PsmJEvnHdkPRGD32CWz5y.rveeCzFc7dyR1ciz4w2or4RJVlGsovy', 'pro5', '', '', 'asas', '', '2023-10-19 14:07:53', NULL),
(9, '69177713', 'customer', 'test use', 'male', 'jj@gmail.com', 'asas', 'asas', 9878987654, 9878987654, '$2y$10$aUWks1qdIQM7gfa.lS/mvOEnJBJk8qbko6ZCvIIQNzjiP.dt9q2pO', 'pro4', '', '', 'asas', '', '2023-10-20 14:24:48', NULL);

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
(1, '3802279867', '1234', '120:000:122:9', NULL, '2023-09-03 15:44:44'),
(2, 'E8KCV69EAPTV1V1PN0OD', '25611319', '0000:00:00:00', NULL, '2023-10-19 11:41:18'),
(3, 'VY910I7AQ259YH2AB1PH', '25611319', '0000:00:00:00', NULL, '2023-10-19 11:42:52'),
(4, 'Z350Z8V6FP30H8881NR1', '25611319', '0000:00:00:00', '2023-10-19', '2023-10-19 11:44:51'),
(5, 'IS2XN63OBUA7CHHVW04R', '25611319', '0000:00:00:00', '2023-10-19', '2023-10-19 12:30:36'),
(6, '2LU1T3C17JQC7Q8G97CF', '25611319', '0000:00:00:00', '2023-10-19', '2023-10-19 12:30:40'),
(7, 'V6A687G05SS1M8JZXIK5', '25611319', '0000:00:00:00', '2023-10-19', '2023-10-19 12:36:36'),
(8, 'QKK49V18PKQ4M49V891Y', '25611319', '0000:00:00:00', '2023-10-19', '2023-10-19 12:37:58'),
(9, '24515DVPGQR39CZFGEWI', '25611319', '0000:00:00:00', '2023-10-19', '2023-10-19 12:38:07'),
(10, 'PUEPQM17AE1687EMIO40', '25611319', '0000:00:00:00', '2023-10-19', '2023-10-19 12:38:11'),
(11, 'U63C3B197658782JDPJ0', '1234', '0000:00:00:00', '2023-10-20', '2023-10-20 14:21:56'),
(12, 'SK309115M2SA13WHD88R', '1234', '0000:00:00:00', '2023-10-20', '2023-10-20 14:23:28'),
(13, 'O01A8BZACQG566XJ0UXD', '69177713', '0000:00:00:00', '2023-10-20', '2023-10-20 14:24:48'),
(14, 'P4V8RF0N0P4Y27S7K2AX', '1234', '0000:00:00:00', '2023-10-20', '2023-10-20 14:27:22'),
(15, '283O446Q3GU6ZE3F0551', '1234', '0000:00:00:00', '2023-10-20', '2023-10-20 14:29:29'),
(16, '1Q01S68FJX08Z44K0FLY', '1234', '0000:00:00:00', '2023-10-20', '2023-10-20 14:29:56'),
(17, 'KU73147N9CD729QLMFR7', '1234', '0000:00:00:00', '2023-10-20', '2023-10-20 15:10:55'),
(18, 'KGF877FVDKF0U34LQ88V', '1234', '0000:00:00:00', '2023-10-22', '2023-10-22 12:35:29'),
(19, 'KWH7X211FIS945929XF6', '1234', '0000:00:00:00', '2023-10-22', '2023-10-22 12:37:36'),
(20, '5F9BDYJT8YI325XAE02K', '1234', '0000:00:00:00', '2023-10-26', '2023-10-26 09:03:55'),
(21, '84UQR8EFRLVE4TY92B43', '1234', '0000:00:00:00', '2023-10-29', '2023-10-29 15:32:38'),
(22, '4PEA5A1596JHAG5LL611', '1234', '0000:00:00:00', '2023-10-30', '2023-10-30 10:02:35'),
(23, '6ZBHVIJ1019A1HK5N690', '1234', '0000:00:00:00', '2023-11-03', '2023-11-03 14:02:50'),
(24, 'A3LI75KYF0UF9745NIW0', '1234', '0000:00:00:00', '2023-11-05', '2023-11-05 14:29:00'),
(25, 'V78R25F2V1R72K74QX01', '1234', '0000:00:00:00', '2023-11-06', '2023-11-06 10:21:49'),
(26, 'S208KV72D7C3A48M22OA', '1234', '0000:00:00:00', '2023-11-07', '2023-11-07 14:43:31');

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
(1, 0, '1234', '4ZS112', 1, 1, '2023-09-13', '2023-11-06 10:38:17', '2023-11-06 16:08:17'),
(2, 24, '1234', '7IV947', 2, 1, '2023-09-13', '2023-11-06 13:10:43', '2023-11-06 18:40:43'),
(3, 48493, '1234', '3QC469', 2, 0, '2023-09-13', '2023-10-14 16:52:22', '2023-09-30 18:50:36'),
(4, 59605, '1234', '2QG000', 2, 1, '2023-09-13', '2023-11-06 10:22:32', '2023-11-06 15:52:32'),
(5, 33740, '1234', '2QG000', 2, 1, '2023-09-30', '2023-11-06 10:22:32', '2023-11-06 15:52:32'),
(6, 82912, '1234', '3QC469', 3, 1, '2023-09-30', '2023-10-14 17:25:54', '2023-09-30 18:57:45'),
(7, 21912, '1234', '4ZS112', 1, 1, '2023-09-30', '2023-11-06 10:38:17', '2023-11-06 16:08:17'),
(8, 29984, '1234', '4ZS112', 1, 1, '2023-10-04', '2023-11-06 10:38:17', '2023-11-06 16:08:17'),
(9, 42644, '1234', '1AT8Y4', 2, 1, '2023-10-11', '2023-10-26 13:19:47', '2023-10-26 18:49:47'),
(15, 28281, '1234', '4ZS112', 1, 1, '2023-10-14', '2023-11-06 10:38:17', '2023-11-06 16:08:17'),
(16, 70655, '1234', '3QC469', 2, 1, '2023-10-14', '2023-10-14 17:34:12', '2023-10-14 23:04:12'),
(17, 56146, '1234', '4ZS112', 1, 1, '2023-10-26', '2023-11-06 10:38:17', '2023-11-06 16:08:17'),
(18, 63063, '1234', '2QG000', 2, 1, '2023-10-26', '2023-11-06 10:22:32', '2023-11-06 15:52:32'),
(19, 49524, '1234', '1AT8Y4', 2, 1, '2023-10-26', '2023-10-26 13:19:47', '2023-10-26 18:49:47'),
(20, 79687, '1234', '2QG000', 2, 1, '2023-10-30', '2023-11-06 10:22:32', '2023-11-06 15:52:32'),
(21, 61821, '1234', '1AT8Y4', 2, 0, '2023-10-30', '2023-10-30 10:03:18', '2023-10-30 15:33:08'),
(22, 60834, '1234', '3QC469', 2, 0, '2023-10-30', '2023-10-30 10:07:13', '2023-10-30 15:36:58'),
(23, 91745, '1234', '7IV947', 2, 1, '2023-10-30', '2023-11-06 13:10:43', '2023-11-06 18:40:43'),
(32, 61976, '1234', '7IV947', 2, 0, '2023-11-06', '2023-11-06 13:10:50', '2023-11-06 18:40:43');

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
(105, '2QG000', '25611319', '2023-10-19 13:39:48', '2023-10-19 19:09:48');

-- --------------------------------------------------------

--
-- Table structure for table `myorder`
--

CREATE TABLE `myorder` (
  `s_no` int(11) NOT NULL,
  `order_id` varchar(15) DEFAULT NULL,
  `cid` varchar(25) DEFAULT NULL,
  `product_list` text DEFAULT NULL,
  `cart_date` date DEFAULT NULL,
  `cart_status` varchar(50) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `myorder`
--

INSERT INTO `myorder` (`s_no`, `order_id`, `cid`, `product_list`, `cart_date`, `cart_status`, `created_at`) VALUES
(1, 'N3091829PP', '1234q', NULL, '2023-10-26', 'Pending.', '2023-11-06 14:05:03'),
(2, '1XUIR72H3Q', '12342', NULL, '2023-10-26', 'Pending', '2023-11-06 14:05:06'),
(3, 'TLD820E1X3', '1234', '[{\"p_id\":\"2QG000\",\"p_name\":\"Country Hen\",\"qnty\":\"1\"},{\"p_id\":\"1AT8Y4\",\"p_name\":\"test\",\"qnty\":\"1\"}]', '2023-10-26', 'Pending', '2023-10-26 12:54:42'),
(4, 'TFC4510BN7', '1234', '[{\"p_id\":\"2QG000\",\"p_name\":\"Country Hen\",\"qnty\":\"2\"},{\"p_id\":\"1AT8Y4\",\"p_name\":\"test\",\"qnty\":\"2\"}]', '2023-10-30', 'Pending', '2023-10-30 10:03:18'),
(5, '45SO80QNMD', '1234', '[{\"p_id\":\"3QC469\",\"p_name\":\"Brinjal\",\"qnty\":\"2\"}]', '2023-10-30', 'Pending', '2023-10-30 10:07:13'),
(6, 'B75XP70VYU', '1234', '[{\"p_id\":\"7IV947\",\"p_name\":\" Custard apple\",\"qnty\":\"1\"}]', '2023-10-30', 'Pending', '2023-10-30 10:08:31'),
(7, 'OQ150J5U99', '1234', '[{\"p_id\":\"7IV947\",\"p_name\":\" Custard apple\",\"qnty\":\"2\"}]', '2023-11-06', 'Pending', '2023-11-06 13:10:50');

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
(1, '7UM405', 'F28977', 'PIC7UM405.jpg', 'Gauva', 'Lorem ipsum dolor sit, amet consectetur adipisicing elit. Cum molestiae laboriosam repudiandae\r\n                inventore deserunt tenetur officia aliquam repellat necessitatibus ullam! Illum nesciunt dicta velit\r\n                similique laudantium minus et debitis numquam!\r\n                Lorem ipsum dolor sit amet consectetur adipisicing elit. Magni recusandae iusto dicta animi qui minima\r\n                laborum adipisci? Eius fugiat officia tempore odit ad accusantium consectetur iste perspiciatis recusandae\r\n                sapiente. Pariatur.a sa sas\r\n                aks aks ka aks as', 100, 5, 'KG', 100, NULL, '2023-11-03 10:57:43', '2023-05-03 13:10:21'),
(2, '3QC469', 'V67543', 'PIC3QC469.jpg', 'Brinjal', 'Lorem ipsum dolor sit, amet consectetur adipisicing elit. Cum molestiae laboriosam repudiandae\r\n                inventore deserunt tenetur officia aliquam repellat necessitatibus ullam! Illum nesciunt dicta velit\r\n                similique laudantium minus et debitis numquam!\r\n                Lorem ipsum dolor sit amet consectetur adipisicing elit. Magni recusandae iusto dicta animi qui minima\r\n                laborum adipisci? Eius fugiat officia tempore odit ad accusantium consectetur iste perspiciatis recusandae\r\n                sapiente. Pariatur.a sa sas\r\n                aks aks ka aks as', 40, 0, 'KG', 18, NULL, '2023-11-03 10:58:04', '2023-05-03 13:15:12'),
(3, '4ZS112', 'V89765', 'UT226D0FJN.jpg', 'Eggs', '100% pure country chicken eggs for sales, low price and healthy', 10, 0, 'Piece', 180, 'eggs, hen egg, country chicken eggs', '2023-11-03 10:58:21', '2023-05-04 14:48:17'),
(4, '7IV947', 'F28977', 'PIC7IV947.jpg', ' Custard apple', 'Lorem ipsum dolor sit, amet consectetur adipisicing elit. Cum molestiae laboriosam repudiandae\r\n                inventore deserunt tenetur officia aliquam repellat necessitatibus ullam! Illum nesciunt dicta velit\r\n                similique laudantium minus et debitis numquam!\r\n                Lorem ipsum dolor sit amet consectetur adipisicing elit. Magni recusandae iusto dicta animi qui minima\r\n                laborum adipisci? Eius fugiat officia tempore odit ad accusantium consectetur iste perspiciatis recusandae\r\n                sapiente. Pariatur.a sa sas\r\n                aks aks ka aks as', 120, 5, 'KG', 97, 'sugar, apple', '2023-11-06 13:10:49', '2023-05-04 09:41:56'),
(5, '2QG000', 'V89765', 'PIC2QG000.jpg', 'Country Hen', 'Lorem ipsum dolor sit, amet consectetur adipisicing elit. Cum molestiae laboriosam repudiandae\r\n                inventore deserunt tenetur officia aliquam repellat necessitatibus ullam! Illum nesciunt dicta velit\r\n                similique laudantium minus et debitis numquam!\r\n                Lorem ipsum dolor sit amet consectetur adipisicing elit. Magni recusandae iusto dicta animi qui minima\r\n                laborum adipisci? Eius fugiat officia tempore odit ad accusantium consectetur iste perspiciatis recusandae\r\n                sapiente. Pariatur.a sa sas\r\n                aks aks ka aks as', 350, 25, 'KG', 91, NULL, '2023-11-03 10:58:25', '2023-05-04 09:44:23'),
(10, '1AT8Y4', 'GUV0B596', 'GV9S261428.jpg', 'Money plant', 'money plant, Dark green', 50, 0, 'shot', 1000, 'plant, money plants, green', '2023-11-07 16:22:10', NULL),
(11, '5DE28E', 'GUV0B596', 'C825ZZCAE3.jpg', 'Monstera Big', 'Monstera Bid leave, Air purifier, Indoor plants', 250, 15, 'Piece', 100, 'Monstera Bid leave, Air purifier, Indoor plants, Green plants, Without water palnts', '2023-11-07 15:27:04', NULL),
(12, 'D6E062', 'GUV0B596', 'K0J8SN89T2.jpg', 'Snake plant', 'Snake plant, Air purifier, Indoor plants', 150, 0, 'Piece', 200, 'Snake plant, Air purifier, Indoor plants, Green plants, Without water palnts', '2023-11-07 16:31:29', NULL);

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
(1, 'F28977', 'Fruits', 'fruits.jpg', '2023-11-05 15:17:01'),
(2, 'V67543', 'Vegetables', 'vegetables.jpg', '2023-11-05 15:17:18'),
(3, 'V89765', 'Nonvegetable', 'L7I8H0N922.jpg', '2023-11-05 16:14:33'),
(9, 'GUV0B596', 'Indoor plants', '3PW693LJJ4.jpg', '2023-11-07 15:21:12');

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
(1, '1234', '3QC469', 2, '\r\nLorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum', '2023-10-07 14:44:53'),
(2, '1234', '7UM405', 3, '\r\nLorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum', '2023-10-06 13:50:57'),
(3, '1234', '3QC469', 3, '\r\nLorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum', '2023-10-07 14:44:56'),
(4, '1234', '7UM405', 2, '\r\nLorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum', '2023-10-07 14:10:37'),
(5, '1234', '4ZS112', 5, '\r\nLorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum', '2023-10-07 14:10:34'),
(6, '1234', '2QG000', 4, '\r\nLorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum', '2023-10-07 14:27:01'),
(7, '1234', '4ZS112', 2, '\r\nLorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum', '2023-10-06 13:51:34'),
(8, '25611319', '2QG000', 3, 'asas', '2023-10-19 14:01:42'),
(9, '25611319', '2QG000', 3, 'asas', '2023-10-19 14:02:03');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `business_details`
--
ALTER TABLE `business_details`
  ADD PRIMARY KEY (`sno`);

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
-- AUTO_INCREMENT for table `business_details`
--
ALTER TABLE `business_details`
  MODIFY `sno` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `customers`
--
ALTER TABLE `customers`
  MODIFY `s_no` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `cus_log`
--
ALTER TABLE `cus_log`
  MODIFY `sno` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT for table `mycart`
--
ALTER TABLE `mycart`
  MODIFY `s_no` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;

--
-- AUTO_INCREMENT for table `myfav`
--
ALTER TABLE `myfav`
  MODIFY `sno` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=122;

--
-- AUTO_INCREMENT for table `myorder`
--
ALTER TABLE `myorder`
  MODIFY `s_no` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `s_no` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `product_category`
--
ALTER TABLE `product_category`
  MODIFY `cate_sno` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `review`
--
ALTER TABLE `review`
  MODIFY `sno` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
