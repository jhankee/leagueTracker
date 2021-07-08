ALTER TABLE team DROP FOREIGN KEY `fk_team_division1`;

ALTER TABLE team 
ADD CONSTRAINT `fk_team_division1`
	FOREIGN KEY (`divisionID`)
  REFERENCES `division` (`divisionID`)
  ON DELETE CASCADE
  ON UPDATE CASCADE;

------------------------------------------------------
--CONSTRAINT `fk_coach_has_team_coach1` FOREIGN KEY (`coachID`) REFERENCES `coach` (`coachID`),                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                  
ALTER TABLE coach_has_team DROP FOREIGN KEY `fk_coach_has_team_coach1`;
ALTER TABLE coach_has_team 
ADD CONSTRAINT `fk_coach_has_team_coach1`
	FOREIGN KEY (`coachID`)
  REFERENCES `coach` (`coachID`)
  ON DELETE CASCADE
  ON UPDATE CASCADE;

------------------------------------------------------
--CONSTRAINT `fk_coach_has_team_team1` FOREIGN KEY (`teamID`) REFERENCES `team` (`teamID`)    
ALTER TABLE coach_has_team DROP FOREIGN KEY `fk_coach_has_team_team1`;
ALTER TABLE coach_has_team 
ADD CONSTRAINT `fk_coach_has_team_team1`
	FOREIGN KEY (`teamID`)
  REFERENCES `team` (`teamID`)
  ON DELETE CASCADE
  ON UPDATE CASCADE;
------------------------------------------------------
--CONSTRAINT `fk_invoice_family1` FOREIGN KEY (`familyID`) REFERENCES `family` (`familyID`) 
ALTER TABLE invoice DROP FOREIGN KEY `fk_invoice_family1`;
ALTER TABLE invoice 
ADD CONSTRAINT `fk_invoice_family1`
	FOREIGN KEY (`familyID`)
  REFERENCES `division` (`familyID`)
  ON DELETE CASCADE
  ON UPDATE CASCADE;
------------------------------------------------------
--CONSTRAINT `fk_player_family` FOREIGN KEY (`familyID`) REFERENCES `family` (`familyID`),
ALTER TABLE player DROP FOREIGN KEY `fk_player_family`;
ALTER TABLE player 
ADD CONSTRAINT `fk_player_family`
	FOREIGN KEY (`familyID`)
  REFERENCES `family` (`familyID`)
  ON DELETE CASCADE
  ON UPDATE CASCADE;
------------------------------------------------------
--CONSTRAINT `fk_player_team1` FOREIGN KEY (`teamID`) REFERENCES `team` (`teamID`)
ALTER TABLE player DROP FOREIGN KEY `fk_player_team1`;
ALTER TABLE player 
ADD CONSTRAINT `fk_player_team1`
	FOREIGN KEY (`teamID`)
  REFERENCES `team` (`teamID`)
  ON DELETE SET NULL
  ON UPDATE CASCADE;