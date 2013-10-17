# Demo de login con Ajax (Desarrolladores PHP México)

Este es un ejemplo de login de usuarios usando Ajax. Este demo surge a partir de la 
[discusión](http://www.linkedin.com/groups/Comparto-art%C3%ADculo-sobre-como-autenticar-4259653.S.276243955?view=&gid=4259653&type=member&item=276243955#commentID_null) 
iniciada en el grupo de [Desarrolladores PHP México](http://www.linkedin.com/groups/Desarrolladores-PHP-MEXICO-4259653?home=&gid=4259653&trk=anet_ug_hm) 
en LinkedIn.

No es un ejemplo exhaustivo, la intención es en primer lugar, es evitar el uso de extensiones o prácticas obsoletas
y en segundo lugar, hacer uso de las funciones proporcionadas por el lenguaje en lugar de
[funciones hechas por nosotros mismos](http://es.wikipedia.org/wiki/Reinventar_la_rueda).

El ejemplo usa [PDO](http://www.php.net/manual/es/pdo.prepared-statements.php), 
[filtros de saneamiento](http://www.php.net/manual/es/filter.filters.sanitize.php), la nueva [API
para hashing de contraseñas](http://mx2.php.net/manual/es/ref.password.php) de PHP 5.5 y la función 
[ajax](http://api.jquery.com/jQuery.ajax/) de jQuery. 

En caso de no tener instalado PHP 5.5, se incluye la [librería de Anthony Ferrara para la 
compatibilidad de la API de hashing](https://github.com/ircmaxell/password_compat) para versiones de 
PHP posteriores a 5.3.6. El repositorio requiere tener instalado PHP 5.4. 

Estos son los dos ejemplos de código que dieron origen a este repositorio:

* [Post original](http://elpoli.delphiaccess.com/php-validar-usuario-y-contrasena-usando-ajax/)
* [Respuesta al post original](http://www.phpmexico.com.mx/curso/examples/login_simple.php)
