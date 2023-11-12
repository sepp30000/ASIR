<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Conversor de Euros a Otras Monedas</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            display: flex;
            align-items: center;
            justify-content: center;
            height: 100vh;
        }

        .container {
            background-color: #fff;
            padding: 20px;
            border-radius: 5px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            text-align: center;
        }

        form {
            margin-top: 20px;
        }

        label, select, input {
            display: block;
            margin-bottom: 10px;
        }

        input[type="text"], select {
            width: 100%;
            padding: 8px;
            box-sizing: border-box;
        }

        button {
            background-color: #4CAF50;
            color: white;
            padding: 10px;
            border: none;
            cursor: pointer;
        }

        button:hover {
            background-color: #45a049;
        }

        .resultado {
            margin-top: 20px;
            font-weight: bold;
            color: #4CAF50;
        }
    </style>
</head>
<body>

    <div class="container">
        <?php
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            if (isset($_POST["cantidad"]) && isset($_POST["moneda"])) {
                $cantidad = $_POST["cantidad"];
                $moneda = $_POST["moneda"];
                
                switch ($moneda) {
                    case "usd":
                        $valor_convertido = $cantidad * 1.325;
                        $moneda_nombre = "dólares USA";
                        break;
                    case "gbp":
                        $valor_convertido = $cantidad * 0.927;
                        $moneda_nombre = "libras esterlinas";
                        break;
                    case "jpy":
                        $valor_convertido = $cantidad * 118.232;
                        $moneda_nombre = "yenes japoneses";
                        break;
                    case "chf":
                        $valor_convertido = $cantidad * 1.515;
                        $moneda_nombre = "francos suizos";
                        break;
                    default:
                        $valor_convertido = 0;
                        $moneda_nombre = "moneda no válida";
                        break;
                }
                
                echo "<h2>Resultado de Conversión</h2>";
                echo "<p>$cantidad euros son aproximadamente $valor_convertido $moneda_nombre.</p>";
            } else {
                echo "<h2>Error</h2>";
                echo "<p>Por favor, introduzca una cantidad en euros y seleccione una moneda.</p>";
            }
        }
        ?>

        <form action="" method="post">
            <label for="cantidad">Cantidad en Euros:</label>
            <input type="text" name="cantidad" id="cantidad" required>
            <label for="moneda">Selecciona la moneda:</label>
            <select name="moneda" id="moneda">
                <option value="usd">Dólares USA</option>
                <option value="gbp">Libras Esterlinas</option>
                <option value="jpy">Yenes Japoneses</option>
                <option value="chf">Francos Suizos</option>
            </select>
            <button type="submit">Convertir</button>
        </form>
        <br>
        <a href="javascript:history.go(-1)">Volver</a>
    </div>

</body>
</html>
