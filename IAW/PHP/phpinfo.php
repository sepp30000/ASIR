<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php
    // Muestra toda la información, por defecto INFO_ALL
    phpinfo();
    // Muestra solamente la información de los módulos.
    // phpinfo(8) hace exactamente lo mismo.
    phpinfo(INFO_MODULES);
    ?>
</body>
</html>