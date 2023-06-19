-- MySQL dump 10.13  Distrib 8.0.31, for Linux (x86_64)
--
-- Host: localhost    Database: dbapotek
-- ------------------------------------------------------
-- Server version	8.0.31-0ubuntu0.22.04.1

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!50503 SET NAMES utf8mb4 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Table structure for table `dokter`
--

DROP TABLE IF EXISTS `dokter`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `dokter` (
  `id` int NOT NULL AUTO_INCREMENT,
  `nama` varchar(45) NOT NULL,
  `no_hp` varchar(45) NOT NULL,
  `alamat` text NOT NULL,
  `foto` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `no_hp_UNIQUE` (`no_hp`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `dokter`
--

LOCK TABLES `dokter` WRITE;
/*!40000 ALTER TABLE `dokter` DISABLE KEYS */;
INSERT INTO `dokter` VALUES (10,'santoso jaya','08233221234','Semarang','foto-santoso jaya.png');
/*!40000 ALTER TABLE `dokter` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `failed_jobs`
--

DROP TABLE IF EXISTS `failed_jobs`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `failed_jobs` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `uuid` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `failed_jobs`
--

LOCK TABLES `failed_jobs` WRITE;
/*!40000 ALTER TABLE `failed_jobs` DISABLE KEYS */;
/*!40000 ALTER TABLE `failed_jobs` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `kategori_obat`
--

DROP TABLE IF EXISTS `kategori_obat`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `kategori_obat` (
  `id` int NOT NULL AUTO_INCREMENT,
  `nama_kategoriobat` varchar(45) NOT NULL,
  `keterangan` text,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `kategori_obat`
--

LOCK TABLES `kategori_obat` WRITE;
/*!40000 ALTER TABLE `kategori_obat` DISABLE KEYS */;
INSERT INTO `kategori_obat` VALUES (9,'Obat Bebas','Obat yang dijual bebas dan dapat dibeli tanpa resep'),(10,'Obat Keras','Obat yang hanya boleh dibeli menggunakan resep dokter'),(11,'Obat Herbal','Obat herbal'),(12,'Obat Psikotropika','Psikotropika adalah zat atau obat baik alamiah maupun sintetis, bukan narkotika.');
/*!40000 ALTER TABLE `kategori_obat` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `migrations`
--

DROP TABLE IF EXISTS `migrations`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `migrations` (
  `id` int unsigned NOT NULL AUTO_INCREMENT,
  `migration` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `migrations`
--

LOCK TABLES `migrations` WRITE;
/*!40000 ALTER TABLE `migrations` DISABLE KEYS */;
INSERT INTO `migrations` VALUES (1,'2014_10_12_000000_create_users_table',1),(2,'2014_10_12_100000_create_password_resets_table',1),(3,'2019_08_19_000000_create_failed_jobs_table',1),(4,'2019_12_14_000001_create_personal_access_tokens_table',1);
/*!40000 ALTER TABLE `migrations` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `obat`
--

DROP TABLE IF EXISTS `obat`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `obat` (
  `id` int NOT NULL AUTO_INCREMENT,
  `kode_obat` varchar(45) NOT NULL,
  `nama_obat` varchar(45) NOT NULL,
  `penyimpanan` varchar(45) NOT NULL,
  `stock` int NOT NULL,
  `unit` varchar(45) NOT NULL,
  `kadaluwarsa` date NOT NULL,
  `harga` float NOT NULL,
  `keterangan` text,
  `foto` text,
  `kategori_obat_id` int NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_obat_kategori_obat1` (`kategori_obat_id`),
  CONSTRAINT `fk_obat_kategori_obat1` FOREIGN KEY (`kategori_obat_id`) REFERENCES `kategori_obat` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `obat`
--

LOCK TABLES `obat` WRITE;
/*!40000 ALTER TABLE `obat` DISABLE KEYS */;
INSERT INTO `obat` VALUES (3,'A001','Ultraflu','Lemari 1',10,'Tablet','2022-12-22',15000,'Meredakan sakit flu','obat/img/bvlNRKQvKS1uXdzWMqh7dwQiBRAk4yGHa9AHEQpQ.jpg',9,NULL,'2022-12-18 00:24:03'),(4,'A002','Panadol','Rak 1',15,'tablet','2022-12-15',1000,'Meredakan sakit kepala','obat/img/YvvdEwzV2M7PcszHuA7MrP5x4WNJ7X0WY0dWsMWp.jpg',9,NULL,'2022-12-18 00:24:11'),(5,'A003','Mylanta','Rak 2',7,'Sirup','2022-12-20',20000,'Meredakan sakit lambung','obat/img/yp8zo8AiXdzBd8BowjYS8AsYxLww6A2bZmKroqB6.jpg',9,NULL,'2022-12-18 00:24:24'),(6,'A004','Vitamin A','Rak 1',10,'Tablet','2022-12-29',1000,'Vitamin','obat/img/Gd3eHFSPceKhutz85CSOepLw29M54MtPmtIbZ5rf.jpg',9,NULL,'2022-12-18 00:24:39'),(7,'213','Tolak Angin','2',10,'230123','2023-12-31',4000,'Obat herbal','obat/img/P1Gc1ehj79irywMxO9jHbMWqiF1KT7e6MSC1CwEd.jpg',11,'2022-12-17 23:37:08','2022-12-18 00:22:16'),(8,'214','Vitamin C IPI','1',10,'230124','2023-01-31',6000,'VITAMIN C IPI merupakan vitamin C berbentuk tablet dengan rasa jeruk yang bermanfaat untuk membantu memenuhi kebutuhan vitamin C.','obat/img/5D1tD6DvTx4UL54bSbx6USRP9PEJStoERKdszzjJ.jpg',9,'2022-12-18 00:53:15','2022-12-18 00:53:15'),(9,'215','Imboost Extra Vit C & D3','1',8,'230125','2023-01-02',35000,'IMBOOST EXTRA VIT C & D3 merupakan suplemen dengan kandungan Echinacea & Zinc yang dilengkapi dengan penambahan Vitamin C + Vitamin D yang bekerja secara sinergis untuk meningkatkan sistem kekebalan tubuh. Suplemen ini digunakan untuk membantu memelihara kesehatan dan daya tahan tubuh.','obat/img/QwXOElIegk44wlzhtK2otfwQem4RMXJeplEULG9H.png',9,'2022-12-18 00:54:15','2022-12-18 00:54:15');
/*!40000 ALTER TABLE `obat` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `pasien`
--

DROP TABLE IF EXISTS `pasien`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `pasien` (
  `id` int NOT NULL AUTO_INCREMENT,
  `nama` varchar(45) NOT NULL,
  `gender` enum('L','P') NOT NULL,
  `tmpt_lahir` varchar(45) NOT NULL,
  `tgl_lahir` date NOT NULL,
  `email` varchar(45) NOT NULL,
  `no_hp` varchar(45) NOT NULL,
  `alamat` text,
  `foto` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `no_hp_UNIQUE` (`no_hp`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `pasien`
--

LOCK TABLES `pasien` WRITE;
/*!40000 ALTER TABLE `pasien` DISABLE KEYS */;
INSERT INTO `pasien` VALUES (3,'Andi','L','Bekasi','2022-12-05','andi@gmail.com','085345732178','Bekasi','foto-Andi.png'),(4,'Santi','P','Bandung','2022-11-08','santi@gmail.com','085345732098','Bandung','foto-Santi.png');
/*!40000 ALTER TABLE `pasien` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `password_resets`
--

DROP TABLE IF EXISTS `password_resets`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `password_resets` (
  `email` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  KEY `password_resets_email_index` (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `password_resets`
--

LOCK TABLES `password_resets` WRITE;
/*!40000 ALTER TABLE `password_resets` DISABLE KEYS */;
/*!40000 ALTER TABLE `password_resets` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `pemeriksaan`
--

DROP TABLE IF EXISTS `pemeriksaan`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `pemeriksaan` (
  `id` int NOT NULL AUTO_INCREMENT,
  `tgl` date NOT NULL,
  `diagnosa` varchar(45) DEFAULT NULL,
  `solusi` varchar(45) DEFAULT NULL,
  `dokter_id` int NOT NULL,
  `pasien_id` int NOT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_pemeriksaan_dokter1` (`dokter_id`),
  KEY `fk_pemeriksaan_pasien1` (`pasien_id`),
  CONSTRAINT `fk_pemeriksaan_dokter1` FOREIGN KEY (`dokter_id`) REFERENCES `dokter` (`id`),
  CONSTRAINT `fk_pemeriksaan_pasien1` FOREIGN KEY (`pasien_id`) REFERENCES `pasien` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `pemeriksaan`
--

LOCK TABLES `pemeriksaan` WRITE;
/*!40000 ALTER TABLE `pemeriksaan` DISABLE KEYS */;
/*!40000 ALTER TABLE `pemeriksaan` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `personal_access_tokens`
--

DROP TABLE IF EXISTS `personal_access_tokens`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `personal_access_tokens` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `tokenable_type` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `tokenable_id` bigint unsigned NOT NULL,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(64) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `abilities` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `expires_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `personal_access_tokens`
--

LOCK TABLES `personal_access_tokens` WRITE;
/*!40000 ALTER TABLE `personal_access_tokens` DISABLE KEYS */;
/*!40000 ALTER TABLE `personal_access_tokens` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `resep_obat`
--

DROP TABLE IF EXISTS `resep_obat`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `resep_obat` (
  `id` int NOT NULL AUTO_INCREMENT,
  `tgl` date NOT NULL,
  `jumlah_obat` varchar(45) NOT NULL,
  `harga_obat` varchar(45) NOT NULL,
  `obat_id` int NOT NULL,
  `pemeriksaan_id` int NOT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_resep_obat_obat1` (`obat_id`),
  KEY `fk_resep_obat_pemeriksaan1` (`pemeriksaan_id`),
  CONSTRAINT `fk_resep_obat_obat1` FOREIGN KEY (`obat_id`) REFERENCES `obat` (`id`),
  CONSTRAINT `fk_resep_obat_pemeriksaan1` FOREIGN KEY (`pemeriksaan_id`) REFERENCES `pemeriksaan` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `resep_obat`
--

LOCK TABLES `resep_obat` WRITE;
/*!40000 ALTER TABLE `resep_obat` DISABLE KEYS */;
/*!40000 ALTER TABLE `resep_obat` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `suplai_obat`
--

DROP TABLE IF EXISTS `suplai_obat`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `suplai_obat` (
  `id` int NOT NULL AUTO_INCREMENT,
  `kode` varchar(20) NOT NULL,
  `tgl` date DEFAULT NULL,
  `suplier_id` int NOT NULL,
  `keterangan` text,
  `obat_id` int NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `kode_UNIQUE` (`kode`),
  KEY `fk_suplai_obat_suplier` (`suplier_id`),
  KEY `fk_suplai_obat_obat1` (`obat_id`),
  CONSTRAINT `fk_suplai_obat_obat1` FOREIGN KEY (`obat_id`) REFERENCES `obat` (`id`),
  CONSTRAINT `fk_suplai_obat_suplier` FOREIGN KEY (`suplier_id`) REFERENCES `suplier` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `suplai_obat`
--

LOCK TABLES `suplai_obat` WRITE;
/*!40000 ALTER TABLE `suplai_obat` DISABLE KEYS */;
/*!40000 ALTER TABLE `suplai_obat` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `suplier`
--

DROP TABLE IF EXISTS `suplier`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `suplier` (
  `id` int NOT NULL AUTO_INCREMENT,
  `nama` varchar(45) NOT NULL,
  `telp` varchar(45) NOT NULL,
  `email` varchar(20) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `suplier`
--

LOCK TABLES `suplier` WRITE;
/*!40000 ALTER TABLE `suplier` DISABLE KEYS */;
/*!40000 ALTER TABLE `suplier` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `users` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_email_unique` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `users`
--

LOCK TABLES `users` WRITE;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
/*!40000 ALTER TABLE `users` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2022-12-19  7:25:56
