<!-- Exercice 2 : AJAX

    - Créer une page HTML avec un bouton afficher (ce bouton ne recharge pas la page)

    - En ajax (JS + PHP), au click sur le bouton, récupérer et afficher sous la forme d'un tableau HTML les infos des produits de la boutique (BDD : site_commerce)

    

    - si tout est terminé, ajouter un formulaire pour ajouter un produit (en AJAX) -->
<?php

$bdd = new PDO('mysql:host=localhost;dbname=entreprise','root','',array(PDO::ATTR_ERRMODE => PDO :: ERRMODE_WARNING, PDO::MYSQL_ATTR_INIT_COMMAND =>'SET NAMES utf8'));



// <!-- ------------------------------------------    INIT         ---------------------------------------------------------- -->

extract($_POST);
$tab =array();



//-------------------requet de selection


$select = $bdd->query("SELECT * FROM employes WHERE prenom = '$prenom'");


//-------DEclaration du tableau (requet retour AJAX





//echo '<pre>' ; print_r($selectemployes); echo'</pre>';






$tab["table"]= "<table class='table table-bordered table-dark'>";
$tab["table"].="<tr>";

for($i = 0 ; $i < $select->columnCount();$i++)
{
    $colonne = $select->getColumnMeta($i);
$tab["table"].=  "<th>$colonne[name]</th>"; // ici on recupere les entetes du tableaux
}


$tab["table"].=" </tr><tr>";
$employes = $select->fetch(PDO::FETCH_ASSOC);
foreach($employes as $value)
{$tab["table"].="<td>$value</td>";}
$tab["table"].="</tr></table>";



echo json_encode($tab);
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
    <title>exo AJAX</title>
</head>
<body>
    



<div id="personne"class="col-md-4 offset-md-4 border text-center alert" >Julien</div>
        <div id="resultat"></div><!-- div qui receptionne le tableau -->

<div id="resultat"></div>

<button type="submit" id="submit" class="btn btn-dark text-center col-md-4 offset-md-4">charger fichier txt</button>





<script>
    $(document).ready(function(){
    //on selectionne le bouton submit auquel on associes l'evenement 'click'

//event represente l'enement click
    $('#submit').onclick(function(event){
        event.preventDefault();//preventDefault() |  fonction predefinie |  permet d'annuler le comportement du bouton submit qui a pour rolede recharger la code de la page
        ajax(); //fonction utilisateur executée ci-dessous
    });

        var $prenom = $("#personne").text();//on recupere le contenu de la div qui sera envoye comme parametre a la requete AJAX aller
            console.log($prenom);



        var parameters = "prenom="+$prenom;// on definit les parametre à envoyer a la requete AJAX "Aller" qui sera transmit à la requete 
            console.log(parameters);

        /*
        post: methode JQuery permettant d'envoyer des requetes Ajax en http
        argument:
            1. L'url/fichier de destination des requete AJAX
            2. Les parametres envoyés avec la requete AJAX 'aller'
            3.EN cas de succées on receptionne le resultat de la requete AJAX 'retour'(on peut en accumuler plusieurs)
            4.Type de transport de données 'JSon'


        */



        $.post("exo_ajax.php", parameters, function(data){
            $("#resultat").html(data.table);//on selectionne la div id "resultat" pour y integrer notre tableau($stab['table']) definit dans la page ajax4.php
        },'json'); 

   

});










</script>









</body>
</html>