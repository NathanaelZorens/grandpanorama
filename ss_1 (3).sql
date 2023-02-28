-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 01, 2023 at 12:14 AM
-- Server version: 10.4.27-MariaDB
-- PHP Version: 8.2.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ss_1`
--

-- --------------------------------------------------------

--
-- Table structure for table `lahan_tb`
--

CREATE TABLE `lahan_tb` (
  `id_lhn` varchar(200) NOT NULL,
  `luas_bangunan_u` int(11) DEFAULT NULL,
  `luas_tanah_u` int(11) DEFAULT NULL,
  `id_lo` varchar(15) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `lahan_tb`
--

INSERT INTO `lahan_tb` (`id_lhn`, `luas_bangunan_u`, `luas_tanah_u`, `id_lo`) VALUES
('B2-5', 45, 148, 'GV'),
('F2-2', 40, 81, 'GP3'),
('F2-3', 40, 81, 'GP3'),
('F2-4', 40, 81, 'GP3'),
('F2-5', 40, 81, 'GP3'),
('F2-6', 40, 81, 'GP3'),
('F5-2', 40, 78, 'GP3'),
('F5-3', 40, 78, 'GP3'),
('F5-4', 40, 78, 'GP3');

-- --------------------------------------------------------

--
-- Table structure for table `lokasi_tb`
--

CREATE TABLE `lokasi_tb` (
  `id_lo` varchar(25) DEFAULT NULL,
  `nama_lo` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `lokasi_tb`
--

INSERT INTO `lokasi_tb` (`id_lo`, `nama_lo`) VALUES
('GP', 'Grand Panorama'),
('GV', 'Grand Valley'),
('GP3', 'Grand Panorama 3');

-- --------------------------------------------------------

--
-- Table structure for table `pilihan_tb`
--

CREATE TABLE `pilihan_tb` (
  `id_pil` int(255) NOT NULL,
  `id_usr` varchar(255) DEFAULT NULL,
  `id_u` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `pilihan_tb`
--

INSERT INTO `pilihan_tb` (`id_pil`, `id_usr`, `id_u`) VALUES
(29, 'test', '40X81'),
(30, 'iamironman', '148X45(HOOK)');

-- --------------------------------------------------------

--
-- Table structure for table `unit_tb`
--

CREATE TABLE `unit_tb` (
  `id_u` varchar(100) NOT NULL,
  `luas_tanah_u` int(100) NOT NULL,
  `luas_bangunan_u` int(100) NOT NULL,
  `harga_u` int(255) NOT NULL,
  `tanda_jadi_u` int(255) NOT NULL,
  `dp_u` int(255) NOT NULL,
  `kpr_u` int(255) NOT NULL,
  `angsuran_5_u` int(255) NOT NULL,
  `angsuran_10_u` int(255) NOT NULL,
  `angsuran_15_u` int(255) NOT NULL,
  `gambar_u` varchar(255) DEFAULT NULL,
  `denah_u` varchar(255) DEFAULT NULL,
  `ket_u` varchar(255) DEFAULT NULL,
  `id_lo` varchar(10) DEFAULT NULL,
  `hook_ket_u` varchar(3) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `unit_tb`
--

INSERT INTO `unit_tb` (`id_u`, `luas_tanah_u`, `luas_bangunan_u`, `harga_u`, `tanda_jadi_u`, `dp_u`, `kpr_u`, `angsuran_5_u`, `angsuran_10_u`, `angsuran_15_u`, `gambar_u`, `denah_u`, `ket_u`, `id_lo`, `hook_ket_u`) VALUES
('148X45(HOOK)', 148, 45, 663000000, 3000000, 33150000, 626850000, 13075000, 7979000, 6389000, 'assets/unit_image/6304609f500f1.png', 'assets/unit_image/6304609f50323.png', 'Asumsi DP=5%', 'GV', 'Yes'),
('40X78', 78, 40, 515000000, 3000000, 100000000, 412000000, 8552000, 5219000, 4179000, 'assets/unit_image/62ee290987ba3.png', 'assets/unit_image/62ee290989d5b.png', '', 'GP3', 'No'),
('40X81', 81, 40, 515000000, 3000000, 100000000, 412000000, 8552000, 5219000, 4179000, 'assets/unit_image/63045b25d5146.png', 'assets/unit_image/63045b25d54cc.png', '', 'GP3', 'No');

-- --------------------------------------------------------

--
-- Table structure for table `user_tb`
--

CREATE TABLE `user_tb` (
  `id_usr` varchar(100) NOT NULL,
  `nama_usr` varchar(255) NOT NULL,
  `nik_usr` varchar(16) NOT NULL,
  `telp_usr` varchar(20) NOT NULL,
  `id_pil` int(255) DEFAULT 0,
  `pass_usr` varchar(255) DEFAULT NULL,
  `status_usr` varchar(25) DEFAULT 'user'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `user_tb`
--

INSERT INTO `user_tb` (`id_usr`, `nama_usr`, `nik_usr`, `telp_usr`, `id_pil`, `pass_usr`, `status_usr`) VALUES
('admin1', 'Administrator1', '1111111', '1111111', 17, '$2y$10$RX4kaBVdx2nnFtXZoozX5uGeAmIInmIqFc8PN0zoWIbXcs1CvkdU2', 'admin'),
('admingp', 'Admin Grand Panorama', '111', '111', 0, '$2y$10$yR4JYI.X1KHypi3fvEWmweLIyYK8vsbSBioh6Sjyjga4J1gTzzWMe', 'admin'),
('iamironman', 'Tony Stark', '30003000', '00030003', 30, '$2y$10$GgkqcRnEuk/JSUG9ZjhufOlQDbGvwZne6LhYTWO6jGowJQJHrMRzu', 'user'),
('test', 'Test User', '0000000000000000', '000777000777', 29, '$2y$10$awkNPCrkOLvjsCvxCVpHzehO9w6/j4G/rILP8UC9isEA0UnWLEvH2', 'user'),
('test2', 'test 2', '222', '222', 25, '$2y$10$xgpvolrNXM/.1A7usrecAeJFVQN7E8LqQgM7BCHHsIGtaMI2g/0f6', 'user');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `lahan_tb`
--
ALTER TABLE `lahan_tb`
  ADD PRIMARY KEY (`id_lhn`);

--
-- Indexes for table `pilihan_tb`
--
ALTER TABLE `pilihan_tb`
  ADD PRIMARY KEY (`id_pil`);

--
-- Indexes for table `unit_tb`
--
ALTER TABLE `unit_tb`
  ADD PRIMARY KEY (`id_u`);

--
-- Indexes for table `user_tb`
--
ALTER TABLE `user_tb`
  ADD PRIMARY KEY (`id_usr`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `pilihan_tb`
--
ALTER TABLE `pilihan_tb`
  MODIFY `id_pil` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
