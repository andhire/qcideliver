<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <!-- CSRF Token -->
  <meta name="csrf-token" content="{{ csrf_token() }}">

  <title>QciDeliver - @yield('title')</title>

  <!-- Fonts -->
  <link rel="dns-prefetch" href="//fonts.gstatic.com">

  <!-- Styles -->
  <link href="{{ asset('css/app.css') }}" rel="stylesheet">
  <link href="{{ asset('css/global.css') }}" rel="stylesheet">

  <!-- Scripts -->
  <script src="{{ asset('js/app.js') }}" defer></script>

  <!-- jQuery CDN - Slim version (=without AJAX) -->
  <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>

  @yield('head')

</head>

<body>

  {{-- NAVBAR --}}

  <nav class="navbar navbar-expand-lg navbar-light bg-light">

    {{-- <a class="navbar-brand" href="#">QciDeliver</a> --}}
    <a class="navbar-brand" href="/">
      <img src="{{asset('img/icon.svg')}}" width="30" height="30" class="d-inline-block align-top" alt="QciDeliver">
      QciDeliver
    </a>

    @if (!Auth::check()) {{-- Si el usuario no esta logeado --}}
    <a href="/login" class=" ml-auto mr-3 order-lg-last">
      <button class="btn btn-primary btn-sm">
        Iniciar Sesión
      </button>
    </a>
    @else
    <form id="logout-form" action="{{ route('logout') }}" method="POST" class=" ml-auto mr-3 order-lg-last">
      @csrf
      <button type="submit" class="btn btn-danger btn-sm" id="botonEnviar">
        Cerrar Sesión
      </button>
    </form>
    @endif

    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
      aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav ml-auto">
        @if (Auth::check())
        <li class="nav-item active">
          <a class="nav-link" href="/home">Inicio</a>
        </li>
        @if (Auth::user()['tipo'] == 0)
        <li class="nav-item active">
          <a class="nav-link" href="/user">Usuarios</a>
        </li>
        <li class="nav-item active">
          <a class="nav-link" href="/category">Categorías</a>
        </li>
        @endif
        @endif
        <li class="nav-item active">
          <a class="nav-link" href="/product">Productos</a>
        </li>
        <li class="nav-item active">
          <a class="nav-link" href="/ubication">Ubicaciones</a>
        </li>
        <li class="nav-item donate">
          <a href="/donate">
            <button type="button" class="btn btn-outline-primary btn-sm btn-donate">
              Donar
            </button>
          </a>
        </li>

      </ul>
    </div>
  </nav>


  <main>
    @if (session('message'))
    <div class="alert alert-success">
      {{ session('message') }}
    </div>
    @endif

    @yield('content')

  </main>

  <!-- Footer -->
  <footer class="navbar">

    <!-- Social -->
    <div class="social">
      <a class="fb-ic" href="https://www.facebook.com/qcideliver">
        <i class="fab fa-facebook-f fa-lg white-text mr-md-5 mr-3 fa-2x"> </i>
      </a>

      <a class="tw-ic" href="https://twitter.com/QciDeliver">
        <i class="fab fa-twitter fa-lg white-text mr-md-5 mr-3 fa-2x"> </i>
      </a>

      <a class="ins-ic" href="https://www.instagram.com/qcideliver/">
        <i class="fab fa-instagram fa-lg white-text mr-md-5 mr-3 fa-2x"> </i>
      </a>
    </div>

    <div class="copyright">
      2019 Copyright:
      <a href="/">QciDeliver</a>
    </div>

  </footer>

</body>


</html>