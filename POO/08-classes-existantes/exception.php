<?php

function recherche($tab, $elem)
{
    if(!is_array($tab))throw new Exception ('Vous devez envoyer un ARRAY!!');
    if(sizeof($tab)<=0)throw new Exception ('Vous devez envoyer un ARRAY avec un contenu!!');

    $position = array_search($elem, $tab);
    return $position;
}
//--------------------------------------------------------------------

$liste1 = array();

$liste2 = array('Mario','Yoshi','Toad','Bowser');

try{ // block d'essai , on va essayer d'executer les instruction suivantes dans le try
    echo "position de 'Mario' dans le tableau ARRAY : <strong>".recherche($liste2,'Mario')."</strong><hr>";
    echo "position de 'Toad' dans le tableau ARRAY : <strong>".recherche($liste2,'Toad')."</strong><hr>";
    echo "position de 'Bowser' dans le tableau ARRAY : <strong>".recherche($liste1,'Bowser')."</strong><hr>";
    echo "traitements...";// ne s'affiche pas , il n'y a pas de raison de continer des traitement si l'un d'entre eux dysfonctionne, car le prochain traitement peuvent etres dependant de celui qui dysfonctionne
}
catch(Exception $e){ // block de capture, on tombe dans le bloc 'catch" si un traitement a dysfonctionner dans le bloc 'try, cela permet d'attraper les exception et de personnaliser le message d'erreur
    //$e est un objet issu de la class 'Exception, il contient ses propres methodes tel que getMessage()qui permet d'afficher le message d'erreur mais aussi getFile() qui permet d'afficher le dossier dans lequle a ete commis l'erreur
    echo'<pre>';print_r($e);echo'</pre>';
    echo'<pre>';print_r(get_class_methods($e));echo'</pre>';


    //exo : affciher une phrase comportant le message d'erreur , le fichier dans lesquel est l'erreur et la ligne de l'erreur
}

echo "le message d'erreur <strong>".$e->getMessage()."</strong> qui se trouve dans le fichier <strong>".$e->getFile()." </strong> à la ligne  <strong>".$e->getLine() ."</strong>" ;

//il est impossible de mettre plusieurs block try catch a la suite, try catch fonctionne ensemble

echo'<hr></hr>';
//---connexion a la Bdd

try
{
    $bdd = new PDO('mysql:host=localhost;dbname=test2','root','');
    echo "connexion reussie!!";
}
catch(PDOException $e)
{  
    echo'<pre>';print_r($e);echo'</pre>';
    echo'<pre>';print_r(get_class_methods($e));echo'</pre>';

    //lorsque le traitement dysfonctionne dans le try, on tombe dans le catch et la class PDOException est instancie / $e represente un objet issu de la class PDOException , cet objet contient de methodes avec le detail de l'erreur (messages, ligne, fixhier, code_erreur) 


    echo "<strong>ERREUR :".$e->getMessage()."</strong> dans le fichier <strong>".$e->getFile()." </strong> à la ligne  <strong>".$e->getLine() ."</strong><hr>" ;
      //personnalisation du message d'erreur

}













?>