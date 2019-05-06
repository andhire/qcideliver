<!doctype html>
<html>
@php
@endphp
<head>
    <title>Look at me Login</title>
    <link href="{{asset('css/bootstrap.min.css')}}" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">

</head>

<body>
    <nav class="navbar navbar-dark bg-dark ">
        <div class="container text-center">
            <a class="navbar-brand" href="{{ url('/user')}}">Usuarios</a>
            <a class="navbar-brand" href="{{ url('/user/create')}}">Crear Usuario</a>
            <a class="navbar-brand" href={{url('/login')}}>Login</a>
        </div>
    </nav>
    @php use Illuminate\Support\Facades\Input; 
@endphp {{ Form::open(array('url' => 'login')) }}
    <div class="container content">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <h1>Login</h1>

                <!-- if there are login errors, show them here -->
                <p>
                    {{ $errors->first('usuario') }} {{ $errors->first('password') }}
                </p>

                <p>
                    <div class="form-group">
                        <div class="form-group row">
                            <label for="usuario" class="col-md-4 col-form-label text-md-right">Usuario</label>
                             {{ Form::text('usuario',
                            Input::old('usuario')) }}

                        </div>
                    </div>

                </p>

                <p>
                    <div class="form-group">
                        <div class="form-group row">
                            <label for="password" class="col-md-4 col-form-label text-md-right">Password</label> {{ Form::password('password')
                            }}
                        </div>
                    </div>

                </p>

                <div class="col-md-6 offset-md-4">
                    {{ Form::submit('Submit!') }}
                    {{ Form::close() }}
                </div>


            </div>
        </div>
    </div>