-- MariaDB dump 10.19  Distrib 10.4.19-MariaDB, for Win64 (AMD64)
--
-- Host: localhost    Database: leaguetracker
-- ------------------------------------------------------
-- Server version	10.4.19-MariaDB

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Table structure for table `coaches`
--

DROP TABLE IF EXISTS `coaches`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `coaches` (
  `coachID` int(11) NOT NULL,
  `coachType` varchar(45) DEFAULT NULL,
  `coachFirstName` varchar(45) DEFAULT NULL,
  `coachLastName` varchar(45) DEFAULT NULL,
  `hasClearances` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`coachID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `coaches`
--

LOCK TABLES `coaches` WRITE;
/*!40000 ALTER TABLE `coaches` DISABLE KEYS */;
INSERT INTO `coaches` VALUES (1,'','James','Scott','TRUE'),(2,'','Robert','Torres','TRUE'),(3,'','John','Nguyen','TRUE'),(4,'','Michael','Hill','TRUE'),(5,'','William','Flores','TRUE'),(6,'','David','Green','TRUE'),(7,'','Richard','Adams','TRUE'),(8,'','Joseph','Nelson','TRUE'),(9,'','Thomas','Baker','TRUE'),(10,'','Charles','Hall','TRUE'),(11,'','Christopher','Rivera','TRUE'),(12,'','Daniel','Campbell','TRUE'),(13,'','Matthew','Mitchell','TRUE'),(14,'','Anthony','Carter','TRUE'),(15,'','Mark','Roberts','TRUE'),(16,'','Donald','Gomez','TRUE'),(17,'','Steven','Phillips','TRUE'),(18,'','Paul','Evans','TRUE'),(19,'','Andrew','Turner','TRUE'),(20,'','Joshua','Diaz','TRUE'),(21,'','Kenneth','Parker','TRUE'),(22,'','Kevin','Cruz','TRUE'),(23,'','Brian','Edwards','TRUE'),(24,'','George','Collins','TRUE'),(25,'','Edward','Reyes','TRUE'),(26,'','Ronald','Stewart','TRUE'),(27,'','Timothy','Morris','TRUE'),(28,'','Jason','Morales','TRUE'),(29,'','Jeffrey','Murphy','TRUE'),(30,'','Ryan','Cook','TRUE'),(31,'','Jacob','Rogers','TRUE'),(32,'','Gary','Gutierrez','TRUE'),(33,'','Nicholas','Ortiz','TRUE'),(34,'','Eric','Morgan','TRUE'),(35,'','Jonathan','Cooper','TRUE'),(36,'','Stephen','Peterson','TRUE'),(37,'','Larry','Bailey','TRUE'),(38,'','Justin','Reed','TRUE'),(39,'','Scott','Kelly','TRUE'),(40,'','Brandon','Howard','TRUE'),(41,'','Benjamin','Ramos','TRUE'),(42,'','Samuel','Kim','TRUE'),(43,'','Gregory','Cox','TRUE'),(44,'','Frank','Ward','TRUE'),(45,'','Alexander','Richardson','TRUE'),(46,'','Raymond','Watson','TRUE'),(47,'','Patrick','Brooks','TRUE'),(48,'','Jack','Chavez','TRUE'),(49,'','Dennis','Wood','TRUE'),(50,'','Jerry','James','TRUE'),(51,'','Tyler','Bennet','TRUE'),(52,'','Aaron','Gray','TRUE'),(53,'','Jose','Mendoza','TRUE'),(54,'','Adam','Ruiz','TRUE'),(55,'','Henry','Hughes','TRUE'),(56,'','Nathan','Price','TRUE'),(57,'','Douglas','Alvarez','TRUE'),(58,'','Zachary','Castillo','TRUE'),(59,'','Peter','Sanders','TRUE'),(60,'','Kyle','Patel','TRUE');
/*!40000 ALTER TABLE `coaches` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `coaches_has_teams`
--

DROP TABLE IF EXISTS `coaches_has_teams`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `coaches_has_teams` (
  `coaches_coachID` int(11) NOT NULL,
  `teams_teamID` int(11) NOT NULL,
  PRIMARY KEY (`coaches_coachID`,`teams_teamID`),
  KEY `fk_coaches_has_teams_teams1` (`teams_teamID`),
  CONSTRAINT `fk_coaches_has_teams_coaches1` FOREIGN KEY (`coaches_coachID`) REFERENCES `coaches` (`coachID`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_coaches_has_teams_teams1` FOREIGN KEY (`teams_teamID`) REFERENCES `teams` (`teamID`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `coaches_has_teams`
--

LOCK TABLES `coaches_has_teams` WRITE;
/*!40000 ALTER TABLE `coaches_has_teams` DISABLE KEYS */;
INSERT INTO `coaches_has_teams` VALUES (1,1),(2,2),(3,3),(4,4),(5,5),(6,6),(7,7),(8,8),(9,9),(10,10),(11,11),(12,12),(13,13),(14,14),(15,15),(16,16),(17,17),(18,18),(19,19),(20,20),(21,21),(22,22),(23,23),(24,24),(25,25),(26,26),(27,27),(28,28),(29,29),(30,30),(31,31),(32,32),(33,33),(34,34),(35,2),(36,4),(37,6),(38,8),(39,10),(40,12),(41,14),(42,16),(43,18),(44,20),(45,22),(46,24),(47,1),(48,3),(49,5),(50,7),(51,9),(52,11),(53,13),(54,15),(55,17),(56,19),(57,21),(58,23),(59,25),(60,27);
/*!40000 ALTER TABLE `coaches_has_teams` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `divisions`
--

DROP TABLE IF EXISTS `divisions`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `divisions` (
  `divisionID` int(11) NOT NULL,
  `divisionName` varchar(45) DEFAULT NULL,
  `startAgeDOB` date DEFAULT NULL,
  `endAgeDOB` date DEFAULT NULL,
  `cost` int(11) DEFAULT NULL,
  PRIMARY KEY (`divisionID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `divisions`
--

LOCK TABLES `divisions` WRITE;
/*!40000 ALTER TABLE `divisions` DISABLE KEYS */;
INSERT INTO `divisions` VALUES (1,'Seniors','2004-01-01','2005-12-31',185),(2,'Juniors','2006-01-01','2007-12-31',185),(3,'Intermediate','2008-01-01','2009-12-31',175),(4,'Majors','2010-01-01','2011-12-31',165),(5,'Minors','2012-01-01','2013-12-31',155),(6,'TeeBall','2014-01-01','2016-12-31',145);
/*!40000 ALTER TABLE `divisions` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `family`
--

DROP TABLE IF EXISTS `family`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `family` (
  `familyID` int(11) NOT NULL,
  `contact1FirstName` varchar(45) DEFAULT NULL,
  `contact1LastName` varchar(45) DEFAULT NULL,
  `contact2FirstName` varchar(45) DEFAULT NULL,
  `contact2LastName` varchar(45) DEFAULT NULL,
  `addressLine1` varchar(45) DEFAULT NULL,
  `addressLine2` varchar(45) DEFAULT NULL,
  `city` varchar(45) DEFAULT NULL,
  `state` varchar(45) DEFAULT NULL,
  `zipCode` varchar(45) DEFAULT NULL,
  `PrimaryPhone` int(10) DEFAULT NULL,
  `email` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`familyID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `family`
--

LOCK TABLES `family` WRITE;
/*!40000 ALTER TABLE `family` DISABLE KEYS */;
INSERT INTO `family` VALUES (1,'Jim','Smith','Beth','Smith','101 Main St','','West Chester','PA','19380',2147483647,'Jim.Smith999@gmail.com'),(2,'Joe','Johnson','Mary','Johnson','12 Fox Lane','','Malvern','NJ','19382',2147483647,'Joe.Johnson999@gmail.com'),(3,'Bill','Williams','Diane','Williams','243 Circle Drive','','Bryn Mawr','DE','19358',2147483647,'Bill.Williams999@gmail.com'),(4,'Bob','Brown','Corine','Brown','3434 Forest Lane','','Rosemont','MD','19562',2147483647,'Bob.Brown999@gmail.com'),(5,'Will','Jones','Kristen','Jones','3464 Woodback circle','','Berwyn','PA','19458',2147483647,'Will.Jones999@gmail.com'),(6,'Butch','Garcia','Kyle','Garcia','34343 Mill Rd','','Paoli','NJ','19575',2147483647,'Butch.Garcia999@gmail.com'),(7,'Ryan','Miller','Kim','Miller','3444 Roberts Road','','Exton','DE','19754',2147483647,'Ryan.Miller999@gmail.com'),(8,'Dan','Davis','Chloe','Davis','345 Wynnewood Ave','','Downingtown','MD','18555',2147483647,'Dan.Davis999@gmail.com'),(9,'Frank','Rodriguez','Kolbe','Rodriguez','5534 Pine Street','','Reading','PA','14587',2147483647,'Frank.Rodriguez999@gmail.com'),(10,'Sean','Martinez','Nancy','Martinez','345 Market Street','','Eagle','NJ','12563',2147483647,'Sean.Martinez999@gmail.com'),(11,'Colin','Hernandez','Angie','Hernandez','384 Walnut Streer','','Collegeville','DE','15687',2147483647,'Colin.Hernandez999@gmail.com'),(12,'Mike','Lopez','Trisha','Lopez','2399 Locust Lane','','Media','MD','15763',2147483647,'Mike.Lopez999@gmail.com'),(13,'Matt','Gonzalez','Stacy','Gonzalez','35 Broad Street','','Berwyn','PA','23689',2147483647,'Matt.Gonzalez999@gmail.com'),(14,'Chris','Wilson','Brigid','Wilson','348 Jaxon Lane','','Paoli','NJ','45858',2147483647,'Chris.Wilson999@gmail.com'),(15,'John','Anderson','Margaret','Anderson','838 Dunwoody Drive','','Exton','DE','75848',2147483647,'John.Anderson999@gmail.com'),(16,'Tyler','Thomas','Darlene','Thomas','389 Dawn Lane','','Downingtown','MD','25456',2147483647,'Tyler.Thomas999@gmail.com'),(17,'Ethan','Taylor','Debbie','Taylor','533 Rover Lane','','Reading','PA','25789',2147483647,'Ethan.Taylor999@gmail.com'),(18,'Brady','Moore','Katie','Moore','354 Cairn Drive','','Eagle','NJ','36985',2147483647,'Brady.Moore999@gmail.com'),(19,'Jerry','Jackson','Olivia','Jackson','536 Bulldog Drive','','Collegeville','DE','15682',2147483647,'Jerry.Jackson999@gmail.com'),(20,'Bill','Martin','Aubrey','Martin','56 Eagle View Circle','','Media','MD','25877',2147483647,'Bill.Martin999@gmail.com');
/*!40000 ALTER TABLE `family` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `invoice`
--

DROP TABLE IF EXISTS `invoice`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `invoice` (
  `invoiceID` int(11) NOT NULL,
  `family_familyID` int(11) NOT NULL,
  `paidStatus` varchar(45) DEFAULT NULL,
  `amount` int(11) DEFAULT NULL,
  PRIMARY KEY (`invoiceID`,`family_familyID`),
  KEY `fk_invoice_family1` (`family_familyID`),
  CONSTRAINT `fk_invoice_family1` FOREIGN KEY (`family_familyID`) REFERENCES `family` (`familyID`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `invoice`
--

LOCK TABLES `invoice` WRITE;
/*!40000 ALTER TABLE `invoice` DISABLE KEYS */;
INSERT INTO `invoice` VALUES (1,1,'TRUE',145),(2,2,'TRUE',145),(3,3,'TRUE',145),(4,4,'TRUE',145),(5,5,'TRUE',145),(6,6,'FALSE',145),(7,7,'TRUE',145),(8,8,'FALSE',145),(9,9,'TRUE',145),(10,10,'TRUE',145),(11,11,'FALSE',145),(12,12,'TRUE',145),(13,13,'FALSE',145),(14,14,'TRUE',145),(15,15,'TRUE',145),(16,16,'FALSE',155),(17,17,'TRUE',155),(18,18,'FALSE',155),(19,19,'TRUE',155),(20,20,'TRUE',155),(21,2,'FALSE',155),(22,4,'TRUE',155),(23,6,'TRUE',155),(24,8,'TRUE',155),(25,10,'TRUE',155),(26,12,'TRUE',155),(27,14,'FALSE',155),(28,16,'TRUE',165),(29,18,'FALSE',165),(30,20,'TRUE',165),(31,1,'TRUE',165),(32,2,'TRUE',165),(33,3,'TRUE',165),(34,4,'TRUE',165),(35,5,'FALSE',165),(36,6,'TRUE',165),(37,7,'FALSE',165),(38,8,'TRUE',175),(39,9,'TRUE',175),(40,10,'TRUE',175),(41,11,'TRUE',175),(42,12,'TRUE',175),(43,13,'FALSE',175),(44,14,'TRUE',185),(45,15,'FALSE',185),(46,16,'TRUE',185),(47,17,'TRUE',185),(48,18,'TRUE',185),(49,19,'TRUE',185),(50,20,'TRUE',185);
/*!40000 ALTER TABLE `invoice` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `player`
--

DROP TABLE IF EXISTS `player`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `player` (
  `playerID` int(11) NOT NULL,
  `playerFirstName` varchar(45) DEFAULT NULL,
  `playerLastName` varchar(45) DEFAULT NULL,
  `dateOfBirth` date DEFAULT NULL,
  `family_familyID` int(11) NOT NULL,
  `teams_teamID` int(11) NOT NULL,
  `registrationDate` date DEFAULT NULL,
  PRIMARY KEY (`playerID`,`family_familyID`,`teams_teamID`),
  KEY `fk_player_family` (`family_familyID`),
  KEY `fk_player_teams1` (`teams_teamID`),
  CONSTRAINT `fk_player_family` FOREIGN KEY (`family_familyID`) REFERENCES `family` (`familyID`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_player_teams1` FOREIGN KEY (`teams_teamID`) REFERENCES `teams` (`teamID`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `player`
--

LOCK TABLES `player` WRITE;
/*!40000 ALTER TABLE `player` DISABLE KEYS */;
INSERT INTO `player` VALUES (1,'James','Smith','2016-04-09',1,2,'2021-06-26'),(2,'Robert','Johnson','2015-04-10',2,2,'2021-06-26'),(3,'John','Williams','2016-04-09',3,2,'2021-06-26'),(4,'Michael','Brown','2015-04-10',4,4,'2021-06-26'),(5,'William','Jones','2016-04-10',5,4,'2021-06-26'),(6,'David','Garcia','2015-04-11',6,4,'2021-06-26'),(7,'Richard','Miller','2016-04-10',7,4,'2021-06-26'),(8,'Joseph','Davis','2015-04-11',8,4,'2021-06-26'),(9,'Thomas','Rodriguez','2016-04-11',9,4,'2021-06-26'),(10,'Charles','Martinez','2015-04-12',10,4,'2021-06-26'),(11,'Christopher','Hernandez','2016-04-11',11,4,'2021-06-26'),(12,'Daniel','Lopez','2015-04-12',12,4,'2021-06-26'),(13,'Matthew','Gonzalez','2016-04-12',13,4,'2021-06-26'),(14,'Anthony','Wilson','2015-04-13',14,4,'2021-06-26'),(15,'Mark','Anderson','2016-04-12',15,4,'2021-06-26'),(16,'Donald','Thomas','2012-04-09',16,13,'2021-06-26'),(17,'Steven','Taylor','2013-04-10',17,13,'2021-06-26'),(18,'Paul','Moore','2012-04-09',18,13,'2021-06-26'),(19,'Andrew','Jackson','2013-04-10',19,13,'2021-06-26'),(20,'Joshua','Martin','2012-04-10',20,13,'2021-06-26'),(21,'Kenneth','Johnson','2013-04-11',2,13,'2021-06-26'),(22,'Kevin','Brown','2012-04-10',4,14,'2021-06-26'),(23,'Brian','Garcia','2013-04-11',6,14,'2021-06-26'),(24,'George','Davis','2012-04-11',8,14,'2021-06-26'),(25,'Edward','Martinez','2013-04-12',10,14,'2021-06-26'),(26,'Ronald','Lopez','2012-04-11',12,14,'2021-06-26'),(27,'Timothy','Wilson','2013-04-12',14,14,'2021-06-26'),(28,'Jason','Thomas','2011-04-09',16,21,'2021-06-26'),(29,'Jeffrey','Moore','2010-04-10',18,22,'2021-06-26'),(30,'Ryan','Martin','2011-04-09',20,21,'2021-06-26'),(31,'Jacob','Smith','2010-04-10',1,22,'2021-06-26'),(32,'Gary','Johnson','2011-04-09',2,21,'2021-06-26'),(33,'Nicholas','Williams','2010-04-10',3,22,'2021-06-26'),(34,'Eric','Brown','2011-04-09',4,21,'2021-06-26'),(35,'Jonathan','Jones','2010-04-10',5,22,'2021-06-26'),(36,'Stephen','Garcia','2011-04-09',6,21,'2021-06-26'),(37,'Larry','Miller','2010-04-10',7,22,'2021-06-26'),(38,'Justin','Davis','2009-04-09',8,25,'2021-06-26'),(39,'Scott','Rodriguez','2008-04-10',9,25,'2021-06-26'),(40,'Brandon','Martinez','2009-04-09',10,25,'2021-06-26'),(41,'Benjamin','Hernandez','2008-04-10',11,25,'2021-06-26'),(42,'Samuel','Lopez','2009-04-09',12,25,'2021-06-26'),(43,'Gregory','Gonzalez','2008-04-10',13,25,'2021-06-26'),(44,'Frank','Wilson','2007-04-09',14,30,'2021-06-26'),(45,'Alexander','Anderson','2006-04-10',15,30,'2021-06-26'),(46,'Raymond','Thomas','2007-04-10',16,30,'2021-06-26'),(47,'Patrick','Taylor','2006-04-11',17,30,'2021-06-26'),(48,'Jack','Moore','2007-04-11',18,30,'2021-06-26'),(49,'Dennis','Jackson','2006-04-12',19,30,'2021-06-26'),(50,'Jerry','Martin','2007-04-12',20,30,'2021-06-26');
/*!40000 ALTER TABLE `player` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `teams`
--

DROP TABLE IF EXISTS `teams`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `teams` (
  `teamID` int(11) NOT NULL,
  `teamName` varchar(45) DEFAULT NULL,
  `divisions_divisionID` int(11) NOT NULL,
  PRIMARY KEY (`teamID`,`divisions_divisionID`),
  KEY `fk_teams_divisions1` (`divisions_divisionID`),
  CONSTRAINT `fk_teams_divisions1` FOREIGN KEY (`divisions_divisionID`) REFERENCES `divisions` (`divisionID`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `teams`
--

LOCK TABLES `teams` WRITE;
/*!40000 ALTER TABLE `teams` DISABLE KEYS */;
INSERT INTO `teams` VALUES (1,'Angels',6),(2,'Astros',6),(3,'Athletics',6),(4,'Blue Jays',6),(5,'Braves',6),(6,'Brewers',6),(7,'Cardinals',6),(8,'Cardinals Red',6),(9,'Colorado',6),(10,'Cubs Blue',6),(11,'Cubs Red',5),(12,'Diamondbacks',5),(13,'Dodgers',5),(14,'Giants',5),(15,'Indians',5),(16,'Mariners',5),(17,'Marlins',5),(18,'Mets',5),(19,'Nationals',4),(20,'Orioles',4),(21,'Padres',4),(22,'Phillies',4),(23,'Pirates',3),(24,'Rangers',3),(25,'Rays',3),(26,'Reds',3),(27,'Red Sox',3),(28,'Rockies',3),(29,'Royals',2),(30,'Tigers',2),(31,'Twins',2),(32,'White Sox',1),(33,'Yankees',1),(34,'Hawks',1);
/*!40000 ALTER TABLE `teams` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2021-06-26 18:11:11
