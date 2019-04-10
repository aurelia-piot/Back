<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    



<?php

//exo afficher le prix de 2 kg de bananes en executant la fonction calcul() sans la copier/coller ni la changer

// permet d'importer le fichier 'fonction.php' directement sur la pge 'appel.php', c'est comme si on avait fait un copier /coller
include 'fonction.php';
//include_once 'fonction.php';
//require_once('fonction.php');

echo calcul('bananes',2000);


?>


</body>
</html>