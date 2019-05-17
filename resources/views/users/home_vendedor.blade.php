@extends('layouts.app')
@section('title', 'Perfil: {{$user->nombre}}')
@section('content')

@php
$user = $data[0];
$productosAprobados = $data[1];
$productosNoAprobados = $data[2];
@endphp

<div class="container">
  <img src="{{$user->foto}}" class="img-thumbnail" style="width: 100px;" />
</div>

@if($user->estado == 1)
<a href="{{ route('product.create') }}" class="btn btn-default">Agregar Producto </a>
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