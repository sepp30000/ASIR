# Tarea 4 - Esteganografía

## OpenStego

- Vamos a su página web y **descargamos** el programa para nuestro S.O. ***(Linux o Windows)***

![alt image](/SAD/Esteganografía/Capturas/Instalar_openstego.png)

- Instalamos *OpenStego*

![alt image](/SAD/Esteganografía/Capturas/Instación.png)

- Abrimos el programa y consultamos sus funciones

![alt image](/SAD/Esteganografía/Capturas/Openstego.png)

- Creamos el mensaje oculto

![alt image](/SAD/Esteganografía/Capturas/patata.png)

- En el apartado *Hide data* vemos que hay varias selecciones. En **"Message file"** añadimos el mensaje, **"En cover file"** la imagen y en **"Output stego file"** será el archivo resultante. Tambien tenemos la opcion de añadir contraseña al archivo final.

![alt image](/SAD/Esteganografía/Capturas/Relleno.png)

- Después de rellenar los datos, le pulsamos a **Hide Data**.

![alt image](/SAD/Esteganografía/Capturas/Proceso.png)

- Con esto terminamos el proceso de esconder el mensaje. Ahora vamos a hacer el proceso inverso. De la imagen de *Homer.btp* vamos a extraer el mensaje.

- Vamos a **"Extract data"** y añadimos la imagen y los la contraseña para ver el mensaje.

![alt image](/SAD/Esteganografía/Capturas/Extraer.png)

- Se extrajo un archivo y lo vamos a consultar

![alt image](/SAD/Esteganografía/Capturas/leche.png)

## Geolocalización

- Vamos a ver donde se hizo la foto

- Descargamos **"exiftool"** de github y utilizando el programa y la imagen sacamos los metadatos de esta

![alt image](/SAD/Esteganografía/Capturas/metadatos.png)

- Incluidos las coordenadas y la fecha de realización de la foto

![alt image](/SAD/Esteganografía/Capturas/datos.png)

Con la fecha sabemos que se hizo el **21-04-2019** y con las coordenas se hizo en Osaka

![alt image](/SAD/Esteganografía/Capturas/osaka.png)

