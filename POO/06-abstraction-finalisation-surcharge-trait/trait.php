<?php
trait TPanier
{
    public $nbProduit = 1;
    public function affichageProduits(){ return"affichage des Produits !! <hr>";}
}
trait TMembre
{
    public function affichageMembres(){return"affichage des Membre !! <hr>";}
}

//-----------------------------------------------------------------------------
class Site
{
    USE TPanier, TMembre;
}
//-------------------------------------------------------------------------------

// creer un objet issu de la class Site et afficher les methode issus de cette class || et faire les differents affichage des methode declareers

$site = new SITE;
echo'<pre>';print_r(get_class_methods($site));echo'</pre>';
echo'<pre>';print_r($site);echo'</pre>';
echo $site->affichageProduits() .  $site->affichageMembres() ."nombre de produit dans le panier :".$site->nbProduit;

/*

Les traits ont ete inventés pour repousser les limites de l'heritage, il est possible pour une classe d'heriter de plusieurs trait en meme temps
un trait est un regroupement de methode et de proprietes pouvant etre importé dans une class



*/
























?>
