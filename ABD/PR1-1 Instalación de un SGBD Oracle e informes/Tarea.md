# PR1-1: Instalación de un SGBD Oracle e informes
## Creación de tablespaces

- Para la creación de **tablespaces** debemos usar el siguiente comando: 

    
        CREATE TABLESPACE ts_dietaganadera
        DATAFILE 'C:\app\sepp\product\21c\ts_dietaganadera.dbf' SIZE 100M 
        AUTOEXTEND ON NEXT 10M MAXSIZE 2G;

---

![alt text](/ABD/PR1-1%20Instalación%20de%20un%20SGBD%20Oracle%20e%20informes/Imagenes/Crear_tablespace.png)

- Si lo que queremos es en una sola sentencia crear el **tablespace, el usuario y sus privilegios** usamos la sintaxis:

