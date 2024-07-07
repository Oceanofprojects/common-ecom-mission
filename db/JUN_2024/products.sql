-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Jun 23, 2024 at 12:18 PM
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
(8, '7423P5MX', 'O0LCB6', 0, '', 'JB5ZOZ6JEM.jpeg', 'Cotton Candy Cactus', 'Its a good air purifire', 150, 0, 'Piece', 0, 20, 'Good', 1, '2024-06-23 10:18:16', NULL),
(9, '7423P5MX', 'M357VP', 0, '', '2Q82E820GP.jpeg', 'Brain cactus', '.', 250, 0, 'Piece', 0, 20, 'Good', 1, '2024-06-23 10:18:16', NULL),
(10, '7423P5MX', 'S18H48', 0, '', '768638D199.jpeg', 'Monkey Tail', '.', 350, 0, 'Piece', 0, 10, 'Good ', 1, '2024-06-23 10:18:16', NULL),
(11, '7423P5MX', 'MU632J', 0, '', '2J2G03JXDW.jpeg', 'Stenno Cactus', '.', 150, 0, 'Piece', 0, 20, 'Good', 1, '2024-06-23 10:18:16', NULL),
(12, '7423P5MX', '2FF710', 0, '', 'KQ8N19U515.jpeg', 'Rebutia Red Flower', ',', 150, 0, 'Piece', 0, 20, 'Good', 1, '2024-06-23 10:18:16', NULL),
(13, '7423P5MX', '1V9ZJG', 0, '', '00FXV06RQG.jpeg', 'Euphorbia', '.', 150, 0, 'Piece', 0, 20, 'Good', 1, '2024-06-23 10:18:16', NULL),
(14, '7423P5MX', '81ZYF7', 0, '', '50JC0Y748B.jpeg', 'Huernia Green Flowers', '.', 150, 0, 'Piece', 0, 20, 'Good', 1, '2024-06-23 10:18:16', NULL),
(15, '7423P5MX', 'X434E6', 0, '', '1671SKIBOX.jpeg', 'Bunny ear White', '.', 150, 0, 'Piece', 0, 20, 'Good', 1, '2024-06-23 10:18:16', NULL),
(16, '7423P5MX', 'N2LCND', 0, '', 'X75PLMH19E.jpeg', 'Huernia Red ', '.', 150, 0, 'Piece', 0, 20, 'Good', 1, '2024-06-23 10:18:16', NULL),
(17, '7423P5MX', '85EC0O', 0, '', '7F8B19961J.jpeg', 'Bunny Ear Yellow', '.', 150, 0, 'Per Piece', 0, 20, 'Good', 1, '2024-06-23 10:18:16', NULL),
(18, '7423P5MX', '6SH18L', 0, '', '5SZI92Y038.jpeg', 'Cactus', '.', 150, 0, 'Per Piece', 0, 20, 'Good', 1, '2024-06-23 10:18:16', NULL),
(19, '7423P5MX', '5ER8R9', 0, '', '87ZMOAT7P3.jpeg', 'Varigated lactae ', '.', 150, 0, 'Piece', 0, 20, 'Good', 1, '2024-06-23 10:18:16', NULL),
(20, '7423P5MX', '4KK8G7', 0, '', 'P6279PSTC2.jpeg', 'Gymnocalcium Pink', '.', 150, 0, 'Piece', 0, 20, 'Good', 1, '2024-06-23 10:18:16', NULL),
(21, '7423P5MX', 'W85601', 0, '', 'D3383MU59U.jpeg', 'Copper King', '.', 150, 0, 'Per Piece', 0, 20, 'Good', 1, '2024-06-23 10:18:16', NULL),
(22, '7423P5MX', 'YYN90I', 0, '', 'YPMM9VT9OQ.jpeg', 'Drumstick Cactus', '.', 150, 0, 'Per Piece', 0, 20, 'Good', 1, '2024-06-23 10:18:16', NULL),
(23, '7423P5MX', '466MIJ', 0, '', 'Y3S57L9I9Y.jpeg', 'Stapelia Giganta (Ballon Flower)', '.', 150, 0, 'Per Piece', 0, 20, 'Good', 1, '2024-06-23 10:18:16', NULL),
(24, '7423P5MX', '555A0M', 0, '', '8GRL5B596L.jpeg', 'Bunny Ear Red', '.', 150, 0, 'Per Piece', 0, 20, 'Good', 1, '2024-06-23 10:18:16', NULL),
(25, '7423P5MX', '7KAN26', 0, '', 'A054U45J29.jpeg', 'Huernia Brown Flower', '.', 150, 0, 'Per Piece', 0, 20, 'Good', 1, '2024-06-23 10:18:16', NULL),
(26, '7423P5MX', 'AM84S6', 0, '', 'Q5L45Z9YIR.jpeg', 'Stapelia Giganta White flower', '.', 150, 0, 'Per Piece', 0, 20, 'Good', 1, '2024-06-23 10:18:16', NULL),
(27, '7423P5MX', 'R0SP68', 0, '', 'CFF30R2MNP.jpeg', 'Peanut Cactus', '.', 150, 0, 'Per Piece', 0, 20, 'Good', 1, '2024-06-23 10:18:16', NULL),
(28, '7423P5MX', '06416N', 0, '', 'LR8KLSS917.jpeg', 'Gymno Calcium ', '.', 150, 0, 'Per Piece', 0, 20, 'Good', 1, '2024-06-23 10:18:16', NULL),
(29, 'V8NACB03', 'PX6QNH', 0, '', 'C1R0G772B6.jpg', 'Aloe-green-Blush', 'good', 150, 0, 'piece', 0, 10, 'Aloe-green-Blush', 1, '2024-06-23 10:18:16', NULL),
(30, 'V8NACB03', 'T2R522', 0, '', 'G72WHBD6D0.jpg', 'Aloe-Pink-Blush', 'good', 150, 0, 'piece', 0, 10, 'Aloe-Pink-Blush', 1, '2024-06-23 10:18:16', NULL),
(31, 'V8NACB03', 'H667FH', 0, '', '1A21828615.jpg', 'dark green Haworthia', 'good', 50, 0, 'piece', 0, 10, ' Haworthia', 1, '2024-06-23 10:18:16', NULL),
(32, 'V8NACB03', '6D3NAI', 0, '', 'K59OG20580.jpg', 'Gasteria Maculata', 'good', 150, 0, 'piece', 0, 10, 'Gasteria Maculata', 1, '2024-06-23 10:18:16', NULL),
(33, 'V8NACB03', 'PK7P47', 0, '', '5IG37LR60N.jpg', 'Gasteria maculata123', 'good', 150, 0, 'piece', 0, 10, 'Gasteria maculata123', 1, '2024-06-23 10:18:16', NULL),
(34, 'V8NACB03', '70H6EI', 0, '', 'NT5N4LGH65.jpg', 'Haworthia Facsciata', 'good', 60, 0, 'piece', 0, 10, 'Haworthia Facsciata', 1, '2024-06-23 10:18:16', NULL),
(35, 'V8NACB03', 'NV50OV', 0, '', '1V88G75NP3.jpg', 'Haworthia Reinwardtii (tower)', 'good', 120, 0, 'piece', 0, 10, 'Haworthia Reinwardtii (tower)', 1, '2024-06-23 10:18:16', NULL),
(36, 'V8NACB03', 'NXPM14', 0, '', 'F374982OX7.jpg', 'Haworthia- star fish  dark green', 'good', 170, 0, 'piece', 0, 10, 'Haworthia- star fish  dark green', 1, '2024-06-23 10:18:16', NULL),
(37, 'V8NACB03', 'NIXRLL', 0, '', 'YK08X17R58.jpg', 'Haworthia- star fish', 'good', 150, 0, 'piece', 0, 10, 'Haworthia- star fish', 1, '2024-06-23 10:18:16', NULL),
(38, 'V8NACB03', 'C1AY46', 0, '', '5WGGGB8NGO.jpeg', 'haworthia', 'good', 200, 0, 'piece', 0, 10, 'haworthia', 1, '2024-06-23 10:18:16', NULL),
(39, 'V8NACB03', 'UZ014F', 0, '', 'EV75766203.jpg', 'haworthialimifoliaspiralis_6', 'good', 80, 0, 'piece', 0, 10, 'haworthialimifoliaspiralis_6', 1, '2024-06-23 10:18:16', NULL),
(40, 'V8NACB03', 'V2GQC5', 0, '', '87A3574U95.jpg', 'Haworthia-snow drops', 'good', 120, 0, 'piece', 0, 10, 'Haworthia-snow drops', 1, '2024-06-23 10:18:16', NULL),
(41, 'V8NACB03', 'ZN9K24', 0, '', '6E089T2E25.jpg', 'haworthia', 'good', 50, 0, 'piece', 0, 10, 'Haworthia-', 1, '2024-06-23 10:18:16', NULL),
(42, 'V8NACB03', '43E8RW', 0, '', 'KTHPTOZS7Q.jpg', 'king Haworthia-', 'good', 130, 0, 'piece', 0, 10, 'king Haworthia-', 1, '2024-06-23 10:18:16', NULL),
(43, 'V8NACB03', 'QM850T', 0, '', 'VW5AWT0CTW.jpeg', 'pencil aloe Haworthia-', 'good', 100, 0, 'piece', 0, 10, 'pencil alo Haworthia-', 1, '2024-06-23 10:18:16', NULL),
(44, 'V8NACB03', '0Y6LHE', 0, '', '2TS3F24PCL.jpeg', 'alovera dwarf (orange flowers) Haworthia-', 'good', 50, 0, 'piece', 0, 10, 'alovera dwarf (orange flowers) Haworthia-', 1, '2024-06-23 10:18:16', NULL),
(45, 'V8NACB03', '3WQHM6', 0, '', '431GC65D08.jpeg', 'dark green alo Haworthia-', 'good', 50, 0, 'piece', 0, 10, 'dark green alo Haworthia-', 1, '2024-06-23 10:18:16', NULL),
(46, 'V8NACB03', 'PK3JA5', 0, '', '5DM1192KLD.jpeg', 'alovera country side', 'good', 30, 0, 'piece', 0, 10, 'alovera country side', 1, '2024-06-23 10:18:16', NULL),
(47, 'G47T0H02', '7L38G0', 0, '', 'U49746Q8H6.jpg', 'betel leaf (magai paan)', 'GOOD', 30, 0, 'piece', 0, 10, 'betel leaf (magai paan)', 1, '2024-06-23 10:18:16', NULL),
(48, 'G47T0H02', 'O5X968', 0, '', 'M8TA0G0K3W.jpg', 'insulin-plant-costus-igneus-plant', 'good', 50, 0, 'piece', 0, 10, 'insulin-plant-costus-igneus-plant', 1, '2024-06-23 10:18:16', NULL),
(49, 'G47T0H02', 'JR2T6M', 0, '', '6LVHQQW7N9.jpg', 'insulin-plant-costus-igneus-plant', 'good', 30, 0, 'piece', 0, 10, 'insulin-plant-costus-igneus-plant', 1, '2024-06-23 10:18:16', NULL),
(50, 'G47T0H02', '0961XK', 0, '', 'UWBQ4CFW95.jpg', 'naatu pirandai', 'good', 30, 0, 'piece', 0, 10, 'naatu pirandai', 1, '2024-06-23 10:18:16', NULL),
(51, 'G47T0H02', 'OQ3486', 0, '', '542QH7PGOM.jpg', 'nurserylive-tulsi-plants-category-image', 'good', 30, 0, 'piece', 0, 10, 'nurserylive-tulsi-plants-category-image', 1, '2024-06-23 10:18:16', NULL),
(52, 'G47T0H02', '1NF9L3', 0, '', '79V5R332XQ.jpg', 'pennywort', 'good', 50, 0, 'piece', 0, 10, 'pennywort', 1, '2024-06-23 10:18:16', NULL),
(53, 'G47T0H02', '8F6HN3', 0, '', 'M0XKDY0EHH.jpg', 'Rosemary-New-', 'good', 50, 0, 'piece', 0, 10, 'Rosemary-New-', 1, '2024-06-23 10:18:16', NULL),
(54, 'G47T0H02', 'J8LZ02', 0, '', 'W77ZY0S834.jpg', 'tulsikrishna', 'good', 30, 0, 'piece', 0, 10, 'tulsikrishna', 1, '2024-06-23 10:18:16', NULL),
(55, 'G47T0H02', 'Y4DLD9', 0, '', '2U7DKB5X56.jpeg', 'muppirandai', 'good', 50, 0, 'piece', 0, 10, 'muppirandai', 1, '2024-06-23 10:18:16', NULL),
(56, 'G47T0H02', '8J5UBB', 0, '', '2S0O7W0Q5T.jpeg', 'muppirandai', 'good', 50, 0, 'piece', 0, 10, 'muppirandai', 1, '2024-06-23 10:18:16', NULL),
(57, 'G47T0H02', '4HF030', 0, '', 'W32L0RAA72.jpg', 'ilai pirandai123', 'good', 50, 0, 'piece', 0, 10, 'ilai pirandai123', 1, '2024-06-23 10:18:16', NULL),
(58, 'JLABA128', 'Y4157U', 0, '', 'KL5C8472IM.jpg', 'Callisia fragrans', 'good', 50, 0, 'piece', 0, 10, 'Callisia fragrans', 1, '2024-06-23 10:18:16', NULL),
(59, 'JLABA128', 'HXO1R7', 0, '', '9FXJU019VI.jpeg', 'Callisia Repens(green)', 'good', 40, 0, 'piece', 0, 5, 'Callisia Repens(green)', 1, '2024-06-23 10:18:16', NULL),
(60, 'JLABA128', 'MC5KBQ', 0, '', '2JA82PSZ6B.jpg', 'Callisia Repens(purple)', 'good', 40, 0, 'piece', 0, 10, 'Callisia Repens(purple)', 1, '2024-06-23 10:18:16', NULL),
(61, 'JLABA128', 'WW1877', 0, '', 'AAU50DSW1A.jpg', 'enjoy pothos', 'good', 80, 0, 'piece', 0, 10, 'enjoy pothos', 1, '2024-06-23 10:18:16', NULL),
(62, 'JLABA128', '9SC342', 0, '', 'YWE84CE6ME.jpg', 'Golden Pothos Epipremnum', 'good', 80, 0, 'piece', 0, 10, 'Golden Pothos Epipremnum', 1, '2024-06-23 10:18:16', NULL),
(63, 'JLABA128', 'K52C6R', 0, '', '231R16SK1Z.jpg', 'Large-Nanouk-683x1024', 'good', 120, 0, 'piece', 0, 10, 'Large-Nanouk-683x1024', 1, '2024-06-23 10:18:16', NULL),
(64, 'JLABA128', '4565RH', 0, '', 'GY1F48ZNC5.jpg', 'manjula pothos', 'good', 80, 0, 'piece', 0, 10, 'manjula pothos', 1, '2024-06-23 10:18:16', NULL),
(65, 'JLABA128', '1PK31O', 0, '', '5408ST09O6.jpg', 'normal pothos', 'good', 40, 0, 'piece', 0, 10, 'normal pothos', 1, '2024-06-23 10:18:16', NULL),
(66, 'JLABA128', '0N7R95', 0, '', '81976WLEQ0.jpeg', 'purple-heart-plants-', 'good', 40, 0, 'piece', 0, 10, 'purple-heart-plants-', 1, '2024-06-23 10:18:16', NULL),
(67, 'JLABA128', 'FZ7WVX', 0, '', 'L53R0M8UK1.jpg', 'red-alternanthera-basket', 'good', 40, 0, 'piece', 0, 10, 'red-alternanthera-basket', 1, '2024-06-23 10:18:16', NULL),
(68, 'JLABA128', 'CL930Y', 0, '', '8M34951N7Z.jpeg', 'Rheo', 'good', 60, 0, 'piece', 0, 10, 'Rheo', 1, '2024-06-23 10:18:16', NULL),
(69, 'JLABA128', '91VC0J', 0, '', '8L52T44B42.jpeg', 'Rheo12', 'good', 40, 0, 'piece', 0, 10, 'Rheo12', 1, '2024-06-23 10:18:16', NULL),
(70, 'JLABA128', '52Z83R', 0, '', 'ET5KXWXL59.jpeg', 'String of hearts', 'good', 120, 0, 'piece', 0, 10, 'String of hearts', 1, '2024-06-23 10:18:16', NULL),
(71, 'JLABA128', '2C56PR', 0, '', 'XRTU90K46F.jpeg', 'String of hearts', 'good', 120, 0, 'piece', 0, 10, 'String of hearts', 1, '2024-06-23 10:18:16', NULL),
(72, 'JLABA128', 'T4727U', 0, '', '2Y01E40749.jpeg', 'String of hearts', 'good', 120, 0, 'piece', 0, 10, 'String of hearts', 1, '2024-06-23 10:18:16', NULL),
(73, 'JLABA128', 'QE9NKS', 0, '', '88V9P7AVJ0.jpeg', 'String of hearts', 'good', 120, 0, 'piece', 0, 10, 'String of hearts', 1, '2024-06-23 10:18:16', NULL),
(74, 'JLABA128', '18ILSB', 0, '', 'X4JB5WG300.jpeg', 'String of hearts', 'good', 120, 0, 'piece', 0, 10, 'String of hearts', 1, '2024-06-23 10:18:16', NULL),
(75, 'JLABA128', 'H4HXJ8', 0, '', '2D0R623PS4.jpeg', 'tangled heart', 'good', 50, 0, 'piece', 0, 10, 'tangled heart', 1, '2024-06-23 10:18:16', NULL),
(76, 'JLABA128', '9W8W0B', 0, '', 'LF5U9B175Z.jpeg', 'Variegated String of Pearls', 'good', 130, 0, 'piece', 0, 10, 'Variegated String of Pearls', 1, '2024-06-23 10:18:16', NULL),
(77, 'JLABA128', 'W884ZP', 0, '', 'W60PST0D1U.jpeg', 'Variegated String of Pearls', 'good', 130, 0, 'piece', 0, 10, 'Variegated String of Pearls', 1, '2024-06-23 10:18:16', NULL),
(78, 'JLABA128', 'TNOCUC', 0, '', 'GZ9F1775D3.jpeg', 'Varigated Rheo', 'good', 50, 0, 'piece', 0, 10, 'Varigated Rheo', 1, '2024-06-23 10:18:16', NULL),
(79, 'JLABA128', '9NH289', 0, '', 'H4621VT74A.jpeg', 'Varigated String of hearts', 'good', 130, 0, 'piece', 0, 10, 'Varigated String of hearts', 1, '2024-06-23 10:18:16', NULL),
(80, 'JLABA128', '2I246F', 0, '', '838K617J5P.jpg', 'wandering jew white', 'good', 100, 0, 'piece', 0, 10, 'wandering jew white', 1, '2024-06-23 10:18:16', NULL),
(81, 'JLABA128', 'VW5251', 0, '', 'FII68Y86FD.jpg', 'wandering jew', 'good', 40, 0, 'piece', 0, 10, 'wandering jew', 1, '2024-06-23 10:18:16', NULL),
(82, 'G47T0H02', '6GCHRX', 0, '', '4556X99RAU.jpeg', 'mexican mint', 'good', 30, 0, 'piece', 0, 10, 'mexican mint', 1, '2024-06-23 10:18:16', NULL),
(83, 'JLABA128', '98V3F3', 0, '', 'UH3L3D7U1P.jpeg', 'mexican mint Varigated', 'good', 50, 0, 'piece', 0, 10, 'mexican mintVarigated ', 1, '2024-06-23 10:18:16', NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`s_no`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `s_no` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=85;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
