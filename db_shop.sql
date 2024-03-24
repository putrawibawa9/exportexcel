-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 24, 2024 at 05:21 PM
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
-- Database: `db_shop`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id_admin` int(11) NOT NULL,
  `username` varchar(50) DEFAULT NULL,
  `password` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id_admin`, `username`, `password`) VALUES
(1, 'stikom@gmail.com', '123');

-- --------------------------------------------------------

--
-- Table structure for table `pakaian`
--

CREATE TABLE `pakaian` (
  `id` varchar(11) NOT NULL,
  `nama` varchar(255) NOT NULL,
  `size` varchar(255) NOT NULL,
  `warna` varchar(255) NOT NULL,
  `jenis` varchar(255) NOT NULL,
  `brand` varchar(255) NOT NULL,
  `stok` int(10) NOT NULL,
  `harga` int(11) NOT NULL,
  `foto` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `pakaian`
--

INSERT INTO `pakaian` (`id`, `nama`, `size`, `warna`, `jenis`, `brand`, `stok`, `harga`, `foto`) VALUES
('J001', 'Jaket Bomber Krem', 'L', 'Krem', 'Jaket', 'Levis', 111, 199999, 'image/42e0334030.jpg'),
('J002', 'Jaket Bomber Putih', 'XL', 'Putih', 'Jaket', 'Erigo', 40, 150000, 'image/854a4b8d8b.jpg'),
('K001', 'Kemeja Hitam', 'XL', 'Hitam', 'Kemeja', 'H&M', 12, 299999, 'image/49bb1650f0.jpeg'),
('K002', 'Kaos Krem Casual', 'L', 'Krem', 'Kaos', 'Ricardo', 199, 199999, 'image/f686968516.jpg'),
('K003', 'Kemeja Putih Lengan Panjang', 'XL', 'Putih', 'Kemeja', 'Ricardo', 40, 199999, 'image/fb4a4ce8db.jpeg'),
('K004', 'Kemeja Kotak Kotak', 'XL', 'Hitam', 'Kemeja', 'Levis', 81, 199999, 'image/d0458fbf41.jpeg'),
('K006', 'Kemeja Orange Lengan Panjang', 'L', 'Orange', 'Kemeja', 'Ricardo', 50, 199999, 'image/0ca0a2dca5.jpeg'),
('S001', 'Kaos Putih Casual', 'L', 'Putih', 'Kaos', 'Levis', 199, 79999, 'image/d6ae186e40.jpeg');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id_admin`);

--
-- Indexes for table `pakaian`
--
ALTER TABLE `pakaian`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id_admin` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
