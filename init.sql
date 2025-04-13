CREATE DATABASE IF NOT EXISTS testdb;
USE testdb;

CREATE TABLE admins (
    id INT AUTO_INCREMENT PRIMARY KEY,
    username VARCHAR(50) NOT NULL UNIQUE,
    password VARCHAR(255) NOT NULL
);

CREATE TABLE users (
    id INT AUTO_INCREMENT PRIMARY KEY,
    first_name VARCHAR(100) NOT NULL,
    last_name VARCHAR(100) NOT NULL,
    email VARCHAR(100) NOT NULL UNIQUE,
    phone VARCHAR(15),
    address TEXT,
    city VARCHAR(100),
    country VARCHAR(100) DEFAULT 'Maroc',
    date_of_birth DATE,
    date_inscription TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

INSERT INTO admins (username, password) VALUES ('admin', 'adminpass');

INSERT INTO users (first_name, last_name, email, phone, address, city, date_of_birth) VALUES
('Ahmed', 'El Yacoubi', 'ahmed@example.com', '0601020304', '123 rue Mohammed V, Casablanca', 'Casablanca', '1990-05-12'),
('Mouna', 'Benjelloun', 'mouna@example.com', '0611122233', '456 avenue Hassan II, Marrakech', 'Marrakech', '1992-07-20'),
('Yousef', 'Ait Ouazzou', 'youssef@example.com', '0655443321', '789 boulevard Abdelmoumen, Rabat', 'Rabat', '1985-01-30'),
('Sara', 'Lahlou', 'sara@example.com', '0622334455', '101 rue Prince Moulay Abdellah, Fès', 'Fès', '1995-11-15'),
('Mustapha', 'El Mansouri', 'mustapha@example.com', '0688776655', '202 avenue Mohammed VI, Agadir', 'Agadir', '1988-03-25');
