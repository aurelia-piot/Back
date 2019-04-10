<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
     <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <title>Form3</title>
</head>
<body>
    

<!-- realiser un formulaire html (pseudo, email) en recuperant les données directement sur la page formulaire4.php -->
<h1 class='display-4 text-center'>Formulaire 3</h1>
    
<form class ="col-md-6 offset-md-3" method="post" action="../post/formulaire4.php">
<!-- methode : comment vont circuler les données || la mthode post permet de recupere les info saisie || ne pas utiliser la methode Get -->
  <!-- action : url de destination -->
  

  <div class="form-group">
    <label for="pseudo">pseudo</label>
    <input type="tex" class="form-control" id="pseudo" placeholder="pseudo" name="pseudo">
  </div>

   <div class="form-group">
    <label for="exampleInputEmail1">Email</label>
    <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter email" name="email">
    </div>

  <button type="submit" class="btn btn-dark">Submit</button>
</form>

</body>
</html>