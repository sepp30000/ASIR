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
    switch ($dado){
        case 1:
            echo '<img src="./imagenes/Dado1.svg">';
            break;
        case 2:
            echo '<img src="./imagenes/Dado2.svg">';
            break;
        case 3:
            echo '<img src="./imagenes/Dado3.svg">';
            break;
        case 4:
            echo '<img src="./imagenes/Dado4.svg">';
            break;
        case 5:
            echo '<img src="./imagenes/Dado5.svg">';
            break;
        case 6:
            echo '<img src="./imagenes/Dado6.svg">';
            break;
        }
    ?>
</body>
</html>