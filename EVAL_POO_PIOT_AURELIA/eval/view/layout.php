<?php
extract($_GET);
extract($_POST);
?>
<!doctype html>
<html lang="fr">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
<!-- lien fontAwesome -->
<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.2/css/all.css" integrity="sha384-oS3vJWv+0UjzBfQzYUhtDYW+Pj2yciDJxpsK1OYPAYjqT085Qq/1cq5FLXAZQ7Ay" crossorigin="anonymous">


    <title><?= $title ?></title>
  </head>
  <body>
    <!-- 
    Le layout est le template principal de l'application, vous pouvez le personnaliser en y intégrant une navbar, un footer et une section au milieu
    -->
    <nav class="navbar navbar-expand-md navbar-dark bg-dark">
    <a class="navbar-brand" href="#">Expand at md</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarsExample04" aria-controls="navbarsExample04" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarsExample04">
        <ul class="navbar-nav mr-auto">
        <li class="nav-item ">
            <a class="nav-link" href="?action=conducteur">conducteur <span class="sr-only">(current)</span></a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="?action=vehicule">vehicule</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="?action=association_vehicule_conducteur">association_vehicule_conducteur</a>
        </li>
        <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" id="dropdown04" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Dropdown</a>
            <div class="dropdown-menu" aria-labelledby="dropdown04">
            <a class="dropdown-item" href="?action=conducteur">conducteur</a>
            <a class="dropdown-item" href="?action=vehicule">vehicule</a>
            <a class="dropdown-item" href="?action=association_vehicule_conducteur">association_vehicule_conducteur</a>
            </div>
        </li>
        </ul>
        <form class="form-inline my-2 my-md-0">
        <input class="form-control" type="text" placeholder="Search">
        </form>
    </div>
    </nav>







<!-- --------------------------------------------------------- -->

                <!-- CONDUCTEUR -->

<!-- 
<button type="submit"class="col-md-4 offset-md-2 btn btn-outline-primary"><a href="?action=vehicule">VEHICULE</a></button>

// if($_GET['action']=='conducteur'):?>
        <section class="container">
        <h1 class="display-4 text-center mt-4">< //$title </h1><hr>
        // $content 
    </section> -->



<!-- --------------------------------------------------------- -->

                <!-- VEHICULE

<button type="submit"class="col-md-4 offset-md-2 btn btn-outline-primary "><a href="?action=conducteur">CONDUCTEUR</a></button>



 //elseif($_GET['action']=='vehicule')
        <section class="container">
        <h1 class="display-4 text-center mt-4" //$title ?></h1><hr>
        // $conten
    </section> -->






    <!-- ---------------------------------------------------------- -->

                    <!-- BASE -->

<?php //else:?>


<div><a type="submit"class="col-md-9 offset-md-2 btn btn-outline-primary  btn-large btn-warning mb-2" href="?action=association_vehicule_conducteur">association_vehicule_conducteur</a></div>

<a href="?action=conducteur"class="col-md-4 offset-md-2 btn btn-outline-primary btn-large btn-warning mb-2"type="submit">CONDUCTEUR</a>
<a href="?action=vehicule"class="col-md-4 offset-md-1 btn btn-outline-primary btn-large btn-warning mb-2"type="submit">VEHICULE</a>


    <section class="container">
        <h1 class="display-4 text-center mt-4"><?= $title ?></h1><hr>
        <?= $content ?>
    </section>



<?php// endif;?>



    <!-- ---------------------------------------------------------- -->

    <footer class="bg-dark text-center text-white p-3">
        &copy; 2019 - Peter Piot , Welcome Here !!! <small>meme si personne ne doit me connaitre</small>
    </footer>

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
  </body>
</html>