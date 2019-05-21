
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
<script src="ajax8.js"></script>
<!-- lien fichier js -->

    <title>08 AJAX SELECT service</title>
</head>
<body>

    <div class="container">
    <h1 class="display-4 text-center ">08 AJAX SELECT  service |  Selectionner par rapport au service</h1> <hr>
 
        
<div id="table"></div>
<!-- cette div reception la table -->

    <form action="" methode='post' class="col-md-6 offset-md-3 text-center">

<div class="form-group">
        <div id="service">
        <!-- cette div sert a remplacer le selecteur initial par le selecteur mis a jour, c'est a dire sans l'employé supprimé, tout cela en instantané -->
<?php
        //realiser un selecteur avec tous les nom des employes
$select = $bdd->query("SELECT DISTINCT service FROM employes");

// echo '<pre>' ; print_r($selectemployes); echo'</pre>'; 
?>

<div class="form-group">

    <select class="form-control form-control-lg" id="services" name="service" type="submit">
             <option value="choose">choisir</option>
       <?php while($service = $select -> fetch(PDO::FETCH_ASSOC)): ?>  
             <option ><?=$service['service']?></option>

       <?php endwhile;?>         
     </select> 


        </div><!-- fin div form-group -->
        
        </div><!-- fin div #service -->

</div><!-- fin div form-group -->

       </form>

       <!-- ----------------------------------------------------------------------------- -->
<div id="resultat">
<!-- --recois la table -->


<?php
$select = $bdd->query("SELECT * FROM employes ");
$selectemployes = $select->fetchall(PDO::FETCH_ASSOC);//fetchall() retourne un tableau multi dimensionnel avec chaque tableau (de chaque employé) indexé numeriquement
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




</div><!-- fin div #resultat -->






    </div><!-- fin div container -->


</body>
</html>