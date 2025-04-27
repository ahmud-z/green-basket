-- -------------------------------------------------------------
-- TablePlus 6.4.4(604)
--
-- https://tableplus.com/
--
-- Database: greenbasket
-- Generation Time: 2025-04-27 10:20:03.8470
-- -------------------------------------------------------------


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;


DROP TABLE IF EXISTS `cache`;
CREATE TABLE `cache` (
  `key` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `value` mediumtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `expiration` int NOT NULL,
  PRIMARY KEY (`key`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

DROP TABLE IF EXISTS `cache_locks`;
CREATE TABLE `cache_locks` (
  `key` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `owner` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `expiration` int NOT NULL,
  PRIMARY KEY (`key`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

DROP TABLE IF EXISTS `categories`;
CREATE TABLE `categories` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `image_path` text COLLATE utf8mb4_unicode_ci,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

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

DROP TABLE IF EXISTS `migrations`;
CREATE TABLE `migrations` (
  `id` int unsigned NOT NULL AUTO_INCREMENT,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

DROP TABLE IF EXISTS `order_items`;
CREATE TABLE `order_items` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `order_id` bigint unsigned NOT NULL,
  `product_id` bigint unsigned NOT NULL,
  `price` decimal(8,2) NOT NULL,
  `quantity` int NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `order_items_order_id_foreign` (`order_id`),
  KEY `order_items_product_id_foreign` (`product_id`),
  CONSTRAINT `order_items_order_id_foreign` FOREIGN KEY (`order_id`) REFERENCES `orders` (`id`),
  CONSTRAINT `order_items_product_id_foreign` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=29 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

DROP TABLE IF EXISTS `orders`;
CREATE TABLE `orders` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `user_id` bigint unsigned NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `phone` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `address` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `city` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `state` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `zip` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `country` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `shipping_method` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `instructions` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `orders_user_id_foreign` (`user_id`),
  CONSTRAINT `orders_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

DROP TABLE IF EXISTS `password_reset_tokens`;
CREATE TABLE `password_reset_tokens` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

DROP TABLE IF EXISTS `product_images`;
CREATE TABLE `product_images` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `product_id` bigint unsigned NOT NULL,
  `path` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `product_images_product_id_foreign` (`product_id`),
  CONSTRAINT `product_images_product_id_foreign` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

DROP TABLE IF EXISTS `products`;
CREATE TABLE `products` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tags` json DEFAULT NULL,
  `category_id` bigint unsigned NOT NULL,
  `price` double NOT NULL,
  `stock_quantity` double NOT NULL DEFAULT '0',
  `image_path` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `products_category_id_foreign` (`category_id`),
  CONSTRAINT `products_category_id_foreign` FOREIGN KEY (`category_id`) REFERENCES `categories` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=81 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

DROP TABLE IF EXISTS `reviews`;
CREATE TABLE `reviews` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `product_id` bigint unsigned NOT NULL,
  `reviewer_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'Anonymous',
  `reviewer_email` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `rating` int NOT NULL,
  `content` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `reviews_product_id_foreign` (`product_id`),
  CONSTRAINT `reviews_product_id_foreign` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

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
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

INSERT INTO `categories` (`id`, `name`, `created_at`, `updated_at`, `image_path`) VALUES
(1, 'Fragrances', '2025-04-16 19:10:27', '2025-04-16 19:10:27', 'https://freepngimg.com/thumb/perfume/4-2-perfume-png-hd-thumb.png'),
(2, 'Furniture', '2025-04-16 19:10:33', '2025-04-16 19:10:33', 'https://freepngimg.com/thumb/armchair/62-armchair-png-image-thumb.png'),
(3, 'Groceries', '2025-04-16 19:10:49', '2025-04-16 19:10:49', 'https://freepngimg.com/thumb/healthy_food/9-2-healthy-food-png-picture-thumb.png'),
(4, 'Home decoration', '2025-04-16 19:10:51', '2025-04-16 19:10:51', 'https://freepngimg.com/thumb/coffee/62185-coffee-cup-tea-chocolate-machine-hot-starbucks-thumb.png'),
(5, 'Kitchen accessories', '2025-04-16 19:10:57', '2025-04-16 19:10:57', 'https://freepngimg.com/thumb/kettle/161081-kettle-silver-free-photo-thumb.png'),
(6, 'Skin care', '2025-04-16 19:11:00', '2025-04-16 19:11:00', 'https://freepngimg.com/thumb/mario/121416-mario-badescu-care-skin-png-file-hd-thumb.png'),
(7, 'Sunglasses', '2025-04-16 19:11:01', '2025-04-16 19:11:01', 'https://freepngimg.com/thumb/sunglasses/74988-goggles-sunglasses-free-download-png-hq-thumb.png');

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '0001_01_01_000000_create_users_table', 1),
(2, '0001_01_01_000001_create_cache_table', 1),
(3, '0001_01_01_000002_create_jobs_table', 1),
(4, '2025_04_16_143710_create_categories_table', 1),
(5, '2025_04_16_143718_create_products_table', 1),
(6, '2025_04_16_165814_create_product_images_table', 1),
(7, '2025_04_16_183635_create_reviews_table', 1),
(8, '2025_04_16_193457_create_orders_table', 2),
(9, '2025_04_16_193502_create_order_items_table', 2);

INSERT INTO `order_items` (`id`, `order_id`, `product_id`, `price`, `quantity`, `created_at`, `updated_at`) VALUES
(1, 3, 18, 2.99, 2, '2025-04-25 16:07:40', '2025-04-25 16:07:40'),
(2, 3, 1, 49.99, 2, '2025-04-25 16:07:40', '2025-04-25 16:07:40'),
(3, 3, 2, 129.99, 1, '2025-04-25 16:07:40', '2025-04-25 16:07:40'),
(4, 3, 15, 4.99, 2, '2025-04-25 16:07:40', '2025-04-25 16:07:40'),
(5, 3, 13, 8.99, 1, '2025-04-25 16:07:40', '2025-04-25 16:07:40'),
(6, 3, 12, 12.99, 2, '2025-04-25 16:07:40', '2025-04-25 16:07:40'),
(7, 4, 18, 2.99, 2, '2025-04-25 16:07:42', '2025-04-25 16:07:42'),
(8, 4, 1, 49.99, 2, '2025-04-25 16:07:42', '2025-04-25 16:07:42'),
(9, 4, 2, 129.99, 1, '2025-04-25 16:07:42', '2025-04-25 16:07:42'),
(10, 4, 15, 4.99, 2, '2025-04-25 16:07:42', '2025-04-25 16:07:42'),
(11, 4, 13, 8.99, 1, '2025-04-25 16:07:42', '2025-04-25 16:07:42'),
(12, 4, 12, 12.99, 2, '2025-04-25 16:07:42', '2025-04-25 16:07:42'),
(13, 5, 18, 2.99, 2, '2025-04-25 16:07:53', '2025-04-25 16:07:53'),
(14, 5, 1, 49.99, 2, '2025-04-25 16:07:53', '2025-04-25 16:07:53'),
(15, 5, 2, 129.99, 1, '2025-04-25 16:07:53', '2025-04-25 16:07:53'),
(16, 5, 15, 4.99, 2, '2025-04-25 16:07:53', '2025-04-25 16:07:53'),
(17, 5, 13, 8.99, 1, '2025-04-25 16:07:53', '2025-04-25 16:07:53'),
(18, 5, 12, 12.99, 2, '2025-04-25 16:07:53', '2025-04-25 16:07:53'),
(19, 6, 18, 2.99, 2, '2025-04-25 16:07:57', '2025-04-25 16:07:57'),
(20, 6, 1, 49.99, 2, '2025-04-25 16:07:57', '2025-04-25 16:07:57'),
(21, 6, 2, 129.99, 1, '2025-04-25 16:07:57', '2025-04-25 16:07:57'),
(22, 6, 15, 4.99, 2, '2025-04-25 16:07:57', '2025-04-25 16:07:57'),
(23, 6, 13, 8.99, 1, '2025-04-25 16:07:57', '2025-04-25 16:07:57'),
(24, 6, 12, 12.99, 2, '2025-04-25 16:07:57', '2025-04-25 16:07:57'),
(25, 7, 12, 12.99, 1, '2025-04-25 16:22:01', '2025-04-25 16:22:01'),
(26, 8, 1, 49.99, 3, '2025-04-25 16:27:25', '2025-04-25 16:27:25'),
(27, 8, 2, 129.99, 1, '2025-04-25 16:27:25', '2025-04-25 16:27:25'),
(28, 8, 3, 89.99, 1, '2025-04-25 16:27:25', '2025-04-25 16:27:25');

INSERT INTO `orders` (`id`, `user_id`, `email`, `phone`, `name`, `address`, `city`, `state`, `zip`, `country`, `shipping_method`, `instructions`, `created_at`, `updated_at`) VALUES
(1, 5, 'tevyf@mailinator.com', '+1 (239) 661-1429', 'Yardley Stone', 'Exercitationem accus', 'Praesentium hic dign', 'CT', '61658', 'UK', 'standard', 'Non eos nisi ipsam n', '2025-04-25 16:07:30', '2025-04-25 16:07:30'),
(2, 5, 'tevyf@mailinator.com', '+1 (239) 661-1429', 'Yardley Stone', 'Exercitationem accus', 'Praesentium hic dign', 'CT', '61658', 'UK', 'standard', 'Non eos nisi ipsam n', '2025-04-25 16:07:32', '2025-04-25 16:07:32'),
(3, 5, 'tevyf@mailinator.com', '+1 (239) 661-1429', 'Yardley Stone', 'Exercitationem accus', 'Praesentium hic dign', 'CT', '61658', 'UK', 'standard', 'Non eos nisi ipsam n', '2025-04-25 16:07:40', '2025-04-25 16:07:40'),
(4, 5, 'tevyf@mailinator.com', '+1 (239) 661-1429', 'Yardley Stone', 'Exercitationem accus', 'Praesentium hic dign', 'CT', '61658', 'UK', 'standard', 'Non eos nisi ipsam n', '2025-04-25 16:07:42', '2025-04-25 16:07:42'),
(5, 5, 'tevyf@mailinator.com', '+1 (239) 661-1429', 'Yardley Stone', 'Exercitationem accus', 'Praesentium hic dign', 'CT', '61658', 'UK', 'standard', 'Non eos nisi ipsam n', '2025-04-25 16:07:53', '2025-04-25 16:07:53'),
(6, 5, 'tevyf@mailinator.com', '+1 (239) 661-1429', 'Yardley Stone', 'Exercitationem accus', 'Praesentium hic dign', 'CT', '61658', 'UK', 'standard', 'Non eos nisi ipsam n', '2025-04-25 16:07:57', '2025-04-25 16:07:57'),
(7, 5, 'zalibyb@mailinator.com', '+1 (579) 665-8403', 'Natalie Richard', 'Similique perferendi', 'Blanditiis sint sunt', 'CO', '80608', 'US', 'standard', 'Anim velit voluptate', '2025-04-25 16:22:01', '2025-04-25 16:22:01'),
(8, 5, 'byhow@mailinator.com', '+1 (816) 994-9173', 'Leandra Wood', 'Fugiat dignissimos m', 'Id magni culpa repr', 'CO', '55166', 'CA', 'standard', 'Nam sint provident', '2025-04-25 16:27:25', '2025-04-25 16:27:25');

INSERT INTO `products` (`id`, `name`, `tags`, `category_id`, `price`, `stock_quantity`, `image_path`, `description`, `created_at`, `updated_at`) VALUES
(1, 'Calvin Klein CK One', '[\"fragrances\", \"perfumes\"]', 1, 49.99, 17, 'https://cdn.dummyjson.com/products/images/fragrances/Calvin%20Klein%20CK%20One/thumbnail.png', 'CK One by Calvin Klein is a classic unisex fragrance, known for its fresh and clean scent. It\'s a versatile fragrance suitable for everyday wear.', '2025-04-16 19:10:27', '2025-04-16 19:10:27'),
(2, 'Chanel Coco Noir Eau De', '[\"fragrances\", \"perfumes\"]', 1, 129.99, 41, 'https://cdn.dummyjson.com/products/images/fragrances/Chanel%20Coco%20Noir%20Eau%20De/thumbnail.png', 'Coco Noir by Chanel is an elegant and mysterious fragrance, featuring notes of grapefruit, rose, and sandalwood. Perfect for evening occasions.', '2025-04-16 19:10:27', '2025-04-16 19:10:27'),
(3, 'Dior J\'adore', '[\"fragrances\", \"perfumes\"]', 1, 89.99, 91, 'https://cdn.dummyjson.com/products/images/fragrances/Dior%20J\'adore/thumbnail.png', 'J\'adore by Dior is a luxurious and floral fragrance, known for its blend of ylang-ylang, rose, and jasmine. It embodies femininity and sophistication.', '2025-04-16 19:10:27', '2025-04-16 19:10:27'),
(4, 'Dolce Shine Eau de', '[\"fragrances\", \"perfumes\"]', 1, 69.99, 3, 'https://cdn.dummyjson.com/products/images/fragrances/Dolce%20Shine%20Eau%20de/thumbnail.png', 'Dolce Shine by Dolce & Gabbana is a vibrant and fruity fragrance, featuring notes of mango, jasmine, and blonde woods. It\'s a joyful and youthful scent.', '2025-04-16 19:10:27', '2025-04-16 19:10:27'),
(5, 'Gucci Bloom Eau de', '[\"fragrances\", \"perfumes\"]', 1, 79.99, 93, 'https://cdn.dummyjson.com/products/images/fragrances/Gucci%20Bloom%20Eau%20de/thumbnail.png', 'Gucci Bloom by Gucci is a floral and captivating fragrance, with notes of tuberose, jasmine, and Rangoon creeper. It\'s a modern and romantic scent.', '2025-04-16 19:10:27', '2025-04-16 19:10:27'),
(6, 'Annibale Colombo Bed', '[\"furniture\", \"beds\"]', 2, 1899.99, 47, 'https://cdn.dummyjson.com/products/images/furniture/Annibale%20Colombo%20Bed/thumbnail.png', 'The Annibale Colombo Bed is a luxurious and elegant bed frame, crafted with high-quality materials for a comfortable and stylish bedroom.', '2025-04-16 19:10:33', '2025-04-16 19:10:33'),
(7, 'Annibale Colombo Sofa', '[\"furniture\", \"sofas\"]', 2, 2499.99, 16, 'https://cdn.dummyjson.com/products/images/furniture/Annibale%20Colombo%20Sofa/thumbnail.png', 'The Annibale Colombo Sofa is a sophisticated and comfortable seating option, featuring exquisite design and premium upholstery for your living room.', '2025-04-16 19:10:33', '2025-04-16 19:10:33'),
(8, 'Bedside Table African Cherry', '[\"furniture\", \"bedside tables\"]', 2, 299.99, 16, 'https://cdn.dummyjson.com/products/images/furniture/Bedside%20Table%20African%20Cherry/thumbnail.png', 'The Bedside Table in African Cherry is a stylish and functional addition to your bedroom, providing convenient storage space and a touch of elegance.', '2025-04-16 19:10:33', '2025-04-16 19:10:33'),
(9, 'Knoll Saarinen Executive Conference Chair', '[\"furniture\", \"office chairs\"]', 2, 499.99, 47, 'https://cdn.dummyjson.com/products/images/furniture/Knoll%20Saarinen%20Executive%20Conference%20Chair/thumbnail.png', 'The Knoll Saarinen Executive Conference Chair is a modern and ergonomic chair, perfect for your office or conference room with its timeless design.', '2025-04-16 19:10:33', '2025-04-16 19:10:33'),
(10, 'Wooden Bathroom Sink With Mirror', '[\"furniture\", \"bathroom\"]', 2, 799.99, 95, 'https://cdn.dummyjson.com/products/images/furniture/Wooden%20Bathroom%20Sink%20With%20Mirror/thumbnail.png', 'The Wooden Bathroom Sink with Mirror is a unique and stylish addition to your bathroom, featuring a wooden sink countertop and a matching mirror.', '2025-04-16 19:10:33', '2025-04-16 19:10:33'),
(11, 'Apple', '[\"fruits\"]', 3, 1.99, 9, 'https://cdn.dummyjson.com/products/images/groceries/Apple/thumbnail.png', 'Fresh and crisp apples, perfect for snacking or incorporating into various recipes.', '2025-04-16 19:10:49', '2025-04-16 19:10:49'),
(12, 'Beef Steak', '[\"meat\"]', 3, 12.99, 96, 'https://cdn.dummyjson.com/products/images/groceries/Beef%20Steak/thumbnail.png', 'High-quality beef steak, great for grilling or cooking to your preferred level of doneness.', '2025-04-16 19:10:49', '2025-04-16 19:10:49'),
(13, 'Cat Food', '[\"pet supplies\", \"cat food\"]', 3, 8.99, 13, 'https://cdn.dummyjson.com/products/images/groceries/Cat%20Food/thumbnail.png', 'Nutritious cat food formulated to meet the dietary needs of your feline friend.', '2025-04-16 19:10:49', '2025-04-16 19:10:49'),
(14, 'Chicken Meat', '[\"meat\"]', 3, 9.99, 69, 'https://cdn.dummyjson.com/products/images/groceries/Chicken%20Meat/thumbnail.png', 'Fresh and tender chicken meat, suitable for various culinary preparations.', '2025-04-16 19:10:49', '2025-04-16 19:10:49'),
(15, 'Cooking Oil', '[\"cooking essentials\"]', 3, 4.99, 22, 'https://cdn.dummyjson.com/products/images/groceries/Cooking%20Oil/thumbnail.png', 'Versatile cooking oil suitable for frying, sautéing, and various culinary applications.', '2025-04-16 19:10:49', '2025-04-16 19:10:49'),
(16, 'Cucumber', '[\"vegetables\"]', 3, 1.49, 22, 'https://cdn.dummyjson.com/products/images/groceries/Cucumber/thumbnail.png', 'Crisp and hydrating cucumbers, ideal for salads, snacks, or as a refreshing side.', '2025-04-16 19:10:49', '2025-04-16 19:10:49'),
(17, 'Dog Food', '[\"pet supplies\", \"dog food\"]', 3, 10.99, 40, 'https://cdn.dummyjson.com/products/images/groceries/Dog%20Food/thumbnail.png', 'Specially formulated dog food designed to provide essential nutrients for your canine companion.', '2025-04-16 19:10:49', '2025-04-16 19:10:49'),
(18, 'Eggs', '[\"dairy\"]', 3, 2.99, 10, 'https://cdn.dummyjson.com/products/images/groceries/Eggs/thumbnail.png', 'Fresh eggs, a versatile ingredient for baking, cooking, or breakfast.', '2025-04-16 19:10:49', '2025-04-16 19:10:49'),
(19, 'Fish Steak', '[\"seafood\"]', 3, 14.99, 99, 'https://cdn.dummyjson.com/products/images/groceries/Fish%20Steak/thumbnail.png', 'Quality fish steak, suitable for grilling, baking, or pan-searing.', '2025-04-16 19:10:49', '2025-04-16 19:10:49'),
(20, 'Green Bell Pepper', '[\"vegetables\"]', 3, 1.29, 89, 'https://cdn.dummyjson.com/products/images/groceries/Green%20Bell%20Pepper/thumbnail.png', 'Fresh and vibrant green bell pepper, perfect for adding color and flavor to your dishes.', '2025-04-16 19:10:49', '2025-04-16 19:10:49'),
(21, 'Green Chili Pepper', '[\"vegetables\"]', 3, 0.99, 8, 'https://cdn.dummyjson.com/products/images/groceries/Green%20Chili%20Pepper/thumbnail.png', 'Spicy green chili pepper, ideal for adding heat to your favorite recipes.', '2025-04-16 19:10:49', '2025-04-16 19:10:49'),
(22, 'Honey Jar', '[\"condiments\"]', 3, 6.99, 25, 'https://cdn.dummyjson.com/products/images/groceries/Honey%20Jar/thumbnail.png', 'Pure and natural honey in a convenient jar, perfect for sweetening beverages or drizzling over food.', '2025-04-16 19:10:49', '2025-04-16 19:10:49'),
(23, 'Ice Cream', '[\"desserts\"]', 3, 5.49, 76, 'https://cdn.dummyjson.com/products/images/groceries/Ice%20Cream/thumbnail.png', 'Creamy and delicious ice cream, available in various flavors for a delightful treat.', '2025-04-16 19:10:49', '2025-04-16 19:10:49'),
(24, 'Juice', '[\"beverages\"]', 3, 3.99, 99, 'https://cdn.dummyjson.com/products/images/groceries/Juice/thumbnail.png', 'Refreshing fruit juice, packed with vitamins and great for staying hydrated.', '2025-04-16 19:10:49', '2025-04-16 19:10:49'),
(25, 'Kiwi', '[\"fruits\"]', 3, 2.49, 1, 'https://cdn.dummyjson.com/products/images/groceries/Kiwi/thumbnail.png', 'Nutrient-rich kiwi, perfect for snacking or adding a tropical twist to your dishes.', '2025-04-16 19:10:49', '2025-04-16 19:10:49'),
(26, 'Lemon', '[\"fruits\"]', 3, 0.79, 0, 'https://cdn.dummyjson.com/products/images/groceries/Lemon/thumbnail.png', 'Zesty and tangy lemons, versatile for cooking, baking, or making refreshing beverages.', '2025-04-16 19:10:49', '2025-04-16 19:10:49'),
(27, 'Milk', '[\"dairy\"]', 3, 3.49, 57, 'https://cdn.dummyjson.com/products/images/groceries/Milk/thumbnail.png', 'Fresh and nutritious milk, a staple for various recipes and daily consumption.', '2025-04-16 19:10:49', '2025-04-16 19:10:49'),
(28, 'Mulberry', '[\"fruits\"]', 3, 4.99, 79, 'https://cdn.dummyjson.com/products/images/groceries/Mulberry/thumbnail.png', 'Sweet and juicy mulberries, perfect for snacking or adding to desserts and cereals.', '2025-04-16 19:10:49', '2025-04-16 19:10:49'),
(29, 'Nescafe Coffee', '[\"beverages\", \"coffee\"]', 3, 7.99, 22, 'https://cdn.dummyjson.com/products/images/groceries/Nescafe%20Coffee/thumbnail.png', 'Quality coffee from Nescafe, available in various blends for a rich and satisfying cup.', '2025-04-16 19:10:49', '2025-04-16 19:10:49'),
(30, 'Potatoes', '[\"vegetables\"]', 3, 2.29, 8, 'https://cdn.dummyjson.com/products/images/groceries/Potatoes/thumbnail.png', 'Versatile and starchy potatoes, great for roasting, mashing, or as a side dish.', '2025-04-16 19:10:49', '2025-04-16 19:10:49'),
(31, 'Protein Powder', '[\"health supplements\"]', 3, 19.99, 65, 'https://cdn.dummyjson.com/products/images/groceries/Protein%20Powder/thumbnail.png', 'Nutrient-packed protein powder, ideal for supplementing your diet with essential proteins.', '2025-04-16 19:10:49', '2025-04-16 19:10:49'),
(32, 'Red Onions', '[\"vegetables\"]', 3, 1.99, 86, 'https://cdn.dummyjson.com/products/images/groceries/Red%20Onions/thumbnail.png', 'Flavorful and aromatic red onions, perfect for adding depth to your savory dishes.', '2025-04-16 19:10:49', '2025-04-16 19:10:49'),
(33, 'Rice', '[\"grains\"]', 3, 5.99, 49, 'https://cdn.dummyjson.com/products/images/groceries/Rice/thumbnail.png', 'High-quality rice, a staple for various cuisines and a versatile base for many dishes.', '2025-04-16 19:10:49', '2025-04-16 19:10:49'),
(34, 'Soft Drinks', '[\"beverages\"]', 3, 1.99, 78, 'https://cdn.dummyjson.com/products/images/groceries/Soft%20Drinks/thumbnail.png', 'Assorted soft drinks in various flavors, perfect for refreshing beverages.', '2025-04-16 19:10:49', '2025-04-16 19:10:49'),
(35, 'Strawberry', '[\"fruits\"]', 3, 3.99, 9, 'https://cdn.dummyjson.com/products/images/groceries/Strawberry/thumbnail.png', 'Sweet and succulent strawberries, great for snacking, desserts, or blending into smoothies.', '2025-04-16 19:10:49', '2025-04-16 19:10:49'),
(36, 'Tissue Paper Box', '[\"household essentials\"]', 3, 2.49, 97, 'https://cdn.dummyjson.com/products/images/groceries/Tissue%20Paper%20Box/thumbnail.png', 'Convenient tissue paper box for everyday use, providing soft and absorbent tissues.', '2025-04-16 19:10:49', '2025-04-16 19:10:49'),
(37, 'Water', '[\"beverages\"]', 3, 0.99, 95, 'https://cdn.dummyjson.com/products/images/groceries/Water/thumbnail.png', 'Pure and refreshing bottled water, essential for staying hydrated throughout the day.', '2025-04-16 19:10:49', '2025-04-16 19:10:49'),
(38, 'Decoration Swing', '[\"home decor\", \"swing\"]', 4, 59.99, 62, 'https://cdn.dummyjson.com/products/images/home-decoration/Decoration%20Swing/thumbnail.png', 'The Decoration Swing is a charming addition to your home decor. Crafted with intricate details, it adds a touch of elegance and whimsy to any room.', '2025-04-16 19:10:51', '2025-04-16 19:10:51'),
(39, 'Family Tree Photo Frame', '[\"home decor\", \"photo frame\"]', 4, 29.99, 34, 'https://cdn.dummyjson.com/products/images/home-decoration/Family%20Tree%20Photo%20Frame/thumbnail.png', 'The Family Tree Photo Frame is a sentimental and stylish way to display your cherished family memories. With multiple photo slots, it tells the story of your loved ones.', '2025-04-16 19:10:51', '2025-04-16 19:10:51'),
(40, 'House Showpiece Plant', '[\"home decor\", \"artificial plants\"]', 4, 39.99, 89, 'https://cdn.dummyjson.com/products/images/home-decoration/House%20Showpiece%20Plant/thumbnail.png', 'The House Showpiece Plant is an artificial plant that brings a touch of nature to your home without the need for maintenance. It adds greenery and style to any space.', '2025-04-16 19:10:51', '2025-04-16 19:10:51'),
(41, 'Plant Pot', '[\"home decor\", \"plant accessories\"]', 4, 14.99, 70, 'https://cdn.dummyjson.com/products/images/home-decoration/Plant%20Pot/thumbnail.png', 'The Plant Pot is a stylish container for your favorite plants. With a sleek design, it complements your indoor or outdoor garden, adding a modern touch to your plant display.', '2025-04-16 19:10:51', '2025-04-16 19:10:51'),
(42, 'Table Lamp', '[\"home decor\", \"lighting\"]', 4, 49.99, 84, 'https://cdn.dummyjson.com/products/images/home-decoration/Table%20Lamp/thumbnail.png', 'The Table Lamp is a functional and decorative lighting solution for your living space. With a modern design, it provides both ambient and task lighting, enhancing the atmosphere.', '2025-04-16 19:10:51', '2025-04-16 19:10:51'),
(43, 'Bamboo Spatula', '[\"kitchen tools\", \"utensils\"]', 5, 7.99, 0, 'https://cdn.dummyjson.com/products/images/kitchen-accessories/Bamboo%20Spatula/thumbnail.png', 'The Bamboo Spatula is a versatile kitchen tool made from eco-friendly bamboo. Ideal for flipping, stirring, and serving various dishes.', '2025-04-16 19:10:57', '2025-04-16 19:10:57'),
(44, 'Black Aluminium Cup', '[\"drinkware\", \"cups\"]', 5, 5.99, 42, 'https://cdn.dummyjson.com/products/images/kitchen-accessories/Black%20Aluminium%20Cup/thumbnail.png', 'The Black Aluminium Cup is a stylish and durable cup suitable for both hot and cold beverages. Its sleek black design adds a modern touch to your drinkware collection.', '2025-04-16 19:10:57', '2025-04-16 19:10:57'),
(45, 'Black Whisk', '[\"kitchen tools\", \"utensils\"]', 5, 9.99, 17, 'https://cdn.dummyjson.com/products/images/kitchen-accessories/Black%20Whisk/thumbnail.png', 'The Black Whisk is a kitchen essential for whisking and beating ingredients. Its ergonomic handle and sleek design make it a practical and stylish tool.', '2025-04-16 19:10:57', '2025-04-16 19:10:57'),
(46, 'Boxed Blender', '[\"kitchen appliances\", \"blenders\"]', 5, 39.99, 81, 'https://cdn.dummyjson.com/products/images/kitchen-accessories/Boxed%20Blender/thumbnail.png', 'The Boxed Blender is a powerful and compact blender perfect for smoothies, shakes, and more. Its convenient design and multiple functions make it a versatile kitchen appliance.', '2025-04-16 19:10:57', '2025-04-16 19:10:57'),
(47, 'Carbon Steel Wok', '[\"cookware\", \"woks\"]', 5, 29.99, 2, 'https://cdn.dummyjson.com/products/images/kitchen-accessories/Carbon%20Steel%20Wok/thumbnail.png', 'The Carbon Steel Wok is a versatile cooking pan suitable for stir-frying, sautéing, and deep frying. Its sturdy construction ensures even heat distribution for delicious meals.', '2025-04-16 19:10:57', '2025-04-16 19:10:57'),
(48, 'Chopping Board', '[\"kitchen tools\", \"cutting boards\"]', 5, 12.99, 53, 'https://cdn.dummyjson.com/products/images/kitchen-accessories/Chopping%20Board/thumbnail.png', 'The Chopping Board is an essential kitchen accessory for food preparation. Made from durable material, it provides a safe and hygienic surface for cutting and chopping.', '2025-04-16 19:10:57', '2025-04-16 19:10:57'),
(49, 'Citrus Squeezer Yellow', '[\"kitchen tools\", \"juicers\"]', 5, 8.99, 59, 'https://cdn.dummyjson.com/products/images/kitchen-accessories/Citrus%20Squeezer%20Yellow/thumbnail.png', 'The Citrus Squeezer in Yellow is a handy tool for extracting juice from citrus fruits. Its vibrant color adds a cheerful touch to your kitchen gadgets.', '2025-04-16 19:10:57', '2025-04-16 19:10:57'),
(50, 'Egg Slicer', '[\"kitchen tools\", \"slicers\"]', 5, 6.99, 30, 'https://cdn.dummyjson.com/products/images/kitchen-accessories/Egg%20Slicer/thumbnail.png', 'The Egg Slicer is a convenient tool for slicing boiled eggs evenly. It\'s perfect for salads, sandwiches, and other dishes where sliced eggs are desired.', '2025-04-16 19:10:57', '2025-04-16 19:10:57'),
(51, 'Electric Stove', '[\"kitchen appliances\", \"cooktops\"]', 5, 49.99, 41, 'https://cdn.dummyjson.com/products/images/kitchen-accessories/Electric%20Stove/thumbnail.png', 'The Electric Stove provides a portable and efficient cooking solution. Ideal for small kitchens or as an additional cooking surface for various culinary needs.', '2025-04-16 19:10:57', '2025-04-16 19:10:57'),
(52, 'Fine Mesh Strainer', '[\"kitchen tools\", \"strainers\"]', 5, 9.99, 13, 'https://cdn.dummyjson.com/products/images/kitchen-accessories/Fine%20Mesh%20Strainer/thumbnail.png', 'The Fine Mesh Strainer is a versatile tool for straining liquids and sifting dry ingredients. Its fine mesh ensures efficient filtering for smooth cooking and baking.', '2025-04-16 19:10:57', '2025-04-16 19:10:57'),
(53, 'Fork', '[\"kitchen tools\", \"utensils\"]', 5, 3.99, 10, 'https://cdn.dummyjson.com/products/images/kitchen-accessories/Fork/thumbnail.png', 'The Fork is a classic utensil for various dining and serving purposes. Its durable and ergonomic design makes it a reliable choice for everyday use.', '2025-04-16 19:10:57', '2025-04-16 19:10:57'),
(54, 'Glass', '[\"drinkware\", \"glasses\"]', 5, 4.99, 68, 'https://cdn.dummyjson.com/products/images/kitchen-accessories/Glass/thumbnail.png', 'The Glass is a versatile and elegant drinking vessel suitable for a variety of beverages. Its clear design allows you to enjoy the colors and textures of your drinks.', '2025-04-16 19:10:57', '2025-04-16 19:10:57'),
(55, 'Grater Black', '[\"kitchen tools\", \"graters\"]', 5, 10.99, 80, 'https://cdn.dummyjson.com/products/images/kitchen-accessories/Grater%20Black/thumbnail.png', 'The Grater in Black is a handy kitchen tool for grating cheese, vegetables, and more. Its sleek design and sharp blades make food preparation efficient and easy.', '2025-04-16 19:10:57', '2025-04-16 19:10:57'),
(56, 'Hand Blender', '[\"kitchen appliances\", \"blenders\"]', 5, 34.99, 8, 'https://cdn.dummyjson.com/products/images/kitchen-accessories/Hand%20Blender/thumbnail.png', 'The Hand Blender is a versatile kitchen appliance for blending, pureeing, and mixing. Its compact design and powerful motor make it a convenient tool for various recipes.', '2025-04-16 19:10:57', '2025-04-16 19:10:57'),
(57, 'Ice Cube Tray', '[\"kitchen tools\", \"ice cube trays\"]', 5, 5.99, 81, 'https://cdn.dummyjson.com/products/images/kitchen-accessories/Ice%20Cube%20Tray/thumbnail.png', 'The Ice Cube Tray is a practical accessory for making ice cubes in various shapes. Perfect for keeping your drinks cool and adding a fun element to your beverages.', '2025-04-16 19:10:57', '2025-04-16 19:10:57'),
(58, 'Kitchen Sieve', '[\"kitchen tools\", \"strainers\"]', 5, 7.99, 33, 'https://cdn.dummyjson.com/products/images/kitchen-accessories/Kitchen%20Sieve/thumbnail.png', 'The Kitchen Sieve is a versatile tool for sifting and straining dry and wet ingredients. Its fine mesh design ensures smooth results in your cooking and baking.', '2025-04-16 19:10:57', '2025-04-16 19:10:57'),
(59, 'Knife', '[\"kitchen tools\", \"cutlery\"]', 5, 14.99, 59, 'https://cdn.dummyjson.com/products/images/kitchen-accessories/Knife/thumbnail.png', 'The Knife is an essential kitchen tool for chopping, slicing, and dicing. Its sharp blade and ergonomic handle make it a reliable choice for food preparation.', '2025-04-16 19:10:57', '2025-04-16 19:10:57'),
(60, 'Lunch Box', '[\"kitchen tools\", \"storage\"]', 5, 12.99, 26, 'https://cdn.dummyjson.com/products/images/kitchen-accessories/Lunch%20Box/thumbnail.png', 'The Lunch Box is a convenient and portable container for packing and carrying your meals. With compartments for different foods, it\'s perfect for on-the-go dining.', '2025-04-16 19:10:57', '2025-04-16 19:10:57'),
(61, 'Microwave Oven', '[\"kitchen appliances\", \"microwaves\"]', 5, 89.99, 27, 'https://cdn.dummyjson.com/products/images/kitchen-accessories/Microwave%20Oven/thumbnail.png', 'The Microwave Oven is a versatile kitchen appliance for quick and efficient cooking, reheating, and defrosting. Its compact size makes it suitable for various kitchen setups.', '2025-04-16 19:10:57', '2025-04-16 19:10:57'),
(62, 'Mug Tree Stand', '[\"kitchen tools\", \"organization\"]', 5, 15.99, 93, 'https://cdn.dummyjson.com/products/images/kitchen-accessories/Mug%20Tree%20Stand/thumbnail.png', 'The Mug Tree Stand is a stylish and space-saving solution for organizing your mugs. Keep your favorite mugs easily accessible and neatly displayed in your kitchen.', '2025-04-16 19:10:57', '2025-04-16 19:10:57'),
(63, 'Pan', '[\"cookware\", \"pans\"]', 5, 24.99, 40, 'https://cdn.dummyjson.com/products/images/kitchen-accessories/Pan/thumbnail.png', 'The Pan is a versatile and essential cookware item for frying, sautéing, and cooking various dishes. Its non-stick coating ensures easy food release and cleanup.', '2025-04-16 19:10:57', '2025-04-16 19:10:57'),
(64, 'Plate', '[\"dinnerware\", \"plates\"]', 5, 3.99, 30, 'https://cdn.dummyjson.com/products/images/kitchen-accessories/Plate/thumbnail.png', 'The Plate is a classic and essential dishware item for serving meals. Its durable and stylish design makes it suitable for everyday use or special occasions.', '2025-04-16 19:10:57', '2025-04-16 19:10:57'),
(65, 'Red Tongs', '[\"kitchen tools\", \"tongs\"]', 5, 6.99, 15, 'https://cdn.dummyjson.com/products/images/kitchen-accessories/Red%20Tongs/thumbnail.png', 'The Red Tongs are versatile kitchen tongs suitable for various cooking and serving tasks. Their vibrant color adds a pop of excitement to your kitchen utensils.', '2025-04-16 19:10:57', '2025-04-16 19:10:57'),
(66, 'Silver Pot With Glass Cap', '[\"cookware\", \"pots\"]', 5, 39.99, 37, 'https://cdn.dummyjson.com/products/images/kitchen-accessories/Silver%20Pot%20With%20Glass%20Cap/thumbnail.png', 'The Silver Pot with Glass Cap is a stylish and functional cookware item for boiling, simmering, and preparing delicious meals. Its glass cap allows you to monitor cooking progress.', '2025-04-16 19:10:57', '2025-04-16 19:10:57'),
(67, 'Slotted Turner', '[\"kitchen tools\", \"turners\"]', 5, 8.99, 36, 'https://cdn.dummyjson.com/products/images/kitchen-accessories/Slotted%20Turner/thumbnail.png', 'The Slotted Turner is a kitchen utensil designed for flipping and turning food items. Its slotted design allows excess liquid to drain, making it ideal for frying and sautéing.', '2025-04-16 19:10:57', '2025-04-16 19:10:57'),
(68, 'Spice Rack', '[\"kitchen tools\", \"organization\"]', 5, 19.99, 24, 'https://cdn.dummyjson.com/products/images/kitchen-accessories/Spice%20Rack/thumbnail.png', 'The Spice Rack is a convenient organizer for your spices and seasonings. Keep your kitchen essentials within reach and neatly arranged with this stylish spice rack.', '2025-04-16 19:10:57', '2025-04-16 19:10:57'),
(69, 'Spoon', '[\"kitchen tools\", \"utensils\"]', 5, 4.99, 51, 'https://cdn.dummyjson.com/products/images/kitchen-accessories/Spoon/thumbnail.png', 'The Spoon is a versatile kitchen utensil for stirring, serving, and tasting. Its ergonomic design and durable construction make it an essential tool for every kitchen.', '2025-04-16 19:10:58', '2025-04-16 19:10:58'),
(70, 'Tray', '[\"serveware\", \"trays\"]', 5, 16.99, 48, 'https://cdn.dummyjson.com/products/images/kitchen-accessories/Tray/thumbnail.png', 'The Tray is a functional and decorative item for serving snacks, appetizers, or drinks. Its stylish design makes it a versatile accessory for entertaining guests.', '2025-04-16 19:10:58', '2025-04-16 19:10:58'),
(71, 'Wooden Rolling Pin', '[\"kitchen tools\", \"baking\"]', 5, 11.99, 80, 'https://cdn.dummyjson.com/products/images/kitchen-accessories/Wooden%20Rolling%20Pin/thumbnail.png', 'The Wooden Rolling Pin is a classic kitchen tool for rolling out dough for baking. Its smooth surface and sturdy handles make it easy to achieve uniform thickness.', '2025-04-16 19:10:58', '2025-04-16 19:10:58'),
(72, 'Yellow Peeler', '[\"kitchen tools\", \"peelers\"]', 5, 5.99, 86, 'https://cdn.dummyjson.com/products/images/kitchen-accessories/Yellow%20Peeler/thumbnail.png', 'The Yellow Peeler is a handy tool for peeling fruits and vegetables with ease. Its bright yellow color adds a cheerful touch to your kitchen gadgets.', '2025-04-16 19:10:58', '2025-04-16 19:10:58'),
(73, 'Attitude Super Leaves Hand Soap', '[\"personal care\", \"hand soap\"]', 6, 8.99, 98, 'https://cdn.dummyjson.com/products/images/skin-care/Attitude%20Super%20Leaves%20Hand%20Soap/thumbnail.png', 'Attitude Super Leaves Hand Soap is a natural and nourishing hand soap enriched with the goodness of super leaves. It cleanses and moisturizes your hands, leaving them feeling fresh and soft.', '2025-04-16 19:11:00', '2025-04-16 19:11:00'),
(74, 'Olay Ultra Moisture Shea Butter Body Wash', '[\"personal care\", \"body wash\"]', 6, 12.99, 43, 'https://cdn.dummyjson.com/products/images/skin-care/Olay%20Ultra%20Moisture%20Shea%20Butter%20Body%20Wash/thumbnail.png', 'Olay Ultra Moisture Shea Butter Body Wash is a luxurious body wash that hydrates and nourishes your skin with the moisturizing power of shea butter. Enjoy a rich lather and silky-smooth skin.', '2025-04-16 19:11:00', '2025-04-16 19:11:00'),
(75, 'Vaseline Men Body and Face Lotion', '[\"personal care\", \"body lotion\"]', 6, 9.99, 54, 'https://cdn.dummyjson.com/products/images/skin-care/Vaseline%20Men%20Body%20and%20Face%20Lotion/thumbnail.png', 'Vaseline Men Body and Face Lotion is a specially formulated lotion designed to provide long-lasting moisture to men\'s skin. It absorbs quickly and helps keep the skin hydrated and healthy.', '2025-04-16 19:11:00', '2025-04-16 19:11:00'),
(76, 'Black Sun Glasses', '[\"eyewear\", \"sunglasses\"]', 7, 29.99, 100, 'https://cdn.dummyjson.com/products/images/sunglasses/Black%20Sun%20Glasses/thumbnail.png', 'The Black Sun Glasses are a classic and stylish choice, featuring a sleek black frame and tinted lenses. They provide both UV protection and a fashionable look.', '2025-04-16 19:11:01', '2025-04-16 19:11:01'),
(77, 'Classic Sun Glasses', '[\"eyewear\", \"sunglasses\"]', 7, 24.99, 100, 'https://cdn.dummyjson.com/products/images/sunglasses/Classic%20Sun%20Glasses/thumbnail.png', 'The Classic Sun Glasses offer a timeless design with a neutral frame and UV-protected lenses. These sunglasses are versatile and suitable for various occasions.', '2025-04-16 19:11:01', '2025-04-16 19:11:01'),
(78, 'Green and Black Glasses', '[\"eyewear\", \"sunglasses\"]', 7, 34.99, 74, 'https://cdn.dummyjson.com/products/images/sunglasses/Green%20and%20Black%20Glasses/thumbnail.png', 'The Green and Black Glasses feature a bold combination of green and black colors, adding a touch of vibrancy to your eyewear collection. They are both stylish and eye-catching.', '2025-04-16 19:11:01', '2025-04-16 19:11:01'),
(79, 'Party Glasses', '[\"eyewear\", \"party glasses\"]', 7, 19.99, 35, 'https://cdn.dummyjson.com/products/images/sunglasses/Party%20Glasses/thumbnail.png', 'The Party Glasses are designed to add flair to your party outfit. With unique shapes or colorful frames, they\'re perfect for adding a playful touch to your look during celebrations.', '2025-04-16 19:11:01', '2025-04-16 19:11:01'),
(80, 'Sunglasses', '[\"eyewear\", \"sunglasses\"]', 7, 22.99, 59, 'https://cdn.dummyjson.com/products/images/sunglasses/Sunglasses/thumbnail.png', 'The Sunglasses offer a classic and simple design with a focus on functionality. These sunglasses provide essential UV protection while maintaining a timeless look.', '2025-04-16 19:11:01', '2025-04-16 19:11:01');

INSERT INTO `reviews` (`id`, `product_id`, `reviewer_name`, `reviewer_email`, `rating`, `content`, `created_at`, `updated_at`) VALUES
(1, 61, 'Anonymous', NULL, 4, 'Not very good', NULL, NULL),
(2, 61, 'Anonymous', NULL, 3, 'Not very good', NULL, NULL);

INSERT INTO `sessions` (`id`, `user_id`, `ip_address`, `user_agent`, `payload`, `last_activity`) VALUES
('csqWeNSxDrNFYYy05pMS5BPIPYgL8IqGWmWuBPsm', 5, '127.0.0.1', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_15_7) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/135.0.0.0 Safari/537.36', 'YTo1OntzOjY6Il90b2tlbiI7czo0MDoiMHB4YUtNVWJWcnJUNUhPSmJYMFJ3aU1xZEdPMEtlbDF1eUZmNGJnSSI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MjE6Imh0dHA6Ly9sb2NhbGhvc3Q6ODAwMCI7fXM6NjoiX2ZsYXNoIjthOjI6e3M6Mzoib2xkIjthOjA6e31zOjM6Im5ldyI7YTowOnt9fXM6MzoidXJsIjthOjE6e3M6ODoiaW50ZW5kZWQiO3M6Mzk6Imh0dHA6Ly9sb2NhbGhvc3Q6ODAwMC9jaGVja291dC9zaGlwcGluZyI7fXM6NTA6ImxvZ2luX3dlYl81OWJhMzZhZGRjMmIyZjk0MDE1ODBmMDE0YzdmNThlYTRlMzA5ODlkIjtpOjU7fQ==', 1745599594);

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Colin Love', 'hytyxokusu@mailinator.com', NULL, '$2y$12$VGXluv5TbbHuiYbfQ9wkteKn1d57WbAOduVb7odaA9RU9Xxkuc72.', NULL, '2025-04-17 14:45:13', '2025-04-17 14:45:13'),
(2, 'Noelani Boone', 'lafybije@mailinator.com', NULL, '$2y$12$VGXluv5TbbHuiYbfQ9wkteKn1d57WbAOduVb7odaA9RU9Xxkuc72.', NULL, '2025-04-17 14:45:23', '2025-04-17 14:45:23'),
(3, 'Dieter Mccormick', 'wyvi@mailinator.com', NULL, '$2y$12$VGXluv5TbbHuiYbfQ9wkteKn1d57WbAOduVb7odaA9RU9Xxkuc72.', NULL, '2025-04-17 14:49:23', '2025-04-17 14:49:23'),
(4, 'Abbot Beck', 'heqyt@mailinator.com', NULL, '$2y$12$VGXluv5TbbHuiYbfQ9wkteKn1d57WbAOduVb7odaA9RU9Xxkuc72.', NULL, '2025-04-25 12:19:50', '2025-04-25 12:19:50'),
(5, 'Rosalyn Price', 'febyk@mailinator.com', NULL, '$2y$12$VGXluv5TbbHuiYbfQ9wkteKn1d57WbAOduVb7odaA9RU9Xxkuc72.', NULL, '2025-04-25 13:42:48', '2025-04-25 13:42:48');



/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;