<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <style>
    body{background:grey;}
    .container1{background:blue;height:200px;width:200px;  }a{color:white}
    .container2{background:green;height:200px;width:200px; }    
    .container3{background:red;height:200px;width:200px; }  
    .container4{background:yellow;height:200px;width:200px; }  
    .container5{background:white;height:200px;width:200px; }  
    </style>


    <title>Document</title>
</head>


<body>
<?php if(empty($_GET)){ ?>
<div class="container1">
<a href="exo2.php?couleur=vert" class="btn"> VERT </a></div>


<?php } elseif($_GET['couleur']=="vert"){   ?>

<div class="container2">
<a href="exo2.php?couleur=rouge" class="btn"> Rouge</a></div>




<?php }elseif($_GET['couleur']=="rouge"){?>

<div class="container3">
<a href="exo2.php?couleur=jaune" class="container2 btn">jaune</a></div>



<?php } elseif($_GET['couleur']=="jaune"){?>

<div class="container4">
<a href="exo2.php?couleur=all" class="container2 btn">tous</a></div>



<?php  }  elseif($_GET['couleur']=="all"){?>




<div class="container1">
<a href="exo2.php?couleur=vert" class="btn"> VERT </a></div>
<hr>
<div class="container2">
<a href="exo2.php?couleur=rouge" class="btn"> Rouge</a></div>
<hr>
<div class="container3">
<a href="exo2.php" class="container2 btn">BLEU</a></div>
<hr>
<div class="container4">
<a href="exo2.php?couleur=jaune" class="container2 btn">jaune</a></div>
<hr>
<div class="container5">
<a href="exo2.php?couleur=all" class="container2 btn">tous</a></div>
<hr>
<?php } ?>


<p>retoure a la base <a href="exo2.php" class="container2 btn">BLEU</a>  </p>
<a href="exo2.php?couleur=all" class="container2 btn">TOUS</a> 

</body>
</html>