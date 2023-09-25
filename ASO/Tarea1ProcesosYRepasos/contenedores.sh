#!/bin/bash

contenedores=$(docker ps -a | cut -d " " -f1 | tail -n +2)
echo "$contenedores" > prueba.txt

# Aqui leeremos linea por linea el archivo para realizar las acciones

while IFS= read -r linea
do
	 docker start "$linea"
		ip=$(docker inspect "$linea" | grep IPAddress| head -2 | tail -1| cut -d ":" -f2| tr "," " ")
		echo "$linea 	| $ip"		
done < prueba.txt



exit 0
