CREATE or Replace VIEW v_all_rosters AS 
select division.divisionName AS 'Division Name',
team.teamName AS 'Team Name',
concat(player.playerLastName,', ',player.playerFirstName) AS 'Player Name' 
from ((player join team on((player.teamID = team.teamID))) 
join division on((team.divisionID = division.divisionID))) 
order by division.divisionName,team.teamName;