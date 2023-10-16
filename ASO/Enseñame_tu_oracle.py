#!/usr/bin/python3

import sys
import os
import re
from termcolor import colored, cprint

# Some useful values
DATE_FORMAT="\'YYYY-MM-DD\'"
THIS_VERSION="20231006-v4"

# Some sanity checks

cprint(" * Script version "+THIS_VERSION,'green')

if len(sys.argv) < 4:
    cprint(" USAGE : oraclize.py ORIG.sql DEST.sql TABLESPACE",'red',attrs=['underline'])
    sys.exit(1)


orig = open(sys.argv[1],'r')
if os.path.exists(sys.argv[2]):
    cprint(" * Old file present...removing it!",'green')
    os.remove(sys.argv[2])
    
destinosql = open(sys.argv[2],'x')

elultimoinsertbueno = ""

for line in orig:
    auxp = line 


    # Tipos de datos
    if auxp.startswith(") ENGINE"):
        auxp = ") TABLESPACE "+sys.argv[3]+"\n"


    #if re.match('varchar', auxp, re.IGNORECASE):
    #    print("Aquitoca"+ auxp)
    
    if "VARCHAR" in auxp:
        auxp = auxp.replace("VARCHAR","VARCHAR2")

    if "varchar" in auxp:
        auxp = auxp.replace("varchar","VARCHAR2")


    if "FLOAT" in auxp:
        auxp = auxp.replace("FLOAT","NUMBER")

    if "float" in auxp:
        auxp = auxp.replace("float","NUMBER")
    
    if " INT " in auxp:
        auxp = auxp.replace(" INT "," NUMBER ")

    if " int(" in auxp:
        auxp = auxp.replace(" int("," NUMBER(")
    
    if auxp.startswith("INSERT INTO") and auxp.endswith("VALUES\n"):
        # Me la guardo
        elultimoinsertbueno = auxp
        auxp = ""

    if auxp.endswith(",\n") and auxp.startswith("("):
        
        auxp = auxp.replace(",\n",";\n")
   
        if "`" in auxp:
            auxp = auxp.replace("`","'")

    if auxp.startswith("("):
        pattern="\d{4}-\d{2}-\d{2}"

        fechasencontradas = re.findall(pattern,auxp)
        
        if len(fechasencontradas) > 0:
            for fecha in fechasencontradas:
               auxp = auxp.replace('\''+fecha+'\'','TO_DATE(\''+fecha+'\','+DATE_FORMAT+')')
               #print(auxp)

        auxp = elultimoinsertbueno.strip()+auxp
    
        #print(auxp)
        
#ALTER TABLES
    if auxp.startswith("ALTER"):
        auxp = auxp.replace("\n"," ADD (\n")
        # Recuerda cerrar los parentesis al final
# Primary KEYS
    if auxp.startswith("  ADD PRIMARY"):
        auxp = auxp.replace("ADD", "CONSTRAINT pk")
        #print(auxp)
# UNIQUE KEYS
    if auxp.startswith("  ADD UNIQUE"):
        auxp = auxp.replace("ADD", "CONSTRAINT uk")
        auxp = auxp.replace("KEY", "")
# KEYS
    if auxp.startswith("  ADD KEY"):
        auxp = auxp.replace("ADD", "CONSTRAINT")
# FOREIGN KEYS
    if auxp.startswith("  ADD CONSTRAINT"):
        auxp = auxp.replace("ADD", "")
# Cierre parentesis
    if auxp.startswith("  "):
        #print(auxp)
        if auxp.endswith(";\n"):
            auxp = auxp.replace(";\n",");\n")
            # print(auxp)
    # THE MOTHER OF THE LAMB

    auxp= auxp.replace("`","")


    destinosql.write(auxp+"\n")

destinosql.close()






sys.exit(0)
