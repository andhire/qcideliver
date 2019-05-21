@php
$user = $data[0];
$productosAprobados = $data[1];
$productosNoAprobados = $data[2];
$ubicacion = $data[3];
@endphp

@extends('layouts.app')
@section('title', ($user->name))
@section('content')


@if($user->estado == 0)
En espera de aprobacion por un administrador
@else
<div class="card-body">
  <form method="POST" action={{'/user/'.$user->id.'/ubicacion'}}>
    @csrf
    <div class="form-group row">
      <label for="ubication" class="col-md-4 col-form-label text-md-right">Ubicacion Actual</label>
      <div class="col-md-2">
        <select class="form-control" name="ubication">

          <option selected value="0">Sin ubicacion</option>

          @foreach (App\Ubication::all() as $u)

          @if($loop->iteration == $ubicacion)
          <option selected value="{{$u->id}}"> {{$u->nombre}}</option>
          @else
          <option value="{{$u->id}}"> {{$u->nombre}}</option>
          @endif

          @endforeach

        </select>
      </div>
      <div class="col-md-4">
        <button type="submit" class="btn btn-primary btn-sm">
          Actualizar ubicacion
        </button>
      </div>
    </div>
  </form>
</div>

<a href="{{ route('product.create') }}" class="btn btn-primary">Agregar Producto </a>

<div class="">
  Aprobados
  <div class="album py-5 bg-light" style="margin-top: 10px">
    <div class="container">
      <div class="row">

        @foreach ($productosAprobados as $p)
        <div class="col-md-4">
          <div class="card mb-4 shadow-sm">
            <a href="{{ url('/product',[$p->slug]) }}">
              <img src={{$p->image}} width="100%" height="200">
            </a>
            <div class="card-body">
              <p class="card-text">

                {{$p->name}}<br>
                $ {{$p->price}} <br>
                Cantidad:{{$p->amount}}</p>
              <div class="d-flex justify-content-between align-items-center">
                <div class="btn-group">
                  <div style="margin: 5px;">
                    <a href="{{ url('/product/'.$p->slug.'/edit') }}"><button type="button"
                        class="btn btn-warning">Editar</button>
                  </div>
                  <div style="margin: 5px;">
                    <form action="{{ route('product.destroy', $p->slug) }}" method="POST">
                      @csrf @method('DELETE')
                      <button type="submit" class="btn btn-danger">Borrar</button>
                    </form>
                  </div>
                </div>
              </div>
            </div>
          </div>
          </a>
        </div>
        @endforeach

      </div>
    </div>
  </div>

  Por aprobar
  <div class="album py-5 bg-light" style="margin-top: 10px">
    <div class="container">
      <div class="row">

        @foreach ($productosNoAprobados as $p)
        <div class="col-md-4">
          <div class="card mb-4 shadow-sm">
            <a href="{{ url('/product',[$p->slug]) }}">
              <img src={{$p->image}} width="100%" height="200">
            </a>
            <div class="card-body">
              <p class="card-text">
                {{$p->name}}<br>
                $ {{$p->price}} <br>
                Cantidad: {{$p->amount}}</p>
              <div class="d-flex justify-content-between align-items-center">
                <div class="btn-group">
                  <div style="margin: 5px;">
                    <a href="{{ url('/product/'.$p->slug.'/edit') }}"><button type="button"
                        class="btn btn-warning">Editar</button>
                  </div>
                  <div style="margin: 5px;">
                    <form action="{{ route('product.destroy', $p->slug) }}" method="POST">
                      @csrf @method('DELETE')
                      <button type="submit" class="btn btn-danger">Borrar</button>
                    </form>
                  </div>
                </div>
              </div>
            </div>
          </div>
          </a>
        </div>
        @endforeach

      </div>
    </div>
  </div>

</div>
@endif

@endsection