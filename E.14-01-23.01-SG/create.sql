DROP DATABASE IF EXISTS `wedkowanie`;

CREATE DATABASE `wedkowanie`;

USE `wedkowanie`;

CREATE TABLE Lowisko (
    id INTEGER PRIMARY KEY NOT NULL AUTO_INCREMENT,
    akwen TEXT,
    wojewodztwo TEXT,
    rodzaj INTEGER
);

CREATE TABLE Karty_wedkarskie (
    id INTEGER PRIMARY KEY NOT NULL AUTO_INCREMENT,
    imie TEXT,
    nazwisko TEXT,
    adres TEXT,
    data_zezwolenia DATE,
    punkty INTEGER
);

CREATE TABLE Zawody_wedkarskie (
    id INTEGER PRIMARY KEY NOT NULL AUTO_INCREMENT,
    Karty_wedkarskie_id INTEGER,
    Lowisko_id INTEGER,
    data_zawodow DATE,
    sedzia TEXT,
    FOREIGN KEY (Karty_wedkarskie_id) REFERENCES Karty_wedkarskie(id),
    FOREIGN KEY (Lowisko_id) REFERENCES lowisko(id)
);

INSERT INTO lowisko(akwen, wojewodztwo, rodzaj)
VALUES
('jezioro mazowieckie', 'mazowsze', 2),
('jezioro wielkopolskie', 'wielkopolska', 2),
('jezioro pomorskie', 'pomorskie', 2),
('rzeka mazowiecka', 'mazowsze', 3),
('rzeka wielkopolska', 'wielkopolska', 3),
('rzeka pomorska', 'pomorskie', 3),
('morze mazowieckie', 'mazowsze', 1),
('morze wielkopolskie', 'wielkopolska', 1),
('morze pomorskie', 'pomorskie', 1),
('zalew mazowiecki', 'mazowsze', 4),
('zalew wielkopolski', 'wielkopolska', 4),
('zalew pomorski', 'pomorskie', 4),
('staw mazowiecki', 'mazowsze', 5),
('staw wielkopolski', 'wielkopolska', 5),
('staw pomorski', 'pomorskie', 5);

INSERT INTO Karty_wedkarskie(imie, nazwisko, adres, data_zezwolenia, punkty)
VALUES
('Adam', 'Stefanowski', 'Kazimierza Kasprzaka', '23-05-2023', 41),
('Jan', 'Kowalski', 'Kazimierza Kasprzaka', '28-05-2023', 34),
('Piotr', 'Nowak', 'Kazimierza Kasprzaka', '21-05-2023', 21),
('Krzysztof', 'Wojciechowski', 'Kazimierza Kasprzaka', '16-05-2023', 87),
('Stanisław', 'Dąbrowski', 'Kazimierza Kasprzaka', '12-05-2023', 54),
('Andrzej', 'Kozłowski', 'Kazimierza Kasprzaka', '29-04-2023', 90),
('Józef', 'Jankowski', 'Kazimierza Kasprzaka', '29-02-2023', 100),
('Tomasz', 'Mazur', 'Kazimierza Kasprzaka', '29-08-2023', 100),
('Paweł', 'Wojcik', 'Kazimierza Kasprzaka', '29-04-2023', 100),
('Marcin', 'Krawczyk', 'Kazimierza Kasprzaka', '29-09-2023', 11),
('Marek', 'Kaczmarek', 'Kazimierza Kasprzaka', '29-05-2023', 21),
('Grzegorz', 'Piotrowski', 'Kazimierza Kasprzaka', '29-05-2023', 2),
('Jerzy', 'Grabowski', 'Kazimierza Kasprzaka', '29-05-2023', 4),
('Tadeusz', 'Pawłowski', 'Kazimierza Kasprzaka', '29-05-2023', 67),
('Łukasz', 'Michalski', 'Kazimierza Kasprzaka', '29-05-2023', 5),
('Mateusz', 'Nowakowski', 'Kazimierza Kasprzaka', '29-05-2023', 32);

INSERT INTO Zawody_wedkarskie(Karty_wedkarskie_id, Lowisko_id, data_zawodow, sedzia)
VALUES 
(1, 1, '29-05-2023', 'Adam'),
(2, 2, '06-01-1995', 'Kazimierz'),
(3, 3, '29-05-1783', 'Jan'),
(4, 4, '27-04-2003', 'Kuba'),
(5, 5, '23-05-2023', 'Stefan'),
(6, 6, '21-05-2023', 'Jakub'),
(7, 7, '22-05-2023', 'Stachu'),
(8, 8, '14-05-2023', 'Andrzej'),
(9, 9, '13-05-2023', 'Tomasz'),
(10, 10, '10-05-2013', 'Zbigniew'),
(11, 11, '04-05-2012', 'Janusz'),
(12, 12, '06-05-2011', 'Filip'),
(13, 13, '09-05-2010', 'Felix'),
(14, 14, '30-05-2009', 'Pawel'),
(15, 15, '01-05-2008', 'Hubert');
