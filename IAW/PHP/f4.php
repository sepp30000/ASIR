<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>La media del array</title>
</head>
<body>
    <h1>La media del array</h1>
    <?php
        function calcular_media($array) {
            $total = count($array);
            $suma = array_sum($array);
            $media = $suma / $total;
            return $media;
        }
        $mi_array = [10, 20, 30, 40, 50]; 
            $resultado_media = calcular_media($mi_array);
        echo "La media del array es: $resultado_media";
    ?>
</body>
</html>