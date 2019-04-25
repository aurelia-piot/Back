<?php
extract($_POST);

//connexion et requete

$bdd = new PDO('mysql:host=localhost;dbname=eleve','root','',array(PDO::ATTR_ERRMODE => PDO :: ERRMODE_WARNING, PDO::MYSQL_ATTR_INIT_COMMAND =>'SET NAMES utf8'));

    $insert= $bdd->prepare("INSERT INTO eleve (nom, prenom, classe, responsable_legal, telephone) VALUES ( :nom, :prenom, :classe, :responsable_legal, :telephone ) ");
        foreach($_POST as $key => $value){  if($key != 'valider')
               {
            $insert->bindValue(":$key",$value,PDO::PARAM_STR);
        }}//fin foreach et du if($key != 'valider')



    $nomError ="";
$prenomError ="";
$classeError ="";
$responsableError ="";
$telError ="";
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css" integrity="sha384-50oBUHEmvpQ+1lW4y57PTFmhCaXp0ML5d60M1M7uH2+nqUivzIebhndOJK28anvf" crossorigin="anonymous">

    <title>Document</title>
</head>
<body>
    
  <h2 class="text-center display-4"> TP : 19 - 04 - 19</h2>
<!-- ----------------------------------------------------------------------------------------------------------- -->

<div class="offset-md-2 col-md-8 ">1 - creez une base de donnée ELEVE  et une table eleve avec les champs suivant : 
<ul >
<li>-> id_eleve INT</li>
<li>-> nom VARCHAR</li>
<li>-> classe VARCHAR</li>
<li>-> parents VARCHAR</li>
<li>-> telephone INT</li>
</ul> 
</div><hr>


<!-- ------------------------------------------------------------------------------------------------------------ -->

<div class="offset-md-2 col-md-8 ">2- Créez un formulaire d'insertion et enregistrer 5 eleves.</div>
<p class="offset-md-2 col-md-8 ">-> assurez vous que les valeurs pour le champ telephone soient bien enrengistré en INT</p><hr>

<!-- --------------------------------CORRECTION----------------------------------------------------------------------------------------------------------------------------- -->
<?php



if(isset($_POST['valider'])){
    //echo'<pre>';print_r($_POST);echo'</pre>';


if(empty($nom)|| iconv_strlen($nom)<2 || iconv_strlen($nom)>30 ){//si le nom est au bon format
$nomError .='<small class="text-danger">**Saisisser un nom entre 2 et 30 caractère </small>';
}

if(empty($prenom)|| iconv_strlen($prenom)<2 || iconv_strlen($prenom)>30 ){//si le prenom est au bon format
$prenomError .='<small class="text-danger">**Saisisser un prenom entre 2 et 30 caractère </small>';
}

if(empty($classe)|| iconv_strlen($classe)<2 || iconv_strlen($classe)>30 ){//si la classe est au bon format
$classeError .='<small class="text-danger">**Saisisser une classe entre 2 et 30 caractère </small>';
}

if(empty($responsable_legal)|| iconv_strlen($responsable_legal)<2 || iconv_strlen($responsable_legal)>30 ){//si le responsable_legale est au bon format
$responsableError .='<small class="text-danger">**Saisisser un nom/prenom entre 2 et 30 caractère </small>';
}

if(!preg_match('#^[0-9]{10}+$#',$telephone)){//si le telephone est au bon format
$telError .='<small class="text-danger">**Saisisser un numero de telephone valide </small>'; 
}

if(empty($nomError)&&empty($prenomError)&&empty($classeError)&&empty($responsableError)&&empty($telError)){// j'insert si il n'y a aucun message d'erreur "remplis" (elles ont ete determinée plus tot mais vide)
     $insert->execute(); 
    echo"<div class='col-md-4 offset-md-4 alert alert-success text-center text-dark'>eleve bien enrengistré !</div>";
}





}//fin du if(post)  */










?>
<!-- ---------------------------------------------------- -->


<hr class="col-md-4">
<form method="post">

<div class="form-row">
 
<div class="form-group offset-md-4 col-md-2">
    <?= $nomError; ?>
    <input type="text" class="form-control" placeholder="nom" name="nom">
  </div>
   <div class="form-group col-md-2">
  <?= $prenomError; ?>
    <input type="text" class="form-control"  placeholder="prenom" name="prenom">
  </div>
 </div>


 
<div class="form-group offset-md-4 col-md-4">
      <?= $classeError; ?>
    <input type="text" class="form-control" placeholder="classe"name="classe">
  </div>

   <div class="form-group offset-md-4 col-md-4">
    <?= $responsableError; ?>
    <input type="text" class="form-control"  placeholder="responsable legal"name="responsable_legal">
  </div>



<div class="form-row">
 
<div class="form-group offset-md-4 col-md-4">
    <?= $telError ;?>
    <input type="text" class="form-control" placeholder="telephone"name="telephone">
  </div>
 </div>

 <button class="col-md-4 offset-md-4 btn btn-primary" type="submit" name="valider" >valider</button>
</form>
<hr class="col-md-4">
</div>


<?php
// if(isset($_POST['valider'])){
//     echo'<pre>';print_r($_POST);echo'</pre>';
    
//     if(isset($nom)&&isset($prenom)&&isset($classe)&&isset($responsable_legal)&&isset($telephone)){ //si les champ sont remplies : 
    
//     if(preg_match('#^[0-9]{10}+$#',$_POST['telephone'])&&iconv_strlen($nom)>2 &&iconv_strlen($nom)<30 &&iconv_strlen($prenom)>2 &&iconv_strlen($prenom)<30 &&iconv_strlen($classe)>2 &&iconv_strlen($classe)<30&&iconv_strlen($responsable_legal)>2 &&iconv_strlen($responsable_legal)<30)//verif telephone et taille des champe text
//     {
        
//         foreach($_POST as $key => $value){  if($key != 'valider')
//                {
//             $insert->bindValue(":$key",$value,PDO::PARAM_STR);
//         }}//fin foreach et du if($key != 'valider')
    
//     $insert->execute(); 

//     echo"<div class='col-md-4 offset-md-4 alert alert-success text-center text-dark'>eleve bien enrengistré !</div>";
            
//             } //verif telephone et taille des textes
//     else{
            
//                echo"<div class='col-md-4 offset-md-4 alert alert-danger text-center text-dark'>informations erronée !</div>";
                 
//             }//fin du else
//         }//fin verification de champ replis 

// }//fin du if(post)  
?>
<!-- fonctionne aussi ; mais pas aussi precis -->
<!-- --------------------------------CORRECTION----------------------------------------------------------------------------------------------------------------------------- -->

<!-- la correction est placer au dessu du formulaire car il contient des variables qui sont defini dans les condition -->
<!-- 1 on controle les champs du formulaire
    2.  on controle la validiter des champs
    3. si aucun message d'erreur d'affiche alors :
                on se connect a la base de donnée
                on 'prepar' l'insertion dans la BDD
                on execut l'insertion
                 -->
<!-- ----------------------------------------------------------------------------------------------------------- -->

<div class="offset-md-2 col-md-8 ">3 - affichez toutes les informations contenu dans la BDD ELEVE sur la meme page que le formulaire</div><hr>



<?php
$resultat = $bdd -> query("SELECT * FROM eleve");

$eleve = $resultat->fetchall(PDO::FETCH_ASSOC);
//echo '<pre>' ; print_r($gens); echo'</pre>';

?>
<table class="table">
    
<?php foreach($eleve['0'] as $titres => $objettab):?>
<th> <?= $titres?></th>  
<?php endforeach;?>


<?php foreach($eleve as $gens => $valeurs):?>
<tr>
    <?php foreach($valeurs as $malheures => $key):?>
        <td><?=$key?> </td>


<?php endforeach;?>

</tr>

<?php endforeach;?>

</table>













</body>
</html>