<?php

class Autoload
{
public static function chargement(){
    require('Controller/'.$class.'.php');
    //require('Controller/User.php');
    }



}//fin class autoload
//-----------------------
spl_autoload_register(array('Autoload','chargement'));
//s'execute à chaque fois que le mot 'new' apparaît.
// Il va apporter en argument de notre fonction ce qui suit apres le "new"

/*

$a = new Autoload;
$a -> chargement();
Autoload::chargement('User');
new User;
require('User.php')




*/









