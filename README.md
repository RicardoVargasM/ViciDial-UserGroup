# ViciDial Group
ViciDial - Muestra la lista las extensiones disponibles para agentes o supervisores

## Creación de usuario en MySql
Iniciamos ingresando a la linea de comandos de la base de datos (MySQL - MariaDB), si el sistema ViciDial es distribuido se debe ingresar en el database server

```
mysql
```
En el CLI de MySQL creamos el usuario de conexión hacia la base de datos, en este caso es **consult**, la clave es potestativa, si el sistema ViciDial es distribuido cambiamos **'localhost'** por la **IP** del servidor de acceso Web
```
CREATE USER 'consult'@'localhost' IDENTIFIED BY 'clave_acceso';
```

Damos permisos de acceso al usuario previamente creado (*consult*) a la base de datos asterisk
```
GRANT ALL PRIVILEGES ON asterisk.* TO 'consult'@'localhost';
```
```
flush privileges;
exit;
```

## Configuración Web

Ubicamos la ruta de acceso web de la plataforma que se accede mediante el siguiente *comando*. Si el sistema ViciDial es distribuido se debe descargar en el servidor web del cluster

```
cd /srv/www/htdocs
```

Descargamos la aplicación desde el repositorio 

```
git clone https://github.com/RicardoVargasM/vicidial-usergroup.git
```
Cambiamos el nombre de la carpeta a usergroup:

```
mv vicidial-usergroup usergroup
```
Posteriormente ingresamos a la carpeta previamente modificada
```
cd  usergroup/
```

Modificamos el archivo DB.php con el editor de nuestra preferencia para ingresar las credenciales de acceso a la database
```
vim DB.php
```
En el archivo *DB.php* se modifican los siguientes valores según la configuración que se haya realizado anteriormente, en `'DB_USER' => 'usuario_db`, en `'DB_PASS' => 'contraseña_db'`, en `'DB_HOST' => 'ip_or_hostname'`. En nuestro caso seria:
```
 private $info = [
                            'DB_NAME' => 'asterisk',
                            'DB_USER' => 'consult',
                            'DB_PASS' => 'consult',
							'DB_HOST' => 'localhost'

                        ];
```

Una vez realizada la configuración se accede mediante la URL de la plataforma: [http://ip_or_hostname/usergroup](http://ip_or_hostname/usergroup)
