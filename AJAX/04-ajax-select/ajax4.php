<?php
require_once('init.php');
extract($_POST);
$tab =array();



//-------------------requet de selection


$select = $bdd->query("SELECT * FROM employes WHERE prenom = '$prenom'");


//-------DEclaration du tableau (requet retour AJAX





//echo '<pre>' ; print_r($selectemployes); echo'</pre>';






$tab["table"]= "<table class='table table-bordered table-dark'>";
$tab["table"].="<tr>";

for($i = 0 ; $i < $select->columnCount();$i++)
{
    $colonne = $select->getColumnMeta($i);
$tab["table"].=  "<th>$colonne[name]</th>"; // ici on recupere les entetes du tableaux
}


$tab["table"].=" </tr><tr>";
$employes = $select->fetch(PDO::FETCH_ASSOC);
foreach($employes as $value)
{$tab["table"].="<td>$value</td>";}
$tab["table"].="</tr></table>";



echo json_encode($tab);
?>