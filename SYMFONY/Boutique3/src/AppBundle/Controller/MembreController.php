<?php
//toutes les action qu'un membre peut faire

namespace AppBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;

use AppBundle\Entity\Membre;
use AppBundle\Form\MembreType ;

use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;


            
class MembreController extends Controller
{
//------------------------------------------------------------------------------------------------------------------------------------------------------------------------

    
    /**
     * @Route("/membre/inscription/",name="inscription")
     * www.maboutique.com/membre/inscription
     */
    public function membreIsncriptionAction(Request $request, UserPasswordEncoderInterface $encoder){

        $membre = new Membre;
        $form = $this -> createForm(MembreType::class ,$membre);

        $form -> handleRequest($request);
        // Lier definitivement l'objet $membre au formulaire.. Elle permet de traiter les informations en POST


        if($form -> isSubmitted() && $form -> isValid())
        {

           
            $em = $this -> getDoctrine() -> getManager();
    
            $em -> persist($membre);

            $membre -> setStatut('0');

            $password = $membre -> getPassword();
            //password saisi dans le formulaire

            $password_crypte = $encoder -> encodePassword($membre, $password);
            //on encode le password.

            $membre -> setPassword($password_crypte);

            $membre -> setSalt(NULL);
            $membre-> setRoles(['ROLE_USER']);
            //on definit un role par defaut


            //--------------------
    
            $em -> flush();

            $request -> getSession()-> getFlashbag() -> add('success','merci pour votre inscritpion');

            return $this -> redirectToRoute('connexion');
        }


        $params = array(
            'membreForm'=> $form -> createView(),//createView() permet de generer la partie visuel (HTML) du formulaire.
            'title'=> 'inscription'
        );
        return $this -> render('@App/membre/inscription.html.twig',$params);
    }
    //@App -> dossier et ressource de AppBundle


//------------------------------------------------------------------------------------------------------------------------------------------------------------------------

    /**
     * @Route("/membre/profil/",name="membre_profil")
     * www.maboutique.com/membre/
     */
    public function membreProfilAction(){

        $params = array(
            
        );
        return $this -> render('@App/membre/profil.html.twig',$params);
    }










//------------------------------------------------------------------------------------------------------------------------------------------------------------------------





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
