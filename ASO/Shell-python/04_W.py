#!/usr/bin/python

import sys
import socket

# De esta manera se consigue la ip de la tarjeta principal
s = socket.socket(socket.AF_INET, socket.SOCK_DGRAM)
s.connect(("8.8.8.8", 80))
print(s.getsockname()[0])
s.close()

