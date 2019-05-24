<?php
//Habituelelement pour faire appel a des fichiers nous executons require_once() mais imaginons que nous avons 100 classes declaree dans 100 fichier , ne n'allons pas faire 100 require_once
require_once('autoload.php');
//Exo instancier les 4 classes afin d'observer si l'autoload fonctionne correctement


$a =new A;
$b  =new B;
$c =new C;
$d =new D;










?>