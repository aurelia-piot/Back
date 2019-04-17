<?php

//  echo "<pre>";

//  var_dump($_GET);

// echo "</pre>";

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css" integrity="sha384-50oBUHEmvpQ+1lW4y57PTFmhCaXp0ML5d60M1M7uH2+nqUivzIebhndOJK28anvf" crossorigin="anonymous">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Srisakdi">
    <link rel="stylesheet" href="css/style.css">
    <title>Tp au Pois Grourmand</title>
</head>
<body>
    <!-- a href ="?action=click"  info envoyer dans l'url-->
<!-- < ? php 
                if(empty($_GET))
                {?>

                    <div="bleu"></div>
     < ? php 
                }else { ? >
                    <div id="vert"></div>

               < ? php  } ?>

                 -->

<!-- --------------------------------------------- -->
 <?php
//   if(empty($_GET)){

// }
 
// if($_GET){
    
// foreach($_GET as $key => $value){
//      echo "<strong>$key</strong>: $value <br>";



     
//       if( $value=== "menu1"){
//           echo "<div class='col-md-6 offset-md-3 alert-info alert'> ok</div>";
//          }
//       if( $value=== "menu2"){ 
// echo "<div class='col-md-6 offset-md-3 alert-danger alert'> ok</div>";
//          }
//       if( $value=== "menu3"){ 
// echo "<div class='col-md-6 offset-md-3 alert-warning alert'> ok</div>";
//          }
//       if( $value==="menu4"){ 
// echo "<div class='col-md-6 offset-md-3 alert-success alert'> ok</div>";
//          }




        
//  }}
    ?>




 






<div class="fond">

    <h1> <i class="fas fa-kiwi-bird"></i> Au Pois Gourmand</h1>

<?php if(empty($_GET)){ ?>
<!-- ------------------------------------------------------ -->
    <div class="menu">

        <div class="m1">
            <!-- <div class="img1"></div> -->
            <img  src="img/rome.jpg" alt="menu rome" class="img1">
            <h2>Formule Rome</h2>
            <p>Tomates buratina</p>
            <p>Rizotto aux asperges</p>
            <p>Panna cotta</p>

          <a    class="btn btn-info" href="?menu=rome&prix=25&img=img/rome.jpg">Choisir</a> 
        </div>

        <div class="m1">
            <!-- <div class="img2"></div> -->
            <img src="img/nyork.jpg" alt="menu nyork" class="img1">
            <h2>Formule New-York</h2>
            <p>césar salade</p>
            <p>Cheese burger</p>
            <p>cheesecake</p>

            <a  class="btn btn-danger" href="?menu=newyork&prix=23&img=img/nyork.jpg">Choisir</a>
        </div>

        <div class="m1">
            <!-- <div class="img3"></div> -->
            <img src="img/delhi.jpg" alt="menu delhi" class="img1">
            <h2>Formule Delhi</h2>
            <p>Poppadoms</p>
            <p>Agneau byriani</p>
            <p>Lassi mangue</p>

            <a  class="btn btn-warning" href="?menu=delhi&prix=24&img=img/delhi.jpg">Choisir</a>
        </div>

        <div class="m1">
            <!-- <div class="img4"></div> -->
            <img src="img/hanoi.jpg" alt="menu hanois" class="img1">
            <h2>Formule hanoi</h2>
            <p>Nems aux crevettes</p>
            <p>Poulet saté</p>
            <p>Perles de coco</p>

            <a class="btn btn-success" href="?menu=hanoi&prix=28&img=img/hanoi.jpg">Choisir</a>
        </div>


    </div>
<!-- ------------------------------------------------- -->
<?php
    // $menu = $_GET[""];
//$menu1= "menu1";
    //  $formule= "Rome";$prix="25";
// $formule= "Rome";
// $prix="25"

// $formule="New York"
// $prix="23"

// $formule="Delhi"
// $prix="24"

// $formule="hanoi"
// $prix="28"



// voir pour determiner les cas


}



//     foreach($_GET as $key => $value){

//         // verification de la bonne reception des info
        
//     //     echo "<strong>$key</strong>: $value <br>";
//     //     $menu = $value ;
//     //  echo " $formule  $prix ";



//      if( $value === $formule){
          //echo "<div class='col-md-6 offset-md-3 alert-info alert'> ok</div>";
            else{
                  
$img=$_GET['img'];
$formule=$_GET['menu'];
$prix=$_GET['prix'];
?> 

<div class="commande ">
    <h1 class="titrecom">Merci pour votre commande !</h1>
    <div class="row contenu">
    <!-- <div class="comimg1 col-md-3"> -->
        <img src=<?= $img ?> class="comimg1 col-md-3">
    <!-- </div>  -->
    <div class="col-md-7 offset-md-1">
        <h3 class="titrecom2">Votre formule <?=$formule?> arrive dans quelque instants...<i class="fas fa-kiwi-bird"></i></h3>
        <p>Nous vous souhaitons une bonne dégustation.</p>
        <p>Un café gourmand vous est proposé pour terminer votre pause gourmande en douceur.</p>
        <small><p class="facture">- Votre facture sera de <?=$prix?> €</p></small>
        <a  class="btnmenu btn btn-success" href="?">choisir un autre menu</a> 
    </div></div>

</div>
<div class="aimezvous">
    <small><p class="textavis">- vous avez aimé ? <i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i><i class="far fa-star"></i></p></small>
<div class="img5"></div>
</div>

<?php     }
//}} ?> 




    <h3><i class="fas fa-kiwi-bird"></i>..... <i class="fas fa-kiwi-bird"></i>.... <i class="fas fa-kiwi-bird"></i>... <i class="fas fa-kiwi-bird"></i>.. <i class="fas fa-kiwi-bird"></i>. Au Pois Gourmand</h3>


</div>



</body>
</html>