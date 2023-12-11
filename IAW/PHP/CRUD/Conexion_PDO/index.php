<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Mi CRUD</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <link rel="stylesheet" href="estilos/main.css">
</head>
<body>
    <h1 class="text-center">LISTADO DE VIDEOJUEGOS</h1>
    <br>
    <div class="container">
        <table class="table">
            <thead>
                <tr>
                    <th scope="col">Nombre</th>
                    <th scope="col">Plataforma</th>
                    <th scope="col">Género</th>
                    <th scope="col">Precio</th>
                    <th scope="col">Estado</th>
                    <th scope="col">Cantidad en almacen</th>
                    <th scope="col">Fecha de lanzamiento</th>
                    <th scope="col">Acciones</th>
                </tr>
            </thead>
            <tbody>
                <?php
                    // Incluye el archivo de configuración de la conexión
                    require("config/conexion.php");

                    // Sentencia SELECT utilizando PDO
                    $sql = "SELECT v.VideojuegoID, v.NombreVideojuego, v.Plataforma, v.Género, v.Precio, e.NombreEstado AS Estado, iv.Cantidad, iv.FechaLanzamiento
                            FROM InventarioVideojuegos iv
                            INNER JOIN Videojuego v ON iv.VideojuegoID = v.VideojuegoID
                            INNER JOIN EstadoVideojuego e ON iv.EstadoVideojuegoID = e.EstadoVideojuegoID";

                    $stmt = $conexion->prepare($sql);
                    $stmt->execute();

                    while ($resultado = $stmt->fetch(PDO::FETCH_ASSOC)) {
                ?>
                    <tr>
                        <td><?php echo $resultado['NombreVideojuego']; ?></td>
                        <td><?php echo $resultado['Plataforma']; ?></td>
                        <td><?php echo $resultado['Género']; ?></td>
                        <td><?php echo $resultado['Precio']; ?></td>
                        <td><?php echo $resultado['Estado']; ?></td>
                        <td><?php echo $resultado['Cantidad']; ?></td>
                        <td><?php echo $resultado['FechaLanzamiento']; ?></td>
                        <td>
                            <a href="formularios/editarform.php?VideojuegoID=<?php echo $resultado['VideojuegoID']; ?>" class="btn btn-warning">Editar</a>
                            <a href="crud/eliminardatos.php?VideojuegoID=<?php echo $resultado['VideojuegoID']; ?>" class="btn btn-danger">Eliminar</a>
                        </td>
                    </tr>
                <?php
                    }
                ?>
            </tbody>
        </table>
        
        <div class="container">
            <a href="./formularios/insertarform.php" class="btn btn-success">Agregar videojuego</a>
        </div>
    </div>
    <br>
    <footer class="footer">
    <div class="text-center">
        <p>&copy; 2023 José Ramón Peris. Todos los derechos reservados.</p>
    </div>
    </footer>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
</body>
</html>
