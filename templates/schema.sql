CREATE DATABASE yeticave;

USE yeticave;

CREATE TABLE lot (
    id INT UNSIGNED PRIMARY KEY AUTO_INCREMENT,
    create_date DATETIME,
    title VARCHAR (128),
    discription VARCHAR (256),
    photo VARCHAR (256),
    starting_price INT UNSIGNED,
    completion_date DATETIME,
    step INT UNSIGNED);

CREATE TABLE rate (
    id INT UNSIGNED PRIMARY KEY AUTO_INCREMENT,
    date DATETIME,
    sum INT UNSIGNED);

CREATE TABLE category (
    id INT UNSIGNED PRIMARY KEY AUTO_INCREMENT,
    title VARCHAR (128),
    character_code VARCHAR (70));

CREATE TABLE users (
    id INT UNSIGNED PRIMARY KEY AUTO_INCREMENT,
    date DATETIME,
    email VARCHAR (129),
    name VARCHAR (70),
    password VARCHAR (256),
    contacts VARCHAR (256));


