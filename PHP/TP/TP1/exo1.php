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
    <title>Exo 1p1</title>
    <!-- Hello Peter -->
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
<li><a href="exo1-2.php?genre=homme" target="blanc">Homme</a></li>
<li><a href="exo1-2.php?genre=femme"target="blanc">Femme</a></li>
<li><a href="exo1-2.php?genre=neutre" target="blanc">Neutre</a></li>
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

<?php endif;?>
</div>
<!-- ---------------------------------------------------------------------------------------------------- -->
  <hr>
  <hr>

 <h3 class="text-center display-4">EXO 2.3</h3>
<div class="offset-md-2 col-md-8 text-center">Créer une page 1 avec plusieurs liens (contexte : carte de restaurant) : pizza, salade, viande, poisson. Récupérer le plat cliqué (dans la page 1) et afficher-le sur la page 2 en adressant un message correspondant au choix de l'internaute. Exemple si l'on a cliqué sur pizza : "Vous avez choisi de manger 1 pizza" .
</div><hr>



<div class="offset-md-5 col-md-2">
<ul>
<li><a href="exo1-2.php?commande=pizza" target="blanc">pizza</a></li>
<li><a href="exo1-2.php?commande=salade" target="blanc">salade</a></li>
<li><a href="exo1-2.php?commande=viande" target="blanc">viande</a></li>
<li><a href="exo1-2.php?commande=poisson" target="blanc">poisson</a></li>

</ul>
<?php if(isset($_GET['commande'])):?>
<hr>
<p>Vpus avez choisi de manger 1 <?=$_GET['commande']?>?</p>
<?php endif;?>
</div>



<!-- ---------------------------------------------------------------------------------------------------- -->
  <hr>
  <hr>
 <h2 class="text-center display-4">EXERCICE 3 : BOUCLE</h2>
 <h3 class="text-center display-4">EXO 3.1</h3>
<div class="offset-md-2 col-md-8 text-center">Afficher des nombres allant de 1 à 100.</div><hr>



<?php 
$chiffre = 0;
echo'<div class="offset-md-3 col-md-6">';
for($chiffre; $chiffre<= 100; $chiffre++){

echo $chiffre.'  ';


}
echo '</div>';
?>


<!-- ---------------------------------------------------------------------------------------------------- -->
  <hr>
  <hr>
 <h3 class="text-center display-4">EXO 3.2</h3>
<div class="offset-md-2 col-md-8 text-center">Afficher des nombres allant de 1 à 100 avec le chiffre 50 en rouge.</div><hr>


<?php 


echo'<div class="offset-md-3 col-md-6">';
for($chiffre = 0; $chiffre< 101; $chiffre++)
{
  
//if($chiffre > 50){echo $chiffre.' '; continue;}//ça marche mais ya plus simple
 if($chiffre === 50){echo "<div class='text-danger d-md-inline '>$chiffre  </div>" ; }
 else{echo "<div class='text-dark d-md-inline '>$chiffre  </div>" ;}
//if($chiffre < 50){echo $chiffre.' '; }

     }
echo '</div>';
?>

<!-- ---------------------------------------------------------------------------------------------------- -->
  <hr>
  <hr>
 <h3 class="text-center display-4">EXO 3.3</h3>
<div class="offset-md-2 col-md-8 text-center">Afficher des nombres allant de 2000 à 1930.</div><hr>

<?php 
echo'<div class="offset-md-3 col-md-6">';
for($nombre = 2000; $nombre>1929; $nombre--)
{echo $nombre.' ';}
echo '</div>';
?>

<!-- ---------------------------------------------------------------------------------------------------- -->
  <hr>
  <hr>
 <h3 class="text-center display-4">EXO 3.4</h3>
<div class="offset-md-2 col-md-8 text-center">Afficher le titre suivant 100 fois : <\h1>Titre à afficher 100 fois<\h1></div><hr>

<?php 
echo'<div class="offset-md-3 col-md-6">';
for($titre = 0; $titre<100; $titre++)
{ echo' Titre à afficher 100 fois ';}
echo '</div>';
?>

<!-- ---------------------------------------------------------------------------------------------------- -->
  <hr>
  <hr>
 <h3 class="text-center display-4">EXO 3.5</h3>
<div class="offset-md-2 col-md-8 text-center">Afficher le titre suivant "<\h1>Je m'affiche pour la Nème fois<\h1>". Remplacer le N avec la valeur de $i (tour de boucle).</div><hr>


<?php 
echo'<div class="offset-md-3 col-md-6">';
for($n= 1; $n<21; $n++)
{if($n ==1 ){echo 'Je m\'affiche pour la '.$n.'ere fois' ;continue;}
if($n > 2 ){echo'_Je m\'affiche pour la '.$n.'ème fois';}
   }
echo '</div>';
?>



<!-- ---------------------------------------------------------------------------------------------------- -->
  <hr>
  <hr>
  <h2 class="text-center display-4">CALCULATRICE</h2>

<div class="offset-md-2 col-md-8 text-center">La page calculatrice est un formulaire avec un menu déroulant qui nous permet de choisir le signe de l’opération (addition, soustraction, multiplication, division).</div><hr>




<form method='post'>

  <div class="form-row ">

  <div class="form-group offset-md-3 col-md-2">
   
    <input type="text" class="form-control" placeholder="ex: 1 "name="chiffre1">
  </div>
  <div class="form-group">
    
    <select class="form-control" name="operateur">
      <option value='*'>x</option>
      <option value='/'>/</option>
      <option value='+'>+</option>
      <option value='-'>-</option>
     
    </select>
  </div>

  <div class="form-group col-md-2">
   
    <input type="text" class="form-control" placeholder="ex: 1 "name="chiffre2">
  </div>
<button type="submit" class="btn btn-primary h-25 col-md-2" name="calcul">calcul</button>

</div>

<?php
if(isset($_POST['calcul'])){
//echo'<pre>';print_r($_POST);echo'</pre>';

if($operateur === "*"){$resultat= $chiffre1 * $chiffre2 ;}
if($operateur === "/"){if($chiffre1 == 0 && $chiffre2 == 0){$resultat="que cherche-tu as faire ?";}else{
  $resultat= $chiffre1 / $chiffre2 ;}}
if($operateur === "+"){$resultat= $chiffre1 + $chiffre2 ;}
if($operateur === "-"){$resultat= $chiffre1 - $chiffre2 ;}

echo  "<div class='offset-md-5 col-md-2 text-center'>".$chiffre1.' '. $operateur.' '.$chiffre2."</div><br>";
echo "<div class='offset-md-5 col-md-2 bg-success text-center py-lg-3 rounded-sm' >".$resultat."</div>";
}
?>




</form>











<br>
<br>
<br>
<br>
<br>
<br>
<br>

</body>
</html>