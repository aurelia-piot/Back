--Jointure interne ou INNER JOIN sert à Lier pusieurs tables entre elles.
--Cette commande retourne les enrengistrements lorsqu'il u a au moins une ligne dans chaque colonne qui correspondent a la condition
    SELECT * FROM nom_de_la_table INNER JOIN nom_de_la_table_2 ON condition;
    --OU
    SELECT * FROM nom_de_la_table CROSS JOIN nom_de_la_table_2 WHERE condition;

-- CROOS JOIN sert à croiser chaque lignes d'un tableau A avec les lignes d'un tableau B. Retourne le produit(*) de ces 2 Tableaux. En generant la commande CROSS JOIN est combinée avec la comande WHERE pour filtrer les resultats qui respect certaine conditions.
     SELECT * FROM nom_de_la_table CROSS JOIN nom_de_la_table_2 ;
     --Alternative à la commande CROSS JOIN 
     SELECT * FROM nom_de_la_table, nom_de_la_table_2 ;


/*
LEFT JOIN permet de lister tous les enrengistrements de la table gauche meme si il n'y a pas de correspondances dans la deuxiemes table
*/

SELECT * FROM nom_de_la_table LEFT JOIN nom_de_la_table_2 ON condition;
--OU 
SELECT * FROM nom_de_la_table LEFT OUTER JOIN nom_de_la_table_2 ON condition;


/*
RIGHT JOIN permet de lister tous les enrengistrements de la table de droite meme si il n'y a pas de correspondances dans la deuxiemes table
*/

SELECT * FROM nom_de_la_table RIGHT JOIN nom_de_la_table_2 ON condition;
--OU 
SELECT * FROM nom_de_la_table RIGTH OUTER JOIN nom_de_la_table_2 ON condition;


