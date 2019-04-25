<?php


//connexion BDD
extract($_GET);

$bdd = new PDO('mysql:host=localhost;dbname=phoenix','root','',array(PDO::ATTR_ERRMODE => PDO :: ERRMODE_WARNING, PDO::MYSQL_ATTR_INIT_COMMAND =>'SET NAMES utf8'));
//$bdd->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

//$insert= $bdd->prepare("INSERT INTO annuaire (nom ,prenom,telephone,profession ,ville,codepostal, adresse, date_de_naissance ,genre, description ) VALUES ($nom ,$prenom,$telephone,$profession,$ville,$codepostal, $adresse, $datedenaissance ,$genre, $description);");


$resultat= $bdd->query("SELECT * FROM voyage ");

    $resultat->execute();
// $id= $bdd -> query("SELECT * FROM voyage WHERE id_voyage = :id_voyage");
// $id_voyage=$id->bindvalue(":id_voyage",$_GET["reservation"])
//   $id_voyage->execute();
   
// if(isset($_POST["valider"])){
//     $insert->execute();
// }
?>