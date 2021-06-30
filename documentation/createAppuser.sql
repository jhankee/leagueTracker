CREATE USER leagueAdmin IDENTIFIED BY 'password1234';

GRANT INSERT, SELECT, DELETE, UPDATE ON leaguetracker.* TO leagueAdmin;