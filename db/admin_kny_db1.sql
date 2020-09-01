-- phpMyAdmin SQL Dump
-- version 4.6.6deb5
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: 19 Jun 2020 pada 04.00
-- Versi Server: 5.7.29-0ubuntu0.18.04.1
-- PHP Version: 7.2.30-1+ubuntu18.04.1+deb.sury.org+1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `admin_kny_db`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `api_session`
--

CREATE TABLE `api_session` (
  `id` bigint(20) NOT NULL,
  `user_id` int(15) NOT NULL,
  `tipe` enum('member','pegawai') NOT NULL,
  `token` varchar(32) NOT NULL,
  `ip` varchar(64) NOT NULL,
  `tanggal` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `api_session`
--

INSERT INTO `api_session` (`id`, `user_id`, `tipe`, `token`, `ip`, `tanggal`) VALUES
(1, 1, 'member', 'YpuvOWvEUUthIqNloBohUfn9ksUjsyPV', '45.13.132.68', '2020-01-03 15:51:32'),
(2, 1, 'member', '027WSSp4ZcHymRNrF6G3aDq5VdCHyr9f', '45.13.132.68', '2020-01-03 15:51:42'),
(3, 4, 'pegawai', 'AT6TKK1R8o5AWlSEZnmeoZ6difkqmily', '45.13.132.68', '2020-01-03 15:52:03'),
(4, 1, 'member', '4Y8hKs6So8SqOxzVj5IoaZumulw1Ywun', '45.13.132.68', '2020-01-04 04:51:58'),
(5, 1, 'member', '7y4izk7VKHLsvoITnCEG3x3Csckvt1TL', '45.13.132.68', '2020-01-04 04:52:23'),
(6, 1, 'member', 'D39c3dik48IkGtlbSD4B5vyZ2SaHy5V3', '45.13.132.68', '2020-01-04 05:34:20'),
(7, 1, 'member', 'hm5JYEQU01PnAZgREIqqHPpZt4coiGdI', '45.13.132.68', '2020-01-04 05:42:15'),
(8, 1, 'member', '06JRnFqEjUZH9I5OxrdItaBJGKmRc5AC', '45.13.132.68', '2020-01-04 05:42:17'),
(9, 1, 'member', 'Be3q0BbK5vEagNY6KVXzAbk5rihprbrM', '45.13.132.68', '2020-01-04 05:52:56'),
(10, 1, 'member', 'KFKixmdfaisE6U048BstAny2rYLfWPxS', '45.13.132.68', '2020-01-04 05:54:42'),
(11, 1, 'member', 'r4UEoMVDxcE6OQVVZvrX4E5JXuxIrMt8', '45.13.132.68', '2020-01-04 06:30:20'),
(12, 1, 'member', '3dgsSeDIpcQOMLImHXdSF3OAPjNs99a6', '45.13.132.68', '2020-01-04 06:30:20'),
(13, 1, 'member', 'KkmZX41FmXX1xBdHTkgj02GXFCfRukUF', '45.13.132.68', '2020-01-04 06:31:16'),
(14, 1, 'member', 'd7Bw8dYrbHE3cAguCIpQfbDbDdc7Uze4', '45.13.132.68', '2020-01-04 06:31:35'),
(15, 1, 'member', 'sQfLkfemwqtHqnR4SzOl4UHWddF1pxsf', '45.13.132.68', '2020-01-04 06:32:05'),
(16, 1, 'member', '4V1xxV5xjnKCwxv36nxOQ1UvncMrrGKI', '45.13.132.68', '2020-01-04 06:33:44'),
(17, 1, 'member', 'lOhJ7S3LB9UZS0shb24t5XLBkVFRFyX0', '45.13.132.68', '2020-01-04 06:35:40'),
(18, 1, 'member', 'MKxAMPP9DXFXhriRo0Y98AKIOJYXRQew', '45.13.132.68', '2020-01-04 06:35:43'),
(19, 1, 'member', 'kM2yXk2Px2uMreH1NtWfan6dD2MEBdGQ', '45.13.132.68', '2020-01-04 06:35:52'),
(20, 1, 'member', '47S6qu78xMHpxGIphcU8Ytgg5gu0s7aB', '45.13.132.68', '2020-01-04 06:37:24'),
(21, 1, 'member', 'POAGaeOLfVN37FJScQYgtky65zmxwtRO', '45.13.132.68', '2020-01-04 06:38:53'),
(22, 1, 'member', 'lKLxM0PfGzFUW6YWQWHDVNpwgVRu3muo', '45.13.132.68', '2020-01-04 06:39:15'),
(23, 1, 'member', 'vLRYiEApJrlDIwdIP9StncJVzCXifhnc', '45.13.132.68', '2020-01-04 07:03:37'),
(24, 1, 'member', 'baLAsEnT0h3iQd8dthIyshdbNMpnMDoz', '45.13.132.68', '2020-01-04 09:56:45'),
(25, 1, 'member', '05J1XZIOu3HPc9WOKNNwi85mx3IkICS9', '45.13.132.68', '2020-01-04 10:47:53'),
(26, 1, 'member', 'S4c4aFUcnKZrGtlnctPwskNMa8WQD8vX', '45.13.132.68', '2020-01-04 11:53:08'),
(27, 1, 'member', 'ivQcbQrJnCrAGEHnLZeLEJvh8unc3zJy', '45.13.132.68', '2020-01-07 11:38:43'),
(28, 1, 'member', 'SBsSmaAMF5ybPmuLLzvlaf5HxAkHsdwQ', '45.13.132.68', '2020-01-08 09:54:08'),
(29, 1, 'member', 'Tm6m1MAm9Pq7sEYnjOrmBTTkPIZJL2mP', '45.13.132.68', '2020-01-12 17:57:24'),
(30, 1, 'member', 'm7zjSZCtNKhAkpLq3B2jxgsH0QqgbK9E', '45.13.132.68', '2020-01-13 10:33:32'),
(31, 1, 'member', 'kWwesYjEw6lU1O8jSXt9JEacjGGkJZEi', '45.13.132.68', '2020-01-13 10:46:55'),
(32, 1, 'member', 'XpyVPNrdG45QY97OLU7qc6L0Doo3xluv', '45.13.132.68', '2020-01-13 11:11:39'),
(33, 1, 'member', 'dqEkpES1Z7yT9jyZznM9oTviQYhfJC9V', '45.13.132.68', '2020-01-13 12:19:09'),
(34, 1, 'member', '3N1Qyu44cw52nymsN60pEN5QeSKWvdvH', '45.13.132.68', '2020-01-13 12:21:02'),
(35, 1, 'member', 'hIn4iyhLsJz3LXFdx1VhHloGRXC2TMaS', '45.13.132.68', '2020-01-13 12:23:32'),
(36, 1, 'member', 'nCphuViL09Z61tFFXPfmYkeJImhDOFdR', '45.13.132.68', '2020-01-15 10:10:55'),
(37, 1, 'member', '9P8hBIuERffctgHrMqujY1vKOxB2hGB8', '45.13.132.68', '2020-01-17 10:20:53'),
(38, 1, 'member', 'ttA9GXQdNJk8nqiQSOLyeKV1xW3dRkAX', '45.13.132.68', '2020-01-17 10:21:07'),
(39, 1, 'member', 'AUXIvdXzLb533aHWsNqdzYCpFfMHfYvs', '45.13.132.68', '2020-01-17 10:23:17'),
(40, 1, 'member', 'RViOq2yGDQKsHuQX74EHZJznkn29hkVn', '45.13.132.68', '2020-01-17 10:24:34'),
(41, 1, 'member', 'DkHx3K29rlc7YYOaceE1N3uPnh43eA6I', '45.13.132.68', '2020-01-17 10:26:14'),
(42, 1, 'member', '7T18q8arVQFZGJNlSzXSQS0fAMrvGXNP', '45.13.132.68', '2020-01-17 10:26:45'),
(43, 1, 'member', 'D8MjRxFofqEDiKdYe0e1o5CklBAinkPe', '45.13.132.68', '2020-01-17 10:27:14'),
(44, 1, 'member', 'DBB0r1sdZlTTzQu9gyiONchIv13PVaYP', '45.13.132.68', '2020-01-17 10:28:53'),
(45, 1, 'member', 'WEUJJr85dqOA9H3jaWCbpnAP4tAa31mg', '45.13.132.68', '2020-01-20 12:35:30'),
(46, 1, 'member', 'kwC3tYVZUl15BZvkczuK7fPgNLVWgb6p', '45.13.132.68', '2020-01-22 13:33:32'),
(47, 1, 'member', 'MabcBj8EQHD6DF4pyP2U16PXahe0cltj', '45.13.132.68', '2020-01-22 13:33:35'),
(48, 1, 'member', 'sXtOALLXZGP5NRfYewV9Z66ecAhGL8V9', '45.13.132.68', '2020-01-22 13:33:35'),
(49, 1, 'member', 'NR1kTSn8OQ1ZqWECRmK08mx8047jCzE4', '45.13.132.68', '2020-01-22 13:36:43'),
(50, 1, 'member', 'tdNBvYZab3MpwA2pksLYP9hWtIPhwdia', '45.13.132.68', '2020-01-22 14:40:25'),
(51, 1, 'member', '808w1v2XjCHb93y5MxovXbfM0nIC3aU3', '45.13.132.68', '2020-01-22 15:13:43'),
(52, 1, 'member', 'fnKVk3AWyvkDlVEn9WU7Mbq321C7IvXq', '45.13.132.68', '2020-01-23 05:53:04'),
(53, 1, 'member', 'sN5GRSd5jWiU0f2Xt2UeTE77bu4sEQia', '45.13.132.68', '2020-01-23 16:23:03'),
(54, 1, 'member', 'tQRqd8oS1mT481QOJFovqQMPA55kMuPa', '45.13.132.68', '2020-01-24 10:28:18'),
(55, 1, 'member', 'CkjBP67VyFPZiOHqgobAImUJAa68qm6r', '45.13.132.68', '2020-01-24 19:30:35'),
(56, 1, 'member', 'kP60xz4AUMbWKcyRR502r6neygQ1HImv', '45.13.132.68', '2020-01-25 16:37:14');

-- --------------------------------------------------------

--
-- Struktur dari tabel `banner`
--

CREATE TABLE `banner` (
  `id` int(11) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `gambar` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COMMENT='digunakan untuk menyimpan atau mengatur banner di apps';

--
-- Dumping data untuk tabel `banner`
--

INSERT INTO `banner` (`id`, `nama`, `gambar`) VALUES
(6, 'Baner atas', '174f1c0da6aac1d6a6dcdea27839e59f.png');

-- --------------------------------------------------------

--
-- Struktur dari tabel `diskon`
--

CREATE TABLE `diskon` (
  `id` int(5) NOT NULL,
  `nama` char(200) NOT NULL,
  `nominal` double NOT NULL,
  `berlaku_dari` datetime NOT NULL,
  `berlaku_sampai` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COMMENT='digunakan untuk mengatur diskon dari produk';

--
-- Dumping data untuk tabel `diskon`
--

INSERT INTO `diskon` (`id`, `nama`, `nominal`, `berlaku_dari`, `berlaku_sampai`) VALUES
(1, 'Diskon Desmber', 50000, '2019-12-07 00:49:58', '2019-12-07 00:50:03');

-- --------------------------------------------------------

--
-- Struktur dari tabel `kategori_produk`
--

CREATE TABLE `kategori_produk` (
  `id` int(10) NOT NULL,
  `parent_id` int(10) DEFAULT NULL,
  `icon` varchar(100) DEFAULT NULL,
  `kode` char(10) NOT NULL,
  `nama` varchar(200) NOT NULL,
  `keterangan` varchar(500) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COMMENT='digunakan untuk pendefinisian produk';

--
-- Dumping data untuk tabel `kategori_produk`
--

INSERT INTO `kategori_produk` (`id`, `parent_id`, `icon`, `kode`, `nama`, `keterangan`) VALUES
(3, NULL, 'aab23c4f99831985817e8b2c667e2538.png', '001', 'Atasan Wanita', ''),
(4, NULL, 'c3cd94038dc3d36b915ae6cdae9de6d1.png', '002', 'Bawahan Wanita', ''),
(6, NULL, '19ed9e0c83873466b2e05b7ef01c35de.png', '004', 'Pakaian Dalam', ''),
(7, NULL, '942ecf3be26c51e94d744e03feef38be.png', '005', 'Sepatu & Sandal', ''),
(8, NULL, '817b743d4c59c4e44acdb40c125e52e7.png', '006', 'Dompet & Tas', ''),
(9, NULL, '68ae11ff07e4e734952b9d8a0d43d02c.png', '007', 'Gamis', ''),
(10, NULL, 'd5d524b48371e8ec5675951b515736a6.png', '008', 'Busana Pria', ''),
(11, NULL, '67ebbfc0c7861d58d8a3e1b7a86793e3.png', '009', 'Anak - Anak', ''),
(12, NULL, '10747cf149ba677c14c1dd206176212d.png', '010', 'Sprei & Bed Cover', ''),
(13, NULL, '9eca98cf13c00b7668191bbb5e9005b7.png', '011', 'Jilbab', '');

-- --------------------------------------------------------

--
-- Struktur dari tabel `kecamatan`
--

CREATE TABLE `kecamatan` (
  `id` int(11) NOT NULL,
  `kota_id` int(11) NOT NULL,
  `kode` char(10) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `kode_pos` char(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COMMENT='digunakan untuk menyimpan data kecamatan kecamatan dari kota';

--
-- Dumping data untuk tabel `kecamatan`
--

INSERT INTO `kecamatan` (`id`, `kota_id`, `kode`, `nama`, `kode_pos`) VALUES
(1, 1, '001', 'Bansari', '56265'),
(2, 1, '002', 'Bejen', '56258'),
(3, 1, '003', 'Bulu', '56253'),
(4, 1, '004', 'Candiroto', '56257'),
(5, 1, '005', 'Gemawang', '56283'),
(6, 1, '006', 'Jumo', '56256'),
(7, 1, '007', 'Kaloran', '56282'),
(8, 1, '008', 'Kandangan', '56281'),
(9, 1, '009', 'Kedu', '56252'),
(10, 1, '010', 'Kledung', '56264'),
(11, 1, '011', 'Kranggan', '56271'),
(12, 1, '012', 'Ngadirejo', '56255'),
(13, 1, '013', 'Parakan', '56254'),
(14, 1, '014', 'Pringsurat', '56272'),
(15, 1, '015', 'Selopampang', '56262'),
(16, 1, '016', 'Temanggung', '56212'),
(17, 1, '017', 'Tembarak', '56261'),
(18, 1, '018', 'Tlogomulyo', '56263'),
(19, 1, '019', 'Tretep', '56259'),
(20, 1, '020', 'Wonoboyo', '56266');

-- --------------------------------------------------------

--
-- Struktur dari tabel `kota`
--

CREATE TABLE `kota` (
  `id` int(11) NOT NULL,
  `provinsi_id` int(11) NOT NULL,
  `kode` char(10) NOT NULL,
  `nama` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COMMENT='digunakan untuk menyimpan data kota kota dari data provinsi';

--
-- Dumping data untuk tabel `kota`
--

INSERT INTO `kota` (`id`, `provinsi_id`, `kode`, `nama`) VALUES
(1, 1, '33.01', 'Temanggung');

-- --------------------------------------------------------

--
-- Struktur dari tabel `limit_kredit`
--

CREATE TABLE `limit_kredit` (
  `id` int(5) NOT NULL,
  `nama` enum('basic','advanced') NOT NULL,
  `limit` double NOT NULL DEFAULT '0',
  `dp` double NOT NULL DEFAULT '0',
  `angsuran` double NOT NULL DEFAULT '0',
  `angsuran_ext` double DEFAULT '0',
  `x_week` double NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COMMENT='mengatur limit kredit yang diajukan';

--
-- Dumping data untuk tabel `limit_kredit`
--

INSERT INTO `limit_kredit` (`id`, `nama`, `limit`, `dp`, `angsuran`, `angsuran_ext`, `x_week`) VALUES
(11, 'basic', 300000, 50000, 50000, 0, 5),
(13, 'basic', 400000, 100000, 50000, 0, 6),
(14, 'basic', 500000, 150000, 50000, 0, 7),
(15, 'basic', 600000, 180000, 50000, 20000, 9),
(16, 'advanced', 700000, 210000, 50000, 40000, 9),
(17, 'advanced', 800000, 200000, 100000, 0, 6),
(18, 'advanced', 900000, 225000, 100000, 75000, 6),
(19, 'advanced', 1000000, 250000, 100000, 50000, 7),
(21, 'advanced', 1100000, 330000, 100000, 70000, 7),
(22, 'advanced', 1200000, 360000, 100000, 40, 8),
(23, 'advanced', 1300000, 390000, 100000, 10000, 9);

-- --------------------------------------------------------

--
-- Struktur dari tabel `log_misi`
--

CREATE TABLE `log_misi` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `transaksi_id` int(11) DEFAULT NULL,
  `transaksi_angsuran_id` int(11) DEFAULT NULL,
  `member_id` int(11) DEFAULT NULL,
  `misi_id` int(11) DEFAULT NULL,
  `title` varchar(255) NOT NULL,
  `desc` text,
  `nominal` int(11) DEFAULT NULL,
  `point` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data untuk tabel `log_misi`
--

INSERT INTO `log_misi` (`id`, `user_id`, `transaksi_id`, `transaksi_angsuran_id`, `member_id`, `misi_id`, `title`, `desc`, `nominal`, `point`, `created_at`, `updated_at`) VALUES
(8, 4, 65, NULL, 33, 1, 'Aktifasi Member Baru (Pembelian Pertama)', 'Aktifasi member baru dengan pembelian pertama, dengan nomro transaksi TRX-20200405-5', 350000, 1, '2020-04-05 17:05:41', NULL),
(9, 4, 65, NULL, 33, 4, 'Kirim Barang', 'Kirim Barang status =  dengan nomor transaksi TRX-20200405-5', 350000, 1, '2020-04-05 17:44:42', NULL),
(10, 4, 66, NULL, 34, 4, 'Penagihan Kredit', 'penagihan kredit dengan nomor transaksi TRX-20200406-2', 125000, 1, '2020-04-06 17:47:00', NULL),
(11, 4, 66, NULL, 34, 4, 'Kirim Barang', 'Kirim Barang status = send dengan nomor transaksi TRX-20200406-2', 125000, 1, '2020-04-06 18:00:20', NULL),
(12, 4, 73, NULL, 44, 1, 'Aktifasi Member Baru (Pembelian Pertama)', 'Aktifasi member baru dengan pembelian pertama, dengan nomro transaksi TRX-20200609-4', 25000, 1, '2020-06-12 20:23:43', NULL),
(13, 4, 74, NULL, 45, 4, 'Penagihan Kredit', 'penagihan kredit dengan nomor transaksi TRX-20200609-5', 125000, 1, '2020-06-12 20:23:54', NULL),
(14, 4, 74, NULL, 45, 4, 'Penagihan Kredit', 'penagihan kredit dengan nomor transaksi TRX-20200609-5', 125000, 1, '2020-06-12 20:23:59', NULL),
(15, 4, 74, NULL, 45, 4, 'Penagihan Kredit', 'penagihan kredit dengan nomor transaksi TRX-20200609-5', 125000, 1, '2020-06-12 20:24:02', NULL),
(16, 4, 74, NULL, 45, 4, 'Penagihan Kredit', 'penagihan kredit dengan nomor transaksi TRX-20200609-5', 125000, 1, '2020-06-13 06:07:28', NULL),
(17, 4, 74, NULL, 45, 4, 'Penagihan Kredit', 'penagihan kredit dengan nomor transaksi TRX-20200609-5', 125000, 1, '2020-06-13 06:07:30', NULL),
(18, 4, 74, NULL, 45, 4, 'Kirim Barang', 'Kirim Barang status = send dengan nomor transaksi TRX-20200609-5', 125000, 1, '2020-06-13 06:14:10', NULL),
(19, 4, 76, NULL, 48, 1, 'Aktifasi Member Baru (Pembelian Pertama)', 'Aktifasi member baru dengan pembelian pertama, dengan nomro transaksi TRX-20200613-2', 725000, 1, '2020-06-13 16:45:20', NULL),
(20, 4, 76, NULL, 48, 4, 'Kirim Barang', 'Kirim Barang status = send dengan nomor transaksi TRX-20200613-2', 725000, 1, '2020-06-13 16:45:31', NULL),
(21, 4, 77, NULL, 48, 4, 'Penagihan Kredit', 'penagihan kredit dengan nomor transaksi TRX-20200613-3', 150000, 1, '2020-06-13 16:46:58', NULL),
(22, 4, 77, NULL, 48, 4, 'Kirim Barang', 'Kirim Barang status = send dengan nomor transaksi TRX-20200613-3', 150000, 1, '2020-06-13 16:47:20', NULL),
(23, 4, 70, NULL, 27, 2, 'Transaksi Pembelian', 'Transaksi Pembelian member dengan TRX-20200608-2', 145000, 1, '2020-06-14 10:09:22', NULL),
(24, 4, 77, NULL, 48, 4, 'Penagihan Kredit', 'penagihan kredit dengan nomor transaksi TRX-20200613-3', 150000, 1, '2020-06-14 10:10:36', NULL),
(25, 4, 77, NULL, 48, 4, 'Penagihan Kredit', 'penagihan kredit dengan nomor transaksi TRX-20200613-3', 150000, 1, '2020-06-14 10:10:41', NULL),
(26, 4, 77, NULL, 48, 4, 'Penagihan Kredit', 'penagihan kredit dengan nomor transaksi TRX-20200613-3', 150000, 1, '2020-06-14 10:10:43', NULL),
(27, 4, 77, NULL, 48, 4, 'Penagihan Kredit', 'penagihan kredit dengan nomor transaksi TRX-20200613-3', 150000, 1, '2020-06-14 10:10:46', NULL),
(28, 4, 67, NULL, 38, 4, 'Penagihan Kredit', 'penagihan kredit dengan nomor transaksi TRX-20200607-2', 120000, 1, '2020-06-14 10:11:39', NULL),
(29, 4, 67, NULL, 38, 4, 'Penagihan Kredit', 'penagihan kredit dengan nomor transaksi TRX-20200607-2', 120000, 1, '2020-06-14 10:11:40', NULL),
(30, 4, 70, NULL, 27, 4, 'Kirim Barang', 'Kirim Barang status = send dengan nomor transaksi TRX-20200608-2', 145000, 1, '2020-06-14 10:16:57', NULL),
(31, 4, 60, NULL, 31, 1, 'Aktifasi Member Baru (Pembelian Pertama)', 'Aktifasi member baru dengan pembelian pertama, dengan nomro transaksi TRX-20200405-2', 350000, 1, '2020-06-14 10:18:46', NULL),
(32, 4, 75, NULL, 2, 1, 'Aktifasi Member Baru (Pembelian Pertama)', 'Aktifasi member baru dengan pembelian pertama, dengan nomro transaksi TRX-20200612-2', 425000, 1, '2020-06-14 10:29:43', NULL),
(33, 4, 66, NULL, 34, 4, 'Penagihan Kredit', 'penagihan kredit dengan nomor transaksi TRX-20200406-2', 125000, 1, '2020-06-14 10:30:12', NULL),
(34, 4, 67, NULL, 38, 4, 'Kirim Barang', 'Kirim Barang status = send dengan nomor transaksi TRX-20200607-2', 120000, 1, '2020-06-14 10:54:25', NULL),
(35, 4, 69, NULL, 39, 1, 'Aktifasi Member Baru (Pembelian Pertama)', 'Aktifasi member baru dengan pembelian pertama, dengan nomro transaksi TRX-20200607-4', 240000, 1, '2020-06-14 11:38:11', NULL),
(36, 4, 78, NULL, 50, 4, 'Penagihan Kredit', 'penagihan kredit dengan nomor transaksi TRX-20200614-2', 145000, 1, '2020-06-14 11:42:28', NULL),
(37, 4, 78, NULL, 50, 4, 'Penagihan Kredit', 'penagihan kredit dengan nomor transaksi TRX-20200614-2', 145000, 1, '2020-06-14 11:42:43', NULL),
(38, 4, 78, NULL, 50, 4, 'Penagihan Kredit', 'penagihan kredit dengan nomor transaksi TRX-20200614-2', 145000, 1, '2020-06-14 11:42:45', NULL),
(39, 4, 78, NULL, 50, 4, 'Penagihan Kredit', 'penagihan kredit dengan nomor transaksi TRX-20200614-2', 145000, 1, '2020-06-14 11:48:20', NULL),
(40, 9, 79, NULL, 52, 1, 'Aktifasi Member Baru (Pembelian Pertama)', 'Aktifasi member baru dengan pembelian pertama, dengan nomro transaksi TRX-20200615-2', 265000, 1, '2020-06-15 22:05:50', NULL),
(41, 9, 79, NULL, 52, 4, 'Kirim Barang', 'Kirim Barang status = send dengan nomor transaksi TRX-20200615-2', 265000, 1, '2020-06-15 22:08:49', NULL),
(42, 9, 80, NULL, 52, 4, 'Penagihan Kredit', 'penagihan kredit dengan nomor transaksi TRX-20200615-3', 300000, 1, '2020-06-15 22:16:46', NULL),
(43, 9, 80, NULL, 52, 4, 'Penagihan Kredit', 'penagihan kredit dengan nomor transaksi TRX-20200615-3', 300000, 1, '2020-06-15 22:18:27', NULL),
(44, 9, 80, NULL, 52, 4, 'Kirim Barang', 'Kirim Barang status = send dengan nomor transaksi TRX-20200615-3', 300000, 1, '2020-06-15 22:19:24', NULL),
(45, 9, 80, NULL, 52, 4, 'Penagihan Kredit', 'penagihan kredit dengan nomor transaksi TRX-20200615-3', 300000, 1, '2020-06-15 22:20:23', NULL),
(46, 9, 80, NULL, 52, 4, 'Penagihan Kredit', 'penagihan kredit dengan nomor transaksi TRX-20200615-3', 300000, 1, '2020-06-15 22:20:26', NULL),
(47, 9, 80, NULL, 52, 4, 'Penagihan Kredit', 'penagihan kredit dengan nomor transaksi TRX-20200615-3', 300000, 1, '2020-06-15 22:20:28', NULL),
(48, 9, 81, NULL, 52, 4, 'Penagihan Kredit', 'penagihan kredit dengan nomor transaksi TRX-20200615-4', 300000, 1, '2020-06-15 23:42:35', NULL),
(49, 9, 81, NULL, 52, 4, 'Kirim Barang', 'Kirim Barang status = send dengan nomor transaksi TRX-20200615-4', 300000, 1, '2020-06-15 23:49:30', NULL);

-- --------------------------------------------------------

--
-- Struktur dari tabel `log_notif`
--

CREATE TABLE `log_notif` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(255) NOT NULL,
  `desc` text,
  `status` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `log_point`
--

CREATE TABLE `log_point` (
  `id` int(20) NOT NULL,
  `point_id` int(15) NOT NULL,
  `marketing_id` int(15) NOT NULL,
  `member_id` int(15) NOT NULL,
  `tanggal` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COMMENT='untuk menyimpan history dari pada point dari member ataupun marketing';

--
-- Dumping data untuk tabel `log_point`
--

INSERT INTO `log_point` (`id`, `point_id`, `marketing_id`, `member_id`, `tanggal`) VALUES
(29, 25, 4, 44, '2020-06-12 20:23:43'),
(30, 26, 4, 45, '2020-06-12 20:23:54'),
(31, 27, 4, 45, '2020-06-12 20:23:59'),
(32, 28, 4, 45, '2020-06-12 20:24:02'),
(33, 29, 4, 45, '2020-06-13 06:07:28'),
(34, 30, 4, 45, '2020-06-13 06:07:30'),
(35, 31, 4, 45, '2020-06-13 06:14:10'),
(36, 32, 4, 48, '2020-06-13 16:45:20'),
(37, 33, 4, 48, '2020-06-13 16:45:31'),
(38, 34, 4, 48, '2020-06-13 16:46:58'),
(39, 35, 4, 48, '2020-06-13 16:47:20'),
(41, 37, 4, 48, '2020-06-14 10:10:36'),
(42, 38, 4, 48, '2020-06-14 10:10:41'),
(43, 39, 4, 48, '2020-06-14 10:10:43'),
(44, 40, 4, 48, '2020-06-14 10:10:46'),
(45, 41, 4, 38, '2020-06-14 10:11:39'),
(46, 42, 4, 38, '2020-06-14 10:11:40'),
(48, 44, 4, 31, '2020-06-14 10:18:46'),
(49, 45, 4, 2, '2020-06-14 10:29:43'),
(50, 46, 4, 34, '2020-06-14 10:30:12'),
(51, 47, 4, 38, '2020-06-14 10:54:25'),
(52, 48, 4, 39, '2020-06-14 11:38:11'),
(53, 49, 4, 50, '2020-06-14 11:42:28'),
(54, 50, 4, 50, '2020-06-14 11:42:43'),
(55, 51, 4, 50, '2020-06-14 11:42:45'),
(56, 52, 4, 50, '2020-06-14 11:48:20'),
(57, 53, 9, 52, '2020-06-15 22:05:50'),
(58, 54, 9, 52, '2020-06-15 22:08:49'),
(59, 55, 9, 52, '2020-06-15 22:16:46'),
(60, 56, 9, 52, '2020-06-15 22:18:27'),
(61, 57, 9, 52, '2020-06-15 22:19:24'),
(62, 58, 9, 52, '2020-06-15 22:20:23'),
(63, 59, 9, 52, '2020-06-15 22:20:26'),
(64, 60, 9, 52, '2020-06-15 22:20:28'),
(65, 61, 9, 52, '2020-06-15 23:42:35'),
(66, 62, 9, 52, '2020-06-15 23:49:30');

-- --------------------------------------------------------

--
-- Struktur dari tabel `log_setoran`
--

CREATE TABLE `log_setoran` (
  `id` int(10) UNSIGNED ZEROFILL NOT NULL,
  `marketing_id` int(10) UNSIGNED NOT NULL DEFAULT '0',
  `nominal` decimal(10,0) NOT NULL DEFAULT '0',
  `deskripsi` text,
  `status` char(1) DEFAULT '0',
  `handle_by` varchar(50) DEFAULT NULL,
  `creted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data untuk tabel `log_setoran`
--

INSERT INTO `log_setoran` (`id`, `marketing_id`, `nominal`, `deskripsi`, `status`, `handle_by`, `creted_at`) VALUES
(0000000002, 4, '350000', 'setoran', '1', NULL, '2020-04-05 22:58:37'),
(0000000003, 4, '50000', 'setoran', '1', NULL, '2020-04-07 08:30:38'),
(0000000004, 4, '170000', 'setoran', '1', NULL, '2020-06-07 16:54:28'),
(0000000005, 4, '1240000', 'setoran', '1', 'admin', '2020-06-14 10:17:21'),
(0000000006, 4, '350000', 'setoran', '1', 'admin', '2020-06-14 10:19:39'),
(0000000007, 4, '462500', 'setoran', '1', 'admin', '2020-06-14 10:31:06'),
(0000000008, 4, '240000', 'setoran', '1', 'admin', '2020-06-14 11:39:37'),
(0000000009, 4, '2413750', 'setoran', '1', 'admin', '2020-06-15 18:52:08'),
(0000000010, 9, '565000', 'setoran', '1', 'admin', '2020-06-15 22:21:30'),
(0000000011, 9, '50000', 'setoran', '1', 'admin', '2020-06-15 23:48:38');

-- --------------------------------------------------------

--
-- Struktur dari tabel `log_stok`
--

CREATE TABLE `log_stok` (
  `id` int(20) NOT NULL,
  `produk_id` int(15) NOT NULL,
  `tanggal` datetime NOT NULL,
  `masuk` double NOT NULL,
  `keluar` double NOT NULL,
  `sisa` double NOT NULL,
  `keterangan` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COMMENT='digunakan untuk menyimpan history stok dari data produk';

-- --------------------------------------------------------

--
-- Struktur dari tabel `log_transaksi_cicilan`
--

CREATE TABLE `log_transaksi_cicilan` (
  `id` int(20) NOT NULL,
  `transaksi_id` int(20) NOT NULL,
  `tempo` double NOT NULL,
  `tanggal_cicilan` datetime NOT NULL,
  `nominal` double DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COMMENT='digunakan untuk menyimpan cicilan transaksi pembelian produk';

--
-- Dumping data untuk tabel `log_transaksi_cicilan`
--

INSERT INTO `log_transaksi_cicilan` (`id`, `transaksi_id`, `tempo`, `tanggal_cicilan`, `nominal`) VALUES
(1, 66, 1, '2020-04-06 17:47:00', 50000),
(6, 74, 1, '2020-06-12 20:23:54', 50000),
(7, 74, 2, '2020-06-12 20:23:59', 18750),
(8, 74, 3, '2020-06-12 20:24:02', 18750),
(9, 74, 4, '2020-06-13 06:07:28', 18750),
(10, 74, 5, '2020-06-13 06:07:30', 18750),
(11, 77, 1, '2020-06-13 16:46:58', 50000),
(12, 77, 2, '2020-06-14 10:10:36', 25000),
(13, 77, 3, '2020-06-14 10:10:41', 25000),
(14, 77, 4, '2020-06-14 10:10:43', 25000),
(15, 77, 5, '2020-06-14 10:10:46', 25000),
(16, 67, 2, '2020-06-14 10:11:39', 35000),
(17, 67, 3, '2020-06-14 10:11:40', 35000),
(18, 66, 2, '2020-06-14 10:30:12', 37500),
(19, 78, 1, '2020-06-14 11:42:28', 50000),
(20, 78, 2, '2020-06-14 11:42:43', 23750),
(21, 78, 3, '2020-06-14 11:42:45', 23750),
(22, 78, 4, '2020-06-14 11:48:20', 23750),
(23, 80, 1, '2020-06-15 22:16:46', 50000),
(24, 80, 2, '2020-06-15 22:18:27', 62500),
(25, 80, 3, '2020-06-15 22:20:23', 62500),
(26, 80, 4, '2020-06-15 22:20:26', 62500),
(27, 80, 5, '2020-06-15 22:20:28', 62500),
(28, 81, 1, '2020-06-15 23:42:35', 50000);

-- --------------------------------------------------------

--
-- Struktur dari tabel `log_users`
--

CREATE TABLE `log_users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `marketing_id` bigint(20) DEFAULT NULL,
  `member_id` bigint(20) DEFAULT NULL,
  `type` enum('misi','point','trx','regis') NOT NULL,
  `desc` text,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Struktur dari tabel `member`
--

CREATE TABLE `member` (
  `id` int(15) NOT NULL,
  `no_member` char(20) DEFAULT NULL,
  `username` varchar(32) DEFAULT NULL,
  `password` varchar(64) NOT NULL,
  `nama` varchar(100) DEFAULT NULL,
  `tanggal_lahir` date DEFAULT NULL,
  `telepon` char(20) NOT NULL,
  `email` varchar(100) NOT NULL,
  `kata_sandi` varchar(255) DEFAULT NULL,
  `foto` varchar(255) DEFAULT NULL,
  `status` tinyint(1) DEFAULT NULL,
  `tanggal_terdaftar` datetime NOT NULL,
  `point` double DEFAULT NULL,
  `otp` int(6) NOT NULL,
  `fcm_token` varchar(250) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COMMENT='digunakan untuk menyimpan data member';

--
-- Dumping data untuk tabel `member`
--

INSERT INTO `member` (`id`, `no_member`, `username`, `password`, `nama`, `tanggal_lahir`, `telepon`, `email`, `kata_sandi`, `foto`, `status`, `tanggal_terdaftar`, `point`, `otp`, `fcm_token`) VALUES
(1, '1', 'anis maghfiroh', 'fcea920f7412b5da7be0cf42b8c93759', 'Anis Maghfiroh', '1998-03-12', '1111', 'dada@dasda.com', NULL, 'https://api.kanayamember.id/ktp/1592494050-3323075203980001.jpeg', 1, '2019-12-18 00:00:00', 0, 659941, NULL),
(2, '123', 'demo2@gmail.com', 'fcea920f7412b5da7be0cf42b8c93759', 'coba rubah', NULL, '1231231231', 'demo2@gmail.com', NULL, 'http://api.kanayamember.id/foto/member/1592466112-foto.png', 1, '2020-02-18 09:24:51', NULL, 659941, NULL),
(3, '1234', 'demo2j@gmail.com', '60119b2ac76c0215f5dbae08df109aa0', 'Demo Member 2', NULL, '081225275604', 'demo2@gmail.com', NULL, NULL, 0, '2020-02-18 09:27:34', NULL, 659941, NULL),
(4, NULL, NULL, 'd41d8cd98f00b204e9800998ecf8427e', NULL, NULL, '6281328354023', 'asd@gmail.com', NULL, NULL, 1, '2020-02-18 20:00:24', NULL, 659941, NULL),
(5, NULL, NULL, 'd41d8cd98f00b204e9800998ecf8427e', NULL, NULL, '625641496723', 'mahardhika8934@gmail.com', NULL, NULL, 1, '2020-02-18 20:19:56', NULL, 659941, NULL),
(6, NULL, NULL, 'd41d8cd98f00b204e9800998ecf8427e', NULL, NULL, '62813283540232', 'asdf@gmail.com', NULL, NULL, 1, '2020-02-18 20:23:41', NULL, 659941, NULL),
(7, NULL, NULL, 'd41d8cd98f00b204e9800998ecf8427e', NULL, NULL, '6256414967233', 'mahardhika89334@gmail.com', NULL, NULL, 1, '2020-02-18 20:28:34', NULL, 659941, NULL),
(8, NULL, NULL, 'd41d8cd98f00b204e9800998ecf8427e', NULL, NULL, '08665665888', 'as@gmail.com', NULL, NULL, 1, '2020-02-18 20:29:23', NULL, 659941, NULL),
(9, NULL, NULL, 'd41d8cd98f00b204e9800998ecf8427e', NULL, NULL, '089665', 'a@x.com', NULL, NULL, 1, '2020-02-18 20:35:42', NULL, 659941, NULL),
(10, NULL, NULL, 'e10adc3949ba59abbe56e057f20f883e', NULL, NULL, '628132835402328', 'asdaf@gmail.com', NULL, NULL, 1, '2020-02-18 20:40:47', NULL, 659941, NULL),
(11, NULL, NULL, 'b7f6593421d9f21bdd5caef01b24f5c8', NULL, NULL, '087934', 'a@hzx.xom', NULL, NULL, 1, '2020-02-18 21:05:38', NULL, 659941, NULL),
(12, NULL, NULL, 'e10adc3949ba59abbe56e057f20f883e', NULL, NULL, '6281328354023282', 'd@gmail.com', NULL, NULL, 1, '2020-02-19 12:46:51', NULL, 659941, NULL),
(13, '1', 'yuita', 'b7f6593421d9f21bdd5caef01b24f5c8', 'Kake', '2020-02-19', '08764316944', 'z@z.com', NULL, NULL, 0, '2020-02-19 13:11:09', 0, 659941, NULL),
(14, NULL, NULL, 'b7f6593421d9f21bdd5caef01b24f5c8', NULL, NULL, '0879643464', 'c@c.com', NULL, NULL, 1, '2020-02-19 13:14:03', NULL, 659941, NULL),
(15, NULL, NULL, 'b7f6593421d9f21bdd5caef01b24f5c8', NULL, NULL, '0879463116', 'ba@ba.fom', NULL, NULL, 1, '2020-02-19 13:24:57', NULL, 659941, NULL),
(16, NULL, NULL, 'b7f6593421d9f21bdd5caef01b24f5c8', NULL, NULL, '084673164', 'vz@js.xk', NULL, NULL, 1, '2020-02-19 13:29:10', NULL, 659941, NULL),
(17, NULL, NULL, 'b7f6593421d9f21bdd5caef01b24f5c8', NULL, NULL, '87936838', 'jj@cd.xo', NULL, NULL, 1, '2020-02-19 13:35:07', NULL, 659941, NULL),
(18, NULL, NULL, 'b7f6593421d9f21bdd5caef01b24f5c8', NULL, NULL, '087634364', 'faf@sj.ci', NULL, NULL, 1, '2020-02-19 13:38:09', NULL, 659941, NULL),
(19, '1', 'naman', 'b7f6593421d9f21bdd5caef01b24f5c8', 'Jaja', '2020-02-19', '08496674', 'hsh@ksks.ck', NULL, NULL, 0, '2020-02-19 20:42:06', 0, 659941, NULL),
(20, NULL, NULL, 'b7f6593421d9f21bdd5caef01b24f5c8', NULL, NULL, '084336164', 's@s.com', NULL, NULL, 1, '2020-02-19 20:50:01', NULL, 659941, NULL),
(21, '1', 'member12322', 'e10adc3949ba59abbe56e057f20f883e', 'member12332', '2012-12-12', '62564149672353', 'mahardhika893374@gmail.com', NULL, NULL, 0, '2020-02-19 21:01:24', 0, 659941, NULL),
(22, '2', 'tyuin', 'b7f6593421d9f21bdd5caef01b24f5c8', 'Jiiiuu', '2020-02-19', '66555', 'd@r.j', NULL, NULL, 0, '2020-02-19 21:15:22', 0, 659941, NULL),
(23, '3', 'anggit19', 'e10adc3949ba59abbe56e057f20f883e', '3301937464829204947', '1993-10-19', '081237855559', 'anggitrestupi@gmail.com', NULL, NULL, 0, '2020-02-20 09:55:02', 0, 659941, NULL),
(24, NULL, NULL, 'b7f6593421d9f21bdd5caef01b24f5c8', NULL, NULL, '0849466464', 'jsi@ksks.com', NULL, NULL, 1, '2020-02-20 10:01:07', NULL, 659941, NULL),
(25, '1', 'qwert', 'b7f6593421d9f21bdd5caef01b24f5c8', 'Anoa', '2020-02-20', '084631694961', 'ajj@os.ck', NULL, NULL, 0, '2020-02-20 10:14:03', 0, 659941, NULL),
(26, '2', 'hahas', 'b7f6593421d9f21bdd5caef01b24f5c8', 'Jajaj', '2020-02-27', '875464646', 'b@ns.xkks', NULL, NULL, 0, '2020-02-27 21:38:16', 0, 659941, NULL),
(27, '3', 'Anggit Restu ', 'adcc561a2eb7a0cef0f110d4041ac166', 'Anggit Restu pi', '1993-10-19', '081238755559', 'anggitasaras44@gmail.com', NULL, NULL, 1, '2020-03-24 02:14:16', 0, 659941, NULL),
(28, '4', 'manksa', 'b7f6593421d9f21bdd5caef01b24f5c8', 'Jakal', '2020-03-27', '084643163', 'caca@ca.com', NULL, NULL, 0, '2020-03-27 19:25:50', 0, 659941, NULL),
(29, '5', 'jakeiwae', 'e10adc3949ba59abbe56e057f20f883e', 'Jsjw', '2020-04-02', '628132835402312', 'asd@a.com', NULL, NULL, 0, '2020-04-02 09:07:52', 0, 659941, 'asd'),
(30, '6', 'namajsw', 'e10adc3949ba59abbe56e057f20f883e', 'Nasha', '2020-04-04', '62813283547', 'b@a.com', NULL, NULL, 1, '2020-04-04 07:39:25', 0, 659941, 'asd'),
(31, '7', 'jaksolq', 'fcea920f7412b5da7be0cf42b8c93759', 'Nkwjwjqa', '2020-04-04', '62813283541', 'c@a.com', NULL, NULL, 0, '2020-04-04 07:42:48', 0, 659941, 'asd'),
(32, '8', 'nabshamq', 'fcea920f7412b5da7be0cf42b8c93759', 'Aman', '2020-04-05', '6281328354', 'd@a.com', NULL, NULL, 0, '2020-04-05 05:27:38', 0, 659941, 'asd'),
(33, '9', 'kaoeiua', 'fcea920f7412b5da7be0cf42b8c93759', 'Nakakw', '2020-04-05', '6281328345', 'q@a.com', NULL, NULL, 0, '2020-04-05 17:02:56', 0, 659941, 'asd'),
(34, '10', 'hahalm', 'fcea920f7412b5da7be0cf42b8c93759', 'Nams', '2020-04-06', '897673431', 'z@zz.com', NULL, NULL, 0, '2020-04-06 17:43:58', 0, 659941, '-'),
(35, '11', 'anggit19993', 'e10adc3949ba59abbe56e057f20f883e', '1234567890135689', '1993-06-04', '081238755558', 'fixitstudio2020@gmail.com', NULL, NULL, 1, '2020-06-04 14:45:58', 0, 659941, '-'),
(37, NULL, NULL, '59175cc624e9e6490eb76a8f4b04ec6e', NULL, NULL, '085228793390', 'watiindra971@gmail.com', NULL, NULL, 1, '2020-06-07 14:28:24', NULL, 659941, '-'),
(38, '1', 'anggitqo', 'adcc561a2eb7a0cef0f110d4041ac166', 'Anggito', '1995-06-07', '081238755556', 'anggit.folarium@gmail.com', NULL, NULL, 1, '2020-06-07 14:32:35', 0, 659941, '-'),
(39, '1', 'andriyanike', '04960c55ce6db853882af76ea515444d', 'Ike Andriyani', '1990-03-27', '085700807594', 'ikelovejourney@gmail.com', NULL, NULL, 1, '2020-06-07 14:35:58', 0, 659941, '-'),
(40, NULL, NULL, '59175cc624e9e6490eb76a8f4b04ec6e', NULL, NULL, '085227413044', 'journeypremium06@gmail.com', NULL, NULL, 1, '2020-06-07 14:39:24', NULL, 659941, '-'),
(41, '1', 'anggit1999', 'adcc561a2eb7a0cef0f110d4041ac166', 'Ananana', '1993-06-08', '081238755555', 'anggit.kma@gmail.com', NULL, NULL, 1, '2020-06-08 22:36:17', 0, 659941, '-'),
(42, '2', 'hagal', 'b7f6593421d9f21bdd5caef01b24f5c8', 'Hagal', '2020-06-09', '084643343161', 'a@a.com', NULL, NULL, 1, '2020-06-09 10:10:34', 0, 659941, '-'),
(43, NULL, NULL, 'b7f6593421d9f21bdd5caef01b24f5c8', NULL, NULL, '084664136464', 'sjak@sksk.com', NULL, NULL, 1, '2020-06-09 10:14:29', NULL, 659941, '-'),
(44, '1', 'tauao', 'b7f6593421d9f21bdd5caef01b24f5c8', 'Test', '2020-06-09', '0846641364644', 'sjak@sksk.coma', NULL, NULL, 1, '2020-06-09 10:15:38', 0, 659941, '-'),
(45, '2', 'uajar', 'b7f6593421d9f21bdd5caef01b24f5c8', 'Zisie', '2020-06-09', '00946431314', 'aks@kak.cos', NULL, NULL, 1, '2020-06-09 10:19:10', 0, 659941, '-'),
(46, NULL, NULL, '9f029d457b15c25aab83e1be8b6b64b2', NULL, NULL, '085559480884', 'pabrik.printiing@gmail.com', NULL, NULL, 1, '2020-06-11 14:59:53', NULL, 659941, '-'),
(47, '1', 'garut', 'b7f6593421d9f21bdd5caef01b24f5c8', 'Gg', '2020-06-13', '0864576761', 'ga@ja.fom', NULL, 'https://api.kanayamember.idktpGg-611634646131314245.jpeg', 1, '2020-06-13 06:15:12', 0, 659941, '-'),
(48, '2', 'hajar', 'b7f6593421d9f21bdd5caef01b24f5c8', 'Hajar', '2020-06-13', '089767646974', 'avc@a.com', NULL, 'https://api.kanayamember.idktpHajar-546769164645575431.jpeg', 1, '2020-06-13 16:37:06', 0, 659941, '-'),
(49, NULL, NULL, 'a3e642ab9fa6196f468757c4c0e84971', NULL, NULL, '081123877549', 'anggitakraf@gmail.com', NULL, NULL, 1, '2020-06-14 10:55:56', NULL, 659941, '-'),
(50, '1', 'hahaha', 'b7f6593421d9f21bdd5caef01b24f5c8', 'Ha', '2020-06-14', '08494634316', 'haha@haha.com', NULL, 'https://api.kanayamember.idktpHa-1234567890123456.jpeg', 0, '2020-06-14 11:19:28', 0, 659941, '-'),
(51, NULL, NULL, 'b7f6593421d9f21bdd5caef01b24f5c8', NULL, NULL, '64343766431', 'ga@ga.com', NULL, NULL, 1, '2020-06-14 11:48:41', NULL, 659941, '-'),
(52, '1', 'anggitaq', 'adcc561a2eb7a0cef0f110d4041ac166', 'Anggita sarasss', '1995-06-15', '081238755551', 'tina@gmail.com', NULL, 'https://api.kanayamember.idktpAnggita sarasss-1234567891234562.jpeg', 1, '2020-06-15 17:58:40', 0, 659941, '-'),
(53, NULL, NULL, 'c5bf3de7e3f5cfd211c2d73181899a17', NULL, NULL, '85879494571', 'fendysketsa@gmail.com', NULL, NULL, 1, '2020-06-15 18:02:23', NULL, 659941, '-'),
(54, '1', 'ellazahra', 'c64cb069df8847126660750ce4ad06bd', 'laelatul zahro', '1996-09-15', '089676566965', 'ella_zahra@yahoo.com', NULL, 'https://api.kanayamember.id/ktp/laelatulzahro-3323175509960001.jpeg', 1, '2020-06-16 11:52:10', 0, 659941, '-'),
(55, '1', 'baby blue', '841cd6440804f87bfb9907624e2021be', 'Nurul Chonifah', '1988-03-23', '085729155055', 'choenifah23@gmail.com', NULL, 'https://api.kanayamember.id/ktp/NurulChonifah-3323086303880001.jpeg', 1, '2020-06-16 11:57:13', 0, 659941, '-'),
(56, NULL, NULL, 'ee93bd1275ee0b07bf768bc2ef7bef02', NULL, NULL, '081392412225', 'ifahaiva86@gmail.com', NULL, NULL, 1, '2020-06-16 11:59:17', NULL, 659941, '-'),
(57, '1', 'annais', '80706edfd4f4fdf280a50bf97d6e4b52', 'anna ismariyana', '2020-06-16', '081578083860', 'annaismariyana@gmail.com', NULL, 'https://api.kanayamember.id/ktp/annaismariyana-3323065107810002.jpeg', 1, '2020-06-16 12:25:17', 0, 659941, '-'),
(58, NULL, NULL, 'b7f6593421d9f21bdd5caef01b24f5c8', NULL, NULL, '08464673461', 'a@n.com', NULL, NULL, 1, '2020-06-16 12:34:19', NULL, 659941, '-'),
(59, '2', 'anggitas', 'adcc561a2eb7a0cef0f110d4041ac166', 'Anggitass', '1976-06-16', '081238755549', 'tina@mailinator.com', NULL, 'https://api.kanayamember.id/ktp/Anggitass-1234567891234569.jpeg', 1, '2020-06-16 12:41:25', 0, 659941, '-'),
(60, '2', 'CikMey', 'abe3d401f8b17705b8e9c5057e6bc84a', 'Khasanah', '1995-11-30', '085729858454', 'khasanahmey941@gmail.com', NULL, 'https://api.kanayamember.id/ktp/Khasanah-3323093011950003.jpeg', 1, '2020-06-16 12:45:55', 0, 659941, '-'),
(61, '1', 'Nur Hidayah', '862cd6e6f65b2aeb0106b85137feebaa', 'Nur Hidayah', '2020-06-16', '081575896232', 'www.bagos@yahoo.com', NULL, 'https://api.kanayamember.id/ktp/NurHidayah-3323085210910005.jpeg', 1, '2020-06-16 13:42:27', 0, 659941, '-'),
(62, NULL, NULL, 'e10adc3949ba59abbe56e057f20f883e', NULL, NULL, '082323588382', 'erlinamerah123@gmail.com', NULL, NULL, 1, '2020-06-16 14:25:57', NULL, 659941, '-'),
(63, '1', 'Vivi Roviana', 'a579eaf13ae3dfe2fd7cfd97930de450', 'Vivi Roviana', '2000-04-13', '082325723603', 'viviroviana2000@gmail.com', NULL, 'https://api.kanayamember.id/ktp/1592531662-3323155304000001.jpeg', 1, '2020-06-16 15:12:58', 0, 659941, '-'),
(64, NULL, NULL, '3d62a870dccd7decb0f4a20619666f76', NULL, NULL, '081327347700', 'rininaura67214@gmail.com', NULL, NULL, 1, '2020-06-16 15:36:37', NULL, 659941, '-'),
(65, NULL, NULL, 'ea8252b73fa85c49f07c3bb806ec3aaa', NULL, NULL, '082324411365', 'wprastya8@gmail.com', NULL, NULL, 1, '2020-06-16 15:43:58', NULL, 659941, '-'),
(66, '2', 'suci farrel', '1e4fc6a0352a3e69f7e57f501f21cbab', 'Sucizulaekhah', '1985-09-20', '088239136275', 'butikprinting@gmail.com', NULL, 'https://api.kanayamember.id/ktp/Sucizulaekhah-3323066009850002.jpeg', 1, '2020-06-16 16:13:15', 0, 659941, '-'),
(67, '1', 'Tya puspita dewi', '1ba1ff8ccaa367b760c13d9b461e7f75', 'Tya Puspita Dewi', '1993-08-11', '083835722390', 'tyapuspitatemanggung@gmail.com', NULL, 'https://api.kanayamember.id/ktp/TyaPuspitaDewi-3323065108930001.jpeg', 1, '2020-06-16 16:14:33', 0, 659941, '-'),
(68, NULL, NULL, 'e28c7e6b1f4bedb41691be784a4e2a3b', NULL, NULL, '083874725951', 'fatwaanisa008@gmail.com', NULL, NULL, 1, '2020-06-16 16:27:04', NULL, 659941, '-'),
(69, NULL, NULL, 'cc3786adc94557fe26b03c8e50df00e0', NULL, NULL, '082313738463', 'nisaasniyasita@gmail.com', NULL, NULL, 1, '2020-06-16 17:43:39', NULL, 659941, '-'),
(70, NULL, NULL, '749e5bf53a61e6331d0c339bc3a0a2d2', NULL, NULL, '085700657343', 'safirakurniadamayanti30@gmail.com', NULL, NULL, 1, '2020-06-16 17:49:47', NULL, 659941, '-'),
(71, NULL, NULL, '9b2e8e450d95ba6f9c13b9fc4b7b260c', NULL, NULL, '085879616249', 'faisalalgadavi@gmail.com', NULL, NULL, 1, '2020-06-16 17:55:31', NULL, 659941, '-'),
(72, '1', 'Leni Musyarifah', '365b35ad21d533e578c94a4e990f757d', 'Leni Musyarifah', '2020-06-16', '085727839663', 'mleny324@yahoo.com', NULL, 'https://api.kanayamember.id/ktp/LeniMusyarifah-3323114609920001.jpeg', 1, '2020-06-16 22:05:50', 0, 659941, '-'),
(73, '1', 'Priskila', '5821a0230ac32482b13cf0e16661e1a3', 'Priskila purwati', '1994-09-06', '085747110030', 'priskilacila2251@gmail.com', NULL, 'https://api.kanayamember.id/ktp/Priskilapurwati-3323064609940003.jpeg', 1, '2020-06-17 05:51:13', 0, 659941, '-'),
(74, '2', 'Nurul12', '2b81650b2e09238c36d9b14da8a1f2bf', 'Nurul Hikmah', '1980-08-23', '089527149179', 'yollawindi14@gmail.com', NULL, 'https://api.kanayamember.id/ktp/1592479091-3323086308800001.jpeg', 1, '2020-06-17 08:52:38', 0, 659941, '-'),
(75, NULL, NULL, '02c7a29cabba899db95c63b28279f253', 'Subiyati', '1996-12-06', '082271071955', 'iphonefatma77@gmail.com', NULL, 'https://system.kanayamember.id/storages/upload/member/images/1ce272d504e134862d648ec55b98245b.jpeg', 1, '2020-06-17 09:23:44', NULL, 659941, '-'),
(76, '1', 'wahyu', '3480006610e627202b578d413233cbe3', 'Wahyuningsih', '1996-08-01', '08156690385', 'Aieux_community@yahoo.com', NULL, 'https://api.kanayamember.id/ktp/Wahyuningsih-3323074108960001.jpeg', 1, '2020-06-17 10:13:00', 0, 659941, '-'),
(77, NULL, NULL, '795d06be396b531429062839431f3b52', NULL, NULL, '081779241980', 'firmanrajapasir@gmail.com', NULL, NULL, 1, '2020-06-17 10:23:13', NULL, 659941, '-'),
(78, NULL, NULL, '9cdf9274569c2ae0bf65950318fc0c88', 'Wirasti', '1989-03-08', '083866811918', 'perillegavrilla@yahoo.co.id', NULL, 'https://system.kanayamember.id/storages/upload/member/images/e0e13acf38a5c7733c193f9464d6acca.jpeg', 1, '2020-06-17 10:52:55', NULL, 659941, '-'),
(79, '1', 'Fauziah wahyu', '59aea0f7ab68cd5f8db56679652a2af4', 'Wahyu Fauziah Kurniawati', '2002-03-24', '085741511382', 'wahyufauziyah96@gmail.com', NULL, 'https://api.kanayamember.id/ktp/1592490497-3323036403020001.jpeg', 1, '2020-06-17 11:47:54', 0, 659941, '-'),
(80, NULL, NULL, 'd28be49df1d3414659b10d7cacab9f7b', NULL, NULL, '085877671424', 'difaknrwn62@gmail.com', NULL, NULL, 1, '2020-06-17 14:05:40', NULL, 659941, '-'),
(81, NULL, NULL, '9333b9ec43517d03253b1b541379e17e', NULL, NULL, '085725018576', 'azkaimha0@gmail.com', NULL, NULL, 1, '2020-06-17 14:18:09', NULL, 659941, '-'),
(82, '1', 'musohihul', 'dad3b04db10458c2a9e41f4684442a0b', 'Musohihul Hasanah', '1995-08-21', '085228364002', 'musohihulhasanah7@gmail.com', NULL, 'https://api.kanayamember.id/ktp/MusohihulHasanah-3323016108950001.jpeg', 1, '2020-06-17 14:19:28', 0, 659941, '-'),
(83, '1', 'Laila Cholifatun Chasanah ', '636cf25b086b2b0b624bb1959b286a55', 'Laila Cholifatun Chasanah', '1998-10-20', '088232674504', 'lailacholifatunchasanah@gmail.com', NULL, 'https://api.kanayamember.id/ktp/LailaCholifatunChasanah-3323066010980002.jpeg', 1, '2020-06-17 14:19:51', 0, 659941, '-'),
(84, NULL, NULL, '8ab17450a5f7a2303636e5f508399fc4', NULL, NULL, '082326607942', 'linatarlina708@gmail.com', NULL, NULL, 1, '2020-06-17 14:20:20', NULL, 659941, '-'),
(85, NULL, NULL, '2762e572c87a1c6c12bfc592aa6fb831', NULL, NULL, '085839175651', 'selviaselly2301@gmail.com', NULL, NULL, 1, '2020-06-17 14:34:44', NULL, 659941, '-'),
(86, '1', 'designlayana', 'adcc561a2eb7a0cef0f110d4041ac166', 'Design layana', '1992-06-17', '081238755557', 'design.layana@gmail.com', NULL, 'https://api.kanayamember.id/ktp/Designlayana-1234567891234567.jpeg', 1, '2020-06-17 16:00:15', 0, 659941, '-'),
(87, '1', 'siti mariyam', 'fd23699fcf42cb26cf77512427edb063', 'Siti Mariyam', '1973-04-04', '083105382085', 'galihaji0804@gmail.com', NULL, 'https://api.kanayamember.id/ktp/1592531432-3323064404730003.jpeg', 1, '2020-06-17 16:25:09', 0, 659941, '-'),
(88, '1', 'astri susilo murti', 'fd23699fcf42cb26cf77512427edb063', 'Astri Susilo Murti', '1984-10-07', '082136916163', 'ballonjuice@yahoo.com', NULL, 'https://api.kanayamember.id/ktp/1592530097-3323064710840001.jpeg', 1, '2020-06-17 16:56:16', 0, 659941, '-'),
(89, NULL, NULL, '2b12b41a380de4605e5944f74eaabf9d', 'Devi Ambarwati', '1995-10-11', '085602808575', 'Bhangkitarsenio123@gmail.com', NULL, 'https://system.kanayamember.id/storages/upload/member/images/f46d58e96f662f63da46845402648673.jpeg', 1, '2020-06-17 17:38:39', NULL, 659941, '-'),
(90, '1', 'siti thoyibatun', '5bce6dfd573e23b4cb17db7198c05688', 'Siti Thoyibatun', '2020-09-19', '085702573409', 'bima123@gmail.com', NULL, 'https://api.kanayamember.id/ktp/1592470782-3323065909960002.jpeg', 1, '2020-06-17 18:33:45', 0, 659941, '-'),
(91, '1', 'Tarmi123', '589a582140d12a0bf2c5b69ff578cb36', 'Tarmi', '1973-02-19', '085228845718', 'violalestiana@gmail.com', NULL, 'https://api.kanayamember.id/ktp/1592476251-3323085902730001.jpeg', 1, '2020-06-17 18:37:05', 0, 659941, '-'),
(92, '1', 'khomsa', 'e749be609114d29769022793f73c4b36', 'Siti Khomsatun Wijayanti', '1993-08-01', '088226401840', 'wijayantikhomsa@gmail.com', NULL, 'https://api.kanayamember.id/ktp/1592537835-3323034108930001.jpeg', 1, '2020-06-17 19:55:11', 0, 659941, '-'),
(93, NULL, NULL, '8083c39d6453ae4e364390b92de5c45d', NULL, NULL, '0881025545595', 'thaliaadiva@gmail.com', NULL, NULL, 1, '2020-06-17 20:13:18', NULL, 659941, '-'),
(94, NULL, NULL, '8b9f5936a5165a8f50b8f8f2411864ce', NULL, NULL, '0895338999314', 'fajaryulianggoro@gmail.com', NULL, NULL, 1, '2020-06-17 21:11:41', NULL, 659941, '-'),
(95, NULL, NULL, '3ef79cd346ca9437ad50d84caff7040a', NULL, NULL, '085975263771', 'nelambil17@gmail.com', NULL, NULL, 1, '2020-06-18 08:51:46', NULL, 659941, '-'),
(96, NULL, NULL, '966b4b7c9d22cd67ad22b5df703dda34', NULL, NULL, '081391018272', 'vinanda656@gmail.com', NULL, NULL, 1, '2020-06-18 08:53:47', NULL, 659941, '-'),
(97, NULL, NULL, '3a78cc90086c1b229f759f393e5f8cba', NULL, NULL, '088806947192', 'adilakeyshiva@yahoo.com', NULL, NULL, 1, '2020-06-18 09:16:38', NULL, 659941, '-'),
(98, NULL, NULL, 'e2998abe9808c33b0b7e8a47015536b1', NULL, NULL, '089620413187', 'hanisdevita21@gmail.com', NULL, NULL, 1, '2020-06-18 09:21:39', NULL, 659941, '-'),
(99, NULL, NULL, '410787a7ce5d1fe84652d244477a83ea', NULL, NULL, '085227319191', 'hahidahmuhdrika27@gmail.com', NULL, NULL, 1, '2020-06-18 10:19:21', NULL, 659941, '-'),
(100, NULL, NULL, 'bff73d01e1296c4079df040a140c6ee9', 'Siti Nurwanti', '1992-12-02', '081325498753', 'najuwasalsha@gmail.com', NULL, 'https://system.kanayamember.id/storages/upload/member/images/2d3a0bf7616e4aa70433a34916b5ad5c.jpeg', 1, '2020-06-18 10:33:42', NULL, 659941, '-'),
(101, NULL, NULL, '604c896c07cdf6c98e6dc5e471898cfd', 'Fika Oktafiasari', '2000-10-23', '081237694327', 'ervikhaokthaoktha23@gmail.com', NULL, 'https://system.kanayamember.id/storages/upload/member/images/4688dca0b02ad615aacca387ddbd2944.jpeg', 1, '2020-06-18 10:45:29', NULL, 659941, '-'),
(102, NULL, NULL, '6397cf54e4d1b9e353fbc4513f1bc68a', NULL, NULL, '081225966659', 'enovita240@gmail.com', NULL, NULL, 1, '2020-06-18 11:26:51', NULL, 659941, '-'),
(103, NULL, NULL, 'ee79914795b072c872aa6e715bb136bd', 'Khikmatul Janah', '1995-02-21', '085729332232', 'bragatama4@gmail.com', NULL, 'https://system.kanayamember.id/storages/upload/member/images/1e33696b0a62d1030086d0e9aad4f85e.jpeg', 1, '2020-06-18 11:49:36', NULL, 659941, '-'),
(104, NULL, NULL, '1e6111c4455e693933a0fef341c39f79', 'Rukanah', '1966-01-12', '088232108260', 'sintisintyarini@gmail.com', NULL, 'https://system.kanayamember.id/storages/upload/member/images/aed44c558fbbaf803f49929f73f8017f.jpeg', 1, '2020-06-18 12:01:10', NULL, 659941, '-'),
(105, '1', 'Atik anggraini', 'd48e688354d69f62d301e7a830055aec', 'Atik Anggraini', '1988-12-02', '085786237610', 'calyanindi@gmail.com', NULL, 'https://api.kanayamember.id/ktp/1592471681-3323084212880002.jpeg', 1, '2020-06-18 12:43:22', 0, 659941, '-'),
(106, NULL, NULL, 'b7f6593421d9f21bdd5caef01b24f5c8', NULL, NULL, '464331614', 'hah@b.com', NULL, NULL, 0, '2020-06-18 12:50:10', NULL, 659941, '-'),
(107, NULL, NULL, '4a3ee40dd9e0854316be7b10da2f8f08', 'Daryati ', '1966-11-07', '085292785911', 'wid25873@gmail.com', NULL, 'https://system.kanayamember.id/storages/upload/member/images/b8f11c6c466b13e99c6681c493792b6f.jpeg', 1, '2020-06-18 12:56:53', NULL, 659941, '-'),
(108, NULL, NULL, 'e10adc3949ba59abbe56e057f20f883e', NULL, NULL, '5656573', 'member121@member.com', NULL, NULL, 0, '2020-06-18 13:38:24', NULL, 659941, 'sfsfsferwrw54f'),
(109, NULL, NULL, 'e10adc3949ba59abbe56e057f20f883e', NULL, NULL, '56565734', 'member122@member.com', NULL, NULL, 0, '2020-06-18 13:45:43', NULL, 659941, 'sfsfsferwrw54f'),
(110, NULL, NULL, 'e10adc3949ba59abbe56e057f20f883e', NULL, NULL, '565657343', 'member112@member.com', NULL, NULL, 0, '2020-06-18 13:56:29', NULL, 659941, 'sfsfsferwrw54f'),
(111, '1', 'member12121', 'e10adc3949ba59abbe56e057f20f883e', 'member aja', '1993-08-08', '5656573432', 'member1112@member.com', NULL, 'http://api.kanayamember.id/ktp/1592466383-131231231.jpeg', 0, '2020-06-18 14:32:26', 0, 659941, 'sfsfsferwrw54f'),
(112, NULL, NULL, 'e10adc3949ba59abbe56e057f20f883e', NULL, NULL, '085711569625', 'murtiningsih161217@gmail.com', NULL, NULL, 1, '2020-06-18 14:50:19', NULL, 659941, '-'),
(113, NULL, NULL, '0db16301eea6da8ddfd3d8da2a8a3cbf', 'Dhina Christi Aprilia', '2001-04-13', '081541255971', 'maticatimothyc@gmail.com', NULL, 'https://system.kanayamember.id/storages/upload/member/images/6dd7354a8473fb655ad47feca0d4a3aa.jpeg', 1, '2020-06-18 15:11:57', NULL, 659941, '-'),
(114, NULL, NULL, 'd4a5b974e09841781c7e80026e46340b', NULL, NULL, '085800306590', 'istianadwilestari@gmail.com', NULL, NULL, 1, '2020-06-18 15:14:50', NULL, 659941, '-'),
(115, '1', 'Viki Vidda', 'c4790a5a625f845651172a7f072180ca', ' Viki Kustriyani', '2020-06-18', '082141929838', 'bintantio@gmail.com', NULL, 'https://api.kanayamember.id/ktp/1592469323-3323064405880001.jpeg', 1, '2020-06-18 15:28:59', 0, 659941, '-'),
(116, NULL, NULL, '84dfb92a4d5e7f2027efa0d6e9ae394f', NULL, NULL, '085643833465', 'fanggi3g@gmail.com', NULL, NULL, 1, '2020-06-18 15:47:28', NULL, 659941, '-'),
(117, '1', 'zulvania', '1c9b510620e34f7c34df79862c8bb4b0', 'Zulvania Desti Fitriana', '2001-12-08', '088215723299', 'thaliaadivaa@gmail.com', NULL, 'https://api.kanayamember.id/ktp/1592478608-3323084812010001.jpeg', 1, '2020-06-18 18:06:59', 0, 659941, '-'),
(118, NULL, NULL, 'eda908cd6f5d5b2d40724c7975d25932', NULL, NULL, '085643883127', 'ningrum.oteng721@gmail.com', NULL, NULL, 1, '2020-06-18 20:08:37', NULL, 659941, '-'),
(119, '1', 'ivanafatma', '1d2fbfcbe3c6e77e1327a709d15a101b', 'ivana fatmawati', '1999-08-29', '089621561587', 'ivanafatmawati9@gmail.com', NULL, 'https://api.kanayamember.id/ktp/1592487994-3323066908990002.jpeg', 1, '2020-06-18 20:42:56', 0, 659941, '-'),
(120, '2', 'Ana Mila', '187e87fed30517b38b9272299f682246', 'Ana Mukaromah ', '1996-06-10', '085801898117', 'anatmg18@gmail.com', NULL, 'https://api.kanayamember.id/ktp/1592491489-3322205006960002.jpeg', 1, '2020-06-18 21:13:44', 0, 659941, '-'),
(121, NULL, NULL, 'f2594084d9c34b8287df9fa1ae272cdf', NULL, NULL, '081228217802', 'sarifud2301@gmail.com', NULL, NULL, 1, '2020-06-18 22:02:45', NULL, 659941, '-'),
(122, NULL, NULL, 'f2594084d9c34b8287df9fa1ae272cdf', NULL, NULL, '085777814285', 'sarifudin27849@gmail.com', NULL, NULL, 1, '2020-06-18 22:12:42', NULL, 659941, '-'),
(123, NULL, NULL, 'f2594084d9c34b8287df9fa1ae272cdf', 'Testing editing', '2020-06-19', '088239726424', 'magfiroh133@gmail.com', NULL, 'https://system.kanayamember.id/storages/upload/member/images/364e11d85736bd0c7e22f5a5bbad13b4.jpeg', 1, '2020-06-18 22:16:27', NULL, 659941, '-'),
(124, '1', 'Maulita', 'b39e8f7160f877a214084b3677fc242f', 'Maulita Intan', '1997-07-19', '081228997467', 'maulitaintan56@gmail.com', NULL, 'https://api.kanayamember.id/ktp/1592532376-3323095907970001.jpeg', 1, '2020-06-19 08:57:59', 0, 58928, '-'),
(125, '2', 'Rani123', 'e8c994c5616ba61ec70f2f23d6a1a69e', 'Oktafia Irany', '1979-10-06', '085226318732', 'oktairani494@gmail.com ', NULL, 'https://api.kanayamember.id/ktp/1592534848-3323084610790003.jpeg', 1, '2020-06-19 09:38:57', 0, 205111, '-'),
(126, '1', 'sartiningsih', '385a382b5e765023ca273b4edbfd1cca', 'Sartiningsih ', '1994-10-15', '082243324125', 'alunasekar0@gmail.com', NULL, 'https://api.kanayamember.id/ktp/1592536140-3323175510940003.jpeg', 1, '2020-06-19 10:02:06', 0, 622718, '-'),
(127, NULL, NULL, '4a3ee40dd9e0854316be7b10da2f8f08', NULL, NULL, '6282131342835', 'lilisalifia93@gmail.com', NULL, NULL, 1, '2020-06-19 10:06:57', NULL, 41626, '-'),
(128, '1', 'nur rofingah', '4a3ee40dd9e0854316be7b10da2f8f08', 'Nur Rofingah', '1983-01-26', '088983683260', 'trihasmoro614@gmail.com', NULL, 'https://api.kanayamember.id/ktp/1592539223-3323066601830001.jpeg', 1, '2020-06-19 10:09:30', 0, 67871, '-'),
(129, '1', 'saniyah', '4ddf42ae340c692e561df6d396aef17f', 'Saniyah', '1976-01-18', '085725067583', 'saniyahsaniyah980@gmail.com', NULL, 'https://api.kanayamember.id/ktp/1592536732-3323085801760001.jpeg', 1, '2020-06-19 10:13:45', 0, 743098, '-'),
(130, NULL, NULL, 'af8eb8fab32b405782272ba2d05d0a02', NULL, NULL, '082131341789', 'kedipsaptaji11@gmail.com', NULL, NULL, 0, '2020-06-19 10:31:08', NULL, 358013, '-'),
(131, NULL, NULL, '41b82fe1cffc11b003a55d3f50804119', NULL, NULL, '08822530158', 'daryonoo758@gmail.com', NULL, NULL, 1, '2020-06-19 10:57:52', NULL, 611797, '-');

-- --------------------------------------------------------

--
-- Struktur dari tabel `member_detail`
--

CREATE TABLE `member_detail` (
  `id` int(18) NOT NULL,
  `member_id` int(15) NOT NULL,
  `kecamatan_id` int(10) NOT NULL,
  `status_hub_id` int(5) DEFAULT NULL,
  `tempat_lahir` varchar(50) NOT NULL,
  `tanggal_lahir` date NOT NULL,
  `pekerjaan` varchar(50) NOT NULL,
  `alamat_kerja` varchar(200) DEFAULT NULL,
  `alamat_tinggal` varchar(200) NOT NULL,
  `alamat_gmap` varchar(200) NOT NULL,
  `latitude` varchar(50) DEFAULT NULL,
  `longitude` varchar(50) DEFAULT NULL,
  `nomor_ktp` char(20) NOT NULL,
  `foto_ktp` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COMMENT='digunakan untuk menyimpan data detail member';

--
-- Dumping data untuk tabel `member_detail`
--

INSERT INTO `member_detail` (`id`, `member_id`, `kecamatan_id`, `status_hub_id`, `tempat_lahir`, `tanggal_lahir`, `pekerjaan`, `alamat_kerja`, `alamat_tinggal`, `alamat_gmap`, `latitude`, `longitude`, `nomor_ktp`, `foto_ktp`) VALUES
(1, 1, 1, NULL, 'jajak', '2020-02-19', 'sjjw', 'jaja', 'kaliurang', '{\"latitude\":-3.7776924,\"longitude\":103.7971892}', NULL, NULL, '12434643664976464', 'https://api.kanayamember.idktpJaja-12434643664976464.jpeg'),
(2, 13, 1, NULL, 'mna', '2020-02-19', 'kerja', 'alamat', 'Jl. Cendrawasih, Keban Agung, Lawang Kidul, Kabupaten Muara Enim, Sumatera Selatan 31711, Indonesia', '{\"latitude\":-3.7776924,\"longitude\":103.7971892}', NULL, NULL, '976434616946434494', 'https://api.kanayamember.idktpKake-976434616946434494.jpeg'),
(3, 21, 1, NULL, 'yogyakarta', '2012-12-12', 'tani', 'adasd', 'dasda', '00993', NULL, NULL, '123131231231321', 'http://api.kanayamember.idktpmember12332-123131231231321.png'),
(4, 22, 1, NULL, 'jjiuu', '2020-02-19', 'hhhhu', 'jujuj', 'Jl. Cendrawasih, Keban Agung, Lawang Kidul, Kabupaten Muara Enim, Sumatera Selatan 31711, Indonesia', '{\"latitude\":-3.7776924,\"longitude\":103.7971892}', NULL, NULL, '533665555656650009', 'https://api.kanayamember.idktpJiiiuu-533665555656650009.jpeg'),
(5, 23, 1, NULL, 'Semarang', '1993-10-19', 'swasta', 'alamat di palagan', 'No:164B Panggungsari Jalan Bima, Jl. Panggungsari, Wonorejo, Sariharjo, Kec. Ngaglik, Kabupaten Sleman, Daerah Istimewa Yogyakarta 55581, Indonesia', '{\"latitude\":-7.738052,\"longitude\":110.3798617}', NULL, NULL, '0885212399885666', 'https://api.kanayamember.idktp3301937464829204947-0885212399885666.jpeg'),
(6, 25, 1, NULL, 'sisia', '2020-02-20', 'snksisi', 'ksosos', 'Jl. Cendrawasih, Keban Agung, Lawang Kidul, Kabupaten Muara Enim, Sumatera Selatan 31711, Indonesia', '{\"latitude\":-3.7776924,\"longitude\":103.7971892}', NULL, NULL, '1643191667649434616', 'https://api.kanayamember.idktpAnoa-1643191667649434616.jpeg'),
(7, 26, 1, NULL, 'akaka', '2020-02-27', 'juisjs', 'sjsiksw', 'Jl. Bima No.39, Dentan, Sinduharjo, Kec. Ngaglik, Kabupaten Sleman, Daerah Istimewa Yogyakarta 55581, Indonesia', '{\"latitude\":-7.7224624,\"longitude\":110.4044867}', NULL, NULL, '2434616464646461611', 'https://api.kanayamember.idktpJajaj-2434616464646461611.jpeg'),
(8, 27, 1, NULL, 'Semarang', '1993-10-19', 'Swasta', 'jl. bima ', 'Kauman No.27, Kauman, Muntilan, Kec. Muntilan, Magelang, Jawa Tengah 56411, Indonesia', '{\"latitude\":-7.5808898,\"longitude\":110.2904821}', NULL, NULL, '1234567891234565', 'https://api.kanayamember.idktpAnggit Restu pi-1234567891234565.jpeg'),
(9, 28, 1, NULL, 'kala', '2020-03-27', 'jgah', 'baca', 'Unnamed Road, Area Sawah, Magelung, Kec. Kaliwungu Sel., Kabupatén Kendal, Jawa Tengah 51372, Indonesia', '{\"latitude\":-6.970528313867008,\"longitude\":110.24231024086475}', NULL, NULL, '0876131946481348641', 'https://api.kanayamember.idktpJakal-0876131946481348641.jpeg'),
(10, 29, 1, NULL, 'sjajwkw', '2020-04-02', 'naiwkw', 'ajwiwiwkw', 'Jl. Bima No.39, Dentan, Sinduharjo, Kec. Ngaglik, Kabupaten Sleman, Daerah Istimewa Yogyakarta 55581, Indonesia', '{\"latitude\":-7.7224863,\"longitude\":110.404435}', NULL, NULL, '464434613464634616', 'https://api.kanayamember.idktpJsjw-464434613464634616.jpeg'),
(11, 30, 1, NULL, 'jajde', '2020-04-04', 'jakkww', 'ajkakww', 'Baie-James, QC, Canada', '{\"latitude\":53.13746057296368,\"longitude\":-71.16623640060425}', NULL, NULL, '12345678901243151', 'https://api.kanayamember.idktpNasha-12345678901243151.jpeg'),
(12, 31, 1, NULL, 'amaakoaa', '2020-04-04', 'nakala', 'akakow', 'Unnamed Road, Tj. Lubuk, Ogan Komering Ilir, Sumatera Selatan 30671, Indonesia', '{\"latitude\":-3.5022799457174925,\"longitude\":104.73420292139053}', NULL, NULL, '1246457346973761', 'https://api.kanayamember.idktpNkwjwjqa-1246457346973761.jpeg'),
(13, 32, 1, NULL, 'snjajw', '2020-04-05', 'ajakaka', 'kakaoaka', 'Karta Negara, Madang Suku II, East Ogan Komering Ulu Regency, South Sumatra, Indonesia', '{\"latitude\":-4.028894170496185,\"longitude\":104.45865858346224}', NULL, NULL, '0879461654649461644', 'https://api.kanayamember.idktpAman-0879461654649461644.jpeg'),
(14, 33, 1, NULL, 'namaa', '2020-04-05', 'ajakka', 'kakaoak', 'Unnamed Road, Cambodia', '{\"latitude\":13.419928950781099,\"longitude\":104.9768429249525}', NULL, NULL, '8794634215646491', 'https://api.kanayamember.idktpNakakw-8794634215646491.jpeg'),
(15, 34, 1, NULL, 'bana', '2020-04-06', 'namw', 'jaja', 'Jl. Plumbon - Ngalangan, Jetis Baran, Sardonoharjo, Kec. Ngaglik, Kabupaten Sleman, Daerah Istimewa Yogyakarta 55581, Indonesia', '{\"latitude\":-7.712011644465608,\"longitude\":110.39775665849447}', NULL, NULL, '8799764341444444', 'https://api.kanayamember.idktpNams-8799764341444444.jpeg'),
(16, 38, 1, NULL, 'Semarang', '1995-06-07', 'swasta', 'alamat', 'temangfung', '{\"latitude\":45.89002706121807,\"longitude\":-39.37501475214958}', NULL, NULL, '1234567891234567', 'https://api.kanayamember.idktpAnggito-1234567891234567.jpeg'),
(17, 39, 8, NULL, 'temanggung', '1990-03-27', 'karyawan', 'punduhan kandangan', 'Kandangan Rowo Seneng No.35-27, Punduhan, Kandangan, Kabupaten Temanggung, Jawa Tengah 56281, Indonesia', '{\"latitude\":-7.2486604,\"longitude\":110.1905061}', NULL, NULL, '3323106703900001', 'https://api.kanayamember.idktpIke Andriyani-3323106703900001.jpeg'),
(18, 41, 20, NULL, 'snanana', '1993-06-08', 'pekerjaan', 'alamat', 'Jl. Amartani Palagan Residence, Ngemplak, Donoharjo, Kec. Ngaglik, Kabupaten Sleman, Daerah Istimewa Yogyakarta 55581, Indonesia', '{\"latitude\":-7.7107809,\"longitude\":110.3776128}', NULL, NULL, '1234567890124569', 'https://api.kanayamember.idktpAnanana-1234567890124569.jpeg'),
(19, 42, 4, NULL, 'jakaal', '2020-06-09', 'haa', 'hse', 'Abala, Republic of the Congo', '{\"latitude\":-1.2143941961535947,\"longitude\":15.596573017537592}', NULL, NULL, '124346163146616161', 'https://api.kanayamember.idktpHagal-124346163146616161.jpeg'),
(20, 44, 5, NULL, 'sjej', '2020-06-09', 'd', 'f', 'Formosa do Rio Preto - State of Bahia, Brazil', '{\"latitude\":-11.429128067551943,\"longitude\":-46.27839345484972}', NULL, NULL, '2626265653562626566', 'https://api.kanayamember.idktpTest-2626265653562626566.jpeg'),
(21, 45, 7, NULL, 'zjsis', '2020-06-09', 'ssks', 'sksk', 'Al Wahat Al Dakhla Desert, New Valley Governorate, Egypt', '{\"latitude\":22.23918007765097,\"longitude\":27.102256938815117}', NULL, NULL, '2313134641316466416', 'https://api.kanayamember.idktpZisie-2313134641316466416.jpeg'),
(22, 47, 4, NULL, 'ka', '2020-06-13', 'snkw', 'jakaka', 'Sowdari, Sudan', '{\"latitude\":15.2225191035085,\"longitude\":29.91474989801645}', NULL, NULL, '611634646131314245', 'https://api.kanayamember.idktpGg-611634646131314245.jpeg'),
(23, 48, 4, NULL, 'mana', '2020-06-13', 'gulai', 'haja', 'Kwilu, Democratic Republic of the Congo', '{\"latitude\":-5.170518340878184,\"longitude\":17.514189183712006}', NULL, NULL, '546769164645575431', 'https://api.kanayamember.idktpHajar-546769164645575431.jpeg'),
(24, 50, 7, NULL, 'h', '2020-06-14', 'h', 'h', 'Kawungsari, Salawu, Tasikmalaya, West Java, Indonesia', '{\"latitude\":-7.3710422640377145,\"longitude\":107.9215557128191}', NULL, NULL, '1234567890123456', 'https://api.kanayamember.idktpHa-1234567890123456.jpeg'),
(25, 52, 1, NULL, 'semarang', '1995-06-15', 'pekerjaan', 'semarang', 'Unnamed Road, Ngemplak, Donoharjo, Kec. Ngaglik, Kabupaten Sleman, Daerah Istimewa Yogyakarta 55581, Indonesia', '{\"latitude\":-7.7099749,\"longitude\":110.3758569}', NULL, NULL, '1234567891234562', 'https://api.kanayamember.idktpAnggita sarasss-1234567891234562.jpeg'),
(26, 61, 3, NULL, 'Temanggung', '2020-06-16', 'penjait', 'Ngadisari rt 09/03', 'Unnamed Road, Gondosuli, Kec. Bulu, Kabupatén Temanggung, Jawa Tengah 56253, Indonesia', '{\"latitude\":-7.3033609,\"longitude\":110.1132707}', NULL, NULL, '3323085210910005', 'https://api.kanayamember.id/ktp/NurHidayah-3323085210910005.jpeg'),
(27, 59, 6, NULL, 'semarang', '1976-06-16', 'kerja', 'alamat', 'Fx Suhaji No.105, Jagalan, Muntilan, Kec. Muntilan, Magelang, Jawa Tengah 56411, Indonesia', '{\"latitude\":-7.5888174,\"longitude\":110.2923438}', NULL, NULL, '1234567891234569', 'https://api.kanayamember.id/ktp/Anggitass-1234567891234569.jpeg'),
(28, 60, 12, NULL, 'Temanggung', '1995-11-30', 'Wiraswasta', 'Jalan Jenderal Sudirman No.119 A, Kowangan, Temanggung', 'Unnamed Road, Senganen, Purbosari, Kec. Ngadirejo, Kabupatén Temanggung, Jawa Tengah 56255, Indonesia', '{\"latitude\":-7.2450171,\"longitude\":110.0304243}', NULL, NULL, '3323093011950003', 'https://api.kanayamember.id/ktp/Khasanah-3323093011950003.jpeg'),
(29, 1, 8, NULL, 'temanggung', '1993-10-03', 'swasta', 'jualan online', 'Wadas, Kandangan, Kabupaten Temanggung, Jawa Tengah 56281, Indonesia', '{\"latitude\":-7.2743979,\"longitude\":110.1869798}', NULL, NULL, '3323064310930003', 'https://api.kanayamember.id/ktp/ErlinaWinarsih-3323064310930003.jpeg'),
(30, 55, 16, NULL, 'temanggung', '1988-03-23', 'ibu rumah tangga', 'bendan mudal', 'dusun bendan rt 004/004 mudal ', '{\"latitude\":-7.342078,\"longitude\":110.1772786}', NULL, NULL, '3323086303880001', 'https://api.kanayamember.id/ktp/NurulChonifah-3323086303880001.jpeg'),
(31, 57, 8, NULL, 'temanggung', '2020-06-16', 'pns', 'temanggung', 'Ploso, Gesing, Kandangan, Kabupaten Temanggung, Jawa Tengah 56281, Indonesia', '{\"latitude\":-7.2504203,\"longitude\":110.1825561}', NULL, NULL, '3323065107810002', 'https://api.kanayamember.id/ktp/annaismariyana-3323065107810002.jpeg'),
(32, 67, 8, NULL, 'temanggung', '1993-08-11', 'swasta', 'temanggung ', 'kejiwan rt 01 rw 06 kandangan\n\n', '{\"latitude\":-13.92344001991054,\"longitude\":-44.5312524586916}', NULL, NULL, '3323065108930001', 'https://api.kanayamember.id/ktp/TyaPuspitaDewi-3323065108930001.jpeg'),
(33, 66, 8, NULL, 'temanggung', '1985-09-20', 'swasta', 'manding temanggung', 'Jl. Jend. MT Haryono No.5, Kauman, Manding, Kec. Temanggung, Kabupaten Temanggung, Jawa Tengah 56224, Indonesia', '{\"latitude\":-7.3146233,\"longitude\":110.1668766}', NULL, NULL, '3323066009850002', 'https://api.kanayamember.id/ktp/Sucizulaekhah-3323066009850002.jpeg'),
(34, 1, 1, NULL, 'Temanggung,08 Nobember 2001 ', '2001-11-08', 'karyawan', 'manding', 'Mranggen kidul RT.02 RW.01 , Bansari, Temanggung', '{\"latitude\":-7.2934915,\"longitude\":110.055725}', NULL, NULL, '3323164811010003', 'https://api.kanayamember.id/ktp/SafiraKurniaDamayanti-3323164811010003.jpeg'),
(35, 72, 19, NULL, 'Temanggung', '2020-06-16', 'swasta', 'Gondang Campurejo Tretep Temanggung', 'Campurejo', '{\"latitude\":-42.94034610604662,\"longitude\":16.99221219867468}', NULL, NULL, '3323114609920001', 'https://api.kanayamember.id/ktp/LeniMusyarifah-3323114609920001.jpeg'),
(36, 54, 10, NULL, 'temanggung', '1996-09-15', 'irt', 'rumah', 'kruwisan rt/rw 08/02 Kec. Kledung, Kabupatén Temanggung, Jawa Tengah 56264, Indonesia', '{\"latitude\":-7.3249749,\"longitude\":110.0537132}', NULL, NULL, '3323175509960001', 'https://api.kanayamember.id/ktp/laelatulzahro-3323175509960001.jpeg'),
(37, 73, 8, NULL, 'Temanggung', '1994-09-06', 'Tidak Bekerja', 'tidak ada', 'Unnamed Road, Gesing, Kandangan, Kabupatén Temanggung, Jawa Tengah 56281, Indonesia', '{\"latitude\":-7.2403609,\"longitude\":110.180873}', NULL, NULL, '3323064609940003', 'https://api.kanayamember.id/ktp/Priskilapurwati-3323064609940003.jpeg'),
(38, 76, 9, NULL, 'temanggung', '1996-08-01', 'Pedagang', 'Kabunan Bandunggede', 'Unnamed Road, Hutan & Sawah, Bandunggede, Kec. Kedu, Kabupatén Temanggung, Jawa Tengah 56252, Indonesia', '{\"latitude\":-7.2486767,\"longitude\":110.1089333}', NULL, NULL, '3323074108960001', 'https://api.kanayamember.id/ktp/Wahyuningsih-3323074108960001.jpeg'),
(39, 82, 16, NULL, 'temanggung', '1995-08-21', 'ibu rumah tangga', 'bendan,mudal,temanggung', 'bendan, Mudal, Kec. Temanggung, Kabupaten Temanggung, Jawa Tengah 56228, Indonesia', '{\"latitude\":-7.3373686,\"longitude\":110.1795341}', NULL, NULL, '3323016108950001', 'https://api.kanayamember.id/ktp/MusohihulHasanah-3323016108950001.jpeg'),
(40, 83, 8, NULL, 'Temanggung', '1998-10-20', 'swasta', 'Gesing ', 'Unnamed Road, Gesing, Kandangan, Kabupatén Temanggung, Jawa Tengah 56281, Indonesia', '{\"latitude\":-7.2407156,\"longitude\":110.1813756}', NULL, NULL, '3323066010980002', 'https://api.kanayamember.id/ktp/LailaCholifatunChasanah-3323066010980002.jpeg'),
(41, 86, 7, NULL, 'semarang', '1992-06-17', 'pekerjaan', 'alamat', 'Unnamed Road, Ngemplak, Donoharjo, Kec. Ngaglik, Kabupaten Sleman, Daerah Istimewa Yogyakarta 55581, Indonesia', '{\"latitude\":-7.7099682,\"longitude\":110.3758473}', NULL, NULL, '1234567891234567', 'https://system.kanayamember.id/storages/upload/ktp/Designlayana-1234567891234567.jpeg'),
(42, 111, 1, NULL, 'sdssf', '1993-08-08', 'dsfdsf', 'fsfsd', 'fsdfs', '234234', NULL, NULL, '131231231', 'http://api.kanayamember.id/ktp/1592466383-131231231.jpeg'),
(43, 1, 1, NULL, 'Temanggung', '2001-04-13', 'wiraswasta', 'mranggen kidul,Bansari ', 'Mranggen Kidul, Bansari, Kabupaten Temanggung, Jawa Tengah 56265, Indonesia', '{\"latitude\":-7.292216,\"longitude\":110.0553513}', NULL, NULL, '3323165304010001', 'https://api.kanayamember.id/ktp/1592468221-3323165304010001.jpeg'),
(44, 115, 9, NULL, 'Temanggung', '2020-06-18', 'marketting', 'margorejo.jampirjo temanggung', 'Ngimbrang_kedu No.85, Putat, Kec. Bulu, Kabupaten Temanggung, Jawa Tengah 56253, Indonesia', '{\"latitude\":-7.2883409,\"longitude\":110.1478907}', NULL, NULL, '3323064405880001', 'https://api.kanayamember.id/ktp/1592469323-3323064405880001.jpeg'),
(45, 90, 9, NULL, 'temanggung', '2020-09-19', 'swasta', 'temanggung', 'Nglarangan, Candi Mulyo, Kec. Kedu, Kabupatén Temanggung, Jawa Tengah 56252, Indonesia', '{\"latitude\":-7.2865914,\"longitude\":110.1724188}', NULL, NULL, '3323065909960002', 'https://api.kanayamember.id/ktp/1592470782-3323065909960002.jpeg'),
(46, 105, 13, NULL, 'Temanggung', '1988-12-02', 'IRT', 'Parakan', 'Unnamed Road, Area Sawah, Campursalam, Parakan, Kabupatén Temanggung, Jawa Tengah 56254, Indonesia', '{\"latitude\":-7.2782841,\"longitude\":110.1100923}', NULL, NULL, '3323084212880002', 'https://api.kanayamember.id/ktp/1592471681-3323084212880002.jpeg'),
(47, 91, 13, NULL, 'Temanggung', '1973-02-19', 'Ibu rumah tangga', 'diwek parakan', 'Unnamed Road, Diweuk, Sunggingsari, Parakan, Kabupatén Temanggung, Jawa Tengah 56254, Indonesia', '{\"latitude\":-7.2967356,\"longitude\":110.0878687}', NULL, NULL, '3323085902730001', 'https://api.kanayamember.id/ktp/1592476251-3323085902730001.jpeg'),
(48, 117, 13, NULL, 'temanggung', '2001-12-08', 'Irt', 'Parakan', 'Unnamed Road, Ngodolendo, Ringinanom, Parakan, Kabupatén Temanggung, Jawa Tengah 56254, Indonesia', '{\"latitude\":-7.2838065,\"longitude\":110.0856683}', NULL, NULL, '3323084812010001', 'https://api.kanayamember.id/ktp/1592478608-3323084812010001.jpeg'),
(49, 74, 13, NULL, 'Temanggung', '1980-08-23', 'Asisten Rumah Tangga', 'Diwek Parakan ', 'Unnamed Road, Diweuk, Sunggingsari, Parakan, Kabupatén Temanggung, Jawa Tengah 56254, Indonesia', '{\"latitude\":-7.2967348,\"longitude\":110.087873}', NULL, NULL, '3323086308800001', 'https://api.kanayamember.id/ktp/1592479091-3323086308800001.jpeg'),
(50, 119, 8, NULL, 'temanggung', '1999-08-29', 'irt', 'dringo 5/7 tlogopucang', 'Unnamed Road, Tiono, Kaloran, Kabupatén Temanggung, Jawa Tengah 56282, Indonesia', '{\"latitude\":-7.24824,\"longitude\":110.2487817}', NULL, NULL, '3323066908990002', 'https://api.kanayamember.id/ktp/1592487994-3323066908990002.jpeg'),
(51, 79, 16, NULL, 'Temanggung', '2002-03-24', 'Karyawan', 'Temanggung', 'Jl. Perintis Kemerdekaan No.36, Jurang 1, Jurang, Kec. Temanggung, Kabupaten Temanggung, Jawa Tengah 56222, Indonesia', '{\"latitude\":-7.3053172,\"longitude\":110.1705198}', NULL, NULL, '3323036403020001', 'https://api.kanayamember.id/ktp/1592490497-3323036403020001.jpeg'),
(52, 120, 16, NULL, 'semarang', '1996-06-10', 'mengurus rumah tangga ', 'brojolan', 'Brojolan Barat rt 6 rw 1 temanggung 1 temanggung ', '{\"latitude\":-7.30869,\"longitude\":110.1776727}', NULL, NULL, '3322205006960002', 'https://api.kanayamember.id/ktp/1592491489-3322205006960002.jpeg'),
(53, 1, 18, NULL, 'temanggung', '1998-03-12', 'ibu rumah tangga', 'rumah tinggal', 'Unnamed Road, Lobang, Sriwungu, Tlogomulyo, Kabupatén Temanggung, Jawa Tengah 56263, Indonesia', '{\"latitude\":-7.3253634,\"longitude\":110.1520542}', NULL, NULL, '3323075203980001', 'https://api.kanayamember.id/ktp/1592494050-3323075203980001.jpeg'),
(54, 88, 8, NULL, 'temanggung', '1984-10-07', 'perdagangan', 'kandangan', 'Jl. kandangan - rowo seneng, kejiwan rt 02 rw 06, Kec. Kandangan, Kabupaten Temanggung, Jawa Tengah 56281, Indonesia', '{\"latitude\":-7.313931,\"longitude\":110.1655742}', NULL, NULL, '3323064710840001', 'https://api.kanayamember.id/ktp/1592530097-3323064710840001.jpeg'),
(55, 87, 8, NULL, 'temanggung', '1973-04-04', 'buruh harian lepas', 'temanggung', 'Jalan Kandangan Kaloran Termas rt 04 rw 02, Kec. kandangan, Kabupaten Temanggung, Jawa Tengah 56281, Indonesia', '{\"latitude\":-7.3139373,\"longitude\":110.1655654}', NULL, NULL, '3323064404730003', 'https://api.kanayamember.id/ktp/1592531432-3323064404730003.jpeg'),
(56, 63, 16, NULL, 'Temanggung', '2000-04-13', 'Swasta', 'Jl. Gatot Subroto, Manding, Temanggung', 'Jalan Gatot Subroto Km.2, Manding, Temanggung, Karang Wetan, Manding, Kec. Temanggung, Kabupaten Temanggung, Jawa Tengah 56224, Indonesia', '{\"latitude\":-7.3139398,\"longitude\":110.1655624}', NULL, NULL, '3323155304000001', 'https://api.kanayamember.id/ktp/1592531662-3323155304000001.jpeg'),
(57, 124, 12, NULL, 'Temanggung ', '1997-07-19', 'Pegawai Swasta ', 'Dalangan, Campursari, Bulu, Temanggung ', 'Jl. Bulu - Parakan, Watukarung, Campursari, Kec. Bulu, Kabupaten Temanggung, Jawa Tengah 56253, Indonesia', '{\"latitude\":-7.28553,\"longitude\":110.114234}', NULL, NULL, '3323095907970001', 'https://api.kanayamember.id/ktp/1592532376-3323095907970001.jpeg'),
(58, 125, 13, NULL, 'Temanggung', '1979-10-06', 'Pedagang', 'Ngodoringin ', 'Unnamed Road, Ngodoringin, Ringinanom, Parakan, Kabupatén Temanggung, Jawa Tengah 56254, Indonesia', '{\"latitude\":-7.2794867,\"longitude\":110.0880866}', NULL, NULL, '3323084610790003', 'https://api.kanayamember.id/ktp/1592534848-3323084610790003.jpeg'),
(59, 126, 1, NULL, 'Temanggung', '1994-10-15', 'ibu rumah tangga', 'Mranggen kidul ', 'Mranggen kidul,RT.04 RW.02 Bansari', '{\"latitude\":-7.2860466,\"longitude\":110.0589243}', NULL, NULL, '3323175510940003', 'https://api.kanayamember.id/ktp/1592536140-3323175510940003.jpeg'),
(60, 129, 13, NULL, 'Temanggung', '1976-01-18', 'Ibu Rumah Tangga', 'Ngodoringin parakan', 'Unnamed Road, Ngodoringin, Ringinanom, Parakan, Kabupatén Temanggung, Jawa Tengah 56254, Indonesia', '{\"latitude\":-7.2783233,\"longitude\":110.0880333}', NULL, NULL, '3323085801760001', 'https://api.kanayamember.id/ktp/1592536732-3323085801760001.jpeg'),
(61, 92, 16, NULL, 'temanggung', '1993-08-01', 'ibu rumah tangga', 'klumpit', 'klumpit nampirejo temanggung', '{\"latitude\":-39.77475711657729,\"longitude\":31.64062701165676}', NULL, NULL, '3323034108930001', 'https://api.kanayamember.id/ktp/1592537835-3323034108930001.jpeg'),
(62, 128, 8, NULL, 'temanggung', '1983-01-26', 'buruh harian lepas', 'kandangan', 'kelingan rt 06 rw 04, Caruban, Kandangan, Kabupaten Temanggung, Jawa Tengah 56281, Indonesia', '{\"latitude\":-7.264855,\"longitude\":110.176175}', NULL, NULL, '3323066601830001', 'https://api.kanayamember.id/ktp/1592539223-3323066601830001.jpeg');

-- --------------------------------------------------------

--
-- Struktur dari tabel `misi`
--

CREATE TABLE `misi` (
  `id` tinyint(4) NOT NULL DEFAULT '0',
  `deskripsi` varchar(300) NOT NULL,
  `points` double NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COMMENT='digunakan untuk menyimpan dan mengatur data misi dari marketing';

--
-- Dumping data untuk tabel `misi`
--

INSERT INTO `misi` (`id`, `deskripsi`, `points`) VALUES
(1, 'Aktifasi Member Baru (Pembelian Pertama)', 1),
(2, 'Transaksi Pembelian', 1),
(3, 'Kirim Barang', 1),
(4, 'Penagihan Kredit', 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `news_artikel`
--

CREATE TABLE `news_artikel` (
  `id` int(15) NOT NULL,
  `user_id` int(10) NOT NULL COMMENT 'diposting oleh siapa ambil pegawai',
  `definisi` enum('News','Artikel') NOT NULL,
  `gambar` varchar(255) NOT NULL,
  `nama` varchar(200) NOT NULL,
  `deskripsi` text NOT NULL,
  `tanggal_posting` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COMMENT='digunakan untuk menyimpan data news / artikel yang akan diposting';

--
-- Dumping data untuk tabel `news_artikel`
--

INSERT INTO `news_artikel` (`id`, `user_id`, `definisi`, `gambar`, `nama`, `deskripsi`, `tanggal_posting`) VALUES
(1, 4, 'Artikel', 'abc.png', 'Ini Demo Artikel', 'Gek Digawe Mas Bro', '2019-12-19 00:00:00'),
(2, 4, 'Artikel', 'derr.jpg', 'Demo Artikel 2', 'Demo Artikel 2', '2019-12-19 00:00:00'),
(3, 4, 'News', 'derr.jpg', 'Demo News 2', 'Demo News2', '2019-12-19 00:00:00'),
(4, 4, 'News', 'abc.png', 'Ini Demo News', 'Gek Digawe Mas Bro', '2019-12-19 00:00:00');

-- --------------------------------------------------------

--
-- Struktur dari tabel `pegawai`
--

CREATE TABLE `pegawai` (
  `id` int(11) NOT NULL,
  `kecamatan_id` int(11) NOT NULL,
  `role_id` tinyint(5) NOT NULL DEFAULT '0',
  `manager_id` int(11) DEFAULT NULL,
  `target_id` tinyint(2) DEFAULT NULL,
  `username` varchar(32) NOT NULL,
  `password` varchar(64) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `tanggal_lahir` date DEFAULT NULL,
  `tempat_lahir` varchar(100) DEFAULT NULL,
  `alamat` varchar(200) DEFAULT NULL,
  `telepon` char(20) NOT NULL,
  `email` varchar(100) NOT NULL,
  `foto` varchar(255) DEFAULT NULL,
  `trip_fee` double DEFAULT '0',
  `point` double DEFAULT NULL,
  `fcm_token` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COMMENT='digunakan untuk menyimpan data pegawai';

--
-- Dumping data untuk tabel `pegawai`
--

INSERT INTO `pegawai` (`id`, `kecamatan_id`, `role_id`, `manager_id`, `target_id`, `username`, `password`, `nama`, `tanggal_lahir`, `tempat_lahir`, `alamat`, `telepon`, `email`, `foto`, `trip_fee`, `point`, `fcm_token`) VALUES
(2, 1, 7, NULL, NULL, 'keuangan', '827ccb0eea8a706c4c34a16891f84e7b', 'Bagian Keuangan', NULL, NULL, 'Sleman', '', 'anggitrestupi@gmail.com', NULL, 0, NULL, ''),
(3, 1, 2, NULL, NULL, 'warehouse', '827ccb0eea8a706c4c34a16891f84e7b', 'Bagian Warehouse', NULL, NULL, 'sleman', '', 'fendy@gmail.com', NULL, 0, NULL, ''),
(4, 1, 4, 4, NULL, 'pegawai', 'e10adc3949ba59abbe56e057f20f883e', 'Demo Pegawai', '2019-12-18', 'magelang', 'magelang', '08122329423984', 'fdk@gmail.com', 'ddf.jpg', 2343, 15, ''),
(8, 14, 4, 8, NULL, 'mark1', '827ccb0eea8a706c4c34a16891f84e7b', 'Marketing 1', '2020-06-08', 'Sleman', 'Sleman', '0435435', 'marketing@mail.com', 'https://system.kanayamember.id/assets/dashboard/img/pegawai/f2cd21019718cf970729aa2bdce4c41b.jpeg', 1000, 0, ''),
(9, 14, 4, 9, NULL, 'fendysketsa', 'adcc561a2eb7a0cef0f110d4041ac166', 'Fendy Nugraha', '1995-01-16', 'SEMARANG', 'Kalpucang', '08123456789', 'fendysketsa@gmail.com', 'https://system.kanayamember.id/assets/dashboard/img/pegawai/41ddbdb232dc1882722d243fca98c95b.png', 1, 2, ''),
(10, 8, 4, 8, NULL, 'tyakame', '0192023a7bbd73250516f069df18b500', 'Tya Puspita Dewi', '1993-08-11', 'Temanggung', 'Kejiwan 03/06\r\nKandangan, Temanggung', '083835722390', 'tyapuspitatemanggung@gmail.com', '', 1, 1, ''),
(11, 3, 4, 8, NULL, 'sucikame', '48423bc87389799ac425be92530cfb5b', 'Suci Zulaikhah', '1985-09-20', 'Temanggung', 'Ds. Gesing, Rt 02 Rw 04\r\nKandanga, Temanggung', '088239136275', 'deaperkasa@gmail.com', '', 1, 1, ''),
(12, 13, 4, 8, NULL, 'yolakame', '7d98599952bd6cc9a6f37afc6bec3580', 'Yola Windiyanti', '2002-11-19', 'Temanggung', 'Diwek, Rt 03 Rw 03\r\nParakan, Temanggung', '0895377090328', 'yollawindi14@gmail.com', '', 1, 1, ''),
(13, 1, 4, 8, NULL, 'safirakame', 'dd7dff33b530e6cb697aab9d1b22cea5', 'Safira Kurnia Damayanti', '2001-11-08', 'Temanggung', 'Mranggen Kidul, Rt 02 Rw 01\r\nBansari, Temanggung', '085700657343', 'safirakurniadamayanti30@gmail.com', '', 1, 1, ''),
(14, 11, 4, 8, NULL, 'anisakame', 'e28c7e6b1f4bedb41691be784a4e2a3b', 'Fatwa Anisa', '2001-03-19', 'Temanggung', 'Keblukan, Rt 03 Rw 01\r\nKaloran, Temanggung', '087834578383', 'fatwaanisa008@gmail.com', '', 1, 1, ''),
(15, 16, 4, 8, NULL, 'fafakame', '78e0d5058803a3d6481b946b5e7a2510', 'Wahyu Fauziah Kurniawati', '2002-03-24', 'Temanggung', 'Jurang, Rt 03 Rw 01\r\nTemanggung', '085741511382', 'wahyufauziah96@gmail.com', '', 1, 1, '');

-- --------------------------------------------------------

--
-- Struktur dari tabel `pengajuan_limit`
--

CREATE TABLE `pengajuan_limit` (
  `id` int(15) NOT NULL,
  `member_id` int(10) NOT NULL,
  `limit_id` int(5) NOT NULL,
  `tanggal` datetime DEFAULT NULL,
  `nominal_bayar` double DEFAULT NULL,
  `status` enum('aktif','belum aktif') NOT NULL DEFAULT 'belum aktif'
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COMMENT='untuk proses penyimpanan pengajuan limit';

--
-- Dumping data untuk tabel `pengajuan_limit`
--

INSERT INTO `pengajuan_limit` (`id`, `member_id`, `limit_id`, `tanggal`, `nominal_bayar`, `status`) VALUES
(58, 38, 11, '2020-06-07 14:36:58', 10, 'aktif'),
(59, 39, 11, '2020-06-07 14:51:34', 10, 'aktif'),
(60, 38, 11, '2020-06-07 15:38:31', NULL, 'aktif'),
(61, 41, 11, '2020-06-08 22:39:35', 10, 'aktif'),
(62, 42, 11, '2020-06-09 10:11:37', 10, 'aktif'),
(63, 44, 11, '2020-06-09 10:16:41', 10, 'aktif'),
(64, 45, 11, '2020-06-09 10:19:52', 10, 'aktif'),
(65, 45, 11, '2020-06-09 10:20:51', NULL, 'aktif'),
(66, 47, 11, '2020-06-13 06:16:28', 10, 'aktif'),
(67, 48, 11, '2020-06-13 16:39:28', 10, 'aktif'),
(68, 48, 11, '2020-06-13 16:46:33', NULL, 'aktif'),
(69, 38, 11, '2020-06-14 10:06:44', NULL, 'aktif'),
(70, 38, 11, '2020-06-14 10:06:51', NULL, 'aktif'),
(71, 50, 11, '2020-06-14 11:41:42', 10, 'aktif'),
(72, 50, 11, '2020-06-14 11:42:11', NULL, 'aktif'),
(73, 52, 11, '2020-06-15 18:01:05', 10, 'aktif'),
(74, 52, 11, '2020-06-15 22:16:11', NULL, 'aktif'),
(75, 52, 11, '2020-06-15 23:42:04', NULL, 'aktif'),
(76, 61, 11, '2020-06-16 14:00:03', 10, 'aktif'),
(77, 59, 11, '2020-06-16 14:08:02', 10, 'aktif'),
(78, 60, 11, '2020-06-16 14:15:06', 10, 'aktif'),
(79, 1, 11, '2020-06-16 14:30:28', 10, 'aktif'),
(80, 55, 11, '2020-06-16 14:38:58', 10, 'aktif'),
(81, 57, 11, '2020-06-16 15:54:49', 10, 'aktif'),
(82, 67, 11, '2020-06-16 16:21:28', 10, 'aktif'),
(83, 66, 11, '2020-06-16 16:21:50', 10, 'aktif'),
(84, 1, 11, '2020-06-16 18:06:06', 10, 'aktif'),
(85, 72, 11, '2020-06-16 22:14:24', 10, 'aktif'),
(86, 54, 11, '2020-06-17 09:25:44', 10, 'aktif'),
(87, 73, 11, '2020-06-17 09:56:22', 10, 'aktif'),
(88, 76, 11, '2020-06-17 10:40:03', 10, 'aktif'),
(89, 82, 11, '2020-06-17 14:25:52', 10, 'aktif'),
(90, 83, 11, '2020-06-17 14:26:33', 10, 'aktif'),
(91, 86, 11, '2020-06-17 16:02:26', 10, 'aktif'),
(92, 111, 11, '2020-06-18 14:46:23', 10, 'aktif'),
(93, 1, 11, '2020-06-18 15:17:01', 10, 'aktif'),
(94, 115, 11, '2020-06-18 15:35:23', 10, 'aktif'),
(95, 90, 11, '2020-06-18 15:59:42', 10, 'aktif'),
(96, 105, 11, '2020-06-18 16:14:41', 10, 'aktif'),
(97, 91, 11, '2020-06-18 17:30:51', 10, 'aktif'),
(98, 117, 11, '2020-06-18 18:10:08', 10, 'aktif'),
(99, 74, 11, '2020-06-18 18:18:11', 10, 'aktif'),
(100, 119, 11, '2020-06-18 20:46:34', 10, 'aktif'),
(101, 79, 11, '2020-06-18 21:28:17', 10, 'aktif'),
(102, 120, 11, '2020-06-18 21:44:50', 10, 'aktif'),
(103, 1, 11, '2020-06-18 22:27:30', 10, 'aktif'),
(104, 88, 11, '2020-06-19 08:28:17', 10, 'aktif'),
(105, 87, 11, '2020-06-19 08:50:32', 10, 'aktif'),
(106, 63, 11, '2020-06-19 08:54:22', 10, 'aktif'),
(107, 124, 11, '2020-06-19 09:06:16', 10, 'aktif'),
(108, 125, 11, '2020-06-19 09:47:28', 10, 'aktif'),
(109, 126, 11, '2020-06-19 10:09:00', 10, 'aktif'),
(110, 129, 11, '2020-06-19 10:18:52', 10, 'aktif'),
(111, 92, 11, '2020-06-19 10:37:15', 10, 'aktif'),
(112, 128, 11, '2020-06-19 11:00:23', 10, 'aktif');

-- --------------------------------------------------------

--
-- Struktur dari tabel `point`
--

CREATE TABLE `point` (
  `id` int(11) NOT NULL,
  `user_id` int(15) NOT NULL,
  `skema` enum('member','marketing') NOT NULL,
  `point` double NOT NULL DEFAULT '0',
  `produk_id` int(15) DEFAULT NULL,
  `misi_id` tinyint(4) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COMMENT='digunakan untuk mengatur point pada member atau pun marketing';

--
-- Dumping data untuk tabel `point`
--

INSERT INTO `point` (`id`, `user_id`, `skema`, `point`, `produk_id`, `misi_id`) VALUES
(14, 4, 'marketing', 1, NULL, 1),
(15, 4, 'marketing', 1, NULL, 4),
(16, 4, 'marketing', 1, NULL, 4),
(17, 4, 'marketing', 1, NULL, 4),
(25, 4, 'marketing', 1, NULL, 1),
(26, 4, 'marketing', 1, NULL, 4),
(27, 4, 'marketing', 1, NULL, 4),
(28, 4, 'marketing', 1, NULL, 4),
(29, 4, 'marketing', 1, NULL, 4),
(30, 4, 'marketing', 1, NULL, 4),
(31, 4, 'marketing', 1, NULL, 4),
(32, 4, 'marketing', 1, NULL, 1),
(33, 4, 'marketing', 1, NULL, 4),
(34, 4, 'marketing', 1, NULL, 4),
(35, 4, 'marketing', 1, NULL, 4),
(36, 4, 'marketing', 1, NULL, 2),
(37, 4, 'marketing', 1, NULL, 4),
(38, 4, 'marketing', 1, NULL, 4),
(39, 4, 'marketing', 1, NULL, 4),
(40, 4, 'marketing', 1, NULL, 4),
(41, 4, 'marketing', 1, NULL, 4),
(42, 4, 'marketing', 1, NULL, 4),
(43, 4, 'marketing', 1, NULL, 4),
(44, 4, 'marketing', 1, NULL, 1),
(45, 4, 'marketing', 1, NULL, 1),
(46, 4, 'marketing', 1, NULL, 4),
(47, 4, 'marketing', 1, NULL, 4),
(48, 4, 'marketing', 1, NULL, 1),
(49, 4, 'marketing', 1, NULL, 4),
(50, 4, 'marketing', 1, NULL, 4),
(51, 4, 'marketing', 1, NULL, 4),
(52, 4, 'marketing', 1, NULL, 4),
(53, 9, 'marketing', 1, NULL, 1),
(54, 9, 'marketing', 1, NULL, 4),
(55, 9, 'marketing', 1, NULL, 4),
(56, 9, 'marketing', 1, NULL, 4),
(57, 9, 'marketing', 1, NULL, 4),
(58, 9, 'marketing', 1, NULL, 4),
(59, 9, 'marketing', 1, NULL, 4),
(60, 9, 'marketing', 1, NULL, 4),
(61, 9, 'marketing', 1, NULL, 4),
(62, 9, 'marketing', 1, NULL, 4);

-- --------------------------------------------------------

--
-- Struktur dari tabel `produk`
--

CREATE TABLE `produk` (
  `id` int(15) NOT NULL,
  `kategori_id` int(10) NOT NULL,
  `promo_id` int(10) DEFAULT NULL,
  `kode` char(10) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `deskripsi` text NOT NULL,
  `harga_hpp` double NOT NULL DEFAULT '0',
  `harga_jual` double NOT NULL DEFAULT '0',
  `pre_order` datetime DEFAULT NULL,
  `stok` double DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COMMENT='digunakan untuk menyimpan data produk';

--
-- Dumping data untuk tabel `produk`
--

INSERT INTO `produk` (`id`, `kategori_id`, `promo_id`, `kode`, `nama`, `deskripsi`, `harga_hpp`, `harga_jual`, `pre_order`, `stok`) VALUES
(29, 13, NULL, '001', 'Journey Saras', 'Ukuran : 115 cm x 115 cm\r\nMaterial : Voal Ultrafine Premium', 75000, 120000, NULL, 10),
(30, 13, NULL, '003', 'Journey Kimmy', 'Ukuran : 115 cm x 115 cm\r\nMaterial : Voal Ultrafine Premium', 75000, 120000, NULL, 10),
(31, 12, NULL, '004', 'Bed Cover', 'Ukuran : 200 cm x 1800 cm\r\nMaterial : Embos', 500000, 700000, NULL, 5),
(32, 12, NULL, '005', 'Bad Cover Set', 'Ukuran : 200 cm x 180 cm\r\nMaterial : Embos premium\r\n(Halus Lembut nyaman)', 500000, 700000, NULL, 1),
(33, 13, NULL, '006', 'Journey Laser Cut', 'Warna : Cream\r\nUkuran : 115 cm x 115 cm\r\nMaterial : Ultrafine', 50000, 75000, NULL, 20),
(34, 13, NULL, '007', 'Journey Laser Cut', 'Warna : Ungu Keabuan\r\nUkuran : 115 cm x 115 cm\r\nMaterial : Ultrafine', 50000, 75000, NULL, 20),
(35, 13, NULL, '008', 'Journey Laser Cut', 'Warna : Hijau Botol\r\nUkuran : 115 cm x 115 cm\r\nMaterial : Ultrafine', 50000, 75000, NULL, 20),
(36, 13, NULL, '009', 'Journey Laser Cut ', 'Warna : Merah Cabe\r\nUkuran : 115 cm x 115 cm\r\nMaterial : Ultrafine', 50000, 75000, NULL, 20),
(37, 13, NULL, '010', 'Journey Laser Cut', 'Warna : Army\r\nUkuran : 115 cm x 115 cm\r\nMaterial : Ultrafine', 50000, 75000, NULL, 20),
(38, 13, NULL, '011', 'Journey Molly', 'Ukuran : 115 cm x 115 cm\r\nMaterial : Ultrafine', 60000, 100000, NULL, 6),
(39, 13, NULL, '012', 'Journey Orlin', 'Ukuran : 115 cm x 115 cm\r\nMaterial : Ultrafine Shiny Glowing', 90000, 150000, NULL, 10),
(40, 13, NULL, '013', 'Journey Premium Amira', 'Ukuran : 115 cm x 115 cm\r\nMaterial : Ultrafine Shiny Glowing', 90000, 150000, NULL, 20),
(41, 13, NULL, '014', 'Journey Alza', 'Ukuran : 115 cm x 115 cm\r\nMAterial : Ultrafine Shiny Glowing', 90000, 150000, NULL, 10),
(42, 13, NULL, '015', 'Journey Line', 'Ukuran : 115 cm x 115 cm\r\nMaterial : Ultrafine Shiny Glowing', 90000, 150000, NULL, 10),
(43, 13, NULL, '016', 'Journey Allona', 'Ukuran : 115 cm x 115 cm\r\nMAterial : Voal shiny glowing', 90000, 150000, NULL, 10);

-- --------------------------------------------------------

--
-- Struktur dari tabel `produk_diskon`
--

CREATE TABLE `produk_diskon` (
  `id` int(20) NOT NULL,
  `produk_id` int(15) NOT NULL,
  `diskon_id` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COMMENT='digunakan untuk mengecek produk yang kena diskon pada waktu tertentu';

-- --------------------------------------------------------

--
-- Struktur dari tabel `produk_images`
--

CREATE TABLE `produk_images` (
  `id` int(20) NOT NULL,
  `produk_id` int(15) NOT NULL,
  `gambar` varchar(255) NOT NULL,
  `keterangan` varchar(200) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COMMENT='digunakan untuk menyimpan gambar gambar dari produk';

--
-- Dumping data untuk tabel `produk_images`
--

INSERT INTO `produk_images` (`id`, `produk_id`, `gambar`, `keterangan`) VALUES
(29, 29, 'storages/upload/produk/images/5edc91cead9bc.png', 'Images 0'),
(30, 29, 'storages/upload/produk/images/5edc91ceae105.png', 'Images 1'),
(31, 30, 'storages/upload/produk/images/5edc922bea093.png', 'Images 0'),
(32, 30, 'storages/upload/produk/images/5edc922bea9a1.png', 'Images 1'),
(33, 30, 'storages/upload/produk/images/5edc922beaf82.png', 'Images 2'),
(36, 32, 'storages/upload/produk/images/5ee78396ac781.png', 'Images 0'),
(37, 33, 'storages/upload/produk/images/5ee7850c9b28b.png', 'Images 0'),
(38, 34, 'storages/upload/produk/images/5ee78559b3cf5.png', 'Images 0'),
(39, 35, 'storages/upload/produk/images/5ee785d1eab56.png', 'Images 0'),
(40, 35, 'storages/upload/produk/images/5ee785d1eae2a.png', 'Images 1'),
(41, 36, 'storages/upload/produk/images/5ee786ac59399.png', 'Images 0'),
(42, 36, 'storages/upload/produk/images/5ee786ac596da.png', 'Images 1'),
(43, 37, 'storages/upload/produk/images/5ee788250890f.png', 'Images 0'),
(44, 37, 'storages/upload/produk/images/5ee7882508c2f.png', 'Images 1'),
(45, 38, 'storages/upload/produk/images/5ee7887bf4068.png', 'Images 0'),
(46, 39, 'storages/upload/produk/images/5ee789104e254.png', 'Images 0'),
(47, 40, 'storages/upload/produk/images/5ee7897dc56a2.png', 'Images 0'),
(48, 40, 'storages/upload/produk/images/5ee7897dc5958.png', 'Images 1'),
(49, 41, 'storages/upload/produk/images/5ee78a1dade01.png', 'Images 0'),
(50, 41, 'storages/upload/produk/images/5ee78a1dae279.png', 'Images 1'),
(51, 42, 'storages/upload/produk/images/5ee78a57cedbd.png', 'Images 0'),
(52, 31, 'storages/upload/produk/images/5ee8749991f3c.png', 'Images 0'),
(53, 43, 'storages/upload/produk/images/5eead67bebce4.png', 'Images 0'),
(54, 43, 'storages/upload/produk/images/5eead67bec4d2.png', 'Images 1'),
(55, 43, 'storages/upload/produk/images/5eead67becb9a.png', 'Images 2');

-- --------------------------------------------------------

--
-- Struktur dari tabel `promo`
--

CREATE TABLE `promo` (
  `id` int(11) NOT NULL,
  `kode` char(20) NOT NULL COMMENT 'kode promo',
  `nama` varchar(100) NOT NULL,
  `deskripsi` text NOT NULL,
  `berlaku_dari` date NOT NULL,
  `berlaku_sampai` date NOT NULL,
  `gambar` varchar(255) NOT NULL,
  `tanggal_posting` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COMMENT='digunakan untuk mensetting promo dari produk';

--
-- Dumping data untuk tabel `promo`
--

INSERT INTO `promo` (`id`, `kode`, `nama`, `deskripsi`, `berlaku_dari`, `berlaku_sampai`, `gambar`, `tanggal_posting`) VALUES
(1, 'PROMO123', 'Demo Promo', 'Demo Promo', '2019-10-30', '2019-11-28', 'demo-promo.jpg', '2019-10-30 11:14:45');

-- --------------------------------------------------------

--
-- Struktur dari tabel `provinsi`
--

CREATE TABLE `provinsi` (
  `id` int(11) NOT NULL,
  `kode` char(10) NOT NULL,
  `nama` varchar(70) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COMMENT='digunakan untuk menyimpan data provinsi';

--
-- Dumping data untuk tabel `provinsi`
--

INSERT INTO `provinsi` (`id`, `kode`, `nama`) VALUES
(1, '33', 'Jawa Tengah');

-- --------------------------------------------------------

--
-- Struktur dari tabel `role`
--

CREATE TABLE `role` (
  `id` tinyint(4) NOT NULL,
  `nama` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COMMENT='untuk mengatur akses dari pada pegawai saat menggunakan system';

--
-- Dumping data untuk tabel `role`
--

INSERT INTO `role` (`id`, `nama`) VALUES
(1, 'Admin'),
(2, 'Warehouse'),
(3, 'Manager Marketing'),
(4, 'Marketing'),
(5, 'Superadmin (Owner)'),
(6, 'Member'),
(7, 'Keuangan');

-- --------------------------------------------------------

--
-- Struktur dari tabel `superuser`
--

CREATE TABLE `superuser` (
  `id` int(3) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `kata_sandi` varchar(200) NOT NULL,
  `email` varchar(100) NOT NULL,
  `telepon` char(20) NOT NULL,
  `foto` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COMMENT='digunakan untuk menyimpan data super user yang diprioritaskan untuk bisa mengakses seluruh fitur web base';

--
-- Dumping data untuk tabel `superuser`
--

INSERT INTO `superuser` (`id`, `nama`, `kata_sandi`, `email`, `telepon`, `foto`) VALUES
(1, 'admin', '21232f297a57a5a743894a0e4a801fc3', 'admintest@layana.id', '1232323', NULL);

-- --------------------------------------------------------

--
-- Struktur dari tabel `target_marketing`
--

CREATE TABLE `target_marketing` (
  `id` tinyint(2) NOT NULL,
  `hari` double NOT NULL,
  `deskripsi` varchar(300) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COMMENT='digunakan untuk mengatur target marketing';

--
-- Dumping data untuk tabel `target_marketing`
--

INSERT INTO `target_marketing` (`id`, `hari`, `deskripsi`) VALUES
(1, 2, 'COba Target Marketing');

-- --------------------------------------------------------

--
-- Struktur dari tabel `transaksi`
--

CREATE TABLE `transaksi` (
  `id` int(20) NOT NULL,
  `member_id` int(15) NOT NULL,
  `marketing_id` int(15) NOT NULL,
  `no_transaksi` char(15) NOT NULL,
  `tanggal` datetime NOT NULL,
  `total_biaya` double NOT NULL DEFAULT '0',
  `cara_bayar` enum('lunas','cicilan') NOT NULL,
  `bayar_tempo` double DEFAULT '0',
  `hutang_biaya` double NOT NULL DEFAULT '0',
  `status` varchar(50) DEFAULT 'proses',
  `status_produk` varchar(50) DEFAULT 'proses',
  `status_setoran` varchar(1) DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COMMENT='digunakan untuk menyimpan transaksi pembelian produk untuk member';

--
-- Dumping data untuk tabel `transaksi`
--

INSERT INTO `transaksi` (`id`, `member_id`, `marketing_id`, `no_transaksi`, `tanggal`, `total_biaya`, `cara_bayar`, `bayar_tempo`, `hutang_biaya`, `status`, `status_produk`, `status_setoran`) VALUES
(60, 31, 4, 'TRX-20200405-2', '2020-04-05 05:25:56', 350000, 'lunas', 0, 0, 'success', 'proses', '0'),
(61, 32, 4, 'TRX-20200405-3', '2020-04-05 05:29:22', 350000, 'lunas', 0, 0, 'proses', 'proses', '0'),
(65, 33, 4, 'TRX-20200405-5', '2020-04-05 17:04:44', 350000, 'lunas', 0, 0, 'success', NULL, '0'),
(66, 34, 4, 'TRX-20200406-2', '2020-04-06 17:45:34', 125000, 'cicilan', 7, 0, 'proses', 'send', '0'),
(67, 38, 4, 'TRX-20200607-2', '2020-06-07 15:38:31', 120000, 'cicilan', 7, 0, 'success', 'send', '0'),
(69, 39, 4, 'TRX-20200607-4', '2020-06-07 16:58:13', 240000, 'lunas', 0, 0, 'success', 'proses', '0'),
(71, 1, 2, 'TRX-20200609-2', '2020-06-09 10:05:31', 350000, 'lunas', 0, 0, 'proses', 'proses', '0'),
(72, 42, 8, 'TRX-20200609-3', '2020-06-09 10:12:00', 25000, 'lunas', 0, 0, 'proses', 'proses', '0'),
(73, 44, 4, 'TRX-20200609-4', '2020-06-09 10:17:04', 25000, 'lunas', 0, 0, 'success', 'proses', '0'),
(74, 45, 4, 'TRX-20200609-5', '2020-06-09 10:20:51', 125000, 'cicilan', 7, 0, 'success', 'send', '0'),
(75, 2, 4, 'TRX-20200612-2', '2020-06-12 20:43:22', 425000, 'lunas', 0, 0, 'success', 'proses', '0'),
(76, 48, 4, 'TRX-20200613-2', '2020-06-13 16:44:33', 725000, 'lunas', 0, 0, 'success', 'send', '0'),
(77, 48, 4, 'TRX-20200613-3', '2020-06-13 16:46:33', 150000, 'cicilan', 7, 0, 'success', 'send', '0'),
(78, 50, 4, 'TRX-20200614-2', '2020-06-14 11:42:11', 145000, 'cicilan', 7, 0, 'proses', 'proses', '0'),
(79, 52, 9, 'TRX-20200615-2', '2020-06-15 22:02:28', 265000, 'lunas', 0, 0, 'success', 'send', '0'),
(80, 52, 9, 'TRX-20200615-3', '2020-06-15 22:16:11', 300000, 'cicilan', 7, 0, 'success', 'send', '0'),
(81, 52, 9, 'TRX-20200615-4', '2020-06-15 23:42:04', 300000, 'cicilan', 7, 0, 'proses', 'send', '0');

-- --------------------------------------------------------

--
-- Struktur dari tabel `transaksi_angsuran`
--

CREATE TABLE `transaksi_angsuran` (
  `id` int(20) NOT NULL,
  `transaksi_id` int(20) DEFAULT NULL,
  `jumlah_angsuran` int(11) DEFAULT NULL,
  `tanggal` datetime DEFAULT NULL,
  `status` int(11) DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `transaksi_angsuran`
--

INSERT INTO `transaksi_angsuran` (`id`, `transaksi_id`, `jumlah_angsuran`, `tanggal`, `status`) VALUES
(90, 66, 50000, '2020-04-06 00:00:00', 1),
(91, 66, 37500, '2020-04-13 17:45:36', 1),
(92, 66, 37500, '2020-04-20 17:45:36', 0),
(93, 67, 50000, '2020-06-07 00:00:00', 1),
(94, 67, 35000, '2020-06-14 15:38:31', 1),
(95, 67, 35000, '2020-06-21 15:38:31', 1),
(96, 74, 50000, '2020-06-09 00:00:00', 1),
(97, 74, 18750, '2020-06-16 10:20:53', 1),
(98, 74, 18750, '2020-06-23 10:20:53', 1),
(99, 74, 18750, '2020-06-30 10:20:53', 1),
(100, 74, 18750, '2020-07-07 10:20:53', 1),
(101, 77, 50000, '2020-06-13 00:00:00', 1),
(102, 77, 25000, '2020-06-20 16:46:33', 1),
(103, 77, 25000, '2020-06-27 16:46:33', 1),
(104, 77, 25000, '2020-07-04 16:46:33', 1),
(105, 77, 25000, '2020-07-11 16:46:33', 1),
(106, 78, 50000, '2020-06-14 00:00:00', 1),
(107, 78, 23750, '2020-06-21 11:42:12', 1),
(108, 78, 23750, '2020-06-28 11:42:12', 1),
(109, 78, 23750, '2020-07-05 11:42:12', 1),
(110, 78, 23750, '2020-07-12 11:42:12', 0),
(111, 80, 50000, '2020-06-15 00:00:00', 1),
(112, 80, 62500, '2020-06-22 22:16:12', 1),
(113, 80, 62500, '2020-06-29 22:16:12', 1),
(114, 80, 62500, '2020-07-06 22:16:12', 1),
(115, 80, 62500, '2020-07-13 22:16:12', 1),
(116, 81, 50000, '2020-06-15 00:00:00', 1),
(117, 81, 62500, '2020-06-22 23:42:05', 0),
(118, 81, 62500, '2020-06-29 23:42:05', 0),
(119, 81, 62500, '2020-07-06 23:42:05', 0),
(120, 81, 62500, '2020-07-13 23:42:05', 0);

-- --------------------------------------------------------

--
-- Struktur dari tabel `transaksi_detail`
--

CREATE TABLE `transaksi_detail` (
  `id` int(20) NOT NULL,
  `transaksi_id` int(20) NOT NULL,
  `produk_id` int(15) NOT NULL,
  `diskon_id` int(15) DEFAULT NULL,
  `jumlah` double NOT NULL DEFAULT '0',
  `harga_produk` double NOT NULL DEFAULT '0',
  `firts_trx` double NOT NULL DEFAULT '0',
  `stat_trx` int(11) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COMMENT='digunakan untuk menyimpan detail transaksi pembelian produk';

--
-- Dumping data untuk tabel `transaksi_detail`
--

INSERT INTO `transaksi_detail` (`id`, `transaksi_id`, `produk_id`, `diskon_id`, `jumlah`, `harga_produk`, `firts_trx`, `stat_trx`) VALUES
(43, 67, 30, NULL, 1, 120000, 1, 1),
(45, 69, 29, NULL, 2, 120000, 1, 1),
(52, 76, 31, NULL, 1, 700000, 1, 1),
(54, 78, 29, NULL, 1, 120000, 1, 1),
(55, 79, 29, NULL, 1, 120000, 1, 1),
(56, 79, 30, NULL, 1, 120000, 1, 1),
(57, 80, 39, NULL, 1, 150000, 0, 1),
(58, 80, 41, NULL, 1, 150000, 0, 1),
(59, 81, 39, NULL, 1, 150000, 0, 1),
(60, 81, 41, NULL, 1, 150000, 0, 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `t_push_notif`
--

CREATE TABLE `t_push_notif` (
  `id` int(11) NOT NULL,
  `member_id` int(11) DEFAULT NULL,
  `marketing_id` int(11) DEFAULT NULL,
  `judul` varchar(150) NOT NULL DEFAULT '',
  `keterangan` text NOT NULL,
  `logo` varchar(300) DEFAULT NULL,
  `tanggal` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COMMENT='digunakan untuk menampilkan notif per member per marketing';

--
-- Indexes for dumped tables
--

--
-- Indexes for table `api_session`
--
ALTER TABLE `api_session`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `banner`
--
ALTER TABLE `banner`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `diskon`
--
ALTER TABLE `diskon`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `kategori_produk`
--
ALTER TABLE `kategori_produk`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `kecamatan`
--
ALTER TABLE `kecamatan`
  ADD PRIMARY KEY (`id`),
  ADD KEY `kota_id` (`kota_id`);

--
-- Indexes for table `kota`
--
ALTER TABLE `kota`
  ADD PRIMARY KEY (`id`),
  ADD KEY `provinsi_id` (`provinsi_id`);

--
-- Indexes for table `limit_kredit`
--
ALTER TABLE `limit_kredit`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `log_misi`
--
ALTER TABLE `log_misi`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `log_notif`
--
ALTER TABLE `log_notif`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `log_point`
--
ALTER TABLE `log_point`
  ADD PRIMARY KEY (`id`),
  ADD KEY `log_point_id` (`point_id`),
  ADD KEY `log_member_id` (`member_id`),
  ADD KEY `log_marketing_id` (`marketing_id`);

--
-- Indexes for table `log_setoran`
--
ALTER TABLE `log_setoran`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `log_stok`
--
ALTER TABLE `log_stok`
  ADD PRIMARY KEY (`id`),
  ADD KEY `stok_produk_id` (`produk_id`);

--
-- Indexes for table `log_transaksi_cicilan`
--
ALTER TABLE `log_transaksi_cicilan`
  ADD PRIMARY KEY (`id`),
  ADD KEY `cicilan_trans_id` (`transaksi_id`);

--
-- Indexes for table `log_users`
--
ALTER TABLE `log_users`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `member`
--
ALTER TABLE `member`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `member_detail`
--
ALTER TABLE `member_detail`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `misi`
--
ALTER TABLE `misi`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `news_artikel`
--
ALTER TABLE `news_artikel`
  ADD PRIMARY KEY (`id`),
  ADD KEY `news_artikel_user` (`user_id`);

--
-- Indexes for table `pegawai`
--
ALTER TABLE `pegawai`
  ADD PRIMARY KEY (`id`),
  ADD KEY `kecamatan_id` (`kecamatan_id`),
  ADD KEY `role_id` (`role_id`),
  ADD KEY `manager_id` (`manager_id`),
  ADD KEY `target_id` (`target_id`);

--
-- Indexes for table `pengajuan_limit`
--
ALTER TABLE `pengajuan_limit`
  ADD PRIMARY KEY (`id`),
  ADD KEY `limit_id` (`limit_id`),
  ADD KEY `member_id` (`member_id`);

--
-- Indexes for table `point`
--
ALTER TABLE `point`
  ADD PRIMARY KEY (`id`),
  ADD KEY `point_produk_id` (`produk_id`),
  ADD KEY `point_misi_id` (`misi_id`);

--
-- Indexes for table `produk`
--
ALTER TABLE `produk`
  ADD PRIMARY KEY (`id`),
  ADD KEY `kategori_id` (`kategori_id`),
  ADD KEY `promo_id` (`promo_id`);

--
-- Indexes for table `produk_diskon`
--
ALTER TABLE `produk_diskon`
  ADD PRIMARY KEY (`id`),
  ADD KEY `diskon_produk_id` (`produk_id`),
  ADD KEY `diskon_id` (`diskon_id`);

--
-- Indexes for table `produk_images`
--
ALTER TABLE `produk_images`
  ADD PRIMARY KEY (`id`),
  ADD KEY `produk_id` (`produk_id`);

--
-- Indexes for table `promo`
--
ALTER TABLE `promo`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `provinsi`
--
ALTER TABLE `provinsi`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `role`
--
ALTER TABLE `role`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `superuser`
--
ALTER TABLE `superuser`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `target_marketing`
--
ALTER TABLE `target_marketing`
  ADD PRIMARY KEY (`id`,`hari`);

--
-- Indexes for table `transaksi`
--
ALTER TABLE `transaksi`
  ADD PRIMARY KEY (`id`),
  ADD KEY `trans_member_id` (`member_id`),
  ADD KEY `trans_marketing_id` (`marketing_id`);

--
-- Indexes for table `transaksi_angsuran`
--
ALTER TABLE `transaksi_angsuran`
  ADD PRIMARY KEY (`id`),
  ADD KEY `transaksi_id` (`transaksi_id`);

--
-- Indexes for table `transaksi_detail`
--
ALTER TABLE `transaksi_detail`
  ADD PRIMARY KEY (`id`),
  ADD KEY `det_trans_id` (`transaksi_id`),
  ADD KEY `det_trans_produk_id` (`produk_id`),
  ADD KEY `det_trans_diskon_id` (`diskon_id`);

--
-- Indexes for table `t_push_notif`
--
ALTER TABLE `t_push_notif`
  ADD KEY `Index 1` (`id`),
  ADD KEY `push_member_id` (`member_id`),
  ADD KEY `push_marketing_id` (`marketing_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `api_session`
--
ALTER TABLE `api_session`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=57;
--
-- AUTO_INCREMENT for table `banner`
--
ALTER TABLE `banner`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `diskon`
--
ALTER TABLE `diskon`
  MODIFY `id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `kategori_produk`
--
ALTER TABLE `kategori_produk`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;
--
-- AUTO_INCREMENT for table `kecamatan`
--
ALTER TABLE `kecamatan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;
--
-- AUTO_INCREMENT for table `kota`
--
ALTER TABLE `kota`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `limit_kredit`
--
ALTER TABLE `limit_kredit`
  MODIFY `id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;
--
-- AUTO_INCREMENT for table `log_misi`
--
ALTER TABLE `log_misi`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=50;
--
-- AUTO_INCREMENT for table `log_notif`
--
ALTER TABLE `log_notif`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;
--
-- AUTO_INCREMENT for table `log_point`
--
ALTER TABLE `log_point`
  MODIFY `id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=67;
--
-- AUTO_INCREMENT for table `log_setoran`
--
ALTER TABLE `log_setoran`
  MODIFY `id` int(10) UNSIGNED ZEROFILL NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
--
-- AUTO_INCREMENT for table `log_stok`
--
ALTER TABLE `log_stok`
  MODIFY `id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `log_transaksi_cicilan`
--
ALTER TABLE `log_transaksi_cicilan`
  MODIFY `id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;
--
-- AUTO_INCREMENT for table `log_users`
--
ALTER TABLE `log_users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `member`
--
ALTER TABLE `member`
  MODIFY `id` int(15) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=132;
--
-- AUTO_INCREMENT for table `member_detail`
--
ALTER TABLE `member_detail`
  MODIFY `id` int(18) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=63;
--
-- AUTO_INCREMENT for table `news_artikel`
--
ALTER TABLE `news_artikel`
  MODIFY `id` int(15) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `pegawai`
--
ALTER TABLE `pegawai`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;
--
-- AUTO_INCREMENT for table `pengajuan_limit`
--
ALTER TABLE `pengajuan_limit`
  MODIFY `id` int(15) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=113;
--
-- AUTO_INCREMENT for table `point`
--
ALTER TABLE `point`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=63;
--
-- AUTO_INCREMENT for table `produk`
--
ALTER TABLE `produk`
  MODIFY `id` int(15) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=44;
--
-- AUTO_INCREMENT for table `produk_diskon`
--
ALTER TABLE `produk_diskon`
  MODIFY `id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `produk_images`
--
ALTER TABLE `produk_images`
  MODIFY `id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=56;
--
-- AUTO_INCREMENT for table `promo`
--
ALTER TABLE `promo`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `provinsi`
--
ALTER TABLE `provinsi`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `role`
--
ALTER TABLE `role`
  MODIFY `id` tinyint(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT for table `superuser`
--
ALTER TABLE `superuser`
  MODIFY `id` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `target_marketing`
--
ALTER TABLE `target_marketing`
  MODIFY `id` tinyint(2) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `transaksi`
--
ALTER TABLE `transaksi`
  MODIFY `id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=82;
--
-- AUTO_INCREMENT for table `transaksi_angsuran`
--
ALTER TABLE `transaksi_angsuran`
  MODIFY `id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=121;
--
-- AUTO_INCREMENT for table `transaksi_detail`
--
ALTER TABLE `transaksi_detail`
  MODIFY `id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=61;
--
-- AUTO_INCREMENT for table `t_push_notif`
--
ALTER TABLE `t_push_notif`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `kecamatan`
--
ALTER TABLE `kecamatan`
  ADD CONSTRAINT `kota_id` FOREIGN KEY (`kota_id`) REFERENCES `kota` (`id`);

--
-- Ketidakleluasaan untuk tabel `kota`
--
ALTER TABLE `kota`
  ADD CONSTRAINT `provinsi_id` FOREIGN KEY (`provinsi_id`) REFERENCES `provinsi` (`id`);

--
-- Ketidakleluasaan untuk tabel `log_point`
--
ALTER TABLE `log_point`
  ADD CONSTRAINT `log_marketing_id` FOREIGN KEY (`marketing_id`) REFERENCES `pegawai` (`id`),
  ADD CONSTRAINT `log_member_id` FOREIGN KEY (`member_id`) REFERENCES `member` (`id`),
  ADD CONSTRAINT `log_point_id` FOREIGN KEY (`point_id`) REFERENCES `point` (`id`);

--
-- Ketidakleluasaan untuk tabel `log_stok`
--
ALTER TABLE `log_stok`
  ADD CONSTRAINT `stok_produk_id` FOREIGN KEY (`produk_id`) REFERENCES `produk` (`id`);

--
-- Ketidakleluasaan untuk tabel `log_transaksi_cicilan`
--
ALTER TABLE `log_transaksi_cicilan`
  ADD CONSTRAINT `cicilan_trans_id` FOREIGN KEY (`transaksi_id`) REFERENCES `transaksi` (`id`);

--
-- Ketidakleluasaan untuk tabel `news_artikel`
--
ALTER TABLE `news_artikel`
  ADD CONSTRAINT `news_artikel_user` FOREIGN KEY (`user_id`) REFERENCES `pegawai` (`id`);

--
-- Ketidakleluasaan untuk tabel `pegawai`
--
ALTER TABLE `pegawai`
  ADD CONSTRAINT `kecamatan_id` FOREIGN KEY (`kecamatan_id`) REFERENCES `kecamatan` (`id`),
  ADD CONSTRAINT `manager_id` FOREIGN KEY (`manager_id`) REFERENCES `pegawai` (`id`),
  ADD CONSTRAINT `target_id` FOREIGN KEY (`target_id`) REFERENCES `target_marketing` (`id`);

--
-- Ketidakleluasaan untuk tabel `pengajuan_limit`
--
ALTER TABLE `pengajuan_limit`
  ADD CONSTRAINT `limit_id` FOREIGN KEY (`limit_id`) REFERENCES `limit_kredit` (`id`),
  ADD CONSTRAINT `member_id` FOREIGN KEY (`member_id`) REFERENCES `member` (`id`);

--
-- Ketidakleluasaan untuk tabel `point`
--
ALTER TABLE `point`
  ADD CONSTRAINT `point_misi_id` FOREIGN KEY (`misi_id`) REFERENCES `misi` (`id`),
  ADD CONSTRAINT `point_produk_id` FOREIGN KEY (`produk_id`) REFERENCES `produk` (`id`);

--
-- Ketidakleluasaan untuk tabel `produk`
--
ALTER TABLE `produk`
  ADD CONSTRAINT `kategori_id` FOREIGN KEY (`kategori_id`) REFERENCES `kategori_produk` (`id`),
  ADD CONSTRAINT `promo_id` FOREIGN KEY (`promo_id`) REFERENCES `promo` (`id`);

--
-- Ketidakleluasaan untuk tabel `produk_diskon`
--
ALTER TABLE `produk_diskon`
  ADD CONSTRAINT `diskon_id` FOREIGN KEY (`diskon_id`) REFERENCES `diskon` (`id`),
  ADD CONSTRAINT `diskon_produk_id` FOREIGN KEY (`produk_id`) REFERENCES `produk` (`id`);

--
-- Ketidakleluasaan untuk tabel `produk_images`
--
ALTER TABLE `produk_images`
  ADD CONSTRAINT `produk_id` FOREIGN KEY (`produk_id`) REFERENCES `produk` (`id`);

--
-- Ketidakleluasaan untuk tabel `transaksi`
--
ALTER TABLE `transaksi`
  ADD CONSTRAINT `trans_marketing_id` FOREIGN KEY (`marketing_id`) REFERENCES `pegawai` (`id`),
  ADD CONSTRAINT `trans_member_id` FOREIGN KEY (`member_id`) REFERENCES `member` (`id`);

--
-- Ketidakleluasaan untuk tabel `transaksi_angsuran`
--
ALTER TABLE `transaksi_angsuran`
  ADD CONSTRAINT `transaksi_angsuran_ibfk_1` FOREIGN KEY (`transaksi_id`) REFERENCES `transaksi` (`id`);

--
-- Ketidakleluasaan untuk tabel `transaksi_detail`
--
ALTER TABLE `transaksi_detail`
  ADD CONSTRAINT `det_trans_diskon_id` FOREIGN KEY (`diskon_id`) REFERENCES `diskon` (`id`),
  ADD CONSTRAINT `det_trans_id` FOREIGN KEY (`transaksi_id`) REFERENCES `transaksi` (`id`),
  ADD CONSTRAINT `det_trans_produk_id` FOREIGN KEY (`produk_id`) REFERENCES `produk` (`id`);

--
-- Ketidakleluasaan untuk tabel `t_push_notif`
--
ALTER TABLE `t_push_notif`
  ADD CONSTRAINT `push_marketing_id` FOREIGN KEY (`marketing_id`) REFERENCES `pegawai` (`id`),
  ADD CONSTRAINT `push_member_id` FOREIGN KEY (`member_id`) REFERENCES `member` (`id`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
