
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
<script src="ajax7.js"></script>
<!-- lien fichier js -->
    <title>07 AJAX Delet2</title>
</head>
<body>

    <div class="container">
    <h1 class="display-4 text-center ">07 AJAX Delet2</h1> <hr>
    

<div id="reponse"></div>
<!-- recupe les message erreur ou valde -->

   
        <!-- cette div sert a remplacer le selecteur initial par le selecteur mis a jour, c'est a dire sans l'employé supprimé, tout cela en instantané -->
 <form action="" methode='post' class="col-md-6 offset-md-3 text-center">

<div class="form-group">
<?php
        //realiser un selecteur avec tous les nom des employes
$select = $bdd->query("SELECT * FROM employes");

// echo '<pre>' ; print_r($selectemployes); echo'</pre>'; 
?>
     <div id="selector">
<div class="form-group">

    <select class="form-control form-control-lg" id="personne" name="personne">
       <?php while($employes = $select -> fetch(PDO::FETCH_ASSOC)): ?>  
             <option value="<?=$employes['id_employes']?>" ><?=$employes['prenom']?></option>
       <?php endwhile;?>         
     </select> 


        </div><!-- fin div form-group -->
        
<!-- </div>fin div form-group -->

        </div><!-- fin div #selector -->


        <input type="submit" value="choisir" id='submit' class="col-md-6 offset-md-2 btn btn-dark" >

</div>

       </form>
<br>





<div id="table">
<!-- recupere la new table -->





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
<!-- container -->

 






</body>
</html>