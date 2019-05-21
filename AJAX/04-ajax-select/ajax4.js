$(document).ready(function () {


        var $prenom = $("#personne").text();//on recupere le contenu de la div qui sera envoye comme parametre a la requete AJAX aller
            console.log($prenom);



        var parameters = "prenom="+$prenom;// on definit les parametre à envoyer a la requete AJAX "Aller" qui sera transmit à la requete 
            console.log(parameters);

        /*
        post: methode JQuery permettant d'envoyer des requetes Ajax en http
        argument:
            1. L'url/fichier de destination des requete AJAX
            2. Les parametres envoyés avec la requete AJAX 'aller'
            3.EN cas de succées on receptionne le resultat de la requete AJAX 'retour'(on peut en accumuler plusieurs)
            4.Type de transport de données 'JSon'


        */

        $.post("ajax4.php", parameters, function(data){
            $("#resultat").html(data.table);//on selectionne la div id "resultat" pour y integrer notre tableau($stab['table']) definit dans la page ajax4.php
        },'json'); 

   

});
