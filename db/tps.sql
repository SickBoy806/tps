-- phpMyAdmin SQL Dump
-- version 5.1.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 11, 2025 at 01:01 AM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 7.4.29

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `tps`
--

-- --------------------------------------------------------

--
-- Table structure for table `cache`
--

CREATE TABLE `cache` (
  `key` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `value` mediumtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `expiration` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `cache`
--

INSERT INTO `cache` (`key`, `value`, `expiration`) VALUES
('voyager_menu_admin', 'O:23:\"TCG\\Voyager\\Models\\Menu\":30:{s:13:\"\0*\0connection\";s:5:\"mysql\";s:8:\"\0*\0table\";s:5:\"menus\";s:13:\"\0*\0primaryKey\";s:2:\"id\";s:10:\"\0*\0keyType\";s:3:\"int\";s:12:\"incrementing\";b:1;s:7:\"\0*\0with\";a:0:{}s:12:\"\0*\0withCount\";a:0:{}s:19:\"preventsLazyLoading\";b:0;s:10:\"\0*\0perPage\";i:15;s:6:\"exists\";b:1;s:18:\"wasRecentlyCreated\";b:0;s:28:\"\0*\0escapeWhenCastingToString\";b:0;s:13:\"\0*\0attributes\";a:4:{s:2:\"id\";i:1;s:4:\"name\";s:5:\"admin\";s:10:\"created_at\";s:19:\"2025-02-21 17:14:03\";s:10:\"updated_at\";s:19:\"2025-02-21 17:14:03\";}s:11:\"\0*\0original\";a:4:{s:2:\"id\";i:1;s:4:\"name\";s:5:\"admin\";s:10:\"created_at\";s:19:\"2025-02-21 17:14:03\";s:10:\"updated_at\";s:19:\"2025-02-21 17:14:03\";}s:10:\"\0*\0changes\";a:0:{}s:8:\"\0*\0casts\";a:0:{}s:17:\"\0*\0classCastCache\";a:0:{}s:21:\"\0*\0attributeCastCache\";a:0:{}s:13:\"\0*\0dateFormat\";N;s:10:\"\0*\0appends\";a:0:{}s:19:\"\0*\0dispatchesEvents\";a:0:{}s:14:\"\0*\0observables\";a:0:{}s:12:\"\0*\0relations\";a:1:{s:12:\"parent_items\";O:39:\"Illuminate\\Database\\Eloquent\\Collection\":2:{s:8:\"\0*\0items\";a:25:{i:0;O:27:\"TCG\\Voyager\\Models\\MenuItem\":32:{s:13:\"\0*\0connection\";s:5:\"mysql\";s:8:\"\0*\0table\";s:10:\"menu_items\";s:13:\"\0*\0primaryKey\";s:2:\"id\";s:10:\"\0*\0keyType\";s:3:\"int\";s:12:\"incrementing\";b:1;s:7:\"\0*\0with\";a:0:{}s:12:\"\0*\0withCount\";a:0:{}s:19:\"preventsLazyLoading\";b:0;s:10:\"\0*\0perPage\";i:15;s:6:\"exists\";b:1;s:18:\"wasRecentlyCreated\";b:0;s:28:\"\0*\0escapeWhenCastingToString\";b:0;s:13:\"\0*\0attributes\";a:13:{s:2:\"id\";i:1;s:7:\"menu_id\";i:1;s:5:\"title\";s:9:\"Dashboard\";s:3:\"url\";s:0:\"\";s:6:\"target\";s:5:\"_self\";s:10:\"icon_class\";s:12:\"voyager-boat\";s:5:\"color\";N;s:9:\"parent_id\";N;s:5:\"order\";i:1;s:10:\"created_at\";s:19:\"2025-02-21 17:14:03\";s:10:\"updated_at\";s:19:\"2025-02-21 17:14:03\";s:5:\"route\";s:17:\"voyager.dashboard\";s:10:\"parameters\";N;}s:11:\"\0*\0original\";a:13:{s:2:\"id\";i:1;s:7:\"menu_id\";i:1;s:5:\"title\";s:9:\"Dashboard\";s:3:\"url\";s:0:\"\";s:6:\"target\";s:5:\"_self\";s:10:\"icon_class\";s:12:\"voyager-boat\";s:5:\"color\";N;s:9:\"parent_id\";N;s:5:\"order\";i:1;s:10:\"created_at\";s:19:\"2025-02-21 17:14:03\";s:10:\"updated_at\";s:19:\"2025-02-21 17:14:03\";s:5:\"route\";s:17:\"voyager.dashboard\";s:10:\"parameters\";N;}s:10:\"\0*\0changes\";a:0:{}s:8:\"\0*\0casts\";a:0:{}s:17:\"\0*\0classCastCache\";a:0:{}s:21:\"\0*\0attributeCastCache\";a:0:{}s:13:\"\0*\0dateFormat\";N;s:10:\"\0*\0appends\";a:0:{}s:19:\"\0*\0dispatchesEvents\";a:0:{}s:14:\"\0*\0observables\";a:0:{}s:12:\"\0*\0relations\";a:1:{s:8:\"children\";O:39:\"Illuminate\\Database\\Eloquent\\Collection\":2:{s:8:\"\0*\0items\";a:0:{}s:28:\"\0*\0escapeWhenCastingToString\";b:0;}}s:10:\"\0*\0touches\";a:0:{}s:10:\"timestamps\";b:1;s:13:\"usesUniqueIds\";b:0;s:9:\"\0*\0hidden\";a:0:{}s:10:\"\0*\0visible\";a:0:{}s:11:\"\0*\0fillable\";a:0:{}s:10:\"\0*\0guarded\";a:0:{}s:20:\"\0*\0translatorMethods\";a:1:{s:4:\"link\";s:14:\"translatorLink\";}s:15:\"\0*\0translatable\";a:1:{i:0;s:5:\"title\";}}i:1;O:27:\"TCG\\Voyager\\Models\\MenuItem\":32:{s:13:\"\0*\0connection\";s:5:\"mysql\";s:8:\"\0*\0table\";s:10:\"menu_items\";s:13:\"\0*\0primaryKey\";s:2:\"id\";s:10:\"\0*\0keyType\";s:3:\"int\";s:12:\"incrementing\";b:1;s:7:\"\0*\0with\";a:0:{}s:12:\"\0*\0withCount\";a:0:{}s:19:\"preventsLazyLoading\";b:0;s:10:\"\0*\0perPage\";i:15;s:6:\"exists\";b:1;s:18:\"wasRecentlyCreated\";b:0;s:28:\"\0*\0escapeWhenCastingToString\";b:0;s:13:\"\0*\0attributes\";a:13:{s:2:\"id\";i:2;s:7:\"menu_id\";i:1;s:5:\"title\";s:5:\"Media\";s:3:\"url\";s:0:\"\";s:6:\"target\";s:5:\"_self\";s:10:\"icon_class\";s:14:\"voyager-images\";s:5:\"color\";N;s:9:\"parent_id\";N;s:5:\"order\";i:5;s:10:\"created_at\";s:19:\"2025-02-21 17:14:03\";s:10:\"updated_at\";s:19:\"2025-02-21 17:14:03\";s:5:\"route\";s:19:\"voyager.media.index\";s:10:\"parameters\";N;}s:11:\"\0*\0original\";a:13:{s:2:\"id\";i:2;s:7:\"menu_id\";i:1;s:5:\"title\";s:5:\"Media\";s:3:\"url\";s:0:\"\";s:6:\"target\";s:5:\"_self\";s:10:\"icon_class\";s:14:\"voyager-images\";s:5:\"color\";N;s:9:\"parent_id\";N;s:5:\"order\";i:5;s:10:\"created_at\";s:19:\"2025-02-21 17:14:03\";s:10:\"updated_at\";s:19:\"2025-02-21 17:14:03\";s:5:\"route\";s:19:\"voyager.media.index\";s:10:\"parameters\";N;}s:10:\"\0*\0changes\";a:0:{}s:8:\"\0*\0casts\";a:0:{}s:17:\"\0*\0classCastCache\";a:0:{}s:21:\"\0*\0attributeCastCache\";a:0:{}s:13:\"\0*\0dateFormat\";N;s:10:\"\0*\0appends\";a:0:{}s:19:\"\0*\0dispatchesEvents\";a:0:{}s:14:\"\0*\0observables\";a:0:{}s:12:\"\0*\0relations\";a:1:{s:8:\"children\";O:39:\"Illuminate\\Database\\Eloquent\\Collection\":2:{s:8:\"\0*\0items\";a:0:{}s:28:\"\0*\0escapeWhenCastingToString\";b:0;}}s:10:\"\0*\0touches\";a:0:{}s:10:\"timestamps\";b:1;s:13:\"usesUniqueIds\";b:0;s:9:\"\0*\0hidden\";a:0:{}s:10:\"\0*\0visible\";a:0:{}s:11:\"\0*\0fillable\";a:0:{}s:10:\"\0*\0guarded\";a:0:{}s:20:\"\0*\0translatorMethods\";a:1:{s:4:\"link\";s:14:\"translatorLink\";}s:15:\"\0*\0translatable\";a:1:{i:0;s:5:\"title\";}}i:2;O:27:\"TCG\\Voyager\\Models\\MenuItem\":32:{s:13:\"\0*\0connection\";s:5:\"mysql\";s:8:\"\0*\0table\";s:10:\"menu_items\";s:13:\"\0*\0primaryKey\";s:2:\"id\";s:10:\"\0*\0keyType\";s:3:\"int\";s:12:\"incrementing\";b:1;s:7:\"\0*\0with\";a:0:{}s:12:\"\0*\0withCount\";a:0:{}s:19:\"preventsLazyLoading\";b:0;s:10:\"\0*\0perPage\";i:15;s:6:\"exists\";b:1;s:18:\"wasRecentlyCreated\";b:0;s:28:\"\0*\0escapeWhenCastingToString\";b:0;s:13:\"\0*\0attributes\";a:13:{s:2:\"id\";i:3;s:7:\"menu_id\";i:1;s:5:\"title\";s:5:\"Users\";s:3:\"url\";s:0:\"\";s:6:\"target\";s:5:\"_self\";s:10:\"icon_class\";s:14:\"voyager-person\";s:5:\"color\";N;s:9:\"parent_id\";N;s:5:\"order\";i:3;s:10:\"created_at\";s:19:\"2025-02-21 17:14:03\";s:10:\"updated_at\";s:19:\"2025-02-21 17:14:03\";s:5:\"route\";s:19:\"voyager.users.index\";s:10:\"parameters\";N;}s:11:\"\0*\0original\";a:13:{s:2:\"id\";i:3;s:7:\"menu_id\";i:1;s:5:\"title\";s:5:\"Users\";s:3:\"url\";s:0:\"\";s:6:\"target\";s:5:\"_self\";s:10:\"icon_class\";s:14:\"voyager-person\";s:5:\"color\";N;s:9:\"parent_id\";N;s:5:\"order\";i:3;s:10:\"created_at\";s:19:\"2025-02-21 17:14:03\";s:10:\"updated_at\";s:19:\"2025-02-21 17:14:03\";s:5:\"route\";s:19:\"voyager.users.index\";s:10:\"parameters\";N;}s:10:\"\0*\0changes\";a:0:{}s:8:\"\0*\0casts\";a:0:{}s:17:\"\0*\0classCastCache\";a:0:{}s:21:\"\0*\0attributeCastCache\";a:0:{}s:13:\"\0*\0dateFormat\";N;s:10:\"\0*\0appends\";a:0:{}s:19:\"\0*\0dispatchesEvents\";a:0:{}s:14:\"\0*\0observables\";a:0:{}s:12:\"\0*\0relations\";a:1:{s:8:\"children\";O:39:\"Illuminate\\Database\\Eloquent\\Collection\":2:{s:8:\"\0*\0items\";a:0:{}s:28:\"\0*\0escapeWhenCastingToString\";b:0;}}s:10:\"\0*\0touches\";a:0:{}s:10:\"timestamps\";b:1;s:13:\"usesUniqueIds\";b:0;s:9:\"\0*\0hidden\";a:0:{}s:10:\"\0*\0visible\";a:0:{}s:11:\"\0*\0fillable\";a:0:{}s:10:\"\0*\0guarded\";a:0:{}s:20:\"\0*\0translatorMethods\";a:1:{s:4:\"link\";s:14:\"translatorLink\";}s:15:\"\0*\0translatable\";a:1:{i:0;s:5:\"title\";}}i:3;O:27:\"TCG\\Voyager\\Models\\MenuItem\":32:{s:13:\"\0*\0connection\";s:5:\"mysql\";s:8:\"\0*\0table\";s:10:\"menu_items\";s:13:\"\0*\0primaryKey\";s:2:\"id\";s:10:\"\0*\0keyType\";s:3:\"int\";s:12:\"incrementing\";b:1;s:7:\"\0*\0with\";a:0:{}s:12:\"\0*\0withCount\";a:0:{}s:19:\"preventsLazyLoading\";b:0;s:10:\"\0*\0perPage\";i:15;s:6:\"exists\";b:1;s:18:\"wasRecentlyCreated\";b:0;s:28:\"\0*\0escapeWhenCastingToString\";b:0;s:13:\"\0*\0attributes\";a:13:{s:2:\"id\";i:4;s:7:\"menu_id\";i:1;s:5:\"title\";s:5:\"Roles\";s:3:\"url\";s:0:\"\";s:6:\"target\";s:5:\"_self\";s:10:\"icon_class\";s:12:\"voyager-lock\";s:5:\"color\";N;s:9:\"parent_id\";N;s:5:\"order\";i:2;s:10:\"created_at\";s:19:\"2025-02-21 17:14:03\";s:10:\"updated_at\";s:19:\"2025-02-21 17:14:03\";s:5:\"route\";s:19:\"voyager.roles.index\";s:10:\"parameters\";N;}s:11:\"\0*\0original\";a:13:{s:2:\"id\";i:4;s:7:\"menu_id\";i:1;s:5:\"title\";s:5:\"Roles\";s:3:\"url\";s:0:\"\";s:6:\"target\";s:5:\"_self\";s:10:\"icon_class\";s:12:\"voyager-lock\";s:5:\"color\";N;s:9:\"parent_id\";N;s:5:\"order\";i:2;s:10:\"created_at\";s:19:\"2025-02-21 17:14:03\";s:10:\"updated_at\";s:19:\"2025-02-21 17:14:03\";s:5:\"route\";s:19:\"voyager.roles.index\";s:10:\"parameters\";N;}s:10:\"\0*\0changes\";a:0:{}s:8:\"\0*\0casts\";a:0:{}s:17:\"\0*\0classCastCache\";a:0:{}s:21:\"\0*\0attributeCastCache\";a:0:{}s:13:\"\0*\0dateFormat\";N;s:10:\"\0*\0appends\";a:0:{}s:19:\"\0*\0dispatchesEvents\";a:0:{}s:14:\"\0*\0observables\";a:0:{}s:12:\"\0*\0relations\";a:1:{s:8:\"children\";O:39:\"Illuminate\\Database\\Eloquent\\Collection\":2:{s:8:\"\0*\0items\";a:0:{}s:28:\"\0*\0escapeWhenCastingToString\";b:0;}}s:10:\"\0*\0touches\";a:0:{}s:10:\"timestamps\";b:1;s:13:\"usesUniqueIds\";b:0;s:9:\"\0*\0hidden\";a:0:{}s:10:\"\0*\0visible\";a:0:{}s:11:\"\0*\0fillable\";a:0:{}s:10:\"\0*\0guarded\";a:0:{}s:20:\"\0*\0translatorMethods\";a:1:{s:4:\"link\";s:14:\"translatorLink\";}s:15:\"\0*\0translatable\";a:1:{i:0;s:5:\"title\";}}i:4;O:27:\"TCG\\Voyager\\Models\\MenuItem\":32:{s:13:\"\0*\0connection\";s:5:\"mysql\";s:8:\"\0*\0table\";s:10:\"menu_items\";s:13:\"\0*\0primaryKey\";s:2:\"id\";s:10:\"\0*\0keyType\";s:3:\"int\";s:12:\"incrementing\";b:1;s:7:\"\0*\0with\";a:0:{}s:12:\"\0*\0withCount\";a:0:{}s:19:\"preventsLazyLoading\";b:0;s:10:\"\0*\0perPage\";i:15;s:6:\"exists\";b:1;s:18:\"wasRecentlyCreated\";b:0;s:28:\"\0*\0escapeWhenCastingToString\";b:0;s:13:\"\0*\0attributes\";a:13:{s:2:\"id\";i:5;s:7:\"menu_id\";i:1;s:5:\"title\";s:5:\"Tools\";s:3:\"url\";s:0:\"\";s:6:\"target\";s:5:\"_self\";s:10:\"icon_class\";s:13:\"voyager-tools\";s:5:\"color\";N;s:9:\"parent_id\";N;s:5:\"order\";i:9;s:10:\"created_at\";s:19:\"2025-02-21 17:14:03\";s:10:\"updated_at\";s:19:\"2025-02-21 17:14:03\";s:5:\"route\";N;s:10:\"parameters\";N;}s:11:\"\0*\0original\";a:13:{s:2:\"id\";i:5;s:7:\"menu_id\";i:1;s:5:\"title\";s:5:\"Tools\";s:3:\"url\";s:0:\"\";s:6:\"target\";s:5:\"_self\";s:10:\"icon_class\";s:13:\"voyager-tools\";s:5:\"color\";N;s:9:\"parent_id\";N;s:5:\"order\";i:9;s:10:\"created_at\";s:19:\"2025-02-21 17:14:03\";s:10:\"updated_at\";s:19:\"2025-02-21 17:14:03\";s:5:\"route\";N;s:10:\"parameters\";N;}s:10:\"\0*\0changes\";a:0:{}s:8:\"\0*\0casts\";a:0:{}s:17:\"\0*\0classCastCache\";a:0:{}s:21:\"\0*\0attributeCastCache\";a:0:{}s:13:\"\0*\0dateFormat\";N;s:10:\"\0*\0appends\";a:0:{}s:19:\"\0*\0dispatchesEvents\";a:0:{}s:14:\"\0*\0observables\";a:0:{}s:12:\"\0*\0relations\";a:1:{s:8:\"children\";O:39:\"Illuminate\\Database\\Eloquent\\Collection\":2:{s:8:\"\0*\0items\";a:4:{i:0;O:27:\"TCG\\Voyager\\Models\\MenuItem\":32:{s:13:\"\0*\0connection\";s:5:\"mysql\";s:8:\"\0*\0table\";s:10:\"menu_items\";s:13:\"\0*\0primaryKey\";s:2:\"id\";s:10:\"\0*\0keyType\";s:3:\"int\";s:12:\"incrementing\";b:1;s:7:\"\0*\0with\";a:0:{}s:12:\"\0*\0withCount\";a:0:{}s:19:\"preventsLazyLoading\";b:0;s:10:\"\0*\0perPage\";i:15;s:6:\"exists\";b:1;s:18:\"wasRecentlyCreated\";b:0;s:28:\"\0*\0escapeWhenCastingToString\";b:0;s:13:\"\0*\0attributes\";a:13:{s:2:\"id\";i:6;s:7:\"menu_id\";i:1;s:5:\"title\";s:12:\"Menu Builder\";s:3:\"url\";s:0:\"\";s:6:\"target\";s:5:\"_self\";s:10:\"icon_class\";s:12:\"voyager-list\";s:5:\"color\";N;s:9:\"parent_id\";i:5;s:5:\"order\";i:10;s:10:\"created_at\";s:19:\"2025-02-21 17:14:03\";s:10:\"updated_at\";s:19:\"2025-02-21 17:14:03\";s:5:\"route\";s:19:\"voyager.menus.index\";s:10:\"parameters\";N;}s:11:\"\0*\0original\";a:13:{s:2:\"id\";i:6;s:7:\"menu_id\";i:1;s:5:\"title\";s:12:\"Menu Builder\";s:3:\"url\";s:0:\"\";s:6:\"target\";s:5:\"_self\";s:10:\"icon_class\";s:12:\"voyager-list\";s:5:\"color\";N;s:9:\"parent_id\";i:5;s:5:\"order\";i:10;s:10:\"created_at\";s:19:\"2025-02-21 17:14:03\";s:10:\"updated_at\";s:19:\"2025-02-21 17:14:03\";s:5:\"route\";s:19:\"voyager.menus.index\";s:10:\"parameters\";N;}s:10:\"\0*\0changes\";a:0:{}s:8:\"\0*\0casts\";a:0:{}s:17:\"\0*\0classCastCache\";a:0:{}s:21:\"\0*\0attributeCastCache\";a:0:{}s:13:\"\0*\0dateFormat\";N;s:10:\"\0*\0appends\";a:0:{}s:19:\"\0*\0dispatchesEvents\";a:0:{}s:14:\"\0*\0observables\";a:0:{}s:12:\"\0*\0relations\";a:1:{s:8:\"children\";O:39:\"Illuminate\\Database\\Eloquent\\Collection\":2:{s:8:\"\0*\0items\";a:0:{}s:28:\"\0*\0escapeWhenCastingToString\";b:0;}}s:10:\"\0*\0touches\";a:0:{}s:10:\"timestamps\";b:1;s:13:\"usesUniqueIds\";b:0;s:9:\"\0*\0hidden\";a:0:{}s:10:\"\0*\0visible\";a:0:{}s:11:\"\0*\0fillable\";a:0:{}s:10:\"\0*\0guarded\";a:0:{}s:20:\"\0*\0translatorMethods\";a:1:{s:4:\"link\";s:14:\"translatorLink\";}s:15:\"\0*\0translatable\";a:1:{i:0;s:5:\"title\";}}i:1;O:27:\"TCG\\Voyager\\Models\\MenuItem\":32:{s:13:\"\0*\0connection\";s:5:\"mysql\";s:8:\"\0*\0table\";s:10:\"menu_items\";s:13:\"\0*\0primaryKey\";s:2:\"id\";s:10:\"\0*\0keyType\";s:3:\"int\";s:12:\"incrementing\";b:1;s:7:\"\0*\0with\";a:0:{}s:12:\"\0*\0withCount\";a:0:{}s:19:\"preventsLazyLoading\";b:0;s:10:\"\0*\0perPage\";i:15;s:6:\"exists\";b:1;s:18:\"wasRecentlyCreated\";b:0;s:28:\"\0*\0escapeWhenCastingToString\";b:0;s:13:\"\0*\0attributes\";a:13:{s:2:\"id\";i:7;s:7:\"menu_id\";i:1;s:5:\"title\";s:8:\"Database\";s:3:\"url\";s:0:\"\";s:6:\"target\";s:5:\"_self\";s:10:\"icon_class\";s:12:\"voyager-data\";s:5:\"color\";N;s:9:\"parent_id\";i:5;s:5:\"order\";i:11;s:10:\"created_at\";s:19:\"2025-02-21 17:14:03\";s:10:\"updated_at\";s:19:\"2025-02-21 17:14:03\";s:5:\"route\";s:22:\"voyager.database.index\";s:10:\"parameters\";N;}s:11:\"\0*\0original\";a:13:{s:2:\"id\";i:7;s:7:\"menu_id\";i:1;s:5:\"title\";s:8:\"Database\";s:3:\"url\";s:0:\"\";s:6:\"target\";s:5:\"_self\";s:10:\"icon_class\";s:12:\"voyager-data\";s:5:\"color\";N;s:9:\"parent_id\";i:5;s:5:\"order\";i:11;s:10:\"created_at\";s:19:\"2025-02-21 17:14:03\";s:10:\"updated_at\";s:19:\"2025-02-21 17:14:03\";s:5:\"route\";s:22:\"voyager.database.index\";s:10:\"parameters\";N;}s:10:\"\0*\0changes\";a:0:{}s:8:\"\0*\0casts\";a:0:{}s:17:\"\0*\0classCastCache\";a:0:{}s:21:\"\0*\0attributeCastCache\";a:0:{}s:13:\"\0*\0dateFormat\";N;s:10:\"\0*\0appends\";a:0:{}s:19:\"\0*\0dispatchesEvents\";a:0:{}s:14:\"\0*\0observables\";a:0:{}s:12:\"\0*\0relations\";a:1:{s:8:\"children\";O:39:\"Illuminate\\Database\\Eloquent\\Collection\":2:{s:8:\"\0*\0items\";a:0:{}s:28:\"\0*\0escapeWhenCastingToString\";b:0;}}s:10:\"\0*\0touches\";a:0:{}s:10:\"timestamps\";b:1;s:13:\"usesUniqueIds\";b:0;s:9:\"\0*\0hidden\";a:0:{}s:10:\"\0*\0visible\";a:0:{}s:11:\"\0*\0fillable\";a:0:{}s:10:\"\0*\0guarded\";a:0:{}s:20:\"\0*\0translatorMethods\";a:1:{s:4:\"link\";s:14:\"translatorLink\";}s:15:\"\0*\0translatable\";a:1:{i:0;s:5:\"title\";}}i:2;O:27:\"TCG\\Voyager\\Models\\MenuItem\":32:{s:13:\"\0*\0connection\";s:5:\"mysql\";s:8:\"\0*\0table\";s:10:\"menu_items\";s:13:\"\0*\0primaryKey\";s:2:\"id\";s:10:\"\0*\0keyType\";s:3:\"int\";s:12:\"incrementing\";b:1;s:7:\"\0*\0with\";a:0:{}s:12:\"\0*\0withCount\";a:0:{}s:19:\"preventsLazyLoading\";b:0;s:10:\"\0*\0perPage\";i:15;s:6:\"exists\";b:1;s:18:\"wasRecentlyCreated\";b:0;s:28:\"\0*\0escapeWhenCastingToString\";b:0;s:13:\"\0*\0attributes\";a:13:{s:2:\"id\";i:8;s:7:\"menu_id\";i:1;s:5:\"title\";s:7:\"Compass\";s:3:\"url\";s:0:\"\";s:6:\"target\";s:5:\"_self\";s:10:\"icon_class\";s:15:\"voyager-compass\";s:5:\"color\";N;s:9:\"parent_id\";i:5;s:5:\"order\";i:12;s:10:\"created_at\";s:19:\"2025-02-21 17:14:03\";s:10:\"updated_at\";s:19:\"2025-02-21 17:14:03\";s:5:\"route\";s:21:\"voyager.compass.index\";s:10:\"parameters\";N;}s:11:\"\0*\0original\";a:13:{s:2:\"id\";i:8;s:7:\"menu_id\";i:1;s:5:\"title\";s:7:\"Compass\";s:3:\"url\";s:0:\"\";s:6:\"target\";s:5:\"_self\";s:10:\"icon_class\";s:15:\"voyager-compass\";s:5:\"color\";N;s:9:\"parent_id\";i:5;s:5:\"order\";i:12;s:10:\"created_at\";s:19:\"2025-02-21 17:14:03\";s:10:\"updated_at\";s:19:\"2025-02-21 17:14:03\";s:5:\"route\";s:21:\"voyager.compass.index\";s:10:\"parameters\";N;}s:10:\"\0*\0changes\";a:0:{}s:8:\"\0*\0casts\";a:0:{}s:17:\"\0*\0classCastCache\";a:0:{}s:21:\"\0*\0attributeCastCache\";a:0:{}s:13:\"\0*\0dateFormat\";N;s:10:\"\0*\0appends\";a:0:{}s:19:\"\0*\0dispatchesEvents\";a:0:{}s:14:\"\0*\0observables\";a:0:{}s:12:\"\0*\0relations\";a:1:{s:8:\"children\";O:39:\"Illuminate\\Database\\Eloquent\\Collection\":2:{s:8:\"\0*\0items\";a:0:{}s:28:\"\0*\0escapeWhenCastingToString\";b:0;}}s:10:\"\0*\0touches\";a:0:{}s:10:\"timestamps\";b:1;s:13:\"usesUniqueIds\";b:0;s:9:\"\0*\0hidden\";a:0:{}s:10:\"\0*\0visible\";a:0:{}s:11:\"\0*\0fillable\";a:0:{}s:10:\"\0*\0guarded\";a:0:{}s:20:\"\0*\0translatorMethods\";a:1:{s:4:\"link\";s:14:\"translatorLink\";}s:15:\"\0*\0translatable\";a:1:{i:0;s:5:\"title\";}}i:3;O:27:\"TCG\\Voyager\\Models\\MenuItem\":32:{s:13:\"\0*\0connection\";s:5:\"mysql\";s:8:\"\0*\0table\";s:10:\"menu_items\";s:13:\"\0*\0primaryKey\";s:2:\"id\";s:10:\"\0*\0keyType\";s:3:\"int\";s:12:\"incrementing\";b:1;s:7:\"\0*\0with\";a:0:{}s:12:\"\0*\0withCount\";a:0:{}s:19:\"preventsLazyLoading\";b:0;s:10:\"\0*\0perPage\";i:15;s:6:\"exists\";b:1;s:18:\"wasRecentlyCreated\";b:0;s:28:\"\0*\0escapeWhenCastingToString\";b:0;s:13:\"\0*\0attributes\";a:13:{s:2:\"id\";i:9;s:7:\"menu_id\";i:1;s:5:\"title\";s:5:\"BREAD\";s:3:\"url\";s:0:\"\";s:6:\"target\";s:5:\"_self\";s:10:\"icon_class\";s:13:\"voyager-bread\";s:5:\"color\";N;s:9:\"parent_id\";i:5;s:5:\"order\";i:13;s:10:\"created_at\";s:19:\"2025-02-21 17:14:03\";s:10:\"updated_at\";s:19:\"2025-02-21 17:14:03\";s:5:\"route\";s:19:\"voyager.bread.index\";s:10:\"parameters\";N;}s:11:\"\0*\0original\";a:13:{s:2:\"id\";i:9;s:7:\"menu_id\";i:1;s:5:\"title\";s:5:\"BREAD\";s:3:\"url\";s:0:\"\";s:6:\"target\";s:5:\"_self\";s:10:\"icon_class\";s:13:\"voyager-bread\";s:5:\"color\";N;s:9:\"parent_id\";i:5;s:5:\"order\";i:13;s:10:\"created_at\";s:19:\"2025-02-21 17:14:03\";s:10:\"updated_at\";s:19:\"2025-02-21 17:14:03\";s:5:\"route\";s:19:\"voyager.bread.index\";s:10:\"parameters\";N;}s:10:\"\0*\0changes\";a:0:{}s:8:\"\0*\0casts\";a:0:{}s:17:\"\0*\0classCastCache\";a:0:{}s:21:\"\0*\0attributeCastCache\";a:0:{}s:13:\"\0*\0dateFormat\";N;s:10:\"\0*\0appends\";a:0:{}s:19:\"\0*\0dispatchesEvents\";a:0:{}s:14:\"\0*\0observables\";a:0:{}s:12:\"\0*\0relations\";a:1:{s:8:\"children\";O:39:\"Illuminate\\Database\\Eloquent\\Collection\":2:{s:8:\"\0*\0items\";a:0:{}s:28:\"\0*\0escapeWhenCastingToString\";b:0;}}s:10:\"\0*\0touches\";a:0:{}s:10:\"timestamps\";b:1;s:13:\"usesUniqueIds\";b:0;s:9:\"\0*\0hidden\";a:0:{}s:10:\"\0*\0visible\";a:0:{}s:11:\"\0*\0fillable\";a:0:{}s:10:\"\0*\0guarded\";a:0:{}s:20:\"\0*\0translatorMethods\";a:1:{s:4:\"link\";s:14:\"translatorLink\";}s:15:\"\0*\0translatable\";a:1:{i:0;s:5:\"title\";}}}s:28:\"\0*\0escapeWhenCastingToString\";b:0;}}s:10:\"\0*\0touches\";a:0:{}s:10:\"timestamps\";b:1;s:13:\"usesUniqueIds\";b:0;s:9:\"\0*\0hidden\";a:0:{}s:10:\"\0*\0visible\";a:0:{}s:11:\"\0*\0fillable\";a:0:{}s:10:\"\0*\0guarded\";a:0:{}s:20:\"\0*\0translatorMethods\";a:1:{s:4:\"link\";s:14:\"translatorLink\";}s:15:\"\0*\0translatable\";a:1:{i:0;s:5:\"title\";}}i:5;O:27:\"TCG\\Voyager\\Models\\MenuItem\":32:{s:13:\"\0*\0connection\";s:5:\"mysql\";s:8:\"\0*\0table\";s:10:\"menu_items\";s:13:\"\0*\0primaryKey\";s:2:\"id\";s:10:\"\0*\0keyType\";s:3:\"int\";s:12:\"incrementing\";b:1;s:7:\"\0*\0with\";a:0:{}s:12:\"\0*\0withCount\";a:0:{}s:19:\"preventsLazyLoading\";b:0;s:10:\"\0*\0perPage\";i:15;s:6:\"exists\";b:1;s:18:\"wasRecentlyCreated\";b:0;s:28:\"\0*\0escapeWhenCastingToString\";b:0;s:13:\"\0*\0attributes\";a:13:{s:2:\"id\";i:10;s:7:\"menu_id\";i:1;s:5:\"title\";s:8:\"Settings\";s:3:\"url\";s:0:\"\";s:6:\"target\";s:5:\"_self\";s:10:\"icon_class\";s:16:\"voyager-settings\";s:5:\"color\";N;s:9:\"parent_id\";N;s:5:\"order\";i:14;s:10:\"created_at\";s:19:\"2025-02-21 17:14:03\";s:10:\"updated_at\";s:19:\"2025-02-21 17:14:03\";s:5:\"route\";s:22:\"voyager.settings.index\";s:10:\"parameters\";N;}s:11:\"\0*\0original\";a:13:{s:2:\"id\";i:10;s:7:\"menu_id\";i:1;s:5:\"title\";s:8:\"Settings\";s:3:\"url\";s:0:\"\";s:6:\"target\";s:5:\"_self\";s:10:\"icon_class\";s:16:\"voyager-settings\";s:5:\"color\";N;s:9:\"parent_id\";N;s:5:\"order\";i:14;s:10:\"created_at\";s:19:\"2025-02-21 17:14:03\";s:10:\"updated_at\";s:19:\"2025-02-21 17:14:03\";s:5:\"route\";s:22:\"voyager.settings.index\";s:10:\"parameters\";N;}s:10:\"\0*\0changes\";a:0:{}s:8:\"\0*\0casts\";a:0:{}s:17:\"\0*\0classCastCache\";a:0:{}s:21:\"\0*\0attributeCastCache\";a:0:{}s:13:\"\0*\0dateFormat\";N;s:10:\"\0*\0appends\";a:0:{}s:19:\"\0*\0dispatchesEvents\";a:0:{}s:14:\"\0*\0observables\";a:0:{}s:12:\"\0*\0relations\";a:1:{s:8:\"children\";O:39:\"Illuminate\\Database\\Eloquent\\Collection\":2:{s:8:\"\0*\0items\";a:0:{}s:28:\"\0*\0escapeWhenCastingToString\";b:0;}}s:10:\"\0*\0touches\";a:0:{}s:10:\"timestamps\";b:1;s:13:\"usesUniqueIds\";b:0;s:9:\"\0*\0hidden\";a:0:{}s:10:\"\0*\0visible\";a:0:{}s:11:\"\0*\0fillable\";a:0:{}s:10:\"\0*\0guarded\";a:0:{}s:20:\"\0*\0translatorMethods\";a:1:{s:4:\"link\";s:14:\"translatorLink\";}s:15:\"\0*\0translatable\";a:1:{i:0;s:5:\"title\";}}i:6;O:27:\"TCG\\Voyager\\Models\\MenuItem\":32:{s:13:\"\0*\0connection\";s:5:\"mysql\";s:8:\"\0*\0table\";s:10:\"menu_items\";s:13:\"\0*\0primaryKey\";s:2:\"id\";s:10:\"\0*\0keyType\";s:3:\"int\";s:12:\"incrementing\";b:1;s:7:\"\0*\0with\";a:0:{}s:12:\"\0*\0withCount\";a:0:{}s:19:\"preventsLazyLoading\";b:0;s:10:\"\0*\0perPage\";i:15;s:6:\"exists\";b:1;s:18:\"wasRecentlyCreated\";b:0;s:28:\"\0*\0escapeWhenCastingToString\";b:0;s:13:\"\0*\0attributes\";a:13:{s:2:\"id\";i:11;s:7:\"menu_id\";i:1;s:5:\"title\";s:10:\"Categories\";s:3:\"url\";s:0:\"\";s:6:\"target\";s:5:\"_self\";s:10:\"icon_class\";s:18:\"voyager-categories\";s:5:\"color\";N;s:9:\"parent_id\";N;s:5:\"order\";i:8;s:10:\"created_at\";s:19:\"2025-02-21 17:14:03\";s:10:\"updated_at\";s:19:\"2025-02-21 17:14:03\";s:5:\"route\";s:24:\"voyager.categories.index\";s:10:\"parameters\";N;}s:11:\"\0*\0original\";a:13:{s:2:\"id\";i:11;s:7:\"menu_id\";i:1;s:5:\"title\";s:10:\"Categories\";s:3:\"url\";s:0:\"\";s:6:\"target\";s:5:\"_self\";s:10:\"icon_class\";s:18:\"voyager-categories\";s:5:\"color\";N;s:9:\"parent_id\";N;s:5:\"order\";i:8;s:10:\"created_at\";s:19:\"2025-02-21 17:14:03\";s:10:\"updated_at\";s:19:\"2025-02-21 17:14:03\";s:5:\"route\";s:24:\"voyager.categories.index\";s:10:\"parameters\";N;}s:10:\"\0*\0changes\";a:0:{}s:8:\"\0*\0casts\";a:0:{}s:17:\"\0*\0classCastCache\";a:0:{}s:21:\"\0*\0attributeCastCache\";a:0:{}s:13:\"\0*\0dateFormat\";N;s:10:\"\0*\0appends\";a:0:{}s:19:\"\0*\0dispatchesEvents\";a:0:{}s:14:\"\0*\0observables\";a:0:{}s:12:\"\0*\0relations\";a:1:{s:8:\"children\";O:39:\"Illuminate\\Database\\Eloquent\\Collection\":2:{s:8:\"\0*\0items\";a:0:{}s:28:\"\0*\0escapeWhenCastingToString\";b:0;}}s:10:\"\0*\0touches\";a:0:{}s:10:\"timestamps\";b:1;s:13:\"usesUniqueIds\";b:0;s:9:\"\0*\0hidden\";a:0:{}s:10:\"\0*\0visible\";a:0:{}s:11:\"\0*\0fillable\";a:0:{}s:10:\"\0*\0guarded\";a:0:{}s:20:\"\0*\0translatorMethods\";a:1:{s:4:\"link\";s:14:\"translatorLink\";}s:15:\"\0*\0translatable\";a:1:{i:0;s:5:\"title\";}}i:7;O:27:\"TCG\\Voyager\\Models\\MenuItem\":32:{s:13:\"\0*\0connection\";s:5:\"mysql\";s:8:\"\0*\0table\";s:10:\"menu_items\";s:13:\"\0*\0primaryKey\";s:2:\"id\";s:10:\"\0*\0keyType\";s:3:\"int\";s:12:\"incrementing\";b:1;s:7:\"\0*\0with\";a:0:{}s:12:\"\0*\0withCount\";a:0:{}s:19:\"preventsLazyLoading\";b:0;s:10:\"\0*\0perPage\";i:15;s:6:\"exists\";b:1;s:18:\"wasRecentlyCreated\";b:0;s:28:\"\0*\0escapeWhenCastingToString\";b:0;s:13:\"\0*\0attributes\";a:13:{s:2:\"id\";i:12;s:7:\"menu_id\";i:1;s:5:\"title\";s:5:\"Posts\";s:3:\"url\";s:0:\"\";s:6:\"target\";s:5:\"_self\";s:10:\"icon_class\";s:12:\"voyager-news\";s:5:\"color\";N;s:9:\"parent_id\";N;s:5:\"order\";i:6;s:10:\"created_at\";s:19:\"2025-02-21 17:14:04\";s:10:\"updated_at\";s:19:\"2025-02-21 17:14:04\";s:5:\"route\";s:19:\"voyager.posts.index\";s:10:\"parameters\";N;}s:11:\"\0*\0original\";a:13:{s:2:\"id\";i:12;s:7:\"menu_id\";i:1;s:5:\"title\";s:5:\"Posts\";s:3:\"url\";s:0:\"\";s:6:\"target\";s:5:\"_self\";s:10:\"icon_class\";s:12:\"voyager-news\";s:5:\"color\";N;s:9:\"parent_id\";N;s:5:\"order\";i:6;s:10:\"created_at\";s:19:\"2025-02-21 17:14:04\";s:10:\"updated_at\";s:19:\"2025-02-21 17:14:04\";s:5:\"route\";s:19:\"voyager.posts.index\";s:10:\"parameters\";N;}s:10:\"\0*\0changes\";a:0:{}s:8:\"\0*\0casts\";a:0:{}s:17:\"\0*\0classCastCache\";a:0:{}s:21:\"\0*\0attributeCastCache\";a:0:{}s:13:\"\0*\0dateFormat\";N;s:10:\"\0*\0appends\";a:0:{}s:19:\"\0*\0dispatchesEvents\";a:0:{}s:14:\"\0*\0observables\";a:0:{}s:12:\"\0*\0relations\";a:1:{s:8:\"children\";O:39:\"Illuminate\\Database\\Eloquent\\Collection\":2:{s:8:\"\0*\0items\";a:0:{}s:28:\"\0*\0escapeWhenCastingToString\";b:0;}}s:10:\"\0*\0touches\";a:0:{}s:10:\"timestamps\";b:1;s:13:\"usesUniqueIds\";b:0;s:9:\"\0*\0hidden\";a:0:{}s:10:\"\0*\0visible\";a:0:{}s:11:\"\0*\0fillable\";a:0:{}s:10:\"\0*\0guarded\";a:0:{}s:20:\"\0*\0translatorMethods\";a:1:{s:4:\"link\";s:14:\"translatorLink\";}s:15:\"\0*\0translatable\";a:1:{i:0;s:5:\"title\";}}i:8;O:27:\"TCG\\Voyager\\Models\\MenuItem\":32:{s:13:\"\0*\0connection\";s:5:\"mysql\";s:8:\"\0*\0table\";s:10:\"menu_items\";s:13:\"\0*\0primaryKey\";s:2:\"id\";s:10:\"\0*\0keyType\";s:3:\"int\";s:12:\"incrementing\";b:1;s:7:\"\0*\0with\";a:0:{}s:12:\"\0*\0withCount\";a:0:{}s:19:\"preventsLazyLoading\";b:0;s:10:\"\0*\0perPage\";i:15;s:6:\"exists\";b:1;s:18:\"wasRecentlyCreated\";b:0;s:28:\"\0*\0escapeWhenCastingToString\";b:0;s:13:\"\0*\0attributes\";a:13:{s:2:\"id\";i:13;s:7:\"menu_id\";i:1;s:5:\"title\";s:5:\"Pages\";s:3:\"url\";s:0:\"\";s:6:\"target\";s:5:\"_self\";s:10:\"icon_class\";s:17:\"voyager-file-text\";s:5:\"color\";N;s:9:\"parent_id\";N;s:5:\"order\";i:7;s:10:\"created_at\";s:19:\"2025-02-21 17:14:04\";s:10:\"updated_at\";s:19:\"2025-02-21 17:14:04\";s:5:\"route\";s:19:\"voyager.pages.index\";s:10:\"parameters\";N;}s:11:\"\0*\0original\";a:13:{s:2:\"id\";i:13;s:7:\"menu_id\";i:1;s:5:\"title\";s:5:\"Pages\";s:3:\"url\";s:0:\"\";s:6:\"target\";s:5:\"_self\";s:10:\"icon_class\";s:17:\"voyager-file-text\";s:5:\"color\";N;s:9:\"parent_id\";N;s:5:\"order\";i:7;s:10:\"created_at\";s:19:\"2025-02-21 17:14:04\";s:10:\"updated_at\";s:19:\"2025-02-21 17:14:04\";s:5:\"route\";s:19:\"voyager.pages.index\";s:10:\"parameters\";N;}s:10:\"\0*\0changes\";a:0:{}s:8:\"\0*\0casts\";a:0:{}s:17:\"\0*\0classCastCache\";a:0:{}s:21:\"\0*\0attributeCastCache\";a:0:{}s:13:\"\0*\0dateFormat\";N;s:10:\"\0*\0appends\";a:0:{}s:19:\"\0*\0dispatchesEvents\";a:0:{}s:14:\"\0*\0observables\";a:0:{}s:12:\"\0*\0relations\";a:1:{s:8:\"children\";O:39:\"Illuminate\\Database\\Eloquent\\Collection\":2:{s:8:\"\0*\0items\";a:0:{}s:28:\"\0*\0escapeWhenCastingToString\";b:0;}}s:10:\"\0*\0touches\";a:0:{}s:10:\"timestamps\";b:1;s:13:\"usesUniqueIds\";b:0;s:9:\"\0*\0hidden\";a:0:{}s:10:\"\0*\0visible\";a:0:{}s:11:\"\0*\0fillable\";a:0:{}s:10:\"\0*\0guarded\";a:0:{}s:20:\"\0*\0translatorMethods\";a:1:{s:4:\"link\";s:14:\"translatorLink\";}s:15:\"\0*\0translatable\";a:1:{i:0;s:5:\"title\";}}i:9;O:27:\"TCG\\Voyager\\Models\\MenuItem\":32:{s:13:\"\0*\0connection\";s:5:\"mysql\";s:8:\"\0*\0table\";s:10:\"menu_items\";s:13:\"\0*\0primaryKey\";s:2:\"id\";s:10:\"\0*\0keyType\";s:3:\"int\";s:12:\"incrementing\";b:1;s:7:\"\0*\0with\";a:0:{}s:12:\"\0*\0withCount\";a:0:{}s:19:\"preventsLazyLoading\";b:0;s:10:\"\0*\0perPage\";i:15;s:6:\"exists\";b:1;s:18:\"wasRecentlyCreated\";b:0;s:28:\"\0*\0escapeWhenCastingToString\";b:0;s:13:\"\0*\0attributes\";a:13:{s:2:\"id\";i:14;s:7:\"menu_id\";i:1;s:5:\"title\";s:14:\"History Events\";s:3:\"url\";s:21:\"/admin/history-events\";s:6:\"target\";s:5:\"_self\";s:10:\"icon_class\";s:16:\"voyager-calendar\";s:5:\"color\";N;s:9:\"parent_id\";N;s:5:\"order\";i:99;s:10:\"created_at\";s:19:\"2025-02-23 18:25:36\";s:10:\"updated_at\";s:19:\"2025-02-23 18:25:36\";s:5:\"route\";N;s:10:\"parameters\";N;}s:11:\"\0*\0original\";a:13:{s:2:\"id\";i:14;s:7:\"menu_id\";i:1;s:5:\"title\";s:14:\"History Events\";s:3:\"url\";s:21:\"/admin/history-events\";s:6:\"target\";s:5:\"_self\";s:10:\"icon_class\";s:16:\"voyager-calendar\";s:5:\"color\";N;s:9:\"parent_id\";N;s:5:\"order\";i:99;s:10:\"created_at\";s:19:\"2025-02-23 18:25:36\";s:10:\"updated_at\";s:19:\"2025-02-23 18:25:36\";s:5:\"route\";N;s:10:\"parameters\";N;}s:10:\"\0*\0changes\";a:0:{}s:8:\"\0*\0casts\";a:0:{}s:17:\"\0*\0classCastCache\";a:0:{}s:21:\"\0*\0attributeCastCache\";a:0:{}s:13:\"\0*\0dateFormat\";N;s:10:\"\0*\0appends\";a:0:{}s:19:\"\0*\0dispatchesEvents\";a:0:{}s:14:\"\0*\0observables\";a:0:{}s:12:\"\0*\0relations\";a:1:{s:8:\"children\";O:39:\"Illuminate\\Database\\Eloquent\\Collection\":2:{s:8:\"\0*\0items\";a:0:{}s:28:\"\0*\0escapeWhenCastingToString\";b:0;}}s:10:\"\0*\0touches\";a:0:{}s:10:\"timestamps\";b:1;s:13:\"usesUniqueIds\";b:0;s:9:\"\0*\0hidden\";a:0:{}s:10:\"\0*\0visible\";a:0:{}s:11:\"\0*\0fillable\";a:0:{}s:10:\"\0*\0guarded\";a:0:{}s:20:\"\0*\0translatorMethods\";a:1:{s:4:\"link\";s:14:\"translatorLink\";}s:15:\"\0*\0translatable\";a:1:{i:0;s:5:\"title\";}}i:10;O:27:\"TCG\\Voyager\\Models\\MenuItem\":32:{s:13:\"\0*\0connection\";s:5:\"mysql\";s:8:\"\0*\0table\";s:10:\"menu_items\";s:13:\"\0*\0primaryKey\";s:2:\"id\";s:10:\"\0*\0keyType\";s:3:\"int\";s:12:\"incrementing\";b:1;s:7:\"\0*\0with\";a:0:{}s:12:\"\0*\0withCount\";a:0:{}s:19:\"preventsLazyLoading\";b:0;s:10:\"\0*\0perPage\";i:15;s:6:\"exists\";b:1;s:18:\"wasRecentlyCreated\";b:0;s:28:\"\0*\0escapeWhenCastingToString\";b:0;s:13:\"\0*\0attributes\";a:13:{s:2:\"id\";i:15;s:7:\"menu_id\";i:1;s:5:\"title\";s:6:\"Slides\";s:3:\"url\";s:0:\"\";s:6:\"target\";s:5:\"_self\";s:10:\"icon_class\";N;s:5:\"color\";N;s:9:\"parent_id\";N;s:5:\"order\";i:100;s:10:\"created_at\";s:19:\"2025-02-24 12:15:54\";s:10:\"updated_at\";s:19:\"2025-02-24 12:15:54\";s:5:\"route\";s:20:\"voyager.slides.index\";s:10:\"parameters\";N;}s:11:\"\0*\0original\";a:13:{s:2:\"id\";i:15;s:7:\"menu_id\";i:1;s:5:\"title\";s:6:\"Slides\";s:3:\"url\";s:0:\"\";s:6:\"target\";s:5:\"_self\";s:10:\"icon_class\";N;s:5:\"color\";N;s:9:\"parent_id\";N;s:5:\"order\";i:100;s:10:\"created_at\";s:19:\"2025-02-24 12:15:54\";s:10:\"updated_at\";s:19:\"2025-02-24 12:15:54\";s:5:\"route\";s:20:\"voyager.slides.index\";s:10:\"parameters\";N;}s:10:\"\0*\0changes\";a:0:{}s:8:\"\0*\0casts\";a:0:{}s:17:\"\0*\0classCastCache\";a:0:{}s:21:\"\0*\0attributeCastCache\";a:0:{}s:13:\"\0*\0dateFormat\";N;s:10:\"\0*\0appends\";a:0:{}s:19:\"\0*\0dispatchesEvents\";a:0:{}s:14:\"\0*\0observables\";a:0:{}s:12:\"\0*\0relations\";a:1:{s:8:\"children\";O:39:\"Illuminate\\Database\\Eloquent\\Collection\":2:{s:8:\"\0*\0items\";a:0:{}s:28:\"\0*\0escapeWhenCastingToString\";b:0;}}s:10:\"\0*\0touches\";a:0:{}s:10:\"timestamps\";b:1;s:13:\"usesUniqueIds\";b:0;s:9:\"\0*\0hidden\";a:0:{}s:10:\"\0*\0visible\";a:0:{}s:11:\"\0*\0fillable\";a:0:{}s:10:\"\0*\0guarded\";a:0:{}s:20:\"\0*\0translatorMethods\";a:1:{s:4:\"link\";s:14:\"translatorLink\";}s:15:\"\0*\0translatable\";a:1:{i:0;s:5:\"title\";}}i:11;O:27:\"TCG\\Voyager\\Models\\MenuItem\":32:{s:13:\"\0*\0connection\";s:5:\"mysql\";s:8:\"\0*\0table\";s:10:\"menu_items\";s:13:\"\0*\0primaryKey\";s:2:\"id\";s:10:\"\0*\0keyType\";s:3:\"int\";s:12:\"incrementing\";b:1;s:7:\"\0*\0with\";a:0:{}s:12:\"\0*\0withCount\";a:0:{}s:19:\"preventsLazyLoading\";b:0;s:10:\"\0*\0perPage\";i:15;s:6:\"exists\";b:1;s:18:\"wasRecentlyCreated\";b:0;s:28:\"\0*\0escapeWhenCastingToString\";b:0;s:13:\"\0*\0attributes\";a:13:{s:2:\"id\";i:16;s:7:\"menu_id\";i:1;s:5:\"title\";s:7:\"Leaders\";s:3:\"url\";s:0:\"\";s:6:\"target\";s:5:\"_self\";s:10:\"icon_class\";N;s:5:\"color\";N;s:9:\"parent_id\";N;s:5:\"order\";i:101;s:10:\"created_at\";s:19:\"2025-02-24 12:25:30\";s:10:\"updated_at\";s:19:\"2025-02-24 12:25:30\";s:5:\"route\";s:21:\"voyager.leaders.index\";s:10:\"parameters\";N;}s:11:\"\0*\0original\";a:13:{s:2:\"id\";i:16;s:7:\"menu_id\";i:1;s:5:\"title\";s:7:\"Leaders\";s:3:\"url\";s:0:\"\";s:6:\"target\";s:5:\"_self\";s:10:\"icon_class\";N;s:5:\"color\";N;s:9:\"parent_id\";N;s:5:\"order\";i:101;s:10:\"created_at\";s:19:\"2025-02-24 12:25:30\";s:10:\"updated_at\";s:19:\"2025-02-24 12:25:30\";s:5:\"route\";s:21:\"voyager.leaders.index\";s:10:\"parameters\";N;}s:10:\"\0*\0changes\";a:0:{}s:8:\"\0*\0casts\";a:0:{}s:17:\"\0*\0classCastCache\";a:0:{}s:21:\"\0*\0attributeCastCache\";a:0:{}s:13:\"\0*\0dateFormat\";N;s:10:\"\0*\0appends\";a:0:{}s:19:\"\0*\0dispatchesEvents\";a:0:{}s:14:\"\0*\0observables\";a:0:{}s:12:\"\0*\0relations\";a:1:{s:8:\"children\";O:39:\"Illuminate\\Database\\Eloquent\\Collection\":2:{s:8:\"\0*\0items\";a:0:{}s:28:\"\0*\0escapeWhenCastingToString\";b:0;}}s:10:\"\0*\0touches\";a:0:{}s:10:\"timestamps\";b:1;s:13:\"usesUniqueIds\";b:0;s:9:\"\0*\0hidden\";a:0:{}s:10:\"\0*\0visible\";a:0:{}s:11:\"\0*\0fillable\";a:0:{}s:10:\"\0*\0guarded\";a:0:{}s:20:\"\0*\0translatorMethods\";a:1:{s:4:\"link\";s:14:\"translatorLink\";}s:15:\"\0*\0translatable\";a:1:{i:0;s:5:\"title\";}}i:12;O:27:\"TCG\\Voyager\\Models\\MenuItem\":32:{s:13:\"\0*\0connection\";s:5:\"mysql\";s:8:\"\0*\0table\";s:10:\"menu_items\";s:13:\"\0*\0primaryKey\";s:2:\"id\";s:10:\"\0*\0keyType\";s:3:\"int\";s:12:\"incrementing\";b:1;s:7:\"\0*\0with\";a:0:{}s:12:\"\0*\0withCount\";a:0:{}s:19:\"preventsLazyLoading\";b:0;s:10:\"\0*\0perPage\";i:15;s:6:\"exists\";b:1;s:18:\"wasRecentlyCreated\";b:0;s:28:\"\0*\0escapeWhenCastingToString\";b:0;s:13:\"\0*\0attributes\";a:13:{s:2:\"id\";i:17;s:7:\"menu_id\";i:1;s:5:\"title\";s:6:\"Sports\";s:3:\"url\";s:0:\"\";s:6:\"target\";s:5:\"_self\";s:10:\"icon_class\";N;s:5:\"color\";N;s:9:\"parent_id\";N;s:5:\"order\";i:102;s:10:\"created_at\";s:19:\"2025-02-28 11:18:42\";s:10:\"updated_at\";s:19:\"2025-02-28 11:18:42\";s:5:\"route\";s:20:\"voyager.sports.index\";s:10:\"parameters\";N;}s:11:\"\0*\0original\";a:13:{s:2:\"id\";i:17;s:7:\"menu_id\";i:1;s:5:\"title\";s:6:\"Sports\";s:3:\"url\";s:0:\"\";s:6:\"target\";s:5:\"_self\";s:10:\"icon_class\";N;s:5:\"color\";N;s:9:\"parent_id\";N;s:5:\"order\";i:102;s:10:\"created_at\";s:19:\"2025-02-28 11:18:42\";s:10:\"updated_at\";s:19:\"2025-02-28 11:18:42\";s:5:\"route\";s:20:\"voyager.sports.index\";s:10:\"parameters\";N;}s:10:\"\0*\0changes\";a:0:{}s:8:\"\0*\0casts\";a:0:{}s:17:\"\0*\0classCastCache\";a:0:{}s:21:\"\0*\0attributeCastCache\";a:0:{}s:13:\"\0*\0dateFormat\";N;s:10:\"\0*\0appends\";a:0:{}s:19:\"\0*\0dispatchesEvents\";a:0:{}s:14:\"\0*\0observables\";a:0:{}s:12:\"\0*\0relations\";a:1:{s:8:\"children\";O:39:\"Illuminate\\Database\\Eloquent\\Collection\":2:{s:8:\"\0*\0items\";a:0:{}s:28:\"\0*\0escapeWhenCastingToString\";b:0;}}s:10:\"\0*\0touches\";a:0:{}s:10:\"timestamps\";b:1;s:13:\"usesUniqueIds\";b:0;s:9:\"\0*\0hidden\";a:0:{}s:10:\"\0*\0visible\";a:0:{}s:11:\"\0*\0fillable\";a:0:{}s:10:\"\0*\0guarded\";a:0:{}s:20:\"\0*\0translatorMethods\";a:1:{s:4:\"link\";s:14:\"translatorLink\";}s:15:\"\0*\0translatable\";a:1:{i:0;s:5:\"title\";}}i:13;O:27:\"TCG\\Voyager\\Models\\MenuItem\":32:{s:13:\"\0*\0connection\";s:5:\"mysql\";s:8:\"\0*\0table\";s:10:\"menu_items\";s:13:\"\0*\0primaryKey\";s:2:\"id\";s:10:\"\0*\0keyType\";s:3:\"int\";s:12:\"incrementing\";b:1;s:7:\"\0*\0with\";a:0:{}s:12:\"\0*\0withCount\";a:0:{}s:19:\"preventsLazyLoading\";b:0;s:10:\"\0*\0perPage\";i:15;s:6:\"exists\";b:1;s:18:\"wasRecentlyCreated\";b:0;s:28:\"\0*\0escapeWhenCastingToString\";b:0;s:13:\"\0*\0attributes\";a:13:{s:2:\"id\";i:18;s:7:\"menu_id\";i:1;s:5:\"title\";s:4:\"News\";s:3:\"url\";s:0:\"\";s:6:\"target\";s:5:\"_self\";s:10:\"icon_class\";N;s:5:\"color\";N;s:9:\"parent_id\";N;s:5:\"order\";i:103;s:10:\"created_at\";s:19:\"2025-03-20 03:29:32\";s:10:\"updated_at\";s:19:\"2025-03-20 03:29:32\";s:5:\"route\";s:18:\"voyager.news.index\";s:10:\"parameters\";N;}s:11:\"\0*\0original\";a:13:{s:2:\"id\";i:18;s:7:\"menu_id\";i:1;s:5:\"title\";s:4:\"News\";s:3:\"url\";s:0:\"\";s:6:\"target\";s:5:\"_self\";s:10:\"icon_class\";N;s:5:\"color\";N;s:9:\"parent_id\";N;s:5:\"order\";i:103;s:10:\"created_at\";s:19:\"2025-03-20 03:29:32\";s:10:\"updated_at\";s:19:\"2025-03-20 03:29:32\";s:5:\"route\";s:18:\"voyager.news.index\";s:10:\"parameters\";N;}s:10:\"\0*\0changes\";a:0:{}s:8:\"\0*\0casts\";a:0:{}s:17:\"\0*\0classCastCache\";a:0:{}s:21:\"\0*\0attributeCastCache\";a:0:{}s:13:\"\0*\0dateFormat\";N;s:10:\"\0*\0appends\";a:0:{}s:19:\"\0*\0dispatchesEvents\";a:0:{}s:14:\"\0*\0observables\";a:0:{}s:12:\"\0*\0relations\";a:1:{s:8:\"children\";O:39:\"Illuminate\\Database\\Eloquent\\Collection\":2:{s:8:\"\0*\0items\";a:0:{}s:28:\"\0*\0escapeWhenCastingToString\";b:0;}}s:10:\"\0*\0touches\";a:0:{}s:10:\"timestamps\";b:1;s:13:\"usesUniqueIds\";b:0;s:9:\"\0*\0hidden\";a:0:{}s:10:\"\0*\0visible\";a:0:{}s:11:\"\0*\0fillable\";a:0:{}s:10:\"\0*\0guarded\";a:0:{}s:20:\"\0*\0translatorMethods\";a:1:{s:4:\"link\";s:14:\"translatorLink\";}s:15:\"\0*\0translatable\";a:1:{i:0;s:5:\"title\";}}i:14;O:27:\"TCG\\Voyager\\Models\\MenuItem\":32:{s:13:\"\0*\0connection\";s:5:\"mysql\";s:8:\"\0*\0table\";s:10:\"menu_items\";s:13:\"\0*\0primaryKey\";s:2:\"id\";s:10:\"\0*\0keyType\";s:3:\"int\";s:12:\"incrementing\";b:1;s:7:\"\0*\0with\";a:0:{}s:12:\"\0*\0withCount\";a:0:{}s:19:\"preventsLazyLoading\";b:0;s:10:\"\0*\0perPage\";i:15;s:6:\"exists\";b:1;s:18:\"wasRecentlyCreated\";b:0;s:28:\"\0*\0escapeWhenCastingToString\";b:0;s:13:\"\0*\0attributes\";a:13:{s:2:\"id\";i:19;s:7:\"menu_id\";i:1;s:5:\"title\";s:6:\"Events\";s:3:\"url\";s:0:\"\";s:6:\"target\";s:5:\"_self\";s:10:\"icon_class\";N;s:5:\"color\";N;s:9:\"parent_id\";N;s:5:\"order\";i:104;s:10:\"created_at\";s:19:\"2025-03-22 02:43:17\";s:10:\"updated_at\";s:19:\"2025-03-22 02:43:17\";s:5:\"route\";s:20:\"voyager.events.index\";s:10:\"parameters\";N;}s:11:\"\0*\0original\";a:13:{s:2:\"id\";i:19;s:7:\"menu_id\";i:1;s:5:\"title\";s:6:\"Events\";s:3:\"url\";s:0:\"\";s:6:\"target\";s:5:\"_self\";s:10:\"icon_class\";N;s:5:\"color\";N;s:9:\"parent_id\";N;s:5:\"order\";i:104;s:10:\"created_at\";s:19:\"2025-03-22 02:43:17\";s:10:\"updated_at\";s:19:\"2025-03-22 02:43:17\";s:5:\"route\";s:20:\"voyager.events.index\";s:10:\"parameters\";N;}s:10:\"\0*\0changes\";a:0:{}s:8:\"\0*\0casts\";a:0:{}s:17:\"\0*\0classCastCache\";a:0:{}s:21:\"\0*\0attributeCastCache\";a:0:{}s:13:\"\0*\0dateFormat\";N;s:10:\"\0*\0appends\";a:0:{}s:19:\"\0*\0dispatchesEvents\";a:0:{}s:14:\"\0*\0observables\";a:0:{}s:12:\"\0*\0relations\";a:1:{s:8:\"children\";O:39:\"Illuminate\\Database\\Eloquent\\Collection\":2:{s:8:\"\0*\0items\";a:0:{}s:28:\"\0*\0escapeWhenCastingToString\";b:0;}}s:10:\"\0*\0touches\";a:0:{}s:10:\"timestamps\";b:1;s:13:\"usesUniqueIds\";b:0;s:9:\"\0*\0hidden\";a:0:{}s:10:\"\0*\0visible\";a:0:{}s:11:\"\0*\0fillable\";a:0:{}s:10:\"\0*\0guarded\";a:0:{}s:20:\"\0*\0translatorMethods\";a:1:{s:4:\"link\";s:14:\"translatorLink\";}s:15:\"\0*\0translatable\";a:1:{i:0;s:5:\"title\";}}i:15;O:27:\"TCG\\Voyager\\Models\\MenuItem\":32:{s:13:\"\0*\0connection\";s:5:\"mysql\";s:8:\"\0*\0table\";s:10:\"menu_items\";s:13:\"\0*\0primaryKey\";s:2:\"id\";s:10:\"\0*\0keyType\";s:3:\"int\";s:12:\"incrementing\";b:1;s:7:\"\0*\0with\";a:0:{}s:12:\"\0*\0withCount\";a:0:{}s:19:\"preventsLazyLoading\";b:0;s:10:\"\0*\0perPage\";i:15;s:6:\"exists\";b:1;s:18:\"wasRecentlyCreated\";b:0;s:28:\"\0*\0escapeWhenCastingToString\";b:0;s:13:\"\0*\0attributes\";a:13:{s:2:\"id\";i:20;s:7:\"menu_id\";i:1;s:5:\"title\";s:19:\"Event Registrations\";s:3:\"url\";s:0:\"\";s:6:\"target\";s:5:\"_self\";s:10:\"icon_class\";N;s:5:\"color\";N;s:9:\"parent_id\";N;s:5:\"order\";i:105;s:10:\"created_at\";s:19:\"2025-03-23 11:06:07\";s:10:\"updated_at\";s:19:\"2025-03-23 11:06:07\";s:5:\"route\";s:33:\"voyager.event-registrations.index\";s:10:\"parameters\";N;}s:11:\"\0*\0original\";a:13:{s:2:\"id\";i:20;s:7:\"menu_id\";i:1;s:5:\"title\";s:19:\"Event Registrations\";s:3:\"url\";s:0:\"\";s:6:\"target\";s:5:\"_self\";s:10:\"icon_class\";N;s:5:\"color\";N;s:9:\"parent_id\";N;s:5:\"order\";i:105;s:10:\"created_at\";s:19:\"2025-03-23 11:06:07\";s:10:\"updated_at\";s:19:\"2025-03-23 11:06:07\";s:5:\"route\";s:33:\"voyager.event-registrations.index\";s:10:\"parameters\";N;}s:10:\"\0*\0changes\";a:0:{}s:8:\"\0*\0casts\";a:0:{}s:17:\"\0*\0classCastCache\";a:0:{}s:21:\"\0*\0attributeCastCache\";a:0:{}s:13:\"\0*\0dateFormat\";N;s:10:\"\0*\0appends\";a:0:{}s:19:\"\0*\0dispatchesEvents\";a:0:{}s:14:\"\0*\0observables\";a:0:{}s:12:\"\0*\0relations\";a:1:{s:8:\"children\";O:39:\"Illuminate\\Database\\Eloquent\\Collection\":2:{s:8:\"\0*\0items\";a:0:{}s:28:\"\0*\0escapeWhenCastingToString\";b:0;}}s:10:\"\0*\0touches\";a:0:{}s:10:\"timestamps\";b:1;s:13:\"usesUniqueIds\";b:0;s:9:\"\0*\0hidden\";a:0:{}s:10:\"\0*\0visible\";a:0:{}s:11:\"\0*\0fillable\";a:0:{}s:10:\"\0*\0guarded\";a:0:{}s:20:\"\0*\0translatorMethods\";a:1:{s:4:\"link\";s:14:\"translatorLink\";}s:15:\"\0*\0translatable\";a:1:{i:0;s:5:\"title\";}}i:16;O:27:\"TCG\\Voyager\\Models\\MenuItem\":32:{s:13:\"\0*\0connection\";s:5:\"mysql\";s:8:\"\0*\0table\";s:10:\"menu_items\";s:13:\"\0*\0primaryKey\";s:2:\"id\";s:10:\"\0*\0keyType\";s:3:\"int\";s:12:\"incrementing\";b:1;s:7:\"\0*\0with\";a:0:{}s:12:\"\0*\0withCount\";a:0:{}s:19:\"preventsLazyLoading\";b:0;s:10:\"\0*\0perPage\";i:15;s:6:\"exists\";b:1;s:18:\"wasRecentlyCreated\";b:0;s:28:\"\0*\0escapeWhenCastingToString\";b:0;s:13:\"\0*\0attributes\";a:13:{s:2:\"id\";i:21;s:7:\"menu_id\";i:1;s:5:\"title\";s:23:\"Internship Applications\";s:3:\"url\";s:0:\"\";s:6:\"target\";s:5:\"_self\";s:10:\"icon_class\";N;s:5:\"color\";N;s:9:\"parent_id\";N;s:5:\"order\";i:106;s:10:\"created_at\";s:19:\"2025-03-23 11:06:24\";s:10:\"updated_at\";s:19:\"2025-03-23 11:06:24\";s:5:\"route\";s:37:\"voyager.internship-applications.index\";s:10:\"parameters\";N;}s:11:\"\0*\0original\";a:13:{s:2:\"id\";i:21;s:7:\"menu_id\";i:1;s:5:\"title\";s:23:\"Internship Applications\";s:3:\"url\";s:0:\"\";s:6:\"target\";s:5:\"_self\";s:10:\"icon_class\";N;s:5:\"color\";N;s:9:\"parent_id\";N;s:5:\"order\";i:106;s:10:\"created_at\";s:19:\"2025-03-23 11:06:24\";s:10:\"updated_at\";s:19:\"2025-03-23 11:06:24\";s:5:\"route\";s:37:\"voyager.internship-applications.index\";s:10:\"parameters\";N;}s:10:\"\0*\0changes\";a:0:{}s:8:\"\0*\0casts\";a:0:{}s:17:\"\0*\0classCastCache\";a:0:{}s:21:\"\0*\0attributeCastCache\";a:0:{}s:13:\"\0*\0dateFormat\";N;s:10:\"\0*\0appends\";a:0:{}s:19:\"\0*\0dispatchesEvents\";a:0:{}s:14:\"\0*\0observables\";a:0:{}s:12:\"\0*\0relations\";a:1:{s:8:\"children\";O:39:\"Illuminate\\Database\\Eloquent\\Collection\":2:{s:8:\"\0*\0items\";a:0:{}s:28:\"\0*\0escapeWhenCastingToString\";b:0;}}s:10:\"\0*\0touches\";a:0:{}s:10:\"timestamps\";b:1;s:13:\"usesUniqueIds\";b:0;s:9:\"\0*\0hidden\";a:0:{}s:10:\"\0*\0visible\";a:0:{}s:11:\"\0*\0fillable\";a:0:{}s:10:\"\0*\0guarded\";a:0:{}s:20:\"\0*\0translatorMethods\";a:1:{s:4:\"link\";s:14:\"translatorLink\";}s:15:\"\0*\0translatable\";a:1:{i:0;s:5:\"title\";}}i:17;O:27:\"TCG\\Voyager\\Models\\MenuItem\":32:{s:13:\"\0*\0connection\";s:5:\"mysql\";s:8:\"\0*\0table\";s:10:\"menu_items\";s:13:\"\0*\0primaryKey\";s:2:\"id\";s:10:\"\0*\0keyType\";s:3:\"int\";s:12:\"incrementing\";b:1;s:7:\"\0*\0with\";a:0:{}s:12:\"\0*\0withCount\";a:0:{}s:19:\"preventsLazyLoading\";b:0;s:10:\"\0*\0perPage\";i:15;s:6:\"exists\";b:1;s:18:\"wasRecentlyCreated\";b:0;s:28:\"\0*\0escapeWhenCastingToString\";b:0;s:13:\"\0*\0attributes\";a:13:{s:2:\"id\";i:22;s:7:\"menu_id\";i:1;s:5:\"title\";s:15:\"Facility Images\";s:3:\"url\";s:0:\"\";s:6:\"target\";s:5:\"_self\";s:10:\"icon_class\";N;s:5:\"color\";N;s:9:\"parent_id\";N;s:5:\"order\";i:107;s:10:\"created_at\";s:19:\"2025-03-23 11:06:35\";s:10:\"updated_at\";s:19:\"2025-03-23 11:06:35\";s:5:\"route\";s:29:\"voyager.facility-images.index\";s:10:\"parameters\";N;}s:11:\"\0*\0original\";a:13:{s:2:\"id\";i:22;s:7:\"menu_id\";i:1;s:5:\"title\";s:15:\"Facility Images\";s:3:\"url\";s:0:\"\";s:6:\"target\";s:5:\"_self\";s:10:\"icon_class\";N;s:5:\"color\";N;s:9:\"parent_id\";N;s:5:\"order\";i:107;s:10:\"created_at\";s:19:\"2025-03-23 11:06:35\";s:10:\"updated_at\";s:19:\"2025-03-23 11:06:35\";s:5:\"route\";s:29:\"voyager.facility-images.index\";s:10:\"parameters\";N;}s:10:\"\0*\0changes\";a:0:{}s:8:\"\0*\0casts\";a:0:{}s:17:\"\0*\0classCastCache\";a:0:{}s:21:\"\0*\0attributeCastCache\";a:0:{}s:13:\"\0*\0dateFormat\";N;s:10:\"\0*\0appends\";a:0:{}s:19:\"\0*\0dispatchesEvents\";a:0:{}s:14:\"\0*\0observables\";a:0:{}s:12:\"\0*\0relations\";a:1:{s:8:\"children\";O:39:\"Illuminate\\Database\\Eloquent\\Collection\":2:{s:8:\"\0*\0items\";a:0:{}s:28:\"\0*\0escapeWhenCastingToString\";b:0;}}s:10:\"\0*\0touches\";a:0:{}s:10:\"timestamps\";b:1;s:13:\"usesUniqueIds\";b:0;s:9:\"\0*\0hidden\";a:0:{}s:10:\"\0*\0visible\";a:0:{}s:11:\"\0*\0fillable\";a:0:{}s:10:\"\0*\0guarded\";a:0:{}s:20:\"\0*\0translatorMethods\";a:1:{s:4:\"link\";s:14:\"translatorLink\";}s:15:\"\0*\0translatable\";a:1:{i:0;s:5:\"title\";}}i:18;O:27:\"TCG\\Voyager\\Models\\MenuItem\":32:{s:13:\"\0*\0connection\";s:5:\"mysql\";s:8:\"\0*\0table\";s:10:\"menu_items\";s:13:\"\0*\0primaryKey\";s:2:\"id\";s:10:\"\0*\0keyType\";s:3:\"int\";s:12:\"incrementing\";b:1;s:7:\"\0*\0with\";a:0:{}s:12:\"\0*\0withCount\";a:0:{}s:19:\"preventsLazyLoading\";b:0;s:10:\"\0*\0perPage\";i:15;s:6:\"exists\";b:1;s:18:\"wasRecentlyCreated\";b:0;s:28:\"\0*\0escapeWhenCastingToString\";b:0;s:13:\"\0*\0attributes\";a:13:{s:2:\"id\";i:23;s:7:\"menu_id\";i:1;s:5:\"title\";s:10:\"Facilities\";s:3:\"url\";s:0:\"\";s:6:\"target\";s:5:\"_self\";s:10:\"icon_class\";N;s:5:\"color\";N;s:9:\"parent_id\";N;s:5:\"order\";i:108;s:10:\"created_at\";s:19:\"2025-03-23 11:06:48\";s:10:\"updated_at\";s:19:\"2025-03-23 11:06:48\";s:5:\"route\";s:24:\"voyager.facilities.index\";s:10:\"parameters\";N;}s:11:\"\0*\0original\";a:13:{s:2:\"id\";i:23;s:7:\"menu_id\";i:1;s:5:\"title\";s:10:\"Facilities\";s:3:\"url\";s:0:\"\";s:6:\"target\";s:5:\"_self\";s:10:\"icon_class\";N;s:5:\"color\";N;s:9:\"parent_id\";N;s:5:\"order\";i:108;s:10:\"created_at\";s:19:\"2025-03-23 11:06:48\";s:10:\"updated_at\";s:19:\"2025-03-23 11:06:48\";s:5:\"route\";s:24:\"voyager.facilities.index\";s:10:\"parameters\";N;}s:10:\"\0*\0changes\";a:0:{}s:8:\"\0*\0casts\";a:0:{}s:17:\"\0*\0classCastCache\";a:0:{}s:21:\"\0*\0attributeCastCache\";a:0:{}s:13:\"\0*\0dateFormat\";N;s:10:\"\0*\0appends\";a:0:{}s:19:\"\0*\0dispatchesEvents\";a:0:{}s:14:\"\0*\0observables\";a:0:{}s:12:\"\0*\0relations\";a:1:{s:8:\"children\";O:39:\"Illuminate\\Database\\Eloquent\\Collection\":2:{s:8:\"\0*\0items\";a:0:{}s:28:\"\0*\0escapeWhenCastingToString\";b:0;}}s:10:\"\0*\0touches\";a:0:{}s:10:\"timestamps\";b:1;s:13:\"usesUniqueIds\";b:0;s:9:\"\0*\0hidden\";a:0:{}s:10:\"\0*\0visible\";a:0:{}s:11:\"\0*\0fillable\";a:0:{}s:10:\"\0*\0guarded\";a:0:{}s:20:\"\0*\0translatorMethods\";a:1:{s:4:\"link\";s:14:\"translatorLink\";}s:15:\"\0*\0translatable\";a:1:{i:0;s:5:\"title\";}}i:19;O:27:\"TCG\\Voyager\\Models\\MenuItem\":32:{s:13:\"\0*\0connection\";s:5:\"mysql\";s:8:\"\0*\0table\";s:10:\"menu_items\";s:13:\"\0*\0primaryKey\";s:2:\"id\";s:10:\"\0*\0keyType\";s:3:\"int\";s:12:\"incrementing\";b:1;s:7:\"\0*\0with\";a:0:{}s:12:\"\0*\0withCount\";a:0:{}s:19:\"preventsLazyLoading\";b:0;s:10:\"\0*\0perPage\";i:15;s:6:\"exists\";b:1;s:18:\"wasRecentlyCreated\";b:0;s:28:\"\0*\0escapeWhenCastingToString\";b:0;s:13:\"\0*\0attributes\";a:13:{s:2:\"id\";i:24;s:7:\"menu_id\";i:1;s:5:\"title\";s:11:\"Live Scores\";s:3:\"url\";s:0:\"\";s:6:\"target\";s:5:\"_self\";s:10:\"icon_class\";N;s:5:\"color\";N;s:9:\"parent_id\";N;s:5:\"order\";i:109;s:10:\"created_at\";s:19:\"2025-03-23 11:07:02\";s:10:\"updated_at\";s:19:\"2025-03-23 11:07:02\";s:5:\"route\";s:25:\"voyager.live-scores.index\";s:10:\"parameters\";N;}s:11:\"\0*\0original\";a:13:{s:2:\"id\";i:24;s:7:\"menu_id\";i:1;s:5:\"title\";s:11:\"Live Scores\";s:3:\"url\";s:0:\"\";s:6:\"target\";s:5:\"_self\";s:10:\"icon_class\";N;s:5:\"color\";N;s:9:\"parent_id\";N;s:5:\"order\";i:109;s:10:\"created_at\";s:19:\"2025-03-23 11:07:02\";s:10:\"updated_at\";s:19:\"2025-03-23 11:07:02\";s:5:\"route\";s:25:\"voyager.live-scores.index\";s:10:\"parameters\";N;}s:10:\"\0*\0changes\";a:0:{}s:8:\"\0*\0casts\";a:0:{}s:17:\"\0*\0classCastCache\";a:0:{}s:21:\"\0*\0attributeCastCache\";a:0:{}s:13:\"\0*\0dateFormat\";N;s:10:\"\0*\0appends\";a:0:{}s:19:\"\0*\0dispatchesEvents\";a:0:{}s:14:\"\0*\0observables\";a:0:{}s:12:\"\0*\0relations\";a:1:{s:8:\"children\";O:39:\"Illuminate\\Database\\Eloquent\\Collection\":2:{s:8:\"\0*\0items\";a:0:{}s:28:\"\0*\0escapeWhenCastingToString\";b:0;}}s:10:\"\0*\0touches\";a:0:{}s:10:\"timestamps\";b:1;s:13:\"usesUniqueIds\";b:0;s:9:\"\0*\0hidden\";a:0:{}s:10:\"\0*\0visible\";a:0:{}s:11:\"\0*\0fillable\";a:0:{}s:10:\"\0*\0guarded\";a:0:{}s:20:\"\0*\0translatorMethods\";a:1:{s:4:\"link\";s:14:\"translatorLink\";}s:15:\"\0*\0translatable\";a:1:{i:0;s:5:\"title\";}}i:20;O:27:\"TCG\\Voyager\\Models\\MenuItem\":32:{s:13:\"\0*\0connection\";s:5:\"mysql\";s:8:\"\0*\0table\";s:10:\"menu_items\";s:13:\"\0*\0primaryKey\";s:2:\"id\";s:10:\"\0*\0keyType\";s:3:\"int\";s:12:\"incrementing\";b:1;s:7:\"\0*\0with\";a:0:{}s:12:\"\0*\0withCount\";a:0:{}s:19:\"preventsLazyLoading\";b:0;s:10:\"\0*\0perPage\";i:15;s:6:\"exists\";b:1;s:18:\"wasRecentlyCreated\";b:0;s:28:\"\0*\0escapeWhenCastingToString\";b:0;s:13:\"\0*\0attributes\";a:13:{s:2:\"id\";i:25;s:7:\"menu_id\";i:1;s:5:\"title\";s:24:\"News Announcement Events\";s:3:\"url\";s:0:\"\";s:6:\"target\";s:5:\"_self\";s:10:\"icon_class\";N;s:5:\"color\";N;s:9:\"parent_id\";N;s:5:\"order\";i:110;s:10:\"created_at\";s:19:\"2025-03-23 11:07:44\";s:10:\"updated_at\";s:19:\"2025-03-23 11:07:44\";s:5:\"route\";s:38:\"voyager.news-announcement-events.index\";s:10:\"parameters\";N;}s:11:\"\0*\0original\";a:13:{s:2:\"id\";i:25;s:7:\"menu_id\";i:1;s:5:\"title\";s:24:\"News Announcement Events\";s:3:\"url\";s:0:\"\";s:6:\"target\";s:5:\"_self\";s:10:\"icon_class\";N;s:5:\"color\";N;s:9:\"parent_id\";N;s:5:\"order\";i:110;s:10:\"created_at\";s:19:\"2025-03-23 11:07:44\";s:10:\"updated_at\";s:19:\"2025-03-23 11:07:44\";s:5:\"route\";s:38:\"voyager.news-announcement-events.index\";s:10:\"parameters\";N;}s:10:\"\0*\0changes\";a:0:{}s:8:\"\0*\0casts\";a:0:{}s:17:\"\0*\0classCastCache\";a:0:{}s:21:\"\0*\0attributeCastCache\";a:0:{}s:13:\"\0*\0dateFormat\";N;s:10:\"\0*\0appends\";a:0:{}s:19:\"\0*\0dispatchesEvents\";a:0:{}s:14:\"\0*\0observables\";a:0:{}s:12:\"\0*\0relations\";a:1:{s:8:\"children\";O:39:\"Illuminate\\Database\\Eloquent\\Collection\":2:{s:8:\"\0*\0items\";a:0:{}s:28:\"\0*\0escapeWhenCastingToString\";b:0;}}s:10:\"\0*\0touches\";a:0:{}s:10:\"timestamps\";b:1;s:13:\"usesUniqueIds\";b:0;s:9:\"\0*\0hidden\";a:0:{}s:10:\"\0*\0visible\";a:0:{}s:11:\"\0*\0fillable\";a:0:{}s:10:\"\0*\0guarded\";a:0:{}s:20:\"\0*\0translatorMethods\";a:1:{s:4:\"link\";s:14:\"translatorLink\";}s:15:\"\0*\0translatable\";a:1:{i:0;s:5:\"title\";}}i:21;O:27:\"TCG\\Voyager\\Models\\MenuItem\":32:{s:13:\"\0*\0connection\";s:5:\"mysql\";s:8:\"\0*\0table\";s:10:\"menu_items\";s:13:\"\0*\0primaryKey\";s:2:\"id\";s:10:\"\0*\0keyType\";s:3:\"int\";s:12:\"incrementing\";b:1;s:7:\"\0*\0with\";a:0:{}s:12:\"\0*\0withCount\";a:0:{}s:19:\"preventsLazyLoading\";b:0;s:10:\"\0*\0perPage\";i:15;s:6:\"exists\";b:1;s:18:\"wasRecentlyCreated\";b:0;s:28:\"\0*\0escapeWhenCastingToString\";b:0;s:13:\"\0*\0attributes\";a:13:{s:2:\"id\";i:26;s:7:\"menu_id\";i:1;s:5:\"title\";s:17:\"Training Programs\";s:3:\"url\";s:0:\"\";s:6:\"target\";s:5:\"_self\";s:10:\"icon_class\";N;s:5:\"color\";N;s:9:\"parent_id\";N;s:5:\"order\";i:111;s:10:\"created_at\";s:19:\"2025-03-25 13:16:53\";s:10:\"updated_at\";s:19:\"2025-03-25 13:16:53\";s:5:\"route\";s:31:\"voyager.training-programs.index\";s:10:\"parameters\";N;}s:11:\"\0*\0original\";a:13:{s:2:\"id\";i:26;s:7:\"menu_id\";i:1;s:5:\"title\";s:17:\"Training Programs\";s:3:\"url\";s:0:\"\";s:6:\"target\";s:5:\"_self\";s:10:\"icon_class\";N;s:5:\"color\";N;s:9:\"parent_id\";N;s:5:\"order\";i:111;s:10:\"created_at\";s:19:\"2025-03-25 13:16:53\";s:10:\"updated_at\";s:19:\"2025-03-25 13:16:53\";s:5:\"route\";s:31:\"voyager.training-programs.index\";s:10:\"parameters\";N;}s:10:\"\0*\0changes\";a:0:{}s:8:\"\0*\0casts\";a:0:{}s:17:\"\0*\0classCastCache\";a:0:{}s:21:\"\0*\0attributeCastCache\";a:0:{}s:13:\"\0*\0dateFormat\";N;s:10:\"\0*\0appends\";a:0:{}s:19:\"\0*\0dispatchesEvents\";a:0:{}s:14:\"\0*\0observables\";a:0:{}s:12:\"\0*\0relations\";a:1:{s:8:\"children\";O:39:\"Illuminate\\Database\\Eloquent\\Collection\":2:{s:8:\"\0*\0items\";a:0:{}s:28:\"\0*\0escapeWhenCastingToString\";b:0;}}s:10:\"\0*\0touches\";a:0:{}s:10:\"timestamps\";b:1;s:13:\"usesUniqueIds\";b:0;s:9:\"\0*\0hidden\";a:0:{}s:10:\"\0*\0visible\";a:0:{}s:11:\"\0*\0fillable\";a:0:{}s:10:\"\0*\0guarded\";a:0:{}s:20:\"\0*\0translatorMethods\";a:1:{s:4:\"link\";s:14:\"translatorLink\";}s:15:\"\0*\0translatable\";a:1:{i:0;s:5:\"title\";}}i:22;O:27:\"TCG\\Voyager\\Models\\MenuItem\":32:{s:13:\"\0*\0connection\";s:5:\"mysql\";s:8:\"\0*\0table\";s:10:\"menu_items\";s:13:\"\0*\0primaryKey\";s:2:\"id\";s:10:\"\0*\0keyType\";s:3:\"int\";s:12:\"incrementing\";b:1;s:7:\"\0*\0with\";a:0:{}s:12:\"\0*\0withCount\";a:0:{}s:19:\"preventsLazyLoading\";b:0;s:10:\"\0*\0perPage\";i:15;s:6:\"exists\";b:1;s:18:\"wasRecentlyCreated\";b:0;s:28:\"\0*\0escapeWhenCastingToString\";b:0;s:13:\"\0*\0attributes\";a:13:{s:2:\"id\";i:27;s:7:\"menu_id\";i:1;s:5:\"title\";s:9:\"Timelines\";s:3:\"url\";s:0:\"\";s:6:\"target\";s:5:\"_self\";s:10:\"icon_class\";N;s:5:\"color\";N;s:9:\"parent_id\";N;s:5:\"order\";i:112;s:10:\"created_at\";s:19:\"2025-03-30 10:53:30\";s:10:\"updated_at\";s:19:\"2025-03-30 10:53:30\";s:5:\"route\";s:23:\"voyager.timelines.index\";s:10:\"parameters\";N;}s:11:\"\0*\0original\";a:13:{s:2:\"id\";i:27;s:7:\"menu_id\";i:1;s:5:\"title\";s:9:\"Timelines\";s:3:\"url\";s:0:\"\";s:6:\"target\";s:5:\"_self\";s:10:\"icon_class\";N;s:5:\"color\";N;s:9:\"parent_id\";N;s:5:\"order\";i:112;s:10:\"created_at\";s:19:\"2025-03-30 10:53:30\";s:10:\"updated_at\";s:19:\"2025-03-30 10:53:30\";s:5:\"route\";s:23:\"voyager.timelines.index\";s:10:\"parameters\";N;}s:10:\"\0*\0changes\";a:0:{}s:8:\"\0*\0casts\";a:0:{}s:17:\"\0*\0classCastCache\";a:0:{}s:21:\"\0*\0attributeCastCache\";a:0:{}s:13:\"\0*\0dateFormat\";N;s:10:\"\0*\0appends\";a:0:{}s:19:\"\0*\0dispatchesEvents\";a:0:{}s:14:\"\0*\0observables\";a:0:{}s:12:\"\0*\0relations\";a:1:{s:8:\"children\";O:39:\"Illuminate\\Database\\Eloquent\\Collection\":2:{s:8:\"\0*\0items\";a:0:{}s:28:\"\0*\0escapeWhenCastingToString\";b:0;}}s:10:\"\0*\0touches\";a:0:{}s:10:\"timestamps\";b:1;s:13:\"usesUniqueIds\";b:0;s:9:\"\0*\0hidden\";a:0:{}s:10:\"\0*\0visible\";a:0:{}s:11:\"\0*\0fillable\";a:0:{}s:10:\"\0*\0guarded\";a:0:{}s:20:\"\0*\0translatorMethods\";a:1:{s:4:\"link\";s:14:\"translatorLink\";}s:15:\"\0*\0translatable\";a:1:{i:0;s:5:\"title\";}}i:23;O:27:\"TCG\\Voyager\\Models\\MenuItem\":32:{s:13:\"\0*\0connection\";s:5:\"mysql\";s:8:\"\0*\0table\";s:10:\"menu_items\";s:13:\"\0*\0primaryKey\";s:2:\"id\";s:10:\"\0*\0keyType\";s:3:\"int\";s:12:\"incrementing\";b:1;s:7:\"\0*\0with\";a:0:{}s:12:\"\0*\0withCount\";a:0:{}s:19:\"preventsLazyLoading\";b:0;s:10:\"\0*\0perPage\";i:15;s:6:\"exists\";b:1;s:18:\"wasRecentlyCreated\";b:0;s:28:\"\0*\0escapeWhenCastingToString\";b:0;s:13:\"\0*\0attributes\";a:13:{s:2:\"id\";i:28;s:7:\"menu_id\";i:1;s:5:\"title\";s:8:\"Contacts\";s:3:\"url\";s:0:\"\";s:6:\"target\";s:5:\"_self\";s:10:\"icon_class\";N;s:5:\"color\";N;s:9:\"parent_id\";N;s:5:\"order\";i:113;s:10:\"created_at\";s:19:\"2025-04-10 04:58:39\";s:10:\"updated_at\";s:19:\"2025-04-10 04:58:39\";s:5:\"route\";s:22:\"voyager.contacts.index\";s:10:\"parameters\";N;}s:11:\"\0*\0original\";a:13:{s:2:\"id\";i:28;s:7:\"menu_id\";i:1;s:5:\"title\";s:8:\"Contacts\";s:3:\"url\";s:0:\"\";s:6:\"target\";s:5:\"_self\";s:10:\"icon_class\";N;s:5:\"color\";N;s:9:\"parent_id\";N;s:5:\"order\";i:113;s:10:\"created_at\";s:19:\"2025-04-10 04:58:39\";s:10:\"updated_at\";s:19:\"2025-04-10 04:58:39\";s:5:\"route\";s:22:\"voyager.contacts.index\";s:10:\"parameters\";N;}s:10:\"\0*\0changes\";a:0:{}s:8:\"\0*\0casts\";a:0:{}s:17:\"\0*\0classCastCache\";a:0:{}s:21:\"\0*\0attributeCastCache\";a:0:{}s:13:\"\0*\0dateFormat\";N;s:10:\"\0*\0appends\";a:0:{}s:19:\"\0*\0dispatchesEvents\";a:0:{}s:14:\"\0*\0observables\";a:0:{}s:12:\"\0*\0relations\";a:1:{s:8:\"children\";O:39:\"Illuminate\\Database\\Eloquent\\Collection\":2:{s:8:\"\0*\0items\";a:0:{}s:28:\"\0*\0escapeWhenCastingToString\";b:0;}}s:10:\"\0*\0touches\";a:0:{}s:10:\"timestamps\";b:1;s:13:\"usesUniqueIds\";b:0;s:9:\"\0*\0hidden\";a:0:{}s:10:\"\0*\0visible\";a:0:{}s:11:\"\0*\0fillable\";a:0:{}s:10:\"\0*\0guarded\";a:0:{}s:20:\"\0*\0translatorMethods\";a:1:{s:4:\"link\";s:14:\"translatorLink\";}s:15:\"\0*\0translatable\";a:1:{i:0;s:5:\"title\";}}i:24;O:27:\"TCG\\Voyager\\Models\\MenuItem\":32:{s:13:\"\0*\0connection\";s:5:\"mysql\";s:8:\"\0*\0table\";s:10:\"menu_items\";s:13:\"\0*\0primaryKey\";s:2:\"id\";s:10:\"\0*\0keyType\";s:3:\"int\";s:12:\"incrementing\";b:1;s:7:\"\0*\0with\";a:0:{}s:12:\"\0*\0withCount\";a:0:{}s:19:\"preventsLazyLoading\";b:0;s:10:\"\0*\0perPage\";i:15;s:6:\"exists\";b:1;s:18:\"wasRecentlyCreated\";b:0;s:28:\"\0*\0escapeWhenCastingToString\";b:0;s:13:\"\0*\0attributes\";a:13:{s:2:\"id\";i:29;s:7:\"menu_id\";i:1;s:5:\"title\";s:24:\"Newsletter Subscriptions\";s:3:\"url\";s:0:\"\";s:6:\"target\";s:5:\"_self\";s:10:\"icon_class\";N;s:5:\"color\";N;s:9:\"parent_id\";N;s:5:\"order\";i:114;s:10:\"created_at\";s:19:\"2025-04-10 04:59:23\";s:10:\"updated_at\";s:19:\"2025-04-10 04:59:23\";s:5:\"route\";s:38:\"voyager.newsletter-subscriptions.index\";s:10:\"parameters\";N;}s:11:\"\0*\0original\";a:13:{s:2:\"id\";i:29;s:7:\"menu_id\";i:1;s:5:\"title\";s:24:\"Newsletter Subscriptions\";s:3:\"url\";s:0:\"\";s:6:\"target\";s:5:\"_self\";s:10:\"icon_class\";N;s:5:\"color\";N;s:9:\"parent_id\";N;s:5:\"order\";i:114;s:10:\"created_at\";s:19:\"2025-04-10 04:59:23\";s:10:\"updated_at\";s:19:\"2025-04-10 04:59:23\";s:5:\"route\";s:38:\"voyager.newsletter-subscriptions.index\";s:10:\"parameters\";N;}s:10:\"\0*\0changes\";a:0:{}s:8:\"\0*\0casts\";a:0:{}s:17:\"\0*\0classCastCache\";a:0:{}s:21:\"\0*\0attributeCastCache\";a:0:{}s:13:\"\0*\0dateFormat\";N;s:10:\"\0*\0appends\";a:0:{}s:19:\"\0*\0dispatchesEvents\";a:0:{}s:14:\"\0*\0observables\";a:0:{}s:12:\"\0*\0relations\";a:1:{s:8:\"children\";O:39:\"Illuminate\\Database\\Eloquent\\Collection\":2:{s:8:\"\0*\0items\";a:0:{}s:28:\"\0*\0escapeWhenCastingToString\";b:0;}}s:10:\"\0*\0touches\";a:0:{}s:10:\"timestamps\";b:1;s:13:\"usesUniqueIds\";b:0;s:9:\"\0*\0hidden\";a:0:{}s:10:\"\0*\0visible\";a:0:{}s:11:\"\0*\0fillable\";a:0:{}s:10:\"\0*\0guarded\";a:0:{}s:20:\"\0*\0translatorMethods\";a:1:{s:4:\"link\";s:14:\"translatorLink\";}s:15:\"\0*\0translatable\";a:1:{i:0;s:5:\"title\";}}}s:28:\"\0*\0escapeWhenCastingToString\";b:0;}}s:10:\"\0*\0touches\";a:0:{}s:10:\"timestamps\";b:1;s:13:\"usesUniqueIds\";b:0;s:9:\"\0*\0hidden\";a:0:{}s:10:\"\0*\0visible\";a:0:{}s:11:\"\0*\0fillable\";a:0:{}s:10:\"\0*\0guarded\";a:0:{}}', 1746853163);

-- --------------------------------------------------------

--
-- Table structure for table `cache_locks`
--

CREATE TABLE `cache_locks` (
  `key` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `owner` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `expiration` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` int(10) UNSIGNED NOT NULL,
  `parent_id` int(10) UNSIGNED DEFAULT NULL,
  `order` int(11) NOT NULL DEFAULT 1,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `parent_id`, `order`, `name`, `slug`, `created_at`, `updated_at`) VALUES
(3, NULL, 1, 'Research', 'research', '2025-03-20 00:10:02', '2025-03-20 00:10:02'),
(4, NULL, 1, 'Academic', 'academic', '2025-03-20 00:10:02', '2025-03-20 00:10:02'),
(5, NULL, 1, 'Technology', 'technology', '2025-03-20 00:10:02', '2025-03-20 00:10:02'),
(6, NULL, 1, 'Events', 'events', '2025-03-20 00:10:02', '2025-03-20 00:10:02'),
(7, NULL, 1, 'Achievements', 'achievements', '2025-03-20 00:10:02', '2025-03-20 00:10:02');

-- --------------------------------------------------------

--
-- Table structure for table `contacts`
--

CREATE TABLE `contacts` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `subject` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `message` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `data_rows`
--

CREATE TABLE `data_rows` (
  `id` int(10) UNSIGNED NOT NULL,
  `data_type_id` int(10) UNSIGNED NOT NULL,
  `field` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `display_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `required` tinyint(1) NOT NULL DEFAULT 0,
  `browse` tinyint(1) NOT NULL DEFAULT 1,
  `read` tinyint(1) NOT NULL DEFAULT 1,
  `edit` tinyint(1) NOT NULL DEFAULT 1,
  `add` tinyint(1) NOT NULL DEFAULT 1,
  `delete` tinyint(1) NOT NULL DEFAULT 1,
  `details` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `order` int(11) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `data_rows`
--

INSERT INTO `data_rows` (`id`, `data_type_id`, `field`, `type`, `display_name`, `required`, `browse`, `read`, `edit`, `add`, `delete`, `details`, `order`) VALUES
(1, 1, 'id', 'number', 'ID', 1, 0, 0, 0, 0, 0, NULL, 1),
(2, 1, 'name', 'text', 'Name', 1, 1, 1, 1, 1, 1, NULL, 2),
(3, 1, 'email', 'text', 'Email', 1, 1, 1, 1, 1, 1, NULL, 3),
(4, 1, 'password', 'password', 'Password', 1, 0, 0, 1, 1, 0, NULL, 4),
(5, 1, 'remember_token', 'text', 'Remember Token', 0, 0, 0, 0, 0, 0, NULL, 5),
(6, 1, 'created_at', 'timestamp', 'Created At', 0, 1, 1, 0, 0, 0, NULL, 6),
(7, 1, 'updated_at', 'timestamp', 'Updated At', 0, 0, 0, 0, 0, 0, NULL, 7),
(8, 1, 'avatar', 'image', 'Avatar', 0, 1, 1, 1, 1, 1, NULL, 8),
(9, 1, 'user_belongsto_role_relationship', 'relationship', 'Role', 0, 1, 1, 1, 1, 0, '{\"model\":\"TCG\\\\Voyager\\\\Models\\\\Role\",\"table\":\"roles\",\"type\":\"belongsTo\",\"column\":\"role_id\",\"key\":\"id\",\"label\":\"display_name\",\"pivot_table\":\"roles\",\"pivot\":0}', 10),
(10, 1, 'user_belongstomany_role_relationship', 'relationship', 'Roles', 0, 1, 1, 1, 1, 0, '{\"model\":\"TCG\\\\Voyager\\\\Models\\\\Role\",\"table\":\"roles\",\"type\":\"belongsToMany\",\"column\":\"id\",\"key\":\"id\",\"label\":\"display_name\",\"pivot_table\":\"user_roles\",\"pivot\":\"1\",\"taggable\":\"0\"}', 11),
(11, 1, 'settings', 'hidden', 'Settings', 0, 0, 0, 0, 0, 0, NULL, 12),
(12, 2, 'id', 'number', 'ID', 1, 0, 0, 0, 0, 0, NULL, 1),
(13, 2, 'name', 'text', 'Name', 1, 1, 1, 1, 1, 1, NULL, 2),
(14, 2, 'created_at', 'timestamp', 'Created At', 0, 0, 0, 0, 0, 0, NULL, 3),
(15, 2, 'updated_at', 'timestamp', 'Updated At', 0, 0, 0, 0, 0, 0, NULL, 4),
(16, 3, 'id', 'number', 'ID', 1, 0, 0, 0, 0, 0, NULL, 1),
(17, 3, 'name', 'text', 'Name', 1, 1, 1, 1, 1, 1, NULL, 2),
(18, 3, 'created_at', 'timestamp', 'Created At', 0, 0, 0, 0, 0, 0, NULL, 3),
(19, 3, 'updated_at', 'timestamp', 'Updated At', 0, 0, 0, 0, 0, 0, NULL, 4),
(20, 3, 'display_name', 'text', 'Display Name', 1, 1, 1, 1, 1, 1, NULL, 5),
(21, 1, 'role_id', 'text', 'Role', 1, 1, 1, 1, 1, 1, NULL, 9),
(22, 4, 'id', 'number', 'ID', 1, 0, 0, 0, 0, 0, NULL, 1),
(23, 4, 'parent_id', 'select_dropdown', 'Parent', 0, 0, 1, 1, 1, 1, '{\"default\":\"\",\"null\":\"\",\"options\":{\"\":\"-- None --\"},\"relationship\":{\"key\":\"id\",\"label\":\"name\"}}', 2),
(24, 4, 'order', 'text', 'Order', 1, 1, 1, 1, 1, 1, '{\"default\":1}', 3),
(25, 4, 'name', 'text', 'Name', 1, 1, 1, 1, 1, 1, NULL, 4),
(26, 4, 'slug', 'text', 'Slug', 1, 1, 1, 1, 1, 1, '{\"slugify\":{\"origin\":\"name\"}}', 5),
(27, 4, 'created_at', 'timestamp', 'Created At', 0, 0, 1, 0, 0, 0, NULL, 6),
(28, 4, 'updated_at', 'timestamp', 'Updated At', 0, 0, 0, 0, 0, 0, NULL, 7),
(29, 5, 'id', 'number', 'ID', 1, 0, 0, 0, 0, 0, NULL, 1),
(30, 5, 'author_id', 'text', 'Author', 1, 0, 1, 1, 0, 1, NULL, 2),
(31, 5, 'category_id', 'text', 'Category', 1, 0, 1, 1, 1, 0, NULL, 3),
(32, 5, 'title', 'text', 'Title', 1, 1, 1, 1, 1, 1, NULL, 4),
(33, 5, 'excerpt', 'text_area', 'Excerpt', 1, 0, 1, 1, 1, 1, NULL, 5),
(34, 5, 'body', 'rich_text_box', 'Body', 1, 0, 1, 1, 1, 1, NULL, 6),
(35, 5, 'image', 'image', 'Post Image', 0, 1, 1, 1, 1, 1, '{\"resize\":{\"width\":\"1000\",\"height\":\"null\"},\"quality\":\"70%\",\"upsize\":true,\"thumbnails\":[{\"name\":\"medium\",\"scale\":\"50%\"},{\"name\":\"small\",\"scale\":\"25%\"},{\"name\":\"cropped\",\"crop\":{\"width\":\"300\",\"height\":\"250\"}}]}', 7),
(36, 5, 'slug', 'text', 'Slug', 1, 0, 1, 1, 1, 1, '{\"slugify\":{\"origin\":\"title\",\"forceUpdate\":true},\"validation\":{\"rule\":\"unique:posts,slug\"}}', 8),
(37, 5, 'meta_description', 'text_area', 'Meta Description', 1, 0, 1, 1, 1, 1, NULL, 9),
(38, 5, 'meta_keywords', 'text_area', 'Meta Keywords', 1, 0, 1, 1, 1, 1, NULL, 10),
(39, 5, 'status', 'select_dropdown', 'Status', 1, 1, 1, 1, 1, 1, '{\"default\":\"DRAFT\",\"options\":{\"PUBLISHED\":\"published\",\"DRAFT\":\"draft\",\"PENDING\":\"pending\"}}', 11),
(40, 5, 'created_at', 'timestamp', 'Created At', 0, 1, 1, 0, 0, 0, NULL, 12),
(41, 5, 'updated_at', 'timestamp', 'Updated At', 0, 0, 0, 0, 0, 0, NULL, 13),
(42, 5, 'seo_title', 'text', 'SEO Title', 0, 1, 1, 1, 1, 1, NULL, 14),
(43, 5, 'featured', 'checkbox', 'Featured', 1, 1, 1, 1, 1, 1, NULL, 15),
(44, 6, 'id', 'number', 'ID', 1, 0, 0, 0, 0, 0, NULL, 1),
(45, 6, 'author_id', 'text', 'Author', 1, 0, 0, 0, 0, 0, NULL, 2),
(46, 6, 'title', 'text', 'Title', 1, 1, 1, 1, 1, 1, NULL, 3),
(47, 6, 'excerpt', 'text_area', 'Excerpt', 1, 0, 1, 1, 1, 1, NULL, 4),
(48, 6, 'body', 'rich_text_box', 'Body', 1, 0, 1, 1, 1, 1, NULL, 5),
(49, 6, 'slug', 'text', 'Slug', 1, 0, 1, 1, 1, 1, '{\"slugify\":{\"origin\":\"title\"},\"validation\":{\"rule\":\"unique:pages,slug\"}}', 6),
(50, 6, 'meta_description', 'text', 'Meta Description', 1, 0, 1, 1, 1, 1, NULL, 7),
(51, 6, 'meta_keywords', 'text', 'Meta Keywords', 1, 0, 1, 1, 1, 1, NULL, 8),
(52, 6, 'status', 'select_dropdown', 'Status', 1, 1, 1, 1, 1, 1, '{\"default\":\"INACTIVE\",\"options\":{\"INACTIVE\":\"INACTIVE\",\"ACTIVE\":\"ACTIVE\"}}', 9),
(53, 6, 'created_at', 'timestamp', 'Created At', 1, 1, 1, 0, 0, 0, NULL, 10),
(54, 6, 'updated_at', 'timestamp', 'Updated At', 1, 0, 0, 0, 0, 0, NULL, 11),
(55, 6, 'image', 'image', 'Page Image', 0, 1, 1, 1, 1, 1, NULL, 12),
(56, 7, 'id', 'number', 'ID', 1, 0, 0, 0, 0, 0, '{}', 1),
(57, 7, 'year', 'number', 'Year', 1, 1, 1, 1, 1, 1, '{}', 1),
(58, 7, 'month', 'number', 'Month', 1, 1, 1, 1, 1, 1, '\"{\\\"validation\\\":{\\\"rule\\\":\\\"min:1|max:12\\\"}}\"', 1),
(59, 7, 'title', 'text', 'Title', 1, 1, 1, 1, 1, 1, '{}', 1),
(60, 7, 'description', 'text_area', 'Description', 1, 1, 1, 1, 1, 1, '{}', 1),
(61, 7, 'image', 'image', 'Image', 0, 1, 1, 1, 1, 1, '\"{\\\"resize\\\":{\\\"width\\\":\\\"400\\\",\\\"height\\\":\\\"220\\\"},\\\"quality\\\":\\\"70%\\\",\\\"upsize\\\":true,\\\"thumbnails\\\":[{\\\"name\\\":\\\"medium\\\",\\\"scale\\\":\\\"50%\\\"}]}\"', 1),
(62, 7, 'background', 'text', 'Background', 0, 0, 1, 1, 1, 1, '\"{\\\"default\\\":\\\"linear-gradient(165deg, #1E3A8A 0%, #1E40AF 100%)\\\"}\"', 1),
(63, 22, 'id', 'text', 'Id', 1, 1, 1, 1, 1, 1, '{}', 1),
(64, 22, 'title', 'text', 'Title', 1, 1, 1, 1, 1, 1, '{}', 2),
(65, 22, 'subtitle', 'text', 'Subtitle', 0, 1, 1, 1, 1, 1, '{}', 3),
(66, 22, 'image', 'text', 'Image', 1, 1, 1, 1, 1, 1, '{}', 4),
(67, 22, 'button_text', 'text', 'Button Text', 0, 1, 1, 1, 1, 1, '{}', 5),
(68, 22, 'button_link', 'text', 'Button Link', 0, 1, 1, 1, 1, 1, '{}', 6),
(69, 22, 'order', 'text', 'Order', 1, 1, 1, 1, 1, 1, '{}', 7),
(70, 22, 'is_active', 'text', 'Is Active', 1, 1, 1, 1, 1, 1, '{}', 8),
(71, 22, 'created_at', 'timestamp', 'Created At', 0, 1, 1, 1, 0, 1, '{}', 9),
(72, 22, 'updated_at', 'timestamp', 'Updated At', 0, 0, 0, 0, 0, 0, '{}', 10),
(73, 23, 'id', 'text', 'Id', 1, 1, 1, 1, 1, 1, '{}', 1),
(74, 23, 'position', 'text', 'Position', 1, 1, 1, 1, 1, 1, '{}', 2),
(75, 23, 'name', 'text', 'Name', 1, 1, 1, 1, 1, 1, '{}', 3),
(76, 23, 'description', 'text', 'Description', 1, 1, 1, 1, 1, 1, '{}', 4),
(77, 23, 'image', 'image', 'Image', 1, 1, 1, 1, 1, 1, '{\"resize\":{\"width\":\"1000\",\"height\":null},\"quality\":\"70%\",\"upsize\":true,\"thumbnails\":[{\"name\":\"medium\",\"scale\":\"50%\"},{\"name\":\"small\",\"scale\":\"25%\"}]}', 5),
(78, 23, 'responsibilities', 'text_area', 'Responsibilities', 1, 1, 1, 1, 1, 1, '{}', 6),
(79, 23, 'display_order', 'text', 'Display Order', 1, 1, 1, 1, 1, 1, '{}', 7),
(80, 23, 'created_at', 'timestamp', 'Created At', 0, 1, 1, 1, 0, 1, '{}', 8),
(81, 23, 'updated_at', 'timestamp', 'Updated At', 0, 0, 0, 0, 0, 0, '{}', 9),
(82, 7, 'created_at', 'timestamp', 'Created At', 0, 1, 1, 1, 0, 1, '{}', 8),
(83, 7, 'updated_at', 'timestamp', 'Updated At', 0, 0, 0, 0, 0, 0, '{}', 9),
(84, 23, 'author_id', 'number', 'Author Id', 0, 1, 1, 1, 1, 1, '{}', 10),
(85, 24, 'id', 'text', 'Id', 1, 1, 1, 1, 1, 1, '{}', 1),
(86, 24, 'title', 'text', 'Title', 1, 1, 1, 1, 1, 1, '{}', 2),
(87, 24, 'description', 'text', 'Description', 1, 1, 1, 1, 1, 1, '{}', 3),
(88, 24, 'image', 'text', 'Image', 0, 1, 1, 1, 1, 1, '{}', 4),
(89, 24, 'category', 'text', 'Category', 0, 1, 1, 1, 1, 1, '{}', 5),
(90, 24, 'featured', 'text', 'Featured', 1, 1, 1, 1, 1, 1, '{}', 6),
(91, 24, 'created_at', 'timestamp', 'Created At', 0, 1, 1, 1, 0, 1, '{}', 7),
(92, 24, 'updated_at', 'timestamp', 'Updated At', 0, 0, 0, 0, 0, 0, '{}', 8),
(93, 25, 'id', 'text', 'Id', 1, 1, 1, 1, 1, 1, '{}', 1),
(94, 25, 'title', 'text', 'Title', 1, 1, 1, 1, 1, 1, '{}', 2),
(95, 25, 'content', 'text', 'Content', 1, 1, 1, 1, 1, 1, '{}', 3),
(96, 25, 'image', 'text', 'Image', 0, 1, 1, 1, 1, 1, '{}', 4),
(97, 25, 'published_at', 'timestamp', 'Published At', 0, 1, 1, 1, 1, 1, '{}', 5),
(98, 25, 'created_at', 'timestamp', 'Created At', 0, 1, 1, 1, 0, 1, '{}', 6),
(99, 25, 'updated_at', 'timestamp', 'Updated At', 0, 1, 1, 1, 0, 1, '{}', 7),
(100, 25, 'category_id', 'text', 'Category Id', 0, 1, 1, 1, 1, 1, '{}', 8),
(101, 26, 'id', 'text', 'Id', 1, 1, 1, 1, 1, 1, '{}', 1),
(102, 26, 'title', 'text', 'Title', 1, 1, 1, 1, 1, 1, '{}', 2),
(103, 26, 'description', 'text', 'Description', 1, 1, 1, 1, 1, 1, '{}', 3),
(104, 26, 'date', 'text', 'Date', 1, 1, 1, 1, 1, 1, '{}', 4),
(105, 26, 'location', 'text', 'Location', 1, 1, 1, 1, 1, 1, '{}', 5),
(106, 26, 'image', 'text', 'Image', 0, 1, 1, 1, 1, 1, '{}', 6),
(107, 26, 'created_at', 'timestamp', 'Created At', 0, 1, 1, 1, 0, 1, '{}', 7),
(108, 26, 'updated_at', 'timestamp', 'Updated At', 0, 0, 0, 0, 0, 0, '{}', 8),
(109, 27, 'id', 'text', 'Id', 1, 1, 1, 1, 1, 1, '{}', 1),
(110, 27, 'event_id', 'text', 'Event Id', 1, 1, 1, 1, 1, 1, '{}', 2),
(111, 27, 'name', 'text', 'Name', 1, 1, 1, 1, 1, 1, '{}', 3),
(112, 27, 'email', 'text', 'Email', 1, 1, 1, 1, 1, 1, '{}', 4),
(113, 27, 'created_at', 'timestamp', 'Created At', 0, 1, 1, 1, 0, 1, '{}', 5),
(114, 27, 'updated_at', 'timestamp', 'Updated At', 0, 0, 0, 0, 0, 0, '{}', 6),
(115, 28, 'id', 'text', 'Id', 1, 1, 1, 1, 1, 1, '{}', 1),
(116, 28, 'internship_id', 'text', 'Internship Id', 1, 1, 1, 1, 1, 1, '{}', 2),
(117, 28, 'internship_title', 'text', 'Internship Title', 1, 1, 1, 1, 1, 1, '{}', 3),
(118, 28, 'full_name', 'text', 'Full Name', 1, 1, 1, 1, 1, 1, '{}', 4),
(119, 28, 'email', 'text', 'Email', 1, 1, 1, 1, 1, 1, '{}', 5),
(120, 28, 'resume_path', 'text', 'Resume Path', 0, 1, 1, 1, 1, 1, '{}', 6),
(121, 28, 'motivation', 'text', 'Motivation', 0, 1, 1, 1, 1, 1, '{}', 7),
(122, 28, 'status', 'text', 'Status', 1, 1, 1, 1, 1, 1, '{}', 8),
(123, 28, 'created_at', 'timestamp', 'Created At', 0, 1, 1, 1, 0, 1, '{}', 9),
(124, 28, 'updated_at', 'timestamp', 'Updated At', 0, 0, 0, 0, 0, 0, '{}', 10),
(125, 29, 'id', 'text', 'Id', 1, 1, 1, 1, 1, 1, '{}', 1),
(126, 29, 'facility_id', 'text', 'Facility Id', 1, 1, 1, 1, 1, 1, '{}', 2),
(127, 29, 'image_path', 'text', 'Image Path', 1, 1, 1, 1, 1, 1, '{}', 3),
(128, 29, 'caption', 'text', 'Caption', 1, 1, 1, 1, 1, 1, '{}', 4),
(129, 29, 'created_at', 'timestamp', 'Created At', 0, 1, 1, 1, 0, 1, '{}', 5),
(130, 29, 'updated_at', 'timestamp', 'Updated At', 0, 0, 0, 0, 0, 0, '{}', 6),
(131, 30, 'id', 'text', 'Id', 1, 1, 1, 1, 1, 1, '{}', 1),
(132, 30, 'name', 'text', 'Name', 1, 1, 1, 1, 1, 1, '{}', 2),
(133, 30, 'description', 'text', 'Description', 0, 1, 1, 1, 1, 1, '{}', 3),
(134, 30, 'icon', 'text', 'Icon', 0, 1, 1, 1, 1, 1, '{}', 4),
(135, 30, 'features', 'text', 'Features', 0, 1, 1, 1, 1, 1, '{}', 5),
(136, 30, 'created_at', 'timestamp', 'Created At', 0, 1, 1, 1, 0, 1, '{}', 6),
(137, 30, 'updated_at', 'timestamp', 'Updated At', 0, 0, 0, 0, 0, 0, '{}', 7),
(138, 31, 'id', 'text', 'Id', 1, 1, 1, 1, 1, 1, '{}', 1),
(139, 31, 'sport_type', 'text', 'Sport Type', 1, 1, 1, 1, 1, 1, '{}', 2),
(140, 31, 'team1', 'text', 'Team1', 1, 1, 1, 1, 1, 1, '{}', 3),
(141, 31, 'team2', 'text', 'Team2', 1, 1, 1, 1, 1, 1, '{}', 4),
(142, 31, 'score1', 'text', 'Score1', 0, 1, 1, 1, 1, 1, '{}', 5),
(143, 31, 'score2', 'text', 'Score2', 0, 1, 1, 1, 1, 1, '{}', 6),
(144, 31, 'status', 'text', 'Status', 1, 1, 1, 1, 1, 1, '{}', 7),
(145, 31, 'created_at', 'timestamp', 'Created At', 0, 1, 1, 1, 0, 1, '{}', 8),
(146, 31, 'updated_at', 'timestamp', 'Updated At', 0, 0, 0, 0, 0, 0, '{}', 9),
(147, 32, 'id', 'text', 'Id', 1, 1, 1, 1, 1, 1, '{}', 1),
(148, 32, 'type', 'text', 'Type', 1, 1, 1, 1, 1, 1, '{}', 2),
(149, 32, 'title', 'text', 'Title', 1, 1, 1, 1, 1, 1, '{}', 3),
(150, 32, 'description', 'text', 'Description', 1, 1, 1, 1, 1, 1, '{}', 4),
(151, 32, 'image', 'text', 'Image', 0, 1, 1, 1, 1, 1, '{}', 5),
(152, 32, 'link', 'text', 'Link', 0, 1, 1, 1, 1, 1, '{}', 6),
(153, 32, 'created_at', 'timestamp', 'Created At', 0, 1, 1, 1, 0, 1, '{}', 7),
(154, 32, 'updated_at', 'timestamp', 'Updated At', 0, 0, 0, 0, 0, 0, '{}', 8),
(155, 33, 'id', 'text', 'Id', 1, 1, 1, 1, 1, 1, '{}', 1),
(156, 33, 'title', 'text', 'Title', 1, 1, 1, 1, 1, 1, '{}', 2),
(157, 33, 'short_description', 'text', 'Short Description', 1, 1, 1, 1, 1, 1, '{}', 3),
(158, 33, 'detailed_description', 'text', 'Detailed Description', 1, 1, 1, 1, 1, 1, '{}', 4),
(159, 33, 'media_type', 'text', 'Media Type', 1, 1, 1, 1, 1, 1, '{}', 5),
(160, 33, 'media_url', 'text', 'Media Url', 0, 1, 1, 1, 1, 1, '{}', 6),
(161, 33, 'media_thumbnail_url', 'text', 'Media Thumbnail Url', 0, 1, 1, 1, 1, 1, '{}', 7),
(162, 33, 'media_alt_text', 'text', 'Media Alt Text', 0, 1, 1, 1, 1, 1, '{}', 8),
(163, 33, 'display_order', 'text', 'Display Order', 1, 1, 1, 1, 1, 1, '{}', 9),
(164, 33, 'is_active', 'text', 'Is Active', 1, 1, 1, 1, 1, 1, '{}', 10),
(165, 33, 'created_at', 'timestamp', 'Created At', 0, 1, 1, 1, 0, 1, '{}', 11),
(166, 33, 'updated_at', 'timestamp', 'Updated At', 0, 0, 0, 0, 0, 0, '{}', 12),
(167, 33, 'deleted_at', 'timestamp', 'Deleted At', 0, 1, 1, 1, 1, 1, '{}', 13),
(168, 5, 'course_duration', 'text', 'Course Duration', 0, 1, 1, 1, 1, 1, NULL, 1),
(169, 5, 'course_level', 'text', 'Course Level', 0, 1, 1, 1, 1, 1, NULL, 1),
(170, 36, 'id', 'text', 'Id', 1, 1, 1, 1, 1, 1, '{}', 1),
(171, 36, 'title', 'text', 'Title', 1, 1, 1, 1, 1, 1, '{}', 2),
(172, 36, 'slug', 'text', 'Slug', 1, 1, 1, 1, 1, 1, '{}', 3),
(173, 36, 'content', 'text', 'Content', 1, 1, 1, 1, 1, 1, '{}', 4),
(174, 36, 'created_at', 'timestamp', 'Created At', 0, 1, 1, 1, 0, 1, '{}', 5),
(175, 36, 'updated_at', 'timestamp', 'Updated At', 0, 1, 1, 1, 1, 1, '{}', 6),
(176, 36, 'image_path', 'text', 'Image Path', 0, 1, 1, 1, 1, 1, '{}', 7),
(177, 36, 'video_url', 'text', 'Video Url', 0, 1, 1, 1, 1, 1, '{}', 8),
(178, 26, 'category', 'text', 'Category', 0, 1, 1, 1, 1, 1, '{}', 6),
(179, 37, 'id', 'text', 'Id', 1, 1, 1, 1, 1, 1, '{}', 1),
(180, 37, 'name', 'text', 'Name', 1, 1, 1, 1, 1, 1, '{}', 2),
(181, 37, 'email', 'text', 'Email', 1, 1, 1, 1, 1, 1, '{}', 3),
(182, 37, 'subject', 'text', 'Subject', 1, 1, 1, 1, 1, 1, '{}', 4),
(183, 37, 'message', 'text', 'Message', 1, 1, 1, 1, 1, 1, '{}', 5),
(184, 37, 'created_at', 'timestamp', 'Created At', 0, 1, 1, 1, 0, 1, '{}', 6),
(185, 37, 'updated_at', 'timestamp', 'Updated At', 0, 0, 0, 0, 0, 0, '{}', 7),
(186, 39, 'id', 'text', 'Id', 1, 1, 1, 1, 1, 1, '{}', 1),
(187, 39, 'email', 'text', 'Email', 1, 1, 1, 1, 1, 1, '{}', 2),
(188, 39, 'created_at', 'timestamp', 'Created At', 0, 1, 1, 1, 0, 1, '{}', 3),
(189, 39, 'updated_at', 'timestamp', 'Updated At', 0, 0, 0, 0, 0, 0, '{}', 4);

-- --------------------------------------------------------

--
-- Table structure for table `data_types`
--

CREATE TABLE `data_types` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `display_name_singular` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `display_name_plural` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `icon` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `model_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `policy_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `controller` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `generate_permissions` tinyint(1) NOT NULL DEFAULT 0,
  `server_side` tinyint(4) NOT NULL DEFAULT 0,
  `details` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `data_types`
--

INSERT INTO `data_types` (`id`, `name`, `slug`, `display_name_singular`, `display_name_plural`, `icon`, `model_name`, `policy_name`, `controller`, `description`, `generate_permissions`, `server_side`, `details`, `created_at`, `updated_at`) VALUES
(1, 'users', 'users', 'User', 'Users', 'voyager-person', 'TCG\\Voyager\\Models\\User', 'TCG\\Voyager\\Policies\\UserPolicy', 'TCG\\Voyager\\Http\\Controllers\\VoyagerUserController', '', 1, 0, NULL, '2025-02-21 14:14:03', '2025-02-21 14:14:03'),
(2, 'menus', 'menus', 'Menu', 'Menus', 'voyager-list', 'TCG\\Voyager\\Models\\Menu', NULL, '', '', 1, 0, NULL, '2025-02-21 14:14:03', '2025-02-21 14:14:03'),
(3, 'roles', 'roles', 'Role', 'Roles', 'voyager-lock', 'TCG\\Voyager\\Models\\Role', NULL, 'TCG\\Voyager\\Http\\Controllers\\VoyagerRoleController', '', 1, 0, NULL, '2025-02-21 14:14:03', '2025-02-21 14:14:03'),
(4, 'categories', 'categories', 'Category', 'Categories', 'voyager-categories', 'TCG\\Voyager\\Models\\Category', NULL, '', '', 1, 0, NULL, '2025-02-21 14:14:03', '2025-02-21 14:14:03'),
(5, 'posts', 'posts', 'Post', 'Posts', 'voyager-news', 'TCG\\Voyager\\Models\\Post', 'TCG\\Voyager\\Policies\\PostPolicy', '', '', 1, 0, NULL, '2025-02-21 14:14:04', '2025-02-21 14:14:04'),
(6, 'pages', 'pages', 'Page', 'Pages', 'voyager-file-text', 'TCG\\Voyager\\Models\\Page', NULL, '', '', 1, 0, NULL, '2025-02-21 14:14:04', '2025-02-21 14:14:04'),
(7, 'history_events', 'history_events', 'History Event', 'History Events', 'voyager-calendar', 'App\\Models\\HistoryEvent', NULL, NULL, NULL, 1, 1, '{\"order_column\":\"year\",\"order_display_column\":\"year\",\"order_direction\":\"asc\",\"default_search_key\":null,\"scope\":null}', '2025-02-23 15:25:36', '2025-02-24 09:34:52'),
(22, 'slides', 'slides', 'Slide', 'Slides', NULL, 'App\\Models\\Slide', NULL, NULL, NULL, 1, 0, '{\"order_column\":null,\"order_display_column\":null,\"order_direction\":\"asc\",\"default_search_key\":\"title\",\"scope\":null}', '2025-02-24 09:15:54', '2025-02-24 09:37:33'),
(23, 'leaders', 'leaders', 'Leader', 'Leaders', NULL, 'App\\Models\\Leader', NULL, 'App\\Http\\Controllers\\LeaderController', NULL, 1, 0, '{\"order_column\":null,\"order_display_column\":null,\"order_direction\":\"asc\",\"default_search_key\":null,\"scope\":null}', '2025-02-24 09:25:30', '2025-02-24 12:29:36'),
(24, 'sports', 'sports', 'Sport', 'Sports', NULL, 'App\\Models\\Sport', NULL, NULL, NULL, 1, 0, '{\"order_column\":null,\"order_display_column\":null,\"order_direction\":\"asc\",\"default_search_key\":null}', '2025-02-28 08:18:42', '2025-02-28 08:18:42'),
(25, 'news', 'news', 'News', 'News', NULL, 'App\\Models\\News', NULL, NULL, NULL, 1, 0, '{\"order_column\":null,\"order_display_column\":null,\"order_direction\":\"asc\",\"default_search_key\":null,\"scope\":null}', '2025-03-20 00:29:32', '2025-03-20 00:58:45'),
(26, 'events', 'events', 'Event', 'Events', NULL, 'App\\Models\\Event', NULL, NULL, NULL, 1, 0, '{\"order_column\":null,\"order_display_column\":null,\"order_direction\":\"asc\",\"default_search_key\":null,\"scope\":null}', '2025-03-21 23:43:17', '2025-04-10 01:57:52'),
(27, 'event_registrations', 'event-registrations', 'Event Registration', 'Event Registrations', NULL, 'App\\Models\\EventRegistration', NULL, NULL, NULL, 1, 0, '{\"order_column\":null,\"order_display_column\":null,\"order_direction\":\"asc\",\"default_search_key\":null}', '2025-03-23 08:06:07', '2025-03-23 08:06:07'),
(28, 'internship_applications', 'internship-applications', 'Internship Application', 'Internship Applications', NULL, 'App\\Models\\InternshipApplication', NULL, NULL, NULL, 1, 0, '{\"order_column\":null,\"order_display_column\":null,\"order_direction\":\"asc\",\"default_search_key\":null}', '2025-03-23 08:06:24', '2025-03-23 08:06:24'),
(29, 'facility_images', 'facility-images', 'Facility Image', 'Facility Images', NULL, 'App\\Models\\FacilityImage', NULL, NULL, NULL, 1, 0, '{\"order_column\":null,\"order_display_column\":null,\"order_direction\":\"asc\",\"default_search_key\":null}', '2025-03-23 08:06:35', '2025-03-23 08:06:35'),
(30, 'facilities', 'facilities', 'Facility', 'Facilities', NULL, 'App\\Models\\Facility', NULL, NULL, NULL, 1, 0, '{\"order_column\":null,\"order_display_column\":null,\"order_direction\":\"asc\",\"default_search_key\":null}', '2025-03-23 08:06:48', '2025-03-23 08:06:48'),
(31, 'live_scores', 'live-scores', 'Live Score', 'Live Scores', NULL, 'App\\Models\\LiveScore', NULL, NULL, NULL, 1, 0, '{\"order_column\":null,\"order_display_column\":null,\"order_direction\":\"asc\",\"default_search_key\":null}', '2025-03-23 08:07:02', '2025-03-23 08:07:02'),
(32, 'news_announcement_events', 'news-announcement-events', 'News Announcement Event', 'News Announcement Events', NULL, 'App\\Models\\NewsAnnouncementEvent', NULL, NULL, NULL, 1, 0, '{\"order_column\":null,\"order_display_column\":null,\"order_direction\":\"asc\",\"default_search_key\":null}', '2025-03-23 08:07:44', '2025-03-23 08:07:44'),
(33, 'training_programs', 'training-programs', 'Training Program', 'Training Programs', NULL, 'App\\Models\\TrainingProgram', NULL, NULL, NULL, 1, 0, '{\"order_column\":null,\"order_display_column\":null,\"order_direction\":\"asc\",\"default_search_key\":null}', '2025-03-25 10:16:53', '2025-03-25 10:16:53'),
(36, 'timelines', 'timelines', 'Timeline', 'Timelines', NULL, 'App\\Models\\Timeline', NULL, NULL, NULL, 1, 0, '{\"order_column\":null,\"order_display_column\":null,\"order_direction\":\"asc\",\"default_search_key\":null,\"scope\":null}', '2025-03-30 07:53:30', '2025-03-30 07:58:58'),
(37, 'contacts', 'contacts', 'Contact', 'Contacts', NULL, 'App\\Models\\Contact', NULL, NULL, NULL, 1, 0, '{\"order_column\":null,\"order_display_column\":null,\"order_direction\":\"asc\",\"default_search_key\":null}', '2025-04-10 01:58:39', '2025-04-10 01:58:39'),
(39, 'newsletter_subscriptions', 'newsletter-subscriptions', 'Newsletter Subscription', 'Newsletter Subscriptions', NULL, 'App\\Models\\NewsletterSubscription', NULL, NULL, NULL, 1, 0, '{\"order_column\":null,\"order_display_column\":null,\"order_direction\":\"asc\",\"default_search_key\":null}', '2025-04-10 01:59:23', '2025-04-10 01:59:23');

-- --------------------------------------------------------

--
-- Table structure for table `events`
--

CREATE TABLE `events` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `date` datetime NOT NULL,
  `location` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `category` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `events`
--

INSERT INTO `events` (`id`, `title`, `description`, `date`, `location`, `category`, `image`, `created_at`, `updated_at`) VALUES
(1, 'water', 'water supply', '2024-04-12 00:00:00', 'kamaba pori', NULL, 'posts/Sports/FINAL-4-1536x1024.jpg', '2025-03-21 23:47:00', '2025-04-02 04:20:26'),
(2, 'test', 'water supply  test', '2024-12-04 00:00:00', 'kamaba pori', NULL, 'posts/news/IMG-20250319-WA0041.jpg', '2025-03-22 01:30:00', '2025-04-02 04:19:57'),
(3, 'test3', 'water3', '2025-12-04 00:00:00', 'kamaba pori', '3', 'posts/news/zahanatiWhatsApp-Image-2024-12-27-at-4.23.26-PM-300x169.jpeg', '2025-04-10 02:03:00', '2025-04-10 02:10:20');

-- --------------------------------------------------------

--
-- Table structure for table `event_registrations`
--

CREATE TABLE `event_registrations` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `event_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `event_registrations`
--

INSERT INTO `event_registrations` (`id`, `event_id`, `name`, `email`, `created_at`, `updated_at`) VALUES
(1, 1, 'bmus', 'bmussula2000@gmail.com', '2025-04-10 01:30:36', '2025-04-10 01:30:36'),
(9, 1, 'bmus', 'bmussula2000@gmail.com', '2025-04-10 01:30:54', '2025-04-10 01:30:54');

-- --------------------------------------------------------

--
-- Table structure for table `facilities`
--

CREATE TABLE `facilities` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `icon` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `features` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin DEFAULT NULL CHECK (json_valid(`features`)),
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `facility_images`
--

CREATE TABLE `facility_images` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `facility_id` bigint(20) UNSIGNED NOT NULL,
  `image_path` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `caption` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

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
-- Table structure for table `history_events`
--

CREATE TABLE `history_events` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `year` int(11) NOT NULL,
  `month` int(11) NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `background` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `internship_applications`
--

CREATE TABLE `internship_applications` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `internship_id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `internship_title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `full_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `resume_path` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `motivation` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` enum('pending','reviewed','accepted','rejected') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'pending',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `jobs`
--

CREATE TABLE `jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `queue` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
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
  `id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `total_jobs` int(11) NOT NULL,
  `pending_jobs` int(11) NOT NULL,
  `failed_jobs` int(11) NOT NULL,
  `failed_job_ids` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `options` mediumtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `cancelled_at` int(11) DEFAULT NULL,
  `created_at` int(11) NOT NULL,
  `finished_at` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `leaders`
--

CREATE TABLE `leaders` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `position` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` longtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `responsibilities` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin DEFAULT NULL,
  `display_order` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `author_id` bigint(20) UNSIGNED DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `leaders`
--

INSERT INTO `leaders` (`id`, `position`, `name`, `description`, `image`, `responsibilities`, `display_order`, `created_at`, `updated_at`, `author_id`) VALUES
(1, 'CHIEF MATRON', 'ACP: AMINA BATURULIMI ', '\"  \"', 'posts/leaders/Ashok.jpg', 'WOMEN', 1, '2025-02-27 02:22:16', '2025-02-27 02:22:16', 1),
(2, 'CHIEF INSTRUCTOR', 'ACP: OMARY KISALO', '“ The school is in conducive and attractive environment, located at the foot of Mount Kilimanjaro which is the highest mountain in Africa with well conserved areas.”', 'posts/leaders/CI.png', 'INCHARGE OF TRAINIG', 2, '2025-02-27 07:37:53', '2025-02-27 07:37:53', 2),
(3, 'STAFF OFFICER', 'SACP: STANLEY KULYAMO', '“ The school is in conducive and attractive environment, located at the foot of Mount Kilimanjaro which is the highest mountain in Africa with well conserved areas.”', 'posts/leaders/SOA.png', 'INCHARGE OF ADMINISTRATION', 3, '2025-02-27 08:23:46', '2025-02-27 08:23:46', 3),
(4, 'COMMANDANT', 'SACP: RAMADHAN MUNGI\n', '“ our school viewed as a better policing and security training institution based on preparing competent police officers in physical, mental and technological outlook.”\nMessage From Commandant\n“ TANZANIA POLICE SCHOOL- MOSHI is viewed as a better policing and security training institution based on preparing competent police officers in physical, mental and technological outlook. The school is in conducive and attractive environment, located at the foot of Mount Kilimanjaro which is the highest mountain in Africa with well conserved areas.”', 'posts/leaders/COMMANDA.jpg', 'HEAD OF TANZANIA POLICE SCHOOL', 4, '2025-02-27 08:34:44', '2025-02-27 08:34:44', 4);

-- --------------------------------------------------------

--
-- Table structure for table `live_scores`
--

CREATE TABLE `live_scores` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `sport_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `team1` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `team2` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `score1` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `score2` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'upcoming',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `menus`
--

CREATE TABLE `menus` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `menus`
--

INSERT INTO `menus` (`id`, `name`, `created_at`, `updated_at`) VALUES
(1, 'admin', '2025-02-21 14:14:03', '2025-02-21 14:14:03');

-- --------------------------------------------------------

--
-- Table structure for table `menu_items`
--

CREATE TABLE `menu_items` (
  `id` int(10) UNSIGNED NOT NULL,
  `menu_id` int(10) UNSIGNED DEFAULT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `url` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `target` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '_self',
  `icon_class` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `color` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `parent_id` int(11) DEFAULT NULL,
  `order` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `route` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `parameters` text COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `menu_items`
--

INSERT INTO `menu_items` (`id`, `menu_id`, `title`, `url`, `target`, `icon_class`, `color`, `parent_id`, `order`, `created_at`, `updated_at`, `route`, `parameters`) VALUES
(1, 1, 'Dashboard', '', '_self', 'voyager-boat', NULL, NULL, 1, '2025-02-21 14:14:03', '2025-02-21 14:14:03', 'voyager.dashboard', NULL),
(2, 1, 'Media', '', '_self', 'voyager-images', NULL, NULL, 5, '2025-02-21 14:14:03', '2025-02-21 14:14:03', 'voyager.media.index', NULL),
(3, 1, 'Users', '', '_self', 'voyager-person', NULL, NULL, 3, '2025-02-21 14:14:03', '2025-02-21 14:14:03', 'voyager.users.index', NULL),
(4, 1, 'Roles', '', '_self', 'voyager-lock', NULL, NULL, 2, '2025-02-21 14:14:03', '2025-02-21 14:14:03', 'voyager.roles.index', NULL),
(5, 1, 'Tools', '', '_self', 'voyager-tools', NULL, NULL, 9, '2025-02-21 14:14:03', '2025-02-21 14:14:03', NULL, NULL),
(6, 1, 'Menu Builder', '', '_self', 'voyager-list', NULL, 5, 10, '2025-02-21 14:14:03', '2025-02-21 14:14:03', 'voyager.menus.index', NULL),
(7, 1, 'Database', '', '_self', 'voyager-data', NULL, 5, 11, '2025-02-21 14:14:03', '2025-02-21 14:14:03', 'voyager.database.index', NULL),
(8, 1, 'Compass', '', '_self', 'voyager-compass', NULL, 5, 12, '2025-02-21 14:14:03', '2025-02-21 14:14:03', 'voyager.compass.index', NULL),
(9, 1, 'BREAD', '', '_self', 'voyager-bread', NULL, 5, 13, '2025-02-21 14:14:03', '2025-02-21 14:14:03', 'voyager.bread.index', NULL),
(10, 1, 'Settings', '', '_self', 'voyager-settings', NULL, NULL, 14, '2025-02-21 14:14:03', '2025-02-21 14:14:03', 'voyager.settings.index', NULL),
(11, 1, 'Categories', '', '_self', 'voyager-categories', NULL, NULL, 8, '2025-02-21 14:14:03', '2025-02-21 14:14:03', 'voyager.categories.index', NULL),
(12, 1, 'Posts', '', '_self', 'voyager-news', NULL, NULL, 6, '2025-02-21 14:14:04', '2025-02-21 14:14:04', 'voyager.posts.index', NULL),
(13, 1, 'Pages', '', '_self', 'voyager-file-text', NULL, NULL, 7, '2025-02-21 14:14:04', '2025-02-21 14:14:04', 'voyager.pages.index', NULL),
(14, 1, 'History Events', '/admin/history-events', '_self', 'voyager-calendar', NULL, NULL, 99, '2025-02-23 15:25:36', '2025-02-23 15:25:36', NULL, NULL),
(15, 1, 'Slides', '', '_self', NULL, NULL, NULL, 100, '2025-02-24 09:15:54', '2025-02-24 09:15:54', 'voyager.slides.index', NULL),
(16, 1, 'Leaders', '', '_self', NULL, NULL, NULL, 101, '2025-02-24 09:25:30', '2025-02-24 09:25:30', 'voyager.leaders.index', NULL),
(17, 1, 'Sports', '', '_self', NULL, NULL, NULL, 102, '2025-02-28 08:18:42', '2025-02-28 08:18:42', 'voyager.sports.index', NULL),
(18, 1, 'News', '', '_self', NULL, NULL, NULL, 103, '2025-03-20 00:29:32', '2025-03-20 00:29:32', 'voyager.news.index', NULL),
(19, 1, 'Events', '', '_self', NULL, NULL, NULL, 104, '2025-03-21 23:43:17', '2025-03-21 23:43:17', 'voyager.events.index', NULL),
(20, 1, 'Event Registrations', '', '_self', NULL, NULL, NULL, 105, '2025-03-23 08:06:07', '2025-03-23 08:06:07', 'voyager.event-registrations.index', NULL),
(21, 1, 'Internship Applications', '', '_self', NULL, NULL, NULL, 106, '2025-03-23 08:06:24', '2025-03-23 08:06:24', 'voyager.internship-applications.index', NULL),
(22, 1, 'Facility Images', '', '_self', NULL, NULL, NULL, 107, '2025-03-23 08:06:35', '2025-03-23 08:06:35', 'voyager.facility-images.index', NULL),
(23, 1, 'Facilities', '', '_self', NULL, NULL, NULL, 108, '2025-03-23 08:06:48', '2025-03-23 08:06:48', 'voyager.facilities.index', NULL),
(24, 1, 'Live Scores', '', '_self', NULL, NULL, NULL, 109, '2025-03-23 08:07:02', '2025-03-23 08:07:02', 'voyager.live-scores.index', NULL),
(25, 1, 'News Announcement Events', '', '_self', NULL, NULL, NULL, 110, '2025-03-23 08:07:44', '2025-03-23 08:07:44', 'voyager.news-announcement-events.index', NULL),
(26, 1, 'Training Programs', '', '_self', NULL, NULL, NULL, 111, '2025-03-25 10:16:53', '2025-03-25 10:16:53', 'voyager.training-programs.index', NULL),
(27, 1, 'Timelines', '', '_self', NULL, NULL, NULL, 112, '2025-03-30 07:53:30', '2025-03-30 07:53:30', 'voyager.timelines.index', NULL),
(28, 1, 'Contacts', '', '_self', NULL, NULL, NULL, 113, '2025-04-10 01:58:39', '2025-04-10 01:58:39', 'voyager.contacts.index', NULL),
(29, 1, 'Newsletter Subscriptions', '', '_self', NULL, NULL, NULL, 114, '2025-04-10 01:59:23', '2025-04-10 01:59:23', 'voyager.newsletter-subscriptions.index', NULL);

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
(63, '0001_01_01_000000_create_users_table', 1),
(64, '0001_01_01_000001_create_cache_table', 1),
(65, '0001_01_01_000002_create_jobs_table', 1),
(66, '2016_01_01_000000_add_voyager_user_fields', 1),
(67, '2016_01_01_000000_create_data_types_table', 1),
(68, '2016_01_01_000000_create_pages_table', 1),
(69, '2016_01_01_000000_create_posts_table', 1),
(70, '2016_02_15_204651_create_categories_table', 1),
(71, '2016_05_19_173453_create_menu_table', 1),
(72, '2016_10_21_190000_create_roles_table', 1),
(73, '2016_10_21_190000_create_settings_table', 1),
(74, '2016_11_30_135954_create_permission_table', 1),
(75, '2016_11_30_141208_create_permission_role_table', 1),
(76, '2016_12_26_201236_data_types__add__server_side', 1),
(77, '2017_01_13_000000_add_route_to_menu_items_table', 1),
(78, '2017_01_14_005015_create_translations_table', 1),
(79, '2017_01_15_000000_make_table_name_nullable_in_permissions_table', 1),
(80, '2017_03_06_000000_add_controller_to_data_types_table', 1),
(81, '2017_04_11_000000_alter_post_nullable_fields_table', 1),
(82, '2017_04_21_000000_add_order_to_data_rows_table', 1),
(83, '2017_07_05_210000_add_policyname_to_data_types_table', 1),
(84, '2017_08_05_000000_add_group_to_settings_table', 1),
(85, '2017_11_26_013050_add_user_role_relationship', 1),
(86, '2017_11_26_015000_create_user_roles_table', 1),
(87, '2018_03_11_000000_add_user_settings', 1),
(88, '2018_03_14_000000_add_details_to_data_types_table', 1),
(89, '2018_03_16_000000_make_settings_value_nullable', 1),
(90, '2025_02_16_173221_create_training_tables', 1),
(91, '2025_02_17_131524_create_contacts_table', 1),
(92, '2025_02_17_203417_create_facilities_table', 1),
(93, '2025_02_17_203418_create_facility_images_table', 1),
(94, '2025_02_23_105700_create_slides_table', 2),
(95, '2025_02_23_181526_create_history_events_table', 3),
(97, '2025_02_24_090704_create_leaders_table', 4),
(98, '2025_02_25_093756_create_newsletter_subscriptions_table', 5),
(99, '2025_02_28_105525_create_sports_table', 6),
(100, '2025_02_28_111319_create_live_scores_table', 7),
(101, '2025_03_01_185706_create_events_table', 8),
(102, '2025_03_01_191530_create_news_table', 9),
(104, '2025_03_05_175608_create_internship_applications_table', 10),
(105, '2025_03_22_094809_create_event_registrations_table', 11),
(106, '2025_03_23_103635_create_news_announcement_events_table', 11),
(107, '2025_03_25_133203_add_course_fields_to_posts', 12),
(108, '2025_03_30_104845_create_timelines_table', 13),
(109, '2025_03_30_105615_add_media_fields_to_timelines', 14),
(110, '2025_04_10_045615_add_category_to_events_table', 15);

-- --------------------------------------------------------

--
-- Table structure for table `news`
--

CREATE TABLE `news` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `content` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `published_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `category_id` bigint(20) UNSIGNED DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `news`
--

INSERT INTO `news` (`id`, `title`, `content`, `image`, `published_at`, `created_at`, `updated_at`, `category_id`) VALUES
(1, 'WATER  PROJECT AT KAMBAPORI CAMP BY TANZANIA POLICE SCHOOL MOSHI', 'Water Project Kambapori  The community of Kambapori has long grappled with persistent water shortages, impacting daily life and development. However, hope is on the horizon as a transformative solution is being initiated. Spearheaded by the Commandant of the Tanzania Police School in Moshi, this water project aims to address the pressing challenges by providing a sustainable and reliable water supply for the people of Kambapori. This effort not only highlights the importance of collaboration and leadership in solving community issues but also represents a significant step forward in ensuring access to clean water for all residents.   The Kambapori Water Project promises to bring new possibilities, improve health conditions, and pave the way for economic and social growth in the region.', 'storage/posts/news/WhatsApp%20Image%202025-03-17%20at%207.45.09%20PM.jpeg', '2025-03-20 03:35:00', '2025-03-20 00:46:00', '2025-03-30 05:32:00', 7),
(2, 'UFUNGUZI  RASMI WA MAFUNZO YA UONGOZI  MDOGO NGAZI YA CHEO YA SAJINI', 'Afisa Mnadhimu Utawala SACP Stanley Kabiki Kulyamo ambaye pia ni Kaimu Commandant wa Shule ya Polisi Tanzania Moshi amefungua rasmi  mafunzo ya Uongozi Mdogo Jeshini ngazi ya cheo cha Sajini (Sergeant) leo tarehe 19/03/2025 ikiwa ni kozi no.2/2024/2025.Aidha kabla ya ufunguzi huo,Kaimu commandant Sacp Stanley Kulyamo Ameanza kwa kumshukuru sana Mhe.Dr.Samia Suluhu Hassan-Rais wa Jamhuri ya Muungano wa Tanzania na Amiri Jeshi Mkuu wa Majeshi ya Ulinzi na Usalama kwa kuendelea kuliboresha Jeshi la Polisi ikiwa ni pamoja na kutoa vyeo vingi kupitia kwa Mkuu wa Jeshi la Polisi Tanzania Afande Camillus M.Wambura,kisha aliwakaribisha shuleni na kuwataka wajitambue kwa kiasi kikubwa kwani Jeshi la Polisi na Taifa zima wana imani kubwa na kada hiyo ya Sajini, tena  aliwataka kuzingatia kilichowaleta ambacho ni Mafunzo huku wakiwa na maadili mema hatimaye kuimarika kwa suala zima la nidhamu ya mtu mmoja kisha Jeshi kwa ujumla.Akiongea na wanafunzi amewataka kuheshimu na kufuata sheria za shule na kutokufanya kosa lolote vinginevyo hakutakuwa na maana yoyote ya kuwaongezea majukumu wakati hayo ya CPL yamewashinda.Hivyo alitoa wito kwa Wakufunzi  kuwasimamia kwa kuzingatia Amri zinazowamiliki Wanafunzi wawapo mafunzoni na kwa yeyote atakayekwenda kinyume na taratibu za shule au za Jeshi ataachishwa Mafunzo au kufukuzwa kazi mara moja.     SACP Kulyamo Ameendelea kuwakumbusha kuwa mwaka huu ni mwaka wa Uchaguzi Mkuu wa kuchagua viongozi na si bora viongozi na kwa sisi Watumishi suala la uchaguzi,mbali na kwamba ni haki yetu kikatiba lakini ni muhimu sana kwetu kwani  \"mwenye macho haambiwi ona\". Tena,aliwakumbusha kuwa kila mmoja wao lazima aboresha taarifa zake katika Daftari la Mpiga Kura ili kuitendea haki ya kikatiba hivyo ni lazima kila mmoja kuwa na kitambulisho cha mpiga kura.Kisha alirudia kuwataka kizingatia mafunzo ikiwa ni pamoja na kuzingatia wajibu mzima wa mpiga kura na majukumu mazima ya Jeshi la Polisi.    Mwisho,amerudia kumshukuru Mhe.Rais wa Jamhuri wa Muungano wa Tanzania na Amiri Jeshi Mkuu wa Majeshi ya Ulinzi na Usalama Dk.Samia Suluhu Hassan kwa kuendelea kuliboresha Jeshi na kuendelea kupandisha vyeo Askari kwa ngazi mbalimbali pamoja na kuboresha miundombinu ndani ya Jeshi la Polisi.', 'posts/news/IMG-20250319-WA0041.jpg', '2025-03-20 05:26:00', '2025-03-20 02:27:00', '2025-03-30 05:33:16', 6),
(3, 'SHEREHE ZA KUFUNGA MAFUNZO UONGOZI MDOGO TPS MOSHI 24/2025 KOZI NO - 2', 'MKUU WA JESHI LA POLISI TANZANIA IGP CAMILLUS M. WAMBURA NI MGENI RASMI KATIKA SHEREHE YA KUFUNGA MAFUNZO YA UONGOZI MDOGO NGAZI YA SAJINI NA KOPLO KOZI NAMBA 2-2024/2025 TPS MOSHI LEO MACHI 7, 2025 KATIKA KAMBI YA KILELEPORI NA KUHUDHURIWA NA VIONGOZI MBALIMBALI.', 'posts/news/New.png', '2025-03-07 14:27:00', '2025-04-06 11:28:00', '2025-04-06 11:36:03', 6),
(6, 'kilele', 'tute', 'posts/news/zahanatiWhatsApp-Image-2024-12-27-at-4.23.26-PM-300x169.jpeg', '2025-02-28 16:38:00', '2025-03-10 13:38:00', '2025-04-07 13:41:32', NULL),
(7, 'zenji', 'zenji', 'storage/posts/news/zenji.png', '2025-01-12 16:45:00', '2025-01-12 13:45:00', '2025-01-12 13:45:00', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `newsletter_subscriptions`
--

CREATE TABLE `newsletter_subscriptions` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `newsletter_subscriptions`
--

INSERT INTO `newsletter_subscriptions` (`id`, `email`, `created_at`, `updated_at`) VALUES
(1, 'bmussula2000@gmail.com', '2025-02-25 08:42:02', '2025-02-25 08:42:02'),
(2, 'bmussula1962@gmail.com', '2025-02-25 09:08:11', '2025-02-25 09:08:11');

-- --------------------------------------------------------

--
-- Table structure for table `news_announcement_events`
--

CREATE TABLE `news_announcement_events` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `link` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `news_announcement_events`
--

INSERT INTO `news_announcement_events` (`id`, `type`, `title`, `description`, `image`, `link`, `created_at`, `updated_at`) VALUES
(1, '1', 'work', 'kazi', 'kazi', NULL, '2025-03-23 08:08:42', '2025-03-23 08:08:42'),
(2, '0', 'tests', 'pugu', NULL, NULL, '2025-03-23 08:47:00', '2025-03-23 12:33:12'),
(5, '2', 'typo', 'testz', NULL, NULL, '2025-03-23 12:01:00', '2025-03-23 12:33:26');

-- --------------------------------------------------------

--
-- Table structure for table `pages`
--

CREATE TABLE `pages` (
  `id` int(10) UNSIGNED NOT NULL,
  `author_id` int(11) NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `excerpt` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `body` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `meta_description` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `meta_keywords` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` enum('ACTIVE','INACTIVE') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'INACTIVE',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `pages`
--

INSERT INTO `pages` (`id`, `author_id`, `title`, `excerpt`, `body`, `image`, `slug`, `meta_description`, `meta_keywords`, `status`, `created_at`, `updated_at`) VALUES
(1, 0, 'Hello World', 'Hang the jib grog grog blossom grapple dance the hempen jig gangway pressgang bilge rat to go on account lugger. Nelsons folly gabion line draught scallywag fire ship gaff fluke fathom case shot. Sea Legs bilge rat sloop matey gabion long clothes run a shot across the bow Gold Road cog league.', '<p>Hello World. Scallywag grog swab Cat o\'nine tails scuttle rigging hardtack cable nipper Yellow Jack. Handsomely spirits knave lad killick landlubber or just lubber deadlights chantey pinnace crack Jennys tea cup. Provost long clothes black spot Yellow Jack bilged on her anchor league lateen sail case shot lee tackle.</p>\n<p>Ballast spirits fluke topmast me quarterdeck schooner landlubber or just lubber gabion belaying pin. Pinnace stern galleon starboard warp carouser to go on account dance the hempen jig jolly boat measured fer yer chains. Man-of-war fire in the hole nipperkin handsomely doubloon barkadeer Brethren of the Coast gibbet driver squiffy.</p>', 'pages/page1.jpg', 'hello-world', 'Yar Meta Description', 'Keyword1, Keyword2', 'ACTIVE', '2025-02-21 14:14:04', '2025-02-21 14:14:04');

-- --------------------------------------------------------

--
-- Table structure for table `password_reset_tokens`
--

CREATE TABLE `password_reset_tokens` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `permissions`
--

CREATE TABLE `permissions` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `key` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `table_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `permissions`
--

INSERT INTO `permissions` (`id`, `key`, `table_name`, `created_at`, `updated_at`) VALUES
(1, 'browse_admin', NULL, '2025-02-21 14:14:03', '2025-02-21 14:14:03'),
(2, 'browse_bread', NULL, '2025-02-21 14:14:03', '2025-02-21 14:14:03'),
(3, 'browse_database', NULL, '2025-02-21 14:14:03', '2025-02-21 14:14:03'),
(4, 'browse_media', NULL, '2025-02-21 14:14:03', '2025-02-21 14:14:03'),
(5, 'browse_compass', NULL, '2025-02-21 14:14:03', '2025-02-21 14:14:03'),
(6, 'browse_menus', 'menus', '2025-02-21 14:14:03', '2025-02-21 14:14:03'),
(7, 'read_menus', 'menus', '2025-02-21 14:14:03', '2025-02-21 14:14:03'),
(8, 'edit_menus', 'menus', '2025-02-21 14:14:03', '2025-02-21 14:14:03'),
(9, 'add_menus', 'menus', '2025-02-21 14:14:03', '2025-02-21 14:14:03'),
(10, 'delete_menus', 'menus', '2025-02-21 14:14:03', '2025-02-21 14:14:03'),
(11, 'browse_roles', 'roles', '2025-02-21 14:14:03', '2025-02-21 14:14:03'),
(12, 'read_roles', 'roles', '2025-02-21 14:14:03', '2025-02-21 14:14:03'),
(13, 'edit_roles', 'roles', '2025-02-21 14:14:03', '2025-02-21 14:14:03'),
(14, 'add_roles', 'roles', '2025-02-21 14:14:03', '2025-02-21 14:14:03'),
(15, 'delete_roles', 'roles', '2025-02-21 14:14:03', '2025-02-21 14:14:03'),
(16, 'browse_users', 'users', '2025-02-21 14:14:03', '2025-02-21 14:14:03'),
(17, 'read_users', 'users', '2025-02-21 14:14:03', '2025-02-21 14:14:03'),
(18, 'edit_users', 'users', '2025-02-21 14:14:03', '2025-02-21 14:14:03'),
(19, 'add_users', 'users', '2025-02-21 14:14:03', '2025-02-21 14:14:03'),
(20, 'delete_users', 'users', '2025-02-21 14:14:03', '2025-02-21 14:14:03'),
(21, 'browse_settings', 'settings', '2025-02-21 14:14:03', '2025-02-21 14:14:03'),
(22, 'read_settings', 'settings', '2025-02-21 14:14:03', '2025-02-21 14:14:03'),
(23, 'edit_settings', 'settings', '2025-02-21 14:14:03', '2025-02-21 14:14:03'),
(24, 'add_settings', 'settings', '2025-02-21 14:14:03', '2025-02-21 14:14:03'),
(25, 'delete_settings', 'settings', '2025-02-21 14:14:03', '2025-02-21 14:14:03'),
(26, 'browse_categories', 'categories', '2025-02-21 14:14:03', '2025-02-21 14:14:03'),
(27, 'read_categories', 'categories', '2025-02-21 14:14:03', '2025-02-21 14:14:03'),
(28, 'edit_categories', 'categories', '2025-02-21 14:14:03', '2025-02-21 14:14:03'),
(29, 'add_categories', 'categories', '2025-02-21 14:14:03', '2025-02-21 14:14:03'),
(30, 'delete_categories', 'categories', '2025-02-21 14:14:03', '2025-02-21 14:14:03'),
(31, 'browse_posts', 'posts', '2025-02-21 14:14:04', '2025-02-21 14:14:04'),
(32, 'read_posts', 'posts', '2025-02-21 14:14:04', '2025-02-21 14:14:04'),
(33, 'edit_posts', 'posts', '2025-02-21 14:14:04', '2025-02-21 14:14:04'),
(34, 'add_posts', 'posts', '2025-02-21 14:14:04', '2025-02-21 14:14:04'),
(35, 'delete_posts', 'posts', '2025-02-21 14:14:04', '2025-02-21 14:14:04'),
(36, 'browse_pages', 'pages', '2025-02-21 14:14:04', '2025-02-21 14:14:04'),
(37, 'read_pages', 'pages', '2025-02-21 14:14:04', '2025-02-21 14:14:04'),
(38, 'edit_pages', 'pages', '2025-02-21 14:14:04', '2025-02-21 14:14:04'),
(39, 'add_pages', 'pages', '2025-02-21 14:14:04', '2025-02-21 14:14:04'),
(40, 'delete_pages', 'pages', '2025-02-21 14:14:04', '2025-02-21 14:14:04'),
(41, 'browse_history_events', 'history_events', '2025-02-23 15:25:36', '2025-02-23 15:25:36'),
(42, 'read_history_events', 'history_events', '2025-02-23 15:25:36', '2025-02-23 15:25:36'),
(43, 'edit_history_events', 'history_events', '2025-02-23 15:25:36', '2025-02-23 15:25:36'),
(44, 'add_history_events', 'history_events', '2025-02-23 15:25:36', '2025-02-23 15:25:36'),
(45, 'delete_history_events', 'history_events', '2025-02-23 15:25:36', '2025-02-23 15:25:36'),
(46, 'browse_slides', 'slides', '2025-02-24 09:15:54', '2025-02-24 09:15:54'),
(47, 'read_slides', 'slides', '2025-02-24 09:15:54', '2025-02-24 09:15:54'),
(48, 'edit_slides', 'slides', '2025-02-24 09:15:54', '2025-02-24 09:15:54'),
(49, 'add_slides', 'slides', '2025-02-24 09:15:54', '2025-02-24 09:15:54'),
(50, 'delete_slides', 'slides', '2025-02-24 09:15:54', '2025-02-24 09:15:54'),
(51, 'browse_leaders', 'leaders', '2025-02-24 09:25:30', '2025-02-24 09:25:30'),
(52, 'read_leaders', 'leaders', '2025-02-24 09:25:30', '2025-02-24 09:25:30'),
(53, 'edit_leaders', 'leaders', '2025-02-24 09:25:30', '2025-02-24 09:25:30'),
(54, 'add_leaders', 'leaders', '2025-02-24 09:25:30', '2025-02-24 09:25:30'),
(55, 'delete_leaders', 'leaders', '2025-02-24 09:25:30', '2025-02-24 09:25:30'),
(56, 'browse_sports', 'sports', '2025-02-28 08:18:42', '2025-02-28 08:18:42'),
(57, 'read_sports', 'sports', '2025-02-28 08:18:42', '2025-02-28 08:18:42'),
(58, 'edit_sports', 'sports', '2025-02-28 08:18:42', '2025-02-28 08:18:42'),
(59, 'add_sports', 'sports', '2025-02-28 08:18:42', '2025-02-28 08:18:42'),
(60, 'delete_sports', 'sports', '2025-02-28 08:18:42', '2025-02-28 08:18:42'),
(61, 'browse_news', 'news', '2025-03-20 00:29:32', '2025-03-20 00:29:32'),
(62, 'read_news', 'news', '2025-03-20 00:29:32', '2025-03-20 00:29:32'),
(63, 'edit_news', 'news', '2025-03-20 00:29:32', '2025-03-20 00:29:32'),
(64, 'add_news', 'news', '2025-03-20 00:29:32', '2025-03-20 00:29:32'),
(65, 'delete_news', 'news', '2025-03-20 00:29:32', '2025-03-20 00:29:32'),
(66, 'browse_events', 'events', '2025-03-21 23:43:17', '2025-03-21 23:43:17'),
(67, 'read_events', 'events', '2025-03-21 23:43:17', '2025-03-21 23:43:17'),
(68, 'edit_events', 'events', '2025-03-21 23:43:17', '2025-03-21 23:43:17'),
(69, 'add_events', 'events', '2025-03-21 23:43:17', '2025-03-21 23:43:17'),
(70, 'delete_events', 'events', '2025-03-21 23:43:17', '2025-03-21 23:43:17'),
(71, 'browse_event_registrations', 'event_registrations', '2025-03-23 08:06:07', '2025-03-23 08:06:07'),
(72, 'read_event_registrations', 'event_registrations', '2025-03-23 08:06:07', '2025-03-23 08:06:07'),
(73, 'edit_event_registrations', 'event_registrations', '2025-03-23 08:06:07', '2025-03-23 08:06:07'),
(74, 'add_event_registrations', 'event_registrations', '2025-03-23 08:06:07', '2025-03-23 08:06:07'),
(75, 'delete_event_registrations', 'event_registrations', '2025-03-23 08:06:07', '2025-03-23 08:06:07'),
(76, 'browse_internship_applications', 'internship_applications', '2025-03-23 08:06:24', '2025-03-23 08:06:24'),
(77, 'read_internship_applications', 'internship_applications', '2025-03-23 08:06:24', '2025-03-23 08:06:24'),
(78, 'edit_internship_applications', 'internship_applications', '2025-03-23 08:06:24', '2025-03-23 08:06:24'),
(79, 'add_internship_applications', 'internship_applications', '2025-03-23 08:06:24', '2025-03-23 08:06:24'),
(80, 'delete_internship_applications', 'internship_applications', '2025-03-23 08:06:24', '2025-03-23 08:06:24'),
(81, 'browse_facility_images', 'facility_images', '2025-03-23 08:06:35', '2025-03-23 08:06:35'),
(82, 'read_facility_images', 'facility_images', '2025-03-23 08:06:35', '2025-03-23 08:06:35'),
(83, 'edit_facility_images', 'facility_images', '2025-03-23 08:06:35', '2025-03-23 08:06:35'),
(84, 'add_facility_images', 'facility_images', '2025-03-23 08:06:35', '2025-03-23 08:06:35'),
(85, 'delete_facility_images', 'facility_images', '2025-03-23 08:06:35', '2025-03-23 08:06:35'),
(86, 'browse_facilities', 'facilities', '2025-03-23 08:06:48', '2025-03-23 08:06:48'),
(87, 'read_facilities', 'facilities', '2025-03-23 08:06:48', '2025-03-23 08:06:48'),
(88, 'edit_facilities', 'facilities', '2025-03-23 08:06:48', '2025-03-23 08:06:48'),
(89, 'add_facilities', 'facilities', '2025-03-23 08:06:48', '2025-03-23 08:06:48'),
(90, 'delete_facilities', 'facilities', '2025-03-23 08:06:48', '2025-03-23 08:06:48'),
(91, 'browse_live_scores', 'live_scores', '2025-03-23 08:07:02', '2025-03-23 08:07:02'),
(92, 'read_live_scores', 'live_scores', '2025-03-23 08:07:02', '2025-03-23 08:07:02'),
(93, 'edit_live_scores', 'live_scores', '2025-03-23 08:07:02', '2025-03-23 08:07:02'),
(94, 'add_live_scores', 'live_scores', '2025-03-23 08:07:02', '2025-03-23 08:07:02'),
(95, 'delete_live_scores', 'live_scores', '2025-03-23 08:07:02', '2025-03-23 08:07:02'),
(96, 'browse_news_announcement_events', 'news_announcement_events', '2025-03-23 08:07:44', '2025-03-23 08:07:44'),
(97, 'read_news_announcement_events', 'news_announcement_events', '2025-03-23 08:07:44', '2025-03-23 08:07:44'),
(98, 'edit_news_announcement_events', 'news_announcement_events', '2025-03-23 08:07:44', '2025-03-23 08:07:44'),
(99, 'add_news_announcement_events', 'news_announcement_events', '2025-03-23 08:07:44', '2025-03-23 08:07:44'),
(100, 'delete_news_announcement_events', 'news_announcement_events', '2025-03-23 08:07:44', '2025-03-23 08:07:44'),
(101, 'browse_training_programs', 'training_programs', '2025-03-25 10:16:53', '2025-03-25 10:16:53'),
(102, 'read_training_programs', 'training_programs', '2025-03-25 10:16:53', '2025-03-25 10:16:53'),
(103, 'edit_training_programs', 'training_programs', '2025-03-25 10:16:53', '2025-03-25 10:16:53'),
(104, 'add_training_programs', 'training_programs', '2025-03-25 10:16:53', '2025-03-25 10:16:53'),
(105, 'delete_training_programs', 'training_programs', '2025-03-25 10:16:53', '2025-03-25 10:16:53'),
(106, 'browse_timelines', 'timelines', '2025-03-30 07:53:30', '2025-03-30 07:53:30'),
(107, 'read_timelines', 'timelines', '2025-03-30 07:53:30', '2025-03-30 07:53:30'),
(108, 'edit_timelines', 'timelines', '2025-03-30 07:53:30', '2025-03-30 07:53:30'),
(109, 'add_timelines', 'timelines', '2025-03-30 07:53:30', '2025-03-30 07:53:30'),
(110, 'delete_timelines', 'timelines', '2025-03-30 07:53:30', '2025-03-30 07:53:30'),
(111, 'browse_contacts', 'contacts', '2025-04-10 01:58:39', '2025-04-10 01:58:39'),
(112, 'read_contacts', 'contacts', '2025-04-10 01:58:39', '2025-04-10 01:58:39'),
(113, 'edit_contacts', 'contacts', '2025-04-10 01:58:39', '2025-04-10 01:58:39'),
(114, 'add_contacts', 'contacts', '2025-04-10 01:58:39', '2025-04-10 01:58:39'),
(115, 'delete_contacts', 'contacts', '2025-04-10 01:58:39', '2025-04-10 01:58:39'),
(116, 'browse_newsletter_subscriptions', 'newsletter_subscriptions', '2025-04-10 01:59:23', '2025-04-10 01:59:23'),
(117, 'read_newsletter_subscriptions', 'newsletter_subscriptions', '2025-04-10 01:59:23', '2025-04-10 01:59:23'),
(118, 'edit_newsletter_subscriptions', 'newsletter_subscriptions', '2025-04-10 01:59:23', '2025-04-10 01:59:23'),
(119, 'add_newsletter_subscriptions', 'newsletter_subscriptions', '2025-04-10 01:59:23', '2025-04-10 01:59:23'),
(120, 'delete_newsletter_subscriptions', 'newsletter_subscriptions', '2025-04-10 01:59:23', '2025-04-10 01:59:23');

-- --------------------------------------------------------

--
-- Table structure for table `permission_role`
--

CREATE TABLE `permission_role` (
  `permission_id` bigint(20) UNSIGNED NOT NULL,
  `role_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `permission_role`
--

INSERT INTO `permission_role` (`permission_id`, `role_id`) VALUES
(1, 1),
(2, 1),
(3, 1),
(4, 1),
(5, 1),
(6, 1),
(7, 1),
(8, 1),
(9, 1),
(10, 1),
(11, 1),
(12, 1),
(13, 1),
(14, 1),
(15, 1),
(16, 1),
(17, 1),
(18, 1),
(19, 1),
(20, 1),
(21, 1),
(22, 1),
(23, 1),
(24, 1),
(25, 1),
(26, 1),
(27, 1),
(28, 1),
(29, 1),
(30, 1),
(31, 1),
(32, 1),
(33, 1),
(34, 1),
(35, 1),
(36, 1),
(37, 1),
(38, 1),
(39, 1),
(40, 1),
(46, 1),
(47, 1),
(48, 1),
(49, 1),
(50, 1),
(51, 1),
(52, 1),
(53, 1),
(54, 1),
(55, 1),
(56, 1),
(57, 1),
(58, 1),
(59, 1),
(60, 1),
(61, 1),
(62, 1),
(63, 1),
(64, 1),
(65, 1),
(66, 1),
(67, 1),
(68, 1),
(69, 1),
(70, 1),
(71, 1),
(72, 1),
(73, 1),
(74, 1),
(75, 1),
(76, 1),
(77, 1),
(78, 1),
(79, 1),
(80, 1),
(81, 1),
(82, 1),
(83, 1),
(84, 1),
(85, 1),
(86, 1),
(87, 1),
(88, 1),
(89, 1),
(90, 1),
(91, 1),
(92, 1),
(93, 1),
(94, 1),
(95, 1),
(96, 1),
(97, 1),
(98, 1),
(99, 1),
(100, 1),
(101, 1),
(102, 1),
(103, 1),
(104, 1),
(105, 1),
(106, 1),
(107, 1),
(108, 1),
(109, 1),
(110, 1),
(111, 1),
(112, 1),
(113, 1),
(114, 1),
(115, 1),
(116, 1),
(117, 1),
(118, 1),
(119, 1),
(120, 1);

-- --------------------------------------------------------

--
-- Table structure for table `posts`
--

CREATE TABLE `posts` (
  `id` int(10) UNSIGNED NOT NULL,
  `author_id` int(11) NOT NULL,
  `category_id` int(11) DEFAULT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `seo_title` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `excerpt` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `body` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `meta_description` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `meta_keywords` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` enum('PUBLISHED','DRAFT','PENDING') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'DRAFT',
  `featured` tinyint(1) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `course_duration` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `course_level` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `posts`
--

INSERT INTO `posts` (`id`, `author_id`, `category_id`, `title`, `seo_title`, `excerpt`, `body`, `image`, `slug`, `meta_description`, `meta_keywords`, `status`, `featured`, `created_at`, `updated_at`, `course_duration`, `course_level`) VALUES
(1, 1, 1, 'IGP', NULL, NULL, '<p>IGP</p>', 'posts\\March2025\\TPVyNeJ8c4UTzBlrEGIB.jpeg', 'igp', NULL, NULL, 'PUBLISHED', 0, '2025-03-01 06:40:49', '2025-03-01 06:41:15', NULL, NULL),
(12, 1, 1, 'co', NULL, NULL, '<p>co</p>', 'posts\\March2025\\8nu9FsonDAZ1kDRIrEtD.jpg', 'co', NULL, NULL, 'PUBLISHED', 0, '2025-03-01 11:09:41', '2025-03-01 11:09:41', NULL, NULL),
(13, 1, 3, 'IAA', NULL, NULL, '<p>IAA</p>', 'posts\\April2025\\ujAj6n4deWiLAMN8eEYc.jpeg', 'iaa', NULL, NULL, 'PUBLISHED', 0, '2025-04-03 02:40:50', '2025-04-03 02:40:50', NULL, NULL),
(15, 1, 3, 'IAA2', NULL, NULL, '<p>IAA</p>', 'posts\\April2025\\uhsMERSCyzqR2ICJZGTe.jpeg', 'iaa2', NULL, NULL, 'PUBLISHED', 0, '2025-04-03 02:47:28', '2025-04-03 02:47:28', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `roles`
--

CREATE TABLE `roles` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `display_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `roles`
--

INSERT INTO `roles` (`id`, `name`, `display_name`, `created_at`, `updated_at`) VALUES
(1, 'admin', 'Administrator', '2025-02-21 14:14:03', '2025-02-21 14:14:03'),
(2, 'user', 'Normal User', '2025-02-21 14:14:03', '2025-02-21 14:14:03');

-- --------------------------------------------------------

--
-- Table structure for table `sessions`
--

CREATE TABLE `sessions` (
  `id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `ip_address` varchar(45) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `user_agent` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `last_activity` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `sessions`
--

INSERT INTO `sessions` (`id`, `user_id`, `ip_address`, `user_agent`, `payload`, `last_activity`) VALUES
('kKYlBh0Ql3tZjACSPcEkIGOZORbJpE018oCbCyU2', NULL, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/135.0.0.0 Safari/537.36', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoicFY2YXh6ZW1GNVRlMURnSzV2MXlSYXFRSzJFRjVvOEplNzZTMDNjNSI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MzU6Imh0dHA6Ly8xMjcuMC4wLjE6ODAwMC9hYm91dC9oaXN0b3J5Ijt9czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319fQ==', 1744325432);

-- --------------------------------------------------------

--
-- Table structure for table `settings`
--

CREATE TABLE `settings` (
  `id` int(10) UNSIGNED NOT NULL,
  `key` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `display_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `value` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `details` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `order` int(11) NOT NULL DEFAULT 1,
  `group` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `settings`
--

INSERT INTO `settings` (`id`, `key`, `display_name`, `value`, `details`, `type`, `order`, `group`) VALUES
(1, 'site.title', 'Site Title', 'Site Title', '', 'text', 1, 'Site'),
(2, 'site.description', 'Site Description', 'Site Description', '', 'text', 2, 'Site'),
(3, 'site.logo', 'Site Logo', NULL, '', 'image', 3, 'Site'),
(4, 'site.google_analytics_tracking_id', 'Google Analytics Tracking ID', NULL, '', 'text', 4, 'Site'),
(5, 'admin.bg_image', 'Admin Background Image', '', '', 'image', 5, 'Admin'),
(6, 'admin.title', 'Admin Title', 'Voyager', '', 'text', 1, 'Admin'),
(7, 'admin.description', 'Admin Description', 'Welcome to Voyager. The Missing Admin for Laravel', '', 'text', 2, 'Admin'),
(8, 'admin.loader', 'Admin Loader', '', '', 'image', 3, 'Admin'),
(9, 'admin.icon_image', 'Admin Icon Image', '', '', 'image', 4, 'Admin'),
(10, 'admin.google_analytics_client_id', 'Google Analytics Client ID (used for admin dashboard)', NULL, '', 'text', 1, 'Admin'),
(12, 'site.leadership.background_image', 'Leadership Background Image', 'settings\\February2025\\H4DJD8mlagfblee63q1J.jpg', NULL, 'image', 6, 'Site');

-- --------------------------------------------------------

--
-- Table structure for table `slides`
--

CREATE TABLE `slides` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `subtitle` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `button_text` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `button_link` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `order` int(11) NOT NULL DEFAULT 0,
  `is_active` tinyint(1) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `slides`
--

INSERT INTO `slides` (`id`, `title`, `subtitle`, `image`, `button_text`, `button_link`, `order`, `is_active`, `created_at`, `updated_at`) VALUES
(1, 'testing', 'testing12', 'posts/Screenshot%202025-04-03%20105134.png', NULL, NULL, 1, 1, '2025-04-08 10:08:24', '2025-04-08 10:08:24');

-- --------------------------------------------------------

--
-- Table structure for table `sports`
--

CREATE TABLE `sports` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `category` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `featured` tinyint(1) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `sports`
--

INSERT INTO `sports` (`id`, `title`, `description`, `image`, `category`, `featured`, `created_at`, `updated_at`) VALUES
(4, 'TIMU YA BRAVO COY YAIBUKA MSHINDI MUNGI CAP.', 'TIMU YA BRAVO COY YAIBUKA MSHINDI MUNGI CAP Timu ya migu ya Bravo coy imeibuka mshindi kombe la Mungi Cup kwa ushindi wa mikwaju ya penati dhidi ya timu ya Kombania A katika mechi ya fainali iliyochezwa kwenye viwanja vya michezo shule ya polisi-moshi tarehe 22/02/2025.  MUNGI CAP ni mashindano ambayo ukutanisha mchezo wa mpira wa miguu,mpira wa wavu, mprira wa pete pamoja na mchezo wa masumbwi kwa lengo la kuendeleza vipaji kwa Wanafunzi na kupata washindi kwenye kila michezo.  Mashindano haya yanafanyika kila mwaka na kwa mwaka huu michuano hiyo ilifunguliwa tarehe 24/01/2025 katika viwanja shule ya Polisi Tanzania-Moshi.', 'posts/Sports/FINAL-4-1536x1024.jpg', NULL, 1, '2025-03-23 06:14:00', '2025-03-30 05:12:55');

-- --------------------------------------------------------

--
-- Table structure for table `timelines`
--

CREATE TABLE `timelines` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `content` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `image_path` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `video_url` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `timelines`
--

INSERT INTO `timelines` (`id`, `title`, `slug`, `content`, `created_at`, `updated_at`, `image_path`, `video_url`) VALUES
(1, 'start', 'images', 'the end of beginings', '2025-03-30 07:55:00', '2025-03-30 07:59:31', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `training_programs`
--

CREATE TABLE `training_programs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `short_description` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `detailed_description` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `media_type` enum('image','video') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'image',
  `media_url` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `media_thumbnail_url` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `media_alt_text` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `display_order` int(11) NOT NULL DEFAULT 0,
  `is_active` tinyint(1) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `training_programs`
--

INSERT INTO `training_programs` (`id`, `title`, `short_description`, `detailed_description`, `media_type`, `media_url`, `media_thumbnail_url`, `media_alt_text`, `display_order`, `is_active`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'kuruta', 'new bogi', 'the 2025 kuruta', 'image', NULL, NULL, 'porini', 1, 1, '2025-03-25 10:25:16', '2025-03-25 10:25:16', NULL),
(2, 'test', 'fdrtfg', 'dfgnhm,', 'image', NULL, NULL, NULL, 1, 1, '2025-03-25 10:54:22', '2025-03-25 10:54:22', NULL),
(4, 'ewrf', 'frfs', 'rgrb', 'image', NULL, NULL, NULL, 1, 1, '2025-03-25 11:00:16', '2025-03-25 11:00:16', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `training_statistics`
--

CREATE TABLE `training_statistics` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `value` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `display_order` int(11) NOT NULL DEFAULT 0,
  `is_active` tinyint(1) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `translations`
--

CREATE TABLE `translations` (
  `id` int(10) UNSIGNED NOT NULL,
  `table_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `column_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `foreign_key` int(10) UNSIGNED NOT NULL,
  `locale` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `value` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `translations`
--

INSERT INTO `translations` (`id`, `table_name`, `column_name`, `foreign_key`, `locale`, `value`, `created_at`, `updated_at`) VALUES
(1, 'data_types', 'display_name_singular', 5, 'pt', 'Post', '2025-02-21 14:14:04', '2025-02-21 14:14:04'),
(2, 'data_types', 'display_name_singular', 6, 'pt', 'Página', '2025-02-21 14:14:04', '2025-02-21 14:14:04'),
(3, 'data_types', 'display_name_singular', 1, 'pt', 'Utilizador', '2025-02-21 14:14:04', '2025-02-21 14:14:04'),
(4, 'data_types', 'display_name_singular', 4, 'pt', 'Categoria', '2025-02-21 14:14:04', '2025-02-21 14:14:04'),
(5, 'data_types', 'display_name_singular', 2, 'pt', 'Menu', '2025-02-21 14:14:04', '2025-02-21 14:14:04'),
(6, 'data_types', 'display_name_singular', 3, 'pt', 'Função', '2025-02-21 14:14:04', '2025-02-21 14:14:04'),
(7, 'data_types', 'display_name_plural', 5, 'pt', 'Posts', '2025-02-21 14:14:04', '2025-02-21 14:14:04'),
(8, 'data_types', 'display_name_plural', 6, 'pt', 'Páginas', '2025-02-21 14:14:04', '2025-02-21 14:14:04'),
(9, 'data_types', 'display_name_plural', 1, 'pt', 'Utilizadores', '2025-02-21 14:14:04', '2025-02-21 14:14:04'),
(10, 'data_types', 'display_name_plural', 4, 'pt', 'Categorias', '2025-02-21 14:14:04', '2025-02-21 14:14:04'),
(11, 'data_types', 'display_name_plural', 2, 'pt', 'Menus', '2025-02-21 14:14:04', '2025-02-21 14:14:04'),
(12, 'data_types', 'display_name_plural', 3, 'pt', 'Funções', '2025-02-21 14:14:04', '2025-02-21 14:14:04'),
(13, 'categories', 'slug', 1, 'pt', 'categoria-1', '2025-02-21 14:14:04', '2025-02-21 14:14:04'),
(14, 'categories', 'name', 1, 'pt', 'Categoria 1', '2025-02-21 14:14:04', '2025-02-21 14:14:04'),
(15, 'categories', 'slug', 2, 'pt', 'categoria-2', '2025-02-21 14:14:04', '2025-02-21 14:14:04'),
(16, 'categories', 'name', 2, 'pt', 'Categoria 2', '2025-02-21 14:14:04', '2025-02-21 14:14:04'),
(17, 'pages', 'title', 1, 'pt', 'Olá Mundo', '2025-02-21 14:14:04', '2025-02-21 14:14:04'),
(18, 'pages', 'slug', 1, 'pt', 'ola-mundo', '2025-02-21 14:14:04', '2025-02-21 14:14:04'),
(19, 'pages', 'body', 1, 'pt', '<p>Olá Mundo. Scallywag grog swab Cat o\'nine tails scuttle rigging hardtack cable nipper Yellow Jack. Handsomely spirits knave lad killick landlubber or just lubber deadlights chantey pinnace crack Jennys tea cup. Provost long clothes black spot Yellow Jack bilged on her anchor league lateen sail case shot lee tackle.</p>\r\n<p>Ballast spirits fluke topmast me quarterdeck schooner landlubber or just lubber gabion belaying pin. Pinnace stern galleon starboard warp carouser to go on account dance the hempen jig jolly boat measured fer yer chains. Man-of-war fire in the hole nipperkin handsomely doubloon barkadeer Brethren of the Coast gibbet driver squiffy.</p>', '2025-02-21 14:14:04', '2025-02-21 14:14:04'),
(20, 'menu_items', 'title', 1, 'pt', 'Painel de Controle', '2025-02-21 14:14:04', '2025-02-21 14:14:04'),
(21, 'menu_items', 'title', 2, 'pt', 'Media', '2025-02-21 14:14:04', '2025-02-21 14:14:04'),
(22, 'menu_items', 'title', 12, 'pt', 'Publicações', '2025-02-21 14:14:04', '2025-02-21 14:14:04'),
(23, 'menu_items', 'title', 3, 'pt', 'Utilizadores', '2025-02-21 14:14:04', '2025-02-21 14:14:04'),
(24, 'menu_items', 'title', 11, 'pt', 'Categorias', '2025-02-21 14:14:04', '2025-02-21 14:14:04'),
(25, 'menu_items', 'title', 13, 'pt', 'Páginas', '2025-02-21 14:14:04', '2025-02-21 14:14:04'),
(26, 'menu_items', 'title', 4, 'pt', 'Funções', '2025-02-21 14:14:04', '2025-02-21 14:14:04'),
(27, 'menu_items', 'title', 5, 'pt', 'Ferramentas', '2025-02-21 14:14:04', '2025-02-21 14:14:04'),
(28, 'menu_items', 'title', 6, 'pt', 'Menus', '2025-02-21 14:14:04', '2025-02-21 14:14:04'),
(29, 'menu_items', 'title', 7, 'pt', 'Base de dados', '2025-02-21 14:14:04', '2025-02-21 14:14:04'),
(30, 'menu_items', 'title', 10, 'pt', 'Configurações', '2025-02-21 14:14:04', '2025-02-21 14:14:04');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `role_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `avatar` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT 'users/default.png',
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `settings` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `role_id`, `name`, `email`, `avatar`, `email_verified_at`, `password`, `remember_token`, `settings`, `created_at`, `updated_at`) VALUES
(1, 1, 'Admin', 'admin@admin.com', 'users/default.png', NULL, '$2y$12$U7uF7Tm7LJS7Ihx96z.UvOUsnb4Jtu.wr4eYiUelW1xcvUD3NLjYS', 'SEmvaQB7mCWp3b1VbX9SBTTTYXXIjDsx7jAzKFqcnEo9G78zTFaBBOQ53L1d', NULL, '2025-02-21 14:14:04', '2025-02-21 14:14:04');

-- --------------------------------------------------------

--
-- Table structure for table `user_roles`
--

CREATE TABLE `user_roles` (
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `role_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Indexes for dumped tables
--

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
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `categories_slug_unique` (`slug`),
  ADD KEY `categories_parent_id_foreign` (`parent_id`);

--
-- Indexes for table `contacts`
--
ALTER TABLE `contacts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `data_rows`
--
ALTER TABLE `data_rows`
  ADD PRIMARY KEY (`id`),
  ADD KEY `data_rows_data_type_id_foreign` (`data_type_id`);

--
-- Indexes for table `data_types`
--
ALTER TABLE `data_types`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `data_types_name_unique` (`name`),
  ADD UNIQUE KEY `data_types_slug_unique` (`slug`);

--
-- Indexes for table `events`
--
ALTER TABLE `events`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `event_registrations`
--
ALTER TABLE `event_registrations`
  ADD PRIMARY KEY (`id`),
  ADD KEY `event_registrations_event_id_foreign` (`event_id`);

--
-- Indexes for table `facilities`
--
ALTER TABLE `facilities`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `facility_images`
--
ALTER TABLE `facility_images`
  ADD PRIMARY KEY (`id`),
  ADD KEY `facility_images_facility_id_foreign` (`facility_id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `history_events`
--
ALTER TABLE `history_events`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `internship_applications`
--
ALTER TABLE `internship_applications`
  ADD PRIMARY KEY (`id`);

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
-- Indexes for table `leaders`
--
ALTER TABLE `leaders`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `live_scores`
--
ALTER TABLE `live_scores`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `menus`
--
ALTER TABLE `menus`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `menus_name_unique` (`name`);

--
-- Indexes for table `menu_items`
--
ALTER TABLE `menu_items`
  ADD PRIMARY KEY (`id`),
  ADD KEY `menu_items_menu_id_foreign` (`menu_id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `news`
--
ALTER TABLE `news`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `newsletter_subscriptions`
--
ALTER TABLE `newsletter_subscriptions`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `newsletter_subscriptions_email_unique` (`email`);

--
-- Indexes for table `news_announcement_events`
--
ALTER TABLE `news_announcement_events`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pages`
--
ALTER TABLE `pages`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `pages_slug_unique` (`slug`);

--
-- Indexes for table `password_reset_tokens`
--
ALTER TABLE `password_reset_tokens`
  ADD PRIMARY KEY (`email`);

--
-- Indexes for table `permissions`
--
ALTER TABLE `permissions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `permissions_key_index` (`key`);

--
-- Indexes for table `permission_role`
--
ALTER TABLE `permission_role`
  ADD PRIMARY KEY (`permission_id`,`role_id`),
  ADD KEY `permission_role_permission_id_index` (`permission_id`),
  ADD KEY `permission_role_role_id_index` (`role_id`);

--
-- Indexes for table `posts`
--
ALTER TABLE `posts`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `posts_slug_unique` (`slug`);

--
-- Indexes for table `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `roles_name_unique` (`name`);

--
-- Indexes for table `sessions`
--
ALTER TABLE `sessions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `sessions_user_id_index` (`user_id`),
  ADD KEY `sessions_last_activity_index` (`last_activity`);

--
-- Indexes for table `settings`
--
ALTER TABLE `settings`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `settings_key_unique` (`key`);

--
-- Indexes for table `slides`
--
ALTER TABLE `slides`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sports`
--
ALTER TABLE `sports`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `timelines`
--
ALTER TABLE `timelines`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `timelines_slug_unique` (`slug`);

--
-- Indexes for table `training_programs`
--
ALTER TABLE `training_programs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `training_statistics`
--
ALTER TABLE `training_statistics`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `translations`
--
ALTER TABLE `translations`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `translations_table_name_column_name_foreign_key_locale_unique` (`table_name`,`column_name`,`foreign_key`,`locale`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`),
  ADD KEY `users_role_id_foreign` (`role_id`);

--
-- Indexes for table `user_roles`
--
ALTER TABLE `user_roles`
  ADD PRIMARY KEY (`user_id`,`role_id`),
  ADD KEY `user_roles_user_id_index` (`user_id`),
  ADD KEY `user_roles_role_id_index` (`role_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `contacts`
--
ALTER TABLE `contacts`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `data_rows`
--
ALTER TABLE `data_rows`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=190;

--
-- AUTO_INCREMENT for table `data_types`
--
ALTER TABLE `data_types`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=42;

--
-- AUTO_INCREMENT for table `events`
--
ALTER TABLE `events`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `event_registrations`
--
ALTER TABLE `event_registrations`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `facilities`
--
ALTER TABLE `facilities`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `facility_images`
--
ALTER TABLE `facility_images`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `history_events`
--
ALTER TABLE `history_events`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `internship_applications`
--
ALTER TABLE `internship_applications`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `jobs`
--
ALTER TABLE `jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `leaders`
--
ALTER TABLE `leaders`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `live_scores`
--
ALTER TABLE `live_scores`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `menus`
--
ALTER TABLE `menus`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `menu_items`
--
ALTER TABLE `menu_items`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=111;

--
-- AUTO_INCREMENT for table `news`
--
ALTER TABLE `news`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `newsletter_subscriptions`
--
ALTER TABLE `newsletter_subscriptions`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `news_announcement_events`
--
ALTER TABLE `news_announcement_events`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `pages`
--
ALTER TABLE `pages`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `permissions`
--
ALTER TABLE `permissions`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=121;

--
-- AUTO_INCREMENT for table `posts`
--
ALTER TABLE `posts`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `roles`
--
ALTER TABLE `roles`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `settings`
--
ALTER TABLE `settings`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `slides`
--
ALTER TABLE `slides`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `sports`
--
ALTER TABLE `sports`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `timelines`
--
ALTER TABLE `timelines`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `training_programs`
--
ALTER TABLE `training_programs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `training_statistics`
--
ALTER TABLE `training_statistics`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `translations`
--
ALTER TABLE `translations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `categories`
--
ALTER TABLE `categories`
  ADD CONSTRAINT `categories_parent_id_foreign` FOREIGN KEY (`parent_id`) REFERENCES `categories` (`id`) ON DELETE SET NULL ON UPDATE CASCADE;

--
-- Constraints for table `data_rows`
--
ALTER TABLE `data_rows`
  ADD CONSTRAINT `data_rows_data_type_id_foreign` FOREIGN KEY (`data_type_id`) REFERENCES `data_types` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `event_registrations`
--
ALTER TABLE `event_registrations`
  ADD CONSTRAINT `event_registrations_event_id_foreign` FOREIGN KEY (`event_id`) REFERENCES `events` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `facility_images`
--
ALTER TABLE `facility_images`
  ADD CONSTRAINT `facility_images_facility_id_foreign` FOREIGN KEY (`facility_id`) REFERENCES `facilities` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `menu_items`
--
ALTER TABLE `menu_items`
  ADD CONSTRAINT `menu_items_menu_id_foreign` FOREIGN KEY (`menu_id`) REFERENCES `menus` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `permission_role`
--
ALTER TABLE `permission_role`
  ADD CONSTRAINT `permission_role_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `permission_role_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `users_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`);

--
-- Constraints for table `user_roles`
--
ALTER TABLE `user_roles`
  ADD CONSTRAINT `user_roles_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `user_roles_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
