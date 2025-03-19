/*
SQLyog Ultimate v13.1.1 (64 bit)
MySQL - 8.0.41-0ubuntu0.22.04.1 : Database - laravel
*********************************************************************
*/

/*!40101 SET NAMES utf8 */;

/*!40101 SET SQL_MODE=''*/;

/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;
CREATE DATABASE /*!32312 IF NOT EXISTS*/`laravel` /*!40100 DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci */ /*!80016 DEFAULT ENCRYPTION='N' */;

USE `laravel`;

/*Table structure for table `cache` */

DROP TABLE IF EXISTS `cache`;

CREATE TABLE `cache` (
  `key` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `value` mediumtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `expiration` int NOT NULL,
  PRIMARY KEY (`key`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `cache` */

/*Table structure for table `cache_locks` */

DROP TABLE IF EXISTS `cache_locks`;

CREATE TABLE `cache_locks` (
  `key` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `owner` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `expiration` int NOT NULL,
  PRIMARY KEY (`key`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `cache_locks` */

/*Table structure for table `failed_jobs` */

DROP TABLE IF EXISTS `failed_jobs`;

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

/*Data for the table `failed_jobs` */

/*Table structure for table `job_batches` */

DROP TABLE IF EXISTS `job_batches`;

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

/*Data for the table `job_batches` */

/*Table structure for table `jobs` */

DROP TABLE IF EXISTS `jobs`;

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

/*Data for the table `jobs` */

/*Table structure for table `migrations` */

DROP TABLE IF EXISTS `migrations`;

CREATE TABLE `migrations` (
  `id` int unsigned NOT NULL AUTO_INCREMENT,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `migrations` */

insert  into `migrations`(`id`,`migration`,`batch`) values 
(6,'0001_01_01_000000_create_users_table',1),
(7,'0001_01_01_000001_create_cache_table',1),
(8,'0001_01_01_000002_create_jobs_table',1),
(9,'2025_03_04_073000_profiles',1),
(10,'2025_03_12_030455_tasks',1);

/*Table structure for table `password_reset_tokens` */

DROP TABLE IF EXISTS `password_reset_tokens`;

CREATE TABLE `password_reset_tokens` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `password_reset_tokens` */

/*Table structure for table `profiles` */

DROP TABLE IF EXISTS `profiles`;

CREATE TABLE `profiles` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL COMMENT '姓名',
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL COMMENT '邮箱',
  `age` tinyint NOT NULL COMMENT '年龄',
  `info` varchar(1000) COLLATE utf8mb4_unicode_ci NOT NULL COMMENT '个人简介',
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `profiles` */

/*Table structure for table `sessions` */

DROP TABLE IF EXISTS `sessions`;

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

/*Data for the table `sessions` */

insert  into `sessions`(`id`,`user_id`,`ip_address`,`user_agent`,`payload`,`last_activity`) values 
('FhSBUfdInNkm6tMMk3MCAqWvrIHXeC5rp9QS9q8G',NULL,'127.0.0.1','Mozilla/5.0 (X11; Ubuntu; Linux x86_64; rv:136.0) Gecko/20100101 Firefox/136.0','YTozOntzOjY6Il90b2tlbiI7czo0MDoiU1RqSHhURDV6cnNXS3h2VVBvUGFPUVMzaWhxSjZmTVZ4Qk5va0prYyI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MzQ6Imh0dHA6Ly8xMjcuMC4wLjE6ODAwMC90YXNrcy9jcmVhdGUiO31zOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX19',1741832238),
('RzLo5o9oF5cEOq5cWakTW2dEdCD7rUOpGlbWJg1A',NULL,'127.0.0.1','Mozilla/5.0 (X11; Ubuntu; Linux x86_64; rv:136.0) Gecko/20100101 Firefox/136.0','YTozOntzOjY6Il90b2tlbiI7czo0MDoiTGFXWGNZSjdsZ3BGdUxIREZlclh2ZGFIZFJDY3FFVVZjcVRld0tZQiI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MzQ6Imh0dHA6Ly8xMjcuMC4wLjE6ODAwMC90YXNrcy9jcmVhdGUiO31zOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX19',1741776255),
('TSHXQjxKp8bI2E1QJ66pn0BIe9NRtlT9ZNvSYAGp',NULL,'127.0.0.1','Mozilla/5.0 (X11; Ubuntu; Linux x86_64; rv:136.0) Gecko/20100101 Firefox/136.0','YTozOntzOjY6Il90b2tlbiI7czo0MDoiMklLakI0eVYyZW9nZE1EVjh4WlpRdk5mSTEyZVJQbEF6THlCQjBqNyI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MzQ6Imh0dHA6Ly8xMjcuMC4wLjE6ODAwMC90YXNrcy9jcmVhdGUiO31zOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX19',1741831741);

/*Table structure for table `tasks` */

DROP TABLE IF EXISTS `tasks`;

CREATE TABLE `tasks` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '' COMMENT '姓名',
  `desc` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '' COMMENT '简介',
  `long_desc` varchar(1000) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '' COMMENT '长简介',
  `completed` tinyint(1) NOT NULL DEFAULT '0' COMMENT '是否完成',
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=22 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `tasks` */

insert  into `tasks`(`id`,`name`,`desc`,`long_desc`,`completed`,`created_at`,`updated_at`,`deleted_at`) values 
(1,'Non eaque quia nemo eum ex eligendi.','Officiis adipisci porro ex nobis dolores. Minus quod dolor temporibus voluptate. Distinctio voluptatem aperiam ipsum quia voluptatum veritatis. Numquam dolore aliquid non et maxime.','Ut fugiat dolorem voluptatibus dolorem sed laboriosam praesentium ipsum. Velit ratione vitae illo ut quo iusto. Illo saepe tempore aut voluptas in est voluptatem modi. Quibusdam quas voluptatum doloribus voluptas omnis adipisci. Aut et quia dolores. In sit nihil explicabo et qui architecto.',0,'2025-03-12 08:17:24','2025-03-12 08:17:24',NULL),
(2,'Officia neque saepe ducimus esse mollitia quia vero.','Et incidunt numquam ratione in. Dignissimos veritatis aut error quis culpa excepturi. Officiis non maxime illo aut consequatur quae nulla. In aut veritatis maxime pariatur hic.','Mollitia perspiciatis accusamus non dignissimos iusto blanditiis. Sit nulla voluptatem aut laborum quidem inventore. Explicabo ut ipsam harum aut molestiae. Et doloremque ut dolorem. Quo nulla odio quo non vel magni. Voluptas repellat similique laboriosam veritatis labore. Vero suscipit nulla vitae assumenda pariatur voluptas quos.',0,'2025-03-12 08:17:24','2025-03-12 08:17:24',NULL),
(3,'Voluptates minima quis nulla voluptatum voluptatem commodi doloribus.','Delectus voluptates et ea earum veniam. Exercitationem fuga expedita sapiente rem et facilis consequatur consectetur.','Eum iure eum quasi distinctio et velit corporis blanditiis. Debitis possimus ullam non nihil laborum architecto. Aspernatur harum quia atque sapiente in. Accusantium laudantium ea nam nemo quasi voluptas. Blanditiis error beatae quae.',0,'2025-03-12 08:17:24','2025-03-12 08:17:24',NULL),
(4,'Inventore consequatur rerum ut minus pariatur facere.','Voluptatum aliquam possimus maxime dicta laboriosam debitis illo quos. Mollitia vero placeat sed qui similique eligendi. Quos ipsam labore accusantium doloribus aut sit reiciendis ducimus. Eligendi dolorem mollitia blanditiis explicabo rerum.','Harum culpa at ex eligendi nulla illo eius. Consequatur mollitia sit accusamus maiores. Nesciunt qui placeat quia tenetur placeat corporis et rerum. Aut quia eum voluptas dolorem in delectus. Vel rerum voluptas earum esse in. Voluptates soluta id provident ducimus voluptates tenetur. Assumenda iusto itaque necessitatibus laboriosam. Ut aspernatur minima maxime praesentium sint.',1,'2025-03-12 08:17:24','2025-03-12 08:17:24',NULL),
(5,'Quo et magni officiis quia.','Quasi consectetur consequatur aut omnis. Numquam eligendi earum vero odio ut quaerat. Voluptas maxime quam nobis ut dolores soluta ea. Esse beatae maiores harum dolore ducimus architecto necessitatibus.','Illum iste vel similique consectetur. Repudiandae voluptatum consequuntur fuga nobis amet sapiente eos. Aut dignissimos numquam dolores quas itaque omnis fugit alias. Explicabo nostrum ad ea minus dolores ullam doloribus. Ut in quam et.',1,'2025-03-12 08:17:24','2025-03-12 08:17:24',NULL),
(6,'Libero non id itaque amet sequi asperiores eaque.','Rerum deserunt voluptas saepe sit est. Cupiditate et saepe expedita. Est ut et adipisci ipsam. Dolorum quidem aut impedit accusantium distinctio est.','Magni atque a quo facere magni atque. Ad voluptatem in numquam magnam. Aliquam doloribus veniam maiores facere vitae tempora qui. Et maxime repellat non libero in totam. Qui voluptatibus totam qui accusamus. Doloribus id vel est eveniet atque pariatur. Neque laborum ea ipsa rerum qui explicabo omnis ut.',1,'2025-03-12 08:17:24','2025-03-12 08:17:24',NULL),
(7,'Nulla commodi voluptatem consequuntur dolor eius voluptatem.','Aut corporis ut nemo adipisci voluptate. Omnis reprehenderit voluptas rem corporis. Odio debitis voluptas repellendus. Aut corporis vero necessitatibus pariatur reprehenderit aut quos.','Minima voluptatum tempora dolor non voluptatibus officia. Minus doloribus optio laboriosam tempore alias ullam labore. Harum in quas id. Earum sequi est vel ex nisi vero autem doloribus. Accusamus fugiat quia dolores deleniti praesentium. Molestiae fugiat eum enim eius molestiae molestiae aut. Qui animi inventore omnis qui similique ipsam.',0,'2025-03-12 08:17:24','2025-03-12 09:41:16',NULL),
(9,'qwe','Qui ea impedit optio ea dolorem maiores pariatur reprehenderit. Aut voluptatem doloribus dolores quae sed placeat. Ut tempora eum fuga. Recusandae magni dicta molestiae architecto et voluptas et.','Quaerat rerum quaerat quia repellat ea nihil rerum. Earum accusamus et eligendi quasi quo distinctio dolorem. Assumenda est repellat ut est repellendus tenetur praesentium. Provident aspernatur et quo quisquam debitis ut aspernatur dolore. Molestiae deserunt ex non omnis. Consequatur repellat omnis qui ut vero. Nihil tempora impedit quod iste dolore aut sed. Fuga necessitatibus facere voluptate eligendi sunt.',1,'2025-03-12 08:17:24','2025-03-13 02:12:26',NULL),
(10,'Repellat quia magni aut tempore minus nam.','Vero quasi consequatur ut unde. Nesciunt enim ea voluptatem dolorum expedita sit consectetur. Autem voluptas officia illum autem.','In corporis sint quis et molestiae. Tenetur perspiciatis perferendis quod quo est. Excepturi enim eum iste tempora iste. Voluptatem unde necessitatibus nesciunt rerum sint. Voluptas et sit laboriosam aspernatur iusto explicabo. Animi qui autem exercitationem consequuntur ratione. Illum commodi earum pariatur ex ullam unde. Aliquid temporibus qui aut sed repellat commodi dolorem.',1,'2025-03-12 08:17:24','2025-03-12 08:17:24',NULL),
(11,'Quis voluptatum cumque officiis.','Deleniti saepe sapiente doloribus veniam sed deserunt. Libero fugit fugiat dolorem neque magnam quia vel. Vel qui animi accusantium et consequatur.','Aut est est facere recusandae impedit rerum. Dolore vero atque quis necessitatibus. Odit aperiam ratione odit natus aliquam. In praesentium laborum dolores qui esse eligendi sed eius. Omnis cupiditate dolores amet omnis. Officia culpa omnis eum esse dicta facere tenetur.',0,'2025-03-12 08:20:22','2025-03-12 08:20:22',NULL),
(12,'Corporis animi blanditiis quibusdam dolores sed quis dicta.','Ab aut nihil quis magnam quos quod perspiciatis. Fuga nam consequatur qui vitae facilis nostrum ipsum. Laudantium et illo illum numquam reprehenderit.','Rerum natus autem consequuntur veniam aut vel optio. Repudiandae voluptas et mollitia non expedita repudiandae. Omnis nihil optio odit voluptates minima omnis. Libero eveniet iusto eum nobis. Expedita sed quod possimus autem dolorum vero.',0,'2025-03-12 08:20:22','2025-03-12 08:20:22',NULL),
(13,'Modi fuga ipsam quia dolor quam rerum.','Molestiae voluptatem impedit quas nostrum et quia ad. Expedita facilis ducimus est magnam consequatur soluta ut impedit. Laudantium optio est sunt. Occaecati voluptas rerum tempora sed. Excepturi porro nulla quaerat et fugit harum totam enim.','Et sit deserunt architecto. Aut molestiae id nemo consectetur assumenda. Est ut ut enim temporibus autem. Ad ut qui tenetur tempore eius. Est aliquam quas ratione expedita repellat. Quo sed soluta odio quisquam quas consequatur. Quam sint sed et. Odit voluptas ipsum possimus officiis. Delectus pariatur repellat at occaecati natus a tempore.',0,'2025-03-12 08:20:22','2025-03-12 08:20:22',NULL),
(14,'Voluptatibus voluptas quasi ut voluptatem magni est.','Corrupti quibusdam saepe aliquid maiores ad minus est. Ullam ex sit delectus. Quasi ut tenetur nulla quidem quia quia. Quaerat placeat saepe odio. Omnis quis molestias aut eum ea possimus accusamus.','Necessitatibus dolores natus dolor dolorem ut non facilis. Non explicabo quia illo et praesentium. Consequatur dolor consectetur illum rerum eveniet. Necessitatibus cupiditate doloribus dolorem explicabo quas sed sint. Et quia velit repellat sint velit. Ut quae in repudiandae vel explicabo laborum voluptas sint. Molestias aut rem error. Autem pariatur impedit rerum vel beatae modi. Vel commodi ab porro et debitis eum. Iure sunt quo excepturi et.',0,'2025-03-12 08:20:22','2025-03-12 08:20:22',NULL),
(15,'Ipsam aspernatur doloremque praesentium sed aliquam quae.','Quas est harum nulla temporibus. Aut ut quae et in. Numquam corporis aspernatur nulla. Harum incidunt porro nemo distinctio iusto ut rem.','Sed quia dicta voluptates aut ipsum. Non et commodi nulla dolores reiciendis. Mollitia ut mollitia neque ducimus libero voluptatem. Ab rerum deleniti aut enim sequi deserunt. Odio laudantium rerum quisquam dolores unde.',1,'2025-03-12 08:20:22','2025-03-12 08:20:22',NULL),
(16,'Voluptatem quia unde quisquam.','Quae et voluptatum ad illum tenetur tenetur ratione sunt. Neque eaque eligendi odio consequatur sapiente et vel. Ut velit nobis sit excepturi necessitatibus.','Architecto quia sit sit reprehenderit perspiciatis tenetur. Non rerum veritatis ex natus totam tempore. Adipisci nemo ut quia ut beatae qui laboriosam culpa. Nulla accusantium eum numquam ut dolore voluptatem est odit. Illo et deserunt laudantium ex. Expedita et sunt voluptas aut. Commodi impedit sed et veniam et amet. Veritatis non sit aut repellendus velit ad at.',0,'2025-03-12 08:20:22','2025-03-12 08:20:22',NULL),
(17,'Rerum vitae dolores est eos molestiae.','Sit sit ducimus ut expedita et perferendis. Nihil ad occaecati optio est in provident fugit maxime. Ducimus deleniti sed voluptatem sapiente nulla cupiditate itaque.','Distinctio eum velit eos iure nemo ea. Maiores reiciendis veniam itaque laborum rem dolorem ut sint. Aut excepturi voluptatibus dolorum. Tenetur et consequatur quidem in voluptatem voluptate officiis. Numquam placeat rem doloremque et.',0,'2025-03-12 08:20:22','2025-03-12 08:20:22',NULL),
(18,'Enim vitae et aperiam sit.','Natus rem qui consequuntur dignissimos ratione voluptas. Sed omnis ratione animi doloremque in harum. Mollitia ipsum libero esse similique earum qui. Incidunt doloremque dolores harum molestiae.','Consequuntur inventore praesentium est veniam reiciendis repellat. Quos eum exercitationem rem architecto dolores fugiat eligendi. A dolores dolores cum recusandae beatae adipisci dolor. Voluptates eaque ut sit fuga velit consectetur earum porro. Quia praesentium odio sed sit. Perspiciatis adipisci sit ab veritatis.',0,'2025-03-12 08:20:22','2025-03-12 08:20:22',NULL),
(19,'Qui quis culpa quis perferendis corrupti quibusdam.','Sequi similique aut nulla vel. Ab saepe impedit modi doloremque rerum accusantium voluptas. Est sapiente minus aperiam eum aliquam. Libero eos error esse numquam placeat et.','Deleniti velit ratione ut voluptatem est. Doloribus dolor et nobis ea nesciunt. Sint harum adipisci eaque voluptatem nostrum necessitatibus aut. Ipsum labore voluptatem illo amet quam maiores eligendi. Commodi quis dolor illum suscipit odit neque pariatur. Eveniet aut rem aut nulla non.',1,'2025-03-12 08:20:22','2025-03-12 08:20:22',NULL),
(20,'Quaerat natus et voluptates vel a possimus.','Iure illum optio iusto animi possimus iusto. Recusandae est repudiandae eum consequuntur mollitia ab. Consectetur quidem fugiat dicta perspiciatis.','Sunt quod dolorem non dignissimos. Voluptates vel sint blanditiis voluptas impedit. Nulla voluptates sit aliquam. Et vero et aut iusto cupiditate sunt. Fuga ut dolore facere et. Qui id aliquid facere deleniti.',1,'2025-03-12 08:20:22','2025-03-12 08:20:22',NULL);

/*Table structure for table `users` */

DROP TABLE IF EXISTS `users`;

CREATE TABLE `users` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_email_unique` (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `users` */

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
