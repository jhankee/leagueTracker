CREATE USER 'leagueAdmin'@'localhost' IDENTIFIED BY 'password';
GRANT INSERT, SELECT, DELETE, UPDATE ON leaguetracker.* TO leagueAdmin@localhost;