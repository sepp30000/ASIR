<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php
    <?php
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        // Obtener los datos del formulario
        $nombre = $_POST["nombre"];
        $nota1 = $_POST["nota1"];
        $nota2 = $_POST["nota2"];
        $nota3 = $_POST["nota3"];
    
        // Validar que el nombre no contenga números
        if (preg_match('/[0-9]/', $nombre)) {
            echo "El nombre no puede contener números.";
            exit;
        }
    
        // Validar que las notas sean números
        if (!is_numeric($nota1) || !is_numeric($nota2) || !is_numeric($nota3)) {
            echo "Las notas deben ser números.";
            exit;
        }
    
        // Validar que las notas estén dentro del rango
        if ($nota1 < 0 || $nota1 > 10 || $nota2 < 0 || $nota2 > 10 || $nota3 < 0 || $nota3 > 10) {
            echo "Las notas deben estar en el rango de 0 a 10.";
            exit;
        }
    
        // Validar el formato del correo electrónico
        $correo = $_POST["correo"];
        if (!filter_var($correo, FILTER_VALIDATE_EMAIL)) {
            echo "El formato del correo electrónico no es válido.";
            exit;
        }
        // Validar el formato del DNI (ejemplo para DNI español)
        if (!preg_match('/^[0-9]{8}[A-Za-z]$/', $dni)) {
            echo "El formato del DNI no es válido.";
            exit;
        }
        //Validar web
        if (empty($_POST["website"])) {
            $website = "";
          } else {
            $website = test_input($_POST["website"]);
            // check if URL address syntax is valid (this regular expression also allows dashes in the URL)
            if (!preg_match("/\b(?:(?:https?|ftp):\/\/|www\.)[-a-z0-9+&@#\/%?=~_|!:,.;]*[-a-z0-9+&@#\/%=~_|]/i",$website)) {
              $websiteErr = "Invalid URL";
            }
          }
    
        // Calcular la media
        $media = ($nota1 + $nota2 + $nota3) / 3;
    
        // Mostrar los resultados
        echo "Nombre: $nombre<br>";
        echo "Nota 1: $nota1<br>";
        echo "Nota 2: $nota2<br>";
        echo "Nota 3: $nota3<br>";
        echo "Media: $media<br>";
        echo "Correo electrónico: $correo";
        echo "DNI: $dni";
        echo "web: $website"
    }
    ?>
    ?>
</body>
</html>