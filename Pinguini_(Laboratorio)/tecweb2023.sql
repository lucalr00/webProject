USE vocchine;

DROP TABLE IF EXISTS Traccia;
DROP TABLE IF EXISTS Album;

CREATE TABLE Album (
    ID INT PRIMARY KEY AUTO_INCREMENT,
    Titolo VARCHAR(256) NOT NULL ,
    DataPubblicazione DATE NOT NULL,
    Genere VARCHAR(256) NOT NULL ,
    Copertina VARCHAR(256) NOT NULL,
    idCss varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET = utf8;

INSERT INTO Album VALUES
                      (1, "Fake News", "2022-12-02", "Pop", "images/fakenews.jpg", "fakenews"),
                      (2, "Ahia!", "2020-12-04", "Pop", "images/ahia.jpg", "ahia"),
                      (3, "Fuori dall'Hype Ringo Starr", "2020-02-07", "Pop", "images/fuorihyperingo.jpg", "ringo"),
                      (4, "Fuori dall'Hype", "2019-04-05", "Pop", "images/fuorihype.jpg", "hype"),
                      (5, "Gioventù brucata", "2017-04-17", "Pop", "images/gioventubrucata.jpg", "brucata"),
                      (6, "Diamo un calcio all'adilà", "2015-12-18", "Pop", "images/calcio.jpg", "calcio"),
                      (7, "Il Re è nudo", "2014-07-21", "Pop", "images/renudo.jpg", "reNudo");

CREATE TABLE Traccia (
    ID INT PRIMARY KEY AUTO_INCREMENT,
    Titolo VARCHAR(256) NOT NULL,
    Durata TIME NOT NULL,
    Esplicito BOOL NOT NULL,
    URLVideo VARCHAR(512),
    DataRadio DATE,
    Album INT NOT NULL,
    Note VARCHAR(256),
    FOREIGN KEY (Album) REFERENCES Album(ID)
) ENGINE=InnoDB DEFAULT CHARSET = utf8;


INSERT INTO Traccia VALUES
                        (1, "Scooby Doo", "2:59", 0, "https://youtu.be/gYJUPA26MyI?si=7P_nyJtIU9bMwc2V", "2020-11-13" , 2, null),
                        (2, "Scrivile Scemo", "3:35", 0, null, null , 2, null),
                        (3, "Bohémien", "3:14", 1, null, null, 2, null),
                        (4, "Pastello Bianco", "3:28", 0, null, null, 2, null),
                        (5, "Giulia", "3:07", 0, null, null, 2, null),
                        (6, "Ahia!", "4:13", 0, null, null, 2, null);



