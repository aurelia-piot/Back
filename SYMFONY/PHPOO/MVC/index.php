<?php
/*

EN MVC (Model view Controller)
www.maboutique.php/index.php?controller=produits&action=boutique
$a =new produitsController;
$a-> boutique

www.maboutique.php/index.php?controller=produits&action=affichage&id=165
$a = new produitsController;
$a-> affichage(165);

www.maboutique.php/index.php?controller=user&action=inscription

$a = new userController;
$a-> inscription();

        réécirture d'URL:
www.maboutique.com/produits/affichage/165
$a = new produitsController;
$a-> affichage(165);

        Routing
www.maboutique.com/product/show/165
$a = new produitsController;
$a-> affichage(165);

*/
require('produitsController.php');
//localhost/SYMFONY/PHPOO/MVC/index.php
$a =new produitsController;
$a-> boutique();






