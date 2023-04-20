-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Apr 20, 2023 at 01:48 AM
-- Server version: 8.0.27
-- PHP Version: 7.4.26

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `default`
--

-- --------------------------------------------------------

--
-- Table structure for table `auth_group`
--

DROP TABLE IF EXISTS `auth_group`;
CREATE TABLE IF NOT EXISTS `auth_group` (
  `id` int NOT NULL AUTO_INCREMENT,
  `group` varchar(100) NOT NULL,
  `definition` text,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb3;

--
-- Dumping data for table `auth_group`
--

INSERT INTO `auth_group` (`id`, `group`, `definition`) VALUES
(1, 'xadmin', 'Admin Master');

-- --------------------------------------------------------

--
-- Table structure for table `auth_permission`
--

DROP TABLE IF EXISTS `auth_permission`;
CREATE TABLE IF NOT EXISTS `auth_permission` (
  `id` int NOT NULL AUTO_INCREMENT,
  `permission` varchar(100) NOT NULL,
  `definition` text,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=89 DEFAULT CHARSET=utf8mb3;

--
-- Dumping data for table `auth_permission`
--

INSERT INTO `auth_permission` (`id`, `permission`, `definition`) VALUES
(1, 'config_view_default', 'Module config'),
(2, 'config_view_logo', 'Module config'),
(3, 'config_view_sosmed', 'Module config'),
(4, 'config_view_core', 'Module config'),
(5, 'config_update_web_name', 'Module config'),
(6, 'config_update_web_domain', 'Module config'),
(7, 'config_update_web_owner', 'Module config'),
(8, 'config_update_email', 'Module config'),
(9, 'config_update_telepon', 'Module config'),
(10, 'config_update_address', 'Module config'),
(11, 'config_update_logo', 'Module config'),
(12, 'config_update_logo_mini', 'Module config'),
(13, 'config_update_favicon', 'Module config'),
(14, 'config_update_facebook', 'Module config'),
(15, 'config_update_instagram', 'Module config'),
(16, 'config_update_youtube', 'Module config'),
(17, 'config_update_twitter', 'Module config'),
(18, 'config_update_language', 'Module config'),
(19, 'config_update_time_zone', 'Module config'),
(20, 'config_update_max_upload', 'Module config'),
(21, 'config_update_route_admin', 'Module config'),
(22, 'config_update_route_login', 'Module config'),
(23, 'config_update_encryption_key', 'Module config'),
(24, 'config_update_encryption_url', 'Module config'),
(25, 'config_update_url_suffix', 'Module config'),
(26, 'config_update_user_log_status', 'Module config'),
(27, 'config_update_maintenance_status', 'Module config'),
(28, 'menu_list', 'Module menu'),
(29, 'menu_add', 'Module menu'),
(30, 'menu_update', 'Module menu'),
(31, 'menu_delete', 'Module menu'),
(32, 'menu_drag_positions', 'Module menu'),
(33, 'user_list', 'Module user'),
(34, 'user_add', 'Module user'),
(35, 'user_update', 'Module user'),
(36, 'user_detail', 'Module user'),
(37, 'user_delete', 'Module user'),
(38, 'groups_list', 'Module groups'),
(39, 'groups_add', 'Module groups'),
(40, 'groups_access', 'Module groups'),
(41, 'groups_update', 'Module groups'),
(42, 'groups_delete', 'Module groups'),
(43, 'permission_list', 'Module permission'),
(44, 'permission_add', 'Module permission'),
(45, 'permission_update', 'Module permission'),
(46, 'permission_delete', 'Module permission'),
(47, 'dashboard__view_profile_user', 'Module dashboard'),
(48, 'dashboard_view_total_user', 'Module dashboard'),
(49, 'dashboard_view_total_group', 'Module dashboard'),
(50, 'dashboard_view_total_permission', 'Module dashboard'),
(51, 'dashboard_view_total_filemanager', 'Module dashboard'),
(52, 'filemanager_list', 'Module filemanager'),
(53, 'filemanager_add', 'Module filemanager'),
(54, 'filemanager_delete', 'Module filemanager'),
(55, 'sidebar_view_dashboard', 'Module sidebar'),
(56, 'sidebar_view_auth', 'Module sidebar'),
(57, 'sidebar_view_user', 'Module sidebar'),
(58, 'sidebar_view_groups', 'Module sidebar'),
(59, 'sidebar_view_permission', 'Module sidebar'),
(60, 'sidebar_view_config', 'Module sidebar'),
(61, 'sidebar_view_system', 'Module sidebar'),
(62, 'sidebar_view_management_menu', 'Module sidebar'),
(63, 'sidebar_view_file_manager', 'Module sidebar'),
(64, 'sidebar_view_m-crud_generator', 'Module Sidebar'),
(65, 'crud_generator_list', 'Module crud generator'),
(66, 'crud_generator_add', 'Module crud generator'),
(67, 'crud_generator_delete', 'Module crud generator'),
(68, 'sidebar_view_configuration', 'Module sidebar'),
(69, 'sidebar_view_settings', 'Module sidebar'),
(70, 'config_update_website', 'Module config'),
(71, 'config_update_color_theme', 'Module config'),
(72, 'sidebar_view_หน้าหลัก', 'Module sidebar'),
(73, 'sidebar_view_การจัดการผู้ใช้/สิทธิ์', 'Module sidebar'),
(74, 'sidebar_view_จัดการผู้ใช้งาน', 'Module sidebar'),
(75, 'sidebar_view_จัดการกลุ่มผู้ใช้งาน', 'Module sidebar'),
(76, 'sidebar_view_จัดการสิทธิ์', 'Module sidebar'),
(77, 'sidebar_view_การตั้งค่า', 'Module sidebar'),
(78, 'sidebar_view_ตั้งค่าทั่วไป', 'Module sidebar'),
(79, 'sidebar_view_ตั้งค่าเมนู', 'Module sidebar'),
(80, 'sidebar_view_จัดการไฟล์', 'Module sidebar'),
(81, 'sidebar_view_code_generator', 'Module sidebar'),
(82, 'config_view_database', 'Module config'),
(83, 'config_database_backup', 'Module config'),
(84, 'config_database_import', 'Module config'),
(85, 'config_database_restore', 'Module config'),
(88, 'config_system_info', 'Module config');

-- --------------------------------------------------------

--
-- Table structure for table `auth_permission_to_group`
--

DROP TABLE IF EXISTS `auth_permission_to_group`;
CREATE TABLE IF NOT EXISTS `auth_permission_to_group` (
  `permission_id` int NOT NULL,
  `group_id` int NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb3;

-- --------------------------------------------------------

--
-- Table structure for table `auth_user`
--

DROP TABLE IF EXISTS `auth_user`;
CREATE TABLE IF NOT EXISTS `auth_user` (
  `id_user` int NOT NULL AUTO_INCREMENT,
  `name` varchar(100) NOT NULL,
  `photo` varchar(100) DEFAULT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `token` varchar(100) NOT NULL,
  `last_login` datetime DEFAULT NULL,
  `ip_address` varchar(50) DEFAULT NULL,
  `is_active` enum('0','1') NOT NULL DEFAULT '1',
  `created` datetime DEFAULT NULL,
  `modified` datetime DEFAULT NULL,
  `is_delete` enum('0','1') NOT NULL DEFAULT '0',
  PRIMARY KEY (`id_user`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb3;

--
-- Dumping data for table `auth_user`
--

INSERT INTO `auth_user` (`id_user`, `name`, `photo`, `email`, `password`, `token`, `last_login`, `ip_address`, `is_active`, `created`, `modified`, `is_delete`) VALUES
(1, 'นาย เยาวรัตน์  ช่างสลัก', '190423092642_IMG_0658.JPG', 'attc.atc@gmail.com', '$2y$10$7cZjqWdKT0pzVa6oV2Y4ZeC4trgvNTcS8Xp3UbVE678ymIGyhpZHm', 'b56c33e9361253241860fceb8c4e6f92', '2023-04-20 08:32:00', '::1', '1', '2023-04-18 11:23:00', '2023-04-19 09:26:42', '0');

-- --------------------------------------------------------

--
-- Table structure for table `auth_user_to_group`
--

DROP TABLE IF EXISTS `auth_user_to_group`;
CREATE TABLE IF NOT EXISTS `auth_user_to_group` (
  `id_user` int NOT NULL,
  `id_group` int NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb3;

--
-- Dumping data for table `auth_user_to_group`
--

INSERT INTO `auth_user_to_group` (`id_user`, `id_group`) VALUES
(1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `ci_user_log`
--

DROP TABLE IF EXISTS `ci_user_log`;
CREATE TABLE IF NOT EXISTS `ci_user_log` (
  `id` int NOT NULL AUTO_INCREMENT,
  `user` int DEFAULT NULL,
  `ip_address` varchar(100) DEFAULT NULL,
  `controller` varchar(255) DEFAULT NULL,
  `url` text,
  `data` text,
  `created_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=13 DEFAULT CHARSET=utf8mb3;

--
-- Dumping data for table `ci_user_log`
--

INSERT INTO `ci_user_log` (`id`, `user`, `ip_address`, `controller`, `url`, `data`, `created_at`) VALUES
(1, 1, '::1', 'Setting', '/mcode-thai/cpanel/setting/core.html', NULL, '2023-04-18 13:09:24'),
(2, 1, '::1', 'Setting', '/mcode-thai/cpanel/setting/core.html', NULL, '2023-04-18 13:10:39'),
(3, 1, '::1', 'Setting', '/mcode-thai/cpanel/setting/core.html', NULL, '2023-04-18 13:11:10'),
(4, 1, '::1', 'Setting', '/mcode-thai/cpanel/setting/core.html', NULL, '2023-04-18 13:11:53'),
(5, 1, '::1', 'Setting', '/mcode-thai/cpanel/setting/update_action.html', '{\"name\":\"encryption_url\",\"value\":\"TRUE\",\"pk\":\"999\"}', '2023-04-18 13:11:57'),
(6, 1, '::1', 'Setting', '/mcode-thai/cpanel/setting/update_action.html', '{\"name\":\"encryption_url\",\"value\":\"FALSE\",\"pk\":\"999\"}', '2023-04-18 13:12:02'),
(7, 1, '::1', 'Setting', '/mcode-thai/cpanel/setting/update_action.html', '{\"name\":\"encryption_url\",\"value\":\"TRUE\",\"pk\":\"999\"}', '2023-04-18 13:12:05'),
(8, 1, '::1', 'Setting', '/mcode-thai/cpanel/setting/sosmed.html', NULL, '2023-04-18 13:13:07'),
(9, 1, '::1', 'Setting', '/mcode-thai/cpanel/setting/logo.html', NULL, '2023-04-18 13:13:08'),
(10, 1, '::1', 'Setting', '/mcode-thai/cpanel/setting.html', NULL, '2023-04-18 13:13:11'),
(11, 1, '::1', 'Setting', '/mcode-thai/cpanel/setting/core.html', NULL, '2023-04-18 13:13:19'),
(12, 1, '::1', 'Setting', '/mcode-thai/cpanel/setting/update_action.html', '{\"name\":\"user_log_status\",\"value\":\"N\",\"pk\":\"61\"}', '2023-04-18 13:13:30');

-- --------------------------------------------------------

--
-- Table structure for table `filemanager`
--

DROP TABLE IF EXISTS `filemanager`;
CREATE TABLE IF NOT EXISTS `filemanager` (
  `id` int NOT NULL AUTO_INCREMENT,
  `file_name` varchar(255) DEFAULT NULL,
  `ket` text,
  `created` datetime DEFAULT NULL,
  `update` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=12 DEFAULT CHARSET=utf8mb3;

--
-- Dumping data for table `filemanager`
--

INSERT INTO `filemanager` (`id`, `file_name`, `ket`, `created`, `update`) VALUES
(9, '190423102201_231120043259_log.png', 'LOGO', '2023-04-19 10:22:01', NULL),
(10, '190423102222_231120051100_log.png', 'LOGO MINI', '2023-04-19 10:22:22', NULL),
(4, '180423135614_3501410591302896.jpg', 'อัปโหลดผ่านโมดูล User', '2023-04-18 13:56:00', NULL),
(5, '190423092642_IMG_0658.JPG', 'อัปโหลดผ่านโมดูล User', '2023-04-19 09:26:00', NULL),
(11, '190423102237_favicon_16x16.png', 'favicon', '2023-04-19 10:22:37', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `main_menu`
--

DROP TABLE IF EXISTS `main_menu`;
CREATE TABLE IF NOT EXISTS `main_menu` (
  `id_menu` int NOT NULL AUTO_INCREMENT,
  `is_parent` int DEFAULT NULL,
  `menu` varchar(100) DEFAULT NULL,
  `slug` varchar(100) DEFAULT NULL,
  `type` enum('controller','url') DEFAULT NULL,
  `controller` varchar(255) DEFAULT NULL,
  `target` varchar(20) DEFAULT NULL,
  `icon` varchar(50) DEFAULT NULL,
  `is_active` enum('0','1') DEFAULT NULL,
  `sort` int DEFAULT NULL,
  `created` datetime DEFAULT NULL,
  `modified` datetime DEFAULT NULL,
  PRIMARY KEY (`id_menu`)
) ENGINE=MyISAM AUTO_INCREMENT=55 DEFAULT CHARSET=utf8mb3;

--
-- Dumping data for table `main_menu`
--

INSERT INTO `main_menu` (`id_menu`, `is_parent`, `menu`, `slug`, `type`, `controller`, `target`, `icon`, `is_active`, `sort`, `created`, `modified`) VALUES
(3, 7, 'ตั้งค่าเมนู', 'ตงคาเมน', 'controller', 'main_menu', '', '', '1', 8, '2020-02-15 06:48:31', '2023-04-19 14:10:27'),
(7, 0, 'การตั้งค่า', 'การตงคา', 'controller', '', '', 'fa fa-cogs', '1', 6, '2020-02-26 06:42:29', '2023-04-19 14:09:51'),
(34, 7, 'ตั้งค่าทั่วไป', 'ตงคาทวไป', 'controller', 'setting', '', '', '1', 7, '2020-10-19 00:25:57', '2023-04-19 14:10:15'),
(36, 0, 'หน้าหลัก', 'หนาหลก', 'controller', 'dashboard', '', 'mdi mdi-laptop', '1', 1, '2020-10-27 08:18:55', '2023-04-19 14:08:37'),
(37, 0, 'การจัดการผู้ใช้/สิทธิ์', 'การจดการผใชสทธ', 'controller', '', '', 'mdi mdi-account-settings-variant', '1', 2, '2020-10-27 08:45:17', '2023-04-19 14:09:03'),
(38, 37, 'จัดการผู้ใช้งาน', 'จดการผใชงาน', 'controller', 'user', '', 'mdi mdi-account-star', '1', 3, '2020-10-27 08:46:10', '2023-04-19 14:09:17'),
(39, 37, 'จัดการกลุ่มผู้ใช้งาน', 'จดการกลมผใชงาน', 'controller', 'group', '', '', '1', 4, '2020-10-27 08:48:28', '2023-04-19 14:09:31'),
(40, 37, 'จัดการสิทธิ์', 'จดการสทธ', 'controller', 'permission', '', '', '1', 5, '2020-10-27 08:49:49', '2023-04-19 14:09:42'),
(48, 0, 'code generator', 'code-generator', 'controller', 'm_crud_generator', '', 'mdi mdi-xml', '1', 10, '2020-11-01 12:23:11', '2023-04-19 14:11:09'),
(54, 7, 'จัดการไฟล์', 'จดการไฟล', 'controller', 'filemanager', '', 'mdi mdi-folder-multiple-image', '1', 9, '2020-11-08 00:44:38', '2023-04-19 14:10:36');

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

DROP TABLE IF EXISTS `migrations`;
CREATE TABLE IF NOT EXISTS `migrations` (
  `version` bigint NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb3;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`version`) VALUES
(1);

-- --------------------------------------------------------

--
-- Table structure for table `modules_crud_generator`
--

DROP TABLE IF EXISTS `modules_crud_generator`;
CREATE TABLE IF NOT EXISTS `modules_crud_generator` (
  `id` int NOT NULL AUTO_INCREMENT,
  `module` varchar(255) DEFAULT NULL,
  `module_name` varchar(255) DEFAULT NULL,
  `table` varchar(255) DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb3;

-- --------------------------------------------------------

--
-- Table structure for table `setting`
--

DROP TABLE IF EXISTS `setting`;
CREATE TABLE IF NOT EXISTS `setting` (
  `id_setting` int NOT NULL,
  `group` varchar(50) NOT NULL,
  `options` varchar(100) NOT NULL,
  `value` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id_setting`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb3;

--
-- Dumping data for table `setting`
--

INSERT INTO `setting` (`id_setting`, `group`, `options`, `value`) VALUES
(1, 'general', 'web_name', 'APPROVE'),
(2, 'general', 'web_domain', 'http://localhost/mcode-thai/'),
(3, 'general', 'web_owner', 'cangsalak'),
(4, 'general', 'email', 'attc.atc@gmail.com'),
(5, 'general', 'telepon', '+66890167912'),
(6, 'general', 'address', '155/55 หมู่ 3 ต.ชัยนารายณ์ อ.ชัยบาดาล จ.ลพบุรี 15130'),
(7, 'general', 'logo', '190423102201_231120043259_log.png'),
(8, 'general', 'logo_mini', '190423102222_231120051100_log.png'),
(9, 'general', 'favicon', '190423102237_favicon_16x16.png'),
(50, 'sosmed', 'facebook', 'https://www.facebook.com/maxcangsalak'),
(51, 'general', 'instagram', '#'),
(52, 'sosmed', 'youtube', 'https://www.youtube.com/channel/UCQMpYmqbXlUBEJ_z3XPupdA'),
(53, 'sosmed', 'twitter', '#'),
(60, 'config', 'maintenance_status', 'N'),
(61, 'config', 'user_log_status', 'N'),
(54, 'sosmed', 'website', 'https://1.20.167.69'),
(62, 'config', 'color_theme', 'Fuchsia');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
