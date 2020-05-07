-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: May 07, 2020 at 08:09 AM
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
(1, 'BHN', 'Tepung Terigu', 'kg', 5000, 'Bahan Baku'),
(2, 'BHN', 'Telur', 'butir', 2000, 'Bahan Baku'),
(3, 'BHN', 'Mentega', 'bungkus', 5000, 'Bahan Baku'),
(4, 'BHN', 'Beras Ketan', 'gram', 5000, 'Bahan Baku'),
(5, 'BHN', 'Santan', 'ml', 5000, 'Bahan Baku'),
(6, 'BHN', 'Dada Ayam', 'gram', 5000, 'Bahan Baku'),
(7, 'BHN', 'Bawang Merah', 'siung', 5000, 'Bahan Baku'),
(8, 'BHN', 'Bawang Putih', 'siung', 5000, 'Bahan Baku'),
(9, 'BHN', 'Gula Pasir', 'sendok', 5000, 'Bahan Baku'),
(10, 'BHN', 'Daun Pisang', 'sedaun', 5000, 'Bahan Penolong'),
(11, 'BHN', 'Daun Pandan', 'lembar', 5000, 'Bahan Baku');

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
(9, '533', 'Biaya Produksi', 'Biaya Produksi'),
(10, '533', 'Biaya Produksi', 'Biaya Produksi');

-- --------------------------------------------------------

--
-- Table structure for table `biaya_produksi`
--

CREATE TABLE `biaya_produksi` (
  `id_biaya` int(11) NOT NULL,
  `produksi_id` int(11) NOT NULL,
  `bbb` int(11) NOT NULL,
  `btkl` int(11) NOT NULL,
  `bop` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

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
(19, '114', 'Persediaan Bahan Penolong', '1');

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
(1, 1, 1, 4, 20000, 5000),
(2, 1, 2, 4, 8000, 2000),
(3, 5, 1, 7, 35000, 5000),
(4, 5, 2, 2, 4000, 2000);

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
  `subtotal` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `detail_pesanan`
--

INSERT INTO `detail_pesanan` (`pesanan_id`, `produk_id`, `pelanggan_id`, `harga`, `jumlah`, `subtotal`) VALUES
(1, 1, 1, 75000, 1, 75000),
(2, 1, 2, 75000, 1, 75000),
(2, 5, 2, 15000, 4, 60000);

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
(1, 1, '111', '2020-05-06', 'Debit', 5000000, 'rina'),
(2, 1, '311', '2020-05-06', 'Kredit', 5000000, 'rina'),
(3, 1, '111', '2020-05-06', 'Debit', 75000, 'lutfi'),
(4, 1, '411', '2020-05-06', 'Kredit', 75000, 'lutfi'),
(5, 2, '111', '2020-05-06', 'Debit', 135000, 'lutfi'),
(6, 2, '411', '2020-05-06', 'Kredit', 135000, 'lutfi'),
(7, 1, '312', '2020-05-06', 'Debit', 40000, 'rina'),
(8, 1, '111', '2020-05-06', 'Kredit', 40000, 'rina');

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
(1, 5000000, '2020-05-06', 'Setoran awal');

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
-- Table structure for table `pesanan`
--

CREATE TABLE `pesanan` (
  `id_pesanan` int(11) NOT NULL,
  `kode_pesanan` text NOT NULL,
  `pelanggan_id` int(11) NOT NULL,
  `tanggal` date NOT NULL,
  `total` int(11) NOT NULL,
  `status` text NOT NULL,
  `komunitas_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pesanan`
--

INSERT INTO `pesanan` (`id_pesanan`, `kode_pesanan`, `pelanggan_id`, `tanggal`, `total`, `status`, `komunitas_id`) VALUES
(1, 'PSN', 1, '2020-05-06', 75000, 'Belum Dikirim', 0),
(2, 'PSN', 2, '2020-05-06', 135000, 'Belum Dikirim', 0);

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
(1, 40000, '2020-05-06', '');

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
(2, 'Cookie', 'Brownies Cokelat', 'pcs', 20000, 5, 10, 'Saat digigit, adonan klapertart yang dingin akan terasa seperti menggigit adonan hunkwe atau agar-agar santan, namun lebih lembut dan manis. Taburan kismis yang asam menjadi ‘misteri’ tersendiri untuk tuan lidah, karena bertemu dengan rasa manis potongan kelapa muda panggang.', 'product-img/brownies.jpg'),
(3, 'Cookie', 'Birthday Cake Vanilla Strawberry', 'pcs', 50000, 1, 10, 'Saat digigit, adonan klapertart yang dingin akan terasa seperti menggigit adonan hunkwe atau agar-agar santan, namun lebih lembut dan manis. Taburan kismis yang asam menjadi ‘misteri’ tersendiri untuk tuan lidah, karena bertemu dengan rasa manis potongan kelapa muda panggang.', 'product-img/birthday-cake01.jpg'),
(4, 'Cookie', 'Pancake Level Normal', 'pcs', 4500, 6, 10, 'Saat digigit, adonan klapertart yang dingin akan terasa seperti menggigit adonan hunkwe atau agar-agar santan, namun lebih lembut dan manis. Taburan kismis yang asam menjadi ‘misteri’ tersendiri untuk tuan lidah, karena bertemu dengan rasa manis potongan kelapa muda panggang.', 'product-img/pancake.jpg'),
(5, 'Cookie', 'Donat Strawberry', 'pcs', 15000, 2, 30, 'Saat digigit, adonan klapertart yang dingin akan terasa seperti menggigit adonan hunkwe atau agar-agar santan, namun lebih lembut dan manis. Taburan kismis yang asam menjadi ‘misteri’ tersendiri untuk tuan lidah, karena bertemu dengan rasa manis potongan kelapa muda panggang.', 'product-img/donut-strawberry.jpg'),
(6, 'Cookie', 'Apple Pie', 'pcs', 120000, 1, 4, 'Saat digigit, adonan klapertart yang dingin akan terasa seperti menggigit adonan hunkwe atau agar-agar santan, namun lebih lembut dan manis. Taburan kismis yang asam menjadi ‘misteri’ tersendiri untuk tuan lidah, karena bertemu dengan rasa manis potongan kelapa muda panggang.', 'product-img/apple-pie.jpg');

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
  `status` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

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
-- Indexes for table `biaya_produksi`
--
ALTER TABLE `biaya_produksi`
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

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
