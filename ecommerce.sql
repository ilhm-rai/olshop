-- phpMyAdmin SQL Dump
-- version 4.9.5deb2
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Jul 27, 2020 at 01:49 PM
-- Server version: 8.0.20-0ubuntu0.20.04.1
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
CREATE DATABASE IF NOT EXISTS `ecommerce` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci;
USE `ecommerce`;

-- --------------------------------------------------------

--
-- Table structure for table `ads`
--

CREATE TABLE `ads` (
  `id` int NOT NULL,
  `ads_name` varchar(100) NOT NULL,
  `ads_description` varchar(100) NOT NULL,
  `picture` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `ads`
--

INSERT INTO `ads` (`id`, `ads_name`, `ads_description`, `picture`) VALUES
(1, 'Lorem', 'Lorem ipsum dolor sit amet consectetur, adipisicing elit', '1edd158cf592235e7967e3b2efd8495a.jpeg'),
(2, 'Ipsum', 'Lorem ipsum dolor sit amet consectetur, adipisicing elit', '441213f7b7161b4a593b643672ad0885.jpeg'),
(3, 'Dolor', 'Lorem ipsum dolor sit amet consectetur, adipisicing elit', 'd79fa4e542ca0a8209342b9c237d41c8.jpeg');

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` int NOT NULL,
  `category_name` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `category_name`) VALUES
(1, 'Hijab'),
(2, 'Baju');

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `id` int NOT NULL,
  `user_id` int NOT NULL,
  `order_date` datetime NOT NULL,
  `shipper_id` int NOT NULL,
  `transaction_status_id` int NOT NULL,
  `paid` int NOT NULL,
  `payment_date` timestamp NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Table structure for table `order_details`
--

CREATE TABLE `order_details` (
  `id` int NOT NULL,
  `order_id` int NOT NULL,
  `product_id` int NOT NULL,
  `quantity` int NOT NULL,
  `total` int NOT NULL,
  `bill_date` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Table structure for table `payments`
--

CREATE TABLE `payments` (
  `id` int NOT NULL,
  `payment_type_id` int NOT NULL,
  `allowed` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Table structure for table `payment_types`
--

CREATE TABLE `payment_types` (
  `id` int NOT NULL,
  `payment_name` varchar(128) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` int NOT NULL,
  `product_name` varchar(100) NOT NULL,
  `slug` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `product_description` text CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `category_id` int NOT NULL,
  `stock` int NOT NULL,
  `unit_price` int NOT NULL,
  `discount` int NOT NULL,
  `picture` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `product_name`, `slug`, `product_description`, `category_id`, `stock`, `unit_price`, `discount`, `picture`) VALUES
(1, 'KERUDUNG SEGI EMPAT MOTIF VOAL ULTRAFINE PREMIUM LASERCUT AUTHENTISM SHANNA SERIES PALE GREEN', 'KERUDUNG-SEGI-EMPAT-MOTIF-VOAL-ULTRAFINE-PREMIUM-LASERCUT-AUTHENTISM-SHANNA-SERIES-PALE-GREEN', 'SHANNA SERIES PALE GREEN\r\n\r\nMaterial : Voal Ultra Fine Premium\r\nSize : 120*120\r\n\r\n✔ Exclusive Limited Design\r\n✔ 4 sisi yang unik membuat desain ini memiliki banyak variasi pemakaiannya\r\n✔ Limited Edition Leather Pouch Packaging\r\n\r\n__\r\nWARNING : 90% KEMIRIPAN GAMBAR DENGAN ASLINYA KARENA ADA EFEK CAHAYA DARI PEMOTRETAN, RESOLUSI LAYAR KACA HANDPHONE DLL\r\n\r\nFOTO REAL COLOUR ADA DI FOTO TERAKHIR. SILAHKAN DI LIHAT TERLEBIH DAHULU. TERIMA KASIH\r\n\r\n#voalprintedscarf #hijabvoal #kerudungvoal #jilbabvoal #printedscarf #hijabvoalprinted #hijabvoalprint #hijabprint #jilbabvoalprint #hijabprinting #printscarf #voalprint #voalprintedscarf #hijabprint #scarfsegiempat #resellervoal #limitedscarf #signaturescarf', 1, 100, 249000, 34, 'c7fa62216a4efdcf30f82262ed0aec59.jpeg'),
(2, 'HIJAB INSTAN MINA AISYAH SYRIA BERGO NON PED ANTEM TALI WOLFIS', 'HIJAB-INSTAN-MINA-AISYAH-SYRIA-BERGO-NON-PED-ANTEM-TALI-WOLFIS', 'Bahan : Wolfis (Adem, nyaman dipakai )\r\n\r\nBerat produk 100 gram / 1 KG MUAT 13 PCS \r\n\r\nMAU BELANJA DILUAR SHOPEE ? KAMI CARIKAN EKSPEDISI TERMURAH (INDAH CARGO, MEX, STAR CARGO, POS BIASA, WAHANA, DAKOTA, DLL) \r\n\r\nHARGA ?? DIJAMIN BISA DIGOYANGGG SISS \r\n\r\n\r\nTOLONG DIBACA BAIK BAIK YAA SIS \r\n\r\n1. Bagi yang mau order langsung check out sesuai variasi yang diinginkan. \r\n\r\n\r\n2. Buat yang bertanya\" Kaka warna ini ready ? \r\n\r\nINI JAWABANNYA ⏬⏬\r\n\r\nREADY = VARIAN BISA DI KLIK \r\n\r\nTDK READY = VARIAN TDK BISA DI KLIK \r\n\r\nWarna yang tdk ready artinya baru sold, dan akan di restok antara 3-4 hari. \r\n\r\nKetika ready lansgung diupdate oleh kami..\r\n\r\n3. DROPSHIP? \r\n\r\nBerikan catatan pengirim dan no hp di bagian catatan. \r\n\r\n\r\n⚠Semua dropship pada bagian nama pengirimnya (di kertas nota) PASTI KAMI GANTI tapi di bagian kertas RESI JNE TIDAK BISA DIGANTI karena kami menggunakan JOB ONLINE BOOKING yg menyebabkan tidak bisa mengubah alamat, nama dan no hp pengirim. \r\n\r\n\r\n4. Tolong mencamtumkan nomor HANDHPHONE YANG AKTIF. KARENA JIKA ADA STOK KOSONG BIAR BISA LANSGUNG DI HUBUNGI OLEH ADMIN KAMI. \r\n\r\n\r\n5. Walaupun pada deskripsi dicantumkan pengiriman dalam 7 hari. \r\n\r\nNAMUN akan tetap seperti rules biasa, pengiriman ini hanya untuk memperpa jang masa garansi karena kadang sistem eror untuk memasukan resi pesanan. \r\n\r\n\r\nTF SEBELUM JAM 12 SIANG DIUSAHAKAN DIKRIIM DI HARI YANG SAMA ** \r\n\r\n\r\nTF SESUDAH JAM 12 SIANG DIKRIIM DI HARI SELANJUTNYA ** \r\n\r\n\r\nNB : \r\n\r\n** Jika tidak ada kendala dalam pengemasan / pengiriman paket. \r\n', 1, 100, 18999, 5, 'de587ab781307e8c78e02e1513a1a8cb.jpeg');

-- --------------------------------------------------------

--
-- Table structure for table `roles`
--

CREATE TABLE `roles` (
  `id` int NOT NULL,
  `role` varchar(128) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

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
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Table structure for table `transaction_status`
--

CREATE TABLE `transaction_status` (
  `id` int NOT NULL,
  `status_name` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int NOT NULL,
  `name` varchar(128) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `email` varchar(128) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `password` varchar(256) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `address` varchar(256) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `city` varchar(128) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `state` varchar(128) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `postal_code` varchar(10) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `country` varchar(128) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `phone` varchar(15) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `picture` varchar(128) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `role_id` int NOT NULL,
  `is_active` int NOT NULL,
  `date_created` timestamp NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `password`, `address`, `city`, `state`, `postal_code`, `country`, `phone`, `picture`, `role_id`, `is_active`, `date_created`) VALUES
(4, 'Angga Kusuma Putra', 'anggakusuma.putra@gmail.com', '$2y$10$JSZzuZh1vqaYoWy6/6hdzeDUwpS2Hro9cGtVN.4FwV4fpAWVvmKAe', '', '', '', '', '', '', 'default.png', 2, 1, '2020-07-26 09:10:26'),
(5, 'Rizky Ardi Ilhami', 'rizkyardi.ilhami06@gmail.com', '$2y$10$ZvXZ1vdLTk3buy5N3dW8eOximcYEJjHTKx.PhUl3Gp2A16zZZGYMK', '', '', '', '', '', '', 'default.png', 2, 1, '2020-07-26 09:11:04'),
(6, 'Administrator', 'administrator@gmail.com', '$2y$10$G2iVlDnyr.CGvBH7eafPQuh4cPPSegyzsxbmbtDzIr2NKNDHAgi6G', '', '', '', '', '', '', 'default.png', 1, 1, '2020-07-26 09:12:26');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `ads`
--
ALTER TABLE `ads`
  ADD PRIMARY KEY (`id`);

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
  ADD KEY `customer_id` (`user_id`),
  ADD KEY `shipper_id` (`shipper_id`),
  ADD KEY `transaction_status_id` (`transaction_status_id`);

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
-- Indexes for table `payment_types`
--
ALTER TABLE `payment_types`
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
-- Indexes for table `transaction_status`
--
ALTER TABLE `transaction_status`
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
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

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
-- AUTO_INCREMENT for table `payment_types`
--
ALTER TABLE `payment_types`
  MODIFY `id` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `roles`
--
ALTER TABLE `roles`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `shippers`
--
ALTER TABLE `shippers`
  MODIFY `id` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `transaction_status`
--
ALTER TABLE `transaction_status`
  MODIFY `id` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `orders`
--
ALTER TABLE `orders`
  ADD CONSTRAINT `fk_customer_id` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE RESTRICT ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_shipper_id` FOREIGN KEY (`shipper_id`) REFERENCES `shippers` (`id`) ON DELETE RESTRICT ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_transaction_status_id` FOREIGN KEY (`transaction_status_id`) REFERENCES `transaction_status` (`id`) ON DELETE RESTRICT ON UPDATE CASCADE;

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
