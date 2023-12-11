<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php

    include "persona.php";

    $juan = new Persona("Juan", "Rojo", "Azul","33");
    $paco = new Persona("Paco", "Si", "No","33");

    echo $juan->imprimir();
    echo $paco->imprimir();

    echo "<h2>Ahora modificamos los apellidos</h2>";

    $juan->set_edad("25");
    $paco->set_apellido1("Tal");

    echo $juan->imprimir();
    echo $paco->imprimir();

    ?>
</body>
</html>