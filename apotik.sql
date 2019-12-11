-- phpMyAdmin SQL Dump
-- version 4.9.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 11, 2019 at 08:10 PM
-- Server version: 10.4.10-MariaDB
-- PHP Version: 7.3.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `apotik`
--

-- --------------------------------------------------------

--
-- Table structure for table `obat_terjual`
--

CREATE TABLE `obat_terjual` (
  `row_id` int(11) NOT NULL,
  `no_faktur` int(11) NOT NULL,
  `type_penjualan` varchar(25) NOT NULL,
  `kode_obat` int(11) NOT NULL,
  `nama_obat` varchar(50) NOT NULL,
  `jumlah` int(11) NOT NULL,
  `total_harga` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `obat_terjual`
--

INSERT INTO `obat_terjual` (`row_id`, `no_faktur`, `type_penjualan`, `kode_obat`, `nama_obat`, `jumlah`, `total_harga`) VALUES
(1, 1, 'with-resep', 1, 'Ambroxol', 2, 14000),
(2, 1, 'with-resep', 10, 'kapsida', 3, 45000),
(3, 1, 'non-resep', 12, 'antalgin', 2, 7000),
(4, 1, 'non-resep', 15, 'Paracetamol', 3, 15000);

-- --------------------------------------------------------

--
-- Table structure for table `pasien`
--

CREATE TABLE `pasien` (
  `nama` varchar(30) NOT NULL,
  `alamat` varchar(30) NOT NULL,
  `umur` int(3) NOT NULL,
  `pengukuran` varchar(50) DEFAULT NULL,
  `hasil` varchar(50) NOT NULL,
  `tanggal` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pasien`
--

INSERT INTO `pasien` (`nama`, `alamat`, `umur`, `pengukuran`, `hasil`, `tanggal`) VALUES
('Dandi', 'Kendari', 52, 'Asam Urat Pria (3,5 -7,0 mg/dL) Wanita (2,6 - 6,0 ', 'Penyakitan', '2019-09-18'),
('Ranti', 'Wundulako', 21, 'Tekanan Darah (120/80 mmHg)', '105/73 mmHg', '2019-09-26'),
('Ika', 'Silea', 25, 'Gula Darah Puasa (72-126 mg/dL)', '70', '2019-09-26'),
('Nur', 'Wundulako', 46, 'Tekanan Darah (120/80 mmHg)', '105/20', '2019-09-26'),
('Ranti', 'Wundulako', 21, 'Kolesterol (<200 mg/dL)', '200 mg/dl', '2019-10-02'),
('Rudiman', 'Wundulako', 43, 'Tekanan Darah (120/80 mmHg)', '170/20', '2019-10-23'),
('Kasrul', 'Sabiano', 55, 'Kolesterol (<200 mg/dL)', '300mg/dl', '2019-10-23'),
('dandi', 'Taman Kopo Indah 2 Blok 3G No.', 15, 'Gula Darah Puasa (72-126 mg/dL)', 'Positif', '2019-12-10'),
('Dandi', 'Taman Kopo Indah 2 Blok 3G No.', 15, 'Gula Darah Puasa (72-126 mg/dL)', 'Positif', '2019-12-10'),
('Dandi', 'Taman Kopo Indah 2 Blok 3G No.', 15, 'Gula Darah Puasa (72-126 mg/dL)', 'Positif', '2019-12-10'),
('Dandi', 'Taman Kopo Indah 2 Blok 3G No.', 15, 'Gula Darah Puasa (72-126 mg/dL)', 'Positif', '2019-12-10'),
('Dandi', 'Taman Kopo Indah 2 Blok 3G No.', 15, 'Gula Darah Puasa (72-126 mg/dL)', 'Positif', '2019-12-10'),
('Dandi', 'Taman Kopo Indah 2 Blok 3G No.', 15, 'Gula Darah Puasa (72-126 mg/dL)', 'Positif', '2019-12-10'),
('Dandi', 'Taman Kopo Indah 2 Blok 3G No.', 15, 'Gula Darah Puasa (72-126 mg/dL)', 'Positif', '2019-12-10'),
('Dandi', 'Taman Kopo Indah 2 Blok 3G No.', 15, 'Gula Darah Puasa (72-126 mg/dL)', 'Positif', '2019-12-10'),
('Dandi', 'Taman Kopo Indah 2 Blok 3G No.', 15, 'Gula Darah Puasa (72-126 mg/dL)', 'Positif', '2019-12-10'),
('Dandi', 'Taman Kopo Indah 2 Blok 3G No.', 15, 'Gula Darah Puasa (72-126 mg/dL)', 'Positif', '2019-12-10'),
('Dandi', 'Taman Kopo Indah 2 Blok 3G No.', 15, 'Gula Darah Puasa (72-126 mg/dL)', 'Positif', '2019-12-10'),
('Dandi', 'Taman Kopo Indah 2 Blok 3G No.', 15, 'Gula Darah Puasa (72-126 mg/dL)', 'Positif', '2019-12-10'),
('Dandi', 'Taman Kopo Indah 2 Blok 3G No.', 15, 'Gula Darah Puasa (72-126 mg/dL)', 'Positif', '2019-12-10'),
('Dandi', 'Taman Kopo Indah 2 Blok 3G No.', 15, 'Gula Darah Puasa (72-126 mg/dL)', 'Positif', '2019-12-10'),
('Dandi', 'Taman Kopo Indah 2 Blok 3G No.', 15, 'Gula Darah Puasa (72-126 mg/dL)', 'Positif', '2019-12-10'),
('Dandi', 'Taman Kopo Indah 2 Blok 3G No.', 15, 'Gula Darah Puasa (72-126 mg/dL)', 'Positif', '2019-12-10'),
('Dandi', 'Taman Kopo Indah 2 Blok 3G No.', 15, 'Gula Darah Puasa (72-126 mg/dL)', 'Positif', '2019-12-10'),
('Dandi', 'Taman Kopo Indah 2 Blok 3G No.', 15, 'Gula Darah Puasa (72-126 mg/dL)', 'Positif', '2019-12-10'),
('Dandi', 'Taman Kopo Indah 2 Blok 3G No.', 15, 'Gula Darah Puasa (72-126 mg/dL)', 'Positif', '2019-12-10'),
('Dandi', 'Taman Kopo Indah 2 Blok 3G No.', 15, 'Gula Darah Puasa (72-126 mg/dL)', 'Positif', '2019-12-10'),
('dandi', 'Taman Kopo Indah 2 Blok 3G No.', 15, 'Gula Darah Sewaktu/Acak (144-180 mg/dL)', 'Positif', '2019-12-10'),
('Dandi', 'Taman Kopo Indah 2 Blok 3G No.', 15, 'Kolesterol (<200 mg/dL)', 'Positif', '2019-12-10'),
('Dandi', 'Taman Kopo Indah 2 Blok 3G No.', 15, 'Kolesterol (<200 mg/dL)', 'Positif', '2019-12-10'),
('Dandi', 'Taman Kopo Indah 2 Blok 3G No.', 15, 'Kolesterol (<200 mg/dL)', 'Positif', '2019-12-10'),
('Dandi', 'Taman Kopo Indah 2 Blok 3G No.', 15, 'Gula Darah Sewaktu/Acak (144-180 mg/dL)', 'Positif', '2019-12-10');

-- --------------------------------------------------------

--
-- Table structure for table `pemasukan_obat`
--

CREATE TABLE `pemasukan_obat` (
  `kode_obat` varchar(10) NOT NULL,
  `nama_obat` varchar(30) NOT NULL,
  `jenis_obat` varchar(10) NOT NULL,
  `harga` double NOT NULL,
  `stok_obat` int(11) NOT NULL,
  `tgl_masuk` date NOT NULL,
  `tgl_kadaluarsa` date NOT NULL,
  `kategori_obat` varchar(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pemasukan_obat`
--

INSERT INTO `pemasukan_obat` (`kode_obat`, `nama_obat`, `jenis_obat`, `harga`, `stok_obat`, `tgl_masuk`, `tgl_kadaluarsa`, `kategori_obat`) VALUES
('1', 'Ambroxol', 'Pil', 7000, 52, '2019-09-02', '2021-10-02', NULL),
('10', 'kapsida', 'Kapsul', 15000, 8, '2019-10-13', '2025-10-13', NULL),
('11', 'asam mefenamat', 'Pil', 5000, 51, '2019-10-16', '2023-11-22', NULL),
('113', 'Epexone', 'Tablet', 35000, 35, '2019-11-27', '2019-11-21', NULL),
('12', 'antalgin', 'Kapsul', 3500, 50, '2019-09-29', '2025-09-30', NULL),
('1212', 'antimo', 'Kapsul', 5000, 94, '2019-08-03', '2019-08-16', NULL),
('13', 'cendo xytrol eye', 'Obat Tetes', 53000, 9, '2019-08-05', '2023-09-20', NULL),
('14', 'Pct infus', 'Infusa', 20000, 15, '2019-10-02', '2021-10-02', NULL),
('15', 'Paracetamol', 'Pil', 5000, 0, '2019-09-24', '2020-09-24', NULL),
('16', 'sanmol', 'Syirup', 15000, 33, '2019-09-30', '2024-10-02', NULL),
('17', 'Omeprazole', 'Kapsul', 28000, 38, '2019-08-29', '2026-09-29', NULL),
('18', 'hydrocortisone', 'Salep', 6000, 15, '2019-08-27', '2027-09-19', NULL),
('19', 'Bodreks flu dan batuk', 'Tablet', 6000, 20, '2019-11-09', '2025-11-09', NULL),
('2', 'Ibuprofen', 'Tablet', 5000, 50, '2019-10-06', '2022-10-06', NULL),
('20', 'Eprinoc', 'Tablet', 60000, 16, '2019-09-21', '2022-09-17', NULL),
('21', 'Amlodipine', 'Tablet', 7000, 22, '2019-10-22', '2023-08-22', NULL),
('22', 'Amoxilin', 'Kaplet', 6000, 72, '2019-09-26', '2021-09-23', NULL),
('3', 'natrium diklofenak', 'Pil', 7000, 19, '2019-10-01', '2023-09-30', NULL),
('4', 'ampicilin', 'Kaplet', 7000, 69, '2019-09-29', '2022-10-06', NULL),
('5', 'antasida doen', 'Tablet', 4000, 80, '2019-09-29', '2023-10-18', NULL),
('6', 'promag', 'Tablet', 5000, 36, '2019-08-30', '0000-00-00', NULL),
('7', 'Garam Oralit', 'Serbuk', 3000, 25, '2019-10-06', '0000-00-00', NULL),
('8', 'asam askorbat (vitamin c)', 'Pil', 3000, 45, '2019-10-08', '0000-00-00', NULL),
('9', 'vitamin B kompleks', 'Pil', 3000, 64, '2019-10-08', '2019-09-14', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `penjualan_resep_detail`
--

CREATE TABLE `penjualan_resep_detail` (
  `no_faktur` int(10) NOT NULL,
  `nama_pasien` varchar(30) NOT NULL,
  `nama_dokter` varchar(30) NOT NULL,
  `tgl` date NOT NULL,
  `jumlah` int(11) NOT NULL,
  `total` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `penjualan_resep_detail`
--

INSERT INTO `penjualan_resep_detail` (`no_faktur`, `nama_pasien`, `nama_dokter`, `tgl`, `jumlah`, `total`) VALUES
(1, 'Dandi', 'Bastian', '2019-12-12', 5, 59000);

-- --------------------------------------------------------

--
-- Table structure for table `penjualan_tanparesep_detail`
--

CREATE TABLE `penjualan_tanparesep_detail` (
  `no_faktur1` int(10) NOT NULL,
  `jumlah` int(11) NOT NULL,
  `tgl` date NOT NULL,
  `total1` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `penjualan_tanparesep_detail`
--

INSERT INTO `penjualan_tanparesep_detail` (`no_faktur1`, `jumlah`, `tgl`, `total1`) VALUES
(1, 5, '2019-12-12', 22000);

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `user_id` int(10) NOT NULL,
  `nama` varchar(30) NOT NULL,
  `username` varchar(20) NOT NULL,
  `password` varchar(20) NOT NULL,
  `nohp` int(15) NOT NULL,
  `user_ind` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`user_id`, `nama`, `username`, `password`, `nohp`, `user_ind`) VALUES
(1, 'Admin', 'admin', 'admin', 813, 1),
(2, 'Apoteker', 'apoteker', 'apoteker', 8133, 2),
(3, 'Pemilik', 'pemilik', 'pemilik', 8131112, 3),
(4, 'Admin_1', 'Admin_1', 'Admin_1', 813, 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `obat_terjual`
--
ALTER TABLE `obat_terjual`
  ADD PRIMARY KEY (`row_id`);

--
-- Indexes for table `pemasukan_obat`
--
ALTER TABLE `pemasukan_obat`
  ADD PRIMARY KEY (`kode_obat`);

--
-- Indexes for table `penjualan_resep_detail`
--
ALTER TABLE `penjualan_resep_detail`
  ADD PRIMARY KEY (`no_faktur`);

--
-- Indexes for table `penjualan_tanparesep_detail`
--
ALTER TABLE `penjualan_tanparesep_detail`
  ADD PRIMARY KEY (`no_faktur1`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `obat_terjual`
--
ALTER TABLE `obat_terjual`
  MODIFY `row_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `penjualan_resep_detail`
--
ALTER TABLE `penjualan_resep_detail`
  MODIFY `no_faktur` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `penjualan_tanparesep_detail`
--
ALTER TABLE `penjualan_tanparesep_detail`
  MODIFY `no_faktur1` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `user_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
