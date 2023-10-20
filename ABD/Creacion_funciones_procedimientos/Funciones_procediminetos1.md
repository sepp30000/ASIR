# Funciones y procedimientos

## 1. Crea un bloque que devuelva la fecha de hoy 

```sql
SET SERVEROUTPUT ON;
DECLARE
  fecha_actual DATE;
BEGIN
  SELECT SYSDATE INTO fecha_actual FROM dual;
  DBMS_OUTPUT.PUT_LINE(TO_CHAR(fecha_actual));
END;
/
```

## 2. Crea un procedimiento que reciba dos parámetros y los imprima concatenados con un guión al medio

```sql
SET SERVEROUTPUT ON;
CREATE OR REPLACE PROCEDURE Patata (param1 IN VARCHAR2, param2 IN VARCHAR2) AS
BEGIN
  DBMS_OUTPUT.PUT_LINE(param1 || ' - ' || param2);
END Patata;
/


BEGIN
  Patata('Paco', 'Juan');
END;
/
```

## 3. Crea una función en la que le pases una cadena de texto y devuelva el número de caracteres que tiene

```sql
SET SERVEROUTPUT ON;
CREATE OR REPLACE FUNCTION Tomate (
  l_numero IN VARCHAR2
) RETURN NUMBER
IS
  resultado NUMBER;
BEGIN
  SELECT LENGTH(l_numero) INTO resultado FROM DUAL;
  RETURN resultado;
END Tomate;
/

SELECT Tomate ('siiiiiiiii') FROM dual; -- siiiiiiiii es el parametro de entrada

```

## 4. Consulta las líneas y el texto de la vista user_source de la función y procedimiento creados

```sql
SELECT line, text, type 
FROM user_source 
where UPPER(name) like 'PATATA'; 
```