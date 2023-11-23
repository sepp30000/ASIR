<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadena</title>
</head>
<body>
    <h1>Manejo de cadenas</h1>
    <?php
        $cadena = "uno-dos-tres-cuatro-cinco";
        // Separarlos con guion
        $elementos = explode("-", $cadena);
        //Contar los elementos
        $n_elementos = count($elementos);
        echo "Numero de elementos en la cadena es: $n_elementos";
    ?>
    <ul>
        <?php
        foreach ($elementos as $elemento) {
            echo "<li>$elemento</li>";
        }
        ?>
    </ul>
</body>
</html>