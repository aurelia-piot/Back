
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
<script src="ajax4.js"></script>
<!-- lien fichier js -->

    <title>04 AJAX SELECT</title>
</head>
<body>

    <div class="container">
    <h1 class="display-4 text-center ">03 AJAX SELECT  |  Selectionner un employé</h1> <hr>
        <div id="personne"class="col-md-4 offset-md-4 border text-center alert" >Julien</div>
        <div id="resultat"></div><!-- div qui receptionne le tableau -->


</body>
</html>