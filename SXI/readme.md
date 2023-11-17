# Retos de SXI

1. Reto 1 y 2: DNS Cache, Maestro y Esclavo; DNS Delegación de zona
2. Reto 3: Integración servicios en red en topología de red DMZ 
3. Reto 4, 5 y 6: Configuracion del servidor DHCP Server Kea, Configuracion del servidor DHCP Realy con mikrotik y KEA, Configuracion del servidor DHCP Alta disponibilidad


## Reto 1 y 2:

- Tenemos los archivos que hay dentro de la carpeta **/Docker_dns/bind** los archivos de configuración y el *Dockerfile*. Tambien está el enlace de **dockerhub**.

[Dockerhub-dns](https://hub.docker.com/repository/docker/sepp30000/gns-dns/general)

## Reto 3 

- En gns3 tenemos la estructura demandada, la ip de salida es 192.168.2.112, la 192.168.10/24 representa la red fuera de la DMZ. La DMZ, es la red 10.0.1.0/24. El servidor dns y dhcp están fuera de la dmz.

![altimage](/SXI/Imagenes/Captura%20desde%202023-11-17%2008-10-49.png)

## Reto 4, 5 y 6

- Lo primero utilizamos nuestro docker de dhcp

[Dockerhub-dhcp](https://hub.docker.com/repository/docker/sepp30000/gns3-dhcp/general)

- Realizamos los cambios necesarios para que la red que tenemos sea la que realice dhcp y pille tanto las dns de nuestro servidor, como las de Conselleria.

- Realizamos el dhcp relay para dentro del router Mikrotik, de esta forma el servidor dhcp dará servicio a la dmz tambien.

- Después de esto creamos otro servidor dhcp y configuramos la alta disponibilidad en los dos servidores.
  
