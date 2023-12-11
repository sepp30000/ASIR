<?php
    include("../config/conexion.php");
    $estado = $_POST['EstadoP'];
    $nombre = $_POST['nombre'];
    $plataforma = $_POST['plataforma'];
    $genero = $_POST['genero'];
    $precio = $_POST['precio'];
    $cantidad = $_POST['cantidad'];
    $fecha = $_POST['fecha'];

    // Consulta para insertar en la tabla Videojuego
    $sql_videojuego = "INSERT INTO Videojuego(NombreVideojuego, Plataforma, Género, Precio) VALUES ('$nombre','$plataforma','$genero','$precio')";
    $resultado_videojuego = mysqli_query($conexion, $sql_videojuego);

    // Obtiene el ID del último registro insertado en la tabla Videojuego
    $videojuego_id = mysqli_insert_id($conexion);

    // Consulta para insertar en la tabla InventarioVideojuegos
    $sql_inventario = "INSERT INTO InventarioVideojuegos(EstadoVideojuegoID, VideojuegoID, Cantidad, FechaLanzamiento) VALUES ('$estado','$videojuego_id','$cantidad','$fecha')";
    $resultado_inventario = mysqli_query($conexion, $sql_inventario);

    // Si ambas consultas fueron exitosas, confirma la transacción
    if ($resultado_videojuego && $resultado_inventario) {
        mysqli_commit($conexion);
        echo '<script>alert("Datos insertados correctamente"); window.location.href="../index.php";</script>';
    } else {
        // Si hay algún error, realiza un rollback para deshacer los cambios
        mysqli_rollback($conexion);
        echo '<script>alert("Datos erroneos"); window.location.href="../formularios/insertarform.php";</script>';
    }
    // Cierra la conexión
    mysqli_close($conexion);

?>