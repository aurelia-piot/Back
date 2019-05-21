<?php

class singleton
{
    public $numero =20;
    private static $instance = null;
    private function __construct(){}// la class n'est pas instanciable car le constructeur est privé
    private function __clone(){}// l'objet ne sera alors pas clonable
    public function getInstance()
        {
            if(is_null(self::$instance))//si $instance est null, la 1er fois c'est null, toute les autres fois je ne rentre pas ici car il a un objet dans $instance
            {self::$instance=new Singleton;}//on stock l'objet de la class singleton
            return self::$instance;//dans tout les cas je retourne un objet $instance
        }    

}
// un pattern Singleton permet de trouver une solution simple a un probleme recurrant
//$s=new Singleton;// --- /!\ erreur il n'est pas possible  d'instancier la class puisque le constucteur est privé

$objet1 = Singleton::getInstance();
echo'<pre>';var_dump($objet1);echo'</pre>';//objet1 est a la reference #1



$objet2 = Singleton::getInstance();
echo'<pre>';var_dump($objet2);echo'</pre>';//objet2 est a la reference #1, il s'agit bien du meme objet

echo $objet1->numero.'<hr>';
echo $objet2->numero.'<hr>';
$objet2->numero=22;     // lorsque l'on change la valeur de la propriete 'numero' cela impacte sur les 2 variables $objet1 et $objet2, c'est normal puisque que c'est le meme objet
echo $objet1->numero.'<hr>';
echo $objet2->numero.'<hr>';

?>