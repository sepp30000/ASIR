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
---
![alt image](/IAW/LAMP/Capturas/adminer_l.png)

---

