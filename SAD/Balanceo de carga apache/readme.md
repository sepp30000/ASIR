# Balanceo de carga con apache

## Webs de utilidad

https://github.com/Alexstrachan/Balanceador-de-carga-con-Apache

## Habilitamos los modulos

```bash
a2enmod proxy
a2enmod proxy_http
a2enmod proxy_ajp
a2enmod rewrite
a2enmod deflate
a2enmod headers
a2enmod proxy_balancer
a2enmod proxy_connect
a2enmod proxy_html
a2enmod lbmethod_byrequests
```

## Configuramos el archivo 000-default.conf

### ROUND ROBIN
```bash
<VirtualHost *:80>
        # The ServerName directive sets the request scheme, hostname and port that
        # the server uses to identify itself. This is used when creating
        # redirection URLs. In the context of virtual hosts, the ServerName
        # specifies what hostname must appear in the request's Host: header to
        # match this virtual host. For the default virtual host (this file) this
        # value is not decisive as it is used as a last resort host regardless.
        # However, you must set it for any further virtual host explicitly.
        #ServerName www.example.com

        ServerAdmin webmaster@localhost
        DocumentRoot /var/www/html

        # Available loglevels: trace8, ..., trace1, debug, info, notice, warn,
        # error, crit, alert, emerg.
        # It is also possible to configure the loglevel for particular
        # modules, e.g.
        #LogLevel info ssl:warn


        # For most configuration files from conf-available/, which are
        # enabled or disabled at a global level, it is possible to
        # include a line for only one particular virtual host. For example the
        # following line enables the CGI configuration for this host only
        # after it has been globally disabled with "a2disconf".
        #Include conf-available/serve-cgi-bin.conf
        ProxyPass /balancer-manager !
        <Proxy balancer://mycluster>

                # Server 1
                BalancerMember http://10.0.1.20

                # Server 2
                BalancerMember http://10.0.1.20
                ProxySet lbmethod=byrequests
        </Proxy>

        ProxyPass / balancer://mycluster/
        ProxyPass /balancer-manager !
        ProxyPassReverse / balancer://mycluster/

</VirtualHost>
```

### LEAST CONNECTIONS

```bash
<VirtualHost *:80>
        # The ServerName directive sets the request scheme, hostname and port that
        # the server uses to identify itself. This is used when creating
        # redirection URLs. In the context of virtual hosts, the ServerName
        # specifies what hostname must appear in the request's Host: header to
        # match this virtual host. For the default virtual host (this file) this
        # value is not decisive as it is used as a last resort host regardless.
        # However, you must set it for any further virtual host explicitly.
        #ServerName www.example.com

        ServerAdmin webmaster@localhost
        DocumentRoot /var/www/html

        # Available loglevels: trace8, ..., trace1, debug, info, notice, warn,
        # error, crit, alert, emerg.
        # It is also possible to configure the loglevel for particular
        # modules, e.g.
        #LogLevel info ssl:warn


        # For most configuration files from conf-available/, which are
        # enabled or disabled at a global level, it is possible to
        # include a line for only one particular virtual host. For example the
        # following line enables the CGI configuration for this host only
        # after it has been globally disabled with "a2disconf".
        #Include conf-available/serve-cgi-bin.conf
        ProxyPass /balancer-manager !
        <Proxy balancer://mycluster>

                # Server 1
                BalancerMember http://10.0.1.20

                # Server 2
                BalancerMember http://10.0.1.20
                ProxySet lbmethod=bybusiness
        </Proxy>

        ProxyPass / balancer://mycluster/
        ProxyPass /balancer-manager !
        ProxyPassReverse / balancer://mycluster/

</VirtualHost>
```




**Con esto ya tendríamos el balaceo de carga en apache**