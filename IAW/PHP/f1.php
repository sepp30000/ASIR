<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php
        function tablaMultiplicar($numero) {
            for ($i = 1; $i <= 10; $i++) {
                $resultado = $numero * $i;
                echo "$numero x $i = $resultado <br>";
            }
        }
    tablaMultiplicar(5);
    ?>
</body>
</html>