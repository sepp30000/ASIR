<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php
    //Arrays numéricos: Estos arrays tienen claves numéricas, que generalmente son consecutivas, y pueden contener valores duplicados.
        $numeros = array(1, 2, 3, 4, 5);
        echo $numeros[0]; // imprime 1
        echo $numeros[1]; // imprime 2

    //Arrays asociativos: Estos arrays tienen claves personalizadas y pueden contener valores duplicados.
    $paises = array(
        "es" => "España",
        "fr" => "Francia",
        "it" => "Italia",
        "de" => "Alemania"
    );

echo $paises["es"]; // imprime España
echo $paises["fr"]; // imprime Francia

    //Arrays multidimensionales: Estos arrays pueden contener otros arrays como elementos.

    $personas = array(
        array("nombre" => "Juan", "edad" => 30),
        array("nombre" => "Ana", "edad" => 28),
        array("nombre" => "Pedro", "edad" => 25)
    );

    echo $personas[0]["nombre"]; // imprime Juan
    echo $personas[1]["edad"]; // imprime 28

    //También puedes acceder a los elementos de un array utilizando un bucle foreach:

    $paises = array("España", "Francia", "Italia", "Alemania");

    foreach ($paises as $pais) {
        echo $pais . "<br>";
    }

    //O utilizando un bucle for:

    $paises = array("España", "Francia", "Italia", "Alemania");
    for ($i = 0; $i < count($paises); $i++) {
        echo $paises[$i] . "<br>";
    }
    // Pasar a mayusculas
    $paises = array("España", "Francia", "Italia", "Alemania");
    foreach ($paises as $pais) {
        $pais = strtoupper($pais);
    }
    print_r($paises);
?>
</body>
</html>