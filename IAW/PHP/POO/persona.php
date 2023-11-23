<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>POO_ej.1</title>
</head>
<body>
    <?php
        class persona{
            //Propiedades
            private $nombre;
            private $apellido1;
            private $apellido2;
            private $edad;

            function __construct($nombre,$apellido1,$apellido2,$edad){
                $this->nombre = $nombre;
                $this->apellido1 = $apellido1;
                $this->apellido2 = $apellido2;
                $this->edad = $edad;
            }
            function get_name(){
                return $this->nombre;
            }
            function get_apellido1(){
                return $this->apellido1;
            }
            function get_apellido2(){
                return $this->apellido2;
            }
            function get_edad(){
                return $this->edad;
            }
            function set_name($nombre){
                $this->nombre = $nombre;
            }
            function set_apellido1($apellido1){
                $this->apellido1 = $apellido1;
            }
            function set_apellido2($apellido2){
                $this->apellido2 = $apellido2;
            }
            function set_edad($edad){
                $this->edad = $edad;
            }        
            function imprimir(){
                return "Nombre: ".$this->nombre.",Apellidos: ".$this->apellido1." ".$this->apellido2." tiene la edad:".$this->edad."<br>";
            }
        }
    ?>
</body>
</html>