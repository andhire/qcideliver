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
    <!--
    <nav class="navbar navbar-dark bg-dark ">
        <div class="container text-center">
            <a class="navbar-brand" href="{{ url('/user')}}">Usuarios</a>
            <a class="navbar-brand" href="{{ url('/user/create')}}">Crear Usuario</a>
            <a class="navbar-brand" href={{url('/login')}}>Login</a>
        </div>
    </nav> -->
    <!-- Navigation -->
  <nav class="navbar navbar-expand-md navbar-light bg-light fixed-top">
        <a class="navbar-brand" href="/">
          <img src="{{asset('img/icon.svg')}}" width="30" height="30" class="d-inline-block align-top" alt="QciDeliver">
          QciDeliver
        </a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navLinks" aria-controls="navLinks"
          aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
    
        <div class="collapse navbar-collapse" id="navLinks">
          <ul class="navbar-nav ml-auto">
            <li class="nav-item active">
              <a class="nav-link" href="/">Inicio</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="/product">Productos</a>
            </li>
            <li class="nav-item">
              <a href="/login">
                <button type="button" class="btn btn-link">Inciar Sesión</button>
              </a>
            </li>
          </ul>
        </div>
      </nav>
      

   
    <!--<div class="container content">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <h1>Login</h1>

                <p>
                    {{-- $errors->first('usuario') }} {{ $errors->first('password') --}}
                </p>

                <p>
                    <div class="form-group">
                        <div class="form-group row">
                            <label for="usuario" class="col-md-4 col-form-label text-md-right">Usuario</label>
                             {{--Form::text('usuario',
                            Input::old('usuario')) --}}

                        </div>
                    </div>

                </p>

                <p>
                    <div class="form-group">
                        <div class="form-group row">
                            <label for="password" class="col-md-4 col-form-label text-md-right">Password</label> {{-- Form::password('password'--)
                            }}
                        </div>
                    </div>

                </p>

                <div class="col-md-6 offset-md-4">
                    {{-- Form::submit('Submit!') }}
                    {{ Form::close() --}}
                </div>


            </div>
        </div>
    </div>
-->

    
    <div class="container" style="margin-top:3%">
            <div class="row justify-content-center">
              <div class="col-md-8">
                <form method="POST" action="/login" id="register-form" role="form" enctype="multipart/form-data">
                  <div class="card">
                    <div class="card-header">Login</div>
                    <div class="card-body">
                      @csrf @method('POST')
                      <div class="form-group row">
                        <label for="nombre" class="col-md-4 col-form-label text-md-right">Usuario</label>
                        <div class="col-md-6">
                          <input type="text" class="form-control" name="usuario">
                        </div>
                      </div>
                      <div class="form-group row">
                        <label for="apellidoP" class="col-md-4 col-form-label text-md-right">Contraseña</label>
                        <div class="col-md-6">
                          <input type="password" class="form-control" name="password">
                        </div>
                      </div>
                     
                      <div class="col-md-6 offset-md-4">
                        <button type="submit" class="btn btn-primary btn-lg btn-block" id="botonEnviar">
                          Loguearse!
                        </button>
                      </div>

                      <div class="col-md-6 offset-md-4">
                          <br>
                            <p>¿Aún no tienes cuenta? <a href="/user/create"s> Registrarse</a> </p>
                          </div>
                    
                            
                         
                    </div>
                  </div>
                </form>
              </div>
            </div>
          </div>
        </div>

</body>