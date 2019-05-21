<?php
class Electricien
    {
        public function getSpecialiste(){return"Pose de cable ou armoires electrique ...<hr>";}
        public function getHoraires(){return"10H/ 18H <hr>";}
    }
//-----------------------------
class Plombier
    {
        public function getSpecialiste(){return"tuyau, robinets, chauffe-eau, compteur...<hr>";}
        public function getHoraires(){return"8H/ 19H <hr>";}
    }
//------------------
class Entreprise
{
    public $numero = 0;       
    public function appeUnEmploye($employe){
    $this->numero++;// plombier   
//  $entreprise-> monEmploye1 = new Plombier
    $this->{"monEmploye". $this->numero}= new $employe; // A chaque fois que l'on execute la methode appeUnEmploye(), cela genere dans le meme temps une propriete dans laquelle est stocké une instance d'une classe
    return $this->{"monEmploye". $this->numero};}
}
//-------------------------------------------------

$entreprise = new Entreprise;
$entreprise->appeUnEmploye('Plombier');
// Afficher les methodes de la class 'Plombier' via l'objet issu de la class entreprise '$entreprise'

//echo'<pre>';print_r(get_class_methods($entreprise));echo'</pre>';
echo $entreprise->monEmploye1->getSpecialiste();
echo $entreprise->monEmploye1->getHoraires();
//lorsque la variable est publique , pas la peine de mettre un $ (ici a monEmploye1)

$entreprise->appeUnEmploye('Electricien');
echo $entreprise->monEmploye2->getSpecialiste();
echo $entreprise->monEmploye2->getHoraires();
?>    