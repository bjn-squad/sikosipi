-- phpMyAdmin SQL Dump
-- version 4.8.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 28 Okt 2020 pada 14.42
-- Versi server: 10.1.32-MariaDB
-- Versi PHP: 7.2.5

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_kspmitraartha`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `aksi`
--

CREATE TABLE `aksi` (
  `id_aksi` int(11) NOT NULL,
  `id_pegawai` int(11) NOT NULL,
  `id_data_kategori` int(11) NOT NULL,
  `kategori_aksi` varchar(100) NOT NULL,
  `pesan_aksi` text NOT NULL,
  `nama_admin` varchar(100) NOT NULL DEFAULT 'Belum Diverifikasi',
  `status_aksi` varchar(100) NOT NULL DEFAULT 'Belum Diverifikasi',
  `status_verifikasi` varchar(100) NOT NULL DEFAULT 'Pending'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `aksi`
--

INSERT INTO `aksi` (`id_aksi`, `id_pegawai`, `id_data_kategori`, `kategori_aksi`, `pesan_aksi`, `nama_admin`, `status_aksi`, `status_verifikasi`) VALUES
(3, 3, 3, 'Nonaktifkan Anggota', 'Jito pernah bermasalah di berbagai koperasi soal hutangnya yang tidak lunas. Berikut koperasi yang pernah jadi korban jito\r\n\r\n1. Koperasi Karep\r\n2. Koperasi Bahagia\r\n\r\nTolong blacklist saja untuk nama jito hartati', 'Ardan Anjung Kusuma', 'Penonaktifan Ditolak', 'Diterima Admin'),
(4, 2, 3, 'Nonaktifkan Anggota', 'Tolong review lagi pak, jito orangnya tidak bertanggung jawab dalam melunasi hutangnya. Biar lebih enak silahkan kontak CP dibawah ini, humas koperasi yang pernah menjadi korban jito : \r\n\r\n1. Koperasi Karep (0812496023954)\r\n2. Koperasi Bahagia (085823232445)\r\n\r\nDia sudah diblacklist di berbagai koperasi bojonegoro', 'Ardan Anjung Kusuma', 'Penonaktifan Diterima', 'Diterima Admin');

-- --------------------------------------------------------

--
-- Struktur dari tabel `anggota`
--

CREATE TABLE `anggota` (
  `id_anggota` int(11) NOT NULL,
  `nama_anggota` varchar(200) NOT NULL,
  `alamat_anggota` varchar(200) NOT NULL,
  `no_telp_anggota` varchar(50) NOT NULL,
  `username` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `status_anggota` varchar(200) NOT NULL DEFAULT 'Tidak Aktif',
  `tanggal_keanggotaan` varchar(100) NOT NULL DEFAULT 'Belum Menjadi Anggota',
  `foto_ktp_anggota` varchar(500) NOT NULL DEFAULT 'Belum Diupload',
  `foto_selfie_ktp_anggota` varchar(500) NOT NULL DEFAULT 'Belum Diupload'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `anggota`
--

INSERT INTO `anggota` (`id_anggota`, `nama_anggota`, `alamat_anggota`, `no_telp_anggota`, `username`, `email`, `password`, `status_anggota`, `tanggal_keanggotaan`, `foto_ktp_anggota`, `foto_selfie_ktp_anggota`) VALUES
(1, 'Budi Surya', 'Jl. Mawar Merah 21 Bojonegoro', '085687921256', 'budi', 'budianto@gmail.com', '9c5fa085ce256c7c598f6710584ab25d', 'Aktif', '27-10-2020', '17102020163046example-ktp-1.jpg', '17102020163046img-kyc-sample-2.png'),
(2, 'Jasmin Putri', 'Jl. Melati 105 Kalitidu, Bojonegoro', '085125891250', 'jasmin', 'jasmin@gmail.com', 'c677901e8baa1f96025f0938a4cd0423', 'Sedang Diverifikasi (Menunggu Pembayaran Simpanan Pokok)', 'Belum Menjadi Anggota', 'example-ktp-1.jpg', 'example-with-ktp-1.jpg'),
(3, 'Jito Hartati', 'Jl. Grogol 21 Bojonegoro', '0812385794223', 'jito', 'jito@gmail.com', '28d8024451d991a899aaf3a4875c8cfa', 'Dinonaktifkan', 'Belum Menjadi Anggota', '17102020132043example-ktp-1.jpg', '17102020132043img-kyc-sample-2.png'),
(4, 'Siti Aisyah', 'Jl. Mawar 15 Malang', '081254219520', 'siti', 'siti@gmail.com', '8230f9cb6dd627a92fdd0c6f282affd2', 'Sedang Diverifikasi', 'Belum Menjadi Anggota', '28102020035911example-ktp-1.jpg', '28102020035911example-with-ktp-1.jpg'),
(5, 'Andi Muhibin', 'Jl. Anggrek 12 Kapas, Bojonegoro', '081289742951', 'andi', 'andi@gmail.com', '03339dc0dff443f15c254baccde9bece', 'Tidak Aktif', 'Belum Menjadi Anggota', 'Belum Diupload', 'Belum Diupload');

-- --------------------------------------------------------

--
-- Struktur dari tabel `angsuran_detail`
--

CREATE TABLE `angsuran_detail` (
  `id_angsuran_detail` int(11) NOT NULL,
  `id_pinjaman` int(11) NOT NULL,
  `id_pegawai` int(11) NOT NULL,
  `tanggal_angsuran` varchar(50) NOT NULL,
  `angsuran_pembayaran` int(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Struktur dari tabel `lupa_password`
--

CREATE TABLE `lupa_password` (
  `id_lupa_password` int(11) NOT NULL,
  `id_anggota` int(11) NOT NULL,
  `pertanyaankeamanan1` text NOT NULL,
  `pertanyaankeamanan2` text NOT NULL,
  `jawabankeamanan1` text NOT NULL,
  `jawabankeamanan2` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `lupa_password`
--

INSERT INTO `lupa_password` (`id_lupa_password`, `id_anggota`, `pertanyaankeamanan1`, `pertanyaankeamanan2`, `jawabankeamanan1`, `jawabankeamanan2`) VALUES
(1, 1, 'Apa angka favorit anda?(Contoh: 29)', 'Siapakah teman masa kecil anda?', '89', 'Riza Zulfahnur'),
(2, 2, 'Di kota manakah ayah dan ibu anda bertemu?', 'Apa hobby anda?', 'Paris', 'Berkuda'),
(4, 3, 'Apa angka favorit anda?(Contoh: 29)', 'Apa hobby anda?', '12', 'Mancing'),
(6, 5, 'Siapakah teman masa kecil anda?', 'Apa hobby anda?', 'Handrik', 'Bermain Gitar'),
(7, 4, 'Apa nama belakang ibu anda?', 'Apa hobby anda?', 'Aisyah', 'Membaca');

-- --------------------------------------------------------

--
-- Struktur dari tabel `pegawai`
--

CREATE TABLE `pegawai` (
  `id_pegawai` int(11) NOT NULL,
  `nama_pegawai` varchar(200) NOT NULL,
  `alamat_pegawai` varchar(200) NOT NULL,
  `no_telp_pegawai` varchar(50) NOT NULL,
  `username` varchar(60) NOT NULL,
  `email` varchar(200) NOT NULL,
  `password` varchar(100) NOT NULL,
  `kategori` int(1) NOT NULL DEFAULT '2'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `pegawai`
--

INSERT INTO `pegawai` (`id_pegawai`, `nama_pegawai`, `alamat_pegawai`, `no_telp_pegawai`, `username`, `email`, `password`, `kategori`) VALUES
(1, 'Ardan Anjung Kusuma', 'Banjarejo', '085212342321', 'ardan', 'ardan@gmail.com', 'd2219d75098abd01493908d2f7f4d13d', 1),
(2, 'Dina Lisuardi', 'Banjarejo', '081235896824', 'dina', 'dina@gmail.com', 'f093c0fed979519fbc43d772b76f5c86', 2),
(3, 'Muh Riza Zulfahnur', 'Kalitidu', '085212396501', 'riza', 'riza@gmail.com', '41a44352a6f3cd3b45282acbce50927c', 2),
(4, 'Yuni Kurnia Taramita', 'Sugihwaras', '085729801234', 'yuni', 'yuni@gmail.com', 'b7dfe9096cebb53152aa5ce78a1a61c9', 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `penarikan_simpanan`
--

CREATE TABLE `penarikan_simpanan` (
  `id_penarikan` int(11) NOT NULL,
  `id_simpanan` int(11) NOT NULL,
  `verifikasi_pegawai` varchar(80) NOT NULL DEFAULT 'Belum Diverifikasi',
  `verifikasi_admin` varchar(80) NOT NULL DEFAULT 'Belum Diverifikasi',
  `status_penarikan` varchar(20) NOT NULL,
  `nominal_total_penarikan` int(25) NOT NULL,
  `tanggal_permintaan_penarikan` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Struktur dari tabel `pengajuan_pinjaman`
--

CREATE TABLE `pengajuan_pinjaman` (
  `id_pengajuan` int(11) NOT NULL,
  `id_anggota` int(11) NOT NULL,
  `total_pengajuan_pinjaman` int(20) NOT NULL,
  `alasan_pinjaman` text NOT NULL,
  `lampiran_pendukung` varchar(256) NOT NULL,
  `tanggal_pengajuan` varchar(250) NOT NULL,
  `status_pengajuan` varchar(50) NOT NULL DEFAULT 'Belum Terverifikasi',
  `verifikasi_pegawai` varchar(100) NOT NULL DEFAULT 'Belum Terverifikasi',
  `verifikasi_admin` varchar(100) NOT NULL DEFAULT 'Belum Terverifikasi',
  `pesan` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Struktur dari tabel `pengumuman`
--

CREATE TABLE `pengumuman` (
  `id_pengumuman` int(11) NOT NULL,
  `id_pegawai` int(11) NOT NULL,
  `judul` text NOT NULL,
  `header_gambar` varchar(200) NOT NULL,
  `isi` text NOT NULL,
  `tanggal_post` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `pengumuman`
--

INSERT INTO `pengumuman` (`id_pengumuman`, `id_pegawai`, `judul`, `header_gambar`, `isi`, `tanggal_post`) VALUES
(3, 4, 'Buku', '28102020143243dev_productivity.png', 'desc\r\n1. abv\r\n2. nnn\r\nTes', '28-10-2020'),
(5, 4, 'ayam', 'Tidak Ada Gambar', 'tes\r\n1. 2\r\n2. a', '28-10-2020');

-- --------------------------------------------------------

--
-- Struktur dari tabel `pinjaman`
--

CREATE TABLE `pinjaman` (
  `id_pinjaman` int(11) NOT NULL,
  `id_anggota` int(11) NOT NULL,
  `id_pengajuan` int(11) NOT NULL,
  `status_pinjaman` varchar(50) NOT NULL DEFAULT 'Belum Lunas',
  `tanggal_pelunasan` varchar(50) NOT NULL DEFAULT 'Belum Lunas',
  `tanggal_meminjam` varchar(50) NOT NULL,
  `total_pinjaman` int(20) NOT NULL,
  `angsuran_bulanan` int(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Struktur dari tabel `simpanan`
--

CREATE TABLE `simpanan` (
  `id_simpanan` int(11) NOT NULL,
  `id_anggota` int(11) NOT NULL,
  `jumlah_simpanan_pokok` int(20) NOT NULL,
  `jumlah_simpanan_wajib` int(20) NOT NULL,
  `status_simpanan` varchar(200) NOT NULL DEFAULT 'Belum Ditarik'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `simpanan`
--

INSERT INTO `simpanan` (`id_simpanan`, `id_anggota`, `jumlah_simpanan_pokok`, `jumlah_simpanan_wajib`, `status_simpanan`) VALUES
(1, 1, 5000000, 50000, 'Belum Ditarik');

-- --------------------------------------------------------

--
-- Struktur dari tabel `simpanan_detail`
--

CREATE TABLE `simpanan_detail` (
  `id_simpanan_detail` int(11) NOT NULL,
  `id_simpanan` int(11) NOT NULL,
  `id_pegawai` int(11) NOT NULL,
  `jumlah_setor_tunai` int(20) NOT NULL,
  `tanggal_setor_tunai` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `simpanan_detail`
--

INSERT INTO `simpanan_detail` (`id_simpanan_detail`, `id_simpanan`, `id_pegawai`, `jumlah_setor_tunai`, `tanggal_setor_tunai`) VALUES
(1, 1, 2, 50000, '27-10-2020');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `aksi`
--
ALTER TABLE `aksi`
  ADD PRIMARY KEY (`id_aksi`),
  ADD KEY `id_pegawai` (`id_pegawai`);

--
-- Indeks untuk tabel `anggota`
--
ALTER TABLE `anggota`
  ADD PRIMARY KEY (`id_anggota`);

--
-- Indeks untuk tabel `angsuran_detail`
--
ALTER TABLE `angsuran_detail`
  ADD PRIMARY KEY (`id_angsuran_detail`),
  ADD KEY `pinjaman_detail_ibfk_1` (`id_pinjaman`),
  ADD KEY `id_pegawai` (`id_pegawai`);

--
-- Indeks untuk tabel `lupa_password`
--
ALTER TABLE `lupa_password`
  ADD PRIMARY KEY (`id_lupa_password`),
  ADD KEY `id_anggota` (`id_anggota`);

--
-- Indeks untuk tabel `pegawai`
--
ALTER TABLE `pegawai`
  ADD PRIMARY KEY (`id_pegawai`);

--
-- Indeks untuk tabel `penarikan_simpanan`
--
ALTER TABLE `penarikan_simpanan`
  ADD PRIMARY KEY (`id_penarikan`),
  ADD KEY `id_simpanan` (`id_simpanan`);

--
-- Indeks untuk tabel `pengajuan_pinjaman`
--
ALTER TABLE `pengajuan_pinjaman`
  ADD PRIMARY KEY (`id_pengajuan`),
  ADD KEY `id_anggota` (`id_anggota`);

--
-- Indeks untuk tabel `pengumuman`
--
ALTER TABLE `pengumuman`
  ADD PRIMARY KEY (`id_pengumuman`),
  ADD KEY `id_pegawai` (`id_pegawai`);

--
-- Indeks untuk tabel `pinjaman`
--
ALTER TABLE `pinjaman`
  ADD PRIMARY KEY (`id_pinjaman`),
  ADD KEY `pinjaman_ibfk_1` (`id_anggota`),
  ADD KEY `id_pengajuan` (`id_pengajuan`);

--
-- Indeks untuk tabel `simpanan`
--
ALTER TABLE `simpanan`
  ADD PRIMARY KEY (`id_simpanan`),
  ADD KEY `id_anggota` (`id_anggota`);

--
-- Indeks untuk tabel `simpanan_detail`
--
ALTER TABLE `simpanan_detail`
  ADD PRIMARY KEY (`id_simpanan_detail`),
  ADD KEY `id_simpanan` (`id_simpanan`),
  ADD KEY `id_pegawai` (`id_pegawai`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `aksi`
--
ALTER TABLE `aksi`
  MODIFY `id_aksi` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT untuk tabel `anggota`
--
ALTER TABLE `anggota`
  MODIFY `id_anggota` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT untuk tabel `angsuran_detail`
--
ALTER TABLE `angsuran_detail`
  MODIFY `id_angsuran_detail` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `lupa_password`
--
ALTER TABLE `lupa_password`
  MODIFY `id_lupa_password` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT untuk tabel `pegawai`
--
ALTER TABLE `pegawai`
  MODIFY `id_pegawai` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT untuk tabel `penarikan_simpanan`
--
ALTER TABLE `penarikan_simpanan`
  MODIFY `id_penarikan` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `pengajuan_pinjaman`
--
ALTER TABLE `pengajuan_pinjaman`
  MODIFY `id_pengajuan` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `pengumuman`
--
ALTER TABLE `pengumuman`
  MODIFY `id_pengumuman` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT untuk tabel `pinjaman`
--
ALTER TABLE `pinjaman`
  MODIFY `id_pinjaman` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `simpanan`
--
ALTER TABLE `simpanan`
  MODIFY `id_simpanan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `simpanan_detail`
--
ALTER TABLE `simpanan_detail`
  MODIFY `id_simpanan_detail` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `aksi`
--
ALTER TABLE `aksi`
  ADD CONSTRAINT `aksi_ibfk_1` FOREIGN KEY (`id_pegawai`) REFERENCES `pegawai` (`id_pegawai`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `angsuran_detail`
--
ALTER TABLE `angsuran_detail`
  ADD CONSTRAINT `angsuran_detail_ibfk_1` FOREIGN KEY (`id_pinjaman`) REFERENCES `pinjaman` (`id_pinjaman`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `angsuran_detail_ibfk_2` FOREIGN KEY (`id_pegawai`) REFERENCES `pegawai` (`id_pegawai`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `lupa_password`
--
ALTER TABLE `lupa_password`
  ADD CONSTRAINT `lupa_password_ibfk_1` FOREIGN KEY (`id_anggota`) REFERENCES `anggota` (`id_anggota`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `penarikan_simpanan`
--
ALTER TABLE `penarikan_simpanan`
  ADD CONSTRAINT `penarikan_simpanan_ibfk_2` FOREIGN KEY (`id_simpanan`) REFERENCES `simpanan` (`id_simpanan`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `pengajuan_pinjaman`
--
ALTER TABLE `pengajuan_pinjaman`
  ADD CONSTRAINT `pengajuan_pinjaman_ibfk_1` FOREIGN KEY (`id_anggota`) REFERENCES `anggota` (`id_anggota`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `pengumuman`
--
ALTER TABLE `pengumuman`
  ADD CONSTRAINT `pengumuman_ibfk_1` FOREIGN KEY (`id_pegawai`) REFERENCES `pegawai` (`id_pegawai`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `pinjaman`
--
ALTER TABLE `pinjaman`
  ADD CONSTRAINT `pinjaman_ibfk_1` FOREIGN KEY (`id_anggota`) REFERENCES `anggota` (`id_anggota`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `pinjaman_ibfk_2` FOREIGN KEY (`id_pengajuan`) REFERENCES `pengajuan_pinjaman` (`id_pengajuan`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `simpanan`
--
ALTER TABLE `simpanan`
  ADD CONSTRAINT `simpanan_ibfk_1` FOREIGN KEY (`id_anggota`) REFERENCES `anggota` (`id_anggota`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `simpanan_detail`
--
ALTER TABLE `simpanan_detail`
  ADD CONSTRAINT `simpanan_detail_ibfk_1` FOREIGN KEY (`id_simpanan`) REFERENCES `simpanan` (`id_simpanan`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `simpanan_detail_ibfk_2` FOREIGN KEY (`id_pegawai`) REFERENCES `pegawai` (`id_pegawai`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
