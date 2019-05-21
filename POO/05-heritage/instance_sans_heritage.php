<?php
class A
    {
        public function direBonjour(){return"Bonjour";}
    }
class B //Sans heritage de la class A
    {
        public $objetA;//__construct s'execute automatiquement lorsque nous instancion B
        public function __construct(){$this->objetA= new A; // je crée un objet issu de la class A que je stock dans la propriete nommé $objetA
            echo"S'execute automatiquement et detail:";echo'<pre>';var_dump($this->objetA);echo'</pre>';}
        public function uneMethode(){return $this->objetA->direBonjour();}//dans mon objet B '$b' ($this), je peux appeler des methodes sur mon objetA '$objetA"
        //Habitullement nous mettons qu'un seule fleche, mais la, $objetA contient un objet, une autre fleche est donc possible

    }
$b = new B;
echo $b->uneMethode().'<hr>';
echo $b->objetA->direBonjour();

?>