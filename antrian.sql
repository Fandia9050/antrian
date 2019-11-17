-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Nov 11, 2019 at 07:47 AM
-- Server version: 10.1.19-MariaDB
-- PHP Version: 7.0.13

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `antrian`
--

-- --------------------------------------------------------

--
-- Table structure for table `kecamatan`
--

CREATE TABLE `kecamatan` (
  `id` tinyint(10) NOT NULL,
  `nama_kecamatan` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `kecamatan`
--

INSERT INTO `kecamatan` (`id`, `nama_kecamatan`) VALUES
(1, 'Kecamatan Aek Kuasan'),
(2, 'Kecamatan Aek Ledong'),
(3, 'Kecamatan Aek Songsongan'),
(4, 'Kecamatan Air Batu'),
(5, 'Kecamatan Air Jorman'),
(6, 'Kecamatan Bandar Pasir Mandoge'),
(7, 'Kecamatan Bandar Pulau'),
(8, 'Kecamatan Buntu Pane'),
(9, 'Kecamatan Kisaran Barat Kota'),
(10, 'Kecamatan Kisaran Timur Kota'),
(11, 'Kecamatan Meranti'),
(12, 'Kecamatan Pulau Rakyat'),
(13, 'Kecamatan Pulo Bandring'),
(14, 'Kecamatan Rahuning'),
(15, 'Kecamatan Rawang Panca Arga'),
(16, 'Kecamatan Sei Dadap'),
(17, 'Kecamatan Sei Kepayang'),
(18, 'Kecamatan Sei Kepayang Barat'),
(19, 'Kecamatan Sei Kepayang Timur'),
(20, 'Kecamatan Setia Janji'),
(21, 'Kecamatan Silau Laut'),
(22, 'Kecamatan Simpang Empat'),
(23, 'Kecamatan Tanjug Balai'),
(24, 'Kecamatan Teluk Dalam'),
(25, 'Kecamatan Tinggi Raja');

-- --------------------------------------------------------

--
-- Table structure for table `ref_loket`
--

CREATE TABLE `ref_loket` (
  `id` tinyint(10) NOT NULL,
  `nama_loket` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `ref_loket`
--

INSERT INTO `ref_loket` (`id`, `nama_loket`) VALUES
(1, 'Loket 1'),
(2, 'Loket 2'),
(3, 'Loket 3'),
(4, 'Loket 4'),
(5, 'Loket 5');

-- --------------------------------------------------------

--
-- Table structure for table `soud`
--

CREATE TABLE `soud` (
  `id_sound` int(24) NOT NULL,
  `judul` varchar(255) NOT NULL,
  `sound` varchar(255) NOT NULL,
  `keterangan` text NOT NULL,
  `tanggal` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `ta_antrian`
--

CREATE TABLE `ta_antrian` (
  `id` tinyint(10) NOT NULL,
  `no_antrian` smallint(6) NOT NULL,
  `id_loket` tinyint(10) NOT NULL,
  `id_kecamatan` tinyint(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `ta_antrian`
--

INSERT INTO `ta_antrian` (`id`, `no_antrian`, `id_loket`, `id_kecamatan`) VALUES
(1, 1, 1, 1),
(2, 2, 1, 1),
(3, 4, 1, 3),
(4, 5, 1, 2),
(5, 6, 1, 3),
(6, 1, 2, 7),
(7, 7, 1, 2),
(8, 1, 3, 13),
(9, 1, 4, 18),
(10, 1, 5, 23),
(11, 2, 2, 9),
(12, 3, 2, 7),
(13, 2, 4, 16),
(14, 2, 5, 25),
(15, 3, 5, 24),
(16, 3, 4, 20),
(17, 4, 2, 7),
(18, 8, 1, 1),
(19, 9, 1, 3),
(20, 4, 4, 16),
(21, 5, 4, 18),
(22, 5, 2, 7),
(23, 6, 2, 7),
(24, 10, 1, 3),
(25, 2, 3, 14),
(26, 4, 5, 23),
(27, 11, 1, 1),
(28, 3, 3, 11),
(29, 4, 3, 12),
(30, 12, 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `ta_loket`
--

CREATE TABLE `ta_loket` (
  `id` tinyint(10) NOT NULL,
  `id_loket` tinyint(10) NOT NULL,
  `id_kecamatan` tinyint(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `ta_loket`
--

INSERT INTO `ta_loket` (`id`, `id_loket`, `id_kecamatan`) VALUES
(1, 1, 1),
(2, 1, 2),
(3, 1, 3),
(4, 1, 4),
(5, 1, 5),
(6, 2, 6),
(7, 2, 7),
(8, 2, 8),
(9, 2, 9),
(10, 2, 10),
(11, 3, 11),
(12, 3, 12),
(13, 3, 13),
(14, 3, 14),
(15, 3, 15),
(16, 4, 16),
(17, 4, 17),
(18, 4, 18),
(19, 4, 19),
(20, 4, 20),
(21, 5, 21),
(22, 5, 22),
(23, 5, 23),
(24, 5, 24),
(25, 5, 25);

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(24) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `nama` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `foto` varchar(255) NOT NULL,
  `notelp` varchar(255) NOT NULL,
  `alamat` varchar(255) NOT NULL,
  `status` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `username`, `password`, `nama`, `email`, `foto`, `notelp`, `alamat`, `status`) VALUES
(1, 'Rifki', 'rifki0704', 'Rifki Mahsyaf Adha', 'rifkimahsyaf@gmail.com', 'wisuda.jpg', '082361371974', 'Batang Kuis', 'Mahasiswa'),
(3, 'Naufal', 'tampan', 'Naufal Sidqi', 'naufal@gmail.com', 'wisuda.jpg', '082361371974', 'Setia budi', 'Mahasiswa'),
(4, 'jokoki', 'jokoki', 'jokoki', 'jokoki', 'jokoki.jpg', '082361371974', 'koljem', 'pejabat'),
(5, 'Admin1', 'admin1', 'Abdillah', 'abdilah@gmail.com', 'abdilah.jpg', '082294078903', 'Gatsu', 'Admin loket'),
(6, 'rifkimahsyaf', 'rifkimahsyaf', 'Rifki Mahsyaf Adha', 'rifkimahsyaf@gmail.com', 'rifki.jpg', '08992068055', 'Batang Kuis', 'Programmer');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `kecamatan`
--
ALTER TABLE `kecamatan`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `ref_loket`
--
ALTER TABLE `ref_loket`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `soud`
--
ALTER TABLE `soud`
  ADD PRIMARY KEY (`id_sound`);

--
-- Indexes for table `ta_antrian`
--
ALTER TABLE `ta_antrian`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_kecamatan` (`id_kecamatan`),
  ADD KEY `id_loket` (`id_loket`);

--
-- Indexes for table `ta_loket`
--
ALTER TABLE `ta_loket`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_loket` (`id_loket`),
  ADD KEY `id_kecamatan` (`id_kecamatan`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `kecamatan`
--
ALTER TABLE `kecamatan`
  MODIFY `id` tinyint(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;
--
-- AUTO_INCREMENT for table `ref_loket`
--
ALTER TABLE `ref_loket`
  MODIFY `id` tinyint(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `soud`
--
ALTER TABLE `soud`
  MODIFY `id_sound` int(24) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `ta_antrian`
--
ALTER TABLE `ta_antrian`
  MODIFY `id` tinyint(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;
--
-- AUTO_INCREMENT for table `ta_loket`
--
ALTER TABLE `ta_loket`
  MODIFY `id` tinyint(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;
--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(24) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `ta_antrian`
--
ALTER TABLE `ta_antrian`
  ADD CONSTRAINT `ta_antrian_ibfk_1` FOREIGN KEY (`id_loket`) REFERENCES `ref_loket` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `ta_antrian_ibfk_2` FOREIGN KEY (`id_kecamatan`) REFERENCES `kecamatan` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `ta_loket`
--
ALTER TABLE `ta_loket`
  ADD CONSTRAINT `ta_loket_ibfk_1` FOREIGN KEY (`id_loket`) REFERENCES `ref_loket` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `ta_loket_ibfk_2` FOREIGN KEY (`id_kecamatan`) REFERENCES `kecamatan` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
