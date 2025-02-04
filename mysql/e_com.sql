-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 25, 2024 at 02:48 PM
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
-- Database: `casual`
--

-- --------------------------------------------------------

--
-- Table structure for table `admins`
--

CREATE TABLE `admins` (
  `admin_id` int(100) NOT NULL,
  `admin_name` varchar(255) NOT NULL,
  `admin_email` varchar(255) NOT NULL,
  `admin_pass` varchar(255) NOT NULL,
  `admin_image` text NOT NULL,
  `admin_contact` varchar(255) NOT NULL,
  `admin_country` text NOT NULL,
  `admin_job` varchar(255) NOT NULL,
  `admin_about` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `admins`
--

INSERT INTO `admins` (`admin_id`, `admin_name`, `admin_email`, `admin_pass`, `admin_image`, `admin_contact`, `admin_country`, `admin_job`, `admin_about`) VALUES
(5, 'casual casual', 'admin casual', '123', 'Dino kuning.jpg', '7015963438', 'Indonesia', 'WEB DEVELOPER', 'admin mas bro');

-- --------------------------------------------------------

--
-- Table structure for table `boxes_section`
--

CREATE TABLE `boxes_section` (
  `box_id` int(100) NOT NULL,
  `box_icon` varchar(100) NOT NULL,
  `box_title` varchar(255) NOT NULL,
  `box_desc` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `boxes_section`
--

INSERT INTO `boxes_section` (`box_id`, `box_icon`, `box_title`, `box_desc`) VALUES
(4, 'fa fa-trash', 'BEST IN MARKET', 'offer'),
(6, 'fa fa-shipping-fast fa-5', 'FAST SERVICE', 'raw'),
(7, 'fa fa-user', 'EDIT YOURSELF', 'edit'),
(8, 'fa fa-trash', 'DELETE EVERYTHING', 'delete');

-- --------------------------------------------------------

--
-- Table structure for table `cart`
--

CREATE TABLE `cart` (
  `p_id` int(100) NOT NULL,
  `ip_add` varchar(255) NOT NULL,
  `qty` int(100) NOT NULL,
  `size` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `cat_id` int(100) NOT NULL,
  `cat_title` text NOT NULL,
  `cat_desc` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`cat_id`, `cat_title`, `cat_desc`) VALUES
(7, 'Stone Island ', 'All Stone Island Product'),
(8, 'Adidas', 'All Adidas Product'),
(9, 'New Belance', 'All New Belance Product');

-- --------------------------------------------------------

--
-- Table structure for table `customers`
--

CREATE TABLE `customers` (
  `customer_id` int(100) NOT NULL,
  `customer_name` varchar(255) NOT NULL,
  `customer_email` varchar(255) NOT NULL,
  `customer_pass` varchar(255) NOT NULL,
  `customer_country` text NOT NULL,
  `customer_city` text NOT NULL,
  `customer_contact` varchar(255) NOT NULL,
  `customer_address` text NOT NULL,
  `customer_image` text NOT NULL,
  `customer_ip` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `customers`
--

INSERT INTO `customers` (`customer_id`, `customer_name`, `customer_email`, `customer_pass`, `customer_country`, `customer_city`, `customer_contact`, `customer_address`, `customer_image`, `customer_ip`) VALUES
(1, 'labib', 'labib', '123', 'indonesia', 'cirebon', '08381882551', 'kendal', '♡.jpeg', '127.0.0.1');

-- --------------------------------------------------------

--
-- Table structure for table `customer_order`
--

CREATE TABLE `customer_order` (
  `order_id` int(10) NOT NULL,
  `customer_id` int(10) NOT NULL,
  `product_id` int(100) NOT NULL,
  `due_amount` int(100) NOT NULL,
  `invoice_no` int(100) NOT NULL,
  `qty` int(10) NOT NULL,
  `size` text NOT NULL,
  `order_date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `order_status` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `customer_order`
--

INSERT INTO `customer_order` (`order_id`, `customer_id`, `product_id`, `due_amount`, `invoice_no`, `qty`, `size`, `order_date`, `order_status`) VALUES
(1, 1, 11, 300000, 2064683819, 1, 'RED & Blue', '2024-11-19 05:03:01', 'Complete'),
(2, 1, 19, 400000, 2029334721, 1, 'blue', '2024-11-19 05:02:11', 'pending');

-- --------------------------------------------------------

--
-- Table structure for table `payments`
--

CREATE TABLE `payments` (
  `payment_id` int(100) NOT NULL,
  `invoice_id` int(100) NOT NULL,
  `amount` int(100) NOT NULL,
  `payment_mode` text NOT NULL,
  `ref_no` int(100) NOT NULL,
  `payment_date` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `payments`
--

INSERT INTO `payments` (`payment_id`, `invoice_id`, `amount`, `payment_mode`, `ref_no`, `payment_date`) VALUES
(18, 236385455, 342, 'Paytm', 232323, '2021-05-18'),
(20, 1601455995, 599, 'google pay', 232323, '2021-05-11'),
(21, 1601455995, 599, 'Bank transfer', 112121, '2021-05-10'),
(22, 2098939645, 299, 'Bank transfer', 232323, '2021-06-17'),
(23, 7282717, 928271881, 'google pay', 71819192, '2024-11-19');

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `product_id` int(10) NOT NULL,
  `p_cat_id` int(10) NOT NULL,
  `cat_id` int(10) NOT NULL,
  `date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `product_title` text NOT NULL,
  `product_img1` text NOT NULL,
  `product_img2` text NOT NULL,
  `product_img3` text NOT NULL,
  `product_price` int(10) NOT NULL,
  `product_desc` text NOT NULL,
  `product_keyword` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`product_id`, `p_cat_id`, `cat_id`, `date`, `product_title`, `product_img1`, `product_img2`, `product_img3`, `product_price`, `product_desc`, `product_keyword`) VALUES
(1, 2, 7, '2024-11-14 03:47:47', 'Bucket Hat', 'si1.png', 'si1.png', 'si1.png', 200000, 'topi keren', 'topi'),
(2, 6, 7, '2024-11-14 03:50:11', 'Bermuda Shorts', 'si2.png', 'si2.png', 'si2.png', 300000, 'celana keren', 'celana'),
(3, 6, 7, '2024-11-14 03:53:02', 'Cargo Pants', 'si3.png', 'si3.png', 'si3.png', 300000, 'celana keren', 'celana'),
(4, 4, 7, '2024-11-14 03:54:25', 'Close Loop Hoodie', 'si4.png', 'si4.png', 'si4.png', 300000, 'hoodie keren', 'hoodie'),
(5, 4, 7, '2024-11-14 03:56:57', 'Hooded Sweatshirt', 'si5.png', 'si5.png', 'si5.png', 400000, 'hoodie keren\r\n', 'hoodie'),
(6, 4, 7, '2024-11-14 03:58:44', 'Crewneck', 'si6.png', 'si6.png', 'si6.png', 400000, 'anjayy', 'hoodie'),
(7, 4, 7, '2024-11-14 04:00:10', 'Drill Overshirt', 'si12.png', 'si12.png', 'si12.png', 400000, 'kerenn', 'hoodie'),
(8, 2, 7, '2024-11-14 04:01:18', 'Wool Beanie', 'si13.png', 'si13.png', 'si13.png', 300000, 'kupluk  keren', 'kupluk'),
(9, 6, 7, '2024-11-14 04:06:43', 'Closed Loop Pants', 'si14.png', 'si14.png', 'si14.png', 400000, 'celana keren ', 'celana'),
(10, 2, 7, '2024-11-14 04:04:29', 'Rep Hat', 'si15.png', 'si15.png', 'si15.png', 300000, 'topi keren', 'topi'),
(11, 5, 7, '2024-11-14 04:05:31', 'Tape Belt', 'si16.png', 'si16.png', 'si16.png', 300000, 'kandkja', 'tikat pinggang'),
(12, 2, 8, '2024-11-14 04:08:09', '100 THIEVES CAP', 'a1.png', 'a1.png', 'a1.png', 400000, 'topi adidas', 'topi'),
(13, 3, 8, '2024-11-14 04:09:38', 'GAZELLE SHOES', 'a2.png', 'a2.png', 'a2.png', 300000, 'sepatu keren', 'sepatu'),
(14, 3, 8, '2024-11-14 04:10:22', 'HAMBURG SHOES', 'a3.png', 'a3.png', 'a3.png', 300000, 'sepatu keren', 'sepatu'),
(15, 3, 8, '2024-11-14 04:11:35', 'SAMBA OG SHOES', 'a4.png', 'a4.png', 'a4.png', 300000, 'sepatu adidas', 'sepatu'),
(16, 3, 8, '2024-11-14 04:12:29', 'SEPATU R71', 'a5.png', 'a5.png', 'a5.png', 300000, 'sepatu adidas', 'sepatu'),
(17, 3, 8, '2024-11-14 04:14:51', 'SEPATU HANDBALL SPEZIAL', 'a6.png', 'a6.png', 'a6.png', 300000, 'sepatu', 'sepatu'),
(18, 4, 8, '2024-11-14 04:40:05', 'KORN TRACK TOP', 'a7.png', 'a7.png', 'a7.png', 500000, 'jaket', 'hjaket'),
(19, 4, 9, '2024-11-14 04:17:58', 'hoodie black', 'nb1.png', 'nb1.png', 'nb1.png', 400000, 'hoodie', 'hoodie'),
(20, 3, 9, '2024-11-14 04:21:43', 'sneakers shoes', 'nb2.png', 'nb2.png', 'nb2.png', 200000, 'sepatu', 'sepatu'),
(21, 0, 0, '2024-11-14 04:24:06', 'men sneakers shoes', 'nb3.png', 'nb3.png', 'nb3.png', 200000, 'dad', 'sepatu'),
(22, 1, 9, '2024-11-14 04:25:14', 'baju cewe', 'nb4.png', 'nb4.png', 'nb4.png', 300000, 'kaos', 'kaos'),
(23, 1, 9, '2024-11-14 04:26:11', 'baju cowo', 'nb5.png', 'nb5.png', 'nb5.png', 300000, 'kaos cowo', 'kaos'),
(24, 3, 9, '2024-11-14 04:27:11', 'loop boys sneakers shoes', 'nb6.png', 'nb6.png', 'nb6.png', 200000, 'sepatu nb', 'sepatu');

-- --------------------------------------------------------

--
-- Table structure for table `product_category`
--

CREATE TABLE `product_category` (
  `p_cat_id` int(10) NOT NULL,
  `p_cat_title` text NOT NULL,
  `p_cat_desc` text NOT NULL,
  `p_cat_img` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `product_category`
--

INSERT INTO `product_category` (`p_cat_id`, `p_cat_title`, `p_cat_desc`, `p_cat_img`) VALUES
(1, 'baju', 'baju', 0),
(2, 'topi', 'topi', 0),
(3, 'sepatu', 'sepatu', 0),
(4, 'hoodie', 'hoodie', 0),
(5, 'ikat pinggang', 'ikat pinggang', 0),
(6, 'celana', 'celana', 0);

-- --------------------------------------------------------

--
-- Table structure for table `slider`
--

CREATE TABLE `slider` (
  `Id` int(10) NOT NULL,
  `slider_name` varchar(255) NOT NULL,
  `slider_image` text NOT NULL,
  `slider_url` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `slider`
--

INSERT INTO `slider` (`Id`, `slider_name`, `slider_image`, `slider_url`) VALUES
(18, 'sale', 'diskon1.png', 'http://localhost/casual_store/details.php?pro_id=24'),
(23, 'diskon', 'diskon2.png', 'http://localhost/casual_store/trimer.php?p_cat=1'),
(24, 'diskon', 'diskon3.png', 'http://localhost/casual_store/trimer.php?p_cat=3'),
(25, 'diskon4', 'WhatsApp Image 2024-11-25 at 19.51.41.jpeg', 'http://localhost/casual_store/trimer.php?p_cat=3'),
(26, 'diskon4', 'WhatsApp Image 2024-11-25 at 19.51.41 (1).jpeg', 'http://localhost/casual_store/details.php?pro_id=24');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admins`
--
ALTER TABLE `admins`
  ADD PRIMARY KEY (`admin_id`);

--
-- Indexes for table `boxes_section`
--
ALTER TABLE `boxes_section`
  ADD PRIMARY KEY (`box_id`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`cat_id`);

--
-- Indexes for table `customers`
--
ALTER TABLE `customers`
  ADD PRIMARY KEY (`customer_id`);

--
-- Indexes for table `customer_order`
--
ALTER TABLE `customer_order`
  ADD PRIMARY KEY (`order_id`);

--
-- Indexes for table `payments`
--
ALTER TABLE `payments`
  ADD PRIMARY KEY (`payment_id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`product_id`);

--
-- Indexes for table `product_category`
--
ALTER TABLE `product_category`
  ADD PRIMARY KEY (`p_cat_id`);

--
-- Indexes for table `slider`
--
ALTER TABLE `slider`
  ADD PRIMARY KEY (`Id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admins`
--
ALTER TABLE `admins`
  MODIFY `admin_id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `boxes_section`
--
ALTER TABLE `boxes_section`
  MODIFY `box_id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `cat_id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `customers`
--
ALTER TABLE `customers`
  MODIFY `customer_id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `customer_order`
--
ALTER TABLE `customer_order`
  MODIFY `order_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `payments`
--
ALTER TABLE `payments`
  MODIFY `payment_id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `product_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT for table `product_category`
--
ALTER TABLE `product_category`
  MODIFY `p_cat_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `slider`
--
ALTER TABLE `slider`
  MODIFY `Id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
