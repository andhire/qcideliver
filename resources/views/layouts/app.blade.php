<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <!-- CSRF Token -->
  <meta name="csrf-token" content="{{ csrf_token() }}">

  <title>{{ config('app.name', 'Laravel') }}</title>

  <!-- Fonts -->
  <link rel="dns-prefetch" href="//fonts.gstatic.com">

  <!-- Styles -->
  <link href="{{ asset('css/app.css') }}" rel="stylesheet">

  <!-- Scripts -->
  <script src="{{ asset('js/app.js') }}" defer></script>

</head>

<body style="min-height: 100vh; position: relative; margin: 0; padding-bottom: 75px;">

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
        Log in
      </button>
    </a>
    @else
    <form id="logout-form" action="{{ route('logout') }}" method="POST" class=" ml-auto mr-3 order-lg-last">
      @csrf
      <button type="submit" class="btn btn-danger btn-sm" id="botonEnviar">
        Log out
      </button>
    </form>
    @endif

    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
      aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav ml-auto">
        <li class="nav-item active">
          <a class="nav-link" href="/">Inicio</a>
        </li>
        @if (Auth::check())
        <li class="nav-item active">
          <a class="nav-link" href="/home">Home</a>
        </li>
        @if (Auth::user()['tipo'] == 0)
        <li class="nav-item active">
          <a class="nav-link" href="/user">Usuarios</a>
        </li>
        <li class="nav-item active">
          <a class="nav-link" href="/ubication">Ubicaciones</a>
        </li>
        <li class="nav-item active">
          <a class="nav-link" href="/category">Categorias</a>
        </li>
        @endif
        @endif
        <li class="nav-item">
          <a class="nav-link" href="/product">Productos</a>
        </li>
        <li class="nav-item" style="margin-top: auto; margin-bottom: auto;">
          <a href="/donate">
            <button type="button" class="btn btn-outline-primary btn-sm" style="margin-right: 5px">
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
  <footer class="navbar" style="position: absolute; bottom: 0; width: 100%; text-align: center">

    <!-- Social -->
    <div class="" style="margin: auto">
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

    <div class="" style="margin: auto">
      2019 Copyright:
      <a href="/#">QciDeliver</a>
    </div>

  </footer>

</body>

<script>
  // Add the following code if you want the name of the file appear on select
    $(".custom-file-input").on("change", function() {
      var fileName = $(this).val().split("\\").pop();
      $(this).siblings(".custom-file-label").addClass("selected").html(fileName);
    });
</script>

</html>