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

## 2. Ejecuta un contenedor a partir de la imagen hello-word. Comprueba que nos devuelve la salida adecuada. Comprueba que no se está ejecutando. Lista los contenedores que están parado. Borra el contenedor.

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

