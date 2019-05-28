<?php
require_once('autoload.php');

$controller = new controller\Controller;//l'autoload voit passer le mot clef 'new' et fait appel au fichier controller.php et dans un 2em temp, dans le controller.php il y a une instance 'new de entity repository , dans l'autoload s'execute et fait appel
//echo"<pre>";var_dump($controller);echo"</pre>";
$controller->handlerRequest();//on fait appele a la methode handlerRequest se trouvant dans le fichier controller.php



//un declic de logique asse inesperer
//au moins je comprend ce que je fait meme si j'ai pas terminé

?>