<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <title>session 1</title>
</head>
<body>
    
<div class="container text-center">
<h1 class="display-4 text-center"> SESSION PHP</h1><hr>

<?php

// une session est un moyen simple de garder des variables accessibles quelque soit la pge ou l'on se trouve 
// par exemple , sans une session active , nous ne pourrions naviguer sur un site tout en restant connecté
// Les sessions sont conservers coté serveur puisqu'elles conteienent des données sensible tel que votre email, nom , prenom, ect...



session_start(); // permet de créeer un fichier session se trouvant dans le dossier c:/xamp/tmp



//on stock des données dans la session en creant des indices au tableau ARRAY
$_SESSION['pseudo']= 'pitt';
$_SESSION['nom']="PIOU";
$_SESSION['prenom']="Petter";

echo"<pre>";print_r($_SESSION); echo"</pre>";

// vider une partie de la session

unset($_SESSION['prenom']);

echo"<pre>";print_r($_SESSION); echo"</pre>";



// supprimer la session 
            //supprime le fichier du dossier tmp
// session_destroy();


?>





</div>


</body>
</html>