#!/usr/bin/python

import sys
import netifaces
import json

lista_interfaces = netifaces.interfaces()

for inter in lista_interfaces:
    print(f"Nombre de interfaz: {inter}")
    addrs = netifaces.ifaddresses(inter)
    
    if netifaces.AF_INET in addrs:
        for addr_info in addrs[netifaces.AF_INET]:
            ip = addr_info['addr']
            print(f"Dirección IP: {ip}")
    else:
        print("No se encontraron direcciones IP para esta interfaz")
