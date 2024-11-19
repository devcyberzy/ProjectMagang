-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 23, 2024 at 01:57 PM
-- Server version: 10.4.25-MariaDB
-- PHP Version: 7.4.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `lembur_kary`
--

-- --------------------------------------------------------

--
-- Table structure for table `daftar_hadir`
--

CREATE TABLE `daftar_hadir` (
  `id_daftar` int(11) NOT NULL,
  `id_peg` varchar(50) DEFAULT NULL,
  `id_jab` varchar(50) DEFAULT NULL,
  `tgl` date DEFAULT NULL,
  `jam_mulai` time DEFAULT NULL,
  `jam_selesai` time DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `daftar_hadir`
--

INSERT INTO `daftar_hadir` (`id_daftar`, `id_peg`, `id_jab`, `tgl`, `jam_mulai`, `jam_selesai`) VALUES
(1, '1', '1', '2024-02-03', '08:00:00', '12:00:00'),
(2, '1', '1', '2024-02-04', '08:00:00', '12:00:00'),
(3, '1', '1', '2024-02-11', '08:00:00', '12:00:00'),
(4, '2', '2', '2024-02-03', '08:00:00', '12:00:00'),
(5, '2', '2', '2024-02-04', '08:00:00', '12:00:00'),
(6, '2', '2', '2024-02-11', '08:00:00', '12:00:00'),
(7, '5', '5', '2024-02-03', '08:00:00', '12:00:00'),
(8, '5', '5', '2024-02-04', '08:00:00', '12:00:00'),
(9, '5', '5', '2024-02-11', '08:00:00', '12:00:00'),
(10, '4', '4', '2024-02-03', '08:00:00', '12:00:00'),
(11, '4', '4', '2024-02-04', '08:00:00', '12:00:00'),
(12, '4', '4', '2024-02-04', '08:00:00', '12:00:00'),
(13, '4', '4', '2024-02-11', '08:00:00', '12:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `data_pegawai`
--

CREATE TABLE `data_pegawai` (
  `id_peg` int(11) NOT NULL,
  `nama_peg` varchar(50) DEFAULT NULL,
  `nip` varchar(50) DEFAULT NULL,
  `id_gol` varchar(50) DEFAULT NULL,
  `id_jab` varchar(100) DEFAULT NULL,
  `unit_kerja` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `data_pegawai`
--

INSERT INTO `data_pegawai` (`id_peg`, `nama_peg`, `nip`, `id_gol`, `id_jab`, `unit_kerja`) VALUES
(1, 'Dr. Bambang Supriyanto, S.H., M.Hum., CGCAE.', 'NIP. 19641214 198603 1 009', '1', '1', 'Inspektur Daerah'),
(2, 'Agung Widodo, S.STP., M.Si.', 'NIP. 19780617 199802 1 001', '2', '2', 'Inspektur Daerah'),
(3, 'Iwan Winarso, S.E.,M.M.', 'NIP. 19800702 200501 1 006', '3', '3', 'Inspektur Daerah '),
(4, 'Siti Purwanti, S.E., M.Acc.', 'NIP. 19810518 200501 2 015', '4', '4', 'Inspektur Daerah'),
(5, 'Diyah Sismartini, S.Sos., M.M.', 'NIP. 19750921 200901 2 002', '5', '5', 'Inspektur Daerah'),
(6, 'Isyana Noviana Fasa, A.Md', 'NIP. 19851128 202012 2 002', '6', '6', 'Inspektur Daerah'),
(7, 'Nur Latifah Hajriyani, SP', 'NIP. 19960519 202421 2 029', '7', '7', 'Inspektur Daerah'),
(8, 'Ramelan', 'NIP. 19690924 200701 1 010', '8', '8', 'Inspektur Daerah'),
(9, 'Edi Waosan', 'NIP. 19841022 200901 1 006', '9', '9', 'Inspektur Daerah');

-- --------------------------------------------------------

--
-- Table structure for table `golongan`
--

CREATE TABLE `golongan` (
  `id_gol` int(11) NOT NULL,
  `nama_gol` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `golongan`
--

INSERT INTO `golongan` (`id_gol`, `nama_gol`) VALUES
(1, 'Pembina Utama Muda (IV/c) '),
(2, 'Pembina Tingkat I (IV/b)'),
(3, 'Pembina (IV/a)'),
(4, 'Penata (III/c)'),
(5, 'Penata Tingkat 1 (III/d)'),
(6, 'Pengatur (II/c)'),
(7, 'IX'),
(8, 'Penata Muda (III/a)'),
(9, 'Pengatur Muda ((II/a)'),
(11, 'Pembina (IV/b)'),
(12, 'Pembina Tingkat I (IV/c)'),
(16, 'Penata Muda (III/b)'),
(19, 'Penata Muda Tingkat I (III/c)'),
(20, 'Pembina Tk.I (IV/b)'),
(21, 'Penata Muda Tingkat I (III/c)'),
(23, 'Penata Muda Tingkat I (III/b)'),
(24, 'Pembina Utama Muda  (IV/c)'),
(25, 'Penata (III/d)');

-- --------------------------------------------------------

--
-- Table structure for table `jabatan`
--

CREATE TABLE `jabatan` (
  `id_jab` int(11) NOT NULL,
  `nama_jab` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `jabatan`
--

INSERT INTO `jabatan` (`id_jab`, `nama_jab`) VALUES
(1, 'Inspektur Daerah'),
(2, 'Sekretaris Inspektorat'),
(3, 'Kasubag Perencanaan'),
(4, 'Kasubag Analisis Evaluasi'),
(5, 'Kasubag Administrasi'),
(6, 'Bendahara'),
(7, 'Arsiparis Ahli Pertama'),
(8, 'JFU'),
(9, 'Pramu Bakti'),
(10, 'Irban Bidang Pengawasan Khusus (Irbansus)'),
(14, 'Auditor Ahli Madya'),
(15, 'PPUPD Ahli Madya'),
(16, 'PPUPD Ahli Muda'),
(17, 'Auditor Ahli Muda'),
(18, 'Auditor Ahli Pertama'),
(19, 'Irban bidang Pengawasan Penyelengaraan Urusan Pemerintahan Daerah (PPUPD) dan Pemerintahan Desa'),
(20, 'Plt. Irban Bidang Pegangawasan Akuntabilitas Keuangan Daerah dan Pemerintahan Desa'),
(21, 'Irban bidang Pengawasan  Kinerja Perangkat Daerah, BUMD, dan Reformasi Birokrasi');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id_user` int(11) NOT NULL,
  `nama_user` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `level` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id_user`, `nama_user`, `email`, `password`, `level`) VALUES
(1, 'Admin', 'inspektorat@gmail.com', '3e76256fbd4a932c2e08025197ad698c7791310f', 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `daftar_hadir`
--
ALTER TABLE `daftar_hadir`
  ADD PRIMARY KEY (`id_daftar`);

--
-- Indexes for table `data_pegawai`
--
ALTER TABLE `data_pegawai`
  ADD PRIMARY KEY (`id_peg`);

--
-- Indexes for table `golongan`
--
ALTER TABLE `golongan`
  ADD PRIMARY KEY (`id_gol`);

--
-- Indexes for table `jabatan`
--
ALTER TABLE `jabatan`
  ADD PRIMARY KEY (`id_jab`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id_user`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `daftar_hadir`
--
ALTER TABLE `daftar_hadir`
  MODIFY `id_daftar` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `data_pegawai`
--
ALTER TABLE `data_pegawai`
  MODIFY `id_peg` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `golongan`
--
ALTER TABLE `golongan`
  MODIFY `id_gol` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT for table `jabatan`
--
ALTER TABLE `jabatan`
  MODIFY `id_jab` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
