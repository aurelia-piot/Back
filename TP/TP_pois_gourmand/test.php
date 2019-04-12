<?php

echo "<pre>";

var_dump($_GET);

echo "</pre>";

?>

<!DOCTYPE html>

<html lang="en">

<head>

    <meta charset="UTF-8">

    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <style> #bleu{height:250px;background:blue;}#vert{height:250px;background:green;} </style>

    <title>Document</title>

</head>

<body>

    <div>header</div>

    <hr>

    <a href="?action=click">test click</a>

    <hr>

    <?php

    if(empty($_GET)){  

    ?>

    <div id="bleu"></div>

    <?php }else { ?>

    <div id="vert"></div>

    <?php } ?>

    <div>footer</div>

</body>

</html>

