<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

// Route::get('/', function () {
//     return view('welcome');
// });
// Route::get('/dashboard',function(){
//     return view('test', [
//         //arregl o asociativo
//         'title' => 'Curso laravel en platzi!!!!'
//     ]);
// });
//SE DEBE DE PONER LA RUTA COMPLETA AL CONTROLADOR!!!!
Route::get('/', 'App\Http\Controllers\HomeController@index');

Route::get('/dashboard', 'App\Http\Controllers\DashboardController@index');

Route::resource('/expense_reports', 'App\Http\Controllers\ExpenseReportController');
//Se crear una ruta manualmente de tipo get dado que se va a mostrar un formulario para poder eliminar registros del formulario.
// En este caso particular si se le coloca una accion al final del controlador
Route::get('/expense_reports/{id}/confirmDelete','App\Http\Controllers\ExpenseReportController@confirmDelete' );

