import os
import subprocess

# Reemplaza 'your-service-name' con el nombre real del servicio
ruta = "./start"  # Debes especificar la ruta completa al ejecutable
service_name = 'docker.service'

# Inicia el servicio
try:
    subprocess.run([ruta, service_name])
    print("La aplicación se ha abierto correctamente.")
except Exception as e:
    print("Error al abrir la aplicación:", e)
