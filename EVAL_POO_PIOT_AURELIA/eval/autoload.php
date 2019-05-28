<?php
class Autoload
{                                   //controller\Controller;
    public static function className($className)        //||
    {                                                  // ||
                                                //new controller\Controller;
        require __DIR__.'/'.str_replace('\\','/',$className.'.php');//pour aller chercher un fichier
        //str_replace() permet de remplacer les anti-slash '\', nous avons deux anti slash, sinon l'interpreter considere que c'est un caractere d'echappement
    // il est la--->    echo " require ".__DIR__.'/'.str_replace('\\','/',$className.'.php');
    }
}
spl_autoload_register(array('Autoload','className'));
//s'execute lorsque l'interpreteur voit passer le mot clef 'new' et la fonction 'callName()' est executee dans le meme temps
//controller\controller: envoye en argument de la methode 'className'














//$a = new Controller\Controller;// au moment de l'instanciation, l'autoload s'execute et va chercher dans le dossier 'Controller' le fichier 'controller.phpe, d'où l'importance du nommage des dossiers et des fichiers
//le namespace doit avoir le meme nom que le dossier

//exo faire le meme affichage avec la ligne suivante:
//$b = new Model\EntityRepository

?>