@extends('layouts.app')
@section('title', '{{$product->name}}')
@section('content')

<div class="container mt-5" style="top: 10%">

  <div class="row">


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
          <div class="row">
            <h5>Precio: ${{$product->price}}</h5>
          </div>
          <div class="row">
            <h5>Cantidad: {{$product->amount}}</h5>
          </div>
        </div>

        @if(Auth::check() && Auth::user()['tipo'] == 0)
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
        @endif

      </div>

    </div>
  </div>


</div>
</div>

@endsection