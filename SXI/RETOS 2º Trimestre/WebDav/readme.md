# Reto 3: WebDav SSL

## Creamos el directorio WEBDAV

```bash
mkdir /var/www/webdav
chown www-data:www-data -R /var/www/webdav
```

## Activamos el modulo de WEBDAV

```bash
a2enmod dav dav_fs
```