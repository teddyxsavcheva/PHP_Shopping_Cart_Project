-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3307
-- Generation Time: Jan 14, 2024 at 09:26 AM
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
-- Database: `shoppingcart_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `shoppingcart_table`
--

CREATE TABLE `shoppingcart_table` (
  `id` int(11) NOT NULL,
  `product_name` varchar(40) NOT NULL,
  `product_price` float DEFAULT NULL,
  `product_image` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `shoppingcart_table`
--

INSERT INTO `shoppingcart_table` (`id`, `product_name`, `product_price`, `product_image`) VALUES
(1, 'Narciso Rodriguez All of me', 120, './upload/perfume1.1.jpg'),
(2, 'Dolce & Gabbana Italian Love', 160, './upload/perfume2.jpg'),
(3, 'Creed Wild Flowers', 140, './upload/perfume4.jpg'),
(4, 'Burberry Goddess', 180, './upload/perfume3.jpg');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `shoppingcart_table`
--
ALTER TABLE `shoppingcart_table`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `shoppingcart_table`
--
ALTER TABLE `shoppingcart_table`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
