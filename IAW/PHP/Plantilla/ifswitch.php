<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<?php
$number = 5;

// Uso básico de if en PHP
if ($number > 0) {
    echo "El número es positivo";
}

// Puedes utilizar else con if
if ($number < 0) {
    echo "El número es negativo";
} else {
    echo "El número es 0";
}

// También puedes utilizar elseif
if ($number > 10) {
    echo "El número es mayor a 10";
} elseif ($number > 5) {
    echo "El número es mayor a 5";
} else {
    echo "El número es menor o igual a 5";
}

// También puedes anidar if dentro de elseif
if ($number > 20) {
    echo "El número es mayor a 20";
} elseif ($number > 15) {
    echo "El número es mayor a 15";
} elseif ($number > 10) {
    echo "El número es mayor a 10";
} else {
    echo "El número es menor o igual a 10";
}

// Puedes utilizar operadores de comparación lógica
if ($number == 5) {
    echo "El número es igual a 5";
}

// Puedes utilizar el operador ternario en PHP
$message = ($number > 0) ? "El número es positivo" : "El número es negativo";
echo $message;
?>

<?php

//switch y case
$number = 5;

// Uso básico de switch en PHP
switch ($number) {
    case 1:
        echo "El número es 1";
        break;
    case 2:
        echo "El número es 2";
        break;
    case 3:
        echo "El número es 3";
        break;
    default:
        echo "El número no es 1, 2 ni 3";
}

// Puedes utilizar expresiones en las condiciones de los case
switch (true) {
    case $number > 0:
        echo "El número es positivo";
        break;
    case $number < 0:
        echo "El número es negativo";
        break;
    default:
        echo "El número es 0";
}

// También puedes utilizar el operador break con etiquetas
label1:
switch ($number) {
    case 1:
        echo "El número es 1";
        break 1; // Sale del switch
    case 2:
        echo "El número es 2";
        break 1; // Sale del switch
    case 3:
        echo "El número es 3";
        break 1; // Sale del switch
    default:
        echo "El número no es 1, 2 ni 3";
}

// Puedes utilizar operadores de comparación lógica en los case
switch (true) {
    case $number == 1:
        echo "El número es igual a 1";
        break;
    case $number == 2:
        echo "El número es igual a 2";
        break;
    case $number == 3:
        echo "El número es igual a 3";
        break;
    default:
        echo "El número no es 1, 2 ni 3";
}
?>
</body>
</html>