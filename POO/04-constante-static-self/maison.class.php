<?php


class Maison
{
    private  static $nbPiece = 7;//propriete qui appartient a la classe
    public static $espaceTerrain = '500m';//propriete qui appartient a la classe
    public $couleur = 'blanc';//propriete qui appartient a l'objet'
    const HAUTEUR = '10m';//propriete qui appartient a la classe
    private $nbPorte = 10;
    //methode qui appartien a la class car elle est static
    public static function getNbpiece(){return self::$nbPiece;}//self permet de faire appel a une propriete static declarer a l'interieur de la class
    // methode qui appartient a l'objet
    public function getNbPorte(){return $this->nbPorte;}
   


}
$maison= new Maison;// // creation de l'objet
//1 afficher le nombre de piece de la maison
echo 'Nombre de piece de la maison : <strong>'.Maison::getNbPiece().'</strong><hr>';//lorsqu'une methode est static, cela veut dire qu'elle appartient a la classe et non a l'objet , donc on l'appel via la class


// 2-afficher l'espace terrain de la maison

echo 'la maison possede un espace de  : <strong>'.Maison::$espaceTerrain.'</strong><hr>';//quand on appelle via la class on appelle avec le dollard


//3 afficher la hauteur de la maison

echo 'La maison fait : <strong>'.Maison::HAUTEUR.'</strong><hr>';


//4 afficher la couleur de la maison

echo 'La maison est de couleur : <strong>'. $maison->couleur.'</strong><hr>';

//5 afficher le nombre de porte de la maison

echo 'Nombre de porte de la maison : <strong>'. $maison->getNbPorte().'</strong><hr>';

echo $maison::$espaceTerrain.'<hr>';//--/!\ devrait donner une erreur , on ne doit pas appeler une proprieter static, donc qui appartient a la classe via l'objet

echo $maison->$espaceTerrain.'<hr>';//-- /!\ donne une erreur , il n'est pas possible d'acceder a une propriete static via l'objet

echo $maison->getNbPiece().'<hr>';//--/!\ fonctionne mais pas logique !! bonne ecriture :  Maison::getNbPiece()

echo Maison::$couleur.'<hr>';//--/!\ Erreur !! on ne doit pas appeler une propriete public par la classe

?>