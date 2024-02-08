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
useradd -m -d "/home/jguesser" -s "/bin/bash" -u 5004 -c "Jose Guesser, ,1234422, ,timeguesser@champion.co.uk" "jguesser"
echo "jguesser:1234422"| chpasswd 

# USUARIOS MODIFICADOS 
# Modifico a Adrian Pepino
# Modifico Teléfono 
chfn -r "6685858" apepino
# Modifico a Lautaro Guapeton
# Modifico nombre usuario 
usermod -l lautarino lautarino
# Modifico a Lautaro Guapeton
# Modifico nombre completo 
chfn -f "Lautaro Guapeton" lautarino
# Modifico a Lautaro Guapeton
# Modifico Teléfono 
chfn -r "1223322" lautarino
# Modifico a David Tanque
# Modifico Teléfono 
chfn -r "7449999" dtanke
# Modifico a Viktor Thin
# Modifico Teléfono 
chfn -r "4562233" vthin
# Modifico a Viktor Thin
# Modifico correo 
usermod -c "scriptingman@shell.linux" vthin
# Modifico a Jesus Papi
# Modifico Teléfono 
chfn -r "44553211" jmarchante
exit 0
