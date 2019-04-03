<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

    <title>entrainment PHP</title>
</head>
<body>
<div class="container">
        <h2 class="display-4 text-center">Ecriture et affichage</h2><hr>
        <!-- Nous pouvons ecrire du Html dans un fichier ayant l'extension PHP, l'inverse n'est pas possible -->

    <?php // ouverture de la balise PHP
         //Il est possible d'ouvrir  la balise PHP autant de fois que l'on le souhaite sur un fichier PHP

        echo "Bonjour"; //echo est une instruction d'affichage que l'on peut traduire par    --affiche moi--

        echo '<br>'; // nous pouvons egalement y mettre du Html

        print 'Bonjour'; // print est une autre instruction d'affichage, pas de difference avec echo






        echo '<hr> <h2 class="display-4 text-center">Commentaires</h2> <hr>';

    // fermeture de la balise PHP
    ?> 

<?= "allo" ?> <!--  le "=" remplace le 'echo' -->

<strong>Bonjour</strong>

<!-- nous voyons qu'il est egalement posssible de fermer et ré-ouvrir PHP pour melanger du code Html & Php -->

<?php

    echo '<br>Text <br>'; // ceci est un commentaire sur une seul ligne
    echo 'Text <br>'; # ceci est un commentaire sur une seul ligne
    echo 'Text <br>'; /*ceci est un commentaire sur 
                    plusieurs lignes*/


    echo '<hr> <h2 class="display-4 text-center">Variables : Types / Declaration / Affectation</h2> <hr>';
    //une variable est un espace nommé permettant de conserver une valeur

    //$2a -> erreur!!
    // $a2 -> OK
    //caractere autorisés : A à Z / a à z /0 à 9
    //pas d'accents, ni espaces
    $a = 127; // affectation de 127 dans la variable nommé "a"

    //echo gettype() est une fonction predefinie qui retourne le type de l'argument entré (en generale c'est une variable)
    echo gettype($a);
    // ici c'est un nombre entier donc : INTEGER
    echo'<br>';

    $b = 1.5;
    echo gettype($b); //un nombre a virgule : DOUBLE
    echo'<br>';     

    $c = "une chaine";
    echo gettype($c); //du texte : STRING
    echo'<br>';

    $d = '127';
    echo gettype($d); //par ce qu'il ce trouve entre quote, le nombre est considérer comme une chaine de charactere donc un STRING
    echo'<br>';

     $e = true;
    echo gettype($e); //true/ false = boolean 
    echo'<br>';


?>
<!-- ------------------------------------------------------------------------------------------------------------------------ -->
<?php
 echo '<hr> <h2 class="display-4 text-center">Concaténation</h2> <hr>';

 $x ="bonjour";
 $y ="Tout le monde!!";

 echo $x .' '. $y . '<br>'; 
 //point de concatenation que l'on peut traduire par suivi de ''

 echo "$x $y<br>"; 
 // entre double quote, les variables sont évaluées
 // entre simple quote les variable sont interpreter comme une chaine de character
 echo 'aujourd\'hui <br>'; // quand on utilise de simple de quote et que dans notre chaine de character se trouve une apostrophe; on y place un antislash avant pour dire que c'est bien une apostrophe

 echo"Hey ! ". $x . $y .'<br>';// concatenation text et variable
  echo"Hey ! ", $x , $y ,'<br>';// concatenation avec des virgules  (la virgule et le point sont similaires) 
echo"Hey !$x $y<br>";// concatenation text et variable



?>
<!-- ------------------------------------------------------------------------------------------------------------------------ -->
<?php
 echo '<hr> <h2 class="display-4 text-center">Concaténation lors de l\'affectation</h2> <hr>';

 $prenom1= "bruno";
 $prenom1="claire";
 echo $prenom1 . '<br>'; // cela remplace "Bruno" par "claire", donc affiche "calire"


 $prenom2= "Nicolas";
 $prenom2 .=" Maries";
 echo $prenom2 .'<br>'; //ajoute SANS remplacer la valeur précédente grace  à l'operateur . =, affiche "Nicolas Marie"


?>
<!-- ------------------------------------------------------------------------------------------------------------------------ -->
<?php
 echo '<hr> <h2 class="display-4 text-center">Constante et constante Magique</h2> <hr>';
 //une constante tout comme une variable premet de conserver une valeur mais comme son nom l'indique , la valeur est... constantes !! On ne pourra pas changer sa  valeur durant l'execution du script

 define("CAPITALE" , "Paris"); // par convention, une constante se declare toujours en majuscule.
 // define("Nom_de_la_constante","valeur_de_la_constante")
 echo CAPITALE . '<br>';
 //define("CAPITALE" , "rome"); /!\ erreur ! il n'est pas possible de redeclarer une constante deja définit
 
 //constante magique

 echo __FILE__.'<br>'; // donne dans quel fichier on ce trouve
 echo __LINE__.'<br>'; // donne le numéro de la ligne où le code a ete executer
 //__FUNCTION__/__CLASS__/__METHOD__



?>
<!-- ------------------------------------------------------------------------------------------------------------------------------- -->
<?php
 echo '<hr> <h2 class="display-4 text-center">EXO</h2> <hr>';
 //afficher  vert-jaune-rouge ( avec les tirets) en mettant chaque couleurs dans une variable, faite en sorte que chaque mot soit de la bonne couleur

                                                                                                                                                                                                  
$vert ="<span class='text-success'>vert</span>";
$jaune ="<span class='text-warning'>jaune</span>";
$rouge="<span style='color:red'>rouge</span>";

echo "$vert - $jaune - $rouge <br>";
echo $vert ." - " .$jaune ." - ". $rouge."<br>";
?>
<!-- ------------------------------------------------------------------------------------------------------------------------ -->
<?php
 echo '<hr> <h2 class="display-4 text-center">Operateur arithmetique</h2> <hr>';
$f = 10 ; $g = 2;

echo $f + $g . '<br>'; // affiche 12
echo $f - $g . '<br>'; // affiche 8
echo $f / $g . '<br>'; // affiche 20 
echo $f * $g . '<br>'; // affiche 5

//operation/ affectation
$f += $g; //equivaut à $f = $f + $g
echo $f . '<br>'; //redefini $f et affiche 12 
$f -= $g; //equivaut à $f = $f - $g
echo $f . '<br>'; //redefini $f et affiche 10 
$f *= $g; //equivaut à $f = $f * $g
echo $f . '<br>'; //redefini $f et affiche 20 
$f /= $g; //equivaut à $f = $f / $g
echo $f . '<br>'; //redefini $f et affiche 10 
//context : pratique pour le calcul d'un panier

?>
<!-- ------------------------------------------------------------------------------------------------------------------------ -->
<?php
 echo '<hr> <h2 class="display-4 text-center">Structures conditionnelles (if/else) - operateurs de comparaison</h2> <hr>';
 
 //Isset & empty
$var1 =0 ;
$var2= '';

//empty test si une variable est à 0, vide ou non definie
//Si la condition entre les parentheses du If est verifiée, si elle retourne true, le code entre les quotes sera executée 
if(empty($var1))
{
    echo"0, vide ou non definie <br>";
}
//----------------

// isset test l'existence d'une variable
if(isset($var2)){
    echo" var2 existe et est bien definie par rien <br>";
}

/*
Operateurs de comparaison
=       egale à
==      comparaison de la valeur
===     comparaison de la valeur et du type
<       strictement inferieur à
>       strictement superieur à
<=      inferieur ou egal à
>=      superieur ou egal à
!       n'est pas
!=      different de 
||, OR  OU
&&, AND ET
XOR     condition exclusive (soit l'un soit l'autre)
*/

$h=10;
$i=5;
$j=2;
if($h > $i)
{
    echo"H est bien superieur à I <br>";
}
else{ // cas par defaut, dans tout les autres cas, si la condition IF n'est pas verifiée, c'est le code dans le else qui s'execute /else($i ==5) => /!\ erreur
    echo"non c'est I qui est superieur à H <br>";
}

// if / esle if / else
if($h > $i && $i >$j)
{
    echo "ok pour les 2 conditions<br>";
}
else if ($h ==9 || $i > $j)
{
    echo 'ok pour au moin une des 2 conditions<br>';
}
else{
    echo"tout le monde est faux <br>" ;
}
// ELSE IF  permet d'ajouter des cas supplementaire à la condition IF
// il peut y avoir plusieurs ELSE IF dans la meme condition
// si une condition superieures est verifiée, ELSEIF bloque le script et toute les condition suiviantes ne seront pas évaluées.

//condition exclusive
if($h == 10 XOR $i == 6)
{
    echo'ok condition exclusive<br>';
}
// pour entre dans les accolades, il faut que seulement une des 2 conditions soient verifiées

//Forme contracté : 2eme possibilité d'écriture
echo ($h == 10)? "A est egal à 10 <br>" : "A n'est pas egal à 10 <br>";
//condition ternaire : le ? remplace le If et les ":" remplace le Else

//comparaison
$varA =1;
$varB ='1';

if($varA == $varB){
    echo" il s'agit de la meme chose <br>";
}
// avec la presence du triple egale, le test ne fonctionne pas, car les types des variables sont differents, INTEGER n'est pas egalt a STRING
/*
=       affectation
==      comparaision de la valeur
===     comparaision de la valeur et du type
*/
?>
<!-- -------------------------------------------------------------------------------------------------- -->
<?php
 echo '<hr> <h2 class="display-4 text-center">Condition SWITCH</h2> <hr>';

 $perso ='Mario';
 switch($perso)
 {
     case 'luigi':
        echo"Vous avez choisi $perso<br>";
        break;

        case 'Toad':
        echo"Vous avez choisi $perso<br>";
        break;

        case 'Bowser':
        echo"Vous avez choisi $perso<br>";
        break;

        default:
        echo"Vous êtes fou!! c'est Mario le meilleur<br>";
        break;
 }
//si on a une grande comparaison de cas, la condition SWITCH est à privilégié
//'case' represente  les cas dans lesquel nous pouvons potentiellement tomber
// 'break' permet de stopper le scriptsi nous tombons dans un des cas


?>
<!-- -------------------------------------------------------------------------------------------------- -->
<?php
 echo '<hr> <h2 class="display-4 text-center">EXO if-elseif-else</h2> <hr>';

//EXO : pouvez-vous faire la meme chose que le switch avec des condition if/ else if / else ? si oui, faites les.

if($perso == 'luigi'){
 echo"Vous avez choisi $perso<br>";
}

elseif($perso == 'Toad'){
 echo"Vous avez choisi $perso<br>";
}

elseif($perso == 'Bowser'){
 echo"Vous avez choisi $perso<br>";
}

else{
    echo"Vous êtes fou!! c'est Mario le meilleur<br>";
}

?>
<!-- -------------------------------------------------------------------------------------------------- -->
<?php
 echo '<hr> <h2 class="display-4 text-center">Fonctions predefinis</h2> <hr>';


 //php.net -- site ref
//liste de toutes les fonctions
 //https://www.php.net/manual/fr/indexes.functions.php

 echo 'Date : ' .date("d/m/Y").'<br>';
//lorsque l'on utilise une fonction predefini, il faut toujours ce poser la question , à savoir ce que l'on doit envoyer comme argument et surtout savoir ce qu'elle retourne
//les arguments de la fonction date() ne sortent pas de nul part, on les retrouvent sur la documentation 
?>

<!-- -------------------------------------------------------------------------------------------------- -->
<?php
 echo '<hr> <h2 class="display-4 text-center">Traitement des chaines (iconv_strlen , strpos, substr)</h2> <hr>';

//strpos()
$email1 = "aurelia.piot@lepoles.com";
echo strpos($email1, "@")."<br>";
/*
    strpos(): string position / fonction predefinie qui permet de trouver la position d'un caractere dans une chaine arguments:
    1- la chaine dans laquelle nous souhaitons chercher
    2- le caracter à trouver 
        context: utile pour verifier le format d'un email
*/
$email2 ="bonjour";
echo strpos($email2, "@");//cette ligne ne sort rien, pourtant il y a bien quelque chose a l'interieur : False !
var_dump(strpos($email2, "@"));// grace a var_dump() on aperçoit le False.   var_dump() est donc une instruction d'affichage ameliorée que l'on utilise regulierement en phase de developpement
// il existe une autre : print_r()
echo "<br>";


//iconv_strlen()
$phrase = "Mettez une phrase ici à cet endroit";
echo iconv_strlen($phrase)."<br>";
// retourne la taille de la chaine de charactere
//iconv_strlen() est une fonction predefinie qui permet de calculer la taille d'une chaine de caractere
//contexte : nous pourrions l'utiliser pour savoir si le pseudo et le mdp lors d'une inscription ont des tailles conforme

//substr
$text = "Lorem ipsum dolor sit amet consectetur adipisicing elit. Cupiditate libero quia facere saepe laboriosam illo quae dolor? Dolorem nemo, accusantium velit quae cum earum tempora optio atque quod rem possimus. Lorem ipsum dolor sit amet consectetur adipisicing elit. Atque quas quae nobis aut veritatis nemo illo, fugiat quibusdam harum dignissimos laborum velit sint tempora, delectus earum labore eos est obcaecati.";

echo substr($text,0,20 )."  <a href =''>lire la suite </a>"."<br>";
//retourne une partie du text selon la definition du debut et de la fin d'appartion
/*substr() est une fonction predefinie permettant de retourner une partie de la chaine 
    arguments:
    1-la chaine a computer
    2- la position de debut 
    3- la position de fin
 
    context : substr est souvent utilisé pour afficher des actualitée avec une accroche

    */
?>
<!-- -------------------------------------------------------------------------------------------------- -->
<?php
 echo '<hr> <h2 class="display-4 text-center">fonction utilisateur</h2> <hr>';
 //les fonctions utilisateur permettent d'eviter de copier/coller un code recurant, on l'encapsule dans une fonction



 //on declare toujours une fonction avec le mot clef 'function' suivi du nom de la fonction de nous definissons


function separation()// toujours des parenthese, une fonction peut potentiellement recevoir des arguments
{
    echo"<hr><hr><hr>";
}

separation();//appel et donc execution de la fonction


//fonction avec arguments
        
function bonjour($qui)
{
    return "Bonjour $qui <br>";//retourne la resultat de la fonction, a ce moment la, on quitte la fonction
}

echo bonjour('Grégory');//execution de la fonction
echo bonjour('Etienne');//quand il y a un 'return' dans la fonction, il faut faire un echo avant la fonction pour avoir le resultat qui s'affiche

$prenom ='Jacques';
echo bonjour($prenom);//l'argument peut aussi etre une variable


//------------------------

function appliqueTva($nombre)
{
    return $nombre *1.2;
}
echo "500 euros avec tva 20% font :".
 appliqueTva(500)."€<br>";
// Exo : pourriez vous améliorer cette afonction afin que l'on calculer un nombre avec les taux de notre choix (19.6% , 5.5% , 7% ect...)(1+ taux/100)

function Tva($nombre, $taux)
{
    return $nombre *(1+$taux/100);

}

echo "500 euros avec tva à 19.6% font :".
Tva(500,19.6)."€<br>";
echo "500 euros avec tva à 7% font :".
Tva(500,7)."€<br>";
echo "500 euros avec tva à 5.5% font :".
Tva(500,5.5)."€<br>";


//------------------------------------------------------------

echo meteo("printemps","2");
//il est possible d'executer une fonction avant qu'ell ne soit declarer dans le code
function meteo ($saison, $temperature)
{
      return "nous sommes en $saison et il fait $temperature deg <br>";
}

echo "<br><hr><br>";

/*Exo : gerer le S de degreS en fonction de la temperature, penser aussi à gerer les articles :
"en" ete/ au printemps*/
function exoMeteo($saison,$temperature)
{
    if($temperature >1 || $temperature <-1)
        $degre ="degrés";
    else    
        $degre = "degré";

    //----------------
    if($saison == 'printemps')
        $art = "au";
    else
        $art ='en';

        return "nous sommes $art $saison et il fait $temperature $degre <br>";
}
echo exoMeteo('été',2);
echo exoMeteo('automne',-2);
echo exoMeteo('hiver',0);
echo exoMeteo('printemps',-1);

//espace globale et local
function jourSemaine()
{
    $jour = "jeudi";
    return $jour;
    echo 'Allo!!';
}
echo $jour;// /!\ ne fonctionne pas car cette variable n'est pas connu qu'a l'interrieur de la fonction
//il n'est pas possible de l'appeler une variable dans l'espace local (dans une fonction) vers l'espace global (espace par defaut de php)

$recup = jourSemaine();
echo $recup .'<br>';
//-----------------
$pays ='France';
function affichagePays()
{
    global $pays; // global permet d'importer une variable declarée dans l'espace global vers l'espace local (dans une fonction)
    return $pays;
}
echo affichagePays();
?>



<!-- -------------------------------------------------------------------------------------------------- -->
<?php
 echo '<hr> <h2 class="display-4 text-center">Structure itérative : boucle</h2> <hr>';

//Boucle while
$i = 0;
while($i<5){
    echo "$i ---";
    $i++; //equivaut à $i = $i +1
}
// 0--1--2--3--4--
//exo : faite en sorte de ne pas avoir les tirets a la fin
// 0--1--2--3--4

echo"<br>";

$j = 0 ;

while($j < 5)
{
    if($j !== 4)
        echo" $j---";
    else
        echo $j ;
    $j ++;
}
echo"<br>";
echo"<hr>";
// /----------------------------------------------------------------------------------/
// la boucle FOR 
//tout ce fait dans les parenthese
for($j = 0; $j < 16 ; $j++)
// initialisation / condition d'entrée / incrementation
{
    echo " $j";
}
// = 0 1 2 3 4 5 6 7 8 9 10 11 12 13 14 15 

// /----------------------------------------------------------------------------------/
 // exo afficher un selecteur de 30 options via une boucle

echo"<br>";

//ici la boucle ce trouve a l'interrieur de la balise select et a chaque tour de boucle, une balise option est créer
echo "<select >";
    for($k = 0; $k < 31 ; $k++)
    {
         echo"<option value = $k >$k </option>";
    }
echo "</select>";

// /----------------------------------------------------------------------------------/
echo"<br>";
//exo : Faites une boucle qui affiche de 0 à 9 sur la meme ligne (soit 10 tours)

for($l = 0; $l < 10 ; $l++)

{
    echo " $l";
}


// /----------------------------------------------------------------------------------/
echo"<br>";
//exo : Faites une boucle qui affiche de 0 à 9 sur la meme ligne dans un table Html (soit 10 tours)



//les balise table englobe la boucle 'for'
echo "<table class='table table-bordered text-center'><tr>";

for($l = 0; $l < 10 ; $l++)

{
    echo "<td> $l</td>"; //on crée une option par tour de boucle avec la valer de $l dans chaque cellule
}

echo "</tr></table><hr>";

// /----------------------------------------------------------------------------------/
echo"<br>";
//exo faite la meme chose en allant de 0 à 99 sur plusieurs lignes sans faire 10 boucles

echo "<table class='table table-bordered text-center'><tr>";


// la premiere boucle FOR tourne 10 fois par ce qu'il y a 10 lignes 
//la deuxieme boucle FOR tourne 10 fois sur chaque ligne et a chaque tour, crée une nouvelle cellule

//$compteur permet d'avoir une variable qui ne se reinitalise jamais a zero, elle augmente de 1 quel que soit le tour de boucle 



$compteur = 0 ;

for($ligne = 0; $ligne < 10 ; $ligne++)

{
   
echo "<tr>";

   for($cellule = 0; $cellule< 10 ; $cellule++){
        echo "<td>$compteur </td>";
        $compteur++;
   
    }
         
  echo"</tr>";
    
  
}

echo "</tr></table>";

?>



<!-- -------------------------------------------------------------------------------------------------- -->
<?php
 echo '<hr> <h2 class="display-4 text-center">Tableau de données ARRAY</h2> <hr>';
//un tableau array est declarée un peu comme une variable ameliorée, car on ne conserve pas qu'une valeur mais un ensemble de valeur




$liste = array ("Gregory","Aziz","Nassim","Sylvain","Nelson");
//$liste = [ "Gregory","Aziz","Nassim","Sylvain","Nelson"];
// echo $liste; erreur !! on ne peut pas afficher un tableau ARRAY en passant par un simple echo/ print

echo '<pre>';var_dump($liste);echo'</pre>'; //plus detaillé
echo '<pre>';print_r($liste);echo'</pre>';  //moins detaillé

//pre est une balis qui permet de formater la sortie du print_r ou var_dump
//ces instructions d'affichages améliorées permettent de consulter et d'afficher les données d'un tableaux, d'une variable , d'un objets , ect....


/*
 ________ ________
| indice | valeur |
 ________ ________
|0       | Gregory|
_________ ________
|1       |Aziz    |
_________ ________
|2       | Nassim |
_________ ________

*/
/*----------------------------*/
//exo: tenter de sortir "Aziz" en passant par le taleau de données ARRAY sans faire un 'echo Aziz';


echo $liste [1]. "<br>"; // on va crocheter l'indice 1 du tableau ARRAY pour extraire la valeur etant stocké a l'indice 1;

?>



<!-- -------------------------------------------------------------------------------------------------- -->
<?php
 echo '<hr> <h2 class="display-4 text-center">Boucle foreach pour les tableau de données ARRAY</h2> <hr>';

//autre moyen d'affecter une valeur dans un tableau, les crochets vide permettent de generer des indices numerique
$tab[]="France";
$tab[]="Angleterre";
$tab[]="Espagne";
$tab[]="Italie";
$tab[]="Portugal";

//echo $tab /!\ erreur !!!

echo '<pre>';print_r($tab);echo'</pre>';
echo"<hr>";
//boucle foreach
/*
 ________ __________
| indice | valeur   |
 ________ __________
|0       | France   |
_________ __________
|1       |Angleterre|
_________ __________
|2       | espagne  |
_________ __________
     ...ECT...
*/

foreach ($tab as $value)//as fait partie du langage et est obligatoire, $value est une veriable de reception que nous nommons, elle receptionne une valeur du tableau par tour de boucle
{
    echo "$value<br>";//on affiche successivement les elements du tableau
}
//lorsqu'il y a qu'une seul variable , $value parcours la coonne des valeurs du tableau de donnée ARRAY
//La boucle foreach est un moyen simple de passer en revue un tableau de données ARRAY
//-----------------------------------------------------------------------------------------
//foreach indice + valeur
echo"<hr>";


foreach($tab as $key => $value)//la fleches est obligatoire
{
    echo"$key => $value<br>";
}
//lorsqu'il y a 2 variables, la premiere parcours la colonne des indice ($key) et l'autre la colonne des valeurs ($value) ((et ce peut importe le nom des variables))
/*
  $key      $value
 ________ __________
| indice | valeur   |
 ________ __________
|0       | France   |
_________ __________
|1       |Angleterre|
_________ __________
|2       | espagne  |
_________ __________
     ...ECT...
*/

?>
<hr>
<?php   foreach($tab as $key => $value): ?>
    <?= $key; ?> => <?=$value ?><br>
<?php   endforeach; ?>
<!-- for(): / endfor -->
<!-- if():/ else: / endif -->
<!-- wile():/ endwhile -->







<?php
//il est possible de definir ses propores indices
$perso = array ("m"=>"Mario","l"=>"Luigi","z"=>"Aziz","n"=>"Nassim");
echo'<pre>';print_r($perso);echo'</pre>';

echo "Taille du tableau : " . count($perso) . '<br>';
echo "Taille du tableau : " . sizeof($perso) . '<br>';
//sizeof et count retourne la taille d'un tableau ARRAY, combien d'elements il y a à l'interieur. pas de différence entre les 2

echo implode(" - ", $perso);//implode() est une fonction predefinie qui rassemble les elements d'un tableau en une chaine (séparé par un symbole)
// L'inverse : explode
?>



<!-- -------------------------------------------------------------------------------------------------- -->
<?php
 echo '<hr> <h2 class="display-4 text-center">Tableau ARRAY multidimensionnel</h2> <hr>';
//nous parlon de tableau multidimensionnel quand un tableau est contenu dans un autre tableau

$tab_multi =array(
    0=> array ("nom"=> "macron", "salaire"=>1), 
    1=> array ("nom"=> "Lacroix", "salaire"=>15000)

);

echo '<pre>';print_r($tab_multi);echo'</pre>';
//exo tenter de sortir "macron" en passant par le tableau multi representer par $tab_multi sans faire un 'echo macron'

echo $tab_multi[0]["nom"].'<hr>';

//exo afficher l'ensemble du tableau multi a l'aide des boucles foreach



foreach($tab_multi as $key => $tab)
{
 echo '<div class ="col-md-3 offset-md-5 alert alert-success text-dark mx-auto text-center ">';
    foreach($tab as $key2 => $value)
    {
         echo "$key2 => $value<br>";
    }
echo '</div>'  ;
}



///////////////////////////////////////////////////////////////////////

for($i = 0; $i < count($tab_multi);$i++)// tant que ma variable i est inferieur au nombre d'element du tableau $tab_multi ma boucle tourne (ici 2 fois)
//la boucle for permet de tourner autant de fois qu'il y a de ligne dans mon tableau multi, donc 2 tours de boucle dans notre cas


{
     echo '<div class ="col-md-3 offset-md-5 alert alert-info text-dark mx-auto text-center ">';
    foreach($tab_multi[$i] as $key => $value) // va aller recuperer a l'indice 0 car i = 0, puis a l'indice 1 car i s'icremente a chaque boucle 
    // on se sert de la variable $i de la boucle for pour aller crocheter a chaque indice du tableau multi et parcourir les données
    
    {


         echo "$key => $value<br>";
    }

echo '</div>'  ;
}




?>


<?php
/**/
?>



</div>

</body>
</html>