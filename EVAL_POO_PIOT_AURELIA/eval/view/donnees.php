<?php

//echo"<pre>";print_r($donnees);echo"</pre>";
//$donnees correspond a l'indice 'donnees' declare dans la methode render() du controller
//echo"<pre>";print_r($fields);echo"</pre>";
?>


<!-- ////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////// -->
                                                    <!-- TABLE -->







<table class="table table-bordered text-center">
<thead>
    <tr>
    <th>ID</th> <!-- on créer manuelement le champ que nous avons supprimmer au moment de la requete Sql dans EntityRepository -->
        <?php foreach($fields as $value): ?>
            <th><?=$value['Field']?></th>
        <?php endforeach;?>
        <th>Detail</th>
        <th>Modifier</th>
        <th>Supprimer</th>
    </tr>
</thead>
<tbody>


<?php foreach($donnees as $value): ?>

<tr>
    <td><?=implode('</td><td>',$value)?></td>

<?php  if(isset($_GET['action'])&&$_GET['action']=='association_vehicule_conducteur'):                       ?>



            <td><a href="?action=vehicule&op=select&id=<?=$value["id_association"]?>" class="text-dark"><i class="fas fa-eye"></i></a></td>
            <td><a href="?action=vehicule&op=update&id=<?=$value["id_association"]?>" class="text-dark"><i class="fas fa-edit"></i></a></td>
            <td><a href="?action=vehicule&op=delete&id=<?=$value["id_association"]?>" class="text-danger" onclick="return(confirm('En êtes vous certain?'))"><i class="fas fa-trash-alt"></i></a></td>     



<?php   elseif(isset($_GET['action'])&&$_GET['action']=='vehicule'):                       ?>



            <td><a href="?action=vehicule&op=select&id=<?=$value["id_vehicule"]?>" class="text-dark"><i class="fas fa-eye"></i></a></td>
            <td><a href="?action=vehicule&op=update&id=<?=$value["id_vehicule"]?>" class="text-dark"><i class="fas fa-edit"></i></a></td>
            <td><a href="?action=vehicule&op=delete&id=<?=$value["id_vehicule"]?>" class="text-danger" onclick="return(confirm('En êtes vous certain?'))"><i class="fas fa-trash-alt"></i></a></td>



<?php   else:                       ?> 



            <td><a href="?action=conducteur&op=select&id=<?=$value["id_conducteur"]?>" class="text-dark"><i class="fas fa-eye"></i></a></td>
            <td><a href="?action=conducteur&op=update&id=<?=$value["id_conducteur"]?>" class="text-dark"><i class="fas fa-edit"></i></a></td>
            <td><a href="?action=conducteur&op=delete&id=<?=$value["id_conducteur"]?>" class="text-danger" onclick="return(confirm('En êtes vous certain?'))"><i class="fas fa-trash-alt"></i></a></td>
   
<?php   endif;                       ?>
</tr>
<?php endforeach;?>
</tbody>
</table>

       
<!-- mmhhhhhhhhhhhhhhhhhhhhhh l'id ne se recupere pas bien :/ ( ; ___ ;) -->
<!-- MIRACLE -->
<!-- c'est bon -->
 <!-- <pre><?php // print_r($donnees)?></pre>  -->


<!-- ///////////////////////////////////////////////////////////////////////////////////////////////////////////// -->
                                                    <!-- FORM -->


<!-- <pre> <?php //print_r($_POST)?></pre> -->

<!-- <pre> <?php //print_r(field)?></pre> -->
<pre> <?php// print_r($values)?></pre>
<!-- $values provient du save($op)de controller.php -->


<?php  if(isset($_GET['action'])&&$_GET['action']=='vehicule'|| isset($_GET['action'])&&$_GET['action']=='conducteur'):                       ?>

<form action="" method="post" class="col-md-6 offset-md-3 text-center">
    <?php foreach($fields as $value):?>
        <div class="form-group">
            <label for="<?=$value['Field']?>"><?=$value['Field']?></label>

            <input type="text" class="form-control" id="<?=$value['Field']?>"name="<?=$value['Field']?>"placeholder="Enter <?=$value['Field']?>">
        </div>
    <?php endforeach;?>
    <button type="submit" class="col-md-2 btn btn-dark mb-2">GO</button>


</form>

<?php   endif;                       ?>


