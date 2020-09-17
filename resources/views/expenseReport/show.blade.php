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

        <div>
            <div class="row">
                <div class="col">
                    {{--creacion del boton 'create a new report' --}}
                <a class="btn btn-primary" href="/expense_reports/{{$report->id}}/confirmSendMail">Send E-mail</a>
                </div>
            </div>
        </div>

        <div class="row">
           <div class="col">
               <h3>Details</h3>
               <table class="table">
                   @foreach ($report->expenses as $expense)
                       <tr>
                       <td>{{$expense->descripcion}}</td>
                           <td>{{$expense->created_at}}</td>
                           <td>{{$expense->amount}}</td>
                       </tr>
                   @endforeach
               </table>
           </div>
        </div>
        <div class="row">
            <div class="col">
            <a class="btn btn-primary" href="/expense_reports/{{$report->id}}/expenses/create">New expense</a>
            </div>
        </div>
@endsection