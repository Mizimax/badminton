update  `team`
set team_race = 30
where team_race = 7;

update  `team`
set team_race = 21
where team_race = 6;

update  `team`
set team_race = 23
where team_race = 8;

update  `team`
set team_race = 24
where team_race = 9;



DROP TABLE IF EXISTS `race_type`;

CREATE TABLE `race_type` (
  `race_id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `race_name` varchar(50) DEFAULT NULL,
  `race_color` varchar(11) NOT NULL DEFAULT '#84c2ce',
  `race_event_type` int(11) NOT NULL DEFAULT '2',
  PRIMARY KEY (`race_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

LOCK TABLES `race_type` WRITE;


INSERT INTO `race_type` (`race_id`, `race_name`, `race_color`, `race_event_type`)
VALUES
	(1,'A','#84c2ce',1),
	(2,'B+','#84c2ce',1),
	(3,'B','#84c2ce',1),
	(4,'C+','#84c2ce',1),
	(5,'C','#FF7D15',1),
	(6,'P+','#84c2ce',1),
	(7,'P','#84c2ce',1),
	(8,'P-','#8cd6fe',1),
	(9,'S','#84c2ce',1),
	(10,'N','#84c2ce',1),
	(11,'อายุทั่วไปเกิน18','#84c2ce',1),
	(12,'อายุไม่เกิน18ปี','#84c2ce',1),
	(13,'อายุไม่เกิน16ปี','#84c2ce',1),
	(14,'อายุไม่เกิน14ปี','#84c2ce',1),
	(15,'อายุไม่เกิน12ปี','#84c2ce',1),
	(16,'อายุไม่เกิน10ปี','#84c2ce',1),
	(17,'A','#84c2ce',2),
	(18,'B+','#84c2ce',2),
	(19,'B','#84c2ce',2),
	(20,'C+','#84c2ce',2),
	(21,'C','#FF7D15',2),
	(22,'P+','#84c2ce',2),
	(23,'P','#84c2ce',2),
	(24,'P-','#8cd6fe',2),
	(25,'S','#84c2ce',2),
	(26,'N','#84c2ce',2),
	(27,'WP','#84c2ce',2),
	(28,'WP-','#84c2ce',2),
	(29,'MIXP','#84c2ce',2),
	(30,'MIXP-','#00c862',2),
	(31,'อายุทั่วไปเกิน18 ชายคู่','#84c2ce',2),
	(32,'อายุทั่วไปเกิน18 หญิงคู่','#84c2ce',2),
	(33,'อายุไม่เกิน18ปี ชายคู่','#84c2ce',2),
	(34,'อายุไม่เกิน18ปี หญิงคู่','#84c2ce',2),
	(35,'อายุไม่เกิน16ปี ชายคู่','#84c2ce',2),
	(36,'อายุไม่เกิน16ปี หญิงคู่','#84c2ce',2),
	(37,'อายุไม่เกิน14ปี ชายคู่','#84c2ce',2),
	(38,'อายุไม่เกิน14ปี หญิงคู่','#84c2ce',2),
	(39,'อายุไม่เกิน12ปี ชายคู่','#84c2ce',2),
	(40,'อายุไม่เกิน12ปี หญิงคู่','#84c2ce',2),
	(41,'อายุไม่เกิน10ปี ชายคู่','#84c2ce',2),
	(42,'อายุไม่เกิน10ปี หญิงคู่','#84c2ce',2);
UNLOCK TABLES;



-- team | team_max_rank -> team_race
-- event | event_rank -> event_race