#!/usr/bin/python3

import psutil

connections = psutil.net_connections(kind='inet')  

for linea in connections:
    local_ip, local_port = linea.laddr
    print(f"Puerto Local: {local_port}\t"          
          f"PID: {linea.pid}\t"
          f"Programa: {psutil.Process(linea.pid).name()}")
