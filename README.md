
# Instrucciones

En **Windows** ejecutar lo siguiente después de descargar el proyecto:

1. Mover la carpeta APPINSCRIPCIONCURSOS al servidor local.
2. Ejecutar composer install dentro de APPINSCRIPCIONCURSOS.
3. Ejecutar composer update `opcional`
---

En **Linux** ejecutar los siguientes comandos después de descargar el proyecto:

1. cd inscripcion-cursos-php/
2. mv APPINSCRIPCIONCURSOS/ /var/www/html/
3. cd /var/www/html/APPINSCRIPCIONCURSOS/
4. composer install
5. composer update `opcional`
6. sudo chmod -R 777 app/storage/
7. sudo nano /etc/apache2/apache2.conf
```
Modificar:
<Directory /var/www/>
	#AllowOverride None
        AllowOverride All
</Directory>
```
8. sudo a2enmod rewrite
9. sudo service apache2 restart

---

- Crear la base de datos **BDCursos** en MySQL.

- Importar el archivo **bdcursos.sql** a la base de datos creada.

Editar los parametros **database**, **username** y **password** del archivo `database.php` que se encuentra en la ruta `APPINSCRIPCIONCURSOS/app/config/`

```
'mysql' => array(
	'database'  => '', // Nombre de la base de datos que usaras
	'username'  => '', // Nombre de usuario de MySQL
	'password'  => '', // Password de MySQL
),
```


