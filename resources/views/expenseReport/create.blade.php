@extends('layouts.base')

@section('content')
    <div class='row'>
        <div class='col'>
            <h1>New Report</h1>
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
                <form action="/expense_reports" method="POST" >
                    {{-- se agrega la proteccion Cross-site request forgery  --}}
                    @csrf
                    <div class="form-group">
                        <label for="title">Title:</label>
                        {{-- con 'value="{{ old('title') }}"' se guardan los campos despues de que salte un error --}}
                        <input type="text" value="{{ old('title') }}" class="form-control" id="title" name="title" placeholder="Type new title">
                    </div>
                    <button class="btn btn-primary" type="submit">Submit</button>
                </form>
            </div>
        </div>
@endsection