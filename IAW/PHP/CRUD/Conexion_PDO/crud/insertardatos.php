<?php
include("../config/conexion.php");

try {
    // Inicia una transacción
    $conexion->beginTransaction();

    // Consulta para insertar en la tabla Videojuego
    $sql_videojuego = "INSERT INTO Videojuego(NombreVideojuego, Plataforma, Género, Precio) VALUES (:nombre, :plataforma, :genero, :precio)";
    $stmt_videojuego = $conexion->prepare($sql_videojuego);
    $stmt_videojuego->bindParam(':nombre', $_POST['nombre']);
    $stmt_videojuego->bindParam(':plataforma', $_POST['plataforma']);
    $stmt_videojuego->bindParam(':genero', $_POST['genero']);
    $stmt_videojuego->bindParam(':precio', $_POST['precio']);
    $stmt_videojuego->execute();

    // Obtiene el ID del último registro insertado en la tabla Videojuego
    $videojuego_id = $conexion->lastInsertId();

    // Consulta para insertar en la tabla InventarioVideojuegos
    $sql_inventario = "INSERT INTO InventarioVideojuegos(EstadoVideojuegoID, VideojuegoID, Cantidad, FechaLanzamiento) VALUES (:estado, :videojuego_id, :cantidad, :fecha)";
    $stmt_inventario = $conexion->prepare($sql_inventario);
    $stmt_inventario->bindParam(':estado', $_POST['EstadoP']);
    $stmt_inventario->bindParam(':videojuego_id', $videojuego_id);
    $stmt_inventario->bindParam(':cantidad', $_POST['cantidad']);
    $stmt_inventario->bindParam(':fecha', $_POST['fecha']);
    $stmt_inventario->execute();

    // Si ambas consultas fueron exitosas, confirma la transacción
    $conexion->commit();
    echo '<script>alert("Datos insertados correctamente"); window.location.href="../index.php";</script>';
} catch (Exception $e) {
    // Si hay algún error, realiza un rollback para deshacer los cambios
    $conexion->rollBack();
    echo '<script>alert("Datos erroneos"); window.location.href="../formularios/insertarform.php";</script>';
}

// Cierra la conexión
$conexion = null;
?>
