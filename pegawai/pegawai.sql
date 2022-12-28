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
-- Struktur dari tabel `pegawai`
--

CREATE TABLE `pegawai` (
  `id` int(11) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `alamat` varchar(50) NOT NULL,
  `jenisKelamin` varchar(12) NOT NULL,
  `telepon` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `pegawai`
--

INSERT INTO `pegawai` (`id`, `nama`, `alamat`, `jenisKelamin`, `telepon`) VALUES
(1, 'Damar Muzzaki', 'Jl. Kerinci No. 22', 'Laki-laki', '081212121212'),
(2, 'Dana Prayoga', 'Jl. Sultan No.67', 'Laki-laki', '0826732432'),
(3, 'Romania', 'Jl. Coklat No. 08', 'Perempuan', '0826372362'),
(4, 'Siska Ardiani', 'Jl. Gading No. 19', 'Perempuan', '087575757575'),
(5, 'Dimas Anggara', 'Jl. Ciledug No. 7', 'Laki-laki', '08637463544'),
(6, 'Sonia Azzahra', 'Jl. Durian No. 34', 'Perempuan', '0874373764'),
(7, 'Dana Prayoga', 'Jl. Kasembon No. 27', 'Laki-laki', '08347346345'),
(8, 'Sisca Wardhani', 'Jl. Kelengkeng No. 12', 'Perempuan', '0847346375'),
(9, 'Nike Tatia', 'Jl. Kemuning No. 55', 'Perempuan', '08473465564'),
(10, 'Bima Sakti', 'Jl. Kelapa No. 9', 'Laki-laki', '0834735343');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `pegawai`
--
ALTER TABLE `pegawai`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `pegawai`
--
ALTER TABLE `pegawai`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
