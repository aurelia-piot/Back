<?php

namespace POLES\TestBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;

use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\RedirectResponse;
use Symfony\Component\HttpFoundation\Request;


class DefaultController extends Controller
{
	
	
	
	
	
	
    /**
     * @Route("/", name="accueil")
     */
    public function indexAction()
    {      
	  //return $this->render('POLESTestBundle:Default:index.html.twig');
        return $this->render('@POLESTest/Default/index.html.twig');	
    }
	
	
	
	
	
	
	
	
	
	
	
	/**
	* @Route("/bonjour/")
	* localhost:8000/bonjour
	* www.maboutique.com/bonjour
	*/
	public function bonjourAction(){
		echo 'Bonjour'; 
	}
	// test : localhost:8000/bonjour
	
	
	/**
	*@Route("/bonjour2/")
	*
	*/
	public function bonjour2Action(){
		return new Response('<h1>Bonjour</h1>');
	}
	// test : localhost:8000/bonjour2/ 
	
	
	/**
	* @Route("/hello/{prenom}/")
	*
	*/
	public function helloAction($prenom){
		return new Response('<h3>Bonjour ' . $prenom . ' !</h3>');
	}
	// test : localhost:8000/hello/Yakine/
	// test : localhost:8000/hello/Sylvain/
	
	
	
	
	/**
	* @Route("/hola/{prenom}/")
	*
	*/
	public function holaAction($prenom){
		
		$params = array(
			'prenom' => $prenom
		);
		
		return $this -> render("@POLESTest/Default/hola.html.twig", $params);
	}
	
	/**
	* @Route("/ciao/{prenom}/{age}/")
	*
	*/
	public function ciaoAction($prenom, $age){
		
		
		return $this -> render('@POLESTest/Default/ciao.html.twig', array(
			'prenom' => $prenom,
			'age' => $age
		));
	}
	// A faire : Terminer la fonctionnalité "ciao" de sorte que la page localhost:8000/ciao/Yakine/37 affiche : "Vous vous appelez Yakine et vous avez 37 ans". 
	
	
	
	/**
	*@Route("/redirect/")
	* Redirection vers l'accueil
	*/
	public function redirectAction(){
		$route = $this -> get('router') -> generate('accueil'); 
		return new RedirectResponse($route);
	}
	// test : localhost:8000/redirect/  ---> Accueil

	/**
	*@Route("/redirect2/")
	*
	*/
	public function redirect2Action(){
		return $this -> redirectToRoute('accueil');
	}
	// test : localhost:8000/redirect2/  ---> Accueil

	
	/**
	* @Route("/message/")
	*
	*/
	public function messageAction(Request $request){
		
		$session = $request -> getSession();
		
		$session -> getFlashBag() -> add('success', 'Félicitations vous êtes inscrit');
		$session -> getFlashBag() -> add('success', 'Bonjour');
		
		$session -> getFlashBag() -> add('error', 'Votre adresse email n\'est pas validée');
		
		return $this -> redirectToRoute('accueil');		
	}
	// test : localhost:8000/message ---> redirection vers accueil
	
	
	
	
}






