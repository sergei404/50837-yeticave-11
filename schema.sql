CREATE DATABASE yeticave CHARACTER SET utf8 COLLATE utf8_general_ci;

USE yeticave;

CREATE TABLE categories (
    id INT UNSIGNED  PRIMARY KEY AUTO_INCREMENT,
    title VARCHAR (128),
    character_code VARCHAR (70));

CREATE TABLE users (
    id INT UNSIGNED PRIMARY KEY AUTO_INCREMENT,
    date DATETIME,
    email VARCHAR (129) UNIQUE,
    name VARCHAR (70),
    password VARCHAR (256),
    contacts VARCHAR (256));  

CREATE TABLE lots (
    id INT UNSIGNED  PRIMARY KEY AUTO_INCREMENT,
    create_date DATETIME,
    caption VARCHAR (128),
    discription VARCHAR (256),
    photo VARCHAR (256),
    starting_price INT UNSIGNED,
    completion_date DATETIME,
    step INT UNSIGNED,
    author_user_id INT UNSIGNED,
    victory_user_id INT UNSIGNED,
    category_id INT UNSIGNED);

CREATE INDEX completion_date ON lots(completion_date);
CREATE INDEX category_id ON lots(category_id);
CREATE FULLTEXT INDEX lot_search ON lots (caption, discription);

CREATE TABLE rates (
    id INT UNSIGNED  PRIMARY KEY AUTO_INCREMENT,
    date DATETIME,
    sum INT UNSIGNED,
    rate_user_id INT UNSIGNED,
    lot_id INT UNSIGNED);

CREATE INDEX lot_id ON rates(lot_id);








