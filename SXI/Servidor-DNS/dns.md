# Creacion de contenedor para servidor dns en docker

## Creamos una red en docker

```bash
docker network create --subnet=172.24.0.0/16 red-pruebas
```

## Configuramos los archivos de BIND9

- Creamos el archivo named.conf.options (Nosotros ya lo tenenmos)

```bash
mkdir -p /opt/bind9/configuration
nano /opt/bind9/configuration/named.conf.options
```

[named.conf.options](/SXI/Servidor-DNS/named.conf.options)

- Después definiremos la zone llamada zona-pruebas

```bash
nano /opt/bind9/configuration/db.zona-pruebas.io
```

- db.instar-net.io manejará todos los servicios

```bash
nano /opt/bind9/configuration/db.instar-net.io
```

## Montamos el dockerfile

[Dockerfile](/SXI/Servidor-DNS/dockerfile)
