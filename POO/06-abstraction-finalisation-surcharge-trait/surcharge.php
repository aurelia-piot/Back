<?php

class A
{
    public function calcul(){return 10;}
}

class B extends A
{
    public function calcul(){$nb=parent::calcul(); //parent fonctionne pour appeler une methode d'une classe parent lors d'une surcharge (override)
        // une surcharge permet de prendre en compte le comportement de la fonction d'origine et d'y ajouter un traitement complementaire
        // permet d'ameliorer ou de changer le comportement d'un methode
                                    if($nb <=100)return "$nb est inferieur ou egal a 100<hr>";
                                    else        return "$nb est superieur 100<hr>";
                            }
}

//--------------------------------------------------------------------------------------------
//Pour la surcharge, si on ne faisait pas ca dans wordpress, on ne pourrais pas mettre a jour les CMS, on modifierais directementles fonction du coeur

//Exo instancier la class B et afficher le resultat de la condition

$b =new B;
echo $b->calcul();



?>