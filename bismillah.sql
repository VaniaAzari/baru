-- phpMyAdmin SQL Dump
-- version 4.8.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 10, 2018 at 05:50 PM
-- Server version: 10.1.31-MariaDB
-- PHP Version: 7.1.19

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `bismillah`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` int(10) UNSIGNED NOT NULL,
  `username` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nama` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `current_sign_in_at` timestamp NULL DEFAULT NULL,
  `last_sign_in_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `username`, `nama`, `password`, `remember_token`, `created_at`, `updated_at`, `current_sign_in_at`, `last_sign_in_at`) VALUES
(1, 'Admin', 'Administrator\r\n', 'admin123', '7u04aIUdVj9AwJLPBE7jOG1RwVSZ0BJqe2aZS9YObX0WiJiL5Tk3LHElOeyo', '2018-07-20 05:58:00', '2018-10-10 15:45:26', '2018-10-10 15:45:26', '2018-10-10 15:02:54');

-- --------------------------------------------------------

--
-- Table structure for table `angkatan`
--

CREATE TABLE `angkatan` (
  `id` int(11) NOT NULL,
  `nama_angkatan` varchar(255) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `angkatan`
--

INSERT INTO `angkatan` (`id`, `nama_angkatan`, `created_at`, `updated_at`) VALUES
(1, '2014', '2018-08-23 06:56:53', '2018-08-23 06:56:53'),
(2, '2015', '2018-08-23 06:56:58', '2018-08-23 06:56:58'),
(3, '2016', '2018-08-23 06:57:05', '2018-08-23 06:57:05'),
(5, '2017', '2018-08-28 23:28:48', '2018-08-28 23:28:48'),
(6, '2018', '2018-09-30 08:40:45', '2018-09-30 08:40:45');

-- --------------------------------------------------------

--
-- Table structure for table `chat`
--

CREATE TABLE `chat` (
  `id` int(11) NOT NULL,
  `topik` text NOT NULL,
  `kelas_id` int(11) NOT NULL,
  `angkatan_id` int(11) NOT NULL,
  `dosen_id` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `chat`
--

INSERT INTO `chat` (`id`, `topik`, `kelas_id`, `angkatan_id`, `dosen_id`, `created_at`, `updated_at`) VALUES
(1, '<p>Pembahasan Kapita Selekta</p>', 1, 1, 1, '2018-09-18 03:24:24', '2018-09-18 03:24:24'),
(5, '<p>czxxczxc</p>', 1, 1, 12, '2018-10-09 06:56:05', '2018-10-09 06:56:05');

-- --------------------------------------------------------

--
-- Table structure for table `chatmhs`
--

CREATE TABLE `chatmhs` (
  `id` int(11) NOT NULL,
  `chat_id` int(11) NOT NULL,
  `mahasiswa_id` int(11) DEFAULT NULL,
  `dosen_id` int(11) DEFAULT NULL,
  `kelas_id` int(11) NOT NULL,
  `angkatan_id` int(11) NOT NULL,
  `type` varchar(255) NOT NULL,
  `komentar` text NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `chatmhs`
--

INSERT INTO `chatmhs` (`id`, `chat_id`, `mahasiswa_id`, `dosen_id`, `kelas_id`, `angkatan_id`, `type`, `komentar`, `created_at`, `updated_at`) VALUES
(1, 1, NULL, 1, 1, 1, 'Dosen', 'Silahkan upload tugas kapita selekta pertemuan 1 sebelum jam 4 sore ya', '2018-09-18 03:24:59', '2018-09-18 03:24:59'),
(2, 1, 1, NULL, 1, 1, 'Mahasiswa', 'Baik bu...', '2018-09-18 10:14:44', '2018-09-18 10:14:44'),
(3, 2, NULL, 1, 2, 1, 'Dosen', 'Silakan kumpulkan tugas nya hari ini yaa..', '2018-09-29 11:07:39', '2018-09-29 11:07:39'),
(6, 1, 2, NULL, 1, 1, 'Mahasiswa', 'Baik bu..', '2018-09-30 07:59:44', '2018-09-30 07:59:44'),
(32, 10, NULL, 1, 1, 1, 'Dosen', 'sdvdsvsdv', '2018-10-10 15:41:16', '2018-10-10 15:41:16'),
(33, 10, 1, NULL, 1, 1, 'Mahasiswa', 'sacascasc', '2018-10-10 15:41:46', '2018-10-10 15:41:46');

-- --------------------------------------------------------

--
-- Table structure for table `dosen`
--

CREATE TABLE `dosen` (
  `id` int(11) NOT NULL,
  `username` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nama` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `jenis_kelamin` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `file_name` varchar(2555) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `current_sign_in_at` timestamp NULL DEFAULT NULL,
  `last_sign_in_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `dosen`
--

INSERT INTO `dosen` (`id`, `username`, `nama`, `jenis_kelamin`, `email`, `password`, `file_name`, `remember_token`, `created_at`, `updated_at`, `current_sign_in_at`, `last_sign_in_at`) VALUES
(1, '129007', 'Indah Lestari, S.S.T.,M.T', 'Perempuan', 'indah@pcr.ac.id', '129007', 'indah.JPG', 'GOdEhjSk3No9v8Lv0HdnfgIPXwc3rxhzecgKn6OBGbARTDnVLl5MzMo82kY4', '2018-08-12 05:48:16', '2018-10-10 15:46:56', '2018-10-10 15:46:56', '2018-10-10 15:43:26'),
(12, '148908', 'Istianah Muslim, S.T.M.T', 'Perempuan', 'istianah@pcr.ac.id', '148908', 'istianah_muslim.JPG', 'GEjf99VJ5V76IMYaVXHxXHD4PyC1Pm2wtLm1lWqGvskMQh46uodajmEmU5nK', '2018-08-29 20:29:14', '2018-10-10 03:58:06', '2018-10-10 03:58:06', '2018-10-09 22:19:31'),
(14, '078313', 'Memen Akbar, S.Si, M.T.', 'Laki-laki', 'memen@pcr.ac.id', '078313', 'pak memen.JPG', '0w0KZJiN7i6YP91wrXAuK35kL5F1CNwrhe0i7xV0vjONoq3u37oAKOt2Ihlg', '2018-09-24 01:18:16', '2018-10-09 06:58:07', '2018-10-09 06:58:07', '2018-10-09 06:58:07'),
(16, '078517', 'Ardianto Wibowo, S.Kom.,M.T.', 'Laki-laki', 'ardie@pcr.ac.id', '078517', 'pak ardi.JPG', 'WCvhYx125xOKa9Ji5L9GPNijaIQjCQfxTZDRNPIvGvAPGY6R0Y1Rxw7QJx5O', '2018-09-24 02:28:04', '2018-09-24 02:28:04', NULL, '0000-00-00 00:00:00'),
(17, '048108', 'Dini Nurmalasari, S.T.,M.T.', 'Perempuan', 'dini@pcr.ac.id', '048108', 'buk dini.JPG', 'eLuEw1xqcffY5hcTVRYEVLhpr1gk2TPhLH7N6qFrZbUUNFe0Po9WfwtACMMS', '2018-09-30 08:07:12', '2018-09-30 08:07:12', NULL, '0000-00-00 00:00:00'),
(18, '078306', 'Mardhiah Fadli, S.T.,M.T.', 'Perempuan', 'mardiah@pcr.ac.id', '078306', 'mardhiah_fadli.JPG', NULL, '2018-09-30 08:07:58', '2018-09-30 08:07:58', NULL, '0000-00-00 00:00:00'),
(19, '078504', 'Wenda Novayani, S.S.T.,M.Eng', 'Perempuan', 'wenda@pcr.ac.id', '078504', 'ibu_wenda.JPG', NULL, '2018-09-30 08:09:03', '2018-09-30 08:09:03', NULL, '0000-00-00 00:00:00'),
(20, '148809', 'Yoanda Alim Syahbana, S.T., M.Sc.', 'Laki-laki', 'yoanda@pcr.ac.id', '148809', 'pak_yoanda.JPG', 'gpfYNstowuXjeJNdYYNDzU2x8I76MmBkc8IV306P7KcghrXjmNkaDGTBfRG4', '2018-09-30 08:10:08', '2018-10-09 07:00:22', '2018-10-09 07:00:22', '2018-10-09 07:00:22'),
(21, '088503', 'Yuli Fitrisia, S.T.,M.T.', 'Perempuan', 'uli@pcr.ac.id', '088503', 'bu_uli.JPG', NULL, '2018-09-30 08:11:07', '2018-09-30 08:35:12', NULL, '0000-00-00 00:00:00'),
(22, '027710', 'Sugeng Purwantoro Edy Suranta G.S, S.T.,M.T.', 'Laki-laki', 'sugeng@pcr.ac.id', '027710', 'pak_sugeng.JPG', NULL, '2018-09-30 08:12:01', '2018-09-30 08:12:01', NULL, '0000-00-00 00:00:00'),
(23, '068407', 'Silvana Rasio Henim, S.ST', 'Perempuan', 'silvana@pcr.ac.id', '068407', 'bu_silvana.JPG', NULL, '2018-09-30 08:12:57', '2018-09-30 08:12:57', NULL, '0000-00-00 00:00:00'),
(24, '07001', 'Agus Urip Ari Wibowo, S.T.,M.T.', 'Laki-laki', 'agus@pcr.ac.id', '07001', 'pak_agus.JPG', NULL, '2018-09-30 08:14:44', '2018-09-30 08:14:44', NULL, '0000-00-00 00:00:00'),
(25, '108501', 'Ananda, S.Kom,M.T.', 'Laki-laki', 'ananda@pcr.ac.id', '108501', 'pak_ananda.JPG', NULL, '2018-09-30 08:15:39', '2018-09-30 08:15:39', NULL, '0000-00-00 00:00:00'),
(26, '027614', 'Erwin Setyo Nugroho, S.T.,M.Eng', 'Laki-laki', 'erwinsn@pcr.ac.id', '027614', 'pak_erwin.JPG', NULL, '2018-09-30 08:16:30', '2018-09-30 08:16:30', NULL, '0000-00-00 00:00:00'),
(27, '078303', 'Ibnu Surya, S.T.,M.T.', 'Laki-laki', 'ibnu@pcr.ac.id', '078303', 'pak_ibnu.JPG', NULL, '2018-09-30 08:17:16', '2018-09-30 08:17:16', NULL, '0000-00-00 00:00:00'),
(28, '078310', 'Kartina Diah Kusuma Wardhani, S.T.,M.T.', 'Perempuan', 'diah@pcr.ac.id', '078310', 'bu_diah.JPG', NULL, '2018-09-30 08:18:25', '2018-09-30 08:18:25', NULL, '0000-00-00 00:00:00'),
(29, '158803', 'Maksum Ro\'is Adin Saf, S.Kom., M.Eng', 'Laki-laki', 'maksum@pcr.ac.id', '158803', 'pak_maksum.JPG', NULL, '2018-09-30 08:19:09', '2018-09-30 08:19:09', NULL, '0000-00-00 00:00:00'),
(30, '048009', 'Meilany Dewi, S.T.,M.T.', 'Perempuan', 'meilany@pcr.ac.id', '048009', 'bu_mel.JPG', NULL, '2018-09-30 08:19:47', '2018-09-30 08:19:47', NULL, '0000-00-00 00:00:00'),
(31, '138701', 'Muhammad Arif Fadhly Ridha, S.Kom.,M.T', 'Laki-laki', 'fadhly@pcr.ac.id', '138701', 'Muhammad Arif Fadhly Ridha, S.Kom.,M.T.JPG', NULL, '2018-09-30 08:20:23', '2018-09-30 08:20:23', NULL, '0000-00-00 00:00:00'),
(32, '138703', 'Muhammad Ihsan Zul, S.Pd., M.Eng', 'Laki-laki', 'ihsan@pcr.ac.id', '138703', 'pak_ihsan.JPG', NULL, '2018-09-30 08:21:24', '2018-09-30 08:21:24', NULL, '0000-00-00 00:00:00'),
(33, '048110', 'Rahmat Suhatman, S.T.M.T', 'Laki-laki', 'rahmat@pcr.ac.id', '048110', 'pak_rahmat.JPG', NULL, '2018-09-30 08:22:10', '2018-09-30 08:22:10', NULL, '0000-00-00 00:00:00'),
(34, '098202', 'Rika Perdana Sari, S.T.,M.Eng', 'Perempuan', 'rika@pcr.ac.id', '098202', 'bu_rika.JPG', NULL, '2018-09-30 08:23:11', '2018-09-30 08:23:11', NULL, '0000-00-00 00:00:00'),
(35, '159208', 'Shumaya Resty Ramadhani, S.ST., M.Sc.', 'Perempuan', 'shumaya@pcr.ac.id', '159208', 'bu_shumaya.JPG', NULL, '2018-09-30 08:23:53', '2018-09-30 08:23:53', NULL, '0000-00-00 00:00:00'),
(36, '017218', 'Juni Nurma Sari, S.Kom.,M.MT', 'Perempuan', 'juni@pcr.ac.id', '017218', 'bu_juni.JPG', NULL, '2018-09-30 08:24:34', '2018-09-30 08:24:34', NULL, '0000-00-00 00:00:00'),
(37, '148511', 'Syefrida Yulina, M.Sc.', 'Perempuan', 'syefrida@pcr.ac.id', '148511', 'bu_syefrida.JPG', NULL, '2018-09-30 08:25:31', '2018-09-30 08:25:31', NULL, '0000-00-00 00:00:00'),
(38, '128906', 'Anggy Trisnadoli, S.ST.,M.T.', 'Laki-laki', 'anggy@pcr.ac.id', '128906', 'pak_anggy.JPG', NULL, '2018-09-30 08:26:35', '2018-09-30 08:26:35', NULL, '0000-00-00 00:00:00'),
(39, '007504', 'Dr. Dadang Syarif Sihabudin Sahid, S.Si,M.Sc.', 'Laki-laki', 'dadang@pcr.ac.id', '007504', 'pak_dadang.JPG', NULL, '2018-09-30 08:27:16', '2018-09-30 08:27:16', NULL, '0000-00-00 00:00:00'),
(40, '159025', 'Dini Hidayatul Qudsi, S.S.T., M.I.T.', 'Perempuan', 'dinihq@pcr.ac.id', '159025', 'bu_dini.JPG', NULL, '2018-09-30 08:27:51', '2018-09-30 08:27:51', NULL, '0000-00-00 00:00:00'),
(41, '148905', 'Dewi Hajar, S.AB.,M.T.', 'Perempuan', 'dewihajar@pcr.ac.id', '148905', 'bu_dewi.JPG', NULL, '2018-09-30 08:28:33', '2018-09-30 08:28:33', NULL, '0000-00-00 00:00:00'),
(42, '078202', 'Heni Rachmawati, S.T.,M.T.', 'Perempuan', 'henni@pcr.ac.id', '078202', 'bu_heni.JPG', NULL, '2018-09-30 08:29:24', '2018-09-30 08:29:24', NULL, '0000-00-00 00:00:00'),
(43, '118402', 'Satria Perdana Arifin, S.T.,M.T.I', 'Laki-laki', 'satria@pcr.ac.id', '118402', 'pak_satria.JPG', NULL, '2018-09-30 08:30:06', '2018-09-30 08:30:06', NULL, '0000-00-00 00:00:00'),
(44, '088210', 'Warnia Nengsih, S.Kom.,M.Kom', 'Perempuan', 'warnia@pcr.ac.id', '088210', 'bu_ineng.JPG', NULL, '2018-09-30 08:32:29', '2018-09-30 08:32:29', NULL, '0000-00-00 00:00:00'),
(48, '037802', 'Wawan Yunanto, S.Kom.,M.T.', 'Laki-laki', 'wawan@pcr.ac.id', '037802', 'pak_wawan.JPG', NULL, '2018-10-04 00:30:00', '2018-10-04 00:30:00', NULL, '0000-00-00 00:00:00'),
(50, '007717', 'Yohana Dewi Lulu Widyasari, S.Si.,M.T.', 'Perempuan', 'yohana@pcr.ac.id', '	007717', 'bu_yohana.JPG', NULL, '2018-10-04 00:31:21', '2018-10-04 00:31:21', NULL, '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `filetable`
--

CREATE TABLE `filetable` (
  `id` int(11) NOT NULL,
  `dosen_id` int(11) NOT NULL,
  `file_title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `matakuliah_id` int(11) NOT NULL,
  `kelas_id` int(11) NOT NULL,
  `angkatan_id` int(11) NOT NULL,
  `konten` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `filetable`
--

INSERT INTO `filetable` (`id`, `dosen_id`, `file_title`, `matakuliah_id`, `kelas_id`, `angkatan_id`, `konten`, `created_at`, `updated_at`) VALUES
(6, 1, 'dsfdf', 7, 1, 1, '<p>dsfsdfsd</p>', '2018-10-10 15:03:33', '2018-10-10 15:03:33');

-- --------------------------------------------------------

--
-- Table structure for table `group_kuis`
--

CREATE TABLE `group_kuis` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `id_kelas` int(11) NOT NULL,
  `id_matakuliah` int(11) NOT NULL,
  `dosen_id` int(11) NOT NULL,
  `angkatan_id` int(11) NOT NULL,
  `jumlah_soal` int(11) NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `group_kuis`
--

INSERT INTO `group_kuis` (`id`, `name`, `id_kelas`, `id_matakuliah`, `dosen_id`, `angkatan_id`, `jumlah_soal`, `created_at`, `updated_at`) VALUES
(1, 'Kuis 1', 1, 1, 1, 1, 5, '2018-09-30 19:31:37', '2018-10-10 06:06:07');

-- --------------------------------------------------------

--
-- Table structure for table `group_kuis_essay`
--

CREATE TABLE `group_kuis_essay` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `kelas_id` int(11) NOT NULL,
  `matkul_id` int(11) NOT NULL,
  `angkatan_id` int(11) NOT NULL,
  `dosen_id` int(11) NOT NULL,
  `jumlah_soal` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `group_kuis_essay`
--

INSERT INTO `group_kuis_essay` (`id`, `name`, `kelas_id`, `matkul_id`, `angkatan_id`, `dosen_id`, `jumlah_soal`, `created_at`, `updated_at`) VALUES
(1, 'Kuis Essay 1', 1, 1, 1, 1, 5, '2018-10-08 14:34:16', '2018-10-08 14:34:16'),
(2, 'Kuis Essay 2', 1, 1, 1, 1, 2, '2018-10-09 02:52:42', '2018-10-09 02:52:42');

-- --------------------------------------------------------

--
-- Table structure for table `kelas`
--

CREATE TABLE `kelas` (
  `id` int(11) NOT NULL,
  `nama_kelas` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `kelas`
--

INSERT INTO `kelas` (`id`, `nama_kelas`, `created_at`, `updated_at`) VALUES
(1, 'SI-A', '2018-09-02 20:28:18', '2018-09-02 20:28:18'),
(2, 'SI-B', '2018-09-02 20:28:26', '2018-09-02 20:28:26'),
(3, 'SI-C', '2018-09-02 20:28:34', '2018-09-02 20:28:34'),
(4, 'TI-A', '2018-09-30 08:36:36', '2018-09-30 08:36:36'),
(5, 'TI-B', '2018-09-30 08:36:43', '2018-09-30 08:36:43'),
(6, 'TI-C', '2018-09-30 08:36:51', '2018-09-30 08:36:51'),
(7, 'TI-D', '2018-09-30 08:38:22', '2018-09-30 08:38:22'),
(8, 'TK-A', '2018-09-30 08:38:55', '2018-09-30 08:38:55'),
(9, 'TK-A', '2018-09-30 08:38:55', '2018-09-30 08:38:55'),
(10, 'TK-B', '2018-09-30 08:39:02', '2018-09-30 08:39:02');

-- --------------------------------------------------------

--
-- Table structure for table `kuis`
--

CREATE TABLE `kuis` (
  `id` int(11) NOT NULL,
  `pertanyaan` text NOT NULL,
  `group_kuis_id` int(11) NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `kuis`
--

INSERT INTO `kuis` (`id`, `pertanyaan`, `group_kuis_id`, `created_at`, `updated_at`) VALUES
(1, '1. Yang manakah yang termasuk berpikir menjadi sukses?', 1, '2018-09-30 19:32:35', '2018-09-30 19:32:35'),
(2, '2. Hal apa yang perlu diperhatikan saat pertama kali di interview, kecuali?', 1, '2018-10-01 07:23:47', '2018-10-01 07:23:47'),
(3, '3. Apa saja yang menjadi persyaratan untuk mendapatkan beasiswa luar negri, kecuali?', 1, '2018-10-01 07:24:27', '2018-10-01 07:24:27'),
(5, '4. Menurut ilmu pengetahuan modern, ada 3 hal yang diubah agar seseorang menjadi sukses, yang manakah yang tidak termasuk dalam 3 hal tersebut?', 1, '2018-10-01 07:26:36', '2018-10-01 07:26:36'),
(6, '5. Di dalam UKM ada unsur 5 F, yang manakah tidak termasuk 5 unsur tersebut?', 1, '2018-10-01 07:27:22', '2018-10-01 07:27:22');

-- --------------------------------------------------------

--
-- Table structure for table `kuis_essay`
--

CREATE TABLE `kuis_essay` (
  `id` int(11) NOT NULL,
  `pertanyaan` text NOT NULL,
  `group_kuis_id` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `kuis_essay`
--

INSERT INTO `kuis_essay` (`id`, `pertanyaan`, `group_kuis_id`, `created_at`, `updated_at`) VALUES
(1, 'Apa yang dimaksud dengan pembekalan?', 1, '2018-10-09 02:59:48', '2018-10-09 02:59:48'),
(2, 'Apa yang dimaksud dengan PNS?', 1, '2018-10-09 02:59:55', '2018-10-09 02:59:55'),
(3, 'Apa yang dimaksud dengan kewirausahaan?', 1, '2018-10-09 03:00:12', '2018-10-09 03:00:12'),
(4, 'Hal-hal apa saja yang perlu disiapkan jika ingin mendapatkan beasiswa luar negri?', 1, '2018-10-09 03:00:23', '2018-10-09 03:00:23'),
(5, 'Hal-hal apa saja yang perlu ditingkatkan jika ingin menjadi sukses?', 1, '2018-10-09 03:00:37', '2018-10-09 03:00:37'),
(6, 'Apa yang dimaksud dengan kewirausahaan?', 2, '2018-10-09 02:39:57', '2018-10-09 02:39:57'),
(7, 'Bagaimana kiat menjadi sukses?', 2, '2018-10-09 02:40:13', '2018-10-09 02:40:13'),
(8, 'csjncsjdc', 3, '2018-10-09 23:07:05', '2018-10-09 23:07:05');

-- --------------------------------------------------------

--
-- Table structure for table `kuis_jawaban`
--

CREATE TABLE `kuis_jawaban` (
  `id` int(11) NOT NULL,
  `value` text NOT NULL,
  `ket` tinyint(1) NOT NULL,
  `kuis_id` int(11) NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `kuis_jawaban`
--

INSERT INTO `kuis_jawaban` (`id`, `value`, `ket`, `kuis_id`, `created_at`, `updated_at`) VALUES
(1, 'Positive thinking', 1, 1, '2018-09-30 19:32:35', '2018-09-30 19:32:35'),
(2, 'Pesimis', 0, 1, '2018-09-30 19:32:36', '2018-09-30 19:32:36'),
(3, 'Takut', 0, 1, '2018-09-30 19:32:36', '2018-09-30 19:32:36'),
(4, 'Tidak bertanggung jawab', 0, 1, '2018-09-30 19:32:36', '2018-09-30 19:32:36'),
(5, 'Penampilan secara fisik', 0, 2, '2018-10-01 07:23:47', '2018-10-01 07:23:47'),
(6, 'Bahasa tubuh', 0, 2, '2018-10-01 07:23:47', '2018-10-01 07:23:47'),
(7, 'Kemampuan komunikasi dengan sekitarnya', 0, 2, '2018-10-01 07:23:47', '2018-10-01 07:23:47'),
(8, 'Kewarganegaraan', 1, 2, '2018-10-01 07:23:47', '2018-10-01 07:23:47'),
(9, 'Ijazah dan transkrip S1/D4', 0, 3, '2018-10-01 07:24:27', '2018-10-01 07:24:27'),
(10, 'Toefl (550) atau IELTS (>6,5)', 0, 3, '2018-10-01 07:24:27', '2018-10-01 07:24:27'),
(11, 'KTP', 1, 3, '2018-10-01 07:24:27', '2018-10-01 07:24:27'),
(12, 'CV dan surat motivasi', 0, 3, '2018-10-01 07:24:27', '2018-10-01 07:24:27'),
(17, 'Pengetahuan', 0, 5, '2018-10-01 07:26:36', '2018-10-01 07:26:36'),
(18, 'Penampilan', 1, 5, '2018-10-01 07:26:36', '2018-10-01 07:26:36'),
(19, 'Keterampilan', 0, 5, '2018-10-01 07:26:36', '2018-10-01 07:26:36'),
(20, 'Sikap', 0, 5, '2018-10-01 07:26:36', '2018-10-01 07:26:36'),
(21, 'Flexible', 0, 6, '2018-10-01 07:27:22', '2018-10-01 07:27:22'),
(22, 'Friendly', 0, 6, '2018-10-01 07:27:22', '2018-10-01 07:27:22'),
(23, 'Focus', 0, 6, '2018-10-01 07:27:22', '2018-10-01 07:27:22'),
(24, 'Fact', 1, 6, '2018-10-01 07:27:22', '2018-10-01 07:27:22');

-- --------------------------------------------------------

--
-- Table structure for table `kuis_jawaban_essay`
--

CREATE TABLE `kuis_jawaban_essay` (
  `id` int(11) NOT NULL,
  `mahasiswa_id` int(11) NOT NULL,
  `group_kuis_id` int(11) NOT NULL,
  `komentar` text NOT NULL,
  `nilai` int(11) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `kuis_jawaban_essay`
--

INSERT INTO `kuis_jawaban_essay` (`id`, `mahasiswa_id`, `group_kuis_id`, `komentar`, `nilai`, `created_at`, `updated_at`) VALUES
(1, 1, 1, '<p>1. mdfnsdnfjdnfdnfdsf</p>\r\n<p>2. jdnfsnfksndfsdf</p>\r\n<p>3. dnfjsdnfdsf</p>\r\n<p>4. sdnfdsfdfsd</p>\r\n<p>5. nsdfdfsdfs</p>', 80, '2018-10-09 03:37:29', '2018-10-09 03:37:29'),
(2, 2, 3, '<p>sdfdfsdfsdfsfsf</p>', 52, '2018-10-10 11:59:54', '2018-10-10 11:59:54');

-- --------------------------------------------------------

--
-- Table structure for table `log_activities`
--

CREATE TABLE `log_activities` (
  `id` int(10) NOT NULL,
  `subject` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `url` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `method` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `ip` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `agent` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `user_id` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `log_activities`
--

INSERT INTO `log_activities` (`id`, `subject`, `url`, `method`, `ip`, `agent`, `user_id`, `created_at`, `updated_at`) VALUES
(1, 'Mahasiswa Melihat Data Tugas', 'http://localhost:8080/tugasmahasiswa/detail/4/2018-09-17/3/1/1', 'GET', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/69.0.3497.100 Safari/537.36', 'Vania Azari', '2018-10-10 15:49:22', '2018-10-10 15:49:22'),
(2, 'Mahasiswa Melihat Data Tugas', 'http://localhost:8080/tugasmahasiswa/detail/8/2018-09-22/3/1/1', 'GET', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/69.0.3497.100 Safari/537.36', 'Vania Azari', '2018-10-10 15:49:28', '2018-10-10 15:49:28'),
(3, 'Mahasiswa Mengupload Data Tugas', 'http://localhost:8080/tugasmahasiswa/edit/8/3/1/1', 'GET', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/69.0.3497.100 Safari/537.36', 'Vania Azari', '2018-10-10 15:49:36', '2018-10-10 15:49:36'),
(4, 'Mahasiswa Melihat Data Tugas', 'http://localhost:8080/tugasmahasiswa/detail/8/2018-09-22/3/1/1', 'GET', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/69.0.3497.100 Safari/537.36', 'Vania Azari', '2018-10-10 15:49:47', '2018-10-10 15:49:47');

-- --------------------------------------------------------

--
-- Table structure for table `mahasiswa`
--

CREATE TABLE `mahasiswa` (
  `id` int(11) NOT NULL,
  `username` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nama` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `jenis_kelamin` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `prodi_id` int(11) NOT NULL,
  `kelas_id` int(11) NOT NULL,
  `angkatan_id` int(11) NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `file_name` varchar(2555) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `current_sign_in_at` timestamp NULL DEFAULT NULL,
  `last_sign_in_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `mahasiswa`
--

INSERT INTO `mahasiswa` (`id`, `username`, `nama`, `jenis_kelamin`, `prodi_id`, `kelas_id`, `angkatan_id`, `password`, `file_name`, `remember_token`, `created_at`, `updated_at`, `current_sign_in_at`, `last_sign_in_at`) VALUES
(1, '1457301093', 'Vania Azari', 'Perempuan', 1, 1, 1, '1457301093', 'vania.JPG', 'fzmb3M2l9O9oK0nOt9rep3nE4jNiTMZvUUTKylUFJO1PAOPh1qjnNN4Yt6UV', '2018-08-23 06:58:53', '2018-10-10 15:49:11', '2018-10-10 15:49:11', '2018-10-10 15:41:28'),
(2, '1457301005', 'Aminda Pramita Sani', 'Perempuan', 1, 1, 1, '1457301005', 'aminda.JPG', 'yPhxDsZUjtocBBN2nFtEDVOG8aSnChy3Uaj8P70M78ZUh8gQ1HF13yS3u0hO', '2018-08-23 06:59:21', '2018-10-10 15:05:33', '2018-10-10 15:05:33', '2018-10-10 11:58:03'),
(3, '1457301010', 'Ayu Anggraini', 'Perempuan', 1, 1, 1, '1457301010', 'ayu.JPG', 'hwXXYLWYi9OWgx3SHiudirqai0XtwouSrXHnfjhfrJQf7chtvdLSwzMYiD9m', '2018-08-23 06:59:53', '2018-10-10 15:42:35', '2018-10-10 15:42:35', '2018-10-10 11:55:37'),
(7, '1457301009', 'Aulia Fitri Situmorang', 'Perempuan', 1, 1, 1, '1457301009', 'icon 1 - 1.png', 'f9LYDnsSqmxcZlIhJurnTZORzJcxUzKL10Mb9iSIFsPbAfBGEh1oDspdoQJd', '2018-08-23 08:20:47', '2018-09-11 16:18:37', NULL, NULL),
(8, '1457301023', 'Fanny Syafirha Azmi', 'Perempuan', 1, 1, 1, '1457301023', 'IMG-20180907-.jpg', '8SYv31LVZqYkg3ofTqgbSDOk8sbFWdQV1cWTgW45mlIWQk4tmZoBhRBTSlhL', '2018-09-06 19:22:56', '2018-09-06 19:28:16', NULL, NULL),
(9, '1457301092', 'Trisna Putri Sari', 'Perempuan', 1, 1, 1, '1457301092', '1536306782384.jpg', 'Y9VyD8a3aXz59juSy7pdjEpCHIlm9ZWFeCjd0KbmJMLcxaKaGg0YoCRNfTeC', '2018-09-07 01:05:07', '2018-09-07 01:05:07', NULL, NULL),
(10, '1457301038', 'Katrina Novelia S', 'Perempuan', 1, 1, 1, '1457301038', 'IMG-20180907-WA0005.jpg', 'GEdb643qiibxz2TiwGKpiczEDqitYeFEWiqZBZ4N4twBiYpkwOlmRcuJstzD', '2018-09-07 02:10:37', '2018-09-07 02:10:37', NULL, NULL),
(11, '1457301088', 'Sufendi', 'Laki-laki', 1, 1, 1, '1457301088', 'ayu.JPG', 'gJZUQZfTSo9Ezw2Eik1xtYTWxP7Bhg46Q2tUcPsawlIlXKP2H6eVzwQYK1Xg', '2018-09-07 02:20:59', '2018-09-07 02:31:11', NULL, NULL),
(12, '1457301037', 'Juliana', 'Perempuan', 1, 1, 1, '1457301037', 'icon 1 - 2.png', 'J3fTLPPDSX3lKtZLzpf8ba62sFPurtsywHsn2LFknjvOwqyqFg9QXz4429eD', '2018-09-07 03:19:35', '2018-09-11 16:20:04', NULL, NULL),
(13, '1457301070', 'Riana Surika', 'Perempuan', 1, 1, 1, '1457301070', 'icon 1 - 3.png', 'MlfjGXKBgh1SdLPjgD23xzrSp2QvIvCxKtK0EzAOCdNfyBZfhHWWIqlsFO9Z', '2018-09-07 03:25:36', '2018-09-11 16:20:26', NULL, NULL),
(14, '1457301069', 'Rery Audilla Putri', 'Perempuan', 1, 1, 1, '1457301069', 'icon 1 - 4.png', 'BGmBsJlEUE9U7LXvC5qLrKTBdaMWsZBLcKwBx1lZ4oNrjAUKWQ17BclzwCUZ', '2018-09-09 23:49:46', '2018-09-11 16:20:45', NULL, NULL),
(15, '1457301065', 'Putri Novita Sari', 'Perempuan', 1, 1, 1, '1457301065', 'icon 1 - 5.png', 'KASPBQBc6nOSTX9rm0OkpahT62ZTripqt10Fdm3x7dID1B5G0w8sC2nWQZrR', '2018-09-10 00:10:24', '2018-09-11 16:21:10', NULL, NULL),
(18, '1457301033', 'Ismi Nurhasanah', 'Perempuan', 1, 3, 1, '1457301033', 'icon 1 - 6.png', 'qx1bDzr90wDPI5wIKZa9fvIFFICrHumKIX98ninhVd0ku7ItEC0rBLBvgUCk', '2018-09-11 16:23:07', '2018-09-13 01:06:20', NULL, NULL),
(19, '1457301075', 'Rosmah Hasibuan', 'Perempuan', 1, 2, 1, '1457301075', 'icon 1 - 7.png', 'r382r0s7DnnGo5PIV2f5rjOPRxsM3mzvaR1Y59LY1M4xd2XxAWNQMlTWP21G', '2018-09-11 16:23:50', '2018-10-08 07:20:24', '2018-10-08 07:20:24', '2018-10-08 07:18:39'),
(20, '1457301076', 'Roza Fitria', 'Perempuan', 1, 2, 1, '1457301076', 'icon 1 - 8.png', 'eSpoDj04BmRiquinJMTHufC5kJ4sU9xJl6hhJZ90FZoeoYqJjrYMrZZFJCx0', '2018-09-11 16:25:28', '2018-09-11 16:25:28', NULL, NULL),
(21, '1457301073', 'Risqah Indah Utari', 'Perempuan', 1, 1, 1, '1457301073', 'icon 1 - 9.png', 'BIu9eEyc0IN3EOLeVCLTbHyK2RODHEm8QvqwM9VhRnax6UwaUeUuQ3eoWeKL', '2018-09-11 16:26:26', '2018-09-11 16:26:26', NULL, NULL),
(22, '1457301085', 'T. Widhiarti Nabila', 'Perempuan', 1, 1, 1, '1457301085', 'icon 1 - 10.png', 'TymH0NJ4r37FYiiwpXrynGmCAbRELpKYQMioeYFf7irAPiEPVYcocSaP5x6t', '2018-09-11 16:27:19', '2018-09-11 16:27:19', NULL, NULL),
(23, '1457301098', 'Widya Hesty Rahayu', 'Perempuan', 1, 1, 1, '1457301098', 'icon 1 - 11.png', 'XbeGXmMhs6MtyOSHjVjJ6snJ6JqViIbjuLl4dhLyW4ahWiu6Ca5C7nWIyRdX', '2018-09-11 16:28:23', '2018-09-11 16:28:23', NULL, NULL),
(24, '1457301091', 'Tia Santa Eclesia Siregar', 'Perempuan', 1, 1, 1, '1457301091', 'icon 1 - 12.png', '7DvZG9VCOOhUxrWgz8aiixmpS9sXpa1Lwv85qXOL2Mv3IPISMmNUqz2XuNCF', '2018-09-11 16:29:22', '2018-09-11 16:29:22', NULL, NULL),
(25, '1357301058', 'Vebby Shabrina Amalia', 'Perempuan', 1, 1, 1, '1357301058', 'icon 1 - 13.png', 'eroZzfmAhCXwPdGAgMNh59FQJngEFALKmiOA6rrX70A5Nc5xhU76KUnp51rv', '2018-09-11 16:30:17', '2018-09-11 16:30:17', NULL, NULL),
(26, '1457301042', 'Khoiriah Amani', 'Perempuan', 1, 1, 1, '1457301042', 'icon 1 - 14.png', 'JS4pcjrGcgbl3ADVnGjXk7vwf8tKOGVpeYFo80RH1x9CpY688kAr0x5S9AeY', '2018-09-11 16:31:20', '2018-09-11 16:31:20', NULL, NULL),
(27, '1457301044', 'M. Alkhairi M', 'Laki-laki', 1, 1, 1, '1457301044', 'icon 2 - 1.png', 'nfvXofpypJOR3mcYnn1KpjZGkxX6jYrtuR3EbWVoT76sa7DLtMbP7yjoNnBY', '2018-09-11 16:32:00', '2018-09-11 16:32:00', NULL, NULL),
(28, '1457301082', 'Satria Gunawan', 'Laki-laki', 1, 1, 1, '1457301082', 'icon 2 - 2.png', 'lDPDrftqS5I17BAto9YCrsISyUfp9VJF049eDsJGBHvRvMQ2f15K4eEvJEZ3', '2018-09-11 16:32:44', '2018-09-11 16:32:44', NULL, NULL),
(29, '1457301006', 'Apriantoni', 'Laki-laki', 1, 1, 1, '1457301006', 'icon 2 - 3.png', 'fqC6UDGw7acpihzyw0p5wq1p5jIV8PvBKS4dTrnhrDduYKPfGZoJpNCmGVrV', '2018-09-11 16:33:20', '2018-09-11 16:33:20', NULL, NULL),
(30, '1457301097', 'Widya Fransisca', 'Perempuan', 1, 1, 1, '1457301097', 'icon 1 - 15.png', '5DKeBx8Yi14vJZRdEL7DGFoxqIbQuJkcRhejY8tSrQCMFhN1vMulilf7SDaK', '2018-09-11 16:34:21', '2018-09-11 16:34:21', NULL, NULL),
(31, '1457301074', 'Rizka Julaina', 'Perempuan', 1, 2, 1, '1457301074', 'icon 1 - 16.png', 'uX0i67EjDYLKSXbTbnAl4fCrmWrXDTZAnvq7INVYPW3Y4W38ZjfTqY9UoSvW', '2018-09-11 16:35:06', '2018-09-11 16:35:06', NULL, NULL),
(32, '1457301041', 'Khalfiah Zahara', 'Perempuan', 1, 1, 1, '1457301041', 'icon 1 - 17.png', 'Ze9CUUXRS3mKg0bi5BXktyUBXv4tcuajjEMzxsyPuVpI14gaWSWyIJ07Bd1V', '2018-09-11 16:36:15', '2018-09-11 16:36:15', NULL, NULL),
(33, '1457301064', 'Putri Larasati Anggiawan', 'Perempuan', 1, 1, 1, '1457301064', 'icon 1 - 20.png', 'q65e1oVmodpon36wltH7VSNjOlOnreZBny2bjHG6dXjABJYtpX6uGDyWrFyo', '2018-09-13 01:03:31', '2018-09-13 01:03:31', NULL, NULL),
(34, '1457301079', 'Samuel Ardiman Silaban', 'Laki-laki', 1, 1, 1, '1457301079', 'icon 2 - 10.png', 'qXGFVZ4jdWw7jb03PGGNsAM70NNjOJESqgygCpjpNW7WZccIGDr693dWdq2M', '2018-09-13 01:05:14', '2018-09-13 01:05:14', NULL, NULL),
(35, '1457301083', 'Sharly Hestari P', 'Perempuan', 1, 3, 1, '1457301083', 'icon 1 - 19.png', 'J0nVcdVJXlj7xuXgbmIWDEVICLtbuI87QWr2XxSRDgvd9UqQf1uewTRWLN7v', '2018-09-13 01:05:51', '2018-09-13 01:06:04', NULL, NULL),
(36, '1457301020', 'Dea An Nisa', 'Perempuan', 1, 1, 1, '1457301020', 'icon 1 - 18.png', 'Xe9vdhcEFPa5S8PD9jDM1gSYnKr6pQvB50CObwsC6LMmTALFNy2bcngeh8cY', '2018-09-16 11:15:52', '2018-09-16 11:15:52', NULL, NULL),
(39, '1757301005', 'Andriansyah Alfayed', 'Laki-laki', 1, 3, 5, '1757301005', 'icon LK.png', NULL, '2018-10-10 12:07:58', '2018-10-10 12:07:58', NULL, NULL),
(40, '1757301069', 'Arif Budi Mahnur', 'Laki-laki', 1, 3, 5, '1757301069', 'icon LK.png', NULL, '2018-10-10 12:09:15', '2018-10-10 12:09:15', NULL, NULL),
(41, '1757301059', 'Aulia Oktariani', 'Perempuan', 1, 3, 5, '1757301059', 'icon PR.png', NULL, '2018-10-10 12:10:06', '2018-10-10 12:10:06', NULL, NULL),
(42, '1757301009', 'Catherine', 'Perempuan', 1, 3, 5, '1757301009', 'icon PR.png', NULL, '2018-10-10 12:10:36', '2018-10-10 12:10:36', NULL, NULL),
(43, '1757301070', 'Charli Nopelly Rugun Tambunan', 'Perempuan', 1, 3, 5, '1757301070', 'icon PR.png', NULL, '2018-10-10 12:11:20', '2018-10-10 12:11:20', NULL, NULL),
(44, '1757301044', 'Duma Ria Susiana Tanjung', 'Perempuan', 1, 3, 5, '1757301044', 'icon PR.png', NULL, '2018-10-10 12:11:49', '2018-10-10 12:11:49', NULL, NULL),
(45, '1757301001', 'Dwiki Anugrah Prayudha', 'Laki-laki', 1, 3, 5, '1757301001', 'icon PR.png', NULL, '2018-10-10 12:12:15', '2018-10-10 12:12:15', NULL, NULL),
(46, '1757301013', 'Ebiet Supra Yogi', 'Laki-laki', 1, 3, 5, '1757301013', 'icon LK.png', NULL, '2018-10-10 12:12:43', '2018-10-10 12:12:43', NULL, NULL),
(47, '1757301033', 'Fauizia Rizki Febriani', 'Perempuan', 1, 3, 5, '1757301033', 'icon PR.png', NULL, '2018-10-10 12:13:10', '2018-10-10 12:13:10', NULL, NULL),
(48, '1757301074', 'Harpha Vidhani Adhe', 'Laki-laki', 1, 3, 5, '1757301074', 'icon LK.png', NULL, '2018-10-10 12:15:06', '2018-10-10 12:16:17', NULL, NULL),
(49, '1757301056', 'Hidayah Winanty', 'Perempuan', 1, 3, 5, '1757301056', 'icon PR.png', NULL, '2018-10-10 12:15:57', '2018-10-10 12:15:57', NULL, NULL),
(50, '1757301075', 'Hotma Taruli Silaen', 'Laki-laki', 1, 3, 5, '1757301075', 'icon LK.png', NULL, '2018-10-10 12:17:27', '2018-10-10 12:17:27', NULL, NULL),
(51, '1757301045', 'Jordan Abeth Teofilus Pasaribu', 'Laki-laki', 1, 3, 5, '1757301045', 'icon LK.png', NULL, '2018-10-10 12:17:56', '2018-10-10 12:17:56', NULL, NULL),
(52, '1757301042', 'Lasrina Wati Munthe', 'Perempuan', 1, 3, 5, '1757301042', 'icon PR.png', NULL, '2018-10-10 12:18:37', '2018-10-10 12:18:37', NULL, NULL),
(53, '1757301092', 'Medira Javania', 'Perempuan', 1, 3, 5, '1757301092', 'icon PR.png', NULL, '2018-10-10 12:20:06', '2018-10-10 12:20:06', NULL, NULL),
(54, '1757301026', 'Nurany Ayu Pakpahan', 'Perempuan', 1, 3, 5, '1757301026', 'icon PR.png', NULL, '2018-10-10 12:21:04', '2018-10-10 12:21:04', NULL, NULL),
(55, '1757301080', 'Puspita Aisyah Asnur', 'Perempuan', 1, 3, 5, '1757301080', 'icon PR.png', NULL, '2018-10-10 12:21:33', '2018-10-10 12:21:33', NULL, NULL),
(56, '1757301032', 'Putra Aulia Sani', 'Laki-laki', 1, 3, 5, '1757301032', 'icon LK.png', NULL, '2018-10-10 12:22:30', '2018-10-10 12:22:30', NULL, NULL),
(57, '1757301091', 'Putri Dinda Dwi Karisya', 'Perempuan', 1, 3, 5, '1757301091', 'icon PR.png', NULL, '2018-10-10 12:22:57', '2018-10-10 12:22:57', NULL, NULL),
(58, '1757301062', 'Qawi Malik Rizti', 'Laki-laki', 1, 3, 5, '1757301062', 'icon LK.png', 'I1V0NYXXyBU8W86ieMM2SYHVtmYuJZvhX6OLhOIb9flHDwTMmp55gu7Jzohc', '2018-10-10 12:23:34', '2018-10-10 12:36:22', '2018-10-10 12:36:22', '2018-10-10 12:36:22'),
(59, '1757301019', 'Rofifah Nabila', 'Perempuan', 1, 3, 5, '1757301019', 'icon PR.png', NULL, '2018-10-10 12:24:03', '2018-10-10 12:24:03', NULL, NULL),
(60, '1757301046', 'Rori Muhammad Ismail', 'Laki-laki', 1, 3, 5, '1757301046', 'icon LK.png', NULL, '2018-10-10 12:24:31', '2018-10-10 12:24:31', NULL, NULL),
(61, '1757301027', 'Rory Rinaldo', 'Laki-laki', 1, 3, 5, '1757301027', 'icon LK.png', NULL, '2018-10-10 12:25:00', '2018-10-10 12:25:00', NULL, NULL),
(62, '1757301090', 'Rozha Novtricya Nurmania', 'Perempuan', 1, 3, 5, '1757301090', 'icon PR.png', NULL, '2018-10-10 12:25:29', '2018-10-10 12:25:29', NULL, NULL),
(63, '1757301083', 'Siti Sri Maharani', 'Perempuan', 1, 3, 5, '1757301083', 'icon PR.png', NULL, '2018-10-10 12:25:57', '2018-10-10 12:25:57', NULL, NULL),
(64, '1757301021', 'Suci Ikhwan Hendri', 'Perempuan', 1, 3, 5, '1757301021', 'icon PR.png', NULL, '2018-10-10 12:26:30', '2018-10-10 12:26:30', NULL, NULL),
(65, '1757301054', 'Vebi Jonanisca Fitri', 'Perempuan', 1, 3, 5, '1757301054', 'icon PR.png', NULL, '2018-10-10 12:26:54', '2018-10-10 12:26:54', NULL, NULL),
(66, '1757301004', 'Vivian Dewi', 'Perempuan', 1, 3, 5, '1757301004', 'icon PR.png', NULL, '2018-10-10 12:27:20', '2018-10-10 12:27:20', NULL, NULL),
(67, '1757301085', 'Yo Shandy Hermawan', 'Laki-laki', 1, 3, 5, '1757301085', 'icon LK.png', NULL, '2018-10-10 12:27:50', '2018-10-10 12:27:50', NULL, NULL),
(68, '1757301010', 'Yumico Catteryne', 'Perempuan', 1, 3, 5, '1757301010', 'icon PR.png', NULL, '2018-10-10 12:31:02', '2018-10-10 12:31:02', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `matakuliah`
--

CREATE TABLE `matakuliah` (
  `id` int(11) NOT NULL,
  `kode` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nama_matkul` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `matakuliah`
--

INSERT INTO `matakuliah` (`id`, `kode`, `nama_matkul`, `created_at`, `updated_at`) VALUES
(1, 'WK301', 'Kapita Selekta', '2018-08-23 06:57:22', '2018-10-04 01:29:26'),
(3, 'WK303', 'Kewirausahaan', '2018-08-28 23:37:25', '2018-10-04 01:29:35'),
(5, 'SI407', 'Matematika Diskrit', '2018-09-24 01:49:23', '2018-10-04 02:19:05'),
(6, 'WK307', 'Bahasa Inggris 1', '2018-09-30 08:42:15', '2018-10-04 01:16:00'),
(7, 'TK301', 'Algoritma dan Pemograman', '2018-09-30 08:42:25', '2018-10-04 01:17:58'),
(8, 'TK302', 'Praktikum Algoritma dan Pemrograman', '2018-09-30 08:42:36', '2018-10-04 01:22:38'),
(9, 'TK303', 'Jaringan Komputer 1', '2018-09-30 08:42:44', '2018-10-04 01:23:42'),
(10, 'TK304', 'Praktikum Jaringan Komputer 1', '2018-09-30 08:42:55', '2018-10-04 01:23:57'),
(11, 'TK305', 'Organisasi Komputer dan Arsitektur CPU', '2018-09-30 08:43:02', '2018-10-04 01:24:18'),
(12, 'TK306', 'Konsep Teknologi Informasi', '2018-09-30 08:43:15', '2018-10-04 01:24:32'),
(13, 'TK307', 'Workshop Rangkaian Digital', '2018-09-30 08:43:22', '2018-10-04 01:24:46'),
(14, 'TK308', 'Workshop Pemrograman Web', '2018-09-30 08:43:31', '2018-10-04 01:25:00'),
(15, 'TK309', 'Matematika', '2018-09-30 08:43:38', '2018-10-04 01:26:10'),
(16, 'TK310', 'Aljabar Matriks', '2018-09-30 08:43:45', '2018-10-04 01:26:28'),
(17, 'WK309', 'Bahasa Inggris 3', '2018-09-30 08:43:54', '2018-10-04 01:26:41'),
(18, 'TK321', 'Sistem Operasi Lanjut', '2018-09-30 08:44:00', '2018-10-04 01:26:50'),
(19, 'TK322', 'Praktikum Sistem Operasi Lanjut', '2018-09-30 08:44:11', '2018-10-04 01:27:03'),
(20, 'TK323', 'Struktur Data', '2018-09-30 08:44:18', '2018-10-04 01:27:19'),
(21, 'TK324', 'Praktikum Struktur Data', '2018-09-30 08:44:24', '2018-10-04 01:27:29'),
(22, 'TK325', 'Administrasi Jaringan Komputer', '2018-09-30 08:44:30', '2018-10-04 01:27:41'),
(23, 'TK326', 'Praktikum Administrasi Jaringan Komputer', '2018-09-30 08:44:43', '2018-10-04 01:27:52'),
(24, 'TK328', 'Workshop Rekayasa Perangkat Lunak', '2018-09-30 08:44:50', '2018-10-04 01:28:05'),
(25, 'TK329', 'Jaringan Komputer 3', '2018-09-30 08:44:58', '2018-10-04 01:28:17'),
(26, 'TK330', 'Praktikum Jaringan Komputer 3', '2018-09-30 08:45:05', '2018-10-04 01:28:28'),
(27, 'TK331', 'Workshop Basis Data Lanjut', '2018-09-30 08:45:13', '2018-10-04 01:28:45'),
(28, 'WU301', 'Agama', '2018-09-30 08:45:23', '2018-10-04 01:28:58'),
(29, 'WU302', 'Pancasila', '2018-09-30 08:45:30', '2018-10-04 01:29:09'),
(30, 'WU303', 'Kewarganegaraan', '2018-09-30 08:45:38', '2018-10-04 01:29:18'),
(31, 'WK306', 'Proyek Akhir', '2018-09-30 08:45:45', '2018-10-04 01:29:44'),
(32, 'TK340', 'Etika Profesi', '2018-09-30 08:45:53', '2018-10-04 01:29:54'),
(33, 'TI406', 'Organisasi dan Arsitektur Komputer', '2018-09-30 11:11:53', '2018-10-04 02:07:16'),
(34, 'TI407', 'Bengkel Pengembangan Web Dasar', '2018-09-30 11:12:24', '2018-10-04 02:07:33'),
(35, 'TI415', 'Basis Data Dasar', '2018-09-30 11:12:35', '2018-10-04 02:07:49'),
(36, 'TI416', 'Praktikum Basis Data Dasar', '2018-09-30 11:12:48', '2018-10-04 02:08:03'),
(37, 'TI423', 'Rekayasa Perangkat Lunak', '2018-09-30 11:13:42', '2018-10-04 02:09:46'),
(38, 'TI424', 'Praktikum Rekayasa Perangkat Lunak', '2018-09-30 11:14:02', '2018-10-04 02:10:21'),
(39, 'TI425', 'Bengkel Pemrograman Web 1', '2018-09-30 11:14:16', '2018-10-04 02:10:34'),
(40, 'TI426', 'Jaringan Komputer Dasar', '2018-09-30 11:14:30', '2018-10-04 02:10:47'),
(41, 'TI427', 'Praktikum Jaringan Komputer Dasar', '2018-09-30 11:14:41', '2018-10-04 02:11:00'),
(42, 'TI431', 'Bengkel Data Warehouse', '2018-09-30 11:15:13', '2018-10-04 02:11:35'),
(43, 'TI408', 'Probabilitas dan Statistika', '2018-09-30 11:15:48', '2018-10-04 02:12:07'),
(44, 'TI439', 'Pemrograman Mobile', '2018-09-30 11:18:10', '2018-10-04 02:12:18'),
(45, 'TI440', 'Bengkel Pemrograman Web 2', '2018-09-30 11:18:20', '2018-10-04 02:12:31'),
(46, 'TI441', 'Bengkel Sistem Informasi Geografis', '2018-09-30 11:18:31', '2018-10-04 02:12:53'),
(47, 'TI443', 'Animasi Komputer 2', '2018-09-30 11:18:37', '2018-10-04 02:13:06'),
(48, 'TI444', 'Administrasi dan Keamanan Jaringan Komputer', '2018-09-30 11:18:48', '2018-10-04 02:13:24'),
(49, 'TI445', 'Praktikum Administrasi dan Keamanan Jaringan Komputer', '2018-09-30 11:19:00', '2018-10-04 02:13:39'),
(50, 'TI446', 'Pembelajaran Mesin', '2018-09-30 11:19:08', '2018-10-04 02:13:52'),
(51, 'TI447', 'Pengolahan Citra Digital', '2018-09-30 11:19:17', '2018-10-04 02:14:06'),
(52, 'TI448', 'Praktikum Pengolahan Citra Digital', '2018-09-30 11:19:26', '2018-10-04 02:14:17'),
(53, 'WU404', 'Bahasa Indonesia', '2018-09-30 11:20:26', '2018-10-04 02:14:35'),
(54, 'WK405', 'Tugas Pendahuluan Proyek Akhir', '2018-09-30 11:20:36', '2018-10-04 02:14:46'),
(55, 'TI432', 'Kualitas dan Pengujian Perangkat Lunak', '2018-09-30 11:20:50', '2018-10-04 02:14:58'),
(56, 'TI449', 'Pengembangan Permainan', '2018-09-30 11:21:50', '2018-10-04 02:15:12'),
(57, 'TI450', 'Perencanaan Strategis Teknologi Informasi', '2018-09-30 11:22:03', '2018-10-04 02:15:24'),
(58, 'TI451', 'Komputasi Awan', '2018-09-30 11:22:10', '2018-10-04 02:15:37'),
(59, 'TI452', 'Jaringan Multimedia', '2018-09-30 11:22:17', '2018-10-04 02:15:51'),
(60, 'TI453', 'Praktikum Jaringan Multimedia', '2018-09-30 11:23:43', '2018-10-04 02:16:02'),
(61, 'TI456', 'Keamanan Data', '2018-09-30 11:24:05', '2018-10-04 02:16:26'),
(62, 'SI403', 'Workshop Pengembangan Web Dasar', '2018-09-30 11:25:28', '2018-10-04 02:17:51'),
(63, 'SI405', 'Dasar Akuntansi', '2018-09-30 11:25:40', '2018-10-04 02:18:18'),
(64, 'SI406', 'Matematika Dasar', '2018-09-30 11:25:49', '2018-10-04 02:18:34'),
(65, 'SI408', 'Workshop Sistem Operasi', '2018-09-30 11:25:57', '2018-10-04 02:19:18'),
(66, 'SI409', 'Manajemen Proses Bisnis', '2018-09-30 11:26:05', '2018-10-04 02:19:29'),
(67, 'SI410', 'Sistem Informasi Manajemen', '2018-09-30 11:26:14', '2018-10-04 02:19:40'),
(68, 'SI422', 'Struktur Data dan Algoritma', '2018-09-30 11:26:38', '2018-10-04 02:20:30'),
(69, 'SI423', 'Praktikum Struktur Data dan Algoritma', '2018-09-30 11:26:47', '2018-10-04 02:20:46'),
(70, 'SI424', 'Workshop Pemrograman Web 1', '2018-09-30 11:26:57', '2018-10-04 02:20:59'),
(71, 'SI425', 'Basis Data Lanjut', '2018-09-30 11:27:24', '2018-10-04 02:21:13'),
(72, 'SI426', 'Praktikum Basis Data Lanjut', '2018-09-30 11:27:30', '2018-10-04 02:21:25'),
(73, 'SI427', 'Sistem Intelegensia', '2018-09-30 11:27:36', '2018-10-04 02:21:36'),
(74, 'SI428', 'Manajemen Produksi dan Riset Operasi', '2018-09-30 11:27:47', '2018-10-04 02:21:48'),
(75, 'SI440', 'Workshop Pemrograman Framework', '2018-09-30 11:27:59', '2018-10-04 02:22:07'),
(76, 'SI441', 'Workshop Pemrograman Mobile', '2018-09-30 11:28:06', '2018-10-04 02:22:18'),
(77, 'SI442', 'Workshop Big Data', '2018-09-30 11:28:15', '2018-10-04 02:22:29'),
(78, 'SI443', 'Workshop Business Intelligence', '2018-09-30 11:28:25', '2018-10-04 02:22:41'),
(79, 'SI446', 'Workshop Enterprise Resource Planning', '2018-09-30 11:28:33', '2018-10-04 02:22:53'),
(80, 'SI447', 'Workshop Pemrograman Web 2', '2018-09-30 11:28:42', '2018-10-04 02:23:07'),
(82, 'WU401', 'Agama', '2018-10-04 02:04:41', '2018-10-04 02:04:41'),
(83, 'WK407', 'Bahasa Inggris 1', '2018-10-04 02:04:59', '2018-10-04 02:04:59'),
(84, 'TI401', 'Matematika', '2018-10-04 02:05:50', '2018-10-04 02:05:50'),
(85, 'TI403', 'Konsep Teknologi Informasi', '2018-10-04 02:06:15', '2018-10-04 02:06:15'),
(86, 'TI404', 'Algoritma dan Pemograman', '2018-10-04 02:06:33', '2018-10-04 02:06:33'),
(87, 'TI405', 'Praktikum Algoritma dan Pemrograman', '2018-10-04 02:06:56', '2018-10-04 02:06:56'),
(88, 'WU402', 'Pancasila', '2018-10-04 02:08:17', '2018-10-04 02:08:17'),
(89, 'WK409', 'Bahasa Inggris 3', '2018-10-04 02:08:39', '2018-10-04 02:08:39'),
(90, 'TI409', 'Matematika Diskrit', '2018-10-04 02:09:00', '2018-10-04 02:09:00'),
(91, 'TI419', 'Struktur Data', '2018-10-04 02:09:12', '2018-10-04 02:09:12'),
(92, 'TI420', 'Praktikum Struktur Data', '2018-10-04 02:09:31', '2018-10-04 02:09:31'),
(93, 'TI428', 'Sistem Operasi Lanjut', '2018-10-04 02:11:23', '2018-10-04 02:11:23'),
(94, 'WK401', 'Kapita Selekta', '2018-10-04 02:11:55', '2018-10-04 02:11:55'),
(95, 'TI455', 'Etika Profesi', '2018-10-04 02:16:14', '2018-10-04 02:16:14'),
(96, 'SI401', 'Algoritma dan Pemrograman', '2018-10-04 02:17:17', '2018-10-04 02:17:17'),
(97, 'SI402', 'Praktikum Algoritma dan Pemrograman', '2018-10-04 02:17:36', '2018-10-04 02:17:36'),
(98, 'SI404', 'Konsep Teknologi Informasi', '2018-10-04 02:18:06', '2018-10-04 02:18:06'),
(99, 'SI420', 'Rekayasa Perangkat Lunak', '2018-10-04 02:20:08', '2018-10-04 02:20:08'),
(100, 'SI421', 'Praktikum Rekayasa Perangkat Lunak', '2018-10-04 02:20:19', '2018-10-04 02:20:19');

-- --------------------------------------------------------

--
-- Table structure for table `matakuliahkelas`
--

CREATE TABLE `matakuliahkelas` (
  `id` int(11) NOT NULL,
  `matakuliah_id` int(11) NOT NULL,
  `kelas_id` int(11) NOT NULL,
  `angkatan_id` int(11) NOT NULL,
  `dosen_id` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `matakuliahkelas`
--

INSERT INTO `matakuliahkelas` (`id`, `matakuliah_id`, `kelas_id`, `angkatan_id`, `dosen_id`, `created_at`, `updated_at`) VALUES
(1, 1, 1, 1, 1, '2018-09-16 12:11:54', '2018-09-16 12:11:54'),
(9, 1, 2, 1, 1, '2018-09-16 12:12:04', '2018-09-16 12:12:04'),
(10, 1, 3, 1, 1, '2018-09-16 12:12:14', '2018-09-16 12:12:14'),
(12, 3, 1, 1, 12, '2018-09-16 12:50:13', '2018-09-16 12:50:13'),
(13, 3, 2, 1, 12, '2018-09-16 12:49:54', '2018-09-16 12:49:54'),
(14, 3, 3, 1, 12, '2018-10-04 00:56:16', '2018-10-04 00:56:16'),
(17, 99, 3, 5, 1, '2018-10-10 12:36:04', '2018-10-10 12:36:04');

-- --------------------------------------------------------

--
-- Table structure for table `materi_file`
--

CREATE TABLE `materi_file` (
  `id` int(11) NOT NULL,
  `materi_id` int(11) NOT NULL,
  `filename` varchar(2555) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `materi_file`
--

INSERT INTO `materi_file` (`id`, `materi_id`, `filename`, `created_at`, `updated_at`) VALUES
(1, 1, 'Pertemuan Pertama Kapita Selekta 2018 - Copy.pptx', '2018-10-07 03:39:49', '2018-10-07 03:39:49'),
(2, 2, 'Format Laporan Mandiri.docx', '2018-10-07 03:40:54', '2018-10-07 03:40:54'),
(3, 2, 'Kapita Selekta.mp4', '2018-10-07 03:40:54', '2018-10-07 03:40:54'),
(4, 3, 'ADAM AIR.docx', '2018-10-09 02:36:57', '2018-10-09 02:36:57'),
(5, 3, 'Book1.xlsx', '2018-10-09 02:36:57', '2018-10-09 02:36:57'),
(6, 4, 'Cara Membuat Web Dinamis Sederhana.docx', '2018-10-09 22:49:59', '2018-10-09 22:49:59'),
(7, 4, 'coba.xlsx', '2018-10-09 22:50:00', '2018-10-09 22:50:00'),
(8, 5, 'skala likert.xlsx', '2018-10-10 11:53:01', '2018-10-10 11:53:01'),
(9, 5, 'Skalaaaa likertt.docx', '2018-10-10 11:53:01', '2018-10-10 11:53:01'),
(10, 6, 'icon LK.png', '2018-10-10 15:03:34', '2018-10-10 15:03:34'),
(11, 6, 'icon PR.png', '2018-10-10 15:03:34', '2018-10-10 15:03:34');

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2018_07_20_085142_create_filetable_table', 1),
(2, '2018_07_20_085207_create_kelas_table', 1),
(3, '2018_07_20_085237_create_matakuliah_table', 1),
(4, '2018_07_20_085305_create_pengumuman_table', 1),
(5, '2018_07_20_085333_create_prodi_table', 1),
(6, '2018_07_20_085402_create_tugas_table', 1);

-- --------------------------------------------------------

--
-- Table structure for table `pengumuman`
--

CREATE TABLE `pengumuman` (
  `id` int(11) UNSIGNED NOT NULL,
  `dosen_id` int(11) NOT NULL,
  `kelas_id` int(11) NOT NULL,
  `angkatan_id` int(11) NOT NULL,
  `judul` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `isi` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `pengumuman`
--

INSERT INTO `pengumuman` (`id`, `dosen_id`, `kelas_id`, `angkatan_id`, `judul`, `isi`, `created_at`, `updated_at`) VALUES
(4, 12, 1, 1, 'Pengumpulan Tugas Kewirausahaan', '<p>Pengumpulan tugas kewirausahaan sebelum hari selasa jam 16.00</p>', '2018-10-01 00:16:40', '2018-10-01 00:16:40'),
(9, 1, 1, 1, 'Pengumpulan Tugas Kapita Selekta', '<p>Dear All,</p>\r\n<p>Pengumpulan Tugas Kapita Selekta setiap hari Kamis sebelum jam 12 siang</p>\r\n<p>Terima kasih</p>', '2018-10-10 12:03:10', '2018-10-10 12:03:10');

-- --------------------------------------------------------

--
-- Table structure for table `prodi`
--

CREATE TABLE `prodi` (
  `id` int(11) NOT NULL,
  `nama_prodi` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `prodi`
--

INSERT INTO `prodi` (`id`, `nama_prodi`, `created_at`, `updated_at`) VALUES
(1, 'Sistem Informasi', '2018-08-08 19:52:52', '2018-08-08 19:52:52'),
(2, 'Teknik Informatika', '2018-08-09 01:33:50', '2018-08-09 01:33:50'),
(3, 'Teknik Komputer', '2018-08-09 01:33:59', '2018-08-09 01:33:59'),
(4, 'Akuntansi', '2018-08-09 01:34:10', '2018-08-09 01:34:10'),
(5, 'Teknik Telekomunikasi', '2018-08-09 01:34:24', '2018-08-09 01:34:24'),
(6, 'Teknik Elektronika', '2018-08-09 01:34:35', '2018-08-09 01:34:35'),
(7, 'Teknik Elektronika Telekomunikasi', '2018-08-09 01:35:04', '2018-08-09 01:35:04'),
(8, 'Teknik Mesin', '2018-08-09 01:35:31', '2018-08-28 22:54:58');

-- --------------------------------------------------------

--
-- Table structure for table `tugas`
--

CREATE TABLE `tugas` (
  `id` int(11) NOT NULL,
  `matakuliah_id` int(11) NOT NULL,
  `dosen_id` int(11) NOT NULL,
  `kelas_id` int(11) NOT NULL,
  `angkatan_id` int(11) NOT NULL,
  `konten` text NOT NULL,
  `file_name` varchar(2000) DEFAULT NULL,
  `tanggal_masuk` date NOT NULL,
  `tanggal_akhir` date NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tugas`
--

INSERT INTO `tugas` (`id`, `matakuliah_id`, `dosen_id`, `kelas_id`, `angkatan_id`, `konten`, `file_name`, `tanggal_masuk`, `tanggal_akhir`, `created_at`, `updated_at`) VALUES
(1, 1, 1, 1, 1, '<p><span>Dear all,</span><br /><br /><span>Silahkan kumpulkan laporan mandiri softfile pertemuan 1 di sini. Laporan fisik dikumpulkan ke ketua kelas dan ketua kelas silahkan meletakkan di atas meja saya (di ruang perpustakaan) sebelum jam 12 siang.</span><br /><br /><span>Salam,</span></p>', 'Format Laporan Mandiri.docx', '2018-09-16', '2018-09-17', '2018-09-16 10:59:15', '2018-09-16 10:59:15'),
(2, 1, 1, 2, 1, '<p><span>Dear all,</span><br /><br /><span>Silahkan kumpulkan laporan mandiri softfile pertemuan 1 di sini. Laporan fisik dikumpulkan ke ketua kelas dan ketua kelas silahkan meletakkan di atas meja saya (di ruang perpustakaan) sebelum jam 12 siang.</span><br /><br /><span>Salam,</span></p>', 'Format Laporan Mandiri.docx', '2018-09-16', '2018-09-17', '2018-09-16 10:59:52', '2018-09-16 10:59:52'),
(3, 1, 1, 3, 1, '<p><span>Dear all,</span><br /><br /><span>Silahkan kumpulkan laporan mandiri softfile pertemuan 1 di sini. Laporan fisik dikumpulkan ke ketua kelas dan ketua kelas silahkan meletakkan di atas meja saya (di ruang perpustakaan) sebelum jam 12 siang.</span><br /><br /><span>Salam,</span></p>', 'Format Laporan Mandiri.docx', '2018-09-16', '2018-09-17', '2018-09-16 11:03:34', '2018-09-16 11:03:34'),
(4, 3, 12, 1, 1, '<p>Dear all,</p>\r\n<p>Silahkan upload file tugas 1 kewirausahaan sebelum tanggal 18 September 2018</p>\r\n<p>Salam,</p>', 'Laporan Mandiri Kewirausahaan 2018.docx', '2018-09-17', '2018-09-18', '2018-09-16 13:23:59', '2018-09-16 13:23:59'),
(5, 3, 12, 2, 1, '<p>Dear all,</p>\r\n<p>Silahkan upload file tugas 1 kewirausahaan sebelum tanggal 19 September 2018</p>\r\n<p>Salam,</p>', 'Pertemuan Pertama Kewirausahaan 2018.pptx', '2018-09-17', '2018-09-19', '2018-09-16 13:25:14', '2018-09-16 13:25:14'),
(6, 3, 12, 3, 1, '<p>Dear all,</p>\r\n<p>Silahkan upload file tugas 1 kewirausahaan sebelum tanggal 20 September 2018</p>\r\n<p>Salam,</p>', 'Laporan Mandiri Kewirausahaan 2018.docx', '2018-09-17', '2018-09-20', '2018-09-16 13:25:39', '2018-09-16 13:25:39'),
(7, 4, 13, 1, 1, '<p>xcxcxczxczxczxczxc</p>', '363-732-1-SM.pdf', '2018-09-21', '2018-09-22', '2018-09-20 21:58:25', '2018-09-20 21:58:25'),
(8, 3, 12, 1, 1, '<p>Silahkan upload tugas disini</p>', 'Format Laporan Mandiri.docx', '2018-09-22', '2018-09-23', '2018-09-21 01:22:43', '2018-09-21 01:22:43');

-- --------------------------------------------------------

--
-- Table structure for table `tugasmahasiswa`
--

CREATE TABLE `tugasmahasiswa` (
  `id` int(11) NOT NULL,
  `mahasiswa_id` int(11) NOT NULL,
  `kelas_id` int(11) DEFAULT NULL,
  `angkatan_id` int(11) NOT NULL,
  `matakuliah_id` int(11) DEFAULT NULL,
  `file_name` varchar(2000) NOT NULL,
  `tanggal_masuk` date NOT NULL,
  `nilai` int(11) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tugasmahasiswa`
--

INSERT INTO `tugasmahasiswa` (`id`, `mahasiswa_id`, `kelas_id`, `angkatan_id`, `matakuliah_id`, `file_name`, `tanggal_masuk`, `nilai`, `created_at`, `updated_at`) VALUES
(1, 1, 1, 1, 1, 'Tugas_KapitaSelekta_VaniaAzari.docx', '2018-09-16', 85, '2018-09-16 14:10:31', '2018-09-16 14:10:31'),
(2, 2, 1, 1, 1, 'Tugas_KapitaSelekta_AmindaPramitaSani.docx', '2018-09-16', 80, '2018-10-09 22:51:02', '2018-10-09 22:51:02'),
(3, 7, 1, 1, 1, 'Tugas_KapitaSelekta_AuliaFitri.docx', '2018-09-16', 85, '2018-09-16 14:10:51', '2018-09-16 11:13:01'),
(4, 3, 1, 1, 1, 'Tugas_KapitaSelekta_AyuAnggraini.docx', '2018-09-16', 85, '2018-09-16 14:10:54', '2018-09-16 11:13:51'),
(5, 36, 1, 1, 1, 'Tugas_KapitaSelekta_DeaAnnisa.docx', '2018-09-16', 85, '2018-09-16 14:10:56', '2018-09-16 11:17:21'),
(6, 8, 1, 1, 1, 'Tugas_KapitaSelekta_FannySyafirhaAzmi.docx', '2018-09-16', 85, '2018-09-16 14:10:58', '2018-09-16 11:34:09'),
(7, 9, 1, 1, 1, 'Tugas_KapitaSelekta_TrisnaPutriSari.docx', '2018-09-16', 85, '2018-09-16 14:11:00', '2018-09-16 11:35:34'),
(8, 10, 1, 1, 1, 'Tugas_KapitaSelekta_KatrinaNovelia.docx', '2018-09-16', 85, '2018-09-16 14:11:02', '2018-09-16 11:36:27'),
(9, 11, 1, 1, 1, 'Tugas_KapitaSelekta_Sufendi.docx', '2018-09-16', 85, '2018-09-16 14:11:04', '2018-09-16 11:37:22'),
(10, 12, 1, 1, 1, 'Tugas_KapitaSelekta_Juliana.docx', '2018-09-16', 85, '2018-09-16 14:11:06', '2018-09-16 11:38:27'),
(11, 13, 1, 1, 1, 'Tugas_KapitaSelekta_RianaSurika.docx', '2018-09-16', 85, '2018-09-16 14:11:08', '2018-09-16 11:39:06'),
(12, 14, 1, 1, 1, 'Tugas_KapitaSelekta_ReryAudillaPutri.docx', '2018-09-16', 85, '2018-09-16 14:11:10', '2018-09-16 11:40:24'),
(13, 15, 1, 1, 1, 'Tugas_KapitaSelekta_PutriNovitaSari.docx', '2018-09-16', 85, '2018-09-16 14:11:11', '2018-09-16 11:41:02'),
(14, 29, 1, 1, 1, 'Tugas_KapitaSelekta_Apriantoni.docx', '2018-09-16', 85, '2018-09-16 14:11:13', '2018-09-16 11:42:30'),
(15, 32, 1, 1, 1, 'Tugas_KapitaSelekta_Khalfiahzahara.docx', '2018-09-16', 85, '2018-09-16 14:11:15', '2018-09-16 11:43:01'),
(16, 26, 1, 1, 1, 'Tugas_KapitaSelekta_KhoiriahAmani.docx', '2018-09-16', 85, '2018-09-16 14:11:22', '2018-09-16 11:45:14'),
(17, 27, 1, 1, 1, 'Tugas_KapitaSelekta_M.Alkhairi.docx', '2018-09-16', 85, '2018-09-16 14:11:25', '2018-09-16 11:46:42'),
(18, 33, 1, 1, 1, 'Tugas_KapitaSelekta_PutriLarasatiAnggiawan.docx', '2018-09-16', 85, '2018-09-16 14:11:29', '2018-09-16 11:47:30'),
(19, 21, 1, 1, 1, 'Tugas_KapitaSelekta_RisqahIndahUtari.docx', '2018-09-16', 85, '2018-09-16 14:11:31', '2018-09-16 11:48:35'),
(20, 34, 1, 1, 1, 'Tugas_KapitaSelekta_SamuelArdiman.docx', '2018-09-16', 85, '2018-09-16 14:11:33', '2018-09-16 11:49:32'),
(21, 28, 1, 1, 1, 'Tugas_KapitaSelekta_SatriaGunawan.docx', '2018-09-16', 85, '2018-09-16 14:11:35', '2018-09-16 11:50:02'),
(22, 22, 1, 1, 1, 'Tugas_KapitaSelekta_T.WidhiartiNabi;a.docx', '2018-09-16', 85, '2018-09-16 14:11:37', '2018-09-16 11:51:24'),
(23, 24, 1, 1, 1, 'Tugas_KapitaSelekta_TiaSantaEclesia.docx', '2018-09-16', 85, '2018-09-16 14:11:41', '2018-09-16 11:51:46'),
(24, 25, 1, 1, 1, 'Tugas_KapitaSelekta_VebbySabrina.docx', '2018-09-16', 85, '2018-09-16 14:11:43', '2018-09-16 11:53:33'),
(25, 30, 1, 1, 1, 'Tugas_KapitaSelekta_WidyaFransisca.docx', '2018-09-16', 85, '2018-09-16 14:11:45', '2018-09-16 11:53:57'),
(26, 23, 1, 1, 1, 'Tugas_KapitaSelekta_WidyaHestyRahayu.docx', '2018-09-16', 85, '2018-09-29 13:11:22', '2018-09-29 13:11:22'),
(28, 19, 2, 1, 1, 'Tugas_KapitaSelekta_RosmahHasibuan.docx', '2018-09-16', 85, '2018-09-16 14:11:55', '2018-09-16 12:14:29'),
(29, 31, 2, 1, 1, 'Tugas_KapitaSelekta_RizkaJulaina.docx', '2018-09-16', 85, '2018-09-16 14:11:56', '2018-09-16 12:15:34'),
(30, 20, 2, 1, 1, 'Tugas_KapitaSelekta_RozaFitria.docx', '2018-09-16', 85, '2018-09-16 14:11:58', '2018-09-16 12:16:01'),
(31, 18, 3, 1, 1, 'Tugas_KapitaSelekta_IsmiNurhasanah.docx', '2018-09-16', 85, '2018-09-16 14:12:04', '2018-09-16 12:17:57'),
(32, 35, 3, 1, 1, 'Tugas_KapitaSelekta_SharlyHestariP.docx', '2018-09-16', 85, '2018-09-16 14:12:10', '2018-09-16 12:18:26'),
(33, 2, 1, 1, 3, 'Tugas_KWU_AmindaPramitaSani.docx', '2018-09-17', 80, '2018-09-16 14:12:19', '2018-09-16 13:26:38'),
(34, 29, 1, 1, 3, 'Tugas_KWU_Apriantoni.docx', '2018-09-17', 80, '2018-09-16 14:12:22', '2018-09-16 13:27:16'),
(35, 7, 1, 1, 3, 'Tugas_KWU_AuliaFitri.docx', '2018-09-17', 82, '2018-09-16 14:12:29', '2018-09-16 13:27:46'),
(36, 3, 1, 1, 3, 'Tugas_KWU_AyuAnggraini.docx', '2018-09-17', 82, '2018-09-16 14:12:32', '2018-09-16 13:28:12'),
(37, 36, 1, 1, 3, 'Tugas_KWU_DeaAnnisa.docx', '2018-09-17', 82, '2018-09-16 14:12:34', '2018-09-16 13:28:39'),
(38, 8, 1, 1, 3, 'Tugas_KWU_FannySyafirhaAzmi.docx', '2018-09-17', 80, '2018-09-16 14:12:36', '2018-09-16 13:31:15'),
(40, 12, 1, 1, 3, 'Tugas_KWU_Juliana.docx', '2018-09-17', 80, '2018-09-16 14:12:40', '2018-09-16 13:32:17'),
(41, 10, 1, 1, 3, 'Tugas_KWU_KatrinaNovelia.docx', '2018-09-17', 80, '2018-09-16 14:12:44', '2018-09-16 13:32:42'),
(42, 32, 1, 1, 3, 'Tugas_KWU_Khalfiahzahara.docx', '2018-09-17', 85, '2018-09-16 14:12:46', '2018-09-16 13:33:13'),
(43, 26, 1, 1, 3, 'Tugas_KWU_KhoiriahAmani.docx', '2018-09-17', 85, '2018-09-16 14:12:49', '2018-09-16 13:33:53'),
(44, 27, 1, 1, 3, 'Tugas_KWU_M.Alkhairi.docx', '2018-09-17', 85, '2018-09-16 14:12:51', '2018-09-16 13:34:23'),
(45, 33, 1, 1, 3, 'Tugas_KWU_PutriLarasatiAnggiawan.docx', '2018-09-17', 85, '2018-09-16 14:12:53', '2018-09-16 13:34:57'),
(46, 15, 1, 1, 3, 'Tugas_KWU_PutriNovitaSari.docx', '2018-09-17', 80, '2018-09-16 14:12:55', '2018-09-16 13:35:24'),
(47, 14, 1, 1, 3, 'Tugas_KWU_ReryAudillaPutri.docx', '2018-09-17', 80, '2018-09-16 14:12:57', '2018-09-16 13:35:55'),
(48, 13, 1, 1, 3, 'Tugas_KWU_RianaSurika.docx', '2018-09-17', 85, '2018-09-16 14:12:58', '2018-09-16 13:36:26'),
(50, 21, 1, 1, 3, 'Tugas_KWU_RisqahIndahUtari.docx', '2018-09-17', 82, '2018-09-16 14:13:00', '2018-09-16 13:37:44'),
(51, 31, 2, 1, 3, 'Tugas_KWU_RizkaJulaina.docx', '2018-09-17', 85, '2018-09-16 14:13:02', '2018-09-16 13:38:16'),
(52, 19, 2, 1, 3, 'Tugas_KWU_RosmahHasibuan.docx', '2018-09-17', 80, '2018-09-16 14:13:04', '2018-09-16 13:38:55'),
(53, 20, 2, 1, 3, 'Tugas_KWU_RozaFitria.docx', '2018-09-17', 83, '2018-09-16 14:13:13', '2018-09-16 13:39:22'),
(54, 34, 1, 1, 3, 'Tugas_KWU_SamuelArdiman.docx', '2018-09-17', 85, '2018-09-16 14:13:15', '2018-09-16 13:40:41'),
(55, 28, 1, 1, 3, 'Tugas_KWU_SatriaGunawan.docx', '2018-09-17', 82, '2018-09-16 14:13:17', '2018-09-16 13:41:08'),
(56, 35, 3, 1, 3, 'Tugas_KWU_SharlyHestariP.docx', '2018-09-17', 80, '2018-09-16 14:13:19', '2018-09-16 13:41:45'),
(57, 11, 1, 1, 3, 'Tugas_KWU_Sufendi.docx', '2018-09-17', 85, '2018-09-16 14:13:21', '2018-09-16 13:42:14'),
(58, 22, 1, 1, 3, 'Tugas_KWU_T.WidhiartiNabila.docx', '2018-09-17', 82, '2018-09-16 14:13:23', '2018-09-16 13:42:44'),
(59, 24, 1, 1, 3, 'Tugas_KWU_TiaSantaEclesia.docx', '2018-09-17', 80, '2018-09-16 14:13:25', '2018-09-16 13:43:10'),
(60, 9, 1, 1, 3, 'Tugas_KWU_TrisnaPutriSari.docx', '2018-09-17', 80, '2018-09-16 14:13:31', '2018-09-16 13:44:05'),
(61, 1, 1, 1, 3, 'Tugas_KWU_VaniaAzari.docx', '2018-09-17', 80, '2018-09-16 14:13:34', '2018-09-16 13:44:32'),
(62, 25, 1, 1, 3, 'Tugas_KWU_VebbySabrina.docx', '2018-09-17', 82, '2018-09-16 14:13:39', '2018-09-16 13:45:06'),
(63, 30, 1, 1, 3, 'Tugas_KWU_WidyaFransisca.docx', '2018-09-17', 85, '2018-09-16 14:13:46', '2018-09-16 13:45:35'),
(64, 23, 1, 1, 3, 'Tugas_KWU_WidyaHestyRahayu.docx', '2018-09-17', 85, '2018-09-16 14:13:48', '2018-09-16 13:45:58'),
(77, 1, 1, 1, 7, 'Iterasi Kuesioner.docx', '2018-10-27', 80, '2018-10-10 15:06:16', '2018-10-10 15:06:16'),
(78, 2, 1, 1, 7, 'HALAMAN PENGESAHAN II.docx', '2018-10-27', 85, '2018-10-10 15:06:24', '2018-10-10 15:06:24'),
(79, 3, 1, 1, 7, 'E-learning.jpg', '2018-10-27', NULL, '2018-10-10 15:42:53', '2018-10-10 15:42:53'),
(80, 1, 1, 1, 3, 'dataTables.bootstrap.min.css', '2018-09-22', NULL, '2018-10-10 15:49:43', '2018-10-10 15:49:43');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `angkatan`
--
ALTER TABLE `angkatan`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `chat`
--
ALTER TABLE `chat`
  ADD PRIMARY KEY (`id`),
  ADD KEY `kelas_iddds` (`kelas_id`),
  ADD KEY `dosen_iddd` (`dosen_id`),
  ADD KEY `angkatan_iddds` (`angkatan_id`);

--
-- Indexes for table `chatmhs`
--
ALTER TABLE `chatmhs`
  ADD PRIMARY KEY (`id`),
  ADD KEY `mahasiswa_idxx` (`mahasiswa_id`),
  ADD KEY `kelas_idxx` (`kelas_id`),
  ADD KEY `dosen_ass` (`dosen_id`),
  ADD KEY `chat_idxx` (`chat_id`),
  ADD KEY `angkatan_idxx` (`angkatan_id`);

--
-- Indexes for table `dosen`
--
ALTER TABLE `dosen`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `filetable`
--
ALTER TABLE `filetable`
  ADD PRIMARY KEY (`id`),
  ADD KEY `kelas_idx` (`kelas_id`),
  ADD KEY `matakuliah_idx` (`matakuliah_id`),
  ADD KEY `angkatan_idz` (`angkatan_id`),
  ADD KEY `dosen` (`dosen_id`);

--
-- Indexes for table `group_kuis`
--
ALTER TABLE `group_kuis`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_kelas` (`id_kelas`),
  ADD KEY `id_matakuliah` (`id_matakuliah`),
  ADD KEY `dosen_id_dx` (`dosen_id`),
  ADD KEY `groupkuis_ibfk_3` (`angkatan_id`);

--
-- Indexes for table `group_kuis_essay`
--
ALTER TABLE `group_kuis_essay`
  ADD PRIMARY KEY (`id`),
  ADD KEY `kelas_ssdsasw` (`kelas_id`),
  ADD KEY `matkul` (`matkul_id`),
  ADD KEY `angkatan_iddsawr` (`angkatan_id`),
  ADD KEY `dosen_ddawrt` (`dosen_id`);

--
-- Indexes for table `kelas`
--
ALTER TABLE `kelas`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `kuis`
--
ALTER TABLE `kuis`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_group_kuis` (`group_kuis_id`) USING BTREE;

--
-- Indexes for table `kuis_essay`
--
ALTER TABLE `kuis_essay`
  ADD PRIMARY KEY (`id`),
  ADD KEY `group` (`group_kuis_id`);

--
-- Indexes for table `kuis_jawaban`
--
ALTER TABLE `kuis_jawaban`
  ADD PRIMARY KEY (`id`),
  ADD KEY `kuis_id` (`kuis_id`);

--
-- Indexes for table `kuis_jawaban_essay`
--
ALTER TABLE `kuis_jawaban_essay`
  ADD PRIMARY KEY (`id`),
  ADD KEY `group_essay` (`group_kuis_id`);

--
-- Indexes for table `log_activities`
--
ALTER TABLE `log_activities`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `mahasiswa`
--
ALTER TABLE `mahasiswa`
  ADD PRIMARY KEY (`id`),
  ADD KEY `prodi_id` (`prodi_id`),
  ADD KEY `kelas_ids` (`kelas_id`),
  ADD KEY `angkatan_id` (`angkatan_id`);

--
-- Indexes for table `matakuliah`
--
ALTER TABLE `matakuliah`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `matakuliahkelas`
--
ALTER TABLE `matakuliahkelas`
  ADD PRIMARY KEY (`id`),
  ADD KEY `matakuliah_id` (`matakuliah_id`),
  ADD KEY `kelas_id` (`kelas_id`),
  ADD KEY `dosens_id` (`dosen_id`),
  ADD KEY `angkatan_ids` (`angkatan_id`);

--
-- Indexes for table `materi_file`
--
ALTER TABLE `materi_file`
  ADD PRIMARY KEY (`id`),
  ADD KEY `materi_id` (`materi_id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pengumuman`
--
ALTER TABLE `pengumuman`
  ADD PRIMARY KEY (`id`),
  ADD KEY `dosen_id` (`dosen_id`),
  ADD KEY `angkatan` (`angkatan_id`),
  ADD KEY `kelas` (`kelas_id`);

--
-- Indexes for table `prodi`
--
ALTER TABLE `prodi`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tugas`
--
ALTER TABLE `tugas`
  ADD PRIMARY KEY (`id`),
  ADD KEY `matakuliah_ids` (`matakuliah_id`),
  ADD KEY `dosen_ids` (`dosen_id`),
  ADD KEY `kelas_idd` (`kelas_id`),
  ADD KEY `angkatan_idds` (`angkatan_id`);

--
-- Indexes for table `tugasmahasiswa`
--
ALTER TABLE `tugasmahasiswa`
  ADD PRIMARY KEY (`id`),
  ADD KEY `mahasiswa_idd` (`mahasiswa_id`),
  ADD KEY `kelas_iddss` (`kelas_id`),
  ADD KEY `matakuliah_idd` (`matakuliah_id`),
  ADD KEY `angkatan_idd` (`angkatan_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `angkatan`
--
ALTER TABLE `angkatan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `chat`
--
ALTER TABLE `chat`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `chatmhs`
--
ALTER TABLE `chatmhs`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;

--
-- AUTO_INCREMENT for table `dosen`
--
ALTER TABLE `dosen`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=55;

--
-- AUTO_INCREMENT for table `filetable`
--
ALTER TABLE `filetable`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `group_kuis`
--
ALTER TABLE `group_kuis`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `group_kuis_essay`
--
ALTER TABLE `group_kuis_essay`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `kelas`
--
ALTER TABLE `kelas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `kuis`
--
ALTER TABLE `kuis`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `kuis_essay`
--
ALTER TABLE `kuis_essay`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `kuis_jawaban`
--
ALTER TABLE `kuis_jawaban`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT for table `kuis_jawaban_essay`
--
ALTER TABLE `kuis_jawaban_essay`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `log_activities`
--
ALTER TABLE `log_activities`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `mahasiswa`
--
ALTER TABLE `mahasiswa`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=70;

--
-- AUTO_INCREMENT for table `matakuliah`
--
ALTER TABLE `matakuliah`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=104;

--
-- AUTO_INCREMENT for table `matakuliahkelas`
--
ALTER TABLE `matakuliahkelas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `materi_file`
--
ALTER TABLE `materi_file`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `pengumuman`
--
ALTER TABLE `pengumuman`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `prodi`
--
ALTER TABLE `prodi`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `tugas`
--
ALTER TABLE `tugas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `tugasmahasiswa`
--
ALTER TABLE `tugasmahasiswa`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=81;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
