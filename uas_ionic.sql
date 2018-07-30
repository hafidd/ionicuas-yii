/*
SQLyog Ultimate v12.4.1 (64 bit)
MySQL - 5.7.19 : Database - uas_ionic
*********************************************************************
*/

/*!40101 SET NAMES utf8 */;

/*!40101 SET SQL_MODE=''*/;

/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;
CREATE DATABASE /*!32312 IF NOT EXISTS*/`uas_ionic` /*!40100 DEFAULT CHARACTER SET utf16 */;

USE `uas_ionic`;

/*Table structure for table `galery` */

DROP TABLE IF EXISTS `galery`;

CREATE TABLE `galery` (
  `gl_id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `gl_wis_id` int(10) unsigned DEFAULT NULL,
  `gl_nama` varchar(100) DEFAULT NULL,
  `gl_gambar` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`gl_id`),
  KEY `fk_w` (`gl_wis_id`),
  CONSTRAINT `fk_w` FOREIGN KEY (`gl_wis_id`) REFERENCES `wisata` (`wis_id`) ON DELETE SET NULL ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf16;

/*Data for the table `galery` */

insert  into `galery`(`gl_id`,`gl_wis_id`,`gl_nama`,`gl_gambar`) values 
(1,4,'gambar','jpg'),
(2,4,'sunset','jpg'),
(3,4,'gambar_lagi','jpg'),
(4,3,'candi','jpg'),
(5,3,'prambanan','jpg'),
(6,1,'parang','jpg'),
(7,1,'tritis','jpeg'),
(8,1,'paris','jpg'),
(9,1,'pantai cuy','jpg');

/*Table structure for table `jenis` */

DROP TABLE IF EXISTS `jenis`;

CREATE TABLE `jenis` (
  `jenis_id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `jenis_nama` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`jenis_id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf16;

/*Data for the table `jenis` */

insert  into `jenis`(`jenis_id`,`jenis_nama`) values 
(1,'Candi'),
(2,'Kuliner'),
(3,'Pantai'),
(4,'Lainnya');

/*Table structure for table `kabupaten` */

DROP TABLE IF EXISTS `kabupaten`;

CREATE TABLE `kabupaten` (
  `kab_id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `kab_nama` varchar(30) NOT NULL,
  PRIMARY KEY (`kab_id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf16;

/*Data for the table `kabupaten` */

insert  into `kabupaten`(`kab_id`,`kab_nama`) values 
(1,'Sleman'),
(2,'Bantul'),
(3,'Kota Yogyakarta'),
(4,'Gunung Kidul'),
(5,'Kulon Progo');

/*Table structure for table `wisata` */

DROP TABLE IF EXISTS `wisata`;

CREATE TABLE `wisata` (
  `wis_id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `wis_kab_id` int(11) unsigned DEFAULT NULL,
  `wis_jenis_id` int(11) unsigned DEFAULT NULL,
  `wis_nama` varchar(100) DEFAULT NULL,
  `wis_keterangan` text,
  `wis_lat` double DEFAULT NULL,
  `wis_long` double DEFAULT NULL,
  `wis_gambar` varchar(20) DEFAULT NULL,
  PRIMARY KEY (`wis_id`),
  KEY `fk_kab` (`wis_kab_id`),
  KEY `fk_jenis` (`wis_jenis_id`),
  CONSTRAINT `fk_jenis` FOREIGN KEY (`wis_jenis_id`) REFERENCES `jenis` (`jenis_id`) ON DELETE SET NULL ON UPDATE CASCADE,
  CONSTRAINT `fk_kab` FOREIGN KEY (`wis_kab_id`) REFERENCES `kabupaten` (`kab_id`) ON DELETE SET NULL ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf16;

/*Data for the table `wisata` */

insert  into `wisata`(`wis_id`,`wis_kab_id`,`wis_jenis_id`,`wis_nama`,`wis_keterangan`,`wis_lat`,`wis_long`,`wis_gambar`) values 
(1,2,3,'Pantai Parangtritis',NULL,-8.0255145,110.3199843,'jpg'),
(2,1,1,'Ratu Boko','Archaeological site featuring a mix of Buddhist & Hindu structures, stone temples & caves.',-7.7705363,110.4872271,'jpg'),
(3,1,1,'\r\nCandi Prambanan','Expansive, 9th-century Hindu temple complex featuring structures with stone spires & sculptures.',-7.7520153,110.4892787,'jpg'),
(4,2,4,'Bukit Lintang Sewu',NULL,-7.9148388,110.4334889,'jpg'),
(5,5,4,'Waduk Sermo','Large artificial lake drawing visitors with sunset views & boat rides, plus fishing & cycling.',-7.8228644,110.1213862,'jpg'),
(6,5,2,'Sate Kambing Mbah Margo','Satay restaurant',-7.7475647,110.2104973,'jpg'),
(7,3,2,'Gudeg Yu Djum Wijilan 167','Javanese restaurant',-7.8049277,110.3645759,'jpg'),
(8,3,4,'Keraton Yogyakarta','Built in the 18th century, this grand palace is still used by Indonesian royalty.',-7.8052792,110.3620144,'jpg'),
(9,4,3,'Pantai Krakal',NULL,-8.1452136,110.5964808,'jpg'),
(10,4,4,'Embung Batara Sriten',NULL,-7.832106,110.6308283,'jpg');

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
