<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Crear Producto</title>

    <!-- Fonts -->
    <link href="//netdna.bootstrapcdn.com/twitter-bootstrap/2.3.2/css/bootstrap-combined.min.css" rel="stylesheet" id="bootstrap-css">
    
   

</head>

<body>
    @php $user = $data[0]; $productos = $data[1]; 
    @endphp
    <div class="navbar navbar-inverse nav">
        <div class="navbar-inner">
            <div class="container">
                <a class="btn btn-navbar" data-toggle="collapse" data-target=".nav-collapse">
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </a> @if ($user->tipo)
                <a class="brand" href="/user">Qci</a> @endif @if (!$user->tipo)
                <a class="brand" href="/user">Qci</a> @endif
                <div class="nav-collapse collapse">
                    <ul class="nav">
                        <li class="divider-vertical"></li>
                        <li><a href="#"><i class="icon-home icon-white"></i> Home</a></li>
                    </ul>
                    <div class="pull-right">
                        <ul class="nav pull-right">
                            <li class="dropdown"><a href="#" class="dropdown-toggle" data-toggle="dropdown">Welcome, {{$user->nombre}} <b class="caret"></b></a>
                                <ul class="dropdown-menu">
                                    <li><a href="/user/preferences"><i class="icon-cog"></i> Preferences</a></li>
                                    <li><a href="/help/support"><i class="icon-envelope"></i> Contact Support</a></li>
                                    <li class="divider"></li>
                                    <li><a href="/auth/logout"><i class="icon-off"></i> Logout</a></li>
                                </ul>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
    <div class="container content">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <form method="POST" action="/product" id="register-form" role="form" enctype="multipart/form-data">
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
                                        <option value="Electronica">Electronica</option>
                                        <option value="Comida">Comida</option>
                                    </select>
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="nombre" class="col-md-4 col-form-label text-md-right">Imagen</label>
                                <div class="col-md-6">
                                    <input type="file" name="file" required>    
                                </div>
                            </div>

                            
                            
                            <div class="form-group row">
                                <label for="nombre" class="col-md-4 col-form-label text-md-right">Precio</label>
                                <div class="col-md-6">
                                    <input  type="number" min="0.00" max="100000.00"  step="0.1" class="form-control" name="price">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="nombre" class="col-md-4 col-form-label text-md-right">Cantidad</label>
                                <div class="col-md-6">
                                    <input type="text" class="form-control" name="amount">
                                </div>
                            </div>
                            <div class="form-group row">
                                    <div class="col-md-6">
                                    <input type="text" class="form-control" name="id" value="{{$user->id}}" style="visibility: hidden;" >
                                    </div>
                                </div>
                            
                            <div class="col-md-6 offset-md-4" >
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