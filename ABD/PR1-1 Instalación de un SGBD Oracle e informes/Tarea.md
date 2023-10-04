# PR1-1: Instalación de un SGBD Oracle e informes
## Creación de tablespaces

## Instalación de la base de datos y sql_developer

- Vamos a la web de **oracle** y después de registrarnos, descargamos e instalamos los dos programas.

![alt image](/ABD/PR1-1%20Instalación%20de%20un%20SGBD%20Oracle%20e%20informes/Imagenes/Instalación.png)

![alt image](/ABD/PR1-1%20Instalación%20de%20un%20SGBD%20Oracle%20e%20informes/Imagenes/Instalacion.png)

- Le volcamos la *contraseña* para **SYS, SYSTEM y PDBADMIN**.

![alt image](/ABD/PR1-1%20Instalación%20de%20un%20SGBD%20Oracle%20e%20informes/Imagenes/contraseña_instalacion.png)

![alt image](/ABD/PR1-1%20Instalación%20de%20un%20SGBD%20Oracle%20e%20informes/Imagenes/fin_instalacion.png)

- El ***sql-developer*** es un extraible sin instalación.

![alt image](/ABD/PR1-1%20Instalación%20de%20un%20SGBD%20Oracle%20e%20informes/Imagenes/sql_developer.png)

- Ahora crearemos una conexión para SYS. Se realiza esta conexión para crear los *usuarios* y las *tablespaces*

![alt image](/ABD/PR1-1%20Instalación%20de%20un%20SGBD%20Oracle%20e%20informes/Imagenes/conexión.png)

## Crea dos tablespace, uno para dieta_ganadera y otro para hospital

- Para crear los dos *Tablespaces* usamos la sintaxis:

```sql
create tablespace ts_dietaganadera
datafile 'C:\app\sepp\product\21c\ts_dietaganadera.dbf'
size 100M
autoextend on next 10 M
maxsize 2G;
```

![alt image](/ABD/PR1-1%20Instalación%20de%20un%20SGBD%20Oracle%20e%20informes/Imagenes/ts_dietaganadera.png)

```sql
create tablespace ts_hospital
datafile 'C:\app\sepp\product\21c\ts_hospital.dbf'
size 100M
autoextend on next 10 M
maxsize 2G;
```

![alt image](/ABD/PR1-1%20Instalación%20de%20un%20SGBD%20Oracle%20e%20informes/Imagenes/ts_hospital.png)

![alt image](/ABD/PR1-1%20Instalación%20de%20un%20SGBD%20Oracle%20e%20informes/Imagenes/tablespaces.png)

## Creacion de tablas


