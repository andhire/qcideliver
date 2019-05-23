@extends('layouts.app')
@section('title', 'Usuarios')
@section('content')

<div class="album py-5">
  <div class="container">
    <div class="row">

      @foreach ($users as $user)
      <div class="col-md-4">
        <div class="card mb-4 shadow-sm">
          <a href="{{ url('/user',[$user->slug]) }}">

            <img class="card-img-top" src="{{$user->foto}}" height="268" ,width="180px" alt="Card image cap">

            <div class="card-body">
              <h5 class="card-title">
                {{$user->name}} {{$user->apellidoP}} {{$user->apellidoM}}
              </h5>
              <p class="card-text">
                @if($user->tipo==0)
                Admin
                @elseif($user->tipo==1)
                Vendedor
                @else
                Comprador
                @endif
                @if($user->estado==1)
                <img src="{{asset('img/online.png')}}" height="16px" ,width="16px" />
                @else
                <img src="{{asset('img/offline.png')}}" height="16px" ,width="16px" />
                @endif
              </p>
            </div>
          </a>
        </div>
      </div>

      @endforeach
    </div>
  </div>
</div>

<div class="pagination justify-content-center " style="margin-top:15%">
  {{ $users->links() }}
</div>

@endsection