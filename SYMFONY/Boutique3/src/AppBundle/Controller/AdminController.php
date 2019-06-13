<?php

namespace AppBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;

use  AppBundle\Entity\Produit;
use  AppBundle\Entity\Membre;
use  AppBundle\Entity\Commande;
use  AppBundle\Entity\DetailsCommande;


use  AppBundle\Form\ProduitType;
use  AppBundle\Form\MembreType;



class AdminController extends Controller
{
//------------------------------------------------------------------------------------------------------------------------------------------------------------------------
//CRUD - create - update - delete


    /**
     * @Route("/admin/produit/",name="admin_produit")
     * www.maboutique.com/admin/
     */
    public function adminProduitAction(){


    $repo = $this ->getDoctrine() -> getRepository(Produit::Class);//on recupere le repository
    $produits = $repo -> findAll();
    
        $params = array(
            'produits' => $produits
        );


        return $this -> render('@App/Admin/list_produit.html.twig',$params);


    }
    //@App -> dossier et ressource de AppBundle





//------------------------------------------------------------------------------------------------------------------------------------------------------------------------





    
    /**
     * @Route("/admin/produit/add/",name="admin_produit_add")
     * http://localhost:8000/admin/produit/add/
     */
    public function adminProduitAddAction(Request $request){
        //(Request $request) on en a besoin pour les forms et autres

        //on créér un objet de la class produit (vide)
        $produit = new Produit;

                    // // on le remplis:
                    // $produit -> setReference('XXX');
                    // $produit -> setCategorie('pull');
                    // $produit -> setPublic('m');
                    // $produit -> setPrix('25.99');
                    // $produit -> setStock('150');
                    // $produit -> setTitre('Pull marinière');
                    // $produit -> setPhoto('mariniere.jpeg');
                    // $produit -> setDescription('super pull façon bretonne');
                    // $produit -> setTaille('L');
                    // $produit -> setCouleur('blanc et bleu');
                    

        $form = $this -> createForm(ProduitType::Class, $produit);//vue que la class n'existe pas dans ce ficher on appele un autre fichier où elle existe avec 'use'
        // ici le formulair et $produit sont lier
        //on creer un formuliare du type produit et on le lie a notre objet $produit. on dit que le formulaire va hydrater l'objet(les infos du formulaire vont remplire l'objet)

        $form -> handleRequest($request);
        // Lier definitivement l'objet $produit au formulaire.. Elle permet de traiter les informations en POST


        if($form -> isSubmitted() && $form -> isValid())//si le formulaire est soumis et est valide (sans erreur) on va:
        {

            // requet insertion = EntityManger
            $em = $this -> getDoctrine() -> getManager(); // on recup' le manager
    
            $em -> persist($produit);// on enrengistre dans le systeme l'objet
            // $em -> persist($produit2);// on enrengistre dans le systeme l'objet

            $produit -> uploadPhoto();
    
            $em -> flush();//dans le cas de plusieurs objets, le tout est envoyer avec cette seul requete

            $request -> getSession()-> getFlashbag() -> add('success','le produit '.$produit-> getId().' a bien ete ajouté ! ');//message de felicitation

            return $this -> redirectToRoute('admin_produit');
        }
        

        

        $params = array( //partie visuel du form
            'produitForm'=> $form -> createView(),//createView() permet de generer la partie visuel (HTML) du formulaire.
            'title'=> 'modifier un produit'

        );
        return $this -> render('@App/Admin/form_produit.html.twig',$params);
    }
    //localhost:8000/admin/produit/add
    //localhost:8000

//------------------------------------------------------------------------------------------------------------------------------------------

    
    /**
     * @Route("/admin/produit/update/{id}",name="admin_produit_update")
     * www.maboutique.com/admin/update/{id}
     */
    public function adminProduitUpdateAction($id,Request $request){

        $em = $this -> getDoctrine() -> getManager();

        //recuperation du produit a modifier (par rapport a son id):
        $produit = $em -> find(Produit::class,$id);

    $form = $this -> createForm(ProduitType::class,$produit);
    //en creant le formulaire on le lie a notre objet produit quie va etre modifié, on dit qu'on hydrate le formulaire.

    
            $form -> handleRequest($request);
          
            if($form -> isSubmitted() && $form -> isValid())//si le formulaire est soumis et est valide (sans erreur) on va:
            {             
                //je l'enregistre
                $em -> persist($produit);
                $produit -> uploadPhoto();
                $em -> flush();
                //on passe par le manager car il n'y a que lui qui peut effectuer un persiste et un flush
                $request -> getSession()-> getFlashbag() -> add('success','le produit '.$produit-> getTitre().' a bien ete modifier! ');//message de felicitation
                return $this -> redirectToRoute('admin_produit');


            }

        $params = array(
            'id'=> $id,
            'produitForm'=> $form -> createView(),
            'title'=> 'modifier le produit '. $produit -> getId(),
            'photo'=>$produit -> getPhoto()
        );
        return $this -> render('@App/Admin/form_produit.html.twig',$params);



    }





//------------------------------------------------------------------------------------------------------------------------------------------




    /**
     * @Route("/admin/produit/delete/{id}",name="admin_produit_delete")
     * www.maboutique.com/admin/
     */
    public function adminProduitDeleteAction($id, Request $request){
        $em = $this -> getDoctrine()->getManager();
        //on recupere l'objet produit
        $produit =$em->find(Produit::class,$id);

        $produit -> removePhoto();
        //on supprime le produit :
        $em->remove($produit);
        $em-> flush();// on 'envoie la donnée de suppression

        // $params = array(); // on a pas besoin d'un array ici

        $request -> getSession() -> getFlashBag() -> add('success','Le produit N° '.$id.' a bien été supprimé');
        // getFlashBag() est l'endrois où l'on retrouve notre message
        return $this -> redirectToRoute('admin_produit');
    }
    //test : localhost:8000/admin/produit/delete/12
    // nous sommes rediriger vers http://localhost:8000/admin/produit/


//------------------------------------------------------------------------------------------------------------------------------------------------------------------------
//------------------------------------------------------------------------------------------------------------------------------------------------------------------------
//------------------------------------------------------------------------------------------------------------------------------------------------------------------------

    /**
     * @Route("/admin/membre/",name="admin_membre")
     * www.maboutique.com/admin/
     */
    public function adminMembrelistAction(){
        $repo = $this ->getDoctrine() -> getRepository(Membre::Class);
        
    $membres = $repo -> findAll();
    
        $params = array(
            'membres' => $membres,             
            'title'=> 'liste des membres'
        );


        return $this -> render('@App/Admin/list_membre.html.twig',$params);
    }
    //@App -> dossier et ressource de AppBundle



//------------------------------------------------------------------------------------------------------------------------------------------

    /**
     * @Route("/admin/membre/{id} ",name="admin_membre_id")
     * www.maboutique.com/admin/
     */
    public function adminMembreAction($id){

        $params = array(
            'id'=> $id
        );
        return $this -> render('@App/Admin/list_membre.html.twig',$params);
    }
    //@App -> dossier et ressource de AppBundle


//------------------------------------------------------------------------------------------------------------------------------------------

    /**
     * @Route("/admin/membre/add/",name="admin_membre_add")
     * www.maboutique.com/admin/
     */
    public function adminMembreAddAction(){
        
        $params = array( 
            'title'=> 'ajouter un membre'
        );

   
        return $this -> render('@App/Admin/form_membre.html.twig',$params);
    }

//------------------------------------------------------------------------------------------------------------------------------------------
    
    /**
     * @Route("/admin/membre/update/{id}",name="admin_membre_update")
     * www.maboutique.com/admin/
     */
    public function adminMembreUpdateAction($id, Request $request){
        $em =$this -> getDoctrine()-> getManager();
        $membre = $em -> find(Membre::class,$id);

        $form = $this -> createForm(MembreType::class,$membre, ['statut'=>'admin']);
        $password =$membre ->getPassword();
        
        $form -> handleRequest($request);
        if($form -> isSubmitted() && $form -> isvalid())
        {
            $em->persist($membre);
            $membre->setPassword($password);
            $em-> flush();

            $request -> getSession() -> getFlashBag() -> add('success','Le profil du membre'.$id.' a été mis à jour !');
            return $this -> redirectToRoute('admin_membre');
         }


        $params = array(
            'id'=> $id,
            'membreForm'=> $form -> createView()
        );
        return $this -> render('@App/Admin/form_membre.html.twig',$params);
    }

//------------------------------------------------------------------------------------------------------------------------------------------

    /**
     * @Route("/admin/membre/delete/{id}",name="admin_membre_delete")
     * www.maboutique.com/admin/
     */
    public function adminMembreDeleteAction($id, Request $request){
        
        $params = array();
        $request -> getSession() -> getFlashBag() -> add('success','Le membre N° '.$id.' à bien été supprimé');
        // getFlashBag() est l'endrois où l'on retrouve notre message
        return $this -> redirectToRoute('admin_membre');
    }
    //test : localhost/admin/membre/delete/12


    /**
     * @Route("/admin/membre/ban/{id}",name="admin_membre_ban")
     * www.maboutique.com/admin/
     */
    public function adminMembreBanAction($id, Request $request){
        
        $params = array();
        $request -> getSession() -> getFlashBag() -> add('success','Le membre N° '.$id.' à bien été Bannis');
        // getFlashBag() est l'endrois où l'on retrouve notre message
        return $this -> redirectToRoute('admin_membre');
    }
    //test : localhost/admin/membre/ban/12


//------------------------------------------------------------------------------------------------------------------------------------------------------------------------
//------------------------------------------------------------------------------------------------------------------------------------------------------------------------
//------------------------------------------------------------------------------------------------------------------------------------------------------------------------

/**
     * @Route("/admin/commande/",name="admin_commande")
     * www.maboutique.com/admin/
     */
    public function adminCommandeAction(){

        $repo = $this ->getDoctrine()-> getRepository(Commande::class);

        $commandes = $repo->findAll();

        $params = array(
            'commandes' => $commandes
        );
        return $this -> render('@App/Admin/list_commande.html.twig',$params);
    }
    //@App -> dossier et ressource de AppBundle



    
    /**
     * @Route("/admin/commande/add/",name="admin_commande_add")
     * www.maboutique.com/admin/
     */
    public function adminCommandeAddAction(){

        $params = array();
        return $this -> render('@App/Admin/form_commande.html.twig',$params);
    }


    
    /**
     * @Route("/admin/commande/update/{id}",name="admin_commande_update")
     * www.maboutique.com/admin/
     */
    public function adminCommandeUpdateAction($id){
        
        $params = array(
            'id'=> $id
        );
        return $this -> render('@App/Admin/list_commande.html.twig',$params);
    }


    /**
     * @Route("/admin/commande/delete/{id}",name="admin_commande_delete")
     * www.maboutique.com/admin/
     */
    public function adminCommandeDeleteAction($id, Request $request){
        
        $params = array();
        $request -> getSession() -> getFlashBag() -> add('success','La commande N° '.$id.' a bien été supprimé');
        
        return $this -> redirectToRoute('admin_commande');
    }
    //test : localhost/admin/commande/delete/12


}
