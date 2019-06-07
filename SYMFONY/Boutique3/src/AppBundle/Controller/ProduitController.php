<?php

namespace AppBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;

use AppBundle\Entity\Produit;






class ProduitController extends Controller
{



    /**
     * @Route("/", name="homepage")
     */
    public function indexAction()
    {
        //1 : Recupere les infos

        $repo = $this-> getDoctrine() -> getRepository(Produit::class);
        $produits=$repo->findAll();//et avec ça on recupere tout les produits sous forme d'objet




        //1.2 Récupérer les categories:

        $em= $this ->getDoctrine()->getManager();

          //Methode 1 : Create Query:(sql)
        $query = $em -> createQuery("SELECT DISTINCT(p.categorie) FROM AppBundle\Entity\Produit p ORDER BY p.categorie ASC");//car il ne manipule pas de table

        $categories= $query -> getResult();//equivalent du FETCH::ASSOC



          //Methode 2 : Query Builder: (php)
          $query = $em ->createQueryBuilder();
          $query 
          -> select('p.categorie')
          -> distinct(true)
          -> from(produit::class,'p') //par ce qu'il manipule des entié 'le p est un alias'
          -> orderBy('p.categorie','ASC');
          //SELECT DISTINCT(categorie) FROM produit ORDER BY categorie ASC

        $categories = $query -> getQuery() -> getResult();


                
        //2 Retourner une vue

        $params =array(
            'produits'=>$produits, // là on peut exploiter tout nos produits dans notre vue
            'categories'=> $categories
        );
        return $this->render('@App/Produit/index.html.twig',$params);
    }
 









    //-----------------------------------------------------------------------------------------------------------------


        /**
         *@Route("/produit/{id}",name="produit")
         *www.maboutique.com/produit/12
         */

    public function produitAction($id){

        //Methode 1 :Repository
        $repo =$this ->getDoctrine()-> getRepository(Produit::class);
        $produit=$repo->find($id);


        //methode 2: EntityManager
        $em=$this->getDoctrine()->getManager();
        $produit =$em->find(Produit::class,$id);
        //dans la class produit on va cherche le produit avec l'id..

        // les 2 methodes donnes un resultats semblable

         $params =array(
             'id'=>$id,
             'produit'=>$produit
         );
       return $this->render('@App/Produit/show.html.twig',$params);


    }


         /**
         *@Route("/categorie/{cat}",name="categorie")
         *www.maboutique.com/categorie/tshirt
         */
    public function categorieAction($cat){
        // 1: Recupere les infos
        $repo =$this ->getDoctrine()-> getRepository(Produit::class);
        $produits=$repo->findBy(array('categorie'=> $cat));

        $categories = $repo -> getAllCategories();//recup de la fonction getAllCategories depuis 'ProduitRepository.php'
        
        // affichier la vue
        $params =array(
            'produits'=> $produits,
            'categories'=>$categories
        );
        return $this->render('@App/Produit/index.html.twig',$params);



    }



















    
}//fin Class Controller
