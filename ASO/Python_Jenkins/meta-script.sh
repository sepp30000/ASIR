#!/bin/bash

# DO NOT EDIT THIS SCRIPT 
# IT WILL BE AUTOMAGICALLY GENERATED

# Orig users-240122.xlsx
# Dest users-240123.xlsx


# DESPIDOS PROCEDENTES :  

# Deleting Cesar Tomas
deluser csueca

# Deleting Angel Diseño
deluser aberlanas


# NUEVOS CONTRATOS 
# Contrato a Jose Guesser
useradd -m -d "/home/jguesser" -s "/bin/bash" -u 5004 -c "Jose Guesser, ,123554422, ,timeguesser@champion.co.uk" "jguesser"
echo "jguesser:123554422"| chpasswd 

# USUARIOS MODIFICADOS 
# Modifico a Lautaro Guapeton
# Modifico nombre usuario 
usermod -l lautarin lautarino
# Modifico a Lautaro Guapeton
# Modifico nombre completo 
chfn -f "Lautaro Feito" lautarino
# Modifico a Viktor Thin
# Modifico correo 
usermod -c "scriptingboy@powershell.ms" vthin
exit 0
