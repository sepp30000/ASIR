<?php
    include("../config/conexion.php");

    // Recoge los datos del formulario
    $id = $_POST['VideojuegoID'];
    $nombre = $_POST['nombre'];
    $plataforma = $_POST['plataforma'];
    $genero = $_POST['genero'];
    $precio = $_POST['precio'];
    $estado = $_POST['estado'];
    $cantidad = $_POST['cantidad'];
    $fecha = $_POST['fecha'];

    try {
        // Inicia una transacción
        $conexion->beginTransaction();

        // Actualiza los datos en la tabla Videojuego
        $sql_videojuego = "UPDATE Videojuego SET 
                            NombreVideojuego = :nombre, 
                            Plataforma = :plataforma, 
                            Género = :genero, 
                            Precio = :precio 
                        WHERE VideojuegoID = :id";
        $stmt_videojuego = $conexion->prepare($sql_videojuego);
        $stmt_videojuego->bindParam(':nombre', $nombre);
        $stmt_videojuego->bindParam(':plataforma', $plataforma);
        $stmt_videojuego->bindParam(':genero', $genero);
        $stmt_videojuego->bindParam(':precio', $precio);
        $stmt_videojuego->bindParam(':id', $id);
        $stmt_videojuego->execute();

        // Actualiza los datos en la tabla InventarioVideojuegos
        $sql_inventario = "UPDATE InventarioVideojuegos SET 
                            EstadoVideojuegoID = :estado, 
                            Cantidad = :cantidad, 
                            FechaLanzamiento = :fecha 
                        WHERE VideojuegoID = :id";
        $stmt_inventario = $conexion->prepare($sql_inventario);
        $stmt_inventario->bindParam(':estado', $estado);
        $stmt_inventario->bindParam(':cantidad', $cantidad);
        $stmt_inventario->bindParam(':fecha', $fecha);
        $stmt_inventario->bindParam(':id', $id);
        $stmt_inventario->execute();

        // Confirma la transacción
        $conexion->commit();
        echo '<script>alert("Datos actualizados correctamente"); window.location.href="../index.php";</script>';
    } catch (Exception $e) {
        // Si hay algún error, realiza un rollback para deshacer los cambios
        $conexion->rollBack();
        echo '<script>alert("Error al actualizar los datos"); window.location.href="../formularios/editarform.php?VideojuegoID='.$id.'";</script>';
    }

    // Cierra la conexión
    $conexion = null;
?>
