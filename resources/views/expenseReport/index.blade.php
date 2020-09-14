@extends('layouts.base')

@section('content')
    <div class='row'>
        <div class='col'>
            <h1>Reports</h1>
        </div>
    </div>
        <div>
            <div class="row">
                <div class="col">
                    {{-- creacion del boton 'create a new report' --}}
                    <a class="btn btn-primary" href="/expense_reports/create">Create a new report</a>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col">
                <table class='table'>
                    @foreach($expenseReports as $expenseReport)
                        <tr>
                            {{-- AQUI SE AGREGAN LAS COLUMAS QUE SE NECESITEN --}}
                            <td>{{$expenseReport->title}}</td>
                            {{-- INCORPORACION DE LA COLUMNA EDIT --}}
                            <td><a href="/expense_reports/{{ $expenseReport->id }}/edit">Edit</a></td>
                            <td><a href="/expense_reports/{{ $expenseReport->id }}/confirmDelete">Delete</a></td>
                        </tr>
                    @endforeach
                    </table>
            </div>
        </div>
@endsection