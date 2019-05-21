<?php

abstract class Joueur 
{
    public function seConnecter(){return $this->EtreMajeur();}
    abstract public function EtreMajeur();
     abstract public function Devise();

}
//--------------------------------------------------------------------------------------------------------
// $test = new Joueur;/!\ erreur !! une classe abstraite n'est pas instanciable

class JoueurFr extends Joueur
{
    public function EtreMajeur(){return 18;}
    public function Devise(){return '€';}
}
//----------------------------------------------------------------------------------------------
//Exo creer un objet joueurFR et afficher les methodes contenun dans la classe

$joueurFr = new JoueurFR;
echo "il faut avoir au moin <strong>".$joueurFr->EtreMajeur()." ans </strong> pour pouvoir s'inscrire avec la devise <strong>".$joueurFr->Devise()."</strong><hr>";

//----------------------------------------------------------------------------------------------
//Exo creer une class  joueurUs qui herite de la classe Joueur et realiser le traitement permettant d' afficher '21' pour la methode "EtreMajeur()" et afficher '$'pour la devise 

class JoueurUs extends Joueur
{
    public function EtreMajeur(){return 21;}
    public function Devise(){return '$';}
}

$joueurUs = new JoueurUs;
echo "il faut avoir au moin <strong> ".$joueurUs->EtreMajeur()." ans </strong> pour pouvoir s'inscrire avec la devise <strong> ".$joueurUs->Devise()."</strong><hr>";

/*
    -une classe abstrait n'est pas instanciable
    -Les methodes abstraite n'ont pas de contenu
    -Lorsque l'on herite de methode abstraites, nous sommes obligé de les redefinir
    -pour definir des methodes abstraites, il est necessaire que la classe qui les contiennent soit abstraite

    Le developpeur quie ecirt la classe 'Joueur" est au coeur de l'application (noyau) et va obliger les autre developpeur a redefinir les methodes  EtreMajeur() et Devise().
    C'est une methodologie ed travail. On impose de bonne contraintes


*/

?>