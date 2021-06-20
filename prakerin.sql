-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 20, 2021 at 02:04 PM
-- Server version: 10.4.19-MariaDB
-- PHP Version: 7.4.20

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `prakerin`
--

-- --------------------------------------------------------

--
-- Table structure for table `m_admin`
--

CREATE TABLE `m_admin` (
  `id_admin` int(9) NOT NULL,
  `nama` varchar(256) NOT NULL,
  `email` varchar(256) NOT NULL,
  `password` varchar(256) NOT NULL,
  `publish` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `m_admin`
--

INSERT INTO `m_admin` (`id_admin`, `nama`, `email`, `password`, `publish`) VALUES
(2, 'admin', 'admin@gmail.com', '123', 0);

-- --------------------------------------------------------

--
-- Table structure for table `m_guru`
--

CREATE TABLE `m_guru` (
  `id_guru` int(11) NOT NULL,
  `nik` varchar(20) NOT NULL,
  `nama` varchar(256) NOT NULL,
  `email` varchar(256) NOT NULL,
  `password` varchar(256) NOT NULL,
  `publish` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `m_guru`
--

INSERT INTO `m_guru` (`id_guru`, `nik`, `nama`, `email`, `password`, `publish`) VALUES
(4, '02', 'dev-guru', 'dev-guru@prakerin.com', '123', 1);

-- --------------------------------------------------------

--
-- Table structure for table `m_siswa`
--

CREATE TABLE `m_siswa` (
  `id_siswa` int(9) NOT NULL,
  `nis` varchar(12) NOT NULL,
  `nama` varchar(256) NOT NULL,
  `email` varchar(256) NOT NULL,
  `password` varchar(256) NOT NULL,
  `alamat` varchar(256) NOT NULL,
  `ttl` varchar(256) NOT NULL,
  `publish` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `m_siswa`
--

INSERT INTO `m_siswa` (`id_siswa`, `nis`, `nama`, `email`, `password`, `alamat`, `ttl`, `publish`) VALUES
(13, '01', 'dev-siswa', 'dev-siswa@prakerin.com', '123', 'dev-siswa-alamat', 'dev-siswa-ttl', 1),
(14, '02', 'dev-siswa-2', 'dev-siswa-2@prakerin.com', '123', 'dev-siswa-2-alamat', 'dev-siswa-2-ttl', 1),
(15, '03', 'dev-siswa-3', 'dev-siswa-3@prakerin.com', '123', 'dev-siswa-3-alamat', 'dev-siswa-3-ttl', 1);

-- --------------------------------------------------------

--
-- Table structure for table `m_tata_usaha`
--

CREATE TABLE `m_tata_usaha` (
  `id_tu` int(9) NOT NULL,
  `nik` varchar(20) NOT NULL,
  `nama` varchar(256) NOT NULL,
  `email` varchar(256) NOT NULL,
  `password` varchar(256) NOT NULL,
  `publish` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `m_tata_usaha`
--

INSERT INTO `m_tata_usaha` (`id_tu`, `nik`, `nama`, `email`, `password`, `publish`) VALUES
(3, '03', 'dev-karyawan', 'dev-karyawan@prakerin.com', '123', 1);

-- --------------------------------------------------------

--
-- Table structure for table `m_users`
--

CREATE TABLE `m_users` (
  `id` int(9) NOT NULL,
  `id_user` varchar(20) NOT NULL,
  `no_identitas` varchar(256) NOT NULL,
  `email` varchar(256) NOT NULL,
  `password` varchar(256) NOT NULL,
  `role` enum('admin','guru','tata_usaha','siswa') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `m_users`
--

INSERT INTO `m_users` (`id`, `id_user`, `no_identitas`, `email`, `password`, `role`) VALUES
(1, '2', '123', 'admin@gmail.com', '123', 'admin'),
(15, '13', '01', 'dev-siswa@prakerin.com', '123', 'siswa'),
(16, '4', '02', 'dev-guru@prakerin.com', '123', 'guru'),
(17, '3', '03', 'dev-karyawan@prakerin.com', '123', 'tata_usaha'),
(18, '14', '02', 'dev-siswa-2@prakerin.com', '123', 'siswa'),
(19, '15', '03', 'dev-siswa-3@prakerin.com', '123', 'siswa');

-- --------------------------------------------------------

--
-- Table structure for table `pendaftaran`
--

CREATE TABLE `pendaftaran` (
  `id_pendaftaran` int(11) NOT NULL,
  `id_siswa` int(9) NOT NULL,
  `publish` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `praktik`
--

CREATE TABLE `praktik` (
  `id_praktik` int(11) NOT NULL,
  `id_siswa` int(9) NOT NULL,
  `is_group` int(1) NOT NULL,
  `members` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin NOT NULL CHECK (json_valid(`members`)),
  `nama_instansi` text NOT NULL,
  `alamat_instansi` text NOT NULL,
  `publish` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `m_admin`
--
ALTER TABLE `m_admin`
  ADD PRIMARY KEY (`id_admin`);

--
-- Indexes for table `m_guru`
--
ALTER TABLE `m_guru`
  ADD PRIMARY KEY (`id_guru`);

--
-- Indexes for table `m_siswa`
--
ALTER TABLE `m_siswa`
  ADD PRIMARY KEY (`id_siswa`);

--
-- Indexes for table `m_tata_usaha`
--
ALTER TABLE `m_tata_usaha`
  ADD PRIMARY KEY (`id_tu`);

--
-- Indexes for table `m_users`
--
ALTER TABLE `m_users`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pendaftaran`
--
ALTER TABLE `pendaftaran`
  ADD PRIMARY KEY (`id_pendaftaran`);

--
-- Indexes for table `praktik`
--
ALTER TABLE `praktik`
  ADD PRIMARY KEY (`id_praktik`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `m_admin`
--
ALTER TABLE `m_admin`
  MODIFY `id_admin` int(9) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `m_guru`
--
ALTER TABLE `m_guru`
  MODIFY `id_guru` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `m_siswa`
--
ALTER TABLE `m_siswa`
  MODIFY `id_siswa` int(9) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `m_tata_usaha`
--
ALTER TABLE `m_tata_usaha`
  MODIFY `id_tu` int(9) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `m_users`
--
ALTER TABLE `m_users`
  MODIFY `id` int(9) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `pendaftaran`
--
ALTER TABLE `pendaftaran`
  MODIFY `id_pendaftaran` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `praktik`
--
ALTER TABLE `praktik`
  MODIFY `id_praktik` int(11) NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
