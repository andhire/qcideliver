<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <!-- Meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description">

    <!-- Title -->
    <title>QciDeliver</title>

    <!-- Favicon -->
    <link rel="apple-touch-icon" sizes="180x180" href="/apple-touch-icon.png">
    <link rel="icon" type="image/png" sizes="32x32" href="/favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="16x16" href="/favicon-16x16.png">
    <link rel="manifest" href="/site.webmanifest">
    <link rel="mask-icon" href="/safari-pinned-tab.svg" color="#5bbad5">
    <meta name="msapplication-TileColor" content="#2b5797">
    <meta name="theme-color" content="#ffffff">

    <!-- Google Font -->
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,300,400,700" rel="stylesheet">

    <!-- Font Awesome -->
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.1/css/all.css">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

    <!-- Custom CSS -->
    <link rel="stylesheet" href="{{asset('css/index.css')}}">
</head>
<body>
    <!-- Navigation -->
    <nav class="navbar navbar-expand-md navbar-light bg-light fixed-top">
        <a class="navbar-brand" href="#">
            <img src="{{asset('img/icon.svg')}}" width="30" height="30" class="d-inline-block align-top" alt="QciDeliver">
                QciDeliver
        </a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navLinks" aria-controls="navLinks" aria-expanded="false" aria-label="Toggle navigation">
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
    
    <!-- Banner -->
    <div class="jumbotron jumbotron-fluid bg-info text-white text-center">
        <div class="container">
            <h1 class="display-1">Bienvenido a QciDeliver</h1>
            <p class="lead">Un punto de encuentro para el comercio en tu centro universitario</p>
            <a href="/user/create">
                <button type="button" class="btn btn-success">Comienza ahora!</button>
            </a>
        </div>
    </div>

    <!-- Cards -->
    <div class="container text-muted text-center">
        <div class="card-deck">
            <div class="card">
                <img class="card-img-top img-fluid" src="{{asset('img/estudiantes.jpg')}}">
                <div class="card-body bg-info text-white">
                    <h3 class="card-title">De estudiantes para estudiantes</h3>
                    <p class="card-text">Sabemos lo importante que es tu tiempo, por eso QciDeliver te permite encontrar tus productos favoritos con unos cuantos clicks!</p>
                </div>
            </div>
            <div class="card">
                <img class="card-img-top img-fluid" src="{{asset('img/repartidor.jpg')}}">
                <div class="card-body bg-success text-white">
                    <h3 class="card-title">Entregas cómodas y rápidas</h3>
                    <p class="card-text">No te preocupes por tener que buscar al vendedor o trasladarte muy lejos. Con QciDeliver podrás designar un punto de entrega que te sea comodo y accesible!</p>
                </div>
            </div>
            <div class="card">
                <img class="card-img-top img-fluid" src="{{asset('img/dulces.jpg')}}">
                <div class="card-body bg-dark text-white">
                    <h3 class="card-title">Tus favoritos están aquí</h3>
                    <p class="card-text">Nuestro catálogo esta en constante crecimiento, estamos seguros de que aquí podrás encontrar tus productos favoritos, desde un dulce hasta una compuerta lógica.</p>
                </div>
            </div>
        </div>
    </div>

    <!-- Footer -->
    <footer class="navbar navbar-expand-md">
        <div class="d-inline-block align-top">© 2019 Copyright:
            <a href="/#">QciDeliver</a>
        </div>
        <!-- Social -->
        <div class="ml-auto">
            <a class="fb-ic">
            <i class="fab fa-facebook-f fa-lg white-text mr-md-5 mr-3 fa-2x"> </i>
            </a>

            <a class="tw-ic">
            <i class="fab fa-twitter fa-lg white-text mr-md-5 mr-3 fa-2x"> </i>
            </a>

            <a class="ins-ic">
            <i class="fab fa-instagram fa-lg white-text mr-md-5 mr-3 fa-2x"> </i>
            </a>
        </div>
    </footer>

    <!-- Scripts -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>

</body>
</html>