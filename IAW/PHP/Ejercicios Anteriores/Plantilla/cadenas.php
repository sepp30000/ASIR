<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php
    //Cadenas
    //strlen(): devuelve la longitud de una cadena.
        $texto = "Hola Mundo";
        echo strlen($texto); // Devuelve 10

    //strpos(): busca la posición de la primera aparición de una subcadena en una cadena.
        $texto = "Hola Mundo";
        echo strpos($texto, "Mundo"); // Devuelve 6

    //substr(): devuelve parte de una cadena.
        $texto = "Hola Mundo";
        echo substr($texto, 0, 5); // Devuelve "Hola"

    //str_replace(): reemplaza todas las apariciones de un valor en una cadena.
        $texto = "Hola Mundo";
        echo str_replace("Mundo", "PHP", $texto); // Devuelve "Hola PHP"

    //strtolower(): convierte todos los caracteres de una cadena a minúsculas.
        $texto = "Hola Mundo";
        echo strtolower($texto); // Devuelve "hola mundo"

    //strtoupper(): convierte todos los caracteres de una cadena a mayúsculas.
        $texto = "Hola Mundo";
        echo strtoupper($texto); // Devuelve "HOLA MUNDO"

    //trim(): elimina espacios en blanco al inicio y al final de una cadena.
        $texto = " Hola Mundo ";
        echo trim($texto); // Devuelve "Hola Mundo"
    ?>
</body>
</html>