-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 05, 2023 at 11:47 PM
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
  `role` enum('Bappeda','SKPD') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tb_akun`
--

INSERT INTO `tb_akun` (`id`, `username`, `password`, `nama`, `role`) VALUES
(1, 'adminbappeda', '202cb962ac59075b964b07152d234b70', 'Admin BAPPEDA', 'Bappeda'),
(2, 'adminskpd', 'caf1a3dfb505ffed0d024130f58c5cfa', 'Admin SKPD', 'SKPD');

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
-- Table structure for table `tb_info_kerja_nyata`
--

CREATE TABLE `tb_info_kerja_nyata` (
  `id_info_kerja_nyata` int(5) NOT NULL,
  `intansi` varchar(100) NOT NULL,
  `lokasi` text NOT NULL,
  `link_gmap` varchar(200) NOT NULL,
  `pelaksanaan` varchar(100) NOT NULL,
  `hasil` text NOT NULL,
  `peserta` text NOT NULL,
  `masa_magang` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tb_info_kerja_nyata`
--

INSERT INTO `tb_info_kerja_nyata` (`id_info_kerja_nyata`, `intansi`, `lokasi`, `link_gmap`, `pelaksanaan`, `hasil`, `peserta`, `masa_magang`) VALUES
(2, 'intansi', 'lokasi', 'link', 'pelaksanaan', 'hasil', '1. peserta\r\n2. peserta\r\n3. peserta', 'masa');

-- --------------------------------------------------------

--
-- Table structure for table `tb_inovasi_skpd`
--

CREATE TABLE `tb_inovasi_skpd` (
  `id_inovasi_skpd` int(5) NOT NULL,
  `judul_inovasi` text NOT NULL,
  `tahun_inovasi` varchar(100) NOT NULL,
  `latar_belakang` text NOT NULL,
  `tujuan` text NOT NULL,
  `manfaat` text NOT NULL,
  `status` enum('Terlaksana','Tidak Terlaksana') NOT NULL,
  `progress` enum('Ekspose Awal','Ekspose Akhir') NOT NULL,
  `id_skpd` int(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tb_inovasi_skpd`
--

INSERT INTO `tb_inovasi_skpd` (`id_inovasi_skpd`, `judul_inovasi`, `tahun_inovasi`, `latar_belakang`, `tujuan`, `manfaat`, `status`, `progress`, `id_skpd`) VALUES
(2, '1', '2', 'w3', 'w4', 'w5', 'Tidak Terlaksana', 'Ekspose Awal', 2);

-- --------------------------------------------------------

--
-- Table structure for table `tb_kebutuhan_riset`
--

CREATE TABLE `tb_kebutuhan_riset` (
  `id_kebutuhan` int(5) NOT NULL,
  `judul` text NOT NULL,
  `tujuan` text NOT NULL,
  `sasaran` text NOT NULL,
  `kontak` text NOT NULL,
  `deskripsi` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tb_kebutuhan_riset`
--

INSERT INTO `tb_kebutuhan_riset` (`id_kebutuhan`, `judul`, `tujuan`, `sasaran`, `kontak`, `deskripsi`) VALUES
(1, 'judul', 'tujuan', 'manfaat', 'info', 'a');

-- --------------------------------------------------------

--
-- Table structure for table `tb_kreativitas`
--

CREATE TABLE `tb_kreativitas` (
  `id_kreativitas` int(5) NOT NULL,
  `nama_kreativitas` text NOT NULL,
  `kreator` text NOT NULL,
  `deskripsi` text NOT NULL,
  `status` enum('Terlaksana','Tidak Terlaksana') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tb_kreativitas`
--

INSERT INTO `tb_kreativitas` (`id_kreativitas`, `nama_kreativitas`, `kreator`, `deskripsi`, `status`) VALUES
(1, 'nama', 'kreator', 'deskripsi', 'Terlaksana');

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
  `jenis_penelitian` enum('Penelitian','Publikasi','Kajian','Desiminasi','Fasilitasi') NOT NULL,
  `judul_penelitian` varchar(200) NOT NULL,
  `tahun_penelitian` varchar(10) NOT NULL,
  `abstrak_penelitian` text NOT NULL,
  `peneliti` text NOT NULL,
  `id_lembaga_penelitian` int(5) NOT NULL,
  `waktu_pelaksanaan` varchar(100) NOT NULL,
  `status` enum('Terlaksana','Tidak Terlaksana') NOT NULL,
  `progress` enum('Ekspose Awal','Ekspose Akhir') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tb_penelitian`
--

INSERT INTO `tb_penelitian` (`id_penelitian`, `jenis_penelitian`, `judul_penelitian`, `tahun_penelitian`, `abstrak_penelitian`, `peneliti`, `id_lembaga_penelitian`, `waktu_pelaksanaan`, `status`, `progress`) VALUES
(1, 'Publikasi', 'judul', '2020', 'abstrak', 'susanto', 1, '222', 'Terlaksana', 'Ekspose Awal');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tb_akun`
--
ALTER TABLE `tb_akun`
  ADD PRIMARY KEY (`id`);

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
-- Indexes for table `tb_info_kerja_nyata`
--
ALTER TABLE `tb_info_kerja_nyata`
  ADD PRIMARY KEY (`id_info_kerja_nyata`);

--
-- Indexes for table `tb_inovasi_skpd`
--
ALTER TABLE `tb_inovasi_skpd`
  ADD PRIMARY KEY (`id_inovasi_skpd`);

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
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tb_akun`
--
ALTER TABLE `tb_akun`
  MODIFY `id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `tb_blog_saran`
--
ALTER TABLE `tb_blog_saran`
  MODIFY `id_saran` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `tb_haki`
--
ALTER TABLE `tb_haki`
  MODIFY `id_haki` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `tb_info_kerja_nyata`
--
ALTER TABLE `tb_info_kerja_nyata`
  MODIFY `id_info_kerja_nyata` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `tb_inovasi_skpd`
--
ALTER TABLE `tb_inovasi_skpd`
  MODIFY `id_inovasi_skpd` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `tb_kebutuhan_riset`
--
ALTER TABLE `tb_kebutuhan_riset`
  MODIFY `id_kebutuhan` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `tb_kreativitas`
--
ALTER TABLE `tb_kreativitas`
  MODIFY `id_kreativitas` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `tb_lembaga_penelitian`
--
ALTER TABLE `tb_lembaga_penelitian`
  MODIFY `id_lembaga_penelitian` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `tb_peneliti`
--
ALTER TABLE `tb_peneliti`
  MODIFY `id_peneliti` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `tb_penelitian`
--
ALTER TABLE `tb_penelitian`
  MODIFY `id_penelitian` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- Constraints for dumped tables
--

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
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
