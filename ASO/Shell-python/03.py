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
    if uid >= 1000:
        usuario = str(linea_p[0].strip())
        directorio = str(linea_p[5].strip())
        
        # Ver si el usuario tiene /home
        if directorio == "/home/"+usuario:
            print ("El usuario "+usuario+" tiene el directorio -> "+directorio)





passwd.close()

sys.exit(0)