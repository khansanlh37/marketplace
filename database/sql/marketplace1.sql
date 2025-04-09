-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 09, 2025 at 09:17 AM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.0.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `marketplace`
--

-- --------------------------------------------------------

--
-- Table structure for table `branches`
--

CREATE TABLE `branches` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `region` varchar(255) NOT NULL,
  `location` text DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `branches`
--

INSERT INTO `branches` (`id`, `name`, `region`, `location`, `created_at`, `updated_at`) VALUES
(1, 'Hyundai Fatmawati', 'Jabodetabek', 'Jl. RS. Fatmawati Raya No.29, RT.1/RW.10, Cilandak Barat, Cilandak, Jakarta Selatan, DKI Jakarta 12430', '2025-02-27 23:50:29', '2025-02-27 23:58:49'),
(2, 'Hyundai Pramuka', 'Jabodetabek', 'Jl. Pramuka No.137, RT.14/RW.5, Rawasari, Cempaka Putih, Jakarta Pusat, DKI Jakarta 10570', '2025-02-28 00:02:28', '2025-02-28 00:02:28'),
(3, 'Hyundai Lotte Mall', 'Jabodetabek', 'Jl. Prof. DR. Satrio RT.18/RW.4, Kuningan, Karet Kuningan, Setiabudi, Jakarta Selatan, DKI Jakarta 12940', '2025-02-28 00:04:03', '2025-03-02 19:41:27'),
(4, 'Hyundai Kebon Jeruk', 'Jabodetabek', 'Jl. Panjang No.5, RT.10/RW.5, Kedoya Utara, Kebon Jeruk, Jakarta Barat, DKI Jakarta 11520', '2025-02-28 00:06:14', '2025-03-05 20:41:35'),
(23, 'Hyundai Supermall Karawaci', 'Jabodetabek', 'Supermal Karawaci, Jl. Boulevard Diponegoro No.105 LG Unit 48, Bencongan, Klp. Dua, Kabupaten Tangerang, Banten 15810', '2025-03-05 21:05:57', '2025-03-05 21:05:57'),
(29, 'Hyundai Ahmad Yani', 'Jawa Barat', 'Jl. A. Yani No.253, Cihapit, Kec. Bandung Wetan, Kota Bandung, Jawa Barat 40114', '2025-03-06 19:58:44', '2025-03-06 19:58:54'),
(30, 'Hyundai HR. Muhammad', 'Jawa Timur', 'Jl. Mayjen HR. Muhammad No.35C, Sonokwijenan, Sukomanunggal, Surabaya, Jawa Timur 60189', '2025-03-06 19:59:39', '2025-03-06 19:59:39'),
(31, 'Hyundai Sunset Road', 'Bali', 'Jl. Sunset Road No.234, Kuta, Kec. Kuta, Kabupaten Badung, Bali 80361', '2025-03-06 20:00:13', '2025-03-06 20:00:13'),
(32, 'Hyundai Urip Sumoharjo', 'Sulawesi Selatan', 'Jl. Urip Sumoharjo No.92 KM. 4, Sinrijala, Panakkukang, Makassar, Sulawesi Selatan 90232', '2025-03-06 20:00:48', '2025-03-06 20:00:48'),
(33, 'Hyundai Manado', 'Sulawesi Utara', 'Jl. Jendral Sudirman No.18 - 20, Pinaesaan, Wenang, Manado, Sulawesi Utara 95111', '2025-03-06 20:01:16', '2025-03-06 20:01:16');

-- --------------------------------------------------------

--
-- Table structure for table `cache`
--

CREATE TABLE `cache` (
  `key` varchar(255) NOT NULL,
  `value` mediumtext NOT NULL,
  `expiration` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `cache_locks`
--

CREATE TABLE `cache_locks` (
  `key` varchar(255) NOT NULL,
  `owner` varchar(255) NOT NULL,
  `expiration` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `branch_id` bigint(20) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `name`, `branch_id`, `created_at`, `updated_at`) VALUES
(1, 'Electric Vehicle', NULL, '2025-02-25 07:26:15', '2025-02-25 07:26:15'),
(2, 'Crossover', NULL, '2025-02-25 07:26:15', '2025-02-25 07:26:15'),
(3, 'SUV', NULL, '2025-02-25 07:26:15', '2025-02-25 07:26:15'),
(4, 'MPV', NULL, '2025-02-25 07:26:15', '2025-02-25 07:26:15');

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(255) NOT NULL,
  `connection` text NOT NULL,
  `queue` text NOT NULL,
  `payload` longtext NOT NULL,
  `exception` longtext NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `favorites`
--

CREATE TABLE `favorites` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `product_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `images`
--

CREATE TABLE `images` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `product_id` bigint(20) UNSIGNED NOT NULL,
  `path` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `jobs`
--

CREATE TABLE `jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `queue` varchar(255) NOT NULL,
  `payload` longtext NOT NULL,
  `attempts` tinyint(3) UNSIGNED NOT NULL,
  `reserved_at` int(10) UNSIGNED DEFAULT NULL,
  `available_at` int(10) UNSIGNED NOT NULL,
  `created_at` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `job_batches`
--

CREATE TABLE `job_batches` (
  `id` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `total_jobs` int(11) NOT NULL,
  `pending_jobs` int(11) NOT NULL,
  `failed_jobs` int(11) NOT NULL,
  `failed_job_ids` longtext NOT NULL,
  `options` mediumtext DEFAULT NULL,
  `cancelled_at` int(11) DEFAULT NULL,
  `created_at` int(11) NOT NULL,
  `finished_at` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(17, '0001_01_01_000000_create_users_table', 1),
(18, '0001_01_01_000001_create_cache_table', 1),
(19, '0001_01_01_000002_create_jobs_table', 1),
(20, '2025_02_18_060000_create_categories_table', 1),
(21, '2025_02_18_063751_create_products_table', 1),
(22, '2025_02_20_064118_create_product_images_table', 1),
(23, '2025_02_20_064127_create_product_variants_table', 1),
(24, '2025_02_23_142802_add_role_to_users_table', 1),
(25, '2025_02_24_095727_modify_products_table', 2),
(26, '2025_02_25_071321_create_products_table', 3),
(27, '2025_02_27_053304_create_product_variants_table', 4),
(28, '2025_02_27_095424_create_branches_table', 5),
(29, '2025_02_27_095527_add_branch_id_to_products_table', 6),
(32, '2025_02_28_073054_add_category_and_branch_to_products_table', 7),
(33, '2025_03_02_110650_add_region_to_branches_table', 8),
(34, '2025_03_02_132540_add_branch_id_to_categories_table', 9),
(35, '2025_03_04_034904_create_variants_table', 10),
(36, '2025_03_04_051148_create_images_table', 11),
(37, '2025_03_04_071637_add_details_to_products_table', 12),
(38, '2025_03_04_073108_create_product_variants_table', 13),
(39, '2025_03_04_073236_create_product_images_table', 13),
(41, '2025_03_05_085744_modify_color_column_in_variants', 14),
(42, '2025_03_07_070527_add_image_to_variants_table', 15),
(43, '2025_03_10_032018_create_favorites_table', 16),
(46, '2025_03_12_103929_add_colors_to_products_table', 17),
(47, '2025_03_22_050649_add_columns_to_variants_table', 18),
(49, '2025_03_22_113014_add_branch_id_to_variants_table', 19),
(50, '2025_03_24_043903_add_color_to_variants_table', 20),
(51, '2025_03_24_051910_add_color_to_products_table', 20),
(52, '2025_03_26_031118_remove_color_from_products', 21),
(53, '2025_04_07_032915_create_product_types_table', 22),
(54, '2025_04_07_033613_add_product_type_id_to_products_table', 22),
(55, '2025_04_07_093617_add_product_type_id_to_variants_table', 23),
(56, '2025_04_09_034830_add_specification_to_products_table', 24),
(57, '2025_04_09_040505_create_product_specifications_table', 25);

-- --------------------------------------------------------

--
-- Table structure for table `password_reset_tokens`
--

CREATE TABLE `password_reset_tokens` (
  `email` varchar(255) NOT NULL,
  `token` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `category_id` bigint(20) UNSIGNED DEFAULT NULL,
  `product_type_id` bigint(20) UNSIGNED DEFAULT NULL,
  `price` decimal(15,2) NOT NULL,
  `description` text DEFAULT NULL,
  `image` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `branch_id` bigint(20) UNSIGNED DEFAULT NULL,
  `colors` text DEFAULT NULL,
  `specifications` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin DEFAULT NULL CHECK (json_valid(`specifications`))
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `name`, `category_id`, `product_type_id`, `price`, `description`, `image`, `created_at`, `updated_at`, `branch_id`, `colors`, `specifications`) VALUES
(62, 'The all-new KONA ELECTRIC', 1, NULL, 250000000.00, 'tes', 'product_images/tXBiVwCphbEr7bmp2YboPVExt0qGOrQ97463qOQi.png', '2025-03-13 23:06:29', '2025-03-20 20:59:32', 1, NULL, NULL),
(63, 'IONIQ 5', 1, NULL, 250000000.00, NULL, 'product_images/gXttbiThhCEgYAI9lnvKChvtmaPNK6jo4Bzn8tr7.png', '2025-03-13 23:28:55', '2025-03-13 23:28:55', 1, NULL, NULL),
(64, 'IONIQ 6', 1, NULL, 250000000.00, NULL, 'product_images/jw6NuluRakrZbUHJI3BsoZdOSqAkAriJSXdfn4IM.png', '2025-03-14 00:02:33', '2025-03-14 00:02:33', 1, NULL, NULL),
(65, 'STARGAZER X', 2, NULL, 250000000.00, NULL, 'product_images/xYr61ZDKIQrDPL2cTbCva7SRyLza7b0IstjBmh7V.png', '2025-03-15 05:42:32', '2025-03-15 05:42:32', 1, NULL, NULL),
(66, 'Venue Prime', 3, NULL, 250000000.00, NULL, 'product_images/h6K7ETvbfoh3b48HSM470L79BHJ92FJi5pl0ylM4.png', '2025-03-16 22:52:42', '2025-03-16 23:23:30', 1, NULL, NULL),
(67, 'The new CRETA', 3, NULL, 250000000.00, NULL, 'product_images/yQ4JJ0W2llr4mCJ9NCgeXwZOxAvLDSU7OSagu6WD.png', '2025-03-16 23:35:50', '2025-03-16 23:35:50', 1, NULL, NULL),
(68, 'The all-new SANTA FE', 3, NULL, 250000000.00, 'tes', 'product_images/EI364EimC6KkitFBKmw7BHzm3CI6uPKdt8f0bvNj.png', '2025-03-20 01:08:07', '2025-03-20 01:08:24', 1, NULL, NULL),
(69, 'The new TUCSON', 3, NULL, 250000000.00, NULL, 'product_images/rJgATR8TJOkG73DovHbFvuprB7kVJwiq5fB8apy4.png', '2025-03-20 21:03:17', '2025-03-20 21:03:17', 1, NULL, NULL),
(71, 'PALISADE', 1, NULL, 250000000.00, 'TES', 'product_images/vsinmYg4B2DI0JGAalFJquvuAjnk4gIV0unkayFi.png', '2025-04-05 07:31:22', '2025-04-05 07:31:22', 1, NULL, NULL),
(72, 'CRETA', 1, NULL, 250000000.00, 'TES', 'product_images/EWwdxBBJ54KXzJlQxrob1UvK91tq7XRkkA6ns4UF.png', '2025-04-05 07:32:11', '2025-04-05 07:32:11', 1, NULL, NULL),
(73, 'SANTA FE', 1, NULL, 250000000.00, 'TES', 'product_images/cbvpQrRqUcZYCnxFqGaYOnXdghUmhpl1fbaGkSAD.png', '2025-04-05 07:32:38', '2025-04-05 07:32:38', 1, NULL, NULL),
(74, 'STARGAZER', 4, NULL, 250000000.00, 'TES', 'product_images/q8X1bziG932ig6eovhk9T6O0SrsQbZFySjVYLiNs.png', '2025-04-05 07:33:49', '2025-04-05 07:47:09', 1, NULL, NULL),
(75, 'STARIA', 4, NULL, 250000000.00, 'TES', 'product_images/I21Hzq0WBQgIsnmdvEZh6Dcju6eDTXIUKEY3yLiV.png', '2025-04-05 07:48:03', '2025-04-05 07:48:03', 1, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `product_specifications`
--

CREATE TABLE `product_specifications` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `product_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `value` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `product_types`
--

CREATE TABLE `product_types` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `product_types`
--

INSERT INTO `product_types` (`id`, `name`, `created_at`, `updated_at`) VALUES
(1, 'Style - Standard Range', '2025-04-06 21:22:41', '2025-04-06 21:22:41'),
(2, 'Prime - Standard Range', '2025-04-06 21:26:18', '2025-04-06 21:26:18');

-- --------------------------------------------------------

--
-- Table structure for table `product_variants`
--

CREATE TABLE `product_variants` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `product_id` bigint(20) UNSIGNED NOT NULL,
  `variant_name` varchar(255) NOT NULL,
  `image` varchar(255) DEFAULT NULL,
  `price` decimal(10,2) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `sessions`
--

CREATE TABLE `sessions` (
  `id` varchar(255) NOT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `ip_address` varchar(45) DEFAULT NULL,
  `user_agent` text DEFAULT NULL,
  `payload` longtext NOT NULL,
  `last_activity` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `sessions`
--

INSERT INTO `sessions` (`id`, `user_id`, `ip_address`, `user_agent`, `payload`, `last_activity`) VALUES
('IsE0t4eQFzNja8v0Kld0OaTkWoIn7vyPD0i7Tlx1', 12, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/135.0.0.0 Safari/537.36 Edg/135.0.0.0', 'YTo1OntzOjY6Il90b2tlbiI7czo0MDoiS09vbHVHbndyZnZ6cnpaVVNvdUE0dndTS1g4NW5CRHNHa25pWFA3ZyI7czozOiJ1cmwiO2E6MTp7czo4OiJpbnRlbmRlZCI7czozNjoiaHR0cDovLzEyNy4wLjAuMTo4MDAwL2FkbWluL3Byb2R1Y3RzIjt9czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6NDE6Imh0dHA6Ly8xMjcuMC4wLjE6ODAwMC9hZG1pbi9wcm9kdWN0LXR5cGVzIjt9czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319czo1MDoibG9naW5fd2ViXzU5YmEzNmFkZGMyYjJmOTQwMTU4MGYwMTRjN2Y1OGVhNGUzMDk4OWQiO2k6MTI7fQ==', 1744182713),
('pNuNYrmyZiT4CKV0DEMIYLj9rPr3QgeIRy11KvBQ', 12, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/135.0.0.0 Safari/537.36 Edg/135.0.0.0', 'YTo2OntzOjY6Il90b2tlbiI7czo0MDoieklvQXlyUTQ1ZEFJQk55VGI3WlNtaElYUjM1MEdDZTJMNzJaY3J0eCI7czoxMDoicHJvZHVjdF9pZCI7aTo3NTtzOjk6Il9wcmV2aW91cyI7YToxOntzOjM6InVybCI7czozNjoiaHR0cDovLzEyNy4wLjAuMTo4MDAwL2FkbWluL3Byb2R1Y3RzIjt9czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319czozOiJ1cmwiO2E6MTp7czo4OiJpbnRlbmRlZCI7czozNjoiaHR0cDovLzEyNy4wLjAuMTo4MDAwL2FkbWluL3Byb2R1Y3RzIjt9czo1MDoibG9naW5fd2ViXzU5YmEzNmFkZGMyYjJmOTQwMTU4MGYwMTRjN2Y1OGVhNGUzMDk4OWQiO2k6MTI7fQ==', 1744172601);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `role` varchar(255) NOT NULL DEFAULT 'user'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`, `role`) VALUES
(9, 'Admin', 'admin@marketplace.com', NULL, '$2y$12$0xYyagc/hIslP9AEiN0AyO7Loq7NbD/6OmvsYvCBzxecEHF1l2k7u', NULL, '2025-03-05 20:04:15', '2025-03-05 20:04:15', 'admin'),
(12, 'Admin Marketplace', 'admin@example.com', NULL, '$2y$12$SGd1w4nAzCqiOXnHOcRK2uzlu6KLlLfPYQ5px8B.GW3fgPP5IB1s6', NULL, '2025-03-05 20:05:13', '2025-03-05 20:05:13', 'admin');

-- --------------------------------------------------------

--
-- Table structure for table `variants`
--

CREATE TABLE `variants` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `product_id` bigint(20) UNSIGNED NOT NULL,
  `product_type_id` bigint(20) UNSIGNED DEFAULT NULL,
  `price` decimal(15,2) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `type` varchar(255) DEFAULT NULL,
  `image` varchar(255) DEFAULT NULL,
  `category_id` bigint(20) UNSIGNED NOT NULL,
  `branch_id` bigint(20) UNSIGNED DEFAULT NULL,
  `color` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `variants`
--

INSERT INTO `variants` (`id`, `product_id`, `product_type_id`, `price`, `created_at`, `updated_at`, `type`, `image`, `category_id`, `branch_id`, `color`) VALUES
(469, 62, 1, 250000000.00, '2025-04-07 02:46:58', '2025-04-07 02:46:58', NULL, 'variant_images/FzCHUY5QpquZPBYHluj0auBntffL6I99S28RDR6E.png', 1, 1, '#000000'),
(470, 62, 1, 250000000.00, '2025-04-07 02:48:40', '2025-04-07 02:48:40', NULL, 'variant_images/jwlmYlTOYfCsemZ5leePJm46Uj0vk1e4j1hwdSri.png', 1, 1, '#4a4a49'),
(471, 62, 1, 250000000.00, '2025-04-07 23:48:32', '2025-04-07 23:48:32', NULL, 'variant_images/HvRKqPcaXMZ12Q6VnUXSeZbNc7AAqIp7htbm3jl3.png', 1, 1, '#76787c'),
(472, 62, 1, 250000000.00, '2025-04-08 19:22:36', '2025-04-08 19:22:36', NULL, 'variant_images/agKob0USC0FAk9tU73sQXV8NCFRae8BRvP8ekEku.png', 1, 1, '#f1f1f0');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `branches`
--
ALTER TABLE `branches`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `cache`
--
ALTER TABLE `cache`
  ADD PRIMARY KEY (`key`);

--
-- Indexes for table `cache_locks`
--
ALTER TABLE `cache_locks`
  ADD PRIMARY KEY (`key`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `favorites`
--
ALTER TABLE `favorites`
  ADD PRIMARY KEY (`id`),
  ADD KEY `favorites_user_id_foreign` (`user_id`),
  ADD KEY `favorites_product_id_foreign` (`product_id`);

--
-- Indexes for table `images`
--
ALTER TABLE `images`
  ADD PRIMARY KEY (`id`),
  ADD KEY `images_product_id_foreign` (`product_id`);

--
-- Indexes for table `jobs`
--
ALTER TABLE `jobs`
  ADD PRIMARY KEY (`id`),
  ADD KEY `jobs_queue_index` (`queue`);

--
-- Indexes for table `job_batches`
--
ALTER TABLE `job_batches`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_reset_tokens`
--
ALTER TABLE `password_reset_tokens`
  ADD PRIMARY KEY (`email`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`),
  ADD KEY `products_category_id_foreign` (`category_id`),
  ADD KEY `products_branch_id_foreign` (`branch_id`),
  ADD KEY `products_product_type_id_foreign` (`product_type_id`);

--
-- Indexes for table `product_specifications`
--
ALTER TABLE `product_specifications`
  ADD PRIMARY KEY (`id`),
  ADD KEY `product_specifications_product_id_foreign` (`product_id`);

--
-- Indexes for table `product_types`
--
ALTER TABLE `product_types`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `product_variants`
--
ALTER TABLE `product_variants`
  ADD PRIMARY KEY (`id`),
  ADD KEY `product_variants_product_id_foreign` (`product_id`);

--
-- Indexes for table `sessions`
--
ALTER TABLE `sessions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `sessions_user_id_index` (`user_id`),
  ADD KEY `sessions_last_activity_index` (`last_activity`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- Indexes for table `variants`
--
ALTER TABLE `variants`
  ADD PRIMARY KEY (`id`),
  ADD KEY `variants_product_id_foreign` (`product_id`),
  ADD KEY `variants_category_id_foreign` (`category_id`),
  ADD KEY `variants_branch_id_foreign` (`branch_id`),
  ADD KEY `variants_product_type_id_foreign` (`product_type_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `branches`
--
ALTER TABLE `branches`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=421;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `favorites`
--
ALTER TABLE `favorites`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `images`
--
ALTER TABLE `images`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `jobs`
--
ALTER TABLE `jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=58;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=76;

--
-- AUTO_INCREMENT for table `product_specifications`
--
ALTER TABLE `product_specifications`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `product_types`
--
ALTER TABLE `product_types`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `product_variants`
--
ALTER TABLE `product_variants`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `variants`
--
ALTER TABLE `variants`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=473;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `favorites`
--
ALTER TABLE `favorites`
  ADD CONSTRAINT `favorites_product_id_foreign` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `favorites_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `images`
--
ALTER TABLE `images`
  ADD CONSTRAINT `images_product_id_foreign` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `products`
--
ALTER TABLE `products`
  ADD CONSTRAINT `products_branch_id_foreign` FOREIGN KEY (`branch_id`) REFERENCES `branches` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `products_category_id_foreign` FOREIGN KEY (`category_id`) REFERENCES `categories` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `products_product_type_id_foreign` FOREIGN KEY (`product_type_id`) REFERENCES `product_types` (`id`) ON DELETE SET NULL;

--
-- Constraints for table `product_specifications`
--
ALTER TABLE `product_specifications`
  ADD CONSTRAINT `product_specifications_product_id_foreign` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `product_variants`
--
ALTER TABLE `product_variants`
  ADD CONSTRAINT `product_variants_product_id_foreign` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `variants`
--
ALTER TABLE `variants`
  ADD CONSTRAINT `variants_branch_id_foreign` FOREIGN KEY (`branch_id`) REFERENCES `branches` (`id`),
  ADD CONSTRAINT `variants_category_id_foreign` FOREIGN KEY (`category_id`) REFERENCES `categories` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `variants_product_id_foreign` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `variants_product_type_id_foreign` FOREIGN KEY (`product_type_id`) REFERENCES `product_types` (`id`) ON DELETE SET NULL;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
