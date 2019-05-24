<?php

//echo"<pre>";print_r($donnees);echo"</pre>";
//$donnees correspond a l'indice 'donnees' declare dans la methode render() du controller
//echo"<pre>";print_r($fields);echo"</pre>";
?>

<div> <a href="?op=add" class="btn btn-large btn-info mb-2"><i class="fas fa-plus"></i> Ajouter une nouvelle donnée </a> </div>





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
<td><a href="?op=select&id=<?=$value[$id]?>" class="text-dark"><i class="fas fa-eye"></i></a></td>
<td><a href="?op=update&id=<?=$value[$id]?>" class="text-dark"><i class="fas fa-edit"></i></a></td>
<td><a href="?op=delete&id=<?=$value[$id]?>" class="text-danger" onclick="return(confirm('En êtes vous certain?'))"><i class="fas fa-trash-alt"></i></a></td>
</tr>
<?php endforeach;?>
</tbody>
</table>