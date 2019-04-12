<?php
require_once("include/init.php");//connexion a la bdd

if(isset($_GET['action'])&& $_GET['action'] == 'validate')
{
    $validate .="<div class='col-md-6 offset-md-3 alert alert-success text-center text-dark'>Félicitations !! Vous etes inscrit sur le site . Vous pouvez dés a present vous connecter!!</div>";
}

require_once("include/header.php");
?>

<h1 class="display-4 text-center">CONNEXION</h1><hr>

<?= $validate ?>


<?php
require_once("include/footer.php");
?>