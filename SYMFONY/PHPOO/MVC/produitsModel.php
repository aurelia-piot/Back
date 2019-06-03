<?php
//MVC/ProduitsModel.php
class produitsModel
{
    private $pdo;
    public function __construct(){
        $this -> pdo = new PDO('mysql:host=localhost;dbname=site','root','',array(PDO::ATTR_ERRMODE =>PDO::ERRMODE_WARNING,));
    }//fin construct

//-------------------------
// la mission de ce fichier produitsModel est d'interagir avec la table produit dans la BDD (REQUETE SQL)

  //recupérer tous les produits
public function findAll(){
    $resultat =$this->pdo->query('SELECT * FROM produit');
    $produits= $resultat ->fetchAll();
    return $produits;
}//fin findAll


// recuperer toutes les categories
public function findCat(){
    $resultat =$this ->pdo->query('SELECT DISTINCT(categorie) FROM produit');
    $categories = $resultat -> fetchAll();
    return $categories;
}//fin findcat





  //recupérer un produit par l'id
public function findId($id){
    $resultat =$this ->pdo->prepare('SELECT * FROM produit WHERE id_produit =:id');
    $resultat->bindValue('id',$id,PDO::PARAM_INT);
    $resultat->execute();
    $produit= $resultat -> fetchAll();
    return $produit;
}




  //recupérer tous les produits par la categorie

  //Insert
  //update
  //delete




}//fin produitsModel