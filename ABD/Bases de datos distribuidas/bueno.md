# Proyecto base de datos distribuída
<br>
<br>
<br>
<br>
<br>

![Imagen](Capturas/Oracle_Logo.jpg)

<br>
<br>
<br>
<br>
<br>

<center>José Ramón Peris</center>
<center>Fecha: 27-01-2023</center>

---

<br>


## Creación de los tablespaces

En la primera parte crearemos los 7 tablespaces (ts_enric, ts_particion1, ts_particion2, ts_particion3, ts_compañero1, ts_compañero2, ts_compañero3)

**Muy importante**

ALTER SESSION SET "_ORACLE_SCRIPT"=TRUE;

```sql
--TS_ENRIC
CREATE TABLESPACE ts_enric
DATAFILE 'C:\app\sepp\product\21c\enric.dbf' SIZE 100M
AUTOEXTEND ON NEXT 10M
maxsize 200M;

--TS_DRAC
CREATE TABLESPACE ts_drac
DATAFILE 'C:\app\sepp\product\21c\drac.dbf' SIZE 100M
AUTOEXTEND ON NEXT 10M
maxsize 200M;

--TS_LLUIS
CREATE TABLESPACE ts_lluis
DATAFILE 'C:\app\sepp\product\21c\lluis.dbf' SIZE 100M
AUTOEXTEND ON NEXT 10M
maxsize 200M;

--TS_HORTA
CREATE TABLESPACE ts_horta
DATAFILE 'C:\app\sepp\product\21c\horta.dbf' SIZE 100M
AUTOEXTEND ON NEXT 10M
maxsize 200M;

--TS_PARTICION1
CREATE TABLESPACE ts_particion1
DATAFILE 'C:\app\sepp\product\21c\particion1.dbf' SIZE 100M
AUTOEXTEND ON NEXT 10M
maxsize 200M;

--TS_PARTICION2
CREATE TABLESPACE ts_particion2
DATAFILE 'C:\app\sepp\product\21c\particion2.dbf' SIZE 100M
AUTOEXTEND ON NEXT 10M
maxsize 200M;

--TS_PARTICION3
CREATE TABLESPACE ts_particion3
DATAFILE 'C:\app\sepp\product\21c\particion3.dbf' SIZE 100M
AUTOEXTEND ON NEXT 10M
maxsize 200M;

```

## Creación de usuarios y permisos

Con los tablespaces ya creados, crearemos los usuarios.

```sql
--José
CREATE USER "jose" IDENTIFIED BY "12345"
DEFAULT TABLESPACE "ts_enric";
ALTER USER "jose" QUOTA 200M ON "ts_enric";

-- Viktor
CREATE USER "viktor" IDENTIFIED BY "12345"
DEFAULT TABLESPACE "ts_lluis";
ALTER USER "viktor" QUOTA 200M ON "TS_LLUIS";

-- Lautaro
CREATE USER "lautaro" IDENTIFIED BY "12345"
DEFAULT TABLESPACE "ts_horta";
ALTER USER "lautaro" QUOTA 200M ON "ts_horta";

-- Jesús
CREATE USER "jesus" IDENTIFIED BY "12345"
DEFAULT TABLESPACE "ts_horta";
ALTER USER "jesus" QUOTA 200M ON "ts_drac";
```

Permisos

El permiso de creación de tablas, luego lo revocaremos. 

```sql
--Jose
GRANT CREATE SESSION TO "jose"; 
GRANT CONNECT TO "jose"; 
GRANT SELECT ANY TABLE TO "jose"; 
GRANT CREATE ANY TABLE TO "jose"; 
GRANT DELETE ANY TABLE TO "jose"; 
GRANT UPDATE ANY TABLE TO "jose"; 
GRANT INSERT ANY TABLE TO "jose";

--Viktor
GRANT CREATE SESSION TO "viktor" ; 
GRANT CONNECT TO "viktor"; 
GRANT SELECT ANY TABLE TO "viktor" ; 
GRANT CREATE ANY TABLE TO "viktor"; 
GRANT DELETE ANY TABLE TO "viktor" ; 
GRANT UPDATE ANY TABLE TO "viktor" ; 
GRANT INSERT ANY TABLE TO "viktor" ; 

--Lautaro
GRANT CREATE SESSION TO "lautaro"; 
GRANT CONNECT TO "lautaro"; 
GRANT SELECT ANY TABLE TO "lautaro"; 
GRANT CREATE ANY TABLE TO "lautaro"; 
GRANT DELETE ANY TABLE TO "lautaro"; 
GRANT UPDATE ANY TABLE TO "lautaro";
GRANT INSERT ANY TABLE TO "lautaro"; 

--Jesús
GRANT CREATE SESSION TO "jesus"; 
GRANT CONNECT TO "jesus"; 
GRANT SELECT ANY TABLE TO "jesus"; 
GRANT CREATE ANY TABLE TO "jesus"; 
GRANT DELETE ANY TABLE TO "jesus"; 
GRANT UPDATE ANY TABLE TO "jesus"; 
GRANT INSERT ANY TABLE TO "jesus"; 
```