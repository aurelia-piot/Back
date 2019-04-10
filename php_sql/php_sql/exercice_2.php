<!-- EXERCICE 1 : 

a- Créer un formulaire d'inscription (methode "POST") avec les champs :
=> Prenom
=> Nom
=> email
=> Adresse
=> cade postal
=> Genre (f/h)

b- Afficher dans un tableau PHP les valeurs saisies dans le formulaire.

c- Effectuer tous les contrôles des champs
-->

<!-- /***********************************************************************************************************************/ -->

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



<?php
  echo '<pre>' ; print_r($_POST); echo'</pre>';
            echo '<hr>'  ;
$error='';
 if($_POST){

          

            if(empty($_POST['nom']) || iconv_strlen($_POST['nom'] < 2))
                            {
                            $error.="<div class='col-md-4 offset-md-4 alert alert-danger text-center text-dark'>merci d'indiquer votre nom</div>";
                            }

            if(!isset($_POST['prenom'] || iconv_strlen($_POST['nom']) NOT BETWEEN 2 AND 10)
                            {
                            $error.="<div class='col-md-4 offset-md-4 alert alert-danger text-center text-dark'>merci d'indiquer votre prenom</div>";
                            }


            if(empty($_POST['email']) || !filter_var($_POST['email'],FILTER_VALIDATE_EMAIL))
                            {
                            $error.="<div class='col-md-4 offset-md-4 alert alert-danger text-center text-dark'>merci d'indiquer votre email valide</div>";
                            }

            if(empty($_POST['address']) || )
                            {
                            $error.="<div class='col-md-4 offset-md-4 alert alert-danger text-center text-dark'>merci d'indiquer votre address</div>";
                            }

            if(empty($_POST['zip'] ||))
                            {
                            $error.="<div class='col-md-4 offset-md-4 alert alert-danger text-center text-dark'>merci d'indiquer votre code postale</div>";
                            }

            if(empty($error))
                            {
                                echo"<div class='col-md-4 offset-md-4 alert alert-success text-center text-dark'>information pris en compte !</div>";
                            }
     echo $error;  

          foreach($_POST as $tab)
                          {
                            //on parcour la superglobale $_POST de type ARRAY avec une boucle foreach
                            echo '<div class ="col-md-3 offset-md-5 alert alert-info text-dark mx-auto text-center ">';
                            echo $tab;
                            echo '</div>'  ;
                          }
      }

echo '<hr>'  ;




?>







  <div class="container">
<form class ="col-md-6 offset-md-3" method="post" action="">


  <div class="form-group ">
    <label for="prenom">prenom</label>
    <input type="text" class="form-control" id="prenom" placeholder="prenom" name="prenom">

  </div>


  <div class="form-group ">
    <label for="nom">nom</label>
    <input type="text" class="form-control" id="nom" placeholder="nom" name="nom">
  </div>

<div class="form-group ">
    <label for="email">email</label>
    <input type="text" class="form-control" id="email" placeholder="email" name="email">
  </div>

  <div class="form-group ">
    <label for="address">address</label>
    <input type="text" class="form-control" id="address" placeholder="address" name="address">
  </div>

  <div class="form-group col-sm-4 my-1">
    <label for="zip">code postale</label>
    <input type="text" class="form-control" id="zip" placeholder="zip" name="zip">
  </div>

  <div class="form-group col-sm-3 my-1">
  <label for="Gender">Gender</label>
      <select id="Gender" class="form-control" name="Gender">
      <option>N</option>
      <option>F</option>
      <option>M</option>
      
    </select>


  <button type="submit" class="btn btn-primary m-sm-5">Submit</button>
</form>


</div>







</body>
</html>