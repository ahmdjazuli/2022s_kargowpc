-- phpMyAdmin SQL Dump
-- version 4.7.9
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 27, 2022 at 12:33 PM
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
-- Database: `2022s_kargowpc`
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
(2, 'A001', 'besi A', 'besi', 92, 990000, '100kg'),
(3, 'A002', 'tembaga II', 'tembaga', 18, 200000, '10gra'),
(4, 'A003', 'aluminium II', 'aluminium', 6, 50000, '900gr');

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
(3, 2, 2, '2022-06-19', 'CV. Ananda', 600000),
(4, 3, 5, '2022-06-20', 'CV. Mekar', 75000),
(5, 4, 4, '2022-06-19', 'CV. Ananda', 50000),
(6, 3, 4, '2022-06-18', 'CV. Mekar', 100000),
(7, 3, 6, '2022-06-17', 'CV. Ananda', 50000),
(8, 4, 5, '2022-06-18', 'CV. Ananda', 50000),
(9, 4, 1, '2022-06-27', 'CV. Ananda', 100000),
(10, 2, 2, '2022-06-27', 'CV. Gunung Hidayah', 50000),
(12, 3, 2, '2022-06-27', 'CV. Ananda', 50000);

-- --------------------------------------------------------

--
-- Table structure for table `barangrusak`
--

CREATE TABLE `barangrusak` (
  `idbarangrusak` int(11) NOT NULL,
  `idbarang` int(11) NOT NULL,
  `tgl` date NOT NULL,
  `kuantiti` int(5) NOT NULL,
  `ket` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `barangrusak`
--

INSERT INTO `barangrusak` (`idbarangrusak`, `idbarang`, `tgl`, `kuantiti`, `ket`) VALUES
(2, 2, '2022-06-22', 2, 'berkarat');

--
-- Triggers `barangrusak`
--
DELIMITER $$
CREATE TRIGGER `deleteRusak` AFTER DELETE ON `barangrusak` FOR EACH ROW BEGIN 
	UPDATE barang SET jumlah = jumlah + OLD.kuantiti
    WHERE idbarang = OLD.idbarang;
END
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `insertRusak` AFTER INSERT ON `barangrusak` FOR EACH ROW BEGIN 
	UPDATE barang SET jumlah = jumlah - NEW.kuantiti
    WHERE idbarang = NEW.idbarang;
END
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `updateRusak` AFTER UPDATE ON `barangrusak` FOR EACH ROW BEGIN
	UPDATE barang SET jumlah = jumlah + OLD.kuantiti, 
                      jumlah = jumlah - NEW.kuantiti 
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
('2021121311', 7, '2022-06-22', '2022-06-23'),
('2021121322', 2, '2021-12-01', '2021-12-03'),
('2021121333', 3, '2022-06-19', '2022-06-21');

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
-- Table structure for table `qc`
--

CREATE TABLE `qc` (
  `idqc` int(5) NOT NULL,
  `tglqc` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `idbarangmasuk` int(5) NOT NULL,
  `idbarang` int(5) NOT NULL,
  `id` int(5) NOT NULL,
  `kuantiti` int(5) NOT NULL,
  `mutu1` enum('0','1') NOT NULL,
  `mutu2` enum('0','1') NOT NULL,
  `akurasi1` enum('0','1') NOT NULL,
  `akurasi2` enum('0','1') NOT NULL,
  `kesimpulan` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `qc`
--

INSERT INTO `qc` (`idqc`, `tglqc`, `idbarangmasuk`, `idbarang`, `id`, `kuantiti`, `mutu1`, `mutu2`, `akurasi1`, `akurasi2`, `kesimpulan`) VALUES
(3, '2022-06-22 13:41:32', 4, 3, 6, 5, '1', '1', '0', '1', 'Baik'),
(4, '2022-06-22 13:41:20', 3, 2, 6, 2, '0', '0', '0', '1', 'Tidak (Kembalikan)'),
(5, '2022-06-22 13:41:12', 8, 4, 6, 5, '1', '1', '1', '0', 'Baik'),
(6, '2022-06-27 10:12:34', 9, 4, 6, 1, '1', '1', '1', '1', 'Tidak (Kembalikan)'),
(7, '2022-06-27 10:27:25', 10, 2, 6, 2, '1', '1', '1', '1', 'Baik'),
(8, '2022-06-27 10:31:19', 12, 3, 6, 2, '0', '0', '0', '1', 'Tidak (Kembalikan)');

--
-- Triggers `qc`
--
DELIMITER $$
CREATE TRIGGER `deleteQC` AFTER DELETE ON `qc` FOR EACH ROW BEGIN 
	IF(OLD.kesimpulan = 'Baik') THEN
		UPDATE barang SET jumlah = jumlah - OLD.kuantiti
    	WHERE idbarang = OLD.idbarang;
    END IF;
END
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `insertQC` AFTER INSERT ON `qc` FOR EACH ROW BEGIN
	IF(NEW.kesimpulan = 'Baik') THEN
		UPDATE barang SET jumlah = jumlah + NEW.kuantiti 
        WHERE idbarang = NEW.idbarang;
    END IF;
END
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `updateQC` AFTER UPDATE ON `qc` FOR EACH ROW BEGIN
	IF(NEW.kesimpulan = 'Baik') THEN
		UPDATE barang SET 
        	jumlah = jumlah + OLD.kuantiti 
    	WHERE idbarang = NEW.idbarang;
    ELSEIF(NEW.kesimpulan = 'Tidak (Kembalikan)') THEN
		UPDATE barang SET 
        	jumlah = jumlah - OLD.kuantiti 
    	WHERE idbarang = NEW.idbarang;
    END IF;
END
$$
DELIMITER ;

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
(2, 2, 4, '2022-05-19', 2, 1980000, '7566IMG.20210830.WA0010.jpg'),
(3, 3, 5, '2022-06-18', 2, 400000, '7424IMG.20211022.WA0026.jpg'),
(4, 2, 4, '2022-06-17', 1, 990000, '7484gambar.jpg'),
(5, 3, 5, '2022-06-20', 3, 600000, '3569IMG.20210910.WA0004.jpg'),
(6, 3, 4, '2022-06-20', 1, 200000, '6975IMG.20210815.WA0023.jpg'),
(7, 3, 4, '2022-06-22', 2, 400000, '9267IMG.20211125.WA0000.jpg');

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
(1, '628959731445', 'admin', 'admin', 'admin', 'banjar'),
(4, '628568832932', '3333', 'pelanggan', 'firmawan', 'landasan ulin'),
(5, '628536632764', '1111', 'pelanggan', 'adrino qolbi', 'banjarbaru'),
(6, '629768673122', '1', 'teknisi', 'Herdi Fikriansyah', 'Banjarbaru');

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
-- Indexes for table `barangrusak`
--
ALTER TABLE `barangrusak`
  ADD PRIMARY KEY (`idbarangrusak`),
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
-- Indexes for table `qc`
--
ALTER TABLE `qc`
  ADD PRIMARY KEY (`idqc`),
  ADD KEY `idbarangmasuk` (`idbarangmasuk`),
  ADD KEY `idbarang` (`idbarang`),
  ADD KEY `id` (`id`);

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
  MODIFY `idbarangmasuk` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `barangrusak`
--
ALTER TABLE `barangrusak`
  MODIFY `idbarangrusak` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `qc`
--
ALTER TABLE `qc`
  MODIFY `idqc` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `transaksi`
--
ALTER TABLE `transaksi`
  MODIFY `idtransaksi` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `barangmasuk`
--
ALTER TABLE `barangmasuk`
  ADD CONSTRAINT `barangmasuk_ibfk_1` FOREIGN KEY (`idbarang`) REFERENCES `barang` (`idbarang`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `barangrusak`
--
ALTER TABLE `barangrusak`
  ADD CONSTRAINT `barangrusak_ibfk_1` FOREIGN KEY (`idbarang`) REFERENCES `barang` (`idbarang`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `qc`
--
ALTER TABLE `qc`
  ADD CONSTRAINT `qc_ibfk_1` FOREIGN KEY (`idbarangmasuk`) REFERENCES `barangmasuk` (`idbarangmasuk`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `qc_ibfk_2` FOREIGN KEY (`idbarang`) REFERENCES `barang` (`idbarang`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `qc_ibfk_3` FOREIGN KEY (`id`) REFERENCES `user` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `transaksi`
--
ALTER TABLE `transaksi`
  ADD CONSTRAINT `transaksi_ibfk_1` FOREIGN KEY (`idbarang`) REFERENCES `barang` (`idbarang`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
