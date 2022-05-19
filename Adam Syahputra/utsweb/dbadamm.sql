-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 14, 2022 at 05:45 PM
-- Server version: 10.4.21-MariaDB
-- PHP Version: 8.0.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `dbadamm`
--

-- --------------------------------------------------------

--
-- Table structure for table `tb_admin`
--

CREATE TABLE `tb_admin` (
  `admin_id` int(11) NOT NULL,
  `username` varchar(20) NOT NULL,
  `password` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_admin`
--

INSERT INTO `tb_admin` (`admin_id`, `username`, `password`) VALUES
(1, 'Adam', '123');

-- --------------------------------------------------------

--
-- Table structure for table `tb_katagori`
--

CREATE TABLE `tb_katagori` (
  `kategori_id` int(11) NOT NULL,
  `nama_kategori` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_katagori`
--

INSERT INTO `tb_katagori` (`kategori_id`, `nama_kategori`) VALUES
(2, 'Sport'),
(3, 'Casual');

-- --------------------------------------------------------

--
-- Table structure for table `tb_order`
--

CREATE TABLE `tb_order` (
  `order_id` int(11) NOT NULL,
  `produk_id` int(100) NOT NULL,
  `jumlahbarang` int(20) NOT NULL,
  `keterangan` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_order`
--

INSERT INTO `tb_order` (`order_id`, `produk_id`, `jumlahbarang`, `keterangan`) VALUES
(1, 1, 15, 'Avaiable'),
(3, 3, 5, 'Not Avaiable');

-- --------------------------------------------------------

--
-- Table structure for table `tb_produk`
--

CREATE TABLE `tb_produk` (
  `produk_id` int(11) NOT NULL,
  `kategori_id` int(11) NOT NULL,
  `namaproduk` varchar(100) NOT NULL,
  `harga_produk` varchar(100) NOT NULL,
  `deskripsi_produk` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_produk`
--

INSERT INTO `tb_produk` (`produk_id`, `kategori_id`, `namaproduk`, `harga_produk`, `deskripsi_produk`) VALUES
(1, 3, 'Nike Air Jordan', '5000000', 'Sepatu terkenal dan terjamin kualitasnya'),
(3, 3, 'Ventela', '250000', 'Sepatu dengan soll yang tinggi membuat penampilan lebih tinggi dan elegan');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tb_admin`
--
ALTER TABLE `tb_admin`
  ADD PRIMARY KEY (`admin_id`);

--
-- Indexes for table `tb_katagori`
--
ALTER TABLE `tb_katagori`
  ADD PRIMARY KEY (`kategori_id`);

--
-- Indexes for table `tb_order`
--
ALTER TABLE `tb_order`
  ADD PRIMARY KEY (`order_id`),
  ADD KEY `produk_id` (`produk_id`);

--
-- Indexes for table `tb_produk`
--
ALTER TABLE `tb_produk`
  ADD PRIMARY KEY (`produk_id`),
  ADD KEY `kategori_id` (`kategori_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tb_admin`
--
ALTER TABLE `tb_admin`
  MODIFY `admin_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `tb_katagori`
--
ALTER TABLE `tb_katagori`
  MODIFY `kategori_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `tb_order`
--
ALTER TABLE `tb_order`
  MODIFY `order_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `tb_produk`
--
ALTER TABLE `tb_produk`
  MODIFY `produk_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `tb_order`
--
ALTER TABLE `tb_order`
  ADD CONSTRAINT `tb_order_ibfk_1` FOREIGN KEY (`produk_id`) REFERENCES `tb_produk` (`produk_id`);

--
-- Constraints for table `tb_produk`
--
ALTER TABLE `tb_produk`
  ADD CONSTRAINT `tb_produk_ibfk_1` FOREIGN KEY (`kategori_id`) REFERENCES `tb_katagori` (`kategori_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
