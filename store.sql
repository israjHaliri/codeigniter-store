-- phpMyAdmin SQL Dump
-- version 4.5.2
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Feb 02, 2017 at 05:15 AM
-- Server version: 10.1.19-MariaDB
-- PHP Version: 5.5.38

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

-- --------------------------------------------------------

--
-- Table structure for table `merchand`
--

CREATE TABLE `merchand` (
  `id_merchand` int(100) NOT NULL,
  `barcode_merchand` varchar(100) NOT NULL,
  `brand_merchand` varchar(100) NOT NULL,
  `size_merchand` varchar(100) NOT NULL,
  `describe_merchand` text NOT NULL,
  `image_merchand` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `merchand`
--

INSERT INTO `merchand` (`id_merchand`, `barcode_merchand`, `brand_merchand`, `size_merchand`, `describe_merchand`, `image_merchand`) VALUES
(12, '1', '1', 'XXS', '<p>\r\n dari samaping :</p>\r\n<p>\r\n <img alt="" data-cke-saved-src="/ci-e-commerce/assets/plugins/kcfinder/upload/images/hat.jpg" src="/ci-e-commerce/assets/plugins/kcfinder/upload/images/hat.jpg" [removed] 74px; width: 100px;"></p>\r\n<p>\r\n  </p>\r\n<p>\r\n dari belakang:</p>\r\n<p>\r\n  </p>\r\n', 'hat4.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `pant`
--

CREATE TABLE `pant` (
  `id_pant` int(100) NOT NULL,
  `barcode_pant` varchar(100) NOT NULL,
  `brand_pant` varchar(100) NOT NULL,
  `size_pant` varchar(100) NOT NULL,
  `describe_pant` text NOT NULL,
  `image_pant` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pant`
--

INSERT INTO `pant` (`id_pant`, `barcode_pant`, `brand_pant`, `size_pant`, `describe_pant`, `image_pant`) VALUES
(8, 'xfor legend', 'xfor legend', 'XL', 'xfor legend', 'pant24.jpg'),
(9, '223gxjj', 'jeans', 'XXS', 'new model from jeans this have max of sell.\r\nwe suggest you try this one', 'pant2.jpg'),
(10, 'logox4j1', 'logo', 'XXS', 'logo x4j new design for 2015 you shoukd try this', 'pant21.jpg'),
(11, 'darbostbikini122', 'darbost ', 'S', 'darbost bikini is the chipper bikini,try this one', 'pants.jpg'),
(12, 'vans123', 'vans', 'XXS', 'vans', 'pant22.jpg'),
(13, 'lea5', 'lea', 'XXS', 'lea5', 'pant23.jpg'),
(14, 'mrbost1', 'mr bost', 'XXS', 'mr bost', 'pant25.jpg'),
(15, 'mrbost2', 'mr bost2', 'XXS', 'mr bost2', 'pants1.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

CREATE TABLE `product` (
  `id_product` int(100) NOT NULL,
  `title_product` varchar(100) NOT NULL,
  `price_product` decimal(65,0) NOT NULL,
  `date_publish` date NOT NULL,
  `product_type` varchar(100) NOT NULL,
  `shirt_id` int(100) DEFAULT NULL,
  `pant_id` int(100) DEFAULT NULL,
  `merchand_id` int(100) DEFAULT NULL,
  `count` int(11) NOT NULL,
  `slug` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`id_product`, `title_product`, `price_product`, `date_publish`, `product_type`, `shirt_id`, `pant_id`, `merchand_id`, `count`, `slug`) VALUES
(75, 'xfor  lg', '123000', '2015-09-11', 'shirt', 59, NULL, NULL, 82, 'xfor134-detail'),
(76, 'xfor legend', '123000', '2015-09-04', 'pant', NULL, 8, NULL, 11, 'xfor-legend-detail'),
(78, 'proshop', '123000', '2015-09-03', 'shirt', 60, NULL, NULL, 3, 'proshop123-detail'),
(79, 'jeans', '500000', '2015-09-04', 'pant', NULL, 9, NULL, 0, '223gxjj-detail'),
(80, 'jasco', '146000', '2015-09-04', 'shirt', 61, NULL, NULL, 1, '1FGjasco-detail'),
(81, 'dust from winfd', '122000', '2015-09-03', 'shirt', 62, NULL, NULL, 0, 'dustfromwinfd123-detail'),
(82, 'logo x4j', '300000', '2015-09-01', 'pant', NULL, 10, NULL, 0, 'logox4j1-detail'),
(83, 'darbost bikini', '20000', '2015-09-01', 'pant', NULL, 11, NULL, 1, 'darbostbikini122-detail'),
(88, 'darbostt 21', '19000', '2015-09-03', 'shirt', 159, NULL, NULL, 0, 'darbost123-detail'),
(89, 'posop', '123000', '2015-09-03', 'shirt', 160, NULL, NULL, 0, 'posop1234-detail'),
(90, 'isle of island', '50000', '2015-09-02', 'shirt', 161, NULL, NULL, 3, 'iofisland1-detail'),
(91, 'x450', '120000', '2015-09-04', 'shirt', 162, NULL, NULL, 0, 'x450-detail'),
(92, 'x4502', '449998', '2015-09-03', 'shirt', 163, NULL, NULL, 0, 'x450123-detail'),
(93, 'vans', '250000', '2015-09-04', 'pant', NULL, 12, NULL, 3, 'vans123-detail'),
(94, 'lea5', '124000', '2015-09-03', 'pant', NULL, 13, NULL, 0, 'lea5-detail'),
(95, 'mr bost', '123000', '2015-09-03', 'pant', NULL, 14, NULL, 0, 'mrbost1-detail'),
(96, 'mr bost2', '123000', '2015-09-03', 'pant', NULL, 15, NULL, 0, 'mrbost2-detail'),
(97, '1', '1', '0001-01-01', 'merchand', NULL, NULL, 12, 9, '1-detail');

-- --------------------------------------------------------

--
-- Table structure for table `shirt`
--

CREATE TABLE `shirt` (
  `id_shirt` int(100) NOT NULL,
  `barcode_shirt` varchar(100) NOT NULL,
  `brand_shirt` varchar(100) NOT NULL,
  `size_shirt` varchar(100) NOT NULL,
  `describe_shirt` text NOT NULL,
  `image_shirt` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `shirt`
--

INSERT INTO `shirt` (`id_shirt`, `barcode_shirt`, `brand_shirt`, `size_shirt`, `describe_shirt`, `image_shirt`) VALUES
(59, 'xfor134', 'xfor', 'XXS', 'xfor', 'shirt25.jpg'),
(60, 'proshop123', 'proshop', 'XXS', 'this the new model from proshop,\r\nthis cloth nice for walk', 'shirt2.jpg'),
(61, '1FGjasco', 'jasco', 'S', 'new koko ', 'shirt21.jpg'),
(62, 'dustfromwinfd123', 'dust from winfd', 'XXS', 'dust from winfd new relaease as new this good for try.', 'shirt22.jpg'),
(159, 'darbost123', 'darbost', 'M', 'darbost', 'shirt.jpg'),
(160, 'posop1234', 'posop', 'XXS', 'posop the brand', 'shirt1.jpg'),
(161, 'iofisland1', 'isle of island', 'XXS', 'isle of island is the most favourite shirt in the world', 'shirt23.jpg'),
(162, 'x450', 'x450', 'XXS', 'x450', 'shirt24.jpg'),
(163, 'x450123', 'x450', 'XXS', 'x450', 'shirt3.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id_user` int(100) NOT NULL,
  `username` varchar(100) NOT NULL,
  `firstname` varchar(100) NOT NULL,
  `lastname` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `active` varchar(100) NOT NULL,
  `level` enum('admin','guest') NOT NULL,
  `slug` varchar(100) NOT NULL,
  `image` varchar(150) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id_user`, `username`, `firstname`, `lastname`, `password`, `email`, `active`, `level`, `slug`, `image`) VALUES
(490, 'israj', 'israj', 'haliri', 'MTIzNDU2Nzg=', 'israj.haliri@gmail.com', '1', 'admin', 'israj-detail', 'me.jpg'),
(497, 'guest', 'guest', 'user', 'MTIzNDU2Nzg=', 'guest@test.com', '1', 'guest', 'guest-detail', 'me1.jpg');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `merchand`
--
ALTER TABLE `merchand`
  ADD PRIMARY KEY (`id_merchand`);

--
-- Indexes for table `pant`
--
ALTER TABLE `pant`
  ADD PRIMARY KEY (`id_pant`);

--
-- Indexes for table `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`id_product`),
  ADD KEY `shirt_id` (`shirt_id`),
  ADD KEY `pant_id` (`pant_id`),
  ADD KEY `merchand_id` (`merchand_id`),
  ADD KEY `merchand_id_2` (`merchand_id`),
  ADD KEY `pant_id_2` (`pant_id`),
  ADD KEY `shirt_id_2` (`shirt_id`),
  ADD KEY `merchand_id_3` (`merchand_id`),
  ADD KEY `pant_id_3` (`pant_id`),
  ADD KEY `shirt_id_3` (`shirt_id`);

--
-- Indexes for table `shirt`
--
ALTER TABLE `shirt`
  ADD PRIMARY KEY (`id_shirt`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id_user`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `merchand`
--
ALTER TABLE `merchand`
  MODIFY `id_merchand` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
--
-- AUTO_INCREMENT for table `pant`
--
ALTER TABLE `pant`
  MODIFY `id_pant` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;
--
-- AUTO_INCREMENT for table `product`
--
ALTER TABLE `product`
  MODIFY `id_product` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=98;
--
-- AUTO_INCREMENT for table `shirt`
--
ALTER TABLE `shirt`
  MODIFY `id_shirt` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=164;
--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id_user` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=498;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `product`
--
ALTER TABLE `product`
  ADD CONSTRAINT `product_ibfk_3` FOREIGN KEY (`merchand_id`) REFERENCES `merchand` (`id_merchand`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `product_ibfk_4` FOREIGN KEY (`pant_id`) REFERENCES `pant` (`id_pant`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `product_ibfk_5` FOREIGN KEY (`shirt_id`) REFERENCES `shirt` (`id_shirt`) ON DELETE CASCADE ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
