<?php

/*
    UML 

----------------------
| Vehicule           |    1. Création d'un véhicule 1
----------------------    2. Attribuer un nombre de litres d'essence au véhicule 1 : 5l
| $litresEssence     |    3. Afficher le nombre de litres d'essence du véhicule 1

----------------------    4. Création d'une pompe
| setLitresEssence() |    5. Attribuer un nombre de litres d'essence à la pome : 800
| getLitresEssence() |    6. Afficher le nombre de litres d'essence de la pompe
----------------------    7. la pompe donné de l'essence en faisant le plein (50L)
                             à la voiture 1
----------------------    8. Afficher le nombre de litres d'essence de la voiture aprés
| Pompe              |       ravitaillement
----------------------    9. Afficher le nombre de litres restant à la pompe
| $litresEssence     |      
----------------------    public function donnerEssence(Vehicule $v)   
| setLitresEssence() |
| getLitresEssence() |
| donnerEssence()    |
----------------------
*/

/*

 Vehicule 

 $litresEssence    


setLitresEssence()
getLitresEssence()
*/


class Vehicule
{
    
    private $litresEssence ; 
    public function setLitresEssence($litres){$this->litresEssence = $litres;}
    public function getLitresEssence(){return $this->litresEssence;}     
}

$vehicule1 = new Vehicule;
echo'<pre>';var_dump($vehicule1);echo'</pre>';
$vehicule1->setLitresEssence(5);
echo"la voiture possede : <strong> ".$vehicule1->getLitresEssence()."</strong> litres d'essence";

//---------------------------------------------------

class Pompe 
{
    private $litresEssence;
    public function setlitresEssence($litresEssence){$this->litresEssence=$litresEssence;}
    public function getlitresEssence(){return $this->litresEssence;}
                                        // $v = $vehicule
    public function donnerEssence(Vehicule $v)//ici on exige un argument de type 'Vehicule', c'est a dire un objet issu de la classe 'Vehicule'
    {echo'<pre>';var_dump($v);echo'</pre>';
        //on defini le nombre de litre d'essence de la pompe
        // $this->setLitresEssence($pompe1->getLitresEssence()-(50- $vehicule->getLitresEssence()));
        $this->setLitresEssence($this->getLitresEssence()-(50- $v->getLitresEssence()));
        //on defini le nombre de litre d'essence du vehicule 1
        $v->setLitresEssence($v->getLitresEssence()+(50 - $v->getLitresEssence()));}  
                                                                                                                //   800      -         50 - 5                                                5                 + 50 -5


}
$pompe = new Pompe;
echo'<pre>';var_dump($pompe);echo'</pre>';
echo $pompe->setLitresEssence(800);
echo 'la pompe dispose de '. $pompe->getlitresEssence().'<hr>';
//echo 'la voiture a'. $pompe->getlitresEssence().'<hr>';
 $pompe->donnerEssence($vehicule1);
echo 'nombre du litre d\'essence a la pompe :'. $pompe->getLitresEssence().' Litres <hr>';
echo 'nombre du litre d\'essence pour le vehicule 1 :'. $vehicule1->getLitresEssence().' Litres <hr>';








// Pompe

//  $litresEssence


// setLitresEssence() 
// getLitresEssence() 
// donnerEssence()    








?>