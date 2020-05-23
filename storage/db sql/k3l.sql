/*
 Navicat Premium Data Transfer

 Source Server         : LOCAL
 Source Server Type    : MySQL
 Source Server Version : 100137
 Source Host           : 192.168.64.2:3306
 Source Schema         : k3l

 Target Server Type    : MySQL
 Target Server Version : 100137
 File Encoding         : 65001

 Date: 23/05/2020 00:48:35
*/

SET NAMES utf8mb4;
SET FOREIGN_KEY_CHECKS = 0;

-- ----------------------------
-- Table structure for account_code
-- ----------------------------
DROP TABLE IF EXISTS `account_code`;
CREATE TABLE `account_code` (
  `id` int(4) NOT NULL AUTO_INCREMENT,
  `account_unit` varchar(4) DEFAULT NULL,
  `account_cd` decimal(20,0) NOT NULL,
  `account_text` varchar(300) DEFAULT NULL,
  `account_group` varchar(5) DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- ----------------------------
-- Table structure for account_group
-- ----------------------------
DROP TABLE IF EXISTS `account_group`;
CREATE TABLE `account_group` (
  `id` int(4) NOT NULL AUTO_INCREMENT,
  `group_unit` varchar(4) DEFAULT NULL,
  `group_cd` decimal(20,0) NOT NULL,
  `group_text` varchar(300) DEFAULT NULL,
  `group_status` varchar(5) DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of account_group
-- ----------------------------
BEGIN;
INSERT INTO `account_group` VALUES (1, '1000', 100001, 'AKTIVA LANCAR', '1');
INSERT INTO `account_group` VALUES (2, '1000', 100002, 'AKTIVA TETAP', '1');
INSERT INTO `account_group` VALUES (3, '1000', 100003, 'UTANG USAHA', '1');
INSERT INTO `account_group` VALUES (4, '1000', 100004, 'MODAL', '1');
INSERT INTO `account_group` VALUES (5, '1000', 100005, 'PENDAPATAN USAHA', '1');
INSERT INTO `account_group` VALUES (6, '1000', 100006, 'BEBAN USAHA', '1');
INSERT INTO `account_group` VALUES (7, '1000', 100007, 'AKUN PENUTUP', '1');
INSERT INTO `account_group` VALUES (8, '1000', 100008, 'POS SILANG', '1');
COMMIT;

-- ----------------------------
-- Table structure for config_discount
-- ----------------------------
DROP TABLE IF EXISTS `config_discount`;
CREATE TABLE `config_discount` (
  `id` int(4) NOT NULL AUTO_INCREMENT,
  `unit` varchar(4) DEFAULT NULL,
  `tax_amount` varchar(100) DEFAULT NULL,
  `tax_status` varchar(3) DEFAULT NULL,
  `total_qt` varchar(4) DEFAULT NULL,
  `status` varchar(20) DEFAULT NULL,
  `add_desc` varchar(50) DEFAULT NULL,
  `update_by` varchar(12) DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- ----------------------------
-- Table structure for config_unit
-- ----------------------------
DROP TABLE IF EXISTS `config_unit`;
CREATE TABLE `config_unit` (
  `id` int(4) NOT NULL AUTO_INCREMENT,
  `unit` varchar(4) DEFAULT NULL,
  `tax_amount` varchar(3) DEFAULT NULL COMMENT '%',
  `tax_status` varchar(3) DEFAULT NULL,
  `discount_status` varchar(3) DEFAULT NULL,
  `discount_type` varchar(20) DEFAULT NULL COMMENT '1=ALL; 2=MEMBER; 3=SELECTED ITEM; 4=SELECTED CATEGORY',
  `discount_amount` varchar(3) DEFAULT NULL COMMENT '%',
  `payment_method` varchar(50) DEFAULT NULL,
  `update_by` varchar(12) DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of config_unit
-- ----------------------------
BEGIN;
INSERT INTO `config_unit` VALUES (1, '1002', '10', '1', '0', NULL, '0', '\'01\',\'02\'', NULL);
COMMIT;

-- ----------------------------
-- Table structure for login_error
-- ----------------------------
DROP TABLE IF EXISTS `login_error`;
CREATE TABLE `login_error` (
  `ID` int(4) NOT NULL AUTO_INCREMENT,
  `USERNAME` varchar(20) DEFAULT NULL,
  `PASSWORD` varchar(200) DEFAULT NULL,
  PRIMARY KEY (`ID`) USING BTREE
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of login_error
-- ----------------------------
BEGIN;
INSERT INTO `login_error` VALUES (3, 'DA', 'DA');
INSERT INTO `login_error` VALUES (4, 'ADMIN', 'kecilsemua');
INSERT INTO `login_error` VALUES (5, 'ADMIN2', 'kecil');
INSERT INTO `login_error` VALUES (6, 'ADMIN', 'kecilsemua');
INSERT INTO `login_error` VALUES (7, 'ADMIN', 'kecilsemua');
INSERT INTO `login_error` VALUES (8, 'FACHRULRAZI.ACH1@GMA', '123123123');
INSERT INTO `login_error` VALUES (9, 'FACHRULRAZI.ACH1@GMA', '123123123');
COMMIT;

-- ----------------------------
-- Table structure for master_unit
-- ----------------------------
DROP TABLE IF EXISTS `master_unit`;
CREATE TABLE `master_unit` (
  `ID` int(4) NOT NULL AUTO_INCREMENT,
  `COMP_CODE` int(4) DEFAULT NULL,
  `BUSS_AREA` int(4) DEFAULT NULL,
  `UNIT_TYPE` varchar(10) DEFAULT NULL,
  `UNIT_NAME` varchar(20) DEFAULT NULL,
  `UNIT_LEVEL` varchar(20) DEFAULT NULL,
  `STATUS` int(1) DEFAULT NULL,
  PRIMARY KEY (`ID`) USING BTREE
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of master_unit
-- ----------------------------
BEGIN;
INSERT INTO `master_unit` VALUES (2, 6100, 6101, 'UIW', 'UIW ACEH', '1', 1);
INSERT INTO `master_unit` VALUES (3, 6100, 6111, 'UP3', 'UP3 LANGSA', '2', 1);
INSERT INTO `master_unit` VALUES (4, 6100, 6112, 'UP3', 'UP3 BANDA ACEH', '2', 1);
INSERT INTO `master_unit` VALUES (5, 6100, 6113, 'UP3', 'UP3 LHOKSEUMAWE', '2', 1);
INSERT INTO `master_unit` VALUES (6, 6100, 6114, 'UP3', 'UP3 MEULABOH', '2', 1);
INSERT INTO `master_unit` VALUES (7, 6100, 6115, 'UP3', 'UP3 SUBULUSSALAM', '2', 1);
INSERT INTO `master_unit` VALUES (8, 6100, 6116, 'UP3', 'UP3 SIGLI', '2', 1);
INSERT INTO `master_unit` VALUES (9, 6100, 6156, 'UP2D', 'UP2D ACEH', '2', 1);
INSERT INTO `master_unit` VALUES (10, 6100, 6118, 'UP2K', 'UP2K PROV ACEH', '2', 1);
COMMIT;

-- ----------------------------
-- Table structure for members
-- ----------------------------
DROP TABLE IF EXISTS `members`;
CREATE TABLE `members` (
  `ID` int(4) NOT NULL AUTO_INCREMENT,
  `UNIT_CODE` varchar(4) DEFAULT NULL,
  `USERNAME` varchar(20) DEFAULT NULL,
  `PASSWORD` varchar(200) DEFAULT NULL,
  `FULLNAME` varchar(20) DEFAULT NULL,
  `GROUP_ID` varchar(4) DEFAULT NULL,
  `GROUP_LEVEL` varchar(20) DEFAULT NULL,
  `EMAIL` varchar(50) DEFAULT NULL,
  `REGISTER_BY` varchar(20) DEFAULT NULL,
  `REGISTER_DATE` date DEFAULT NULL,
  `VALIDATION_DARE` date DEFAULT NULL,
  `STATUS` varchar(20) DEFAULT NULL,
  PRIMARY KEY (`ID`) USING BTREE
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of members
-- ----------------------------
BEGIN;
INSERT INTO `members` VALUES (1, '0000', 'ADMIN', 'kecilsemua', 'ADMIN', '1', '0', 'ADMIN@ADMIN.COM', NULL, NULL, NULL, NULL);
INSERT INTO `members` VALUES (2, '1000', 'ADMIN2', '$2y$10$IeoTtLQO4DF5.nAOX9cRr.5llQsf0dej8eYf5pU8waYXzmg1Gdf6G', 'ADMIN2', '1', '1', NULL, NULL, NULL, NULL, NULL);
COMMIT;

-- ----------------------------
-- Table structure for menu
-- ----------------------------
DROP TABLE IF EXISTS `menu`;
CREATE TABLE `menu` (
  `id` int(4) NOT NULL AUTO_INCREMENT,
  `menu_unit` varchar(4) DEFAULT NULL,
  `cat_cd` varchar(20) NOT NULL,
  `menu_name` varchar(300) DEFAULT NULL,
  `menu_status` varchar(5) DEFAULT NULL,
  `menu_price` decimal(15,0) DEFAULT NULL,
  `cost_of_sales` decimal(15,0) DEFAULT NULL,
  `discount_status` varchar(1) DEFAULT NULL,
  `discount_price` decimal(15,0) DEFAULT NULL,
  `update_date` date DEFAULT NULL,
  `update_by` varchar(50) DEFAULT NULL,
  `image` varchar(20) DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE=InnoDB AUTO_INCREMENT=17 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of menu
-- ----------------------------
BEGIN;
INSERT INTO `menu` VALUES (3, '1002', '1002003', 'Sanger Arabica - HOT', '1', 12000, 2121, NULL, NULL, '2019-12-04', 'fachrulrazi.ach@gmail.com', '760142941.png');
INSERT INTO `menu` VALUES (4, '1002', '1002001', 'Indomie Goreng Pete', '0', 14000, 1, NULL, NULL, '2020-03-16', 'fachrulrazi.ach@gmail.com', '1269126005.png');
INSERT INTO `menu` VALUES (5, '1002', '1002002', 'Nasi Rendang Balado', '1', 22000, 121, NULL, NULL, '2020-05-01', 'fachrulrazi.ach@gmail.com', '1000133916.png');
INSERT INTO `menu` VALUES (6, '1002', '1002005', 'Kentang Goreng Gokil', '1', 13000, 2121, NULL, NULL, '2019-12-04', 'fachrulrazi.ach@gmail.com', '163451543.png');
INSERT INTO `menu` VALUES (7, '1002', '1002005', 'Churros', '1', 15000, 1, NULL, NULL, '2019-12-04', 'fachrulrazi.ach@gmail.com', '1835584749.png');
INSERT INTO `menu` VALUES (8, '1002', '1002003', 'Sirup Kurnia', '1', 12000, 1, NULL, NULL, '2019-12-04', 'fachrulrazi.ach@gmail.com', '798759178.png');
INSERT INTO `menu` VALUES (9, '1002', '1002003', 'Sirup Cap Patung', '1', 13000, 2121, NULL, NULL, '2019-12-04', 'fachrulrazi.ach@gmail.com', '1824742296.png');
INSERT INTO `menu` VALUES (10, '1002', '1002002', 'Nasi Goreng Buncit', '1', 15000, 1, NULL, NULL, '2019-12-04', 'fachrulrazi.ach@gmail.com', '796560323.png');
INSERT INTO `menu` VALUES (11, '1002', '1002002', 'Menu Baru Guys', '0', 25, 20, NULL, NULL, '2020-03-16', 'fachrulrazi.ach@gmail.com', '1607006071.png');
INSERT INTO `menu` VALUES (12, '1002', '1002004', 'Menu Baru lagi', '0', 9, 999, NULL, NULL, '2020-03-16', 'fachrulrazi.ach@gmail.com', '879532775.png');
INSERT INTO `menu` VALUES (13, '1002', '1002002', 'Menu Baru', '1', 20, 20, NULL, NULL, '2020-03-16', 'fachrulrazi.ach@gmail.com', '1686364113.png');
INSERT INTO `menu` VALUES (14, '1002', '1002004', 'wqw', '1', 232, 3, NULL, NULL, '2020-03-16', 'fachrulrazi.ach@gmail.com', '1018475071.png');
INSERT INTO `menu` VALUES (15, '1002', '1002002', 'q', '1', 11, 11, NULL, NULL, '2020-05-01', 'fachrulrazi.ach@gmail.com', '1547848305.png');
INSERT INTO `menu` VALUES (16, '1002', '1002002', 'wq', '1', 22, 22, NULL, NULL, '2020-05-02', 'fachrulrazi.ach@gmail.com', '323131416.jpeg');
COMMIT;

-- ----------------------------
-- Table structure for menu_category
-- ----------------------------
DROP TABLE IF EXISTS `menu_category`;
CREATE TABLE `menu_category` (
  `id` int(4) NOT NULL AUTO_INCREMENT,
  `cat_unit` varchar(4) DEFAULT NULL,
  `cat_cd` varchar(7) NOT NULL,
  `cat_text` varchar(300) DEFAULT NULL,
  `cat_status` int(2) DEFAULT NULL,
  `update_date` date DEFAULT NULL,
  `update_by` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of menu_category
-- ----------------------------
BEGIN;
INSERT INTO `menu_category` VALUES (5, '1002', '1002001', 'Indomie Nusantara', 1, '2019-12-04', 'fachrulrazi.ach@gmail.com');
INSERT INTO `menu_category` VALUES (6, '1002', '1002002', 'Heavy Meals', 1, '2019-12-04', 'fachrulrazi.ach@gmail.com');
INSERT INTO `menu_category` VALUES (7, '1002', '1002003', 'Drink', 2, '2020-02-01', 'fachrulrazi.ach@gmail.com');
INSERT INTO `menu_category` VALUES (8, '1002', '1002004', 'Dessert', 1, '2019-12-04', 'fachrulrazi.ach@gmail.com');
INSERT INTO `menu_category` VALUES (9, '1002', '1002005', 'Snack', 1, '2019-12-04', 'fachrulrazi.ach@gmail.com');
COMMIT;

-- ----------------------------
-- Table structure for migrations
-- ----------------------------
DROP TABLE IF EXISTS `migrations`;
CREATE TABLE `migrations` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- ----------------------------
-- Table structure for users
-- ----------------------------
DROP TABLE IF EXISTS `users`;
CREATE TABLE `users` (
  `id` int(4) NOT NULL AUTO_INCREMENT,
  `unit` varchar(4) DEFAULT NULL,
  `group_id` varchar(4) DEFAULT NULL,
  `pers_no` varchar(20) DEFAULT NULL,
  `username` varchar(30) DEFAULT NULL,
  `email` varchar(30) DEFAULT NULL,
  `password` varchar(100) DEFAULT NULL,
  `name` varchar(30) DEFAULT NULL,
  `created_at` date DEFAULT NULL,
  `expired_at` date DEFAULT NULL,
  `updated_at` date DEFAULT NULL,
  `provider` varchar(20) DEFAULT NULL,
  `provider_id` varchar(20) DEFAULT NULL,
  `socialite_photo` varchar(20) DEFAULT NULL,
  `status` varchar(20) DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE=InnoDB AUTO_INCREMENT=17 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of users
-- ----------------------------
BEGIN;
INSERT INTO `users` VALUES (4, '1002', NULL, NULL, 'fachrul', 'fachrulrazi.ach@gmail.com', '$2y$10$IeoTtLQO4DF5.nAOX9cRr.5llQsf0dej8eYf5pU8waYXzmg1Gdf6G', 'Fachrul Razi', '2019-10-09', NULL, '2019-10-09', NULL, NULL, NULL, NULL);
INSERT INTO `users` VALUES (14, '6101', '2', '9313022NY', 'fachrul', 'fachrul@bereeh.id', '$2y$10$LmGMmOVw9xN6qcLBhbAF9uE5ms3QJ.BXqEgaCGNJGciLW5Pa486eG', NULL, '2020-05-17', NULL, NULL, NULL, NULL, NULL, 'ACTIVE');
INSERT INTO `users` VALUES (15, '6111', '5', '9999999', 'rizki', 'rizki@smk3.net', '$2y$10$1G4Pp7qC1zjG8a/AcvjUK.O4689KbuEOVsjMoPtlHuw2m6uSfPPri', '99999', '2020-05-17', NULL, NULL, NULL, NULL, NULL, 'ACTIVE');
INSERT INTO `users` VALUES (16, '6111', '5', 'sasass', 'qwqqw', 'qwqqw@waswas.id', '$2y$10$c2jmMz3Uv9aU3EsdlLwdYuWwN39t3arqqNhVusaQMGQN6aUiij2gm', 'sas', '2020-05-17', NULL, NULL, NULL, NULL, NULL, 'ACTIVE');
COMMIT;

-- ----------------------------
-- Table structure for users_group
-- ----------------------------
DROP TABLE IF EXISTS `users_group`;
CREATE TABLE `users_group` (
  `ID` int(4) NOT NULL AUTO_INCREMENT,
  `GROUP_NAME` varchar(20) DEFAULT NULL,
  `UNIT_LEVEL` varchar(20) DEFAULT NULL,
  `STATUS` varchar(20) DEFAULT NULL,
  PRIMARY KEY (`ID`) USING BTREE
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of users_group
-- ----------------------------
BEGIN;
INSERT INTO `users_group` VALUES (1, 'SUPER ADMIN', '0', '1');
INSERT INTO `users_group` VALUES (2, 'CHAMPIONS UI', '1', '1');
INSERT INTO `users_group` VALUES (3, 'PEJABAT UI', '1', '1');
INSERT INTO `users_group` VALUES (4, 'PEJABAT UP', '2', '1');
INSERT INTO `users_group` VALUES (5, 'CHAMPIONS UP', '2', '1');
INSERT INTO `users_group` VALUES (6, 'CHAMPIONS UL', '3', '1');
COMMIT;

SET FOREIGN_KEY_CHECKS = 1;
