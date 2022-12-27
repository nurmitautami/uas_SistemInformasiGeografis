-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 26 Des 2022 pada 02.43
-- Versi server: 10.4.25-MariaDB
-- Versi PHP: 8.1.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `uaswebgis`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `kategori`
--

CREATE TABLE `kategori` (
  `id` int(5) UNSIGNED NOT NULL,
  `kategori_nama` varchar(100) NOT NULL,
  `kategori_deskripsi` text DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `deleted_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data untuk tabel `kategori`
--

INSERT INTO `kategori` (`id`, `kategori_nama`, `kategori_deskripsi`, `created_at`, `updated_at`, `deleted_at`) VALUES
(2, 'Mineral Batuan Beku Granit', '10-40% Kandungan Mineral', '2022-12-25 19:26:35', '2022-12-25 19:26:35', NULL),
(3, 'Mineral Batuan Beku Sianit', '30-60% Kandugan Mineral', '2022-12-25 19:27:17', '2022-12-25 19:27:17', NULL);

-- --------------------------------------------------------

--
-- Struktur dari tabel `member`
--

CREATE TABLE `member` (
  `id` int(5) UNSIGNED NOT NULL,
  `pengguna_id` int(5) UNSIGNED NOT NULL,
  `member_nama` varchar(100) DEFAULT NULL,
  `member_email` varchar(100) DEFAULT NULL,
  `member_hp` varchar(20) DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `deleted_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data untuk tabel `member`
--

INSERT INTO `member` (`id`, `pengguna_id`, `member_nama`, `member_email`, `member_hp`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 1, 'Mita Utami', 'mitautami47@gmail.com', '081281429601', '2022-12-25 18:51:57', '2022-12-25 18:51:57', NULL);

-- --------------------------------------------------------

--
-- Struktur dari tabel `migrations`
--

CREATE TABLE `migrations` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `version` varchar(255) NOT NULL,
  `class` varchar(255) NOT NULL,
  `group` varchar(255) NOT NULL,
  `namespace` varchar(255) NOT NULL,
  `time` int(11) NOT NULL,
  `batch` int(11) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data untuk tabel `migrations`
--

INSERT INTO `migrations` (`id`, `version`, `class`, `group`, `namespace`, `time`, `batch`) VALUES
(1, '2022-04-06-053006', 'App\\Database\\Migrations\\Kategori', 'default', 'App', 1672015898, 1),
(2, '2022-04-08-143424', 'App\\Database\\Migrations\\Subkategori', 'default', 'App', 1672015898, 1),
(3, '2022-04-13-220503', 'App\\Database\\Migrations\\Pengguna', 'default', 'App', 1672015898, 1),
(4, '2022-04-18-123032', 'App\\Database\\Migrations\\Member', 'default', 'App', 1672015898, 1),
(5, '2022-12-25-110954', 'App\\Database\\Migrations\\Potensial', 'default', 'App', 1672015898, 1),
(6, '2022-12-25-111005', 'App\\Database\\Migrations\\TblSumberdayamineral', 'default', 'App', 1672015898, 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `pengguna`
--

CREATE TABLE `pengguna` (
  `id` int(5) UNSIGNED NOT NULL,
  `pengguna_foto` varchar(100) DEFAULT NULL,
  `pengguna_nama` varchar(100) DEFAULT NULL,
  `pengguna_username` varchar(50) DEFAULT NULL,
  `pengguna_password` varchar(100) DEFAULT NULL,
  `pengguna_status` enum('A','N','B') DEFAULT 'A',
  `pengguna_level` enum('Administrator','Member') DEFAULT 'Member',
  `signed_at` datetime DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `deleted_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data untuk tabel `pengguna`
--

INSERT INTO `pengguna` (`id`, `pengguna_foto`, `pengguna_nama`, `pengguna_username`, `pengguna_password`, `pengguna_status`, `pengguna_level`, `signed_at`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, NULL, 'Mita Utami', 'Mita Utami', '$2y$10$HlJmmiqjeOXNOCwok/AYKOo/4T9uFdwPWxLBROgzwFHiQNWYBVaqK', 'A', 'Member', NULL, '2022-12-25 18:51:57', '2022-12-25 18:51:57', NULL);

-- --------------------------------------------------------

--
-- Struktur dari tabel `subkategori`
--

CREATE TABLE `subkategori` (
  `id` int(5) UNSIGNED NOT NULL,
  `kategori_id` int(5) UNSIGNED NOT NULL,
  `subkategori_ikon` varchar(50) NOT NULL,
  `subkategori_nama` varchar(100) NOT NULL,
  `subkategori_deskripsi` text DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `deleted_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data untuk tabel `subkategori`
--

INSERT INTO `subkategori` (`id`, `kategori_id`, `subkategori_ikon`, `subkategori_nama`, `subkategori_deskripsi`, `created_at`, `updated_at`, `deleted_at`) VALUES
(3, 2, '1672018281_5b2df39a2bfaef25f490.png', 'Bengkulu', '-3.6230713262356864, 102.3101715544766', '2022-12-25 19:28:33', '2022-12-25 19:31:21', NULL);

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_potensial`
--

CREATE TABLE `tbl_potensial` (
  `id_potensial` int(15) NOT NULL,
  `slug` varchar(70) NOT NULL,
  `kondisi_lahan` varchar(70) NOT NULL,
  `akses` varchar(70) NOT NULL,
  `jenis_aktivitas` varchar(70) NOT NULL,
  `intensitas` varchar(70) NOT NULL,
  `dampak` varchar(70) NOT NULL,
  `foto_lokasi` varchar(255) NOT NULL,
  `latitude` varchar(255) NOT NULL,
  `longitude` varchar(255) NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data untuk tabel `tbl_potensial`
--

INSERT INTO `tbl_potensial` (`id_potensial`, `slug`, `kondisi_lahan`, `akses`, `jenis_aktivitas`, `intensitas`, `dampak`, `foto_lokasi`, `latitude`, `longitude`, `created_at`, `updated_at`) VALUES
(3, '', 'Terdapat puluhan lubang tambang bekas galian', 'Cukup Baik', 'Tidak ada aktivitas manusia disekitar sana', '-', 'Pencemaran air', '1672018763_702ecea1abd969aeedc6.jpg', '-3.639517732223585', '102.29370572666797', '2022-12-25 19:39:23', '2022-12-25 19:39:23');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_sumberdayamineral`
--

CREATE TABLE `tbl_sumberdayamineral` (
  `id_sumberdayamineral` int(15) NOT NULL,
  `slug` varchar(70) NOT NULL,
  `jenis_mineral` varchar(70) NOT NULL,
  `kualitas` varchar(70) NOT NULL,
  `ketersediaan` varchar(70) NOT NULL,
  `latitude` varchar(255) NOT NULL,
  `longitude` varchar(255) NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data untuk tabel `tbl_sumberdayamineral`
--

INSERT INTO `tbl_sumberdayamineral` (`id_sumberdayamineral`, `slug`, `jenis_mineral`, `kualitas`, `ketersediaan`, `latitude`, `longitude`, `created_at`, `updated_at`) VALUES
(3, '', 'Sianit - Nefelin', 'Baik', '30%', '-3.6449998008920375', '102.30468294520706', '2022-12-25 19:40:47', '2022-12-25 19:40:47');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `kategori`
--
ALTER TABLE `kategori`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `member`
--
ALTER TABLE `member`
  ADD PRIMARY KEY (`id`),
  ADD KEY `member_pengguna_id_foreign` (`pengguna_id`);

--
-- Indeks untuk tabel `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `pengguna`
--
ALTER TABLE `pengguna`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `subkategori`
--
ALTER TABLE `subkategori`
  ADD PRIMARY KEY (`id`),
  ADD KEY `subkategori_kategori_id_foreign` (`kategori_id`);

--
-- Indeks untuk tabel `tbl_potensial`
--
ALTER TABLE `tbl_potensial`
  ADD PRIMARY KEY (`id_potensial`);

--
-- Indeks untuk tabel `tbl_sumberdayamineral`
--
ALTER TABLE `tbl_sumberdayamineral`
  ADD PRIMARY KEY (`id_sumberdayamineral`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `kategori`
--
ALTER TABLE `kategori`
  MODIFY `id` int(5) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT untuk tabel `member`
--
ALTER TABLE `member`
  MODIFY `id` int(5) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT untuk tabel `pengguna`
--
ALTER TABLE `pengguna`
  MODIFY `id` int(5) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `subkategori`
--
ALTER TABLE `subkategori`
  MODIFY `id` int(5) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT untuk tabel `tbl_potensial`
--
ALTER TABLE `tbl_potensial`
  MODIFY `id_potensial` int(15) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT untuk tabel `tbl_sumberdayamineral`
--
ALTER TABLE `tbl_sumberdayamineral`
  MODIFY `id_sumberdayamineral` int(15) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `member`
--
ALTER TABLE `member`
  ADD CONSTRAINT `member_pengguna_id_foreign` FOREIGN KEY (`pengguna_id`) REFERENCES `pengguna` (`id`);

--
-- Ketidakleluasaan untuk tabel `subkategori`
--
ALTER TABLE `subkategori`
  ADD CONSTRAINT `subkategori_kategori_id_foreign` FOREIGN KEY (`kategori_id`) REFERENCES `kategori` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
