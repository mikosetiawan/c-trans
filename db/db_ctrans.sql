-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 22 Agu 2023 pada 10.50
-- Versi server: 10.4.25-MariaDB
-- Versi PHP: 8.0.23

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_ctrans`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_approval`
--

CREATE TABLE `tb_approval` (
  `idApproval` int(12) NOT NULL,
  `namaApproval` varchar(255) NOT NULL,
  `jabatan` varchar(233) NOT NULL,
  `upload_date` datetime NOT NULL,
  `time_date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tb_approval`
--

INSERT INTO `tb_approval` (`idApproval`, `namaApproval`, `jabatan`, `upload_date`, `time_date`) VALUES
(1, 'Bpk. Herul Anwar', 'HR', '2023-08-21 11:04:06', '2023-08-21 04:04:06'),
(2, 'Nurul Hadiyati', 'Management', '2023-08-21 15:28:14', '2023-08-21 08:28:14'),
(3, 'Pebrian', 'Direktur', '2023-08-21 16:30:43', '2023-08-21 09:30:43');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_bbm`
--

CREATE TABLE `tb_bbm` (
  `idBBM` int(12) NOT NULL,
  `jenisBBM` varchar(120) NOT NULL,
  `hargaBBM` varchar(100) NOT NULL,
  `upload_date` datetime NOT NULL,
  `time_date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tb_bbm`
--

INSERT INTO `tb_bbm` (`idBBM`, `jenisBBM`, `hargaBBM`, `upload_date`, `time_date`) VALUES
(1, 'Solar', '13000', '2023-08-21 11:00:39', '2023-08-21 04:00:39'),
(2, 'Premium', '10000', '2023-08-21 11:04:33', '2023-08-21 04:04:33'),
(3, 'Pertamax', '15000', '2023-08-21 11:04:48', '2023-08-21 04:04:48');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_driver`
--

CREATE TABLE `tb_driver` (
  `idDriver` int(12) NOT NULL,
  `namaDriver` varchar(255) NOT NULL,
  `tempatLahir` varchar(100) NOT NULL,
  `tglLahir` varchar(50) NOT NULL,
  `noTlp` varchar(12) NOT NULL,
  `jenisSIM` varchar(255) NOT NULL,
  `alamat` text NOT NULL,
  `upload_date` datetime NOT NULL,
  `time_date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tb_driver`
--

INSERT INTO `tb_driver` (`idDriver`, `namaDriver`, `tempatLahir`, `tglLahir`, `noTlp`, `jenisSIM`, `alamat`, `upload_date`, `time_date`) VALUES
(1, 'Muhammad Irsyad', 'Cilegon', '1999-01-12', '08123817881', 'B', 'Kp. Tunggak etan', '2023-08-21 10:57:10', '2023-08-21 03:57:10');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_kendaraan`
--

CREATE TABLE `tb_kendaraan` (
  `idKendaraan` int(12) NOT NULL,
  `namaKendaraan` varchar(255) NOT NULL,
  `jenisKendaraan` varchar(255) NOT NULL,
  `flatNo` varchar(50) NOT NULL,
  `statusKendaraan` varchar(255) NOT NULL,
  `serviceKendaraan` varchar(50) NOT NULL,
  `upload_date` datetime NOT NULL,
  `time_date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tb_kendaraan`
--

INSERT INTO `tb_kendaraan` (`idKendaraan`, `namaKendaraan`, `jenisKendaraan`, `flatNo`, `statusKendaraan`, `serviceKendaraan`, `upload_date`, `time_date`) VALUES
(1, 'Avanza Fortuner', 'Mobil', 'ABC0128', 'Milik Perusahaan', '2023-09-01', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(2, 'Kijang Inova', 'Mobil', 'ASH00191', 'Milik Perusahaan', '2023-09-01', '2023-08-21 10:36:33', '0000-00-00 00:00:00'),
(3, 'Ross', 'Mobil', 'ALK82001', 'Sewa', '2023-09-12', '2023-08-21 10:40:53', '2023-08-21 03:40:53'),
(4, 'Kijang Inova', 'Mobil', 'ABC0128', 'Sewa', '2023-08-12', '2023-08-21 10:43:54', '2023-08-21 03:43:54'),
(5, 'Kijang Inova', 'Mobil', 'ALK82001', 'Milik Perusahaan', '2023-09-20', '2023-08-21 10:46:01', '0000-00-00 00:00:00'),
(6, 'Kijang Inova', 'Mobil', 'ALK82001', 'Milik Perusahaan', '2023-12-10', '2023-08-21 10:47:28', '2023-08-21 03:47:28');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_pemesanan`
--

CREATE TABLE `tb_pemesanan` (
  `idPemesanan` int(12) NOT NULL,
  `namaPemesanan` varchar(100) NOT NULL,
  `tglPemesanan` varchar(50) NOT NULL,
  `idKendaraan` int(12) NOT NULL,
  `namaKendaraan` varchar(100) NOT NULL,
  `flatNo` varchar(50) NOT NULL,
  `jenisKendaraan` varchar(100) NOT NULL,
  `statusKendaraan` varchar(50) NOT NULL,
  `idBBM` int(12) NOT NULL,
  `jenisBBM` varchar(100) NOT NULL,
  `jmlBBM` varchar(100) NOT NULL,
  `totalBBM` varchar(100) NOT NULL,
  `idDriver` int(12) NOT NULL,
  `namaDriver` varchar(100) NOT NULL,
  `idApproval` int(12) NOT NULL,
  `namaApproval` varchar(100) NOT NULL,
  `namaApproval2` varchar(255) NOT NULL,
  `status_acc` varchar(5) NOT NULL,
  `upload_date` datetime NOT NULL,
  `time_date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tb_pemesanan`
--

INSERT INTO `tb_pemesanan` (`idPemesanan`, `namaPemesanan`, `tglPemesanan`, `idKendaraan`, `namaKendaraan`, `flatNo`, `jenisKendaraan`, `statusKendaraan`, `idBBM`, `jenisBBM`, `jmlBBM`, `totalBBM`, `idDriver`, `namaDriver`, `idApproval`, `namaApproval`, `namaApproval2`, `status_acc`, `upload_date`, `time_date`) VALUES
(10, 'Badru Tamami', '2023-08-12', 1, 'Avanza Fortuner', 'ABC0128', 'Mobil', 'Milik Perusahaan', 3, 'Pertamax', '2', '30000', 1, 'Muhammad Irsyad', 3, 'Pebrian', 'Nurul Hadiyati', '2', '2023-08-21 18:47:50', '2023-08-22 04:37:52'),
(11, 'Hudriyana', '2023-01-18', 1, 'Avanza Fortuner', 'ABC0128', 'Mobil', 'Milik Perusahaan', 1, 'Solar', '1', '13000', 1, 'Muhammad Irsyad', 1, 'Bpk. Herul Anwar', 'Nurul Hadiyati', '1', '2023-08-21 18:48:25', '2023-08-22 04:33:41'),
(12, 'Nunung', '2023-02-01', 1, 'Avanza Fortuner', 'ABC0128', 'Mobil', 'Milik Perusahaan', 2, 'Premium', '3', '30000', 1, 'Muhammad Irsyad', 2, 'Nurul Hadiyati', 'Pebrian', '2', '2023-08-21 21:08:51', '2023-08-22 04:38:01'),
(13, 'Jerry Kurniawan', '2024-02-09', 1, 'Avanza Fortuner', 'ABC0128', 'Mobil', 'Milik Perusahaan', 3, 'Pertamax', '1', '15000', 1, 'Muhammad Irsyad', 2, 'Nurul Hadiyati', 'Bpk. Herul Anwar', '1', '2023-08-21 21:09:50', '2023-08-22 04:37:42');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_riwayat_service`
--

CREATE TABLE `tb_riwayat_service` (
  `idService` int(12) NOT NULL,
  `idKendaraan` int(12) NOT NULL,
  `namaKendaraan` varchar(255) NOT NULL,
  `tglService` varchar(50) NOT NULL,
  `statusService` varchar(233) NOT NULL,
  `upload_date` datetime NOT NULL,
  `time_date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Struktur dari tabel `users`
--

CREATE TABLE `users` (
  `idUser` int(12) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(50) NOT NULL,
  `email` varchar(100) NOT NULL,
  `status` varchar(100) NOT NULL,
  `cprofile` varchar(5) NOT NULL,
  `foto` varchar(255) NOT NULL,
  `telepon` varchar(12) NOT NULL,
  `alamat` text NOT NULL,
  `upload_date` datetime NOT NULL,
  `time_date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `users`
--

INSERT INTO `users` (`idUser`, `username`, `password`, `email`, `status`, `cprofile`, `foto`, `telepon`, `alamat`, `upload_date`, `time_date`) VALUES
(1, 'Admin', '123', '', 'Admin', '0', '', '', '', '2023-08-21 03:15:24', '2023-08-22 08:49:27'),
(2, 'Approval1', '321', '', 'Approval1', '0', '', '', '', '2023-08-21 03:16:43', '2023-08-22 08:49:37'),
(3, 'Approval2', '321', '', 'Approval2', '0', '', '', '', '2023-08-21 11:29:20', '2023-08-22 08:49:58');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `tb_approval`
--
ALTER TABLE `tb_approval`
  ADD PRIMARY KEY (`idApproval`);

--
-- Indeks untuk tabel `tb_bbm`
--
ALTER TABLE `tb_bbm`
  ADD PRIMARY KEY (`idBBM`);

--
-- Indeks untuk tabel `tb_driver`
--
ALTER TABLE `tb_driver`
  ADD PRIMARY KEY (`idDriver`);

--
-- Indeks untuk tabel `tb_kendaraan`
--
ALTER TABLE `tb_kendaraan`
  ADD PRIMARY KEY (`idKendaraan`);

--
-- Indeks untuk tabel `tb_pemesanan`
--
ALTER TABLE `tb_pemesanan`
  ADD PRIMARY KEY (`idPemesanan`,`idKendaraan`,`idBBM`,`idDriver`);

--
-- Indeks untuk tabel `tb_riwayat_service`
--
ALTER TABLE `tb_riwayat_service`
  ADD PRIMARY KEY (`idService`,`idKendaraan`);

--
-- Indeks untuk tabel `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`idUser`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `tb_approval`
--
ALTER TABLE `tb_approval`
  MODIFY `idApproval` int(12) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT untuk tabel `tb_bbm`
--
ALTER TABLE `tb_bbm`
  MODIFY `idBBM` int(12) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT untuk tabel `tb_driver`
--
ALTER TABLE `tb_driver`
  MODIFY `idDriver` int(12) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `tb_kendaraan`
--
ALTER TABLE `tb_kendaraan`
  MODIFY `idKendaraan` int(12) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT untuk tabel `tb_pemesanan`
--
ALTER TABLE `tb_pemesanan`
  MODIFY `idPemesanan` int(12) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT untuk tabel `tb_riwayat_service`
--
ALTER TABLE `tb_riwayat_service`
  MODIFY `idService` int(12) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `users`
--
ALTER TABLE `users`
  MODIFY `idUser` int(12) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
