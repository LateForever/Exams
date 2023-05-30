DROP DATABASE IF EXISTS `kwiaciarnia`;

CREATE DATABASE `kwiaciarnia`;

USE `kwiaciarnia`;

CREATE TABLE kwiaciarnie (
    id_kwiaciarni INT(10) UNSIGNED NOT NULL PRIMARY KEY,
    nazwa VARCHAR(20),
    miasto VARCHAR(20),
    ulica VARCHAR(20)
);

CREATE TABLE zamowienia (
    id INT(10) UNSIGNED NOT NULL PRIMARY KEY,
    id_kwiaciarni INT(20) UNSIGNED NOT NULL,
    data DATE,
    kwiaty TEXT,
    cena FLOAT,
    FOREIGN KEY(id_kwiaciarni) REFERENCES kwiaciarnia(id)
);

INSERT INTO kwiaciarnie(nazwa, miasto, ulica)
VALUES
('Kwiaciarnia pana andersa', 'Warszawa', 'kazimierza pawlaka'),
('Kwiaciarnia pana michala', 'Poznan', 'jozefa zbigniewa'),
('Kwiaciarnia pana jana', 'Malbork', 'kazimierza pawlaka'),
('Kwiaciarnia pana adama', 'Malbork', 'kazimierza pawlaka'),
('Kwiaciarnia pana piotra', 'Malbork', 'kazimierza pawlaka'),
('Kwiaciarnia pana jozefa', 'Gdansk', 'gdanksa ulica');

INSERT INTO zamowienia(id_kwiaciarni, data, kwiaty, cena)
VALUES
(1, '07-01-2017', 'róże czerwone', 179.99),
(2, '07-01-2017', 'fiołki', 49.99),
(3, '18-02-2023', 'tulipany', 79.99),
(4, '22-05-2023', 'fiołki żółte', 129.00),
(5, '11-03-2020', 'kwaity jakieś', 39.99),
(6, '29-05-2023', 'wrzosy', 99.99);

