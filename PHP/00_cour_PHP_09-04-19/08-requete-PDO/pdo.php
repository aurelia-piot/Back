<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

    <title>Requete PDO</title>
</head>
<body>
    <div class="container">
        <h2 class="display-4 text-center">01. PDO : Connexion</h2><hr>
    <?php 
        // class PDO
        // {
        //     // méthodes (fonctions)
        //     // propriétés (varaibles)
        //     public function query(){
                // traitement...
        //     }
        // }
        // connexion BDD :
        $pdo = new PDO('mysql:host=localhost;dbname=entreprise', 'root', '', array(PDO::ATTR_ERRMODE => PDO::ERRMODE_WARNING, PDO::MYSQL_ATTR_INIT_COMMAND =>'SET NAMES utf8'));

        /*
            PDO est un classe prédéfinie en PHP qui permet de se connecter à une base de donnée. Cette classe possède ses propres méthodes (fonctions) qui nous permettrons par exmple de formuler et d'executer une requete SQL
            $pdo est l'objet qui permet d'intéragir, d'interroger la BDD

            arguments : 1 (serveur + BDD) / 2 (identifiant) / 3 (mdp) / 4 (options PDO)
        */

        echo '<pre>'; var_dump($pdo); echo'</pre>'; // affiche l'objet PDO
        echo '<pre>'; print_r(get_class_methods($pdo)); echo'</pre>';// affiche les méthodes issu de la classe prédéfinie PDO

        echo '<hr><h2 class="display-4 text-center">02. PDO : EXEC - INSERT / UPDATE / DELETE </h2><hr>';
        // Exo : formuler la requete permettant de vous insérer dans la BDD entreprise donc dans la table employes

        // INSERT
        // $true n'est pas définie, donc on entre pas dans la condition
        if(isset($true)) // permet de ne plus avoir l'insert à chaque rechargement de page
        {
            $resultat = $pdo->exec("INSERT INTO employes (prenom,nom,sexe,service,date_embauche,salaire) VALUES ('Grégory', 'LACROIX', 'm', 'PDG', '2019-04-09', 15000)");
            echo "Nombre d'enregistrement affecté(s) par l'INSERT : $resultat<br>";
            echo "Dernier ID généré : " . $pdo->lastInsertId() . '<hr>';
        }
        

        /*
            EXEC() est une méthode issue de la classe prédéfinie PDO, elle permet de formuler et executer des requètes SQL, c'est en argument (entre les parenthèses de la méthode) que l'on envoi la requete complète
            EXEC() est prévu pour des requetes ne retournant pas de jeu de résultats (INSERT / UPDATE / DELETE)
        */

        // UPDATE 
        // Exo : réaliser le traitement permettant de modifier le salaire de l'employé n° 350 par 1200
        $resultat = $pdo->exec("UPDATE employes SET salaire = 1200 WHERE id_employes = 350");
        echo "Nombre d'enregistrement affecté(s) par l'UPDATE : $resultat<br>";

        // DELETE 
        // Exo : réaliser le traitement permettant de supprimer l'employé n° 350
        $resultat = $pdo->exec("DELETE FROM employes WHERE id_employes = 350");
        echo "Nombre d'enregistrement affecté(s) par le DELETE : $resultat<br>";

        echo '<hr><h2 class="display-4 text-center">03. PDO : SELECT + FETCH_ASSOC (1 seul résultat)</h2><hr>';
        
        $result = $pdo->query("SELECT * FROM employes WHERE id_employes = 415");

        echo '<pre>'; var_dump($result); echo '</pre>';
        echo '<pre>'; print_r(get_class_methods($result)); echo '</pre>';

        $employe = $result->fetch(PDO::FETCH_ASSOC); // retourne un tableau ARRAY indexé avec le nom des champs
        //$employe = $result->fetch(PDO::FETCH_NUM); // retourne un tableau ARRAY indexé numériquement
        //$employe = $result->fetch(PDO::FETCH_BOTH); // retourne un tableau ARRAY indexé à la fois numériquement et avec le nom des champs
        // il n'est pas possible d'associer 2 fois la même méthode sur le même résultat
        echo '<pre>'; print_r($employe); echo '</pre>';

        // Exo : afficher les informations à l'aide d'un affichage conventionnel en excluant l'id_employes
        echo '<div class="col-md-4 offset-md-4 mx-auto alert alert-success text-center">';
        foreach($employe as $key => $value)
        {
            if($key != 'id_employes')
            {
                echo "$key : $value <hr>";
            }
        }
        echo '</div>';

        /*
        QUERY() est une méthode issue de la classe PDO qui permet de formuler et d'executer des requetes SQL. Elle est prévu pour des requetes retournant un jeu de résultat (SELECT)
        Lorsqu'on execute une requete de selection, on obtient toujours en retour un autre objet, issu d'une autre classe : PDOStatement.
        Cette classe possède ses propres propriétés et méthode
        La méthode fetch() permet de rendre le résultat exploitable sous forme de tableau de données ARRAY. 
        */

        echo '<hr><h2 class="display-4 text-center">04. PDO : QUERY + SELECT + WHILE (plusieurs résultats)</h2><hr>';

        $resultat = $pdo->query("SELECT * FROM employes");

        echo "<pre>"; var_dump($resultat); echo "</pre>"; 

        // En executant une requete de selection, on obtient en retour un objet PDOStatement, cet objet est inexploitable en l'état, on lui associe donc la méthode FETCH qui retourne un tableau
        // Pour récupérer l'ensemble des employés, dans ce cas précis , nous sommes obligé de boucler
        // La boucle while permet de dire : tant qu'il y a des employes, on boucle!! 
        // $employes receptionne un tableau ARRAY d'un employé par tour de boucle 
        // PDO::FETCH_ASSOC --> le '::' permettent de faire appel à une constante de la classe PDO sans devoir l'instancier
        while($employes = $resultat->fetch(PDO::FETCH_ASSOC))
        {
           //echo "<pre>"; print_r($employes); echo "</pre>"; 
            echo '<div class="col-md-4 offset-md-4 mx-auto alert alert-info text-center">';
            echo $employes['nom'] . '<hr>'; // pour chaque tour de boucle, donc pour chaque tableau ARRAY, on va crocheter aux différents indices
            echo $employes['prenom'] . '<hr>';
            echo $employes['service'] . '<hr>';
            echo $employes['salaire'];
            echo '</div>';
        }

        echo '<hr><h2 class="display-4 text-center">05. PDO : QUERY + FETCHALL + FETCH_ASSOC (plusieurs résultats)</h2><hr>';

        $resultat = $pdo->query("SELECT * FROM employes");

        $donnees = $resultat->fetchAll(PDO::FETCH_ASSOC);// fetchAll() retourne un tableau multidimensionnel aveec chaque tableau (de chaque employé) indexé numériquement

        echo '<pre>'; print_r($donnees); echo '</pre>';

        // Exo : afficher successivement les données de chaque employé à l'aide de boucle foreach (indice : boucle imbriquée)
        // $tab receptionne un tableau ARRAY d'un employé par tour de boucle           // [0]  => ARRAY
        foreach($donnees as $key => $tab)
        {
            echo '<div class="col-md-4 offset-md-4 mx-auto alert alert-warning text-center">';
            // La boucle foreach permet de passer en revue chaque tableau de chaque employé 
                // ARRAY    [nom] => 'Grégory'
            foreach($tab as $key2 => $value)
            {
                echo "$key2 : $value <hr>";
            }
            echo '</div>';
        }

        echo '<hr><h2 class="display-4 text-center">06. PDO : QUERY + FETCH + BDD </h2><hr>';
        // Exo : afficher la liste des base de données, puis les mettre dans une liste ul li

        



        
        
        

        

        




?>
    </div>
</body>
</html>