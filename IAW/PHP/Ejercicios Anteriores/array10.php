<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php
        $paises = array("Italy"=>"Rome", "Luxembourg"=>"Luxembourg", "Belgium"=> "Brussels", "
            Denmark"=>"Copenhagen", "Finland"=>"Helsinki", "France" => "Paris", "
            Slovakia"=>"Bratislava", "Slovenia"=>"Ljubljana", "Germany" => "Berlin", "
            Greece" => "Athens", "Ireland"=>"Dublin", "Netherlands"=>"Amsterdam", "
            Portugal"=>"Lisbon", "Spain"=>"Madrid", "Sweden"=>"Stockholm", "United
            Kingdom"=>"London", "Cyprus"=>"Nicosia", "Lithuania"=>"Vilnius", "Czech
            Republic"=>"Prague", "Estonia"=>"Tallin", "Hungary"=>"Budapest", "Latvia"=>"
            Riga", "Malta"=>"Valetta", "Austria" => "Vienna", "Poland"=>"Warsaw");
        foreach ($paises as $a => $v) {
            echo "La capital de " . strtoupper($a) . " es " . strtoupper($v) . ".\n" . "<br>";
        }
        echo json_encode($paises);
    ?>
</body>
</html>