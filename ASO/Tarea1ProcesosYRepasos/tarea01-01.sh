#!/bin/bash

echo " * Verificando permisos" 
if [ $(id -u) -ne 0 ]; then
	echo " [ ERROR ] : Necesitas permisos de root para ejecutar este comando"
	exit 1
fi


echo " * [ Step 1 ] La IP es valida? "

MYIP="$1"

if [ -z $MYIP ]; then
	echo " * [ ERROR ] "
	echo "   [ USAGE ] : $(basename $0) IPAddress"
	exit 1
else
	echo " * [ Step 2.1 ] : La IP ha sido indicada "

fi

if [[ $MYIP =~ ^[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}$ ]]; then

	echo " * [ Step 2.2 ] : Parece una IP Valida : $MYIP "
else
	echo " * [ ERROR ] : La IP indicad no es valida : $MYIP "
	exit 1
fi


echo " * [ Step 3 ] : Es accesible? "

HAYERRORES=$(ping $MYIP -c 1 | grep errors)

if [ -z "$HAYERRORES" ]; then
	echo " - La IP es Accesible"

else
	echo " * [ Error ] : No soy capaz de llegar"
	exit 1
fi


echo " * [ Step 4 ] : Lista de servicios " 

nmap $MYIP

exit 0
