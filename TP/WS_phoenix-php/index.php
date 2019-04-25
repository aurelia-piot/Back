<?php
include_once("init.php");
extract($_GET);
?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css" integrity="sha384-50oBUHEmvpQ+1lW4y57PTFmhCaXp0ML5d60M1M7uH2+nqUivzIebhndOJK28anvf" crossorigin="anonymous">
    <link rel="stylesheet" href="css/style.css">
    <title>WP pheonix</title>
</head>
<body>

 <header >
  <nav class=" navbar navbar-expand-md navbar-dark fixed-top <?php if($_GET['action']=='choisirmonsejour'){echo'nav2'; }?> " >
    <a class="navbar-brand text-dark" href="http://localhost/Back/TP/WS_phoenix-php"><i class="fab fa-phoenix-framework"></i></a>
    <div class="collapse navbar-collapse" id="navbarCollapse">
      <ul class="navbar-nav mr-auto">
        <li class="nav-item active">
          <a class="nav-link text-dark text-center" href="http://localhost/Back/TP/WS_phoenix-php">Phoenix</a>
        </li>
        <li class="nav-item">
          <a class="nav-link text-dark" href="?action=choisirmonsejour">Choisir une desination</a>
        </li>
        <li class="nav-item">
          <a class="nav-link disabled text-dark" href="?action=payer">Payer</a>
        </li>
      </ul>
  
    </div>
  </nav>
</header>

<!-- ----------------------------------------------------------------------------------- -->




<!-- ----------------------------CAROUSEL---------------------------------------------- -->



<div id="myCarousel" class="carousel slide <?php if(isset($_GET['action'])||($_GET['reservation'])){ echo "offset-md-2 col-md-8 margintop";} ?>" data-ride="carousel">
    <ol class="carousel-indicators">
      <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
      <li data-target="#myCarousel" data-slide-to="1"></li>
      <li data-target="#myCarousel" data-slide-to="2"></li>
    </ol>
    <div class="carousel-inner">
      <div class="carousel-item active">
        <img  <?php if(!isset($_GET['action'])){ echo'width="100%" height="650px"';} ?>  <?php if(isset($_GET['action'])||($_GET['reservation'])){ echo'width="100%" height="350px"';} ?>src="img/caraibes1.jpg" alt="caraibes1">

        </div>
      </div>
         <div class="carousel-item ">
        <img  <?php if(!isset($_GET['action'])){ echo'width="100%" height="650px"';} ?> <?php if(isset($_GET['action'])||isset($_GET['reservation'])){ echo'width="100%" height="350px"';} ?>  src="img/turkoise.jpg" alt="caraibes1">

        </div>
           <div class="carousel-item ">
        <img  <?php if(!isset($_GET['action'])){ echo'width="100%" height="650px"';} ?><?php if(isset($_GET['action'])||isset($_GET['reservation'])){echo'width="100%" height="350px"';} ?>src="img/maurice.jpg" alt="caraibes1">

        </div>
 
        
    <a class="carousel-control-prev"  role="button" data-slide="prev">
      <span class="carousel-control-prev-icon" aria-hidden="true"></span>
      <span class="sr-only">Previous</span>
    </a>
    <a class="carousel-control-next" role="button" data-slide="next">
      <span class="carousel-control-next-icon" aria-hidden="true"></span>
      <span class="sr-only">Next</span>
    </a>
  </div>
<!-- ---------------------------- fin CAROUSEL---------------------------------------------- -->
<!-- ---------------------------- btn CHOISIR---------------------------------------------- -->
<?php if(!isset($_GET['action'])&&!isset($_GET['reservation'])): ?>

 <button type="button"class="choisir btn  btn-lg col-md-6 offset-md-3 border border-primary "><a href="?action=choisirmonsejour">Choisir mon séjour tout de suite</a></button>
 <?php endif ?>
<!-- ---------------------------- IF CHOISIR---------------------------------------------- -->



<?php if(isset($_GET['action'])&&$_GET['action']=='choisirmonsejour'): ?>

<div class="row offset-md-2 col-md-8 margintop2">





 <?php while($voyage = $resultat->fetch(PDO::FETCH_ASSOC)):?>

          <div class="col-lg-4 col-md-4 mb-3">
            <div class="card h-100">
              <a href="?reservation=<?=$voyage['id_voyage']?>"><img class="card-img-top" height='150px' src="<?=$voyage['photo']?>" alt=""></a>
              
              <div class="card-body">
                <h4 class="card-title "><a href="?reservation=<?=$voyage['id_voyage']?>"class="alert-link text-dark"><?=$voyage['destination']?></a> </h4>
            
                <h5><?= $produit = $_GET['reservation']?>€</h5>
                <p class="card-text"><?=$voyage['presentation']?></p>
                   

                      <button type="button" class=" text-center">
                         <a href="?reservation=<?=$voyage['id_voyage']?>"class="alert-link text-dark "> Réserver maintenant  </a>
                    </button>

              
                </div>
         
            </div>
          </div>

    <?php endwhile; ?>




</div>
<?php endif ?>

<!-- ---------------------------- IF resevation--------------------------------------------- -->
<?php if(isset($_GET['reservation'])): ?>
<!-- recupere les info par rapport a l'id_voyage dans l'url -->

<div class="container row">

<div class="col-md-4 offset-md-2">

      
              <img class="card-img-top" height='150px' src="<?=$voyage['photo']?>" alt=""></a>
              
              <div class="card-body">
                <h4 class="card-title "><a href="?reservation=<?=$voyage['id_voyage']?>"class="alert-link text-dark"><?=$voyage['destination']?></a> </h4>
            
                <h5><?=$voyage['prix']?>€</h5>
                <p class="card-text"><?=$voyage['presentation']?></p>
                   
                <div class="card-footer">
                      <button type="button" class=" text-center">
                         <a href="?reservation=<?=$voyage['id_voyage']?>"class="alert-link text-dark "> Réserver maintenant  </a>
                    </button>

              
                </div>
         
     </div>  


</div>

<div class="col-md-5">

</div>




</div>






<?php endif ?>























<!-- ------------------------------------------------------------------------------------------- -->



<footer class="fixed-bottom">

<p class="text-center pfooter"><i class="fas fa-umbrella-beach"></i> Vos vacances de rêve ...  <i class="fas fa-sun"></i> Plage ...  <i class="fas fa-city"></i> Urbaine ... <i class="fas fa-ship"></i> Croisière ... <i class="fas fa-mountain"></i> Montagne ... <i class="fas fa-euro-sign"></i>  A prix tout doux ... <i class="fas fa-umbrella-beach"></i> </p>

</footer>


</body>
</html>