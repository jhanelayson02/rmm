-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Mar 12, 2018 at 02:34 PM
-- Server version: 10.1.19-MariaDB
-- PHP Version: 5.6.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
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
(13, 9, '2018-03-12 13:33:27', 'Log-in');

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
(1, 'RMM Meatshop Magalang', 'SSSS', 0, '2018-02-03 10:04:34', 0),
(2, 'RMM Meatshop Friendship', 'tesst', 1, '2018-03-06 12:20:42', 0);

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

-- --------------------------------------------------------

--
-- Table structure for table `cart`
--

CREATE TABLE `cart` (
  `id` int(11) NOT NULL,
  `branch_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `is_pending` int(11) NOT NULL DEFAULT '0',
  `quantity` int(11) NOT NULL,
  `created` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `cart`
--

INSERT INTO `cart` (`id`, `branch_id`, `product_id`, `is_pending`, `quantity`, `created`) VALUES
(1, 1, 13, 0, 1, '2018-03-05 12:23:19'),
(2, 1, 13, 0, 1, '2018-03-05 12:24:36'),
(3, 1, 12, 0, 1, '2018-03-05 15:45:58'),
(4, 1, 13, 0, 1, '2018-03-05 15:46:26'),
(5, 1, 12, 0, 1, '2018-03-07 14:06:51'),
(6, 1, 13, 0, 1, '2018-03-07 15:11:00'),
(10, 2, 15, 0, 123, '2018-03-10 07:39:08'),
(11, 2, 13, 0, 1, '2018-03-10 09:53:47'),
(12, 2, 13, 0, 1, '2018-03-11 04:11:24'),
(13, 1, 13, 0, 1, '2018-03-11 04:26:28'),
(14, 1, 13, 0, 1, '2018-03-11 04:27:49');

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
(13, 'sr32sde', 'Beef Tapa', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed eu venenatis est. Ut pretium congue mattis. Proin accumsan leo in neque sagittis, nec iaculis risus dapibus. Nam egestas posuere blandit. Phasellus porta varius lectus.', 341, 'fd', 'images.jpg', '2018-03-04 07:14:40', NULL),
(15, '23', 'Pork Tapa', 'Fresh', 130, '1', 'images (3).jpg', '2018-03-04 10:38:27', NULL),
(16, '13', 'Beef Loaf', 'wewewe', 80, '1', '', '2018-03-04 10:41:26', NULL),
(17, '24', 'Mekeni Chicken Nuggets', 'erewer', 120, '1', 'mekeni_chicken_nuggets_200g.jpg', '2018-03-04 10:43:06', NULL),
(18, '52', 'Roast Pork', 'rwerwerwer', 180, '2', 'images (1).jpg', '2018-03-04 10:44:37', NULL),
(19, '11', 'Chicken Hotdog', 'etwtwetwet', 60, '1', '', '2018-03-04 10:46:08', NULL);

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
(8, 'neljohn', 'ayson', 'jaysn', '$2y$10$.LnIxllk6i76UAADABk0DuZUN5NzsRKm2lK1aNJi9D2SU7T13t/za', NULL, 2, '2018-03-10 06:41:34'),
(9, 'Denes', 'Cordova', 'dens', '$2y$10$eQInW47dlKlaFrcloHjffu.0u6sF4DvzIAwXMMqo8myYJQzqNEK6C', NULL, 1, '2018-03-11 04:10:52');

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;
--
-- AUTO_INCREMENT for table `branches`
--
ALTER TABLE `branches`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `branch_products`
--
ALTER TABLE `branch_products`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `cart`
--
ALTER TABLE `cart`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;
--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
