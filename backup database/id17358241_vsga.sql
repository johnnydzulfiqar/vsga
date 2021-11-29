-- phpMyAdmin SQL Dump
-- version 4.9.5
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Waktu pembuatan: 17 Nov 2021 pada 00.38
-- Versi server: 10.5.12-MariaDB
-- Versi PHP: 7.3.32

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `id17358241_vsga`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `admin`
--

CREATE TABLE `admin` (
  `id_admin` int(5) NOT NULL,
  `nama_admin` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `username` varchar(50) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data untuk tabel `admin`
--

INSERT INTO `admin` (`id_admin`, `nama_admin`, `password`, `username`) VALUES
(1, 'admin', 'admin', 'admin'),
(2, 'admin', 'admin', 'admin');

-- --------------------------------------------------------

--
-- Struktur dari tabel `buku`
--

CREATE TABLE `buku` (
  `judul` text COLLATE utf8_unicode_ci NOT NULL,
  `tahunbuku` date NOT NULL,
  `penulis` text COLLATE utf8_unicode_ci NOT NULL,
  `kategori` text COLLATE utf8_unicode_ci NOT NULL,
  `status` text COLLATE utf8_unicode_ci NOT NULL,
  `id` int(11) NOT NULL,
  `image` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `image_text` text COLLATE utf8_unicode_ci NOT NULL,
  `isbn` int(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data untuk tabel `buku`
--

INSERT INTO `buku` (`judul`, `tahunbuku`, `penulis`, `kategori`, `status`, `id`, `image`, `image_text`, `isbn`) VALUES
('kodaomo', '2021-08-25', 'M Naufa Dzulfiqar', 'Hewan', 'Tersedia', 9, '', '', 101),
('The Witcher 2', '2021-08-25', 'Kokom', 'Fiksi', 'Tersedia', 11, 'geralt-thumbs-up.jpg', '', 102),
('Buku Aneh', '2021-08-26', 'M Naufa Dzulfiqar', 'Fiksi', 'Tersedia', 12, '3ec967c3188198f4112467ffa3dfc5be.jpg', '', 104),
('Buku Aneh', '2021-08-27', 'aku', 'aneh', 'Tersedia', 15, '440px-SMK_Negeri_1_Cimahi.png', '', 107),
('Genshin', '2021-11-08', 'M Naufa Dzulfiqar', 'Fiksi', 'Tersedia', 17, 'Screenshot_1.png', '', 213124);

-- --------------------------------------------------------

--
-- Struktur dari tabel `member`
--

CREATE TABLE `member` (
  `name` text COLLATE utf8_unicode_ci NOT NULL,
  `tanggalLahir` date NOT NULL,
  `alamat` text COLLATE utf8_unicode_ci NOT NULL,
  `jeniskelamin` text COLLATE utf8_unicode_ci NOT NULL,
  `id` int(11) NOT NULL,
  `image` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `image_text` text COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(50) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data untuk tabel `member`
--

INSERT INTO `member` (`name`, `tanggalLahir`, `alamat`, `jeniskelamin`, `id`, `image`, `image_text`, `email`) VALUES
('Kupu-Kupu', '2021-08-25', 'CIMAHI Tengah', 'Laki-Laki', 501, 'navy-butterfly.jpg', '', 'lordnaufa@gmail.com'),
('Muhammad Naufa Dzulfiqar', '2021-08-24', 'Pojok tengah', 'Laki-Laki', 502, 'a.jpg', '', ''),
('Geralt Of Rivia', '2021-08-24', 'Jalan Rivia', 'Laki-Laki', 503, 'geralt-thumbs-up.jpg', '', ''),
('John', '2021-08-27', 'Pojok tengah', 'Laki-Laki', 507, '20190620_201638.jpg', '', 'lordnaufa@gmail.com');

-- --------------------------------------------------------

--
-- Struktur dari tabel `transaksi`
--

CREATE TABLE `transaksi` (
  `id_transaksi` int(10) NOT NULL,
  `id_anggota` int(10) NOT NULL,
  `isbn` int(10) NOT NULL,
  `pinjam` date NOT NULL,
  `kembali` date NOT NULL,
  `status` text COLLATE utf8_unicode_ci NOT NULL,
  `name` text COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data untuk tabel `transaksi`
--

INSERT INTO `transaksi` (`id_transaksi`, `id_anggota`, `isbn`, `pinjam`, `kembali`, `status`, `name`) VALUES
(701, 103, 502, '2021-08-27', '2021-09-01', 'Sudah Dikembalikan', 'M Naufa Dzulfiqar'),
(702, 105, 107, '2021-08-27', '2021-08-28', 'Sudah Kembali', 'dadang'),
(8888, 888, 888, '2021-08-31', '2021-08-26', 'Sudah Dikembalikan', '888');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id_admin`);

--
-- Indeks untuk tabel `buku`
--
ALTER TABLE `buku`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `member`
--
ALTER TABLE `member`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `transaksi`
--
ALTER TABLE `transaksi`
  ADD PRIMARY KEY (`id_transaksi`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `admin`
--
ALTER TABLE `admin`
  MODIFY `id_admin` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `buku`
--
ALTER TABLE `buku`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT untuk tabel `member`
--
ALTER TABLE `member`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=508;

--
-- AUTO_INCREMENT untuk tabel `transaksi`
--
ALTER TABLE `transaksi`
  MODIFY `id_transaksi` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8889;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
