<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

    <title>Document</title>
</head>
<body>
   <?php

include_once "fonction.php";

//la condition permet de verifier si l'indice 'type est bien definit dans l'url, donc par consequent que l'on a cliqué sur un lien

if(isset($_GET['type']))
{
echo calcul($_GET['type'],1000); // on va crocheter dans l'url pour recupere le bon fruit sur lequel on a cliqué
}

    

?>
 <!-- 

    1.effectuer 4 liens HTML pointant sur la meme page avec des noms differents de fruits.
   
    2.faite en sorte d'envoyer 'cerise dans l'url si on clic sur le lien "cerises".(faire de meme avec tout les fruits)
   
    3. tenter d'afficher "cerise" sur la page web si l'on a cliqué dessus (si cerise est passée dans l'url par consequent / meme chose avec tout les fruit)"
   
    4.Envoyer l'information à la fonction calcul() afin d'afficher le prix 1 kg de cerises (pareil pour tout les fruits)



     -->

    <div class="container text-center">
    
    <h1 class="display-4 text-center">Fruit</h1><hr>

    <!-- si l'indice choix est definie dans l'url, c'est a dire que l'on a clique sur un lien , on affiche le fruit sinon on affiche un message d'erreur -->

<!-- condition ternaire PHP7 :-->
<!-- <h4>Votre choix :  <strong class="text-info"> <?=//(isset($_GET['type'])) ? $_GET['type'] : "Aucun fruits selectionner";?></strong></h4> -->
        <!-- //  OU -->

<!--  condition classique non ternaire : -->
<h4>Votre choix :  <strong class="text-info"> <?=(isset($_GET['type'])) $_GET['type'] ; else echo "Aucun fruits selectionner";?></strong></h4>

<ul class="col-md-2 offset-md-5 list-group">

    <li class="list-group-item"><a href="?type=bananes" target='blank'>bananes</a></li> 
   <li class="list-group-item"> <a href="?type=cerises" target='blank'>cerises</a> </li>
  <li class="list-group-item">  <a href="?type=pommes" target='blank'>pommes</a></li> 
   <li class="list-group-item"> <a href="?type=peches" target='blank'>peches</a></li> 
    </ul>
    
    </div>
    







</body>
</html>