-- phpMyAdmin SQL Dump
-- version 4.5.4.1deb2ubuntu2.1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Mar 21, 2020 at 07:25 AM
-- Server version: 5.7.29-0ubuntu0.16.04.1
-- PHP Version: 7.0.33-0ubuntu0.16.04.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `eguarantee`
--

-- --------------------------------------------------------

--
-- Table structure for table `claim_order`
--

CREATE TABLE `claim_order` (
  `CustomerID` int(11) NOT NULL,
  `CustomerName` text NOT NULL,
  `CustomerTel` text NOT NULL,
  `CustomerAddress` text NOT NULL,
  `CustomerEmail` text NOT NULL,
  `DatePick` text NOT NULL,
  `ItemModel` text NOT NULL,
  `ItemColor` text NOT NULL,
  `outOrder` text NOT NULL,
  `submit_date` text NOT NULL,
  `send_date` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `claim_order`
--

INSERT INTO `claim_order` (`CustomerID`, `CustomerName`, `CustomerTel`, `CustomerAddress`, `CustomerEmail`, `DatePick`, `ItemModel`, `ItemColor`, `outOrder`, `submit_date`, `send_date`) VALUES
(51000, 'Kunut Chirdchai', '0865419870', 'Bangkok', 'kmixzii@gmail.com', '03/10/2020', 'MAC PRO', 'WHITE', 'PSU Break', '2020-03-20 09:05:03', '2020-03-21 09:05:03'),
(51000, 'Kunut Chirdchai', '0865419870', 'Bangkok', 'kmixzii@gmail.com', '03/10/2020', 'DELL', 'BLACK', 'black screen', '2020-03-20 09:05:28', '2020-03-21 09:05:28'),
(51001, 'Zezar Arzeezar', '0894756465', 'Bangkok', 'ZEZAR@ARZEEZAR', '03/01/2020', 'Apple Mac AIR', 'WHITE', 'Key stuck', '2020-03-20 09:08:59', '2020-03-21 09:08:59'),
(51001, 'Zezar Arzeezar', '0894756465', 'Bangkok', 'ZEZAR@ARZEEZAR', '03/01/2020', 'Apple Mac AIR', 'WHITE', 'Key stuck', '2020-03-20 09:10:05', '2020-03-21 09:10:05'),
(9876, 'Apisit pewpong', '096046295', 'à¸«à¸­à¸žà¸±à¸', 'bas@gmail.com', '03/05/2020', 'Acer3', 'Red', 'à¸žà¸±à¸‡', '2020-03-20 10:15:20', '2020-03-21 10:15:20'),
(12345, 'à¸­à¸²à¸‹à¸µà¸‹à¹ˆà¸²à¸£à¹Œ à¸¥à¸­à¸”à¸´à¸‡', '0824469932', '159/2 à¸‹.à¸§à¸±à¸”à¸žà¸£à¸°à¸¢à¸²à¸—à¸³ à¹à¸‚à¸§à¸‡à¸šà¹‰à¸²à¸™à¸Šà¹ˆà¸²à¸‡à¸«à¸¥à¹ˆà¸­ à¹€à¸‚à¸•à¸šà¸²à¸‡à¸à¸­à¸à¸™à¹‰à¸­à¸¢ à¸à¸£à¸¸à¸‡à¹€à¸—à¸ž 10700', 's6104062610092@email.kmutnb.ac.th', '03/20/2020', 'TX-369745', 'black', 'à¹€à¸›à¸´à¸”à¹„à¸¡à¹ˆà¸•à¸´à¸”', '2020-03-20 10:40:02', '2020-03-21 10:40:02');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(255) NOT NULL,
  `created_at` datetime DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `password`, `created_at`) VALUES
(1, '51000', '$2y$10$qpMV3lv1Yw9MUyxMgUYHpugtizExsaqigQ9wdukjoA2cDevLXUJ1O', '2020-03-20 08:29:15'),
(2, '51001', '$2y$10$4KpWrJrkYN1XHLwOpANlWeVcvVIhfBCVVJsfPtGAfmjqASW33qW0a', '2020-03-20 09:06:00'),
(3, '09360', '$2y$10$UnZbcliLXYQnM.1DgoZfGO1TW5LVcstlfHC4ZeXUFetZWcnmg7icS', '2020-03-20 10:00:06'),
(4, '09876', '$2y$10$Se4.HEWGcw4OvmkyVhCb8uhkbYSdhQNy0.f911ZaEb1yRa7XL2fau', '2020-03-20 10:12:41'),
(5, '123456', '$2y$10$6XzDjHWMIFVl7utB4os1tOFcmZ.1GMtCHFYihJJ5JLUbGemVH8u/6', '2020-03-20 10:35:59'),
(6, '12345', '$2y$10$Z49hWlmeS8ttiKMIFj2ktOKJ3PdRgmRJccl.DSAYhm8nEtvrhXN6S', '2020-03-20 10:36:38');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username` (`username`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
