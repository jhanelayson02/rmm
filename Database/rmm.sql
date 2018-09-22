-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 22, 2018 at 08:54 AM
-- Server version: 10.1.35-MariaDB
-- PHP Version: 7.2.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `rmm`
--

-- --------------------------------------------------------

--
-- Table structure for table `audit`
--

CREATE TABLE `audit` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `created` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `type` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `audit`
--

INSERT INTO `audit` (`id`, `user_id`, `created`, `type`) VALUES
(1, 8, '2018-03-10 06:42:28', 'Log-in'),
(2, 8, '2018-03-10 06:44:51', 'Log-out'),
(3, 8, '2018-03-10 06:45:29', 'Log-in'),
(4, 8, '2018-03-10 07:19:16', 'Log-in'),
(5, 8, '2018-03-10 09:53:35', 'Log-in'),
(6, 8, '2018-03-11 04:10:00', 'Log-in'),
(7, 9, '2018-03-11 04:13:07', 'Log-in'),
(8, 9, '2018-03-11 04:15:19', 'Log-out'),
(9, 9, '2018-03-11 04:20:30', 'Log-in'),
(10, 9, '2018-03-11 04:23:51', 'Log-out'),
(11, 9, '2018-03-11 04:23:59', 'Log-in'),
(12, 9, '2018-03-11 07:38:50', 'Log-in'),
(13, 9, '2018-03-12 13:33:27', 'Log-in'),
(14, 9, '2018-03-21 14:44:58', 'Log-in'),
(15, 9, '2018-03-21 14:46:02', 'Log-out'),
(16, 9, '2018-03-21 16:43:21', 'Log-in'),
(17, 9, '2018-06-06 07:40:57', 'Log-in'),
(18, 9, '2018-06-06 07:41:53', 'Log-out'),
(19, 8, '2018-06-06 07:41:59', 'Log-in'),
(20, 8, '2018-06-06 08:01:40', 'Log-in'),
(21, 9, '2018-06-06 08:03:52', 'Log-in'),
(22, 9, '2018-06-06 08:48:58', 'Log-in'),
(23, 9, '2018-06-06 08:54:53', 'Log-in'),
(24, 9, '2018-06-06 08:41:34', 'Log-in'),
(25, 9, '2018-06-28 05:21:43', 'Log-in'),
(26, 9, '2018-06-28 05:57:49', 'Log-in'),
(27, 9, '2018-06-28 05:17:30', 'Log-in'),
(28, 9, '2018-06-28 05:55:16', 'Log-in'),
(29, 9, '2018-06-28 05:16:50', 'Log-in'),
(30, 9, '2018-06-28 05:45:36', 'Log-in'),
(31, 9, '2018-06-28 05:15:08', 'Log-in'),
(32, 9, '2018-06-28 05:16:47', 'Log-in'),
(33, 9, '2018-06-28 05:21:39', 'Log-in'),
(34, 9, '2018-06-28 05:37:43', 'Log-in'),
(35, 9, '2018-06-28 05:56:44', 'Log-out'),
(36, 9, '2018-06-28 05:01:16', 'Log-in'),
(37, 9, '2018-06-28 05:01:55', 'Log-out'),
(38, 10, '2018-06-28 05:02:02', 'Log-in'),
(39, 9, '2018-07-24 08:41:45', 'Log-in'),
(40, 9, '2018-07-24 08:46:13', 'Log-in'),
(41, 9, '2018-07-24 09:42:19', 'Log-out'),
(42, 11, '2018-07-24 09:42:33', 'Log-in'),
(43, 11, '2018-07-24 23:32:46', 'Log-in'),
(44, 11, '2018-07-25 00:01:30', 'Log-in'),
(45, 9, '2018-08-13 08:56:07', 'Log-in'),
(46, 9, '2018-08-18 06:45:03', 'Log-in'),
(47, 9, '2018-08-26 05:57:45', 'Log-in'),
(48, 9, '2018-08-26 06:48:07', 'Log-in'),
(49, 9, '2018-08-26 09:04:56', 'Log-in'),
(50, 9, '2018-08-26 09:16:38', 'Log-in'),
(51, 9, '2018-09-02 03:33:23', 'Log-in'),
(52, 9, '2018-09-02 03:33:27', 'Log-in'),
(53, 9, '2018-09-02 03:34:05', 'Log-in'),
(54, 9, '2018-09-02 03:50:01', 'Log-out'),
(55, 9, '2018-09-02 03:50:04', 'Log-in'),
(56, 9, '2018-09-02 04:19:45', 'Log-in'),
(57, 9, '2018-09-02 04:40:14', 'Log-out'),
(58, 9, '2018-09-02 04:40:17', 'Log-in'),
(59, 9, '2018-09-02 04:40:37', 'Log-in'),
(60, 9, '2018-09-02 04:43:37', 'Log-out'),
(61, 9, '2018-09-02 04:43:40', 'Log-in'),
(62, 9, '2018-09-02 04:43:52', 'Log-out'),
(63, 8, '2018-09-02 04:47:08', 'Log-in'),
(64, 8, '2018-09-02 04:54:33', 'Log-out'),
(65, 9, '2018-09-02 04:54:37', 'Log-in'),
(66, 9, '2018-09-02 04:56:10', 'Log-out'),
(67, 9, '2018-09-02 04:56:13', 'Log-in'),
(68, 9, '2018-09-02 04:56:42', 'Log-out'),
(69, 8, '2018-09-02 04:56:52', 'Log-in'),
(70, 9, '2018-09-02 06:25:49', 'Log-in'),
(71, 9, '2018-09-09 13:45:44', 'Log-in'),
(72, 9, '2018-09-15 07:42:25', 'Log-in'),
(73, 9, '2018-09-15 08:11:04', 'Log-in'),
(74, 9, '2018-09-15 08:24:33', 'Log-in'),
(75, 9, '2018-09-15 08:48:45', 'Log-in'),
(76, 9, '2018-09-15 09:22:36', 'Log-in'),
(77, 9, '2018-09-16 05:38:35', 'Log-in'),
(78, 9, '2018-09-16 08:59:06', 'Log-in'),
(79, 9, '2018-09-16 09:24:39', 'Log-in'),
(80, 9, '2018-09-22 02:36:26', 'Log-in'),
(81, 9, '2018-09-22 06:20:36', 'Log-in'),
(82, 9, '2018-09-22 06:41:53', 'Log-in');

-- --------------------------------------------------------

--
-- Table structure for table `branches`
--

CREATE TABLE `branches` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `description` varchar(6000) NOT NULL,
  `is_main` tinyint(1) NOT NULL,
  `created` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `is_deleted` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `branches`
--

INSERT INTO `branches` (`id`, `name`, `description`, `is_main`, `created`, `is_deleted`) VALUES
(1, 'RMM Meatshop Magalang', 'SSSS', 1, '2018-02-03 10:04:34', 0),
(2, 'RMM Meatshop Friendship', 'tesst', 0, '2018-03-06 12:20:42', 0);

-- --------------------------------------------------------

--
-- Table structure for table `branch_products`
--

CREATE TABLE `branch_products` (
  `id` int(11) NOT NULL,
  `branch_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `quantity` int(11) NOT NULL,
  `created` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `branch_products`
--

INSERT INTO `branch_products` (`id`, `branch_id`, `product_id`, `quantity`, `created`) VALUES
(1, 1, 13, 500, '2018-08-18 07:15:13'),
(2, 1, 15, 925, '2018-08-18 07:15:13'),
(3, 1, 16, 300, '2018-08-18 07:15:13'),
(4, 1, 17, 134, '2018-08-18 07:15:14'),
(5, 1, 19, 387, '2018-08-18 07:15:14'),
(6, 1, 18, 320, '2018-08-18 07:26:41'),
(7, 2, 13, 1, '2018-09-15 08:24:41'),
(8, 2, 15, 2, '2018-09-15 08:24:41'),
(9, 2, 16, 3, '2018-09-15 08:24:41'),
(10, 2, 17, 1, '2018-09-15 08:24:42'),
(11, 2, 18, 3, '2018-09-15 08:24:42'),
(12, 2, 19, 4, '2018-09-15 08:24:42');

-- --------------------------------------------------------

--
-- Table structure for table `cart`
--

CREATE TABLE `cart` (
  `id` int(11) NOT NULL,
  `branch_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `order_id` int(11) NOT NULL,
  `is_pending` int(11) NOT NULL DEFAULT '0',
  `quantity` int(11) NOT NULL,
  `created` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `cart`
--

INSERT INTO `cart` (`id`, `branch_id`, `product_id`, `order_id`, `is_pending`, `quantity`, `created`) VALUES
(1, 1, 13, 1, 1, 4, '2018-08-18 07:14:26'),
(2, 1, 15, 1, 1, 6, '2018-08-18 07:14:26'),
(3, 1, 16, 1, 1, 1, '2018-08-18 07:14:26'),
(4, 1, 17, 1, 1, 6, '2018-08-18 07:14:26'),
(5, 1, 19, 1, 1, 1, '2018-08-18 07:14:26'),
(6, 1, 13, 2, 1, 3, '2018-08-18 07:25:11'),
(7, 1, 15, 2, 1, 2, '2018-08-18 07:25:11'),
(8, 1, 16, 2, 1, 1, '2018-08-18 07:25:11'),
(9, 1, 17, 2, 1, 6, '2018-08-18 07:25:11'),
(10, 1, 18, 2, 1, 31, '2018-08-18 07:25:11'),
(11, 1, 19, 2, 1, 1, '2018-08-18 07:25:11'),
(12, 1, 13, 3, 1, 1, '2018-08-18 07:27:11'),
(13, 1, 15, 3, 1, 1, '2018-08-18 07:27:11'),
(14, 1, 16, 3, 1, 1, '2018-08-18 07:27:11'),
(15, 1, 17, 3, 1, 1, '2018-08-18 07:27:11'),
(16, 1, 18, 3, 1, 1, '2018-08-18 07:27:12'),
(17, 1, 19, 3, 1, 1, '2018-08-18 07:27:12'),
(18, 2, 13, 4, 1, 1, '2018-09-02 04:49:13'),
(19, 2, 15, 4, 1, 2, '2018-09-02 04:49:13'),
(20, 2, 16, 4, 1, 3, '2018-09-02 04:49:13'),
(21, 2, 17, 4, 1, 1, '2018-09-02 04:49:13'),
(22, 2, 18, 4, 1, 3, '2018-09-02 04:49:13'),
(23, 2, 19, 4, 1, 4, '2018-09-02 04:49:13'),
(24, 1, 13, 5, 1, 1, '2018-09-09 13:47:45'),
(25, 1, 21, 6, 1, 1, '2018-09-22 03:32:04');

-- --------------------------------------------------------

--
-- Table structure for table `inventory_summary`
--

CREATE TABLE `inventory_summary` (
  `id` int(11) NOT NULL,
  `branch_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `quantity` int(11) NOT NULL,
  `actual_quantity` int(11) NOT NULL,
  `variance` varchar(255) NOT NULL,
  `created` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `inventory_summary`
--

INSERT INTO `inventory_summary` (`id`, `branch_id`, `product_id`, `quantity`, `actual_quantity`, `variance`, `created`) VALUES
(1, 1, 13, 500, 46, '-454', '2018-09-22'),
(2, 1, 15, 925, 451521, '450596', '2018-09-22'),
(3, 1, 16, 300, 231, '-69', '2018-09-22'),
(4, 1, 17, 134, 21, '-113', '2018-09-22'),
(5, 1, 18, 320, 21, '-299', '2018-09-22'),
(6, 1, 19, 387, 321, '-66', '2018-09-22'),
(7, 1, 20, 0, 321, '321', '2018-09-22'),
(8, 1, 21, 0, 231, '231', '2018-09-22'),
(9, 1, 22, 0, 21, '21', '2018-09-22');

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `status` varchar(255) NOT NULL,
  `created` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`id`, `user_id`, `status`, `created`) VALUES
(1, 9, 'Received', '2018-08-18 07:14:26'),
(2, 9, 'Received', '2018-08-18 07:25:11'),
(3, 9, 'Received', '2018-08-18 07:27:11'),
(4, 8, 'Received', '2018-09-02 04:49:12'),
(5, 9, 'Delivered', '2018-09-09 13:47:45'),
(6, 9, 'In-Progress', '2018-09-22 03:32:04');

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` int(11) NOT NULL,
  `item_code` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `description` varchar(6000) NOT NULL,
  `price` float NOT NULL,
  `unit` varchar(255) NOT NULL,
  `image` varchar(1000) NOT NULL,
  `created` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `is_deleted` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `item_code`, `name`, `description`, `price`, `unit`, `image`, `created`, `is_deleted`) VALUES
(13, 'sr32sde', 'Beef Tapa', 'Lorem ipsum dolor', 341, 'fd', 'images.jpg', '2018-03-04 07:14:40', NULL),
(15, '23', 'Pork Tapa', 'Fresh', 130, '1', 'images (3).jpg', '2018-03-04 10:38:27', NULL),
(16, '13', 'Beef Loaf', 'wewewe', 80, '1', '', '2018-03-04 10:41:26', NULL),
(17, '24', 'Mekeni Chicken Nuggets', 'erewer', 120, '1', 'mekeni_chicken_nuggets_200g.jpg', '2018-03-04 10:43:06', NULL),
(18, '52', 'Roast Pork', 'rwerwerwer', 180, '2', 'images (1).jpg', '2018-03-04 10:44:37', NULL),
(19, '11', 'Chicken Hotdog', 'etwtwetwet', 60, '1', '', '2018-03-04 10:46:08', NULL),
(20, '12-53635', 'testProduct1', 'test', 12, 'kg', '', '2018-09-02 06:59:38', NULL),
(21, '12-53635', 'testProduct1', 'test', 12, 'kg', '', '2018-09-02 07:00:06', NULL),
(22, '12-53635', 'testProduct1', 'test', 12, 'kg', 'images.jpeg', '2018-09-02 07:01:13', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `sales`
--

CREATE TABLE `sales` (
  `id` int(11) NOT NULL,
  `branch_id` int(11) NOT NULL,
  `net_sales` float NOT NULL,
  `created` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `first_name` varchar(255) NOT NULL,
  `last_name` varchar(255) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `role` varchar(255) DEFAULT NULL,
  `branch_id` int(11) NOT NULL,
  `created` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `first_name`, `last_name`, `username`, `password`, `role`, `branch_id`, `created`) VALUES
(8, 'neljohn', 'ayson', 'jayson', '$2y$10$QoArny1Cg4BWseffbp9LVOBqhRTPQxfnFQJCnitPyitInPETb5tx2', NULL, 2, '2018-03-10 06:41:34'),
(9, 'Denes', 'Cordova', 'dens', '$2y$10$eQInW47dlKlaFrcloHjffu.0u6sF4DvzIAwXMMqo8myYJQzqNEK6C', 'test', 1, '2018-03-11 04:10:52'),
(10, 'Jasper', 'Ayson', 'jas', '$2y$10$i7uzVfPriNOPXpWMQO/sauPTiKh1R4EtMBV5OLiRLQV0cTfV12jQ.', NULL, 1, '2018-06-28 05:01:46'),
(11, 'jasper', 'ayson', 'jasper@test.com', '$2y$10$2zRzb1XptD1.q7Bnm.n6xeKCj4BoBe5QtwFryE14wGqa556WJ/UNW', NULL, 2, '2018-07-24 09:42:12'),
(12, 'jhanel', 'ayson', 'jahnel', '', 'user', 1, '2018-09-03 19:43:56'),
(13, 'jhanel', 'ayson', 'jahnel', '', 'user', 1, '2018-09-03 20:27:04');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `audit`
--
ALTER TABLE `audit`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `branches`
--
ALTER TABLE `branches`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `branch_products`
--
ALTER TABLE `branch_products`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `cart`
--
ALTER TABLE `cart`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `inventory_summary`
--
ALTER TABLE `inventory_summary`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sales`
--
ALTER TABLE `sales`
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
-- AUTO_INCREMENT for table `audit`
--
ALTER TABLE `audit`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=83;

--
-- AUTO_INCREMENT for table `branches`
--
ALTER TABLE `branches`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `branch_products`
--
ALTER TABLE `branch_products`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `cart`
--
ALTER TABLE `cart`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT for table `inventory_summary`
--
ALTER TABLE `inventory_summary`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
