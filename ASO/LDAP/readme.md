# Configuración de servidor LDAP, cliente y integración a Nextcloud

**Webs de ayuda:**

1. https://www.server-world.info/
2. https://ubuntu.com/server/docs/service-ldap-with-tls
3. https://gitlab.com/aberlanas/SMX-SOX/-/blob/master/Unit04-DomainAdministration/Unit04-Task02-OpenLDAP-02.md
4. https://i12bretro.github.io/tutorials/0278.html
5. https://docs.nextcloud.com/server/latest/admin_manual/configuration_user/user_auth_ldap_api.html

## 1. Servidor

### Instalación del Servidor

```bash
sudo apt install slapd ldap-utils
sudo dpkg-reconfigure slapd
```

### Modificar archivos de configuración

```bash
# Ver la configuración
slapcat
# Modificar archivos
sudo nano base.ldif
# Agregamos a japon.local
```

### Corrección del fallo del php del phpldapadmin

Nos vamos al github del openldap y sustituimos los archivos que nos fallan por los que tocan.

[Link Github](https://github.com/leenooks/phpLDAPadmin/releases)

### Entrar a phpldapadmin y agregar usuarios al dominio japon.local

```
localhost:8080
```

## 2. Cliente

### Paquetes a instalar 

```bash
sudo apt install libnss-ldapd libpam-ldapd ldap-utils
```

### Creamos los certificados autofirmados y configuramos el archivo **mod_ssl.ldif** en el servidor

[Tutorial](https://www.server-world.info/en/note?os=Ubuntu_23.04&p=ssl&f=1)

### Configuramos el cliente LDAP y SSSD

## 3. Integración a Nextcloud

[Tutorial](https://i12bretro.github.io/tutorials/0278.html)