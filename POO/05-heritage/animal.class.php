<?php
class Animal
{
    protected function deplacement(){return"Je me deplace";}
    public function manger(){return"Je mange chaque jour";}
}
//-----------------------------------------------
class Elephant extends Animal
{
    public function quiSuisJe(){return"Je suis un elephant et ".$this->deplacement().'<hr>';}
}
///----------------------------------------------


class Chat extends Animal
{
    public function quiSuisJe(){return'Je suis un Chat';}
    public function manger(){return"Je mange beaucoup trop chaque jour";}

}



$elephant=new Elephant;
echo'<pre>';print_r(get_class_methods($elephant));echo'</pre>';
echo $elephant->quiSuisJe();

//Creer un objet issu de la class 'Chat' et afficher la resultat des 2 methodes declarees a l'interieur
$chat=new Chat;
echo'<pre>';print_r(get_class_methods($chat));echo'</pre>';
echo $chat->quiSuisJe().' et '.$chat->manger().'<hr>';// affiche "Je mange beaucoup trop chaque jour" et non pas "Je mange chaque jour" car la methode aété redefinie dans la class 'chat'
//L'interpreteur cherche d'abord dans la class 'chat' et seulement si la methode n'avait pas ete trouver , il aurait chercher dans la class dont j'herite

//il n'est pas possible d'heriter de plusieurs classe en meme temp --> class Chat extends Animal, Elephant --> /!\ erreur !!



?>