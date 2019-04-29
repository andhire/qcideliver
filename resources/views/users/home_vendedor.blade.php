<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Usuarios</title>

    <link href="//netdna.bootstrapcdn.com/twitter-bootstrap/2.3.2/css/bootstrap-combined.min.css" rel="stylesheet" id="bootstrap-css">
    <script src="https://maps.googleapis.com/maps/api/js?sensor=true"></script>

    <style>
        .card {
            box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2);
            max-width: 300px;
            margin: auto;
            text-align: center;
            font-family: arial;
        }

        .price {
            color: grey;
            font-size: 22px;
        }

        .card button {
            border: none;
            outline: 0;
            padding: 12px;
            color: white;
            background-color: #000;
            text-align: center;
            cursor: pointer;
            width: 100%;
            font-size: 18px;
        }

        .card button:hover {
            opacity: 0.7;
        }
    </style>

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


    <div class="container">
        <img src="{{$user->foto}}" class="img-thumbnail" style="width: 100px;" />


    </div>


    <a href="{{ route('addProduct', $user) }}" class="btn btn-default">Agregar Producto  </a> 
    @foreach ($productos as $producto)
    <div class="card">
        <img src={{$producto->image}} style="width:100%">
        <h1>{{$producto->name}}</h1>
        <p class="price">${{$producto->price}}</p>
    </div>

    @endforeach



</body>

</html>