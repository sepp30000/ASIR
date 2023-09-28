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