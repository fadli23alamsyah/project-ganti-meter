-- phpMyAdmin SQL Dump
-- version 4.8.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 19 Bulan Mei 2020 pada 16.05
-- Versi server: 10.1.37-MariaDB
-- Versi PHP: 7.3.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `appmeter_db`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_akun`
--

CREATE TABLE `tb_akun` (
  `id` int(11) NOT NULL,
  `nama` varchar(128) NOT NULL,
  `username` varchar(128) NOT NULL,
  `password` varchar(256) NOT NULL,
  `level` varchar(128) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tb_akun`
--

INSERT INTO `tb_akun` (`id`, `nama`, `username`, `password`, `level`) VALUES
(1, 'Admin', 'admin', '$2y$10$owpL8RXbZMqq6ELJA7.hsOX8VeTMX2qWvClaqP6ll6ZU0MOuHLPvW', 'admin'),
(3, 'admin', 'palpal', '$2y$10$naV02iCDVCPe7Q56ZGu3UexcobNOUv/Qnmz8Utg0D.odVxSsWFNJC', 'user');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_data`
--

CREATE TABLE `tb_data` (
  `id` int(11) NOT NULL,
  `no_ba` varchar(128) NOT NULL,
  `hari_tgl` varchar(128) NOT NULL,
  `id_pel` varchar(128) NOT NULL,
  `nama_pel` varchar(128) NOT NULL,
  `alamat` varchar(256) NOT NULL,
  `tarif` varchar(128) NOT NULL,
  `type_kwh_lama` varchar(128) NOT NULL,
  `no_kwh_lama` varchar(128) NOT NULL,
  `teg_kwh_lama` varchar(128) NOT NULL,
  `arus_kwh_lama` varchar(128) NOT NULL,
  `class_kwh_lama` varchar(128) NOT NULL,
  `thn_kwh_lama` varchar(128) NOT NULL,
  `stand_kwh_lama` varchar(128) NOT NULL,
  `kap_mcb_lama` varchar(128) NOT NULL,
  `merk_mcb_lama` varchar(128) NOT NULL,
  `type_kwh_baru` varchar(128) NOT NULL,
  `no_kwh_baru` varchar(128) NOT NULL,
  `teg_kwh_baru` varchar(128) NOT NULL,
  `arus_kwh_baru` varchar(128) NOT NULL,
  `class_kwh_baru` varchar(128) NOT NULL,
  `total_kwh_baru` varchar(128) NOT NULL,
  `kvarh_kwh_baru` varchar(128) NOT NULL,
  `kap_mcb_baru` varchar(128) NOT NULL,
  `merk_mcb_baru` varchar(128) NOT NULL,
  `foto` varchar(128) NOT NULL,
  `foto_setelah` varchar(128) NOT NULL,
  `keterangan` varchar(256) NOT NULL,
  `id_petugas` varchar(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tb_data`
--

INSERT INTO `tb_data` (`id`, `no_ba`, `hari_tgl`, `id_pel`, `nama_pel`, `alamat`, `tarif`, `type_kwh_lama`, `no_kwh_lama`, `teg_kwh_lama`, `arus_kwh_lama`, `class_kwh_lama`, `thn_kwh_lama`, `stand_kwh_lama`, `kap_mcb_lama`, `merk_mcb_lama`, `type_kwh_baru`, `no_kwh_baru`, `teg_kwh_baru`, `arus_kwh_baru`, `class_kwh_baru`, `total_kwh_baru`, `kvarh_kwh_baru`, `kap_mcb_baru`, `merk_mcb_baru`, `foto`, `foto_setelah`, `keterangan`, `id_petugas`) VALUES
(18, 'hgo', 'Friday/15-05-2020/04:28', 'a', 'a', 'a', 'a', 'aa', 'sa', 'a', 'a', 'a', 'a', 'a', 'a', 'a', 'a', 'a', 'a', 'a', 'a', 'a', 'a', 'a', 'a', '18sblm.jpg', '18stlh.jpg', 'a', '3'),
(19, 'ysys', 'Friday/15-05-2020/05:13', 'dhxh', 'xjxh', 'dhd', 'd', 'd', 'd', 'dd', 'd', 'd', 'd', 'd', 'd', 'd', 'd', 'd', 'd', 'd', 'd', 'd', 'd', 'd', 'd', '19sblm.jpg', '19stlh.jpg', 'dq', '3'),
(20, '1', 'Saturday/16-05-2020/08:13', '123', 'hshs', 'naja', 'ajaj', 'ajaj', 'ajau', 'ajaj', 'ajaj', 'ajau', 'jaja', 'ajaj', 'ajaj', 'auau', 'ajjaau', 'auaua', 'ajaj', 'ausu', 'ajau', 'ua', 'ua', 'jaja', 'ausu', '20sblm.jpg', '20stlh.jpg', 'uaia8', '3');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `tb_akun`
--
ALTER TABLE `tb_akun`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `tb_data`
--
ALTER TABLE `tb_data`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `tb_akun`
--
ALTER TABLE `tb_akun`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT untuk tabel `tb_data`
--
ALTER TABLE `tb_data`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
