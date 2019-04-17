<?php
require_once("include/init.php");//connexion a la bdd

extract($_POST);

if(internauteEstConnecte()){header("Location: profil.php");}

if(isset($_GET['action']) && $_GET['action'] == 'deconnexion'){session_destroy();}//si on recupere dans l'url l'action "deconnexion", alors la session est supprimer(dans le dossier Tmp)
//si l'indice 'action' est definit dans l'URL et qu'il a comme valeur 'deconnexion',cela veut dire que l'on a cliqué sur le lien 'deconnexion', ducoup on supprime le fichier session






if(isset($_GET['action'])&& $_GET['action'] == 'validate')
{
    $validate .="<div class='col-md-6 offset-md-3 alert alert-success text-center text-dark'>Félicitations !! Vous etes inscrit sur le site . Vous pouvez dés a present vous connecter!!</div>";
}

if($_POST)
{
    // on selectionne tout dans la table 'membre' a condition que la colonne pseudo ou email de la BDD soit bien egale au pseudo ou email saisie dans les formulaire
    $verif_pseudo_email = $bdd->prepare("SELECT * FROM membre WHERE pseudo = :pseudo OR email = :email");

    $verif_pseudo_email -> bindValue(':pseudo',$email_pseudo,PDO::PARAM_STR);
    $verif_pseudo_email -> bindValue(':email',$email_pseudo,PDO::PARAM_STR);

    $verif_pseudo_email-> execute();


    //Si le resultat de la requete de selection est superieur a 0, cela veut dire que l'internaute a saisie un email ou un pseudo valide, donc on entre dans la condition IF
    if($verif_pseudo_email-> rowCount()>0)
        {
            //$success="<div class='col-md-4 offset-md-4 alert alert-success text-center text-dark'> pseudo / email <strong>". $email_pseudo."</strong> valide</div>" ;
            $membre = $verif_pseudo_email->fetch(PDO::FETCH_ASSOC);// on recupere les donnée en BDD de l'internaute qui a saisie le bon pseudo ou le bon email , on va pouvoir comparer les mot de passes
            echo '<pre>' ; echo print_r($membre); echo '</pre>';



            //si le mot de passe de la bdd est egal au mot de passe que l'internaute a saisi dans le formulaire, on entre dans le IF
//if(password_verify($mdp,$membre['mdp'])){// si on hache le mot de passe a l'inscription (password_hash) / password_verify permet de comparer une clef de hashage à une chaine de caracteres}
            if($membre['mdp']==$mdp) // verification du mot de passes 
                // on entre dans ce IF  seulement dans le cas où l'internaute a saisie le bon email/pseudo ET le bon mdp
                {
                    //echo 'mot de passe valide';
                    //on passe en revue  les données de l'internaute qui a saisie le bon email/pseudo et le bon mdp
                    foreach($membre as $key => $value)
                        {
                            //on exclu le mdp
                            if($key !='mdp') //si l'indice est different de mot de passe alors :
                                {
                                    $_SESSION['membre'][$key]= $value; // pour chaque tour de boucle foreach, on enrengistre les donnéees de l'internaute dans son fichier session
                                }
                        }
                        //echo '<pre>' ; echo print_r($_SESSION); echo '</pre>';
                        header("Location: profil.php"); // apres enregistrement des données de l'internaute dans son fichier session, on le redirige vers sa page profil
                }


            else{   //on entre dasn le ELSE dans le cas ou l'internaute n'a pas saisie le bon mot passe 
                    echo 'mot de passe erreur';
                    echo"<div class='col-md-4 offset-md-4 alert alert-danger text-center text-dark'> mot de passe non valide </div>";
                }    



        }
    else   //on entre dans le ELSE si l'internaut n'a pas saisie d'email ou de pseudo valide
        {
            $error .="<div class='col-md-4 offset-md-4 alert alert-danger text-center text-dark'>erreur pseudo / email <strong>". $email_pseudo."</strong> est inconnu en BDD</div>";
        }    

}

require_once("include/header.php");
?>

<h1 class="display-4 text-center">CONNEXION</h1><hr>

<?= $validate ?>



<?= $validate ?>

<!-- 1. REaliser un formulaire de connexion avec les champs suivants : email ou pseudo / mot de passe / btn submit
     2. Controler en PHP que l'on receptionne bien toute les données du formulaire -->

<?php //echo '<pre>' ; echo print_r($_POST); echo '</pre>' ?> 
<?=$error ?>

<form method="post">


  <div class="form-group col-md-6 mx-auto text-center">
    <label for="email">Email ou pseudo</label>
    <input type="text" class="form-control" id="email" aria-describedby="email" placeholder="email ou pseudo" name='email_pseudo'>
    </div>



  <div class="form-group col-md-6 mx-auto text-center">
    <label for="Password">Password</label>
    <input type="text" class="form-control" id="Password" placeholder="Password" name="mdp">
  </div>


  <button type="submit" class="btn btn-primary offset-md-3 col-md-6 ">connexion</button>
</form>





<?php
require_once("include/footer.php");
?>