-- MySQL dump 10.13  Distrib 8.0.29, for Win64 (x86_64)
--
-- Host: 127.0.0.1    Database: db_shop
-- ------------------------------------------------------
-- Server version	8.0.29

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!50503 SET NAMES utf8 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Table structure for table `categories`
--

DROP TABLE IF EXISTS `categories`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `categories` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `parent_id` int NOT NULL DEFAULT '0',
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=25 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `categories`
--

LOCK TABLES `categories` WRITE;
/*!40000 ALTER TABLE `categories` DISABLE KEYS */;
INSERT INTO `categories` VALUES (20,'Trang trí tiệc cưới',0,'trang-tri-tiec-cuoi','2022-08-26 07:01:29','2022-08-27 23:38:53'),(21,'Trang trí sinh nhật',0,'trang-tri-sinh-nhat','2022-08-26 23:56:28','2022-08-27 23:38:41');
/*!40000 ALTER TABLE `categories` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `coupons`
--

DROP TABLE IF EXISTS `coupons`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `coupons` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `user_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` int NOT NULL,
  `coupons_key` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `date_start` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `date_end` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `coupons_value` int NOT NULL DEFAULT '0',
  `coupons_cart_value` int NOT NULL,
  `customer_group` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `coupons_price` int NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `coupons`
--

LOCK TABLES `coupons` WRITE;
/*!40000 ALTER TABLE `coupons` DISABLE KEYS */;
/*!40000 ALTER TABLE `coupons` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `customers`
--

DROP TABLE IF EXISTS `customers`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `customers` (
  `id` char(36) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `src` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `image_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` int NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` int NOT NULL DEFAULT '1',
  `role` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'normal',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `password_dehash` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  UNIQUE KEY `customers_id_unique` (`id`),
  UNIQUE KEY `customers_email_unique` (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `customers`
--

LOCK TABLES `customers` WRITE;
/*!40000 ALTER TABLE `customers` DISABLE KEYS */;
INSERT INTO `customers` VALUES ('08ab0810-1a56-46d1-a412-3dbd056d446e','test nguyen','/storage/customers/5/b1f8db03513912254d185addce84c7e0.png','img3.png','quangthanhliet@gmail.com',908096448,'$2y$10$RozXEPxp0kN/Mzjo3Wv.GeeIQZwQv4HpnwBJRWRnTmPuu6PkgAzpa',1,'normal','2022-09-22 07:32:35','2022-09-23 19:57:02','quang thanh liet'),('38ad7143-3ab7-45f1-ba19-dc4f338e75cf','janna nguyen','/storage/customers//e233f218a90b7a00b94b7f533a98c0a2.png','img1.png','janna@gmail.com',908096448,'$2y$10$/Oath5usbrRK6l54uo6WNeSeHaz/cdvTt3/26zKaZXWC.KyVAgR5q',1,'super_vip','2022-09-23 09:46:50','2022-09-23 19:58:31','minhman'),('898f6f82-8309-4465-83c8-af710091816f','jaden nguyen','/storage/customers//3849a4745c6dded7ae71f6ea03458100.png','sec4_img3.png','jaden@gmail.com',908096448,'$2y$10$ib2lU6YSXe5qGVQce.fDGeb4K9v2o1u41QG7YA.lvrUrDmMWnofFq',1,'super_vip','2022-09-23 09:47:36','2022-09-23 19:58:27','minhman'),('b3b4e507-a628-43e1-9ab1-6b265decf71c','my nguyen','/storage/customers//65bd2c9b931f057d7307dfaaa8d5c433.png','img2.png','mynguyen@gmail.com',908096448,'$2y$10$2lBwLas.vofEmKA0kpsHYe9TITt6P5C3NuoFneo88Xe5fiZ/VZBsC',1,'vip','2022-09-23 09:48:25','2022-09-23 19:58:22','minhman'),('da19acc6-65dd-4f96-8c82-dc39d68df931','man nguyen','/storage/customers//f3ccdd27d2000e3f9255a7e3e2c48800.jpg','1.jpg','nguyentrongminhman95@gmail.com',908096448,'$2y$10$CgCcI0bpPj0L0gUPWC08wuo9Cq.SO.Vwu8o03PxhHn569h9XRq362',1,'vip','2022-09-22 06:58:02','2022-09-23 19:58:36','minhman');
/*!40000 ALTER TABLE `customers` ENABLE KEYS */;
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
-- Table structure for table `galleries`
--

DROP TABLE IF EXISTS `galleries`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `galleries` (
  `id` char(36) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` int NOT NULL,
  `user_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` int NOT NULL DEFAULT '1',
  `name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description` text COLLATE utf8mb4_unicode_ci,
  `feature_image_path` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `feature_image_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  UNIQUE KEY `galleries_id_unique` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `galleries`
--

LOCK TABLES `galleries` WRITE;
/*!40000 ALTER TABLE `galleries` DISABLE KEYS */;
INSERT INTO `galleries` VALUES ('2a2ff917-3174-4693-a57a-5357d18ee301',5,'admin',1,NULL,NULL,'/storage/gallerys/5/396d16c4947a0f32e4f4fbdab0741093.png','content_popup3 - Copy.png','2022-09-20 06:59:54','2022-09-20 06:59:54'),('6f46495f-9a34-46be-8b35-c280bef1dc3d',5,'admin',1,'test','test','/storage/gallerys/5/b602e370d365f2ea954368469cbc8d7c.jpg','content_popup2.jpg','2022-09-19 08:07:35','2022-09-19 08:59:36'),('84986e73-56c8-446e-b3f5-0edd082ff240',5,'admin',1,'updated','updated','/storage/gallerys/5/fc5d240ab05d09b974527265e0eb3ed5.png','bg_sp.png','2022-09-19 08:24:05','2022-09-20 07:18:22'),('c147dd24-1149-406a-9b89-0c03b8d0379f',5,'admin',0,'updated best',NULL,'/storage/gallerys/5/d1adf6dbdb03db1627b404cf59426007.jpg','bai_viet_1.jpg','2022-09-20 07:04:43','2022-09-21 05:59:52');
/*!40000 ALTER TABLE `galleries` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `gallery_images`
--

DROP TABLE IF EXISTS `gallery_images`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `gallery_images` (
  `id` char(36) COLLATE utf8mb4_unicode_ci NOT NULL,
  `src` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `image_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `gellery_id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  UNIQUE KEY `gallery_images_id_unique` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `gallery_images`
--

LOCK TABLES `gallery_images` WRITE;
/*!40000 ALTER TABLE `gallery_images` DISABLE KEYS */;
INSERT INTO `gallery_images` VALUES ('1b25e464-c2f7-49bd-a84c-63a324e8187a','/storage/gallerys/5/b602e370d365f2ea954368469cbc8d7c.jpg','content_popup2.jpg','6f46495f-9a34-46be-8b35-c280bef1dc3d','2022-09-19 08:07:35','2022-09-19 08:07:35'),('262cd14a-3e3f-4929-9fd7-8bf884c4f9c5','/storage/gallerys/5/396d16c4947a0f32e4f4fbdab0741093.png','content_popup3 - Copy.png','84986e73-56c8-446e-b3f5-0edd082ff240','2022-09-20 07:18:22','2022-09-20 07:18:22'),('82db4a82-f3d6-4ba7-a146-f63a90cf0a5a','/storage/gallerys/5/481827cbfe3b2e4edb1756049341fd72.png','content_popup4.png','6f46495f-9a34-46be-8b35-c280bef1dc3d','2022-09-19 08:07:35','2022-09-19 08:07:35'),('8c1f29c5-c89b-456a-af36-a10c00be209c','/storage/gallerys/5/7f2126490d695eeb0f45d825b055aadc.jpg','content_popup2 - Copy.jpg','6f46495f-9a34-46be-8b35-c280bef1dc3d','2022-09-19 08:07:35','2022-09-19 08:07:35'),('9a22803e-eb51-47ff-a26e-c62f2328b3a6','/storage/gallerys/5/eee85d6257f47357acdbb81b3323685a.jpg','content_popup1.jpg','84986e73-56c8-446e-b3f5-0edd082ff240','2022-09-19 08:24:05','2022-09-19 08:24:05'),('a4d51878-66b1-4a31-8b39-d1a7da4cfc3c','/storage/gallerys/5/b602e370d365f2ea954368469cbc8d7c.jpg','content_popup2.jpg','2a2ff917-3174-4693-a57a-5357d18ee301','2022-09-20 06:59:54','2022-09-20 06:59:54'),('a91c81b0-b048-4f8c-9ad7-2e3774d256ea','/storage/gallerys/5/eee85d6257f47357acdbb81b3323685a.jpg','content_popup1.jpg','6f46495f-9a34-46be-8b35-c280bef1dc3d','2022-09-19 08:07:35','2022-09-19 08:07:35'),('ad678cc5-853d-4073-96bb-7bcb15a3599a','/storage/gallerys/5/8df7b73a7820f4aef47864f2a6c5fccf.jpg','12.jpg','c147dd24-1149-406a-9b89-0c03b8d0379f','2022-09-20 07:18:49','2022-09-20 07:18:49'),('edf61e23-66ce-4030-ada2-ad1d44c7f6f5','/storage/gallerys/5/da01349b67d60c9a6ac014b4cc969b59.png','content_popup3.png','6f46495f-9a34-46be-8b35-c280bef1dc3d','2022-09-19 08:07:35','2022-09-19 08:07:35'),('f2fd4de2-6857-4a16-8664-e5a23e504fe3','/storage/gallerys/5/396d16c4947a0f32e4f4fbdab0741093.png','content_popup3 - Copy.png','6f46495f-9a34-46be-8b35-c280bef1dc3d','2022-09-19 08:07:35','2022-09-19 08:07:35');
/*!40000 ALTER TABLE `gallery_images` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `menus`
--

DROP TABLE IF EXISTS `menus`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `menus` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `parent_id` int NOT NULL DEFAULT '0',
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `menus`
--

LOCK TABLES `menus` WRITE;
/*!40000 ALTER TABLE `menus` DISABLE KEYS */;
INSERT INTO `menus` VALUES (1,'Trang chủ',0,'trang-chu','2022-08-26 21:26:31','2022-08-26 21:26:31'),(2,'Giới thiệu',0,'gioi-thieu','2022-08-26 21:26:53','2022-08-26 21:26:53'),(3,'laravel is the best',2,'laravel-is-the-best','2022-08-26 21:27:26','2022-08-26 21:27:26'),(4,'Sản phẩm',0,'san-pham','2022-08-26 21:27:38','2022-08-26 23:37:10');
/*!40000 ALTER TABLE `menus` ENABLE KEYS */;
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
) ENGINE=InnoDB AUTO_INCREMENT=56 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `migrations`
--

LOCK TABLES `migrations` WRITE;
/*!40000 ALTER TABLE `migrations` DISABLE KEYS */;
INSERT INTO `migrations` VALUES (1,'2014_10_12_000000_create_users_table',1),(2,'2014_10_12_100000_create_password_resets_table',1),(3,'2019_08_19_000000_create_failed_jobs_table',1),(4,'2019_12_14_000001_create_personal_access_tokens_table',1),(5,'2022_08_19_140135_create_categories_table',1),(6,'2022_08_21_064052_create_permissions_table',2),(7,'2022_08_21_134858_create_table_user_role',3),(8,'2022_08_21_135231_create_roles_table',4),(9,'2022_08_21_140009_create_table_permission_role',5),(10,'2022_08_22_142940_create_table_permissions_role',6),(11,'2022_08_22_143029_create_table_users_role',6),(12,'2022_08_26_145237_create_column_password_dehash_table_user',7),(13,'2022_08_27_040416_create_menus_table',8),(14,'2022_08_27_082803_create_post_models_table',9),(15,'2022_08_27_090943_create_post_categories_table',10),(16,'2022_08_28_064245_create_posts_table',11),(17,'2022_08_28_072632_create_posts_table',12),(18,'2022_08_28_081928_create_column_slug_post_table',13),(19,'2022_08_28_120917_create_column_status_table_post',14),(20,'2022_08_29_133310_create_tags_table',15),(21,'2022_08_29_134106_create_post_tags_table',16),(22,'2022_08_29_134255_create_table_post_tag_relationship',16),(23,'2022_08_30_125425_create_post_tags_table',17),(24,'2022_08_30_125605_create_tablle_post_tag_ralationship',17),(25,'2022_08_30_153425_create_post_tag_table_ralationship',18),(26,'2022_09_02_121459_create_product_tags_table',19),(27,'2022_09_02_121607_create_table_product_tag_ralationship',19),(28,'2022_09_02_123829_create_table_product_tag_ralationship',20),(29,'2022_09_02_123919_create_table_product_tag_ralationship',21),(30,'2022_09_02_133812_create_sliders_table',22),(31,'2022_09_02_144514_create_sliders_table',23),(32,'2022_09_02_145824_create_column_users_name_posts_model',24),(33,'2022_09_02_145929_create_column_users_name_slider_model',24),(34,'2022_09_07_133213_create_products_table',25),(35,'2022_09_07_144816_create_products_images_table',26),(36,'2022_09_07_145609_create_colum_products_slug',27),(37,'2022_09_12_122446_create_products_table',28),(38,'2022_09_12_124153_create_column_user_name_for_products_table',29),(39,'2022_09_14_123843_create_column_image_name_table_products_image',30),(40,'2022_09_14_130656_create_products_table',31),(41,'2022_09_16_123630_create_products_images_table',32),(42,'2022_09_17_161337_create_galleries_table',33),(43,'2022_09_18_062121_create_column_price_table_products',34),(44,'2022_09_19_121654_create_gallery_images_table',35),(45,'2022_09_20_143845_create_user_avatars_table',36),(46,'2022_09_21_130641_create_settings_pages_table',37),(47,'2022_09_21_143809_create_column_type_table_setting_page',38),(48,'2022_09_22_130007_create_customers_table',39),(49,'2022_09_22_131348_craete_column_password_dehash',40),(50,'2022_09_22_160101_create_role_customers_table',41),(51,'2022_09_24_032430_create_coupons_table',42),(52,'2022_09_24_040607_create_column_coupons_price_table_coupon',43),(53,'2022_09_24_045910_create_table_coupons_role_customer_relationship',44),(54,'2022_09_24_050127_create_coupons_table',45),(55,'2022_09_24_050239_create_table_coupons_role_customer_relationship',46);
/*!40000 ALTER TABLE `migrations` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `password_resets`
--

DROP TABLE IF EXISTS `password_resets`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
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
-- Table structure for table `permissions`
--

DROP TABLE IF EXISTS `permissions`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `permissions` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `display_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `parent_id` int NOT NULL DEFAULT '0',
  `key_code` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=21 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `permissions`
--

LOCK TABLES `permissions` WRITE;
/*!40000 ALTER TABLE `permissions` DISABLE KEYS */;
INSERT INTO `permissions` VALUES (1,'Danhmucsanpham','Danh mục sản phẩm',0,'Danhmucsanpham_parent_id','2022-08-22 07:32:04','2022-08-22 07:32:04'),(2,'Danhsach','Danh sách',1,'Danhmucsanpham_Danhsach','2022-08-22 07:32:04','2022-08-22 07:32:04'),(3,'Themmoi','Thêm mới',1,'Danhmucsanpham_Themmoi','2022-08-22 07:32:04','2022-08-22 07:32:04'),(4,'Sua','Sửa',1,'Danhmucsanpham_Sua','2022-08-22 07:32:04','2022-08-22 07:32:04'),(5,'Xoa','Xóa',1,'Danhmucsanpham_Xoa','2022-08-22 07:32:04','2022-08-22 07:32:04'),(6,'Danhsachtaikhoan','Danh sách tài khoản',0,'Danhsachtaikhoan_parent_id','2022-08-22 07:32:06','2022-08-22 07:32:06'),(7,'Danhsach','Danh sách',6,'Danhsachtaikhoan_Danhsach','2022-08-22 07:32:06','2022-08-22 07:32:06'),(8,'Themmoi','Thêm mới',6,'Danhsachtaikhoan_Themmoi','2022-08-22 07:32:06','2022-08-22 07:32:06'),(9,'Sua','Sửa',6,'Danhsachtaikhoan_Sua','2022-08-22 07:32:06','2022-08-22 07:32:06'),(10,'Xoa','Xóa',6,'Danhsachtaikhoan_Xoa','2022-08-22 07:32:06','2022-08-22 07:32:06'),(11,'Capquyen','Cấp quyền',0,'Capquyen_parent_id','2022-08-22 07:32:07','2022-08-22 07:32:07'),(12,'Danhsach','Danh sách',11,'Capquyen_Danhsach','2022-08-22 07:32:07','2022-08-22 07:32:07'),(13,'Themmoi','Thêm mới',11,'Capquyen_Themmoi','2022-08-22 07:32:07','2022-08-22 07:32:07'),(14,'Sua','Sửa',11,'Capquyen_Sua','2022-08-22 07:32:07','2022-08-22 07:32:07'),(15,'Xoa','Xóa',11,'Capquyen_Xoa','2022-08-22 07:32:07','2022-08-22 07:32:07'),(16,'Vaitro','Vai trò',0,'Vaitro_parent_id','2022-08-22 07:32:09','2022-08-22 07:32:09'),(17,'Danhsach','Danh sách',16,'Vaitro_Danhsach','2022-08-22 07:32:09','2022-08-22 07:32:09'),(18,'Themmoi','Thêm mới',16,'Vaitro_Themmoi','2022-08-22 07:32:09','2022-08-22 07:32:09'),(19,'Sua','Sửa',16,'Vaitro_Sua','2022-08-22 07:32:09','2022-08-22 07:32:09'),(20,'Xoa','Xóa',16,'Vaitro_Xoa','2022-08-22 07:32:09','2022-08-22 07:32:09');
/*!40000 ALTER TABLE `permissions` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `permissions_role`
--

DROP TABLE IF EXISTS `permissions_role`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `permissions_role` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `role_id` int NOT NULL,
  `permission_id` int NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=88 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `permissions_role`
--

LOCK TABLES `permissions_role` WRITE;
/*!40000 ALTER TABLE `permissions_role` DISABLE KEYS */;
INSERT INTO `permissions_role` VALUES (1,1,2,NULL,NULL),(2,1,3,NULL,NULL),(3,1,4,NULL,NULL),(4,1,5,NULL,NULL),(5,1,7,NULL,NULL),(6,1,8,NULL,NULL),(7,1,9,NULL,NULL),(8,1,10,NULL,NULL),(9,1,12,NULL,NULL),(10,1,13,NULL,NULL),(11,1,14,NULL,NULL),(12,1,15,NULL,NULL),(13,1,17,NULL,NULL),(14,1,18,NULL,NULL),(15,1,19,NULL,NULL),(16,1,20,NULL,NULL),(37,4,2,NULL,NULL),(38,4,3,NULL,NULL),(39,4,4,NULL,NULL),(40,4,5,NULL,NULL),(41,4,7,NULL,NULL),(42,4,8,NULL,NULL),(43,4,9,NULL,NULL),(44,4,10,NULL,NULL),(45,4,12,NULL,NULL),(46,4,13,NULL,NULL),(47,4,14,NULL,NULL),(48,4,15,NULL,NULL),(49,4,17,NULL,NULL),(50,4,18,NULL,NULL),(51,4,19,NULL,NULL),(52,4,20,NULL,NULL),(70,6,3,NULL,NULL),(82,6,2,NULL,NULL),(83,6,4,NULL,NULL),(84,6,5,NULL,NULL),(85,7,2,NULL,NULL),(86,7,3,NULL,NULL),(87,7,4,NULL,NULL);
/*!40000 ALTER TABLE `permissions_role` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `personal_access_tokens`
--

DROP TABLE IF EXISTS `personal_access_tokens`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `personal_access_tokens` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `tokenable_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tokenable_id` bigint unsigned NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `abilities` text COLLATE utf8mb4_unicode_ci,
  `last_used_at` timestamp NULL DEFAULT NULL,
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
-- Table structure for table `post_categories`
--

DROP TABLE IF EXISTS `post_categories`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `post_categories` (
  `id` char(36) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `parent_id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '0',
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  UNIQUE KEY `post_categories_id_unique` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `post_categories`
--

LOCK TABLES `post_categories` WRITE;
/*!40000 ALTER TABLE `post_categories` DISABLE KEYS */;
INSERT INTO `post_categories` VALUES ('117bd649-80c0-4b43-8330-4d6b1219b254','Quần Áo','0','quan-ao','2022-08-30 05:46:45','2022-08-30 05:46:45'),('89368daf-8931-4d82-9b40-cce23047e50b','eddfs','0','eddfs','2022-09-01 22:11:00','2022-09-01 22:11:00');
/*!40000 ALTER TABLE `post_categories` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `post_tag`
--

DROP TABLE IF EXISTS `post_tag`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `post_tag` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `post_id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tag_id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=35 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `post_tag`
--

LOCK TABLES `post_tag` WRITE;
/*!40000 ALTER TABLE `post_tag` DISABLE KEYS */;
INSERT INTO `post_tag` VALUES (32,'06d8272d-d8d5-4997-ac6a-3033bc049392','10','2022-09-02 05:41:53','2022-09-02 05:41:53'),(33,'06d8272d-d8d5-4997-ac6a-3033bc049392','6','2022-09-02 05:41:53','2022-09-02 05:41:53'),(34,'1f1a7475-5c74-4bd5-9095-7e3a3b2bf5a2','10','2022-09-02 08:04:58','2022-09-02 08:04:58');
/*!40000 ALTER TABLE `post_tag` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `post_tags`
--

DROP TABLE IF EXISTS `post_tags`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `post_tags` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `post_tags`
--

LOCK TABLES `post_tags` WRITE;
/*!40000 ALTER TABLE `post_tags` DISABLE KEYS */;
INSERT INTO `post_tags` VALUES (6,'Quần Áo','quan-ao','2022-08-30 08:53:32','2022-08-30 08:53:32'),(10,'Sinh nhật bé','sinh-nhat-be','2022-08-31 08:31:24','2022-08-31 08:31:24'),(11,'test 1','test-1','2022-09-02 03:54:23','2022-09-02 05:37:10');
/*!40000 ALTER TABLE `post_tags` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `posts`
--

DROP TABLE IF EXISTS `posts`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `posts` (
  `id` char(36) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `categories_id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `content` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` int NOT NULL,
  `feature_image_path` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `feature_image_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `is_show_home` int NOT NULL DEFAULT '0',
  `status` int NOT NULL DEFAULT '1',
  `user_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  UNIQUE KEY `posts_id_unique` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `posts`
--

LOCK TABLES `posts` WRITE;
/*!40000 ALTER TABLE `posts` DISABLE KEYS */;
INSERT INTO `posts` VALUES ('1f1a7475-5c74-4bd5-9095-7e3a3b2bf5a2','dasdsadsa','117bd649-80c0-4b43-8330-4d6b1219b254','<p>dsadsa</p>',5,'/storage/post/5/b8cbcf8c07cd420ea6a1dc8fab2aa955.jpg','blog-three.jpg','2022-09-02 08:04:58','2022-09-07 05:10:06','dasdsadsa',0,1,'admin'),('2fe89d1b-cb72-46ec-907b-7c247de24af8','dsa','','',5,NULL,NULL,'2022-09-19 08:06:46','2022-09-19 08:06:46','dsa',0,1,'admin'),('85c13885-0ab2-478c-b111-106fe8c99bcd','dsadasasd','','',5,'/storage/post/5/b602e370d365f2ea954368469cbc8d7c.jpg','content_popup2.jpg','2022-09-17 22:14:13','2022-09-17 22:18:11','dsadasasd',0,1,'admin'),('a4236c95-2f68-43d2-9163-06756195a8fa','dsasdsad','','',5,'/storage/post/5/092c0e76256220fafa0f68682a9fda54.jpg','bg_section_form.jpg','2022-09-19 05:56:27','2022-09-19 05:56:27','dsasdsad',0,1,'admin');
/*!40000 ALTER TABLE `posts` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `product_tag`
--

DROP TABLE IF EXISTS `product_tag`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `product_tag` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `product_id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tag_id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=18 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `product_tag`
--

LOCK TABLES `product_tag` WRITE;
/*!40000 ALTER TABLE `product_tag` DISABLE KEYS */;
INSERT INTO `product_tag` VALUES (17,'81717705-427f-47b0-8309-ea7e060c2335','1','2022-09-22 07:01:35','2022-09-22 07:01:35');
/*!40000 ALTER TABLE `product_tag` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `product_tags`
--

DROP TABLE IF EXISTS `product_tags`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `product_tags` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `product_tags`
--

LOCK TABLES `product_tags` WRITE;
/*!40000 ALTER TABLE `product_tags` DISABLE KEYS */;
INSERT INTO `product_tags` VALUES (1,'product tag 2','product-tag-2','2022-09-02 05:29:15','2022-09-02 05:35:33'),(5,'product test','product-test','2022-09-02 05:40:06','2022-09-07 07:59:14');
/*!40000 ALTER TABLE `product_tags` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `products`
--

DROP TABLE IF EXISTS `products`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `products` (
  `id` char(36) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `categories_id` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `content` text COLLATE utf8mb4_unicode_ci,
  `user_id` int NOT NULL,
  `feature_image_path` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `feature_image_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `is_show_home` int NOT NULL DEFAULT '0',
  `status` int NOT NULL DEFAULT '1',
  `stock` int DEFAULT '1',
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `price` int DEFAULT '0',
  UNIQUE KEY `products_id_unique` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `products`
--

LOCK TABLES `products` WRITE;
/*!40000 ALTER TABLE `products` DISABLE KEYS */;
INSERT INTO `products` VALUES ('42f87cf0-db2c-4f52-9cbc-87a7d485fb89','sđsấ','admin',NULL,NULL,5,'/storage/products/5/092c0e76256220fafa0f68682a9fda54.jpg','bg_section_form.jpg',1,1,NULL,'sdsa','2022-09-17 07:33:06','2022-09-17 08:39:34',0),('6da8c059-687f-4980-a994-cb8b0377e808','dsadasasd','admin',NULL,NULL,5,NULL,NULL,0,1,10,'dsadasasd','2022-09-17 23:49:00','2022-09-17 23:50:57',20000),('81717705-427f-47b0-8309-ea7e060c2335','sdaasdads','admin','21','<p>dsaasdds</p>',5,'/storage/products/5/f8ff3453a1c645d4391a947b6b237a0d.jpg','mbtt.jpg',0,1,11,'sdaasdads','2022-09-22 07:01:35','2022-09-22 07:01:35',1212),('edf5ffbf-28b3-4241-8141-00cb2afe5e12','áddsaads','admin',NULL,NULL,5,'/storage/products/5/eee85d6257f47357acdbb81b3323685a.jpg','content_popup1.jpg',0,1,1,'addsaads','2022-09-19 08:06:58','2022-09-19 08:07:15',1);
/*!40000 ALTER TABLE `products` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `products_images`
--

DROP TABLE IF EXISTS `products_images`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `products_images` (
  `id` char(36) COLLATE utf8mb4_unicode_ci NOT NULL,
  `src` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `image_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `product_id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  UNIQUE KEY `products_images_id_unique` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `products_images`
--

LOCK TABLES `products_images` WRITE;
/*!40000 ALTER TABLE `products_images` DISABLE KEYS */;
INSERT INTO `products_images` VALUES ('424bbc7e-14d1-49f9-aa05-dc7e6283df92','/storage/products/5/fc5d240ab05d09b974527265e0eb3ed5.png','bg_sp.png','42f87cf0-db2c-4f52-9cbc-87a7d485fb89','2022-09-17 07:33:06','2022-09-17 07:33:06'),('455731ce-44d3-4fd8-9e86-3e2b27dabb91','/storage/products/5/10d27cc483101dc41545efc1680016b2.png','dk_mb.png','42f87cf0-db2c-4f52-9cbc-87a7d485fb89','2022-09-17 07:33:06','2022-09-17 07:33:06'),('9c6c8ff2-7650-4ff6-bcfc-77efba905e4f','/storage/products/5/f8ff3453a1c645d4391a947b6b237a0d.jpg','mbtt.jpg','81717705-427f-47b0-8309-ea7e060c2335','2022-09-22 07:01:35','2022-09-22 07:01:35'),('c14e6cc9-efd8-4400-a3a0-96f8f2264493','/storage/products/5/b602e370d365f2ea954368469cbc8d7c.jpg','content_popup2.jpg','42f87cf0-db2c-4f52-9cbc-87a7d485fb89','2022-09-17 08:26:06','2022-09-17 08:26:06'),('c9cc9214-37c5-41a2-b428-d52ff4deec8d','/storage/products/5/396d16c4947a0f32e4f4fbdab0741093.png','content_popup3 - Copy.png','edf5ffbf-28b3-4241-8141-00cb2afe5e12','2022-09-19 08:07:15','2022-09-19 08:07:15'),('cf6d236f-ef05-4737-a0f7-d8d2161a105d','/storage/products/5/eee85d6257f47357acdbb81b3323685a.jpg','content_popup1.jpg','edf5ffbf-28b3-4241-8141-00cb2afe5e12','2022-09-20 07:09:51','2022-09-20 07:09:51');
/*!40000 ALTER TABLE `products_images` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `role_customers`
--

DROP TABLE IF EXISTS `role_customers`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `role_customers` (
  `id` char(36) COLLATE utf8mb4_unicode_ci NOT NULL,
  `role` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  UNIQUE KEY `role_customers_id_unique` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `role_customers`
--

LOCK TABLES `role_customers` WRITE;
/*!40000 ALTER TABLE `role_customers` DISABLE KEYS */;
INSERT INTO `role_customers` VALUES ('450bc12f-60f4-441c-986f-4395368defd3','super_vip','2022-09-23 19:58:04','2022-09-23 19:58:04'),('90116c67-a283-4c16-9e3c-a0422b918a2c','vip','2022-09-23 19:58:14','2022-09-23 19:58:14'),('a1030c95-3287-47f0-8f02-6654117674f3','normal','2022-09-23 04:50:00','2022-09-23 04:50:00');
/*!40000 ALTER TABLE `role_customers` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `roles`
--

DROP TABLE IF EXISTS `roles`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `roles` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `display_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `roles`
--

LOCK TABLES `roles` WRITE;
/*!40000 ALTER TABLE `roles` DISABLE KEYS */;
INSERT INTO `roles` VALUES (1,'admin','Admin','2022-08-22 07:34:47','2022-08-22 07:34:47'),(6,'content','Content','2022-08-25 05:38:43','2022-08-25 05:38:43'),(7,'guest','Guest','2022-08-26 07:15:35','2022-08-26 07:15:35');
/*!40000 ALTER TABLE `roles` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `settings_pages`
--

DROP TABLE IF EXISTS `settings_pages`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `settings_pages` (
  `id` char(36) COLLATE utf8mb4_unicode_ci NOT NULL,
  `config_key` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `config_value` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` int NOT NULL,
  `user_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  UNIQUE KEY `settings_pages_id_unique` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `settings_pages`
--

LOCK TABLES `settings_pages` WRITE;
/*!40000 ALTER TABLE `settings_pages` DISABLE KEYS */;
INSERT INTO `settings_pages` VALUES ('5fbdafcf-d55b-48a5-8338-e1d2be791c23','youtube_config','https://www.youtube.com/',5,'admin','2022-09-21 08:28:18','2022-09-21 08:49:14','Text'),('e1f582ce-c1b6-41b2-85c0-d1c606e15643','logo_config','/storage/setings_page/5/f8ff3453a1c645d4391a947b6b237a0d.jpg',5,'admin','2022-09-21 08:41:58','2022-09-21 08:48:27','Image'),('f8afae7e-4f0b-4f5d-9067-426ccaac2547','facebook_config','https://www.facebook.com/',5,'admin','2022-09-21 07:43:57','2022-09-21 07:43:57','Text');
/*!40000 ALTER TABLE `settings_pages` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `sliders`
--

DROP TABLE IF EXISTS `sliders`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `sliders` (
  `id` char(36) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` int NOT NULL,
  `image_path` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `image_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `user_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  UNIQUE KEY `sliders_id_unique` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `sliders`
--

LOCK TABLES `sliders` WRITE;
/*!40000 ALTER TABLE `sliders` DISABLE KEYS */;
INSERT INTO `sliders` VALUES ('0f21b4c9-0e05-43b2-a3c0-d980a281f668','dasasd','dsasad',5,'/storage/slider/5/8c0289f3d1a4a8d9098c285631aad68d.jpg','man-one.jpg','2022-09-02 08:06:44','2022-09-02 08:07:01','admin'),('7c576bd1-a361-441b-8367-a8802f6a4e7e','Slider 2 2','sadddsadsadsa',5,'/storage/slider/5/66cd3bd9d7d3dd5e3c740556b096993c.jpg','blog-one.jpg','2022-09-02 08:08:16','2022-09-07 04:53:30','admin');
/*!40000 ALTER TABLE `sliders` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `table_coupons_role_customer_relationship`
--

DROP TABLE IF EXISTS `table_coupons_role_customer_relationship`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `table_coupons_role_customer_relationship` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `coupons_id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `customer_role_id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `table_coupons_role_customer_relationship`
--

LOCK TABLES `table_coupons_role_customer_relationship` WRITE;
/*!40000 ALTER TABLE `table_coupons_role_customer_relationship` DISABLE KEYS */;
/*!40000 ALTER TABLE `table_coupons_role_customer_relationship` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `user_avatars`
--

DROP TABLE IF EXISTS `user_avatars`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `user_avatars` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `src` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `image_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `user_id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=22 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `user_avatars`
--

LOCK TABLES `user_avatars` WRITE;
/*!40000 ALTER TABLE `user_avatars` DISABLE KEYS */;
INSERT INTO `user_avatars` VALUES (10,'/storage/avartars/7/799bad5a3b514f096e69bbc4a7896cd9.jpg','3.jpg','7','2022-09-20 08:29:51','2022-09-20 08:29:51'),(11,'/storage/avartars/4/8df7b73a7820f4aef47864f2a6c5fccf.jpg','12.jpg','4','2022-09-20 08:33:10','2022-09-20 08:33:10'),(20,'/storage/avartars/8/ab4568a0a8d7987984be59cee93423f9.jpg','1450856212ca phe rang xay.jpg','8','2022-09-20 10:36:01','2022-09-20 10:36:01'),(21,'/storage/avartars/5/b06873260a7ff1a6c3e4fdf639f1e4ae.jpg','tokuda.jpg','5','2022-09-20 10:37:04','2022-09-20 10:37:04');
/*!40000 ALTER TABLE `user_avatars` ENABLE KEYS */;
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
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `password_dehash` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_email_unique` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `users`
--

LOCK TABLES `users` WRITE;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` VALUES (4,'guest','guest@gmail.com',NULL,'$2y$10$W3niPQYbAASfsB6qgt./6.3tWmoGXN34Vs7w8cn/HbPuA5UuyTikq',NULL,'2022-08-26 08:27:11','2022-09-20 08:33:10','minhman'),(5,'admin','admin@gmail.com',NULL,'$2y$10$pWN7a03JOCkzzlPK19xkdOun1t7ugdE47.cjE82jcK3inTdbSfM8u','RlxLgSRgg8Yvt5CdfkRLR6kHByXr4R6esgB8ZZGHvfXNGvT1LdWayrWxtKM6','2022-08-26 20:17:50','2022-09-20 10:37:04','minhman'),(7,'test','man@gmail.com',NULL,'$2y$10$5hFGXJDKe4aLo836cmOwYOEOuWimbOLC/dARerUC0Vu3A6Ov.IFxa',NULL,'2022-09-20 07:42:12','2022-09-20 08:35:21','minhman'),(8,'test nguyen','quangthanhliet@gmail.com',NULL,'$2y$10$qi/52OHb7iOFXp2uo4AbhOHPbE5Gqeg6gCLZIdGfm29QJNALJL7Je',NULL,'2022-09-20 08:38:31','2022-09-23 05:06:21','minhman');
/*!40000 ALTER TABLE `users` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `users_role`
--

DROP TABLE IF EXISTS `users_role`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `users_role` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `user_id` int NOT NULL,
  `role_id` int NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=20 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `users_role`
--

LOCK TABLES `users_role` WRITE;
/*!40000 ALTER TABLE `users_role` DISABLE KEYS */;
INSERT INTO `users_role` VALUES (2,3,6,NULL,NULL),(5,6,6,NULL,NULL),(6,7,6,NULL,NULL),(7,1,1,NULL,NULL),(9,8,1,NULL,NULL),(11,2,7,NULL,NULL),(12,3,1,NULL,NULL),(14,5,1,NULL,NULL),(16,4,7,NULL,NULL),(17,6,6,NULL,NULL),(18,7,7,NULL,NULL),(19,8,7,NULL,NULL);
/*!40000 ALTER TABLE `users_role` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2022-09-25  9:11:13
