<?php
class Etudiant
{
    private $prenom; //peter
    public function __construct($arg) // Peter || arg est une variable de reception
    {
        echo "instanciation, nous avons reçus l'information suivant: $arg <br>"; // arg = Peter
        return $this->setPrenom($arg);//Peter
    }



    //Exo realiser le getteur et le setteur pour la propriete $prenom

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
        


}
//---------------------------------------------------------------------------
$etudiant= new Etudiant('Peter');//= $arg
// $bdd = new PDO('coordonnées BDD');

echo'<pre>';var_dump($etudiant);echo'</pre>';
echo "Votre prénom est " . $etudiant->getPrenom().'<hr>';
 echo $etudiant->setPrenom(28);// on tombe dans le else = affichage du message d'erreur definit
$etudiant->__construct('Djamila');//le constructeur peut tout de meme etre appelé comme une methode classique

/*

__construct() est une methode magique qui s'execute automatiquement lorsque l'on instancie la classe. elle sera l'equivalent du init.php avec session_start(), connexion BDD, autoloaud etc..


- new Etudiant('Peter')-> a l'instancaition de la classe, Peter va automatiquement se stocker en argument de la methode magique __construct()


setteur : permet de controler les données
getteur: permet de voir/ exploiter les données finales
prviate $prenom: la propriete est privé afin que l'on ne puisse pas la remplir de l'exterieur  de la classe sans avoir fait de controles au prealable, c'est à dire sans etre passé par le getteur / setteur

Si nous avons un formulaire avec 10 champ ---->  nous auron 10 setteur et 10 getteur;




*/






?>