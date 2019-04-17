
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





    <h1 class="text-center display-4">TP Formulaire Produits</h1>
    <hr>
    <h3 class="text-center display-4">EXO 1.2</h3>
    
    <hr>
<div class="offset-md-2 col-md-8 text-center">Créer un formulaire en affichant les saisies récupérées sur la même page. Champ à prévoir (contexte : produit) : titre, couleur, taille, poids, prix, description, stock, fournisseur</div><hr>
    <div class="container mb-6 col-md-8"> 
<form method="post">
<div class="form-row">
 <div class="form-group offset-md-4 col-md-2">
    <label for="titre">Titre</label>
    <input type="text" class="form-control" id="titre" placeholder="Titre"name="titre">
  </div>
   <div class="form-group col-md-2">
    <label for="couleur">Couleur</label>
    <input type="text" class="form-control" id="couleur" placeholder="couleur"name="couleur">
  </div>
 </div>


  <div class="form-row">
   <div class="form-group offset-md-4 col-md-2">
    <label for="taille">Taille</label>
    <input type="text" class="form-control" id="taille" placeholder="Taille"name="taille">
  </div>
   <div class="form-group  col-md-2">
    <label for="poids">poids</label>
    <input type="text" class="form-control" id="poids" placeholder="poids"name="poids">
  </div>
  </div>

<div class="form-row">
   <div class="form-group  offset-md-4  col-md-2">
    <label for="prix">prix</label>
    <input type="text" class="form-control" id="prix" placeholder="prix"name="prix">
  </div>
   <div class="form-group  col-md-2">
    <label for="description">description</label>
    <input type="text" class="form-control" id="description" placeholder="description"name="description">
  </div>
  </div>

<div class="form-row">
   <div class="form-group  offset-md-4  col-md-2">
    <label for="stock">Stock</label>
    <input type="text" class="form-control" id="stock " placeholder="stock"name="stock">
  </div>
   <div class="form-group  col-md-2">
    <label for="fournisseur">Fournisseur</label>
    <input type="text" class="form-control" id="fournisseur" placeholder="fournisseur"name="fournisseur">
  </div>
    </div>

 <button class=" offset-md-4  col-md-4 btn btn-primary" type="submit" name="valider" >valider</button>
</form>
<?php


if(isset($_POST['valider'])){ echo '<div class="form-group  offset-md-4 col-md-4">';echo '<pre>';print_r($_POST);echo '</pre>';echo '</div>';}
?>
    </div>
  <hr>
  <hr>
<!-- ---------------------------------------------------------------------------------------------------- -->

 <h3 class="text-center display-4">EXO 1.4</h3>
    
    <hr>
    <div class="offset-md-2 col-md-8 text-center">Créer un formulaire en affichant les saisies récupérées et en controlant que le pseudo soit compris entre 3 et 10 caractères maximum (sinon prévoir un message d'erreur). Champ à prévoir (contexte : membre) : pseudo, mdp, email.
</div><hr>
    
<form method="post">
<div class="form-row ">
 <div class="form-group offset-md-4 col-md-2">
    
    <input type="text" class="form-control" id=" pseudo" placeholder=" pseudo"name=" pseudo">
  </div>
   <div class="form-group col-md-2">
    
    <input type="text" class="form-control" id="email" placeholder="email"name="email">
  </div>
 </div>
 <div class="form-row ">
 <div class="form-group  offset-md-4 col-md-4">
    
    <input type="text" class="form-control" id=" mdp" placeholder=" mdp"name=" mdp">
  </div> </div>
 <button class=" offset-md-4  col-md-4 btn btn-primary" type="submit" name="valider2">valider</button>
</form>


<?php


if(isset($_POST['valider2'])){
  if(strlen($_POST['pseudo']) <=3  || strlen($_POST['pseudo'])>=10) {
   echo '<div class="form-group  offset-md-4 col-md-4 alert alert-danger"> le pseudo doit comprendre entre 3 et 10 caractere </div>';
}else{
 echo '<div class="form-group  offset-md-4 col-md-4">';echo '<pre>';print_r($_POST);echo '</pre>';echo '</div>';
}}
?>

<!-- ---------------------------------------------------------------------------------------------------- -->
  <hr>
  <hr>

<h2 class="text-center display-4">LIENS GET</h2>
 <h3 class="text-center display-4">EXO 2</h3>
    
    <hr>
    <div class="offset-md-2 col-md-8 text-center">Pour cet exercice, nous allons créer plusieurs liens en HTML (qui pointent vers la même page) avec une récupération des paramètres en PHP . L ' objectif est de récupérer les paramètres véhiculés par l'url sur la même page
</div><hr>
<div class="offset-md-5 col-md-2">
<ul>
<li><a href="?pays=français">France</a></li>
<li><a href="?pays=italien">Italie</a></li>
<li><a href="?pays=espagnole">Espagne</a></li>
<li><a href="?pays=anglais">Angleterre</a></li>
</ul>

<?php if(isset($_GET['pays'])):?>
<hr>
<p>Vous êtes <?=$_GET['pays'] ?>?</p>
<?php endif;?>
</div>
<!-- ---------------------------------------------------------------------------------------------------- -->
  <hr>
  <hr>

 <h3 class="text-center display-4">EXO 2.2</h3>
<div class="offset-md-2 col-md-8 text-center">Créer une page avec deux liens : homme, femme. Récupérer le texte du lien cliqué en affichant le message "Vous êtes un Homme" ou "Vous êtes une femme".
</div>

<div class="offset-md-5 col-md-2">
<ul>
<li><a href="?genre=homme">Homme</a></li>
<li><a href="?genre=femme">Femme</a></li>
<li><a href="?genre=neutre">Neutre</a></li>
</ul>
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
<p>Vous êtes <?=$genre?> ?</p>
</div>
<?php endif;?>




</body>
</html>