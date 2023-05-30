DROP DATABASE IF EXISTS `biuro`;

CREATE DATABASE `biuro`;

USE `biuro`;

CREATE TABLE zdjecia (
    id INT PRIMARY KEY AUTO_INCREMENT UNSIGNED,
    nazwaPliku TEXT,
    podpis TEXT
);

CREATE TABLE wycieczki (
    id INT PRIMARY KEY AUTO_INCREMENT UNSIGNED,
    zdjecia_id INT UNSIGNED,
    dataWyjazdu DATE,
    cel TEXT,
    cena DOUBLE,
    dostepna TINYINT(1),
    FOREIGN KEY(zdjecia_id) REFERENCES zdjecia(id)
);

INSERT INTO zdjecia(nazwaPliku, podpis)
VALUES
('rzym.png', 'podpis zdjęcia z rzymu'),
('paryz.png', 'podpis zdjęcia z paryża'),
('londyn.png', 'podpis zdjęcia z londynu'),
('madryt.png', 'podpis zdjęcia z madrytu'),
('berlin.png', 'podpis zdjęcia z berlina'),
('moskwa.png', 'podpis zdjęcia z moskwy'),
('praga.png', 'podpis zdjęcia z pragi'),
('warszawa.png', 'podpis zdjęcia z warszawy'),
('wieden.png', 'podpis zdjęcia z wiednia');

INSERT INTO wycieczki(zdjecia_id, dataWyjazdu, cel, cena, dostepna) 
VALUES 
(1, '24-02-2020', 'Pozwiedzać rzym', 750.49, 1),
(2, '12-05-2021', 'Pozwiedzać paryż', 659.20, 1),
(3, '12-05-2021', 'Pozwiedzać londyn', 659.20, 1),
(4, '12-05-2021', 'Pozwiedzać madryt', 659.20, 1),
(5, '12-05-2021', 'Pozwiedzać berlin', 659.20, 1),
(6, '12-05-2021', 'Pozwiedzać moskwa', 659.20, 1),
(7, '12-05-2021', 'Pozwiedzać praga', 659.20, 0),
(8, '12-05-2021', 'Pozwiedzać warszawa', 659.20, 0),
(9, '12-05-2021', 'Pozwiedzać wieden', 659.20, 0);
