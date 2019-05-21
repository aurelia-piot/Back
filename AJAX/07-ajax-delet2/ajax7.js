$(document).ready(function () {
    $('#submit').click(function (event) {
        event.preventDefault();
        ajax();
    });

    function ajax() {
        var id = $('#personne').val();
        console.log(id);

        var parameters = "id=" + id;
        console.log(parameters);


        $.post('ajax7.php',parameters, function (data) {

            $('#selector').html(data.select);//selector            
            $("#table").html(data.table);//tableau
            $('#reponse').html(data.reponse);
        }, 'json');
    }
});