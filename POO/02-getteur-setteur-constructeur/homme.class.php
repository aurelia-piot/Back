<?php

class Homme
{
    private $error;
    private $prenom;        // Peter
    private $nom;
    public function setPrenom($prenom)
        {
            if(is_string($prenom))
            {
                $this->prenom= $prenom;
            }
            else // nous tombons dans le else dans le cas ou ce n'est pas du text
            {
                $this->error ="Ce n'est pas un string!!";
                return $this->error;

            }
        }

    public function getPrenom()
        {
            return $this->prenom;
        }  
        

        //---------------------------

        public function setNom($nom)
        {
            if(strlen($nom)>2  && strlen($nom)<20)
            {
                $this->nom= $nom;
            }

             elseif(!is_string($nom))
            {
                $this->error ="$nom  n'est pas un string!! ";
                return $this->error;
            }

         // elseif(strlen($nom)<2 && strlen($nom)>20){ $this->error =" il doit faire entre 2 et 20 caractere"; return $this->error;}
        else{ $this->error ="  il doit faire entre 2 et 20 caractere"; return $this->error;}
        }
        
    public function getNom()//un getteur ne reçois jamais d'argument
        {
            return $this->nom;
        }  
        
}



$homme = new Homme;
echo'<pre>';var_dump($homme);echo'</pre>';
//$homme->prenom ='Peter';// /!\ il n'est pas possible d'acceder et d'affecter une valeur a une propriete 'private' , cela permet de ne pas entrer n'importe quoi dans les proprietes

$homme->setPrenom("Peter"); // setPrenom definit un prenom
// $homme->setPrenom($_POST['prenom']);// si il ya un formulaire , on y recupere le champ prenom
echo $homme->getPrenom().'<hr>'; // getPrenom pour retourner le prenom


echo $homme->setPrenom(28).'<hr>'; // un message d'erreur s'affiche : "Ce n'est pas un string!!", nous tombons dans le cas else du "setteur".

//un setter permet de controler les données, par exemple les données saisie d'un formulaire
//un getteur permet de voir les données finales , c'est a dire les données qui ont été controlées, par exempe, on peut se servire des methodes getteur pour enrengistrer des données dans une bdd

// Exo : REaliser le setteur et getteur pour la propriete '$nom' en controlant dans le setteur que le nom soit compris entre 2 et 20 caracteres

echo $homme->setNom("Aure");  // on set une donnée pour la controler, on l'envoi dans la methode 'setNom'
echo"votre nom : ". $homme->getNom().'<hr>'; //le getteur permet d'afficher la donnée finale controlée ; il ne reçois jamais d'argument

echo $homme->setNom(0);//ici on nous renvois l'erreur car la donnée entrer n'entre pas dans la condition if mais else! 












?>