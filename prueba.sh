#!/bin/bash

# Obtener la lista de usuarios del sistema
users=$(getent passwd)

# Iterar sobre cada usuario
while IFS=: read -r username _ uid _ _ _ _; do
    # Verificar si el UID es mayor a 1005 (1005 es un ejemplo, usa el número correcto)
    if [ "$uid" -gt 1005 ]; then
        echo "Se ha creado un nuevo usuario: $username (UID: $uid)"
        # Aquí puedes agregar tu lógica para enviar una notificación al administrador
        # Por ejemplo, puedes enviar un correo electrónico
        # mail -s "Nuevo usuario creado en el sistema" admin@example.com <<< "Se ha creado un nuevo usuario: $username (UID: $uid)"
    fi
done <<< "$users"
