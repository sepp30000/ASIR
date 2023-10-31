
#!/bin/bash

servicio=$1

case $servicio in
    apache)
        systemctl stop apache2.service;;
    mariadb)
        systemctl stop mariadb.service;;
    ssh)
        systemctl stop ssh.service;;
    apache.service)
        systemctl stop apache2.service;;
    mariadb.service)
        systemctl stop mariadb.service;;
    ssh.service)
        systemctl stop ssh.service;;  
    *)
        echo "El servicio no está disponible";;
esac

exit 0
