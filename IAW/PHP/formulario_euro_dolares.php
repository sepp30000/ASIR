<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formularios euros a dólares</title>
</head>
<body>
    <header>
        <h1>Hola caracola, aquí convierto de dólares a euros y viceversa</h1>
    </header>
    <main>
        <?php
            //Función euros a dólares
            function euros_dolares($eur){
                $dolar = $eur * 1.325;
                return $dolar;
            }
            
        ?>
    </main>
    <footer></footer>
</body>
</html>