//on selectionne le DOM auquel on associe la methode 'ready' qui executera la fonction une fois que la le DOM sera chargé complétement

$(document).ready(function(){
    //on selectionne le bouton submit auquel on associes l'evenement 'click'

//event represente l'enement click
    $('#submit').click(function(event){
        event.preventDefault();//preventDefault() |  fonction predefinie |  permet d'annuler le comportement du bouton submit qui a pour rolede recharger la code de la page
        ajax(); //fonction utilisateur executée ci-dessous
    });

    function ajax()
    {
        var personne = $('#personne').val();//on selectionne le champ input afin de recuperer la valeur saisie dans le champ pour transmettre a la requete ' aller' AJAX
        // on recupere la valeur dans la variable
        console.log(personne);

        var parameters ="personne="+personne;//(recupere la valeur entrer et le place a la place de $personne dans la requete query
        //le personne= correspond au personne du formulaire et le +personne correspond a ça place dans la requete)
        
        //on definit le parametres a envoyer avec la requete 'aller' AJAX
        //"personne=" permet de definir où le parametre va etre envoy dans le fichier php ($personne)


//la methode post de jquery permet d'envoyer des requetes HTTP AJAX, plusieurs parametre
/*
1 URL de destination des reques AJAX
2 Les parametres à fournir à la requete
3 en cas de succués, function(data) recupère les données de la requete 'retour',tout se trouve dans 'data'
4.type de transport de données : JSON

*/

        $.post('ajax2.php',parameters,function(data){
        
    
            $('#resultat').html(data.resultat);// on selectionne la div id 'resultat' et on accroche la message d'erreur ou validation a l'interieur
            //data.resultat -->resultat correspond a l'indice 'resultat' du tableau array $tab['resultat'] du fichier ajax2.php
            $("#personne").val('');//permet de vider le champ input apres la validation du formulaire
        },'json');
    }
});