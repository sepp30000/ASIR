<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Insertar Videojuego</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <link rel="stylesheet" href ="../estilos/insertar.css">
</head>
<body>
    <h1 class="text-center">Agregar videojuego</h1>
    <br>
    <form action="../crud/insertardatos.php" method="POST"> 
    
    <div class="mb-3">
        <label  class="form-label">Nombre</label>
        <input type="text" class="form-control" name="nombre">
    </div>
    <div class="mb-3">
        <label  class="form-label">Plataforma</label>
        <input type="text" class="form-control" name="plataforma">
    </div>
    <div class="mb-3">
        <label  class="form-label">Género</label>
        <input type="text" class="form-control" name="genero">
    </div>
    <div class="mb-3">
        <label  class="form-label">Precio</label>
        <input type="text" class="form-control" name="precio">
    </div>
    <label for="">Estado</label>
    <select class="form-select mb-3" name="EstadoP">
    <option selected>Seleccionar estado del producto</option>
        <?php
        //Menú desplegable del estado del producto
            include("../config/conexion.php");
            $sql = $conexion->query("SELECT * FROM EstadoVideojuego");
            while($resultado = $sql->fetch_assoc()) {
                echo "<option value='".$resultado['EstadoVideojuegoID']."'>".$resultado['NombreEstado']."</option>";
            }
        ?>
    </select>
    <div class="mb-3">
        <label  class="form-label">Cantidad en almacen</label>
        <input type="text" class="form-control" name="cantidad">
    </div>
    <div class="mb-3">
        <label  class="form-label">Fecha de lanzamiento</label>
        <input type="text" class="form-control" name="fecha">
    </div>
    <div class="container">
        <button type="submit" class="btn btn-danger">Agregar</button>
        <a href="../index.php" class="btn btn-dark">Regresar</a>
    </div>
    </form>
    <br>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
    <br>
    <footer class="footer">
    <div class="text-center">
        <p>&copy; 2023 José Ramón Peris. Todos los derechos reservados.</p>
    </div>
    </footer>

</body>
</html>
