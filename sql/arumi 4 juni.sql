-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 04, 2020 at 08:57 AM
-- Server version: 10.4.11-MariaDB
-- PHP Version: 7.4.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `arumi`
--

-- --------------------------------------------------------

--
-- Table structure for table `akun`
--

CREATE TABLE `akun` (
  `id_akun` int(11) NOT NULL,
  `nama` text NOT NULL,
  `no_wa` text NOT NULL,
  `level` text NOT NULL,
  `foto` text NOT NULL,
  `username` text NOT NULL,
  `password` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `akun`
--

INSERT INTO `akun` (`id_akun`, `nama`, `no_wa`, `level`, `foto`, `username`, `password`) VALUES
(1, 'Amrina Rosada', '628889391230', 'Owner', '', '_rinyus', '12345'),
(2, 'Fitriani Adela', '6282388138085', 'Produksi', '', 'fitrianiadela1', '12345'),
(3, 'Lutfian Nurcholiq', '6281318681537', 'Karyawan', '', 'lutfian.n', '12345');

-- --------------------------------------------------------

--
-- Table structure for table `bahan`
--

CREATE TABLE `bahan` (
  `id_bahan` int(11) NOT NULL,
  `kode_bahan` text NOT NULL,
  `nama_bahan` text NOT NULL,
  `satuan` text NOT NULL,
  `harga` int(11) NOT NULL,
  `keterangan` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `bahan`
--

INSERT INTO `bahan` (`id_bahan`, `kode_bahan`, `nama_bahan`, `satuan`, `harga`, `keterangan`) VALUES
(1, 'BHN', 'Tepung Terigu', 'gram', 11, 'Bahan Baku'),
(2, 'BHN', 'Telur', 'Butir', 1500, 'Bahan Baku'),
(3, 'BHN', 'Mentega', 'Bungkus', 8000, 'Bahan Baku'),
(4, 'BHN', 'Gula pasir', 'gram', 12, 'Bahan Baku'),
(5, 'BHN', 'Susu bubuk', 'Bungkus', 4000, 'Bahan Baku'),
(6, 'BHN', 'Fermipan', 'gram', 400, 'Bahan Baku'),
(7, 'BHN', 'Garam', 'gram', 16, 'Bahan Baku'),
(8, 'BHN', 'Minyak sayur', 'gram', 12, 'Bahan Baku'),
(9, 'BHN', 'Keju mozarella', 'Bungkus', 13600, 'Bahan Penolong'),
(10, 'BHN', 'Sosis', 'Bungkus', 10000, 'Bahan Penolong'),
(11, 'BHN', 'Coklat Compund', 'gram', 45, 'Bahan Baku'),
(12, 'BHN', 'Coklat bubuk', 'gram', 120, 'Bahan Baku'),
(13, 'BHN', 'Susu cair', 'ml', 17, 'Bahan Baku'),
(14, 'BHN', 'Baking powder', 'gram', 120, 'Bahan Baku'),
(15, 'BHN', 'Sp', 'gram', 266, 'Bahan Baku'),
(16, 'BHN', 'Misses', 'Bungkus', 10000, 'Bahan Penolong'),
(17, 'BHN', 'Keju', 'Bungkus', 15000, 'Bahan Penolong'),
(18, 'BHN', 'Paprika', 'Buah', 14000, 'Bahan Penolong'),
(19, 'BHN', 'Jamur kancing', 'Bungkus', 12000, 'Bahan Penolong'),
(20, 'BHN', 'Selai strawberry', 'Bungkus', 11000, 'Bahan Penolong'),
(21, 'BHN', 'Selai coklat ', 'Bungkus', 11000, 'Bahan Penolong'),
(22, 'BHN', 'Selai durian', 'Bungkus', 7500, 'Bahan Penolong');

-- --------------------------------------------------------

--
-- Table structure for table `biaya`
--

CREATE TABLE `biaya` (
  `id_biaya` int(11) NOT NULL,
  `kode_coa` text NOT NULL,
  `nama_biaya` text NOT NULL,
  `keterangan` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `biaya`
--

INSERT INTO `biaya` (`id_biaya`, `kode_coa`, `nama_biaya`, `keterangan`) VALUES
(1, '511', 'Biaya Operasional', 'Bayar biaya iklan'),
(2, '512', 'Biaya Operasional', 'Pembayaran pulsa telepon atau kuota internet'),
(3, '513', 'Biaya Operasional', 'Pembayaran listrik'),
(4, '515', 'Biaya Administrasi & Umum', 'Pembayaran gaji ke penjaga toko'),
(5, '514', 'Biaya Administrasi & Umum', 'Pembayaran sewa toko/ruko'),
(6, '517', 'Biaya Produksi', 'Pembayaran biaya tenaga kerja (produksi)'),
(7, '531', 'Biaya Produksi', 'Biaya Produksi'),
(8, '532', 'Biaya Produksi', 'Biaya produksi'),
(9, '533', 'Biaya Produksi', 'Biaya Produksi');

-- --------------------------------------------------------

--
-- Table structure for table `bom`
--

CREATE TABLE `bom` (
  `no` int(11) NOT NULL,
  `pesanan_id` int(11) NOT NULL,
  `produksi_id` int(11) NOT NULL,
  `produk_id` int(11) NOT NULL,
  `bahan_id` int(11) NOT NULL,
  `jumlah` int(11) NOT NULL,
  `harga` int(11) NOT NULL,
  `subtotal` int(11) NOT NULL,
  `status` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `bom`
--

INSERT INTO `bom` (`no`, `pesanan_id`, `produksi_id`, `produk_id`, `bahan_id`, `jumlah`, `harga`, `subtotal`, `status`) VALUES
(1, 1, 1, 5, 1, 1000, 11, 11000, 'Sudah Dibeli'),
(2, 1, 1, 5, 5, 2, 4000, 8000, 'Sudah Dibeli'),
(3, 1, 1, 5, 4, 200, 12, 2400, 'Sudah Dibeli'),
(4, 1, 1, 5, 6, 22, 400, 8800, 'Sudah Dibeli'),
(5, 1, 1, 5, 3, 2, 8000, 16000, 'Sudah Dibeli'),
(6, 1, 1, 5, 7, 20, 16, 320, 'Sudah Dibeli'),
(7, 1, 1, 5, 2, 8, 1500, 12000, 'Sudah Dibeli'),
(8, 3, 2, 1, 1, 500, 11, 5500, 'Sudah Dibeli'),
(9, 3, 2, 1, 6, 5, 400, 2000, 'Sudah Dibeli'),
(10, 3, 2, 1, 8, 200, 12, 2400, 'Sudah Dibeli');

-- --------------------------------------------------------

--
-- Table structure for table `coa`
--

CREATE TABLE `coa` (
  `id_coa` int(11) NOT NULL,
  `kode_coa` text NOT NULL,
  `nama_coa` text NOT NULL,
  `header_coa` varchar(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `coa`
--

INSERT INTO `coa` (`id_coa`, `kode_coa`, `nama_coa`, `header_coa`) VALUES
(1, '111', 'Kas', '1'),
(2, '112', 'Piutang', '1'),
(3, '211', 'Utang', '2'),
(4, '511', 'Beban  iklan', '5'),
(5, '512', 'Beban telepon', '5'),
(6, '513', 'Beban air', '5'),
(7, '514', 'Beban sewa gedung', '5'),
(8, '515', 'Biaya gaji dan upah', '5'),
(9, '516', 'BOP yang dibebankan', '5'),
(10, '113', 'Persediaan Bahan Baku', '1'),
(11, '531', 'Barang dalam proses-BBB', '5'),
(12, '532', 'Barang dalam proses-BTK', '5'),
(13, '411', 'Pendapatan', '4'),
(14, '517', 'Biaya Tenaga Kerja BTK', '5'),
(15, '311', 'Modal', '3'),
(16, '312', 'Prive', '3'),
(17, '501', 'Harga Pokok Penjualan', '5'),
(18, '533', 'Barang dalam proses-BOP', '5'),
(19, '114', 'Persediaan Bahan Penolong', '1'),
(20, '102', 'Persediaan Barang Dagang', '1'),
(21, '122', 'Peralatan', '1'),
(22, '412', 'Pendapatan Alih Produksi', '4'),
(23, '900', 'Tes Coba', '9');

-- --------------------------------------------------------

--
-- Table structure for table `detail_bb`
--

CREATE TABLE `detail_bb` (
  `no` int(11) NOT NULL,
  `produk_id` int(11) NOT NULL,
  `bahan_id` int(11) NOT NULL,
  `jumlah` int(11) NOT NULL,
  `subtotal` int(11) NOT NULL,
  `harga` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `detail_bb`
--

INSERT INTO `detail_bb` (`no`, `produk_id`, `bahan_id`, `jumlah`, `subtotal`, `harga`) VALUES
(1, 1, 1, 500, 5500, 11),
(2, 1, 6, 5, 2000, 400),
(3, 1, 8, 200, 2400, 12),
(4, 2, 1, 200, 2200, 11),
(5, 2, 11, 300, 13500, 45),
(6, 2, 12, 75, 9000, 120),
(8, 2, 4, 250, 3000, 12),
(9, 2, 3, 1, 8000, 8000),
(10, 2, 2, 6, 9000, 1500),
(11, 2, 14, 10, 1200, 120),
(12, 3, 2, 4, 6000, 1500),
(13, 3, 4, 150, 1800, 12),
(14, 3, 15, 4, 1064, 266),
(15, 3, 11, 60, 2700, 45),
(16, 3, 3, 1, 8000, 8000),
(17, 3, 8, 46, 552, 12),
(18, 4, 1, 100, 1100, 11),
(20, 4, 7, 10, 160, 16),
(21, 4, 2, 1, 1500, 1500),
(22, 4, 3, 1, 8000, 8000),
(23, 5, 1, 500, 5500, 11),
(24, 5, 5, 1, 4000, 4000),
(25, 5, 4, 100, 1200, 12),
(26, 5, 6, 11, 4400, 400),
(27, 5, 3, 1, 8000, 8000),
(28, 5, 7, 10, 160, 16),
(29, 5, 2, 4, 6000, 1500),
(30, 2, 13, 200, 3400, 17),
(31, 4, 13, 250, 4250, 17);

-- --------------------------------------------------------

--
-- Table structure for table `detail_bp`
--

CREATE TABLE `detail_bp` (
  `no` int(11) NOT NULL,
  `produksi_id` int(11) NOT NULL,
  `bahan_id` int(11) NOT NULL,
  `jumlah` int(11) NOT NULL,
  `subtotal` int(11) NOT NULL,
  `harga` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `detail_bp`
--

INSERT INTO `detail_bp` (`no`, `produksi_id`, `bahan_id`, `jumlah`, `subtotal`, `harga`) VALUES
(1, 2, 9, 1, 13600, 13600);

-- --------------------------------------------------------

--
-- Table structure for table `detail_btkl`
--

CREATE TABLE `detail_btkl` (
  `no` int(11) NOT NULL,
  `produksi_id` int(11) NOT NULL,
  `karyawan_id` int(11) NOT NULL,
  `hari_masuk` int(11) NOT NULL,
  `gaji` int(11) NOT NULL,
  `subgaji` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `detail_btkl`
--

INSERT INTO `detail_btkl` (`no`, `produksi_id`, `karyawan_id`, `hari_masuk`, `gaji`, `subgaji`) VALUES
(1, 1, 1, 2, 55000, 110000),
(2, 1, 2, 2, 75000, 150000),
(3, 2, 2, 1, 75000, 75000),
(4, 2, 3, 1, 70000, 70000);

-- --------------------------------------------------------

--
-- Table structure for table `detail_operasional`
--

CREATE TABLE `detail_operasional` (
  `no` int(11) NOT NULL,
  `operasional_id` int(11) NOT NULL,
  `coa_id` int(11) NOT NULL,
  `tanggal` date NOT NULL,
  `nominal` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `detail_pesanan`
--

CREATE TABLE `detail_pesanan` (
  `pesanan_id` int(11) NOT NULL,
  `produk_id` int(11) NOT NULL,
  `pelanggan_id` int(11) NOT NULL,
  `harga` int(11) NOT NULL,
  `jumlah` int(11) NOT NULL,
  `subtotal` int(11) NOT NULL,
  `rasa_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `detail_pesanan`
--

INSERT INTO `detail_pesanan` (`pesanan_id`, `produk_id`, `pelanggan_id`, `harga`, `jumlah`, `subtotal`, `rasa_id`) VALUES
(1, 5, 3, 40000, 2, 80000, 16),
(2, 3, 2, 72000, 1, 72000, 2),
(3, 1, 1, 75000, 1, 75000, 0);

-- --------------------------------------------------------

--
-- Table structure for table `detail_rasa`
--

CREATE TABLE `detail_rasa` (
  `no` int(11) NOT NULL,
  `rasa_id` int(11) NOT NULL,
  `bahan_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `detail_rasa`
--

INSERT INTO `detail_rasa` (`no`, `rasa_id`, `bahan_id`) VALUES
(1, 1, 30),
(2, 1, 19);

-- --------------------------------------------------------

--
-- Table structure for table `detail_transaksi_peralatan`
--

CREATE TABLE `detail_transaksi_peralatan` (
  `no` int(11) NOT NULL,
  `transaksi_id` int(11) NOT NULL,
  `peralatan_id` int(11) NOT NULL,
  `tanggal` date NOT NULL,
  `nominal` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `jurnal`
--

CREATE TABLE `jurnal` (
  `no` int(11) NOT NULL,
  `transaksi_id` int(11) NOT NULL,
  `coa_id` text NOT NULL,
  `tanggal` date NOT NULL,
  `posisi` text NOT NULL,
  `nominal` int(11) NOT NULL,
  `user` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `jurnal`
--

INSERT INTO `jurnal` (`no`, `transaksi_id`, `coa_id`, `tanggal`, `posisi`, `nominal`, `user`) VALUES
(1, 1, '111', '2020-06-03', 'Debit', 80000, 'lutfi'),
(2, 1, '411', '2020-06-03', 'Kredit', 80000, 'lutfi'),
(3, 1, '113', '2020-06-03', 'Debit', 58520, 'adel'),
(4, 1, '111', '2020-06-03', 'Kredit', 58520, 'adel'),
(5, 1, '531', '2020-06-03', 'Debit', 58520, 'adel'),
(6, 1, '113', '2020-06-03', 'Kredit', 58520, 'adel'),
(7, 1, '532', '2020-06-03', 'Debit', 260000, 'adel'),
(8, 1, '515', '2020-06-03', 'Kredit', 260000, 'adel'),
(9, 1, '533', '2020-06-03', 'Debit', 78000, 'adel'),
(10, 1, '516', '2020-06-03', 'Kredit', 78000, 'adel'),
(11, 1, '501', '2020-06-03', 'Debit', 90000, 'rina'),
(12, 1, '102', '2020-06-03', 'Kredit', 90000, 'rina'),
(13, 2, '111', '2020-06-03', 'Debit', 72000, 'lutfi'),
(14, 2, '411', '2020-06-03', 'Kredit', 72000, 'lutfi'),
(15, 2, '412', '2020-06-03', 'Debit', 7200, 'adel'),
(16, 2, '111', '2020-06-03', 'Kredit', 7200, 'adel'),
(17, 3, '111', '2020-06-03', 'Debit', 75000, 'lutfi'),
(18, 3, '411', '2020-06-03', 'Kredit', 75000, 'lutfi'),
(19, 2, '113', '2020-06-03', 'Debit', 9900, 'adel'),
(20, 2, '111', '2020-06-03', 'Kredit', 9900, 'adel'),
(21, 2, '531', '2020-06-03', 'Debit', 9900, 'adel'),
(22, 2, '113', '2020-06-03', 'Kredit', 9900, 'adel'),
(23, 2, '532', '2020-06-03', 'Debit', 145000, 'adel'),
(24, 2, '515', '2020-06-03', 'Kredit', 145000, 'adel'),
(25, 2, '533', '2020-06-03', 'Debit', 43500, 'adel'),
(26, 2, '516', '2020-06-03', 'Kredit', 43500, 'adel'),
(27, 2, '114', '2020-06-03', 'Debit', 13600, 'adel'),
(28, 2, '111', '2020-06-03', 'Kredit', 13600, 'adel');

-- --------------------------------------------------------

--
-- Table structure for table `karyawan`
--

CREATE TABLE `karyawan` (
  `id_karyawan` int(11) NOT NULL,
  `kode_karyawan` text NOT NULL,
  `nama_karyawan` text NOT NULL,
  `no_wa` text NOT NULL,
  `alamat` text NOT NULL,
  `gaji` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `karyawan`
--

INSERT INTO `karyawan` (`id_karyawan`, `kode_karyawan`, `nama_karyawan`, `no_wa`, `alamat`, `gaji`) VALUES
(1, 'EMP', 'Anya Geraldine', '6282257036041', 'Jalan Belimbing no 27 Cimahi', 55000),
(2, 'EMP', 'Riva Nabila', '6287830661966', 'Jl. Lontar Surabaya Wetan', 75000),
(3, 'EMP', 'Laras Permata Sari', '6287830661966', 'Jl. Halim Perdana Kusuma Sidoarjo', 70000);

-- --------------------------------------------------------

--
-- Table structure for table `komunitas`
--

CREATE TABLE `komunitas` (
  `id_komunitas` int(11) NOT NULL,
  `kode_komunitas` text NOT NULL,
  `nama_komunitas` text NOT NULL,
  `no_wa` text NOT NULL,
  `alamat` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `komunitas`
--

INSERT INTO `komunitas` (`id_komunitas`, `kode_komunitas`, `nama_komunitas`, `no_wa`, `alamat`) VALUES
(1, 'CMTY', 'Toko Sidodadi', '6287830661966', 'Jl. Batununggal Indah Raya No.164, Batununggal, Kec. Bandung Kidul, Kota Bandung, Jawa Barat 40265'),
(2, 'CMTY', 'Mayora Indah', '6285963092874', 'Perumahan Taloon Permai Blok K Kamal, Bangkalan');

-- --------------------------------------------------------

--
-- Table structure for table `modal`
--

CREATE TABLE `modal` (
  `id_modal` int(11) NOT NULL,
  `nominal` int(11) NOT NULL,
  `tanggal` date NOT NULL,
  `keterangan` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `operasional`
--

CREATE TABLE `operasional` (
  `id_operasional` int(11) NOT NULL,
  `kode_operasional` text NOT NULL,
  `total` int(11) NOT NULL,
  `tanggal` date NOT NULL,
  `keterangan` text NOT NULL,
  `status` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `operasional`
--

INSERT INTO `operasional` (`id_operasional`, `kode_operasional`, `total`, `tanggal`, `keterangan`, `status`) VALUES
(1, 'OP', 0, '2020-06-02', 'tes', 'Baru Dibuat');

-- --------------------------------------------------------

--
-- Table structure for table `pelanggan`
--

CREATE TABLE `pelanggan` (
  `id_pelanggan` int(11) NOT NULL,
  `kode_pelanggan` text NOT NULL,
  `nama_pelanggan` text NOT NULL,
  `no_wa` text NOT NULL,
  `alamat` text NOT NULL,
  `username` text NOT NULL,
  `password` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pelanggan`
--

INSERT INTO `pelanggan` (`id_pelanggan`, `kode_pelanggan`, `nama_pelanggan`, `no_wa`, `alamat`, `username`, `password`) VALUES
(1, 'Arumi', 'Akbar Isto', '6287830661966', 'Jalan Maluku', 'akbaristo', '12345'),
(2, 'Arumi', 'Putu Ayu', '6287830661966', 'Jalan Denpasar Bali', 'putuayu', '12345'),
(3, 'Arumi', 'Kurosaki Ichigo', '628889391230', 'Jl. Trunojoyo Surabaya', 'ichigo', '12345');

-- --------------------------------------------------------

--
-- Table structure for table `peralatan`
--

CREATE TABLE `peralatan` (
  `id_peralatan` int(11) NOT NULL,
  `kode_peralatan` text NOT NULL,
  `nama_peralatan` text NOT NULL,
  `harga` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `peralatan`
--

INSERT INTO `peralatan` (`id_peralatan`, `kode_peralatan`, `nama_peralatan`, `harga`) VALUES
(1, 'PLTN', 'Sapu', 15000),
(2, 'PLTN', 'Oven', 150000),
(3, 'PLTN', 'Mixer', 80000);

-- --------------------------------------------------------

--
-- Table structure for table `pesanan`
--

CREATE TABLE `pesanan` (
  `id_pesanan` int(11) NOT NULL,
  `kode_pesanan` text NOT NULL,
  `pelanggan_id` int(11) NOT NULL,
  `tanggal` date NOT NULL,
  `total` int(11) NOT NULL,
  `status` text NOT NULL,
  `foto` text NOT NULL,
  `komunitas_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pesanan`
--

INSERT INTO `pesanan` (`id_pesanan`, `kode_pesanan`, `pelanggan_id`, `tanggal`, `total`, `status`, `foto`, `komunitas_id`) VALUES
(1, 'PSN', 3, '2020-06-03', 80000, 'Sudah Jadi', 'rest-api.PNG', 0),
(2, 'PSN', 2, '2020-06-03', 72000, 'Sudah Jadi', 'rest-api.PNG', 2),
(3, 'PSN', 1, '2020-06-03', 75000, 'Sudah Jadi', 'work_from_home.jpg', 0);

-- --------------------------------------------------------

--
-- Table structure for table `prive`
--

CREATE TABLE `prive` (
  `id_prive` int(11) NOT NULL,
  `nominal` int(11) NOT NULL,
  `tanggal` date NOT NULL,
  `keterangan` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `produk`
--

CREATE TABLE `produk` (
  `id_produk` int(11) NOT NULL,
  `kode_produk` text NOT NULL,
  `nama_produk` text NOT NULL,
  `satuan` text NOT NULL,
  `harga` int(11) NOT NULL,
  `min` int(11) NOT NULL,
  `max` int(11) NOT NULL,
  `deskripsi` text NOT NULL,
  `foto` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `produk`
--

INSERT INTO `produk` (`id_produk`, `kode_produk`, `nama_produk`, `satuan`, `harga`, `min`, `max`, `deskripsi`, `foto`) VALUES
(1, 'Cookie', 'Pizza', 'pcs', 75000, 1, 10, 'Saat digigit, adonan klapertart yang dingin akan terasa seperti menggigit adonan hunkwe atau agar-agar santan, namun lebih lembut dan manis. Taburan kismis yang asam menjadi ‘misteri’ tersendiri untuk tuan lidah, karena bertemu dengan rasa manis potongan kelapa muda panggang.', 'product-img/pizza.jpg'),
(2, 'Cookie', 'Brownies', 'pcs', 20000, 5, 10, 'Saat digigit, adonan klapertart yang dingin akan terasa seperti menggigit adonan hunkwe atau agar-agar santan, namun lebih lembut dan manis. Taburan kismis yang asam menjadi ‘misteri’ tersendiri untuk tuan lidah, karena bertemu dengan rasa manis potongan kelapa muda panggang.', 'product-img/brownies.jpg'),
(3, 'Cookie', 'Birthday Cake', 'pcs', 50000, 1, 10, 'Saat digigit, adonan klapertart yang dingin akan terasa seperti menggigit adonan hunkwe atau agar-agar santan, namun lebih lembut dan manis. Taburan kismis yang asam menjadi ‘misteri’ tersendiri untuk tuan lidah, karena bertemu dengan rasa manis potongan kelapa muda panggang.', 'product-img/birthday-cake01.jpg'),
(4, 'Cookie', 'Pancake', 'pcs', 4500, 6, 10, 'Saat digigit, adonan klapertart yang dingin akan terasa seperti menggigit adonan hunkwe atau agar-agar santan, namun lebih lembut dan manis. Taburan kismis yang asam menjadi ‘misteri’ tersendiri untuk tuan lidah, karena bertemu dengan rasa manis potongan kelapa muda panggang.', 'product-img/pancake.jpg'),
(5, 'Cookie', 'Donat', 'pcs', 15000, 2, 30, 'Saat digigit, adonan klapertart yang dingin akan terasa seperti menggigit adonan hunkwe atau agar-agar santan, namun lebih lembut dan manis. Taburan kismis yang asam menjadi ‘misteri’ tersendiri untuk tuan lidah, karena bertemu dengan rasa manis potongan kelapa muda panggang.', 'product-img/donut-strawberry.jpg'),
(6, 'Cookie', 'Pie', 'pcs', 120000, 1, 4, 'Saat digigit, adonan klapertart yang dingin akan terasa seperti menggigit adonan hunkwe atau agar-agar santan, namun lebih lembut dan manis. Taburan kismis yang asam menjadi ‘misteri’ tersendiri untuk tuan lidah, karena bertemu dengan rasa manis potongan kelapa muda panggang.', 'product-img/apple-pie.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `produksi`
--

CREATE TABLE `produksi` (
  `id_produksi` int(11) NOT NULL,
  `kode_produksi` text NOT NULL,
  `pesanan_id` int(11) NOT NULL,
  `pelanggan_id` int(11) NOT NULL,
  `mulai` date NOT NULL,
  `selesai` date NOT NULL,
  `status` text NOT NULL,
  `bahan_baku` int(11) NOT NULL,
  `tenaga_kerja` int(11) NOT NULL,
  `bahan_penolong` int(11) NOT NULL,
  `oh` int(11) NOT NULL,
  `hpp` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `produksi`
--

INSERT INTO `produksi` (`id_produksi`, `kode_produksi`, `pesanan_id`, `pelanggan_id`, `mulai`, `selesai`, `status`, `bahan_baku`, `tenaga_kerja`, `bahan_penolong`, `oh`, `hpp`) VALUES
(1, 'Produksi', 1, 3, '2020-06-03', '2020-06-03', 'Sudah Jadi', 58520, 260000, 0, 78000, 'Sudah Input HPP'),
(2, 'Produksi', 3, 1, '2020-06-03', '2020-06-03', 'Sudah Jadi', 9900, 145000, 13600, 43500, '');

-- --------------------------------------------------------

--
-- Table structure for table `produk_rasa`
--

CREATE TABLE `produk_rasa` (
  `no` int(11) NOT NULL,
  `produk_id` int(11) NOT NULL,
  `rasa_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `produk_rasa`
--

INSERT INTO `produk_rasa` (`no`, `produk_id`, `rasa_id`) VALUES
(1, 1, 0),
(2, 1, 1),
(3, 1, 9),
(4, 1, 10),
(5, 1, 8),
(9, 2, 0),
(10, 2, 4),
(11, 2, 5),
(12, 2, 6),
(13, 3, 0),
(14, 3, 2),
(15, 4, 0),
(16, 4, 16),
(17, 5, 0),
(18, 5, 16),
(19, 5, 14),
(20, 6, 0),
(21, 6, 14);

-- --------------------------------------------------------

--
-- Table structure for table `rasa`
--

CREATE TABLE `rasa` (
  `id_rasa` int(11) NOT NULL,
  `rasa` text NOT NULL,
  `harga_rasa` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `rasa`
--

INSERT INTO `rasa` (`id_rasa`, `rasa`, `harga_rasa`) VALUES
(0, 'Original', 0),
(1, 'Barbeque', 28000),
(2, 'Black Forest', 22000),
(3, 'Tiramisu', 25000),
(4, 'Cheese Cake', 25000),
(5, 'Red Velvet Cake', 25000),
(6, 'Ice Cream Cake', 25000),
(7, 'Black Pepper Chicken', 25000),
(8, 'Black Pepper Beef', 25000),
(9, 'Cheeseburger Pizza', 25000),
(10, 'Chicken Lovers', 25000),
(11, 'Pepperoni', 25000),
(12, 'Super Supreme', 25000),
(13, 'Meet Lover', 25000),
(14, 'Heaven Berry', 25000),
(15, 'Black Jack', 25000),
(16, 'Coco Loco', 25000),
(17, 'Glazzy', 25000);

-- --------------------------------------------------------

--
-- Table structure for table `timeline`
--

CREATE TABLE `timeline` (
  `no` int(11) NOT NULL,
  `pesanan_id` int(11) NOT NULL,
  `kode_pesanan` text NOT NULL,
  `tanggal` date NOT NULL,
  `jam` time NOT NULL,
  `keterangan` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `timeline`
--

INSERT INTO `timeline` (`no`, `pesanan_id`, `kode_pesanan`, `tanggal`, `jam`, `keterangan`) VALUES
(1, 1, 'PSN', '2020-06-03', '21:41:19', 'Menunggu konfirmasi Owner untuk mengecek nota pembayaran.'),
(2, 1, 'PSN', '2020-06-03', '21:41:39', 'Pesanan telah di ACC oleh Owner dan sekarang tinggal menunggu approval user Produksi.'),
(3, 1, 'PSN', '2020-06-03', '21:44:17', 'Pesanan sudah di Acc user Produksi.'),
(4, 1, 'PSN', '2020-06-03', '21:44:17', 'Pesanan sedang di Tahap Pertama beli bahan.'),
(5, 1, 'PSN', '2020-06-03', '22:23:48', 'User Produksi sudah melakukan Tahap Pertama.'),
(6, 1, 'PSN', '2020-06-03', '22:23:48', 'Pesanan sedang di Tahap Kedua.'),
(7, 1, 'PSN', '2020-06-03', '22:59:30', 'User Produksi sudah melakukan Tahap Kedua.'),
(8, 1, 'PSN', '2020-06-03', '22:59:30', 'Pesanan sedang di Tahap Ketiga (memilih bahan penolong).'),
(9, 1, 'PSN', '2020-06-03', '23:02:44', 'User Produksi sudah menyelesaikan Tahap Ketiga.'),
(10, 1, 'PSN', '2020-06-03', '23:02:44', 'Pesanan siap diantar.'),
(11, 2, 'PSN', '2020-06-03', '23:17:05', 'Menunggu konfirmasi Owner untuk mengecek nota pembayaran.'),
(12, 2, 'PSN', '2020-06-03', '23:22:41', 'Pesanan telah di ACC oleh Owner dan sekarang tinggal menunggu approval user Produksi.'),
(13, 2, 'PSN', '2020-06-03', '23:26:20', 'Pesanan sudah di Acc user Produksi.'),
(14, 2, 'PSN', '2020-06-03', '23:26:20', 'Pesanan ditawarkan ke komunitas.'),
(15, 2, 'PSN', '2020-06-03', '18:29:13', 'User Produksi sudah menerima produk dari komunitas.'),
(16, 2, 'PSN', '2020-06-03', '18:29:13', 'Pesanan siap diantar.'),
(17, 3, 'PSN', '2020-06-03', '23:33:04', 'Menunggu konfirmasi Owner untuk mengecek nota pembayaran.'),
(18, 3, 'PSN', '2020-06-03', '23:33:27', 'Pesanan telah di ACC oleh Owner dan sekarang tinggal menunggu approval user Produksi.'),
(19, 3, 'PSN', '2020-06-03', '23:33:46', 'Pesanan sudah di Acc user Produksi.'),
(20, 3, 'PSN', '2020-06-03', '23:33:46', 'Pesanan sedang di Tahap Pertama beli bahan.'),
(21, 3, 'PSN', '2020-06-03', '23:33:55', 'User Produksi sudah melakukan Tahap Pertama.'),
(22, 3, 'PSN', '2020-06-03', '23:33:55', 'Pesanan sedang di Tahap Kedua (memilih karyawan).'),
(23, 3, 'PSN', '2020-06-03', '23:34:17', 'User Produksi sudah melakukan Tahap Kedua.'),
(24, 3, 'PSN', '2020-06-03', '23:34:17', 'Pesanan sedang di Tahap Ketiga (memilih bahan penolong).'),
(25, 3, 'PSN', '2020-06-03', '23:34:29', 'User Produksi sudah menyelesaikan Tahap Ketiga.'),
(26, 3, 'PSN', '2020-06-03', '23:34:29', 'Pesanan siap diantar.');

-- --------------------------------------------------------

--
-- Table structure for table `transaksi_peralatan`
--

CREATE TABLE `transaksi_peralatan` (
  `id` int(11) NOT NULL,
  `kode` text NOT NULL,
  `total` int(11) NOT NULL,
  `tanggal` date NOT NULL,
  `keterangan` text NOT NULL,
  `status` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `akun`
--
ALTER TABLE `akun`
  ADD PRIMARY KEY (`id_akun`);

--
-- Indexes for table `bahan`
--
ALTER TABLE `bahan`
  ADD PRIMARY KEY (`id_bahan`);

--
-- Indexes for table `biaya`
--
ALTER TABLE `biaya`
  ADD PRIMARY KEY (`id_biaya`);

--
-- Indexes for table `bom`
--
ALTER TABLE `bom`
  ADD PRIMARY KEY (`no`);

--
-- Indexes for table `coa`
--
ALTER TABLE `coa`
  ADD PRIMARY KEY (`id_coa`);

--
-- Indexes for table `detail_bb`
--
ALTER TABLE `detail_bb`
  ADD PRIMARY KEY (`no`);

--
-- Indexes for table `detail_bp`
--
ALTER TABLE `detail_bp`
  ADD PRIMARY KEY (`no`);

--
-- Indexes for table `detail_btkl`
--
ALTER TABLE `detail_btkl`
  ADD PRIMARY KEY (`no`);

--
-- Indexes for table `detail_operasional`
--
ALTER TABLE `detail_operasional`
  ADD PRIMARY KEY (`no`);

--
-- Indexes for table `detail_rasa`
--
ALTER TABLE `detail_rasa`
  ADD PRIMARY KEY (`no`);

--
-- Indexes for table `detail_transaksi_peralatan`
--
ALTER TABLE `detail_transaksi_peralatan`
  ADD PRIMARY KEY (`no`);

--
-- Indexes for table `jurnal`
--
ALTER TABLE `jurnal`
  ADD PRIMARY KEY (`no`);

--
-- Indexes for table `karyawan`
--
ALTER TABLE `karyawan`
  ADD PRIMARY KEY (`id_karyawan`);

--
-- Indexes for table `komunitas`
--
ALTER TABLE `komunitas`
  ADD PRIMARY KEY (`id_komunitas`);

--
-- Indexes for table `modal`
--
ALTER TABLE `modal`
  ADD PRIMARY KEY (`id_modal`);

--
-- Indexes for table `operasional`
--
ALTER TABLE `operasional`
  ADD PRIMARY KEY (`id_operasional`);

--
-- Indexes for table `pelanggan`
--
ALTER TABLE `pelanggan`
  ADD PRIMARY KEY (`id_pelanggan`);

--
-- Indexes for table `peralatan`
--
ALTER TABLE `peralatan`
  ADD PRIMARY KEY (`id_peralatan`);

--
-- Indexes for table `pesanan`
--
ALTER TABLE `pesanan`
  ADD PRIMARY KEY (`id_pesanan`);

--
-- Indexes for table `prive`
--
ALTER TABLE `prive`
  ADD PRIMARY KEY (`id_prive`);

--
-- Indexes for table `produk`
--
ALTER TABLE `produk`
  ADD PRIMARY KEY (`id_produk`);

--
-- Indexes for table `produksi`
--
ALTER TABLE `produksi`
  ADD PRIMARY KEY (`id_produksi`);

--
-- Indexes for table `produk_rasa`
--
ALTER TABLE `produk_rasa`
  ADD PRIMARY KEY (`no`);

--
-- Indexes for table `rasa`
--
ALTER TABLE `rasa`
  ADD PRIMARY KEY (`id_rasa`);

--
-- Indexes for table `timeline`
--
ALTER TABLE `timeline`
  ADD PRIMARY KEY (`no`);

--
-- Indexes for table `transaksi_peralatan`
--
ALTER TABLE `transaksi_peralatan`
  ADD PRIMARY KEY (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
