-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 10, 2023 at 04:48 AM
-- Server version: 10.4.25-MariaDB
-- PHP Version: 8.1.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `nebengin`
--

-- --------------------------------------------------------

--
-- Table structure for table `alasan_pembatalans`
--

CREATE TABLE `alasan_pembatalans` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `alasan` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `alasan_pembatalans`
--

INSERT INTO `alasan_pembatalans` (`id`, `alasan`, `created_at`, `updated_at`) VALUES
(2, 'males', '2022-12-26 17:56:45', '2022-12-26 17:56:45');

-- --------------------------------------------------------

--
-- Table structure for table `daerahs`
--

CREATE TABLE `daerahs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nama` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `keterangan` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `daerahs`
--

INSERT INTO `daerahs` (`id`, `nama`, `keterangan`, `created_at`, `updated_at`) VALUES
(1, 'Pontianaks', NULL, '2022-12-02 01:55:38', '2022-12-05 20:23:11'),
(2, 'singkiwing', NULL, '2022-12-03 22:25:33', '2022-12-03 23:55:28'),
(4, 'Sintang', 'jaouh', '2022-12-07 00:19:04', '2022-12-07 00:19:04'),
(5, 'Sekurak', 'sas', '2022-12-07 00:19:12', '2022-12-07 00:19:12'),
(6, 'Ngabangs', 'sasa', '2022-12-07 00:19:29', '2022-12-07 00:19:29');

-- --------------------------------------------------------

--
-- Table structure for table `driverprofils`
--

CREATE TABLE `driverprofils` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `drivers_id` bigint(20) UNSIGNED DEFAULT NULL,
  `kendaraans_id` bigint(20) UNSIGNED DEFAULT NULL,
  `foto_profil` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` varchar(20) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `ktp` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `sim` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `stnk` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `fotokendaraan1` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `fotokendaraan2` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `fotokendaraan3` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `fotokendaraan4` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `fotokendaraan5` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `no_plat` varchar(20) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `tipepelayanan` varchar(20) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `driverprofils`
--

INSERT INTO `driverprofils` (`id`, `drivers_id`, `kendaraans_id`, `foto_profil`, `status`, `ktp`, `sim`, `stnk`, `fotokendaraan1`, `fotokendaraan2`, `fotokendaraan3`, `fotokendaraan4`, `fotokendaraan5`, `created_at`, `updated_at`, `no_plat`, `tipepelayanan`) VALUES
(1, 2, 2, 'azizi.png', NULL, 'DriverProfil_3.OIP (1).jpeg', 'DriverProfil_3.20221126_091210.jpg', 'DriverProfil_3.205.png', 'DriverProfil_3.20221126_091002.jpg', 'DriverProfil_3.100220_WAU_VASCLIVERY_DKIMG0434-2-1-scaled.jpg', 'DriverProfil_3.R (2).jpeg', 'DriverProfil_3.R (1).jpeg', 'DriverProfil_3.OIP.jpeg', '2022-12-19 01:20:49', '2022-12-19 01:20:49', 'kb114141oq', 'Taxi'),
(2, 3, 2, NULL, NULL, 'DriverProfil_3.20221126_091210.jpg', 'DriverProfil_3.20221126_091210.jpg', 'DriverProfil_3.205.png', 'DriverProfil_3.20221126_091002.jpg', 'DriverProfil_3.100220_WAU_VASCLIVERY_DKIMG0434-2-1-scaled.jpg', 'DriverProfil_3.R (2).jpeg', 'DriverProfil_3.R (1).jpeg', 'DriverProfil_3.OIP.jpeg', '2022-12-19 01:20:49', '2022-12-19 01:20:49', 'kb114141oq', 'Taxi'),
(3, 4, 4, NULL, NULL, NULL, 'DriverProfil_3.OIP (1).jpeg', 'DriverProfil_3.OIP.jpeg', 'DriverProfil_3.319045074_1557392108059615_9216902772021151370_n.jpg', 'DriverProfil_3.grandmax.jpeg', 'DriverProfil_3.R (2).jpeg', 'DriverProfil_3.R.jpeg', 'DriverProfil_3.R (1).jpeg', '2022-12-20 23:56:46', '2022-12-20 23:56:46', 'kb114141oq', 'Taxi'),
(4, 12, 4, NULL, NULL, NULL, 'DriverProfil_3.OIP (1).jpeg', 'DriverProfil_3.OIP.jpeg', 'DriverProfil_3.319045074_1557392108059615_9216902772021151370_n.jpg', 'DriverProfil_3.grandmax.jpeg', 'DriverProfil_3.R (2).jpeg', 'DriverProfil_3.R.jpeg', 'DriverProfil_3.R (1).jpeg', '2022-12-20 23:56:46', '2022-12-20 23:56:46', 'kb114141oq', 'Pickup'),
(5, 13, 4, NULL, NULL, NULL, 'DriverProfil_3.OIP (1).jpeg', 'DriverProfil_3.OIP.jpeg', 'DriverProfil_3.319045074_1557392108059615_9216902772021151370_n.jpg', 'DriverProfil_3.grandmax.jpeg', 'DriverProfil_3.R (2).jpeg', 'DriverProfil_3.R.jpeg', 'DriverProfil_3.R (1).jpeg', '2022-12-20 23:56:46', '2022-12-20 23:56:46', 'kb114141oq', 'Pickup'),
(6, 15, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2023-01-03 01:38:49', '2023-01-03 01:38:49', NULL, NULL),
(7, 16, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2023-01-03 01:39:48', '2023-01-03 01:39:48', NULL, NULL),
(8, 9, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2023-01-03 01:39:48', '2023-01-03 01:39:48', NULL, NULL),
(9, 10, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2023-01-03 01:39:48', '2023-01-03 01:39:48', NULL, NULL),
(10, 11, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2023-01-03 01:39:48', '2023-01-03 01:39:48', NULL, NULL),
(11, 12, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2023-01-03 01:39:48', '2023-01-03 01:39:48', NULL, NULL),
(12, 13, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2023-01-03 01:39:48', '2023-01-03 01:39:48', NULL, NULL),
(13, 14, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2023-01-03 01:39:48', '2023-01-03 01:39:48', NULL, NULL),
(14, 17, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2023-01-05 19:25:09', '2023-01-05 19:25:09', NULL, NULL),
(15, 18, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2023-01-05 19:26:12', '2023-01-05 19:26:12', NULL, NULL),
(16, 21, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2023-01-05 19:28:08', '2023-01-05 19:28:08', NULL, NULL),
(17, 23, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2023-01-05 19:30:20', '2023-01-05 19:30:20', NULL, NULL),
(18, 24, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2023-01-05 19:30:53', '2023-01-05 19:30:53', NULL, NULL),
(19, 25, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2023-01-05 19:32:14', '2023-01-05 19:32:14', NULL, NULL),
(20, 27, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2023-01-05 19:34:06', '2023-01-05 19:34:06', NULL, NULL),
(21, 29, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2023-01-05 19:34:53', '2023-01-05 19:34:53', NULL, NULL),
(22, 31, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2023-01-05 19:53:38', '2023-01-05 19:53:38', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `jenis_motors`
--

CREATE TABLE `jenis_motors` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `jenis_motor` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tarif_per_motor` double(50,0) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `jenis_motors`
--

INSERT INTO `jenis_motors` (`id`, `jenis_motor`, `tarif_per_motor`, `created_at`, `updated_at`) VALUES
(3, 'Kecil', 20000, '2023-01-01 19:48:18', '2023-01-01 19:48:18'),
(4, 'Sedang', 50000, '2023-01-01 19:48:30', '2023-01-01 19:48:30'),
(5, 'Besar', 100000, '2023-01-01 19:48:42', '2023-01-01 19:48:42');

-- --------------------------------------------------------

--
-- Table structure for table `kendaraans`
--

CREATE TABLE `kendaraans` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nama_tipe` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `jumlah_kursi` int(20) NOT NULL,
  `gambardenah` varchar(225) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `kendaraans`
--

INSERT INTO `kendaraans` (`id`, `nama_tipe`, `jumlah_kursi`, `gambardenah`, `created_at`, `updated_at`) VALUES
(2, 'mobil ayla', 12, 'Kendaraan_0.R (2).jpeg', '2022-12-05 20:08:26', '2022-12-09 01:48:41'),
(3, 'Mobil avanza', 6, 'Kendaraan_0.R (1).jpeg', '2022-12-07 00:47:12', '2022-12-07 00:47:21'),
(4, 'mobil Sedan', 3, 'Kendaraan_0.R.jpeg', '2022-12-07 00:47:45', '2022-12-07 00:47:45'),
(5, 'Mobil Racing', 2, 'Kendaraan_0.100220_WAU_VASCLIVERY_DKIMG0434-2-1-scaled.jpg', '2022-12-07 00:48:00', '2022-12-07 00:48:00'),
(7, 'Mobil grandmax', 3, 'Kendaraan_0.grandmax.jpeg', '2022-12-19 00:19:19', '2022-12-19 00:19:19');

-- --------------------------------------------------------

--
-- Table structure for table `metodes`
--

CREATE TABLE `metodes` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `namabank` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `norekening` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `namapemilik` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `metodes`
--

INSERT INTO `metodes` (`id`, `namabank`, `norekening`, `namapemilik`, `created_at`, `updated_at`) VALUES
(2, 'Bank BCA', '1112221221', 'PPurnomo', '2022-12-11 23:59:33', '2022-12-11 23:59:43');

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
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(5, '2022_12_01_144533_create_daerahs_table', 1),
(6, '2022_12_01_144548_create_rutes_table', 1),
(7, '2022_12_01_144557_create_tarif_table', 1),
(8, '2022_12_01_144609_create_kendaraans_table', 1),
(9, '2022_12_01_144621_create_trips_table', 1),
(10, '2022_12_08_073537_create_postingans_table', 2),
(11, '2022_12_09_070738_create_pickpups_table', 3),
(12, '2022_12_09_090215_create_pickups_table', 4),
(13, '2022_12_12_035501_create_metodes_table', 5),
(14, '2022_12_14_080739_create_driverprofils_table', 6),
(15, '2022_12_20_042320_create_alasan_pembatalans_table', 7),
(16, '2022_12_21_042358_create_penumpang_profils_table', 8),
(17, '2022_12_22_023033_create_trips_table', 9),
(18, '2022_12_23_075431_create_trip_penumpangs_table', 10),
(19, '2022_12_23_085137_create_requests_table', 11),
(20, '2022_12_29_045259_create_jenis_motors_table', 12),
(21, '2022_12_29_061948_create_pickup_tarifs_table', 13),
(22, '2022_12_30_090133_create_pickup_trips_tables', 14),
(23, '2022_12_31_061519_create_pickup_trips_table', 15),
(24, '2023_01_02_043417_create_pickup_trip_penumpangs_table', 16),
(25, '2023_01_03_070040_create_reviews_table', 17),
(26, '2023_01_04_020504_create_notifications_table', 18),
(27, '2023_01_05_023145_create_topup_saldos_table', 18),
(28, '2023_01_05_023200_create_total_saldos_table', 18);

-- --------------------------------------------------------

--
-- Table structure for table `notifications`
--

CREATE TABLE `notifications` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `penumpang_profils`
--

CREATE TABLE `penumpang_profils` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `users_id` bigint(20) UNSIGNED NOT NULL,
  `foto_profil` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `identitas` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `penumpang_profils`
--

INSERT INTO `penumpang_profils` (`id`, `users_id`, `foto_profil`, `identitas`, `created_at`, `updated_at`) VALUES
(1, 6, 'DriverProfil_3.20221126_091210.jpg', 'DriverProfil_3.OIP (1).jpg', NULL, NULL),
(2, 7, NULL, NULL, NULL, NULL),
(3, 8, NULL, NULL, NULL, NULL),
(5, 30, NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tokenable_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `abilities` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `expires_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `pickups`
--

CREATE TABLE `pickups` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tipe_pickup` varchar(225) COLLATE utf8mb4_unicode_ci NOT NULL,
  `gambarpi` varchar(225) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `pickup_tarifs`
--

CREATE TABLE `pickup_tarifs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `rutes_id` bigint(20) UNSIGNED NOT NULL,
  `tarif_per_barang` double NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `pickup_tarifs`
--

INSERT INTO `pickup_tarifs` (`id`, `rutes_id`, `tarif_per_barang`, `created_at`, `updated_at`) VALUES
(2, 2, 0, '2022-12-30 00:40:05', '2022-12-30 00:40:05'),
(3, 3, 0, '2022-12-30 00:43:33', '2022-12-30 00:43:33'),
(4, 4, 0, '2022-12-30 00:43:41', '2022-12-30 00:43:41');

-- --------------------------------------------------------

--
-- Table structure for table `pickup_trips`
--

CREATE TABLE `pickup_trips` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `users_id` bigint(20) UNSIGNED DEFAULT NULL,
  `jenis_motor_id` bigint(20) UNSIGNED DEFAULT NULL,
  `pickup_tarifs_id` bigint(20) UNSIGNED DEFAULT NULL,
  `profilp_id` bigint(20) UNSIGNED DEFAULT NULL,
  `profild_id` bigint(20) UNSIGNED DEFAULT NULL,
  `tanggal` date NOT NULL,
  `waktu` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `jam_keberangkatan` time(6) NOT NULL,
  `note` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `kapasitas` int(11) NOT NULL,
  `status_trip` varchar(11) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `pickup_trips`
--

INSERT INTO `pickup_trips` (`id`, `users_id`, `jenis_motor_id`, `pickup_tarifs_id`, `profilp_id`, `profild_id`, `tanggal`, `waktu`, `jam_keberangkatan`, `note`, `kapasitas`, `status_trip`, `created_at`, `updated_at`) VALUES
(2, 2, 3, 3, NULL, NULL, '2023-01-12', 'Sore', '17:08:00.000000', 'aasas', 2, 'Selesai', '2023-01-01 21:08:36', '2023-01-01 21:08:36'),
(3, 13, 3, 2, NULL, NULL, '2023-01-04', 'Pagi', '12:08:00.000000', 'sxsxsxsx', 1, 'Berangkat', '2023-01-01 21:09:00', '2023-01-01 21:09:00'),
(4, 12, 3, 4, NULL, NULL, '2023-01-18', 'Pagi', '10:09:00.000000', 'zx', 1, 'Tunggu', '2023-01-01 21:09:22', '2023-01-01 21:09:22');

-- --------------------------------------------------------

--
-- Table structure for table `pickup_trip_penumpangs`
--

CREATE TABLE `pickup_trip_penumpangs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `users_id` bigint(20) UNSIGNED DEFAULT NULL,
  `pickup_trips_id` bigint(20) UNSIGNED DEFAULT NULL,
  `profilp_id` bigint(20) UNSIGNED DEFAULT NULL,
  `profild_id` bigint(20) UNSIGNED DEFAULT NULL,
  `jenis_motor_id` bigint(20) UNSIGNED DEFAULT NULL,
  `tarif_pickups_id` bigint(20) UNSIGNED DEFAULT NULL,
  `foto` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `note_lokasi_jemput` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `catatan_antar` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` varchar(20) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `total` double NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `pickup_trip_penumpangs`
--

INSERT INTO `pickup_trip_penumpangs` (`id`, `users_id`, `pickup_trips_id`, `profilp_id`, `profild_id`, `jenis_motor_id`, `tarif_pickups_id`, `foto`, `note_lokasi_jemput`, `catatan_antar`, `status`, `total`, `created_at`, `updated_at`) VALUES
(1, 6, 2, NULL, NULL, 3, 3, '', 'ssasasasas', 'sasasasasasasasasasasasas', NULL, 0, NULL, '2023-01-08 23:46:42'),
(2, 7, 4, NULL, NULL, 3, 3, '', 'ssasasasas', 'sasasasasasasasasasasasas', '', 0, NULL, '2023-01-02 01:07:15'),
(3, 8, 4, NULL, NULL, 3, 3, '', 'ssasasasas', 'sasasasasasasasasasasasas', '', 0, NULL, '2023-01-03 06:01:29');

-- --------------------------------------------------------

--
-- Table structure for table `postingans`
--

CREATE TABLE `postingans` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `judul` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `teks` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `gambartul` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `postingans`
--

INSERT INTO `postingans` (`id`, `judul`, `teks`, `gambartul`, `created_at`, `updated_at`) VALUES
(1, 'Waw', 'assssss', 'Postingan_0.100220_WAU_VASCLIVERY_DKIMG0434-2-1-scaled.jpg', '2022-12-08 20:39:40', '2022-12-08 23:38:48');

-- --------------------------------------------------------

--
-- Table structure for table `requests`
--

CREATE TABLE `requests` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `reviews`
--

CREATE TABLE `reviews` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `users_id` bigint(20) UNSIGNED DEFAULT NULL,
  `penumpang_trips_id` bigint(20) UNSIGNED DEFAULT NULL,
  `teks_review` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `rating` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `rutes`
--

CREATE TABLE `rutes` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `daerah_asal` bigint(20) UNSIGNED NOT NULL,
  `daerah_tujuan` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `rutes`
--

INSERT INTO `rutes` (`id`, `daerah_asal`, `daerah_tujuan`, `created_at`, `updated_at`) VALUES
(2, 1, 1, '2022-12-06 01:02:20', '2022-12-07 00:18:41'),
(3, 1, 2, '2022-12-07 00:13:09', '2022-12-07 00:13:09'),
(4, 2, 5, '2022-12-07 00:19:41', '2022-12-07 00:20:20'),
(5, 6, 1, '2022-12-07 00:19:55', '2022-12-07 00:19:55');

-- --------------------------------------------------------

--
-- Table structure for table `tarif`
--

CREATE TABLE `tarif` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `rutes_id` bigint(20) UNSIGNED NOT NULL,
  `kendaraans_id` bigint(20) UNSIGNED NOT NULL,
  `tarif_per_orang` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `tarif`
--

INSERT INTO `tarif` (`id`, `rutes_id`, `kendaraans_id`, `tarif_per_orang`, `created_at`, `updated_at`) VALUES
(1, 3, 4, 12000, '2022-12-07 02:17:36', '2022-12-07 02:17:36'),
(3, 4, 4, 20000, '2022-12-07 23:08:37', '2022-12-07 23:09:04'),
(4, 5, 4, 200000, '2022-12-26 17:57:19', '2022-12-26 17:57:19'),
(5, 2, 2, 500000, '2022-12-26 17:57:30', '2022-12-26 17:57:30');

-- --------------------------------------------------------

--
-- Table structure for table `topup_saldos`
--

CREATE TABLE `topup_saldos` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `users_id` bigint(20) UNSIGNED NOT NULL,
  `jumlah_saldo_inputan` double NOT NULL,
  `bukti` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tanggal_topup` date NOT NULL,
  `status_top_up` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `topup_saldos`
--

INSERT INTO `topup_saldos` (`id`, `users_id`, `jumlah_saldo_inputan`, `bukti`, `tanggal_topup`, `status_top_up`, `created_at`, `updated_at`) VALUES
(1, 31, 150000, 'ajiji.png', '2023-01-13', 'Konfirmasi', NULL, '2023-01-05 20:56:16');

-- --------------------------------------------------------

--
-- Table structure for table `total_saldos`
--

CREATE TABLE `total_saldos` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `users_id` bigint(20) UNSIGNED DEFAULT NULL,
  `topup_saldo_id` bigint(20) UNSIGNED DEFAULT NULL,
  `jumlah_saldo_sekarang` double DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `total_saldos`
--

INSERT INTO `total_saldos` (`id`, `users_id`, `topup_saldo_id`, `jumlah_saldo_sekarang`, `created_at`, `updated_at`) VALUES
(1, 10, NULL, 15000, NULL, NULL),
(2, 9, NULL, 15000, NULL, NULL),
(3, 2, NULL, 16000, NULL, NULL),
(4, 4, NULL, 16000, NULL, NULL),
(5, 11, NULL, 50000, NULL, NULL),
(6, 12, NULL, 50000, NULL, NULL),
(7, 13, NULL, 16000, NULL, NULL),
(8, 14, NULL, 16000, NULL, NULL),
(9, 16, NULL, 16000, NULL, NULL),
(10, 15, NULL, 16000, NULL, NULL),
(24, NULL, NULL, NULL, '2023-01-05 19:30:53', '2023-01-05 19:30:53'),
(25, 29, NULL, NULL, '2023-01-05 19:34:53', '2023-01-05 19:34:53'),
(26, 31, NULL, 762000, '2023-01-05 19:53:38', '2023-01-05 20:56:16');

-- --------------------------------------------------------

--
-- Table structure for table `trips`
--

CREATE TABLE `trips` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `users_id` bigint(20) UNSIGNED DEFAULT NULL,
  `kendaraans_id` bigint(20) UNSIGNED DEFAULT NULL,
  `profild_id` bigint(20) UNSIGNED DEFAULT NULL,
  `tarifs_id` bigint(20) UNSIGNED NOT NULL,
  `tanggal` date DEFAULT NULL,
  `waktu` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `jam_keberangkatan` time(6) DEFAULT NULL,
  `kapasitas` int(11) NOT NULL,
  `status_trip` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `catatan` text COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `trips`
--

INSERT INTO `trips` (`id`, `users_id`, `kendaraans_id`, `profild_id`, `tarifs_id`, `tanggal`, `waktu`, `jam_keberangkatan`, `kapasitas`, `status_trip`, `created_at`, `updated_at`, `catatan`) VALUES
(8, 12, 2, NULL, 3, '2023-01-30', 'Pagi', NULL, 12, 'Tunggu', '2022-12-26 21:45:21', '2022-12-26 21:45:21', 'sdsds'),
(13, 10, 2, NULL, 3, '2023-01-30', 'Pagi', NULL, 12, 'Selesai', '2022-12-26 21:45:21', '2022-12-26 21:45:21', 'sdsds');

-- --------------------------------------------------------

--
-- Table structure for table `trip_penumpangs`
--

CREATE TABLE `trip_penumpangs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `users_id` bigint(20) UNSIGNED DEFAULT NULL,
  `trips_id` bigint(20) UNSIGNED DEFAULT NULL,
  `profilp_id` bigint(20) UNSIGNED DEFAULT NULL,
  `profild_id` bigint(20) UNSIGNED DEFAULT NULL,
  `tarifs_id` bigint(20) UNSIGNED DEFAULT NULL,
  `catatan_lokasi` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `posisi_kursi` int(11) NOT NULL,
  `review` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `rating` int(20) DEFAULT NULL,
  `status` varchar(20) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `alasan_pembatalan` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `trip_penumpangs`
--

INSERT INTO `trip_penumpangs` (`id`, `users_id`, `trips_id`, `profilp_id`, `profild_id`, `tarifs_id`, `catatan_lokasi`, `posisi_kursi`, `review`, `rating`, `status`, `alasan_pembatalan`, `created_at`, `updated_at`) VALUES
(3, 6, 8, NULL, NULL, NULL, 'sdsdsdsdsd', 3, NULL, NULL, NULL, '', NULL, '2023-01-03 05:41:00'),
(4, 7, 8, NULL, NULL, NULL, 'tolong', 3, NULL, NULL, 'Batal', '', NULL, '2023-01-04 00:15:57'),
(5, 8, 13, NULL, NULL, NULL, 'kuluk', 3, 'bagus', 5, NULL, '', NULL, '2022-12-31 00:23:09');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `no_hp` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `role` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` varchar(20) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `driverprofils_id` bigint(20) UNSIGNED DEFAULT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `no_hp`, `role`, `status`, `driverprofils_id`, `remember_token`, `created_at`, `updated_at`) VALUES
(2, 'Shiva AlDamar', 'AlDamar@gmail.com', NULL, '1234', '08554465285', 'Driver', 'Tidak Aktif', NULL, NULL, '2022-12-13 02:04:32', '2023-01-08 18:09:43'),
(3, 'Admin', 'admin@gmail.com', NULL, '$2y$10$7AJICAslLBiLFUWtOH50aOq4ryIii/ku2z.sn3b/yK.lHecEr/4n6', '14045', 'Admin', NULL, NULL, NULL, '2022-12-13 02:04:59', '2022-12-13 02:04:59'),
(4, 'Asep Suaji', 'Asep@gmail.com', NULL, '$2y$10$grZ.rR9cxiCB4lJBIxcrtuN3m0qbN3H2aEbKUZUDo4Ap/FQ6lqIgK', '08455584888', 'Driver', 'Tidak Aktif', 1, NULL, '2022-12-17 22:51:45', '2023-01-08 19:09:34'),
(5, 'David', 'david@gmail.com', NULL, '$2y$10$BKfaL4FUpeDhnH8xjJEwi.urExJq/nr5mDbPIRO60nH3brpqlPjzu', '08085851515151', 'Admin', NULL, NULL, NULL, '2022-12-20 23:57:26', '2022-12-20 23:57:26'),
(6, 'Zhilan Al mahya', 'zhilan@gmail.com', NULL, '$2y$10$rBGwOySxC51gLINadtpcZe7d6cjGjAAlawB3GxVHkbY/xjMhT3PQq', '0854151515', 'Pengguna', NULL, NULL, NULL, '2022-12-25 06:16:54', '2022-12-25 06:16:54'),
(7, 'Ibrahim Rizki Attauhid', 'Ibi@gmail.com', NULL, '$2y$10$amULl5R09wV2RBDWpKjY9u5i6idE5CXFTQe2eLFIgLP5OWnlxgzqm', '08181848', 'Pengguna', NULL, NULL, NULL, '2022-12-25 06:17:23', '2023-01-03 20:49:59'),
(8, 'Aminulatif', 'amin@gmail.com', NULL, '$2y$10$0n80CyQdpXaFCg59PP9Zw.iRipWKLrn18Ab02SPK9hrauPEYQ1PTS', '052552525', 'Pengguna', NULL, NULL, NULL, '2022-12-25 06:17:39', '2022-12-25 06:17:39'),
(9, 'Hasibuan Kuncoro', 'kuncoro@gmail.com', NULL, '$2y$10$7911pE1iwiYYZotX3aReCeAZkHjdgyyo14gB7QL9Gf6bG6Jsx19GW', '12121212121212', 'Driver', NULL, NULL, NULL, '2022-12-26 01:14:07', '2022-12-26 01:14:07'),
(10, 'Ebel Silalahi', 'Ebel@gmail.com', NULL, '$2y$10$oAbxoi9R142FRNoqrZShwOswLYsxeBzoVzyQCSLrDGHN4K9DApqlm', '1212121212121221', 'Driver', NULL, NULL, NULL, '2022-12-26 01:14:32', '2022-12-26 01:14:32'),
(12, 'Ujang Kasim', 'ujang@gmail.com', NULL, '$2y$10$.hc7UA6/Lm2G2mPk5M7/IORhxxYUDG0CTOyGPwRGRSeX0ImMFMo/.', '01020202', 'Driver', NULL, NULL, NULL, '2022-12-30 07:53:41', '2022-12-30 07:53:41'),
(13, 'Alip Sipung', 'alip@gmail.com', NULL, '$2y$10$IYZ.oNouzWuz305yRpb2Zu.DvnjAa2YY6tTffaQ/euT76797uiHDe', '1121212', 'Driver', NULL, NULL, NULL, '2022-12-30 07:54:32', '2022-12-30 07:54:32'),
(14, 'asasa', 'sasssaa@gmail.com', NULL, '$2y$10$UPv6hObNQ/pIPzF0xvL9eO3cfwyQDMoXto6tM0zQebnlE4pxE0uxK', '57656734534', 'Driver', NULL, NULL, NULL, '2023-01-03 01:37:45', '2023-01-03 01:37:45'),
(15, 'hjhj', 'asassa@gmail.com', NULL, '$2y$10$whSUuYqWKvGFBrTGL2hqiuTq7SVM6TeRpbUoCoXI0uJbw7mrEsXLa', 'ghghgghj', 'Driver', NULL, NULL, NULL, '2023-01-03 01:38:49', '2023-01-03 01:38:49'),
(16, 'hjjhjkghjg', 'ghjgjhghj@gmail.com', NULL, '$2y$10$H1hF1F1hPoYsSR4BxlOEYuG6CmT/stKNdPMyz8lE3w2X41neS6.Sm', '213124234', 'Driver', NULL, NULL, NULL, '2023-01-03 01:39:48', '2023-01-03 01:39:48'),
(17, 'Ajim Kutilang', 'ajimkutilang@gmail.com', NULL, '$2y$10$tUk5yckZ4nAzpmOcH1mV/.CvsIJEXXcRhSwMqnl6SF9L3pOOXU2Hq', '085652122111', 'Driver', NULL, NULL, NULL, '2023-01-05 19:25:09', '2023-01-05 19:25:09'),
(29, 'Oren Rianto', 'Oren@gmail.com', NULL, '$2y$10$mGwwV75rSoRfeq7LdqC0IesnT9/bMGFjWpgeLHUyKs3rKZ2Q3md9G', '0998821', 'Driver', NULL, NULL, NULL, '2023-01-05 19:34:53', '2023-01-05 19:34:53'),
(30, 'Klemira Rizkiana', 'Klemi@gmail.com', NULL, '$2y$10$N2HjWt97W7Dvf4djQJBa3uGWnuCN8x/8bY/ryRp.mVITDxnb/TOFW', '08182821', 'Pengguna', NULL, NULL, NULL, '2023-01-05 19:51:50', '2023-01-05 19:51:50'),
(31, 'Emansipasi', 'Emansipasi@gmail.com', NULL, '$2y$10$7flwSHY1NJFVoM42TmBF4Ou4tHfTIiutAy00IoNh7tumFMCOrmJi.', 'sxzxz', 'Driver', NULL, NULL, NULL, '2023-01-05 19:53:38', '2023-01-05 19:53:38');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `alasan_pembatalans`
--
ALTER TABLE `alasan_pembatalans`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `daerahs`
--
ALTER TABLE `daerahs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `driverprofils`
--
ALTER TABLE `driverprofils`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `jenis_motors`
--
ALTER TABLE `jenis_motors`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `kendaraans`
--
ALTER TABLE `kendaraans`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `metodes`
--
ALTER TABLE `metodes`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `notifications`
--
ALTER TABLE `notifications`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `penumpang_profils`
--
ALTER TABLE `penumpang_profils`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indexes for table `pickups`
--
ALTER TABLE `pickups`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pickup_tarifs`
--
ALTER TABLE `pickup_tarifs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pickup_trips`
--
ALTER TABLE `pickup_trips`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pickup_trip_penumpangs`
--
ALTER TABLE `pickup_trip_penumpangs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `postingans`
--
ALTER TABLE `postingans`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `requests`
--
ALTER TABLE `requests`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `reviews`
--
ALTER TABLE `reviews`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `rutes`
--
ALTER TABLE `rutes`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tarif`
--
ALTER TABLE `tarif`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `topup_saldos`
--
ALTER TABLE `topup_saldos`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `total_saldos`
--
ALTER TABLE `total_saldos`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `trips`
--
ALTER TABLE `trips`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `trip_penumpangs`
--
ALTER TABLE `trip_penumpangs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `alasan_pembatalans`
--
ALTER TABLE `alasan_pembatalans`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `daerahs`
--
ALTER TABLE `daerahs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `driverprofils`
--
ALTER TABLE `driverprofils`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `jenis_motors`
--
ALTER TABLE `jenis_motors`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `kendaraans`
--
ALTER TABLE `kendaraans`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `metodes`
--
ALTER TABLE `metodes`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT for table `notifications`
--
ALTER TABLE `notifications`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `penumpang_profils`
--
ALTER TABLE `penumpang_profils`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `pickups`
--
ALTER TABLE `pickups`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `pickup_tarifs`
--
ALTER TABLE `pickup_tarifs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `pickup_trips`
--
ALTER TABLE `pickup_trips`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `pickup_trip_penumpangs`
--
ALTER TABLE `pickup_trip_penumpangs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `postingans`
--
ALTER TABLE `postingans`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `requests`
--
ALTER TABLE `requests`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `reviews`
--
ALTER TABLE `reviews`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `rutes`
--
ALTER TABLE `rutes`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `tarif`
--
ALTER TABLE `tarif`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `topup_saldos`
--
ALTER TABLE `topup_saldos`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `total_saldos`
--
ALTER TABLE `total_saldos`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT for table `trips`
--
ALTER TABLE `trips`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `trip_penumpangs`
--
ALTER TABLE `trip_penumpangs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
