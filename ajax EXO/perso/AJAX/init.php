<?php

$bdd = new PDO('mysql:host=localhost;dbname=site','root','',array(PDO::ATTR_ERRMODE => PDO :: ERRMODE_WARNING, PDO::MYSQL_ATTR_INIT_COMMAND =>'SET NAMES utf8'));
// toujour mettre la conexion sur un fichier a part
?>