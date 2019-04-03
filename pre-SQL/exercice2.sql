-- Exercice 2: Depuis votre terminal shell vous créé une base de donnée nommée "hotel".

    -- Dans cette base créé 3 tables nommée: "chambre", "client", "reservation".

    -- Le modèle des tables est le suivants: 

    -- chambre(

        -- id

        -- num_chambre

        -- prix

        -- nb_lit

        -- nb_pers

        -- confort

        -- equipement

    -- );

    -- client(

        -- id

        -- num_client

        -- nom

        -- prenom

        -- adresse

    -- );

    -- reservation(

        -- id

        -- num_client

        -- num_chambre

        -- date_arrive

        -- date_depart

    -- );

-- Dans ces 3 tables insérer les informations suivantes:

    -- 5 chambres numérotées de 10 en 10, prix(80.00insert into ,100,150,180,250), nb_lit de 1 à 3(aléatoire), confort(wc/douche/bain/etc), equipement(tv/wifi/etc)

    -- 5 client avec des numéro client à 4 chiffres(0001/1001), le reste des info est à votre bon vouloir

    -- 5 réservation date arbitraire.

-- Noter que le num_client et le num_chambre de la table reservation est identique à ceux des autres tables.

CREATE DATABASE hotel;

USE hotel;

CREATE TABLE chambre (

    id INT PRIMARY KEY AUTO_INCREMENT NOT NULL,

    num_chambre INT,

    prix FLOAT,

    nb_lit INT,

    nb_pers INT,

    confort VARCHAR(255),

    equipement VARCHAR(255)

);

CREATE TABLE client (

    id INT PRIMARY KEY AUTO_INCREMENT NOT NULL,

    num_client INT(4),

    nom VARCHAR(50),

    prenom VARCHAR(50),

    adresse VARCHAR(255)

);

CREATE TABLE reservation (

    id INT PRIMARY KEY AUTO_INCREMENT NOT NULL,

    num_client INT(4),

    num_chambre INT,

    date_arrive DATETIME,

    date_depart DATETIME,

);

INSERT INTO chambre(num_chambre, prix, nb_lit, nb_pers, confort, equipement) VALUES (100, 80.00, 01,01, 'Aucun', 'TV'), (110, 100.00, 01, 01, 'Douche', 'TV'), (120, 150, 02, 02, 'Douche/WC', 'TV/WIFI'),(130, 180.00, 02, 03, 'WC/Bain', 'TV/WIFI/Frigo'), (140, 250.00, 03, 04, 'WC/Bain/Jacuzzi/Massage', 'TV/WIFI/Frigo/Cuisine/Bar');

INSERT INTO client(num_client, nom, prenom, adresse) VALUES (0001, 'Dupont', 'Jean-Paul', '1 rue de la fossee'), (0002, 'Minouch', 'Zina', '2 Bis Chemin de la traversière'), (0003, 'Paris', 'Julian', 'Jsais pas ou il habite'), (0004, 'Plus', 'Dinspi', 'Pour le reste des clients'), (0005, 'Le Dernier', 'Enfin', '5 cest encore trop');

INSERT INTO reservation(num_client, num_chambre, date_arrive, date_depart) VALUES (1001, 100, '2018-09-19 19:36:23', '2018-09-20 19:36:23'), (1002, 110, '2018-08-19 12:00:54', '2018-09-21 12:00:54'), (1003, 120, '2018-08-19 15:55:03', '2018-09-23 15:55:03'), (1004, 130, '2018-08-19 22:59:13', '2018-08-20 22:59:13'), (1005, 140, '2018-08-19 11:55:41', '2018-09-20 11:55:41');

-- Exprimer les requêtes suivantes en SQL :

-- Les numéros de chambres avec TV.
         SELECT num_chambre FROM chambres WHERE equipement LIKE '%tv%';

-- Les numéros de chambres et leurs capacités.
         SELECT num_chambre, nb_pers FROM chambres ;

-- La capacité théorique d'accueil de l'hôtel.
         SELECT SUM(nb_pers) as nom_que_on_donne_a_ce_resultat FROM chambres; /*SUM  affiche la somme de l'opperation*/

-- Le prix par personne des chambres avec TV.
        SELECT AVG(prix/nb_pers) FROM chambres WHERE equipement LIKE '%tv%' ;  /*AVG Crée une moyene*/
        SELECT prix/nb_pers FROM chambres WHERE equipement LIKE '%tv%' ;  /* ici on a la moyene par personne pour chaque chambre*/

-- Les numéros des chambres et le numéro des clients ayant réservé des chambres pour le 09/02/2004.
         SELECT num_chambre, num_client, date_arrive  FROM reservations WHERE date_arrive = '2019-03-22';

-- Les numéros des chambres coûtant au minimum 80 Euro ayant un bain et valant au maximum 120 Euro. 2 soluces
        SELECT num_chambre  FROM chambres WHERE confort LIKE '%baignoire%' AND prix >= 80 <= 120;
        SELECT num_chambre  FROM chambres WHERE confort LIKE '%baignoire%' AND prix BETWEEN 80 AND 120 ;

/*-- Les numéros des chambres coûtant au maximum 80 Euro ou ayant un bain et valant au maximum 120 Euro(facultatif).
        SELECT num_chambre  FROM chambres WHERE(prix >= 80) OR (confort LIKE '%baignoire%' AND prix <= 120) ;*/

-- Les Nom, Prénoms et adresses des clients dans le noms commencent par "p".
        SELECT nom, prenom, adresse FROM clients WHERE nom LIKE 'p%' ;
-- Le nombre de chambres dont le prix est entre 85 et 120 Euro.
    SELECT COUNT(id_chambre) FROM chambres WHERE prix BETWEEN 80 AND 120;  /* COUNT Affiche le nombre d'elements demandé*/
-- Les noms des clients n'ayant pas fixé la date de départ.  
    SELECT nom FROM clients AS c, reservations AS r WHERE date_depart IS NULL AND c.num_client = r.num_client;
       SELECT nom FROM clients , reservations  WHERE date_depart IS NULL AND clients.num_client = reservations.num_client;
-- Jointure entre les tables client et réservation avec AS(alias) et INNER JOIN
SELECT * FROM clients AS c INNER JOIN reservations AS r ON c.num_client = r.num_client ;
 --ici les tables s'affichent les unes apres les autres--

-- Jointure entre les tables client et réservation avec INNER JOIN
SELECT * FROM clients INNER JOIN reservations ON clients.num_client = reservations.num_client ;
