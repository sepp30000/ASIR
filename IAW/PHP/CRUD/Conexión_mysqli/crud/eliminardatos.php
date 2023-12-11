<?php
include("../config/conexion.php");

$id = $_GET['VideojuegoID'];

$sql_videojuego = "DELETE FROM Videojuego WHERE VideojuegoID = '$id'";
$sql_inventario = "DELETE FROM InventarioVideojuegos WHERE VideojuegoID = '$id'";

// Comienza una transacción
mysqli_begin_transaction($conexion);

$query_videojuego = mysqli_query($conexion, $sql_videojuego);
$query_inventario = mysqli_query($conexion, $sql_inventario);

if ($query_videojuego && $query_inventario) {
    // Si ambas consultas son exitosas, realiza un commit para confirmar los cambios
    mysqli_commit($conexion);
    echo '<script>alert("Datos eliminados correctamente"); window.location.href="../index.php";</script>';
} else {
    // Si hay algún error, realiza un rollback para deshacer los cambios
    mysqli_rollback($conexion);
    echo '<script>alert("Error al eliminar los datos"); window.location.href="../index.php";</script>';
}

// Cierra la conexión
mysqli_close($conexion);
?>
