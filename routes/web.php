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
//         //arreglo asociativo
//         'title' => 'Curso laravel en platzi!!!!'
//     ]);
// });
//SE DEBE DE PONER LA RUTA COMPLETA AL CONTROLADOR!!!!
Route::get('/', 'App\Http\Controllers\HomeController@index');

Route::get('/dashboard', 'App\Http\Controllers\DashboardController@index');