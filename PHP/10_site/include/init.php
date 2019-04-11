<?php


//connexion BDD


$bdd = new PDO('mysql:host=localhost;dbname=site','root','',array(PDO::ATTR_ERRMODE => PDO :: ERRMODE_WARNING, PDO::MYSQL_ATTR_INIT_COMMAND =>'SET NAMES utf8'));

//--SESSION

session_start();



//-CHEMIN

define("RACINE_SITE",$_SERVER['DOCUMENT_ROOT'].'/PHP/10_site/');

//$_SERVER['DOCUMENT_ROOT'] -- > C:/xampp/htdocs
//lors de l'enregistrement d'image / photos, nous aurons besoins du chemin physique complet pour enregistrer la photo dans le bon dossier

//echo RACINE_SITE;


define("URL",'http://localhost/Back/PHP/10_site/');
//echo URL;
//cette constante servira entre autre a enregistrer l'URL d'une photo/image dans la bdd, on ne conserve jamais la photo en elle meme; ce serait trop lourd pour la BDD

//--VARIABLES


$error = '';        //message d'erreur
$validate='';       //message de validation
$content='';        //permettra de placer du contenu où l'on souhaite



//--FAILLES XSS
foreach($_POST as $key => $value)
{
    $_POST[$key] = strip_tags(trim($value));
}

foreach($_GET as $key => $value)
{
    $_GET[$key] = strip_tags(trim($value));
}
//strip_tags() -->supprime les balises HTML
//trim() -> supprime les espaces en debut et fin de chaine

//------------INCLUSIONS
//on inclu directement le fichier fonction.php dans init, cela evitera de l'appeler sur chaque page
require_once("fonction.php");


?>