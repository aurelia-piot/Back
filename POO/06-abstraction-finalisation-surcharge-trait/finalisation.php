<?php

final class Application
{
    public function LancementApplication(){return"L'appli se lance comme cela!!<hr>";}
}
//------------------------------------------------------

//Final permet de verouiller une class ou une methode, c'est une methodologie de tavail 
$app = new Application; // une class final est bien instanciable
echo'<pre>';var_dump($app);echo'</pre>';
echo $app->LancementApplication();


//class Test extends Application{}---- ERREUR !! il n'est pas possible d'heriter d'une class finale


class Application2
{
    final public function lancementApplication(){return"L'application se lance ainsi!!<hr>";}
}

//------------------------------------------------------

class Extension extends Application2
{
// public function lancementApplication(){} ERREUR en cas d'heritage, il n'est pas possible de redeclarer une method 'final', Elle est verouille, on ne peux la sucharger/ameliorer
}
$ext = new Extension;
echo $ext->lancementApplication();

// L'interetde mettre le mot clef 'final' sr un methode est de verouiller afin d'empecher toute sous class de la redefinir (quand nous voulons que le comportement d'une methode soit preserver durant l'heritage)



?>