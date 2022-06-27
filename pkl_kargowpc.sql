-- phpMyAdmin SQL Dump
-- version 4.7.9
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 01, 2022 at 11:03 AM
-- Server version: 10.1.31-MariaDB
-- PHP Version: 7.2.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `pkl_kargowpc`
--

-- --------------------------------------------------------

--
-- Table structure for table `barang`
--

CREATE TABLE `barang` (
  `idbarang` int(5) NOT NULL,
  `kode` varchar(10) NOT NULL,
  `namabarang` varchar(80) NOT NULL,
  `jenis` varchar(50) NOT NULL,
  `jumlah` int(5) NOT NULL,
  `harga` double NOT NULL,
  `berat` varchar(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `barang`
--

INSERT INTO `barang` (`idbarang`, `kode`, `namabarang`, `jenis`, `jumlah`, `harga`, `berat`) VALUES
(2, 'A001', 'besi A', 'besi', 88, 990000, '100kg'),
(3, 'A002', 'tembaga II', 'tembaga', 20, 200000, '10gra'),
(4, 'A003', 'aluminium II', 'aluminium', 0, 50000, '900gr');

-- --------------------------------------------------------

--
-- Table structure for table `barangmasuk`
--

CREATE TABLE `barangmasuk` (
  `idbarangmasuk` int(11) NOT NULL,
  `idbarang` int(11) NOT NULL,
  `kuantiti` int(5) NOT NULL,
  `tgl` date NOT NULL,
  `distributor` varchar(50) NOT NULL,
  `hargamasuk` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `barangmasuk`
--

INSERT INTO `barangmasuk` (`idbarangmasuk`, `idbarang`, `kuantiti`, `tgl`, `distributor`, `hargamasuk`) VALUES
(3, 2, 2, '2021-11-27', 'CV. Ananda', 600000),
(4, 3, 5, '2021-11-27', 'CV. Mekar', 75000),
(5, 4, 4, '2021-12-13', 'CV. Ananda', 50000),
(6, 3, 4, '2021-12-13', 'CV. Mekar', 100000),
(7, 3, 6, '2021-11-30', 'CV. Ananda', 50000);

--
-- Triggers `barangmasuk`
--
DELIMITER $$
CREATE TRIGGER `delete_masuk` AFTER DELETE ON `barangmasuk` FOR EACH ROW BEGIN 
	UPDATE barang SET jumlah = jumlah - OLD.kuantiti
    WHERE idbarang = OLD.idbarang;
END
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `edit_masuk` AFTER UPDATE ON `barangmasuk` FOR EACH ROW BEGIN
	UPDATE barang SET jumlah = jumlah - OLD.kuantiti, 
                     jumlah = jumlah + NEW.kuantiti 
    WHERE idbarang = NEW.idbarang;
END
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `tambah_masuk` AFTER INSERT ON `barangmasuk` FOR EACH ROW BEGIN
	UPDATE barang SET jumlah = jumlah + NEW.kuantiti
    WHERE idbarang = NEW.idbarang;
END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `kirim`
--

CREATE TABLE `kirim` (
  `noresi` varchar(10) NOT NULL,
  `idtransaksi` int(5) NOT NULL,
  `tglkirim` date NOT NULL,
  `tglterima` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `kirim`
--

INSERT INTO `kirim` (`noresi`, `idtransaksi`, `tglkirim`, `tglterima`) VALUES
('1233333333', 4, '2021-12-08', '2021-12-25'),
('1233333337', 6, '2021-12-10', '2021-12-14'),
('2021121309', 5, '2021-12-08', '2021-12-11'),
('2021121322', 2, '2021-12-01', '2021-12-03');

-- --------------------------------------------------------

--
-- Table structure for table `pengaturan`
--

CREATE TABLE `pengaturan` (
  `id` int(1) NOT NULL,
  `ukuran_teks` varchar(20) NOT NULL,
  `tulisan1` text NOT NULL,
  `tulisan2` text NOT NULL,
  `tulisan3` text NOT NULL,
  `tulisan4` text NOT NULL,
  `latarbelakang` text NOT NULL,
  `gambar1` text NOT NULL,
  `gambar2` text NOT NULL,
  `gambar3` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pengaturan`
--

INSERT INTO `pengaturan` (`id`, `ukuran_teks`, `tulisan1`, `tulisan2`, `tulisan3`, `tulisan4`, `latarbelakang`, `gambar1`, `gambar2`, `gambar3`) VALUES
(1, 'text-sm', 'PT.', 'Global', 'Andalan', 'Kargo', 'PT. GLOBAL ANDALAN KARGO berdiri pada tahun 2021  Perusahaan ini merupakan Perusahaan berskala menengah yang bergerak di bidang ekspedisi barang dan jasa.', '5014truck1.jpeg', '4574truck2.jpeg', '3716truck3.jpeg');

-- --------------------------------------------------------

--
-- Table structure for table `transaksi`
--

CREATE TABLE `transaksi` (
  `idtransaksi` int(5) NOT NULL,
  `idbarang` int(5) NOT NULL,
  `id` int(5) NOT NULL,
  `tgltransaksi` date NOT NULL,
  `jumlahnya` int(5) NOT NULL,
  `total` int(11) NOT NULL,
  `gambar` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `transaksi`
--

INSERT INTO `transaksi` (`idtransaksi`, `idbarang`, `id`, `tgltransaksi`, `jumlahnya`, `total`, `gambar`) VALUES
(2, 2, 4, '2021-11-27', 2, 1980000, '7566IMG.20210830.WA0010.jpg'),
(3, 3, 5, '2021-11-28', 2, 400000, '9604IMG.20210815.WA0023.jpg'),
(4, 2, 4, '2021-11-27', 1, 990000, '7484gambar.jpg'),
(5, 3, 5, '2021-12-01', 3, 600000, '7089IMG.20211125.WA0000.jpg'),
(6, 3, 4, '2021-12-01', 1, 200000, '3757IMG.20211128.WA0007.jpg');

--
-- Triggers `transaksi`
--
DELIMITER $$
CREATE TRIGGER `delete_transaksi` AFTER DELETE ON `transaksi` FOR EACH ROW BEGIN 
	UPDATE barang SET jumlah = jumlah + OLD.jumlahnya
    WHERE idbarang = OLD.idbarang;
END
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `edit_transaksi` AFTER UPDATE ON `transaksi` FOR EACH ROW BEGIN
	UPDATE barang SET jumlah = jumlah + OLD.jumlahnya, 
                      jumlah = jumlah - NEW.jumlahnya 
    WHERE idbarang = NEW.idbarang;
END
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `tambah_transaksi` AFTER INSERT ON `transaksi` FOR EACH ROW BEGIN
	UPDATE barang SET jumlah = jumlah - NEW.jumlahnya
    WHERE idbarang = NEW.idbarang;
END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(5) NOT NULL,
  `telp` varchar(15) NOT NULL,
  `password` varchar(15) NOT NULL,
  `level` varchar(10) NOT NULL,
  `nama` varchar(80) NOT NULL,
  `alamat` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `telp`, `password`, `level`, `nama`, `alamat`) VALUES
(1, '08959731445', 'admin', 'admin', 'admin', 'banjar'),
(2, '08527811891', '2222', 'admin', 'admin2', 'kalua'),
(4, '08568832932', '3333', 'pelanggan', 'firmawan', 'landasan ulin'),
(5, '08536632764', '1111', 'pelanggan', 'adrino qolbi', 'banjarbaru');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `barang`
--
ALTER TABLE `barang`
  ADD PRIMARY KEY (`idbarang`);

--
-- Indexes for table `barangmasuk`
--
ALTER TABLE `barangmasuk`
  ADD PRIMARY KEY (`idbarangmasuk`),
  ADD KEY `idbarang` (`idbarang`);

--
-- Indexes for table `kirim`
--
ALTER TABLE `kirim`
  ADD PRIMARY KEY (`noresi`),
  ADD KEY `idtransaksi` (`idtransaksi`);

--
-- Indexes for table `pengaturan`
--
ALTER TABLE `pengaturan`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `transaksi`
--
ALTER TABLE `transaksi`
  ADD PRIMARY KEY (`idtransaksi`),
  ADD KEY `id` (`id`),
  ADD KEY `idbarang` (`idbarang`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `barang`
--
ALTER TABLE `barang`
  MODIFY `idbarang` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `barangmasuk`
--
ALTER TABLE `barangmasuk`
  MODIFY `idbarangmasuk` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `transaksi`
--
ALTER TABLE `transaksi`
  MODIFY `idtransaksi` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `barangmasuk`
--
ALTER TABLE `barangmasuk`
  ADD CONSTRAINT `barangmasuk_ibfk_1` FOREIGN KEY (`idbarang`) REFERENCES `barang` (`idbarang`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `transaksi`
--
ALTER TABLE `transaksi`
  ADD CONSTRAINT `transaksi_ibfk_1` FOREIGN KEY (`idbarang`) REFERENCES `barang` (`idbarang`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
