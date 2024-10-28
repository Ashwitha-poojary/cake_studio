-- phpMyAdmin SQL Dump
-- version 4.9.4
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Sep 07, 2020 at 03:02 AM
-- Server version: 10.4.11-MariaDB
-- PHP Version: 7.3.13

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `cstudio`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` int(10) NOT NULL,
  `name` varchar(191) NOT NULL,
  `email` varchar(191) NOT NULL,
  `passwd` varchar(191) NOT NULL,
  `status` int(2) NOT NULL DEFAULT 1,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `name`, `email`, `passwd`, `status`, `created_at`) VALUES
(1, 'var', 'admin@g', '1a1dc91c907325c69271ddf0c944bc72', 1, '2020-07-31 08:27:16'),
(10, 'varun', 'P@G', '5f4dcc3b5aa765d61d8327deb882cf99', 2, '2020-09-06 11:44:16');

-- --------------------------------------------------------

--
-- Table structure for table `bills`
--

CREATE TABLE `bills` (
  `id` int(10) NOT NULL,
  `name` varchar(191) NOT NULL,
  `userid` int(10) NOT NULL,
  `itemid` int(10) NOT NULL,
  `shopid` int(10) NOT NULL,
  `number` bigint(11) NOT NULL,
  `addr` varchar(255) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `totalprice` double(10,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `bills`
--

INSERT INTO `bills` (`id`, `name`, `userid`, `itemid`, `shopid`, `number`, `addr`, `created_at`, `totalprice`) VALUES
(15, 'vanilla', 9, 1, 1, 8086838393, 'hty', '2020-06-21 06:44:11', 200.00),
(16, 'sample', 9, 10, 1, 8086838393, 'hty', '2020-06-21 06:44:11', 400.00),
(17, 'vanilla', 9, 7, 1, 8086838393, 'hty', '2020-07-17 12:25:39', 200.00),
(18, 'vanilla', 9, 1, 1, 8086838393, 'hty', '2020-07-17 12:25:39', 200.00),
(19, 'Vanilla Cake', 9, 11, 7, 8086838393, 'opp mannagudda circle ,mangalore', '2020-08-19 06:18:12', 500.00),
(20, 'Chocolate Cake', 9, 12, 7, 8086838393, 'opp mannagudda circle ,mangalore', '2020-08-19 06:18:12', 800.00),
(21, 'Vanilla Cake', 9, 11, 7, 8086838393, 'opp mannagudda circle ,mangalore', '2020-09-03 13:16:06', 2000.00),
(22, 'Vanilla Cake', 9, 11, 7, 8086838393, 'opp mannagudda circle ,mangalore', '2020-09-03 13:16:06', 2000.00),
(23, 'Vanilla Cake', 9, 11, 7, 8086838393, 'opp mannagudda circle ,mangalore', '2020-09-03 13:16:06', 2000.00),
(24, 'Vanilla Cake', 9, 11, 7, 8086838393, 'opp mannagudda circle ,mangalore', '2020-09-03 13:16:06', 1500.00),
(25, 'Vanilla Cake', 9, 11, 7, 8086838393, 'opp mannagudda circle ,mangalore', '2020-09-06 16:18:15', 500.00);

-- --------------------------------------------------------

--
-- Table structure for table `cart`
--

CREATE TABLE `cart` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `shop_id` int(11) NOT NULL,
  `item_id` int(11) NOT NULL,
  `quantity` float NOT NULL,
  `srequest` text NOT NULL,
  `cust_img` varchar(191) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `comments`
--

CREATE TABLE `comments` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `item_id` int(11) NOT NULL,
  `msg` text NOT NULL,
  `date` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `comments`
--

INSERT INTO `comments` (`id`, `user_id`, `item_id`, `msg`, `date`) VALUES
(33, 7, 2, 'nice picture', '2020-08-16 20:12:07');

-- --------------------------------------------------------

--
-- Table structure for table `items`
--

CREATE TABLE `items` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `shop_id` int(11) NOT NULL,
  `item_img` varchar(255) NOT NULL,
  `descp` longtext NOT NULL,
  `price` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `items`
--

INSERT INTO `items` (`id`, `name`, `shop_id`, `item_img`, `descp`, `price`, `created_at`) VALUES
(1, 'vanilla', 8, 'thor-ragnarok-4k-2017-u2.jpg', 'it is good cake', 200, '2020-03-12 17:47:38'),
(2, 'vanilla', 8, '_MG_6182.JPG', 'nice', 100, '2020-03-12 17:49:50'),
(5, 'sample', 8, '1366x768.jpg', 'good one', 800, '2020-06-07 14:00:59'),
(6, 'Test', 6, 'All courses offered by Nitte.jpg', 'Tesr', 0, '2020-06-07 14:40:18'),
(7, 'vanilla', 1, '1590333216434.jpg', 'nice', 200, '2020-06-09 06:50:49'),
(8, 'vanilla', 8, 'Electro-Thor.jpg', 'nice', 1000, '2020-06-09 06:54:26'),
(10, 'sample', 1, 'xgzfz.jpg', 'easy', 400, '2020-06-09 13:27:37'),
(11, 'Vanilla Cake', 7, 'the-best-vegan-vanilla-cake-1-2-500x500.jpg', 'Its light, tender, and full of vanilla flavor. The buttery, moist texture makes it a great cake for all occasions.', 500, '2020-08-19 05:40:47'),
(12, 'Chocolate Cake', 7, 'IMG_0422.jpg', 'This chocolate cake is wonderfully moist and so delicious with a chocolate fudge frosting', 800, '2020-08-19 05:47:28');

-- --------------------------------------------------------

--
-- Table structure for table `notification`
--

CREATE TABLE `notification` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `shop_id` int(11) NOT NULL,
  `order_id` int(11) NOT NULL,
  `status` text NOT NULL,
  `date` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `notification`
--

INSERT INTO `notification` (`id`, `user_id`, `shop_id`, `order_id`, `status`, `date`) VALUES
(3, 9, 1, 1, 'read', '2020-08-12 15:23:01');

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `id` int(10) NOT NULL,
  `user_id` int(10) NOT NULL,
  `shop_id` int(10) NOT NULL,
  `item_id` int(10) NOT NULL,
  `bill_id` int(10) NOT NULL,
  `quantity` float NOT NULL,
  `srequest` text NOT NULL,
  `cust_img` varchar(191) NOT NULL,
  `ordered_on` timestamp NOT NULL DEFAULT current_timestamp(),
  `price` double(10,2) NOT NULL,
  `status` varchar(255) NOT NULL DEFAULT 'Order Placed'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`id`, `user_id`, `shop_id`, `item_id`, `bill_id`, `quantity`, `srequest`, `cust_img`, `ordered_on`, `price`, `status`) VALUES
(1, 9, 1, 1, 15, 0, 'hey', 'Joker_hero_Closeup_Joaquin_Phoenix_Joker_2019_570286_1366x768.jpg', '2020-06-21 06:44:11', 200.00, 'Order Delivered'),
(2, 9, 1, 10, 16, 0, '', '', '2020-06-21 06:44:11', 400.00, 'Order Delivered'),
(3, 9, 1, 7, 17, 0, '', '', '2020-07-17 12:25:39', 200.00, 'Order Delivered'),
(4, 9, 1, 1, 18, 1, '', '', '2020-07-17 12:25:39', 200.00, 'Order Delivered'),
(5, 9, 7, 11, 19, 0.5, '', '', '2020-08-19 06:18:12', 500.00, 'Order Recieved'),
(6, 9, 7, 12, 20, 2, '', '', '2020-08-19 06:18:12', 800.00, 'Order Recieved'),
(7, 9, 7, 11, 21, 1, '', '', '2020-09-03 13:16:06', 2000.00, 'Order Recieved'),
(8, 9, 7, 11, 22, 2, '', '', '2020-09-03 13:16:06', 2000.00, 'Order Recieved'),
(9, 9, 7, 11, 23, 2, '', '', '2020-09-03 13:16:06', 2000.00, 'Order Recieved'),
(10, 9, 7, 11, 24, 1.5, '', '', '2020-09-03 13:16:06', 1500.00, 'Order Recieved'),
(11, 9, 7, 11, 25, 0, '', 'the-best-vegan-vanilla-cake-1-2-500x500.jpg', '2020-09-06 16:18:15', 500.00, 'Order Recieved');

-- --------------------------------------------------------

--
-- Table structure for table `shop`
--

CREATE TABLE `shop` (
  `id` int(11) NOT NULL,
  `sname` varchar(191) NOT NULL,
  `ownername` varchar(191) NOT NULL,
  `email` varchar(191) NOT NULL,
  `passwd` varchar(255) NOT NULL,
  `details` text NOT NULL,
  `addrs` varchar(255) NOT NULL,
  `shop_img` varchar(255) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `status` int(11) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `shop`
--

INSERT INTO `shop` (`id`, `sname`, `ownername`, `email`, `passwd`, `details`, `addrs`, `shop_img`, `created_at`, `status`) VALUES
(7, 'Mariams Bakers Treat', 'Boss Dude', 'P@G', '5f4dcc3b5aa765d61d8327deb882cf99', 'For most of us, coffee makes it possible to get out of bed, while cupcakes make it worth the while. If you’re someone who swears by this mantra as well, then we present to you one of the city’s most loved bakery cum Café -- Baker’s treat from Mariam’s Kitchen. A beautiful minimalist inviting space, on Mother Theresa’s road, bang opposite Platinum Theater, where you could lose count of hours spent chilling with friends, but you know coming from us it can’t be all that simple. What’s going to make you come back for more (besides the sweetness resting on the display counters), is the concept of board games, that is reminiscent of a lovely childhood for every 90s kid out there. ', 'Near Canara High School, Dongerkerry,Mangalore', 'Bakers-Treat-Mariams-Kitchen-Falnir-Mangalore-P3.jpg', '2020-08-19 05:03:47', 0),
(8, 'Crumbz Cake Shop', 'Dayanand', 'crumbz@g.com', '1a1dc91c907325c69271ddf0c944bc72', 'Crumbz in Dongarakere has a wide range of products and services to cater to the varied requirements of their customers. The staff at this establishment are courteous and prompt at providing any assistance. They readily answer any queries or questions that you may have. Pay for the product or service with ease by using any of the available modes of payment, such as Cash, Debit Cards.', 'Near Canara High School, Dongerkerry,Mangalore', 'crumbz-kottara-mangalore-cake-shops-19i9ieq.jpg', '2020-08-19 05:52:13', 1);

-- --------------------------------------------------------

--
-- Table structure for table `testc`
--

CREATE TABLE `testc` (
  `id` int(5) NOT NULL,
  `email` varchar(255) NOT NULL,
  `passwd` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `testc`
--

INSERT INTO `testc` (`id`, `email`, `passwd`) VALUES
(117, 'gd@fv', '19f8b291ddc2bbaafe41052e3be4a743'),
(118, 'varunk2499@gmail.com', '2ab4f27ab1ffdcdad8ed21a965ca62ad'),
(119, 'varunk2499@gmail.com', '2ab4f27ab1ffdcdad8ed21a965ca62ad'),
(120, 'varunk2499@gmail.com', '2ab4f27ab1ffdcdad8ed21a965ca62ad'),
(121, 'varunk2499@gmail.com', '2ab4f27ab1ffdcdad8ed21a965ca62ad'),
(122, 'varunk2499@gmail.com', '2ab4f27ab1ffdcdad8ed21a965ca62ad'),
(123, 'varunk2499@gmail.co', '4e58188ff528dea1eec738fffc0e118d'),
(124, 'P@G', '4e58188ff528dea1eec738fffc0e118d'),
(125, 'v@g.m', '93122a9e4abcba124d5a7d4beaba3f89'),
(126, 'm@v', '4e58188ff528dea1eec738fffc0e118d');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `uname` varchar(191) NOT NULL,
  `email` varchar(191) NOT NULL,
  `passwd` varchar(255) NOT NULL,
  `phno` bigint(11) NOT NULL,
  `addr` varchar(255) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `status` int(2) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `uname`, `email`, `passwd`, `phno`, `addr`, `created_at`, `status`) VALUES
(7, 'Varun Kumar K', 'varunk2499@gmail.com', '5f4dcc3b5aa765d61d8327deb882cf99', 8086838393, 'kodialbail mangalore mangalore', '2020-03-11 04:56:12', 1),
(8, 'Varun Kumar K', 'v@g.m', '1a1dc91c907325c69271ddf0c944bc72', 8086838393, 'hey', '2020-03-12 04:53:24', 1),
(9, 'Varun Kumar', 'P@G', '7c6a180b36896a0a8c02787eeafb0e4c', 8086838393, 'opp mannagudda circle ,mangalore', '2020-03-12 05:24:39', 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `bills`
--
ALTER TABLE `bills`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `cart`
--
ALTER TABLE `cart`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `comments`
--
ALTER TABLE `comments`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `items`
--
ALTER TABLE `items`
  ADD PRIMARY KEY (`id`),
  ADD KEY `shop_id` (`shop_id`);

--
-- Indexes for table `notification`
--
ALTER TABLE `notification`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `bill_id` (`bill_id`);

--
-- Indexes for table `shop`
--
ALTER TABLE `shop`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `testc`
--
ALTER TABLE `testc`
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
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `bills`
--
ALTER TABLE `bills`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT for table `cart`
--
ALTER TABLE `cart`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT for table `comments`
--
ALTER TABLE `comments`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;

--
-- AUTO_INCREMENT for table `items`
--
ALTER TABLE `items`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `notification`
--
ALTER TABLE `notification`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `shop`
--
ALTER TABLE `shop`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `testc`
--
ALTER TABLE `testc`
  MODIFY `id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=127;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
