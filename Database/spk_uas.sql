-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 17, 2020 at 08:29 AM
-- Server version: 10.1.36-MariaDB
-- PHP Version: 7.2.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `spk_uas`
--

-- --------------------------------------------------------

--
-- Table structure for table `tb_alternatif`
--

CREATE TABLE `tb_alternatif` (
  `id_alternative` varchar(5) NOT NULL,
  `name` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_alternatif`
--

INSERT INTO `tb_alternatif` (`id_alternative`, `name`) VALUES
('1', 'Honda Vario'),
('2', 'Yamaha Mio M3'),
('3', 'Suzuki Address Playful'),
('4', 'Vespa S-125 I-Get');

--
-- Triggers `tb_alternatif`
--
DELIMITER $$
CREATE TRIGGER `hapus_alternatif` BEFORE DELETE ON `tb_alternatif` FOR EACH ROW BEGIN
    DELETE FROM tb_evaluasi WHERE id_alternative = old.id_alternative;
END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `tb_evaluasi`
--

CREATE TABLE `tb_evaluasi` (
  `id_alternative` smallint(5) UNSIGNED NOT NULL,
  `id_criteria` tinyint(3) UNSIGNED NOT NULL,
  `value` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_evaluasi`
--

INSERT INTO `tb_evaluasi` (`id_alternative`, `id_criteria`, `value`) VALUES
(2, 1, 3),
(2, 2, 3),
(2, 3, 2),
(2, 4, 3),
(3, 1, 3),
(3, 2, 2),
(3, 3, 3),
(3, 4, 2),
(4, 1, 1),
(4, 2, 1),
(4, 3, 4),
(4, 4, 3),
(1, 1, 2),
(1, 2, 3),
(1, 3, 3),
(1, 4, 3);

-- --------------------------------------------------------

--
-- Table structure for table `tb_history`
--

CREATE TABLE `tb_history` (
  `id_history` int(11) NOT NULL,
  `nim` varchar(30) DEFAULT NULL,
  `alamat` text,
  `id_nama` int(11) DEFAULT NULL,
  `tgl_akses` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_history`
--

INSERT INTO `tb_history` (`id_history`, `nim`, `alamat`, `id_nama`, `tgl_akses`) VALUES
(1, '1741720144', 'Muharto', 0, '2020-05-16 11:53:33'),
(2, '1741720144', 'Singosari', 0, '2020-05-17 03:19:50'),
(3, '1741720196', 'Bojonegoro', 4, '2020-05-17 04:16:18'),
(4, '1741720192', 'Gadingkasri', 0, '2020-05-17 04:22:00'),
(5, '1741720144', 'asad', 7, '2020-05-17 04:23:25'),
(6, '1212', 'sas', 13, '2020-05-17 04:25:03'),
(7, '1741720192', 'Klampok', 1, '2020-05-17 05:22:03'),
(8, '1741720144', 'Sulfat', 7, '2020-05-17 05:27:58'),
(9, '1741720144', 'Sulfat', 7, '2020-05-17 05:34:41'),
(10, '1741720196', 'Sawojajar', 9, '2020-05-17 05:54:21'),
(11, '1212', 'Tumpang', 15, '2020-05-17 06:12:56'),
(12, '1212', 'Tumpang', 15, '2020-05-17 06:13:57');

-- --------------------------------------------------------

--
-- Table structure for table `tb_kriteria`
--

CREATE TABLE `tb_kriteria` (
  `id_criteria` tinyint(3) UNSIGNED NOT NULL,
  `criteria` varchar(100) DEFAULT NULL,
  `bulan` text
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_kriteria`
--

INSERT INTO `tb_kriteria` (`id_criteria`, `criteria`, `bulan`) VALUES
(1, 'Harga', NULL),
(2, 'Konsumsi BBM', NULL),
(3, 'Kapasitas Tangki', NULL),
(4, 'Popularitas', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `tb_kriteria_nama`
--

CREATE TABLE `tb_kriteria_nama` (
  `id_kriteria` int(255) NOT NULL,
  `id_nama` int(255) DEFAULT NULL,
  `kriteria` text
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_kriteria_nama`
--

INSERT INTO `tb_kriteria_nama` (`id_kriteria`, `id_nama`, `kriteria`) VALUES
(0, 0, '[{\"id_kriteria\":\"1\",\"kriteria\":\"Harga\",\"weight\":\"2\"},{\"id_kriteria\":\"2\",\"kriteria\":\"Konsumsi BBM\",\"weight\":\"3\"},{\"id_kriteria\":\"3\",\"kriteria\":\"Kapasitas Tangki\",\"weight\":\"3\"},{\"id_kriteria\":\"4\",\"kriteria\":\"Popularitas\",\"weight\":\"3\"}]'),
(1, 1, '[{\"id_kriteria\":\"1\",\"kriteria\":\"Harga\",\"weight\":\"3\"},{\"id_kriteria\":\"2\",\"kriteria\":\"Konsumsi BBM\",\"weight\":\"4\"},{\"id_kriteria\":\"3\",\"kriteria\":\"Kapasitas Tangki\",\"weight\":\"3\"},{\"id_kriteria\":\"4\",\"kriteria\":\"Popularitas\",\"weight\":\"4\"}]'),
(2, 2, '[{\"id_kriteria\":\"1\",\"kriteria\":\"Harga\",\"weight\":\"1\"},{\"id_kriteria\":\"2\",\"kriteria\":\"Konsumsi BBM\",\"weight\":\"3\"},{\"id_kriteria\":\"3\",\"kriteria\":\"Kapasitas Tangki\",\"weight\":\"4\"},{\"id_kriteria\":\"4\",\"kriteria\":\"Popularitas\",\"weight\":\"4\"}]'),
(3, 3, '[{\"id_kriteria\":\"1\",\"kriteria\":\"Harga\",\"weight\":\"2\"},{\"id_kriteria\":\"2\",\"kriteria\":\"Konsumsi BBM\",\"weight\":\"4\"},{\"id_kriteria\":\"3\",\"kriteria\":\"Kapasitas Tangki\",\"weight\":\"2\"},{\"id_kriteria\":\"4\",\"kriteria\":\"Popularitas\",\"weight\":\"3\"}]'),
(4, 4, '[{\"id_kriteria\":\"1\",\"kriteria\":\"Harga\",\"weight\":\"4\"},{\"id_kriteria\":\"2\",\"kriteria\":\"Konsumsi BBM\",\"weight\":\"3\"},{\"id_kriteria\":\"3\",\"kriteria\":\"Kapasitas Tangki\",\"weight\":\"3\"},{\"id_kriteria\":\"4\",\"kriteria\":\"Popularitas\",\"weight\":\"2\"}]'),
(5, 5, '[{\"id_kriteria\":\"1\",\"kriteria\":\"Harga\",\"weight\":\"3\"},{\"id_kriteria\":\"2\",\"kriteria\":\"Konsumsi BBM\",\"weight\":\"3\"},{\"id_kriteria\":\"3\",\"kriteria\":\"Kapasitas Tangki\",\"weight\":\"2\"},{\"id_kriteria\":\"4\",\"kriteria\":\"Popularitas\",\"weight\":\"2\"}]'),
(6, 6, '[{\"id_kriteria\":\"1\",\"kriteria\":\"Harga\",\"weight\":\"3\"},{\"id_kriteria\":\"2\",\"kriteria\":\"Konsumsi BBM\",\"weight\":\"3\"},{\"id_kriteria\":\"3\",\"kriteria\":\"Kapasitas Tangki\",\"weight\":\"2\"},{\"id_kriteria\":\"4\",\"kriteria\":\"Popularitas\",\"weight\":\"2\"}]'),
(7, 7, '[{\"id_kriteria\":\"1\",\"kriteria\":\"Harga\",\"weight\":\"2\"},{\"id_kriteria\":\"2\",\"kriteria\":\"Konsumsi BBM\",\"weight\":\"3\"},{\"id_kriteria\":\"3\",\"kriteria\":\"Kapasitas Tangki\",\"weight\":\"3\"},{\"id_kriteria\":\"4\",\"kriteria\":\"Popularitas\",\"weight\":\"2\"}]'),
(8, 8, '[{\"id_kriteria\":\"1\",\"kriteria\":\"Harga\",\"weight\":\"3\"},{\"id_kriteria\":\"2\",\"kriteria\":\"Konsumsi BBM\",\"weight\":\"3\"},{\"id_kriteria\":\"3\",\"kriteria\":\"Kapasitas Tangki\",\"weight\":\"1\"},{\"id_kriteria\":\"4\",\"kriteria\":\"Popularitas\",\"weight\":\"1\"}]'),
(9, 9, '[{\"id_kriteria\":\"1\",\"kriteria\":\"Harga\",\"weight\":\"3\"},{\"id_kriteria\":\"2\",\"kriteria\":\"Konsumsi BBM\",\"weight\":\"3\"},{\"id_kriteria\":\"3\",\"kriteria\":\"Kapasitas Tangki\",\"weight\":\"3\"},{\"id_kriteria\":\"4\",\"kriteria\":\"Popularitas\",\"weight\":\"3\"}]'),
(10, 10, '[{\"id_kriteria\":\"1\",\"kriteria\":\"Harga\",\"weight\":\"31\"},{\"id_kriteria\":\"2\",\"kriteria\":\"Konsumsi BBM\",\"weight\":\"1\"},{\"id_kriteria\":\"3\",\"kriteria\":\"Kapasitas Tangki\",\"weight\":\"4\"},{\"id_kriteria\":\"4\",\"kriteria\":\"Popularitas\",\"weight\":\"4\"}]'),
(11, 11, '[{\"id_kriteria\":\"1\",\"kriteria\":\"Harga\",\"weight\":\"3\"},{\"id_kriteria\":\"2\",\"kriteria\":\"Konsumsi BBM\",\"weight\":\"3\"},{\"id_kriteria\":\"3\",\"kriteria\":\"Kapasitas Tangki\",\"weight\":\"3\"},{\"id_kriteria\":\"4\",\"kriteria\":\"Popularitas\",\"weight\":\"3\"}]'),
(12, 12, '[{\"id_kriteria\":\"1\",\"kriteria\":\"Harga\",\"weight\":\"4\"},{\"id_kriteria\":\"2\",\"kriteria\":\"Konsumsi BBM\",\"weight\":\"2\"},{\"id_kriteria\":\"3\",\"kriteria\":\"Kapasitas Tangki\",\"weight\":\"3\"},{\"id_kriteria\":\"4\",\"kriteria\":\"Popularitas\",\"weight\":\"3\"}]'),
(13, 13, '[{\"id_kriteria\":\"1\",\"kriteria\":\"Harga\",\"weight\":\"1\"},{\"id_kriteria\":\"2\",\"kriteria\":\"Konsumsi BBM\",\"weight\":\"2\"},{\"id_kriteria\":\"3\",\"kriteria\":\"Kapasitas Tangki\",\"weight\":\"3\"},{\"id_kriteria\":\"4\",\"kriteria\":\"Popularitas\",\"weight\":\"4\"}]'),
(14, 14, '[{\"id_kriteria\":\"1\",\"kriteria\":\"Harga\",\"weight\":\"4\"},{\"id_kriteria\":\"2\",\"kriteria\":\"Konsumsi BBM\",\"weight\":\"3\"},{\"id_kriteria\":\"3\",\"kriteria\":\"Kapasitas Tangki\",\"weight\":\"2\"},{\"id_kriteria\":\"4\",\"kriteria\":\"Popularitas\",\"weight\":\"2\"}]'),
(15, 15, '[{\"id_kriteria\":\"1\",\"kriteria\":\"Harga\",\"weight\":\"1\"},{\"id_kriteria\":\"2\",\"kriteria\":\"Konsumsi BBM\",\"weight\":\"1\"},{\"id_kriteria\":\"3\",\"kriteria\":\"Kapasitas Tangki\",\"weight\":\"2\"},{\"id_kriteria\":\"4\",\"kriteria\":\"Popularitas\",\"weight\":\"2\"}]'),
(16, 16, '[{\"id_kriteria\":\"1\",\"kriteria\":\"Harga\",\"weight\":\"3\"},{\"id_kriteria\":\"2\",\"kriteria\":\"Konsumsi BBM\",\"weight\":\"3\"},{\"id_kriteria\":\"3\",\"kriteria\":\"Kapasitas Tangki\",\"weight\":\"2\"},{\"id_kriteria\":\"4\",\"kriteria\":\"Popularitas\",\"weight\":\"2\"}]');

-- --------------------------------------------------------

--
-- Table structure for table `tb_nama`
--

CREATE TABLE `tb_nama` (
  `id_nama` int(11) NOT NULL,
  `nama_mhs` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_nama`
--

INSERT INTO `tb_nama` (`id_nama`, `nama_mhs`) VALUES
(0, 'Abdallah DC'),
(1, 'Adn Maulidya Handah Putri'),
(2, 'Aldihamda Sulthon Fuad Prajakusuma'),
(3, 'Amin Anis Kuddah'),
(4, 'Chintya Puspa Dewi'),
(5, 'Dimas Shella Charlinawati'),
(6, 'Ermi Pristyaningrum'),
(7, 'Fardhan Ardhi'),
(8, 'Greggy Gianini FIrmansyah'),
(9, 'Haryo Bagus Setyawan'),
(10, 'Ilham Nuswantoro Aji'),
(11, 'Leni Saputri'),
(12, 'Panji Awwaludi'),
(13, 'Reffan Pandu Amirulloh'),
(14, 'Sulthan Rafif'),
(15, 'Syahdanny Alhamda'),
(16, 'Vian Satria Navalino');

-- --------------------------------------------------------

--
-- Table structure for table `tb_ranking`
--

CREATE TABLE `tb_ranking` (
  `id_ranking` int(11) NOT NULL,
  `id_nama` int(11) NOT NULL,
  `hasil_electre` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_ranking`
--

INSERT INTO `tb_ranking` (`id_ranking`, `id_nama`, `hasil_electre`) VALUES
(0, 5, '{\"1\":1,\"2\":1,\"3\":0,\"4\":0}'),
(0, 6, '{\"1\":1,\"2\":1,\"3\":0,\"4\":0}'),
(0, 11, '{\"1\":1,\"2\":1,\"3\":0,\"4\":0}');

-- --------------------------------------------------------

--
-- Table structure for table `tb_user`
--

CREATE TABLE `tb_user` (
  `id_user` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(250) NOT NULL,
  `level` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_user`
--

INSERT INTO `tb_user` (`id_user`, `username`, `password`, `level`) VALUES
(1, 'admin', '$2y$10$8zWX9pN/1wDgkFG7BvDslOJjGm3V58PCkasCvaPu1//E9ndv/C9L6', 'admin');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tb_history`
--
ALTER TABLE `tb_history`
  ADD PRIMARY KEY (`id_history`);

--
-- Indexes for table `tb_kriteria_nama`
--
ALTER TABLE `tb_kriteria_nama`
  ADD PRIMARY KEY (`id_kriteria`);

--
-- Indexes for table `tb_nama`
--
ALTER TABLE `tb_nama`
  ADD PRIMARY KEY (`id_nama`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tb_history`
--
ALTER TABLE `tb_history`
  MODIFY `id_history` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
