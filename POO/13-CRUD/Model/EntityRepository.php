<?php

namespace Model;

class EntityRepository
{
   private $db;
   public $table;
   public function getDb() // methode permettant d'instancier la class PDO et de crée un objet PDO
   {
       if(!$this->db)//seulement si $thid->db n'est pas rempli, si il n'y a pas de connexion BDD, alors on la construit
       {
            try
            {
                    $xml = simplexml_load_file('app/config.xml');
                   // echo"<pre>";print_r($xml);echo"</pre>";
                   $this->table = $xml->table; // on associe le nom de la table du chier xml a la propriete $table de la class, cette propriete nous servira pour toutes nos requetes SQL( INSERT INTO $this->table)
                    try
                    {
                        $this->db=new \PDO("mysql:dbname=".$xml->db.";host=".$xml->host,$xml->user,$xml->password,array(\PDO::ATTR_ERRMODE => \PDO::ERRMODE_EXCEPTION));
                        //connexion a la bdd , nous n'auron pas besoin de modifier ce code, c'est un code generique, c'est le fichier config.xml que l'on modifira pour changer de bdd
                       // echo"<pre>";var_dump($this->db);echo"</pre>";
                    }
                    catch(\PDOExeception $e)//on entre dans le 'catch' en cas de mauvaise connexion
                    {
                        die("probleme de connexion BDD !!");
                    }
            }
            catch(\PDOExeception $e)// "\" permet le temp de la ligne de sortir de l'espace global 
            {
                die("Probleme, fichier XML manquant !");
            }
       }
   return $this->db;//on retourne la connexion    
   }

   public function selectAll()//methode permettant de selectioner tout les employé
   {  
       //$q = $bdd->query("SELECT * FROM employe");
       $q = $this->getDb()->query("SELECT * FROM " . $this->table);
    //    $this->getDb(): represente un ojet PDO donc une connexion a la BDD
    // $this->table: represente dasn notre cas la table 'employe, c'es ce que l'on a recupere du fichier config.xml
       $r=$q->fetchAll(\PDO::FETCH_ASSOC);
       return $r;
   }
   public function getFields()//methode permettant de recupere le nom des champs/colonnes de la table 'employe'
   {
       $q =$this-> getDb()->query("DESC ".$this->table);//DESC : description de la table
       $r=$q->fetchAll(\PDO::FETCH_ASSOC);
       return array_splice($r,1);//permet de retirer le champ Id_employe dans le fromulaire
   }


   public function save()
    {
        $id=isset($_GET['id'])?$_GET['id']:"NULL";
        $q=$this->getDb()->query('REPLACE INTO'. $this->table . '(id' . ucfirst ($this->table) . ',' . implode(',', array_keys($_POST)) . ')VALUES (' . $id . ',' . "'" . implode("','", $_POST) . "'" . ')');
        //$this->table: retourne la table 'employe'
        //id.ucfirst($this->table) = id_employe
        // implode(',',array_keys($_POST)) extrait chaque indice du formulaire afin de les appeler comme nom de champ/colonne dans la requete, separer par une virgule
    }









}





$e = new EntityRepository;
$e->getDb();