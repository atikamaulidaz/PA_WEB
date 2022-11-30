-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 14, 2022 at 01:48 PM
-- Server version: 10.4.21-MariaDB
-- PHP Version: 8.0.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `laundry_crud`
--

-- --------------------------------------------------------

--
-- Table structure for table `gambar`
--

CREATE TABLE `gambar` (
  `id_gambar` int(11) NOT NULL,
  `id` int(11) NOT NULL,
  `nama_file` varchar(64) NOT NULL,
  `file` varchar(64) NOT NULL,
  `waktu` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `gambar`
--

INSERT INTO `gambar` (`id_gambar`, `id`, `nama_file`, `file`, `waktu`) VALUES
(33, 53, 'Rumah Atika', 'Rumah Atika.jpg', '2022-11-14 20:35:20'),
(34, 55, 'Rumah Adek', 'Rumah Adek.jfif', '2022-11-14 20:37:01'),
(35, 56, 'Rumah Puput', 'Rumah Puput.jfif', '2022-11-14 20:39:05'),
(36, 57, 'Rumah kakak', 'Rumah kakak.jpg', '2022-11-14 20:40:03'),
(37, 58, 'Rumah Tifah', 'Rumah Tifah.jfif', '2022-11-14 20:42:36'),
(38, 59, 'Rumah abang', 'Rumah abang.jfif', '2022-11-14 20:43:11');

-- --------------------------------------------------------

--
-- Table structure for table `history`
--

CREATE TABLE `history` (
  `id_history` int(11) NOT NULL,
  `id` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `nama` varchar(64) NOT NULL,
  `alamat` varchar(64) NOT NULL,
  `jenis` varchar(64) NOT NULL,
  `waktu` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `history`
--

INSERT INTO `history` (`id_history`, `id`, `id_user`, `nama`, `alamat`, `jenis`, `waktu`) VALUES
(7, 53, 1, 'Atika Maulida Zahra', 'Samarinda', 'Laundry Exclusive', '2022-11-14 20:35:20'),
(8, 55, 1, 'Adeknya Atika', 'Sempaja', 'Laundry Bed Cover', '2022-11-14 20:37:01'),
(9, 56, 5, 'Putri Wahdaniyah Iskandar', 'Damanhuri', 'Laundry Sepatu', '2022-11-14 20:39:05'),
(10, 57, 5, 'Kakaknya Puput', 'AWS', 'Regular Ekonomis', '2022-11-14 20:40:03'),
(11, 58, 6, 'Latifah Nur Rahmawati', 'Palaran', 'Laundry Exclusive', '2022-11-14 20:42:36'),
(12, 59, 6, 'Abangnya Tifah', 'Penajam', 'Regular Ekonomis', '2022-11-14 20:43:11');

-- --------------------------------------------------------

--
-- Table structure for table `laundry`
--

CREATE TABLE `laundry` (
  `id` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `alamat` text NOT NULL,
  `telpon` varchar(25) NOT NULL,
  `email` varchar(100) NOT NULL,
  `jenis` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `laundry`
--

INSERT INTO `laundry` (`id`, `id_user`, `nama`, `alamat`, `telpon`, `email`, `jenis`) VALUES
(53, 1, 'Atika Maulida Zahra', 'Samarinda', '08521234567', 'atikamaulidazahra@gmail.com', 'Laundry Exclusive'),
(55, 1, 'Adeknya Atika', 'Sempaja', '0879654379', 'adekgemes@gmail.com', 'Laundry Bed Cover'),
(56, 5, 'Putri Wahdaniyah Iskandar', 'Damanhuri', '0876543283', 'puput@gmail.com', 'Laundry Sepatu'),
(57, 5, 'Kakaknya Puput', 'AWS', '08769876876', 'kakak@gmail.com', 'Regular Ekonomis'),
(58, 6, 'Latifah Nur Rahmawati', 'Palaran', '08798798989', 'tifah@gmail.com', 'Laundry Exclusive'),
(59, 6, 'Abangnya Tifah', 'Penajam', '08989898989', 'abanggg@gmail.com', 'Regular Ekonomis');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id_user` int(11) NOT NULL,
  `nama` varchar(255) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id_user`, `nama`, `username`, `password`) VALUES
(1, 'Atika Maulida Zahra', 'atika', '$2y$10$PZp9ctjmrchSwclm6ku7/eLc.SEK7RjKIJ0rPWkdIJDqHDH9LL9Ee'),
(3, 'admin', 'admin', '$2y$10$D/loUMYdW36xSxcV1UkfNe0xNcRgMm1JAdH6PR66SXSYT.VsnW/La'),
(5, 'putri wahdaniyah iskandar', 'puput', '$2y$10$7eGh10wJLZlT2wEa9cYNBe/VBqHksXkwFqKlxbG6BfgQXeeAvzvuK'),
(6, 'Latifah Nur Rahmawati', 'tifah', '$2y$10$RZXrzeYXL6JT7WoWKSXCiebxVGM1r/gSgkpWlfWH8iZFPJK6PKkpK');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `gambar`
--
ALTER TABLE `gambar`
  ADD PRIMARY KEY (`id_gambar`),
  ADD KEY `id` (`id`);

--
-- Indexes for table `history`
--
ALTER TABLE `history`
  ADD PRIMARY KEY (`id_history`),
  ADD KEY `fk_history` (`id`),
  ADD KEY `fk_history1` (`id_user`);

--
-- Indexes for table `laundry`
--
ALTER TABLE `laundry`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_fk` (`id_user`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id_user`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `gambar`
--
ALTER TABLE `gambar`
  MODIFY `id_gambar` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=40;

--
-- AUTO_INCREMENT for table `history`
--
ALTER TABLE `history`
  MODIFY `id_history` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `laundry`
--
ALTER TABLE `laundry`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=61;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `gambar`
--
ALTER TABLE `gambar`
  ADD CONSTRAINT `gambar_ibfk_1` FOREIGN KEY (`id`) REFERENCES `laundry` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `history`
--
ALTER TABLE `history`
  ADD CONSTRAINT `fk_history1` FOREIGN KEY (`id_user`) REFERENCES `user` (`id_user`) ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_history3` FOREIGN KEY (`id`) REFERENCES `laundry` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `laundry`
--
ALTER TABLE `laundry`
  ADD CONSTRAINT `user_fk` FOREIGN KEY (`id_user`) REFERENCES `user` (`id_user`) ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
