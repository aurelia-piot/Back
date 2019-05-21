$(document).ready(function () {
    $('#submit').click(function (event) {
        event.preventDefault();
        ajax();
    });

    function ajax() {
        var prenom = $('#prenom').val();
        console.log(prenom);
        var nom = $("#nom").val();
        console.log(nom);
        var sexe = $("#sexe").val();
        console.log(sexe);
        var service = $("#service").val();
        console.log(service);
        var dateembauche = $("#dateembauche").val();
        console.log(dateembauche);
        var salaire = $("#salaire").val();
        console.log(salaire);
    

        var parameters = "prenom="+ prenom + "&nom=" + nom + "&sexe=" + sexe + "&service=" + service + "&dateembauche=" + dateembauche + "&salaire=" + salaire ;
        console.log(parameters);
        

        $.post('ajax6.php', parameters, function(data) {
            $('#resultat').html(data.resultat);
            $("#table").html(data.table);
             $("#formulaire")[0].reset();// reset le formulaire apres chaque enregistrement
            // $("#formulaire").reset(); -- ne fonctionne pas sans les " [] "

            // $("#prenom").val('');
            // $("#nom").val('');
            // $("#dateembauche").val('');
            // $("#service").val('');
            // $("#salaire").val('');
        }, 'json');
    }
});