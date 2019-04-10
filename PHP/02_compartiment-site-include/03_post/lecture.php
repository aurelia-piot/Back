<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

    <title>lecture fichier txt</title>
</head>
<body>
    

<?php

//puisque nous avons reussis a introduire des information dans un fichier .txt, il serait interessant de faire l'invere et de lire le contenu d'un fichier .txt

$nom_fichier= "liste.txt";
$fichier = file($nom_fichier); //ici la fonction file() fait tout le travail, elle retourne chaque ligne du fichier liste.txt a des indices différents d'un tableau ARRAY

echo '<pre>';print_r($fichier);echo'</pre>';

?>





</body>
</html>