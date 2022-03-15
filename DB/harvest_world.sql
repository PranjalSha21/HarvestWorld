-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 15, 2022 at 05:26 PM
-- Server version: 10.4.22-MariaDB
-- PHP Version: 8.1.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `harvest_world`
--

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `product_id` int(11) NOT NULL,
  `product_name` varchar(100) DEFAULT NULL,
  `product_price` int(11) DEFAULT NULL,
  `product_image` varchar(100) DEFAULT NULL,
  `product_quantity` int(11) DEFAULT NULL,
  `product_description` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `queries`
--

CREATE TABLE `queries` (
  `id` int(11) NOT NULL,
  `query` varchar(111) DEFAULT NULL,
  `user_name` varchar(100) DEFAULT NULL,
  `user_id` int(100) DEFAULT NULL,
  `time` date DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `queries`
--

INSERT INTO `queries` (`id`, `query`, `user_name`, `user_id`, `time`) VALUES
(3, 'first query', 'Muhammed Sahal', 1, '2022-03-13'),
(4, 'second query', 'Muhammed Sahal', 1, '2022-03-13');

-- --------------------------------------------------------

--
-- Table structure for table `reply_query`
--

CREATE TABLE `reply_query` (
  `id` int(11) NOT NULL,
  `query_id` int(11) DEFAULT NULL,
  `user_id` int(11) DEFAULT NULL,
  `user_name` varchar(100) DEFAULT NULL,
  `query` varchar(1000) DEFAULT NULL,
  `time` date DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `reply_query`
--

INSERT INTO `reply_query` (`id`, `query_id`, `user_id`, `user_name`, `query`, `time`) VALUES
(3, 3, 1, 'Muhammed Sahal', 'dsaasd', '2022-03-13'),
(4, 4, 1, 'Muhammed Sahal', 'asdasdasd', '2022-03-13'),
(5, 3, 5, 'asd', 'i am asd', '2022-03-13'),
(6, 4, 5, 'asd', 'I am aslo asd', '2022-03-13');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `name` varchar(100) DEFAULT NULL,
  `phone` int(11) DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  `password` varchar(100) DEFAULT NULL,
  `address` varchar(100) DEFAULT NULL,
  `user_type` varchar(10) DEFAULT 'USER',
  `subscription` varchar(10) DEFAULT 'NORMAL'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `phone`, `email`, `password`, `address`, `user_type`, `subscription`) VALUES
(1, 'Muhammed Sahal', 2147483647, 'muhammedsahalsm155@gmail.com', '123', '#1,2nd floor,4th main,8th cros', 'USER', 'NORMAL'),
(4, 'Admin', 2147483647, 'admin@gmail.com', 'admin', 'admins locating is not required', 'ADMIN', 'NORMAL'),
(5, 'asd', 2147483647, 'asd@gmail.com', 'asd', '#1,2nd floor,4th main,8th cros', 'USER', 'NORMAL');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`product_id`);

--
-- Indexes for table `queries`
--
ALTER TABLE `queries`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `reply_query`
--
ALTER TABLE `reply_query`
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
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `product_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `queries`
--
ALTER TABLE `queries`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `reply_query`
--
ALTER TABLE `reply_query`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
