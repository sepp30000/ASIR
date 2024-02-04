# Tarea 6 - Seguridad en redes inalámbricas

Con una máquina virtual y un router wifi, crearemos un servidor RADIUS y listas de acceso mediante MAC


clients.conf
client mikrotik {
    ipaddr = 192.168.1.1
    secret = mysecret
}

users
usuario1 Cleartext-Password := "contraseña1"
usuario2 Cleartext-Password := "contraseña2"