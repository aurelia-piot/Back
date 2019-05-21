<?php
class Vehicule
{
    private static $marque ="BMW";
    Private $couleur='noir';
    public static function setMarque($mark){ self::$marque = $mark;}
    public static function getMarque(){return self::$marque;}

    public function setCouleur($couleur){$this->couleur=$couleur;}
    public function getCouleur(){return $this->couleur;}


}

//----------------------------------------------
// créer un objet issu de la classe vehicule et faite une phrase en affichant la couleur et la marque du vehicule

$vehicule= new Vehicule;// // creation de l'objet

echo 'le vehicule est de marque : <strong>'.Vehicule::getMarque().'</strong> et est de couleur: <strong>'.$vehicule->getCouleur().'</strong><hr>';


// Exo creer un autre vehicule et changer la couleur par violet et faite une phrase en affichant la couleur et la marque du vehicule

$vehicule2= new Vehicule;
$vehicule2->setCouleur('violet');

echo 'le vehicule 2 est de marque : <strong>'.Vehicule::getMarque().'</strong> et est de couleur: <strong>'.$vehicule2->getCouleur().'</strong><hr>';

// Exo creer un autre vehicule et faite une phrase en affichant la couleur et la marque du vehicule

$vehicule3= new Vehicule;
echo 'le vehicule 3 est de marque : <strong>'.Vehicule::getMarque().'</strong> et est de couleur: <strong>'.$vehicule3->getCouleur().'</strong><hr>';

// Exo creer un autre vehicule et changer la marque par mercedes et faite une phrase en affichant la couleur et la marque du vehicule
$vehicule4= new Vehicule;
Vehicule::setMarque('Mercedes');
$vehicule4->setCouleur('gris');
echo 'le vehicule 4 est de marque : <strong>'.Vehicule::getMarque().'</strong> et est de couleur: <strong>'.$vehicule4->getCouleur().'</strong><hr>';

/*
un element non static appartient a l'objet et static appartient a la class
si je modifie un element static , je modifie la class elle même
$objet->    element d'un objet a l'exterieur de la class
$this->     element d'un objet a l'interrieur de la class
class::     element d'un objet a l'exterieur de la class
self::      element d'un objet a l'interrieur de la class




*/

















?>