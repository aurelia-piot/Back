<?php

namespace General;
require_once('namespace_commerce.php');

USE Commerce1,Commerce2,Commerce3; // permet de preciser quel namespace je souhaite omporter du fichier namespace_commerce.php

echo __NAMESPACE__.'<hr>';//constante MAgique qui permet d'afficher dans quel namespace on ce trouve



$std= new \StdClass();// l'anti slash \ permet de revenir dans l'espace general
// l'interpreteur va chercher si la methode stdClass() est declarée dans le namespace 'General', donc pour revenir dans l'espace global de php le temp de ligne, nous devons mettre un antislash devant la class

echo'<pre>';var_dump($std);echo'</pre>';

$commande = new Commerce1\Commande;
echo"<hr>Nombre de commande :".$commande->nbCommande.'<hr>'; 
var_dump($commande);
echo'<hr>';

//Exo creer un objet de toute les classes declarées et faire les affichage des proprietes
$produit = new Commerce2\Produit;
echo"<hr>Nombre de Produit :".$produit->nbProduit.'<hr>'; 

$panier = new Commerce3\Panier;
echo"<hr>Nombre de commande :".$panier->nbProduit.'<hr>'; 

$produit = new Commerce3\Produit;
echo"<hr>Nombre de produit :".$produit->nbProduit.'<hr>'; 



?>