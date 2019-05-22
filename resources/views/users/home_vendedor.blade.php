@php
$user = $data[0];
$productosAprobados = $data[1];
$productosNoAprobados = $data[2];
$ubicacion = $data[3];
@endphp

@extends('layouts.app')
@section('title', ($user->name))
@section('head')
<link href="{{ asset('css/misc.css') }}" rel="stylesheet">
@endsection
@section('content')


@if($user->estado == 0)
<div class="container">
  <div class="row justify-content-center">
    <div class="col-md-8">
      <div class="card">
        <div class="card-header">Esperando Aprobación</div>
        <div class="card-body">
          <p>Tu registro como vendedor esta en proceso de aprobación.</p>
          <br> 
          <p>Uno de nuestros administradores se encargará de revisar esta solicitud en las próximas horas.</p>
    </div>
  </div>
</div>

@else
<div class="card-body">
  <form method="POST" action={{'/user/'.$user->id.'/ubicacion'}}>
    @csrf
    <div class="form-group row">
      <label for="ubication" class="col-md-4 col-form-label text-md-right">Ubicacion Actual</label>
      <div class="col-md-2">
        <select class="form-control" name="ubication">

          <option selected value="0">Sin ubicación</option>

          @foreach (App\Ubication::all() as $u)

          @if($loop->iteration == $ubicacion)
          <option selected value="{{$u->id}}"> {{$u->slug}}</option>
          @else
          <option value="{{$u->id}}"> {{$u->slug}}</option>
          @endif

          @endforeach

        </select>
      </div>
      <div class="col-md-4">
        <button type="submit" class="btn btn-primary btn-sm">
          Actualizar ubicación
        </button>
      </div>
    </div>
  </form>
</div>

<a href="{{ route('product.create') }}" class="btn btn-primary">Agregar Producto </a>

<a href="user/{{$user->slug}}/edit" class="btn btn-primary">Editar información de: {{$user->name}}</a>

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