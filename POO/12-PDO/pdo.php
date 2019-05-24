<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
<?php
//exo realiser le traitement PHP afin de ce connecter a la BDD 'entreprise


$pdo = new PDO('mysql:host=localhost;dbname=entreprise','root','',array(PDO::ATTR_ERRMODE => PDO :: ERRMODE_WARNING));


echo'<pre>';print_r(get_class_methods($pdo));echo'</pre>';
echo'<pre>';print_r($pdo);echo'</pre>';

echo "<h2 class='display-4 text-center'>Exemple n°1 SELECT + QUERY + FETCH</h2><hr>";

$resultat = $pdo->query('efzzfsfsfes');//erreur de requete volontaire
echo'<pre>';print_r($pdo->errorInfo());echo'</pre>';// en cas d'erreur de requete SQL, errorInfo() contient le message d'erreur et les codes erreur


//Exo afficher les données de l'employe id 419
$resultat = $pdo->query("SELECT * FROM employes WHERE id_employes = 802");
 $employe = $resultat->fetch(PDO::FETCH_ASSOC)   ;
echo'<pre>';var_dump($employe);echo'</pre>';


echo "<div class='alert alert-success col-md-4 offset-md-4 text-center text-dark'>";

foreach($employe as $key => $value)
        {
               echo "<strong>$key</strong>: $value <hr>"; 
            
        }

echo "</div>";


echo "<h2 class='display-4 text-center'>Exemple n°2 SELECT + QUERY + FETCHALL</h2><hr>";

//Exo afficher successivement les données de chaque employé en utilisant la methode FetchAll

$resultat2 = $pdo->query("SELECT * FROM employes");
 $employe2 = $resultat2->fetchall(PDO::FETCH_ASSOC)   ;
//echo'<pre>';var_dump($employe2);echo'</pre>';


echo "<div class='alert alert-success col-md-5 offset-md-3 text-center text-dark'>";

foreach($employe2 as $key => $tab)
        {
            foreach($tab as $key2 => $value){ echo "<strong>$key</strong>: $value _<strong>||</strong>_";} echo"<hr>";
           
        }

echo "</div>";


echo "<h2 class='display-4 text-center'>Exemple n°3 SELECT + QUERY + FETC_ASSOC</h2><hr>";

$resultat3 = $pdo->query("SELECT * FROM employes",PDO::FETCH_ASSOC);
//on demande d'indexer avec le nom des champ quand c'est toujours au stade d'objet
echo'<pre>';var_dump($resultat3);echo'</pre>';


//afficher l'ensemble des employes sous forme de tableau HTML via l'objet '$resultat3'

echo "<table class='table table-bordered table-dark col-md-6 offset-md-3'>";
for($i =0; $i< $resultat3->columnCount();$i++)
{
    $colonne = $resultat3->getColumnMeta($i);
    echo"<th>$colonne[name]</th>";
}
echo"</tr>";
// on n'avons plus besoins de la methode fetch() pour realiser cette boucle foreach(), nous avons associé la methode directement avec la requete SQL, on travail avec l'objet '$resultat3'
foreach($resultat3 as $employe)
{
    echo "<tr>";
    
    foreach($employe as $value){echo"<td>$value</td>";}
    
    echo"</tr>";
}
echo"</table>";


echo "<h2 class='display-4 text-center'>Exemple n°4 INSERT , UPDATE , DELETE</h2><hr>";

//Exo inserez vous dans la bdd a l'aide d'une requete INSERT


//$insertme = $pdo->exec("INSERT INTO `employes`VALUES  (DEFAULT,'Peter','Piot','m','informatique','2015-01-02','3200')");


echo "<h2 class='display-4 text-center'>Exemple n°5 PREPARE + '?' + FETCH</h2><hr>";

$resultat4= $pdo->prepare("SELECT * FROM employes WHERE nom = ?"); 
// on va dans un premier temp preparer la requete sans la partie variable, que l'on representera avec un marqueur sous form de point d'interrogation

$resultat4->execute(array("Piot"));//Ici Gallet va remplacer le point d'interrogation juste au dessus
//il lis les marqueur anonyme de gauche a droit si plusieur sy trouve

$donnees = $resultat4->fetch(PDO::FETCH_ASSOC);
echo implode($donnees, ' - ');// permet d'extraire les valeur d'un tableau(array) en chaine de caractere avec un separateur



echo "<h2 class='display-4 text-center'>Exemple n°6 PREPARE + ':' + FETCH</h2><hr>";

$resultat5= $pdo->prepare("SELECT * FROM employes WHERE nom = :nom"); 
$resultat5->execute(array("nom"=>"Piot"));// il est possibke d'envoyer directement a l'execution de la valeur des marqueur nominatif

$donnees = $resultat5->fetch(PDO::FETCH_ASSOC);
echo implode($donnees, ' - ');


echo "<h2 class='display-4 text-center'>Exemple n°7 PREPARE + ':' + FETCH_OBJ</h2><hr>";
//EXO selectionner a l'aide d'une requete prepare les information de l'employe 'Thoyer' et afficher ses données à l'aide de la methode FETCH_OBJ

    $resultat6= $pdo->prepare("SELECT * FROM employes WHERE nom = :nom"); 
$resultat6->execute(array("nom"=>"Piot"));
$employe = $resultat6->fetch(PDO::FETCH_OBJ);
echo'<pre>';var_dump($employe);echo'</pre>';

echo"prenom: ".$employe->prenom.'<hr>'; // on utilise une fleche car on viens chercher un objet




foreach($employe as $key => $value)
{
echo"$key : $value<br>";
}
echo"<hr>";



echo "<h2 class='display-4 text-center'>Exemple n°8 transaction + requete et annulation de celle ci</h2><hr>";
$pdo->beginTransaction();
$result = $pdo->exec("UPDATE employes SET salaire =1000");
echo "nombre d'enregistrement affecter par l'update :$result<hr>";


$resultat8=$pdo->query("SELECT * FROM employes ",PDO::FETCH_ASSOC); 
echo"<span> Avec le changement </span>";


echo "<table class='table table-bordered table-dark col-md-6 offset-md-3'>";
for($i =0; $i< $resultat8->columnCount();$i++)
{
    $colonne = $resultat8->getColumnMeta($i);
    echo"<th>$colonne[name]</th>";
}
echo"</tr>";

foreach($resultat8 as $employe)
{
    echo "<tr>";
    
    foreach($employe as $value){echo"<td>$value</td>";}
    
    echo"</tr>";
}
echo"</table>";

// si on avais voulu valider la transaction, nous aurions du pointer sur la methode 'commit'-->$pdo->commit()


$pdo->rollBack();//permet d'annuler la transaction et de revenir a l'etat initial


echo'<hr>';


$resultat9=$pdo->query("SELECT * FROM employes ",PDO::FETCH_ASSOC); 
echo"<span>Avant le changement </span>";


echo "<table class='table table-bordered table-dark col-md-6 offset-md-3'>";
for($i =0; $i< $resultat9->columnCount();$i++)
{
    $colonne = $resultat9->getColumnMeta($i);
    echo"<th>$colonne[name]</th>";
}
echo"</tr>";

foreach($resultat9 as $employe)
{
    echo "<tr>";
    
    foreach($employe as $value){echo"<td>$value</td>";}
    
    echo"</tr>";
}
echo"</table>";


echo "<h2 class='display-4 text-center'>Exemple n°9 FETCH_CLASS</h2><hr>";

class Employes
{
    public $id_employes;
    public $prenom;
    public $nom;
    public $sexe;
    public $service;
    public $date_embauche;
    public $salaire;
}
$result =$pdo->query("SELECT*FROM employes");
$objet = $result->fetchAll(PDO::FETCH_CLASS,"Employes");//premet de prendre le resultat de la requete et d'affecter les propriete de l'objet.chaque valeur va etre re-associe aux differentes propriete de la classe (il faut pour cela que l'orthographe des noms des colonnes/champ SQL correspondes au proprietes de l'objet)
echo'<pre>';print_r($objet);echo'</pre>';



foreach($objet as $value)
{
    echo $value->prenom.'<hr>';
}


?>