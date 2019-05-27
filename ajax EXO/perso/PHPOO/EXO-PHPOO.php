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
        public function setPrenom($prenom){
            if(iconv_strlen($prenom)>3  && iconv_strlen($prenom)<30)
            {$this->prenom= $prenom;}
            else
            {$this->error ="Ce n'est pas un un prenom valable, il doit faire entre 3 et 30 caracteres!!";return $this->error;}}
        public function getPrenom(){return $this->prenom;}  

    private $nom;
        public function setNom($nom){
            if(iconv_strlen($nom)>3  && iconv_strlen($nom)<30){$this->nom= $nom;}
            elseif(!is_string($nom)){$this->error ="$nom n'est pas un nom valable!! ";return $this->error;}
            else{$this->error ="Ce n'est pas un string!!";return $this->error;}}
        public function getNom(){return $this->nom;}  

    private $email;
        public function setEmail($email){
            if(!filter_var($email, FILTER_VALIDATE_EMAIL)){$this->error ="Ce n'est pas un email valable!";return $this->error;}
            else{$this->email= $email;}}
        public function getEmail(){return $this->email;}  

    private $telephone;
        public function setTelephone($telephone){
            
            if(!preg_match('#^[0-9]{10}+$#',$telephone)){$this->error ='<p>Saississer un numero de telephone valide!</p>';return $this->error;}
            else{$this->telephone= $telephone;return $this;}}
        public function getTelephone(){return $this->telephone;}  

    public function getInfo()
        {
            $info['prenom']=$this->getPrenom();
            $info['nom']=$this->getNom();
            $info['email']=$this->getEmail();
            $info['telephone']=$this->getTelephone();
            return $info;
        }

 }      
        

        
?>