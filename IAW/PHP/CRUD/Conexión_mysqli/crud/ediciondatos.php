<?php

    include("../config/conexion.php");

    $id = $_POST['VideojuegoID'];
    $nombre = $_POST['nombre'];
    $plataforma = $_POST['plataforma'];
    $genero = $_POST['genero'];
    $precio = $_POST['precio'];
    $estado = $_POST['estado'];
    $cantidad = $_POST['cantidad'];
    $fecha = $_POST['fecha'];

    // Comienza una transacción
    mysqli_begin_transaction($conexion);

    $sql_videojuego = "UPDATE Videojuego SET 
                    NombreVideojuego = '$nombre', 
                    Plataforma = '$plataforma', 
                    Género = '$genero', 
                    Precio = '$precio' 
                WHERE VideojuegoID = '$id'";
$resultado_videojuego = mysqli_query($conexion, $sql_videojuego);

$sql_inventario = "UPDATE InventarioVideojuegos SET 
                    EstadoVideojuegoID = '$estado', 
                    Cantidad = '$cantidad', 
                    FechaLanzamiento = '$fecha' 
                WHERE VideojuegoID = '$id'";
$resultado_inventario = mysqli_query($conexion, $sql_inventario);

    if ($resultado_videojuego && $resultado_inventario) {
        // Si ambas consultas son exitosas, realiza un commit para confirmar los cambios
        mysqli_commit($conexion);
        echo '<script>alert("Datos actualizados correctamente"); window.location.href="../index.php";</script>';
    } else {
        // Si hay algún error, realiza un rollback para deshacer los cambios
        mysqli_rollback($conexion);
        echo '<script>alert("Error al actualizar los datos"); window.location.href="../formularios/editarform.php?VideojuegoID='.$id.'";</script>';
    }

    // Cierra la conexión
    mysqli_close($conexion);
    
?>
