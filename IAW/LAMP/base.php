<?php
// Datos de la base de datos
$usuario = "paco";
$password = "12345";
$servidor = "localhost";
$basededatos = "pruebas";

// Creación de la conexión a la base de datos
$conexion = mysqli_connect($servidor, $usuario, $password) or die("No se ha podido conectar al servidor de Base de datos");

// Selección de la base de datos a utilizar
$db = mysqli_select_db($conexion, $basededatos) or die("No se ha podido conectar a la base de datos");

// Consulta. Guardamos en variable.
$consulta = "SELECT * FROM persona";
$resultado = mysqli_query($conexion, $consulta) or die("Algo ha ido mal en la consulta");

// Mostrar el resultado de los registros de la base de datos
// Encabezado de la tabla
echo "<table border='2'>";
echo "<tr>";
echo "<th>id</th>";
echo "<th>nombre</th>";
echo "<th>edad</th>";
echo "<th>correo</th>";
echo "</tr>";

// Bucle while que recorre cada registro y muestra cada campo en la tabla.
while ($columna = mysqli_fetch_array($resultado)) {
    echo "<tr>";
    echo "<td>" . $columna['id'] . "</td><td>" . $columna['nombre'] . "</td><td>" . $columna['edad'] . "</td><td>" . $columna['correo'] . "</td>";
    echo "</tr>";
}

echo "</table>"; // Fin de la tabla

// Cerrar conexión de base de datos
mysqli_close($conexion);
?>
