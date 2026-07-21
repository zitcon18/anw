CREATE DATABASE crypto_demo;
USE crypto_demo;

CREATE TABLE users (
    id INT AUTO_INCREMENT PRIMARY KEY,
    fullname VARCHAR(100) NOT NULL,
    birthdate DATE,
    email VARCHAR(100) NOT NULL UNIQUE,
    username VARCHAR(50) NOT NULL UNIQUE,
    password VARCHAR(255) NOT NULL,
    phone TEXT,
    citizen_id TEXT,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);
