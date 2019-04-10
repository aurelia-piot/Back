<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

    <title>Requete PDO</title>
</head>
<body>
    <div class="container">
            <h2 class="display-4 text-center">01. PDO : Connexion</h2><hr>
        <?php
        
            // class PDO
            // {
            //     //methodes (fonctions)
            //     //proprietes (variables)

            //     EX :public function query()
                //{
                //code/ traitement ....
                //}
            // }



    //   $pdo = new PDO('mysql:host= nom du serveur ;dbname= nom de la BBD','ID','',array((constente)option pdo en cas de mal connexion ,PDO::MYSQL_ATTR_INIT_COMMAND =>'SET NAME utf8'))

    // PDO est une class predefinie en PHP qui permet de se conecter à une base de donnée, cette classe possede des propres methodes (fonctions) qui nous permettrons par exemples de formuler et d'executer une requete SQL

    //$pdo est l'objet qui permet d'interagire, d'interroger la BDD

    // arguments : 1 (serveur + BDD) / 2 (identifiant) / 3 (mdp) / 4 (options PDO)
    //--connexion a la BDD
    $pdo = new PDO('mysql:host=localhost;dbname=entreprise','root','',array(PDO::ATTR_ERRMODE => PDO :: ERRMODE_WARNING, PDO::MYSQL_ATTR_INIT_COMMAND =>'SET NAMES utf8'));
        
         echo'<pre>';var_dump($pdo);echo'</pre>'; //affiche l'objet PDO

        echo'<pre>';print_r(get_class_methods($pdo));echo'</pre>'; // affiche les methodes issu de la classe predefinie PDO



        echo '<hr> <h2 class="display-4 text-center">02. PDO : EXEC-INSERT  /  UPDATE  /  DELETE </h2><hr>';


        // Exo : Formuler la requete permettant de vous inserer dans la BDD entreprise donc dans la table employes


//c'est juste histoir d'etre tranquil
        // $true n'etant pas definie , on entre pas dans la condition
if(isset($true)) //permet de ne plus avoir d'insert a chaque rechargement de la page
{
        $resultat = $pdo -> exec("INSERT INTO employes ( prenom, nom, sexe, service, date_embauche, salaire) VALUE ('Peter', 'Piot', 'm', 'informatique', '2019-04-09', 2200);");
        echo "Nombre d'enregistrement affecté(s) par l'INSERT : $resultat <br>";
        echo "Dernier ID généré : ". $pdo ->lastInsertId(). '<hr>';
}
        /* 
        le fleche permet d'aller piocher une methode

        exec() retourne le nombre d'enregistrement affecter par la requette (un INT)
        
        --

        EXEC() est une methode issue de la classe predefinie PDO, elle permet de formuler et executer des requetes SQL, c'est en argument (entre les parenthese de la methode) que l'on envoi la requete

        EXEC() est prevu pour des requetes ne retournant pas de jeu de resultat (INSERT / UPDATE / DELETE)
        
        */

        // UPDATE
        // EXO : realiser le traitement  permettant de modifier la salaire de l'employé n° 350 par 1200




         $resultat = $pdo -> exec('UPDATE employes SET salaire = "1200" WHERE id_employes = "350" ;');

                    echo "Nombre d'enregistrement affecté(s) par L'UPDATE : $resultat <br>";

        //DELETE
        // EXO :realiser le traitement permettant de supprimer l'employé n°350

        $resultat = $pdo -> exec(' DELETE FROM employes  WHERE id_employes = "350" ;');
        echo "Nombre d'enregistrement affecté(s) par Le DELETE : $resultat <br>";



echo '<hr> <h2 class="display-4 text-center">03. PDO : SELECT + FETCH_ASSOC(1 seul resultat) </h2><hr>';

/*
REquete selection -> query() -> retour objet PDOStatement (inexploitable)
pour exploiter le resultat -> associe une methode -->fetch() / fetchAll()--> retourne un tableau ARRAY
si il ya plusieurs resultats --> boucle !!


fetchAll() retourne un tableau multitdimentionelle --- un tableau dans un tableau  
*/

$result=$pdo->query("SELECT * FROM employes WHERE id_employes = 415");

echo"<pre>";var_dump($result);echo"</pre>";
echo"<pre>";print_r(get_class_methods($result));echo"</pre>";

$employe = $result->fetch(PDO::FETCH_ASSOC);//retourne un tableau ARRAY indexé avec le nom des champs
//----PDO::FETCH_NUM retourne un tableau ARRAY indexé numeriquement
//----PDO::FETCH_BOTH retourne un tableau ARRAY indexé a la fois numeriqueùent et avec le nom des champs
// il n'est pas possible d'associer 2 fois la meme methodes sur le meme resultat

echo"<pre>";print_r($employe);echo"</pre>";

//exo afficher les informationa l'aide d'un affichage conventionnel en excluant l'id_employes



echo'<div class="col-md-4 offset-md-4 mx-auto alert alert-success text-center">';
foreach($employe as $key => $value)
{
    if($key != 'id_employes')
    {
        echo "$key : $value <hr>";
    }
}


echo"</div>";
/*
QUERY() est un methode issu de la classe PDO qui permet de formuler et d'executer des requetes SQL. Elle est prevu pour des requetes retournant un jeu de resultat (SELECT)
Lorsqu'on execute une requete de selection, on obtien toujours en retour un autre objet, issu d"une autre classe : PDOStatement.
Cette classe possede des propres proprietes et methode
--
La methode fetch() permet de rendre le resultat exploitable sous forme de donnée de tableau ARRAY



*/
echo '<hr> <h2 class="display-4 text-center">04. PDO : QUERY - SELECT + WHILE (plusieurs resultats) </h2><hr>';

$resultat=$pdo->query("SELECT * FROM employes ");


echo"<pre>";var_dump($resultat);echo"</pre>";


// en executant un requete de selection, on obtien en retour un objet PDOStatement, cet objet est ineploitable en etat, on lui associe donc la methode fetch qui retourne un tableau Array
// pour recupere l'ensemble des employés, dans ce cas precis , nous somme obliger de boucler
// la boucle while permet de dire = tant qu'il y des employer, on boucle !
// $employes receptionner un tableau ARRAY d'un employé par tour de boucle
// PDO :FETCH_ASSOC --> le :: permettent de faire appel à une constante de la classe PDO sans devoir l'instancier



while($employes = $resultat->fetch(PDO::FETCH_ASSOC))
{

    //echo"<pre>";print_r($employes);echo"</pre>";
echo '<div class="col-md-4 offset-md-4 mx-auto alert alert-info text-center">';
echo $employes['nom'].'<hr>'; // pour chaque tour de boucle , donc pour chaque tableau ARRAY, on va crocheter au different indices
echo $employes['prenom'].'<hr>';
echo $employes['service'].'<hr>';
echo $employes['salaire'].'<hr>';
echo $employes['sexe'];
echo'</div>';
}
echo '<hr> <h2 class="display-4 text-center">05. PDO : QUERY FETCHALL + FETCH_ASSOC (plusieurs resultats) </h2><hr>';

$resultat = $pdo -> query("SELECT * FROM employes ");

$donnees = $resultat->fetchall(PDO::FETCH_ASSOC);//fetchall() retourne un tableau multi dimensionnel avec chaque tableau (de chaque employé) indexé numeriquement

echo"<pre>";print_r($donnees);echo"</pre>";


// EXO afficher successivement les données de chaque employé a l'aide de boucle  foreach( indice : boucle imbriquée) 

//$tab reception un tableau ARRAY d'un employé par tour de boucle
foreach($donnees as $key =>$tab){
        
  echo '<div class="col-md-4 offset-md-4 mx-auto alert alert-info text-center">';
        
    //cette boucle fareach permet de passer en revue chaque tableau de chaque employé
    foreach($tab as $key2 => $value)
    {
        echo "$key2 : $value <hr>";
    }

  echo'</div>';
}






echo '<hr> <h2 class="display-4 text-center">06. PDO : QUERY +FETCH + BDD </h2><hr>';

//exo Afficher la liste des bases de données, puis les mettre dans une liste ul li





$datab = $pdo -> query("SHOW DATABASES;");

echo'<ul class="list-group col-md-4 offset-md-4 ">';

    while($dtbase = $datab->fetch(PDO::FETCH_ASSOC))
    // $dtbase receptionne un tableau ARRAY par tour de boucle contenant les information d'une BDD
        { 
            //echo"<pre>";print_r($dtbase);echo"</pre>";
            echo'<li class="list-group-item ">'.$dtbase['Database'].'</li>';
            //on va crochetr a l'indice [Database] pour afficher le nom de la BDD
        }

echo'</ul>';

//--------------------------------------------------------------------------------------------


echo '<hr> <h2 class="display-4 text-center">07. PDO : QUERY + TABLE</h2><hr>';


$resultat = $pdo -> query ("SELECT * FROM employes");

/*
CloumnCount() est une methode issue de la classe PDOStatement qui retourne le nombre de colonne selectionnés via la requete de selection, dans notre cas retourne integer 7, donc la boucle for tourne 7 fois, autant de fois qu'il y a de colonnes

getColumnMeta() est une methode issue de la class PDOStatement qui permet de recolter les informations des champs/colonne selectionnés


*/


echo'<table class="table table-bordered text-center"><tr>';
    for($i = 0 ; $i < $resultat ->columnCount();$i++)
    {
        $colonne = $resultat->getColumnMeta($i);
       //echo"<pre>";print_r($colonne);echo"</pre>";
        echo"<th>$colonne[name]</th>"; // on va crocheter a l'indice 'name' pour afficher en entete le nom de la colonne par tour de boucle
    }
echo'</tr>';

while($employe =$resultat->fetch(PDO::FETCH_ASSOC))// $employe receptionne un tableau ARRAY par employes par tour de boucle
{
    //echo"<pre>";print_r($employe);echo"</pre>";
    echo'<tr>';
    //la boucle foreach permet de parcourir chaque tableau ARRAY de chaque employé
    foreach($employe as $value)
    {
        echo "<td>$value</td>";
    }
    
    
    echo'</tr>';
}


echo'</table>';

//EXO : faire la meme chose en utilisant la methode fetchAll

$resultat = $pdo -> query("SELECT * FROM employes ");

$donnees = $resultat->fetchall(PDO::FETCH_ASSOC);//fetchall() retourne un tableau multi dimensionnel avec chaque tableau (de chaque employé) indexé numeriquement



//echo"<pre>";print_r($donnees);echo"</pre>";
echo'<table class="table table-bordered text-center"><tr>';
    
// for($i = 0 ; $i < $resultat ->columnCount();$i++)
//     {
//         $colonne = $resultat->getColumnMeta($i);
//        //echo"<pre>";print_r($colonne);echo"</pre>";
//         echo"<th>$colonne[name]</th>"; // on va crocheter a l'indice 'name' pour afficher en entete le nom de la colonne par tour de boucle
//     }


foreach($donnees[0] as $key =>$value)
{
    echo'<th>'.$key.'</th>';//ici on crochete au premier indice du tableau multi pour recuperer les indices et les stockés dans les entetes<th></th>
}

echo'</tr>';
foreach($donnees as $tab)
{
    echo'<tr>'; // on créer une ligne par employé
    //la boucle foreach permet de parcourir chaque tableau ARRAY de chaque employés
    
    foreach($tab as $info)
    {
        echo"<td>$info</td>";
    }
    
    
    echo'</tr>';
}

echo'</table>';







//--------------------------------------------------------------------------------------------


echo '<hr> <h2 class="display-4 text-center">08. PDO : PREPARE + BINDVALUE + EXECUTE</h2><hr>';
// les requetes preparees permettent de formuler une seul fois la requete et de l'executee autant de foi que souhaité
//les requete preparees permettes de parer aux injection SQL, cela permet de proteger le requetes SQL
//3 cycles dans une requete : analyse / interpretation / execution

$resultat = $pdo->prepare("SELECT * FROM employes WHERE nom = :nom");//ici on prepare la requete mais a aucun moment on ne l'execute
//:nom --> marqueur nominatif que l'on peux comparer à une boite ou un tampon

echo"<pre>";print_r($resultat);echo"</pre>";// ici est retourner un objet PDOStatemant (donc des infos inutilisable)

$resultat->bindValue(':nom','Piot',PDO::PARAM_STR);//bindValue() -->methode PDOStatement.Elle permet d'associer une valeur a un marqueur nominatif , ici ':nom'
// la valeur du marqueur peut etre une variable

//arguments bindValue(nom_du_marque , valeur , type)
//A ce stade la requete n'a toujours pas été executée

$resultat->execute();//methode PDOStatement / permet d'executer la requete preparee
 
echo"<pre>";print_r($resultat);echo"</pre>";

$nom = $resultat->fetch(PDO::FETCH_ASSOC);

echo"<pre>";print_r($nom);echo"</pre>";


echo'<div class="col-md-4 offset-md-4 mx-auto alert alert-success text-center">';
foreach($nom as $key => $value)
    {
        echo "$key : $value <hr>";
    }

echo '</div>'


/* 
EX 
    $nom ='Dubar'
    $resultat->bindValue(':nom',$nom,PDO::PARAM_STR); // la valeur du marqueur peut etre une variable :/: on change la valeur du marqueur sans avoir a reformuler la requete SQL
    a tout moment on peut changer la valeur du marqueur ':nom' sans a avoir a reformuler la requete sql 
    $resultat->execute(); // on execute la requete
    $employe = $resultat->fetch(PDO::FETCH_ASSOC);
    echo"<pre>";print_r($employe);echo"</pre>";

*/





?>

 </div>

</body>
</html>