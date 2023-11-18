#!/usr/bin/python3

# Status, stop y start

import subprocess
# Define the service name
service_name = "nginx"
# Stop the service
subprocess.run(["systemctl", "stop", service_name])
print(f"{service_name} service has been stopped")
# Start the service
subprocess.run(["systemctl", "start", service_name])
print(f"{service_name} service has been started")
# Check the status of the service
output = subprocess.run(["systemctl", "status", service_name], capture_output=True)
status = output.stdout.decode().strip()
print(status)