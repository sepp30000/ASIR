#def list_ips_and_hostnames(network):
#    for i in range(1, 256):  # Escanea todas las IPs del rango 1-255
#        ip = f"{network}.{i}"
#        try:
#            hostname = socket.gethostbyaddr(ip)
#            print(f"IP: {ip}\tHostname: {hostname[0]}")
#        except socket.herror:
#            print(f"IP: {ip}\tHostname: No se pudo resolver")
#
#if __name__ == '__main__':
#    network = "192.168.10"  # Reemplaza con la red que deseas escanear
#    list_ips_and_hostnames(network)
import nmap

nm = nmap.PortScanner()

nm.scan(hosts='192.168.2.0/24', arguments='-n -sP -PE -PA21,23,80,3389')
hosts_list = [(x, nm[x]['status']['state']) for x in nm.all_hosts()]
for host, status in hosts_list:
     print(f'{host}:{status}')
