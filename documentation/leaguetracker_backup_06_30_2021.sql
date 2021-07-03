-- MySQL dump 10.13  Distrib 8.0.21, for Win64 (x86_64)
--
-- Host: localhost    Database: leaguetracker
-- ------------------------------------------------------
-- Server version	8.0.21

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!50503 SET NAMES utf8mb4 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Table structure for table `coach`
--

DROP TABLE IF EXISTS `coach`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `coach` (
  `coachID` int NOT NULL AUTO_INCREMENT,
  `coachType` varchar(45) DEFAULT NULL,
  `coachFirstName` varchar(45) DEFAULT NULL,
  `coachLastName` varchar(45) DEFAULT NULL,
  `hasClearances` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`coachID`)
) ENGINE=InnoDB AUTO_INCREMENT=61 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `coach`
--

LOCK TABLES `coach` WRITE;
/*!40000 ALTER TABLE `coach` DISABLE KEYS */;
INSERT INTO `coach` VALUES (1,'Hitting','James','Scott','TRUE'),(2,'Pitching','Robert','Torres','TRUE'),(3,'Manager','John','Nguyen','TRUE'),(4,'Assistant','Michael','Hill','TRUE'),(5,'Hitting','William','Flores','TRUE'),(6,'Pitching','David','Green','FALSE'),(7,'Manager','Richard','Adams','FALSE'),(8,'Assistant','Joseph','Nelson','FALSE'),(9,'Hitting','Thomas','Baker','FALSE'),(10,'Pitching','Charles','Hall','FALSE'),(11,'Manager','Christopher','Rivera','FALSE'),(12,'Assistant','Daniel','Campbell','FALSE'),(13,'Hitting','Matthew','Mitchell','TRUE'),(14,'Pitching','Anthony','Carter','TRUE'),(15,'Manager','Mark','Roberts','TRUE'),(16,'Assistant','Donald','Gomez','TRUE'),(17,'Hitting','Steven','Phillips','TRUE'),(18,'Pitching','Paul','Evans','TRUE'),(19,'Manager','Andrew','Turner','TRUE'),(20,'Assistant','Joshua','Diaz','TRUE'),(21,'Hitting','Kenneth','Parker','TRUE'),(22,'Pitching','Kevin','Cruz','TRUE'),(23,'Manager','Brian','Edwards','TRUE'),(24,'Assistant','George','Collins','TRUE'),(25,'Hitting','Edward','Reyes','TRUE'),(26,'Pitching','Ronald','Stewart','TRUE'),(27,'Manager','Timothy','Morris','TRUE'),(28,'Assistant','Jason','Morales','TRUE'),(29,'Hitting','Jeffrey','Murphy','TRUE'),(30,'Pitching','Ryan','Cook','TRUE'),(31,'Manager','Jacob','Rogers','TRUE'),(32,'Assistant','Gary','Gutierrez','TRUE'),(33,'Hitting','Nicholas','Ortiz','TRUE'),(34,'Pitching','Eric','Morgan','TRUE'),(35,'Manager','Jonathan','Cooper','TRUE'),(36,'Assistant','Stephen','Peterson','TRUE'),(37,'Hitting','Larry','Bailey','TRUE'),(38,'Pitching','Justin','Reed','TRUE'),(39,'Manager','Scott','Kelly','TRUE'),(40,'Assistant','Brandon','Howard','TRUE'),(41,'Hitting','Benjamin','Ramos','TRUE'),(42,'Pitching','Samuel','Kim','TRUE'),(43,'Manager','Gregory','Cox','TRUE'),(44,'Assistant','Frank','Ward','TRUE'),(45,'Hitting','Alexander','Richardson','TRUE'),(46,'Pitching','Raymond','Watson','TRUE'),(47,'Manager','Patrick','Brooks','TRUE'),(48,'Assistant','Jack','Chavez','TRUE'),(49,'Hitting','Dennis','Wood','TRUE'),(50,'Pitching','Jerry','James','TRUE'),(51,'Manager','Tyler','Bennet','TRUE'),(52,'Assistant','Aaron','Gray','TRUE'),(53,'Hitting','Jose','Mendoza','TRUE'),(54,'Pitching','Adam','Ruiz','TRUE'),(55,'Manager','Henry','Hughes','TRUE'),(56,'Assistant','Nathan','Price','TRUE'),(57,'Hitting','Douglas','Alvarez','TRUE'),(58,'Pitching','Zachary','Castillo','TRUE'),(59,'Manager','Peter','Sanders','TRUE'),(60,'Assistant','Kyle','Patel','TRUE');
/*!40000 ALTER TABLE `coach` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `coach_has_team`
--

DROP TABLE IF EXISTS `coach_has_team`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `coach_has_team` (
  `coachID` int NOT NULL,
  `teamID` int NOT NULL,
  PRIMARY KEY (`coachID`,`teamID`),
  KEY `fk_coach_has_team_team1_idx` (`teamID`),
  KEY `fk_coach_has_team_coach1_idx` (`coachID`),
  CONSTRAINT `fk_coach_has_team_coach1` FOREIGN KEY (`coachID`) REFERENCES `coach` (`coachID`),
  CONSTRAINT `fk_coach_has_team_team1` FOREIGN KEY (`teamID`) REFERENCES `team` (`teamID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `coach_has_team`
--

LOCK TABLES `coach_has_team` WRITE;
/*!40000 ALTER TABLE `coach_has_team` DISABLE KEYS */;
INSERT INTO `coach_has_team` VALUES (1,1),(47,1),(2,2),(35,2),(3,3),(48,3),(4,4),(36,4),(5,5),(49,5),(6,6),(37,6),(7,7),(50,7),(8,8),(38,8),(9,9),(51,9),(10,10),(39,10),(11,11),(52,11),(12,12),(40,12),(13,13),(53,13),(14,14),(41,14),(15,15),(54,15),(16,16),(42,16),(17,17),(55,17),(18,18),(43,18),(19,19),(56,19),(20,20),(44,20),(21,21),(57,21),(22,22),(45,22),(23,23),(58,23),(24,24),(46,24),(25,25),(59,25),(26,26),(27,27),(60,27),(28,28),(29,29),(30,30),(31,31),(32,32),(33,33),(34,34);
/*!40000 ALTER TABLE `coach_has_team` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `division`
--

DROP TABLE IF EXISTS `division`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `division` (
  `divisionID` int NOT NULL AUTO_INCREMENT,
  `divisionName` varchar(45) DEFAULT NULL,
  `startAgeDOB` date DEFAULT NULL,
  `endAgeDOB` date DEFAULT NULL,
  `cost` int DEFAULT NULL,
  PRIMARY KEY (`divisionID`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `division`
--

LOCK TABLES `division` WRITE;
/*!40000 ALTER TABLE `division` DISABLE KEYS */;
INSERT INTO `division` VALUES (1,'Seniors','2004-01-01','2005-12-31',185),(2,'Juniors','2006-01-01','2007-12-31',190),(3,'Intermediate','2008-01-01','2009-12-31',175),(4,'Majors','2010-01-01','2011-12-31',165),(5,'Minors','2012-01-01','2013-12-31',155),(6,'TeeBall','2014-01-01','2016-12-31',145);
/*!40000 ALTER TABLE `division` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `family`
--

DROP TABLE IF EXISTS `family`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `family` (
  `familyID` int NOT NULL AUTO_INCREMENT,
  `contact1FirstName` varchar(45) DEFAULT NULL,
  `contact1LastName` varchar(45) DEFAULT NULL,
  `contact2FirstName` varchar(45) DEFAULT NULL,
  `contact2LastName` varchar(45) DEFAULT NULL,
  `addressLine1` varchar(45) DEFAULT NULL,
  `addressLine2` varchar(45) DEFAULT NULL,
  `city` varchar(45) DEFAULT NULL,
  `state` varchar(45) DEFAULT NULL,
  `zipCode` varchar(45) DEFAULT NULL,
  `PrimaryPhone` int DEFAULT NULL,
  `email` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`familyID`)
) ENGINE=InnoDB AUTO_INCREMENT=25 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `family`
--

LOCK TABLES `family` WRITE;
/*!40000 ALTER TABLE `family` DISABLE KEYS */;
INSERT INTO `family` VALUES (1,'Jim','Smith','Beth','Smith','101 Main St','','West Chester','PA','19380',2147483647,'Jim.Smith999@gmail.com'),(2,'Joe','Johnson','Mary','Johnson','12 Fox Lane','','Malvern','NJ','19382',2147483647,'Joe.Johnson999@gmail.com'),(3,'Bill','Williams','Diane','Williams','243 Circle Drive','','Bryn Mawr','DE','19358',2147483647,'Bill.Williams999@gmail.com'),(4,'Bob','Brown','Corine','Brown','3434 Forest Lane','','Rosemont','MD','19562',2147483647,'Bob.Brown999@gmail.com'),(5,'Will','Jones','Kristen','Jones','3464 Woodback circle','','Berwyn','PA','19458',2147483647,'Will.Jones999@gmail.com'),(6,'Butch','Garcia','Kyle','Garcia','34343 Mill Rd','','Paoli','NJ','19575',2147483647,'Butch.Garcia999@gmail.com'),(7,'Ryan','Miller','Kim','Miller','3444 Roberts Road','','Exton','DE','19754',2147483647,'Ryan.Miller999@gmail.com'),(8,'Dan','Davis','Chloe','Davis','345 Wynnewood Ave','','Downingtown','MD','18555',2147483647,'Dan.Davis999@gmail.com'),(9,'Frank','Rodriguez','Kolbe','Rodriguez','5534 Pine Street','','Reading','PA','14587',2147483647,'Frank.Rodriguez999@gmail.com'),(10,'Sean','Martinez','Nancy','Martinez','345 Market Street','','Eagle','NJ','12563',2147483647,'Sean.Martinez999@gmail.com'),(11,'Colin','Hernandez','Angie','Hernandez','384 Walnut Streer','','Collegeville','DE','15687',2147483647,'Colin.Hernandez999@gmail.com'),(12,'Mike','Lopez','Trisha','Lopez','2399 Locust Lane','','Media','MD','15763',2147483647,'Mike.Lopez999@gmail.com'),(13,'Matt','Gonzalez','Stacy','Gonzalez','35 Broad Street','','Berwyn','PA','23689',2147483647,'Matt.Gonzalez999@gmail.com'),(14,'Chris','Wilson','Brigid','Wilson','348 Jaxon Lane','','Paoli','NJ','45858',2147483647,'Chris.Wilson999@gmail.com'),(15,'John','Anderson','Margaret','Anderson','838 Dunwoody Drive','','Middletown','DE','75848',2147483647,'John.Anderson999@gmail.com'),(16,'Tyler','Thomas','Darlene','Thomas','389 Dawn Lane','','Downingtown','MD','25456',2147483647,'Tyler.Thomas999@gmail.com'),(17,'Ethan','Taylor','Debbie','Taylor','533 Rover Lane','','Reading','PA','25789',2147483647,'Ethan.Taylor999@gmail.com'),(18,'Brady','Moore','Katie','Moore','354 Cairn Drive','','Eagle','NJ','36985',2147483647,'Brady.Moore999@gmail.com'),(19,'Jerry','Jackson','Olivia','Jackson','536 Bulldog Drive','','Collegeville','DE','15682',2147483647,'Jerry.Jackson999@gmail.com'),(20,'Bill','Martin','Aubrey','Martin','56 Eagle View Circle','','Media','MD','25877',2147483647,'Bill.Martin999@gmail.com'),(22,'Willaim','Laird','Darlene','Laird','56 Bulldog Way',NULL,'Exton','PA','19380',2147483647,'0'),(23,'Butch','Laird','Dar','Laird','45 Street Rd','','malvern','PA','19380',5551212,'email@hotmail.com'),(24,'Butch','Laird','Dar','Laird','45 Street Rd',NULL,'malvern','PA','19380',555,'0');
/*!40000 ALTER TABLE `family` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `invoice`
--

DROP TABLE IF EXISTS `invoice`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `invoice` (
  `invoiceID` int NOT NULL AUTO_INCREMENT,
  `familyID` int NOT NULL,
  `paidStatus` varchar(45) DEFAULT NULL,
  `amount` int DEFAULT NULL,
  PRIMARY KEY (`invoiceID`,`familyID`),
  KEY `fk_invoice_family1_idx` (`familyID`),
  CONSTRAINT `fk_invoice_family1` FOREIGN KEY (`familyID`) REFERENCES `family` (`familyID`)
) ENGINE=InnoDB AUTO_INCREMENT=51 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `invoice`
--

LOCK TABLES `invoice` WRITE;
/*!40000 ALTER TABLE `invoice` DISABLE KEYS */;
INSERT INTO `invoice` VALUES (1,1,'TRUE',145),(2,2,'TRUE',145),(3,3,'TRUE',145),(4,4,'TRUE',145),(5,5,'TRUE',145),(6,6,'True',145),(7,7,'TRUE',145),(8,8,'FALSE',145),(9,9,'TRUE',145),(10,10,'TRUE',145),(11,11,'FALSE',145),(12,12,'TRUE',145),(13,13,'FALSE',145),(14,14,'TRUE',145),(15,15,'TRUE',145),(16,16,'FALSE',155),(17,17,'TRUE',155),(18,18,'FALSE',155),(19,19,'TRUE',155),(20,20,'TRUE',155),(21,2,'FALSE',155),(22,4,'TRUE',155),(23,6,'TRUE',155),(24,8,'TRUE',155),(25,10,'TRUE',155),(26,12,'TRUE',155),(27,14,'FALSE',155),(28,16,'TRUE',165),(29,18,'FALSE',165),(30,20,'TRUE',165),(31,1,'TRUE',165),(32,2,'TRUE',165),(33,3,'TRUE',165),(34,4,'TRUE',165),(35,5,'FALSE',165),(36,6,'TRUE',165),(37,7,'FALSE',165),(38,8,'TRUE',175),(39,9,'TRUE',175),(40,10,'TRUE',175),(41,11,'TRUE',175),(42,12,'TRUE',175),(43,13,'FALSE',175),(44,14,'TRUE',185),(45,15,'FALSE',185),(46,16,'TRUE',185),(47,17,'TRUE',185),(48,18,'TRUE',185),(49,19,'TRUE',185),(50,20,'TRUE',185);
/*!40000 ALTER TABLE `invoice` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `player`
--

DROP TABLE IF EXISTS `player`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `player` (
  `playerID` int NOT NULL AUTO_INCREMENT,
  `playerFirstName` varchar(45) DEFAULT NULL,
  `playerLastName` varchar(45) DEFAULT NULL,
  `dateOfBirth` date DEFAULT NULL,
  `familyID` int NOT NULL,
  `teamID` int DEFAULT NULL,
  `registrationDate` date DEFAULT NULL,
  PRIMARY KEY (`playerID`),
  KEY `fk_player_family_idx` (`familyID`),
  KEY `fk_player_team1_idx` (`teamID`),
  CONSTRAINT `fk_player_family` FOREIGN KEY (`familyID`) REFERENCES `family` (`familyID`),
  CONSTRAINT `fk_player_team1` FOREIGN KEY (`teamID`) REFERENCES `team` (`teamID`)
) ENGINE=InnoDB AUTO_INCREMENT=54 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `player`
--

LOCK TABLES `player` WRITE;
/*!40000 ALTER TABLE `player` DISABLE KEYS */;
INSERT INTO `player` VALUES (12,'Daniel','Lopez','2015-04-12',12,4,'2006-06-26'),(13,'Matthew','Gonzalez','2016-04-12',13,4,'2010-06-26'),(14,'Anthony','Wilson','2015-04-13',14,4,'2012-06-26'),(15,'Mark','Anderson','2016-04-12',15,5,'2014-06-26'),(16,'Donald','Thomas','2012-04-09',16,13,'2004-06-26'),(17,'Steven','Taylor','2013-04-10',17,13,'2006-06-26'),(18,'Paul','Moore','2012-04-09',18,13,'2010-06-26'),(19,'Andrew','Jackson','2013-04-10',19,13,'2012-06-26'),(20,'Joshua','Martin','2012-04-10',20,13,'2014-06-26'),(21,'Kenneth','Johnson','2013-04-11',2,13,'2004-06-26'),(22,'Kevin','Brown','2012-04-10',4,14,'2006-06-26'),(23,'Brian','Garcia','2013-04-11',6,14,'2010-06-26'),(24,'George','Davis','2012-04-11',8,14,'2012-06-26'),(25,'Edward','Martinez','2013-04-12',10,14,'2014-06-26'),(26,'Ronald','Lopez','2012-04-11',12,14,'2004-06-26'),(27,'Timothy','Wilson','2013-04-12',14,14,'2006-06-26'),(28,'Jason','Thomas','2011-04-09',16,21,'2010-06-26'),(29,'Jeffrey','Moore','2010-04-10',18,22,'2012-06-26'),(30,'Ryan','Martin','2011-04-09',20,21,'2014-06-26'),(31,'Jacob','Smith','2010-04-10',1,22,'2004-06-26'),(32,'Gary','Johnson','2011-04-09',2,21,'2006-06-26'),(33,'Nicholas','Williams','2010-04-10',3,22,'2010-06-26'),(34,'Eric','Brown','2011-04-09',4,21,'2012-06-26'),(35,'Johnny','Jones','2010-04-10',5,22,'2014-06-26'),(36,'Stephen','Garcia','2011-04-09',6,21,'2004-06-26'),(37,'Larry','Miller','2010-04-10',7,22,'2006-06-26'),(38,'Justin','Davis','2009-04-09',8,25,'2010-06-26'),(39,'Scott','Rodriguez','2008-04-10',9,25,'2012-06-26'),(40,'Brandon','Martinez','2009-04-09',10,25,'2014-06-26'),(41,'Benjamin','Hernandez','2008-04-10',11,25,'2004-06-26'),(42,'Samuel','Lopez','2009-04-09',12,25,'2006-06-26'),(43,'Gregory','Gonzalez','2008-04-10',13,25,'2010-06-26'),(44,'Frank','Wilson','2007-04-09',14,30,'2012-06-26'),(45,'Alexander','Anderson','2006-04-10',15,30,'2014-06-26'),(46,'Raymond','Thomas','2007-04-10',16,30,'2004-06-26'),(47,'Patrick','Taylor','2006-04-11',17,30,'2006-06-26'),(48,'Jack','Moore','2007-04-11',18,30,'2010-06-26'),(49,'Dennis','Jackson','2006-04-12',19,30,'2012-06-26'),(50,'Jerry','Martin','2007-04-12',20,30,'2014-06-26'),(51,'Michale','Scott','2008-05-01',15,NULL,'2021-06-30'),(52,'Johnny','Uebely','2005-05-05',15,NULL,'2021-06-30'),(53,'Brady','Laird','2005-07-01',23,34,'2021-06-30');
/*!40000 ALTER TABLE `player` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `team`
--

DROP TABLE IF EXISTS `team`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `team` (
  `teamID` int NOT NULL AUTO_INCREMENT,
  `teamName` varchar(45) DEFAULT NULL,
  `divisionID` int NOT NULL,
  PRIMARY KEY (`teamID`,`divisionID`),
  KEY `fk_team_division1_idx` (`divisionID`),
  CONSTRAINT `fk_team_division1` FOREIGN KEY (`divisionID`) REFERENCES `division` (`divisionID`)
) ENGINE=InnoDB AUTO_INCREMENT=40 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `team`
--

LOCK TABLES `team` WRITE;
/*!40000 ALTER TABLE `team` DISABLE KEYS */;
INSERT INTO `team` VALUES (1,'Angels',6),(2,'Astros',6),(3,'Athletics',6),(4,'Blue Jays',6),(5,'Braves',6),(6,'Brewers',6),(7,'Cardinals',6),(8,'Cardinals Red',6),(9,'Colorado',6),(10,'Cubs Blue',6),(11,'Cubs Red',5),(12,'Diamondbacks',5),(13,'Dodgers',5),(14,'Giants',5),(15,'Indians',5),(16,'Mariners',5),(17,'Marlins',5),(18,'Mets',5),(19,'Nationals',4),(20,'Orioles',4),(21,'Padres',4),(22,'Phillies',4),(23,'Pirates',3),(24,'Rangers',3),(25,'Rays',3),(26,'Reds',3),(27,'Red Sox',3),(28,'Rockies',3),(29,'Royals',2),(30,'Tigers',2),(31,'Twins',2),(32,'White Sox',1),(33,'Yankees',1),(34,'Hawks',1),(36,'Bandits',2),(38,'Dragons',2),(39,'Dragons2',2);
/*!40000 ALTER TABLE `team` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Temporary view structure for view `v_all_rosters`
--

DROP TABLE IF EXISTS `v_all_rosters`;
/*!50001 DROP VIEW IF EXISTS `v_all_rosters`*/;
SET @saved_cs_client     = @@character_set_client;
/*!50503 SET character_set_client = utf8mb4 */;
/*!50001 CREATE VIEW `v_all_rosters` AS SELECT 
 1 AS `Division Name`,
 1 AS `Team Name`,
 1 AS `Player Name`*/;
SET character_set_client = @saved_cs_client;

--
-- Temporary view structure for view `v_coach_missing_clearances`
--

DROP TABLE IF EXISTS `v_coach_missing_clearances`;
/*!50001 DROP VIEW IF EXISTS `v_coach_missing_clearances`*/;
SET @saved_cs_client     = @@character_set_client;
/*!50503 SET character_set_client = utf8mb4 */;
/*!50001 CREATE VIEW `v_coach_missing_clearances` AS SELECT 
 1 AS `coachLastName`,
 1 AS `coachFirstName`,
 1 AS `hasClearances`*/;
SET character_set_client = @saved_cs_client;

--
-- Temporary view structure for view `v_team_coaches`
--

DROP TABLE IF EXISTS `v_team_coaches`;
/*!50001 DROP VIEW IF EXISTS `v_team_coaches`*/;
SET @saved_cs_client     = @@character_set_client;
/*!50503 SET character_set_client = utf8mb4 */;
/*!50001 CREATE VIEW `v_team_coaches` AS SELECT 
 1 AS `Division`,
 1 AS `Team`,
 1 AS `Coach`,
 1 AS `Type`*/;
SET character_set_client = @saved_cs_client;

--
-- Temporary view structure for view `v_team_roster_size`
--

DROP TABLE IF EXISTS `v_team_roster_size`;
/*!50001 DROP VIEW IF EXISTS `v_team_roster_size`*/;
SET @saved_cs_client     = @@character_set_client;
/*!50503 SET character_set_client = utf8mb4 */;
/*!50001 CREATE VIEW `v_team_roster_size` AS SELECT 
 1 AS `teamName`,
 1 AS `teamID`,
 1 AS `RosterSize`*/;
SET character_set_client = @saved_cs_client;

--
-- Temporary view structure for view `v_unassign_players`
--

DROP TABLE IF EXISTS `v_unassign_players`;
/*!50001 DROP VIEW IF EXISTS `v_unassign_players`*/;
SET @saved_cs_client     = @@character_set_client;
/*!50503 SET character_set_client = utf8mb4 */;
/*!50001 CREATE VIEW `v_unassign_players` AS SELECT 
 1 AS `playerID`,
 1 AS `playerFirstName`,
 1 AS `playerLastName`,
 1 AS `dateOfBirth`,
 1 AS `familyID`,
 1 AS `teamID`,
 1 AS `registrationDate`*/;
SET character_set_client = @saved_cs_client;

--
-- Final view structure for view `v_all_rosters`
--

/*!50001 DROP VIEW IF EXISTS `v_all_rosters`*/;
/*!50001 SET @saved_cs_client          = @@character_set_client */;
/*!50001 SET @saved_cs_results         = @@character_set_results */;
/*!50001 SET @saved_col_connection     = @@collation_connection */;
/*!50001 SET character_set_client      = utf8mb4 */;
/*!50001 SET character_set_results     = utf8mb4 */;
/*!50001 SET collation_connection      = utf8mb4_0900_ai_ci */;
/*!50001 CREATE ALGORITHM=UNDEFINED */
/*!50013 DEFINER=`root`@`localhost` SQL SECURITY DEFINER */
/*!50001 VIEW `v_all_rosters` AS select `division`.`divisionName` AS `Division Name`,`team`.`teamName` AS `Team Name`,concat(`player`.`playerLastName`,', ',`player`.`playerLastName`) AS `Player Name` from ((`player` join `team` on((`player`.`teamID` = `team`.`teamID`))) join `division` on((`team`.`divisionID` = `division`.`divisionID`))) order by `division`.`divisionName`,`team`.`teamName` */;
/*!50001 SET character_set_client      = @saved_cs_client */;
/*!50001 SET character_set_results     = @saved_cs_results */;
/*!50001 SET collation_connection      = @saved_col_connection */;

--
-- Final view structure for view `v_coach_missing_clearances`
--

/*!50001 DROP VIEW IF EXISTS `v_coach_missing_clearances`*/;
/*!50001 SET @saved_cs_client          = @@character_set_client */;
/*!50001 SET @saved_cs_results         = @@character_set_results */;
/*!50001 SET @saved_col_connection     = @@collation_connection */;
/*!50001 SET character_set_client      = utf8mb4 */;
/*!50001 SET character_set_results     = utf8mb4 */;
/*!50001 SET collation_connection      = utf8mb4_0900_ai_ci */;
/*!50001 CREATE ALGORITHM=UNDEFINED */
/*!50013 DEFINER=`root`@`localhost` SQL SECURITY DEFINER */
/*!50001 VIEW `v_coach_missing_clearances` AS select `coach`.`coachLastName` AS `coachLastName`,`coach`.`coachFirstName` AS `coachFirstName`,`coach`.`hasClearances` AS `hasClearances` from `coach` where (`coach`.`hasClearances` = 'False') */;
/*!50001 SET character_set_client      = @saved_cs_client */;
/*!50001 SET character_set_results     = @saved_cs_results */;
/*!50001 SET collation_connection      = @saved_col_connection */;

--
-- Final view structure for view `v_team_coaches`
--

/*!50001 DROP VIEW IF EXISTS `v_team_coaches`*/;
/*!50001 SET @saved_cs_client          = @@character_set_client */;
/*!50001 SET @saved_cs_results         = @@character_set_results */;
/*!50001 SET @saved_col_connection     = @@collation_connection */;
/*!50001 SET character_set_client      = utf8mb4 */;
/*!50001 SET character_set_results     = utf8mb4 */;
/*!50001 SET collation_connection      = utf8mb4_0900_ai_ci */;
/*!50001 CREATE ALGORITHM=UNDEFINED */
/*!50013 DEFINER=`root`@`localhost` SQL SECURITY DEFINER */
/*!50001 VIEW `v_team_coaches` AS select `division`.`divisionName` AS `Division`,`team`.`teamName` AS `Team`,concat(`coach`.`coachLastName`,', ',`coach`.`coachFirstName`) AS `Coach`,`coach`.`coachType` AS `Type` from (((`team` join `coach_has_team` on((`team`.`teamID` = `coach_has_team`.`teamID`))) join `coach` on((`coach_has_team`.`coachID` = `coach`.`coachID`))) join `division` on((`team`.`divisionID` = `division`.`divisionID`))) order by `division`.`divisionName`,`team`.`teamName` */;
/*!50001 SET character_set_client      = @saved_cs_client */;
/*!50001 SET character_set_results     = @saved_cs_results */;
/*!50001 SET collation_connection      = @saved_col_connection */;

--
-- Final view structure for view `v_team_roster_size`
--

/*!50001 DROP VIEW IF EXISTS `v_team_roster_size`*/;
/*!50001 SET @saved_cs_client          = @@character_set_client */;
/*!50001 SET @saved_cs_results         = @@character_set_results */;
/*!50001 SET @saved_col_connection     = @@collation_connection */;
/*!50001 SET character_set_client      = utf8mb4 */;
/*!50001 SET character_set_results     = utf8mb4 */;
/*!50001 SET collation_connection      = utf8mb4_0900_ai_ci */;
/*!50001 CREATE ALGORITHM=UNDEFINED */
/*!50013 DEFINER=`root`@`localhost` SQL SECURITY DEFINER */
/*!50001 VIEW `v_team_roster_size` AS select `team`.`teamName` AS `teamName`,`team`.`teamID` AS `teamID`,count(`player`.`playerID`) AS `RosterSize` from (`team` left join `player` on((`player`.`teamID` = `team`.`teamID`))) group by `team`.`teamID` */;
/*!50001 SET character_set_client      = @saved_cs_client */;
/*!50001 SET character_set_results     = @saved_cs_results */;
/*!50001 SET collation_connection      = @saved_col_connection */;

--
-- Final view structure for view `v_unassign_players`
--

/*!50001 DROP VIEW IF EXISTS `v_unassign_players`*/;
/*!50001 SET @saved_cs_client          = @@character_set_client */;
/*!50001 SET @saved_cs_results         = @@character_set_results */;
/*!50001 SET @saved_col_connection     = @@collation_connection */;
/*!50001 SET character_set_client      = utf8mb4 */;
/*!50001 SET character_set_results     = utf8mb4 */;
/*!50001 SET collation_connection      = utf8mb4_0900_ai_ci */;
/*!50001 CREATE ALGORITHM=UNDEFINED */
/*!50013 DEFINER=`root`@`localhost` SQL SECURITY DEFINER */
/*!50001 VIEW `v_unassign_players` AS select `player`.`playerID` AS `playerID`,`player`.`playerFirstName` AS `playerFirstName`,`player`.`playerLastName` AS `playerLastName`,`player`.`dateOfBirth` AS `dateOfBirth`,`player`.`familyID` AS `familyID`,`player`.`teamID` AS `teamID`,`player`.`registrationDate` AS `registrationDate` from `player` where (`player`.`teamID` is null) */;
/*!50001 SET character_set_client      = @saved_cs_client */;
/*!50001 SET character_set_results     = @saved_cs_results */;
/*!50001 SET collation_connection      = @saved_col_connection */;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2021-06-30 15:26:50
