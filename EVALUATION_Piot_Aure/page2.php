<?php

require_once("init.php")
?>





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

  <h2 class="text-center display-4">Affichage des données </h2>


<div class="offset-md-2 col-md-8 "><hr> Créez une page permettant l’affichage des données saisies, nous devrons y retrouver l’ensemble des logements avec leurs informations respectives. <br>
Cet affichage se fera de préférence sous forme de tableau, et il faudra prévoir de couper le texte en ajoutant « … » si la description ou une autre information textuelle est trop longue. <br>
Concernant la photo, nous n’afficherons pas le chemin, mais bien la photo en elle-même, toutefois, cela ne doit pas venir perturber la lisibilité de l’internaute. <hr></div>

    
<?php
$resultat = $bdd -> query("SELECT * FROM logement");

$logement = $resultat->fetchall(PDO::FETCH_ASSOC);

?>

<hr>
<div class="col-md-8 offset-md-2">
<table class="table table-bordered text-center table1"><tr>

  <?php foreach($logement[0] as $key =>$value):?><!--ici on recupere les indices-->
<?php if($key !== 'id_logement'):?>
    <th><?=strtoupper($key)?></th><!--strtoupper permet d'afficher en majuscule-->

<?php endif;?>
<?php endforeach; ?>
  </tr>





    <?php foreach($logement as $key => $tab):?>

    
    <tr>
      
      <?php foreach($tab as $key2 => $value ):?>

 <?php if($key2 !=='id_logement'):?>
      
            <?php if($key2 =='photo'):?>

           <td> <img width="150px" src="<?=$value?>"alt="<?=$tab['titre']?>" ></td>
           
        

            <?php elseif($key2 == 'description'):?> 
               <td> <?php if(iconv_strlen($tab['description'])>10){echo substr($value,0,10)."[...]"; }else{echo $tab['description'];}?></td>
      

        <?php else:?>
          <td><?=$value?></td>
         
            <?php endif; ?>
     <?php endif;?>
<?php endforeach; ?>

<?php endforeach; ?>
  

</table>

</div>













</body>
</html>