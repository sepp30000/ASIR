#!/usr/bin/env python

import ping3
import sys

hostname = ''
try:
    ping = ping3.ping(hostname)
    if ping is not None:
        print(f"Success - Round-Trip Time: {ping} ms")
    else:
        print("fallo")
except:
        print("Failed")

sys.exit(0)

