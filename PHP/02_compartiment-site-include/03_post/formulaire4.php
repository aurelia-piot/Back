<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
     <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <title>Form4</title>
</head>
<body>
    


<h1 class='display-4 text-center'>Formulaire 4</h1>


<?php

  if($_POST){
            echo '<pre>' ; print_r($_POST); echo'</pre>';
      echo '<hr>'  ;
  }


   echo '<div class ="col-md-3 offset-md-5 alert alert-info text-dark mx-auto text-center ">';
        foreach($_POST as $tab => $value)
        {
         
          
          echo $tab.' : '.$value.'<br>';
          
        }
echo '</div>'  ;

//exo si nous n'avions pas de BDD et que nous voudrions recupérer les emails des visiteur du sites, il serait interessant de les enregistrers dans un ficher .txt
//  il existe des fonctions en php qui permettent de le faire
// fopen() | fwrite() | fclose()


$fichier = fopen("liste.txt", "a"); //fopen() en mode 'a' permet de creer un fichier  (si il n'existe pas deja) et de l'ouvrir

fwrite($fichier, "pseudo  = ".$_POST['pseudo']."\r\n". "email  = " .$_POST['email']."\r\n");//fwrite()permet d'ecricre dans le fichier representer par $fichier
//"\r\n" => sequence d'echappement pour passer a la ligne dans le fichier .txt


fclose($fichier); // fclose() qui n'est pasindispensable , permet de fermer le fichier et ainsi libérer de la ressource


?>

</body>
</html>