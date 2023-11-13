<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cambio de monedas</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
    <?php
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        // Obtener valores del formulario
        $monto = $_POST["monto"];
        $monedaOrigen = $_POST["tipoDeMonedaOrigen"];
        $monedaDestino = $_POST["tipoDeMonedaDestino"];

        // Lógica de conversión
        $tasaCambio = obtenerTasaCambio($monedaOrigen, $monedaDestino);
        $montoConvertido = $monto * $tasaCambio;

        // Mostrar resultados
        echo "<h3>Resultado de la conversión:</h3>";
        echo "<p>{$monto} {$monedaOrigen} son {$montoConvertido} {$monedaDestino}</p>";
    }

    // Función para obtener la tasa de cambio (puedes personalizar esta función según tus necesidades)
    function obtenerTasaCambio($monedaOrigen, $monedaDestino) {
        // Aquí podrías tener una base de datos o una API para obtener tasas de cambio reales
        // En este ejemplo, usaremos tasas de cambio ficticias
        $tasas = [
            "euro-dolar" => 1.18,
            "dolar-euro" => 0.85,
            "libra-dolar" => 1.39,
            "dolar-libra" => 0.72,
            "libra-euro" => 1.18,
            "euro-libra" => 0.86
        ];

        $clave = strtolower($monedaOrigen) . "-" . strtolower($monedaDestino);

        if (array_key_exists($clave, $tasas)) {
            return $tasas[$clave];
        } else {
            // Si no se encuentra la tasa de cambio, podrías manejar el error de alguna manera
            return 1.0; // Tasa de cambio por defecto
        }
    }
    ?>
    <h2 class="center">Conversor de Moneda</h2>    <form action="<?php echo $_SERVER['PHP_SELF'];?>" method="post">
    <label for="monto">Monto a Convertir: </label><br/>
    <input type="number" id="monto" name="monto"><br/>
    <select name="tipoDeMonedaOrigen" required>
        <option value="" selected disabled hidden>Seleccione una opción</option>
        <option value="dolar">Dólar Americano ($USD)</option>
        <option value="euro">Euro €</option>
        <option value="libra">Libra Esterlina £</option>
    </select><br/>
    <select name="tipoDeMonedaDestino" required>
        <option value="" selected disabled hidden>Seleccione una opción</option>
        <option value="dolar">Dólar Americano ($USD)</option>
        <option value="euro">Euro €</option>
        <option value="libra">Libra Esterlina £</option>
    </select><br/>
    <button type="submit">Convertir</button>
    </form>
</body>
</html>