@extends('layouts.base')
{{-- EL NOMBRE DEL ARCHIVO 'edit.blade.php' TIENE QUE SER SIEMPRE ASI PARA QUE FUNCIONA BIEN CON EL CONTROLADOR. --}}
@section('content')
    <div class='row'>
        <div class='col'>
        <h1>Delete Report {{$report->id}}</h1>
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
            <div class="col">
                {{-- Creacion de formulario --}}
                {{-- La ruta debe de llevar un 'id' en la accion update para que funciona bien --}}
            <form action="/expense_reports/{{$report->id}}" method="POST" >
                    {{-- se agrega la proteccion Cross-site request forgery  --}}
                    @csrf
                    {{-- SE DEBE ESPECIFICAR EL TIPO DE METODO PARA LA ACTUALIZACION DE CAMPOS --}}
                    @method('delete')
                    {{-- Se incorpora un aviso el presionar el boton de delete --}}
                    <button class="btn btn-primary" class="btn btn-danger"	onclick="return confirm('Do you really want to delete the form?');" type="submit">Delete</button>
                </form>
            </div>
        </div>
@endsection