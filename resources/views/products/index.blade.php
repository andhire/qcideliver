@extends('layouts.app')
@section('title', 'Productos')
@section('content')

@php
$categories = App\CategoryProduct::all();
$ubicactions = App\Ubication::all();
@endphp

<div class="sidenav">
  <div style="color: white; text-align:center;">Categorias</div>

  @foreach ($categories as $category)
  <a href="/product/categoria/{{$category->slug}}" class='button'>{{ $category->name }}</a>
  @endforeach

  <br>

  <div style="color: white; text-align:center;">Ubicaciones</div>

  @foreach ($ubicactions as $ubication)
  <a href="/product/ubicacion/{{$ubication->id}}" class='button'>{{ $ubication->nombre }}</a>
  @endforeach

</div>


<div class="main">

  <div class="album py-5 bg-light" style="margin-top: 10px">
    <div class="container">
      <div class="row">

        @foreach ($productos as $p)
        <div class="col-md-4">
          <div class="card mb-4 shadow-sm">
            <a href="{{ url('/product',[$p->slug]) }}">
              <img src={{$p->image}} width="100%" height="200">
            </a>
            <div class="card-body">
              <p class="card-text">
                {{$p->name}}<br>
                {{$p->price}} <br>
                {{$p->user->userUbication->ubication->nombre ?? 'No hay ubicacion'}} </p>
            </div>
          </div>
        </div>
        @endforeach

      </div>
    </div>
  </div>

</div>

@endsection