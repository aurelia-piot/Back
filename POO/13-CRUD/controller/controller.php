<?php
// le fichier controller.ph contient toute les action et les methode a executée, Par exemple si je souhaite afficher les info 10 par 10, c'est dans ce fichier que l'on fera ce traitement
namespace Controller;

class Controller
{
    private $db;
    public function __construct()
    {
        $this->db = new \model\EntityRepository;
        //permet de recupere une connexion a la BDD qui se trouve dans le fichier EntityRepository
    }
    public function handlerRequest()
        {
            $op =isset($_GET['op'])?$_GET['op']:NULL;//si l'indice op est definit dans l'url on le recupere dans une variable, sinon on stock 'null'
            try{
                if($op =='add' || $op =='update')$this->save($op);//si on ajoute ou modifie un employe, on appel la methode save()
                elseif($op =='select') $this->select();//si on selectionne un employer on fait appel a la methode select()
                elseif($op =='delete') $this->delete();//si on supprime un employer on fait appel a la methode delete()
                else $this->selectAll(); //permet d'afficher l'ensemble des employes
            }
                catch(Exception $e){
                    die("probleme dans l'action de l'internaute!");
            }
        }
    public function selectAll(){
            // echo 'Methode selectAll';
            // $r = $this->db->selectAll();
            // echo"<pre>";print($r);echo"</pre>";
            // //db--> represent un objet issu de la class EntityRepository
            // //db->selectAll(): on pointe sur la methode selectAll() declarée dans la class EntityRepository
            $this->render("layout.php","donnees.php",array(
            "title"=> "toutes les données",
            "donnees" => $this->db->selectAll(),
            'fields'=>$this->db->getFields(),//on pointe sur la methode declaree dans EntityRepository.php
            'id' => 'id' .ucfirst($this->db->table)//affiche idEmploye, cela servira a pointe sur l'indice idEmploye du tableau de donnée envoyer dans le layout pour les liens voir/modifier/supprimer
        ));
            //on pointe sur la methode declarée dans EntityRepository.php

        }
    public function save($op)
        {
            $title=$op;//permet de recupere le donnée envoyeé dans l'url et de la stocké dans $title

            if($_POST)
                {
                    //--------------------en cas de validation on execute la methode 'save'
                    $r=$this->db->save();//lorsque l'on valide le formulaire d'ajout, on execute la methode save() du fichier EntityRepository
                }
                $this->render('layout.php','donnees-form.php',array(
                    "title"=>"Donnée : $title",
                    "op"=>$op,
                    "fields"=>$this->db->getFields()
                ));
        }
    public function render($layout, $template,$parameters = array())
        {
            extract($parameters);//permet d'avoir les indices du tableaux comme variable
            ob_start();//commence la temporisation

            require "view/$template";
            //$content =require "view/$template";
            $content=ob_get_clean(); // tout se qui se trouve dans le template sera stocké dans $content grace à la fonction ob_get_clean()
            // ob_start & ob_get_clean fonction predefini
            ob_start();//temporise la sortie de l'affichage
            require "view/$layout";
            return ob_end_flush();//permet de libere l'affichage et fait tout apparaitre sur la page
        }






    }







?>