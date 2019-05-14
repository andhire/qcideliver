<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <!-- CSRF Token -->
  <meta name="csrf-token" content="{{ csrf_token() }}">

  <title>{{ config('app.name', 'Laravel') }}</title>

  <!-- Scripts -->
  <script src="{{ asset('js/app.js') }}" defer></script>

  <!-- Fonts -->
  <link rel="dns-prefetch" href="//fonts.gstatic.com">
  <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet" type="text/css">

  <!-- Styles -->
  <link href="{{ asset('css/app.css') }}" rel="stylesheet">
  <!-- Google Font -->
  <link href="https://fonts.googleapis.com/css?family=Nunito:200,300,400,700" rel="stylesheet">

  <!-- Font Awesome -->
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.1/css/all.css">

  <!-- Bootstrap CSS -->
  <link href="{{asset('css/bootstrap.min.css')}}" rel="stylesheet">
  {{-- <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous"> --}}


  {{-- Bootstrap js requires --}}
  <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"
    integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous">
  </script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"
    integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous">
  </script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"
    integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous">
  </script>

  <!-- Custom CSS -->
  <link href="{{asset('css/create.css')}}" rel="stylesheet">
</head>

<body>


  <nav class="navbar navbar-expand-lg navbar-light bg-light">

    {{-- <a class="navbar-brand" href="#">QciDeliver</a> --}}
    <a class="navbar-brand" href="/">
      <img src="{{asset('img/icon.svg')}}" width="30" height="30" class="d-inline-block align-top" alt="QciDeliver">
      QciDeliver
    </a>

    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
      aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarSupportedContent">
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
      {{-- <form class="form-inline my-2 my-lg-0">
        <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search">
        <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
      </form> --}}
    </div>
  </nav>


  <main>
    @yield('content')
  </main>
</body>

</html>