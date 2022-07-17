-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 30, 2019 at 12:40 AM
-- Server version: 10.1.38-MariaDB
-- PHP Version: 7.3.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `sikosma`
--

-- --------------------------------------------------------

--
-- Table structure for table `akun`
--

CREATE TABLE `akun` (
  `id_akun` char(10) NOT NULL,
  `id_akses` int(11) DEFAULT NULL,
  `nama` varchar(100) DEFAULT NULL,
  `email` varchar(40) DEFAULT NULL,
  `jenis_kelamin` char(2) DEFAULT NULL,
  `tempat_lahir` varchar(40) DEFAULT NULL,
  `tanggal_lahir` date DEFAULT NULL,
  `password` varchar(30) DEFAULT NULL,
  `telp` varchar(13) DEFAULT NULL,
  `alamat` text,
  `status` enum('belum','verifikasi','blokir','') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `akun`
--

INSERT INTO `akun` (`id_akun`, `id_akses`, `nama`, `email`, `jenis_kelamin`, `tempat_lahir`, `tanggal_lahir`, `password`, `telp`, `alamat`, `status`) VALUES
('USER001', 1, 'Ach. Faisol S. Arifin', 'faisolofficial99@gmail.com', 'L', 'Sumenep', '1999-11-16', 'admin', '082335685138', 'meddelan lenteng sumenep madura jatim', 'verifikasi'),
('USER002', 2, 'Ach Faisol', 'faisolkaztelo69@gmail.com', 'L', 'Sumenep', '1999-11-16', 'coba', '082335685136', 'Sumenep Madura', 'verifikasi'),
('USER003', 2, 'boy', 'faisolkaztelo69@gmail.com', 'L', 'Jepang', '1999-11-16', 'admin', '082335685138', 'asdf', 'belum'),
('USER004', 2, 'a', 'a@gmail.com', 'L', 'Sumenep', '1999-11-16', 'a', '082335685138', 'asdf', 'belum'),
('USER005', 2, 'afsd', 'f@gmail.com', 'L', 'Sumenep', '1999-11-16', 'f', '082335685138', 'asd', 'belum');

-- --------------------------------------------------------

--
-- Table structure for table `fasilitas`
--

CREATE TABLE `fasilitas` (
  `id_fas` int(11) NOT NULL,
  `nama_fas` varchar(50) DEFAULT NULL,
  `awesome` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `fasilitas`
--

INSERT INTO `fasilitas` (`id_fas`, `nama_fas`, `awesome`) VALUES
(1, 'Wifi', ''),
(2, 'Tv', ''),
(3, 'Kulkas', ''),
(4, 'Lemari', ''),
(5, 'Radio', '');

-- --------------------------------------------------------

--
-- Table structure for table `fasilitas_kamar`
--

CREATE TABLE `fasilitas_kamar` (
  `id_faskos` int(11) NOT NULL,
  `id_kamar` char(30) NOT NULL,
  `id_fas` int(11) DEFAULT NULL,
  `status` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `fasilitas_kamar`
--

INSERT INTO `fasilitas_kamar` (`id_faskos`, `id_kamar`, `id_fas`, `status`) VALUES
(48, 'KMR002', 1, NULL),
(49, 'KMR002', 2, NULL),
(50, 'KMR003', 1, NULL),
(51, 'KMR003', 2, NULL),
(52, 'KMR004', 1, NULL),
(53, 'KMR004', 2, NULL),
(54, 'KMR005', 1, NULL),
(55, 'KMR005', 3, NULL),
(102, 'KMR006', 1, NULL),
(103, 'KMR006', 2, NULL),
(104, 'KMR008', 1, NULL),
(105, 'KMR008', 2, NULL),
(106, 'KMR009', 1, NULL),
(107, 'KMR009', 2, NULL),
(108, 'KMR007', 1, NULL),
(109, 'KMR007', 2, NULL),
(110, 'KMR010', 1, NULL),
(111, 'KMR010', 2, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `gambar_kamar`
--

CREATE TABLE `gambar_kamar` (
  `id_gmb` int(11) NOT NULL,
  `id_kamar` char(30) DEFAULT NULL,
  `nama_gmb` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `gambar_kamar`
--

INSERT INTO `gambar_kamar` (`id_gmb`, `id_kamar`, `nama_gmb`) VALUES
(22, 'KMR002', '1566978641Koala.jpg'),
(23, 'KMR002', '1566978641Lighthouse.jpg'),
(24, 'KMR003', '1566978938Penguins.jpg'),
(25, 'KMR003', '1566978938Tulips.jpg'),
(26, 'KMR004', '1566979050Hydrangeas.jpg'),
(27, 'KMR004', '1566979050Penguins.jpg'),
(28, 'KMR005', '1566979118Lighthouse.jpg'),
(29, 'KMR005', '1566979118Penguins.jpg'),
(40, 'KMR006', '1566997497Chrysanthemum.jpg'),
(41, 'KMR006', '1566997497Desert.jpg'),
(42, 'KMR006', '1566997497Hydrangeas.jpg'),
(43, 'KMR006', '1566997497Jellyfish.jpg'),
(72, 'KMR007', '1567036124Group-3.jpg'),
(73, 'KMR007', '1567036124mock_up-c5d0acaf43.jpg'),
(74, 'KMR007', '1567036124Screenshot_2019-04-20-05-45-41.png'),
(75, 'KMR007', '1567036124Screenshot_2019-05-17-17-56-55.png'),
(76, 'KMR008', '1567085927Chrysanthemum.jpg'),
(77, 'KMR008', '1567085927Desert.jpg'),
(78, 'KMR008', '1567085927Hydrangeas.jpg'),
(79, 'KMR008', '1567085927Jellyfish.jpg'),
(80, 'KMR009', '1567086271Screenshot_2019-05-17-17-56-55.png'),
(81, 'KMR009', '1567086271Screenshot_2019-06-30-16-33-30.png'),
(82, 'KMR009', '1567086271Screenshot_2019-07-01-15-27-13.png'),
(83, 'KMR009', '1567086271Untitled.png'),
(84, 'KMR010', '1567086999Group-3.jpg'),
(85, 'KMR010', '1567086999mock_up-c5d0acaf43.jpg'),
(86, 'KMR010', '1567086999Screenshot_2019-04-20-05-45-41.png'),
(87, 'KMR010', '1567086999Screenshot_2019-05-17-17-56-55.png'),
(88, 'KMR010', '1567086999Screenshot_2019-06-30-16-33-30.png');

-- --------------------------------------------------------

--
-- Table structure for table `gambar_kos`
--

CREATE TABLE `gambar_kos` (
  `id_gambar` int(11) NOT NULL,
  `id_kos` char(30) DEFAULT NULL,
  `nama_gambar` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `gambar_kos`
--

INSERT INTO `gambar_kos` (`id_gambar`, `id_kos`, `nama_gambar`) VALUES
(98, 'KOS005', '1567036812Screenshot_2019-06-30-16-33-30.png'),
(99, 'KOS005', '1567036812Screenshot_2019-07-01-15-27-13.png'),
(100, 'KOS005', '1567036812Untitled.png'),
(101, 'KOS005', '1567036812up.jpg'),
(102, 'KOS004', '1567084991Chrysanthemum.jpg'),
(103, 'KOS004', '1567084991Desert.jpg'),
(104, 'KOS004', '1567084991Hydrangeas.jpg'),
(105, 'KOS004', '1567084991Jellyfish.jpg'),
(106, 'KOS006', '1567085868Koala.jpg'),
(107, 'KOS006', '1567085868Lighthouse.jpg'),
(108, 'KOS006', '1567085868Penguins.jpg'),
(109, 'KOS006', '1567085868Tulips.jpg'),
(110, 'KOS007', '1567085974Koala.jpg'),
(111, 'KOS007', '1567085974Lighthouse.jpg'),
(112, 'KOS007', '1567085974Penguins.jpg'),
(113, 'KOS007', '1567085974Tulips.jpg'),
(114, 'KOS008', '1567086483Group-3.jpg'),
(115, 'KOS008', '1567086483mock_up-c5d0acaf43.jpg'),
(116, 'KOS008', '1567086483Screenshot_2019-04-20-05-45-41.png'),
(117, 'KOS008', '1567086483Screenshot_2019-05-17-17-56-55.png'),
(118, 'KOS009', '1567086983Screenshot_2019-05-17-17-56-55.png'),
(119, 'KOS009', '1567086983Screenshot_2019-06-30-16-33-30.png'),
(120, 'KOS009', '1567086983Screenshot_2019-07-01-15-27-13.png'),
(121, 'KOS009', '1567086983Untitled.png');

-- --------------------------------------------------------

--
-- Table structure for table `harga`
--

CREATE TABLE `harga` (
  `id_harga` int(11) NOT NULL,
  `id_kamar` char(30) DEFAULT NULL,
  `harian` int(11) DEFAULT NULL,
  `mingguan` int(11) DEFAULT NULL,
  `bulanan` int(11) DEFAULT NULL,
  `tahunan` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `harga`
--

INSERT INTO `harga` (`id_harga`, `id_kamar`, `harian`, `mingguan`, `bulanan`, `tahunan`) VALUES
(10, 'KMR002', 0, 0, 50000, 0),
(11, 'KMR003', 0, 0, 50000, 0),
(12, 'KMR004', 0, 0, 50000, 0),
(13, 'KMR005', 0, 0, 50000, 0),
(15, 'KMR006', 0, 0, 50000, 0),
(16, 'KMR007', 0, 0, 50000, 0),
(17, 'KMR008', 0, 0, 50000, 0),
(18, 'KMR009', 0, 0, 50000, 0),
(19, 'KMR010', 0, 0, 50000, 0);

-- --------------------------------------------------------

--
-- Table structure for table `kamar`
--

CREATE TABLE `kamar` (
  `id_kamar` char(30) NOT NULL,
  `id_kos` char(30) DEFAULT NULL,
  `jumlah` int(11) DEFAULT NULL,
  `luas` varchar(20) DEFAULT NULL,
  `deskripsi` text
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `kamar`
--

INSERT INTO `kamar` (`id_kamar`, `id_kos`, `jumlah`, `luas`, `deskripsi`) VALUES
('KMR002', 'KOS004', 5, '5x7', 'asdfsa'),
('KMR003', 'KOS005', 5, '5x7', 'safdsa'),
('KMR004', 'KOS005', 7, '5x6', 'sdfasdf'),
('KMR005', 'KOS005', 7, '5x6', 'sadfa'),
('KMR006', 'KOS004', 5, '5x7', 'asdfasd'),
('KMR007', 'KOS004', 5, '5x7', 'asdf'),
('KMR008', 'KOS006', 2, '5x7', 'asdfasdf'),
('KMR009', 'KOS007', 5, '7x7', 'sdafdsaf'),
('KMR010', 'KOS009', 2, '7x7', 'asdfasd');

-- --------------------------------------------------------

--
-- Table structure for table `kategori`
--

CREATE TABLE `kategori` (
  `id_kat` int(11) NOT NULL,
  `nama_kat` varchar(30) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `kategori`
--

INSERT INTO `kategori` (`id_kat`, `nama_kat`) VALUES
(1, 'Laki - Laki'),
(2, 'Perempuan'),
(3, 'Campuran'),
(4, 'Baru Nyobak');

-- --------------------------------------------------------

--
-- Table structure for table `kos`
--

CREATE TABLE `kos` (
  `id_kos` char(30) NOT NULL,
  `id_akun` char(10) DEFAULT NULL,
  `id_kat` int(11) DEFAULT NULL,
  `nama` varchar(100) DEFAULT NULL,
  `umur_kos` int(11) DEFAULT NULL,
  `jam_tamu` varchar(10) DEFAULT NULL,
  `pelihara_bnt` varchar(10) DEFAULT NULL,
  `deskripsi` text,
  `alamat` text
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `kos`
--

INSERT INTO `kos` (`id_kos`, `id_akun`, `id_kat`, `nama`, `umur_kos`, `jam_tamu`, `pelihara_bnt`, `deskripsi`, `alamat`) VALUES
('KOS004', 'USER002', 1, 'hjjj', 3, 'Bebas', 'Ya', 'ggiugig', 'hghjghj'),
('KOS005', 'USER002', 1, 'haji faisol', 4, 'Dibatasi', 'Tidak', 'asdfasd', 'asdfasd'),
('KOS006', 'USER001', 1, 'Kos Muslim', 5, 'Bebas', 'Ya', 'asdf', 'asdf'),
('KOS007', 'USER001', 1, 'Kos Murah', 5, 'Bebas', 'Ya', 'asdf', 'asdf'),
('KOS008', 'USER001', 1, 'Kos Al-Mukmin', 3, 'Bebas', 'Ya', 'safdasd', 'asdf'),
('KOS009', 'USER002', 1, 'Ach. Faisol S. Arifin', 3, 'Bebas', 'Ya', 'asdf', 'asdf');

-- --------------------------------------------------------

--
-- Table structure for table `level`
--

CREATE TABLE `level` (
  `id_akses` int(11) NOT NULL,
  `akses_user` varchar(30) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `level`
--

INSERT INTO `level` (`id_akses`, `akses_user`) VALUES
(1, 'admin'),
(2, 'member');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `akun`
--
ALTER TABLE `akun`
  ADD PRIMARY KEY (`id_akun`),
  ADD KEY `fk_akun_memiliki_level` (`id_akses`);

--
-- Indexes for table `fasilitas`
--
ALTER TABLE `fasilitas`
  ADD PRIMARY KEY (`id_fas`);

--
-- Indexes for table `fasilitas_kamar`
--
ALTER TABLE `fasilitas_kamar`
  ADD PRIMARY KEY (`id_faskos`),
  ADD KEY `id_kamar` (`id_kamar`),
  ADD KEY `id_fas` (`id_fas`);

--
-- Indexes for table `gambar_kamar`
--
ALTER TABLE `gambar_kamar`
  ADD PRIMARY KEY (`id_gmb`),
  ADD KEY `fk_gambar_k_mempunyai_kamar` (`id_kamar`);

--
-- Indexes for table `gambar_kos`
--
ALTER TABLE `gambar_kos`
  ADD PRIMARY KEY (`id_gambar`),
  ADD KEY `id_kos` (`id_kos`);

--
-- Indexes for table `harga`
--
ALTER TABLE `harga`
  ADD PRIMARY KEY (`id_harga`),
  ADD KEY `fk_harga_memberi2_kamar` (`id_kamar`);

--
-- Indexes for table `kamar`
--
ALTER TABLE `kamar`
  ADD PRIMARY KEY (`id_kamar`),
  ADD KEY `fk_kamar_disewakan_kos` (`id_kos`);

--
-- Indexes for table `kategori`
--
ALTER TABLE `kategori`
  ADD PRIMARY KEY (`id_kat`);

--
-- Indexes for table `kos`
--
ALTER TABLE `kos`
  ADD PRIMARY KEY (`id_kos`),
  ADD KEY `fk_kos_mengungga_akun` (`id_akun`),
  ADD KEY `id_kat` (`id_kat`);

--
-- Indexes for table `level`
--
ALTER TABLE `level`
  ADD PRIMARY KEY (`id_akses`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `fasilitas`
--
ALTER TABLE `fasilitas`
  MODIFY `id_fas` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `fasilitas_kamar`
--
ALTER TABLE `fasilitas_kamar`
  MODIFY `id_faskos` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=112;

--
-- AUTO_INCREMENT for table `gambar_kamar`
--
ALTER TABLE `gambar_kamar`
  MODIFY `id_gmb` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=89;

--
-- AUTO_INCREMENT for table `gambar_kos`
--
ALTER TABLE `gambar_kos`
  MODIFY `id_gambar` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=122;

--
-- AUTO_INCREMENT for table `harga`
--
ALTER TABLE `harga`
  MODIFY `id_harga` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `kategori`
--
ALTER TABLE `kategori`
  MODIFY `id_kat` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `akun`
--
ALTER TABLE `akun`
  ADD CONSTRAINT `fk_akun_memiliki_level` FOREIGN KEY (`id_akses`) REFERENCES `level` (`id_akses`);

--
-- Constraints for table `fasilitas_kamar`
--
ALTER TABLE `fasilitas_kamar`
  ADD CONSTRAINT `fasilitas_kamar_ibfk_1` FOREIGN KEY (`id_kamar`) REFERENCES `kamar` (`id_kamar`),
  ADD CONSTRAINT `fasilitas_kamar_ibfk_2` FOREIGN KEY (`id_fas`) REFERENCES `fasilitas` (`id_fas`);

--
-- Constraints for table `gambar_kamar`
--
ALTER TABLE `gambar_kamar`
  ADD CONSTRAINT `fk_gambar_k_mempunyai_kamar` FOREIGN KEY (`id_kamar`) REFERENCES `kamar` (`id_kamar`);

--
-- Constraints for table `gambar_kos`
--
ALTER TABLE `gambar_kos`
  ADD CONSTRAINT `gambar_kos_ibfk_1` FOREIGN KEY (`id_kos`) REFERENCES `kos` (`id_kos`);

--
-- Constraints for table `harga`
--
ALTER TABLE `harga`
  ADD CONSTRAINT `fk_harga_memberi2_kamar` FOREIGN KEY (`id_kamar`) REFERENCES `kamar` (`id_kamar`);

--
-- Constraints for table `kamar`
--
ALTER TABLE `kamar`
  ADD CONSTRAINT `fk_kamar_disewakan_kos` FOREIGN KEY (`id_kos`) REFERENCES `kos` (`id_kos`);

--
-- Constraints for table `kos`
--
ALTER TABLE `kos`
  ADD CONSTRAINT `fk_kos_mengungga_akun` FOREIGN KEY (`id_akun`) REFERENCES `akun` (`id_akun`),
  ADD CONSTRAINT `kos_ibfk_1` FOREIGN KEY (`id_kat`) REFERENCES `kategori` (`id_kat`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
