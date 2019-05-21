<?php
// PAr convention la premiere lettre de la class doit etre en majuscule 
class Panier
{
    
    public $nbProduits ; 
    // public = niveau de visibilité
    //elle apartien a l'objete et non a la classe

    public function ajouterArticle()
    {
        return "l'article a été ajouté !";
    }
     protected function retirerArticle()
     {
         return "L'article a été retiré!";
     }

     private function affichageArticle()
     {
         return "Voici les articles!";
     }

     
}

$panier1 = new Panier;

echo'<pre>';var_dump($panier1);echo'</pre>'; // on observe un objet issu de la calsse 'Panier" a l'identifiant '#1' (referece de l'objet),il peut y avoir plusieurs objets conserver en RAM, ils auront tous un identifiant différents
echo'<pre>';var_dump(get_class_methods($panier1));echo'</pre>';//permet d'observer uniquement les methodes (fonctions) publiques issu de la classe

//Exo: affecter la valeur de "5" a la propriete public $nbproduit
$panier1->nbProduits = 5; //ici on affect une valeur a la propriete public 'nbProduits'
//comme c'est une propriete publique de la class on l'appele sans le dollard "$"
echo'<pre>';var_dump($panier1);echo'</pre>';

echo"Nombre de produit dans le panier: ".$panier1->nbProduits." <hr>";
echo " Panier 1 >".$panier1->ajouterArticle().'<hr>'; // on pioche une methode de la class a travers l'objet, toujours les parenthese car on fait appel à une methode (fonction) / methode public OK
// echo " Panier 1 >".$panier1->retirerArticle().'<hr>'; // /!\ erreu !! methode protected !! l'element est accessible uniquement dans la class ou cela a ete declarer (class mere) ainsi que de les classes heritieres

//echo " Panier 1 >".$panier1->affichageArticle().'<hr>'; // /!\ erreu !! methode private !!  l'element est accessible uniquement dans la calss ou cela a ete declarée

// les niveaux de visibilites permettent de proteger des données, par exemple les données saisie d'un formulaire ne pourront pas etre attribués a n'importe quelle propriété declarée, elles passeront par des methodes qui permettront de controler ce données

$panier2 = new Panier;
// ici on crée un nouvel exemplaire / objet issu de la class 'Panier' 
echo'<pre>';var_dump($panier2);echo'</pre>';//on peut observer un objet issu de la classe 'Panier' a l'identifiant'#2'
//Exo: affecter 3 produits a la propriete $nbproduit et afficher le nombre de produit dans le panier
$panier2->nbProduits = 3;//ici on affect une valeur a la propriete public 'nbProduits'
echo"Nombre de produit dans le panier: ".$panier2->nbProduits." <hr>";//affichage

/*
niveau de visibilité
    -public :   accessible de partout
    -protected: accessible dans la calss Mere et heritieres
    -private :  accessible uniquement dans la classe Mere

'new' est un mot clef permettant d'effectuer une instanciation (creer un objet) 
une classe peut produir plusieurs objets
$panier1 represnete l'objet issu de la classe 'Panier'
la class est le plan de construction/$panier1 represente un exemplaire de la classe




*/


?>