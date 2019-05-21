<?php
require_once('init.php');
extract($_POST);
$tab =array();









//-------------------requet de selection


if($services == "choose"){

$selecty = $bdd->query("SELECT * FROM employes");

}
else{  

$selecty = $bdd->query("SELECT * FROM employes WHERE service = '$services'");


}  



$selectservice = $selecty->fetchall(PDO::FETCH_ASSOC);





$tab["table"]= "<table class='table table-bordered table-dark'>";
$tab["table"].="<tr>";

  foreach($selectservice[0] as $key =>$value){
 $tab["table"].="   <th>$key</th>";

}

 $tab["table"].=   "</tr>";

foreach($selectservice as $key => $tb){$tab["table"].= "<tr>";
      
foreach($tb as $key2 => $value ){  $tab["table"].="<td>$value</td>";}
$tab["table"].=" </tr> ";
}

 $tab["table"].= "</table>";














//$select = $bdd->query("SELECT * FROM employes WHERE service = '$services'");


// //-------DEclaration du tableau (requet retour AJAX

// $tab["table"]= "<table class='table table-bordered table-dark'>";
// $tab["table"].="<tr>";

// for($i = 0 ; $i < $select->columnCount();$i++)
// {
//     $colonne = $select->getColumnMeta($i);
// $tab["table"].=  "<th>$colonne[name]</th>"; // ici on recupere les entetes du tableaux
// }


// $tab["table"].=" </tr><tr>";
// $service = $select->fetch(PDO::FETCH_ASSOC);
// foreach($service as $value)
// {$tab["table"].="<td>$value</td>";}
// $tab["table"].="</tr></table>";



echo json_encode($tab);
?>





