<?php
require_once('init.php');
extract($_POST);
$tab =array();
// resquete test : $result = $bdd->query("INSERT INTO employes (prenom) VALUES ('$Peter')");

if(!empty($personne))
{
$result = $bdd->query("INSERT INTO employes (prenom) VALUES ('$personne')");
$tab['resultat']="<div class='col-md-6 offset-md-3 alert alert-success text-center'>L'employé <strong>$personne</strong> a bien été enregistré</div>";
}
else{
    $tab['resultat']="<div class='col-md-6 offset-md-3 alert alert-danger text-center'>merci de saisir un prenom</div>";
}

//pour pouvoir faire vehiculer des données en HTTP via une requete AJAX, nous devons encoder les données en JSON, c'est un format leger, C'est la reponse de la requete 'retour' AJAX que l'on retrouve dans function(data) dans le fichier ajax2.js
echo json_encode($tab);


?>