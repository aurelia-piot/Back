<?php

//sylvain : Inscription
namespace Membre{ // le namespace doit toujours etre la premiere ligne de code declarer
use PDO; //ici le code comprend que l'on va utiliser pdo car il ce trouve dans l'espace general    
    class User
    {
        private $pdo;
        public function setPdo(){
            $pdo = new \Pdo();
        }

    }//fin class User
}//fin namespace Membre




//Aziz : Comentaire
namespace Commentaire{
    class User
    {

    }//fin class user
}//fin namespace Commentaire (en trop)





$user =new Membre\User;
$user = new Commentaire\User;

// UN NAMESPACE PAR FICHIER
// erreur multiple dans le fichier
