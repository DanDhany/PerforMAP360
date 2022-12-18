-- phpMyAdmin SQL Dump
-- version 4.7.7
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 28, 2020 at 05:32 PM
-- Server version: 10.1.30-MariaDB
-- PHP Version: 7.2.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `pt-shd`
--
CREATE DATABASE IF NOT EXISTS `pt-shd` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `pt-shd`;

-- --------------------------------------------------------

--
-- Table structure for table `absensi_karyawan`
--

CREATE TABLE `absensi_karyawan` (
  `NIK` varchar(11) NOT NULL,
  `tgl_kerja` date NOT NULL,
  `absen_masuk` time NOT NULL,
  `foto_masuk` text NOT NULL,
  `absen_keluar` time NOT NULL,
  `foto_keluar` text NOT NULL,
  `ket` varchar(50) NOT NULL,
  `tgl_pengajuan` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `absensi_karyawan`
--

INSERT INTO `absensi_karyawan` (`NIK`, `tgl_kerja`, `absen_masuk`, `foto_masuk`, `absen_keluar`, `foto_keluar`, `ket`, `tgl_pengajuan`) VALUES
('07.1', '2019-02-14', '00:00:00', '', '00:00:00', '', 'Sakit', '2019-02-14'),
('10.1', '2019-02-18', '00:00:00', '', '00:00:00', '', 'Izin', '2019-02-15'),
('10.1', '2019-02-15', '10:49:09', '', '00:00:00', '', '', '0000-00-00'),
('10.1', '2019-02-20', '08:30:00', '', '17:30:00', '', '', '0000-00-00'),
('10.1', '2019-02-22', '00:00:00', '', '00:00:00', '', 'Izin Ditolak', '2019-02-18'),
('01.1', '2019-02-23', '00:00:00', '', '00:00:00', '', 'Cuti', '2019-02-18'),
('10.1', '2019-02-26', '00:00:00', '', '00:00:00', '', 'Izin', '2019-02-18'),
('02.1', '2019-02-19', '00:00:00', '', '00:00:00', '', 'Izin', '2019-02-18'),
('02.1', '2019-02-18', '08:00:00', '', '16:30:00', '', '', '0000-00-00'),
('10.1', '2019-02-19', '00:00:00', '', '00:00:00', '', 'Izin', '2019-02-18'),
('09.1', '2019-02-19', '10:51:36', '', '10:53:20', '', '', '0000-00-00'),
('03.1', '2019-02-19', '11:19:27', '', '00:00:00', '', '', '0000-00-00'),
('10.1', '2019-02-27', '00:00:00', '', '00:00:00', '', '', '2019-02-19'),
('10.1', '2019-03-01', '00:00:00', '', '00:00:00', '', 'Izin', '2019-02-19'),
('10.1', '2019-02-28', '00:00:00', '', '00:00:00', '', 'Cuti', '2019-02-20'),
('10.1', '2019-02-23', '00:00:00', '', '00:00:00', '', 'Cuti', '2019-02-20'),
('10.1', '2019-02-25', '00:00:00', '', '00:00:00', '', 'Izin', '2019-02-20'),
('10.1', '2019-02-01', '00:00:00', '', '00:00:00', '', 'Izin', '2019-02-20'),
('10.1', '2019-02-02', '00:00:00', '', '00:00:00', '', 'Cuti', '2019-02-20'),
('02.1', '2019-02-20', '08:30:00', '', '16:30:00', '', 'Izin', '0000-00-00'),
('10.1', '2019-03-05', '00:00:00', '', '00:00:00', '', 'Izin', '2019-02-21'),
('10.1', '2019-03-06', '00:00:00', '', '00:00:00', '', 'Izin Ditolak', '2019-02-21'),
('10.1', '2019-02-07', '00:00:00', '', '00:00:00', '', 'Cuti', '2019-02-21'),
('10.1', '2019-03-08', '00:00:00', '', '00:00:00', '', 'Izin Ditolak', '2019-02-21'),
('10.1', '2019-03-12', '00:00:00', '', '00:00:00', '', 'Izin', '2019-02-21'),
('10.1', '2019-03-13', '00:00:00', '', '00:00:00', '', 'Cuti', '2019-02-21'),
('10.1', '2019-03-14', '00:00:00', '', '00:00:00', '', 'Izin Ditolak', '2019-02-21'),
('10.1', '2019-03-15', '00:00:00', '', '00:00:00', '', 'Cuti Ditolak', '2019-02-21'),
('10.1', '2019-03-23', '00:00:00', '', '00:00:00', '', 'Cuti', '2019-02-21'),
('01.1', '2019-02-22', '08:29:00', '', '16:31:00', '', '', '0000-00-00'),
('01.1', '2019-02-22', '08:29:00', '', '16:31:00', '', '', '0000-00-00'),
('01.1', '2019-02-22', '08:29:00', '', '16:31:00', '', '', '0000-00-00'),
('01.1', '2019-02-22', '08:29:00', '', '16:31:00', '', '', '0000-00-00'),
('02.1', '2019-02-22', '08:29:00', '', '16:31:00', '', '', '0000-00-00'),
('01.1', '2019-05-11', '12:34:56', '', '12:35:13', '', '', '0000-00-00'),
('10.1', '2019-10-24', '15:25:14', '', '15:25:26', '', '', '0000-00-00'),
('192.168.1.6', '2019-10-25', '00:00:00', '', '00:00:00', '', 'Cuti', '2019-10-24'),
('192.168.1.6', '2019-10-28', '00:00:00', '', '00:00:00', '', 'Izin Ditolak', '2019-10-24'),
('10.1', '2019-10-21', '00:00:00', '', '00:00:00', '', 'Izin', '2019-10-24'),
('10.1', '2019-10-25', '08:18:00', '', '16:31:00', '', 'Cuti Ditolak', '2019-10-24'),
('10.1', '2019-10-26', '00:00:00', '', '00:00:00', '', 'Pengajuan Cuti : off', '2019-10-25'),
('10.1', '2019-10-01', '08:18:00', '', '16:31:00', '', '', '0000-00-00'),
('10.1', '2019-10-02', '08:29:00', '', '16:31:00', '', '', '0000-00-00'),
('10.1', '2019-10-03', '08:18:00', '', '16:31:00', '', '', '0000-00-00'),
('10.1', '2019-10-04', '08:18:00', '', '16:31:00', '', '', '0000-00-00'),
('10.1', '2019-10-05', '08:18:00', '', '16:31:00', '', '', '0000-00-00'),
('10.1', '2019-10-07', '08:18:00', '', '16:31:00', '', '', '0000-00-00'),
('10.1', '2019-10-08', '08:18:00', '', '16:31:00', '', '', '0000-00-00'),
('10.1', '2019-10-09', '08:18:00', '', '16:31:00', '', '', '0000-00-00'),
('10.1', '2019-10-10', '08:18:00', '', '16:31:00', '', '', '0000-00-00'),
('10.1', '2019-10-11', '08:18:00', '', '16:31:00', '', '', '0000-00-00'),
('10.1', '2019-10-12', '08:18:00', '', '16:31:00', '', '', '0000-00-00'),
('10.1', '2019-10-14', '08:31:00', '', '16:31:00', '', '', '0000-00-00'),
('10.1', '2019-10-15', '08:18:00', '', '16:31:00', '', '', '0000-00-00'),
('10.1', '2019-10-16', '08:18:00', '', '16:31:00', '', '', '0000-00-00'),
('10.1', '2019-10-18', '08:18:00', '', '16:31:00', '', '', '0000-00-00'),
('10.1', '2019-10-19', '08:18:00', '', '16:31:00', '', '', '0000-00-00'),
('10.1', '2019-10-22', '00:00:00', '', '00:00:00', '', 'Sakit', '2019-10-21'),
('10.1', '2019-10-23', '08:18:00', '', '16:31:00', '', '', '0000-00-00'),
('10.1', '2019-10-26', '08:18:00', '', '16:31:00', '', '', '0000-00-00'),
('10.1', '2019-10-28', '08:18:00', '', '16:31:00', '', '', '0000-00-00'),
('10.1', '2019-10-29', '08:18:00', '', '16:31:00', '', '', '0000-00-00'),
('10.1', '2019-10-31', '00:00:00', '', '00:00:00', '', 'Cuti', '2019-10-25'),
('10.1', '2019-10-17', '00:00:00', '', '00:00:00', '', 'Izin', '2019-10-26'),
('01.1', '2019-10-01', '08:30:00', '', '16:30:00', '', '', '0000-00-00'),
('01.1', '2019-10-02', '08:30:00', '', '16:30:00', '', '', '0000-00-00'),
('01.1', '2019-10-03', '08:30:00', '', '16:30:00', '', '', '0000-00-00'),
('01.1', '2019-10-04', '08:30:00', '', '16:30:00', '', '', '0000-00-00'),
('01.1', '2019-10-05', '08:30:00', '', '16:30:00', '', '', '0000-00-00'),
('01.1', '2019-10-07', '08:30:00', '', '16:30:00', '', '', '0000-00-00'),
('01.1', '2019-10-08', '08:30:00', '', '16:30:00', '', '', '0000-00-00'),
('01.1', '2019-10-09', '08:30:00', '', '16:30:00', '', '', '0000-00-00'),
('01.1', '2019-10-10', '08:30:00', '', '16:30:00', '', '', '0000-00-00'),
('01.1', '2019-10-11', '08:30:00', '', '16:30:00', '', '', '0000-00-00'),
('01.1', '2019-10-12', '08:30:00', '', '16:30:00', '', '', '0000-00-00'),
('01.1', '2019-10-14', '08:30:00', '', '16:30:00', '', '', '0000-00-00'),
('01.1', '2019-10-15', '08:30:00', '', '16:30:00', '', '', '0000-00-00'),
('01.1', '2019-10-16', '08:30:00', '', '16:30:00', '', '', '0000-00-00'),
('01.1', '2019-10-17', '08:30:00', '', '16:30:00', '', '', '0000-00-00'),
('01.1', '2019-10-18', '08:30:00', '', '16:30:00', '', '', '0000-00-00'),
('01.1', '2019-10-19', '08:30:00', '', '16:30:00', '', '', '0000-00-00'),
('01.1', '2019-10-21', '08:30:00', '', '16:30:00', '', '', '0000-00-00'),
('01.1', '2019-10-22', '08:30:00', '', '16:30:00', '', '', '0000-00-00'),
('01.1', '2019-10-23', '08:30:00', '', '16:30:00', '', '', '0000-00-00'),
('01.1', '2019-10-24', '08:30:00', '', '16:30:00', '', '', '0000-00-00'),
('01.1', '2019-10-25', '08:30:00', '', '16:30:00', '', '', '0000-00-00'),
('01.1', '2019-10-26', '08:30:00', '', '16:30:00', '', '', '0000-00-00'),
('01.1', '2019-10-28', '08:30:00', '', '16:30:00', '', '', '0000-00-00'),
('01.1', '2019-10-29', '08:30:00', '', '16:30:00', '', '', '0000-00-00'),
('01.1', '2019-10-30', '08:30:00', '', '16:30:00', '', '', '0000-00-00'),
('01.1', '2019-10-31', '08:30:00', '', '16:30:00', '', '', '0000-00-00'),
('01.1', '2020-03-07', '11:14:59', '', '11:15:37', '', '', '0000-00-00');

-- --------------------------------------------------------

--
-- Table structure for table `detail_beli`
--

CREATE TABLE `detail_beli` (
  `Kode_TBeli` varchar(20) NOT NULL,
  `Qty` int(11) NOT NULL,
  `Nama_Barang` varchar(150) NOT NULL,
  `Harga` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `detai_jual`
--

CREATE TABLE `detai_jual` (
  `Kode_TJual` varchar(20) NOT NULL,
  `Qty` int(6) NOT NULL,
  `Nama_Barang` varchar(150) NOT NULL,
  `Harga` int(11) NOT NULL,
  `Qty_Kirim` int(11) NOT NULL,
  `Status_Kirim` varchar(25) NOT NULL,
  `Status_Bayar` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `detai_jual`
--

INSERT INTO `detai_jual` (`Kode_TJual`, `Qty`, `Nama_Barang`, `Harga`, `Qty_Kirim`, `Status_Kirim`, `Status_Bayar`) VALUES
('1', 2, 'Albumin 021 Diasys', 319682, 0, 'Belum', 'Belum'),
('2', 4, 'Albumin 021 Diasys', 319682, 0, 'Belum', 'Belum'),
('2', 7, 'Alk.Phospate 021 Diasys', 423016, 0, 'Belum', 'Belum'),
('3', 2, 'Albumin 021 Diasys', 319682, 0, 'Belum', 'Belum'),
('3', 2, 'Albumin ERBA', 1621400, 0, 'Belum', 'Belum'),
('3', 2, 'Alk.Phospate 021 Diasys', 423016, 0, 'Belum', 'Belum'),
('3', 2, 'Alk.Phospate ERBA', 1381600, 0, 'Belum', 'Belum'),
('4', 3, 'Albumin ERBA', 1621400, 0, 'Belum', 'Belum'),
('4', 7, 'Alk.Phospate 021 Diasys', 423016, 0, 'Belum', 'Belum'),
('4', 5, 'Alk.Phospate ERBA', 1381600, 0, 'Belum', 'Belum'),
('5', 3, 'Albumin ERBA', 1621400, 0, 'Belum', 'Belum'),
('5', 2, 'Alk.Phospate 021 Diasys', 423016, 0, 'Belum', 'Belum'),
('6', 4, 'Albumin 021 Diasys', 319682, 0, 'Belum', 'Belum'),
('6', 4, 'Alk.Phospate ERBA', 1381600, 0, 'Belum', 'Belum');

-- --------------------------------------------------------

--
-- Table structure for table `faktur`
--

CREATE TABLE `faktur` (
  `No_Faktur` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `faktur`
--

INSERT INTO `faktur` (`No_Faktur`) VALUES
(1),
(2),
(3),
(4),
(5),
(6),
(7);

-- --------------------------------------------------------

--
-- Table structure for table `kategori`
--

CREATE TABLE `kategori` (
  `ID` int(11) NOT NULL,
  `Nama_Kategori` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `kategori`
--

INSERT INTO `kategori` (`ID`, `Nama_Kategori`) VALUES
(1, 'REAGEN'),
(2, 'RAPID TEST'),
(3, 'ALKES'),
(4, 'CAIR & HEMA'),
(5, 'ALKES LAIN'),
(6, 'AGAN');

-- --------------------------------------------------------

--
-- Table structure for table `master_bagian`
--

CREATE TABLE `master_bagian` (
  `kdbag` varchar(50) NOT NULL,
  `nambag` varchar(50) NOT NULL,
  `akses` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `master_bagian`
--

INSERT INTO `master_bagian` (`kdbag`, `nambag`, `akses`) VALUES
('01', 'Direktur', 'Administrasi'),
('02', 'Keuangan', 'Pegawai'),
('03', 'Administrasi Keuangan Pajak', 'Pegawai'),
('04', 'Marketing', 'Pegawai'),
('05', 'Bag. Penagihan/expedisi', 'Pegawai'),
('06', 'Expedisi Barang', 'Pegawai'),
('07', 'Administrasi Umum', 'Pegawai'),
('08', 'Administrasi Gudang', 'Pegawai'),
('09', 'Teknisi', 'Pegawai'),
('10', 'Magang', 'Manajer');

-- --------------------------------------------------------

--
-- Table structure for table `master_barang`
--

CREATE TABLE `master_barang` (
  `No_Barang` varchar(20) NOT NULL,
  `Nama_Barang` varchar(200) NOT NULL,
  `Merk` varchar(100) NOT NULL,
  `Stok_Awal` int(11) NOT NULL,
  `Harga` int(11) NOT NULL,
  `Satuan` varchar(50) NOT NULL,
  `Jenis` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `master_barang`
--

INSERT INTO `master_barang` (`No_Barang`, `Nama_Barang`, `Merk`, `Stok_Awal`, `Harga`, `Satuan`, `Jenis`) VALUES
('1.1', 'Albumin 021 Diasys', 'Diasys', 10, 319682, 'Pcs', 'REAGEN'),
('1.10', 'Choleterol 021 Diasys', 'Diasys', 0, 552365, 'Box', 'REAGEN'),
('1.11', 'Cholesterol 026 Diasys', 'Diasys', 0, 1476200, 'Pack', 'REAGEN'),
('1.12', 'Cholesterol ERBA', 'ERBA', 0, 3003000, 'Box', 'REAGEN'),
('1.13', 'LDL Precipitat FS', 'Diasys', 0, 955295, 'Box', 'REAGEN'),
('1.14', 'CK-MB FS', 'Diasys', 0, 2274800, 'Box', 'REAGEN'),
('1.15', 'CRP Latex', 'Omega', 0, 266000, '0', 'REAGEN'),
('1.16', 'Control N', 'Teco', 0, 103675, '0', 'REAGEN'),
('1.17', 'Cacl2 0,025M', 'Teco', 0, 95700, '0', 'REAGEN'),
('1.18', 'Creatinine 021 Diasys', 'Diasys', 0, 350900, '0', 'REAGEN'),
('1.19', 'Creatinine 021 Diasys', 'Diasys', 0, 719950, '0', 'REAGEN'),
('1.2', 'Albumin ERBA', 'ERBA', 12, 1621400, 'Box', 'REAGEN'),
('1.20', 'Creatinine ERBA', 'ERBA', 0, 1036200, 'Buah', 'REAGEN'),
('1.21', 'Glucose 021 Diasys', 'Diasys', 0, 350900, '0', 'REAGEN'),
('1.22', 'Glucose 026 Diasys', 'Diasys', 0, 325017, '0', 'REAGEN'),
('1.23', 'Glucose ERBA', 'ERBA', 0, 1621400, '0', 'REAGEN'),
('1.24', 'Gol.Darah Anti D/Rhesus', 'Fortress', 0, 63000, '0', 'REAGEN'),
('1.25', 'Gamma GT 021 Diasys', 'Diasys', 0, 586423, '0', 'REAGEN'),
('1.26', 'Gamma GT ERBA', 'ERBA', 0, 1846900, '0', 'REAGEN'),
('1.27', 'Gol.Darah Anti A', 'Fortress', 0, 52250, '0', 'REAGEN'),
('1.28', 'Gol.Darah Anti B', 'Fortress', 0, 52250, '0', 'REAGEN'),
('1.29', 'Gol.Darah Anti AB', 'Fortress', 0, 56100, '0', 'REAGEN'),
('1.3', 'Alk.Phospate 021 Diasys', 'Diasys', 19, 423016, '0', 'REAGEN'),
('1.30', 'HDL Precipitat', 'Diasys', 0, 665500, '0', 'REAGEN'),
('1.31', 'LDH FS', 'Diasys', 0, 496881, '0', 'REAGEN'),
('1.32', 'ERBA NORM', 'ERBA', 0, 3122900, '0', 'REAGEN'),
('1.33', 'ERBA PATH', 'ERBA', 0, 3122900, '0', 'REAGEN'),
('1.34', 'Plasmotec Malaria', 'Plasmotec', 0, 2154240, '0', 'REAGEN'),
('1.35', 'PTS-Bubuk', 'Teco', 0, 119625, '0', 'REAGEN'),
('1.36', 'RF Omega', 'Omega', 0, 157500, '0', 'REAGEN'),
('1.37', 'Gamma GT FS', 'Omega', 0, 665500, '0', 'REAGEN'),
('1.4', 'Alk.Phospate ERBA', 'ERBA', 20, 1381600, '0', 'REAGEN'),
('1.5', 'ASO Fortress', 'Fotress', 0, 826551, '0', 'REAGEN'),
('1.6', 'APTT-S', 'Teco', 0, 444648, '0', 'REAGEN'),
('1.7', 'Billirubine Jendrassik Grof', 'Diasys', 0, 929665, '0', 'REAGEN'),
('1.8', 'Billirubine Total ERBA', 'ERBA', 0, 1727000, '0', 'REAGEN'),
('1.9', 'Billirubine Direct ERBA', 'ERBA', 0, 1621400, '0', 'REAGEN'),
('2.1', 'Amphetamine Device ', 'Answer', 0, 10000, '0', 'RAPID TEST'),
('3.1', 'Alkohol Swab', 'Lokal', 17, 520, '0', 'ALKES');

-- --------------------------------------------------------

--
-- Table structure for table `master_bobot`
--

CREATE TABLE `master_bobot` (
  `kdbobot` varchar(20) NOT NULL,
  `kdkri` varchar(20) NOT NULL,
  `kdpenilai` varchar(20) NOT NULL,
  `bobot` double NOT NULL,
  `jenis_bobot` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `master_bobot`
--

INSERT INTO `master_bobot` (`kdbobot`, `kdkri`, `kdpenilai`, `bobot`, `jenis_bobot`) VALUES
('01', '01', '01', 8, 'ALL'),
('02', '01', '02', 6, 'ALL'),
('03', '01', '03', 6, 'IN'),
('04', '02', '01', 10, 'ALL'),
('05', '02', '02', 10, 'ALL'),
('06', '03', '01', 5, 'ALL'),
('07', '03', '02', 5, 'ALL'),
('08', '04', '01', 5, 'ALL'),
('09', '04', '02', 5, 'ALL'),
('10', '04', '04', 5, 'EX'),
('11', '05', '01', 5, 'ALL'),
('12', '05', '02', 5, 'ALL'),
('13', '05', '03', 5, 'IN'),
('14', '06', '01', 3, 'ALL'),
('15', '06', '02', 3, 'ALL'),
('16', '06', '03', 2, 'IN'),
('17', '06', '04', 2, 'EX'),
('18', '07', '01', 4, 'ALL'),
('19', '07', '04', 2, 'EX'),
('20', '07', '03', 4, 'IN');

-- --------------------------------------------------------

--
-- Table structure for table `master_checkclock`
--

CREATE TABLE `master_checkclock` (
  `id_waktu` varchar(20) NOT NULL,
  `absen_masuk` time NOT NULL,
  `absen_keluar` time NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `master_checkclock`
--

INSERT INTO `master_checkclock` (`id_waktu`, `absen_masuk`, `absen_keluar`) VALUES
('Kerja', '08:30:00', '16:30:00');

-- --------------------------------------------------------

--
-- Table structure for table `master_customer`
--

CREATE TABLE `master_customer` (
  `No_Supplier` int(11) NOT NULL,
  `Nama_Supplier` varchar(200) NOT NULL,
  `Alamat_Supplier` varchar(250) NOT NULL,
  `NPWP` varchar(150) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `master_customer`
--

INSERT INTO `master_customer` (`No_Supplier`, `Nama_Supplier`, `Alamat_Supplier`, `NPWP`) VALUES
(1, 'Rumkit Bhayangkara Denpasar', ' Jl.Trijata No.32 Denpasar ', '00.264.197.5.901.000'),
(2, 'PT. QUANTUM SARANA MEDIK', ' Jl. Sesetan 20 Denpasar Selatan ', '01.413.620.4.904.000'),
(3, 'RSAD. UDAYANA (Lama)', 'Jl. PB Sudirman 1 Denpasar ', '00.264.152.0.901.000'),
(4, 'RSU. TRIJATA', 'Jl. Trijata 32 Denpasar ', '00.264.197.5.903.000'),
(5, 'RSU. WAYANG', 'Jl. RA Kartini 133 Denpasar  ', '00.162.529.2.901.000'),
(6, 'KANTOR KESEHATAN PELABUHAN', 'Jl. Airport Ngurah Rai Tuban, Kuta ', '00.278.481.7.901.000'),
(7, 'BIDDOKKES POLDA BALI', 'Jl. Trijata 32 Denpasar ', '00.307.352.5.903.000'),
(8, 'PT. NIKKI PURI MEDIKA', 'Jl. Gatot Subroto II No.5 Denpasar ', '02.353.298.9.901.000'),
(9, 'PT. ARI CANTI HUSADHA', 'Jl. Raya Mas, Br.Tarukan Mas Ubud, Gianyar Bali', '02.096.764.2.904.000'),
(10, 'RSUD. SANJIWAN, GIANYAR', 'Jl. Ciung Wanara 2 Gianyar ', '00.132.655.2.907.000'),
(11, 'PT. CAHYA WIRA BUANA', 'Jl. Kwanji Klod No.41 Sempidi Badung ', '01.777.494.4.904.000'),
(12, 'Adam Rosyad', ' Jl Kalijaten No 72', '16.41010.0092');

-- --------------------------------------------------------

--
-- Table structure for table `master_kalender`
--

CREATE TABLE `master_kalender` (
  `tgl` varchar(10) NOT NULL,
  `keterangan` varchar(50) NOT NULL,
  `sts` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `master_kalender`
--

INSERT INTO `master_kalender` (`tgl`, `keterangan`, `sts`) VALUES
('*-01-01', 'Tahun Baru', 'Libur Hari Besar'),
('*-05-01', 'Hari Buruh', 'Libur Hari Besar'),
('*-08-17', 'Kemerdekaan Indonesia', 'Libur Hari Besar'),
('2019-02-05', 'Imlek', 'Libur Hari Besar'),
('2019-03-03', 'Isra Miraj Nabi Muhammad', 'Libur Hari Besar'),
('2019-03-07', 'Hari Raya Nyepi (Tahun Baru Saka)', 'Libur Hari Besar'),
('2019-03-19', 'Wafat Isa Almasih', 'Libur Hari Besar'),
('2019-05-19', 'Hari Raya Waisak', 'Libur Hari Besar'),
('2019-05-30', 'Kenaikan Yesus Kristus', 'Libur Hari Besar'),
('2019-06-01', 'Hari Lahir Pancasila', 'Libur Hari Besar'),
('2019-06-05', 'Idul Fitri (lebaran Mudik)', 'Libur Hari Besar'),
('2019-06-06', 'Idul Fitri (lebaran Mudik)', 'Libur Hari Besar'),
('2019-08-11', 'Idul Adha (lebaran Haji)', 'Libur Hari Besar'),
('2019-09-01', 'Satu Muharam/tahun Baru Hijriyah', 'Libur Hari Besar'),
('2019-11-09', 'Maulid Nabi Muhammad', 'Libur Hari Besar'),
('2019-12-25', 'Hari Natal', 'Libur Hari Besar');

-- --------------------------------------------------------

--
-- Table structure for table `master_karyawan`
--

CREATE TABLE `master_karyawan` (
  `NIK` varchar(11) NOT NULL,
  `Nama_Lengkap` varchar(100) NOT NULL,
  `Password` varchar(8) NOT NULL,
  `Alamat` varchar(100) NOT NULL,
  `Telp` varchar(25) NOT NULL,
  `Jenis_Kelamin` varchar(12) NOT NULL,
  `Tgl_Lahir` date NOT NULL,
  `Bagian` varchar(50) NOT NULL,
  `foto` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `master_karyawan`
--

INSERT INTO `master_karyawan` (`NIK`, `Nama_Lengkap`, `Password`, `Alamat`, `Telp`, `Jenis_Kelamin`, `Tgl_Lahir`, `Bagian`, `foto`) VALUES
('01.1', 'M. Taufik Krisdianto', '123456', '.......', '1234567891011', 'Laki-Laki', '2019-02-14', 'Direktur', 'foto/25062020172431_14022019140018_dummy.jpg'),
('02.1', 'Aslicha', '123456', '.....', '00000000000', 'Perempuan', '1970-07-08', 'Keuangan', 'foto/19022019114817_15.2_11022019_120549.jpg'),
('04.1', 'Gede Nugraha', '123456', '......', '00000000000', 'Laki-Laki', '2019-02-14', 'Marketing', 'foto/14022019092039_dummy.jpg'),
('05.1', 'Farid Pradana', '123456', '.......', '00000000000', 'Laki-Laki', '2019-02-14', 'Bag. Penagihan/Expedisi', 'foto/14022019091629_dummy.jpg'),
('07.1', 'Nursyifa Wanti', '123456', '......', '00000000000', 'Perempuan', '2019-02-14', 'Administrasi Umum', 'foto/14022019091139_dummy.jpg'),
('08.1', 'Ella Ramadhanti', '123456', '.......', '00000000000', 'Perempuan', '2019-02-14', 'Administrasi Gudang', 'foto/14022019091515_dummy.jpg'),
('09.1', 'Afifudin Muhammad', '123456', '......', '00000000000', 'Laki-Laki', '2019-02-14', 'Teknisi', 'foto/18022019162255_double.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `master_kriteria`
--

CREATE TABLE `master_kriteria` (
  `kdkri` varchar(20) NOT NULL,
  `namkri` varchar(50) NOT NULL,
  `ketkri` text NOT NULL,
  `botkri` double NOT NULL,
  `status` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `master_kriteria`
--

INSERT INTO `master_kriteria` (`kdkri`, `namkri`, `ketkri`, `botkri`, `status`) VALUES
('01', 'Kinerja Dan Produktifitas', 'Menjelaskan mengenai kinerja utama dan produktifitas karyawan dalam pekerjaan', 20, 1),
('02', 'Kedisiplinan', 'Mengukur tingkat kedisiplinan karyawan dalam melakukan pekerjaan', 20, 1),
('03', 'Kemampuan Fungsi Teknik', 'Mengukur kemampuan karyawan dalam melakukan fungsi pekerjaannya', 10, 1),
('04', 'Etika Profesionalisme', 'Mengukur profesionalisme karyawan dalam melakukan pekerjaan', 15, 1),
('05', 'Komitmen', 'Mengukur komitmen karyawan dalam melakukan pekerjaannya', 15, 1),
('06', 'Kemampuan Berkomunikasi', 'Kecakapan karyawan dalam menghadapi rekan kerja atau customer', 10, 1),
('07', 'Kualitas Dan Fokus Pelanggan', 'Mengukur kualitas karyawan dalam menangani dan melayani customer tertentu', 10, 1);

-- --------------------------------------------------------

--
-- Table structure for table `master_penilai`
--

CREATE TABLE `master_penilai` (
  `kdpenilai` varchar(20) NOT NULL,
  `rolepenilai` varchar(50) NOT NULL,
  `ketrole` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `master_penilai`
--

INSERT INTO `master_penilai` (`kdpenilai`, `rolepenilai`, `ketrole`) VALUES
('01', 'Penilai 1 (M)', 'Penilai utama (manajer)'),
('02', 'Penilai 2 (R)', 'Penilai dari rekan kerja'),
('03', 'Penilai 3 (S)', 'Penilai merupakan atasan atau bawahan'),
('04', 'Penilai 4 (C)', 'Penilai dari eksternal, merupakan customer atau rekan kerja lain atau kepala bagian lain');

-- --------------------------------------------------------

--
-- Table structure for table `master_subkriteria`
--

CREATE TABLE `master_subkriteria` (
  `kdkri` varchar(20) NOT NULL,
  `kdsub` varchar(20) NOT NULL,
  `namsub` varchar(100) NOT NULL,
  `ketsub` text NOT NULL,
  `status` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `master_subkriteria`
--

INSERT INTO `master_subkriteria` (`kdkri`, `kdsub`, `namsub`, `ketsub`, `status`) VALUES
('01', 'A', 'Menghasilkan Kinerja Yang Diharapkan Sesuai Dengan Harapan Kerja (target Kerjanya)', 'Menghasilkan kinerja yang diharapkan sesuai dengan harapan kerja (target kerjanya)', 1),
('01', 'B', 'Dengan Efektifitas Diri Yang Tinggi Dan Bisa Mendorong Kinerja Organisasi', 'Efektifitas karyawan dalam mendorong kinerja organisasi', 1),
('02', 'A2', 'Ketepatan Waktu', 'Ketepatan waktu karyawan dalam melakukan pekerjaan dan mengisi shift', 1),
('02', 'B2', 'Kehadiran Karyawan', 'Karyawan dalam memenuhi kehadirannya', 1);

-- --------------------------------------------------------

--
-- Table structure for table `master_supplier`
--

CREATE TABLE `master_supplier` (
  `No_Customer` int(11) NOT NULL,
  `Nama_Customer` varchar(150) NOT NULL,
  `Alamat_Customer` varchar(200) NOT NULL,
  `Telepon` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `master_transaksi_beli`
--

CREATE TABLE `master_transaksi_beli` (
  `Kode_Beli` varchar(20) NOT NULL,
  `Tanggal_Beli` date NOT NULL,
  `Supplier` varchar(150) NOT NULL,
  `Alamat` varchar(200) NOT NULL,
  `Total` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `master_transaksi_jual`
--

CREATE TABLE `master_transaksi_jual` (
  `Kode_Jual` int(11) NOT NULL,
  `Tanggal_Jual` date NOT NULL,
  `Pelanggan` varchar(150) NOT NULL,
  `Alamat` varchar(200) NOT NULL,
  `NPWP` varchar(100) NOT NULL,
  `Total_Jual_Pajak` int(11) NOT NULL,
  `Diskon` int(11) NOT NULL,
  `Total_Awal` int(11) NOT NULL,
  `Tanggal_Bayar` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `master_transaksi_jual`
--

INSERT INTO `master_transaksi_jual` (`Kode_Jual`, `Tanggal_Jual`, `Pelanggan`, `Alamat`, `NPWP`, `Total_Jual_Pajak`, `Diskon`, `Total_Awal`, `Tanggal_Bayar`) VALUES
(1, '2019-02-20', 'RSU. TRIJATA', 'Jl. Trijata 32 Denpasar ', '00.264.197.5.903.000', 703300, 0, 639364, 4),
(2, '2019-02-06', 'RSU. WAYANG', 'Jl. RA Kartini 133 Denpasar  ', '00.162.529.2.901.000', 3964250, 15, 4239840, 2),
(3, '2019-02-20', 'RSUD. SANJIWAN, GIANYAR', 'Jl. Ciung Wanara 2 Gianyar ', '00.132.655.2.907.000', 8240536, 0, 7491396, 3),
(4, '2019-02-28', 'RSU. TRIJATA', 'Jl. Trijata 32 Denpasar ', '00.264.197.5.903.000', 16206643, 0, 14733312, 1),
(5, '2019-02-12', 'RSAD. UDAYANA (Lama)', 'Jl. PB Sudirman 1 Denpasar ', '00.264.152.0.901.000', 6281255, 0, 5710232, 3),
(6, '2019-02-12', 'RSAD. UDAYANA (Lama)', 'Jl. PB Sudirman 1 Denpasar ', '00.264.152.0.901.000', 6737077, 10, 6805128, 1);

-- --------------------------------------------------------

--
-- Table structure for table `photos`
--

CREATE TABLE `photos` (
  `id` int(11) NOT NULL,
  `photo_name` text NOT NULL,
  `photo_url` text NOT NULL,
  `caption` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `faktur`
--
ALTER TABLE `faktur`
  ADD PRIMARY KEY (`No_Faktur`);

--
-- Indexes for table `kategori`
--
ALTER TABLE `kategori`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `master_bagian`
--
ALTER TABLE `master_bagian`
  ADD PRIMARY KEY (`kdbag`);

--
-- Indexes for table `master_barang`
--
ALTER TABLE `master_barang`
  ADD PRIMARY KEY (`No_Barang`);

--
-- Indexes for table `master_bobot`
--
ALTER TABLE `master_bobot`
  ADD PRIMARY KEY (`kdbobot`);

--
-- Indexes for table `master_checkclock`
--
ALTER TABLE `master_checkclock`
  ADD PRIMARY KEY (`id_waktu`);

--
-- Indexes for table `master_customer`
--
ALTER TABLE `master_customer`
  ADD PRIMARY KEY (`No_Supplier`);

--
-- Indexes for table `master_karyawan`
--
ALTER TABLE `master_karyawan`
  ADD PRIMARY KEY (`NIK`);

--
-- Indexes for table `master_kriteria`
--
ALTER TABLE `master_kriteria`
  ADD PRIMARY KEY (`kdkri`);

--
-- Indexes for table `master_penilai`
--
ALTER TABLE `master_penilai`
  ADD PRIMARY KEY (`kdpenilai`);

--
-- Indexes for table `master_supplier`
--
ALTER TABLE `master_supplier`
  ADD PRIMARY KEY (`No_Customer`);

--
-- Indexes for table `master_transaksi_beli`
--
ALTER TABLE `master_transaksi_beli`
  ADD PRIMARY KEY (`Kode_Beli`);

--
-- Indexes for table `master_transaksi_jual`
--
ALTER TABLE `master_transaksi_jual`
  ADD PRIMARY KEY (`Kode_Jual`);

--
-- Indexes for table `photos`
--
ALTER TABLE `photos`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `photos`
--
ALTER TABLE `photos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

DELIMITER $$
--
-- Events
--
CREATE DEFINER=`root`@`localhost` EVENT `absen_direktur` ON SCHEDULE EVERY 1 DAY STARTS '2019-02-22 08:21:00' ON COMPLETION NOT PRESERVE ENABLE COMMENT 'Auto absen direktur' DO INSERT INTO `absensi_karyawan`(`NIK`, `tgl_kerja`, `absen_masuk`, `absen_keluar`) VALUES ('01.1',CURDATE(),'08:29:00','16:31:00'),('02.1',CURDATE(),'08:29:00','16:31:00')$$

DELIMITER ;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
