<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <title>formulaire 5</title>
</head>
<body>
    
<!-- 1 . Realiser un formulaire avec les champs suivant : objet, email , message et un btn submit -->
<!-- 2. Controler en PHP que l'on receptionne bien toute les données du formulaire -->


<?php

echo '<pre>';print_r($_POST);echo'</pre>';

//on verifie si on a bien cliqué sur le bouton submit qui a pour attribut name 'submit' , si nous avions plusieurs formulaire sur la meme page , la condition permet de differencier quel formulaire a ete valider
if(isset($_POST['submit']))
{

//1er argument
$destinataire = "aureliapiot@hotmail.fr";


// 2eme argument
$sujet= $_POST['objet'];


//3eme argument
$message = $_POST['message'];



//4eme argument

//c' est un standard internet qui étend le format de données des courriels pour supporter des textes en différents codage des caractères autres que l'ASCII, des contenus non textuels, des contenus multiples, et des informations d'en-tête en d'autres codages que l'ASCII.
$entetes = "MIME-Version 1.0\n";

//entetes exepediteur , Toujours "From"(et non "de" par exemple) et pas autres choses
$entetes .= "From:$_POST[email]\n"; // lorsque l'on est entre dbl quote , on a pas besoin des simples quote dans les crochets
//entetes addresse de retour /destinataire
$entetes .= "Reply-to: aureliapiot@hotmail.fr\n"; 

//priorité urgente
$entetes .= "X-priority: 1\n"; 

//type de contenu html
$entetes .= "content-type: text/html; charset=utf-8\n"; 




mail($destinataire,$sujet,$message,$entetes);         //fonction predefinie permettent l'envoi de l'email / toujour 4 argument ; destinataire /sujet/ message / expediteur.
                //l'ordre est crucial sinon le test ne fonctionne pas


}


?>

<h1 class="text-center">Formulaire de Contact</h1>
<hr>

<div class="container">

<form method="post" class='col-md-4 offset-md-4 text-center'>
  <div class="form-group">
    <label for="Email">Email</label>
    <input type="text" class="form-control" id="Email" aria-describedby="email" placeholder="email" name="email">
   </div>
  <div class="form-group">
    <label for="objet">Objet</label>
    <input type="text" class="form-control" id="objet" placeholder="objet" name="objet">
  </div>
  <div class="form-group">
    <label for="message">message</label>
    <textarea class="form-control" id="message" rows="3" name="message"></textarea>
  </div>
  <button type="submit" class="btn btn-primary" name="submit">Submit</button>
</form>




</div>



</body>
</html>