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


<!-- 

    1.Realiser un formulaire correspondant a la table 'employes' de la BDD 'entreprise' (sauf id_employes)
    
    2.Controler en PHP que l'on reception bien tout les champs du formulaire
    
    3.connexion BDD
    
    4.Traitement PHP/SQL permettant l'insertion d'un employé a partir du formulaire
 
 -->





<h1 class=" display-4 text-center">Formulaire entreprise</h1>


  <form class="col-md-4 offset-md-4 text-center" method="post">
  <div class="form-group">
    <label for="prenom">prenom</label>
    <input type="text" class="form-control" id="text" aria-describedby="prenom" placeholder="prenom" name="prenom">
    
  </div>
 
   <div class="form-group">
    <label for="nom">nom</label>
    <input type="text" class="form-control" id="text" aria-describedby="nom" placeholder="nom"name="nom">
    
  </div>
<label for="sexe">sexe</label>
  <select class="form-control" name="sexe">
  <option>m</option>
  <option>f</option>
</select>

  <div class="form-group">
    <label for="service">service</label>
    <input type="text" class="form-control" id="service" aria-describedby="service" placeholder="service"name="service">
    
  </div>


  <div class="form-group">
    <label for="dateembauche">date embauche</label>
    <input type="date" class="form-control" id="dateembauche" aria-describedby="date embauche" placeholder="date-embauche"name="date_embauche">
    
  </div>

  <div class="form-group">
    <label for="salaire">salaire</label>
    <input type="text" class="form-control" id="salaire" aria-describedby="salaire" placeholder="salaire"name="salaire">
    
  </div>

 
  <button type="submit" class="btn btn-primary">Submit</button>

</form>

<?php

           


$bdd = new PDO('mysql:host=localhost;dbname=entreprise','root','',array(PDO::ATTR_ERRMODE => PDO :: ERRMODE_WARNING, PDO::MYSQL_ATTR_INIT_COMMAND =>'SET NAMES utf8'));


if($_POST){ // si on valide le formulaire , on entre dans la condition


 echo '<pre>' ; print_r($_POST); echo'</pre>';
      echo '<hr>'  ;


$resultat = $bdd-> exec("INSERT INTO employes( prenom, nom, sexe, service, date_embauche, salaire) VALUE('$_POST[prenom]',' $_POST[nom]',' $_POST[sexe]',' $_POST[service]',' $_POST[date_embauche]',' $_POST[salaire]');");

//on utilise la super globale $_POST pour aller crocheter a chaque champ du formulaire afin de recupere sa valeur


 echo"Nombre d'enregistrement affecté(s) par l'INSERT : $resultat <br>";
 echo "Dernier ID généré : ". $bdd ->lastInsertId(). '<hr>';
 echo '<div class ="col-md-6 offset-md-3 alert alert-success text-center"> l\'employé <strong>'.$_POST['nom'].'</strong> a bien ete enregistré !</div>';
     

}



?>


</body>
</html>