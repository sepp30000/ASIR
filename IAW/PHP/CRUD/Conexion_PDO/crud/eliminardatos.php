<?php
include("../config/conexion.php");

$id = $_GET['VideojuegoID'];

try {
    // Inicia una transacción
    $conexion->beginTransaction();

    // Elimina los datos de la tabla Videojuego
    $sql_videojuego = "DELETE FROM Videojuego WHERE VideojuegoID = :id";
    $stmt_videojuego = $conexion->prepare($sql_videojuego);
    $stmt_videojuego->bindParam(':id', $id);
    $stmt_videojuego->execute();

    // Elimina los datos de la tabla InventarioVideojuegos
    $sql_inventario = "DELETE FROM InventarioVideojuegos WHERE VideojuegoID = :id";
    $stmt_inventario = $conexion->prepare($sql_inventario);
    $stmt_inventario->bindParam(':id', $id);
    $stmt_inventario->execute();

    // Confirma la transacción
    $conexion->commit();
    echo '<script>alert("Datos eliminados correctamente"); window.location.href="../index.php";</script>';
} catch (Exception $e) {
    // Si hay algún error, realiza un rollback para deshacer los cambios
    $conexion->rollBack();
    echo '<script>alert("Error al eliminar los datos"); window.location.href="../index.php";</script>';
}

// Cierra la conexión
$conexion = null;
?>
