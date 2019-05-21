@extends('layouts.app')
@section('title', ($product->name))
@section('content')

<div class="album py-5 bg-light">
  <div class="container">

    <div class="card mb-4 shadow-sm">

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
            <h5>Ubicacion: {{$product->user->userUbication->ubication->nombre ?? 'No hay ubicacion'}}</h5>
          </div>
          <div>
            <h5>Telefono: {{$product->user->phone}}</h5>
          </div>
        </p>

        @if(Auth::check() && Auth::user()['tipo'] == 0)
        <div class="d-flex justify-content-between align-items-center">
          <div class="btn-group">
            <div style="margin: 5px;">
              <a href="{{ url('/product/'.$product->slug.'/edit') }}"><button type="button"
                  class="btn btn-warning">Editar</button>
            </div>
            <div style="margin: 5px;">
              <form action="{{ route('product.destroy', $product->slug) }}" method="POST">
                @csrf @method('DELETE')
                <button type="submit" class="btn btn-danger">Borrar</button>
              </form>
            </div>
          </div>
        </div>
        @endif

      </div>

    </div>
  </div>

</div>

@endsection