CREATE or Replace VIEW v_all_rosters AS 
select division.divisionName AS 'Division Name',
team.teamName AS 'Team Name',
concat(player.playerLastName,', ',player.playerFirstName) AS 'Player Name' 
from ((player join team on((player.teamID = team.teamID))) 
join division on((team.divisionID = division.divisionID))) 
order by division.divisionName,team.teamName;


=======
---------------------
CREATE OR REPLACE VIEW v_coach_missing_clearances AS 
select coach.coachLastName AS coachLastName,
coach.coachFirstName AS coachFirstName,coach.hasClearances AS hasClearances 
from coach where (coach.hasClearances = 'False');
---------------------
>>>>>>> a72bcd3fad6bbfdfd00744ee2172e14d4eac58a1
CREATE OR REPLACE VIEW v_team_coaches AS 
select division.divisionName AS Division,
team.teamName AS Team,
concat(coach.coachLastName,', ',coach.coachFirstName) AS Coach
,coach.coachType AS Type 
from (((team join coach_has_team on((team.teamID = coach_has_team.teamID))) 
join coach on((coach_has_team.coachID = coach.coachID))) 
join division on((team.divisionID = division.divisionID))) 
order by division.divisionName,team.teamName;


=======
---------------------
>>>>>>> a72bcd3fad6bbfdfd00744ee2172e14d4eac58a1
CREATE OR REPLACE VIEW v_team_roster_size AS 
select team.teamName AS teamName,
team.teamID AS teamID,
count(player.playerID) AS RosterSize 
from (team 
left join player on((player.teamID = team.teamID))) 
group by team.teamID;
<<<<<<< HEAD


=======
---------------------
>>>>>>> a72bcd3fad6bbfdfd00744ee2172e14d4eac58a1
CREATE OR REPLACE VIEW v_unassign_players AS 
select player.playerID AS playerID,
player.playerFirstName AS playerFirstName,
player.playerLastName AS playerLastName,
player.dateOfBirth AS dateOfBirth,
player.familyID AS familyID,
player.teamID AS teamID,
player.registrationDate AS registrationDate 
from player 
where (player.teamID is null);
<<<<<<< HEAD

CREATE OR REPLACE VIEW v_coach_missing_clearances AS 
select coach.coachLastName AS coachLastName,
coach.coachFirstName AS coachFirstName,
coach.hasClearances AS hasClearances 
from coach 
where (coach.hasClearances = 'False');
=======
>>>>>>> a72bcd3fad6bbfdfd00744ee2172e14d4eac58a1
