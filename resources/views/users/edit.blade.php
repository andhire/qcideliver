<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Editar usuario</title>

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">
    <link href="{{asset('css/bootstrap.min.css')}}" rel="stylesheet">
    <link href="{{asset('css/create.css')}}" rel="stylesheet">
</head>

<body>
        <nav class="navbar navbar-dark bg-dark ">
                <div class="container text-center">
                    <a class="navbar-brand" href="{{ url('/user')}}">Usuarios</a>
                    <a class="navbar-brand" href="{{ url('/user/create')}}">Crear Usuario</a>
                </div>
            </nav>
        
            <div class="container content">
                <div class="row justify-content-center">
                    <div class="col-md-8">
                            <form method="POST" action="/user/{{$user->slug}}" id="edit-form" role="form">
                            <div class="card">
                                <div class="card-header">Editar Usuario</div>
                                <div class="card-body">
                                    @csrf @method('PUT')
                                    <div class="form-group row">
                                        <label for="nombre" class="col-md-4 col-form-label text-md-right">Nombre</label>
                                        <div class="col-md-6">
                                            <input value="{{$user->nombre}}" type="text" class="form-control" name="nombre">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="apellidoP" class="col-md-4 col-form-label text-md-right">Apellido Paterno</label>
                                        <div class="col-md-6">
                                            <input value="{{$user->apellidoP}}" type="text" class="form-control" name="apellidoP">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="apellidoM" class="col-md-4 col-form-label text-md-right">Apellido Materno</label>
                                        <div class="col-md-6">
                                            <input value="{{$user->apellidoM}}" type="text" class="form-control" name="apellidoM">
                                        </div>
                                    </div>
        
                                    <div class="form-group row">
                                        <label for="usuario" class="col-md-4 col-form-label text-md-right">Usuario</label>
                                        <div class="col-md-6">
                                            <input value="{{$user->usuario}}" type="text" class="form-control" name="usuario">
                                        </div>
                                    </div>

                                     {{--
                                    <div class="form-group row">
                                        <label for="password" class="col-md-4 col-form-label text-md-right">Contraseña</label>
                                        <div class="col-md-6">
                                            <input value="{{$user->password}}" type="password" class="form-control" name="password">
                                        </div>
                                    </div>--}}
                                    
                                    <div class="form-group row">
                                        <label for="tipo" class="col-md-4 col-form-label text-md-right">Tipo</label>
                                        <div class="col-md-6">
                                            <select class="form-control" name="tipo">
                                                @if($user->tipo==1)
                                                    <option selected value="1">Vendedor</option>
                                                    <option value="2">Comprador</option>
                                                @else
                                                    <option value="1">Vendedor</option>
                                                    <option selected value="2">Comprador</option>
                                                @endif
                                            </select>
                                        </div>
                                    </div>
        
                                    <div class="form-group row">
                                        <label for="foto" class="col-md-4 col-form-label text-md-right">Foto</label>
                                        <div class="col-md-6">
                                            <input value="{{$user->foto}}" type="text" class="form-control" name="foto">
                                        </div>
                                    </div>
                                    <div class="col-md-6 offset-md-4">
                                        <button type="submit" class="btn btn-primary" id="botonEnviar">
                                            Editar!
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
</body>

</html>