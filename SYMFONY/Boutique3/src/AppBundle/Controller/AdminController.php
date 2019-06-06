<?php

namespace AppBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;

class AdminController extends Controller
{
//------------------------------------------------------------------------------------------------------------------------------------------------------------------------
//CRUD - create - update - delete


    /**
     * @Route("/admin/produit/",name="admin_produit")
     * www.maboutique.com/admin/
     */
    public function adminProduitAction(){

        $params = array();
        return $this -> render('@App/Admin/list_produit.html.twig',$params);
    }
    //@App -> dossier et ressource de AppBundle



    
    /**
     * @Route("/admin/produit/add/",name="admin_produit_add")
     * www.maboutique.com/admin/
     */
    public function adminProduitAddAction(){

        $params = array();
        return $this -> render('@App/Admin/form_produit.html.twig',$params);
    }


    
    /**
     * @Route("/admin/produit/update/{id}",name="admin_produit_update")
     * www.maboutique.com/admin/
     */
    public function adminProduitUpdateAction($id){
        
        $params = array(
            'id'=> $id
        );
        return $this -> render('@App/Admin/list_produit.html.twig',$params);
    }


    /**
     * @Route("/admin/produit/delete/{id}",name="admin_produit_delete")
     * www.maboutique.com/admin/
     */
    public function adminProduitDeleteAction($id, Request $request){
        
        $params = array();
        $request -> getSession() -> getFlashBag() -> add('success','Le produit N° '.$id.' a bien été supprimé');
        // getFlashBag() est l'endrois où l'on retrouve notre message
        return $this -> redirectToRoute('admin_produit');
    }
    //test : localhost/admin/produit/delete/12


//------------------------------------------------------------------------------------------------------------------------------------------------------------------------

    /**
     * @Route("/admin/membre/",name="admin_membre")
     * www.maboutique.com/admin/
     */
    public function adminMembrelistAction(){

        $params = array();
        return $this -> render('@App/Admin/list_membre.html.twig',$params);
    }
    //@App -> dossier et ressource de AppBundle




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



    /**
     * @Route("/admin/membre/add/",name="admin_membre_add")
     * www.maboutique.com/admin/
     */
    public function adminMembreAddAction(){

        $params = array();
        return $this -> render('@App/Admin/form_membre.html.twig',$params);
    }

    
    /**
     * @Route("/admin/membre/update/{id}",name="admin_membre_update")
     * www.maboutique.com/admin/
     */
    public function adminMembreUpdateAction($id){
        
        $params = array(
            'id'=> $id
        );
        return $this -> render('@App/Admin/list_membre.html.twig',$params);
    }



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

/**
     * @Route("/admin/commande/",name="admin_commande")
     * www.maboutique.com/admin/
     */
    public function adminCommandeAction(){

        $params = array();
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
