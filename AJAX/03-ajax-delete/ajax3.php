<?php
require_once('init.php');
extract($_POST);
$tab =array();



// ---REquete de suppression
//requete test
//$result =$bdd ->exec("DELETE FROM employes WHERE id_employes = 990");
//echo $result;


$result =$bdd ->exec("DELETE FROM employes WHERE id_employes = '$id'");

// ----------- DECLARATION DU SELECTEUR A JOUR

//

$select =$bdd ->query (" SELECT * FROM employes ");
$tab['resultat'] ="<div class='form-group'>";
$tab['resultat'] .="<select class='form-control form-control-lg' id='personne' name='personne'>";
       while($employes = $select -> fetch(PDO::FETCH_ASSOC)){
            $tab['resultat'] .= "<option value='$employes[id_employes]' >$employes[prenom]</option>";
      }  

$tab['resultat'] .= "</select> ";
$tab['resultat'] .= "</div> ";



$tab['reponse']="<div class='col-md-6 offset-md-3 alert alert-success text-center'>L'employé n° <strong>$id</strong> a bien été viré</div>";
//on cree un nouvel indice dans le tableau ARRAY pour stocker un message de validation







echo json_encode($tab);
?>