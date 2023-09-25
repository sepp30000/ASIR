#!/usr/bin/python3
import sys
import os
import pwd

# Para saber la id del usuario
id = os.geteuid()
# Obtén el valor de la variable de entorno PS1
ps1 = os.environ.get('PS1')

# Comprobar que la id es mayor o igual a 1000
if id >= 1000:
    print(f"La ID de usuario es {id}")
else:
    sys.exit(1)
if ps1:
    print(f"El valor de PS1 es: {ps1}")
else:
    print("La variable de entorno PS1 no está definida.")
id_usuario = id  # Reemplaza 'usuario1' con el nombre de usuario que deseas consultar

try:
    # Obtiene la entrada de usuario a partir del nombre de usuario
    entrada_usuario = pwd.getpwuid(id_usuario)

    # Obtiene el campo GECOS de la entrada de usuario, gecos y dir
    campo_usuario = entrada_usuario.pw_name
    campo_gecos = entrada_usuario.pw_gecos
    campo_ruta = entrada_usuario.pw_dir

    print(f"Campo GECOS y la ruta para {campo_usuario}: GECOS -> {campo_gecos} \nRuta -> {campo_ruta}")
except KeyError:
    print(f"El usuario {id_usuario} no existe en el sistema.")
