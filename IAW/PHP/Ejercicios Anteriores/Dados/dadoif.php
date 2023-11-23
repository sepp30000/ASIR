<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php
    // El dado
    $dado = (rand(1, 6));
    // If que muestra la imagen del dado
    if ($dado == 1){
       echo '<img src="./imagenes/Dado1.svg">';
    } elseif ($dado == 2){
        echo '<img src="./imagenes/Dado2.svg"';
    } elseif ($dado == 3){
        echo '<img src="./imagenes/Dado3.svg"';
    } elseif ($dado == 4){
        echo '<img src="./imagenes/Dado4.svg"';
    } elseif ($dado == 5){
        echo '<img src="./imagenes/Dado5.svg"';
    } elseif ($dado == 6){
        echo '<img src="./imagenes/Dado6.svg"';
    }
    ?>
</body>
</html>