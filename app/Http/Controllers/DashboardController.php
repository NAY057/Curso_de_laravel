<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DashboardController extends Controller
{
    // asi se hace un request
   public function index (Request $request){
        return view('dashboard', [
            //arreglo asociativo
            'title' => $request->query('title', 'SRY =(')
        ]);
    }
}

// php artisan serve = CREA UN SERVER LOCAL
// Contamos con un helper muy útil de Laravel que reemplaza el var_dump y el die; este helper es dd.


