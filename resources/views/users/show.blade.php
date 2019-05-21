@extends('layouts.app')
@section('title', '{{$user->nombre}}')
@section('content')


<div class="album py-5 bg-light">
  <div class="container">

    <div class="card text-center mb-4 shadow-sm">

      <img src="{{$user->foto}}" width="100%" height="200">

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

        <p>
          <div class="btn-group">
            <a href="{{ url('/user/'.$user->slug.'/edit') }}"><button type="button"
                class="btn btn-warning">Editar</button></a>

            <form action="{{ route('user.destroy', $user->slug) }}" method="POST">
              @csrf @method('DELETE')
              <button type="submit" class="btn btn-danger">Borrar</button>
            </form>
          </div>
        </p>

        <div class="btn-group">
          @if($user->tipo == 0)
          <form action="{{ url('/user/'.$user->id.'/quitar-admin')}}" method="POST">
            @csrf @method('POST')
            <button type="submit" class="btn btn-secondary">Quitar admin</button>
          </form>
          @else
          <form action="{{ url('/user/'.$user->id.'/hacer-admin')}}" method="POST">
            @csrf @method('POST')
            <button type="submit" class="btn btn-secondary">Hacer admin</button>
          </form>
          @endif

          @if($user->estado == 0)
          <form action="{{ url('/user/'.$user->id.'/aprobar')}}" method="POST">
            @csrf @method('POST')
            <button type="submit" class="btn btn-primary">Aprobar</button>
          </form>
          @else
          <form action="{{ url('/user/'.$user->id.'/bloquear')}}" method="POST">
            @csrf @method('POST')
            <button type="submit" class="btn btn-danger">Bloquear</button>
          </form>
          @endif
        </div>

      </div>
    </div>
  </div>
</div>

@endsection