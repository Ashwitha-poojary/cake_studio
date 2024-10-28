-- phpMyAdmin SQL Dump
-- version 4.9.4
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Jan 22, 2023 at 08:09 AM
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
(1, 'Varun', 'varunk2499@gmail.com', '7c6a180b36896a0a8c02787eeafb0e4c', 1, '2020-07-31 08:27:16'),
(10, 'varun', 'P@G', '5f4dcc3b5aa765d61d8327deb882cf99', 1, '2020-09-06 11:44:16');

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
(35, 'Vanilla Cake', 7, 11, 7, 8086838393, 'kodialbail mangalore mangalore', '2020-09-07 09:43:37', 1000.00),
(36, 'Vanilla Cake', 7, 11, 7, 8086838393, 'kodialbail mangalore mangalore', '2021-09-01 07:20:35', 500.00);

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
(39, 7, 18, 'Fantastic Cake', '2021-09-05 08:25:26'),
(41, 7, 18, 'Good one', '2021-09-05 08:25:45'),
(42, 7, 18, 'Bad cake', '2021-09-05 08:32:15');

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
(11, 'Vanilla Cake', 7, 'the-best-vegan-vanilla-cake-1-2-500x500.jpg', 'Its light, tender, and full of vanilla flavor. The buttery, moist texture makes it a great cake for all occasions.', 500, '2020-08-19 05:40:47'),
(12, 'Chocolate Cake', 7, 'IMG_0422.jpg', 'This chocolate cake is wonderfully moist and so delicious with a chocolate fudge frosting', 800, '2020-08-19 05:47:28'),
(18, 'Pineapple Cake', 9, 'flowery-pineapple-cake-500x500.jpg', 'Pineapple cake is a sweet traditional Taiwanese pastry containing butter, flour, egg, sugar, and pineapple jam or slices.', 800, '2020-09-07 04:09:45'),
(19, 'Mango Meringue Cake', 9, 'mangofudgy-cake_article.jpg', 'With a magical combination of mangoes and mascarpone cheese, this beautiful looking cake is actually very easy to make.', 550, '2020-09-07 04:10:21'),
(20, 'Chocolate truffle cake', 7, 'truffle.jpg', 'At the heart of this chocolate truffle cake is a richly flavoured chocolate sponge with a hint of coffee flavour. ', 600, '2020-09-07 04:12:11'),
(21, 'Oreo Cheesecake', 7, 'oreo.jpg', 'This Oreo Cheesecake is thick, creamy and filled with cookies and cream! It’s baked in an Oreo crust and topped with white chocolate ganache ', 900, '2020-09-07 04:13:50'),
(22, 'Cherry Cheesecake', 8, 'Cherry-Cheesecake-H-RES-740x486.jpg', 'The secret is making the cherry topping yourself which is crazy easy and only takes a few minutes.', 880, '2020-09-07 04:16:55'),
(23, 'Chocolate truffle cake', 8, 'truffle.jpg', 'At the heart of this chocolate truffle cake is a richly flavoured chocolate sponge with a hint of coffee flavour. ', 990, '2020-09-07 04:18:05'),
(24, 'Vanilla Cake', 7, 'vm-cake-shop-nashik-pjf3z.jpg', 'good cake', 500, '2020-09-07 09:44:48');

-- --------------------------------------------------------

--
-- Table structure for table `notification`
--

CREATE TABLE `notification` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `shop_id` int(11) NOT NULL,
  `order_id` int(11) NOT NULL,
  `status` text NOT NULL DEFAULT 'unread',
  `date` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `notification`
--

INSERT INTO `notification` (`id`, `user_id`, `shop_id`, `order_id`, `status`, `date`) VALUES
(5, 7, 7, 27, 'read', '2020-09-07 15:15:01'),
(6, 7, 7, 28, 'unread', '2021-09-01 12:59:33');

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
  `status` varchar(255) NOT NULL DEFAULT 'Placed'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`id`, `user_id`, `shop_id`, `item_id`, `bill_id`, `quantity`, `srequest`, `cust_img`, `ordered_on`, `price`, `status`) VALUES
(27, 7, 7, 11, 35, 1, 'write happy brthday', 'oreo.jpg', '2020-09-07 09:43:37', 1000.00, 'Delivered'),
(28, 7, 7, 11, 36, 0.5, '', '', '2021-09-01 07:20:35', 500.00, 'Delivered');

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
(7, 'Mariams Bakers Treat', 'Varun', 'varunk2499@gmail.com', '7c6a180b36896a0a8c02787eeafb0e4c', 'For most of us, coffee makes it possible to get out of bed, while cupcakes make it worth the while. If you’re someone who swears by this mantra as well, then we present to you one of the city’s most loved bakery cum Café -- Baker’s treat from Mariam’s Kitchen. A beautiful minimalist inviting space, on Mother Theresa’s road, bang opposite Platinum Theater, where you could lose count of hours spent chilling with friends, but you know coming from us it can’t be all that simple. What’s going to make you come back for more (besides the sweetness resting on the display counters), is the concept of board games, that is reminiscent of a lovely childhood for every 90s kid out there. ', 'Near Canara High School, Dongerkerry,Mangalore', 'Bakers-Treat-Mariams-Kitchen-Falnir-Mangalore-P3.jpg', '2020-08-19 05:03:47', 0),
(8, 'Crumbz Cake Shop', 'Dayanand', 'crumbz@g.com', '1a1dc91c907325c69271ddf0c944bc72', 'Crumbz in Dongarakere has a wide range of products and services to cater to the varied requirements of their customers. The staff at this establishment are courteous and prompt at providing any assistance. They readily answer any queries or questions that you may have. Pay for the product or service with ease by using any of the available modes of payment, such as Cash, Debit Cards.', 'Near Canara High School, Dongerkerry,Mangalore', 'crumbz-kottara-mangalore-cake-shops-19i9ieq.jpg', '2020-08-19 05:52:13', 0),
(9, 'Gyp Gyp', 'Rajesh', 'rajesh@gmail.com', '5f4dcc3b5aa765d61d8327deb882cf99', 'Bakeries mainly stock cakes and pastries, however, they also have a wide variety of homemade snacks for those who would like to catch up a quick bite.', 'Kottara cross,opp circle,Mangalore-575003', 'gyp.jpg', '2020-09-07 04:08:13', 0);

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
(7, 'Varun Kumar K', 'varunk2499@gmail.com', '7c6a180b36896a0a8c02787eeafb0e4c', 8086838393, 'kodialbail mangalore mangalore', '2020-03-11 04:56:12', 0),
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
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;

--
-- AUTO_INCREMENT for table `cart`
--
ALTER TABLE `cart`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;

--
-- AUTO_INCREMENT for table `comments`
--
ALTER TABLE `comments`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=43;

--
-- AUTO_INCREMENT for table `items`
--
ALTER TABLE `items`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT for table `notification`
--
ALTER TABLE `notification`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT for table `shop`
--
ALTER TABLE `shop`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

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
