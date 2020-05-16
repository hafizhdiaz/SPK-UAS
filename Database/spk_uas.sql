-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 16, 2020 at 11:18 AM
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
  `nama` varchar(30) DEFAULT NULL,
  `alamat` text,
  `lokasi` int(11) DEFAULT NULL,
  `bulan` int(11) DEFAULT NULL,
  `tgl_akses` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_history`
--

INSERT INTO `tb_history` (`id_history`, `nama`, `alamat`, `lokasi`, `bulan`, `tgl_akses`) VALUES
(4, 'asri', 'tets', 6, 2, '2019-09-11 12:12:17'),
(0, 'Hafizh', 'sas', 11, 4, '2020-05-10 05:16:56'),
(0, 'Hafizh', 'Mondoroko', 1, 0, '2020-05-16 07:25:18'),
(0, 'asasa', 'asaa', 1, 0, '2020-05-16 07:26:17'),
(0, 'Abdallah', 'Muharto', 1, 0, '2020-05-16 07:34:47'),
(0, '1741720144', 'Muharto', 0, 0, '2020-05-16 09:12:09'),
(0, '1741720144', 'Muharto', 0, 0, '2020-05-16 09:13:58'),
(0, '1741720144', 'Muharto', 0, 0, '2020-05-16 09:14:23'),
(0, 'Hafizh', 'aa', 0, 0, '2020-05-16 09:14:52');

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
-- Table structure for table `tb_kriteria_lokasi`
--

CREATE TABLE `tb_kriteria_lokasi` (
  `id_kriteria` int(255) NOT NULL,
  `id_lokasi` int(255) DEFAULT NULL,
  `kriteria` text
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_kriteria_lokasi`
--

INSERT INTO `tb_kriteria_lokasi` (`id_kriteria`, `id_lokasi`, `kriteria`) VALUES
(0, 0, '[{\"id_kriteria\":\"1\",\"kriteria\":\"Jenis Tanah\",\"weight\":\"3\"},{\"id_kriteria\":\"2\",\"kriteria\":\"Konsumsi BBM\",\"weight\":\"3\"},{\"id_kriteria\":\"3\",\"kriteria\":\"Kapasitas Tangki\",\"weight\":\"4\"},{\"id_kriteria\":\"4\",\"kriteria\":\"Popularitas\",\"weight\":\"3\"}]'),
(1, 1, '[{\"id_kriteria\":\"1\",\"kriteria\":\"Harga\",\"weight\":\"2\"},{\"id_kriteria\":\"2\",\"kriteria\":\"Konsumsi BBM\",\"weight\":null,\"data_bulan\":null,\"ket\":null},{\"id_kriteria\":\"3\",\"kriteria\":\"Kapasitas Tangki\",\"weight\":\"4\"},{\"id_kriteria\":\"4\",\"kriteria\":\"Popularitas\",\"weight\":\"3\"},{\"id_kriteria\":null,\"kriteria\":null,\"weight\":null}]'),
(2, 2, '[{\"id_kriteria\":\"1\",\"kriteria\":\"Harga\",\"weight\":\"Harga\"},{\"id_kriteria\":\"2\",\"kriteria\":\"Konsumsi BBM\",\"weight\":\"Konsumsi BBM\"},{\"id_kriteria\":\"3\",\"kriteria\":\"Kapasitas Tangki\",\"weight\":\"Kapasitas Tangki\"},{\"id_kriteria\":\"4\",\"kriteria\":\"Popularitas\",\"weight\":\"Popularitas\"}]'),
(3, 3, '[{\"id_kriteria\":\"1\",\"kriteria\":\"Harga\",\"weight\":\"1\"},{\"id_kriteria\":\"2\",\"kriteria\":\"Curah Hujan\",\"weight\":2},{\"id_kriteria\":\"3\",\"kriteria\":\"Drainase\",\"weight\":\"1\"},{\"id_kriteria\":\"4\",\"kriteria\":\"pH\",\"weight\":\"3\"}]'),
(4, 4, '[{\"id_kriteria\":\"1\",\"kriteria\":\"Harga\",\"weight\":\"1\"},{\"id_kriteria\":\"2\",\"kriteria\":\"Curah Hujan\",\"weight\":2},{\"id_kriteria\":\"3\",\"kriteria\":\"Drainase\",\"weight\":\"1\"},{\"id_kriteria\":\"4\",\"kriteria\":\"pH\",\"weight\":\"3\"}]'),
(5, 5, '[{\"id_kriteria\":\"1\",\"kriteria\":\"Harga\",\"weight\":\"1\"},{\"id_kriteria\":null,\"kriteria\":\"Konsumsi BBM\",\"weight\":null},{\"id_kriteria\":\"3\",\"kriteria\":\"Kapasitas Tangki\",\"weight\":\"2\"},{\"id_kriteria\":\"4\",\"kriteria\":\"Popularitas\",\"weight\":\"4\"}]'),
(6, 6, '[{\"id_kriteria\":\"1\",\"kriteria\":\"Harga\",\"weight\":\"2\"},{\"id_kriteria\":\"2\",\"kriteria\":\"Konsumsi BBM\",\"weight\":\"3\"},{\"id_kriteria\":\"3\",\"kriteria\":\"Kapasitas Tangki\",\"weight\":\"4\"},{\"id_kriteria\":\"4\",\"kriteria\":\"Popularitas\",\"weight\":\"2\"}]');

-- --------------------------------------------------------

--
-- Table structure for table `tb_lokasi`
--

CREATE TABLE `tb_lokasi` (
  `id_lokasi` int(11) NOT NULL,
  `nama_lokasi` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_lokasi`
--

INSERT INTO `tb_lokasi` (`id_lokasi`, `nama_lokasi`) VALUES
(0, 'Abdallah DC'),
(1, 'Adn Maulidya'),
(2, 'Aldihamda'),
(3, 'Amin Anis'),
(4, 'Chintya Puspa'),
(5, 'Ermi Pristyaningrum'),
(6, 'Dimas Shella'),
(7, 'Fardhan');

-- --------------------------------------------------------

--
-- Table structure for table `tb_ranking`
--

CREATE TABLE `tb_ranking` (
  `id_ranking` int(11) NOT NULL,
  `id_lokasi` int(11) NOT NULL,
  `hasil_electre` text NOT NULL,
  `hasil_topsis` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_ranking`
--

INSERT INTO `tb_ranking` (`id_ranking`, `id_lokasi`, `hasil_electre`, `hasil_topsis`) VALUES
(0, 5, '{\"1\":1,\"2\":1,\"3\":0,\"4\":0}', '{\"2\":0.6540672953078929,\"1\":0.6090717558372857,\"3\":0,\"4\":0}'),
(0, 6, '{\"1\":1,\"2\":1,\"3\":0,\"4\":0}', '{\"2\":0.6540672953078929,\"1\":0.6090717558372857,\"3\":0,\"4\":0}'),
(0, 11, '{\"1\":1,\"2\":1,\"3\":0,\"4\":0}', '{\"2\":0.6540672953078929,\"1\":0.6090717558372857,\"3\":0,\"4\":0}'),
(0, 1, '{\"2\":3,\"1\":2,\"3\":0,\"4\":0}', '{\"4\":0.6993088924482411,\"3\":0.5290594062760458,\"1\":0.5120476854970647,\"2\":0.4619539596126885}'),
(0, 0, '{\"2\":3,\"1\":2,\"3\":0,\"4\":0}', '{\"4\":0.6993088924482411,\"3\":0.5290594062760458,\"1\":0.5120476854970647,\"2\":0.4619539596126885}');

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
-- Indexes for table `tb_kriteria_lokasi`
--
ALTER TABLE `tb_kriteria_lokasi`
  ADD PRIMARY KEY (`id_kriteria`);

--
-- Indexes for table `tb_lokasi`
--
ALTER TABLE `tb_lokasi`
  ADD PRIMARY KEY (`id_lokasi`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
