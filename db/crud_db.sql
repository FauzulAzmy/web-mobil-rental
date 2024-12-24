-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 24, 2024 at 03:12 PM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.1.25

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `crud_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `cars`
--

CREATE TABLE `cars` (
  `id` int(11) NOT NULL,
  `car_name` varchar(100) NOT NULL,
  `car_type` varchar(50) NOT NULL,
  `price` decimal(10,2) NOT NULL,
  `status` tinyint(1) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `car_id` int(11) NOT NULL,
  `order_date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `status` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `pendaftar`
--

CREATE TABLE `pendaftar` (
  `id` int(11) NOT NULL,
  `password` varchar(255) NOT NULL,
  `name` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `phone` varchar(15) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `pendaftar`
--

INSERT INTO `pendaftar` (`id`, `password`, `name`, `email`, `phone`, `created_at`) VALUES
(1002, '$2y$10$FU59LYDrS/BVW/jCqel.ke2c5ToDz28h.cosULWlehdptipLRUHrO', 'tes', 'tes@tes', '21837713', '2024-12-16 02:01:10'),
(1003, '$2y$10$csl/HlKUgqRO9.qxvxCh/ObMaCBaX2Toc/H1kruEFml.3HKHD/lBu', 'teslagi', 'avghfvsaydq28@wakdan', '213871237', '2024-12-15 09:57:54'),
(1004, '$2y$10$K74XQt4Xn/PUij/PLGlvsuBZIPeVJKkej4.AlvTm7IL5Mv8lVrRPS', 'teslagi', 'avghfvsaydq28@wakdan', '213871237', '2024-12-15 10:00:27'),
(1005, '$2y$10$wS0f0pacWdwtceryYRJZO.2mJwlENPrW/0ti65w9GG5zPvJ9I0tnq', 'tes', 'fadsa@ahbs', '12893891', '2024-12-15 10:00:53'),
(1006, '$2y$10$sZwf5sRlPDo7E0w0S1ocBeFVBCvRsOBX04MNvU1UlQU3v6t.KbWY.', 'tesa', 'sfewfzwef@dwsa', '32131', '2024-12-15 10:41:19'),
(1007, '$2y$10$o7FjNUPRumP7970BHFZ/mu6h1Rtf.jW8iVQDKdIuMLD5K70CGUz8C', 'tesa1', 'sacfcac2qewqD2wda@ewaed', '21312311', '2024-12-15 10:44:04'),
(1008, '$2y$10$BiYzqGb7uIbWtUPLeADJT.SgaVid2CtAUkE5q9vDeOijGfkjVq9vu', 'tesa12', 'daca@wada2', '2313', '2024-12-15 10:53:41'),
(1009, '$2y$10$G18qy0BcW89YtS2Ro.qo7.hkScIRf2h2JfTofLWrZp/URddbzDPk6', 'awtad2123w', '1fada@ead', '213e1q2wq', '2024-12-15 11:04:30'),
(1010, '$2y$10$oGfPIZuoEAFXoxYK6NwMxu/jXBjlJQWavL9cemlX.2lZh6UDvEH7K', 'awas', 'asd@ads', '123212312', '2024-12-15 11:45:00'),
(1011, '$2y$10$b7lnYwLvs6Id1dft5JMfv.cTWf/zg4mPMbwi8kimVIrx9Ld5oV1hC', 'awas2', 'asd@ads3', '123212312', '2024-12-15 11:49:22'),
(1012, '$2y$10$pN0R2XFuOo14xWXJaT8i5.LkcT70b2zzp3v6e4bczjIliTkS9WN9Cwdada', '21e12eq', 'sad@dsa', '23131sa', '2024-12-15 16:39:16'),
(1013, '$2y$10$CB8LsaR7F3rUuHdp6e0Wt.cf2GqvbRwD6j0mYXtJHyg/gtb75VgBu', '3113212we', 'aw@da', '231312e', '2024-12-15 12:16:28'),
(1014, '$2y$10$wO2Q4Ij42PI5GRbR.kNFSe.Gq00MLcVePzll6XVpRphiCr7WB7AKC', '213e', 'fad@ad', '123131', '2024-12-15 12:26:59'),
(1015, '$2y$10$IrdmQdPTGTk1be/195uPq.ErLiFSVsa85m.3UWY8GJ08nAUKfQtg6', 'treas', 'dadsdA@wds', '2e', '2024-12-15 14:08:35'),
(1016, '$2y$10$UzQzE1uCgEZrtQwVP603BOBPnNbjovjAIsnyJG23AeAdzTjy5ow.O', 'uding', 'ewaadaax@WDS', '2131', '2024-12-15 14:15:27'),
(1019, '$2y$10$w8rBFk4Kz.uDFRvEnE.v2ufFgCOCyg.bJf4TnukbiRrlpTfdoSulq', '3wrejkfansjka', 'awd2Wd@wds', '1213', '2024-12-15 15:21:45'),
(1020, '$2y$10$VMGV74z89/dg6cmYOXEhoux.FbM977rFcuBd1VanpzpaLgZHEGD5e', 'admin', 'fauzulazmy328@gmail.com', '089505545728', '2024-12-15 16:48:49'),
(1021, '$2y$10$KRgTaX20aM.q39jMXtiKrOsnClOhJhwWPxPOxie6.X1O6Aw2bcqZ6', 'esvdrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrr', 'serse@efd', '24323254352', '2024-12-15 16:24:25'),
(1022, '$2y$10$S361sLuX1neI2DFYJTFWS.bhvmjomHYugH7UafzRMhCtML4I38v4a', 'mirul', 'xfxrextrcrtc2@erdgcv', '636545656', '2024-12-15 16:54:53'),
(1023, '$2y$10$HvNPpetjhNDwi7/hDMO3juy6iChgH1dtE8GLaNNJaX3W/bTZ9HecW', 'fauzul', 'dawdcszxc2gdsg@sdvx', '23132134123', '2024-12-17 02:10:23');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `phone` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `name`, `email`, `phone`) VALUES
(1, 'fauzul azmy', 'fauzul123@gmail.com', '+628999998'),
(4, 'udin2', 'udinngakak@apalah2.com', '628999998657'),
(5, 'amirul', 'amiru@tes2.com', '6566526348972'),
(6, 'udin2', 'udin2@tes', '2423424'),
(7, 'udin3', 'udin3@tes', '23541322413'),
(8, 'udin', 'udin@tes', '242342321'),
(9, 'udin2', 'udinngakak@apalah.com', '13132445234'),
(10, 'udin5', 'udin@tes5', '2133124131231'),
(11, 'fufufafa', 'fufufafa@gamsd', '2443524124325'),
(12, '21weq', 'eqdqedqw3e@fa', '213123131'),
(14, 'afafa', 'awfsd@wfafa', '1322132131');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `password`) VALUES
(1, 'admin', 'admin');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `cars`
--
ALTER TABLE `cars`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id_fk` (`user_id`),
  ADD KEY `car_id_fk` (`car_id`);

--
-- Indexes for table `pendaftar`
--
ALTER TABLE `pendaftar`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `cars`
--
ALTER TABLE `cars`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2002;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `pendaftar`
--
ALTER TABLE `pendaftar`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1024;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1000;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `orders`
--
ALTER TABLE `orders`
  ADD CONSTRAINT `car_id_fk` FOREIGN KEY (`car_id`) REFERENCES `cars` (`id`),
  ADD CONSTRAINT `user_id_fk` FOREIGN KEY (`user_id`) REFERENCES `pendaftar` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
