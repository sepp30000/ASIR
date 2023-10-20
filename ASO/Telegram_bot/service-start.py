import os

# Replace 'your-service-name' with the actual service name
service_name = 'apache2'

# Start the service
os.system(f'systemctl status {service_name}')