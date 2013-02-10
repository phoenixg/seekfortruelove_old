/*
SQLyog Ultimate v8.71 
MySQL - 5.1.66 : Database - truelove
*********************************************************************
*/

/*!40101 SET NAMES utf8 */;

/*!40101 SET SQL_MODE=''*/;

/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;
CREATE DATABASE /*!32312 IF NOT EXISTS*/`truelove` /*!40100 DEFAULT CHARACTER SET utf8 */;

USE `truelove`;

/*Table structure for table `admins` */

DROP TABLE IF EXISTS `admins`;

CREATE TABLE `admins` (
  `password` varchar(100) NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

/*Data for the table `admins` */

insert  into `admins`(`password`,`created_at`,`updated_at`) values ('$2a$08$5D0YZz.6MN50XNUAwI5vm.99SGRUD0bUa41Kk4H4AbedHDDdoLXV6','2012-12-27 07:24:03','2012-12-27 07:24:03');

/*Table structure for table `images` */

DROP TABLE IF EXISTS `images`;

CREATE TABLE `images` (
  `user_id` int(11) NOT NULL,
  `filename` varchar(100) NOT NULL,
  `filename_thumb` varchar(100) NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

/*Data for the table `images` */

insert  into `images`(`user_id`,`filename`,`filename_thumb`,`created_at`,`updated_at`) values (59,'large20121230020002.jpg','small20121230020002.jpg','2012-12-30 14:00:02','2012-12-30 14:00:02'),(55,'large20121229120117.jpg','small20121229120117.jpg','2012-12-29 12:01:17','2012-12-29 12:01:17'),(88,'large20130105112150.jpg','small20130105112150.jpg','2013-01-05 11:21:51','2013-01-05 11:21:51'),(94,'large20130106093124.jpg','small20130106093124.jpg','2013-01-06 21:31:24','2013-01-06 21:31:24'),(59,'large20130111035506.jpg','small20130111035506.jpg','2013-01-11 15:55:06','2013-01-11 15:55:06'),(59,'large20130111035613.jpg','small20130111035613.jpg','2013-01-11 15:56:13','2013-01-11 15:56:13'),(59,'large20130111035641.jpg','small20130111035641.jpg','2013-01-11 15:56:41','2013-01-11 15:56:41'),(106,'large20130113024305.jpg','small20130113024305.jpg','2013-01-13 14:43:05','2013-01-13 14:43:05');

/*Table structure for table `laravel_migrations` */

DROP TABLE IF EXISTS `laravel_migrations`;

CREATE TABLE `laravel_migrations` (
  `bundle` varchar(50) NOT NULL,
  `name` varchar(200) NOT NULL,
  `batch` int(11) NOT NULL,
  PRIMARY KEY (`bundle`,`name`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

/*Data for the table `laravel_migrations` */

insert  into `laravel_migrations`(`bundle`,`name`,`batch`) values ('application','2012_08_11_121544_create_users_table',1),('application','2012_08_11_123222_create_session_table',1),('application','2012_09_01_080704_create_static_ethnics_table',1),('application','2012_09_01_125812_create_static_nationalities_table',1),('application','2012_09_01_125826_create_static_districts_table',1),('application','2012_09_01_130019_create_static_marriages_table',1),('application','2012_09_01_130035_create_static_livings_table',1),('application','2012_09_01_130055_create_static_academics_table',1),('application','2012_09_01_130115_create_static_industries_table',1),('application','2012_09_01_130136_create_static_professions_table',1),('application','2012_09_01_130155_create_static_companytypes_table',1),('application','2012_09_01_130231_create_static_salaries_table',1),('application','2012_09_19_121544_create_images_table',1),('application','2012_12_19_121545_create_admins_table',1);

/*Table structure for table `sessions` */

DROP TABLE IF EXISTS `sessions`;

CREATE TABLE `sessions` (
  `id` varchar(40) NOT NULL,
  `last_activity` int(11) NOT NULL,
  `data` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

/*Data for the table `sessions` */

insert  into `sessions`(`id`,`last_activity`,`data`) values ('VWRmtRbuYoErdoCj5coebhRiUQsE4mgJ3hwGo6SM',1360492293,'a:3:{s:5:\":new:\";a:0:{}s:5:\":old:\";a:0:{}s:10:\"csrf_token\";s:40:\"PRmjTbsvEN2hiYpVTLjFw3VD7byWn5dBGDHaxUzw\";}'),('KcKyjltMDgLNzdm74wMTwFox3dNuE7AaEkC8YcHU',1360492324,'a:3:{s:5:\":new:\";a:0:{}s:5:\":old:\";a:0:{}s:10:\"csrf_token\";s:40:\"UvkWUxDAenAmPIrVd7Nr9YdJH2IbH7knLm5coVyw\";}'),('oVhNF2dbxs0GgQs4JXKaR0Pyue2fKLZBk4q5ORnS',1360493239,'a:3:{s:5:\":new:\";a:0:{}s:5:\":old:\";a:0:{}s:10:\"csrf_token\";s:40:\"GnPj5p9P9JEJ9SRHE5WGlviUPcR4FioIKaQaDz28\";}'),('UJ5pVqhmolRd87KbdQN7rDTSmaQhr6TsTQDwqgvd',1360495756,'a:3:{s:5:\":new:\";a:0:{}s:5:\":old:\";a:0:{}s:10:\"csrf_token\";s:40:\"kaqgX8ytxPNm8aB2x2y1VLrvEccrhW73OI4Qy6Sf\";}'),('gaEe6JGcxDBjtvAdWafctYPZbPRo6m2IoG6mc9W3',1360499991,'a:3:{s:5:\":new:\";a:0:{}s:5:\":old:\";a:0:{}s:10:\"csrf_token\";s:40:\"hURbwErKvJ9jUTphkBoBZNWMsmQZK1mGV2KAQfEN\";}'),('Yz6DVP7gdyAZNAaSdmO4UO57lWQuRHuV5cOTJu3V',1360495977,'a:3:{s:5:\":new:\";a:0:{}s:5:\":old:\";a:0:{}s:10:\"csrf_token\";s:40:\"YI8yYaw6FUWUVYq41CDgVhwQr5joFBw3czKB4g50\";}'),('Tt1cQZMEXjsaowI0R6m2OIrCOFDkgyNLqTQVuDlW',1360495943,'a:3:{s:5:\":new:\";a:0:{}s:5:\":old:\";a:0:{}s:10:\"csrf_token\";s:40:\"ZiAE0W3sKuDIjH5f2OUY7og8rfn9LJhqv5bIbNWF\";}'),('0vmw4H8VntON05VUiZSWjnwk4dr2BdGOgwdTY9dx',1360495871,'a:3:{s:5:\":new:\";a:0:{}s:5:\":old:\";a:0:{}s:10:\"csrf_token\";s:40:\"dGhziK7LFtaZBz1v6TO2NKWnSEjjKebQpXEMwGu8\";}');

/*Table structure for table `static_academics` */

DROP TABLE IF EXISTS `static_academics`;

CREATE TABLE `static_academics` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `academic` varchar(128) NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=10 DEFAULT CHARSET=utf8;

/*Data for the table `static_academics` */

insert  into `static_academics`(`id`,`academic`,`created_at`,`updated_at`) values (1,'小学','2012-12-27 07:24:02','2012-12-27 07:24:02'),(2,'初中','2012-12-27 07:24:02','2012-12-27 07:24:02'),(3,'中专','2012-12-27 07:24:02','2012-12-27 07:24:02'),(4,'高中','2012-12-27 07:24:02','2012-12-27 07:24:02'),(5,'大专','2012-12-27 07:24:02','2012-12-27 07:24:02'),(6,'本科','2012-12-27 07:24:02','2012-12-27 07:24:02'),(7,'研究生','2012-12-27 07:24:02','2012-12-27 07:24:02'),(8,'博士','2012-12-27 07:24:02','2012-12-27 07:24:02'),(9,'博士后','2012-12-27 07:24:02','2012-12-27 07:24:02');

/*Table structure for table `static_companytypes` */

DROP TABLE IF EXISTS `static_companytypes`;

CREATE TABLE `static_companytypes` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `type` varchar(128) NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=9 DEFAULT CHARSET=utf8;

/*Data for the table `static_companytypes` */

insert  into `static_companytypes`(`id`,`type`,`created_at`,`updated_at`) values (1,'外资','2012-12-27 07:24:03','2012-12-27 07:24:03'),(2,'合资','2012-12-27 07:24:03','2012-12-27 07:24:03'),(3,'国企','2012-12-27 07:24:03','2012-12-27 07:24:03'),(4,'民营','2012-12-27 07:24:03','2012-12-27 07:24:03'),(5,'政府机关','2012-12-27 07:24:03','2012-12-27 07:24:03'),(6,'事业单位','2012-12-27 07:24:03','2012-12-27 07:24:03'),(7,'非营利机构','2012-12-27 07:24:03','2012-12-27 07:24:03'),(8,'其他','2012-12-27 07:24:03','2012-12-27 07:24:03');

/*Table structure for table `static_districts` */

DROP TABLE IF EXISTS `static_districts`;

CREATE TABLE `static_districts` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `district` varchar(128) NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=20 DEFAULT CHARSET=utf8;

/*Data for the table `static_districts` */

insert  into `static_districts`(`id`,`district`,`created_at`,`updated_at`) values (1,'黄浦','2012-12-27 07:24:02','2012-12-27 07:24:02'),(2,'闸北','2012-12-27 07:24:02','2012-12-27 07:24:02'),(3,'虹口','2012-12-27 07:24:02','2012-12-27 07:24:02'),(4,'杨浦','2012-12-27 07:24:02','2012-12-27 07:24:02'),(5,'静安','2012-12-27 07:24:02','2012-12-27 07:24:02'),(6,'宝山','2012-12-27 07:24:02','2012-12-27 07:24:02'),(7,'普陀','2012-12-27 07:24:02','2012-12-27 07:24:02'),(8,'卢湾','2012-12-27 07:24:02','2012-12-27 07:24:02'),(9,'长宁','2012-12-27 07:24:02','2012-12-27 07:24:02'),(10,'徐汇','2012-12-27 07:24:02','2012-12-27 07:24:02'),(11,'闵行','2012-12-27 07:24:02','2012-12-27 07:24:02'),(12,'嘉定','2012-12-27 07:24:02','2012-12-27 07:24:02'),(13,'浦东','2012-12-27 07:24:02','2012-12-27 07:24:02'),(14,'松江','2012-12-27 07:24:02','2012-12-27 07:24:02'),(15,'青浦','2012-12-27 07:24:02','2012-12-27 07:24:02'),(16,'奉贤','2012-12-27 07:24:02','2012-12-27 07:24:02'),(17,'南汇','2012-12-27 07:24:02','2012-12-27 07:24:02'),(18,'金山','2012-12-27 07:24:02','2012-12-27 07:24:02'),(19,'崇明','2012-12-27 07:24:02','2012-12-27 07:24:02');

/*Table structure for table `static_ethnics` */

DROP TABLE IF EXISTS `static_ethnics`;

CREATE TABLE `static_ethnics` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(128) NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=57 DEFAULT CHARSET=utf8;

/*Data for the table `static_ethnics` */

insert  into `static_ethnics`(`id`,`name`,`created_at`,`updated_at`) values (1,'汉族','2012-12-27 07:24:02','2012-12-27 07:24:02'),(2,'壮族','2012-12-27 07:24:02','2012-12-27 07:24:02'),(3,'满族','2012-12-27 07:24:02','2012-12-27 07:24:02'),(4,'回族','2012-12-27 07:24:02','2012-12-27 07:24:02'),(5,'苗族','2012-12-27 07:24:02','2012-12-27 07:24:02'),(6,'维吾尔族','2012-12-27 07:24:02','2012-12-27 07:24:02'),(7,'土家族','2012-12-27 07:24:02','2012-12-27 07:24:02'),(8,'彝族','2012-12-27 07:24:02','2012-12-27 07:24:02'),(9,'蒙古族','2012-12-27 07:24:02','2012-12-27 07:24:02'),(10,'藏族','2012-12-27 07:24:02','2012-12-27 07:24:02'),(11,'布依族','2012-12-27 07:24:02','2012-12-27 07:24:02'),(12,'侗族','2012-12-27 07:24:02','2012-12-27 07:24:02'),(13,'瑶族','2012-12-27 07:24:02','2012-12-27 07:24:02'),(14,'朝鲜族','2012-12-27 07:24:02','2012-12-27 07:24:02'),(15,'白族','2012-12-27 07:24:02','2012-12-27 07:24:02'),(16,'哈尼族','2012-12-27 07:24:02','2012-12-27 07:24:02'),(17,'哈萨克族','2012-12-27 07:24:02','2012-12-27 07:24:02'),(18,'黎族','2012-12-27 07:24:02','2012-12-27 07:24:02'),(19,'傣族','2012-12-27 07:24:02','2012-12-27 07:24:02'),(20,'畲族','2012-12-27 07:24:02','2012-12-27 07:24:02'),(21,'傈僳族','2012-12-27 07:24:02','2012-12-27 07:24:02'),(22,'仡佬族','2012-12-27 07:24:02','2012-12-27 07:24:02'),(23,'东乡族','2012-12-27 07:24:02','2012-12-27 07:24:02'),(24,'高山族','2012-12-27 07:24:02','2012-12-27 07:24:02'),(25,'拉祜族','2012-12-27 07:24:02','2012-12-27 07:24:02'),(26,'水族','2012-12-27 07:24:02','2012-12-27 07:24:02'),(27,'佤族','2012-12-27 07:24:02','2012-12-27 07:24:02'),(28,'纳西族','2012-12-27 07:24:02','2012-12-27 07:24:02'),(29,'羌族','2012-12-27 07:24:02','2012-12-27 07:24:02'),(30,'土族','2012-12-27 07:24:02','2012-12-27 07:24:02'),(31,'仫佬族','2012-12-27 07:24:02','2012-12-27 07:24:02'),(32,'锡伯族','2012-12-27 07:24:02','2012-12-27 07:24:02'),(33,'柯尔克孜族','2012-12-27 07:24:02','2012-12-27 07:24:02'),(34,'达斡尔族','2012-12-27 07:24:02','2012-12-27 07:24:02'),(35,'景颇族','2012-12-27 07:24:02','2012-12-27 07:24:02'),(36,'毛南族','2012-12-27 07:24:02','2012-12-27 07:24:02'),(37,'撒拉族','2012-12-27 07:24:02','2012-12-27 07:24:02'),(38,'布朗族','2012-12-27 07:24:02','2012-12-27 07:24:02'),(39,'塔吉克族','2012-12-27 07:24:02','2012-12-27 07:24:02'),(40,'阿昌族','2012-12-27 07:24:02','2012-12-27 07:24:02'),(41,'普米族','2012-12-27 07:24:02','2012-12-27 07:24:02'),(42,'鄂温克族','2012-12-27 07:24:02','2012-12-27 07:24:02'),(43,'怒族','2012-12-27 07:24:02','2012-12-27 07:24:02'),(44,'京族','2012-12-27 07:24:02','2012-12-27 07:24:02'),(45,'基诺族','2012-12-27 07:24:02','2012-12-27 07:24:02'),(46,'德昂族','2012-12-27 07:24:02','2012-12-27 07:24:02'),(47,'保安族','2012-12-27 07:24:02','2012-12-27 07:24:02'),(48,'俄罗斯族','2012-12-27 07:24:02','2012-12-27 07:24:02'),(49,'裕固族','2012-12-27 07:24:02','2012-12-27 07:24:02'),(50,'乌兹别克族','2012-12-27 07:24:02','2012-12-27 07:24:02'),(51,'门巴族','2012-12-27 07:24:02','2012-12-27 07:24:02'),(52,'鄂伦春族','2012-12-27 07:24:02','2012-12-27 07:24:02'),(53,'独龙族','2012-12-27 07:24:02','2012-12-27 07:24:02'),(54,'塔塔尔族','2012-12-27 07:24:02','2012-12-27 07:24:02'),(55,'赫哲族','2012-12-27 07:24:02','2012-12-27 07:24:02'),(56,'珞巴族','2012-12-27 07:24:02','2012-12-27 07:24:02');

/*Table structure for table `static_industries` */

DROP TABLE IF EXISTS `static_industries`;

CREATE TABLE `static_industries` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `type` varchar(128) NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=21 DEFAULT CHARSET=utf8;

/*Data for the table `static_industries` */

insert  into `static_industries`(`id`,`type`,`created_at`,`updated_at`) values (1,'计算机/互联网','2012-12-27 07:24:02','2012-12-27 07:24:02'),(2,'通信/电子','2012-12-27 07:24:02','2012-12-27 07:24:02'),(3,'贸易/进出口/采购','2012-12-27 07:24:02','2012-12-27 07:24:02'),(4,'消费/制造','2012-12-27 07:24:02','2012-12-27 07:24:02'),(5,'机械/重工/汽车','2012-12-27 07:24:02','2012-12-27 07:24:02'),(6,'广告/公关/媒体','2012-12-27 07:24:02','2012-12-27 07:24:02'),(7,'教育/培训','2012-12-27 07:24:02','2012-12-27 07:24:02'),(8,'会计/金融/银行/保险','2012-12-27 07:24:02','2012-12-27 07:24:02'),(9,'房地产/建筑/装潢','2012-12-27 07:24:02','2012-12-27 07:24:02'),(10,'化工/能源/原材料','2012-12-27 07:24:02','2012-12-27 07:24:02'),(11,'医疗/医药','2012-12-27 07:24:02','2012-12-27 07:24:02'),(12,'交通/物流/运输','2012-12-27 07:24:02','2012-12-27 07:24:02'),(13,'餐饮/美容/服务业','2012-12-27 07:24:02','2012-12-27 07:24:02'),(14,'娱乐/影视','2012-12-27 07:24:02','2012-12-27 07:24:02'),(15,'体育','2012-12-27 07:24:02','2012-12-27 07:24:02'),(16,'航天/航空','2012-12-27 07:24:02','2012-12-27 07:24:02'),(17,'政府','2012-12-27 07:24:02','2012-12-27 07:24:02'),(18,'社会团体','2012-12-27 07:24:02','2012-12-27 07:24:02'),(19,'非营利机构','2012-12-27 07:24:02','2012-12-27 07:24:02'),(20,'其他','2012-12-27 07:24:02','2012-12-27 07:24:02');

/*Table structure for table `static_livings` */

DROP TABLE IF EXISTS `static_livings`;

CREATE TABLE `static_livings` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `status` varchar(128) NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

/*Data for the table `static_livings` */

insert  into `static_livings`(`id`,`status`,`created_at`,`updated_at`) values (1,'住自己家','2012-12-27 07:24:02','2012-12-27 07:24:02'),(2,'租房','2012-12-27 07:24:02','2012-12-27 07:24:02'),(3,'已购','2012-12-27 07:24:02','2012-12-27 07:24:02');

/*Table structure for table `static_marriages` */

DROP TABLE IF EXISTS `static_marriages`;

CREATE TABLE `static_marriages` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `status` varchar(128) NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

/*Data for the table `static_marriages` */

insert  into `static_marriages`(`id`,`status`,`created_at`,`updated_at`) values (1,'未婚','2012-12-27 07:24:02','2012-12-27 07:24:02'),(2,'离异','2012-12-27 07:24:02','2012-12-27 07:24:02'),(3,'丧偶','2012-12-27 07:24:02','2012-12-27 07:24:02');

/*Table structure for table `static_nationalities` */

DROP TABLE IF EXISTS `static_nationalities`;

CREATE TABLE `static_nationalities` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `nationality` varchar(128) NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=36 DEFAULT CHARSET=utf8;

/*Data for the table `static_nationalities` */

insert  into `static_nationalities`(`id`,`nationality`,`created_at`,`updated_at`) values (1,'上海（沪、申）','2012-12-27 07:24:02','2012-12-27 07:24:02'),(2,'北京（京）','2012-12-27 07:24:02','2012-12-27 07:24:02'),(3,'天津（津）','2012-12-27 07:24:02','2012-12-27 07:24:02'),(4,'重庆（渝）','2012-12-27 07:24:02','2012-12-27 07:24:02'),(5,'河北（冀）','2012-12-27 07:24:02','2012-12-27 07:24:02'),(6,'山西（晋）','2012-12-27 07:24:02','2012-12-27 07:24:02'),(7,'内蒙古（蒙）','2012-12-27 07:24:02','2012-12-27 07:24:02'),(8,'福建（闽）','2012-12-27 07:24:02','2012-12-27 07:24:02'),(9,'吉林（吉）','2012-12-27 07:24:02','2012-12-27 07:24:02'),(10,'黑龙江（黑）','2012-12-27 07:24:02','2012-12-27 07:24:02'),(11,'江苏（苏）','2012-12-27 07:24:02','2012-12-27 07:24:02'),(12,'浙江（浙）','2012-12-27 07:24:02','2012-12-27 07:24:02'),(13,'安徽（皖）','2012-12-27 07:24:02','2012-12-27 07:24:02'),(14,'辽宁（辽）','2012-12-27 07:24:02','2012-12-27 07:24:02'),(15,'江西（赣）','2012-12-27 07:24:02','2012-12-27 07:24:02'),(16,'山东（鲁）','2012-12-27 07:24:02','2012-12-27 07:24:02'),(17,'河南（豫）','2012-12-27 07:24:02','2012-12-27 07:24:02'),(18,'湖北（鄂）','2012-12-27 07:24:02','2012-12-27 07:24:02'),(19,'湖南（湘）','2012-12-27 07:24:02','2012-12-27 07:24:02'),(20,'广东（粤）','2012-12-27 07:24:02','2012-12-27 07:24:02'),(21,'广西（桂）','2012-12-27 07:24:02','2012-12-27 07:24:02'),(22,'海南（琼）','2012-12-27 07:24:02','2012-12-27 07:24:02'),(23,'四川（川、蜀）','2012-12-27 07:24:02','2012-12-27 07:24:02'),(24,'贵州（黔、贵）','2012-12-27 07:24:02','2012-12-27 07:24:02'),(25,'云南（滇、云）','2012-12-27 07:24:02','2012-12-27 07:24:02'),(26,'西藏（藏）','2012-12-27 07:24:02','2012-12-27 07:24:02'),(27,'陕西（陕、秦）','2012-12-27 07:24:02','2012-12-27 07:24:02'),(28,'甘肃（甘、陇）','2012-12-27 07:24:02','2012-12-27 07:24:02'),(29,'宁夏（宁）','2012-12-27 07:24:02','2012-12-27 07:24:02'),(30,'青海（青）','2012-12-27 07:24:02','2012-12-27 07:24:02'),(31,'新疆（新）','2012-12-27 07:24:02','2012-12-27 07:24:02'),(32,'香港（港）','2012-12-27 07:24:02','2012-12-27 07:24:02'),(33,'澳门（澳）','2012-12-27 07:24:02','2012-12-27 07:24:02'),(34,'台湾（台）','2012-12-27 07:24:02','2012-12-27 07:24:02'),(35,'国外','2012-12-27 07:24:02','2012-12-27 07:24:02');

/*Table structure for table `static_professions` */

DROP TABLE IF EXISTS `static_professions`;

CREATE TABLE `static_professions` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `profession` varchar(128) NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=21 DEFAULT CHARSET=utf8;

/*Data for the table `static_professions` */

insert  into `static_professions`(`id`,`profession`,`created_at`,`updated_at`) values (1,'技术','2012-12-27 07:24:02','2012-12-27 07:24:02'),(2,'设计','2012-12-27 07:24:02','2012-12-27 07:24:02'),(3,'销售','2012-12-27 07:24:03','2012-12-27 07:24:03'),(4,'管理','2012-12-27 07:24:03','2012-12-27 07:24:03'),(5,'财务/会计','2012-12-27 07:24:03','2012-12-27 07:24:03'),(6,'行政','2012-12-27 07:24:03','2012-12-27 07:24:03'),(7,'后勤','2012-12-27 07:24:03','2012-12-27 07:24:03'),(8,'客服','2012-12-27 07:24:03','2012-12-27 07:24:03'),(9,'教师','2012-12-27 07:24:03','2012-12-27 07:24:03'),(10,'市场','2012-12-27 07:24:03','2012-12-27 07:24:03'),(11,'法务','2012-12-27 07:24:03','2012-12-27 07:24:03'),(12,'质控','2012-12-27 07:24:03','2012-12-27 07:24:03'),(13,'技工','2012-12-27 07:24:03','2012-12-27 07:24:03'),(14,'金融/证券','2012-12-27 07:24:03','2012-12-27 07:24:03'),(15,'翻译','2012-12-27 07:24:03','2012-12-27 07:24:03'),(16,'警察','2012-12-27 07:24:03','2012-12-27 07:24:03'),(17,'公务员','2012-12-27 07:24:03','2012-12-27 07:24:03'),(18,'创业','2012-12-27 07:24:03','2012-12-27 07:24:03'),(19,'自由职业','2012-12-27 07:24:03','2012-12-27 07:24:03'),(20,'其他','2012-12-27 07:24:03','2012-12-27 07:24:03');

/*Table structure for table `static_salaries` */

DROP TABLE IF EXISTS `static_salaries`;

CREATE TABLE `static_salaries` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `range` varchar(128) NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=16 DEFAULT CHARSET=utf8;

/*Data for the table `static_salaries` */

insert  into `static_salaries`(`id`,`range`,`created_at`,`updated_at`) values (1,'<1,000','2012-12-27 07:24:03','2012-12-27 07:24:03'),(2,'1,000 - 1,900','2012-12-27 07:24:03','2012-12-27 07:24:03'),(3,'2,000 - 2,900','2012-12-27 07:24:03','2012-12-27 07:24:03'),(4,'3,000 - 3,900','2012-12-27 07:24:03','2012-12-27 07:24:03'),(5,'4,000 - 4,900','2012-12-27 07:24:03','2012-12-27 07:24:03'),(6,'5,000 - 5,900','2012-12-27 07:24:03','2012-12-27 07:24:03'),(7,'6,000 - 6,900','2012-12-27 07:24:03','2012-12-27 07:24:03'),(8,'7,000 - 7,900','2012-12-27 07:24:03','2012-12-27 07:24:03'),(9,'8,000 - 8,900','2012-12-27 07:24:03','2012-12-27 07:24:03'),(10,'9,000 - 9,900','2012-12-27 07:24:03','2012-12-27 07:24:03'),(11,'10,000 - 11,900','2012-12-27 07:24:03','2012-12-27 07:24:03'),(12,'12,000 - 14,900','2012-12-27 07:24:03','2012-12-27 07:24:03'),(13,'15,000 - 19,900','2012-12-27 07:24:03','2012-12-27 07:24:03'),(14,'20,000 - 29,900','2012-12-27 07:24:03','2012-12-27 07:24:03'),(15,'>30,000','2012-12-27 07:24:03','2012-12-27 07:24:03');

/*Table structure for table `users` */

DROP TABLE IF EXISTS `users`;

CREATE TABLE `users` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `email` varchar(128) NOT NULL,
  `password` varchar(100) NOT NULL,
  `nickname` varchar(100) NOT NULL,
  `sex` varchar(2) NOT NULL,
  `ethnic` int(11) NOT NULL,
  `nationality` int(11) NOT NULL,
  `height` int(11) NOT NULL,
  `weight` int(11) NOT NULL,
  `born` int(11) NOT NULL,
  `district` int(11) NOT NULL,
  `marriage` int(11) NOT NULL,
  `living` int(11) NOT NULL,
  `academic` int(11) NOT NULL,
  `school` varchar(10) NOT NULL,
  `major` varchar(10) NOT NULL,
  `industry` int(11) NOT NULL,
  `profession` int(11) NOT NULL,
  `companytype` int(11) NOT NULL,
  `salary` int(11) NOT NULL,
  `blog` varchar(100) NOT NULL,
  `verified` int(11) NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=128 DEFAULT CHARSET=utf8;

/*Data for the table `users` */

insert  into `users`(`id`,`email`,`password`,`nickname`,`sex`,`ethnic`,`nationality`,`height`,`weight`,`born`,`district`,`marriage`,`living`,`academic`,`school`,`major`,`industry`,`profession`,`companytype`,`salary`,`blog`,`verified`,`created_at`,`updated_at`) values (84,'280360865@qq.com','$2a$08$XL6PdtdqcVkWccsIf4oLK.AhbN7BUu8LoQjkPI4kJM7yNp/q.ppoC','保守我心','男',1,1,173,65,1995,13,1,1,7,'上海大学','',2,1,3,7,'',1,'2013-01-03 16:32:26','2013-01-03 16:41:56'),(83,'348926708@qq.com','$2a$08$jhejPAIxqJ94d.BY0XObC.rfAYt5OBdzW37LvOy.ZlkEbFWRgv2de','supernova0625','男',1,14,182,80,1988,13,1,1,6,'交通大学','',9,1,3,4,'',1,'2013-01-03 14:27:53','2013-01-03 14:28:13'),(82,'ningjing101088@163.com','$2a$08$GRdBUpcHxrdp0JeQ4qdWtepN5w5ivUiTa.RV2kIVbtfby5jsFVd0y','Cynthia','女',1,1,160,48,1995,1,1,1,6,'吉首大学','',8,5,4,7,'',1,'2013-01-03 11:36:35','2013-01-03 11:36:51'),(81,'claire_1992@yahoo.cn','$2a$08$cfYV5lpKEV131bocmSPwa./ePyMYxE8my4SBnp/WNvc0qPQhvhFHC','淼淼','女',1,1,159,52,1992,6,1,1,6,'上海大学','',8,5,1,6,'',1,'2013-01-03 09:03:43','2013-01-03 09:04:20'),(80,'traciee@sogou.com','$2a$08$z1sfLIUxPd7j32EBhtTvIOZjrg8T6hhOgv3NxvROYmPn58USTmGQ6','渺渺','女',1,1,159,53,1992,7,1,1,6,'上海大学','',8,5,1,5,'',0,'2013-01-03 08:52:31','2013-01-03 08:52:31'),(79,'yufabulous@qq.com','$2a$08$y3xo3mDmttA6UXkz6.7g6ufcQ75PJyyF52Es2O8SZKsdW21hrfumC','谷中百合','女',1,11,156,48,1983,15,2,1,6,'华盛顿州立大学','',4,10,1,7,'',1,'2013-01-02 19:31:50','2013-01-02 19:32:48'),(78,'wuhao19850118@163.com','$2a$08$iZ8c0HBS.yQIB50OnZlEy.dyzy0pr5A3o.xHd4HIRKWjzfUaIZ4jW','北树','男',1,1,183,80,1985,13,1,3,7,'南开大学','',8,14,6,12,'',1,'2013-01-02 14:50:40','2013-01-02 14:52:43'),(77,'kaiye9632@sina.com','$2a$08$NZ9OZ1.i2FsLr7xQTKO3JOYQwnvKLw1cQcpqz5TSFPoLhFFTspKjm','Well constant','男',1,1,170,68,1995,1,1,2,6,'浙江工商大学','',3,4,1,1,'',1,'2013-01-02 14:34:50','2013-01-02 14:43:02'),(76,'rinktang@gmail.com','$2a$08$OoutQMfZSfG5cx2XGFQPQuvpsL4sdETefjQwdzzhxHhczeqmybV/.','rink','男',1,1,168,70,1982,13,1,2,7,'...','',8,14,1,12,'',1,'2013-01-01 23:36:16','2013-01-01 23:48:06'),(75,'temp50003@126.com','$2a$08$MCS73YpZpcFk.hukqpdNK.n/OKSCibJsvKCQQFGCBoKq.RY.NDFB6','tp','男',1,1,180,70,1995,1,1,1,1,'fd','',1,1,1,1,'',1,'2013-01-01 19:56:47','2013-01-01 19:57:19'),(74,'kd.xing@qq.com','$2a$08$SMAyuSiuaatBfRpXCpm72OHNDashL4ZJnl7Mk6THm2rWM6dXUJrrW','sflove','男',1,1,175,67,1995,1,1,1,7,'华南理工大学','',1,1,1,7,'',1,'2013-01-01 09:41:47','2013-01-01 09:42:26'),(73,'feilanjizi@126.com','$2a$08$4uXOFkeb73NR9BttACPosOSgUEteVoWgpt0v208.kKR58g5nMq5wO','紫意','女',1,28,160,50,1985,13,1,2,7,'吉林大学','',2,2,1,6,'',1,'2012-12-31 18:47:59','2012-12-31 18:48:46'),(72,'1045703711@qq.com','$2a$08$a9eeyS7mHjhETz.biDBtjuljBL1vOPc3Fi22CJcT1HBhnbIkLKIAW','YICI','女',1,1,170,52,1990,10,1,1,6,'上海师范大学天华学院','',9,2,4,4,'',1,'2012-12-31 10:25:03','2012-12-31 10:33:08'),(71,'tujiaming@gmail.com','$2a$08$dQHNrW96cuzlwy8Amkc02OXrzSOp7Ui27yi0hUlmkKCpX23sv0e12','docarring','男',1,18,172,73,1984,13,1,2,6,'中南财大','',11,3,4,12,'',1,'2012-12-31 00:25:53','2012-12-31 00:27:12'),(70,'ming_1279@163.com','$2a$08$hXmeILyWjbaxpEpumGRja.BXQOoz7MvSvg.dg9TxfSqKIl2dPnU1i','luke','男',1,2,168,60,1995,13,1,2,7,'中科院','',17,1,6,1,'',1,'2012-12-30 21:33:22','2012-12-30 21:37:24'),(69,'lujiaqinghome@126.com','$2a$08$zpvwm5Rw0WGKDwsDE/2k0O5pwhqxnsQ1IL4QPpxI1HzgvGvTpEguC','愿得一人','男',1,1,180,80,1985,5,1,1,6,'上海金融学院','',17,5,6,5,'',1,'2012-12-30 18:42:10','2012-12-30 18:42:42'),(68,'kekegou31@yahoo.com.cn','$2a$08$zUNK2AmYpawPGwPDjZwY3uzMHrSR/nWhk3sFNGvKQpji78kWmxn.K','优优','女',1,1,162,50,1983,4,1,2,7,'smu','',7,9,6,6,'',1,'2012-12-30 18:25:51','2012-12-30 18:28:57'),(67,'comeacross2012@126.com','$2a$08$u1O4/MWCqr8ep3q5/mpGzuXPycPeh1WVKVEJ9zbsCDzMAlmrupKCq','中分头','男',1,1,158,49,1995,1,1,1,7,'华东师范大学','',20,1,1,1,'',1,'2012-12-30 16:20:32','2012-12-30 16:21:15'),(66,'its4myself@hotmail.com','$2a$08$1ROdOJOabgPcwxHTx8jkN.Gvcx.Fe.6ODF47nGa3zfsNGSdivsLhe','pippo','男',1,1,178,56,1995,1,1,1,6,'上海大学','',17,16,5,9,'',0,'2012-12-30 14:55:37','2012-12-30 14:55:37'),(65,'ivan_chenyuwen@126.com','$2a$08$/o4er7qhsApLI3rnULG6Pu6ibj.uy1hcmFQSnp.zsML350K5dmnUu','小文子','男',1,1,180,80,1995,1,1,1,1,'上海理工大学','',1,1,1,1,'',1,'2012-12-30 14:03:40','2012-12-30 14:03:58'),(64,'793070637@qq.com','$2a$08$2vvNJWDU/fBuSivTxAY8yuobUmbN7Hj81DR75dBT10EGTIH7GXqv2','不是猛犸象','男',1,1,168,58,1995,13,1,2,6,'苏州大学','',1,1,1,9,'',1,'2012-12-29 21:57:02','2012-12-29 21:57:27'),(63,'wuyun-tysr@163.com','$2a$08$DQnJuM1Nzyv4/KmvH9q6yOG.esnPaMFswcddPjTJ7fjLguyLO4Hci','FAUST','男',1,1,176,72,1995,1,1,1,1,'北京师范大学','',1,1,1,1,'',0,'2012-12-29 21:45:57','2012-12-29 21:45:57'),(62,'loveluhaidong@sina.com','$2a$08$zQ94ZlEN9CCHl1qJLZqiRObGDbPLxwI0cD9JncQ4oPhIoPvDw0ocG','陪你去看看风','男',1,1,175,66,1995,1,1,1,1,'上海师范大学','',2,1,1,1,'',1,'2012-12-29 20:50:29','2012-12-29 20:53:35'),(61,'greenzzh@hotmail.com','$2a$08$/2khdD3BVReR6MkaQR5Z4u3G2qGp5rn2msCGt5dgyDP7aaKaWO5I.','万里独行侠','男',1,35,175,71,1989,4,1,2,6,'上海某大学','',1,1,1,11,'',1,'2012-12-29 19:45:08','2012-12-29 19:54:04'),(60,'410522082@qq.com','$2a$08$/blyQvANCjegxpziqv6fCObEgtlwYQovUaoCdt.47eJLnCF91X/Bq','smiley','女',1,1,160,46,1995,1,1,1,1,'上海师范大学','',20,19,8,1,'',1,'2012-12-29 17:56:23','2012-12-29 17:57:03'),(57,'beata_cao@163.com','$2a$08$lco8O8yleXKgBFGko8cGreJHc0hvgTa3.6t/vp0z4bdYk3claz3UO','小雨燕','女',1,1,175,67,1990,1,1,1,1,'北京理工大学','',1,1,1,7,'',1,'2012-12-29 11:56:13','2013-01-07 18:05:19'),(56,'561887370@qq.com','$2a$08$d6rHAVlkk3vv6V6sS71HtuzQ29KU89B9nTfKKZxHekZzU0JLseWVO','ok哥好牛啊','男',1,1,165,50,1995,1,1,1,1,'222','',1,1,1,1,'',0,'2012-12-29 11:53:07','2012-12-29 11:53:07'),(55,'446146366@qq.com','$2a$08$EPQARMwhDufmEphOpPva3er/XUnLgyt1qwM0lg2a88Bd8sJ2NvibG','mot','男',1,1,171,68,1995,1,1,1,1,'武汉工程大学邮电与信','',1,1,1,1,'',1,'2012-12-29 11:53:03','2012-12-29 22:06:16'),(54,'837351885@qq.com','$2a$08$p7fidbx1/hWZbZYktcHN/eYwNIr8TCfOuFFVDbrxMDBiQRmMRHb0K','Shayne','男',1,1,180,70,1991,11,1,3,6,'Lixin','',8,14,3,12,'',1,'2012-12-29 10:10:14','2013-01-01 13:28:52'),(53,'alecksun@163.com','$2a$08$x1SNea8Sk4eu6Vx/I9N13uk6Mzibk82D75jIyzBn1owh3aEJM8nt2','大腿哥哥','男',1,1,180,72,1988,13,1,1,6,'南京农业大学','',13,1,1,4,'',0,'2012-12-28 21:50:48','2012-12-29 13:36:17'),(52,'cheristorm@hotmail.com','$2a$08$a3C250AW2lz5Ww4rHyXwq.u92pu2nY/aZfd7VbfUWWwWp09wN/nDm','糖醋小排','男',1,1,176,70,1990,4,1,1,1,'家里蹲','',1,1,1,1,'',1,'2012-12-28 13:13:37','2012-12-28 13:16:18'),(48,'yj1197680946@qq.com','$2a$08$WaZIRCa7DAZzuPViS9N3fOHy7bt7pRV4lUaoN2gyB0XSS6yy7w6qC','NONO妖小精','男',1,1,175,55,1990,6,1,1,5,'上海电力学院','',13,4,1,4,'',0,'2012-12-28 08:23:06','2012-12-28 08:23:06'),(47,'after_rain829@126.com','$2a$08$ZJTmVOH6CSvpTarZvskTfOJ5ocWYapeQhI9lxwxkdvDMUgMfNltAO','Refine','女',1,1,152,45,1989,2,1,1,6,'上外','',20,6,3,4,'',2,'2012-12-28 02:08:01','2012-12-28 09:57:36'),(46,'ahlilee@hotmail.com','$2a$08$9rn0xUiQe/sNNL51nyvSc.KZXXLSt0jfsO7s0TVsxTEG5SHL79RR.','Lee','女',1,1,168,52,1995,1,1,1,1,'荆州师院','',3,20,1,1,'',0,'2012-12-28 01:50:40','2012-12-28 01:50:40'),(59,'2814258914@qq.com','$2a$08$XbsPjIf21z1Kh4fOyTQJZuOu/GQdwpa3qLi7ReTyx6Bw3TSGH5fjK','phx','男',1,1,176,78,1983,1,1,1,6,'同济大学','',12,3,2,9,'',2,'2012-12-29 13:28:40','2013-01-30 17:15:37'),(44,'870548924@qq.com','$2a$08$2ufwaWYae8ti2FlMiVugO.dvXPimons0XnQZpGKufHjB19eeWFYGa','乐乐','男',1,1,178,65,1990,1,1,1,5,'中央音乐学院网络教育','',7,9,4,4,'',0,'2012-12-27 14:49:20','2012-12-27 14:49:20'),(51,'wyzselina@Yahoo.com.cn','$2a$08$33e8YcKDKAgox5ltHX/km.q0.49dfBhCekVL0GxbkKL0SuroBNniy','尼扣','男',1,1,181,60,1987,13,1,1,5,'电子信息','',12,1,3,4,'',1,'2012-12-28 08:50:36','2012-12-28 09:26:59'),(43,'1609357192@qq.com','$2a$08$yj7WUQC1KSgrgwovSlz6KOGBQYV0LgFeAvN.0XVVVgb8wwfQaUyRK','冬天的微凉君','男',1,1,179,65,1991,13,1,1,6,'上海第二医科大学','',11,1,6,1,'',2,'2012-12-27 13:27:22','2012-12-28 08:54:53'),(41,'381391849@qq.com','$2a$08$0vk7xiboKfyWm/Pk2SMsF..PZBxaUI7piNwh8UuaM3jr3zw0P/z1u','Januaryoo','男',1,1,180,75,1989,7,1,1,6,'同济大学','',9,1,1,7,'',2,'2012-12-27 10:05:22','2012-12-28 10:10:56'),(42,'tankzhang007@163.com','$2a$08$GArOvI/d3fGGUmgD8dek6OdFxvA7iRuBjnAg/x/0j4pPaUrL4a//O','克拉普逊','男',1,1,184,85,1995,1,1,1,6,'上海大学','',8,14,4,14,'',2,'2012-12-27 12:07:26','2012-12-29 15:39:41'),(85,'duduyunyun@yahoo.cn','$2a$08$63uwMxsaubqMBVv4D1ENJel4ElNd7r/ZLi4lwUQDJQNn7ezK/QePK','Iris','女',1,1,163,55,1990,11,1,1,6,'SWJTU','',7,3,4,4,'',1,'2013-01-04 00:02:51','2013-01-04 00:09:31'),(86,'1332816081@qq.com','$2a$08$bKypokWUkbxEfUm4jPm3muUQ4xtSF5UQQpRqHNhpL1MauYJ9cXvYK','蛋疼到淡定','男',1,1,176,70,1985,1,1,1,1,'上大','',1,1,1,1,'',1,'2013-01-04 09:37:40','2013-01-04 09:38:04'),(87,'afjaeoijfoef@fjaewojf.com','$2a$08$UVcaqUH9cLjycE5AeGy4.eRtG5oizLGrLVPjLEXE.gpAwZkoidY6u','fjeaowifjaoifh','男',1,1,166,66,1988,1,1,1,4,'eawfeafewa','',1,1,1,1,'',0,'2013-01-04 12:41:51','2013-01-04 12:41:51'),(88,'mako_cxh@163.com','$2a$08$mr59tukHXC6xstQXrh1Pte1.S0hihpODctD6E79WZMbtB1.ToOmKW','mako','女',1,1,156,44,1980,10,1,1,6,'上海工程技术大学','',3,6,1,6,'weibo.com/makochen',2,'2013-01-04 15:38:44','2013-01-05 11:22:23'),(89,'jennysheng@msn.com','$2a$08$YqfsRjKzWSzgq.GzcR.KM.a1mk95EUVofw90JuixqXhDHiiou/1Yu','JN','女',1,1,166,52,1982,4,1,1,6,'外贸学院','',12,10,1,9,'',0,'2013-01-05 00:54:51','2013-01-05 00:54:51'),(90,'lex_zjs@163.com','$2a$08$l4RlxCnKjcySNE14aq/xGO3fp1q3vsB/m9LJBE0ttaup32hZzbUuq','最后的郊狼','男',1,1,170,60,1989,9,1,1,6,'上师大','土木工程',9,1,3,3,'',1,'2013-01-05 23:13:32','2013-01-05 23:19:33'),(91,'mjrmzm@hotmail.com','$2a$08$tTasuWkkpVIMKkLKFr6JZ.4Xv9G2Up/bYV/yNXX.lDiEVsXxeLGvy','马桶','男',1,1,170,70,1982,11,1,3,7,'巴黎九大','',8,4,3,14,'',0,'2013-01-06 12:32:23','2013-01-06 12:32:23'),(92,'asfefer@163.com','$2a$08$h5FCF62A52gsa85By3J5QOR5h5HgQrx73kXkv59yJ3X1yBw9fivPm','asfefer','男',1,1,170,60,1995,1,1,1,1,'asfefer','',1,1,1,1,'',0,'2013-01-06 19:31:41','2013-01-06 19:31:41'),(93,'dashadankk@sina.com','$2a$08$maNr2hidYfzHl/43SjZKE.VPu/TF4uII7ZYgcVW.IuQi/d6cpsmXe','叶小满','男',1,1,172,65,1989,4,1,1,6,'华东政法大学','',20,11,3,6,'',1,'2013-01-06 19:50:40','2013-01-06 19:51:08'),(94,'417016656@qq.com','$2a$08$2QCMwQKg1YzgJbSFiNa3ee73JbCEIGpnqBvKayr3cc6B7dfJoxWL6','BIG笨','男',1,1,170,60,1986,11,1,1,3,'江南技校','',5,1,2,4,'',1,'2013-01-06 21:04:53','2013-01-06 21:05:28'),(95,'carrodhaha@163.com','$2a$08$hSbKQl.AaG6ofH79e7gw7edej8GUo8WHUIvuOsTzLs8VqrPwTiCEW','Carrod','男',1,1,178,65,1995,1,1,1,1,'SN','',1,1,1,1,'',1,'2013-01-07 13:59:33','2013-01-07 14:00:17'),(96,'zjq880408@163.com','$2a$08$ALhd/YQUjfT5LQwrmRyOjepZZs5CUQz/1yR6nCZUc3mk5FfZc85g6','super doudou','女',1,1,160,50,1988,3,1,1,6,'上海大学','',12,5,3,6,'',1,'2013-01-08 10:45:31','2013-01-08 10:46:29'),(97,'526477534@qq.com','$2a$08$xmcTVrC9wuXBCzH2p2Va3eDyBtr/xRw2QbiV9T0SAhkMUhFPzpC/.','羊尼玛','男',1,1,168,63,1986,13,1,1,6,'海洋大学','',17,20,5,6,'',1,'2013-01-08 12:34:33','2013-01-08 12:38:44'),(98,'wangdai1990@hotmail.com','$2a$08$4s9d97R/5WNoFE39s2qzJu.NxWVxVlSDi8TD4Wmw5H1pNKiOu6PAy','Gobicy','男',1,1,175,90,1995,1,1,1,6,'上理工','',1,1,1,5,'',2,'2013-01-09 00:09:19','2013-01-09 00:19:44'),(99,'cbcool91@126.com','$2a$08$4znXtHM.wtqHJ6IJfc7htuIKuR5hDTcRUyez70ocxFqJ7fVNf4Som','canny','男',1,1,180,70,1995,1,1,1,1,'上海交大','',1,1,1,1,'',0,'2013-01-09 18:44:55','2013-01-09 18:44:55'),(100,'jhon-yuk@live.cn','$2a$08$7T/olKoH6LG6pyx0p1g1OuoUDOAm1cYnI8kSoE4ASF3JT5JB/Riy6','禾子天水','男',1,11,175,63,1995,13,1,1,7,'The Univer','',20,1,8,1,'',2,'2013-01-10 06:05:38','2013-01-10 06:06:12'),(101,'ssletong@yahoo.cn','$2a$08$q2DIoHdAgtAiKFxuNjLHPesx/c1BgK/DcdAQ75HIah/axB.v0QD3G','S小瞳','女',1,1,168,55,1990,10,1,1,5,'上外贤达','',8,10,3,4,'',2,'2013-01-10 22:12:23','2013-01-10 22:17:21'),(102,'371602213@qq.com','$2a$08$PkzegfI4ojZw5SdpGvrtweL8D8AQ/KE9uLpkUVjRGybx.nmTe3Cvq','一根冰棍冷到底','男',1,1,178,75,1981,1,1,1,5,'上海大学','',1,1,1,9,'',2,'2013-01-11 19:30:06','2013-01-11 19:30:25'),(103,'778899yk@163.com','$2a$08$od.9h4EgdIhQ0PtPJH48leZaeuXhRW.1ZBKF6NMk7xl3ISmadluuC','池道君','男',1,1,170,58,1989,3,1,2,1,'广外','',17,17,5,5,'',2,'2013-01-12 14:43:41','2013-01-12 14:44:40'),(104,'245685124@qq.com','$2a$08$/nABcPXslgx1d2qZoHilaerGe/l1yl9wptnVUZwCpLOwDOpOcqUma','smiling丶k','男',1,1,185,70,1990,4,1,1,3,'沪东中华技校','',7,18,8,6,'',1,'2013-01-12 23:39:07','2013-01-12 23:39:34'),(105,'0562lala@gmail.com','$2a$08$xvJBSLROOu1.kWRk2mdxnuUfTC.xxNDZ5GHHxNtd2g.R6kNuE4jty','shawndu','男',1,4,178,78,1986,1,1,2,6,'政法','',4,4,3,11,'',1,'2013-01-13 00:02:12','2013-01-13 00:03:01'),(106,'zengyusheng@sina.com','$2a$08$5lPyCW9uod89ePbWoMjk1ex8gqaWs9dTVGMypV5UF6JTIooVWsS/O','方格','男',1,19,163,50,1987,11,1,2,6,'辽科大','',10,3,4,5,'',1,'2013-01-13 14:24:35','2013-01-13 14:43:46'),(107,'yueting1986@gmail.com','$2a$08$f7xVnmNFAKnJHCQ.IHaWC.s6wJOOMhRsQuJIkNY93T2DuTJXsT0o6','Tinsy','女',1,20,166,60,1986,1,1,2,7,'香港中文大学','',4,4,1,9,'',1,'2013-01-18 23:37:14','2013-01-18 23:37:51'),(108,'jialifang@hotmail.com','$2a$08$ha1xe9PWE9aBPlfMrkIq2eVIgWkCsKcch10aP/qKYoiAMAUf3ZXw.','flylily','女',1,1,165,60,1985,13,1,3,6,'华东师范大学','',8,5,1,11,'',0,'2013-01-20 00:22:26','2013-01-20 00:22:26'),(109,'junxingdl@163.com','$2a$08$14BnaWgx5GY3UjDA2XKQOuk0kbmNNSmBru68i8O0ZavWBC/cELImW','乳酸君','男',1,1,180,76,1988,11,1,1,6,'东华','',6,4,4,7,'',1,'2013-01-21 10:49:39','2013-01-21 10:50:32'),(110,'275003537@qq.com','$2a$08$.Orhv4PyaV1zhicPnUxhWeNyZa1KKcGjYgoO9iKedXYW2ZKgIbX0e','jams','男',1,1,183,72,1991,15,1,1,6,'浙江理工','',1,1,1,1,'',1,'2013-01-22 16:16:59','2013-01-22 16:17:21'),(111,'421516398@qq.com','$2a$08$GlTlD4TB2ks/bO9qaiw7nONgHWp/yTuQRr8LhQpsNn1TFYbOYvtKe','纷影浮沉','女',1,12,158,55,1988,15,1,2,7,'英国格拉斯哥大学','',12,5,4,7,'',1,'2013-01-22 16:19:49','2013-01-22 16:20:02'),(112,'comicyii@163.com','$2a$08$iJsKpTFehOWOUDKopoSmj.DCsdn7uwWd2U1rBHG3b0aXSKrr4gawu','夜露湿心','男',1,1,183,78,1995,1,1,1,1,'海洋大学','',1,1,1,9,'',1,'2013-01-22 18:12:58','2013-01-22 18:13:35'),(113,'gzxghost@foxmail.com','$2a$08$HkNr0c.utit.lowKWWRg5O9nniP0fBxdC6KrhcQWPFLcM9Qz5R6VS','MADAo','男',1,1,180,69,1995,1,1,1,1,'上海医药大学','',1,1,1,1,'',1,'2013-01-22 20:09:53','2013-01-22 20:10:16'),(114,'surperman@21cn.com','$2a$08$Gpl5M08ICWsAuYgalzPKNupW13wBmnhPdywxlJRuujWJFjWzqmtz.','双鱼座er','男',1,1,170,56,1987,1,1,1,6,'ECUST','',1,1,3,12,'',1,'2013-01-22 22:03:09','2013-01-22 22:11:53'),(115,'chitian1119@126.com','$2a$08$dA2VnTR1XoIxWQYvMLRf2.zC4bnW/o03I3h73Wdy75dsHYaH7abPG','小线1989','男',1,1,173,60,1995,1,1,1,1,'上海财经法学','',1,1,1,1,'',0,'2013-01-22 23:29:13','2013-01-22 23:29:13'),(116,'KG3322@163.com','$2a$08$MZb/sataa4N5gTE2uRYi1uzTWI0gPnbGLGHxcP3Dld8Md6OmL3RX.','KG32','男',1,19,183,85,1991,11,1,2,6,'沈阳药科','',11,1,8,1,'',1,'2013-01-24 10:06:16','2013-01-24 10:06:52'),(117,'chujg2007@163.com','$2a$08$jCwEXdyxmg.NrhPh3.LBaOq/2G8HL80zFTwpzhuxrOPQYipMm4p1.','借酒温书','男',1,1,178,70,1987,1,1,2,7,'上海大学','',1,1,1,9,'',1,'2013-01-24 20:10:32','2013-01-24 20:11:08'),(118,'sdjzhousong@hotmail.com','$2a$08$afwf79.BT4vsqDKX1cxfqeDERxk/hrL.TlqWSqK0R.qhhHqI5MG/y','Rio','男',1,1,170,65,1988,11,1,1,6,'SDJU','',20,4,1,1,'',1,'2013-01-24 20:42:37','2013-01-24 20:55:00'),(119,'chloe_BYW@163.com','$2a$08$ALcoq7P3yQBROCSWWQNYV.52JTTmtUXPFkS/E.60Vikw2c5QiES7a','Lavender','女',1,1,163,50,1990,9,1,1,6,'shnu','',3,4,1,8,'',0,'2013-01-24 22:16:30','2013-01-24 22:16:30'),(120,'lorrine.zheng@gmail.com','$2a$08$VqwT.MsOnCj1wSO2jA38xuqIHyCsS1HdtDIaMo2DVqip.WSM74WL.','lorrine','女',1,11,161,48,1985,3,1,2,6,'武汉理工大','',4,1,1,10,'',1,'2013-01-25 23:05:18','2013-01-26 08:21:51'),(121,'373551129@qq.com','$2a$08$tDQHRpOZQ8GuxuwkWwSBceuXTYswx3iTF6qS35FYwoY.TkxeuXHra','zerofl','女',1,1,164,48,1989,15,1,1,6,'华东理工大学','',10,1,2,4,'',1,'2013-01-26 22:00:19','2013-01-26 22:01:30'),(122,'499272898@qq.com','$2a$08$ZqMb8oADdW3pVt4F/PXqpOQ0i4dfzt5OgIFDPB7QOf9.yktDNfcvO','小雨点儿','女',1,1,165,48,1990,11,1,1,6,'上海海事大学','',12,15,1,5,'',1,'2013-01-28 13:10:43','2013-01-28 13:11:00'),(123,'bmwm3gtre46@126.com','$2a$08$Q5Bx3zeHb0GzABLJQgg6GOfvePaDb5xNTR3CrIMT/OaYQwlaoLurW','emok','男',1,1,172,78,1995,1,1,1,1,'上海电力','',1,1,1,1,'',1,'2013-01-28 14:16:01','2013-01-28 14:17:32'),(124,'pyhxl@2008.sina.com','$2a$08$kPdlfVwteDYxbWjZOVpCdumNgBbYpIxEEXa1QP0nO37z3aDUrbWlW','lueiluei','女',1,17,160,48,1989,10,1,2,7,'上海师大','',20,20,8,1,'',1,'2013-01-29 17:25:24','2013-01-29 17:26:26'),(125,'ajifejaifj@fjaoeijfoae.com','$2a$08$dL078I0g3YcsVLksqntqZ.Sr.HATZXNQUFb4Nr6G/Rg0z3Mmxzsxe','jfioajfoeaijf','男',1,1,188,88,1995,1,1,1,1,'jijoijoijo','',1,1,1,1,'',0,'2013-01-30 17:18:27','2013-01-30 17:18:27'),(126,'121212132132@jfeiowajofi.com','$2a$08$CiCZ.jVPg5kI.JZ.cvTZKes8/zY9B/s.dNkaS7sUDbx.SVuOcSyW.','jfaoijfoeiawfj','男',1,1,188,88,1995,1,1,1,1,'feawfafe','',1,1,1,1,'',0,'2013-01-30 17:35:13','2013-01-30 17:35:13'),(127,'zhang_yu6174@yahoo.com.cn','$2a$08$d4D76DlYinTvA.0Jxg5G5edjbbOcYfrjBCwzuzLemwx/66Oc/lezK','莫小米','女',1,1,163,49,1987,1,1,2,6,'sisu','',3,15,1,8,'',1,'2013-02-07 22:02:04','2013-02-07 22:11:34');

/*Table structure for table `users_pw` */

DROP TABLE IF EXISTS `users_pw`;

CREATE TABLE `users_pw` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) DEFAULT NULL,
  `user_pw` varchar(30) DEFAULT NULL,
  `user_email` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

/*Data for the table `users_pw` */

insert  into `users_pw`(`id`,`user_id`,`user_pw`,`user_email`) values (1,126,'jiji11','121212132132@jfeiowajofi.com'),(2,127,'MONIKA1987','zhang_yu6174@yahoo.com.cn');

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
