# Tarea 5 - Cifrado simétrico

## 1. Crea un fichero de texto con un mensaje

- Creamos el fichero prueba.txt

![alt text](/SAD/Criptografía%20Simetrica/Capturas/fichero.png)

## 2. Utiliza la orden correspondiente para encriptarlo con cifrado simétrico, sin utilizar parámetros

- Para encriptar el archivo utilizamos el comando:

```bash
gpg --symmetric prueba.txt
```

- Después de esto nos pedira una contraseña

![alt text](/SAD/Criptografía%20Simetrica/Capturas/contraseña.png)

- Si la frase no es segura nos mandará un aviso

![alt text](/SAD/Criptografía%20Simetrica/Capturas/clave%20insegura.png)

- Después de esto nos creará un archivo con la extensión **.gpg**

![alt text](/SAD/Criptografía%20Simetrica/Capturas/gpg.png)

## 3. Comprueba de qué tipo es el fichero que se ha generado (binario o de texto)

- Al archivo tener una extensión **.gpg**, nos encontramos ante un archivo binario.

## 4. Utiliza el comando correspondiente para desencriptar el fichero. ¿El resultaodo se guarda en algún fichero?

- El comando que utilizamos para desencriptar es:

```bash
gpg --decrypt prueba.txt.gpg
```

- Nos muestra por pantalla el contenido del fichero, pero no nos vuelca en un fichero el resultado si no se lo especificamos.

![alt text](/SAD/Criptografía%20Simetrica/Capturas/decrypt.gpg.png)

## 5. Vuelve a realizar el paso 2, pero en este caso asegúrate de que el fichero encriptado se guarda en un fichero de texto
 
- Realizamos lo mismo que anteriormente pero con *-a* para que sea **ascii**

```bash
gpg --symmetric -a prueba.txt
```

- Despues de esto nos crea un archivo **.asc**

![alt text](/SAD/Criptografía%20Simetrica/Capturas/cryptascii.png)

![alt text](/SAD/Criptografía%20Simetrica/Capturas/texto%20ascii.png)

- Los desencryptamos igual.

![alt text](/SAD/Criptografía%20Simetrica/Capturas/desencritptadoascii.png)

---