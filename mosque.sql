/*
SQLyog Ultimate v10.41 
MySQL - 5.5.5-10.4.11-MariaDB : Database - huda
*********************************************************************
*/

/*!40101 SET NAMES utf8 */;

/*!40101 SET SQL_MODE=''*/;

/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;
CREATE DATABASE /*!32312 IF NOT EXISTS*/`huda` /*!40100 DEFAULT CHARACTER SET utf8mb4 */;

USE `huda`;

/*Table structure for table `budget` */

DROP TABLE IF EXISTS `budget`;

CREATE TABLE `budget` (
  `id` int(35) NOT NULL AUTO_INCREMENT,
  `sort_by` int(20) DEFAULT NULL,
  `kd_rek` int(5) DEFAULT NULL COMMENT '= id table rekening',
  `name` varchar(150) DEFAULT NULL,
  `cost` decimal(12,0) NOT NULL,
  `qty1` int(23) DEFAULT NULL,
  `unit1` varchar(150) DEFAULT NULL,
  `qty2` int(23) DEFAULT NULL,
  `unit2` varchar(150) DEFAULT NULL,
  `description` text DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`) USING BTREE
) ENGINE=InnoDB AUTO_INCREMENT=48 DEFAULT CHARSET=latin1;

/*Data for the table `budget` */

insert  into `budget`(`id`,`sort_by`,`kd_rek`,`name`,`cost`,`qty1`,`unit1`,`qty2`,`unit2`,`description`,`created_at`,`updated_at`) values (1,1,10,'Ketua',150000,1,'Orang',9,'Bulan','Keterangan','2020-04-16 21:22:38','2020-04-16 16:11:10'),(2,2,10,'Wakil Ketua',100000,1,'Orang',9,'Bulan','Keterangan','2020-04-16 21:22:40','0000-00-00 00:00:00'),(3,3,10,'Bendahara',100000,2,'Orang',9,'Bulan','','2020-04-16 16:44:28','0000-00-00 00:00:00'),(4,4,10,'Sekertaris',100000,2,'Orang',9,'Bulan','','2020-04-16 16:46:51','0000-00-00 00:00:00'),(7,1,12,'Tunjangan Hari Raya',17000000,1,'Kali',0,'','','2020-04-16 17:42:15','0000-00-00 00:00:00'),(8,1,13,'Imam Sholat',900000,1,'Kali',0,'','','2020-04-16 17:42:56','0000-00-00 00:00:00'),(9,1,8,'Sewa Tanah Wakaf',16000000,5,'Bahu',1,'Musim','','2020-04-17 17:02:31','0000-00-00 00:00:00'),(10,1,9,'Kotak Amal Masjid',6000000,9,'Bulan',0,'','','2020-04-24 15:26:10','0000-00-00 00:00:00'),(12,1,14,'Bindex kwitansi',80000,1,'Pack',0,'','','2020-04-24 16:31:50','0000-00-00 00:00:00'),(13,2,14,'Bindex File',80000,1,'Pack',0,'','','2020-04-24 16:32:21','0000-00-00 00:00:00'),(14,3,14,'Buku kas',25000,1,'Pack',0,'','','2020-04-24 16:33:04','0000-00-00 00:00:00'),(15,4,14,'Buku folio',25000,1,'Pack',0,'','','2020-04-24 16:33:47','0000-00-00 00:00:00'),(16,5,14,'Kertas A4',90000,1,'Rim',0,'','','2020-04-24 16:34:18','0000-00-00 00:00:00'),(17,6,14,'Fotocopy',100000,9,'Bulan',0,'','','2020-04-24 22:10:52','2020-04-24 17:10:52'),(18,1,15,'Biaya rumah tangga masjid',500000,4,'Bulan',0,'','Galon air mineral, gula, kopi, sabun cuci, sabun pel, pembersih toilet, dll','2020-04-24 16:37:35','0000-00-00 00:00:00'),(19,2,15,'Pemeliharaan komputer dan printer',50000,9,'Bulan',0,'','','2020-04-24 22:11:29','2020-04-24 17:11:29'),(20,3,15,'Listrik',150000,9,'Bulan',0,'','','2020-04-24 22:12:05','2020-04-24 17:12:05'),(21,1,42,'Marbot',1125000,2,'Orang',9,'Bulan','','2020-04-24 16:59:13','0000-00-00 00:00:00'),(22,2,42,'Imam sholat rawatib',500000,3,'Orang',9,'Bulan','','2020-04-24 17:00:12','0000-00-00 00:00:00'),(23,1,16,'Pembagian undangan',100000,9,'Bulan',0,'','','2020-04-24 17:06:51','0000-00-00 00:00:00'),(24,1,17,'Komputer',5000000,1,'Paket',0,'','','2020-04-24 17:07:38','0000-00-00 00:00:00'),(25,2,17,'Printer',3000000,1,'Paket',0,'','','2020-04-24 17:08:15','0000-00-00 00:00:00'),(26,1,19,'Sholat Jum\'at',600000,9,'Bulan',0,'','','2020-04-24 17:21:07','0000-00-00 00:00:00'),(27,1,24,'Maulid Nabi Muhammad SAW',10000000,1,'Paket',0,'','','2020-04-24 17:21:53','0000-00-00 00:00:00'),(28,2,24,'Isra Miraj Nabi Muhammad SAW',0,1,'Paket',0,'','','2020-04-24 17:22:47','0000-00-00 00:00:00'),(29,1,25,'Dzikrul Ghofilin 40 Hari',0,1,'Paket',0,'','','2020-04-24 17:23:37','0000-00-00 00:00:00'),(30,2,25,'Dzikrul Ghofilin malam jum\'at',375000,1,'Bulan',0,'','','2020-04-24 17:24:47','0000-00-00 00:00:00'),(31,1,26,'Pengajian Rutin',375000,1,'Periode',0,'','','2020-04-24 17:26:10','0000-00-00 00:00:00'),(32,1,27,'Nuzulul Qur\'an',300000,1,'Periode',0,'','','2020-04-24 17:26:37','0000-00-00 00:00:00'),(33,1,28,'Haul Masjid',300000,1,'Periode',0,'','','2020-04-24 17:27:16','0000-00-00 00:00:00'),(34,1,29,'Rebo Wekasan',100000,9,'Bulan',0,'','','2020-04-24 17:28:26','0000-00-00 00:00:00'),(35,1,30,'Musyawarah Internal Pengurus DKM',200000,9,'Bulan',0,'','','2020-04-24 17:29:14','0000-00-00 00:00:00'),(36,1,31,'Musyawarah DKM',300000,4,'Bulan',0,'','','2020-04-24 17:29:42','0000-00-00 00:00:00'),(37,1,32,'Pembelian alat kebersihan masjid',100000,9,'Bulan',0,'','','2020-04-25 00:38:29','0000-00-00 00:00:00'),(38,1,33,'Pemeliharaan lampu dan alat2 listrik',200000,9,'Bulan',0,'','','2020-04-25 00:39:15','0000-00-00 00:00:00'),(39,1,34,'Pemeliharaan alat pengeras suara',200000,9,'Bulan',0,'','','2020-04-25 00:39:47','0000-00-00 00:00:00'),(40,1,35,'Pemeliharaan pompa air, kran air, dll',200000,9,'Bulan',0,'','','2020-04-25 00:40:33','0000-00-00 00:00:00'),(41,1,36,'Biaya tak terduga',10000000,1,'Periode',0,'','','2020-04-25 00:41:16','0000-00-00 00:00:00'),(42,1,43,'Biaya perawatan komputer',50000,8,'Bulan',0,'','','2020-04-25 00:46:47','0000-00-00 00:00:00'),(43,2,43,'Pengecatan Bedug',5000000,1,'Periode',0,'','','2020-04-25 00:47:36','0000-00-00 00:00:00'),(44,1,41,'Perbaikan keramik dinding',5000000,1,'Periode',0,'','','2020-04-25 00:48:41','0000-00-00 00:00:00'),(45,2,41,'Pengecatan pintu masjid',5000000,1,'Periode',0,'','Pintu bagian utara','2020-04-25 00:49:57','0000-00-00 00:00:00'),(46,1,40,'Penambahan tanaman dan dekorasi',5000000,1,'Periode',0,'','','2020-04-25 00:51:55','0000-00-00 00:00:00'),(47,1,44,'Sisa Kas Tahun 2019',20017500,1,'Periode',0,'','','2020-05-08 18:55:49','0000-00-00 00:00:00');

/*Table structure for table `coba` */

DROP TABLE IF EXISTS `coba`;

CREATE TABLE `coba` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `coba` */

insert  into `coba`(`id`,`name`,`description`,`created_at`,`updated_at`) values (1,'alam','alamulhuda',NULL,NULL);

/*Table structure for table `inventory` */

DROP TABLE IF EXISTS `inventory`;

CREATE TABLE `inventory` (
  `id` int(35) NOT NULL,
  `name` varchar(150) DEFAULT NULL,
  `price` decimal(12,2) DEFAULT NULL,
  `date_buy` date DEFAULT NULL,
  `qty` int(10) DEFAULT NULL,
  `condition` varchar(2) DEFAULT NULL COMMENT 'Kondisi (SB=Sangat Bagus, B=Bagus, R=Rusak',
  `description` text DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

/*Data for the table `inventory` */

/*Table structure for table `invited_guests` */

DROP TABLE IF EXISTS `invited_guests`;

CREATE TABLE `invited_guests` (
  `id` int(35) NOT NULL AUTO_INCREMENT,
  `name` varchar(150) DEFAULT NULL,
  `address` varchar(150) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;

/*Data for the table `invited_guests` */

insert  into `invited_guests`(`id`,`name`,`address`,`created_at`,`updated_at`,`deleted_at`) values (1,'Orang 1','Alamat 1',NULL,NULL,NULL),(2,'Orang 2 ','Alamat 2',NULL,NULL,NULL),(3,'Orang 3','Alamat 3',NULL,NULL,NULL),(4,'Orang 4','Alamat 4',NULL,NULL,NULL),(5,'Orang 5','Alamat 5',NULL,NULL,NULL),(6,'Alamul Huda','Cikalong Krajan 1','2020-05-08 17:08:49','2020-05-08 17:09:46',NULL);

/*Table structure for table `kategori` */

DROP TABLE IF EXISTS `kategori`;

CREATE TABLE `kategori` (
  `id` int(35) NOT NULL AUTO_INCREMENT,
  `name` varchar(150) DEFAULT NULL,
  `type` varchar(1) DEFAULT NULL COMMENT 'P=Pendapatan, B=Belanja',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=utf8mb4;

/*Data for the table `kategori` */

insert  into `kategori`(`id`,`name`,`type`,`created_at`,`updated_at`,`deleted_at`) values (1,'Kas Awal','P','0000-00-00 00:00:00',NULL,NULL),(3,'Insentif Pegawai','B',NULL,'2020-04-12 09:32:46',NULL),(11,'sd','B','2020-04-12 17:45:30',NULL,NULL),(12,'sdds','B','2020-04-12 17:46:17',NULL,NULL),(13,'sad','B','2020-04-12 17:46:52',NULL,NULL);

/*Table structure for table `m_jumat` */

DROP TABLE IF EXISTS `m_jumat`;

CREATE TABLE `m_jumat` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `month` int(2) NOT NULL,
  `date_start` date DEFAULT NULL,
  `date_end` date DEFAULT NULL,
  `no` int(10) DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE=InnoDB AUTO_INCREMENT=23 DEFAULT CHARSET=utf8mb4;

/*Data for the table `m_jumat` */

insert  into `m_jumat`(`id`,`month`,`date_start`,`date_end`,`no`) values (1,4,'2020-03-27','2020-04-02',1),(2,4,'2020-04-03','2020-04-09',2),(3,4,'2020-04-10','2020-04-16',3),(4,4,'2020-04-17','2020-04-23',4),(5,4,'2020-04-24','2020-04-30',5),(6,5,'2020-05-01','2020-05-07',1),(7,5,'2020-05-08','2020-05-14',2),(8,5,'2020-05-15','2020-05-21',3),(9,5,'2020-05-22','2020-05-28',4),(10,6,'2020-05-29','2020-06-04',1),(11,6,'2020-06-05','2020-06-11',2),(12,6,'2020-06-12','2020-06-18',3),(13,6,'2020-06-19','2020-06-25',4),(14,7,'2020-06-25','2020-07-02',1),(15,7,'2020-07-03','2020-07-09',2),(16,7,'2020-07-10','2020-07-16',3),(17,7,'2020-07-17','2020-07-23',4),(18,7,'2020-07-24','2020-07-30',5),(19,8,'2020-07-31','2020-08-06',1),(20,8,'2020-08-07','2020-08-13',2),(21,8,'2020-08-14','2020-08-20',3),(22,8,'2020-08-21','2020-08-27',4);

/*Table structure for table `mail_content` */

DROP TABLE IF EXISTS `mail_content`;

CREATE TABLE `mail_content` (
  `id` int(23) NOT NULL AUTO_INCREMENT,
  `type` varchar(30) DEFAULT NULL COMMENT 'header or footer',
  `content` text DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `mail_content` */

/*Table structure for table `mail_in` */

DROP TABLE IF EXISTS `mail_in`;

CREATE TABLE `mail_in` (
  `id` int(23) NOT NULL AUTO_INCREMENT,
  `no_mail` varchar(100) DEFAULT NULL,
  `date` date DEFAULT NULL,
  `type` varchar(50) DEFAULT NULL,
  `address` text DEFAULT NULL,
  `description` text DEFAULT NULL,
  `file` varchar(150) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `mail_in` */

/*Table structure for table `mail_out` */

DROP TABLE IF EXISTS `mail_out`;

CREATE TABLE `mail_out` (
  `id` int(23) NOT NULL AUTO_INCREMENT,
  `no_mail` varchar(3) DEFAULT NULL,
  `type` varchar(50) DEFAULT NULL,
  `date` date DEFAULT NULL,
  `day` text DEFAULT NULL,
  `location` text DEFAULT NULL,
  `time` time DEFAULT NULL,
  `time_desc` text DEFAULT NULL,
  `guest` varchar(50) DEFAULT NULL COMMENT 'id in table invited_guests',
  `header1` text DEFAULT NULL,
  `header2` text DEFAULT NULL,
  `footer1` text DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

/*Data for the table `mail_out` */

insert  into `mail_out`(`id`,`no_mail`,`type`,`date`,`day`,`location`,`time`,`time_desc`,`guest`,`header1`,`header2`,`footer1`,`created_at`,`updated_at`) values (1,'001','02','2020-04-21','Senin','Pengajian Hidayatul Mubtadiien','18:30:00','ba\'da Sholat Magrib','1,2,3,4,5','Teriring salam dan Do\'a semoga Allah SWT merahmati dan meridhoi Kita semua dan selalu sukses dalam melaksanakan aktifitas sehari-hari. Aamiin','Dengan kerendahan hati kami mengundang Bapak-bapak dan Saudara-saudara untuk dapat hadir nama acara, insyaAllah akan dilaksanakan pada :','Demikian undangan ini kami sampaikan, mengingat pentingnya acara ini dimohon hadir tepat pada waktunya.\r\nAtas perhatian dan kehadirannya Kami ucapkan terimakasih,','2020-04-20 10:06:22','2020-04-20 10:38:18'),(2,'002','02','2020-04-23','Selasa','Masjid Jamie Nurul Hikmah','10:30:00','','2, 3, 4','Teriring salam dan Do\'a semoga Allah SWT merahmati dan meridhoi Kita semua dan selalu sukses dalam melaksanakan aktifitas sehari-hari. Aamiin','Dengan kerendahan hati kami mengundang Bapak-bapak dan Saudara-saudara untuk dapat hadir nama acara, insyaAllah akan dilaksanakan pada :','Demikian undangan ini kami sampaikan, mengingat pentingnya acara ini dimohon hadir tepat pada waktunya.\r\nAtas perhatian dan kehadirannya Kami ucapkan terimakasih.','2020-04-23 18:23:26','2020-05-08 16:55:58'),(3,'003','02','2020-05-17','Ahad','Masjid Jamie Nurul Hikmah','20:30:00','Ba\'da Sholat Isya','6','Teriring salam dan Do\'a semoga Allah SWT merahmati dan meridhoi Kita semua dan selalu sukses dalam melaksanakan aktifitas sehari-hari. Aamiin','Dengan kerendahan hati kami mengundang Bapak-bapak dan Saudara-saudara untuk dapat hadir musyawarah persiapan hari raya idul fitri, insyaAllah akan dilaksanakan pada :','Demikian undangan ini kami sampaikan, mengingat pentingnya acara ini dimohon hadir tepat pada waktunya.\r\nAtas perhatian dan kehadirannya Kami ucapkan terimakasih.','2020-05-17 04:22:28','2020-05-17 08:45:31'),(5,'004','02','2020-06-02','Selasa','Pengajian Hidayatul Mubtadiien','20:30:00','','6','Teriring salam dan Do\'a semoga Allah SWT merahmati dan meridhoi Kita semua dan selalu sukses dalam melaksanakan aktifitas sehari-hari. Aamiin','Dengan kerendahan hati kami mengundang Bapak-bapak dan Saudara-saudara untuk dapat hadir dalam acara Dzikrul Ghofilin, insyaAllah akan dilaksanakan pada :','Demikian undangan ini kami sampaikan, mengingat pentingnya acara ini dimohon hadir tepat pada waktunya.\r\nAtas perhatian dan kehadirannya Kami ucapkan terimakasih.','2020-06-02 09:29:23',NULL);

/*Table structure for table `mail_type` */

DROP TABLE IF EXISTS `mail_type`;

CREATE TABLE `mail_type` (
  `id` int(5) NOT NULL AUTO_INCREMENT,
  `no` varchar(2) DEFAULT NULL,
  `name` varchar(100) DEFAULT NULL,
  `header1` text DEFAULT NULL,
  `header2` text DEFAULT NULL,
  `footer1` text DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=31 DEFAULT CHARSET=latin1;

/*Data for the table `mail_type` */

insert  into `mail_type`(`id`,`no`,`name`,`header1`,`header2`,`footer1`) values (16,'01','Keputusan',NULL,NULL,NULL),(17,'02','Undangan','Teriring salam dan Do\'a semoga Allah SWT merahmati dan meridhoi Kita semua dan selalu sukses dalam melaksanakan aktifitas sehari-hari. Aamiin','Dengan kerendahan hati kami mengundang Bapak-bapak dan Saudara-saudara untuk dapat hadir nama acara, insyaAllah akan dilaksanakan pada :','Demikian undangan ini kami sampaikan, mengingat pentingnya acara ini dimohon hadir tepat pada waktunya.\r\nAtas perhatian dan kehadirannya Kami ucapkan terimakasih.'),(18,'03','Permohonan',NULL,NULL,NULL),(19,'04','Pemberitahuan',NULL,NULL,NULL),(20,'05','Peminjaman',NULL,NULL,NULL),(21,'06','Pernyataan',NULL,NULL,NULL),(22,'07','Mandat',NULL,NULL,NULL),(23,'08','Tugas',NULL,NULL,NULL),(24,'09','Keterangan',NULL,NULL,NULL),(25,'10','Rekomendasi',NULL,NULL,NULL),(26,'11','Balasan',NULL,NULL,NULL),(27,'12','Perintah Perjalanan Dinas',NULL,NULL,NULL),(28,'13','Sertifikat',NULL,NULL,NULL),(29,'14','Perjanjian Kerja',NULL,NULL,NULL),(30,'15','Pengantar',NULL,NULL,NULL);

/*Table structure for table `menu` */

DROP TABLE IF EXISTS `menu`;

CREATE TABLE `menu` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `name` varchar(150) DEFAULT NULL,
  `title` varchar(150) DEFAULT NULL,
  `url` varchar(100) DEFAULT '#',
  `parent` int(10) DEFAULT NULL,
  `sort_by` int(10) DEFAULT NULL,
  `icon` varchar(100) DEFAULT NULL,
  `is_active` float DEFAULT 0 COMMENT '1=Active, 0=Non Active',
  PRIMARY KEY (`id`) USING BTREE
) ENGINE=InnoDB AUTO_INCREMENT=27 DEFAULT CHARSET=latin1;

/*Data for the table `menu` */

insert  into `menu`(`id`,`name`,`title`,`url`,`parent`,`sort_by`,`icon`,`is_active`) values (1,'dashboard','Dashboard','home',NULL,1,'icon-home',1),(2,'anggaran','Anggaran','anggaran',NULL,2,'icon-layers',1),(3,'transaksi','Transaksi','#',NULL,3,'icon-dollar-sign',1),(4,'pendapatan','Pendapatan','keuangan/pendapatan',3,1,NULL,1),(5,'pengeluaran','Pengeluaran','keuangan/pengeluaran',3,2,NULL,1),(6,'inventaris','Inventaris','#',NULL,4,'icon-server',0),(7,'laporan','Laporan','#',NULL,6,'icon-book',1),(8,'buku_kas','Buku Kas','laporan/keuangan/buku_kas',7,1,NULL,1),(9,'pendapatan','Pendapatan','laporan/pendapatan',7,2,NULL,0),(10,'pengeluaran','Pengeluaran','laporan/pengeluaran',7,3,NULL,0),(11,'apbm','APBM','laporan/anggaran/apbm',7,4,NULL,1),(12,'struktur_organisasi','Struktur Organisasi','#',NULL,7,'icon-users',0),(13,'master_data','Master Data','#',NULL,8,'icon-grid',1),(14,'kategori','Kategori','master/kategori',13,1,NULL,0),(15,'rekening','Rekening','#',13,2,NULL,1),(16,'rekening1','Rekening 1','master/rekening/rekening1',15,1,NULL,1),(17,'rekening2','Rekening 2','master/rekening/rekening2',15,2,NULL,1),(18,'rekening3','Rekening 3','master/rekening/rekening',15,3,NULL,1),(19,'disposisi','Disposisi','#',NULL,5,'icon-mail',1),(20,'surat_masuk','Surat Masuk','disposisi/surat_masuk',19,1,NULL,1),(21,'surat_keluar','Surat Keluar','disposisi/surat_keluar',19,2,NULL,1),(22,'tamu_undangan','Tamu Undangan','disposisi/tamu_undangan',13,3,NULL,1),(23,'jumat','Jum\'at','laporan/keuangan/jumat',7,5,NULL,1),(24,'rekap_jumat','Rekap Jum\'at','laporan/keuangan/rekap_jumat',7,6,NULL,1),(25,'realisasi_anggaran','Realisasi Anggaran','coming_soon',7,7,NULL,1),(26,'integrasi','Integrasi APBM','keuangan/integrasi',3,3,NULL,1);

/*Table structure for table `migrations` */

DROP TABLE IF EXISTS `migrations`;

CREATE TABLE `migrations` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `migrations` */

insert  into `migrations`(`id`,`migration`,`batch`) values (1,'2020_06_12_160652_table_coba',1);

/*Table structure for table `mosque` */

DROP TABLE IF EXISTS `mosque`;

CREATE TABLE `mosque` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `code` varchar(20) DEFAULT NULL COMMENT 'untuk login',
  `ketua_dkm` varchar(150) DEFAULT NULL,
  `sekertaris` varchar(150) DEFAULT NULL,
  `bendahara` varchar(150) DEFAULT NULL,
  `name` varchar(150) DEFAULT NULL,
  `address` text DEFAULT NULL,
  `phone` varchar(15) DEFAULT NULL,
  `fax` varchar(15) DEFAULT NULL,
  `email` varchar(50) DEFAULT NULL,
  `website` varchar(50) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8mb4;

/*Data for the table `mosque` */

insert  into `mosque`(`id`,`code`,`ketua_dkm`,`sekertaris`,`bendahara`,`name`,`address`,`phone`,`fax`,`email`,`website`,`created_at`,`updated_at`,`deleted_at`) values (4,'mjnh','KH.Marullah Marhab','Alim Sujatmiko','Hari Nugraha','Jamie Nurul Hikmah','Jl.Syekh Quro No.185, Cikalong, Cilamaya Wetan, Kab.Karawang, Jawa Barat 40374',NULL,NULL,NULL,NULL,'2020-04-07 05:32:57',NULL,NULL),(7,'sad',NULL,NULL,NULL,'asd',NULL,NULL,NULL,NULL,NULL,'2020-05-08 19:59:50',NULL,NULL),(8,'4',NULL,NULL,NULL,'sd',NULL,NULL,NULL,NULL,NULL,'2020-06-21 14:00:42',NULL,NULL),(9,'4',NULL,NULL,NULL,'ewr',NULL,NULL,NULL,NULL,NULL,'2020-06-21 14:01:38',NULL,NULL);

/*Table structure for table `rek1` */

DROP TABLE IF EXISTS `rek1`;

CREATE TABLE `rek1` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `name` varchar(150) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

/*Data for the table `rek1` */

insert  into `rek1`(`id`,`name`,`created_at`,`updated_at`) values (1,'Pendapatan',NULL,NULL),(2,'Biaya',NULL,'2020-04-15 15:28:06');

/*Table structure for table `rek2` */

DROP TABLE IF EXISTS `rek2`;

CREATE TABLE `rek2` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `name` varchar(150) DEFAULT NULL,
  `kd_rek1` int(10) DEFAULT NULL,
  `kd_rek2` int(10) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=latin1;

/*Data for the table `rek2` */

insert  into `rek2`(`id`,`name`,`kd_rek1`,`kd_rek2`,`created_at`,`updated_at`) values (1,'Pendapatan Rutin',1,1,'2020-04-14 20:45:05',NULL),(2,'Insentif',2,1,'2020-04-14 20:45:40',NULL),(3,'Administrasi & Umum',2,2,'2020-04-15 15:25:33',NULL),(4,'Transport',2,3,'2020-04-15 15:25:52',NULL),(5,'Perlengkapan / Inventaris Masjid',2,4,'2020-04-15 15:26:21',NULL),(6,'Kegiatan Rutin DKM',2,5,'2020-04-15 15:27:04',NULL),(7,'Biaya Lain-lain',2,6,'2020-04-15 15:27:45',NULL),(8,'Rehabilitasi Bangunan Masjid',2,7,'2020-04-15 15:29:44',NULL),(9,'Pendapatan Lain-lain',1,2,'2020-04-24 15:20:49',NULL),(10,'Sisa Kas',1,3,'2020-05-08 18:52:30','2020-05-08 18:59:14');

/*Table structure for table `rekening` */

DROP TABLE IF EXISTS `rekening`;

CREATE TABLE `rekening` (
  `id` int(32) NOT NULL AUTO_INCREMENT,
  `kd_rek1` int(3) DEFAULT NULL,
  `kd_rek2` int(3) DEFAULT NULL,
  `kd_rek3` int(3) DEFAULT NULL,
  `name` varchar(150) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`) USING BTREE
) ENGINE=InnoDB AUTO_INCREMENT=45 DEFAULT CHARSET=latin1;

/*Data for the table `rekening` */

insert  into `rekening`(`id`,`kd_rek1`,`kd_rek2`,`kd_rek3`,`name`,`created_at`,`updated_at`) values (8,1,1,1,'Tanah Wakaf','2020-04-14 20:46:32','0000-00-00 00:00:00'),(9,1,1,2,'Jariah Masjid','2020-04-24 20:23:53','2020-04-24 15:23:53'),(10,2,1,1,'Pengurus DKM','2020-04-16 09:07:35','0000-00-00 00:00:00'),(12,2,1,3,'Tunjangan Hari Raya','2020-04-16 09:07:37','0000-00-00 00:00:00'),(13,2,1,4,'Imam Tarawih','2020-04-16 09:07:44','0000-00-00 00:00:00'),(14,2,2,1,'Administrasi','2020-04-24 20:51:16','2020-04-24 15:51:16'),(15,2,2,2,'Umum','2020-04-24 20:51:36','2020-04-24 15:51:36'),(16,2,3,1,'Transport','2020-04-24 21:03:19','2020-04-24 16:03:19'),(17,2,4,1,'Perlengkapan','2020-04-24 21:04:00','2020-04-24 16:04:00'),(18,2,4,2,'Inventaris','2020-04-24 21:04:12','2020-04-24 16:04:12'),(19,2,5,1,'Sholat Jum\'at','2020-04-24 21:04:28','2020-04-24 16:04:28'),(24,2,5,2,'Peringatan Hari Besar Islam','2020-04-24 21:05:01','0000-00-00 00:00:00'),(25,2,5,3,'Dzikrul Ghofilin','2020-04-24 21:05:04','0000-00-00 00:00:00'),(26,2,5,4,'Pengajian Rutin','2020-04-24 16:06:54','0000-00-00 00:00:00'),(27,2,5,5,'Nuzulul Qur\'an','2020-04-24 16:07:13','0000-00-00 00:00:00'),(28,2,5,6,'Haul Masjid','2020-04-24 16:07:27','0000-00-00 00:00:00'),(29,2,5,7,'Rebo Wekasan','2020-04-24 16:14:36','0000-00-00 00:00:00'),(30,2,5,8,'Musyawarah Internal Pengurus DKM','2020-04-24 16:15:22','0000-00-00 00:00:00'),(31,2,5,9,'Musyawarah DKM','2020-04-24 16:15:37','0000-00-00 00:00:00'),(32,2,6,1,'Pembelian Alat Kebersihan Masjid','2020-04-24 16:16:10','0000-00-00 00:00:00'),(33,2,6,2,'Pemeliharaan lampu dan alat-alat listrik','2020-04-24 16:16:38','0000-00-00 00:00:00'),(34,2,6,3,'Pemeliharaan alat pengeras suara','2020-04-24 16:17:01','0000-00-00 00:00:00'),(35,2,6,4,'Pemeliharaan pompa air, kran air, dll','2020-04-24 16:17:49','0000-00-00 00:00:00'),(36,2,6,5,'Biaya tak terduga','2020-04-24 16:18:03','0000-00-00 00:00:00'),(37,2,6,6,'Kegiatan Lain-lain','2020-04-24 16:18:36','0000-00-00 00:00:00'),(38,2,6,7,'Kegiatan irema','2020-04-24 16:18:47','0000-00-00 00:00:00'),(39,2,6,8,'Kegiatan Bazis','2020-04-24 16:19:02','0000-00-00 00:00:00'),(40,2,7,1,'Taman Masjid','2020-04-24 16:23:07','0000-00-00 00:00:00'),(41,2,7,2,'Bangunan Masjid','2020-04-24 16:23:40','0000-00-00 00:00:00'),(42,2,1,5,'Pengurus Masjid','2020-04-24 16:57:02','0000-00-00 00:00:00'),(43,2,6,9,'Pemeliharaan inventaris masjid','2020-04-25 00:45:36','0000-00-00 00:00:00'),(44,1,3,1,'Sisa Kas Tahun Lalu','2020-05-08 18:53:20','0000-00-00 00:00:00');

/*Table structure for table `transaction` */

DROP TABLE IF EXISTS `transaction`;

CREATE TABLE `transaction` (
  `id` int(25) NOT NULL AUTO_INCREMENT,
  `no_kas` char(5) DEFAULT NULL,
  `id_budget` int(25) DEFAULT NULL COMMENT 'id table budget',
  `date` date DEFAULT NULL,
  `debet` decimal(12,0) DEFAULT NULL,
  `kredit` decimal(12,0) DEFAULT NULL,
  `description` text DEFAULT NULL,
  `user_id` int(25) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE=InnoDB AUTO_INCREMENT=214 DEFAULT CHARSET=utf8mb4;

/*Data for the table `transaction` */

insert  into `transaction`(`id`,`no_kas`,`id_budget`,`date`,`debet`,`kredit`,`description`,`user_id`,`created_at`,`updated_at`,`deleted_at`) values (75,'00001',47,'2020-04-01',20017500,0,'Sisa Kas Tahun Lalu',4,NULL,'2020-05-08 18:57:11',NULL),(76,'00002',NULL,'2020-04-01',0,150000,'Biaya musyawarah DKM',NULL,NULL,NULL,NULL),(77,'00003',NULL,'2020-04-02',0,50000,'ATK Pengurus DKM',NULL,NULL,NULL,NULL),(78,'00004',NULL,'2020-04-02',0,30000,'Imam Dzikrul Ghofilin',NULL,NULL,NULL,NULL),(79,'00005',NULL,'2020-04-03',0,125000,'Petugas Jumat',NULL,NULL,NULL,NULL),(80,'00006',NULL,'2020-04-03',1519000,0,'Jariah Jumat Ke-1',NULL,NULL,NULL,NULL),(81,'00007',NULL,'2020-04-03',0,89000,'Pengharum dan pembersih ruangan masjid',NULL,NULL,NULL,NULL),(82,'00008',NULL,'2020-04-07',0,2250000,'Insentif marebot bulan April 2020',NULL,NULL,NULL,NULL),(83,'00009',NULL,'2020-04-08',0,70500,'Transport survey konveksi',NULL,NULL,NULL,NULL),(84,'00010',NULL,'2020-04-09',0,100000,'Musyawarah IREMA',NULL,NULL,NULL,NULL),(85,'00011',NULL,'2020-04-09',0,30000,'Imam Dzikrul Ghofilin',NULL,NULL,NULL,NULL),(86,'00012',NULL,'2020-04-10',0,125000,'Petugas Jumat',NULL,NULL,NULL,NULL),(87,'00013',NULL,'2020-04-10',1230000,0,'Jariah Jumat Ke-2',NULL,NULL,NULL,NULL),(88,'00014',NULL,'2020-04-10',0,48000,'Pengharum dan pembersih ruangan masjid',NULL,NULL,NULL,NULL),(89,'00015',NULL,'2020-04-10',0,51000,'Pembelian ATK Irema',NULL,NULL,NULL,NULL),(90,'00016',NULL,'2020-04-10',0,250000,'Loundry karpet, mukena dan sajadah masjid',NULL,NULL,NULL,NULL),(91,'00017',NULL,'2020-04-10',0,70000,'Konsumsi Kegiatan',NULL,NULL,NULL,NULL),(92,'00018',NULL,'2020-04-10',0,200000,'Musyawarah pembahasan RAPB',NULL,NULL,NULL,NULL),(93,'00019',NULL,'2020-04-12',0,940000,'Pengecatan Bedug',NULL,NULL,NULL,NULL),(94,'00020',NULL,'2020-04-12',0,468000,'Perbaikan Kran',NULL,NULL,NULL,NULL),(95,'00021',NULL,'2020-04-12',0,100000,'Konsumsi Kegiatan',NULL,NULL,NULL,NULL),(96,'00022',NULL,'2020-04-12',0,4500000,'DP Konveksi',NULL,NULL,NULL,NULL),(97,'00023',NULL,'2020-04-12',0,60000,'Transport',NULL,NULL,NULL,NULL),(98,'00024',NULL,'2020-04-12',0,960000,'Pembelian bunga',NULL,NULL,NULL,NULL),(99,'00025',NULL,'2020-04-13',0,100000,'Transport',NULL,NULL,NULL,NULL),(100,'00026',NULL,'2020-04-13',0,160000,'Konsumsi Kegiatan',NULL,NULL,NULL,NULL),(101,'00027',NULL,'2020-04-13',0,25000,'srabut baja',NULL,NULL,NULL,NULL),(102,'00028',NULL,'2020-04-13',0,100000,'BON Amil Yuti',NULL,NULL,NULL,NULL),(103,'00029',NULL,'2020-04-14',0,235000,'Pasir 1 becak dan semen 1 zak',NULL,NULL,NULL,NULL),(104,'00030',NULL,'2020-04-14',0,300000,'Ongkos Tukang 2 org',NULL,NULL,NULL,NULL),(105,'00031',NULL,'2020-04-15',0,55000,'Semen 1 zak',NULL,NULL,NULL,NULL),(106,'00032',NULL,'2020-04-15',0,155000,'Ongkos becak + bata 200 pcs',NULL,NULL,NULL,NULL),(107,'00033',NULL,'2020-04-15',0,90000,'Sarapan dan makan siang kegiatan',NULL,NULL,NULL,NULL),(108,'00034',NULL,'2020-04-15',0,110000,'Ongkos kenek pembantu',NULL,NULL,NULL,NULL),(109,'00035',NULL,'2020-04-15',0,49000,'Gembok dan cat pilok',NULL,NULL,NULL,NULL),(110,'00036',NULL,'2020-04-16',0,1108000,'Pembelian peralatan listrik dan lampu I',NULL,NULL,NULL,NULL),(111,'00037',NULL,'2020-04-16',0,187000,'Cat dekor dan paku',NULL,NULL,NULL,NULL),(112,'00038',NULL,'2020-04-16',0,110000,'Konsumsi Kegiatan',NULL,NULL,NULL,NULL),(113,'00039',NULL,'2020-04-16',0,30000,'Imam Dzikrul Ghofilin',NULL,NULL,NULL,NULL),(114,'00040',NULL,'2020-04-17',0,125000,'Petugas Jumat',NULL,NULL,NULL,NULL),(115,'00041',NULL,'2020-04-17',1245000,0,'Jariah jumat ke-3',NULL,NULL,NULL,NULL),(116,'00042',NULL,'2020-04-17',0,222500,'Konsumsi Kegiatan',NULL,NULL,NULL,NULL),(117,'00043',NULL,'2020-04-17',0,1200000,'Imam Rawatib Maret-April 2020',NULL,NULL,NULL,NULL),(118,'00044',NULL,'2020-04-17',0,200000,'Insentif DKM Maret-April 2020',NULL,NULL,NULL,NULL),(119,'00045',NULL,'2020-04-17',0,1000000,'Biaya tukang listrik',NULL,NULL,NULL,NULL),(120,'00046',NULL,'2020-04-17',0,1000000,'BON Amil Yuti',NULL,NULL,NULL,NULL),(121,'00047',NULL,'2020-04-17',700000,0,'Dana tanah wakaf dari BpkSubandi',NULL,NULL,NULL,NULL),(122,'00048',NULL,'2020-04-18',0,664000,'Pembelian peralatan listrik dan lampu II',NULL,NULL,NULL,NULL),(123,'00049',NULL,'2020-04-19',0,117000,'Konsumsi Kegiatan',NULL,NULL,NULL,NULL),(124,'00050',NULL,'2020-04-20',0,30000,'Trasnport ke konveksi anggota IREMA',NULL,NULL,NULL,NULL),(125,'00051',NULL,'2020-04-21',0,50000,'Konsumsi Kegiatan',NULL,NULL,NULL,NULL),(126,'00052',NULL,'2020-04-21',0,92000,'Pembelian keramik',NULL,NULL,NULL,NULL),(127,'00053',NULL,'2020-04-22',0,600000,'Pembuatan banner Ramadhan dan Hari raya',NULL,NULL,NULL,NULL),(128,'00054',NULL,'2020-04-22',0,20000,'Transport',NULL,NULL,NULL,NULL),(129,'00055',NULL,'2020-04-22',0,400000,'Pembelian bahan material pasir dan semen',NULL,NULL,NULL,NULL),(130,'00056',NULL,'2020-04-22',0,1000000,'Biaya tukang dekor',NULL,NULL,NULL,NULL),(131,'00057',NULL,'2020-04-22',0,100000,'Musyawarah sambut ramadhan',NULL,NULL,NULL,NULL),(132,'00058',NULL,'2020-04-23',0,200000,'Pembelian perlengkapan sholat tarawih',NULL,NULL,NULL,NULL),(133,'00059',NULL,'2020-04-24',0,125000,'Petugas Jumat',NULL,NULL,NULL,NULL),(134,'00060',NULL,'2020-04-24',1502000,0,'Jariah Jumat ke-4',NULL,NULL,NULL,NULL),(135,'00061',NULL,'2020-04-24',0,28000,'Bon Warung',NULL,NULL,NULL,NULL),(136,'00062',NULL,'2020-04-29',0,199000,'Biaya Listrik',NULL,NULL,NULL,NULL),(137,'00063',41,'2020-04-30',0,200000,'Pembuatan Kotak Amal (4 buah)',4,NULL,'2020-05-06 19:29:56',NULL),(138,'00064',NULL,'2020-04-30',0,66000,'Biaya Haul Masjid',NULL,NULL,NULL,NULL),(139,'00065',NULL,'2020-05-01',NULL,125000,'Petugas Jum\'at',6,'2020-05-14 14:21:28',NULL,NULL),(140,'00066',NULL,'2020-05-01',1335000,NULL,'Jariah Jum\'at Ke I',6,'2020-05-14 14:22:53',NULL,NULL),(141,'00067',NULL,'2020-05-03',500000,NULL,'Sodaqoh Jariyah (hamba Allah)',6,'2020-05-14 14:24:10',NULL,NULL),(142,'00068',NULL,'2020-05-04',4500000,NULL,'Pemasukan sewa tanah wakaf',6,'2020-05-14 14:24:54',NULL,NULL),(143,'00069',NULL,'2020-05-04',NULL,600000,'Pembayaran seragam wanita (THR)',6,'2020-05-14 14:26:56',NULL,NULL),(146,'00070',NULL,'2020-05-05',NULL,5580000,'Pelunasan seragam laki-laki (THR)',6,'2020-05-14 14:29:05',NULL,NULL),(147,'00071',NULL,'2020-05-05',NULL,30000,'Transport ',6,'2020-05-14 14:29:39',NULL,NULL),(148,'00072',NULL,'2020-05-06',NULL,3300000,'Sarung wadimor 60 pcs (THR)',6,'2020-05-14 14:30:33',NULL,NULL),(149,'00073',NULL,'2020-05-06',NULL,30000,'Transport',6,'2020-05-14 14:32:14',NULL,NULL),(150,'00074',NULL,'2020-05-07',NULL,250000,'Sorban 10 pcs (THR)',6,'2020-05-14 14:33:25',NULL,NULL),(151,'00075',NULL,'2020-05-07',NULL,36000,'Ongkos kirim sorban',6,'2020-05-14 14:33:49',NULL,NULL),(152,'00076',NULL,'2020-05-09',NULL,448000,'Hijab 32 pcs (THR)',6,'2020-05-14 14:34:38',NULL,NULL),(153,'00077',NULL,'2020-05-09',NULL,48000,'Ongkos kirim hijab',6,'2020-05-14 14:36:09',NULL,NULL),(154,'00078',NULL,'2020-05-10',NULL,1245000,'Sajadah Tasbe 30 pcs (THR)',6,'2020-05-14 14:36:53',NULL,NULL),(155,'00079',NULL,'2020-05-10',NULL,120000,'Ongkir sajadah',6,'2020-05-14 14:37:44',NULL,NULL),(156,'00080',NULL,'2020-05-14',NULL,1125000,'Insentif marebot Ujang bulan Mei 2020',6,'2020-05-14 14:38:56',NULL,NULL),(158,'00082',NULL,'2020-05-01',3070000,NULL,'DANA DUAFA',6,'2020-05-14 14:43:55',NULL,NULL),(159,'00083',NULL,'2020-05-17',NULL,20000,'Transport pengambilan Seragam DKM',6,'2020-05-22 03:07:57',NULL,NULL),(160,'00084',NULL,'2020-05-20',NULL,900000,'Administrasi pengurus DKM',6,'2020-05-22 03:08:57',NULL,NULL),(161,'00085',NULL,'2020-05-20',NULL,99500,'ATK amplop 4 dus, Tinta, Tali Plastik',6,'2020-05-22 03:10:29','2020-05-22 03:14:54',NULL),(162,'00086',NULL,'2020-05-21',NULL,500000,'Khataman Al Quran',6,'2020-05-22 03:11:07',NULL,NULL),(163,'00087',NULL,'2020-05-21',200000,NULL,'Jariah hamba Allah',NULL,NULL,NULL,NULL),(184,'00088',NULL,'2020-05-22',NULL,125000,'Petugas Jumat',6,'2020-06-05 02:58:51',NULL,NULL),(185,'00089',NULL,'2020-05-22',1231000,NULL,'Jariah Jumat',6,'2020-06-05 02:59:46',NULL,NULL),(186,'00090',NULL,'2020-05-22',1200000,NULL,'Shodaqoh Duafa',6,'2020-06-05 03:02:09',NULL,NULL),(187,'00091',NULL,'2020-05-22',1400000,NULL,'Wakaf bersama (ogi)',6,'2020-06-05 03:02:39',NULL,NULL),(188,'00092',NULL,'2020-05-22',190000,NULL,'Shodaqoh jariah kotak amal toko mainan',6,'2020-06-05 03:03:17',NULL,NULL),(189,'00093',NULL,'2020-05-22',NULL,1170000,'THR Bilal dan Tadarus',6,'2020-06-05 03:04:17',NULL,NULL),(190,'00094',NULL,'2020-05-22',NULL,20000,'Semen dan Plastik',6,'2020-06-05 03:04:47',NULL,NULL),(191,'00095',NULL,'2020-05-23',1601000,NULL,'Dana kas pinjaman',6,'2020-06-05 03:05:46',NULL,NULL),(192,'00096',NULL,'2020-05-23',NULL,4270000,'Pengambilan Dana Dhuafa',6,'2020-06-05 03:09:30',NULL,NULL),(193,'00097',NULL,'2020-05-24',NULL,250000,'Petugas Idul Fitri',6,'2020-06-05 03:10:08',NULL,NULL),(194,'00098',NULL,'2020-05-24',2630000,NULL,'Shodaqoh jariah Idul Fitri',6,'2020-06-05 03:12:01',NULL,NULL),(195,'00099',NULL,'2020-05-24',NULL,40000,'Bensin Genset Masjid 4 liter',6,'2020-06-05 03:14:27',NULL,NULL),(196,'00100',NULL,'2020-05-24',NULL,45000,'Bayar konsumsi',6,'2020-06-05 03:15:02',NULL,NULL),(197,'00101',NULL,'2020-05-24',NULL,20000,'Servis mic Masjid',6,'2020-06-05 03:15:28',NULL,NULL),(198,'00102',NULL,'2020-05-24',NULL,1601000,'Bayar dana kas pinjaman',6,'2020-06-05 03:17:17',NULL,NULL),(199,'00103',NULL,'2020-05-26',NULL,500000,'Pembuatan papan nama petugas jumat',6,'2020-06-05 03:17:53',NULL,NULL),(200,'00104',NULL,'2020-05-28',NULL,202000,'Bayar tagihan listrik masjid',6,'2020-06-05 03:19:24','2020-06-05 03:20:21',NULL),(201,'00105',NULL,'2020-05-28',NULL,154000,'Jamuan petugas zakat fitrah (23-05-2020)',6,'2020-06-05 03:24:24',NULL,NULL),(202,'00106',NULL,'2020-05-28',1070000,NULL,'Pengembalian sisa dana Dhuafa',6,'2020-06-05 03:26:02',NULL,NULL),(203,'00107',NULL,'2020-05-29',NULL,125000,'Petugas Jumat',6,'2020-06-05 03:28:33',NULL,NULL),(204,'00108',NULL,'2020-05-29',1100000,NULL,'Jariah Jumat',6,'2020-06-05 03:30:44',NULL,NULL),(205,'00109',NULL,'2020-05-29',NULL,1125000,'Insntif 1 orang marebot',6,'2020-06-05 03:33:19',NULL,NULL),(206,'00110',NULL,'2020-05-29',NULL,23000,'Konsumsi',6,'2020-06-05 03:33:45',NULL,NULL),(207,'00111',NULL,'2020-06-04',NULL,35000,'Imam Dzikrul Ghofilin',6,'2020-06-05 03:34:14',NULL,NULL),(208,'00112',NULL,'2020-06-04',NULL,125000,'Petugas Jumat',6,'2020-06-05 03:34:44','2020-06-05 03:38:03',NULL),(209,'00113',NULL,'2020-06-05',940000,NULL,'Jariah Jumat',6,'2020-06-12 01:32:41',NULL,NULL),(210,'00114',NULL,'2020-06-05',NULL,72000,'konsumsi',6,'2020-06-12 01:33:41',NULL,NULL),(211,'00115',NULL,'2020-06-06',NULL,600000,'Insentif Imam rawatib Mei',6,'2020-06-12 01:35:53',NULL,NULL),(212,'00116',NULL,'2020-06-09',NULL,20000,'Print data struktur anggota DKM',6,'2020-06-12 01:37:46',NULL,NULL),(213,'00117',NULL,'2020-06-11',NULL,35000,'Kegiatan Dzikrul Ghofilin',6,'2020-06-12 01:39:02',NULL,NULL);

/*Table structure for table `unit` */

DROP TABLE IF EXISTS `unit`;

CREATE TABLE `unit` (
  `id` int(32) NOT NULL AUTO_INCREMENT,
  `name` varchar(100) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`) USING BTREE
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=latin1;

/*Data for the table `unit` */

insert  into `unit`(`id`,`name`,`created_at`,`updated_at`) values (1,'Orang','2020-04-16 09:36:36','0000-00-00 00:00:00'),(2,'Bulan','2020-04-16 09:36:39','0000-00-00 00:00:00'),(3,'Pack','2020-04-16 09:36:42','0000-00-00 00:00:00'),(4,'Set','2020-04-16 09:36:51','0000-00-00 00:00:00'),(5,'Rim','2020-04-16 09:37:05','0000-00-00 00:00:00'),(6,'Buah','2020-04-16 09:37:13','0000-00-00 00:00:00'),(7,'Kg','2020-04-16 09:37:21','0000-00-00 00:00:00'),(8,'Paket','2020-04-16 22:39:33','0000-00-00 00:00:00'),(9,'Kali','2020-04-16 22:39:39','0000-00-00 00:00:00'),(10,'Bahu','2020-04-17 22:00:34','0000-00-00 00:00:00'),(11,'Musim','2020-04-17 22:01:26','0000-00-00 00:00:00'),(12,'Periode','2020-04-24 22:25:24','0000-00-00 00:00:00');

/*Table structure for table `user` */

DROP TABLE IF EXISTS `user`;

CREATE TABLE `user` (
  `id` int(25) NOT NULL AUTO_INCREMENT,
  `mosque_id` int(25) DEFAULT NULL,
  `group_id` int(25) DEFAULT NULL,
  `username` varchar(150) DEFAULT NULL,
  `password` varchar(150) DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  `name` varchar(150) DEFAULT NULL,
  `image` varchar(120) DEFAULT NULL,
  `status` varchar(10) DEFAULT NULL,
  `last_login` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8mb4;

/*Data for the table `user` */

insert  into `user`(`id`,`mosque_id`,`group_id`,`username`,`password`,`email`,`name`,`image`,`status`,`last_login`,`created_at`,`updated_at`,`deleted_at`) values (4,4,1,'alam','$P$B3fyQDUQLGDYAumaE9XDlUzMTXJFnR.','alam_endraw@yahoo.com','Alamul Huda','https://res.cloudinary.com/dwohvljcs/image/upload/v1588778909/mjnh/26720aef6b7701407122ea6ef8eeb0fb.png.png',NULL,'2020-06-16 17:36:16','2020-04-07 05:32:57','2020-06-16 17:36:16',NULL),(5,4,2,'hari','$P$BkIC9JXGpyxoOLMPrpGJP2RHvFQnEE1',NULL,'Hari Nugraha','',NULL,'2020-05-07 16:56:48','2020-05-04 18:19:17','2020-05-07 16:56:49',NULL),(6,4,3,'sekertaris','$P$BRDE8s/JfFB6jhne92VHzyaO6rc5Et.',NULL,'Alim Sujatmiko',NULL,NULL,'2020-06-12 01:50:39','2020-05-07 03:56:15','2020-06-12 01:50:39',NULL),(7,4,4,'tamu','$P$B3jD8tLGKnyYbSlDza0SLKZ3/zgdIl1',NULL,'Anggota DKM',NULL,NULL,'2020-05-08 20:03:24','2020-05-08 19:59:50','2020-05-08 20:03:24',NULL),(8,8,NULL,'user','$P$BJOxBG.MyLnooI4muYfbgcP9ICxmjo0',NULL,NULL,NULL,NULL,NULL,'2020-06-21 14:00:43',NULL,NULL),(9,9,NULL,'admin','$P$BD7xz.AApIJIoJVKmZehwURsYdhOUW0',NULL,NULL,NULL,NULL,NULL,'2020-06-21 14:01:38',NULL,NULL);

/*Table structure for table `user_group` */

DROP TABLE IF EXISTS `user_group`;

CREATE TABLE `user_group` (
  `id` int(25) NOT NULL AUTO_INCREMENT,
  `mosque_id` int(25) DEFAULT NULL,
  `name` varchar(150) DEFAULT NULL,
  `title` varchar(150) DEFAULT NULL,
  `privileges` text CHARACTER SET utf8mb4 COLLATE utf8mb4_bin DEFAULT NULL COMMENT 'menampung data menu dalam bentuk json  {"menu":["1","2"]}',
  `created_at` timestamp NULL DEFAULT NULL,
  `update_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4;

/*Data for the table `user_group` */

insert  into `user_group`(`id`,`mosque_id`,`name`,`title`,`privileges`,`created_at`,`update_at`) values (1,4,'admin','Admin','1,2,3,4,5,6,7,8,9,10,11,12,13,14,15,16,17,18,19,20,21,22,23,24,25,26',NULL,NULL),(2,4,'bendahara','Bendahara','1,3,4,5,7,8,9,10,23,24',NULL,NULL),(3,4,'sekertaris','Sekertaris','1,3,4,5,7,8,9,10,11,23,24,26',NULL,NULL),(4,4,'tamu','Anggota DKM','1,7,8,9,10,11,23,24,25',NULL,NULL);

/* Procedure structure for procedure `buku_kas` */

/*!50003 DROP PROCEDURE IF EXISTS  `buku_kas` */;

DELIMITER $$

/*!50003 CREATE DEFINER=`root`@`localhost` PROCEDURE `buku_kas`(`v_bln` INT)
BEGIN
	SELECT ''AS no_kas,''AS DATE,'Sisa Kas' AS DESCRIPTION,IF(cost>0,cost,0)AS debet,IF(cost<0,cost,0)AS kredit FROM(
		SELECT (SUM(debet)-SUM(kredit))cost FROM TRANSACTION WHERE MONTH(DATE)<v_bln
	)zz
	UNION
	SELECT no_kas,DATE,DESCRIPTION,debet,kredit FROM TRANSACTION WHERE MONTH(DATE)=v_bln;
	END */$$
DELIMITER ;

/* Procedure structure for procedure `dashboard` */

/*!50003 DROP PROCEDURE IF EXISTS  `dashboard` */;

DELIMITER $$

/*!50003 CREATE DEFINER=`root`@`localhost` PROCEDURE `dashboard`()
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
END */$$
DELIMITER ;

/* Procedure structure for procedure `rekap_jumat` */

/*!50003 DROP PROCEDURE IF EXISTS  `rekap_jumat` */;

DELIMITER $$

/*!50003 CREATE DEFINER=`root`@`localhost` PROCEDURE `rekap_jumat`(mnth int)
BEGIN
	SELECT 0 as id,'SALDO'as name,ifnull((sum(debet)-sum(kredit)),0)as debet, 0 as kredit from transaction where MONTH(date)<=mnth-1
union
SELECT id,
	concat("JUM'AT KE ", t.no) as name,
	(SELECT sum(debet) from transaction where date BETWEEN t.date_start and t.date_end)as debet,
	(SELECT sum(kredit) from transaction where date BETWEEN t.date_start and t.date_end)as kredit
	from m_jumat t where month=mnth;
END */$$
DELIMITER ;

/* Procedure structure for procedure `rep_budget` */

/*!50003 DROP PROCEDURE IF EXISTS  `rep_budget` */;

DELIMITER $$

/*!50003 CREATE DEFINER=`root`@`localhost` PROCEDURE `rep_budget`()
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
END */$$
DELIMITER ;

/* Procedure structure for procedure `rep_jumat` */

/*!50003 DROP PROCEDURE IF EXISTS  `rep_jumat` */;

DELIMITER $$

/*!50003 CREATE DEFINER=`root`@`localhost` PROCEDURE `rep_jumat`(d_start date,d_end date,d_start_be date,d_end_be date)
BEGIN
		SELECT ''as date,'Sisa Kas Jumat Lalu'as description,(sum(debet)-sum(kredit))as debet,0 as kredit from transaction where date <=d_end_be
		union
		SELECT date,description,debet,kredit from transaction where date between d_start and d_end
		union
		SELECT 'h','Total Transaksi Jumat Ini',sum(debet)as debet,sum(kredit)as kredit from transaction where date between d_start and d_end
		union
		SELECT 'h','Total Transaksi Jumat Lalu',sum(debet)as debet,sum(kredit)as kredit from transaction where date between d_start_be and d_end_be
		union
		SELECT 'h','Total Transaksi s/d Jumat Ini',sum(debet)as debet,sum(kredit)as kredit from transaction where date <=d_end;
END */$$
DELIMITER ;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
