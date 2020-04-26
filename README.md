
# Instrucciones:

En Linux ejecutar los siguientes comandos:

- cd inscripcion-cursos-php/
- mv APPINSCRIPCIONCURSOS/ /var/www/html/
- cd APPINSCRIPCIONCURSOS/
- composer install
- sudo chmod -R 777 app/storage/
- sudo nano /etc/apache2/apache2.conf
```
Modificar:
<Directory /var/www/>
        AllowOverride All
</Directory>
```
- sudo a2enmod rewrite
- sudo service apache2 restart
- Crear la base de datos **BDCursos** en MySQL;

- Importar el archivo **bdcursos.sql** a la base de datos creada.

Editar los parametros **database**, **username** y **password** del archivo `database.php` que se encuentra en la ruta `APPINSCRIPCIONCURSOS/app/config/`

```
'mysql' => array(
			'driver'    => 'mysql',
			'host'      => 'localhost',
			'database'  => '',    // Nombre de la base de datos que usaras
			'username'  => '',    // Nombre de usuario de MySQL
			'password'  => '',    // Password de MySQL
			'charset'   => 'utf8',
			'collation' => 'utf8_unicode_ci',
			'prefix'    => '',
		),
```


