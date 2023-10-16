# Como funciona un contenedor con la pila LAMP

- Después de buscar, hemos encontrado en **github** un repositorio que contiene una pila *LAMP* a partir del uso de DOCKER compose

[ENLACE](https://github.com/jersonmartinez/docker-lamp)

- Ya nos hemos clonado el repositorio, podemos ver los archivos del repositorio.

```Dockerfile
FROM php:8.0.0-apache
ARG DEBIAN_FRONTEND=noninteractive
RUN docker-php-ext-install mysqli
# Include alternative DB driver
# RUN docker-php-ext-install pdo
# RUN docker-php-ext-install pdo_mysql
RUN apt-get update \
    && apt-get install -y sendmail libpng-dev \
    && apt-get install -y libzip-dev \
    && apt-get install -y zlib1g-dev \
    && apt-get install -y libonig-dev \
    && rm -rf /var/lib/apt/lists/* \
    && docker-php-ext-install zip

RUN docker-php-ext-install mbstring
RUN docker-php-ext-install zip
RUN docker-php-ext-install gd

RUN a2enmod rewrite
```

- Con este archivo vemos que a partir de una imagen oficial de **PHP-APACHE** instala lo que necesita el hombre *(Nosotros no necesitamos ni la mitad)*.

```yaml
version: "3.1"
services:
    db:
        image: mysql
        ports: 
            - "3306:3306"
        command: --default-authentication-plugin=mysql_native_password
        environment:
            MYSQL_DATABASE: dbname
            MYSQL_PASSWORD: test
            MYSQL_ROOT_PASSWORD: test 
        volumes:
            - ./dump:/docker-entrypoint-initdb.d
            - ./conf:/etc/mysql/conf.d
            - persistent:/var/lib/mysql
        networks:
            - default
    www:
        build: .
        ports: 
            - "80:80"
        volumes:
            - ./www:/var/www/html
        links:
            - db
        networks:
            - default
    phpmyadmin:
        image: phpmyadmin/phpmyadmin
        links: 
            - db:db
        ports:
            - 8000:80
        environment:
            MYSQL_USER: root
            MYSQL_PASSWORD: test
            MYSQL_ROOT_PASSWORD: test 
volumes:
    persistent:
```

- En el docker compose vemos que levanta 3 contenedores(www, phpmyadmin y sql),www lo exporte del dockerfile local y las otras de los repositorio de **Dockerhub**, que  los volumenes con persistentes y la ubicación de cada puerto.

```bash
# Levantamos los contenedores
docker-compose up -d
```

- Ya con los contenedores levantados vemos los contenedores levantados y que funcionan correctamente.

![alt image](/IAW/Docker-Compose%20LAMP/Imagenes/Docker_C_up.png)

![alt image](/IAW/Docker-Compose%20LAMP/Imagenes/dockerps.png)

![alt image](/IAW/Docker-Compose%20LAMP/Imagenes/PHPmyadmin.png)

![alt image](/IAW/Docker-Compose%20LAMP/Imagenes/muestra_php.png)