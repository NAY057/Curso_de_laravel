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

CON 'REFRESH' SE BORRAN TODAS LA TABLAS JUNTO CON SU INFORMACION Y SE VUELVEN A CONTRUIR,
ES COMO SI SE CORRIERA 'RESET' Y LUEGO 'MIGRATE' AL MISMO TIEMPO
- php artisan migration:refresh
_________________________________________

## CREAR CONTROLADORES
Basados en el modelo MVC, vimos que las vistas las tenemos en resources/views, igualmente en la carpeta app/Http/Controllers podremos definir nuestros controladores.
Aunque podemos utilizar closures directamente dentro de las rutas, Laravel viene preparado para que trabajemos con controladores.

Cuando utilizamos el comando “artisan”, encontramos una sección llamada “make” que nos va a permitir crear diferentes cosas en el proyecto. make:controller nos crea un nuevo controlador.

En nuestro archivo web.php, en la parte de los parámetros, en vez de poner un closure vamos a poner el nombre del controlador que creamos seguido de una @ y finalizando el método que llamaremos de ese controlador.

-php artisan make:controller 'nombre del controlador'
-php artisan make:controller -r 'nombre del controlador' (CONTROLADOR DE TIPO RESOURCE'CREAR, BORRAR, ACTUALIZA Y GUARDA')

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

- Asi se puede crear la tabla con su migracion y el modelo al mismo tiempo 
    php artisan make:model -m NOMBRE DEL MODELO EN SINGULARs

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


## CREAR/BORRAR NUEVAS COLUMNAS
Primero se realiza una nueva migracion para no generar confligtos, ademas se usa la siguiente expresion '--table' para MIGRAR SOLO LA TABLA EN CUESTION
- php artisan make:migration 'nombre descriptivo de la migracion' --table 'nombre de la tabla'

Despues de crear la migracion se accede a ella y se crean las tablas en 'function up()' 
 - $table->tipo de dato('nombre de la tabla');

Luego se debe de poner lo siguente en 'function down()' para especificar que se debe hacer en caso de un rollback
 - $table->dropColumn('title');

Para crear la columna title después de la columna ‘id’ y que esté mejor estruturado:
- $table->text(‘title’)->after(‘id’);

Para borrar columnas se debe de crear una nueva migracion y en la 'function up' se agrega lo siguiente:

###### ASI SE BORRAN COLUMNAS

        Schema::table('nombre de la tabla', function (Blueprint $table) {
            $table->dropColumn('nombre de la columna a borrar');
        });

si se quienen borrar varias columnas se puede hacer asi:

        Schema::table('nombre de la tabla', function (Blueprint $table) {
            $table->dropColumn([
                'columna 1', 'columna 2' , ....
            ]);
        });

_____________________________________________

## BLADE LAYOUT
Cuando se tienen muchas vistas que repiten gran parte del código HTML, una mejor práctica para evitar esta repetición es crear layouts y extender de ellos. De esta manera el layout tendrá el contenido que siempre se repite y los hijos el código específico de ellos.

@yield marca la parte (PADRE) en donde irá el código que los hijos extenderan  o hereden del layout.

En las vistas (HIJAS) se utiliza @section para decir que esa parte del código es la que concuerda con el @yield del layout.
_____________________________________________

## AGREGAR DATOS A LOS ATRIBUTOS
Se utiliza la funcion store para guardar la informacion dentro de la base de datos, 

````diff
    +public function store(Request $request)
    +{
        $report = new NOMBRE DEL MODELO();
        $report->NOMBRE DEL ATRIBUTO = $request->get('nombre del input en el html');
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
_____________________________________________

## ACTUALIZAR REGISTROS CON 'UPDATE'
Se debe de crear la vista con el nombre de 'edit.blade.php' para que funcione bien con los controladores.

tambien se debe de tener en cuenta de que en Laravel cuando usamos recursos nos pone Put y Patch como una opción para modificar nuestros recursos. El problema de esto es que en un form no se puede especificar directamente que queremos hacer un Put o un Patch y por esto Laravel nos ofrece un mecanismo para hacer ”Fake PUT/PATCH” y podamos recibir y procesar los datos.

Para que Laravel acepte el Put o Patch es necesario poner dentro del form de manera auxiliar - - @method(‘tipo de método usado’) 

y así aunque el form tenga un POST como método, realmente será traducido al que especifiquemos dentro del auxiliar.

Los controladores quedarian algo asi:

````diff
    public function edit($id)
    {
        $report = NOMBRE DEL MODELO::find($id);
        return view('ruta de la vista', [
            // aqui se agregan los parametros que se necesitan
            'report' => $report
        ]);
    }
````

````diff
    public function update(Request $request, $id)
    {
        $report = nombre del modelo::find($id);
        $report->nombre del campo en la db = $request->get('nombre del input en el html');
        $report->save();

        return redirect('/ruta a donde se quiere ir despues de todo');
    }
````
###### Consejos varios con 'UPDATE'
Varios consejos:

1-Una manera más eficaz de colocar la ruta de un form es: action="{{ route(‘expenseReport.update’, $Report) }}" . Así colocamos el nombre de la ruta y no la url, si actualizamos a futuro la dirección, no nos romperá al código.

2- Colocar en los campos: value="{{ old(‘title’, $Report->title) }}", hace dos cosas: primero, cuando enviamos un parámetro y tenemos un error lo vuelve a colocar para no tener que escribirlo desde 0, y segundo cuando empezamos a editar en vez de tener el campo vacío nos pondrá el valor anterior, que editaremos

_____________________________________________

## BORRAR REGISTROS (DELETE)
Para el proceso de eliminacion se aplica algo parecido en la vista del index del controlador

Diferente a este proceso, se crea una nueva sentencia de ruta, la cual se hara de manera siguiente:

- Route::get(’/vista_principal/{id}/confirmDelete’,
‘nomnre del controlador@confirmDelete’);

Consecuentemente se crea un metodo “confirmDelete” en el controller designado, que va a contener lo siguiente:
````
$report = ExpenseReport::find($id);
return view(‘nombreCarpeta.confirmDelete’, [
‘report’ => $report
]);
````

Finalmente, para la parte del metodo destroy(), se escribe algo similar a lo del update:
````
$report = ExpenseReport::find($id);

$report->delete();

return redirect(‘expense_reports’);
````
Para el caso de los edit, podemos usar en lugar de ‘find($id)’, ‘findOrFail($id)’ para validar que exista el usuario.

_____________________________________________

## VALIDACION DE FORMULARIOS
Es muy importante validar siempre la información que los usuarios ingresan en el sistema. En la mayoría de los casos tendrás usuarios bien intencionados que sólo busquen hacer uso del sistema, pero puede ocurrir que haya algún atacante que quiera obtener información que no le pertenece.

Cuando por ejemplo se hace submit a un form vacío, no vamos a querer que el usuario final vea los errores como son lanzados sino manejarlos de alguna manera, así que los validamos con ayuda de Laravel.
Laravel incluye todos los errores de validación que podamos encontrar dentro de un objeto especial llamado errors el cual podemos usar en nuestro template.

    Se utiliza la línea vertical | para agregar más validaciones.
    Si un usuario se equivoca al llenar los campos de formulario y al intentarlo de nuevo debe ingresarlos todos otra vez, eso significará una mala experiencia de usuario y creará frustración. Por esto mismo se deben poner de nuevo los valores y para esto Laravel nos ofrece un auxiliar especial llamado old que podemos usar en el valor del campo.

## MODEL BINDING
Model Binding: se puede cambiar el parametro que se espera como ID de un Model por el Model en concreto

###### ANTES
        public function show($id)
    {
        $report = ExpenseReport::findOrFail($id);
        return view('expenseReport.edit', [
            // aqui se agregan los parametros que se necesitan
            'report' => $report
        ]);
    }

###### AHORA
        public function show(ExpenseReport $expenseReport)
    {
        return view('expenseReport.show', [
            // aqui se agregan los parametros que se necesitan
            'report' => $expenseReport
        ]);
    }
_____________________________________________

## RELACIONES CON ELOQUENT

1 a 1 —> $this->hasOne(‘App\Model’);
1 a M —> $this->hasMany(‘App\Model’);
M a 1 —> $this->belongsTo(‘App\Model’);
M a M —> $this->belongsToMany(‘App\Model’);

Es importante resaltar que si mi tabla tiene un código de id que rompe la convención las podemos resaltar de la siguiente forma
$this->hasMany(‘App\Model’, ‘key_principal’, ‘key_referencia’);

También pueden revisar la documentación
https://laravel.com/docs/8.x/eloquent-relationships

## COMO HACER EL LOGIN
Se deben escribir los comandos en consola, pero DENTRO de la carpeta del proyecto.

Step 01:
 - Install laravel 6.0
 
Step 02:
 - Download nodejs 
 - Install nodejs in your pc
 
Step 03:
 - then open your project root and command
 - composer require laravel/ui
 - php artisan ui vue --auth
 - npm install
 - npm run dev

PARA BLOQUEAR UN CONTROLADOR CON EL LOGIN SE DEBE DE CREAR EL SIGUIENTE CONSTRUCTOR DENTRO DE EL
    public function __construct(){
        $this->middleware('auth');
    }
_____________________________________________
