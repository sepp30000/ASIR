#!/bin/bash


echo "Verifique el usuario que ejecuta el script tiene permisos efectivos de root"

if [ $(id -u) = 0 ];	then
	echo "Eres Root" 
else 
	echo "No eres root"
fi

echo "El parámetro IP está presente y es una IP válida."

miip="$1"

# -z comprueba si esta vacio el parametro

if [ -z $miip ]; then
	echo "No tengo ip"
		exit 1
fi

if [[ $miip =~ ^[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}$ ]]; then
	echo "La ip es valida"
else
	echo "La ip no es valida" 
fi



echo "Se puede hacer ping a la misma"



echo "Liste los servicios que posiblemente esté ejecutando la máquina en esa IP."
