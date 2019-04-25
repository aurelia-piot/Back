<?php
require_once("init.php")

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <title>Document</title>
</head>
<body>

<!-- 1-- Connexion à la BDD --
    mysql -u root -p 

    
-- Creation d'une BDD --
        CREATE DATABASE  immobilier; 
        
        
-- Selectionner une BDD --
        USE nom_de_la_BDD;

-- creation d'une TABLE dans la BDD --    

CREATE TABLE logement (id_logement INT(3) PRIMARY KEY AUTO_INCREMENT NOT NULL ,titre VARCHAR(30),adresse VARCHAR(30)  ,  ville VARCHAR(30),cp INT(5),surface INT(5),prix FLOAT,photo VARCHAR(60),type(location ou vente), description TEXT)

cp =code postal    
  
- titre   - adresse  - ville   - cp   - surface   - prix   - photo - type (location ou vente)   - description 
 

       
    -->
<!-- ----------------------------------------------- -->
  <h1 class="text-center display-4">Enregistrement des données</h1>
  <hr>
  <h2 class="text-center display-4">Creation du formulaire</h2>


<div class="offset-md-2 col-md-9 "><hr>Créez un formulaire pour pouvoir ajouter des logements à la table nommée « logement ». <br>Plusieurs contrôles de saisies sont à prévoir : 
<ul>

<li>Les champs obligatoires sont : titre, adresse, ville, cp, surface, prix, type </li>
<li>Le format du code postal doit être vérifié et être correct. </li>
<li>Les champs prix et surface doivent contenir exclusivement des nombres entiers.</li> 
<li>Le champ photo doit permettre un upload de fichier image, les vérifications sont multiples : extension et type de fichier, poids du fichier, etc.</li>  
<li>Le champ type doit être gérer via un input type radio ou un select option.</li> 
</ul>
<hr>
</div>

<hr>

<?php

 echo '<pre>' ; print_r($_POST); echo'</pre>';
 echo '<pre>' ; print_r($_FILES); echo'</pre>';


$error=""; 
if($_POST)
{
   
        // ------------------le sont-ils ?

    //     if(!empty($_POST['titre'])||!empty($_POST['adresse'])||!empty($_POST['ville'])||!empty($_POST['cp'])||!empty($_POST['surface'])||!empty($_POST['prix'])||!empty($_POST['type']))
    //    {
    //        $error.="<div class='col-md-4 offset-md-4 alert alert-danger text-center'>merci de renseigner toutes les informations  </div>"; 
    //     }

      //  -------------oui ils le sont !


        if(!is_numeric($_POST['cp']) || iconv_strlen($_POST['cp']) !== 5) //si n'est pas numerique et pas egale a 5 
        {
            $error.="<div class='col-md-4 offset-md-4 alert alert-danger text-center'>merci de renseigner un code postale valide <br>  </div>"; 
        }

        if(!is_numeric($_POST['prix']))
        {
            $error.="<div class='col-md-4 offset-md-4 alert alert-danger text-center'>merci de renseigner un prix valide (nombre entier)<br>  </div>"; 
        }



 $photo_bdd ='';

    if(!empty($_FILES['photo']['name']))//on verifie que l'indice 'name' dans la superglobale $_FILES n'est pas vide, cela veut dire que l'on a bien uploader une photo
      {
        $nom_photo = $titre ;// on redefinit le nom de la photo en concatenant le titre saisie dans le formulaire avec le nom de la photo

        $photo_bdd = URL."photo/$nom_photo"; //URL est une constante ; que l'on a determiné pluss tot /////on definit l'URL de la photo, c'est ce que l'on conserve dans la BDD
     

        $photo_dossier = RACINE_SITE."photo/$nom_photo"; //chemin physique / sur le pc ////on definit le chemin physique de la photo sur le disque dur du serveur, c'est ce qui nous permet tre de copier la photo dans le dossier photo

        copy($_FILES['photo']['tmp_name'],$photo_dossier);//copy() est une fonction predefinie qui permet de copier la photo dans le dossier photo . arguments : copy(nom_temporaire_photo, chemin de destination)


// ------------------------------------------------- TEST REDIMENSION
$file = RACINE_SITE."photo/$nom_photo";

$x = 300;
$y = 300; # Taille en pixel de l'image redimensionnée



$size = getimagesize($file);
$img = imagecreatefromjpeg($file); // On ouvre l'image d'origine

$img_new = imagecreate($x, $y);

// création de la miniature

$img_mini = imagecreatetruecolor($x, $y)

or $img_mini = imagecreate($x, $y);



// copie de l'image, avec le redimensionnement.
imagecopyresized($img_mini,$img_big,0,0,0,0,$x,$y,$size[0],$size[1]);

imagejpeg($img_mini,$file );

 //--------------------------------------------------------FIN TEST
    }

// if(!isset($_POST['photo'])){
//      $error.="<div class='col-md-4 offset-md-4 alert alert-danger text-center'>merci d'ajouter une photo a l'offre   </div>"; 
// }




echo $error ;
if(empty($error)){

        $logement_insert = $bdd ->prepare("INSERT INTO logement(titre,adresse,ville,cp,surface,prix,photo,type,description ) VALUE (:titre,:adresse,:ville,:cp,:surface,:prix,:photo,:type,:description ) ");
  
        $validate ="<div class='col-md-4 offset-md-4 alert alert-success text-center text-dark' >L'offre a bien été enregistrer</div>";
       // echo $validate;

     

    //      foreach($_POST as $key => $value) // va creer des indice pour chaque detail du post
    //    {
    //      if($key !==$_POST['photo'] )
    //      {
    //       $logement_insert->bindValue(":$key",$value,PDO::PARAM_STR);
    //     }
    //    }
    //..fuck
// forcement...aller ! tous à la file indiene !


$logement_insert->bindValue(":titre",$titre,PDO::PARAM_STR);
$logement_insert->bindValue(":adresse",$adresse,PDO::PARAM_STR);
$logement_insert->bindValue(":ville",$ville,PDO::PARAM_STR);
$logement_insert->bindValue(":cp",$cp,PDO::PARAM_STR);    
$logement_insert->bindValue(":surface",$surface,PDO::PARAM_STR); 
$logement_insert->bindValue(":prix",$prix,PDO::PARAM_STR); 
$logement_insert->bindValue(":type",$type,PDO::PARAM_STR); 
$logement_insert->bindValue(":description",$description,PDO::PARAM_STR); 


$logement_insert->bindValue(":photo",$photo_bdd,PDO::PARAM_STR);


$logement_insert->execute();
//header("Location: page2.php");
    }
}






?>

<hr>
<!-- enctype="multipart/form-data"<--- ( >:| ) j'ai perdu 40min a cause de ça... -->
<form class="offset-md-3 col-md-6" method='post'enctype="multipart/form-data">
  <div class="form-group">
     <input type="text" class="form-control"  placeholder="titre" name="titre">
  </div>


<div class="form-row">
  <div class="form-group col-md-4">
      <input type="text" class="form-control"  placeholder="adresse" name="adresse">
  </div>

  <div class="form-group col-md-4">
      <input type="text" class="form-control"  placeholder="ville" name="ville">
  </div>
  <div class="form-group col-md-4">
      <input type="text" class="form-control"  placeholder="code postale" name="cp">
  </div></div>




  <div class="form-group">
      <input type="text" class="form-control"  placeholder="surface" name="surface">
  </div>
  <div class="form-group">
      <input type="text" class="form-control"  placeholder="prix" name="prix">
  </div>
  <div class="form-group">
      <input type="file" class="form-control"  placeholder="photo" name="photo">
  </div>
<div class="form-row">
<label class="col-md-1"for="type">type :</label>
      <select id="type" class="form-control col-md-11" name="type">
        <option value="location"selected>Location</option>
        <option Value="vente">Vente</option>
      </select>
 </div>


  <div class="form-group">
    
      <textarea class="form-control" name="description" placeholder="description" cols="30" rows="4"></textarea>
  </div>

  <button type="submit" class="btn btn-primary col-md-12 ">Submit</button>
</form><a class="offset-md-5 "href="page2.php">page 2(si le header est en commentaire)</a>
<br>
<br>
<br>
<br>
<br>


    
</body>
</html>