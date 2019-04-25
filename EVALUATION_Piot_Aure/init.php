<?php
extract($_POST);
$bdd = new PDO('mysql:host=localhost;dbname=immobilier','root','',array(PDO::ATTR_ERRMODE => PDO :: ERRMODE_WARNING, PDO::MYSQL_ATTR_INIT_COMMAND =>'SET NAMES utf8'));
// ---------------------------------------------
define("RACINE_SITE",$_SERVER['DOCUMENT_ROOT'].'/Back/EVALUATION_Piot_Aure/');

//$_SERVER['DOCUMENT_ROOT'] -- > C:/xampp/htdocs
//lors de l'enregistrement d'image / photos, nous aurons besoins du chemin physique complet pour enregistrer la photo dans le bon dossier

// -------------------------------------------------

define("URL",'http://localhost/Back/EVALUATION_Piot_Aure/');
//cette constante servira entre autre a enregistrer l'URL d'une photo/image dans la bdd, on ne conserve jamais la photo en elle meme; ce serait trop lourd pour la BDD

//-----------------------------------------------------

//--FAILLES XSS
foreach($_POST as $key => $value)
{
    $_POST[$key] = strip_tags(trim($value));
}

foreach($_GET as $key => $value)
{
    $_GET[$key] = strip_tags(trim($value));

}
//------------------------------------------------------------------------------------
?>