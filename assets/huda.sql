/*
 Navicat Premium Data Transfer

 Source Server         : lokal
 Source Server Type    : MySQL
 Source Server Version : 100411
 Source Host           : localhost:3306
 Source Schema         : huda

 Target Server Type    : MySQL
 Target Server Version : 100411
 File Encoding         : 65001

 Date: 09/05/2020 00:51:10
*/

SET NAMES utf8mb4;
SET FOREIGN_KEY_CHECKS = 0;

-- ----------------------------
-- Table structure for budget
-- ----------------------------
DROP TABLE IF EXISTS `budget`;
CREATE TABLE `budget`  (
  `id` int(35) NOT NULL AUTO_INCREMENT,
  `sort_by` int(20) NULL DEFAULT NULL,
  `kd_rek` int(5) NULL DEFAULT NULL COMMENT '= id table rekening',
  `name` varchar(150) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `cost` decimal(12, 0) NOT NULL,
  `qty1` int(23) NULL DEFAULT NULL,
  `unit1` varchar(150) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `qty2` int(23) NULL DEFAULT NULL,
  `unit2` varchar(150) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `description` text CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL,
  `created_at` timestamp(0) NOT NULL DEFAULT current_timestamp(0) ON UPDATE CURRENT_TIMESTAMP(0),
  `updated_at` timestamp(0) NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 48 CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of budget
-- ----------------------------
INSERT INTO `budget` VALUES (1, 1, 10, 'Ketua', 150000, 1, 'Orang', 9, 'Bulan', 'Keterangan', '2020-04-16 21:22:38', '2020-04-16 16:11:10');
INSERT INTO `budget` VALUES (2, 2, 10, 'Wakil Ketua', 100000, 1, 'Orang', 9, 'Bulan', 'Keterangan', '2020-04-16 21:22:40', '0000-00-00 00:00:00');
INSERT INTO `budget` VALUES (3, 3, 10, 'Bendahara', 100000, 2, 'Orang', 9, 'Bulan', '', '2020-04-16 16:44:28', '0000-00-00 00:00:00');
INSERT INTO `budget` VALUES (4, 4, 10, 'Sekertaris', 100000, 2, 'Orang', 9, 'Bulan', '', '2020-04-16 16:46:51', '0000-00-00 00:00:00');
INSERT INTO `budget` VALUES (7, 1, 12, 'Tunjangan Hari Raya', 17000000, 1, 'Kali', 0, '', '', '2020-04-16 17:42:15', '0000-00-00 00:00:00');
INSERT INTO `budget` VALUES (8, 1, 13, 'Imam Sholat', 900000, 1, 'Kali', 0, '', '', '2020-04-16 17:42:56', '0000-00-00 00:00:00');
INSERT INTO `budget` VALUES (9, 1, 8, 'Sewa Tanah Wakaf', 16000000, 5, 'Bahu', 1, 'Musim', '', '2020-04-17 17:02:31', '0000-00-00 00:00:00');
INSERT INTO `budget` VALUES (10, 1, 9, 'Kotak Amal Masjid', 6000000, 9, 'Bulan', 0, '', '', '2020-04-24 15:26:10', '0000-00-00 00:00:00');
INSERT INTO `budget` VALUES (12, 1, 14, 'Bindex kwitansi', 80000, 1, 'Pack', 0, '', '', '2020-04-24 16:31:50', '0000-00-00 00:00:00');
INSERT INTO `budget` VALUES (13, 2, 14, 'Bindex File', 80000, 1, 'Pack', 0, '', '', '2020-04-24 16:32:21', '0000-00-00 00:00:00');
INSERT INTO `budget` VALUES (14, 3, 14, 'Buku kas', 25000, 1, 'Pack', 0, '', '', '2020-04-24 16:33:04', '0000-00-00 00:00:00');
INSERT INTO `budget` VALUES (15, 4, 14, 'Buku folio', 25000, 1, 'Pack', 0, '', '', '2020-04-24 16:33:47', '0000-00-00 00:00:00');
INSERT INTO `budget` VALUES (16, 5, 14, 'Kertas A4', 90000, 1, 'Rim', 0, '', '', '2020-04-24 16:34:18', '0000-00-00 00:00:00');
INSERT INTO `budget` VALUES (17, 6, 14, 'Fotocopy', 100000, 9, 'Bulan', 0, '', '', '2020-04-24 22:10:52', '2020-04-24 17:10:52');
INSERT INTO `budget` VALUES (18, 1, 15, 'Biaya rumah tangga masjid', 500000, 4, 'Bulan', 0, '', 'Galon air mineral, gula, kopi, sabun cuci, sabun pel, pembersih toilet, dll', '2020-04-24 16:37:35', '0000-00-00 00:00:00');
INSERT INTO `budget` VALUES (19, 2, 15, 'Pemeliharaan komputer dan printer', 50000, 9, 'Bulan', 0, '', '', '2020-04-24 22:11:29', '2020-04-24 17:11:29');
INSERT INTO `budget` VALUES (20, 3, 15, 'Listrik', 150000, 9, 'Bulan', 0, '', '', '2020-04-24 22:12:05', '2020-04-24 17:12:05');
INSERT INTO `budget` VALUES (21, 1, 42, 'Marbot', 1125000, 2, 'Orang', 9, 'Bulan', '', '2020-04-24 16:59:13', '0000-00-00 00:00:00');
INSERT INTO `budget` VALUES (22, 2, 42, 'Imam sholat rawatib', 500000, 3, 'Orang', 9, 'Bulan', '', '2020-04-24 17:00:12', '0000-00-00 00:00:00');
INSERT INTO `budget` VALUES (23, 1, 16, 'Pembagian undangan', 100000, 9, 'Bulan', 0, '', '', '2020-04-24 17:06:51', '0000-00-00 00:00:00');
INSERT INTO `budget` VALUES (24, 1, 17, 'Komputer', 5000000, 1, 'Paket', 0, '', '', '2020-04-24 17:07:38', '0000-00-00 00:00:00');
INSERT INTO `budget` VALUES (25, 2, 17, 'Printer', 3000000, 1, 'Paket', 0, '', '', '2020-04-24 17:08:15', '0000-00-00 00:00:00');
INSERT INTO `budget` VALUES (26, 1, 19, 'Sholat Jum\'at', 600000, 9, 'Bulan', 0, '', '', '2020-04-24 17:21:07', '0000-00-00 00:00:00');
INSERT INTO `budget` VALUES (27, 1, 24, 'Maulid Nabi Muhammad SAW', 10000000, 1, 'Paket', 0, '', '', '2020-04-24 17:21:53', '0000-00-00 00:00:00');
INSERT INTO `budget` VALUES (28, 2, 24, 'Isra Miraj Nabi Muhammad SAW', 0, 1, 'Paket', 0, '', '', '2020-04-24 17:22:47', '0000-00-00 00:00:00');
INSERT INTO `budget` VALUES (29, 1, 25, 'Dzikrul Ghofilin 40 Hari', 0, 1, 'Paket', 0, '', '', '2020-04-24 17:23:37', '0000-00-00 00:00:00');
INSERT INTO `budget` VALUES (30, 2, 25, 'Dzikrul Ghofilin malam jum\'at', 375000, 1, 'Bulan', 0, '', '', '2020-04-24 17:24:47', '0000-00-00 00:00:00');
INSERT INTO `budget` VALUES (31, 1, 26, 'Pengajian Rutin', 375000, 1, 'Periode', 0, '', '', '2020-04-24 17:26:10', '0000-00-00 00:00:00');
INSERT INTO `budget` VALUES (32, 1, 27, 'Nuzulul Qur\'an', 300000, 1, 'Periode', 0, '', '', '2020-04-24 17:26:37', '0000-00-00 00:00:00');
INSERT INTO `budget` VALUES (33, 1, 28, 'Haul Masjid', 300000, 1, 'Periode', 0, '', '', '2020-04-24 17:27:16', '0000-00-00 00:00:00');
INSERT INTO `budget` VALUES (34, 1, 29, 'Rebo Wekasan', 100000, 9, 'Bulan', 0, '', '', '2020-04-24 17:28:26', '0000-00-00 00:00:00');
INSERT INTO `budget` VALUES (35, 1, 30, 'Musyawarah Internal Pengurus DKM', 200000, 9, 'Bulan', 0, '', '', '2020-04-24 17:29:14', '0000-00-00 00:00:00');
INSERT INTO `budget` VALUES (36, 1, 31, 'Musyawarah DKM', 300000, 4, 'Bulan', 0, '', '', '2020-04-24 17:29:42', '0000-00-00 00:00:00');
INSERT INTO `budget` VALUES (37, 1, 32, 'Pembelian alat kebersihan masjid', 100000, 9, 'Bulan', 0, '', '', '2020-04-25 00:38:29', '0000-00-00 00:00:00');
INSERT INTO `budget` VALUES (38, 1, 33, 'Pemeliharaan lampu dan alat2 listrik', 200000, 9, 'Bulan', 0, '', '', '2020-04-25 00:39:15', '0000-00-00 00:00:00');
INSERT INTO `budget` VALUES (39, 1, 34, 'Pemeliharaan alat pengeras suara', 200000, 9, 'Bulan', 0, '', '', '2020-04-25 00:39:47', '0000-00-00 00:00:00');
INSERT INTO `budget` VALUES (40, 1, 35, 'Pemeliharaan pompa air, kran air, dll', 200000, 9, 'Bulan', 0, '', '', '2020-04-25 00:40:33', '0000-00-00 00:00:00');
INSERT INTO `budget` VALUES (41, 1, 36, 'Biaya tak terduga', 10000000, 1, 'Periode', 0, '', '', '2020-04-25 00:41:16', '0000-00-00 00:00:00');
INSERT INTO `budget` VALUES (42, 1, 43, 'Biaya perawatan komputer', 50000, 8, 'Bulan', 0, '', '', '2020-04-25 00:46:47', '0000-00-00 00:00:00');
INSERT INTO `budget` VALUES (43, 2, 43, 'Pengecatan Bedug', 5000000, 1, 'Periode', 0, '', '', '2020-04-25 00:47:36', '0000-00-00 00:00:00');
INSERT INTO `budget` VALUES (44, 1, 41, 'Perbaikan keramik dinding', 5000000, 1, 'Periode', 0, '', '', '2020-04-25 00:48:41', '0000-00-00 00:00:00');
INSERT INTO `budget` VALUES (45, 2, 41, 'Pengecatan pintu masjid', 5000000, 1, 'Periode', 0, '', 'Pintu bagian utara', '2020-04-25 00:49:57', '0000-00-00 00:00:00');
INSERT INTO `budget` VALUES (46, 1, 40, 'Penambahan tanaman dan dekorasi', 5000000, 1, 'Periode', 0, '', '', '2020-04-25 00:51:55', '0000-00-00 00:00:00');
INSERT INTO `budget` VALUES (47, 1, 44, 'Sisa Kas Tahun 2019', 20017500, 1, 'Periode', 0, '', '', '2020-05-08 18:55:49', '0000-00-00 00:00:00');

-- ----------------------------
-- Table structure for inventory
-- ----------------------------
DROP TABLE IF EXISTS `inventory`;
CREATE TABLE `inventory`  (
  `id` int(35) NOT NULL,
  `name` varchar(150) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `price` decimal(12, 2) NULL DEFAULT NULL,
  `date_buy` date NULL DEFAULT NULL,
  `qty` int(10) NULL DEFAULT NULL,
  `condition` varchar(2) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL COMMENT 'Kondisi (SB=Sangat Bagus, B=Bagus, R=Rusak',
  `description` text CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL,
  `created_at` timestamp(0) NULL DEFAULT NULL,
  `updated_at` timestamp(0) NULL DEFAULT NULL,
  `deleted_at` timestamp(0) NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB CHARACTER SET = utf8mb4 COLLATE = utf8mb4_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of inventory
-- ----------------------------

-- ----------------------------
-- Table structure for invited_guests
-- ----------------------------
DROP TABLE IF EXISTS `invited_guests`;
CREATE TABLE `invited_guests`  (
  `id` int(35) NOT NULL AUTO_INCREMENT,
  `name` varchar(150) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `address` varchar(150) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `created_at` timestamp(0) NULL DEFAULT NULL,
  `updated_at` timestamp(0) NULL DEFAULT NULL,
  `deleted_at` timestamp(0) NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 7 CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of invited_guests
-- ----------------------------
INSERT INTO `invited_guests` VALUES (1, 'Orang 1', 'Alamat 1', NULL, NULL, NULL);
INSERT INTO `invited_guests` VALUES (2, 'Orang 2 ', 'Alamat 2', NULL, NULL, NULL);
INSERT INTO `invited_guests` VALUES (3, 'Orang 3', 'Alamat 3', NULL, NULL, NULL);
INSERT INTO `invited_guests` VALUES (4, 'Orang 4', 'Alamat 4', NULL, NULL, NULL);
INSERT INTO `invited_guests` VALUES (5, 'Orang 5', 'Alamat 5', NULL, NULL, NULL);
INSERT INTO `invited_guests` VALUES (6, 'Alamul Huda', 'Cikalong Krajan 1', '2020-05-08 17:08:49', '2020-05-08 17:09:46', NULL);

-- ----------------------------
-- Table structure for kategori
-- ----------------------------
DROP TABLE IF EXISTS `kategori`;
CREATE TABLE `kategori`  (
  `id` int(35) NOT NULL AUTO_INCREMENT,
  `name` varchar(150) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `type` varchar(1) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL COMMENT 'P=Pendapatan, B=Belanja',
  `created_at` timestamp(0) NULL DEFAULT NULL,
  `updated_at` timestamp(0) NULL DEFAULT NULL,
  `deleted_at` timestamp(0) NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 14 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of kategori
-- ----------------------------
INSERT INTO `kategori` VALUES (1, 'Kas Awal', 'P', '0000-00-00 00:00:00', NULL, NULL);
INSERT INTO `kategori` VALUES (3, 'Insentif Pegawai', 'B', NULL, '2020-04-12 09:32:46', NULL);
INSERT INTO `kategori` VALUES (11, 'sd', 'B', '2020-04-12 17:45:30', NULL, NULL);
INSERT INTO `kategori` VALUES (12, 'sdds', 'B', '2020-04-12 17:46:17', NULL, NULL);
INSERT INTO `kategori` VALUES (13, 'sad', 'B', '2020-04-12 17:46:52', NULL, NULL);

-- ----------------------------
-- Table structure for m_jumat
-- ----------------------------
DROP TABLE IF EXISTS `m_jumat`;
CREATE TABLE `m_jumat`  (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `month` int(2) NOT NULL,
  `date_start` date NULL DEFAULT NULL,
  `date_end` date NULL DEFAULT NULL,
  `no` int(10) NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 23 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of m_jumat
-- ----------------------------
INSERT INTO `m_jumat` VALUES (1, 4, '2020-03-27', '2020-04-02', 1);
INSERT INTO `m_jumat` VALUES (2, 4, '2020-04-03', '2020-04-09', 2);
INSERT INTO `m_jumat` VALUES (3, 4, '2020-04-10', '2020-04-16', 3);
INSERT INTO `m_jumat` VALUES (4, 4, '2020-04-17', '2020-04-23', 4);
INSERT INTO `m_jumat` VALUES (5, 4, '2020-04-24', '2020-04-30', 5);
INSERT INTO `m_jumat` VALUES (6, 5, '2020-05-01', '2020-05-07', 1);
INSERT INTO `m_jumat` VALUES (7, 5, '2020-05-08', '2020-05-14', 2);
INSERT INTO `m_jumat` VALUES (8, 5, '2020-05-15', '2020-05-21', 3);
INSERT INTO `m_jumat` VALUES (9, 5, '2020-05-22', '2020-05-28', 4);
INSERT INTO `m_jumat` VALUES (10, 6, '2020-05-29', '2020-06-04', 1);
INSERT INTO `m_jumat` VALUES (11, 6, '2020-06-05', '2020-06-11', 2);
INSERT INTO `m_jumat` VALUES (12, 6, '2020-06-12', '2020-06-18', 3);
INSERT INTO `m_jumat` VALUES (13, 6, '2020-06-19', '2020-06-25', 4);
INSERT INTO `m_jumat` VALUES (14, 7, '2020-06-25', '2020-07-02', 1);
INSERT INTO `m_jumat` VALUES (15, 7, '2020-07-03', '2020-07-09', 2);
INSERT INTO `m_jumat` VALUES (16, 7, '2020-07-10', '2020-07-16', 3);
INSERT INTO `m_jumat` VALUES (17, 7, '2020-07-17', '2020-07-23', 4);
INSERT INTO `m_jumat` VALUES (18, 7, '2020-07-24', '2020-07-30', 5);
INSERT INTO `m_jumat` VALUES (19, 8, '2020-07-31', '2020-08-06', 1);
INSERT INTO `m_jumat` VALUES (20, 8, '2020-08-07', '2020-08-13', 2);
INSERT INTO `m_jumat` VALUES (21, 8, '2020-08-14', '2020-08-20', 3);
INSERT INTO `m_jumat` VALUES (22, 8, '2020-08-21', '2020-08-27', 4);

-- ----------------------------
-- Table structure for mail_content
-- ----------------------------
DROP TABLE IF EXISTS `mail_content`;
CREATE TABLE `mail_content`  (
  `id` int(23) NOT NULL AUTO_INCREMENT,
  `type` varchar(30) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL COMMENT 'header or footer',
  `content` text CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL,
  `created_at` timestamp(0) NOT NULL DEFAULT current_timestamp(0) ON UPDATE CURRENT_TIMESTAMP(0),
  `updated_at` timestamp(0) NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 1 CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of mail_content
-- ----------------------------

-- ----------------------------
-- Table structure for mail_in
-- ----------------------------
DROP TABLE IF EXISTS `mail_in`;
CREATE TABLE `mail_in`  (
  `id` int(23) NOT NULL AUTO_INCREMENT,
  `no_mail` varchar(100) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `date` date NULL DEFAULT NULL,
  `type` varchar(50) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `address` text CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL,
  `description` text CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL,
  `file` varchar(150) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `created_at` timestamp(0) NOT NULL DEFAULT current_timestamp(0) ON UPDATE CURRENT_TIMESTAMP(0),
  `updated_at` timestamp(0) NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 1 CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of mail_in
-- ----------------------------

-- ----------------------------
-- Table structure for mail_out
-- ----------------------------
DROP TABLE IF EXISTS `mail_out`;
CREATE TABLE `mail_out`  (
  `id` int(23) NOT NULL AUTO_INCREMENT,
  `no_mail` varchar(3) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `type` varchar(50) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `date` date NULL DEFAULT NULL,
  `day` text CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL,
  `location` text CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL,
  `time` time(0) NULL DEFAULT NULL,
  `time_desc` text CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL,
  `guest` varchar(50) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL COMMENT 'id in table invited_guests',
  `header1` text CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL,
  `header2` text CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL,
  `footer1` text CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL,
  `created_at` timestamp(0) NULL DEFAULT NULL,
  `updated_at` timestamp(0) NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 3 CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of mail_out
-- ----------------------------
INSERT INTO `mail_out` VALUES (1, '001', '02', '2020-04-21', 'Senin', 'Pengajian Hidayatul Mubtadiien', '18:30:00', 'ba\'da Sholat Magrib', '1,2,3,4,5', 'Teriring salam dan Do\'a semoga Allah SWT merahmati dan meridhoi Kita semua dan selalu sukses dalam melaksanakan aktifitas sehari-hari. Aamiin', 'Dengan kerendahan hati kami mengundang Bapak-bapak dan Saudara-saudara untuk dapat hadir nama acara, insyaAllah akan dilaksanakan pada :', 'Demikian undangan ini kami sampaikan, mengingat pentingnya acara ini dimohon hadir tepat pada waktunya.\r\nAtas perhatian dan kehadirannya Kami ucapkan terimakasih,', '2020-04-20 10:06:22', '2020-04-20 10:38:18');
INSERT INTO `mail_out` VALUES (2, '002', '02', '2020-04-23', 'Selasa', 'Masjid Jamie Nurul Hikmah', '10:30:00', '', '2, 3, 4', 'Teriring salam dan Do\'a semoga Allah SWT merahmati dan meridhoi Kita semua dan selalu sukses dalam melaksanakan aktifitas sehari-hari. Aamiin', 'Dengan kerendahan hati kami mengundang Bapak-bapak dan Saudara-saudara untuk dapat hadir nama acara, insyaAllah akan dilaksanakan pada :', 'Demikian undangan ini kami sampaikan, mengingat pentingnya acara ini dimohon hadir tepat pada waktunya.\r\nAtas perhatian dan kehadirannya Kami ucapkan terimakasih.', '2020-04-23 18:23:26', '2020-05-08 16:55:58');

-- ----------------------------
-- Table structure for mail_type
-- ----------------------------
DROP TABLE IF EXISTS `mail_type`;
CREATE TABLE `mail_type`  (
  `id` int(5) NOT NULL AUTO_INCREMENT,
  `no` varchar(2) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `name` varchar(100) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `header1` text CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL,
  `header2` text CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL,
  `footer1` text CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 31 CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of mail_type
-- ----------------------------
INSERT INTO `mail_type` VALUES (16, '01', 'Keputusan', NULL, NULL, NULL);
INSERT INTO `mail_type` VALUES (17, '02', 'Undangan', 'Teriring salam dan Do\'a semoga Allah SWT merahmati dan meridhoi Kita semua dan selalu sukses dalam melaksanakan aktifitas sehari-hari. Aamiin', 'Dengan kerendahan hati kami mengundang Bapak-bapak dan Saudara-saudara untuk dapat hadir nama acara, insyaAllah akan dilaksanakan pada :', 'Demikian undangan ini kami sampaikan, mengingat pentingnya acara ini dimohon hadir tepat pada waktunya.\r\nAtas perhatian dan kehadirannya Kami ucapkan terimakasih.');
INSERT INTO `mail_type` VALUES (18, '03', 'Permohonan', NULL, NULL, NULL);
INSERT INTO `mail_type` VALUES (19, '04', 'Pemberitahuan', NULL, NULL, NULL);
INSERT INTO `mail_type` VALUES (20, '05', 'Peminjaman', NULL, NULL, NULL);
INSERT INTO `mail_type` VALUES (21, '06', 'Pernyataan', NULL, NULL, NULL);
INSERT INTO `mail_type` VALUES (22, '07', 'Mandat', NULL, NULL, NULL);
INSERT INTO `mail_type` VALUES (23, '08', 'Tugas', NULL, NULL, NULL);
INSERT INTO `mail_type` VALUES (24, '09', 'Keterangan', NULL, NULL, NULL);
INSERT INTO `mail_type` VALUES (25, '10', 'Rekomendasi', NULL, NULL, NULL);
INSERT INTO `mail_type` VALUES (26, '11', 'Balasan', NULL, NULL, NULL);
INSERT INTO `mail_type` VALUES (27, '12', 'Perintah Perjalanan Dinas', NULL, NULL, NULL);
INSERT INTO `mail_type` VALUES (28, '13', 'Sertifikat', NULL, NULL, NULL);
INSERT INTO `mail_type` VALUES (29, '14', 'Perjanjian Kerja', NULL, NULL, NULL);
INSERT INTO `mail_type` VALUES (30, '15', 'Pengantar', NULL, NULL, NULL);

-- ----------------------------
-- Table structure for menu
-- ----------------------------
DROP TABLE IF EXISTS `menu`;
CREATE TABLE `menu`  (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `name` varchar(150) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `title` varchar(150) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `url` varchar(100) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT '#',
  `parent` int(10) NULL DEFAULT NULL,
  `sort_by` int(10) NULL DEFAULT NULL,
  `icon` varchar(100) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `is_active` float NULL DEFAULT 0 COMMENT '1=Active, 0=Non Active',
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 27 CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of menu
-- ----------------------------
INSERT INTO `menu` VALUES (1, 'dashboard', 'Dashboard', 'home', NULL, 1, 'icon-home', 1);
INSERT INTO `menu` VALUES (2, 'anggaran', 'Anggaran', 'anggaran', NULL, 2, 'icon-layers', 1);
INSERT INTO `menu` VALUES (3, 'transaksi', 'Transaksi', '#', NULL, 3, 'icon-dollar-sign', 1);
INSERT INTO `menu` VALUES (4, 'pendapatan', 'Pendapatan', 'keuangan/pendapatan', 3, 1, NULL, 1);
INSERT INTO `menu` VALUES (5, 'pengeluaran', 'Pengeluaran', 'keuangan/pengeluaran', 3, 2, NULL, 1);
INSERT INTO `menu` VALUES (6, 'inventaris', 'Inventaris', '#', NULL, 4, 'icon-server', 0);
INSERT INTO `menu` VALUES (7, 'laporan', 'Laporan', '#', NULL, 6, 'icon-book', 1);
INSERT INTO `menu` VALUES (8, 'buku_kas', 'Buku Kas', 'laporan/keuangan/buku_kas', 7, 1, NULL, 1);
INSERT INTO `menu` VALUES (9, 'pendapatan', 'Pendapatan', 'laporan/pendapatan', 7, 2, NULL, 0);
INSERT INTO `menu` VALUES (10, 'pengeluaran', 'Pengeluaran', 'laporan/pengeluaran', 7, 3, NULL, 0);
INSERT INTO `menu` VALUES (11, 'apbm', 'APBM', 'laporan/anggaran/apbm', 7, 4, NULL, 1);
INSERT INTO `menu` VALUES (12, 'struktur_organisasi', 'Struktur Organisasi', '#', NULL, 7, 'icon-users', 0);
INSERT INTO `menu` VALUES (13, 'master_data', 'Master Data', '#', NULL, 8, 'icon-grid', 1);
INSERT INTO `menu` VALUES (14, 'kategori', 'Kategori', 'master/kategori', 13, 1, NULL, 0);
INSERT INTO `menu` VALUES (15, 'rekening', 'Rekening', '#', 13, 2, NULL, 1);
INSERT INTO `menu` VALUES (16, 'rekening1', 'Rekening 1', 'master/rekening/rekening1', 15, 1, NULL, 1);
INSERT INTO `menu` VALUES (17, 'rekening2', 'Rekening 2', 'master/rekening/rekening2', 15, 2, NULL, 1);
INSERT INTO `menu` VALUES (18, 'rekening3', 'Rekening 3', 'master/rekening/rekening', 15, 3, NULL, 1);
INSERT INTO `menu` VALUES (19, 'disposisi', 'Disposisi', '#', NULL, 5, 'icon-mail', 1);
INSERT INTO `menu` VALUES (20, 'surat_masuk', 'Surat Masuk', 'disposisi/surat_masuk', 19, 1, NULL, 1);
INSERT INTO `menu` VALUES (21, 'surat_keluar', 'Surat Keluar', 'disposisi/surat_keluar', 19, 2, NULL, 1);
INSERT INTO `menu` VALUES (22, 'tamu_undangan', 'Tamu Undangan', 'disposisi/tamu_undangan', 13, 3, NULL, 1);
INSERT INTO `menu` VALUES (23, 'jumat', 'Jum\'at', 'laporan/keuangan/jumat', 7, 5, NULL, 1);
INSERT INTO `menu` VALUES (24, 'rekap_jumat', 'Rekap Jum\'at', 'laporan/keuangan/rekap_jumat', 7, 6, NULL, 1);
INSERT INTO `menu` VALUES (25, 'realisasi_anggaran', 'Realisasi Anggaran', 'coming_soon', 7, 7, NULL, 1);
INSERT INTO `menu` VALUES (26, 'integrasi', 'Integrasi APBM', 'keuangan/integrasi', 3, 3, NULL, 1);

-- ----------------------------
-- Table structure for mosque
-- ----------------------------
DROP TABLE IF EXISTS `mosque`;
CREATE TABLE `mosque`  (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `code` varchar(20) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL COMMENT 'untuk login',
  `ketua_dkm` varchar(150) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `sekertaris` varchar(150) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `bendahara` varchar(150) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `name` varchar(150) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `address` text CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL,
  `phone` varchar(15) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `fax` varchar(15) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `email` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `website` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `created_at` timestamp(0) NULL DEFAULT NULL,
  `updated_at` timestamp(0) NULL DEFAULT NULL,
  `deleted_at` timestamp(0) NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 7 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of mosque
-- ----------------------------
INSERT INTO `mosque` VALUES (4, 'mjnh', 'KH.Marullah Marhab', 'Alim Sujatmiko', 'Hari Nugraha', 'Jamie Nurul Hikmah', 'Jl.Syekh Quro No.185, Cikalong, Cilamaya Wetan, Kab.Karawang, Jawa Barat 40374', NULL, NULL, NULL, NULL, '2020-04-07 05:32:57', NULL, NULL);

-- ----------------------------
-- Table structure for rek1
-- ----------------------------
DROP TABLE IF EXISTS `rek1`;
CREATE TABLE `rek1`  (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `name` varchar(150) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `created_at` timestamp(0) NULL DEFAULT current_timestamp(0),
  `updated_at` timestamp(0) NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 3 CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of rek1
-- ----------------------------
INSERT INTO `rek1` VALUES (1, 'Pendapatan', NULL, NULL);
INSERT INTO `rek1` VALUES (2, 'Biaya', NULL, '2020-04-15 15:28:06');

-- ----------------------------
-- Table structure for rek2
-- ----------------------------
DROP TABLE IF EXISTS `rek2`;
CREATE TABLE `rek2`  (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `name` varchar(150) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `kd_rek1` int(10) NULL DEFAULT NULL,
  `kd_rek2` int(10) NULL DEFAULT NULL,
  `created_at` timestamp(0) NULL DEFAULT NULL,
  `updated_at` timestamp(0) NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 11 CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of rek2
-- ----------------------------
INSERT INTO `rek2` VALUES (1, 'Pendapatan Rutin', 1, 1, '2020-04-14 20:45:05', NULL);
INSERT INTO `rek2` VALUES (2, 'Insentif', 2, 1, '2020-04-14 20:45:40', NULL);
INSERT INTO `rek2` VALUES (3, 'Administrasi & Umum', 2, 2, '2020-04-15 15:25:33', NULL);
INSERT INTO `rek2` VALUES (4, 'Transport', 2, 3, '2020-04-15 15:25:52', NULL);
INSERT INTO `rek2` VALUES (5, 'Perlengkapan / Inventaris Masjid', 2, 4, '2020-04-15 15:26:21', NULL);
INSERT INTO `rek2` VALUES (6, 'Kegiatan Rutin DKM', 2, 5, '2020-04-15 15:27:04', NULL);
INSERT INTO `rek2` VALUES (7, 'Biaya Lain-lain', 2, 6, '2020-04-15 15:27:45', NULL);
INSERT INTO `rek2` VALUES (8, 'Rehabilitasi Bangunan Masjid', 2, 7, '2020-04-15 15:29:44', NULL);
INSERT INTO `rek2` VALUES (9, 'Pendapatan Lain-lain', 1, 2, '2020-04-24 15:20:49', NULL);
INSERT INTO `rek2` VALUES (10, 'Sisa Kas', 1, 3, '2020-05-08 18:52:30', '2020-05-08 18:59:14');

-- ----------------------------
-- Table structure for rekening
-- ----------------------------
DROP TABLE IF EXISTS `rekening`;
CREATE TABLE `rekening`  (
  `id` int(32) NOT NULL AUTO_INCREMENT,
  `kd_rek1` int(3) NULL DEFAULT NULL,
  `kd_rek2` int(3) NULL DEFAULT NULL,
  `kd_rek3` int(3) NULL DEFAULT NULL,
  `name` varchar(150) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `created_at` timestamp(0) NOT NULL DEFAULT current_timestamp(0) ON UPDATE CURRENT_TIMESTAMP(0),
  `updated_at` timestamp(0) NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 45 CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of rekening
-- ----------------------------
INSERT INTO `rekening` VALUES (8, 1, 1, 1, 'Tanah Wakaf', '2020-04-14 20:46:32', '0000-00-00 00:00:00');
INSERT INTO `rekening` VALUES (9, 1, 1, 2, 'Jariah Masjid', '2020-04-24 20:23:53', '2020-04-24 15:23:53');
INSERT INTO `rekening` VALUES (10, 2, 1, 1, 'Pengurus DKM', '2020-04-16 09:07:35', '0000-00-00 00:00:00');
INSERT INTO `rekening` VALUES (12, 2, 1, 3, 'Tunjangan Hari Raya', '2020-04-16 09:07:37', '0000-00-00 00:00:00');
INSERT INTO `rekening` VALUES (13, 2, 1, 4, 'Imam Tarawih', '2020-04-16 09:07:44', '0000-00-00 00:00:00');
INSERT INTO `rekening` VALUES (14, 2, 2, 1, 'Administrasi', '2020-04-24 20:51:16', '2020-04-24 15:51:16');
INSERT INTO `rekening` VALUES (15, 2, 2, 2, 'Umum', '2020-04-24 20:51:36', '2020-04-24 15:51:36');
INSERT INTO `rekening` VALUES (16, 2, 3, 1, 'Transport', '2020-04-24 21:03:19', '2020-04-24 16:03:19');
INSERT INTO `rekening` VALUES (17, 2, 4, 1, 'Perlengkapan', '2020-04-24 21:04:00', '2020-04-24 16:04:00');
INSERT INTO `rekening` VALUES (18, 2, 4, 2, 'Inventaris', '2020-04-24 21:04:12', '2020-04-24 16:04:12');
INSERT INTO `rekening` VALUES (19, 2, 5, 1, 'Sholat Jum\'at', '2020-04-24 21:04:28', '2020-04-24 16:04:28');
INSERT INTO `rekening` VALUES (24, 2, 5, 2, 'Peringatan Hari Besar Islam', '2020-04-24 21:05:01', '0000-00-00 00:00:00');
INSERT INTO `rekening` VALUES (25, 2, 5, 3, 'Dzikrul Ghofilin', '2020-04-24 21:05:04', '0000-00-00 00:00:00');
INSERT INTO `rekening` VALUES (26, 2, 5, 4, 'Pengajian Rutin', '2020-04-24 16:06:54', '0000-00-00 00:00:00');
INSERT INTO `rekening` VALUES (27, 2, 5, 5, 'Nuzulul Qur\'an', '2020-04-24 16:07:13', '0000-00-00 00:00:00');
INSERT INTO `rekening` VALUES (28, 2, 5, 6, 'Haul Masjid', '2020-04-24 16:07:27', '0000-00-00 00:00:00');
INSERT INTO `rekening` VALUES (29, 2, 5, 7, 'Rebo Wekasan', '2020-04-24 16:14:36', '0000-00-00 00:00:00');
INSERT INTO `rekening` VALUES (30, 2, 5, 8, 'Musyawarah Internal Pengurus DKM', '2020-04-24 16:15:22', '0000-00-00 00:00:00');
INSERT INTO `rekening` VALUES (31, 2, 5, 9, 'Musyawarah DKM', '2020-04-24 16:15:37', '0000-00-00 00:00:00');
INSERT INTO `rekening` VALUES (32, 2, 6, 1, 'Pembelian Alat Kebersihan Masjid', '2020-04-24 16:16:10', '0000-00-00 00:00:00');
INSERT INTO `rekening` VALUES (33, 2, 6, 2, 'Pemeliharaan lampu dan alat-alat listrik', '2020-04-24 16:16:38', '0000-00-00 00:00:00');
INSERT INTO `rekening` VALUES (34, 2, 6, 3, 'Pemeliharaan alat pengeras suara', '2020-04-24 16:17:01', '0000-00-00 00:00:00');
INSERT INTO `rekening` VALUES (35, 2, 6, 4, 'Pemeliharaan pompa air, kran air, dll', '2020-04-24 16:17:49', '0000-00-00 00:00:00');
INSERT INTO `rekening` VALUES (36, 2, 6, 5, 'Biaya tak terduga', '2020-04-24 16:18:03', '0000-00-00 00:00:00');
INSERT INTO `rekening` VALUES (37, 2, 6, 6, 'Kegiatan Lain-lain', '2020-04-24 16:18:36', '0000-00-00 00:00:00');
INSERT INTO `rekening` VALUES (38, 2, 6, 7, 'Kegiatan irema', '2020-04-24 16:18:47', '0000-00-00 00:00:00');
INSERT INTO `rekening` VALUES (39, 2, 6, 8, 'Kegiatan Bazis', '2020-04-24 16:19:02', '0000-00-00 00:00:00');
INSERT INTO `rekening` VALUES (40, 2, 7, 1, 'Taman Masjid', '2020-04-24 16:23:07', '0000-00-00 00:00:00');
INSERT INTO `rekening` VALUES (41, 2, 7, 2, 'Bangunan Masjid', '2020-04-24 16:23:40', '0000-00-00 00:00:00');
INSERT INTO `rekening` VALUES (42, 2, 1, 5, 'Pengurus Masjid', '2020-04-24 16:57:02', '0000-00-00 00:00:00');
INSERT INTO `rekening` VALUES (43, 2, 6, 9, 'Pemeliharaan inventaris masjid', '2020-04-25 00:45:36', '0000-00-00 00:00:00');
INSERT INTO `rekening` VALUES (44, 1, 3, 1, 'Sisa Kas Tahun Lalu', '2020-05-08 18:53:20', '0000-00-00 00:00:00');

-- ----------------------------
-- Table structure for transaction
-- ----------------------------
DROP TABLE IF EXISTS `transaction`;
CREATE TABLE `transaction`  (
  `id` int(25) NOT NULL AUTO_INCREMENT,
  `no_kas` char(5) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `id_budget` int(25) NULL DEFAULT NULL COMMENT 'id table budget',
  `date` date NULL DEFAULT NULL,
  `debet` decimal(12, 0) NULL,
  `kredit` decimal(12, 0) NULL,
  `description` text CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL,
  `user_id` int(25) NULL DEFAULT NULL,
  `created_at` timestamp(0) NULL DEFAULT NULL,
  `updated_at` timestamp(0) NULL DEFAULT NULL,
  `deleted_at` timestamp(0) NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 139 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of transaction
-- ----------------------------
INSERT INTO `transaction` VALUES (75, '00001', 47, '2020-04-01', 20017500, 0, 'Sisa Kas Tahun Lalu', 4, NULL, '2020-05-08 18:57:11', NULL);
INSERT INTO `transaction` VALUES (76, '00002', NULL, '2020-04-01', 0, 150000, 'Biaya musyawarah DKM', NULL, NULL, NULL, NULL);
INSERT INTO `transaction` VALUES (77, '00003', NULL, '2020-04-02', 0, 50000, 'ATK Pengurus DKM', NULL, NULL, NULL, NULL);
INSERT INTO `transaction` VALUES (78, '00004', NULL, '2020-04-02', 0, 30000, 'Imam Dzikrul Ghofilin', NULL, NULL, NULL, NULL);
INSERT INTO `transaction` VALUES (79, '00005', NULL, '2020-04-03', 0, 125000, 'Petugas Jumat', NULL, NULL, NULL, NULL);
INSERT INTO `transaction` VALUES (80, '00006', NULL, '2020-04-03', 1519000, 0, 'Jariah Jumat Ke-1', NULL, NULL, NULL, NULL);
INSERT INTO `transaction` VALUES (81, '00007', NULL, '2020-04-03', 0, 89000, 'Pengharum dan pembersih ruangan masjid', NULL, NULL, NULL, NULL);
INSERT INTO `transaction` VALUES (82, '00008', NULL, '2020-04-07', 0, 2250000, 'Insentif marebot bulan April 2020', NULL, NULL, NULL, NULL);
INSERT INTO `transaction` VALUES (83, '00009', NULL, '2020-04-08', 0, 70500, 'Transport survey konveksi', NULL, NULL, NULL, NULL);
INSERT INTO `transaction` VALUES (84, '00010', NULL, '2020-04-09', 0, 100000, 'Musyawarah IREMA', NULL, NULL, NULL, NULL);
INSERT INTO `transaction` VALUES (85, '00011', NULL, '2020-04-09', 0, 30000, 'Imam Dzikrul Ghofilin', NULL, NULL, NULL, NULL);
INSERT INTO `transaction` VALUES (86, '00012', NULL, '2020-04-10', 0, 125000, 'Petugas Jumat', NULL, NULL, NULL, NULL);
INSERT INTO `transaction` VALUES (87, '00013', NULL, '2020-04-10', 1230000, 0, 'Jariah Jumat Ke-2', NULL, NULL, NULL, NULL);
INSERT INTO `transaction` VALUES (88, '00014', NULL, '2020-04-10', 0, 48000, 'Pengharum dan pembersih ruangan masjid', NULL, NULL, NULL, NULL);
INSERT INTO `transaction` VALUES (89, '00015', NULL, '2020-04-10', 0, 51000, 'Pembelian ATK Irema', NULL, NULL, NULL, NULL);
INSERT INTO `transaction` VALUES (90, '00016', NULL, '2020-04-10', 0, 250000, 'Loundry karpet, mukena dan sajadah masjid', NULL, NULL, NULL, NULL);
INSERT INTO `transaction` VALUES (91, '00017', NULL, '2020-04-10', 0, 70000, 'Konsumsi Kegiatan', NULL, NULL, NULL, NULL);
INSERT INTO `transaction` VALUES (92, '00018', NULL, '2020-04-10', 0, 200000, 'Musyawarah pembahasan RAPB', NULL, NULL, NULL, NULL);
INSERT INTO `transaction` VALUES (93, '00019', NULL, '2020-04-12', 0, 940000, 'Pengecatan Bedug', NULL, NULL, NULL, NULL);
INSERT INTO `transaction` VALUES (94, '00020', NULL, '2020-04-12', 0, 468000, 'Perbaikan Kran', NULL, NULL, NULL, NULL);
INSERT INTO `transaction` VALUES (95, '00021', NULL, '2020-04-12', 0, 100000, 'Konsumsi Kegiatan', NULL, NULL, NULL, NULL);
INSERT INTO `transaction` VALUES (96, '00022', NULL, '2020-04-12', 0, 4500000, 'DP Konveksi', NULL, NULL, NULL, NULL);
INSERT INTO `transaction` VALUES (97, '00023', NULL, '2020-04-12', 0, 60000, 'Transport', NULL, NULL, NULL, NULL);
INSERT INTO `transaction` VALUES (98, '00024', NULL, '2020-04-12', 0, 960000, 'Pembelian bunga', NULL, NULL, NULL, NULL);
INSERT INTO `transaction` VALUES (99, '00025', NULL, '2020-04-13', 0, 100000, 'Transport', NULL, NULL, NULL, NULL);
INSERT INTO `transaction` VALUES (100, '00026', NULL, '2020-04-13', 0, 160000, 'Konsumsi Kegiatan', NULL, NULL, NULL, NULL);
INSERT INTO `transaction` VALUES (101, '00027', NULL, '2020-04-13', 0, 25000, 'srabut baja', NULL, NULL, NULL, NULL);
INSERT INTO `transaction` VALUES (102, '00028', NULL, '2020-04-13', 0, 100000, 'BON Amil Yuti', NULL, NULL, NULL, NULL);
INSERT INTO `transaction` VALUES (103, '00029', NULL, '2020-04-14', 0, 235000, 'Pasir 1 becak dan semen 1 zak', NULL, NULL, NULL, NULL);
INSERT INTO `transaction` VALUES (104, '00030', NULL, '2020-04-14', 0, 300000, 'Ongkos Tukang 2 org', NULL, NULL, NULL, NULL);
INSERT INTO `transaction` VALUES (105, '00031', NULL, '2020-04-15', 0, 55000, 'Semen 1 zak', NULL, NULL, NULL, NULL);
INSERT INTO `transaction` VALUES (106, '00032', NULL, '2020-04-15', 0, 155000, 'Ongkos becak + bata 200 pcs', NULL, NULL, NULL, NULL);
INSERT INTO `transaction` VALUES (107, '00033', NULL, '2020-04-15', 0, 90000, 'Sarapan dan makan siang kegiatan', NULL, NULL, NULL, NULL);
INSERT INTO `transaction` VALUES (108, '00034', NULL, '2020-04-15', 0, 110000, 'Ongkos kenek pembantu', NULL, NULL, NULL, NULL);
INSERT INTO `transaction` VALUES (109, '00035', NULL, '2020-04-15', 0, 49000, 'Gembok dan cat pilok', NULL, NULL, NULL, NULL);
INSERT INTO `transaction` VALUES (110, '00036', NULL, '2020-04-16', 0, 1108000, 'Pembelian peralatan listrik dan lampu I', NULL, NULL, NULL, NULL);
INSERT INTO `transaction` VALUES (111, '00037', NULL, '2020-04-16', 0, 187000, 'Cat dekor dan paku', NULL, NULL, NULL, NULL);
INSERT INTO `transaction` VALUES (112, '00038', NULL, '2020-04-16', 0, 110000, 'Konsumsi Kegiatan', NULL, NULL, NULL, NULL);
INSERT INTO `transaction` VALUES (113, '00039', NULL, '2020-04-16', 0, 30000, 'Imam Dzikrul Ghofilin', NULL, NULL, NULL, NULL);
INSERT INTO `transaction` VALUES (114, '00040', NULL, '2020-04-17', 0, 125000, 'Petugas Jumat', NULL, NULL, NULL, NULL);
INSERT INTO `transaction` VALUES (115, '00041', NULL, '2020-04-17', 1245000, 0, 'Jariah jumat ke-3', NULL, NULL, NULL, NULL);
INSERT INTO `transaction` VALUES (116, '00042', NULL, '2020-04-17', 0, 222500, 'Konsumsi Kegiatan', NULL, NULL, NULL, NULL);
INSERT INTO `transaction` VALUES (117, '00043', NULL, '2020-04-17', 0, 1200000, 'Imam Rawatib Maret-April 2020', NULL, NULL, NULL, NULL);
INSERT INTO `transaction` VALUES (118, '00044', NULL, '2020-04-17', 0, 200000, 'Insentif DKM Maret-April 2020', NULL, NULL, NULL, NULL);
INSERT INTO `transaction` VALUES (119, '00045', NULL, '2020-04-17', 0, 1000000, 'Biaya tukang listrik', NULL, NULL, NULL, NULL);
INSERT INTO `transaction` VALUES (120, '00046', NULL, '2020-04-17', 0, 1000000, 'BON Amil Yuti', NULL, NULL, NULL, NULL);
INSERT INTO `transaction` VALUES (121, '00047', NULL, '2020-04-17', 700000, 0, 'Dana tanah wakaf dari BpkSubandi', NULL, NULL, NULL, NULL);
INSERT INTO `transaction` VALUES (122, '00048', NULL, '2020-04-18', 0, 664000, 'Pembelian peralatan listrik dan lampu II', NULL, NULL, NULL, NULL);
INSERT INTO `transaction` VALUES (123, '00049', NULL, '2020-04-19', 0, 117000, 'Konsumsi Kegiatan', NULL, NULL, NULL, NULL);
INSERT INTO `transaction` VALUES (124, '00050', NULL, '2020-04-20', 0, 30000, 'Trasnport ke konveksi anggota IREMA', NULL, NULL, NULL, NULL);
INSERT INTO `transaction` VALUES (125, '00051', NULL, '2020-04-21', 0, 50000, 'Konsumsi Kegiatan', NULL, NULL, NULL, NULL);
INSERT INTO `transaction` VALUES (126, '00052', NULL, '2020-04-21', 0, 92000, 'Pembelian keramik', NULL, NULL, NULL, NULL);
INSERT INTO `transaction` VALUES (127, '00053', NULL, '2020-04-22', 0, 600000, 'Pembuatan banner Ramadhan dan Hari raya', NULL, NULL, NULL, NULL);
INSERT INTO `transaction` VALUES (128, '00054', NULL, '2020-04-22', 0, 20000, 'Transport', NULL, NULL, NULL, NULL);
INSERT INTO `transaction` VALUES (129, '00055', NULL, '2020-04-22', 0, 400000, 'Pembelian bahan material pasir dan semen', NULL, NULL, NULL, NULL);
INSERT INTO `transaction` VALUES (130, '00056', NULL, '2020-04-22', 0, 1000000, 'Biaya tukang dekor', NULL, NULL, NULL, NULL);
INSERT INTO `transaction` VALUES (131, '00057', NULL, '2020-04-22', 0, 100000, 'Musyawarah sambut ramadhan', NULL, NULL, NULL, NULL);
INSERT INTO `transaction` VALUES (132, '00058', NULL, '2020-04-23', 0, 200000, 'Pembelian perlengkapan sholat tarawih', NULL, NULL, NULL, NULL);
INSERT INTO `transaction` VALUES (133, '00059', NULL, '2020-04-24', 0, 125000, 'Petugas Jumat', NULL, NULL, NULL, NULL);
INSERT INTO `transaction` VALUES (134, '00060', NULL, '2020-04-24', 1502000, 0, 'Jariah Jumat ke-4', NULL, NULL, NULL, NULL);
INSERT INTO `transaction` VALUES (135, '00061', NULL, '2020-04-24', 0, 28000, 'Bon Warung', NULL, NULL, NULL, NULL);
INSERT INTO `transaction` VALUES (136, '00062', NULL, '2020-04-29', 0, 199000, 'Biaya Listrik', NULL, NULL, NULL, NULL);
INSERT INTO `transaction` VALUES (137, '00063', 41, '2020-04-30', 0, 200000, 'Pembuatan Kotak Amal (4 buah)', 4, NULL, '2020-05-06 19:29:56', NULL);
INSERT INTO `transaction` VALUES (138, '00064', NULL, '2020-04-30', 0, 66000, 'Biaya Haul Masjid', NULL, NULL, NULL, NULL);

-- ----------------------------
-- Table structure for unit
-- ----------------------------
DROP TABLE IF EXISTS `unit`;
CREATE TABLE `unit`  (
  `id` int(32) NOT NULL AUTO_INCREMENT,
  `name` varchar(100) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `created_at` timestamp(0) NOT NULL DEFAULT current_timestamp(0) ON UPDATE CURRENT_TIMESTAMP(0),
  `updated_at` timestamp(0) NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 13 CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of unit
-- ----------------------------
INSERT INTO `unit` VALUES (1, 'Orang', '2020-04-16 09:36:36', '0000-00-00 00:00:00');
INSERT INTO `unit` VALUES (2, 'Bulan', '2020-04-16 09:36:39', '0000-00-00 00:00:00');
INSERT INTO `unit` VALUES (3, 'Pack', '2020-04-16 09:36:42', '0000-00-00 00:00:00');
INSERT INTO `unit` VALUES (4, 'Set', '2020-04-16 09:36:51', '0000-00-00 00:00:00');
INSERT INTO `unit` VALUES (5, 'Rim', '2020-04-16 09:37:05', '0000-00-00 00:00:00');
INSERT INTO `unit` VALUES (6, 'Buah', '2020-04-16 09:37:13', '0000-00-00 00:00:00');
INSERT INTO `unit` VALUES (7, 'Kg', '2020-04-16 09:37:21', '0000-00-00 00:00:00');
INSERT INTO `unit` VALUES (8, 'Paket', '2020-04-16 22:39:33', '0000-00-00 00:00:00');
INSERT INTO `unit` VALUES (9, 'Kali', '2020-04-16 22:39:39', '0000-00-00 00:00:00');
INSERT INTO `unit` VALUES (10, 'Bahu', '2020-04-17 22:00:34', '0000-00-00 00:00:00');
INSERT INTO `unit` VALUES (11, 'Musim', '2020-04-17 22:01:26', '0000-00-00 00:00:00');
INSERT INTO `unit` VALUES (12, 'Periode', '2020-04-24 22:25:24', '0000-00-00 00:00:00');

-- ----------------------------
-- Table structure for user
-- ----------------------------
DROP TABLE IF EXISTS `user`;
CREATE TABLE `user`  (
  `id` int(25) NOT NULL AUTO_INCREMENT,
  `mosque_id` int(25) NULL DEFAULT NULL,
  `group_id` int(25) NULL DEFAULT NULL,
  `username` varchar(150) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `password` varchar(150) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `email` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `name` varchar(150) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `image` varchar(120) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `status` varchar(10) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `last_login` timestamp(0) NULL DEFAULT NULL,
  `created_at` timestamp(0) NULL DEFAULT NULL,
  `updated_at` timestamp(0) NULL DEFAULT NULL,
  `deleted_at` timestamp(0) NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 7 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of user
-- ----------------------------
INSERT INTO `user` VALUES (4, 4, 1, 'alam', '$P$B3fyQDUQLGDYAumaE9XDlUzMTXJFnR.', 'alam_endraw@yahoo.com', 'Alamul Huda', 'https://res.cloudinary.com/dwohvljcs/image/upload/v1588778909/mjnh/26720aef6b7701407122ea6ef8eeb0fb.png.png', NULL, '2020-05-08 19:01:58', '2020-04-07 05:32:57', '2020-05-08 19:01:58', NULL);
INSERT INTO `user` VALUES (5, 4, 2, 'hari', '$P$BkIC9JXGpyxoOLMPrpGJP2RHvFQnEE1', NULL, 'Hari Nugraha', '', NULL, '2020-05-07 16:56:48', '2020-05-04 18:19:17', '2020-05-07 16:56:49', NULL);
INSERT INTO `user` VALUES (6, 4, 3, 'sekertaris', '$P$BRDE8s/JfFB6jhne92VHzyaO6rc5Et.', NULL, 'Alim Sujatmiko', NULL, NULL, '2020-05-07 04:00:10', '2020-05-07 03:56:15', '2020-05-07 04:00:10', NULL);

-- ----------------------------
-- Table structure for user_group
-- ----------------------------
DROP TABLE IF EXISTS `user_group`;
CREATE TABLE `user_group`  (
  `id` int(25) NOT NULL AUTO_INCREMENT,
  `mosque_id` int(25) NULL DEFAULT NULL,
  `name` varchar(150) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `title` varchar(150) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `privileges` text CHARACTER SET utf8mb4 COLLATE utf8mb4_bin NULL COMMENT 'menampung data menu dalam bentuk json  {\"menu\":[\"1\",\"2\"]}',
  `created_at` timestamp(0) NULL DEFAULT NULL,
  `update_at` timestamp(0) NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 4 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of user_group
-- ----------------------------
INSERT INTO `user_group` VALUES (1, 4, 'admin', 'Admin', '1,2,3,4,5,6,7,8,9,10,11,12,13,14,15,16,17,18,19,20,21,22,23,24,25,26', NULL, NULL);
INSERT INTO `user_group` VALUES (2, 4, 'bendahara', 'Bendahara', '1,3,4,5,7,8,9,10,23,24', NULL, NULL);
INSERT INTO `user_group` VALUES (3, 4, 'sekertaris', 'Sekertaris', '1,3,4,5,7,8,9,10,11,23,24,26', NULL, NULL);

-- ----------------------------
-- Procedure structure for buku_kas
-- ----------------------------
DROP PROCEDURE IF EXISTS `buku_kas`;
delimiter ;;
CREATE PROCEDURE `buku_kas`(`v_bln` INT)
BEGIN
	SELECT ''AS no_kas,''AS DATE,'Sisa Kas' AS DESCRIPTION,IF(cost>0,cost,0)AS debet,IF(cost<0,cost,0)AS kredit FROM(
		SELECT (SUM(debet)-SUM(kredit))cost FROM TRANSACTION WHERE MONTH(DATE)<v_bln
	)zz
	UNION
	SELECT no_kas,DATE,DESCRIPTION,debet,kredit FROM TRANSACTION WHERE MONTH(DATE)=v_bln;
	END
;;
delimiter ;

-- ----------------------------
-- Procedure structure for dashboard
-- ----------------------------
DROP PROCEDURE IF EXISTS `dashboard`;
delimiter ;;
CREATE PROCEDURE `dashboard`()
BEGIN
		SELECT sum(debet)as debet,sum(kredit)as kredit,sum(all_debet)as all_debet,sum(debet_lalu)as debet_lalu,sum(kredit_lalu)as kredit_lalu,sum(all_kredit)as all_kredit
	from(
		SELECT sum(debet)as debet, sum(kredit)as kredit, 0 as all_debet, 0 as debet_lalu, 0 as kredit_lalu, 0 as all_kredit
		from transaction where month(date) = MONTH(now())
		union
		SELECT 0, 0, 0, sum(debet), sum(kredit), 0
		from transaction where month(date) = MONTH(now())-1
		union
		SELECT 0, 0, sum(debet), 0, 0, sum(kredit)
		from transaction
	)zx;
END
;;
delimiter ;

-- ----------------------------
-- Procedure structure for rekap_jumat
-- ----------------------------
DROP PROCEDURE IF EXISTS `rekap_jumat`;
delimiter ;;
CREATE PROCEDURE `rekap_jumat`(mnth int)
BEGIN
	SELECT id,
	concat("JUM'AT KE ", t.no) as name,
	(SELECT sum(debet) from transaction where date BETWEEN t.date_start and t.date_end)as debet,
	(SELECT sum(kredit) from transaction where date BETWEEN t.date_start and t.date_end)as kredit
	from m_jumat t where month=mnth;
END
;;
delimiter ;

-- ----------------------------
-- Procedure structure for rep_budget
-- ----------------------------
DROP PROCEDURE IF EXISTS `rep_budget`;
delimiter ;;
CREATE PROCEDURE `rep_budget`()
BEGIN
	SELECT * FROM(
		SELECT 'T'AS sts,ri.id AS kd_rek,ri.name,0 AS cost,''AS unit,SUM(cost*qty1*(IF(qty2>0, qty2, 1))) AS total,''AS description 
		FROM budget b LEFT JOIN rekening r ON b.kd_rek=r.id 
		LEFT JOIN rek1 ri ON r.kd_rek1=ri.id  
		GROUP BY r.kd_rek1
		UNION		
		SELECT 'T'AS sts,CONCAT(r.kd_rek1,'.',r.kd_rek2)AS kd_rek,ri.name,0 AS cost,''AS unit,SUM(cost*qty1*(IF(qty2>0, qty2, 1))) AS total,''AS DESCRIPTION 
		FROM budget b LEFT JOIN rekening r ON b.kd_rek=r.id 
		LEFT JOIN rek2 ri ON r.kd_rek1=ri.kd_rek1 AND r.kd_rek2=ri.kd_rek2
		GROUP BY r.kd_rek1,r.kd_rek2
		UNION
		SELECT 'T'AS sts,CONCAT(kd_rek1,'.',kd_rek2,'.',kd_rek3)AS kd_rek,r.NAME,0 AS cost,''AS unit,SUM(cost*qty1*(IF(qty2>0, qty2, 1))) AS total,''AS DESCRIPTION 
		FROM budget b LEFT JOIN rekening r ON b.kd_rek=r.id GROUP BY r.kd_rek1,r.kd_rek2,r.kd_rek3
		UNION
		SELECT 'T'AS sts,CONCAT(r.kd_rek1,'.',r.kd_rek2,'.',r.kd_rek3,'.',sort_by)AS kd_rek,b.name,cost,
		CONCAT(qty1,' ',unit1, CASE WHEN qty2=0 THEN '' ELSE CONCAT(' / ',qty2,' ',unit2) END)AS unit,(cost*qty1*(IF(qty2>0, qty2, 1)))AS total,DESCRIPTION 
		FROM budget b LEFT JOIN rekening r ON b.kd_rek=r.id
		UNION
		SELECT 'H1'AS sts,CONCAT(r.kd_rek1,'.999')AS kd_rek,CONCAT('Total ',ri.name)AS NAME,0 AS cost,''AS unit,SUM(cost*qty1*(IF(qty2>0, qty2, 1))) AS total,''AS DESCRIPTION 
		FROM budget b LEFT JOIN rekening r ON b.kd_rek=r.id 
		LEFT JOIN rek1 ri ON r.kd_rek1=ri.id  
		GROUP BY r.kd_rek1
		UNION
		SELECT 'H'AS sts,CONCAT(r.kd_rek1,'.9999')AS kd_rek,'&nbsp;'AS NAME,0 AS cost,0 AS unit,0 AS total,''AS DESCRIPTION 
		FROM budget b LEFT JOIN rekening r ON b.kd_rek=r.id GROUP BY r.kd_rek1
		union
		SELECT sts,kd_rek,NAME,cost,unit,(SUM(debet)-SUM(kredit))AS total,DESCRIPTION FROM(
			SELECT 'H1'AS sts,'8.999' AS kd_rek,'Surplus / (Defisit)'AS NAME,0 AS cost,''AS unit,
			IF(ri.id=1,SUM(cost*qty1*(IF(qty2>0, qty2, 1))),0)AS debet,
			IF(ri.id=2,SUM(cost*qty1*(IF(qty2>0, qty2, 1))),0)AS kredit,
			''AS DESCRIPTION 
			FROM budget b LEFT JOIN rekening r ON b.kd_rek=r.id 
			LEFT JOIN rek1 ri ON r.kd_rek1=ri.id
			GROUP BY r.kd_rek1
		)zx
	)zx ORDER BY kd_rek;
END
;;
delimiter ;

-- ----------------------------
-- Procedure structure for rep_jumat
-- ----------------------------
DROP PROCEDURE IF EXISTS `rep_jumat`;
delimiter ;;
CREATE PROCEDURE `rep_jumat`(d_start date,d_end date,d_start_be date,d_end_be date)
BEGIN
		SELECT date,description,debet,kredit from transaction where date between d_start and d_end
		union
		SELECT '','Total Transaksi Jumat Ini',sum(debet)as debet,sum(kredit)as kredit from transaction where date between d_start and d_end
		union
		SELECT '','Total Transaksi Jumat Lalu',sum(debet)as debet,sum(kredit)as kredit from transaction where date between d_start_be and d_end_be
		union
		SELECT '','Total Transaksi s/d Jumat Ini',sum(debet)as debet,sum(kredit)as kredit from transaction where date <=d_end;
END
;;
delimiter ;

SET FOREIGN_KEY_CHECKS = 1;
