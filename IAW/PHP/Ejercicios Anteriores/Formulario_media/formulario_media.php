<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Calculamos la media</title>
    <link rel="stylesheet" type="text/css" href="style.css">

</head>
<body>
        <?php
            // definimos las variables
            $nombreErr = $correoErr = $dniErr = $practica1Err = $practica2Err = $practica3Err = $practica4Err = $examen1Err = $examen2Err = $examen3Err = "";
            $nombre = $correo = $dni = $practica1 = $practica2 = $practica3 = $practica4 = $examen1 = $examen2 = $examen3 = "";
            
            if ($_SERVER["REQUEST_METHOD"] == "POST") {
                if (empty($_POST["nombre"])) {
                    $nombreErr = "Se necesita un nombre";
                    $nombre = "Señor sin nombre";
                } else {
                    $nombre = test_input($_POST["nombre"]);
                    // Que contenga solo letras y espacios
                    if (!preg_match("/^[a-zA-Z-' ]*$/",$nombre)) {
                        $nameErr = "Solo se puede usar letras y espacios";
                    }
                }
                }
                if (empty($_POST["correo"])) {
                    $correoErr = "Se necesita un correo";
                    $correo = "ponuncorreo@tontito.com";
                } else {
                    $correo = test_input($_POST["correo"]);
                    // Valida el formato del correo
                    if (!filter_var($correo, FILTER_VALIDATE_EMAIL)) {
                        $correoErr = "Ponme un email correcto";
                    }
                }

                if (empty($_POST["dni"])) {
                    $dniErr = "Se necesita un DNI";
                } else {
                    $dni = test_input($_POST["dni"]);
                
                    // Elimina espacios en blanco y caracteres no numéricos
                    $dni = preg_replace("/[^0-9]/", "", $dni);
                
                    // Verifica que el DNI tenga 9 caracteres (8 números y 1 letra)
                    if (strlen($dni) != 9) {
                        $dniErr = "El DNI debe tener 8 números y 1 letra";
                    } else {
                        // Divide el DNI en número y letra
                        $numeroDNI = substr($dni, 0, 8);
                        $letraDNI = strtoupper(substr($dni, 8, 1));
                
                        // Verifica la letra del DNI
                        $letras = "TRWAGMYFPDXBNJZSQVHLCKE";
                        $posicion = $numeroDNI % 23;
                
                        if ($letraDNI != $letras[$posicion]) {
                            $dniErr = "La letra del DNI no es válida";
                        }
                    }
                }
                
                // Las prácticas y los examenes son iguales
                if (empty($_POST["practica1"])) {
                    $practica1 = "0";
                } else {
                    $practica1 = test_input($_POST["practica1"]);
                    // Solo acepta números
                    if (!preg_match("/^\d+(\.\d+)?$/", $practica1)) {
                        $practica1Err = "Solo acepta numeros";
                    }
                }
                
                if (empty($_POST["practica2"])) {
                    $practica2 = "0";
                } else {
                $practica2 = test_input($_POST["practica2"]);
                // Solo acepta números
                if (!preg_match("/^\d+(\.\d+)?$/", $practica2)) {
                    $practica2Err = "Solo acepta numeros";
                }
            }
            
            if (empty($_POST["practica3"])) {
                $practica3 = "0";
            } else {
                $practica3 = test_input($_POST["practica3"]);
                // Solo acepta números
                if (!preg_match("/^\d+(\.\d+)?$/", $practica3)) {
                    $practica3Err = "Solo acepta numeros";
                }
            }
            
            if (empty($_POST["practica4"])) {
                $practica4 = "0";
            } else {
                $practica4 = test_input($_POST["practica4"]);
                // Solo acepta números
                if (!preg_match("/^\d+(\.\d+)?$/", $practica4)) {
                    $practica4Err = "Solo acepta numeros";
                }
            }
            
            if (empty($_POST["examen1"])) {
                $examen1 = "0";
            } else {
                $examen1 = test_input($_POST["examen1"]);
                // Solo acepta números
                if (!preg_match("/^\d+(\.\d+)?$/", $examen1)) {
                    $examen1Err = "Solo acepta numeros";
                }
            }
            
            if (empty($_POST["examen2"])) {
                $examen2 = "0";
            } else {
                $examen2 = test_input($_POST["examen2"]);
                // Solo acepta números
                if (!preg_match("/^\d+(\.\d+)?$/", $examen2)) {
                    $examen2Err = "Solo acepta numeros";
                }
                    }
                    
            if (empty($_POST["examen3"])) {
                $examen3 = "0";
            } else {
                $examen3 = test_input($_POST["examen3"]);
                // Solo acepta números
                if (!preg_match("/^\d+(\.\d+)?$/", $examen3)) {
                    $examen3Err = "Solo acepta numeros";
                }
            }
            
            
            function test_input($data) {
                $data = trim($data);
                $data = stripslashes($data);
                $data = htmlspecialchars($data);
                return $data;
            }
        ?>
    <header>
        <h1>¿Apruebas o suspendes?</h1>    
    </header>
    <p><span class="error">* Campos requeridos</span></p>
    <p><span class="error">Los numeros van con puntos. Ejemplo: 3.5</span></p>
    <!-- Formulario -->
    <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
        Nombre: <input type="text" name="nombre" value="<?php echo $nombre;?>">
            <span class="error">* <?php echo $nombreErr;?></span>
            <br></br>
        Email: <input type="text" name="correo" value="<?php echo $correo;?>">
            <span class="error">* <?php echo $correoErr;?></span>
            <br></br>
        DNI: <input type="text" name="dni" value="<?php echo $dni;?>">
            <span class="error">* <?php echo $dniErr;?></span>
            <br></br>
        Practica 1: <input type="text" name="practica1" value="<?php echo $practica1;?>">
            <span class="error">* <?php echo $practica1Err;?></span>
            <br></br>
        Practica 2: <input type="text" name="practica2" value="<?php echo $practica2;?>">
            <span class="error">* <?php echo $practica2Err;?></span>
            <br></br>
        Practica 3: <input type="text" name="practica3" value="<?php echo $practica3;?>">
            <span class="error">* <?php echo $practica3Err;?></span>
            <br></br>
        Practica 4: <input type="text" name="practica4" value="<?php echo $practica1;?>">
            <span class="error">* <?php echo $practica4Err;?></span>
            <br></br>
        Examen 1: <input type="text" name="examen1" value="<?php echo $examen1;?>">
            <span class="error">* <?php echo $examen1Err;?></span>
            <br></br>
        Examen 2: <input type="text" name="examen2" value="<?php echo $examen2;?>">
            <span class="error">* <?php echo $examen2Err;?></span>
            <br></br>
        Examen 3: <input type="text" name="examen3" value="<?php echo $examen3;?>">
            <span class="error">* <?php echo $examen3Err;?></span>
            <br></br>
        <input type="submit" value="Enviar">
    </form>
    <?php
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
    


    echo "<h2>Tus resultados:</h2>";
    echo "<div class='result-container'>";
    // Los datos para calcular la media de las practicas
    $media_practicas= media_practicas($practica1, $practica2, $practica3, $practica4);
    
    // Los datos para calcular la media de los examentes
    $media_examenes = media_examenes($examen1, $examen2, $examen3);
    

    media_total($media_examenes,$media_practicas,$nombre,$dni,$correo);
    echo "</div>";
    }
    //Creamos la función que calcula la media
    function media_practicas($practica1,$practica2,$practica3,$practica4) {
        // Porcentaje de las prácticas
        $i = 0.4;
        $suma_p = $practica1 + $practica2 + $practica3 + $practica4;
        $media_practicas = $suma_p * $i / 4;
        $nota_practicas = $suma_p /4;
        echo "La media de las practicas es: $nota_practicas <br>";
        return $media_practicas;
    }
    // Creamos la función que calcula la media de los exámenes
    function media_examenes($examen1,$examen2,$examen3) {
        // Porcentaje de los examenes
        $i = 0.6;
        $suma_e = $examen1 + $examen2 + $examen3;
        $media_examenes = $suma_e * $i / 3;
        $nota_examenes = $suma_e / 3;
        echo "La media de los examenes es: $nota_examenes <br>";
        return $media_examenes;
    }
    function media_total($media_examenes, $media_practicas, $nombre, $dni, $correo) {
        $media = $media_examenes + $media_practicas;
        echo "<p class='result-message'>La media total es: <strong>$media</strong></p>";
        
        if ($media <= 3) {
            echo "<p class='result-suspendido'>Hola <strong>$nombre</strong> con DNI: $dni, tu nota media es <strong>$media</strong> y es menor de 5, así que estás suspendido, te he mandado todo a tu correo <em>$correo</em> para que lo consultes, eres un inútil y deberías irte a trabajar a un TGB.</p>";
        } elseif (3 < $media && $media < 5) {
            echo "<p class='result-suspendido'>Hola <strong>$nombre</strong> con DNI: $dni, tu nota media es <strong>$media</strong> y es mayor o igual a 3 y menor de 5, así que estás suspendido, te he mandado todo a tu correo <em>$correo</em> para que lo consultes, has suspendido, pero te reto a que lo hagas mejor.</p>";
        } elseif (5 <= $media && $media < 6.5) {
            echo "<p class='result-aprobado'>Hola <strong>$nombre</strong> con DNI: $dni, tu nota media es <strong>$media</strong> y es mayor o igual a 5 y menor de 6.5, así que aprobaste, te he mandado todo a tu correo <em>$correo</em> para que lo consultes, pero no te duermas en los laureles. Viene el examen de Oracle.</p>";
        } elseif (6.5 <= $media && $media < 8) {
            echo "<p class='result-aprobado'>Hola <strong>$nombre</strong> con DNI: $dni, tu nota media es <strong>$media</strong> y es mayor o igual a 6.5 y menor de 8, te he mandado todo a tu correo <em>$correo</em> para que lo consultes, veo que tu progreso en PHP ha sido bueno, estoy orgulloso de ti.</p>";
        } elseif (8 <= $media && $media <= 10) {
            echo "<p class='result-aprobado'>Hola <strong>$nombre</strong> con DNI: $dni, tu nota media es <strong>$media</strong> y es mayor o igual a 8 y menor o igual a 10, te he mandado todo a tu correo <em>$correo</em> para que lo consultes, creo que puse la evaluación demasiado fácil, no ocurrirá con los siguientes.</p>";
        }  elseif ($media >= 10) {
            echo "<p class='result-suspendido'>Si crees que podrías hacer trampas sacando un <strong>$media</strong> es que eres más tonto de lo que creia. -10 para ti.</p>";
        }
    }
    
    ?>
</body>
</html>