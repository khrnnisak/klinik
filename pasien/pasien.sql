-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 19 Des 2021 pada 02.40
-- Versi server: 10.4.22-MariaDB
-- Versi PHP: 8.1.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `sistem_klinik`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `pasien`
--

CREATE TABLE `pasien` (
  `id` int(11) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `alamat` varchar(50) NOT NULL,
  `jenisKelamin` varchar(12) NOT NULL,
  `telepon` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `pasien`
--

INSERT INTO `pasien` (`id`, `nama`, `alamat`, `jenisKelamin`, `telepon`) VALUES
(1, 'Maman Suryaman', 'Jl. Kutilang No. 88, Surabaya', 'Laki-laki', '081212121212'),
(2, 'Wiwin Andayani', 'Jl. Diponegoro No.11, Solo', 'Perempuan', '082323232323'),
(3, 'Doni Maruli', 'Jl. Kembang No. 12', 'Laki-laki', '876767676'),
(4, 'Moreno', 'Jl. Dukuh No. 01', 'Laki-laki', '8545454545'),
(5, 'Nina Amrita', 'Jl. Kasembon No. 27', 'Perempuan', '08414141414'),
(6, 'Yono Sitohang', 'Jl. Dewi No, 34', 'Laki-laki', '089898989'),
(7, 'Siska Ardiani', 'Jl. Gading No. 19', 'Perempuan', '087575757575'),
(8, 'Nora Wandhika', 'Jl. Semanggi No. 09', 'Perempuan', '08383838383'),
(9, 'Bima Sakti', 'Jl. Pontianak No. 21', 'Laki-laki', '08323232323'),
(10, 'Chika Cendekia', 'Jl. Sampang No. 27', 'Perempuan', '085454545454');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `pasien`
--
ALTER TABLE `pasien`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `pasien`
--
ALTER TABLE `pasien`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
