<?php
require_once("include/init.php");//connexion a la bdd
if(internauteEstConnecte()){header("Location: profil.php");}

if($_POST){ //si on valide le formulaire, on entre dans le if
extract($_POST); //mtn --> $_POST['pseudo] = $pseudo


//on place en general le php en haut e la page (car le code est lu de haut en bas) mieux vaux privilegier le Back avant le Front

//    echo '<pre>' ; print_r($_POST); echo'</pre>';   
//       echo '<hr>'  ;
//-------------------------
// $error="";
// if($_POST['mdp'] != $_POST['mdp2'])
//                 {
//                 $error.="<div class='col-md-4 offset-md-4 alert alert-danger text-center text-dark'>les mots de passes ne sont pas identiques !</div>";
//                 }
// echo $error;                
// 
//---------------------------
/*

*/
$verif_pseudo = $bdd->prepare("SELECT * FROM membre WHERE pseudo = :pseudo");
$verif_pseudo->bindValue(':pseudo',$pseudo,PDO::PARAM_STR);
$verif_pseudo->execute();



//si le resultat de la requete est supperieur a 0, cela veut dire qu'un pseudo est bien existant en BDD, alors on affiche un message d'erreur
if($verif_pseudo->rowCount()>0)
{
 $error.="<div class='col-md-6 offset-md-3 alert alert-danger text-center text-dark'>Pseudo - <strong>$pseudo</strong>- est deja pris</div>";
}

 if($mdp != $mdp2)
                 {
                 $error.="<div class='col-md-4 offset-md-4 alert alert-danger text-center text-dark'>les mots de passes ne sont pas identiques !</div>";
                 }



if(!$error){//si la variable $erreur est vide alors c'est que aucune erreur n'a ete enregistrer, c'est donc que le formulaire est correct
    echo "<div class='col-md-4 offset-md-4 alert alert-success text-center text-dark'>données accepter</div>";
     $data_insert = $bdd ->prepare("INSERT INTO membre ( pseudo, mdp,nom,prenom,email, civilite,ville ,code_postal,addresse) VALUES (:pseudo,:mdp,:nom,:prenom,:email,:civilite,:ville,:code_postale,:addresse)");
   
   
 //   $_POST['mdp'] = password_hash($mdp, PASSWORD_DEFAULT);//on ne conserve jamais en claire les mot des passe dans  la BDD, password_hash permet de creer une clef de hachage
    




   
   foreach($_POST as $key => $value) // va creer des indice pour chaque detail du post
   {
       if($key != 'mdp2')
       {
            $data_insert->bindValue(":$key",$value,PDO::PARAM_STR);
            // tour 1  $data_insert->bindValue(":pseudo",'pseudo entree',PDO::PARAM_STR);
            // tour 2  $data_insert->bindValue(":mdp",'mdp entree',PDO::PARAM_STR);
       }
   }
   
   $data_insert->execute();
   header("Location:connexion.php?action=validate");//header est une fonction predefinie qui permet d'effectuer une redirection de page / URL
//attention aux espaces


}
echo $error; 

}
















require_once("include/header.php");
?>

<!-- 
1.Créer un formulaire HTML correspondant a la table membre de la bdd 'site'(sauf id_membre et statut), et ajouter le champ "confirmer mot de passe"
2. controler en php que l'on receptionne bien toute les données du formulaire ($_POST)
3. Controler la disponibilite du pseudo
4. Faites en sorte d'informer l'internaute si les mdp ne sont pas identiques
 -->

<div class="container col-md-8">
<form method='post' class='form1'>


    <div class="form-group">
  <input type="text" class="form-control" placeholder="pseudo" name="pseudo">
  </div>
  <div class="form-row">
<div class="form-group col-md-6">
      <input type="text" class="form-control" placeholder="nom" name="nom">
    </div>

 <div class="form-group col-md-6">
      <input type="text" class="form-control" placeholder="prenom" name="prenom">
    </div>
 </div>

<div class="form-group ">
  <input type="text" class="form-control" placeholder="email" name="email">
  </div>
  <div class="form-row">
 <div class="form-group col-md-6">
  <input type="text" class="form-control" placeholder="mot de passe" name="mdp">
  </div>
  </div>
  <div class="form-row">
 <div class="form-group col-md-6">
  <input type="text" class="form-control" placeholder="confirmer mot de passe" name="mdp2">
  </div>
  </div>
    <div class="form-row">
<div class="form-group col-md-2">
      <label for="inputState">Civilite</label>
      <select id="inputState" class="form-control" name="civilite">
        <option selected>choose</option>
        <option value="m">m</option>
        <option value="f">f</option>
        <option value="n">n</option>
      </select>
</div>
</div>
  <div class="form-row">
<div class="form-group col-md-4">
      <input type="text" class="form-control" placeholder="ville" name="ville">
    </div>

    <div class="form-group col-md-4">
      <input type="text" class="form-control" placeholder="code postale" name="code_postale">
    </div>

<div class="form-group col-md-4">
  <input type="text" class="form-control" placeholder="addresse" name="addresse">
  
 </div>

 </div>




  <button type="submit" class="btn btn-primary">Submit</button>
</form>

</div>









<?php
require_once("include/footer.php");
?>