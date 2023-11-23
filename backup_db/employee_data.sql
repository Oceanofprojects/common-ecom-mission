-- phpMyAdmin SQL Dump
-- version 4.1.14
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Jul 28, 2023 at 10:10 AM
-- Server version: 5.6.17
-- PHP Version: 5.5.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `employee_data`
--

-- --------------------------------------------------------

--
-- Table structure for table `employees`
--

CREATE TABLE IF NOT EXISTS `employees` (
  `id` int(6) NOT NULL AUTO_INCREMENT,
  `name` varchar(30) NOT NULL,
  `surname` varchar(80) NOT NULL,
  `email` varchar(50) DEFAULT NULL,
  `phone` varchar(20) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8mb4 AUTO_INCREMENT=10 ;

--
-- Dumping data for table `employees`
--

INSERT INTO `employees` (`id`, `name`, `surname`, `email`, `phone`) VALUES
(1, 'test', 'test', 'test@gmail.com', '65675765765'),
(2, 'demo111', 'demo', 'demo', '12354425'),
(3, 'Bala', 'M', 'bala@gmail.com', '1377357835'),
(4, 'gfg', 'ghdf', 'dghd', '785785'),
(5, 'Muthu', 'Mithran', 'mm@gmail.com', '75785'),
(6, 'demo12555555', 'demo12', 'demo12@gmail.com', '3907902457359074'),
(9, 'manimaran', 'k', 'mani@gmail.com', '123456');

-- --------------------------------------------------------

--
-- Table structure for table `employee_details`
--

CREATE TABLE IF NOT EXISTS `employee_details` (
  `emp_id` int(11) NOT NULL AUTO_INCREMENT,
  `emp_first_name` varchar(255) NOT NULL,
  `emp_last_name` varchar(255) NOT NULL,
  `emp_phone_no` bigint(20) NOT NULL,
  `emp_email_id` varchar(255) NOT NULL,
  `emp_gender` varchar(255) NOT NULL,
  `emp_state` varchar(255) NOT NULL,
  `emp_country` varchar(255) NOT NULL,
  `emp_bloodgroup` varchar(255) NOT NULL,
  `emp_user_name` varchar(255) NOT NULL,
  `emp_password` varchar(255) NOT NULL,
  `emp_dob` varchar(255) NOT NULL,
  `emp_status` enum('active','deactive') NOT NULL,
  PRIMARY KEY (`emp_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8mb4 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `employee_details`
--

INSERT INTO `employee_details` (`emp_id`, `emp_first_name`, `emp_last_name`, `emp_phone_no`, `emp_email_id`, `emp_gender`, `emp_state`, `emp_country`, `emp_bloodgroup`, `emp_user_name`, `emp_password`, `emp_dob`, `emp_status`) VALUES
(1, 'demo_test', 'tt', 8765428765, 'mani@gmail.com', 'male', 'tamilnadu', 'india', 'b+', 'mani', 'Manimaran@123', '18/05/1999', 'active'),
(2, 'kumar', 'k', 1234665431, 'kumar@gmail.com', 'male', 'Tamilnadu', 'india', 'B-', 'mani', 'mani@A123', '18/05/1999', 'active');

-- --------------------------------------------------------

--
-- Table structure for table `employee_study_detail`
--

CREATE TABLE IF NOT EXISTS `employee_study_detail` (
  `emp_study_id` int(11) NOT NULL AUTO_INCREMENT,
  `emp_tenth_mark` int(11) NOT NULL,
  `emp_twelth_mark` int(11) NOT NULL,
  `emp_diploma_degree` varchar(255) NOT NULL,
  `emp_diploma_mark` int(11) NOT NULL,
  `emp_ug_deg` varchar(255) NOT NULL,
  `emp_ug_marks` int(11) NOT NULL,
  `emp_post_degree` varchar(255) NOT NULL,
  `emp_post_marks` int(11) NOT NULL,
  `emp_parent_id` int(11) NOT NULL,
  PRIMARY KEY (`emp_study_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8mb4 AUTO_INCREMENT=5 ;

--
-- Dumping data for table `employee_study_detail`
--

INSERT INTO `employee_study_detail` (`emp_study_id`, `emp_tenth_mark`, `emp_twelth_mark`, `emp_diploma_degree`, `emp_diploma_mark`, `emp_ug_deg`, `emp_ug_marks`, `emp_post_degree`, `emp_post_marks`, `emp_parent_id`) VALUES
(1, 333, 455, 'dce', 54, 'CSC', 70, 'MSC', 80, 1),
(2, 345, 333, 'eee', 54, 'CSC', 70, 'Msc', 80, 3),
(3, 333, 455, 'dce', 54, 'CSC', 70, 'CSC', 80, 1),
(4, 333, 455, 'Dce', 54, 'CSC', 70, 'CSC', 80, 1);

-- --------------------------------------------------------

--
-- Table structure for table `employee_work_exp`
--

CREATE TABLE IF NOT EXISTS `employee_work_exp` (
  `emp_exp_id` int(11) NOT NULL AUTO_INCREMENT,
  `emp_prev_company_name` varchar(255) NOT NULL,
  `emp_prev_company_email` varchar(255) NOT NULL,
  `emp_prev_company_contact_num` int(11) NOT NULL,
  `emp_prev_company_address` varchar(255) NOT NULL,
  `emp_prev_ref_contact_name` varchar(255) NOT NULL,
  `emp_prev_ref_contact_num` int(11) NOT NULL,
  `emp_prev_ref_contact_email` varchar(255) NOT NULL,
  `emp_prev_salary` int(11) NOT NULL,
  `emp_prev_designation` varchar(255) NOT NULL,
  `emp_prev_work_start_date` date NOT NULL,
  `emp_prev_work_end_date` date NOT NULL,
  `emp_total_exp` varchar(255) NOT NULL,
  `emp_parent_id` int(11) NOT NULL,
  PRIMARY KEY (`emp_exp_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8mb4 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `employee_work_exp`
--

INSERT INTO `employee_work_exp` (`emp_exp_id`, `emp_prev_company_name`, `emp_prev_company_email`, `emp_prev_company_contact_num`, `emp_prev_company_address`, `emp_prev_ref_contact_name`, `emp_prev_ref_contact_num`, `emp_prev_ref_contact_email`, `emp_prev_salary`, `emp_prev_designation`, `emp_prev_work_start_date`, `emp_prev_work_end_date`, `emp_total_exp`, `emp_parent_id`) VALUES
(1, 'apps Freedom', 'safs@gmail.com', 655765878, 'gftrvdhbd', 'gfffff', 5676576, 'hghgh@gmail.com', 30000, 'Developer', '2023-01-12', '2023-07-30', '3', 1),
(2, 'google', 'suba@gmail.com', 2147483647, 'devakottai', 'sai', 67878787, 'sai@gmail.com', 40000, 'Developer', '2023-01-04', '2023-01-16', '3', 2),
(3, 'softtech', 'softtech@gmail.com', 987654322, 'gopal puram', 'shree', 54567898, 'gopal@gmail.com', 50000, 'developer', '2022-07-21', '2023-07-11', '2', 1);

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE IF NOT EXISTS `orders` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `product_name` text,
  `product_price` int(11) DEFAULT NULL,
  `product_qty` int(11) DEFAULT NULL,
  `product_model` text,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`id`, `product_name`, `product_price`, `product_qty`, `product_model`) VALUES
(1, 'product1', 1000, 10000, 'KASN'),
(2, 'product2', 10000, 100000, 'aaaaKASN');

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE IF NOT EXISTS `products` (
  `product_id` int(11) NOT NULL AUTO_INCREMENT,
  `product_category_parent_id` int(11) NOT NULL,
  `product_name` varchar(255) NOT NULL,
  `product_price` float NOT NULL,
  `product_qty` int(11) NOT NULL,
  `product_size` varchar(100) NOT NULL,
  `product_description` text NOT NULL,
  `product_model` varchar(100) NOT NULL,
  `product_brand` varchar(255) NOT NULL,
  `product_status` enum('active','inactive') NOT NULL,
  PRIMARY KEY (`product_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8mb4 AUTO_INCREMENT=11 ;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`product_id`, `product_category_parent_id`, `product_name`, `product_price`, `product_qty`, `product_size`, `product_description`, `product_model`, `product_brand`, `product_status`) VALUES
(6, 0, 'iPhone', 200000, 10000, '12', 'm mls lam slam slam sla lms ', 'UI', 'KO', 'active'),
(10, 0, 'Headphone', 1500, 1000, '12', ' kaska ska ska skansjajs ja sja sjas jas ja sajs ', 'MI', 'MI', 'active');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
