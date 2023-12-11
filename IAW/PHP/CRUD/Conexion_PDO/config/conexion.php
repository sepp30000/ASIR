<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Conexión con la base de datos</title>
</head>
<body>
    <?php
        /* Datos de conexión a la base de datos */
        $host = 'db';
        $dbname = 'Tienda_videojuegos_CRUD';
        $user = 'root';
        $password = 'test';

        try {
            // Conexión a la base de datos utilizando PDO
            $conexion = new PDO("mysql:host=$host;dbname=$dbname", $user, $password);

            // Configurar el modo de error para lanzar excepciones en lugar de warnings
            $conexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

            echo "Conexión exitosa";
        } catch (PDOException $e) {
            die("Error al conectar: " . $e->getMessage());
        }
    ?>
</body>
</html>
