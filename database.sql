CREATE USER 'jongerenkansrijker'@'localhost' IDENTIFIED BY 'kansrijkejongeren';

GRANT ALL PRIVILEGES ON jongerenkansrijker.* TO 'jongerenkansrijker'@'localhost';

CREATE DATABASE jongerenkansrijker; /* create DB */

USE jongerenkansrijker; /* use DB */

CREATE TABLE medewerker (
    id int NOT NULL AUTO_INCREMENT,
    firstname varchar(255) NOT NULL,
    lastname varchar(255) NOT NULL,
    PRIMARY KEY (id)
);

CREATE TABLE activiteiten (
    id int NOT NULL AUTO_INCREMENT,
    omschrijving varchar(255) NOT NULL,
    PRIMARY KEY (id)
    
);

CREATE TABLE jongeren (
    id int NOT NULL AUTO_INCREMENT,
    firstname varchar(255) NOT NULL,
    lastname varchar(255) NOT NULL,
    NAW varchar(255) NOT NULL,
    PRIMARY KEY (id)
);

CREATE TABLE koppel (
    id int NOT NULL AUTO_INCREMENT,
    activiteitenid int NOT NULL,
    jongerenid int NOT NULL,
    PRIMARY KEY (id),
    FOREIGN KEY (activiteitenid) REFERENCES activiteiten(id) ON DELETE CASCADE,
    FOREIGN KEY (jongerenid) REFERENCES jongeren(id) ON DELETE CASCADE
);

ALTER TABLE medewerker ADD username varchar(255) UNIQUE NOT NULL;
ALTER TABLE medewerker ADD password varchar(255) NOT NULL;