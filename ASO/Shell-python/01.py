#!/usr/bin/python

import sys
import os
import pwd


print("Recorremos el fichero /etc/passwd")

passwd= open("/etc/passwd","r")
numLinea = 0

#Creación del bucle que recorre passwd

for linea in passwd:
    linea_p = (linea.split(':'))
    uid = int(linea_p[3].strip())
    
    # Ver si la uid es mayor a 1000 nos diga el usuario y la carpeta
    if 100 <= uid <= 500:
        uid_p = str(linea_p[3].strip())
        usuario = str(linea_p[0].strip())
        print ("El usuario con la "+uid_p+" es: "+usuario)    

passwd.close()


sys.exit(0)
