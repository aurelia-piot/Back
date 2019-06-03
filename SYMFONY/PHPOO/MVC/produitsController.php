<?php

require('produitsModel.php');


class produitsController{

private $model;

public function __construct(){
    $this ->model =new produitsModel;
}



    //afficher tous les produits
    public function boutique(){
        //mission de la fonction: afficher tous les produits
            //1 : Recupérer tous les produits
                    $produits =$this->model->findAll();
                    //echo'<pre>';print_r($produits);echo'</pre>';
                    $categories = $this ->model ->findCat();
                        //SELECT DISTINCT (categorie) FROM produit ---- le requete font partie du Model

                    //test https://localhost/SYMFONY/PHPOO



            //2 : afficher les produits
        require('produits.php');

    }

    //afficher un seul produit
    public function affichage($id){

    }

    //afficher tous les produits d'une categorie
    public function categorie($categories){

    }

//-----------------------------------------------
            //ADMIN\\


    // ajouter unn produit
    public function ajouterProduit($data){

    }

    //modifier un produit
    public function modifierProduit($id, $data){

    }

    //supprimer un produit
    public function supprimerProduit($id){

    }




}//fin class