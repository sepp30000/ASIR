#!/usr/bin/python3

import sys
import os

logs = open("/var/log/syslog","r")
ultimos_errores = []

# bucle que lee linea por linea el archivo
for line in logs:
    fallo = "error"
    # encontramos error en la linea     
    if fallo in line:
        ultimos_errores.append(line)

        # Buscamos las ultimas 10 lineas
        if len(ultimos_errores) > 10:
            ultimos_errores.pop(0)


#imprimimos las 10 ultimas lineas
for error in ultimos_errores:
    print(error)






