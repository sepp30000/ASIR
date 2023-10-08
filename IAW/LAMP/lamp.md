# Instalación y configuración del LAMP

## Instalación de la pila LAMP

- Lo primero que haremos será instalar los programas necesarios para que funcione el **LAMP**

Para ello empezaremos con:

```bash
sudo apt update && sudo apt upgrade
```

- Con esto actualizamos los repositorios y el sistema operativo, ahora podemos empezar a trabajar.

### Instalación de APACHE

- Instalamos APACHE

```bash
sudo apt install apache2
```

- Con esto tendríamos instalado apache. Si desde nuestro navegador insertamos **localhost:80** saldrá la pagina de apache.

![alt image](/IAW/LAMP/Capturas/apache.png)

---

### Instalación de mariadb

- Después de comprobar que *Apache* funciona perfectamente, nos centramos en la instación de la base de datos. Para ello vamos a instalar un motor de base de datos de MariaDB.

```bash
sudo apt install mariadb-server
```

### Insercción de datos en mariadb

- Ya instalado el servidor de base de datos, accedemos a el:

```bash
mysql -u root
```

- De este modo entramos a mariadb. Lo primero que hacemos es crear una base de datos

```sql
Create database prubas;
Use database prubas;
```

![alt image](/IAW/LAMP/Capturas/creacion_sql.png)

- Con esto ya hemos creado y accedido a la base de datos. Nos ponemos con la creacion de la tabla y la insercción de los datos.

```sql
CREATE TABLE persona (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nombre VARCHAR(50),
    edad INT,
    correo VARCHAR(100)
);
```

```sql
INSERT INTO persona (nombre, edad, correo) VALUES
    ('Victor', 19, 'Victor@example.com'),
    ('Adrian', 20, 'Adrian@example.com'),
    ('Lautaro', 19, 'Lautaro@example.com');
```

![alt image](/IAW/LAMP/Capturas/inserccion_datos.png)

---

### Creación de usuario en mariadb

- Ya tenemos insertados los datos en la base de datos. Ahora vamos a crear un usuario que tenga permisos para acceder a la base datos.

```sql
CREATE USER 'paco'@localhost IDENTIFIED BY '12345';
```

```sql
GRANT USAGE ON *.* TO 'paco'@localhost IDENTIFIED BY '12345';
```

```sql
GRANT ALL PRIVILEGES ON *.* TO 'paco'@'localhost';
```

![alt image](/IAW/LAMP/Capturas/entrar_con_paco.png)

### Instalación de php

- Viendo que funciona la base de datos, nos ponemos con la instalación de **php**.

```bash
sudo apt install php libapache2-mod-php php-mcrypt php-mysql php-cgi php-curl php-json
```

- Con esto lo tenemos instalado ahora entraremos a */var/www/html* y creamos el archivo **test.php** donde insertamos:

```php
<?php
phpinfo();
?>
```

- Ahora desde nuestro navegador accedemos a **http://mi_direccion_ip/test.php** y nos mostrará la web de prueba de php.

![alt image](/IAW/LAMP/Capturas/prueba_php.png)

Ya tendríamos instalado toda la pila **LAMP**

---

## Instalación de phpmyadmin y adminer

Con la pila *LAMP* instalada, seguiriamos instalando **phpmyadmin** y **adminer** (Dos interfaces gráficas para administrar la base de datos).

### Instalación de phpmyadmin

```bash
sudo apt install phpmyadmin php-mbstring php-gettext
```

- En la configuración pulsamos a **apache2** y continuamos los pasos

#### Opcional

- Si te diera fallo en el archivo /etc/apache2/apache2.conf hay que añadir la linea

```bash
Include /etc/phpmyadmin/apache.conf
```

-Y reiniciamos el servidor apache

```bash
sudo systemctl apache2 restart
```

- Con esto tendríamos instalado **phpmyadmin**.

![alt image](/IAW/LAMP/Capturas/phpmyadmin.png)

---

### Instalación de adminer

```bash
sudo apt install adminer
```

- Creamos un enlace simbolico de adminer

```bash
sudo ln -s /etc/apache2/conf-available/adminer.conf /etc/apache2/conf-enabled/
``````

-Y reiniciamos el servidor apache

```bash
sudo systemctl apache2 restart
```

![alt image](/IAW/LAMP/Capturas/adminer.png)

![alt image](/IAW/LAMP/Capturas/adminer_l.png)

## Analizar los logs de apache

- Ahora vamos a instalar **GoAccess** con el fin de monitorizar en tiempo real el servidor Apache.

```bash
sudo apt install goaccess
```

```bash
 goaccess /var/log/apache2/access.log -c
```

[config_goaccess](https://www.digitalocean.com/community/tutorials/how-to-install-and-use-goaccess-web-log-analyzer-on-ubuntu-20-04)

- Con esto ya lo tenemos instalado, ahora para tener una salida en *HTML* en tiempo real utilizamos.

```bash
goaccess /var/log/apache2/access.log -o /var/www/html/report.html --log-format=COMBINED --real-time-html
```

![alt image](/IAW/LAMP/Capturas/tiemporeal.png)
![alt image](/IAW/LAMP/Capturas/tiemporeal2.png)

-Con esto tendríamos **goaccess** en funcionamiento.

## PHP conexión con la base de datos

- Para terminar vamos a conectar nuestra base de  datos por PHP para que nos muestre los datos en una web.

- A partir del php que nos ha dado el profesor hemos realizado las modificaciones para que funcione

```php
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
```

[php_resuelto](/IAW/LAMP/base.php)

- Este php lo hemos volcado en **/var/www/html** y hemos accedido a el.

El resultado es:

![alt image](/IAW/LAMP/Capturas/resultado_php.png)

Con esto la práctica esta terminada

---
