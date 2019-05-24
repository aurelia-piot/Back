<?php
function inclusionAutomatique($nomDeLaClasse){require_once($nomDeLaClasse.'.class.php');
                                                echo $nomDeLaClasse.'<hr>';
                                                echo"on passe dans l'inclusionAutomatique()<hr>";
                                                echo"require_once($nomDeLaClasse.'class.php')<hr>";
}
spl_autoload_register('inclusionAutomatique');
/*
 spl_autoload_register() est une fonction predefinie qui s'execute automatiquement lorsque l'interpreteur voit passer le mot clef 'new'; donc lorsque l'on instancie une classe
 -en plus nous demandons a spl_autoload_register() d'executer notre fonction inclusionAutomatique
spl_autoload_register() recupere tout ce qu'il y apres le 'new' et l'envoi en argument de la fonction inclusionAutomatique(), c'est ce qui permet de faire un bon fichier dans lequel la classes est declarée




*/
//$a =new A;









?>