<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <title>cookie PHP</title>
</head>
<body>

<!-- le coockie est un fichier qui permet de stocker des donners qui ne sont pas sensible, c'est pour cela qu'il est conserver coter client et non coter serveur -->

<div class="container text-center">
    <h1 class="display-4 text-center">COOKIE PHP</h1> <hr>

<?php
if(isset($_GET['pays'])) // on entre dans la condition dans le cas ou l'on a cliqué sur un lien et donc envoyé un pays dans l'url
{
    $pays = $_GET['pays'];
}
elseif(isset($_COOCKIE['pays'])) // on entre dans le elseif dans le cas ou un cookie a ete creer et que par example  nous revenons sur le site 3 mois plus tard, la valeur du cookie sera afficher
{
    $pays = $_COOCKIE['pays'];
}
else
{
    $pays ='fr'; // lorsque l'on va sur le site pour la premiere fois et qu'il n'y a pas de cookie encor creer , le site est par default en fr 
}





//----------------------------------------------------
//Creation fichier cookie
$un_an = 365*24*3600; //correspond à une en seconde, ce sera la durée de vie du cookie


setcookie("pays" , $pays, time()+$un_an);// permet de creer un fichier cookie qui est conserver coté client , cet a dire sur l'ordinateur de l'internaute
// 3 arguments : nom du cookie / valeur du cookie / durée de vie du cookie

echo "<pre>";print_r($_COOKIE);echo"</pre>";


switch($pays)
{
    case 'fr':
         echo " vous etes sur un site en français <br>";
         break;

    case 'es':
        echo " vous etes sur un site en espagnol <br>";
        break;

    case 'an':
        echo " vous etes sur un site en anglais <br>";
        break;

    case 'it':
        echo " vous etes sur un site en italien <br>";
        break;


}







?>



    <h2>Votre langue :</h2>
        <ul class="col-md-2 offset-md-5 list-group ">
            <li class="list-group-item"><a href="?pays=fr">France</a></li>
            <li class="list-group-item"><a href="?pays=es">Espagne</a></li>
            <li class="list-group-item"><a href="?pays=an">Angleterre</a></li>
            <li class="list-group-item"><a href="?pays=it">Italie</a></li>
        </ul>


</div>


    
</body>
</html>