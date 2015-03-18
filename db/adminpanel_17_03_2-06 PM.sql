# ************************************************************
# Sequel Pro SQL dump
# Version 4135
#
# http://www.sequelpro.com/
# http://code.google.com/p/sequel-pro/
#
# Host: localhost (MySQL 5.5.34)
# Database: adminpanel
# Generation Time: 2015-03-17 07:06:33 +0000
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
  `belong_to` int(11) DEFAULT NULL,
  `come_date` datetime DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

LOCK TABLES `activities` WRITE;
/*!40000 ALTER TABLE `activities` DISABLE KEYS */;

INSERT INTO `activities` (`id`, `title`, `content`, `users_id`, `reminder`, `belong_to`, `come_date`, `created_at`, `updated_at`)
VALUES
	(18,'Meeting woooo','drink up!!! Ha ha',1,1,12,'2015-02-28 15:04:00','2015-02-05 15:05:30','2015-02-05 15:05:30'),
	(19,'Meeting woooo','drink up!!! Ha ha',1,1,12,'2015-02-28 15:04:00','2015-02-05 15:05:30','2015-02-05 15:05:30'),
	(21,'woa.z.z.z','<span>essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</span>',1,0,12,'2015-02-25 15:14:45','2015-02-05 15:09:11','2015-02-05 15:09:11'),
	(22,'woa.z.z.z','<span>essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</span>',1,0,12,'2015-02-25 15:14:45','2015-02-05 15:09:11','2015-02-05 15:09:11'),
	(23,'woa.z.z.z','<span>essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</span>',1,0,13,'2015-02-25 15:14:45','2015-02-05 15:09:11','2015-02-05 15:09:11'),
	(24,'woa.z.z.z','<span>essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</span>',1,0,13,'2015-02-25 15:14:45','2015-02-05 15:09:11','2015-02-05 15:09:11'),
	(25,'woa.z.z.z','<span>essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</span>',1,0,9,'2015-02-25 15:14:45','2015-02-05 15:09:11','2015-02-05 15:09:11'),
	(31,'Opp oh!!!','what\'s the hell?',1,0,1,'2015-02-11 16:38:15','2015-02-05 16:38:37','2015-02-05 16:38:37'),
	(40,'komamska','jannxn ladfjajpw&nbsp;',1,1,12,'2015-03-15 16:10:00','2015-03-13 16:16:37','2015-03-13 16:16:37'),
	(41,'adsfads','fsafs',1,1,12,'2015-03-25 16:47:30','2015-03-13 16:47:26','2015-03-13 16:47:26');

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
	('/auto-send/*',2,NULL,NULL,NULL,1425437304,1425437304),
	('/checklists/*',2,NULL,NULL,NULL,1424835269,1424835269),
	('/clients/*',2,NULL,NULL,NULL,1422607156,1422607156),
	('/cschedules/*',2,NULL,NULL,NULL,1424847779,1424847779),
	('/csettings/*',2,NULL,NULL,NULL,1424917586,1424917586),
	('/dashboard/*',2,NULL,NULL,NULL,1422590546,1422590546),
	('/filters/*',2,NULL,NULL,NULL,1425291513,1425291513),
	('/gii/*',2,NULL,NULL,NULL,1422346008,1422346008),
	('/gii/default/*',2,NULL,NULL,NULL,1422346008,1422346008),
	('/gii/default/action',2,NULL,NULL,NULL,1422346008,1422346008),
	('/gii/default/diff',2,NULL,NULL,NULL,1422346008,1422346008),
	('/gii/default/index',2,NULL,NULL,NULL,1422346008,1422346008),
	('/gii/default/preview',2,NULL,NULL,NULL,1422346008,1422346008),
	('/gii/default/view',2,NULL,NULL,NULL,1422346008,1422346008),
	('/groups/*',2,NULL,NULL,NULL,1422930892,1422930892),
	('/messages/*',2,NULL,NULL,NULL,1423464979,1423464979),
	('/mschedules/*',2,NULL,NULL,NULL,1423552502,1423552502),
	('/msettings/*',2,NULL,NULL,NULL,1424057591,1424057591),
	('/notes/*',2,NULL,NULL,NULL,1423037804,1423037804),
	('/search/*',2,NULL,NULL,NULL,1425876254,1425876254),
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
	('User','/auto-send/*'),
	('User','/checklists/*'),
	('User','/clients/*'),
	('User','/cschedules/*'),
	('User','/csettings/*'),
	('User','/dashboard/*'),
	('User','/filters/*'),
	('Admin','/gii/*'),
	('User','/groups/*'),
	('User','/messages/*'),
	('User','/mschedules/*'),
	('User','/msettings/*'),
	('User','/notes/*'),
	('User','/search/*'),
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



# Dump of table checklist_schedules
# ------------------------------------------------------------

DROP TABLE IF EXISTS `checklist_schedules`;

CREATE TABLE `checklist_schedules` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `subject` varchar(255) DEFAULT NULL,
  `message` text,
  `relation` smallint(6) DEFAULT NULL,
  `type` smallint(6) DEFAULT NULL,
  `event` smallint(6) DEFAULT NULL,
  `sendon` smallint(6) DEFAULT NULL,
  `type_periodically` varchar(255) DEFAULT NULL,
  `time_periodically` varchar(255) DEFAULT NULL,
  `checklists_id` int(11) DEFAULT NULL,
  `active` smallint(6) DEFAULT NULL,
  `at_time` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

LOCK TABLES `checklist_schedules` WRITE;
/*!40000 ALTER TABLE `checklist_schedules` DISABLE KEYS */;

INSERT INTO `checklist_schedules` (`id`, `subject`, `message`, `relation`, `type`, `event`, `sendon`, `type_periodically`, `time_periodically`, `checklists_id`, `active`, `at_time`)
VALUES
	(9,'aaaaaa','aaa',1,2,NULL,NULL,'minute','0-0',7,1,''),
	(10,'schedules1 for checklist2','kekekkeke',1,1,5,1,NULL,NULL,8,1,'02:00:00'),
	(11,'schedule2 for checklist2 websiet','adfad',2,1,5,2,NULL,NULL,8,1,'02:00:00'),
	(12,'123132131','123131',1,1,2,2,NULL,NULL,9,1,'02:00:00'),
	(13,'1111','111',2,2,NULL,NULL,'week','3-2-3',11,1,''),
	(15,'Chetcmnr','kill them!!!',1,1,1,2,NULL,NULL,12,1,'02:00:00');

/*!40000 ALTER TABLE `checklist_schedules` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table checklists
# ------------------------------------------------------------

DROP TABLE IF EXISTS `checklists`;

CREATE TABLE `checklists` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(255) NOT NULL,
  `subtitle` varchar(255) DEFAULT NULL,
  `content` text,
  `active` smallint(6) DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `users_id` int(11) DEFAULT NULL,
  `file_name` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

LOCK TABLES `checklists` WRITE;
/*!40000 ALTER TABLE `checklists` DISABLE KEYS */;

INSERT INTO `checklists` (`id`, `title`, `subtitle`, `content`, `active`, `created_at`, `updated_at`, `users_id`, `file_name`)
VALUES
	(10,'Are you a vegetarian?',' for health or religious reasons?','\n				\n		\n				\n	<h1 class=\"cl-title editable editable-click editable-unsaved ui-sortable-handle\" data-type=\"text\" data-original-title=\"\" title=\"\" style=\"background-color: rgba(0, 0, 0, 0);\">vegetarian</h1>		\n			\n			<div class=\"form-group\"><label class=\"cl-label editable editable-click editable-unsaved\" data-type=\"text\" style=\"margin-right: 20px; background-color: rgba(0, 0, 0, 0);\" data-original-title=\"\" title=\"\">dishes of</label><a href=\"#\" class=\"text editable editable-click editable-unsaved\" data-type=\"text\" data-original-title=\"\" title=\"\" style=\"background-color: rgba(0, 0, 0, 0);\">rice, bread</a></div>',1,'2015-02-27 13:51:47','2015-03-03 09:01:42',1,'631d138af1ef862d9a3adb2626cdceb3.pdf'),
	(11,'Nationality','Nationality','\n				\n	<h1 class=\"cl-title editable editable-click editable-unsaved\" data-type=\"text\" data-original-title=\"\" title=\"\" style=\"background-color: rgba(0, 0, 0, 0);\">Biology</h1><h2 class=\"cl-subtitle editable editable-click editable-unsaved\" data-type=\"text\" data-original-title=\"\" title=\"\" style=\"background-color: rgba(0, 0, 0, 0);\">Keywords</h2>',1,'2015-02-28 10:16:26','2015-03-03 09:02:00',1,'76e952069cf4b1b693a597694bd47ae2.pdf');

/*!40000 ALTER TABLE `checklists` ENABLE KEYS */;
UNLOCK TABLES;


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
	(1,'Barrows Ltd','Irwin','Yost','softdevelop.kt@gmail.com','1977-06-07','',0,'0000-00-00 00:00:00','2015-03-11 09:55:32'),
	(9,'Conroy-Lakin','Noble','Barton','softdevelop.kt1@gmail.com','1995-12-11','',1,'0000-00-00 00:00:00','2015-03-11 11:30:28'),
	(12,'abc','duong','duong','softdevelop.kt2@gmail.com','2015-03-09','dixeSmGVF57HzRps8p3ZAVuE6W0piJba.jpg',1,'2015-02-25 09:25:26','2015-02-25 09:25:30'),
	(13,'aca','hoang','nguyen','softdevelop.kt3@gmail.com','2015-06-02','pG_MpakzSOGgat1ckVBdWmMQNOZ1t77L.jpg',1,'0000-00-00 00:00:00','2015-03-11 11:32:17');

/*!40000 ALTER TABLE `clients` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table csettings
# ------------------------------------------------------------

DROP TABLE IF EXISTS `csettings`;

CREATE TABLE `csettings` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `checklists_id` int(11) DEFAULT NULL,
  `belong_to` smallint(6) DEFAULT NULL,
  `clients_or_webs_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

LOCK TABLES `csettings` WRITE;
/*!40000 ALTER TABLE `csettings` DISABLE KEYS */;

INSERT INTO `csettings` (`id`, `checklists_id`, `belong_to`, `clients_or_webs_id`)
VALUES
	(65,11,1,12),
	(66,10,1,12);

/*!40000 ALTER TABLE `csettings` ENABLE KEYS */;
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
	(416,1,1),
	(417,1,2),
	(418,9,1),
	(419,9,2),
	(422,13,1);

/*!40000 ALTER TABLE `groups_clients` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table message_schedules
# ------------------------------------------------------------

DROP TABLE IF EXISTS `message_schedules`;

CREATE TABLE `message_schedules` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `descriptions` varchar(255) DEFAULT NULL,
  `relation` smallint(6) DEFAULT NULL,
  `type` smallint(6) DEFAULT NULL,
  `event` smallint(6) DEFAULT NULL,
  `sendon` smallint(6) DEFAULT NULL,
  `type_periodically` varchar(255) DEFAULT NULL,
  `time_periodically` varchar(255) DEFAULT NULL,
  `messages_id` int(11) DEFAULT NULL,
  `at_time` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

LOCK TABLES `message_schedules` WRITE;
/*!40000 ALTER TABLE `message_schedules` DISABLE KEYS */;

INSERT INTO `message_schedules` (`id`, `descriptions`, `relation`, `type`, `event`, `sendon`, `type_periodically`, `time_periodically`, `messages_id`, `at_time`)
VALUES
	(7,'for 3',1,1,1,1,NULL,NULL,3,'14:34'),
	(17,'for 3 -2',1,1,1,1,NULL,NULL,3,'14:21'),
	(35,'for daily',1,2,NULL,NULL,'day','04:15',3,NULL),
	(36,'for weekly',1,2,NULL,NULL,'week','0 03:30',3,NULL),
	(37,'for monthly',1,2,NULL,NULL,'month','5 04:00',3,NULL),
	(40,'for yearly',1,2,NULL,NULL,'year','6 5 03:45',3,NULL),
	(41,'12312',1,2,NULL,NULL,'year','2 9 04:00',3,NULL);

/*!40000 ALTER TABLE `message_schedules` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table messages
# ------------------------------------------------------------

DROP TABLE IF EXISTS `messages`;

CREATE TABLE `messages` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `subject` varchar(255) DEFAULT NULL,
  `from_name` varchar(255) DEFAULT NULL,
  `from_email` varchar(255) DEFAULT NULL,
  `content` text,
  `active` smallint(6) DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

LOCK TABLES `messages` WRITE;
/*!40000 ALTER TABLE `messages` DISABLE KEYS */;

INSERT INTO `messages` (`id`, `subject`, `from_name`, `from_email`, `content`, `active`, `created_at`, `updated_at`)
VALUES
	(2,'Happy Birthday','Duong','duong@gmail.com','congratulate!!!',1,'2015-02-09 15:00:14','2015-02-09 15:00:14'),
	(3,'Nho do nghe!!!','nakw','nakw@gmail.com','a1231',1,'2015-02-13 10:41:47','2015-03-04 10:34:02');

/*!40000 ALTER TABLE `messages` ENABLE KEYS */;
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
	('m150206_074843_change_type_email_repicent',1423209059),
	('m150207_030418_add_emain_notification_to_user_table',1423280103),
	('m150207_033625_add_emain_notification_to_user_table',1423281007),
	('m150209_064751_message_table',1423466639),
	('m150209_082149_message_schedules',1423795691),
	('m150213_025420_add_type_col_notes',1423796195),
	('m150213_033331_changename_message_id',1423798574),
	('m150216_022205_msetting_table',1424053718),
	('m150225_032619_create_table_checklist',1424834962),
	('m150225_042228_checklist_schedules_table',1424838823),
	('m150225_100059_csettings_table',1424858501),
	('m150227_064721_add_users_id_field_to_checklists_table',1425019772),
	('m150228_084552_add_file_name_field_to_checklists_table',1425113205),
	('m150306_020634_add_at_time_field_in_schedule',1425607855),
	('m150313_022756_add_belong_to_notes_table',1426214049),
	('m150313_073504_add_belong_to_field_activities_table',1426232305);

/*!40000 ALTER TABLE `migration` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table msettings
# ------------------------------------------------------------

DROP TABLE IF EXISTS `msettings`;

CREATE TABLE `msettings` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `messages_id` int(11) DEFAULT NULL,
  `belong_to` smallint(6) DEFAULT NULL,
  `clients_or_webs_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

LOCK TABLES `msettings` WRITE;
/*!40000 ALTER TABLE `msettings` DISABLE KEYS */;

INSERT INTO `msettings` (`id`, `messages_id`, `belong_to`, `clients_or_webs_id`)
VALUES
	(160,3,1,12),
	(162,3,1,1),
	(163,3,1,1),
	(164,3,1,9),
	(165,3,1,9);

/*!40000 ALTER TABLE `msettings` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table notes
# ------------------------------------------------------------

DROP TABLE IF EXISTS `notes`;

CREATE TABLE `notes` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `content` text,
  `users_id` int(11) DEFAULT NULL,
  `type_area` int(11) DEFAULT NULL,
  `belong_to` int(11) DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

LOCK TABLES `notes` WRITE;
/*!40000 ALTER TABLE `notes` DISABLE KEYS */;

INSERT INTO `notes` (`id`, `content`, `users_id`, `type_area`, `belong_to`, `created_at`, `updated_at`)
VALUES
	(42,'note 111',1,0,1,'2015-03-13 09:56:46','2015-03-13 10:01:37'),
	(46,'for client having id is 12',1,0,12,'2015-03-13 10:03:35','2015-03-13 10:45:39'),
	(48,'for website having id is 82',1,1,82,'2015-03-13 10:45:20','2015-03-13 10:45:20'),
	(49,'for client having id is 123',1,0,12,'2015-03-13 10:57:42','2015-03-13 10:57:42'),
	(50,'for client having id is 123aa',1,0,12,'2015-03-13 10:57:48','2015-03-13 10:57:48'),
	(51,'for client having id is 1231111',1,0,12,'2015-03-13 10:57:52','2015-03-13 10:57:52'),
	(52,'for client having id is 1231111',1,0,12,'2015-03-13 10:57:58','2015-03-13 10:57:58'),
	(53,'for client having id is 1232132131',1,0,12,'2015-03-13 10:58:05','2015-03-13 10:58:05'),
	(54,'for client having id is 123dfafa',1,0,12,'2015-03-13 10:58:13','2015-03-13 10:58:13');

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
  `email_notification` smallint(6) DEFAULT '0',
  `avatar` varchar(255) DEFAULT NULL,
  `active` smallint(6) DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

LOCK TABLES `users` WRITE;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;

INSERT INTO `users` (`id`, `username`, `lastname`, `firstname`, `email`, `password`, `token`, `auth_key`, `email_notification`, `avatar`, `active`, `created_at`, `updated_at`)
VALUES
	(1,'jaqueline.kuhn','Prohaska','Twila','mcclure.whitney@larson.bizz1','$2y$13$djseGQlCMk1rHXoRs3gnPubMQ6N9Tl0iZMf3uMXyGyoRKlLtDg2gy','ohyR11oHIq95kAlVvVS_c5bFUQ06RxQh','ZOnwgc11lkD25YYYfU1ta06ruNyPF9U_',0,'ED1TiJ3HKi2m4l9duARLEGH0DmfsOrnr.jpg',0,NULL,'2015-02-11 15:53:21'),
	(2,'rex91','Cartwright','Kim','radams@yahoo.com','$2y$13$djseGQlCMk1rHXoRs3gnPubMQ6N9Tl0iZMf3uMXyGyoRKlLtDg2gy','lHqiAMOEhPqX5tx0u-m11f6gJtPOpfi5','wg-jbe41IMJa0rOS8NL0cePSHeqt4l4y',0,NULL,0,NULL,NULL),
	(3,'kris.sallie','Fadel','Oswaldo','joanne28@gmail.com','$2y$13$djseGQlCMk1rHXoRs3gnPubMQ6N9Tl0iZMf3uMXyGyoRKlLtDg2gy','mExNf77mhYiIV2js9VaA5u0cTeVw8u1H','P0EK9_f32_a3pHVZYRDlSRXACOZHvaSr',0,NULL,0,NULL,NULL),
	(4,'mercedes82','Anderson','Brendan','powlowski.enid@hotmail.com','$2y$13$djseGQlCMk1rHXoRs3gnPubMQ6N9Tl0iZMf3uMXyGyoRKlLtDg2gy','CXOQOoQxiC13oSSMIdtmNv-pgViJxpkR','cuJ7-yvSIgii9dzf6JSeWMNlJ0a_SZSh',0,NULL,0,NULL,NULL),
	(5,'satterfield.kristopher','Hessel','Dina','erick.zemlak@gmail.com','$2y$13$djseGQlCMk1rHXoRs3gnPubMQ6N9Tl0iZMf3uMXyGyoRKlLtDg2gy','nt9FQY1h9_AcAXRHZkyHJ4URtL75rYps','TY0sLvM8Ymt_fOAI-gVMjP9JzOEWvOXC',0,NULL,0,NULL,NULL),
	(6,'ramona75','Parisian','Austin','ykoelpin@yahoo.com','$2y$13$djseGQlCMk1rHXoRs3gnPubMQ6N9Tl0iZMf3uMXyGyoRKlLtDg2gy','0pIbBHPenU8VX6vJlYuQO6Sl3RZw_fnk','JXO50n12OxnwBpbl2Mj538V2OC-36FJD',0,NULL,1,NULL,NULL),
	(7,'stamm.kariane','Connelly','Tad','lwolff@fritsch.com','$2y$13$djseGQlCMk1rHXoRs3gnPubMQ6N9Tl0iZMf3uMXyGyoRKlLtDg2gy','E-HXnFSCfRxncgefiyBz90oDiXxMVt6X','7GZHSHm8Gao6Ynm-rqOrQIAGvXjT0YE2',0,NULL,1,NULL,NULL),
	(8,'ethel93','Keebler','Fabian','murl94@gmail.com','$2y$13$djseGQlCMk1rHXoRs3gnPubMQ6N9Tl0iZMf3uMXyGyoRKlLtDg2gy','UZ4Ba7aEe57mI2oA86Ie2BNyVD_yvoGJ','glkoF8UFkmtkzBoccnDyETM1FvG4c3Yt',0,NULL,1,NULL,NULL),
	(9,'joaquin28','Kassulke','Merle','scormier@hotmail.com','$2y$13$djseGQlCMk1rHXoRs3gnPubMQ6N9Tl0iZMf3uMXyGyoRKlLtDg2gy','M9e3FfjAcqRsj--zkLTRanFJJIiibp6m','FkAfLvS_4w7BkJx-RIRtm2C8Uh8p1oly',0,NULL,0,NULL,NULL),
	(10,'adfs','11111','adfa','jaqueline.kuhn111@gmail.com','$2y$13$oJLOO4ze4spewWhC85v/oOhpyCuKs1QdtjGrskvIX/YTEVWVyY75a','CPSNzGBzYsh8fDjlsQth8lF1dO9vI-SU','EODtzY0z6pA9RpNb141cyOwDERBFor-U',0,'ED1TiJ3HKi2m4l9duARLEGH0DmfsOrnr.jpg',1,'2015-02-05 09:30:02','2015-02-05 09:30:02'),
	(11,'adfs','11111','adfa','jaqueline.kuhn111@gmail.com','$2y$13$oJLOO4ze4spewWhC85v/oOhpyCuKs1QdtjGrskvIX/YTEVWVyY75a','CPSNzGBzYsh8fDjlsQth8lF1dO9vI-SU','EODtzY0z6pA9RpNb141cyOwDERBFor-U',0,'ED1TiJ3HKi2m4l9duARLEGH0DmfsOrnr.jpg',1,'2015-02-05 09:30:02','2015-02-05 09:30:02');

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
	(10,'hansenvon.net','1982-03-18',0,'2015-01-29 03:32:22',NULL,1),
	(13,'veum.com','1997-07-27',0,'2015-01-29 03:32:22',NULL,1),
	(18,'cormierbuckridge.com','1995-04-13',1,'2015-01-29 03:32:22',NULL,9),
	(20,'mertz.com','1983-11-27',0,'2015-01-29 03:32:22',NULL,9),
	(25,'lang.info','1991-08-09',0,'2015-01-29 03:32:22',NULL,9),
	(27,'mohr.biz','1972-10-30',0,'2015-01-29 03:32:22',NULL,1),
	(36,'johnszieme.com','2002-01-23',1,'2015-01-29 03:32:22',NULL,9),
	(38,'haagbayer.org','2009-12-11',0,'2015-01-29 03:32:22',NULL,1),
	(40,'starkdoyle.com','1974-10-04',0,'2015-01-29 03:32:22',NULL,9),
	(50,'roweklocko.org','2013-09-25',0,'2015-01-29 03:32:22',NULL,1),
	(58,'klocko.biz','1991-05-29',0,'2015-01-29 03:32:22',NULL,1),
	(60,'littel.info','2009-06-14',0,'2015-01-29 03:32:22',NULL,1),
	(63,'blockmurphy.com','1989-12-12',0,'2015-01-29 03:32:22',NULL,1),
	(65,'wolf.com','2001-09-25',0,'2015-01-29 03:32:22',NULL,9),
	(69,'hudson.com','1973-07-07',1,'2015-01-29 03:32:22',NULL,1),
	(72,'okon.com','2012-10-13',1,'2015-01-29 03:32:22',NULL,9),
	(80,'fadel.biz','2013-09-29',1,'2015-01-29 03:32:22',NULL,1),
	(82,'willmsebert.info','1987-05-01',0,'2015-01-29 03:32:22','2015-03-03 12:19:26',1),
	(90,'nikolaus.org','1974-05-12',0,'2015-01-29 03:32:22','2015-03-03 12:19:32',9),
	(96,'ryan.com','1979-04-05',1,'2015-01-29 03:32:22','2015-03-03 08:53:31',1);

/*!40000 ALTER TABLE `websites` ENABLE KEYS */;
UNLOCK TABLES;



/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
