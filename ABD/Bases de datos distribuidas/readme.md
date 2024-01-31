# Tarea bbdd distribuidas
ALTER SESSION SET "_ORACLE_SCRIPT"=TRUE;


Crearemos los 7 tablespaces (ts_enric, ts_particion1, ts_particion2, ts_particion3, ts_compañero1, ts_compañero2, ts_compañero3)

CREATE TABLESPACE ts_particion3
DATAFILE 'C:\app\sepp\product\21c\particion3.dbf' SIZE 100M
AUTOEXTEND ON NEXT 10M
maxsize 200M;

-- USER SQL
CREATE USER "viktor" IDENTIFIED BY "12345"  
DEFAULT TABLESPACE "TS_LLUIS";

-- QUOTAS
ALTER USER "viktor" QUOTA 200M ON "TS_LLUIS";

-- ROLES

-- SYSTEM PRIVILEGES

Sobre cada tabla, no sobre todas melon

GRANT CREATE SESSION TO "viktor" ;
GRANT CONNECT TO "viktor";
GRANT SELECT ANY TABLE TO "viktor" ;
GRANT DELETE ANY TABLE TO "viktor" ;
GRANT UPDATE ANY TABLE TO "viktor" ;
GRANT INSERT ANY TABLE TO "viktor" ;

Al que crea las tablas 

GRANT CREATE ANY TABLE TO "jose";

CREATE TABLE ALUMNOS (   

    NIA NUMBER(8),

    dni VARCHAR2(9) ,   

    nombre VARCHAR2(20),   

    ciudad VARCHAR2(15) DEFAULT 'Valencia',   

    telefono NUMBER(9),   

    ciclo VARCHAR2(10),   

    nota NUMBER(2,1),   

       

)   tablespace ts_enric;


Aqui haremos nuestras particiones según el nia
PARTITION BY RANGE (NIA) (  

    PARTITION particion_1 VALUES LESS THAN (20000000) TABLESPACE TS_*, 

    PARTITION particion_2 VALUES LESS THAN (40000000) TABLESPACE TS_*,  

    PARTITION particion_3 VALUES LESS THAN (MAXVALUE) TABLESPACE TS_* 

);  


