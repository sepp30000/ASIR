<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Valor Mínimo de un Array</title>
</head>
<body>
    <h1>Valor Mínimo de un Array</h1>
    <?php
            function calcular_min($array){
                $minimo = min($array);
                return $minimo;
            }
            $mi_array = [10, 20, 30, 40, 50];
            $resultado_minimo = calcular_min($mi_array);
            echo "El valor máximo del array es: $resultado_minimo";    
    ?>
</body>
</html>