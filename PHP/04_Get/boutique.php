<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <title>Boutique</title>
</head>
<body>

    <div class="container text-center">
    
    <h1 class="display-4 text-center">Bienvenue dans notre boutique !</h1><hr>

    <!--  le ? permet de delimiter les argument et l'url de destination, puis un indice = une valeur ajouter avec le signe & -->

<div class="col-md-2 offset-md-5 border border-dark">
<img src="img/t-shirt-rouge-mixte-homme-femme-sc221-100-coton-c.jpg" width='50%' alt=""> <br> 
<!-- test avec image -->
    <a href="fiche_produit.php?id=1&type=tshirt&couleur=rouge&prix=15" target='blank'>voir le detail du  produit 1</a> <br>
</div>



    <a href="fiche_produit.php?id=2&type=pull&couleur=marron&prix=30" target='blank'>voir le detail du  produit 2</a> <br>
    <a href="fiche_produit.php?id=3&type=pantalon&couleur=noir&prix=40" target='blank'>voir le detail du  produit 3</a> <br>
    <a href="fiche_produit.php?id=4&type=sweet&couleur=vert&prix=45" target='blank'>voir le detail du  produit 4</a> <br>
    <a href="fiche_produit.php?id=5&type=chaussure&couleur=beige&prix=50" target='blank'>voir le detail du  produit 5</a> <br>
    <a href="fiche_produit.php?id=6&type=vest&couleur=blue&prix=55" target='blank'>voir le detail du  produit 6</a> <br>
    
    </div>
    
</body>
</html>