#!/usr/bin/python3

import sys
import os
import re


orig = open(sys.argv[1],'r')
if os.path.exists(sys.argv[2]):
    os.remove(sys.argv[2])
    
destinosql = open(sys.argv[2],'x')

elultimoinsertbueno = ""

for line in orig:
    auxp = line 
    # Tipos de datos

    if auxp.startswith(") ENGINE"):
        auxp = ") TABLESPACE "+sys.argv[3]+"\n"

    if "VARCHAR" in auxp:
        auxp = auxp.replace("VARCHAR","VARCHAR2")

    if "FLOAT" in auxp:
        auxp = auxp.replace("FLOAT","NUMBER")

    if " INT " in auxp:
        auxp = auxp.replace(" INT "," NUMBER ")

    if auxp.startswith("INSERT INTO") and auxp.endswith("VALUES\n"):
        # Me la guardo
        elultimoinsertbueno = auxp
        auxp = ""

    if auxp.endswith(",\n") and auxp.startswith("("):
        auxp = auxp.replace(",\n",";\n")
   
    if auxp.startswith("("):
        pattern="\d{4}-\d{2}-\d{2}"

        fechasencontradas = re.findall(pattern,auxp)
        
        if len(fechasencontradas) > 0:
            for fecha in fechasencontradas:
               auxp = auxp.replace('\''+fecha+'\'','DATE(\''+fecha+'\')')
               #print(auxp)

        auxp = elultimoinsertbueno.strip()+auxp
        
        print(auxp)

    # THE MOTHER OF THE LAMB
    


    destinosql.write(auxp+"\n")

destinosql.close()






sys.exit(0)
