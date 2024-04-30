# ViciDial Group
ViciDial - Muestra la lista las extensiones disponibles para agentes o supervisores

## Creacion de usuario en MySql
Creamos el usuario de conexion hacia la base de datos, si el sistema ViciDial es distribuido se ingresar en el database server

```
mysql
```
En el CLI de MySQL creamos el usuario de conexion hacia la base de datos, en este caso es consult, la clave es potestativa, si el sistema ViciDial es distribuido cambiamos **'localhost'** por la IP del servidor de acceso Web
```
CREATE USER 'consult'@'localhost' IDENTIFIED BY 'clave_acceso';
```

Damos permisos de acceso al usuario previamente creado (consult) a la base de datos asterisk
```
GRANT ALL PRIVILEGES ON asterisk.* TO 'consult'@'localhost';
```
```
flush privileges;
exit;
```

## Configuracion Web

Ubicamos la ruta de acceso web de la plataforma que se accede mediante el siguiente *comando*. Si el sistema ViciDial es distribuido se debe descargar en el servidor web del cluster

```
cd /srv/www/htdocs
```

Descargamos la aplicacion desde el repositorio 

```
git clone https://github.com/RicardoVargasM/vicidial-usergroup.git

```
Cambiamos el nombre de la carpeta a usergroup:

```
mv vicidial-usergroup usergroup
```

