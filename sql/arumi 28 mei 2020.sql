-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: May 27, 2020 at 07:04 PM
-- Server version: 10.1.13-MariaDB
-- PHP Version: 5.5.34

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
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
(2, 'BHN', 'Telur', 'butir', 1500, 'Bahan Baku'),
(3, 'BHN', 'Mentega', 'bungkus', 8000, 'Bahan Baku'),
(9, 'BHN', 'Gula Pasir', 'gram', 12, 'Bahan Baku'),
(10, 'BHN', 'Daun Pisang', 'sedaun', 5000, 'Bahan Penolong'),
(12, 'BHN', 'susu bubuk', 'bungkus', 4000, 'Bahan Baku'),
(13, 'BHN', 'femipan', 'gram', 400, 'Bahan Baku'),
(14, 'BHN', 'garam', 'gram', 16, 'Bahan Baku'),
(15, 'BHN', 'minyak sayur', 'gram', 12, 'Bahan Baku'),
(16, 'BHN', 'Pasta Tomat', 'gram', 17, 'Bahan Penolong'),
(17, 'BHN', 'Keju Mozarella', 'bungkus', 13600, 'Bahan Penolong'),
(18, 'BHN', 'Bawang  Bombay', 'buah', 18500, 'Bahan Penolong'),
(19, 'BHN', 'Sosis', 'buah', 10000, 'Bahan Penolong'),
(20, 'BHN', 'coklat campound', 'gram', 45, 'Bahan Baku'),
(21, 'BHN', 'coklat bubuk', 'gram', 120, 'Bahan Baku'),
(22, 'BHN', 'susu cair', 'ml', 5100, 'Bahan Baku'),
(23, 'BHN', 'baking powder', 'gram', 120, 'Bahan Baku'),
(24, 'BHN', 'Sirup Mapple', 'ml', 20, 'Bahan Penolong'),
(25, 'BHN', 'sp', 'gram', 266, 'Bahan Baku'),
(26, 'BHN', 'Cokelat Cocoa', 'bungkus', 22000, 'Bahan Penolong'),
(27, 'BHN', 'Strawberry Powder', 'bungkus', 23000, 'Bahan Penolong'),
(28, 'BHN', 'Bumbu Tabur Rasa Sapi Panggang', 'bungkus', 15500, 'Bahan Penolong'),
(29, 'BHN', 'Green Tea Powder', 'bungkus', 44900, 'Bahan Penolong'),
(30, 'BHN', 'Bubuk Rasa Barbeque', 'bungkus', 42000, 'Bahan Penolong');

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
(1, 1, 1, 1, 1, 500, 11, 5500, 'Sudah Dibeli'),
(2, 1, 1, 1, 13, 5, 400, 2000, 'Sudah Dibeli'),
(3, 1, 1, 1, 15, 200, 12, 2400, 'Sudah Dibeli'),
(4, 3, 2, 1, 1, 500, 11, 5500, 'Sudah Dibeli'),
(5, 3, 2, 1, 13, 5, 400, 2000, 'Sudah Dibeli'),
(6, 3, 2, 1, 15, 200, 12, 2400, 'Sudah Dibeli');

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
(18, '533', 'Barang dalam proses-BP', '5'),
(19, '114', 'Persediaan Bahan Penolong', '1'),
(20, '102', 'Persediaan Barang Dagang', '1'),
(21, '122', 'Peralatan', '1');

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
(3, 5, 1, 500, 5500, 11),
(4, 5, 12, 1, 4000, 4000),
(5, 5, 9, 100, 1200, 12),
(6, 5, 13, 11, 4400, 400),
(7, 5, 3, 1, 8000, 8000),
(8, 5, 14, 10, 160, 16),
(9, 5, 2, 4, 6000, 1500),
(10, 1, 1, 500, 5500, 11),
(11, 1, 13, 5, 2000, 400),
(12, 1, 15, 200, 2400, 12),
(13, 2, 1, 200, 2200, 11),
(14, 2, 20, 300, 13500, 45),
(15, 2, 21, 75, 9000, 120),
(16, 2, 22, 200, 1020000, 5100),
(17, 2, 9, 250, 3000, 12),
(19, 2, 3, 1, 8000, 8000),
(20, 2, 2, 6, 9000, 1500),
(21, 2, 23, 10, 1200, 120),
(22, 4, 1, 100, 1100, 11),
(23, 4, 22, 250, 1275000, 5100),
(24, 4, 14, 10, 160, 16),
(25, 4, 2, 1, 1500, 1500),
(26, 4, 3, 1, 8000, 8000),
(27, 3, 2, 4, 6000, 1500),
(28, 3, 9, 150, 1800, 12),
(29, 3, 25, 4, 1064, 266),
(31, 3, 20, 60, 2700, 45),
(32, 3, 3, 1, 8000, 8000),
(33, 3, 15, 46, 552, 12);

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
(1, 1, 17, 2, 27200, 13600);

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
(1, 1, 3, 3, 70000, 210000),
(2, 2, 2, 3, 75000, 225000);

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

--
-- Dumping data for table `detail_operasional`
--

INSERT INTO `detail_operasional` (`no`, `operasional_id`, `coa_id`, `tanggal`, `nominal`) VALUES
(1, 1, 513, '2020-05-27', 5000);

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
  `bahan_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `detail_pesanan`
--

INSERT INTO `detail_pesanan` (`pesanan_id`, `produk_id`, `pelanggan_id`, `harga`, `jumlah`, `subtotal`, `bahan_id`) VALUES
(1, 1, 1, 75000, 1, 75000, 0),
(2, 1, 1, 75000, 1, 75000, 0),
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

--
-- Dumping data for table `detail_transaksi_peralatan`
--

INSERT INTO `detail_transaksi_peralatan` (`no`, `transaksi_id`, `peralatan_id`, `tanggal`, `nominal`) VALUES
(1, 1, 2, '2020-05-27', 250000),
(2, 1, 3, '2020-05-27', 1000);

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
(1, 1, '111', '2020-05-19', 'Debit', 75000, 'lutfi'),
(2, 1, '411', '2020-05-19', 'Kredit', 75000, 'lutfi'),
(3, 1, '111', '2020-05-19', 'Debit', 5000000, 'rina'),
(4, 1, '311', '2020-05-19', 'Kredit', 5000000, 'rina'),
(5, 1, '312', '2020-05-19', 'Debit', 50000, 'rina'),
(6, 1, '111', '2020-05-19', 'Kredit', 50000, 'rina'),
(7, 3, '111', '2020-05-25', 'Debit', 75000, 'lutfi'),
(8, 3, '411', '2020-05-25', 'Kredit', 75000, 'lutfi'),
(9, 1, '113', '2020-05-25', 'Debit', 9900, 'adel'),
(10, 1, '111', '2020-05-25', 'Kredit', 9900, 'adel'),
(11, 1, '531', '2020-05-25', 'Debit', 9900, 'adel'),
(12, 1, '113', '2020-05-25', 'Kredit', 9900, 'adel'),
(13, 1, '532', '2020-05-25', 'Debit', 210000, 'adel'),
(14, 1, '515', '2020-05-25', 'Kredit', 210000, 'adel'),
(15, 1, '114', '2020-05-25', 'Debit', 27200, 'adel'),
(16, 1, '111', '2020-05-25', 'Kredit', 27200, 'adel'),
(17, 1, '533', '2020-05-25', 'Debit', 27200, 'adel'),
(18, 1, '516', '2020-05-25', 'Kredit', 27200, 'adel'),
(19, 1, '513', '2020-05-27', 'Debit', 5000, 'rina'),
(20, 1, '111', '2020-05-27', 'Kredit', 5000, 'rina'),
(21, 2, '113', '2020-05-27', 'Debit', 9900, 'adel'),
(22, 2, '111', '2020-05-27', 'Kredit', 9900, 'adel'),
(23, 2, '531', '2020-05-27', 'Debit', 9900, 'adel'),
(24, 2, '113', '2020-05-27', 'Kredit', 9900, 'adel'),
(25, 2, '532', '2020-05-27', 'Debit', 225000, 'adel'),
(26, 2, '515', '2020-05-27', 'Kredit', 225000, 'adel'),
(27, 1, '122', '2020-05-27', 'Debit', 251000, 'rina'),
(28, 1, '111', '2020-05-27', 'Kredit', 251000, 'rina');

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
(1, 'EMP', 'Amien Raiz', '6282257036041', 'Jalan Belimbing no 27 Cimahi', 55000),
(2, 'EMP', 'Gading Martin', '6287830661966', 'Jl. Lontar Surabaya Wetan', 75000),
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
(1, 'CMTY', 'Toko Sidodadi', '6287830661966', 'Jl. Batununggal Indah Raya No.164, Batununggal, Kec. Bandung Kidul, Kota Bandung, Jawa Barat 40265');

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

--
-- Dumping data for table `modal`
--

INSERT INTO `modal` (`id_modal`, `nominal`, `tanggal`, `keterangan`) VALUES
(1, 5000000, '2020-05-19', 'tes perubahan modal');

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
(1, 'OP', 5000, '2020-05-27', 'Mau tes', 'Sudah Dibayar'),
(2, 'OP', 0, '2020-05-27', 'tes', 'Baru Dibuat');

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
(3, 'Arumi', 'John Travolta', '628889391230', 'Jl. Trunojoyo Surabaya', 'johntravolta', '12345');

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
(1, 'PSN', 1, '2020-05-17', 75000, 'Sudah Jadi', 'work_from_home.jpg', 0),
(2, 'PSN', 1, '2020-05-17', 75000, 'Belum Bayar', 'NoSQL.PNG', 0),
(3, 'PSN', 1, '2020-05-25', 75000, 'Diproduksi', 'NoSQL.PNG', 0);

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

--
-- Dumping data for table `prive`
--

INSERT INTO `prive` (`id_prive`, `nominal`, `tanggal`, `keterangan`) VALUES
(1, 50000, '2020-05-19', 'mau beli pulsa');

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
(1, 'Produksi', 1, 1, '2020-05-25', '2020-05-25', 'Sudah Jadi', 9900, 210000, 27200, 0, ''),
(2, 'Produksi', 3, 1, '2020-05-26', '0000-00-00', 'Sudah Milih Karyawan', 9900, 225000, 0, 0, '');

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
(1, 1, 1),
(2, 1, 9);

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
-- Table structure for table `tes`
--

CREATE TABLE `tes` (
  `qty` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tes`
--

INSERT INTO `tes` (`qty`) VALUES
(9),
(1),
(25),
(0),
(0);

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
-- Dumping data for table `transaksi_peralatan`
--

INSERT INTO `transaksi_peralatan` (`id`, `kode`, `total`, `tanggal`, `keterangan`, `status`) VALUES
(1, 'TP', 251000, '2020-05-27', 'tes', 'Sudah Dibayar');

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
-- Indexes for table `transaksi_peralatan`
--
ALTER TABLE `transaksi_peralatan`
  ADD PRIMARY KEY (`id`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
