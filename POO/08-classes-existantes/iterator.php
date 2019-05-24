<?php
$perso = array("m"=> "Mario","l"=>"Luigi","t"=>"Toad","b"=>"Bowser");

$it1 = new ArrayIterator($perso);
echo'<pre>';print_r(get_class_methods($it1));echo'</pre>';
echo'<pre>';var_dump($it1);echo'</pre>';

$it1->rewind();
while($it1->valid()){echo $it1->key().'  -  '.$it1->current().'<br>';
$it1->next();
}


echo "<hr>";



/*


rewind(): permet de se deplacer au debut de fichier /array/dossier/
valid() : permet de verifier si'il y a des information a parcourir
key(): permet d'afficher l'indice
current(): affiche la valeur
next(): permet de passer a l'element suivant (comparable a $i++, incrementation)


*/


$it2 = new SimpleXmlIterator('liste.xml',null,true);

$it2->rewind();
while($it2->valid()){echo $it2->key().'  -  '.$it2->current().'<br>';
$it2->next();
}


// Iterator est ce qu'on appel un design patern, qui permet de definir une solution pratique a un probleme frequent, un pattern propose une structure commune

//Exo faire la meme chose avec la class DirectoryIterator()

echo "<hr>";

$it3 = new DirectoryIterator('c://');
$it3->rewind();
while($it3->valid()){echo $it3->key().'  -  '.$it3->current().'<br>';
$it3->next();
}
// Dans les 3quart nous avons des donnée de type differents, mais nous avons la meme struccture de code permettant de parcourir les données, les meme methodes sont presentes dans les 3 classes differentes


echo "<hr>";

foreach (new DirectoryIterator('../08-classes-existantes') as $fileInfo) {
    if($fileInfo->isDot()) continue;
    echo $fileInfo->getFilename() . "<br>\n";
}
echo "<hr>";
foreach (new DirectoryIterator('../../POO') as $fileInfo) {
    if($fileInfo->isDot()) continue;
    echo $fileInfo->getFilename() . "<br>\n";
}
echo "<hr>";


?>