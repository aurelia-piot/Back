<?php
require_once('init.php');
extract($_POST);
$tab =array();



$result =$bdd ->exec("DELETE FROM employes WHERE id_employes = $id");





// ----------- DECLARATION DU SELECTEUR A JOUR

$selecty =$bdd ->query (" SELECT * FROM employes ");

$tab['select'] ="<div class='form-group'>";
$tab['select'] .="<select class='form-control form-control-lg' id='personne' name='personne'>";
       while($employes = $selecty -> fetch(PDO::FETCH_ASSOC)){
            $tab['select'] .= "<option value='$employes[id_employes]' >$employes[prenom]</option>";
      }  

$tab['select'] .= "</select> ";

$tab['select'] .= "</div> ";




$tab['reponse']="<div class='col-md-6 offset-md-3 alert alert-success text-center'>L'employé n° <strong>$id</strong> a bien été viré</div>";

// reponse dans #resultat








//-------DEclaration du tableau (requet retour AJAX

$selecty = $bdd->query("SELECT * FROM employes ");
$selectemployes = $selecty->fetchall(PDO::FETCH_ASSOC);





$tab["table"]= "<table class='table table-bordered table-dark'>";
$tab["table"].="<tr>";

  foreach($selectemployes[0] as $key =>$value){
 $tab["table"].="   <th>$key</th>";

}

 $tab["table"].=   "</tr>";

foreach($selectemployes as $key => $tb){$tab["table"].= "<tr>";
      
foreach($tb as $key2 => $value ){  $tab["table"].="<td>$value</td>";}
$tab["table"].=" </tr> ";
}

 $tab["table"].= "</table>";

echo json_encode($tab);
?>




