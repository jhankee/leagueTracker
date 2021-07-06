DELIMITER //
CREATE PROCEDURE insert_invoice(player int,family int)
begin
   insert into invoice (familyID,paidStatus,amount) values (family,'False',
        (select cost from division
        where divisionID = (select divisionId from division
        where (date(startAgeDOB) < (select date(dateOfBirth) from player where playerId=player)
        and date(endAgeDOB) >(select date(dateOfBirth) from player where playerId=player)))));
END //
DELIMITER ;

-- https://aws.amazon.com/premiumsupport/knowledge-center/rds-mysql-functions/

DELIMITER //
CREATE TRIGGER after_insert_player
    AFTER INSERT
    ON player FOR EACH ROW
BEGIN
    call insert_invoice (New.playerid,New.familyID);
END //   
DELIMITER ;

-- insert into player (playerFirstName, playerLastName, dateOfBirth, familyID, registrationDate) VALUES  ('Daniel','Lopez','2015-04-12','23','2006-06-26');


DELIMITER //
CREATE TRIGGER dob_validation
BEFORE INSERT ON player FOR EACH ROW
BEGIN
    declare errorMessage varChar(55);
    Set errorMessage = 'Player\'s age is outside of the divisions offered';
        if (new.dateOfBirth > (select max(endAgeDOB) from division))
        or
        (new.dateOfBirth < (select min(startAgeDOB) from division))
            then
            SIGNAL SQLSTATE '45000'
                SET Message_Text = errorMessage;
        end if;
END //
DELIMITER ;