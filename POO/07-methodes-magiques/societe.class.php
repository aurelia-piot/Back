<?php
class Societe
{

    public $adresse;
    public $ville;
    public $cp;

    public function __set($nom, $valeur){echo"la propriete <strong>$nom</strong> n'a pas ete declarée, la valeur <strong>$valeur</strong> n'a donc pas ete affectée !! <hr>";}

    //__set() est une methode magique qui ce declenche uniquement en cas de tentative d'effectation sur une propriete qui n'existe pas

    public function __get($nom){echo"la propriete <strong>$nom</strong> n'a pas ete declarée,on ne peut donc pas l'afficher <hr>";}
    // __get() est une methode magique qui se declenche dans le cas ou l'on tente d'afficher une propriete qui n'a pas ete declarée

    public function __call($nom, $argument){echo'<pre>';print_r($argument);echo'</pre>';echo"la methode <strong>$nom</strong> n'a pas ete declarée,les argument etaient <strong> ".implode("-", $argument)."</strong>!! <hr>";}
    // __call() est une methode magique qui s'execute automatiquement  en cas de tentative d'execution d'une metho qui n'a pas ete declarée
    //echo'<pre>';print_r($argument);echo'</pre>'; ==== $argument : tableau ARRAY qui receptionne les argument de la methode executée

}

$societe = new Societe;
$societe->villes="Paris";//tentative d'affectation d'une propriete qui n'a pas ete declarée

echo $societe->titre; // tentative d'affichage d'une propriete qui n'a pas ete declarée

echo $societe->ezsgfsgsegfsef(1,'test',true);// tentative d'execution d'une methode qui n'existe pas

echo'<pre>';print_r($societe);echo'</pre>';


/*

    Il y a trop d'erreur "sale" en PHP, les methodes magique permettent d'afficher des erreurs 'propres' en français


*/





?>