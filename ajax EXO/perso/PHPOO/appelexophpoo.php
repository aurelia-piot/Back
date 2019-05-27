<?php
//j'appel ma classe Etudiant
require_once 'EXO-PHPOO.php';

//J'instancie ma class Etudiant

$etudiant= new Etudiant;       
echo"<pre>";var_dump($etudiant);echo"</pre>"; 

$etudiant->setPrenom("Peter"); 
echo $etudiant->getPrenom().'<hr>';

$etudiant->setNom("Piot"); 
echo"votre nom : ". $etudiant->getNom().'<hr>';
                
$etudiant->setEmail("PeterAurelius@hotmail.fr"); 
echo"votre email: ". $etudiant->getEmail().'<hr>';       
        
$etudiant->setTelephone("0123456789"); 
echo"votre telephone: ". $etudiant->getTelephone().'<hr><hr><hr>';    

$e = $etudiant->getInfo();

 
echo"<pre>";var_dump($etudiant);echo"</pre>"; 

?>


<h2 class="display-4">Etudiant :<?=$e["nom"];?> <?=$e["prenom"];?></h2> 
Prenom : <?=$e["prenom"];?><br>
Nom :<?=$e["nom"];?> <br>
Email : <?=$e["email"];?><br>
Telephone :<?=$e["telephone"];?> <br>