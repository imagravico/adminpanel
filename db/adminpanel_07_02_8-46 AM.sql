# ************************************************************
# Sequel Pro SQL dump
# Version 4135
#
# http://www.sequelpro.com/
# http://code.google.com/p/sequel-pro/
#
# Host: localhost (MySQL 5.5.34)
# Database: adminpanel
# Generation Time: 2015-02-07 01:46:47 +0000
# ************************************************************


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;


# Dump of table activities
# ------------------------------------------------------------

DROP TABLE IF EXISTS `activities`;

CREATE TABLE `activities` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(255) DEFAULT NULL,
  `content` text,
  `users_id` int(11) DEFAULT NULL,
  `reminder` smallint(6) DEFAULT NULL,
  `come_date` datetime DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

LOCK TABLES `activities` WRITE;
/*!40000 ALTER TABLE `activities` DISABLE KEYS */;

INSERT INTO `activities` (`id`, `title`, `content`, `users_id`, `reminder`, `come_date`, `created_at`, `updated_at`)
VALUES
	(18,'Meeting woooo','drink up!!! Ha ha',1,1,'2015-02-28 15:04:00','2015-02-05 15:05:30','2015-02-05 15:05:30'),
	(19,'Meeting woooo','drink up!!! Ha ha',1,1,'2015-02-28 15:04:00','2015-02-05 15:05:30','2015-02-05 15:05:30'),
	(20,'zooo','zooooooozozoozoz',1,1,'2015-02-20 15:06:30','2015-02-05 15:06:36','2015-02-05 15:06:36'),
	(21,'woa.z.z.z','<span>essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</span>',1,0,'2015-02-25 15:14:45','2015-02-05 15:09:11','2015-02-05 15:09:11'),
	(22,'woa.z.z.z','<span>essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</span>',1,0,'2015-02-25 15:14:45','2015-02-05 15:09:11','2015-02-05 15:09:11'),
	(23,'woa.z.z.z','<span>essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</span>',1,0,'2015-02-25 15:14:45','2015-02-05 15:09:11','2015-02-05 15:09:11'),
	(24,'woa.z.z.z','<span>essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</span>',1,0,'2015-02-25 15:14:45','2015-02-05 15:09:11','2015-02-05 15:09:11'),
	(25,'woa.z.z.z','<span>essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</span>',1,0,'2015-02-25 15:14:45','2015-02-05 15:09:11','2015-02-05 15:09:11'),
	(31,'Opp oh!!!','what\'s the hell?',1,0,'2015-02-11 16:38:15','2015-02-05 16:38:37','2015-02-05 16:38:37'),
	(39,'asdf','<img src=\"http://adminpanel.me/web/backend/img/placeholders/photos/photo6.jpg\" title=\"Image: http://adminpanel.me/web/backend/img/placeholders/photos/photo6.jpg\"><br>',1,1,'2015-02-12 17:06:15','2015-02-05 17:07:22','2015-02-05 17:07:22'),
	(40,'abc','<img src=\"http://adminpanel.me/web/backend/img/placeholders/photos/photo6.jpg\" title=\"Image: http://adminpanel.me/web/backend/img/placeholders/photos/photo6.jpg\">',1,1,'2015-02-11 08:54:15','2015-02-06 08:54:56','2015-02-06 08:54:56'),
	(41,'abc','<img src=\"http://adminpanel.me/web/backend/img/placeholders/photos/photo6.jpg\" title=\"Image: http://adminpanel.me/web/backend/img/placeholders/photos/photo6.jpg\">',1,1,'2015-02-11 08:54:15','2015-02-06 08:54:57','2015-02-06 08:54:57');

/*!40000 ALTER TABLE `activities` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table auth_assignment
# ------------------------------------------------------------

DROP TABLE IF EXISTS `auth_assignment`;

CREATE TABLE `auth_assignment` (
  `item_name` varchar(64) COLLATE utf8_unicode_ci NOT NULL,
  `user_id` varchar(64) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` int(11) DEFAULT NULL,
  PRIMARY KEY (`item_name`,`user_id`),
  CONSTRAINT `auth_assignment_ibfk_1` FOREIGN KEY (`item_name`) REFERENCES `auth_item` (`name`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

LOCK TABLES `auth_assignment` WRITE;
/*!40000 ALTER TABLE `auth_assignment` DISABLE KEYS */;

INSERT INTO `auth_assignment` (`item_name`, `user_id`, `created_at`)
VALUES
	('Admin','1',1422346106),
	('User','1',1422694842),
	('User','10',1422347828),
	('User','11',1422525943),
	('User','12',1422525973),
	('User','2',1422346123),
	('User','21',1422524700),
	('User','3',1422347758),
	('User','4',1422347779),
	('User','5',1422347813),
	('User','6',1422347817),
	('User','7',1422347820),
	('User','8',1422347823),
	('User','9',1422347825);

/*!40000 ALTER TABLE `auth_assignment` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table auth_item
# ------------------------------------------------------------

DROP TABLE IF EXISTS `auth_item`;

CREATE TABLE `auth_item` (
  `name` varchar(64) COLLATE utf8_unicode_ci NOT NULL,
  `type` int(11) NOT NULL,
  `description` text COLLATE utf8_unicode_ci,
  `rule_name` varchar(64) COLLATE utf8_unicode_ci DEFAULT NULL,
  `data` text COLLATE utf8_unicode_ci,
  `created_at` int(11) DEFAULT NULL,
  `updated_at` int(11) DEFAULT NULL,
  PRIMARY KEY (`name`),
  KEY `rule_name` (`rule_name`),
  KEY `idx-auth_item-type` (`type`),
  CONSTRAINT `auth_item_ibfk_1` FOREIGN KEY (`rule_name`) REFERENCES `auth_rule` (`name`) ON DELETE SET NULL ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

LOCK TABLES `auth_item` WRITE;
/*!40000 ALTER TABLE `auth_item` DISABLE KEYS */;

INSERT INTO `auth_item` (`name`, `type`, `description`, `rule_name`, `data`, `created_at`, `updated_at`)
VALUES
	('/activities/*',2,NULL,NULL,NULL,1423121081,1423121081),
	('/admin/*',2,NULL,NULL,NULL,1422346008,1422346008),
	('/admin/assignment/*',2,NULL,NULL,NULL,1422346008,1422346008),
	('/admin/assignment/assign',2,NULL,NULL,NULL,1422346008,1422346008),
	('/admin/assignment/index',2,NULL,NULL,NULL,1422346008,1422346008),
	('/admin/assignment/role-search',2,NULL,NULL,NULL,1422346008,1422346008),
	('/admin/assignment/view',2,NULL,NULL,NULL,1422346008,1422346008),
	('/admin/default/*',2,NULL,NULL,NULL,1422346008,1422346008),
	('/admin/default/index',2,NULL,NULL,NULL,1422346008,1422346008),
	('/admin/menu/*',2,NULL,NULL,NULL,1422346008,1422346008),
	('/admin/menu/create',2,NULL,NULL,NULL,1422346008,1422346008),
	('/admin/menu/delete',2,NULL,NULL,NULL,1422346008,1422346008),
	('/admin/menu/index',2,NULL,NULL,NULL,1422346008,1422346008),
	('/admin/menu/update',2,NULL,NULL,NULL,1422346008,1422346008),
	('/admin/menu/view',2,NULL,NULL,NULL,1422346008,1422346008),
	('/admin/permission/*',2,NULL,NULL,NULL,1422346008,1422346008),
	('/admin/permission/assign',2,NULL,NULL,NULL,1422346008,1422346008),
	('/admin/permission/create',2,NULL,NULL,NULL,1422346008,1422346008),
	('/admin/permission/delete',2,NULL,NULL,NULL,1422346008,1422346008),
	('/admin/permission/index',2,NULL,NULL,NULL,1422346008,1422346008),
	('/admin/permission/role-search',2,NULL,NULL,NULL,1422346008,1422346008),
	('/admin/permission/update',2,NULL,NULL,NULL,1422346008,1422346008),
	('/admin/permission/view',2,NULL,NULL,NULL,1422346008,1422346008),
	('/admin/role/*',2,NULL,NULL,NULL,1422346008,1422346008),
	('/admin/role/assign',2,NULL,NULL,NULL,1422346008,1422346008),
	('/admin/role/create',2,NULL,NULL,NULL,1422346008,1422346008),
	('/admin/role/delete',2,NULL,NULL,NULL,1422346008,1422346008),
	('/admin/role/index',2,NULL,NULL,NULL,1422346008,1422346008),
	('/admin/role/role-search',2,NULL,NULL,NULL,1422346008,1422346008),
	('/admin/role/update',2,NULL,NULL,NULL,1422346008,1422346008),
	('/admin/role/view',2,NULL,NULL,NULL,1422346008,1422346008),
	('/admin/route/*',2,NULL,NULL,NULL,1422346008,1422346008),
	('/admin/route/assign',2,NULL,NULL,NULL,1422346008,1422346008),
	('/admin/route/create',2,NULL,NULL,NULL,1422346008,1422346008),
	('/admin/route/index',2,NULL,NULL,NULL,1422346008,1422346008),
	('/admin/route/route-search',2,NULL,NULL,NULL,1422346008,1422346008),
	('/admin/rule/*',2,NULL,NULL,NULL,1422346008,1422346008),
	('/admin/rule/create',2,NULL,NULL,NULL,1422346008,1422346008),
	('/admin/rule/delete',2,NULL,NULL,NULL,1422346008,1422346008),
	('/admin/rule/index',2,NULL,NULL,NULL,1422346008,1422346008),
	('/admin/rule/update',2,NULL,NULL,NULL,1422346008,1422346008),
	('/admin/rule/view',2,NULL,NULL,NULL,1422346008,1422346008),
	('/clients/*',2,NULL,NULL,NULL,1422607156,1422607156),
	('/dashboard/*',2,NULL,NULL,NULL,1422590546,1422590546),
	('/gii/*',2,NULL,NULL,NULL,1422346008,1422346008),
	('/gii/default/*',2,NULL,NULL,NULL,1422346008,1422346008),
	('/gii/default/action',2,NULL,NULL,NULL,1422346008,1422346008),
	('/gii/default/diff',2,NULL,NULL,NULL,1422346008,1422346008),
	('/gii/default/index',2,NULL,NULL,NULL,1422346008,1422346008),
	('/gii/default/preview',2,NULL,NULL,NULL,1422346008,1422346008),
	('/gii/default/view',2,NULL,NULL,NULL,1422346008,1422346008),
	('/groups/*',2,NULL,NULL,NULL,1422930892,1422930892),
	('/notes/*',2,NULL,NULL,NULL,1423037804,1423037804),
	('/settings/*',2,NULL,NULL,NULL,1423207836,1423207836),
	('/site/*',2,NULL,NULL,NULL,1422346011,1422346011),
	('/site/captcha',2,NULL,NULL,NULL,1422346008,1422346008),
	('/site/error',2,NULL,NULL,NULL,1422346008,1422346008),
	('/site/login',2,NULL,NULL,NULL,1422346008,1422346008),
	('/site/logout',2,NULL,NULL,NULL,1422346008,1422346008),
	('/websites/*',2,NULL,NULL,NULL,1423188668,1423188668),
	('Admin',1,'user belong to this role they can access anywhere :)',NULL,NULL,1422345832,1422525145),
	('User',1,'users belong to this role, they only can access to place where they is allowed ooo',NULL,NULL,1422345897,1422525219);

/*!40000 ALTER TABLE `auth_item` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table auth_item_child
# ------------------------------------------------------------

DROP TABLE IF EXISTS `auth_item_child`;

CREATE TABLE `auth_item_child` (
  `parent` varchar(64) COLLATE utf8_unicode_ci NOT NULL,
  `child` varchar(64) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`parent`,`child`),
  KEY `child` (`child`),
  CONSTRAINT `auth_item_child_ibfk_1` FOREIGN KEY (`parent`) REFERENCES `auth_item` (`name`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `auth_item_child_ibfk_2` FOREIGN KEY (`child`) REFERENCES `auth_item` (`name`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

LOCK TABLES `auth_item_child` WRITE;
/*!40000 ALTER TABLE `auth_item_child` DISABLE KEYS */;

INSERT INTO `auth_item_child` (`parent`, `child`)
VALUES
	('User','/activities/*'),
	('Admin','/admin/*'),
	('Admin','/admin/assignment/*'),
	('User','/clients/*'),
	('User','/dashboard/*'),
	('Admin','/gii/*'),
	('User','/groups/*'),
	('User','/notes/*'),
	('User','/settings/*'),
	('Admin','/site/*'),
	('User','/site/logout'),
	('User','/websites/*');

/*!40000 ALTER TABLE `auth_item_child` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table auth_rule
# ------------------------------------------------------------

DROP TABLE IF EXISTS `auth_rule`;

CREATE TABLE `auth_rule` (
  `name` varchar(64) COLLATE utf8_unicode_ci NOT NULL,
  `data` text COLLATE utf8_unicode_ci,
  `created_at` int(11) DEFAULT NULL,
  `updated_at` int(11) DEFAULT NULL,
  PRIMARY KEY (`name`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;



# Dump of table clients
# ------------------------------------------------------------

DROP TABLE IF EXISTS `clients`;

CREATE TABLE `clients` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `company` varchar(255) NOT NULL,
  `firstname` varchar(255) NOT NULL,
  `lastname` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `birthday` date DEFAULT NULL,
  `avatar` varchar(255) DEFAULT NULL,
  `active` smallint(6) DEFAULT '0',
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

LOCK TABLES `clients` WRITE;
/*!40000 ALTER TABLE `clients` DISABLE KEYS */;

INSERT INTO `clients` (`id`, `company`, `firstname`, `lastname`, `email`, `birthday`, `avatar`, `active`, `created_at`, `updated_at`)
VALUES
	(1,'Barrows Ltd','Irwin','Yost','molly16@hotmail.com','1977-06-07',NULL,0,'2015-02-02 14:18:26',NULL),
	(2,'Champlin-Effertz','Luella','Stiedemann','orutherford@weissnatrolfson.org','1997-04-22',NULL,1,'2015-02-02 14:18:26',NULL),
	(3,'Brekke, Stroman and Mann','Leslie','Flatley','nfritsch@hotmail.com','2005-06-10',NULL,1,'2015-02-02 14:18:26',NULL),
	(4,'Senger-Nikolaus','Tito','Purdy','sarina.parker@yahoo.com','2009-06-23',NULL,0,'2015-02-02 14:18:26',NULL),
	(5,'Kunze, Nicolas and Lubowitz','Mylene','Kshlerin','nico93@yahoo.com','1973-05-24',NULL,1,'2015-02-02 14:18:26',NULL),
	(6,'Russel, DuBuque and Labadie','Sammie','Bayer','champlin.dillan@yahoo.com','2000-03-18',NULL,0,'2015-02-02 14:18:26',NULL),
	(7,'Effertz, Heathcote and Effertz','Mable','Treutel','ewell18@mann.com','2007-04-14',NULL,1,'2015-02-02 14:18:26',NULL),
	(8,'Rohan, Lowe and Sawayn','Ashly','Gislason','allie.parker@mcculloughleffler.com','1976-10-02',NULL,0,'2015-02-02 14:18:26',NULL),
	(9,'Conroy-Lakin','Noble','Barton','larue.pfeffer@raynoradams.info','1995-12-11','',1,'0000-00-00 00:00:00','2015-02-06 16:13:22'),
	(10,'Metz Group','Lura','Herzog','noelia.effertz@cartwrightreynolds.info','2000-10-07','',1,'0000-00-00 00:00:00','2015-02-06 16:13:45'),
	(12,'abc','duong','duong','duong@gmail.com','2015-07-02','dixeSmGVF57HzRps8p3ZAVuE6W0piJba.jpg',1,'2015-02-04 14:07:45','2015-02-04 14:07:45'),
	(13,'aca','hoang','nguyen','hoangnguyen@gmail.com','2015-06-02','pG_MpakzSOGgat1ckVBdWmMQNOZ1t77L.jpg',1,'2015-02-04 22:39:01','2015-02-04 22:39:01');

/*!40000 ALTER TABLE `clients` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table groups
# ------------------------------------------------------------

DROP TABLE IF EXISTS `groups`;

CREATE TABLE `groups` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) DEFAULT NULL,
  `alias` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

LOCK TABLES `groups` WRITE;
/*!40000 ALTER TABLE `groups` DISABLE KEYS */;

INSERT INTO `groups` (`id`, `name`, `alias`)
VALUES
	(1,'Free','free'),
	(2,'Business','business'),
	(3,'Private','private');

/*!40000 ALTER TABLE `groups` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table groups_clients
# ------------------------------------------------------------

DROP TABLE IF EXISTS `groups_clients`;

CREATE TABLE `groups_clients` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `clients_id` int(11) DEFAULT NULL,
  `groups_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

LOCK TABLES `groups_clients` WRITE;
/*!40000 ALTER TABLE `groups_clients` DISABLE KEYS */;

INSERT INTO `groups_clients` (`id`, `clients_id`, `groups_id`)
VALUES
	(1,1,1),
	(2,2,1),
	(3,3,1),
	(4,4,1),
	(5,5,1),
	(6,6,1),
	(7,7,1),
	(8,8,1),
	(182,12,1),
	(183,13,1),
	(184,9,1),
	(185,10,1),
	(186,10,2),
	(187,10,3);

/*!40000 ALTER TABLE `groups_clients` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table migration
# ------------------------------------------------------------

DROP TABLE IF EXISTS `migration`;

CREATE TABLE `migration` (
  `version` varchar(180) NOT NULL,
  `apply_time` int(11) DEFAULT NULL,
  PRIMARY KEY (`version`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

LOCK TABLES `migration` WRITE;
/*!40000 ALTER TABLE `migration` DISABLE KEYS */;

INSERT INTO `migration` (`version`, `apply_time`)
VALUES
	('m150127_050005_user',1422437247),
	('m150127_071203_add_firstname_lastname_to_user',1422437248),
	('m150128_093807_clients',1422439761),
	('m150129_020538_create_websites_table',1422498040),
	('m150129_021245_create_groups_table',1422498040),
	('m150129_021257_create_groups_clients_table',1422498040),
	('m150204_031628_add_notes_table',1423019980),
	('m150204_100210_add_avatar_user_table',1423044210),
	('m150205_025859_activity_table',1423105404),
	('m150205_073523_remove_come_time_field',1423121795),
	('m150206_071714_settings_table',1423207195),
	('m150206_074843_change_type_email_repicent',1423209059);

/*!40000 ALTER TABLE `migration` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table notes
# ------------------------------------------------------------

DROP TABLE IF EXISTS `notes`;

CREATE TABLE `notes` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `content` text,
  `users_id` int(11) DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

LOCK TABLES `notes` WRITE;
/*!40000 ALTER TABLE `notes` DISABLE KEYS */;

INSERT INTO `notes` (`id`, `content`, `users_id`, `created_at`, `updated_at`)
VALUES
	(12,'<strong>Lorem Ipsum</strong><span>&nbsp;is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</span>',1,'2015-02-05 09:40:21','2015-02-05 09:46:29'),
	(13,'please create other client with name which has the following structure : #1[name], #2[name]',1,'2015-02-05 16:07:28','2015-02-05 16:07:28');

/*!40000 ALTER TABLE `notes` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table settings
# ------------------------------------------------------------

DROP TABLE IF EXISTS `settings`;

CREATE TABLE `settings` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `from_name` varchar(255) DEFAULT NULL,
  `from_email` varchar(255) DEFAULT NULL,
  `email_recipient` text,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

LOCK TABLES `settings` WRITE;
/*!40000 ALTER TABLE `settings` DISABLE KEYS */;

INSERT INTO `settings` (`id`, `from_name`, `from_email`, `email_recipient`)
VALUES
	(1,'AdminPanel','dev@berginformatik.ch','[\"dev@berginformatik.ch\",\" hoang@gmail.com \"]');

/*!40000 ALTER TABLE `settings` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table users
# ------------------------------------------------------------

DROP TABLE IF EXISTS `users`;

CREATE TABLE `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(255) NOT NULL,
  `lastname` varchar(255) DEFAULT NULL,
  `firstname` varchar(255) DEFAULT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `token` varchar(255) DEFAULT NULL,
  `auth_key` varchar(255) DEFAULT NULL,
  `avatar` varchar(255) DEFAULT NULL,
  `active` smallint(6) DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

LOCK TABLES `users` WRITE;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;

INSERT INTO `users` (`id`, `username`, `lastname`, `firstname`, `email`, `password`, `token`, `auth_key`, `avatar`, `active`, `created_at`, `updated_at`)
VALUES
	(1,'jaqueline.kuhn','Prohaska','Twila','mcclure.whitney@larson.biz','$2y$13$djseGQlCMk1rHXoRs3gnPubMQ6N9Tl0iZMf3uMXyGyoRKlLtDg2gy','YPeN01ZGwSkaCiljtdk33Rnk9tcmaTLf','hdpv9HozEANeAzYxu98ZE7C2kiqRh_8N','ED1TiJ3HKi2m4l9duARLEGH0DmfsOrnr.jpg',0,NULL,NULL),
	(2,'rex91','Cartwright','Kim','radams@yahoo.com','$2y$13$djseGQlCMk1rHXoRs3gnPubMQ6N9Tl0iZMf3uMXyGyoRKlLtDg2gy','lHqiAMOEhPqX5tx0u-m11f6gJtPOpfi5','wg-jbe41IMJa0rOS8NL0cePSHeqt4l4y',NULL,0,NULL,NULL),
	(3,'kris.sallie','Fadel','Oswaldo','joanne28@gmail.com','$2y$13$djseGQlCMk1rHXoRs3gnPubMQ6N9Tl0iZMf3uMXyGyoRKlLtDg2gy','mExNf77mhYiIV2js9VaA5u0cTeVw8u1H','P0EK9_f32_a3pHVZYRDlSRXACOZHvaSr',NULL,0,NULL,NULL),
	(4,'mercedes82','Anderson','Brendan','powlowski.enid@hotmail.com','$2y$13$djseGQlCMk1rHXoRs3gnPubMQ6N9Tl0iZMf3uMXyGyoRKlLtDg2gy','CXOQOoQxiC13oSSMIdtmNv-pgViJxpkR','cuJ7-yvSIgii9dzf6JSeWMNlJ0a_SZSh',NULL,0,NULL,NULL),
	(5,'satterfield.kristopher','Hessel','Dina','erick.zemlak@gmail.com','$2y$13$djseGQlCMk1rHXoRs3gnPubMQ6N9Tl0iZMf3uMXyGyoRKlLtDg2gy','nt9FQY1h9_AcAXRHZkyHJ4URtL75rYps','TY0sLvM8Ymt_fOAI-gVMjP9JzOEWvOXC',NULL,0,NULL,NULL),
	(6,'ramona75','Parisian','Austin','ykoelpin@yahoo.com','$2y$13$djseGQlCMk1rHXoRs3gnPubMQ6N9Tl0iZMf3uMXyGyoRKlLtDg2gy','0pIbBHPenU8VX6vJlYuQO6Sl3RZw_fnk','JXO50n12OxnwBpbl2Mj538V2OC-36FJD',NULL,1,NULL,NULL),
	(7,'stamm.kariane','Connelly','Tad','lwolff@fritsch.com','$2y$13$djseGQlCMk1rHXoRs3gnPubMQ6N9Tl0iZMf3uMXyGyoRKlLtDg2gy','E-HXnFSCfRxncgefiyBz90oDiXxMVt6X','7GZHSHm8Gao6Ynm-rqOrQIAGvXjT0YE2',NULL,1,NULL,NULL),
	(8,'ethel93','Keebler','Fabian','murl94@gmail.com','$2y$13$djseGQlCMk1rHXoRs3gnPubMQ6N9Tl0iZMf3uMXyGyoRKlLtDg2gy','UZ4Ba7aEe57mI2oA86Ie2BNyVD_yvoGJ','glkoF8UFkmtkzBoccnDyETM1FvG4c3Yt',NULL,1,NULL,NULL),
	(9,'joaquin28','Kassulke','Merle','scormier@hotmail.com','$2y$13$djseGQlCMk1rHXoRs3gnPubMQ6N9Tl0iZMf3uMXyGyoRKlLtDg2gy','M9e3FfjAcqRsj--zkLTRanFJJIiibp6m','FkAfLvS_4w7BkJx-RIRtm2C8Uh8p1oly',NULL,0,NULL,NULL),
	(10,'adfs','11111','adfa','jaqueline.kuhn111@gmail.com','$2y$13$oJLOO4ze4spewWhC85v/oOhpyCuKs1QdtjGrskvIX/YTEVWVyY75a','CPSNzGBzYsh8fDjlsQth8lF1dO9vI-SU','EODtzY0z6pA9RpNb141cyOwDERBFor-U','ED1TiJ3HKi2m4l9duARLEGH0DmfsOrnr.jpg',1,'2015-02-05 09:30:02','2015-02-05 09:30:02');

/*!40000 ALTER TABLE `users` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table websites
# ------------------------------------------------------------

DROP TABLE IF EXISTS `websites`;

CREATE TABLE `websites` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `domain` varchar(255) NOT NULL,
  `online_date` date DEFAULT NULL,
  `active` smallint(6) DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `clients_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

LOCK TABLES `websites` WRITE;
/*!40000 ALTER TABLE `websites` DISABLE KEYS */;

INSERT INTO `websites` (`id`, `domain`, `online_date`, `active`, `created_at`, `updated_at`, `clients_id`)
VALUES
	(1,'jacobs.com','1990-10-10',1,'2015-01-29 03:32:22',NULL,9),
	(2,'douglas.com','1979-03-24',0,'2015-01-29 03:32:22',NULL,4),
	(3,'jacobslabadie.com','1972-08-27',0,'2015-01-29 03:32:22',NULL,4),
	(4,'fritsch.com','1992-07-17',0,'2015-01-29 03:32:22',NULL,10),
	(5,'halvorson.info','1983-11-06',0,'2015-01-29 03:32:22',NULL,2),
	(6,'eichmann.com','1981-07-28',0,'2015-01-29 03:32:22',NULL,7),
	(7,'considine.biz','1996-11-17',1,'2015-01-29 03:32:22',NULL,5),
	(8,'bailey.com','1992-07-13',0,'2015-01-29 03:32:22',NULL,4),
	(9,'konopelski.com','1990-04-22',0,'2015-01-29 03:32:22',NULL,3),
	(10,'hansenvon.net','1982-03-18',0,'2015-01-29 03:32:22',NULL,1),
	(11,'fritsch.org','1976-02-05',0,'2015-01-29 03:32:22',NULL,2),
	(12,'casper.com','2014-06-17',1,'2015-01-29 03:32:22',NULL,2),
	(13,'veum.com','1997-07-27',0,'2015-01-29 03:32:22',NULL,7),
	(14,'gerlach.com','2009-09-25',0,'2015-01-29 03:32:22',NULL,8),
	(15,'walkerwaelchi.com','2013-04-07',0,'2015-01-29 03:32:22',NULL,2),
	(16,'bruen.com','2009-09-16',0,'2015-01-29 03:32:22',NULL,3),
	(17,'mitchell.biz','1974-11-20',1,'2015-01-29 03:32:22',NULL,2),
	(18,'cormierbuckridge.com','1995-04-13',1,'2015-01-29 03:32:22',NULL,9),
	(19,'quigley.com','1973-03-22',1,'2015-01-29 03:32:22',NULL,6),
	(20,'mertz.com','1983-11-27',0,'2015-01-29 03:32:22',NULL,9),
	(21,'lebsack.info','2014-04-26',1,'2015-01-29 03:32:22',NULL,2),
	(22,'hackett.com','2013-12-21',1,'2015-01-29 03:32:22',NULL,5),
	(23,'schiller.biz','2004-05-18',1,'2015-01-29 03:32:22',NULL,8),
	(24,'prosacco.net','1972-07-12',0,'2015-01-29 03:32:22',NULL,2),
	(25,'lang.info','1991-08-09',0,'2015-01-29 03:32:22',NULL,9),
	(26,'brekke.com','1998-02-17',1,'2015-01-29 03:32:22',NULL,6),
	(27,'mohr.biz','1972-10-30',0,'2015-01-29 03:32:22',NULL,1),
	(28,'runtejast.com','2012-03-09',1,'2015-01-29 03:32:22',NULL,4),
	(29,'legros.com','2011-11-25',1,'2015-01-29 03:32:22',NULL,10),
	(30,'mante.com','2010-07-07',1,'2015-01-29 03:32:22',NULL,8),
	(31,'deckow.com','1994-03-09',0,'2015-01-29 03:32:22',NULL,10),
	(32,'walsh.com','2002-09-18',1,'2015-01-29 03:32:22',NULL,6),
	(33,'jones.com','2003-09-30',0,'2015-01-29 03:32:22',NULL,5),
	(34,'hickle.com','1989-12-16',0,'2015-01-29 03:32:22',NULL,4),
	(35,'prosacco.biz','1975-08-26',1,'2015-01-29 03:32:22',NULL,5),
	(36,'johnszieme.com','2002-01-23',1,'2015-01-29 03:32:22',NULL,9),
	(37,'swaniawski.net','1972-09-04',1,'2015-01-29 03:32:22',NULL,4),
	(38,'haagbayer.org','2009-12-11',0,'2015-01-29 03:32:22',NULL,1),
	(39,'pfannerstill.org','2001-02-19',1,'2015-01-29 03:32:22',NULL,3),
	(40,'starkdoyle.com','1974-10-04',0,'2015-01-29 03:32:22',NULL,9),
	(41,'morissettesimonis.net','2014-01-09',0,'2015-01-29 03:32:22',NULL,8),
	(42,'schneiderledner.net','1993-08-15',0,'2015-01-29 03:32:22',NULL,8),
	(43,'ruecker.com','2001-08-05',1,'2015-01-29 03:32:22',NULL,4),
	(44,'hettingerlueilwitz.com','1982-06-07',0,'2015-01-29 03:32:22',NULL,3),
	(45,'emmerich.info','1983-07-03',0,'2015-01-29 03:32:22',NULL,8),
	(46,'pfannerstill.info','1980-01-08',1,'2015-01-29 03:32:22',NULL,8),
	(47,'batzfeil.biz','1983-11-16',0,'2015-01-29 03:32:22',NULL,3),
	(48,'rutherford.com','1975-02-16',0,'2015-01-29 03:32:22',NULL,3),
	(49,'maggio.info','1972-12-14',1,'2015-01-29 03:32:22',NULL,7),
	(50,'roweklocko.org','2013-09-25',0,'2015-01-29 03:32:22',NULL,1),
	(51,'schaefer.biz','1988-07-12',1,'2015-01-29 03:32:22',NULL,6),
	(52,'schaefer.net','1973-03-24',1,'2015-01-29 03:32:22',NULL,8),
	(53,'mcclure.com','1974-06-29',1,'2015-01-29 03:32:22',NULL,3),
	(54,'parisianhermiston.biz','2012-03-07',1,'2015-01-29 03:32:22',NULL,5),
	(55,'hudsonkoss.com','1976-09-11',0,'2015-01-29 03:32:22',NULL,4),
	(56,'moenswift.org','1971-12-27',0,'2015-01-29 03:32:22',NULL,3),
	(57,'will.com','1988-12-27',1,'2015-01-29 03:32:22',NULL,2),
	(58,'klocko.biz','1991-05-29',0,'2015-01-29 03:32:22',NULL,7),
	(59,'swift.info','2001-12-30',0,'2015-01-29 03:32:22',NULL,4),
	(60,'littel.info','2009-06-14',0,'2015-01-29 03:32:22',NULL,1),
	(61,'walsh.net','1979-10-04',1,'2015-01-29 03:32:22',NULL,5),
	(62,'mills.com','2009-09-18',1,'2015-01-29 03:32:22',NULL,6),
	(63,'blockmurphy.com','1989-12-12',0,'2015-01-29 03:32:22',NULL,7),
	(64,'collier.com','1988-03-21',1,'2015-01-29 03:32:22',NULL,6),
	(65,'wolf.com','2001-09-25',0,'2015-01-29 03:32:22',NULL,9),
	(66,'koch.com','1999-01-23',0,'2015-01-29 03:32:22',NULL,5),
	(67,'harber.com','1990-07-24',0,'2015-01-29 03:32:22',NULL,10),
	(68,'dachweissnat.biz','1986-03-19',1,'2015-01-29 03:32:22',NULL,6),
	(69,'hudson.com','1973-07-07',1,'2015-01-29 03:32:22',NULL,1),
	(70,'bashiriandaniel.info','1974-07-07',0,'2015-01-29 03:32:22',NULL,8),
	(71,'stroman.com','1975-12-10',0,'2015-01-29 03:32:22',NULL,2),
	(72,'okon.com','2012-10-13',1,'2015-01-29 03:32:22',NULL,9),
	(73,'gulgowskifeest.com','1979-11-30',0,'2015-01-29 03:32:22',NULL,3),
	(74,'lebsack.com','1987-06-12',0,'2015-01-29 03:32:22',NULL,5),
	(75,'bayer.biz','2004-05-29',1,'2015-01-29 03:32:22',NULL,6),
	(76,'abbott.com','2000-12-23',0,'2015-01-29 03:32:22',NULL,4),
	(77,'schultz.com','2011-12-08',0,'2015-01-29 03:32:22',NULL,5),
	(78,'lubowitzpagac.com','1973-05-09',1,'2015-01-29 03:32:22',NULL,5),
	(79,'purdymann.com','2005-04-27',1,'2015-01-29 03:32:22',NULL,3),
	(80,'fadel.biz','2013-09-29',1,'2015-01-29 03:32:22',NULL,1),
	(81,'brekkebashirian.org','1986-01-10',1,'2015-01-29 03:32:22',NULL,6),
	(82,'willmsebert.info','1986-05-13',0,'2015-01-29 03:32:22',NULL,1),
	(83,'corwin.com','2002-05-22',0,'2015-01-29 03:32:22',NULL,6),
	(84,'bauch.com','1970-06-01',0,'2015-01-29 03:32:22',NULL,10),
	(85,'price.com','1973-03-20',0,'2015-01-29 03:32:22',NULL,5),
	(86,'bashiriankozey.com','1980-04-14',0,'2015-01-29 03:32:22',NULL,3),
	(87,'kerluke.biz','1982-09-14',0,'2015-01-29 03:32:22',NULL,8),
	(88,'kilbackschiller.com','1985-03-25',1,'2015-01-29 03:32:22',NULL,10),
	(89,'hahn.com','2007-02-09',0,'2015-01-29 03:32:22',NULL,6),
	(90,'nikolaus.org','1974-05-12',0,'2015-01-29 03:32:22',NULL,9),
	(91,'purdyweber.biz','1978-11-05',0,'2015-01-29 03:32:22',NULL,8),
	(92,'colliermoore.com','1984-05-20',0,'2015-01-29 03:32:22',NULL,5),
	(93,'morar.com','1974-10-22',1,'2015-01-29 03:32:22',NULL,8),
	(94,'zboncak.org','2008-01-15',0,'2015-01-29 03:32:22',NULL,3),
	(95,'breitenberg.net','1987-08-26',0,'2015-01-29 03:32:22',NULL,2),
	(96,'ryan.com','1979-04-05',0,'2015-01-29 03:32:22',NULL,1),
	(97,'wolfmills.com','2001-02-20',1,'2015-01-29 03:32:22',NULL,8),
	(98,'boyer.com','2001-07-06',1,'2015-01-29 03:32:22',NULL,5),
	(104,'facebook.com.vn','2016-08-02',0,'2015-02-06 14:05:12','2015-02-06 14:05:12',6);

/*!40000 ALTER TABLE `websites` ENABLE KEYS */;
UNLOCK TABLES;



/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
