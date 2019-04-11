<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
       <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

    <title>Tchat</title>
</head>
<body>
<!-- 
    exercice : espace dialogie (tchat)
    1.modelisation et creation
        BDD    : tchat
        table  : commentaire
                 id_commentaire     //INT(3) PK - AI
                 pseudo             //VARCHAR(20)
                 dateErengistrement //DATETIME
                 message            //TEXT

2. Connexion a la BDD
3. Creation d'un formulaire HTML (pour l'ajout de message)                 
4. Recuperation et affichage des saisien en PHP ($_POST)
5. Requete SQL d'enrengistrement (INSERT)
6. Affichage des messages
 -->

<?php

// 1 .CREATE DATABASE tchat;
//    CREATE TABLE commentaire (id_commentaire INT(3), pseudo VARCHAR(20),dateEnregistrement DATETIME,message TEXT);

?>
<div class="container col-md-4 offset-md-4 text-center">
    <form method='post'>
    <div class="form-group">
        <label for="pseudo">pseudo</label>
        <input type="text" class="form-control" id="pseudo" aria-describedby="pseudo" placeholder="pseudo"name="pseudo">
   
   
   
    <label for="message">message</label><br>
         <textarea name="message" id="message" cols="60" rows="5">
    </textarea>
    </div>
    
    <button type="submit" class="btn btn-primary" name="valider"value="valider">Submit</button>
    </form>
<hr>

<?php

// 2.connexion a la BDD
    foreach($_POST as $key =>$value)
    {
        $_POST[$key]=strip_tags(trim($value));//no passe en revue le formulaire en executant la fonction strip_tags sur chaque valeur saisie dans le formulaire
        //trim() est une fonction predefinie qui supprime les espaces " " en debut et fin de chaine

    }//a mettre au debut du code php pour etre bien pris en compte

 $bdd = new PDO('mysql:host=localhost;dbname=tchat','root','',array(PDO::ATTR_ERRMODE => PDO :: ERRMODE_WARNING, PDO::MYSQL_ATTR_INIT_COMMAND =>'SET NAMES utf8'));
        
 
//  4.Recuperation et affichage des saisien en PHP ($_POST)
 extract($_POST); // permet de tranformer chaque indice du formulaire en variable
 


 if($_POST){
    //     echo '<pre>' ; print_r($_POST); echo'</pre>';   
    //     echo '<hr>'  ;   
    //   $resultat = $bdd->exec("INSERT INTO commentaire (pseudo, dateEnregistrement,message)VALUES ('$pseudo',NOW(),'$message')");
    //     echo "nombre d'enregistrement :$resultat<br><hr>";
    
        /*
        a mettre en message

        Injection SQL:
        ok'); DELETE FROM commentaire;(
        
            FAILLE XSS 

            <script type="text/javascript">
            var point = true;
            while(point == true)
            alert("j'ai planté ton site !!")
            </script>

            <style>
            body{
                display : none;
            }
            </style>


                POUR parer aus failles XSS, il existe plusieurs fonctions predefinies:

                - strip_tags() :permet de supprimer les balises HTML
                - htmlspecialchar() : permet de rendre inoffensives les balises HTML
                - htmlentities() : permet de convertir les balise HTML en entités HTML
                toujour a mettre en debut pour etre la premiere chose a etre pris en compte
        */



    // $req ="INSERT INTO commentaire (pseudo, dateEnregistrement,message)VALUES ('$pseudo',NOW(),'$message')";
    // $resultat = $bdd->exec($req)
    // echo $req;


    //le faite de preparer une requete SQL permet de parer aux injections SQL
    $req ="INSERT INTO commentaire (pseudo, dateEnregistrement, message)VALUES(:pseudo, NOW(),:message)";

    $resultat = $bdd->prepare($req);

    $resultat->bindValue(':pseudo',$pseudo,PDO::PARAM_STR);
    $resultat->bindValue(':message',$message,PDO::PARAM_STR);
    $resultat->execute();

    echo $req;

}
     
 if (isset ($_POST['valider'])){
        echo "<hr>$pseudo <br>$message<hr>"; 
        }


$resultat = $bdd ->query("SELECT pseudo , message , DATE_FORMAT(dateEnregistrement, '%d/%m/%Y')AS datefr, DATE_FORMAT(dateEnregistrement, '%H/%i/%S') AS heurefr FROM commentaire ORDER BY dateEnregistrement DESC");
echo '<div>Nombre de commentaire (s) : <trong>'.$resultat->rowCount()."</trong></div>"; // rowCount() est une methode PDOStatement qui retourne le nombre de ligne resultant de la requete SELECT
while($commentaire = $resultat ->fetch(PDO::FETCH_ASSOC)){ // SELECT retourne un objet PDOStatement


    //echo '<pre>' ; print_r($commentaire); echo'</pre>';   
    echo'<div class="col-md-8 offset-md-2 alert alert-secondary">';
    
    echo"<div><em> Par $commentaire[pseudo], le $commentaire[datefr] à $commentaire[heurefr]  </em></div><hr>";
    echo "<div class='text-justify'>$commentaire[message]</div>";
    echo'</div>';
    
    
    echo '<hr>'  ;   

}





?>










</div>

    
</body>
</html>