<?php
//echo'<pre>';print_r($donnees);echo'</pre>';

?>


 

<table class="table table-bordered text-center">
<thead>
    <tr>
     <!-- on créer manuelement le champ que nous avons supprimmer au moment de la requete Sql dans EntityRepository -->
        <?php foreach($donnees as $tab => $value): ?>
            <th><?=$tab?></th>
        <?php endforeach;?>

    </tr>
</thead>
<tbody>


<?php foreach($donnees as $value): ?>

    <td><?=$value?></td> 

<?php endforeach;?>
</tbody>
</table>


<ul class="col-md-4 offset-md-4 list-group text-center mb-4">
   <?php foreach($donnees as $tab => $value): ?>
           <li class="list-group-item"><?=$tab?> __ <?=$value?> </li>
        <?php endforeach;?>

</ul>














