#!/usr/bin/python3

import sys
import os
import subprocess

# Define the service name
service_name = sys.argv[1]

# Check the status of the service
output = subprocess.run(["systemctl", "status", service_name], capture_output=True)
status = output.stdout.decode().strip()
arrancado = "running"
muerto = "dead"

if arrancado in status:
    print ("El servicio esta arrancado")
elif muerto in status:
    print ("El servicio esta muerto")
else:
    print ("Es posible que ese servicio no exista")

