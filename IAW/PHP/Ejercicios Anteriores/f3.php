<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Generador de Números Aleatorios</title>
</head>
<body>
    <h1>Generador de Números Aleatorios</h1>
    <?php
        // Definir una función para crear un array con números aleatorios
        function generar_array_aleatorio($numero_de_elementos, $minimo, $maximo){
            $resultado = array(); // Crear un espacio para almacenar los números.

            for ($i = 0; $i < $numero_de_elementos; $i++){
                $numero_aleatorio = random_int($minimo, $maximo); // Generar un número aleatorio.
                $resultado[] = $numero_aleatorio; // Añadir el número al conjunto de resultados.
            }

            return $resultado; // Devolver el array completo.
        }

        $mi_array = generar_array_aleatorio(10, 1, 100); // Generar un array de 10 números entre 1 y 100.
        echo "<pre>"; // Mostrar el array de manera legible.
        print_r($mi_array); // Mostrar el array resultante.
        echo "</pre>";
    ?>
</body>
</html>
