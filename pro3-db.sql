-- phpMyAdmin SQL Dump
-- version 5.2.2
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Nov 25, 2025 at 05:22 AM
-- Server version: 8.0.43-34
-- PHP Version: 8.2.29

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db47jcd3xghg2n`
--

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `id` bigint NOT NULL,
  `order_id` varchar(250) NOT NULL,
  `order_name` varchar(250) NOT NULL,
  `email` varchar(200) NOT NULL,
  `team` varchar(500) NOT NULL,
  `notes` mediumtext NOT NULL,
  `status` varchar(20) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL DEFAULT 'inventory',
  `created_at` timestamp NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`id`, `order_id`, `order_name`, `email`, `team`, `notes`, `status`, `created_at`) VALUES
(1, '007', 'order first', 'vishwas@trustycoders.com', 'team1, person2, person 3', '                    Test text', 'completed', '2025-11-07 00:00:00'),
(2, '003', 'order two', 'vishwas@trustycoders.com', 'dddddd', '                    sfsdfsdfsdf', 'completed', '2025-11-07 00:00:00'),
(3, '33', 'Cafeteria Seating', 'test@gmail.com', 'test', '       test', 'inventory', '2025-11-18 00:00:00'),
(4, '001', 'Order no 3', 'vishwas@trustycoders.com', 'test,testeee', '             3 Items in a box', 'completed', '2025-11-11 00:00:00'),
(5, '0315', 'Test Andre', 'andre@creativesurge.com', 'Dukes', '       ', 'completed', '2025-11-11 00:00:00'),
(6, '004 nov24', 'T-shirt Combo', 'demo@ts.com', 'team 12', '       Combo of black and blue T-shirts', 'completed', '2025-11-18 00:00:00'),
(7, '005', 'Danim T-shirts TS-1 TS-2 TS-3', 'vs@demo.com', 'Team 1', '          Three t-shirts in 3 packages for same address.', 'completed', '2025-11-19 00:00:00'),
(9, '006', 'Sam\\\\\\\'s Order', 'test@email.com', 'tester', ' notice', 'completed', '2025-11-21 00:00:00'),
(10, '008', 'Combo For Danial', 'dani@dummy.com', 'team', '           new order from danial', 'completed', '2025-11-21 00:00:00'),
(11, '009', 'Samsul order', 'sum@name.com', 'tesm sum', 'asap', 'inventory', '2025-11-21 00:00:00'),
(12, '011', 'Test order', 'tester@tester.com', 'test team', 'test note', 'inventory', '2025-11-21 00:00:00'),
(13, '911911', 'Andre Test', 'andre@creativesurge.com', 'Cumberland Dukes', '       ', 'completed', '2025-11-26 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `order_image_gallery`
--

CREATE TABLE `order_image_gallery` (
  `id` int NOT NULL,
  `order_id` bigint DEFAULT NULL,
  `image_url` varchar(500) NOT NULL,
  `status` varchar(20) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `order_image_gallery`
--

INSERT INTO `order_image_gallery` (`id`, `order_id`, `image_url`, `status`, `created_at`) VALUES
(5, 1, '691b4f11610964.73994870.jpg', NULL, NULL),
(6, 4, '691c0ce5b47680.43984821.jpeg', NULL, NULL),
(7, 11, '69205e8edb7588.46500191.jpg', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `order_items`
--

CREATE TABLE `order_items` (
  `id` bigint NOT NULL,
  `item_number` varchar(255) DEFAULT NULL,
  `order_id` bigint DEFAULT NULL,
  `name` varchar(500) NOT NULL,
  `size` varchar(250) DEFAULT NULL,
  `product` varchar(500) NOT NULL,
  `color` varchar(250) DEFAULT NULL,
  `design` varchar(20) NOT NULL,
  `in_stock` tinyint(1) NOT NULL,
  `notes` text,
  `status` varchar(200) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL COMMENT 'pending,print,production,archive,completed',
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `order_items`
--

INSERT INTO `order_items` (`id`, `item_number`, `order_id`, `name`, `size`, `product`, `color`, `design`, `in_stock`, `notes`, `status`, `created_at`) VALUES
(1, '1', 1, 'Item no 1457777', 'Y-S', 'hoodie', 'blue', '2', 1, '                                 ddddd', 'pending', NULL),
(2, '2', 1, 'item no 2', 'Y-M', 'hoodie', 'red', '1', 1, '                                 dddd', 'pending', NULL),
(3, '3', 2, 'T-shirt-215', 'W-XS', 't-shirt', 'green', '2', 1, ' Please pack in a gift wrap.', 'pending', NULL),
(5, '51', 4, 'Ho-11', 'Y-XS', 'hoodie', 'red', '4', 1, '            Note', 'pending', NULL),
(6, '6', 4, 'TS-22', 'Y-XL', 't-shirt', 'blue', '5', 1, '            Package prepaired', 'pending', NULL),
(10, '7', 5, 'Smith', 'Y-S', 't-shirt', 'green', '2', 1, '       ', 'pending', NULL),
(15, '8', 4, 'HRX11', 'W-L', 't-shirt', 'peach', '4', 1, 'SOMETHING 11111', 'pending', NULL),
(16, '9', 6, 'TS-12 nov24', 'Y-M', 't-shirt', 'black', '6', 1, '       Combo', 'pending', NULL),
(17, '10', 6, 'TS-226666666666666 nov24', 'XS', 'trouser', 'blue', '5', 1, '       Combo', 'pending', NULL),
(18, '11', 7, 'TS-11', 'Y-S', 't-shirt', 'lemon', '2', 1, '          Pack in seperate box and ship to first address.', 'pending', NULL),
(19, '12', 7, 'TS-3', 'L', 't-shirt', 'lemon', '3', 1, '          Pack in seperate box and ship to second address.', 'pending', NULL),
(20, '13', 7, 'TS-2', 'Y-XL', 't-shirt', 'pink', '3', 1, '          Pack in seperate box and ship to third address.', 'print', NULL),
(21, '14', 7, '77777777', 'Y-XS', 'trouser', 'blue', '3', 1, '        N/A', 'pending', NULL),
(22, '155', 9, 'pro1', 'Y-L', 't-shirt', 'green', '2', 1, ' please send it asap.', 'production', NULL),
(23, '16', 10, 'T-shirt 22 1124', 'Y-M', 't-shirt', 'orange', '', 1, '           Give it now', 'production', NULL),
(24, '9', 11, 'pro1', 'XS', 't-shirt', 'white', '7', 1, 'please deliver in time.', 'pending', NULL),
(25, '111', 12, 'Red T-shirt', 'Y-S', 't-shirt', 'red', '8', 1, 'Please send in time', 'production', NULL),
(26, '25', 13, 'SMITH2', 'Y-M', 't-shirt', 'black', '2', 1, '       ', 'print', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(250) NOT NULL,
  `status` varchar(50) DEFAULT NULL,
  `created_at` timestamp NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `email`, `password`, `status`, `created_at`) VALUES
(1, '3pro@gmail.com', '$2y$10$8IFXpLucp7xK42DrNvYsIukOcBBGnWyuU/AONBhz1.xiwBik.uQ.i', NULL, '2025-11-21 09:18:00');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `order_image_gallery`
--
ALTER TABLE `order_image_gallery`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `order_items`
--
ALTER TABLE `order_items`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` bigint NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `order_image_gallery`
--
ALTER TABLE `order_image_gallery`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `order_items`
--
ALTER TABLE `order_items`
  MODIFY `id` bigint NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
