<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php
    //While
    //Incrementar un número:
    $num = 0;
    while ($num < 10) {
        echo $num . "<br>";
        $num++;
    }
    //Imprimir todos los números pares menores a 20:
    $num = 0;
    while ($num < 20) {
        if ($num % 2 == 0) {
            echo $num . "<br>";
        }
        $num++;
    }
    //Mostrar una cuenta regresiva de 10 a 1:
    $num = 10;
    while ($num >= 1) {
        echo $num . "<br>";
        $num--;
    }
    //Crear un bucle que finaliza cuando el usuario ingresa "salir":
    while (true) {
        $texto = readline("Por favor, ingrese un texto: ");
        if ($texto == "salir") {
            break;
        }
        echo "Usted ingresó: " . $texto . "<br>";
    }
    //Do..while
    //Incrementar un número:
    $num = 0;
    do {
        echo $num . "<br>";
        $num++;
    } while ($num < 10);
    //Imprimir todos los números pares menores a 20:
    $num = 0;
    do {
        if ($num % 2 == 0) {
            echo $num . "<br>";
        }
        $num++;
    } while ($num < 20);
    //Crear un bucle que finaliza cuando el usuario ingresa "salir":
    do {
        $texto = readline("Por favor, ingrese un texto: ");
        if ($texto == "salir") {
            break;
        }
        echo "Usted ingresó: " . $texto . "<br>";
    } while (true);
    // FOR
    //Incrementar un número:
    for ($num = 0; $num < 10; $num++) {
        echo $num . "<br>";
    }
    //Imprimir todos los números pares menores a 20:
    for ($num = 0; $num < 20; $num++) {
        if ($num % 2 == 0) {
            echo $num . "<br>";
        }
    }
    // FOREACH
    //Usar el foreach para imprimir los valores de un array:
        $frutas = array("naranja", "manzana", "plátano");

        foreach ($frutas as $fruta) {
            echo $fruta . "<br>";
        }
    //Usar el foreach para recorrer y modificar un array asociativo:
        $calificaciones = array("Juan" => 8, "Ana" => 9, "Carlos" => 7);

        foreach ($calificaciones as $nombre => $calificacion) {
            if ($calificacion >= 7) {
                echo $nombre . " aprobó con una calificación de " . $calificacion . "<br>";
            } else {
                echo $nombre . " desaprobó con una calificación de " . $calificacion . "<br>";
            }
        }
    ?>
</body>
</html>