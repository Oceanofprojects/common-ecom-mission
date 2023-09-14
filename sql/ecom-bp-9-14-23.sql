-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 14, 2023 at 10:32 AM
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
  `cid` varchar(25) DEFAULT NULL,
  `c_fname` text DEFAULT NULL,
  `c_lname` text DEFAULT NULL,
  `email` text DEFAULT NULL,
  `address` text DEFAULT NULL,
  `ph_num` text DEFAULT NULL,
  `pwd` longtext DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `customers`
--

INSERT INTO `customers` (`s_no`, `cid`, `c_fname`, `c_lname`, `email`, `address`, `ph_num`, `pwd`, `created_at`, `updated_at`) VALUES
(1, '1234', 'mani', 'k', 'mani@gmail.com', 'my address', '9090', '$2y$10$tWZUsQNecKa6rYDMSHPr3eoc1/EnYKCryORzvvXbxvO2IP2mGuwUG', '2023-05-27 07:38:58', '2023-03-21 07:25:07');

-- --------------------------------------------------------

--
-- Table structure for table `cus_log`
--

CREATE TABLE `cus_log` (
  `sno` int(11) NOT NULL,
  `uid` bigint(20) DEFAULT NULL,
  `cid` varchar(25) DEFAULT NULL,
  `ip_ad` varchar(25) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `cus_log`
--

INSERT INTO `cus_log` (`sno`, `uid`, `cid`, `ip_ad`, `created_at`) VALUES
(1, 3802279867, '1234', '120:000:122:9', '2023-09-03 15:44:44');

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
  `_date` date DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `mycart`
--

INSERT INTO `mycart` (`s_no`, `cart_id`, `cid`, `p_id`, `quantity`, `_date`, `created_at`, `updated_at`) VALUES
(1, 0, '1234', '4ZS112', 2, '2023-09-13', '2023-09-13 12:27:45', '2023-09-13 17:57:45'),
(2, 24, '1234', '7IV947', 2, '2023-09-13', '2023-09-13 12:22:19', '2023-09-13 17:52:19'),
(3, 48493, '1234', '3QC469', 2, '2023-09-13', '2023-09-13 12:24:54', '2023-09-13 17:54:54'),
(4, 59605, '1234', '2QG000', 2, '2023-09-13', '2023-09-13 12:27:33', '2023-09-13 17:57:33');

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
(44, '4ZS112', '1234', '2023-09-09 16:34:02', '2023-09-09 22:04:02'),
(47, '7IV947', '1234', '2023-09-09 16:54:56', '2023-09-09 22:24:56'),
(56, '7UM405', '1234', '2023-09-11 16:19:49', '2023-09-11 21:49:49');

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `s_no` int(11) NOT NULL,
  `p_id` varchar(25) DEFAULT NULL,
  `cate` text DEFAULT NULL,
  `p_img` text DEFAULT NULL,
  `p_name` varchar(50) DEFAULT NULL,
  `p_desc` text DEFAULT NULL,
  `price` int(11) DEFAULT NULL,
  `offer` int(11) DEFAULT NULL,
  `unit` varchar(25) DEFAULT NULL,
  `stock` int(11) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `update_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`s_no`, `p_id`, `cate`, `p_img`, `p_name`, `p_desc`, `price`, `offer`, `unit`, `stock`, `created_at`, `update_at`) VALUES
(1, '7UM405', 'Fruits', 'PIC7UM405.jpg', 'Gauva', 'Lorem ipsum dolor sit, amet consectetur adipisicing elit. Cum molestiae laboriosam repudiandae\r\n                inventore deserunt tenetur officia aliquam repellat necessitatibus ullam! Illum nesciunt dicta velit\r\n                similique laudantium minus et debitis numquam!\r\n                Lorem ipsum dolor sit amet consectetur adipisicing elit. Magni recusandae iusto dicta animi qui minima\r\n                laborum adipisci? Eius fugiat officia tempore odit ad accusantium consectetur iste perspiciatis recusandae\r\n                sapiente. Pariatur.a sa sas\r\n                aks aks ka aks as', 100, 5, 'KG', 0, '2023-09-10 10:11:09', '2023-05-03 13:10:21'),
(2, '3QC469', 'Vegetables', 'PIC3QC469.jpg', 'Brinjal', 'Lorem ipsum dolor sit, amet consectetur adipisicing elit. Cum molestiae laboriosam repudiandae\r\n                inventore deserunt tenetur officia aliquam repellat necessitatibus ullam! Illum nesciunt dicta velit\r\n                similique laudantium minus et debitis numquam!\r\n                Lorem ipsum dolor sit amet consectetur adipisicing elit. Magni recusandae iusto dicta animi qui minima\r\n                laborum adipisci? Eius fugiat officia tempore odit ad accusantium consectetur iste perspiciatis recusandae\r\n                sapiente. Pariatur.a sa sas\r\n                aks aks ka aks as', 40, 0, 'KG', 20, '2023-09-10 10:11:09', '2023-05-03 13:15:12'),
(3, '4ZS112', 'Non-veg', 'PIC8ER992.jpg', 'Eggs', 'Lorem ipsum dolor sit, amet consectetur adipisicing elit. Cum molestiae laboriosam repudiandae\r\n                inventore deserunt tenetur officia aliquam repellat necessitatibus ullam! Illum nesciunt dicta velit\r\n                similique laudantium minus et debitis numquam!\r\n                Lorem ipsum dolor sit amet consectetur adipisicing elit. Magni recusandae iusto dicta animi qui minima\r\n                laborum adipisci? Eius fugiat officia tempore odit ad accusantium consectetur iste perspiciatis recusandae\r\n                sapiente. Pariatur.a sa sas\r\n                aks aks ka aks as', 10, 0, 'Piece', 200, '2023-09-10 10:11:09', '2023-05-04 14:48:17'),
(4, '7IV947', 'Fruits', 'PIC7IV947.jpg', ' Custard apple', 'Lorem ipsum dolor sit, amet consectetur adipisicing elit. Cum molestiae laboriosam repudiandae\r\n                inventore deserunt tenetur officia aliquam repellat necessitatibus ullam! Illum nesciunt dicta velit\r\n                similique laudantium minus et debitis numquam!\r\n                Lorem ipsum dolor sit amet consectetur adipisicing elit. Magni recusandae iusto dicta animi qui minima\r\n                laborum adipisci? Eius fugiat officia tempore odit ad accusantium consectetur iste perspiciatis recusandae\r\n                sapiente. Pariatur.a sa sas\r\n                aks aks ka aks as', 120, 5, 'KG', 20, '2023-09-10 10:11:09', '2023-05-04 09:41:56'),
(5, '2QG000', 'Non-veg', 'PIC2QG000.jpg', 'Country Hen', 'Lorem ipsum dolor sit, amet consectetur adipisicing elit. Cum molestiae laboriosam repudiandae\r\n                inventore deserunt tenetur officia aliquam repellat necessitatibus ullam! Illum nesciunt dicta velit\r\n                similique laudantium minus et debitis numquam!\r\n                Lorem ipsum dolor sit amet consectetur adipisicing elit. Magni recusandae iusto dicta animi qui minima\r\n                laborum adipisci? Eius fugiat officia tempore odit ad accusantium consectetur iste perspiciatis recusandae\r\n                sapiente. Pariatur.a sa sas\r\n                aks aks ka aks as', 350, 25, 'KG', 10, '2023-09-10 10:11:09', '2023-05-04 09:44:23');

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
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`s_no`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `customers`
--
ALTER TABLE `customers`
  MODIFY `s_no` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `cus_log`
--
ALTER TABLE `cus_log`
  MODIFY `sno` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `mycart`
--
ALTER TABLE `mycart`
  MODIFY `s_no` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `myfav`
--
ALTER TABLE `myfav`
  MODIFY `sno` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=57;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `s_no` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
