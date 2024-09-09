-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 31, 2023 at 02:58 AM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.0.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `litbang`
--

-- --------------------------------------------------------

--
-- Table structure for table `tb_akun`
--

CREATE TABLE `tb_akun` (
  `id` int(5) NOT NULL,
  `username` varchar(100) NOT NULL,
  `password` varchar(200) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `role` enum('bappeda','skpd') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tb_akun`
--

INSERT INTO `tb_akun` (`id`, `username`, `password`, `nama`, `role`) VALUES
(1, 'adminbappeda', '202cb962ac59075b964b07152d234b70', 'Admin BAPPEDA', 'bappeda'),
(2, 'adminskpd', 'caf1a3dfb505ffed0d024130f58c5cfa', 'Admin SKPD', 'skpd');

-- --------------------------------------------------------

--
-- Table structure for table `tb_bidang_peneliti`
--

CREATE TABLE `tb_bidang_peneliti` (
  `id_bidang_peneliti` int(5) NOT NULL,
  `id_peneliti` int(5) NOT NULL,
  `id_bidang_penelitian` int(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `tb_bidang_penelitian`
--

CREATE TABLE `tb_bidang_penelitian` (
  `id_bidang_penelitian` int(5) NOT NULL,
  `nama_bidang_penelitian` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tb_bidang_penelitian`
--

INSERT INTO `tb_bidang_penelitian` (`id_bidang_penelitian`, `nama_bidang_penelitian`) VALUES
(1, 'Politik'),
(2, 'Ekonomi'),
(3, 'Koperasi');

-- --------------------------------------------------------

--
-- Table structure for table `tb_blog_saran`
--

CREATE TABLE `tb_blog_saran` (
  `id_saran` int(5) NOT NULL,
  `saran` text NOT NULL,
  `tanggapan` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tb_blog_saran`
--

INSERT INTO `tb_blog_saran` (`id_saran`, `saran`, `tanggapan`) VALUES
(1, 'test', 'aaa'),
(3, 'a', ''),
(4, 'a', ''),
(5, 'testtttt', '');

-- --------------------------------------------------------

--
-- Table structure for table `tb_haki`
--

CREATE TABLE `tb_haki` (
  `id_haki` int(5) NOT NULL,
  `jenis` varchar(100) NOT NULL,
  `nama_haki` varchar(200) NOT NULL,
  `pemilik_haki` varchar(100) NOT NULL,
  `registrasi` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tb_haki`
--

INSERT INTO `tb_haki` (`id_haki`, `jenis`, `nama_haki`, `pemilik_haki`, `registrasi`) VALUES
(2, 'testj', 'nama', 'w', 'e');

-- --------------------------------------------------------

--
-- Table structure for table `tb_info_kkn`
--

CREATE TABLE `tb_info_kkn` (
  `id_info_kkn` int(5) NOT NULL,
  `perguruan_tinggi` varchar(100) NOT NULL,
  `lokasi` varchar(200) NOT NULL,
  `link_gmap` varchar(100) NOT NULL,
  `pelaksanaan` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tb_info_kkn`
--

INSERT INTO `tb_info_kkn` (`id_info_kkn`, `perguruan_tinggi`, `lokasi`, `link_gmap`, `pelaksanaan`) VALUES
(1, 'Universitas Lambung Mangkurat', 'Desa Martapura Barat', 'www.google.com', '2 Juli 2023 - 30 Juli 2023');

-- --------------------------------------------------------

--
-- Table structure for table `tb_inovasi_opd`
--

CREATE TABLE `tb_inovasi_opd` (
  `id_inovasi_opd` int(5) NOT NULL,
  `judul_inovasi` text NOT NULL,
  `tahun_inovasi` varchar(100) NOT NULL,
  `latar_belakang` text NOT NULL,
  `tujuan` text NOT NULL,
  `manfaat` text NOT NULL,
  `status` enum('Terlaksana','Tidak Terlaksana') NOT NULL,
  `progress` enum('Ekspose Awal','Ekspose Akhir') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tb_inovasi_opd`
--

INSERT INTO `tb_inovasi_opd` (`id_inovasi_opd`, `judul_inovasi`, `tahun_inovasi`, `latar_belakang`, `tujuan`, `manfaat`, `status`, `progress`) VALUES
(2, 'judul', '2020', 'latar', 'tujuan', 'manfaat', 'Terlaksana', 'Ekspose Akhir');

-- --------------------------------------------------------

--
-- Table structure for table `tb_kebutuhan_riset`
--

CREATE TABLE `tb_kebutuhan_riset` (
  `id_kebutuhan` int(5) NOT NULL,
  `judul` text NOT NULL,
  `tujuan` text NOT NULL,
  `manfaat` text NOT NULL,
  `info` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tb_kebutuhan_riset`
--

INSERT INTO `tb_kebutuhan_riset` (`id_kebutuhan`, `judul`, `tujuan`, `manfaat`, `info`) VALUES
(1, 'judul', 'tujuan', 'manfaat', 'info');

-- --------------------------------------------------------

--
-- Table structure for table `tb_kreativitas`
--

CREATE TABLE `tb_kreativitas` (
  `id_kreativitas` int(5) NOT NULL,
  `nama_kreativitas` text NOT NULL,
  `kreator` text NOT NULL,
  `deskripsi` text NOT NULL,
  `progress` enum('Lanjut','Tidak Lanjut') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tb_kreativitas`
--

INSERT INTO `tb_kreativitas` (`id_kreativitas`, `nama_kreativitas`, `kreator`, `deskripsi`, `progress`) VALUES
(1, 'nama', 'kreator', 'deskripsi', 'Tidak Lanjut');

-- --------------------------------------------------------

--
-- Table structure for table `tb_lembaga_penelitian`
--

CREATE TABLE `tb_lembaga_penelitian` (
  `id_lembaga_penelitian` int(5) NOT NULL,
  `nama_lembaga` varchar(100) NOT NULL,
  `email_lembaga` varchar(100) NOT NULL,
  `website_lembaga` varchar(100) NOT NULL,
  `alamat_lembaga` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tb_lembaga_penelitian`
--

INSERT INTO `tb_lembaga_penelitian` (`id_lembaga_penelitian`, `nama_lembaga`, `email_lembaga`, `website_lembaga`, `alamat_lembaga`) VALUES
(1, 'Google', 'google@gmail.com', 'www.google.com', 'Jl. pppppppp');

-- --------------------------------------------------------

--
-- Table structure for table `tb_peneliti`
--

CREATE TABLE `tb_peneliti` (
  `id_peneliti` int(5) NOT NULL,
  `nama_peneliti` varchar(100) NOT NULL,
  `gelar_peneliti` varchar(100) NOT NULL,
  `pendidikan_peneliti` varchar(100) NOT NULL,
  `alamat_peneliti` text NOT NULL,
  `email_peneliti` varchar(100) NOT NULL,
  `id_lembaga_penelitian` int(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tb_peneliti`
--

INSERT INTO `tb_peneliti` (`id_peneliti`, `nama_peneliti`, `gelar_peneliti`, `pendidikan_peneliti`, `alamat_peneliti`, `email_peneliti`, `id_lembaga_penelitian`) VALUES
(1, 'Susanto', 'S.H., M.M', 'S1', 'Jl. Pppppp', 'a@gmail.com', 1);

-- --------------------------------------------------------

--
-- Table structure for table `tb_penelitian`
--

CREATE TABLE `tb_penelitian` (
  `id_penelitian` int(5) NOT NULL,
  `jenis_penelitian` enum('Penelitian','Publikasi','Kajian') NOT NULL,
  `judul_penelitian` varchar(200) NOT NULL,
  `tahun_penelitian` varchar(10) NOT NULL,
  `abstrak_penelitian` text NOT NULL,
  `peneliti` text NOT NULL,
  `id_lembaga_penelitian` int(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tb_penelitian`
--

INSERT INTO `tb_penelitian` (`id_penelitian`, `jenis_penelitian`, `judul_penelitian`, `tahun_penelitian`, `abstrak_penelitian`, `peneliti`, `id_lembaga_penelitian`) VALUES
(1, 'Publikasi', 'judul', '2020', 'abstrak', 'susanto', 1);

-- --------------------------------------------------------

--
-- Table structure for table `tb_peneliti_penelitian`
--

CREATE TABLE `tb_peneliti_penelitian` (
  `id_peneliti_penelitian` int(5) NOT NULL,
  `id_penelitian` int(5) NOT NULL,
  ` id_peneliti` int(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tb_akun`
--
ALTER TABLE `tb_akun`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tb_bidang_peneliti`
--
ALTER TABLE `tb_bidang_peneliti`
  ADD PRIMARY KEY (`id_bidang_peneliti`),
  ADD KEY `id_bidang_penelitian` (`id_bidang_penelitian`),
  ADD KEY `id_peneliti` (`id_peneliti`);

--
-- Indexes for table `tb_bidang_penelitian`
--
ALTER TABLE `tb_bidang_penelitian`
  ADD PRIMARY KEY (`id_bidang_penelitian`);

--
-- Indexes for table `tb_blog_saran`
--
ALTER TABLE `tb_blog_saran`
  ADD PRIMARY KEY (`id_saran`);

--
-- Indexes for table `tb_haki`
--
ALTER TABLE `tb_haki`
  ADD PRIMARY KEY (`id_haki`);

--
-- Indexes for table `tb_info_kkn`
--
ALTER TABLE `tb_info_kkn`
  ADD PRIMARY KEY (`id_info_kkn`);

--
-- Indexes for table `tb_inovasi_opd`
--
ALTER TABLE `tb_inovasi_opd`
  ADD PRIMARY KEY (`id_inovasi_opd`);

--
-- Indexes for table `tb_kebutuhan_riset`
--
ALTER TABLE `tb_kebutuhan_riset`
  ADD PRIMARY KEY (`id_kebutuhan`);

--
-- Indexes for table `tb_kreativitas`
--
ALTER TABLE `tb_kreativitas`
  ADD PRIMARY KEY (`id_kreativitas`);

--
-- Indexes for table `tb_lembaga_penelitian`
--
ALTER TABLE `tb_lembaga_penelitian`
  ADD PRIMARY KEY (`id_lembaga_penelitian`);

--
-- Indexes for table `tb_peneliti`
--
ALTER TABLE `tb_peneliti`
  ADD PRIMARY KEY (`id_peneliti`),
  ADD KEY `id_lembaga_penelitian` (`id_lembaga_penelitian`);

--
-- Indexes for table `tb_penelitian`
--
ALTER TABLE `tb_penelitian`
  ADD PRIMARY KEY (`id_penelitian`),
  ADD KEY `id_lembaga_penelitian` (`id_lembaga_penelitian`);

--
-- Indexes for table `tb_peneliti_penelitian`
--
ALTER TABLE `tb_peneliti_penelitian`
  ADD PRIMARY KEY (`id_peneliti_penelitian`),
  ADD KEY `id_penelitian` (`id_penelitian`),
  ADD KEY ` id_peneliti` (` id_peneliti`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tb_akun`
--
ALTER TABLE `tb_akun`
  MODIFY `id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `tb_bidang_peneliti`
--
ALTER TABLE `tb_bidang_peneliti`
  MODIFY `id_bidang_peneliti` int(5) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tb_bidang_penelitian`
--
ALTER TABLE `tb_bidang_penelitian`
  MODIFY `id_bidang_penelitian` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `tb_blog_saran`
--
ALTER TABLE `tb_blog_saran`
  MODIFY `id_saran` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `tb_haki`
--
ALTER TABLE `tb_haki`
  MODIFY `id_haki` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `tb_info_kkn`
--
ALTER TABLE `tb_info_kkn`
  MODIFY `id_info_kkn` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `tb_inovasi_opd`
--
ALTER TABLE `tb_inovasi_opd`
  MODIFY `id_inovasi_opd` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `tb_kebutuhan_riset`
--
ALTER TABLE `tb_kebutuhan_riset`
  MODIFY `id_kebutuhan` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `tb_kreativitas`
--
ALTER TABLE `tb_kreativitas`
  MODIFY `id_kreativitas` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `tb_lembaga_penelitian`
--
ALTER TABLE `tb_lembaga_penelitian`
  MODIFY `id_lembaga_penelitian` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `tb_peneliti`
--
ALTER TABLE `tb_peneliti`
  MODIFY `id_peneliti` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `tb_penelitian`
--
ALTER TABLE `tb_penelitian`
  MODIFY `id_penelitian` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `tb_peneliti_penelitian`
--
ALTER TABLE `tb_peneliti_penelitian`
  MODIFY `id_peneliti_penelitian` int(5) NOT NULL AUTO_INCREMENT;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `tb_bidang_peneliti`
--
ALTER TABLE `tb_bidang_peneliti`
  ADD CONSTRAINT `tb_bidang_peneliti_ibfk_1` FOREIGN KEY (`id_bidang_penelitian`) REFERENCES `tb_bidang_penelitian` (`id_bidang_penelitian`),
  ADD CONSTRAINT `tb_bidang_peneliti_ibfk_2` FOREIGN KEY (`id_peneliti`) REFERENCES `tb_peneliti` (`id_peneliti`);

--
-- Constraints for table `tb_peneliti`
--
ALTER TABLE `tb_peneliti`
  ADD CONSTRAINT `tb_peneliti_ibfk_1` FOREIGN KEY (`id_lembaga_penelitian`) REFERENCES `tb_lembaga_penelitian` (`id_lembaga_penelitian`);

--
-- Constraints for table `tb_penelitian`
--
ALTER TABLE `tb_penelitian`
  ADD CONSTRAINT `tb_penelitian_ibfk_1` FOREIGN KEY (`id_lembaga_penelitian`) REFERENCES `tb_lembaga_penelitian` (`id_lembaga_penelitian`);

--
-- Constraints for table `tb_peneliti_penelitian`
--
ALTER TABLE `tb_peneliti_penelitian`
  ADD CONSTRAINT `tb_peneliti_penelitian_ibfk_1` FOREIGN KEY (`id_penelitian`) REFERENCES `tb_penelitian` (`id_penelitian`),
  ADD CONSTRAINT `tb_peneliti_penelitian_ibfk_2` FOREIGN KEY (` id_peneliti`) REFERENCES `tb_peneliti` (`id_peneliti`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
