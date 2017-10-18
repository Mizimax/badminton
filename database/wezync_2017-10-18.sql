# ************************************************************
# Sequel Pro SQL dump
# Version 4541
#
# http://www.sequelpro.com/
# https://github.com/sequelpro/sequelpro
#
# Host: 127.0.0.1 (MySQL 5.6.36)
# Database: wezync
# Generation Time: 2017-10-18 15:42:06 +0000
# ************************************************************


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;


# Dump of table event
# ------------------------------------------------------------

DROP TABLE IF EXISTS `event`;

CREATE TABLE `event` (
  `event_id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `event_title` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '',
  `event_description` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `event_start` datetime NOT NULL,
  `event_end` datetime NOT NULL,
  `event_rank` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `event_user_id` int(11) NOT NULL,
  `event_cover` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `event_image` text COLLATE utf8mb4_unicode_ci,
  `event_package` int(11) NOT NULL,
  `event_sponsor` text COLLATE utf8mb4_unicode_ci,
  `event_status` int(11) NOT NULL,
  `event_team_type_id` int(11) NOT NULL DEFAULT '1',
  `event_sport_id` int(11) NOT NULL,
  PRIMARY KEY (`event_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

LOCK TABLES `event` WRITE;
/*!40000 ALTER TABLE `event` DISABLE KEYS */;

INSERT INTO `event` (`event_id`, `event_title`, `event_description`, `event_start`, `event_end`, `event_rank`, `event_user_id`, `event_cover`, `event_image`, `event_package`, `event_sponsor`, `event_status`, `event_team_type_id`, `event_sport_id`)
VALUES
	(1,'KMUTT OPEN#1','{\n	\"location\": {\n		\"name\": \"bb3 centetpoint บีบี3 เซ็นเตอร์พ้อย\",\n		\"position\": \"https://www.google.co.th/maps/place/bb3+centetpoint+%E0%B8%9A%E0%B8%B5%E0%B8%9A%E0%B8%B53+%E0%B9%80%E0%B8%8B%E0%B9%87%E0%B8%99%E0%B9%80%E0%B8%95%E0%B8%AD%E0%B8%A3%E0%B9%8C%E0%B8%9E%E0%B9%89%E0%B8%AD%E0%B8%A2/@13.674085,100.385129,15z/data=!4m5!3m4!1s0x0:0x6f5b0e881f444583!8m2!3d13.674085!4d100.385129\"\n	},\n	\"date\": \"2017-10-08\",\n	\"expenses\": \"800บาท / คู่\",\n	\"bookbank_organizers\": {\n		\"bank\": \"กรุงไทย\",\n		\"account\": \"465-0-51621-8\",\n		\"prompypay\": \"0902259879\",\n		\"name\": \"นายปุญญพัฒน์ อารีรอบ\"\n	},\n	\"organizers\": [\"(เคี้ยง)ธนภัทร ทัตธนานุรัตน โทร : 086-359-2131  ไลน์ ไอดี : thanapattut\",\"(ไท)ปุญญพัฒน์ อารีรอบ โทร 090-225-9879 ไลน์ ไอดี : taitanium\",\"และทีมงาน.kmutt\"],\n	\"objective\": [\"1. เพื่อเพิ่มโอกาสในการพัฒนาฝีมือแแบดมินตัน\",\"2. เพื่อให้เกิดความรักในกีฬาแบดมินตัน มีน้ำใจเป็นนักกีฬา รู้จักแพ้ ชนะ และอภัย\",\"3. เพื่อเป็นโอกาสในการพบปะสังสรรค์ และสร้างความสัมพันธ์ที่ดี ในกลุ่มคนรักแบดมันตัน\",\"4. เพื่อเสริมสร้างประสบการณ์ ในการแข่งขัน และเผยแพร่กีฬาแบดมินตันให้เป็นที่รู้จักยิ่งขึ้น\"],\n	\"event_type\": {\n		\"type\": \"เปิดรับสมัครลงแข่งขัน ประเภท คู่ จำกัดมือ\",\n		\"detail\": [\">>ระดับมือ P- 48 คู่ กลุ่ม ละ 4 ทีม ( ที่1 ที่ 2 เข้ารอบน๊อคเอ้าาท์)\",\">>ระดับมือ p 48 คู่ กลุ่มละ 4 ทีม ( ที่1 ที่ 2 เข้ารอบน๊อคเอ้าาท์)\",\">>ระดับมือMIX P- 16 คู่ กลุ่มละ 4 ทีม ( ที่1 ที่ 2 เข้ารอบน๊อคเอ้าาท์)\",\">>ระดับมือC 24 คู่ กลุ่มละ 4 ทีม ( ที่1 ที่ 2 เข้ารอบน๊อคเอ้าาท์)\"]\n	},\n	\"detail\": [\"1. จะทำการรับสมัครตั้งแต่วันนี้ จนถึงวันที่ 5พฤศจิกายน 2560\", \"2. กรุณาชำระเงินภายใน 3 วันหลังจากผ่านการพิจารณาเรียบร้อยแล้ว\", \"3. จะมีการประกาศรายชื่อ และอัพเดทข้อมูลรายชื่อ รวมถึงสถานะต่าง ๆ ของนักกีฬาผ่านทางเว๊บไซด์ www.wezync.com\", \"4. จะทำการประกาศสายการแข่งขัน และรอบการแข่งขัน ในวันที่ 9 พฤศจิกายน 2560\", \"5.ห้ามนักกีฬาทีมชาติ ทั้งอดีตและปัจจุบัน รวมถึงนักกีฬาเขตเข้าร่วมการแข่งขันเด็ดขาด\", \"6.สำหรับ ผู้สมัครในทุกรุ่น ทางทีมงานผู้จัด มีความประสงค์ ให้เข้ามาทดสอบฝีมือที่ สนาม สุดจิตต์ พระราม 2 หรือคอร์ด CC พระราม2 ในกรณีทางชมรมใด ที่ส่งรายชื่อเข้าสมัครมากกว่า 5 คู่ ทางทีมงานพร้อมที่จะเข้าไปทดสอบระดับมือที่สนามของชมรมนั้นๆ\", \"7.ผู้ สมัครท่านใด ที่ไม่มีการผ่านการทดสอบฝีมือ หรือไม่มีการการันตีมือ จากทีมงานผู้จัด ทางทีมงานผู้จัดขอตัดสิทธิ์ ในการเข้าร่วมการแข่งขัน\", \"8.พิจารณามือ ครั้งสุดท้าย วันที่ 5 พฤศจิกายน  2560\"],\n	\"rewards\": [\"เงินรางวัล พร้อมถ้วยรางวัลทุกอันดับ\", \"1.มือC:ชนะเลิศ 6000 รองชนะเลิศอันดับหนึ่ง ที่สอง 3000 รองชนะเลิศอันดับ2 ที่สาม 1000( 2รางวัล)\", \"2.มือP:ชนะเลิศ 6000 รองชนะเลิศอันดับหนึ่ง ที่สอง 3000 รองชนะเลิศอันดับ2 ที่สาม 1000( 2รางวัล)\", \"3.มือP-:ชนะเลิศ 5000 รองชนะเลิศอันดับหนึ่ง ที่สอง 3000 รองชนะเลิศอันดับ2 ที่สาม 1000( 2รางวัล)\", \"4.มือ MIX P:ชชนะเลิศ 4000 รองชนะเลิศอันดับหนึ่ง ที่สอง 2000 รองชนะเลิศอันดับ2 ที่สาม 1000( 2รางวัล)\"],\n	\"special_rewards\": [\"(เข้าร่วมได้ทุกคน)\",\"- กิจกรรม vote \\\"cute girl\\\" - รางวัล 1000 บาท ( สำหรับผู้ที่ชนะการ vote )\", \"- กิจกรรม vote \\\"cool boy\\\" - รางวัล 1000 บาท ( สำหรับผู้ที่ชนะการ vote )\", \"- กิจกรรม vote \\\"Man of the match\\\" - รางวัล 1000 บาท ( สำหรับผู้ที่ชนะการ vote )\", \"- กิจกรรม \\\"Predict\\\" - รางวัลเป็นส่วนลดค่าสนามแบดและอุปกรณ์ต่างๆ ( สำหรับผู้ที่ทายผลการแข่งได้ถูกต้อง )\", \"- กิจกรรม \\\"LUCKY DRAW\\\" - รางวัลที่หนึ่ง 1000 บาท ( สำหรับผู้ที่ชนะการ จับฉลาก )\", \" \", \"**ในกรณีที่ จำนวนผู้สมัครไม่เป็นไปตามทีทางรายการกำหนด ทางผู้จัดขอสงวนสิทธิ ในการเปลี่ยนแปลงจำนวนเงินรางวัล โดยจะแจ้งให้ทราบล่วงหน้าก่อน 1 สัปดาห์**\"],\n	\"rule\": [\"1. ในวันอาทิตย์ที่ 11 พฤศจิกายน 2560 เป็นการแข่งขันแบบ แบ่งกลุ่ม กลุ่มละ 4 ทีมแข่งแบบพบกันหมด (สะสม แต้ม) ทุกประเภทมือ จะทำการแข่งกลุ่มละ 4 ทีม ชนะได้ 2 คะแนน เสมอได้ 1 คะแนน แพ้ได้ 0 คะแนน อันดับ 1 และ อันดับ 2 ทำการแข่งขันในรอบต่อไปในรอบน๊อคเอ้าท์ยกเว้น มือ P- P C จะนำคะแนนอันดับที่ 3ที่ดีที่สุด เข้ารอบ 32และ16 คู่ตามลำดับ \", \"2. รอบแรก เป็นต้นไป แข่งขันแบบแพ้คัดออก Knock Out 2ใน3 เซต\", \"3. แข่งขันระบบแรลลี่พ้อยท์ 21 แต้ม ผู้ที่ได้คะแนน 21 คะแนนก่อนถือว่าเป็นผู้ชนะ กรณีที่ได้ 21 คะแนน เท่ากันให้เล่นต่อจนกว่าผู้ใดจะชนะ 2 คะแนนติดต่อกัน ถือว่าเป็นผู้ชนะ หรือถ้าได้ 29 คะแนนเท่ากัน ผู้ที่ได้ 30 คะแนนก่อนถือว่าเป็นผู้ชนะ\", \"4. ผู้แข่งขันจะต้องทำการลงทะเบียนก่อน 30 นาที กรณีผู้แข่งขันมาช้าเกิน 10 นาที ถือว่าสละสิทธิ์การแข่งขันในคู่นั้นๆ\", \"5.ใช้กติกาการแข่งขัน ของสหพันธ์แบดมินตันนานาชาติ\", \"6.นักกีฬาที่ทำการแข่งขัน ต้องแต่งกายสุภาพเรียบร้อย\", \"7.ในกรณีที่นักกีฬาขอถอนตัวจากการแข่งขันให้แจ้งต่อทีมงาน ก่อนวันจับสลากแบ่งสาย มิฉะนั้นนักกีฬาจะต้องรับผิดชอบค่าสมัครในการแข่งขัน\", \"8. คณะกรรมการจัดการแข่งขันขอสงวนสิทธิ์ในการเปลี่ยนแปลงแก้ไขสายการแข่งขันได้ในกรณีมีการพิมพ์ผิดหรือ รายชื่อตกหล่น ซึ่งมิใช่เป็นการแก้สายการแข่งขันทั้งหมด\", \"9. คณะกรรมการจัดการแข่งขัน หรือกรรมการผู้ชี้ขาด เป็นผู้รับผิดชอบมีสิทธิ์วินิจฉัยการประท้วง และคัดค้านทุกกรณี และการวินิจฉัยชี้ขาดของคณะกรรมการถือเป็นสิ้นสุดและยุติ\", \"10. การแข่งขันใช้ลูกขนไก่ ลูกแบด ของ BAZUKA รุ่น TOP \", \"11. การจัดการแข่งขันอาจมีการเปลี่ยนแปลงตามความเหมาะสม ขึ้นอยู่กับคณะกรรมการจัดการแข่งขัน\", \"12. ในรอบแบ่งกลุ่ม ใช้วิธีนับคะแนนแบบ Rally point สองเซ็ต แต้มสูงสุด21แต้ม ไม่มีการดิวส์\"],\n	\"consideration\": [\"- ประวัติการแข่งขัน \", \"- อายุ\", \"- เพศ\", \"- ทักษะ\", \"- ในประเภทมือ P  P- และ C  ไม่อนุญาตให้มีการตีคุมนักกีฬาที่ลงทำการแข่งขันในประเภทมือ P P- และC จะต้องเป็นมือระดับเดียวกันทั้งคู่\", \"การพิจารณามือของทีมงานถือเป็นที่สิ้นสุด\"],\n	\"expenses_detail\": [\"- ประเภทบุคคล ค่าสมัครคู่ละ  800.- บาท\", \"กรรมการฯ จะพิจารณาคุณสมบัติโดยหลักฐานบัตรประชาชน และข้อมูลประวัติการแข่งขันของนักกีฬาเป็นรายบุคคล เพื่อตัดสิทธิ์ในการลงแข่งขัน\", \"กรรมการประเมินคุณสมบัติจากรายการ The Top Talent , The Top Talent2 และทีมงานทองก้อน และตามเกณฑ์ของทาง TAITANIUM กำหนด\"],\n	\"accessory\": [\"BAZUKA (รุ่น TOP )... สปีด  76\", \"คูปองลูกแบด ชุดละ 400 บาท (มี 10 ใบ)\", \"ลูกแบด 1 ลูก/คูปอง 1 ใบ\"],\n	\"screening_person\": [\"(เคี้ยง)ธนภัทร ทัตธนานุรัตน โทร : 086-359-2131  ไลน์ ไอดี : thanapattut\", \"(ท๊อป) คุณปณิธาน คันธะคง 090-9731636\"],\n	\"postscript\": [\"งาน KMUTT OPEN #1 เลขบัญชีในการโอนเงิน นะครับ  ก่อนที่จะทำการโอนเงิน ขอให้ทุก ๆ ท่าน ทราบว่า ท่านได้รับการยอมรับการตัดสินของทางทีมงานในวันงานแล้วนะครับ ทางทีมงานจะประเมินและพิจารณา การตัดสินอีกครั้งในวันงานนะครับ และเมื่อโอนแล้ว ขอให้ทุก ๆ ท่านส่งไลน์สลิปการโอนเงิน มาที่\", \"ID LINE : thanapattut เพื่อเป็นการแสดงหลักฐาน\", \"ชื่อบัญชี นายปุญญพัฒน์ อารีรอบ\", \"เลขที่บัญชี 465-0-51621-8\", \"หรือ PromptPay: 0902259879\", \"ธนาคาร กรุงไทย\", \"ขอบพระคุณทุก ๆ ท่านเป็นอย่างสูงนะครับ\"]\n}','0000-00-00 00:00:00','0000-00-00 00:00:00','[6,7,8,9]',1,'[\n\"/images/events/1/1.png\",\n\"/images/events/1/1.png\"\n]','[]',1,'[\n{\n\"id\":1,\n\"price\":3000\n},\n{\n\"id\":2,\n\"price\":4000\n},\n{\n\"id\":3,\n\"price\":5000\n},\n{\n\"id\":4,\n\"price\":6000\n},\n]',1,2,1);

/*!40000 ALTER TABLE `event` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table password_resets
# ------------------------------------------------------------

DROP TABLE IF EXISTS `password_resets`;

CREATE TABLE `password_resets` (
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` datetime DEFAULT NULL,
  KEY `password_resets_email_index` (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;



# Dump of table rank
# ------------------------------------------------------------

DROP TABLE IF EXISTS `rank`;

CREATE TABLE `rank` (
  `rank_id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `rank_name` varchar(50) NOT NULL DEFAULT '',
  `rank_icon` varchar(150) NOT NULL DEFAULT '',
  PRIMARY KEY (`rank_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

LOCK TABLES `rank` WRITE;
/*!40000 ALTER TABLE `rank` DISABLE KEYS */;

INSERT INTO `rank` (`rank_id`, `rank_name`, `rank_icon`)
VALUES
	(1,'VIP',''),
	(2,'A',''),
	(3,'B+',''),
	(4,'B',''),
	(5,'C+',''),
	(6,'C',''),
	(7,'P+',''),
	(8,'P',''),
	(9,'P-',''),
	(10,'S',''),
	(11,'N','');

/*!40000 ALTER TABLE `rank` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table social_facebook_accounts
# ------------------------------------------------------------

DROP TABLE IF EXISTS `social_facebook_accounts`;

CREATE TABLE `social_facebook_accounts` (
  `user_id` int(11) NOT NULL,
  `provider_user_id` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `provider` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;



# Dump of table sponsor
# ------------------------------------------------------------

DROP TABLE IF EXISTS `sponsor`;

CREATE TABLE `sponsor` (
  `sponsor_id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `sponsor_name` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '',
  PRIMARY KEY (`sponsor_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;



# Dump of table sport
# ------------------------------------------------------------

DROP TABLE IF EXISTS `sport`;

CREATE TABLE `sport` (
  `sport_id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `sport_name` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`sport_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

LOCK TABLES `sport` WRITE;
/*!40000 ALTER TABLE `sport` DISABLE KEYS */;

INSERT INTO `sport` (`sport_id`, `sport_name`)
VALUES
	(1,'แบดมินตัน');

/*!40000 ALTER TABLE `sport` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table team
# ------------------------------------------------------------

DROP TABLE IF EXISTS `team`;

CREATE TABLE `team` (
  `team_id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `team_name` varchar(250) DEFAULT NULL,
  `team_event_id` int(11) DEFAULT NULL,
  `team_point` int(11) NOT NULL DEFAULT '0',
  `team_status` int(1) NOT NULL DEFAULT '1',
  `team_register_by` int(11) NOT NULL,
  `team_max_rank` int(11) NOT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `team_comment` text,
  `team_payment` int(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`team_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;



# Dump of table team_member
# ------------------------------------------------------------

DROP TABLE IF EXISTS `team_member`;

CREATE TABLE `team_member` (
  `team_member_id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `team_member_firstname` varchar(250) NOT NULL DEFAULT '',
  `team_member_lastname` varchar(250) NOT NULL DEFAULT '',
  `team_member_nickname` varchar(250) NOT NULL DEFAULT '',
  `team_member_gender` enum('m','f') NOT NULL DEFAULT 'm',
  `team_member_age` int(2) NOT NULL,
  `team_member_phone` varchar(10) NOT NULL DEFAULT '',
  `team_member_prize` text,
  `team_member_pic` text,
  `team_member_rank` int(11) NOT NULL,
  `team_member_event_id` int(11) NOT NULL,
  `team_member_team_id` int(11) NOT NULL,
  `team_member_status` enum('NEW','REGISTED') NOT NULL DEFAULT 'NEW',
  PRIMARY KEY (`team_member_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;



# Dump of table team_status
# ------------------------------------------------------------

DROP TABLE IF EXISTS `team_status`;

CREATE TABLE `team_status` (
  `team_status_id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `team_status_name` varchar(30) DEFAULT NULL,
  PRIMARY KEY (`team_status_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

LOCK TABLES `team_status` WRITE;
/*!40000 ALTER TABLE `team_status` DISABLE KEYS */;

INSERT INTO `team_status` (`team_status_id`, `team_status_name`)
VALUES
	(1,'ผ่านการประเมิน'),
	(2,'ไม่ผ่านการประเมิน'),
	(3,'รอการประเมิน');

/*!40000 ALTER TABLE `team_status` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table team_type
# ------------------------------------------------------------

DROP TABLE IF EXISTS `team_type`;

CREATE TABLE `team_type` (
  `team_type_id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `team_type_name` varchar(11) NOT NULL DEFAULT '',
  `team_type_number_of_team` int(11) NOT NULL DEFAULT '1',
  PRIMARY KEY (`team_type_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

LOCK TABLES `team_type` WRITE;
/*!40000 ALTER TABLE `team_type` DISABLE KEYS */;

INSERT INTO `team_type` (`team_type_id`, `team_type_name`, `team_type_number_of_team`)
VALUES
	(1,'เดี่ยว',1),
	(2,'คู่',2);

/*!40000 ALTER TABLE `team_type` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table users
# ------------------------------------------------------------

DROP TABLE IF EXISTS `users`;

CREATE TABLE `users` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `user_level` int(11) NOT NULL DEFAULT '0',
  `user_profile` varchar(150) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `user_phone` varchar(11) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_email_unique` (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;




/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
