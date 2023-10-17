#!/usr/bin/python3

import sys
import os
import subprocess

MIRROR = "http://lliurex.net"
DISTRO = "focal"
ARCHIVO = f"{MIRROR}/{DISTRO}/dists/focal-updates/main/binary-amd64/Packages.gz"
N_ARCHIVO = "Packages.gz"
A_Paquete = "Packages"
Programa = "itaca"

print("* Welcome to the Itaca installer")

# Verificar si eres superusuario
if os.geteuid() != 0:
    print("No eres root, pendejo")
    sys.exit(1)

def check_package_installed(Programa):        
    try:
        # Ejecuta el comando dpkg para verificar si el paquete está instalado.
        subprocess.check_output(['dpkg', '-s', Programa])
        print(f'{Programa} está instalado, elimínalo antes de intentar instalarlo de nuevo.')
        sys.exit(1)
    except subprocess.CalledProcessError:
        print(f'{Programa} no está instalado.')

    # Descargar Packages.gz
        subprocess.call(["wget", "-P", "/tmp/", ARCHIVO])

    # Descomprimir el packages.gz
        subprocess.call(["gzip", "-d", f"/tmp/{N_ARCHIVO}"])

    # Buscar la dependencia del paquete en los metadatos
        descarga = f"cat /tmp/{A_Paquete} | grep itaca | grep Filename | grep -v zero- | cut -d ' ' -f2"
        descarga_1_bytes = subprocess.check_output(descarga, shell=True)
        descarga_1 = descarga_1_bytes.decode("utf-8").strip()
        e_descarga = f"{MIRROR}/{DISTRO}/{descarga_1}"

    # Descargamos el paquete
        subprocess.call(["wget", "-P", "/tmp/", e_descarga, "-O", "/tmp/itaca.deb"])

    # Instalamos el paquete        
        subprocess.call(["dpkg", "-i", "/tmp/itaca.deb"])

check_package_installed(Programa)

sys.exit(0)
