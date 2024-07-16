-- MySQL dump 10.13  Distrib 8.0.37, for Linux (x86_64)
--
-- Host: localhost    Database: laravel_db
-- ------------------------------------------------------
-- Server version	8.0.37-0ubuntu0.24.04.1

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
-- Table structure for table `cache`
--

DROP TABLE IF EXISTS `cache`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `cache` (
  `key` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `value` mediumtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `expiration` int NOT NULL,
  PRIMARY KEY (`key`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `cache`
--

LOCK TABLES `cache` WRITE;
/*!40000 ALTER TABLE `cache` DISABLE KEYS */;
/*!40000 ALTER TABLE `cache` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `cache_locks`
--

DROP TABLE IF EXISTS `cache_locks`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `cache_locks` (
  `key` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `owner` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `expiration` int NOT NULL,
  PRIMARY KEY (`key`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `cache_locks`
--

LOCK TABLES `cache_locks` WRITE;
/*!40000 ALTER TABLE `cache_locks` DISABLE KEYS */;
/*!40000 ALTER TABLE `cache_locks` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `events`
--

DROP TABLE IF EXISTS `events`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `events` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `path` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'storage/posters/',
  `poster` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `event_date` date NOT NULL,
  `venue_id` bigint unsigned NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `events_venue_id_foreign` (`venue_id`),
  CONSTRAINT `events_venue_id_foreign` FOREIGN KEY (`venue_id`) REFERENCES `venues` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=51 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `events`
--

LOCK TABLES `events` WRITE;
/*!40000 ALTER TABLE `events` DISABLE KEYS */;
INSERT INTO `events` VALUES (1,'Ea voluptas commodi nemo at possimus culpa natus.','storage/posters/','444c0908d11358e1bf1f07403378970a.png','2024-12-09',16,'2024-07-13 12:39:33','2024-07-13 12:39:33'),(2,'Maiores porro sint eos nulla dolor reprehenderit quod.','storage/posters/','c1ab2b2f362935839f5ee1f7905e7644.png','2025-03-16',18,'2024-07-13 12:39:33','2024-07-13 12:39:33'),(3,'In quidem qui et quia voluptatibus possimus.','storage/posters/','acd4b88ae8704106fbe69a1994f9028d.png','2024-11-02',1,'2024-07-13 12:39:33','2024-07-13 12:39:33'),(4,'Et quod eum nisi ut et facere.','storage/posters/','220772397f75789aa6ccb702446c0244.png','2025-01-01',19,'2024-07-13 12:39:33','2024-07-13 12:39:33'),(5,'Et id aut quisquam officiis.','storage/posters/','bf1895229b63d0b9e47433557f906575.png','2024-07-31',17,'2024-07-13 12:39:33','2024-07-13 12:39:33'),(6,'Sapiente quas quia aperiam eius omnis omnis.','storage/posters/','f7401a49279eab05793d5ae58297810e.png','2024-11-13',7,'2024-07-13 12:39:33','2024-07-13 12:39:33'),(7,'Culpa illum voluptates ipsam qui iusto eum.','storage/posters/','4f724c4eb3abdb430971b0b415a0e4fb.png','2025-02-18',3,'2024-07-13 12:39:33','2024-07-13 12:39:33'),(8,'Et velit voluptatum sunt temporibus.','storage/posters/','9b0b5528a75837cad0c5e3e179609bf8.png','2024-07-17',19,'2024-07-13 12:39:33','2024-07-13 12:39:33'),(9,'Illum neque quod voluptatem officia quisquam veniam.','storage/posters/','07f128ffefeadb3bf924adf20d28d8f6.png','2024-10-01',16,'2024-07-13 12:39:33','2024-07-13 12:39:33'),(10,'Libero explicabo aut optio facere omnis.','storage/posters/','213332a00b384e778975ff6a2ea15f96.png','2025-01-27',8,'2024-07-13 12:39:33','2024-07-13 12:39:33'),(11,'Quia quasi alias sunt autem sit laborum.','storage/posters/','18d8924990f221ee3f34f8e2f80a7d7a.png','2024-08-11',6,'2024-07-13 12:39:33','2024-07-13 12:39:33'),(12,'Adipisci odit dolorum fugiat assumenda voluptates.','storage/posters/','c2e9ea0910e82c33f38eb07edbc41c25.png','2025-03-28',7,'2024-07-13 12:39:33','2024-07-13 12:39:33'),(13,'Voluptas aut in dignissimos doloribus non veniam.','storage/posters/','8ed4bf91d0e73d5ac5375ae86cccbd33.png','2025-03-18',4,'2024-07-13 12:39:33','2024-07-13 12:39:33'),(14,'Aut quis hic nihil nobis ea beatae.','storage/posters/','611a730885906b7b88dde6ce4f1a3508.png','2024-09-18',8,'2024-07-13 12:39:33','2024-07-13 12:39:33'),(15,'Distinctio vitae nemo voluptates ipsa.','storage/posters/','16af0953243112549c790c733239029e.png','2024-10-04',5,'2024-07-13 12:39:33','2024-07-13 12:39:33'),(16,'Est nihil quis sunt minus voluptatibus iste.','storage/posters/','5ebdf8875225c2166c4dafb1687b3ede.png','2025-06-18',3,'2024-07-13 12:39:33','2024-07-13 12:39:33'),(17,'Error provident et enim velit id praesentium omnis.','storage/posters/','1ab8cc88bd880d966d846b5f60474466.png','2025-07-09',19,'2024-07-13 12:39:33','2024-07-13 12:39:33'),(18,'Excepturi et sed praesentium nostrum assumenda dicta.','storage/posters/','f7ff4349e11594e6c750c32f099d9b59.png','2025-01-16',9,'2024-07-13 12:39:33','2024-07-13 12:39:33'),(19,'Quidem repellendus repellendus voluptatem.','storage/posters/','b3f977c47c97edc20a808768a5dcebd1.png','2024-09-25',19,'2024-07-13 12:39:33','2024-07-13 12:39:33'),(20,'Molestias quia hic aut facilis.','storage/posters/','4d60c881e213d698a9cbc875903120a3.png','2025-04-25',13,'2024-07-13 12:39:33','2024-07-13 12:39:33'),(21,'Ut qui eum ut aliquid sunt.','storage/posters/','1a7cba3ae39e41e4ee12a66d89a229b8.png','2024-11-10',2,'2024-07-13 12:39:33','2024-07-13 12:39:33'),(22,'Harum alias doloribus amet et.','storage/posters/','c10feb83ad23d75a65ffbb905efe4c2f.png','2024-07-14',7,'2024-07-13 12:39:33','2024-07-13 12:39:33'),(23,'Optio sapiente itaque totam quae vero.','storage/posters/','f0da874bd32895821e201382c2b6a90e.png','2025-05-19',7,'2024-07-13 12:39:33','2024-07-13 12:39:33'),(24,'Quam quidem magnam soluta ab et voluptates.','storage/posters/','a984f3fc4f05856f4fb606b9672e9367.png','2025-05-20',6,'2024-07-13 12:39:33','2024-07-13 12:39:33'),(25,'Recusandae vel sed velit quis.','storage/posters/','32f43b273ca92f4fb75c934528bf4d16.png','2025-06-18',20,'2024-07-13 12:39:33','2024-07-13 12:39:33'),(26,'Rerum recusandae ut consequuntur.','storage/posters/','9fb951065123c18aafd5d4428a1a9a3e.png','2024-10-03',14,'2024-07-13 12:39:33','2024-07-13 12:39:33'),(27,'Aut nam et quis dicta.','storage/posters/','874c1db8f70fba3db9390217c5489725.png','2025-04-19',9,'2024-07-13 12:39:33','2024-07-13 12:39:33'),(28,'Aut quasi libero reprehenderit.','storage/posters/','7184833dd7a579dcfa41d8622713989f.png','2024-09-22',12,'2024-07-13 12:39:33','2024-07-13 12:39:33'),(29,'Explicabo mollitia ab est id non placeat.','storage/posters/','ffd9fd0be648a514349e566ee1b0f4e9.png','2024-11-18',9,'2024-07-13 12:39:33','2024-07-13 12:39:33'),(30,'Explicabo et unde quaerat aut dolorem placeat.','storage/posters/','3c33ddc7a47607bfd41fa5b11dd8bc0f.png','2024-09-21',6,'2024-07-13 12:39:33','2024-07-13 12:39:33'),(31,'Dicta enim est et non quia.','storage/posters/','7d9ac02bf3488775e5d9c14c757756fd.png','2024-08-04',15,'2024-07-13 12:39:33','2024-07-13 12:39:33'),(32,'Consequatur neque ut placeat nemo non et.','storage/posters/','4a6de4671fdaecf5f0783f82e0f19f93.png','2024-09-24',18,'2024-07-13 12:39:33','2024-07-13 12:39:33'),(33,'Quo fuga ipsa eos dolor voluptatem reiciendis.','storage/posters/','6b6c7dfeeb62145b15735367a9a506ab.png','2024-10-25',18,'2024-07-13 12:39:33','2024-07-13 12:39:33'),(34,'Et saepe consequuntur sit.','storage/posters/','0274bcc967b342c061e08305516ba2de.png','2024-12-08',8,'2024-07-13 12:39:33','2024-07-13 12:39:33'),(35,'Et similique laudantium est omnis.','storage/posters/','24e5e401b13ccb60849e60433a536e85.png','2024-07-24',20,'2024-07-13 12:39:33','2024-07-13 12:39:33'),(36,'Facere sit suscipit nulla qui et eum.','storage/posters/','0983612f6e473fce680d97fa873e19de.png','2024-08-01',3,'2024-07-13 12:39:33','2024-07-13 12:39:33'),(37,'Tempore quasi tenetur ex.','storage/posters/','aa19c45c902a6a5fb3a309a299e188b2.png','2025-05-25',10,'2024-07-13 12:39:33','2024-07-13 12:39:33'),(38,'Cumque non enim ratione laborum quod ut odit.','storage/posters/','9113792532ba06db28a7d4acfaaa22ce.png','2025-02-22',5,'2024-07-13 12:39:33','2024-07-13 12:39:33'),(39,'Necessitatibus in vero nostrum quod voluptate et nihil.','storage/posters/','8499783a8ccf3fa4624618d44dfda96a.png','2024-10-05',3,'2024-07-13 12:39:33','2024-07-13 12:39:33'),(40,'Facere totam rerum quibusdam dolor et laborum.','storage/posters/','7844128fcc06161cb66171985415d35a.png','2024-12-09',20,'2024-07-13 12:39:33','2024-07-13 12:39:33'),(41,'Tempore officia autem dolore omnis voluptas facilis perferendis.','storage/posters/','48f84a4145e84c890bcf1bd6f440b561.png','2024-12-28',8,'2024-07-13 12:39:33','2024-07-13 12:39:33'),(42,'Quaerat aut quisquam assumenda aut.','storage/posters/','f75ebf9f477832e3ce834dadcabaf3b9.png','2024-10-23',11,'2024-07-13 12:39:33','2024-07-13 12:39:33'),(43,'In et explicabo harum illo.','storage/posters/','0fd6c81d03a5a5f4d08473903a8e8389.png','2024-10-20',8,'2024-07-13 12:39:33','2024-07-13 12:39:33'),(44,'Recusandae et cum et iusto rerum deleniti.','storage/posters/','67a06174ea7dba936ac99b6d58e96903.png','2025-01-02',1,'2024-07-13 12:39:33','2024-07-13 12:39:33'),(45,'Et fugit at totam impedit sit voluptas aut.','storage/posters/','5217edffb6406b5081ec3486824cd208.png','2024-08-29',11,'2024-07-13 12:39:33','2024-07-13 12:39:33'),(46,'Quo voluptate perspiciatis consequatur illum atque itaque inventore et.','storage/posters/','02da9e067e1307cb9d838921b6adda3e.png','2025-03-10',6,'2024-07-13 12:39:33','2024-07-13 12:39:33'),(47,'Corporis praesentium neque non alias.','storage/posters/','cc93da9b009b23faea9a4d38d05857ed.png','2024-10-06',12,'2024-07-13 12:39:33','2024-07-13 12:39:33'),(48,'Iusto necessitatibus ea molestias modi ut.','storage/posters/','4f9765464a0100afc8a9272f15c1d0df.png','2024-09-22',18,'2024-07-13 12:39:33','2024-07-13 12:39:33'),(49,'Dicta recusandae a laboriosam magni.','storage/posters/','fd1fbb77d43dff2a32bf4d83818cc701.png','2025-05-23',4,'2024-07-13 12:39:33','2024-07-13 12:39:33'),(50,'Doloremque ut nesciunt maxime perferendis.','storage/posters/','40be87b47296eb272d6779265b082cd2.png','2024-08-16',7,'2024-07-13 12:39:33','2024-07-13 12:39:33');
/*!40000 ALTER TABLE `events` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `failed_jobs`
--

DROP TABLE IF EXISTS `failed_jobs`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `failed_jobs` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `uuid` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
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
-- Table structure for table `job_batches`
--

DROP TABLE IF EXISTS `job_batches`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `job_batches` (
  `id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `total_jobs` int NOT NULL,
  `pending_jobs` int NOT NULL,
  `failed_jobs` int NOT NULL,
  `failed_job_ids` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `options` mediumtext COLLATE utf8mb4_unicode_ci,
  `cancelled_at` int DEFAULT NULL,
  `created_at` int NOT NULL,
  `finished_at` int DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `job_batches`
--

LOCK TABLES `job_batches` WRITE;
/*!40000 ALTER TABLE `job_batches` DISABLE KEYS */;
/*!40000 ALTER TABLE `job_batches` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `jobs`
--

DROP TABLE IF EXISTS `jobs`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `jobs` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `queue` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `attempts` tinyint unsigned NOT NULL,
  `reserved_at` int unsigned DEFAULT NULL,
  `available_at` int unsigned NOT NULL,
  `created_at` int unsigned NOT NULL,
  PRIMARY KEY (`id`),
  KEY `jobs_queue_index` (`queue`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `jobs`
--

LOCK TABLES `jobs` WRITE;
/*!40000 ALTER TABLE `jobs` DISABLE KEYS */;
/*!40000 ALTER TABLE `jobs` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `migrations`
--

DROP TABLE IF EXISTS `migrations`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `migrations` (
  `id` int unsigned NOT NULL AUTO_INCREMENT,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=36 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `migrations`
--

LOCK TABLES `migrations` WRITE;
/*!40000 ALTER TABLE `migrations` DISABLE KEYS */;
INSERT INTO `migrations` VALUES (31,'0001_01_01_000000_create_users_table',1),(32,'0001_01_01_000001_create_cache_table',1),(33,'0001_01_01_000002_create_jobs_table',1),(34,'2024_07_09_172743_create_venues_table',1),(35,'2024_07_09_172803_create_events_table',1);
/*!40000 ALTER TABLE `migrations` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `password_reset_tokens`
--

DROP TABLE IF EXISTS `password_reset_tokens`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `password_reset_tokens` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `password_reset_tokens`
--

LOCK TABLES `password_reset_tokens` WRITE;
/*!40000 ALTER TABLE `password_reset_tokens` DISABLE KEYS */;
/*!40000 ALTER TABLE `password_reset_tokens` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `sessions`
--

DROP TABLE IF EXISTS `sessions`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `sessions` (
  `id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` bigint unsigned DEFAULT NULL,
  `ip_address` varchar(45) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `user_agent` text COLLATE utf8mb4_unicode_ci,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `last_activity` int NOT NULL,
  PRIMARY KEY (`id`),
  KEY `sessions_user_id_index` (`user_id`),
  KEY `sessions_last_activity_index` (`last_activity`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `sessions`
--

LOCK TABLES `sessions` WRITE;
/*!40000 ALTER TABLE `sessions` DISABLE KEYS */;
/*!40000 ALTER TABLE `sessions` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `users` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `role` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'guest',
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_email_unique` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `users`
--

LOCK TABLES `users` WRITE;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` VALUES (1,'admin','admin@example.com','admin','2024-07-13 12:39:33','$2y$12$Ji5mSFTqmTMCFyTDpkbUQO9qR/zFMdjfVybu7C125nI84GaccN4xC','krDiGq3d9n','2024-07-13 12:39:33','2024-07-13 12:39:33');
/*!40000 ALTER TABLE `users` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `venues`
--

DROP TABLE IF EXISTS `venues`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `venues` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=21 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `venues`
--

LOCK TABLES `venues` WRITE;
/*!40000 ALTER TABLE `venues` DISABLE KEYS */;
INSERT INTO `venues` VALUES (1,'Heller and Sons','2024-07-13 12:38:50','2024-07-13 12:38:50'),(2,'Krajcik-Armstrong','2024-07-13 12:38:50','2024-07-13 12:38:50'),(3,'Hammes, Beatty and Davis','2024-07-13 12:38:50','2024-07-13 12:38:50'),(4,'Gerlach-Predovic','2024-07-13 12:38:50','2024-07-13 12:38:50'),(5,'Green, D\'Amore and Lowe','2024-07-13 12:38:50','2024-07-13 12:38:50'),(6,'Hoeger, Macejkovic and Upton','2024-07-13 12:38:50','2024-07-13 12:38:50'),(7,'Klocko Group','2024-07-13 12:38:50','2024-07-13 12:38:50'),(8,'Rau, Wilderman and Conroy','2024-07-13 12:38:50','2024-07-13 12:38:50'),(9,'Wiza-Mann','2024-07-13 12:38:50','2024-07-13 12:38:50'),(10,'Ward, Ratke and Bogan','2024-07-13 12:38:50','2024-07-13 12:38:50'),(11,'Hettinger-Oberbrunner','2024-07-13 12:38:50','2024-07-13 12:38:50'),(12,'Schroeder-Borer','2024-07-13 12:38:50','2024-07-13 12:38:50'),(13,'Ruecker Inc','2024-07-13 12:38:50','2024-07-13 12:38:50'),(14,'Gleichner-Nitzsche','2024-07-13 12:38:50','2024-07-13 12:38:50'),(15,'Krajcik-Auer','2024-07-13 12:38:50','2024-07-13 12:38:50'),(16,'Leffler, Walsh and Dibbert','2024-07-13 12:38:50','2024-07-13 12:38:50'),(17,'Moore, O\'Hara and Jerde','2024-07-13 12:38:50','2024-07-13 12:38:50'),(18,'Wuckert, Beahan and Mohr','2024-07-13 12:38:50','2024-07-13 12:38:50'),(19,'Rippin-Bode','2024-07-13 12:38:50','2024-07-13 12:38:50'),(20,'Homenick-Herman','2024-07-13 12:38:50','2024-07-13 12:38:50');
/*!40000 ALTER TABLE `venues` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2024-07-13 14:53:38
