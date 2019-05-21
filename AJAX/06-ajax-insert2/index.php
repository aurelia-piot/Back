
<?php
require_once('init.php');
extract($_POST);

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T"
        crossorigin="anonymous">
<!-- lien bootstrap -->
    <script src="https://code.jquery.com/jquery-3.4.1.min.js" integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo="
        crossorigin="anonymous"></script>
       <!-- Lien jquery -->
<script src="ajax6.js"></script>
<!-- lien fichier js -->
    <title>06 AJAX Insert2</title>
</head>
<body>

    <div class="container">
    <h1 class="display-4 text-center ">06 AJAX INSERT2</h1> <hr>
    
<div id="resultat"></div>

    <form action="" methode='post' id="formulaire" class="col-md-6 offset-md-3 text-center">
<div class="form-group">
        <label for="prenom">Prenom</label>
        <input type="text" name='prenom'class='form-control' id='prenom' placeholder="prenom à inserer">
</div>
<div class="form-group">
        <label for="nom">nom</label>
        <input type="text" name='nom'class='form-control' id="nom" placeholder="nom">
</div>
<div class="form-group">
        <label for="sexe">sexe</label>
        <select name="sexe" id="sexe">
        <option value="m">male</option>
        <option value="f">femal</option>
        </select>
<div class="form-group">
        <label for="service">service</label>
        <input type="text" name='service'class='form-control' id="service"  placeholder="service">
</div>
<div class="form-group">
        <label for="dateembauche">Date embauche</label>
        <input type="date" name='dateembauche'class='form-control' id='dateembauche' placeholder="date embauche">
</div>
<div class="form-group">
        <label for="personne">Salaire</label>
        <input type="text" name='salaire'class='form-control' id='salaire' placeholder="salaire">
</div>







<button type="submit" id='submit' class="btn btn-dark">inserer </button>
       </form>
    </div>













<div id="table">






<?php

$select = $bdd->query("SELECT * FROM employes ");
$selectemployes = $select->fetchall(PDO::FETCH_ASSOC);
?>




<table class='table table-bordered table-dark'>
<tr>

  <?php foreach($selectemployes[0] as $key =>$value):?><!--ici on recupere les indices-->

    <th><?=strtoupper($key)?></th><!--strtoupper permet d'afficher en majuscule-->

<?php endforeach; ?>

    </tr>

    <?php foreach($selectemployes as $key => $tab):?>
    
    <tr>
      
      <?php foreach($tab as $key2 => $value ):?>
          <td><?=$value?></td>

<?php endforeach; ?>
</tr> 
<?php endforeach; ?>

</table>
</div>


 






</body>
</html>