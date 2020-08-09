-- phpMyAdmin SQL Dump
-- version 4.9.5deb2
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Aug 09, 2020 at 08:15 PM
-- Server version: 8.0.21-0ubuntu0.20.04.3
-- PHP Version: 7.4.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ecommerce`
--
CREATE DATABASE IF NOT EXISTS `ecommerce` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci;
USE `ecommerce`;

-- --------------------------------------------------------

--
-- Table structure for table `ads`
--

CREATE TABLE `ads` (
  `id` int NOT NULL,
  `ads_description` varchar(100) NOT NULL,
  `ads_url` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `picture` varchar(258) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `ads`
--

INSERT INTO `ads` (`id`, `ads_description`, `ads_url`, `picture`) VALUES
(1, 'Lorem ipsum dolor sit amet consectetur, adipisicing elit', '', '1edd158cf592235e7967e3b2efd8495a.jpeg'),
(2, 'Lorem ipsum dolor sit amet consectetur, adipisicing elit', '', '441213f7b7161b4a593b643672ad0885.jpeg'),
(3, 'Lorem ipsum dolor sit amet consectetur, adipisicing elit', '', 'd79fa4e542ca0a8209342b9c237d41c8.jpeg');

-- --------------------------------------------------------

--
-- Table structure for table `carts`
--

CREATE TABLE `carts` (
  `id` int NOT NULL,
  `user_id` int NOT NULL,
  `date_created` timestamp NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `carts`
--

INSERT INTO `carts` (`id`, `user_id`, `date_created`) VALUES
(2, 34, '2020-08-08 00:15:52'),
(3, 35, '2020-08-08 08:27:40');

-- --------------------------------------------------------

--
-- Table structure for table `cart_details`
--

CREATE TABLE `cart_details` (
  `id` int NOT NULL,
  `cart_id` int NOT NULL,
  `product_id` int NOT NULL,
  `qty` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `cart_details`
--

INSERT INTO `cart_details` (`id`, `cart_id`, `product_id`, `qty`) VALUES
(4, 2, 17, 3),
(6, 2, 1, 2),
(7, 3, 17, 2),
(8, 3, 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` int NOT NULL,
  `category_name` varchar(25) NOT NULL,
  `category_description` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `picture` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `category_name`, `category_description`, `picture`) VALUES
(1, 'Hijab', 'Hijab', 'f6e810437e1a65aeb81d171054e62d2a.jpg'),
(16, 'Daster', 'Daster', 'ae6162c00acea193851648952def4295.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `id` int NOT NULL,
  `customer_id` int NOT NULL,
  `payment_id` int NOT NULL,
  `shipper_id` int NOT NULL,
  `transaction_status` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `paid` tinyint(1) NOT NULL,
  `order_date` datetime NOT NULL,
  `payment_date` timestamp NOT NULL,
  `order_message` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `order_details`
--

CREATE TABLE `order_details` (
  `id` int NOT NULL,
  `order_id` int NOT NULL,
  `product_id` int NOT NULL,
  `quantity` int NOT NULL,
  `discount` int NOT NULL,
  `total` int NOT NULL,
  `bill_date` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `payments`
--

CREATE TABLE `payments` (
  `id` int NOT NULL,
  `payment_type` varchar(100) NOT NULL,
  `allowed` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` int NOT NULL,
  `product_name` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_bin NOT NULL,
  `slug` varchar(258) CHARACTER SET utf8mb4 COLLATE utf8mb4_bin NOT NULL,
  `product_description` text CHARACTER SET utf8mb4 COLLATE utf8mb4_bin,
  `category_id` int NOT NULL,
  `stock` int NOT NULL,
  `unit_price` int NOT NULL,
  `discount` int NOT NULL,
  `product_available` tinyint(1) NOT NULL,
  `discount_available` tinyint(1) NOT NULL,
  `picture` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_bin;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `product_name`, `slug`, `product_description`, `category_id`, `stock`, `unit_price`, `discount`, `product_available`, `discount_available`, `picture`) VALUES
(1, 'HIJAB BERGO MARYAM', 'HIJAB-BERGO-MARYAM-PALE-GREEN.P-17368903', 'Hijab simple langsung sluppp gaperlu pentul2,cuttingannya pas bgt buat pipi tembem/tirus karna ngikutin bentuk muka.\r\n\r\nBahan : Diamond import\r\nBertekstur halus cantik, nyaman dn adem saat digunakan di daerah panas sekalipun,Bahan tebal namun tetap ringan, jatuh dan mudah dibentuk\r\n\r\nFinishing JAHIT TEPI bukan neci\r\n\r\n_ Non ped\r\n-Jahitan rapi\r\n- Bahan adem dan nyaman &amp; Ringan dipakai\r\n_ Tidak gampang kusut\r\n- Tidak menerawang\r\n- Mengantung / jatuh , lembut dan indah\r\n- Besar menutupi dada\r\n\r\nUkuran\r\n-Depan +- 70 cm\r\n-Belakang +- 84\r\n- Lingkar wajah 54 cm \r\n\r\n💰 : Rp.25.000/pcs\r\n📩 : Dm/Wa (ada di bio)\r\n📦 : Gosend,Grab,JNE,J&amp;T\r\n\r\n#bergomaryam #bergotali #bergoinstantali #jilbabinstan #jilbabsyari #hijabstyle #hijabootd #kerudunginstan', 1, 100, 25000, 0, 0, 0, '4c57a14647f099aeb2952fdefc137522.jpg'),
(17, 'PASHMINA TALI CERUTY BABYDOLL', 'PASHMINA-TALI-CERUTY-BABYDOLL.P-17368902', 'READY\r\npashmina ceruty baby doll\r\n- pashmina basic ya, bukan instant\r\n\r\nMatt: ceruty babydoll premium\r\n\r\nbest seller karena bahanya jatuh dan nyaman di pakai.\r\npastinya cocok untuk acara daily maupun formal \r\n\r\n💰: Rp.26.000\r\n📩 : Dm/Wa (ada dibio)\r\n🚚/🏍 : Gosend\\JNE\\J&amp;T\r\n\r\nUkuran 170x75cm\r\n1kg muat 8pcs\r\n\r\n#pashminaceruty #pashminaturkey #hijabmurah #pashminamurah #pashminakhasmir #pashminamalaysia #pashminadiamond\r\n#pashmina\r\n#pasmina\r\n#cerutybabydoll', 1, 100, 26000, 0, 0, 0, '4d3679d900587b195126fbc9c7a86ead.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `roles`
--

CREATE TABLE `roles` (
  `id` int NOT NULL,
  `role` varchar(128) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `roles`
--

INSERT INTO `roles` (`id`, `role`) VALUES
(1, 'admin'),
(2, 'customer');

-- --------------------------------------------------------

--
-- Table structure for table `shippers`
--

CREATE TABLE `shippers` (
  `id` int NOT NULL,
  `company_name` varchar(100) NOT NULL,
  `phone` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int NOT NULL,
  `name` varchar(128) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `email` varchar(128) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `password` varchar(256) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `address` varchar(258) NOT NULL,
  `city` varchar(128) NOT NULL,
  `state` varchar(128) NOT NULL,
  `postal_code` varchar(10) NOT NULL,
  `country` varchar(128) NOT NULL,
  `phone` varchar(15) NOT NULL,
  `picture` varchar(128) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `role_id` int NOT NULL,
  `is_active` int NOT NULL,
  `date_created` timestamp NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `password`, `address`, `city`, `state`, `postal_code`, `country`, `phone`, `picture`, `role_id`, `is_active`, `date_created`) VALUES
(6, 'Administrator', 'administrator@gmail.com', '$2y$10$G2iVlDnyr.CGvBH7eafPQuh4cPPSegyzsxbmbtDzIr2NKNDHAgi6G', '', '', '', '', '', '', 'default.png', 1, 1, '2020-07-26 09:12:26'),
(21, 'Harum Bunga', 'bunga@gmail.com', '$2y$10$MLhqi.coCuXXmW4wLHr7H.Q.91YpOU3YW3A02C6ySR2mZrkVgaTB2', '', '', '', '', '', '', 'default.png', 2, 1, '2020-08-06 03:18:56'),
(34, 'Rizky Ardi Ilhami', 'rizkyardi.ilhami06@gmail.com', '$2y$10$nLgY3mjJeiuejrcCLAHzsuU9LQmItfA9QKzuBgiq5TZcui3PN1wBW', '', '', '', '', '', '', 'default.png', 2, 1, '2020-08-08 00:15:52'),
(35, 'Customer', 'customer@gmail.com', '$2y$10$OJevzmq8NCPgpiIrmV8dlezEmqyd3JjrjmwN3/ppvka1lGkaxu5Zq', '', '', '', '', '', '', 'default.png', 2, 1, '2020-08-08 08:27:40');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `ads`
--
ALTER TABLE `ads`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `carts`
--
ALTER TABLE `carts`
  ADD PRIMARY KEY (`id`),
  ADD KEY `customer_id` (`user_id`);

--
-- Indexes for table `cart_details`
--
ALTER TABLE `cart_details`
  ADD PRIMARY KEY (`id`),
  ADD KEY `cart_id` (`cart_id`),
  ADD KEY `product_id` (`product_id`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`),
  ADD KEY `customer_id` (`customer_id`),
  ADD KEY `shipper_id` (`shipper_id`),
  ADD KEY `payment_id` (`payment_id`);

--
-- Indexes for table `order_details`
--
ALTER TABLE `order_details`
  ADD PRIMARY KEY (`id`),
  ADD KEY `product_id` (`product_id`),
  ADD KEY `order_id` (`order_id`) USING BTREE;

--
-- Indexes for table `payments`
--
ALTER TABLE `payments`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`),
  ADD KEY `category_id` (`category_id`);

--
-- Indexes for table `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `shippers`
--
ALTER TABLE `shippers`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD KEY `role_id` (`role_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `ads`
--
ALTER TABLE `ads`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `carts`
--
ALTER TABLE `carts`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `cart_details`
--
ALTER TABLE `cart_details`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `payments`
--
ALTER TABLE `payments`
  MODIFY `id` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `roles`
--
ALTER TABLE `roles`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `shippers`
--
ALTER TABLE `shippers`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `carts`
--
ALTER TABLE `carts`
  ADD CONSTRAINT `fk_cart_user_id` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `cart_details`
--
ALTER TABLE `cart_details`
  ADD CONSTRAINT `fk_cart_id` FOREIGN KEY (`cart_id`) REFERENCES `carts` (`id`) ON DELETE RESTRICT ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_product_id` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`) ON DELETE RESTRICT ON UPDATE CASCADE;

--
-- Constraints for table `orders`
--
ALTER TABLE `orders`
  ADD CONSTRAINT `fk_customer_id` FOREIGN KEY (`customer_id`) REFERENCES `users` (`id`) ON DELETE RESTRICT ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_payment_id` FOREIGN KEY (`payment_id`) REFERENCES `payments` (`id`) ON DELETE RESTRICT ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_shipper_id` FOREIGN KEY (`shipper_id`) REFERENCES `shippers` (`id`) ON DELETE RESTRICT ON UPDATE CASCADE;

--
-- Constraints for table `order_details`
--
ALTER TABLE `order_details`
  ADD CONSTRAINT `fk_order_id` FOREIGN KEY (`order_id`) REFERENCES `orders` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_product` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`) ON DELETE RESTRICT ON UPDATE CASCADE;

--
-- Constraints for table `products`
--
ALTER TABLE `products`
  ADD CONSTRAINT `fk_category_id` FOREIGN KEY (`category_id`) REFERENCES `categories` (`id`) ON DELETE RESTRICT ON UPDATE CASCADE;

--
-- Constraints for table `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `fk_role_id` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
