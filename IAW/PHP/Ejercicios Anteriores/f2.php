<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Las tablas de multiplicar</title>
</head>
<body>
    <h1>Las tablas de multiplicar</h1>
<?php
    function tablaMultiplicar($numero) {
        for ($i = 1; $i <= 10; $i++) {
            $resultado = $numero * $i;
            echo "$numero x $i = $resultado <br>";
        }
    }

    function tablasMultiplicarRango($inicio, $fin) {
        for ($i = $inicio; $i <= $fin; $i++) {
            echo "Tabla de multiplicar del $i <br>";
            tablaMultiplicar($i);
            echo "<br>";
        }
    }

tablasMultiplicarRango(3, 6);
?>

</body>
</html>