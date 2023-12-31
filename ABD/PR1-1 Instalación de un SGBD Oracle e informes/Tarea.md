# PR1-1: Instalación de un SGBD Oracle e informes
## Creación de tablespaces

## Instalación de la base de datos y sql_developer

- Vamos a la web de **oracle** y después de registrarnos, descargamos e instalamos los dos programas.

![alt image](./Imagenes/Instalación.png)

![alt image](./Imagenes/Instalacion.png)

- Le volcamos la *contraseña* para **SYS, SYSTEM y PDBADMIN**.

![alt image](./Imagenes/contraseña_instalacion.png)

![alt image](./Imagenes/fin_instalacion.png)

- El ***sql-developer*** es un extraible sin instalación.

![alt image](./Imagenes/sql_developer.png)

- Ahora crearemos una conexión para SYS. Se realiza esta conexión para crear los *usuarios* y las *tablespaces*

![alt image](./Imagenes/conexión.png)

## Crea dos tablespace, uno para dieta_ganadera y otro para hospital

- Para crear los dos *Tablespaces* usamos la sintaxis:

```sql
create tablespace ts_dietaganadera
datafile 'C:\app\sepp\product\21c\ts_dietaganadera.dbf'
size 100M
autoextend on next 10 M
maxsize 2G;
```

![alt image](./Imagenes/ts_dietaganadera.png)

```sql
create tablespace ts_hospital
datafile 'C:\app\sepp\product\21c\ts_hospital.dbf'
size 100M
autoextend on next 10 M
maxsize 2G;
```

![alt image](./Imagenes/ts_hospital.png)

![alt image](./Imagenes/tablespaces.png)

## Creacion de tablas

- Ahora crearemos todas las tablas de la bbdd modificandola para **Oracle**. Usará la siguiente estructura:

---

```sql
//Tabla t_alimento

CREATE TABLE t_alimento (
  nombre_alimento VARCHAR2(20) NOT NULL,
  tipo_alimento VARCHAR2(20) NOT NULL,
  coste NUMBER(6,2) NOT NULL,
  od_alimento VARCHAR2(40),
  calorias NUMBER(6,2),
  CONSTRAINT pk_alimento PRIMARY KEY (nombre_alimento)
) TABLESPACE ts_dietaganadera;

INSERT INTO t_alimento (nombre_alimento, tipo_alimento, coste, od_alimento, calorias) VALUES ('alfalfa', 'alfalfa deshidratada', 0.15, 'normativa de calidad', 500.00);
INSERT INTO t_alimento (nombre_alimento, tipo_alimento, coste, od_alimento, calorias) VALUES ('algodon', 'semillas de algodon', 0.15, 'alto contenido en fibra', 500.00);
INSERT INTO t_alimento (nombre_alimento, tipo_alimento, coste, od_alimento, calorias) VALUES ('cebada', 'grano', 0.40, 'grano triturado', 100.00);
INSERT INTO t_alimento (nombre_alimento, tipo_alimento, coste, od_alimento, calorias) VALUES ('maiz', 'grano', 0.15, 'grano machacado', 500.00);
INSERT INTO t_alimento (nombre_alimento, tipo_alimento, coste, od_alimento, calorias) VALUES ('pienso', 'pienso', 0.15, 'mezcla de granos', 500.00);
INSERT INTO t_alimento (nombre_alimento, tipo_alimento, coste, od_alimento, calorias) VALUES ('soja', 'grano', 0.50, 'grano entero', 250.00);
INSERT INTO t_alimento (nombre_alimento, tipo_alimento, coste, od_alimento, calorias) VALUES ('trigo', 'grano', 0.30, 'grano selecto', 300.00);
```

## Creación de usuarios y roles

![alt image](./Imagenes/Creacion%20usuarios.png)
![alt image](./Imagenes/admin_hospital.png)
![alt image](./Imagenes/rol_select.png)
![alt image](./Imagenes/rolausuario.png)