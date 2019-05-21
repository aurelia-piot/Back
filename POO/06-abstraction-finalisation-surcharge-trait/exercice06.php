<?php
abstract class Vehicule
{
   final public function demarrer(){return"je demarre ";}
   abstract public function carburant();
    public function nombreDeTestObligatoire(){return 100 ;}
}

//-------------------------------------------------

class Peugeot extends Vehicule
{
    public function carburant(){return "essence";}
    public function nombreDeTestObligatoire(){$resultat =parent::nombreDeTestObligatoire();return $resultat +70;}
}

//----------------------------------------------------
class Renault extends Vehicule
{

    public function carburant(){return "diesel";}
    public function nombreDeTestObligatoire(){$resultat =parent::nombreDeTestObligatoire();return $resultat +30;}
}


//----------------------------------------------------

/* 
 Faite en sorte de ne pas avoir d'objet Vehicule                                                    //abstract class Vehicule
 Renault et Peugeot doivent posseder la meme methode demarrer()                                     //FINAL public function demarrer(){return"je demarre <hr>";}
 obligation pour renault de declarer un carburant 'diesel' et pour la peugeot un carburant 'essence //abstract public function carburant(){}
 La renault doit faire 30 test de plus qu'un Vehicule de Base
 La peugeot doit faire 70 test de plus qu'un Vehicule de Base
 effectuer les afichage necessaires


*/



$renault= new Renault;
$peugeot= new Peugeot;


// echo'<pre>';print_r(get_class_methods($peugeot));echo'</pre>';
// echo'<pre>';print_r(get_class_methods($renault));echo'</pre>';


echo "PEUGEOT : ".$peugeot->demarrer()."avec de l'".$peugeot->carburant()." et doit faire " .$peugeot->nombreDeTestObligatoire()." Tours pour le test <hr>";

echo "RENAULT : ". $renault->demarrer()."avec du ".$renault->carburant()." et doit faire " .$renault->nombreDeTestObligatoire()." Tours pour le test <hr>";
?>