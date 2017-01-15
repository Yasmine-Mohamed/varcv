-- MySQL dump 10.13  Distrib 5.5.53, for debian-linux-gnu (x86_64)
--
-- Host: localhost    Database: varcv
-- ------------------------------------------------------
-- Server version	5.5.53-0ubuntu0.14.04.1

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Table structure for table `auth_users`
--

DROP TABLE IF EXISTS `auth_users`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `auth_users` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `user_id` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `provider` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `auth_users_user_id_unique` (`user_id`),
  UNIQUE KEY `auth_users_email_unique` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `auth_users`
--

LOCK TABLES `auth_users` WRITE;
/*!40000 ALTER TABLE `auth_users` DISABLE KEYS */;
INSERT INTO `auth_users` VALUES (1,'2174205289471224','jessy.mohamed2014@gmail.com','facebook','l3JbsXIq029AWEfWVjdCGRC2xo3LMtwUTl26OHSgDXJMXUL22OPjwEMpseG6','2017-01-04 11:24:22','2017-01-10 14:09:35');
/*!40000 ALTER TABLE `auth_users` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `companies`
--

DROP TABLE IF EXISTS `companies`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `companies` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `company_name` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `company_email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `owner_name` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `industry_field` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `address` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `foundation_date` date DEFAULT NULL,
  `current_employees_num` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `companies_company_email_unique` (`company_email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `companies`
--

LOCK TABLES `companies` WRITE;
/*!40000 ALTER TABLE `companies` DISABLE KEYS */;
/*!40000 ALTER TABLE `companies` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `company_skill`
--

DROP TABLE IF EXISTS `company_skill`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `company_skill` (
  `company_id` int(10) unsigned NOT NULL,
  `skill_id` int(10) unsigned NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  KEY `company_skill_company_id_index` (`company_id`),
  KEY `company_skill_skill_id_index` (`skill_id`),
  CONSTRAINT `company_skill_company_id_foreign` FOREIGN KEY (`company_id`) REFERENCES `companies` (`id`) ON DELETE CASCADE,
  CONSTRAINT `company_skill_skill_id_foreign` FOREIGN KEY (`skill_id`) REFERENCES `skills` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `company_skill`
--

LOCK TABLES `company_skill` WRITE;
/*!40000 ALTER TABLE `company_skill` DISABLE KEYS */;
/*!40000 ALTER TABLE `company_skill` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `data_users`
--

DROP TABLE IF EXISTS `data_users`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `data_users` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `social_auth_id` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `business_email` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `first_name` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `middle_name` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `last_name` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `birthday` date DEFAULT NULL,
  `address` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `profile_picture` text COLLATE utf8_unicode_ci,
  `career_objective` text COLLATE utf8_unicode_ci,
  `rate` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `data_users_social_auth_id_foreign` (`social_auth_id`),
  CONSTRAINT `data_users_social_auth_id_foreign` FOREIGN KEY (`social_auth_id`) REFERENCES `auth_users` (`user_id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `data_users`
--

LOCK TABLES `data_users` WRITE;
/*!40000 ALTER TABLE `data_users` DISABLE KEYS */;
/*!40000 ALTER TABLE `data_users` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `education_node_user`
--

DROP TABLE IF EXISTS `education_node_user`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `education_node_user` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `social_auth_id` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `education_name` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `education_field` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `graduation_date` text COLLATE utf8_unicode_ci,
  `grade` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `education_node_user_social_auth_id_foreign` (`social_auth_id`),
  CONSTRAINT `education_node_user_social_auth_id_foreign` FOREIGN KEY (`social_auth_id`) REFERENCES `auth_users` (`user_id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `education_node_user`
--

LOCK TABLES `education_node_user` WRITE;
/*!40000 ALTER TABLE `education_node_user` DISABLE KEYS */;
/*!40000 ALTER TABLE `education_node_user` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `level_skill`
--

DROP TABLE IF EXISTS `level_skill`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `level_skill` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `level_name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `level_skill`
--

LOCK TABLES `level_skill` WRITE;
/*!40000 ALTER TABLE `level_skill` DISABLE KEYS */;
INSERT INTO `level_skill` VALUES (4,'Mid Level','2017-01-04 11:45:22','2017-01-04 11:45:41'),(5,'Entry Level','2017-01-04 11:46:00','2017-01-04 11:46:00'),(6,'Expert Level','2017-01-04 11:46:28','2017-01-04 11:46:28');
/*!40000 ALTER TABLE `level_skill` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `migrations`
--

DROP TABLE IF EXISTS `migrations`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `migrations` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `migration` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `migrations`
--

LOCK TABLES `migrations` WRITE;
/*!40000 ALTER TABLE `migrations` DISABLE KEYS */;
INSERT INTO `migrations` VALUES (1,'2014_10_12_000000_create_auth_users_table',1),(2,'2016_12_26_134802_create_data_users_table',1),(3,'2016_12_26_135113_create_phone_user_table',1),(4,'2016_12_26_135444_create_education_node_user_table',1),(5,'2016_12_26_135638_create_work_experience_user_table',1),(6,'2016_12_26_135800_create_templates_table',1),(7,'2016_12_26_140425_create_companies_table',1),(8,'2016_12_26_140523_create_level_skill_table',1),(10,'2016_12_26_140600_create_skills_table',2);
/*!40000 ALTER TABLE `migrations` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `phone_user`
--

DROP TABLE IF EXISTS `phone_user`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `phone_user` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `social_auth_id` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `phone` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `phone_user_social_auth_id_foreign` (`social_auth_id`),
  CONSTRAINT `phone_user_social_auth_id_foreign` FOREIGN KEY (`social_auth_id`) REFERENCES `auth_users` (`user_id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `phone_user`
--

LOCK TABLES `phone_user` WRITE;
/*!40000 ALTER TABLE `phone_user` DISABLE KEYS */;
/*!40000 ALTER TABLE `phone_user` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `skill_social_auth`
--

DROP TABLE IF EXISTS `skill_social_auth`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `skill_social_auth` (
  `social_auth_id` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `skill_id` int(10) unsigned NOT NULL,
  `level_id` int(10) unsigned DEFAULT NULL,
  `working_years` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  KEY `skill_social_auth_social_auth_id_index` (`social_auth_id`),
  KEY `skill_social_auth_skill_id_index` (`skill_id`),
  KEY `skill_social_auth_level_id_index` (`level_id`),
  CONSTRAINT `skill_social_auth_level_id_foreign` FOREIGN KEY (`level_id`) REFERENCES `level_skill` (`id`) ON DELETE CASCADE,
  CONSTRAINT `skill_social_auth_skill_id_foreign` FOREIGN KEY (`skill_id`) REFERENCES `skills` (`id`) ON DELETE CASCADE,
  CONSTRAINT `skill_social_auth_social_auth_id_foreign` FOREIGN KEY (`social_auth_id`) REFERENCES `auth_users` (`user_id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `skill_social_auth`
--

LOCK TABLES `skill_social_auth` WRITE;
/*!40000 ALTER TABLE `skill_social_auth` DISABLE KEYS */;
INSERT INTO `skill_social_auth` VALUES ('2174205289471224',1,4,'3','2017-01-04 17:23:13','2017-01-04 17:23:13'),('2174205289471224',2,5,'1','2017-01-04 17:23:26','2017-01-04 17:23:26');
/*!40000 ALTER TABLE `skill_social_auth` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `skills`
--

DROP TABLE IF EXISTS `skills`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `skills` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `skill_name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `skill_type` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `skills`
--

LOCK TABLES `skills` WRITE;
/*!40000 ALTER TABLE `skills` DISABLE KEYS */;
INSERT INTO `skills` VALUES (1,'PHP','work','2017-01-04 11:47:16','2017-01-04 11:47:16'),(2,'Ruby','work','2017-01-04 11:47:34','2017-01-04 11:47:34'),(3,'Wordpress','work','2017-01-04 11:47:46','2017-01-04 11:47:46'),(4,'Team Leader','personal','2017-01-04 11:48:13','2017-01-04 11:48:13'),(5,'Communication Skills','personal','2017-01-04 11:48:36','2017-01-04 11:48:36');
/*!40000 ALTER TABLE `skills` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `template_user`
--

DROP TABLE IF EXISTS `template_user`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `template_user` (
  `social_auth_id` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `template_id` int(10) unsigned NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  KEY `template_user_social_auth_id_index` (`social_auth_id`),
  KEY `template_user_template_id_index` (`template_id`),
  CONSTRAINT `template_user_social_auth_id_foreign` FOREIGN KEY (`social_auth_id`) REFERENCES `auth_users` (`user_id`) ON DELETE CASCADE,
  CONSTRAINT `template_user_template_id_foreign` FOREIGN KEY (`template_id`) REFERENCES `templates` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `template_user`
--

LOCK TABLES `template_user` WRITE;
/*!40000 ALTER TABLE `template_user` DISABLE KEYS */;
/*!40000 ALTER TABLE `template_user` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `templates`
--

DROP TABLE IF EXISTS `templates`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `templates` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `template_name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `template_url` text COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `templates`
--

LOCK TABLES `templates` WRITE;
/*!40000 ALTER TABLE `templates` DISABLE KEYS */;
/*!40000 ALTER TABLE `templates` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `work_experience_user`
--

DROP TABLE IF EXISTS `work_experience_user`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `work_experience_user` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `social_auth_id` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `job_title` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `job_description` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `company_name` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `start_date` text COLLATE utf8_unicode_ci,
  `end_date` text COLLATE utf8_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `work_experience_user_social_auth_id_foreign` (`social_auth_id`),
  CONSTRAINT `work_experience_user_social_auth_id_foreign` FOREIGN KEY (`social_auth_id`) REFERENCES `auth_users` (`user_id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `work_experience_user`
--

LOCK TABLES `work_experience_user` WRITE;
/*!40000 ALTER TABLE `work_experience_user` DISABLE KEYS */;
/*!40000 ALTER TABLE `work_experience_user` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2017-01-15 18:09:11
