<?php

//Boutique3/src/Controller/SecurityController.php

namespace AppBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;

use AppBundle\Entity\Membre;
use AppBundle\Form\MembreType;



class SecurityController extends Controller
{

/**
 * @Route("/connexion/", name="connexion")
 */
public function connectionAction(Request $request)
{
    $auth = $this -> get('security.authentication_utils');
    $lastUserName = $auth -> getLastUserName();
    //recupérer le pseudo tapé...

    $error= $auth -> getLastAuthenticationError();
    //recupéere l'erreur s'il y en a une

    if(!empty($error)){ $request -> getSession() -> getFlashBag() -> add('errors','Erreur d\'identifiant !');}

    $params = array('lastUserName'=>$lastUserName);

    return $this -> render('@App/Membre/connexion.html.twig',$params);
}











//-------------------------------------------------------------------------------


/**
 * @Route("/connexion_check/", name="connexion_check")
 */
public function connectionCheckAction(){}


//-------------------------------------------------------------------------------


/**
 * @Route("/deconnexion/", name="deconnexion")
 */
public function deconnectionAction(){}













}