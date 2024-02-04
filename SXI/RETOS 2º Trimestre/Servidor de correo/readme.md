# Servidor de correo

En esta práctica vamos a crear un servidor de correo en una instancia de AWS con Dovecot y Postfix

## 1. Instalación de Postfix y Dovecot

```bash
sudo apt update
sudo apt postfix sasl2-bin dovecot-core dovecot-pop3d dovecot-imapd
```

## 2. Configurar Postfix

Después de tener instalado los paquetes configuramos el **/etc/postfix/main.cf**

```bash
cp /usr/share/postfix/main.cf.dist /etc/postfix/main.cf
nano /etc/postfix/main.cf
```
#### Configuración
```bash
####Descomentar o insertar datos#####

mail_owner = postfix

myhostname = mononginx.duckdns.org

mydomain = mononginx.duckdns.org

myorigin = $mydomain

inet_interfaces = all

mydestination = $myhostname, localhost.$mydomain, localhost, $mydomain

local_recipient_maps = unix:passwd.byname $alias_maps

mynetworks_style = subnet

mynetworks = 127.0.0.0/8

alias_maps = hash:/etc/aliases

alias_database = hash:/etc/aliases

home_mailbox = Maildir/


smtpd_banner = $myhostname ESMTP

sendmail_path = /usr/sbin/postfix

newaliases_path = /usr/bin/newaliases

mailq_path = /usr/bin/mailq

setgid_group = postdrop

####Comentar####
#html_directory =

#manpage_directory =

#sample_directory =

#readme_directory =

inet_protocols = ipv4

####Añadir al final####

disable_vrfy_command = yes

smtpd_helo_required = yes

message_size_limit = 10240000

smtpd_sasl_type = dovecot
smtpd_sasl_path = private/auth
smtpd_sasl_auth_enable = yes
smtpd_sasl_security_options = noanonymous
smtpd_sasl_local_domain = $myhostname
smtpd_recipient_restrictions = permit_mynetworks, permit_auth_destination, permit_sasl_authenticated, reject
```

#### Reiniciamos el servicio

```bash
newaliases
systemctl restart postfix
```

### 3. Configurar Dovecot

Continuamos con la configuración de Dovecot **/etc/postfix/dovecot.conf**

```bash
# Descomentamos
listen = *, ::
```

**/etc/dovecot/conf.d/10-auth.conf**

```bash
disable_plaintext_auth = no
auth_mechanisms = plain login
```

**/etc/dovecot/conf.d/10-mail.conf**

```bash
mail_location = maildir:~/Maildir
```

**/etc/dovecot/conf.d/10-master.conf**

```bash
## Descomentamos y añadimos
  unix_listener /var/spool/postfix/private/auth {
    mode = 0666
    user = postfix
    group = postfix
  }
```

#### Reiniciamos el servicio

```bash
systemctl restart dovecot
```

### 4. Usuario de email

Instalamos **mailutils** y añadimos un usuario 

```bash
apt install mailutils 
echo 'export MAIL=$HOME/Maildir/' >> /etc/profile.d/mail.sh
adduser paco
```

Nos logueamos e intentamos enviar un email

![alt image](Capturas/envio%20de%20email.png)



