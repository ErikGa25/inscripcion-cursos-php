
# Instrucciones:

En **Linux** ejecutar los siguientes comandos:

1. cd inscripcion-cursos-php/
2. mv APPINSCRIPCIONCURSOS/ /var/www/html/
3. cd APPINSCRIPCIONCURSOS/
4. composer install
5. chmod -R 777 app/storage/
6. nano /etc/apache2/apache2.conf
```
Modificar:
<Directory /var/www/>
        AllowOverride All
</Directory>
```
7. sudo a2enmod rewrite
8. sudo service apache2 restart

---

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


