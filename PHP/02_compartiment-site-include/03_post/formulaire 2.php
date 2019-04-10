<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    
    <title>FORM 2</title>
</head>
<body>

<!-- 1. realiser un formulaire HTML avec les champs suivants :
                pseudo , mdp, confirmer mdp, nom, prenom, genre, email, telephone, adresse, ville, code-postale et un btn submit
    2. controler en php que l'on receptionner bien toutes les données su formulaire
    3. faite en sorte d'informer l'internaute si le pseudo n'est pas compris entre 2 et 20 caracteres
    4. faite en sorte d'informer l'internaute si les mot de passe ne sont pas identiques
    5. faite en sorte d'informer l'internaute si l'email n'est pas au bont format (indice : fonction predefinfe filter_var) 
    6. faite en sorte d'informer l'internaute si le code postal n'est pas de type numerique (is_numeric) et si il est differents de 5 caracteres
    7. faite en sorte d'informer l'internaute si le champ nom est laissé vide
    8. faite en sorte d'informer l'internaute si le champ telephone n'est pas valide (expression reguliere -> fonction predefinie preg_match()    )
    9. faite en sorte d'informer l'internaute si il a correctement remplis le formulaire
    -->


<h1 class="display-4 text-center">Formulaire 2</h1><hr>

    <?php
     echo '<pre>' ; print_r($_POST); echo'</pre>';   
      echo '<hr>'  ;

$error='';

	if($_POST)
  //sans la condition IF, au premier chargement de la page, nous avons donc 2 erreure undefined, c'est du au fait que le formulaire n'a pas ete validé et donc les indices 'email" et "mdp" ne sont pas reconnu
  //si la condition IF est verifiée n si elle renvoi 'true', cela veut dire que l'on a soumit le formulaire et les indices  sont bien detectés 
      {
            if(iconv_strlen($_POST['pseudo']) < 2 || iconv_strlen($_POST['pseudo']) > 20)
                {
                 $error.="<div class='col-md-4 offset-md-4 alert alert-danger text-center text-dark'>le pseudo doit contenir entre 2 et 20 caractére !</div>";
                }
             //si la valeur du champ mdp est differente du champ mdp2 alors on rentre dans les accolades du IF
    
            if($_POST['mdp'] != $_POST['mdp2'])
                {
                $error.="<div class='col-md-4 offset-md-4 alert alert-danger text-center text-dark'>les mot de passe ne sont pas identiques !</div>";
                }
            //si le champ 'email' n'est pas (!) au bon format alors on rentre dans les accolades du IF
             if(!filter_var($_POST['email'], FILTER_VALIDATE_EMAIL))
                {
                    $error.="<div class='col-md-4 offset-md-4 alert alert-danger text-center text-dark'>l'email n'est pas valide !</div>";
                }
            //la taille du champ 'codepostale' est different de 5 caractere, ou si le champ n'est pas de type numerique, alors on entre dans les accolades du IF
            if(!is_numeric($_POST['codepostale']) || iconv_strlen($_POST['codepostale']) !== 5)
                {
                   $error.="<div class='col-md-4 offset-md-4 alert alert-danger text-center text-dark'>le code postal n'est pas valide !</div>";
                }
            //si le champ 'nom' est vide ,alors on entre dans les accolades du IF
            if(empty($_POST['nom']) )
                {
                   $error.= "<div class='col-md-4 offset-md-4 alert alert-danger text-center text-dark'>veuillez indiquer votre nom !</div>";
                }
                    // ['caractere accepter'] { nombre de caracter accepeter}
            if(!preg_match('#^[0-9]{10}+$#',$_POST['phone']))
            {
                $error.="<div class='col-md-4 offset-md-4 alert alert-danger text-center text-dark'>telephone non valide !</div>";
            }

/*preg_match() : une expression reguliere (regex) est toujours entourer de dieze afin de preciser les options
^ indique le debut de la chaine
$ indique la fin de la chaine
+ est là pour dire que les caractere peuvent etre utilisés plusieurs fois */

            //si ma variable qui recupere les message d'erreur est vide alors :
            if(empty($error))
             {
                echo"<div class='col-md-4 offset-md-4 alert alert-success text-center text-dark'>information pris en compte !</div>";
             }

           
/* on stock tout les messages d'erreurs dans la variable $error , si cette variable est vide, cela veut dire que nous somme entrer dans aucune condition IF et que donc l'internaute a bien rempli les champ controlés, on affiche donc un message de validation */

echo $error; //on fait un echo pour pouvoir afficher les messages d'erreures

      
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

<form class ="col-md-6 offset-md-3"  method="post">



 <div class="form-group">
    <label for="pseudo">pseudo</label>
    <input type="text" class="form-control" id="pseudo" placeholder="pseudo"name="pseudo" minlength="2" > 
    <small id="passwordHelpInline" class="text-muted" >Must be 2-20 characters long.</small>
  </div>

  <div class="form-row">

    <div class="form-group">
    <label for="inputnom">nom</label>
    <input type="text" class="form-control" id="inputnom" placeholder="nom"name="nom">
  </div>


 <div class="form-group">
    <label for="inputprenom">prenom</label>
    <input type="text" class="form-control" id="inputprenom" placeholder="prenom"name="prenom">
  </div>

     <div class="form-group col-md-4">
      <label for="inputState">genre</label>
      <select id="inputState" class="form-control" name="gender">
        <option selected>neutral</option>
        <option>female</option>
        <option>male</option>
      </select>
    </div>

</div>
<div class="form-row">
    <div class="form-group col-md-6">
      <label for="inputEmail4">Email</label>
      <input type="text" class="form-control" id="inputEmail4" placeholder="Email" name="email">
    </div>
</div>




<hr>
<div class="form-row">
    <div class="form-group  col-md-6">
      <label for="inputPassword4">mot de passe</label>
      <input type="text" class="form-control" id="inputPassword4" placeholder="Password"name="mdp"minlength="2" maxlength="20">
         <small id="passwordHelpInline" class="text-muted" >Must be 2-20 characters long.</small>
    </div>
</div>

<div class="form-row">
    <div class="form-group col-md-6 ">
      <label for="inputPassword5">confirmer votre mot de passe</label>
      <input type="text" class="form-control" id="inputPassword5" placeholder="Password"name="mdp2">
    </div>
    
</div>
<hr>  
 <div class="form-row">

  <div class="form-group">
<label for="phone">Enter your phone number:</label>
<input type="tel" id="phone"  name="phone">
  </div>


  </div>
 
 
 <div class="form-row">
 
  <div class="form-group">
    <label for="inputAddress">Address</label>
    <input type="text" class="form-control" id="inputAddress" placeholder="..."name="adresse">
  </div>
  </div>



  <div class="form-row">
    
    <div class="form-group col-md-6">
      <label for="inputCity">City</label>
      <input type="text" class="form-control" id="inputCity"name="ville">
    </div>
    
      <div class="form-group col-md-2">
      <label for="inputZip">code postale</label>
      <input type="text" class="form-control" id="inputZip"name="codepostale">
    </div>
  </div>

  </div>


  <button type="submit" class="btn btn-primary">Submit</button>
</form>
    
</body>
</html>