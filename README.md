
# Instrucciones:

1. Colocar la carpeta **APPINSCRIPCIONCURSOS** dentro de su servidor local.
2. En una Terminal cambiarse al directorio y ejecutar el comando **composer update**
3. Crear la base de datos con el archivo **bdcursos.sql**
4. Configurar el archivo __database.php__ que se encuentra en ```APPINSCRIPCIONCURSOS/app/config/database.php```

```
'mysql' => array(
    'driver'    => 'mysql',
    'host'      => 'localhost',
    'database'  => '',   //Nombre de la base de datos
    'username'  => '',   //usuario de myslq
    'password'  => '',   //contraseña de mysql
    'charset'   => 'utf8',
    'collation' => 'utf8_unicode_ci',
    'prefix'    => '',
 ),
```
