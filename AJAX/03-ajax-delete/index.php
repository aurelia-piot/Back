
<?php
require_once('init.php');
extract($_POST);

?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T"
        crossorigin="anonymous">
<!-- lien bootstrap -->
    <script src="https://code.jquery.com/jquery-3.4.1.min.js" integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo="
        crossorigin="anonymous"></script>
       <!-- Lien jquery -->
<script src="ajax3.js"></script>
<!-- lien fichier js -->

    <title>03 AJAX delete</title>
</head>
<body>

    <div class="container">
    <h1 class="display-4 text-center ">03 AJAX Delete  |  Supprimer un employé</h1> <hr>
        
<div id="reponse"></div>
<!-- cette div reception le message de validation apres la suppression -->

    <form action="" methode='post' class="col-md-6 offset-md-3 text-center">
<div class="form-group">
        <div id="employes">
        <!-- cette div sert a remplacer le selecteur initial par le selecteur mis a jour, c'est a dire sans l'employé supprimé, tout cela en instantané -->
<?php
        //realiser un selecteur avec tous les nom des employes
$select = $bdd->query("SELECT * FROM employes");

// echo '<pre>' ; print_r($selectemployes); echo'</pre>'; 
?>

<div class="form-group">

    <select class="form-control form-control-lg" id="personne" name="personne">
       <?php while($employes = $select -> fetch(PDO::FETCH_ASSOC)): ?>  
             <option value="<?=$employes['id_employes']?>" ><?=$employes['prenom']?></option>
       <?php endwhile;?>         
     </select> 








        </div><!-- fin div form-group -->
        
        </div><!-- fin div #employes -->


        <input type="submit" value="supprimer" id='submit' class="col-md-6 offset-md-3 btn btn-dark" >

</div>

       </form>
    </div><!-- fin div container -->









<?php




//$tab =array();
// resquete test : $result = $bdd->query("INSERT INTO employes (prenom) VALUES ('$Peter')");

/*if(!empty($employes))
{
$result = $bdd->query("DELETE FROM employes WHERE personne = $employes ");
$tab['resultat']="<div class='col-md-6 offset-md-3 alert alert-success text-center'>L'employé <strong>$employes</strong> a bien été viré</div>";
}
else{
    $tab['resultat']="<div class='col-md-6 offset-md-3 alert alert-danger text-center'>merci de saisir un prenom</div>";
}

//pour pouvoir faire vehiculer des données en HTTP via une requete AJAX, nous devons encoder les données en JSON, c'est un format leger, C'est la reponse de la requete 'retour' AJAX que l'on retrouve dans function(data) dans le fichier ajax2.js
echo json_encode($tab);
*/

?>

 






</body>
</html>