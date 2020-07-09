-- phpMyAdmin SQL Dump
-- version 4.8.4
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Jul 09, 2020 at 08:47 PM
-- Server version: 10.1.37-MariaDB
-- PHP Version: 7.3.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `k3l`
--

-- --------------------------------------------------------

--
-- Table structure for table `account_code`
--

CREATE TABLE `account_code` (
  `id` int(4) NOT NULL,
  `account_unit` varchar(4) DEFAULT NULL,
  `account_cd` decimal(20,0) NOT NULL,
  `account_text` varchar(300) DEFAULT NULL,
  `account_group` varchar(5) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `account_group`
--

CREATE TABLE `account_group` (
  `id` int(4) NOT NULL,
  `group_unit` varchar(4) DEFAULT NULL,
  `group_cd` decimal(20,0) NOT NULL,
  `group_text` varchar(300) DEFAULT NULL,
  `group_status` varchar(5) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `account_group`
--

INSERT INTO `account_group` (`id`, `group_unit`, `group_cd`, `group_text`, `group_status`) VALUES
(1, '1000', '100001', 'AKTIVA LANCAR', '1'),
(2, '1000', '100002', 'AKTIVA TETAP', '1'),
(3, '1000', '100003', 'UTANG USAHA', '1'),
(4, '1000', '100004', 'MODAL', '1'),
(5, '1000', '100005', 'PENDAPATAN USAHA', '1'),
(6, '1000', '100006', 'BEBAN USAHA', '1'),
(7, '1000', '100007', 'AKUN PENUTUP', '1'),
(8, '1000', '100008', 'POS SILANG', '1');

-- --------------------------------------------------------

--
-- Table structure for table `config_discount`
--

CREATE TABLE `config_discount` (
  `id` int(4) NOT NULL,
  `unit` varchar(4) DEFAULT NULL,
  `tax_amount` varchar(100) DEFAULT NULL,
  `tax_status` varchar(3) DEFAULT NULL,
  `total_qt` varchar(4) DEFAULT NULL,
  `status` varchar(20) DEFAULT NULL,
  `add_desc` varchar(50) DEFAULT NULL,
  `update_by` varchar(12) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `config_unit`
--

CREATE TABLE `config_unit` (
  `id` int(4) NOT NULL,
  `unit` varchar(4) DEFAULT NULL,
  `tax_amount` varchar(3) DEFAULT NULL COMMENT '%',
  `tax_status` varchar(3) DEFAULT NULL,
  `discount_status` varchar(3) DEFAULT NULL,
  `discount_type` varchar(20) DEFAULT NULL COMMENT '1=ALL; 2=MEMBER; 3=SELECTED ITEM; 4=SELECTED CATEGORY',
  `discount_amount` varchar(3) DEFAULT NULL COMMENT '%',
  `payment_method` varchar(50) DEFAULT NULL,
  `update_by` varchar(12) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `config_unit`
--

INSERT INTO `config_unit` (`id`, `unit`, `tax_amount`, `tax_status`, `discount_status`, `discount_type`, `discount_amount`, `payment_method`, `update_by`) VALUES
(1, '1002', '10', '1', '0', NULL, '0', '\'01\',\'02\'', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `login_error`
--

CREATE TABLE `login_error` (
  `ID` int(4) NOT NULL,
  `USERNAME` varchar(20) DEFAULT NULL,
  `PASSWORD` varchar(200) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `login_error`
--

INSERT INTO `login_error` (`ID`, `USERNAME`, `PASSWORD`) VALUES
(3, 'DA', 'DA'),
(4, 'ADMIN', 'kecilsemua'),
(5, 'ADMIN2', 'kecil'),
(6, 'ADMIN', 'kecilsemua'),
(7, 'ADMIN', 'kecilsemua'),
(8, 'FACHRULRAZI.ACH1@GMA', '123123123'),
(9, 'FACHRULRAZI.ACH1@GMA', '123123123');

-- --------------------------------------------------------

--
-- Table structure for table `master_unit`
--

CREATE TABLE `master_unit` (
  `ID` int(4) NOT NULL,
  `COMP_CODE` int(4) DEFAULT NULL,
  `BUSS_AREA` int(4) DEFAULT NULL,
  `UNIT_TYPE` varchar(10) DEFAULT NULL,
  `UNIT_NAME` varchar(20) DEFAULT NULL,
  `UNIT_LEVEL` varchar(20) DEFAULT NULL,
  `STATUS` int(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `master_unit`
--

INSERT INTO `master_unit` (`ID`, `COMP_CODE`, `BUSS_AREA`, `UNIT_TYPE`, `UNIT_NAME`, `UNIT_LEVEL`, `STATUS`) VALUES
(2, 6100, 6101, 'UIW', 'UIW ACEH', '1', 1),
(3, 6100, 6111, 'UP3', 'UP3 LANGSA', '2', 1),
(4, 6100, 6112, 'UP3', 'UP3 BANDA ACEH', '2', 1),
(5, 6100, 6113, 'UP3', 'UP3 LHOKSEUMAWE', '2', 1),
(6, 6100, 6114, 'UP3', 'UP3 MEULABOH', '2', 1),
(7, 6100, 6115, 'UP3', 'UP3 SUBULUSSALAM', '2', 1),
(8, 6100, 6116, 'UP3', 'UP3 SIGLI', '2', 1),
(9, 6100, 6156, 'UP2D', 'UP2D ACEH', '2', 1),
(10, 6100, 6118, 'UP2K', 'UP2K PROV ACEH', '2', 1);

-- --------------------------------------------------------

--
-- Table structure for table `master_unit_type`
--

CREATE TABLE `master_unit_type` (
  `ID` int(4) NOT NULL,
  `UNIT_TYPE` varchar(10) DEFAULT NULL,
  `TYPE_NAME` varchar(50) DEFAULT NULL,
  `UNIT_LEVEL` varchar(20) DEFAULT NULL,
  `STATUS` int(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `master_unit_type`
--

INSERT INTO `master_unit_type` (`ID`, `UNIT_TYPE`, `TYPE_NAME`, `UNIT_LEVEL`, `STATUS`) VALUES
(11, 'UP2D', 'UNIT PENGATUR DISTRIBUSI', '2', 1),
(12, 'UP3', 'UNIT PENGATUR & PELAYANAN PELANGGAN', '2', 1),
(13, 'UPPK', 'UNIT PENGATUR & PELAYANAN KELISTRIKAN', '2', 1);

-- --------------------------------------------------------

--
-- Table structure for table `members`
--

CREATE TABLE `members` (
  `ID` int(4) NOT NULL,
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
  `STATUS` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `members`
--

INSERT INTO `members` (`ID`, `UNIT_CODE`, `USERNAME`, `PASSWORD`, `FULLNAME`, `GROUP_ID`, `GROUP_LEVEL`, `EMAIL`, `REGISTER_BY`, `REGISTER_DATE`, `VALIDATION_DARE`, `STATUS`) VALUES
(1, '0000', 'ADMIN', 'kecilsemua', 'ADMIN', '1', '0', 'ADMIN@ADMIN.COM', NULL, NULL, NULL, NULL),
(2, '1000', 'ADMIN2', '$2y$10$IeoTtLQO4DF5.nAOX9cRr.5llQsf0dej8eYf5pU8waYXzmg1Gdf6G', 'ADMIN2', '1', '1', NULL, NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `menu`
--

CREATE TABLE `menu` (
  `id` int(4) NOT NULL,
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
  `image` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `menu`
--

INSERT INTO `menu` (`id`, `menu_unit`, `cat_cd`, `menu_name`, `menu_status`, `menu_price`, `cost_of_sales`, `discount_status`, `discount_price`, `update_date`, `update_by`, `image`) VALUES
(3, '1002', '1002003', 'Sanger Arabica - HOT', '1', '12000', '2121', NULL, NULL, '2019-12-04', 'fachrulrazi.ach@gmail.com', '760142941.png'),
(4, '1002', '1002001', 'Indomie Goreng Pete', '0', '14000', '1', NULL, NULL, '2020-03-16', 'fachrulrazi.ach@gmail.com', '1269126005.png'),
(5, '1002', '1002002', 'Nasi Rendang Balado', '1', '22000', '121', NULL, NULL, '2020-05-01', 'fachrulrazi.ach@gmail.com', '1000133916.png'),
(6, '1002', '1002005', 'Kentang Goreng Gokil', '1', '13000', '2121', NULL, NULL, '2019-12-04', 'fachrulrazi.ach@gmail.com', '163451543.png'),
(7, '1002', '1002005', 'Churros', '1', '15000', '1', NULL, NULL, '2019-12-04', 'fachrulrazi.ach@gmail.com', '1835584749.png'),
(8, '1002', '1002003', 'Sirup Kurnia', '1', '12000', '1', NULL, NULL, '2019-12-04', 'fachrulrazi.ach@gmail.com', '798759178.png'),
(9, '1002', '1002003', 'Sirup Cap Patung', '1', '13000', '2121', NULL, NULL, '2019-12-04', 'fachrulrazi.ach@gmail.com', '1824742296.png'),
(10, '1002', '1002002', 'Nasi Goreng Buncit', '1', '15000', '1', NULL, NULL, '2019-12-04', 'fachrulrazi.ach@gmail.com', '796560323.png'),
(11, '1002', '1002002', 'Menu Baru Guys', '0', '25', '20', NULL, NULL, '2020-03-16', 'fachrulrazi.ach@gmail.com', '1607006071.png'),
(12, '1002', '1002004', 'Menu Baru lagi', '0', '9', '999', NULL, NULL, '2020-03-16', 'fachrulrazi.ach@gmail.com', '879532775.png'),
(13, '1002', '1002002', 'Menu Baru', '1', '20', '20', NULL, NULL, '2020-03-16', 'fachrulrazi.ach@gmail.com', '1686364113.png'),
(14, '1002', '1002004', 'wqw', '1', '232', '3', NULL, NULL, '2020-03-16', 'fachrulrazi.ach@gmail.com', '1018475071.png'),
(15, '1002', '1002002', 'q', '1', '11', '11', NULL, NULL, '2020-05-01', 'fachrulrazi.ach@gmail.com', '1547848305.png'),
(16, '1002', '1002002', 'wq', '1', '22', '22', NULL, NULL, '2020-05-02', 'fachrulrazi.ach@gmail.com', '323131416.jpeg');

-- --------------------------------------------------------

--
-- Table structure for table `menu_category`
--

CREATE TABLE `menu_category` (
  `id` int(4) NOT NULL,
  `cat_unit` varchar(4) DEFAULT NULL,
  `cat_cd` varchar(7) NOT NULL,
  `cat_text` varchar(300) DEFAULT NULL,
  `cat_status` int(2) DEFAULT NULL,
  `update_date` date DEFAULT NULL,
  `update_by` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `menu_category`
--

INSERT INTO `menu_category` (`id`, `cat_unit`, `cat_cd`, `cat_text`, `cat_status`, `update_date`, `update_by`) VALUES
(5, '1002', '1002001', 'Indomie Nusantara', 1, '2019-12-04', 'fachrulrazi.ach@gmail.com'),
(6, '1002', '1002002', 'Heavy Meals', 1, '2019-12-04', 'fachrulrazi.ach@gmail.com'),
(7, '1002', '1002003', 'Drink', 2, '2020-02-01', 'fachrulrazi.ach@gmail.com'),
(8, '1002', '1002004', 'Dessert', 1, '2019-12-04', 'fachrulrazi.ach@gmail.com'),
(9, '1002', '1002005', 'Snack', 1, '2019-12-04', 'fachrulrazi.ach@gmail.com');

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(4) NOT NULL,
  `unit` varchar(4) DEFAULT NULL,
  `group_id` varchar(4) DEFAULT NULL,
  `pers_no` varchar(20) DEFAULT NULL,
  `username` varchar(30) DEFAULT NULL,
  `email` varchar(30) DEFAULT NULL,
  `password` varchar(100) DEFAULT NULL,
  `name` varchar(30) DEFAULT NULL,
  `position_desc` varchar(50) DEFAULT NULL,
  `created_at` date DEFAULT NULL,
  `expired_at` date DEFAULT NULL,
  `updated_at` date DEFAULT NULL,
  `provider` varchar(20) DEFAULT NULL,
  `provider_id` varchar(20) DEFAULT NULL,
  `socialite_photo` varchar(20) DEFAULT NULL,
  `status` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `unit`, `group_id`, `pers_no`, `username`, `email`, `password`, `name`, `position_desc`, `created_at`, `expired_at`, `updated_at`, `provider`, `provider_id`, `socialite_photo`, `status`) VALUES
(4, '1002', NULL, NULL, 'fachrul', 'fachrulrazi.ach@gmail.com', '$2y$10$IeoTtLQO4DF5.nAOX9cRr.5llQsf0dej8eYf5pU8waYXzmg1Gdf6G', 'Fachrul Razi', NULL, '2019-10-09', NULL, '2019-10-09', NULL, NULL, NULL, NULL),
(14, '6101', '2', '9313022NY', 'fachrul', 'fachrul@bereeh.id', '$2y$10$LmGMmOVw9xN6qcLBhbAF9uE5ms3QJ.BXqEgaCGNJGciLW5Pa486eG', NULL, NULL, '2020-05-17', NULL, NULL, NULL, NULL, NULL, 'ACTIVE'),
(15, '6111', '5', '9999999', 'rizki', 'rizki@smk3.net', '$2y$10$1G4Pp7qC1zjG8a/AcvjUK.O4689KbuEOVsjMoPtlHuw2m6uSfPPri', '99999', NULL, '2020-05-17', NULL, NULL, NULL, NULL, NULL, 'ACTIVE'),
(16, '6111', '5', 'sasass', 'qwqqw', 'qwqqw@waswas.id', '$2y$10$c2jmMz3Uv9aU3EsdlLwdYuWwN39t3arqqNhVusaQMGQN6aUiij2gm', 'sas', NULL, '2020-05-17', NULL, NULL, NULL, NULL, NULL, 'ACTIVE'),
(17, '6101', '2', 'mia', 'mia', 'mia@mia.com', '$2y$10$zNQkQbR8LNlgD0zr/A12S.uyuqLLxmshEQEdhqRhkZrNbi33DHlbe', 'miamia', NULL, '2020-06-18', NULL, NULL, NULL, NULL, NULL, 'ACTIVE'),
(18, '6118', '6', '90090', 'test', 'test@gagas.com', '$2y$10$kq7mhluvqT0A5VWTeHWCAu.TKqxIuupmkPvMmouPEM8kfIvnSVv.q', 'gagas', NULL, '2020-07-09', NULL, NULL, NULL, NULL, NULL, 'ACTIVE'),
(19, '6116', '6', 'gg', 'fachru', 'fachru@ggggg', '$2y$10$0DfG5FXp.913dAo995mO7OMWQ/WilMMp0GI9eKCZOCTDiZe9mjb9u', 'GAGAS', 'PJ', '2020-07-09', NULL, NULL, NULL, NULL, NULL, 'ACTIVE'),
(20, '6116', '4', 'indra', 'indra', 'indra@pln.co.id', '$2y$10$JOoGa0AOsC9ctNsE5.eBturO9AMoUX9vYwi0Se/poOcfwt6BbAYSi', 'INDRA SUHERI', 'MANAGER KSA', '2020-07-09', NULL, NULL, NULL, NULL, NULL, 'ACTIVE'),
(21, '6116', '5', 'i', 'fauzi', 'fauzi@ddd.comn', '$2y$10$1kfojzELcmulVlUHM3i4p.Pci/7aFBav9bTLF9voD0VJelmr.ufTW', 'FAUZI', 'SPV', '2020-07-09', NULL, NULL, NULL, NULL, NULL, 'ACTIVE');

-- --------------------------------------------------------

--
-- Table structure for table `users_group`
--

CREATE TABLE `users_group` (
  `ID` int(4) NOT NULL,
  `GROUP_NAME` varchar(20) DEFAULT NULL,
  `UNIT_LEVEL` varchar(20) DEFAULT NULL,
  `STATUS` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users_group`
--

INSERT INTO `users_group` (`ID`, `GROUP_NAME`, `UNIT_LEVEL`, `STATUS`) VALUES
(1, 'SUPER ADMIN', '0', '1'),
(2, 'CHAMPIONS UI', '1', '1'),
(3, 'PEJABAT UI', '1', '1'),
(4, 'MANAGER UP/UL', '2', '1'),
(5, 'SUPERVISOR UP/UL', '2', '1'),
(6, 'PEJABAT UP/UL', '2', '1');

-- --------------------------------------------------------

--
-- Table structure for table `working_permit`
--

CREATE TABLE `working_permit` (
  `id_wp` varchar(10) NOT NULL,
  `unit` varchar(4) DEFAULT NULL,
  `tgl_pengajuan` date DEFAULT NULL,
  `jenis_pekerjaan` varchar(200) NOT NULL,
  `detail_pekerjaan` varchar(200) DEFAULT NULL,
  `lokasi_pekerjaan` varchar(200) DEFAULT NULL,
  `pengawas_pekerjaan` varchar(50) DEFAULT NULL,
  `no_pengawas_pekerjaan` varchar(20) DEFAULT NULL,
  `pengawas_k3l` varchar(200) DEFAULT NULL,
  `no_pengawas_k3` varchar(20) DEFAULT NULL,
  `tgl_mulai` date DEFAULT NULL,
  `tgl_selesai` date DEFAULT NULL,
  `jam_mulai` text,
  `jam_selesai` text,
  `manager` varchar(30) DEFAULT NULL,
  `supervisor` varchar(30) DEFAULT NULL,
  `pejabat_k3l` varchar(30) DEFAULT NULL,
  `status` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `working_permit`
--

INSERT INTO `working_permit` (`id_wp`, `unit`, `tgl_pengajuan`, `jenis_pekerjaan`, `detail_pekerjaan`, `lokasi_pekerjaan`, `pengawas_pekerjaan`, `no_pengawas_pekerjaan`, `pengawas_k3l`, `no_pengawas_k3`, `tgl_mulai`, `tgl_selesai`, `jam_mulai`, `jam_selesai`, `manager`, `supervisor`, `pejabat_k3l`, `status`) VALUES
('6116200001', '6116', '2020-07-09', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'INDRA SUHERI', 'FAUZI', 'GAGAS', 'NEW'),
('6116200002', '6116', '2020-07-09', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'INDRA SUHERI', 'FAUZI', 'GAGAS', 'NEW'),
('6116200003', '6116', '2020-07-09', '', 'test nama pekerjaan', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'INDRA SUHERI', 'FAUZI', 'GAGAS', 'NEW');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `account_code`
--
ALTER TABLE `account_code`
  ADD PRIMARY KEY (`id`) USING BTREE;

--
-- Indexes for table `account_group`
--
ALTER TABLE `account_group`
  ADD PRIMARY KEY (`id`) USING BTREE;

--
-- Indexes for table `config_discount`
--
ALTER TABLE `config_discount`
  ADD PRIMARY KEY (`id`) USING BTREE;

--
-- Indexes for table `config_unit`
--
ALTER TABLE `config_unit`
  ADD PRIMARY KEY (`id`) USING BTREE;

--
-- Indexes for table `login_error`
--
ALTER TABLE `login_error`
  ADD PRIMARY KEY (`ID`) USING BTREE;

--
-- Indexes for table `master_unit`
--
ALTER TABLE `master_unit`
  ADD PRIMARY KEY (`ID`) USING BTREE;

--
-- Indexes for table `master_unit_type`
--
ALTER TABLE `master_unit_type`
  ADD PRIMARY KEY (`ID`) USING BTREE;

--
-- Indexes for table `members`
--
ALTER TABLE `members`
  ADD PRIMARY KEY (`ID`) USING BTREE;

--
-- Indexes for table `menu`
--
ALTER TABLE `menu`
  ADD PRIMARY KEY (`id`) USING BTREE;

--
-- Indexes for table `menu_category`
--
ALTER TABLE `menu_category`
  ADD PRIMARY KEY (`id`) USING BTREE;

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`) USING BTREE;

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`) USING BTREE;

--
-- Indexes for table `users_group`
--
ALTER TABLE `users_group`
  ADD PRIMARY KEY (`ID`) USING BTREE;

--
-- Indexes for table `working_permit`
--
ALTER TABLE `working_permit`
  ADD PRIMARY KEY (`id_wp`) USING BTREE;

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `account_code`
--
ALTER TABLE `account_code`
  MODIFY `id` int(4) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `account_group`
--
ALTER TABLE `account_group`
  MODIFY `id` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `config_discount`
--
ALTER TABLE `config_discount`
  MODIFY `id` int(4) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `config_unit`
--
ALTER TABLE `config_unit`
  MODIFY `id` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `login_error`
--
ALTER TABLE `login_error`
  MODIFY `ID` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `master_unit`
--
ALTER TABLE `master_unit`
  MODIFY `ID` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `master_unit_type`
--
ALTER TABLE `master_unit_type`
  MODIFY `ID` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `members`
--
ALTER TABLE `members`
  MODIFY `ID` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `menu`
--
ALTER TABLE `menu`
  MODIFY `id` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `menu_category`
--
ALTER TABLE `menu_category`
  MODIFY `id` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `users_group`
--
ALTER TABLE `users_group`
  MODIFY `ID` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
