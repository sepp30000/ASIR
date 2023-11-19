<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php
    //Funciones
    // función que devuelve el cuadrado de un número
    function cuadrado($numero) {
        return $numero * $numero;
    }

    echo cuadrado(4); // imprime 16
    echo cuadrado(5); // imprime 25

    // función que verifica si un número es par
    function esPar($numero) {
        return $numero % 2 == 0;
    }

    echo esPar(4); // imprime 1 (verdadero)
    echo esPar(5); // imprime 0 (falso)

    // función que calcula la suma de los elementos de un array
    function sumaArray($array) {
        $suma = 0;
        foreach ($array as $valor) {
            $suma += $valor;
        }
        return $suma;
    }

    $numeros = array(1, 2, 3, 4, 5);
    echo sumaArray($numeros); // imprime 15

    //Funcion que imprime un array
    function imprimirArray($array) {
        foreach ($array as $valor) {
            echo $valor . "\n";
        }
    }
    
    $frutas = array("Manzana", "Banana", "Cereza");
    imprimirArray($frutas); // imprime Manzana, Banana, Cereza

    //Calcular la media
    function calcularMedia($array) {
        $suma = 0;
        $totalElementos = count($array);
    
        if ($totalElementos == 0) {
            return 0;
        }
    
        foreach ($array as $valor) {
            $suma += $valor;
        }
    
        return $suma / $totalElementos;
    }
    
    $numeros = array(1, 2, 3, 4, 5);
    echo "La media es: " . calcularMedia($numeros); // imprime La media es: 3
?>

</body>
</html>