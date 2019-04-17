<?php
require_once('../include/init.php');
if(!internauteEstConnecteEtEstAdmin()){header("Location:".URL."connexion.php");} //si l'internaute n'est pas connecter et n'est pas admin , il n'a rien a faire ici , on le redirige vers la page
extract($_POST);
extract($_GET);

//-----------Suppression produit--------------------------
//on entre dans le if seulement dans le cas ou l'on a clique sur le bouton suppression

 if(isset($_GET['action'])&& $_GET['action']=='suppression'){
  //  exo requete de suppression



 //$id_produit= $_GET['id_produit'];

        $supp= $bdd ->prepare("DELETE  FROM produit WHERE id_produit = :id_produit");
       $supp->bindValue(":id_produit",$id_produit,PDO::PARAM_STR);
        $supp->execute();

        $_GET['action']="affichage"; // on redirige vers l'affichage des produits

         $validate.="<div class='col-md-4 offset-md-4 alert alert-success text-center text-dark' >Le Produit n° <strong> $id_produit</strong> a bien été supprimé</div>";
 }



//-----ENregistrement Produit




if($_POST)
{
    $photo_bdd ='';
   if(isset($_GET['action'])&&  $_GET['action']=='modification'){$photo_bdd = $photo_actuelle;}//si on souhaite conserver la meme photo an cas de modification, on affect la valeur du champ photo 'hidden', // C'est a dire L'URL de la photo selectionnée en BDD;
   //en gros on recuper l'url de l'ancienne photo 




    if(!empty($_FILES['photo']['name']))//on verifie que l'indice 'name' dans la superglobale $_FILES n'est pas vide, cela veut dire que l'on a bien uploader une photo
      {
        $nom_photo = $reference .'-'.$_FILES['photo']['name'];// on redefinit le nom de la photo en concatenant la reference saisie dans le formulaire avec le nom de la photo
        // echo $nom_photo.'<br>'; 
        $photo_bdd = URL."photo/$nom_photo"; //URL est une constante ; que l'on a determiné pluss tot /////on definit l'URL de la photo, c'est ce que l'on conserve dans la BDD
        // echo $photo_bdd.'<br>';

        $photo_dossier = RACINE_SITE."photo/$nom_photo"; //chemin physique / sur le pc ////on definit le chemin physique de la photo sur le disque dur du serveur, c'est ce qui nous permet tre de copier la photo dans le dossier photo
        // echo $photo_dossier.'<br>';

        copy($_FILES['photo']['tmp_name'],$photo_dossier);//copy() est une fonction predefinie qui permet de copier la photo dans le dossier photo . arguments : copy(nom_temporaire_photo, chemin de destination)

      }

      //exo : Realiser la requete d'insertion permettant d'inserer un produit dans la table produit (requete preparée)

      if (isset($_GET['action'])&&$_GET['action']=='ajout')
      {
        $produit_insert = $bdd ->prepare("INSERT INTO produit (reference,categorie,titre,description,couleur,taille,public,photo,prix,stock) VALUES (:reference,:categorie,:titre,:description,:couleur,:taille,:public,:photo,:prix,:stock)");
      }
      else
      {
        //EXO : requete update
        $produit_insert = $bdd ->prepare("UPDATE  produit SET reference = :reference , categorie = :categorie , titre = :titre , description = :description , couleur = :couleur , taille = :taille , public = :public , photo = :photo , prix = :prix , stock = :stock WHERE id_produit = $id_produit ");
        $_GET['action']='affichage';
        $validate .="<div class='col-md-4 offset-md-4 alert alert-success text-center text-dark' >Le Produit n° <strong> $id_produit</strong> a bien été modifié</div>";

      }

         foreach($_POST as $key => $value) // va creer des indice pour chaque detail du post
       {
         if($key !='photo_actuelle'){
          $produit_insert->bindValue(":$key",$value,PDO::PARAM_STR);
        }
       }
$produit_insert->bindValue(":photo",$photo_bdd,PDO::PARAM_STR);
$produit_insert->execute();
  




}




require_once('../include/header.php');
 //echo '<pre>' ; print_r($_POST); echo'</pre>';
  //echo '<pre>' ; print_r($_FILES); echo'</pre>';
  //$_FILES : superglobale permet de vehiculer les information d'un fichier uploader


?>


<!-- //---------------------LIEN PRODUITS---------- -->


<ul class="list-group col-md-4 offset-md-4 mt-4 text-center">
  <li class="list-group-item active text-center text-white bg-dark "><h5>BACK OFFICE</h5></li>
  <li class="list-group-item"><a href="?action=affichage" class="alert-link text-dark">AFFICHAGE PRODUITS</a></li>
  <li class="list-group-item"><a href="?action=ajout"class="alert-link text-dark" >AJOUT PRODUITS</a></li>

</ul>





  
<!-- //---------------------AFFICHAGE PRODUITS---------- -->
<?php if(isset($_GET['action'])&& $_GET['action']=='affichage'): ?>


<!-- //EXO: realiser le traitement permettant l'affichage des produits sour forme de tableau HTML -->


<hr>
 <h1 class="text-center display-4">LISTES DES PRODUITS</h1>

<?php
echo $validate;


$resultat = $bdd -> query("SELECT * FROM produit");

$produits = $resultat->fetchall(PDO::FETCH_ASSOC);//fetchall() retourne un tableau multi dimensionnel avec chaque tableau (de chaque employé) indexé numeriquement
//echo '<pre>' ; print_r($produits); echo'</pre>';

?>

<hr>

<table class="table table-bordered text-center table1"><tr>

  <?php foreach($produits[0] as $key =>$value):?><!--ici on recupere les indices-->

    <th><?=strtoupper($key)?></th><!--strtoupper permet d'afficher en majuscule-->

<?php endforeach; ?>
    <th>MODIFIER</th>
    <th>SUPPRIMER</th>
    </tr>

    <?php foreach($produits as $key => $tab):?>
    
    <tr>
      
      <?php foreach($tab as $key2 => $value ):?>

            <?php if($key2 == 'photo'):?>

           <td> <img height="100px"src="<?= $value?>" alt="<?=$tab['titre']?>"></td>

        <?php else:?>
          <td><?=$value?></td>
         
            <?php endif; ?>
    
<?php endforeach; ?>
<td><a href="?action=modification&id_produit=<?=$tab['id_produit']?>" class="text-dark"><i class="fas fa-edit"></i></a></td>
<td><a href="?action=suppression&id_produit=<?=$tab['id_produit']?>"class="text-danger" onclick="return(confirm('En êtes vous certain?'))"><i class="fas fa-trash-alt"></i></a></td>
  </tr>
  
<?php endforeach; ?>
  

</table>


<?php endif; ?>
<?php if(isset($_GET['action'])&& ($_GET['action']=='ajout' || $_GET['action']=='modification')): ?>

<!-- 
    1.Realiser un formulaire permettant d'inserer un produit dans la table 'produit'(sauf le champ :id_produi)
 -->
 <hr>
 <h1 class="text-center display-4"><?=strtoupper($action)?> D'UN PRODUIT</h1>
<hr>

<?php if(isset($_GET['id_produit']))

    {
      $resultat = $bdd ->prepare("SELECT * FROM produit WHERE id_produit = :id_produit");
      $resultat->bindValue(':id_produit' ,$id_produit, PDO::PARAM_INT);
      $resultat->execute();
      $produit_actuel = $resultat->fetch(PDO::FETCH_ASSOC);
      echo '<pre>' ; print_r($produit_actuel); echo'</pre>';
    }


$reference = (isset($produit_actuel['reference'])) ? $produit_actuel['reference']:''; // ? = if ------":" = else//
$categorie = (isset($produit_actuel['categorie'])) ? $produit_actuel['categorie']:'';//sert a stocker les donnée dans des variables
$titre = (isset($produit_actuel['titre'])) ? $produit_actuel['titre']:'';
$description = (isset($produit_actuel['description'])) ? $produit_actuel['description']:'';
$couleur = (isset($produit_actuel['couleur'])) ? $produit_actuel['couleur']:'';
$public= (isset($produit_actuel['public'])) ? $produit_actuel['public']:'';
$taille= (isset($produit_actuel['taille'])) ? $produit_actuel['taille']:'';
$photo= (isset($produit_actuel['photo'])) ? $produit_actuel['photo']:'';
$prix= (isset($produit_actuel['prix'])) ? $produit_actuel['prix']:'';
$stock= (isset($produit_actuel['stock'])) ? $produit_actuel['stock']:'';
?>


 <div class="container  mb-6 col-md-8">
<form method='post' class='form1 mb-6' enctype="multipart/form-data">

<!-- enctype : obligatoire en PHP pour recolter les onformation d'un fichier uploadé -->

    <div class="form-group">
  <input type="text" class="form-control" placeholder="reference" name="reference" value="<?=$reference?>">
  </div>
  <div class="form-row">
<div class="form-group col-md-6">
      <input type="text" class="form-control" placeholder="categorie" name="categorie" value="<?=$categorie?>">
    </div>

 <div class="form-group col-md-6">
      <input type="text" class="form-control" placeholder="titre" name="titre"value="<?=$titre?>">
    </div>
 </div>

<div class="form-group ">
  <input type="text" class="form-control" placeholder="description" name="description"value="<?=$description?>">
  </div>

  <div class="form-row">
 <div class="form-group col-md-6">
  <input type="text" class="form-control" placeholder="couleur" name="couleur"value="<?=$couleur?>">
  </div>

  </div>

  <div class="form-row">
 <div class="form-group col-md-6">
 <label for="taille">Taille</label>
 <select id="taille" class="form-control" name="taille" >
        <option value="xxl"<?php if($taille == 'xxl') echo 'selected';?> >xxl</option> <!-- le selected affiche la valeur recuperer-->
        <option value="xl"<?php if($taille == 'xl') echo 'selected';?>>xl</option>
        <option value="l"<?php if($taille == 'l') echo 'selected';?>>l</option>
        <option value="s"<?php if($taille == 's') echo 'selected';?>>s</option>
        <option value="xs"<?php if($taille == 'xs') echo 'selected';?>>xs</option>
      </select>

  </div>
 

<div class="form-group col-md-6">
<label for="publique">publique</label>
<select id="publique" class="form-control" name="public">
        <option selected >choose</option>
        <option value="m"<?php if($public == 'm') echo 'selected';?>>m</option>
        <option value="f"<?php if($public == 'f') echo 'selected';?>>f</option>
        <option value="mixte"<?php if($public == 'mixte') echo 'selected';?>>mixte</option>
      </select>
  
    </div>
 </div>
 <br>

  <div class="form-row">
    <div class="form-group  offset-md-3 col-md-6">
      <input type="file" class="form-control" placeholder="photo" name="photo">
      
    </div>

 <?php if (!empty($photo)):?>
 <em class="mx-auto">Vous pouvez uploader une nouvelle photo si vous souhaitez la changer</em> 

<div class=" offset-md-4 col-md-6">
 
 <img height='200px'src="<?=$photo?>" alt="<?=$titre?>">
  </div>
 
  <?php endif;?>
  <input type="hidden"id="photo_actuelle" name="photo_actuelle" value="<?= $photo?>"><!--on cache le champ qui recupere l'URL de la photo, qui sera re-injecter dans la bdd-->

 </div>
<br>

  <div class="form-row">
<div class="form-group col-md-6">
  <input type="text" class="form-control" placeholder="prix" name="prix"value="<?= $prix?>">
  </div>
 



 <div class="form-group col-md-6">
  <input type="text" class="form-control" placeholder="stock" name="stock"value="<?=$stock?>">
    </div>

 </div>

  <button type="submit" class="btn btn-primary offset-md-3 col-md-6"><?=$action?></button>
</form>





</div>

<?php endif; ?>

<?php
require_once('../include/footer.php');
?>