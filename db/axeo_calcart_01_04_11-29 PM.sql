# ************************************************************
# Sequel Pro SQL dump
# Version 4135
#
# http://www.sequelpro.com/
# http://code.google.com/p/sequel-pro/
#
# Host: localhost (MySQL 5.5.34)
# Database: axeo_calcart
# Generation Time: 2015-04-01 16:29:58 +0000
# ************************************************************


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;


# Dump of table cart_profiles
# ------------------------------------------------------------

DROP TABLE IF EXISTS `cart_profiles`;

CREATE TABLE `cart_profiles` (
  `tenant_id` int(11) unsigned NOT NULL,
  `address1` varchar(500) COLLATE utf8_unicode_ci NOT NULL,
  `address2` varchar(500) COLLATE utf8_unicode_ci NOT NULL,
  `zip_code` mediumint(6) unsigned DEFAULT NULL COMMENT 'postal code',
  `phone` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `about` text COLLATE utf8_unicode_ci NOT NULL COMMENT 'About me',
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `image` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`tenant_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

LOCK TABLES `cart_profiles` WRITE;
/*!40000 ALTER TABLE `cart_profiles` DISABLE KEYS */;

INSERT INTO `cart_profiles` (`tenant_id`, `address1`, `address2`, `zip_code`, `phone`, `about`, `updated_at`, `image`)
VALUES
	(1,'','',NULL,'','','2015-02-12 18:37:33',NULL),
	(2,'','',NULL,'','','2015-02-12 19:35:21',NULL),
	(3,'','',NULL,'','','2015-02-16 01:58:06',NULL),
	(4,'','',NULL,'','','2015-03-06 05:12:05',NULL),
	(5,'','',NULL,'','','2015-03-06 16:50:35',NULL),
	(6,'Address1','Address2',70000,'123456789','adsfa','2015-04-01 23:23:54','65CPVj6gFomtGzGdz1P3KeWxe_aIjrrB.png');

/*!40000 ALTER TABLE `cart_profiles` ENABLE KEYS */;
UNLOCK TABLES;



/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
