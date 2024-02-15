# Tarea final IAW

## Crear un repositorio para la tarea final

Para empezar crearemos un repositorio llamada **IAW_Final**.

![alt image](Capturas/Creación_repositorio.png)

[Repositorio](https://github.com/sepp30000/IAW_Final)

## Preparación del entorno 

Antes de ponernos manos a la obra, prepararemos una instancia de AWS que actuará como servidor. En este servidor, montaremos los usuarios necesarios para empezar.

![alt image](Capturas/Instacia%20AWS.png)

Nos hacemos un dominio dinámico para no tener problemas a la hora de ejecutar la tarea **servjenkins.duckdns.org**

```bash
ssh -i NGINX.pem ubuntu@servjenkins.duckdns.org
```

Hecho esto crearemos los usuarios del xls

![alt image](Capturas/usuarios%20basicos.png)

![alt image](Capturas/usuarios.png)






# Importabte 
```bash
scp -i puto.pem -p /home/sepp/Documentos/token/puto.pem  ubuntu@jenkinsasir.duckdns.org:/home/ubuntu/puto.pem
```