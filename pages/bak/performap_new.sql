-- phpMyAdmin SQL Dump
-- version 4.7.7
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 02, 2020 at 04:25 PM
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
-- Database: `performap360`
--
CREATE DATABASE IF NOT EXISTS `performap360` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `performap360`;

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
-- Table structure for table `detail_karbag`
--

CREATE TABLE `detail_karbag` (
  `Nama_Lengkap` varchar(50) NOT NULL,
  `nambag` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `detail_nilai`
--

CREATE TABLE `detail_nilai` (
  `kdnilai` varchar(20) NOT NULL,
  `kdkri` varchar(20) NOT NULL,
  `kdsub` varchar(20) NOT NULL,
  `kdpenilai` varchar(20) NOT NULL,
  `nilai` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `detail_nilai`
--

INSERT INTO `detail_nilai` (`kdnilai`, `kdkri`, `kdsub`, `kdpenilai`, `nilai`) VALUES
('1', '01', 'A', '01', 5),
('1', '01', 'B', '01', 5),
('1', '02', 'A2', '01', 4),
('1', '02', 'B2', '01', 4),
('1', '03', 'A3', '01', 4),
('1', '03', 'B3', '01', 4),
('1', '03', 'C3', '01', 3),
('1', '04', 'A4', '01', 5),
('1', '04', 'B4', '01', 4),
('1', '04', 'C4', '01', 4),
('1', '05', 'A5', '01', 5),
('1', '05', 'B5', '01', 3),
('1', '05', 'C5', '01', 5),
('1', '06', 'A6', '01', 5),
('1', '06', 'B6', '01', 5),
('1', '06', 'C6', '01', 5),
('1', '06', 'D6', '01', 4),
('1', '07', 'A7', '01', 5),
('1', '07', 'B7', '01', 5),
('1', '07', 'C7', '01', 4),
('2', '01', 'A', '02', 5),
('2', '01', 'B', '02', 4),
('2', '02', 'A2', '02', 4),
('2', '02', 'B2', '02', 5),
('2', '03', 'A3', '02', 3),
('2', '03', 'B3', '02', 4),
('2', '03', 'C3', '02', 3),
('2', '04', 'A4', '02', 2),
('2', '04', 'B4', '02', 5),
('2', '04', 'C4', '02', 4),
('2', '05', 'A5', '02', 4),
('2', '05', 'B5', '02', 5),
('2', '05', 'C5', '02', 5),
('2', '06', 'A6', '02', 5),
('2', '06', 'B6', '02', 5),
('2', '06', 'C6', '02', 5),
('2', '06', 'D6', '02', 4),
('3', '04', 'A4', '04', 5),
('3', '04', 'B4', '04', 5),
('3', '04', 'C4', '04', 2),
('3', '06', 'A6', '04', 5),
('3', '06', 'B6', '04', 5),
('3', '06', 'C6', '04', 4),
('3', '06', 'D6', '04', 5),
('3', '07', 'A7', '04', 5),
('3', '07', 'B7', '04', 4),
('3', '07', 'C7', '04', 5);

-- --------------------------------------------------------

--
-- Table structure for table `master_bagian`
--

CREATE TABLE `master_bagian` (
  `kdbag` varchar(50) NOT NULL,
  `nambag` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `master_bagian`
--

INSERT INTO `master_bagian` (`kdbag`, `nambag`) VALUES
('01', 'Direktur'),
('02', 'Keuangan'),
('03', 'Administrasi Keuangan Pajak'),
('04', 'Marketing'),
('05', 'Bag. Penagihan/expedisi'),
('06', 'Expedisi Barang'),
('07', 'Administrasi Umum'),
('08', 'Administrasi Gudang'),
('09', 'Teknisi'),
('10', 'Magang');

-- --------------------------------------------------------

--
-- Table structure for table `master_bobot`
--

CREATE TABLE `master_bobot` (
  `kdbobot` varchar(20) NOT NULL,
  `kdkri` varchar(20) NOT NULL,
  `kdpenilai` varchar(20) NOT NULL,
  `bobot` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `master_bobot`
--

INSERT INTO `master_bobot` (`kdbobot`, `kdkri`, `kdpenilai`, `bobot`) VALUES
('01', '01', '01', 8),
('02', '01', '02', 6),
('03', '01', '03', 6),
('04', '02', '01', 10),
('05', '02', '02', 10),
('06', '03', '01', 5),
('07', '03', '02', 5),
('08', '04', '01', 5),
('09', '04', '02', 5),
('10', '04', '04', 5),
('11', '05', '01', 5),
('12', '05', '02', 5),
('13', '05', '03', 5),
('14', '06', '01', 3),
('15', '06', '02', 3),
('16', '06', '03', 2),
('17', '06', '04', 2),
('18', '07', '01', 4),
('19', '07', '04', 2),
('20', '07', '03', 4);

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
-- Table structure for table `master_jabatan`
--

CREATE TABLE `master_jabatan` (
  `kdjab` varchar(20) NOT NULL,
  `namjab` varchar(50) NOT NULL,
  `akses` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `master_jabatan`
--

INSERT INTO `master_jabatan` (`kdjab`, `namjab`, `akses`) VALUES
('01', 'Direktur', 'Manajer'),
('02', 'Manajer', 'Manajer'),
('03', 'Kepala Gudang', 'Manajer'),
('04', 'Administrasi Gudang', 'Administrasi'),
('05', 'Magang', 'Pegawai');

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
  `Jabatan` varchar(50) NOT NULL,
  `NIKatasan` varchar(11) NOT NULL,
  `foto` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `master_karyawan`
--

INSERT INTO `master_karyawan` (`NIK`, `Nama_Lengkap`, `Password`, `Alamat`, `Telp`, `Jenis_Kelamin`, `Tgl_Lahir`, `Bagian`, `Jabatan`, `NIKatasan`, `foto`) VALUES
('01.1', 'M. Taufik Krisdianto', '123456', '.......', '1234567891011', 'Laki-Laki', '2019-02-14', 'Direktur', 'Direktur', '01.1', 'foto/30062020084837_14022019090429_dummy.jpg'),
('02.1', 'Aslicha', '123456', '.....', '00000000000', 'Perempuan', '1970-07-08', 'Keuangan', 'Manajer', '01.1', 'foto/19022019114817_15.2_11022019_120549.jpg'),
('02.2', 'Ramadhany Kkkk', '654321', 'Pondok Jati', '08799966644455', 'Laki-Laki', '2020-06-30', 'Keuangan', 'Magang', '02.1', 'foto/30062020085633_19022019153804_1550561835548750.jpg'),
('04.1', 'Gede Nugraha', '123456', '......', '00000000000', 'Laki-Laki', '2019-02-14', 'Marketing', '', '', 'foto/14022019092039_dummy.jpg'),
('05.1', 'Farid Pradana', '123456', '.......', '00000000000', 'Laki-Laki', '2019-02-14', 'Bag. Penagihan/Expedisi', '', '', 'foto/14022019091629_dummy.jpg'),
('07.1', 'Nursyifa Wanti', '123456', '......', '00000000000', 'Perempuan', '2019-02-14', 'Administrasi Umum', '', '', 'foto/14022019091139_dummy.jpg'),
('08.1', 'Ella Ramadhanti', '123456', '.......', '00000000000', 'Perempuan', '2019-02-14', 'Administrasi Gudang', '', '', 'foto/14022019091515_dummy.jpg'),
('09.1', 'Afifudin Muhammad', '123456', '......', '00000000000', 'Laki-Laki', '2019-02-14', 'Teknisi', '', '', 'foto/18022019162255_double.jpg'),
('09.2', 'Ramadhany Kkkk', '123456', 'pondok jati', '08799966644455', 'Laki-Laki', '2020-06-30', 'Teknisi', 'Magang', '02.1', 'foto/30062020084931_19022019144840_fotoOspek2x3.jpg');

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
-- Table structure for table `master_rating`
--

CREATE TABLE `master_rating` (
  `kdrating` varchar(20) NOT NULL,
  `rating` varchar(20) NOT NULL,
  `ketrating` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `master_rating`
--

INSERT INTO `master_rating` (`kdrating`, `rating`, `ketrating`) VALUES
('01', '5', 'Sangat Baik'),
('02', '4', 'Baik'),
('03', '3', 'Standar'),
('04', '2', 'Kurang'),
('05', '1', 'Sangat Kurang');

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
('02', 'B2', 'Kehadiran Karyawan', 'Karyawan dalam memenuhi kehadirannya', 1),
('03', 'A3', 'Memiliki Pengetahuan, Keahlian Dan Pengalaman Untuk Mengerjakan Pekerjaan Dengan Efektif.', 'Memiliki pengetahuan, keahlian dan pengalaman untuk mengerjakan pekerjaan dengan efektif.', 1),
('03', 'B3', 'Dapat Menjalankan Fungsi/tugas-tugas/proses-proses Dengan Baik Dan Efektif.', 'Dapat menjalankan fungsi/tugas-tugas/proses-proses dengan baik dan efektif.', 1),
('04', 'A4', 'Memiliki Kejujuran Dan Loyalitas.', 'Memiliki kejujuran dan loyalitas.', 1),
('04', 'B4', 'Mengerti Kode Etik Perusahaan Dan Bisa Menerapkan Etika Standar Terbaik.', 'Mengerti kode etik perusahaan dan bisa menerapkan etika standar terbaik.', 1),
('03', 'C3', 'Dapat Mengerjakan Tugas-tugas/pekerjaan Secara Independen Tanpa Bantuan.', 'Dapat mengerjakan tugas-tugas/pekerjaan secara independen tanpa bantuan.', 1),
('04', 'C4', 'Menempatkan Kepentingan Perusahaan Diatas Kepentingan Pribadi.', 'Menempatkan kepentingan perusahaan diatas kepentingan pribadi.', 1),
('05', 'A5', 'Menunjukkan Perilaku Positif Terhadap Pekerjaan, Rekan Kerja, Atasan Dan Perusahaan.', 'Menunjukkan perilaku positif terhadap pekerjaan, rekan kerja, atasan dan perusahaan.', 1),
('05', 'B5', 'Selalu Berusaha Untuk Bekerja Keras Dan Mempunyai Rasa Memiliki Tempat Kerjanya.', 'Selalu berusaha untuk bekerja keras dan mempunyai rasa memiliki tempat kerjanya.', 1),
('05', 'C5', 'Menyampaikan Yang Dijanjikan Kepada Atasan, Klien (internal & Eksternal)/lainnya.', 'Menyampaikan yang dijanjikan kepada atasan, klien (internal & eksternal)/lainnya.', 1),
('06', 'A6', 'Bisa Menyampaikan & Menjelaskan Ide Secara Jelas, Sederhana, Fokus Dan Efisien.', 'Bisa menyampaikan & menjelaskan ide secara jelas, sederhana, fokus dan efisien.', 1),
('06', 'B6', 'Bisa Berbicara Dengan Efektif.', 'Bisa berbicara dengan efektif.', 1),
('06', 'C6', 'Membangun Kepercayaan Dgn Membuka Komunikasi Dua Arah/komunikasi Terbuka Dgn Lainnya.', 'Membangun kepercayaan dgn membuka komunikasi dua arah/komunikasi terbuka dgn lainnya.', 1),
('06', 'D6', 'Dapat Meyakinkan Orang Lain Dengan Komunikasi Lisan Dan Tertulis.', 'Dapat meyakinkan orang lain dengan komunikasi lisan dan tertulis.', 1),
('07', 'A7', 'Memahami Dan Mengidentifikasi Siapa Pelanggan Internal / Pelanggan Eksternalnya.', 'Memahami dan mengidentifikasi siapa pelanggan internal / pelanggan eksternalnya.', 1),
('07', 'B7', 'Melakukan Hal Yang Benar Untuk Memenuhi Kebutuhan Dan Harapan Klien.', 'Melakukan hal yang benar untuk memenuhi kebutuhan dan harapan klien.', 1),
('07', 'C7', 'Melayani Pelanggan Dengan Pro Aktif Menanggapi Kebutuhan Dan Permintaan Klien.', 'Melayani pelanggan dengan pro aktif menanggapi kebutuhan dan permintaan klien.', 1);

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
-- Table structure for table `transaksi_penilaian`
--

CREATE TABLE `transaksi_penilaian` (
  `kdnilai` varchar(20) NOT NULL,
  `nik` varchar(11) NOT NULL,
  `periode` varchar(10) NOT NULL,
  `kdpenilai` varchar(20) NOT NULL,
  `tglnilai` date NOT NULL,
  `nikpenilai` varchar(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `transaksi_penilaian`
--

INSERT INTO `transaksi_penilaian` (`kdnilai`, `nik`, `periode`, `kdpenilai`, `tglnilai`, `nikpenilai`) VALUES
('1', '02.1', '07-2020', '01', '2020-07-01', '01.1'),
('2', '02.1', '07-2020', '02', '2020-07-01', '02.2'),
('3', '02.1', '07-2020', '04', '2020-07-02', 'Customer');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `master_bagian`
--
ALTER TABLE `master_bagian`
  ADD PRIMARY KEY (`kdbag`);

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
-- Indexes for table `master_jabatan`
--
ALTER TABLE `master_jabatan`
  ADD PRIMARY KEY (`kdjab`);

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
-- Indexes for table `master_rating`
--
ALTER TABLE `master_rating`
  ADD PRIMARY KEY (`kdrating`);

--
-- Indexes for table `master_supplier`
--
ALTER TABLE `master_supplier`
  ADD PRIMARY KEY (`No_Customer`);

--
-- Indexes for table `transaksi_penilaian`
--
ALTER TABLE `transaksi_penilaian`
  ADD PRIMARY KEY (`kdnilai`);

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
