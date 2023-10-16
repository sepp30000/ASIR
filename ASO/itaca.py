#!/usr/bin/python3

import sys
import os
import subprocess

MIRROR = "http://lliurex.net/focal"
Programa = sys.argv[1]

print ("* Welcome to the Itaca installer ")

if os.geteuid() != 0:
    print("No eres root, pendejo")
    sys.exit(1)

# rc = 0
# Buscar el programa
# dpkg = subprocess.run(['dpkg', '-l', Programa], stdout=subprocess.PIPE, text=True)
# dpkg_output = dpkg.stdout
# print(dpkg_output)

# Hacer el tr
cmd = 'dpkg -l Programa|tr -s " "|cut -d " " -f2|grep Programa' 
ps = subprocess.Popen(cmd,shell=True,stdout=subprocess.PIPE,stderr=subprocess.STDOUT)
output = ps.communicate()[0]
print(output)

if output != (Programa) :
    print("ayuda")
else:
    print("no")
#if rc != 0:
#    print("si")
#else:
#    print("no")

# Ejecuta el comando 'ls' en un sistema Unix/Linux y muestra la salida
#result = subprocess.run(['ls', '-l'], stdout=subprocess.PIPE, text=True)
#print(result.stdout)
sys.exit(0)