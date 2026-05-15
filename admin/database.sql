-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: sql210.infinityfree.com
-- Generation Time: 15 مايو 2026 الساعة 16:38
-- إصدار الخادم: 11.4.10-MariaDB
-- PHP Version: 7.2.22

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `if0_41756107_mowsport`
--

-- --------------------------------------------------------

--
-- بنية الجدول `commants`
--

CREATE TABLE `commants` (
  `id` int(10) UNSIGNED NOT NULL,
  `nom` varchar(100) DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  `sujet` varchar(100) DEFAULT NULL,
  `message` text DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- إرجاع أو استيراد بيانات الجدول `commants`
--

INSERT INTO `commants` (`id`, `nom`, `email`, `sujet`, `message`) VALUES
(2147483648, 'youssfi', 'mohjlopij@gmail.com', 'zatot', 'kdddddddddddddddddddddddddddddddddddddddddddd');

-- --------------------------------------------------------

--
-- بنية الجدول `terrains`
--

CREATE TABLE `terrains` (
  `id` int(11) NOT NULL,
  `terrain_name` varchar(150) DEFAULT NULL,
  `city_id` int(11) DEFAULT NULL,
  `price_per_hour` int(11) DEFAULT NULL,
  `image` varchar(255) DEFAULT NULL,
  `description` text DEFAULT NULL,
  `is_available` tinyint(1) DEFAULT 1,
  `city_name` varchar(100) DEFAULT NULL,
  `image_J1` varchar(100) DEFAULT NULL,
  `image_J2` varchar(100) DEFAULT NULL,
  `image_J3` varchar(100) DEFAULT NULL,
  `big_description` text DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- إرجاع أو استيراد بيانات الجدول `terrains`
--

INSERT INTO `terrains` (`id`, `terrain_name`, `city_id`, `price_per_hour`, `image`, `description`, `is_available`, `city_name`, `image_J1`, `image_J2`, `image_J3`, `big_description`) VALUES
(63, 'Erragragi', 3, 300, 'terrains/errachidia/Erragragi/cover.jpg', 'un terrain dans errachidia', 1, 'Errachidia', 'terrains/errachidia/Erragragi/j1.jpg', 'terrains/errachidia/Erragragi/j2.jpg', 'terrains/errachidia/Erragragi/j3.jpg', 'podfjdfijd ujfsfdijsdo kl;sfmlskl mlkslmsl knsln s'),
(59, 'el massira', 1, 1000, 'terrains/safi/el_massira/cover.jpg', 'pojdihdidjijdkj ijsijsfifs jisfjsiijsfijfsi', 1, 'Safi', 'terrains/safi/el_massira/j1.jpg', 'terrains/safi/el_massira/j2.jpg', 'terrains/safi/el_massira/j3.jpg', 'pojdihdidjijdkj ijsijsfifs jisfjsiijsfijfsipojdihdidjijdkj ijsijsfifs jisfjsiijsfijfsi pojdihdidjijdkj ijsijsfifs jisfjsiijsfijfsi pojdihdidjijdkj ijsijsfifs jisfjsiijsfijfsi pojdihdidjijdkj ijsijsfifs jisfjsiijsfijfsi pojdihdidjijdkj ijsijsfifs jisfjsiijsfijfsi'),
(61, 'Football field ocean', 4, 500, 'terrains/rabat/Football_field_ocean/cover.jpg', 'un terrain au centre de ville rabat', 1, 'Rabat', 'terrains/rabat/Football_field_ocean/j1.jpg', 'terrains/rabat/Football_field_ocean/j2.avif', 'terrains/rabat/Football_field_ocean/j3.jpg', 'un bone terrains exterieur et caractire par un plan naturielle'),
(62, 'Green Sports Park', 2, 100, 'terrains/casablanca/Green_Sports_Park/cover.jfif', 'un terrain dans casablanca darb asoltan', 1, 'Casablanca', 'terrains/casablanca/Green_Sports_Park/j1.jfif', 'terrains/casablanca/Green_Sports_Park/j2.jfif', 'terrains/casablanca/Green_Sports_Park/j3.jfif', 'un terrain exterieur plan arificiel et ne pas un breut');

-- --------------------------------------------------------

--
-- بنية الجدول `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `first_name` varchar(100) DEFAULT NULL,
  `last_name` varchar(100) DEFAULT NULL,
  `email` varchar(150) DEFAULT NULL,
  `phone` varchar(20) DEFAULT NULL,
  `cin` varchar(30) DEFAULT NULL,
  `age` int(11) DEFAULT NULL,
  `terrain_name` varchar(150) DEFAULT NULL,
  `nb_players` int(11) DEFAULT NULL,
  `dure` int(11) DEFAULT NULL,
  `date_op` date DEFAULT NULL,
  `temp_op` time DEFAULT NULL,
  `city_id` int(11) DEFAULT NULL,
  `total` int(11) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- إرجاع أو استيراد بيانات الجدول `users`
--

INSERT INTO `users` (`id`, `first_name`, `last_name`, `email`, `phone`, `cin`, `age`, `terrain_name`, `nb_players`, `dure`, `date_op`, `temp_op`, `city_id`, `total`) VALUES
(30, 'Mohamed', 'Ilkhadry', 'mohjlopij@gmail.com', '0679231522', 'u4444444', 18, 'Oisis', 9, 90, '2026-04-17', '18:02:00', 2, 200),
(31, 'ilyass', 'youssfi', 'mohjlopij@gmail.com', '0679231522', 'u99999', 20, 'el massira', 10, 180, '2026-05-10', '21:04:00', 1, 400),
(36, 'Mohamed', 'Ilkhadry', 'mohjlopij@gmail.com', '0679231522', 'u9888989', 20, 'Erragragi', 10, 90, '2026-05-30', '11:26:00', 3, 200),
(34, 'Mohamed', 'Ilkhadry', 'mohjlopij@gmail.com', '0679231522', 'u4444444', 19, 'Oisis', 19, 90, '2026-05-22', '09:13:00', 2, 200),
(35, 'Abdelqoddous', 'Er-rajy', 'deathgun.rio@gmail.com', '0693466370', 'u535353', 18, 'Erragragi', 10, 90, '2026-05-12', '05:00:00', 3, 200),
(40, 'Mohamed', 'Ilkhadry', 'mohjlopij@gmail.com', '0679231522', 'u99999', 19, 'Erragragi', 10, 400, '2026-05-22', '12:41:00', 3, 1333),
(38, 'popopjdjdj', 'Ilkhadry', 'mohjlopij@gmail.com', '0679231522', 'u99999', 18, 'Erragragi', 19, 90, '2026-05-15', '12:56:00', 3, 200),
(41, 'Mohamed', 'Ilkhadry', 'mohjlopij@gmail.com', '0679231522', 'u12244446', 18, 'Erragragi', 19, 180, '2026-05-07', '21:57:00', 3, 600);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `commants`
--
ALTER TABLE `commants`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `terrains`
--
ALTER TABLE `terrains`
  ADD PRIMARY KEY (`id`),
  ADD KEY `city_id` (`city_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `commants`
--
ALTER TABLE `commants`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2147483649;

--
-- AUTO_INCREMENT for table `terrains`
--
ALTER TABLE `terrains`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=64;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=42;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
