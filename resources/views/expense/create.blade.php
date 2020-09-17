@extends('layouts.base')

@section('content')
    <div class='row'>
        <div class='col'>
            <h1>New Expense</h1>
        </div>
    </div>
        <div>
            <div class="row">
                <div class="col">
                    {{--creacion del boton 'create a new report' --}}
                <a class="btn btn-secondary" href="/expense_reports/{{$report->id}}">Back</a>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col">
                @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>
                                {{$error}}
                            </li>
                        @endforeach
                    </ul>
                </div>
                    
                @endif
                {{-- Creacion de formulario --}}
            <form action="/expense_reports/{{$report->id}}/expenses" method="POST" >
                    {{-- se agrega la proteccion Cross-site request forgery  --}}
                    @csrf
                    <div class="form-group">
                        <label for="description">Description:</label>
                        {{-- en las etiquetas 'id'y 'name' deben ir iguales ya que estos nombres son los que utiliza el controlador  --}}
                        <input type="text" value="{{ old('description') }}" value="000" class="form-control" id="description" placeholder="Type new description" name="description" >
                    </div>
                    <div class="form-group">
                        <label for="amount">Amount:</label>
                        {{-- con 'value="{{ old('title') }}"' se guardan los campos despues de que salte un error --}}
                        <input type="text" value="{{ old('amount') }}" class="form-control" id="amount" name="amount" placeholder="Type new amount">
                    </div>
                    <button class="btn btn-primary" type="submit">Submit</button>
                </form>
            </div>
        </div>
@endsection