$(document).ready(function() {
  // on écoute l'évènement
  $("#submit").click(function(e) {
    //on empêche le rechargement de la page:
    e.preventDefault();
    //on lance la fonction que l'on souhaite exécuter:
    afficheProduit();
  });

  function afficheProduit() {
    var resultat = $("#resultat").val();
    //  console.log(resultat);
    var parameters = "resultat = " + resultat;
    // console.log(parameters);
    $.post(
      "exo_ajax_page2.php",
      parameters,
      function(data) {
        $("#resultat").html(data.resultat);
      },
      "json"
    );
  } //FIN function afficheProduit()
}); //FIN $(document).ready(function ()
