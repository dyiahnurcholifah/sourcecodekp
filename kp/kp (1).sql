-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: 06 Agu 2022 pada 04.26
-- Versi Server: 10.1.19-MariaDB
-- PHP Version: 7.0.13

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `kp`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `kematianibu`
--

CREATE TABLE `kematianibu` (
  `id` int(8) NOT NULL,
  `nik` varchar(16) NOT NULL,
  `nama_ibu` varchar(100) NOT NULL,
  `usia` int(3) NOT NULL,
  `desa_kelurahan` varchar(100) NOT NULL,
  `kecamatan` varchar(100) NOT NULL,
  `kabupaten_kota` varchar(100) NOT NULL,
  `tempat_kematian` varchar(100) NOT NULL,
  `tanggal_kematian` date NOT NULL,
  `penyebab_kematian_sementara` varchar(100) NOT NULL,
  `penolong_persalinan` varchar(100) NOT NULL,
  `saat_kematian` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `kematianibu`
--

INSERT INTO `kematianibu` (`id`, `nik`, `nama_ibu`, `usia`, `desa_kelurahan`, `kecamatan`, `kabupaten_kota`, `tempat_kematian`, `tanggal_kematian`, `penyebab_kematian_sementara`, `penolong_persalinan`, `saat_kematian`) VALUES
(1, '3321026810930001', 'Hanik', 26, 'Telogorejo', 'Karangawen', 'Demak', 'Pukesmas', '2022-08-02', 'Penyakit Lainnya', 'Dokter Sp.OG', 'Bersalin'),
(3, '3321026810960002', 'Lina', 34, 'Telogorejo', 'Karangawen', 'Demak', 'Pukesmas', '2022-08-02', 'Pendarahan', 'Bidan', 'Bersalin');

-- --------------------------------------------------------

--
-- Struktur dari tabel `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `username` varchar(25) NOT NULL,
  `password` varchar(25) NOT NULL,
  `level` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `user`
--

INSERT INTO `user` (`id`, `username`, `password`, `level`) VALUES
(1, 'Dinkesjatengprov', 'Dinkesjateng', 'superadmin'),
(2, 'Pukesmaskarangawen2', 'Pkarangawen2', 'admin'),
(3, 'superadmin', 'superadmin', 'superadmin'),
(4, 'admin', 'admin', 'admin'),
(8, 'Dyiah', 'Dyiah', 'admin');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `kematianibu`
--
ALTER TABLE `kematianibu`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `kematianibu`
--
ALTER TABLE `kematianibu`
  MODIFY `id` int(8) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
