<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadenas de texto 1</title>
</head>
<body>
    <h1>Cadena de texto 1</h1>
        <?php
        //Cadena de url
            $cadena = "http://127.0.0.1/cadenas_texto.php?nombre=/Francisco/&prefijo=Fran";
        // Buscamos el nombre. Ejercicio 1
            $nombre = isset($_GET['nombre']) ? trim($_GET['nombre'], '/') : "Tu_nombre_de_pila";
            echo "El nombre limpio es: " . $nombre . "<br>";
        // Longitud de la cadena de texto
            $longitud = strlen($nombre);
            echo "La longitud del nombre es: " . $longitud . "<br>";
        // Mostrar el nombre en Mayúsculas
            $mayusculas = strtoupper($nombre);
            echo "El nombre en mayúsculas: " . $mayusculas . "<br>";
        // Mostrar el nombre en minúsculas
            $minusculas = strtolower($nombre);
            echo "El nombre en minúsculas: ". $minusculas . "<br>";
        // El prefijo está dentro del nombre
            $prefijo = $_GET['prefijo'];
            $dentrode = strpos($nombre,$prefijo);
            if ($dentrode !== false) {
                echo $prefijo . " esta dentro de " . $nombre . "<br>";
            } else {
            }
        // Contar a en el parametro nombre
            $cuantas_A = substr_count($mayusculas,"A");
                echo "El nombre contiene " . $cuantas_A . " As " . "<br>";
        // Posicion de las A
            $pos_A = strpos($mayusculas,'A');
            if ($pos_A !== false) {
                echo "La primera A se encuentra en la posición: " . $pos_A . "<br>";
            } else {
                echo "No se encontró la letra 'A' en el nombre.";
            }
        // Substituye la o por 0
            $sub_o = str_ireplace("O","0",$mayusculas);
            echo $sub_o
        ?>
</body>
</html>