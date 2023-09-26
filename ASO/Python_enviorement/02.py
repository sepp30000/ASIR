#!/usr/bin/python3
import sys
import os
import shutil
import random

#Array de los alumnos"
alumnos = ["Jose", "Lautaro", "Victor", "David", "Adrian", "Jesus"]

fichero = "/home/sepp/investigacion"
f_investigados = "/home/sepp/investigacion/investigados"
f_sospechosos = "/home/sepp/investigacion/sospechosos"

if os.path.exists(fichero):
    #Preguntar si borramos el directorio
    print("El fichero ya existe, ¿deseas borrarlo?")
    res= input()

    if res == "si":
        shutil.rmtree(fichero)
        print("Fichero Borrado")
    else:
        print("No se ha borrado el fichero")
else:
    # Parte gorda del script
    # Creacion de ficheros
    os.mkdir(fichero)
    print("Creado investigados")
    print("Creado sospechosos")
    os.mkdir(f_investigados)
    os.mkdir(f_sospechosos)
    #Bucle que crea los archivos a traves del array
    for nombre in alumnos:

        # Creacion de archivo
        archivo = os.path.join(f_investigados, f"{nombre}.tkn")
        with open(archivo,'x') as investigados:
            #Insercion del numero aleatorio
            num = random.randint(1, 6)
            investigados.write(str(num))
        #Abrir archivo
        with open(archivo, 'r') as sospechosos:
            n_archivo = int(sospechosos.read())
        #If de numero par
        destino = "/home/sepp/investigacion/sospechosos/"
        if n_archivo % 2 == 0:
            shutil.move(archivo, destino)
            print(archivo+" es sospechoso")
        else:
            print(archivo+" no es sospechoso")

        
    

sys.exit(0)
