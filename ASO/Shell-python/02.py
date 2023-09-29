#!/usr/bin/python

import sys
import os

# Vamos a abrir el archivo passwd y shadow

print("Recorremos el fichero /etc/passwd")

passwd = open("/etc/passwd","r")
shadow = open("/etc/shadow","r")

numLinea = 0
#Bucle que lee linea por linea los dos archivos
#_s y _p diferencia entre shadow y passwd

for linea in passwd:
    linea_p = (linea.split(':'))
    usuario_p = linea_p[0].strip()
    shell_p = linea_p[6].strip()
    #if que me dice si la shell es valida
    if shell_p == "/bin/bash" or shell_p == "/bin/zsh" or shell_p == "/bin/sh" or shell_p == "/bin/dash" or shell_p == "/bin/ksh": 
        for linea2 in shadow:
            linea_s = (linea2.split(':'))
            usuario_s = linea_s[0].strip()
            contraseña = linea_s[1]
            if contraseña == "*" or contraseña == "!":
                False
            else:
                print("Los usuarios que concuerdan son: "+str(usuario_s))







passwd.close()
shadow.close()

sys.exit(0)
