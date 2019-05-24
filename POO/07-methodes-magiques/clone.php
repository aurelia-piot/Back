<?php

class Ecole
{
    public $nom = "POLES";
    public $cp ="94";
    public function __clone(){$this->cp=92;}
}
//-------------------------------------------
$ecole1 = new Ecole;
$ecole1->cp = 75;
echo'<pre>';var_dump($ecole1);echo'</pre>';

$ecole2 = new Ecole;
echo'<pre>';var_dump($ecole2);echo'</pre>';

$ecole3=$ecole1;
// lorsque l'on modifie $ecole1 cela prend effet sur $ecole3 et vis-versa, $ecole1 et $ecole3 sont des refernece qui pointe vers le meme objet #1, Il representent le meme objet


echo'<pre>';var_dump($ecole3);echo'</pre>';
$ecole3->cp  = 91;
echo'Ecole1 > '.$ecole1->cp.'<hr>';
echo'Ecole3 > '.$ecole3->cp.'<hr>';

$ecole4= clone $ecole2;
echo'<pre>';var_dump($ecole4);echo'</pre>';
echo'<pre>';var_dump($ecole2);echo'</pre>';
echo'Ecole2 > '.$ecole2->cp.'<hr>';
echo'Ecole4 > '.$ecole4->cp.'<hr>';
//clone() s'execute lorsque l'on clone un objet, cela créer un nouvel objet avec une nouvelle reference (#3)

//Si nous avions 2 classes quasiment identique, nous privilègerions le clonage et apporté nun modification du comportement de la classe


?>