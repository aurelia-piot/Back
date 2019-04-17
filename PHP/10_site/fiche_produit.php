<?php
require_once('include/init.php');
extract($_GET);

require_once('include/header.php');

/*
    exo 1. Realiser la resutet permettant de selectionner le produit par rapport a l'id _produit envoyer dans lurl
        2.Associer une methode pour rendre le resultat exploitable
        3.creer une fiche produit avec les information du produit
                : photo/categorie / titre / description / couleur / taille /prix / public
        4. ajouter un selecteur quantité et un bouton d'ajout au panier
*/     
if(isset($_GET['id_produit'])):
//si l'indice id_produit est definie dans l'url


$resultat = $bdd -> query("SELECT * FROM produit WHERE id_produit = $id_produit");
while ($produits = $resultat->fetch(PDO::FETCH_ASSOC,PDO::PARAM_STR)):
//echo '<pre>';print_r($produits);echo'</pre>';

?>
   


     

<div class="container">
    <br>
    <br>
    
		<div class="container-fluid">
            <h1 class="display-4 text-center -mt-4">detail du Produit</h1>
    <br>
    <br>
    <br>
				<div class="wrapper row">
					<div class="preview col-md-6">
						
					
						<div class="preview-pic tab-content">
						  <img height="500px"src=<?=$produits['photo']?> /> 
						</div><br>
							<ul class="preview-thumbnail nav nav-tabs">
                          <li class="active"><a data-target="#pic-1" data-toggle="tab"><img  height='100px'src="<?=$produits['photo']?> "/></a></li>
						  <li class="active"><a data-target="#pic-1" data-toggle="tab"><img  height='100px'src="<?=$produits['photo']?> "/></a></li>
						  <li class="active"><a data-target="#pic-1" data-toggle="tab"><img  height='100px'src="<?=$produits['photo']?> "/></a></li>
                          <li class="active"><a data-target="#pic-1" data-toggle="tab"><img  height='100px'src="<?=$produits['photo']?> "/></a></li>
						  <li class="active"><a data-target="#pic-1" data-toggle="tab"><img  height='100px'src="<?=$produits['photo']?> "/></a></li>
                       
						</ul>
						
					
					</div>
					<div class="details col-md-6">
						<h2 class="product-title card-title text-center"><?=$produits['titre']?></h2>
						
						
                        <p class="product-description"><?=$produits['description']?> Lorem ipsum dolor sit amet consectetur adipisicing elit. Perspiciatis maxime, consequuntur, minus consequatur aperiam nesciunt accusamus dolores, quidem ipsam unde est! Animi quae dolor reiciendis. Repellat maiores neque tempora quasi.</p>

                        <h5 class="colors">colors: <?=$produits['couleur']?> </h5>
                        
                        
                        <hr>
                        <form class="form-row"action="">
                             <div class="form-group col-md-6">
                                        <label for="nbr">Taille :</label>
                                           <select class="form-control" id="exampleFormControlSelect1">
                                               <option value="xxl"<?php if($produits['taille'] == 'xxl') echo 'selected';?> >xxl</option> <!-- le selected affiche la valeur recuperer-->
                                               <option value="xl"<?php if($produits['taille']== 'xl') echo 'selected';?>>xl</option>
                                               <option value="l"<?php if($produits['taille'] == 'l') echo 'selected';?>>l</option>
                                               <option value="s"<?php if($produits['taille'] == 's') echo 'selected';?>>s</option>
                                               <option value="xs"<?php if($produits['taille'] == 'xs') echo 'selected';?>>xs</option>
                                                </select>
                            </div>
						</form>
						<hr>
						
                        <br>
                        <form class="form-row"action="">
                             <div class="form-group col-md-6">
                                        <label for="nbr">nombre d'exemplaire :</label>
                                        <input type="text" class="form-control" id="bnr" placeholder="ex: 1" value='1'>
                            </div>
                        </form>
						<div class="action">
                            <h4 class="price">Prix: <span><?=$produits['prix']?> € </span></h4>
							<button class="add-to-cart btn btn-default bg-success col-md-6" type="button">add to cart</button>
							
						</div>
					</div>
				</div>
	</div>
</div>




<?php endwhile;?>

<?php else:
//si l'indice id_produit n'est pas defini dans l'url, on redirige vers la boutique
header("location: boutique.php")

?>

<?php endif;?>





<br>
<br>
<br>
<br>
<br>













<?php
require_once('include/footer.php');
?>