-- phpMyAdmin SQL Dump
-- version 4.7.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 02, 2021 at 02:02 AM
-- Server version: 10.1.25-MariaDB
-- PHP Version: 5.6.31

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `rsj_rkbu`
--

-- --------------------------------------------------------

--
-- Table structure for table `detail_pemeliharaan`
--

CREATE TABLE `detail_pemeliharaan` (
  `id_detail_pemeliharaan` int(11) NOT NULL,
  `id_pemeliharaan` int(11) DEFAULT NULL,
  `nama_pemeliharaan` varchar(255) NOT NULL,
  `kuantitas` int(11) NOT NULL,
  `satuan` varchar(100) NOT NULL,
  `keterangan` text,
  `jml_realisasi` int(11) NOT NULL,
  `status_realisasi` varchar(30) NOT NULL,
  `isdeleted` varchar(50) DEFAULT NULL,
  `last_user_edited` int(11) DEFAULT NULL,
  `modified_at` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `detail_pemeliharaan`
--

INSERT INTO `detail_pemeliharaan` (`id_detail_pemeliharaan`, `id_pemeliharaan`, `nama_pemeliharaan`, `kuantitas`, `satuan`, `keterangan`, `jml_realisasi`, `status_realisasi`, `isdeleted`, `last_user_edited`, `modified_at`) VALUES
(1, 1, 'buku', 3, 'buah', 'rusak', 0, '0', '0', 3, '2021-02-04 03:23:18'),
(2, 1, 'mouse', 11, 'pcs', 'bagus', 0, '0', '0', 3, '2021-02-04 03:49:30'),
(3, 2, 'hp', 20, 'pcs', 'cek', 0, '0', '0', 3, NULL),
(4, 2, 'laptop', 1, 'unit', 'baru', 0, '0', '0', 3, NULL),
(5, 2, 'buku', 2, 'buah', 'baru', 0, '0', '0', 3, NULL),
(6, 1, 'baru', 12, 'ganti', 'x', 0, '0', '0', 3, '2021-02-04 03:49:40'),
(7, 1, 'barunih 1', 1, 'satuan', 'ket', 0, '1', '0', 3, ''),
(8, 1, 'barunih 2', 1, 'satuan', 'ket', 0, '1', '0', 3, ''),
(9, 1, 'barunih 3', 1, 'satuan', 'ket', 0, '1', '0', 3, ''),
(10, 1, 'barunih 4', 1, 'satuan', 'ket', 0, '1', '0', 3, ''),
(11, 1, 'barunih 5', 1, 'satuan', 'ket', 0, '1', '0', 3, ''),
(12, 1, 'barunih 6', 1, 'satuan', 'ket', 0, '1', '0', 3, ''),
(13, 1, 'barunih 7', 1, 'satuan', 'ket', 0, '1', '0', 3, ''),
(14, 1, 'barunih delapan', 1, 'satuan', 'ket', 0, '0', '0', 3, '2021-02-04 03:53:54'),
(15, 3, 'Printer', 2, 'pcs', 'rusak', 0, '0', '0', 4, NULL),
(16, 1, 'komputer', 10, 'unit', 'pemeliharaan', 0, '0', '0', 2, NULL),
(17, 1, 'kertas', 2, 'rim', 'baru', 0, '0', '0', 2, NULL),
(18, 1, 'pintu', 1, 'pcs', 'rusak', 0, '0', '0', 2, NULL),
(19, 1, 'komputer', 1, 'pcs', 'rusak', 0, '0', '0', 2, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `detail_pengadaan`
--

CREATE TABLE `detail_pengadaan` (
  `id_detail_pengadaan` int(11) NOT NULL,
  `id_pengadaan` int(11) DEFAULT NULL,
  `nama_pengadaan` varchar(255) NOT NULL,
  `kuantitas` int(11) NOT NULL,
  `satuan` varchar(100) NOT NULL,
  `keterangan` text,
  `jml_realisasi` int(11) NOT NULL,
  `status_realisasi` varchar(30) NOT NULL,
  `isdeleted` varchar(50) DEFAULT NULL,
  `last_user_edited` int(11) DEFAULT NULL,
  `modified_at` varchar(50) DEFAULT NULL,
  `id_subkegiatan` int(11) NOT NULL,
  `id_uraian` int(11) NOT NULL,
  `sumber_dana` varchar(5) NOT NULL,
  `harga_satuan` int(11) NOT NULL,
  `spesifikasi` text NOT NULL,
  `prioritas` varchar(10) NOT NULL,
  `catatan` text NOT NULL,
  `total_harga` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `detail_pengadaan`
--

INSERT INTO `detail_pengadaan` (`id_detail_pengadaan`, `id_pengadaan`, `nama_pengadaan`, `kuantitas`, `satuan`, `keterangan`, `jml_realisasi`, `status_realisasi`, `isdeleted`, `last_user_edited`, `modified_at`, `id_subkegiatan`, `id_uraian`, `sumber_dana`, `harga_satuan`, `spesifikasi`, `prioritas`, `catatan`, `total_harga`) VALUES
(1, 1, 'tas', 10, 'pcs', 'barud', 0, '0', '0', 3, '2021-02-08 04:06:10', 0, 0, '', 0, '', '', '', 0),
(15, 2, 'kertas', 2, 'rim', 'sidu', 0, '0', '0', 4, NULL, 0, 0, '', 0, '', '', '', 0),
(16, 2, 'laptop', 1, 'pcs', 'asus', 0, '0', '0', 4, NULL, 0, 0, '', 0, '', '', '', 0),
(17, 3, 'buku', 10, 'pcs', 'baru', 0, '0', '0', 2, NULL, 0, 0, '', 0, '', '', '', 0),
(18, 1, 'buku', 10, 'pcs', 'baru', 0, '0', '0', 2, NULL, 0, 0, '', 0, '', '', '', 0),
(19, 1, 'kertas', 1, 'rim', 'baru', 0, '0', '0', 2, NULL, 0, 0, '', 0, '', '', '', 0);

-- --------------------------------------------------------

--
-- Table structure for table `head_pemeliharaan`
--

CREATE TABLE `head_pemeliharaan` (
  `id_pemeliharaan` int(11) NOT NULL,
  `kode_permohonan` varchar(50) NOT NULL,
  `id_user` int(11) NOT NULL,
  `tgl_usulan` date NOT NULL,
  `status` int(11) NOT NULL,
  `delete_at` varchar(100) DEFAULT NULL,
  `created_at` varchar(100) DEFAULT NULL,
  `modified_at` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `head_pemeliharaan`
--

INSERT INTO `head_pemeliharaan` (`id_pemeliharaan`, `kode_permohonan`, `id_user`, `tgl_usulan`, `status`, `delete_at`, `created_at`, `modified_at`) VALUES
(1, 'RKBU-RSJ/20210209/PML/2', 2, '2021-02-09', 1, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `head_pengadaan`
--

CREATE TABLE `head_pengadaan` (
  `id_pengadaan` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `kode_pengadaan` varchar(50) NOT NULL,
  `tgl_usulan` date NOT NULL,
  `status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `head_pengadaan`
--

INSERT INTO `head_pengadaan` (`id_pengadaan`, `id_user`, `kode_pengadaan`, `tgl_usulan`, `status`) VALUES
(1, 2, 'RKBU-RSJ/20210209/PGD/2', '2021-02-09', 1);

-- --------------------------------------------------------

--
-- Table structure for table `kegiatan`
--

CREATE TABLE `kegiatan` (
  `id_kegiatan` int(11) NOT NULL,
  `kodering_kegiatan` varchar(20) NOT NULL,
  `nama_kegiatan` varchar(150) NOT NULL,
  `isdeleted` int(11) NOT NULL,
  `id_program` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `kegiatan`
--

INSERT INTO `kegiatan` (`id_kegiatan`, `kodering_kegiatan`, `nama_kegiatan`, `isdeleted`, `id_program`) VALUES
(1, '1.02.01.1.01', 'Perencanaan, Penganggaran, dan Evaluasi Kinerja Perangkat Daerah', 0, 1),
(2, '1.02.01.1.02 ', 'Administrasi Keuangan Perangkat Daerah', 0, 1),
(3, '1.02.01.1.06 ', 'Administrasi Umum Perangkat Daerah', 0, 1),
(4, '1.02.01.1.08 ', 'Penyediaan Jasa Penunjang Urusan Pemerintahan Daerah', 0, 1),
(5, '1.02.01.1.09', 'Pemeliharaan Barang Milik Daerah Penunjang Urusan Pemerintahan Daerah', 0, 1),
(6, '1.02.01.1.10 ', 'Peningkatan Pelayanan BLUD', 0, 1),
(7, '1.02.02.1.01', 'Penyediaan Fasilitas Pelayanan, Sarana, Prasarana dan Alat Kesehatan untuk UKP Rujukan, UKM dan UKM Rujukan Tingkat Daerah Provinsi', 0, 2),
(8, '1.02.02.1.02', 'Penyediaan Layanan Kesehatan untuk UKP Rujukan, UKM dan UKM Rujukan Tingkat Daerah Provinsi', 0, 2),
(9, '1.02.02.1.03', 'Penyelenggaraan Sistem Informasi Kesehatan secara Terintegrasi', 0, 2),
(10, '1.02.02.1.04', 'Penerbitan Izin Rumah Sakit Kelas B dan Fasilitas Pelayanan Kesehatan Tingkat Daerah Provinsi', 0, 2),
(11, '1.02.03.1.02', 'Pengembangan Mutu dan Peningkatan Kompetensi Teknis Sumber Daya Manusia Kesehatan Tingkat Daerah Provinsi', 0, 3);

-- --------------------------------------------------------

--
-- Table structure for table `pd`
--

CREATE TABLE `pd` (
  `id_pd` int(11) NOT NULL,
  `kodering_pd` varchar(10) NOT NULL,
  `nama_pd` varchar(150) NOT NULL,
  `isdeleted` int(11) NOT NULL,
  `id_urusan` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `pd`
--

INSERT INTO `pd` (`id_pd`, `kodering_pd`, `nama_pd`, `isdeleted`, `id_urusan`) VALUES
(1, '01.06', 'UPTD RUMAH SAKIT JIWA PROVINSI JAWA BARAT', 0, 1);

-- --------------------------------------------------------

--
-- Table structure for table `program`
--

CREATE TABLE `program` (
  `id_program` int(11) NOT NULL,
  `kodering_program` varchar(15) NOT NULL,
  `nama_program` varchar(150) NOT NULL,
  `isdeleted` int(11) NOT NULL,
  `id_urusan` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `program`
--

INSERT INTO `program` (`id_program`, `kodering_program`, `nama_program`, `isdeleted`, `id_urusan`) VALUES
(1, '1.02.01', 'PROGRAM PENUNJANG URUSAN PEMERINTAHAN DAERAH PROVINSI', 0, 1),
(2, '1.02.02', 'PROGRAM PEMENUHAN UPAYA KESEHATAN PERORANGAN DAN UPAYA KESEHATAN MASYARAKAT', 0, 1),
(3, '1.02.03', 'PROGRAM PENINGKATAN KAPASITAS SUMBER DAYA MANUSIA KESEHATAN', 0, 1);

-- --------------------------------------------------------

--
-- Table structure for table `subkegiatan`
--

CREATE TABLE `subkegiatan` (
  `id_subkegiatan` int(11) NOT NULL,
  `kodering_subkegiatan` varchar(100) NOT NULL,
  `nama_subkegiatan` varchar(150) NOT NULL,
  `isdeleted` int(11) NOT NULL,
  `id_kegiatan` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `subkegiatan`
--

INSERT INTO `subkegiatan` (`id_subkegiatan`, `kodering_subkegiatan`, `nama_subkegiatan`, `isdeleted`, `id_kegiatan`) VALUES
(1, '1.02.01.1.01.01', 'Penyusunan Dokumen Perencanaan Perangkat Daerah', 0, 1),
(2, '1.02.01.1.02.05', 'Koordinasi dan Penyusunan Laporan Keuangan Akhir Tahun SKPD', 0, 2),
(3, '1.02.01.1.06.02', 'Penyediaan Peralatan dan Perlengkapan Kantor', 0, 3),
(4, '1.02.01.1.06.05', 'Penyediaan Barang Cetakan dan Penggandaan', 0, 3),
(5, '1.02.01.1.06.08 ', 'Fasilitasi Kunjungan Tamu', 0, 3),
(6, '1.02.01.1.06.09', 'Penyelenggaraan Rapat Koordinasi dan Konsultasi SKPD', 0, 3),
(7, '1.02.01.1.08.01', 'Penyediaan Jasa Surat Menyurat', 0, 4),
(8, '1.02.01.1.08.03', 'Penyediaan Jasa Peralatan dan Perlengkapan Kantor', 0, 4),
(9, '1.02.01.1.08.04', 'Penyediaan Jasa Pelayanan Umum Kantor', 0, 4),
(10, '1.02.01.1.09.01 ', 'Penyediaan Jasa Pemeliharaan, Biaya Pemeliharaan dan Pajak Kendaraan Perorangan Dinas atau Kendaraan Dinas Jabatan', 0, 5),
(11, '1.02.01.1.09.02', 'Penyediaan Jasa Pemeliharaan, Biaya Pemeliharaan, Pajak dan Perizinan Kendaraan Dinas Operasional atau Lapangan', 0, 5),
(12, '1.02.01.1.10.01', 'Pelayanan dan Penunjang Pelayanan BLUD', 0, 6),
(13, '1.02.02.1.01.10', 'Pengadaan Alat Kesehatan/Alat Penunjang Medik Fasilitas Layanan Kesehatan', 0, 7),
(14, '1.02.02.1.01.11', 'Pengadaan Sarana di Fasilitas Layanan Kesehatan', 0, 7),
(15, '1.02.02.1.01.12', 'Pengadaaaan Prasarana Fasilitas Layanan Kesehatan', 0, 7),
(16, '1.02.02.1.01.14', 'Pengadaan Bahan Habis Pakai Lainnya (Sprei, Handuk dan Habis Pakai Lainnya)', 0, 7),
(17, '1.02.02.1.01.15', 'Pengadaan dan Pemeliharaan Alat-alat Kesehatan/Peralatan Laboratorium Kesehatan', 0, 7),
(18, '1.02.02.1.01.18', 'Pemeliharaan Sarana Fasilitas Layanan Kesehatan', 0, 7),
(19, '1.02.02.1.01.19', 'Pemeliharaan Prasarana Fasilitas Layanan Kesehatan', 0, 7),
(20, '1.02.02.1.01.20', 'Penyediaan Telemedicine di Fasilitas Pelayanan Kesehatan', 0, 7),
(21, '.02.02.1.02.08', 'Pengelolaan Pelayanan Kesehatan Lingkungan', 0, 8),
(22, '1.02.02.1.02.09', 'Pengelolaan Pelayanan Promosi Kesehatan', 0, 8),
(23, '1.02.02.1.02.11', 'Pengelolaan Pelayanan Kesehatan Penyakit Menular dan Tidak Menular', 0, 8),
(24, '1.02.02.1.02.13', 'Pengelolaan Pelayanan Kesehatan Orang dengan Masalah Kesehatan Jiwa (ODMK)', 0, 8),
(25, '1.02.02.1.02.16 ', 'Pengelolaan Jaminan Kesehatan Masyarakat', 0, 8),
(26, '1.02.02.1.02.24', 'Pengelolaan Rujukan dan Rujuk Balik', 0, 8),
(27, '1.02.02.1.02.28', 'Pengelolaan Penelitian Kesehatan', 0, 8),
(28, '1.02.02.1.03.02', 'Pengelolaan Sistem Informasi Kesehatan', 0, 9),
(29, '1.02.02.1.03.03', 'Pengadaan Alat/Perangkat Sistem Informasi Kesehatan dan Jaringan Internet', 0, 9),
(30, '1.02.02.1.04.03 ', 'Peningkatan Mutu Pelayanan Fasilitas Kesehatan', 0, 10),
(31, '1.02.03.1.02.01', 'Peningkatan Kompetensi dan Kualifikasi Sumber Daya Manusia Kesehatan', 0, 11),
(32, ' 1.02.03.1.02.02', 'Pembinaan dan Pengawasan Sumber Daya Manusia Kesehatan ', 0, 11);

-- --------------------------------------------------------

--
-- Table structure for table `table 15`
--

CREATE TABLE `table 15` (
  `kodering` varchar(17) DEFAULT NULL,
  `uraian` varchar(169) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `table 15`
--

INSERT INTO `table 15` (`kodering`, `uraian`) VALUES
('Kode Pemutakhiran', 'Uraian Belanja Pemutakhiran'),
('5.1.01.03.01.0015', 'Belanja Insentif bagi ASN atas Pemungutan Pajak Bumi Dan\nBangunan Pedesaan Dan Perkotaan'),
('5.1.01.03.01.0016', 'Belanja Insentif bagi ASN atas Pemungutan Bea Perolehan Hak atas\nTanah dan Bangunan'),
('5.1.01.03.02.0025', 'Belanja Insentif bagi ASN atas Pemungutan Retribusi Perizinan\nTertentu-Izin Mendirikan Bangunan'),
('5.1.01.05.10.0015', 'Belanja Insentif bagi KDH/WKDH atas Pemungutan Pajak Bumi\ndan Bangunan Perdesaan dan Perkotaan'),
('5.1.01.05.10.0016', 'Belanja Insentif bagi KDH/WKDH atas Pemungutan Bea Perolehan\nHak atas Tanah dan Bangunan'),
('5.1.01.05.11.0025', 'Belanja Insentif bagi KDH/WKDH atas Pemungutan Retribusi\nPerizinan Tertentu-Izin Mendirikan Bangunan'),
('5.1.02.01.01.0001', 'Belanja Bahan-Bahan Bangunan dan Konstruksi'),
('5.1.02.01.01.0001', 'Belanja Bahan-Bahan Bangunan dan Konstruksi'),
('5.1.02.02.13.0015', 'Belanja Insentif Pegawai Non ASN atas Pemungutan Pajak Pajak\nBumi dan Bangunan Perdesaan dan Perkotaan'),
('5.1.02.02.13.0016', 'Belanja Insentif Pegawai Non ASN atas Pemungutan Bea Perolehan\nHak atas Tanah dan Bangunan'),
('5.1.02.02.14.0025', 'Belanja Insentif bagi Pegawai Non ASN atas Pemungutan Retribusi\nPerizinan Tertentu-Izin Mendirikan Bangunan'),
('5.1.02.03.01.0001', 'Belanja Pemeliharaan Tanah-Tanah Persil-Tanah Bangunan\nPerumahan/Gedung Tempat Tinggal'),
('5.1.02.03.01.0002', 'Belanja Pemeliharaan Tanah-Tanah Persil-Tanah untuk Bangunan\nGedung Perdagangan/Perusahaan'),
('5.1.02.03.01.0003', 'Belanja Pemeliharaan Tanah-Tanah Persil-Tanah untuk Bangunan\nIndustri'),
('5.1.02.03.01.0004', 'Belanja Pemeliharaan Tanah-Tanah Persil-Tanah untuk Bangunan\nTempat Kerja'),
('5.1.02.03.01.0005', 'Belanja Pemeliharaan Tanah-Tanah Persil-Tanah untuk Bangunan\nGedung Sarana Olahraga'),
('5.1.02.03.01.0006', 'Belanja Pemeliharaan Tanah-Tanah Persil-Tanah untuk Bangunan\nTempat Ibadah'),
('5.1.02.03.01.0024', 'Belanja Pemeliharaan Tanah-Lapangan-Tanah untuk Bangunan Air'),
('5.1.02.03.01.0025', 'Belanja Pemeliharaan Tanah-Lapangan-Tanah untuk Bangunan\nInstalasi'),
('5.1.02.03.01.0026', 'Belanja Pemeliharaan Tanah-Lapangan-Tanah untuk Bangunan\nJaringan'),
('5.1.02.03.01.0027', 'Belanja Pemeliharaan Tanah-Lapangan-Tanah untuk Bangunan\nBersejarah'),
('5.1.02.03.02.0094', 'Belanja Pemeliharaan Alat Bengkel dan Alat Ukur-Alat Ukur-\nTakaran Bahan Bangunan'),
('5.1.02.03.02.0243', 'Belanja Pemeliharaan Alat Laboratorium-Unit Alat Laboratorium- Alat Laboratorium Bahan Bangunan Konstruksi'),
('5.1.02.03.03.0001', 'Belanja Pemeliharaan Bangunan Gedung-Bangunan Gedung\nTempat Kerja-Bangunan Gedung Kantor'),
('5.1.02.03.03.0002', 'Belanja Pemeliharaan Bangunan Gedung-Bangunan Gedung\nTempat Kerja-Bangunan Gudang'),
('5.1.02.03.03.0003', 'Belanja Pemeliharaan Bangunan Gedung-Bangunan Gedung\nTempat Kerja-Bangunan Gedung untuk Bengkel/Hanggar'),
('5.1.02.03.03.0004', 'Belanja Pemeliharaan Bangunan Gedung-Bangunan Gedung\nTempat Kerja-Bangunan Gedung Instalasi'),
('5.1.02.03.03.0005', 'Belanja Pemeliharaan Bangunan Gedung-Bangunan Gedung\nTempat Kerja-Bangunan Gedung Laboratorium'),
('5.1.02.03.03.0006', 'Belanja Pemeliharaan Bangunan Gedung-Bangunan Gedung\nTempat Kerja-Bangunan Kesehatan'),
('5.1.02.03.03.0007', 'Belanja Pemeliharaan Bangunan Gedung-Bangunan Gedung\nTempat Kerja-Bangunan Oseanarium/Observatorium'),
('5.1.02.03.03.0008', 'Belanja Pemeliharaan Bangunan Gedung-Bangunan Gedung\nTempat Kerja-Bangunan Gedung Tempat Ibadah'),
('5.1.02.03.03.0009', 'Belanja Pemeliharaan Bangunan Gedung-Bangunan Gedung\nTempat Kerja-Bangunan Gedung Tempat Pertemuan'),
('5.1.02.03.03.0010', 'Belanja Pemeliharaan Bangunan Gedung-Bangunan Gedung\nTempat Kerja-Bangunan Gedung Tempat Pendidikan'),
('5.1.02.03.03.0011', 'Belanja Pemeliharaan Bangunan Gedung-Bangunan Gedung\nTempat Kerja-Bangunan Gedung Tempat Olahraga'),
('5.1.02.03.03.0012', 'Belanja Pemeliharaan Bangunan Gedung-Bangunan Gedung\nTempat Kerja-Bangunan Gedung Pertokoan/Koperasi/Pasar'),
('5.1.02.03.03.0013', 'Belanja Pemeliharaan Bangunan Gedung-Bangunan Gedung\nTempat Kerja-Bangunan Gedung untuk Pos Jaga'),
('5.1.02.03.03.0014', 'Belanja Pemeliharaan Bangunan Gedung-Bangunan Gedung\nTempat Kerja-Bangunan Gedung Garasi/Pool'),
('5.1.02.03.03.0015', 'Belanja Pemeliharaan Bangunan Gedung-Bangunan Gedung\nTempat Kerja-Bangunan Gedung Pemotong Hewan'),
('5.1.02.03.03.0016', 'Belanja Pemeliharaan Bangunan Gedung-Bangunan Gedung\nTempat Kerja-Bangunan Gedung Perpustakaan'),
('5.1.02.03.03.0017', 'Belanja Pemeliharaan Bangunan Gedung-Bangunan Gedung\nTempat Kerja-Bangunan Gedung Museum'),
('5.1.02.03.03.0018', 'Belanja Pemeliharaan Bangunan Gedung-Bangunan Gedung Tempat Kerja-Bangunan Gedung Terminal/Pelabuhan/Bandara'),
('5.1.02.03.03.0019', 'Belanja Pemeliharaan Bangunan Gedung-Bangunan Gedung\nTempat Kerja-Bangunan Pengujian Kelaikan'),
('5.1.02.03.03.0020', 'Belanja Pemeliharaan Bangunan Gedung-Bangunan Gedung\nTempat Kerja-Bangunan Gedung Lembaga Pemasyarakatan'),
('5.1.02.03.03.0021', 'Belanja Pemeliharaan Bangunan Gedung-Bangunan Gedung\nTempat Kerja-Bangunan Rumah Tahanan'),
('5.1.02.03.03.0022', 'Belanja Pemeliharaan Bangunan Gedung-Bangunan Gedung\nTempat Kerja-Bangunan Gedung Krematorium'),
('5.1.02.03.03.0023', 'Belanja Pemeliharaan Bangunan Gedung-Bangunan Gedung\nTempat Kerja-Bangunan Pembakaran Bangkai Hewan'),
('5.1.02.03.03.0024', 'Belanja Pemeliharaan Bangunan Gedung-Bangunan Gedung\nTempat Kerja-Bangunan Tempat Persidangan'),
('5.1.02.03.03.0025', 'Belanja Pemeliharaan Bangunan Gedung-Bangunan Gedung\nTempat Kerja-Bangunan Terbuka'),
('5.1.02.03.03.0026', 'Belanja Belanja Pemeliharaan Bangunan Gedung-Bangunan\nGedung Tempat Kerja-Bangunan Penampung Sekam'),
('5.1.02.03.03.0027', 'Belanja Pemeliharaan Bangunan Gedung-Bangunan Gedung\nTempat Kerja-Bangunan Tempat Pelelangan Ikan (TPI)'),
('5.1.02.03.03.0028', 'Belanja Pemeliharaan Bangunan Gedung-Bangunan Gedung\nTempat Kerja-Bangunan Industri'),
('5.1.02.03.03.0029', 'Belanja Pemeliharaan Bangunan Gedung-Bangunan Gedung\nTempat Kerja-Bangunan Peternakan/Perikanan'),
('5.1.02.03.03.0030', 'Belanja Pemeliharaan Bangunan Gedung-Bangunan Gedung\nTempat Kerja-Bangunan Gedung Tempat Kerja Lainnya'),
('5.1.02.03.03.0031', 'Belanja Pemeliharaan Bangunan Gedung-Bangunan Gedung\nTempat Kerja-Bangunan Peralatan Geofisika'),
('5.1.02.03.03.0032', 'Belanja Pemeliharaan Bangunan Gedung-Bangunan Gedung\nTempat Kerja-Bangunan Fasilitas Umum'),
('5.1.02.03.03.0033', 'Belanja Pemeliharaan Bangunan Gedung-Bangunan Gedung\nTempat Kerja-Bangunan Parkir'),
('5.1.02.03.03.0034', 'Belanja Pemeliharaan Bangunan Gedung-Bangunan Gedung\nTempat Kerja-Bangunan Gedung Pabrik'),
('5.1.02.03.03.0035', 'Belanja Pemeliharaan Bangunan Gedung-Bangunan Gedung\nTempat Kerja-Bangunan Stasiun Bus'),
('5.1.02.03.03.0036', 'Belanja Pemeliharaan Bangunan Gedung-Bangunan Gedung\nTempat Kerja-Taman'),
('5.1.02.03.03.0037', 'Belanja Pemeliharaan Bangunan Gedung-Bangunan Gedung\nTempat Kerja-Bangunan Gedung Tempat Kerja Lainnya'),
('5.1.02.03.03.0038', 'Belanja Pemeliharaan Bangunan Gedung-Bangunan Gedung\nTempat Tinggal-Rumah Negara Golongan I'),
('5.1.02.03.03.0039', 'Belanja Pemeliharaan Bangunan Gedung-Bangunan Gedung\nTempat Tinggal-Rumah Negara Golongan II'),
('5.1.02.03.03.0040', 'Belanja Pemeliharaan Bangunan Gedung-Bangunan Gedung\nTempat Tinggal-Rumah Negara Golongan III'),
('5.1.02.03.03.0041', 'Belanja Pemeliharaan Bangunan Gedung-Bangunan Gedung Tempat Tinggal-Mess/Wisma/Bungalow/Tempat Peristirahatan'),
('5.1.02.03.03.0042', 'Belanja Pemeliharaan Bangunan Gedung-Bangunan Gedung\nTempat Tinggal-Asrama'),
('5.1.02.03.03.0043', 'Belanja Pemeliharaan Bangunan Gedung-Bangunan Gedung\nTempat Tinggal-Hotel'),
('5.1.02.03.03.0044', 'Belanja Pemeliharaan Bangunan Gedung-Bangunan Gedung\nTempat Tinggal-Motel'),
('5.1.02.03.03.0045', 'Belanja Pemeliharaan Bangunan Gedung-Bangunan Gedung\nTempat Tinggal-Flat/Rumah Susun'),
('5.1.02.03.03.0046', 'Belanja Pemeliharaan Bangunan Gedung-Bangunan Gedung\nTempat Tinggal-Rumah Negara dalam Proses Penggolongan'),
('5.1.02.03.03.0047', 'Belanja Pemeliharaan Bangunan Gedung-Bangunan Gedung\nTempat Tinggal-Panti Asuhan'),
('5.1.02.03.03.0048', 'Belanja Pemeliharaan Bangunan Gedung-Bangunan Gedung\nTempat Tinggal-Apartemen'),
('5.1.02.03.03.0049', 'Belanja Pemeliharaan Bangunan Gedung-Bangunan Gedung\nTempat Tinggal-Rumah Tidak Bersusun'),
('5.1.02.03.03.0050', 'Belanja Pemeliharaan Bangunan Gedung-Bangunan Gedung\nTempat Tinggal-Bangunan Gedung Tempat Tinggal Lainnya'),
('5.1.02.03.03.0053', 'Belanja Pemeliharaan Monumen-Candi/Tugu Peringatan/Prasasti-\nBangunan Peninggalan'),
('5.1.02.03.03.0055', 'Belanja Pemeliharaan Bangunan Menara-Bangunan Menara Perambuan-Bangunan Menara Perambuan Penerangan Pantai'),
('5.1.02.03.03.0056', 'Belanja Pemeliharaan Bangunan Menara-Bangunan Menara\nPerambuan-Bangunan Perambuan Penerangan Pantai'),
('5.1.02.03.03.0057', 'Belanja Pemeliharaan Bangunan Menara-Bangunan Menara\nPerambuan-Bangunan Menara Telekomunikasi'),
('5.1.02.03.03.0058', 'Belanja Pemeliharaan Bangunan Menara-Bangunan Menara\nPerambuan-Bangunan Menara Pengawas'),
('5.1.02.03.03.0059', 'Belanja Pemeliharaan Bangunan Menara-Bangunan Menara\nPerambuan-Bangunan Menara Perambuan Lainnya'),
('5.1.02.03.04.0024', 'Belanja Pemeliharaan Bangunan Air-Bangunan Air Irigasi-\nBangunan Waduk Irigasi'),
('5.1.02.03.04.0025', 'Belanja Pemeliharaan Bangunan Air-Bangunan Air Irigasi-\nBangunan Pengambilan Irigasi'),
('5.1.02.03.04.0026', 'Belanja Pemeliharaan Bangunan Air-Bangunan Air Irigasi-\nBangunan Pembawa Irigasi'),
('5.1.02.03.04.0027', 'Belanja Pemeliharaan Bangunan Air-Bangunan Air Irigasi-\nBangunan Pembuang Irigasi'),
('5.1.02.03.04.0028', 'Belanja Pemeliharaan Bangunan Air-Bangunan Air Irigasi-\nBangunan Pengaman Irigasi'),
('5.1.02.03.04.0029', 'Belanja Pemeliharaan Bangunan Air-Bangunan Air Irigasi-\nBangunan Pelengkap Irigasi'),
('5.1.02.03.04.0030', 'Belanja Pemeliharaan Bangunan Air-Bangunan Air Irigasi-\nBangunan Sawah Irigasi'),
('5.1.02.03.04.0031', 'Belanja Pemeliharaan Bangunan Air-Bangunan Air Irigasi-\nBangunan Air Irigasi Lainnya'),
('5.1.02.03.04.0032', 'Belanja Pemeliharaan Bangunan Air-Bangunan Pengairan Pasang\nSurut-Bangunan Waduk Pasang Surut'),
('5.1.02.03.04.0033', 'Belanja Pemeliharaan Bangunan Air-Bangunan Pengairan Pasang\nSurut-Bangunan Pengambilan Pasang Surut'),
('5.1.02.03.04.0034', 'Belanja Pemeliharaan Bangunan Air-Bangunan Pengairan Pasang\nSurut-Bangunan Pembawa Pasang Surut'),
('5.1.02.03.04.0035', 'Belanja Pemeliharaan Bangunan Air-Bangunan Pengairan Pasang\nSurut-Saluran Pembuang Pasang Surut'),
('5.1.02.03.04.0036', 'Belanja Pemeliharaan Bangunan Air-Bangunan Pengairan Pasang\nSurut-Bangunan Pengaman Pasang Surut'),
('5.1.02.03.04.0037', 'Belanja Pemeliharaan Bangunan Air-Bangunan Pengairan Pasang\nSurut-Bangunan Pelengkap Pasang Surut'),
('5.1.02.03.04.0038', 'Belanja Pemeliharaan Bangunan Air-Bangunan Pengairan Pasang\nSurut-Bangunan Sawah Pasang Surut'),
('5.1.02.03.04.0039', 'Belanja Pemeliharaan Bangunan Air-Bangunan Pengairan Pasang\nSurut-Bangunan Pengairan Pasang Surut Lainnya'),
('5.1.02.03.04.0040', 'Belanja Pemeliharaan Bangunan Air-Bangunan Pengembangan Rawa dan Polder-Bangunan Waduk Pengembangan Rawa'),
('5.1.02.03.04.0041', 'Belanja Pemeliharaan Bangunan Air-Bangunan Pengembangan Rawa dan Polder-Bangunan Pengambilan Pengembangan Rawa'),
('5.1.02.03.04.0042', 'Belanja Pemeliharaan Bangunan Air-Bangunan Pengembangan Rawa dan Polder-Bangunan Pembawa Pengembangan Rawa'),
('5.1.02.03.04.0043', 'Belanja Pemeliharaan Bangunan Air-Bangunan Pengembangan Rawa dan Polder-Bangunan Pembuang Pengembangan Rawa'),
('5.1.02.03.04.0044', 'Belanja Pemeliharaan Bangunan Air-Bangunan Pengembangan Rawa dan Polder-Bangunan Pengaman Pengembangan Rawa'),
('5.1.02.03.04.0045', 'Belanja Pemeliharaan Bangunan Air-Bangunan Pengembangan Rawa dan Polder-Bangunan Pelengkap Pengembangan Rawa'),
('5.1.02.03.04.0046', 'Belanja Pemeliharaan Bangunan Air-Bangunan Pengembangan Rawa dan Polder-Bangunan Sawah Pengembangan Rawa'),
('5.1.02.03.04.0047', 'Belanja Pemeliharaan Bangunan Air-Bangunan Pengembangan Rawa dan Polder-Bangunan Pengembangan Rawa dan Polder Lainnya'),
('5.1.02.03.04.0048', 'Belanja Pemeliharaan Bangunan Air-Bangunan Pengaman Sungai/Pantai dan Penanggulangan Bencana Alam-Bangunan Pengaman Sungai/Pantai dan Penanggulangan Bencana Alam'),
('5.1.02.03.04.0049', 'Belanja Pemeliharaan Bangunan Air-Bangunan Pengaman Sungai/Pantai dan Penanggulangan Bencana Alam-Bangunan Pengambilan Pengaman Sungai/Pantai'),
('5.1.02.03.04.0050', 'Belanja Pemeliharaan Bangunan Air-Bangunan Pengaman Sungai/Pantai dan Penanggulangan Bencana Alam-Bangunan Pembawa Pengaman Sungai/Pantai'),
('5.1.02.03.04.0051', 'Belanja Pemeliharaan Bangunan Air-Bangunan Pengaman Sungai/Pantai dan Penanggulangan Bencana Alam-Bangunan Pembuang Pengaman Sungai'),
('5.1.02.03.04.0052', 'Belanja Pemeliharaan Bangunan Air-Bangunan Pengaman Sungai/Pantai dan Penanggulangan Bencana Alam-Bangunan Pengaman Pengamanan Sungai/Pantai'),
('5.1.02.03.04.0053', 'Belanja Pemeliharaan Bangunan Air-Bangunan Pengaman Sungai/Pantai dan Penanggulangan Bencana Alam-Bangunan Pelengkap Pengaman Sungai'),
('5.1.02.03.04.0054', 'Belanja Pemeliharaan Bangunan Air-Bangunan Pengaman Sungai/Pantai dan Penanggulangan Bencana Alam-Bangunan Pengaman Sungai/Pantai dan Penanggulangan Bencana Alam Lainnya'),
('5.1.02.03.04.0055', 'Belanja Pemeliharaan Bangunan Air-Bangunan Pengembangan Sumber Air dan Air Tanah-Bangunan Waduk Pengembangan Sumber Air'),
('5.1.02.03.04.0056', 'Belanja Pemeliharaan Bangunan Air-Bangunan Pengembangan Sumber Air dan Air Tanah-Bangunan Pengambilan Pengembangan Sumber Air'),
('5.1.02.03.04.0057', 'Belanja Pemeliharaan Bangunan Air-Bangunan Pengembangan Sumber Air dan Air Tanah-Bangunan Pembawa Pengembangan Sumber Air'),
('5.1.02.03.04.0058', 'Belanja Pemeliharaan Bangunan Air-Bangunan Pengembangan Sumber Air dan Air Tanah-Bangunan Pembuang Pengembangan Sumber Air'),
('5.1.02.03.04.0059', 'Belanja Pemeliharaan Bangunan Air-Bangunan Pengembangan Sumber Air dan Air Tanah-Bangunan Pengaman Pengembangan Sumber Air'),
('5.1.02.03.04.0060', 'Belanja Pemeliharaan Bangunan Air-Bangunan Pengembangan Sumber Air dan Air Tanah-Bangunan Pelengkap Pengembangan Sumber Air'),
('5.1.02.03.04.0061', 'Belanja Pemeliharaan Bangunan Air-Bangunan Pengembangan Sumber Air dan Air Tanah-Bangunan Sawah Irigasi Air Tanah'),
('5.1.02.03.04.0062', 'Belanja Pemeliharaan Bangunan Air-Bangunan Pengembangan Sumber Air dan Air Tanah-Bangunan Pengembangan Sumber Air dan Air Tanah Lainnya'),
('5.1.02.03.04.0063', 'Belanja Pemeliharaan Bangunan Air-Bangunan Air Bersih/Air Baku Lainnya-Bangunan Waduk Air Bersih/Air Baku'),
('5.1.02.03.04.0064', 'Belanja Pemeliharaan Bangunan Air-Bangunan Air Bersih/Air Baku Lainnya-Bangunan Pengambilan Air Bersih/Air Baku'),
('5.1.02.03.04.0065', 'Belanja Pemeliharaan Bangunan Air-Bangunan Air Bersih/Air Baku Lainnya-Bangunan Pembawa Air Bersih/Air Baku'),
('5.1.02.03.04.0066', 'Belanja Pemeliharaan Bangunan Air-Bangunan Air Bersih/Air Baku Lainnya-Bangunan Pembuang Air Bersih/Air Baku'),
('5.1.02.03.04.0067', 'Belanja Pemeliharaan Bangunan Air-Bangunan Air Bersih/Air Baku Lainnya-Bangunan Pelengkap Air Bersih/Air Baku'),
('5.1.02.03.04.0068', 'Belanja Pemeliharaan Bangunan Air-Bangunan Air Bersih/Air Baku Lainnya-Bangunan Air Bersih/Air Baku Lainnya'),
('5.1.02.03.04.0069', 'Belanja Pemeliharaan Bangunan Air-Bangunan Air Kotor-Bangunan\nPembawa Air Kotor'),
('5.1.02.03.04.0070', 'Belanja Pemeliharaan Bangunan Air-Bangunan Air Kotor-Bangunan\nWaduk Air Kotor'),
('5.1.02.03.04.0071', 'Belanja Pemeliharaan Bangunan Air-Bangunan Air Kotor-Bangunan\nPembuang Air Kotor'),
('5.1.02.03.04.0072', 'Belanja Pemeliharaan Bangunan Air-Bangunan Air Kotor-Bangunan\nPengaman Air Kotor'),
('5.1.02.03.04.0073', 'Belanja Pemeliharaan Bangunan Air-Bangunan Air Kotor-Bangunan\nPelengkap Air Kotor'),
('5.1.02.03.04.0074', 'Belanja Pemeliharaan Bangunan Air-Bangunan Air Kotor-Bangunan\nAir Kotor Lainnya'),
('5.1.02.03.04.0086', 'Belanja Pemeliharaan Instalasi-Instalasi Pengolahan Sampah-\nBangunan Penampung Sampah'),
('5.1.02.03.04.0088', 'Belanja Pemeliharaan Instalasi-Instalasi Pengolahan Bahan Bangunan-Instalasi Pengolahan Bahan Bangunan Percontohan'),
('5.1.02.03.04.0089', 'Belanja Pemeliharaan Instalasi-Instalasi Pengolahan Bahan\nBangunan-Instalasi Pengolahan Bahan Bangunan Perintis'),
('5.1.02.03.04.0090', 'Belanja Pemeliharaan Instalasi-Instalasi Pengolahan Bahan\nBangunan-Instalasi Pengolahan Bahan Bangunan Terapan'),
('5.1.02.03.04.0091', 'Belanja Pemeliharaan Instalasi-Instalasi Pengolahan Bahan\nBangunan-Instalasi Pengolahan Bahan Bangunan Lainnya'),
('5.2.01.01.01.0001', 'Belanja Modal Tanah Bangunan Perumahan/ Gedung Tempat\nTinggal'),
('5.2.01.01.01.0002', 'Belanja Modal Tanah untuk Bangunan Gedung\nPerdagangan/Perusahaan'),
('5.2.01.01.01.0003', 'Belanja Modal Tanah untuk Bangunan Industri'),
('5.2.01.01.01.0004', 'Belanja Modal Tanah untuk Bangunan Tempat Kerja'),
('5.2.01.01.01.0005', 'Belanja Modal Tanah untuk Bangunan Gedung Sarana Olah Raga'),
('5.2.01.01.01.0006', 'Belanja Modal Tanah untuk Bangunan Tempat Ibadah'),
('5.2.01.01.03.0008', 'Belanja Modal Tanah untuk Bangunan Air'),
('5.2.01.01.03.0009', 'Belanja Modal Tanah untuk Bangunan Instalasi'),
('5.2.01.01.03.0010', 'Belanja Modal Tanah untuk Bangunan Jaringan'),
('5.2.01.01.03.0011', 'Belanja Modal Tanah untuk Bangunan Bersejarah'),
('5.2.02.03.03.0013', 'Belanja Modal Takaran Bahan Bangunan'),
('5.2.02.08.01.0006', 'Belanja Modal Alat Laboratorium Bahan Bangunan Konstruksi'),
('5.2.03.01.01.0001', 'Belanja Modal Bangunan Gedung Kantor'),
('5.2.03.01.01.0002', 'Belanja Modal Bangunan Gudang'),
('5.2.03.01.01.0003', 'Belanja Modal Bangunan Gedung untuk Bengkel/Hanggar'),
('5.2.03.01.01.0004', 'Belanja Modal Bangunan Gedung Instalasi'),
('5.2.03.01.01.0005', 'Belanja Modal Bangunan Gedung Laboratorium'),
('5.2.03.01.01.0006', 'Belanja Modal Bangunan Kesehatan'),
('5.2.03.01.01.0007', 'Belanja Modal Bangunan Oseanarium/Observatorium'),
('5.2.03.01.01.0008', 'Belanja Modal Bangunan Gedung Tempat Ibadah'),
('5.2.03.01.01.0009', 'Belanja Modal Bangunan Gedung Tempat Pertemuan'),
('5.2.03.01.01.0010', 'Belanja Modal Bangunan Gedung Tempat Pendidikan'),
('5.2.03.01.01.0011', 'Belanja Modal Bangunan Gedung Tempat Olahraga'),
('5.2.03.01.01.0012', 'Belanja Modal Bangunan Gedung Pertokoan/Koperasi/Pasar'),
('5.2.03.01.01.0013', 'Belanja Modal Bangunan Gedung untuk Pos Jaga'),
('5.2.03.01.01.0014', 'Belanja Modal Bangunan Gedung Garasi/Pool'),
('5.2.03.01.01.0015', 'Belanja Modal Bangunan Gedung Pemotong Hewan'),
('5.2.03.01.01.0016', 'Belanja Modal Bangunan Gedung Perpustakaan'),
('5.2.03.01.01.0017', 'Belanja Modal Bangunan Gedung Museum'),
('5.2.03.01.01.0018', 'Belanja Modal Bangunan Gedung Terminal/Pelabuhan/Bandara'),
('5.2.03.01.01.0019', 'Belanja Modal Bangunan Pengujian Kelaikan'),
('5.2.03.01.01.0020', 'Belanja Modal Bangunan Gedung Lembaga Pemasyarakatan'),
('5.2.03.01.01.0021', 'Belanja Modal Bangunan Rumah Tahanan'),
('5.2.03.01.01.0022', 'Belanja Modal Bangunan Gedung Krematorium'),
('5.2.03.01.01.0023', 'Belanja Modal Bangunan Pembakaran Bangkai Hewan'),
('5.2.03.01.01.0024', 'Belanja Modal Bangunan Tempat Persidangan'),
('5.2.03.01.01.0025', 'Belanja Modal Bangunan Terbuka'),
('5.2.03.01.01.0026', 'Belanja Modal Bangunan Penampung Sekam'),
('5.2.03.01.01.0027', 'Belanja Modal Bangunan Tempat Pelelangan Ikan (TPI)'),
('5.2.03.01.01.0028', 'Belanja Modal Bangunan Industri'),
('5.2.03.01.01.0029', 'Belanja Modal Bangunan Peternakan/Perikanan'),
('5.2.03.01.01.0030', 'Belanja Modal Bangunan Gedung Tempat Kerja Lainnya'),
('5.2.03.01.01.0031', 'Belanja Modal Bangunan Peralatan Geofisika'),
('5.2.03.01.01.0032', 'Belanja Modal Bangunan Fasilitas Umum'),
('5.2.03.01.01.0033', 'Belanja Modal Bangunan Parkir'),
('5.2.03.01.01.0034', 'Belanja Modal Bangunan Gedung Pabrik'),
('5.2.03.01.01.0035', 'Belanja Modal Bangunan Stasiun Bus'),
('5.2.03.01.01.0037', 'Belanja Modal Bangunan Gedung Tempat Kerja Lainnya'),
('5.2.03.01.02.0013', 'Belanja Modal Bangunan Gedung Tempat Tinggal Lainnya'),
('5.2.03.02.01.0003', 'Belanja Modal Bangunan Peninggalan'),
('5.2.03.03.01.0001', 'Belanja Modal Bangunan Menara Perambuan Penerangan Pantai'),
('5.2.03.03.01.0002', 'Belanja Modal Bangunan Perambuan Penerangan Pantai'),
('5.2.03.03.01.0003', 'Belanja Modal Bangunan Menara Telekomunikasi'),
('5.2.03.03.01.0004', 'Belanja Modal Bangunan Menara Pengawas'),
('5.2.03.03.01.0005', 'Belanja Modal Bangunan Menara Perambuan Lainnya'),
('5.2.04.02.01.0001', 'Belanja Modal Bangunan Waduk Irigasi'),
('5.2.04.02.01.0002', 'Belanja Modal Bangunan Pengambilan Irigasi'),
('5.2.04.02.01.0003', 'Belanja Modal Bangunan Pembawa Irigasi'),
('5.2.04.02.01.0004', 'Belanja Modal Bangunan Pembuang Irigasi'),
('5.2.04.02.01.0005', 'Belanja Modal Bangunan Pengaman Irigasi'),
('5.2.04.02.01.0006', 'Belanja Modal Bangunan Pelengkap Irigasi'),
('5.2.04.02.01.0007', 'Belanja Modal Bangunan Sawah Irigasi'),
('5.2.04.02.01.0008', 'Belanja Modal Bangunan Air Irigasi Lainnya'),
('5.2.04.02.02.0001', 'Belanja Modal Bangunan Waduk Pasang Surut'),
('5.2.04.02.02.0002', 'Belanja Modal Bangunan Pengambilan Pasang Surut'),
('5.2.04.02.02.0003', 'Belanja Modal Bangunan Pembawa Pasang Surut'),
('5.2.04.02.02.0005', 'Belanja Modal Bangunan Pengaman Pasang Surut'),
('5.2.04.02.02.0006', 'Belanja Modal Bangunan Pelengkap Pasang Surut'),
('5.2.04.02.02.0007', 'Belanja Modal Bangunan Sawah Pasang Surut'),
('5.2.04.02.02.0008', 'Belanja Modal Bangunan Pengairan Pasang Surut Lainnya'),
('5.2.04.02.03.0001', 'Belanja Modal Bangunan Waduk Pengembangan Rawa'),
('5.2.04.02.03.0002', 'Belanja Modal Bangunan Pengambilan Pengembangan Rawa'),
('5.2.04.02.03.0003', 'Belanja Modal Bangunan Pembawa Pengembangan Rawa'),
('5.2.04.02.03.0004', 'Belanja Modal Bangunan Pembuang Pengembangan Rawa'),
('5.2.04.02.03.0005', 'Belanja Modal Bangunan Pengaman Pengembangan Rawa'),
('5.2.04.02.03.0006', 'Belanja Modal Bangunan Pelengkap Pengembangan Rawa'),
('5.2.04.02.03.0007', 'Belanja Modal Bangunan Sawah Pengembangan Rawa'),
('5.2.04.02.03.0008', 'Belanja Modal Bangunan Pengembangan Rawa dan Polder Lainnya'),
('5.2.04.02.04.0001', 'Belanja Modal Bangunan Pengaman Sungai/Pantai dan\nPenanggulangan Bencana Alam'),
('5.2.04.02.04.0002', 'Belanja Modal Bangunan Pengambilan Pengaman Sungai/Pantai'),
('5.2.04.02.04.0003', 'Belanja Modal Bangunan Pembawa Pengaman Sungai/Pantai'),
('5.2.04.02.04.0004', 'Belanja Modal Bangunan Pembuang Pengaman Sungai'),
('5.2.04.02.04.0005', 'Belanja Modal Bangunan Pengaman Pengamanan Sungai/Pantai'),
('5.2.04.02.04.0006', 'Belanja Modal Bangunan Pelengkap Pengaman Sungai'),
('5.2.04.02.04.0007', 'Belanja Modal Bangunan Pengaman Sungai/Pantai dan\nPenanggulangan Bencana Alam Lainnya'),
('5.2.04.02.05.0001', 'Belanja Modal Bangunan Waduk Pengembangan Sumber Air'),
('5.2.04.02.05.0002', 'Belanja Modal Bangunan Pengambilan Pengembangan Sumber Air'),
('5.2.04.02.05.0003', 'Belanja Modal Bangunan Pembawa Pengembangan Sumber Air'),
('5.2.04.02.05.0004', 'Belanja Modal Bangunan Pembuang Pengembangan Sumber Air'),
('5.2.04.02.05.0005', 'Belanja Modal Bangunan Pengaman Pengembangan Sumber Air'),
('5.2.04.02.05.0006', 'Belanja Modal Bangunan Pelengkap Pengembangan Sumber Air'),
('5.2.04.02.05.0007', 'Belanja Modal Bangunan Sawah Irigasi Air Tanah'),
('5.2.04.02.05.0008', 'Belanja Modal Bangunan Pengembangan Sumber Air dan Air Tanah\nLainnya'),
('5.2.04.02.06.0001', 'Belanja Modal Bangunan Waduk Air Bersih/Air Baku'),
('5.2.04.02.06.0002', 'Belanja Modal Bangunan Pengambilan Air Bersih/Air Baku'),
('5.2.04.02.06.0003', 'Belanja Modal Bangunan Pembawa Air Bersih/Air Baku'),
('5.2.04.02.06.0004', 'Belanja Modal Bangunan Pembuang Air Bersih/Air Baku'),
('5.2.04.02.06.0005', 'Belanja Modal Bangunan Pelengkap Air Bersih/Air Baku'),
('5.2.04.02.06.0006', 'Belanja Modal Bangunan Air Bersih/Air Baku Lainnya'),
('5.2.04.02.07.0001', 'Belanja Modal Bangunan Pembawa Air Kotor'),
('5.2.04.02.07.0002', 'Belanja Modal Bangunan Waduk Air Kotor'),
('5.2.04.02.07.0003', 'Belanja Modal Bangunan Pembuang Air Kotor'),
('5.2.04.02.07.0004', 'Belanja Modal Bangunan Pengaman Air Kotor'),
('5.2.04.02.07.0005', 'Belanja Modal Bangunan Pelengkap Air Kotor'),
('5.2.04.02.07.0006', 'Belanja Modal Bangunan Air Kotor Lainnya'),
('5.2.04.03.03.0003', 'Belanja Modal Bangunan Penampung Sampah'),
('5.2.04.03.04.0001', 'Belanja Modal Instalasi Pengolahan Bahan Bangunan Percontohan'),
('5.2.04.03.04.0002', 'Belanja Modal Instalasi Pengolahan Bahan Bangunan Perintis'),
('5.2.04.03.04.0003', 'Belanja Modal Instalasi Pengolahan Bahan Bangunan Terapan'),
('5.2.04.03.04.0004', 'Belanja Modal Instalasi Pengolahan Bahan Bangunan Lainnya');

-- --------------------------------------------------------

--
-- Table structure for table `temp_pemeliharaan`
--

CREATE TABLE `temp_pemeliharaan` (
  `id_temp_pemeliharaan` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `tgl_usulan` date NOT NULL,
  `kode_barang` varchar(11) NOT NULL,
  `kuantitas` int(11) NOT NULL,
  `session_id` int(11) NOT NULL,
  `nama_barang` varchar(100) NOT NULL,
  `satuan` varchar(30) NOT NULL,
  `keterangan` text
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `temp_pengadaan`
--

CREATE TABLE `temp_pengadaan` (
  `id_temp_pengadaan` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `tgl_usulan` date NOT NULL,
  `kode_barang` int(11) NOT NULL,
  `kuantitas` int(11) NOT NULL,
  `session_id` int(11) NOT NULL,
  `nama_barang` varchar(200) NOT NULL,
  `satuan` varchar(100) NOT NULL,
  `keterangan` text NOT NULL,
  `id_subkegiatan` int(11) NOT NULL,
  `id_uraian` int(11) NOT NULL,
  `sumber_dana` varchar(5) NOT NULL,
  `spesifikasi` varchar(255) NOT NULL,
  `harga_satuan` float NOT NULL,
  `prioritas` varchar(10) NOT NULL,
  `catatan` varchar(255) NOT NULL,
  `total_harga` int(11) NOT NULL,
  `jenis_belanja` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `temp_uraian`
--

CREATE TABLE `temp_uraian` (
  `kodering` varchar(17) DEFAULT NULL,
  `uraian` varchar(169) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `temp_uraian`
--

INSERT INTO `temp_uraian` (`kodering`, `uraian`) VALUES
('Kode Pemutakhiran', 'Uraian Belanja Pemutakhiran'),
('5.1.01.03.01.0015', 'Belanja Insentif bagi ASN atas Pemungutan Pajak Bumi Dan\nBangunan Pedesaan Dan Perkotaan'),
('5.1.01.03.01.0016', 'Belanja Insentif bagi ASN atas Pemungutan Bea Perolehan Hak atas\nTanah dan Bangunan'),
('5.1.01.03.02.0025', 'Belanja Insentif bagi ASN atas Pemungutan Retribusi Perizinan\nTertentu-Izin Mendirikan Bangunan'),
('5.1.01.05.10.0015', 'Belanja Insentif bagi KDH/WKDH atas Pemungutan Pajak Bumi\ndan Bangunan Perdesaan dan Perkotaan'),
('5.1.01.05.10.0016', 'Belanja Insentif bagi KDH/WKDH atas Pemungutan Bea Perolehan\nHak atas Tanah dan Bangunan'),
('5.1.01.05.11.0025', 'Belanja Insentif bagi KDH/WKDH atas Pemungutan Retribusi\nPerizinan Tertentu-Izin Mendirikan Bangunan'),
('5.1.02.01.01.0001', 'Belanja Bahan-Bahan Bangunan dan Konstruksi'),
('5.1.02.01.01.0001', 'Belanja Bahan-Bahan Bangunan dan Konstruksi'),
('5.1.02.02.13.0015', 'Belanja Insentif Pegawai Non ASN atas Pemungutan Pajak Pajak\nBumi dan Bangunan Perdesaan dan Perkotaan'),
('5.1.02.02.13.0016', 'Belanja Insentif Pegawai Non ASN atas Pemungutan Bea Perolehan\nHak atas Tanah dan Bangunan'),
('5.1.02.02.14.0025', 'Belanja Insentif bagi Pegawai Non ASN atas Pemungutan Retribusi\nPerizinan Tertentu-Izin Mendirikan Bangunan'),
('5.1.02.03.01.0001', 'Belanja Pemeliharaan Tanah-Tanah Persil-Tanah Bangunan\nPerumahan/Gedung Tempat Tinggal'),
('5.1.02.03.01.0002', 'Belanja Pemeliharaan Tanah-Tanah Persil-Tanah untuk Bangunan\nGedung Perdagangan/Perusahaan'),
('5.1.02.03.01.0003', 'Belanja Pemeliharaan Tanah-Tanah Persil-Tanah untuk Bangunan\nIndustri'),
('5.1.02.03.01.0004', 'Belanja Pemeliharaan Tanah-Tanah Persil-Tanah untuk Bangunan\nTempat Kerja'),
('5.1.02.03.01.0005', 'Belanja Pemeliharaan Tanah-Tanah Persil-Tanah untuk Bangunan\nGedung Sarana Olahraga'),
('5.1.02.03.01.0006', 'Belanja Pemeliharaan Tanah-Tanah Persil-Tanah untuk Bangunan\nTempat Ibadah'),
('5.1.02.03.01.0024', 'Belanja Pemeliharaan Tanah-Lapangan-Tanah untuk Bangunan Air'),
('5.1.02.03.01.0025', 'Belanja Pemeliharaan Tanah-Lapangan-Tanah untuk Bangunan\nInstalasi'),
('5.1.02.03.01.0026', 'Belanja Pemeliharaan Tanah-Lapangan-Tanah untuk Bangunan\nJaringan'),
('5.1.02.03.01.0027', 'Belanja Pemeliharaan Tanah-Lapangan-Tanah untuk Bangunan\nBersejarah'),
('5.1.02.03.02.0094', 'Belanja Pemeliharaan Alat Bengkel dan Alat Ukur-Alat Ukur-\nTakaran Bahan Bangunan'),
('5.1.02.03.02.0243', 'Belanja Pemeliharaan Alat Laboratorium-Unit Alat Laboratorium- Alat Laboratorium Bahan Bangunan Konstruksi'),
('5.1.02.03.03.0001', 'Belanja Pemeliharaan Bangunan Gedung-Bangunan Gedung\nTempat Kerja-Bangunan Gedung Kantor'),
('5.1.02.03.03.0002', 'Belanja Pemeliharaan Bangunan Gedung-Bangunan Gedung\nTempat Kerja-Bangunan Gudang'),
('5.1.02.03.03.0003', 'Belanja Pemeliharaan Bangunan Gedung-Bangunan Gedung\nTempat Kerja-Bangunan Gedung untuk Bengkel/Hanggar'),
('5.1.02.03.03.0004', 'Belanja Pemeliharaan Bangunan Gedung-Bangunan Gedung\nTempat Kerja-Bangunan Gedung Instalasi'),
('5.1.02.03.03.0005', 'Belanja Pemeliharaan Bangunan Gedung-Bangunan Gedung\nTempat Kerja-Bangunan Gedung Laboratorium'),
('5.1.02.03.03.0006', 'Belanja Pemeliharaan Bangunan Gedung-Bangunan Gedung\nTempat Kerja-Bangunan Kesehatan'),
('5.1.02.03.03.0007', 'Belanja Pemeliharaan Bangunan Gedung-Bangunan Gedung\nTempat Kerja-Bangunan Oseanarium/Observatorium'),
('5.1.02.03.03.0008', 'Belanja Pemeliharaan Bangunan Gedung-Bangunan Gedung\nTempat Kerja-Bangunan Gedung Tempat Ibadah'),
('5.1.02.03.03.0009', 'Belanja Pemeliharaan Bangunan Gedung-Bangunan Gedung\nTempat Kerja-Bangunan Gedung Tempat Pertemuan'),
('5.1.02.03.03.0010', 'Belanja Pemeliharaan Bangunan Gedung-Bangunan Gedung\nTempat Kerja-Bangunan Gedung Tempat Pendidikan'),
('5.1.02.03.03.0011', 'Belanja Pemeliharaan Bangunan Gedung-Bangunan Gedung\nTempat Kerja-Bangunan Gedung Tempat Olahraga'),
('5.1.02.03.03.0012', 'Belanja Pemeliharaan Bangunan Gedung-Bangunan Gedung\nTempat Kerja-Bangunan Gedung Pertokoan/Koperasi/Pasar'),
('5.1.02.03.03.0013', 'Belanja Pemeliharaan Bangunan Gedung-Bangunan Gedung\nTempat Kerja-Bangunan Gedung untuk Pos Jaga'),
('5.1.02.03.03.0014', 'Belanja Pemeliharaan Bangunan Gedung-Bangunan Gedung\nTempat Kerja-Bangunan Gedung Garasi/Pool'),
('5.1.02.03.03.0015', 'Belanja Pemeliharaan Bangunan Gedung-Bangunan Gedung\nTempat Kerja-Bangunan Gedung Pemotong Hewan'),
('5.1.02.03.03.0016', 'Belanja Pemeliharaan Bangunan Gedung-Bangunan Gedung\nTempat Kerja-Bangunan Gedung Perpustakaan'),
('5.1.02.03.03.0017', 'Belanja Pemeliharaan Bangunan Gedung-Bangunan Gedung\nTempat Kerja-Bangunan Gedung Museum'),
('5.1.02.03.03.0018', 'Belanja Pemeliharaan Bangunan Gedung-Bangunan Gedung Tempat Kerja-Bangunan Gedung Terminal/Pelabuhan/Bandara'),
('5.1.02.03.03.0019', 'Belanja Pemeliharaan Bangunan Gedung-Bangunan Gedung\nTempat Kerja-Bangunan Pengujian Kelaikan'),
('5.1.02.03.03.0020', 'Belanja Pemeliharaan Bangunan Gedung-Bangunan Gedung\nTempat Kerja-Bangunan Gedung Lembaga Pemasyarakatan'),
('5.1.02.03.03.0021', 'Belanja Pemeliharaan Bangunan Gedung-Bangunan Gedung\nTempat Kerja-Bangunan Rumah Tahanan'),
('5.1.02.03.03.0022', 'Belanja Pemeliharaan Bangunan Gedung-Bangunan Gedung\nTempat Kerja-Bangunan Gedung Krematorium'),
('5.1.02.03.03.0023', 'Belanja Pemeliharaan Bangunan Gedung-Bangunan Gedung\nTempat Kerja-Bangunan Pembakaran Bangkai Hewan'),
('5.1.02.03.03.0024', 'Belanja Pemeliharaan Bangunan Gedung-Bangunan Gedung\nTempat Kerja-Bangunan Tempat Persidangan'),
('5.1.02.03.03.0025', 'Belanja Pemeliharaan Bangunan Gedung-Bangunan Gedung\nTempat Kerja-Bangunan Terbuka'),
('5.1.02.03.03.0026', 'Belanja Belanja Pemeliharaan Bangunan Gedung-Bangunan\nGedung Tempat Kerja-Bangunan Penampung Sekam'),
('5.1.02.03.03.0027', 'Belanja Pemeliharaan Bangunan Gedung-Bangunan Gedung\nTempat Kerja-Bangunan Tempat Pelelangan Ikan (TPI)'),
('5.1.02.03.03.0028', 'Belanja Pemeliharaan Bangunan Gedung-Bangunan Gedung\nTempat Kerja-Bangunan Industri'),
('5.1.02.03.03.0029', 'Belanja Pemeliharaan Bangunan Gedung-Bangunan Gedung\nTempat Kerja-Bangunan Peternakan/Perikanan'),
('5.1.02.03.03.0030', 'Belanja Pemeliharaan Bangunan Gedung-Bangunan Gedung\nTempat Kerja-Bangunan Gedung Tempat Kerja Lainnya'),
('5.1.02.03.03.0031', 'Belanja Pemeliharaan Bangunan Gedung-Bangunan Gedung\nTempat Kerja-Bangunan Peralatan Geofisika'),
('5.1.02.03.03.0032', 'Belanja Pemeliharaan Bangunan Gedung-Bangunan Gedung\nTempat Kerja-Bangunan Fasilitas Umum'),
('5.1.02.03.03.0033', 'Belanja Pemeliharaan Bangunan Gedung-Bangunan Gedung\nTempat Kerja-Bangunan Parkir'),
('5.1.02.03.03.0034', 'Belanja Pemeliharaan Bangunan Gedung-Bangunan Gedung\nTempat Kerja-Bangunan Gedung Pabrik'),
('5.1.02.03.03.0035', 'Belanja Pemeliharaan Bangunan Gedung-Bangunan Gedung\nTempat Kerja-Bangunan Stasiun Bus'),
('5.1.02.03.03.0036', 'Belanja Pemeliharaan Bangunan Gedung-Bangunan Gedung\nTempat Kerja-Taman'),
('5.1.02.03.03.0037', 'Belanja Pemeliharaan Bangunan Gedung-Bangunan Gedung\nTempat Kerja-Bangunan Gedung Tempat Kerja Lainnya'),
('5.1.02.03.03.0038', 'Belanja Pemeliharaan Bangunan Gedung-Bangunan Gedung\nTempat Tinggal-Rumah Negara Golongan I'),
('5.1.02.03.03.0039', 'Belanja Pemeliharaan Bangunan Gedung-Bangunan Gedung\nTempat Tinggal-Rumah Negara Golongan II'),
('5.1.02.03.03.0040', 'Belanja Pemeliharaan Bangunan Gedung-Bangunan Gedung\nTempat Tinggal-Rumah Negara Golongan III'),
('5.1.02.03.03.0041', 'Belanja Pemeliharaan Bangunan Gedung-Bangunan Gedung Tempat Tinggal-Mess/Wisma/Bungalow/Tempat Peristirahatan'),
('5.1.02.03.03.0042', 'Belanja Pemeliharaan Bangunan Gedung-Bangunan Gedung\nTempat Tinggal-Asrama'),
('5.1.02.03.03.0043', 'Belanja Pemeliharaan Bangunan Gedung-Bangunan Gedung\nTempat Tinggal-Hotel'),
('5.1.02.03.03.0044', 'Belanja Pemeliharaan Bangunan Gedung-Bangunan Gedung\nTempat Tinggal-Motel'),
('5.1.02.03.03.0045', 'Belanja Pemeliharaan Bangunan Gedung-Bangunan Gedung\nTempat Tinggal-Flat/Rumah Susun'),
('5.1.02.03.03.0046', 'Belanja Pemeliharaan Bangunan Gedung-Bangunan Gedung\nTempat Tinggal-Rumah Negara dalam Proses Penggolongan'),
('5.1.02.03.03.0047', 'Belanja Pemeliharaan Bangunan Gedung-Bangunan Gedung\nTempat Tinggal-Panti Asuhan'),
('5.1.02.03.03.0048', 'Belanja Pemeliharaan Bangunan Gedung-Bangunan Gedung\nTempat Tinggal-Apartemen'),
('5.1.02.03.03.0049', 'Belanja Pemeliharaan Bangunan Gedung-Bangunan Gedung\nTempat Tinggal-Rumah Tidak Bersusun'),
('5.1.02.03.03.0050', 'Belanja Pemeliharaan Bangunan Gedung-Bangunan Gedung\nTempat Tinggal-Bangunan Gedung Tempat Tinggal Lainnya'),
('5.1.02.03.03.0053', 'Belanja Pemeliharaan Monumen-Candi/Tugu Peringatan/Prasasti-\nBangunan Peninggalan'),
('5.1.02.03.03.0055', 'Belanja Pemeliharaan Bangunan Menara-Bangunan Menara Perambuan-Bangunan Menara Perambuan Penerangan Pantai'),
('5.1.02.03.03.0056', 'Belanja Pemeliharaan Bangunan Menara-Bangunan Menara\nPerambuan-Bangunan Perambuan Penerangan Pantai'),
('5.1.02.03.03.0057', 'Belanja Pemeliharaan Bangunan Menara-Bangunan Menara\nPerambuan-Bangunan Menara Telekomunikasi'),
('5.1.02.03.03.0058', 'Belanja Pemeliharaan Bangunan Menara-Bangunan Menara\nPerambuan-Bangunan Menara Pengawas'),
('5.1.02.03.03.0059', 'Belanja Pemeliharaan Bangunan Menara-Bangunan Menara\nPerambuan-Bangunan Menara Perambuan Lainnya'),
('5.1.02.03.04.0024', 'Belanja Pemeliharaan Bangunan Air-Bangunan Air Irigasi-\nBangunan Waduk Irigasi'),
('5.1.02.03.04.0025', 'Belanja Pemeliharaan Bangunan Air-Bangunan Air Irigasi-\nBangunan Pengambilan Irigasi'),
('5.1.02.03.04.0026', 'Belanja Pemeliharaan Bangunan Air-Bangunan Air Irigasi-\nBangunan Pembawa Irigasi'),
('5.1.02.03.04.0027', 'Belanja Pemeliharaan Bangunan Air-Bangunan Air Irigasi-\nBangunan Pembuang Irigasi'),
('5.1.02.03.04.0028', 'Belanja Pemeliharaan Bangunan Air-Bangunan Air Irigasi-\nBangunan Pengaman Irigasi'),
('5.1.02.03.04.0029', 'Belanja Pemeliharaan Bangunan Air-Bangunan Air Irigasi-\nBangunan Pelengkap Irigasi'),
('5.1.02.03.04.0030', 'Belanja Pemeliharaan Bangunan Air-Bangunan Air Irigasi-\nBangunan Sawah Irigasi'),
('5.1.02.03.04.0031', 'Belanja Pemeliharaan Bangunan Air-Bangunan Air Irigasi-\nBangunan Air Irigasi Lainnya'),
('5.1.02.03.04.0032', 'Belanja Pemeliharaan Bangunan Air-Bangunan Pengairan Pasang\nSurut-Bangunan Waduk Pasang Surut'),
('5.1.02.03.04.0033', 'Belanja Pemeliharaan Bangunan Air-Bangunan Pengairan Pasang\nSurut-Bangunan Pengambilan Pasang Surut'),
('5.1.02.03.04.0034', 'Belanja Pemeliharaan Bangunan Air-Bangunan Pengairan Pasang\nSurut-Bangunan Pembawa Pasang Surut'),
('5.1.02.03.04.0035', 'Belanja Pemeliharaan Bangunan Air-Bangunan Pengairan Pasang\nSurut-Saluran Pembuang Pasang Surut'),
('5.1.02.03.04.0036', 'Belanja Pemeliharaan Bangunan Air-Bangunan Pengairan Pasang\nSurut-Bangunan Pengaman Pasang Surut'),
('5.1.02.03.04.0037', 'Belanja Pemeliharaan Bangunan Air-Bangunan Pengairan Pasang\nSurut-Bangunan Pelengkap Pasang Surut'),
('5.1.02.03.04.0038', 'Belanja Pemeliharaan Bangunan Air-Bangunan Pengairan Pasang\nSurut-Bangunan Sawah Pasang Surut'),
('5.1.02.03.04.0039', 'Belanja Pemeliharaan Bangunan Air-Bangunan Pengairan Pasang\nSurut-Bangunan Pengairan Pasang Surut Lainnya'),
('5.1.02.03.04.0040', 'Belanja Pemeliharaan Bangunan Air-Bangunan Pengembangan Rawa dan Polder-Bangunan Waduk Pengembangan Rawa'),
('5.1.02.03.04.0041', 'Belanja Pemeliharaan Bangunan Air-Bangunan Pengembangan Rawa dan Polder-Bangunan Pengambilan Pengembangan Rawa'),
('5.1.02.03.04.0042', 'Belanja Pemeliharaan Bangunan Air-Bangunan Pengembangan Rawa dan Polder-Bangunan Pembawa Pengembangan Rawa'),
('5.1.02.03.04.0043', 'Belanja Pemeliharaan Bangunan Air-Bangunan Pengembangan Rawa dan Polder-Bangunan Pembuang Pengembangan Rawa'),
('5.1.02.03.04.0044', 'Belanja Pemeliharaan Bangunan Air-Bangunan Pengembangan Rawa dan Polder-Bangunan Pengaman Pengembangan Rawa'),
('5.1.02.03.04.0045', 'Belanja Pemeliharaan Bangunan Air-Bangunan Pengembangan Rawa dan Polder-Bangunan Pelengkap Pengembangan Rawa'),
('5.1.02.03.04.0046', 'Belanja Pemeliharaan Bangunan Air-Bangunan Pengembangan Rawa dan Polder-Bangunan Sawah Pengembangan Rawa'),
('5.1.02.03.04.0047', 'Belanja Pemeliharaan Bangunan Air-Bangunan Pengembangan Rawa dan Polder-Bangunan Pengembangan Rawa dan Polder Lainnya'),
('5.1.02.03.04.0048', 'Belanja Pemeliharaan Bangunan Air-Bangunan Pengaman Sungai/Pantai dan Penanggulangan Bencana Alam-Bangunan Pengaman Sungai/Pantai dan Penanggulangan Bencana Alam'),
('5.1.02.03.04.0049', 'Belanja Pemeliharaan Bangunan Air-Bangunan Pengaman Sungai/Pantai dan Penanggulangan Bencana Alam-Bangunan Pengambilan Pengaman Sungai/Pantai'),
('5.1.02.03.04.0050', 'Belanja Pemeliharaan Bangunan Air-Bangunan Pengaman Sungai/Pantai dan Penanggulangan Bencana Alam-Bangunan Pembawa Pengaman Sungai/Pantai'),
('5.1.02.03.04.0051', 'Belanja Pemeliharaan Bangunan Air-Bangunan Pengaman Sungai/Pantai dan Penanggulangan Bencana Alam-Bangunan Pembuang Pengaman Sungai'),
('5.1.02.03.04.0052', 'Belanja Pemeliharaan Bangunan Air-Bangunan Pengaman Sungai/Pantai dan Penanggulangan Bencana Alam-Bangunan Pengaman Pengamanan Sungai/Pantai'),
('5.1.02.03.04.0053', 'Belanja Pemeliharaan Bangunan Air-Bangunan Pengaman Sungai/Pantai dan Penanggulangan Bencana Alam-Bangunan Pelengkap Pengaman Sungai'),
('5.1.02.03.04.0054', 'Belanja Pemeliharaan Bangunan Air-Bangunan Pengaman Sungai/Pantai dan Penanggulangan Bencana Alam-Bangunan Pengaman Sungai/Pantai dan Penanggulangan Bencana Alam Lainnya'),
('5.1.02.03.04.0055', 'Belanja Pemeliharaan Bangunan Air-Bangunan Pengembangan Sumber Air dan Air Tanah-Bangunan Waduk Pengembangan Sumber Air'),
('5.1.02.03.04.0056', 'Belanja Pemeliharaan Bangunan Air-Bangunan Pengembangan Sumber Air dan Air Tanah-Bangunan Pengambilan Pengembangan Sumber Air'),
('5.1.02.03.04.0057', 'Belanja Pemeliharaan Bangunan Air-Bangunan Pengembangan Sumber Air dan Air Tanah-Bangunan Pembawa Pengembangan Sumber Air'),
('5.1.02.03.04.0058', 'Belanja Pemeliharaan Bangunan Air-Bangunan Pengembangan Sumber Air dan Air Tanah-Bangunan Pembuang Pengembangan Sumber Air'),
('5.1.02.03.04.0059', 'Belanja Pemeliharaan Bangunan Air-Bangunan Pengembangan Sumber Air dan Air Tanah-Bangunan Pengaman Pengembangan Sumber Air'),
('5.1.02.03.04.0060', 'Belanja Pemeliharaan Bangunan Air-Bangunan Pengembangan Sumber Air dan Air Tanah-Bangunan Pelengkap Pengembangan Sumber Air'),
('5.1.02.03.04.0061', 'Belanja Pemeliharaan Bangunan Air-Bangunan Pengembangan Sumber Air dan Air Tanah-Bangunan Sawah Irigasi Air Tanah'),
('5.1.02.03.04.0062', 'Belanja Pemeliharaan Bangunan Air-Bangunan Pengembangan Sumber Air dan Air Tanah-Bangunan Pengembangan Sumber Air dan Air Tanah Lainnya'),
('5.1.02.03.04.0063', 'Belanja Pemeliharaan Bangunan Air-Bangunan Air Bersih/Air Baku Lainnya-Bangunan Waduk Air Bersih/Air Baku'),
('5.1.02.03.04.0064', 'Belanja Pemeliharaan Bangunan Air-Bangunan Air Bersih/Air Baku Lainnya-Bangunan Pengambilan Air Bersih/Air Baku'),
('5.1.02.03.04.0065', 'Belanja Pemeliharaan Bangunan Air-Bangunan Air Bersih/Air Baku Lainnya-Bangunan Pembawa Air Bersih/Air Baku'),
('5.1.02.03.04.0066', 'Belanja Pemeliharaan Bangunan Air-Bangunan Air Bersih/Air Baku Lainnya-Bangunan Pembuang Air Bersih/Air Baku'),
('5.1.02.03.04.0067', 'Belanja Pemeliharaan Bangunan Air-Bangunan Air Bersih/Air Baku Lainnya-Bangunan Pelengkap Air Bersih/Air Baku'),
('5.1.02.03.04.0068', 'Belanja Pemeliharaan Bangunan Air-Bangunan Air Bersih/Air Baku Lainnya-Bangunan Air Bersih/Air Baku Lainnya'),
('5.1.02.03.04.0069', 'Belanja Pemeliharaan Bangunan Air-Bangunan Air Kotor-Bangunan\nPembawa Air Kotor'),
('5.1.02.03.04.0070', 'Belanja Pemeliharaan Bangunan Air-Bangunan Air Kotor-Bangunan\nWaduk Air Kotor'),
('5.1.02.03.04.0071', 'Belanja Pemeliharaan Bangunan Air-Bangunan Air Kotor-Bangunan\nPembuang Air Kotor'),
('5.1.02.03.04.0072', 'Belanja Pemeliharaan Bangunan Air-Bangunan Air Kotor-Bangunan\nPengaman Air Kotor'),
('5.1.02.03.04.0073', 'Belanja Pemeliharaan Bangunan Air-Bangunan Air Kotor-Bangunan\nPelengkap Air Kotor'),
('5.1.02.03.04.0074', 'Belanja Pemeliharaan Bangunan Air-Bangunan Air Kotor-Bangunan\nAir Kotor Lainnya'),
('5.1.02.03.04.0086', 'Belanja Pemeliharaan Instalasi-Instalasi Pengolahan Sampah-\nBangunan Penampung Sampah'),
('5.1.02.03.04.0088', 'Belanja Pemeliharaan Instalasi-Instalasi Pengolahan Bahan Bangunan-Instalasi Pengolahan Bahan Bangunan Percontohan'),
('5.1.02.03.04.0089', 'Belanja Pemeliharaan Instalasi-Instalasi Pengolahan Bahan\nBangunan-Instalasi Pengolahan Bahan Bangunan Perintis'),
('5.1.02.03.04.0090', 'Belanja Pemeliharaan Instalasi-Instalasi Pengolahan Bahan\nBangunan-Instalasi Pengolahan Bahan Bangunan Terapan'),
('5.1.02.03.04.0091', 'Belanja Pemeliharaan Instalasi-Instalasi Pengolahan Bahan\nBangunan-Instalasi Pengolahan Bahan Bangunan Lainnya'),
('5.2.01.01.01.0001', 'Belanja Modal Tanah Bangunan Perumahan/ Gedung Tempat\nTinggal'),
('5.2.01.01.01.0002', 'Belanja Modal Tanah untuk Bangunan Gedung\nPerdagangan/Perusahaan'),
('5.2.01.01.01.0003', 'Belanja Modal Tanah untuk Bangunan Industri'),
('5.2.01.01.01.0004', 'Belanja Modal Tanah untuk Bangunan Tempat Kerja'),
('5.2.01.01.01.0005', 'Belanja Modal Tanah untuk Bangunan Gedung Sarana Olah Raga'),
('5.2.01.01.01.0006', 'Belanja Modal Tanah untuk Bangunan Tempat Ibadah'),
('5.2.01.01.03.0008', 'Belanja Modal Tanah untuk Bangunan Air'),
('5.2.01.01.03.0009', 'Belanja Modal Tanah untuk Bangunan Instalasi'),
('5.2.01.01.03.0010', 'Belanja Modal Tanah untuk Bangunan Jaringan'),
('5.2.01.01.03.0011', 'Belanja Modal Tanah untuk Bangunan Bersejarah'),
('5.2.02.03.03.0013', 'Belanja Modal Takaran Bahan Bangunan'),
('5.2.02.08.01.0006', 'Belanja Modal Alat Laboratorium Bahan Bangunan Konstruksi'),
('5.2.03.01.01.0001', 'Belanja Modal Bangunan Gedung Kantor'),
('5.2.03.01.01.0002', 'Belanja Modal Bangunan Gudang'),
('5.2.03.01.01.0003', 'Belanja Modal Bangunan Gedung untuk Bengkel/Hanggar'),
('5.2.03.01.01.0004', 'Belanja Modal Bangunan Gedung Instalasi'),
('5.2.03.01.01.0005', 'Belanja Modal Bangunan Gedung Laboratorium'),
('5.2.03.01.01.0006', 'Belanja Modal Bangunan Kesehatan'),
('5.2.03.01.01.0007', 'Belanja Modal Bangunan Oseanarium/Observatorium'),
('5.2.03.01.01.0008', 'Belanja Modal Bangunan Gedung Tempat Ibadah'),
('5.2.03.01.01.0009', 'Belanja Modal Bangunan Gedung Tempat Pertemuan'),
('5.2.03.01.01.0010', 'Belanja Modal Bangunan Gedung Tempat Pendidikan'),
('5.2.03.01.01.0011', 'Belanja Modal Bangunan Gedung Tempat Olahraga'),
('5.2.03.01.01.0012', 'Belanja Modal Bangunan Gedung Pertokoan/Koperasi/Pasar'),
('5.2.03.01.01.0013', 'Belanja Modal Bangunan Gedung untuk Pos Jaga'),
('5.2.03.01.01.0014', 'Belanja Modal Bangunan Gedung Garasi/Pool'),
('5.2.03.01.01.0015', 'Belanja Modal Bangunan Gedung Pemotong Hewan'),
('5.2.03.01.01.0016', 'Belanja Modal Bangunan Gedung Perpustakaan'),
('5.2.03.01.01.0017', 'Belanja Modal Bangunan Gedung Museum'),
('5.2.03.01.01.0018', 'Belanja Modal Bangunan Gedung Terminal/Pelabuhan/Bandara'),
('5.2.03.01.01.0019', 'Belanja Modal Bangunan Pengujian Kelaikan'),
('5.2.03.01.01.0020', 'Belanja Modal Bangunan Gedung Lembaga Pemasyarakatan'),
('5.2.03.01.01.0021', 'Belanja Modal Bangunan Rumah Tahanan'),
('5.2.03.01.01.0022', 'Belanja Modal Bangunan Gedung Krematorium'),
('5.2.03.01.01.0023', 'Belanja Modal Bangunan Pembakaran Bangkai Hewan'),
('5.2.03.01.01.0024', 'Belanja Modal Bangunan Tempat Persidangan'),
('5.2.03.01.01.0025', 'Belanja Modal Bangunan Terbuka'),
('5.2.03.01.01.0026', 'Belanja Modal Bangunan Penampung Sekam'),
('5.2.03.01.01.0027', 'Belanja Modal Bangunan Tempat Pelelangan Ikan (TPI)'),
('5.2.03.01.01.0028', 'Belanja Modal Bangunan Industri'),
('5.2.03.01.01.0029', 'Belanja Modal Bangunan Peternakan/Perikanan'),
('5.2.03.01.01.0030', 'Belanja Modal Bangunan Gedung Tempat Kerja Lainnya'),
('5.2.03.01.01.0031', 'Belanja Modal Bangunan Peralatan Geofisika'),
('5.2.03.01.01.0032', 'Belanja Modal Bangunan Fasilitas Umum'),
('5.2.03.01.01.0033', 'Belanja Modal Bangunan Parkir'),
('5.2.03.01.01.0034', 'Belanja Modal Bangunan Gedung Pabrik'),
('5.2.03.01.01.0035', 'Belanja Modal Bangunan Stasiun Bus'),
('5.2.03.01.01.0037', 'Belanja Modal Bangunan Gedung Tempat Kerja Lainnya'),
('5.2.03.01.02.0013', 'Belanja Modal Bangunan Gedung Tempat Tinggal Lainnya'),
('5.2.03.02.01.0003', 'Belanja Modal Bangunan Peninggalan'),
('5.2.03.03.01.0001', 'Belanja Modal Bangunan Menara Perambuan Penerangan Pantai'),
('5.2.03.03.01.0002', 'Belanja Modal Bangunan Perambuan Penerangan Pantai'),
('5.2.03.03.01.0003', 'Belanja Modal Bangunan Menara Telekomunikasi'),
('5.2.03.03.01.0004', 'Belanja Modal Bangunan Menara Pengawas'),
('5.2.03.03.01.0005', 'Belanja Modal Bangunan Menara Perambuan Lainnya'),
('5.2.04.02.01.0001', 'Belanja Modal Bangunan Waduk Irigasi'),
('5.2.04.02.01.0002', 'Belanja Modal Bangunan Pengambilan Irigasi'),
('5.2.04.02.01.0003', 'Belanja Modal Bangunan Pembawa Irigasi'),
('5.2.04.02.01.0004', 'Belanja Modal Bangunan Pembuang Irigasi'),
('5.2.04.02.01.0005', 'Belanja Modal Bangunan Pengaman Irigasi'),
('5.2.04.02.01.0006', 'Belanja Modal Bangunan Pelengkap Irigasi'),
('5.2.04.02.01.0007', 'Belanja Modal Bangunan Sawah Irigasi'),
('5.2.04.02.01.0008', 'Belanja Modal Bangunan Air Irigasi Lainnya'),
('5.2.04.02.02.0001', 'Belanja Modal Bangunan Waduk Pasang Surut'),
('5.2.04.02.02.0002', 'Belanja Modal Bangunan Pengambilan Pasang Surut'),
('5.2.04.02.02.0003', 'Belanja Modal Bangunan Pembawa Pasang Surut'),
('5.2.04.02.02.0005', 'Belanja Modal Bangunan Pengaman Pasang Surut'),
('5.2.04.02.02.0006', 'Belanja Modal Bangunan Pelengkap Pasang Surut'),
('5.2.04.02.02.0007', 'Belanja Modal Bangunan Sawah Pasang Surut'),
('5.2.04.02.02.0008', 'Belanja Modal Bangunan Pengairan Pasang Surut Lainnya'),
('5.2.04.02.03.0001', 'Belanja Modal Bangunan Waduk Pengembangan Rawa'),
('5.2.04.02.03.0002', 'Belanja Modal Bangunan Pengambilan Pengembangan Rawa'),
('5.2.04.02.03.0003', 'Belanja Modal Bangunan Pembawa Pengembangan Rawa'),
('5.2.04.02.03.0004', 'Belanja Modal Bangunan Pembuang Pengembangan Rawa'),
('5.2.04.02.03.0005', 'Belanja Modal Bangunan Pengaman Pengembangan Rawa'),
('5.2.04.02.03.0006', 'Belanja Modal Bangunan Pelengkap Pengembangan Rawa'),
('5.2.04.02.03.0007', 'Belanja Modal Bangunan Sawah Pengembangan Rawa'),
('5.2.04.02.03.0008', 'Belanja Modal Bangunan Pengembangan Rawa dan Polder Lainnya'),
('5.2.04.02.04.0001', 'Belanja Modal Bangunan Pengaman Sungai/Pantai dan\nPenanggulangan Bencana Alam'),
('5.2.04.02.04.0002', 'Belanja Modal Bangunan Pengambilan Pengaman Sungai/Pantai'),
('5.2.04.02.04.0003', 'Belanja Modal Bangunan Pembawa Pengaman Sungai/Pantai'),
('5.2.04.02.04.0004', 'Belanja Modal Bangunan Pembuang Pengaman Sungai'),
('5.2.04.02.04.0005', 'Belanja Modal Bangunan Pengaman Pengamanan Sungai/Pantai'),
('5.2.04.02.04.0006', 'Belanja Modal Bangunan Pelengkap Pengaman Sungai'),
('5.2.04.02.04.0007', 'Belanja Modal Bangunan Pengaman Sungai/Pantai dan\nPenanggulangan Bencana Alam Lainnya'),
('5.2.04.02.05.0001', 'Belanja Modal Bangunan Waduk Pengembangan Sumber Air'),
('5.2.04.02.05.0002', 'Belanja Modal Bangunan Pengambilan Pengembangan Sumber Air'),
('5.2.04.02.05.0003', 'Belanja Modal Bangunan Pembawa Pengembangan Sumber Air'),
('5.2.04.02.05.0004', 'Belanja Modal Bangunan Pembuang Pengembangan Sumber Air'),
('5.2.04.02.05.0005', 'Belanja Modal Bangunan Pengaman Pengembangan Sumber Air'),
('5.2.04.02.05.0006', 'Belanja Modal Bangunan Pelengkap Pengembangan Sumber Air'),
('5.2.04.02.05.0007', 'Belanja Modal Bangunan Sawah Irigasi Air Tanah'),
('5.2.04.02.05.0008', 'Belanja Modal Bangunan Pengembangan Sumber Air dan Air Tanah\nLainnya'),
('5.2.04.02.06.0001', 'Belanja Modal Bangunan Waduk Air Bersih/Air Baku'),
('5.2.04.02.06.0002', 'Belanja Modal Bangunan Pengambilan Air Bersih/Air Baku'),
('5.2.04.02.06.0003', 'Belanja Modal Bangunan Pembawa Air Bersih/Air Baku'),
('5.2.04.02.06.0004', 'Belanja Modal Bangunan Pembuang Air Bersih/Air Baku'),
('5.2.04.02.06.0005', 'Belanja Modal Bangunan Pelengkap Air Bersih/Air Baku'),
('5.2.04.02.06.0006', 'Belanja Modal Bangunan Air Bersih/Air Baku Lainnya'),
('5.2.04.02.07.0001', 'Belanja Modal Bangunan Pembawa Air Kotor'),
('5.2.04.02.07.0002', 'Belanja Modal Bangunan Waduk Air Kotor'),
('5.2.04.02.07.0003', 'Belanja Modal Bangunan Pembuang Air Kotor'),
('5.2.04.02.07.0004', 'Belanja Modal Bangunan Pengaman Air Kotor'),
('5.2.04.02.07.0005', 'Belanja Modal Bangunan Pelengkap Air Kotor'),
('5.2.04.02.07.0006', 'Belanja Modal Bangunan Air Kotor Lainnya'),
('5.2.04.03.03.0003', 'Belanja Modal Bangunan Penampung Sampah'),
('5.2.04.03.04.0001', 'Belanja Modal Instalasi Pengolahan Bahan Bangunan Percontohan'),
('5.2.04.03.04.0002', 'Belanja Modal Instalasi Pengolahan Bahan Bangunan Perintis'),
('5.2.04.03.04.0003', 'Belanja Modal Instalasi Pengolahan Bahan Bangunan Terapan'),
('5.2.04.03.04.0004', 'Belanja Modal Instalasi Pengolahan Bahan Bangunan Lainnya');

-- --------------------------------------------------------

--
-- Table structure for table `uraian`
--

CREATE TABLE `uraian` (
  `id_uraian` int(11) NOT NULL,
  `kodering_uraian` varchar(20) NOT NULL,
  `nama_uraian` varchar(255) NOT NULL,
  `isdeleted` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `uraian`
--

INSERT INTO `uraian` (`id_uraian`, `kodering_uraian`, `nama_uraian`, `isdeleted`) VALUES
(1, '5.1.01.03.01.0015', 'Belanja Insentif bagi ASN atas Pemungutan Pajak Bumi Dan\nBangunan Pedesaan Dan Perkotaan', 0),
(2, '5.1.01.03.01.0016', 'Belanja Insentif bagi ASN atas Pemungutan Bea Perolehan Hak atas\nTanah dan Bangunan', 0),
(3, '5.1.01.03.02.0025', 'Belanja Insentif bagi ASN atas Pemungutan Retribusi Perizinan\nTertentu-Izin Mendirikan Bangunan', 0),
(4, '5.1.01.05.10.0015', 'Belanja Insentif bagi KDH/WKDH atas Pemungutan Pajak Bumi\ndan Bangunan Perdesaan dan Perkotaan', 0),
(5, '5.1.01.05.10.0016', 'Belanja Insentif bagi KDH/WKDH atas Pemungutan Bea Perolehan\nHak atas Tanah dan Bangunan', 0),
(6, '5.1.01.05.11.0025', 'Belanja Insentif bagi KDH/WKDH atas Pemungutan Retribusi\nPerizinan Tertentu-Izin Mendirikan Bangunan', 0),
(7, '5.1.02.01.01.0001', 'Belanja Bahan-Bahan Bangunan dan Konstruksi', 0),
(8, '5.1.02.02.13.0015', 'Belanja Insentif Pegawai Non ASN atas Pemungutan Pajak Pajak\nBumi dan Bangunan Perdesaan dan Perkotaan', 0),
(9, '5.1.02.02.13.0016', 'Belanja Insentif Pegawai Non ASN atas Pemungutan Bea Perolehan\nHak atas Tanah dan Bangunan', 0),
(10, '5.1.02.02.14.0025', 'Belanja Insentif bagi Pegawai Non ASN atas Pemungutan Retribusi\nPerizinan Tertentu-Izin Mendirikan Bangunan', 0),
(11, '5.1.02.03.01.0001', 'Belanja Pemeliharaan Tanah-Tanah Persil-Tanah Bangunan\nPerumahan/Gedung Tempat Tinggal', 0),
(12, '5.1.02.03.01.0002', 'Belanja Pemeliharaan Tanah-Tanah Persil-Tanah untuk Bangunan\nGedung Perdagangan/Perusahaan', 0),
(13, '5.1.02.03.01.0003', 'Belanja Pemeliharaan Tanah-Tanah Persil-Tanah untuk Bangunan\nIndustri', 0),
(14, '5.1.02.03.01.0004', 'Belanja Pemeliharaan Tanah-Tanah Persil-Tanah untuk Bangunan\nTempat Kerja', 0),
(15, '5.1.02.03.01.0005', 'Belanja Pemeliharaan Tanah-Tanah Persil-Tanah untuk Bangunan\nGedung Sarana Olahraga', 0),
(16, '5.1.02.03.01.0006', 'Belanja Pemeliharaan Tanah-Tanah Persil-Tanah untuk Bangunan\nTempat Ibadah', 0),
(17, '5.1.02.03.01.0024', 'Belanja Pemeliharaan Tanah-Lapangan-Tanah untuk Bangunan Air', 0),
(18, '5.1.02.03.01.0025', 'Belanja Pemeliharaan Tanah-Lapangan-Tanah untuk Bangunan\nInstalasi', 0),
(19, '5.1.02.03.01.0026', 'Belanja Pemeliharaan Tanah-Lapangan-Tanah untuk Bangunan\nJaringan', 0),
(20, '5.1.02.03.01.0027', 'Belanja Pemeliharaan Tanah-Lapangan-Tanah untuk Bangunan\nBersejarah', 0),
(21, '5.1.02.03.02.0094', 'Belanja Pemeliharaan Alat Bengkel dan Alat Ukur-Alat Ukur-\nTakaran Bahan Bangunan', 0),
(22, '5.1.02.03.02.0243', 'Belanja Pemeliharaan Alat Laboratorium-Unit Alat Laboratorium- Alat Laboratorium Bahan Bangunan Konstruksi', 0),
(23, '5.1.02.03.03.0001', 'Belanja Pemeliharaan Bangunan Gedung-Bangunan Gedung\nTempat Kerja-Bangunan Gedung Kantor', 0),
(24, '5.1.02.03.03.0002', 'Belanja Pemeliharaan Bangunan Gedung-Bangunan Gedung\nTempat Kerja-Bangunan Gudang', 0),
(25, '5.1.02.03.03.0003', 'Belanja Pemeliharaan Bangunan Gedung-Bangunan Gedung\nTempat Kerja-Bangunan Gedung untuk Bengkel/Hanggar', 0),
(26, '5.1.02.03.03.0004', 'Belanja Pemeliharaan Bangunan Gedung-Bangunan Gedung\nTempat Kerja-Bangunan Gedung Instalasi', 0),
(27, '5.1.02.03.03.0005', 'Belanja Pemeliharaan Bangunan Gedung-Bangunan Gedung\nTempat Kerja-Bangunan Gedung Laboratorium', 0),
(28, '5.1.02.03.03.0006', 'Belanja Pemeliharaan Bangunan Gedung-Bangunan Gedung\nTempat Kerja-Bangunan Kesehatan', 0),
(29, '5.1.02.03.03.0007', 'Belanja Pemeliharaan Bangunan Gedung-Bangunan Gedung\nTempat Kerja-Bangunan Oseanarium/Observatorium', 0),
(30, '5.1.02.03.03.0008', 'Belanja Pemeliharaan Bangunan Gedung-Bangunan Gedung\nTempat Kerja-Bangunan Gedung Tempat Ibadah', 0),
(31, '5.1.02.03.03.0009', 'Belanja Pemeliharaan Bangunan Gedung-Bangunan Gedung\nTempat Kerja-Bangunan Gedung Tempat Pertemuan', 0),
(32, '5.1.02.03.03.0010', 'Belanja Pemeliharaan Bangunan Gedung-Bangunan Gedung\nTempat Kerja-Bangunan Gedung Tempat Pendidikan', 0),
(33, '5.1.02.03.03.0011', 'Belanja Pemeliharaan Bangunan Gedung-Bangunan Gedung\nTempat Kerja-Bangunan Gedung Tempat Olahraga', 0),
(34, '5.1.02.03.03.0012', 'Belanja Pemeliharaan Bangunan Gedung-Bangunan Gedung\nTempat Kerja-Bangunan Gedung Pertokoan/Koperasi/Pasar', 0),
(35, '5.1.02.03.03.0013', 'Belanja Pemeliharaan Bangunan Gedung-Bangunan Gedung\nTempat Kerja-Bangunan Gedung untuk Pos Jaga', 0),
(36, '5.1.02.03.03.0014', 'Belanja Pemeliharaan Bangunan Gedung-Bangunan Gedung\nTempat Kerja-Bangunan Gedung Garasi/Pool', 0),
(37, '5.1.02.03.03.0015', 'Belanja Pemeliharaan Bangunan Gedung-Bangunan Gedung\nTempat Kerja-Bangunan Gedung Pemotong Hewan', 0),
(38, '5.1.02.03.03.0016', 'Belanja Pemeliharaan Bangunan Gedung-Bangunan Gedung\nTempat Kerja-Bangunan Gedung Perpustakaan', 0),
(39, '5.1.02.03.03.0017', 'Belanja Pemeliharaan Bangunan Gedung-Bangunan Gedung\nTempat Kerja-Bangunan Gedung Museum', 0),
(40, '5.1.02.03.03.0018', 'Belanja Pemeliharaan Bangunan Gedung-Bangunan Gedung Tempat Kerja-Bangunan Gedung Terminal/Pelabuhan/Bandara', 0),
(41, '5.1.02.03.03.0019', 'Belanja Pemeliharaan Bangunan Gedung-Bangunan Gedung\nTempat Kerja-Bangunan Pengujian Kelaikan', 0),
(42, '5.1.02.03.03.0020', 'Belanja Pemeliharaan Bangunan Gedung-Bangunan Gedung\nTempat Kerja-Bangunan Gedung Lembaga Pemasyarakatan', 0),
(43, '5.1.02.03.03.0021', 'Belanja Pemeliharaan Bangunan Gedung-Bangunan Gedung\nTempat Kerja-Bangunan Rumah Tahanan', 0),
(44, '5.1.02.03.03.0022', 'Belanja Pemeliharaan Bangunan Gedung-Bangunan Gedung\nTempat Kerja-Bangunan Gedung Krematorium', 0),
(45, '5.1.02.03.03.0023', 'Belanja Pemeliharaan Bangunan Gedung-Bangunan Gedung\nTempat Kerja-Bangunan Pembakaran Bangkai Hewan', 0),
(46, '5.1.02.03.03.0024', 'Belanja Pemeliharaan Bangunan Gedung-Bangunan Gedung\nTempat Kerja-Bangunan Tempat Persidangan', 0),
(47, '5.1.02.03.03.0025', 'Belanja Pemeliharaan Bangunan Gedung-Bangunan Gedung\nTempat Kerja-Bangunan Terbuka', 0),
(48, '5.1.02.03.03.0026', 'Belanja Belanja Pemeliharaan Bangunan Gedung-Bangunan\nGedung Tempat Kerja-Bangunan Penampung Sekam', 0),
(49, '5.1.02.03.03.0027', 'Belanja Pemeliharaan Bangunan Gedung-Bangunan Gedung\nTempat Kerja-Bangunan Tempat Pelelangan Ikan (TPI)', 0),
(50, '5.1.02.03.03.0028', 'Belanja Pemeliharaan Bangunan Gedung-Bangunan Gedung\nTempat Kerja-Bangunan Industri', 0),
(51, '5.1.02.03.03.0029', 'Belanja Pemeliharaan Bangunan Gedung-Bangunan Gedung\nTempat Kerja-Bangunan Peternakan/Perikanan', 0),
(52, '5.1.02.03.03.0030', 'Belanja Pemeliharaan Bangunan Gedung-Bangunan Gedung\nTempat Kerja-Bangunan Gedung Tempat Kerja Lainnya', 0),
(53, '5.1.02.03.03.0031', 'Belanja Pemeliharaan Bangunan Gedung-Bangunan Gedung\nTempat Kerja-Bangunan Peralatan Geofisika', 0),
(54, '5.1.02.03.03.0032', 'Belanja Pemeliharaan Bangunan Gedung-Bangunan Gedung\nTempat Kerja-Bangunan Fasilitas Umum', 0),
(55, '5.1.02.03.03.0033', 'Belanja Pemeliharaan Bangunan Gedung-Bangunan Gedung\nTempat Kerja-Bangunan Parkir', 0),
(56, '5.1.02.03.03.0034', 'Belanja Pemeliharaan Bangunan Gedung-Bangunan Gedung\nTempat Kerja-Bangunan Gedung Pabrik', 0),
(57, '5.1.02.03.03.0035', 'Belanja Pemeliharaan Bangunan Gedung-Bangunan Gedung\nTempat Kerja-Bangunan Stasiun Bus', 0),
(58, '5.1.02.03.03.0036', 'Belanja Pemeliharaan Bangunan Gedung-Bangunan Gedung\nTempat Kerja-Taman', 0),
(59, '5.1.02.03.03.0037', 'Belanja Pemeliharaan Bangunan Gedung-Bangunan Gedung\nTempat Kerja-Bangunan Gedung Tempat Kerja Lainnya', 0),
(60, '5.1.02.03.03.0038', 'Belanja Pemeliharaan Bangunan Gedung-Bangunan Gedung\nTempat Tinggal-Rumah Negara Golongan I', 0),
(61, '5.1.02.03.03.0039', 'Belanja Pemeliharaan Bangunan Gedung-Bangunan Gedung\nTempat Tinggal-Rumah Negara Golongan II', 0),
(62, '5.1.02.03.03.0040', 'Belanja Pemeliharaan Bangunan Gedung-Bangunan Gedung\nTempat Tinggal-Rumah Negara Golongan III', 0),
(63, '5.1.02.03.03.0041', 'Belanja Pemeliharaan Bangunan Gedung-Bangunan Gedung Tempat Tinggal-Mess/Wisma/Bungalow/Tempat Peristirahatan', 0),
(64, '5.1.02.03.03.0042', 'Belanja Pemeliharaan Bangunan Gedung-Bangunan Gedung\nTempat Tinggal-Asrama', 0),
(65, '5.1.02.03.03.0043', 'Belanja Pemeliharaan Bangunan Gedung-Bangunan Gedung\nTempat Tinggal-Hotel', 0),
(66, '5.1.02.03.03.0044', 'Belanja Pemeliharaan Bangunan Gedung-Bangunan Gedung\nTempat Tinggal-Motel', 0),
(67, '5.1.02.03.03.0045', 'Belanja Pemeliharaan Bangunan Gedung-Bangunan Gedung\nTempat Tinggal-Flat/Rumah Susun', 0),
(68, '5.1.02.03.03.0046', 'Belanja Pemeliharaan Bangunan Gedung-Bangunan Gedung\nTempat Tinggal-Rumah Negara dalam Proses Penggolongan', 0),
(69, '5.1.02.03.03.0047', 'Belanja Pemeliharaan Bangunan Gedung-Bangunan Gedung\nTempat Tinggal-Panti Asuhan', 0),
(70, '5.1.02.03.03.0048', 'Belanja Pemeliharaan Bangunan Gedung-Bangunan Gedung\nTempat Tinggal-Apartemen', 0),
(71, '5.1.02.03.03.0049', 'Belanja Pemeliharaan Bangunan Gedung-Bangunan Gedung\nTempat Tinggal-Rumah Tidak Bersusun', 0),
(72, '5.1.02.03.03.0050', 'Belanja Pemeliharaan Bangunan Gedung-Bangunan Gedung\nTempat Tinggal-Bangunan Gedung Tempat Tinggal Lainnya', 0),
(73, '5.1.02.03.03.0053', 'Belanja Pemeliharaan Monumen-Candi/Tugu Peringatan/Prasasti-\nBangunan Peninggalan', 0),
(74, '5.1.02.03.03.0055', 'Belanja Pemeliharaan Bangunan Menara-Bangunan Menara Perambuan-Bangunan Menara Perambuan Penerangan Pantai', 0),
(75, '5.1.02.03.03.0056', 'Belanja Pemeliharaan Bangunan Menara-Bangunan Menara\nPerambuan-Bangunan Perambuan Penerangan Pantai', 0),
(76, '5.1.02.03.03.0057', 'Belanja Pemeliharaan Bangunan Menara-Bangunan Menara\nPerambuan-Bangunan Menara Telekomunikasi', 0),
(77, '5.1.02.03.03.0058', 'Belanja Pemeliharaan Bangunan Menara-Bangunan Menara\nPerambuan-Bangunan Menara Pengawas', 0),
(78, '5.1.02.03.03.0059', 'Belanja Pemeliharaan Bangunan Menara-Bangunan Menara\nPerambuan-Bangunan Menara Perambuan Lainnya', 0),
(79, '5.1.02.03.04.0024', 'Belanja Pemeliharaan Bangunan Air-Bangunan Air Irigasi-\nBangunan Waduk Irigasi', 0),
(80, '5.1.02.03.04.0025', 'Belanja Pemeliharaan Bangunan Air-Bangunan Air Irigasi-\nBangunan Pengambilan Irigasi', 0),
(81, '5.1.02.03.04.0026', 'Belanja Pemeliharaan Bangunan Air-Bangunan Air Irigasi-\nBangunan Pembawa Irigasi', 0),
(82, '5.1.02.03.04.0027', 'Belanja Pemeliharaan Bangunan Air-Bangunan Air Irigasi-\nBangunan Pembuang Irigasi', 0),
(83, '5.1.02.03.04.0028', 'Belanja Pemeliharaan Bangunan Air-Bangunan Air Irigasi-\nBangunan Pengaman Irigasi', 0),
(84, '5.1.02.03.04.0029', 'Belanja Pemeliharaan Bangunan Air-Bangunan Air Irigasi-\nBangunan Pelengkap Irigasi', 0),
(85, '5.1.02.03.04.0030', 'Belanja Pemeliharaan Bangunan Air-Bangunan Air Irigasi-\nBangunan Sawah Irigasi', 0),
(86, '5.1.02.03.04.0031', 'Belanja Pemeliharaan Bangunan Air-Bangunan Air Irigasi-\nBangunan Air Irigasi Lainnya', 0),
(87, '5.1.02.03.04.0032', 'Belanja Pemeliharaan Bangunan Air-Bangunan Pengairan Pasang\nSurut-Bangunan Waduk Pasang Surut', 0),
(88, '5.1.02.03.04.0033', 'Belanja Pemeliharaan Bangunan Air-Bangunan Pengairan Pasang\nSurut-Bangunan Pengambilan Pasang Surut', 0),
(89, '5.1.02.03.04.0034', 'Belanja Pemeliharaan Bangunan Air-Bangunan Pengairan Pasang\nSurut-Bangunan Pembawa Pasang Surut', 0),
(90, '5.1.02.03.04.0035', 'Belanja Pemeliharaan Bangunan Air-Bangunan Pengairan Pasang\nSurut-Saluran Pembuang Pasang Surut', 0),
(91, '5.1.02.03.04.0036', 'Belanja Pemeliharaan Bangunan Air-Bangunan Pengairan Pasang\nSurut-Bangunan Pengaman Pasang Surut', 0),
(92, '5.1.02.03.04.0037', 'Belanja Pemeliharaan Bangunan Air-Bangunan Pengairan Pasang\nSurut-Bangunan Pelengkap Pasang Surut', 0),
(93, '5.1.02.03.04.0038', 'Belanja Pemeliharaan Bangunan Air-Bangunan Pengairan Pasang\nSurut-Bangunan Sawah Pasang Surut', 0),
(94, '5.1.02.03.04.0039', 'Belanja Pemeliharaan Bangunan Air-Bangunan Pengairan Pasang\nSurut-Bangunan Pengairan Pasang Surut Lainnya', 0),
(95, '5.1.02.03.04.0040', 'Belanja Pemeliharaan Bangunan Air-Bangunan Pengembangan Rawa dan Polder-Bangunan Waduk Pengembangan Rawa', 0),
(96, '5.1.02.03.04.0041', 'Belanja Pemeliharaan Bangunan Air-Bangunan Pengembangan Rawa dan Polder-Bangunan Pengambilan Pengembangan Rawa', 0),
(97, '5.1.02.03.04.0042', 'Belanja Pemeliharaan Bangunan Air-Bangunan Pengembangan Rawa dan Polder-Bangunan Pembawa Pengembangan Rawa', 0),
(98, '5.1.02.03.04.0043', 'Belanja Pemeliharaan Bangunan Air-Bangunan Pengembangan Rawa dan Polder-Bangunan Pembuang Pengembangan Rawa', 0),
(99, '5.1.02.03.04.0044', 'Belanja Pemeliharaan Bangunan Air-Bangunan Pengembangan Rawa dan Polder-Bangunan Pengaman Pengembangan Rawa', 0),
(100, '5.1.02.03.04.0045', 'Belanja Pemeliharaan Bangunan Air-Bangunan Pengembangan Rawa dan Polder-Bangunan Pelengkap Pengembangan Rawa', 0),
(101, '5.1.02.03.04.0046', 'Belanja Pemeliharaan Bangunan Air-Bangunan Pengembangan Rawa dan Polder-Bangunan Sawah Pengembangan Rawa', 0),
(102, '5.1.02.03.04.0047', 'Belanja Pemeliharaan Bangunan Air-Bangunan Pengembangan Rawa dan Polder-Bangunan Pengembangan Rawa dan Polder Lainnya', 0),
(103, '5.1.02.03.04.0048', 'Belanja Pemeliharaan Bangunan Air-Bangunan Pengaman Sungai/Pantai dan Penanggulangan Bencana Alam-Bangunan Pengaman Sungai/Pantai dan Penanggulangan Bencana Alam', 0),
(104, '5.1.02.03.04.0049', 'Belanja Pemeliharaan Bangunan Air-Bangunan Pengaman Sungai/Pantai dan Penanggulangan Bencana Alam-Bangunan Pengambilan Pengaman Sungai/Pantai', 0),
(105, '5.1.02.03.04.0050', 'Belanja Pemeliharaan Bangunan Air-Bangunan Pengaman Sungai/Pantai dan Penanggulangan Bencana Alam-Bangunan Pembawa Pengaman Sungai/Pantai', 0),
(106, '5.1.02.03.04.0051', 'Belanja Pemeliharaan Bangunan Air-Bangunan Pengaman Sungai/Pantai dan Penanggulangan Bencana Alam-Bangunan Pembuang Pengaman Sungai', 0),
(107, '5.1.02.03.04.0052', 'Belanja Pemeliharaan Bangunan Air-Bangunan Pengaman Sungai/Pantai dan Penanggulangan Bencana Alam-Bangunan Pengaman Pengamanan Sungai/Pantai', 0),
(108, '5.1.02.03.04.0053', 'Belanja Pemeliharaan Bangunan Air-Bangunan Pengaman Sungai/Pantai dan Penanggulangan Bencana Alam-Bangunan Pelengkap Pengaman Sungai', 0),
(109, '5.1.02.03.04.0054', 'Belanja Pemeliharaan Bangunan Air-Bangunan Pengaman Sungai/Pantai dan Penanggulangan Bencana Alam-Bangunan Pengaman Sungai/Pantai dan Penanggulangan Bencana Alam Lainnya', 0),
(110, '5.1.02.03.04.0055', 'Belanja Pemeliharaan Bangunan Air-Bangunan Pengembangan Sumber Air dan Air Tanah-Bangunan Waduk Pengembangan Sumber Air', 0),
(111, '5.1.02.03.04.0056', 'Belanja Pemeliharaan Bangunan Air-Bangunan Pengembangan Sumber Air dan Air Tanah-Bangunan Pengambilan Pengembangan Sumber Air', 0),
(112, '5.1.02.03.04.0057', 'Belanja Pemeliharaan Bangunan Air-Bangunan Pengembangan Sumber Air dan Air Tanah-Bangunan Pembawa Pengembangan Sumber Air', 0),
(113, '5.1.02.03.04.0058', 'Belanja Pemeliharaan Bangunan Air-Bangunan Pengembangan Sumber Air dan Air Tanah-Bangunan Pembuang Pengembangan Sumber Air', 0),
(114, '5.1.02.03.04.0059', 'Belanja Pemeliharaan Bangunan Air-Bangunan Pengembangan Sumber Air dan Air Tanah-Bangunan Pengaman Pengembangan Sumber Air', 0),
(115, '5.1.02.03.04.0060', 'Belanja Pemeliharaan Bangunan Air-Bangunan Pengembangan Sumber Air dan Air Tanah-Bangunan Pelengkap Pengembangan Sumber Air', 0),
(116, '5.1.02.03.04.0061', 'Belanja Pemeliharaan Bangunan Air-Bangunan Pengembangan Sumber Air dan Air Tanah-Bangunan Sawah Irigasi Air Tanah', 0),
(117, '5.1.02.03.04.0062', 'Belanja Pemeliharaan Bangunan Air-Bangunan Pengembangan Sumber Air dan Air Tanah-Bangunan Pengembangan Sumber Air dan Air Tanah Lainnya', 0),
(118, '5.1.02.03.04.0063', 'Belanja Pemeliharaan Bangunan Air-Bangunan Air Bersih/Air Baku Lainnya-Bangunan Waduk Air Bersih/Air Baku', 0),
(119, '5.1.02.03.04.0064', 'Belanja Pemeliharaan Bangunan Air-Bangunan Air Bersih/Air Baku Lainnya-Bangunan Pengambilan Air Bersih/Air Baku', 0),
(120, '5.1.02.03.04.0065', 'Belanja Pemeliharaan Bangunan Air-Bangunan Air Bersih/Air Baku Lainnya-Bangunan Pembawa Air Bersih/Air Baku', 0),
(121, '5.1.02.03.04.0066', 'Belanja Pemeliharaan Bangunan Air-Bangunan Air Bersih/Air Baku Lainnya-Bangunan Pembuang Air Bersih/Air Baku', 0),
(122, '5.1.02.03.04.0067', 'Belanja Pemeliharaan Bangunan Air-Bangunan Air Bersih/Air Baku Lainnya-Bangunan Pelengkap Air Bersih/Air Baku', 0),
(123, '5.1.02.03.04.0068', 'Belanja Pemeliharaan Bangunan Air-Bangunan Air Bersih/Air Baku Lainnya-Bangunan Air Bersih/Air Baku Lainnya', 0),
(124, '5.1.02.03.04.0069', 'Belanja Pemeliharaan Bangunan Air-Bangunan Air Kotor-Bangunan\nPembawa Air Kotor', 0),
(125, '5.1.02.03.04.0070', 'Belanja Pemeliharaan Bangunan Air-Bangunan Air Kotor-Bangunan\nWaduk Air Kotor', 0),
(126, '5.1.02.03.04.0071', 'Belanja Pemeliharaan Bangunan Air-Bangunan Air Kotor-Bangunan\nPembuang Air Kotor', 0),
(127, '5.1.02.03.04.0072', 'Belanja Pemeliharaan Bangunan Air-Bangunan Air Kotor-Bangunan\nPengaman Air Kotor', 0),
(128, '5.1.02.03.04.0073', 'Belanja Pemeliharaan Bangunan Air-Bangunan Air Kotor-Bangunan\nPelengkap Air Kotor', 0),
(129, '5.1.02.03.04.0074', 'Belanja Pemeliharaan Bangunan Air-Bangunan Air Kotor-Bangunan\nAir Kotor Lainnya', 0),
(130, '5.1.02.03.04.0086', 'Belanja Pemeliharaan Instalasi-Instalasi Pengolahan Sampah-\nBangunan Penampung Sampah', 0),
(131, '5.1.02.03.04.0088', 'Belanja Pemeliharaan Instalasi-Instalasi Pengolahan Bahan Bangunan-Instalasi Pengolahan Bahan Bangunan Percontohan', 0),
(132, '5.1.02.03.04.0089', 'Belanja Pemeliharaan Instalasi-Instalasi Pengolahan Bahan\nBangunan-Instalasi Pengolahan Bahan Bangunan Perintis', 0),
(133, '5.1.02.03.04.0090', 'Belanja Pemeliharaan Instalasi-Instalasi Pengolahan Bahan\nBangunan-Instalasi Pengolahan Bahan Bangunan Terapan', 0),
(134, '5.1.02.03.04.0091', 'Belanja Pemeliharaan Instalasi-Instalasi Pengolahan Bahan\nBangunan-Instalasi Pengolahan Bahan Bangunan Lainnya', 0),
(135, '5.2.01.01.01.0001', 'Belanja Modal Tanah Bangunan Perumahan/ Gedung Tempat\nTinggal', 0),
(136, '5.2.01.01.01.0002', 'Belanja Modal Tanah untuk Bangunan Gedung\nPerdagangan/Perusahaan', 0),
(137, '5.2.01.01.01.0003', 'Belanja Modal Tanah untuk Bangunan Industri', 0),
(138, '5.2.01.01.01.0004', 'Belanja Modal Tanah untuk Bangunan Tempat Kerja', 0),
(139, '5.2.01.01.01.0005', 'Belanja Modal Tanah untuk Bangunan Gedung Sarana Olah Raga', 0),
(140, '5.2.01.01.01.0006', 'Belanja Modal Tanah untuk Bangunan Tempat Ibadah', 0),
(141, '5.2.01.01.03.0008', 'Belanja Modal Tanah untuk Bangunan Air', 0),
(142, '5.2.01.01.03.0009', 'Belanja Modal Tanah untuk Bangunan Instalasi', 0),
(143, '5.2.01.01.03.0010', 'Belanja Modal Tanah untuk Bangunan Jaringan', 0),
(144, '5.2.01.01.03.0011', 'Belanja Modal Tanah untuk Bangunan Bersejarah', 0),
(145, '5.2.02.03.03.0013', 'Belanja Modal Takaran Bahan Bangunan', 0),
(146, '5.2.02.08.01.0006', 'Belanja Modal Alat Laboratorium Bahan Bangunan Konstruksi', 0),
(147, '5.2.03.01.01.0001', 'Belanja Modal Bangunan Gedung Kantor', 0),
(148, '5.2.03.01.01.0002', 'Belanja Modal Bangunan Gudang', 0),
(149, '5.2.03.01.01.0003', 'Belanja Modal Bangunan Gedung untuk Bengkel/Hanggar', 0),
(150, '5.2.03.01.01.0004', 'Belanja Modal Bangunan Gedung Instalasi', 0),
(151, '5.2.03.01.01.0005', 'Belanja Modal Bangunan Gedung Laboratorium', 0),
(152, '5.2.03.01.01.0006', 'Belanja Modal Bangunan Kesehatan', 0),
(153, '5.2.03.01.01.0007', 'Belanja Modal Bangunan Oseanarium/Observatorium', 0),
(154, '5.2.03.01.01.0008', 'Belanja Modal Bangunan Gedung Tempat Ibadah', 0),
(155, '5.2.03.01.01.0009', 'Belanja Modal Bangunan Gedung Tempat Pertemuan', 0),
(156, '5.2.03.01.01.0010', 'Belanja Modal Bangunan Gedung Tempat Pendidikan', 0),
(157, '5.2.03.01.01.0011', 'Belanja Modal Bangunan Gedung Tempat Olahraga', 0),
(158, '5.2.03.01.01.0012', 'Belanja Modal Bangunan Gedung Pertokoan/Koperasi/Pasar', 0),
(159, '5.2.03.01.01.0013', 'Belanja Modal Bangunan Gedung untuk Pos Jaga', 0),
(160, '5.2.03.01.01.0014', 'Belanja Modal Bangunan Gedung Garasi/Pool', 0),
(161, '5.2.03.01.01.0015', 'Belanja Modal Bangunan Gedung Pemotong Hewan', 0),
(162, '5.2.03.01.01.0016', 'Belanja Modal Bangunan Gedung Perpustakaan', 0),
(163, '5.2.03.01.01.0017', 'Belanja Modal Bangunan Gedung Museum', 0),
(164, '5.2.03.01.01.0018', 'Belanja Modal Bangunan Gedung Terminal/Pelabuhan/Bandara', 0),
(165, '5.2.03.01.01.0019', 'Belanja Modal Bangunan Pengujian Kelaikan', 0),
(166, '5.2.03.01.01.0020', 'Belanja Modal Bangunan Gedung Lembaga Pemasyarakatan', 0),
(167, '5.2.03.01.01.0021', 'Belanja Modal Bangunan Rumah Tahanan', 0),
(168, '5.2.03.01.01.0022', 'Belanja Modal Bangunan Gedung Krematorium', 0),
(169, '5.2.03.01.01.0023', 'Belanja Modal Bangunan Pembakaran Bangkai Hewan', 0),
(170, '5.2.03.01.01.0024', 'Belanja Modal Bangunan Tempat Persidangan', 0),
(171, '5.2.03.01.01.0025', 'Belanja Modal Bangunan Terbuka', 0),
(172, '5.2.03.01.01.0026', 'Belanja Modal Bangunan Penampung Sekam', 0),
(173, '5.2.03.01.01.0027', 'Belanja Modal Bangunan Tempat Pelelangan Ikan (TPI)', 0),
(174, '5.2.03.01.01.0028', 'Belanja Modal Bangunan Industri', 0),
(175, '5.2.03.01.01.0029', 'Belanja Modal Bangunan Peternakan/Perikanan', 0),
(176, '5.2.03.01.01.0030', 'Belanja Modal Bangunan Gedung Tempat Kerja Lainnya', 0),
(177, '5.2.03.01.01.0031', 'Belanja Modal Bangunan Peralatan Geofisika', 0),
(178, '5.2.03.01.01.0032', 'Belanja Modal Bangunan Fasilitas Umum', 0),
(179, '5.2.03.01.01.0033', 'Belanja Modal Bangunan Parkir', 0),
(180, '5.2.03.01.01.0034', 'Belanja Modal Bangunan Gedung Pabrik', 0),
(181, '5.2.03.01.01.0035', 'Belanja Modal Bangunan Stasiun Bus', 0),
(182, '5.2.03.01.01.0037', 'Belanja Modal Bangunan Gedung Tempat Kerja Lainnya', 0),
(183, '5.2.03.01.02.0013', 'Belanja Modal Bangunan Gedung Tempat Tinggal Lainnya', 0),
(184, '5.2.03.02.01.0003', 'Belanja Modal Bangunan Peninggalan', 0),
(185, '5.2.03.03.01.0001', 'Belanja Modal Bangunan Menara Perambuan Penerangan Pantai', 0),
(186, '5.2.03.03.01.0002', 'Belanja Modal Bangunan Perambuan Penerangan Pantai', 0),
(187, '5.2.03.03.01.0003', 'Belanja Modal Bangunan Menara Telekomunikasi', 0),
(188, '5.2.03.03.01.0004', 'Belanja Modal Bangunan Menara Pengawas', 0),
(189, '5.2.03.03.01.0005', 'Belanja Modal Bangunan Menara Perambuan Lainnya', 0),
(190, '5.2.04.02.01.0001', 'Belanja Modal Bangunan Waduk Irigasi', 0),
(191, '5.2.04.02.01.0002', 'Belanja Modal Bangunan Pengambilan Irigasi', 0),
(192, '5.2.04.02.01.0003', 'Belanja Modal Bangunan Pembawa Irigasi', 0),
(193, '5.2.04.02.01.0004', 'Belanja Modal Bangunan Pembuang Irigasi', 0),
(194, '5.2.04.02.01.0005', 'Belanja Modal Bangunan Pengaman Irigasi', 0),
(195, '5.2.04.02.01.0006', 'Belanja Modal Bangunan Pelengkap Irigasi', 0),
(196, '5.2.04.02.01.0007', 'Belanja Modal Bangunan Sawah Irigasi', 0),
(197, '5.2.04.02.01.0008', 'Belanja Modal Bangunan Air Irigasi Lainnya', 0),
(198, '5.2.04.02.02.0001', 'Belanja Modal Bangunan Waduk Pasang Surut', 0),
(199, '5.2.04.02.02.0002', 'Belanja Modal Bangunan Pengambilan Pasang Surut', 0),
(200, '5.2.04.02.02.0003', 'Belanja Modal Bangunan Pembawa Pasang Surut', 0),
(201, '5.2.04.02.02.0005', 'Belanja Modal Bangunan Pengaman Pasang Surut', 0),
(202, '5.2.04.02.02.0006', 'Belanja Modal Bangunan Pelengkap Pasang Surut', 0),
(203, '5.2.04.02.02.0007', 'Belanja Modal Bangunan Sawah Pasang Surut', 0),
(204, '5.2.04.02.02.0008', 'Belanja Modal Bangunan Pengairan Pasang Surut Lainnya', 0),
(205, '5.2.04.02.03.0001', 'Belanja Modal Bangunan Waduk Pengembangan Rawa', 0),
(206, '5.2.04.02.03.0002', 'Belanja Modal Bangunan Pengambilan Pengembangan Rawa', 0),
(207, '5.2.04.02.03.0003', 'Belanja Modal Bangunan Pembawa Pengembangan Rawa', 0),
(208, '5.2.04.02.03.0004', 'Belanja Modal Bangunan Pembuang Pengembangan Rawa', 0),
(209, '5.2.04.02.03.0005', 'Belanja Modal Bangunan Pengaman Pengembangan Rawa', 0),
(210, '5.2.04.02.03.0006', 'Belanja Modal Bangunan Pelengkap Pengembangan Rawa', 0),
(211, '5.2.04.02.03.0007', 'Belanja Modal Bangunan Sawah Pengembangan Rawa', 0),
(212, '5.2.04.02.03.0008', 'Belanja Modal Bangunan Pengembangan Rawa dan Polder Lainnya', 0),
(213, '5.2.04.02.04.0001', 'Belanja Modal Bangunan Pengaman Sungai/Pantai dan\nPenanggulangan Bencana Alam', 0),
(214, '5.2.04.02.04.0002', 'Belanja Modal Bangunan Pengambilan Pengaman Sungai/Pantai', 0),
(215, '5.2.04.02.04.0003', 'Belanja Modal Bangunan Pembawa Pengaman Sungai/Pantai', 0),
(216, '5.2.04.02.04.0004', 'Belanja Modal Bangunan Pembuang Pengaman Sungai', 0),
(217, '5.2.04.02.04.0005', 'Belanja Modal Bangunan Pengaman Pengamanan Sungai/Pantai', 0),
(218, '5.2.04.02.04.0006', 'Belanja Modal Bangunan Pelengkap Pengaman Sungai', 0),
(219, '5.2.04.02.04.0007', 'Belanja Modal Bangunan Pengaman Sungai/Pantai dan\nPenanggulangan Bencana Alam Lainnya', 0),
(220, '5.2.04.02.05.0001', 'Belanja Modal Bangunan Waduk Pengembangan Sumber Air', 0),
(221, '5.2.04.02.05.0002', 'Belanja Modal Bangunan Pengambilan Pengembangan Sumber Air', 0),
(222, '5.2.04.02.05.0003', 'Belanja Modal Bangunan Pembawa Pengembangan Sumber Air', 0),
(223, '5.2.04.02.05.0004', 'Belanja Modal Bangunan Pembuang Pengembangan Sumber Air', 0),
(224, '5.2.04.02.05.0005', 'Belanja Modal Bangunan Pengaman Pengembangan Sumber Air', 0),
(225, '5.2.04.02.05.0006', 'Belanja Modal Bangunan Pelengkap Pengembangan Sumber Air', 0),
(226, '5.2.04.02.05.0007', 'Belanja Modal Bangunan Sawah Irigasi Air Tanah', 0),
(227, '5.2.04.02.05.0008', 'Belanja Modal Bangunan Pengembangan Sumber Air dan Air Tanah\nLainnya', 0),
(228, '5.2.04.02.06.0001', 'Belanja Modal Bangunan Waduk Air Bersih/Air Baku', 0),
(229, '5.2.04.02.06.0002', 'Belanja Modal Bangunan Pengambilan Air Bersih/Air Baku', 0),
(230, '5.2.04.02.06.0003', 'Belanja Modal Bangunan Pembawa Air Bersih/Air Baku', 0),
(231, '5.2.04.02.06.0004', 'Belanja Modal Bangunan Pembuang Air Bersih/Air Baku', 0),
(232, '5.2.04.02.06.0005', 'Belanja Modal Bangunan Pelengkap Air Bersih/Air Baku', 0),
(233, '5.2.04.02.06.0006', 'Belanja Modal Bangunan Air Bersih/Air Baku Lainnya', 0),
(234, '5.2.04.02.07.0001', 'Belanja Modal Bangunan Pembawa Air Kotor', 0),
(235, '5.2.04.02.07.0002', 'Belanja Modal Bangunan Waduk Air Kotor', 0),
(236, '5.2.04.02.07.0003', 'Belanja Modal Bangunan Pembuang Air Kotor', 0),
(237, '5.2.04.02.07.0004', 'Belanja Modal Bangunan Pengaman Air Kotor', 0),
(238, '5.2.04.02.07.0005', 'Belanja Modal Bangunan Pelengkap Air Kotor', 0),
(239, '5.2.04.02.07.0006', 'Belanja Modal Bangunan Air Kotor Lainnya', 0),
(240, '5.2.04.03.03.0003', 'Belanja Modal Bangunan Penampung Sampah', 0),
(241, '5.2.04.03.04.0001', 'Belanja Modal Instalasi Pengolahan Bahan Bangunan Percontohan', 0),
(242, '5.2.04.03.04.0002', 'Belanja Modal Instalasi Pengolahan Bahan Bangunan Perintis', 0),
(243, '5.2.04.03.04.0003', 'Belanja Modal Instalasi Pengolahan Bahan Bangunan Terapan', 0),
(244, '5.2.04.03.04.0004', 'Belanja Modal Instalasi Pengolahan Bahan Bangunan Lainnya', 0),
(245, 'Kode Pemutakhiran', 'Uraian Belanja Pemutakhiran', 0);

-- --------------------------------------------------------

--
-- Table structure for table `urusan`
--

CREATE TABLE `urusan` (
  `id_urusan` int(11) NOT NULL,
  `kodering_urusan` varchar(5) NOT NULL,
  `nama_urusan` varchar(150) NOT NULL,
  `isdeleted` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `urusan`
--

INSERT INTO `urusan` (`id_urusan`, `kodering_urusan`, `nama_urusan`, `isdeleted`) VALUES
(1, '1.02', 'URUSAN PEMERINTAHAN BIDANG KESEHATAN', 0);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id_user` int(11) NOT NULL,
  `unit_kerja` varchar(100) DEFAULT NULL,
  `username` varchar(30) DEFAULT NULL,
  `password` varchar(100) DEFAULT NULL,
  `role` varchar(20) DEFAULT NULL,
  `created_at` varchar(10) DEFAULT NULL,
  `modified_at` varchar(11) DEFAULT NULL,
  `delete_at` varchar(9) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id_user`, `unit_kerja`, `username`, `password`, `role`, `created_at`, `modified_at`, `delete_at`) VALUES
(1, 'ADMIN', 'admin', '14ddc4f201d03bd9ae10c9a3d5a606c6', 'Admin', '21/02/2021', '', ''),
(2, 'BAGIAN KEUANGAN & AKUNTANSI', 'opbagkeuangan', '827ccb0eea8a706c4c34a16891f84e7b', 'User', '22/02/2021', '', ''),
(3, 'BIDANG YANJANG', 'opbidyanjang', '827ccb0eea8a706c4c34a16891f84e7b', 'User', '22/02/2021', '', ''),
(4, 'BIDANG YANKEP', 'opbidyankep', '827ccb0eea8a706c4c34a16891f84e7b', 'User', '22/02/2021', '', ''),
(5, 'BIDANG YANMED', 'opbidyanmed', '827ccb0eea8a706c4c34a16891f84e7b', 'User', '22/02/2021', '', ''),
(6, 'IGD', 'opigd', '827ccb0eea8a706c4c34a16891f84e7b', 'User', '22/02/2021', '', ''),
(7, 'INSTALASI ELMED', 'opelmed', '827ccb0eea8a706c4c34a16891f84e7b', 'User', '22/02/2021', '', ''),
(8, 'INSTALASI FARMASI', 'opfarmasi', '827ccb0eea8a706c4c34a16891f84e7b', 'User', '22/02/2021', '', ''),
(9, 'INSTALASI GIZI', 'opgizi', '827ccb0eea8a706c4c34a16891f84e7b', 'User', '22/02/2021', '', ''),
(10, 'INSTALASI K3', 'opktiga', '827ccb0eea8a706c4c34a16891f84e7b', 'User', '22/02/2021', '', ''),
(11, 'INSTALASI KESLING', 'opkesling', '827ccb0eea8a706c4c34a16891f84e7b', 'User', '22/02/2021', '', ''),
(12, 'INSTALASI KESWAMAS', 'opkeswamas', '827ccb0eea8a706c4c34a16891f84e7b', 'User', '22/02/2021', '', ''),
(13, 'INSTALASI KESWARA', 'opkeswara', '827ccb0eea8a706c4c34a16891f84e7b', 'User', '22/02/2021', '', ''),
(14, 'INSTALASI LABORATORIUM', 'oplaboratorium', '827ccb0eea8a706c4c34a16891f84e7b', 'User', '22/02/2021', '', ''),
(15, 'INSTALASI LAUNDRY', 'oplaundry', '827ccb0eea8a706c4c34a16891f84e7b', 'User', '22/02/2021', '', ''),
(16, 'INSTALASI NAPZA', 'opnapza', '827ccb0eea8a706c4c34a16891f84e7b', 'User', '22/02/2021', '', ''),
(17, 'INSTALASI RADIOLOGI', 'opradiologi', '827ccb0eea8a706c4c34a16891f84e7b', 'User', '22/02/2021', '', ''),
(18, 'INSTALASI RAJAL', 'oprajal', '827ccb0eea8a706c4c34a16891f84e7b', 'User', '22/02/2021', '', ''),
(19, 'INSTALASI REHAB MEDIK', 'oprehabmedik', '827ccb0eea8a706c4c34a16891f84e7b', 'User', '22/02/2021', '', ''),
(20, 'INSTALASI REHAB MENTAL', 'oprehabmental', '827ccb0eea8a706c4c34a16891f84e7b', 'User', '22/02/2021', '', ''),
(21, 'INSTALASI RJI', 'oprji', '827ccb0eea8a706c4c34a16891f84e7b', 'User', '22/02/2021', '', ''),
(22, 'INSTALASI RM', 'oprekammedik', '827ccb0eea8a706c4c34a16891f84e7b', 'User', '22/02/2021', '', ''),
(23, 'INSTALASI SIMRS', 'opsimrs', '202cb962ac59075b964b07152d234b70', 'User', '22/02/2021', '', ''),
(24, 'IPSRS', 'opipsrs', '827ccb0eea8a706c4c34a16891f84e7b', 'User', '22/02/2021', '', ''),
(25, 'KLINIK GIGI', 'opklinikgigi', '827ccb0eea8a706c4c34a16891f84e7b', 'User', '22/02/2021', '', ''),
(26, 'PSIKOLOGI', 'oppsikologi', '827ccb0eea8a706c4c34a16891f84e7b', 'User', '22/02/2021', '', ''),
(27, 'RUANG CENDRAWASIH', 'opcendrawasih', '827ccb0eea8a706c4c34a16891f84e7b', 'User', '22/02/2021', '', ''),
(28, 'RUANG ELANG', 'opelang', '827ccb0eea8a706c4c34a16891f84e7b', 'User', '22/02/2021', '', ''),
(29, 'RUANG GARUDA', 'opgaruda', '827ccb0eea8a706c4c34a16891f84e7b', 'User', '22/02/2021', '', ''),
(30, 'RUANG GELATIK', 'opgelatik', '827ccb0eea8a706c4c34a16891f84e7b', 'User', '22/02/2021', '', ''),
(31, 'RUANG KESWARA', 'opkeswara', '827ccb0eea8a706c4c34a16891f84e7b', 'User', '22/02/2021', '', ''),
(32, 'RUANG MERAK', 'opmerak', '827ccb0eea8a706c4c34a16891f84e7b', 'User', '22/02/2021', '', ''),
(33, 'RUANG MERPATI', 'opmerpati', '827ccb0eea8a706c4c34a16891f84e7b', 'User', '22/02/2021', '', ''),
(34, 'RUANG NURI', 'opnuri', '827ccb0eea8a706c4c34a16891f84e7b', 'User', '22/02/2021', '', ''),
(35, 'RUANG PERKUTUT', 'opperkutut', '827ccb0eea8a706c4c34a16891f84e7b', 'User', '22/02/2021', '', ''),
(36, 'RUANG RAJAWALI', 'oprajawali', '827ccb0eea8a706c4c34a16891f84e7b', 'User', '22/02/2021', '', ''),
(37, 'SEKSI PENDAYAGUNAAN SAPRAS YANKEP', 'opsarprasyankep', '827ccb0eea8a706c4c34a16891f84e7b', 'User', '22/02/2021', '', ''),
(38, 'SEKSI PENDAYAGUNAAN SAPRAS YANMED', 'opsarprasyanmed', '827ccb0eea8a706c4c34a16891f84e7b', 'User', '22/02/2021', '', ''),
(39, 'SEKSI PENGEMBANGAN YANKEP', 'opspyankep', '827ccb0eea8a706c4c34a16891f84e7b', 'User', '22/02/2021', '', ''),
(40, 'SEKSI PENGEMBANGAN YANMED', 'opspyanmed', '827ccb0eea8a706c4c34a16891f84e7b', 'User', '22/02/2021', '', ''),
(41, 'SEKSI PENINGKATAN MUTU & KEROHANIAN', 'opmutukerohanian', '827ccb0eea8a706c4c34a16891f84e7b', 'User', '22/02/2021', '', ''),
(42, 'SEKSI YANJANG MEDIK & NON MEDIK', 'opmediknonmedik', '827ccb0eea8a706c4c34a16891f84e7b', 'User', '22/02/2021', '', ''),
(43, 'SUB BAGIAN AKUNTANSI & VERIFIKASI', 'opakuntansiverifikasi', '827ccb0eea8a706c4c34a16891f84e7b', 'User', '22/02/2021', '', ''),
(44, 'SUB BAGIAN KEPEGAWAIAN & PSDM', 'opkepegawaianpsdm', '827ccb0eea8a706c4c34a16891f84e7b', 'User', '22/02/2021', '', ''),
(45, 'SUB BAGIAN P3', 'opptiga', '827ccb0eea8a706c4c34a16891f84e7b', 'User', '22/02/2021', '', ''),
(46, 'SUB BAGIAN PMD', 'oprmd', '827ccb0eea8a706c4c34a16891f84e7b', 'User', '22/02/2021', '', ''),
(47, 'SUB BAGIAN RTP2', 'oprtpdua', '827ccb0eea8a706c4c34a16891f84e7b', 'User', '22/02/2021', '', ''),
(48, 'SUB BAGIAN TATA USAHA', 'optatausaha', '827ccb0eea8a706c4c34a16891f84e7b', 'User', '22/02/2021', '', ''),
(49, 'UNIT LAINNYA', 'opunitlain', '827ccb0eea8a706c4c34a16891f84e7b', 'User', '22/02/2021', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `users_old`
--

CREATE TABLE `users_old` (
  `id_user` int(11) NOT NULL,
  `created_at` datetime DEFAULT NULL,
  `modified_at` datetime DEFAULT NULL,
  `deleted_at` datetime DEFAULT NULL,
  `nip` varchar(32) COLLATE utf8_unicode_ci NOT NULL,
  `unit_kerja` varchar(60) COLLATE utf8_unicode_ci NOT NULL,
  `role` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(64) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `users_old`
--

INSERT INTO `users_old` (`id_user`, `created_at`, `modified_at`, `deleted_at`, `nip`, `unit_kerja`, `role`, `password`, `email`) VALUES
(1, NULL, NULL, NULL, '123456789', 'Sekretariat', 'Admin', '827ccb0eea8a706c4c34a16891f84e7b', 'sekretariat.rsj@jabarprov.go.id'),
(2, NULL, NULL, NULL, '12345678910', 'simrs', 'user', '827ccb0eea8a706c4c34a16891f84e7b', 'simrs.rsj@jabarprov.go.id'),
(3, NULL, NULL, NULL, 'Admin', 'Admin', 'Admin', '14ddc4f201d03bd9ae10c9a3d5a606c6', 'admin@gmail.com'),
(4, NULL, NULL, NULL, '', 'rekammedik', 'User', '202cb962ac59075b964b07152d234b70', 'rekammedik@rsj.go.id\r\n');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `detail_pemeliharaan`
--
ALTER TABLE `detail_pemeliharaan`
  ADD PRIMARY KEY (`id_detail_pemeliharaan`);

--
-- Indexes for table `detail_pengadaan`
--
ALTER TABLE `detail_pengadaan`
  ADD PRIMARY KEY (`id_detail_pengadaan`);

--
-- Indexes for table `head_pemeliharaan`
--
ALTER TABLE `head_pemeliharaan`
  ADD PRIMARY KEY (`id_pemeliharaan`);

--
-- Indexes for table `head_pengadaan`
--
ALTER TABLE `head_pengadaan`
  ADD PRIMARY KEY (`id_pengadaan`);

--
-- Indexes for table `kegiatan`
--
ALTER TABLE `kegiatan`
  ADD PRIMARY KEY (`id_kegiatan`);

--
-- Indexes for table `pd`
--
ALTER TABLE `pd`
  ADD PRIMARY KEY (`id_pd`);

--
-- Indexes for table `program`
--
ALTER TABLE `program`
  ADD PRIMARY KEY (`id_program`);

--
-- Indexes for table `subkegiatan`
--
ALTER TABLE `subkegiatan`
  ADD PRIMARY KEY (`id_subkegiatan`);

--
-- Indexes for table `temp_pemeliharaan`
--
ALTER TABLE `temp_pemeliharaan`
  ADD PRIMARY KEY (`id_temp_pemeliharaan`);

--
-- Indexes for table `temp_pengadaan`
--
ALTER TABLE `temp_pengadaan`
  ADD PRIMARY KEY (`id_temp_pengadaan`);

--
-- Indexes for table `uraian`
--
ALTER TABLE `uraian`
  ADD PRIMARY KEY (`id_uraian`);

--
-- Indexes for table `urusan`
--
ALTER TABLE `urusan`
  ADD PRIMARY KEY (`id_urusan`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id_user`);

--
-- Indexes for table `users_old`
--
ALTER TABLE `users_old`
  ADD PRIMARY KEY (`id_user`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `detail_pemeliharaan`
--
ALTER TABLE `detail_pemeliharaan`
  MODIFY `id_detail_pemeliharaan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;
--
-- AUTO_INCREMENT for table `detail_pengadaan`
--
ALTER TABLE `detail_pengadaan`
  MODIFY `id_detail_pengadaan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;
--
-- AUTO_INCREMENT for table `head_pemeliharaan`
--
ALTER TABLE `head_pemeliharaan`
  MODIFY `id_pemeliharaan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `head_pengadaan`
--
ALTER TABLE `head_pengadaan`
  MODIFY `id_pengadaan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `kegiatan`
--
ALTER TABLE `kegiatan`
  MODIFY `id_kegiatan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
--
-- AUTO_INCREMENT for table `pd`
--
ALTER TABLE `pd`
  MODIFY `id_pd` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `program`
--
ALTER TABLE `program`
  MODIFY `id_program` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `subkegiatan`
--
ALTER TABLE `subkegiatan`
  MODIFY `id_subkegiatan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;
--
-- AUTO_INCREMENT for table `temp_pemeliharaan`
--
ALTER TABLE `temp_pemeliharaan`
  MODIFY `id_temp_pemeliharaan` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `temp_pengadaan`
--
ALTER TABLE `temp_pengadaan`
  MODIFY `id_temp_pengadaan` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `uraian`
--
ALTER TABLE `uraian`
  MODIFY `id_uraian` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=246;
--
-- AUTO_INCREMENT for table `urusan`
--
ALTER TABLE `urusan`
  MODIFY `id_urusan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=50;
--
-- AUTO_INCREMENT for table `users_old`
--
ALTER TABLE `users_old`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
