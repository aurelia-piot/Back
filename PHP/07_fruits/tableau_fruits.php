<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <title>tableau fruits php</title>
</head>
<body>
    
<!-- 
    1- Declarer un tableau ARRAY avec tout les fruits
	
    2- Declarer un tableau ARRAY avec les poids suivants : 100, 500, 1000, 1500, 2000, 3000, 5000, 10000.
	
    3- Affichez les 2 tableaux
	
    4- Sortir le fruit "cerises" et le poids 500 en passant par vos tableaux pour les transmettres a la fonction "calcul()" et obtenir le prix.
	
    5- Sortir tout les prix pour les cerises avec tout les poids (indice: boucle).
	
    6- Sortir tout les prix pour tout les fruits avec tout les poids (indice: boucle imbriquee).
	
    7- Faire un affichage dans une table HTML pour une presentation plus sympa.


 -->

<div class="container ">
<h1 class="display-4 text-center ">TABLEAUX FRUITS</h1><hr>


<?php
include 'fonction.php';

$tab_fruits= array("pommes","bananes","peches","cerises");

$tab_poids = array("100","500","1000","1500","2000","3000","10000");


//    3- Affichez les 2 tableaux
	

echo"<pre>"; print_r($tab_fruits); echo"</pre>";

echo"<pre>"; print_r($tab_poids ); echo"</pre>";


//   4- Sortir le fruit "cerises" et le poids 500 en passant par vos tableaux pour les transmettres a la fonction "calcul()" et obtenir le prix.



echo'<hr>'. calcul($tab_fruits[3],$tab_poids[1]).'<hr>';


//  5- Sortir tout les prix pour les cerises avec tout les poids (indice: boucle).

echo ' <div class="col-md-6 offset-md-3 mx-auto alert alert-info text-center">';


    foreach($tab_poids as $poids)
    {
        echo calcul($tab_fruits[3],$poids).'<hr>';
    }


echo"</div>" ;



// 6- Sortir tout les prix pour tout les fruits avec tout les poids (indice: boucle imbriquee).
	


 
foreach($tab_fruits as $fruits)
{
    echo ' <div class="col-md-6 offset-md-3 mx-auto alert alert-secondary text-center">';
foreach($tab_poids as $poids)
    {
        //la boucle foreach parcours tout les poids et ensuite on change de fruit
        echo calcul($fruits,$poids).'<hr>';
    }
    
echo"</div><hr>" ;
}



// 7- Faire un affichage dans une table HTML pour une presentation plus sympa.

echo '<table class=" table table-bordered text-center"><tr>'; 
 echo"<th>Poids</th>" ;
foreach($tab_fruits as $fruits)
{

  echo"<th>$fruits</th>" ;
}

  foreach($tab_poids as $poids)
    {
        echo"<tr><th> $poids g</th>" ;
        foreach($tab_fruits as $fruits)
        {
        //la boucle foreach parcours tout les poids et ensuite on change de fruit
        echo "<td>".calcul($fruits,$poids).'</td>';
        }
       echo" </tr>";
    }
    


echo"</table>";

?>
</div>

</body>
</html>