-- Created at 24.11.2018 13:57 using David Grudl MySQL Dump Utility
-- Host: localhost
-- MySQL Server: 5.5.5-10.1.36-MariaDB
-- Database: rmm

SET NAMES utf8;
SET SQL_MODE='NO_AUTO_VALUE_ON_ZERO';
SET FOREIGN_KEY_CHECKS=0;
SET UNIQUE_CHECKS=0;
SET AUTOCOMMIT=0;
-- --------------------------------------------------------

DROP TABLE IF EXISTS `audit`;

CREATE TABLE `audit` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `created` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `type` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=220 DEFAULT CHARSET=latin1;

ALTER TABLE `audit` DISABLE KEYS;

INSERT INTO `audit` (`id`, `user_id`, `created`, `type`) VALUES
(1,	8,	'2018-03-10 06:42:28',	'Log-in'),
(2,	8,	'2018-03-10 06:44:51',	'Log-out'),
(3,	8,	'2018-03-10 06:45:29',	'Log-in'),
(4,	8,	'2018-03-10 07:19:16',	'Log-in'),
(5,	8,	'2018-03-10 09:53:35',	'Log-in'),
(6,	8,	'2018-03-11 04:10:00',	'Log-in'),
(7,	9,	'2018-03-11 04:13:07',	'Log-in'),
(8,	9,	'2018-03-11 04:15:19',	'Log-out'),
(9,	9,	'2018-03-11 04:20:30',	'Log-in'),
(10,	9,	'2018-03-11 04:23:51',	'Log-out'),
(11,	9,	'2018-03-11 04:23:59',	'Log-in'),
(12,	9,	'2018-03-11 07:38:50',	'Log-in'),
(13,	9,	'2018-03-12 13:33:27',	'Log-in'),
(14,	9,	'2018-03-21 14:44:58',	'Log-in'),
(15,	9,	'2018-03-21 14:46:02',	'Log-out'),
(16,	9,	'2018-03-21 16:43:21',	'Log-in'),
(17,	9,	'2018-06-06 07:40:57',	'Log-in'),
(18,	9,	'2018-06-06 07:41:53',	'Log-out'),
(19,	8,	'2018-06-06 07:41:59',	'Log-in'),
(20,	8,	'2018-06-06 08:01:40',	'Log-in'),
(21,	9,	'2018-06-06 08:03:52',	'Log-in'),
(22,	9,	'2018-06-06 08:48:58',	'Log-in'),
(23,	9,	'2018-06-06 08:54:53',	'Log-in'),
(24,	9,	'2018-06-06 08:41:34',	'Log-in'),
(25,	9,	'2018-06-28 05:21:43',	'Log-in'),
(26,	9,	'2018-06-28 05:57:49',	'Log-in'),
(27,	9,	'2018-06-28 05:17:30',	'Log-in'),
(28,	9,	'2018-06-28 05:55:16',	'Log-in'),
(29,	9,	'2018-06-28 05:16:50',	'Log-in'),
(30,	9,	'2018-06-28 05:45:36',	'Log-in'),
(31,	9,	'2018-06-28 05:15:08',	'Log-in'),
(32,	9,	'2018-06-28 05:16:47',	'Log-in'),
(33,	9,	'2018-06-28 05:21:39',	'Log-in'),
(34,	9,	'2018-06-28 05:37:43',	'Log-in'),
(35,	9,	'2018-06-28 05:56:44',	'Log-out'),
(36,	9,	'2018-06-28 05:01:16',	'Log-in'),
(37,	9,	'2018-06-28 05:01:55',	'Log-out'),
(38,	10,	'2018-06-28 05:02:02',	'Log-in'),
(39,	9,	'2018-07-24 08:41:45',	'Log-in'),
(40,	9,	'2018-07-24 08:46:13',	'Log-in'),
(41,	9,	'2018-07-24 09:42:19',	'Log-out'),
(42,	11,	'2018-07-24 09:42:33',	'Log-in'),
(43,	11,	'2018-07-24 23:32:46',	'Log-in'),
(44,	11,	'2018-07-25 00:01:30',	'Log-in'),
(45,	9,	'2018-08-13 08:56:07',	'Log-in'),
(46,	9,	'2018-08-18 06:45:03',	'Log-in'),
(47,	9,	'2018-08-26 05:57:45',	'Log-in'),
(48,	9,	'2018-08-26 06:48:07',	'Log-in'),
(49,	9,	'2018-08-26 09:04:56',	'Log-in'),
(50,	9,	'2018-08-26 09:16:38',	'Log-in'),
(51,	9,	'2018-09-02 03:33:23',	'Log-in'),
(52,	9,	'2018-09-02 03:33:27',	'Log-in'),
(53,	9,	'2018-09-02 03:34:05',	'Log-in'),
(54,	9,	'2018-09-02 03:50:01',	'Log-out'),
(55,	9,	'2018-09-02 03:50:04',	'Log-in'),
(56,	9,	'2018-09-02 04:19:45',	'Log-in'),
(57,	9,	'2018-09-02 04:40:14',	'Log-out'),
(58,	9,	'2018-09-02 04:40:17',	'Log-in'),
(59,	9,	'2018-09-02 04:40:37',	'Log-in'),
(60,	9,	'2018-09-02 04:43:37',	'Log-out'),
(61,	9,	'2018-09-02 04:43:40',	'Log-in'),
(62,	9,	'2018-09-02 04:43:52',	'Log-out'),
(63,	8,	'2018-09-02 04:47:08',	'Log-in'),
(64,	8,	'2018-09-02 04:54:33',	'Log-out'),
(65,	9,	'2018-09-02 04:54:37',	'Log-in'),
(66,	9,	'2018-09-02 04:56:10',	'Log-out'),
(67,	9,	'2018-09-02 04:56:13',	'Log-in'),
(68,	9,	'2018-09-02 04:56:42',	'Log-out'),
(69,	8,	'2018-09-02 04:56:52',	'Log-in'),
(70,	9,	'2018-09-02 06:25:49',	'Log-in'),
(71,	9,	'2018-09-09 13:45:44',	'Log-in'),
(72,	9,	'2018-09-15 07:42:25',	'Log-in'),
(73,	9,	'2018-09-15 08:11:04',	'Log-in'),
(74,	9,	'2018-09-15 08:24:33',	'Log-in'),
(75,	9,	'2018-09-15 08:48:45',	'Log-in'),
(76,	9,	'2018-09-15 09:22:36',	'Log-in'),
(77,	9,	'2018-09-16 05:38:35',	'Log-in'),
(78,	9,	'2018-09-16 08:59:06',	'Log-in'),
(79,	9,	'2018-09-16 09:24:39',	'Log-in'),
(80,	9,	'2018-09-22 02:36:26',	'Log-in'),
(81,	9,	'2018-09-22 06:20:36',	'Log-in'),
(82,	9,	'2018-09-22 06:41:53',	'Log-in'),
(83,	9,	'2018-10-14 06:33:31',	'Log-in'),
(84,	9,	'2018-10-14 07:03:16',	'Log-in'),
(85,	9,	'2018-10-20 00:43:48',	'Log-in'),
(86,	9,	'2018-10-20 01:20:40',	'Log-in'),
(87,	9,	'2018-10-20 03:21:51',	'Log-in'),
(88,	9,	'2018-10-20 03:22:29',	'Log-out'),
(89,	14,	'2018-10-20 03:22:36',	'Log-in'),
(90,	9,	'2018-10-20 04:03:34',	'Log-in'),
(91,	9,	'2018-10-20 04:03:57',	'Log-out'),
(92,	14,	'2018-10-20 04:04:05',	'Log-in'),
(93,	14,	'2018-10-20 04:17:33',	'Log-out'),
(94,	9,	'2018-10-20 04:17:47',	'Log-in'),
(95,	9,	'2018-10-20 04:30:45',	'Log-out'),
(96,	15,	'2018-10-20 04:30:52',	'Log-in'),
(97,	15,	'2018-10-20 04:31:07',	'Log-out'),
(98,	9,	'2018-10-20 04:31:11',	'Log-in'),
(99,	9,	'2018-10-20 04:58:07',	'Log-out'),
(100,	14,	'2018-10-20 04:58:14',	'Log-in'),
(101,	14,	'2018-10-20 05:09:31',	'Log-out'),
(102,	15,	'2018-10-20 05:09:37',	'Log-in'),
(103,	15,	'2018-10-20 05:10:55',	'Log-out'),
(104,	9,	'2018-10-20 05:11:20',	'Log-in'),
(105,	14,	'2018-10-20 05:44:48',	'Log-in'),
(106,	14,	'2018-10-21 03:11:00',	'Log-in'),
(107,	9,	'2018-10-27 04:21:22',	'Log-in'),
(108,	14,	'2018-10-27 04:48:26',	'Log-in'),
(109,	14,	'2018-10-27 07:00:05',	'Log-in'),
(110,	9,	'2018-10-27 07:42:42',	'Log-in'),
(111,	9,	'2018-10-27 07:49:56',	'Log-out'),
(112,	16,	'2018-10-27 07:50:05',	'Log-in'),
(113,	14,	'2018-10-27 08:51:05',	'Log-in'),
(114,	14,	'2018-10-27 10:50:07',	'Log-in'),
(115,	14,	'2018-10-27 13:32:05',	'Log-out'),
(116,	14,	'2018-10-27 13:58:07',	'Log-in'),
(117,	14,	'2018-10-27 23:36:21',	'Log-in'),
(118,	14,	'2018-10-28 02:53:50',	'Log-in'),
(119,	14,	'2018-10-28 04:30:45',	'Log-in'),
(120,	14,	'2018-10-28 05:03:25',	'Log-in'),
(121,	14,	'2018-10-28 06:10:56',	'Log-in'),
(122,	14,	'2018-10-28 06:11:05',	'Log-in'),
(123,	14,	'2018-10-28 06:25:04',	'Log-in'),
(124,	14,	'2018-10-28 06:35:49',	'Log-in'),
(125,	9,	'2018-10-28 06:36:21',	'Log-in'),
(126,	14,	'2018-10-28 07:10:10',	'Log-in'),
(127,	14,	'2018-10-28 08:10:04',	'Log-in'),
(128,	14,	'2018-10-28 09:11:34',	'Log-in'),
(129,	9,	'2018-11-01 10:49:09',	'Log-in'),
(130,	9,	'2018-11-02 00:24:36',	'Log-in'),
(131,	9,	'2018-11-02 01:35:41',	'Log-in'),
(132,	9,	'2018-11-02 02:02:44',	'Log-in'),
(133,	9,	'2018-11-02 03:34:38',	'Log-in'),
(134,	9,	'2018-11-02 03:35:23',	'Log-in'),
(135,	9,	'2018-11-02 04:38:37',	'Log-in'),
(136,	9,	'2018-11-02 05:26:32',	'Log-in'),
(137,	9,	'2018-11-17 07:38:36',	'Log-in'),
(138,	9,	'2018-11-17 08:36:52',	'Log-in'),
(139,	9,	'2018-11-17 08:36:52',	'Log-in'),
(140,	14,	'2018-11-17 09:31:24',	'Log-in'),
(141,	9,	'2018-11-17 10:02:02',	'Log-out'),
(142,	15,	'2018-11-17 10:02:17',	'Log-in'),
(143,	15,	'2018-11-17 10:04:30',	'Log-out'),
(144,	9,	'2018-11-17 10:04:35',	'Log-in'),
(145,	9,	'2018-11-17 11:07:09',	'Log-out'),
(146,	9,	'2018-11-17 11:08:14',	'Log-in'),
(147,	9,	'2018-11-18 03:41:32',	'Log-in'),
(148,	9,	'2018-11-18 04:45:09',	'Log-in'),
(149,	9,	'2018-11-18 05:27:47',	'Log-in'),
(150,	9,	'2018-11-18 05:53:20',	'Log-in'),
(151,	9,	'2018-11-18 05:53:20',	'Log-in'),
(152,	9,	'2018-11-18 06:50:39',	'Log-in'),
(153,	9,	'2018-11-18 07:42:25',	'Log-in'),
(154,	9,	'2018-11-18 09:26:48',	'Log-in'),
(155,	9,	'2018-11-18 09:27:41',	'Log-out'),
(156,	9,	'2018-11-18 09:27:51',	'Log-in'),
(157,	9,	'2018-11-18 09:27:58',	'Log-in'),
(158,	9,	'2018-11-18 09:28:09',	'Log-in'),
(159,	9,	'2018-11-18 09:28:13',	'Log-in'),
(160,	9,	'2018-11-18 09:29:05',	'Log-in'),
(161,	9,	'2018-11-18 09:56:02',	'Log-out'),
(162,	18,	'2018-11-18 09:56:07',	'Log-in'),
(163,	18,	'2018-11-18 09:56:12',	'Log-in'),
(164,	18,	'2018-11-18 09:56:59',	'Log-in'),
(165,	18,	'2018-11-18 10:52:18',	'Log-out'),
(166,	18,	'2018-11-18 10:54:39',	'Log-in'),
(167,	18,	'2018-11-18 10:54:59',	'Log-out'),
(168,	18,	'2018-11-18 10:55:47',	'Log-in'),
(169,	18,	'2018-11-18 11:29:45',	'Log-out'),
(170,	18,	'2018-11-18 11:30:05',	'Log-in'),
(171,	18,	'2018-11-18 11:30:16',	'Log-out'),
(172,	15,	'2018-11-18 11:30:27',	'Log-in'),
(173,	15,	'2018-11-18 11:38:28',	'Log-out'),
(174,	15,	'2018-11-18 11:38:34',	'Log-in'),
(175,	15,	'2018-11-18 11:38:39',	'Log-out'),
(176,	9,	'2018-11-18 11:38:45',	'Log-in'),
(177,	18,	'2018-11-18 11:40:01',	'Log-in'),
(178,	9,	'2018-11-18 12:31:12',	'Log-in'),
(179,	18,	'2018-11-18 13:06:07',	'Log-in'),
(180,	9,	'2018-11-18 17:38:07',	'Log-in'),
(181,	9,	'2018-11-18 17:38:08',	'Log-in'),
(182,	9,	'2018-11-18 17:38:08',	'Log-in'),
(183,	9,	'2018-11-18 17:39:39',	'Log-out'),
(184,	18,	'2018-11-18 17:39:55',	'Log-in'),
(185,	18,	'2018-11-18 17:53:11',	'Log-out'),
(186,	15,	'2018-11-18 17:53:20',	'Log-in'),
(187,	15,	'2018-11-18 17:53:45',	'Log-out'),
(188,	18,	'2018-11-18 17:53:51',	'Log-in'),
(189,	18,	'2018-11-24 07:33:17',	'Log-in'),
(190,	18,	'2018-11-24 09:17:26',	'Log-in'),
(191,	18,	'2018-11-24 11:24:59',	'Log-out'),
(192,	15,	'2018-11-24 11:25:08',	'Log-in'),
(193,	15,	'2018-11-24 11:25:27',	'Log-out'),
(194,	18,	'2018-11-24 11:25:34',	'Log-in'),
(195,	18,	'2018-11-24 11:39:00',	'Log-out'),
(196,	18,	'2018-11-24 11:39:05',	'Log-in'),
(197,	18,	'2018-11-24 11:41:21',	'Log-out'),
(198,	18,	'2018-11-24 11:41:25',	'Log-in'),
(199,	18,	'2018-11-24 11:41:31',	'Log-out'),
(200,	15,	'2018-11-24 11:41:38',	'Log-in'),
(201,	15,	'2018-11-24 11:59:26',	'Log-out'),
(202,	11,	'2018-11-24 11:59:36',	'Log-in'),
(203,	11,	'2018-11-24 12:01:18',	'Log-out'),
(204,	8,	'2018-11-24 12:01:25',	'Log-in'),
(205,	8,	'2018-11-24 12:02:07',	'Log-out'),
(206,	15,	'2018-11-24 12:02:13',	'Log-in'),
(207,	15,	'2018-11-24 12:10:07',	'Generated Sales Report'),
(208,	15,	'2018-11-24 12:10:09',	'Generated Sales Report'),
(209,	15,	'2018-11-24 12:56:59',	'Log-in'),
(210,	15,	'2018-11-24 12:58:58',	'Log-out'),
(211,	15,	'2018-11-24 13:05:28',	'Log-in'),
(212,	15,	'2018-11-24 13:23:48',	'Log-out'),
(213,	18,	'2018-11-24 13:33:05',	'Log-in'),
(214,	18,	'2018-11-24 13:34:08',	'Log-out'),
(215,	15,	'2018-11-24 13:34:15',	'Log-in'),
(216,	15,	'2018-11-24 13:36:15',	'Log-out'),
(217,	15,	'2018-11-24 13:36:19',	'Log-in'),
(218,	15,	'2018-11-24 13:36:23',	'Log-out'),
(219,	18,	'2018-11-24 13:36:29',	'Log-in');
ALTER TABLE `audit` ENABLE KEYS;



-- --------------------------------------------------------

DROP TABLE IF EXISTS `borrow`;

CREATE TABLE `borrow` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `branch_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `qty` float NOT NULL,
  `status` varchar(255) NOT NULL,
  `created` datetime DEFAULT NULL,
  `is_deleted` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;

ALTER TABLE `borrow` DISABLE KEYS;

INSERT INTO `borrow` (`id`, `user_id`, `branch_id`, `product_id`, `qty`, `status`, `created`, `is_deleted`) VALUES
(1,	9,	2,	13,	12,	'Returned',	'2018-11-18 06:13:26',	0),
(2,	9,	2,	17,	13,	'Returned',	'2018-11-18 07:52:03',	0),
(3,	9,	2,	17,	11,	'Returned',	'2018-11-18 08:30:02',	0),
(4,	9,	2,	13,	4.5,	'Returned',	'2018-11-18 08:34:22',	0),
(5,	9,	2,	13,	123,	'Returned',	'2018-11-18 09:36:20',	0),
(6,	15,	1,	24,	50,	'Received',	'2018-11-18 17:53:41',	0);
ALTER TABLE `borrow` ENABLE KEYS;



-- --------------------------------------------------------

DROP TABLE IF EXISTS `branch_products`;

CREATE TABLE `branch_products` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `branch_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `quantity` int(11) NOT NULL,
  `created` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=18 DEFAULT CHARSET=latin1;

ALTER TABLE `branch_products` DISABLE KEYS;

INSERT INTO `branch_products` (`id`, `branch_id`, `product_id`, `quantity`, `created`) VALUES
(1,	1,	13,	368,	'2018-08-18 07:15:13'),
(2,	1,	15,	921,	'2018-08-18 07:15:13'),
(3,	1,	16,	299,	'2018-08-18 07:15:13'),
(4,	1,	17,	236,	'2018-08-18 07:15:14'),
(5,	1,	19,	388,	'2018-08-18 07:15:14'),
(6,	1,	18,	320,	'2018-08-18 07:26:41'),
(7,	2,	13,	0,	'2018-09-15 08:24:41'),
(8,	2,	15,	-2,	'2018-09-15 08:24:41'),
(9,	2,	16,	-4,	'2018-09-15 08:24:41'),
(10,	2,	17,	-4,	'2018-09-15 08:24:42'),
(11,	2,	18,	2,	'2018-09-15 08:24:42'),
(12,	2,	19,	2,	'2018-09-15 08:24:42'),
(13,	1,	23,	323,	'2018-11-18 10:42:24'),
(14,	1,	24,	228,	'2018-11-18 10:42:25'),
(15,	1,	25,	150,	'2018-11-18 10:42:25'),
(16,	1,	26,	401,	'2018-11-18 10:42:25'),
(17,	1,	27,	654,	'2018-11-18 10:42:25');
ALTER TABLE `branch_products` ENABLE KEYS;



-- --------------------------------------------------------

DROP TABLE IF EXISTS `branches`;

CREATE TABLE `branches` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `description` varchar(6000) NOT NULL,
  `is_main` tinyint(1) NOT NULL DEFAULT '0',
  `created` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `is_deleted` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

ALTER TABLE `branches` DISABLE KEYS;

INSERT INTO `branches` (`id`, `name`, `description`, `is_main`, `created`, `is_deleted`) VALUES
(1,	'RMM Meatshop Magalang',	'604 Manuel L Quezon St, Angeles, Pampanga',	1,	'2018-02-03 10:04:34',	0),
(2,	'RMM Meatshop Friendship',	'tesst',	0,	'2018-03-06 12:20:42',	0),
(3,	'RMM Meatshop Capaya',	'test',	0,	'2018-11-17 08:52:21',	0);
ALTER TABLE `branches` ENABLE KEYS;



-- --------------------------------------------------------

DROP TABLE IF EXISTS `cart`;

CREATE TABLE `cart` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `branch_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `order_id` int(11) NOT NULL,
  `is_pending` int(11) NOT NULL DEFAULT '0',
  `quantity` int(11) NOT NULL,
  `created` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=34 DEFAULT CHARSET=latin1;

ALTER TABLE `cart` DISABLE KEYS;

INSERT INTO `cart` (`id`, `branch_id`, `product_id`, `order_id`, `is_pending`, `quantity`, `created`) VALUES
(1,	1,	13,	1,	1,	4,	'2018-08-18 07:14:26'),
(2,	1,	15,	1,	1,	6,	'2018-08-18 07:14:26'),
(3,	1,	16,	1,	1,	1,	'2018-08-18 07:14:26'),
(4,	1,	17,	1,	1,	6,	'2018-08-18 07:14:26'),
(5,	1,	19,	1,	1,	1,	'2018-08-18 07:14:26'),
(6,	1,	13,	2,	1,	3,	'2018-08-18 07:25:11'),
(7,	1,	15,	2,	1,	2,	'2018-08-18 07:25:11'),
(8,	1,	16,	2,	1,	1,	'2018-08-18 07:25:11'),
(9,	1,	17,	2,	1,	6,	'2018-08-18 07:25:11'),
(10,	1,	18,	2,	1,	31,	'2018-08-18 07:25:11'),
(11,	1,	19,	2,	1,	1,	'2018-08-18 07:25:11'),
(12,	1,	13,	3,	1,	1,	'2018-08-18 07:27:11'),
(13,	1,	15,	3,	1,	1,	'2018-08-18 07:27:11'),
(14,	1,	16,	3,	1,	1,	'2018-08-18 07:27:11'),
(15,	1,	17,	3,	1,	1,	'2018-08-18 07:27:11'),
(16,	1,	18,	3,	1,	1,	'2018-08-18 07:27:12'),
(17,	1,	19,	3,	1,	1,	'2018-08-18 07:27:12'),
(18,	2,	13,	4,	1,	1,	'2018-09-02 04:49:13'),
(19,	2,	15,	4,	1,	2,	'2018-09-02 04:49:13'),
(20,	2,	16,	4,	1,	3,	'2018-09-02 04:49:13'),
(21,	2,	17,	4,	1,	1,	'2018-09-02 04:49:13'),
(22,	2,	18,	4,	1,	3,	'2018-09-02 04:49:13'),
(23,	2,	19,	4,	1,	4,	'2018-09-02 04:49:13'),
(24,	1,	13,	5,	1,	1,	'2018-09-09 13:47:45'),
(25,	1,	21,	6,	1,	1,	'2018-09-22 03:32:04'),
(26,	2,	13,	8,	1,	1,	'2018-11-24 12:57:37'),
(27,	2,	15,	8,	1,	2,	'2018-11-24 12:57:37'),
(28,	2,	16,	8,	1,	10,	'2018-11-24 12:57:37'),
(29,	2,	17,	8,	1,	25,	'2018-11-24 12:57:37'),
(30,	2,	18,	8,	1,	3,	'2018-11-24 12:57:37'),
(31,	2,	23,	8,	1,	21,	'2018-11-24 12:57:37'),
(32,	2,	24,	8,	1,	5,	'2018-11-24 12:57:38'),
(33,	2,	25,	8,	1,	10,	'2018-11-24 12:57:38');
ALTER TABLE `cart` ENABLE KEYS;



-- --------------------------------------------------------

DROP TABLE IF EXISTS `inventory_summary`;

CREATE TABLE `inventory_summary` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `branch_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `quantity` int(11) NOT NULL,
  `actual_quantity` int(11) NOT NULL,
  `variance` varchar(255) NOT NULL,
  `created` date NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=41 DEFAULT CHARSET=latin1;

ALTER TABLE `inventory_summary` DISABLE KEYS;

INSERT INTO `inventory_summary` (`id`, `branch_id`, `product_id`, `quantity`, `actual_quantity`, `variance`, `created`) VALUES
(1,	1,	13,	500,	46,	'-454',	'2018-09-22'),
(2,	1,	15,	925,	451521,	'450596',	'2018-09-22'),
(3,	1,	16,	300,	231,	'-69',	'2018-09-22'),
(4,	1,	17,	134,	21,	'-113',	'2018-09-22'),
(5,	1,	18,	320,	21,	'-299',	'2018-09-22'),
(6,	1,	19,	387,	321,	'-66',	'2018-09-22'),
(7,	1,	20,	0,	321,	'321',	'2018-09-22'),
(8,	1,	21,	0,	231,	'231',	'2018-09-22'),
(9,	1,	22,	0,	21,	'21',	'2018-09-22'),
(10,	1,	13,	500,	431,	'-69',	'2018-10-14'),
(11,	1,	15,	925,	324,	'-601',	'2018-10-14'),
(12,	1,	16,	300,	534,	'234',	'2018-10-14'),
(13,	1,	17,	134,	342,	'208',	'2018-10-14'),
(14,	1,	18,	320,	534,	'214',	'2018-10-14'),
(15,	1,	19,	387,	324,	'-63',	'2018-10-14'),
(16,	1,	20,	0,	1,	'1',	'2018-10-14'),
(17,	1,	21,	0,	3,	'3',	'2018-10-14'),
(18,	1,	22,	0,	1,	'1',	'2018-10-14'),
(19,	1,	13,	500,	501,	'1',	'2018-11-17'),
(20,	1,	15,	925,	920,	'-5',	'2018-11-17'),
(21,	1,	16,	300,	302,	'2',	'2018-11-17'),
(22,	1,	17,	134,	135,	'1',	'2018-11-17'),
(23,	1,	18,	320,	321,	'1',	'2018-11-17'),
(24,	1,	19,	387,	385,	'-2',	'2018-11-17'),
(25,	1,	23,	0,	0,	'0',	'2018-11-17'),
(26,	1,	24,	0,	0,	'0',	'2018-11-17'),
(27,	1,	25,	0,	0,	'0',	'2018-11-17'),
(28,	1,	26,	0,	0,	'0',	'2018-11-17'),
(29,	1,	27,	0,	0,	'0',	'2018-11-17'),
(30,	1,	13,	253,	253,	'0',	'2018-11-18'),
(31,	1,	15,	921,	921,	'0',	'2018-11-18'),
(32,	1,	16,	300,	301,	'1',	'2018-11-18'),
(33,	1,	17,	234,	235,	'1',	'2018-11-18'),
(34,	1,	18,	320,	321,	'1',	'2018-11-18'),
(35,	1,	19,	387,	387,	'0',	'2018-11-18'),
(36,	1,	23,	328,	330,	'2',	'2018-11-18'),
(37,	1,	24,	231,	232,	'1',	'2018-11-18'),
(38,	1,	25,	150,	151,	'1',	'2018-11-18'),
(39,	1,	26,	401,	399,	'-2',	'2018-11-18'),
(40,	1,	27,	654,	650,	'-4',	'2018-11-18');
ALTER TABLE `inventory_summary` ENABLE KEYS;



-- --------------------------------------------------------

DROP TABLE IF EXISTS `orders`;

CREATE TABLE `orders` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `status` varchar(255) NOT NULL,
  `created` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=latin1;

ALTER TABLE `orders` DISABLE KEYS;

INSERT INTO `orders` (`id`, `user_id`, `status`, `created`) VALUES
(1,	9,	'Received',	'2018-08-18 07:14:26'),
(2,	9,	'Backlog',	'2018-08-18 07:25:11'),
(3,	9,	'Received',	'2018-08-18 07:27:11'),
(4,	8,	'Received',	'2018-09-02 04:49:12'),
(5,	9,	'Delivered',	'2018-09-09 13:47:45'),
(6,	9,	'In-Progress',	'2018-09-22 03:32:04'),
(7,	14,	'Backlog',	'2018-10-28 00:09:17'),
(8,	15,	'Delivered',	'2018-11-24 12:57:37');
ALTER TABLE `orders` ENABLE KEYS;



-- --------------------------------------------------------

DROP TABLE IF EXISTS `products`;

CREATE TABLE `products` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `item_code` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `type` varchar(45) NOT NULL,
  `description` varchar(6000) NOT NULL,
  `o_price` float NOT NULL,
  `price` float NOT NULL,
  `unit` varchar(255) NOT NULL,
  `image` varchar(1000) NOT NULL,
  `created` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `is_deleted` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=28 DEFAULT CHARSET=latin1;

ALTER TABLE `products` DISABLE KEYS;

INSERT INTO `products` (`id`, `item_code`, `name`, `type`, `description`, `o_price`, `price`, `unit`, `image`, `created`, `is_deleted`) VALUES
(13,	'b-003',	'Beef Tapa',	'beef',	'Lorem ipsum dolor',	300,	341,	'kg',	'images.jpg',	'2018-03-04 07:14:40',	0),
(15,	'p-005',	'Pork Tapa',	'pork',	'Fresh',	210,	250,	'kg',	'images (3).jpg',	'2018-03-04 10:38:27',	0),
(16,	'b-002',	'Beef Loaf',	'beef',	'wewewe',	220,	300,	'kg',	'',	'2018-03-04 10:41:26',	0),
(17,	'p-003',	'Mekeni Chicken Nuggets',	'chicken',	'erewer',	80,	120,	'kg',	'mekeni_chicken_nuggets_200g.jpg',	'2018-03-04 10:43:06',	0),
(18,	'p-004',	'Roast Pork',	'pork',	'rwerwerwer',	120,	180,	'kg',	'images (1).jpg',	'2018-03-04 10:44:37',	0),
(19,	'c-003',	'Chicken Hotdog',	'chicken',	'etwtwetwet',	50,	60,	'kg',	'',	'2018-03-04 10:46:08',	0),
(23,	'c-001',	'Whole Chicken',	'chicken',	'test',	180,	217,	'kg',	'chicken-breast.jpg',	'2018-10-27 13:21:42',	0),
(24,	'c-002',	'Chicken Breast Fillet',	'chicken',	'test',	200,	250,	'kg',	'breastfillet.jpg',	'2018-10-27 14:11:14',	0),
(25,	'p-001',	'Liempo',	'pork',	'test',	210,	270,	'kg',	'liempo.jpg',	'2018-10-27 14:12:54',	0),
(26,	'p-002',	'Ground Pork',	'pork',	'test',	200,	246.25,	'kg',	'gpork.jpg',	'2018-10-27 14:32:58',	0),
(27,	'b-001',	'Ground Beef',	'beef',	'test',	220,	285.25,	'kg',	'gbeef.jpg',	'2018-10-27 14:33:47',	0);
ALTER TABLE `products` ENABLE KEYS;



-- --------------------------------------------------------

DROP TABLE IF EXISTS `sale_items`;

CREATE TABLE `sale_items` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `sale_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `qty` float NOT NULL,
  `cost` float NOT NULL,
  `created` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=66 DEFAULT CHARSET=latin1;

ALTER TABLE `sale_items` DISABLE KEYS;

INSERT INTO `sale_items` (`id`, `sale_id`, `product_id`, `qty`, `cost`, `created`) VALUES
(1,	1,	13,	1,	341,	'2018-10-28 05:21:03'),
(2,	1,	15,	1,	250,	'2018-10-28 05:21:03'),
(3,	1,	24,	1,	250,	'2018-10-28 05:21:03'),
(4,	1,	26,	1,	246.25,	'2018-10-28 05:21:03'),
(5,	2,	15,	1,	250,	'2018-10-28 06:20:37'),
(6,	3,	15,	1,	250,	'2018-10-28 06:20:38'),
(7,	4,	13,	1,	341,	'2018-10-28 06:20:49'),
(8,	4,	15,	1,	250,	'2018-10-28 06:20:49'),
(9,	5,	23,	1,	217,	'2018-10-28 06:21:25'),
(10,	5,	24,	1,	250,	'2018-10-28 06:21:25'),
(11,	5,	15,	1,	250,	'2018-10-28 06:21:25'),
(12,	6,	13,	1,	341,	'2018-10-28 08:19:52'),
(13,	7,	13,	1,	341,	'2018-10-28 09:11:48'),
(14,	7,	15,	4,	1000,	'2018-10-28 09:11:48'),
(15,	7,	24,	2,	500,	'2018-10-28 09:11:48'),
(16,	7,	23,	1,	217,	'2018-10-28 09:11:48'),
(17,	7,	25,	1,	270,	'2018-10-28 09:11:48'),
(18,	8,	13,	1,	341,	'2018-10-28 09:13:09'),
(19,	8,	16,	3,	900,	'2018-10-28 09:13:09'),
(20,	8,	26,	2,	492.5,	'2018-10-28 09:13:10'),
(21,	8,	27,	1,	285.25,	'2018-10-28 09:13:10'),
(22,	9,	13,	1,	341,	'2018-10-28 10:32:11'),
(23,	9,	15,	3,	750,	'2018-10-28 10:32:11'),
(24,	9,	24,	2,	500,	'2018-10-28 10:32:11'),
(25,	10,	13,	1,	341,	'2018-11-17 09:31:38'),
(26,	10,	15,	4,	1000,	'2018-11-17 09:31:38'),
(27,	10,	24,	1,	250,	'2018-11-17 09:31:38'),
(28,	11,	15,	1,	250,	'2018-11-18 11:39:09'),
(29,	11,	16,	1,	300,	'2018-11-18 11:39:09'),
(30,	11,	23,	5,	1085,	'2018-11-18 11:39:09'),
(31,	12,	13,	12,	341,	'2018-11-18 12:42:38'),
(32,	13,	15,	3,	500,	'2018-11-18 12:59:30'),
(33,	14,	15,	1,	250,	'2018-11-18 13:33:40'),
(34,	14,	17,	4,	480,	'2018-11-18 13:33:40'),
(35,	14,	24,	1,	250,	'2018-11-18 13:33:40'),
(36,	15,	15,	1,	250,	'2018-11-18 13:50:49'),
(37,	15,	16,	1,	300,	'2018-11-18 13:50:49'),
(38,	15,	24,	2,	500,	'2018-11-18 13:50:49'),
(39,	16,	13,	1,	341,	'2018-11-24 11:59:47'),
(40,	16,	16,	3,	900,	'2018-11-24 11:59:47'),
(41,	17,	15,	1,	250,	'2018-11-24 12:00:05'),
(42,	17,	16,	1,	300,	'2018-11-24 12:00:05'),
(43,	17,	25,	1,	270,	'2018-11-24 12:00:05'),
(44,	17,	23,	1,	217,	'2018-11-24 12:00:05'),
(45,	17,	26,	1,	246.25,	'2018-11-24 12:00:05'),
(46,	18,	17,	1,	120,	'2018-11-24 12:00:24'),
(47,	18,	18,	1,	180,	'2018-11-24 12:00:25'),
(48,	18,	19,	1,	60,	'2018-11-24 12:00:25'),
(49,	18,	27,	1,	285.25,	'2018-11-24 12:00:25'),
(50,	18,	25,	1,	270,	'2018-11-24 12:00:25'),
(51,	18,	16,	1,	300,	'2018-11-24 12:00:25'),
(52,	18,	15,	1,	250,	'2018-11-24 12:00:25'),
(53,	18,	24,	1,	250,	'2018-11-24 12:00:25'),
(54,	19,	23,	5.5,	1193.5,	'2018-11-24 12:01:05'),
(55,	20,	15,	1,	250,	'2018-11-24 12:01:34'),
(56,	20,	16,	1,	300,	'2018-11-24 12:01:34'),
(57,	20,	17,	4,	480,	'2018-11-24 12:01:35'),
(58,	20,	26,	1,	246.25,	'2018-11-24 12:01:35'),
(59,	20,	24,	1,	250,	'2018-11-24 12:01:35'),
(60,	21,	15,	1,	250,	'2018-11-24 12:01:47'),
(61,	21,	16,	1,	300,	'2018-11-24 12:01:47'),
(62,	21,	25,	4,	1080,	'2018-11-24 12:01:47'),
(63,	22,	19,	1,	60,	'2018-11-24 12:01:58'),
(64,	22,	27,	1,	285.25,	'2018-11-24 12:01:58'),
(65,	22,	25,	1,	270,	'2018-11-24 12:01:58');
ALTER TABLE `sale_items` ENABLE KEYS;



-- --------------------------------------------------------

DROP TABLE IF EXISTS `sales`;

CREATE TABLE `sales` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `branch_id` int(11) NOT NULL,
  `amount` float NOT NULL,
  `cash` float NOT NULL,
  `cash_change` float NOT NULL,
  `created` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=23 DEFAULT CHARSET=latin1;

ALTER TABLE `sales` DISABLE KEYS;

INSERT INTO `sales` (`id`, `user_id`, `branch_id`, `amount`, `cash`, `cash_change`, `created`) VALUES
(1,	14,	1,	1087,	1087,	1087,	'2018-10-28 05:21:03'),
(2,	14,	1,	500,	500,	500,	'2018-10-28 06:20:31'),
(3,	14,	1,	500,	500,	500,	'2018-10-28 06:20:38'),
(4,	14,	1,	591,	591,	591,	'2018-10-28 06:20:49'),
(5,	14,	1,	717,	717,	717,	'2018-10-28 06:21:25'),
(6,	14,	1,	341,	341,	341,	'2018-10-28 08:19:52'),
(7,	14,	1,	2328,	2500,	2500,	'2018-10-28 09:11:47'),
(8,	14,	1,	2018,	2500,	2500,	'2018-10-28 09:13:09'),
(9,	14,	1,	1591,	1600,	1600,	'2018-10-28 10:32:11'),
(10,	14,	1,	1591,	1591,	1591,	'2018-11-17 09:31:38'),
(11,	9,	1,	1635,	2000,	2000,	'2018-11-18 11:39:08'),
(12,	9,	1,	341,	341,	341,	'2018-11-18 12:42:37'),
(13,	9,	1,	500,	500,	500,	'2018-11-18 12:59:30'),
(14,	9,	1,	980,	1080,	1080,	'2018-11-18 13:33:40'),
(15,	9,	1,	1050,	1050,	1050,	'2018-11-18 13:50:49'),
(16,	11,	2,	1241,	1245,	1245,	'2018-11-24 11:59:47'),
(17,	11,	2,	1283,	1290,	1290,	'2018-11-24 12:00:05'),
(18,	11,	2,	1715,	2000,	2000,	'2018-11-24 12:00:24'),
(19,	11,	2,	1085,	1085,	1085,	'2018-11-24 12:01:05'),
(20,	8,	2,	1526,	1526,	1526,	'2018-11-24 12:01:34'),
(21,	8,	2,	1630,	1630,	1630,	'2018-11-24 12:01:47'),
(22,	8,	2,	615,	615,	615,	'2018-11-24 12:01:58');
ALTER TABLE `sales` ENABLE KEYS;



-- --------------------------------------------------------

DROP TABLE IF EXISTS `t_reply`;

CREATE TABLE `t_reply` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `ticket_id` int(11) NOT NULL,
  `message` varchar(6000) NOT NULL,
  `created` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=latin1;

ALTER TABLE `t_reply` DISABLE KEYS;

INSERT INTO `t_reply` (`id`, `user_id`, `ticket_id`, `message`, `created`) VALUES
(1,	9,	0,	'Try ko ngang mag reply...',	'2018-11-17 10:53:46'),
(2,	9,	0,	'Try ko ngang mag reply...',	'2018-11-17 10:55:21'),
(3,	9,	0,	'Try ko ngang mag reply...',	'2018-11-17 10:55:45'),
(4,	9,	1,	'Try ko ngang mag reply...',	'2018-11-17 10:56:57'),
(5,	9,	1,	'Try ko ngang mag reply...',	'2018-11-17 10:57:36'),
(6,	9,	2,	'test',	'2018-11-17 11:08:32'),
(7,	9,	2,	'test ulit nga',	'2018-11-17 11:14:52'),
(8,	9,	2,	'test pangatlo',	'2018-11-17 11:15:11'),
(9,	9,	2,	'test pang apat',	'2018-11-17 11:15:36'),
(10,	15,	2,	'Ako naman.',	'2018-11-18 11:30:52');
ALTER TABLE `t_reply` ENABLE KEYS;



-- --------------------------------------------------------

DROP TABLE IF EXISTS `tickets`;

CREATE TABLE `tickets` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `type` varchar(255) NOT NULL,
  `subject` varchar(255) NOT NULL,
  `description` varchar(6000) NOT NULL,
  `status` varchar(255) NOT NULL,
  `priority` varchar(100) NOT NULL,
  `user_id` int(11) NOT NULL,
  `branch_id` int(11) NOT NULL,
  `created` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `is_deleted` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

ALTER TABLE `tickets` DISABLE KEYS;

INSERT INTO `tickets` (`id`, `type`, `subject`, `description`, `status`, `priority`, `user_id`, `branch_id`, `created`, `is_deleted`) VALUES
(1,	'Incident',	'Missing product',	'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Praesent porttitor laoreet ultrices. Ut maximus interdum est quis condimentum. Praesent id sapien diam. Nunc viverra libero ac diam feugiat, ut mollis nibh eleifend. Fusce condimentum venenatis sem, non lacinia enim iaculis sit amet. Nunc eget vestibulum massa, nec varius felis. Maecenas vel sem at ipsum consectetur lobortis. Fusce id vestibulum justo. Class aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos himenaeos. Pellentesque pellentesque volutpat lectus, in sodales risus pretium nec. Aenean euismod, justo sed fermentum dictum, ligula magna malesuada turpis, et iaculis enim neque vestibulum leo. Aliquam fermentum leo et viverra porttitor. Proin ut laoreet felis, at venenatis massa. Aenean ut tincidunt magna. Mauris vehicula tortor rhoncus eros venenatis ullamcorper.',	'Backlog',	'Urgent',	8,	3,	'2018-11-17 09:00:27',	0),
(2,	'Request',	'test',	'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Praesent porttitor laoreet ultrices. Ut maximus interdum est quis condimentum. Praesent id sapien diam. Nunc viverra libero ac diam feugiat, ut mollis nibh eleifend. Fusce condimentum venenatis sem, non lacinia enim iaculis sit amet. Nunc eget vestibulum massa, nec varius felis. Maecenas vel sem at ipsum consectetur lobortis. Fusce id vestibulum justo. Class aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos himenaeos. Pellentesque pellentesque volutpat lectus, in sodales risus pretium nec. Aenean euismod, justo sed fermentum dictum, ligula magna malesuada turpis, et iaculis enim neque vestibulum leo. Aliquam fermentum leo et viverra porttitor. Proin ut laoreet felis, at venenatis massa. Aenean ut tincidunt magna. Mauris vehicula tortor rhoncus eros venenatis ullamcorper.',	'Backlog',	'Normal',	9,	2,	'2018-11-17 09:36:34',	0),
(3,	'Problem',	'Problem test',	'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Praesent porttitor laoreet ultrices. Ut maximus interdum est quis condimentum. Praesent id sapien diam. Nunc viverra libero ac diam feugiat, ut mollis nibh eleifend. Fusce condimentum venenatis sem, non lacinia enim iaculis sit amet. Nunc eget vestibulum massa, nec varius felis. Maecenas vel sem at ipsum consectetur lobortis. Fusce id vestibulum justo. Class aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos himenaeos. Pellentesque pellentesque volutpat lectus, in sodales risus pretium nec. Aenean euismod, justo sed fermentum dictum, ligula magna malesuada turpis, et iaculis enim neque vestibulum leo. Aliquam fermentum leo et viverra porttitor. Proin ut laoreet felis, at venenatis massa. Aenean ut tincidunt magna. Mauris vehicula tortor rhoncus eros venenatis ullamcorper.',	'Backlog',	'High',	9,	2,	'2018-11-17 09:45:30',	0),
(4,	'Problem',	'Missing product',	'Test lang to',	'Backlog',	'Normal',	9,	3,	'2018-11-17 12:20:31',	0);
ALTER TABLE `tickets` ENABLE KEYS;



-- --------------------------------------------------------

DROP TABLE IF EXISTS `users`;

CREATE TABLE `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `first_name` varchar(255) NOT NULL,
  `last_name` varchar(255) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `role` varchar(255) DEFAULT NULL,
  `branch_id` int(11) NOT NULL,
  `created` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `is_deleted` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=25 DEFAULT CHARSET=latin1;

ALTER TABLE `users` DISABLE KEYS;

INSERT INTO `users` (`id`, `first_name`, `last_name`, `username`, `password`, `role`, `branch_id`, `created`, `is_deleted`) VALUES
(8,	'Neljohn',	'Ayson',	'jayson',	'$2y$10$IKJCgO3B7gy3jOYibHYJp.ar3kN3xrUBmI1n2JYl2Gk6fxWJ6rKs.',	'cashier',	2,	'2018-03-10 06:41:34',	0),
(9,	'Denes',	'Cordova',	'dens',	'$2y$10$.n.DOPpC8/HslPUQBwjh4e3zz/0nRuITY8ST1TvLmgGlqm.6onXVe',	'cashier',	1,	'2018-03-11 04:10:52',	0),
(10,	'Jasper',	'Ayson',	'Jas123',	'$2y$10$ih0Jnh6Zo/xyKzIhrsDD1.9ojHbJZAv.UQrS6UfvOgWWKPUGnAGSS',	'admin',	1,	'2018-06-28 05:01:46',	0),
(11,	'jasper',	'ayson',	'jasper123',	'$2y$10$Jnelti2YfWxUur10/4z10.uvdn/x2qCxoVYuMlmMrfPwOQBy.AMIa',	'cashier',	2,	'2018-07-24 09:42:12',	0),
(14,	'Jane',	'Doe',	'jane',	'$2y$10$7P.kt.8Ih0Zt.PqNXetvaeBT55l2Jm.t7WhK6vNSbiuNtGavc/RZi',	'cashier',	1,	'2018-10-20 03:22:25',	0),
(15,	'John',	'Doe',	'notmain',	'$2y$10$WrUndgJ8oIzlLp1DAZFfh.09DLhXx0AcG8bwihi.C8AdFXDGbtSlu',	'admin',	2,	'2018-10-20 04:30:41',	0),
(16,	'Nel-john',	'Ayson',	'neljohn',	'$2y$10$zrnR9Hj.YC3oXemJ1sEdjeipOiKxn1aW8euuuqzEHa4qojZnx.Pba',	'admin',	1,	'2018-10-27 07:49:54',	1),
(17,	'test',	'test',	'dens12',	'$2y$10$YrI0IjBA4y6KgFaT6GeYWetirr0mDkhYLdMLIV9OI/AU4LWQ8HO7.',	'cashier',	1,	'2018-11-17 07:39:12',	1),
(18,	'Nel-john',	'Ayson',	'nel',	'$2y$10$ZHBo0.yR2KGu3SsHB5MnceJRIr2yDeOCJQaOkc9VBG1xyKorf67XS',	'admin',	1,	'2018-11-18 09:55:56',	0),
(19,	'rar',	'afsf',	'Tnel123-',	'$2y$10$j624xEIRsey6zinC/Z2T9uHwK6D2a53hzXbQ1tcp0JRtGpX3JGgQe',	'cashier',	1,	'2018-11-24 09:23:30',	0),
(20,	'41',	'41234',	'nelfsdf123',	'$2y$10$7G6HfXVGXbJKABk/Km6ikOGTBeopeViABd7vEs6JQKi/70JMDYCNe',	'cashier',	1,	'2018-11-24 09:30:35',	0),
(21,	'uyigi',	'iujhi',	'nel4',	'$2y$10$4GT9LAGmcK2vkLJVjUvGWu5JVZg50NyzGyjyXDOPXbC7gl22jH0ru',	'cashier',	1,	'2018-11-24 09:30:58',	0),
(22,	'lplnkl',	'nmkljl',	'nelmnlnlm',	'$2y$10$SemHZINJ7diESpomCFaVR.bdBnsexMhfjP0HTWrShblVA7tC0CHDe',	'cashier',	1,	'2018-11-24 09:31:36',	0),
(23,	'sdfgd',	'gsfg',	'nel1',	'$2y$10$91NDv0lYu6VX0ceHtw4LV.dgGzryNExBhZ9P1MGQCqMGJKF.CmxAS',	'cashier',	1,	'2018-11-24 10:04:55',	0),
(24,	'gsftgs',	'gsfg',	'nelgsdfg123A',	'$2y$10$KQrIt9JsaZ866w8z2KjVdeIPmHUILSdIkeCsrEpL.i1Js.Vb2OvtS',	'cashier',	1,	'2018-11-24 10:06:33',	0);
ALTER TABLE `users` ENABLE KEYS;



COMMIT;
-- THE END
