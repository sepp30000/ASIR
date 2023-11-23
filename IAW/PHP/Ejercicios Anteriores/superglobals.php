<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<!DOCTYPE html>
<html>
<head>
    <title>Variables Superglobales en PHP</title>
</head>
<body>
    <h1>Contenido de Variables Superglobales</h1>

    <?php
    // $_SERVER
    echo "<h2>\$_SERVER</h2>";
    echo "<pre>";
    print_r($_SERVER);
    echo "</pre>";

    // $_GET
    echo "<h2>\$_GET</h2>";
    echo "<pre>";
    print_r($_GET);
    echo "</pre>";

    // $_POST
    echo "<h2>\$_POST</h2>";
    echo "<pre>";
    print_r($_POST);
    echo "</pre>";

    // $_REQUEST
    echo "<h2>\$_REQUEST</h2>";
    echo "<pre>";
    print_r($_REQUEST);
    echo "</pre>";

    // $_SESSION
    echo "<h2>\$_SESSION</h2>";
    session_start();
    echo "<pre>";
    print_r($_SESSION);
    echo "</pre>";

    // $_COOKIE
    echo "<h2>\$_COOKIE</h2>";
    echo "<pre>";
    print_r($_COOKIE);
    echo "</pre>";

    // $_FILES
    echo "<h2>\$_FILES</h2>";
    echo "<pre>";
    print_r($_FILES);
    echo "</pre>";

    // $_ENV
    echo "<h2>\$_ENV</h2>";
    echo "<pre>";
    print_r($_ENV);
    echo "</pre>";
    ?>
</body>
</html>

</body>
</html>