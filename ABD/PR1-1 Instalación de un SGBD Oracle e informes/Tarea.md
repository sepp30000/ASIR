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


- Ahora crearemos todas las tablas de la bbdd modificandola para **Oracle**.

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

//Tabla t_alimento_dieta_toma

```