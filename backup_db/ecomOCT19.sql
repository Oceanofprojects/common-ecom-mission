-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Oct 19, 2023 at 04:08 PM
-- Server version: 10.4.27-MariaDB
-- PHP Version: 7.4.33

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
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `customers`
--

INSERT INTO `customers` (`s_no`, `cid`, `role`, `c_name`, `c_gender`, `email`, `address_1`, `address_2`, `ph_num`, `whatsapp_num`, `pwd`, `profile`, `country`, `state`, `city`, `pin_code`, `created_at`, `updated_at`) VALUES
(1, '1234', NULL, 'mani', NULL, 'mani@gmail.com', 'my address', NULL, 9090, NULL, '$2y$10$tWZUsQNecKa6rYDMSHPr3eoc1/EnYKCryORzvvXbxvO2IP2mGuwUG', 'default.jpg', 'india', 'tamilnadu', 'chennai', 'chennai', '2023-10-18 12:57:18', '2023-03-21 07:25:07'),
(2, '22', NULL, 'mani', 'on', 'as', 'jiijji', 'bjib', 1234512345, 23, 'manimaran@123M', 'default', 'ijb', 'jib', 'ijb', '', '2023-10-19 11:05:03', NULL),
(3, 'T1TOC361', NULL, 'mani', 'on', 'mani1@gmail.com', 'jiijji', 'bjib', 1234512349, 1234567889, 'manimaran@123M', 'default', 'ijb', 'jib', 'ijb', '', '2023-10-18 15:27:59', NULL),
(4, '3UP1E7RT', NULL, 'kumar', 'on', 'kumar@gmail.com', 'joh', 'io', 7849738746, 7849738746, 'manimaran@123A', 'default', 'ioh', 'ioh', 'iohioh', '11', '2023-10-18 16:03:45', NULL),
(5, 'Y320177R', NULL, 'kumar1', 'on', 'kumar1@gmail.com', 'joh', 'io', 7849738740, 7849738740, '$2y$10$ll7bamsJCd8P.75x3MzbUuhGsSy0WHi2.SIP1ScmAzaAQdAD6wddC', 'default', 'ioh', 'ioh', 'iohioh', '11', '2023-10-18 16:09:16', NULL),
(6, '30510964', NULL, 'kumar12', 'on', 'kumar12@gmail.com', 'joh', 'io', 7849738741, 7849738741, '$2y$10$QKEpv5rfcQoQAaAY7deVUOq3QvvmbS2X8AqKws2svbh4Ph3xA9LgS', 'default', 'ioh', 'ioh', 'iohioh', '11', '2023-10-18 16:10:33', NULL),
(7, '25611319', NULL, 'Maran', 'male', 'manimaran18051999@gmail.com', 'Test address 1', 'Test address 1', 8939068212, 8939068212, '$2y$10$aqkeG/TgHmJLvAF1KjdETu/vbaY0YyWCl5vlH85Ej4J5cdU8rWsEW', 'pro2', 'India', 'Tamilnadu', 'Chennai', '600044', '2023-10-19 11:31:26', NULL),
(8, '69898247', 'customer', 'test ', 'male', 'j@gmail.com', 'asas', 'asas', 1234567899, 1234567899, '$2y$10$PsmJEvnHdkPRGD32CWz5y.rveeCzFc7dyR1ciz4w2or4RJVlGsovy', 'pro5', '', '', 'asas', '', '2023-10-19 14:07:53', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `customers_bp`
--

CREATE TABLE `customers_bp` (
  `s_no` int(11) NOT NULL DEFAULT 0,
  `cid` varchar(25) DEFAULT NULL,
  `c_fname` text DEFAULT NULL,
  `c_lname` text DEFAULT NULL,
  `email` text DEFAULT NULL,
  `address` text DEFAULT NULL,
  `ph_num` text DEFAULT NULL,
  `pwd` longtext DEFAULT NULL,
  `profile` varchar(15) DEFAULT NULL,
  `location` varchar(15) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `customers_bp`
--

INSERT INTO `customers_bp` (`s_no`, `cid`, `c_fname`, `c_lname`, `email`, `address`, `ph_num`, `pwd`, `profile`, `location`, `created_at`, `updated_at`) VALUES
(1, '1234', 'mani', 'k', 'mani@gmail.com', 'my address', '9090', '$2y$10$tWZUsQNecKa6rYDMSHPr3eoc1/EnYKCryORzvvXbxvO2IP2mGuwUG', 'default.jpg', 'chennai', '2023-10-07 13:50:42', '2023-03-21 07:25:07');

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
(1, '3802279867', '1234', '120:000:122:9', NULL, '2023-09-03 15:44:44'),
(2, 'E8KCV69EAPTV1V1PN0OD', '25611319', '0000:00:00:00', NULL, '2023-10-19 11:41:18'),
(3, 'VY910I7AQ259YH2AB1PH', '25611319', '0000:00:00:00', NULL, '2023-10-19 11:42:52'),
(4, 'Z350Z8V6FP30H8881NR1', '25611319', '0000:00:00:00', '2023-10-19', '2023-10-19 11:44:51'),
(5, 'IS2XN63OBUA7CHHVW04R', '25611319', '0000:00:00:00', '2023-10-19', '2023-10-19 12:30:36'),
(6, '2LU1T3C17JQC7Q8G97CF', '25611319', '0000:00:00:00', '2023-10-19', '2023-10-19 12:30:40'),
(7, 'V6A687G05SS1M8JZXIK5', '25611319', '0000:00:00:00', '2023-10-19', '2023-10-19 12:36:36'),
(8, 'QKK49V18PKQ4M49V891Y', '25611319', '0000:00:00:00', '2023-10-19', '2023-10-19 12:37:58'),
(9, '24515DVPGQR39CZFGEWI', '25611319', '0000:00:00:00', '2023-10-19', '2023-10-19 12:38:07'),
(10, 'PUEPQM17AE1687EMIO40', '25611319', '0000:00:00:00', '2023-10-19', '2023-10-19 12:38:11');

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
(1, 0, '1234', '4ZS112', 2, 0, '2023-09-13', '2023-10-14 17:33:57', '2023-10-14 23:03:57'),
(2, 24, '1234', '7IV947', 2, 0, '2023-09-13', '2023-10-14 16:52:19', '2023-09-30 18:50:53'),
(3, 48493, '1234', '3QC469', 2, 0, '2023-09-13', '2023-10-14 16:52:22', '2023-09-30 18:50:36'),
(4, 59605, '1234', '2QG000', 2, 0, '2023-09-13', '2023-10-14 17:29:38', '2023-10-14 22:59:38'),
(5, 33740, '1234', '2QG000', 2, 1, '2023-09-30', '2023-10-14 17:29:38', '2023-10-14 22:59:38'),
(6, 82912, '1234', '3QC469', 3, 1, '2023-09-30', '2023-10-14 17:25:54', '2023-09-30 18:57:45'),
(7, 21912, '1234', '4ZS112', 2, 1, '2023-09-30', '2023-10-14 17:33:57', '2023-10-14 23:03:57'),
(8, 29984, '1234', '4ZS112', 2, 0, '2023-10-04', '2023-10-14 17:33:57', '2023-10-14 23:03:57'),
(9, 42644, '1234', '1AT8Y4', 10, 0, '2023-10-11', '2023-10-14 16:52:31', '2023-10-11 22:17:15'),
(15, 28281, '1234', '4ZS112', 2, 1, '2023-10-14', '2023-10-14 17:33:57', '2023-10-14 23:03:57'),
(16, 70655, '1234', '3QC469', 2, 1, '2023-10-14', '2023-10-14 17:34:12', '2023-10-14 23:04:12');

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
(85, '4ZS112', '1234', '2023-10-07 13:24:34', '2023-10-07 18:54:34'),
(102, '2QG000', '1234', '2023-10-14 15:31:09', '2023-10-14 21:01:09'),
(105, '2QG000', '25611319', '2023-10-19 13:39:48', '2023-10-19 19:09:48');

-- --------------------------------------------------------

--
-- Table structure for table `myorder`
--

CREATE TABLE `myorder` (
  `s_no` int(11) NOT NULL,
  `order_id` varchar(15) DEFAULT NULL,
  `cid` varchar(25) DEFAULT NULL,
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
  `cate` text DEFAULT NULL,
  `cate_img` varchar(15) DEFAULT NULL,
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
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`s_no`, `p_id`, `cate`, `cate_img`, `p_img`, `p_name`, `p_desc`, `price`, `offer`, `unit`, `stock`, `tags`, `created_at`, `update_at`) VALUES
(1, '7UM405', 'Fruits', 'fruits.jpg', 'PIC7UM405.jpg', 'Gauva', 'Lorem ipsum dolor sit, amet consectetur adipisicing elit. Cum molestiae laboriosam repudiandae\r\n                inventore deserunt tenetur officia aliquam repellat necessitatibus ullam! Illum nesciunt dicta velit\r\n                similique laudantium minus et debitis numquam!\r\n                Lorem ipsum dolor sit amet consectetur adipisicing elit. Magni recusandae iusto dicta animi qui minima\r\n                laborum adipisci? Eius fugiat officia tempore odit ad accusantium consectetur iste perspiciatis recusandae\r\n                sapiente. Pariatur.a sa sas\r\n                aks aks ka aks as', 100, 5, 'KG', 0, NULL, '2023-10-02 16:24:47', '2023-05-03 13:10:21'),
(2, '3QC469', 'Vegetables', 'vegetables.jpg', 'PIC3QC469.jpg', 'Brinjal', 'Lorem ipsum dolor sit, amet consectetur adipisicing elit. Cum molestiae laboriosam repudiandae\r\n                inventore deserunt tenetur officia aliquam repellat necessitatibus ullam! Illum nesciunt dicta velit\r\n                similique laudantium minus et debitis numquam!\r\n                Lorem ipsum dolor sit amet consectetur adipisicing elit. Magni recusandae iusto dicta animi qui minima\r\n                laborum adipisci? Eius fugiat officia tempore odit ad accusantium consectetur iste perspiciatis recusandae\r\n                sapiente. Pariatur.a sa sas\r\n                aks aks ka aks as', 40, 0, 'KG', 20, NULL, '2023-10-02 16:24:55', '2023-05-03 13:15:12'),
(3, '4ZS112', 'Non-veg', 'non_veg.jpg', 'PIC8ER992.jpg', 'Eggs', '100% pure country chicken eggs for sales, low price and healthy', 10, 0, 'Piece', 200, 'eggs, hen egg, country chicken eggs', '2023-10-18 11:10:05', '2023-05-04 14:48:17'),
(4, '7IV947', 'Fruits', 'fruits.jpg', 'PIC7IV947.jpg', ' Custard apple', 'Lorem ipsum dolor sit, amet consectetur adipisicing elit. Cum molestiae laboriosam repudiandae\r\n                inventore deserunt tenetur officia aliquam repellat necessitatibus ullam! Illum nesciunt dicta velit\r\n                similique laudantium minus et debitis numquam!\r\n                Lorem ipsum dolor sit amet consectetur adipisicing elit. Magni recusandae iusto dicta animi qui minima\r\n                laborum adipisci? Eius fugiat officia tempore odit ad accusantium consectetur iste perspiciatis recusandae\r\n                sapiente. Pariatur.a sa sas\r\n                aks aks ka aks as', 120, 5, 'KG', 20, 'egg, red egg', '2023-10-18 11:17:34', '2023-05-04 09:41:56'),
(5, '2QG000', 'Non-veg', 'non_veg.jpg', 'PIC2QG000.jpg', 'Country Hen', 'Lorem ipsum dolor sit, amet consectetur adipisicing elit. Cum molestiae laboriosam repudiandae\r\n                inventore deserunt tenetur officia aliquam repellat necessitatibus ullam! Illum nesciunt dicta velit\r\n                similique laudantium minus et debitis numquam!\r\n                Lorem ipsum dolor sit amet consectetur adipisicing elit. Magni recusandae iusto dicta animi qui minima\r\n                laborum adipisci? Eius fugiat officia tempore odit ad accusantium consectetur iste perspiciatis recusandae\r\n                sapiente. Pariatur.a sa sas\r\n                aks aks ka aks as', 350, 25, 'KG', 10, NULL, '2023-10-02 16:28:16', '2023-05-04 09:44:23'),
(10, '1AT8Y4', 'Fruits', 'fruits.jpg', 'IZ4GNCH5DS.jpg', 'test', 'test', 10, 0, 'test', 10, 'as,a,sa,s,sds,ds,ds,ds,d', '2023-10-11 16:40:25', NULL);

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
  MODIFY `s_no` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `cus_log`
--
ALTER TABLE `cus_log`
  MODIFY `sno` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `mycart`
--
ALTER TABLE `mycart`
  MODIFY `s_no` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `myfav`
--
ALTER TABLE `myfav`
  MODIFY `sno` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=106;

--
-- AUTO_INCREMENT for table `myorder`
--
ALTER TABLE `myorder`
  MODIFY `s_no` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `s_no` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `review`
--
ALTER TABLE `review`
  MODIFY `sno` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
