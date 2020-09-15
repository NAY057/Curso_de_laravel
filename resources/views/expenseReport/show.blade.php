@extends('layouts.base')
{{-- EL NOMBRE DEL ARCHIVO 'edit.blade.php' TIENE QUE SER SIEMPRE ASI PARA QUE FUNCIONA BIEN CON EL CONTROLADOR. --}}
@section('content')
    <div class='row'>
        <div class='col'>
        <h1>Report {{$report->title}}</h1>
        </div>
    </div>
        <div>
            <div class="row">
                <div class="col">
                    {{--creacion del boton 'create a new report' --}}
                    <a class="btn btn-secondary" href="/expense_reports">Back</a>
                </div>
            </div>
        </div>

        <div class="row">
           Details...
        </div>
@endsection