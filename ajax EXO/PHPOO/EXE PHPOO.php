<!-- Exercice 1 : PHPOO

    - Créer une classe Etudiant

    - Créer les propriétés   private

        - prenom (string de 5 à 30 caracteres)

        - nom (string de 5 à 30)

        - email(email)

        - telephone (INT de 10 caracteres)

        

        - Créer une fonction getInfos() qui retourne un array avec toutes les infos

        - Instancier 3 fois la classe dans un autre fichier. Pour chaque etudiant affecter des valeurs et les afficher.  -->

<?php
        
  class Etudiant
  {
    private $error;
    private $prenom;
        public function setPrenom($prenom){if(strlen($prenom)>3  && strlen($prenom)<30){$this->prenom= $prenom;}else{$this->error ="Ce n'est pas un un prenom valable!!";return $this->error;}}
        public function getPrenom(){return $this->prenom;}  
    private $nom;
        public function setnom($nom){if(strlen($nom)>3  && strlen($nom)<30){$this->nom= $nom;}elseif(!is_string($nom)){$this->error ="$nom n'est pas un nom valable!! ";return $this->error;}else{$this->error ="Ce n'est pas un string!!";return $this->error;}}
        public function getnom(){return $this->nom;}  
    private $email;
        public function setemail($email){if(is_string($email)){$this->email= $email;}else{$this->error ="Ce n'est pas un email valable!!";return $this->error;}}
        public function getemail(){return $this->email;}  
    private $telephone;
        public function settelephone($telephone){$this->telephone= $telephone;}
        public function gettelephone(){return $this->telephone;}  

    public function getInfos()
        {
            array();
        }

 }      
        
$etudiant= new Etudiant;       
echo"<pre>";var_dump($etudiant);echo"</pre>"; 
$etudiant->setPrenom("Peter"); // $homme->setPrenom($_POST['prenom']);// si il ya un formulaire , on y recupere le champ prenom
echo $etudiant->getPrenom().'<hr>'; // getPrenom pour retourner le prenom

$etudiant->setNom("Piot"); 
echo"votre nom : ". $etudiant->getNom().'<hr>';
        
        
 $etudiant->setemail("PeterAurelius@hotmail.fr"); 
echo"votre email: ". $etudiant->getemail().'<hr>';       
        
$etudiant->settelephone("0123456789"); 
echo"votre telephone: ". $etudiant->gettelephone().'<hr>';       
 
        echo"<pre>";var_dump($etudiant);echo"</pre>"; 
        
?>