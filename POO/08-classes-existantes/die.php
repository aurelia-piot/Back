<?php

//                 $liste  $mario
function recherche($tab,$elem)
{
    if(!is_array($tab))
    {
        die('Vous devez envoyer un ARRAY'); //si die() s'execute, tout les traitement suivant ne sortent pas
                                            // die() permet de gerer le erreur de d'afficher des erreurs "propres" en français
    }
    //                       $mario   $liste
    $position = array_search($elem, $tab);//array_search() est une fonction predefinie qui permet de trouver la position d'un element dans un tableau array, la fonction retourne l'indice auquel se trouve l"element
    return $position;
}
//--------------------------------------------------------------------
$liste = array('Mario','Yoshi','Toad','Bowser');

echo " position de 'Mario' dans le tableau ARRAY :".recherche($liste,'Mario')."<hr>";


echo " position de 'Toad' dans le tableau ARRAY :".recherche($liste,'Toad')."<hr>";


echo " position de 'Bowser' dans le tableau ARRAY :".recherche("rgrgrgrgrgrgrgr",'Bowser')."<hr>"; // a ce moment la , die() s'execute, le script s'arrete et tout les traitement suivants ne sont pas execute"

echo "Traitement....";// ne s'affiche pas puisque die() executée ci dessus
//une erreur peut en engendrée une autres







?>