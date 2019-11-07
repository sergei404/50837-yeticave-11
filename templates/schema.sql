CREATE DATABASE yeticave;

USE yeticave;

CREATE TABLE lot (
    id INT PRIMARY KEY AUTO_INCREMENT,
    create_date DATETIME,
    title VARCHAR (256),
    discription VARCHAR (256),
    photo VARCHAR (256),
    starting_price INT,
    completion_date DATETIME,
    step INT);

CREATE TABLE rate (
    id INT PRIMARY KEY AUTO_INCREMENT,
    date DATETIME,
    sum INT);

CREATE TABLE category (
    id INT PRIMARY KEY AUTO_INCREMENT,
    title VARCHAR (256),
    character_code VARCHAR (256));

CREATE TABLE users (
    id INT PRIMARY KEY AUTO_INCREMENT,
    date DATETIME,
    email VARCHAR (256),
    name VARCHAR (50),
    password VARCHAR (256),
    contacts VARCHAR (256));


