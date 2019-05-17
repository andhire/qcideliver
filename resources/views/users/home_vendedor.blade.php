@extends('layouts.app')
@section('title', 'Perfil: {{$user->nombre}}')
@section('content')

@php
$user = $data[0];
$productosAprobados = $data[1];
$productosNoAprobados = $data[2];
$ubicacion = $data[3];
@endphp

{{-- <div class="container">
  <img src="{{$user->foto}}" class="img-thumbnail" style="width: 100px;" />
</div> --}}

@if($user->estado == 1)
<div class="card-body">
  <form method="POST" action={{'/user/'.$user->id.'/ubicacion'}}>
    @csrf
    <div class="form-group row">
      <label for="ubication" class="col-md-4 col-form-label text-md-right">Ubicacion Actual</label>
      <div class="col-md-2">
        <select class="form-control" name="ubication">

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

@endif

<div class="">
  Aprobados
  <div class="album py-5 bg-light" style="margin-top: 10px">
    <div class="container">
      <div class="row">

        @foreach ($productosAprobados as $p)
        <div class="col-md-4">
          <a href="{{ url('/product',[$p->slug]) }}">
            <div class="card mb-4 shadow-sm">
              <img src={{$p->image}} width="100%" height="200">
              <div class="card-body">
                <p class="card-text" style="color: black">

                  {{$p->name}}<br>
                  $ {{$p->price}} <br>
                  Cantidad:{{$p->amount}}</p>
                <div class="d-flex justify-content-between align-items-center">
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
          <a href="{{ url('/product',[$p->slug]) }}">
            <div class="card mb-4 shadow-sm">
              <img src={{$p->image}} width="100%" height="200">
              <div class="card-body">
                <p class="card-text">
                  {{$p->name}}<br>
                  $ {{$p->price}} <br>
                  Cantidad:{{$p->amount}}</p>
                <div class="d-flex justify-content-between align-items-center">
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

@endsection