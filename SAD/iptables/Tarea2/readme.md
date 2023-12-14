# Firewall entre redes

- Después de tener una máquina XUBUNTU como router. Nos disponemos a realizar la configuración del router.

## 2. La LAN de la empresa tiene una dirección privada con máscara /24 (que no entre en conflicto con nuestra red del aula). (La red es 192.168.111.0/24)

![alt image](/Tarea2/capturas/Redes.png)

## 3. Suponemos que en la LAN tenemos los siguiente equipos (entre otros):
- Un equipo del administrador cuya IP tiene como número de host el 99.(192.168.111.99)  
- Un servidor web cuya IP tiene como número de host el 88.(192.168.111.88)
- Un servidor que contiene una base de datos, cuya IP tiene como número de host el 200.(192.168.111.200)
- Un servidor FTP cuya IP tiene como número de host el 254.(192.168.111.254)

## 4. Se debe realizar un enmascaramiento de la LAN hacia el exterior, de manera que todos los equipos salgan con la IP pública del router.

```bash
# Limpia las reglas existentes
sudo iptables -F
sudo iptables -t nat -F

# Establece políticas predeterminadas (denegar todo)
sudo iptables -P INPUT DROP
sudo iptables -P FORWARD DROP
sudo iptables -P OUTPUT DROP


# Permite el tráfico de retorno y las conexiones establecidas
sudo iptables -A INPUT -m state --state ESTABLISHED,RELATED -j ACCEPT
sudo iptables -A OUTPUT -m state --state ESTABLISHED,RELATED -j ACCEPT
sudo iptables -A FORWARD -m state --state ESTABLISHED,RELATED -j ACCEPT

# Configuracion básica del enroutamiento
sudo iptables -t nat -A POSTROUTING -o enp0s3 -j MASQUERADE
```

## 5. Todos los equipos de la LAN deben poder realizar lo siguiente (únicamente, el resto debe estar denegado):
- Consultar páginas web.

Para abrir los puertos de la web
```bash
sudo iptables -A FORWARD -p tcp --dport 80 -j ACCEPT
sudo iptables -A FORWARD -p tcp --dport 443 -j ACCEPT
sudo iptables -A FORWARD -p tcp --sport 80 -j ACCEPT
sudo iptables -A FORWARD -p tcp --sport 443 -j ACCEPT
```

Para abrir los puertos dns

```bash
sudo iptables -A FORWARD -p udp --dport 53 -j ACCEPT
sudo iptables -A FORWARD -p tcp --dport 53 -j ACCEPT
sudo iptables -A FORWARD -p udp --sport 53 -j ACCEPT
sudo iptables -A FORWARD -p tcp --sport 53 -j ACCEPT
```




- Utilizar el correo electrónico (tanto POP3 como IMAP).

```bash
sudo iptables -A OUTPUT -p tcp --dport 110 -j ACCEPT
sudo iptables -A OUTPUT -p tcp --dport 995 -j ACCEPT

sudo iptables -A FORWARD -p tcp --dport 110 -d [IP_DEL_SERVIDOR_DE_CORREO] -j ACCEPT
sudo iptables -A FORWARD -p tcp --dport 995 -d [IP_DEL_SERVIDOR_DE_CORREO] -j ACCEPT

sudo iptables -A OUTPUT -p tcp --dport 143 -j ACCEPT
sudo iptables -A OUTPUT -p tcp --dport 993 -j ACCEPT

sudo iptables -A FORWARD -p tcp --dport 143 -d [IP_DEL_SERVIDOR_DE_CORREO] -j ACCEPT
sudo iptables -A FORWARD -p tcp --dport 993 -d [IP_DEL_SERVIDOR_DE_CORREO] -j ACCEPT
```


- Realizar pings.
  
```bash
sudo iptables -A INPUT -p icmp --icmp-type echo-request -j ACCEPT
sudo iptables -A OUTPUT -p icmp --icmp-type echo-reply -j ACCEPT

sudo iptables -A FORWARD -p icmp --icmp-type echo-request -j ACCEPT
sudo iptables -A FORWARD -p icmp --icmp-type echo-reply -j ACCEPT
```
- Consultar servidores de tiempo NTP.

```bash
sudo iptables -A OUTPUT -p udp --dport 123 -j ACCEPT
# Te he puesto la ip de cuco.rediris.es, puedes poner más
sudo iptables -A FORWARD -p udp --dport 123 -d 130.206.0.1 -j ACCEPT
```

## 6. El equipo interno del administrador debe ser el único que pueda conectarse al equipo que contiene el firewall. Se conectará por SSH.

```bash
sudo iptables -A INPUT -p tcp --dport 22 -s 192.168.111.99 -j ACCEPT
sudo iptables -A OUTPUT -p tcp --sport 22 -d 192.168.111.99 -j ACCEPT
```

## 7. El administrador de la red debe poder acceder desde su casa por SSH al router, a su equipo dentro de la LAN y a los 3 servidores (192.168.2.254).

- Para conectarse al router
  
```bash
sudo iptables -A INPUT -p tcp --dport 22 -s 192.168.2.254 -j ACCEPT
sudo iptables -A OUTPUT -p tcp --sport 22 -s 192.168.2.254 -j ACCEPT
```

- Para la red interna

1. Equipo del administrador

```bash
sudo iptables -A INPUT -p tcp --dport 22 -s 192.168.111.99 -j ACCEPT
sudo iptables -A OUTPUT -p tcp --sport 22 -d 192.168.111.99 -j ACCEPT
sudo iptables -t nat -A PREROUTING -p tcp --dport 2222 -j DNAT --to-destination 192.168.111.99:22
```

2. Servidor mariadb


```bash
sudo iptables -A INPUT -p tcp --dport 22 -s 192.168.111.200 -j ACCEPT
sudo iptables -A OUTPUT -p tcp --sport 22 -d 192.168.111.200 -j ACCEPT
sudo iptables -t nat -A PREROUTING -p tcp --dport 2223 -j DNAT --to-destination 192.168.111.200:22
```

3. Servidor Web


```bash
sudo iptables -A INPUT -p tcp --dport 22 -s 192.168.111.88 -j ACCEPT
sudo iptables -A OUTPUT -p tcp --sport 22 -d 192.168.111.88 -j ACCEPT
sudo iptables -t nat -A PREROUTING -p tcp --dport 2224 -j DNAT --to-destination 192.168.111.88:22
```

4. FTP


```bash
sudo iptables -A INPUT -p tcp --dport 22 -s 192.168.111.254 -j ACCEPT
sudo iptables -A OUTPUT -p tcp --sport 22 -d 192.168.111.254 -j ACCEPT
sudo iptables -t nat -A PREROUTING -p tcp --dport 2225 -j DNAT --to-destination 192.168.111.254:22
```

## 8. El servidor web debe estar accesible desde cualquier equipo del exterior (aunque sólo podemos probar las conexiones http, crearemos también la regla para permitir https).

```bash
sudo iptables -t nat -A PREROUTING -p tcp --dport 80 -j DNAT --to-destination 192.168.111.88:80
sudo iptables -t nat -A PREROUTING -p tcp --dport 443 -j DNAT --to-destination 192.168.111.88:443
sudo iptables -A FORWARD -p tcp --dport 80 -d 192.168.111.88 -j ACCEPT
sudo iptables -A FORWARD -p tcp --dport 443 -d 192.168.111.88 -j ACCEPT

```

## 9. El servidor FTP debe estar accesible desde cualquier equipo del exterior.

```bash
sudo iptables -t nat -A PREROUTING -p tcp --dport 20 -j DNAT --to-destination 192.168.111.254:20
sudo iptables -t nat -A PREROUTING -p tcp --dport 21 -j DNAT --to-destination 192.168.111.254:21
sudo iptables -A FORWARD -p tcp --dport 20 -d 192.168.111.254:20 -j ACCEPT
sudo iptables -A FORWARD -p tcp --dport 21 -d 192.168.111.254:21 -j ACCEPT

```

## 10. El servidor web debe poder realizar consultas al servidor que tiene la base de datos.

- Al estar dentro de la red interna, no es necesario configurar el ip tables.

# SI FUERA TODO ACCEPT

- Al hacer la misma tarea con accept, se podría hacer de diferentes maneras. Pero la más fácil seria aplicar las mismas reglas, al final aplicariamos la regla que bloquee el resto.

```bash
sudo iptables -P INPUT DROP
sudo iptables -P FORWARD DROP
sudo iptables -P OUTPUT DROP
```