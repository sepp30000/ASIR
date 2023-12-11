<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Editar Videojuego</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <link rel="stylesheet" href="../estilos/insertar.css">
</head>
<body>
    <h1 class="text-center">Editar videojuego</h1>
    <br>

    <form class="contenedor" action="../crud/ediciondatos.php" method="post">
        <?php
            include("../config/conexion.php");

            // Utiliza consultas preparadas para prevenir inyección de SQL
            $sql = "SELECT v.VideojuegoID, v.NombreVideojuego, v.Plataforma, v.Género, v.Precio, e.EstadoVideojuegoID, iv.Cantidad, iv.FechaLanzamiento
                    FROM InventarioVideojuegos iv
                    INNER JOIN Videojuego v ON iv.VideojuegoID = v.VideojuegoID
                    INNER JOIN EstadoVideojuego e ON iv.EstadoVideojuegoID = e.EstadoVideojuegoID WHERE v.VideojuegoID = :videojuegoID";

            $stmt = $conexion->prepare($sql);
            $stmt->bindParam(':videojuegoID', $_REQUEST['VideojuegoID']);
            $stmt->execute();

            $row = $stmt->fetch(PDO::FETCH_ASSOC);
        ?>

        <!--Para recoger el id-->
        <input type="Hidden" class="form-control" name="VideojuegoID" value="<?php echo $row['VideojuegoID'];?>">

        <div class="mb-3">
            <label class="form-label">Nombre</label>
            <input type="text" class="form-control" name="nombre" value="<?php echo $row['NombreVideojuego'];?>">
        </div>
        <div class="mb-3">
            <label class="form-label">Plataforma</label>
            <input type="text" class="form-control" name="plataforma" value="<?php echo $row['Plataforma'];?>">
        </div>
        <div class="mb-3">
            <label class="form-label">Género</label>
            <input type="text" class="form-control" name="genero" value="<?php echo $row['Género'];?>">
        </div>
        <div class="mb-3">
            <label class="form-label">Precio</label>
            <input type="text" class="form-control" name="precio" value="<?php echo $row['Precio'];?>">
        </div>
        <label for="estado">Estado del producto</label>
        <select class="form-select mb-3" name="estado" aria-label="Default select example">
            <option selected>--Estado del producto--</option>
            <option value="1" <?php if($row['EstadoVideojuegoID'] == 1) echo 'selected';?>>Disponible</option>
            <option value="2" <?php if($row['EstadoVideojuegoID'] == 2) echo 'selected';?>>No disponible</option>
            <option value="3" <?php if($row['EstadoVideojuegoID'] == 3) echo 'selected';?>>A la espera de unidades</option>
            <option value="4" <?php if($row['EstadoVideojuegoID'] == 4) echo 'selected';?>>En reserva</option>
        </select>
        <div class="mb-3">
            <label class="form-label">Cantidad en almacen</label>
            <input type="text" class="form-control" name="cantidad" value="<?php echo $row['Cantidad'];?>">
        </div>
        <div class="mb-3">
            <label class="form-label">Fecha de lanzamiento</label>
            <input type="text" class="form-control" name="fecha" value="<?php echo $row['FechaLanzamiento'];?>">
        </div>
        <div class="container">
            <button type="submit" class="btn btn-danger">Actualizar</button>
            <a href="../index.php" class="btn btn-dark">Regresar</a>
        </div>
    </form>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
    <br>
    <footer class="footer">
    <div class="text-center">
        <p>&copy; 2023 José Ramón Peris. Todos los derechos reservados.</p>
    </div>
    </footer>
</body>
</html>
