-- Lister tous les salariés né avant 2000 :

-- Lister tous les departements :
    SELECT service FROM employes;
 

-- Lister tous les salariés avec un salaire entre 40000-55000 :
    SELECT prenom, nom FROM employes WHERE salaire BETWEEN 1000 AND 4000;
-- Lister tous les salariée  avec un nom qui contien la lettre "a" :
    SELECT prenom, nom FROM employes WHERE nom LIKE '%a%';
-- lister toutes les salariés :
     SELECT prenom, nom FROM employes WHERE sexe = 'f';
-- Lister tous les salariés entrer dans l'entreprise avant le 01 janvier 2010 :
    SELECT prenom, nom ,date_embauche FROM employes WHERE date_embauche <=  '2010-01-01' ;
  -- AFFIcher toute les salariées embauché aven 2006-01-01 :
    SELECT prenom, nom ,sexe ,date_embauche FROM employes WHERE sexe = 'f' AND date_embauche <=  '2006-01-01' ;
 
-- Supprimer tous les salariés en CDI :
    DELETE id_employes FROM employes WHERE status ='cdi';

-- Afficher salariés pour chaque département(pas de doublon):
    SELECT DISTINCT service FROM employes;
    SELECT * FROM employes DISTINCT service;
-- Afficher manager pour chaque département (pas de doublon) :

-- Afficher les titres(pas de doublon):

--Afficher les femmes:
SELECT* FROM employes WHERE sexe = 'f';


--Afficher le nombre d'homme 
SELECT COUNT(*)  FROM employes WHERE sexe = 'm';