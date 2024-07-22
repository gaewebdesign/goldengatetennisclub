

DROP TABLE IF EXISTS `tourny`;

CREATE TABLE `tourny` (
  `_id` int NOT NULL AUTO_INCREMENT,
  `fname1` varchar(50) DEFAULT NULL,
  `lname1` varchar(50) DEFAULT NULL,
  `email1` varchar(50) DEFAULT NULL,
  `gender1` char(5) DEFAULT NULL,
  `ntrp1` varchar(5) DEFAULT NULL,
  `fname2` varchar(50) DEFAULT NULL,
  `lname2` varchar(50) DEFAULT NULL,
  `email2` varchar(50) DEFAULT NULL,
  `gender2` char(5) DEFAULT NULL,
  `ntrp2` varchar(5) DEFAULT NULL,
  `year` varchar(5) DEFAULT NULL,
  `division` varchar(50) DEFAULT NULL,
  `team` varchar(50) DEFAULT NULL,
  `mtype` varchar(50) DEFAULT NULL,
  `date` int DEFAULT NULL,
  `insignia` varchar(16) DEFAULT NULL,
  `payment` varchar(16) DEFAULT NULL,
  `custom` varchar(50) DEFAULT NULL,
  `opt` varchar(50) DEFAULT NULL,
  `pwd` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`_id`)
) ENGINE=MyISAM AUTO_INCREMENT=287 DEFAULT CHARSET=latin1;


LOCK TABLES `tourny` WRITE;

INSERT INTO `tourny` VALUES (285,'Roy','Molseed','roy.molseee@gmail.com','M','4.0','Jeannette','Hoggart','queenbee95051@@yahoo.com','W','3.5','2024','Mx7.5','','',1721357760,'','','','',''),(286,'Roy','Molseed','roy.molseee@gmail.com','M','4.0','Jeannette','Hoggart','queenbee95051@@yahoo.com','W','3.5','2024','Mx7.5','','',1721358132,'','','','',''),(283,'Marc','Lee','roy.molseee@gmail.com','M','3.5','Jean','Quan','queenbee95051@@yahoo.com','W','3.5','2024','Mx6.5','','',1721357441,'','','','',''),(282,'Marc','Lee','roy.molseee@gmail.com','M','3.5','Jean','Quan','queenbee95051@@yahoo.com','W','3.5','2024','Mx6.5','','',1721357344,'','','','','');

UNLOCK TABLES;


