$(document).ready(function () {
    $('#submit').click(function (event) {
        event.preventDefault();
        ajaxselect(); //pour chaque click sur le bouton on execute la fonction ajaxdelete() declarer ci dessous
    });

    function ajaxselect() {
        var id = $('#personne').val();//on selectionne le selecteur id 'personne' afin de recupérer l'id de l'employé selectionné
        console.log(id);

        var parameters = "id=" + id;// on definit les parametre à envoyer a la requete AJAX "Aller" qui sera transmit à la requete de suppression PHP dans le fichier ajax3.php
        console.log(parameters);

        /*
        post: methode JQuery permettant d'envoyer des requetes Ajax en http
        argument:
            1. L'url de destination des requete AJAX
            2. Les parametres envoyés avec la requete AJAX 'aller'
            3.EN cas de succées on receptionne le resultat de la requete AJAX 'retour'(on peut en accumuler plusieurs)
            4.Type de transport de données 'JSon'


        */

        $.post("ajax5.php", parameters, function (data) {
            $('#resultat').html(data.table);
            // on selectionne la div id'employes' et on remplace le selecteur initial par le selecteur mis à jour, on ecrase un selecteur par un autre
       
            //on selection la dic id #reponse afin d'envoyer via la requete AJAX 'retour' le message de validation
        }, 'json');

    }

});