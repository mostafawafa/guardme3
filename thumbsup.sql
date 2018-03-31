-- phpMyAdmin SQL Dump
-- version 4.6.5.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 04, 2017 at 11:40 AM
-- Server version: 10.1.21-MariaDB
-- PHP Version: 5.6.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `thumbtack`
--

-- --------------------------------------------------------

--
-- Table structure for table `booking`
--

CREATE TABLE `booking` (
  `book_id` int(11) NOT NULL,
  `token` varchar(255) NOT NULL,
  `services_id` varchar(50) NOT NULL,
  `booking_date` date NOT NULL,
  `booking_time` varchar(50) NOT NULL,
  `user_email` varchar(255) NOT NULL,
  `booking_address` text NOT NULL,
  `booking_city` varchar(200) NOT NULL,
  `booking_pincode` varchar(100) NOT NULL,
  `user_id` int(50) NOT NULL,
  `total_amt` float NOT NULL,
  `payment_mode` varchar(50) NOT NULL,
  `status` varchar(50) NOT NULL,
  `shop_id` int(50) NOT NULL,
  `currency` varchar(50) NOT NULL,
  `curr_date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `booking`
--

INSERT INTO `booking` (`book_id`, `token`, `services_id`, `booking_date`, `booking_time`, `user_email`, `booking_address`, `booking_city`, `booking_pincode`, `user_id`, `total_amt`, `payment_mode`, `status`, `shop_id`, `currency`, `curr_date`) VALUES
(42, 'WuVO0iE85trpfJGSn5YfeM75Wva9mNhWiUU44BfF', '10,13,14,17', '2017-06-23', '8', 'testinguse@gmail.com', '', '', '', 23, 160, 'paypal', 'paid', 26, 'USD', '2017-06-22'),
(43, 'epGFEgiqZ4a101XU3Ou10Wx7JNjdajiq0cebv3lh', '8,13,14,21', '2017-06-28', '5', 'demo@demo.com', '', '', '', 12, 286, 'paypal', 'paid', 26, 'USD', '2017-06-22'),
(44, 'rrqkc1AoShXYbGLY3NhThEfADYqlI1gkSi56dk5U', '12', '2017-06-24', '11', 'sample@sample.com', '', '', '', 14, 104, 'paypal', 'pending', 21, 'USD', '2017-06-23'),
(45, 'Pv4adxxONpv7y9eSlj33aMVUzScn56D8Vm83fRHp', '3,8,10,14,17', '2017-06-30', '11', 'well@gmail.com', '', '', '', 25, 191, 'paypal', 'pending', 26, 'USD', '2017-06-26'),
(46, 'oIhX0tnQlCVknDlFs9QzXHkPzWSZOsx2VAuQP35n', '9,3', '2017-06-27', '16', 'well@gmail.com', '', '', '', 25, 265, 'paypal', 'paid', 29, 'USD', '2017-06-26'),
(47, 'fxFcJixEYkBFNJEwu5USAaZqmXFefaVOwA40e3Vk', '16,3,4,11,12', '2017-08-07', '5', 'customer@customer.com', '19,new street,weldone', 'mdu', '885544', 17, 207, 'paypal', 'pending', 22, 'USD', '2017-08-03');

-- --------------------------------------------------------

--
-- Table structure for table `contact_vendor`
--

CREATE TABLE `contact_vendor` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `phone_no` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `message` text NOT NULL,
  `vendor_id` int(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `contact_vendor`
--

INSERT INTO `contact_vendor` (`id`, `name`, `phone_no`, `email`, `message`, `vendor_id`) VALUES
(10, 'ss', '3223', 'dd@dd.com', 'dfsa', 21);

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1);

-- --------------------------------------------------------

--
-- Table structure for table `pages`
--

CREATE TABLE `pages` (
  `page_id` int(11) NOT NULL,
  `page_title` varchar(255) NOT NULL,
  `page_desc` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pages`
--

INSERT INTO `pages` (`page_id`, `page_title`, `page_desc`) VALUES
(1, 'About', '\'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum<br/><br/>\r\n\r\nLorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum<br/><br/>\r\n\r\nLorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum\''),
(2, 'Terms and Conditions', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum<br/><br/>\r\n\r\nLorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum<br/><br/>\r\n\r\nLorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum'),
(3, 'Privacy Policy', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum<br/><br/>\r\n\r\nLorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum<br/><br/>\r\n\r\nLorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum'),
(4, 'Contact', '\'<div style=\"width: 100%\"><iframe width=\"100%\" height=\"300\" src=\"https://www.mapsdirections.info/en/custom-google-maps/map.php?width=100%&height=300&hl=ru&q=London+(Responsive)&ie=UTF8&t=&z=14&iwloc=A&output=embed\" frameborder=\"0\" scrolling=\"no\" marginheight=\"0\" marginwidth=\"0\"><a href=\"https://www.mapsdirections.info/en/custom-google-maps/\">Create a custom Google Map</a> by <a href=\"https://www.mapsdirections.info/en/\">UK Maps</a></iframe></div>\''),
(5, 'How it works', '\'lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum<br/><br/>\r\n\r\nLorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum<br/><br/>\r\n\r\nLorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum\'\'\''),
(6, 'Safety', '\'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum<br/><br/>\r\n\r\nLorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum<br/><br/>\r\n\r\nLorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum\''),
(7, 'Service Guide', '\'\'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum<br/><br/>\r\n\r\nLorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum<br/><br/>\r\n\r\nLorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum\'\''),
(8, 'How to pages', '\'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum<br/><br/>\r\n\r\nLorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum<br/><br/>\r\n\r\nLorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum\''),
(9, 'Sucess Stories', '\'\'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum<br/><br/>\r\n\r\nLorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum<br/><br/>\r\n\r\nLorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum\'\'');

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `password_resets`
--

INSERT INTO `password_resets` (`email`, `token`, `created_at`) VALUES
('customer@customer.com', '$2y$10$i3coxhBectaoxS2e/qfcAOhrFusAd8Cg5NmDkbDwNgnPG076o3Kxi', '2017-05-25 02:14:23'),
('wpchecking@gmail.com', '$2y$10$iN7LOujh2Igb7A9eyHcZE.ejPmY776Mj0MaiFDuXFlfu2WkkdPnxS', '2017-05-25 02:22:43');

-- --------------------------------------------------------

--
-- Table structure for table `rating`
--

CREATE TABLE `rating` (
  `rid` int(11) NOT NULL,
  `rating` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `rshop_id` int(50) NOT NULL,
  `comment` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `rating`
--

INSERT INTO `rating` (`rid`, `rating`, `email`, `rshop_id`, `comment`) VALUES
(1, '4', 'seller@seller.com', 23, 'Hi this is very nice shopping mall...It\' nice..cool'),
(3, '4', 'customer@customer.com', 24, 'very nice'),
(4, '5', 'customer@customer.com', 22, 'Good shop'),
(5, '3', 'customer@customer.com', 25, 'Well'),
(6, '3', 'customer@customer.com', 26, 'Good mobile shop'),
(7, '4', 'customer@customer.com', 27, 'Fine'),
(8, '5', 'newuser@gmail.com', 28, 'Very Good'),
(10, '3', 'seller@seller.com', 21, 'sample'),
(17, '5', 'testinguse@gmail.com', 22, 'rwar dddd'),
(18, '3', 'testinguse@gmail.com', 25, 'very nice service good...');

-- --------------------------------------------------------

--
-- Table structure for table `seller_services`
--

CREATE TABLE `seller_services` (
  `id` int(11) NOT NULL,
  `service_id` int(50) NOT NULL,
  `subservice_id` int(50) NOT NULL,
  `price` int(50) NOT NULL,
  `time` varchar(50) NOT NULL,
  `user_id` int(50) NOT NULL,
  `shop_id` int(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `seller_services`
--

INSERT INTO `seller_services` (`id`, `service_id`, `subservice_id`, `price`, `time`, `user_id`, `shop_id`) VALUES
(10, 13, 11, 75, '7', 3, 21),
(11, 12, 9, 150, '6', 3, 21),
(12, 14, 17, 45, '9', 3, 21),
(13, 8, 18, 250, '3', 3, 21),
(14, 12, 9, 90, '7', 4, 22),
(16, 12, 8, 23, '1', 4, 22),
(17, 14, 15, 100, '12', 3, 21),
(18, 14, 16, 12, '1', 4, 22),
(19, 12, 8, 30, '3', 5, 23),
(20, 14, 16, 25, '5', 5, 23),
(21, 8, 21, 150, '7', 5, 23),
(22, 12, 3, 15, '1', 5, 23),
(23, 12, 3, 3, '3', 12, 24),
(24, 12, 4, 1, '2', 12, 24),
(25, 12, 8, 1, '2', 12, 24),
(26, 12, 9, 5, '3', 12, 24),
(27, 13, 10, 2, '5', 12, 24),
(28, 13, 11, 6, '3', 12, 24),
(29, 13, 13, 7, '2', 12, 24),
(30, 14, 14, 6, '4', 12, 24),
(31, 12, 4, 4, '3', 5, 23),
(32, 12, 9, 6, '3', 5, 23),
(33, 13, 10, 2, '1', 5, 23),
(34, 13, 11, 2, '1', 5, 23),
(35, 13, 12, 4, '2', 5, 23),
(36, 13, 13, 4, '2', 5, 23),
(37, 12, 3, 2, '1', 4, 22),
(38, 12, 4, 3, '1', 4, 22),
(39, 13, 10, 4, '2', 4, 22),
(40, 13, 11, 6, '2', 4, 22),
(41, 13, 12, 6, '4', 4, 22),
(42, 13, 13, 1, '2', 4, 22),
(43, 12, 3, 4, '1', 3, 21),
(44, 12, 4, 4, '1', 3, 21),
(45, 12, 8, 4, '1', 3, 21),
(46, 13, 10, 11, '1', 3, 21),
(47, 13, 12, 2, '5', 3, 21),
(48, 12, 3, 3, '1', 13, 25),
(49, 12, 4, 4, '2', 13, 25),
(50, 12, 8, 5, '3', 13, 25),
(51, 12, 9, 6, '3', 13, 25),
(52, 13, 10, 10, '5', 13, 25),
(53, 13, 11, 23, '2', 13, 25),
(54, 13, 12, 10, '4', 13, 25),
(55, 13, 13, 4, '2', 13, 25),
(56, 14, 14, 2, '2', 13, 25),
(57, 14, 17, 3, '2', 13, 25),
(58, 12, 3, 6, '2', 14, 26),
(59, 12, 4, 2, '1', 14, 26),
(60, 12, 8, 6, '3', 14, 26),
(61, 12, 9, 3, '2', 14, 26),
(62, 13, 10, 2, '1', 14, 26),
(63, 13, 12, 22, '2', 14, 26),
(64, 13, 13, 2, '1', 14, 26),
(65, 14, 14, 2, '1', 14, 26),
(66, 14, 17, 21, '1', 14, 26),
(67, 12, 3, 5, '2', 15, 27),
(68, 12, 4, 3, '1', 15, 27),
(69, 12, 8, 6, '3', 15, 27),
(70, 12, 9, 5, '2', 15, 27),
(71, 13, 10, 10, '2', 15, 27),
(72, 13, 11, 7, '2', 15, 27),
(73, 13, 12, 7, '3', 15, 27),
(74, 13, 13, 10, '5', 15, 27),
(75, 14, 14, 7, '8', 15, 27),
(76, 14, 15, 22, '2', 15, 27),
(77, 12, 3, 10, '2', 16, 28),
(78, 12, 4, 3, '1', 16, 28),
(79, 12, 8, 22, '1', 16, 28),
(80, 12, 9, 11, '1', 16, 28),
(81, 13, 10, 1, '1', 16, 28),
(82, 13, 11, 5, '1', 16, 28),
(83, 13, 12, 4, '2', 16, 28),
(84, 13, 13, 8, '3', 16, 28),
(85, 14, 14, 3, '1', 16, 28),
(86, 14, 15, 8, '3', 16, 28),
(87, 14, 17, 6, '2', 16, 28),
(88, 8, 21, 2, '2', 14, 26),
(89, 12, 9, 4, '6', 23, 29),
(90, 12, 3, 3, '2', 23, 29);

-- --------------------------------------------------------

--
-- Table structure for table `services`
--

CREATE TABLE `services` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `image` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `services`
--

INSERT INTO `services` (`id`, `name`, `image`) VALUES
(8, 'Events', '1495189404.png'),
(9, 'Home', '1495189518.png'),
(10, 'Lessons', '1495189626.png'),
(11, 'Wellness', '1495189741.png'),
(12, 'Business', '1495189828.png'),
(13, 'Crafts', '1495190009.png'),
(14, 'Design & Web', '1495190181.png');

-- --------------------------------------------------------

--
-- Table structure for table `settings`
--

CREATE TABLE `settings` (
  `id` int(11) NOT NULL,
  `site_name` varchar(255) NOT NULL,
  `site_desc` text NOT NULL,
  `site_keyword` text NOT NULL,
  `site_facebook` varchar(255) NOT NULL,
  `site_twitter` varchar(255) NOT NULL,
  `site_gplus` varchar(255) NOT NULL,
  `site_pinterest` varchar(255) NOT NULL,
  `site_instagram` varchar(255) NOT NULL,
  `site_currency` varchar(255) NOT NULL,
  `site_logo` varchar(255) NOT NULL,
  `site_favicon` varchar(255) NOT NULL,
  `site_banner` varchar(255) NOT NULL,
  `site_copyright` varchar(255) NOT NULL,
  `commission_mode` varchar(255) NOT NULL,
  `commission_amt` float NOT NULL,
  `paypal_id` varchar(255) NOT NULL,
  `paypal_url` varchar(255) NOT NULL,
  `withdraw_amt` float NOT NULL,
  `withdraw_option` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `settings`
--

INSERT INTO `settings` (`id`, `site_name`, `site_desc`, `site_keyword`, `site_facebook`, `site_twitter`, `site_gplus`, `site_pinterest`, `site_instagram`, `site_currency`, `site_logo`, `site_favicon`, `site_banner`, `site_copyright`, `commission_mode`, `commission_amt`, `paypal_id`, `paypal_url`, `withdraw_amt`, `withdraw_option`) VALUES
(1, 'Thumbsup', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat', 'lorem,ipsum,lorem,ipsum', 'http://www.facebook.com', 'http://www.twitter.com', 'http://www.google.com', 'http://www.pinterest.com', 'http://www.instagram.com', 'USD', '1501838962.png', '1501838972.png', '1501837831.jpg', '© 2017. All Rights Reserved. Designed by Migrateshop', 'fixed', 100, 'test@test.com', 'https://www.sandbox.paypal.com/cgi-bin/webscr', 10, 'paypal,bank');

-- --------------------------------------------------------

--
-- Table structure for table `shop`
--

CREATE TABLE `shop` (
  `id` int(25) NOT NULL,
  `shop_name` varchar(255) NOT NULL,
  `address` varchar(255) NOT NULL,
  `city` varchar(255) NOT NULL,
  `pin_code` varchar(255) NOT NULL,
  `country` varchar(255) NOT NULL,
  `state` varchar(255) NOT NULL,
  `shop_phone_no` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `shop_date` varchar(255) NOT NULL,
  `start_time` varchar(255) NOT NULL,
  `end_time` varchar(255) NOT NULL,
  `cover_photo` varchar(255) NOT NULL,
  `profile_photo` varchar(255) NOT NULL,
  `seller_email` varchar(250) NOT NULL,
  `user_id` int(50) NOT NULL,
  `featured` varchar(255) NOT NULL,
  `status` varchar(255) NOT NULL,
  `admin_email_status` varchar(200) NOT NULL,
  `booking_opening_days` varchar(255) NOT NULL,
  `booking_per_hour` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `shop`
--

INSERT INTO `shop` (`id`, `shop_name`, `address`, `city`, `pin_code`, `country`, `state`, `shop_phone_no`, `description`, `shop_date`, `start_time`, `end_time`, `cover_photo`, `profile_photo`, `seller_email`, `user_id`, `featured`, `status`, `admin_email_status`, `booking_opening_days`, `booking_per_hour`) VALUES
(21, 'Wine Shop', '42, Featherstone Street LONDON EC1Y 8SY UNITED KINGDOM', 'london', '655220', 'London', 'London', '987564220', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.', '0,1,2,6', '11', '11', '1501759203.jpeg', '1496146095.jpg', 'wpchecking@gmail.com', 3, 'no', 'approved', '0', '5', '3'),
(22, 'Dress Shop', '05-33 Singapore Post Centre Singapore 408600', 'Tony Tan', '408600', 'Singapore', 'Singapore', '996565', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.', '0,1,3,6', '3', '13', '1501759346.jpeg', '1496052063.jpg', 'seller@seller.com', 4, 'no', 'approved', '0', '5', '2'),
(23, 'Shopping Mall', '65,Main Road,Cross Street', 'EC2N', '55364', 'United Kingdom', 'Lon', '800255104', 'This is shopping mall', '1,2,3,4,5', '5', '22', '1501759508.jpeg', '1496129839.jpg', 'sample2@gmail.com', 5, 'no', 'approved', '0', '7', '2'),
(24, 'Book Shop', 'No. 9 Sector 16, Panchkula Haryana.', 'Hisar', '134003', 'India', 'Haryana', '666565', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.', '0,1,2,3,5,6', '10', '21', '1501759634.jpeg', '1497270711.jpg', 'demo@demo.com', 12, 'no', 'approved', '0', '4', '2'),
(25, 'Cycle Shop', '18, 29th Street, Thillai Ganga Nagar, Nanganallur, Chennai 600061', 'chennai', '600061', 'India', 'Tamilnadu', '3243232', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.', '0,1,5,6', '4', '18', '1501757735.jpg', '1497271665.jpeg', 'example@example.com', 13, 'no', 'approved', '0', '4', '3'),
(26, 'Mobile Shop', '1. KASARAGOD. Taluk Office Kasaragod,Kerala', 'Kasaragod', '3242', 'India', 'Kerala', '324324332', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.', '1,2,3,4,5', '4', '13', '1501758403.jpeg', '1497866493.jpg', 'sample@sample.com', 14, 'no', 'approved', '0', '6', '5'),
(27, 'Bike Shop', 'No 9-A/2; Street no 22. Karachi, Pakistan', 'Karachi', '32222', 'Pakistan', 'pk', '9383838', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.', '0,1,2,3,4', '9', '21', '1501758573.jpg', '1497333150.jpeg', 'test@test.com', 15, 'no', 'approved', '0', '17', '5'),
(28, 'Furniture shop', 'No 23, LADY DOAK COLLEGE ROAD,CHOKKIKULAM,MADURAI', 'Madurai', '625002', 'India', 'Tamilnadu', '565656', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.', '0,1,2,3,5,6', '2', '22', '1501758828.jpeg', '1497333617.jpeg', 'checking@checking.com', 16, 'no', 'approved', '0', '6', '5'),
(29, 'sample', 'new', 'dfsa', '32', 'dfsa', 'td', '32', 'dfsa', '0,2', '16', '16', '', '', 'testinguse@gmail.com', 23, 'no', 'approved', '1', '17', '5'),
(30, 'welcome shop', '3232,well', 'mdu', '3232', 'india', 'ta', '32423', 'fdsa', '0,1,4', '2', '2', '', '', 'well@gmail.com', 25, 'no', 'unapproved', '0', '3', '3');

-- --------------------------------------------------------

--
-- Table structure for table `shop_gallery`
--

CREATE TABLE `shop_gallery` (
  `id` int(11) NOT NULL,
  `image` varchar(255) NOT NULL,
  `user_id` int(50) NOT NULL,
  `shop_id` int(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `shop_gallery`
--

INSERT INTO `shop_gallery` (`id`, `image`, `user_id`, `shop_id`) VALUES
(1, '1496056495.jpg', 3, 21),
(3, '1496056590.jpg', 3, 21),
(4, '1496056605.jpg', 3, 21),
(6, '1496056954.jpg', 4, 22),
(7, '1496056986.jpg', 4, 22),
(8, '1496130509.jpg', 5, 23),
(9, '1496130517.jpg', 5, 23),
(10, '1496130525.jpg', 5, 23),
(11, '1497944869.jpg', 14, 26),
(12, '1498113425.jpeg', 16, 28),
(13, '1498113479.jpeg', 16, 28),
(14, '1498113521.jpeg', 16, 28);

-- --------------------------------------------------------

--
-- Table structure for table `subservices`
--

CREATE TABLE `subservices` (
  `subid` int(11) NOT NULL,
  `subname` varchar(255) NOT NULL,
  `service` varchar(255) NOT NULL,
  `subimage` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `subservices`
--

INSERT INTO `subservices` (`subid`, `subname`, `service`, `subimage`) VALUES
(3, 'Accounting', '12', '1495433279.jpg'),
(4, 'Advertising', '12', '1495433362.jpg'),
(8, 'Data Entry', '12', '1495456036.jpg'),
(9, 'Digital Marketing', '12', '1495456096.jpg'),
(10, 'Illustrating', '13', '1495456284.jpg'),
(11, 'Music Engraving', '13', '1495456386.jpg'),
(12, 'Sawmilling', '13', '1495456462.jpg'),
(13, 'Stained Glass', '13', '1495456583.jpg'),
(14, 'Animation', '14', '1495456809.jpg'),
(15, 'E Commerce', '14', '1495456871.jpg'),
(16, 'Technical Design', '14', '1495456947.jpg'),
(17, 'Software Development', '14', '1495457024.jpg'),
(18, 'Wedding Officiant', '8', '1495457118.jpg'),
(19, 'Photo Booth Rental', '8', '1495457178.jpg'),
(20, 'Event Photography', '8', '1495457227.jpg'),
(21, 'Face Painting', '8', '1495457302.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `testimonials`
--

CREATE TABLE `testimonials` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `image` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `testimonials`
--

INSERT INTO `testimonials` (`id`, `name`, `description`, `image`) VALUES
(3, 'Mickey Peter', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.', '1495604998.jpg'),
(5, 'John', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.', '1495544971.jpg'),
(6, 'Barbie', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.', '1495604691.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `gender` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `photo` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `admin` int(11) NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `password`, `gender`, `phone`, `photo`, `admin`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'admin', 'admin@admin.com', '$2y$10$QKmqNVSrMGfkOOXxf9L6mOHS69fmxrlCQu6eSi1JoIOL5cbLHJNQ6', 'male', '9876543211', '1497867287.jpg', 1, 'zqf6XQ1tkHzY8Hp5HWzn7JvvSDlmQ8WC0TdMSDCisaf7oq09f4yW69dEHhKG', '2017-05-25 01:30:45', '2017-05-25 01:30:45'),
(3, 'wpchecking', 'wpchecking@gmail.com', '$2y$10$xuWJLOqYhkIqJhNUXYAn2uXm4kJlV3oCfLcpOGlb.mTSKXnfN2zyK', 'male', '987645454', '', 2, '6ss7Jc9yWAITXfwAJ5oyF6UqvVwSQomSMk8hR12oi6fvuOwr2DJ4kcwsbo3Z', '2017-05-25 02:15:06', '2017-05-25 02:15:06'),
(4, 'seller', 'seller@seller.com', '$2y$10$pwVcpcfi9nUebYbOPeH72.Begd5SeSuUhCV8pwgA/n1t9/K7uzDC6', 'male', '9876543210', '1497510195.jpg', 2, 'heMY6jk5kXr7EQQktkhaWLDzWBRKYYTbYf2AHaEo1Nz5smMKW2wjAbJ7gxIQ', '2017-05-29 04:11:47', '2017-05-29 04:11:47'),
(5, 'sample2', 'sample2@gmail.com', '$2y$10$cEtkCBwBEW33SLMdzVe29um2Ac/e.iwejb2gV5mMcATHsFEDHCl4W', 'male', '965666536', '', 2, 'IVAi7HLw7rJmb4bpmuuck7Olo63VAunEvb4jwPfXvNIunQLmBwMtW7ezOMSy', '2017-05-30 02:00:10', '2017-05-30 02:00:10'),
(12, 'demo', 'demo@demo.com', '$2y$10$hW3H/Bn1DwmN1jCAbGdDtea3DAANC7EpXgs596RhBNhpjSiDPUOIy', 'male', '4654546', '', 2, 'grOIxjZsyhPOIpl56sOq8UacCFtBEj6lxwTQAlDsTV52h5tFA9UnhJy8kZ58', '2017-06-12 06:52:17', '2017-06-12 06:52:17'),
(13, 'example', 'example@example.com', '$2y$10$GCkim/ZwkXJ5amVWXPQdL.UpVXiGT/OtKk6HiZHwlbrMuU2Di7Xvi', 'male', '2132131', '', 2, 'Q473VsnYY5ODmym8NzPaplzQpFfJgOeA2ihlNomawnYRn3YoAVANQCmNXYN4', '2017-06-12 07:11:47', '2017-06-12 07:11:47'),
(14, 'sample', 'sample@sample.com', '$2y$10$HXECgnrteWRTez4AHJkpp.sv2Myk97BJIyQdmn4qAyTJ6b4fSf.jG', 'male', '32432', '1497864972.jpg', 2, 'Te0JPnXNX0Yb6KrePLWXtC0KfuLn0R4muCPLgojLTiXJxne6MtdN6N008nAX', '2017-06-12 07:22:31', '2017-06-12 07:22:31'),
(15, 'test', 'test@test.com', '$2y$10$wrMRdtaRD/4FHnMOkpeZC.GbuB9FizGRET6X3uxZoBtWr3ctE7Dye', 'male', '655554', '', 2, 'mFKDYxLRpaddsNxol7wG3HhKdFoa3oraMjvwpUwWxsnKC58Sx7TG5ooqTKcK', '2017-06-13 00:18:47', '2017-06-13 00:18:47'),
(16, 'checking', 'checking@checking.com', '$2y$10$F4pp.n0CJTJU6lKAXtVjc.zVGR3Y4VqlUKZPtSVt16fE4QcQmmuAy', 'male', '3243232', '', 2, 'Ribyq1sXB6HRiFqlZfdNMYo2CqIA2k0hnMVCklyItDoVlc0XzvuNW0c4XaQX', '2017-06-13 00:25:28', '2017-06-13 00:25:28'),
(17, 'customer', 'customer@customer.com', '$2y$10$W5iqjfAHDw.9u4H9cet83O6JMPQ/nysJPLW/w54Cfa66LyBOIvbaS', 'female', '565655', '', 0, 'ahQdj7b1h4SmRBxzAIgN6b2VerDIqJ9UwxPgoAXFvqSmLVWhIduPg5Ma2W3s', '2017-06-13 02:06:25', '2017-06-13 02:06:25'),
(18, 'newuser', 'newuser@gmail.com', '$2y$10$HbwwAr3cvPbuHjdCVhJ/B.7fFD3bAdCkLMAXPsYrmnElZHhi0rfd.', 'male', '9858554', '', 0, '3bnd72LFHYgCimUdRIirtEte2s0Zr31kRsu04w0jcoZu1bl2ATix7h1lVvrS', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `withdraw`
--

CREATE TABLE `withdraw` (
  `wid` int(11) NOT NULL,
  `shop_balance` float NOT NULL,
  `withdraw_amt` float NOT NULL,
  `total_balance` float NOT NULL,
  `withdraw_mode` varchar(255) NOT NULL,
  `paypal_id` varchar(255) NOT NULL,
  `bank_acc_no` varchar(255) NOT NULL,
  `bank_info` varchar(255) NOT NULL,
  `ifsc_code` varchar(255) NOT NULL,
  `withdraw_shop_id` int(50) NOT NULL,
  `withdraw_status` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `withdraw`
--

INSERT INTO `withdraw` (`wid`, `shop_balance`, `withdraw_amt`, `total_balance`, `withdraw_mode`, `paypal_id`, `bank_acc_no`, `bank_info`, `ifsc_code`, `withdraw_shop_id`, `withdraw_status`) VALUES
(37, 416, 30, 446, 'paypal', 'welcome@welcome.com', '', '', '', 26, 'completed'),
(38, 416, 19, 416, 'paypal', 'testinguser@gmail.com', '', '', '', 26, 'pending'),
(39, 387, 10, 397, 'paypal', 'hjhg@gfgg.cc', '', '', '', 26, 'completed'),
(40, 265, 16, 265, 'paypal', 'new@ddd.com', '', '', '', 29, 'pending');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `booking`
--
ALTER TABLE `booking`
  ADD PRIMARY KEY (`book_id`);

--
-- Indexes for table `contact_vendor`
--
ALTER TABLE `contact_vendor`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pages`
--
ALTER TABLE `pages`
  ADD PRIMARY KEY (`page_id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `rating`
--
ALTER TABLE `rating`
  ADD PRIMARY KEY (`rid`);

--
-- Indexes for table `seller_services`
--
ALTER TABLE `seller_services`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `services`
--
ALTER TABLE `services`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `settings`
--
ALTER TABLE `settings`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `shop`
--
ALTER TABLE `shop`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `shop_gallery`
--
ALTER TABLE `shop_gallery`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `subservices`
--
ALTER TABLE `subservices`
  ADD PRIMARY KEY (`subid`);

--
-- Indexes for table `testimonials`
--
ALTER TABLE `testimonials`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- Indexes for table `withdraw`
--
ALTER TABLE `withdraw`
  ADD PRIMARY KEY (`wid`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `booking`
--
ALTER TABLE `booking`
  MODIFY `book_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=48;
--
-- AUTO_INCREMENT for table `contact_vendor`
--
ALTER TABLE `contact_vendor`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `pages`
--
ALTER TABLE `pages`
  MODIFY `page_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
--
-- AUTO_INCREMENT for table `rating`
--
ALTER TABLE `rating`
  MODIFY `rid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;
--
-- AUTO_INCREMENT for table `seller_services`
--
ALTER TABLE `seller_services`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=91;
--
-- AUTO_INCREMENT for table `services`
--
ALTER TABLE `services`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;
--
-- AUTO_INCREMENT for table `settings`
--
ALTER TABLE `settings`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `shop`
--
ALTER TABLE `shop`
  MODIFY `id` int(25) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;
--
-- AUTO_INCREMENT for table `shop_gallery`
--
ALTER TABLE `shop_gallery`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;
--
-- AUTO_INCREMENT for table `subservices`
--
ALTER TABLE `subservices`
  MODIFY `subid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;
--
-- AUTO_INCREMENT for table `testimonials`
--
ALTER TABLE `testimonials`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;
--
-- AUTO_INCREMENT for table `withdraw`
--
ALTER TABLE `withdraw`
  MODIFY `wid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=41;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
