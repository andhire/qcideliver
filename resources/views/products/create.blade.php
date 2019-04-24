<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Crear Producto</title>

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">
    <link href="{{asset('css/bootstrap.min.css')}}" rel="stylesheet">
    <link href="{{asset('css/create.css')}}" rel="stylesheet">
    <script type="text/javascript" src="{{asset('js/create.js')}}"></script>
</head>

<body>
    <nav class="navbar navbar-dark bg-dark ">
        <div class="container text-center">
            <a class="navbar-brand" href="{{ url('/user')}}">Usuarios</a>
            <a class="navbar-brand" href="{{ url('/user/create')}}">Crear Usuario</a>
            <a class="navbar-brand" href={{url('/login')}}>Login</a>

        </div>
    </nav>

    <div class="container content">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <form method="POST" action="/product" id="register-form" role="form">
                    <div class="card">
                        <div class="card-header">Registrar Producto</div>
                        <div class="card-body">
                            @csrf @method('POST')
                            <div class="form-group row">
                                <label for="nombre" class="col-md-4 col-form-label text-md-right">Nombre</label>
                                <div class="col-md-6">
                                    <input type="text" class="form-control" name="name">
                                </div>
                            </div>
                        
                            <div class="form-group row">
                                <label for="tipo" class="col-md-4 col-form-label text-md-right">Tipo</label>
                                <div class="col-md-6">
                                    <select class="form-control" name="type">
                                        <option value="1">Electronica</option>
                                        <option value="2">Comida</option>
                                    </select>
                                </div>
                            </div>

                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary" id="botonEnviar">
                                    Registrar Producto!
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