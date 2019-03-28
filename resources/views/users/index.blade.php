<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <title>Usuarios</title>

  <link href="{{asset('css/bootstrap.min.css')}}" rel="stylesheet">

</head>

<body>


  <nav class="navbar navbar-dark bg-dark ">
    <div class="container text-center">
      <a class="navbar-brand" href="{{ url('/user')}}">Usuarios</a>
      <a class="navbar-brand" href="{{ url('/user/create')}}">Crear Usuario</a>
    </div>
  </nav>

<div class="jumbotron">
  @if (session('message'))
    <div class="alert alert-success">
        {{ session('message') }}
    </div>
  @endif

  <div class="card-columns text-center">
    @foreach ($users as $user)


    <a href="{{ url('/user',[$user->slug]) }}">
      <div class="card text-center" style="width: 18rem;" action="/user/">
        <img class="card-img-top" src="{{$user->foto}}" height="268" ,width="180px" alt="Card image cap">
        <div class="card-body">
          <h5 class="card-title">{{$user->nombre}} {{$user->apellidoP}} {{$user->apellidoM}}</h5>




          <div class="row">
            <div class="col col-lg-5">
              @if($user->estado==1)
              <img src="{{asset('img/online.png')}}" height="16px" ,width="16px" /> @else
              <img src="{{asset('img/offline.png')}}" height="16px" ,width="16px" /> @endif
            </div>
            <div class="col-md-auto">
              @if($user->tipo==1)
              <p class="card-text">Vendedor</p>
              @else
              <p class="card-text">Comprador</p>
              @endif
            </div>

          </div>


        </div>
      </div>
    </a>
    @endforeach
    </div>
  </div>
  </div>
  <footer class="pagination justify-content-center " style="margin-top:15%">
    {{ $users->links() }}
  </footer>

</body>

</html>
