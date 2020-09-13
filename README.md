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
+ this will be highlighted in green
- this will be highlighted in red
```

## CRAR SERVER LOCAL
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
- php artisan make:migration 'nombre descriptivo de la migracion' + '--create' + ='nombre de la tabla a crear' 
_________________________________________

## CREAR MODELOS
Un ORM es un sistema que nos permite mapear registros de la base de datos a objetos dentro dentro de nuestro código. No es exclusivo de PHP ya que se usa mucho en los lenguajes de programación orientada a objetos.

```diff
- No es aconsejable modificar una migración ya que si estamos trabajando en equipo alguien puede haber ya corrido la migración con anterioridad y esto le causaría conflictos. Lo aconsejable es crear una migración adicional.
- El comando migrate:fresh lo reinicia todo incluyendo la base de datos y los elementos creados
```

<tspan fill="red">
No es aconsejable modificar una migración ya que si estamos trabajando en equipo alguien puede haber ya corrido la migración con anterioridad y esto le causaría conflictos. Lo aconsejable es crear una migración adicional.
El comando migrate:fresh lo reinicia todo incluyendo la base de datos y los elementos creados.
</tspan>

- ![#f03c15](https://placehold.it/15/f03c15/000000?text=+) `#f03c15ddd`

Cuando creamos las bases de datos es estándar que las tablas tengan el nombre en plural pero los modelos como representan una clase que representa un objeto, tendrán su nombre en singular.

Todos los modelos los podremos encontrar dentro de la carpeta app. Laravel no tiene carpeta models porque los creadores creen que model puede tener muchos significados.

El comando tinker nos ofrece un entorno de pruebas para ver cómo funcionan las cosas que estamos haciendo. Tiene en cuenta variables de entorno, lo que inicializa Laravel y también sabe que estamos usando Eloquent.

- php artisan make:model = crea una nueva clase para representar un modelo de Eloquent.

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
