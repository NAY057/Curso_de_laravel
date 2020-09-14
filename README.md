<p align="center"><a href="https://laravel.com" target="_blank"><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400"></a></p>

<p align="center">
<a href="https://travis-ci.org/laravel/framework"><img src="https://travis-ci.org/laravel/framework.svg" alt="Build Status"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://poser.pugx.org/laravel/framework/d/total.svg" alt="Total Downloads"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://poser.pugx.org/laravel/framework/v/stable.svg" alt="Latest Stable Version"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://poser.pugx.org/laravel/framework/license.svg" alt="License"></a>
</p>

## About Laravel

Laravel is a web application framework with expressive, elegant syntax. We believe development must be an enjoyable and creative experience to be truly fulfilling. Laravel takes the pain out of development by easing common tasks used in many web projects, such as:

- [Simple, fast routing engine](https://laravel.com/docs/routing).
- [Powerful dependency injection container](https://laravel.com/docs/container).
- Multiple back-ends for [session](https://laravel.com/docs/session) and [cache](https://laravel.com/docs/cache) storage.
- Expressive, intuitive [database ORM](https://laravel.com/docs/eloquent).
- Database agnostic [schema migrations](https://laravel.com/docs/migrations).
- [Robust background job processing](https://laravel.com/docs/queues).
- [Real-time event broadcasting](https://laravel.com/docs/broadcasting).

Laravel is accessible, powerful, and provides tools required for large, robust applications.

## Learning Laravel

Laravel has the most extensive and thorough [documentation](https://laravel.com/docs) and video tutorial library of all modern web application frameworks, making it a breeze to get started with the framework.

If you don't feel like reading, [Laracasts](https://laracasts.com) can help. Laracasts contains over 1500 video tutorials on a range of topics including Laravel, modern PHP, unit testing, and JavaScript. Boost your skills by digging into our comprehensive video library.


# Curso_de_laravel
Archivos creados en el curso de laravel con platzi

# Comandos

```diff
- text in red
+ text in green
! text in orange
# text in gray
@@ text in purple (and bold)@@
```

## CREAR SERVER LOCAL
- php artisan serve = CREA UN SERVER LOCAL
_________________________________________

## MIGRAR DBs
MIGRA LAS DBS DE LARAVEL A EL MOTOR DE DBS 
- php artisan migrate  

REGRESA UN PASO A TRAS EN LA MIGRACION
- php artisan migrete:rollback 

Para controlar la cantidad de migraciones que se revierten en un rollback
- php artisan migrate:rollback --step 3 

PARA VAR MAS COMANDOS DE ARTISAN
- php artisan 

PARA OBTENER AYUDA DEL COMANDO EN CUESTION
- php artisan 'comando' + '--help' 

CREA UN NUEVO ARCHIVO DE MIGRACION (despues de debe migrar a la db para que aparesca alla)
- php artisan make:migration 'nombre descriptivo de la migracion' + '--create' + 'nombre de la tabla a crear' 
_________________________________________

## CREAR CONTROLADORES
Basados en el modelo MVC, vimos que las vistas las tenemos en resources/views, igualmente en la carpeta app/Http/Controllers podremos definir nuestros controladores.
Aunque podemos utilizar closures directamente dentro de las rutas, Laravel viene preparado para que trabajemos con controladores.

Cuando utilizamos el comando “artisan”, encontramos una sección llamada “make” que nos va a permitir crear diferentes cosas en el proyecto. make:controller nos crea un nuevo controlador.

En nuestro archivo web.php, en la parte de los parámetros, en vez de poner un closure vamos a poner el nombre del controlador que creamos seguido de una @ y finalizando el método que llamaremos de ese controlador.

-php artisan make:controller 'nombre del controlador'

En la parte de rutas se debe especificar la ruta el controlados de la siguiente manera, amenos que el controlador no sea de tipo 'resource'
- Route::get('/(ruta de navegacion)', 'App\Http\Controllers\(nombre del controlador)@(metodo)'); (SI NO ES DE TIPO RESOURCE)
Ej: Route::get('/dashboard', 'App\Http\Controllers\DashboardController@index');

- Route::resource('/(ruta de navegacion)', 'App\Http\Controllers\(nombre del controlador)');
(SI ES DE TIPO RESOURCE)
Ej: Route::resource('/expense_reports', 'App\Http\Controllers\ExpenseReportController');
 
__________________________________________

## CREAR MODELOS
Un ORM es un sistema que nos permite mapear registros de la base de datos a objetos dentro dentro de nuestro código. No es exclusivo de PHP ya que se usa mucho en los lenguajes de programación orientada a objetos.

```diff
- No es aconsejable modificar una migración ya que si estamos trabajando en equipo alguien puede haber ya corrido la migración con anterioridad y esto le causaría conflictos. Lo aconsejable es crear una migración adicional.
- El comando migrate:fresh lo reinicia todo incluyendo la base de datos y los elementos creados
```

Cuando creamos las bases de datos es estándar que las tablas tengan el nombre en plural pero los modelos como representan una clase que representa un objeto, tendrán su nombre en singular.

Todos los modelos los podremos encontrar dentro de la carpeta app. Laravel no tiene carpeta models porque los creadores creen que model puede tener muchos significados.

El comando tinker nos ofrece un entorno de pruebas para ver cómo funcionan las cosas que estamos haciendo. Tiene en cuenta variables de entorno, lo que inicializa Laravel y también sabe que estamos usando Eloquent.

- php artisan make:model + nombre del modelo (en singular) = crea una nueva clase para representar un modelo de Eloquent.

__________________________________________


## tinker
tinker nos obrece un area de pruebas en memoria para poder probar un poco el codigo
- php artisan tinker

asi se consulta sobre algun modelo
- App\models\'nombre del modelo'::all();

asi se le agrega info al modelo
- $'nombre de lo que se quiere agregar': = new App\models\'nombre del modelo'();

paraguardar lo creado
- $'nombre de lo que se creó'->save();

_____________________________________________


## CREAR NUEVAS COLUMNAS
Primero se realiza una nueva migracion para no generar confligtos, ademas se usa la siguiente expresion '--table' para MIGRAR SOLO LA TABLA EN CUESTION
- php artisan make:migration 'nombre descriptivo de la migracion' --table 'nombre de la tabla'

Despues de crear la migracion se accede a ella y se crean las tablas en 'function up()' 
 - $table->tipo de dato('nombre de la tabla');

Luego se debe de poner lo siguente en 'function down()' para especificar que se debe hacer en caso de un rollback
 - $table->dropColumn('title');

Para crear la columna title después de la columna ‘id’ y que esté mejor estruturado:
- $table->text(‘title’)->after(‘id’);

_____________________________________________

## BLADE LAYOUT
Cuando se tienen muchas vistas que repiten gran parte del código HTML, una mejor práctica para evitar esta repetición es crear layouts y extender de ellos. De esta manera el layout tendrá el contenido que siempre se repite y los hijos el código específico de ellos.

@yield marca la parte (PADRE) en donde irá el código que los hijos extenderan  o hereden del layout.

En las vistas (HIJAS) se utiliza @section para decir que esa parte del código es la que concuerda con el @yield del layout.

## AGREGAR DATOS A LOS ATRIBUTOS
Se utiliza la funcion store para guardar la informacion dentro de la base de datos, 

````diff
    +public function store(Request $request)
    +{
        $report = new NOMBRE DEL MODELO();
        $report->NOMBRE DEL ATRIBUTO = $request->get('NOMBRE DEL ATRIBUTO ASIGNADO EN EL HTML');
        $report->save();

        return redirect('/expense_reports');
    }
````

_____________________________________________


## CSRF (Seguridad)

CSRF (Cross-site request forgery) es un tipo de ataque que consiste en que un usuario puede intentar hacer muchas peticiones en nombre de otro. Para esto Laravel genera con cada sesión un token que se usará para validar que exista el usuario en el sistema y que sea él quien está haciendo la petición. Esto también implica que no se pueden hacer peticiones desde otra app hacia el post, debe manejarse de manera interna.

Si queremos que un form pueda pasar la seguridad CSRF de Laravel, debemos agregar el helper @csrf el cual nos agrega un token.

    Cuando estamos guardando nuevas entradas en la base de datos podemos redireccionar adonde queramos en nuestra aplicación con una respuesta especial de Laravel llamada redirect.

Estamos trabajando con Middlewares los cuales son muy usados en aplicaciones web que consisten en capas que contienen el request. Cuando llega un request, éste deberá pasar por diferentes capas o filtros (middlewares) quienes al final regresarán una respuesta. Cada uno de los filtros puede detener las peticiones en caso de que algo no cumpla.

Si no se desea usar la protección CSRF se puede directamente quitar el middleware desde el archivo kernel.php. De la misma manera se pueden crear middleware propios y agregarlos aquí.

_____________________________________________


## REDIRECT
hace un retorno a la vista que se requiera
- return redirect('/expense_reports');