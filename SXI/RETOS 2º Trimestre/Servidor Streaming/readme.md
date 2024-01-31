# Reto 5. Servidor Streaming

- Para esta tarea vamos a crear un servidor de streaming que emita a traves de OBS y reproduzca por VLC Player.

## 1. Instalar NGINX 

```bash
    sudo apt update
    sudo apt install nginx
```

## 2. Instalar modulo RTMP

```bash
    apt install libnginx-mod-rtmp
```

## 3. Configurar modulo RTMP

```bash
rtmp {
    server {
        listen 1935;
        application patata {
            live on;
            record off;
        }
    }
}
```

## Configurar OBS

Entramos en OBS Studio a AJUSTES/EMISION y rellenamos los datos del servidor.

```txt
Servidor: rtmp://52.203.26.215/patata
Clave de retransmision: 123456
```

![alt image](Capturas/OBS.png)

Con esto podremos iniciar la retransmisión

## Iniciar emisión en VLC

Entramos a VLC y **Abrir ubicación de red**

Insertamos 
```rtmp://54.209.93.205/patata/123456```

![alt image](Capturas/VLC.png)

Y ya tendríamos nuestro servicio de streaming


