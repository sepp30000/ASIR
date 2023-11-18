#!/bin/bash

servicio=$1

case $servicio in
    apache)
        systemctl start apache2.service;;
    mariadb)
        systemctl start mariadb.service;;
    ssh)
        systemctl start ssh.service;;
    apache.service)
        systemctl start apache2.service;;
    mariadb.service)
        systemctl start mariadb.service;;
    ssh)
        systemctl start ssh.service;;       
    *)
        echo "El servicio no está disponible";;
esac

exit 0
