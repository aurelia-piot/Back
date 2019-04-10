<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <title>Formulaire Fruits PHP</title>
</head>
<body>
    

<!-- 
    1. Realiser un formulaire Html permettant de selectionner un fruit (liste deroulante) et de saisire un poids (champ input)

    2. Traitement permettant d'afficher le prix en passant par la fonction declarer 'calcul'

    3. Faire en sorte de garder le dernier fruit selectionné et le dernier poids saisie dans le formulaire lorsque celui ce est validé

 -->


<div class="container text-center">
    <h1 class="text-center">Formulaire Fruit</h1>

    <form action="" method="post">
     <div class="form-group">
    <label for="fruit">Fruits</label>
    <select class="custom-select custom-select-lg mb-3"id="fruit" name="fruit">


    <!-- SI un fruit a bien ete selectionné et que ce fruit est egal à 'cerise', alors on affiche selected dans la balise option -->
  <option value="pommes" <?php if (isset($_POST['fruit'])&& $_POST['fruit']==='pommes') echo 'selected'?>>pommes</option>
  <option value="bananes"<?php if (isset($_POST['fruit'])&& $_POST['fruit']==='bananes') echo 'selected'?>>bananes</option>
  <option value="peches"<?php if (isset($_POST['fruit'])&& $_POST['fruit']==='peches') echo 'selected'?>>peches</option>
  <option value="cerises"<?php if (isset($_POST['fruit'])&& $_POST['fruit']==='cerise') echo 'selected'?>>cerises</option>
</select>
    </div>
    <div class="form-group">
    <label for="poids">Poids</label>
    <input type="text" class="form-control" id="poids" name="poids" placeholder="entrer le poids " value="<?php if (isset($_POST['poids'])) echo $_POST['poids']?>">
    <!-- si l'indice poids est bien definit cela veut dire  que nous avons validé un formulaire et saisie un poids, alors on l'affiche dans le champ -->
    
    </div>
    <button type="submit" class="col-md-12 btn btn-dark mb-4">Calcul</button>
    
    </form>

<?php
echo'<pre>';print_r($_POST);'</pre>';

include 'fonction.php';
if($_POST) // si je valide le formulaire
{
echo calcul($_POST['fruit'],$_POST['poids']) .'gr<hr>' ;
// on transmet les les données saisie dans le formulaire a la fonction calcule grace a la methode $_POST
}

?>

</div>

</body>
</html>