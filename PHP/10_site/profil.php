<?php
require_once('include/init.php');

if(!internauteEstConnecte()){header("Location: connexion.php");}//si l'internaute n'est pas connecter, il na rien a faire su la page profil, on le redirige vers la page connexion

require_once('include/header.php');
//echo '<pre>' ; echo print_r($_SESSION); echo '</pre>';
$pseudo = $_SESSION['membre']['pseudo'];
?>


<h1 class="display-4 text-center">Bonjour <strong class="text-info"> <?= $pseudo?></strong></h1><hr>

<!-- Realiser une page profil en affichant toutes les données des l'internautes contenu dans la session sauf l'id_membre et le satut -->


<table class="col-md-6 mx-auto table table-dark text-center">
<!-- le ":" et le endif /endforeach remplace les accolades {} -->

<?php foreach( $_SESSION['membre'] as $key => $value):?>
 <tr>                  
  <?php if($key !='id_membre' && $key != 'statut'):?> 

     <th><?= $key ?></th> <td><?= $value ?></td>
  <?php endif;?>
 </tr>
<?php endforeach;?>

</table><hr>

<?php
// si le champ statut dans la session, donc dans la BDD est a 1 cela veut dire que l'on est administrateur du site , on tombe dans le ESLE si le statut est a 0, on est donc membre classique du site
if($_SESSION['membre']['statut']==1){$statut = "ADMIN";}
else {$statut = "MEMBRE";}
?>

<h3 class="text-center">Vous êtes <strong class="text-info"><?= $statut?></strong> du site</h3>

<?php
require_once('include/footer.php');
?>