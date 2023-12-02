-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 23 Jun 2023 pada 18.41
-- Versi server: 10.4.28-MariaDB
-- Versi PHP: 8.1.17

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `sewslay`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `acara`
--

CREATE TABLE `acara` (
  `id_acara` int(11) NOT NULL,
  `nama_acara` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `acara`
--

INSERT INTO `acara` (`id_acara`, `nama_acara`) VALUES
(1, 'formal'),
(2, 'non-formal'),
(3, 'casual'),
(4, 'sport'),
(5, 'party');

-- --------------------------------------------------------

--
-- Struktur dari tabel `detailacara`
--

CREATE TABLE `detailacara` (
  `id_detailacara` int(11) NOT NULL,
  `id_konten` int(11) DEFAULT NULL,
  `id_acara` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `detailacara`
--

INSERT INTO `detailacara` (`id_detailacara`, `id_konten`, `id_acara`) VALUES
(5, 13, 1),
(6, 13, 2),
(7, 14, 2),
(8, 14, 3),
(9, 15, 1),
(10, 16, 1),
(11, 18, 1),
(12, 19, 1),
(13, 19, 2),
(14, 20, 1),
(15, 20, 2),
(16, 28, 2),
(17, 28, 3);

-- --------------------------------------------------------

--
-- Struktur dari tabel `detailkemampuan`
--

CREATE TABLE `detailkemampuan` (
  `id_detailkepuan` int(11) NOT NULL,
  `id_konten` int(11) DEFAULT NULL,
  `id_kemampuan` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `detailkemampuan`
--

INSERT INTO `detailkemampuan` (`id_detailkepuan`, `id_konten`, `id_kemampuan`) VALUES
(5, 13, 2),
(6, 13, 3),
(7, 14, 1),
(8, 14, 2),
(9, 15, 1),
(10, 16, 2),
(11, 17, 1),
(12, 18, 1),
(13, 19, 1),
(14, 20, 2),
(15, 28, 2),
(16, 28, 3);

-- --------------------------------------------------------

--
-- Struktur dari tabel `follow`
--

CREATE TABLE `follow` (
  `id_follow` int(11) NOT NULL,
  `id_follower` int(11) DEFAULT NULL,
  `id_following` int(11) DEFAULT NULL,
  `timestamp` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `kemampuan`
--

CREATE TABLE `kemampuan` (
  `id_kemampuan` int(11) NOT NULL,
  `nama_kemampuan` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `kemampuan`
--

INSERT INTO `kemampuan` (`id_kemampuan`, `nama_kemampuan`) VALUES
(1, 'pemula'),
(2, 'menengah'),
(3, 'ahli');

-- --------------------------------------------------------

--
-- Struktur dari tabel `konten`
--

CREATE TABLE `konten` (
  `id_konten` int(11) NOT NULL,
  `id_user` int(11) DEFAULT NULL,
  `judul_konten` varchar(255) DEFAULT NULL,
  `nama_gambar` varchar(255) DEFAULT NULL,
  `deskripsi` text DEFAULT NULL,
  `nama_file` varchar(225) DEFAULT NULL,
  `tgl_upload` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `ukuran` varchar(50) DEFAULT NULL,
  `jenis_pakaian` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `konten`
--

INSERT INTO `konten` (`id_konten`, `id_user`, `judul_konten`, `nama_gambar`, `deskripsi`, `nama_file`, `tgl_upload`, `ukuran`, `jenis_pakaian`) VALUES
(13, 5, 'Celana Baggy', 'path_gambar/celana.jpg', 'Celana Baggy wanita jumbo', 'path_file/17957-35489-1-SM.pdf', '2023-06-18 04:21:49', 'XL', 'bawahan'),
(19, 10, 'Blouse Blossom', 'path_gambar/Blouses & Shirts - & Other Stories.png', 'Baju Bernuansa taman bunga', 'path_file/267-Article Text-1187-2-10-20221114.pdf', '2023-06-23 09:21:33', 'M', 'atasan'),
(20, 10, 'Mocca Blouse', 'path_gambar/Fiona Hazel Hull Silk Shirt Dress - Korean Clothing & Cosmetics.jpg', 'Blouse dengan motif polos yang dapat digunakan pada acara formal maupun nonformal', 'path_file/267-Article Text-1187-2-10-20221114.pdf', '2023-06-23 09:24:08', 'M', 'bawahan'),
(21, 10, '', 'path_gambar/House Dresses Are The Key To Ultra-Stylish At-Home Style Editorialist.png', '', 'path_file/', '2023-06-23 09:26:13', '', ''),
(22, 11, '', 'path_gambar/Baby Textured Lantern Sleeve Ruffle Hem Dress.jpg', '', 'path_file/', '2023-06-23 09:27:13', '', ''),
(23, 11, '', 'path_gambar/Wishlist — Dreams + Jeans.jpg', '', 'path_file/', '2023-06-23 09:27:26', '', ''),
(24, 11, '', 'path_gambar/【マリハ_MARIHA】の春の花のドレス 人気、トレンドファッション・服の通販 founy(ファニー) ID prp329100001580588 ファッション(Fashion) レディースファッション(WOMEN) ワンピース(Dress) チュニッ.jpg', '', 'path_file/', '2023-06-23 09:28:12', '', ''),
(25, 9, '', 'path_gambar/Satin Maxi Dress _ Dubai _ Islamic Clothing _ Hijab _ Prom Dress _ Abaya For Women _ Modest _ Jilbab _ Wedding Gown Dress _ New _ Exclusive.jpg', '', 'path_file/', '2023-06-23 09:41:09', '', ''),
(26, 9, '', 'path_gambar/Muslim Dress Evening Gown Satin Dress Maxi Dress - Etsy Israel.jpg', '', 'path_file/', '2023-06-23 09:41:43', '', ''),
(27, 9, '', 'path_gambar/Inspirasi kebaya wisuda inspirasi Model baju wanita, Gaun sederhana, Model pakaian wanita.jpg', '', 'path_file/', '2023-06-23 09:42:01', '', ''),
(28, 4, 'Blouse Bunga', 'path_gambar/Boho Mini Dresses To Buy For Summer.jpg', 'Blouse bunga-bunga', 'path_file/2999-Article Text-14190-1-10-20210301.pdf', '2023-06-23 10:24:47', 'M', 'atasan');

-- --------------------------------------------------------

--
-- Struktur dari tabel `simpan`
--

CREATE TABLE `simpan` (
  `id_simpan` int(11) NOT NULL,
  `id_user` int(11) DEFAULT NULL,
  `id_konten` int(11) DEFAULT NULL,
  `timestamp` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `simpan`
--

INSERT INTO `simpan` (`id_simpan`, `id_user`, `id_konten`, `timestamp`) VALUES
(2, 9, 18, '2023-06-23 13:51:37'),
(3, 9, 13, '2023-06-23 14:03:29'),
(7, 4, 20, '2023-06-23 15:26:35');

-- --------------------------------------------------------

--
-- Struktur dari tabel `user`
--

CREATE TABLE `user` (
  `id_user` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(225) NOT NULL,
  `nama_pengguna` varchar(225) DEFAULT NULL,
  `foto_profil` varchar(225) DEFAULT NULL,
  `tgl_buat` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `bio` varchar(255) DEFAULT NULL,
  `jml_pengikut` int(11) DEFAULT NULL,
  `jml_diikuti` int(11) DEFAULT NULL,
  `twitter` varchar(255) DEFAULT NULL,
  `tiktok` varchar(255) DEFAULT NULL,
  `instagram` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `user`
--

INSERT INTO `user` (`id_user`, `username`, `email`, `password`, `nama_pengguna`, `foto_profil`, `tgl_buat`, `bio`, `jml_pengikut`, `jml_diikuti`, `twitter`, `tiktok`, `instagram`) VALUES
(1, 'cahayaya', 'cahaya1@gmail.com', 'cahaya1', NULL, NULL, '2023-06-20 12:35:49', NULL, NULL, NULL, NULL, NULL, NULL),
(2, 'cicitra', 'citrayufi2@gmail.com', '$2y$10$.ox', NULL, NULL, '2023-06-20 12:35:24', NULL, NULL, NULL, NULL, NULL, NULL),
(3, '', '', '$2y$10$lNcHyIc2rOm3OnyVGfnQ/edgVcMG4.iQ7HXupRRA4ve3indMWCgyK', NULL, '6491a48d886411.49819489_', '2023-06-20 13:07:25', NULL, NULL, NULL, NULL, NULL, NULL),
(4, 'divasya', 'divasya23@gmail.com', '$2y$10$yqm41pgLCXWixoq0Nh7.c.AN31gz39oTvJD/mB2rizbsOs9OJo.4a', 'Divasya Karl', 'path_fotoprofil/a z k a a j k a.jpg', '2023-06-23 15:25:41', 'Welcome to my account... Be creative and inovativ with me. Follow for more content.', NULL, NULL, '', '', ''),
(5, '@aliadwntaaaaaaaaa', 'dewantoalia@gmail.com', '$2y$10$1gmNGJwf9m0EpE.HaxPROuYuErxjRm.Rv9n91.AogGIgg4.XfqP1a', 'alyaaaa', 'path_fotoprofil/Foto Formal.png', '2023-06-22 11:52:23', 'alya ddeee', NULL, NULL, NULL, NULL, NULL),
(7, 'cakraa__', 'cakrafayy@gmail.com', '$2y$10$ruJLJjHlZYIKOvWznKtT5ueBcxkXSERtYl5gR4/Rx8ZOjxlG7bok.', 'Cakra Kay', 'path_fotoprofil/D E T I K  ( slow update ).jpg', '2023-06-21 13:26:36', 'Hai...I\'m Cakra Key and this is my blog. Have fun...;)', NULL, NULL, NULL, NULL, NULL),
(8, 'aliadwnt', 'dewantoalia2@gmail.com', 'aliadwnt', NULL, NULL, '2023-06-23 08:11:39', NULL, NULL, NULL, NULL, NULL, NULL),
(9, 'aliadwnt', 'dewa@gmail.com', '$2y$10$IQKDxrAmrVvpK.9Mwb4pneJC8FmnAzy.S8cJp1Fl344Vh2cZQE.b6', 'Alia Dewanto', 'path_fotoprofil/1.jpg', '2023-06-23 14:39:11', 'aaa', NULL, NULL, 'aliadwnt', 'aliadwnt', 'aliadwnt'),
(10, 'bella1', 'bella@gmail.com', '$2y$10$8AbtFD.GqeSzOpYlFXrNGeex2YRi7Q8CXac9YWfVWqLXxaijgqFva', NULL, NULL, '2023-06-23 09:18:28', NULL, NULL, NULL, NULL, NULL, NULL),
(11, 'prima1', 'prima@gmail.com', '$2y$10$bsWlyy9Srfnev0ixvaCsCebYy23xMJx/RIckqkd4mxy1DFijjtPqO', NULL, NULL, '2023-06-23 09:26:54', NULL, NULL, NULL, NULL, NULL, NULL),
(12, 'jeni1', 'jenifla@gmail.com', '$2y$10$g7w81DUIHgnCmtjJPRgWkuAVSjiRkZzBk6Xwwe1axTfmyoj4Ei3FS', '', NULL, '2023-06-23 14:38:37', '', NULL, NULL, '', '', '');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `acara`
--
ALTER TABLE `acara`
  ADD PRIMARY KEY (`id_acara`);

--
-- Indeks untuk tabel `detailacara`
--
ALTER TABLE `detailacara`
  ADD PRIMARY KEY (`id_detailacara`),
  ADD KEY `id_konten` (`id_konten`),
  ADD KEY `id_acara` (`id_acara`);

--
-- Indeks untuk tabel `detailkemampuan`
--
ALTER TABLE `detailkemampuan`
  ADD PRIMARY KEY (`id_detailkepuan`),
  ADD KEY `id_konten` (`id_konten`),
  ADD KEY `id_kemampuan` (`id_kemampuan`);

--
-- Indeks untuk tabel `follow`
--
ALTER TABLE `follow`
  ADD PRIMARY KEY (`id_follow`),
  ADD KEY `id_follower` (`id_follower`),
  ADD KEY `id_following` (`id_following`);

--
-- Indeks untuk tabel `kemampuan`
--
ALTER TABLE `kemampuan`
  ADD PRIMARY KEY (`id_kemampuan`);

--
-- Indeks untuk tabel `konten`
--
ALTER TABLE `konten`
  ADD PRIMARY KEY (`id_konten`),
  ADD KEY `id_user` (`id_user`);

--
-- Indeks untuk tabel `simpan`
--
ALTER TABLE `simpan`
  ADD PRIMARY KEY (`id_simpan`),
  ADD KEY `id_user` (`id_user`),
  ADD KEY `id_konten` (`id_konten`);

--
-- Indeks untuk tabel `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id_user`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `detailacara`
--
ALTER TABLE `detailacara`
  MODIFY `id_detailacara` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT untuk tabel `detailkemampuan`
--
ALTER TABLE `detailkemampuan`
  MODIFY `id_detailkepuan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT untuk tabel `follow`
--
ALTER TABLE `follow`
  MODIFY `id_follow` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `konten`
--
ALTER TABLE `konten`
  MODIFY `id_konten` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT untuk tabel `simpan`
--
ALTER TABLE `simpan`
  MODIFY `id_simpan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT untuk tabel `user`
--
ALTER TABLE `user`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `detailacara`
--
ALTER TABLE `detailacara`
  ADD CONSTRAINT `detailacara_ibfk_1` FOREIGN KEY (`id_konten`) REFERENCES `konten` (`id_konten`),
  ADD CONSTRAINT `detailacara_ibfk_2` FOREIGN KEY (`id_acara`) REFERENCES `acara` (`id_acara`);

--
-- Ketidakleluasaan untuk tabel `detailkemampuan`
--
ALTER TABLE `detailkemampuan`
  ADD CONSTRAINT `detailkemampuan_ibfk_1` FOREIGN KEY (`id_konten`) REFERENCES `konten` (`id_konten`),
  ADD CONSTRAINT `detailkemampuan_ibfk_2` FOREIGN KEY (`id_kemampuan`) REFERENCES `kemampuan` (`id_kemampuan`);

--
-- Ketidakleluasaan untuk tabel `follow`
--
ALTER TABLE `follow`
  ADD CONSTRAINT `follow_ibfk_1` FOREIGN KEY (`id_follower`) REFERENCES `user` (`id_user`),
  ADD CONSTRAINT `follow_ibfk_2` FOREIGN KEY (`id_following`) REFERENCES `user` (`id_user`);

--
-- Ketidakleluasaan untuk tabel `konten`
--
ALTER TABLE `konten`
  ADD CONSTRAINT `konten_ibfk_1` FOREIGN KEY (`id_user`) REFERENCES `user` (`id_user`);

--
-- Ketidakleluasaan untuk tabel `simpan`
--
ALTER TABLE `simpan`
  ADD CONSTRAINT `simpan_ibfk_1` FOREIGN KEY (`id_user`) REFERENCES `user` (`id_user`),
  ADD CONSTRAINT `simpan_ibfk_2` FOREIGN KEY (`id_konten`) REFERENCES `konten` (`id_konten`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
