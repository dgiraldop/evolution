# Host: localhost  (Version: 5.5.16)
# Date: 2014-02-13 17:37:02
# Generator: MySQL-Front 5.3  (Build 4.52)

/*!40101 SET NAMES utf8 */;

#
# Structure for table "tasks"
#

DROP TABLE IF EXISTS `tasks`;
CREATE TABLE `tasks` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(150) DEFAULT NULL,
  `priority` varchar(20) DEFAULT NULL,
  `due_date` date DEFAULT NULL,
  `owner_id` int(11) DEFAULT NULL,
  `created` datetime DEFAULT NULL,
  `modified` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=23 DEFAULT CHARSET=utf8;

#
# Data for table "tasks"
#

INSERT INTO `tasks` VALUES (16,'jhon henry tales','quintero cardenas','2010-10-10',NULL,'2014-02-12 22:16:43','2014-02-12 22:16:43'),(18,'andres','quintero','2020-12-12',NULL,'2014-02-12 22:50:21','2014-02-12 22:50:21'),(20,'nuevo','nuevo','0000-00-00',NULL,'2014-02-13 17:12:09','2014-02-13 17:12:09'),(21,'nuevo tales','nuevo','0000-00-00',NULL,'2014-02-13 17:12:18','2014-02-13 17:12:18'),(22,'nuevo','tales','0000-00-00',NULL,'2014-02-13 19:15:28','2014-02-13 19:15:28'),(23,'new','tales','0000-00-00',NULL,'2014-02-13 22:56:27','2014-02-13 22:56:27'),(24,'otra prueba','tales','2001-12-12',NULL,'2014-02-13 23:03:12','2014-02-13 23:03:12'),(25,'diego','giraldo','1212-12-12',NULL,'2014-02-13 23:13:09','2014-02-13 23:13:09'),(26,'modal','modal','0000-00-00',NULL,'2014-02-13 23:16:41','2014-02-13 23:16:41'),(27,'new','newnewnew','2012-11-11',NULL,'2014-02-13 23:26:37','2014-02-13 23:26:37'),(28,'nuevo prueba','high','2012-01-01',NULL,'2014-02-13 23:27:48','2014-02-13 23:27:48');

#
# Structure for table "users"
#

DROP TABLE IF EXISTS `users`;
CREATE TABLE `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(32) NOT NULL,
  `email` varchar(32) NOT NULL,
  `password` varchar(32) NOT NULL,
  `modified` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=64 DEFAULT CHARSET=latin1;

#
# Data for table "users"
#

INSERT INTO `users` VALUES (58,'username','email@email.com','password','2014-02-12 18:23:46'),(59,'username','email@email.com','password','2014-02-12 18:23:50'),(60,'username','email@email.com','password','2014-02-12 18:23:52'),(61,'dgiraldop','dgiraldop@gmail.com','8cb2237d0679ca88db6464eac60da963','2014-02-13 16:25:41'),(62,'username123456','dgiraldop@gmail.com','123456','2014-02-13 19:57:05');
