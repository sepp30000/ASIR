<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Conexión con la base de datos</title>
</head>
<body>
    <?php
        /*Datos de conexion a la base de datos*/
        //Conexión a la base de datos
        // Hicimos la prueba de conectar con las variables y no funciona
        $conexion = mysqli_connect('db', 'root', 'test', "Tienda_videojuegos_CRUD");
        if (!$conexion) {
            die("No se ha podido conectar". $conexion->connect_error);
        }
    ?>
</body>
</html>