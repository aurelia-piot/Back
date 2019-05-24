<?php

$tab = array('Mario','Yoshi','Toad','Bowser');
$objet=(object)$tab; //cast : transformation
echo'<pre>';var_dump($objet);echo'</pre>';// Un objet fait parti de la classe STDCLASS (Class standart de php) lorsque celui ci est orphelin et n'a pas ete instancié par un 'new' , l'objet n'est issu d'aucune classe en particulier

//exo afficher Yoshi en passant par l'objet stdClass '$objet'

echo  "<hr>".$objet->{1}.'-'.$objet->{2}.'<hr>';//permet d'afficher un element de l'objet

foreach($objet as $key => $value)
{echo "$key -$value <br>";}

echo"<hr>";

echo'<pre>';print_r(get_declared_classes());echo'</pre>';


?>