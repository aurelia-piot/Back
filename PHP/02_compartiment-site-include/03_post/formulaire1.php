<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <title>formulaire 1</title>
</head>
<body>


<div class="container">

<!-- exo : realiser un formulaire HTML avec les champs suivants : 
email , mot de passe et un btn submit -->

<h1 class='display-4 text-center'>Formulaire 1</h1>


<?php


/*permet d'observer les données saisie dans le formulaire qui vont se stocker directement dans la superglobale $_POST, les indices correspondent aux attributs 'name' du formulaire HTML*/

//exo : afficher les données saisie dans le formulaire en passant par la superglobale $_POST
  

  if($_POST)
  //sans la condition IF, au premier chargement de la page, nous avons donc 2 erreure undefined, c'est du au fait que le formulaire n'a pas ete validé et donc les indices 'email" et "mdp" ne sont pas reconnu
  //si la condition IF est verifiée n si elle renvoi 'true', cela veut dire que l'on a soumit le formulaire et les indices 'email' et 'mdp' sont bien detectés et seront afficher
      {
      echo '<pre>' ; print_r($_POST); echo'</pre>';
      echo '<hr>'  ;
          //on extrait les valeurs une par  une en passant par la superglobale $_POST en crochetant aux differents indices
        echo '<div class ="col-md-3 offset-md-5 alert alert-success text-dark mx-auto text-center ">';
          echo $_POST["email"].'<br>';echo $_POST["mdp"];
        echo '</div>'  ;

      echo '<hr>'  ;
        // utiliser pour faire des controle de formulaire pous s'assurer de son bon fonctionnement 
        foreach($_POST as $tab)
        {
          //on parcour la superglobale $_POST de type ARRAY avec une boucle foreach
          echo '<div class ="col-md-3 offset-md-5 alert alert-info text-dark mx-auto text-center ">';
          echo $tab;
          echo '</div>'  ;
        }
      }
echo '<hr>'  ;





?>





<form class ="col-md-6 offset-md-3" method="post" action="">
<!-- methode : comment vont circuler les données || la mthode post permet de recupere les info saisie || ne pas utiliser la methode Get -->
  <!-- action : url de destination -->
  
  <div class="form-group">
    <label for="exampleInputEmail1">Email address</label>
    <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter email" name="email">
    <!-- il ne faut surtout pas oublier les attributs "name" sur le formulaire html, sinon aucune donnée saisie ne sera recuperée en PHP -->
  
  </div>
  <div class="form-group">
    <label for="mdp">Password</label>
    <input type="tex" class="form-control" id="mdp" placeholder="Password" name="mdp">
  </div>
 
  <button type="submit" class="btn btn-dark">Submit</button>
</form>

</div>
</body>
</html>