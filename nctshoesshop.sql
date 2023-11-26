-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 27, 2022 at 04:28 PM
-- Server version: 10.4.27-MariaDB
-- PHP Version: 8.1.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `nctshoesshop`
--

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE `category` (
  `idcategory` int(11) NOT NULL,
  `namecategory` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`idcategory`, `namecategory`) VALUES
(2, 'Old Skool Sneakers'),
(3, 'Canvas Sneakers'),
(15, 'Kpop Sneakers');

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

CREATE TABLE `product` (
  `idproduct` int(11) NOT NULL,
  `categoryid` int(11) NOT NULL,
  `nameproduct` varchar(255) NOT NULL,
  `price` double NOT NULL,
  `photo` varchar(255) DEFAULT NULL,
  `detail` text DEFAULT NULL,
  `status` enum('soldout','available') DEFAULT 'available'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`idproduct`, `categoryid`, `nameproduct`, `price`, `photo`, `detail`, `status`) VALUES
(16, 3, 'Cheers', 130000, 'Y8CnWFv9qo0HINWAsKBy.jpg', '                    Shoe Material: High Quality Synthetic leather\r\n\r\nSole material: Non-slip rubber\r\n\r\nSol height: 5 cm\r\n\r\n\r\n\r\nFor this shoe model, the size is smaller than the usual size, bro, so we suggest going up 1 size above what you usually wear (for example size 37 order size 38, size 39 order size 40)\r\n\r\n\r\n\r\nIf your feet are wider than usual, we suggest you raise 2 sizes above what you usually wear (for example size 37 order size 39, size 38 order size 40)\r\n\r\n\r\n\r\nIt is recommended to measure the feet first and then add 0.5cm then equate to the chart size.\r\n\r\nChart (insole):\r\n\r\n37(2): 23cm\r\n\r\n38(3): 23.5cm\r\n\r\n39(4): 24cm\r\n\r\n40(5): 24.5cm\r\n\r\n41(6): 25cm\r\n\r\n42(7): 25.5cm\r\n\r\n43(8): 26cm                ', 'available'),
(17, 15, 'Haechan', 130000, 'Cuv1O60akjGqNLK4NiRG.jpg', '                    Shoe Material: High Quality Synthetic leather\r\n\r\nSole material: Non-slip rubber\r\n\r\nSol height: 5 cm\r\n\r\n\r\n\r\nFor this shoe model, the size is smaller than the usual size, bro, so we suggest going up 1 size above what you usually wear (for example size 37 order size 38, size 39 order size 40)\r\n\r\n\r\n\r\nIf your feet are wider than usual, we suggest you raise 2 sizes above what you usually wear (for example size 37 order size 39, size 38 order size 40)\r\n\r\n\r\n\r\nIt is recommended to measure the feet first and then add 0.5cm then equate to the chart size.\r\n\r\nChart (insole):\r\n\r\n37(2): 23cm\r\n\r\n38(3): 23.5cm\r\n\r\n39(4): 24cm\r\n\r\n40(5): 24.5cm\r\n\r\n41(6): 25cm\r\n\r\n42(7): 25.5cm\r\n\r\n43(8): 26cm                ', 'available'),
(18, 2, 'Nineteez', 150000, 'Hk3t7IE1KWKe3QkUnw1L.jpg', '                    Shoe Material: High Quality Synthetic leather\r\n\r\nSole material: Non-slip rubber\r\n\r\nSol height: 5 cm\r\n\r\n\r\n\r\nFor this shoe model, the size is smaller than the usual size, bro, so we suggest going up 1 size above what you usually wear (for example size 37 order size 38, size 39 order size 40)\r\n\r\n\r\n\r\nIf your feet are wider than usual, we suggest you raise 2 sizes above what you usually wear (for example size 37 order size 39, size 38 order size 40)\r\n\r\n\r\n\r\nIt is recommended to measure the feet first and then add 0.5cm then equate to the chart size.\r\n\r\nChart (insole):\r\n\r\n37(2): 23cm\r\n\r\n38(3): 23.5cm\r\n\r\n39(4): 24cm\r\n\r\n40(5): 24.5cm\r\n\r\n41(6): 25cm\r\n\r\n42(7): 25.5cm\r\n\r\n43(8): 26cm                ', 'available'),
(19, 15, 'Seulgi', 140000, 'vfcUX4PnjiN9qhkJk8RD.jpg', '                    Shoe Material: High Quality Synthetic leather\r\n\r\nSole material: Non-slip rubber\r\n\r\nSol height: 5 cm\r\n\r\n\r\n\r\nFor this shoe model, the size is smaller than the usual size, bro, so we suggest going up 1 size above what you usually wear (for example size 37 order size 38, size 39 order size 40)\r\n\r\n\r\n\r\nIf your feet are wider than usual, we suggest you raise 2 sizes above what you usually wear (for example size 37 order size 39, size 38 order size 40)\r\n\r\n\r\n\r\nIt is recommended to measure the feet first and then add 0.5cm then equate to the chart size.\r\n\r\nChart (insole):\r\n\r\n37(2): 23cm\r\n\r\n38(3): 23.5cm\r\n\r\n39(4): 24cm\r\n\r\n40(5): 24.5cm\r\n\r\n41(6): 25cm\r\n\r\n42(7): 25.5cm\r\n\r\n43(8): 26cm                ', 'available'),
(20, 2, 'Dummy', 160000, 'iYfE194HdnpO1UPkhyiG.jpg', '                    Shoe Material: High Quality Synthetic leather\r\n\r\nSole material: Non-slip rubber\r\n\r\nSol height: 5 cm\r\n\r\n\r\n\r\nFor this shoe model, the size is smaller than the usual size, bro, so we suggest going up 1 size above what you usually wear (for example size 37 order size 38, size 39 order size 40)\r\n\r\n\r\n\r\nIf your feet are wider than usual, we suggest you raise 2 sizes above what you usually wear (for example size 37 order size 39, size 38 order size 40)\r\n\r\n\r\n\r\nIt is recommended to measure the feet first and then add 0.5cm then equate to the chart size.\r\n\r\nChart (insole):\r\n\r\n37(2): 23cm\r\n\r\n38(3): 23.5cm\r\n\r\n39(4): 24cm\r\n\r\n40(5): 24.5cm\r\n\r\n41(6): 25cm\r\n\r\n42(7): 25.5cm\r\n\r\n43(8): 26cm                ', 'available'),
(23, 2, 'Frazier', 170000, '7raToSOit5bSfcWl02sJ.jpg', '                    Shoe Material: High Quality Synthetic leather\r\n\r\nSole material: Non-slip rubber\r\n\r\nSol height: 5 cm\r\n\r\n\r\n\r\nFor this shoe model, the size is smaller than the usual size, bro, so we suggest going up 1 size above what you usually wear (for example size 37 order size 38, size 39 order size 40)\r\n\r\n\r\n\r\nIf your feet are wider than usual, we suggest you raise 2 sizes above what you usually wear (for example size 37 order size 39, size 38 order size 40)\r\n\r\n\r\n\r\nIt is recommended to measure the feet first and then add 0.5cm then equate to the chart size.\r\n\r\nChart (insole):\r\n\r\n37(2): 23cm\r\n\r\n38(3): 23.5cm\r\n\r\n39(4): 24cm\r\n\r\n40(5): 24.5cm\r\n\r\n41(6): 25cm\r\n\r\n42(7): 25.5cm\r\n\r\n43(8): 26cm                ', 'available'),
(24, 15, 'Jeno', 145000, 'WQSDxUvwPNelw2xLPHrO.jpg', '                    Shoe Material: High Quality Synthetic leather\r\n\r\nSole material: Non-slip rubber\r\n\r\nSol height: 5 cm\r\n\r\n\r\n\r\nFor this shoe model, the size is smaller than the usual size, bro, so we suggest going up 1 size above what you usually wear (for example size 37 order size 38, size 39 order size 40)\r\n\r\n\r\n\r\nIf your feet are wider than usual, we suggest you raise 2 sizes above what you usually wear (for example size 37 order size 39, size 38 order size 40)\r\n\r\n\r\n\r\nIt is recommended to measure the feet first and then add 0.5cm then equate to the chart size.\r\n\r\nChart (insole):\r\n\r\n37(2): 23cm\r\n\r\n38(3): 23.5cm\r\n\r\n39(4): 24cm\r\n\r\n40(5): 24.5cm\r\n\r\n41(6): 25cm\r\n\r\n42(7): 25.5cm\r\n\r\n43(8): 26cm                ', 'available'),
(26, 3, 'Geez', 150000, 'CtqtET9BXPOltkwxYXjt.jpg', 'Shoe Material: High Quality Synthetic leather\r\n\r\nSole material: Non-slip rubber\r\n\r\nSol height: 5 cm\r\n\r\n\r\n\r\nFor this shoe model, the size is smaller than the usual size, bro, so we suggest going up 1 size above what you usually wear (for example size 37 order size 38, size 39 order size 40)\r\n\r\n\r\n\r\nIf your feet are wider than usual, we suggest you raise 2 sizes above what you usually wear (for example size 37 order size 39, size 38 order size 40)\r\n\r\n\r\n\r\nIt is recommended to measure the feet first and then add 0.5cm then equate to the chart size.\r\n\r\nChart (insole):\r\n\r\n37(2): 23cm\r\n\r\n38(3): 23.5cm\r\n\r\n39(4): 24cm\r\n\r\n40(5): 24.5cm\r\n\r\n41(6): 25cm\r\n\r\n42(7): 25.5cm\r\n\r\n43(8): 26cm', 'available'),
(27, 2, 'Crazy', 165000, 'eRWNJKgzkavPA2zNOtvm.jpg', 'Shoe Material: High Quality Synthetic leather\r\n\r\nSole material: Non-slip rubber\r\n\r\nSol height: 5 cm\r\n\r\n\r\n\r\nFor this shoe model, the size is smaller than the usual size, bro, so we suggest going up 1 size above what you usually wear (for example size 37 order size 38, size 39 order size 40)\r\n\r\n\r\n\r\nIf your feet are wider than usual, we suggest you raise 2 sizes above what you usually wear (for example size 37 order size 39, size 38 order size 40)\r\n\r\n\r\n\r\nIt is recommended to measure the feet first and then add 0.5cm then equate to the chart size.\r\n\r\nChart (insole):\r\n\r\n37(2): 23cm\r\n\r\n38(3): 23.5cm\r\n\r\n39(4): 24cm\r\n\r\n40(5): 24.5cm\r\n\r\n41(6): 25cm\r\n\r\n42(7): 25.5cm\r\n\r\n43(8): 26cm', 'available'),
(28, 2, 'Vintage Grey', 179000, 'uGZPeQ5pmOGmaVdeFqfQ.jpg', 'Shoe Material: High Quality Synthetic leather\r\n\r\nSole material: Non-slip rubber\r\n\r\nSol height: 5 cm\r\n\r\n\r\n\r\nFor this shoe model, the size is smaller than the usual size, bro, so we suggest going up 1 size above what you usually wear (for example size 37 order size 38, size 39 order size 40)\r\n\r\n\r\n\r\nIf your feet are wider than usual, we suggest you raise 2 sizes above what you usually wear (for example size 37 order size 39, size 38 order size 40)\r\n\r\n\r\n\r\nIt is recommended to measure the feet first and then add 0.5cm then equate to the chart size.\r\n\r\nChart (insole):\r\n\r\n37(2): 23cm\r\n\r\n38(3): 23.5cm\r\n\r\n39(4): 24cm\r\n\r\n40(5): 24.5cm\r\n\r\n41(6): 25cm\r\n\r\n42(7): 25.5cm\r\n\r\n43(8): 26cm', 'available'),
(29, 15, 'Taeyong', 170000, 'M1dpbQT7Fdo1AImCgzqv.jpg', 'Shoe Material: High Quality Synthetic leather\r\n\r\nSole material: Non-slip rubber\r\n\r\nSol height: 5 cm\r\n\r\n\r\n\r\nFor this shoe model, the size is smaller than the usual size, bro, so we suggest going up 1 size above what you usually wear (for example size 37 order size 38, size 39 order size 40)\r\n\r\n\r\n\r\nIf your feet are wider than usual, we suggest you raise 2 sizes above what you usually wear (for example size 37 order size 39, size 38 order size 40)\r\n\r\n\r\n\r\nIt is recommended to measure the feet first and then add 0.5cm then equate to the chart size.\r\n\r\nChart (insole):\r\n\r\n37(2): 23cm\r\n\r\n38(3): 23.5cm\r\n\r\n39(4): 24cm\r\n\r\n40(5): 24.5cm\r\n\r\n41(6): 25cm\r\n\r\n42(7): 25.5cm\r\n\r\n43(8): 26cm', 'available'),
(30, 15, 'Karina', 140000, 'sgaqzK0NhqjwaPjGC75z.jpg', 'Shoe Material: High Quality Synthetic leather\r\n\r\nSole material: Non-slip rubber\r\n\r\nSol height: 5 cm\r\n\r\n\r\n\r\nFor this shoe model, the size is smaller than the usual size, bro, so we suggest going up 1 size above what you usually wear (for example size 37 order size 38, size 39 order size 40)\r\n\r\n\r\n\r\nIf your feet are wider than usual, we suggest you raise 2 sizes above what you usually wear (for example size 37 order size 39, size 38 order size 40)\r\n\r\n\r\n\r\nIt is recommended to measure the feet first and then add 0.5cm then equate to the chart size.\r\n\r\nChart (insole):\r\n\r\n37(2): 23cm\r\n\r\n38(3): 23.5cm\r\n\r\n39(4): 24cm\r\n\r\n40(5): 24.5cm\r\n\r\n41(6): 25cm\r\n\r\n42(7): 25.5cm\r\n\r\n43(8): 26cm', 'available'),
(31, 3, 'Butterfly', 150000, 'iX8SdAd7lGBDykE2jmOP.jpg', 'Shoe Material: High Quality Synthetic leather\r\n\r\nSole material: Non-slip rubber\r\n\r\nSol height: 5 cm\r\n\r\n\r\n\r\nFor this shoe model, the size is smaller than the usual size, bro, so we suggest going up 1 size above what you usually wear (for example size 37 order size 38, size 39 order size 40)\r\n\r\n\r\n\r\nIf your feet are wider than usual, we suggest you raise 2 sizes above what you usually wear (for example size 37 order size 39, size 38 order size 40)\r\n\r\n\r\n\r\nIt is recommended to measure the feet first and then add 0.5cm then equate to the chart size.\r\n\r\nChart (insole):\r\n\r\n37(2): 23cm\r\n\r\n38(3): 23.5cm\r\n\r\n39(4): 24cm\r\n\r\n40(5): 24.5cm\r\n\r\n41(6): 25cm\r\n\r\n42(7): 25.5cm\r\n\r\n43(8): 26cm', 'available'),
(32, 3, 'Girlish', 135000, 'mhpI0LM0DXPs1JotylL5.jpg', 'Shoe Material: High Quality Synthetic leather\r\n\r\nSole material: Non-slip rubber\r\n\r\nSol height: 5 cm\r\n\r\n\r\n\r\nFor this shoe model, the size is smaller than the usual size, bro, so we suggest going up 1 size above what you usually wear (for example size 37 order size 38, size 39 order size 40)\r\n\r\n\r\n\r\nIf your feet are wider than usual, we suggest you raise 2 sizes above what you usually wear (for example size 37 order size 39, size 38 order size 40)\r\n\r\n\r\n\r\nIt is recommended to measure the feet first and then add 0.5cm then equate to the chart size.\r\n\r\nChart (insole):\r\n\r\n37(2): 23cm\r\n\r\n38(3): 23.5cm\r\n\r\n39(4): 24cm\r\n\r\n40(5): 24.5cm\r\n\r\n41(6): 25cm\r\n\r\n42(7): 25.5cm\r\n\r\n43(8): 26cm', 'available'),
(33, 15, 'Jisung', 150000, '8PBjjtPvE5K4QR6NZ2MR.jpg', '                    Shoe Material: High Quality Synthetic leather\r\n\r\nSole material: Non-slip rubber\r\n\r\nSol height: 5 cm\r\n\r\n\r\n\r\nFor this shoe model, the size is smaller than the usual size, bro, so we suggest going up 1 size above what you usually wear (for example size 37 order size 38, size 39 order size 40)\r\n\r\n\r\n\r\nIf your feet are wider than usual, we suggest you raise 2 sizes above what you usually wear (for example size 37 order size 39, size 38 order size 40)\r\n\r\n\r\n\r\nIt is recommended to measure the feet first and then add 0.5cm then equate to the chart size.\r\n\r\nChart (insole):\r\n\r\n37(2): 23cm\r\n\r\n38(3): 23.5cm\r\n\r\n39(4): 24cm\r\n\r\n40(5): 24.5cm\r\n\r\n41(6): 25cm\r\n\r\n42(7): 25.5cm\r\n\r\n43(8): 26cm                ', 'available'),
(34, 15, 'Renjun', 150000, 'sUl00HTeOundtANgWCut.jpg', '                    Shoe Material: High Quality Synthetic leather\r\n\r\nSole material: Non-slip rubber\r\n\r\nSol height: 5 cm\r\n\r\n\r\n\r\nFor this shoe model, the size is smaller than the usual size, bro, so we suggest going up 1 size above what you usually wear (for example size 37 order size 38, size 39 order size 40)\r\n\r\n\r\n\r\nIf your feet are wider than usual, we suggest you raise 2 sizes above what you usually wear (for example size 37 order size 39, size 38 order size 40)\r\n\r\n\r\n\r\nIt is recommended to measure the feet first and then add 0.5cm then equate to the chart size.\r\n\r\nChart (insole):\r\n\r\n37(2): 23cm\r\n\r\n38(3): 23.5cm\r\n\r\n39(4): 24cm\r\n\r\n40(5): 24.5cm\r\n\r\n41(6): 25cm\r\n\r\n42(7): 25.5cm\r\n\r\n43(8): 26cm                ', 'available'),
(36, 3, 'Yuhu', 145000, 'OjqhBdvAQkZt055HA1ew.jpg', 'Shoe Material: High Quality Synthetic leather\r\n\r\nSole material: Non-slip rubber\r\n\r\nSol height: 5 cm\r\n\r\n\r\n\r\nFor this shoe model, the size is smaller than the usual size, bro, so we suggest going up 1 size above what you usually wear (for example size 37 order size 38, size 39 order size 40)\r\n\r\n\r\n\r\nIf your feet are wider than usual, we suggest you raise 2 sizes above what you usually wear (for example size 37 order size 39, size 38 order size 40)\r\n\r\n\r\n\r\nIt is recommended to measure the feet first and then add 0.5cm then equate to the chart size.\r\n\r\nChart (insole):\r\n\r\n37(2): 23cm\r\n\r\n38(3): 23.5cm\r\n\r\n39(4): 24cm\r\n\r\n40(5): 24.5cm\r\n\r\n41(6): 25cm\r\n\r\n42(7): 25.5cm\r\n\r\n43(8): 26cm', 'available');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(50) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `password`) VALUES
(1, 'faradisha', '$2a$12$l2Rijxg1b8i0xMWF4ybBkOOyTcQ/VPlWmaoUZHTLfp.Uxs8bSEEsy');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`idcategory`);

--
-- Indexes for table `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`idproduct`),
  ADD KEY `nameproduct` (`nameproduct`),
  ADD KEY `category_product` (`categoryid`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
  MODIFY `idcategory` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `product`
--
ALTER TABLE `product`
  MODIFY `idproduct` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `product`
--
ALTER TABLE `product`
  ADD CONSTRAINT `category_product` FOREIGN KEY (`categoryid`) REFERENCES `category` (`idcategory`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
