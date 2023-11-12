<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Euros a ?</title>
    <style>
        .error {
            color: red;
        }
    </style>
</head>
<body>
    <?php
        // Definición de las variables
        $cantidadErr = $yuanErr = $dolarErr = $libraErr = $yenErr = "";
        $cantidad = $yuan = $dolar = $libra = $yen = "";

        function test_input($data) {
            $data = trim($data);
            $data = stripslashes($data);
            $data = htmlspecialchars($data);
            return $data;
        }

        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            if (empty($_POST["cantidad"])) {
                $cantidadErr = "Inserta un valor válido";
            } else {
                $cantidad = test_input($_POST["cantidad"]);
                // Solo acepta números
                if (!preg_match("/^\d+(\.\d+)?$/", $cantidad)) {
                    $cantidadErr = "Solo acepta números";
                }
            }

            if (empty($_POST["monedas"])) {
                $yuanErr = "Selecciona una moneda";
            } else {
                $selectedCurrency = test_input($_POST["monedas"]);

                switch ($selectedCurrency) {
                    case "yuan":
                        $yuan = $cantidad;
                        break;
                    case "dolar":
                        $dolar = $cantidad;
                        break;
                    case "libra":
                        $libra = $cantidad;
                        break;
                    case "yen":
                        $yen = $cantidad;
                        break;
                    default:
                        break;
                }
            }
        }
    ?>

    <header>
        <h1>Conversor euros a la moneda que elijas</h1>
    </header>

    <p><span class="error">* Campos requeridos</span></p>

    <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
        Cantidad: <input type="text" name="cantidad" value="<?php echo $cantidad;?>">
        <span class="error">* <?php echo $cantidadErr;?></span>
        <br><br>

        <label for="monedas">Elige una moneda:</label>
        <select name="monedas" id="coin">
            <option value="yuan">Yuan</option>
            <option value="dolar">Dólares</option>
            <option value="libra">Libras esterlinas</option>
            <option value="yen">Yen</option>
        </select>
        <span class="error">* <?php echo $yuanErr;?></span>
        <br><br>

        <input type="submit" value="Convertir">
    </form>
    <?php
        if ($_SERVER["REQUEST_METHOD"] == "POST") {

            echo "<h2>Tus resultados:</h2>";
            echo "<div class='result-container'>";
        }
    ?>
</body>
</html>
