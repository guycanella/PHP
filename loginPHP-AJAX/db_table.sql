CREATE DATABASE IF NOT EXISTS project_loginPHPAJAX;

USE usersForLogin;

CREATE TABLE login_Users (
	id		INT AUTO_INCREMENT PRIMARY KEY,
	email	VARCHAR(100),
	pass	VARCHAR(300)
);

