<?php
//toutes les action qu'un membre peut faire

namespace AppBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;

class MembreController extends Controller
{

    
    /**
     * @Route("/membre/inscription/",name="membre_inscription")
     * www.maboutique.com/membre/
     */
    public function membreIsncriptionAction(){

        $params = array();
        return $this -> render('@App/membre/inscription.html.twig',$params);
    }
    //@App -> dossier et ressource de AppBundle


    /**
     * @Route("/membre/connexion/",name="membre_connexion")
     * www.maboutique.com/membre/
     */
    public function membreConnexionAction(){

        $params = array();
        return $this -> render('@App/membre/connexion.html.twig',$params);
    }

    
    /**
     * @Route("/membre/profil/",name="membre_profil")
     * www.maboutique.com/membre/
     */
    public function membreProfilAction(){

        $params = array(
            
        );
        return $this -> render('@App/membre/profil.html.twig',$params);
    }















    /**
     * @Route("/membre/produit/",name="membre_produit")
     * www.maboutique.com/membre/
     */
    public function membreProduitAction(){

        $params = array();
        return $this -> render('@App/membre/list_produit.html.twig',$params);
    }
    //@App -> dossier et ressource de AppBundle



    

}
