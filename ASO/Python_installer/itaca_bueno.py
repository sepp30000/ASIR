#!/usr/bin/python3

import sys
import os
import subprocess

MIRROR = "http://lliurex.net"
DISTRO = "focal"
ARCHIVO = f"{MIRROR}/{DISTRO}/dists/focal-updates/main/binary-amd64/Packages.gz"
N_ARCHIVO = "Packages.gz"
# Introducir programa por parámetro de entrada
# Programa = sys.argv[1]
# O programa específico
Programa = "Itaca"

print("* Welcome to the Itaca installer")

# Verificar si eres superusuario
if os.geteuid() != 0:
    print("You are not root, please run this script with sudo.")
    sys.exit(1)

# Descargar Packages.gz
subprocess.call(["wget", "-P", "/tmp", ARCHIVO])

# Descomprimir el packages.gz
subprocess.call(["gzip", "-d", "/tmp/"+N_ARCHIVO])






sys.exit(0)
