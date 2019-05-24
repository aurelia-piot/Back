<?php

session_start();
if(isset($_GET['action'])&&$_GET['action']=='vider')
{
    unset($_SESSION['panier']);
}



if(isset($_GET['action'])&&$_GET['action']=='create' || isset($_SESSION['panier']))
{
    $_SESSION['panier']=array(26,27,28);
    echo"Produit present dans le panier :".implode($_SESSION['panier'],'-').'<hr>';
    echo'<a href="?action=vider">Vider le panier</a>';
}
else{echo'<a href="?action=create">Créer le panier</a>'; }

/*
Jusqu'a present nous avons eu parfois du mal a organiser le code, ce n'est pas toujours evident de melanger HTML & PHP

ARCHITECTUR MVC
1. Model (echange avec la bdd)
2. View (affichage des données - HTML / CSS)
3. Controller(Traitement PHP)

Le but d'une Architecture MVC est de separer les couches, c'est a dire de separer les langage au maximum

AVANTAGES   
    -clarté de l'architecture(organisation)
        Si le design doit changer, on peut demander a l'integrateur de proceder aux mis a jour, il ne risquera pas de decapiter une accolade dans le code
    -Favorise le travail d'equipe et les mise à jour

INCONVENIENTS
    -Nombre de fichiers (trop complex pour de petites applications)








    C'es ainsi que fonctionne les CMS (drupal, wordpress ect....)

*/









?>