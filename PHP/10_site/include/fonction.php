<?php
// -------------------- FONCTION MEMBRE ----------------------
function internauteEstConnecte()//fonction qui indique si le membre est connecté
{
    if(!isset($_SESSION['membre'])){return false;}// si l'indice 'membre' n'est pas definit dans la session, cela veut dire que l'internaute n'est pas passé par la page connexion, donc n'est pas connecté
    
    else{return true;}//si l'indice 'membre' est bien definit, on retourne true
}




//------------------FONCTION ADMIN ---------------------------------//


Function internauteEstConnecteEtEstAdmin()
    {
        //si la seesio du membre est definit et que son statut est à 1, cela veut dire qu'il est bien ADMIN et qu'il est bien connecté
        if(internauteEstConnecte() && $_SESSION['membre']['statut']== 1)
        {
            return true;
        }
        else{return false;}    
    }





?>