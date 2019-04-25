<?php
extract($_POST);


?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <title>Exo1p2</title>
    <!-- Hello Aure -->
</head>
<body>

<h3 class="text-center display-4">EXO 2.2</h3>
<div class="offset-md-2 col-md-8 text-center">Créer une page avec deux liens : homme, femme. Récupérer le texte du lien cliqué en affichant le message "Vous êtes un Homme" ou "Vous êtes une femme".
</div>


<hr>
<?php
if(isset($_GET['genre'])):
  if($_GET['genre']=='homme'){
    $genre= "un homme";
  }
  if($_GET['genre']=='femme'){
    $genre="une femme";
  }
  if($_GET['genre']=='neutre'){
    $genre="Neutre";
  }

?>
<div class="text-center">
<p>Vous êtes <?=$genre?> ?</p>
</div>
<?php endif;?>
</div>
<br>
<br>
<br>
<!-- ---------------------------------------------------------------------------------------------------- -->
  <hr>
  <hr>

 <h3 class="text-center display-4">EXO 2.3</h3>
<div class="offset-md-2 col-md-8 text-center">Créer une page 1 avec plusieurs liens (contexte : carte de restaurant) : pizza, salade, viande, poisson. Récupérer le plat cliqué (dans la page 1) et afficher-le sur la page 2 en adressant un message correspondant au choix de l'internaute. Exemple si l'on a cliqué sur pizza : "Vous avez choisi de manger 1 pizza" .
</div><hr>



<div class="offset-md-5 col-md-2">

<?php if(isset($_GET['commande'])):?>
<hr>
<p>Vous avez choisi de manger 1 <?=$_GET['commande']?>?</p>
<?php endif;?>
</div>


<br>
<br>
<br>
<br>
<br>
<br>
<br>

</body>
</html>