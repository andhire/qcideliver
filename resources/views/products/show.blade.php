<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>{{$product->name}}</title>
    <link href="{{asset('css/bootstrap.min.css')}}" rel="stylesheet">

</head>

<body>

    {{-- 
    <nav class="navbar navbar-expand-md navbar-light bg-light fixed-top">
        <a class="navbar-brand" href="/">
            <img src="{{asset('img/icon.svg')}}" width="30" height="30" class="d-inline-block align-top"
    alt="QciDeliver">
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

            <li class="nav-item">
                <a href="/donate">
                    <button type="button" class="btn btn-link">Donar</button>
                </a>
            </li>
        </ul>
    </div>
    </nav>

    --}}
    <div class="container mt-5" style="top: 10%">

        <div class="row">
            <div class="col">

                <div class="card" style="width: 18rem;">

                    <img src="{{$product->image}}" class="img-thumbnail" />
                </div>
            </div>
            <div class="col">
                <div class="row">
                    <h2>{{$product->name}}</h2>
                </div>
            </div>
        </div>
    </div>
</body>

</html>