-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 26, 2020 at 06:30 PM
-- Server version: 10.1.38-MariaDB
-- PHP Version: 7.3.2

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
-- Table structure for table `aksi_hapus`
--

CREATE TABLE `aksi_hapus` (
  `id_aksi_hapus` int(11) NOT NULL,
  `id_pegawai` int(11) NOT NULL,
  `id_kategori` int(11) NOT NULL,
  `kategori` varchar(100) NOT NULL,
  `nama_admin` varchar(100) NOT NULL,
  `status_verifikasi` varchar(100) NOT NULL DEFAULT 'Belum Diverifikasi'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `anggota`
--

CREATE TABLE `anggota` (
  `id_anggota` int(11) NOT NULL,
  `nama_anggota` varchar(200) NOT NULL,
  `alamat_anggota` varchar(200) NOT NULL,
  `no_telp_anggota` varchar(50) NOT NULL,
  `username` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `status_anggota` varchar(50) NOT NULL DEFAULT 'Tidak Aktif',
  `tanggal_keanggotaan` varchar(100) NOT NULL DEFAULT 'Belum Menjadi Anggota',
  `foto_ktp_anggota` varchar(500) NOT NULL DEFAULT '''Belum Diupload''',
  `foto_selfie_ktp_anggota` varchar(500) NOT NULL DEFAULT '''Belum Diupload'''
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `anggota`
--

INSERT INTO `anggota` (`id_anggota`, `nama_anggota`, `alamat_anggota`, `no_telp_anggota`, `username`, `email`, `password`, `status_anggota`, `tanggal_keanggotaan`, `foto_ktp_anggota`, `foto_selfie_ktp_anggota`) VALUES
(1, 'Budi Surya', 'Jl. Mawar Merah 21 Bojonegoro', '085687921256', 'budi', 'budianto@gmail.com', '9c5fa085ce256c7c598f6710584ab25d', 'Aktif', 'Belum Menjadi Anggota', '17102020163046example-ktp-1.jpg', '17102020163046img-kyc-sample-2.png'),
(2, 'Jasmin Putri', 'Jl. Melati 105 Kalitidu, Bojonegoro', '085125891250', 'jasmin', 'jasmin@gmail.com', 'c677901e8baa1f96025f0938a4cd0423', 'Aktif', '15-10-2020', 'example-ktp-1.jpg', 'example-with-ktp-1.jpg'),
(3, 'Jito Hartati', 'Jl. Grogol 21 Bojonegoro', '0812385794223', 'jito', 'jito@gmail.com', '28d8024451d991a899aaf3a4875c8cfa', 'Aktif', 'Belum Menjadi Anggota', '17102020132043example-ktp-1.jpg', '17102020132043img-kyc-sample-2.png');

-- --------------------------------------------------------

--
-- Table structure for table `angsuran_detail`
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
-- Table structure for table `lupa_password`
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
-- Dumping data for table `lupa_password`
--

INSERT INTO `lupa_password` (`id_lupa_password`, `id_anggota`, `pertanyaankeamanan1`, `pertanyaankeamanan2`, `jawabankeamanan1`, `jawabankeamanan2`) VALUES
(1, 1, 'Apa angka favorit anda?(Contoh: 29)', 'Siapakah teman masa kecil anda?', '89', 'Riza Zulfahnur'),
(2, 2, 'Di kota manakah ayah dan ibu anda bertemu?', 'Apa hobby anda?', 'Paris', 'Berkuda'),
(4, 3, 'Apa angka favorit anda?(Contoh: 29)', 'Apa hobby anda?', '12', 'Mancing');

-- --------------------------------------------------------

--
-- Table structure for table `pegawai`
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
-- Dumping data for table `pegawai`
--

INSERT INTO `pegawai` (`id_pegawai`, `nama_pegawai`, `alamat_pegawai`, `no_telp_pegawai`, `username`, `email`, `password`, `kategori`) VALUES
(1, 'Ardan Anjung Kusuma', 'Banjarejo', '085212342321', 'ardan', 'ardan@gmail.com', 'd2219d75098abd01493908d2f7f4d13d', 1),
(2, 'Dina Lisuardi', 'Banjarejo', '081235896824', 'dina', 'dina@gmail.com', 'f093c0fed979519fbc43d772b76f5c86', 2),
(3, 'Muh Riza Zulfahnur', 'Kalitidu', '085212396501', 'riza', 'riza@gmail.com', '41a44352a6f3cd3b45282acbce50927c', 2),
(4, 'Yuni Kurnia Taramita', 'Sugihwaras', '085729801234', 'yuni', 'yuni@gmail.com', 'b7dfe9096cebb53152aa5ce78a1a61c9', 1);

-- --------------------------------------------------------

--
-- Table structure for table `penarikan_simpanan`
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
-- Table structure for table `pengajuan_pinjaman`
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

--
-- Dumping data for table `pengajuan_pinjaman`
--

INSERT INTO `pengajuan_pinjaman` (`id_pengajuan`, `id_anggota`, `total_pengajuan_pinjaman`, `alasan_pinjaman`, `lampiran_pendukung`, `tanggal_pengajuan`, `status_pengajuan`, `verifikasi_pegawai`, `verifikasi_admin`, `pesan`) VALUES
(1, 2, 5000000, 'Butuh keperluan', '21102020181119Kel PPL.docx', '21-10-20', 'Verifikasi Ditolak', 'Verifikasi Ditolak', 'Verifikasi Ditolak', 'Alasan lo gajelas\r\ndan tidak jelas berkasnya\r\n1. blur'),
(2, 2, 5000000, 'Butuh keperluan', '2110202018431518_Moh Riza Zulfahnur_TI-2E.pdf', '21-10-20', 'Verifikasi Ditolak', 'Verifikasi Ditolak', 'Verifikasi Ditolak', 'Lampiran kurang jelas'),
(3, 3, 5000000, 'Butuh dana mendesak', '22102020122609PAMFLET.jpg', '22-10-20', 'Sedang Diverifikasi', 'Verifikasi Diterima', 'Sedang Diverifikasi', 'Verifikasi Diterima Pegawai, Menunggu Verifikasi Admin');

-- --------------------------------------------------------

--
-- Table structure for table `pengumuman`
--

CREATE TABLE `pengumuman` (
  `id_pengumuman` int(11) NOT NULL,
  `id_pegawai` int(11) NOT NULL,
  `header_gambar` varchar(200) NOT NULL,
  `isi` text NOT NULL,
  `tanggal_post` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `pinjaman`
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
-- Table structure for table `simpanan`
--

CREATE TABLE `simpanan` (
  `id_simpanan` int(11) NOT NULL,
  `id_anggota` int(11) NOT NULL,
  `jumlah_simpanan_pokok` int(20) NOT NULL,
  `jumlah_simpanan_wajib` int(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `simpanan_detail`
--

CREATE TABLE `simpanan_detail` (
  `id_simpanan_detail` int(11) NOT NULL,
  `id_simpanan` int(11) NOT NULL,
  `id_pegawai` int(11) NOT NULL,
  `jumlah_setor_tunai` int(20) NOT NULL,
  `tanggal_setor_tunai` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `aksi_hapus`
--
ALTER TABLE `aksi_hapus`
  ADD PRIMARY KEY (`id_aksi_hapus`),
  ADD KEY `id_pegawai` (`id_pegawai`);

--
-- Indexes for table `anggota`
--
ALTER TABLE `anggota`
  ADD PRIMARY KEY (`id_anggota`);

--
-- Indexes for table `angsuran_detail`
--
ALTER TABLE `angsuran_detail`
  ADD PRIMARY KEY (`id_angsuran_detail`),
  ADD KEY `pinjaman_detail_ibfk_1` (`id_pinjaman`),
  ADD KEY `id_pegawai` (`id_pegawai`);

--
-- Indexes for table `lupa_password`
--
ALTER TABLE `lupa_password`
  ADD PRIMARY KEY (`id_lupa_password`),
  ADD KEY `id_anggota` (`id_anggota`);

--
-- Indexes for table `pegawai`
--
ALTER TABLE `pegawai`
  ADD PRIMARY KEY (`id_pegawai`);

--
-- Indexes for table `penarikan_simpanan`
--
ALTER TABLE `penarikan_simpanan`
  ADD PRIMARY KEY (`id_penarikan`),
  ADD KEY `id_simpanan` (`id_simpanan`);

--
-- Indexes for table `pengajuan_pinjaman`
--
ALTER TABLE `pengajuan_pinjaman`
  ADD PRIMARY KEY (`id_pengajuan`),
  ADD KEY `id_anggota` (`id_anggota`);

--
-- Indexes for table `pengumuman`
--
ALTER TABLE `pengumuman`
  ADD PRIMARY KEY (`id_pengumuman`),
  ADD KEY `id_pegawai` (`id_pegawai`);

--
-- Indexes for table `pinjaman`
--
ALTER TABLE `pinjaman`
  ADD PRIMARY KEY (`id_pinjaman`),
  ADD KEY `pinjaman_ibfk_1` (`id_anggota`),
  ADD KEY `id_pengajuan` (`id_pengajuan`);

--
-- Indexes for table `simpanan`
--
ALTER TABLE `simpanan`
  ADD PRIMARY KEY (`id_simpanan`),
  ADD KEY `id_anggota` (`id_anggota`);

--
-- Indexes for table `simpanan_detail`
--
ALTER TABLE `simpanan_detail`
  ADD PRIMARY KEY (`id_simpanan_detail`),
  ADD KEY `id_simpanan` (`id_simpanan`),
  ADD KEY `id_pegawai` (`id_pegawai`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `aksi_hapus`
--
ALTER TABLE `aksi_hapus`
  MODIFY `id_aksi_hapus` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `anggota`
--
ALTER TABLE `anggota`
  MODIFY `id_anggota` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `angsuran_detail`
--
ALTER TABLE `angsuran_detail`
  MODIFY `id_angsuran_detail` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `lupa_password`
--
ALTER TABLE `lupa_password`
  MODIFY `id_lupa_password` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `pegawai`
--
ALTER TABLE `pegawai`
  MODIFY `id_pegawai` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `penarikan_simpanan`
--
ALTER TABLE `penarikan_simpanan`
  MODIFY `id_penarikan` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `pengajuan_pinjaman`
--
ALTER TABLE `pengajuan_pinjaman`
  MODIFY `id_pengajuan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `pengumuman`
--
ALTER TABLE `pengumuman`
  MODIFY `id_pengumuman` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `pinjaman`
--
ALTER TABLE `pinjaman`
  MODIFY `id_pinjaman` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `simpanan`
--
ALTER TABLE `simpanan`
  MODIFY `id_simpanan` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `simpanan_detail`
--
ALTER TABLE `simpanan_detail`
  MODIFY `id_simpanan_detail` int(11) NOT NULL AUTO_INCREMENT;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `aksi_hapus`
--
ALTER TABLE `aksi_hapus`
  ADD CONSTRAINT `aksi_hapus_ibfk_1` FOREIGN KEY (`id_pegawai`) REFERENCES `pegawai` (`id_pegawai`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `angsuran_detail`
--
ALTER TABLE `angsuran_detail`
  ADD CONSTRAINT `angsuran_detail_ibfk_1` FOREIGN KEY (`id_pinjaman`) REFERENCES `pinjaman` (`id_pinjaman`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `angsuran_detail_ibfk_2` FOREIGN KEY (`id_pegawai`) REFERENCES `pegawai` (`id_pegawai`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `lupa_password`
--
ALTER TABLE `lupa_password`
  ADD CONSTRAINT `lupa_password_ibfk_1` FOREIGN KEY (`id_anggota`) REFERENCES `anggota` (`id_anggota`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `penarikan_simpanan`
--
ALTER TABLE `penarikan_simpanan`
  ADD CONSTRAINT `penarikan_simpanan_ibfk_2` FOREIGN KEY (`id_simpanan`) REFERENCES `simpanan` (`id_simpanan`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `pengajuan_pinjaman`
--
ALTER TABLE `pengajuan_pinjaman`
  ADD CONSTRAINT `pengajuan_pinjaman_ibfk_1` FOREIGN KEY (`id_anggota`) REFERENCES `anggota` (`id_anggota`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `pengumuman`
--
ALTER TABLE `pengumuman`
  ADD CONSTRAINT `pengumuman_ibfk_1` FOREIGN KEY (`id_pegawai`) REFERENCES `pegawai` (`id_pegawai`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `pinjaman`
--
ALTER TABLE `pinjaman`
  ADD CONSTRAINT `pinjaman_ibfk_1` FOREIGN KEY (`id_anggota`) REFERENCES `anggota` (`id_anggota`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `pinjaman_ibfk_2` FOREIGN KEY (`id_pengajuan`) REFERENCES `pengajuan_pinjaman` (`id_pengajuan`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `simpanan`
--
ALTER TABLE `simpanan`
  ADD CONSTRAINT `simpanan_ibfk_1` FOREIGN KEY (`id_anggota`) REFERENCES `anggota` (`id_anggota`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `simpanan_detail`
--
ALTER TABLE `simpanan_detail`
  ADD CONSTRAINT `simpanan_detail_ibfk_1` FOREIGN KEY (`id_simpanan`) REFERENCES `simpanan` (`id_simpanan`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `simpanan_detail_ibfk_2` FOREIGN KEY (`id_pegawai`) REFERENCES `pegawai` (`id_pegawai`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
