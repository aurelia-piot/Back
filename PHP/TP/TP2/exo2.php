<?php
extract($_POST);


?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css" integrity="sha384-50oBUHEmvpQ+1lW4y57PTFmhCaXp0ML5d60M1M7uH2+nqUivzIebhndOJK28anvf" crossorigin="anonymous">
    <title>Exo 2</title>
    <!-- Hello Peter -->
</head>
<body>


<!-- ---------------------------------------------------------------------------------------------------- -->
  <hr>
  <hr>
  <h2 class="text-center display-4"> Exercice 5 : Création d'un Repertoire</h2>


<div class="offset-md-2 col-md-8 ">Créez une base de données que vous appellerez « repertoire ». A l’intérieur de celle-ci, vous créerez une table que vous appellerez « annuaire » avec les champs suivant :
    <ul>
<li> id_annuaire (INT, 3, AI - PK) </li>
    <li> nom (VARCHAR, 30)</li>
     <li>prenom (VARCHAR, 30)</li>
      <li> telephone (INT, 10, zerofill)</li>
       <li>profession (VARCHAR, 30)</li>
        <li>ville (VARCHAR, 30)</li>
         <li>codepostal (INT, 5, zerofill)</li> 
         <li>adresse (VARCHAR, 30)</li>
          <li>date_de_naissance (DATE) </li>
          <li>sexe (ENUM, 'm', 'f') </li>
          <li>description (TEXT)</li>
    </ul> 
</div><hr>


<!-- ------------------------------------------ -->
  
  <div class="text-center offset-md-2 col-md-8">
      <hr>
<p class="text-left">CREATE DATABASE repertoire;</p>
<p class="text-left"> USE repertoire;</p>
<p class="text-left">CREATE TABLE annuaire (id_annuaire INT(3) PRIMARY KEY NOT NULL AUTO_INCREMENT,nom VARCHAR(30),prenom VARCHAR(30) ,telephone INT(10) zerofill ,profession VARCHAR(30) ,ville VARCHAR(30),codepostal INT(5) zerofill, adresse VARCHAR(30), date_de_naissance DATE ,genre ENUM('m', 'f','n'), description TEXT);</p>
  <hr>
  <h3 class="text-center display-4">Formulaire</h3>




<hr class="col-md-4">
<form method="post">

<div class="form-row">
 
<div class="form-group offset-md-4 col-md-2">
    
    <input type="text" class="form-control" placeholder="nom"name="nom">
  </div>
   <div class="form-group col-md-2">
  
    <input type="text" class="form-control"  placeholder="prenom"name="prenom">
  </div>
 </div>

<div class="form-row">
 
<div class="form-group offset-md-4 col-md-2">
    
    <input type="text" class="form-control" placeholder="telephone"name="telephone">
  </div>
   <div class="form-group col-md-2">
  
    <input type="text" class="form-control"  placeholder="profession"name="profession">
  </div>
 </div>


<div class="form-row">
 
<div class="form-group offset-md-4 col-md-2">
    
    <input type="text" class="form-control" placeholder="ville"name="ville">
  </div>
   <div class="form-group col-md-2">
  
    <input type="text" class="form-control"  placeholder="code postal"name="codepostal">
  </div>
 </div>




 
<div class="form-group offset-md-4 col-md-4">
    
    <input type="text" class="form-control" placeholder="adresse"name="adresse">
  </div>




  <div class="form-row ">
  <div class="row offset-md-4 ">

  <label class="col-md-6" for="dn">date de naissance</label>
    <input type="date" class="form-control col-md-6"id="dn" placeholder="date de naissance"name="datedenaissance" >
  </div>
  </div>


<div class="form-row ">
  <div class="form-group row col-md-4 offset-md-4 ">
    <label class="col-md-4" for="genre">genre</label>
    <select class="form-control col-md-6" id="genre"name="genre">
      <option value="n">N</option>
      <option value="f">F</option>
      <option value="m">M</option>

    </select>
  </div>

 </div>
 <div class="form-row">
   <div class="form-group offset-md-4 col-md-4">
  
    <textarea class="form-control" rows="3" placeholder="description"name="description"></textarea>
    
  </div>
  </div>


 <button class="col-md-4 btn btn-primary" type="submit" name="valider" >enregistrement</button>
</form>
<hr class="col-md-4">
</div>


<?php
if(isset($_POST['valider'])){ echo '<div class="form-group  offset-md-4 col-md-4">';echo '<pre>';print_r($_POST);echo '</pre>';echo '</div>';}
?>



<!-- ---------------------------------------------------------------------------------------------------- -->
  <hr>
  <hr>
  <h3 class="text-center display-4"> Exercice 5.3</h3>

<div class="offset-md-2 col-md-8 ">Une fois les valeurs récupérées du formulaire, il faudra développer le code permettant l’insertion des saisies dans la table « annuaire » de la base de données « repertoire ». Chaque validation du formulaire doit ajouter une nouvelle ligne d’enregistrement dans la table « annuaire ».</div>


<?php







//connexion BDD


$bdd = new PDO('mysql:host=localhost;dbname=repertoire','root','',array(PDO::ATTR_ERRMODE => PDO :: ERRMODE_WARNING, PDO::MYSQL_ATTR_INIT_COMMAND =>'SET NAMES utf8'));
//$bdd->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

//$insert= $bdd->prepare("INSERT INTO annuaire (nom ,prenom,telephone,profession ,ville,codepostal, adresse, date_de_naissance ,genre, description ) VALUES ($nom ,$prenom,$telephone,$profession,$ville,$codepostal, $adresse, $datedenaissance ,$genre, $description);");


$insert= $bdd->prepare("INSERT INTO annuaire (nom ,prenom,telephone,profession ,ville,codepostal, adresse, date_de_naissance ,genre, description ) VALUES (:nom ,:prenom,:telephone,:profession,:ville,:codepostal, :adresse, :datedenaissance ,:genre, :description);");



foreach($_POST as $key => $value){  if($key != 'valider')
       {
    $insert->bindValue(":$key",$value,PDO::PARAM_STR);
}}

   
if(isset($_POST["valider"])){
    $insert->execute();
}




//$insert->bindValue(":id_produit",$id_produit,PDO::PARAM_STR);



$validation ="<div class='col-md-4 offset-md-4 alert alert-success text-center text-dark' >merci , vous etes enregistré.e !</div>";

if ($insert->rowCount() >0){ echo $validation;}

// Warning: PDOStatement::execute(): SQLSTATE[HY093]: Invalid parameter number: number of bound variables does not match number of tokens in 
// c'est lorqu'il manque on parametre dans les attribut ! ici c'etait l'attribut du bouton

/* Array
    [nom] => Piot
    [prenom] => Peter
    [telephone] => 0645669082
    [profession] => Designer
    [ville] => Vitry sur seine
    [codepostal] => 94400
    [adresse] => 5 allée du mongerault
    [datedenaissance] => 1995-08-20
    [genre] => n
    [description] => Bonjour
    [valider] =>  <--------------------------------------------------- ICI  
    */     


?>


<!-- ---------------------------------------------------------------------------------------------------- -->
  <hr>
  <hr>
  <h3 class="text-center display-4"> Exercice 5.4</h3>

<div class="offset-md-2 col-md-8 ">Créez une page « affichage_annuaire.php » qui permettra de récupérer les données et ainsi afficher le nom des champs suivi des informations contenues à l’intérieur de la table « annuaire ».</div>
<?php
$resultat = $bdd -> query("SELECT * FROM annuaire");

$gens = $resultat->fetchall(PDO::FETCH_ASSOC);
//echo '<pre>' ; print_r($gens); echo'</pre>';

?>
<table class="table">
    
<?php foreach($gens['0'] as $titres => $objettab):?>
<th> <?= $titres?></th>  
<?php endforeach;?>


<?php foreach($gens as $gens => $valeurs):?>
<tr>
    <?php foreach($valeurs as $malheures => $key):?>
        <td><?=$key?> </td>


<?php endforeach;?>

</tr>

<?php endforeach;?>

</table>


<!-- ---------------------------------------------------------------------------------------------------- -->
  <hr>
  <hr>
  <h3 class="text-center display-4"> Exercice 5.5</h3>

<div class="offset-md-2 col-md-8 ">Sur la page « affichage_annuaire.php », Ajouter 2 informations <ul><li>Le nombre d’hommes</li><li>Le nombre de femmes</li></ul> 
</div>
<?php



$homme = $bdd->query("SELECT * FROM annuaire WHERE genre = 'm'");
$chiffreh = $homme->fetchall();
$hommes = count($chiffreh);
$neutre = $bdd->query("SELECT * FROM annuaire WHERE genre = 'n'");
$chiffren = $neutre->fetchall();
$neutres = count($chiffren);
$femme = $bdd->query("SELECT * FROM annuaire WHERE genre = 'f'");
$chiffref = $femme->fetchall();
$femmes = count($chiffref);

?>
<div class="offset-md-2 col-md-8 ">
<?php if($hommes >=2):?>
<p>Il y a <?=$hommes?> hommes.</p>
<?php else:?>
<p>Il y a <?=$hommes?> homme.</p>
<?php endif; ?>


<?php if($femmes >=2):?>
<p>Il y a <?=$femmes?> femmes.</p>
<?php else:?>
<p>Il y a <?=$femmes?> femme.</p>
<?php endif; ?>


<?php if($neutres >=2):?>
<p>Il y a <?=$neutres?> personnes neutre.</p>
<?php else:?>
<p>Il y a <?=$neutres?> personne neutre.</p>
<?php endif; ?>
</div>



<!-- ---------------------------------------------------------------------------------------------------- -->
  <hr>
  <hr>
  <h3 class="text-center display-4"> Exercice 5.6</h3>

<div class="offset-md-2 col-md-8 ">Actions : Modification et Suppression Sur la page « affichage_annuaire.php » : <ul><li>Donnez la possibilité de modifier les enregistrements (ouvrant un formulaire pour effectuer les modifications) </li><li>Donnez la possibilité de supprimer les enregistrements (avec un message demandant une confirmation).
</li></ul> 

<div class="offset-md-2 col-md-8 ">
Ces deux actions doivent être possibles directement via la page web.
</div></div>

<?php
$resultat = $bdd -> query("SELECT * FROM annuaire");

$gens = $resultat->fetchall(PDO::FETCH_ASSOC);
//echo '<pre>' ; print_r($gens); echo'</pre>';

?>


<table class="table"><tr>
    
<?php foreach($gens['0'] as $titres => $objettab):?>
<th> <?= $titres?></th>  


<?php endforeach;?>

    <th>MODIFIER</th>
    <th>SUPPRIMER</th>
    </tr>

<?php foreach($gens as $gens => $valeurs):?>
<tr>
    <?php foreach($valeurs as $malheures => $key):?>
        <td><?=$key?> </td>
      


<?php endforeach;?>
<td><a href="?action=modification&id_annuaire=<?=$valeurs['id_annuaire']?>"><i class="fas fa-edit"></i></a></td>
<td><a href="?action=suppression&id_annuaire=<?=$valeurs['id_annuaire']?>"onclick="return(confirm('En êtes vous certain?'))"><i class="fas fa-trash-alt"></i></a></td>
</tr>

<?php endforeach;?>


</table>

<?php

if(isset($_GET['action'])&& $_GET['action']=='suppression'){
  //  exo requete de suppression



 //$id_produit= $_GET['id_produit'];

        $supp= $bdd ->prepare("DELETE  FROM annuaire WHERE id_annuaire = :id_annuaire");
       $supp->bindValue(":id_annuaire",$id_annuaire,PDO::PARAM_STR);
        $supp->execute();

 

         $validate.="<div class='col-md-4 offset-md-4 alert alert-success text-center text-dark' >n° <strong> $id_produit</strong> a bien été supprimé</div>";
 }
?>
<!-- ----------------------------------------------------------------------------------------------------------------------------------------- -->



<?php
if(isset($_GET['action'])&& $_GET['action']=='modification'){
    extract($_GET);

 if(isset($_GET['id_annuaire']))

    {
      $resultat = $bdd ->prepare("SELECT * FROM annuaire WHERE id_annuaire = $id_annuaire");
      
      $resultat->execute();
      $personne = $resultat->fetch(PDO::FETCH_ASSOC);echo '<pre>' ; print_r($personne); echo'</pre>';
    }


$nom =(isset($personne['nom'])) ? $personne['nom']:'';
$prenom=(isset($personne['prenom'])) ? $personne['prenom']:'';
$telephone=(isset($personne['telephone'])) ? $personne['telephone']:'';
$profession=(isset($personne['profession'])) ? $personne['profession']:'';
$ville=(isset($personne['ville'])) ? $personne['ville']:'';
$codepostal=(isset($personne['codepostal'])) ? $personne['codepostal']:'';
$adresse=(isset($personne['adresse'])) ? $personne['adresse']:'';
$date_de_naissance=(isset($personne['date_de_naissance'])) ? $personne['date_de_naissance']:'';
$genre=(isset($personne['genre'])) ? $personne['genre']:'';
$description=(isset($personne['description'])) ? $personne['description']:'';



        $upp= $bdd ->prepare("UPDATE annuaire SET nom=:nom ,prenom=:prenom,telephone=:telephone,profession=:profession,ville=:ville,codepostal=:codepostal, adresse=:adresse, datedenaissance=:datedenaissance ,genre=:genre, description=:description");
       
       

 
foreach($_POST as $key => $value){  if($key != 'modifier')
       {
    $insert->bindValue(":$key",$value,PDO::PARAM_STR);
}}

   
    if(isset($_GET["modification"])){
        $uppt->execute();
    }
 ?>

<hr class="col-md-4">
<form method="post">

<div class="form-row">
 
<div class="form-group offset-md-4 col-md-2">
    
    <input type="text" class="form-control" placeholder="nom"name="nom"  value="<?=$nom?>">
  </div>
   <div class="form-group col-md-2">
  
    <input type="text" class="form-control"  placeholder="prenom"name="prenom"value="<?=$prenom?>">
  </div>
 </div>

<div class="form-row">
 
<div class="form-group offset-md-4 col-md-2">
    
    <input type="text" class="form-control" placeholder="telephone"name="telephone"value="<?=$telephone?>">
  </div>
   <div class="form-group col-md-2">
  
    <input type="text" class="form-control"  placeholder="profession"name="profession"value="<?=$profession?>">
  </div>
 </div>


<div class="form-row">
 
<div class="form-group offset-md-4 col-md-2">
    
    <input type="text" class="form-control" placeholder="ville"name="ville"value="<?=$ville?>">
  </div>
   <div class="form-group col-md-2">
  
    <input type="text" class="form-control"  placeholder="code postal"name="codepostal"value="<?=$codepostal?>">
  </div>
 </div>




 
<div class="form-group offset-md-4 col-md-4">
    
    <input type="text" class="form-control" placeholder="adresse"name="adresse"value="<?=$adresse?>">
  </div>




  <div class="form-row ">
  <div class="row offset-md-4 ">

  <label class="col-md-6" for="dn">date de naissance</label>
    <input type="date" class="form-control col-md-6"id="dn" placeholder="date de naissance"name="date_de_naissance" value="<?php $date_de_naissance?>" >
    <!-- A VOIR COMMENT RECUPERE LA DATE -->
  </div>
  </div>


<div class="form-row ">
  <div class="form-group row col-md-4 offset-md-4 ">
    <label class="col-md-4" for="genre">genre</label>
    <select class="form-control col-md-6" id="genre"name="genre">
      <option value="n" <?php if($genre == 'n') echo 'selected';?> >N</option>
      <option value="f" <?php if($genre == 'f') echo 'selected';?>>F</option>
      <option value="m" <?php if($genre == 'm') echo 'selected';?>>M</option>

    </select>
  </div>

 </div>
 <div class="form-row">
   <div class="form-group offset-md-4 col-md-4">
  
    <textarea class="form-control" rows="3" placeholder="description"name="description"  ><?=$description?></textarea>
    
  </div>
  </div>


 <button class="offset-md-4 col-md-4 btn btn-primary" type="submit" name="modifier" >modifier</button>
</form>
 
 
 
 
 
<?php  }?>






<br>
<br>
<br>
<br>
<br>
<br>
<br>

</body>
</html>