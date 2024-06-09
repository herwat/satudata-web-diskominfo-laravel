-- --------------------------------------------------------
-- Host:                         127.0.0.1
-- Server version:               5.7.33 - MySQL Community Server (GPL)
-- Server OS:                    Win64
-- HeidiSQL Version:             11.2.0.6213
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

-- Dumping structure for table satudata-web-diskominfo-laravel.bantuans
CREATE TABLE IF NOT EXISTS `bantuans` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `penanggung_jawab` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nama` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `deskripsi` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table satudata-web-diskominfo-laravel.bantuans: ~1 rows (approximately)
/*!40000 ALTER TABLE `bantuans` DISABLE KEYS */;
INSERT INTO `bantuans` (`id`, `penanggung_jawab`, `nama`, `deskripsi`, `created_at`, `updated_at`) VALUES
	(2, 'Lukman', 'Cara upload data set', '<p>Klik “ Pilih File ” lalu pilih dan unggah file. </p><ol><li>Tunggu hingga file terupload 100%. </li><li>Anda akan melihat nama file setelah Colab mengunggahnya. Terakhir, ketikkan kode berikut untuk mengimpornya ke dalam kerangka data (pastikan nama file sesuai dengan nama file yang diunggah).<br></li></ol>', '2024-05-26 05:27:44', '2024-05-26 05:27:44');
INSERT INTO `bantuans` (`id`, `penanggung_jawab`, `nama`, `deskripsi`, `created_at`, `updated_at`) VALUES
	(3, 'Lukman', 'Mau apa kamu ?', '<p style="color: rgb(128, 128, 128); font-family: Poppins, Arial, sans-serif; font-size: 14px;">Klik “ Pilih File ” lalu pilih dan unggah file.</p><ol style="color: rgb(128, 128, 128); font-family: Poppins, Arial, sans-serif; font-size: 14px;"><li>Tunggu hingga file terupload 100%.</li><li>Anda akan melihat nama file setelah Colab mengunggahnya. Terakhir, ketikkan kode berikut untuk mengimpornya ke dalam kerangka data (pastikan nama file sesuai dengan nama file yang diunggah).</li><li>sadlasdkjashkdjhasd</li><li>asd</li><li>as</li><li>das</li><li>d</li><li>asd</li></ol>', '2024-05-26 05:57:38', '2024-05-26 05:57:38');
/*!40000 ALTER TABLE `bantuans` ENABLE KEYS */;

-- Dumping structure for table satudata-web-diskominfo-laravel.cache
CREATE TABLE IF NOT EXISTS `cache` (
  `key` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `value` mediumtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `expiration` int(11) NOT NULL,
  PRIMARY KEY (`key`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table satudata-web-diskominfo-laravel.cache: ~0 rows (approximately)
/*!40000 ALTER TABLE `cache` DISABLE KEYS */;
/*!40000 ALTER TABLE `cache` ENABLE KEYS */;

-- Dumping structure for table satudata-web-diskominfo-laravel.cache_locks
CREATE TABLE IF NOT EXISTS `cache_locks` (
  `key` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `owner` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `expiration` int(11) NOT NULL,
  PRIMARY KEY (`key`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table satudata-web-diskominfo-laravel.cache_locks: ~0 rows (approximately)
/*!40000 ALTER TABLE `cache_locks` DISABLE KEYS */;
/*!40000 ALTER TABLE `cache_locks` ENABLE KEYS */;

-- Dumping structure for table satudata-web-diskominfo-laravel.ekonomis
CREATE TABLE IF NOT EXISTS `ekonomis` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `nama` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `penanggung_jawab` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `deskripsi` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `bulan` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `file_excel` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table satudata-web-diskominfo-laravel.ekonomis: ~4 rows (approximately)
/*!40000 ALTER TABLE `ekonomis` DISABLE KEYS */;
INSERT INTO `ekonomis` (`id`, `nama`, `slug`, `penanggung_jawab`, `deskripsi`, `bulan`, `file_excel`, `status`, `created_at`, `updated_at`) VALUES
	(1, 'asdasdasdasdsa asd sa asds', 'asdasdasdasdsa-asd-sa-asd', 'asdasd', 'as dasdsa', 'Februari', 'file_excel/tH4CjJSH3qOXq8aQo4pxyy3LYTg0Y6dLPRd94R4R.xlsx', 'Diterima', '2024-05-25 03:46:48', '2024-05-25 07:11:12');
INSERT INTO `ekonomis` (`id`, `nama`, `slug`, `penanggung_jawab`, `deskripsi`, `bulan`, `file_excel`, `status`, `created_at`, `updated_at`) VALUES
	(2, 'asd', 'asd', 'asd', 'asd', 'Maret', 'file_excel/6zQh1lzNf3QSNOpRGBnIriE4yyf3JxGHiw1MXz7R.xlsx', 'Diterima', '2024-05-25 06:57:02', '2024-05-25 06:57:02');
INSERT INTO `ekonomis` (`id`, `nama`, `slug`, `penanggung_jawab`, `deskripsi`, `bulan`, `file_excel`, `status`, `created_at`, `updated_at`) VALUES
	(3, 'aaaaaa', 'aaaaa', 'a', 'a', 'April', 'file_excel/zGj59VOk5qNZQb0OseRJx0VcAwtbPXrgVpalvboG.xlsx', 'Diterima', '2024-05-25 06:58:31', '2024-05-25 06:58:31');
INSERT INTO `ekonomis` (`id`, `nama`, `slug`, `penanggung_jawab`, `deskripsi`, `bulan`, `file_excel`, `status`, `created_at`, `updated_at`) VALUES
	(4, 'cccccc', 'cccccc', 'c', 'c', 'Februari', 'file_excel/gSi6ILzuxFdSbeOPQB7HR1GCLfepIN3kpSMsjAQR.xlsx', 'Diterima', '2024-05-25 08:24:53', '2024-05-25 08:24:53');
/*!40000 ALTER TABLE `ekonomis` ENABLE KEYS */;

-- Dumping structure for table satudata-web-diskominfo-laravel.failed_jobs
CREATE TABLE IF NOT EXISTS `failed_jobs` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `uuid` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table satudata-web-diskominfo-laravel.failed_jobs: ~0 rows (approximately)
/*!40000 ALTER TABLE `failed_jobs` DISABLE KEYS */;
/*!40000 ALTER TABLE `failed_jobs` ENABLE KEYS */;

-- Dumping structure for table satudata-web-diskominfo-laravel.footers
CREATE TABLE IF NOT EXISTS `footers` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `gambar` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table satudata-web-diskominfo-laravel.footers: ~3 rows (approximately)
/*!40000 ALTER TABLE `footers` DISABLE KEYS */;
INSERT INTO `footers` (`id`, `gambar`, `created_at`, `updated_at`) VALUES
	(2, 'gambar/CrRKNqSQPSwS90cborw1lcAZKVkAo2Q5k6lUhZVD.png', '2024-05-25 07:09:02', '2024-05-25 07:09:02');
INSERT INTO `footers` (`id`, `gambar`, `created_at`, `updated_at`) VALUES
	(4, 'gambar/PlWNzx7kTps9RpHYeMAdm4d9D1yOpiPMCRFXjeZc.png', '2024-05-25 07:09:17', '2024-05-25 07:09:17');
INSERT INTO `footers` (`id`, `gambar`, `created_at`, `updated_at`) VALUES
	(6, 'gambar/hPPHojaNPu8raPkyupAbar9GsGtKFfvDWpHdvptt.png', '2024-05-26 05:55:46', '2024-05-26 05:55:46');
/*!40000 ALTER TABLE `footers` ENABLE KEYS */;

-- Dumping structure for table satudata-web-diskominfo-laravel.infografis
CREATE TABLE IF NOT EXISTS `infografis` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `nama` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `penanggung_jawab` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `deskripsi` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `gambar` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table satudata-web-diskominfo-laravel.infografis: ~2 rows (approximately)
/*!40000 ALTER TABLE `infografis` DISABLE KEYS */;
INSERT INTO `infografis` (`id`, `nama`, `penanggung_jawab`, `deskripsi`, `gambar`, `created_at`, `updated_at`) VALUES
	(1, 'Pemerintahan', 'LUKAN', 'Klik “ Pilih File ” lalu pilih dan unggah file.\r\n\r\nTunggu hingga file terupload 100%.\r\nAnda akan melihat nama file setelah Colab mengunggahnya. Terakhir, ketikkan kode berikut untuk mengimpornya ke dalam kerangka data (pastikan nama file sesuai dengan nama file yang diunggah).', 'gambar/cABwaUVNRcEaustzqOWj4zmsziksozWCERLocVXx.png', '2024-05-26 05:28:37', '2024-05-26 05:28:37');
INSERT INTO `infografis` (`id`, `nama`, `penanggung_jawab`, `deskripsi`, `gambar`, `created_at`, `updated_at`) VALUES
	(2, 'dasdas', 'asdas', 'https://bit.ly/contohlink123333', 'gambar/cq6NvEEvJHU5M27OLcaR8ulvMvhPUewNKYpF2Zuy.jpg', '2024-05-26 05:58:16', '2024-05-26 06:11:40');
/*!40000 ALTER TABLE `infografis` ENABLE KEYS */;

-- Dumping structure for table satudata-web-diskominfo-laravel.jabatans
CREATE TABLE IF NOT EXISTS `jabatans` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `nama` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table satudata-web-diskominfo-laravel.jabatans: ~2 rows (approximately)
/*!40000 ALTER TABLE `jabatans` DISABLE KEYS */;
INSERT INTO `jabatans` (`id`, `nama`, `created_at`, `updated_at`) VALUES
	(1, 'Admin', NULL, NULL);
INSERT INTO `jabatans` (`id`, `nama`, `created_at`, `updated_at`) VALUES
	(2, 'Kepala Bagian', NULL, NULL);
INSERT INTO `jabatans` (`id`, `nama`, `created_at`, `updated_at`) VALUES
	(3, 'Tata Usaha', '2024-05-26 05:56:35', '2024-05-26 05:56:35');
/*!40000 ALTER TABLE `jabatans` ENABLE KEYS */;

-- Dumping structure for table satudata-web-diskominfo-laravel.jobs
CREATE TABLE IF NOT EXISTS `jobs` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `queue` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `attempts` tinyint(3) unsigned NOT NULL,
  `reserved_at` int(10) unsigned DEFAULT NULL,
  `available_at` int(10) unsigned NOT NULL,
  `created_at` int(10) unsigned NOT NULL,
  PRIMARY KEY (`id`),
  KEY `jobs_queue_index` (`queue`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table satudata-web-diskominfo-laravel.jobs: ~0 rows (approximately)
/*!40000 ALTER TABLE `jobs` DISABLE KEYS */;
/*!40000 ALTER TABLE `jobs` ENABLE KEYS */;

-- Dumping structure for table satudata-web-diskominfo-laravel.job_batches
CREATE TABLE IF NOT EXISTS `job_batches` (
  `id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `total_jobs` int(11) NOT NULL,
  `pending_jobs` int(11) NOT NULL,
  `failed_jobs` int(11) NOT NULL,
  `failed_job_ids` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `options` mediumtext COLLATE utf8mb4_unicode_ci,
  `cancelled_at` int(11) DEFAULT NULL,
  `created_at` int(11) NOT NULL,
  `finished_at` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table satudata-web-diskominfo-laravel.job_batches: ~0 rows (approximately)
/*!40000 ALTER TABLE `job_batches` DISABLE KEYS */;
/*!40000 ALTER TABLE `job_batches` ENABLE KEYS */;

-- Dumping structure for table satudata-web-diskominfo-laravel.kemiskinans
CREATE TABLE IF NOT EXISTS `kemiskinans` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `nama` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `penanggung_jawab` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `deskripsi` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `bulan` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `file_excel` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table satudata-web-diskominfo-laravel.kemiskinans: ~0 rows (approximately)
/*!40000 ALTER TABLE `kemiskinans` DISABLE KEYS */;
INSERT INTO `kemiskinans` (`id`, `nama`, `slug`, `penanggung_jawab`, `deskripsi`, `bulan`, `file_excel`, `status`, `created_at`, `updated_at`) VALUES
	(1, 'asdasdas  sad asd', 'asdasdas--sad-asd', 'asd asd', 'a sdasdas', 'Maret', 'file_excel/k5i3MyUgaM2CgfxxgA6RajMkh8WXFgFOYEOYiXnL.xlsx', 'Diterima', '2024-05-25 03:47:33', '2024-05-25 03:47:33');
/*!40000 ALTER TABLE `kemiskinans` ENABLE KEYS */;

-- Dumping structure for table satudata-web-diskominfo-laravel.kependudukans
CREATE TABLE IF NOT EXISTS `kependudukans` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `nama` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `penanggung_jawab` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `deskripsi` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `bulan` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `file_excel` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table satudata-web-diskominfo-laravel.kependudukans: ~0 rows (approximately)
/*!40000 ALTER TABLE `kependudukans` DISABLE KEYS */;
INSERT INTO `kependudukans` (`id`, `nama`, `slug`, `penanggung_jawab`, `deskripsi`, `bulan`, `file_excel`, `status`, `created_at`, `updated_at`) VALUES
	(1, 'asdasdasdasd  dsadass da', 'asdasdasdasd--dsadass-da', 'a dasdasd', 'asdasdsadas', 'Mei', 'file_excel/Dqt9TdnPQLU8dRTPzrxIzASYlyevnskTRDECmBNC.xlsx', 'Diterima', '2024-05-26 06:18:23', '2024-05-26 06:19:09');
/*!40000 ALTER TABLE `kependudukans` ENABLE KEYS */;

-- Dumping structure for table satudata-web-diskominfo-laravel.kontaks
CREATE TABLE IF NOT EXISTS `kontaks` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table satudata-web-diskominfo-laravel.kontaks: ~0 rows (approximately)
/*!40000 ALTER TABLE `kontaks` DISABLE KEYS */;
/*!40000 ALTER TABLE `kontaks` ENABLE KEYS */;

-- Dumping structure for table satudata-web-diskominfo-laravel.laravisits
CREATE TABLE IF NOT EXISTS `laravisits` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `visitable_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `visitable_id` bigint(20) unsigned NOT NULL,
  `data` json NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `laravisits_visitable_type_visitable_id_index` (`visitable_type`,`visitable_id`)
) ENGINE=InnoDB AUTO_INCREMENT=61 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table satudata-web-diskominfo-laravel.laravisits: ~56 rows (approximately)
/*!40000 ALTER TABLE `laravisits` DISABLE KEYS */;
INSERT INTO `laravisits` (`id`, `visitable_type`, `visitable_id`, `data`, `created_at`, `updated_at`) VALUES
	(1, 'App\\Models\\Ekonomi', 1, '[]', '2024-05-25 03:46:51', '2024-05-25 03:46:51');
INSERT INTO `laravisits` (`id`, `visitable_type`, `visitable_id`, `data`, `created_at`, `updated_at`) VALUES
	(2, 'App\\Models\\Kemiskinan', 1, '[]', '2024-05-25 03:48:13', '2024-05-25 03:48:13');
INSERT INTO `laravisits` (`id`, `visitable_type`, `visitable_id`, `data`, `created_at`, `updated_at`) VALUES
	(3, 'App\\Models\\Ekonomi', 1, '[]', '2024-05-25 03:48:22', '2024-05-25 03:48:22');
INSERT INTO `laravisits` (`id`, `visitable_type`, `visitable_id`, `data`, `created_at`, `updated_at`) VALUES
	(4, 'App\\Models\\Kemiskinan', 1, '[]', '2024-05-25 04:00:18', '2024-05-25 04:00:18');
INSERT INTO `laravisits` (`id`, `visitable_type`, `visitable_id`, `data`, `created_at`, `updated_at`) VALUES
	(5, 'App\\Models\\Ekonomi', 1, '[]', '2024-05-25 04:00:24', '2024-05-25 04:00:24');
INSERT INTO `laravisits` (`id`, `visitable_type`, `visitable_id`, `data`, `created_at`, `updated_at`) VALUES
	(6, 'App\\Models\\Kemiskinan', 1, '[]', '2024-05-25 06:29:17', '2024-05-25 06:29:17');
INSERT INTO `laravisits` (`id`, `visitable_type`, `visitable_id`, `data`, `created_at`, `updated_at`) VALUES
	(7, 'App\\Models\\Ekonomi', 1, '[]', '2024-05-25 06:57:06', '2024-05-25 06:57:06');
INSERT INTO `laravisits` (`id`, `visitable_type`, `visitable_id`, `data`, `created_at`, `updated_at`) VALUES
	(8, 'App\\Models\\Ekonomi', 1, '[]', '2024-05-25 06:58:33', '2024-05-25 06:58:33');
INSERT INTO `laravisits` (`id`, `visitable_type`, `visitable_id`, `data`, `created_at`, `updated_at`) VALUES
	(9, 'App\\Models\\Ekonomi', 1, '[]', '2024-05-25 06:58:36', '2024-05-25 06:58:36');
INSERT INTO `laravisits` (`id`, `visitable_type`, `visitable_id`, `data`, `created_at`, `updated_at`) VALUES
	(10, 'App\\Models\\Ekonomi', 1, '[]', '2024-05-25 07:00:06', '2024-05-25 07:00:06');
INSERT INTO `laravisits` (`id`, `visitable_type`, `visitable_id`, `data`, `created_at`, `updated_at`) VALUES
	(11, 'App\\Models\\Ekonomi', 1, '[]', '2024-05-25 07:00:53', '2024-05-25 07:00:53');
INSERT INTO `laravisits` (`id`, `visitable_type`, `visitable_id`, `data`, `created_at`, `updated_at`) VALUES
	(12, 'App\\Models\\Ekonomi', 1, '[]', '2024-05-25 07:01:14', '2024-05-25 07:01:14');
INSERT INTO `laravisits` (`id`, `visitable_type`, `visitable_id`, `data`, `created_at`, `updated_at`) VALUES
	(13, 'App\\Models\\Ekonomi', 1, '[]', '2024-05-25 07:01:20', '2024-05-25 07:01:20');
INSERT INTO `laravisits` (`id`, `visitable_type`, `visitable_id`, `data`, `created_at`, `updated_at`) VALUES
	(14, 'App\\Models\\Ekonomi', 1, '[]', '2024-05-25 07:02:18', '2024-05-25 07:02:18');
INSERT INTO `laravisits` (`id`, `visitable_type`, `visitable_id`, `data`, `created_at`, `updated_at`) VALUES
	(15, 'App\\Models\\Ekonomi', 1, '[]', '2024-05-25 07:02:42', '2024-05-25 07:02:42');
INSERT INTO `laravisits` (`id`, `visitable_type`, `visitable_id`, `data`, `created_at`, `updated_at`) VALUES
	(16, 'App\\Models\\Ekonomi', 1, '[]', '2024-05-25 07:03:26', '2024-05-25 07:03:26');
INSERT INTO `laravisits` (`id`, `visitable_type`, `visitable_id`, `data`, `created_at`, `updated_at`) VALUES
	(17, 'App\\Models\\Ekonomi', 1, '[]', '2024-05-25 07:03:41', '2024-05-25 07:03:41');
INSERT INTO `laravisits` (`id`, `visitable_type`, `visitable_id`, `data`, `created_at`, `updated_at`) VALUES
	(18, 'App\\Models\\Ekonomi', 1, '[]', '2024-05-25 07:03:53', '2024-05-25 07:03:53');
INSERT INTO `laravisits` (`id`, `visitable_type`, `visitable_id`, `data`, `created_at`, `updated_at`) VALUES
	(19, 'App\\Models\\Ekonomi', 1, '[]', '2024-05-25 07:04:44', '2024-05-25 07:04:44');
INSERT INTO `laravisits` (`id`, `visitable_type`, `visitable_id`, `data`, `created_at`, `updated_at`) VALUES
	(20, 'App\\Models\\Ekonomi', 1, '[]', '2024-05-25 08:19:43', '2024-05-25 08:19:43');
INSERT INTO `laravisits` (`id`, `visitable_type`, `visitable_id`, `data`, `created_at`, `updated_at`) VALUES
	(21, 'App\\Models\\Ekonomi', 1, '[]', '2024-05-25 08:20:11', '2024-05-25 08:20:11');
INSERT INTO `laravisits` (`id`, `visitable_type`, `visitable_id`, `data`, `created_at`, `updated_at`) VALUES
	(22, 'App\\Models\\Ekonomi', 1, '[]', '2024-05-25 08:21:46', '2024-05-25 08:21:46');
INSERT INTO `laravisits` (`id`, `visitable_type`, `visitable_id`, `data`, `created_at`, `updated_at`) VALUES
	(23, 'App\\Models\\Ekonomi', 1, '[]', '2024-05-25 08:23:13', '2024-05-25 08:23:13');
INSERT INTO `laravisits` (`id`, `visitable_type`, `visitable_id`, `data`, `created_at`, `updated_at`) VALUES
	(24, 'App\\Models\\Ekonomi', 1, '[]', '2024-05-25 08:23:52', '2024-05-25 08:23:52');
INSERT INTO `laravisits` (`id`, `visitable_type`, `visitable_id`, `data`, `created_at`, `updated_at`) VALUES
	(25, 'App\\Models\\Ekonomi', 1, '[]', '2024-05-25 08:24:58', '2024-05-25 08:24:58');
INSERT INTO `laravisits` (`id`, `visitable_type`, `visitable_id`, `data`, `created_at`, `updated_at`) VALUES
	(26, 'App\\Models\\Ekonomi', 1, '[]', '2024-05-25 08:26:27', '2024-05-25 08:26:27');
INSERT INTO `laravisits` (`id`, `visitable_type`, `visitable_id`, `data`, `created_at`, `updated_at`) VALUES
	(27, 'App\\Models\\Ekonomi', 1, '[]', '2024-05-25 09:23:15', '2024-05-25 09:23:15');
INSERT INTO `laravisits` (`id`, `visitable_type`, `visitable_id`, `data`, `created_at`, `updated_at`) VALUES
	(28, 'App\\Models\\Ekonomi', 1, '[]', '2024-05-25 09:24:37', '2024-05-25 09:24:37');
INSERT INTO `laravisits` (`id`, `visitable_type`, `visitable_id`, `data`, `created_at`, `updated_at`) VALUES
	(29, 'App\\Models\\Ekonomi', 1, '[]', '2024-05-26 04:39:06', '2024-05-26 04:39:06');
INSERT INTO `laravisits` (`id`, `visitable_type`, `visitable_id`, `data`, `created_at`, `updated_at`) VALUES
	(30, 'App\\Models\\Ekonomi', 1, '[]', '2024-05-26 05:00:25', '2024-05-26 05:00:25');
INSERT INTO `laravisits` (`id`, `visitable_type`, `visitable_id`, `data`, `created_at`, `updated_at`) VALUES
	(31, 'App\\Models\\Ekonomi', 1, '[]', '2024-05-26 05:01:39', '2024-05-26 05:01:39');
INSERT INTO `laravisits` (`id`, `visitable_type`, `visitable_id`, `data`, `created_at`, `updated_at`) VALUES
	(32, 'App\\Models\\Ekonomi', 1, '[]', '2024-05-26 05:01:42', '2024-05-26 05:01:42');
INSERT INTO `laravisits` (`id`, `visitable_type`, `visitable_id`, `data`, `created_at`, `updated_at`) VALUES
	(33, 'App\\Models\\Ekonomi', 1, '[]', '2024-05-26 05:01:43', '2024-05-26 05:01:43');
INSERT INTO `laravisits` (`id`, `visitable_type`, `visitable_id`, `data`, `created_at`, `updated_at`) VALUES
	(34, 'App\\Models\\Ekonomi', 1, '[]', '2024-05-26 05:01:44', '2024-05-26 05:01:44');
INSERT INTO `laravisits` (`id`, `visitable_type`, `visitable_id`, `data`, `created_at`, `updated_at`) VALUES
	(35, 'App\\Models\\Ekonomi', 1, '[]', '2024-05-26 05:03:00', '2024-05-26 05:03:00');
INSERT INTO `laravisits` (`id`, `visitable_type`, `visitable_id`, `data`, `created_at`, `updated_at`) VALUES
	(36, 'App\\Models\\Ekonomi', 1, '[]', '2024-05-26 05:03:21', '2024-05-26 05:03:21');
INSERT INTO `laravisits` (`id`, `visitable_type`, `visitable_id`, `data`, `created_at`, `updated_at`) VALUES
	(37, 'App\\Models\\Ekonomi', 1, '[]', '2024-05-26 05:03:29', '2024-05-26 05:03:29');
INSERT INTO `laravisits` (`id`, `visitable_type`, `visitable_id`, `data`, `created_at`, `updated_at`) VALUES
	(38, 'App\\Models\\Ekonomi', 1, '[]', '2024-05-26 05:03:33', '2024-05-26 05:03:33');
INSERT INTO `laravisits` (`id`, `visitable_type`, `visitable_id`, `data`, `created_at`, `updated_at`) VALUES
	(39, 'App\\Models\\Ekonomi', 1, '[]', '2024-05-26 05:03:41', '2024-05-26 05:03:41');
INSERT INTO `laravisits` (`id`, `visitable_type`, `visitable_id`, `data`, `created_at`, `updated_at`) VALUES
	(40, 'App\\Models\\Kemiskinan', 1, '[]', '2024-05-26 05:04:34', '2024-05-26 05:04:34');
INSERT INTO `laravisits` (`id`, `visitable_type`, `visitable_id`, `data`, `created_at`, `updated_at`) VALUES
	(41, 'App\\Models\\Ekonomi', 1, '[]', '2024-05-26 05:04:50', '2024-05-26 05:04:50');
INSERT INTO `laravisits` (`id`, `visitable_type`, `visitable_id`, `data`, `created_at`, `updated_at`) VALUES
	(42, 'App\\Models\\Ekonomi', 1, '[]', '2024-05-26 05:05:24', '2024-05-26 05:05:24');
INSERT INTO `laravisits` (`id`, `visitable_type`, `visitable_id`, `data`, `created_at`, `updated_at`) VALUES
	(43, 'App\\Models\\Kemiskinan', 1, '[]', '2024-05-26 05:05:42', '2024-05-26 05:05:42');
INSERT INTO `laravisits` (`id`, `visitable_type`, `visitable_id`, `data`, `created_at`, `updated_at`) VALUES
	(44, 'App\\Models\\Kemiskinan', 1, '[]', '2024-05-26 05:06:50', '2024-05-26 05:06:50');
INSERT INTO `laravisits` (`id`, `visitable_type`, `visitable_id`, `data`, `created_at`, `updated_at`) VALUES
	(45, 'App\\Models\\Ekonomi', 1, '[]', '2024-05-26 05:06:56', '2024-05-26 05:06:56');
INSERT INTO `laravisits` (`id`, `visitable_type`, `visitable_id`, `data`, `created_at`, `updated_at`) VALUES
	(46, 'App\\Models\\Ekonomi', 1, '[]', '2024-05-26 05:22:23', '2024-05-26 05:22:23');
INSERT INTO `laravisits` (`id`, `visitable_type`, `visitable_id`, `data`, `created_at`, `updated_at`) VALUES
	(47, 'App\\Models\\Kemiskinan', 1, '[]', '2024-05-26 05:23:40', '2024-05-26 05:23:40');
INSERT INTO `laravisits` (`id`, `visitable_type`, `visitable_id`, `data`, `created_at`, `updated_at`) VALUES
	(48, 'App\\Models\\Pendidikan', 1, '[]', '2024-05-26 05:33:16', '2024-05-26 05:33:16');
INSERT INTO `laravisits` (`id`, `visitable_type`, `visitable_id`, `data`, `created_at`, `updated_at`) VALUES
	(49, 'App\\Models\\Pendidikan', 1, '[]', '2024-05-26 05:35:59', '2024-05-26 05:35:59');
INSERT INTO `laravisits` (`id`, `visitable_type`, `visitable_id`, `data`, `created_at`, `updated_at`) VALUES
	(50, 'App\\Models\\Ekonomi', 1, '[]', '2024-05-26 05:52:14', '2024-05-26 05:52:14');
INSERT INTO `laravisits` (`id`, `visitable_type`, `visitable_id`, `data`, `created_at`, `updated_at`) VALUES
	(51, 'App\\Models\\Kemiskinan', 1, '[]', '2024-05-26 05:52:27', '2024-05-26 05:52:27');
INSERT INTO `laravisits` (`id`, `visitable_type`, `visitable_id`, `data`, `created_at`, `updated_at`) VALUES
	(52, 'App\\Models\\Pendidikan', 1, '[]', '2024-05-26 06:01:06', '2024-05-26 06:01:06');
INSERT INTO `laravisits` (`id`, `visitable_type`, `visitable_id`, `data`, `created_at`, `updated_at`) VALUES
	(53, 'App\\Models\\Kependudukan', 1, '[]', '2024-05-26 06:19:57', '2024-05-26 06:19:57');
INSERT INTO `laravisits` (`id`, `visitable_type`, `visitable_id`, `data`, `created_at`, `updated_at`) VALUES
	(54, 'App\\Models\\Kependudukan', 1, '[]', '2024-05-26 06:21:39', '2024-05-26 06:21:39');
INSERT INTO `laravisits` (`id`, `visitable_type`, `visitable_id`, `data`, `created_at`, `updated_at`) VALUES
	(55, 'App\\Models\\Kependudukan', 1, '[]', '2024-05-26 06:22:24', '2024-05-26 06:22:24');
INSERT INTO `laravisits` (`id`, `visitable_type`, `visitable_id`, `data`, `created_at`, `updated_at`) VALUES
	(56, 'App\\Models\\Ekonomi', 1, '[]', '2024-05-26 06:26:33', '2024-05-26 06:26:33');
INSERT INTO `laravisits` (`id`, `visitable_type`, `visitable_id`, `data`, `created_at`, `updated_at`) VALUES
	(57, 'App\\Models\\Ekonomi', 1, '[]', '2024-05-26 06:26:58', '2024-05-26 06:26:58');
INSERT INTO `laravisits` (`id`, `visitable_type`, `visitable_id`, `data`, `created_at`, `updated_at`) VALUES
	(58, 'App\\Models\\Ekonomi', 1, '[]', '2024-05-26 06:27:35', '2024-05-26 06:27:35');
INSERT INTO `laravisits` (`id`, `visitable_type`, `visitable_id`, `data`, `created_at`, `updated_at`) VALUES
	(59, 'App\\Models\\Ekonomi', 1, '[]', '2024-05-26 06:35:06', '2024-05-26 06:35:06');
INSERT INTO `laravisits` (`id`, `visitable_type`, `visitable_id`, `data`, `created_at`, `updated_at`) VALUES
	(60, 'App\\Models\\Pendidikan', 1, '[]', '2024-05-26 06:36:10', '2024-05-26 06:36:10');
/*!40000 ALTER TABLE `laravisits` ENABLE KEYS */;

-- Dumping structure for table satudata-web-diskominfo-laravel.linkungan_hidups
CREATE TABLE IF NOT EXISTS `linkungan_hidups` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `nama` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `penanggung_jawab` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `deskripsi` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `bulan` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `file_excel` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table satudata-web-diskominfo-laravel.linkungan_hidups: ~0 rows (approximately)
/*!40000 ALTER TABLE `linkungan_hidups` DISABLE KEYS */;
/*!40000 ALTER TABLE `linkungan_hidups` ENABLE KEYS */;

-- Dumping structure for table satudata-web-diskominfo-laravel.migrations
CREATE TABLE IF NOT EXISTS `migrations` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=21 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table satudata-web-diskominfo-laravel.migrations: ~20 rows (approximately)
/*!40000 ALTER TABLE `migrations` DISABLE KEYS */;
INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
	(1, '0001_01_01_000000_create_users_table', 1);
INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
	(2, '0001_01_01_000001_create_cache_table', 1);
INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
	(3, '0001_01_01_000002_create_jobs_table', 1);
INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
	(4, '2024_05_14_102108_create_roles_table', 1);
INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
	(5, '2024_05_14_102117_create_jabatans_table', 1);
INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
	(6, '2024_05_14_103006_add_field_to_users_table', 1);
INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
	(7, '2024_05_14_104602_create_ekonomis_table', 1);
INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
	(8, '2024_05_14_104717_create_kemiskinans_table', 1);
INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
	(9, '2024_05_14_104801_create_kependudukans_table', 1);
INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
	(10, '2024_05_14_104848_create_infografis_table', 1);
INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
	(11, '2024_05_14_104959_create_bantuans_table', 1);
INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
	(12, '2024_05_14_105045_create_linkungan_hidups_table', 1);
INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
	(13, '2024_05_14_105133_create_pemerintahans_table', 1);
INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
	(14, '2024_05_14_105332_create_pendidikans_table', 1);
INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
	(15, '2024_05_14_105535_create_sosial﻿s_table', 1);
INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
	(16, '2024_05_19_053354_create_slides_table', 1);
INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
	(17, '2024_05_19_053412_create_kontaks_table', 1);
INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
	(18, '2024_05_22_025708_create_footers_table', 1);
INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
	(19, '2024_05_24_045939_create_laravisits_table', 1);
INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
	(20, '2024_05_25_021251_create_pengingats_table', 1);
/*!40000 ALTER TABLE `migrations` ENABLE KEYS */;

-- Dumping structure for table satudata-web-diskominfo-laravel.password_reset_tokens
CREATE TABLE IF NOT EXISTS `password_reset_tokens` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table satudata-web-diskominfo-laravel.password_reset_tokens: ~0 rows (approximately)
/*!40000 ALTER TABLE `password_reset_tokens` DISABLE KEYS */;
/*!40000 ALTER TABLE `password_reset_tokens` ENABLE KEYS */;

-- Dumping structure for table satudata-web-diskominfo-laravel.pemerintahans
CREATE TABLE IF NOT EXISTS `pemerintahans` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `nama` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `penanggung_jawab` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `deskripsi` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `bulan` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `file_excel` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table satudata-web-diskominfo-laravel.pemerintahans: ~0 rows (approximately)
/*!40000 ALTER TABLE `pemerintahans` DISABLE KEYS */;
/*!40000 ALTER TABLE `pemerintahans` ENABLE KEYS */;

-- Dumping structure for table satudata-web-diskominfo-laravel.pendidikans
CREATE TABLE IF NOT EXISTS `pendidikans` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `nama` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `penanggung_jawab` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `deskripsi` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `bulan` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `file_excel` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table satudata-web-diskominfo-laravel.pendidikans: ~2 rows (approximately)
/*!40000 ALTER TABLE `pendidikans` DISABLE KEYS */;
INSERT INTO `pendidikans` (`id`, `nama`, `slug`, `penanggung_jawab`, `deskripsi`, `bulan`, `file_excel`, `status`, `created_at`, `updated_at`) VALUES
	(1, 'Pendidikan di sulawesi selatan', 'pendidikan-di-sulawesi-selatan', 'Contoh Pegawai', 'PendidikanPendidikanPendidikanPendidikanPendidikanPendidikanPendidikanPendidikanPendidikanPendidikanPendidikanPendidikan', 'Mei', 'file_excel/aCJrlMHoqOCO9gbB54GNSzJbJJXf1nC8qMK0w20k.xlsx', 'Diterima', '2024-05-26 05:31:07', '2024-05-26 05:33:06');
INSERT INTO `pendidikans` (`id`, `nama`, `slug`, `penanggung_jawab`, `deskripsi`, `bulan`, `file_excel`, `status`, `created_at`, `updated_at`) VALUES
	(2, 'data contoh apa', 'data-contoh-apa', 'Contoh Pegawai', 'asdsadasdsadasdsadasdsadasdsadasdsadasdsad', 'Mei', 'file_excel/nSUHrKhKNMUNAaM6XBdZBl0gRqqMXfMgCWJztGGW.xlsx', 'Diterima', '2024-05-26 06:00:03', '2024-05-26 06:00:58');
/*!40000 ALTER TABLE `pendidikans` ENABLE KEYS */;

-- Dumping structure for table satudata-web-diskominfo-laravel.pengingats
CREATE TABLE IF NOT EXISTS `pengingats` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `waktu` datetime NOT NULL,
  `tenggat_waktu` datetime NOT NULL,
  `user_id` bigint(20) unsigned NOT NULL,
  `topik` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `frekuensi` year(4) NOT NULL,
  `status` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `pengingats_user_id_foreign` (`user_id`),
  CONSTRAINT `pengingats_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table satudata-web-diskominfo-laravel.pengingats: ~1 rows (approximately)
/*!40000 ALTER TABLE `pengingats` DISABLE KEYS */;
INSERT INTO `pengingats` (`id`, `waktu`, `tenggat_waktu`, `user_id`, `topik`, `frekuensi`, `status`, `created_at`, `updated_at`) VALUES
	(3, '2024-05-19 12:54:00', '2024-05-31 12:54:00', 5, 'Pendidikan', '2024', 'Remind', '2024-05-26 05:55:14', '2024-05-26 05:55:14');
/*!40000 ALTER TABLE `pengingats` ENABLE KEYS */;

-- Dumping structure for table satudata-web-diskominfo-laravel.roles
CREATE TABLE IF NOT EXISTS `roles` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `nama` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table satudata-web-diskominfo-laravel.roles: ~3 rows (approximately)
/*!40000 ALTER TABLE `roles` DISABLE KEYS */;
INSERT INTO `roles` (`id`, `nama`, `created_at`, `updated_at`) VALUES
	(1, 'Admin', NULL, NULL);
INSERT INTO `roles` (`id`, `nama`, `created_at`, `updated_at`) VALUES
	(2, 'Pegawai', NULL, NULL);
INSERT INTO `roles` (`id`, `nama`, `created_at`, `updated_at`) VALUES
	(3, 'User Biasa', NULL, NULL);
/*!40000 ALTER TABLE `roles` ENABLE KEYS */;

-- Dumping structure for table satudata-web-diskominfo-laravel.sessions
CREATE TABLE IF NOT EXISTS `sessions` (
  `id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` bigint(20) unsigned DEFAULT NULL,
  `ip_address` varchar(45) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `user_agent` text COLLATE utf8mb4_unicode_ci,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `last_activity` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `sessions_user_id_index` (`user_id`),
  KEY `sessions_last_activity_index` (`last_activity`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table satudata-web-diskominfo-laravel.sessions: ~2 rows (approximately)
/*!40000 ALTER TABLE `sessions` DISABLE KEYS */;
INSERT INTO `sessions` (`id`, `user_id`, `ip_address`, `user_agent`, `payload`, `last_activity`) VALUES
	('fkohYiVE0mPJ2ByshvhOWHa8fIfKUqMo5i21uciO', NULL, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/125.0.0.0 Safari/537.36', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiRTNHT2FieDJFYU5ZSnVQbjNiSW9JSm43cHo0VTd2aFp3eXNOUjBBeSI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6NzY6Imh0dHA6Ly9zYXR1ZGF0YS13ZWItZGlza29taW5mby1sYXJhdmVsLnRlc3QvZGF0YXNldC9hc2Rhc2Rhc2Rhc2QtLWRzYWRhc3MtZGEiO31zOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX19', 1716704499);
INSERT INTO `sessions` (`id`, `user_id`, `ip_address`, `user_agent`, `payload`, `last_activity`) VALUES
	('Lzl0iLl4vzgmBHaZoGeWaDVHZZNvjDW674BPPbdj', 1, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/125.0.0.0 Safari/537.36', 'YTo0OntzOjY6Il90b2tlbiI7czo0MDoiVDc4Mm9vUGF1eUI3ZVZpdGNrRWRhUjAxRHNUcE1HRVdmempiSVhpYiI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6ODI6Imh0dHA6Ly9zYXR1ZGF0YS13ZWItZGlza29taW5mby1sYXJhdmVsLnRlc3QvZGF0YXNldC9wZW5kaWRpa2FuLWRpLXN1bGF3ZXNpLXNlbGF0YW4iO31zOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX1zOjUwOiJsb2dpbl93ZWJfNTliYTM2YWRkYzJiMmY5NDAxNTgwZjAxNGM3ZjU4ZWE0ZTMwOTg5ZCI7aToxO30=', 1716705370);
/*!40000 ALTER TABLE `sessions` ENABLE KEYS */;

-- Dumping structure for table satudata-web-diskominfo-laravel.slides
CREATE TABLE IF NOT EXISTS `slides` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `gambar` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table satudata-web-diskominfo-laravel.slides: ~0 rows (approximately)
/*!40000 ALTER TABLE `slides` DISABLE KEYS */;
INSERT INTO `slides` (`id`, `gambar`, `created_at`, `updated_at`) VALUES
	(1, 'wallpaper.jpg', NULL, NULL);
/*!40000 ALTER TABLE `slides` ENABLE KEYS */;

-- Dumping structure for table satudata-web-diskominfo-laravel.sosials
CREATE TABLE IF NOT EXISTS `sosials` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `nama` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `penanggung_jawab` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `deskripsi` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `bulan` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `file_excel` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table satudata-web-diskominfo-laravel.sosials: ~0 rows (approximately)
/*!40000 ALTER TABLE `sosials` DISABLE KEYS */;
/*!40000 ALTER TABLE `sosials` ENABLE KEYS */;

-- Dumping structure for table satudata-web-diskominfo-laravel.users
CREATE TABLE IF NOT EXISTS `users` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `role_id` bigint(20) unsigned NOT NULL,
  `jabatan_id` bigint(20) unsigned NOT NULL,
  `nip` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `jk` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tempat_lahir` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tanggal_lahir` date NOT NULL,
  `alamat` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `tanggal_bergabung` date NOT NULL,
  `no_hp` varchar(15) COLLATE utf8mb4_unicode_ci NOT NULL,
  `gambar` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_email_unique` (`email`),
  KEY `users_role_id_foreign` (`role_id`),
  KEY `users_jabatan_id_foreign` (`jabatan_id`),
  CONSTRAINT `users_jabatan_id_foreign` FOREIGN KEY (`jabatan_id`) REFERENCES `jabatans` (`id`) ON DELETE CASCADE,
  CONSTRAINT `users_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table satudata-web-diskominfo-laravel.users: ~2 rows (approximately)
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` (`id`, `role_id`, `jabatan_id`, `nip`, `name`, `email`, `email_verified_at`, `password`, `remember_token`, `jk`, `tempat_lahir`, `tanggal_lahir`, `alamat`, `tanggal_bergabung`, `no_hp`, `gambar`, `status`, `created_at`, `updated_at`) VALUES
	(1, 1, 1, '123456789', 'Admin', 'admin@gmail.com', NULL, '$2y$12$McV8k3abEbajeBd1r8EZ1uHig1X/h7F7I/.nkkxmZmkYBfx2cibOq', NULL, 'L', 'City A', '1980-01-01', 'Address A', '2020-01-01', '081234567890', 'gambar/1716621055.jpg', 'aktif', '2024-05-25 03:44:50', '2024-05-25 07:10:55');
INSERT INTO `users` (`id`, `role_id`, `jabatan_id`, `nip`, `name`, `email`, `email_verified_at`, `password`, `remember_token`, `jk`, `tempat_lahir`, `tanggal_lahir`, `alamat`, `tanggal_bergabung`, `no_hp`, `gambar`, `status`, `created_at`, `updated_at`) VALUES
	(4, 2, 1, '123', 'ade', 'ade@gmail.com', NULL, '$2y$12$McV8k3abEbajeBd1r8EZ1uHig1X/h7F7I/.nkkxmZmkYBfx2cibOq', NULL, 'L', 'City A', '1980-01-01', 'Address A', '2020-01-01', '081234567890', 'logo_sulsel.png', 'aktif', '2024-05-25 03:44:50', '2024-05-25 03:44:50');
INSERT INTO `users` (`id`, `role_id`, `jabatan_id`, `nip`, `name`, `email`, `email_verified_at`, `password`, `remember_token`, `jk`, `tempat_lahir`, `tanggal_lahir`, `alamat`, `tanggal_bergabung`, `no_hp`, `gambar`, `status`, `created_at`, `updated_at`) VALUES
	(5, 2, 2, '123456789', 'Contoh pegawai', 'dea@gmail.com', NULL, '$2y$12$EsQ95Dlm0uVQKoglDUQzF.zwfenT7DK.xIy3XDhvYVh8qQZoYYyKG', NULL, 'Laki-laki', 'Ds. Pintas Tuo', '1999-12-12', 'Jl.Jambi Simpang III Sipin Kota Baru Kota Jambi', '2024-05-07', '082180181958', 'gambar/u99FOwxfhWPx2tq1skX4txZCZNypmTIbhzoFoe9M.jpg', 'Aktif', '2024-05-26 05:26:17', '2024-05-26 05:26:17');
/*!40000 ALTER TABLE `users` ENABLE KEYS */;

/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IFNULL(@OLD_FOREIGN_KEY_CHECKS, 1) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40111 SET SQL_NOTES=IFNULL(@OLD_SQL_NOTES, 1) */;
