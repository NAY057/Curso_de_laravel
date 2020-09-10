<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index() {
        return view('welcome');
    }
}

// ASI SE CREAN CONTROLADORES:

// php artisan make:controller nombre_del_controlador

