<!-- Exercice 3 : AJAX

    Faire un formulaire HTML pour ajouter un nouvel employe en AJAX (jquery) à la base entreprise_pole_s. 

	    prenom, nom, sexe, service, salaire

	Cet exercice se compose de 

		ajax.js, connexion.php, ajax.php, index.php (jquery)

Exercice 4 : SQL (BDD haribo)

    Dans un fichier ecrire une requete (jointure) permettant d'afficher tous les prénoms des personnes ayant mangé des Tagada pik

Exercice 5 : Créer une classe

    Créer une classe Vehicule avec les propriétés suivantes : 

        Marque (string de 3 à 30 caractères)

        Modèle (string de 3 à 30 caractères)

        année  (INT de 4 caractères)

        couleur (string de 3 à 30 caractères)

        km (INT de 1 à 6 caractères)

       Ajouter une fonction getInfos permettant de récupérer toutes les infos d'un objet Vehicule sous forme d'une array

        Dans un autre fichier, instancier la classe, créer 3 véhicules différents et afficher leur infos grâce à la méthode getInfos(); -->


<?php
class Vehicule
{
    private $error;
    private $marque;
        public function setmarque($marque){
            if(iconv_strlen($marque)>3  && iconv_strlen($nom)<30){$this->marque= $marque;}
            elseif(!is_string($marque)){$this->error ="$marque n'est pas une marque valable!! ";return $this->error;}
            else{$this->error ="Ce n'est pas un string!!";return $this->error;}}
        public function getmarque(){return $this->marque;}

    private $model;
            public function setmodel($model){
                if(iconv_strlen($model)>3  && iconv_strlen($model)<30){$this->model= $model;}
                elseif(!is_string($model)){$this->error ="$model n'est pas un model valable!! ";return $this->error;}
                else{$this->error ="Ce n'est pas un string!!";return $this->error;}}
            public function getNom(){return $this->model;}  



    private $annee;
                public function $setannee{$annee}{
                    if($annee >)

                }




    private $couleur;
    private $km;
}


















