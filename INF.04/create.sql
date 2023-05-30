DROP DATABASE IF EXISTS `wynajem`;

CREATE DATABASE `wynajem`;

USE `wynajem`;

CREATE TABLE pokoje (
    id INTEGER PRIMARY KEY AUTO_INCREMENT NOT NULL,
    nazwa TEXT,
    cena FLOAT
);

CREATE TABLE rezerwacje (
    id_rez INTEGER AUTO_INCREMENT NOT NULL,
    id_pok INTEGER NOT NULL,
    liczba_dn INTEGER NOT NULL,
    sezon TEXT,
    FOREIGN KEY(id_pok) REFERENCES pokoje(id)
);

INSERT INTO pokoje(nazwa, cena)
VALUES
('Pokój mazowiecki', 249.99),
('Pokój śląski', 199.99),
('Pokój wielkopolski', 179.99),
('Pokój małopolski', 149.99),
('Pokój podlaski', 99.99),
('Pokój podkarpacki', 79.99),
('Pokój lubelski', 59.99),
('Pokój łódzki', 49.99),
('Pokój pomorski', 39.99),
('Pokój warmińsko-mazurski', 29.99);

INSERT INTO rezerwacje(id_pok, liczba_dn, sezon)
VALUES
(1, 4, 'wakacyjny'),
(2, 6, 'zimowy'),
(3, 2, 'wakacyjny'),
(4, 4, 'wakacyjny'),
(5, 4, 'letni'),
(6, 4, 'wakacyjny'),
(7, 4, 'wakacyjny'),
(8, 4, 'wakacyjny'),
(9, 4, 'wakacyjny'),
(10, 4, 'wakacyjny');
