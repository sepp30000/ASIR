import os
import subprocess
# Replace 'your-service-name' with the actual service name
ruta = "./stopuid"
service_name = 'docker.service'

# Start the service
try:
    subprocess.Popen([ruta]+ [service_name])
    print("La aplicación se ha abierto correctamente.")
except Exception as e:
    print("Error al abrir la aplicación:", e)