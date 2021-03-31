CREATE TABLE event(
	eventname VARCHAR(25),
	sponsor VARCHAR(25),
	eventDate DATE,
	eventTime SMALLINT UNSIGNED,
	description VARCHAR(255),
	PRIMARY KEY(eventname)
);

CREATE TABLE user(
	name VARCHAR(25),
	username VARCHAR(25),
	passcode VARCHAR(25),
	email VARCHAR(35),
	phoneNumber VARCHAR(35),
	age TINYINT UNSIGNED,
	gender VARCHAR(6),
	PRIMARY KEY(username)
);