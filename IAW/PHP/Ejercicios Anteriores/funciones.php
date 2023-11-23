<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Funciones</title>
</head>
<body>
    <h1>Funciones relacionadas con sql</h1>
        <?php
            // Funcion insert con $tabla -> nombre de la tabla y $campos -> Nombre de los campos
            function insert($tabla, $campos){
                $n_campos = implode(', ', array_keys($campos));
                $v_campos = "'" . implode("', '", $campos) . "'";
            // La sentencia con los campos que vamos a rellenar
                $sentencia = "INSERT INTO %s (%s) VALUES (%s)";
            // Los campos
                echo sprintf($sentencia, $tabla, $n_campos, $v_campos);
            }
            // Los datos
            $tabla = 'Medicamento';
            $campos = array("nombre"=>"paracetamol", "id"=>"1", "mgramos"=>"600mg");
        //Llamamos la funcion
        $i = insert($tabla, $campos);
        echo $i;
        ?>
</body>
</html>