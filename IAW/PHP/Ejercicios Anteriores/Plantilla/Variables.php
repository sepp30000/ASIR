<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php
    //Variables
        //En cadena
            $nombre = "Juan";
            $apellido = "Pérez";
            echo"".$nombre." ".$apellido."";
        //Numericas
            $edad = 30;
            $numero = 456;
            echo "".$edad.";".$numero."";
        //booleanas
            $estudiante = true;
            $empleado = false;
            echo"".$estudiante.";".$empleado."";
        //Matriz o array
            $colores = array("rojo", "verde", "azul");
            print_r($colores);
    //Comprobacion de variables
            //Ver tipo
            $numero = 123;
            echo gettype($numero); // Devuelve "integer"
            //Ver tipo y cambiarlo
            $variable = 123;
            echo gettype($variable); // Devuelve "integer"

            settype($variable, 'string');
            echo gettype($variable); // Devuelve "string"
            //Array
            $arr = array(1, 2, 3);
            if (is_array($arr)) {
                echo "Es un array";
            } else {
                echo "No es un array";
            }
            //Booleano
            $bol = true;
            if (is_bool($bol)) {
                echo "Es un booleano";
            } else {
                echo "No es un booleano";
            }
            // FLOAT
            $coma = 123.45;
            if (is_float($coma)) {
                echo "Es un número de punto flotante";
            } else {
                echo "No es un número de punto flotante";
            }
            //Entero
            $entero = 123;
            if (is_integer($entero)) {
                echo "Es un número entero";
            } else {
                echo "No es un número entero";
            }
            //Nulo
            $variable = null;
            if (is_null($variable)) {
                echo "Es nulo";
            } else {
                echo "No es nulo";
            }
            //numerico
            $variable = '123';
            if (is_numeric($variable)) {
                echo "Es numérico";
            } else {
                echo "No es numérico";
            }
            //Cadena
            $variable = 'Hola, mundo';
            if (is_string($variable)) {
                echo "Es una cadena de caracteres";
            } else {
                echo "No es una cadena de caracteres";
            }
?>
</body>
</html>