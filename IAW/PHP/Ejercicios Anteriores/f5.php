<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Valor máximo de un Array</title>
</head>
<body>
    <h1>Valor Mínimo de un Array</h1>
    <?php
        function calcular_max($array){
            $maximo = max($array);
            return $maximo;
        }
        $mi_array = [10, 20, 30, 40, 50];
        $resultado_maximo = calcular_max($mi_array);
        echo "El valor máximo del array es: $resultado_maximo";

    ?>
</body>
</html>