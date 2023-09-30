#!/usr/bin/python

import sys
import netifaces


# Interfaces de res
lista_interfaces = netifaces.interfaces()

# Bucle que lee las interfaces
for inter in lista_interfaces:
    print()
    # ifaddresses muestra los datos de cada interfaz
    direcciones = netifaces.ifaddresses(inter)
    # En el bucle buscamos por el json que conforma ifaddresses
    if netifaces.AF_INET in direcciones:
        for dir_info in direcciones[netifaces.AF_INET]:
            ip = dir_info['addr']
            print("El nombre de la interfaz es: "+inter+" y su ip es -> "+ip)
    else:
        print("La interfaz "+inter+"no tiene ip")
    


sys.exit(0)