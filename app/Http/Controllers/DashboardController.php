<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DashboardController extends Controller
{
    // asi se hace un request
   public function index (Request $request){
       dd($request->query('title'));
        return view('dashboard', [
            //arreglo asociativo
            'title' => 'Curso laravel en platzi!!!!'
        ]);
    }
}

// php artisan serve = CREA UN SERVER LOCAL


