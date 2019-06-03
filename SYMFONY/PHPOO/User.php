<?php

//User.php

class User{
    private $pseudo;
    // public $prenom;
    private $prenom;

    private $email;
    protected $password;
    private $date_naissance;

//ect...
    public function getPrenom(){
        return $this->prenom;   
    }

    public function setPrenom($prenom){
//verification des donnée
if(!empty($_POST['prenom'])){
    if(strlen($_POST['prenom'])>=3 && strlen($_POST['prenom'])<=20){
        
        $user->prenom =$_POST['prenom'];//pour recupere la valeur prenom d'un formulaire
  }
 }
}

}//fin class User

class Admin extends User
{
        public function setPassword($password)
}//fin class Admin

$user = new User;

// enrengistrement du prénom

//$user->prenom ='Peter'; // propriete public manipulable en dehors de la class


echo 'Prenom: '.$user->prenom;




