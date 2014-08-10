-- phpMyAdmin SQL Dump
-- version 4.0.10deb1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Aug 10, 2014 at 10:20 PM
-- Server version: 5.5.38-0ubuntu0.14.04.1
-- PHP Version: 5.5.9-1ubuntu4.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `lembur`
--

-- --------------------------------------------------------

--
-- Table structure for table `bagian`
--

CREATE TABLE IF NOT EXISTS `bagian` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nama` varchar(50) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Dumping data for table `bagian`
--

INSERT INTO `bagian` (`id`, `nama`) VALUES
(1, 'IT'),
(3, 'Marketting'),
(4, 'Keuangan');

-- --------------------------------------------------------

--
-- Table structure for table `data_karyawan_lembur`
--

CREATE TABLE IF NOT EXISTS `data_karyawan_lembur` (
  `no_spl` int(11) NOT NULL,
  `nik` varchar(20) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  KEY `no_spl` (`no_spl`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `data_karyawan_lembur`
--

INSERT INTO `data_karyawan_lembur` (`no_spl`, `nik`) VALUES
(1, '234'),
(1, '1234'),
(1, '654'),
(2, '234'),
(2, '1234'),
(2, ''),
(3, '234'),
(3, '1234'),
(3, ''),
(4, '234'),
(4, '12'),
(4, '654'),
(5, '234'),
(5, '12'),
(5, '654'),
(6, '234'),
(6, '1234'),
(6, '654'),
(7, '234'),
(7, '1234'),
(7, ''),
(8, '1234');

-- --------------------------------------------------------

--
-- Table structure for table `data_lembur`
--

CREATE TABLE IF NOT EXISTS `data_lembur` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nik` varchar(20) NOT NULL,
  `tanggal` date NOT NULL,
  `lama` float NOT NULL,
  PRIMARY KEY (`id`),
  KEY `nik` (`nik`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=13 ;

--
-- Dumping data for table `data_lembur`
--

INSERT INTO `data_lembur` (`id`, `nik`, `tanggal`, `lama`) VALUES
(4, '234', '2014-06-10', 1.5),
(5, '1234', '2014-06-10', 1.5),
(6, '654', '2014-06-10', 1.5),
(7, '234', '2014-06-12', 1.5),
(8, '1234', '2014-06-12', 1.5),
(9, '1234', '2014-06-10', 1.5),
(10, '234', '2012-10-10', 1.5),
(11, '1234', '2012-10-10', 1.5),
(12, '', '2012-10-10', 1.5);

-- --------------------------------------------------------

--
-- Table structure for table `karyawan`
--

CREATE TABLE IF NOT EXISTS `karyawan` (
  `nik` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `nama` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `id_bagian` int(11) NOT NULL,
  `tanggal_masuk_kerja` date NOT NULL,
  `alamat` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `jabatan` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `username` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(60) COLLATE utf8_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`nik`),
  KEY `id_bagian` (`id_bagian`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `karyawan`
--

INSERT INTO `karyawan` (`nik`, `nama`, `id_bagian`, `tanggal_masuk_kerja`, `alamat`, `jabatan`, `username`, `password`, `remember_token`) VALUES
('1234', 'Priska Tiara', 1, '2014-06-01', 'asdfa', 'admin', 'priska', '$2y$10$rRsW/jxkVQJ7RX712TPhu.WVvGvsQv1nz4ylI1AYT0SG50yYsSXj.', 'tbdWBfV0sJEfGsncqPVzQXbE5cL42QY5QXXO00CAFMSKPs8qdmsWueB2VQv9'),
('12345678', 'Paijo', 1, '2013-01-10', 'Jln. Manggis\r\n', 'pimpinan', '', '', ''),
('234', 'David Aditya', 1, '2013-01-10', 'Jalan Jeruk Timur III', 'pimpinan', 'david', '$2y$10$Xdm3t/eLj4cUqhnLmlRFtuHYZP24o6B/KuLEwOeBdev1yxLOKfiRK', 'aGV6irnc6bqLQGWwcwwPS1dSEL9JaYXmGWl2IOxf8EGBLNYQzhvfMxrPLITf'),
('654', 'Rara', 1, '2014-01-10', 'asd', 'hr', 'rara', '$2y$10$rRsW/jxkVQJ7RX712TPhu.WVvGvsQv1nz4ylI1AYT0SG50yYsSXj.', 'MInSot5SV4kWj8CohxvultBCYVzOKPNm3nd6w1vL9FubbEwOY8kOwhpjaMQu');

-- --------------------------------------------------------

--
-- Table structure for table `notifikasi`
--

CREATE TABLE IF NOT EXISTS `notifikasi` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `to` varchar(11) NOT NULL,
  `content` varchar(255) NOT NULL,
  `status` varchar(6) NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Dumping data for table `notifikasi`
--

INSERT INTO `notifikasi` (`id`, `to`, `content`, `status`, `created_at`, `updated_at`) VALUES
(1, '234', 'Pengajuan Lembur tanggal 2014-06-10 ditolak', 'read', '2014-08-10 14:11:24', '2014-08-10 14:14:12'),
(2, '654', 'Pengajuan Lembur tanggal 2012-10-10 telah diterima', 'read', '2014-08-10 14:12:37', '2014-08-10 14:12:49'),
(3, '234', 'Pengajuan Lembur tanggal 2014-06-10 ditolak', 'read', '2014-08-10 14:13:27', '2014-08-10 14:13:46'),
(4, '234', 'Pengajuan Lembur tanggal 2014-06-10 ditolak', 'read', '2014-08-10 14:13:29', '2014-08-10 14:13:41');

-- --------------------------------------------------------

--
-- Table structure for table `pengajuan_lembur`
--

CREATE TABLE IF NOT EXISTS `pengajuan_lembur` (
  `no_spl` int(11) NOT NULL AUTO_INCREMENT,
  `tanggal` date NOT NULL,
  `mulai` time NOT NULL,
  `selesai` time NOT NULL,
  `keperluan` varchar(200) NOT NULL,
  `nik` varchar(20) NOT NULL,
  `id_bagian` int(11) NOT NULL,
  `status` varchar(100) NOT NULL,
  `disetujui_hr` tinyint(1) NOT NULL,
  `disetujui_pimpinan` tinyint(1) NOT NULL,
  PRIMARY KEY (`no_spl`),
  KEY `id_bagian` (`id_bagian`),
  KEY `nik` (`nik`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=9 ;

--
-- Dumping data for table `pengajuan_lembur`
--

INSERT INTO `pengajuan_lembur` (`no_spl`, `tanggal`, `mulai`, `selesai`, `keperluan`, `nik`, `id_bagian`, `status`, `disetujui_hr`, `disetujui_pimpinan`) VALUES
(1, '2012-10-10', '20:00:00', '21:00:00', 'asdf', '654', 1, '<label class="success">Diterima</label>', 1, 1),
(2, '2012-10-10', '12:00:00', '20:00:00', 'menadf', '234', 1, '<label class="success">Diterima</label>', 1, 1),
(3, '2012-10-10', '20:00:00', '21:00:00', 'asdf', '654', 1, '<label class="success">Diterima</label>', 1, 1),
(4, '2012-10-10', '20:00:00', '21:00:00', 'asdf', '234', 1, '<label class=''danger''>Belum Disetujui</label>', 0, 0),
(5, '2012-10-10', '20:00:00', '21:00:00', 'asdf', '234', 1, '<label class=''danger''>Belum Disetujui</label>', 0, 0),
(6, '2014-06-10', '20:00:00', '21:00:00', 'asfas', '234', 1, '<label class="success">Diterima</label>', 1, 1),
(7, '2014-06-12', '20:00:00', '21:00:00', 'afsdf', '1234', 1, '<label class="success">Diterima</label>', 1, 1),
(8, '2014-06-10', '20:00:00', '21:00:00', 'Narik FO', '234', 1, '<label class="danger">Ditolak</label>', 0, 1);

--
-- Constraints for dumped tables
--

--
-- Constraints for table `data_karyawan_lembur`
--
ALTER TABLE `data_karyawan_lembur`
  ADD CONSTRAINT `data_karyawan_lembur_ibfk_1` FOREIGN KEY (`no_spl`) REFERENCES `pengajuan_lembur` (`no_spl`);

--
-- Constraints for table `karyawan`
--
ALTER TABLE `karyawan`
  ADD CONSTRAINT `karyawan_ibfk_1` FOREIGN KEY (`id_bagian`) REFERENCES `bagian` (`id`) ON DELETE NO ACTION ON UPDATE CASCADE;

--
-- Constraints for table `pengajuan_lembur`
--
ALTER TABLE `pengajuan_lembur`
  ADD CONSTRAINT `pengajuan_lembur_ibfk_2` FOREIGN KEY (`id_bagian`) REFERENCES `bagian` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
