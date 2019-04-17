<?php
require_once('include/init.php');
extract($_GET);

require_once('include/header.php');
?>




<div class="row">

      <div class="col-lg-3">

        <h1 class="my-4">Bienvenue dans ma boutique</h1>
        <div class="list-group">
            <?php
                // Exo 1. requete de selection des categories de produit distinctes en BDD
                //     2. Boucler sur chaque categorie et créer un lien "a"
                $resultat = $bdd ->query("SELECT DISTINCT categorie FROM produit ");//pas besoin de preparer la requete, elle ne sera pas maniable depuis le client 
                while($categorie = $resultat->fetch(PDO::FETCH_ASSOC)):
           //echo '<pre>';print_r($categorie);echo'</pre>';
//on selection un produit , qui nous retourne un objet, et avec la methode fetch on obtient un tableau array que l'on peut parcourir avec une boucle 
                ?>
                    
                    
                    
                        <a href="?categorie=<?= $categorie['categorie']?>" class="list-group-item alert-link text-dark text-center"><?= $categorie['categorie']?></a>
                    
                    
                <?php endwhile;?>
        </div>

      </div>
      <!-- /.col-lg-3 -->

      <div class="col-lg-9">

        <div id="carouselExampleIndicators" class="carousel slide my-4" data-ride="carousel">
          <ol class="carousel-indicators">
            <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
            <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
            <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
          </ol>
          <div class="carousel-inner" role="listbox">
            <div class="carousel-item active">
              <img class="d-block img-fluid" src="photo/woocommerce-boutique-en-ligne-wordpress.jpg" alt="First slide">
            </div>
            <div class="carousel-item">
              <img class="d-block img-fluid" src="photo/Soldes.jpg" alt="Second slide">
            </div>
            <div class="carousel-item">
              <img class="d-block img-fluid" src="photo/035-3.jpg" alt="Third slide">
            </div>
          </div>
          <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="sr-only">Previous</span>
          </a>
          <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="sr-only">Next</span>
          </a>
        </div>




        <div class="row">

<?php if(isset($_GET['categorie']) )://si il ya une categorie dan l'url , on selectionne les produits associés
     
     $resultat = $bdd ->prepare("SELECT * FROM produit WHERE categorie = :categorie ");
     $resultat->bindValue(':categorie', $_GET['categorie'], PDO::PARAM_STR);
     $resultat->execute();


else:  // sinon , si il n'y a pas de categorie dans l'url on selectionne tout les produits
    $resultat = $bdd ->prepare("SELECT * FROM produit ");
    $resultat->execute();


endif;  

    while($produits = $resultat->fetch(PDO::FETCH_ASSOC)):
        //echo '<pre>';print_r($produits);echo'</pre>';
    
    ?>
          <div class="col-lg-4 col-md-6 mb-4">
            <div class="card h-100">
              <a href="fiche_produit.php?id_produit=<?=$produits['id_produit']?>"><img class="card-img-top" height='250px' src="<?=$produits['photo']?>" alt=""></a>
              <div class="card-body">
                <h4 class="card-title text-center">
                  <a href="fiche_produit.php?id_produit=<?=$produits['id_produit']?>"class="alert-link text-dark"><?=$produits['titre']?></a>
                </h4>

                
                <h5><?=$produits['prix']?>€</h5>
                <p class="card-text"><?=$produits['description']?></p>
              </div>
              <div class="card-footer text-center">
                <a href="fiche_produit.php?id_produit=<?=$produits['id_produit']?>"class="alert-link text-dark ">voir le produit    <i class="fas fa-search"></i></a>
              </div>
            </div>
          </div>

    <?php endwhile; ?>

        




        </div>
        <!-- /.row -->

      </div>
      <!-- /.col-lg-9 -->

    </div>
    <!-- /.row -->



<br><br><br><br>







<?php
require_once('include/footer.php');
?>