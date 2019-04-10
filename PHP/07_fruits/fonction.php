
<?php


function calcul($fruit,$poids)
{
    switch($fruit)
    {
        case 'cerises' : $prix_kg = 5.76;break;
        case'bananes':$prix_kg=1.06 ;break;
        case'pommes':$prix_kg= 1.61;break;
        case'peches':$prix_kg=3.23 ;break;
        default: return"fruit inexistant";break;
    }
    $resultat = round(($poids*$prix_kg/1000),2);
    //round est une fonction predefinie qui permet d'arrondir un chiffre (ici 2 chiffres/decimal apres la virgule)
    return "Les $fruit coutent $resultat Euro pour $poids <br>";

}

// echo calcul('bananes',500);


?>

