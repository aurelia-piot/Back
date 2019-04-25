<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

    <title>Document</title>
</head>
<body>
    

<?php echo'<pre>';print_r($_GET);echo'</pre>';



echo '<div class ="col-md-3 offset-md-5 alert alert-info text-dark mx-auto text-center ">';
echo "<h1>Detail du film n° <strong>$_GET[id_film]</strong></h1>";
    foreach($_GET as $key => $value)
        {
            if($key != 'id_film') 
            {
               echo "<hr><strong>$key</strong>: $value <br>"; 
            }
        }

echo '</div>'  ;





?>



</body>
</html>