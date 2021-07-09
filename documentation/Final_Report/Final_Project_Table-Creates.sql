mysql> show create table family\G;
*************************** 1. row ***************************
       Table: family
Create Table: CREATE TABLE `family` (
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
  `PrimaryPhone` varchar(10) DEFAULT NULL,
  `email` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`familyID`)
) ENGINE=InnoDB AUTO_INCREMENT=26 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci
1 row in set (0.03 sec)

ERROR:
No query specified

mysql> show create table player\G;
*************************** 1. row ***************************
       Table: player
Create Table: CREATE TABLE `player` (
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
  CONSTRAINT `fk_player_family` FOREIGN KEY (`familyID`) REFERENCES `family` (`familyID`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `fk_player_team1` FOREIGN KEY (`teamID`) REFERENCES `team` (`teamID`) ON DELETE SET NULL ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=110 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci
1 row in set (0.03 sec)

ERROR:
No query specified

mysql> show create table division\G;
*************************** 1. row ***************************
       Table: division
Create Table: CREATE TABLE `division` (
  `divisionID` int NOT NULL AUTO_INCREMENT,
  `divisionName` varchar(45) DEFAULT NULL,
  `startAgeDOB` date DEFAULT NULL,
  `endAgeDOB` date DEFAULT NULL,
  `cost` int DEFAULT NULL,
  PRIMARY KEY (`divisionID`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci
1 row in set (0.03 sec)

ERROR:
No query specified

mysql> show create table team\G;
*************************** 1. row ***************************
       Table: team
Create Table: CREATE TABLE `team` (
  `teamID` int NOT NULL AUTO_INCREMENT,
  `teamName` varchar(45) DEFAULT NULL,
  `divisionID` int NOT NULL,
  PRIMARY KEY (`teamID`,`divisionID`),
  KEY `fk_team_division1_idx` (`divisionID`),
  CONSTRAINT `fk_team_division1` FOREIGN KEY (`divisionID`) REFERENCES `division` (`divisionID`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=41 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci
1 row in set (0.04 sec)

ERROR:
No query specified

mysql> show create table coach\G;
*************************** 1. row ***************************
       Table: coach
Create Table: CREATE TABLE `coach` (
  `coachID` int NOT NULL AUTO_INCREMENT,
  `coachType` varchar(45) DEFAULT NULL,
  `coachFirstName` varchar(45) DEFAULT NULL,
  `coachLastName` varchar(45) DEFAULT NULL,
  `hasClearances` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`coachID`)
) ENGINE=InnoDB AUTO_INCREMENT=61 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci
1 row in set (0.03 sec)

ERROR:
No query specified

mysql> show create table coach_has_team\G;
*************************** 1. row ***************************
       Table: coach_has_team
Create Table: CREATE TABLE `coach_has_team` (
  `coachID` int NOT NULL,
  `teamID` int NOT NULL,
  PRIMARY KEY (`coachID`,`teamID`),
  KEY `fk_coach_has_team_team1_idx` (`teamID`),
  KEY `fk_coach_has_team_coach1_idx` (`coachID`),
  CONSTRAINT `fk_coach_has_team_coach1` FOREIGN KEY (`coachID`) REFERENCES `coach` (`coachID`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `fk_coach_has_team_team1` FOREIGN KEY (`teamID`) REFERENCES `team` (`teamID`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci
1 row in set (0.04 sec)

ERROR:
No query specified