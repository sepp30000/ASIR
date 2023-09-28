# Tarea 4: Primeros pasos con docker

## 1. Instala docker en una máquina y configúralo para que se pueda usar con un usuario sin privilegios

- Primero usaremos una máquina **Xubuntu 23.04**

![alt text](/IAW/DOCKER/Imagenes/Xubuntu.png)

- A partir de esta máquina usaremos los siguientes comandos:

```bash
sudo apt install docker
```

![alt text](/IAW/DOCKER/Imagenes/Instalar_docker.png)

- Si no le damos privilegios, tendremos que utilizar ***sudo*** para cada comando de **docker**.

![alt text](/IAW/DOCKER/Imagenes/permisos_docker.png)

- Después de tener instalado **docker**, le daremos los privilegios para poder usarlo sin el comando ***sudo*** antes. Para ello usamos:

```bash
sudo usermod -aG docker $USUARIO
```

![alt text](/IAW/DOCKER/Imagenes/permisos_docker.png)

- Reiniciaremos y comprobaremos si funciona sin el ***sudo*** delante

![alt text](/IAW/DOCKER/Imagenes/comando_sinsudo.png)

---

## 2. Ejecuta un contenedor a partir de la imagen hello-word. Comprueba que nos devuelve la salida adecuada. Comprueba que no se está ejecutando. Lista los contenedores que están parado. Borra el contenedor

- Lo primero que haremos será crear el contenedor para **"hello-world"**

```bash
docker run hello-world    
```

- Después de ejecutar el comando nos instalará el contenedor y nos mostrará el **"hello-world"** de docker

![alt text](/IAW/DOCKER/Imagenes/instalar_hello-world.png)

- Para saber el estatus de nuestro contenedores (saber si está parado o no) usamos el comando:

```bash
docker ps -a | grep $nombre_del_contenedor
```

![alt text](/IAW/DOCKER/Imagenes/estado_contenedor.png)

- El comando **docker ps -a** tambien sirve para saber el estado y la información de todos los contenedores

```bash
docker ps -a
```

![alt text](/IAW/DOCKER/Imagenes/docker_ps-a.png)

- Para eliminar el contenedor usamos:

```bash
docker rm $nombre_del_contenedor
```

o

```bash
docker rm $id
```

![alt text](/IAW/DOCKER/Imagenes/docker_rm.png)

![alt text](/IAW/DOCKER/Imagenes/docker_rm.png)

![alt text](/IAW/DOCKER/Imagenes/containers_eliminados.png)

## 3. Crea un contenedor interactivo desde una imagen debian. Instala un paquete (por ejemplo nano). Sal de la terminal, ¿sigue el contenedor corriendo? ¿Por qué?. Vuelve a iniciar el contenedor y accede de nuevo a él de forma interactiva. ¿Sigue instalado el nano?. Sal del contenedor, y bórralo. Crea un nuevo contenedor interactivo desde la misma imagen. ¿Tiene el nano instalado?

- Lo primero que hacemos es crear el contenedor de *debian o ubuntu*

```bash
docker run -it --name=ubuntunano ubuntu 
```

![alt text](/IAW/DOCKER/Imagenes/creacion_ubuntu.png)

- Después lo iniciamos

```bash
docker start -ai ubuntunano
```

- Instalamos el **nano**

```bash
apt update && apt install nano
```

![alt text](/IAW/DOCKER/Imagenes/nano_ubuntu.png)

- Después de ver su funcionamiento, saldremso del contenedor y vemos el que el contenedor se apaga. Podemos comprobarlo con:

```bash
docker ps
```

![alt text](/IAW/DOCKER/Imagenes/docker_ps.png)

- Al hacer el exit, este contenedor se apaga. Ahora volvemos a iniciarlo y entramos a el.

```bash
docker start -ai ubuntunano
```

![alt text](/IAW/DOCKER/Imagenes/docker_start.png)

- Iniciamos la creación de un texto con el **nano** y vemos que inicia sin problemas, ya que el directorio es persistente.

- Ahora creamos otro contenedor

```bash
docker run -it --name=ubuntunano2 ubuntu 
```

![alt text](/IAW/DOCKER/Imagenes/nano2.png)

- Al iniciar el **nano** nos dice que no está instalado, esto es porque son contenedores diferentes y no tiene instalado nada. Para que tenga los programas instalados podriamos crear un ***dockerfile*** para ello.

![alt text](/IAW/DOCKER/Imagenes/no_nano.png)

## 4. Crea un contenedor demonio con un servidor nginx, usando la imagen oficial de nginx. Al crear el contenedor, ¿has tenido que indicar algún comando para que lo ejecute? Accede al navegador web y comprueba que el servidor esta funcionando. Muestra los logs del contenedor

- Lo primero que haremos será buscar en **dockerhub** la imagen de *nginx*.

![alt text](/IAW/DOCKER/Imagenes/dockerhub.png)

- Después de encontrar la imagen que querermos la volcamos desde dockerhub a nuestro sistema

![alt text](/IAW/DOCKER/Imagenes/pull_nginx.png)

- Después de volcarnos la imagen, creamos el contenedor

```bash
docker run --name=nginxprueba -d -p 8080:80 nginx 
docker ps
```

![alt text](/IAW/DOCKER/Imagenes/docker_start_nginx.png)

- Ahora probaremos el funcionamiento del *nginx*

![alt text](/IAW/DOCKER/Imagenes/welcome_nginx.png)

- Y mostramos los logs

```bash
docker logs nginxprueba
```

![alt text](/IAW/DOCKER/Imagenes/logs_nginx.png)

## 5. Crea un contenedor con la aplicación Nextcloud, mirando la documentación en docker Hub, para personalizar el nombre de la base de datos sqlite que va a utilizar

- Lo primero que haremos será buscar en **dockerhub** la imagen de *Nextcloud*.

![alt text](/IAW/DOCKER/Imagenes/nextcloud.png)

- Después de encontrarlo, crearemos un archivo ***yaml*** para configuración del contenedor. Aquí vemos que existe el apartado *MYSQL_DATABASE* donde podemos cambiar el nombre de la base de datos.

![alt text](/IAW/DOCKER/Imagenes/docker_compose.png)

- Realizamos el comando de docker compose con el fin de crear el contenedor <u>(Tenemos que tener instalado docker compose)</u>

```bash
docker-compose up -d
```

![alt text](/IAW/DOCKER/Imagenes/docker_imagenes_nextcloud.png)

- Y después de entramos a **localhost:8080**, configuramos lo que nos pide la app. Y ya tendríamos el nextcloud configurado.

![alt text](/IAW/DOCKER/Imagenes/nextcloud_inicio.png)