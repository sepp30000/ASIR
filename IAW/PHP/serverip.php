<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php
    //ip_servidor
        $serverIP=$_SERVER['SERVER_ADDR'];
        echo "Dirección IP del servidor: " . $serverIP . "<br>";
    //nombre_servidor
        $host = $_SERVER['SERVER_NAME'];
        echo "Nombre del host del servidor: " . $host . "<br>";
    //soft_ser
        $software = $_SERVER['SERVER_SOFTWARE'];
        echo "Software del servidor: " . $software . "<br>";
    //useragent
        $userag = $_SERVER['HTTP_USER_AGENT'];
        echo "Agente de usuario: " . $userag . "<br>";
    //cliente_ip
        $cliente = $_SERVER['REMOTE_ADDR'];
        echo "Dirección IP del cliente: " . $cliente . "<br>";
    ?>
</body>
</html>