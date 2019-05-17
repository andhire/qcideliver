@extends('layouts.app')
@section('title', 'Productos')
@section('content')

@php
$categories = App\CategoryProduct::all();
@endphp

<div class="sidenav">
  <p style="color: white; text-align:center;">Filtros</p>

  @foreach ($categories as $category)
  <a href="/product/filtro/{{$category->slug}}" class='button'>{{ $category->name }}</a>
  @endforeach
</div>


<div class="main">

  <div class="album py-5 bg-light" style="margin-top: 10px">
    <div class="container">
      <div class="row">

        @foreach ($productos as $p)
        <div class="col-md-4">
          <a href="{{ url('/product',[$p->slug]) }}">
            <div class="card mb-4 shadow-sm">
              <img src={{$p->image}} width="100%" height="200">
              <div class="card-body">
                <p class="card-text">
                  {{$p->name}}<br>
                  {{$p->type}} </p>
                <div class="d-flex justify-content-between align-items-center">
                </div>
              </div>
            </div>
        </div>
        @endforeach

      </div>
    </div>
  </div>

</div>

@endsection