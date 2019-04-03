-- Exercice: Créé une base de données magasin
CREATE DATABASE magasin;
-- Créé une table produit qui contient les colonnes suivantes:
CREATE TABLE voitures/(ou autre) (id_car INT (3) PRIMARY KEY AUTO_INCREMENT NOT NULL, marque VARCHAR(50), model VARCHAR(60),couleur VARCHAR(30),prix FLOAT, date_vente DATE) 
-- id -> INT PRIMARY KEY AUTO_INCREMENT NOT NULL

-- nom_produit -> débrouillez-vous
TYPE =>VARCHAR
-- catégorie_produit -> débrouillez-vous
TYPE =>VARCHAR
-- reference_produit -> débrouillez-vous
TYPE => VARCHAR
-- prix_produit -> débrouillez-vous
TYPE => FLOAT
-- stock_produit -> débrouillez-vous
TYPE => INT
-- date_ajout -> débrouillez-vous
TYPE => DATE
-- Insérer au moins 20 produits
INSERT INTO voitures (marque, model, couleur, prix, date_vente) VALUES ('Lamborghini','countach','blanc','330000','2018-02-20');
-- Afficher tous les produits classé du plus récent au plus ancien
SELECT * FROM voitures  ORDER BY Date_vente DESC;
-- Afficher les 10 premiers produits
SELECT * FROM voitures LIMIT 3;
-- Afficher les 10 derniers produits
SELECT * FROM voitures LIMIT 4,2;
-- Ajouter une colonne date_vente/date_livraison
ALTER TABLE voitures ADD date_livraison DATE;
-- Afficher les produits entre 2 date de vente
SELECT * FROM voitures WHERE date_vente BETWEEN '2019-02-20' AND '2019-03-30';
-- ajouter un date de livraison aux produits
UPDATE voitures SET date_livraison ='2019-09-01' WHERE id_car = '2'; 
-- Afficher les 10 produits du milieu
SELECT * FROM voitures LIMIT 1,4;
SELECT * FROM voitures WHERE id_car BETWEEN 2 AND 5
-- Afficher les produits commencent par une lettre spécifique
SELECT * FROM produits WHERE nom LIKE 'p%';

