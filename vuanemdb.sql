-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 10, 2022 at 06:40 PM
-- Server version: 10.4.17-MariaDB
-- PHP Version: 7.2.34

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `vuanemdb`
--

-- --------------------------------------------------------

--
-- Table structure for table `tblchitietdonhang`
--

CREATE TABLE `tblchitietdonhang` (
  `mactdh` int(11) NOT NULL,
  `madh` int(11) NOT NULL,
  `tenhang` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL,
  `gia` float NOT NULL,
  `soluong` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `tblchitietdonhang`
--

INSERT INTO `tblchitietdonhang` (`mactdh`, `madh`, `tenhang`, `gia`, `soluong`) VALUES
(1, 1, 'Nệm Foam Goodnight Eva', 2650000, 1),
(2, 1, 'Nệm bông ép Goodnight Nova', 2850000, 2),
(3, 2, 'Nệm Massage Nhật Bản Goodnight Osaka', 4290000, 5),
(4, 2, 'Nệm Foam Goodnight Galaxy', 6270000, 1),
(5, 2, 'Nệm Foam Goodnight Luna 3zones', 10900000, 3);

-- --------------------------------------------------------

--
-- Table structure for table `tbldonhang`
--

CREATE TABLE `tbldonhang` (
  `mahd` int(11) NOT NULL,
  `sodienthoai` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `diachigiao` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tinhtrang` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `tbldonhang`
--

INSERT INTO `tbldonhang` (`mahd`, `sodienthoai`, `diachigiao`, `tinhtrang`) VALUES
(1, '0935822110', 'Ung Văn Khiêm, Phường 25, Quận Bình Thạnh, TP.HCM', 1),
(2, '0987654321', 'Lê Lợi, Quận Gò Vấp, TP.HCM', 2);

-- --------------------------------------------------------

--
-- Table structure for table `tblkhachhang`
--

CREATE TABLE `tblkhachhang` (
  `sodienthoai` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tenkh` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `diachi` text COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `tblkhachhang`
--

INSERT INTO `tblkhachhang` (`sodienthoai`, `tenkh`, `diachi`) VALUES
('0935822110', 'Đào Nguyễn Duy Tấn', 'Ung Văn Khiêm, Phường 25, Quận Bình Thạnh, TP.HCM'),
('0987654321', 'Đào Duy Từ', 'Lê Lợi, Quận Gò Vấp, TP.HCM');

-- --------------------------------------------------------

--
-- Table structure for table `tblsanpham`
--

CREATE TABLE `tblsanpham` (
  `ma` int(11) NOT NULL,
  `hinh` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `ten` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `gia` float NOT NULL,
  `flashsale` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `tblsanpham`
--

INSERT INTO `tblsanpham` (`ma`, `hinh`, `ten`, `gia`, `flashsale`) VALUES
(39, './assets/img/Content/product/39-product1.jpg', 'Nệm Foam Tempur Hybrid Elite', 105000000, 90000000),
(40, './assets/img/Content/product/40-product2.jpg', 'Nệm Foam Tempur Sensation', 83680000, 63680000),
(41, './assets/img/Content/product/41-product3.jpg', 'Nệm Foam Tempur Original', 83680000, 63680000),
(42, './assets/img/Content/product/42-product4.jpg', 'Nệm lò xo Dunlopillo Royal Kensington', 62825000, 42800000),
(43, './assets/img/Content/product/product-5.jpg', 'Nệm lò xo Therapedic Therawrap Ultra', 46058000, 40000000),
(44, './assets/img/Content/product/product-6.jpg', 'Nệm cao su Dunlopillo World ECO', 41741000, 30000000),
(45, './assets/img/Content/product/product-7.jpg', 'Nệm lò xo Dunlopillo Circle of Life', 40536000, 30000000),
(46, './assets/img/Content/product/product-8.jpg', 'Nệm lò xo Dunlopillo Elizabeth', 39901000, 33000000),
(47, './assets/img/Content/product/product-9.jpg', 'Nệm lò xo Therapedic Therawrap Plus', 37319000, 27000000),
(48, './assets/img/Content/product/product-10.jpg', 'Nệm Foam Aeroflow Wave', 15460000, 13460000),
(49, './assets/img/Content/product/product-11.jpg', 'Nệm Foam Goodnight Eva', 2650000, 2000000),
(50, './assets/img/Content/product/product-12.jpg', 'Nệm Massage Nhật Bản Goodnight Osaka', 4290000, 4000000);

-- --------------------------------------------------------

--
-- Table structure for table `tbltinhtrang`
--

CREATE TABLE `tbltinhtrang` (
  `matt` int(11) NOT NULL,
  `tentt` varchar(30) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `tbltinhtrang`
--

INSERT INTO `tbltinhtrang` (`matt`, `tentt`) VALUES
(0, ''),
(1, 'Chờ duyệt'),
(2, 'Đã duyệt'),
(3, 'Đang giao'),
(4, 'Hoàn tất');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tblchitietdonhang`
--
ALTER TABLE `tblchitietdonhang`
  ADD PRIMARY KEY (`mactdh`);

--
-- Indexes for table `tbldonhang`
--
ALTER TABLE `tbldonhang`
  ADD PRIMARY KEY (`mahd`);

--
-- Indexes for table `tblkhachhang`
--
ALTER TABLE `tblkhachhang`
  ADD PRIMARY KEY (`sodienthoai`);

--
-- Indexes for table `tblsanpham`
--
ALTER TABLE `tblsanpham`
  ADD PRIMARY KEY (`ma`);

--
-- Indexes for table `tbltinhtrang`
--
ALTER TABLE `tbltinhtrang`
  ADD PRIMARY KEY (`matt`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tblchitietdonhang`
--
ALTER TABLE `tblchitietdonhang`
  MODIFY `mactdh` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `tbldonhang`
--
ALTER TABLE `tbldonhang`
  MODIFY `mahd` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `tblsanpham`
--
ALTER TABLE `tblsanpham`
  MODIFY `ma` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=51;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
