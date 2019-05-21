<?php
require_once('init.php');
extract($_POST);
$tab =array();

if(!empty($prenom)&&!empty($nom)&&!empty($service)&&!empty($salaire)&&!empty($dateembauche))
{

$result = $bdd->query("INSERT INTO `employes`(`prenom`, `nom`, `sexe`, `service`, `date_embauche`, `salaire`) VALUES  ('$prenom','$nom','$sexe','$service','$dateembauche','$salaire')");
$tab['resultat']="<div class='col-md-6 offset-md-3 alert alert-success text-center'>L'employé <strong>$prenom $nom </strong> a bien été enregistré</div>";
}

else{
    $tab['resultat']="<div class='col-md-6 offset-md-3 alert alert-danger text-center'>merci de saisir toutes les informations </div>";
}





$select = $bdd->query("SELECT * FROM employes ");
$selectemployes = $select->fetchall(PDO::FETCH_ASSOC);

//-------DEclaration du tableau (requet retour AJAX




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




