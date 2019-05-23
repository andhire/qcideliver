@extends('layouts.app')
@section('title', ($product->name))
@section('content')

<div class="album py-5 bg-light">


  <div class="card shadow-sm" style="max-width: 22rem; margin: auto;">

    <img src="{{$product->image}}" width="100%" height="200">
    <div class="card-body">
      <h2 class="card-title">{{$product->name}}</h2>
      <p class="card-text">
        <div>
          <h5>Precio: ${{$product->price}}</h5>
        </div>
        <div>
          <h5>Cantidad: {{$product->amount}}</h5>
        </div>
        <div>
          <h5>Vendedor: {{$product->user->name}}</h5>
        </div>
        <div>
          <h5>Ubicación: {{$product->user->userUbication->ubication->nombre ?? 'No hay ubicación'}}</h5>
        </div>
        <div>
          <h5>Teléfono: {{$product->user->phone}}</h5>
        </div>
      </p>

      @if(Auth::check() && Auth::user()['tipo'] == 0)
      <div class="d-flex justify-content-between align-items-center">
        <div class="btn-group">
            <form action="{{ url('/product/'.$product->id.'/bloquear')}}" method="POST">
              @csrf @method('POST')
              <button type="submit" class="btn btn-sm btn-danger">Bloquear</button>
            </form>
        </div>
      </div>
      @endif

    </div>

  </div>
</div>


@endsection