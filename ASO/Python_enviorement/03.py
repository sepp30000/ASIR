import os
import random

# Array de los alumnos
alumnos = ["Jose", "Lautaro", "Victor", "David", "Adrian", "Jesus"]

# Carpeta donde se guardarán los archivos
carpeta_investigados = "investigados"

# Itera a través de la lista de alumnos
for nombre in alumnos:
    print(nombre)
    
    # Crea el nombre del archivo completo con la carpeta y la extensión .txt
    archivo = os.path.join(carpeta_investigados, f"{nombre}.txt")
    
    print(archivo)  # Imprime el nombre del archivo
    
    # Crea y abre el archivo en modo escritura (w)
    with open(archivo, "w") as file:
        # Volcado del número aleatorio
        numero = random.randint(1, 6)
        file.write(str(numero))  # Escribe el número como una cadena
